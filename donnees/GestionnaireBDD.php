<?php

/* GestionnaireBDD.php
 * Classe technique qui gère les accès à la base de données
 */
define("DEBUG_SQL", "debug-sql");       // nom du fichier de log
//define("TYPE_LOG", 0);      // utilisation du fichier de log standard
define("TYPE_LOG", 3);    // utilisation du fichier de log défini dans DEBUG_SQL
//unlink(DEBUG_SQL);        // suppression fichier log
include_once("autoload.php");

class GestionnaireBDD {
    private $_cnx = NULL;   // la connexion à la base de données (une instance de la classe PDO)

    // constructeur ; il crée la connexion $cnx avec le SGBD
    public function __construct() {
        if (is_null($this->_cnx)) {
            // Définition des variables de connexion
            $user = "publicBiocoop";
            $pass = "mdpBiocoop";
            $dsn = 'mysql:host=localhost;dbname=bdbiocoop'; //Data Source Name
            // Connexion 
            try {
                $dbh = new PDO($dsn, $user, $pass, array(
                    PDO::ATTR_PERSISTENT => true, // Connexion persistante
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
            } catch (PDOException $e) {
                $this->erreurSQL($e->getMessage(), "Pb connexion", $dbh);
            }

            $this->_cnx = $dbh;
        }
    }

    /**
     * @return type connexion
     */
    public function cnx() {
        return $this->_cnx;
    }
    
    
    // méthode retournant la liste des dons par identifiant de lot, du libellé de FamilleProduit et nombre de produit par lot
    function readAllDons($annee) {  
//        $sql = "SELECT lot.id, designation, nbrProduits FROM produit INNER JOIN lot ON produit.id=lot.idProduit WHERE etat=6 AND EXISTS (SELECT * FROM facturedon WHERE YEAR(dateFacture) = ':aa') ORDER BY lot.id;";	
//        $req = $this->_cnx->prepare($sql);
//        $req->bindValue("aa", $annee, PDO::PARAM_STR);
//        $resultat = $req->execute();
        
        $sql = "SELECT lot.id, designation, nbrProduits FROM produit INNER JOIN lot ON produit.id=lot.idProduit WHERE etat=6 AND EXISTS (SELECT * FROM facturedon WHERE YEAR(dateFacture) = ".$annee.") ORDER BY lot.id;";
        $resultat = $this->_cnx->query($sql);	// Execution de la requete
            
	if ($resultat === false) {
            $this->_cnx->afficherErreurSQL("Pb lors de la recherche", $sql);
	}
        return $resultat;
    }
    
    // méthode retournant la liste des associations caricatives
     function readAllAsso(){       
        $sql = "SELECT nom, adresse FROM association WHERE NOT EXISTS (SELECT idAssociation FROM facturedon WHERE facturedon.idAssociation=association.id);";
	$resultat = $this->_cnx->query($sql);	// Execution de la requete
	if ($resultat === false) {
            $this->_cnx->afficherErreurSQL("Pb lors de la recherche", $sql);
	}
        
        return $resultat;
        
        
        
    }
    
    // méthode retournant les montants cumulés des dons par type de produits
    function readMtCumul(){       
        $sql = "SELECT libelle, sum(valeurMarchandise) AS montant FROM bdbiocoop.valeurdon GROUP BY libelle;";
	$resultat = $this->_cnx->query($sql);	// Execution de la requete
	if ($resultat === false) {
            $this->_cnx->afficherErreurSQL("Pb lors de la recherche", $sql);
	}
        return $resultat;
    }
    
    // méthode retournant la liste des années des facture de dons
    function readDonsAnnees(){
        $annees = array();
        $sql = "SELECT DISTINCT YEAR(dateFacture) AS annee FROM facturedon;";
	$resultat = $this->_cnx->query($sql);	// Execution de la requete
	if ($resultat === false) {
            $this->_cnx->afficherErreurSQL("Pb lors de la recherche", $sql);
	}
        $uneLigne = $resultat->fetch();
        while ($uneLigne) {           
             $anneeDon = $uneLigne["annee"];
             array_push($annees, $anneeDon);
             $uneLigne = $resultat->fetch(); // Lecture ligne suivante	
         }
        return $annees;
    }
    
    // méthode retournant un objet FamilleProduit à partir de son identifiant (ou null si l'identifiant n'existe pas)
    public function getUneFamille($unIdFamille) {
        $uneFamille = null;
        
        if(isset($unIdFamille)){
            // préparation de la requête 
            $txtReq = "SELECT id, libelle FROM familleproduit WHERE id = :idFamille;";
            $req = $this->_cnx->prepare($txtReq);
            // valorisation du paramètre
            $req->bindValue("idFamille", $unIdFamille, PDO::PARAM_INT);
            // exécution de la requête SQL
            $resultat = $req->execute();
            if ($resultat === false) {
                $sql = $this->erreurSQL("Pb lors de la recherche des promotions. ", $req);
            }
            $uneLigne = $req->fetch(PDO::FETCH_OBJ);
            $uneFamille = new FamilleProduit($uneLigne->id, $uneLigne->libelle);
        }
        return $uneFamille; // À modifier
    }

    // méthode retournant un objet Promotion à partir de son identifiant (ou null si l'identifiant n'existe pas)
    public function getUnePromotion($unIdPromotion) {
        $unePromotion = null;
        
        if(isset($unIdPromotion)){
            // préparation de la requête 
            $txtReq = "SELECT * FROM promotion WHERE id = :idPromo;";
            $req = $this->_cnx->prepare($txtReq);
            // valorisation du paramètre
            $req->bindValue("idPromo", $unIdPromotion, PDO::PARAM_INT);
            // exécution de la requête SQL
            $resultat = $req->execute();
            if ($resultat === false) {
                $sql = $this->erreurSQL("Pb lors de la recherche des promotions. ", $req);
            }
            $uneLigne = $req->fetch(PDO::FETCH_OBJ);
            $unePromotion = new Promotion($uneLigne->id, $uneLigne->libelle, $uneLigne->mois, $uneLigne->annee, $this->getUneFamille($uneLigne->id));
        }
        return $unePromotion;
        
    }

    // méthode retournant les lignes d'une promotion (collection d'objets LignePromotion)
    public function getLesLignesPromotion($unIdPromotion) {
        $lignesPromotions = array();
        // préparation de la requête 
        $txtReq = "SELECT designation, lignepromotion.dateDebut, lignepromotion.dateFin, prixPromo, prix FROM lignepromotion "
                . "INNER JOIN produit ON lignepromotion.idProduit = produit.id INNER JOIN tarif ON produit.id = tarif.idProduit "
                . "WHERE lignepromotion.idProduit = :idPromo;";
        $req = $this->_cnx->prepare($txtReq);
        // valorisation du paramètre
        $req->bindValue("idPromo", $unIdPromotion, PDO::PARAM_INT);
        // exécution de la requête SQL
        $resultat = $req->execute();
        if ($resultat === false) {
                $sql = $this->erreurSQL("Pb lors de la recherche des promotions. ", $req);
            }            
        $uneLigne = $req->fetch(PDO::FETCH_OBJ);
        while ($uneLigne != false) {
            // création d'un objet Promotion
            $ligne = new LignePromotion($uneLigne->designation, $uneLigne->dateDebut, $uneLigne->dateFin, $uneLigne->prixPromo, $uneLigne->prix);
            // ajout de l'objet à la collection
            $lignesPromotions[] = $ligne;
            // lit la ligne suivante sous forme d'objet
            $uneLigne = $req->fetch(PDO::FETCH_OBJ);
        }
        
        $req->closeCursor(); // libère les ressources du jeu de données
           
        return new $lignesPromotions(1, "2021-04-10", "2021-04-20", 1.8, 3.5); 
    }

    // méthode retournant les promotions (collection d'objets Promotion) d'un mois et d'une année donnés
    public function getLesPromotions($unMois, $uneAnnee) {
        // préparation de la requête avec 2 paramètres mm et aa (précédés du caractère : )
        $txtReq = "Select id, libelle, idFamille from promotion where mois = :mm and annee = :aa";
        $req = $this->_cnx->prepare($txtReq);
        
        // valorisation des 2 paramètres mm et aa de type integer puis exécution de la requête SQL
        $req->bindValue("mm", $unMois, PDO::PARAM_INT);
        $req->bindValue("aa", $uneAnnee, PDO::PARAM_INT);
        $resultat = $req->execute();
        if ($resultat === false) {
            $sql = $this->erreurSQL("Pb lors de la recherche des promotions. ", $req);
        }
        
        // construction d'une collection d'objets Promotion (un tableau array en PHP)
        $lesPromotions = array();
        // lit la première ligne du résultat de la requête. $uneLigne est une référence à un objet dont les 
        // propriétés correspondent aux noms des colonnes de la requête
        // ou bien la valeur booléenne false s’il n’y a plus de ligne à lire dans le jeu de résultats
        $uneLigne = $req->fetch(PDO::FETCH_OBJ);
        while ($uneLigne != false) {
            // création d'un objet Promotion
            $unePromotion = new Promotion($uneLigne->id, $uneLigne->libelle, $unMois, $uneAnnee, $this->getUneFamille($uneLigne->idFamille),
                    $this->getLesLignesPromotion($uneLigne->id));
            // ajout de l'objet à la collection
            $lesPromotions[] = $unePromotion;
            // lit la ligne suivante sous forme d'objet
            $uneLigne = $req->fetch(PDO::FETCH_OBJ);
        }
        
        $req->closeCursor(); // libère les ressources du jeu de données
        return $lesPromotions; // fournit la collection        
    }

    /** afficherErreurSQL : 
     *  Ajout message d'erreur dans le fichier log, fin de l'application
     *  @param $message	: message a afficher
     *  @param $req 	: requete préparée
     *  @param $dbh     : connexion PDO
     */
    function erreurSQL($message, $req) {        
        error_log("\n***Erreur SQL*** " . date('Y-m-d H-i-s') . " - IP: ".$_SERVER['REMOTE_ADDR'], TYPE_LOG, DEBUG_SQL);
        error_log("\n\tMessage: " . $message, TYPE_LOG, DEBUG_SQL);       
        if ($this->_cnx) {
            // Mise en tampon de la sortie, afin de récupérer la requête préparée et l'afficher dans les logs            
            ob_start();
            $req->debugDumpParams();    
            $posDebut = stripos(ob_get_contents(), "Sent SQL:");            
            $posFin = stripos(ob_get_contents(), "Params:");            
            $requeteSQL = substr(ob_get_contents(), $posDebut, $posFin-$posDebut);           
            error_log("\n\t" . $requeteSQL, TYPE_LOG, DEBUG_SQL);
            ob_end_clean();
            $erreur = $req->errorInfo()[2];
            error_log("\tErreur: " . $erreur, TYPE_LOG, DEBUG_SQL);
            // Fermeture connexion
            $req = null;
            $this->_cnx = null;
        }
        //echo("Taille log : " . stat(DEBUG_SQL)[7]);
        //echo(" - Date dernière modif : " . date("d m Y H:i:s.", filemtime(DEBUG_SQL)));
        if (isset($_SESSION)) {
            session_unset();
            session_destroy();
        }
        die("<p id='erreur1'>Désolé, site actuellement indisponible </p>");
    }
}

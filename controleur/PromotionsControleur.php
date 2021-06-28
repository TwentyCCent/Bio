<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PromotionsControleur
 *
 * @author VincentSim
 */
require_once '../../donnees/GestionnaireBDD.php';
class PromotionsControleur {

    private $_leGestionnaire; // instance de la classe GestionnaireBDD

    public function __construct() {
        $this->_leGestionnaire = new GestionnaireBDD();  // connexion du serveur web à la base de données
    }

    /* retourne toutes les promotions d’un mois et d’une année donnés. Si les paramètres ne sont pas
      donnés dans l’URI alors $mois et $annee contiendront respectivement  le mois et l’année courants */
    
    public function lister($mois, $annee, $pourcentageReduc=0) {
               
        // Recherche des promotions
        $lesPromotions = $this->_leGestionnaire->getLesPromotions($mois, $annee);
        
        // -------- création du flux JSON en sortie ------------
        
        // 0-construction de l'élément reponse
        $reponse = count($lesPromotions) . " promotions pour le mois choisi.";               
        
        // 1-construction d'un tableau contenant les promotions
        // une promotion est représentée par un tableau associatif 
        $lesLignesDuTableau = array();
        foreach ($lesPromotions as $unePromotion) {
            
            //$lesLignesPromotions = $this->_leGestionnaire->getLesLignesPromotion($unePromotion->id());
            $unePromotion->getLesLignesPromoRed($pourcentageReduc);
            // ajoute une ligne promotion dans le tableau $lesLignesDuTableau
            $uneLigne = array();
            $uneLigne["idPromo"] = $unePromotion->id();
            $uneLigne["libelle"] = $unePromotion->libelle();
            $uneLigne["idFamille"] = $unePromotion->laFamille();
            
            
            $lesLignesPromos = array();
            foreach($unePromotion->lesLignes() as $uneLignePromo){
                $uneLigneP = array();
                $uneLigneP["idProduit"] = $uneLignePromo->id();
                $uneLigneP["designation"] = $uneLignePromo->designation();
                $uneLigneP["dateDebut"] = $uneLignePromo->dateDebut();  //   date_format($uneLignePromo->dateDebut(), 'd/m/Y')
                $uneLigneP["dateFin"] = $uneLignePromo->dateFin();
                $uneLigneP["prixPromo"] = $uneLignePromo->prix();
                $uneLigneP["prixBase"] = $uneLignePromo->prixBase();
                $uneLigneP["pourcentageReduct"] = $uneLignePromo->pourcentage();
                $lesLignesPromos[] = $uneLigneP;
            }
            $uneLigne["lignesPromotion"] = $lesLignesPromos;
            $lesLignesDuTableau[] = $uneLigne;            
        }
        
       // 2-construction de l'élément "promotions" avec un tableau associatif, ensemble de paires
        // clé => valeur
        $eltPromotions = ["promotions" => $lesLignesDuTableau];
        
        // 3-construction de l'élément "data"
        $eltData = ["mois" => $mois, "annee" => $annee, "reponse" => $reponse, "donnees" => $eltPromotions];
        
        
        // 4-construction de la racine
        $eltRacine = ["data" => $eltData];
        
        // 5-retourne le code statut 200 et un contenu JSON construit à partir du tableau associatif $eltRacine
        header("Content-type:application/json");
        header("HTTP/1.0 200 ok"); 
        return(json_encode($eltRacine));
    }
}

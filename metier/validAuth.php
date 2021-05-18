<?php

function login()
{
    if (isset($_POST['btnValider']))
    if (isset($_POST['ztMail']) && !empty($_POST['ztMail']) &&
            isset($_POST['ztPassword']) && !empty($_POST['ztPassword'])) 
            {

                $usermail = $_POST['ztMail'];
                $password = $_POST['ztPassword'];

                $stmt = $this->_laConnexion->dbh()->prepare("SELECT * FROM users WHERE user_mail = :mail");
                $stmt->bindValue(':mail', $usermail);

                $valid = $stmt->execute();
                if (!$valid) 
                {
                    $this->_laConnexion->afficherErreurSQL("Erreur recherche user pour authentification");
                }

                $hashUser = $stmt->fetch();
            }
}
?>
<?php
session_start();

function controleUtilisateur($dbh, $mail, $mdp) {
    $sql = "SELECT * FROM utilisateur WHERE mail = '$mail';";
    $resultat = $dbh->query($sql);							// Execution de la requete
    if ($resultat === false) {
        afficherErreurSQL("Pb lors de la recherche de l'utilisateur.", $sql, $dbh);
    }
    $user = $resultat->fetch();
    $hash = $user["mdp"];
    return password_verify($mdp, $hash)?$user:null;
}



if (isset($_POST["ztMail"]) && isset($_POST["ztPassword"])) {
    $mail = $_POST["ztMail"];
    $mdp = $_POST["ztPassword"];
    
    include("../donnees/GestionnaireBDD.php");
    $dbh = GestionnaireBDD();
    

    
    
    $unUser = controleUtilisateur($dbh, $mail, $mdp);
    if ($unUser != null) {
        echo "Connexion ok";
        $_SESSION['id'] = $unUser['id'];
        $nom = $_SESSION['nom'] = $unUser['nom'];
        $prenom = $_SESSION['prenom'] = $unUser['prenom'];
        $_SESSION['mess'] ="Vous êtes bien authentifié $prenom $nom"; 
        $_SESSION['admin'] = $unUser['admin'];
        header('Location:index.php');
        exit();
    } else {
        session_unset();
        $_SESSION['mess'] = "Erreur authentification";
        header('Location:authentification.php');
    
    }
}

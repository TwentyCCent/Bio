<?php

require '../../controleur/UtilisateurControleur.php';

$mess="";
$erreur=0;


$mail = filter_input(INPUT_POST, 'ztMail', FILTER_VALIDATE_EMAIL);
if ($mail === false) {
    $erreur += 1;
    $mess.="Mail erroné";
} elseif ($mail === null) {
    $erreur += 1;
    $mess.="Mail non renseigné";
}

$password = filter_input(INPUT_POST, 'ztPassword', FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=> "#^(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?=(.*[0-9]){2,}).{8,}$#")));
if ($password === false) {
    $erreur += 1;
    $mess.="Le mot de passe est incorrect";
    
} elseif ($password === null) {
    $erreur += 1;
    $mess.="Le mot de passe doit être renseigné";
}

if (isset($_POST['btnValider'])){
    if ($mail && $password) {
            login($mail, $password);
    }else{
        echo "<script>alert('Veuillez saisir vos informations de connexion')</script>";
    }
}

        
function login($usermail, $password) {
    $UserCtrl = new UtilisateurControleur();
    if($UserCtrl->existMail($usermail) === true){   
        $user = $UserCtrl->getHash($usermail, $password);
        if(!empty($user)){
            $nom = $_SESSION['nom'] = $user[0];
            $prenom = $_SESSION['prenom'] = $user[1];
            $statut = $_SESSION['statut'] = $user[2];
            $_SESSION['mess'] ="Bienvenue $prenom $nom en qualité de $statut"; 
            $_SESSION['statut'] = $user[2];
            header('Location:../../');
            exit();
        } else {           // session_unset(); ??
            $_SESSION['mess'] = "Erreur authentification";
            echo "<script>alert('Votre mot de passe est incorrect')</script>";
        }
    } else if(!empty($usermail)){
        echo "<script>alert('Il n\'existe pas de compte à cette adresse mail')</script>";
    }
}




    

    
    



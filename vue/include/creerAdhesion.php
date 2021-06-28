<?php
/* 
 * creerAdhesion.php : création dans la base de données d'un utilisateur adhérent
 */
require '../../controleur/UtilisateurControleur.php';

$erreur=0;
$mess="";

// Le nom doit être renseigné
$nom = filter_input(INPUT_POST, 'ztNom', FILTER_SANITIZE_STRING);
if ($nom === null) {$erreur += 1;$mess.="Le nom doit être renseigné ";}

// Le prénom doit être renseigné
$prenom = filter_input(INPUT_POST, 'ztPrenom', FILTER_SANITIZE_STRING);
if ($prenom === null) {$erreur += 1;$mess.="Le prénom doit être renseigné ";}

// Le pseudo doit être renseigné
$mail = filter_input(INPUT_POST, 'ztMail', FILTER_VALIDATE_EMAIL);
if ($mail === false) {$erreur += 1;$mess.="Mail erroné ";} elseif ($mail === null) {$erreur += 1;$mess.="Mail non renseigné ";}


// Le mot de passe doit être renseigné
$password = filter_input(INPUT_POST, 'ztPassword', FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=> "#^(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?=(.*[0-9]){2,}).{8,}$#")));
if ($password === false) {$erreur += 1;$mess.="Le mot de passe est incorrect ";} elseif ($password === null) {$erreur += 1;$mess.="Le mot de passe doit être renseigné ";}

// Le mot de passe doit être renseigné
$confirmPass = filter_input(INPUT_POST, 'ztConfirmPass', FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=> "#^(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?=(.*[0-9]){2,}).{8,}$#")));
if ($confirmPass === false) {$erreur += 1;$mess.="La confirmation du mot de passe est incorrect ";} elseif ($confirmPass === null) {$erreur += 1;$mess.="La confirmation du mot de passe doit être renseigné ";}


if (isset($_POST['btnValid'])){
    if(isset($_POST['prefix'])){
    $civilite = $_POST['prefix'];
    askValid($civilite, $nom, $prenom, $mail, $password, $confirmPass);
    }else{
        echo "<script>alert('Veuillez indiquer votre civilité')</script>";
    }
}

function askValid($civilite, $nom, $prenom, $mail, $password, $confirmPass){
    $UserCtrl = new UtilisateurControleur();
    if ($UserCtrl->existMail($mail)){
        echo "<script>alert('Cette adresse mail possède déjà un compte')</script>";
    }elseif ($password !== $confirmPass){
        echo "<script>alert('Veuillez vérifier vos mots de passe, ils ne sont pas identiques')</script>";
    }elseif(!$mail){
         echo "<script>alert('L\'adresse email saisie n\'est pas valide')</script>";
    }else{          
        $UserCtrl->creerAdherent($civilite, $nom, $prenom, $mail, $password);
        echo "<script language='javascript'>";
        echo "alert('Votre demande de création de compte a bien été accepté');";
        //echo 'window.location.reload();';
        echo "</script>";
    }
}



//  header('Location:../../index.php'); 
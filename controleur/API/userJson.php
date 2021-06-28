<?php

header("Content-type:application/json; Charset=UTF-8'");
/* Recherche d'un utilisateur en fonction d'un mail
  – Format JSON */

require '../../controleur/UtilisateurControleur.php';

$email = $mdp = null;

$param = filter_input(INPUT_SERVER, "PATH_INFO", FILTER_SANITIZE_STRING);

$vars = explode("/", $param, 8);
if (count($vars) == 5) {
    if ($vars[1] === "email" && $vars[3] === "mdp") {
        $mail = filter_var($vars[2], FILTER_VALIDATE_EMAIL);
        $mdp = filter_var($vars[4]);
        // FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=> "#^(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?=(.*[0-9]){2,}).{8,}$#")));
    }
}

//echo "email : ".$mail." password : ".$mdp;

$androidCtrl = new UtilisateurControleur();

if($androidCtrl->existMail($mail) === true){  
    $user = $androidCtrl->getHash($mail, $mdp);
    if(!empty($user)){
        $userJson["nom"] = $user[0];
        $userJson["prenom"] = $user[1];
        $userJson["statut"] = $user[2];  
        if($user[2] == 3){
            // Formatage des données utilisateur en JSON
             echo(json_encode($userJson));
        }
    } 
}
?>
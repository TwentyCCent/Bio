<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UtilisateurControleur
 *
 * @author Vincent
 */
require_once '../../donnees/GestionnaireBDD.php';
require"../../metier/Utilisateur.php";
class UtilisateurControleur {

    private $_leGestionnaire; // instance de la classe GestionnaireBDD


    public function __construct() {
       $this->_leGestionnaire = new GestionnaireBDD();  // connexion du serveur web à la base de données
   }
    
    public function getHash($mail, $password){ 
        $dataUser=[];
        $user = $this->_leGestionnaire->getUser($mail);
        if(password_verify($password, $user->password())){
            $dataUser=[$user->nom(), $user->prenom(), $user->statut()]; 
        }
        return $dataUser;
    }
    
    public function existMail($mail) {
        $user = $this->_leGestionnaire->getUser($mail);
        if ($user !== ""){
           return true; 
        }
        else{
            return false;
        } 
    }
    
    public function creerAdherent($civilite, $nom, $prenom, $mail, $password){
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $creer = $this->_leGestionnaire->insertAdherent($civilite,$nom, $prenom, $mail, $hash);
        return $creer;
    }
}


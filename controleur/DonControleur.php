<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DonControleur
 *
 * @author Vincent
 */
require_once '../../donnees/GestionnaireBDD.php';
require_once("../../metier/Don.php");
require_once("../../metier/Association.php");
require_once("../../metier/ValeurDon.php");
//include_once("autoload.php");
class DonControleur {

    private $_leGestionnaire; // instance de la classe GestionnaireBDD


    public function __construct() {
       $this->_leGestionnaire = new GestionnaireBDD();  // connexion du serveur web à la base de données
   }
    
    public function getDons($annee){ 
        $resultat = "";
        $lesDons = $this->_leGestionnaire->readAllDons($annee);     
        foreach($lesDons as $undon)
        {
            $resultat .= "<tr><td>".$undon->id()."</td><td>".$undon->designation()."</td><td>".$undon->quantite()."</td></tr>";
        }
        $this->_leGestionnaire = null;
        return $resultat;
    }
    
    public function getAssos($annee){
        $resultat = "";
        $lesAssos = $this->_leGestionnaire->readAllAsso($annee);    
        foreach ($lesAssos as $uneAsso){
            $resultat .= "<tr><td>".$uneAsso->nom()."</td><td>".$uneAsso->adresse()."</td></tr>";
        }
        return $resultat;
    }
    
    public function getMtCumul($annee){     
        $resultat = "";
        $lesMontants = $this->_leGestionnaire->readMtCumul($annee);
        foreach($lesMontants as $unMt)
        {
            $resultat .= "<tr><td>".$unMt->libelle()."</td><td>".$unMt->montant()." €</td></tr>";
        }
        return $resultat;
    }
    
    public function getAnneesDons(){      
        $lesAnnees = $this->_leGestionnaire->readDonsAnnees(); 
        return $lesAnnees;
    }
}


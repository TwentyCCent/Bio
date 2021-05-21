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
require '../../donnees/GestionnaireBDD.php';
class DonControleur {

    private $_leGestionnaire; // instance de la classe GestionnaireBDD

     public function __construct() {
        $this->_leGestionnaire = new GestionnaireBDD();  // connexion du serveur web à la base de données
    }
    
    public function getDons($annee){      
        $lesDons = $this->_leGestionnaire->readAllDons($annee);   
        return $lesDons;
    }
    
}
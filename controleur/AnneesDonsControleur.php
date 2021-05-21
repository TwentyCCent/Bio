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
class AnneesDonsControleur {

    private $_leGestionnaire; // instance de la classe GestionnaireBDD

     public function __construct() {
        $this->_leGestionnaire = new GestionnaireBDD();  // connexion du serveur web à la base de données
    }
    
    public function getAnneesDons(){      
        $lesAnnees = $this->_leGestionnaire->readDonsAnnees(); 
        return $lesAnnees;
    }
    
}
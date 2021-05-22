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
require("../../metier/Don.php");
class DonControleur {

    private $_leGestionnaire; // instance de la classe GestionnaireBDD


    public function __construct() {
       $this->_leGestionnaire = new GestionnaireBDD();  // connexion du serveur web à la base de données
   }
    
    public function getDons($annee){ 
        $resultat = "";
        $lesDons = $this->_leGestionnaire->readAllDons($annee);
//        $unDon = $lesDons->fetch();
//        while ($unDon) {
//            $id = $unDon["id"];
//            $designation = $unDon["designation"];
//            $qte = $unDon["nbrProduits"];
//            $resultat .= "<tr><td>".$id."</td><td>".$designation."</td><td>".$qte."</td></tr>";
//            $unDon = $lesDons->fetch();
//        }
        
        foreach($lesDons as $undon)
        {
            $resultat .= "<tr><td>".$undon->id()."</td><td>".$undon->designation()."</td><td>".$undon->quantite()."</td></tr>";
        }
        
        
        return $resultat;
    }
    
}


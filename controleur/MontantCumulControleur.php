<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MontantCumulControleur
 *
 * @author Vincent
 */
require_once '../../donnees/GestionnaireBDD.php';
require("../../metier/ValeurDon.php");
class MontantCumulControleur {

    private $_leGestionnaire; // instance de la classe GestionnaireBDD

     public function __construct() {
        $this->_leGestionnaire = new GestionnaireBDD();  // connexion du serveur web à la base de données
    }
    
    public function getMtCumul($annee){     
        $resultat = "";
        $lesMontants = $this->_leGestionnaire->readMtCumul($annee);
//        $unMt = $lesMontants->fetch();
//        while ($unMt) {
//            $lib = $unMt["libelle"];
//            $Mt = $unMt["montant"];
//            $resultat .= "<tr><td>$lib</td><td>$Mt €</td></tr>";
//            $unMt = $lesMontants->fetch();
//        }

        foreach($lesMontants as $unMt)
        {
            $resultat .= "<tr><td>".$unMt->libelle()."</td><td>".$unMt->montant()." €</td></tr>";
        }
        return $resultat;
    }
}



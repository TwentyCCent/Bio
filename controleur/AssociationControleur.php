<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AssociationControleur
 *
 * @author Vincent
 */
require_once '../../donnees/GestionnaireBDD.php';
require '../../metier/Association.php';
class AssociationControleur {

    private $_leGestionnaire; // instance de la classe GestionnaireBDD

     public function __construct() {
        $this->_leGestionnaire = new GestionnaireBDD();  // connexion du serveur web à la base de données
    }
    
    public function getAssos($annee){
        $resultat = "";
        $lesAssos = $this->_leGestionnaire->readAllAsso($annee);
//        $uneAsso = $lesAssos->fetch();
//        while ($uneAsso) {
//            $nom = $uneAsso["nom"];
//            $adresse = $uneAsso["adresse"];
//            $resultat .= "<tr><td>$nom</td><td>$adresse</td></tr>";
//            $uneAsso = $lesAssos->fetch();
//        }
        
        foreach ($lesAssos as $uneAsso){
            $resultat .= "<tr><td>".$uneAsso->nom()."</td><td>".$uneAsso->adresse()."</td></tr>";
        }
        return $resultat;
    }
}

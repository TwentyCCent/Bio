<?php

require '../../controleur/DonControleur.php';
//require_once 'chargementClasses.php';

// Recherche si une année est sélectionnée
if (isset($_GET['selectAnnee']) && isset($_GET['validAnnee'])) 
{
    afficherRapport();
}

function afficherRapport() {
    
    $annee = $_GET['selectAnnee'];
    $donCtrl = new DonControleur();
    $lesDons = $donCtrl->getDons($annee);
    echo $lesDons;
}

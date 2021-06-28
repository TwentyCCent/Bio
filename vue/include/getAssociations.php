<?php

require_once '../../controleur/DonControleur.php';

// Recherche si une année est sélectionnée
if (isset($_GET['selectAnnee'])) 
{
    afficherAsso();
}

function afficherAsso() {
    $annee = $_GET['selectAnnee'];
    $assoCtrl = new DonControleur();
    $lesAssos = $assoCtrl->getAssos($annee);
    echo $lesAssos;
}
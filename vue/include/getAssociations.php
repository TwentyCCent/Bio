<?php
require '../../controleur/AssociationControleur.php';

// Recherche si une année est sélectionnée
if (isset($_GET['selectAnnee']) && isset($_GET['validAnnee'])) 
{
    afficherAsso();
}

function afficherAsso() {
    $annee = $_GET['selectAnnee'];
    $assoCtrl = new AssociationControleur();
    $lesAssos = $assoCtrl->getAssos($annee);
    echo $lesAssos;
}
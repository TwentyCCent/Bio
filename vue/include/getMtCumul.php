<?php

require_once '../../controleur/DonControleur.php';

// Recherche si une année est sélectionnée
if (isset($_GET['selectAnnee'])) 
{
    afficherMt();
}

function afficherMt() {
    $annee = $_GET['selectAnnee'];
    $MtCumulCtrl = new DonControleur();
    $lesMontants = $MtCumulCtrl->getMtCumul($annee);
    echo $lesMontants;
}
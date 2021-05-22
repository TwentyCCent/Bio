<?php
require '../../controleur/MontantCumulControleur.php';

// Recherche si une année est sélectionnée
if (isset($_GET['selectAnnee']) && isset($_GET['validAnnee'])) 
{
    afficherMt();
}

function afficherMt() {
    $annee = $_GET['selectAnnee'];
    $MtCumulCtrl = new MontantCumulControleur();
    $lesMontants = $MtCumulCtrl->getMtCumul($annee);
    echo $lesMontants;
}
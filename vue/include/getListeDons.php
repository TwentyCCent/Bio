<?php

require_once '../../controleur/DonControleur.php';



$annee = "";

    
    if(isset($_GET['selectAnnee'])){
        $annee = $_GET['selectAnnee'];
    }
    afficherRapport($annee);


function afficherRapport($annee) {
    $donCtrl = new DonControleur();
    $lesDons = $donCtrl->getDons($annee);
    echo $lesDons;
}



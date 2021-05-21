<?php

require '../../controleur/DonControleur.php';
//require_once 'chargementClasses.php';

// Recherche si une année est sélectionnée
if (isset($_REQUEST['selectAnnee']) && isset($_REQUEST['validAnnee'])) 
{
    afficherRapport();
} else
{
    
}

function afficherRapport() {
    /** @var type $_REQUEST */
    $annee = $_REQUEST['selectAnnee'];
    $donCtrl = new DonControleur();
    $lesDons = $donCtrl->getDons($annee);
    $unDon = $lesDons->fetch();
    while ($unDon) {
        $id = $unDon["id"];
        $designation = $unDon["designation"];
        $qte = $unDon["nbrProduits"];
        echo "<tr><td>$id</td><td>$designation</td><td>$qte</td>";
        $unDon = $lesDons->fetch();
    }
}

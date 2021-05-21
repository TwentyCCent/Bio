<?php
require '../../controleur/MontantCumulControleur.php';

// Recherche si une année est sélectionnée
if (isset($_REQUEST['selectAnnee']) && isset($_REQUEST['validAnnee'])) 
{
    afficherMt();
} else
{
    
}

function afficherMt() {
    /** @var type $_REQUEST */
    $annee = $_REQUEST['selectAnnee'];
    $MtCumulCtrl = new MontantCumulControleur();
    $lesMontants = $MtCumulCtrl->getMtCumul($annee);
    $unMt = $lesMontants->fetch();
    while ($unMt) {
        $lib = $unMt["libelle"];
        $Mt = $unMt["montant"];
        echo "<tr><td>$lib</td><td>$Mt €</td>";
        $unMt = $lesMontants->fetch();
    }
}
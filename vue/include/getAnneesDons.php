<?php
require_once '../../controleur/DonControleur.php';

$anneeCtrl = new DonControleur();
$lesAnnees = $anneeCtrl->getAnneesDons();

foreach ($lesAnnees as $anneeDon) {
//    if ($anneeDon === max($lesAnnees)) {
//        echo "<option value=$anneeDon >$anneeDon</option>";
//    }
//    else
//    {
    echo "<option value=$anneeDon>$anneeDon</option>";
//    }
}





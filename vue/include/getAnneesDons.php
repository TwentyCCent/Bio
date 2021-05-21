<?php
require '../../controleur/AnneesDonsControleur.php';

$anneeCtrl = new AnneesDonsControleur();
$lesAnnees = $anneeCtrl->getAnneesDons();

foreach ($lesAnnees as $anneeDon) {
//    if ($anneeDon === max($lesAnnees)) {
//        echo "<option value=$anneeDon>$anneeDon</option>";
//    }
//    else
//    {
    echo "<option value=$anneeDon>$anneeDon</option>";
//    }
}





<?php
require '../../controleur/AssociationControleur.php';

$assoCtrl = new AssociationControleur();
$lesAssos = $assoCtrl->getAssos();
$uneAsso = $lesAssos->fetch();
while ($uneAsso) {
    $nom = $uneAsso["nom"];
    $adresse = $uneAsso["adresse"];
    echo "<tr><td>$nom</td><td>$adresse</td>";
    $uneAsso = $lesAssos->fetch();
}
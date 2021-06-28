<?php
/* 
 * promotionJson.php
 * Retourne les promotions au format json du mois et de l'année précisées dans l'URI 
 * URI attendue : Biocoop/vue/promotionJson.php/mois/4/annee/2021/cent/0
 * Si le mois ou l'année ne sont pas précisés, mois de l'annee courante
 */
header("Content-type:application/json");
 
require '../PromotionsControleur.php';


// Recherche du mois et de l'année
$mois=$annee=null;
$pourcentage=0;
$param = filter_input(INPUT_SERVER, "PATH_INFO", FILTER_SANITIZE_STRING);

$vars = explode ( "/", $param , 10 );
if (count($vars) == 7) {
    if ($vars[1]==="mois" and $vars[3]==="annee") {       
        $mois = filter_var($vars[2], FILTER_VALIDATE_INT);
        $annee = filter_var($vars[4], FILTER_VALIDATE_INT);
        $pourcentage = filter_var($vars[6], FILTER_VALIDATE_INT);        
    }
}
//echo "Mois: $mois, Annee: $annee";
if ($mois===false or $mois===null or $mois>12 or $annee===false or $annee===null) {
    $mois = date("m");
    $annee = date("Y");
}

$promoCtrl = new PromotionsControleur();
echo $promoCtrl->lister($mois, $annee, $pourcentage);



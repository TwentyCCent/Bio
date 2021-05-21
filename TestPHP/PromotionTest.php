<?php 
use PHPUnit\Framework\TestCase;
require '../metier/Promotion.php';

class PromotionTest  extends TestCase{
    
    /*
     * @depends : getLesLignesPromoRed()
     * phpunit PromotionTest.php
     */
    function testgetLesLignesPromoRed(){
        $collection = \Ds\Vector([$ligne1, $ligne2]);
        $alimFamille = new FamilleProduit(1, 'alimentation');
        $pourcentageReduc = 20;
        $promotion = new Promotion(1, 'Noel', 'décembre', 2021, $alimFamille, $collection);
        
        
        $lesLignes = $promotion->getLesLignesPromoRed($pourcentageReduc, $promotion->lesLignes());
        
        //assertions
    }
    
}

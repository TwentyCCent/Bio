<?php 
use PHPUnit\Framework\TestCase;
require '../metier/LignePromotion.php';

class LignePromotionTest  extends TestCase{
    
    /*
     * @depends : getPourcentageReduction()
     * phpunit LignePromotionTest.php
     */
    function testgetPourcentageReduction(){
        $lignePromo = new LignePromotion(1, "2021-04-10", "2021-04-20", 1.8, 3.5);
        $pourcentage = $lignePromo->getPourcentageReduction();
        $lignePromo1 = new LignePromotion(1, "2021-04-10", "2021-04-20", 0, 3.5);
        $pourcentage1 = $lignePromo1->getPourcentageReduction();
        $lignePromo2 = new LignePromotion(1, "2021-04-10", "2021-04-20", null, 3.5);
        $pourcentage2 = $lignePromo2->getPourcentageReduction();
        $lignePromo3 = new LignePromotion(1, "2021-04-10", "2021-04-20", 7, 3.5);
        $pourcentage3 = $lignePromo3->getPourcentageReduction();
        
        //Signale une erreur si la variable actuelle n'est pas égale à celle attendu
        $this->assertEquals(48.57, $pourcentage, "Pourcentage de reduction correct -Attendu : 48.57, obtenu : $pourcentage");
        
        $this->assertNotEquals(50, $pourcentage, "Erreur pourcentage de reduction -Attendu : 48.57, obtenu : $pourcentage");
        
        //assertNotNull()
        //assertTrue()
        //bouclé une  ou plusieurs assertion mettre les resultat dans une liste et comparer le nombre de resultat avec assertCount()
        //tester 0, valeur negative, null, prix réduit supérieur à celui de base
    }

}
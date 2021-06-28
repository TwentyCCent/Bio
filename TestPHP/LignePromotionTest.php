<?php 
use PHPUnit\Framework\TestCase;
require '../metier/LignePromotion.php';

class LignePromotionTest  extends TestCase{
    
    /*
     * @depends : getPourcentageReduction()
     * C:\MAMP\htdocs\Biocoop\TestPHP
     * phpunit LignePromotionTest.php
     */
    function testGetPourcentageReduction(){
        //$prixPromo=[null, -5, 0, 12, 20, 50, 90];
        //$prixBase=[null, -10, 0, 18, 25, 75, 180];
        
        $lignePromo = new LignePromotion(1, "Creme", "2021-04-10", "2021-04-20", 1.75, 3.5);
        $pourcentage = $lignePromo->getPourcentageReduction();
        //Signale une erreur si la variable actuelle n'est pas égale à celle attendu
        $this->assertEquals(50.00, $pourcentage, "Pourcentage de reduction correct -Attendu : 50.00, obtenu : $pourcentage");
        
        $lignePromo1 = new LignePromotion(1, "Creme","2021-04-10", "2021-04-20", 0, 3.5);
        $pourcentage1 = $lignePromo1->getPourcentageReduction();
        //Signale une erreur si la méthode ne traite pas correctement la valeur 0 ou chiffre négatif en entrée de prix en promotion
        $this->assertEquals("-", $pourcentage1, "Pourcentage de reduction correct -Attendu : 48.57, obtenu : $pourcentage1");
        
        //Signale une erreur si la méthode ne traite pas correctement la valeur null en entrée de prix en promotion
        $lignePromo2 = new LignePromotion(1, "Creme","2021-04-10", "2021-04-20", null, 3.5);
        $pourcentage2 = $lignePromo2->getPourcentageReduction();
        $this->assertEquals("-", $pourcentage2, "Pourcentage de reduction correct -Attendu : 48.57, obtenu : $pourcentage2");
        
        //Signale une erreur si la méthode ne traite pas correctement un prix en promotion supérieur ou égal au prix de base
        $lignePromo3 = new LignePromotion(1, "Creme","2021-04-10", "2021-04-20", 7, 3.5);
        $pourcentage3 = $lignePromo3->getPourcentageReduction();
        $this->assertEquals("-", $pourcentage3, "Pourcentage de reduction correct -Attendu : 48.57, obtenu : $pourcentage3");
        
        
        //assertNotNull()
        //assertTrue()
        //bouclé une  ou plusieurs assertion mettre les resultat dans une liste et comparer le nombre de resultat avec assertCount()
        //tester 0, valeur negative, null, prix réduit supérieur à celui de base
    }

}
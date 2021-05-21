<?php
/**
 * Description of ValeurDon
 *
 * @author Vincent
 */
class ValeurDon {
    private $_libelle;
    private $_montant;

    
    public function __construct($libelle, $montant) {
        $this->setLibelle($libelle);
        $this->setMontant($montant);

    }
    function libelle() {
        return $this->_libelle;
    }

    function montant() {
        return $this->_montant;
    }
    
}
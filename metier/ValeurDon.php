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
        $result = number_format($this->_montant, 2);
        return $result;
    }
    
    function setLibelle($libelle): void {
        $this->_libelle=$libelle;
    }
    
    function setMontant($montant): void {
        $this->_montant=$montant;
    }
}
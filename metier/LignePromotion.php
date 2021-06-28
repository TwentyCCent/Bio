<?php

/*
 * LignePromotion.php
 * Classe LignePromotion
 */

class LignePromotion {
    
    private $_id;
    private $_designation; // le produit concerné par la ligne (objet Produit)
    private $_dateDebut; // la date de début de la promotion pour le produit
    private $_dateFin; // la date de fin de la promotion pour le produit
    private $_prix; // le prix du produit pendant la promotion
    private $_prixBase; // le prix du produit sans promotion
    private $_pourcentage=0;

    // le constructeur
    public function __construct($id, $designation, $uneDateDebut, $uneDateFin, $unPrix, $unPrixBase) {
        $this->setId($id);
        $this->setDesignation($designation);
        $this->setDateDebut($uneDateDebut);
        $this->setDateFin($uneDateFin);
        $this->setPrix($unPrix);
        $this->setPrixBase($unPrixBase);
        $this->_pourcentage = $this->getPourcentageReduction();
    }
    
    public function id() {
        return $this->_id;
    }
    
    public function designation() {
        return $this->_designation;
    }
    
    // les accesseurs  date_format($this->_dateDebut, 'd/m/Y') date_format($date, "d-m-Y")
    public function dateDebut() {
        //$date = Date.parse($this->_dateDebut);
        return $this->_dateDebut;
    }

    public function dateFin() {
        return $this->_dateFin;
    }

    public function prix() {
        return $this->_prix;
    }
    
    function prixBase() {
        return $this->_prixBase;
    }
    
    function pourcentage(){
        return $this->_pourcentage;
    }


    function setId($id): void {
        $this->_id = $id;
    }
    
    function setDesignation($designation): void {
        $this->_designation = $designation;
    }
    
    function setDateDebut($dateDebut): void {
        $this->_dateDebut = $dateDebut;
    }

    function setDateFin($dateFin): void {
        $this->_dateFin = $dateFin;
    }

    function setPrix($tarif): void {
        $this->_prix = number_format($tarif, 2, '.', '');
    }

    function setPrixBase($prixBase): void {
        $this->_prixBase = number_format($prixBase, 2, '.', '');
    }

    /**
     * Méthode qui retourne le pourcentage de réduction appliqué au prix lors de la promotion. 
     * Ce  pourcentage est calculé ainsi : 100 * (tarif de base – tarif de promotion) / tarif de base
     * ou 100*(1-(tarif réduit/tarif de base))
     */
    public function getPourcentageReduction() {
        if(($this->prix()>0) && ($this->prix()<$this->prixBase()) && ($this->prixBase()>0)){
        $pourcentage = (1-($this->prix()/$this->prixBase()))*100;
        return number_format($pourcentage, 2, '.', '');
        }
        else{
            return "-";
        }
    }

}

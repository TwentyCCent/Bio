<?php
/**
 * Description of Don
 *
 * @author Vincent
 */
class Association {
    private $_id;
    private $_nom;
    private $_adresse;
    private $_adresseMail;
    private $_tel;
    
    public function __construct($id, $nom, $adresse, $adresseMail, $tel) {
        $this->setId($id);
        $this->setNom($nom);
        $this->setAdresse($adresse);
        $this->setAdresseMail($adresseMail);
        $this->setTel($tel);
    }
    function id() {
        return $this->_id;
    }

    function nom() {
        return $this->_nom;
    }
    
    function adresse() {
        return $this->_adresse;
    }
    
    function adresseMail() {
        return $this->_adresseMail;
    }
    
    function tel() {
        return $this->_tel;
    }
    
    function setId($_id): void {
        $this->_id = $_id;
    }

    function setNom($_nom): void {
        $this->_nom = $_nom;
    }

    function setAdresse($_adresse): void {
        $this->_adresse = $_adresse;
    }

    function setAdresseMail($_adresseMail): void {
        $this->_adresseMail = $_adresseMail;
    }

    function setTel($_tel): void {
        $this->_tel = $_tel;
    }


}
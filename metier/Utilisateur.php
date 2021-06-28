<?php
/**
 * Description of Don
 *
 * @author Vincent
 */
class Utilisateur {
    private $_id;
    private $_nom;
    private $_prenom;
    private $_adresseMail;
    private $_password;
    private $_inscriptionDate;
    private $_statut;
    
    
    
    function __construct($id, $nom, $prenom, $adresseMail, $password, $inscriptionDate, $statut) {
        $this->setId($id);
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setAdresseMail($adresseMail);
        $this->setPassword($password);
        $this->setInscriptionDate($inscriptionDate);
        $this->setStatut($statut);
    }

    function id() {
        return $this->_id;
    }

    function nom() {
        return $this->_nom;
    }
    
    function prenom() {
        return $this->_prenom;
    }
    
    function adresseMail() {
        return $this->_adresseMail;
    }
    
    function adresse() {
        return $this->_adresse;
    }
    
    function password() {
        return $this->_password;
    }
    
    function inscriptionDate() {
        return $this->_inscriptionDate;
    }
    
    function statut() {
        return $this->_statut;
    }
    
    function setId($id): void {
        $this->_id = $id;
    }

    function setNom($nom): void {
        $this->_nom = $nom;
    }

    function setPrenom($prenom): void {
        $this->_prenom = $prenom;
    }

    function setAdresseMail($adresseMail): void {
        $this->_adresseMail = $adresseMail;
    }

    function setPassword($password): void {
        $this->_password = $password;
    }

    function setInscriptionDate($inscriptionDate): void {
        $this->_inscriptionDate = $inscriptionDate;
    }

    function setStatut($statut): void {
        $this->_statut = $statut;
    }
 
}
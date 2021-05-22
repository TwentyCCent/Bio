<?php
/**
 * Description of Don
 *
 * @author Vincent
 */
class Don {
    private $_id;
    private $_designation;
    private $_quantite;
    
    public function __construct($id, $designation, $quantite) {
        $this->setId($id);
        $this->setDesignation($designation);
        $this->setQuantite($quantite);
    }
    function id() {
        return $this->_id;
    }

    function designation() {
        return $this->_designation;
    }
    
    function quantite() {
        return $this->_quantite;
    }
    
    function setId($id): void {
        $this->_id = $id;
    }
    
    function setDesignation($designation): void {
        $this->_designation = $designation;
    }
    
    function setQuantite($quantite): void {
        $this->_quantite = $quantite;
    }
    
}
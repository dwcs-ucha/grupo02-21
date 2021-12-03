<?php

/**
 * Description of Admin
 *
 * @author Oscar González Martínez
 * Clase Admin - Proyecto DAWT-DWCS
 */
class Usuario extends Persona {

    //put your code here
    private $address;

    public function __construct( $rol,$login, $name, $passWord, $surName, $eMail, $address) {
        parent::__construct( $rol,$login, $name, $passWord, $surName, $eMail);
        $this->address = $address;
    }
    public function formatUsuario() {
        $array = parent::formatPerson();
        $array[] = $this->address;
        return $array;
    }
    
    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address): void {
        $this->address = $address;
    }
}

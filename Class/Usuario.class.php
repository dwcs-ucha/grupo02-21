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
    //Metodo booleano.
    //1 = usuario activado
    //0 = usuario inactivo.
    private $active;

    public function __construct( $rol,$login, $name, $passWord, $surName, $eMail, $address,$active) {
        parent::__construct( $rol,$login, $name, $passWord, $surName, $eMail);
        $this->address = $address;
        $this->active = $active;
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

    public function getActive(){
        return $this->active;
    }

    public function setActive($active) {
        $this->active = $active;
    }
}

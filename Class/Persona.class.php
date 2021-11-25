<?php

/**
 * Description of Persona
 *
 * @author Oscar González Martinez
 * Clase Persona, Proyecto DAW-DWCS
 */
abstract class Persona {

    private $login;
    private $name;
    private $passWord;
    private $surName;
    private $eMail;
    private $rol;

    public function __construct($login, $name, $surName, $passWord,  $eMail, $rol) {
        $this->login = $login;
        $this->name = $name;
        $this->surName = $surName;
        $this->passWord = $passWord;        
        $this->eMail = $eMail;
        $this->rol = $rol;
    }

    // Formatear la salida para que la escritura sea más fácil
    public function formatPerson() {
        $user = array($this->rol,
            $this->login,
            $this->passWord,
            $this->name,
            $this->surName,
            $this->eMail,
            $this->rol);
        return $user;
    }
    
    public function getLogin() {
        return $this->login;
    }

    public function getName() {
        return $this->name;
    }

    public function getPassWord() {
        return $this->passWord;
    }

    public function getSurName() {
        return $this->surName;
    }

    public function getEMail() {
        return $this->eMail;
    }

    public function getRol() {
        return $this->rol;
    }

    public function setLogin($login): void {
        $this->login = $login;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setPassWord($passWord): void {
        $this->passWord = $passWord;
    }

    public function setSurName($surName): void {
        $this->surName = $surName;
    }

    public function setEMail($eMail): void {
        $this->eMail = $eMail;
    }

    public function setRol($rol): void {
        $this->rol = $rol;
    }



}

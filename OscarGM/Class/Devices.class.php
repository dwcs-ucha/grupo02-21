<?php
    //Autor: Oscar González Martínez
    //Fecha: 27/11/21
    //Version: 0.1
    //Clase: Electrodomesticos.

class Devices {
    
    /* 
        Definición de Atributos de la clase.
    */
    private $name;
    private $number;
    private $power;    
    private $hours;

    /* 
        Constructor de clase.
    */

    public function  __construct($name,$number,$power,$hours){
        $this->name = $name;
        $this->number = $number;
        $this->power = $power;
        $this->hours = $hours;
    }

    /*     
        Getters
    */

    public function getName(){
        return $this->name;
    }

    public function getNumber(){
        return $this->number;
    }

    public function getPower() {
        return $this->power;
    }
    
    public function getHours() {
        return $this->hours;
    }

    /* 
        Setters
    */

    public function setName($name){
        $this->name = $name;
    }

    public function setNumber($number){
        $this->number = $number;
    }

    public function setPower($power){
        $this->power = $power;
    }

    public function setHours($hours){
        $this->hours = $hours;
    }

    //Metodos 

    /* 
        KW/h dia
    */

    public function daily(){
        return $this->power * $this->hours * 24;
    }

    /* 
        Kw/h mes.
    */

    public function monthly(){
        return $this->daily() * 30;
    }

    /* 
        Cargar Datos.
    */ 

    


}

?>
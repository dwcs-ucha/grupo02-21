<?php
    //Autor: Oscar González Martínez
    //Fecha: 27/11/21
    //Version:1.0
    //Clase: Electrodomesticos.

class Devices {

    public static $data = array("nevera","congelador 200 litros (Bajo Consumo)","Cocina electrica (4 Fogones)","Horno Electrico","Plancha","Licuadora","Cafetera Eléctrica","Lavadora","Secadora de Ropa","Bombillas exteriores","Bombillas interiores","Bombillas de bajo consumo exteriores","Bombillas de bajo consumo interiores","Televisor de 20 pulgadas","Televisor plasma de 42 Pulgadas","Aire Acondicionado de 12000","Calentador de Agua","Secador de Pelo","Ventilador","Telefono Inalambrico","Reproductor de DVDs","Ordenador de Sobremesa","Ordenador Portátil","Impresora","Router Inalambrico","Otro");
    
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
        return ($this->power * $this->hours * $this->number)/1000;
    }

    /* 
        Kw/h mes.
    */

    public function monthly(){
        return $this->daily() * 30;
    }

    public function __toString()
    {
       return $this->name . "," . $this->number . "," . $this->power . "," . $this->hours;
    }

    


}

?>
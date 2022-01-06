<?php
/**
*@author Alexia Caride Yáñez
*@modificado 19/11/2021
*@version 01
*/
class claseCalcAlexia {
    //Atributos
    private $comida;
    private $litrosC;
    private $litrosV;
    private $ahorroA;
    private $co2C;
    private $co2V;
    private $co2Ahorro;
    private $mC;
    private $mV;
    private $mAhorro;

    //Constructor
    public function __construct($comida, $litrosC, $litrosV, $ahorroA, $co2C, $co2V, $co2Ahorro, $mC, $mV, $mAhorro) {
        $this->comida = $comida;
        $this->litrosC = $litrosC;
        $this->litrosV = $litrosV;
        $this->ahorroA = $ahorroA;
        $this->co2C = $co2C;
        $this->co2V = $co2V;
        $this->co2Ahorro = $co2Ahorro;
        $this->mC = $mC;
        $this->mV = $mV;
        $this->mAhorro = $mAhorro;
    }

    //Metodos
    public function getComida()
    {
        return $this->comida;
    }
    //Calcula los litros de la ración en su versión de carne
    public function litrosCRacion($raciones){
        $raciones=intval($raciones);
        $resultado=$this-> litrosC * $raciones;
        return $resultado;
    }
    //Calcula los litros de la ración en una versión Plant-based
    public function litrosVRacion($raciones) {
        $resultado=$this-> litrosV * $raciones;
        return $resultado;
    }
    //Calcula el CO2 de la ración en su versión de carne
    public function co2CRacion($raciones){
        $raciones=intval($raciones);
        $resultado=$this-> co2C * $raciones;
        return $resultado;
    }
    //Calcula el CO2 de la ración en una versión Plant-based
    public function co2VRacion($raciones) {
        $resultado=$this-> co2V * $raciones;
        return $resultado;
    }
   
    //Calcula la superficie de la ración en su versión de carne
    public function m2CRacion($raciones){
        $raciones=intval($raciones);
        $resultado=$this-> mC * $raciones;
        return $resultado;
    }
    //Calcula la superficie de la ración en una versión Plant-based
    public function m2VRacion($raciones) {
        $resultado=$this-> mV * $raciones;
        return $resultado;
    }   
    public function getAhorroA()
    {
        return $this->ahorroA;
    }
    public function getCo2Ahorro()
    {
        return $this->co2Ahorro;
    }
    public function getMAhorro()
    {
        return $this->mAhorro;
    }
}

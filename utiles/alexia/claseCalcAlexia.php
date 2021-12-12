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
    private $ahorro;
    //Constructor
    public function __construct($comida, $litrosC, $litrosV, $ahorro) {
        $this->comida = $comida;
        $this->litrosC = $litrosC;
        $this->litrosV = $litrosV;
        $this->ahorro = $ahorro;
    }
    //Metodos
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
    //Muestra por pantalla el resultado del calculo
    public function resultado($raciones){
        echo "<p>Hoxe comendo ".$this->comida." gastaches ".$this->litrosCRacion($raciones)."L, que corresponden a ".($this->litrosCRacion($raciones)/80)." duchas de 80L</p>";
        echo "<p>Se o cambiaras por unha opción de carne vexetal, gastarías".$this->litrosVRacion($raciones)."L, que corresponden a ".($this->litrosVRacion($raciones)/80)." duchas de 80L</p>";
        echo "<p>Isto sería un aforro de ".$this->ahorro."% de auga</p>";
        if(intval($raciones)>1){
            echo "<p>Cálculos feitos en base a ".$raciones." racions, para máis información podes visitar @heurafoods.es no Instagram</p>";
        }else echo "<p>Cálculos feitos en base a ".$raciones." ración, para máis información podes visitar @heurafoods.es no Instagram</p>";
    }
}

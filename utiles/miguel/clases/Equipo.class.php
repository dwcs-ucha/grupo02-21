<?php
/* 
 * Clase para equipos de nuestra calculadora
 * Debe calcular los KWh por año del equio
 * 
 * @author Miguel A García Fustes
 * @date 2 de diciembre de 2021
 * @version 1.0.0
 */

 abstract class Equipo 
 {
     protected $unidades;
     protected $potencia;
     protected $nombre;
     protected $categoria;

     public function __construct($nombre, $potencia, $unidades, $categoria)
     {
         $this->potencia = floatval($potencia);
         $this->unidades = floatval($unidades);
         $this->nombre = $nombre;
         $this->categoria = $categoria;
     }

     /**
      * Método que calcula el consumo anual de nuestro equipo
      */
     public abstract function getConsumo();

     public function getCategoria() {
         return $this->categoria;
     }

     public function getNombre() {
         return $this->nombre;
     }
 }
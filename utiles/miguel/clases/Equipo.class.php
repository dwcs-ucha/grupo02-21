<?php
/* 
 * Clase para equipos de nuestra calculadora
 * Debe calcular los KWh por año del equio
 * 
 * @author Miguel A García Fustes
 * @date 2 de diciembre de 2021
 * @version 1.0.0
 */

 class Equipo 
 {
     protected $nombre;
     protected $unidades;

     public function __construct($nombre, $unidades)
     {
         $this->nombre = $nombre;
         $this->unidades = $unidades;
     }


 }
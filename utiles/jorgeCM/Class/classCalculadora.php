<?php
/*
/*
 * Author: Jorge Carreño Miranda
 * Version:1.0.0
 * Last modified: 02/12/2021
 */
 class vivienda{
     private $calfaccion;
     private $ACS;
     private $refrigeración;
     private $datosVivienda;
     private $superficie;
     private $altitud;
     private $potenciaPunta;
     
     public function __construct($calfaccion, $ACS, $refrigeración, $datosVivienda, $superficie, $altitud, $potenciaPunta) {
         $this->calfaccion = $calfaccion;
         $this->ACS = $ACS;
         $this->refrigeración = $refrigeración;
         $this->datosVivienda = $datosVivienda;
         $this->superficie = $superficie;
         $this->altitud = $altitud;
         $this->potenciaPunta = $potenciaPunta;
     }
     
     public function getCalfaccion() {
         return $this->calfaccion;
     }

     public function getACS() {
         return $this->ACS;
     }

     public function getRefrigeración() {
         return $this->refrigeración;
     }

     public function getDatosVivienda() {
         return $this->datosVivienda;
     }

     public function getSuperficie() {
         return $this->superficie;
     }

     public function getAltitud() {
         return $this->altitud;
     }

     public function getPotenciaPunta() {
         return $this->potenciaPunta;
     }


 }
 
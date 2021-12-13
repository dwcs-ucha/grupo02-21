<?php
/* 
 * Clase para la gestión de usuario de mi calculadora avanzada
 * 
 * @author Miguel A García Fustes
 * @date 13 de Diciembre de 2021
 * @version 1.0.0
 */

 class DatosCalculadoraAvanzada 
 {
     private $user;
     private $data;
     /**
      * Método constructor
      *
      * @param Persona  $user El usuario registrado que envía la información
      * @param array    $data Los datos del formulario de la vivienda del usuario
      *
      * @return object
      */
     public function __construct(Persona $user, array $data)
     {
        $this->user = $user;
        $this->data = json_encode($data);
     }

     /**
      * Método que devuelve los datos para almacenar en csv
      *
      * @return array 
      */
     public function formatData() {
        $array = array();
        $array[] = $this->user->getLogin();
        $array[] = $this->data;

        return $array;
     }
 }
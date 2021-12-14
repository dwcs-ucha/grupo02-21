<?php
/* 
 * Clase para la gestión de usuario de mi calculadora avanzada
 * 
 * @author Miguel A García Fustes
 * @date 13 de Diciembre de 2021
 * @version 1.0.0
 */

$estaRuta = dirname(__FILE__);

include $estaRuta . '/../DAO/DAO.class.php';

class DatosCalculadoraAvanzada
{
   private $data;
   private $user;

   /**
    * Método constructor
    *
    * @param string  $user El usuario registrado que envía la información
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
   public function formatData()
   {
      $array = array();
      $array[] = $this->user->getLogin();
      $array[] = $this->data;

      return $array;
   }

   /**
    * Método que devuelve un array con los datos y equipos de la calculadora
    *
    * @return array
    */
   public function getData()
   {
      return json_decode($this->data, true);
   }

   /**
    * Método que devuelve el objeto del usuario
    *
    * @return string
    */
   public function getUserName()
   {
      return $this->user->getLogin();
   }

   public function guardarDatos()
   {
      DAO::insertDataCalc($this);
   }

   /**
    * Método que pasa los datos obtenidos del archivo a array
    * 
    * @param string $data El dato del archivo
    *
    * @return array
    */
   public static function __toArray($data) {
      return json_decode($data, true);
   }
}

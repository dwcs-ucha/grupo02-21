<?php
/*
* Author: Ruben Dopico Novo
* Version: 1.0.0
* Last Time Updated: 12/12/2021
*/
?>
<?php

class Calc
{

    private static $utils = ['Lib' => 'Libro', 'Com' => 'Comic', 'Manga' => 'Manga', 'PIDC' => 'Papel Ixiénico Doble Capa', 'PI' => 'Papel Ixiénico', 'Cuad' => 'Cuaderno'];
    private static $consumptions = ['Lib' => 10, 'Com' => 10, 'Manga' => 10, 'PIDC' => 3.6, 'Cuad' => 10, 'PI' => 7.2];


    /**
     * Calcular el agua gastada
     * @param String $util
     * @param int $unidades
     * 
     * @return mixed
     */
    public static function calcularAuga(String $util, int $unidades)
    {
        $consumption = self::$consumptions[$util];
        $calc = $consumption * $unidades;
        return $calc;
    }

     /**
     * Recoger el array de datos
     *  
     * @return array
     */

    public static function getUtils() {
        return self::$utils;
    }

    /**
     * Recoger un elmento del array de datos
     *  
     * @return String
     */

    public static function getUtil(String $util) {
        return self::$utils[$util];
    }

    /**
     * Calcular el agua gastada en funcion de un lavado de manos
     * 
     * @param mixed
     * 
     * @return mixed
     */

     public static function calculoLavManos($lit) {
        $calc = $lit / 12;
        return $calc;
     }
}

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

    private static $utils = ['Libro' => 'Libro', 'Comic' => 'Comic', 'Manga' => 'Manga', 'Papel Ixiénico Doble Capa' => 'Papel Ixiénico Doble Capa', 'Papel Ixiénico' => 'Papel Ixiénico'];
    private static $consumptions = ['Libro' => 10, 'Comic' => 10, 'Manga' => 10, 'Papel Ixiénico Doble Capa' => 3.6, 'Cuaderno' => 10, 'Papel Ixiénico' => 7.2];


    public static function calcularAuga($util, $unidades)
    {
        $consumption = self::$consumptions[$util];
        $calc = $consumption * $unidades;
        return $calc;
    }

    public static function getUtils() {
        return self::$utils;
    }
}

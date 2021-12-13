<?php
/* 
 * Calculadora avanzada
 * Solicitar al usuario los electrodomésticos de la cocina
 * @author Miguel A García Fustes
 * @date  de  de 2021
 * @version 1.0.0
 */

$tab = 'cocina';
$tabNombre = 'Cociña';
$datos = array(
    array("tipo" => "1", "potencia" => 150, "unidad" => "W", "id" => "extractor", "nombre" => "Extractor", "horas" => 10, "min" => 0),
    array("tipo" => "2", "potencia" => 150, "unidad" => "W", "id" => "nevera", "nombre" => "Refrixerador"),
    array("tipo" => "1", "potencia" => 800, "unidad" => "W", "id" => "microondas", "nombre" => "Microondas", "horas" => 1, "min" => 0),
    array("tipo" => "3", "potencia" => 0.845, "unidad" => "kWh/Lavado", "id" => "lavavajillas", "nombre" => "Lavavaixelas", "usos_semanales" => 3),
    array("tipo" => "1", "potencia" => 1200, "unidad" => "W", "id" => "horno", "nombre" => "Forno", "horas" => 2, "min" => 0),
    array("tipo" => "1", "potencia" => 1100, "unidad" => "W", "id" => "tostadora", "nombre" => "Tostadora", "horas" => 0, "min" => 25),
    array("tipo" => "3", "potencia" => 0.20, "unidad" => "kWh/uso", "id" => "cafetera", "nombre" => "Cafeteira", "usos_semanales" => 7),
    array("tipo" => "1", "potencia" => 1200, "unidad" => "W", "id" => "batidora", "nombre" => "Batidora", "horas" => 2, "min" => 0),
    array("tipo" => "1", "potencia" => 1500, "unidad" => "W", "id" => "induccion", "nombre" => "Cociña de inducción", "horas" => 10, "min" => 0),
    array("tipo" => "1", "potencia" => 2500, "unidad" => "W", "id" => "batidora", "nombre" => "Cociña vitrocerámica", "horas" => 10, "min" => 0),
);


include 'tablaequipos.php';

?>
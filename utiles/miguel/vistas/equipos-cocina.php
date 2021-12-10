<?php
/* 
 * Calculadora avanzada
 * Solicitar al usuario los electrodomésticos de la cocina
 * @author Miguel A García Fustes
 * @date  de  de 2021
 * @version 1.0.0
 */

$tab = 'cocina';
$tabNombre = 'Cocina';
$aparatos = array(
    array("tipo" => "1", "default" => 150, "unidadDefault" => "W", "id" => "extractor", "nombre" => "Extractor", "horas" => 10, "minutos" => 0),
    array("tipo" => "2", "default" => 150, "unidadDefault" => "W", "id" => "nevera", "nombre" => "Nevera"),
    array("tipo" => "1", "default" => 800, "unidadDefault" => "W", "id" => "microondas", "nombre" => "Microondas", "horas" => 1, "minutos" => 0),
    array("tipo" => "3", "default" => 0.845, "unidadDefault" => "kWh/Lavado", "id" => "lavavajillas", "nombre" => "Lavavajillas", "usos" => 3),
    array("tipo" => "1", "default" => 1200, "unidadDefault" => "W", "id" => "horno", "nombre" => "Horno", "horas" => 2, "minutos" => 0),
    array("tipo" => "1", "default" => 1100, "unidadDefault" => "W", "id" => "tostadora", "nombre" => "Tostadora", "horas" => 0, "minutos" => 25),
    array("tipo" => "3", "default" => 0.20, "unidadDefault" => "kWh/uso", "id" => "cafetera", "nombre" => "Cafetera", "usos" => 7),
    array("tipo" => "1", "default" => 1100, "unidadDefault" => "W", "id" => "tostadora", "nombre" => "Tostadora", "horas" => 0, "minutos" => 25),
    array("tipo" => "1", "default" => 1200, "unidadDefault" => "W", "id" => "batidora", "nombre" => "Batidora", "horas" => 2, "minutos" => 0),
    array("tipo" => "1", "default" => 1500, "unidadDefault" => "W", "id" => "induccion", "nombre" => "Cocina de inducción", "horas" => 10, "minutos" => 0),
    array("tipo" => "1", "default" => 2500, "unidadDefault" => "W", "id" => "batidora", "nombre" => "Cocina vitrocerámica", "horas" => 10, "minutos" => 0),
);

include 'tablaequipos.php';

?>
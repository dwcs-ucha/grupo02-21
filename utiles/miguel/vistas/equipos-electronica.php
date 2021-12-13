<?php
/* 
 * Calculadora avazada
 * Solicitud al usuario de todos tipo de aparatos electrónicos
 * @author Miguel A García Fustes
 * @date  de  de 2021
 * @version 1.0.0
 */

$tab = 'electronica';
$tabNombre = 'Electrónica';
$datos = array(
    array("tipo" => "1", "potencia" => 250, "unidad" => "W", "id" => "televisor", "nombre" => "Televisor", "horas" => 20, "min" => 0),
    array("tipo" => "1", "potencia" => 16, "unidad" => "W", "id" => "router", "nombre" => "Router", "horas" => 168, "min" => 0),
    array("tipo" => "1", "potencia" => 80, "unidad" => "W", "id" => "ordenador", "nombre" => "Ordenador", "horas" => 18, "min" => 0),
    array("tipo" => "1", "potencia" => 2200, "unidad" => "W", "id" => "secador", "nombre" => "Secador", "horas" => 0, "min" => 40),
    array("tipo" => "1", "potencia" => 150, "unidad" => "W", "id" => "videojuegos", "nombre" => "Consola videoxogos", "horas" => 3, "min" => 0),
    array("tipo" => "1", "potencia" => 110, "unidad" => "W", "id" => "manta", "nombre" => "Manta eléctrica", "horas" => 1, "min" => 30),
);

include 'tablaequipos.php';

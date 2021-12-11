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
$aparatos = array(
    array("tipo" => "1", "default" => 250, "unidadDefault" => "W", "id" => "televisor", "nombre" => "Televisor", "horas" => 20, "minutos" => 0),
    array("tipo" => "1", "default" => 16, "unidadDefault" => "W", "id" => "router", "nombre" => "Router", "horas" => 168, "minutos" => 0),
    array("tipo" => "1", "default" => 80, "unidadDefault" => "W", "id" => "ordenador", "nombre" => "Ordenador", "horas" => 18, "minutos" => 0),
    array("tipo" => "1", "default" => 2200, "unidadDefault" => "W", "id" => "secador", "nombre" => "Secador", "horas" => 0, "minutos" => 40),
    array("tipo" => "1", "default" => 150, "unidadDefault" => "W", "id" => "videojuegos", "nombre" => "Consola videojuegos", "horas" => 3, "minutos" => 0),
    array("tipo" => "1", "default" => 110, "unidadDefault" => "W", "id" => "manta", "nombre" => "Manta eléctrica", "horas" => 1, "minutos" => 30),
);

include 'tablaequipos.php';

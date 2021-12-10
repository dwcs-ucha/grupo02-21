<?php
/* 
 * Calculadora avazada
 * Solicitar al usuario los electrodomésticos de limpieza
 * @author Miguel A García Fustes
 * @date  de  de 2021
 * @version 1.0.0
 */

$tab = 'limpieza';
$tabNombre = 'Limpieza';
$aparatos = array(
    array("tipo" => "3", "default" => 0.665, "unidadDefault" => "kWh/uso", "id" => "lavadora", "nombre" => "Lavadora", "usos" => 3),
    array("tipo" => "1", "default" => 1200, "unidadDefault" => "W", "id" => "plancha", "nombre" => "Plancha", "horas" => 2, "minutos" => 0),
    array("tipo" => "1", "default" => 600, "unidadDefault" => "W", "id" => "aspiradora", "nombre" => "Aspiradora", "horas" => 2, "minutos" => 0),
    array("tipo" => "3", "default" => 1.0595, "unidadDefault" => "kWh/uso", "id" => "secadora", "nombre" => "Secadora", "usos" => 3),
);

include 'tablaequipos.php';

?>
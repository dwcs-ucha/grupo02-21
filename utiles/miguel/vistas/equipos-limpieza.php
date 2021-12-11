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
$datos = array(
    array("tipo" => "3", "potencia" => 0.665, "unidad" => "kWh/uso", "id" => "lavadora", "nombre" => "Lavadora", "usos_semanales" => 3),
    array("tipo" => "1", "potencia" => 1200, "unidad" => "W", "id" => "plancha", "nombre" => "Plancha", "horas" => 2, "min" => 0),
    array("tipo" => "1", "potencia" => 600, "unidad" => "W", "id" => "aspiradora", "nombre" => "Aspiradora", "horas" => 2, "min" => 0),
    array("tipo" => "3", "potencia" => 1.0595, "unidad" => "kWh/uso", "id" => "secadora", "nombre" => "Secadora", "usos_semanales" => 3),
);

include 'tablaequipos.php';

?>
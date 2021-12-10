<?php
/* 
 * Calculadora avazada
 * Componente para solicitar electrodomésticos relacionados con la climatización
 * @author Miguel A García Fustes
 * @date  de  de 2021
 * @version 1.0.0
 */

$tab = 'climatizacion';
$tabNombre = 'Climatización';
$aparatos = array(
    array("tipo" => "1", "default" => 1200, "unidadDefault" => "W", "id" => "termo", "nombre" => "Termo eléctrico", "horas" => 15, "minutos" => 0),
    array("tipo" => "1", "default" => 2000, "unidadDefault" => "W", "id" => "estufa", "nombre" => "Estufa eléctrica", "horas" => 7, "minutos" => 0),
    array("tipo" => "1", "default" => 800, "unidadDefault" => "W", "id" => "aire-calefaccion", "nombre" => "Aire acondicionado (calefacción)", "horas" => 28, "minutos" => 0),
    array("tipo" => "1", "default" => 900, "unidadDefault" => "W", "id" => "aire-refrigeracion", "nombre" => "Aire acondicionado (refrigeración)", "horas" => 35, "minutos" => 0),
    array("tipo" => "1", "default" => 100, "unidadDefault" => "W", "id" => "ventilador", "nombre" => "Ventilador", "horas" => 35, "minutos" => 0),
    
);

include 'tablaequipos.php';

?>
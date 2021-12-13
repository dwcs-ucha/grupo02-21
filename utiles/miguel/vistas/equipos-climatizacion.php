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
$datos = array(
    array("tipo" => "1", "potencia" => 1200, "unidad" => "W", "id" => "termo", "nombre" => "Termo eléctrico", "horas" => 15, "min" => 0),
    array("tipo" => "1", "potencia" => 2000, "unidad" => "W", "id" => "estufa", "nombre" => "Estufa eléctrica", "horas" => 7, "min" => 0),
    array("tipo" => "1", "potencia" => 800, "unidad" => "W", "id" => "aire-calefaccion", "nombre" => "Aire acondicionado (calefacción)", "horas" => 28, "min" => 0),
    array("tipo" => "1", "potencia" => 900, "unidad" => "W", "id" => "aire-refrigeracion", "nombre" => "Aire acondicionado (refrixeración)", "horas" => 35, "min" => 0),
    array("tipo" => "1", "potencia" => 100, "unidad" => "W", "id" => "ventilador", "nombre" => "Ventilador", "horas" => 35, "min" => 0),
    
);

include 'tablaequipos.php';

?>
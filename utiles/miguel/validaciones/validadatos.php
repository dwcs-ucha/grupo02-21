<?php
/*
* Validaciones del formulario de datos
* @author Miguel A García Fustes
* @date 9 de diciembre de 2021
* @version 1.0.0
*/

$datos = $resultados['datos'];

if (Validacion::campoVacio($datos['ciudad']))
{
    Erro::addError('error', 'El campo ciudad no puede estar vacío.');
}

?>
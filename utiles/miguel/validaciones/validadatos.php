<?php
/*
* Validaciones del formulario de datos
* @author Miguel A García Fustes
* @date 9 de diciembre de 2021
* @version 1.0.0
*/

$datos = $resultados['datos'];

// El campo ciudad es obligatorio
if (Validacion::campoVacio($datos['ciudad']))
{
    Erro::addError('Erro', 'O Campo cidade non pode estar vacío.');
}

// Comprobar que el valor de niños no es superior al de habitantes
if ($datos['nenos'] > $datos['habitantes'])
{
    Erro::addError('Erro', 'Non pode haber mais nenos que habitantes da casa.');
}
?>
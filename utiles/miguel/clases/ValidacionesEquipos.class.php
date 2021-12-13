<?php
/*
* Validaciones propias de la vista de formulario de equipos
* @author Miguel A García Fustes
* @date 10 de diciembre de 2021
* @version 1.0.0
*/

class ValidacionEquipos 
{
    /** 
     * Valida que el valor pasado es un número y es igual o mayor a 0
     * Si se pasa un máximo también comprueba que no se supera el máximo
     * 
     * @param int   $numero     Número a comprobar
     * @param string $categoria Categoría o pestaña en la que se encuentra el campo
     * @param string $campo     Nombre de campo para informar al usuario
     * @param mixed $maximo     Valor máximo. Esta variable es opcional
     */
    public static function esNumeroPositivo($numero, $categoria, $campo, $equipo, $maximo = false)
    {
        if (!is_numeric($numero) || $numero < 0) {
            Erro::addError('Erro', "O valor do <strong>campo $campo</strong> do aparello <strong>$equipo</strong>, dentro da categoría <strong>$categoria</strong> debe ser un número maior ou igual a 0");
        }

        if ($maximo && intval($numero) > $maximo) {
            Erro::addError('Erro', "O valor do campo $campo do <strong>aparello $equipo</strong>, dentro da categoría <strong>$categoria</strong> non pode ser <strong>superior a $maximo</strong>.");
        }
    }
}
<?php
/* 
    @author Ruben Dopico
*/
class Erro
{
    /**
     * Atributo en el cual iran los errores
     *
     * @var array
     */
    private static $errors = array();

    /**
     * Añadir un error con un identificador y un mensaje
     *
     * @param [type] $type
     * @param [type] $message
     * @return void
     */
    public static function addError($type, $message)
    {
        self::$errors[$type] = $message;
    }
    /**
     * Mostrar todos los errores en formato texto
     *
     * @return string
     */
    public static function showErrors()
    {
        foreach (self::$errors as $type => $message) {
            $texto = $type . ': ' . $message . '\n';
        }
        return $texto;
    }
    public static function countErros() {
        return count(self::$errors);
    }
}
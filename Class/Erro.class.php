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
    private $errors = array();

    /**
     * Añadir un error con un identificador y un mensaje
     *
     * @param [type] $type
     * @param [type] $message
     * @return void
     */
    public function addError($type, $message)
    {
        $this->errors[$type] = $message;
    }
    /**
     * Mostrar todos los errores en formato texto
     *
     * @return string
     */
    public function showErrors()
    {
        foreach ($this->errors as $type => $message) {
            $texto = $type . ': ' . $message . '\n';
        }
        return $texto;
    }
    public function countErros() {
        return count($this->errores);
    }
}
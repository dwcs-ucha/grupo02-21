<?php

/**
 * Clase validaciones.class.php
 *
 * @author luisvi
 * @email luisvaziza@gmail.com
 * @fechaDeCreación 18 nov 2021
 * @últimaModificación 03 nov 2021
 * @versión v01.04.00
 */
class Validacion {
    /*     * VARIABLES * */

    /**
     * RegEx para comprobación de contraseñas seguras.
     * Requiere de 8 a 16 caracteres y al menos una mayúscula y una minúscula.
     * 
     * @var string
     * 
     * @author Óscar González
     */
    private static string $safePassRegEx = "^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$^";

    /**
     * Expresión regular para comprobación de nombres de usuario
     * Requiere un mínimo de 4 caracteres, mayúsculas o minúsculas y los caracteres '-' y '_'.
     * No permite espacios ni caracteres especiales.
     * 
     * @var string
     */
    private static string $usernameRegEx = "/^[[:alnum:]]{4,16}$/";

    /**
     * Expresión regular para comprobar nombres.
     * Permite tildes, espacios guiones y '.
     * 
     * @var string
     */
    private static string $nameRegEx = "/^[A-zÁ-ú\s\'-]{1,20}$/";

    /**
     * Expresión regular para comprobar apellidos.
     * Permite tildes, espacios guiones y '.
     * 
     * @var string
     */
    private static string $surnameRegEx = "/^[A-zÁ-ú\s\'-]{1,30}$/";

    /**
     * Expresión regular para comprobar números.
     * Permite un número indeterminado de dígitos.
     * 
     * @var string
     */
    private static string $numberRegEx = "/^[[:digit:]]+$/";

    /** FUNCIONES * */

    /**
     * Valida que la string recibida tenga formato de dirección de email.
     * 
     * @param string $string String que se desea validar
     * @return bool Si tiene formato de email devolverá true, caso contrario, false.
     */
    public static function validarEmail(string $string): bool {
        return filter_var(trim($string), FILTER_VALIDATE_EMAIL);
    }

    /**
     * 
     * @param string $string Nombre de usuario a comprobar.
     * @return bool Indica si el nombre de usuario es correcto o no.
     */
    public static function validarLogin(string $string): bool {
        return preg_match(self::$usernameRegEx, trim($string));
    }

    /**
     * Valida la seguridad de una contraseña.
     * 
     * @param string $string Contraseña cuya seguridad se quiere comprobar.
     * @return bool Indica si la contraseña es segura o no.
     */
    public static function validarPassword(string $string): bool {
        return preg_match(self::$safePassRegEx, trim($string));
    }

    /**
     * Este método sirve para comprobar que dos cadenas de texto son idénticas. Muy útil
     * para comprobar contraseñas, por ejemplo.
     * 
     * @param string $string1 Primera cadena de texto a comprobar.
     * @param string $string2 Segunda cadena de texto a comprobar.
     * @return bool Indica si las cadenas de texto son iguales o no.
     */
    public static function comprobarStrings(string $string1, string $string2): bool {
        return strcmp(trim($string1), trim($string2)) == 0;
    }

    /**
     * Comprueba que un nombre tenga formato de nombre.
     * 
     * @param string $string Nombre cuyo formato se quiere comprobar.
     * @return bool Indica si tiene formato de nombre o no.
     */
    public static function validarNombre(string $string): bool {
        return preg_match(self::$nameRegEx, trim($string));
    }

    /**
     * Comprueba que un apellido tenga formato de apellido.
     * 
     * @param string $string Apellido cuyo formato se quiere comprobar.
     * @return bool Indica si tiene formato de nombre o no.
     */
    public static function validarApellido(string $string): bool {
        return preg_match(self::$surnameRegEx, trim($string));
    }

    /**
     * Comprueba que un número sea, en efecto, un número..
     * 
     * @param string $string Número que se quiere comprobar.
     * @return bool Indica si es un dígito o no.
     */
    public static function validarNumero(string $string): bool {
        return preg_match(self::$numberRegEx, trim($string));
    }

    /**
     * Valida cualquier campo input excepto submit o reset
     *
     * @param [type] $campo
     * @return void
     * 
     * @author rdn998
     */
    public static function campoVacio($campo)
    {
        if ((isset($campo) && empty($campo)) || !isset($campo)) {
            return true;
        }
        return false;
    }

    /**
     * Valida el campo input de tipo submit
     *
     * @param [type] $campo
     * @return void
     * 
     * @author rdn998
     */
    public static function botonPresionado($campo)
    {
        if (isset($campo)) {
            return true;
        }
        return false;
    }
}

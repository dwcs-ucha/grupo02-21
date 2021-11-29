<?php

/**
 * Clase validaciones.class.php
 *
 * @author luisvi
 * @email luisvaziza@gmail.com
 * @fechaDeCreación 18 nov 2021
 * @últimaModificación 18 nov 2021
 * @versión v01.00.00
 */
class Validacion {
    /*     * VARIABLES * */

    /**
     * <p>RegEx para comprobación de contraseñas seguras.</p>
     * <p>Requiere de 8 a 16 caracteres y al menos una mayúscula y una minúscula.</p>
     * 
     * @var string
     * 
     * @author Óscar González
     */
    private static string $safePassRegEx = "^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$^";

    /**
     * <p>Expresión regular para comprobación de nombres de usuario</p>
     * <p>Requiere un mínimo de 4 caracteres, mayúsculas o minúsculas y los caracteres '-' y '_'.
     * No permite espacios ni caracteres especiales.</p>
     * 
     * @var string
     */
    private static string $usernameRegEx = "/^[[:alnum:]]{4,16}$/";

    /**
     * <p>Expresión regular para comprobar nombres.</p>
     * <p>Permite tildes, espacios guiones y '.</p>
     * 
     * @var string
     */
    private static string $nameRegEx = "/^[A-zÁ-ú\s\'-]{1,20}$/";

    /**
     * <p>Expresión regular para comprobar apellidos.</p>
     * <p>Permite tildes, espacios guiones y '.</p>
     * 
     * @var string
     */
    private static string $surnameRegEx = "/^[A-zÁ-ú\s\'-]{1,30}$/";

    /** FUNCIONES * */

    /**
     * <p>Valida que la string recibida tenga formato de dirección de email.</p>
     * 
     * @param string $string <p>String que se desea validar</p>
     * @return bool <p>Si tiene formato de email devolverá true, caso contrario, false.</p>
     */
    public static function validarEmail(string $string): bool {
        return filter_var(trim($string), FILTER_VALIDATE_EMAIL);
    }

    /**
     * 
     * @param string $string <p>Nombre de usuario a comprobar.</p>
     * @return bool <p>Indica si el nombre de usuario es correcto o no.</p>
     */
    public static function validarLogin(string $string): bool {
        return preg_match(self::$usernameRegEx, trim($string));
    }

    /**
     * <p>Valida la seguridad de una contraseña.</p>
     * 
     * @param string $string <p>Contraseña cuya seguridad se quiere comprobar.</p>
     * @return bool <p>Indica si la contraseña es segura o no.</p>
     */
    public static function validarPassword(string $string): bool {
        return preg_match(self::$safePassRegEx, trim($string));
    }

    /**
     * <p>Este método sirve para comprobar que dos cadenas de texto son idénticas. Muy útil
     * para comprobar contraseñas, por ejemplo.</p>
     * 
     * @param string $string1 <p>Primera cadena de texto a comprobar.</p>
     * @param string $string2 <p>Segunda cadena de texto a comprobar.</p>
     * @return bool <p>Indica si las cadenas de texto son iguales o no.</p>
     */
    public static function comprobarStrings(string $string1, string $string2): bool {
        return strcmp(trim($string1), trim($string2) == 0);
    }

    /**
     * <p>Comprueba que un nombre tenga formato de nombre.</p>
     * 
     * @param string $string <p>Nombre cuyo formato se quiere comprobar.</p>
     * @return bool <p>Indica si tiene formato de nombre o no.</p>
     */
    public static function validarNombre(string $string): bool {
        return preg_match(self::$nameRegEx, trim($string));
    }

    /**
     * <p>Comprueba que un apellido tenga formato de apellido.</p>
     * 
     * @param string $string <p>Apellido cuyo formato se quiere comprobar.</p>
     * @return bool <p>Indica si tiene formato de nombre o no.</p>
     */
    public static function validarApellido(string $string): bool {
        return preg_match(self::$surnameRegEx, trim($string));
    }

    //Validación dirección
    /*
        Como tú veas.
    */
}

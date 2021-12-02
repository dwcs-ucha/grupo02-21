<?php
class BD
{

    /**
     * Insertar un usuario
     *
     * @param Usuario $user
     * @return void
     */
    public static function insertUser($user)
    {
    }

    /**
     * Recoger todos los usuarios
     *
     * @return array
     */
    public static function getUsers()
    {
    }

    /**
     * Eliminacion del usuario
     *
     * @param Usuario $user
     * @return void
     */
    public static function deleteUser($user)
    {
    }

    /**
     * Insertar un administrador
     *
     * @param Admin $admin
     * @return void
     */
    public static function insertAdmin($admin)
    {
    }

    /**
     * Recoger todos los administradores
     *
     * @return array
     */
    public static function getAdmins()
    {
    }

    /**
     * Eliminación del admin
     *
     * @param Admin $user
     * @return void
     */
    public static function deleteAdmin($admin)
    {
    }

    /**
     * Comprobación de la existencia del nombre de usuario
     *
     * @param String $login 
     * @return boolean
     */
    public static function existsUserName($login)
    {
    }
    public static function authenticateUser($login, $pass)
    {
    }
    public static function authenticateAdmin($login, $pass)
    {
    }
}

<?php
class BD
{

    /**
     * Insertar un usuario
     *
     * @param Usuario $user
     * @return void
     */
    public static function insertUser(Usuario $user)
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
    public static function deleteUser(Usuario $user)
    {
    }

    /**
     * Insertar un administrador
     *
     * @param Admin $admin
     * @return void
     */
    public static function insertAdmin(Admin $admin)
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
    public static function deleteAdmin(Admin $admin)
    {
    }

    /**
     * Comprobación de la existencia del nombre de usuario
     *
     * @param String $login 
     * @return boolean
     */
    public static function existsUserName(String $login)
    {
    }
    /**
     * Comprobar si el usuario existe en nuestra base de datos
     *
     * @param string $login Nombre de usuario
     * @param string $pass Contraseña Encriptada
     * @return mixed Devuelve un objeto Usuario o Admin
     */
    public static function authenticateUser(String $login, String $pass)
    {
    }
    /**
     * Comprobar si el usuario existe como administrador
     *
     * @param String $login Nombre de Usuario
     * @param String $pass Contraseña Encriptada
     * @return Admin Objeto de tipo admin
     */
    public static function authenticateAdmin(String $login, String $pass)
    {
    }

    /**
     * Insert un objeto articulo
     *
     * @param Publicacion $article
     * @return void
     */
    public static function insertArticle(Publicacion $article)
    {
    }
    /**
     * Recoger un objeto de tipo articulo
     *
     * @return Publicacion
     */
    public static function getArticle()
    {
    }
    /**
     * Recoger un array de tipo article
     *
     * @return array
     */
    public static function getArticles()
    {
    }

    /**
     * Comprobación de la existencia del email de usuario
     *
     * @param String $email Email a comprobar
     * @return boolean
     */
    public static function existsUserEmail($email)
    {
    }
}

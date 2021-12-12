<?php
/*
 * Author: Rubén Dopico Novo
 * Version: 2.5.0
 * Last modified: 09 12 2021
 */
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
     * Eliminación del admin o de un usuario
     *
     * @param mixed $person objeto de tipo usuario o admin
     * @return void
     */
    public static function deletePerson($person)
    {
    }

    /**
     * Modificar un Usuario
     * 
     * @param Usuario $user Objeto de usuario
     * @return void
     */
    public static function updateUser(Usuario $user)
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
    public static function existsUserEmail(String $email)
    {
    }

    /**
     * Eliminacion de un articulo dependiendo de su titulo
     * 
     * @param String $titulo Titulo del articulo a eliminar
     * 
     * @return void
     */
    public static function deleteArticle(String $titulo)
    {
    }

    /**
     * Compronbación de la existencia de un articulo
     * 
     * @param String $titulo Titulo del articulo
     * @return boolean Si existe el articulo devuelve true si no lo hace false
     */

    public static function existArticle(String $titulo)
    {
    }

    /**
     *  Modificar un artículo
     * 
     * @param String $titulo Titulo del articulo a modificar
     * @param String $cuerpo Cuerpo modificado del articulo
     * @return void
     * 
     */

    public static function updateArticle(String $titulo, String $cuerpo)
    {
    }
    /**
     * Insertar una visita
     *
     * @param Visitas $visit
     * @return void
     */
    public static function insertVisit(Visitas $visit)
    {
    }
    /**
     * Recoger un array de objetos de tipo Visitas
     *
     * @return array
     */
    private static function getVisits()
    {
    }
}

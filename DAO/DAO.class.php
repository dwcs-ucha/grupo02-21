<?php

require_once('../Class/Usuario.class.php');
require_once('../Class/Admin.class.php');
require_once('../DAO/CSV.class.php');
require_once('../DAO/BD.class.php');
require_once('../Class/Cms.class.php');
class DAO
{
    private static $idiomas = array('gallego' => 'GL', 'castellano' => 'ES', 'ingles' => 'EN');
    private static $modo = 'csv';

    /**
     * Lectura del archivo del idioma correspondiente
     *
     * @param string $idioma
     * @return array
     */
    public function readLanguage($idioma)
    {
        $type = self::$idiomas[$idioma];
        $data = CSV::readLanguage('idiomas', $type);
        if ($data != null) {
            return $data;
        }
        return null;
    }

    /**
     * Escribir en el fichero Log
     *
     * @param Log $log Objeto de la clase Log
     * @return void
     */
    public static function writeLog($log)
    {
        CSV::writeLog($log);
    }

    /**
     * Insertar un usuario
     *
     * @param Usuario $user
     * @return void
     */
    public static function insertUser($user)
    {
        if (self::$modo == 'csv') {
            CSV::insertUser($user);
        } else if (self::$modo == 'bd') {
            BD::insertUser($user);
        }
    }

    /**
     * Recoger todos los usuarios
     *
     * @return array
     */
    public static function getUsers()
    {
        $users = null;
        if (self::$modo == 'csv') {
            $users = CSV::getUsers();
        } else if (self::$modo == 'bd') {
            $users = BD::getUsers();
        }
        return $users;
    }

    /**
     * Eliminacion del usuario
     *
     * @param Usuario $user
     * @return void
     */
    public static function deleteUser(Usuario $user)
    {
        if (self::$modo == 'csv') {
            CSV::deleteUser($user);
        } else if (self::$modo == 'bd') {
            BD::deleteUser($user);
        }
    }

    /**
     * Insertar un administrador
     *
     * @param Admin $admin
     * @return void
     */
    public static function insertAdmin($admin)
    {
        if (self::$modo == 'csv') {
            CSV::insertAdmin($admin);
        } else if (self::$modo == 'bd') {
            BD::insertAdmin($admin);
        }
    }

    /**
     * Recoger todos los administradores
     *
     * @return array
     */
    public static function getAdmins()
    {
        $admins = null;
        if (self::$modo == 'csv') {
            $admins = CSV::getAdmins();
        } else if (self::$modo == 'bd') {
            $admins = BD::getAdmins();
        }
        return $admins;
    }

    /**
     * Eliminación del admin
     *
     * @param Admin $user
     * @return void
     */
    public static function deleteAdmin($admin)
    {
        if (self::$modo == 'csv') {
            CSV::deleteAdmin($admin);
        } else if (self::$modo == 'bd') {
            BD::deleteAdmin($admin);
        }
    }

    /**
     * Comprobar si el usuario existe en nuestra base de datos
     *
     * @param string $login Nombre de Usuario
     * @param string $pass Contraseña Encriptada
     * @return mixed Devuelve un objeto Usuario o Admin
     */
    public static function authenticateUser($login, $pass)
    {
        $person = '';
        if (self::$modo == 'csv') {            
            $person = CSV::authenticateUser($login, $pass);
        } else if (self::$modo == 'bd') {
            $person = BD::authenticateUser($login, $pass);
        }
        return $person;
    }

    /**
     * Comprobar si el usuario existe como administrador
     *
     * @param string $login
     * @param string $pass
     * @return Admin
     */
    public static function authenticateAdmin($login, $pass)
    {
        $person = '';
        if (self::$modo == 'csv') {
            $person = CSV::authenticateAdmin($login, $pass);
        } else if (self::$modo == 'bd') {
            $person = BD::authenticateAdmin($login, $pass);
        }
        return $person;
    }

    /**
     * Comprobar si existe el nombre usuario en nuestros datos
     *
     * @param string $login
     * @return boolean
     */
    public static function existsUserName($login)
    {
        $bool = false;
        if (self::$modo == 'csv') {
            $bool = CSV::existsUserName($login);
        } else if (self::$modo == 'bd') {
            $bool = BD::existsUserName($login);
        }
        return $bool;
    }

    /**
     * Comprobación de la existencia del email de usuario
     *
     * @param String $email Email a comprobar
     * @return boolean
     */
    public static function existsUserEmail($email)
    {
        $bool = false;
        if (self::$modo == 'csv') {
            $bool = CSV::existsUserEmail($email);
        } else if (self::$modo == 'bd') {
            $bool = BD::existsUserEmail($email);
        }
        return $bool;
    }

    /**
     * Insert un objeto articulo
     *
     * @param Publicacion $article
     * @return void
     */
    public static function insertArticle(Publicacion $article)
    {
        if (self::$modo == 'csv') {
            CSV::insertArticle($article);
        } else if (self::$modo == 'bd') {
            BD::insertArticle($article);
        }
    }
    /**
     * Recoger un objeto de tipo articulo
     *
     * @return Publicacion
     */
    /*public static function getArticle()
    {
        $article = '';
        if (self::$modo == 'csv') {
            $article = CSV::getArticle();
        } else if (self::$modo == 'bd') {
            $article = BD::getArticle();
        }
        return $article;
    }*/
    /**
     * Recoger un array de tipo article
     *
     * @return array
     */
    public static function getArticles()
    {
        $articles = array();
        if (self::$modo == 'csv') {
            $articles = CSV::getArticles();
        } else if (self::$modo == 'bd') {
            $articles = BD::getArticles();
        }
        return $articles;
    }
}

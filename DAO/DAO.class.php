<?php
/*
 * Author: Rubén Dopico Novo
 * Version: 4.8.0
 * Last modified: 07 12 2021
 */
$esteDirectorio = dirname(__FILE__) . '/';
require_once($esteDirectorio . '../Class/Persona.class.php');
require_once($esteDirectorio . '../Class/Usuario.class.php');
require_once($esteDirectorio . '../Class/Admin.class.php');
require_once($esteDirectorio . '../DAO/CSV.class.php');
require_once($esteDirectorio . '../DAO/BD.class.php');
require_once($esteDirectorio . '../Class/Cms.class.php');
require_once($esteDirectorio . '../Class/Visitas.class.php');
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
     * Eliminacion del usuario o del administrador
     *
     * @param String $login Nombre de usuario de un admin o un usuario
     * @return void
     */
    public static function deletePerson($login)
    {
        if (self::$modo == 'csv') {
            CSV::deletePerson($login);
        } else if (self::$modo == 'bd') {
            BD::deletePerson($login);
        }
    }

    /**
     * Recoger un objeto de Usuario
     * 
     * @param String login Parametro Opcional
     * @param String email Parametro Opcional
     * 
     * @return Usuario
     */
    public static function getUser($login = '', $email = '') {
        $user = null;
        if(self::$modo == 'csv') {
            $user = CSV::getUser($login ,$email);
        } else if(self::$modo == 'bd') {
            $user = BD::getUser($login, $email);
        }
        return $user;
    }

    /**
     * Modificar un Usuario
     * 
     * @param Usuario $user Objeto de usuario
     * @return void
     */
    public static function updateUser(Usuario $user)
    {
        if (self::$modo == 'csv') {
            CSV::updateUser($user);
        } else if (self::$modo == 'bd') {
            BD::updateUser($user);
        }
    }

    /**
     * Recoger un array de objetos de tipo admin y usuario
     *
     * @return array
     */
    public static function getAllUsers() {
        $allUsers = array();
        if(self::$modo == 'csv') {
            $allUsers = CSV::getAllUsers();
        }
        return $allUsers;
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
     * @param String $titulo Titulo de la publicacion
     *
     * @return Publicacion
     */
    public static function getArticle($titulo)
    {
        $article = '';
        if (self::$modo == 'csv') {
            $article = CSV::getArticle($titulo);
        } else if (self::$modo == 'bd') {
            $article = BD::getArticle($titulo);
        }
        return $article;
    }
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

    /**
     * Eliminacion de un articulo dependiendo de su titulo
     * 
     * @param String $titulo Titulo del articulo a eliminar
     * 
     * @return void
     */
    public static function deleteArticle($titulo) {
        if(self::$modo == 'csv') {
            CSV::deleteArticle($titulo);
        } else if(self::$modo == 'bd') {
            BD::deleteArticle($titulo);
        }
    }

    /**
     * Compronbación de la existencia de un articulo
     * 
     * @param String $titulo Titulo del articulo
     * @return boolean Si existe el articulo devuelve true si no lo hace false
     */
    
    public static function existsArticle($titulo) {
        $bool = false;
        if(self::$modo == 'csv') {
            $bool = CSV::existArticle($titulo);
        } else if(self::$modo == 'bd') {
            BD::existArticle($titulo);
        }
        return $bool;
    }

    /**
     *  Modificar un artículo
     * 
     * @param String $titulo Titulo del articulo a modificar
     * @param String $cuerpo Cuerpo modificado del articulo
     * @return void
     * 
     */

    public static function updateArticle($titulo, $cuerpo) {
        if(self::$modo == 'csv') {
            CSV::updateArticle($titulo, $cuerpo);
        } else if(self::$modo == 'bd') {
            BD::updateArticle($titulo, $cuerpo);
        }
    }
    
    /**
     * Insertar una visita
     *
     * @param Visitas $visit
     * @return void
     */
    public static function insertVisit(Visitas $visit) {
        if(self::$modo == 'csv') {
            CSV::insertVisit($visit);
        } else if(self::$modo == 'bd') {
            BD::insertVisit($visit);
        }
    }

    /*public static function getVisits() {
        if(self::$modo == 'csv') {
            CSV::getVisits();
        } else if(self::$modo == 'bd') {
            BD::getVisits();
        }
    }*/

    /**
     * Recoger los datos de un usuario
     *
     * @param String $username Nombre de Usuario
     * 
     * @return DatosCalculadoraAvanzada
     */

    public static function getDataCalc($username) {
        $calc = null;
        if(self::$modo == 'csv') {
            $calc = CSV::getDataCalc($username);
        }
        return $calc;
    }

    /**
     * Insertar datos de la calculadora avanzada, nombre de usuario y los datos
     * 
     * @param DatosCalculadoraAvanzada
     * 
     * @return void
     */

    public static function insertDataCalc($calc) {
        if(self::$modo == 'csv') {
            CSV::insertDataCalc($calc);
        }
    }
}
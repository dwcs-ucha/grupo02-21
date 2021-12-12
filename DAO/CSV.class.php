<?php
/*
 * Author: Rubén Dopico Novo
 * Version: 4.8.0
 * Last modified: 07 12 2021
 */
class CSV
{
    private static $files = array('users' => '../DataBase/users.csv', 'logs' => '../DataBase/logs.txt', 'idiomas' => '../DataBase/idioma', 'articulos' => '../DataBase/articulos.csv', 'visitas' => '../DataBase/visitas.csv');

    /**
     * Comprueba si el fichero pasado existe
     *
     * @param string $file Ruta del fichero
     * @return boolean Devuelve true si el fichero existe, falso si no
     */
    private static function existsFile(String $file)
    {
        if (file_exists($file)) {
            return true;
        }
        return false;
    }

    /**
     * Escribir el fichero Log, donde se guardarán los pasos del usuario
     *
     * @param Log $log Objeto de la clase Log
     * @return void
     */
    public static function writeLog(Log $log)
    {
        $file = self::$files['logs'];
        if (self::existsFile($file)) {
            if (($fp = fopen($file, 'a')) !== FALSE) {
                fwrite($fp, $log . "\n");
            }
        } else {
            if (($fp = fopen($file, 'w')) !== FALSE) {
                fwrite($fp, $log . "\n");
            }
        }
        fclose($fp);
    }
    /**
     * Obtener los textos en el idioma que se pase
     *
     * @param String $file
     * @param String $type
     * @return void
     */
    public static function readLanguage(String $file, String $type)
    {
        $data = CSV::readCSV($file, $type);
        if ($data != null) {
            return $data;
        }
        return null;
    }

    /**
     * Lectura de CSV
     *
     * @param string $file
     * @return array
     */
    private static function readCSV(String $file, String $type = 'all')
    {
        $fileData = array();
        if ($file == 'idiomas') {
            $file = self::$files[$file] . $type . '.csv';
        } else {
            $file = self::$files[$file];
        }
        if (self::existsFile($file)) {
            if (($fp = fopen($file, 'r')) !== FALSE) {
                while (($data = fgetcsv($fp, 0, ';')) !== FALSE) {
                    if ($type == 'admins' && $data[0] == 'Admin' || $type == 'all' && $data[0] == 'Admin') {
                        $admin = new Admin($data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);
                        $fileData[] = $admin;
                    } else if ($type == 'usuarios' && $data[0] == 'Usuario' || $type == 'all' && $data[0] == 'Usuario') {
                        $user = new Usuario($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7]);
                        $fileData[] = $user;
                    } else if ($type == 'GL' || $type == 'EN' || $type == 'ES') {
                        $fileData[] = $data;
                    } else if ($type == 'articulo') {
                        $article = new Publicacion($data[0], $data[1], $data[2], $data[3]);
                        $fileData[] = $article;
                    } else if ($type == 'visitas') {
                        $visit = new Visitas($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
                        $fileData[] = $visit;
                    }
                }
                return $fileData;
            }
            fclose($fp);
        }
        return null;
    }
    /**
     * Escritura de CSV
     *
     * @param string $file Clave para elegir el fichero a escribir
     * @param array $data Datos que se van a meter en el fichero
     * @return void
     */
    private static function writeCSV(String $file, array $data)
    {
        $type = '';
        if ($file == 'articulos') {
            $type = 'articulos';
        } else if ($file == 'visitas') {
            $type = 'visitas';
        }
        $file = self::$files[$file];
        if (self::existsFile($file)) {
            if (($fp = fopen($file, 'w')) !== FALSE) {
                if ($type == '') {
                    foreach ($data as $person) {
                        if ($person->getRol() == 'Admin') {
                            $object = $person->formatPerson();
                            fputcsv($fp, $object, ';');
                        } else if ($person->getRol() == 'Usuario') {
                            $object = $person->formatUsuario();
                            fputcsv($fp, $object, ';');
                        }
                    }
                } else if ($type == 'articulos') {
                    foreach ($data as $article) {
                        $object = array($article->getTitulo(), $article->getCuerpo(), $article->getCreacion(), $article->getImg());
                        fputcsv($fp, $object, ';');
                    }
                } else if ($type == 'visitas') {
                    foreach ($data as $visit) {
                        $object = $visit->formatVisit();
                        fputcsv($fp, $object, ';');
                    }
                }
            }
        }
        fclose($fp);
    }
    /**
     * Insertar un usuario
     *
     * @param Usuario $user Objeto de tipo usuario
     * @return void
     */
    public static function insertUser(Usuario $user)
    {
        $allUsers = self::getAllUsers();
        $allUsers[] = $user;
        self::writeCSV('users', $allUsers);
    }

    /**
     * Recoger todos los usuarios
     *
     * @return array Array de objetos de tipo usuario
     */
    public static function getUsers()
    {
        $users = self::readCSV('users', 'usuarios');
        if ($users != null) {
            return $users;
        }
        return null;
    }

    /**
     * Eliminacion de un usuario o un administrador
     *
     * @param String $login Nombre de Usuario de un admin o un usuario
     * @return void
     */
    public static function deletePerson($login)
    {
        $allUsers = self::getAllUsers();
        if ($allUsers != null) {
            $delete = self::getKeyPerson($login);
            unset($allUsers[$delete]);
            self::writeCSV('users', $allUsers);
        }
    }
    /**
     * Recoger la posiocion en el array del objeto que coincide con el login pasado
     *
     * @param  String $login Nombre de usuario del admin o del usuario
     * @return int Posicion del objeto en el array
     */
    private static function getKeyPerson($login)
    {
        $all = self::getAllUsers();
        if ($all != null) {
            foreach ($all as $key => $object) {
                if ($object->getLogin() == $login) {
                    return $key;
                }
            }
        }
        return null;
    }

    /**
     * Modificar un Usuario
     * 
     * @param Usuario $user Objeto de usuario
     * @return void
     */
    public static function updateUser(Usuario $user)
    {
        $allUsers = self::getAllUsers();
        if ($allUsers != null) {
            $update = self::getKeyPerson($user->getLogin());
            $allUsers[$update] = $user;
            self::writeCSV('users', $allUsers);
        }
    }

    /**
     * Recoger un array de objetos de tipo admin y usuario
     *
     * @return array
     */
    public static function getAllUsers()
    {
        $allUsers = self::readCSV('users');
        if ($allUsers != null) {
            return $allUsers;
        }
        return null;
    }

    /**
     * Insertar un administrador
     *
     * @param Admin $admin Objeto de tipo admin
     * @return void
     */
    public static function insertAdmin(Admin $admin)
    {
        $allUsers = self::getAllUsers();
        $allUsers[] = $admin;
        self::writeCSV('users', $allUsers);
    }

    /**
     * Recoger todos los administradores
     *
     * @return array Array de objetos de tipo admin
     */
    public static function getAdmins()
    {
        $admins = self::readCSV('users', 'admins');
        if ($admins != null) {
            return $admins;
        }
        return null;
    }
    /**
     * Comprobar si el usuario existe en nuestra base de datos
     *
     * @param string $login Nombre de Usuario
     * @param string $pass Contraseña Encriptada
     * @return mixed Devuelve un objeto Usuario o Admin
     */
    public function authenticateUser(String $login, String $pass)
    {
        $allUsers = self::getAllUsers();
        if ($allUsers != null) {
            foreach ($allUsers as $person) {
                if ((strcmp(strtolower($login), strtolower($person->getLogin())) == 0) && (Persona::validate_pw($pass, $person->getPassWord()))) {
                    return $person;
                }
            }
        }
        return null;
    }

    /**
     * Comprobar si el usuario existe como administrador
     *
     * @param string $login Nombre de Usuario
     * @param string $pass Contraseña Encriptada
     * @return Admin Objeto de tipo admin
     */
    public function authenticateAdmin(String $login, String $pass)
    {
        $data = self::getAllUsers();
        if ($data != null) {
            foreach ($data as $person) {
                if ($person->getRol() == 'Admin') {
                    if ((strcmp(strtolower($login), strtolower($person->getLogin())) == 0) && (Persona::validate_pw($pass, $person->getPassWord()))) {
                        return $person;
                    }
                }
            }
        }
        return null;
    }

    /**
     * Comprobación de la existencia del nombre de usuario
     *
     * @param String $login Nombre de Usuario
     * @return boolean True si existe, False si no existe
     */
    public static function existsUserName(String $login)
    {
        $allUsers = CSV::getAllUsers();
        if ($allUsers != null) {
            foreach ($allUsers as $person) {
                if (strcmp($person->getLogin(), $login) == 0) {
                    return true;
                }
            }
        }
        return false;
    }
    /**
     * Comprobación de la existencia del email de usuario
     *
     * @param String $email Email a comprobar
     * @return boolean
     */
    public static function existsUserEmail(String $email)
    {
        $allUsers = CSV::getAllUsers();
        if ($allUsers != null) {
            foreach ($allUsers as $person) {
                if (strcmp($person->getEmail(), $email) == 0) {
                    return true;
                }
            }
        }
        return false;
    }
    /**
     * Insert un objeto articulo
     *
     * @param Publicacion $article
     * @return void
     */
    public static function insertArticle(Publicacion $article)
    {
        $articles = self::getArticles();
        $articles[] = $article;
        self::writeCSV('articulos', $articles);
    }

    /**
     * Recoger un array de tipo article
     *
     * @return array
     */
    public static function getArticles()
    {
        $data = self::readCSV('articulos', 'articulo');
        if ($data != null) {
            return $data;
        }
        return null;
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
        $articles = self::getArticles();
        if ($articles != null) {
            $delete = self::getKeyArticle($titulo);
            unset($articles[$delete]);
            self::writeCSV('articulos', $articles);
        }
    }

    /**
     * Recoger la posiocion en el array de un objeto articulo que coincide con el titulo pasado
     *
     * @param  String $titulo Titulo del articulo
     * @return int Posicion del objeto en el array
     */
    private static function getKeyArticle(String $titulo)
    {
        $articles = self::getArticles();
        if ($articles != null) {
            foreach ($articles as $key => $article) {
                if ($article->getTitulo() == $titulo) {
                    return $key;
                }
            }
        }
        return null;
    }

    /**
     * Recoger un objeto de tipo articulo
     *
     * @param String $titulp
     * 
     * @return Articulo
     */
    public static function getArticle(String $titulo)
    {
        $articles = self::getArticles();
        if ($articles != null) {
            foreach ($articles as $article) {
                if ($article->getTitulo() == $titulo) {
                    return $article;
                }
            }
        }
        return null;
    }

    /**
     * Comprobación de la existencia de un articulo
     * 
     * @param String $titulo Titulo del articulo
     * @return boolean Si existe el articulo devuelve true si no lo hace false
     */
    public static function existArticle(String $titulo)
    {
        $bool = false;
        $articles = self::getArticles();
        foreach ($articles as $article) {
            if ($article->getTitulo() == $titulo) {
                $bool = true;
            }
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

    public static function updateArticle(String $titulo, String $cuerpo)
    {
        $article = self::getArticle($titulo);
        $key = self::getKeyArticle($titulo);
        $articles = self::getArticles();
        $article->setCuerpo($cuerpo);
        $articles[$key] = $article;
        self::writeCSV('articulos', $articles);
    }

    /**
     * Insertar una visita
     *
     * @param Visitas $visit
     * @return void
     */
    public static function insertVisit(Visitas $visit)
    {
        $visits = self::getVisits();
        $visits[] = $visit;
        self::writeCSV('visitas', $visits);
    }

    /**
     * Recoger un array de objetos de tipo Visitas
     *
     * @return array
     */
    private static function getVisits()
    {
        $visits = self::readCSV('visitas');
        return $visits;
    }
}

<?php

class CSV
{
    private $files = array('users' => 'users.csv');

    /**
     * Comprueba si el fichero pasado existe
     *
     * @param string $file Nombre del fichero
     * @return boolean Devuelve true si el fichero existe, falso si no
     */
    private static function existsFile($file)
    {
        if (file_exists($file)) {
            return true;
        }
        return false;
    }

    /**
     * Método que devuelve todos los datos de un archivo CSV
     * @param string $filename Nombre del archivo CSV
     * 
     * @return mixed Devuelve array con los datos / false si falla la conexión.
     */
    public static function readCsvRows($filename, $includeHeader = true)
    {
        $rows = array();
        if ($fs = fopen($filename, 'r')) {
            // Leer el contenido del archivo y pasar cada fila como un array
            // Devuelve un array multidimensional
            while ($row = fgetcsv($fs, 0, ",")) {
                $rows[] = $row;
            }
            // Si no se pide la cabecera eliminarla del array
            if (!$includeHeader) {
                unset($rows[0]);
            }
        }
        fclose($fs);
        return $rows;
    }

    /**
     * Método que almacena los datos de un array multidimensional en un fichero CSV
     * 
     * @param array $rows Los datos a almacenar
     * @param string $filename Nombre del fichero
     * @return boolean  
     */
    /*public static function writeCSVRows($rows, $filename)
    {
        if ($fs = fopen($filename, 'w')) {
            foreach ($rows as $row) {
                fputcsv($fs, $row);
            }
        }
        fclose($fs);
    }*/

    /**
     * Método que añade un solo registro al final de la tabla de un fichero CSV
     * 
     * @param string $filename Nombre del fichero
     * @param array $row Datos de la fila a almacenar
     * @return boolean
     */
    /*public static function appendCsvRow($filename, $row)
    {
        if ($fs = fopen($filename, 'a')) {
            fputcsv($fs, $row);
        }
        fclose($fs);
    }*/
    /**
     * Método para obtener las cabeceras del archivo
     * 
     * @param string $filename  Ruta al fichero
     * @return array Los valores de la cabecera
     */
    /*function getHeaders($filename)
    {
        $rows = self::readCsvRows($filename);
        return array_shift($rows);
    }*/

    /**
     * Lectura de CSV
     *
     * @param string $file
     * @return array
     */
    private static function readCSV($file, $type = 'all')
    {
        $fileData = array();
        $file = self::$files[$file];
        if (self::existsFile($file)) {
            if (($fp = fopen($file, 'r')) !== FALSE) {
                while (($data = fgetcsv($fp, 0, ';')) !== FALSE) {
                    if ($type == 'admins' && $data[0] == 'admin' || $type == 'all' && $data[0] == 'admin') {
                        $admin = new Admin($data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);
                        $fileData[] = $admin;
                    } else if ($type == 'usuarios' && $data[0] == 'usuario' || $type == 'all' && $data[0] == 'usuario') {
                        $user = new Usuario($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
                        $fileData[] = $user;
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
     * @param string $type Tipo de dato que se va a meter en el fichero
     * @param array $data Datos que se van a meter en el fichero
     * @return void
     */
    private static function writeCSV($file, $data, $type = 'all')
    {
        $file = self::$files[$file];
        if (self::existsFile($file)) {
            if (($fp = fopen($file, 'w')) !== FALSE) {
                foreach ($data as $person) {
                    if ($person->getRol() == 'admin') {
                        $object = $person->formatPerson();
                        fputcsv($fp, $object, ';');
                    } else if ($person->getRol() == 'usuario') {
                        $object = $person->formatUsuario();
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
    public static function insertUser($user)
    {
        $users = self::getAllUsers();
        $users[] = $user;
        self::writeCSV('users', $users, 'usuarios');
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
     * Eliminacion del usuario
     *
     * @param Usuario $user Objeto de tipo usuario
     * @return void
     */
    public static function deleteUser($delete)
    {
        $users = self::readCSV('users', 'usuarios');
        if ($users != null) {
        }
    }

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
    public static function insertAdmin($admin)
    {
        $allUsers = self::getAllUsers();
        $allUsers[] = $admin;
        self::writeCSV('users', $allUsers, 'admins');
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
     * Eliminación del admin
     *
     * @param Admin $user Objeto de tipo admin
     * @return void
     */
    public static function deleteAdmin($admin)
    {
        $admins = self::readCSV('users', 'admins');
        if ($admins != null) {
        }
    }

    /**
     * Comprobar si el usuario existe en nuestra base de datos
     *
     * @param string $login
     * @param string $pass
     * @return Usuario
     */
    public function authenticateUser($login, $pass)
    {
        $allUsers = self::getAllUsers();
        if ($allUsers != null) {
            foreach ($allUsers as $person) {
                if ((strcmp($login, $person->getLogin()) == 0) && (hash_equals($person->getPass(), $pass))) {
                    return $person;
                }
            }
        }
        return null;
    }

    /**
     * Comprobar si el usuario existe como administrador
     *
     * @param string $login
     * @param string $pass
     * @return Admin
     */
    public function authenticateAdmin($login, $pass)
    {
        $data = self::getAllUsers();
        if ($data != null) {
            foreach ($data as $person) {
                if ($person->getRol() == 'admin') {
                    if ((strcmp($login, $person->getLogin()) == 0) && (hash_equals($person->getPass(), $pass))) {
                        return $person;
                    }
                }
            }
        }
        return null;
    }
}

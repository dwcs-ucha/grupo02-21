<?php

class CSV
{
    private $files = array('admin' => './privada/admins.csv', 'usuarios' => './privada/clientes.csv', 'GL' => './privada/idiomaGL.csv', 'ES' => './privada/idiomaES.csv', 'EN' => './privada/idiomaEN.csv');

    /**
     * Comprueba si el fichero pasado existe
     *
     * @param string $file
     * @return void
     */
    private static function existsFile($file)
    {
        if (file_exists($file)) {
            return true;
        }
        return false;
    }

    public static function readLanguage($type) {
        $data = CSV::readCSV($type);
        if($data != null) {
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
    private static function readCSV($type)
    {
        $fileData = array();
        $file = self::$files[$type];
        if (self::existsFile($file)) {
            if (($fp = fopen($file, 'r')) !== FALSE) {
                while (($data = fgetcsv($fp, 0, ';')) !== FALSE) {
                    if ($type == 'admins') {
                        $admin = new Admin($data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);
                        $fileData[] = $admin;
                    } else if ($type == 'usuarios') {
                        $user = new Usuario($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
                        $fileData[] = $user;
                    } else if ($type == 'GL') {
                        // Cambiar el idioma a todas las palabras, Gallego
                    } else if ($type == 'ES') {
                        // Cambiar el idioma a todas las palabras, Castellano
                    } else if ($type == 'EN') {
                        // Cambiar el idioma a todas las palabras, Ingles
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
     * @param string $file
     * @param array $data
     * @return void
     */
    private static function writeCSV($type, $data)
    {
        $file = self::$files[$type];
        if (self::existsFile($file)) {
            if (($fp = fopen($file, 'w')) !== FALSE) {
                if ($type == 'admins') {
                    foreach ($data as $admin) {
                        $object = $admin->formatPerson();
                        fputcsv($fp, $object, ';');
                    }
                } else if ($type == 'usuarios') {
                    foreach ($data as $user) {
                        $object = $user->formatUsuario();
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
     * @param Usuario $user
     * @return void
     */
    public static function insertUser($user)
    {
        $users = self::getUsers();
        $users[] = $user;
        self::writeCSV('usuarios', $users);
    }

    /**
     * Recoger todos los usuarios
     *
     * @return array
     */
    public static function getUsers()
    {
        $users = self::readCSV('usuarios');
        if ($users != null) {
            return $users;
        }
        return null;
    }

    /**
     * Eliminacion del usuario
     *
     * @param Usuario $user
     * @return void
     */
    public static function deleteUser($delete)
    {
        $users = self::readCSV('usuarios');
        if ($users != null) {
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
        $admins = self::getAdmins();
        $admins[] = $admin;
        self::writeCSV('usuarios', $admins);
    }

    /**
     * Recoger todos los administradores
     *
     * @return array
     */
    public static function getAdmins()
    {
        $users = self::readCSV('admins');
        if ($users != null) {
            return $users;
        }
        return null;
    }

    /**
     * Eliminación del admin
     *
     * @param Admin $user
     * @return void
     */
    public static function deleteAdmin($admin)
    {
        $admins = self::readCSV('admins');
        if ($admins != null) {
        }
    }
}

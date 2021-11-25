<?php

require('./Class/Usuario.class.php');
require('./Class/Admin.class.php');
require('Help.class.php');
class DAO
{

    private $idiomas = array('gallego' => 'GL', 'castellano' => 'ES');

    /**
     * Lectura del archivo del idioma correspondiente
     *
     * @param string $idioma
     * @return array
     */
    public function leerIdioma($idioma) {
        $type = self::$idiomas[$idioma];
        $data = CSV::readCSV($type);
        if($data != null) {
            return $data;
        }
        return null;
    }

    /**
     * Insertar un usuario
     *
     * @param Usuario $user
     * @return void
     */
    public function insertUser($user)
    {
        $users = self::getUsers();
        CSV::write($users, $user, 'usuarios');
    }

    /**
     * Recoger todos los usuarios
     *
     * @return array
     */
    public function getUsers()
    {
        $users = CSV::read('usuarios');
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
    public function deleteUser($delete)
    {
        $users = self::getUsers();
    }
    
    /**
     * Insertar un administrador
     *
     * @param Admin $admin
     * @return void
     */
    public function insertAdmin($admin)
    {
        $admins = self::getAdmins();
        CSV::write($admins, $admin, 'admins');
    }

    /**
     * Recoger todos los administradores
     *
     * @return array
     */
    public function getAdmins()
    {
        $admins = CSV::read('admins');
        if ($admins != null) {
            return $admins;
        }
        return null;
    }

    /**
     * Eliminación del admin
     *
     * @param Admin $user
     * @return void
     */
    public function deleteAdmin($admin)
    {
        $admins = self::getAdmins();
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
        $users = self::getUsers();
        if ($users != null) {
            foreach ($users as $user) {
                if ((strcmp($login, $user->getLogin()) == 0) && (hash_equals($user->getPass(), $pass))) {
                    return $user;
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
        $admins = self::getAdmins();
        if ($admins != null) {
            foreach ($admins as $admin) {
                if ($admin->getRol() == 1) {
                    if ((strcmp($login, $admin->getLogin()) == 0) && (hash_equals($admin->getPass(), $pass))) {
                        return $admin;
                    }
                }
            }
        }
        return null;
    }

    /**
     * Comprobar si existe el nombre usuario en nuestros datos
     *
     * @param string $login
     * @return boolean
     */
    /*public function existsUserName($login)
    {
        $users = self::getUsers();
        $admins = self::getAdmins();
        if ($users != null) {
            foreach ($users as $user) {
                if (strcmp($user->getLogin(), $login) == 0) {
                    return true;
                }
            }
        }
        return false;
    }*/
}

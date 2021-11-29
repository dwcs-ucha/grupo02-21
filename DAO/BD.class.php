<?php
class BD {

    /**
     * Insertar un usuario
     *
     * @param Usuario $user
     * @return void
     */
    public function insertUser($user){}

    /**
     * Recoger todos los usuarios
     *
     * @return array
     */
    public function getUsers(){}

    /**
     * Eliminacion del usuario
     *
     * @param Usuario $user
     * @return void
     */
    public function deleteUser($user){}
    
    /**
     * Insertar un administrador
     *
     * @param Admin $admin
     * @return void
     */
    public function insertAdmin($admin){}

    /**
     * Recoger todos los administradores
     *
     * @return array
     */
    public function getAdmins(){}

    /**
     * Eliminación del admin
     *
     * @param Admin $user
     * @return void
     */
    public function deleteAdmin($admin){}
}

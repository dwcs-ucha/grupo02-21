<?php
/*
    Verificar Email
    @author Oscar González Martínez, Rubén Dopico Novo
    Metodo para verificar un usuario a través de la confirmación por Email.
    Fecha: 12/12/2021
*/

if (isset($_GET['email']) && !empty($_GET['email']) and isset($_GET['hash']) && !empty($_GET['hash'])) {
    Persona::validate_pw($_GET['email'], $_GET['hash']);
    $user = DAO::getUser('', $_GET['email']);
    $user->setActive(1);
    DAO::updateUser($user);
} else {
    // Invalid approach
}

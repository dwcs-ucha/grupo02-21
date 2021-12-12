<?php
/*
    Eliminar Usuario
    @author Oscar González Martínez, Rubén Dopico Novo
    Metodo para Eliminar Usuarios del archivo CSV
    Fecha: 12/12/2021
*/
include_once '../Class/Persona.class.php';
include_once '../Class/Usuario.class.php';
include_once '../Class/Admin.class.php';
include_once "../Class/Validacion.class.php";
include_once "../DAO/DAO.class.php";
include_once "../Class/Erro.class.php";

if(!Validacion::campoVacio($_GET['login'])) {
    session_start();
    $login = $_GET['login'];
    DAO::deletePerson($login);
    $_SESSION['eliminado'] = 'La eliminacion ha sido realizado con exito';
}
header('Location: adminDelUser.php');
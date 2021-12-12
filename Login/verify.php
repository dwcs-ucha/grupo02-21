<?php
/*
    Verificar Email
    @author Oscar González Martínez, Rubén Dopico Novo
    Metodo para verificar un usuario a través de la confirmación por Email.
    Fecha: 12/12/2021
*/

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    Persona::validate_pw($_GET['email'], $_GET['hash']);
}else{
    // Invalid approach
}
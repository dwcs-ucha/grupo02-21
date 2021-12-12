<?php

if (isset($_GET['email']) && !empty($_GET['email']) and isset($_GET['hash']) && !empty($_GET['hash'])) {
    Persona::validate_pw($_GET['email'], $_GET['hash']);
    $user = DAO::getUser('', $_GET['email']);
    $user->setActive(1);
    DAO::updateUser($user);
} else {
    // Invalid approach
}

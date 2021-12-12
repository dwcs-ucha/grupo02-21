<?php

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    Persona::validate_pw($_GET['email'], $_GET['hash']);
}else{
    // Invalid approach
}
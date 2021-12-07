<?php

require_once '../Class/CMS.class.php';
require_once '../DAO/DAO.class.php';
session_start();
if(isset($_GET['titulo'])) {
    $titulo = $_GET['titulo'];
    DAO::deleteArticle($titulo);
    $_SESSION['article'] = 'El articulo ha sido eliminado con exito';
}
header('Location: i.php');
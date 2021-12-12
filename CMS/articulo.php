<?php
/*
 * Author: Jorge Carreño Miranda
 * Version:1.0.0
 * Last modified: 08/12/2021
 */
require_once '../Class/Cms.class.php';
require_once '../DAO/DAO.class.php';
require_once '../Class/Validacion.class.php';
require_once '../Class/Erro.class.php';
session_start();
?>
<html>
    <head>
        <title><?php //Aquí va el articulo que se ha abierto para leerlo entero ?></title>
    </head>
    <body>
        <?php
        $articulos = DAO::getArticles();
        if ($_SESSION['articulo'] != null) {
         $article=DAO::getArticle($_SESSION['articulo']);
         }
         echo "<h1>". $article->getTitulo()."</h1><br>";
         echo "<img src='".$article->getImg()."'>";
         echo "<p>".$article->getCuerpo()."</p>";
         
        
    
        ?>

    </body>
</html>

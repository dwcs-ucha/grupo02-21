<?php
/*
 * Author: Jorge Carreño Miranda
 * Version:1.0.0
 * Last modified: 02/12/2021
 */
include './Class/ClassPublicacion.php';
include './Class/ClassDAO.php';
$DAO=new DAO();
$articulos="./CSV/articulos.csv";
$publicaciones= $DAO->obtenerArticulo($articulos);
?>
<html>
    <head>
        <title>Novas</title>
    </head>
    <body>
        <h1>Novas Novas na nosa páxina</h1><br>
        <?php
      
        foreach($publicaciones as $articulo){
            echo "<h1>". $articulo->getTitulo(). "</h1>";
            echo $articulo->getCuerpo();
        }
        ?>
    </body>
</html>

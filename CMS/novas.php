<?php
/*
 * Author: Jorge Carreño Miranda
 * Version:1.0.0
 * Last modified: 08/12/2021
 */
require_once '../Class/Cms.class.php';
require_once '../DAO/DAO.class.php';
require_once '../Class/Validacion.class.php';
session_start();
?>
<html>
    <head>
        <title>Novas</title>
        <meta charset="utf-8">
        <?php
            include '../head.php'
        ?>
    </head>
    <body>
        <?php
            include '../menu.php'
        ?>
        <div class="fondo">
            <main class="container alto">
                <div class="col-12 pt-5 pb-1">
                    <h1 class="text-primary">Novas</h1>
                </div>
                <div  class="container border border-5 border border-primary border rounded-3 bg-light">
                <?php
                    $cont=0;
                    $articulos = DAO::getArticles(); 
                    if(isset($_GET['abrir'])){
                        $_SESSION['articulo']=$_GET['abrir'];
                        header("Location: ./articulo.php");
                    }
                    if ($articulos != null) {
                ?>
                <?php
                        $cont=0;
                        foreach ($articulos as $novas) {
                ?> 
                <div class="row">
                    <div class="col-12 col-lg-12 px-3 mt-3"></div>
                        <a class='text-decoration-none fs-4 fw-bold' href='novas.php?abrir=<?php echo $novas->getTitulo() ?>'><?php echo $novas->getTitulo()?></a>
                        <?php echo "<p>".$novas->getCreacion()."</p>" ?>
                    
                <?php 
                        }
                    }
                ?>
                    </div>
                </div>
                </div>
            </main>
        </div>
    </body>
</html>

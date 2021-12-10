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
        <link rel="stylesheet" href="../css/custom.css">
    </head>
    <body>
        <div class="container">
        <h1>Novas</h1><br>
        
      
      <?php
      $cont=0;
      $articulos = DAO::getArticles(); 
      if(isset($_GET['abrir'])){
            $_SESSION['articulo']=$_GET['abrir'];
            header("Location: ./articulo.php");
      }
    if ($articulos != null) {
        ?><div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="col-6"></div><?php
         $cont=0;
         foreach ($articulos as $novas) {
            ?>  
        <div class="col-6"><a href='novas.php?abrir=<?php echo $novas->getTitulo() ?>'><?php echo $novas->getTitulo() ?></a></div>
                <?php 
        }
         
    }
    
        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

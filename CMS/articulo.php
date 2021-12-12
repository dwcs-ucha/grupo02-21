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
if (!isset($_SESSION['articulo'])) {
    header("Location: ./novas.php");
    }
?>
<html>
    <head>
        <title><?php //Aquí va el articulo que se ha abierto para leerlo entero ?></title>
        <?php
        include '../componentes/head.php';
        include '../componentes/cookieAlert.php';
        ?>
    </head>
    <body>
      <?php
            include '../componentes/menu.php';
        ?>
        <div class="fondo alto">
        <?php
            $articulos = DAO::getArticles();
            if ($_SESSION['articulo'] != null) {
                $article=DAO::getArticle($_SESSION['articulo']);
            }
        ?>
            <main class="container">
                <div class="col-12 pt-5 text-primary">         
                        <?php echo "<h1>". $article->getTitulo()."</h1>" ;?>
                         <div class="mb-4"><?php echo "<img class='img-fluid' style='max-width: 400px;' src='".$article->getImg()."'>";?></div>
                </div>
                <div class="col-12 border border-5 border border-primary border rounded-3 bg-light">
                    <div class="mx-3">
                    
                    <?php echo "<p>".$article->getCuerpo()."</p>";?>
                      <a class="btn btn-primary mb-2" href="/fpdf/descarga.php?articulo=<?php echo $_SESSION['articulo'];?> ">Imprimir a PDF </a>
                    
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>

<?php
/*
 * Author: Jorge Carreño Miranda
 * Version:1.0.0
 * Last modified: 02/12/2021
 */
//HACER COMO LA GESTIÓN DE USUARIOS PERO CON ENTRADAS(DOCUMENTOS);
require_once '../Class/Cms.class.php';
require_once '../DAO/DAO.class.php';
require_once '../Class/Validacion.class.php';
require_once '../Class/Erro.class.php';

session_start();
if (isset($_SESSION['user'])) {
    $rol = $_SESSION['user']['rol'];
    if ($rol != "Admin"){
        header('Location: /index.php');
    }
} else {
    header('Location: /signUp.php');
}
?>
<html>

<head>
    <meta charset="utf-8">
    <link type="text/css" href="ckeditor/sample/css/sample.css" rel="stylesheet" media="screen" />
    <script src="ckeditor/ckeditor.js"></script>
    <title>Escribir articulo</title>
    <?php
    include '../componentes/head.php';
    ?>
</head>

<body>
    <?php
    include '../componentes/menu.php';
    include '../componentes/cookieAlert.php';
    ?>
    <div class="fondo alto pt-5">
        <?php
        $titulo = "";
        $cuerpo = "";
        $img = "";
        $errorTitulo = "";
        $errorCuerpo = "";
        $errorImg = "";
        ?>
        <main class="container border border-5 border border-primary border rounded-3 bg-light pb-5 mb-5">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="formulario" id="formulario">
                <div class="col-12 pt-5 pb-1">
                    <h1 class="text-primary">Titulo</h1>
                </div>
                <div class="col-12 co-lg-12">
                    <input type="text" name="titulo" maxlength="150" value="<?php echo $titulo; ?>" class="input-group-text" placeholder="titulo" style="width: 100%">
                    <br>
                    <?php echo validaTitulo(); ?>
                    <br>
                    <textarea name="cuerpo" id="editor"><?php echo $cuerpo; ?></textarea>
                    <br>
                    <?php validaCuerpo(); ?>
                    <br>
                    <h4 class="text-primary">Imaxe(opcional)</h4>
                    <input type="text" name="img" value="<?php echo $img; ?>" placeholder="/CMS/imagenes/(Nombre_img)" class="input-group-text">
                    <?php validaImg(); ?><br></br>
                    <input type="submit" value="publicar" name="enviar" class="btn btn-primary" />
                    <input type="submit" value="borrar todo" name="borrar" class="btn btn-primary" /><br></br>
                </div>
            </form>
            <script type="text/javascript">
                //Esto la llamada al script de cskjeditor para la modificación del textarea
                CKEDITOR.replace('cuerpo');
            </script>

            <?php

            function validaTitulo()
            {
                global $titulo;
                if (isset($_POST['enviar'])) {
                    // Validar que el titulo solo contenga letras
                    if (Validacion::campoVacio($_POST['titulo'])) {
                        Erro::addError('EmptyFieldErrorTitle', 'El campo titulo esta vacío');
                    } else {
                        $titulo = $_POST['titulo'];
                    }
                }
            }

            function validaCuerpo()
            {
                global $cuerpo;
                if (isset($_POST['enviar'])) {
                    if (Validacion::campoVacio($_POST['cuerpo'])) {
                        Erro::addError('EmptyFieldErrorBody', 'El campo cuerpo esta vacío');
                    } else {
                        $cuerpo = $_POST['cuerpo'];
                    }
                }
            }

            function validaImg()
            {
                global $img;
                if (isset($_POST['img'])) {
                    $img = $_POST['img'];
                }
            }



            if (isset($_POST['enviar']) && Erro::countErros() == 0) {
                $creacion = date("F jS - g: i a");
                if (DAO::existsArticle($titulo)) {
                    Erro::addError('existsTitle', 'El titulo ya existe');
                    echo Erro::showErrors();
                } else {
                    $nuevo = new Publicacion($titulo, $cuerpo, $creacion, $img);
                    DAO::insertArticle($nuevo);
                }
            } else {
                echo Erro::showErrors();
            }

            if (isset($_POST['borrar'])) {
                $titulo = "";
                $cuerpo = "";
            }
            $articulos = DAO::getArticles();
            if ($articulos != null) {
            ?>
                <table class="table table-striped" border="1">
                    <tr>
                        <th>Titulo</th>
                        <th>Cuerpo </th>
                        <th>Imagen</th>
                        <th>fecha de creación</th>
                        <th>Eliminacion</th>
                    </tr>
                    <?php

                    foreach ($articulos as $novas) {
                    ?>
                        <form action="<?php echo './gestionArticle.php?titulo=' . $novas->getTitulo() ?>" method="post" name="formulario" id="formulario">
                            <tr>
                                <td><?php echo $novas->getTitulo() ?></td>
                                <td><?php echo $novas->getCuerpo() ?></td>
                                <td><img style="max-width:100px" src="<?php echo $novas->getImg() ?>" /></td>
                                <td><?php echo $novas->getCreacion() ?></td>
                                <td><input class="btn btn-primary" type="submit" name="delete"></a></td>
                            </tr>
                        </form>
                <?php
                    }
                }
                ?>
                </table>
                </main>
            <?php
            include '../componentes/footer.php';
            ?>
        </div>
</body>

</html>
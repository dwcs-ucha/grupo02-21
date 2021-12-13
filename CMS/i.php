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

 //Comento el inicio de Sesión. Se inicia Sesión desde el Menú para poder mostrar el enlace a cerrar sesión si hay una sesion iniciada.
 session_status() === PHP_SESSION_ACTIVE ?: session_start();
 if(isset($_SESSION['userLogged'])) {
    $user = $_SESSION['userLogged'];
    if($user->getRol() != 'Admin') {
        header('Location: ../index.php');
    }
} else {
    header('Location: signUp.php');
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <link type="text/css" href="ckeditor/sample/css/sample.css" rel="stylesheet" media="screen" />
        <script src="ckeditor/ckeditor.js"></script>
        <title>Indice</title>
    </head>
    <body><br>

        <?php
        $titulo = ""; 
        $cuerpo = "";
        $img = "";
        $errorTitulo = "";
        $errorCuerpo = "";
        $errorImg = "";
        ?>

    </table>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="formulario" id="formulario">
        <div class="centered">
            <h1>Titulo</h1><br>
            <input type="text" name="titulo" maxlength="150" value="<?php echo $titulo; ?>" size="107">
            <br>
            <?php echo validaTitulo(); ?>
            <br>
            <textarea name="cuerpo" id="editor"><?php echo $cuerpo; ?></textarea>
            <br>
            <?php validaCuerpo(); ?>
            <br>
            <h4>Imaxe(opcional)</h4>
            <input type="text" name="img" value="<?php echo $img;?>" placeholder="/CMS/imagenes/(Nombre_img)">
            <?php validaImg();?><br></br>
            <input type="submit" value="publicar" name="enviar" />
            <input type="submit" value="borrar todo" name="borrar"/><br></br>
        </div>
    </form>
    <script type="text/javascript">
        //Esto la llamada al script de cskjeditor para la modificación del textarea
         CKEDITOR.replace( 'cuerpo');
    </script>

    <?php

    function validaTitulo() {
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

    function validaCuerpo() {
        global $cuerpo;
        if (isset($_POST['enviar'])) {
            if (Validacion::campoVacio($_POST['cuerpo'])) {
                Erro::addError('EmptyFieldErrorBody', 'El campo cuerpo esta vacío');
            } else {
                $cuerpo = $_POST['cuerpo'];
            }
        }
    }
    
    function validaImg(){
        global $img;
        if(isset($_POST['img'])){
                $img = $_POST['img'];  
            }
    }
    
        
    
    if (isset($_POST['enviar']) && Erro::countErros() == 0) {
        $creacion=date("F jS - g: i a");
        if (DAO::existsArticle($titulo)) {
            Erro::addError('existsTitle', 'El titulo ya existe');
            echo Erro::showErrors();
        } else {   
            $nuevo = new Publicacion($titulo,$cuerpo,$creacion,$img);
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
        <table border="1">
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
                <form action="<?php echo './gestionArticle.php?titulo=' . $novas->getTitulo()?>" method="post" name="formulario" id="formulario">
                <tr>
                    <td><?php echo $novas->getTitulo() ?></td>
                    <td><?php echo $novas->getCuerpo() ?></td>
                    <td><img src="<?php echo $novas->getImg() ?>"/></td>
                    <td><?php echo $novas->getCreacion()?></td>
                    <td><input type="submit" name="delete"></a></td>
                </tr>
                </form>
                <?php
            }
        }
        ?>
    </table>
</body>
</html>
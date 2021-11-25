<!DOCTYPE html>
<?php 
    //Página de registro.
    //@author: Oscar González Martínez
    //Versión: 0.1
    //Proyecto "Aforro Enerxético"
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro de Usuario</title>
        <style>
            .container {
                border: solid 1px;
                
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- Nombre de Login -->
            <label for="registerLogin">Nombre de Usuario</label>
            <!-- ¿Nombre de Completo del Usuario? -->
            <input type="text" name="registerLogin" value="<?php if(isset($_POST['registerLogin'])) { echo $_POST['registerLogin'];} ?>"/>
            <label for="registerName">Nombre</label>
            <input type="text" name="registerName" value="<?php if(isset($_POST['registerName'])) { echo $_POST['registerName']; } ?>" />
            <label for="registerPassWord">Contraseña</label>
            <input type="password" name="registerPassword"/>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>

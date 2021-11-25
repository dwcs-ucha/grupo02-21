<!DOCTYPE html>
<?php 
    //@author: Oscar Gonzalez Martinez
    //@date: 22/11/2021
    //@version: 0.1
    //include "validaciones.php";
    //Página de Login.
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <style>
        .container {
            width: 400px;
            height: 200px;
            margin: auto;
            border: solid 1px;
        }
        .userName {            
            width: 200px;
            height: 75px;
            margin: auto;
            text-align: justify;
        }
        .passWord {
            width: 200px;
            height: 75px;
            margin: auto;
        }
        .submit {
            width: 55px;            
            margin: auto;            
        }
    </style>
    <body>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <div class="container">
            <div class="userName">
                Nome de Usuario <br/>
                <input type="text" name="loginUserName" value="Introduce nome de usuario" />
            </div>
            <div class="passWord">
                Contrasinal <br/>
                <input type="password" name="loginPassWord" />
            </div>
            <div class="submit">
                <input type="submit" value="Enviar" name="loginSend"/>
            </div>
        </div>
            
        </form>
        <?php
        
        $dataBase = DAO::readCsv();
        $login = $passWord = "";
        if (isset($_POST['loginSend'])){
            //Almacenamos en las variables los datos, después de estar validados.
            $login = $_POST['loginUserName'];
            $pass = $_POST['loginPassWord'];            
        }
        
        ?>
    </body>
</html>

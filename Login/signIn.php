<!DOCTYPE html>
<?php 
    //@author: Oscar Gonzalez Martinez
    //@date: 22/11/2021
    //@version: 0.9
    //include "validaciones.php";
    //Página de Login.
    include_once "../Class/Persona.class.php";
    include_once "../Class/Usuario.class.php";
    include_once "../Class/Admin.class.php";
    include_once "../Class/Validacion.class.php";
    include_once "../Class/Erro.class.php";
    include_once "../DAO/DAO.class.php";
    include_once "../Class/Log.class.php";
    
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
        
        $login = $passWord = "";

        if (isset($_POST['loginSend'])){
            //Almacenamos en las variables los datos, después de estar validados.
            $login = $_POST['loginUserName'];
            $passWord = $_POST['loginPassWord']; 
            
            if (empty($login) || empty($passWord)){
                Erro::addError("EmptyField", "Introduzca Login y contraseña");
                echo Erro::showErrors();

                // LOGIN INCORRECTO - Añade un registro al LOG
                DAO::writeLog(new Log("se ha intentado loguear en la aplicación desde " . $_SERVER['REMOTE_ADDR'] . " - " . Erro::showErrorsLog()));
            } else {
                $user = DAO::authenticateUser($login,$passWord);
                var_dump($user);
                if ($user != null ){
                    session_start();
                    $_SESSION['userLogged'] = $user; 
                    
                    // LOGIN CORRECTO - Añade un registro al LOG
                    DAO::writeLog(new Log("se ha logueado en la aplicación desde " . $_SERVER['REMOTE_ADDR'] , $login));
                } else {
                    Erro::addError("UserAuthenticateError", "No parece haber ningún usuario con ese nombre");
                    echo Erro::showErrors();

                    // LOGIN INCORRECTO - Añade un registro al LOG
                    DAO::writeLog(new Log("se ha intentado loguear como " . strtoupper($login) . " en la aplicación desde " . $_SERVER['REMOTE_ADDR'] . " - " . Erro::showErrorsLog()));
                }
            }
                    
        }
        
        ?>
    </body>
</html>

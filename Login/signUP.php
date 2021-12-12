<!DOCTYPE html>
<?php
//Página de registro.
//@author: Oscar González Martínez
//Versión: 0.9
//Proyecto "Aforro Enerxético"
include_once '../Class/Persona.class.php';
include_once "../Class/Validacion.class.php";
include_once "../DAO/DAO.class.php";
include_once "../Class/Erro.class.php";
require_once "recaptchalib.php";

//Inicialización de variables 
$registerLogin = $registerName = $registerSurname = $registerPassWord = $registerVerifyPassword = $registerEmail = $registerVerifyEmail = $registerAddress = "";
$registerRol = "Usuario";
$registerLoginError = $registerNameError = $registerSurnameError = $registerPassWordError = $registerVerifyPasswordError = $registerEmailError = $registerVerifyEmail = "";
$registerError = array();

//Comento el inicio de Sesión. Se inicia Sesión desde el Menú para poder mostrar el enlace a cerrar sesión si hay una sesion iniciada.

session_status() === PHP_SESSION_ACTIVE ?: session_start();
if(isset($_SESSION['userLogged'])) {
    header('Location: ../index.php');
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="../css/custom.css">
    <?php
        include '../head.php'; 
    ?>
    <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>
</head>

<body>
    <?php
        include '../menu.php'; 
    ?>
    <div class="fondo alto">
    <div class="container"> 
    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
            <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
            <div class="col-12 pt-3 pb-1">
                <h1 class="text-primary">Registrarse</h1>
            </div>
            <div class="container border border-5 border border-primary border rounded-3 bg-light">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-12 col-lg-12 px-3 mt-3">
                            <!-- Nombre de Login -->
                            <label for="registerLogin">Login</label>
                            <input type="text" name="registerLogin" class="input-group-text" value="<?php if (isset($_POST['registerLogin'])) {
                                                                                                        echo $_POST['registerLogin'];
                                                                                                    } ?>" />
                        </div>
                        <div class="col-12 col-lg-12 px-3 mt-3">
                            <!-- Nombre del Usario -->
                            <label for="registerName">Nombre</label>
                            <input type="text" name="registerName" class="input-group-text" value="<?php if (isset($_POST['registerName'])) {
                                                                                                        echo $_POST['registerName'];
                                                                                                    } ?>" />
                        </div>
                        <div class="col-12 col-lg-12 px-3 mt-3">
                            <!-- Apellido del Usario -->
                            <label for="registerSurName">Apellidos</label>
                            <input type="text" name="registerSurName" class="input-group-text" value="<?php if (isset($_POST['registerSurName'])) {
                                                                                                            echo $_POST['registerSurName'];
                                                                                                        } ?>" />
                        </div>
                        <div class="col-12 col-lg-12 px-3 mt-3">
                            <!-- Campo Password. Por seguridad en caso de fallo no recupera el valor de la conrtaseña -->
                            <label for="registerPassWord">Contraseña</label>
                            <input type="password" class="input-group-text" name="registerPassword" />
                        </div>    
                        <div class="col-12 col-lg-12 px-3 mt-3">                                                                               
                            <!-- Verificar PassWord -->
                            <label for="registerVerifyPassWord">Verificar Contraseña</label>
                            <input type="password" class="input-group-text" name="registerVerifyPassword" />
                        </div>
                        <div class="col-12 col-lg-12 px-3 mt-3">
                            <!-- Email -->
                            <label for="registerEmail">Correo Electronico </label>
                            <input type="registerEmail" name="registerEmail" class="input-group-text" value="<?php if (isset($_POST['registerEmail'])) {
                                                                                                                echo $_POST['registerVerifyEmail'];
                                                                                                            } ?>" />
                        </div>
                        <div class="col-12 col-lg-12 px-3 mt-3">
                            <!-- Verificar Email -->
                            <label for="registerVerifyEmail">Verificar Correo Electronico </label>
                            <input type="registerVerifyEmail" class="input-group-text" name="registerVerifyEmail" value="<?php if (isset($_POST['registerEmail'])) {
                                                                                                                                echo $_POST['registerVerifyEmail'];
                                                                                                                            } ?>" />
                        </div>
                        <div class="col-12 col-lg-12 px-3 mt-3">
                            <label for="registerAddress">Dirección</label>
                            <input type="text" name="registerAddress" class="input-group-text" id="registerAdress" value="<?php if (isset($_POST['registerAddress'])) {
                                                                                                                                echo $_POST['registerAddress'];
                                                                                                                            } ?>">
                        </div>
                        <div class="col-12 col-lg-12 px-3 mt-3 mb-3">
                            <!-- Input y Reset -->
                            <input type="submit" value="Confirmar" class="btn btn-primary" name="registerSubmit" />
                            <input type="reset" value="Borrar" class="btn btn-primary" />
                        </div>
                        <div class="g-recaptcha" data-sitekey="6LcYTXMdAAAAAPCoFfQN11at0TXtFhAuiB5N1-w8"></div>
                    </div>
                </div>
            </div>
    </form>
    <?php

    if (isset($_POST['registerSubmit'])) {

        //Validación de Login            
        if (isset($_POST['registerLogin'])) {
            if (Validacion::validarLogin($_POST['registerLogin'])) {
                $registerLogin = $_POST['registerLogin'];
            } else {
                Erro::addError("registerLoginError", "Login Invalido");
            }
        }
        //Validación de Nombre
        if (isset($_POST['registerName'])) {
            if (Validacion::validarNombre($_POST['registerName'])) {
                $registerName = $_POST['registerName'];
            } else {
                Erro::addError("registerNameError", "Nombre invalido");
            }
        }
        //Validación de Apellido
        if (isset($_POST['registerSurName'])) {
            if (Validacion::validarApellido($_POST['registerSurName'])) {
                $registerSurname = $_POST['registerSurName'];
            } else {
                Erro::addError("registerSurNameError", "Apellido invalido");
            }
        }
        //Validación de Password y encriptación
        if (isset($_POST['registerPassword'])) {
            //Comprueba si se ha introducido la validacion.
            if (isset($_POST['registerVerifyPassword'])) {
                //Comprueba que ambas cadenas son iguales
                if (Validacion::comprobarStrings($_POST['registerPassword'], $_POST['registerVerifyPassword'])) {
                    //Si todo es correcto, se genera la la contraseña cifrada.
                    if (Validacion::validarPassword($_POST['registerPassword'])) {
                        $registerPassWord = Persona::generate_hash($_POST['registerPassword']);
                    } else {
                        Erro::addError("registerPassWordError", "La contraseña no cumple los requisitos: 1 Mayuscula,1 Minuscula, 1 carácter especial");
                    }
                } else {
                    Erro::addError("registerPassWordError", "Las contraseñales son distintas");
                }
            } else {
                //Se genera un error si no se ha introducido.
                Erro::addError("registerVerifyPasswordError", "Verifique la contraseña");
            }
        } else {
            //Se genera un error si no se ha introducido la contraseña.
            Erro::addError("registerPassWord", "Introduzca Password");
        }

        //Validación email.

        if (isset($_POST['registerEmail'])) {
            //Comprueba que el campo validar email tenga valor
            if (isset($_POST['registerVerifyEmail'])) {
                //Comprueba que los Campos Mail y Verificar Email sean iguales.
                if (Validacion::comprobarStrings($_POST['registerEmail'], $_POST['registerVerifyEmail'])) {
                    //Validamos el campo Mail si las cadenas son iguales
                    if (Validacion::validarEmail($_POST['registerEmail'])) {
                        
                        $registerEmail = $_POST['registerEmail'];
                    } else {
                        Erro::addError("registerEmail", "El correo no cumple los requisitos de email");
                    }
                } else {
                    //Error cuando los campos no son iguales.

                    Erro::addError("registerVerifyEmailError", "Los campos no son iguales");
                }
            } else {
                //Error cuando el campo verificar email está vacío
                Erro::addError("registerVerifyEmail", "Confirme Email");
            }
        } else {
            //error cuando el campo email está vacío.
            Erro::addError("registerEmailError", "Introduzca Email");
        }

        //Validaciones Dirección.
        if (isset($_POST['registerAddress'])) {
            $registerAddress = $_POST['registerAddress'];
        } else {
            Erro::addError("registerAddressError", "Inntroduzca dirección");
        }

        
        $secret = "6LcYTXMdAAAAADWRLx2Kr8jjYsgSk2OjOl5_crGj";
        $response = null;
        $reCaptcha = new ReCaptcha($secret);
        if ($_POST["g-recaptcha-response"]) {
            $response = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"],
            $_POST["g-recaptcha-response"]
            );
         }
         if ($response != null && $response->success) {
            if (Erro::countErros() == 0) {
                $user = new Usuario($registerRol, $registerLogin, $registerName, $registerPassWord, $registerSurname, $registerEmail, $registerAddress,0);
                if (DAO::existsUserName($user->getLogin()) || DAO::existsUserEmail($user->getEMail())) {
                    Erro::addError('ExistsUserName','El nombre de usuario ya existe');
                    //echo Erro::showErrors();
                } else {
                    DAO::insertUser($user);
                    header("location: ../index.php");
                }
            } else {
                //echo Erro::showErrors();
            }
        } else {
            Erro::addError('captchaError','Fallo de verificación de Capcha');
            //echo Erro::showErrors();
        }
    }
    include_once '../componentes/error.php';
    ?>
    </div>
</div>
</body>

</html>

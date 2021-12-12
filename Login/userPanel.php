<!DOCTYPE html>
<?php
//Panel de control de Usuario.
//@author: Oscar González Martínez
//Versión: 1.0
//Proyecto "Aforro Enerxético"
include_once '../Class/Persona.class.php';
include_once "../Class/Validacion.class.php";
include_once "../DAO/DAO.class.php";
include_once "../Class/Erro.class.php";


//Inicialización de variables 


//Comento el inicio de Sesión. Se inicia Sesión desde el Menú para poder mostrar el enlace a cerrar sesión si hay una sesion iniciada.
session_status() === PHP_SESSION_ACTIVE ?: session_start();
if (isset($_SESSION['userLogged'])) {
    $user = $_SESSION['userLogged'];
} else {
    header('Location: signUp.php');
}

$userName = $userSurname = $userPassWord = $userVerifyPassword =   $userAddress =  "";

$userLogin = $user->getLogin();

$userRol = "Usuario";
$userActivate = 1;
$userEmail = $user->getEmail();
$userError = array();
?>

<head>
    <meta charset="UTF-8">
    <title>Panel de Control de Usuario</title>
    <?php
    include '../componentes/head.php';
    ?>
</head>

<body>
    <?php
    include '../componentes/menu.php';
    ?>
    <div class="fondo alto">
        <div class="container">
            <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                <div class="col-12 pt-3 pb-1">
                    <h1 class="text-primary">Registrarse</h1>
                </div>
                <div class="container border border-5 border border-primary border rounded-3 bg-light">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12 col-lg-12 px-3 mt-3">
                                <!-- Nombre de Login -->
                                <label for="userLogin">Login</label>
                                <input disabled type="text" name="userLogin" class="input-group-text" value="<?php echo $user->getLogin(); ?>" />
                            </div>
                            <div class="col-12 col-lg-12 px-3 mt-3">
                                <!-- Nombre del Usario -->
                                <label for="userName">Nombre</label>
                                <input type="text" name="userName" class="input-group-text" value="<?php echo $user->getName(); ?>" />
                            </div>
                            <div class="col-12 col-lg-12 px-3 mt-3">
                                <!-- Apellido del Usario -->
                                <label for="userSurName">Apellidos</label>
                                <input type="text" name="userSurName" class="input-group-text" value="<?php echo $user->getSurName(); ?>" />
                            </div>
                            <div class="col-12 col-lg-12 px-3 mt-3">
                                <!-- Campo Password. Por seguridad en caso de fallo no recupera el valor de la conrtaseña -->
                                <label for="userPassWord">Contraseña</label>
                                <input type="password" name="userPassword" class="input-group-text" />
                            </div>
                            <div class="col-12 col-lg-12 px-3 mt-3">
                                <!-- Verificar PassWord -->
                                <label for="userVerifyPassWord">Verificar Contraseña</label>
                                <input type="password" name="userVerifyPassword" class="input-group-text" />
                            </div>
                            <div class="col-12 col-lg-12 px-3 mt-3">
                                <!-- Email -->
                                <label for="userEmail">Correo Electronico </label>
                                <input type="userEmail" name="userEmail" class="input-group-text" value="<?php echo $user->getEmail(); ?>;" disabled />
                            </div>
                            <div class="col-12 col-lg-12 px-3 mt-3">
                                <label for="userAddress">Dirección</label>
                                <input type="text" name="userAddress" id="userAdress" class="input-group-text" value="<?php echo $user->getAddress(); ?>">
                            </div>
                            <div class="col-12 col-lg-12 px-3 mt-3 mb-3">
                                <!-- Input y Reset -->
                                <input type="submit" value="Confirmar" class="btn btn-primary" name="userSubmit" />
                                <input type="reset" value="Borrar" class="btn btn-primary" />

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    // put your code here
    if (isset($_POST['userSubmit'])) {


        //Validación de Nombre
        if (isset($_POST['userName'])) {
            if (Validacion::validarNombre($_POST['userName'])) {
                $userName = trim($_POST['userName']);
            } else {
                Erro::addError("userNameError", "Nombre invalido");
            }
        }
        //Validación de Apellido
        if (isset($_POST['userSurName'])) {
            if (Validacion::validarApellido($_POST['userSurName'])) {
                $userSurname = trim($_POST['userSurName']);
            } else {
                Erro::addError("userSurNameError", "Nombre invalido");
            }
        }
        //Validación de Password y encriptación
        if (isset($_POST['userPassword'])) {
            //Comprueba si se ha introducido la validacion.
            if (isset($_POST['userVerifyPassword'])) {
                //Comprueba que ambas cadenas son iguales
                if (Validacion::comprobarStrings($_POST['userPassword'], $_POST['userVerifyPassword'])) {
                    //Si todo es correcto, se genera la la contraseña cifrada.
                    if (Validacion::validarPassword($_POST['userPassword'])) {
                        $userPassWord = Persona::generate_hash($_POST['userPassword']);
                    } else {
                        Erro::addError("userPassWordError", "La contraseña no cumple los requisitos: 1 Mayuscula,1 Minuscula, 1 carácter especial");
                    }
                } else {
                    Erro::addError("userPassWordError", "Las contraseñales son distintas");
                }
            } else {
                //Se genera un error si no se ha introducido.
                Erro::addError("userVerifyPasswordError", "Verifique la contraseña");
            }
        } else {
            //Se genera un error si no se ha introducido la contraseña.
            Erro::addError("userPassWord", "Introduzca Password");
        }


        //Validaciones Dirección.
        if (isset($_POST['userAddress'])) {
            $userAddress = $_POST['userAddress'];
        } else {
            Erro::addError("userAddressError", "Inntroduzca dirección");
        }
        //Validacion de Usuario activo.
        if (isset($_POST['userActiveUser'])) {
            $userActiveUser = $_POST['userActiveUser'];
        }

        if (Erro::countErros() == 0) {
            
                    $user = new Usuario($userRol, $userLogin, $userName, $userPassWord, $userSurname, $userEmail, $userAddress, $userActiveUser);
                    DAO::updateUser($user);
                    header("refresh: 0");
            }
        } else {
            //echo Erro::showErrors();
        }
    
    include_once '../componentes/error.php';

    ?>
</body>

</html>
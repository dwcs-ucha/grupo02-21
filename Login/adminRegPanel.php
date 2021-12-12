<!DOCTYPE html>
<?php 
    //Página de registro.
    //@author: Oscar González Martínez
    //Versión: 1.0
    //Proyecto "Aforro Enerxético"
    include_once '../Class/Persona.class.php';    
    include_once "../Class/Validacion.class.php";
    include_once "../DAO/DAO.class.php";
    include_once "../Class/Erro.class.php";
    

 //Inicialización de variables 
 $adminRol = $adminLogin = $adminName = $adminSurname = $adminPassWord = $adminVerifyPassword = $adminEmail = $adminVerifyEmail = $adminAddress = $adminActiveUser = "";
 $adminError = array();
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
        <meta charset="UTF-8">
        <title>Registro de Usuario</title>
        <?php
           include '../head.php'; 
        ?>
    </head>
    <body>
        <?php
            include '../menu.php'; 
        ?>
        <div class="fondo alto">
            <div class="container"> 
            <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" >
                <div class="col-12 pt-3 pb-1">
                    <h1 class="text-primary">Registrarse</h1>
                </div>
                <div class="container border border-5 border border-primary border rounded-3 bg-light">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12 col-lg-12 px-3 mt-3">       
                                <!--  ROL -->
                                <label for="adminRol">Rol </label>
                                <select name="adminRol" id="adminRol" class="form-select input-group-text">
                                    <option value="Usuario">Usuario</option>
                                    <option value="Admin">Administrador</option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-12 px-3 mt-3">
                                <!-- Nombre de Login -->
                                <label for="adminLogin">Login</label>            
                                <input type="text" name="adminLogin" class="input-group-text" value="<?php if(isset($_POST['adminLogin'])) { echo $_POST['adminLogin'];} ?>"/>            
                            </div>
                            <div class="col-12 col-lg-12 px-3 mt-3">
                                <!-- Nombre del Usario -->
                                <label for="adminName">Nombre</label>
                                <input type="text" name="adminName" class="input-group-text" value="<?php if(isset($_POST['adminName'])) { echo $_POST['adminName']; } ?>" />
                            </div>    
                            <div class="col-12 col-lg-12 px-3 mt-3">        
                                <!-- Apellido del Usario -->
                                <label for="adminSurName">Apellidos</label>
                                <input type="text" name="adminSurName" class="input-group-text" value="<?php if(isset($_POST['adminSurName'])) { echo $_POST['adminSurName']; } ?>" />
                            </div>
                            <div class="col-12 col-lg-12 px-3 mt-3">            
                                <!-- Campo Password. Por seguridad en caso de fallo no recupera el valor de la conrtaseña -->
                                <label for="adminPassWord">Contraseña</label>            
                                <input type="password" name="adminPassword" class="input-group-text"/>
                            </div>      
                            <div class="col-12 col-lg-12 px-3 mt-3">      
                                <!-- Verificar PassWord -->
                                <label for="adminVerifyPassWord">Verificar Contraseña</label>
                                <input type="password" name="adminVerifyPassword" class="input-group-text"/>
                            </div>
                            <div class="col-12 col-lg-12 px-3 mt-3">            
                                <!-- Email -->
                                <label for="adminEmail">Correo Electronico </label>
                                <input type="adminEmail" name="adminEmail" class="input-group-text" value="<?php if (isset($_POST['adminEmail'])) { echo $_POST['adminVerifyEmail'];}?>"/>
                            </div>
                            <div class="col-12 col-lg-12 px-3 mt-3">            
                                <!-- Verificar Email -->
                                <label for="adminVerifyEmail">Verificar Correo Electronico </label>
                                <input type="adminVerifyEmail" name="adminVerifyEmail" class="input-group-text" value="<?php if (isset($_POST['adminEmail'])) { echo $_POST['adminVerifyEmail'];}?>"/>
                                <br/>
                                <label for="adminAddress">Dirección</label>
                                <input type="text" name="adminAddress" id="adminAdress" class="input-group-text" value="<?php if (isset($_POST['adminAddress'])) {echo $_POST['adminAddress']; } ?>">
                            </div>
                            <div class="col-12 col-lg-12 px-3 mt-3"> 
                                <label for="adminActiveUser">Activar Usuario</label>
                                <select name="adminActiveUser" id="adminActiveUser" class="form-select input-group-text">
                                    <option value="0" selected>Desactivar</option>
                                    <option value="1">Activar</option>                                    
                                </select>
                            </div>
                            <div class="col-12 col-lg-12 px-3 mt-3 mb-3">
                                <!-- Input y Reset -->
                                <input type="submit" value="Confirmar" class="btn btn-primary" name="adminSubmit"/>
                                <input type="reset" value="Borrar" class="btn btn-primary"/>
                                
                            </div>   
                            <button class="btn btn-primary"><a class="nav-link text-white" href="adminDelUser.php">Gestion de Usuarios</a></button>
                        </div>
        <?php
        // put your code here
        if (isset($_POST['adminSubmit'])){          
           
            if (isset($_POST['adminRol'])){
                $adminRol = $_POST['adminRol'];
            }
            
            //Validación de Login            
            if (isset($_POST['adminLogin'])){
                if (Validacion::validarLogin($_POST['adminLogin'])){
                    $adminLogin = trim($_POST['adminLogin']);
                } else {
                    Erro::addError("adminLoginError" ,"Login Invalido");                    
                }
            }
            //Validación de Nombre
            if (isset($_POST['adminName'])){
                if (Validacion::validarNombre($_POST['adminName'])){
                    $adminName = trim($_POST['adminName']);
                } else {
                    Erro::addError("adminNameError","Nombre invalido");                    
                }
            }
            //Validación de Apellido
            if (isset($_POST['adminSurName'])){
                if (Validacion::validarApellido($_POST['adminSurName'])){
                    $adminSurname = trim($_POST['adminSurName']);
                } else {
                    Erro::addError("adminSurNameError","Nombre invalido");                    
                }
            }
            //Validación de Password y encriptación
            if (isset($_POST['adminPassword'])) {
                //Comprueba si se ha introducido la validacion.
                if (isset($_POST['adminVerifyPassword'])) {
                    //Comprueba que ambas cadenas son iguales
                    if (Validacion::comprobarStrings($_POST['adminPassword'],$_POST['adminVerifyPassword'])){
                        //Si todo es correcto, se genera la la contraseña cifrada.
                        if (Validacion::validarPassword($_POST['adminPassword'])){
                            $adminPassWord = Persona::generate_hash($_POST['adminPassword']);
                        } else {
                            Erro::addError("adminPassWordError","La contraseña no cumple los requisitos: 1 Mayuscula,1 Minuscula, 1 carácter especial");
                        }
                    } else {
                      Erro::addError("adminPassWordError","Las contraseñales son distintas");                      
                    }                   
                    
                } else {
                    //Se genera un error si no se ha introducido.
                    Erro::addError("adminVerifyPasswordError","Verifique la contraseña");                    
                }                
            } else {
                //Se genera un error si no se ha introducido la contraseña.
                Erro::addError("adminPassWord" ,"Introduzca Password");
            }
            
           //Validación email.
            
           if (isset($_POST['adminEmail'])){
            //Comprueba que el campo validar email tenga valor
            if (isset($_POST['adminVerifyEmail'])){
                //Comprueba que los Campos Mail y Verificar Email sean iguales.
                if (Validacion::comprobarStrings($_POST['adminEmail'],$_POST['adminVerifyEmail'])){
                    //Validamos el campo Mail si las cadenas son iguales
                    if (Validacion::validarEmail($_POST['adminEmail'])){
                        $adminEmail = $_POST['adminEmail'];
                    } else {
                        Erro::addError("adminEmail","El correo no cumple los requisitos de email");
                    }
                } else {
                     //Error cuando los campos no son iguales.

                    Erro::addError("adminVerifyEmailError", "Los campos no son iguales");                        
                }                    
            } else {
                //Error cuando el campo verificar email está vacío
                Erro::addError("adminVerifyEmail","Confirme Email");                    
            }                
        } else {
            //error cuando el campo email está vacío.
            Erro::addError("adminEmailError","Introduzca Email");                
        }

             //Validaciones Dirección.
             if (isset($_POST['adminAddress'])){               
                $adminAddress = $_POST['adminAddress'];
        } else {
            Erro::addError("adminAddressError","Inntroduzca dirección");
        }
            //Validacion de Usuario activo.
            if (isset($_POST['adminActiveUser'])){
                $adminActiveUser = $_POST['adminActiveUser'];                
            }
                    
            if (Erro::countErros() == 0){
                if (DAO::existsUserName($adminLogin) || DAO::existsUserEmail($adminEmail)){
                    Erro::addError("UserError","Usuario o email ya existentes");
                  //  echo Erro::showErrors();
                }else {
                if ($_POST['adminRol'] == "Admin"){
                    $admin = new Admin($adminRol,$adminLogin,$adminName,$adminPassWord,$adminSurname,$adminEmail);                    
                    DAO::insertAdmin($admin);
                } else {
                    $user = new Usuario($adminRol,$adminLogin,$adminName,$adminPassWord,$adminSurname,$adminEmail,$adminAddress,$adminActiveUser);
                    DAO::insertUser($user);
                }
            }
            } else {
                //echo Erro::showErrors();
            }
        }
        include_once '../componentes/error.php';

        ?>
         </div>
                </div>
            </form>
            
            </div>
        </div>
    </body>
</html>

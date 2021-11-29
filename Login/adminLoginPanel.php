<!DOCTYPE html>
<?php 
    //Página de registro.
    //@author: Oscar González Martínez
    //Versión: 0.1
    //Proyecto "Aforro Enerxético"
    include_once '../Class/Persona.class.php';    
    include_once "../Class/Validacion.class.php";
    include_once "../DAO/DAO.class.php";
    include_once "../Class/Erro.class.php";
    
 //Inicialización de variables 
 $adminRol = $adminLogin = $adminName = $adminSurname = $adminPassWord = $adminVerifyPassword = $adminEmail = $adminVerifyEmail = $adminAddress = "";
 
 //$adminLoginError = $adminNameError = $adminSurnameError = $adminPassWordError = $adminVerifyPasswordError = $adminEmailError = $adminVerifyEmail = "";
 $adminError = array(); 
    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro de Usuario</title>
        <style>
            .container {
                border: solid 1px;
                margin: auto;
                width: 600px;
            }
        </style>
    </head>
    <body>
        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" >
        <div class="container">            
            <!--  ROL -->
            <label for="adminRol">Rol </label>
            <input type="text" name="adminRol" id="adminRol">
            <!-- Nombre de Login -->
            <label for="adminLogin">Login</label>            
            <input type="text" name="adminLogin" value="<?php if(isset($_POST['adminLogin'])) { echo $_POST['adminLogin'];} ?>"/>            
            <br/>
            <!-- Nombre del Usario -->
            <label for="adminName">Nombre</label>
            <input type="text" name="adminName" value="<?php if(isset($_POST['adminName'])) { echo $_POST['adminName']; } ?>" />
            <br/>            
            <!-- Apellido del Usario -->
            <label for="adminSurName">Apellidos</label>
            <input type="text" name="adminSurName" value="<?php if(isset($_POST['adminSurName'])) { echo $_POST['adminSurName']; } ?>" />
            <br/>            
            <!-- Campo Password. Por seguridad en caso de fallo no recupera el valor de la conrtaseña -->
            <label for="adminPassWord">Contraseña</label>            
            <input type="password" name="adminPassword"/>
            <br/>            
            <!-- Verificar PassWord -->
            <label for="adminVerifyPassWord">Verificar Contraseña</label>
            <input type="password" name="adminVerifyPassword"/>
            <br/>            
            <!-- Email -->
            <label for="adminEmail">Correo Electronico </label>
            <input type="adminEmail" name="adminEmail" value="<?php if (isset($_POST['adminEmail'])) { echo $_POST['adminVerifyEmail'];}?>"/>
            <br/>            
            <!-- Verificar Email -->
            <label for="adminVerifyEmail">Verificar Correo Electronico </label>
            <input type="adminVerifyEmail" name="adminVerifyEmail" value="<?php if (isset($_POST['adminEmail'])) { echo $_POST['adminVerifyEmail'];}?>"/>
            <br/>
            <label for="adminAddress">Dirección</label>
            <input type="text" name="adminAddress" id="adminAdress" value="<?php if (isset($_POST['adminAddress'])) {echo $_POST['adminAddress']; } ?>">
            <br/>
            <!-- Input y Reset -->
            <input type="submit" value="Confirmar" name="adminSubmit"/>
            <input type="reset" value="Borrar"/>
            
            
        </div>
        </form>
        <?php
        // put your code here
        if (isset($_POST['adminSubmit'])){          
           
            
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
                if (Validacion::validarNombreUsuario($_POST['adminName'])){
                    $adminName = trim($_POST['adminName']);
                } else {
                    Erro::addError("adminNameError","Nombre invalido");                    
                }
            }
            //Validación de Apellido
            if (isset($_POST['adminSurName'])){
                if (Validacion::validarNombreUsuario($_POST['adminSurName'])){
                    $adminName = trim($_POST['adminSurName']);
                } else {
                    Erro::addError("adminSurNameError","Nombre invalido");                    
                }
            }
            //Validación de Password y encriptación
            if (isset($_POST['adminPassword'])) {
                //Comprueba si se ha introducido la validacion.
                if (isset($_POST['adminVerifyPassword'])) {
                    //Comprueba que ambas cadenas son iguales
                    if (Validacion::comparaString($adminPassWord,$adminVerifyPassword)){
                        //Si todo es correcto, se genera la la contraseña cifrada.
                        $adminPassWord = Persona::generate_hash($adminPassWord);
                    } else {
                      Erro::addError("adminPassWordError","Las contraseñales son distintas");                      
                    }                   
                    
                } else {
                    //Se genera un error si no se ha introducido.
                    Erro::addError("adminVerifyPasswordError","Verifique la contraseña");                    
                }                
            } else {
                //Se genera un error si no se ha introducido la conrtaseña.
                Erro::addError(adminPassWord ,"Introduzca Password");
            }
            
            //Validación email.
            
            if (isset($_POST['adminEmail'])){
                //Comprueba que el campo validar email tenga valor
                if (isset($_POST['adminVerifyEmail'])){
                    //Comprueba que los Campos Mail y Verificar Email sean iguales.
                    if (Validacion::comparaString($adminEmail,$adminVerifyEmail)){
                        $adminEmail = trim($_POST['adminEmail']);
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

            if (isset($_POST['adminAddress'])){
                if (Validacion::validarDireccion($_POST['adminAddress'])){
                    $adminAddress = $_POST['adminAddress'];
                } else {
                    Erro::addError("adminAddressError","Dirección contiene caracteres incorrectos");
                }
                
            } else {
                Erro:addError("adminAddressError","Inntroduzca dirección");
            }
            
            if (Erro::countErros() == 0){
                $admin = new Usuario($adminLogin,$adminName,$adminPassWord,$adminSurname,$adminEmail,$adminRol,$adminAddress);
                DAO::insertAdmin($admin);
            }
        }
        ?>
    </body>
</html>

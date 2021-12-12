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
 $userRol = $userLogin = $userName = $userSurname = $userPassWord = $userVerifyPassword = $userEmail = $userVerifyEmail = $userAddress = "";
 $userError = array();
 //Comento el inicio de Sesión. Se inicia Sesión desde el Menú para poder mostrar el enlace a cerrar sesión si hay una sesion iniciada.
 session_status() === PHP_SESSION_ACTIVE ?: session_start();
 if(isset($_SESSION['userLogged'])) {
    $user = $_SESSION['userLogged'];    
} else {
    header('Location: signUp.php');
}
?>
  <head>
        <meta charset="UTF-8">
        <title>Panel de Control de Usuario</title>
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
                                <!-- Nombre de Login -->
                                <label for="userLogin">Login</label>            
                                <input type="text" name="userLogin" class="input-group-text" value="<?php echo $user->getLogin(); ?>"/>            
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
                                <input type="password" name="userPassword" class="input-group-text"/>
                            </div>      
                            <div class="col-12 col-lg-12 px-3 mt-3">      
                                <!-- Verificar PassWord -->
                                <label for="userVerifyPassWord">Verificar Contraseña</label>
                                <input type="password" name="userVerifyPassword" class="input-group-text"/>
                            </div>
                            <div class="col-12 col-lg-12 px-3 mt-3">            
                                <!-- Email -->
                                <label for="userEmail">Correo Electronico </label>
                                <input type="userEmail" name="userEmail" class="input-group-text" value="<?php echo $user->getEmail(); ?>;"/>
                            </div>
                            <div class="col-12 col-lg-12 px-3 mt-3">            
                                <!-- Verificar Email -->
                                <label for="userVerifyEmail">Verificar Correo Electronico </label>
                                <input type="userVerifyEmail" name="userVerifyEmail" class="input-group-text" value="<?php if (isset($_POST['userEmail'])) { echo $_POST['userVerifyEmail'];}?>"/>
                                <br/>
                                <label for="userAddress">Dirección</label>
                                <input type="text" name="userAddress" id="userAdress" class="input-group-text" value="<?php echo $user->getAddress(); ?>">
                            </div>
                            <div class="col-12 col-lg-12 px-3 mt-3 mb-3">
                                <!-- Input y Reset -->
                                <input type="submit" value="Confirmar" class="btn btn-primary" name="userSubmit"/>
                                <input type="reset" value="Borrar" class="btn btn-primary"/>
                                
                            </div>                               
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
</body>
</html>
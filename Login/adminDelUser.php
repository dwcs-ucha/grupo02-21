<?php
/*
  Pagina de gestión de usuarios.
  Autor: Oscar González Martínez y Rubén Dopico Novo
  Fecha: 07/12/2021
  Version: 1.0
 */
include_once '../Class/Persona.class.php';
include_once '../Class/Usuario.class.php';
include_once '../Class/Admin.class.php';
include_once "../Class/Validacion.class.php";
include_once "../DAO/DAO.class.php";
include_once "../Class/Erro.class.php";

$dataBaseAdmins = DAO::getAdmins();
session_start();
if(isset($_SESSION['userLogged'])) {
    $user = $_SESSION['userLogged'];
    if($user->getRol() != 'Admin') {
        header('Location: ../index.php');
    }
} else {
    header('Location: signUp.php');
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include_once '../componentes/head.php'; ?>
        <meta charset="UTF-8">
        <title>Panel de Control</title>
    </head>
    <body>
        <?php include_once '../componentes/menu.php'; 
        include_once "../componentes/cookieAlert.php";
        ?>
        <div class="container">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="form-group">
            <label for="setRol">Selecciona un Rol
                <select name="setRol" id="setRol" class="form-select">
                    <option value="admin">Administradores</option>
                    <option value="user">Usuarios</option>
                    <option value="all">Todos los Usuarios</option>
                </select>        
            </label>
            <input type="submit" name="selectRol" value="Seleccionar">
        </form>
        
        <?php
        $selected = "";
        if (isset($_POST['selectRol'])) {
            $selected = $_POST['setRol'];
            echo '<table>';
            if ($selected == 'admin') {
                $dataBaseUsers = DAO::getAdmins();
                if ($dataBaseUsers != null) {
                    foreach ($dataBaseUsers as $users) {
                        echo '<tr>';
                        echo '<td>' . $users->getRol() . '</td>';
                        echo '<td>' . $users->getLogin() . '</td>';
                        echo '<td><a href="./elimUser.php?login=' . $users->getLogin() . '">Eliminar</a></td>';
                        echo '</tr>';
                    }
                }
            } else if ($selected == 'user') {
                $dataBaseUsers = DAO::getUsers();
                if ($dataBaseUsers != null) {
                    foreach ($dataBaseUsers as $users) {
                        echo '<tr>';
                        echo '<td>' . $users->getRol() . '</td>';
                        echo '<td>' . $users->getLogin() . '</td>';
                        echo '<td><a href="./elimUser.php?login=' . $users->getLogin() . '">Eliminar</a></td>';
                        echo '</tr>';
                    }
                }
            } else {
                $dataBaseUsers = DAO::getAllUsers();
                if ($dataBaseUsers != null) {
                    foreach ($dataBaseUsers as $users) {
                        echo '<tr>';
                        echo '<td>' . $users->getRol() . '</td>';
                        echo '<td>' . $users->getLogin() . '</td>';
                        echo '<td><a href="./elimUser.php?login=' . $users->getLogin() . '">Eliminar</a></td>';
                        echo '</tr>';
                    }
                }
            }
            echo '</table>';
        }
        if (isset($_SESSION['eliminado'])) {
            echo '<br>'.$_SESSION['eliminado'];
            unset($_SESSION['eliminado']);
        }
        ?>
        </div>
    </body>
</html>
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
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Panel de Control</title>
    </head>
    <body>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="setRol">Selecciona un Rol
                <select name="setRol" id="setRol">
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
    </body>
</html>
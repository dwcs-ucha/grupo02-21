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
if (isset($_SESSION['user'])) {
    $rol = $_SESSION['user']['rol'];              
    if ($rol != "Admin"){    
        header('Location: /index.php');
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
    <div class="fondo">
        <main class="container alto">
            <div class="col-12 pt-5 pb-1">
                <div class="container border border-5 border border-primary border rounded-3 bg-light">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12 col-lg-12 px-3 mt-3">
                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="form-group">
                                    <label class="text-primary fs-4 fw-bold" for="setRol">Selecciona un Rol
                                        <select name="setRol" id="setRol" class="form-select  input-group-text" style="width: 100%;">
                                            <option value="admin">Administradores</option>
                                            <option value="user">Usuarios</option>
                                            <option value="all">Todos los Usuarios</option>
                                        </select>
                                    </label>
                                    <input type="submit" name="selectRol" class="btn btn-primary mb-1" value="Seleccionar">
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-12 px-3 mt-3">
                                <?php
                                $selected = "";
                                if (isset($_POST['selectRol'])) {
                                    $selected = $_POST['setRol'];
                                    echo '<table class="table table-borderless">';
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
                                    echo '<br>' . $_SESSION['eliminado'];
                                    unset($_SESSION['eliminado']);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include '../componentes/footer.php'; ?>
    </div>

</body>

</html>
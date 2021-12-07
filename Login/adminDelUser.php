<?php
    /* 
        Pagina de gestión de usuarios.
        Autor: Oscar González Martínez y Rubén Dopico Novo
        Fecha: 07/12/2021
        Version: 1.0
    */

    include_once '../Class/Persona.class.php';    
    include_once "../Class/Validacion.class.php";
    include_once "../DAO/DAO.class.php";
    include_once "../Class/Erro.class.php";

    
    $dataBaseAdmins = DAO::getAdmins();

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
        </select>        
        </label>
        <input type="submit" name="selectRol" value="Seleccionar">
    </form>

    <?php 
        $selected = "";
        if (isset($_POST['selectRol'])){
            $selected = $_POST['setRol'];

            if ($selected == 'admin') {
                $dataBaseUsers = DAO::getAdmins();
                echo '<table>';
                foreach($dataBaseUsers as $users) {
                    echo '<tr>';
                    echo '<td>'.$users->getRol().'</td>';
                    echo '<td>'.$users->getLogin().'</td>';
                    echo '<td><button type="submit">Eliminar</button></td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                $dataBaseUsers = DAO::getUsers();
                echo '<table>';
                foreach($dataBaseUsers as $users) {
                    echo '<tr>';
                    echo '<td>'.$users->getRol().'</td>';
                    echo '<td>'.$users->getLogin().'</td>';
                    echo '<td><button type="submit">Eliminar</button></td>';
                    echo '</tr>';
                }
                echo '</table>';
            }
        }
    ?>
</body>
</html>
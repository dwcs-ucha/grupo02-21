<<<<<<< HEAD
<!--
    Cierre de Sesión
    @author Oscar González Martínez    
    Fecha: 10/12/2021
-->

=======
<?php 
    setcookie("cookie_readed", true,  time() + 86400);
?>
>>>>>>> db68affd93f81bdce168adefb1bec52360fc9198
<html>
    <head>
        <meta charset="UTF-8">
        <title>Logoff</title>
    </head>
    <body>
        <?php
            //recuperamos la sesión iniciada.
            session_start();
            //Eliminamos la sesion.
            session_unset();
            session_destroy();
            session_write_close();
            setcookie(session_name(),'',0,'/');
            session_regenerate_id(true);            
            //Redireccionamos a la página de login.
            header("Location: ../index.php");
        ?>
    </body>
</html>

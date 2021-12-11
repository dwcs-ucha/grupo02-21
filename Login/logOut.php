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

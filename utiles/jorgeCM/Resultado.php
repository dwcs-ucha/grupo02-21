<?php
/* 
 * Author: Jorge Carreño Miranda
 * Version:1.0.0
 * Last modified: 08/12/2021
 */
session_start();
include_once './Class/classCalculadora.php';
var_dump($_SESSION['vivienda']);
?>
<html>
    <head>
        <title>Resultado</title>
    </head>
    <body>
        <form>
            <img src="Imagenes/certificado.png" alt="Imagen del certificado energético"/>
        </form>
    </body>
</html>
<?php
        
        
?>
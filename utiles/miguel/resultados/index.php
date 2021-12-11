<?php
/* 
 * Página con los resultados de los consumos anuales de equipos
 * 
 * @author Miguel A García Fustes
 * @date  de  de 2021
 * @version 1.0.0
 */

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../../../plantillas/head.php'; ?>
    <link rel="stylesheet" href="./vistas/assets/css/equipos.css">
    <title>Resultados calculadora avanzada</title>
</head>

<body>
    <?php include '../../../plantillas/menu.php'; ?>
    <form action="/utiles/miguel/index.php" method="POST">
        <div class="container my-5">
            <?php include '../vistas/resultados.php'; ?>
        </div>
    </form>
</body>

</html>
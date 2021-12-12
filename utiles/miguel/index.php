<?php
/* 
 * Calculadora avazada
 * Punto de entrada a las vistas
 * @author Miguel A García Fustes
 * @date 25 de Noviembre de 2021
 * @version 1.0.0
 * 
 * Nuestra calculador utiliza 5 tipos de equipos según su consumo que se clasifican del siguiente modo:
 * tipo 1: Equipo cuyo consumo se calcula en función de las horas y minutos de uso semanal (televisor, secador, batidora, etc)
 * tipo 2: Equipo cuyo funcionamiento es contínuo (365/24)
 * tipo 3: Equipo cuyo consumo se calcula por uso, donde se multiplica el uso por los hWh/uso (lavadora, lavavajillas, etc)
 * tipo 4: Equipo cuyo consumo se calcula por uso mensual, habitualmente Km al mes (cualquier equipo de transporte)
 * tipo 5: Equipo de iluminación, donde la potencia se obtiene en función del tipo de bombilla
 */
session_start();
include_once '../../Class/Erro.class.php';
$resultados = isset($_POST) ? $_POST : null;

if ($resultados) {
    include_once '../../Class/Validacion.class.php';
    include_once './validaciones/validadatos.php';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../../componentes/head.php'; ?>
    <link rel="stylesheet" href="./vistas/assets/css/equipos.css">
    <title>Calculadora Avanzada</title>
</head>

<body>
    <?php include '../../componentes/menu.php'; ?>
    <div class="fondo">
        <?php include '../../componentes/error.php'; ?>
        <form action="/utiles/miguel/index.php" method="POST">
            <div class="container my-5">
                <?php include './vistas/datos.php'; ?>
            </div>
        </form>
    </div>
</body>
<script src="./vistas/assets/js/equipos.js"></script>
<script src="./vistas/assets/js/datos.js"></script>

</html>
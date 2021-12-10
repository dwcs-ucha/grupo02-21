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

 // Cargar clases necesarias
 // Clase Erro para controlar los posibles errores
include_once '../../../Class/Erro.class.php';
$resultados = isset($_POST) ? $_POST : null;

if ($resultados) {
    // Cargar clases necesarias
    include_once '../../../Class/Validacion.class.php';
    // Validar los datos enviados por el usuario
    include_once '../clases/ValidacionesEquipos.class.php';
    include_once '../validaciones/validadatos.php';
    include_once '../validaciones/validaequipos.php';

    // Si no hay errores realizar los cálculos
    if (Erro::countErros() == 0) {
        header('location /index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Head principal con los estilos del sitio -->
    <?php include '../../../plantillas/head.php'; ?>
    <!-- Estilos propios de la página -->
    <link rel="stylesheet" href="../vistas/assets/css/equipos.css">
</head>

<body>
    <!-- Cabecera de la página -->
    <?php include '../../../plantillas/menu.php'; ?>
    <!-- Espacio reservado para mostrar los posibles errores -->
    <?php include '../../../plantillas/error.php'; ?>
    <!-- Formulario para la solicitud de datos y consumos del hogar -->
    <form action="/utiles/miguel/datos/index.php" method="POST">
        <div class="container my-5">
            <!-- Cargar la vista con los campos -->
            <?php include '../vistas/datos.php'; ?>
        </div>
    </form>
</body>
<!-- Javascript de la página -->
<!-- Calcula en tiempo real consumos para mostrar al usuario -->
<script src="../vistas/assets/js/equipos.js"></script>
<!-- Permite el cambio de datos a equipos -->
<script src="../vistas/assets/js/datos.js"></script>

</html>
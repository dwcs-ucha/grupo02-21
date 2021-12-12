<?php
/* 
 * Página con los resultados de los consumos anuales de equipos
 * 
 * @author Miguel A García Fustes
 * @date  de  de 2021
 * @version 1.0.0
 */

session_start();

$consumosPorEquipos = $_SESSION['consumos']['por_equipo'];

$numResultados = isset($consumosPorEquipos) ? count($consumosPorEquipos) : 0;

if ($numResultados) {
    // Añadir parámetro de color según consumo
    include '../clases/Color.class.php';
    $colores = Color::getColoresCalidosFrios($numResultados);
    $equipos = array();
    $i = 0;

    foreach ($consumosPorEquipos as $equipo) {
        $equipo['color'] = $colores[$i];
        $equipos[] = $equipo;
        $i++;
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Cargar datos header común del proyecto -->
    <?php include '../../../componentes/head.php'; ?>
    <!-- Cargar estilos propios de la página -->
    <link rel="stylesheet" href="../vistas/assets/css/resultados.css">
    <!-- Cargar javascript de chartjs para generar la gráfica -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Añadir title. Cada página tiene su propio title -->
    <title>Resultados calculadora avanzada</title>
</head>

<body>
    <!-- Cargar la cabecera del proyecto -->
    <?php include '../../../componentes/menu.php'; ?>

    <!-- Contenido propio de la página -->
    <div class="container my-5">
        <?php include '../vistas/resultados.php'; ?>
    </div>
    <!-- Cargar javascript para pasar los datos y generar la gráfica -->
    <script src="../vistas/assets/js/resultados.js"></script>
</body>

</html>
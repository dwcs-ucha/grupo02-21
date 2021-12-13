<?php
/*
CABECEIRA:

    TRABAJO: CALCULADORA INDIVIDUAL
    AUTOR: Ricardo Apaza Cueva
    CURSO:2ºDAW
    FECHA:08/12/2021
    */
?>
<html>

<head>
    <meta charset="utf-8">
    <title>CALCULADORA</title>
    <!-- <link rel="stylesheet" href="estilo.css"> -->
    <link rel="stylesheet" href="../../css/custom.css">
    <?php
     include '../../componentes/head.php';
    ?>
</head>


<body>
    <?php
  

    include_once '../../componentes/menu.php';
    include_once '../../componentes/cookieAlert.php';
    ?>


    <?php
    require_once("calculadora.class.php");

    if (isset($_POST['enviar'])) {
        if ((!empty($_POST['cantidadTradicionales'])) && (!empty($_POST['lumenes'])) && (!empty($_POST['costeEnergia'])) && (!empty($_POST['cantidadLED'])) && (!empty($_POST['lumenesLED'])) && (!empty($_POST['costeEnergiaLED']))) {
            $bombillasCambiarUnidad = $_POST['cantidadTradicionales'];
            $lumenesBombillasTradicionales = $_POST['lumenes'];
            $costeEnergia = $_POST['costeEnergia'];
            $calculoTradicional = new Calculadora($bombillasCambiarUnidad, $lumenesBombillasTradicionales, $costeEnergia);
            echo "CALCULO DE BOMBILLAS TRADICIONALES:<br>";
            echo $calculoTradicional->calculoBombillas() . "\nEuros por cada hora encendida<br>";
            echo $calculoTradicional->calculoBombillas() * 730, 001 . "\nEuros cada 30 días<br>";
            echo $calculoTradicional->calculoBombillas() * 8760, 00240024 . "\nEuros al año<br>";
            echo "<hr>";
            $calculoLED = new Calculadora($_POST['cantidadLED'], $_POST['lumenesLED'], $_POST['costeEnergiaLED']);
            echo "CALCULO DE BOMBILLAS LEDS:<br>";
            echo $calculoLED->calculoBombillas() . "\nEuros por cada hora encendida<br>";
            echo $calculoLED->calculoBombillas() * 730, 001 . "\nEuros cada 30 días<br>";
            echo $calculoLED->calculoBombillas() * 8760, 00240024 . "\nEuros al año<br>";
        } else {
          echo "<p class='text-danger'>Datos vacíos</p>";
        }
    }
    ?>
    <div class="fondo">
        <div class="col-12 pt-5 pb-1">
        </div>
        <div class="container border border-5 border border-primary border rounded-3 bg-light">
         <div class="col-12 col-lg-12">
            <form action="index.php" method="post">
                <legend><h3>CALCULADORA DE AFORRO ENERXÉTICOS</h3></legend>
                <div>
                    <p id="tradicional">cantidad bombillas tradicionales:</p>
                    <input type="number" step="any" id="cantidadTradicionales" name="cantidadTradicionales">
                    <p id="tradicional">consume medio total(W) de cada bombilla tradicional:</p>
                    <input type="number" step="any" id="lumenes" name="lumenes">
                    <p id="tradicional">coste de energía de las bombillas tradicionales(KW/h)</p>
                    <input type="number" step="any" id="costeEnergia" name="costeEnergia">
                </div>
             
                <br>
                <hr>
                <br>
                <div id="LED">
                    <p>cantidad bombillas LED:</p>
                    <input type="number" step="any" id="cantidadLED" name="cantidadLED">
                    <p>consume medio total(W) de cada bombilla LED:</p>
                    <input type="number" step="any" id="lumenesLED" name="lumenesLED">
                    <p>coste de energía de las bombillas LEDS(KW/h)</p>
                    <input type="number" step="any" id="costeEnergiaLED" name="costeEnergiaLED">

                </div>
                <br>
                <div id="enviar">
                    <input type="submit" id="enviar" name="enviar" value="enviar">
                </div>
            </form>
        </div>
    </div>
    <?php include_once '../../componentes/footer.php'; ?>
</body>

</html>
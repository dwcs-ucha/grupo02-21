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
    include '../../head.php';
    ?>
</head>


<body>
    <?php
    include '../../menu.php';
    include_once '../../cookieAlert.php';
    include_once '../../Class/Erro.class.php';
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
            Erro::addError("EmptyField", "Introduzca todos los datos");
        }
    }
    ?>
    <div id="fondo">
        <div class="col-12 pt-5 pb-1">
            <h1 class="text-primary">CALCULADORA DE AFORRO ENERXÉTICOS</h1>
        </div>
        <div class="container border border-5 border border-primary border rounded-3 bg-light">
         <div class="col-12 col-lg-12">
            <form action="index.php" method="post">
                <div>
                    <h1 id="tradicional">cantidad bombillas tradicionales:</h1>
                    <input type="number" step="any" id="cantidadTradicionales" name="cantidadTradicionales">
                    <h1 id="tradicional">consume medio total(W) de cada bombilla tradicional:</h1>
                    <input type="number" step="any" id="lumenes" name="lumenes">
                    <h1 id="tradicional">coste de energía de las bombillas tradicionales(KW/h)</h1>
                    <input type="number" step="any" id="costeEnergia" name="costeEnergia">
                </div>
             
                <br>
                <hr>
                <br>
                <div id="LED">
                    <h1>cantidad bombillas LED:</h1>
                    <input type="number" step="any" id="cantidadLED" name="cantidadLED">
                    <h1>consume medio total(W) de cada bombilla LED:</h1>
                    <input type="number" step="any" id="lumenesLED" name="lumenesLED">
                    <h1>coste de energía de las bombillas LEDS(KW/h)</h1>
                    <input type="number" step="any" id="costeEnergiaLED" name="costeEnergiaLED">

                </div>
                <br>
                <div id="enviar">
                    <input type="submit" id="enviar" name="enviar" value="enviar">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
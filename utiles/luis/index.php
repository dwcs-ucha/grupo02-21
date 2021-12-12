<?php

/**
 * @author luisvi
 * @email luisvaziza@gmail.com
 * @fechaDeCreación 11 dic 2021
 * @últimaModificación 12 dic 2021
 * @versión v01.04.00
 */

include_once '../../Class/Erro.class.php';
$resultados = isset($_POST) ? $_POST : null;

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once '../../head.php'; ?>
    <link rel="stylesheet" href="../../css/estilo.css">
    <link rel="stylesheet" href="../../css/custom.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php
    include_once '../../cookieAlert.php';
    include_once '../../menu.php';
    include_once './data/data.php'
    ?>

    <div class="fondo">
        <div class="container center_lvi">
            <br />
            <h3 class="title_lvi">Criptonómetro</h3>
            <br />
            <img src="./criptomonedas/currency_<?php echo isset($_POST["currency"]) ? $_POST["currency"] : 0 ?>.png" height="175" />
            <br /><br />

            <form action="./index.php" method="POST">
                <select name="currency" id="currency" onchange="this.form.submit()">
                    <option value="0" <?php if (isset($_POST['currency']) && $_POST['currency'] == 0) {
                                            echo "selected";
                                        } ?>>Bitcoin</option>
                    <option value="1" <?php if (isset($_POST['currency']) && $_POST['currency'] == 1) {
                                            echo "selected";
                                        } ?>>Ethereum</option>
                    <option value="2" <?php if (isset($_POST['currency']) && $_POST['currency'] == 2) {
                                            echo "selected";
                                        } ?>>Bitcoin Cash</option>
                    <option value="3" <?php if (isset($_POST['currency']) && $_POST['currency'] == 3) {
                                            echo "selected";
                                        } ?>>Litecoin</option>
                    <option value="4" <?php if (isset($_POST['currency']) && $_POST['currency'] == 4) {
                                            echo "selected";
                                        } ?>>Ethereum 2.0</option>
                    <option value="5" <?php if (isset($_POST['currency']) && $_POST['currency'] == 5) {
                                            echo "selected";
                                        } ?>>Cardano</option>
                    <option value="6" <?php if (isset($_POST['currency']) && $_POST['currency'] == 6) {
                                            echo "selected";
                                        } ?>>Dogecoin</option>
                    <option value="7" <?php if (isset($_POST['currency']) && $_POST['currency'] == 7) {
                                            echo "selected";
                                        } ?>>XRP</option>
                </select>
            </form>

            <br />

            <button id="start" onclick="start()">Iniciar</button>
            <button id="stop" onclick="stop()" hidden>Parar</button>

            <br /><br />

            <div id="consumption" class="consumption">0 Wh</div>

            <br /><br />

            <div class="d-flex justify-content-center">
                <span class="span_lvi flex">
                    <img id="img_lvi" class="img_lvi" src="icons/bombilla.png" width="200px" />
                    <br /><br />
                    <p>Bombillas de 60W</p>
                    <p id="object_1">0</p>
                </span>
                <span class="span_lvi flex">
                    <img id="img_lvi" class="img_lvi" src="icons/tesla.png" width="200px" />
                    <br /><br />
                    <p>Km en un Tesla</p>
                    <p id="object_2">0</p>
                </span>
                <span class="span_lvi flex">
                    <img id="img_lvi" class="img_lvi" src="icons/washer.png" width="200px" />
                    <br /><br />
                    <p>Lavadoras</p>
                    <p id="object_3">0</p>
                </span>
                <span class="span_lvi">
                    <img id="img_lvi" class="img_lvi" src="icons/manowar.png" width="200px" />
                    <br /><br />
                    <p>Conciertos de Manowar</p>
                    <p id="object_4">0</p>

                </span>
            </div>
            <br />
            <div class="d-flex justify-content-center">
                <span class="span_lvi">
                    <img id="img_lvi" class="img_lvi" src="icons/family.png" width="200px" />
                    <br /><br />
                    <p>Consumo familiar en un año</p>
                    <p id="object_5">0</p>
                </span>
                <span class="span_lvi">
                    <img id="img_lvi" class="img_lvi" src="icons/soccermatches.png" width="200px" />
                    <br /><br />
                    <p>Partidos de fútbol</p>
                    <p id="object_6">0</p>
                </span>
                <span class="span_lvi">
                    <img id="img_lvi" class="img_lvi" src="icons/vigo.png" width="200px" />
                    <br /><br />
                    <p>Navidades de Vigo</p>
                    <p id="object_7">0</p>
                </span>
                <span class="span_lvi flex">
                    <img id="img_lvi" class="img_lvi" src="icons/timetravel.png" width="200px" />
                    <br /><br />
                    <p>Viajes en el tiempo</p>
                    <p id="object_8">0</p>
                </span>
            </div>

            <script>
                let intervalo;
                let is_started = false;

                let unit;
                let format_multiplier;

                let objects = [
                    60, //bombilla
                    200, //tesla
                    1200, //lavadora
                    600000, //manowar
                    9922000, //familia
                    25000000, //partido
                    100000000, //vigo
                    1210000000 //viaje
                ];

                let Wh_counter;
                let Wh = parseFloat(<?php echo $currency[isset($_POST["currency"]) ? $_POST["currency"] : 0] / 36000; ?>);

                function start() {
                    if (!is_started) {
                        intervalo = setInterval(
                            () => {
                                Wh_counter = Wh_counter + Wh;
                                document.getElementById("consumption").innerHTML = (Math.round(Wh_counter * 100) / (100 * format_multiplier)).toFixed(2) + " " + unit;

                                checkTime();
                            }, 100
                        );
                        is_started = true;
                        document.getElementById("start").setAttribute("hidden", true);
                        document.getElementById("stop").removeAttribute("hidden");
                    }
                }

                function stop() {
                    clearInterval(intervalo);
                    resetTime();
                    is_started = false;
                    document.getElementById("start").removeAttribute("hidden");
                    document.getElementById("stop").setAttribute("hidden", true);
                }

                function checkTime() {
                    writeValues();

                    switch (true) {
                        case (Wh_counter > checkMultiplier(1) && Wh_counter < checkMultiplier(2)):
                            format_multiplier = checkMultiplier(1);
                            unit = "KWh";
                            break;
                        case (Wh_counter > checkMultiplier(2) && Wh_counter < checkMultiplier(3)):
                            format_multiplier = checkMultiplier(2);
                            unit = "MWh";
                            break;
                        case (Wh_counter > checkMultiplier(3) && Wh_counter < checkMultiplier(4)):
                            format_multiplier = checkMultiplier(3);
                            unit = "GWh";
                            break;
                        case (Wh_counter > checkMultiplier(4) && Wh_counter < checkMultiplier(5)):
                            format_multiplier = checkMultiplier(4);
                            unit = "TWh";
                            break;
                    }
                }

                function checkMultiplier(num) {
                    multiplier = 1;
                    for (let i = 0; i < num; i++) {
                        multiplier = multiplier * 1000;
                    }
                    return multiplier;
                }

                function resetTime() {
                    unit = " Wh";
                    Wh_counter = Wh;
                    format_multiplier = checkMultiplier(0);
                }

                function writeValues() {
                    document.getElementById("object_1").innerHTML = parseInt(Wh_counter / objects[0]);
                    document.getElementById("object_2").innerHTML = parseInt(Wh_counter / objects[1]);
                    document.getElementById("object_3").innerHTML = parseInt(Wh_counter / objects[2]);
                    document.getElementById("object_4").innerHTML = parseInt(Wh_counter / objects[3]);
                    document.getElementById("object_5").innerHTML = parseInt(Wh_counter / objects[4]);
                    document.getElementById("object_6").innerHTML = parseInt(Wh_counter / objects[5]);
                    document.getElementById("object_7").innerHTML = parseInt(Wh_counter / objects[6]);
                    document.getElementById("object_8").innerHTML = parseInt(Wh_counter / objects[7]);
                }

                resetTime();
            </script>

        </div>
    </div>
</body>

</html>
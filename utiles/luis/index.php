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
    <?php include_once '../../plantillas/head.php'; ?>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="../../css/estilo.css">
</head>

<body>
    <?php include_once '../../plantillas/menu.php'; ?>
    <?php include_once '../../plantillas/error.php'; ?>
    <?php include_once './data/data.php' ?>

    <?php if (isset($_POST['currency']) && $_POST['currency'] == 0) { echo "selected";}?>

    <form action="./index.php" method="POST">
        <select name="currency" id="currency" onchange="this.form.submit()">
            <option value="0" <?php if (isset($_POST['currency']) && $_POST['currency'] == 0) { echo "selected";}?>>Bitcoin</option>
            <option value="1" <?php if (isset($_POST['currency']) && $_POST['currency'] == 1) { echo "selected";}?>>Ethereum</option>
            <option value="2" <?php if (isset($_POST['currency']) && $_POST['currency'] == 2) { echo "selected";}?>>Bitcoin Cash</option>
            <option value="3" <?php if (isset($_POST['currency']) && $_POST['currency'] == 3) { echo "selected";}?>>Litecoin</option>
            <option value="4" <?php if (isset($_POST['currency']) && $_POST['currency'] == 4) { echo "selected";}?>>Ethereum 2.0</option>
            <option value="5" <?php if (isset($_POST['currency']) && $_POST['currency'] == 5) { echo "selected";}?>>Cardano</option>
            <option value="6" <?php if (isset($_POST['currency']) && $_POST['currency'] == 6) { echo "selected";}?>>Dogecoin</option>
            <option value="7" <?php if (isset($_POST['currency']) && $_POST['currency'] == 7) { echo "selected";}?>>XRP</option>
        </select>
    </form>

    <button id="start" onclick="start()">Iniciar</button>
    <button id="stop" onclick="stop()">Parar</button>
    <script>
        let intervalo;
        let is_started = false;

        let unit;
        let format_multiplier;

        let Wh_counter;
        let Wh = parseFloat(<?php echo $currency[isset($_POST["currency"]) ? $_POST["currency"] : 0] / 36000; ?>);

        let fragmento = document.createDocumentFragment();
        let elemento = document.createElement("div");

        elemento.setAttribute("style", "border: 2px dotted red");

        function start() {
            if (!is_started) {
                intervalo = setInterval(
                    () => {
                        fragmento.appendChild(elemento);
                        document.documentElement.children[1].appendChild(fragmento);

                        Wh_counter = Wh_counter + Wh;
                        elemento.innerHTML = (Math.round(Wh_counter * 100) / (100 * format_multiplier)).toFixed(2) + " " + unit;

                        checkTime();
                    }, 100
                );
                is_started = true;
            }
        }

        function stop() {
            clearInterval(intervalo);
            resetTime();
            is_started = false;
        }

        function checkTime() {
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

        resetTime();
    </script>
</body>

</html>
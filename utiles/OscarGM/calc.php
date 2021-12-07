<?php
//Autor: Oscar González Martínez
//Proyecto Individdual: Calculo del consumo electrico de una vivienda.
//Fecha de Inicio: 28/11/2021
//Versión: 1.0
//Proyecto basado en: https://es.calcuworld.com/ahorro/calculadora-de-consumo-electrico/
include_once "Class/Devices.class.php";
include_once "Class/Fm.class.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>calculadora de Consumo electrico</title>
    
    <link rel="stylesheet" href="./estilos/style.css">
</head>

<body>
    <fieldset>
        <legend> Calculadora de Consumo Electrico</legend>
        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        <div class="form">
            <div class="select">
            <label for="devicesName">Equipo</label><br/>
            <select name="devicesName" id="devicesName">
                <?php
                foreach (Devices::$data as $calcDevices) {
                    echo '<option value="' . $calcDevices . '">' . $calcDevices . '</option>';
                }
                ?>
            </select>
            </div>
            <div class="diceNumber">
            <label for="deviceQuantity">Numero de Equipos</label><br/>
            <input type="number" name="deviceQuantity" id="deviceQuantity" min="1" value="1" />
            </div>
            <div class="devicePower">
            <label for="devicePower">Potencia(Watios)</label><br/>
            <input type="number" name="devicePower" id="devicePower" min="1" value="100" />
            </div>
            <div class="deviceHours">
            <label for="deviceHours">Horas de Uso Diario</label><br/>
            <input type="number" name="deviceHours" id="deviceHours" min="0" max="24" value="1" />
            </div>
            <br />
            <input type="submit" value="Enviar/Agregar" name="addMore">

        </div>
        </form>
    </fieldset>

    <?php
    //Inicialización de variables que contendrán los valores del formulario.
    $deviceName = $deviceNumber = $devicePower = $deviceHours = "";

    if (isset($_POST['addMore'])) {

        $deviceName = $_POST['devicesName'];
        $deviceNumber = (int)$_POST['deviceQuantity'];
        $devicePower = (int)$_POST['devicePower'];
        $deviceHours = (int)$_POST['deviceHours'];


        $deviceOne[] = new Devices($deviceName, $deviceNumber, $devicePower, $deviceHours);

        //Fm::setData($deviceOne, "a");
        header("refresh:0");
    }


    if (file_exists(Fm::$file)) {
    ?>
        <br><br>
        <fieldset>
            <legend>Resultados</legend>
            <form method="post" action=<?php $_SERVER['PHP_SELF'] ?>>
                <table>
                    <tr>
                        <th>Equipo</th>
                        <th>Número de Equipos</th>
                        <th>Potencia(Watios)</th>
                        <th>Horas de Uso Diario</th>
                        <th>Consumo Diario (Kw/h)</th>
                        <th>Consumo Mensual (Kw/h)</th>
                    </tr>

                    <?php
                    $line = 0;
                    $dataBase = Fm::getCalc();
                    $sumDaily = $sumMonthly = 0;
                    foreach ($dataBase as $calcs) {
                        echo '<tr>';
                        echo '<td>' . $calcs->getName() . '</td>';
                        echo '<td>' . $calcs->getNumber() . '</td>';
                        echo '<td>' . $calcs->getPower() . '</td>';
                        echo '<td>' . $calcs->getHours() . '</td>';
                        echo '<td>' . $calcs->daily() . '</td>';
                        $sumDaily += $calcs->daily();
                        echo '<td>' . $calcs->monthly() . '</td>';
                        $sumMonthly += $calcs->monthly();
                        echo '<input type="hidden" name="fileNumber" value="' . $line++ . '"/>';
                        echo '<td><input type="submit" name="rmFile" value="Eliminar"/></td>';
                        echo '</tr>';
                    }
                    ?>
                    <tr>
                        <th colspan="4">Total</th>
                        <th><?php echo $sumDaily ?></th>
                        <th><?php echo $sumMonthly ?></th>
                    </tr>
                </table>

                <input type="submit" value="Borrar" name="erase">
            </form>
        </fieldset>
    <?php
        //Llamada a la función que borra el CSV entero.
        if (isset($_POST['erase'])) {
            Fm::emptyCsv();
            echo "<meta http-equiv='refresh' content='0'>";
        }

        //Borrado de lineas del Array dónde se almacena el contenido del CSV.
        //Se comprueba que el array tenga contenido, de esta vacío se borra el CSV.
        //Si tiene contenido, se reescribe el array en el archivo.
        if (isset($_POST['rmFile'])) {
            $remove = Fm::rmDevice($dataBase, $_POST['fileNumber']);
            $ordered = array_values($remove);
            if (empty($ordered)) {
                Fm::emptyCsv();
            } else {
                Fm::setData($ordered, "w");
            }
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }
    ?>


</body>

</html>
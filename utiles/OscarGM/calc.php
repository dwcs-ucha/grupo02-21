<?php
//Autor: Oscar González Martínez
//Proyecto Individdual: Calculo del consumo electrico de una vivienda.
//Fecha de Inicio: 28/11/2021
//Versión: 1.0
//Ultima Modificación: 09/12/2021
//Proyecto basado en: https://es.calcuworld.com/ahorro/calculadora-de-consumo-electrico/

/* 
    Añadidas sesiones. Los calculos se realizarán en función del usuario conectado almacenando en archivos independientes los resultados
    por lo que podrá revisarlos mientras no decida borrarlos.
    Maquetado en CSS: Pendiente del recibir maquetado final en Bootstrap para adaptarlo.    
*/
include_once "Class/Devices.class.php";
include_once "Class/Fm.class.php";
require_once "../../Class/Persona.class.php";
require_once "../../Class/Admin.class.php";
require_once "../../Class/Usuario.class.php";

session_start();
if (isset($_SESSION['userLogged'])){
    $user = $_SESSION['userLogged'];        
} else {
    header("../../Login/signIn.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Calculadora de Consumo Electrico</title>

    <link rel="stylesheet" href="./estilos/style.css">
</head>

<body>
   
        <div id="menu">
            <?php
            require_once "../../menu.php";
            ?>
        </div>
        <div id="global">
        <div id="calculadora">
            <fieldset>
                <legend>Consumos</legend>
                <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                    <div class="form">
                        <div class="select">
                            <label for="devicesName">Tipo de Equipo</label><br />
                            <select name="devicesName" id="devicesName">
                                <?php
                                foreach (Devices::$data as $calcDevices) {
                                    echo '<option value="' . $calcDevices . '">' . $calcDevices . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="diceNumber">
                            <label for="deviceQuantity">Numero de Equipos</label><br />
                            <input type="number" name="deviceQuantity" id="deviceQuantity" min="1" value="1" />
                        </div>
                        <div class="devicePower">
                            <label for="devicePower">Potencia(Watios)</label><br />
                            <input type="number" name="devicePower" id="devicePower" min="1" value="100" />
                        </div>
                        <div class="deviceHours">
                            <label for="deviceHours">Horas de Uso Diario</label><br />
                            <input type="number" name="deviceHours" id="deviceHours" min="0" max="24" value="1" />
                        </div>
                        <br />
                        <div class="btn">
                            <button type="submit" name="addMore">Enviar/Agregar</button>
                        </div>
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

                Fm::setData($deviceOne, "a",$user->getLogin());
                echo "<meta http-equiv='refresh' content='0'>";
            }


            if (Fm::fileStatus($user->getLogin())) {
            ?>
                <br><br>
        </div>
        <div id="resultados">
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
                        $dataBase = Fm::getCalc($user->getLogin());
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
                            echo '<td><button type="submit" name="rmFile">Eliminar</button></td>';
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
                    Fm::emptyCsv($user->getLogin());
                    echo "<meta http-equiv='refresh' content='0'>";
                }

                //Borrado de lineas del Array dónde se almacena el contenido del CSV.
                //Se comprueba que el array tenga contenido, de esta vacío se borra el CSV.
                //Si tiene contenido, se reescribe el array en el archivo.
                if (isset($_POST['rmFile'])) {
                    $remove = Fm::rmDevice($dataBase, $_POST['fileNumber']);
                    $ordered = array_values($remove);
                    if (empty($ordered)) {
                        Fm::emptyCsv($user->getLogin());
                    } else {
                        Fm::setData($ordered, "w",$user->getLogin());
                    }
                    echo "<meta http-equiv='refresh' content='0'>";
                }
            }
        ?>
        </div>

    </div>
</body>

</html>
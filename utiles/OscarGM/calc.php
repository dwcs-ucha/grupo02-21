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
    <style>
        * {
            text-transform: capitalize;
            text-align: center;
        }
        th {
            border: solid 1px black;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend> Calculadora de Consumo Electrico</legend>
        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
            <table>
                <tr>
                    <th>Equipo</th>
                    <th>Nº De Equipos</th>
                    <th>Potencia(Watios)</th>
                    <th>Horas de Uso Diario</th>                    
                </tr>
                <tr>
                    <td>
                        <select name="devicesName" id="devicesName">
                            <?php
                            foreach (Devices::$data as $calcDevices) {
                                echo '<option value="' . $calcDevices. '">' . $calcDevices. '</option>';
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="number" name="deviceQuantity" id="deviceQuantity" min="1"/>
                    </td>
                    <td>
                        <input type="number" name="devicePower" id="devicePower" min="1"/>
                    </td>
                    <td>
                        <input type="number" name="deviceHours" id="deviceHours" min="0" max="24"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Agregar Otro" name="addMore">                        
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>

    <?php
        $deviceName = $deviceNumber = $devicePower = $deviceHours = "";        
        if (isset($_POST['addMore'])){
            
            $deviceName = $_POST['devicesName'];
            $deviceNumber = (int)$_POST['deviceQuantity'];
            $devicePower = (int)$_POST['devicePower'];
            $deviceHours = (int)$_POST['deviceHours'];
            
            
            $deviceOne[] = new Devices($deviceName,$deviceNumber,$devicePower,$deviceHours);                     
           
            Fm::setData($deviceOne);
            header("refresh:0");
        }
    
    
    if (file_exists(Fm::$file)) {
    ?>
    
    
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
                $dataBase = Fm::getCalc();
                $sumDaily = $sumMonthly = 0;
                foreach ($dataBase as $calcs){
                    echo '<tr>';
                    echo '<td>'.$calcs->getName().'</td>';
                    echo '<td>'.$calcs->getNumber().'</td>';
                    echo '<td>'.$calcs->getPower().'</td>';
                    echo '<td>'.$calcs->getHours().'</td>';
                    echo '<td>'.$calcs->daily().'</td>';
                    $sumDaily += $calcs->daily();
                    echo '<td>'.$calcs->monthly().'</td>';
                    $sumMonthly += $calcs->monthly();
                    echo '</tr>';
                }
            ?>
        <tr>
            <th colspan="4">Total</th>
            <th><?php echo $sumDaily ?></th>
            <th><?php echo $sumMonthly ?></th>
        </tr>
    </table>
    <form method="post" action=<?php $_SERVER['PHP_SELF'] ?> >
                <input type="submit" value="Borrar" name="erase">
    </form>
    <?php 
        if (isset($_POST['erase'])){
            fm::emptyCsv();
            header("refresh:0");
        }
    }
    ?>


</body>

</html>
<?php
//Autor: Oscar González Martínez
//Proyecto Individdual: Calculo del consumo electrico de una vivienda.
//Fecha de Inicio: 28/11/2021
//Versión: 1.0
//Proyecto basado en: https://es.calcuworld.com/ahorro/calculadora-de-consumo-electrico/
include_once "Class/Devices.class.php";
include_once "Class/Csv.class.php";
$data = array("nevera","congelador 200 litros (Bajo Consumo)","Cocina electrica (4 Fogones)","Horno Electrico","Horno Electrico","Plancha","Licuadora","Cafetera Eléctrica","Lavadora","Secadora de Ropa","Bombillas exteriores","Bombillas interiores","Bombillas de bajo consumo exteriores","Bombillas de bajo consumo interiores","Televisor de 20 pulgadas","Televisor plasma de 42 Pulgadas","Aire Acondicionado de 12000","Calentador de Agua","Secador de Pelo","Ventilador","Telefono Inalambrico","Reproductor de DVDs","Ordenador de Sobremesa","Ordenador Portátil","Impresora","Router Inalambrico","Otro");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>calculadora de Consumo electrico</title>
    <style>
        * {
            text-transform: capitalize;
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
                    <th>KW/h Dia</th>
                    <th>KW/h Mes</th>
                </tr>
                <tr>
                    <td>
                        <select name="devicesName" id="devicesName">
                            <?php
                            foreach ($data as $calcDevices) {
                                echo '<option value="' . $calcDevices. '">' . $calcDevices. '</option>';
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="number" name="deviceQuantity" id="deviceQuantity" />
                    </td>
                    <td>
                        <input type="number" name="devicePower" id="devicePower"/>
                    </td>
                    <td>
                        <input type="number" name="deviceHours" id="deviceHours">
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Agregar Otro" name="send">
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>

    <?php
        $deviceName = $deviceNumber = $devicePower = $deviceHours = "";        
        if (isset($_POST['send'])){
            
            $deviceName = $_POST['calcDevices'];
            $deviceNumber = (int)$_POST['deviceQuantity'];
            $devicePower = (int)$_POST['devicePower'];
            $deviceHours = (int)$_POST['deviceHours'];
            
            
            $deviceOne = new Devices($deviceName,$deviceNumber,$devicePower,$deviceHours);

            var_dump($deviceOne);
             
            echo $deviceOne->getName() ."<br/>";
            echo $deviceOne->getNumber() . "<br/>";
            echo $deviceOne->getPower() . "<br/>";
            echo $deviceOne->getHours() . "<br/>";
            echo $deviceOne->daily() . "<br/>";
            echo $deviceOne->monthly() . "<br/>";
            
        }
    ?>

</body>

</html>
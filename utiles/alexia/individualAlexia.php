<?php

/**
 *@author Alexia Caride Yáñez
 *@modificado 19/11/2021
 *@version 01
 */
include_once "claseCalcAlexia.php";
?>
<html>

<head>
    <title>O custo real</title>
    <meta charset="utf-8">
    <?php
    include '../../componentes/head.php';
    ?>
</head>

<body>
    <?php
    include '../../componentes/menu.php';
    include '../../componentes/cookieAlert.php';
    ?>
    <div class="fondo">
        <?php
        //Instancio el objeto
        $pizza = new claseCalcAlexia("pizza de polo", 344, 0.4, 99.8, 0.4, 0.1, 79, 0.95, 0.15, 85);
        $fajitas = new claseCalcAlexia("fajitas de polo", 387, 0.8, 99.7, 0.45, 0.1, 77.7, 1.1, 0.15, 86.3);
        $paella = new claseCalcAlexia("paella de polo", 716, 1.28, 99.8, 0.9, 0.2, 79, 2.04, 0.3, 86);
        $pinchos = new claseCalcAlexia("pinchos de polo", 516, 1.12, 99.8, 0.6, 0.1, 79, 1.5, 0.2, 86);
        $estofado = new claseCalcAlexia("estufado de tenreira", 2000, 0.8, 99.9, 7.5, 0.2, 95.7, 42, 2.8, 93.4);
        $albondigas = new claseCalcAlexia("albóndigas", 2880, 1.2, 99.9, 11, 0.4, 96.5, 61, 4, 93.4);
        $bisteq = new claseCalcAlexia("bisteq", 3080, 2, 99.9, 11.7, 0.5, 95.7, 65, 4.2, 93.5);
        $hamburguesa = new claseCalcAlexia("hamburguesa", 1694, 0.7, 99.9, 9, 0.2, 95.7, 35.8, 2.4, 93.2);
        ?>
        <main class="container alto pb-5">
            <div class="col-12 pt-5 pb-1">
                <h1 class="text-primary">Calcula o custo real da túa comida</h1>
            </div>
            <div class="container border border-5 border border-primary border rounded-3 bg-light">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-6 col-lg-6">
                            <form action="individualAlexia.php" method="post" name="costeReal" id="costeReal">
                                <div class="col-12 col-lg-12 px-3 mt-5">
                                    <select name="comida" id="comida" class="form-select input-group-text" style="width: 100%">
                                        <option value="seleccionar">Escolle comida</option>
                                        <option value="pizza">Pizza de polo</option>
                                        <option value="fajitas">Fajitas de polo</option>
                                        <option value="paella">Paella de polo</option>
                                        <option value="pinchos">Pinchos de polo</option>
                                        <option value="estofado">Estufado de tenreira</option>
                                        <option value="albondigas">Albóndigas</option>
                                        <option value="bisteq">Bisteq</option>
                                        <option value="hamburguesa">Hamburguesa</option>
                                    </select><br>
                                </div>
                                <div class="col-12 col-lg-12 px-3 mt-4">
                                    <label for="racion">Indica cantas racións cociñaches</label><br>
                                    <input type="number" min="1" max="10" value="" placeholder="0" name="racion" class="input-group-text" style="width: 100%">
                                </div>
                                <div class="col-12 col-lg-12 px-3 mt-4">
                                    <p>Queres calcular algo máis?
                                    <p>
                                        <input type="checkbox" class="form-check-input" id="mas" name="co2" value="co2">
                                        <label class="form-check-label" for="co2">Gasto de CO2</label><br>
                                        <input type="checkbox" class="form-check-input" id="mas" name="m2" value="m2">
                                        <label class="form-check-label" for="m2">Gasto de superficie</label><br>
                                </div>
                                <div class="col-12 col-lg-12 px-3 mt-4">
                                    <input type="submit" value="Calcular" name="calcular" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                        <div class="col-6 col-lg-6">
                            <?php if (isset($_POST['calcular']) && $_POST['racion'] > 0 && $_POST['comida'] != 'seleccionar') { ?>
                                <img src="imagenes/globo.gif" width="400" class="img-fluid">
                            <?php } ?>
                        </div>
                        <div class="m-3 table-responsive col-12 col-lg-12" style="padding-right: 4%;">
                            <?php
                            //Hago un if que si los campos no vienen  vacios y se le da a calcular entre en un switch que impria por pantalla la comida que se seleccionó pasandole las raciones
                            if (isset($_POST['calcular']) && $_POST['racion'] > 0 && $_POST['comida'] != 'seleccionar') {
                            ?>
                                <table class="table">
                                    <tr class="text-center">
                                        <td></td>
                                        <td><img src="imagenes/carne.png" class="img-fluid" width="100"></td>
                                        <td><img src="imagenes/plant.png" class="img-fluid" width="100"></td>
                                    </tr>
                                    <?php
                                    switch ($_POST['comida']) {
                                        case 'pizza':
                                    ?>
                                            <tr class="text-center mb-2">
                                                <td>Litros</td>
                                                <td><?php echo $pizza->litrosCRacion($_POST['racion']); ?>L</td>
                                                <td><?php echo $pizza->litrosVRacion($_POST['racion']); ?>L</td>
                                            </tr>
                                            <tr class="text-center mb-2">
                                                <td>Duchas</td>
                                                <td><?php echo $pizza->litrosCRacion($_POST['racion']) / 80; ?></td>
                                                <td><?php echo $pizza->litrosVRacion($_POST['racion']) / 80; ?></td>
                                            </tr>
                                            <tr class="text-center mb-2">
                                                <td>Ahorro del</td>
                                                <td colspan="2"><?php echo $pizza->getAhorroA() ?>%</td>
                                            </tr>
                                            <?php
                                            if (isset($_POST['co2'])) { ?>
                                                <tr class="text-center mb-2">
                                                    <td>CO2(kg)</td>
                                                    <td><?php echo $pizza->co2CRacion($_POST['racion']); ?>kg</td>
                                                    <td><?php echo $pizza->co2VRacion($_POST['racion']); ?>kg</td>
                                                </tr>
                                                <tr class="text-center mb-2">
                                                    <td>Ahorro del</td>
                                                    <td colspan="2"><?php echo $pizza->getCo2Ahorro() ?>%</td>
                                                </tr>
                                            <?php }
                                            if (isset($_POST['m2'])) { ?>
                                                <tr class="text-center mb-2">
                                                    <td>Superficie</td>
                                                    <td><?php echo $pizza->m2CRacion($_POST['racion']); ?>m2</td>
                                                    <td><?php echo $pizza->m2VRacion($_POST['racion']); ?>m2</td>
                                                </tr>
                                                <tr class="text-center mb-2">
                                                    <td>Ahorro del</td>
                                                    <td colspan="2"><?php echo $pizza->getMAhorro() ?>%</td>
                                                </tr>
                                            <?php }
                                            break;
                                        case 'fajitas':
                                            ?>
                                            <tr class="text-center mb-2">
                                                <td>Litros</td>
                                                <td><?php echo $fajitas->litrosCRacion($_POST['racion']); ?>L</td>
                                                <td><?php echo $fajitas->litrosVRacion($_POST['racion']); ?>L</td>
                                            </tr>
                                            <tr class="text-center mb-2">
                                                <td>Duchas</td>
                                                <td><?php echo $fajitas->litrosCRacion($_POST['racion']) / 80; ?></td>
                                                <td><?php echo $fajitas->litrosVRacion($_POST['racion']) / 80; ?></td>
                                            </tr>
                                            <tr class="text-center mb-2">
                                                <td>Ahorro del</td>
                                                <td colspan="2"><?php echo $fajitas->getAhorroA() ?>%</td>
                                            </tr>
                                            <?php
                                            if (isset($_POST['co2'])) { ?>
                                                <tr class="text-center mb-2">
                                                    <td>CO2(kg)</td>
                                                    <td><?php echo $fajitas->co2CRacion($_POST['racion']); ?>kg</td>
                                                    <td><?php echo $fajitas->co2VRacion($_POST['racion']); ?>kg</td>
                                                </tr>
                                                <tr class="text-center mb-2">
                                                    <td>Ahorro del</td>
                                                    <td colspan="2"><?php echo $fajitas->getCo2Ahorro() ?>%</td>
                                                </tr>
                                            <?php }
                                            if (isset($_POST['m2'])) { ?>
                                                <tr class="text-center mb-2">
                                                    <td>Superficie</td>
                                                    <td><?php echo $fajitas->m2CRacion($_POST['racion']); ?>m2</td>
                                                    <td><?php echo $fajitas->m2VRacion($_POST['racion']); ?>m2</td>
                                                </tr>
                                                <tr class="text-center mb-2">
                                                    <td>Ahorro del</td>
                                                    <td colspan="2"><?php echo $fajitas->getMAhorro() ?>%</td>
                                                </tr>
                                            <?php }
                                            break;
                                        case 'paella':
                                            ?>
                                            <tr class="text-center mb-2">
                                                <td>Litros</td>
                                                <td><?php echo $paella->litrosCRacion($_POST['racion']); ?>L</td>
                                                <td><?php echo $paella->litrosVRacion($_POST['racion']); ?>L</td>
                                            </tr>
                                            <tr class="text-center mb-2">
                                                <td>Duchas</td>
                                                <td><?php echo $paella->litrosCRacion($_POST['racion']) / 80; ?></td>
                                                <td><?php echo $paella->litrosVRacion($_POST['racion']) / 80; ?></td>
                                            </tr>
                                            <tr class="text-center mb-2">
                                                <td>Ahorro del</td>
                                                <td colspan="2"><?php echo $paella->getAhorroA() ?>%</td>
                                            </tr>
                                            <?php
                                            if (isset($_POST['co2'])) { ?>
                                                <tr class="text-center mb-2">
                                                    <td>CO2(kg)</td>
                                                    <td><?php echo $paella->co2CRacion($_POST['racion']); ?>kg</td>
                                                    <td><?php echo $paella->co2VRacion($_POST['racion']); ?>kg</td>
                                                </tr>
                                                <tr class="text-center mb-2">
                                                    <td>Ahorro del</td>
                                                    <td colspan="2"><?php echo $paella->getCo2Ahorro() ?>%</td>
                                                </tr>
                                            <?php }
                                            if (isset($_POST['m2'])) { ?>
                                                <tr class="text-center mb-2">
                                                    <td>Superficie</td>
                                                    <td><?php echo $paella->m2CRacion($_POST['racion']); ?>m2</td>
                                                    <td><?php echo $paella->m2VRacion($_POST['racion']); ?>m2</td>
                                                </tr>
                                                <tr class="text-center mb-2">
                                                    <td>Ahorro del</td>
                                                    <td colspan="2"><?php echo $paella->getMAhorro() ?>%</td>
                                                </tr>
                                            <?php }
                                            break;
                                        case 'pinchos':
                                            ?>
                                            <tr class="text-center mb-2">
                                                <td>Litros</td>
                                                <td><?php echo $pinchos->litrosCRacion($_POST['racion']); ?>L</td>
                                                <td><?php echo $pinchos->litrosVRacion($_POST['racion']); ?>L</td>
                                            </tr>
                                            <tr class="text-center mb-2">
                                                <td>Duchas</td>
                                                <td><?php echo $pinchos->litrosCRacion($_POST['racion']) / 80; ?></td>
                                                <td><?php echo $pinchos->litrosVRacion($_POST['racion']) / 80; ?></td>
                                            </tr>
                                            <tr class="text-center mb-2">
                                                <td>Ahorro del</td>
                                                <td colspan="2"><?php echo $pinchos->getAhorroA() ?>%</td>
                                            </tr>
                                            <?php
                                            if (isset($_POST['co2'])) { ?>
                                                <tr class="text-center mb-2">
                                                    <td>CO2(kg)</td>
                                                    <td><?php echo $pinchos->co2CRacion($_POST['racion']); ?>kg</td>
                                                    <td><?php echo $pinchos->co2VRacion($_POST['racion']); ?>kg</td>
                                                </tr>
                                                <tr class="text-center mb-2">
                                                    <td>Ahorro del</td>
                                                    <td colspan="2"><?php echo $pinchos->getCo2Ahorro() ?>%</td>
                                                </tr>
                                            <?php }
                                            if (isset($_POST['m2'])) { ?>
                                                <tr class="text-center mb-2">
                                                    <td>Superficie</td>
                                                    <td><?php echo $pinchos->m2CRacion($_POST['racion']); ?>m2</td>
                                                    <td><?php echo $pinchos->m2VRacion($_POST['racion']); ?>m2</td>
                                                </tr>
                                                <tr class="text-center mb-2">
                                                    <td>Ahorro del</td>
                                                    <td colspan="2"><?php echo $pinchos->getMAhorro() ?>%</td>
                                                </tr>
                                            <?php }
                                            break;
                                        case 'estofado':
                                            ?>
                                            <tr class="text-center mb-2">
                                                <td>Litros</td>
                                                <td><?php echo $estofado->litrosCRacion($_POST['racion']); ?>L</td>
                                                <td><?php echo $estofado->litrosVRacion($_POST['racion']); ?>L</td>
                                            </tr>
                                            <tr class="text-center mb-2">
                                                <td>Duchas</td>
                                                <td><?php echo $estofado->litrosCRacion($_POST['racion']) / 80; ?></td>
                                                <td><?php echo $estofado->litrosVRacion($_POST['racion']) / 80; ?></td>
                                            </tr>
                                            <tr class="text-center mb-2">
                                                <td>Ahorro del</td>
                                                <td colspan="2"><?php echo $estofado->getAhorroA() ?>%</td>
                                            </tr>
                                            <?php
                                            if (isset($_POST['co2'])) { ?>
                                                <tr class="text-center mb-2">
                                                    <td>CO2(kg)</td>
                                                    <td><?php echo $estofado->co2CRacion($_POST['racion']); ?>kg</td>
                                                    <td><?php echo $estofado->co2VRacion($_POST['racion']); ?>kg</td>
                                                </tr>
                                                <tr class="text-center mb-2">
                                                    <td>Ahorro del</td>
                                                    <td colspan="2"><?php echo $estofado->getCo2Ahorro() ?>%</td>
                                                </tr>
                                            <?php }
                                            if (isset($_POST['m2'])) { ?>
                                                <tr class="text-center mb-2">
                                                    <td>Superficie</td>
                                                    <td><?php echo $estofado->m2CRacion($_POST['racion']); ?>m2</td>
                                                    <td><?php echo $estofado->m2VRacion($_POST['racion']); ?>m2</td>
                                                </tr>
                                                <tr class="text-center mb-2">
                                                    <td>Ahorro del</td>
                                                    <td colspan="2"><?php echo $estofado->getMAhorro() ?>%</td>
                                                </tr>
                                            <?php }
                                            break;
                                        case 'albondigas':
                                            ?>
                                            <tr class="text-center mb-2">
                                                <td>Litros</td>
                                                <td><?php echo $albondigas->litrosCRacion($_POST['racion']); ?>L</td>
                                                <td><?php echo $albondigas->litrosVRacion($_POST['racion']); ?>L</td>
                                            </tr>
                                            <tr class="text-center mb-2">
                                                <td>Duchas</td>
                                                <td><?php echo $albondigas->litrosCRacion($_POST['racion']) / 80; ?></td>
                                                <td><?php echo $albondigas->litrosVRacion($_POST['racion']) / 80; ?></td>
                                            </tr>
                                            <tr class="text-center mb-2">
                                                <td>Ahorro del</td>
                                                <td colspan="2"><?php echo $albondigas->getAhorroA() ?>%</td>
                                            </tr>
                                            <?php
                                            if (isset($_POST['co2'])) { ?>
                                                <tr class="text-center mb-2">
                                                    <td>CO2(kg)</td>
                                                    <td><?php echo $albondigas->co2CRacion($_POST['racion']); ?>kg</td>
                                                    <td><?php echo $albondigas->co2VRacion($_POST['racion']); ?>kg</td>
                                                </tr>
                                                <tr class="text-center mb-2">
                                                    <td>Ahorro del</td>
                                                    <td colspan="2"><?php echo $albondigas->getCo2Ahorro() ?>%</td>
                                                </tr>
                                            <?php }
                                            if (isset($_POST['m2'])) { ?>
                                                <tr class="text-center mb-2">
                                                    <td>Superficie</td>
                                                    <td><?php echo $albondigas->m2CRacion($_POST['racion']); ?>m2</td>
                                                    <td><?php echo $albondigas->m2VRacion($_POST['racion']); ?>m2</td>
                                                </tr>
                                                <tr class="text-center mb-2">
                                                    <td>Ahorro del</td>
                                                    <td colspan="2"><?php echo $albondigas->getMAhorro() ?>%</td>
                                                </tr>
                                            <?php }
                                            break;
                                        case 'bisteq':
                                            ?>
                                            <tr class="text-center mb-2">
                                                <td>Litros</td>
                                                <td><?php echo $bisteq->litrosCRacion($_POST['racion']); ?>L</td>
                                                <td><?php echo $bisteq->litrosVRacion($_POST['racion']); ?>L</td>
                                            </tr>
                                            <tr class="text-center mb-2">
                                                <td>Duchas</td>
                                                <td><?php echo $bisteq->litrosCRacion($_POST['racion']) / 80; ?></td>
                                                <td><?php echo $bisteq->litrosVRacion($_POST['racion']) / 80; ?></td>
                                            </tr>
                                            <tr class="text-center mb-2">
                                                <td>Ahorro del</td>
                                                <td colspan="2"><?php echo $bisteq->getAhorroA() ?>%</td>
                                            </tr>
                                            <?php
                                            if (isset($_POST['co2'])) { ?>
                                                <tr class="text-center mb-2">
                                                    <td>CO2(kg)</td>
                                                    <td><?php echo $bisteq->co2CRacion($_POST['racion']); ?>kg</td>
                                                    <td><?php echo $bisteq->co2VRacion($_POST['racion']); ?>kg</td>
                                                </tr>
                                                <tr class="text-center mb-2">
                                                    <td>Ahorro del</td>
                                                    <td colspan="2"><?php echo $bisteq->getCo2Ahorro() ?>%</td>
                                                </tr>
                                            <?php }
                                            if (isset($_POST['m2'])) { ?>
                                                <tr class="text-center mb-2">
                                                    <td>Superficie</td>
                                                    <td><?php echo $bisteq->m2CRacion($_POST['racion']); ?>m2</td>
                                                    <td><?php echo $bisteq->m2VRacion($_POST['racion']); ?>m2</td>
                                                </tr>
                                                <tr class="text-center mb-2">
                                                    <td>Ahorro del</td>
                                                    <td colspan="2"><?php echo $bisteq->getMAhorro() ?>%</td>
                                                </tr>
                                            <?php }
                                            break;
                                        case 'hamburguesa':
                                            ?>
                                            <tr class="text-center mb-2">
                                                <td>Litros</td>
                                                <td><?php echo $hamburguesa->litrosCRacion($_POST['racion']); ?>L</td>
                                                <td><?php echo $hamburguesa->litrosVRacion($_POST['racion']); ?>L</td>
                                            </tr>
                                            <tr class="text-center mb-2">
                                                <td>Duchas</td>
                                                <td><?php echo $hamburguesa->litrosCRacion($_POST['racion']) / 80; ?></td>
                                                <td><?php echo $hamburguesa->litrosVRacion($_POST['racion']) / 80; ?></td>
                                            </tr>
                                            <tr class="text-center mb-2">
                                                <td>Ahorro del</td>
                                                <td colspan="2"><?php echo $hamburguesa->getAhorroA() ?>%</td>
                                            </tr>
                                            <?php
                                            if (isset($_POST['co2'])) { ?>
                                                <tr class="text-center mb-2">
                                                    <td>CO2(kg)</td>
                                                    <td><?php echo $hamburguesa->co2CRacion($_POST['racion']); ?>kg</td>
                                                    <td><?php echo $hamburguesa->co2VRacion($_POST['racion']); ?>kg</td>
                                                </tr>
                                                <tr class="text-center mb-2">
                                                    <td>Ahorro del</td>
                                                    <td colspan="2"><?php echo $hamburguesa->getCo2Ahorro() ?>%</td>
                                                </tr>
                                            <?php }
                                            if (isset($_POST['m2'])) { ?>
                                                <tr class="text-center mb-2">
                                                    <td>Superficie</td>
                                                    <td><?php echo $hamburguesa->m2CRacion($_POST['racion']); ?>m2</td>
                                                    <td><?php echo $hamburguesa->m2VRacion($_POST['racion']); ?>m2</td>
                                                </tr>
                                                <tr class="text-center mb-2">
                                                    <td>Ahorro del</td>
                                                    <td colspan="2"><?php echo $hamburguesa->getMAhorro() ?>%</td>
                                                </tr>
                                <?php }
                                            break;
                                    }
                                } elseif (isset($_POST['calcular'])) echo "<p class='text-danger'>Tienes que introducir una comida y una cantidad</p>";
                                ?>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php
        include '../../componentes/footer.php'
        ?>
    </div>

</body>

</html>

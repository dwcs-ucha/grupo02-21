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
        ?>
    <div class="fondo">
        <?php
            //Instancio el objeto
            $pizza = new claseCalcAlexia("pizza de polo",344,0.4,99.8);
            $fajitas = new claseCalcAlexia("fajitas de polo",387,0.8,99.7);
            $paella = new claseCalcAlexia("paella de polo",716,1.28,99.8);
            $pinchos = new claseCalcAlexia("pinchos de polo",516,1.12,99.8);
            $estofado = new claseCalcAlexia("estufado de tenreira",2000,0.8,99.9);
            $albondigas = new claseCalcAlexia("albóndigas",2880,1.2,99.9);
            $bisteq = new claseCalcAlexia("bisteq",3080,2,99.9);
            $hamburguesa = new claseCalcAlexia("hamburguesa",1694,0.7,99.9);
        ?>
        <main class="container alto">
            <div class="col-12 pt-5 pb-1">
                <h1 class="text-primary">Calcula o custo real da túa comida</h1>
            </div>
            <div class="container border border-5 border border-primary border rounded-3 bg-light">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <form action="individualAlexia.php" method="post" name="costeReal" id="costeReal">
                            <div class="col-12 col-lg-12 px-3 mt-3">
                                <select name="comida" id="comida" class="form-select input-group-text">
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
                            <div class="col-12 col-lg-12 px-3 mt-2">
                                <label for="racion">Indica cantas racións cociñaches</label><br>
                                <input type="number" min="1" max="10" value="" placeholder="0" name="racion"
                                    class="input-group-text">
                            </div>
                            <div class="col-12 col-lg-12 px-3 mt-3">
                                <input type="submit" value="Calcular" name="calcular" class="btn btn-primary">
                            </div>
                        </form>
                        <div class="m-3">
                            <?php
                                if(isset($_POST['calcular'])&& $_POST['racion']>0 && $_POST['comida']!='seleccionar'){
                                    switch ($_POST['comida']) {
                                        case 'pizza':
                                            $pizza->resultado($_POST['racion']);
                                            break;
                                        case 'fajitas':
                                            $fajitas->resultado($_POST['racion']);
                                            break;
                                        case 'paella':
                                            $paella->resultado($_POST['racion']);
                                            break;
                                        case 'pinchos':
                                            $pinchos->resultado($_POST['racion']);
                                            break;
                                        case 'estofado':
                                            $estofado->resultado($_POST['racion']);
                                            break;
                                        case 'albondigas':
                                            $albondigas->resultado($_POST['racion']);
                                            break;
                                        case 'bisteq':
                                            $bisteq->resultado($_POST['racion']);
                                            break;
                                        case 'hamburguesa':
                                            $hamburguesa->resultado($_POST['racion']);
                                            break;
                                        }
                                }elseif(isset($_POST['calcular'])) echo "<p class='text-danger'>Tienes que introducir una comida y una cantidad</p>";
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>
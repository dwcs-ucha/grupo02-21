<?php
/*
  Autor: Francisco Javier Muiños López
  Fecha de Última modificación: 16/11/2021
  Versión: 0.9
 */
include_once '../../Class/Erro.class.php';
session_start();
?>
<head>
    <?php include '../../componentes/head.php'; ?>
    <title> Calculadora consumo de auga </title>
</head>

<body>
    <?php include '../../componentes/menu.php'; ?>

    <?php
    $duchaVeces = $duchaMinutos = $dientes = $cisterna = $manos = $cara = $grifo = $lavavajillas = $lavadora = '';
    if (isset($_POST['calcular'])) {
        if (empty($_POST['duchaVeces']) || empty($_POST['duchaMinutos']) || empty($_POST['dientes']) || empty($_POST['cisterna']) || empty($_POST['manos']) || empty($_POST['cara']) || empty($_POST['grifo']) || empty($_POST['lavavajillas']) || empty($_POST['lavadora'])) {
            $Error = "<p style= color:red;> Debes cubrir todos los campos";
        } else {
            require_once('casa.php');

            $duchaVeces = ($_POST['duchaVeces']);
            $duchaMinutos = ($_POST['duchaMinutos']);
            $dientes = ($_POST['dientes']);
            $cisterna = ($_POST['cisterna']);
            $manos = ($_POST['manos']);
            $cara = ($_POST['cara']);
            $grifo = ($_POST['grifo']);
            $lavavajillas = ($_POST['lavavajillas']);
            $lavadora = ($_POST['lavadora']);
            $casa = new CasaAuga($duchaVeces, $duchaMinutos, $dientes, $cisterna, $manos, $cara, $grifo, $lavavajillas, $lavadora);
        }
    }
    ?>
    <div class="fondo">
        <div class="container py-5">
            <form method="post" action='<?php echo $_SERVER['PHP_SELF']; ?>' class="calculadora">
                <fieldset>
                    <legend>
                        <h3 class="text-primary">¿Cantos litros de auga gastas al mes?</h3>
                    </legend>
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <label for="duchaVeces">¿Cantas veces te duchas a semana?:</label>
                                <input type="number" id="duchaVeces" name="duchaVeces" min="0" max="14"> </input>
                            </div>
                        </div>
                        <div class="row mt-4">

                            <div class="col-6">
                                <select id="ducha" name="duchaMinutos">
                                    <optgroup label="Minutos en la ducha">
                                        <option selected value="0"> ¿Cantos minutos tardas en ducharte? </option>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6">
                                ¿Cantas veces te lavas os dentes ao día?: <input type="number" name="dientes" min="0" max="9"> </input>
                            </div>
                            <div class="col-6">
                                ¿Cantas veces tiras da cisterna ao día?: <input type="number" name="cisterna" min="0" max="9"> </input>
                            </div>
                            <div class="col-6">
                                ¿Cantas veces te lavas as mans ao día?: <input type="number" name="manos" min="0" max="9"> </input>
                            </div>
                            <div class="col-6">
                                ¿Cantas veces te lavas a cara ao día?: <input type="number" name="cara" min="0" max="9"> </input>
                            </div>
                        </div> <br> <br>
                        <div class="row">
                            <div class="col-6">
                                ¿Cantas veces lavas os platos con auga do grifo a semana?: <input type="number" name="grifo" min="0" max="9"> </input> <br>
                            </div>
                            <div class="col-6">
                                ¿Cantas veces usas o lavavajillas a semana?: <input type="number" name="lavavajillas" min="0" max="9"> </input>
                                <br>
                            </div>
                            <div class="col-6">
                                ¿Cantas veces usas a lavadora a semana?: <input type="number" name="lavadora" min="0" max="9"> </input> <br>
                            </div>
                        </div>
                        <br><br> <input type="submit" value="Calcular" name="calcular"></input>
                        <br><br>
                        <?php
                        if (isset($casa)) {
                            echo "Tu gasto total de litros ao mes es: " .  $casa->calculo()     . " L";
                        }
                        if (isset($Error)) {
                            echo $Error;
                        }
                        ?>
                        <?php include '../../componentes/error.php'; ?>
                    </div>
                    </p>
                </fieldset>
            </form>
        </div>
    </div>
</body>


<?php
/*
* Author: Ruben Dopico Novo
* Version: 1.0.0
* Last Time Updated: 12/12/2021
*/
?>
<?php 
require('Calc.class.php');
require_once('../../Class/Erro.class.php');
session_start();
function lista() {
    $utils = Calc::getUtils();
    foreach($utils as $key => $util) {
        echo '<option value="'.$key.'">'.$util.'</option>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php 
    include_once '../../componentes/head.php';
    include_once '../../componentes/cookieAlert.php';
    ?>
    <title>Calculadora de Auga</title>
</head>
<body id="fondo">
<?php include_once '../../componentes/menu.php'; ?>
    <div id="fondo">
    <br>
    <main class="container alto">
            <div class="col-12 pt-5 pb-1">
                <h1 class="text-primary">Calcula canto se gastou na fabricación do papel que tes por casa</h1>
            </div>
            <div class="container border border-5 border border-primary border rounded-3 bg-light">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <form action="index.php" method="post">
                            <div class="col-12 col-lg-12 px-3 mt-3">
                                <select name="lista" id="lista" class="form-select input-group-text">
                                    <?php lista()?>
                                </select><br>
                            </div>
                            <div class="col-12 col-lg-12 px-3 mt-2">
                                <label for="paxinas">¿Cantas páxinas/usos ten o teu obxecto?</label><br>
                                <input type="number" min="1"  value="" placeholder="0" name="paxinas"
                                    class="input-group-text">
                            </div>
                            <div class="col-12 col-lg-12 px-3 mt-3">
                                <input type="submit" value="Calcular" name="calcular" class="btn btn-primary">
                            </div>
                        </form>
                        <div class="m-3">
                           <?php
                           if(isset($_POST['calcular'])) {
                            if(isset($_POST['lista'])) {
                                if((isset($_POST['paxinas']) && !empty($_POST['paxinas']))) {
                                    $util = $_POST['lista'];
                                    $pages = $_POST['paxinas'];
                                    $lit = Calc::calcularAuga($util, $pages);
                                    $nameUtil = Calc::getUtil($util);
                                    if(strpos($util, 'Papel') !== false) {
                                        echo 'Gastouse un total de ' . $lit . ' litros de auga para realizar ese ' . $nameUtil . ' con ' . $pages . ' usos';
                                    } else {
                                        echo 'Gastouse un total de ' . $lit . ' litros de auga para realizar ese ' . $nameUtil . ' con ' . $pages . ' páxinas';
                                    }
                                    $lavManos = number_format(Calc::calculoLavManos($lit), 2);
                                    echo '<br>Que é o mesmo que estar ' . $lavManos . ' minutos coa billa aberta mentras te lavas as mans';
                                } else {
                                    Erro::addError('EmptyFieldError', 'Non se atoparon datos no campo páxinas');
                                }
                            } else {
                                Erro::addError('EmptyFieldError', 'Non se atoparon datos seleccionado na lista');
                            }
                           }
                           ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php include_once '../../componentes/error.php'; ?>
        </main>
        
</body>
</html>
<?php
/*
* Cuadro para mostrar los errores
* @author Miguel A García Fustes
* @date 9 de diciembre de 2021
* @version 1.0.0
*/

$display = Erro::countErros() ? ' style="display: block;"' : ' style="display: none;"';

?>

<div id="mensaje-error" class="container mt-5"<?php echo $display; ?>>
    <div class="alert alert-danger" role="alert">
        <?php echo Erro::showErrors(); ?>
    </div>
</div>
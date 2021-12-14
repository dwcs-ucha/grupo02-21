<?php
/* 
 * Vista parcial para solicitar al usuario si quiere guardar los datos en la bbdd
 * 
 * @author Miguel A García Fustes
 * @date 13 de 12 de 2021
 * @version 1.0.0
 */

$estaUrl = '/utiles/miguel/resultados/index.php';
$tareaPostRegistro = '?tarea=login';
$tareaPostLogin = '?tarea=guardar';

// Retorno después de registro
$registro = '/Login/signUP.php?return=' . base64_encode($estaUrl . $tareaPostRegistro);
// Retorno después de login
$login = '/Login/signIn.php?return=' . base64_encode($estaUrl . $tareaPostLogin);

$recienRegistrado = false;
$guardar = false;
if (isset($_GET['tarea'])) {
    $tarea = $_GET['tarea'];
    switch ($tarea) {
        case 'guardar':
            $guardar = true;
            break;

        default:
            $recienRegistrado = true;
            break;
    }
}

if ($guardar) {
    //include '../../../DAO/DAO.class.php';
    include '../../../Class/DatosCalculadoraAvanzada.class.php';

    $user = $_SESSION['user']['login'];
    $user = DAO::getUser($user);
    $resultados = $_SESSION['calculadora_miguel']['resultados'];

    $objDatosCalculadora = new DatosCalculadoraAvanzada($user, $resultados);
    $objDatosCalculadora->guardarDatos();
}
?>

<div class="guardar-datos">
    <div class="alert alert-secondary">
        <h2 class="text-primary">Resultados</h2>
        <?php if ($recienRegistrado) : ?>
            <p><strong>Comprueba tu correo electrónico </strong>, debes haber recibido un enlace para verificar tu registro. Pulsa dicho enlace y luego "Login y guardar"</p>
        <?php else : ?>
            <p>Puedes almacenar los datos para recuperar en otro momento. Para ello deberás ser usuario registrado en nuestro sitio.</p>
            <p>¿Deseas almacenar los datos?</p>
        <?php endif; ?>
        <div class="text-end">
            <?php if ($rol !== 'invitado') : ?>
                <a class="btn btn-success" href="<?php echo $estaUrl . $tareaPostLogin; ?>">Guardar</a>
            <?php else : ?>
                <?php if (!$recienRegistrado) : ?>
                    <a class="btn btn-success" href="<?php echo $registro; ?>">Registro y guardar</a>
                <?php endif; ?>
                <a class="btn btn-success" href="<?php echo $login; ?>">Login y guardar</a>
            <?php endif; ?>
        </div>
    </div>
</div>
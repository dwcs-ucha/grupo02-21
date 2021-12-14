<?php
/* 
 * Calculadora avazada
 * Vista para mostrar los resultados
 * Página principal
 * @author Miguel A García Fustes
 * @date  de  de 2021
 * @version 1.0.0
 */

$consumoTotal = 0;
$i = 0;

// Controlar el usuario
$rol = "invitado";

if (isset($_SESSION['user'])) {
    $rol = $_SESSION['user']['rol'];
    $username = $_SESSION['user']['login'];
}

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <?php include 'resultados-guardar.php'; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>Equipo</th>
                        <th>Consumo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($equipos as $equipo) : ?>

                        <tr>
                            <td class="nombre-equipo">
                                <p><?php echo $equipo['nombre']; ?></p>
                            </td>
                            <td class="consumo-equipo" style="background-color: <?php echo $equipo['color']; ?>">
                                <p><?php echo number_format($equipo['consumo'], 2, ",", "."); ?> kWh.</p>
                            </td>
                            <input type="hidden" id="equipo_<?php echo $i; ?>" data-nombre="<?php echo $equipo['nombre']; ?>" data-color="<?php echo $equipo['color']; ?>" value="<?php echo $equipo['consumo']; ?>" />
                        </tr>
                        <?php $consumoTotal += $equipo['consumo']; ?>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">
                            <div class="fila-consumo-total">
                                <span>Consumo total: </span>
                                <span class="consumo-total-texto"><?php echo number_format($consumoTotal, 2, ",", "."); ?></span>
                                <span class="kwh"> Kwh.</span>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <div class="alert alert-secondary mt-4">
                <p>¿Deseas volver a los datos para alguna modificación?</p>
                <div class="text-end">
                    <a class="btn btn-primary" href="/utiles/miguel/datos/index.php">Volver a datos</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="cuadro-consumo-total mb-5">
                <h2>Consumo total da vivenda</h2>
                <p class="lead"><span class="valor"><?php echo number_format($consumoTotal, 2, ",", "."); ?></span> kWh. por ano.</p>
                <h4>Distribución do consumo por aparello:</h4>
            </div>
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="total-equipos" value="<?php echo count($equipos); ?>">
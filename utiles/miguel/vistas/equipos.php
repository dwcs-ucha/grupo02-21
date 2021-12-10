<?php
/* 
 * Calculadora avazada
 * Vista para pedir los equipos disponibles
 * Página principal
 * @author Miguel A García Fustes
 * @date  de  de 2021
 * @version 1.0.0
 */

$tabs = array(
    array('id' => 'cocina', 'nombre' => 'Cocina'),
    array('id' => 'limpieza', 'nombre' => 'Limpieza'),
    array('id' => 'climatizacion', 'nombre' => 'Climatización'),
    array('id' => 'electronica', 'nombre' => 'Electrónica'),
    array('id' => 'transporte', 'nombre' => 'Transporte'),
    array('id' => 'iluminacion', 'nombre' => 'Iluminación')
);
?>

<section id="equipos" class="container" style="display:none">
    <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
        <?php foreach ($tabs as $index => $tab) : ?>
            <?php $active = $index === 0 ? ' active' : ''; ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link<?php echo $active; ?>" id="<?php echo $tab['id']; ?>-tab" data-bs-toggle="tab" type="button" data-bs-target="#<?php echo $tab['id']; ?>" role="tab" aria-controls="<?php echo $tab['id']; ?>" aria-selected="true"><?php echo $tab['nombre']; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="tab-content mt-5" id="myTabContent">
        <div>
            <p class="fs-5">Define la potencia y el uso de cada equipo</p>
        </div>
        <?php foreach ($tabs as $index => $tab) : ?>
            <?php $active = $index === 0 ? ' show active' : ''; ?>
            <div class="tab-pane fade<?php echo $active; ?>" id="<?php echo $tab['id']; ?>" role="tabpanel" aria-labelledby="<?php echo $tab['id']; ?>-tab">
                <?php include "equipos-{$tab['id']}.php"; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <button class="btn btn-secondary" type="submit">Finalizar</button>
        </div>
    </div>
</section>

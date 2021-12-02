<?php
/* 
 * Calculadora avazada
 * Vista para pedir los equipos disponibles
 * Página principal
 * @author Miguel A García Fustes
 * @date  de  de 2021
 * @version 1.0.0
 */

?>

<div class="container-fluid">
    <div class="row-fluid mt-4">
        <div class="col">Página de equipos</div>
    </div>
    <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="cocina-tab" data-toggle="tab" href="#cocina" role="tab" aria-controls="cocina" aria-selected="true">Cocina</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="limpieza-tab" data-toggle="tab" href="#limpieza" role="tab" aria-controls="limpieza" aria-selected="false">Limpieza</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="climatizacion-tab" data-toggle="tab" href="#climatizacion" role="tab" aria-controls="climatizacion" aria-selected="false">Climatización</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="electronica-tab" data-toggle="tab" href="#electronica" role="tab" aria-controls="electronica" aria-selected="false">Electrónica</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="iluminacion-tab" data-toggle="tab" href="#iluminacion" role="tab" aria-controls="iluminacion" aria-selected="false">Iluminación</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="transporte-tab" data-toggle="tab" href="#transporte" role="tab" aria-controls="transporte" aria-selected="false">Transporte</a>
        </li>
   </ul>
    <div class="tab-content mt-5" id="myTabContent">
        <div class="tab-pane fade show active" id="cocina" role="tabpanel" aria-labelledby="cocina-tab"><?php include './vistas/equipos-cocina.php'; ?></div>
        <div class="tab-pane fade" id="limpieza" role="tabpanel" aria-labelledby="limpieza-tab"><?php include './vistas/equipos-limpieza.php'; ?></div>
        <div class="tab-pane fade" id="climatizacion" role="tabpanel" aria-labelledby="climatizacion-tab"><?php include './vistas/equipos-climatizacion.php'; ?></div>
        <div class="tab-pane fade" id="electronica" role="tabpanel" aria-labelledby="electronica-tab"><?php include './vistas/equipos-electronica.php'; ?></div>
        <div class="tab-pane fade" id="iluminacion" role="tabpanel" aria-labelledby="iluminacion-tab"><?php include './vistas/equipos-iluminacion.php'; ?></div>
        <div class="tab-pane fade" id="transporte" role="tabpanel" aria-labelledby="transporte-tab"><?php include './vistas/equipos-transporte.php'; ?></div>
    </div>

</div>
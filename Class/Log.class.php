<?php

/**
 * Clase Log.class.php
 *
 * @author luisvi
 * @email luisvaziza@gmail.com
 * @fechaDeCreación 30 nov 2021
 * @últimaModificación 11 dic 2021
 * @versión v01.02.00
 */
 class Log {

private string $fecha;
private string $usuario;
private string $texto;

public function __construct($texto, $usuario = "invitado") {
    $fecha = getdate();
    $this->fecha = $fecha['year'] . "." . sprintf("%02d", $fecha['mon']) . "." . sprintf("%02d", $fecha['mday'])
    . "-" . sprintf("%02d", $fecha['hours']) . ":" . sprintf("%02d", $fecha['minutes']) . ":" . sprintf("%02d", $fecha['seconds']);

    $this->usuario = $usuario;
    $this->texto = $texto;
}

public function __toString() {
    return $this->fecha . " - " . strtoupper($this->usuario) . " " . $this->texto;
}
}
?>
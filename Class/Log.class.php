<?php
class Log {

private string $fecha;
private string $error;
private string $usuario;
private string $texto;

public function __construct($texto, $error = "", $usuario = "invitado") {
    $fecha = getdate();
    $this->fecha = $fecha['year'] . "." . sprintf("%02d", $fecha['mon']) . "." . sprintf("%02d", $fecha['mday'])
    . "-" . sprintf("%02d", $fecha['hours']) . ":" . sprintf("%02d", $fecha['minutes']) . ":" . sprintf("%02d", $fecha['seconds']);

    $this->error = $error;
    $this->usuario = $usuario;
    $this->texto = $texto;
}

public function __toString() {
    return $this->fecha . " " . $this->error . " " . $this->usuario . " - " . $this->texto;
}
}
?>
<?php 
class Log {

    private string $fecha;
    private string $error;
    private string $usuario;
    private string $texto;

    public function __construct($error = "", $usuario = "invitado", $texto) {
        $this->fecha = $fecha['year'] . "." . sprintf("%02d", $fecha['mon']) . "." . sprintf("%02d", $fecha['mday'])
        . "-" . sprintf("%02d", $fecha['hours']) . ":" . sprintf("%02d", $fecha['minutes']) . ":" . sprintf("%02d", $fecha['seconds']);

        $this->error = $error;
        $this->usuario = $usuario;
        $this->fecha = $texto;
    }

    public function __toString() {
        return $fecha . " " . $error . " " . $usuario . " - " . $texto;
    }
}
?>
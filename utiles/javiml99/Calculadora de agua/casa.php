<?php

class CasaAuga {

    private $duchaVeces;
    private $duchaMinutos;
    private $dientes;
    private $cisterna;
    private $manos;
    private $cara;
    private $grifo;
    private $lavavajillas;
    private $lavadora;

    public function __construct($duchaVeces, $duchaMinutos, $dientes, $cisterna, $manos, $cara, $grifo, $lavavajillas, $lavadora) {
        $this->duchaVeces = $duchaVeces;
        $this->duchaMinutos = $duchaMinutos;
        $this->dientes = $dientes;
        $this->cisterna = $cisterna;
        $this->manos = $manos;
        $this->cara = $cara;
        $this->grifo = $grifo;
        $this->lavavajillas = $lavavajillas;
        $this->lavadora = $lavadora;
    }

    public function getDuchaVeces() {
        return $this->duchaVeces;
    }

    public function getDuchaMinutos() {
        return $this->duchaMinutos;
    }

    public function getDientes() {
        return $this->dientes;
    }

    public function getCisterna() {
        return $this->cisterna;
    }

    public function getManos() {
        return $this->manos;
    }

    public function getCara() {
        return $this->cara;
    }

    public function getGrifo() {
        return $this->grifo;
    }

    public function getLavavajillas() {
        return $this->lavavajillas;
    }

    public function getLavadora() {
        return $this->lavadora;
    }

    public function setDuchaVeces($duchaVeces): void {
        $this->duchaVeces = $duchaVeces;
    }

    public function setDuchaMinutos($duchaMinutos): void {
        $this->duchaMinutos = $duchaMinutos;
    }

    public function setDientes($dientes): void {
        $this->dientes = $dientes;
    }

    public function setCisterna($cisterna): void {
        $this->cisterna = $cisterna;
    }

    public function setManos($manos): void {
        $this->manos = $manos;
    }

    public function setCara($cara): void {
        $this->cara = $cara;
    }

    public function setGrifo($grifo): void {
        $this->grifo = $grifo;
    }

    public function setLavavajillas($lavavajillas): void {
        $this->lavavajillas = $lavavajillas;
    }

    public function setLavadora($lavadora): void {
        $this->lavadora = $lavadora;
    }

    public function calculo() {
        $gastoDucha = (($this->duchaVeces * $this->duchaMinutos) * 20) * 4;
        $gastoDientes = ($this->dientes * 20) * 30;
        $gastoCisterna = ($this->cisterna * 5) * 30;
        $gastoManos = ($this->manos * 12) * 30;
        $gastoCara = ($this->cara * 8) * 30;
        $gastoGrifo = ($this->grifo * 40) * 4;
        $gastoLavavajillas = ($this->lavavajillas * 54) * 4;
        $gastoLavadora = ($this->lavadora * 50) * 4;
        $gastoTotal = $gastoDucha + $gastoDientes + $gastoCisterna + $gastoManos + $gastoCara + $gastoGrifo + $gastoLavavajillas + $gastoLavadora;   
        return  $gastoTotal;
    }

}

?>

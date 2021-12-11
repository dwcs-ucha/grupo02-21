<?php
/*
* Clase para los equipos tipo 1 y 5 cuyo consumo se calcula
* en función del número de horas de uso semanales
* @author Miguel A García Fustes
* @date 11 de diciembre de 2021
* @version 1.0.0
*/

class EquipoPorHora extends Equipo
{
    protected $horas;
    protected $minutos;

    public function setHoras($horas) {
        $this->horas = floatval($horas);
    }

    public function setMinutos($minutos) {
        $this->minutos = floatval($minutos);
    }

    public function getConsumo()
    {
        // Comprobamos que existen todos los datos necesarios
        // para el cálculo del consumo, de lo contrario salimos
        if (!$this->horas && !$this->minutos || !$this->potencia || !$this->unidades) {
            return false;
        }

        // Horas de consumo semanal
        $horas = 0;
        if ($this->horas) {
            $horas += $this->horas;
        }

        // Pasamos los minutos a horas 
        if ($this->minutos) {
            $horas += $this->minutos / 60;
        }

        // horas de consumo anual
        $horas = $horas * 52;

        // Cálculo de consumo por unidad en kWh
        $consumo = ($this->potencia * $horas) / 1000;

        // Cálculo de consumo para el conjunto de unidades
        $consumoTotal = $consumo * $this->unidades;

        return $consumoTotal;
    }
}
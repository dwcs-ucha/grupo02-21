<?php
/*
* Clase para los equipos tipo 4 cuyo consumo se calcula
* en función del número de km recorridos mensualmente
*
* @author Miguel A García Fustes
* @date 11 de diciembre de 2021
* @version 1.0.0
*/

class EquipoPorKm extends Equipo
{
    protected $km;

    public function setKm($km) {
        $this->km = intval($km);
    }

    public function getConsumo()
    {
        // Comprobamos que existen todos los datos necesarios
        // para el cálculo del consumo, de lo contrario salimos
        if (!$this->km || !$this->potencia || !$this->unidades) {
            return false;
        }

        // km de anuales
        $km = $this->km * 12;

        // Cálculo de consumo por unidad en kWh
        // La potencia que se pasa ya contempla el consumo de kWh/km
        $consumo = ($this->potencia * $km);

        // Cálculo de consumo para el conjunto de unidades
        $consumoTotal = $consumo * $this->unidades;

        return $consumoTotal;
    }
}
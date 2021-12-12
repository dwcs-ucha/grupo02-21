<?php
/*
* Clase para los equipos tipo 3 cuyo consumo se calcula
* en función del número de usos semanales
*
* La potencia solicitada en el contructor ya se contempla que su
* valor equivale al consumo por uso, y no por hora
*
* @author Miguel A García Fustes
* @date 11 de diciembre de 2021
* @version 1.0.0
*/

class EquipoPorUsos extends Equipo
{
    protected $usos;

    public function setUsos($usos) {
        $this->usos = floatval($usos);
    }

    public function getConsumo()
    {
        // Comprobamos que existen todos los datos necesarios
        // para el cálculo del consumo, de lo contrario salimos
        if (!$this->usos || !$this->potencia || !$this->unidades) {
            return false;
        }

        // usos de anuales
        $usos = $this->usos * 52;

        // Cálculo de consumo por unidad en kWh
        // La potencia que se pasa ya contempla el consumo por uso
        $consumo = ($this->potencia * $usos) / 1000;

        // Cálculo de consumo para el conjunto de unidades
        $consumoTotal = $consumo * $this->unidades;

        return $consumoTotal;
    }
}
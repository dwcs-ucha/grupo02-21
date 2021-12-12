<?php
/*
* Clase para los equipos tipo 2 cuyo consumo se calcula
* teniendo en cuenta que su funcionamiento es contínuo
*
* @author Miguel A García Fustes
* @date 11 de diciembre de 2021
* @version 1.0.0
*/

class EquipoUsoContinuo extends Equipo
{
    /**
     * Método que realiza el cálculo del consumo del equipo
     */
    public function getConsumo()
    {
        // Comprobamos que existen todos los datos necesarios
        // para el cálculo del consumo, de lo contrario salimos
        if (!$this->potencia || !$this->unidades) {
            return false;
        }

        // Horas de consumo semanal
        $horas = 168;

        // horas de consumo anual
        $horas = $horas * 52;

        // Cálculo de consumo por unidad en kWh
        $consumo = ($this->potencia * $horas) / 1000;

        // Cálculo de consumo para el conjunto de unidades
        $consumoTotal = $consumo * $this->unidades;

        return $consumoTotal;
    }
}
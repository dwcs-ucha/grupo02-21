<?php
/*
* Clase para agrupar todos los dispositivos de iluminación
* como un solo equipo
*
* @author Miguel A García Fustes
* @date 11 de diciembre de 2021
* @version 1.0.0
*/

class Iluminacion
{
    private EquipoPorHora $equipo;

    public function __construct(EquipoPorHora $equipo)
    {
        $eq = $this->equipo;

        if ($eq) {
            
        }

        $this->equipo = $eq;
    }
}
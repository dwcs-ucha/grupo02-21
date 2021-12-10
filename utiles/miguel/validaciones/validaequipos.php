<?php
/*
* Validaciones del formulario de equipos
* @author Miguel A García Fustes
* @date 10 de diciembre de 2021
* @version 1.0.0
*/

$categorias = $resultados['equipos'];

foreach ($categorias as $categoria => $equipos) {
    $nombreCategoria = $equipos['nombre'];
    foreach ($equipos as $equipo => $valor) {
        if ($equipo == 'nombre') {
            continue;
        }
        // El nombre del campo en iluminación se encuentra en nombre_espacio
        $nombre = $valor['tipo'] == '5' ? $valor['nombre_espacio'] : $valor['nombre'];

        // Validar campos comunes a todos los tipos
        ValidacionEquipos::esNumeroPositivo($valor['unidades'], $nombreCategoria, $nombre);
        ValidacionEquipos::esNumeroPositivo($valor['potencia'], $nombreCategoria, $nombre);

        // Validar campos propios del tipo 1 y 5, ya que a excepción del nombre comparte el resto de variables
        if ($valor['tipo'] == '1' || $valor['tipo'] == '5') {
            ValidacionEquipos::esNumeroPositivo($valor['horas'], $nombreCategoria, $nombre, 168);
            ValidacionEquipos::esNumeroPositivo($valor['min'], $nombreCategoria, $nombre, 59);
        }

        // Validar campos propios del tipo 3 (calculo por numero de usos semanales)
        if ($valor['tipo'] == '3') {
            ValidacionEquipos::esNumeroPositivo($valor['usos_semanales'], $categoria, $nombre);
        }

        // Validar campos propios del tipo 4 (calculo de consumo por km/mes)
        if ($valor['tipo'] == '4') {
            ValidacionEquipos::esNumeroPositivo($valor['km_mes'], $categoria, $nombre);
        }
    }
}

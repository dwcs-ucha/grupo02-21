<?php
/*
* Cálculos de consumos según datos facilitados desde el formulario de datos
* @author Miguel A García Fustes
* @date 11 de diciembre de 2021
* @version 1.0.0
*/

$categorias = $resultados['equipos'];

$consumosPorEquipos = array();
$consumoIluminacion = 0;
$iluminacion = array();
$indice = 0;

foreach ($categorias as $categoria => $equipos) {
    $nombreCategoria = $equipos['nombre'];
    foreach ($equipos as $equipo => $valor) {
        if ($equipo == 'nombre') {
            continue;
        }
        // El nombre del campo en iluminación se encuentra en nombre_espacio
        $nombre = $valor['tipo'] == '5' ? $valor['nombre_espacio'] : $valor['nombre'];

        // Calculo de consumo por equipo
        switch ($valor['tipo']) {
            case '1':
                $eq = new EquipoPorHora($nombre, $valor['potencia'], $valor['unidades'], $nombreCategoria);
                $eq->setHoras($valor['horas']);
                $eq->setMinutos($valor['min']);
                break;
            case '2':
                $eq = new EquipoUsoContinuo($nombre, $valor['potencia'], $valor['unidades'], $nombreCategoria);
                break;
            case '3':
                $eq = new EquipoPorUsos($nombre, $valor['potencia'], $valor['unidades'], $nombreCategoria);
                $eq->setUsos($valor['usos_semanales']);
                break;
            case '4':
                $eq = new EquipoPorKm($nombre, $valor['potencia'], $valor['unidades'], $nombreCategoria);
                $eq->setKm($valor['km_mes']);
                break;
            case '5':
                $eq = new EquipoPorHora($nombre, $valor['potencia'], $valor['unidades'], $nombreCategoria);
                $eq->setHoras($valor['horas']);
                $eq->setMinutos($valor['min']);
                break;
        }

        if ($consumo = $eq->getConsumo()) {
            // Solo si no es iluminación
            if ($valor['tipo'] != '5') {
                $consumosPorEquipos[$indice]['consumo'] = $consumo;
                $consumosPorEquipos[$indice]['categoria'] = $eq->getCategoria();
                $consumosPorEquipos[$indice]['nombre'] = $eq->getNombre();
            } else {
                $consumoIluminacion += $consumo;
            }
            $indice++;
        }
    }

    // Añadir a la lista la iluminación si existe
    if ($consumoIluminacion > 0) {
        $consumosPorEquipos[$indice]['consumo'] = $consumoIluminacion;
        $consumosPorEquipos[$indice]['categoria'] = 'Iluminación';
        $consumosPorEquipos[$indice]['nombre'] = 'Iluminación';
    }
}

$consumos = array_column($consumosPorEquipos, 'consumo');
array_multisort($consumos, SORT_DESC, $consumosPorEquipos);

if (!isset($_SESSION))
{
    session_start();
    session_destroy();
    session_start();
}

$_SESSION['consumos']['por_equipo'] = $consumosPorEquipos;


header('location: /utiles/miguel/resultados/index.php');

exit();
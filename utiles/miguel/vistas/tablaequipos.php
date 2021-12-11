<?php
/*
* Plantilla tabla de equipos
* @author Miguel A García Fustes
* @date 9 de diciembre de 2021
* @version 1.0.0
*/

$hasResultados = isset($resultados['equipos'][$tab]);
$aparatos = array();

if (isset($resultados['equipos'][$tab])) {
    $equipos = $resultados['equipos'][$tab];

    foreach ($datos as $aparato) {
        if (isset($equipos[$aparato['id']])) {
            $equipos[$aparato['id']]['id'] = $aparato['id'];
            $aparatos[] = $equipos[$aparato['id']];
        } else {
            $aparato['unidades'] = 0;
            $aparatos[] = $aparato;
        }
    }
} else {
    foreach ($datos as $aparato) {
        $aparato['unidades'] = 0;
        $aparatos[] = $aparato;
    }
}

?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Unidades</th>
            <th>Aparato</th>
            <th>Potencia / Consumo por unidades</th>
            <th colspan="2">Uso semanal</th>
            <th>Consumo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($aparatos as $aparato) : ?>
            <tr id="<?php echo $aparato['id']; ?>" data-tab="<?php echo $tab; ?>" data-tipo-aparato="<?php echo $aparato['tipo']; ?>">
                <td>
                    <!-- Unidades -->
                    <input 
                        type="number" 
                        class="unidades" 
                        value="<?php echo $aparato['unidades']; ?>" 
                        id="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_unidades" 
                        name="equipos[<?php echo $tab; ?>][<?php echo $aparato['id']; ?>][unidades]" 
                        data-aparato="<?php echo $aparato['id']; ?>" 
                        min="0" 
                        step="1" 
                        onchange="setConsumo(this)" 
                    />
                </td>
                <td>
                    <!-- Nombre del equipo -->
                    <span class="nombre-aparato"><?php echo $aparato['nombre']; ?></span>
                </td>
                <td>
                    <!-- Potencia del equipo -->
                    <input 
                        type="text" 
                        class="potencia" 
                        name="equipos[<?php echo $tab; ?>][<?php echo $aparato['id']; ?>][potencia]" 
                        id="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_potencia" 
                        data-aparato="<?php echo $aparato['id']; ?>" 
                        value="<?php echo $aparato['potencia']; ?>" 
                        onchange="setConsumo(this)" 
                    />
                    <label for="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_potencia"><?php echo $aparato['unidad']; ?></label>
                </td>
                <!-- Tiempos o número de usos del equipo -->
                <?php if ($aparato['tipo'] == "1") : ?>
                    <td>
                        <!-- Equipo cuyo cálculo se consumo se hace en función de horas y minutos de uso semanal -->
                        <input 
                            type="number" 
                            min="0" 
                            max="168"
                            step="1"
                            class="horas"
                            name="equipos[<?php echo $tab; ?>][<?php echo $aparato['id']; ?>][horas]" 
                            id="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_horas"
                            value="<?php echo $aparato['horas']; ?>"
                            data-aparato="<?php echo $aparato['id']; ?>" 
                            onchange="setConsumo(this)" 
                        />

                        <label for="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_horas"> h.</label>
                    <?php else : ?>
                        <!-- Equipo cuyo cálculo de uso se hace en función de número de usos semanal -->
                    <td colspan="2">
                    <?php endif; ?>
                    <?php if ($aparato['tipo'] == "3") : ?>
                        <input 
                            type="number" 
                            min="0" 
                            max="1000" 
                            class="horas" 
                            name="equipos[<?php echo $tab; ?>][<?php echo $aparato['id']; ?>][usos_semanales]" 
                            id="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_usos_semanales"
                            value="<?php echo $aparato['usos_semanales']; ?>" 
                            data-aparato="<?php echo $aparato['id']; ?>" 
                            onchange="setConsumo(this)" 
                            />
                        <label for="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_usos_semanales"> Usos a la semana</label>
                    <?php endif; ?>
                    </td>
                    <?php if ($aparato['tipo'] == "1") : ?>
                        <td>
                            <!-- Minutos de uso semanal -->
                            <input 
                                type="number" 
                                min="0" 
                                max="55" 
                                step="5" 
                                class="minutos" 
                                name="equipos[<?php echo $tab; ?>][<?php echo $aparato['id']; ?>][min]" 
                                id="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_min"
                                value="<?php echo $aparato['min']; ?>"
                                data-aparato="<?php echo $aparato['id']; ?>" 
                                onchange="setConsumo(this)" 
                            />
                            <label for="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_min"> min.</label>
                        </td>
                    <?php endif; ?>
                    <td>
                        <!-- Información con el consumo anual del equipo -->
                        <div id="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_consumo" class="consumo-anual-aparato" style="display: none;">
                            <span id="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_consumo_total_etiqueta"></span>
                            <span> kWh</span><br>
                            <span>anuales</span>
                        </div>
                        <!-- Consumo anual del equipo calculado con Javascript, solo informa al usuario en tiempo real, pero no se pasa al servidor -->
                        <input type="hidden" id="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_consumo_total" name="equipos[<?php echo $tab; ?>][<?php echo $aparato['id']; ?>][consumo_total]" value="<?php echo $aparato['consumo_total']; ?>">
                        <!-- Tipo de equipo, necesario para el cálculo de consumo -->
                        <input type="hidden" name="equipos[<?php echo $tab; ?>][<?php echo $aparato['id']; ?>][tipo]" id="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_tipo" value="<?php echo $aparato['tipo']; ?>">
                        <!-- Nombre del equipo para envío como dato de formulario -->
                        <input type="hidden" name="equipos[<?php echo $tab; ?>][<?php echo $aparato['id']; ?>][nombre]" id="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_nombre" value="<?php echo $aparato['nombre']; ?>">
                        <input type="hidden" name="equipos[<?php echo $tab; ?>][<?php echo $aparato['id']; ?>][unidad]" id="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_unidad" value="<?php echo $aparato['unidad']; ?>">
                    </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <!-- Datos de la categoría -->
            <td colspan="6" class="total-columna-consumo">
                <!-- Información en tiempo real del consumo anual de la categoría -->
                <span>Consumo total <?php echo $tabNombre; ?>:</span>
                <span class="consumo-total-valor" id="total_consumo_<?php echo $tab; ?>"></span>
                <span class="consumo-total-unidad">kWh/año.</span>
                <!-- Campo que recibe el cálculo realizado con javascript, pero no se envía a servidor -->
                <input type="hidden" id="<?php echo $tab; ?>_consumo_total" value="0" />
                <!-- Campo con el nombre de la categoría para su envío al servidor -->
                <input type="hidden" id="<?php echo $tab; ?>_nombre" name="equipos[<?php echo $tab; ?>][nombre]" value="<?php echo $tabNombre; ?>" />
            </td>
        </tr>
    </tfoot>
</table>
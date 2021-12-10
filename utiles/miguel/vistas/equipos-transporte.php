<?php
/* 
 * Calculadora avazada
 * Solicitar al usuario la posible recarga de aparatos de transporte
 * Patinete, coche, bicicleta, etc
 * @author Miguel A García Fustes
 * @date  de  de 2021
 * @version 1.0.0
 */

$tab = 'transporte';
$tabNombre = 'Transporte';
$aparatos = array(
    array("tipo" => "4", "default" => 0.15, "unidadDefault" => "kWh/Km", "id" => "coche", "nombre" => "Coche eléctrico", "km" => 400),
    array("tipo" => "4", "default" => 0.01, "unidadDefault" => "kWh/Km", "id" => "bicicleta", "nombre" => "Bicicleta eléctrica", "km" => 200),
    array("tipo" => "4", "default" => 0.07, "unidadDefault" => "kWh/Km", "id" => "moto", "nombre" => "Moto eléctrica", "km" => 200),
);

?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Unidades</th>
            <th>Aparato</th>
            <th>Potencia / Consumo por unidades</th>
            <th colspan="2">Uso</th>
            <th>Consumo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($aparatos as $aparato) : ?>
            <tr id="<?php echo $aparato['id']; ?>" data-tab="<?php echo $tab; ?>" data-tipo-aparato="<?php echo $aparato['tipo']; ?>">
                <td><input type="number" class="unidades" value="0" id="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_unidades" name="equipos[<?php echo $tab; ?>][<?php echo $aparato['id']; ?>][unidades]" data-aparato="<?php echo $aparato['id']; ?>" min="0" step="1" onchange="setConsumo(this)" /></td>
                <td><span class="nombre-aparato"><?php echo $aparato['nombre']; ?></span></td>
                <td>
                    <input 
                        type="text" 
                        class="potencia" 
                        name="equipos[<?php echo $tab; ?>][<?php echo $aparato['id']; ?>][potencia]" 
                        id="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_potencia" 
                        data-aparato="<?php echo $aparato['id']; ?>" 
                        value="<?php echo $aparato['default']; ?>" 
                        onchange="setConsumo(this)" 
                    />
                    <label for="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_potencia"><?php echo $aparato['unidadDefault']; ?></label>
                </td>
                    <td colspan="2">
                        <input 
                            type="number" 
                            min="0" 
                            max="10000" 
                            class="kilometros" 
                            name="equipos[<?php echo $tab; ?>][<?php echo $aparato['id']; ?>][km_mes]" 
                            id="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_km_mes"
                            value="<?php echo $aparato['km']; ?>" 
                            data-aparato="<?php echo $aparato['id']; ?>" 
                            onchange="setConsumo(this)" 
                            />
                        <label for="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_km_mes"> Kms. al mes</label>
                    </td>
                    <td>
                        <div id="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_consumo" class="consumo-anual-aparato" style="display: none;">
                            <span id="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_consumo_total_etiqueta"></span>
                            <span> kWh</span><br>
                            <span>anuales</span>
                        </div>
                        <input type="hidden" id="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_consumo_total">
                        <input type="hidden" name="equipos[<?php echo $tab; ?>][<?php echo $aparato['id']; ?>][tipo]" id="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_tipo" value="<?php echo $aparato['tipo']; ?>">
                        <input type="hidden" name="equipos[<?php echo $tab; ?>][<?php echo $aparato['id']; ?>][nombre]" id="<?php echo $tab; ?>_<?php echo $aparato['id']; ?>_nombre" value="<?php echo $aparato['nombre']; ?>">
                    </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6" class="total-columna-consumo">
                <span>Consumo total <?php echo $tabNombre; ?>:</span>
                <span class="consumo-total-valor" id="total_consumo_<?php echo $tab; ?>"></span>
                <span class="consumo-total-unidad">kWh/año.</span>
                <input type="hidden" id="<?php echo $tab; ?>_consumo_total" value="0" />
                <input type="hidden" id="<?php echo $tab; ?>_nombre" name="equipos[<?php echo $tab; ?>][nombre]" value="<?php echo $tabNombre; ?>" />
            </td>
        </tr>
    </tfoot>
</table>
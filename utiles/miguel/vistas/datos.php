<?php
/* 
 * Calculadora avanzada
 * Vista petición de datos
 * @author Miguel A García Fustes
 * @date 25 de Noviembre de 2021
 * @version 1.0.0
 */

// Crear un array con los datos si existen y si no con datos vacíos
$campos = array('ciudad' => '', 'superficie' => 60, 'habitacion' => 2, 'habitantes' => 3, 'nenos' => 1);
$datos = isset($resultados['datos']) ? $resultados['datos'] : array();
foreach ($campos as $campo => $valor) {
    $datos[$campo] = isset($datos[$campo]) ? $datos[$campo] : $valor;
}

$disposicion = isset($datos['disposicion']) ? $datos['disposicion'] : '';

?>
<section id="datos" class="container">
    <fieldset>
        <legend>Datos</legend>
        <div class="row">
            <div class="col-12 col-lg-9">
                <!-- input para pedir ciudad -->
                <div class="mb-3 row">
                    <label for="ciudad" class="col-12 col-md-3 col-form-label">Cidade</label>
                    <div class="col-12 col-md-9">
                        <input type="text" class="form-control" name="datos[ciudad]" id="ciudad" value="<?php echo $datos['ciudad']; ?>">
                    </div>
                </div>
                <!-- selector de superficie -->
                <div class="mb-3 row">
                    <label for="superficie" class="col-12 col-md-3 col-form-label">Superficie</label>
                    <div class="col-12 col-md-6">
                        <input type="range" class="form-range" min="35" max="500" onchange="updateTextValue(this.value, 'valorSuperficie');" id="superficie" name="datos[superficie]" value="<?php echo $datos['superficie']; ?>">
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" readonly class="form-control-plaintext d-inline" style="width: 30px;" id="valorSuperficie" value="<?php echo $datos['superficie']; ?>"> <span> m2.</span>
                    </div>
                </div>
                <!-- Solicitar disposición de la vivienda -->
                <!-- opciones - entre medianeras, aislado y otro -->
                <div class="mb-3 row">
                    <label for="disposicion" class="col-12 col-md-3 col-form-label">Disposición da vivenda</label>
                    <div class="col-12 col-md-9">
                        <select class="form-select" aria-label="Selecciona a disposición da vivenda" name="datos[disposicion]" id="disposicion">
                            <option <?php if ($disposicion === '') echo ' selected'; ?>>- Selecciona disposición -</option>
                            <option value="1" <?php if ($disposicion === '1') echo ' selected'; ?>>entre medianeiras</option>
                            <option value="2" <?php if ($disposicion === '2') echo ' selected'; ?>>aillado</option>
                            <option value="3" <?php if ($disposicion === '3') echo ' selected'; ?>>outro</option>
                        </select>
                    </div>
                </div>
                <!-- solicitar número de habitaciones -->
                <div class="mb-3 row">
                    <label for="habitaciones" class="col-12 col-md-3 col-form-label">Número de habitacións</label>
                    <div class="col-12 col-md-6">
                        <input type="range" class="form-range" min="1" max="7" value="<?php echo $datos['habitacion']; ?>" onchange="updateTextValue(this.value, 'valorHabitacion');" id="habitacion" name="datos[habitacion]">
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" readonly class="form-control-plaintext d-inline" style="width: 12px;" id="valorHabitacion" value="<?php echo $datos['habitacion']; ?>"> <span> habitaciones</span>
                    </div>
                </div>

                <!-- solicitar número de habitantes -->
                <div class="mb-3 row">
                    <label for="habitantes" class="col-12 col-md-3 col-form-label">Número de habitantes</label>
                    <div class="col-12 col-md-6">
                        <input type="range" class="form-range" min="1" max="5" value="<?php echo $datos['habitantes']; ?>" onchange="updateTextValue(this.value, 'valorHabitantes');" id="habitantes" name="datos[habitantes]">
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" readonly class="form-control-plaintext d-inline" style="width: 12px;" id="valorHabitantes" value="<?php echo $datos['habitantes']; ?>"> <span> habitantes</span>
                    </div>
                </div>
                <!-- si habitantes > 1, pedir "cuantos niños" -->
                <div class="mb-3 row">
                    <label for="nenos" class="col-12 col-md-3 col-form-label">Número de nenos</label>
                    <div class="col-12 col-md-6">
                        <input type="range" class="form-range" min="1" max="7" value="<?php echo $datos['nenos']; ?>" onchange="updateTextValue(this.value, 'valorNenos');" id="nenos" name="datos[nenos]">
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" readonly class="form-control-plaintext d-inline" style="width: 12px;" id="valorNenos" value="<?php echo $datos['nenos']; ?>"> <span> nenos</span>
                    </div>
                </div>
                <div class="mt-4 pt-5 row">
                    <div class="col-12 text-end">
                        <button class="btn btn-primary" type="button" onclick="muestraEquipos()" aria-label="Mute">
                            Siguiente
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <?php if ($rol !== 'invitado') : ?>
                    <div class="row">
                        <div class="col-12">
                            <a href="/utiles/miguel/datos/index.php?tarea=getDatosAlmacenados" class="btn btn-outline-primary">Recuperar datos almacenados</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </fieldset>
</section>
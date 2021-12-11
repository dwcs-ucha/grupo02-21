<?php
/* 
 * Calculadora avanzada
 * Vista petición de datos
 * @author Miguel A García Fustes
 * @date 25 de Noviembre de 2021
 * @version 1.0.0
 */


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
                        <input type="text" class="form-control" name="datos[ciudad]" id="ciudad">
                    </div>
                </div>
                <!-- selector de superficie -->
                <div class="mb-3 row">
                    <label for="superficie" class="col-12 col-md-3 col-form-label">Superficie</label>
                    <div class="col-12 col-md-6">
                        <input type="range" class="form-range" min="35" max="500" default="60" onchange="updateTextValue(this.value, 'valorSuperficie');" id="superficie" name="datos[superficie]">
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" readonly class="form-control-plaintext d-inline" style="width: 30px;" id="valorSuperficie" value="60"> <span> m2.</span>
                    </div>
                </div>
                <!-- selector de año de construcción -->
                <div class="mb-3 row">
                    <label for="construido" class="col-122 col-md-3 col-form-label">Ano de construcción da vivenda</label>
                    <div class="col-12 col-md-9">
                        <select class="form-select" aria-label="Selecciona o ano de construción da vivenda">
                            <option selected>- Selecciona o ano -</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <!-- Solicitar disposición de la vivienda -->
                <!-- opciones - entre medianeras, aislado y otro -->
                <div class="mb-3 row">
                    <label for="disposicion" class="col-12 col-md-3 col-form-label">Disposición da vivenda</label>
                    <div class="col-12 col-md-3">
                        <select class="form-select" aria-label="Selecciona a disposición da vivenda">
                            <option selected>- Selecciona disposición -</option>
                            <option value="1">entre medianeiras</option>
                            <option value="2">aillado</option>
                            <option value="3">outro</option>
                        </select>
                    </div>
                </div>
                <!-- solicitar número de habitaciones -->
                <div class="mb-3 row">
                    <label for="habitaciones" class="col-12 col-md-3 col-form-label">Número de habitacións</label>
                    <div class="col-12 col-md-6">
                        <input type="range" class="form-range" min="1" max="7" default="2" onchange="updateTextValue(this.value, 'valorHabitacion');" id="habitacion" name="datos[habitacion]">
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" readonly class="form-control-plaintext d-inline" style="width: 12px;" id="valorHabitacion" value="2"> <span> habitaciones</span>
                    </div>
                </div>

                <!-- solicitar número de habitantes -->
                <div class="mb-3 row">
                    <label for="habitantes" class="col-12 col-md-3 col-form-label">Número de habitantes</label>
                    <div class="col-12 col-md-6">
                        <input type="range" class="form-range" min="1" max="5" default="1" onchange="updateTextValue(this.value, 'valorHabitantes');" id="habitantes" name="datos[habitantes]">
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" readonly class="form-control-plaintext d-inline" style="width: 12px;" id="valorHabitantes" value="1"> <span> habitantes</span>
                    </div>
                </div>
                <!-- si habitantes > 1, pedir "cuantos niños" -->
                <div class="mb-3 row">
                    <label for="nenos" class="col-12 col-md-3 col-form-label">Número de nenos</label>
                    <div class="col-12 col-md-6">
                        <input type="range" class="form-range" min="1" max="7" default="2" onchange="updateTextValue(this.value, 'valorNenos');" id="nenos" name="datos[nenos]">
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" readonly class="form-control-plaintext d-inline" style="width: 12px;" id="valorNenos" value=""> <span> nenos</span>
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
            <div class="col-12 col-lg-3"></div>
        </div>
    </fieldset>
</section>
<?php include_once 'equipos.php'; ?>

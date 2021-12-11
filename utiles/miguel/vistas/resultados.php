<?php
/* 
 * Calculadora avazada
 * Vista para mostrar los resultados
 * Página principal
 * @author Miguel A García Fustes
 * @date  de  de 2021
 * @version 1.0.0
 */

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container">
    <div class="row-fluid">
        <div class="col">Página de resultados</div>
    </div>
</div>

<script>
    // Genera un color aleatorio
    const randomNum = () => Math.floor(Math.random() * (235 - 52 + 1) + 52);

    const randomRGB = () => `rgb(${randomNum()}, ${randomNum()}, ${randomNum()})`;

    console.log(randomRGB());
</script>
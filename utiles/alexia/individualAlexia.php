<?php
/**
*@author Alexia Caride Yáñez
*@modificado 19/11/2021
*@version 01
*/
?>
<html>
    <head>
        <title>El coste real</title>
        <meta charset="utf-8">
    </head>
    <body>
        <form action="individualAlexia.php" method="post" name="costeReal" id="costeReal">
            <label for="comida">Selecciona la comida</label>
            <select name="comida" id="comida">
		<option value="seleccionar">Seleccionar comida</option>
		<option value="pizza">Pizza con pollo</option>
                <option value="fajitas">Fajitas de pollo</option>
                <option value="paella">Paella con pollo</option>
                <option value="pinchos">Pinchos de pollo</option>
                <option value="estofado">Estofado de ternera</option>
                <option value="albondigas">Albóndigas</option>
                <option value="bisteq">Bisteq</option>
                <option value="hamburguesa">Hamburguesa</option>
            </select><br>
            <input type="number" min="1" max="10" value="" name="racion">
        </form>
    </body>
</html>

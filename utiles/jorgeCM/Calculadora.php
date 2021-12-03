<?php
/* 
 * Author: Jorge Carreño Miranda
 * Version:1.0.0
 * Last modified: 02/12/2021
 */
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calculadora de eficiencia energética de una vivienda</title>
    </head>
    <body>
        <h1>Calculadora eficiencia energética</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="formulario" id="formulario">
                <p>Certificado energético</p>
                <select name="certificado">
                    <option value="inidividual" <?php if(isset($_POST['enviar']) && ($_POST['certificado']=="inidividual")) echo "selected"; ?>>Vivienda individual</option>
                    <option value="completo" <?php if(isset($_POST['enviar']) && ($_POST['certificado']=="completo")) echo "selected"; ?>>Edificio completo </option>
                </select>&nbsp&nbsp&nbsp&nbsp&nbsp
                No tengo certificado energético    <input type="checkbox" name="noCertificado"><br></br>
                <p>Calefacción</p>
                <pre> kWh/m²                     Tipo</pre>
                <input type="text" value="">
                <select name="calefaccion">
                    <option value="Gas" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Gas")) echo "selected"; ?>>Gas</option>
                    <option value="Electricidad" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Electricidad")) echo "selected"; ?>>Electricidad</option>
                    <option value="Gasoleo" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Gasoleo")) echo "selected"; ?>>Gasóleo</option>
                </select><br></br>
                <p>ACS</p>
                <pre> kWh/m²                     Tipo</pre>
                <input type="text" value="">
                <select name="calefaccion">
                    <option value="Gas" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Gas")) echo "selected"; ?>>Gas</option>
                    <option value="Electricidad" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Electricidad")) echo "selected"; ?>>Electricidad</option>
                    <option value="Gasoleo" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Gasoleo")) echo "selected"; ?>>Gasóleo</option>
                </select><br></br>
                <p>Refrigeración</p>
                <pre> kWh/m²                     Tipo</pre>
                <input type="text" value="">
                <select name="calefaccion">
                    <option value="Electricidad" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Electricidad")) echo "selected"; ?>>Electricidad</option>
                </select><br></br>
                <p>Datos de la vivienda</p>
                <pre>superficie                  Tipo</pre>
                <input type="text" value="">
                <select name="superficie">
                    <option value="unifamiliar" <?php if(isset($_POST['enviar']) && ($_POST['superficie']=="unifamiliar")) echo "selected"; ?>>Unifamiliar</option>
                    <option value="bloque" <?php if(isset($_POST['enviar']) && ($_POST['superficie']=="bloque")) echo "selected"; ?>>Bloque </option>
                </select>
                <pre>Altitud de población       Provincia</pre>
                <input type="text" value="">
                  <select required name="provincia" >
                        <option value="Álava">Álava</option>
                        <option value="Albacete">Albacete</option>
                        <option value="Alicante">Alicante</option>
                        <option value="Almería">Almería</option>
                        <option value="Asturias">Asturias</option>
                        <option value="Ávila">Ávila</option>
                        <option value="Badajoz">Badajoz</option>
                        <option value="Baleares">Baleares</option>
                        <option value="Barcelona">Barcelona</option>
                        <option value="Burgos">Burgos</option>
                        <option value="Cáceres">Cáceres</option>
                        <option value="Cádiz">Cádiz</option>
                        <option value="Cantabria">Cantabria</option>
                        <option value="Castellón">Castellón</option>
                        <option value="Ceuta">Ceuta</option>
                        <option value="Ciudad Real">Ciudad Real</option>
                        <option value="Córdoba">Córdoba</option>
                        <option value="Cuenca">Cuenca</option>
                        <option value="Girona">Girona</option>
                        <option value="Granada">Granada</option>
                        <option value="Guadalajara">Guadalajara</option>
                        <option value="Gipuzkoa">Gipuzkoa</option>
                        <option value="Huelva">Huelva</option>
                        <option value="Huesca">Huesca</option>
                        <option value="Jaén">Jaén</option>
                        <option value="A Coruña">A Coruña</option>
                        <option value="La Rioja">La Rioja</option>
                        <option value="Las Palmas">Las Palmas</option>
                        <option value="León">León</option>
                        <option value="Lleida">Lleida</option>
                        <option value="Lugo">Lugo</option>
                        <option value="Madrid">Madrid</option>
                        <option value="Málaga">Málaga</option>
                        <option value="Melilla">Melilla</option>
                        <option value="Murcia">Murcia</option>
                        <option value="Navarra">Navarra</option>
                        <option value="Ourense">Ourense</option>
                        <option value="Palencia">Palencia</option>
                        <option value="Pontevedra">Pontevedra</option>
                        <option value="Salamanca">Salamanca</option>
                        <option value="Segovia">Segovia</option>
                        <option value="Sevilla">Sevilla</option>
                        <option value="Soria">Soria</option>
                        <option value="Tarragona">Tarragona</option>
                        <option value="Tenerife">Tenerife</option>
                        <option value="Teruel">Teruel</option>
                        <option value="Toledo">Toledo</option>
                        <option value="Valencia">Valencia</option>
                        <option value="Valladolid">Valladolid</option>
                        <option value="Bizkaia">Bizkaia</option>
                        <option value="Zamora">Zamora</option>
                        <option value="Zaragoza">Zaragoza</option>
                  </select><br>
                <pre>Potencia eléctrica PUNTA</pre>
                <select name="certificado" style="width: 310px" >
                    <option>3,45kW</option>
                    <option>4,6kW</option>
                    <option>5,75kW</option>
                    <option>6,9kW</option>
                    <option>8,05kW</option>
                    <option>9,2kW</option>
                    <option>10,35kW</option>
                    <option>11,5kW</option>
                    <option>14,49kW</option>
                </select>
            </form>
    </body>
</html>

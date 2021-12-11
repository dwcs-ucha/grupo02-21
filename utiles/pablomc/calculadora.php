<html>
    <head>
        <meta charset="UTF-8">
        <?php /*Titulo: calculadora.php
            Autor: Pablo Martinez Castro
            Version=1.0.0
            Ultima modificacion: 27/11/2021*/
	?>
        <title>Calculadora consumo Calefacción</title>
	<link rel="stylesheet" href="../../css/custom.css">
	<?php
		include '../../head.php'; 
    	?>
        <!--<link rel="stylesheet" href="./css/archivo.css"/>-->
    </head>
    <body>
        <?php
            include '../../menu.php';
            include('funciones.php');
            include_once('Habitacion.php');
            
            $camposCubiertos = false;
            
            //Validacion de los campos para que todos estén cubiertos
            if(isset($_POST['calcular'])){
                
                //Funciones para validar los campos
                $largo = validaLargoAnchoAlto('largo');
                $ancho = validaLargoAnchoAlto('ancho');
                $alto = validaLargoAnchoAlto('alto');
                $medidas = array($largo,$ancho,$alto);
                
                //Condicion para ver si los campos largo y ancho están cubiertos
                foreach ($medidas as $campo => $valor){
                    if(empty($medidas[$campo])){
                        echo '<div style="text-align:center">El campo está vacío</div>';
                        $camposCubiertos = false;
                    }else{
                        $camposCubiertos = true;
                    }
                }
                
                //Comprobacion para ver si los 'radio' están vacíos o no
                if(!isset($_POST['zona']) || !isset($_POST['aislamiento']) || !isset($_POST['orientacion'])){
			echo '<div style="text-align:center">Todos los campos deben estar cubiertos</div>';
                        $camposCubiertos = false;
                }else{
                    $zona = $_POST['zona'];
                    $orientacion = $_POST['orientacion'];
                    $aislamiento = $_POST['aislamiento'];
                    $camposCubiertos = true;
                }
                
                //echo $camposCubiertos;
                if($camposCubiertos == true){
                    $Habitacion = new Habitacion($largo, $ancho, $alto, $zona, $orientacion, $aislamiento);
                }

            }

            
        ?>
	<div class="fondo">
		<div class="div">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		    <fieldset class="fieldset">
			<legend class="legend">Calculadora consumo calefacción</legend>
			    <img class="img" src="./css/mapa_calor.png" height="500"/>
			    <p>Tamaño de la habitación:</p>
			    Largo(m)<input type="text" name="largo" value="">
			    Alto(m)<input type="text" name="alto" value="">
			    Ancho(m)<input type="text" name="ancho" value=""><br/><br/>
			    <table border=1 class="table">
				<tr class="th">
				    <th rowspan="2"></th>
				    <th colspan="2">Vivienda no Aislada</th>
				    <th colspan="2">Vivienda Aislada</th>
				</tr>
				<tr class="th">
				    <th>Norte</th>
				    <th>Sur</th>
				    <th>Norte</th>
				    <th>Sur</th>
				</tr>
				<tr class="a">
				    <td>Zona A</td>
				    <td>90</td>
				    <td>85</td>
				    <td>80</td>
				    <td>70</td>
				</tr>
				<tr class="b">
				    <td>Zona B</td>
				    <td>95</td>
				    <td>90</td>
				    <td>85</td>
				    <td>75</td>
				</tr>
				<tr class="c">
				    <td>Zona C</td>
				    <td>100</td>
				    <td>95</td>
				    <td>90</td>
				    <td>80</td>
				</tr>
				<tr class="d">
				    <td>Zona D</td>
				    <td>105</td>
				    <td>100</td>
				    <td>95</td>
				    <td>85</td>
				</tr>
				<tr class="e">
				    <td>Zona E</td>
				    <td>110</td>
				    <td>105</td>
				    <td>100</td>
				    <td>90</td>
				</tr>
			    </table>
			    <p>Zona climática:</p>
			    Roja:<input type="radio" name="zona" value="roja">
			    Naranja:<input type="radio" name="zona" value="naranja">
			    Gris claro:<input type="radio" name="zona" value="grisClaro">
			    Gris oscuro:<input type="radio" name="zona" value="grisOscuro">
			    Morada:<input type="radio" name="zona" value="morada"><br/><br/>
			    <p>¿Orientada al Norte?</p>
			    Sí:<input type="radio" name="orientacion" value="norte">
			    No:<input type="radio" name="orientacion" value="sur"><br/><br/>
			    <p>Aislamiento de la habitación:</p>
			    Buen aislamiento:<input type="radio" name="aislamiento" value="aislada">
			    Mal aislamiento:<input type="radio" name="aislamiento" value="noAislada"><br/><br/>
			    <br/><br/><input type="submit" name="calcular" value="Calcular">
			    <?php
			    if(isset($_POST['calcular']) && $camposCubiertos){
			    ?>
			    <center><p class="resultado">El consumo sería de: <?php echo $Habitacion->calcularConsumo(); ?> W</p></center>
			    <?php
			    }
			    ?>
		    </fieldset>
		</form>
		</div>
	    </div>
    </body>
</html>

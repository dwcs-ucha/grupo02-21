<html>
<?php
/*

Autor: Pelayo García-Ciaño Treviño

Version: 1.0.0

Data de modificación: 10/12/2021

*/
?>
	<head>
                <link  rel = " stylesheet " href = " ../../css / custom.css ">
	   	    <?php
		    	include'../../head.php' ;
		    ?>
		<meta charset="utf-8">		
                <title>Calculadora de consumo de un vehículo</title>
		<style>
			.error{
                            color:red;
                        }
			.exito{
                            color:green;
                        }
		</style>
	</head>
	<body>
            <?php
            		include '../../menu.php';
        	?>
		<div class="fondo">
		<form action="calculadora.php" method="post">
			<fieldset>
				<?php
                                        include_once 'calculadora.class.php';
					$mensaje="<p class='error'>Este campo no puede estar vacío</p>";
					$mensajefinal="<p class='exito'>Éxito al calcular</p>";
					$distancia='';
					$consumo='';
                                        $consumo2='';
					$precio='';
                                        $precio2='';
                                        $distancia3='';
					$error_consumo=$error_precio= $error_precio2=$error_distancia= $error_distancia2= $error_distancia3= $error_distancia4= $error_consumo2='';
					$validaciones=false;
					
					if( isset($_POST['enviar']) ) { 
						include 'validaciones.php';				
						
						validaConsumo();
                                                validaConsumo2();
						validaPrecio();
                                                validaPrecio2();
						validaDistancia();
				                validaDistancia2();

						//condicion para ver que si no existe ningun error imprima por pantalla que los datos han sido enviados
						if($error_consumo=="" && $error_consumo2=="" && $error_precio=="" && $error_precio2=="" && $error_distancia==""&& $error_distancia2=="" && $error_distancia3==""&& $error_distancia4=="") {		
							echo $mensajefinal;
                                                        $validaciones=true;
						}										
                                                
                                        }
				?>
                            <legend><h1>Calculadora de gasto energético</h1></legend>
                            Calcula el gasto en gasolina para tu viaje según la distancia, rendimiento de tu vehículo y el precio del combustible en tu país. Utiliza punto como separador decimal.<br>
                                    
                                        <?php echo $error_distancia; ?><br/>
                                        <?php echo $error_distancia2; ?><br/>
                                Distancia:   <?php echo str_repeat ("&nbsp;", 10);   ?>
                                <select name="distancia">
                                    <option value="Kms" selected>Kms</option></select>
                                <input type="text" name="distancia1" value="<?php echo $distancia3 ?>">
				
                                
                                <?php echo $error_consumo; ?><br/>
                                <?php echo $error_consumo2; ?><br/>
                                Consumo:   <?php echo str_repeat ("&nbsp;", 10);   ?>
                                <select name="consumo">
                                    <option value="Km/L" selected>Km/L</option></select>
                                <input type="text" name="consumo1" value="<?php echo $consumo2 ?>">
                                
                                
                                 <?php echo $error_precio; ?><br/>
                                <?php echo $error_precio2; ?><br/>
                                Precio:   <?php echo str_repeat ("&nbsp;", 10);   ?>
                                <select name="precio">
                                    <option value="Litro">Litro</option></select>
                                <input type="text" name="precio1" value="<?php echo $precio2 ?>">
                                
				<p><button type="submit" name='enviar'>Calcular</button></p>
			</fieldset>	
                            <?php
                            if(( isset($_POST['enviar']))&&($validaciones==true)) { 
                                $Vehiculo=new Vehiculos($distancia3, $consumo2, $precio2);
                                $Vehiculo->Resultado();
                            }
                            ?>
		</form>
                    <h1>¿Cómo calculo el consumo de combustible en mi vehículo?</h1>
                    <p>La gran mayoría de automóviles, SUVs y otros vehículos comercializados en el mundo, traen este valor dentro de las especificaciones, ficha técnica o manual de usuario. Sin embargo, hay que tener en cuenta que dichas pruebas de consumo se realizan en condiciones de laboratorio, lo que puede diferir bastante del consumo real del vehículo bajo nuestra forma de conducción.</p>

                       </p>Para calcular el consumo real de nuestro vehículo, nos basta con aplicar paso a paso esta sencilla metodología:</p>

                       <p>1. Llena el estanque de gasolina hasta que el flotador salte y se detenga la manguera.</p>
                      <p>2. Resetea el contador de kms para viaje a 0, o bien, anota el kilometraje total del automóvil en ese momento.
                       <p>3. Ocupa el vehículo como lo harías habitualmente, hasta que recorras al menos 100kms. De esta forma, nos evitamos que formas de conducción puntuales afecten el cálculo final.</p>
                       <p>4. Vuelve a llenar el estanque de gasolina hasta el salto del flotador. Anota el número de litros cargados al momento de rellenar.</p>
                       <p>5. Calcula los kilómetros recorridos desde el paso 2 y divídelos por el número de litros registrado en el paso 4.</p>
                       
                       <h1>Consejos para reducir el consumo de gasolina</h1>
                       <p>Aumentar el rendimiento de nuestro vehículo es una gran ayuda para nuestro bolsillo, más aún cuando el precio de la gasolina es elevado. Para esto, te entregamos algunos tips que puedes aplicar en cualquier tipo de vehículo y que te ayudarán a reducir este gasto.</p>
                       <p>1. Evita aceleraciones bruscas: La instancia que más gasolina consume es cuando apretamos el acelerador. A mayor presión que realicemos en este, mayor será el consumo de combustible.</p>
                       <p>2. En autopistas, conduce a 90 km/hr: En la mayoría de los vehículos, esta velocidad es el óptimo de eficiencia del motor. Esto quiere decir que recorrerás la máxima cantidad de kilómetros por litro que permite tu vehículo.</p>
                       <p>3. Evita viajar con las ventanas abiertas: La mejor aerodinámica del auto se presenta cuando las ventanas están cerradas. Esto hace que la resistencia del vehículo con el aire sea menor, resultando en un menor consumo de combustible.</p>
                <div class="fondo">
	</body>
</html>


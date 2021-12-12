<html>
	<head>

		    <link rel="stylesheet" href="../../css/custom.css">
	   	    <?php
		    	include '../../head.php'; 
		    ?>
  
		<meta charset="utf-8">
		<title>Calculadora del gasto energético anual de un electrodoméstico</title>
		<?php
		/*
		Versión: 1.0.0 
		Última fecha de modificación : 29/11/2021
		Autor: Manuel Rios
		*/
		?>
		<style>
			.error{color:red};
			.final{color:green};
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
                                        include_once 'Calculadora.class.php';
					$mensaje="<p class='error'>Este campo no puede estar vacío</p>";
					$mensajefinal="<p class='final'>Calculado con éxito</p>";
					$vatios='';
					$tiempo='';
					$frecuencia='';
					$euros='';
					$error_tiempo=$error_vatios=$error_vatios2= $error_frecuencia= $error_euros= $error_euros2='';
					$validaciones=false;
					
					if( isset($_POST['submit']) ) { 
						include 'validaciones.php';				
						
						validaVatios();
						validaTiempo();
						validaFrecuencia();
				                validaEuros();

						//condicion para ver que si no existe ningun error imprima por pantalla que los datos han sido enviados, además de introducir los datos en el array e introducir el array en el csv
						if($error_tiempo=="" && $error_vatios=="" && $error_vatios2==""&& $error_frecuencia=="" && $error_euros==""&& $error_euros2=="") {		
							echo $mensajefinal;
                                                        $validaciones=true;
						}											
                                                
                                        }
				?>
				<legend>Calculadora de gasto energético</legend>
				<p> 
					Consumo del dispositivo en vatios <br/>
					<?php echo $error_vatios; ?><br/>
                                        <?php echo $error_vatios2; ?><br/>
					<input type="text" name="vatios" value="<?php echo $vatios ?>" >
				</p>
				<p>
					¿Con qué frecuencia se utiliza el dispositivo normalmente?<br/>
					<?php echo $error_frecuencia; ?><br/>
					<select name="frecuencia">
						<option value ="" selected>(Seleccionar una opción)</option>
                                                <option value="A diario" <?php if($frecuencia == "A diario"){$valorFrecuencia=365; echo "selected";}?>>A diario</option>
						<option value="Cada 2 días" <?php if($frecuencia == "Cada 2 días"){$valorFrecuencia=365/2; echo "selected";}?>>Cada 2 días</option>
                                                <option value="6 veces a la semana" <?php if($frecuencia == "6 veces a la semana"){$valorFrecuencia=6*52.1429; echo "selected" ;}?>>6 veces a la semana</option>
                                                <option value="5 veces a la semana" <?php if($frecuencia == "5 veces a la semana"){$valorFrecuencia=5*52.1429; echo "selected" ;}?>>5 veces a la semana</option>
                                                <option value="4 veces a la semana" <?php if($frecuencia == "4 veces a la semana"){$valorFrecuencia=4*52.1429; echo "selected" ;}?>>4 veces a la semana</option>
                                                <option value="3 veces a la semana" <?php if($frecuencia == "3 veces a la semana"){$valorFrecuencia=3*52.1429; echo "selected" ;}?>>3 veces a la semana</option>
                                                <option value="2 veces a la semana" <?php if($frecuencia == "2 veces a la semana"){$valorFrecuencia=2*52.1429; echo "selected" ;}?>>2 veces a la semana</option>
                                                <option value="Una vez a la semana" <?php if($frecuencia == "Una vez a la semana"){$valorFrecuencia=1*52.1429; echo "selected ";}?>>Una vez a la semana</option>
                                                <option value="Cada dos semanas" <?php if($frecuencia == "Cada dos semanas"){$valorFrecuencia=52.1429/2; echo "selected" ;}?>>Cada dos semanas</option>
                                                <option value="Cada tres semanas" <?php if($frecuencia == "Cada tres semanas"){$valorFrecuencia=52.1429/3; echo "selected" ;}?>>Cada tres semanas</option>
                                                <option value="Cada cuatro semanas" <?php if($frecuencia == "Cada cuatro semanas"){$valorFrecuencia=52.1429/4; echo "selected" ;}?>>Cada                                                                    dos semanas</option>
                                                <option value="3 veces al año" <?php if($frecuencia == "3 veces al año"){$valorFrecuencia=3; echo "selected" ;}?>>3 veces al año</option>
						<option value="2 veces al año" <?php if($frecuencia == "2 veces al año"){$valorFrecuencia=2; echo "selected" ;}?>>2 veces al año</option>
					</select>
				</p>
				<p>
					¿Cuánto utiliza el dispositivo normalmente?<br/>
					<?php echo $error_tiempo; ?><br/>
					<select name="tiempo">
						<option value ="" selected>(Seleccionar una opción) </option>
                                                <option value ="30 minutos" <?php if($tiempo == "30 minutos"){$valorTiempo=0.5; echo "selected ";}?>>30 minutos</option>
						<option value="1 hora" <?php if($tiempo == "1 hora"){$valorTiempo=1; echo "selected"; }?>>1 hora</option>
                                                <option value="2 horas" <?php if($tiempo == "2 horas"){$valorTiempo=2; echo "selected";}?>>2 horas</option>
						<option value="4 horas" <?php if($tiempo == "4 horas"){$valorTiempo=4; echo "selected" ;}?>>4 horas</option>
						<option value="8 horas" <?php if($tiempo == "8 horas"){$valorTiempo=8; echo "selected ";}?>>8 horas</option>
						<option value="10 horas" <?php if($tiempo == "10 horas"){$valorTiempo=10; echo "selected" ;}?>>10 horas</option>
						<option value="12 horas" <?php if($tiempo == "12 horas"){$valorTiempo=12; echo "selected" ;}?>>12 horas</option>
						<option value="16 horas" <?php if($tiempo == "16 horas"){$valorTiempo=16; echo "selected" ;}?>>16 horas</option>
						<option value="18 horas" <?php if($tiempo == "18 horas"){$valorTiempo=18; echo "selected" ;}?>>18 horas</option>
						<option value="20 horas" <?php if($tiempo == "20 horas"){$valorTiempo=20; echo "selected" ;}?>>20 horas</option>
                                                <option value="24 horas" <?php if($tiempo == "24 horas"){$valorTiempo=24; echo "selected" ;}?>>24 horas</option>
					</select>
				</p>
				<p> 
					Coste de la electricidad en € por kilovatio hora <br/>
					<?php echo $error_euros; ?><br/>
                                        <?php echo $error_euros2; ?><br/>
					<input type="text" name="euros" value="<?php echo $euros ?>">
				</p>
				<p><button type="submit" style="background-color:#4CFE24" name='submit'>Calcular</button></p>
			</fieldset>	
                            <?php
                            if(( isset($_POST['submit']))&&($validaciones==true)) { 
                                $Electrodomestico=new Electrodomesticos($vatios, $frecuencia, $valorTiempo, $valorFrecuencia, $tiempo, $euros);
                                $Electrodomestico->Resultado();
                            }
                            ?>
		</form>
                <h1>Uso de medidores de corriente</h1>
                <p>Cuando se trata de ahorrar electricidad, es importante saber qué dispositivo requiere más energía eléctrica. Por lo tanto, debe medir el consumo de energía de cada dispositivo eléctrico con un medidor de corriente. Los más grandes devoradores de energía son la estufa, lavadora, secador de pelo, cafetera, nevera y secadora.</p>

                <h1>Ahorro de energía con electrodomésticos</h1>
                <p>En muchos hogares, numerosos aparatos eléctricos facilitan la vida diaria. Hay que pagar un precio. Hemos preparado una serie de consejos para ayudarle a reducir su consumo de energía. Estos consejos por sí solos pueden ahorrarle hasta un 40% en costos de electricidad.</p>

                <h1>Cuelgue la ropa en lugar de usar una secadora de ropa</h1>
                <p>Especialmente en verano se puede prescindir de la secadora de ropa y colgar la ropa lavada con una correa – en el jardín, en el balcón o simplemente en su apartamento. Esto le permite reducir sus costes de forma rápida y sencilla. Si no desea prescindir de la secadora, asegúrese de que la lavadora esté ajustada a una alta velocidad durante el centrifugado. Así pues, consume un poco más de electricidad. Pero el secador tiene que funcionar menos y necesita mucha menos energía.</p>

                <h1>Desconectar completamente el televisor viejo</h1>
                <p>Un televisor nuevo consume mucha menos electricidad que un televisor antiguo. Esto no significa que usted debe tirar simplemente su TV de trabajo lejos y substituirlo con un nuevo modelo. Sin embargo, compruebe siempre el ajuste de brillo y atorníllelo si es necesario. Debido al consumo en modo de espera, también vale la pena apagar un televisor antiguo.</p>

                <h1>Ajustar el secador de pelo a un nivel bajo</h1>
                <p>Coloca tu secador de pelo a una temperatura baja o media. Efecto secundario agradable: Protege el cabello, que de lo contrario sería atacado por el aire caliente.</p>

                <h1>Descongelar el congelador o congelador</h1>
                <p>No hay manera más fácil de ahorrar dinero: descongele su congelador o el congelador cuando se haya formado una capa de escarcha. Después, el aparato se enfría de forma más eficiente y ahorra electricidad.</p>

                <h1>La tetera es mejor que la estufa</h1>
                <p>Si tiene una estufa más vieja: Caliente el agua de la pasta en la tetera y viértala en la olla. Para preparar los huevos para el desayuno, es mejor usar una olla de huevos. Requiere menos electricidad que una estufa.</p>

                <h1>Reemplazo de bombillas</h1>
                <p>Si todavía tiene bombillas viejas, sustitúyalas por bombillas de ahorro de energía o lámparas LED. Por cierto, tanto las lámparas de ahorro energético como las lámparas LED están disponibles en diferentes colores de luz e intensidades de radiación. Si quieres una luz cálida y acogedora, asegúrate de que el valor del paquete sea inferior a 3.300 Kelvin. Para la luz blanca que corresponde a la luz del sol, el valor debe ser significativamente mayor.</p>

                <h1>No calentar con electricidad o aire acondicionado</h1>
                <p>No use un calefactor de ventilador o aire acondicionado para calentar el apartamento, ya que la calefacción con electricidad es muy cara.</p>

                <h1>Desconectar pequeños calentadores de agua</h1>
                <p>¿Tiene una pequeña caldera de agua caliente debajo del lavabo en el baño? Luego piense en lavarse las manos con agua fría y cepillarse los dientes. Pequeñas calderas y calentadores de agua instantáneos consumen mucha electricidad.</p>

                <h1>No precalentar el horno</h1>
                <p>En el paquete de casi todas las comidas listas para servir, dice que debe precalentar el horno antes de poner la comida. Sin embargo, los fabricantes generalmente recomiendan esto sólo para poder dar un tiempo exacto de preparación. Por regla general, no es necesario precalentar el horno. Esto sólo cuesta electricidad inútil y no hace la comida más deliciosa.</p>

                <h1>Nuevos electrodomésticos? Asegure un bajo consumo de energía!</h1>
                <p>Con un golpe, el consumo de energía se puede reducir enormemente reemplazando un refrigerador, congelador o lavadora antiguos. Los dispositivos nuevos tienen un menor consumo que los antiguos.</p>


	<div class="fondo">
	</body>
</html>

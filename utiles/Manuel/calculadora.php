<?php session_start(); ?>
<html>
	<head>

		    <link rel="stylesheet" href="../../css/custom.css">
	   	    <?php include '../../componentes/head.php'; ?>
  
		<title>Calculadora do gasto enerxético anual dun electrodoméstico</title>
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
		<?php include '../../componentes/menu.php'; ?>
		<?php include_once '../../componentes/cookieAlert.php';?>
		<div class="fondo">
		<div class="container py-5">
		<div class="container border border-5 border border-primary border rounded-3 bg-light ">
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
				<legend class="text-primary">Calculadora do gasto enerxético anual dun electrodoméstico</legend>
				<p> 
					Consumo do dispositivo en vatios
					<?php echo $error_vatios."<br/>"; ?>
                                        <?php echo $error_vatios2."<br/>"; ?>
					<input type="text" name="vatios" value="<?php echo $vatios ?>" >
				</p>
				<p>
					¿Con qué frecuencia utilízase o dispositivo normalmente?<br/>
					<?php echo $error_frecuencia."<br/>"; ?>
					<select name="frecuencia">
						<option value ="" selected>(Seleccionar unha opción)</option>
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
					¿Canto utiliza o dispositivo normalmente?<br/>
					<?php echo $error_tiempo."<br/>"; ?>
					<select name="tiempo">
						<option value ="" selected>(Seleccionar unha opción) </option>
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
					Coste da electricidade en € por kilovatio hora
					<?php echo $error_euros."<br/>"; ?>
                                        <?php echo $error_euros2."<br/>"; ?>
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
		</div>
		<br/>
                <h2 class="text-primary"> Usando medidores de corrente </h1>
                <p> Cando se trata de aforrar electricidade, é importante saber que dispositivo require máis enerxía eléctrica. Polo tanto, cómpre medir o consumo de enerxía de cada dispositivo eléctrico cun medidor de corrente. Os maiores consumidores de enerxía son a cociña, a lavadora, o secador de pelo, a cafeteira, a neveira e a secadora. </p>

                <h2 class="text-primary"> Aforro de enerxía con electrodomésticos </h1>
                <p> En moitas casas, numerosos electrodomésticos facilitan a vida diaria. Hai un prezo que pagar. Preparamos unha serie de consellos para axudarche a reducir o teu consumo de enerxía. Só estes consellos poden aforrarche ata un 40 % nos custos de electricidade. </p>

                <h2 class="text-primary"> Colga a roupa en lugar de usar unha secadora </h1>
                <p> Especialmente no verán pode prescindir da secadora e colgar a roupa lavada nunha correa: no xardín, no balcón ou simplemente no seu apartamento. Isto permítelle reducir os seus custos de forma rápida e sinxela. Se non queres prescindir da secadora, asegúrate de que a lavadora estea a alta velocidade durante o centrifugado. Polo que consome un pouco máis de electricidade. Pero a secadora ten que funcionar menos e necesita moita menos enerxía. </p>

                <h2 class="text-primary"> Desconecta completamente o televisor antigo </h1>
                <p> Un televisor novo usa moita menos electricidade que un televisor vello. Isto non significa que simplemente debas tirar o teu televisor que funciona e substituílo por un modelo novo. Non obstante, comprobe sempre a configuración de brillo e atorníllaa se é necesario. Debido ao consumo en modo de espera, tamén paga a pena apagar un televisor vello. </p>

                <h2 class="text-primary"> Establece o secador de cabelo nunha configuración baixa </h1>
                <p> Establece o secador de cabelo nunha configuración baixa ou media. Efecto secundario agradable: protexe o cabelo, que doutro xeito sería atacado polo aire quente. </p>

                <h2 class="text-primary"> Desconxela o conxelador ou conxelador </h1>
                <p> Non hai xeito máis sinxelo de aforrar diñeiro: desconxela o teu conxelador ou conxelador cando se forma unha capa de xeadas. O aparello arrefría de forma máis eficiente e aforra electricidade. </p>

                <h2 class="text-primary"> A chaleira é mellor que a cociña </h1>
                <p> Se tes unha cociña máis antiga: quenta a auga da pasta na chaleira e bótaa na pota. Para preparar ovos para o almorzo, é mellor usar unha cociña de ovos. Necesita menos electricidade que unha cociña. </p>

                <h2 class="text-primary"> Substitución da lámpada </h1>
                <p> Se aínda tes lámpadas antigas, substitúeas por lámpadas de aforro enerxético ou lámpadas LED. Por certo, tanto as lámpadas de aforro enerxético como as lámpadas LED están dispoñibles en diferentes cores de luz e intensidades de radiación. Se queres unha luz cálida e acolledora, asegúrate de que o valor do paquete sexa inferior a 3.300 Kelvin. Para a luz branca que corresponde á luz solar, o valor debería ser significativamente maior. </p>

                <h2 class="text-primary"> Non quentar con electricidade ou aire acondicionado </h1>
                <p> Non uses un ventilador ou aire acondicionado para quentar o apartamento, xa que a calefacción con electricidade é moi cara. </p>

                <h2 class="text-primary"> Desconecta os pequenos quentadores de auga </h1>
                <p> Tes unha pequena caldeira de auga quente debaixo do lavabo do baño? Despois pensa en lavar as mans con auga fría e lavar os dentes. As pequenas caldeiras e os quentadores de auga instantáneos consomen moita electricidade. </p>

                <h2 class="text-primary"> Non prequentar o forno </h1>
                <p> No paquete de case todas as comidas listas para servir, di que prequentar o forno antes de meter a comida. Non obstante, os fabricantes xeralmente recomendan isto só para dar un tempo de preparación preciso. Como regra xeral, non é necesario prequentar o forno. Isto só custa electricidade inútil e non fai que a comida sexa máis deliciosa. </p>

                <h2 class="text-primary"> Electrodomésticos novos? Asegura un baixo consumo de enerxía! </h1>
                <p> Cun só golpe, pódese reducir moito o consumo de enerxía substituíndo unha neveira, conxelador ou lavadora antigas. Os novos dispositivos teñen un menor consumo que os antigos. </p>
	</div>

	</div>
	</body>
</html>

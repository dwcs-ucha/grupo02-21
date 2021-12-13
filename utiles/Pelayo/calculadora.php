<?php 
session_start(); 
?>
<html>
<?php
/*

Autor: Pelayo García-Ciaño Treviño

Version: 1.0.0

Data de modificación: 10/12/2021

*/
?>
	<head>
                <link rel="stylesheet" href="../../css/custom.css">
	   	<?php include '../../componentes/head.php'; ?>		
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
           	<?php include '../../componentes/menu.php'; ?>
		<?php include_once '../../componentes/cookieAlert.php';?>
		<div class="fondo">
		<div class="container py-5">
		<div class="container border border-5 border border-primary border rounded-3 bg-light ">
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
                            <legend><h1>Calculadora do gasto nun viaxe</h1></legend>
                            Calcula o custo da gasolina para a túa viaxe segundo a distancia, o rendemento do teu vehículo e o prezo do combustible no teu país. Use o punto como separador decimal.<br>
                                    
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
                                Prezo:   <?php echo str_repeat ("&nbsp;", 10);   ?>
                                <select name="precio">
                                    <option value="Litro">Litro</option></select>
                                <input type="text" name="precio1" value="<?php echo $precio2 ?>">
                                
				<p><button type="submit" class="btn btn-primary" name='enviar'>Calcular</button></p>
			</fieldset>	
                            <?php
                            if(( isset($_POST['enviar']))&&($validaciones==true)) { 
                                $Vehiculo=new Vehiculos($distancia3, $consumo2, $precio2);
                                $Vehiculo->Resultado();
                            }
                            ?>
		</form>
		</div>
                    <h1 class="text-primary"> Como calculo o consumo de combustible do meu vehículo? </h1>
                    <p> A gran maioría dos coches, todoterreos e outros vehículos que se venden no mundo, achegan este valor ás especificacións, ficha técnica ou manual de usuario. Non obstante, hai que ter en conta que estas probas de consumo realízanse en condicións de laboratorio, que poden diferir considerablemente do consumo real do vehículo na nosa forma de conducir.</p>

                       </p> Para calcular o consumo real do noso vehículo só temos que aplicar paso a paso esta sinxela metodoloxía: </p>

                       <p> 1. Enche o depósito con gasolina ata que o flotador salga e a mangueira pare. </p>
                      <p> 2. Restablece o contador de quilómetros de viaxe a 0 ou anota a quilometraxe total do coche nese momento.
                       <p> 3. Ocupa o vehículo como o farías normalmente, ata percorrer polo menos 100 quilómetros. Deste xeito, evitamos que determinadas formas de condución afecten ao cálculo final.</p>
                       <p> 4. Enche o depósito con gasolina ata que salte o flotador. Anota o número de litros cargados no momento de encher. </p>
                       <p> 5. Calcula os quilómetros percorridos desde o paso 2 e divídeo polo número de litros rexistrados no paso 4. </p>


                       
                       <h1 class="text-primary"> Consellos para reducir o consumo da gasolina </h1>
                       <p> Aumentar o rendemento do noso vehículo é unha gran axuda para o noso peto, especialmente cando o prezo da gasolina é alto. Para iso, dámosche algúns consellos que podes aplicar en calquera tipo de vehículo e que che axudarán a reducir este gasto.</p>
                       <p> 1. Evita aceleracións bruscas: a instancia que máis gasolina consume é cando presionamos o acelerador. Canto maior sexa a presión que realicemos neste, maior será o consumo de combustible. </p>
                       <p> 2. En autoestradas, conduza a 90 km/h: na maioría dos vehículos, esta velocidade é a óptima para a eficiencia do motor. Isto significa que percorrerá o número máximo de quilómetros por litro que lle permita o seu vehículo. </p>
                       <p> 3. Evita viaxar coas fiestras abertas: a mellor aerodinámica do coche chega cando as fiestras están pechadas. Isto reduce a resistencia do vehículo co aire, o que supón un menor consumo de combustible. </p>
		</div>
	       </div>
	     <?php
	      include '../../componentes/footer.php'
	     ?>
	</body>
</html>


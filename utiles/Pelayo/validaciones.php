<?php
/*

Autor: Pelayo García-Ciaño Treviño

Version: 1.0.0

Data de modificación: 10/12/2021

*/
?>
<style>
    .error{
       color:red;
    }
    .exito{
    color:green;
    }
</style>
<?php

function validaConsumo(){
		global $mensaje;
		global $error_consumo;
		global $consumo;
		$consumo = $_POST['consumo'];
		if ($consumo == ""){ 
			$error_consumo = $mensaje;
		}
	}
        
function validaConsumo2(){
		global $mensaje;
		global $error_consumo2;
		global $consumo2;
		$consumo2 = $_POST['consumo1'];
		if ($consumo2 == ""){ 
			$error_consumo2 = $mensaje;
		}
	}        
        

function validaPrecio(){
		global $mensaje;
		global $error_precio;
		global $precio;
		$precio = $_POST['precio'];
		if ($precio == ""){ 
			$error_precio = $mensaje;
		}
	}

function validaPrecio2(){
		global $mensaje;
		global $error_precio2;
		global $precio2;
		$precio2 = $_POST['precio1'];
		if ($precio2 == ""){ 
			$error_precio2= $mensaje;
		}
	}            
  
function validaDistancia(){
		global $mensaje;
		global $error_distancia;
		global $distancia;
		$distancia = $_POST['distancia'];
		if ($distancia == ""){ 
			$error_distancia= $mensaje;
		}
	}            
        


function validaDistancia2(){
		global $mensaje;
		global $error_distancia3;
                global $error_distancia4;
		global $distancia3;
		if (empty($_POST['distancia1']) && isset($_POST['enviar'])){ 
			$error_distancia3 = $mensaje;
		}
		else{
			if (preg_match("/(^[0-9]{1,7}$|^[0-9]{1,7}\.[0-9]{1,7}$)/", $_POST['distancia1'])) {
                                    $distancia3 = $_POST['distancia1']; 
                            }
                            else{
                                    $error_distancia4 = "<p class='error'Debes introducir un número entero de maximo 3 digitos o decimal separado por un '.' </p><br/>";
                            }
		}
	}        
        
?>

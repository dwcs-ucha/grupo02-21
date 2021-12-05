<?php
		/*
		Versión: 1.0.0 
		Última fecha de modificación : 29/11/2021
		Autor: Manuel Rios
		*/
		?>
<?php
	function validaTiempo(){
		global $mensaje;
		global $error_tiempo;
		global $tiempo;
		$tiempo = $_POST['tiempo'];
		if ($tiempo == ""){ 
			$error_tiempo = $mensaje;
		}
	}
	function validaFrecuencia(){
		global $mensaje;
		global $error_frecuencia;
		global $frecuencia;
		$frecuencia = $_POST['frecuencia'];
		if ($frecuencia == ""){ 
			$error_frecuencia = $mensaje;
		}
	}

	function validaVatios(){
		global $mensaje;
		global $error_vatios;
                global $error_vatios2;
		global $vatios;
		if (empty($_POST['vatios']) && isset($_POST['submit'])){ 
			$error_vatios = $mensaje;
		}
		else{
                    if (preg_match("/^[[:digit:]]+$/", $_POST['vatios'])) {
                        $vatios = $_POST['vatios']; 
                    }
                    else{
                        $error_vatios2 = "Debes introducir un número entero <br/>";
                    }
		}
	}
	function validaEuros(){
		global $mensaje;
		global $error_euros;
                global $error_euros2;
		global $euros;
		if (empty($_POST['euros']) && isset($_POST['submit'])){ 
			$error_euros = $mensaje;
		}
		else{
			if (preg_match("/(^[0-9]{1,3}$|^[0-9]{1,3}\.[0-9]{1,3}$)/", $_POST['euros'])) {
                                    $euros = $_POST['euros']; 
                            }
                            else{
                                    $error_euros2 = "Debes introducir un número entero de maximo 3 digitos o decimal separado por un '.' <br/>";
                            }
		}
	}
?>

<html>
	<head>
	<meta charset="UTF-8"/>
	<?php /*Titulo: funciones.php
		Autor: Pablo Martinez Castro
		Version=1.0.0
		Ultima modificacion: 27/11/2021*/
	?>
	</head>
	<body>
            <?php
        	function validaLargoAnchoAlto($metros){
                    //Validacion de los campos largo y ancho
                    if(isset($_POST[$metros])){
			if(!preg_match('/^\d{1,4}(\.\d{1})?$/', $_POST[$metros])){
                            echo "<div style='text-align:center'>Introduzca un numero</div>";
                            $_POST[$metros] = "";
			}else{
                            return $_POST[$metros];
			}
                    }
                }
            ?>
        </body>
</html>
<?php
/*
  Autor: Francisco Javier Muiños López
  Fecha de Última modificación: 16/11/2021
  Versión: 0.9
 */
session_start();
?>
<html>
    <head>       
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">       
        <meta charset="utf-8">
        <title> Calculadora consumo de agua </title>
    </head>
    <body>   
        <?php       
        $duchaVeces = $duchaMinutos = $dientes = $cisterna = $manos = $cara = $grifo = $lavavajillas = $lavadora = '';
        if (isset($_POST['calcular'])) { 
            if (empty($_POST['duchaVeces']) || empty($_POST['duchaMinutos']) || empty($_POST['dientes']) || empty($_POST['cisterna']) || empty($_POST['manos']) || empty($_POST['cara']) || empty($_POST['grifo']) || empty($_POST['lavavajillas']) || empty($_POST['lavadora'])) {
                $Error = "<p style= color:red;> Debes cubrir todos los campos";
            } else {
                require_once('casa.php');
                                               
                $duchaVeces = ($_POST['duchaVeces']);
                $duchaMinutos = ($_POST['duchaMinutos']);
                $dientes = ($_POST['dientes']);
                $cisterna = ($_POST['cisterna']);
                $manos = ($_POST['manos']);
                $cara = ($_POST['cara']);
                $grifo = ($_POST['grifo']);
                $lavavajillas = ($_POST['lavavajillas']);
                $lavadora = ($_POST['lavadora']);
                $casa = new CasaAuga($duchaVeces, $duchaMinutos, $dientes, $cisterna, $manos, $cara, $grifo, $lavavajillas, $lavadora);
                           
            }
        }
        ?>
        <form method="post" action='<?php echo $_SERVER['PHP_SELF']; ?>' class="calculadora">
            <fieldset>
                <legend>
                    <font color="#6042B9">¿Cuantos litros de agua gastas al mes?</font>
                </legend>

                <br>	
                <div class="container">
                    <div class="row align-items-start">
                        <div class="col">
                            ¿Cuantas veces te duchas a la semana?: <input type="number" name="duchaVeces" min="0" max="14" > </input> &nbsp; &nbsp; &nbsp; &nbsp; 
                            <select id="ducha" name="duchaMinutos">
                                <optgroup label="Minutos en la ducha">
                                    <option selected value="0"> ¿Cuantos minutos tardas en ducharte? </option>                                                                                                                                   
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                </optgroup> 
                            </select>           
                        </div>
                    </div> <br><br>
                    <div class="row align-items-center">
                        <div class="col">
                            ¿Cuantas veces te lavas los dientes al día?: <input type="number" name="dientes" min="0" max="9" > </input>  
                        </div>
                        <div class="col">
                            ¿Cuantas veces tiras de la cisterna al día?: <input type="number" name="cisterna" min="0" max="9" > </input>  
                        </div>  
                        <div class="col">
                            ¿Cuantas veces te lavas las manos al día?: <input type="number" name="manos" min="0" max="9" > </input>  
                        </div>
                        <div class="col">
                            ¿Cuantas veces te lavas la cara al día?: <input type="number" name="cara" min="0" max="9" > </input>  
                        </div> 
                    </div> <br> <br>
                    <div class="row align-items-end">
                        <div class="col">
                            ¿Cuantas veces lavas los platos con agua del grifo a la semana?: <input type="number" name="grifo" min="0" max="4" > </input> <br> 
                        </div>
                        <div class="col">
                            ¿Cuantas veces usas el lavavajillas a la semana?: <input type="number" name="lavavajillas" min="0" max="9" > </input>  
                            <br>
                        </div> 
                        <div class="col">
                            ¿Cuantas veces usas la lavadora a la semana?: <input type="number" name="lavadora" min="0" max="9" > </input>  <br>
                        </div>
                    </div>                                                            
                    <br><br>  <input type="submit" value="Calcular" name="calcular"></input>  
                    <br><br>
                    <?php
                    
                        echo "Tu gasto total de litros al mes es: " .  $casa ->calculo()     . " L";
                    
                    if (isset($Error)) {
                        echo $Error;
                    }
                    ?>
                </div>
                </p>                            
            </fieldset>                                                                                
        </form>
    </body>
</html>
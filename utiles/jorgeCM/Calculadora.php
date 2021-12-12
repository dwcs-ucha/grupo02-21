<?php
/* 
 * Author: Jorge Carreño Miranda
 * Version:1.0.0
 * Last modified: 08/12/2021
 */
session_start();
include_once './Class/classCalculadora.php';
 include '../../componentes/head.php'; 

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Eficiencia energética</title>
        <link rel="stylesheet" href="../../css/custom.css"/>
    </head>
    <body>
        <?php include '../../componentes/menu.php'; ?>
<div class="fondo">
        <div class="container pt-5">
            <h1 class="text-primary">Calculadora eficiencia energética</h1>
       
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="formulario" id="formulario">
                <fieldset class="fieldset">

                     <div class="tamaño">
                <p>Calefacción</p>
                <pre> kWh/m²                         Tipo</pre>
                <input class="txt" type="number" name="calefaccion" value="">
                <select name="tipoCalc">
                    <option value="Gas" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Gas")) echo "selected"; ?>>Gas</option>
                    <option value="Electricidad" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Electricidad")) echo "selected"; ?>>Electricidad</option>
                    <option value="Gasoleo" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Gasoleo")) echo "selected"; ?>>Gasóleo</option>
                </select><br></br>
                <p>ACS</p>
                <pre> kWh/m²                         Tipo</pre>
                <input class="txt" type="number" name='ACS' value="">
                <select name="tipoACS">
                    <option value="Gas" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Gas")) echo "selected"; ?>>Gas</option>
                    <option value="Electricidad" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Electricidad")) echo "selected"; ?>>Electricidad</option>
                    <option value="Gasoleo" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Gasoleo")) echo "selected"; ?>>Gasóleo</option>
                </select><br></br>
                <p>Refrigeración</p>
                <pre> kWh/m²                         Tipo</pre>
                <input class="txt" type="number" name="refrigeracion" value="">
                <select name="tipoRef">
                    <option value="Electricidad" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Electricidad")) echo "selected"; ?>>Electricidad</option>
                </select><br></br>
                <p>Datos de la vivienda</p>
                <pre>superficie                      Tipo</pre>
                <input class="txt" type="number" name="superficie" value="">
                <select name="tipoSuperf">
                    <option value="Unifamiliar" <?php if(isset($_POST['enviar']) && ($_POST['superficie']=="unifamiliar")) echo "selected"; ?>>Unifamiliar</option>
                    <option value="Bloque" <?php if(isset($_POST['enviar']) && ($_POST['superficie']=="bloque")) echo "selected"; ?>>Bloque </option>
                </select><br></br>
                <p class="PE">Provincia</p>
                <select class="prov" required name="provincia" >
                        <?php
                        foreach (Vivienda:: $provincias as $nombre){
                            echo '<option value="'.$nombre.'">'.$nombre.'</option>';
                        }
                        ?>
                  </select><br>
                <p class="PE">Potencia eléctrica PUNTA</p>
                <select class="prov" name="potencia" >
                    <?php
                        foreach (Vivienda:: $potencia as $valor){
                            echo '<option value="'.$valor.'">'.$valor.'KW</option>';
                        }
                        ?>
                </select><br></br>
                </div>
                <input class="calc" type="submit" name="calcular" value="calcular"><br></br>
                
                
                
        <?php
        
        if(isset($_POST['calcular'])){
           echo '<div class="resultado">';
            $calefaccion=(int)$_POST['calefaccion'];
            $ACS=(int)$_POST['ACS'];
            $refrigeracion=(int)$_POST['refrigeracion'];
            $superficie=(int)$_POST['superficie'];
            $potenciaPunta=(float)$_POST['potencia'];
            $provincia=$_POST['provincia'];
            $tipoCalc=$_POST['tipoCalc'];
            $tipoACS=$_POST['tipoACS'];
            $tipoRef=$_POST['tipoRef'];
            $tipoSuperf=$_POST['tipoSuperf'];
            //Creación del objeto
            $Vivienda=new vivienda($calefaccion, $ACS, $refrigeracion, $superficie,$potenciaPunta);
            //metodos del objeto
            $Vivienda->obtenerSuperficie($tipoSuperf);
            $zona=$Vivienda->obtenerZona($provincia);
            $consumoCalc=$Vivienda->calculaCalefaccion($tipoCalc,$Vivienda->getPotenciaPunta(),$zona);
            $consumoACS=$Vivienda->calculaACS($tipoACS,$Vivienda->getPotenciaPunta(),$zona);
            $consumoRefrig=$Vivienda->calculaRefrigeracion($tipoRef,$Vivienda->getPotenciaPunta(),$zona);
            echo '<div align:right>';
            echo '<div class="rounded float-end"><img src="imagen/eficiencia-energetica.png" alt="imagen eficiencia energética"/></div>';
            $Vivienda->consumoTotal($consumoCalc,$consumoACS,$consumoRefrig);
            $Vivienda->calculoEficiencia($zona,$consumoCalc, $consumoACS, $consumoRefrig);
            echo '</div>';
            }
        echo '</div>';
        ?>
                <br/>
            </div>
        </fieldset
       </form> 
            
        </div>
    </body>
</html>

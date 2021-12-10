<?php
/* 
 * Author: Jorge Carreño Miranda
 * Version:1.0.0
 * Last modified: 08/12/2021
 */
session_start();
include_once './Class/classCalculadora.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calculadora de eficiencia energética de una vivienda</title>
    </head>
    <body>
        <h1>Calculadora eficiencia energética</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="formulario" id="formulario">
                <p>Calefacción</p>
                <pre> kWh/m²                     Tipo</pre>
                <input type="number" name="calefaccion" value="">
                <select name="tipoCalc">
                    <option value="Gas" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Gas")) echo "selected"; ?>>Gas</option>
                    <option value="Electricidad" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Electricidad")) echo "selected"; ?>>Electricidad</option>
                    <option value="Gasoleo" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Gasoleo")) echo "selected"; ?>>Gasóleo</option>
                </select><br></br>
                <p>ACS</p>
                <pre> kWh/m²                     Tipo</pre>
                <input type="number" name='ACS' value="">
                <select name="tipoACS">
                    <option value="Gas" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Gas")) echo "selected"; ?>>Gas</option>
                    <option value="Electricidad" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Electricidad")) echo "selected"; ?>>Electricidad</option>
                    <option value="Gasoleo" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Gasoleo")) echo "selected"; ?>>Gasóleo</option>
                </select><br></br>
                <p>Refrigeración</p>
                <pre> kWh/m²                     Tipo</pre>
                <input type="number" name="refrigeracion" value="">
                <select name="tipoRef">
                    <option value="Electricidad" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Electricidad")) echo "selected"; ?>>Electricidad</option>
                </select><br></br>
                <p>Datos de la vivienda</p>
                <pre>superficie                  Tipo</pre>
                <input type="number" name="superficie" value="">
                <select name="tipoSuperf">
                    <option value="Unifamiliar" <?php if(isset($_POST['enviar']) && ($_POST['superficie']=="unifamiliar")) echo "selected"; ?>>Unifamiliar</option>
                    <option value="Bloque" <?php if(isset($_POST['enviar']) && ($_POST['superficie']=="bloque")) echo "selected"; ?>>Bloque </option>
                </select>
                <pre>Altitud de población       Provincia</pre>
                <input type="text" name="altitud" value="">
                  <select required name="provincia" >
                        <?php
                        foreach (Vivienda:: $provincias as $nombre){
                            echo '<option value="'.$nombre.'">'.$nombre.'</option>';
                        }
                        ?>
                  </select><br>
                <pre>Potencia eléctrica PUNTA</pre>
                <select name="potencia" style="width: 310px" >
                    <?php
                        foreach (Vivienda:: $potencia as $valor){
                            echo '<option value="'.$valor.'">'.$valor.'KW</option>';
                        }
                        ?>
                </select><br></br>
                <input type="submit" name="calcular" value="calcular">
               
            </form>
        <?php
        
        if(isset($_POST['calcular'])){
            $calefaccion=(int)$_POST['calefaccion'];
            $ACS=(int)$_POST['ACS'];
            $refrigeracion=(int)$_POST['refrigeracion'];
            $superficie=(int)$_POST['superficie'];
            $altitud=(int)$_POST['altitud'];
            $potenciaPunta=(float)$_POST['potencia'];
            $provincia=$_POST['provincia'];
            $tipoCalc=$_POST['tipoCalc'];
            $tipoACS=$_POST['tipoACS'];
            $tipoRef=$_POST['tipoRef'];
            $tipoSuperf=$_POST['tipoSuperf'];
            $Vivienda=new vivienda($calefaccion, $ACS, $refrigeracion, $superficie, $altitud, $potenciaPunta);
            $_SESSION['vivienda']=$Vivienda;
            }
            
        $Vivienda->obtenerSuperficie($tipoSuperf);
        $zona=$Vivienda->obtenerZona($provincia);
        $consumoCalc=$Vivienda->calculaCalefaccion($tipoCalc,$Vivienda->getPotenciaPunta(),$zona);
        $consumoACS=$Vivienda->calculaACS($tipoACS,$Vivienda->getPotenciaPunta(),$zona);
        $consumoRefrig=$Vivienda->calculaRefrigeracion($tipoRef,$Vivienda->getPotenciaPunta(),$zona);
        $Vivienda->consumoTotal($consumoCalc,$consumoACS,$consumoRefrig);
        $Vivienda->calculoEficiencia($zona,$consumoCalc, $consumoACS, $consumoRefrig);
        
        ?>
    </body>
</html>

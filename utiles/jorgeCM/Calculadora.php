<?php
/* 
 * Author: Jorge Carreño Miranda
 * Version:2.0.0
 * Last modified: 8/12/2021
 */
session_start();
include_once './Class/classCalculadora.php';
 include '../../componentes/head.php'; 

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Eficiencia enerxética</title>
        <link rel="stylesheet" href="../../css/custom.css"/>
    </head>
    <body>
        <?php include '../../componentes/menu.php'; ?>
        <?php include_once '../../componentes/cookieAlert.php';?>
<div class="fondo">
        <div class="container pt-5">
            <h1 class="text-primary">Calculadora eficiencia enerxética</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="formulario" id="formulario" style="margin:0;">
                <fieldset class="fieldset">
                     <div class="row">
                         <div class="col-6">
                <p>Calefacción</p>
                <pre> kWh/m²                        Tipo</pre>
                <div class="row mb-4">
                    <div class="col-4">
                <input class="input-group-text" style="width: 100%" type="number" name="calefaccion" value="">
                    </div>
                    <div class="col-8">
                <select name="tipoCalc" class="form-select input-group-text">
                    <option value="Gas" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Gas")) echo "selected"; ?>>Gas</option>
                    <option value="Electricidade" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Electricidade")) echo "selected"; ?>>Electricidade</option>
                    <option value="Gasoleo" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Gasoleo")) echo "selected"; ?>>Gasóleo</option>
                </select>
                    </div>
                </div>
                <p>ACS</p>
                <pre> kWh/m²                        Tipo</pre>
                <div class="row mb-4">
                    <div class="col-4">
                <input class="input-group-text"  style="width: 100%" type="number" name='ACS' value="">
                </div>
                    <div class="col-8">
                <select name="tipoACS" class="form-select input-group-text">>
                    <option value="Gas" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Gas")) echo "selected"; ?>>Gas</option>
                    <option value="Electricidade" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Electricidade")) echo "selected"; ?>>Electricidade</option>
                    <option value="Gasoleo" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Gasoleo")) echo "selected"; ?>>Gasóleo</option>
                </select>
                        </div>
                </div>
                <p>Refrixeración</p>
                <pre> kWh/m²                        Tipo</pre>
                <div class="row mb-4">
                    <div class="col-4">
                        <input class="input-group-text" style="width: 100%"  type="number" name="refrixeracion" value="">
                 </div>
                    <div class="col-8">
                <select name="tipoRef" class="form-select input-group-text">
                    <option value="Electricidade" <?php if(isset($_POST['enviar']) && ($_POST['calefaccion']=="Electricidade")) echo "selected"; ?>>Electricidade</option>
                </select>
                    </div>
                </div>
                <p>Datos da vivenda</p>
                <pre>Superficie                     Tipo</pre>
                <div class="row mb-4">
                    <div class="col-4">
                <input class="input-group-text" style="width: 100%" type="number" name="superficie" value="">
                </div>
                    <div class="col-8">
                <select name="tipoSuperf" class="form-select input-group-text">
                    <option value="Unifamiliar" <?php if(isset($_POST['enviar']) && ($_POST['superficie']=="unifamiliar")) echo "selected"; ?>>Unifamiliar</option>
                    <option value="Bloque" <?php if(isset($_POST['enviar']) && ($_POST['superficie']=="bloque")) echo "selected"; ?>>Bloque </option>
                </select>
                    </div>
                </div>
                <p >Provincia</p>
                <div class="row mb-4">
                    <div class="col-12">
                <select  required name="provincia" style="width: 68%" class="form-select input-group-text"> >
                        <?php
                        foreach (Vivienda:: $provincias as $nombre){
                            echo '<option value="'.$nombre.'">'.$nombre.'</option>';
                        }
                        ?>
                </select>
                    </div>
                </div>
                <p>Potencia eléctrica PUNTA</p> 
                <div class="row ">
                    <div class="col-4"> 
                <select  name="potencia" style="width: 100%" class="form-select input-group-text"> >
                    <?php
                        foreach (Vivienda:: $potencia as $valor){
                            echo '<option value="'.$valor.'">'.$valor.'KW</option>';
                        }
                        ?>
                </select>
                    </div>
                    <div class="col-8">
                <input class="btn btn-primary mx-5" type="submit" name="calcular" value="calcular">
                <br></br><br>
                    </div>
                         </div>
                         </div>
                         <div class="col-6 mt-5 ">                 
                
        <?php
        
        if(isset($_POST['calcular'])){
           //Creacion de variables
            $calefaccion=(int)$_POST['calefaccion'];
            $ACS=(int)$_POST['ACS'];
            $refrixeracion=(int)$_POST['refrixeracion'];
            $superficie=(int)$_POST['superficie'];
            $potenciaPunta=(float)$_POST['potencia'];
            $provincia=$_POST['provincia'];
            $tipoCalc=$_POST['tipoCalc'];
            $tipoACS=$_POST['tipoACS'];
            $tipoRef=$_POST['tipoRef'];
            $tipoSuperf=$_POST['tipoSuperf'];
            //Creación del objeto
            $Vivienda=new vivienda($calefaccion, $ACS, $refrixeracion, $superficie,$potenciaPunta);
            //metodos del objeto
            $Vivienda->obtenerSuperficie($tipoSuperf);
            $zona=$Vivienda->obtenerZona($provincia);
            $consumoCalc=$Vivienda->calculaCalefaccion($tipoCalc,$Vivienda->getPotenciaPunta(),$zona);
            $consumoACS=$Vivienda->calculaACS($tipoACS,$Vivienda->getPotenciaPunta(),$zona);
            $consumoRefrig=$Vivienda->calculaRefrigeracion($tipoRef,$Vivienda->getPotenciaPunta(),$zona);
            ?>
            <img style="margin-right:100% " src="imagen/eficiencia-energetica.png"  alt="imagen eficiencia energética"/>
            <?php $Vivienda->consumoTotal($consumoCalc,$consumoACS,$consumoRefrig);?>
            <p><?php $Vivienda->calculoEficiencia($zona,$consumoCalc, $consumoACS, $consumoRefrig);?><p>
            <?php
            }
        
        ?>
                   
                  </div>
                </div>
        </fieldset
       </form> 
       </div>   
    <?php
            include '../../componentes/footer.php'
            ?>
        </div>
    </body>
</html>

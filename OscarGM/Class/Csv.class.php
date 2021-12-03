<?php
  /* 
    Clase de manejo de CSV para calculadora individual.
  */
class Csv{
    function getData(){
        $file = "./CSV/datos.csv";
        $dataBase = array();
        if ($fp = fopen($file,"r")){
            while($fileData = fgetcsv($fp,0,",")){
                //$device = new Devices($fileData[0]);
                $dataBase[] = $fileData;
            }
        } else {
            echo "Error! no se puede acceder al fichero";
            return false;
        }
        fclose($fp);
        return $dataBase;
    }
}
?>
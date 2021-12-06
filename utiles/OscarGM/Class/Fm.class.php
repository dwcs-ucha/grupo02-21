 <?php
  /* 
    @author: Oscar González Martínez
    @Version: 1.0
    @date: 28/11/2021
    FileManager:

    Clase de manejo de CSV para calculadora individual.
  */
class Fm{

    //Declaración estatica de la ruta del fichero con el que hará la función de base de datos.
    public static $file = "./CSV/calculos.csv";

    //Función estatica que se encarga de almacenar datos en el fichero, si este no escribe lo crea.
    //Recibe dos parametros:
    //El Array a escribir y el modo de escritura.
    //W: Reescribe el fichero entero.
    //A: Añade lineas al archivo.
    public static function setData($devices,$mode){        
        if ($fp = fopen(self::$file,$mode)){
            foreach($devices as $device){
                $deviceData = [$device->getName(),$device->getNumber(),$device->getPower(),$device->getHours(),$device->daily(),$device->monthly()];
                fputcsv($fp,$deviceData);
            }
        } else {
            echo "Error! No se puede crear el fichero";
            return false;
        }
        fclose($fp);
        return true;
    }

    //Función estatica encargada de leer el contenido del fichero y crear los objetos.
    public static function getCalc(){        
        $dataBase = array();
        if ($fp = fopen(self::$file,"r")){
            while($fileData = fgetcsv($fp,0,",")){
                $deviceCalc = new Devices($fileData[0],$fileData[1],$fileData[2],$fileData[3],$fileData[4],$fileData[5]);
                $dataBase[] = $deviceCalc;
            }
        } else {
            echo "No se puede acceder al fichero";
            return false;
        }
        return $dataBase;
    }

    //Función estatica encargada de eliminar el fichero
    public static function emptyCsv(){        
        unlink(self::$file);
        return true;
    }

    public static function rmDevice($data,$id){
        unset($data[$id]);
        return $data;
    }
    
}
?>
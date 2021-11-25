<?php

class Help
{
    private $files = array('admin' => './privada/admins.csv', 'usuarios' => './privada/clientes.csv', 'GL' => './privada/idiomaGL.csv', 'ES' => './privada/idiomaES.csv', 'EN' => './privada/idiomaEN.csv');
    private $modo = 'csv';
    /**
     * Comprueba si el fichero pasado existe
     *
     * @param string $file
     * @return void
     */
    private function existsFile($file)
    {
        if (file_exists($file)) {
            return true;
        }
        return false;
    }

    /**
     * Elección del modo de escritura
     *
     * @param string $modo
     * @param $data
     * @param string $type
     * @return void
     */
    public static function write($data, $object, $type) {
        if(self::$modo == 'csv') {
            $data[] = $object;
            self::writeCSV($type, $data);
        } else if(self::$modo == 'bd') {
        }
    } 

    /**
     * Elección del modo de lectura
     *
     * @param string $modo
     * @param string $type
     * @return void
     */
    public static function read($type) {
        if(self::$modo == 'csv') {
            self::readCSV($type);
        } else if(self::$modo == 'bd') {
        }
    }

    /**
     * Lectura de CSV
     *
     * @param string $file
     * @return array
     */
    public static function readCSV($type)
    {
        $fileData = array();
        $file = self::$files[$type];
        if (self::existsFile($file)) {
            if (($fp = fopen($file, 'r')) !== FALSE) {
                while (($data = fgetcsv($fp, 0, ';')) !== FALSE) {
                    if($type == 'admins') {
                        $admin = new Admin($data[0],$data[1], $data[2],$data[3], $data[4], $data[5]);
                        $fileData[] = $admin;
                    } else if($type == 'usuarios') {
                        $user = new Usuario($data[0],$data[1], $data[2],$data[3], $data[4], $data[5], $data[6]);
                        $fileData[] = $user;
                    } else if($type == 'GL') {
                        // Cambiar el idioma a todas las palabras, Gallego
                    } else if($type == 'ES') {
                        // Cambiar el idioma a todas las palabras, Castellano
                    } else if($type == 'EN') {
                        // Cambiar el idioma a todas las palabras, Ingles
                    }
                }
                return $fileData;
            } 
            fclose($fp);
        }
        return null;
    }
    /**
     * Escritura de CSV
     *
     * @param string $file
     * @param array $data
     * @return void
     */
    public static function writeCSV($type, $data)
    {
        $file = self::$files[$type];
        if (self::existsFile($file)) {
            if (($fp = fopen($file, 'w')) !== FALSE) {
                if($type == 'admins') {
                    foreach($data as $admin) {
                        $object = $admin->formatPerson();
                        fputcsv($fp, $object, ';');
                    }
                } else if($type == 'usuarios') {
                    foreach($data as $user) {
                        $object = $user->formatUsuario();
                        fputcsv($fp, $object, ';');
                    }
                }
                
            }
        }
        fclose($fp);
    }
}

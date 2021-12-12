<?php
/* 
 * Author: Jorge Carreño Miranda
 * Version:1.0.0
 * Last modified: 08/12/2021
 */
 class Vivienda{
     
     public static $provincias=array('Alava','Albacete','Alicante','Almería','Asturias','Avila','Badajoz','Barcelona','Burgos','Cáceres',
                                     'Cádiz','Cantabria','Castellón','Ciudad Real','Córdoba','La Coruña','Cuenca','Gerona','Granada','Guadalajara',
                                     'Guipúzcoa','Huelva','Huesca','Islas Baleares','Jaén','León','Lérida','Lugo','Madrid','Málaga','Murcia','Navarra',
                                     'Orense','Palencia','Las Palmas','Pontevedra','La Rioja','Salamanca','Segovia','Sevilla','Soria','Tarragona',
                                     'Santa Cruz de Tenerife','Teruel','Toledo','Valencia','Valladolid','Vizcaya','Zamora','Zaragoza');

     public static $potencia =array(3.45,4.6,5.75,6.9,8.05,9.2,10.35,11.5,14.49);
    //Atributos
     private $calefaccion;
     private $ACS;
     private $refrigeracion;
     private $superficie;
     private $potenciaPunta;
     
     
     public function __construct($calefaccion, $ACS, $refrigeracion, $superficie, $potenciaPunta) {
         $this->calefaccion = $calefaccion;
         $this->ACS = $ACS;
         $this->refrigeracion = $refrigeracion;
         $this->superficie = $superficie;
         $this->potenciaPunta = $potenciaPunta;
     }
     
     public function getCalefaccion() {
         return $this->calefaccion;
     }

     public function getACS() {
         return $this->ACS;
     }

     public function getRefrigeracion() {
         return $this->refrigeracion;
     }

     public function getSuperficie() {
         return $this->superficie;
     }

     public function getPotenciaPunta() {
         return $this->potenciaPunta;
     }
     public function setCalefaccion($calefaccion): void {
         $this->calefaccion = $calefaccion;
     }

     public function setACS($ACS): void {
         $this->ACS = $ACS;
     }

     public function setRefrigeracion($refrigeracion): void {
         $this->refrigeracion = $refrigeracion;
     }

     public function setSuperficie($superficie): void {
         $this->superficie = $superficie;
     }

     public function setPotenciaPunta($potenciaPunta): void {
         $this->potenciaPunta = $potenciaPunta;
     }
     
     public function obtenerZona($provincia){
         if($provincia=='Almería'|| 'Cádiz'||'Málaga'||'Melilla'||'Las Palmas'||'Santa Cruz de Tenerife'){
            $zona=0.88;
             
         }
        
         elseif ($provincia=='Alicante'||'Córdoba'||'Huelva'||'Sevilla'||'Castellón'||'Ceuta'||'Murcia'||'Mallorca'||'Tarragona'||'Valencia') {
            $zona=0.95;
        }
             
        elseif ($provincia== 'Badajoz'||'Cáceres'||'Jaén'||'Toledo'||'Granada'||'Barcelona'||'Girona'||'Ourense'||'Bilbao'||'A Coruña'||'Donostia'||'Oviedo'||'Pontevedra'||'Santander') {
            $zona=1.04;
        }  
        elseif ($provincia== 'Albacete'||'Ciudad Real'||'Guadalajara'||'Lleida'||'Madrid'||'Tarragona'||'Cuenca'||'Huesca'||'Logroño'||'Salamanca'||'Segovia'||'Teruel'||'Valladolid'||'Zamora'||'Lugo'||'Palencia'||'Pamplona'||'Gazteiz'){
            $zona=1.12;
        }       
        elseif ($provincia==  'Ávila'||'Burgos'||'León'||'Soria') {
            $zona=1.19;
    }     
        return $zona;
         }
         
    public function obtenerSuperficie($tipoSuperf) {
       if($tipoSuperf=='Bloque'){
           $this->setCalefaccion($this->calefaccion/1.5); 
           $this->setACS($this->ACS/1.5); 
           $this->setRefrigeracion($this->refrigeracion/1.5); 
       }
       
    }
//FUNCIONES PARA LOS CÁLCULOS
       /*CALCULOS
        * Calefaccion
          * TUR 1 	5.44 €/mes 	0.0446 €/kWh
          * TUR 2 	10.23 €/mes 	0.0412 €/kWh
          * TUR 3 	21.99 €/mes 	0.0387 €/kWh
        * Electricidad    Fijo(€/kW año)    Término Variable C.(€/kW)
            *  Punta 	33,78566 	0,133118
        * Gasoleo
            *0,948443 €/l.   
          */
             
     public function calculaCalefaccion($tipoCalc,$potencia,$zona) {
       
         $tipo;
         $cal=$this->calefaccion;
         
         switch ($tipoCalc){
            case "Gas": $tipo=0.04469191;//ASUMIMOS EL TUR1
                break;
            case "Electricidad": $tipo= 0.133118 /$potencia;
                break;
            case "Gasoleo":$tipo=0.948443;
                break;
         }
         $consumo=($cal*$tipo*$this->superficie*$zona)*0.21;
         $consumo*=12;
         return $consumo; 
     }
     
     public function calculaACS($tipoACS,$potencia,$zona) {
         $tipo;
         $ACS=$this->ACS;
         
         switch ($tipoACS){
            case "Gas": $tipo=0.04469191;//ASUMIMOS EL TUR1
                break;
            case "Electricidad": $tipo= 33.78566/$potencia;
                break;
            case "Gasoleo":$tipo=0.948443;
                break;
         }
         $consumo=($ACS*$tipo*$this->superficie*$zona)*0.21;
         $consumo*=12;
         return $consumo; 
     }
     
     public function calculaRefrigeracion($tipoRefrig,$potencia,$zona) {
         $tipo= 0.133118/$potencia;
         $tipoRefrig=$this->refrigeracion;
         $consumo=($tipoRefrig*$tipo*$this->superficie*$zona)*0.21;
         $consumo*=12;
         return $consumo;  
     }
     public function consumoTotal($consumoCalc,$consumoACS,$consumoRefrig) {
         $consumoTotal=$consumoCalc+$consumoACS+$consumoRefrig;
         echo 'El consumo total de tu vivienda es de: '. round($consumoTotal,2)."€<br>";
     }
     public function calculoEficiencia($zona) {
     $eficiencia=$this->superficie*$zona;
     
         if($eficiencia<=50){
           echo "Tu eficiencia energética es de una calificación A+";
         }
             elseif ($eficiencia>50 && $eficiencia<=60) {
             echo "Tu eficiencia energética es de una calificación A";
             }
             elseif ($eficiencia>60 && $eficiencia<=70) {
                 echo "Tu eficiencia energética es de una calificación B";
             }
             elseif ($eficiencia>70 && $eficiencia<=80) {
                 echo "Tu eficiencia energética es de una calificación C";
             }
             elseif ($eficiencia>80 && $eficiencia<=90) {
                 echo "Tu eficiencia energética es de una calificación D";
             }
             elseif ($eficiencia>90 && $eficiencia<=100) {
                 echo "Tu eficiencia energética es de una calificación E";
             }
             elseif ($eficiencia>100 ) {
                 echo "Tu eficiencia energética es de una calificación F";
             }

        }
 }
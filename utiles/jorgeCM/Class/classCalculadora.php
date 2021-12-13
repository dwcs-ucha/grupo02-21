<?php
/* 
 * Author: Jorge Carreño Miranda
 * Version:1.0.0
 * Last modified: 08/12/2021
 */
 class Vivienda{
     //Array que contiene las provincias
     public static $provincias=array('Alava','Albacete','Alicante','Almería','Asturias','Avila','Badajoz','Barcelona','Burgos','Cáceres',
                                     'Cádiz','Cantabria','Castellón','Ciudad Real','Córdoba','A coruña','Cuenca','Gerona','Granada','Guadalajara',
                                     'Guipúzcoa','Huelva','Huesca','Islas Baleares','Jaén','León','Lérida','Lugo','Madrid','Málaga','Murcia','Navarra',
                                     'Ourense','Palencia','Las Palmas','Pontevedra','La Rioja','Salamanca','Segovia','Sevilla','Soria','Tarragona',
                                     'Santa Cruz de Tenerife','Teruel','Toledo','Valencia','Valladolid','Vizcaya','Zamora','Zaragoza');

     //Array que contiene los posibles valores de la potencia
     public static $potencia =array(3.45,4.6,5.75,6.9,8.05,9.2,10.35,11.5,14.49);
    //Atributos
     private $calefaccion;
     private $ACS;
     private $refrixeracion;
     private $superficie;
     private $potenciaPunta;
     
     /*
      * Constructor
      */
     public function __construct($calefaccion, $ACS, $refrixeracion, $superficie, $potenciaPunta) {
         $this->calefaccion = $calefaccion;
         $this->ACS = $ACS;
         $this->refrixeracion = $refrixeracion;
         $this->superficie = $superficie;
         $this->potenciaPunta = $potenciaPunta;
     }
    
     /*
      * get de calefaccion
      */
     public function getCalefaccion() {
         return $this->calefaccion;
     }

     /*
      * get de acs
      */
     public function getACS() {
         return $this->ACS;
     }
     
     /*
      * get de refrigeracion
      */
     public function getRefrigeracion() {
         return $this->refrixeracion;
     }

     /*
      * get de superficie
      */
     public function getSuperficie() {
         return $this->superficie;
     }

     /*
      * get de potencia
      */
     public function getPotenciaPunta() {
         return $this->potenciaPunta;
     }
     /*
      * set de calefaccion
      */
     public function setCalefaccion($calefaccion): void {
         $this->calefaccion = $calefaccion;
     }

     /*
      * set de ACS
      */
     public function setACS($ACS): void {
         $this->ACS = $ACS;
     }

     /*
      * set de refrigeracion
      */
     public function setRefrigeracion($refrixeracion): void {
         $this->refrixeracion = $refrixeracion;
     }

     /*
      * set de superficie
      */
     public function setSuperficie($superficie): void {
         $this->superficie = $superficie;
     }

     /*
      * set de potencia Punta
      */
     public function setPotenciaPunta($potenciaPunta): void {
         $this->potenciaPunta = $potenciaPunta;
     }
     
     /*
      * metodo que obtiene el valor añadido en base a la provincia
      */
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
    /*
     * metodo que altera el valores si el tipo de superficie es bloque
     */     
    public function obtenerSuperficie($tipoSuperf) {
       if($tipoSuperf=='Bloque'){
           $this->setCalefaccion($this->calefaccion/1.5); 
           $this->setACS($this->ACS/1.5); 
           $this->setRefrigeracion($this->refrixeracion/1.5); 
       }
       
    }
//FUNCIONES PARA LOS CÁLCULOS
       /*CALCULOS
        * Calefaccion
          * TUR 1 	5.44 €/mes 	0.0446 €/kWh
          * TUR 2 	10.23 €/mes 	0.0412 €/kWh
          * TUR 3 	21.99 €/mes 	0.0387 €/kWh
        * Electricidade
        *     Fijo(€/kW año)    Término Variable C.(€/kW)
            *  Punta 	33,78566 	0,133118
        * Gasoleo
            *0,948443 €/l.   
          */
    /*
     * Metodo para obtener el consumo de la calefaccion
     */
     public function calculaCalefaccion($tipoCalc,$potencia,$zona) {
       
         $tipo;
         $cal=$this->calefaccion;
         
         switch ($tipoCalc){
            case "Gas": $tipo=0.04469191;//ASUMIMOS EL TUR1
                break;
            case "Electricidade": $tipo= 0.133118 /$potencia;
                break;
            case "Gasoleo":$tipo=0.948443;
                break;
         }
         $consumo=($cal*$tipo*$this->superficie*$zona)*0.21;
         $consumo*=12;
         return $consumo; 
     }
     
     /*
      * Metodo para obtener el consumo del ACS
      */
     public function calculaACS($tipoACS,$potencia,$zona) {
         $tipo;
         $ACS=$this->ACS;
         
         switch ($tipoACS){
            case "Gas": $tipo=0.04469191;//ASUMIMOS EL TUR1
                break;
            case "Electricidade": $tipo= 33.78566/$potencia;
                break;
            case "Gasoleo":$tipo=0.948443;
                break;
         }
         $consumo=($ACS*$tipo*$this->superficie*$zona)*0.21;
         $consumo*=12;
         return $consumo; 
     }
     
     /*
      * Metodo para obtener el consumo de la refrigeracion
      */
     public function calculaRefrigeracion($tipoRefrig,$potencia,$zona) {
         $tipo= 0.133118/$potencia;
         $tipoRefrig=$this->refrixeracion;
         $consumo=($tipoRefrig*$tipo*$this->superficie*$zona)*0.21;
         $consumo*=12;
         return $consumo;  
     }
     /*
      * metodo que devuelve un print con el consumo total
      */
     public function consumoTotal($consumoCalc,$consumoACS,$consumoRefrig) {
         $consumoTotal=$consumoCalc+$consumoACS+$consumoRefrig;
         echo 'O consumo total da túa vivenda é de: '. round($consumoTotal,2)."€<br>";
     }
     /*
      * metodo que obtiene la calificación energética
      */
     public function calculoEficiencia($zona) {
     $eficiencia=$this->superficie*$zona;
     
         if($eficiencia<=50){
           echo '<img style="margin-right:100% " src="imagen/eficiencia-energeticaA.png"  alt="imagen eficiencia energética"/>';
           echo "A túa eficiencia enerxética e dunha A";
         }
             elseif ($eficiencia>50 && $eficiencia<=60) {
                echo '<img style="margin-right:100% " src="imagen/eficiencia-energeticaB.png"  alt="imagen eficiencia energética"/>';
                echo "A túa eficiencia enerxética e dunha B";
             }
             elseif ($eficiencia>60 && $eficiencia<=70) {
                 echo '<img style="margin-right:100% " src="imagen/eficiencia-energeticaC.png"  alt="imagen eficiencia energética"/>';
                 echo "A túa eficiencia enerxética e dunha C";
             }
             elseif ($eficiencia>70 && $eficiencia<=80) {
                 echo '<img style="margin-right:100% " src="imagen/eficiencia-energeticaD.png"  alt="imagen eficiencia energética"/>';
                 echo "A túa eficiencia enerxética e dunha D";
             }
             elseif ($eficiencia>80 && $eficiencia<=90) {
                 echo '<img style="margin-right:100% " src="imagen/eficiencia-energeticaE.png"  alt="imagen eficiencia energética"/>';
                 echo "A túa eficiencia enerxética e dunha E";
             }
             elseif ($eficiencia>90 && $eficiencia<=100) {
                 echo '<img style="margin-right:100% " src="imagen/eficiencia-energeticaF.png"  alt="imagen eficiencia energética"/>';
                 echo "A túa eficiencia enerxética e dunha F";
             }
             elseif ($eficiencia>100 ) {
                 echo '<img style="margin-right:100% " src="imagen/eficiencia-energeticaG.png"  alt="imagen eficiencia energética"/>';
                 echo "A túa eficiencia enerxética e dunha G";
             }

        }
 }
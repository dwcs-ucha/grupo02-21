<?php 
/*
CABECEIRA:

    TRABAJO: CALCULADORA INDIVIDUAL
    AUTOR: Ricardo Apaza Cueva
    CURSO:2ºDAW
    FECHA:08/12/2021
    */
      
   
          class Calculadora{
            private $bombillasCambiarUnidad;
            private $consumoMedioBombillasTradicionales;
            private $costeEnergia;

            public function __construct($bombillasCambiarUnidad,$consumoMedioBombillasTradicionales,$costeEnergia)
            {
                $this->bombillasCambiarUnidad=$bombillasCambiarUnidad;
                $this->consumoMedioBombillasTradicionales=$consumoMedioBombillasTradicionales;
                $this->costeEnergia=$costeEnergia;
            }
            public function getBombillasCambiarUnidad(){
                return $this->bombillasCambiarUnidad;
            }
            
            public function getConsumoMedioBombillasTradicionales(){
                return $this->consumoMedioBombillasTradicionales;
            }
            public function getCosteEnergia(){
                return $this->costeEnergia;
            }

            public function setBombillasCambiarUnidad($bombillasCambiarUnidad):void{
                $this->bombillasCambiarUnidad=$bombillasCambiarUnidad;
            }

            public function setConsumoMedioBombillasTradicionales($consumoMedioBombillasTradicionales):void{
                $this->bombillasCambiarUnidad=$consumoMedioBombillasTradicionales;
            }
            public function setCosteEnergia($costeEnergia):void{
                $this->costeEnergia=$costeEnergia;
            }


            public function calculoBombillas(){
              $total=$this->bombillasCambiarUnidad*$this->consumoMedioBombillasTradicionales;
              $total/=1000;
              $total*=$this->costeEnergia;
              return $total;
            }

          }

       ?>

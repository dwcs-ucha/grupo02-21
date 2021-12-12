<html>
	<head>
	<meta charset="UTF-8"/>
	<?php /*Titulo: Habitacion.php
		Autor: Pablo Martinez Castro
		Version=1.0.0
		Ultima modificacion: 27/11/2021*/
	?>
	</head>
	<body>
            <?php
                class Habitacion{
                    
                    //Atributos
                    private $largo;
                    private $ancho;
                    private $alto;
                    private $zona;
                    private $orientacion;
                    private $aislamiento;
                    
                    //Contructor
                    public function __construct($largo, $ancho, $alto, $zona, $orientacion, $aislamiento) {
                        $this->largo = $largo;
                        $this->ancho = $ancho;
                        $this->alto = $alto;
                        $this->zona = $zona;
                        $this->orientacion = $orientacion;
                        $this->aislamiento = $aislamiento;
                    }
                    
                    //Metodos Getters & Setters
                    public function getLargo() {
                        return $this->largo;
                    }

                    public function getAncho() {
                        return $this->ancho;
                    }

                    public function getAlto() {
                        return $this->alto;
                    }

                    public function getZona() {
                        return $this->zona;
                    }

                    public function getOrientacion() {
                        return $this->orientacion;
                    }

                    public function getAislamiento() {
                        return $this->aislamiento;
                    }

                    public function setLargo($largo): void {
                        $this->largo = $largo;
                    }

                    public function setAncho($ancho): void {
                        $this->ancho = $ancho;
                    }

                    public function setAlto($alto): void {
                        $this->alto = $alto;
                    }

                    public function setZona($zona): void {
                        $this->zona = $zona;
                    }

                    public function setOrientacion($orientacion): void {
                        $this->orientacion = $orientacion;
                    }

                    public function setAislamiento($aislamiento): void {
                        $this->aislamiento = $aislamiento;
                    }

                    //Funciones de clase
                    public function getValorZona(){
                        switch ($this->zona){
                            case 'roja':
                                $valorZona = 0.88;
                                break;
                            case 'naranja':
                                $valorZona = 0.95;
                                break;
                            case 'grisClaro':
                                $valorZona = 1.04;
                                break;
                            case 'grisOscuro':
                                $valorZona = 1.12;
                                break;
                            case 'morada':
                                $valorZona = 1.19;
                                break;
                            default:
                                break;
                        }
                        return $valorZona;
                    }
                    
                    public function getValorOrientacion(){
                        if($this->orientacion == 'norte'){
                            $valorOrientacion = 1.12;
                        }else{
                            $valorOrientacion = 0.92;
                        }
                        return $valorOrientacion;
                    }
                    
                    public function getValorAislamiento(){
                        if($this->aislamiento == 'aislada'){
                            $valorAislamiento = 0.93;
                        }else{
                            $valorAislamiento = 1.10;
                        }
                        return $valorAislamiento;
                    }
                    
                    public function getValorWm2(){
                        
                            if($this->zona == 'roja' && $this->aislamiento == 'noAislada' && $this->orientacion == 'norte'){
                                $vatios = 90;
                            }elseif($this->zona == 'roja' && $this->aislamiento == 'noAislada' && $this->orientacion == 'sur'){
                                $vatios = 85;
                            }elseif($this->zona == 'roja' && $this->aislamiento == 'aislada' && $this->orientacion == 'norte'){
                                $vatios = 80;
                            }elseif($this->zona == 'roja' && $this->aislamiento == 'aislada' && $this->orientacion == 'sur'){
                                $vatios = 70;
                            }elseif($this->zona == 'naranja' && $this->aislamiento == 'noAislada' && $this->orientacion == 'norte'){
                                $vatios = 95;
                            }elseif($this->zona == 'naranja' && $this->aislamiento == 'noAislada' && $this->orientacion == 'sur'){
                                $vatios = 90;
                            }elseif($this->zona == 'naranja' && $this->aislamiento == 'aislada' && $this->orientacion == 'norte'){
                                $vatios = 85;
                            }elseif($this->zona == 'naranja' && $this->aislamiento == 'aislada' && $this->orientacion == 'sur'){
                                $vatios = 75;
                            }elseif($this->zona == 'grisClaro' && $this->aislamiento == 'noAislada' && $this->orientacion == 'norte'){
                                $vatios = 100;
                            }elseif($this->zona == 'grisClaro' && $this->aislamiento == 'noAislada' && $this->orientacion == 'sur'){
                                $vatios = 95;
                            }elseif($this->zona == 'grisClaro' && $this->aislamiento == 'aislada' && $this->orientacion == 'norte'){
                                $vatios = 90;
                            }elseif($this->zona == 'grisClaro' && $this->aislamiento == 'aislada' && $this->orientacion == 'sur'){
                                $vatios = 80;
                            }elseif($this->zona == 'grisOscuro' && $this->aislamiento == 'noAislada' && $this->orientacion == 'norte'){
                                $vatios = 105;
                            }elseif($this->zona == 'grisOscuro' && $this->aislamiento == 'noAislada' && $this->orientacion == 'sur'){
                                $vatios = 100;
                            }elseif($this->zona == 'grisOscuro' && $this->aislamiento == 'aislada' && $this->orientacion == 'norte'){
                                $vatios = 95;
                            }elseif($this->zona == 'grisOscuro' && $this->aislamiento == 'aislada' && $this->orientacion == 'sur'){
                                $vatios = 85;
                            }elseif($this->zona == 'morada' && $this->aislamiento == 'noAislada' && $this->orientacion == 'norte'){
                                $vatios = 110;
                            }elseif($this->zona == 'morada' && $this->aislamiento == 'noAislada' && $this->orientacion == 'sur'){
                                $vatios = 105;
                            }elseif($this->zona == 'morada' && $this->aislamiento == 'aislada' && $this->orientacion == 'norte'){
                                $vatios = 100;
                            }elseif($this->zona == 'morada' && $this->aislamiento == 'aislada' && $this->orientacion == 'sur'){
                                $vatios = 90;
                            }else{
                                echo 'Error';
                            }
                            return $vatios;
                        }

                    public function calcularConsumo(){
                        $valorZona = $this->getValorZona();
                        $valorOrientacion = $this->getValorOrientacion();
                        $valorAislamiento = $this->getValorAislamiento();
                        $valorVatios = $this->getValorWm2();
                        
                        $consumo = ($valorZona*$valorAislamiento*$valorOrientacion*$valorVatios)*($this->getLargo()*$this->getAncho());
                        return $consumo;
                    }
                
                }
            ?>
        </body>
</html>
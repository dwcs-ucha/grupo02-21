<?php
/*
Versión: 1.0.0 
Última fecha de modificación : 29/11/2021
Autor: Manuel Rios
*/
?>
<?php
class Electrodomesticos{
    private $vatios;
    private $frecuencia;
    private $valorTiempo;
    private $valorFrecuencia;
    private $tiempo;
    private $euros;
    
    public function __construct($vatios, $frecuencia, $valorTiempo, $valorFrecuencia, $tiempo, $euros) {
        $this->vatios = $vatios;
        $this->frecuencia = $frecuencia;
        $this->valorTiempo = $valorTiempo;
        $this->valorFrecuencia = $valorFrecuencia;
        $this->tiempo = $tiempo;
        $this->euros = $euros;
        
    }
    public function getVatios() {
        return $this->vatios;
    }

    public function getFrecuencia() {
        return $this->frecuencia;
    }

    public function getValorTiempo() {
        return $this->valorTiempo;
    }

    public function getValorFrecuencia() {
        return $this->valorFrecuencia;
    }

    public function getTiempo() {
        return $this->tiempo;
    }

    public function getEuros() {
        return $this->euros;
    }

    public function setVatios($vatios): void {
        $this->vatios = $vatios;
    }

    public function setFrecuencia($frecuencia): void {
        $this->frecuencia = $frecuencia;
    }

    public function setValorTiempo($valorTiempo): void {
        $this->valorTiempo = $valorTiempo;
    }

    public function setValorFrecuencia($valorFrecuencia): void {
        $this->valorFrecuencia = $valorFrecuencia;
    }

    public function setTiempo($tiempo): void {
        $this->tiempo = $tiempo;
    }

    public function setEuros($euros): void {
        $this->euros = $euros;
    }

    
    public function Resultado(){
        $consumoAnual=($this->vatios*$this->valorFrecuencia*$this->valorTiempo)/1000 ;
        $costeAnual=($consumoAnual*$this->euros);
        echo "Resultado <br/>
        El consumo anual del dispositivo es ". $consumoAnual ."kWh. Por tanto, el coste en electricidad del dispositivo al año es ". $costeAnual .". El coste en electricidad para cinco años del dispositivo es " . $costeAnual*5 . "!<br/>
        Puede encontrar muchos consejos para ahorrar energía en el texto a continuación.";
        
    }

    
}
?>
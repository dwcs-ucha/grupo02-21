<?php
/*

Autor: Pelayo García-Ciaño Treviño

Version: 1.0.0

Data de modificación: 10/12/2021

*/
?>
<?php
class Vehiculos{
    private $distancia;
    private $consumo;
    private $precio;
 
    
    public function __construct($distancia, $consumo, $precio) {
        $this->distancia = $distancia;
        $this->consumo = $consumo;
        $this->precio = $precio;

        }

    public function getDistancia() {
        return $this->distancia;
    }

    public function getConsumo() {
        return $this->consumo;
    }

    public function getPrecio() {
        return $this->precio;
    }


    public function setDistancia($distancia): void {
        $this->distancia = $distancia;
    }

    public function setConsumo($consumo): void {
        $this->consumo = $consumo;
    }

    public function setPrecio($precio): void {
        $this->precio = $precio;
    }


    public function Resultado(){
        $resultado=(((doubleval($this->consumo)*doubleval($this->precio))/100)*doubleval($this->distancia));
        echo round($resultado,2)."€ Sería o custo da gasolina do viaxe.";
        
        
    }
}
?>

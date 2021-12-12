<?php
/*
 * Author: Jorge Carreño Miranda
 * Version:1.0.0
 * Last modified: 29/11/2021
 */
class Publicacion {
    private $titulo;
    private $cuerpo;
    private $creacion;
  
    public function __construct($titulo, $cuerpo, $creacion) {
        $this->titulo = $titulo;
        $this->cuerpo = $cuerpo;
        $this->creacion = $creacion;

    }

        public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getCuerpo() {
        return $this->cuerpo;
    }

    public function setCuerpo($cuerpo) {
        $this->cuerpo = $cuerpo;
    }

    public function getCreacion() {
        return $this->creacion;
    }
    
    public function setCreacion($creacion) {
        $this->creacion = $creacion;
    }

}
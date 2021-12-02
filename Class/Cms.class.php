<?php
/*
 * Author: Jorge Carreño Miranda
 * Version:1.0.0
 * Last modified: 29/11/2021
 */
class Publicacion{
    private $titulo;
    private $cuerpo;
  
    public function __construct($titulo, $cuerpo) {
        $this->titulo = $titulo;
        $this->cuerpo = $cuerpo;
    }

        public function getTitulo() {
        return $this->titulo;
    }

    public function getCuerpo() {
        return $this->cuerpo;
    }

}
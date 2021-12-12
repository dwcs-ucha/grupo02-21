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
    private $img;

  
    public function __construct($titulo, $cuerpo, $creacion, $img) {
        $this->titulo = $titulo;
        $this->cuerpo = $cuerpo;
        $this->creacion = $creacion;
        $this->img = $img;

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

    public function getImg() {
        return $this->img;
    }

    public function setImg($img) {
        $this->img = $img;
    }
}
<?php
Class Idioma{
    private $idioma;
    
    public function __construct($idioma) {
        $this->idioma = $idioma;
    }
    public function getIdioma() {
        return $this->idioma;
    }

    public function setIdioma($idioma): void {
        $this->idioma = $idioma;
    }    
    
       public function traduce($string){
       return _gettext($string);
}
}

?>


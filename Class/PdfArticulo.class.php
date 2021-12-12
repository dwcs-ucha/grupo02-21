<?php
    require('/fpdf/fpdf.php');

    class PdfArticulo extends FPDF{
        private $articulo;

        public function __construct($articulo){
            $this->titulo = getTitulo();
            $this->cuerpo = getCuerpo();
            $this->img = getImg();
        }

        // Cabecera de página
        function Header()
        {
            // Arial bold 15
            $this->SetFont('Arial','B',15);
            // Movernos a la derecha
            $this->Cell(58);
            // Título
            $this->Cell(70,10,'Listado CSV',1,0,'C');
            // Salto de línea
            $this->Ln(20);
        }

        // Pie de página
        function Footer(){
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Número de página
            $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
        }
        
        function CuerpoArchivo(){

            //Times 12
            $this->SetFont('Times','',12);
            $articulo->getImg();
            $articulo->getCuerpo();
        }
        
        function ImprimirArchivo(){
            $this->CuerpoArchivo();
        }
    }
    

?>
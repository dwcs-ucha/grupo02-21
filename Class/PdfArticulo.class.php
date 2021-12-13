<?php

class PdfArticulo
{
    private $articulo;
    private $pdf;

    public function __construct($articulo)
    {
        $this->articulo = $articulo;
        $this->pdf = new FPDF();
    }

    private function getCabecera()
    {
        // Arial bold 15
        $this->pdf->SetFont('Arial', 'B', 15);
        //Color del texto
        $this->pdf->SetTextColor(0,143,57);
        // Movernos a la derecha
        $this->pdf->Cell(58);
        // Título
        $this->pdf->Cell(65, 10, $this->articulo->getTitulo(), 0, 0, 'C');
        // Salto de línea
        $this->pdf->Ln(20);
    }

    // Pie de página
    private function getFooter()
    {
        // Posición: a 1,5 cm del final
        $this->pdf->SetY(-15);
        // Arial italic 8
        $this->pdf->SetFont('Arial', 'I', 8);
        // Número de página
        $this->pdf->Cell(0, 10, utf8_decode('Página ') . $this->pdf->PageNo() . '/{nb}', 0, 0, 'C');
    }

    private function getCuerpo()
    {
        //Times 12
        $this->pdf->SetFont('Arial', '', 12);
        //Color del borde, relleno y letra
        $this->pdf->SetDrawColor(0,143,57);
        $this->pdf->SetTextColor(0,0,0);
        $this->pdf->SetFillColor(189,236,182);
        // Imagen. Si no existe la imagen no se va a imprimir
        $imagen = $this->articulo->getImg();
        if (isset($imagen) && !empty($imagen))
        {
            $this->pdf->Image($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $imagen, 65, 55);
        }

        //Limpiar el cuerpo del archivo (quitar etiquetas html)
        $texto = $this->articulo->getCuerpo();
        $textoLimpio = str_replace("&nbsp;"," ",$this->articulo->getCuerpo());
        $textoLimpio = strip_tags($texto);
        //Cuerpo
        $this->pdf->SetX(65);
        $this->pdf->MultiCell(90, 10, utf8_decode($textoLimpio), 1, 1, 'C', true);
    }

    public function descargarPdf() {
        //$this->pdf->AliasNbPages();
        
        $this->pdf->AddPage();
        $this->getCabecera();
        $this->getCuerpo();
        //$this->getFooter();

        $this->pdf->Output('D', 'publicacion.pdf');
    }
}

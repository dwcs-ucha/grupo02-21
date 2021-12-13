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
        // Movernos a la derecha
        $this->pdf->Cell(58);
        // Título
        $this->pdf->Cell(70, 10, $this->articulo->getTitulo(), 1, 0, 'C');
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
        $this->pdf->SetFont('Times', '', 12);
        // Imagen
        $imagen = $this->articulo->getImg();
        if (isset($imagen) && !empty($imagen))
        {
            $this->pdf->Image($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $imagen, 80, 80);
        }
        //Cuerpo
        $cuerpo = str_replace("&nbsp;"," ",$this->articulo->getCuerpo());
        $this->pdf->Write(5, $cuerpo);
    }

    public function descargarPdf() {
        $this->pdf->AliasNbPages();
        $this->pdf->AddPage();
        $this->getCabecera();
        $this->getCuerpo();
        $this->getFooter();

        $this->pdf->Output('D', 'publicacion.pdf');
    }
}

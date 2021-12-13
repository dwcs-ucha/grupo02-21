<?php
    /*Titulo: PdfArticulo.class.php
    Autor: Pablo Martinez Castro
    Version=1.0.0
    Ultima modificacion: 13/12/2021*/

    require_once 'Pdf_Html.class.php';

class PdfArticulo{

    private $articulo;
    private $pdf;

    public function __construct($articulo)
    {
        $this->articulo = $articulo;
        $this->pdf = new PDF_HTML();
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
        $this->pdf->Cell(65, 10, utf8_decode($this->articulo->getTitulo()), 0, 0, 'C');
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
        //$this->pdf->SetDrawColor(0,143,57);
        $this->pdf->SetTextColor(0,0,0);
        //$this->pdf->SetFillColor(255,255,255);
        // Imagen. Si no existe la imagen no se va a imprimir
        $imagen = $this->articulo->getImg();
        if (isset($imagen) && !empty($imagen))
        {
            $this->pdf->Image($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $imagen, 20, 20, 80, 50);
        }

        //Limpiar el cuerpo del archivo (quitar etiquetas html)
        $cuerpo = $this->articulo->getCuerpo();
        $cuerpo = utf8_decode($cuerpo);
        $cuerpo = str_replace("&nbsp;"," ",$cuerpo);
        $cuerpo = str_replace("&quot;","'",$cuerpo);
        $cuerpo = str_replace("&#39;","'",$cuerpo);
        $cuerpo = str_replace("&aacute;","á",$cuerpo);
        $cuerpo = str_replace("&eacute;","é",$cuerpo);
        $cuerpo = str_replace("&iacute;","í",$cuerpo);
        $cuerpo = str_replace("&oacute;","ó",$cuerpo);
        $cuerpo = str_replace("&uacute;","ú",$cuerpo);

        //Cuerpo
        $this->pdf->SetY(70, false);
        $this->pdf->WriteHTML($cuerpo);
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

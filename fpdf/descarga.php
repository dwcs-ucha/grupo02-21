<?php
    /*Titulo: descarga.php
    Autor: Pablo Martinez Castro
    Version=1.0.0
    Ultima modificacion: 13/12/2021*/
    require_once '../Class/Cms.class.php';
    require_once '../DAO/DAO.class.php';
    require_once '../Class/PdfArticulo.class.php';
    require_once '../Class/Pdf_Html.class.php';
    //require_once '../fpdf/fpdf.php';

    $articulo = $_GET['articulo'];
    $article = DAO::getArticle($articulo);

    $pdfArticulo = new PdfArticulo($article);

    $pdfArticulo->descargarPdf();

?>
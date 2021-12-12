<?php
    require_once '../Class/Cms.class.php';
    session_start();

    $article=DAO::getArticle($_SESSION['articulo']);

    $pdf = new PDF($articulo);

    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times', 'B', 10);
    $pdf->ImprimirArchivo();
    $pdf->Output('D');

?>
<?php
    include_once '../database/connect.php';
    $mysqli = dbconnect();

    include_once '../classes/transaction.php';
    include_once '../fpdf/fpdf.php';

    $fpdf = new FPDF();

    $fpdf->AddPage();
    $fpdf->SetFont('Arial', 'B', 10);

    $result = get_pdf_transaction($mysqli);
    $header = pdf_header($mysqli);

        foreach($header as $heading){
            foreach($heading as $column_heading)
                $fpdf->Cell(25, 12, $column_heading, 1);
            
        }

        foreach($result as $row){
            $fpdf->Ln();
            foreach($row as $column)
                $fpdf->Cell(25, 12, $column, 1);
        }
        $fpdf->Output();
?>
<?php
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(30,10,'ICINEMA');
$pdf->Cell(30,10,'Enjoy the film, ' . $_GET["film"]);

// Line break
$pdf->Ln(20);

$pdf->Cell(40,10,'Thanks for booking!');
$pdf->Output();
?>
<?php
require('fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','i',16);
$pdf->Cell(40,10,'What is This!');
$pdf->Output();
?>
<?php
require('pdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    // $this->Image('images/logo.png',10,10,60);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    $this->Ln(10);
    // Move to the right
    // $this->Cell(80);
    // Title
    $this->Cell(5 ,5,'Digital Education Infrastructure Maintainance Program',0,'C');
    // Line break
    $this->Ln(5);
    $this->Line(10,30,200,30);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().' of {nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);


for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Workshop_Added Part '.$i,0,1);
$pdf->Output();
?>
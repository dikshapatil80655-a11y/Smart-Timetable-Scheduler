<?php

include("connection.php");
require('fpdf186/fpdf.php');

$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,'Timetable Report',0,1,'C');

$pdf->Ln(10);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(10,10,'ID',1);
$pdf->Cell(35,10,'Faculty',1);
$pdf->Cell(35,10,'Subject',1);
$pdf->Cell(30,10,'Class',1);
$pdf->Cell(30,10,'Day',1);
$pdf->Cell(40,10,'Time',1);
$pdf->Ln();

$pdf->SetFont('Arial','',10);

$sql = "SELECT * FROM timetable";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result))
{
    $pdf->Cell(10,10,$row['id'],1);
    $pdf->Cell(35,10,$row['faculty_name'],1);
    $pdf->Cell(35,10,$row['subject_name'],1);
    $pdf->Cell(30,10,$row['class_name'],1);
    $pdf->Cell(30,10,$row['day_name'],1);
    $pdf->Cell(40,10,$row['lecture_time'],1);
    $pdf->Ln();
}

$pdf->Output();

?>
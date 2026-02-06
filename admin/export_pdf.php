<?php
session_start();
if (!in_array($_SESSION['role'] ?? '', ['admin','staff'])) {
    exit("Access denied");
}
include("../database/db.php");
require("../libs/fpdf.php");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Job Seekers Report',0,1);

$res = mysqli_query($conn,"SELECT full_name, gender, phone FROM job_seekers");
$pdf->SetFont('Arial','',10);

while($r=mysqli_fetch_assoc($res)){
    $pdf->Cell(0,8,$r['full_name']." | ".$r['gender']." | ".$r['phone'],0,1);
}

$pdf->Output();

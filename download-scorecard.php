<?php
session_start();
include("config.php");

require('fpdf/fpdf.php');

if(!isset($_SESSION['student_id'])){
header("Location: student-login.php");
exit();
}

$student_id = $_SESSION['student_id'];

/* Student info */

$student = mysqli_query($conn,"SELECT name FROM students WHERE id='$student_id'");
$data = mysqli_fetch_assoc($student);
$name = $data['name'];

/* Fetch results */

$query = mysqli_query($conn,"
SELECT results.*, exams.exam_name
FROM results
JOIN exams ON results.exam_id = exams.id
WHERE results.student_id='$student_id'
AND results.is_published=1
");

/* Create PDF */

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Student Scorecard',0,1,'C');

$pdf->Ln(5);

$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,'Name: '.$name,0,1);
$pdf->Cell(0,10,'Student ID: '.$student_id,0,1);

$pdf->Ln(5);

/* Table Header */

$pdf->SetFont('Arial','B',12);

$pdf->Cell(60,10,'Exam',1);
$pdf->Cell(40,10,'Marks',1);
$pdf->Cell(40,10,'Percentage',1);
$pdf->Cell(40,10,'Grade',1);

$pdf->Ln();

/* Table Data */

$pdf->SetFont('Arial','',12);

while($row = mysqli_fetch_assoc($query)){

$pdf->Cell(60,10,$row['exam_name'],1);
$pdf->Cell(40,10,$row['total_marks'],1);
$pdf->Cell(40,10,$row['percentage'].'%',1);
$pdf->Cell(40,10,$row['grade'],1);

$pdf->Ln();

}

$pdf->Output();

?>
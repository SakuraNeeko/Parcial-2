<?php
require_once '../libs/fpdf/fpdf.php'; 
class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Reporte de Participantes', 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Crear instancia de PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Conectar a la base de datos y obtener datos
include '../config/db.php'; 
include '../models/participante.php'; 
$participanteModel = new Participante($pdo);
$participantes = $participanteModel->getAllParticipantes();

$pdf->Cell(0, 10, 'ID - Nombre - Apellido - Email - Teléfono', 1, 1, 'C');
foreach ($participantes as $participante) {
    $pdf->Cell(30, 10, $participante['participante_id'], 1);
    $pdf->Cell(50, 10, $participante['nombre'], 1);
    $pdf->Cell(50, 10, $participante['apellido'], 1);
    $pdf->Cell(50, 10, $participante['email'], 1);
    $pdf->Cell(40, 10, $participante['telefono'], 1);
    $pdf->Ln();
}

$pdf->Output();
?>

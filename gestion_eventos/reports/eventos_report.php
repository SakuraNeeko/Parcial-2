<?php
require_once '../libs/fpdf/fpdf.php';

class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Reporte de Eventos', 0, 1, 'C');
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
include '../models/evento.php'; 
$eventoModel = new Evento($pdo);
$eventos = $eventoModel->getAllEventos();

$pdf->Cell(0, 10, 'ID - Nombre - Fecha - Ubicacion', 1, 1, 'C');
foreach ($eventos as $evento) {
    $pdf->Cell(40, 10, $evento['evento_id'], 1);
    $pdf->Cell(70, 10, $evento['nombre'], 1);
    $pdf->Cell(40, 10, $evento['fecha'], 1);
    $pdf->Cell(40, 10, $evento['ubicacion'], 1);
    $pdf->Ln();
}

$pdf->Output();
?>

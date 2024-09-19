<?php
require_once '../libs/fpdf/fpdf.php';

// Función para generar el reporte de participantes
function generateParticipantesReport($pdo) {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    
    // Título
    $pdf->SetFillColor(173, 216, 230); // Color pastel (azul claro)
    $pdf->Cell(0, 10, 'Reporte de Participantes', 0, 1, 'C', true);
    
    // Espacio para el título
    $pdf->Ln(10);
    
    // Encabezados de tabla
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetFillColor(240, 248, 255); // Color pastel (azul muy claro)
    $pdf->Cell(30, 10, 'ID', 1, 0, 'C', true);
    $pdf->Cell(50, 10, 'Nombre', 1, 0, 'C', true);
    $pdf->Cell(50, 10, 'Apellido', 1, 0, 'C', true);
    $pdf->Cell(60, 10, 'Email', 1, 1, 'C', true);
    
    // Contenido
    $pdf->SetFont('Arial', '', 12);
    $stmt = $pdo->query("SELECT * FROM participantes");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $pdf->Cell(30, 10, $row['participante_id'], 1);
        $pdf->Cell(50, 10, $row['nombre'], 1);
        $pdf->Cell(50, 10, $row['apellido'], 1);
        $pdf->Cell(60, 10, $row['email'], 1);
        $pdf->Ln();
    }
    
    // Enviar el PDF al navegador
    $pdf->Output('D', 'reporte_participantes.pdf');
}

// Conexión a la base de datos
require_once '../config/db.php';
generateParticipantesReport($pdo);
?>

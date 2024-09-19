<?php
require_once '../libs/fpdf/fpdf.php';

// Función para generar el reporte de eventos
function generateEventosReport($pdo) {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    
    // Título
    $pdf->SetFillColor(255, 182, 193); // Color pastel (rosado claro)
    $pdf->Cell(0, 10, 'Reporte de Eventos', 0, 1, 'C', true);
    
    // Espacio para el título
    $pdf->Ln(10);
    
    // Encabezados de tabla
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetFillColor(255, 228, 225); // Color pastel (rosado muy claro)
    $pdf->Cell(30, 10, 'ID', 1, 0, 'C', true);
    $pdf->Cell(100, 10, 'Nombre', 1, 0, 'C', true);
    $pdf->Cell(60, 10, 'Fecha', 1, 1, 'C', true);
    
    // Contenido
    $pdf->SetFont('Arial', '', 12);
    $stmt = $pdo->query("SELECT * FROM eventos");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $pdf->Cell(30, 10, $row['evento_id'], 1);
        $pdf->Cell(100, 10, $row['nombre'], 1);
        $pdf->Cell(60, 10, $row['fecha'], 1);
        $pdf->Ln();
    }
    
    // Enviar el PDF al navegador
    $pdf->Output('D', 'reporte_eventos.pdf');
}

// Conexión a la base de datos
require_once '../config/db.php';
generateEventosReport($pdo);
?>

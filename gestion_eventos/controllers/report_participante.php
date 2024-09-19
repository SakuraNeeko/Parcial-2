<?php
require_once '../libs/fpdf/fpdf.php';

class PDF_UTF8 extends FPDF {
    function Header() {
        // Configuración del encabezado
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Reporte de Participantes', 0, 1, 'C');
        $this->Ln(10);
    }
}

function generateParticipantesReport($pdo) {
    $pdf = new PDF_UTF8();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 12);

    // Encabezados de tabla
    $pdf->SetFillColor(240, 248, 255); // Color pastel (azul muy claro)
    $pdf->Cell(30, 10, 'ID', 1, 0, 'C', true);
    $pdf->Cell(50, 10, 'Nombre', 1, 0, 'C', true);
    $pdf->Cell(50, 10, 'Apellido', 1, 0, 'C', true);
    $pdf->Cell(60, 10, 'Email', 1, 1, 'C', true);

    // Contenido
    $stmt = $pdo->query("SELECT * FROM participantes");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $pdf->Cell(30, 10, $row['participante_id'], 1);
        $pdf->Cell(50, 10, utf8_decode($row['nombre']), 1);
        $pdf->Cell(50, 10, utf8_decode($row['apellido']), 1);
        $pdf->Cell(60, 10, utf8_decode($row['email']), 1);
        $pdf->Ln();
    }

    // Enviar el PDF al navegador
    $pdf->Output('D', 'reporte_participantes.pdf');
}

// Conexión a la base de datos
require_once '../config/db.php';
generateParticipantesReport($pdo);
?>

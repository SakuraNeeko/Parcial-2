<?php
require_once '../libs/fpdf/fpdf.php';

class PDF_UTF8 extends FPDF {
    function Header() {
        // Configuración del encabezado
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Reporte de Eventos', 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer() {
        // Configuración del pie de página
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Cambiar la orientación a 'L' si es necesario
function generateEventosReport($pdo) {
    $pdf = new PDF_UTF8('L', 'mm', 'A4'); // Orientación en horizontal
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 12);

    // Encabezados de tabla
    $pdf->SetFillColor(255, 228, 225); // Color pastel (rosado muy claro)
    $pdf->Cell(30, 10, 'ID', 1, 0, 'C', true);
    $pdf->Cell(60, 10, 'Nombre', 1, 0, 'C', true);
    $pdf->Cell(40, 10, 'Fecha', 1, 0, 'C', true);
    $pdf->Cell(50, 10, 'Ubicación', 1, 0, 'C', true);
    $pdf->Cell(50, 10, 'Descripción', 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'Estado', 1, 1, 'C', true); // Reducción del ancho del estado

    // Contenido
    $stmt = $pdo->query("SELECT * FROM eventos");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $estado = utf8_decode($row['estado']);
        $pdf->Cell(30, 10, utf8_decode($row['evento_id']), 1, 0, 'C');
        $pdf->Cell(60, 10, utf8_decode($row['nombre']), 1, 0, 'C');
        $pdf->Cell(40, 10, utf8_decode($row['fecha']), 1, 0, 'C');
        $pdf->Cell(50, 10, utf8_decode($row['ubicacion']), 1, 0, 'C');
        $pdf->Cell(50, 10, utf8_decode($row['descripcion']), 1, 0, 'C');
        
        // Asignar color de fondo según el estado
        if ($estado == 'Aun por iniciar') {
            $pdf->SetFillColor(255, 255, 0); // Amarillo
        } elseif ($estado == 'Activo') {
            $pdf->SetFillColor(0, 255, 0); // Verde
        } elseif ($estado == 'Finalizado') {
            $pdf->SetFillColor(255, 0, 0); // Rojo
        } else {
            $pdf->SetFillColor(255, 255, 255); // Blanco para estado desconocido
        }
        $pdf->Cell(30, 10, utf8_decode($estado), 1, 1, 'C', true); // Reducción del ancho del estado
        $pdf->SetFillColor(255, 228, 225); 
    }

    // Enviar el PDF al navegador
    $pdf->Output('D', 'reporte_eventos.pdf');
}

// Conexión a la base de datos
require_once '../config/db.php';
generateEventosReport($pdo);
?>

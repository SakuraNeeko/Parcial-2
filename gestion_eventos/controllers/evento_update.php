<?php
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $ubicacion = $_POST['ubicacion'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado']; 

    $stmt = $pdo->prepare("UPDATE eventos SET nombre = ?, fecha = ?, ubicacion = ?, descripcion = ?, estado = ? WHERE evento_id = ?");
    $stmt->execute([$nombre, $fecha, $ubicacion, $descripcion, $estado, $id]);

    header("Location: ../views/eventos/eventos_index.php");
}
?>

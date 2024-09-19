<?php
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $stmt = $pdo->prepare("INSERT INTO participantes (nombre, apellido, email, telefono) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nombre, $apellido, $email, $telefono]);

    header("Location: ../views/participantes/participantes_index.php");
}
?>

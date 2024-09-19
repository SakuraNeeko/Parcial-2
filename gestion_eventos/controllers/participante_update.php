<?php
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $stmt = $pdo->prepare("UPDATE participantes SET nombre = ?, apellido = ?, email = ?, telefono = ? WHERE participante_id = ?");
    $stmt->execute([$nombre, $apellido, $email, $telefono, $id]);

    header("Location: ../views/participantes/participantes_index.php");
}
?>

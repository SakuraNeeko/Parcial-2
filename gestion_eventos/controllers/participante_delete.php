<?php
include '../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM participantes WHERE participante_id = ?");
    $stmt->execute([$id]);

    header("Location: ../views/participantes/participantes_index.php");
} else {
    echo "ID del participante no especificado.";
}
?>

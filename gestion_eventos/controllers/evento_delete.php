<?php
include '../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM eventos WHERE evento_id = ?");
    $stmt->execute([$id]);

    header("Location: ../views/eventos/eventos_index.php");
} else {
    echo "ID del evento no especificado.";
}
?>

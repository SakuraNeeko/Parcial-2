<?php
class Evento {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllEventos() {
        $stmt = $this->pdo->query("SELECT * FROM eventos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEventoById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM eventos WHERE evento_id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createEvento($nombre, $fecha, $ubicacion, $descripcion, $estado) {
        $stmt = $this->pdo->prepare("INSERT INTO eventos (nombre, fecha, ubicacion, descripcion, estado) VALUES (:nombre, :fecha, :ubicacion, :descripcion, :estado)");
        $stmt->execute(['nombre' => $nombre, 'fecha' => $fecha, 'ubicacion' => $ubicacion, 'descripcion' => $descripcion, 'estado' => $estado]);
    }

    public function updateEvento($id, $nombre, $fecha, $ubicacion, $descripcion, $estado) {
        $stmt = $this->pdo->prepare("UPDATE eventos SET nombre = :nombre, fecha = :fecha, ubicacion = :ubicacion, descripcion = :descripcion, estado = :estado WHERE evento_id = :id");
        $stmt->execute(['nombre' => $nombre, 'fecha' => $fecha, 'ubicacion' => $ubicacion, 'descripcion' => $descripcion, 'estado' => $estado, 'id' => $id]);
    }

    public function deleteEvento($id) {
        $stmt = $this->pdo->prepare("DELETE FROM eventos WHERE evento_id = :id");
        $stmt->execute(['id' => $id]);
    }
}
?>

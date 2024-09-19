<?php
require_once '../config/db.php';
require_once '../models/evento.php';

$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];
$ubicacion = $_POST['ubicacion'];
$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'];

$evento = new Evento($pdo);
$evento->createEvento($nombre, $fecha, $ubicacion, $descripcion, $estado);

header('Location: eventos_index.php');
?>

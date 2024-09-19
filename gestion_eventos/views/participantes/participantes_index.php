<?php
include '../../config/db.php';
include '../../models/participante.php';

$participanteModel = new Participante($pdo);
$participantes = $participanteModel->getAllParticipantes();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participantes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
        }
        .container {
            margin-top: 30px;
        }
        .card {
            background-color: #fff0f5;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #ff9999;
            border-color: #ff9999;
        }
        .btn-primary:hover {
            background-color: #ff8080;
            border-color: #ff8080;
        }
        .btn-back {
        background-color: #fff;
        border: 2px solid #ff9999;
        color: #ff9999;
        border-radius: 20px;
        transition: 0.3s;
    }
    .btn-back:hover {
        background-color: #ff9999;
        color: #fff;
        border-color: #ff8080;
    }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Participantes</h5>
            <a href="participantes_add.php" class="btn btn-primary mb-3">Añadir Participante</a>
            <a href="../index.php" class="btn btn-back mb-3">Volver</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($participantes as $participante): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($participante['participante_id']); ?></td>
                            <td><?php echo htmlspecialchars($participante['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($participante['apellido']); ?></td>
                            <td><?php echo htmlspecialchars($participante['email']); ?></td>
                            <td><?php echo htmlspecialchars($participante['telefono']); ?></td>
                            <td>
                                <a href="participantes_edit.php?id=<?php echo htmlspecialchars($participante['participante_id']); ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="../../controllers/participante_delete.php?id=<?php echo htmlspecialchars($participante['participante_id']); ?>" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

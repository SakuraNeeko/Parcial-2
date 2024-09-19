<?php
include '../../config/db.php';
include '../../models/evento.php';

$eventoModel = new Evento($pdo);
$eventos = $eventoModel->getAllEventos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
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
    .estado-aun-por-iniciar {
        background-color: #ffff99; /* Amarillo */
        color: #000; /* Negro para el texto */
        border-radius: 5px;
        padding: 5px;
        text-align: center;
    }
    .estado-activo {
        background-color: #99ff99; /* Verde */
        color: #000; /* Negro para el texto */
        border-radius: 5px;
        padding: 5px;
        text-align: center;
    }
    .estado-finalizado {
        background-color: #ff9999; /* Rojo */
        color: #000; /* Negro para el texto */
        border-radius: 5px;
        padding: 5px;
        text-align: center;
    }
    .acciones-btns {
        display: flex;
        gap: 5px;
    }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Eventos</h5>
            <a href="eventos_add.php" class="btn btn-primary mb-3">Añadir Evento</a>
            <a href="../index.php" class="btn btn-back mb-3">Volver</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Ubicación</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($eventos as $evento): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($evento['evento_id']); ?></td>
                            <td><?php echo htmlspecialchars($evento['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($evento['fecha']); ?></td>
                            <td><?php echo htmlspecialchars($evento['ubicacion']); ?></td>
                            <td><?php echo htmlspecialchars($evento['descripcion']); ?></td>
                            <td>
                                <?php
                                    $estado = htmlspecialchars($evento['estado']);
                                    $class = '';
                                    if ($estado == 'Aun por iniciar') {
                                        $class = 'estado-aun-por-iniciar';
                                    } elseif ($estado == 'Activo') {
                                        $class = 'estado-activo';
                                    } elseif ($estado == 'Finalizado') {
                                        $class = 'estado-finalizado';
                                    }
                                ?>
                                <span class="<?php echo $class; ?>"><?php echo $estado; ?></span>
                            </td>
                            <td class="acciones-btns">
                                <a href="eventos_edit.php?id=<?php echo htmlspecialchars($evento['evento_id']); ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="../../controllers/evento_delete.php?id=<?php echo htmlspecialchars($evento['evento_id']); ?>" class="btn btn-danger btn-sm">Eliminar</a>
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

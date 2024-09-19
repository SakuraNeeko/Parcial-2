<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://wallpapers-clan.com/wp-content/uploads/2024/03/pink-sunset-anime-girl-desktop-wallpaper-preview.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background-color: rgba(255, 240, 245, 0.8); 
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.3);
            padding: 20px;
            max-width: 500px;
            text-align: center;
        }
        .card-title {
            font-size: 2.5rem; 
            font-weight: bold;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #ff9999;
            border-color: #ff9999;
            margin: 10px;
        }
        .btn-primary:hover {
            background-color: #ff8080;
            border-color: #ff8080;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Bienvenido - Gestión de Eventos Deportivos y Participantes</h5>
            <p>Aquí puedes gestionar eventos y sus participantes.</p>
            <a href="eventos/eventos_index.php" class="btn btn-primary">Ver Eventos</a>
            <a href="participantes/participantes_index.php" class="btn btn-primary">Ver Participantes</a>
            <form action="../controllers/report_evento.php" method="post" class="d-inline">
                <button type="submit" name="generate_report" class="btn btn-primary">Generar Reporte de Eventos</button>
            </form>
            <form action="../controllers/report_participante.php" method="post" class="d-inline">
                <button type="submit" name="generate_report" class="btn btn-primary">Generar Reporte de Participantes</button>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

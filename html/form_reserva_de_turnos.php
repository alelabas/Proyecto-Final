<?php @session_start();?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <title>ServiNow - Formulario de Reserva de Turnos</title>
</head>
<body>
<header>
        <nav class="navegador">
            <a href="vista_usuario.php"><img id="inicio" src="../img/icono.webp" alt="ServiNow" height="80"></a>
            <ul class="lista">
                <li><a href="vista_reservar_turno.php">Reservar Turno</a></li>
                <li><a href="vista_turnos_asignados.php">Turnos Asignados</a></li>
                <li><a href="vista_mis_vehiculos.php">Mis Vehículos</a></li>
                <li><a href="../php/cerrar_sesion.php">Cerrar sesion</a></li>
                <li><a href="vista_perfil.php"><i class="fa-regular fa-user"></i></a></li>
            </ul>
        </nav>
    </header>
    <div class="reserva-container">
        <div class="reserva-card">
            <div class="card-header">
                <h3>Reserva de Turno para Mantenimiento</h3>
            </div>
            <div class="card-body">
                <form action="procesar_reserva.php" method="POST">
                    <div class="form-group">
                        <label for="concesionario">Concesionario</label>
                        <select id="concesionario" name="concesionario" required>
                            <option value="">Seleccione un concesionario</option>
                            <option value="concesionario1">Concesionario Centro</option>
                            <option value="concesionario2">Concesionario Norte</option>
                            <option value="concesionario3">Concesionario Sur</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="fecha">Fecha del Turno</label>
                        <input type="date" id="fecha" name="fecha" required>
                    </div>

                    <div class="form-group">
                        <label for="hora">Hora del Turno</label>
                        <select id="hora" name="hora" required>
                            <option value="">Seleccione una hora</option>
                            <?php
                            for ($i = 8; $i <= 17; $i++) {
                                echo "<option value='$i'>$i:00</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="vehiculo">Vehículo</label>
                        <select id="vehiculo" name="vehiculo" required>
                            <option value="">Seleccione su vehículo</option>
                            <option value="vehiculo1">Toyota Corolla</option>
                            <option value="vehiculo2">Honda Civic</option>
                            <option value="vehiculo3">Ford Focus</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit">Reservar Turno</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 ServiNow. Todos los derechos reservados.</p>
    </footer>
    <script src="https://kit.fontawesome.com/7b8a06bdc2.js" crossorigin="anonymous"></script>
</body>
</html>

<style>
.reserva-container {
    max-width: 800px;
    margin: 50px auto;
    padding: 0 20px;
}

.reserva-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.card-header {
    background: #3498db;
    color: white;
    padding: 20px;
}

.card-header h3 {
    margin: 0;
    font-size: 24px;
}

.card-body {
    padding: 30px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #333;
}

input, select {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 16px;
    color: #333;
}

input:focus, select:focus {
    outline: none;
    border-color: #3498db;
    box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.2);
}

button {
    background: #3498db;
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s;
}

button:hover {
    background: #0056b3;
}
</style>


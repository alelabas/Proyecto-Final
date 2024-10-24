<?php session_start()?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Proyecto%20Final/estilos.css">
    <title>ServiNow - Turnos Asignados</title>
</head>
<body>
    <header>
        <nav class="navegador">
            <a href="http://localhost/Proyecto%20Final/html/vista_usuario.php"><img id="inicio" src="http://localhost/Proyecto%20Final/img/icono.webp" alt="ServiNow" height="80"></a>
            <ul class="lista">
                <li><a href="http://localhost/Proyecto%20Final/html/vista_reservar_turno.php">Reservar Turno</a></li>
                <li><a href="http://localhost/Proyecto%20Final/html/vista_turnos_asignados.php">Turnos Asignados</a></li>
                <li><a href="http://localhost/Proyecto%20Final/html/vista_mis_vehiculos.php">Mis Vehículos</a></li>
                <li><a href="http://localhost/Proyecto%20Final/html/vista_perfil.php"><i class="fa-regular fa-user"></i></a></li>
            </ul>
        </nav>
    </header>
    
    <article class="pag_principal">
        <h1>Turnos Asignados</h1>
        <p>Aquí puedes ver los turnos que has reservado</p>
        
        <section class="turnos-asignados">
            <div class="tarjeta-turno">
                <h3>Servicio de Mantenimiento</h3>
                <p><strong>Fecha:</strong> 15 de Mayo, 2024</p>
                <p><strong>Hora:</strong> 10:00 AM</p>
                <p><strong>Concesionario:</strong> AutoServicio Express</p>
                <p><strong>Vehículo:</strong> Toyota Corolla 2020</p>
                <a href="#" class="boton-cancelar">Cancelar Turno</a>
            </div>
            
            <div class="tarjeta-turno">
                <h3>Cambio de Aceite</h3>
                <p><strong>Fecha:</strong> 22 de Mayo, 2024</p>
                <p><strong>Hora:</strong> 14:30 PM</p>
                <p><strong>Concesionario:</strong> MecánicosPro</p>
                <p><strong>Vehículo:</strong> Ford Focus 2018</p>
                <a href="#" class="boton-cancelar">Cancelar Turno</a>
            </div>
        </section>
    </article>
    
    <footer>
        <p>&copy; 2024 ServiNow. Todos los derechos reservados.</p>
    </footer>
    <script src="https://kit.fontawesome.com/7b8a06bdc2.js" crossorigin="anonymous"></script>
</body>
</html>

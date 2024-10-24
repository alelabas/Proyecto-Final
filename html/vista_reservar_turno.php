<?php session_start()?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Proyecto%20Final/estilos.css">
    <title>ServiNow - Reservar Turno</title>
</head>
<body>
    <header>
        <nav class="navegador">
            <a href="http://localhost/Proyecto%20Final/html/vista_usuario.php"><img id="inicio" src="http://localhost/Proyecto%20Final/img/icono.webp" alt="ServiNow" height="80"></a>
            <ul class="lista">
                <li><a href="#">Reservar Turno</a></li>
                <li><a href="http://localhost/Proyecto%20Final/html/vista_turnos_asignados.php">Turnos Asignados</a></li>
                <li><a href="http://localhost/Proyecto%20Final/html/vista_mis_vehiculos.php">Mis Vehículos</a></li>
                <li><a href="http://localhost/Proyecto%20Final/html/vista_perfil.php"><i class="fa-regular fa-user"></i></a></li>
            </ul>
        </nav>
    </header>
    
    <article class="pag_principal">
        <h1>Reservar Turno</h1>
        <p>Selecciona un concesionario para reservar tu turno</p>
        
        <section class="concesionarios">
            <div class="tarjeta-concesionario">
                <img src="http://localhost/Proyecto%20Final/img/concesionario1.jpg" alt="Concesionario 1">
                <h3>AutoServicio Express</h3>
                <p>Especialistas en mantenimiento rápido y eficiente.</p>
                <a href="#" class="boton-reservar">Reservar Turno</a>
            </div>
            
            <div class="tarjeta-concesionario">
                <img src="http://localhost/Proyecto%20Final/img/concesionario2.jpg" alt="Concesionario 2">
                <h3>MecánicosPro</h3>
                <p>Servicio integral para todas las marcas y modelos.</p>
                <a href="#" class="boton-reservar">Reservar Turno</a>
            </div>
            
            <div class="tarjeta-concesionario">
                <img src="http://localhost/Proyecto%20Final/img/concesionario3.jpg" alt="Concesionario 3">
                <h3>TallerVIP</h3>
                <p>Atención personalizada y servicios premium.</p>
                <a href="#" class="boton-reservar">Reservar Turno</a>
            </div>
        </section>
    </article>
    
    <footer>
        <p>&copy; 2024 ServiNow. Todos los derechos reservados.</p>
    </footer>
    <script src="https://kit.fontawesome.com/7b8a06bdc2.js" crossorigin="anonymous"></script>
</body>
</html>



<?php @session_start()?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <title>ServiNow - Panel de Usuario</title>
</head>
<body>
    <header>
        <nav class="navegador">
            <a href="vista_usuario.php"><img id="inicio" src="../img/icono.webp" alt="ServiNow"  height="80"></a>

            <ul class="lista">
                <li><a href="vista_reservar_turno.php">Reservar Turno</a></li>
                <li><a href="vista_turnos_asignados.php">Turnos Asignados</a></li>
                <li><a href="vista_mis_vehiculos.php">Mis Vehículos</a></li>
                <li><a href="../php/cerrar_sesion.php">Cerrar sesion</a></li>
                <li><a href="vista_perfil.php"><i class="fa-regular fa-user"></i></a></li>
            </ul>
        </nav>
    </header>
    
    <article class="pag_principal">
        <h1>Bienvenido a tu Panel de Usuario</h1>
        
        <section id="reservar-turno" class="servicios">
            <a href="vista_reservar_turno.php">
                <h2>Reservar Turno</h2>
                </a>
                <p>Aquí puedes reservar un nuevo turno para tu vehículo.</p>
                
        </section>
        
        <section id="turnos-asignados" class="servicios">
            <a href="vista_turnos_asignados.php">
                <h2>Turnos Asignados</h2>
                </a>
                <p>Visualiza y gestiona tus turnos asignados.</p>
              
        </section>
        
        <section id="mis-vehiculos" class="servicios">
            <a href="vista_mis_vehiculos.php">
                <h2>Mis Vehículos</h2>
                </a>
                <p>Administra la información de tus vehículos registrados.</p>
              
        </section>

        <section class="servicios">
            <a href="contacto.php"><h2>Contactanos</h2></a>
            <p>¿Tienes alguna pregunta o sugerencia? ¡Estamos aquí para ayudarte!</p>
            <a href="contacto.php">Contactar</a>
        </section>
    </article>
    
    <footer>
        <p>&copy; 2024 ServiNow. Todos los derechos reservados.</p>
    </footer>
    <script src="https://kit.fontawesome.com/7b8a06bdc2.js" crossorigin="anonymous"></script>
</body>
</html>

<?if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Proyecto%20Final/estilos.css">
    <title>ServiNow - Panel de Usuario</title>
</head>
<body>
    <header>
        <nav class="navegador">
            <a href="http://localhost/Proyecto%20Final/html/vista_admin.php"><img id="inicio" src="http://localhost/Proyecto%20Final/img/icono.webp" alt="ServiNow"  height="80"></a>
           <ul class="lista">
               <li><a href="http://localhost/Proyecto%20Final/php/vista_clientes.php">Clientes</a></li>
               <li><a href="http://localhost/Proyecto%20Final/php/vista_concesionarios.php">Concesionarios</a></li>
               <li><a href="http://localhost/Proyecto%20Final/php/salir.php">Cerrar sesion</a></li>
               <li><a href="http://localhost/Proyecto%20Final/html/vista_perfil.php"><i class="fa-regular fa-user"></i></a></li>
               
            </ul>
        </nav>
    </header>
    
    <article class="pag_principal">
        <h1>Bienvenido a tu Panel de Administrador</h1>
        
        <section id="reservar-turno" class="servicios">
            <a href="http://localhost/Proyecto%20Final/php/vista_clientes.php"> <h2>Clientes</h2> </a>
            <p>Visualiza y gestiona el perfil de un cliente.</p>
        </section>
        
        <section id="turnos-asignados" class="servicios">
            <a href="http://localhost/Proyecto%20Final/php/vista_concesionarios.php"> <h2>Concesionarios</h2> </a>
            <p>Visualiza y gestiona los concesionarios.</p>
        </section>
        
       
    </article>
    
    <footer>
        <p>&copy; 2024 ServiNow. Todos los derechos reservados.</p>
    </footer>
    <script src="https://kit.fontawesome.com/7b8a06bdc2.js" crossorigin="anonymous"></script>
</body>
</html>

<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>
<!-- Vista para el admin -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Proyecto%20Final/estilos.css">
    <link rel="stylesheet" href="">
    <title>ServiNow</title>
</head>
<body>
    <header>
        <nav class="navegador">
            <div>
                <a href="http://localhost/Proyecto%20Final/html/vista_admin.php"><img id="inicio" src="http://localhost/Proyecto%20Final/img/icono.webp" alt="ServiNow"  height="80"></a>
            </div>
            <ul class="lista">
               <li><a href="http://localhost/Proyecto%20Final/php/vista_clientes_admin.php">Clientes</a></li>
               <li><a href="http://localhost/Proyecto%20Final/php/vista_concesionarios_admin.php">Concesionarios</a></li>
               <li><a href="http://localhost/Proyecto%20Final/php/cerrar_sesion.php">Cerrar sesion</a></li>
            </ul>        
        </nav>
    </header>
    <main class="contenedor-formulario">
        <h1>Nuevo cliente</h1>
        <form action="http://localhost/Proyecto%20Final/php/registro.php" method="post" class="formulario-login">
            <input type='hidden' name='tipo_usuario' value="ADMIN">    
            <div class="campo-formulario">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="campo-formulario">
                <label for="nombre">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>
            <div class="campo-formulario">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="campo-formulario">
                <label for="usuario">Nombre de usuario:</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <div class="campo-formulario">
                <label for="nombre">Telefono:</label>
                <input type="number" id="telefono" name="telefono" required>
            </div>
            <div class="campo-formulario">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="campo-formulario">
                <label for="confirmar-password">Confirmar contraseña:</label>
                <input type="password" id="confirmar-password" name="confirmar-password" required>
            </div>
            <button type="submit" class="boton-submit">Registrar</button>
        
        </form>
    </main>
    <footer>
        <p>&copy; 2024 ServiNow. Todos los derechos reservados.</p>
    </footer>
    <script src="https://kit.fontawesome.com/7b8a06bdc2.js" crossorigin="anonymous"></script>
</body>
</html>
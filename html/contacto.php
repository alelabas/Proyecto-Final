<?php session_start()?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilos.css">
        <title>ServiNow - Reservar Turno</title>
    </head>
    <body>
        
        <header>
            <nav class="navegador">
                <a href="html/vista_usuario.php"><img id="inicio" src="img/icono.webp" alt="ServiNow" height="80"></a>
                <ul class="lista">
                    <li><a href="#">Reservar Turno</a></li>
                    <li><a href="html/vista_turnos_asignados.php">Turnos Asignados</a></li>
                    <li><a href="../html/vista_mis_vehiculos.php">Mis Vehículos</a></li>
                    <li><a href="../php/salir.php">Cerrar sesion</a></li>
                    <li><a href="../html/vista_perfil.php"><i class="fa-regular fa-user"></i></a></li>
                </ul>
            </nav>
        </header>

        <main class="contenedor-formulario" style="width: 50%; margin: auto;">
            <h1>Contacto</h1>
            <form action="../php/enviar_contacto.php" method="post" class="formulario-login">
                <div class="campo-formulario">
                    <label for="correo">Correo Electronico:</label>
                    <input type="text" id="correo" name="correo" value="<?php echo  $_SESSION['correo']; ?>" required readonly>
                </div>
                <div class="campo-formulario">
                    <label for="titulo">Titulo:</label>
                    <input type="text" id="titulo" name="titulo" required>
                </div>
                <div class="campo-formulario">
                    <label for="mensaje">Mensaje</label>
                    <textarea name="mensaje" id="mensaje" rows="15" column="10" style="font-size: 20px;"></textarea>
                </div>
                <button type="submit" class="boton-submit">Enviar</button>
            </form>
        </main>
    </body>



    <footer>
        <p>&copy; 2024 ServiNow. Todos los derechos reservados.</p>
    </footer>

    <script src="https://kit.fontawesome.com/7b8a06bdc2.js" crossorigin="anonymous"></script>
</html>
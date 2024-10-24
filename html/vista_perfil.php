<?php @session_start()?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Proyecto%20Final/estilos.css">
    <title>ServiNow - Perfil de Usuario</title>
</head>
<body>
    <header>
        <nav class="navegador">
            <a href="http://localhost/Proyecto%20Final/html/vista_usuario.php"><img id="inicio" src="http://localhost/Proyecto%20Final/img/icono.webp" alt="ServiNow" height="80"></a>
            <ul class="lista">
                <li><a href="http://localhost/Proyecto%20Final/html/vista_reservar_turno.php">Reservar Turno</a></li>
                <li><a href="http://localhost/Proyecto%20Final/html/vista_turnos_asignados.php">Turnos Asignados</a></li>
                <li><a href="http://localhost/Proyecto%20Final/html/vista_mis_vehiculos.php">Mis Vehículos</a></li>
                <li><a href="http://localhost/Proyecto%20Final/php/salir.php">Cerrar sesion</a></li>
                <li><a href="#"><i class="fa-regular fa-user"></i></a></li>
            </ul>
        </nav>
    </header>
    
    <article class="pag_principal">
        <h1>Perfil de Usuario</h1>
        <p>Aquí puedes personalizar tu información de perfil</p>
        <?php 
        include("C:\\xampp\htdocs\Proyecto Final\php\conexion.php");
        $usuario = $_SESSION['usuario'];
        $contraseña = $_SESSION['contraseña'];
        $consulta = mysqli_query($conexion, "SELECT NOMBRES, APELLIDOS, CORREO_ELECTRONICO, TELEFONO FROM CLIENTE WHERE USUARIO = '$usuario' AND CONTRASEÑA ='$contraseña'");
        $resultado = mysqli_fetch_array($consulta);
        ?>
        
        <section class="perfil-usuario">
            <form class="formulario-perfil" action="http://localhost/Proyecto%20Final/php/modificar_perfil.php" method="post">
                <div class="campo-formulario">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $resultado['NOMBRES']?>">
                </div>
                
                <div class="campo-formulario">
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" value="<?php echo $resultado['APELLIDOS']?>">
                </div>
                
                <div class="campo-formulario">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" id="email" name="email" value="<?php echo $resultado['CORREO_ELECTRONICO']?>">
                </div>
                
                <div class="campo-formulario">
                    <label for="direccion">Telefono:</label>
                    <input type="number" id="telefono" name="telefono" value="<?php echo $resultado['TELEFONO']?>">
                </div>
                
                <button type="submit" class="boton-guardar">Guardar Cambios</button>
            </form>
        </section>
    </article>
    
    <footer>
        <p>&copy; 2024 ServiNow. Todos los derechos reservados.</p>
    </footer>
    <script src="https://kit.fontawesome.com/7b8a06bdc2.js" crossorigin="anonymous"></script>
</body>
</html>
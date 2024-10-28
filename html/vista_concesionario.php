<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>
<!-- VISTA PARA EL ADMIN DE UN CONCESIONARIO ESPECIFICO Y SUS DATOS-->
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
                <a href="http://localhost/Proyecto%20Final/vista_admin.php"><img id="inicio" src="http://localhost/Proyecto%20Final/img/icono.webp" alt="ServiNow" height="80"></a>
            </div>
            <ul class="lista">
               <li><a href="http://localhost/Proyecto%20Final/php/vista_clientes.php">Clientes</a></li>
               <li><a href="http://localhost/Proyecto%20Final/php/vista_concesionarios.php">Concesionarios</a></li>
               <li><a href="http://localhost/Proyecto%20Final/php/vista_turnos.php">Turnos</a></li>
               <li><a href="http://localhost/Proyecto%20Final/php/salir.php">Cerrar sesion</a></li>
               <li><a href="http://localhost/Proyecto%20Final/html/vista_perfil.php"><i class="fa-regular fa-user"></i></a></li>
            </ul>
        </nav>
    </header>
    <article class="pag_principal">
        <h1>Concesionario</h1>
        <p>Aquí puedes modificar la informacion del concesionario</p>
        <?php 
        include("C:\\xampp\htdocs\Proyecto Final\php\conexion.php");
        // de la vista de todos los concesionarios cuando se seleccione el boton modificar (o similar) que guarde el codigo en una variable de sesion.
        // $codigo = $_SESSION['codigo'];
        // sujeto a modificacion si la contraseña se guarda en la tabla concesionario.
        $consulta = mysqli_query($conexion, "SELECT * FROM CONCESIONARIO");
        $resultado = mysqli_fetch_array($consulta);
        ?>
        <section class="perfil-usuario">
            <form class="formulario-perfil" action="http://localhost/Proyecto%20Final/php/modificar_concesionario.php" method="post">
                <div class="campo-formulario">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $resultado['NOMBRE']?>">
                </div>
                
                <div class="campo-formulario">
                    <label for="direccion">Direccion:</label>
                    <input type="text" id="direccion" name="direccion" value="<?php echo $resultado['DIRECCION']?>">
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
</body>
</html>
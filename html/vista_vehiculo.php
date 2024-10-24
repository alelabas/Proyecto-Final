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
        <h1>Vehiculo</h1>
        <p>Aquí puedes modificar la informacion del vehiculo</p>
        <?php 
        include("C:\\xampp\htdocs\Proyecto Final\php\conexion.php");
        $patente = $_POST['patente'];
        $consulta = mysqli_query($conexion, "SELECT * FROM VEHICULO WHERE PATENTE = '$patente'");
        $resultado = mysqli_fetch_array($consulta);
        ?>
        <section class="perfil-usuario">
            <form class="formulario-perfil" action="http://localhost/Proyecto%20Final/php/modificar_vehiculo.php" method="post">
                <input type='hidden' name='patente' value="<?php echo $resultado['PATENTE']?>">
                <div class="campo-formulario">
                    <label for="marca">Marca:</label>
                    <input type="text" id="marca" name="marca" value="<?php echo $resultado['MARCA']?>">
                </div>
                <div class="campo-formulario">
                    <label for="modelo">Modelo:</label>
                    <input type="text" id="modelo" name="modelo" value="<?php echo $resultado['MODELO']?>">
                </div>
                 <div class="campo-formulario">
                    <label for="patente_new">Patente:</label>
                    <input type="text" id="patente_new" name="patente_new" value="<?php echo $resultado['PATENTE']?>">
                </div>
                <div class="campo-formulario">
                    <label for="anio">Año:</label>
                    <input type="text" id="anio" name="anio" value="<?php echo $resultado['ANIO']?>">
                </div>
                <button type="submit" name="accion" value="modificar" class="boton-guardar">Guardar Cambios</button>
                <button type="submit" name="accion" value="borrar" class="boton-guardar">Borrar vehiculo</button>

            </form>
        </section>
    </article>
    <footer>
        <p>&copy; 2024 ServiNow. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
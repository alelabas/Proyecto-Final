<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="">
    <title>ServiNow</title>
</head>
<body>
    <header>
        <nav class="navegador">
            <div>
                <a href="../vista_admin.php"><img id="inicio" src="../img/icono.webp" alt="ServiNow" height="80"></a>
            </div>
            <ul class="lista">
               <li><a href="../php/vista_clientes_admin.php">Clientes</a></li>
               <li><a href="../php/vista_concesionarios_admin.php">Concesionarios</a></li>
               <li><a href="../php/cerrar_sesion.php">Cerrar sesion</a></li>
            </ul>
        </nav>
    </header>
    <article class="pag_principal">
        <h1>Concesionario</h1>
        <p>Aquí puedes modificar la informacion del concesionario</p>
        <?php 
        include("C:\\xampp\htdocs\Proyecto Final\php\conexion.php");
        $codigo = $_POST['codigo'];
        $consulta = mysqli_query($conexion, "SELECT * FROM CLIENTE WHERE CODIGO_CLIENTE = '$codigo'");
        $resultado = mysqli_fetch_array($consulta);
        ?>
        <section class="perfil-usuario">
            <form class="formulario-perfil" action="../php/modificar_cliente.php" method="post">
                <input type='hidden' name='codigo' value="<?php echo $resultado['CODIGO_CLIENTE']?>" >
                <div class="campo-formulario">
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" value="<?php echo $resultado['USUARIO']?>" required>
                </div>
                <div class="campo-formulario">
                    <label for="nombres">Nombres:</label>
                    <input type="text" id="nombres" name="nombres" value="<?php echo $resultado['NOMBRES']?>" required>
                </div>
                 <div class="campo-formulario">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" value="<?php echo $resultado['APELLIDOS']?>" required>
                </div>
                <div class="campo-formulario">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" id="email" name="email" value="<?php echo $resultado['CORREO_ELECTRONICO']?>" required>
                </div>
                <div class="campo-formulario">
                    <label for="direccion">Telefono:</label>
                    <input type="number" id="telefono" name="telefono" value="<?php echo $resultado['TELEFONO']?>" required>
                </div>
                <div class="campo-formulario">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" value="<?php echo $resultado['CONTRASEÑA']?>" required>
                </div>
                <button type="submit" name="accion" value="modificar" class="boton-guardar">Guardar Cambios</button>
                <button type="submit" name="accion" value="borrar" class="boton-guardar">Borrar Perfil</button>
            </form>
        </section>
    </article>
    <footer>
        <p>&copy; 2024 ServiNow. Todos los derechos reservados.</p>
    </footer>
    <script src="https://kit.fontawesome.com/7b8a06bdc2.js" crossorigin="anonymous"></script>
</body>
</html>
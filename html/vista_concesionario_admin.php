<?php @session_start();?>
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
                <a href="../html/vista_admin.php"><img id="inicio" src="../img/icono.webp" alt="ServiNow" height="80"></a>
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
        include("..\php\conexion.php");
        $codigo = $_SESSION['id_sesion'];
        $consulta = mysqli_query($conexion, "SELECT * FROM CONCESIONARIO WHERE CODIGO_CONCESIONARIO = '$codigo'");
        $resultado = mysqli_fetch_assoc($consulta);

        ?>
        <section class="perfil-usuario">
            <form class="formulario-perfil" action="../php/modificar_concesionario.php" method="post">
                <input type='hidden' name='codigo' value="<?php echo $codigo?>">
                <div class="campo-formulario">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $resultado['NOMBRE']?>" required>
                </div>
                
                <div class="campo-formulario">
                    <label for="direccion">Direccion:</label>
                    <input type="text" id="direccion" name="direccion" value="<?php echo $resultado['DIRECCION']?>" required>
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
                    <label for="opciones">Selecciona un usuario para administrar el concesionario:</label>
                    <select id="opciones" name="usuario" required>
                        <?php 
                        $consulta = mysqli_query($conexion, "SELECT * FROM CLIENTE ");
                        echo "<option value= NULL >Sin asignar</option>";
                        while($fila = mysqli_fetch_array($consulta)) {
                            if($resultado['CODIGO_USUARIO']==$fila['CODIGO_CLIENTE']){
                                echo "<option value='".$fila['CODIGO_CLIENTE']."' selected>".$fila['USUARIO']." </option>";
                            }
                            else{
                                echo "<option value='".$fila['CODIGO_CLIENTE']."'>".$fila['USUARIO']." </option>";
                            }
                        }
                        
                        ?>
                    </select>
                </div>
                <button type="submit" name="accion" value="modificar" class="boton-guardar">Guardar Cambios</button>            
            </form>
            <form class="" action="../php/modificar_concesionario.php" method="post">
                <button type="submit" name="accion" value="borrar" class="boton-guardar">Borrar Concesionario</button>
                <input type='hidden' name='codigo' value="<?php echo $codigo?>">
            </form>
        </section>
    </article>
    <footer>
        <p>&copy; 2024 ServiNow. Todos los derechos reservados.</p>
    </footer>
    <script src="https://kit.fontawesome.com/7b8a06bdc2.js" crossorigin="anonymous"></script>
</body>
</html>
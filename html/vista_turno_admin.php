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
        <h1>Turno de <?php  
            echo $_POST['nombre'] ?></h1>
        <p>Aquí puedes modificar la informacion del turno</p>
        <?php 
        include("C:\\xampp\htdocs\Proyecto Final\php\conexion.php");
        $codigo = $_POST['codigo'];
        $consulta = mysqli_query($conexion, "SELECT * FROM TURNO WHERE CODIGO_TURNO = '$codigo'");
        $resultado = mysqli_fetch_array($consulta);



        ?>
        <section class="perfil-usuario">
            <form class="formulario-perfil" action="../php/modificar_turno.php" method="post">
                <input type='hidden' name='codigo' value="<?php echo $codigo?>">
                <div class="campo-formulario">
                <label for="opciones">Selecciona un mantenimiento:</label>
                <select id="opciones" name="mantenimiento" required>
                    <?php 
                    $consulta2 = mysqli_query($conexion, "SELECT * FROM MANTENIMIENTO ");
                    while($fila = mysqli_fetch_array($consulta2)) {
                        if($resultado['MANT_CODIGO_SERVICIO']=$fila['CODIGO_SERVICIO']){
                            echo "<option value='".$fila['CODIGO_SERVICIO']."' selected >".$fila['DESCRIPCION']."</option>";
                        }
                        else{
                            echo "<option value='".$fila['CODIGO_SERVICIO']."' >".$fila['DESCRIPCION']."</option>";
                        }
                    
                    }
                    ?>
                </select>
                </div>
                <div class="campo-formulario">
                <label for="opciones2">Selecciona un vehiculo:</label>
                <select id="opciones2" name="patente" required>
                    <?php 
                    $consulta2 = mysqli_query($conexion, "SELECT * FROM VEHICULO ");
                    echo "<option value= NULL selected >Sin asignar</option>";
                    while($fila = mysqli_fetch_array($consulta2)) {
                        if($resultado['PATENTE_VEHICULO']==$fila['PATENTE']){
                            echo "<option value='".$fila['PATENTE']."' selected >".$fila['MARCA']." ".$fila['MODELO']." ".$fila['ANIO']." ".$fila['PATENTE']."</option>";
                        }
                        else{
                            echo "<option value='".$fila['PATENTE']."' >".$fila['MARCA']." ".$fila['MODELO']." ".$fila['ANIO']." ".$fila['PATENTE']."</option>";
                        }
                    }
                    
                    ?>
                </select>
                </div>
                <div class="campo-formulario">
                    <label for="fecha">Ingrese una fecha:</label>
                    <input type="date" id="fecha" name="fecha" value="<?php echo $resultado['FECHA_TURNO']?>" required>
                </div>
                <div class="campo-formulario">
                    <label for="hora">Ingrese un horario:</label>
                    <input type="text" id="hora" name="hora" value="<?php echo $resultado['HORA_TURNO']?>" required>
                </div>

                <button type="submit" name="accion" value="modificar" class="boton-guardar">Guardar Cambios</button>
                <button type="submit" name="accion" value="borrar" class="boton-guardar">Borrar Turno</button>

            </form>
        </section>
    </article>
    <footer>
        <p>&copy; 2024 ServiNow. Todos los derechos reservados.</p>
    </footer>
    <script src="https://kit.fontawesome.com/7b8a06bdc2.js" crossorigin="anonymous"></script>
</body>
</html>
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
        <?php 
        include("../php/conexion.php");
        $codigo = $_POST['codigo'];
        $consulta = mysqli_query($conexion, "SELECT * FROM TURNO WHERE CODIGO_TURNO = '$codigo'");
        $resultado = mysqli_fetch_array($consulta);
        $codigo_conce = $resultado['CONCESIONARIO_CODIGO'];
        $consulta1 = mysqli_query($conexion, "SELECT * FROM CONCESIONARIO WHERE CODIGO_CONCESIONARIO = '$codigo_conce'");
        $resultado1 = mysqli_fetch_array($consulta1);

        $nombre_concesionario = $resultado1['NOMBRE'];

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
                    ?>
                    <div class="form-group">
                        <label for="Mantenimiento">Mantenimiento</label>
                        <select type="text" id="mantenimiento" name="mantenimiento" required>
                            <option value="">Seleccione el mantenimiento deseado</option>
                            <?php 
                            $consulta = mysqli_query($conexion, "SELECT * FROM mantenimiento");
                            while ($row = mysqli_fetch_assoc($consulta)) {
                                if($row['CODIGO_SERVICIO'] == $resultado['MANT_CODIGO_SERVICIO']){
                                    echo "<option value='".$row['DESCRIPCION']."'selected>".$row['DESCRIPCION']."</option>";
                                }
                                else{
                                    echo "<option value='".$row['DESCRIPCION']."'>".$row['DESCRIPCION']."</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="fecha">Fecha del Turno</label>
                        <input type="date" id="fecha" name="fecha" value= "<?php echo $resultado['FECHA_TURNO']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="hora">Hora del Turno</label>
                        <select type="text" id="hora" name="hora" required>
                            <option value="">Seleccione una hora</option>
                            <?php
                            for ($i = 8; $i <= 17; $i++) {
                                if($resultado['HORA_TURNO'] == $i . ':00' ){
                                    echo "<option value='$i:00'selected>$i:00</option>";
                                    echo "<option value='$i:30'>$i:30</option>";
                                }
                                else if($resultado['HORA_TURNO'] == $i . ':30' ){
                                    echo "<option value='$i:00'>$i:00</option>";
                                    echo "<option value='$i:30'selected >$i:30</option>";
                                }
                                else{
                                    echo "<option value='$i:00'>$i:00</option>";
                                    echo "<option value='$i:30'>$i:30</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="vehiculo">Vehículo</label>
                        <select type="text" id="vehiculo" name="vehiculo" required>
                        <?php 
                            if($_SESSION['tipo_usuario'] == 'USUARIO'){
                                $consulta = mysqli_query($conexion, "SELECT * FROM vehiculo WHERE CODIGO_PROPIETARIO = '".$_SESSION['id_sesion']."'");
                            }
                            else{
                                $consulta = mysqli_query($conexion, "SELECT * FROM vehiculo ");
                            }
                            
                            while ($row = mysqli_fetch_assoc($consulta)) {
                                if($row['PATENTE'] ==$resultado['VEHICULO_PATENTE'] ){
                                    echo "<option value='".$row['PATENTE']."' selected>".'['.$row['PATENTE'].']'." - ".$row['MARCA']." ".$row['MODELO']."</option>";
                                }
                                else{
                                    echo "<option value='".$row['PATENTE']."'>".'['.$row['PATENTE'].']'." - ".$row['MARCA']." ".$row['MODELO']."</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit">Modificar</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    </article>
    <footer>
        <p>&copy; 2024 ServiNow. Todos los derechos reservados.</p>
    </footer>
    <script src="https://kit.fontawesome.com/7b8a06bdc2.js" crossorigin="anonymous"></script>
   
</body>
</html>
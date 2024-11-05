<?if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <title>ServiNow - Turnos Asignados</title>
</head>
<body>
    <header>
        <nav class="navegador">
            <a href="../html/vista_admin.php"><img id="inicio" src="../img/icono.webp" alt="ServiNow" height="80"></a>
            <ul class="lista">
               <li><a href="vista_clientes_admin.php">Clientes</a></li>
               <li><a href="vista_concesionarios_admin.php">Concesionarios</a></li>
               <li><a href="cerrar_sesion.php">Cerrar sesion</a></li>
            </ul>
        </nav>
    </header>
    
    <article class="pag_principal">
        <h1>Concesionarios</h1>
        <section class="concesionarios">   
            <?php
            $i = 0;
            include("conexion.php");
            $consulta = mysqli_query($conexion, "SELECT * FROM CONCESIONARIO ");
            $resultado = mysqli_num_rows($consulta);
            if ($resultado != 0) {
                while($fila = mysqli_fetch_array($consulta)) {
                    $_SESSION['codigo'] = $fila['CODIGO_CONCESIONARIO'];
                    echo "<div class='tarjeta-concesionario'>";
                    echo "'<img src='http://localhost/Proyecto%20Final/img/concesionario1.jpg' alt='Concesionario 1'>";
                    echo "<h3>" . $fila['NOMBRE'] . "</h3>";
                    echo "<p><strong>Direccion:</strong> " . $fila['DIRECCION'] . "</p>";
                    echo "<p><strong>Correo Electronico:</strong> " . $fila['CORREO_ELECTRONICO'] . "</p>";
                    echo "<p><strong>Telefono:</strong> " . $fila['TELEFONO'] . "</p>";
                    $consulta2 = mysqli_query($conexion, "SELECT * FROM CLIENTE where CODIGO_CLIENTE = " .$fila['CODIGO_USUARIO'] );
                    $resultado1 = mysqli_num_rows($consulta);
                    if($resultado1 != 0){
                    $fila1 = mysqli_fetch_array($consulta2);
                    
                    echo "<form action='vista_turnos_admin.php' method='POST'>";
                    echo "<div class='campo-formulario'> ";
                    echo "<input type='hidden' name='codigo' value='" . $fila['CODIGO_CONCESIONARIO'] . "'>";
                    echo "<input type='hidden' name='nombre' value='" . $fila['NOMBRE'] . "'>";
                    echo "<button type='submit' class='boton-reservar'>Ver turnos</button>";
                    echo "</div>";
                    echo "</form>";

                    echo "<form action='../html/vista_concesionario_admin.php' method='POST'>";
                    echo "<div class='campo-formulario'> ";
                    echo "<input type='hidden' name='codigo' value='" . $fila['CODIGO_CONCESIONARIO'] . "'>";
                    echo "<input type='hidden' name='nombre' value='" . $fila['NOMBRE'] . "'>";
                    echo "<button type='submit' class='boton-reservar'>Modificar concesionario</button>";
                    echo "</div>";
                    echo "</form>";
                    
                    echo "</div>";
                } 
            }
            else {
                echo "0 resultados";
            }
        ?>
        <div class="tarjeta-vehiculo nuevo-vehiculo">
                <i class="fa-solid fa-plus"></i>
                <h3>Agregar Nuevo Concesionario</h3>
                <a href="../html/vista_cargar_concesionario_admin.php" class="boton-agregar">Agregar</a>
        </div>
        <section>
    </article>
    
    <footer>
        <p>&copy; 2024 ServiNow. Todos los derechos reservados.</p>
    </footer>
    <script src="https://kit.fontawesome.com/7b8a06bdc2.js" crossorigin="anonymous"></script>
</body>
</html>

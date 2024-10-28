<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>
<!-- VISTA DEL ADMIN -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Proyecto%20Final/estilos.css">
    <title>ServiNow - Mis Vehículos</title>
</head>
<body>
    <header>
        <nav class="navegador">
            <a href="http://localhost/Proyecto%20Final/html/vista_admin.php"><img id="inicio" src="http://localhost/Proyecto%20Final/img/icono.webp" alt="ServiNow"  height="80"></a>
            <ul class="lista">
               <li><a href="http://localhost/Proyecto%20Final/php/vista_clientes.php">Clientes</a></li>
               <li><a href="http://localhost/Proyecto%20Final/php/vista_concesionarios.php">Concesionarios</a></li>
               <li><a href="http://localhost/Proyecto%20Final/php/salir.php">Cerrar sesion</a></li>
               <li><a href="http://localhost/Proyecto%20Final/html/vista_perfil.php"><i class="fa-regular fa-user"></i></a></li>
            </ul>
        </nav>
    </header>
    
    <article class="pag_principal">
        <h1>Vehículos de 
            <?php  
            echo $_POST['usuario'] ?>
        </h1>
        <p>Aquí puedes ver y gestionar los vehículos registrados</p>
        
        <section class="vehiculos">
            <?php
                $i = 0;
                $codigo = $_POST['codigo'];
                include("conexion.php");
                $consulta = mysqli_query($conexion, "SELECT * FROM VEHICULO WHERE CODIGO_PROPIETARIO = '$codigo' ");
                $resultado = mysqli_num_rows($consulta);
                if ($resultado != 0) {
                    while($fila = mysqli_fetch_array($consulta)) {
                        echo "<div class='tarjeta-concesionario'>";
                        echo "<h3>" . $fila['MARCA'] . ' ' . $fila['MODELO'] . "</h3>";
                        echo "<p><strong>Año:</strong> " . $fila['ANIO'] . "</p>";
                        echo "<p><strong>Patente:</strong> " . $fila['PATENTE'] . "</p>";
                        
                        echo "<form action='http://localhost/Proyecto%20Final/html/vista_vehiculo.php' method='POST'>";
                        echo "<input type='hidden' name='patente' value='" . $fila['PATENTE'] . "'>";
                        echo "<button type='submit' class='boton-reservar'>Modificar vehiculo</button>";
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
                <h3>Agregar Nuevo Vehiculo</h3>
                <form action='http://localhost/Proyecto%20Final/html/vista_cargar_vehiculo.php' method='POST'>
                        <input type='hidden' name='codigo' value="<?php echo $codigo?>">
                        <button type='submit' class='boton-agregar'>Agregar</button>
                </form>
        </div>
        </section>
    </article>
    
    <footer>
        <p>&copy; 2024 ServiNow. Todos los derechos reservados.</p>
    </footer>
    <script src="https://kit.fontawesome.com/7b8a06bdc2.js" crossorigin="anonymous"></script>
</body>
</html>
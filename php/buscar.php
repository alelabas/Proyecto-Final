<!doctype html>
<html>
    <head>
    </head>
    <title>Registro</title>

    <body>
        <?php
        include("conexion.php");
            $buscar = isset($_GET['buscar']) ? $conexion->real_escape_string($_GET['buscar']) : '';

// Crear la consulta SQL con el filtro
$sql = "SELECT * FROM cliente WHERE 
        nombres LIKE '$buscar%' OR 
        apellidos LIKE '$buscar%' OR
        usuario LIKE '$buscar%' OR
        correo_electronico LIKE '$buscar%' OR 
        telefono LIKE '$buscar%'";

$resultado = $conexion->query($sql);

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
                    echo "<div class='tarjeta-concesionario'>";
                    echo "<h3>" . $fila['USUARIO'] . "</h3>";
                    echo "<p><strong>Nombres:</strong> " . $fila['NOMBRES'] . "</p>";
                    echo "<p><strong>Apellidos:</strong> " . $fila['APELLIDOS'] . "</p>";
                    echo "<p><strong>Correo Electronico:</strong> " . $fila['CORREO_ELECTRONICO'] . "</p>";
                    echo "<p><strong>Telefono:</strong> " . $fila['TELEFONO'] . "</p>";

                    echo "<form action='http://localhost/Proyecto%20Final/php/vista_vehiculos.php' method='POST'>";
                    echo "<div class='campo-formulario'> ";
                    echo "<input type='hidden' name='codigo' value='" . $fila['CODIGO_CLIENTE'] . "'>";
                    echo "<input type='hidden' name='usuario' value='" . $fila['USUARIO'] . "'>";
                    echo "<button type='submit' class='boton-reservar'>Ver vehiculos</button>";
                    echo "</div> </form> ";

                    echo " <form action='http://localhost/Proyecto%20Final/html/vista_cliente.php' method='POST'>";
                    echo "<div class='campo-formulario'> ";
                    echo "<input type='hidden' name='codigo' value='" . $fila['CODIGO_CLIENTE'] . "'>";
                    echo "<button type='submit' class='boton-reservar'>Modificar cliente</button>";
                    echo "</div> </form> ";
                    echo "</div>";

                } 
                echo"<div class='tarjeta-vehiculo nuevo-vehiculo'>";
                echo"<i class='fa-solid fa-plus'></i>";
                echo"<h3>Agregar Nuevo Cliente</h3>";
                echo"<a href='http://localhost/Proyecto%20Final/html/vista_cargar_cliente.php' class='boton-agregar'>Agregar</a>";
                echo"</div>";
    /*echo "<table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
            </tr>";

    // Mostrar los resultados en una tabla
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>{$fila['id']}</td>
                <td>{$fila['nombre']}</td>
                <td>{$fila['email']}</td>
                <td>{$fila['telefono']}</td>
              </tr>";
    }
    echo "</table>";*/
}

else {
    echo "<p>No se encontraron resultados para '$buscar'.</p>";
}
        ?>
    </body>
</html>
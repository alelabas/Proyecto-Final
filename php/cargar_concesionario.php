<!doctype html>
<html>
    <head>
    </head>
    <title>Cargar concesionario</title>

    <body>
        <?php

            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $contraseña = $_POST['password'];

            include("conexion.php");
            // Se omitio de momento la contraseña ya que no esta definido donde guardarla.
            $consulta = mysqli_query($conexion, "INSERT INTO CONCESIONARIO (NOMBRE, DIRECCION, TELEFONO, CORREO_ELECTRONICO) VALUES ('$nombre', '$direccion', '$telefono', '$email')");
            header("Location:http://localhost/Proyecto%20Final/php/vista_concesionarios_admin.php");
        ?>
    </body>
</html>
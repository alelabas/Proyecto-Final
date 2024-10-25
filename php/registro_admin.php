<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>
<!doctype html>
<html>
    <head>
    </head>
    <title>Registro</title>

    <body>
        <?php

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $usuario = $_POST['usuario'];
            $telefono = $_POST['telefono'];
            $contraseña = $_POST['password'];

            include("conexion.php");

            $consulta = mysqli_query($conexion, "INSERT INTO CLIENTE (NOMBRES, APELLIDOS, CORREO_ELECTRONICO, USUARIO, CONTRASEÑA, TELEFONO) VALUES ('$nombre', '$apellido', '$email', '$usuario', '$contraseña', '$telefono')");

            header("Location:http://localhost/Proyecto%20Final/php/vista_clientes.php");
        ?>
    </body>
</html>
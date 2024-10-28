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

            $_SESSION['usuario'] = $usuario;
            $consulta = mysqli_query($conexion, "INSERT INTO CLIENTE (NOMBRES, APELLIDOS, CORREO_ELECTRONICO, USUARIO, CONTRASEÑA, TELEFONO, TIPO_CLIENTE) VALUES ('$nombre', '$apellido', '$email', '$usuario', '$contraseña', '$telefono', 'USUARIO')");

            header("Location:http://localhost/Proyecto%20Final/html/vista_iniciar_sesion.html");
        ?>
    </body>
</html>
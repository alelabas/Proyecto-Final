<?php @session_start();?>

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
            if($_POST['tipo_usuario'] == 'concesionario'){
                $consulta = mysqli_query($conexion, "INSERT INTO CLIENTE (NOMBRES, APELLIDOS, CORREO_ELECTRONICO, USUARIO, CONTRASEÑA, TELEFONO, TIPO_CLIENTE) VALUES ('$nombre', '$apellido', '$email', '$usuario', '$contraseña', '$telefono', 'CONCESIONARIO')");
            }
            else if($_POST['tipo_usuario'] == 'admin'){
                $consulta = mysqli_query($conexion, "INSERT INTO CLIENTE (NOMBRES, APELLIDOS, CORREO_ELECTRONICO, USUARIO, CONTRASEÑA, TELEFONO, TIPO_CLIENTE) VALUES ('$nombre', '$apellido', '$email', '$usuario', '$contraseña', '$telefono', 'ADMIN')");
            }
            else{
                $consulta = mysqli_query($conexion, "INSERT INTO CLIENTE (NOMBRES, APELLIDOS, CORREO_ELECTRONICO, USUARIO, CONTRASEÑA, TELEFONO, TIPO_CLIENTE) VALUES ('$nombre', '$apellido', '$email', '$usuario', '$contraseña', '$telefono', 'USUARIO')");
            }
            if($_SESSION['tipo_usuario'] == 'ADMIN'){
                header("Location:../php/vista_clientes_admin.php");
            }
            else{
                header("Location:../html/vista_iniciar_sesion.html");
            }
        ?>
    </body>
</html>
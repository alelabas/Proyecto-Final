<?php session_start()?>
<!doctype html>
<html>
    <head>
        <title>Login de usuarios</title>
    </head>
    
    <body>
    
        <?php

            $usuario = $_POST['usuario'];
            $contraseña = $_POST['password'];

            include("conexion.php");

            $consulta = mysqli_query($conexion, "SELECT NOMBRES, APELLIDOS, CORREO_ELECTRONICO, TELEFONO FROM CLIENTE WHERE USUARIO = '$usuario' AND CONTRASEÑA ='$contraseña'");
            $resultado = mysqli_num_rows($consulta);

            if ($resultado != 0)
            {
                $respuesta = mysqli_fetch_array($consulta);

                $_SESSION['nombre'] = $respuesta['NOMBRES'];
                $_SESSION['apellido'] = $respuesta['APELLIDOS'];
                $_SESSION['correo'] = $respuesta['CORREO_ELECTRONICO'];
                $_SESSION['telefono'] = $respuesta['TELEFONO'];
                $_SESSION['usuario'] = $usuario;
                $_SESSION['contraseña'] = $contraseña;
                
                include("C:\\xampp\htdocs\Proyecto Final\html\\vista_usuario.php");
            }
            else 
            {
                echo "Usuario no registrado";
                include("C:\\xampp\htdocs\Proyecto Final\html\\vista_registrarte.html");    
            }


        ?>
    </body>
</html>
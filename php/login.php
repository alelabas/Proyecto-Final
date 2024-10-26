<?if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?><!doctype html>
<html>
    <head>
        <title>Login de usuarios</title>
    </head>
    
    <body>
    
        <?php

            $usuario = $_POST['usuario'];
            $contraseña = $_POST['password'];

            include("conexion.php");

            $consulta = mysqli_query($conexion, "SELECT CODIGO_CLIENTE, NOMBRES, APELLIDOS, CORREO_ELECTRONICO, TELEFONO, TIPO_CLIENTE FROM CLIENTE WHERE USUARIO = '$usuario' AND CONTRASEÑA ='$contraseña'");
            $resultado = mysqli_num_rows($consulta);
            $respuesta = mysqli_fetch_array($consulta);

            if ($resultado != 0 && $respuesta['TIPO_CLIENTE'] == 'USUARIO')
            {
                
                $_SESSION['nombre_sesion'] = $respuesta['NOMBRES'];
                $_SESSION['apellido_sesion'] = $respuesta['APELLIDOS'];
                $_SESSION['correo_sesion'] = $respuesta['CORREO_ELECTRONICO'];
                $_SESSION['telefono_sesion'] = $respuesta['TELEFONO'];
                $_SESSION['usuario_sesion'] = $usuario;
                $_SESSION['contraseña_sesion'] = $contraseña;
                $_SESSION['id_sesion'] = $respuesta['CODIGO_CLIENTE'];
                
                include("C:\\xampp\htdocs\Proyecto Final\html\\vista_usuario.php");
            }
            else if ($resultado != 0 && $respuesta['TIPO_CLIENTE'] == 'ADMIN')
            {
                $_SESSION['nombre_sesion'] = $respuesta['NOMBRES'];
                $_SESSION['apellido_sesion'] = $respuesta['APELLIDOS'];
                $_SESSION['correo_sesion'] = $respuesta['CORREO_ELECTRONICO'];
                $_SESSION['telefono_sesion'] = $respuesta['TELEFONO'];
                $_SESSION['usuario_sesion'] = $usuario;
                $_SESSION['contraseña_sesion'] = $contraseña;
                $_SESSION['id_sesion'] = $respuesta['CODIGO_CLIENTE'];

                include("C:\\xampp\htdocs\Proyecto Final\html\\vista_admin.php");
            }
            else
            {
                echo "Usuario no registrado";
                include("C:\\xampp\htdocs\Proyecto Final\html\\vista_registrarte.html");    
            }

        ?>
    </body>
</html>
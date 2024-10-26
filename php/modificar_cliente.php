<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<html>
    <head>

    </head>
    <body>
        
    <?php
        $codigo = $_POST['codigo'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $contraseña = $_POST['password'];
        

        include("conexion.php");

        $consulta = mysqli_query($conexion, "SELECT * FROM CLIENTE WHERE CODIGO_CLIENTE = '$codigo'");
        $resultado = mysqli_num_rows($consulta);
        
        if($_POST['accion'] =='modificar'){
            if ($resultado != 0)
            {
                $consulta = mysqli_query($conexion, "UPDATE CLIENTE SET NOMBRES = '$nombres',APELLIDOS = '$apellidos', USUARIO = '$usuario', CORREO_ELECTRONICO = '$email', TELEFONO = $telefono, CONTRASEÑA = $contraseña WHERE CODIGO_CLIENTE = '$codigo'");
                echo "Cambios realizados";
            }
            else 
            {
                echo "Cambios no realizados";
            }
        }
        else{
            $consulta = mysqli_query($conexion, "DELETE FROM CLIENTE WHERE CODIGO_CLIENTE = '$codigo'");
        }
        include("C:\\xampp\htdocs\Proyecto Final\php\\vista_clientes_admin.php");
    ?>

    </body>
</html>
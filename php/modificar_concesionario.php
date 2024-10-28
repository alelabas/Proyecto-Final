<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<html>
    <head>

    </head>
    <body>
        
    <?php
    //sujeto a modificacion si se guarda la contraseña en la tabla concesionario
        $codigo = $_SESSION['codigo'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];


        include("conexion.php");

        $consulta = mysqli_query($conexion, "SELECT * FROM CONCESIONARIO WHERE CODIGO_CONCESIONARIO = '$codigo'");
        $resultado = mysqli_num_rows($consulta);

        if ($resultado != 0)
        {
            $consulta = mysqli_query($conexion, "UPDATE CONCESIONARIO SET NOMBRE = '$nombre', DIRECCION = '$direccion', CORREO_ELECTRONICO = '$email', TELEFONO = $telefono WHERE CODIGO_CONCESIONARIO = '$codigo'");
            echo "Cambios realizados correctamente";
            include("C:\\xampp\htdocs\Proyecto Final\php\\vista_concesionarios.php");
        }
        else 
        {
            echo "Cambios no realizados";
               
        }
    ?>

    </body>
</html>
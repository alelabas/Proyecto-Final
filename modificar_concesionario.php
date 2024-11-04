<?php @session_start();?>
<html>
    <head>

    </head>
    <body>
        
    <?php
        
        $codigo = $_POST['codigo'];
        if($_POST['accion'] =='modificar'){
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        }

        include("conexion.php");

        $consulta = mysqli_query($conexion, "SELECT * FROM CONCESIONARIO WHERE CODIGO_CONCESIONARIO = '$codigo'");
        $resultado = mysqli_num_rows($consulta);
        if($_POST['accion'] =='modificar'){
            if ($resultado != 0)
            {
                $consulta = mysqli_query($conexion, "UPDATE CONCESIONARIO SET NOMBRE = '$nombre', DIRECCION = '$direccion', CORREO_ELECTRONICO = '$email', TELEFONO = $telefono WHERE CODIGO_CONCESIONARIO = '$codigo'");
                echo "Cambios realizados correctamente";
            }
            else 
            {
                echo "Cambios no realizados";
               
            }
            include("..\php\\vista_concesionarios_admin.php");
        }
        else{
            $consulta = mysqli_query($conexion, "DELETE FROM TURNO WHERE CONCESIONARIO_CODIGO = '$codigo'");
            $consulta = mysqli_query($conexion, "DELETE FROM CONCESIONARIO WHERE CODIGO_CONCESIONARIO = '$codigo'");
            include("..\php\\vista_concesionarios_admin.php");
        }
    ?>

    </body>
</html>
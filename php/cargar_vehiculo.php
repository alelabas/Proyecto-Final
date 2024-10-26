<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>
<!doctype html>
<html>
    <head>
    </head>
    <title>Cargar concesionario</title>

    <body>
        <?php
            $codigo = $_POST['codigo'];
            $id_usuario = $_SESSION['id'];
            $patente = $_POST['patente'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $anio = $_POST['anio'];

            include("conexion.php");
            if ($resultado != 0)
            {
                echo "El vehiculo ya se encuentra registrado en el sistema";
            }
            else
            {
                $consulta = mysqli_query($conexion, "INSERT INTO VEHICULO VALUES ('$patente', '$marca', '$modelo', '$anio', '$id_usuario')");
            }

            if($_POST['tipo_usuario'] == 'ADMIN'){
                header("Location:http://localhost/Proyecto%20Final/php/vista_clientes_admin.php");
            }
            else{
                include("C:\\xampp\htdocs\Proyecto Final\html\\vista_mis_vehiculos.php");
            }
        ?>
    </body>
</html>
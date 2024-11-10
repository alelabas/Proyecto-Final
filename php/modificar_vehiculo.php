<?php @session_start();?>
<html>
    <head>

    </head>
    <body>
        
    <?php
        $patente = $_POST['patente'];
        
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $anio = $_POST['anio'];
        
        include("conexion.php");

        $consulta = mysqli_query($conexion, "SELECT * FROM VEHICULO WHERE PATENTE = '$patente'");
        $resultado = mysqli_num_rows($consulta);
        
        if($_POST['accion'] =='modificar'){
            if ($resultado != 0)
            {
                $consulta = mysqli_query($conexion, "UPDATE VEHICULO SET MARCA = '$marca', MODELO = '$modelo', ANIO = '$anio' WHERE PATENTE = '$patente'");
                echo "Cambios realizados";
            }
            else 
            {
                echo "Cambios no realizados";
            }
        }
        else{
            $consulta = mysqli_query($conexion, "UPDATE VEHICULO SET BORRADO = 1 WHERE PATENTE = '$patente'");
            $consulta = mysqli_query($conexion, "UPDATE TURNO SET ESTADO_TURNO = 'CANCELADO' WHERE VEHICULO_PATENTE = '$patente'");
        }
        if($_SESSION['tipo_usuario']=='USUARIO'){
            include("../html/vista_mis_vehiculos.php");
        }
        else{
            include("../php/vista_clientes_admin.php");
        }
        
    ?>

    </body>
</html>
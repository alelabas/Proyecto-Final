<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<html>
    <head>

    </head>
    <body>
        
    <?php
        $patente = $_POST['patente'];
        $patente_new = $_POST['patente_new'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $anio = $_POST['anio'];
        
        include("conexion.php");

        $consulta = mysqli_query($conexion, "SELECT * FROM VEHICULO WHERE PATENTE = '$patente'");
        $resultado = mysqli_num_rows($consulta);
        
        if($_POST['accion'] =='modificar'){
            if ($resultado != 0)
            {
                $consulta = mysqli_query($conexion, "UPDATE VEHICULO SET PATENTE = '$patente_new',MARCA = '$marca', MODELO = '$modelo', ANIO = '$anio' WHERE PATENTE = '$patente'");
                echo "Cambios realizados";
            }
            else 
            {
                echo "Cambios no realizados";
            }
        }
        else{
            $consulta = mysqli_query($conexion, "DELETE FROM VEHICULO WHERE PATENTE = '$patente'");
        }
        include("C:\\xampp\htdocs\Proyecto Final\php\\vista_clientes_admin.php");
    ?>

    </body>
</html>
<?php

include("conexion.php");
if (isset($_GET['fecha'])){
    $fecha = $_GET['fecha'];

    //consultar los turnos reservados en esa fecha
    $consulta = mysqli_query($conexion, "SELECT * FROM TURNO WHERE FECHA_TURNO = '$fecha'");
    $resultado = mysqli_num_rows($consulta);

    if ($resultado != 0)
    {
        $turnosReservados = mysqli_fetch_all($consulta);
        echo json_encode($turnosReservados);
    }
    else
    {
        echo json_encode([]);
    }

}

?>
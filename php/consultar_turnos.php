<?php

include("conexion.php");
if (isset($_GET['fecha'])){
    $fecha = $_GET['fecha'];
    $concesionario = $_GET['concesionario'];

    //consultar los turnos reservados en esa fecha
    $consulta = mysqli_query($conexion, "SELECT * FROM TURNO t, CONCESIONARIO c
        WHERE c.CODIGO_CONCESIONARIO = t.CONCESIONARIO_CODIGO AND FECHA_TURNO = '$fecha' AND ESTADO_TURNO = 'PENDIENTE' AND UPPER(c.NOMBRE) = UPPER('$concesionario')");
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
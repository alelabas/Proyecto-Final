<?php
include '../php/conexion.php';
session_start();

$id = $_GET['id'];

mysqli_query($conexion, "UPDATE turno SET ESTADO_TURNO = 'CANCELADO' WHERE CODIGO_TURNO = '$id'");
<<<<<<< Updated upstream
=======
echo "<script>alert('Turno cancelado exitosamente');</script>";
>>>>>>> Stashed changes
if($_SESSION['tipo_usuario']== 'USUARIO'){
	include("../html/vista_turnos_asignados.php");
}
else if($_SESSION['tipo_usuario']== 'CONCESIONARIO'){
	include("../php/vista_turnos_concesionario.php");
}
else{
<<<<<<< Updated upstream
	include("../php/vista_turnos_admin.php");
=======
	include("../php/vista_concesionarios_admin.php");
>>>>>>> Stashed changes
}
?>
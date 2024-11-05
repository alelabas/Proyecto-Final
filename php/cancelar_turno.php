<?php
include '../php/conexion.php';
session_start();

$id = $_GET['id'];

mysqli_query($conexion, "UPDATE turno SET ESTADO_TURNO = 'CANCELADO' WHERE CODIGO_TURNO = '$id'");
header("Location: ../html/vista_turnos_asignados.php");

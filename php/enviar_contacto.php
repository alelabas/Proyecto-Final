<!DOCTYPE html>
<?php
    $correo = $_POST['correo'];
    $titulo = $_POST['titulo'];
    $mensaje = $_POST['mensaje'];

    include("conexion.php");

    $consulta = mysqli_query($conexion, "INSERT INTO MENSAJE (TITULO, MENSAJE, CORREO_ELECTRONICO) VALUES ('$titulo', '$mensaje', '$correo')");
    ?>
    <script>
    alert('El mensaje ha sido enviado correctamente');
    window.location.href = '../index.html';
    </script>

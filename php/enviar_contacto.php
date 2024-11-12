<!DOCTYPE html>
<?php
    @session_start();
    $correo = $_POST['correo'];
    $titulo = $_POST['titulo'];
    $mensaje = $_POST['mensaje'];

    include("conexion.php");

    $consulta = mysqli_query($conexion, "INSERT INTO MENSAJE (TITULO, MENSAJE, CORREO_ELECTRONICO) VALUES ('$titulo', '$mensaje', '$correo')");
    echo
        "<script>
        alert('El mensaje ha sido enviado correctamente');
        </script>";
    if(isset ($_SESSION['tipo_usuario']) ? 'USUARIO' :'' ){
        include ("../html/vista_usuario.php");
    }
    else{
        
        header("Location:../index.html");
    }
    ?>
    

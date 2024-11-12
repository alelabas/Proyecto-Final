<!DOCTYPE html>
<?php
    $correo = $_POST['correo'];
    $titulo = $_POST['titulo'];
    $mensaje = $_POST['mensaje'];

    $destino = "soporte@servinow.com";
    $asunto = "Contacto desde el sitio" ;
    $mensaje = "Mail usuario: " . $correo . "Titulo: " . $titulo . "Mensaje: " . $mensaje; 
    $header = "Email: " . $correo;

    $enviado = @mail($destino, $asunto, $mensaje, $header);

    if ($enviado == true) {
        echo "Su mensaje ha sido enviado.";
    }
    else { echo "Su mensaje no pudo ser enviado";}

    include("conexion.php");

    $consulta = mysqli_query($conexion, "INSERT INTO MENSAJE (TITULO, MENSAJE, CORREO_ELECTRONICO) VALUES ('$titulo', '$mensaje', '$correo')");



    ?>
    <script>
    alert('El mensaje ha sido enviado correctamente');
    window.location.href = '../index.html';
    </script>

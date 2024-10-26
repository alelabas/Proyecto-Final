<?php session_start()?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <?php

            $codigo = $_SESSION['id'];
            $titulo = $_POST['titulo'];
            $mensaje = $_POST['mensaje'];

            include("conexion.php");

            $consulta = mysqli_query($conexion, "INSERT INTO CONSULTAS (CODIGO_CLIENTE, TITULO, MENSAJE) VALUES ('$codigo', '$titulo', '$mensaje')");

            header("Location: http://localhost/Proyecto%20Final/html/contacto.php");
            echo "Consulta enviada";

        ?>
    </body>
</html>
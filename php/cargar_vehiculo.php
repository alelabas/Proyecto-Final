<!doctype html>
<html>
    <head>
    </head>
    <title>Cargar concesionario</title>

    <body>
        <?php
            $codigo = $_POST['codigo'];
            $patente_new = $_POST['patente_new'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $anio = $_POST['anio'];

            include("conexion.php");
            // Se omitio de momento la contraseña ya que no esta definido donde guardarla.
            $consulta = mysqli_query($conexion, "INSERT INTO VEHICULO (PATENTE ,MARCA , MODELO , ANIO, CODIGO_PROPIETARIO) VALUES ('$patente_new', '$marca', '$modelo', '$anio', '$codigo')");
            // Suponiendo que la pagina de vistas de los concesionarios del administrador se llame asi, sino renombrar el link.
            header("Location:http://localhost/Proyecto%20Final/php/vista_clientes.php");
        ?>
    </body>
</html>
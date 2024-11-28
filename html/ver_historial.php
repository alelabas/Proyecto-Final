<?php @session_start();
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true && !isset($_SESSION['autenticado']) || $_SESSION['tipo_usuario'] !== 'USUARIO' ) {
    // Redirige al usuario a la página de login si no está autenticado
    include("../php/cerrar_sesion.php");
    header("Location: ../index.html");
    exit();
}
$patente = $_GET['patente'];
$fechaActual = date('Y-m-d');
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <title>ServiNow - Mis Vehículos</title>
</head>
<body id="vista-portada-dos">
    <header>
        <nav class="navegador">
            <a href="vista_usuario.php"><img id="inicio" src="../img/icono.webp" alt="ServiNow" height="80"></a>
            <ul class="lista">
                <li><a href="../html/vista_reservar_turno.php">Reservar Turno</a></li>
                <li><a href="../html/vista_turnos_asignados.php">Turnos Asignados</a></li>
                <li><a href="../html/vista_mis_vehiculos.php">Mis Vehículos</a></li>
                <li><a href="../html/contacto.php">Contactanos</a></li>
                <li><a href="../php/cerrar_sesion.php">Cerrar sesion</a></li>
                <li><a href="../html/vista_perfil.php"><i class="fa-regular fa-user"></i></a></li>
            </ul>
        </nav>
    </header>
    <article class="pag_principal">
        <h1>Historial de mantenimiento</h1>
        <section class="turnos-asignados"> 
            <?php
                include('../php/conexion.php');
                $consulta = mysqli_query($conexion, "SELECT c.NOMBRE, t.FECHA_TURNO, m.DESCRIPCION FROM turno t
                                                                    JOIN concesionario c ON t.CONCESIONARIO_CODIGO = c.CODIGO_CONCESIONARIO
                                                                    JOIN mantenimiento m ON t.MANT_CODIGO_SERVICIO = m.CODIGO_SERVICIO
                                                                    WHERE t.VEHICULO_PATENTE = '$patente'");
                
                $resultado = mysqli_num_rows($consulta);
                if ($resultado > 0) {
                    $resultado = mysqli_fetch_all($consulta);
                    foreach($resultado as $turno){
                        if ($turno[1] < $fechaActual)
                        {
                            echo '
                                <div class="tarjeta-turno">
                                        <h3>Concesionario: '.$turno[0].'</h3>
                                        <p><strong>Fecha del turno:</strong> '.$turno[1].'</p>
                                        <p><strong>Trabajo realizado:</strong> '.$turno[2].'</p>
                                        </div>';
                        }
                    }
                }
                else {
                    echo '<h2>No se realizaron turnos</h2>';
                }
            ?>
        </section>
    </article>

    <footer>
        <p>&copy; 2024 ServiNow. Todos los derechos reservados.</p>
    </footer>
    <script src="https://kit.fontawesome.com/7b8a06bdc2.js" crossorigin="anonymous"></script>
    <script>

    </script>
</body>
</html>
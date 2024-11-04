<?php session_start();
include('../php/conexion.php');?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <title>ServiNow - Turnos Asignados</title>
</head>
<body>
    <header>
        <nav class="navegador">
            <a href="vista_usuario.php"><img id="inicio" src="../img/icono.webp" alt="ServiNow" height="80"></a>
            <ul class="lista">
                <li><a href="vista_reservar_turno.php">Reservar Turno</a></li>
                <li><a href="vista_turnos_asignados.php">Turnos Asignados</a></li>
                <li><a href="vista_mis_vehiculos.php">Mis Vehículos</a></li>
                <li><a href="../php/cerrar_sesion.php">Cerrar sesion</a></li>
                <li><a href="vista_perfil.php"><i class="fa-regular fa-user"></i></a></li>
            </ul>
        </nav>
    </header>
    
    <article class="pag_principal">
        <h1>Turnos Asignados</h1>
        <p>Aquí puedes ver los turnos que has reservado</p>
        <section class="turnos-asignados">
        <?php
        $turnos_usuario = mysqli_query($conexion, "SELECT * FROM turno WHERE CLIENTE_CODIGO = '".$_SESSION['id_sesion']."' AND ESTADO_TURNO != 'CANCELADO'");
            while($turno = mysqli_fetch_assoc($turnos_usuario)){
                $fecha = $turno['FECHA_TURNO'];
                $hora = $turno['HORA_TURNO'];
                $estado = $turno['ESTADO_TURNO'];

                $consulta = mysqli_fetch_assoc(mysqli_query($conexion,'SELECT * FROM concesionario WHERE CODIGO_CONCESIONARIO = "'.$turno['CONCESIONARIO_CODIGO'].'"'));
                $concesionario = $consulta['NOMBRE'];
                $direccion = $consulta['DIRECCION'];
                $telefono = $consulta['TELEFONO'];

                $consulta = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT * FROM vehiculo WHERE PATENTE = '".$turno['VEHICULO_PATENTE']."'"));
                $vehiculo = "[" . $consulta['PATENTE'] . "] - " . $consulta['MARCA'] . " " . $consulta['MODELO'];

                $consulta = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT * FROM mantenimiento WHERE CODIGO_SERVICIO = '".$turno['MANT_CODIGO_SERVICIO']."'"));
                $mantenimiento = $consulta['DESCRIPCION'];
                echo '
                        <div class="tarjeta-turno">
                            <h3>'.$concesionario.'</h3>
                            <p><strong>Estado del turno:</strong> '.$estado.'</p>
                            <p><strong>Fecha:</strong> '.$fecha.'</p>
                            <p><strong>Hora:</strong> '.$hora.'</p>
                            <p><strong>Dirección:</strong> '.$direccion.'</p>
                            <p><strong>Telefono:</strong> '.$telefono.'</p>
                            <p><strong>Vehículo:</strong> '.$vehiculo.'</p>
                            <p><strong>Mantenimiento:</strong> '.$mantenimiento.'</p>
                            <a href="../php/cancelar_turno.php?id='.$turno['CODIGO_TURNO'].'" class="boton-cancelar">Cancelar Turno</a>
                        </div>';
            }
        ?>
        </section>
    </article>
    
    <footer>
        <p>&copy; 2024 ServiNow. Todos los derechos reservados.</p>
    </footer>
    <script src="https://kit.fontawesome.com/7b8a06bdc2.js" crossorigin="anonymous"></script>
</body>
</html>

<?php @session_start();?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Proyecto%20Final/estilos.css">
    <title>ServiNow - Mis Vehículos</title>
</head>
<body>
    <header>
        <nav class="navegador">
            <a href="http://localhost/Proyecto%20Final/html/vista_usuario.php"><img id="inicio" src="http://localhost/Proyecto%20Final/img/icono.webp" alt="ServiNow" height="80"></a>
            <ul class="lista">
                <li><a href="http://localhost/Proyecto%20Final/html/vista_reservar_turno.php">Reservar Turno</a></li>
                <li><a href="http://localhost/Proyecto%20Final/html/vista_turnos_asignados.php">Turnos Asignados</a></li>
                <li><a href="#">Mis Vehículos</a></li>
                <li><a href="http://localhost/Proyecto%20Final/html/vista_perfil.php"><i class="fa-regular fa-user"></i></a></li>
            </ul>
        </nav>
    </header>
    
    <article class="pag_principal">
        <h1>Mis Vehículos</h1>
        <p>Aquí puedes ver y gestionar tus vehículos registrados</p>
        
        <section class="vehiculos">

            <?php
                include("C:\\xampp\htdocs\Proyecto Final\php\conexion.php");
                $id_usuario = $_SESSION['id'];
                $consulta = mysqli_query($conexion, "SELECT PATENTE, MARCA, MODELO, ANIO FROM VEHICULO WHERE CODIGO_PROPIETARIO = '$id_usuario'");

                $resultado = mysqli_num_rows($consulta);
                
                if ($resultado != 0)
                {
                    $respuesta = mysqli_fetch_all($consulta);
                    foreach($respuesta as $vehiculo)
                    {
            ?>
            <div class="tarjeta-vehiculo">
                        
                <img src="http://localhost/Proyecto%20Final/img/auto1.jpg" alt="Toyota Corolla">
                    <?php 
                        echo"<h3>$vehiculo[1] $vehiculo[2]</h3>";
                        echo"<p><strong>Año:</strong> $vehiculo[3]</p>";
                        echo"<p><strong>Patente:</strong> $vehiculo[0]</p>";
                    ?>
                <a href="#" class="boton-editar">Editar</a>
                </div>
                    <?php
                    }
                }
                    ?>
                          
            <div class="tarjeta-vehiculo nuevo-vehiculo">
                <i class="fa-solid fa-plus"></i>
                <h3>Agregar Nuevo Vehículo</h3>
                <a href="#" class="boton-editar">Agregar</a>
            </div>

            <div id="modalAgregarVehiculo" class="modal">
                <div class="contenido-modal">
                    <span class="cerrar-modal">&times;</span>
                    <h2>Agregar Nuevo Vehículo</h2>
                    <form id="formularioAgregarVehiculo" class="formulario-login" action="http://localhost/Proyecto%20Final/php/agregar_vehiculo.php" method="post">
                        <div class="campo-formulario">
                            <label for="marca">Marca:</label>
                            <input type="text" id="marca" name="marca" required>
                        </div>
                        <div class="campo-formulario">
                            <label for="modelo">Modelo:</label>
                            <input type="text" id="modelo" name="modelo" required>
                        </div>
                        <div class="campo-formulario">
                            <label for="anio">Año:</label>
                            <input type="number" id="anio" name="anio" required>
                        </div>
                        <div class="campo-formulario">
                            <label for="patente">Patente:</label>
                            <input type="text" id="patente" name="patente" required>
                        </div>
                        <button type="submit" class="boton-submit">Agregar Vehículo</button>
                    </form>
                </div>
            </div>
        </section>
    </article>

    <footer>
        <p>&copy; 2024 ServiNow. Todos los derechos reservados.</p>
    </footer>

    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .contenido-modal {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .cerrar-modal {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .cerrar-modal:hover,
        .cerrar-modal:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .modal h2 {
            margin-top: 0;
            color: #333;
        }

        #formularioAgregarVehiculo {
            margin-top: 20px;
        }
    </style>

    <script src="https://kit.fontawesome.com/7b8a06bdc2.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('modalAgregarVehiculo');
            var botonAgregar = document.querySelector('.nuevo-vehiculo .boton-editar');
            var cerrarModal = document.querySelector('.cerrar-modal');

            botonAgregar.onclick = function() {
                modal.style.display = "block";
            }

            cerrarModal.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        });
    </script>
</body>
</html>
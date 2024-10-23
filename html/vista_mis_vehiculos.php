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
            <div class="tarjeta-vehiculo">
                <img src="http://localhost/Proyecto%20Final/img/auto1.jpg" alt="Toyota Corolla">
                <h3>Toyota Corolla</h3>
                <p><strong>Año:</strong> 2020</p>
                <p><strong>Patente:</strong> ABC123</p>
                <a href="#" class="boton-editar">Editar</a>
            </div>
            
            <div class="tarjeta-vehiculo">
                <img src="http://localhost/Proyecto%20Final./img/auto2.jpg" alt="Ford Focus">
                <h3>Ford Focus</h3>
                <p><strong>Año:</strong> 2018</p>
                <p><strong>Patente:</strong> XYZ789</p>
                <a href="#" class="boton-editar">Editar</a>
            </div>
            
            <div class="tarjeta-vehiculo nuevo-vehiculo">
                <i class="fa-solid fa-plus"></i>
                <h3>Agregar Nuevo Vehículo</h3>
                <a href="#" class="boton-agregar">Agregar</a>
            </div>
        <!-- Ventana modal para agregar vehículo -->
         <dialog>
            <div id="modal-agregar-vehiculo" class="modal">
                <div class="modal-contenido">
                    <span class="cerrar">&times;</span>
                    <h2>Agregar Nuevo Vehículo</h2>
                    <form id="form-agregar-vehiculo">
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
                        <button type="submit" class="boton-guardar">Guardar Vehículo</button>
                    </form>
                </div>
            </div>
        </dialog>
        </section>
    </article>
    <footer>
        <p>&copy; 2024 ServiNow. Todos los derechos reservados.</p>
    </footer>
    <script src="https://kit.fontawesome.com/7b8a06bdc2.js" crossorigin="anonymous"></script>
</body>
</html>
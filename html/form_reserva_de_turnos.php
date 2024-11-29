<?php @session_start();
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true ) {
    // Redirige al usuario a la página de login si no está autenticado
    include("../php/cerrar_sesion.php");
    header("Location: ../index.html");
    exit();
}
  include("../php/conexion.php");
  include("../php/consultar_turnos.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <title>ServiNow - Formulario de Reserva de Turnos</title>
</head>
<body>
<header>
        <nav class="navegador">
        <?php if($_SESSION['tipo_usuario'] == 'USUARIO' ){
            
            echo"<a href='../html/vista_usuario.php'><img id='inicio' src='../img/icono.webp' alt='ServiNow'  height='80'></a>";
            echo"<ul class='lista'>";
            echo"   <li><a href='../html/vista_reservar_turno.php'>Reservar Turno</a></li>";
            echo"   <li><a href='../html/vista_turnos_asignados.php'>Turnos Asignados</a></li>";
            echo"   <li><a href='../html/vista_mis_vehiculos.php'>Mis Vehículos</a></li>";
            echo' <li><a href="../html/contacto.php">Contactanos</a></li>';
            echo"   <li><a href='../php/cerrar_sesion.php'>Cerrar sesion</a></li>";
            echo"   <li><a href='../html/vista_perfil.php'><i class='fa-regular fa-user'></i></a></li>";
            echo"</ul> ";
        }
        else if($_SESSION['tipo_usuario'] == 'CONCESIONARIO' ){
            echo"<a href='../html/vista_concesionario.php'><img id='inicio' src='../img/icono.webp' alt='ServiNow'  height='80'></a>";
            echo"<ul class='lista'>";
            echo"   <li><a href='../html/vista_datos_concesionario.php'>Mi concesionario</a></li>";
            echo"   <li><a href='../php/vista_turnos_concesionario.php'>Turnos</a></li>";
            echo"   <li><a href='../php/cerrar_sesion.php'>Cerrar sesion</a></li>";
            echo"   <li><a href='../html/vista_perfil.php'><i class='fa-regular fa-user'></i></a></li>";
            echo"</ul> ";
        }
        else{
            echo"<a href='../html/vista_admin.php'><img id='inicio' src='../img/icono.webp' alt='ServiNow'  height='80'></a>";
            echo"<ul class='lista'>";
            echo"   <li><a href='../php/vista_clientes_admin.php'>Usuarios</a></li>";
            echo"   <li><a href='../php/vista_concesionarios_admin.php'>Concesionarios</a></li>";
            echo"   <li><a href='../php/cerrar_sesion.php'>Cerrar sesion</a></li>";
            echo"</ul> ";
        }
        ?>
        </nav>
    </header>
    <article class="pag_principal">
    <div class="reserva-container">
        <div class="reserva-card">
            <div class="card-header">
                <h3>Reserva de Turno para Mantenimiento</h3>
            </div>
            <div class="card-body">
                <form action="../php/procesar_reserva.php" method="POST">
                    <div class="form-group">
                        <label for="concesionario">Concesionario</label>
                        <select type="text" id="concesionario" name="concesionario" required>
                            <?php echo $_GET['concesionario'] ?>
                            <option value="<?php echo $_GET['concesionario'] ?>" selected><?php echo $_GET['concesionario'] ?></option>
                            <?php 
                            $consulta = mysqli_query($conexion, "SELECT * FROM concesionario where NOMBRE != '".$_GET['concesionario']."'");
                            while ($row = mysqli_fetch_assoc($consulta)) {
                                echo "<option value='".$row['NOMBRE']."'>".$row['NOMBRE']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="mantenimiento">Mantenimiento</label>
                        <select type="text" id="mantenimiento" name="mantenimiento" required>
                            <option value="">Seleccione el mantenimiento deseado</option>
                            <?php 
                            $consulta = mysqli_query($conexion, "SELECT * FROM mantenimiento");
                            while ($row = mysqli_fetch_assoc($consulta)) {
                                echo "<option value='".$row['DESCRIPCION']."'>".$row['DESCRIPCION']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="fecha">Fecha del Turno</label>
                        <input type="date" id="fecha" name="fecha" required>
                    </div>

                    <div class="form-group">
                        <label for="hora">Hora del Turno</label>
                        <select id="hora" name="hora"></select>
                    </div>

                    <div class="form-group">
                        <label for="vehiculo">Vehículo</label>
                        <select type="text" id="vehiculo" name="vehiculo" required>
                        <?php 
                            if($_SESSION['tipo_usuario'] == 'USUARIO'){
                                $consulta = mysqli_query($conexion, "SELECT * FROM vehiculo WHERE CODIGO_PROPIETARIO = '".$_SESSION['id_sesion']."' AND BORRADO = 0");
                            }
                            else{
                                $consulta = mysqli_query($conexion, "SELECT * FROM vehiculo ");
                            }
                            
                            while ($row = mysqli_fetch_assoc($consulta)) {
                                echo "<option value='".$row['PATENTE']."'>".'['.$row['PATENTE'].']'." - ".$row['MARCA']." ".$row['MODELO']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit">Reservar Turno</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </article>
    <footer>
        <p>&copy; 2024 ServiNow. Todos los derechos reservados.</p>
    </footer>
    <script src="https://kit.fontawesome.com/7b8a06bdc2.js" crossorigin="anonymous"></script>
    <script>
        var hoy = new Date();
        var dia = String(hoy.getDate()).padStart(2,0);
        var mes = String(hoy.getMonth() + 1).padStart(2,0);
        var anio = String(hoy.getFullYear());

        var fechaActual = anio + '-' + mes + '-' + dia;

        document.getElementById('fecha').setAttribute('min', fechaActual);

        var horaSelect = document.getElementById('hora');
        for (var h = 8; h < 19; h++) {
            for (var m = 0; m < 60; m += 30) {
                var hora = String(h).padStart(2, '0');
                var minuto = String(m).padStart(2, '0');
                var option = document.createElement('option');
                option.value = hora + ':' + minuto;
                option.textContent = hora + ':' + minuto;
                horaSelect.appendChild(option);
            }
        }

        nombreConcesionario = document.getElementById('concesionario').value;
        console.log('concesionario: ', nombreConcesionario)

        //Validar turnos ya ocupados
        //obtener los resultados del backend
        async function obtenerTurnosReservados(fecha){
            const response = await fetch(`../php/consultar_turnos.php?fecha=${fecha}&concesionario=${nombreConcesionario}`);
            const data = await response.json();
            console.log('resultados: ', data);
            return data.map(turno => turno[2]);
            console.log('datos: ', data.map(turno => turno[2]));
        }

        async function actualizarHoras(fecha) {
            const turnosReservados = await obtenerTurnosReservados(fecha);
            console.log('Turnos Reservados:', turnosReservados); // Verifica las horas reservadas

            // Crear un array con todas las horas posibles (por ejemplo, de 08:00 a 18:00 con intervalos de 30 minutos)
            const todasLasHoras = [];
            for (var h = 8; h < 19; h++) {
                for (var m = 0; m < 60; m += 30) {
                    var hora = String(h).padStart(2, '0');
                    var minuto = String(m).padStart(2, '0');
                    var horas = hora + ":" + minuto;
                    todasLasHoras.push(horas);
                }
            }
            console.log('Todas las horas:', todasLasHoras); // Verifica las horas generadas

            // Obtener la fecha y la hora actuales
            const now = new Date();
            const fechaActual = now.toISOString().split('T')[0];
            const horaActual = now.getHours();
            const minutoActual = now.getMinutes();

            console.log('Fecha actual:', fechaActual);
            console.log('Hora actual:', `${horaActual}:${minutoActual}`);

            // Filtrar las horas disponibles (eliminando las reservadas y las horas pasadas si es el mismo día)
            const horasDisponibles = todasLasHoras.filter(hora => {
                if (fecha === fechaActual) {
                    const [horaHora, horaMinuto] = hora.split(':').map(Number);
                    if (horaHora < horaActual || (horaHora === horaActual && horaMinuto < minutoActual)) {
                        return false;
                    }
                }
                return !turnosReservados.includes(hora);
            });

            console.log('Horas disponibles:', horasDisponibles); // Verifica las horas disponibles

            // Limpiar las opciones actuales del <select>
            horaSelect.innerHTML = '';

            // Añadir las horas disponibles al <select>
            horasDisponibles.forEach(hora => {
                const option = document.createElement('option');
                option.value = hora;
                option.textContent = hora;
                horaSelect.appendChild(option);
            });
        }

        document.getElementById('fecha').addEventListener('change', (e) => { 
            const fechaSeleccionada = e.target.value;
            console.log('Fecha seleccionada:', fechaSeleccionada); // Verifica que la fecha se capture correctamente
            actualizarHoras(fechaSeleccionada);
        });

        document.getElementById('concesionario').addEventListener('change', (c) =>{
            nombreConcesionario = c.target.value;
            console.log('Concesionario: ', nombreConcesionario);
            const fechaSeleccionada = document.getElementById('fecha').value;
            actualizarHoras(fechaSeleccionada);  
        })


    </script>
</body>
</html>



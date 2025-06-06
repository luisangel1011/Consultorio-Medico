<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cita</title>
    <link rel="stylesheet" href="ActualizarCita.css">
</head>
<body>

    <div class=contenido>
        <div class=izquierda>
            <center><h3>Seleccionar Cita</h3>
            <center><label for="buscar por nombre:" class='busqueda'>Busqueda:<input type="text" class="btext"></label></center>

            <table border=1 class='Tabla'>
                <thead>

                    <?php

                        session_start();
                        if (isset($_SESSION['id']) && !empty($_SESSION['id'])){
                        

                        }
                        else
                        header('Location: IniciarSesion.php');               

                    ?>
                    </form>    
                </thead>
            </table>    
            </center>
            </div>
        </div>


    <div class="ventAC"> <!--Actualizar Cita-->
        <center><h1>modificar cita</h1></center>
        <br>

        <center>
            
            <!-- <form action="ActualizarCita.php" method="POST" enctype="application/x-www-form-urlencoded" > -->

            <h2>Nombre </h2>
            <input type="text" id="txtNombre" name="txtNombre" class="txtNombre" required>
            <h2>Apellidos paterno</h2>
            <input type="text" id="txtApellidoP" name="txtApellidoP"  class="txtApellidoP" required>
            <h2>Apellidos materno</h2>
            <input type="text" id="txtApellidoM" name="txtApellidoM"  class="txtApellidoM" required>
            <h2  for="fecha">fecha de la cita</h2>
            <input type="datetime-local" class="txtfecha" id="txtfecha" class="txtfecha" name="txtfecha" required>
            <br>
            <br>
            <a class="SelectCitas">Seleccionar otra cita</a>
            <br>
            <br>
            <a href="MostrarCita.php" class="Citas">Mostrar citas existentes</a>

            <br>
            <br>
            <button class="btnActualizar">Modificar</button>
        <!-- </form> -->
        </center>   
        
        
        <script src="js/jquery-3.5.0.min.js"></script>

        <script src="js/ActualizarCita.js"></script>

</div>
</body>
</html>

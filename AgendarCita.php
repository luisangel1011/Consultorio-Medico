<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="AgendarCita.css">
</head>
<body>

<?php 
        session_start();
        if (!isset($_SESSION['id']) && empty($_SESSION['id']))
            header('Location: IniciarSesion.php');



?>
<center><h1>Agendar cita</h1></center>
    <br>      
    <center>    
    <div class="txtError"><label class="error" value=""> Se encuentra un error</label></div>
    

        <div><h2>Nombre  </h2></div> 
        <input type="text" id="txtNombre" name="txtNombre" required >
        <div><h2>Apellido Paterno </h2></div>
        <input type="text" id="txtApellidoP" name="txtApellidoP" required>
        <div><h2>Apellido Materno </h2></div>
        <input type="text" id="txtApellidoM" name="txtApellidoM" required>
        <div><h2  for="fecha">Fecha y Hora </h2></div>
        <input type="datetime-local" class="txtfecha" id="txtfecha" name="txtfecha" required>
        <div class="Citas"><a href="MostrarCita.php">Mostrar citas existentes</a></div>
        <br>
        <br>
        <button class="agendar">Agendar Cita</button>
                
    </center>
  

<script src="js/jquery-3.5.0.min.js"></script>
<script src="js/AgendarCita.js"></script>  

</body>
</html>
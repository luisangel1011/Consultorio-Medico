<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="MostrarCita.css">
</head>
<body>

<?php 
 session_start();
 if (isset($_SESSION['id']) && !empty($_SESSION['id'])){
}
 else
 header('Location: IniciarSesion.php');    

 
?>
    <header>
       <center><h1>Visualizacion de Cita</h1></center> 
    </header>
        <div class=izquierda>
            <center><label for="buscar por nombre:" class='busqueda'>Busqueda:<input type="text" class="btext"></label></center>
            
            <table border=1 class='Tabla'>
                
                
                </thead>
                </table>
        </div>
        <script src="js/jquery-3.5.0.min.js"></script>
        <script src="js/MostrarCita.js"></script>
</body>
</html>
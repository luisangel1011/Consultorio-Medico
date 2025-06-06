<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="EliminarCita.css">
</head>
<body>
    <header>
       <center><h1>Eliminar Cita</h1></center> 
    </header>
   
    <div class=izquierda>
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
  
    </div>
    <script src="js/jquery-3.5.0.min.js"></script>

    <script src="js/EliminarCita.js"></script>

</body>
</html>
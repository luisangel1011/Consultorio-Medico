<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Menu.css">
</head>
<body onload="MostrarPerfil()">

    

<nav>
    <div>
        <!-- <button class="botonMostrar"><img src="Opciones.png" alt="" height="30px" width="30px"></button> -->
        <ul><center><img src="img/Logo.png" alt="" height="35%" width="35%"></center></ul>
        <ul class="Perfil"> <a onclick="MostrarPerfil()" >
        <?php 
        session_start();
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])){
            $bd_Host= "localhost";
            $bd_Nombre="consultorio";
            $bd_Usuario="root";
            $bd_Password="";
            $Conexion= @mysqli_connect($bd_Host,$bd_Usuario,$bd_Password,$bd_Nombre) or die("No se puede conectar a la base de datos");

            $sql = "SELECT * FROM medico WHERE Usuario='" . $_SESSION['id'] . "'";
            $resultado = mysqli_query($Conexion, $sql);
            $fila = mysqli_fetch_assoc($resultado);
            if($fila){
                echo $fila['nombre']." ".$fila['apellidoPa']." ".$fila['apellidoMa'];
            }
        }
        


        else
        header('Location: IniciarSesion.php');
    mysqli_close($Conexion);

    if (isset($_POST['accionar1'])) {
        // Llamar al primer método de la clase
        $objeto->miMetodo1();
    }
        ?> </a> </ul>    
    </div>
    <ul class="Cita" onclick=" MostrarL()"><a >Cita</a>
        <ul class="separacion">
            <li onclick="MostrarGenerarCita()"><a  >Agendar cita</a></li>
            <li><a onclick="MostrarActualizarCita()">Modificar cita</a></li>
            <li><a onclick="MostrarEliminarCita()">Eliminar cita</a></li>
        </ul>
    </ul>
    
    <ul onclick="MostrarHistorialClinico()"><a>Historial clínico</a></ul>
    <ul><a class="CerrarSesion">Cerrar sesion</a></ul>      
   <!--  -->
  
</nav>

    <center>
        <div class="ventana" >   
        <iframe class="iVent" ></iframe>
        </div>
    </center>

<script src="js/jquery-3.5.0.min.js"></script>
<script src="js/menu.js"></script>

</body>
</html>
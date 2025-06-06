<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Perfil.css">
</head>
<body>

<div class="ventP">  <!--perfil-->
            <center><h1>Perfil</h1></center> 
            <div class="texto-superior">Texto encima de la imagen</div>
            <center><img class="FPerfil" src="img/NoPhoto.png">    
            <ul>
                <?php 
                    session_start();
                    if (isset($_SESSION['id']) && !empty($_SESSION['id']))
                    $bd_Host= "localhost";
                    $bd_Nombre="consultorio";
                    $bd_Usuario="root";
                    $bd_Password="";
                    $Conexion= @mysqli_connect($bd_Host,$bd_Usuario,$bd_Password,$bd_Nombre) or die("No se puede conextar a la base de datos");

                    $sql = "SELECT * FROM medico WHERE Usuario='" . $_SESSION['id'] . "'";
                    $resultado = mysqli_query($Conexion, $sql);
                    $fila = mysqli_fetch_assoc($resultado);

                   
                    if($fila){
                        echo 
                       "<li><a>Nombre: $fila[nombre]</a></li>
                        <li><a>Apellidos: $fila[apellidoPa] $fila[apellidoMa]</a></li>
                        <li><a>cedula: $fila[cedula] </a></li>                        
                        <li><a>Nombre de usuario: $fila[usuario] </li>
                        <li><a>Contraseña: $fila[contraseña]</li>";
                        
                        
                    }
                    
                    
                    
                    else
                    header('Location: IniciarSesion.php');

                    mysqli_close($Conexion);




                ?>

                    <!--  -->
                </ul>
               
                    </center>
            </div>
</body>
</html>
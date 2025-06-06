<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="IniciarSesion.css">


</head>
<body>
<?php 
session_start();
if (isset($_SESSION['id']) && !empty($_SESSION['id'])){
    header('Location: Menu.php');

}
else
$bd_Host= "localhost";
$bd_Nombre="consultorio";
$bd_Usuario="root";
$bd_Password="";
$Conexion= @mysqli_connect($bd_Host,$bd_Usuario,$bd_Password,$bd_Nombre) or die("No se puede conextar a la base de datos");
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        
        
        if (!empty(trim($_POST['txtUser'])) && !empty(trim($_POST['txtPassword'])) && $_POST['btnIngresar']){
            $usuario = $_POST['txtUser'];
            $contraseña = $_POST['txtPassword'];
            $sql = "SELECT * FROM medico WHERE Usuario='$usuario' AND Contraseña='$contraseña'";
            $resultado = mysqli_query($Conexion, $sql);
            $fila = mysqli_fetch_assoc($resultado);
            if($fila){
                $_SESSION['id']=$fila['usuario'];

                header('Location: menu.php');
                exit;
                echo $fila['nombre']. ' ' . $fila['apellidoPa'];
            } else {
                echo '<script>
                alert("Usuario o contraseña incorrectos.")
                </script>';
            }           
        }
        else{
            echo '<script>
                   alert("Por favor, complete todos los campos") </script>';
        }
    }
   
mysqli_close($Conexion);  


?>
<iframe class="Registro"></iframe>
   <div class="Plantilla">


   
   

    <center>
    <form action="IniciarSesion.php" method="POST" enctype="application/x-www-form-urlencoded">
        
        <header>
       
            <img src="img/Logo.png" alt="" height="180" width="150">
            
        </header>
    
            <h1 class="txt">Usuario</h1> <input type="text" id="txtUser" name="txtUser" required>
            <br>
            <h1 class="txt">Contraseña</h1> <input type="password" id="txtPassword"  name="txtPassword" required>
            
            <h1>Obtener cuenta: <a class="btnRegistrar" onclick="MostrarRegistro()" >Crear Cuenta</a></h1>
            <!--  -->
            <br>
            <input type="submit" class="btnIngresar" value="ingresar" name="btnIngresar">
        
    </form>
    </div>

</center>
<script src="js/Script.js"></script>
</body>
</html>
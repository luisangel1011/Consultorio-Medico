<?php



if (isset($_POST['Accion'])){
    $accion= $_POST['Accion'];
    $objeto= new ClassRegistro();

    if($accion=="RegistrarC"){
        echo $objeto->RegistrarC($_POST['txtUsuario'],$_POST['txtContraseña'],$_POST['txtNombre'],$_POST['txtApellidoPa'],$_POST['txtApellidoMa'],$_POST['txtCedula']);
    }

}

class ClassRegistro{


    Public Function RegistrarC($txtUsuario,$txtContraseña,$txtNombre,$txtApellidoPa,$txtApellidoMa,$txtCedula){                
        $bd_Host= "localhost";
        $bd_Nombre="consultorio";
        $bd_Usuario="root";
        $bd_Password="";
        $Conexion= @mysqli_connect($bd_Host,$bd_Usuario,$bd_Password,$bd_Nombre) or die("No se puede conectar a la base de datos");
    
                        $Consulta="SELECT COUNT(*) AS Total from medico";
                        $TTotal=mysqli_query($Conexion,$Consulta);
                        if($TTotal){
                            $fila=mysqli_fetch_assoc($TTotal);
                        }
                        $IdTotal=$fila['Total'];
                        $Consulta= "INSERT INTO medico (usuario,nombre,apellidoPa,apellidoMa,contraseña,cedula) VALUES ('$txtUsuario','$txtNombre','$txtApellidoPa','$txtApellidoMa','$txtContraseña','$txtCedula')";
                        $sqlVerificadorU= "SELECT * FROM medico where Usuario='$txtUsuario'";
                        $sqlVerificadorC= "SELECT * FROM medico where Usuario='$txtCedula'";
                        
                        $verificadorU=mysqli_query($Conexion,$sqlVerificadorU);
                        $TU=mysqli_fetch_assoc($verificadorU);

                        $verificadorC=mysqli_query($Conexion,$sqlVerificadorC);
                        $TC=mysqli_fetch_assoc($verificadorC);
                        if (!$TU && !$TC){
                            if(mysqli_query($Conexion,$Consulta)){
                                echo 'Cuenta Registrada';
                             
                             }
                             else
                                 echo "Error al ejecutar la consulta:".mysqli_error($Conexion);
 
                        }
                        else
                        echo 'no se puede registrar, el usuario o cedula ya ha sido registrado';
    
       
           
        mysqli_close($Conexion);  

        
    }
}


?>

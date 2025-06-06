<?php



if (isset($_POST['Accion'])){
    $accion= $_POST['Accion'];
    $objeto= new ClassRegistro();

    if($accion=="ActualizarC"){
        echo $objeto->ActualizarC($_POST['txtNombre'],$_POST['txtApellidoP'],$_POST['txtApellidoM'],$_POST['txtfecha'],$_POST['id']);
    }
    else if($accion=="ActualizarDatosC"){
        echo $objeto->ActualizarDatosC();
    }
    else if($accion=="MostrarDatos"){
        echo $objeto->MostrarDatos($_POST['texto']);
    }
    if($accion=="Verificador"){
        echo $objeto->Verificador($_POST['txtfecha'],$_POST['id']);
    }
   

}
else {
    echo("algo anda mal");
}

class ClassRegistro{

    public function MostrarDatos($texto1){
        session_start();
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])){
            $textoB=$texto1;
            $texto="";
            $bd_Host= "localhost";
            $bd_Nombre="consultorio";
            $bd_Usuario="root";
            $bd_Password="";
            $Conexion= @mysqli_connect($bd_Host,$bd_Usuario,$bd_Password,$bd_Nombre) or die("No se puede conectar a la base de datos");
          
                $consulta= "SELECT * FROM cita";
                $Resultado= mysqli_query($Conexion,$consulta);
                if(!$Resultado){
                    echo '<script>
                                alert("error al obtener informacion de las citas registradas");
                                </script>';
                }
                else{
                    if(mysqli_num_rows($Resultado)>0){
                        if($textoB!=""){
                            for ($i=0; $i < mysqli_num_rows($Resultado); $i++) 
                            { 
                                $fila= mysqli_fetch_array($Resultado, MYSQLI_ASSOC); 
                                $nombre="$fila[NombrePaciente] $fila[ApPPaciente] $fila[ApMPaciente]";
                                if (strstr(strtolower($nombre),strtolower($textoB)) && $fila['Estado']=='Activo'){
                                    $texto= $texto.  "<tr class='casilla' data-id='$fila[idCita]'>
                                    <th>$fila[idCita]</th>
                                    <th>$fila[NombrePaciente]</th>
                                    <th>$fila[ApPPaciente]</th>
                                    <th>$fila[ApMPaciente]</th>
                                    <th>$fila[FechaHora]</th>
                                    <th>$fila[Estado]</th>
                                </tr>";
                                }
                               
                            }
                            
                           
                        }
                        else{
                            for ($i=0; $i < mysqli_num_rows($Resultado); $i++) 
                            { 
                                $fila= mysqli_fetch_array($Resultado, MYSQLI_ASSOC);
                                if($fila['Estado']=='Activo'){
                                    $texto= $texto.  "<tr class='casilla' data-id='$fila[idCita],$fila[NombrePaciente],$fila[ApPPaciente],$fila[ApMPaciente],$fila[FechaHora]'+>
                                    <th>$fila[idCita]</th>
                                    <th>$fila[NombrePaciente]</th>
                                    <th>$fila[ApPPaciente]</th>
                                    <th>$fila[ApMPaciente]</th>
                                    <th>$fila[FechaHora]</th>
                                    <th>$fila[Estado]</th>
                                </tr>";

                                }
                            }
                           
                           
                        }

                       
                        echo $texto;
                    
                    }
                    else
                    {
                        echo "no hay citas almacenadas";
                    }
                }

        }
        else
        header('Location: IniciarSesion.php');    

        
    }   

    Public Function ActualizarC($txtNombre,$txtApellidoP,$txtApellidoM,$txtfecha,$id){                


        session_start();
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])){
           
            $bd_Host= "localhost";
            $bd_Nombre="consultorio";
            $bd_Usuario="root";
            $bd_Password="";
            $Conexion= @mysqli_connect($bd_Host,$bd_Usuario,$bd_Password,$bd_Nombre) or die("No se puede conectar a la base de datos");
            $Consulta= "UPDATE cita SET NombrePaciente=?, ApPPaciente=?, ApMPaciente=?, FechaHora=? where idCita=?";
            $data=array();
            $boole=TRUE;
            $mensaje="";

            $sqlVerificador= "SELECT * FROM cita where idCita='$id'";
            $verificador=mysqli_query($Conexion,$sqlVerificador);
            $T=mysqli_fetch_assoc($verificador);

            $fecha1=new DateTime($T['FechaHora']);
            $fecha2=new DateTime($txtfecha);


          
                    if($T['NombrePaciente']==$txtNombre && $T['ApPPaciente']==$txtApellidoP && $T['ApMPaciente']==$txtApellidoM && $fecha1==$fecha2){
                        echo ("no se puede modificar el texto ya que no hay modificacion en los datos");
                    }
                    else
                    {
                        if($Consult=mysqli_prepare($Conexion,$Consulta)){
                            $NombrePaciente=$txtNombre;
                            $ApPPaciente=$txtApellidoP;
                            $ApMPaciente=$txtApellidoM;
                            $FechaHora=$txtfecha;
                            $idCita=$id;
                            
                            mysqli_stmt_bind_param($Consult, "sssss",$NombrePaciente,$ApPPaciente,$ApMPaciente,$FechaHora,$idCita);
                            mysqli_stmt_execute($Consult);
                            mysqli_stmt_get_result($Consult);
                            echo ("Se actualizo la cita seleccionada");
                
                        }
                        else{   
                            echo ("Error al actualizar datos");
                        }
                   


                    }
                       
                
           
        }
            
       
    }



    Public Function ActualizarDatosC(){   
        $bd_Host= "localhost";
        $bd_Nombre="consultorio";
        $bd_Usuario="root";
        $bd_Password="";
        $Conexion= @mysqli_connect($bd_Host,$bd_Usuario,$bd_Password,$bd_Nombre) or die("No se puede conectar a la base de datos");
        $Consulta= "UPDATE cita SET Estado=? where idCita=?";
        $data=array();
        $dato='';

        $sqlVerificador= "SELECT * FROM cita";
        $verificador=mysqli_query($Conexion,$sqlVerificador);
        while ($T=mysqli_fetch_assoc($verificador)){
            $data[]=$T;
        }


        for ($i=0; $i < count($data); $i++) { 
            $dateTime= new DateTime($data[$i]['FechaHora']);
            $dateActual= new DateTime();
            $dato=$dato.$data[$i]['idCita'];
            //if($data[$i]['FechaHora']==$txtfecha)
            if (($data[$i]['Estado']=='Activo' && $dateTime<$dateActual)){
                if($Consult=mysqli_prepare($Conexion,$Consulta)){
                    $Estado="Expirado";
                    $id= $data[$i]['idCita'];
                    mysqli_stmt_bind_param($Consult,"ss",$Estado,$id);
                    mysqli_stmt_execute($Consult);
                    mysqli_stmt_get_result($Consult);
                    
        
                }
            }
            
        }
        echo ($dato. count($data));
    }

    public function Verificador($txtfecha,$id){
        $bd_Host= "localhost";
        $bd_Nombre="consultorio";
        $bd_Usuario="root";
        $bd_Password="";
        $Conexion= @mysqli_connect($bd_Host,$bd_Usuario,$bd_Password,$bd_Nombre) or die("No se puede conectar a la base de datos");
        $data=array();
        $Verificador=TRUE;
        $mensaje="";

        $sqlVerificador= "SELECT * FROM cita";
        $verificador=mysqli_query($Conexion,$sqlVerificador);
        while ($T=mysqli_fetch_assoc($verificador)){
            $data[]=$T;
        }

        for ($i=0; $i < count($data); $i++) { 
            $dateTime1= new DateTime($data[$i]['FechaHora']);
            $dateTime2= new DateTime($txtfecha);
            $dateNow = new DateTime();
            // Calcula la diferencia entre los dos DateTime
            $interval = $dateTime1->diff($dateTime2);
            $differenceInMinutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
                        // Comprueba si la diferencia es menor a 30 minutos
            
            if (($differenceInMinutes < 30 && $data[$i]['Estado']=='Activo') || $dateTime2<$dateNow) {
                $Verificador=FALSE;
            } 

            if ($data[$i]['idCita']==$id && $dateTime1==$dateTime2) {
                $Verificador=TRUE;
                $i=count($data);
               
            } 
            
        }
        if ($Verificador==TRUE){
            echo("si");
        }
        if ($Verificador==FALSE){
            echo("no");
        }
    }



}    
?>
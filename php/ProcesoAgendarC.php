<?php

if (isset($_POST['Accion'])){
    $accion= $_POST['Accion'];
    $objeto= new ClaseAgendar();

    if($accion=="RegistrarC"){
        echo $objeto->agendarC($_POST['txtNombre'],$_POST['txtApellidoP'],$_POST['txtApellidoM'],$_POST['txtfecha']);
    }
    if($accion=="Verificador"){
        echo $objeto->Verificador($_POST['txtfecha']);
    }

}


class claseAgendar{

    public function agendarC($txtNombre,$txtApellidoP,$txtApellidoM,$txtfecha){
        
        session_start();
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])){
             $bd_Host= "localhost";
             $bd_Nombre="consultorio";
             $bd_Usuario="root";
             $bd_Password="";
             $Conexion= @mysqli_connect($bd_Host,$bd_Usuario,$bd_Password,$bd_Nombre) or die("No se puede conectar a la base de datos");
             $data=array();
             $Verificador=TRUE;

            
            
                if($_SERVER["REQUEST_METHOD"]== "POST"){
                    
                        $sqlVerificador= "SELECT * FROM cita";
                        $verificador=mysqli_query($Conexion,$sqlVerificador);
                        while ($T=mysqli_fetch_assoc($verificador)){
                            $data[]=$T;
                        }                
                        $sql = "SELECT COUNT(*) AS total FROM cita";
                        $resultado = mysqli_query($Conexion, $sql);
                        if ($resultado) {
                            // Obtener el número total de filas
                            $fila = mysqli_fetch_assoc($resultado);
                            $total_citas = $fila['total'];
                        } else {
                            $total_citas = 0;
                        }

                                for ($i=0; $i < count($data); $i++) { 
                                    $dateTime1= new DateTime($data[$i]['FechaHora']);
                                    $dateTime2= new DateTime($txtfecha);
                                    // Calcula la diferencia entre los dos DateTime
                                    $interval = $dateTime1->diff($dateTime2);
                                    $differenceInMinutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
                                                // Comprueba si la diferencia es menor a 30 minutos
                                    if ($differenceInMinutes < 30) {
                                        $Verificador=FALSE;
                                    } 
                                    
                                }
                                if ($Verificador==TRUE){
                                    $Consulta= "INSERT INTO cita (idCita, NombrePaciente, ApPPaciente, ApMPaciente, FechaHora,Estado) VALUES ('C$total_citas','$txtNombre','$txtApellidoP','$txtApellidoM','$txtfecha','Activo')";
                                    if(mysqli_query($Conexion,$Consulta)){
                                        echo 'cita agendada';
                                    
                                    }
                                    else
                                        echo "Error al ejecutar la consulta:".mysqli_error($Conexion);
                                }
                                else {
                                    echo "No se puede agendar debido a que empalma con otra cita";
                                }
                }
            
            
             mysqli_close($Conexion);  
            
            
            
        }
        else
        header('Location: IniciarSesion.php');


    }
    public function Verificador($txtfecha){
        $bd_Host= "localhost";
        $bd_Nombre="consultorio";
        $bd_Usuario="root";
        $bd_Password="";
        $Conexion= @mysqli_connect($bd_Host,$bd_Usuario,$bd_Password,$bd_Nombre) or die("No se puede conectar a la base de datos");
        $data=array();
        $Verificador=TRUE;

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
            
        }
        if ($Verificador==TRUE){
            echo("si");
        }
        if ($Verificador==FALSE){
            echo("no ");
        }
    }
    
}

?>
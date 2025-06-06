<?php

if (isset($_POST['Accion'])){
    $accion= $_POST['Accion'];
    $objeto= new claseEliminar();

    if($accion=="MostrarDatos"){
        echo $objeto->MostrarDatos($_POST['texto']);
    }
    else if($accion=="EliminarDatos"){
        echo $objeto->EliminarDatos($_POST['id']);
    }

}

        
    class claseEliminar{

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
                                        $texto= $texto.  "<tr class='casilla' data-id='$fila[idCita]'+>
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

        public function EliminarDatos($id){
           
                $bd_Host= "localhost";
                $bd_Nombre="consultorio";
                $bd_Usuario="root";
                $bd_Password="";
                $Conexion= @mysqli_connect($bd_Host,$bd_Usuario,$bd_Password,$bd_Nombre) or die("No se puede conectar a la base de datos");
                $Consulta= "UPDATE cita SET Estado=? where idCita=?";
                if($Consult=mysqli_prepare($Conexion,$Consulta)){
                    $Estado='Cancelado';
                    $idCita=$id;
                    mysqli_stmt_bind_param($Consult, "ss",$Estado,$idCita);
                    mysqli_stmt_execute($Consult);
                    mysqli_stmt_get_result($Consult);
                    echo ("Se elimino la cita seleccionada");
        
                }
                else{
                    echo ("error al eliminar cita");
                }
        }


    }
    


?>
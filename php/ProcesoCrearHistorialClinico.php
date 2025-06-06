<?php
if (isset($_POST['Accion'])){
    $accion= $_POST['Accion'];
    $objeto= new claseHistorialClinico();

    if($accion=="FichaIdentificacion"){
        echo $objeto->FichaIdentificacion($_POST['nombre'],$_POST['apellidoPa'],$_POST['apellidoMa'],$_POST['Ocupacion'],$_POST['LugarOrigen'],$_POST['Direccion'],$_POST['Religion'],$_POST['Escolaridad'],$_POST['fechaNacimiento'],$_POST['Sexo'],$_POST['EstadoCivil']);
    }
   

}



class claseHistorialClinico{

    public function FichaIdentificacion($nombre,$apellidoPa,$apellidoMa,$Ocupacion,$LugarOrigen,$Direccion,$Religion,$Escolaridad,$fechaNacimiento,$Sexo,$EstadoCivil){
        session_start();
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])){
             $bd_Host= "localhost";
             $bd_Nombre="consultorio";
             $bd_Usuario="root";
             $bd_Password="";
             $Conexion= @mysqli_connect($bd_Host,$bd_Usuario,$bd_Password,$bd_Nombre) or die("No se puede conectar a la base de datos");
             
             if($_SERVER["REQUEST_METHOD"]== "POST"){     
                $sql = "SELECT COUNT(*) AS total FROM FichaIdentificacion";
                $resultado = mysqli_query($Conexion, $sql);
                if ($resultado) {
                    // Obtener el número total de filas
                    $fila = mysqli_fetch_assoc($resultado);
                    $total_citas = $fila['total'];
                } else {
                    $total_citas = 0;
                }

                
                            $Consulta= "INSERT INTO fichaidentificacion (idFichaIdentificacion, nombre, apellidoPa, apellidoMa, Ocupacion, LugarOrigen, Direccion, Religion, Escolaridad, fechaNacimiento, Sexo, EstadoCivil) VALUES ('FC$total_citas','$nombre','$apellidoPa','$apellidoMa','$Ocupacion','$LugarOrigen','$Direccion','$Religion','$Escolaridad','$fechaNacimiento','$Sexo','$EstadoCivil')";
                            if(mysqli_query($Conexion,$Consulta)){
                                echo 'Historial Clinico Registrado ';
                                $this->AntecedentesHF('FC'.$total_citas);
                                $this->AntecedentesPP('FC'.$total_citas);
                            }
                            else
                                echo "Error al ejecutar la consulta:".mysqli_error($Conexion);
        }
    
    
     mysqli_close($Conexion);  
    

        }
        else
        header('Location: IniciarSesion.php');
    }
    public function AntecedentesHF($id){
        
             $bd_Host= "localhost";
             $bd_Nombre="consultorio";
             $bd_Usuario="root";
             $bd_Password="";
             $Conexion= @mysqli_connect($bd_Host,$bd_Usuario,$bd_Password,$bd_Nombre) or die("No se puede conectar a la base de datos");
             
             if($_SERVER["REQUEST_METHOD"]== "POST"){     
                $sql = "SELECT COUNT(*) AS total FROM antecedenteshf";
                $resultado = mysqli_query($Conexion, $sql);
                if ($resultado) {
                    // Obtener el número total de filas
                    $fila = mysqli_fetch_assoc($resultado);
                    $total_citas = $fila['total'];
                } else {
                    $total_citas = 0;
                }

                $postKeys = array_keys($_POST);
                for ($i = 0; $i < count($postKeys); $i++) {
                    $key = $postKeys[$i];
                    if (strpos($key, 'EnfermedadP') === 0) {   
                        $Consulta= "INSERT INTO antecedenteshf (idAntecedentesHF,GrupoFamiliar,Enfermedad,idFichaIdentificacion	) VALUES ('HF$total_citas','Paterno','$_POST[$key]','$id')";
                        if(mysqli_query($Conexion,$Consulta)){
                            $sql = "SELECT COUNT(*) AS total FROM antecedenteshf";
                            $resultado = mysqli_query($Conexion, $sql);
                            if ($resultado) {
                                // Obtener el número total de filas
                                $fila = mysqli_fetch_assoc($resultado);
                                $total_citas = $fila['total'];
                            } else {
                                $total_citas = 0;
                            }
                        }
                        else
                            echo "Error al ejecutar la consulta:".mysqli_error($Conexion);


                    }
                    
                }

                $sql = "SELECT COUNT(*) AS total FROM antecedenteshf";
                $resultado = mysqli_query($Conexion, $sql);
                if ($resultado) {
                    // Obtener el número total de filas
                    $fila = mysqli_fetch_assoc($resultado);
                    $total_citas = $fila['total'];
                } else {
                    $total_citas = 0;
                }

                for ($i = 0; $i < count($postKeys); $i++) {
                    $key = $postKeys[$i];
                    if (strpos($key, 'EnfermedadM') === 0) {
                        $Consulta= "INSERT INTO antecedenteshf (idAntecedentesHF,GrupoFamiliar,Enfermedad,idFichaIdentificacion	) VALUES ('HF$total_citas','Materno','$_POST[$key]','$id')";
                        if(mysqli_query($Conexion,$Consulta)){
                            $sql = "SELECT COUNT(*) AS total FROM antecedenteshf";
                            $resultado = mysqli_query($Conexion, $sql);
                            if ($resultado) {
                                // Obtener el número total de filas
                                $fila = mysqli_fetch_assoc($resultado);
                                $total_citas = $fila['total'];
                            } else {
                                $total_citas = 0;
                            }
                        }
                        else
                            echo "Error al ejecutar la consulta:".mysqli_error($Conexion);


                    }
                    

                }

        }
    
    
     mysqli_close($Conexion);  
    
        
       
    }
    public function AntecedentesPP($id){
           $bd_Host= "localhost";
             $bd_Nombre="consultorio";
             $bd_Usuario="root";
             $bd_Password="";
             $Conexion= @mysqli_connect($bd_Host,$bd_Usuario,$bd_Password,$bd_Nombre) or die("No se puede conectar a la base de datos");
             
             if($_SERVER["REQUEST_METHOD"]== "POST"){     
                $sql = "SELECT COUNT(*) AS total FROM antecedenteshf";
                $resultado = mysqli_query($Conexion, $sql);
                if ($resultado) {
                    // Obtener el número total de filas
                    $fila = mysqli_fetch_assoc($resultado);
                    $total_citas = $fila['total'];
                } else {
                    $total_citas = 0;
                }

                $postKeys = array_keys($_POST);
                for ($i = 0; $i < count($postKeys); $i++) {
                    $key = $postKeys[$i];
                    if (strpos($key, 'AntecedentePP') === 0) {   
                        $Consulta= "INSERT INTO antecedentespp (idAntecedentesPP,nombre,idFichaIdentificacion	) VALUES ('HF$total_citas','$_POST[$key]','$id')";
                        if(mysqli_query($Conexion,$Consulta)){
                            $sql = "SELECT COUNT(*) AS total FROM antecedentespp";
                            $resultado = mysqli_query($Conexion, $sql);
                            if ($resultado) {
                                // Obtener el número total de filas
                                $fila = mysqli_fetch_assoc($resultado);
                                $total_citas = $fila['total'];
                            } else {
                                $total_citas = 0;
                            }
                        }
                        else
                            echo "Error al ejecutar la consulta:".mysqli_error($Conexion);


                    }
                    
                }
        }
    
    
     mysqli_close($Conexion);  
    

    }
    public function AntecedentesGO($id){

    }
    public function PadecimientoActual(){
    }





}

?>
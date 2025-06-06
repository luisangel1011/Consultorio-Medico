<?php
session_start();
if(isset($_POST['accion'])) {
    $accion = $_POST['accion'];
    $objeto = new MiClase();

    if($accion == "metodo1") {
        echo $objeto->CerrarSesion();
    } 
    // elseif($accion == "metodo2") {
    //     echo $objeto->miMetodo2();
    // }
}

class MiClase {
    public function CerrarSesion() {
     session_destroy();  
    }

}
?>

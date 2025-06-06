
$(document).ready(function() {
    var datos= new FormData();
    datos.append('Accion','ActualizarDatosC');

    $.when(
        $.ajax({

            url:'php/procesoActualizarC.php',
            type:'POST',
            data:datos,
            contentType:false,
            processData:false
        })).then(
        function exito(datos,status){
            console.log(datos);
        },
        function error(){
            console.log("error ");
        }
    );
});


function MostrarActualizarCita() {
    var iframe = document.getElementsByClassName("iVent")[0];
    iframe.style.display='block';
    iframe.src='ActualizarCita.php';
    iframe.style.width = '100%';
    iframe.style.height = '100%';
    iframe.style.border = 'none';
}    

function MostrarGenerarCita() {
    var iframe = document.getElementsByClassName("iVent")[0];
    iframe.style.display='block';
    iframe.src='AgendarCita.php';
    iframe.style.width = '100%';
    iframe.style.height = '100%';
    iframe.style.border = 'none';
}

function MostrarPerfil() {
    var iframe = document.getElementsByClassName("iVent")[0];
    iframe.style.display='block';
    iframe.src='Perfil.php';
    iframe.style.width = '100%';
    iframe.style.height = '100%';
    iframe.style.border = 'none';
}
function MostrarEliminarCita(){
    var iframe = document.getElementsByClassName("iVent")[0];
    iframe.style.display='block';
    iframe.src='EliminarCita.php';
    iframe.style.width = '100%';
    iframe.style.height = '100%';
    iframe.style.border = 'none';
}
function MostrarHistorialClinico(){
    var iframe = document.getElementsByClassName("iVent")[0];
    iframe.style.display='block';
    iframe.src='HistorialClinico.php';
    iframe.style.width = '100%';
    iframe.style.height = '100%';
    iframe.style.border = 'none';
}

function MostrarL(){
    var iframe = document.getElementsByClassName("separacion")[0];
    if(iframe.style.display=='block')
    iframe.style.display='none';
    else
    iframe.style.display='block';
    
}

$('.CerrarSesion').click(function(){
    $.post("php/ProcesoCerrarS.php", {accion: "metodo1"}, function(data){
        window.location.href="IniciarSesion.php";
    });
});

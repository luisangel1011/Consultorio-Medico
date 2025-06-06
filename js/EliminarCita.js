

function Seleccion(dato){
    document.getElementsByClassName("txtId")[0].value=dato;
}

function Cancelar(){
    document.getElementsByTagName("input")[0].value = "";
    
}



function notificar(S){
    var txt = document.getElementsByClassName("txtError")[0];
    var error = document.getElementsByClassName("error")[0];

    error.textContent=S;
    txt.style.display='block';
    window.scrollTo({ top: 0, behavior: 'smooth' })

}


$(document).ready(function() {
    $('.Tabla').empty();
    var datos= new FormData();
    var texto="";
    datos.append('Accion','MostrarDatos');
    datos.append('texto',texto);

    $.when(
        $.ajax({

            url:'php/ProcesoEC.php',
            type:'POST',
            data:datos,
            contentType:false,
            processData:false
        })).then(
        function exito(datos,status){
            
            $('.Tabla').html('<tr><th>Clave</th><th>Nombre</th>'+
    '<th>Apellido paterno</th><th>Apellido Materno</th>'+
    '<th>Fecha y hora</th><th>Estado</th></tr>'+datos);
   
        },
        function error(){
            console.log("error ");
        }
    );

});

$('.busqueda').on('keyup', function(){
        
    $('.Tabla').empty();
    var datos= new FormData();
    
    datos.append('Accion','MostrarDatos');
    datos.append('texto',$(".btext").val());
    console.log(datos.texto);

    $.when(
        $.ajax({

            url:'php/ProcesoEC.php',
            type:'POST',
            data:datos,
            contentType:false,
            processData:false
        })).then(
        function exito(datos,status){
            
            $('.Tabla').html('<tr><th>Clave</th><th>Nombre</th>'+
    '<th>Apellido paterno</th><th>Apellido Materno</th>'+
    '<th>Fecha y hora</th><th>Estado</th></tr>'+datos);

    
        },
        function error(){
            console.log("error ");
        }
    );

    
});

$('.Tabla').on('click', '.casilla', function(){
    var Id= $(this).attr('data-id');
    var datosModificar= new FormData();
    var bool= confirm("seguro de eliminar la cita?");
    if (bool){
        datosModificar.append('id',Id)
        datosModificar.append('Accion','EliminarDatos');

        $.when(
            $.ajax({
                url:'php/ProcesoEC.php',
                type:'post',
                data:datosModificar,
                contentType:false,
                processData:false
            })).then(
                function exito(datos,status){
                    alert(datos);
                    window.location.href="EliminarCita.php";
                },
                function error(){
                    alert("error al tratar de eliminar la cita seleccionada")
                }
            );
    }
    else{
        alert("Cancelacion de eliminacion");
    }
   


});

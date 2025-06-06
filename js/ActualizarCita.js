var id;

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


function Seleccion(dato){
    arreglo=dato.split(',');
    

    document.getElementsByClassName("txtNombre")[0].value=arreglo[1];
    document.getElementsByClassName("txtApellidoP")[0].value=arreglo[2];
    document.getElementsByClassName("txtApellidoM")[0].value=arreglo[3];
    document.getElementsByClassName("txtfecha")[0].value=arreglo[4];


}

function Mostrar(){
    
}

$('.Tabla').on('click', '.casilla', function(){
    var Id= $(this).attr('data-id');
    id=Id;
    Seleccion(Id);
    
    //document.getElementsByClassName("txtNombre")[0].value=arreglo[1];
    //txt.style.display='block';
    $('.contenido').hide();


});

$('.SelectCitas').on('click', function(){
    $('.contenido').show();
    

});
   

$(document).ready(function() {
    $('.Tabla').empty();
    var datos= new FormData();
    var texto="";
    datos.append('Accion','MostrarDatos');
    datos.append('texto',texto);

    $.when(
        $.ajax({

            url:'php/ProcesoActualizarC.php',
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

            url:'php/ProcesoActualizarC.php',
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
     


    $('.btnActualizar').on('click',function(){
        var datosModificar= new FormData();
        var Id=id.split(',');
        
        $id=Id[0];
        $estado= Id[5];
        
        var bool= confirm("seguro de Modificar la cita?");
        if (bool){
       
            if ($('.txtNombre').val()!="" && $('.txtApellidoP').val()!="" && $('.txtApellidoM').val()!=""){
                var dataId = $('.txtfecha').attr('data-id');
                
                if (dataId!='false' || dataId==undefined){
                        datosModificar.append('txtNombre',$('.txtNombre').val());
                        datosModificar.append('txtApellidoP',$('.txtApellidoP').val());
                        datosModificar.append('txtApellidoM',$('.txtApellidoM').val());
                        datosModificar.append('txtfecha',$('.txtfecha').val());
                        datosModificar.append('id',$id);
                        datosModificar.append('estado',$estado);
                        datosModificar.append('Accion',"ActualizarC");
                
                    
                    console.log(datosModificar);
                    $.when(
                        $.ajax({

                            url:'php/procesoActualizarC.php',
                            type:'POST',
                            data:datosModificar,
                            contentType:false,
                            processData:false
                        })).then(
                        function exito(datos,status){
                            window.location.href="ActualizarCita.php";
                            alert(datos);
                        },
                        function error(){
                            alert("error al tratar de modificar cita del paciente");
                        }
                    );
                }
                else
                alert("el horario empalma con una cita registrada")
            }
            else {
                alert("debe de tener informacion en las casillas")
            }
        }
        else{
            alert("Cancelacion de modificación");
            Cancelar();
        }  
    });

    

    function Cancelar(){
        var mimenu= document.getElementsByClassName("slcita")[0];
        mimenu.value="Selecciona una opción";
        document.getElementsByTagName("input")[0].value = "";
        document.getElementsByTagName("input")[1].value = "";
        document.getElementsByTagName("input")[2].value = "";
        document.getElementsByTagName("input")[3].value = "";

    }  

    function notificar(S){
        var txt = document.getElementsByClassName("txtError")[0];
        var error = document.getElementsByClassName("error")[0];
    
        error.textContent=S;
        txt.style.display='block';
        window.scrollTo({ top: 0, behavior: 'smooth' })
    
    }
    
    $(document).ready(function(){
        $('.txtfecha').on('change', function(){

            var Id=id.split(',');
            $id=Id[0];

            var datos = new FormData();
            datos.append('txtfecha', $(this).val());
            datos.append('id', $id);
            datos.append('Accion', "Verificador");
            
            $.ajax({
                url: 'php/ProcesoAgendarC.php',
                type: 'post',
                data: datos,
                contentType: false,
                processData: false,
                success: function(datos, status) {
                    
                    if (datos == "si") {
                        
                        $('.txtfecha').css('background-color', 'green');
                        $('.txtfecha').attr('data-id', 'true');
                    } else {
                        $('.txtfecha').css('background-color', 'red'); // Cambiar a blanco u otro color según lo necesites
                        $('.txtfecha').attr('data-id', 'false');
                    }
                   
                   
                },
                error: function() {
                    notificar("Error al tratar de Agendar cita del paciente");
                }
            });           
        });

    });
    
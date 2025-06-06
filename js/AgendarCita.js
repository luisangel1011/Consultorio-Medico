
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


function Cancelar(){
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

$('.agendar').click(function(){
if ($('#txtNombre').val()!="" && $('#txtApellidoP').val()!="" &&  $('#txtfecha').val()!=""){
    var now= new Date(), FechaSelect= new Date($('#txtfecha').val()), datos= new FormData();
    
    if ( $('.txtfecha').attr('data-id')!='false'){
        
        datos.append('txtNombre',$('#txtNombre').val());
        datos.append('txtApellidoP',$('#txtApellidoP').val());
        datos.append('txtApellidoM',$('#txtApellidoM').val());
        datos.append('txtfecha',$('#txtfecha').val());
        datos.append('Accion', "RegistrarC");
        

        $.when(
            $.ajax({

                url:'php/ProcesoAgendarC.php',
                type:'post',
                data:datos,
                contentType:false,
                processData:false
            })).then(
            function exito(datos,status){
                notificar(datos)
                Cancelar();
            },
            function error(){
                notificar("error al tratar de Agendar cita del paciente");
            }
        );           

    }
    else
    notificar("no se puede realizar la operacion *fecha y hora Invalidas*");
 }
 else{
    notificar("no se puede realizar la operacion *Falta de datos necesarios*")
 }
});

$(document).ready(function(){
    $('.txtfecha').on('change', function(){
        var datos = new FormData();
        datos.append('txtfecha', $(this).val());
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

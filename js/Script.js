
function MostrarRegistro() {
    var iframe = document.getElementsByClassName("Registro")[0];
    iframe.style.display='block';
    iframe.src='Registro.php';
    iframe.style.width = '100%';
    iframe.style.height = '100%';
    iframe.style.border = 'none';
}    

function OcultarRegistro() {
    var iframe = parent.document.getElementsByClassName("Registro")[0];
    iframe.style.display='none';
    iframe.src='';
    iframe.style.width = '10%';
    iframe.style.height = '10%';
    iframe.style.border = 'none';

}

$('.Registrar').click(function(){
    var datos= new FormData();
    var Contraseña;
    
    if ($('#txtContraseña').val()== $('#txtContraseña2').val()){
        if ($('#txtNombre').val()!="" && $('#txtApellidoPa').val()!="" && $('#txtUsuario').val()!="" && $('#txtCedula').val()!=""){
            datos.append('txtUsuario',$('#txtUsuario').val());
            datos.append('txtContraseña',$('#txtContraseña').val());
            datos.append('txtNombre',$('#txtNombre').val());
            datos.append('txtApellidoPa',$('#txtApellidoPa').val());
            datos.append('txtApellidoMa',$('#txtApellidoMa').val());
            datos.append('txtCedula',$('#txtCedula').val());
            datos.append('Accion', "RegistrarC")

            $.when(
                $.ajax({

                    url:'php/ProcesoRe.php',
                    type:'post',
                    data:datos,
                    contentType:false,
                    processData:false
                })).then(
                function exito(datos,status){
                    notificar(datos)
                   Limpiar();
                },
                function error(){
                    notificar("error al tratar de modificar cita del paciente");
                }
            );           
            
        }
        else{
            notificar("No se puede realizar el registro, debido a falta de datos")
        }
    }
    else{
        notificar("no se puede hacer el registro, contraseñas no parecidas");
    }
     

    
});

function Limpiar() {

   
        document.getElementsByTagName("input")[0].value = "";
        document.getElementsByTagName("input")[1].value = "";
        document.getElementsByTagName("input")[2].value = "";
        document.getElementsByTagName("input")[3].value = "";
        document.getElementsByTagName("input")[4].value = "";
        document.getElementsByTagName("input")[5].value = "";
        document.getElementsByTagName("input")[6].value = "";
        
        
    
}

function notificar(S){
    var txt = document.getElementsByClassName("txtError")[0];
    var error = document.getElementsByClassName("error")[0];

    error.textContent=S;
    txt.style.display='block';
    window.scrollTo({ top: 0, behavior: 'smooth' })

}
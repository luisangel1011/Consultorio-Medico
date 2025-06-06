$('#agregarP').on('click', function(){
            
    $puntos = $('.listaP').find('li').length;
    $('.listaP').append('<li for="">Enfermedad:<input type="text" class="EnfermedadP'+$puntos+'"></li>');


    
});

$('#agregarM').on('click', function(){
            
    $puntos = $('.listaM').find('li').length;
    $('.listaM').append('<li for="">Enfermedad:<input type="text" class="EnfermedadM'+$puntos+'"></li>');


    
});

$('#agregarPP').on('click', function(){
            
    $puntos = $('.listaPP').find('li').length;

    $('.listaPP').append('<li for="">Antecedente:<input type="text" class="AntecedentePP'+$puntos+'"></li>');


    
});

$('#agregarETS').on('click', function(){
            
    $puntos = $('.listaETS').find('li').length;

    $('.listaETS').append('<li for="">Enfermedad:<input type="text" class="EnfermedadETS'+$puntos+'"></li>');


    
});

$('.Agregar').on('click', function(){

   // Obtener todos los elementos input
   var inputs = $('input');
   var textareas = $('textarea');
   $boole=true;

   

   // Iterar sobre los inputs y mostrar sus valores
   for (var i = 0; i < inputs.length; i++) {
        if($(inputs[i]).val()==""){
            $boole=false;
        }
   }

   for (var i = 0; i < textareas.length; i++) {
    if($(textareas[i]).val()==""){
        $boole=false;
    }
}
   // Mostrar mensaje con la cantidad de inputs
  if ($boole==false){
    alert("no se puede dejar un recuadro vacío");
  }
  else{
    var datos= new FormData();
   
    //ficha identificacion
    datos.append('nombre',$('.NombreFI').val());
    datos.append('apellidoPa',$('.ApPFI').val());
    datos.append('apellidoMa',$('.ApMFI').val());
    datos.append('Ocupacion',$('.OcupacionFI').val());
    datos.append('EstadoCivil', $('.CivilFI').val());
    datos.append('LugarOrigen',$('.LugarFI').val());
    datos.append('Religion',$('.ReligionFI').val());
    datos.append('Direccion',$('.ResidenciaFI').val());
    datos.append('Escolaridad',$('.EscolaridadFI').val());
    datos.append('fechaNacimiento', $('.FNacFI').val());
    datos.append('Sexo',$('.SexFI').val());
    

    //antecedentes heredo familiares
    $puntos = $('.listaP').find('li').length;

    for ( $i = 0; $i < $puntos; $i++) {

        
        datos.append('EnfermedadP'+$i ,$('.listaP').find('.EnfermedadP'+$i).val());

        
    }

    $puntos = $('.listaM').find('li').length;

    for ( $i = 0; $i < $puntos; $i++) {
       
        datos.append('EnfermedadM'+$i ,$('.listaM').find('.EnfermedadM'+$i).val());

        
    }

    //antecedentes personales patologicos

    $puntos = $('.listaPP').find('li').length;

    for ( $i = 0; $i < $puntos; $i++) {
       
        datos.append('AntecedentePP'+$i ,$('.listaPP').find('.AntecedentePP'+$i).val());

        
    }

    //Antecedentes gineco-obstetricos
    datos.append('EdadGO',$('.EdadGO').val());
    datos.append('estadoGO',$('.estadoGO').val());
    datos.append('DuracionGO',$('.DuracionGO').val());

    $puntos = $('.listaETS').find('li').length;

    for ( $i = 0; $i < $puntos; $i++) {
       
        datos.append('EnfermedadETS'+$i ,$('.listaETS').find('.EnfermedadETS'+$i).val());

        
    }
    //padecimiento Actual

    datos.append('Sintomas',$('.Sintomas').val());
    datos.append('FC',$('.FC').val());
    datos.append('FR',$('.FR').val());
    datos.append('TA',$('.TA').val());
    datos.append('TAM',$('.TAM').val());
    datos.append('SPO2',$('.SPO2').val());
    datos.append('TEMP',$('.TEMP').val());
    datos.append('PESO',$('.PESO').val());
    datos.append('TALLA',$('.TALLA').val());
    datos.append('Recomendaciones',$('.Recomendaciones').val());
    datos.append('Accion',"FichaIdentificacion");

    for (const entry of datos) {
        console.log(entry);
    }
    $.when(
        $.ajax({

            url:'php/ProcesoCrearHistorialClinico.php',
            type:'post',
            data:datos,
            contentType:false,
            processData:false
        })).then(
        function exito(datos,status){
            alert(datos)
            Cancelar();
        },
        function error(){
            alert("error al tratar de Agendar cita del paciente");
        }
    );           

}
   
});



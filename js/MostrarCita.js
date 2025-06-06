 
 $(document).ready(function() {
    $('.Tabla').empty();
    var datos= new FormData();
    var texto="";
    datos.append('Accion','MostrarDatos');
    datos.append('texto',texto);

    $.when(
        $.ajax({

            url:'php/ProcesoMostrar.php',
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
    
                url:'php/ProcesoMostrar.php',
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


function Seleccion(dato){
       var arreglo=dato.split(',');
        
    
      
    
    return arreglo;    
}
    
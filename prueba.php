<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accionar Métodos PHP con jQuery</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <button id="btnMetodo1">Accionar Método 1</button>
    <button id="btnMetodo2">Accionar Método 2</button>

    <script>
    $(document).ready(function(){
        $("#btnMetodo1").click(function(){
            $.post("php/ProcesoCerrarS.php", {accion: "metodo1"}, function(data){
                alert(data); // Muestra la respuesta del servidor
            });
        });

        $("#btnMetodo2").click(function(){
            $.post("php/ProcesoCerrarS.php", {accion: "metodo2"}, function(data){
                alert(data); // Muestra la respuesta del servidor
            });
        });
    });
    </script>
</body>
</html>

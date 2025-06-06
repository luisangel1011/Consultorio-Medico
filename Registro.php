<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Registro.css">
</head>
<body>

   
    <center>
            <nav class="miNav" >
                <header>
                <div class="btnCerrar" onclick="OcultarRegistro() "><label >X</label></div>

                    <H2>Crear cuenta</H2>
                </header>
                <div class="txtError"><label class="error" value=""> Se encuentra un error</label></div>

                <div><h3>Nombre </h3><input type="text" id="txtNombre" name="txtNombre" class="texto" required></div>
                <div><h3>Apellido paterno</h3> <input type="text" id="txtApellidoPa" name="txtApellidoPa" class="texto" required></div>
                <div><h3>Apellido materno</h3><input type="text" id="txtApellidoMa" name="txtApellidoMa" class="texto"></div>
                <div><h3>Usuario</h3><input type="text" id="txtUsuario" name="txtUsuario" class="texto" required></div>
                <div><h3>Numero de cedula</h3><input type="text" id="txtCedula" name="txtCedula" class="texto" required minlength="7" maxlength="7"></div>
                <div><h3>Contraseña</h3><input type="password" id="txtContraseña"  name="txtContraseña" class="texto" required  ></div>
                <div><h3>Repetir contraseña </h3><input type="password" id="txtContraseña2"  name="txtContraseña2" class="texto" required></div>
                <div class="btnRegistrar"><input type="submit" value="Registrar" class="Registrar"  name="Registrar"></div>  


            </nav>
        
    

</center>

<script src="js/jquery-3.5.0.min.js"></script>

<script src="js/Script.js"></script>
</body>
</html>
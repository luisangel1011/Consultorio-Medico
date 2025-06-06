<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CrearHistorialClinico.css">
</head>
<body>
    <div class="pagina">
    <header>
       <center><h1 class="Portada">Historial Clinico</h1></center> 
    </header>

    <body>
    <center>
            <div class="FichaIdentificacion" id="txt">
            <center><label for=""><b>Ficha identificacion</b></label></center>


                <label for="">nombre: <input type="text" class="NombreFI"></label>
                <label for="">Apellido Paterno: <input type="text" class="ApPFI"></label>
                <label for="">Apellido Materno: <input type="text" class="ApMFI"></label>
                <label for="">Ocupación: <input type="text" class="OcupacionFI"></label>
                <label for="">Estado civil: <select class="CivilFI" >
                <option value="Soltero/a">Soltero/a.</option>
                <option value="Casado/a">Casado/a.</option>
                <option value="Divorciado/a">Divorciado/a.</option>
                <option value="Separado/a en proceso judicial">Separado/a en proceso judicial.</option>
                <option value="Viudo/a">Viudo/a.</option>
                <option value="union libre">union libre.</option>
                </select></label>


                <label for="">Lugar de Origen: <input type="text" class="LugarFI"></label>
                <label for="">Religión: <input type="text" class="ReligionFI"></label>
                <label for="">Lugar de residencia: <input type="text" class="ResidenciaFI"></label>
                <label for="">Escolarídad: <select class="EscolaridadFI" >
                <option value="Kinder">Kinder.</option>
                <option value="Primaria">Primaria.</option>
                <option value="Secundaria">Secundaria.</option>
                <option value="Preparatoria">Preparatoria.</option>
                <option value="Universidad">Universidad.</option>
                </select></label>
                <label for="">Fecha de nacimiento: <input type="date" class="FNacFI"></label>
                <label for="">Sexo: 
                <select class="SexFI">
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
                <option value="No binario">No binario</option>
                </select></label>


            </div>
            <div class="AntecedentesHF" id="txt">
                <center><label for=""><b>Antecedentes heredo familiares</b></label></center>


                <label for=""><b>enfermedades transmitidos por parte paterno:</b></label>
                <i class="fa-solid fa-circle-plus" id="agregarP" ></i>
                <ol class="listaP">
                    
                    
                
                </ol>
                <label for=""><b>Enfermedades transmitidos por parte materno:</b></label>
                <i class="fa-solid fa-circle-plus" id="agregarM" ></i>
                <ol class="listaM">
                
                
                </ol>
            </div>
            <div class="AntecedentesPP" id="txt">
            <center><label for=""><b>Antecedentes personales patologicos</b></label></center>



                <label for=""><b>Antecedentes Generales:</b></label>
                <i class="fa-solid fa-circle-plus" id="agregarPP" ></i>
                <ol class="listaPP">
                    
                    
                
                </ol>
            </div>

            <div class="AntecedentesGO" id="txt">
            <center><label for=""><b>Antecedentes gineco-obstétricos</b></label></center>


            <label for=""><b>Menarquia:</b> </label>
            <label for=""><b>edad:<input type="number" class="EdadGO"> años</b> </label>

            <label for=""><b>Ciclo Menstrual:</b> </label>
            <ol>
                    <li for="">estado:<select id="combobox" name="combobox" class="estadoGO">
                <option value="Regular">Regular</option>
                <option value="Irregular">Irregular</option>
                <option value="Nulo">Nulo</option>
                </select></li>
                    <li for="">Duracion:<input type="number" class="DuracionGO"> dias</li>
                
            </ol>
            
            <label for=""><b>Historial de infecciones:</b> </label>
            <i class="fa-solid fa-circle-plus" id="agregarETS" ></i>
                <ol class="listaETS">
                
                
                </ol>

                
            </div>
            <div class="PadecimientoActual" id="txt">
            <center><label for=""><b>Padecimiento Actual</b></label></center>


            <label for=""><b>Sintomas:</b></label>
            <textarea id="largeTextBox" name="largeTextBox" class="Sintomas"></textarea>

            <table border="1">
                <thead>
                    <tr>
                        <th >FC</th>
                        <th >FR</th>
                        <th >TA</th>
                        <th >TAM</th>
                        <th >SPO2</th>
                        <th >TEMP</th>
                        <th >PESO</th>
                        <th >TALLA</th>
                    </tr>
                    <tr>
                        <th ><input type="number" class="FC"> l/min</th>
                        <th ><input type="number" class="FR"> r/min</th>
                        <th ><input type="number" class="TA"> mmHg</th>
                        <th ><input type="number" class="TAM"> mmHg</th>
                        <th ><input type="number" class="SPO2">%</th>
                        <th ><input type="number" class="TEMP">°C</th>
                        <th ><input type="number" class="PESO">Kg</th>
                        <th ><input type="number" class="TALLA">m</th>
                    </tr>
                
                </thead>
            </table>
            <label for=""><b>Recomendaciones:</b></label>
            <textarea id="largeTextBox" name="largeTextBox" class="Recomendaciones"></textarea>

            </div>
            <div class="Idx-Plan" id="txt">
            <center><label for=""><b>Idx-Plan</b></label></center>


            <textarea id="largeTextBox" name="largeTextBox"></textarea>
            </div>

            <center><button class="Agregar">Guardar Cambios</button></center>

    </body>
    

    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="https://kit.fontawesome.com/d3646121c5.js" crossorigin="anonymous"></script>
    <script src="js/CrearHistorialClinico.js"></script>


</body>
</html>
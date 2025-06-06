<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="HistorialClinico.css">
    <link rel="stylesheet" href="Emergente.css">

</head>
<body onload="FichaIdentificacion()">
    <?php 

    session_start();
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
    }
    else
    header('Location: IniciarSesion.php');
    ?>
    <header>
        <center>
            <h1>Historial Clinico</h1>
        </center>
    </header>
    <div class="plantilla">
      
    <div class="tooltip">
        <i class="fa-solid fa-circle-plus" id="agregarIcon" ></i>
        <div class="tooltiptext">Nuevo Historial Clinico</div>
    </div>

    

    
        <center><label for="Busqueda:" class='busqueda' >Busqueda:<i class="fa-solid fa-magnifying-glass" id="lupa"><input type="text" class="btext"></i></label></center>
            
            <table border="1">
                <thead>
                    <tr>
                        <th class="pestaña" onclick="FichaIdentificacion()">Ficha identificacion</th>
                        <th class="pestaña" onclick="AntecedentesHF()">Antecedentes Heredo Familiares</th>
                        <th class="pestaña" onclick="AntecedentesPP()">Antecedentes personales Patologicos</th>
                        <th class="pestaña" onclick="AntecedentesGO()">Antecedentes gineco-obstetricos</th>
                        <th class="pestaña" onclick="PadecimientoActual()">Padecimiento Actual</th>
                        <th class="pestaña" onclick="Idx_Plan()">Idx-Plan</th>
                    </tr>
                
                </thead>
            </table>
            
            
            <center>
            <div class="FichaIdentificacion" id="txt">
    
            <div class="ModificarIcon">
                <div class="tooltip">
                    <i class="fa-solid fa-file-pen" id="ModificarIcon"></i>                    
                        <div class="tooltiptext">Modificar Historial Clinico</div>
                    </div>
            </div>


                <label for=""><b>nombre:</b></label>
                <label for="">Edad:</label>
                <label for="">Ocupación:</label>
                <label for="">Estado civil:</label>
                <label for="">Lugar de Origen:</label>
                <label for="">Religión:</label>
                <label for="">Lugar de residencia:</label>
                <label for="">Escolarídad:</label>
                <label for="">Fecha de nacimiento:</label>
                <label for="">Responsable de atencion domiciliaria:</label>

            </div>
            
            <div class="AntecedentesHF" id="txt">

            <div class="ModificarIcon">
                <div class="tooltip">
                        <i class="fa-solid fa-file-pen" id="ModificarIcon"></i>                    
                        <div class="tooltiptext">Modificar Historial Clinico</div>
                </div>
            </div>


                <label for=""><b>enfermedades transmitidos por parte paterno:</b></label>
                <ol>
                    <li for="">Cancer de piel</li>
                    <li for="">Cardiomiopatia hipertrofica</li>
                
                </ol>
                <label for=""><b>enfermedades transmitidos por parte materno:</b></label>
                <ol>
                    <li for="">sindrome de marfan</li>
                    <li for="">cancer de prostata</li>
                    <li for="">cancer de mama</li>
                    <li for="">Cancer de pulmón</li>
                
                </ol>
            </div>
            <div class="AntecedentesPP" id="txt">

            <div class="ModificarIcon">
            <div class="tooltip">
                <i class="fa-solid fa-file-pen" id="ModificarIcon"></i>                    
                    <div class="tooltiptext">Modificar Historial Clinico</div>
                </div>
            </div>

            <label for=""><b>enfermedades:</b></label>
                <ol>
                    <li for="">sifilis:</li>
                    <li for="">cancer:</li>
                    <li for="">sida:</li>
                    <li for="">dolor de cola:</li>
                    <li for="">Lugar de residencia:</li>
                    <li for="">Religión:</li>
                    <li for="">Escolarídad:</li>
                    <li for="">Fecha de nacimiento:</li>
                    <li for="">Responsable de atencion domiciliaria:</li>
                </ol>
            </div>
            <div class="AntecedentesGO" id="txt">

            <div class="ModificarIcon">
            <div class="tooltip">
                <i class="fa-solid fa-file-pen" id="ModificarIcon"></i>                    
                    <div class="tooltiptext">Modificar Historial Clinico</div>
            </div>
            </div>

            <label for=""><b>Menarquia:</b> </label>
            <label for=""><b>edad:15 años</b> </label>

            <label for=""><b>Ciclo Menstrual:</b> </label>
            <ol>
                    <li for="">estado:Irregular</li>
                    <li for="">Duracio:4 dias</li>
                
            </ol>
            
            <label for=""><b>Historial de infecciones:</b> </label>
            <ol>
                    <li for="">herpes</li>
                    <li for="">Sida</li>
                    <li for="">Gonorrea</li>
                    <li for="">Clamidiosis</li>
                    <li for="">Tricomoniasis</li>
                    
                
            </ol>

            
            
            <ol>
                    <li for="">sifilis:</li>
                    <li for="">cancer:</li>
                    <li for="">sida:</li>
                    <li for="">dolor de cola:</li>
                    <li for="">Lugar de residencia:</li>
                    <li for="">Religión:</li>
                    <li for="">Escolarídad:</li>
                    <li for="">Fecha de nacimiento:</li>
                    <li for="">Responsable de atencion domiciliaria:</li>
                </ol>
                
            </div>
            <div class="PadecimientoActual" id="txt">

            <div class="ModificarIcon">
            <div class="tooltip">
                <i class="fa-solid fa-file-pen" id="ModificarIcon"></i>                    
                    <div class="tooltiptext">Modificar Historial Clinico</div>
                </div>
            </div>

            <label for=""><b>Sintomas:</b></label>
            <label for="">Paciente acude a consulta por primera vez, con control prenatal
                externo a esta unidad, acude por iniciar con dolor tipo obstetrico y salida 
                de flujo blaquesino de 2 horas de evolucion.
            </label>
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
                        <th >100 l/min</th>
                        <th >24 r/min</th>
                        <th >140/90 mmHg</th>
                        <th >106.7 mmHg</th>
                        <th >88%</th>
                        <th >38.5 °C</th>
                        <th >70 Kg</th>
                        <th >1.75 m</th>
                    </tr>
                
                </thead>
            </table>

            </div>
            <div class="Idx-Plan" id="txt">

            <div class="ModificarIcon">
            <div class="tooltip">
                <i class="fa-solid fa-file-pen" id="ModificarIcon"></i>                    
                    <div class="tooltiptext">Modificar Historial Clinico</div>
                </div>
            </div>

            <label for="">nombre:</label>
                <label for="">Edad:</label>
                <label for="">Ocupación:</label>
                <label for="">Estado civil:</label>
                <label for="">Lugar de Origen:</label>
                <label for="">Lugar de residencia:</label>
                <label for="">Religión:</label>
                <label for="">Escolarídad:</label>
                <label for="">Fecha de nacimiento:</label>
                <label for="">Responsable de atencion domiciliaria:</label>
            </div>
            </center>
    </div>
    
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="https://kit.fontawesome.com/d3646121c5.js" crossorigin="anonymous"></script>
    <script src="js/HistorialClinico.js"></script>

</body>
</html>
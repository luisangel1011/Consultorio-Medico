function   FichaIdentificacion(){
    document.getElementsByClassName("FichaIdentificacion")[0].style.display='block';
    document.getElementsByClassName("AntecedentesHF")[0].style.display='none';
    document.getElementsByClassName("AntecedentesPP")[0].style.display='none';
    document.getElementsByClassName("AntecedentesGO")[0].style.display='none';
    document.getElementsByClassName("PadecimientoActual")[0].style.display='none';
    document.getElementsByClassName("Idx-Plan")[0].style.display='none';
     
}
function   AntecedentesHF(){
    document.getElementsByClassName("FichaIdentificacion")[0].style.display='none';
    document.getElementsByClassName("AntecedentesHF")[0].style.display='block';
    document.getElementsByClassName("AntecedentesPP")[0].style.display='none';
    document.getElementsByClassName("AntecedentesGO")[0].style.display='none';
    document.getElementsByClassName("PadecimientoActual")[0].style.display='none';
    document.getElementsByClassName("Idx-Plan")[0].style.display='none';
    

    }
function   AntecedentesPP(){
    document.getElementsByClassName("FichaIdentificacion")[0].style.display='none';
    document.getElementsByClassName("AntecedentesHF")[0].style.display='none';
    document.getElementsByClassName("AntecedentesPP")[0].style.display='block';
    document.getElementsByClassName("AntecedentesGO")[0].style.display='none';
    document.getElementsByClassName("PadecimientoActual")[0].style.display='none';
    document.getElementsByClassName("Idx-Plan")[0].style.display='none';

    }
function   AntecedentesGO(){
    document.getElementsByClassName("FichaIdentificacion")[0].style.display='none';
    document.getElementsByClassName("AntecedentesHF")[0].style.display='none';
    document.getElementsByClassName("AntecedentesPP")[0].style.display='none';
    document.getElementsByClassName("AntecedentesGO")[0].style.display='block';
    document.getElementsByClassName("PadecimientoActual")[0].style.display='none';
    document.getElementsByClassName("Idx-Plan")[0].style.display='none';

    }
function   PadecimientoActual(){
    document.getElementsByClassName("FichaIdentificacion")[0].style.display='none';
    document.getElementsByClassName("AntecedentesHF")[0].style.display='none';
    document.getElementsByClassName("AntecedentesPP")[0].style.display='none';
    document.getElementsByClassName("AntecedentesGO")[0].style.display='none';
    document.getElementsByClassName("PadecimientoActual")[0].style.display='block';
    document.getElementsByClassName("Idx-Plan")[0].style.display='none';

    }
function   Idx_Plan(){
    document.getElementsByClassName("FichaIdentificacion")[0].style.display='none';
    document.getElementsByClassName("AntecedentesHF")[0].style.display='none';
    document.getElementsByClassName("AntecedentesPP")[0].style.display='none';
    document.getElementsByClassName("AntecedentesGO")[0].style.display='none';
    document.getElementsByClassName("PadecimientoActual")[0].style.display='none';
    document.getElementsByClassName("Idx-Plan")[0].style.display='block';

    }

$('#agregarIcon').on('click', function(){
    window.location.href="CrearHistorialClinico.php";
});

$('#ModificarIcon').on('click', function(){
    window.location.href="CrearHistorialClinico.php";
});
    
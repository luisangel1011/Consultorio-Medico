create database Consultorio;
use Consultorio;


create table AntecedentesHF(/*Antecedentes heredo familiares*/
idAntecedentesHF varchar(5),/*Autoincremental*/
GrupoFamiliar varchar(20),
Enfermedad varchar(20),
idFichaIdentificacion varchar(5),
primary key (idAntecedentesHF),
foreign key (idFichaIdentificacion) references FichaIdentificacion(idFichaIdentificacion)
);


create table AntecedentesGO(/*Antecedentes gineco-obstetricos*/
idAntecedentesGO varchar(5),
Menarquia varchar(20),
EstadoMens varchar(20),
Duracion varchar(5),
idFichaIdentificacion varchar(5),
primary key (idAntecedentesGO),
foreign key (idFichaIdentificacion) references FichaIdentificacion(idFichaIdentificacion)
);

create table AntecedentesETS(/*Antecedentes gineco-obstetricos*/
idAntecedentesETS varchar(5),
ETS varchar(20),
idAntecedentesGO varchar(5),
primary key (idAntecedentesHF),
foreign key (idAntecedentesGO) references AntecedentesGO(idAntecedentesGO)

);






create table AntecedentesPP(/*Antecedentes personales patologicos*/
idAntecedentesPP varchar(5),/*Autoincremental*/
nombre varchar(45),
idFichaIdentificacion varchar(5),
primary key (idAntecedentesPP),
foreign key (idFichaIdentificacion) references FichaIdentificacion(idFichaIdentificacion)
);

create table FichaIdentificacion(/*Paciente*/
idFichaIdentificacion varchar(5),
nombre varchar(45),
apellidoPa varchar(45),
apellidoMa varchar(45),
Ocupacion varchar(45),
LugarOrigen varchar(45),
Direccion varchar(45),
Religion varchar(45),
Escolaridad varchar(45),
fechaNacimiento date,
Sexo varchar(45),
EstadoCivil varchar(45),
primary key (idFichaIdentificacion)
);/*falta responsable de atencion domicilaria*/

create table Medico(
usuario varchar(45),
nombre varchar(45),
apellidoPa varchar(45),
apellidoMa varchar(45),
titulo varchar(45),
certificado varchar(45),
cedula varchar(45),
contraseña varchar(45),
idLugarOrigen varchar(5),
idDireccion varchar(5),
idEstadoCivil varchar(5),
telefono varchar(15),
primary key (usuario)
);


create table RelAntFicIdentificaion(
IdRelAntFicIdentificaion varchar(5),
idFichaIdentificacion varchar(5),
IdAntecedentesHF varchar(5),
primary key (IdRelAntFicIdentificaion),
foreign key (idFichaIdentificacion) references FichaIdentificacion(idFichaIdentificacion),
foreign key (idAntecedentesHF) references AntecedentesHF(idAntecedentesHF)
);


create table FichaIdentificacionAntecedentesPP(/*Antecedentes personales patologicos*/
idFichaIdentificacionAntecedentesPP varchar(5),/*Autoincremental*/
idFichaIdentificacion varchar(5),
idAntecedentesPP varchar(5),
primary key (idFichaIdentificacionAntecedentesPP),
foreign key (idFichaIdentificacion) references FichaIdentificacion(idFichaIdentificacion),
foreign key (idAntecedentesPP) references AntecedentesPP(idAntecedentesPP));




create table cita(
idCita varchar(5),
NombrePaciente varchar(15),
ApPPaciente varchar(15),
ApMPaciente varchar(15),
FechaHora Datetime,
Estado varchar(15),
IdDoctor varchar(45),
primary key (idCita),
foreign key (IdDoctor) references Medico(usuario)


);

create table idx(
idIDX varchar(5),
IDX varchar(115),
idFichaIdentificacion varchar(5),
primary key (idIDX),
foreign key (idFichaIdentificacion) references FichaIdentificacion(idFichaIdentificacion)


);

create table PadecimientoA(
    idPadecimientoA varchar(5),
    Sintomas varchar(500),
    FC varchar(5),
    FR varchar(5),
    TA varchar(5),
    TAM varchar(5),
    SPO2 varchar(5),
    TEMP varchar(5),
    PESO varchar(5),
    TALLA varchar(5),
    Recomendaciones varchar(500),
    idFichaIdentificacion varchar(5),
    primary key (idPadecimientoA),
    foreign key (idFichaIdentificacion) references FichaIdentificacion(idFichaIdentificacion)


);

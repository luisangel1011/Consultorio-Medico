create database Consultorio;
use Consultorio;


create table Religion(
idReligion varchar(5),/*Autoincremental*/
nombre varchar(45),
primary key (idReligion));

create table Escolaridad(
idEscolaridad varchar(5),/*Autoincremental*/
nombre varchar(45),
primary key (idEscolaridad));

create table LugarOrigen(
idLugarOrigen varchar(5),/*Autoincremental*/
ciudad varchar(45),
municipio varchar(45),
colonia varchar(45),
calle varchar(45),
noExterior varchar(45),
noInterior varchar(45),
codigoPostal varchar(45),
primary key (idLugarOrigen));


create table Direccion(
idDireccion varchar(5),/*Autoincremental*/
ciudad varchar(45),
municipio varchar(45),
colonia varchar(45),
calle varchar(45),
noExterior varchar(45),
noInterior varchar(45),
codigoPostal varchar(45),
primary key (idDireccion));

create table Ocupacion(
idOcupacion varchar(5),/*Autoincremental*/
nombre varchar(45),
primary key (idOcupacion));

create table EstadoCivil(
idEstadoCivil varchar(5),/*Autoincremental*/
nombre varchar(45),
primary key (idEstadoCivil));


create table AntecedentesHF(/*Antecedentes heredo familiares*/
idAntecedentesHF varchar(5),/*Autoincremental*/
GrupoFamiliar varchar(20),
Enfermedad varchar(20),
primary key (idAntecedentesHF)
);


create table AntecedentesPP(/*Antecedentes personales patologicos*/
idAntecedentesPP varchar(5),/*Autoincremental*/
nombre varchar(45),
primary key (idAntecedentesPP));

create table FichaIdentificacion(/*Paciente*/
idFichaIdentificacion varchar(5),
nombre varchar(45),
apellidoPa varchar(45),
apellidoMa varchar(45),
idOcupacion varchar(5),
idLugarOrigen varchar(5),
idDireccion varchar(5),
idReligion varchar(5),
idEscolaridad varchar(5),
fechaNacimiento date,
idEstadoCivil varchar(5),
primary key (idFichaIdentificacion),
foreign key (idOcupacion) references Ocupacion(idOcupacion),
foreign key (idLugarOrigen) references LugarOrigen(idLugarOrigen),
foreign key (idDireccion) references Direccion(idDireccion),
foreign key (idEstadoCivil) references EstadoCivil(idEstadoCivil),
foreign key (idReligion) references Religion(idReligion),
foreign key (idEscolaridad) references Escolaridad(idEscolaridad)
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
primary key (usuario),
foreign key (idLugarOrigen) references LugarOrigen(idLugarOrigen),
foreign key (idDireccion) references Direccion(idDireccion),
foreign key (idEstadoCivil) references EstadoCivil(idEstadoCivil)
);


create table RelAntFicIdentificaion(
IdRelAntFicIdentificaion varchar(5),
idFichaIdentificacion varchar(5),
IdAntecedentesHF varchar(5),
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



create table HistorialClinico(/*Paciente*/
idHistorialClinico varchar(5),
idAntecedentesHF varchar(5),
primary key (idHistorialClinico),
foreign key (idAntecedentesHF) references AntecedentesHF(idAntecedentesHF)
);



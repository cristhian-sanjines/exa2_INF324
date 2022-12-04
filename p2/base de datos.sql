--DENTRO DE LA BASE DE DATOS 

CREATE TABLE `flujoproceso` (
  `Flujo` varchar(3) DEFAULT NULL,
  `Proceso` varchar(3) DEFAULT NULL,
  `ProcesoSiguiente` varchar(3) DEFAULT NULL,
  `Tipo` varchar(1) DEFAULT NULL,
  `Pantalla` varchar(20) DEFAULT NULL,
  `Rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `flujoproceso` (`Flujo`, `Proceso`, `ProcesoSiguiente`, `Tipo`, `Pantalla`, `Rol`) VALUES
('F1', 'P1', 'P2', 'I', 'PreparaDocumentos', 'estudiante'),
('F1', 'P2', 'P3', 'P', 'Formulario', 'estudiante'),
('F1', 'P3', '-', 'F', 'Enviado', 'estudiante'),
('F1', 'P4', '-', 'C', 'Verifica', 'Kardex'),
('F1', 'P5', '-', 'F', 'DatosGuardados', 'Kardex'),
('F1', 'P6', '-', 'F', 'Rechazo', 'Kardex');


CREATE TABLE `flujoprocesocondicionante` (
  `Flujo` varchar(3) DEFAULT NULL,
  `Proceso` varchar(3) DEFAULT NULL,
  `ProcesoSI` varchar(3) DEFAULT NULL,
  `ProcesoNO` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `flujoprocesocondicionante` (`Flujo`, `Proceso`, `ProcesoSI`, `ProcesoNO`) VALUES
('F1', 'P4', 'P5', 'P6');


CREATE TABLE `flujoprocesoseguimiento` (
  `id` int(11) NOT NULL,
  `Flujo` varchar(3) DEFAULT NULL,
  `Proceso` varchar(3) DEFAULT NULL,
  `Usuario` varchar(10) DEFAULT NULL,
  `FechaInicio` date DEFAULT NULL,
  `FechaFin` date DEFAULT NULL,
  `rechazo` varchar(10) DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `flujoprocesoseguimiento` (`id`, `Flujo`, `Proceso`, `Usuario`, `FechaInicio`, `FechaFin`, `rechazo`) VALUES
(1, 'F1', 'P2', 'Chriss12', '2022-11-29', '2022-11-29', 'Rechazado'),
(2, 'F1', 'P2', 'Yess12', '2022-11-29', '2022-11-29', 'Pendiente'),
(3, 'F1', 'P2', 'Pablo12', '2022-11-29', '2022-11-29', 'Pendiente');


CREATE TABLE Rol(
    Id integer,
    descripcion varchar(50)
);

CREATE TABLE Usuario(
    Id integer,
    descripcion varchar(50),
    contrasenia varchar(50)
);

CREATE TABLE RolUsuario(
    Id integer,
    IdUsuario integer
);
INSERT INTO Rol
Values(1, 'Estudiante'), (2, 'Kardex');

INSERT INTO Usuario
Values(1, 'Chriss12', '123'), (2, 'Luz12', '123'), (1, 'Yess12', '123'), (1, 'Pablo12', '123');

INSERT INTO RolUsuario
Values(1, 1), (2, 2);

--DENTRO DE LA BASE DE DATOS ACADEMICO

CREATE TABLE Alumno(
	nombre varchar(50),
  apellido varchar(50),
  usuario varchar(50),
  ci integer,
  celular integer
);

INSERT INTO ALUMNO
values('Cristhian', 'Alave Sanjines', 'Chriss12', 100, 74354934),
('Yessica', 'Mendoza Castillo', 'Yess12',101, 75341245),
('Pablo', 'Altamirano Gutierrez', 'Pablo12', 102, 67482234);


CREATE TABLE Alumno_Usuario(
  ci_alumno integer,
  usuario_usuario varchar(50)
)
INSERT INTO Alumno_Usuario
VALUES(100, 'Chriss12'), (101, 'Yess12'), (102, 'Pablo12');


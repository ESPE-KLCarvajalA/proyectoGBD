if exists (select *
from sysdatabases
where name='PROYECTOU1') drop database PROYECTOU1;

create database PROYECTOU1;
use PROYECTOU1;

create table TipoCargo
(
    id_tipo_cargo_pk int identity(1,1) not null,
    cargo varchar(50) null,
    constraint pk_tipocargo primary key (id_tipo_cargo_pk)
);

create table TipoMaterial
(
    id_tipo_material_pk int identity(1,1) not null,
    tipo_material varchar(50) null,
    constraint pk_tipomaterial primary key (id_tipo_material_pk)
);
<<<<<<< Updated upstream

create table Material (
   id_material_pk int identity(1,1) not null,
   nombre  varchar(50) null,
   id_tipo_material_fk  int not null,
   id_asignacion_fk int null,
   constraint pk_materiales primary key (id_material_pk),
   constraint fk_material_refernces_tipoma foreign key(id_tipo_material_fk) references TipoMaterial(id_tipo_material_pk)
   constraint fk_material_refernces_grupo foreign key(id_asignacion_fk) references Grupo (id_asignacion_fk)
);
create table Trabajador (
   id_trabajador_pk  int identity(1,1) not null,
   nombre varchar(50) null,
   apellido varchar(50) null,
   id_asignacion_fk int not null,
   id_tipo_cargo_fk int null,
   fecha_contratacion date null,
   constraint fk_material_reference_tipomate foreign key (id_tipo_cargo_fk)references TipoCargo (id_tipo_cargo_pk),
   constraint pk_trabajador primary key (id_trabajador_pk),
   constraint fk_trabajador_references_grupo FOREIGN KEY (id_asignacion_fk) REFERENCES Grupo (id_asignacion_pk)
);

create table Grupo (
   id_asignacion_pk int  identity(1,1) not null,
   nombre_grupo varchar(15) not null,
   constraint pk_asignaciontrabajador primary key (id_asignacion_pk),
=======
/*
create table TipoReserva (
   id_tipo_reserva_pk int identity(1,1) not null,
   tipo_reserva varchar(50) null,
   constraint pk_tiporeserva primary key (id_tipo_reserva_pk)
);
*/
create table Material
(
    id_material_pk int identity(1,1) not null,
    nombre varchar(50) null,
    id_tipo_material_fk int not null,
    constraint pk_materiales primary key (id_material_pk),
    constraint fk_material_refernces_tipoma foreign key(id_tipo_material_fk) references TipoMaterial(id_tipo_material_pk)
);

create table Trabajador
(
    id_trabajador_pk int identity(1,1) not null,
    nombre varchar(50) null,
    apellido varchar(50) null,
    id_tipo_cargo_fk int null,
    fecha_contratacion date null,
    constraint fk_material_reference_tipomate foreign key (id_tipo_cargo_fk)references TipoCargo (id_tipo_cargo_pk),
    constraint pk_trabajador primary key (id_trabajador_pk)
);

create table AsignacionTrabajador
(
    id_asignacion_pk int identity(1,1) not null,
    id_trabajador_fk int not null,
    id_material_fk int null,
    n_horas_trabajo float,
    constraint pk_asignaciontrabajador primary key (id_asignacion_pk),
    constraint fk_asignaci_reference_material foreign key (id_material_fk)references Material (id_material_pk),
    constraint fk_asignaci_reference_trabajad foreign key (id_trabajador_fk)references Trabajador (id_trabajador_pk)
>>>>>>> Stashed changes
);

create table Yacimiento
(
    id_campo_pk int identity(1,1) not null,
    nombre_campo varchar(50) null,
    ubicacion varchar(50) null,
    fecha_descubrimiento date,
    constraint pk_yacimiento primary key (id_campo_pk)
);
<<<<<<< Updated upstream

create table Pozo (
   id_pozo_pk           int identity(1,1) not null,
   id_campo_fk          int null,
   nombre               varchar(50) null,
   profundidad          decimal null,
   estado               char(1) null,
   constraint pk_pozo primary key (id_pozo_pk),
   constraint fk_pozo_references_yaci foreign key (id_campo_fk) references Yacimiento (id_campo_pk)
);
alter table Pozo add constraint pozo_estado CHECK (estado IN ('A', 'I'));

create table Extraccion (
   id_extraccion_pk int identity(1,1) not null,
   id_pozo_fk int null,
   id_asignacion_fk int null,
   fecha_extraccion date null,
   volumen_extraido decimal null,
   n_horas_trabajo float,
   constraint pk_extraccion primary key (id_extraccion_pk),
   constraint fk_extraccion_references_pozo foreign key (id_pozo_fk) references Pozo (id_pozo_pk),
   constraint fk_extraccion_references_grupo foreign key (id_asignacion_fk) references Grupo (id_asignacion_pk)
=======
/*
create table Reserva (
   id_reserva_pk        int identity(1,1) not null,
   id_campo_fk          int null,
   fecha_registro       date null,
   cantidad_reservada   decimal null,
   id_tipo_reserva_fk   int null,
   constraint pk_reserva primary key (id_reserva_pk),
   constraint fk_reserva_references_yaci foreign key (id_campo_fk) references Yacimiento (id_campo_pk),
   constraint fk_reserva_references_tiporeser foreign key (id_tipo_reserva_fk) references TipoReserva (id_tipo_reserva_pk)
);
*/
create table Pozo
(
    id_pozo_pk int identity(1,1) not null,
    id_campo_fk int null,
    nombre varchar(50) null,
    profundidad decimal null,
    estado char(1) null,
    constraint pk_pozo primary key (id_pozo_pk),
    constraint fk_pozo_references_yaci foreign key (id_campo_fk) references Yacimiento (id_campo_pk)
);
alter table Pozo add constraint pozo_estado CHECK (estado IN ('A', 'I'));

create table Extraccion
(
    id_extraccion_pk int identity(1,1) not null,
    id_pozo_fk int null,
    id_asignacion_fk int null,
    fecha_extraccion date null,
    volumen_extraido decimal null,
    constraint pk_extraccion primary key (id_extraccion_pk),
    constraint fk_extraccion_references_pozo foreign key (id_pozo_fk) references Pozo (id_pozo_pk),
    constraint fk_extraccion_references_asig foreign key (id_asignacion_fk) references AsignacionTrabajador (id_asignacion_pk)
>>>>>>> Stashed changes
);

create table Usuario
(
    id_usuario_pk int identity(1,1) not null,
    usuario varchar(50) not null,
    contrasena varchar(50) not null,
    id_trabajador_fk int null,
    constraint pk_usuario primary key (id_usuario_pk),
    constraint u_nombre_usuario unique (usuario),
    constraint fk_usuario_references_trabajador foreign key (id_trabajador_fk) references Trabajador (id_trabajador_pk)
);

-- Después de insertar datos en Trabajador
DECLARE @IdTrabajador INT;

SELECT @IdTrabajador = SCOPE_IDENTITY();
-- Obtener el último id_trabajador_pk insertado

DECLARE @InputUsuario VARCHAR(50) = 'admin';
-- Reemplaza con el nombre de usuario proporcionado por el usuario
DECLARE @InputContrasena VARCHAR(50) = 'admin';
-- Reemplaza con la contraseña proporcionada por el usuario

DECLARE @TrabajadorId INT;

-- Verificar la autenticación
SELECT @TrabajadorId = id_trabajador_fk
FROM Usuario
WHERE usuario = @InputUsuario AND contrasena = @InputContrasena;

IF @TrabajadorId IS NOT NULL
BEGIN
    PRINT 'Autenticación exitosa';
END
ELSE
BEGIN
    PRINT 'Autenticación fallida';
END;




/*---------------------------------------------------
				INSERCION DE DATOS
---------------------------------------------------*/

<<<<<<< Updated upstream
insert into Usuario values ('admin','admin',6);
insert into TipoCargo values('Logístico'),('Especialista'),('Gerente'),('Analista'),('Operador de Excavación'),('Operador de Maquinaria'),('Administrador');
insert into TipoMaterial values('Herramientas de Excavación'),('Maquinaria vehicular');
select * from TipoCargo
-- Insertar datos en la tabla Material
insert into Material values ('Martillo neumático', 1),('Excavadora de orugas', 2),('Pala mecánica', 2),
                            ('Taladro rotativo', 1),('Camión volquete', 2);
							
-- Insertar datos en la tabla Trabajador
insert into Trabajador (nombre, apellido, id_tipo_cargo_fk, fecha_contratacion,id_asignacion_fk) values
    ('Juan', 'Pérez', 1, '2023-01-01',1), -- Logístico
    ('Ana', 'Gómez', 2, '2023-02-15',2), -- Especialista
    ('Carlos', 'Ruiz', 3, '2023-03-10',3), -- Gerente
    ('Elena', 'Martínez', 4, '2023-04-20',3), -- Analista
    ('Roberto', 'López', 5, '2023-05-05',2),-- Operador de Excavación
	('kiara', 'Carvajal', 6, '2015-04-15',1); --Administrador 

-- Insertar datos en la tabla Grupo
insert into Grupo values
    ('Grupo 1'), ('Grupo 2'),('Grupo 3');
=======
insert into Usuario
values
    ('admin', 'admin', 6);
insert into TipoCargo
values('Logístico'),
    ('Especialista'),
    ('Gerente'),
    ('Analista'),
    ('Operador de Excavación'),
    ('Operador de Maquinaria'),
    ('Administrador');
insert into TipoMaterial
values('Herramientas de Excavación'),
    ('Maquinaria vehicular');

-- Insertar datos en la tabla Material
insert into Material
values
    ('Martillo neumático', 1),
    ('Excavadora de orugas', 2),
    ('Pala mecánica', 2),
    ('Taladro rotativo', 1),
    ('Camión volquete', 2);

-- Insertar datos en la tabla Trabajador
insert into Trabajador
    (nombre, apellido, id_tipo_cargo_fk, fecha_contratacion)
values
    ('Juan', 'Pérez', 1, '2023-01-01'),
    -- Logístico
    ('Ana', 'Gómez', 2, '2023-02-15'),
    -- Especialista
    ('Carlos', 'Ruiz', 3, '2023-03-10'),
    -- Gerente
    ('Elena', 'Martínez', 4, '2023-04-20'),
    -- Analista
    ('Roberto', 'López', 5, '2023-05-05'),-- Operador de Excavación
    ('kiara', 'Carvajal', 6, '2015-04-15');
--Administrador 

-- Insertar datos en la tabla AsignacionTrabajador
insert into AsignacionTrabajador
    (id_trabajador_fk, id_material_fk, n_horas_trabajo)
values
    (1, 1, 8.5),
    -- Juan Pérez asignado al Material1
    (2, 2, 7.0),
    -- Ana Gómez asignada al Material2
    (3, 3, 6.5),
    -- Carlos Ruiz asignado al Material3
    (4, 1, 9.0),
    -- Elena Martínez asignada al Material1
    (5, 2, 7.5);
-- Roberto López asignado al Material2
>>>>>>> Stashed changes

-- Insertar datos en la tabla Yacimiento
insert INTO Yacimiento
    (nombre_campo, ubicacion, fecha_descubrimiento)
values
    ('Gacela', 'Coca Payamino', '2005-08-15'),
    ('Jaguar', 'Coca Payamino', '2010-03-22'),
    ('Lobo', 'Oriente', '1998-12-05'),
    ('Mono', 'Noreste de Lumbaqui', '2002-06-10'),
    ('Oso', 'Orellana', '1990-04-18'),
    ('Coca', 'Sur del Oriente', '1985-09-30'),
    ('Coca Payamino', 'Nantú, Orellana', '2008-11-14');


-- Insertar datos en la tabla Pozo
insert into Pozo
    (id_campo_fk, nombre, profundidad, estado)
values
    (1, 'Pozo1', 800.0, 'A'),
    (2, 'Pozo2', 900.0, 'I'),
    (3, 'Pozo3', 750.0, 'A'),
    (4, 'Pozo4', 1000.0, 'I'),
    (5, 'Pozo5', 1200.0, 'A');

-- Insertar datos en la tabla Extraccion
<<<<<<< Updated upstream
insert into Extraccion (id_pozo_fk, id_asignacion_fk, fecha_extraccion, volumen_extraido,n_horas_trabajo) values
    (1, 1, '2023-01-10', 300.2,7.5),
    (2, 2, '2023-05-12', 150.5,5.5),
    (3, 3, '2023-09-15', 200.8,8.3),
    (4, 3, '2022-11-18', 400.0,4.5),
    (5, 1, '2023-12-20', 500.0,8.1);
=======
insert into Extraccion
    (id_pozo_fk, id_asignacion_fk, fecha_extraccion, volumen_extraido)
values
    (1, 1, '2023-08-10', 300.2),
    (2, 2, '2023-08-12', 150.5),
    (3, 3, '2023-08-15', 200.8),
    (4, 4, '2023-08-18', 400.0),
    (5, 5, '2023-08-20', 500.0);
>>>>>>> Stashed changes

/*----------------------------------------------------------------------------------------------
						               PROCEDIMIENTOS Y VISTAS
------------------------------------------------------------------------------------------------*/
-----------------------------------------------Procedimientos almacenados para TipoCargo:

/**********Create**************/
CREATE PROCEDURE sp_InsertTipoCargo
    @Cargo VARCHAR(50)
AS
BEGIN
    INSERT INTO TipoCargo
        (cargo)
    VALUES
        (@Cargo);
END;

/**********Read**************/
CREATE PROCEDURE sp_GetTipoCargo
AS
BEGIN
    SELECT *
    FROM TipoCargo;
END;

-- Update
CREATE PROCEDURE sp_UpdateTipoCargo
    @IdTipoCargo INT,
    @Cargo VARCHAR(50)
AS
BEGIN
    UPDATE TipoCargo
    SET cargo = @Cargo
    WHERE id_tipo_cargo_pk = @IdTipoCargo;
END;

/**********Delete**************/
CREATE PROCEDURE sp_DeleteTipoCargo
    @IdTipoCargo INT
AS
BEGIN
    DELETE FROM TipoCargo
    WHERE id_tipo_cargo_pk = @IdTipoCargo;
END;



----------------------------------------------------------Procedimientos almacenados para TipoMaterial:

/**********Create**************/
CREATE PROCEDURE sp_InsertTipoMaterial
    @TipoMaterial VARCHAR(50)
AS
BEGIN
    INSERT INTO TipoMaterial
        (tipo_material)
    VALUES
        (@TipoMaterial);
END;

/**********Read**************/
CREATE PROCEDURE sp_GetTipoMaterial
AS
BEGIN
    SELECT *
    FROM TipoMaterial;
END;

/**********Update**************/
CREATE PROCEDURE sp_UpdateTipoMaterial
    @IdTipoMaterial INT,
    @TipoMaterial VARCHAR(50)
AS
BEGIN
    UPDATE TipoMaterial
    SET tipo_material = @TipoMaterial
    WHERE id_tipo_material_pk = @IdTipoMaterial;
END;

/**********Delete**************/
CREATE PROCEDURE sp_DeleteTipoMaterial
    @IdTipoMaterial INT
AS
BEGIN
    DELETE FROM TipoMaterial
    WHERE id_tipo_material_pk = @IdTipoMaterial;
END;


----------------------------------------------------------Procedimientos almacenados para Trabajador:
-- Procedimiento almacenado para crear (Create) un nuevo trabajador
CREATE PROCEDURE sp_InsertTrabajador
    @Nombre VARCHAR(50),
    @Apellido VARCHAR(50),
    @IdAsignacion INT,
    @IdTipoCargo INT,
    @FechaContratacion DATE
AS
BEGIN
<<<<<<< Updated upstream
    INSERT INTO Trabajador (nombre, apellido, id_asignacion_fk, id_tipo_cargo_fk, fecha_contratacion)
    VALUES (@Nombre, @Apellido, @IdAsignacion, @IdTipoCargo, @FechaContratacion);
=======
    INSERT INTO Trabajador
        (nombre, apellido, id_tipo_cargo_fk, fecha_contratacion)
    VALUES
        (@Nombre, @Apellido, @IdTipoCargo, @FechaContratacion);
>>>>>>> Stashed changes
END;

-- Procedimiento almacenado para leer (Read) todos los trabajadores
CREATE PROCEDURE sp_GetTrabajadores
AS
BEGIN
    SELECT *
    FROM Trabajador;
END;

-- Procedimiento almacenado para leer (Read) un trabajador específico por su ID
CREATE PROCEDURE sp_GetTrabajadorById
    @IdTrabajador INT
AS
BEGIN
    SELECT * FROM Trabajador
    WHERE id_trabajador_pk = @IdTrabajador;
END;

-- Procedimiento almacenado para actualizar (Update) un trabajador
CREATE PROCEDURE sp_UpdateTrabajador
    @IdTrabajador INT,
    @Nombre VARCHAR(50),
    @Apellido VARCHAR(50),
    @IdAsignacion INT,
    @IdTipoCargo INT,
    @FechaContratacion DATE
AS
BEGIN
    UPDATE Trabajador
    SET nombre = @Nombre,
        apellido = @Apellido,
        id_asignacion_fk = @IdAsignacion,
        id_tipo_cargo_fk = @IdTipoCargo,
        fecha_contratacion = @FechaContratacion
    WHERE id_trabajador_pk = @IdTrabajador;
END;
select * from Trabajador
-- Delete
CREATE PROCEDURE sp_DeleteTrabajador
    @IdTrabajador INT
AS
BEGIN
    DELETE FROM Trabajador
    WHERE id_trabajador_pk = @IdTrabajador;
END;
----------------------------------------------------------Procedimientos almacenados para AsignaciónTrabajador:
-- Create
CREATE PROCEDURE sp_InsertAsignacionTrabajador
    @IdTrabajador INT,
    @IdMaterial INT,
    @NHorasTrabajo FLOAT
AS
BEGIN
    INSERT INTO AsignacionTrabajador
        (id_trabajador_fk, id_material_fk, n_horas_trabajo)
    VALUES
        (@IdTrabajador, @IdMaterial, @NHorasTrabajo);
END;

-- Read
CREATE PROCEDURE sp_GetAsignacionTrabajador
AS
BEGIN
    SELECT *
    FROM AsignacionTrabajador;
END;

-- Update
CREATE PROCEDURE sp_UpdateAsignacionTrabajador
    @IdAsignacion INT,
    @IdTrabajador INT,
    @IdMaterial INT,
    @NHorasTrabajo FLOAT
AS
BEGIN
    UPDATE AsignacionTrabajador
    SET id_trabajador_fk = @IdTrabajador,
        id_material_fk = @IdMaterial,
        n_horas_trabajo = @NHorasTrabajo
    WHERE id_asignacion_pk = @IdAsignacion;
END;

-- Delete
CREATE PROCEDURE sp_DeleteAsignacionTrabajador
    @IdAsignacion INT
AS
BEGIN
    DELETE FROM AsignacionTrabajador
    WHERE id_asignacion_pk = @IdAsignacion;
END;

----------------------------------------------------------Procedimientos almacenados para Material:
/**********Create**************/
CREATE PROCEDURE sp_InsertMaterial
    @Nombre VARCHAR(50),
    @IdTipoMaterial INT
AS
BEGIN
    INSERT INTO Material
        (nombre, id_tipo_material_fk)
    VALUES
        (@Nombre, @IdTipoMaterial);
END;

/**********Read**************/
CREATE PROCEDURE sp_GetMaterial
AS
BEGIN
    SELECT *
    FROM Material;
END;

/**********Update**************/
CREATE PROCEDURE sp_UpdateMaterial
    @IdMaterial INT,
    @Nombre VARCHAR(50),
    @IdTipoMaterial INT
AS
BEGIN
    UPDATE Material
    SET nombre = @Nombre,
        id_tipo_material_fk = @IdTipoMaterial
    WHERE id_material_pk = @IdMaterial;
END;

/**********Delete**************/
CREATE PROCEDURE sp_DeleteMaterial
    @IdMaterial INT
AS
BEGIN
    DELETE FROM Material
    WHERE id_material_pk = @IdMaterial;
END;

-----------------------------------------------------------------------Yacimiento
CREATE PROCEDURE sp_InsertYacimiento
    @Nombre_campo VARCHAR(50),
    @Ubicacion VARCHAR(50),
    @Fecha_descubrimiento DATE
AS
BEGIN
    INSERT INTO Yacimiento
        (nombre_campo, ubicacion,fecha_descubrimiento)
    VALUES
        (@Nombre_campo, @Ubicacion, @Fecha_descubrimiento);
END;

-- Read
CREATE PROCEDURE sp_GetYacimiento
AS
BEGIN
    SELECT *
    FROM Yacimiento;
END;
exec sp_GetYacimiento
-- Update
CREATE PROCEDURE sp_UpdateYacimiento
    @IdCampo INT,
    @Nombre_campo VARCHAR(50),
    @Ubicacion VARCHAR(50),
    @Fecha_descubrimiento DATE
AS
BEGIN
    UPDATE Yacimiento
    SET nombre_campo = @Nombre_campo,
        ubicacion = @Ubicacion,
        fecha_descubrimiento = @Fecha_descubrimiento
    WHERE id_campo_pk = @IdCampo;
END;

-- Delete
CREATE PROCEDURE sp_DeleteYacimiento
    @IdCampo INT
AS
BEGIN
    DELETE FROM Yacimiento
    WHERE id_campo_pk = @IdCampo;
END;
----------------------------------------------------------Procedimientos almacenados para Pozo:
-- Create
CREATE PROCEDURE sp_InsertPozo
    @IdCampo INT,
    @Nombre VARCHAR(50),
    @Profundidad DECIMAL,
    @Estado CHAR(1)
AS
BEGIN
    INSERT INTO Pozo
        (id_campo_fk, nombre, profundidad, estado)
    VALUES
        (@IdCampo, @Nombre, @Profundidad, @Estado);
END;

-- Read
CREATE PROCEDURE sp_GetPozo
AS
BEGIN
    SELECT *
    FROM Pozo;
END;

-- Update
CREATE PROCEDURE sp_UpdatePozo
    @IdPozo INT,
    @IdCampo INT,
    @Nombre VARCHAR(50),
    @Profundidad DECIMAL,
    @Estado CHAR(1)
AS
BEGIN
    UPDATE Pozo
    SET id_campo_fk = @IdCampo,
        nombre = @Nombre,
        profundidad = @Profundidad,
        estado = @Estado
    WHERE id_pozo_pk = @IdPozo;
END;

-- Delete
CREATE PROCEDURE sp_DeletePozo
    @IdPozo INT
AS
BEGIN
    DELETE FROM Pozo
    WHERE id_pozo_pk = @IdPozo;
END;
----------------------------------------------------------Procedimientos almacenados para Extraccion:
CREATE PROCEDURE sp_InsertExtraccion
    @IdPozo INT,
    @IdAsignacion INT,
    @FechaExtraccion DATE,
    @VolumenExtraido DECIMAL
AS
BEGIN
    INSERT INTO Extraccion (id_pozo_fk, id_asignacion_fk, fecha_extraccion, volumen_extraido)
    VALUES (@IdPozo, @IdAsignacion, @FechaExtraccion, @VolumenExtraido);
END;

-- Procedimiento almacenado para leer (Read) todas las extracciones
CREATE PROCEDURE sp_GetExtracciones
AS
BEGIN
    SELECT * FROM Extraccion;
END;

-- Procedimiento almacenado para leer (Read) una extracción específica por su ID
CREATE PROCEDURE sp_GetExtraccionById
    @IdExtraccion INT
AS
BEGIN
    SELECT * FROM Extraccion
    WHERE id_extraccion_pk = @IdExtraccion;
END;

-- Procedimiento almacenado para actualizar (Update) una extracción
CREATE PROCEDURE sp_UpdateExtraccion
    @IdExtraccion INT,
    @IdPozo INT,
    @IdAsignacion INT,
    @FechaExtraccion DATE,
    @VolumenExtraido DECIMAL
AS
BEGIN
    UPDATE Extraccion
    SET id_pozo_fk = @IdPozo,
        id_asignacion_fk = @IdAsignacion,
        fecha_extraccion = @FechaExtraccion,
        volumen_extraido = @VolumenExtraido
    WHERE id_extraccion_pk = @IdExtraccion;
END;

-- Procedimiento almacenado para eliminar (Delete) una extracción
CREATE PROCEDURE sp_DeleteExtraccion
    @IdExtraccion INT
AS
BEGIN
    DELETE FROM Extraccion
    WHERE id_extraccion_pk = @IdExtraccion;
END;

/*----------------------------------------------------------------------------------------------
												VISTAS
------------------------------------------------------------------------------------------------*/

-- Vista para Material
CREATE VIEW vw_Material
AS
    SELECT m.id_material_pk AS IdMaterial, m.nombre AS NombreMaterial, tm.tipo_material AS TipoMaterial
    FROM Material m
        INNER JOIN TipoMaterial tm ON m.id_tipo_material_fk = tm.id_tipo_material_pk;

CREATE VIEW vw_Trabajador
AS
    SELECT T.id_trabajador_pk, T.nombre, T.apellido, P.cargo , T.fecha_contratacion
    FROM Trabajador T
        INNER JOIN TipoCargo P ON P.id_tipo_cargo_pk=T.id_tipo_cargo_fk

-- Vista para Pozo
CREATE VIEW vw_Pozo
AS
    SELECT p.id_pozo_pk AS IdPozo, y.nombre_campo AS NombreCampo, p.nombre AS NombrePozo,
        p.profundidad AS Profundidad, p.estado AS Estado
    FROM Pozo p
        INNER JOIN Yacimiento y ON p.id_campo_fk = y.id_campo_pk;





--------------------------------------Vistas que aún no se ejecutan
-- Vista para TipoCargo
CREATE VIEW vw_TipoCargo
AS
    SELECT id_tipo_cargo_pk AS IdTipoCargo, cargo AS Cargo
    FROM TipoCargo;

-- Vista para TipoMaterial
CREATE VIEW vw_TipoMaterial
AS
    SELECT id_tipo_material_pk AS IdTipoMaterial, tipo_material AS TipoMaterial
    FROM TipoMaterial;

-- Vista para AsignacionTrabajador
CREATE VIEW vw_AsignacionTrabajador
AS
    SELECT at.id_asignacion_pk AS IdAsignacion, t.nombre + ' ' + t.apellido AS Trabajador,
        m.nombre AS Material, at.n_horas_trabajo AS HorasTrabajo
    FROM AsignacionTrabajador at
        INNER JOIN Trabajador t ON at.id_trabajador_fk = t.id_trabajador_pk
        LEFT JOIN Material m ON at.id_material_fk = m.id_material_pk;

-- Vista para Yacimiento
CREATE VIEW vw_Yacimiento
AS
    SELECT id_campo_pk AS IdCampo, nombre_campo AS NombreCampo, ubicacion AS Ubicacion, fecha_descubrimiento AS FechaDescubrimiento
    FROM Yacimiento;



-- Vista para Extraccion
CREATE VIEW vw_Extraccion
AS
    SELECT e.id_extraccion_pk AS IdExtraccion, p.nombre AS NombrePozo, t.nombre + ' ' + t.apellido AS Trabajador,
        e.fecha_extraccion AS FechaExtraccion, e.volumen_extraido AS VolumenExtraido
    FROM Extraccion e
        INNER JOIN Pozo p ON e.id_pozo_fk = p.id_pozo_pk
        INNER JOIN AsignacionTrabajador at ON e.id_asignacion_fk = at.id_asignacion_pk
        INNER JOIN Trabajador t ON at.id_trabajador_fk = t.id_trabajador_pk;

-- Vista para Usuario
CREATE VIEW vw_Usuario
AS
    SELECT u.id_usuario_pk AS IdUsuario, u.usuario AS Usuario, t.nombre + ' ' + t.apellido AS Trabajador
    FROM Usuario u
        INNER JOIN Trabajador t ON u.id_trabajador_fk = t.id_trabajador_pk;



-- Crear la vista
CREATE VIEW vw_ExtraccionConGrupos AS
SELECT
    id_extraccion_pk,
    P.nombre,
    id_asignacion_fk,
    fecha_extraccion,
    volumen_extraido
FROM Extraccion E
JOIN Pozo P ON P.id_pozo_pk=E.id_pozo_fk

select * from Trabajador

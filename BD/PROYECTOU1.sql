if exists (select * from sysdatabases where name='PROYECTOU1') drop database PROYECTOU1;

create database PROYECTOU1;
use PROYECTOU1;

create table TipoCargo (
   id_tipo_cargo_pk int identity(1,1) not null,
   cargo varchar(50) null,
   constraint pk_tipocargo primary key (id_tipo_cargo_pk)
);

create table TipoMaterial (
   id_tipo_material_pk  int identity(1,1) not null,
   tipo_material        varchar(50) null,
   constraint pk_tipomaterial primary key (id_tipo_material_pk)
);

drop table Material (
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
);

create table Yacimiento (
   id_campo_pk  int identity(1,1) not null,
   nombre_campo varchar(50) null,
   ubicacion varchar(50) null,
   fecha_descubrimiento date,
   constraint pk_yacimiento primary key (id_campo_pk)
);

create table Pozo (
   id_pozo_pk  int identity(1,1) not null,
   id_campo_fk int null,
   nombre    varchar(50) null,
   profundidad  decimal null,
   estado char(1) null,
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
);

create table Usuario(
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

SELECT @IdTrabajador = SCOPE_IDENTITY(); -- Obtener el último id_trabajador_pk insertado

DECLARE @InputUsuario VARCHAR(50) = 'admin'; -- Reemplaza con el nombre de usuario proporcionado por el usuario
DECLARE @InputContrasena VARCHAR(50) = 'admin'; -- Reemplaza con la contraseña proporcionada por el usuario

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

insert into TipoCargo values('Logístico'),('Especialista'),('Gerente'),('Analista'),('Operador de Excavación'),('Operador de Maquinaria'),('Administrador');
insert into TipoMaterial values('Herramientas de Excavación'),('Maquinaria vehicular');
insert into Usuario values ('admin','admin',6);

-- Insertar datos en la tabla Material
insert into Material values ('Martillo neumático', 1,1),('Excavadora de orugas', 2,1),('Pala mecánica', 2,2),
                            ('Taladro rotativo', 1,3),('Camión volquete', 2,3);
							
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

-- Insertar datos en la tabla Yacimiento
insert INTO Yacimiento (nombre_campo, ubicacion, fecha_descubrimiento) values
    ('Gacela', 'Coca Payamino', '2005-08-15'),
    ('Jaguar', 'Coca Payamino', '2010-03-22'),
    ('Lobo', 'Oriente', '1998-12-05'),
    ('Mono', 'Noreste de Lumbaqui', '2002-06-10'),
    ('Oso', 'Orellana', '1990-04-18'),
    ('Coca', 'Sur del Oriente', '1985-09-30'),
    ('Coca Payamino', 'Nantú, Orellana', '2008-11-14');


-- Insertar datos en la tabla Pozo
insert into Pozo (id_campo_fk, nombre, profundidad, estado) values
    (1, 'Pozo1', 800.0, 'A'),
    (2, 'Pozo2', 900.0, 'I'),
    (3, 'Pozo3', 750.0, 'A'),
    (4, 'Pozo4', 1000.0, 'I'),
    (5, 'Pozo5', 1200.0, 'A');

-- Insertar datos en la tabla Extraccion
insert into Extraccion (id_pozo_fk, id_asignacion_fk, fecha_extraccion, volumen_extraido,n_horas_trabajo) values
    (1, 1, '2023-01-10', 300.2,7.5),
    (2, 2, '2023-05-12', 150.5,5.5),
    (3, 3, '2023-09-15', 200.8,8.3),
    (4, 3, '2022-11-18', 400.0,4.5),
    (5, 1, '2023-12-20', 500.0,8.1);

/*----------------------------------------------------------------------------------------------
						               PROCEDIMIENTOS
------------------------------------------------------------------------------------------------*/
------------------------------------------------------Procedimientos almacenados para Trabajador:
-- CREATE
CREATE PROCEDURE sp_InsertTrabajador
    @Nombre VARCHAR(50),
    @Apellido VARCHAR(50),
    @IdAsignacion INT,
    @IdTipoCargo INT,
    @FechaContratacion DATE
AS
BEGIN
    INSERT INTO Trabajador (nombre, apellido, id_asignacion_fk, id_tipo_cargo_fk, fecha_contratacion)
    VALUES (@Nombre, @Apellido, @IdAsignacion, @IdTipoCargo, @FechaContratacion);
END;


-- READ
CREATE PROCEDURE sp_GetTrabajador
AS
BEGIN
    SELECT * FROM Trabajador;
END;

--UPDATE
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

-- DELETE
CREATE PROCEDURE sp_DeleteTrabajador
    @IdTrabajador INT
AS
BEGIN
    DELETE FROM Trabajador
    WHERE id_trabajador_pk = @IdTrabajador;
END;

----------------------------------------------------------Procedimientos almacenados para Material:
--CREATE
CREATE PROCEDURE sp_InsertMaterial
    @Nombre VARCHAR(50),
    @IdTipoMaterial INT
AS
BEGIN
    INSERT INTO Material (nombre, id_tipo_material_fk)
    VALUES (@Nombre, @IdTipoMaterial);
END;

--------------------------------------------------------------Procedimientos almacenados para Yacimiento:
--CREATE
CREATE PROCEDURE sp_InsertYacimiento
    @Nombre_campo VARCHAR(50),
    @Ubicacion VARCHAR(50),
    @Fecha_descubrimiento DATE
AS
BEGIN
    INSERT INTO Yacimiento (nombre_campo, ubicacion,fecha_descubrimiento)
    VALUES (@Nombre_campo,@Ubicacion,@Fecha_descubrimiento);
END;

-- READ
CREATE PROCEDURE sp_GetYacimiento
AS
BEGIN
    SELECT * FROM Yacimiento;
END;

-- UPDATE
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

-- DELETE
CREATE PROCEDURE sp_DeleteYacimiento
    @IdCampo INT
AS
BEGIN
    DELETE FROM Yacimiento
    WHERE id_campo_pk = @IdCampo;
END;
----------------------------------------------------------Procedimientos almacenados para Pozo:
-- CREATE
CREATE PROCEDURE sp_InsertPozo
    @IdCampo INT,
    @Nombre VARCHAR(50),
    @Profundidad DECIMAL,
    @Estado CHAR(1)
AS
BEGIN
    INSERT INTO Pozo (id_campo_fk, nombre, profundidad, estado)
    VALUES (@IdCampo, @Nombre, @Profundidad, @Estado);
END;

CREATE PROCEDURE sp_GetPozo
AS
BEGIN
    SELECT * FROM Pozo;
END;

-- UPDATE
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

-- DELETE
CREATE PROCEDURE sp_DeletePozo
    @IdPozo INT
AS
BEGIN
    DELETE FROM Pozo
    WHERE id_pozo_pk = @IdPozo;
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

--Vista para Trabajador
CREATE VIEW vw_Trabajador AS
SELECT T.id_trabajador_pk,T.nombre,T.apellido,G.nombre_grupo,TC.cargo,T.fecha_contratacion
FROM Trabajador T
INNER JOIN Grupo G ON T.id_asignacion_fk = G.id_asignacion_pk
LEFT JOIN TipoCargo TC ON T.id_tipo_cargo_fk = TC.id_tipo_cargo_pk;


-- Vista para Pozo
CREATE VIEW vw_Pozo AS
SELECT p.id_pozo_pk AS IdPozo, y.nombre_campo AS NombreCampo, p.nombre AS NombrePozo,
       p.profundidad AS Profundidad, p.estado AS Estado
FROM Pozo p
INNER JOIN Yacimiento y ON p.id_campo_fk = y.id_campo_pk;

--Horas de trabajo de de cada Trabajador
CREATE VIEW vw_AsignacionTrabajador
AS
SELECT g.id_asignacion_pk AS IdAsignacion, t.nombre + ' ' + t.apellido AS Trabajador,
       m.nombre AS Material, E.n_horas_trabajo AS HorasTrabajo
FROM Grupo g
INNER JOIN Trabajador t ON g.id_asignacion_pk = t.id_asignacion_fk
LEFT JOIN Material m ON g.id_asignacion_pk = m.id_asignacion_fk
JOIN Extraccion E ON E.id_asignacion_fk=g.id_asignacion_pk

--Vista extracciones
CREATE VIEW vw_ExtraccionConGrupos AS
SELECT E.id_extraccion_pk, P.nombre,Y.nombre_campo,G.nombre_grupo,E.fecha_extraccion,E.volumen_extraido,
E.n_horas_trabajo
FROM Extraccion E
JOIN Pozo P ON P.id_pozo_pk=E.id_pozo_fk
JOIN Grupo G ON G.id_asignacion_pk=E.id_asignacion_fk
JOIN Yacimiento Y ON Y.id_campo_pk=P.id_campo_fk


--------------------------------------Vistas que aún no se ejecutan


-- Ejemplo de ejecución del procedimiento almacenado sp_UpdateTrabajador
DECLARE @IdTrabajador INT = 10;  
DECLARE @NombreNuevo VARCHAR(50) = 'NuevoNombre';
DECLARE @ApellidoNuevo VARCHAR(50) = 'NuevoApellido';
DECLARE @IdAsignacionNuevo INT = 2;  -- Coloca el nuevo ID de asignación
DECLARE @IdTipoCargoNuevo INT = 3;  -- Coloca el nuevo ID de tipo de cargo
DECLARE @FechaContratacionNueva DATE = '2023-01-01';  -- Coloca la nueva fecha de contratación

EXEC sp_UpdateTrabajador
    @IdTrabajador = @IdTrabajador,
    @Nombre = @NombreNuevo,
    @Apellido = @ApellidoNuevo,
    @IdAsignacion = @IdAsignacionNuevo,
    @IdTipoCargo = @IdTipoCargoNuevo,
    @FechaContratacion = @FechaContratacionNueva;



----Procedimiento Buscar
CREATE PROCEDURE sp_GetPozoBusqueda
    @searchTerm NVARCHAR(100)
AS
BEGIN
    SELECT
        P.id_pozo_pk,
        P.nombre AS nombre_pozo,
        P.profundidad,
        P.estado,
        Y.nombre_campo AS nombre_yacimiento,
        T.nombre AS nombre_trabajador
    FROM
        Pozo P
    LEFT JOIN
        Yacimiento Y ON P.id_campo_fk = Y.id_campo_pk
    LEFT JOIN
        Extraccion E ON P.id_pozo_pk = E.id_pozo_fk
    LEFT JOIN
        Grupo G ON E.id_asignacion_fk = G.id_asignacion_pk
    LEFT JOIN
        Trabajador T ON G.id_asignacion_pk = T.id_asignacion_fk
    WHERE
        P.nombre LIKE '%' + @searchTerm + '%' OR
        Y.nombre_campo LIKE '%' + @searchTerm + '%' OR
        T.nombre LIKE '%' + @searchTerm + '%';
END;


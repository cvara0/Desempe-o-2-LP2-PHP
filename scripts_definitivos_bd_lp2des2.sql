DROP DATABASE IF EXISTS panel;
CREATE DATABASE panel CHARACTER SET utf8mb4;
USE panel;

#creacion de tabla usuarios
CREATE TABLE Usuarios (
	id INT NOT NULL AUTO_INCREMENT,
    id_rol BIT(3) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    foto VARCHAR(100) NOT NULL,
    email VARCHAR(50) NOT NULL,
    clave VARCHAR(32) NOT NULL,
	fecha_ultimo_acceso DATETIME,
    esta_activo BOOL NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_rol) REFERENCES Roles(id)
);

#insercion de 5 usuarios de prueba (2 admin, 1 analista, 1 comun, 1 soporte)
INSERT INTO Usuarios(id_rol,nombre,apellido,foto,email,clave,fecha_ultimo_acceso,esta_activo) 
	VALUES (1,"Cristian VR","Parra","images/team/team-1.png","cristian@gmail.com",MD5("1234"),NOW(),1);

INSERT INTO Usuarios(id_rol,nombre,apellido,foto,email,clave,fecha_ultimo_acceso,esta_activo) 
	VALUES (1,"Sue","Palacios","images/team/sue.png","sue@gmail.com",MD5("1234"),NOW(),1);

INSERT INTO Usuarios(id_rol,nombre,apellido,foto,email,clave,fecha_ultimo_acceso,esta_activo) 
	VALUES (2,"Natalia","Gonzales","images/team/team-2.png","natalia@gmail.com",MD5("1234"),NOW(),1);

INSERT INTO Usuarios(id_rol,nombre,apellido,foto,email,clave,fecha_ultimo_acceso,esta_activo) 
	VALUES (3,"Victoria","Rodriguez","images/team/team-3.png","victoria@gmail.com",MD5("1234"),NOW(),1);

INSERT INTO Usuarios(id_rol,nombre,apellido,foto,email,clave,fecha_ultimo_acceso,esta_activo) 
	VALUES (4,"Roberto","Gomez","","roberto@gmail.com",MD5("1234"),NOW(),1);

SELECT * FROM Usuarios;
#cambiar estado de activo de algun usuario
SET @id_usuario=4;
UPDATE Usuarios SET esta_activo=1 WHERE id=@id_usuario;
UPDATE Usuarios SET esta_activo=0 WHERE id=@id_usuario;

#creacion de tabla roles , puse id como una variable de 3 bits ya que son solo 4 nros
CREATE TABLE Roles (
	id BIT(3) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

#insercion de los 4 roles
INSERT INTO Roles(id,nombre) VALUES (1,"Administrador");
INSERT INTO Roles(id,nombre) VALUES (2,"Usuario Normal");
INSERT INTO Roles(id,nombre) VALUES (3,"Soporte Técnico");
INSERT INTO Roles(id,nombre) VALUES (4,"Analista");

#creacion de tabla Solicitudes junto a sus vinculaciones a otras tablas , puse id como una variable de 3 bits ya que son solo 4 nros
CREATE TABLE Solicitudes (
	id INT NOT NULL AUTO_INCREMENT,
    id_tipo BIT(3) NOT NULL,
    id_usuario INT NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    descripcion VARCHAR(1000) NOT NULL,
    fecha_carga DATETIME,
    fecha_estimada_resolucion DATETIME,
    PRIMARY KEY (id),
    FOREIGN KEY (id_tipo) REFERENCES Tipos(id),
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id) ON DELETE CASCADE
);

#creacion de tabla tipos , tambien puse id como una variable de 3 bits ya que son solo 3 pero podrian ser hasta 8 nros
CREATE TABLE Tipos (
	id BIT(3) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
);

#insercion de los 3 tipos de solicitud en orden alfabetico 
INSERT INTO Tipos(id,nombre) VALUES (1,"Desarrollo de nuevas funcionalidades");
INSERT INTO Tipos(id,nombre) VALUES (2,"Reporte de errores");
INSERT INTO Tipos(id,nombre) VALUES (3,"Soporte técnico");
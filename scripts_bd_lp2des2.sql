DROP DATABASE IF EXISTS panel;
CREATE DATABASE panel CHARACTER SET utf8mb4;
USE panel;


CREATE TABLE Usuarios (
	id INT NOT NULL AUTO_INCREMENT,
    id_rol BIT(3) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    foto VARCHAR(100) NOT NULL,
    email VARCHAR(50) NOT NULL,
    clave VARCHAR(32) NOT NULL,
	fecha_ultimo_acceso DATE,
    esta_activo BOOL NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_rol) REFERENCES Roles(id)
);

INSERT INTO Usuarios(id_rol,nombre,apellido,foto,email,clave,fecha_ultimo_acceso,esta_activo) 
	VALUES (1,"Cristian VR","Parra","awswaswas","cristian@gmail.com",MD5("1234"),CURDATE(),1);

INSERT INTO Usuarios(id_rol,nombre,apellido,foto,email,clave,fecha_ultimo_acceso,esta_activo) 
	VALUES (1,"Sue","Palacios","awswaswas","sue@gmail.com",MD5("1234"),CURDATE(),1);



SELECT * FROM Usuarios;
DELETE FROM Usuarios WHERE id=3;

CREATE TABLE Roles (
	id BIT(3) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO Roles(id,nombre) VALUES (1,"Administrador");
INSERT INTO Roles(id,nombre) VALUES (2,"Usuario Normal");
INSERT INTO Roles(id,nombre) VALUES (3,"Soporte Técnico");
INSERT INTO Roles(id,nombre) VALUES (4,"Analista");
SELECT * FROM Roles;

CREATE TABLE Solicitudes (
	id INT NOT NULL AUTO_INCREMENT,
    id_tipo BIT(3) NOT NULL,
    id_usuario INT NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    descripcion VARCHAR(1000) NOT NULL,
    fecha_carga DATE,
    fecha_estimada_resolucion DATE,
    PRIMARY KEY (id),
    FOREIGN KEY (id_tipo) REFERENCES Tipos(id),
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)
);

SET @tipo=3;
INSERT INTO Solicitudes(id_tipo,id_usuario,titulo,descripcion,fecha_carga,fecha_estimada_resolucion) 
	VALUES (1,@tipo,"solicitud tipo soporte tecnico A , parra","estoy emitiendo una solicitud de tipo soporte tecnico",CURDATE(),1);

DELIMITER //
DROP FUNCTION IF EXISTS calcular_fecha_estimada;

CREATE FUNCTION calcular_fecha_estimada(tipo BIT(3)) RETURNS DATE
BEGIN
  DECLARE fecha_estimada DATE;
  IF tipo=1 THEN SET fecha_estimada=DATE_ADD(CURDATE(),INTERVAL 7 DAY);
	ELSEIF tipo=2 THEN SET fecha_estimada=DATE_ADD(CURDATE(),INTERVAL 3 DAY);
	ELSEIF tipo=3 THEN SET fecha_estimada=DATE_ADD(CURDATE(),INTERVAL 1 DAY);
  END IF;
  RETURN fecha_estimada;
END
//
DELIMITER ;

CREATE TABLE Tipos (
	id BIT(3) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO Tipos(id,nombre) VALUES (1,"Desarrollo de nuevas funcionalidades");
INSERT INTO Tipos(id,nombre) VALUES (2,"Reporte de errores");
INSERT INTO Tipos(id,nombre) VALUES (3,"Soporte técnico");

SELECT * FROM Tipos;
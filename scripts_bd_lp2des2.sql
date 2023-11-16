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
	VALUES (1,"Cristian VR","Parra","images/team/team-1.png","cristian@gmail.com",MD5("1234"),CURDATE(),1);

INSERT INTO Usuarios(id_rol,nombre,apellido,foto,email,clave,fecha_ultimo_acceso,esta_activo) 
	VALUES (1,"Sue","Palacios","images/team/sue.png","sue@gmail.com",MD5("1234"),CURDATE(),1);

INSERT INTO Usuarios(id_rol,nombre,apellido,foto,email,clave,fecha_ultimo_acceso,esta_activo) 
	VALUES (2,"Natalia","Gonzales","images/team/team-2.png","natalia@gmail.com",MD5("1234"),CURDATE(),1);

INSERT INTO Usuarios(id_rol,nombre,apellido,foto,email,clave,fecha_ultimo_acceso,esta_activo) 
	VALUES (3,"Victoria","Rodriguez","images/team/team-3.png","victoria@gmail.com",MD5("1234"),CURDATE(),1);

INSERT INTO Usuarios(id_rol,nombre,apellido,foto,email,clave,fecha_ultimo_acceso,esta_activo) 
	VALUES (4,"Roberto","Gomez","images/team/user.png","roberto@gmail.com",MD5("1234"),CURDATE(),1);

UPDATE Usuarios SET foto="images/team/team-3.png" WHERE id=7;
UPDATE Usuarios SET esta_activo=0 WHERE id=4;
UPDATE Usuarios SET fecha_ultimo_acceso=$fecha WHERE id=$id;
SELECT * FROM Usuarios;

SELECT id,id_rol,nombre,apellido,foto,email,esta_activo FROM Usuarios WHERE email='sue@gmail.com' AND clave = MD5('1234');

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
SELECT nombre FROM Roles WHERE id=4;


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
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)
);
SET @rol=2;
SET @id_s=7;
SELECT S.*
	FROM 
		Solicitudes AS S JOIN Tipos AS T ON S.id_tipo=T.id 
    JOIN 
		Usuarios AS U ON S.id_usuario=U.id
    JOIN 
		Roles AS R ON U.id_rol=R.id
	WHERE @rol=1 
		OR (@rol=2 AND @id_u=U.id)
        OR (@rol=3 AND T.id=3)
        OR (@rol=4 AND (T.id=1 OR T.id=2));
    
SET @rol=2;
SELECT * FROM Solicitudes WHERE @rol=1;
		
SELECT * FROM Solicitudes;
SELECT * FROM Usuarios;

DROP TABLE Solicitudes;

SET @tipo=1;
INSERT INTO Solicitudes(id_tipo,id_usuario,titulo,descripcion,fecha_carga,fecha_estimada_resolucion) 
	VALUES (@tipo,1,"solicitud tipo soporte tecnico A , parra","estoy emitiendo una solicitud de tipo soporte tecnico",CURDATE(),
	IF (@tipo=1,DATE_ADD(CURDATE(),INTERVAL 7 DAY),
		IF (@tipo=2,DATE_ADD(CURDATE(),INTERVAL 3 DAY),
			IF (@tipo=3,DATE_ADD(CURDATE(),INTERVAL 1 DAY),NULL)
            )
		)
    );




DELETE FROM Solicitudes;
SET sql_safe_updates = 0; # false
SET sql_safe_updates = 1; # true



CREATE TABLE Tipos (
	id BIT(3) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO Tipos(id,nombre) VALUES (1,"Desarrollo de nuevas funcionalidades");
INSERT INTO Tipos(id,nombre) VALUES (2,"Reporte de errores");
INSERT INTO Tipos(id,nombre) VALUES (3,"Soporte técnico");

SELECT * FROM Tipos;
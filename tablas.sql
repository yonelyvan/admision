--tablas de proyecto admision

------------------------------------------ area OK
create table area(
	id 			bigint(20) unsigned not null auto_increment,
	nombre 		varchar(128) default '',
	descripcion	varchar(128) default '',
	primary key (id)
);
--antes
--CREATE TABLE area (
--  id int(11) NOT NULL,
--  nombre varchar(50) NOT NULL,
--  descripcion varchar(100) NOT NULL
--);

INSERT INTO area ( nombre, descripcion) VALUES
('Ingenierias', 'nn'),
('Sociales', 'nh'),
('Biomedicas', 'nn');

-------------------------------------------aula
CREATE TABLE aula (
  id int(11) NOT NULL,
  codigo varchar(30) NOT NULL,
  facultad int(11) NOT NULL
);

-- -------------------------------------------cargo
CREATE TABLE cargo (
  id int(11) NOT NULL,
  nombre varchar(30) NOT NULL,
  funcion varchar(100) NOT NULL,
  tipo varchar(30) NOT NULL,
  monto float NOT NULL,
  observacion varchar(100) NOT NULL
);


INSERT INTO cargo (id, nombre, funcion, tipo, monto, observacion) VALUES
(1, 'Arbitro', 'Arbitrar', 'Descuento', 50, 'facil'),
(2, 'cuidante', 'cuidar pues', 'Pago', 80, 'nivel intermedio');

-- -----------------------------------------------examen
CREATE TABLE examen (
  id int(11) NOT NULL,
  descripcion varchar(100) NOT NULL,
  tipo varchar(50) NOT NULL,
  proceso int(11) NOT NULL
);

-- -----------------------------------------------facultad
CREATE TABLE facultad (
  id int(11) NOT NULL,
  nombre varchar(50) NOT NULL,
  cantidad_aulas int(11) NOT NULL,
  area int(11) NOT NULL
);


INSERT INTO facultad (id, nombre, cantidad_aulas, area) VALUES
(1, 'Ing Sistemas', 50, 2),
(2, 'Medicina', 90, 3),
(3, 'Derecho', 40, 2),
(4, 'Contabilidad', 30, 2),
(5, 'Marketing', 70, 2),
(6, 'Enfermeria', 10, 3),
(7, 'Antropologia', 5, 2);

-- -------------------------------------------------personal
CREATE TABLE personal (
  codigo varchar(30) NOT NULL,
  nombre varchar(80) NOT NULL,
  apellido varchar(80) NOT NULL,
  correo varchar(20) NOT NULL,
  cargo int(11) NOT NULL,
  facultad int(11) NOT NULL,
  telefono varchar(9) NOT NULL
);



INSERT INTO personal (codigo, nombre, apellido, correo, cargo, facultad, telefono) VALUES
('1', 'YESSIKA MADELAINE', 'ABARCA ARIAS', 'yabarca@unsa.edu.pe', 1, 3, '2135132'),
('2', 'JULIO CESAR', 'ABARCA CORDERO', 'jabarca@unsa.edu.pe', 2, 2, '1232132'),
('3', 'JACINTA MAYRENE', 'ABARCA DEL CARPIO', 'cabarcad@unsa.edu.pe', 2, 5, '1232131'),
('4', 'OLGER NICOLAS', 'ACOSTA ANGULO', 'oacostaa@unsa.edu.pe', 1, 2, '2524324'),
('5', 'MANUEL JESUS', 'ACOSTA CALDERON', 'macostaca@unsa.edu.p', 1, 1, '1233121'),
('6', 'LORENA TEREZINHA', 'ACOSTA LOPEZ SILVA', 'lacostalopez@unsa.ed', 2, 3, '1232321');

-- ----------------------------------------------pregunta
CREATE TABLE pregunta (
  id int(11) NOT NULL,
  descripcion text NOT NULL,
  respuesta text NOT NULL,
  examen int(11) NOT NULL
);

-- -----------------------------------------------proceso



CREATE TABLE proceso (
  id int(11) NOT NULL,
  nombre varchar(50) NOT NULL,
  cantidad_vacantes int(11) NOT NULL,
  fecha_1 date NOT NULL,
  fecha_2 date NOT NULL,
  fecha_opcinal date NOT NULL,
  gastos varchar(50) NOT NULL
);



INSERT INTO proceso (id, nombre, cantidad_vacantes, fecha_1, fecha_2, fecha_opcinal, gastos) VALUES
(1, 'ord2016 ll', 800, '2017-01-19', '0000-00-00', '0000-00-00', '7000'),
(2, 'Ceprunsa 2018 Fase lll', 300, '2017-01-19', '2017-01-18', '0000-00-00', '7665'),
(3, 'Ord 2017 fase lll', 8000, '2017-01-12', '0000-00-00', '0000-00-00', '9000'),
(4, 'ORDINARIO N4939', 900, '2017-01-04', '0000-00-00', '2017-01-10', '');

-- -------------------------------------------------proceso_aula



CREATE TABLE proceso_aula (
  id int(11) NOT NULL,
  proceso int(11) NOT NULL,
  aula int(11) NOT NULL
);

-- ------------------------------------------------proceso_personal



CREATE TABLE proceso_personal (
  id int(11) NOT NULL,
  proceso int(11) NOT NULL,
  personal varchar(30) NOT NULL,
  proceso_aula int(11) NOT NULL,
  comentario text NOT NULL
);

-- -------------------------------------------------usuarios OK
CREATE TABLE usuarios (
	id 		bigint(20) unsigned not null auto_increment,
  	nom 	varchar(128) default '',
  	usu 	varchar(128) not null,
  	con 	varchar(128) not null,
  	tipo 	varchar(128) not null,
  	primary key(id)
);


INSERT INTO usuarios (nom, usu, con, tipo) VALUES
('Hayde Luzmila', 'admin', 'admin', 'a'),
('YONEL MAMANI', 'yonel', 'root', 'a');
-----------------------------------------------------------

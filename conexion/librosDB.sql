CREATE DATABASE IF NOT EXISTS librosDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

USE librosDB;

CREATE TABLE libros (
  id int(11) NOT NULL AUTO_INCREMENT,
  isbn varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  titulo varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  autor varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  anio int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE = InnoDB;

INSERT INTO libros VALUES
(1,'9788425223280','Diseño ecológico. 1000 ejemplos ',' Rebecca Proctor',2003),
(2,'3567894145646','La Comunidad del Anillo','Tolkien',1945),
(3,'7897897987743','Las dos Towers','Tolkien',1948),
(5,'1565123121133','El Retorno del Rey','Perico',1952),
(6,'7532164321569','Mortadelo y Filemón','Pinchoti',1992),
(7,'9636669852254','La Biblia','Yisus Craist', 0),
(8,'1114447775523','Harry Potter y la Orden del Fénix','J. K. Rowling',2003),
(9,'9985322645512','Harry Potter y el misterio del príncipe','J. K. Rowling',2005),
(10,'7755825413965','Harry Potter y las Reliquias de la Muerte','J. K. Rowling',2007),
(11,'1546547897895','El Alquimista','Paulo Coelho',2009),
(12,'1203002458047','El Código da Vinci','Dan Brown',2008),
(13,'4526600136789','Lo que el viento se llevó','Margaret Mitchell',1956),
(14,'8866001456998','El diario de Ana Frank','Anna Frank',1945);



/* USUARIO QUE SE UTILIZA PARA LAS LA APLICACIÓN */

CREATE USER 'librero'@'localhost' IDENTIFIED BY 'elPass';
GRANT SELECT ON librosDB.libros TO 'librero'@'localhost';  
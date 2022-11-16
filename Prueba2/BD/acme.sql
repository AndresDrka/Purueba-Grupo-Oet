-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.24-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.2.0.6576
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para acme
CREATE DATABASE IF NOT EXISTS `acme` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `acme`;

-- Volcando estructura para tabla acme.conductor
CREATE TABLE IF NOT EXISTS `conductor` (
  `idcedu_cond` int(11) NOT NULL AUTO_INCREMENT,
  `pri_nombre_cond` varchar(45) NOT NULL,
  `seg_nombre_cond` varchar(45) NOT NULL,
  `apellido_cond` varchar(45) NOT NULL,
  `direccion_cond` varchar(250) DEFAULT NULL,
  `ciudad_cond` varchar(45) DEFAULT NULL,
  `telefono_cond` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcedu_cond`),
  UNIQUE KEY `telefono_cond` (`telefono_cond`)
) ENGINE=InnoDB AUTO_INCREMENT=1030658824 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla acme.conductor: ~2 rows (aproximadamente)
DELETE FROM `conductor`;
INSERT INTO `conductor` (`idcedu_cond`, `pri_nombre_cond`, `seg_nombre_cond`, `apellido_cond`, `direccion_cond`, `ciudad_cond`, `telefono_cond`) VALUES
	(25544351, 'Cinia ', 'Omaira ', 'Camayo Cometa', 'Cra. 89A #70a Sur-1 a 70a Sur-33, Bogotá', 'Bogota ', '3138456024'),
	(1030658823, 'Andres', 'Felipe', 'Camayo Cometa', 'Calle 78 bis sur # 94 - 27 Torre 12, apartamento 4046, Bogotá, Cundinamarca', 'Bogota', '+57 3203117056');

-- Volcando estructura para tabla acme.horarios
CREATE TABLE IF NOT EXISTS `horarios` (
  `idhora` int(11) NOT NULL AUTO_INCREMENT,
  `hora_salida` time NOT NULL,
  `hora_entrada` time NOT NULL,
  `placa` int(11) NOT NULL,
  `idcedu_cond` int(11) NOT NULL,
  PRIMARY KEY (`idhora`),
  KEY `placa` (`placa`),
  KEY `idcedu_cond` (`idcedu_cond`),
  CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`placa`) REFERENCES `vehiculo` (`placa`) ON DELETE CASCADE,
  CONSTRAINT `horarios_ibfk_2` FOREIGN KEY (`idcedu_cond`) REFERENCES `conductor` (`idcedu_cond`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla acme.horarios: ~2 rows (aproximadamente)
DELETE FROM `horarios`;
INSERT INTO `horarios` (`idhora`, `hora_salida`, `hora_entrada`, `placa`, `idcedu_cond`) VALUES
	(1, '13:23:13', '22:23:13', 73111, 1030658823),
	(2, '12:09:25', '17:09:25', 88444, 25544351);

-- Volcando estructura para tabla acme.vehiculo
CREATE TABLE IF NOT EXISTS `vehiculo` (
  `placa` int(11) NOT NULL AUTO_INCREMENT,
  `idcedu_cond` int(11) NOT NULL,
  `pri_nombre_pro` varchar(45) NOT NULL,
  `seg_nombre` varchar(45) NOT NULL,
  `apellido_pro` varchar(45) NOT NULL,
  `direccion_pro` varchar(250) DEFAULT NULL,
  `ciudad_pro` varchar(45) DEFAULT NULL,
  `telefono_pro` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `maraca` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`placa`),
  UNIQUE KEY `telefono_pro` (`telefono_pro`),
  UNIQUE KEY `color` (`color`),
  UNIQUE KEY `maraca` (`maraca`),
  UNIQUE KEY `tipo` (`tipo`),
  KEY `idcedu_cond` (`idcedu_cond`),
  CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`idcedu_cond`) REFERENCES `conductor` (`idcedu_cond`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=88445 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla acme.vehiculo: ~2 rows (aproximadamente)
DELETE FROM `vehiculo`;
INSERT INTO `vehiculo` (`placa`, `idcedu_cond`, `pri_nombre_pro`, `seg_nombre`, `apellido_pro`, `direccion_pro`, `ciudad_pro`, `telefono_pro`, `color`, `maraca`, `tipo`) VALUES
	(73111, 1030658823, 'Jeison ', 'alejandro', 'Guzman', 'Cra. 89A #65-18, Bogotá', 'Bogota', '3125140198', 'blanco', 'chevrolet', 'particular'),
	(88444, 25544351, 'James', 'Randly', 'Guazman', 'Cl. 70a Sur #89 14, Bosa, Bogotá, Cundinamarca', 'Bogota', '3153819051', 'gris', 'Nokia', 'publico');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

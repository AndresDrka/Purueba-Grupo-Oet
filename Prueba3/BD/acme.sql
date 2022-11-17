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
  `pri_nombre_cond` varchar(45) DEFAULT NULL,
  `seg_nombre_cond` varchar(45) DEFAULT NULL,
  `apellido_cond` varchar(45) DEFAULT NULL,
  `direccion_cond` varchar(250) DEFAULT NULL,
  `ciudad_cond` varchar(45) DEFAULT NULL,
  `telefono_:pro` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idcedu_cond`)
) ENGINE=InnoDB AUTO_INCREMENT=1030658824 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla acme.conductor: ~3 rows (aproximadamente)
DELETE FROM `conductor`;
INSERT INTO `conductor` (`idcedu_cond`, `pri_nombre_cond`, `seg_nombre_cond`, `apellido_cond`, `direccion_cond`, `ciudad_cond`, `telefono_:pro`) VALUES
	(12334976, 'Alejo', 'Jeison', 'Guzman Camayo', 'call88', 'Barranquilla', '789645'),
	(879896536, 'sofia', 'Alison', 'Camacho Garcia', 'calle99', 'guajira', '879946432'),
	(1030658823, 'Andres', 'Felipe', 'Camayo Cometa', 'calle49b88c42', 'Bogota', '3203117056');

-- Volcando estructura para tabla acme.propietario
CREATE TABLE IF NOT EXISTS `propietario` (
  `cedula_pro` int(11) NOT NULL AUTO_INCREMENT,
  `pri_nombre_pro` varchar(40) DEFAULT NULL,
  `seg_nombre_pro` varchar(40) DEFAULT NULL,
  `apellido_pro` varchar(40) DEFAULT NULL,
  `dirección _pro` varchar(10) DEFAULT NULL,
  `telefono_pro` varchar(40) DEFAULT NULL,
  `ciudad_pro` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cedula_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=1030658824 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla acme.propietario: ~2 rows (aproximadamente)
DELETE FROM `propietario`;
INSERT INTO `propietario` (`cedula_pro`, `pri_nombre_pro`, `seg_nombre_pro`, `apellido_pro`, `dirección _pro`, `telefono_pro`, `ciudad_pro`) VALUES
	(25544351, 'Cinia', 'Omaira', 'Camayo Cometa', 'call77', '3138456024', 'cali'),
	(1030658823, 'Andres', 'Felipe', 'Guzman', 'calle49', '3125140198', 'Bogota');

-- Volcando estructura para tabla acme.vehiculo
CREATE TABLE IF NOT EXISTS `vehiculo` (
  `Placa` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(40) DEFAULT NULL,
  `marca` varchar(40) DEFAULT NULL,
  `tipo` varchar(40) DEFAULT NULL,
  `cedula_pro` int(11) DEFAULT NULL,
  `idcedu_cond` int(11) DEFAULT NULL,
  PRIMARY KEY (`Placa`),
  KEY `cedula_pro` (`cedula_pro`),
  KEY `idcedu_cond` (`idcedu_cond`),
  CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`idcedu_cond`) REFERENCES `conductor` (`idcedu_cond`) ON DELETE CASCADE,
  CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`cedula_pro`) REFERENCES `propietario` (`cedula_pro`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=888778 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla acme.vehiculo: ~2 rows (aproximadamente)
DELETE FROM `vehiculo`;
INSERT INTO `vehiculo` (`Placa`, `color`, `marca`, `tipo`, `cedula_pro`, `idcedu_cond`) VALUES
	(777111, 'blanco', 'chevrolet', 'particular', 1030658823, 12334976),
	(888777, 'gris', 'nokia', 'publico', 25544351, 879896536);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

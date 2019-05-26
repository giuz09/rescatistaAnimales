-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-05-2019 a las 16:04:03
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_rescatista`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animales`
--

DROP TABLE IF EXISTS `animales`;
CREATE TABLE IF NOT EXISTS `animales` (
  `idAnimal` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8mb4_swedish_ci NOT NULL,
  `especie` varchar(200) COLLATE utf8mb4_swedish_ci NOT NULL,
  `raza` varchar(200) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_swedish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `fechaRegistro` date NOT NULL,
  `foto` varchar(500) COLLATE utf8mb4_swedish_ci NOT NULL COMMENT 'Contiene la ruta en el servidor a la foto del animal',
  `idDueño` int(20) NOT NULL COMMENT 'Contiene el id de la persona que tiene a determinado animal en ese momento, puede ser rescatista o adoptante',
  `estado` int(3) NOT NULL COMMENT '0=baja lógica. 1=en busca de adoptantes. 2=Adoptado.',
  PRIMARY KEY (`idAnimal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rescatistas`
--

DROP TABLE IF EXISTS `rescatistas`;
CREATE TABLE IF NOT EXISTS `rescatistas` (
  `idRescatista` int(50) NOT NULL AUTO_INCREMENT,
  `dni` int(20) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `apellido` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_swedish_ci NOT NULL,
  `direccion` varchar(250) COLLATE utf8_swedish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `telefono` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `estado` int(3) NOT NULL COMMENT '0=baja lógica. 1=no validado. 2=validado',
  `pass` varchar(250) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`idRescatista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

DROP TABLE IF EXISTS `solicitudes`;
CREATE TABLE IF NOT EXISTS `solicitudes` (
  `idSolicitud` int(20) NOT NULL AUTO_INCREMENT,
  `idAdoptante` int(20) NOT NULL,
  `idRescatista` int(20) NOT NULL,
  `idAnimal` int(20) NOT NULL,
  `fechaSolicitud` date NOT NULL COMMENT 'Fecha en que el adoptante solicita adoptar al animal',
  PRIMARY KEY (`idSolicitud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

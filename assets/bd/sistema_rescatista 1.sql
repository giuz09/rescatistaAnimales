-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-06-2019 a las 20:57:03
-- Versión del servidor: 5.7.19
-- Versión de PHP: 7.0.23

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
  `nombre` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `especie` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `raza` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_swedish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `fechaRegistro` date NOT NULL,
  `foto` varchar(500) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Contiene la ruta en el servidor a la foto del animal',
  `idDueño` int(20) NOT NULL COMMENT 'Contiene el id de la persona que tiene a determinado animal en ese momento, puede ser rescatista o adoptante',
  `estado` int(3) NOT NULL COMMENT '0=baja lógica. 1=en busca de adoptantes. 2=Adoptado.',
  `sexo` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`idAnimal`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Volcado de datos para la tabla `animales`
--

INSERT INTO `animales` (`idAnimal`, `nombre`, `especie`, `raza`, `descripcion`, `fechaNacimiento`, `fechaRegistro`, `foto`, `idDueño`, `estado`, `sexo`) VALUES
(1, 'Beto', 'Perro', 'Perro', 'Barbucho, mugroso', '2016-04-15', '2019-06-01', '0', 2, 1, 'Macho'),
(2, 'Pancho', 'Gato', 'Angora', 'Manchado', '2018-12-15', '2019-06-04', '0', 2, 2, 'Macho'),
(3, 'Pirata', 'Perro', 'Perro', 'Blanco y negro', '2010-01-20', '2016-03-30', '0', 2, 0, 'Macho');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Volcado de datos para la tabla `rescatistas`
--

INSERT INTO `rescatistas` (`idRescatista`, `dni`, `nombre`, `apellido`, `email`, `direccion`, `fechaNacimiento`, `telefono`, `estado`, `pass`) VALUES
(1, 20000000, 'Juan', 'Pablo', 'jpablo@outlook.com', 'Los pioneros s/n', '1980-05-14', '02904324523', 2, 'checkea'),
(2, 39443523, 'Horacio', 'Monsalvo', 'horaciomonsalvo@gmail.com', 'Los pioneros s/n', '1996-06-14', '2945552884', 2, 'pass1234'),
(3, 10000000, 'Pica', 'Swift', 'picadillo@swift.com', 'Pate de foie 145, Venado Tuerto', '1954-06-12', '2222222222222', 2, 'dillo');

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

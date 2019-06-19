-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-06-2019 a las 00:43:37
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
  `idDueño` int(20) DEFAULT NULL COMMENT 'Contiene el id del adoptante de un animal',
  `idRescatista` int(50) NOT NULL,
  `estado` int(3) NOT NULL COMMENT '0=baja lógica. 1=en busca de adoptantes. 2=Adoptado.',
  `sexo` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`idAnimal`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Volcado de datos para la tabla `animales`
--

INSERT INTO `animales` (`idAnimal`, `nombre`, `especie`, `raza`, `descripcion`, `fechaNacimiento`, `fechaRegistro`, `foto`, `idDueño`, `idRescatista`, `estado`, `sexo`) VALUES
(1, 'Beto', 'Perro', 'Perro', 'Petiso barbucho, mugroso', '2016-04-15', '2019-04-01', 'otroPerro.jpg', NULL, 2, 1, 'Macho'),
(2, 'Pancho', 'Gato', 'Angora', 'Manchado', '2018-12-15', '2019-03-04', 'gato.jpg', NULL, 2, 1, 'Macho'),
(3, 'Fatiga', 'Perro', 'Perro', 'Gordito, marron', '2010-01-20', '2019-04-30', 'perrito.jpg', NULL, 2, 1, 'Macho'),
(4, 'Charly', 'Perro', 'Ninguna', 'Amarillo y blanco, pelo largo', '1998-03-10', '2019-03-07', '00002.jpg', NULL, 2, 1, 'Macho'),
(5, 'Tigre', 'Gato', 'Gato', 'Atigrado', '2019-06-05', '2019-06-18', 'tigresin.jpg', 1, 3, 2, 'Macho'),
(6, 'Burton', 'Perro', 'Rottweiler', 'Chachorro', '2019-04-17', '2019-06-18', 'burton.jpg', NULL, 2, 1, 'Macho'),
(7, 'Copito', 'Perro', 'Labrador', 'Cachorrito blanco, pelo corto', '2019-03-28', '2019-05-30', '1.jpg', NULL, 4, 1, 'Macho'),
(8, 'Terry', 'Perro', 'Shwadog', 'Cachorrito marron, pelo largo', '2019-02-28', '2019-06-13', '2.jpg', NULL, 4, 1, 'Macho'),
(9, 'Popeye', 'Rata', 'Hamster', 'Roedor blanco, supuesto hamster', '2018-02-28', '2019-02-13', '3.jpg', NULL, 3, 1, 'Macho'),
(10, 'Pini', 'Erizo', 'Erizo', 'Blanco, chiquito', '2019-01-28', '2019-05-13', '4.jpg', NULL, 4, 1, 'Hembra'),
(11, 'Orejas', 'Conejo', 'Peggy', 'Rosada o marron claro, tiene las orejas raras', '2018-06-28', '2019-04-13', '5.jpg', NULL, 4, 1, 'Macho');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `estadistica`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `estadistica`;
CREATE TABLE IF NOT EXISTS `estadistica` (
`en_transito` bigint(21)
,`adoptados` bigint(21)
);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Volcado de datos para la tabla `rescatistas`
--

INSERT INTO `rescatistas` (`idRescatista`, `dni`, `nombre`, `apellido`, `email`, `direccion`, `fechaNacimiento`, `telefono`, `estado`, `pass`) VALUES
(1, 20000000, 'Juan', 'Pablo', 'jpablo@outlook.com', 'Los pioneros s/n', '1980-05-14', '02904324523', 2, 'checkea'),
(2, 39443523, 'Horacio', 'Monsalvo', 'horaciomonsalvo@gmail.com', 'Los pioneros s/n', '1996-06-14', '2945552884', 2, 'pass1234'),
(3, 10000000, 'Pica', 'Swift', 'picadillo@swift.com', 'Pate de foie 145, Venado Tuerto', '1954-06-12', '2222222222222', 2, 'dillo'),
(4, 34327458, 'Ludmila', 'Marselore', 'ludmimarse@outlook.com', 'Pje Castañeda 143, Comodoro Rivadavia', '1959-04-22', '2979293485', 2, 'cdsoijfoe'),
(5, 20241432, 'Arturo', 'Seduro', 'arturo343258@gmail.com', 'Vizvonte 654, Trelew', '1948-04-29', '28043253234', 1, 'asndoadeder'),
(6, 38343523, 'Cecilia', 'Galeano', 'cgaleano@hotmail.com.ar', 'San martin 547', '1995-03-19', '29453425434', 1, 'chamala');

-- --------------------------------------------------------

--
-- Estructura para la vista `estadistica`
--
DROP TABLE IF EXISTS `estadistica`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `estadistica`  AS  select `e`.`cant` AS `en_transito`,`a`.`cant` AS `adoptados` from (((select count(0) AS `cant` from `animales` `b` where (isnull(`b`.`idDueño`) and (`b`.`fechaRegistro` < (curdate() - interval 1 month))))) `e` join (select count(0) AS `cant` from `animales` `a` where (`a`.`estado` = 2)) `a`) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

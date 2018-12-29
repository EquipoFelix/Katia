-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-12-2018 a las 23:19:20
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `n_control` int(10) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `a_paterno` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `a_materno` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `domicilio` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `localidad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(11) COLLATE utf8_unicode_ci DEFAULT 'S/N',
  `id_grado` int(5) DEFAULT NULL,
  `id_grupo` int(5) DEFAULT NULL,
  `foto` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'src/foto.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`n_control`, `nombre`, `a_paterno`, `a_materno`, `domicilio`, `localidad`, `telefono`, `id_grado`, `id_grupo`, `foto`) VALUES
(1, 'Rubiel', 'Agudelo', 'Echeverry', 'Ejidal', 'Tepecoacuilco de Trujano', '7339106936', 3, 4, 'src/foto.png'),
(3, 'Alejandra', 'Arango', 'Alvarez', 'Arboledas', 'Tepecoacuilco de Trujano', '7339262659', 2, 3, 'src/foto.png'),
(4, 'Jaider', 'Arango', 'Arango', 'Ejidal', 'Tepecoacuilco de Trujano', '7330857554', 6, 4, 'src/foto.png'),
(5, 'Marlen', 'Arango', 'Posada', 'Arboledas', 'Tepecoacuilco de Trujano', '7337516878', 3, 3, 'src/foto.png'),
(6, 'Johana', 'Atehortua', 'Agudelo', 'Centro', 'Tepecoacuilco de Trujano', '7332490776', 2, 1, 'src/foto.png'),
(7, 'Nai', 'Atehortua', 'Atehortua', 'Centro', 'Tepecoacuilco de Trujano', '7339396988', 5, 3, 'src/foto.png'),
(8, 'Luz', 'Ayala', 'Mira', 'Centro', 'Tepecoacuilco de Trujano', '7336371926', 1, 2, 'src/foto.png'),
(9, 'Jhon', 'Barrientos', 'González', 'Arboledas', 'Tepecoacuilco de Trujano', '7337725414', 4, 4, 'src/foto.png'),
(10, 'Mauro', 'Betancur', 'Pineda', 'Ejidal', 'Tepecoacuilco de Trujano', '7336383040', 6, 5, 'src/foto.png'),
(11, 'Luis', 'Bustamante', 'Taborda', 'Ejidal', 'Tepecoacuilco de Trujano', '7336311345', 5, 3, 'src/foto.png'),
(12, 'Yulieth', 'Cardenas', 'Chaverra', 'Arboledas', 'Tepecoacuilco de Trujano', '7330589488', 2, 2, 'src/foto.png'),
(13, 'Daniel', 'Cardona', 'Loaiza', 'Ejidal', 'Tepecoacuilco de Trujano', '7332228571', 3, 3, 'src/foto.png'),
(14, 'Jeisson', 'Castaño', 'Piedrahita', 'Centro', 'Tepecoacuilco de Trujano', '7332939542', 4, 7, 'src/foto.png'),
(15, 'Juan', 'Benitez', 'Castro', 'Centro', 'dkfmd', '7331288097', 3, 4, 'src/foto.png'),
(16, 'Katia Rubit', 'Benitez', 'Castro', 'Centro', 'Tepecoacuilco de Trujano', '7331288097', 2, 9, 'src/foto.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asig_mate`
--

CREATE TABLE `asig_mate` (
  `id_materia` int(5) NOT NULL,
  `id_maestro` int(8) NOT NULL,
  `hora` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id_grado` int(5) NOT NULL,
  `nombre_grado` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id_grado`, `nombre_grado`) VALUES
(1, '1°'),
(2, '2°'),
(3, '3°'),
(4, '4°'),
(5, '5°'),
(6, '6°');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(5) NOT NULL,
  `grupo` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `grupo`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F'),
(7, 'G'),
(8, 'H'),
(9, 'I'),
(10, 'J'),
(11, 'K'),
(12, 'L');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `n_control` int(8) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `a_paterno` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `a_materno` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `domicilio` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `localidad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`n_control`, `nombre`, `a_paterno`, `a_materno`, `mail`, `domicilio`, `localidad`, `telefono`, `foto`) VALUES
(1, 'Katia Rubit', 'Benitez', 'Castro', 'jatsi.1992@gmail.com', 'Centro', 'dkfmd', '7331288097', 'src/1m.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(5) NOT NULL,
  `nombre_materia` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `nombre_materia`) VALUES
(1, 'Español'),
(2, 'Matematiacas'),
(3, 'Geografia'),
(4, 'Ciencias Naturales'),
(5, 'Formacion Civica y Etica'),
(6, 'Historia'),
(7, 'Ingles'),
(8, 'Computacion'),
(9, 'Educación Física');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`n_control`),
  ADD KEY `id_grado` (`id_grado`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- Indices de la tabla `asig_mate`
--
ALTER TABLE `asig_mate`
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `id_m` (`id_maestro`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id_grado`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`n_control`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `n_control` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id_grado` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `n_control` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id_grado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `asig_mate`
--
ALTER TABLE `asig_mate`
  ADD CONSTRAINT `asig_mate_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`),
  ADD CONSTRAINT `asig_mate_ibfk_2` FOREIGN KEY (`id_maestro`) REFERENCES `maestros` (`n_control`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

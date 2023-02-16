-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2022 a las 13:22:35
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejercicio3_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `numero_expediente` int(11) NOT NULL,
  `nombre_alumno` varchar(30) NOT NULL,
  `apellidos_alumno` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_modulos`
--

CREATE TABLE `alumnos_modulos` (
  `id_alumno_modulo` int(11) NOT NULL,
  `numero_expediente_alumno` int(11) NOT NULL,
  `codigo_modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `codigo_modulo` int(11) NOT NULL,
  `nombre_modulo` varchar(50) NOT NULL,
  `dni_profesor` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `dni_profesor` varchar(15) NOT NULL,
  `nombre_profesor` varchar(100) NOT NULL,
  `direccion_profesor` varchar(100) NOT NULL,
  `telefono_profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`numero_expediente`);

--
-- Indices de la tabla `alumnos_modulos`
--
ALTER TABLE `alumnos_modulos`
  ADD PRIMARY KEY (`id_alumno_modulo`),
  ADD KEY `fk_alumno` (`numero_expediente_alumno`),
  ADD KEY `fk_modulo` (`codigo_modulo`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`codigo_modulo`),
  ADD KEY `fk_profesor` (`dni_profesor`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`dni_profesor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `numero_expediente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `alumnos_modulos`
--
ALTER TABLE `alumnos_modulos`
  MODIFY `id_alumno_modulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `codigo_modulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos_modulos`
--
ALTER TABLE `alumnos_modulos`
  ADD CONSTRAINT `fk_alumno` FOREIGN KEY (`numero_expediente_alumno`) REFERENCES `alumnos` (`numero_expediente`),
  ADD CONSTRAINT `fk_modulo` FOREIGN KEY (`codigo_modulo`) REFERENCES `modulos` (`codigo_modulo`);

--
-- Filtros para la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD CONSTRAINT `fk_profesor` FOREIGN KEY (`dni_profesor`) REFERENCES `profesores` (`dni_profesor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

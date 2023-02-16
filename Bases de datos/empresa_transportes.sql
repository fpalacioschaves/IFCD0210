-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2022 a las 14:14:47
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empresa_transportes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camioneros`
--

CREATE TABLE `camioneros` (
  `dni` varchar(10) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `salario` int(11) DEFAULT NULL,
  `poblacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camiones`
--

CREATE TABLE `camiones` (
  `matricula` varchar(20) NOT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `potencia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camiones_camioneros`
--

CREATE TABLE `camiones_camioneros` (
  `id_transporte` int(11) NOT NULL,
  `id_camionero` varchar(10) DEFAULT NULL,
  `id_camion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `destinatario` varchar(200) DEFAULT NULL,
  `direccion_destinatario` varchar(250) DEFAULT NULL,
  `id_camionero` varchar(10) DEFAULT NULL,
  `id_provincia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `camioneros`
--
ALTER TABLE `camioneros`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `camiones`
--
ALTER TABLE `camiones`
  ADD PRIMARY KEY (`matricula`);

--
-- Indices de la tabla `camiones_camioneros`
--
ALTER TABLE `camiones_camioneros`
  ADD PRIMARY KEY (`id_transporte`),
  ADD KEY `fk_3` (`id_camionero`),
  ADD KEY `fk_4` (`id_camion`);

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fK_1` (`id_camionero`),
  ADD KEY `fk_2` (`id_provincia`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `camiones_camioneros`
--
ALTER TABLE `camiones_camioneros`
  MODIFY `id_transporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `camiones_camioneros`
--
ALTER TABLE `camiones_camioneros`
  ADD CONSTRAINT `fk_3` FOREIGN KEY (`id_camionero`) REFERENCES `camioneros` (`dni`),
  ADD CONSTRAINT `fk_4` FOREIGN KEY (`id_camion`) REFERENCES `camiones` (`matricula`);

--
-- Filtros para la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD CONSTRAINT `fK_1` FOREIGN KEY (`id_camionero`) REFERENCES `camioneros` (`dni`),
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

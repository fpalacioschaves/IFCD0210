-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2022 a las 13:21:12
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
-- Base de datos: `ejercicio2_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camioneros`
--

CREATE TABLE `camioneros` (
  `dni` varchar(15) NOT NULL,
  `nombre_camionero` varchar(50) NOT NULL,
  `telefono_camionero` int(11) NOT NULL,
  `direccion_camionero` varchar(100) NOT NULL,
  `salario_camionero` decimal(8,2) NOT NULL,
  `poblacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camiones`
--

CREATE TABLE `camiones` (
  `matricula` varchar(10) NOT NULL,
  `modelo_camion` varchar(30) NOT NULL,
  `tipo_camion` varchar(30) NOT NULL,
  `potencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camiones_camioneros`
--

CREATE TABLE `camiones_camioneros` (
  `id_camion_camionero` int(11) NOT NULL,
  `fk_camion` varchar(10) NOT NULL,
  `fk_camionero` varchar(15) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `codigo_paquete` int(11) NOT NULL,
  `descripcion_paquete` varchar(250) NOT NULL,
  `destinatario_paquete` varchar(100) NOT NULL,
  `direccion_destinatario` varchar(100) NOT NULL,
  `codigo_provincia` int(11) NOT NULL,
  `fk_camionero` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `codigo_provincia` int(11) NOT NULL,
  `nombre_provincia` varchar(25) NOT NULL
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
  ADD PRIMARY KEY (`id_camion_camionero`),
  ADD KEY `fk_camion` (`fk_camion`),
  ADD KEY `fk_camionero` (`fk_camionero`);

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`codigo_paquete`),
  ADD KEY `fk_camionero_paquete` (`fk_camionero`),
  ADD KEY `fk_provincia` (`codigo_provincia`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`codigo_provincia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `camiones_camioneros`
--
ALTER TABLE `camiones_camioneros`
  MODIFY `id_camion_camionero` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `codigo_paquete` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `codigo_provincia` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `camiones_camioneros`
--
ALTER TABLE `camiones_camioneros`
  ADD CONSTRAINT `fk_camion` FOREIGN KEY (`fk_camion`) REFERENCES `camiones` (`matricula`),
  ADD CONSTRAINT `fk_camionero` FOREIGN KEY (`fk_camionero`) REFERENCES `camioneros` (`dni`);

--
-- Filtros para la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD CONSTRAINT `fk_camionero_paquete` FOREIGN KEY (`fk_camionero`) REFERENCES `camioneros` (`dni`),
  ADD CONSTRAINT `fk_provincia` FOREIGN KEY (`codigo_provincia`) REFERENCES `provincias` (`codigo_provincia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

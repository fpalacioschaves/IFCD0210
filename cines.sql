-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 12-04-2022 a las 18:14:33
-- Versión del servidor: 5.7.32
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `cines`
--
CREATE DATABASE IF NOT EXISTS `cines` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cines`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `Code` int(11) NOT NULL PRIMARY KEY AUTO INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Rating` varchar(255) DEFAULT NULL,
  `Money` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`Code`, `Title`, `Rating`, `Money`) VALUES
(1, 'Citizen Kane', 'PG', 14000),
(2, 'Singin\' in the Rain', 'G', 25000),
(3, 'The Wizard of Oz', 'G', 45000),
(4, 'The Quiet Man', NULL, 14000),
(5, 'North by Northwest', NULL, 35000),
(6, 'The Last Tango in Paris', 'NC-17', 100000),
(7, 'Some Like it Hot', 'PG-13', 450000),
(8, 'A Night at the Opera', NULL, 50000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movietheaters`
--

CREATE TABLE `movietheaters` (
  `Code` int(11) NOT NULL PRIMARY KEY AUTO INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Movie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movietheaters`
--

INSERT INTO `movietheaters` (`Code`, `Name`, `Movie`) VALUES
(1, 'Odeon', 5),
(2, 'Imperial', 1),
(3, 'Majestic', NULL),
(4, 'Royale', 6),
(5, 'Paraiso', 3),
(6, 'Nickelodeon', NULL);

--
-- Índices para tablas volcadas
--


--
-- Indices de la tabla `movietheaters`
--
ALTER TABLE `movietheaters`
  ADD KEY `Movie` (`Movie`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `movietheaters`
--
ALTER TABLE `movietheaters`
  ADD CONSTRAINT `movietheaters_ibfk_1` FOREIGN KEY (`Movie`) REFERENCES `movies` (`Code`);

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2022 a las 09:13:08
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
-- Base de datos: `music`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `id` int(10) UNSIGNED NOT NULL,
  `artist_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `year` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`id`, `artist_id`, `name`, `year`) VALUES
(1, 1, '...And Justice For All', 1988),
(2, 1, 'Black Album', 1991),
(3, 1, 'Master of Puppets', 1986),
(4, 2, 'Endgame', 2009),
(5, 2, 'Peace Sells', 1986),
(6, 3, 'The Greater of 2 Evils', 2004),
(7, 4, 'Reptile', 2001),
(8, 4, 'Riding with the King', 2000),
(9, 5, 'Greatest Hits', 1992),
(10, 6, 'Greatest Hits', 2004),
(11, 7, 'All-Time Greatest Hits', 1975),
(12, 8, 'Greatest Hits', 2003),
(13, 9, 'Sgt. Pepper\'s Lonely Hearts Club Band', 1967);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artist`
--

CREATE TABLE `artist` (
  `id` int(10) UNSIGNED NOT NULL,
  `record_label_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `artist`
--

INSERT INTO `artist` (`id`, `record_label_id`, `name`) VALUES
(3, 1, 'Anthrax'),
(2, 1, 'Megadeth'),
(1, 1, 'Metallica'),
(4, 2, 'Eric Clapton'),
(6, 2, 'Van Halen'),
(5, 2, 'ZZ Top'),
(8, 3, 'AC/DC'),
(7, 3, 'Lynyrd Skynyrd'),
(9, 6, 'The Beatles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `record_label`
--

CREATE TABLE `record_label` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `record_label`
--

INSERT INTO `record_label` (`id`, `name`) VALUES
(1, 'Blackened'),
(6, 'Capitol'),
(5, 'Elektra'),
(4, 'MCA'),
(3, 'Universal'),
(2, 'Warner Bros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `song`
--

CREATE TABLE `song` (
  `id` int(10) UNSIGNED NOT NULL,
  `album_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `duration` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `song`
--

INSERT INTO `song` (`id`, `album_id`, `name`, `duration`) VALUES
(1, 1, 'One', 7.25),
(2, 1, 'Blackened', 6.42),
(3, 2, 'Enter Sandman', 5.3),
(4, 2, 'Sad But True', 5.29),
(5, 3, 'Master of Puppets', 8.35),
(6, 3, 'Battery', 5.13),
(7, 4, 'Dialectic Chaos', 2.26),
(8, 4, 'Endgame', 5.57),
(9, 5, 'Peace Sells', 4.09),
(10, 5, 'The Conjuring', 5.09),
(11, 6, 'Madhouse', 4.26),
(12, 6, 'I am the Law', 6.03),
(13, 7, 'Reptile', 3.36),
(14, 7, 'Modern Girl', 4.49),
(15, 8, 'Riding with the King', 4.23),
(16, 8, 'Key to the Highway', 3.39),
(17, 9, 'Sharp Dressed Man', 4.15),
(18, 9, 'Legs', 4.32),
(19, 10, 'Eruption', 1.43),
(20, 10, 'Hot For Teacher', 4.43),
(21, 11, 'Sweet Home Alabama', 4.45),
(22, 11, 'Free Bird', 14.23),
(23, 12, 'Thunderstruck', 4.52),
(24, 12, 'T.N.T', 3.35),
(25, 13, 'Sgt. Pepper\'s Lonely Hearts Club Band', 2.0333),
(26, 13, 'With a Little Help from My Friends', 2.7333),
(27, 13, 'Lucy in the Sky with Diamonds', 3.4666),
(28, 13, 'Getting Better', 2.8),
(29, 13, 'Fixing a Hole', 2.6),
(30, 13, 'She\'s Leaving Home', 3.5833),
(31, 13, 'Being for the Benefit of Mr. Kite!', 2.6166),
(32, 13, 'Within You Without You', 5.066),
(33, 13, 'When I\'m Sixty-Four', 2.6166),
(34, 13, 'Lovely Rita', 2.7),
(35, 13, 'Good Morning Good Morning', 2.6833),
(36, 13, 'Sgt. Pepper\'s Lonely Hearts Club Band (Reprise)', 1.3166),
(37, 13, 'A Day in the Life', 5.65);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_name_in_album` (`artist_id`,`name`),
  ADD KEY `fk_artist_in_album` (`artist_id`);

--
-- Indices de la tabla `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_name_in_artist` (`record_label_id`,`name`),
  ADD KEY `fk_record_label_in_artist` (`record_label_id`);

--
-- Indices de la tabla `record_label`
--
ALTER TABLE `record_label`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_name_in_record_label` (`name`);

--
-- Indices de la tabla `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_name_in_song` (`album_id`,`name`),
  ADD KEY `fk_album_in_song` (`album_id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `fk_artist_in_album` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`);

--
-- Filtros para la tabla `artist`
--
ALTER TABLE `artist`
  ADD CONSTRAINT `fk_record_label_in_artist` FOREIGN KEY (`record_label_id`) REFERENCES `record_label` (`id`);

--
-- Filtros para la tabla `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `fk_album_in_song` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

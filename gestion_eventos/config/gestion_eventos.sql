-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2024 a las 01:38:46
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_eventos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `evento_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` enum('Aun por iniciar','Activo','Finalizado') NOT NULL DEFAULT 'Aun por iniciar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`evento_id`, `nombre`, `fecha`, `ubicacion`, `descripcion`, `estado`) VALUES
(2, 'Futbol - Encuentro Infantil', '2024-09-19', 'San Pablo', 'Clasificaciones Infantiles', 'Activo'),
(3, 'Futbol', '2024-09-19', 'Otavalo', 'Sub Campeonato', 'Finalizado'),
(4, 'Futbol', '2024-09-19', 'Ibarra', 'Sub Campeonato', 'Aun por iniciar'),
(5, 'Clasificatorias', '2024-09-11', 'Quito', 'Clasificaciones Juvenil', 'Finalizado'),
(6, 'Juvenil', '2024-08-21', 'Ibarra', 'Campeonato', 'Finalizado'),
(7, 'Adultos Mayores', '2024-09-20', 'Otavalo', 'Campeonato solidario ', 'Aun por iniciar'),
(8, 'Encuentro', '2024-09-29', 'Cayambe', 'Sub infantil\r\n', 'Aun por iniciar'),
(10, 'Evento - Futbol Amigable', '2024-09-18', 'Ibarra', 'Juvenil -  Infantil', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes`
--

CREATE TABLE `participantes` (
  `participante_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `participantes`
--

INSERT INTO `participantes` (`participante_id`, `nombre`, `apellido`, `email`, `telefono`) VALUES
(1, 'Bryan Alejandro', 'Morán Chandi', 'bryan_zac22@hotmail.com', '0999738698'),
(2, 'Ana', 'Chandi', 'bryanmoranchandi@gmail.com', '0999854752');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`evento_id`);

--
-- Indices de la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`participante_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `evento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `participantes`
--
ALTER TABLE `participantes`
  MODIFY `participante_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

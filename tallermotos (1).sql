-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2023 a las 04:37:43
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tallermotos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `apellido` varchar(80) NOT NULL,
  `celular` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contraseña` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `nombre`, `apellido`, `celular`, `email`, `contraseña`) VALUES
(1, 'pepito', 'Reyes', 2310245, 'usuario1@gmail.com', '$2y$10$cBZowikZQCqFTTkayv0tWuhA.SNGHnipHLBjYLQd7zj3tohD3qOQa'),
(2, 'carlitos', 'chachan', 2147483647, 'chch@gmail', '$2y$10$KZ8mENf6vWylD/FgVR1eteyfZ6X8iimBe5QleLM5lXNM1eJGQoOKO'),
(3, 'dcdc', 'edwed', 0, 'edew', '$2y$10$QMXZl3DEOcLiZJ7INR.wvu0uVlkef2i3EUCis314vRxWwe1NOywEK'),
(4, 'SS', 'SS', 0, 'SS', '$2y$10$mhRmY60TmeAmxZ1AiwHfyOcJX0YGwe/cKvJNzgfnQI67eMQTkWObi'),
(5, 'SS', 'SS', 0, 'SS', '$2y$10$sMxw062apvs5WF6uL5I2t.pqSlCI9ymHxwads62bN0oj1tq5Lyls2'),
(6, 'COCO', 'COCO', 2563, 'SSS', '$2y$10$ujraE63Bn4gfU5IARYTA0ewTKklSTG2gUG3i7Gt5i8nfKEmju40y6'),
(7, 'carlitos', 'salazar', 123456, 'us@gmail.com', '$2y$10$I/Nm1qLXooAn0PbX/cM3uuWewG6jU/gMBUt3RclnwB2DcD.5aaVyi'),
(8, 'Alvaro', 'qqq', 32645, '1@gmail.com', '$2y$10$vNTSCc.QrBLMmgzL9G7FIeiErjKkLDc2JSuKWLwWRmvb9omMf2VtO'),
(9, 'pasta', 'arroz', 123456, 'PATASCONARROZ@GMAIL.COM', '$2y$10$B/oruZHAdJeshDkDHltVoOPbGUz23.ACIrXIXRgqjdZFAYzBsGNpS'),
(10, 'xasdc', 'dcdcs', 30422452, 'efeffr@gamil', '$2y$10$GJaBoc2QWTgcj0ZXXSEaU.n32lsHkbPswZR5C.NOrQu90369K8sQa'),
(11, 'Steven', 'Luar', 258963, 'luar@gmail.com', '$2y$10$QOmQ4hWakNZgj/HO840sKe.PG8acFwq2zJza/Tc59SMHMtIqe0K76'),
(12, 'Ale', 'Reyes', 2147483647, 'LuisaP@gmail.com', '$2y$10$zpnyfmqOnxo4jE2BhUrHd.mAFnjZKeQtHLKp6pwqWTdZPWteaWKwO'),
(13, 'jjjh', 'kjhh', 2147483647, 'LuisaP@gmail.com', '$2y$10$9HltymGZxyl5dLKbxPbN3ukQF.tnwNKelHCP3dK5epXadxhSNR6GW'),
(14, 'jjjh', 'Andres', 2147483647, 'chanclas@gmail.com', '$2y$10$uT9U7MBMRyoarmaw14U/uue40eIRKRSUQWJNfVgZkaN/FIqX1nL4i'),
(15, 'Ale', 'Reyes', 2147483647, 'LuisaP@gmail.com', '$2y$10$7agPiZi..dSKP/TNZ4PCnOb9Ket05dPdLdceg99tk1os./x9sc24.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int(11) NOT NULL,
  `hora` time NOT NULL,
  `fecha` date NOT NULL,
  `id_mecanico` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `moto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_cita`, `hora`, `fecha`, `id_mecanico`, `id_cliente`, `moto`) VALUES
(24, '12:38:00', '2023-12-08', 2, 89, 7),
(25, '14:58:00', '2023-12-12', 11, 95, 3),
(26, '09:35:00', '2023-12-15', 19, 98, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `celular` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasenia` varchar(100) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `celular`, `email`, `contrasenia`, `fecha_registro`) VALUES
(89, 'hh', 'dd', 0, 'dd', '$2y$10$unM7Bb1ZlOxvnEcyOnB/3u3PDR7TLot3yW63/rOj3vzVtA2cySLpW', '2023-12-13 21:49:03'),
(95, 'Ale', 'Reyes', 2147483647, 'media@gmail.com', '$2y$10$3sRvb9IzzCsXysenB1RqPel/eI0lwpPaBDCByJxvGCu38BAGMpVuW', '2023-12-13 21:49:03'),
(98, 'feid', 'ferxxo', 3102456, 'ferxxo100@gmail.com', '$2y$10$hJQV3dM25VBCIVKg2nC9..j7D.1dCWKAUdM0gpI5kI5x6Zky8xio6', '2023-11-20 21:49:03'),
(105, 'Ale', 'Rey', 2147483647, 'alijin@gmail.com', '', '2023-11-13 21:49:03'),
(106, 'Ale', 'Reyes', 2147483647, 'carlitosrossy@gmail.com', '', '2023-10-01 21:49:03'),
(107, 'Wale', 'Reyes', 2147483647, 'ali@gmail.com', '', '2023-10-10 21:49:03'),
(108, 'valdiri', 'valdiri', 546987, 'valdi233@gmail.com', '$2y$10$zghwddWUXnY7t6OtUzX0JOgcQKUkjcmJYZ..CGB1.GVp4qcQHNLHa', '2023-12-13 22:01:07'),
(109, 'pablo', 'pablo', 32102589, 'pa@gmai.com', 'carlos', '2023-09-20 22:05:08'),
(110, 'jaja', 'ablo', 8102589, 'paksks@gmai.com', 'cars', '2023-08-20 22:05:08'),
(111, 'jaja', 'ablo', 8102589, 'paksks@gmai.com', 'cars', '2023-07-20 22:05:08'),
(112, 'jaja', 'ablo', 8102589, 'paksks@gmai.com', 'cars', '2023-06-20 22:05:08'),
(113, 'tarro', 'Reyes', 2147483647, 'media@gmail.com', '', '2023-12-14 16:20:53'),
(114, 'Jaime', 'salas', 2147483647, 'salas@gmail.com', '$2y$10$nE0/DbLXEeWA.jCiXKZsZ.fN/W2ccnZnqR5FbuCNuznioAlslCX5q', '2023-12-15 01:09:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mecanico`
--

CREATE TABLE `mecanico` (
  `id_mecanico` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `celular` int(11) NOT NULL,
  `especializacion` varchar(50) NOT NULL,
  `fecha_contratacion` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mecanico`
--

INSERT INTO `mecanico` (`id_mecanico`, `nombre`, `apellido`, `celular`, `especializacion`, `fecha_contratacion`) VALUES
(1, 'Toño', 'cruz', 0, 'mecánico general', '2023-09-07'),
(2, 'andres', 'herrera', 0, 'mecánico general', '2023-09-07'),
(4, 'carlos', 'Reyes', 0, '30124598', '2023-09-21'),
(7, 'cristian', 'Salazar', 2147483647, 'Mecanico General', '2023-07-12'),
(10, 'Alvaro', 'kjhh', 2147483647, 'Mecanico General', '2023-05-10'),
(11, 'jjjh', 'dsccdc', 5145, 'Mecanico General', '2023-12-07'),
(14, 'Alvaro', 'Reyes', 2147483647, 'Mecanico General', '2023-11-09'),
(17, 'DVVF', 'FFVVF', 425665, 'DDFFVF', '2023-12-13'),
(18, 'PEPE', 'SIERR', 2147483647, 'MECANICO GENERAL', '2023-12-13'),
(19, 'ARLE', 'arel', 2147483647, 'MECANICO GENERAL', '2023-12-13'),
(21, 'pepiroooo', 'herrera', 0, 'mecánico general', '2023-12-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moto`
--

CREATE TABLE `moto` (
  `id_moto` int(11) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `año` int(5) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `moto`
--

INSERT INTO `moto` (`id_moto`, `placa`, `marca`, `año`, `id_cliente`) VALUES
(1, 'awa312', 'Ducati', 2019, 0),
(2, 'qwk23e', 'BMW', 2020, 0),
(3, 'awa312', 'Ducati', 2019, 3),
(4, '34435', 'ducati', 2018, 88),
(5, '123', 'ducati', 2024, 91),
(6, '123', 'ducati', 4554, 100),
(7, '123efr', 'ducati', 2024, 98),
(8, '123efr', 'bmw', 2025, 99),
(9, '123efr', 'ducati', 2026, 84),
(10, '777www', 'Ducati', 2030, 98),
(11, 'kql546', 'ducati', 2020, 101),
(12, '34435', 'Ducati', -13, 94),
(13, 'abd45f', 'BMW', 2022, 106),
(14, 'sdcdc54s', 'BMW', 2587, 107),
(15, 'sdcdc54s', 'BMW', 2587, 107),
(16, 'paca', 'DUCATI', 2015, 108);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moto_mecanico`
--

CREATE TABLE `moto_mecanico` (
  `id_moto_mecanico` int(11) NOT NULL,
  `id_mecanico` int(11) NOT NULL,
  `id_moto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `moto_mecanico`
--

INSERT INTO `moto_mecanico` (`id_moto_mecanico`, `id_mecanico`, `id_moto`) VALUES
(1, 1, 1),
(2, 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_mecanico` (`id_mecanico`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `moto` (`moto`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `mecanico`
--
ALTER TABLE `mecanico`
  ADD PRIMARY KEY (`id_mecanico`);

--
-- Indices de la tabla `moto`
--
ALTER TABLE `moto`
  ADD PRIMARY KEY (`id_moto`);

--
-- Indices de la tabla `moto_mecanico`
--
ALTER TABLE `moto_mecanico`
  ADD PRIMARY KEY (`id_moto_mecanico`),
  ADD KEY `id_mecanico` (`id_mecanico`),
  ADD KEY `id_moto` (`id_moto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de la tabla `mecanico`
--
ALTER TABLE `mecanico`
  MODIFY `id_mecanico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `moto`
--
ALTER TABLE `moto`
  MODIFY `id_moto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `moto_mecanico`
--
ALTER TABLE `moto_mecanico`
  MODIFY `id_moto_mecanico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`id_mecanico`) REFERENCES `mecanico` (`id_mecanico`),
  ADD CONSTRAINT `cita_ibfk_3` FOREIGN KEY (`moto`) REFERENCES `moto` (`id_moto`);

--
-- Filtros para la tabla `moto_mecanico`
--
ALTER TABLE `moto_mecanico`
  ADD CONSTRAINT `moto_mecanico_ibfk_1` FOREIGN KEY (`id_mecanico`) REFERENCES `mecanico` (`id_mecanico`),
  ADD CONSTRAINT `moto_mecanico_ibfk_2` FOREIGN KEY (`id_moto`) REFERENCES `moto` (`id_moto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

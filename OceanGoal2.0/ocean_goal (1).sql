-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2025 a las 21:46:15
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
-- Base de datos: `ocean_goal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL,
  `descripcion` text NOT NULL,
  `imagen_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`id`, `usuario`, `tipo`, `fecha`, `descripcion`, `imagen_url`) VALUES
(4, 'Marcos', 'Contaminacion ', '2025-05-08 14:37:00', 'Señor boto por fura la basuera', 'uploads/reporte_6834c2de33a1e3.20587659.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`, `created_at`, `descripcion`) VALUES
(1, 'andres', '$2y$10$Tx.YkOhkXRkxIxx2C0PG1Oi4BSUt6w2kyu4YzGP6f8xGRxD64CVsi', '2025-05-12 15:09:34', NULL),
(2, 'Carlos', '$2y$10$e2j1/85eLiV/z8gO9qIpRe/AoMwq2oyG3ZuOBnpxkmntYUG45uD8K', '2025-05-12 15:14:57', NULL),
(4, 'Carlos12', '$2y$10$kfDopeNAXd7PZEFKMeHjuutF/cLXxGSpqvp7.dYQBcTyrKz2UaWzu', '2025-05-12 15:15:56', NULL),
(5, 'Pablo', '$2y$10$3IrvX0AvyX7sQvF/GGunbe7DWo3OqAjh4J2vmh5Ze0M80xp424p6O', '2025-05-12 15:33:15', NULL),
(6, 'santiago', '$2y$10$AkJo7kzihBV6AyHMXUrMJuOmEQW4TaTyWriJPratoj8Z8avd/id8O', '2025-05-12 15:35:08', NULL),
(7, 'Salome', '$2y$10$udBSdeO18jJjnBKFFuyoZu8RSc9MDr2LwcnllfpgQfstRIH9GUYLi', '2025-05-12 15:38:05', NULL),
(8, 'aaaa', '$2y$10$jssHEwK6/vA/JJ83nCV2wOQJnMbjEpY7xtT4.kbLV3PGq0fImW2l2', '2025-05-12 15:45:34', NULL),
(9, 'hola', '$2y$10$H.F7hGKMBnprlj6ztQyvB.XVBfZ/lxpN/nMbOr86xVhNdrUTXxGp6', '2025-05-12 18:21:35', NULL),
(10, 'jose ', '$2y$10$x2fhHUrFOyrU2M1Bpc64vu.R69vBvHKSRhLJEGN8Fgle1TYLGZeNu', '2025-05-12 20:07:21', NULL),
(12, 'jose21', '$2y$10$4FKvkQHGO9ilx2MK3q4oiuIgKXPPgvlatOH10PI/oy/KY50Lrz37a', '2025-05-12 20:10:09', NULL),
(13, 'Nuevo', '$2y$10$TyfunOKhrojvCpnDzpUz/O//syEOGbrirqLJjp.vszK9v/iaQA/8K', '2025-05-12 20:40:01', 'Hola me gusta el mar mar mar'),
(14, 'Javier', '$2y$10$uMhR4GHhz6zaOGXZM965XevvE3YF9qm.nFL/BE9OOiusCGp94Zy3q', '2025-05-12 21:30:34', 'Me encanta las playa de pr'),
(15, 'Marcos ', '$2y$10$i5gW2N8zi2kS0KtQK.joVOGwbhCMq2bs9TpFpI1BRoQLZcli.gHNe', '2025-05-26 19:11:29', 'Me gusta el pan');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`,`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

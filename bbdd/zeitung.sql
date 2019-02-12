-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2019 a las 16:04:27
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zeitung`
--
CREATE DATABASE IF NOT EXISTS `zeitung` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `zeitung`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(2, 'Política'),
(1, 'Tecnología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `noticia` int(11) NOT NULL,
  `comentario` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editores`
--

DROP TABLE IF EXISTS `editores`;
CREATE TABLE `editores` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `administrador` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `editores`
--

INSERT INTO `editores` (`id`, `username`, `password`, `email`, `nombre`, `apellidos`, `administrador`) VALUES
(1, 'test', '$argon2i$v=19$m=1024,t=2,p=2$TFlZbnMzc2VyUnVVcDFvVQ$F/XUnvveNILmr3Vo55syuNhpu0lc2jfPXD7YbGhrd3U', 'test@12345', 'Tessst', 'Test Teeeeest', 1),
(2, 'dani', '$argon2i$v=19$m=1024,t=2,p=2$S0ZTWC5WeUxPUDdwS0VvOA$t+LAyQYs1HLSpGWo7DjPYmhbhI++9BAw8ak3PNh1rgc', '123213@dsad', 'Dani', 'Barriguita', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cabecera` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cuerpo` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags_noticias`
--

DROP TABLE IF EXISTS `tags_noticias`;
CREATE TABLE `tags_noticias` (
  `noticia` int(11) NOT NULL,
  `tag` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `descripcion` (`nombre`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `noticia` (`noticia`);

--
-- Indices de la tabla `editores`
--
ALTER TABLE `editores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`),
  ADD KEY `autor` (`autor`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `tags_noticias`
--
ALTER TABLE `tags_noticias`
  ADD PRIMARY KEY (`noticia`,`tag`),
  ADD KEY `tags_noticias_ibfk_2` (`tag`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `editores`
--
ALTER TABLE `editores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`noticia`) REFERENCES `noticias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `noticias_ibfk_2` FOREIGN KEY (`autor`) REFERENCES `editores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tags_noticias`
--
ALTER TABLE `tags_noticias`
  ADD CONSTRAINT `tags_noticias_ibfk_1` FOREIGN KEY (`noticia`) REFERENCES `noticias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tags_noticias_ibfk_2` FOREIGN KEY (`tag`) REFERENCES `tags` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

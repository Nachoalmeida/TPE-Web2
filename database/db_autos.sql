-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2020 a las 19:12:21
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_autos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos`
--

CREATE TABLE `autos` (
  `id_auto` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `anio` int(11) NOT NULL,
  `kilometros` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `foto` varchar(200) NOT NULL,
  `id_marca_fk` int(11) NOT NULL,
  `id_usuario_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autos`
--

INSERT INTO `autos` (`id_auto`, `titulo`, `modelo`, `anio`, `kilometros`, `precio`, `descripcion`, `foto`, `id_marca_fk`, `id_usuario_fk`) VALUES
(6, 'etgryhrherh', 'ghdfhdhdhdh', 2017, 3254235, 3425345, 'rghdhjdfhdfh', '534252345346', 4, 1),
(7, 'etgryhrherh', 'ghdfhdhdhdh', 2017, 3254235, 3425345, 'rghdhjdfhdfh', '534252345346', 4, 1),
(8, 'ytrujrturtu', 'rturturt', 2017, 23423423, 4234234, '423eryhdfhaesr', '6yryeryf', 27, 6),
(9, 'ytrujrturtu', 'rturturt', 2017, 23423423, 4234234, '423eryhdfhaesr', '6yryeryf', 27, 6),
(10, 'ytrujrturtu', 'rturturt', 2017, 23423423, 4234234, '423eryhdfhaesr', '6yryeryf', 27, 6),
(11, '5euy5urt', 'turturturt', 56756, 67567, 67567, 'tuyhtrujsrtu', 'hdhdrh', 4, 17),
(12, '5euy5urt', 'turturturt', 56756, 67567, 67567, 'tuyhtrujsrtu', 'hdhdrh', 4, 17),
(13, 'eryeryh', 'r4terw', 2017, 3254235, 34234, 'rteghfhdfhdfhdfhrr0oihji0oghj90rhgj9ghsdoifg4e89her9uioghroigjer0g9\'hjerjoi\'hg809sgiodhg80934hg809rhgkosdgh0984gy098erhg0943ghhh', 'gfhfghgfh', 6, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `id_usuario_fk` int(11) NOT NULL,
  `id_auto_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id_foto` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `id_auto_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre_marca`) VALUES
(4, 'BMW'),
(5, 'Mercedes Benz'),
(6, 'Volkswagen'),
(26, 'Ford'),
(27, 'Chevrolet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `administrador` tinyint(1) NOT NULL,
  `foto_perfil` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `mail`, `password`, `user_name`, `administrador`, `foto_perfil`) VALUES
(1, 'admin@gmail.com', '$2y$12$S0H.0ABwNEPKUeuY5k7ouukdzwQlAXvjiRMHiXZ9pLLGuONvMK.nC', 'carsadmin', 1, 'images/user_foto/user.png'),
(6, 'alexisleogalvan12@gmail.com', '$2y$10$1SPR/5O/fwXjkb5sXVd/C.g.5x6Dn8G6oAx2veeO2Qti8n7DgexGK', 'alexis', 0, 'images/user_foto/5ef4ef261c9c34.65123309.jpg'),
(11, 'admin@gmail.co', '$2y$10$PbgqWSILnmDa6dM0fn2LiO03rmBxVY1NPf7.jKXyinQkSrs7XMb7K', 'dgsdg', 0, 'images/user_foto/user'),
(12, 'admin@gma', '$2y$10$Cks/WVZdCQvzESKy./DHmO4ebeElyEynluZ4qaYvgc/izjhKzxUpS', 'gweg', 0, 'images/user_foto/user'),
(13, 'elpa@gggg', '$2y$10$sygsLKBPx4rPgMYpztFgVuMhp1GBuq94WSrIwJzHmF/Z4Em4qkK4K', 'pablito', 0, 'images/user_foto/user'),
(14, 'sdgds@fgghrgh', '$2y$10$Gp2k/ldSeyifWDbPnfUJRe9yOFX2xL.NNzzbz3yYvNDsm9uulFMr2', 'fgedgweg', 0, 'images/user_foto/user.png'),
(15, 'qewqer@1111', '$2y$10$HFOsegrLsJZS63dBV.QmwOfgpEmZk6CnjH6eU25YNQYT6cJTUsKPq', 'esteva', 0, 'images/user_foto/user.png'),
(16, 'fe@fhgrf', '$2y$10$NjlbVt309Ywf5CYlq1sFgu/8PFQtMRrjitV3Q.6MWIS0sUI.IEX0K', 'fgsdgsdg', 0, 'images/user_foto/user.png'),
(17, 'pepo@gmail.com', '$2y$10$Tp1fTJ6C.Bzw02KWD3YQMeUCF7p5K6z3zIpptPzGmFoHHJJBCBUoW', 'pepito', 0, 'images/user_foto/user.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id_auto`),
  ADD KEY `id_marca_fk` (`id_marca_fk`),
  ADD KEY `id_usuario-fk` (`id_usuario_fk`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_usuario_fk` (`id_usuario_fk`),
  ADD KEY `id_auto_fk` (`id_auto_fk`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_auto_fk` (`id_auto_fk`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autos`
--
ALTER TABLE `autos`
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autos`
--
ALTER TABLE `autos`
  ADD CONSTRAINT `autos_ibfk_2` FOREIGN KEY (`id_marca_fk`) REFERENCES `marcas` (`id_marca`),
  ADD CONSTRAINT `autos_ibfk_3` FOREIGN KEY (`id_usuario_fk`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_usuario_fk`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_auto_fk`) REFERENCES `autos` (`id_auto`);

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`id_auto_fk`) REFERENCES `autos` (`id_auto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

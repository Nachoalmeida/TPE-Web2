-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2020 a las 23:44:26
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
  `id_marca_fk` int(11) NOT NULL,
  `id_usuario_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autos`
--

INSERT INTO `autos` (`id_auto`, `titulo`, `modelo`, `anio`, `kilometros`, `precio`, `descripcion`, `id_marca_fk`, `id_usuario_fk`) VALUES
(68, 'Ford Ranger Raptor 2.0 Biturbo 2020', 'Raptor', 2009, 0, 5599000, 'FORD ROBAYNA MARTINEZ - CONCESIONARIO OFICIAL FORD\r\n\r\nUNIDADES FISICAS EN STOCK- CON ENTREGA INMEDIATA\r\n\r\nCONSULTA AL CONSECIONARIO PREMIUM DE ZONA NORTE\r\n\r\nCARACTERÍSTICAS DEL VEHICULO LINEA NUEVA 2020', 26, 1),
(69, 'BMW Serie 1 2.0 120i Active 156cv', 'Active 156cv', 2011, 54300, 1250000, 'VERDADERAMENTE IMPECABLE\r\nSOLO 54.300 KMS - AÑO 2010, NO 2011\r\nSEGUNDO DUEÑO\r\nRECIENTEMENTE HECHO TRATAMIENTO ACRÍLICO COMPLETO Y PINTADO DE PARRILLA Y LLANTAS TODO EN NEGRO. NO ES PLASTIDIP.\r\nRECIÉN HECHO SERVICE (MENOS DE 500 KMS).\r\nNADA QUE HACERLE.', 4, 6),
(70, 'Chevrolet Cruze 1.8 Ltz Mt 141cv', 'Cruze ', 2020, 0, 1040000, 'Descripción de la publicación\r\n', 27, 6),
(71, 'Fiat 600', '600', 1971, 100000, 50400, 'Datos específicos por privado, excelente sin rodar', 30, 18),
(72, 'Nissan Skyline Gt-r', 'Skyline Gt-r', 1999, 107000, 10000000, '1999 Nissan Skyline R33 GTR Vspec\r\nVIN: BCNR33001487\r\n\r\n-Midnight Purple (LP2)\r\n-RB26DETT\r\n-157,xxx KM on original cluster\r\n-Functional AC/Heat\r\n-N1 Front Bumper\r\n-S2 Front Lip Spoiler\r\n-HID Headlights\r\n-TE37 Wheels With New Tires\r\n-Tein Coilovers\r\n-Fujitsubo Exhaust\r\n\r\nMaintenance:\r\n-Fresh Oil Change Synthetic 5w30\r\n-NGK Spark Plugs\r\n-Top Engine Cleaner\r\n-Injector Cleaning Service\r\n-Coolant Flush\r\n-DOT 4 Brake Fluid\r\n-Alignment', 40, 1),
(73, 'Bugatti SC 45 Atlantic Aéro, como nuevo sin uso casi!! oferton!', 'SC 45 Atlantic Aéro', 2019, 20000, 1200000000, 'Este único ejemplar, que tiene 1.500 caballos de fuerza y alcanza los 420 kilómetros por hora, conmemora su 110° aniversario y está inspirado en su icónico SC 45 Atlantic Aéro Coupé, que había sido diseñado por Jean Bugatti, el hijo del fundador de la marca, Ettore Bugatti. De ese modelo se construyeron cuatro unidades entre 1936 y 1938, cada una personalizada por su dueño.', 43, 19),
(89, 'Corsa 1.6 4 Pts Super', 'Corsa', 2007, 40000, 8600000, 'reyreyh', 4, 1),
(90, 'Corsa 1.6 4 Pts Super', 'Corsa', 2007, 107000, 8600000, 'rhrhrwhw', 4, 1),
(91, 'Corsa 1.6 4 Pts Super', 'Corsa', 2007, 107000, 8600000, 'rhrhrwhw', 4, 1),
(92, 'Corsa 1.6 4 Pts Super', 'Corsa', 2007, 107000, 8600000, 'cqrwegwegwe', 4, 1),
(93, 'Corsa 1.6 4 Pts Super', 'Corsa', 2008, 107000, 8600000, 'sdfafasf', 4, 1),
(94, 'Corsa 1.6 4 Pts Super', 'Corsa', 2014, 0, 8600000, 'afaff', 26, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `puntaje` int(11) NOT NULL,
  `id_usuario_fk` int(11) NOT NULL,
  `id_auto_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `mensaje`, `puntaje`, `id_usuario_fk`, `id_auto_fk`) VALUES
(1, 'Genial!', 1, 19, 71);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id_foto` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `id_auto_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id_foto`, `nombre`, `id_auto_fk`) VALUES
(56, 'images/cars/5efcea05007a15efcea0500b711.71503861.jpg', 68),
(57, 'images/cars/5efcea05166945efcea0516a651.49758269.jpg', 68),
(65, 'images/cars/5efcf0943f2e55efcf0943f6b57.63866137.jpg', 69),
(66, 'images/cars/5efcf09449e8e5efcf0944a25e4.60220804.jpg', 69),
(67, 'images/cars/5efcf094542965efcf094546679.21647903.jpg', 69),
(68, 'images/cars/5efcf1c4913265efcf1c4916f70.45181149.jpg', 70),
(70, 'images/cars/5efcf1c50a7d85efcf1c50aba93.64670596.jpg', 70),
(71, 'images/cars/5efcf1c510ed75efcf1c5112a87.21165911.jpg', 70),
(73, 'images/cars/5efcfcc1ee6b25efcfcc1eea836.78075531.jpg', 71),
(74, 'images/cars/5efe068f82e445efe068f832158.95078353.jpg', 72),
(77, 'images/cars/5efe068fcd0a35efe068fcd4746.41599811.jpg', 72),
(78, 'images/cars/5efe068fe68cf5efe068fe6ca08.36285899.jpg', 72),
(79, 'images/cars/5efe068ff2f2d5efe068ff32fd5.81295813.jpg', 72),
(80, 'images/cars/5efe08b230a325efe08b230e037.90587971.jpg', 73),
(81, 'images/cars/5efe08b2713fb5efe08b2717cb6.99922782.jpg', 73),
(82, 'images/cars/5efe2d6420a9d5efe2d6420e6d6.50114892.jpg', 72),
(83, 'images/cars/5efe2d642e40d5efe2d642e7dd2.04732827.jpg', 72),
(93, 'images/cars/5efe5695c56915efe5695c5a621.29325145.jpg', 68),
(95, 'images/cars/5efe56f8da6435efe56f8daa136.26984238.jpg', 89),
(96, 'images/cars/5efe5f9dd5dc85efe5f9dd61993.74172455.jpg', 92),
(97, 'images/cars/5efe648a0e1115efe648a0e4e11.53340046.jpg', 93),
(98, 'images/cars/5efe7cb71fb5a5efe7cb71ff2b2.85791294.jpg', 94);

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
(26, 'Ford'),
(27, 'Chevrolet'),
(30, 'Fiat'),
(31, 'Volkswagen'),
(33, 'Mercedes Benz'),
(34, 'Audi'),
(35, 'Bugatti'),
(36, 'Alfa Romeo'),
(37, 'Aston Martin'),
(40, 'Nissan'),
(41, 'Toyota'),
(42, 'Honda'),
(43, 'Bugatti ');

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
(17, 'pepo@gmail.com', '$2y$10$Tp1fTJ6C.Bzw02KWD3YQMeUCF7p5K6z3zIpptPzGmFoHHJJBCBUoW', 'pepito', 0, 'images/user_foto/user.png'),
(18, 'harold@gmail.com', '$2y$10$.DrWsqQBaMRmDuWMFG8gLeEoaf.3tEwNeomVQXKHADJ1w5u4kA5xS', 'Harold', 0, 'images/user_foto/5efcfc1a773593.65574674.jpg'),
(19, 'cr7@gmail.com', '$2y$10$cvib0DmiKHYczylN1VKUtupk0BaAGVvXFvA6jufURhfJS0lSYzx.a', 'CR7', 0, 'images/user_foto/5efe073225e894.96444818.jpg');

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
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`id_auto_fk`) REFERENCES `autos` (`id_auto`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

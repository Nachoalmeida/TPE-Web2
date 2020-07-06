-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2020 a las 01:18:02
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
(71, 'Fiat 600', '600', 1971, 100000, 50400, 'Datos específicos por privado, excelente sin rodar', 30, 18),
(72, 'Nissan Skyline Gt-r', 'Skyline Gt-r', 1999, 107000, 10000000, '1999 Nissan Skyline R33 GTR Vspec\r\nVIN: BCNR33001487\r\n\r\n-Midnight Purple (LP2)\r\n-RB26DETT\r\n-157,xxx KM on original cluster\r\n-Functional AC/Heat\r\n-N1 Front Bumper\r\n-S2 Front Lip Spoiler\r\n-HID Headlights\r\n-TE37 Wheels With New Tires\r\n-Tein Coilovers\r\n-Fujitsubo Exhaust\r\n\r\nMaintenance:\r\n-Fresh Oil Change Synthetic 5w30\r\n-NGK Spark Plugs\r\n-Top Engine Cleaner\r\n-Injector Cleaning Service\r\n-Coolant Flush\r\n-DOT 4 Brake Fluid\r\n-Alignment', 40, 22),
(95, 'Ford Falcon Futura 1966', 'Falcon ', 1966, 163000, 759900, 'Ford Falcón Futura 1966 Original por donde lo mires.\r\nEl auto originalmente se patentó 1966 en la localidad de la Matanza. Su segundo dueño lo llevó Lanús y lo regrese al Oeste después de 44 años.\r\nEl auto se repinto en 1999 respetando el color original. (El número del color figura en la Chapa de la puerta).\r\nPosee todos los detalles originales. El interior se encuentra en excelente estado y funcionan absolutamente todos los accesorios. Observar el vídeo con el interior y el auto funcionando sobre la autopista. https://youtu.be/d6WMENvIBcE', 26, 20),
(96, 'Bugatti La Voiture Noire', 'Voiture Noire', 2020, 20000, 2000000000, 'El Centodieci es capaz de alcanzar una velocidad máxima de 380 km/h (autolimitada) y de acelerar de 0 a 100 en 2,4 segundos.', 43, 19),
(97, 'Honda Accord 2007', 'Accord ', 2007, 90000, 700000, 'Titular, todo al día ,se va transferido', 42, 21),
(101, 'Corsa 1.6 4 Pts Super', '2021', 2007, 107000, 8600000, 'sdgsdgsdgsdgsdgsdgholaaa', 31, 1),
(102, 'Nissan Murano 3.5 Exclusive', 'Murano ', 2017, 75000, 4400000, 'Tiendacars te acerca esta excelente unidad.\r\n\r\nNo dudes en consultar por este y otros modelos a través de nuestra página web, WhatsApp y Redes Sociales.\r\n\r\nTodas nuestras unidades cuentan con una exhaustiva revisión mecánica y de documentación para brindarle un servicio de calidad.\r\n\r\nTodas cuentan con garantía escrita de 3 (tres) meses.\r\n\r\n:::::::::::::::::::::::::::::::::::::::::::::::::::::::::\r\nRespuestas a preguntas frecuentes\r\n:::::::::::::::::::::::::::::::::::::::::::::::::::::::::\r\n\r\n¿Qué es Tienda Cars?\r\n• Somos una plataforma física y digital, fruto de un grupo de concesionarios oficiales de la ciudad de Mar del Plata dedicados a comercializar unidades usadas y 0km, brindando nuestros más de 12 años de experiencia en el mercado a tu disposición para garantizar operaciones 100% seguras y transparentes.', 40, 22),
(103, 'Nissan Frontier frontier S', 'frontier S', 2020, 0, 1839000, 'AUTOGEN S.A.\r\nConcesionario Oficial Nissan\r\n\r\n!!!!Consulte Financiaciones ¡¡¡\r\n\r\nNunca en el barro!', 40, 22),
(104, 'Nissan March ACTIVE', 'ACTIVE', 2020, 0, 860000, '$830.000 + PRECIO CONTADO 100% EN EFECTIVO + PUEDE FINANCIAR HASTA 100.000 CON TASA 0% EN 12 MESES', 40, 22),
(105, 'Nissan Frontier LE', 'Frontier LE', 2020, 0, 3200000, 'ULTIMA UNIDAD PARA ENTREGA INMEDIATA + CONSULTE CREDITO TASA 0% FIJA Y EN PESOS + CONCESIONARIO OFICIAL AUTOGEN S.A.', 40, 22),
(106, 'Corsa 1.6 4 Pts Super', 'Corsa', 2007, 222333, 8600000, 'tjtjtr', 27, 1);

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
(4, 'sii', 3, 18, 71),
(15, 'holaaa', 2, 18, 95),
(18, 'diii', 1, 19, 95),
(84, 'Hola, te interesaría permutar por un Fiat 600?? Impecable tengo todos loa papeles al día.. te dejo el link por si lo qres ver y te interesa.. http://localhost/Proyectos/TPE-Web2/ver_mas/71', 5, 18, 96),
(93, 'ryhrehreh', 3, 6, 71),
(103, 'fgdfhfdhfd', 2, 1, 68),
(106, 'truftut', 3, 1, 68),
(107, 'dtgdtyds', 5, 1, 71),
(108, 'rytryurd', 4, 1, 71),
(110, 'fujftguitg', 5, 1, 71),
(111, 'gfuftgigf', 5, 1, 71),
(112, 'etgyhewry', 5, 1, 101),
(113, 'rtujrturt', 5, 1, 101),
(114, '46yrey', 3, 1, 101),
(115, 'erheryh', 5, 1, 69),
(116, 'ewgwtg', 5, 1, 69),
(117, '67o67o67', 4, 19, 68),
(118, '46yeryery', 5, 1, 68),
(119, 'holaaa', 5, 1, 68),
(120, 'seeee', 5, 1, 68),
(121, 'seee d1', 5, 19, 96),
(122, 'que hy', 5, 1, 68),
(123, 'esaaa', 5, 1, 68),
(124, 'holaaa', 5, 19, 68),
(125, 'erherujh', 5, 6, 68),
(126, 'tujeuje', 2, 6, 68),
(127, 'jrtjrtj', 4, 6, 68),
(128, 'holaaa', 5, 6, 68),
(129, 'holaaa', 5, 19, 68),
(130, 'fasfsaf', 5, 6, 68),
(131, 'afsaf', 5, 6, 68);

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
(65, 'images/cars/5efcf0943f2e55efcf0943f6b57.63866137.jpg', 69),
(66, 'images/cars/5efcf09449e8e5efcf0944a25e4.60220804.jpg', 69),
(67, 'images/cars/5efcf094542965efcf094546679.21647903.jpg', 69),
(73, 'images/cars/5efcfcc1ee6b25efcfcc1eea836.78075531.jpg', 71),
(74, 'images/cars/5efe068f82e445efe068f832158.95078353.jpg', 72),
(77, 'images/cars/5efe068fcd0a35efe068fcd4746.41599811.jpg', 72),
(78, 'images/cars/5efe068fe68cf5efe068fe6ca08.36285899.jpg', 72),
(79, 'images/cars/5efe068ff2f2d5efe068ff32fd5.81295813.jpg', 72),
(82, 'images/cars/5efe2d6420a9d5efe2d6420e6d6.50114892.jpg', 72),
(83, 'images/cars/5efe2d642e40d5efe2d642e7dd2.04732827.jpg', 72),
(99, 'images/cars/5effafb064d9d5effafb06516e3.74852619.jpg', 95),
(100, 'images/cars/5effafb0889d25effafb088da26.65899293.jpg', 95),
(101, 'images/cars/5effafb0bb65a5effafb0bba2a8.49986561.jpg', 95),
(102, 'images/cars/5effb1ba85fdc5effb1ba863ac1.88417114.jpg', 96),
(103, 'images/cars/5effb1bad787c5effb1bad7c4d8.91588858.jpg', 96),
(104, 'images/cars/5effb316ef2245effb316ef5f41.47993252.jpg', 97),
(105, 'images/cars/5effb3170d9705effb3170dd403.03953909.jpg', 97),
(106, 'images/cars/5effb31748f4c5effb3174931c0.37359147.jpg', 97),
(116, 'images/cars/5f02228e313cf5f02228e317a00.16497299.jpg', 68),
(117, 'images/cars/5f02228e3a4c55f02228e3a8954.34160446.jpg', 68),
(128, 'images/cars/5f028e88107365f028e8810b079.72497828.jpg', 68),
(129, 'images/cars/5f033ac32662a5f033ac3269fb6.91215616.jpg', 101),
(134, 'images/cars/5f034ad46a55a5f034ad46a92b9.39548184.jpg', 102),
(135, 'images/cars/5f034ad4863ac5f034ad48677d5.74442380.jpg', 102),
(136, 'images/cars/5f034ad48f0d15f034ad48f4a28.81955548.jpg', 102),
(137, 'images/cars/5f034ad49ffa95f034ad4a037a8.65409711.jpg', 102),
(138, 'images/cars/5f034b964b1a15f034b964b5710.96594838.jpg', 103),
(139, 'images/cars/5f034b96636ba5f034b9663a8b5.97035080.jpg', 103),
(140, 'images/cars/5f034b966b49d5f034b966b86d6.49176477.jpg', 103),
(141, 'images/cars/5f034c54cccd35f034c54cd0a32.56778125.jpg', 104),
(142, 'images/cars/5f034c54e70715f034c54e74417.18008404.jpg', 104),
(143, 'images/cars/5f034c55031975f034c55035673.40095009.jpg', 104),
(144, 'images/cars/5f034c551d9055f034c551dcd64.01477186.jpg', 104),
(145, 'images/cars/5f034d060f4245f034d060f7f41.79661917.jpg', 105),
(146, 'images/cars/5f034d0637ca35f034d06380743.39405999.jpg', 105),
(157, 'images/cars/5f03873f683055f03873f686d62.74278755.jpg', 106),
(158, 'images/cars/5f03873f82a745f03873f82e440.75851919.jpg', 106);

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
(36, 'Alfa Romeo'),
(37, 'Aston Martin'),
(40, 'Nissan'),
(41, 'Toyota'),
(42, 'Honda'),
(43, 'Bugatti'),
(44, 'Tesla'),
(45, 'Renault'),
(46, 'Dodge'),
(48, 'Citroen'),
(49, 'Ferrari'),
(50, 'Jeep'),
(51, 'Lamborghini'),
(52, 'Paganni'),
(53, 'Volvo'),
(54, 'Chrysler'),
(55, 'Rolls Royce'),
(56, 'Peugeot'),
(57, 'Subaru'),
(58, 'Maserati'),
(59, 'GMC');

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
(6, 'alexisleogalvan12@gmail.com', '$2y$10$1SPR/5O/fwXjkb5sXVd/C.g.5x6Dn8G6oAx2veeO2Qti8n7DgexGK', 'alexis', 1, 'images/user_foto/5ef4ef261c9c34.65123309.jpg'),
(13, 'elpa@gggg', '$2y$10$sygsLKBPx4rPgMYpztFgVuMhp1GBuq94WSrIwJzHmF/Z4Em4qkK4K', 'pablito', 0, 'images/user_foto/user'),
(18, 'harold@gmail.com', '$2y$10$.DrWsqQBaMRmDuWMFG8gLeEoaf.3tEwNeomVQXKHADJ1w5u4kA5xS', 'Harold', 0, 'images/user_foto/5efcfc1a773593.65574674.jpg'),
(19, 'cr7@gmail.com', '$2y$10$cvib0DmiKHYczylN1VKUtupk0BaAGVvXFvA6jufURhfJS0lSYzx.a', 'CR7', 0, 'images/user_foto/5efe073225e894.96444818.jpg'),
(20, 'ani@gmail.com', '$2y$10$XrM3J4Udh3EqGzg2GndqwOnq2rNl1UGaGeSreZfstQOMZeBJoBAkq', 'Anonimo', 0, 'images/user_foto/5effae1d91e988.00207544.jpg'),
(21, 'jeff@gmail.com', '$2y$10$u21jqMctwv1g1W09XAFh4uWt9XbH2hJ0JmqVbCBowqOMuKEK5axeK', 'Jeff Bezos', 0, 'images/user_foto/5effb2045ee3f4.76126718.jpg'),
(22, 'nissan@gmail.com', '$2y$10$E8CxRyAu9.u/K3E9wSYowur8ZgwMxpMgQJUX93n5QZQ3zpuXKaR1.', 'Patrocinador de Nissan', 1, 'images/user_foto/5effb553324e60.17548951.jpg'),
(23, 'nuevo@gmail.com', '$2y$10$VaxHG62RAor93QjtAjLNrOADZVNNcZp2irg16.AtyiTSQ7lqkvaLC', 'nuevos user', 0, 'images/user_foto/5f0217b64ca806.74073159.jpg'),
(27, 'ddsg@dfhfdh', '$2y$10$UePaC/F2iwO.5cG/NqsPGOXu7n2JKnnVBfhH.CHimfBt7oZhBNhZi', 'dggfg', 0, 'images/user_foto/5f02900a895441.63888579.jpg');

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
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autos`
--
ALTER TABLE `autos`
  ADD CONSTRAINT `autos_ibfk_2` FOREIGN KEY (`id_marca_fk`) REFERENCES `marcas` (`id_marca`),
  ADD CONSTRAINT `autos_ibfk_3` FOREIGN KEY (`id_usuario_fk`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_3` FOREIGN KEY (`id_usuario_fk`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_4` FOREIGN KEY (`id_auto_fk`) REFERENCES `autos` (`id_auto`) ON DELETE CASCADE;

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`id_auto_fk`) REFERENCES `autos` (`id_auto`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

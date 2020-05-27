-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2020 a las 20:05:46
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
  `id_marca_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autos`
--

INSERT INTO `autos` (`id_auto`, `titulo`, `modelo`, `anio`, `kilometros`, `precio`, `descripcion`, `foto`, `id_marca_fk`) VALUES
(2, 'Vendo BMW, ni idea el modelo', 'nose', 2016, 40000, 12241234, 'no es el modelo que ami me gusta recién después de 3 años me doy cuenta... esta impecable!! \r\nni idea de las especificaciones por que nose el modelo!!\r\nuna sola vez me dejo a pata!', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRQWmrenm3I2nDEkFhcDRtcwAdjrVIr9H1db2OTeMPvFFUOtypY&usqp=CAU', 4),
(3, 'Ford Fiesta Kinetic Design 1.6 Se Powershift 120cv', 'fiesta', 2007, 100000, 300000, 'Vendo fiestita impecable! \r\nno es el Kinetic pero ya fue', 'https://imganuncios.mitula.net/ford_fiesta_for_fiesta_2003_con_gnc_full_1era_mano_11000km_en_cordoba_7610135556641595682.jpg', 1),
(7, 'Volkswagen Gol Aire Direccion Gnc', 'Gol', 2011, 105000, 289990, 'VALOR FINAL TRANSFERENCIA A CARGO DEL COMPRADOR\r\nLEER AVISO!!! AVISAR 1HS ANTES DE ACERCARSE\r\nLEER TODO EL AVISO!!!!!!\r\nLos valores son de contado. Financiado/Permuta son $10.000 mas\r\n', 'https://www.rionegro.com.ar/wp-content/uploads/2020/01/vw-gol-power-2007.jpg?w=920&h=517&resize=920,517', 6),
(8, 'Mercedes-Benz Clase C 2.1 C220 Cdi Avantgarde At', 'C 2.1 C220 Cdi Avantgarde', 2009, 315900, 850000, 'El vendedor no incluyó una descripción del producto', 'https://http2.mlstatic.com/mercedes-benz-clase-c-21-c220-cdi-avantgarde-at-2009-D_NQ_NP_928037-MLA40301599918_012020-F.webp', 5),
(9, 'Mercedes-Benz Clase A 1.6 A 200 Style B.efficiency 156cv', 'A 1.6 A 200 Style', 2013, 107000, 1400000, 'El vendedor no incluyó una descripción del producto', 'https://http2.mlstatic.com/mercedes-benz-clase-a-16-a-200-style-befficiency-156cv-D_NQ_NP_935927-MLA41856569839_052020-F.webp', 5),
(10, 'Chevrolet S10 Financia Plan Gob Entrega Pactada Solo Dni', 'S10', 2020, 0, 0, 'CHEVROLET S10\r\nFINANCIA HASTA EL 100%\r\nCUOTAS FIJAS SIN INTERES\r\nTOMAMOS USADOS AL MEJOR PRECIO DEL MERCADO\r\nFINANCIA SOLO CON DNI(ACEPTAMOS TEMPORARIOS)\r\nREACTIVA TU PLAN CAIDO\r\nCONSULTE PROMOCIONES SEMANALES EXCLUSIVAS\r\nCHEVROLET CAR ONE < Ford', 'https://http2.mlstatic.com/chevrolet-s10-financia-plan-gob-entrega-pactada-solo-dni-D_NQ_NP_711224-MLA40402271399_012020-F.webp', 2);

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
(1, 'Ford'),
(2, 'Chevrolet'),
(4, 'BMW'),
(5, 'Mercedes Benz'),
(6, 'Volkswagen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `mail`, `password`, `user_name`) VALUES
(1, 'admin@gmail.com', '$2y$12$S0H.0ABwNEPKUeuY5k7ouukdzwQlAXvjiRMHiXZ9pLLGuONvMK.nC', 'carsadmin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id_auto`),
  ADD KEY `id_marca_fk` (`id_marca_fk`);

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
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autos`
--
ALTER TABLE `autos`
  ADD CONSTRAINT `autos_ibfk_1` FOREIGN KEY (`id_marca_fk`) REFERENCES `marcas` (`id_marca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

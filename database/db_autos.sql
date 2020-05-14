-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2020 a las 21:48:15
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
  `kilometros` decimal(11,0) NOT NULL,
  `precio` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `foto` varchar(200) NOT NULL,
  `id_marca_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autos`
--

INSERT INTO `autos` (`id_auto`, `titulo`, `modelo`, `anio`, `kilometros`, `precio`, `descripcion`, `foto`, `id_marca_fk`) VALUES
(1, 'Vendo Ford, Focus, modelo 2017, impecable!!! 30.000km', 'Focus', 2017, '30', 400, 'lo vendo impecable!', 'images/focus 2017.jpg', 1),
(9, 'BMW Serie M 5 - 680 HP', 'M 5', 5, '40', 8600000, 'BMW Serie M 2013 5 - 680 HP', 'https://eldiariony.com/wp-content/uploads/sites/2/2015/08/im_20150318_autos_150319375.jpg?quality=80&strip=all&w=940', 3),
(10, 'Corsa 1.6 4 Pts Super', 'Corsa', 1, '107000', 320000, 'unico dueño\r\nPermuto por algo Ford xfavor!!', 'https://http2.mlstatic.com/corsa-16-4-pts-super-D_NQ_NP_719427-MLA41813048728_052020-F.webp', 2),
(12, 'Ford Mustang 5.0 Gt 421cv', 'Mustang', 4, '30000', 6200000, 'Venta del usado chequeado por nuestros técnicos para retirar\r\n\r\nTomamos usados en parte de pago y consignación\r\n\r\nContamos con seguros con excelentes beneficios por ser clientes!', 'https://http2.mlstatic.com/ford-mustang-50-gt-421cv-2017-D_NQ_NP_873123-MLA33014927332_112019-F.webp', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre_marca`) VALUES
(1, 'Ford'),
(2, 'Chevrolet'),
(3, 'BMW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id_auto`),
  ADD KEY `id_marca` (`id_marca_fk`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autos`
--
ALTER TABLE `autos`
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autos`
--
ALTER TABLE `autos`
  ADD CONSTRAINT `autos_ibfk_1` FOREIGN KEY (`id_marca_fk`) REFERENCES `marca` (`id_marca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

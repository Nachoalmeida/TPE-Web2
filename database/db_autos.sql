-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2020 a las 18:26:34
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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autos`
--
ALTER TABLE `autos`
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autos`
--
ALTER TABLE `autos`
  ADD CONSTRAINT `autos_ibfk_2` FOREIGN KEY (`id_marca_fk`) REFERENCES `marcas` (`id_marca`),
  ADD CONSTRAINT `autos_ibfk_3` FOREIGN KEY (`id_usuario_fk`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

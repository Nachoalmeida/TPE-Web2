-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 02:38 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_autos`
--

-- --------------------------------------------------------

--
-- Table structure for table `autos`
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
-- Dumping data for table `autos`
--

INSERT INTO `autos` (`id_auto`, `titulo`, `modelo`, `anio`, `kilometros`, `precio`, `descripcion`, `foto`, `id_marca_fk`) VALUES
(1, 'Vendo Focus!!!', 'Focus 3.0', 2018, 35000, 500000, 'Una masaaaa!!!', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre_marca`) VALUES
(1, 'Ford');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `mail`, `password`, `user_name`) VALUES
(1, 'admin@gmail.com', '1234', 'carsadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id_auto`),
  ADD KEY `id_marca_fk` (`id_marca_fk`);

--
-- Indexes for table `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autos`
--
ALTER TABLE `autos`
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `autos`
--
ALTER TABLE `autos`
  ADD CONSTRAINT `autos_ibfk_1` FOREIGN KEY (`id_marca_fk`) REFERENCES `marcas` (`id_marca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

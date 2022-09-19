-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2022 at 07:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bogar`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id_entrada` int(11) NOT NULL,
  `estado_entrada` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_entrada` varchar(30) NOT NULL,
  `titulo_entrada` varchar(50) NOT NULL,
  `entrada` text NOT NULL,
  `categoria_entrada` varchar(30) NOT NULL,
  `comentarios_entrada` int(10) NOT NULL DEFAULT 0,
  `creacion_entrada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modificacion_entrada` varchar(50) DEFAULT NULL,
  `eliminacion_entrada` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id_entrada`, `estado_entrada`, `fecha_entrada`, `titulo_entrada`, `entrada`, `categoria_entrada`, `comentarios_entrada`, `creacion_entrada`, `modificacion_entrada`, `eliminacion_entrada`) VALUES
(22, 1, '20 sep 2022', 'prueba sin cerrar sesion', 'prueba sin                        ', 'Test', 0, '2022-09-18 22:56:05', NULL, NULL),
(23, 0, '', 'preba 2 sin logout', 'sin logout                        ', 'Test', 0, '2022-09-18 22:45:14', NULL, NULL),
(24, 0, '18 sep 2022', 'Titulo de entrada desde el form', 'entrdad', 'Test', 0, '2022-09-18 22:45:32', NULL, NULL),
(26, 0, 'septiembre de 2022', 'editada', 'preba 2 sin logout', 'Test', 0, '2022-09-18 22:45:27', NULL, NULL),
(27, 1, '18 sep 2022', 'Editar registros de mysql con php ', 'Entrada editadad desde el form con php', 'Test', 0, '2022-09-18 22:55:48', NULL, NULL),
(28, 1, '20 sep 2022', 'Crear single page', 'Ingresa para ver toda la informacion sobre como hacer una single pagem por ejemplo, veras la single page de esta entrada del blog', 'Tutorial', 0, '2022-09-19 02:40:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `lastname`, `email`, `created_at`, `updated_at`) VALUES
(2, 'bogar_online', 'bogar_on', 'César', 'Nuñez Serrano', 'bogardrums@gmail.com', '2022-09-18 19:39:09', 'sep 2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_entrada`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

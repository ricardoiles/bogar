-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2022 a las 18:01:55
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bogar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id_entrada` int(11) NOT NULL,
  `estado_entrada` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_entrada` varchar(30) NOT NULL,
  `titulo_entrada` varchar(50) NOT NULL,
  `entrada` varchar(2000) NOT NULL,
  `categoria_entrada` varchar(30) NOT NULL,
  `comentarios_entrada` int(10) NOT NULL DEFAULT 0,
  `creacion_entrada` varchar(50) NOT NULL,
  `modificacion_entrada` varchar(50) DEFAULT NULL,
  `eliminacion_entrada` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id_entrada`, `estado_entrada`, `fecha_entrada`, `titulo_entrada`, `entrada`, `categoria_entrada`, `comentarios_entrada`, `creacion_entrada`, `modificacion_entrada`, `eliminacion_entrada`) VALUES
(37, 1, '09-25-2022 · 09:32 PM', 'How long - Charlie Puth', '                                              This song and “Clover Cage - Falling For Free” are the two songs keeping me sane through these tough times. I just want to send love to everyone and I want everyone to know things will get better. We are in this together..I love you..💕                                            ', 'Música', 0, '25 Sept 2022', '09-25-2022 · 09:32 PM', NULL),
(38, 1, '09-25-2022 · 09:36 PM', 'JESSE & JOY – Me Quiero Enamorar (Video Oficial)', '                                              LETRA / LYRICS\r\n\r\nLo puedo imaginar pero no sé como se siente\r\nQue el mundo se detenga cuando acarician mi piel\r\nQue las manos del reloj no giren si no está presente\r\nDicen que es tan suave y dulce y fluye como miel\r\n\r\nCuanto tiempo tardará\r\n¿O no es para todos?\r\n¿Por qué de mí se esconderá?\r\n¿Dónde está?\r\n\r\nQuiero amar y sin pensar entregarlo todo\r\nQuiero que mi corazón intercambie su lugar con el de alguien especial\r\nQuiero despertar, te quiero encontrar y me quiero enamorar                                            ', 'Música', 0, '26 Sept 2022', '09-25-2022 · 09:36 PM', '09-25-2022 · 09:37 PM'),
(39, 1, '09-25-2022 · 09:37 PM', 'Enlaces description me quiero enamorar', '                                              Sigue a Joy:\r\nFacebook: https://www.facebook.com/SolamenteJoy... \r\nInstagram: https://www.instagram.com/joynadamas \r\nTwitter: https://twitter.com/solamentejoy \r\nTikTok: https://www.tiktok.com/@joy.nadamas                                             ', 'Links', 0, '27 sept 2022', '09-25-2022 · 09:37 PM', '09-26-2022 · 12:22 AM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_blog`
--

CREATE TABLE `comentarios_blog` (
  `id_comentario` int(11) NOT NULL,
  `id_entrada` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `links_redes`
--

CREATE TABLE `links_redes` (
  `id_link` int(11) NOT NULL,
  `nombre_link` varchar(200) NOT NULL,
  `link` varchar(300) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `links_redes`
--

INSERT INTO `links_redes` (`id_link`, `nombre_link`, `link`, `update_at`) VALUES
(1, 'facebook', 'facebook.com', '2022-10-28 14:27:10'),
(2, 'whatsapp', 'web.whatsapp.com', '2022-10-28 14:32:22'),
(3, 'twiter', 'twitter.com', '2022-10-28 14:32:28'),
(4, 'youtube', 'youtube.com', '2022-10-28 14:32:33'),
(5, 'tiktok', 'tiktok.com', '2022-10-28 14:32:37'),
(6, 'platzi', 'platzi.com', '2022-10-28 14:32:42'),
(7, 'linktree', 'linktre.com', '2022-10-28 14:32:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preview_info`
--

CREATE TABLE `preview_info` (
  `id_info` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `ubicacion` varchar(300) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preview_info`
--

INSERT INTO `preview_info` (`id_info`, `descripcion`, `imagen`, `correo`, `telefono`, `ubicacion`, `updated_at`) VALUES
(1, 'Descripción breve de 500 caracteres                                                                            ', 'wallpaperbetter.jpg', 'bogaronline@gmail.com', '+521234567890', 'México', '2022-11-04 13:07:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `tipo`, `titulo`, `descripcion`, `update_at`) VALUES
(1, 'servicio', 'Titulo del servicio', 'Descripción del Servicio que ofrece.', '2022-11-04 14:14:39'),
(2, 'clase', 'Titulo de la clase', 'Descripción de la clase que ofrece', '2022-11-04 14:15:33'),
(3, 'servicio', 'titulo', 'descripcion de prueba para insertar desde el modal', '2022-11-09 15:19:04'),
(4, 'servicio', 'prueba titulo servicio', 'segunda descripción del servicio que no se debe eliminar porque se supone que ya esta bien', '2022-11-09 15:20:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
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
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `lastname`, `email`, `created_at`, `updated_at`) VALUES
(2, 'bogar_online', 'bogar_on', 'César', 'Nuñez Serrano', 'bogardrums@gmail.com', '2022-09-18 19:39:09', 'sep 2022');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_entrada`);

--
-- Indices de la tabla `comentarios_blog`
--
ALTER TABLE `comentarios_blog`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_entrada` (`id_entrada`);

--
-- Indices de la tabla `links_redes`
--
ALTER TABLE `links_redes`
  ADD PRIMARY KEY (`id_link`);

--
-- Indices de la tabla `preview_info`
--
ALTER TABLE `preview_info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `comentarios_blog`
--
ALTER TABLE `comentarios_blog`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `links_redes`
--
ALTER TABLE `links_redes`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `preview_info`
--
ALTER TABLE `preview_info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios_blog`
--
ALTER TABLE `comentarios_blog`
  ADD CONSTRAINT `comentarios_blog_ibfk_1` FOREIGN KEY (`id_entrada`) REFERENCES `blog` (`id_entrada`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

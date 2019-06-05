-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-04-2019 a las 11:12:40
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `qa_tec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `id_usuario` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `tags` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img_comentario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `id_post`, `id_parent`, `id_usuario`, `comentario`, `tags`, `fecha`, `img_comentario`) VALUES
(5, 10, 0, 14, 'haha ;D', '', '2019-04-07 00:30:05', ''),
(6, 10, 0, 7, 'Buen chiste! :)', 'MejorSigaEstudiando,QueDichaQueNoSeDedicaaEso', '2019-04-07 08:28:51', ''),
(7, 9, 0, 7, 'Somos dos :lol: :-P :grrr: :-/', 'VacacionesAhora', '2019-04-07 08:32:02', ''),
(8, 15, 0, 12, 'Comente y cuente un chiste!!\r\nAsí: \r\n   Va un barco de vela y se apaga.', 'ChistesMalísimos,ChistesMalosAyudanAProgramar', '2019-04-07 09:55:56', ''),
(9, 8, 0, 12, 'Comentario en un post privado\r\n', 'Privado', '2019-04-07 13:27:27', ''),
(10, 9, 0, 17, 'X3 pero las ocupo ya!! ;D', '', '2019-04-07 13:53:16', ''),
(11, 9, 0, 19, 'X4', '', '2019-04-07 13:54:35', ''),
(12, 9, 0, 19, 'X5', 'LloreConmigoPapi', '2019-04-07 13:55:13', ''),
(13, 9, 0, 16, 'Ya casi!! X6', '', '2019-04-07 13:57:50', ''),
(14, 15, 0, 7, '—Doctor, tengo todo el cuerpo cubierto de pelo. ¿Qué padezco?\r\n—Padece uzté un ozito', 'MejorSigoEstudiando', '2019-04-09 14:03:11', ''),
(15, 7, 0, 7, 'EJEMPLO ', 'EJEMPLO', '2019-04-11 11:58:24', ''),
(16, 18, 0, 7, 'COMENTARIO SIMPLE', 'simple', '2019-04-19 20:45:03', ''),
(17, 10, 5, 7, 'Bien Malo', 'mal_chiste', '2019-04-19 20:45:49', ''),
(18, 18, 16, 7, 'Comentario anidado con imagen', 'comentario_imagen', '2019-04-19 20:46:31', '1658921686.png'),
(19, 18, 0, 7, 'Comentario simple con imagen', 'Comentario_Simple_Imagen', '2019-04-19 20:46:57', '600418545.png'),
(20, 7, 15, 8, 'Comentario de un comentario', 'Comentario', '2019-04-20 23:23:54', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id_like` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id_like`, `id_post`, `id_usuario`) VALUES
(15, 9, 12),
(16, 8, 14),
(18, 9, 7),
(19, 14, 7),
(20, 7, 7),
(21, 11, 7),
(24, 6, 12),
(25, 10, 12),
(26, 15, 12),
(27, 9, 17),
(28, 9, 16),
(31, 7, 21),
(32, 15, 7),
(33, 18, 7),
(34, 7, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `like_comentario`
--

CREATE TABLE `like_comentario` (
  `id_like_comentario` int(11) NOT NULL,
  `id_comentario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `like_comentario`
--

INSERT INTO `like_comentario` (`id_like_comentario`, `id_comentario`, `id_usuario`) VALUES
(9, 20, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `img_post` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `tags` varchar(100) NOT NULL,
  `tipo` int(2) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`id_post`, `titulo`, `img_post`, `descripcion`, `tags`, `tipo`, `id_usuario`, `fecha`) VALUES
(6, '', '', 'Este es un post de ejemplo :) ', 'ejemplo,tec,jose,ceciliano', 1, 7, '2019-04-06 10:57:34'),
(7, '', '', '¡Este es mi primer post en FaceTec!', '', 1, 8, '2019-04-06 18:56:46'),
(8, '', '', 'Post privado', 'privado', 2, 8, '2019-04-06 19:00:36'),
(9, '', '', 'Ocupo Vacaciones :D', 'Verano,Vacaciones,Trabajo,Descanso', 1, 12, '2019-04-07 00:02:53'),
(10, '', '', '¿Qué le dijo una pared a otra pared? Nos vemos en la esquina jaaaajajaja', '#ChisteMalo', 2, 12, '2019-04-07 00:05:17'),
(11, '', '', 'Este es un post sin tags', '', 1, 14, '2019-04-07 00:08:50'),
(12, '', '', 'Post con tags', 'tags,post', 1, 14, '2019-04-07 00:14:30'),
(13, '', '', 'Post con tags de una cuenta sin amigos', 'nofriends,tags', 1, 13, '2019-04-07 00:16:31'),
(14, '', '', 'Post sin tags desde una cuenta con amigos', '', 1, 14, '2019-04-07 00:19:58'),
(15, '', '', '¿Quién inventó las fracciones?.\r\nEnrique octavo.', '#ChisteMalo', 1, 12, '2019-04-07 09:54:13'),
(16, '', '', '—Mamá, en el cole me llaman despistado.\r\n<br>\r\n—Niño, que esta no es tu casa.', 'ChisteMalo,AnaMeLoDijo', 1, 7, '2019-04-09 14:12:59'),
(18, '', '576118462.png', 'POST CON IMAGEN', 'imagen', 1, 7, '2019-04-19 20:44:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `amigos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `email`, `password`, `nombre`, `fecha_nacimiento`, `amigos`) VALUES
(7, 'ceciliano', 'cecilianogranados96@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'José Andrés Ceciliano Granados', '1996-11-15', '[8,9,10,12,16,17,19,14,20,23,21]'),
(8, 'Silvia', 'silvia@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Silvia Calderón Navarro', '1995-11-29', '[7]'),
(9, 'Isa', 'isa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Isabel Navarro', '1954-09-27', '[7,8]'),
(10, 'Ana', 'nani96prr@hotmail.com', '1f2333b1a6823d383ee0d0b4ac969901', 'Ana Rojas', '1996-10-22', ''),
(12, 'ana12', 'nani96prr@hotmail.com', '387d8fa78a8ac5a47236f8b44d7aa026', 'Ana Rojas', '1996-10-22', '[7,20,10,9]'),
(13, 'CSA', 'cuenta@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Cuenta Sin Amigos', '1987-12-09', ''),
(14, 'CA', 'cuentaa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Cuenta Amigos', '2000-04-30', '[8,9,7,10]'),
(15, 'paula22', 'nani96prr@hotmail.com', 'b22fb3e8ca15fc7727543512fa543999', 'Ana Paula', '1999-10-22', ''),
(16, 'luisCa', 'nani96prr@hotmail.com', 'b22fb3e8ca15fc7727543512fa543999', 'Luis Carlos', '1992-12-12', '[12,14]'),
(17, 'rocky', 'nani96prr@hotmail.com', 'b22fb3e8ca15fc7727543512fa543999', 'Raquel Rodriguez', '1994-10-28', '[10,12,7]'),
(19, 'rocky22', 'nani96prr@hotmail.com', 'b22fb3e8ca15fc7727543512fa543999', 'Rodrígo Ramírez', '1880-08-01', '[10,12]'),
(20, 'vivaLaLiga', 'nani96prr@hotmail.com', 'b22fb3e8ca15fc7727543512fa543999', 'Bryan Ruiz', '2014-06-24', '[17,10]'),
(21, 'Steven0997', 'stevenpaniagua39@gmail.com', '9eb89da0e71d69e7cd9fb34abc35dd5f', 'Steven Paniagua Aguilar', '1997-10-09', '[8,9,15,14,16]'),
(23, 'Steven09', 'stevenpaniagua39@gmail.com', '9eb89da0e71d69e7cd9fb34abc35dd5f', 'Steven Paniagua Aguilar', '1997-10-09', ''),
(25, 'Chema', 'nani96prr@gmail.com', 'b22fb3e8ca15fc7727543512fa543999', 'Jose Rojas Rodrìguez', '1994-02-09', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `comentario_post` (`id_post`),
  ADD KEY `comentario_usuario` (`id_usuario`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `like_usuario` (`id_usuario`),
  ADD KEY `like_post` (`id_post`);

--
-- Indices de la tabla `like_comentario`
--
ALTER TABLE `like_comentario`
  ADD PRIMARY KEY (`id_like_comentario`),
  ADD KEY `id_like_coment_user` (`id_usuario`),
  ADD KEY `id_like_coment_coment` (`id_comentario`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `post_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `like_comentario`
--
ALTER TABLE `like_comentario`
  MODIFY `id_like_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_post` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `like_post` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `like_comentario`
--
ALTER TABLE `like_comentario`
  ADD CONSTRAINT `id_like_coment_coment` FOREIGN KEY (`id_comentario`) REFERENCES `comentario` (`id_comentario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_like_coment_user` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

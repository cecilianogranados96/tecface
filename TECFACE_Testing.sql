-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-04-2019 a las 18:04:26
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `TECFACE`
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
  `img_comentario` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `id_post`, `id_parent`, `id_usuario`, `comentario`, `tags`, `fecha`, `img_comentario`) VALUES
(14, 14, 0, 8, 'ejemplo sin archivo', 'ejemplo', '2019-04-19 16:14:25', ''),
(15, 14, 0, 8, 'Ejemplo con archivo ', '', '2019-04-19 16:14:37', '1161033533.png'),
(16, 14, 15, 8, 'Respuesta con archivo', 'sse', '2019-04-19 16:15:02', '1163185986.png'),
(17, 14, 14, 8, 'COMENTARIO SIN ARCHIVO', 'ejemplo', '2019-04-19 16:15:18', ''),
(18, 14, 0, 8, 'EJEM', 'EE', '2019-04-19 20:19:33', ''),
(19, 19, 0, 8, 'COMENTARIO', 'EJEMPLO', '2019-04-19 20:23:27', '214106067.png'),
(20, 19, 19, 8, 'COMENT ', 'COMENT', '2019-04-19 20:23:35', ''),
(21, 19, 20, 8, 'COMENT COMENT', 'EJEMPLO', '2019-04-19 20:23:47', ''),
(23, 14, 14, 8, 'COMENTARIO', 'test,test1', '2019-04-19 20:37:31', '');

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
(23, 14, 8);

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
(6, 17, 8),
(8, 20, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `img_post` varchar(200) NOT NULL,
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
(14, '', '1628786786.png', 'aefoeanvuosn', 'acasc,sesvsdvsdv', 1, 8, '2019-04-19 14:18:21'),
(16, '', '1499132106.png', 'eee', '', 1, 8, '2019-04-19 20:19:44'),
(17, '', '490055.png', 'eee', '', 1, 8, '2019-04-19 20:20:02'),
(18, '', '1483056746.png', 'adacasc', 'acasc', 1, 8, '2019-04-19 20:21:03'),
(19, '', '1010332135.png', 'addad', 'SYNAPP', 1, 8, '2019-04-19 20:23:12'),
(21, '', '', 'DESCRIPCION', 'test,test1', 1, 8, '2019-04-19 20:31:35');

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
(4, 'silvia', 'silviluc.n@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Silvia Calderón', '1995-11-29', '[1]'),
(6, 'erickqf7', 'erickqf7@gmail.com', '1c7a92ae351d4e21ebdfb897508f59d6', 'Erick Quesada Fonseca', '1996-09-03', '[1,4,7]'),
(7, 'Steven0997', 'stevenpaniagua39@gmail.com', '9eb89da0e71d69e7cd9fb34abc35dd5f', 'Steven', '1997-10-09', ''),
(8, 'ceciliano', 'cecilianogranados96@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'José Andrés Ceciliano Granados', '1997-11-15', '[16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,4,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16]');

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
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT de la tabla `like_comentario`
--
ALTER TABLE `like_comentario`
  MODIFY `id_like_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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

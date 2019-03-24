-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-03-2019 a las 17:06:43
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id` int(255) NOT NULL,
  `usuario_id` int(255) NOT NULL,
  `categoria_id` int(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` mediumtext,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id`, `usuario_id`, `categoria_id`, `titulo`, `descripcion`, `fecha`) VALUES
(1, 3, 1, 'Reference site about Lorem Ipsum, giving information on its ', 'Reference site about Lorem Ipsum, giving information on its Reference site about Lorem Ipsum, giving information on its Reference site about Lorem Ipsum, giving information on its Reference site about Lorem Ipsum, giving information on its Reference site about Lorem Ipsum, giving information on its ', '2019-02-12'),
(2, 7, 2, 'Reference site about Lorem Ipsum, giving information on its ', 'Reference site about Lorem Ipsum, giving information on its Reference site about Lorem Ipsum, giving information on its Reference site about Lorem Ipsum, giving information on its Reference site about Lorem Ipsum, giving information on its Reference site about Lorem Ipsum, giving information on its ', '0000-00-00'),
(3, 1, 1, 'NUEVO VIDEJOUEGO 1', 'LOREM', '2019-02-24'),
(4, 1, 3, 'NUEVO VIDEJOUEGO 12', 'dasdasdas', '2019-02-24'),
(5, 1, 1, 'dsadasdas', 'dasda', '2019-02-24'),
(6, 1, 1, 'FDFDSF', 'FDFD', '2019-02-24'),
(7, 1, 1, 'dasdas', 'dasdas', '2019-02-24'),
(8, 1, 1, 'dsdsadsdsd', 'sdsds', '2019-02-24'),
(9, 1, 1, 'dsadsds', 'dddd', '2019-02-24'),
(17, 14, 1, 'TEST', 'HOLAMUD', '2019-03-02'),
(18, 14, 7, 'YYYY', 'FFSDFSDVIDA', '2019-03-02'),
(19, 14, 1, 'HOY HOY', 'HOY HOY', '2019-03-03'),
(20, 14, 1, 'YII2', 'FDSFSDFDS', '2019-03-03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_entrada_usuario` (`usuario_id`),
  ADD KEY `fk_entrada_categoria` (`categoria_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `fk_entrada_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_entrada_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

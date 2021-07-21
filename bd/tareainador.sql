-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2021 a las 00:28:02
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tareainador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `categoria_nombre` varchar(44) NOT NULL,
  `categoria_descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `categoria_nombre`, `categoria_descripcion`) VALUES
(1, 'HTML5', 'Lenguaje de marcado de hipertexto5'),
(2, 'PHP', 'Procesador de hypertexto'),
(6, 'OTRA', 'OTRA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `tarea_id` int(11) NOT NULL,
  `tarea_nombre` varchar(255) NOT NULL,
  `tarea_descripcion` longtext NOT NULL,
  `tarea_categoria_id` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `tarea_usu_id` int(11) DEFAULT NULL,
  `tarea_estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`tarea_id`, `tarea_nombre`, `tarea_descripcion`, `tarea_categoria_id`, `fecha_inicio`, `fecha_fin`, `tarea_usu_id`, `tarea_estado`) VALUES
(1, 'Crear Maquetacion del sitio web de la empresa XXXtenteisho', 'Crear estructura del sitio por medio de html puro ', 1, '2021-06-25', '2021-06-22', 1, 'FINALIZADO'),
(2, 'Diagramas de clase Modulo usuarios', 'Creacion de los diagramas de clase del modulo de usuarios ', 2, '2021-06-25', '2021-06-30', 1, 'FINALIZADO'),
(3, 'Matar canibales', 'Matar canibales que se estan saliendo de control, y estan significando un peligro para la vida del artista', 1, '2021-06-26', '2021-06-25', 1, 'FINALIZADO'),
(4, 'prueba nombrex', 'prueba descripcionx', 2, '2021-06-09', '2029-06-12', 1, 'FINALIZADO'),
(9, 'Lorem ipsum', 'aLatin words, reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 1, '2021-06-27', '2021-07-10', 1, 'FINALIZADO'),
(11, 'wqwqw', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 6, '2021-06-18', '2021-06-29', 21, 'FINALIZADO'),
(23, 'Backend con GO', 'Crear el backend utilizando go :v', 6, '2021-06-28', '2021-07-10', NULL, 'ACTIVO'),
(24, 'wachu wachu', 'sdsdsdsdsdsdsds', 1, '2021-06-25', '2021-06-22', 21, 'FINALIZADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario_nombre` varchar(50) NOT NULL,
  `usuario_apellidos` varchar(50) NOT NULL,
  `usuario_correo` varchar(50) NOT NULL,
  `usuario_password` varchar(33) NOT NULL,
  `usuario_fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_rol` varchar(30) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_nombre`, `usuario_apellidos`, `usuario_correo`, `usuario_password`, `usuario_fecha`, `usuario_rol`) VALUES
(1, 'Julian Camilo', 'Jordan Ordoñez', 'julian@julian.com', '12345', '2021-06-25 00:20:52', 'admin'),
(21, 'Jotaro', 'Kujo', 'jojo@jojo.com', 'oraora', '2021-06-25 23:04:04', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`tarea_id`),
  ADD KEY `tarea_categoria_id` (`tarea_categoria_id`),
  ADD KEY `tarea_usu_id` (`tarea_usu_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `tarea_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `tareas_ibfk_1` FOREIGN KEY (`tarea_categoria_id`) REFERENCES `categorias` (`categoria_id`),
  ADD CONSTRAINT `tareas_ibfk_2` FOREIGN KEY (`tarea_usu_id`) REFERENCES `usuarios` (`usuario_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-02-2017 a las 04:19:49
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `admision3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT '',
  `descripcion` varchar(128) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Ingenierias', 'nn'),
(2, 'Sociales', 'nh'),
(3, 'Biomedicas', 'nn');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `id` int(11) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `facultad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `funcion` varchar(100) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `monto` float NOT NULL,
  `observacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `nombre`, `funcion`, `tipo`, `monto`, `observacion`) VALUES
(1, 'Arbitro', 'Arbitrar', 'Descuento', 50, 'facil'),
(2, 'cuidante', 'cuidar pues', 'Pago', 80, 'nivel intermedio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE `examen` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `proceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad_aulas` int(11) NOT NULL,
  `area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`id`, `nombre`, `cantidad_aulas`, `area`) VALUES
(1, 'Ing Sistemas', 50, 2),
(2, 'Medicina', 90, 3),
(3, 'Derecho', 40, 2),
(4, 'Contabilidad', 30, 2),
(5, 'Marketing', 70, 2),
(6, 'Enfermeria', 10, 3),
(7, 'Antropologia', 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `codigo` varchar(30) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `apellido` varchar(80) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `cargo` int(11) NOT NULL,
  `facultad` int(11) NOT NULL,
  `telefono` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`codigo`, `nombre`, `apellido`, `correo`, `cargo`, `facultad`, `telefono`) VALUES
('1', 'YESSIKA MADELAINE', 'ABARCA ARIAS', 'yabarca@unsa.edu.pe', 1, 3, '2135132'),
('2', 'JULIO CESAR', 'ABARCA CORDERO', 'jabarca@unsa.edu.pe', 2, 2, '1232132'),
('3', 'JACINTA MAYRENE', 'ABARCA DEL CARPIO', 'cabarcad@unsa.edu.pe', 2, 5, '1232131'),
('4', 'OLGER NICOLAS', 'ACOSTA ANGULO', 'oacostaa@unsa.edu.pe', 1, 2, '2524324'),
('5', 'MANUEL JESUS', 'ACOSTA CALDERON', 'macostaca@unsa.edu.p', 1, 1, '1233121'),
('6', 'LORENA TEREZINHA', 'ACOSTA LOPEZ SILVA', 'lacostalopez@unsa.ed', 2, 3, '1232321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `respuesta` text NOT NULL,
  `examen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad_vacantes` int(11) NOT NULL,
  `fecha_1` date NOT NULL,
  `fecha_2` date NOT NULL,
  `fecha_opcinal` date NOT NULL,
  `gastos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proceso`
--

INSERT INTO `proceso` (`id`, `nombre`, `cantidad_vacantes`, `fecha_1`, `fecha_2`, `fecha_opcinal`, `gastos`) VALUES
(1, 'ord2016 ll', 800, '2017-01-19', '0000-00-00', '0000-00-00', '7000'),
(2, 'Ceprunsa 2018 Fase lll', 300, '2017-01-19', '2017-01-18', '0000-00-00', '7665'),
(3, 'Ord 2017 fase lll', 8000, '2017-01-12', '0000-00-00', '0000-00-00', '9000'),
(4, 'ORDINARIO N4939', 900, '2017-01-04', '0000-00-00', '2017-01-10', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_aula`
--

CREATE TABLE `proceso_aula` (
  `id` int(11) NOT NULL,
  `proceso` int(11) NOT NULL,
  `aula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_personal`
--

CREATE TABLE `proceso_personal` (
  `id` int(11) NOT NULL,
  `proceso` int(11) NOT NULL,
  `personal` varchar(30) NOT NULL,
  `proceso_aula` int(11) NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(128) DEFAULT '',
  `usu` varchar(128) NOT NULL,
  `con` varchar(128) NOT NULL,
  `tipo` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nom`, `usu`, `con`, `tipo`) VALUES
(1, 'Hayde Luzmila', 'admin', 'admin', 'a'),
(2, 'YONEL MAMANI', 'yonel', 'root', 'a');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proceso_aula`
--
ALTER TABLE `proceso_aula`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proceso_personal`
--
ALTER TABLE `proceso_personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `proceso_aula`
--
ALTER TABLE `proceso_aula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proceso_personal`
--
ALTER TABLE `proceso_personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

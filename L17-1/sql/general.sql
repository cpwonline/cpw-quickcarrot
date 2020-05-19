-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2011 a las 07:53:08
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `general`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `a_id` int(2) NOT NULL,
  `a_titulo` varchar(50) NOT NULL,
  `a_contenido` text NOT NULL,
  `a_usuario` varchar(20) NOT NULL,
  `a_freg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informaciones`
--

CREATE TABLE `informaciones` (
  `i_id` int(10) NOT NULL,
  `i_menu` varchar(20) NOT NULL,
  `i_sub` varchar(20) NOT NULL,
  `i_posicion` int(2) NOT NULL,
  `i_titulo` text NOT NULL,
  `i_titulo_letra` varchar(7) NOT NULL,
  `i_contenido` text NOT NULL,
  `i_contenido_fondo` varchar(7) NOT NULL,
  `i_contenido_borde` varchar(7) NOT NULL,
  `i_contenido_letra` varchar(7) NOT NULL,
  `i_usuario` varchar(20) NOT NULL,
  `i_disegno` int(1) NOT NULL DEFAULT '1',
  `i_especial` varchar(2) NOT NULL DEFAULT 'no',
  `i_freg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `m_id` int(2) NOT NULL,
  `m_titulo` varchar(20) NOT NULL,
  `m_posicion` int(2) NOT NULL,
  `m_usuario` varchar(20) NOT NULL,
  `m_url` varchar(200) NOT NULL,
  `m_sub` tinyint(1) NOT NULL DEFAULT '0',
  `m_borrable` tinyint(1) NOT NULL DEFAULT '1',
  `m_freg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`m_id`, `m_titulo`, `m_posicion`, `m_usuario`, `m_url`, `m_sub`, `m_borrable`, `m_freg`) VALUES
(1, 'je', 1, 'jose_rivas', 'm/je/p/', 0, 1, '2018-04-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submenus`
--

CREATE TABLE `submenus` (
  `s_id` int(2) NOT NULL,
  `s_titulo` varchar(20) NOT NULL,
  `s_posicion` int(2) NOT NULL,
  `s_menu` varchar(20) NOT NULL,
  `s_usuario` varchar(20) NOT NULL,
  `s_url` varchar(200) NOT NULL,
  `s_freg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `u_id` int(10) NOT NULL,
  `u_nombre` varchar(20) NOT NULL,
  `u_clave` varchar(16) NOT NULL,
  `u_control` int(1) NOT NULL DEFAULT '0',
  `u_estado` varchar(20) NOT NULL DEFAULT 'Activo',
  `u_freg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`u_id`, `u_nombre`, `u_clave`, `u_control`, `u_estado`, `u_freg`) VALUES
(1, 'jose_rivas', '123456', 1, 'Activo', '2011-05-06');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`a_id`);

--
-- Indices de la tabla `informaciones`
--
ALTER TABLE `informaciones`
  ADD PRIMARY KEY (`i_id`),
  ADD KEY `i_id` (`i_id`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`m_id`);

--
-- Indices de la tabla `submenus`
--
ALTER TABLE `submenus`
  ADD PRIMARY KEY (`s_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `a_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `m_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `submenus`
--
ALTER TABLE `submenus`
  MODIFY `s_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

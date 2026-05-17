-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2026 a las 23:25:32
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `treegrowr_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planta`
--

CREATE TABLE `planta` (
  `id_planta` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `valor` int(11) NOT NULL,
  `tiempo_base` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `planta`
--

INSERT INTO `planta` (`id_planta`, `nombre`, `valor`, `tiempo_base`, `precio`) VALUES
(1, 'Semilla de manzana', 20, 60, 10),
(2, 'Semilla de naranja', 40, 120, 20),
(3, 'Semilla de banana', 80, 240, 40),
(4, 'Semilla de pera', 160, 480, 80),
(5, 'Semilla de mandarina', 320, 960, 160);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `tipo`) VALUES
(1, 'Regador basico', 80, 'regador'),
(2, 'Regador intermedio', 160, 'regador'),
(3, 'Regador avanzado', 320, 'regador'),
(4, 'Regador especial', 560, 'regador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `dinero` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `gmail`, `contraseña`, `nombre_usuario`, `dinero`) VALUES
(1, 'latellabenja2009@gmail.com', '$2y$10$xKGTQ7hGZ/0169RfNdeoTOFh2NvikBATO3N6Jxabc5Cv.2X9Mbaz2', 'benjamin latella', 10),
(2, 'nachodeolivos@gmail.com', '$2y$10$h3dzd55jqTNOHKUeyWrM8OpNqgMcwX/bi.mrNi2wsYBa5/iGNBOFW', 'nacho', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_planta`
--

CREATE TABLE `usuario_planta` (
  `id_usuario_planta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_planta` int(11) NOT NULL,
  `nivel_crecimiento` int(11) DEFAULT 0,
  `fecha_plantado` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_planta`
--

INSERT INTO `usuario_planta` (`id_usuario_planta`, `id_usuario`, `id_planta`, `nivel_crecimiento`, `fecha_plantado`) VALUES
(1, 1, 1, 0, '2026-05-17 15:53:15'),
(2, 1, 1, 0, '2026-05-17 18:11:37'),
(3, 1, 1, 0, '2026-05-17 18:11:39'),
(4, 1, 2, 0, '2026-05-17 18:11:41'),
(5, 1, 1, 0, '2026-05-17 18:11:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `planta`
--
ALTER TABLE `planta`
  ADD PRIMARY KEY (`id_planta`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuario_planta`
--
ALTER TABLE `usuario_planta`
  ADD PRIMARY KEY (`id_usuario_planta`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_planta` (`id_planta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `planta`
--
ALTER TABLE `planta`
  MODIFY `id_planta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario_planta`
--
ALTER TABLE `usuario_planta`
  MODIFY `id_usuario_planta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario_planta`
--
ALTER TABLE `usuario_planta`
  ADD CONSTRAINT `usuario_planta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `usuario_planta_ibfk_2` FOREIGN KEY (`id_planta`) REFERENCES `planta` (`id_planta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

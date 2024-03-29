-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 19-12-2023 a las 18:16:52
-- Versión del servidor: 5.7.39
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prog2_tienda_gorras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `codigo_hexadecimal` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id`, `nombre`, `codigo_hexadecimal`) VALUES
(1, 'Negro', '#000000'),
(2, 'Blanco', '#FFFFFF'),
(3, 'Gris', '#808080'),
(4, 'Marrón', '#804000'),
(5, 'Rojo', '#FF0000'),
(6, 'Azul', '#0000FF'),
(7, 'Verde', '#008F39'),
(8, 'Rosa', '#FFC0CB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores_x_gorra`
--

CREATE TABLE `colores_x_gorra` (
  `id` int(10) UNSIGNED NOT NULL,
  `gorra_id` int(10) UNSIGNED NOT NULL,
  `color_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `colores_x_gorra`
--

INSERT INTO `colores_x_gorra` (`id`, `gorra_id`, `color_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(4, 9, 1),
(5, 10, 1),
(6, 10, 4),
(7, 11, 4),
(8, 12, 1),
(9, 12, 3),
(10, 13, 6),
(11, 14, 2),
(12, 15, 7),
(13, 16, 1),
(14, 17, 5),
(15, 18, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `importe` float(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `fecha`, `id_usuario`, `importe`) VALUES
(1, '2023-12-19', 1, 29.99),
(2, '2023-12-19', 1, 32.99),
(3, '2023-12-19', 2, 26.99),
(4, '2023-12-19', 2, 405.00),
(5, '2023-12-19', 3, 29.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gorras`
--

CREATE TABLE `gorras` (
  `id` int(10) UNSIGNED NOT NULL,
  `marca_id` int(10) UNSIGNED NOT NULL,
  `material_id` int(10) UNSIGNED NOT NULL,
  `color_id` int(10) UNSIGNED NOT NULL,
  `modelo` varchar(256) NOT NULL,
  `imagen` varchar(256) NOT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `descripcion` text,
  `stock` smallint(6) NOT NULL,
  `precio` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gorras`
--

INSERT INTO `gorras` (`id`, `marca_id`, `material_id`, `color_id`, `modelo`, `imagen`, `fecha_lanzamiento`, `descripcion`, `stock`, `precio`) VALUES
(1, 1, 1, 3, ' Originals', 'adidas_original.webp', '2023-10-01', 'Una gorra clásica de Adidas en color gris', 100, '29.99'),
(2, 2, 2, 1, 'Air Jordan', 'nike_jordan.webp', '2023-09-15', 'Gorra Nike Air Jordan con estilo', 75, '39.99'),
(5, 3, 1, 3, 'Essentials', 'puma_essentials.webp', '2023-09-20', 'Una gorra cómoda y elegante de Puma', 50, '24.99'),
(6, 4, 2, 8, '9FORTY', 'newera_9forti.webp', '2023-09-25', 'Gorra New Era 9FORTY para los fanáticos de los deportes.', 60, '34.00'),
(8, 5, 1, 6, 'Classic', 'reebok_classic.webp', '2023-10-05', 'Gorra Reebok clásica.', 80, '27.00'),
(9, 6, 2, 1, 'Chuck Taylor', '1700865517.webp', '2023-12-09', 'Gorra Converse Chuck Taylor', 55, '32.99'),
(10, 7, 1, 1, 'Classic Checkerboard', '1700865627.webp', '2023-09-22', 'Gorra Vans con diseño clásico', 70, '29.99'),
(11, 8, 2, 4, 'Heritage', '1700865663.webp', '2023-10-10', 'Gorra Fila Heritage en marrón', 45, '26.99'),
(12, 9, 1, 1, 'Blitzing', '1700865695.webp', '2023-02-15', 'Gorra Under Armour para los amantes del deporte', 50, '29.99'),
(13, 10, 1, 6, 'Ellis', '1700865726.webp', '2023-02-05', 'Gorra DC para los amantes del estilo', 41, '19.99'),
(14, 11, 1, 2, 'One And Only', '1700865770.jpg', '2023-05-15', '', 500, '19.99'),
(15, 12, 1, 7, 'All day', '1700865800.webp', '2021-02-15', '', 45, '19.99'),
(16, 2, 1, 1, 'Air Jordan', '1700865830.webp', '2009-04-02', '', 140, '29.99'),
(17, 2, 1, 5, 'Air Jordan', '1700865854.webp', '1999-12-05', '', 400, '19.99'),
(18, 13, 1, 2, 'Spirit white', '1700865885.webp', '2023-11-24', '', 500, '19.99');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gorras_x_compra`
--

CREATE TABLE `gorras_x_compra` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_compra` int(10) UNSIGNED NOT NULL,
  `id_gorra` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gorras_x_compra`
--

INSERT INTO `gorras_x_compra` (`id`, `id_compra`, `id_gorra`, `cantidad`) VALUES
(1, 1, 1, 1),
(2, 2, 9, 1),
(3, 3, 11, 1),
(4, 4, 8, 15),
(5, 5, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`) VALUES
(1, 'Adidas'),
(2, 'Nike'),
(3, 'Puma'),
(4, 'New Era'),
(5, 'Reebok'),
(6, 'Converse'),
(7, 'Vans'),
(8, 'Fila'),
(9, 'Under Armour'),
(10, 'DC Shoes'),
(11, 'Hurley'),
(12, 'Quiksilver'),
(13, 'Volcom'),
(14, 'Billabong');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`id`, `nombre`) VALUES
(1, 'Algodón'),
(2, 'Poliéster');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(256) NOT NULL,
  `nombre_usuario` varchar(256) NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `rol` enum('superadmin','admin','usuario','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre_usuario`, `nombre_completo`, `password`, `rol`) VALUES
(1, 'franco.campaiola@davinci.edu.ar', 'franco.campaiola', 'Franco Campaiola', '$2y$10$V.UkUyxMIRCZOynuKo1c8.u.BpOFXfEYNg1XpiS8q4G/1nRGbqFOS', 'superadmin'),
(2, 'franco.campaiola@davinci.edu.ar', 'francocampaiola', 'Franco Campaiola', '$2y$10$V.UkUyxMIRCZOynuKo1c8.u.BpOFXfEYNg1XpiS8q4G/1nRGbqFOS', 'usuario'),
(3, 'franco.campaiola@davinci.edu.ar', 'fcampaiola', 'Franco Campaiola', '$2y$10$V.UkUyxMIRCZOynuKo1c8.u.BpOFXfEYNg1XpiS8q4G/1nRGbqFOS', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colores_x_gorra`
--
ALTER TABLE `colores_x_gorra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gorra_id` (`gorra_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `gorras`
--
ALTER TABLE `gorras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marca_id` (`marca_id`) USING BTREE,
  ADD KEY `material_id` (`material_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Indices de la tabla `gorras_x_compra`
--
ALTER TABLE `gorras_x_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_compra` (`id_compra`),
  ADD KEY `id_gorra` (`id_gorra`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
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
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `colores_x_gorra`
--
ALTER TABLE `colores_x_gorra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `gorras`
--
ALTER TABLE `gorras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `gorras_x_compra`
--
ALTER TABLE `gorras_x_compra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `colores_x_gorra`
--
ALTER TABLE `colores_x_gorra`
  ADD CONSTRAINT `colores_x_gorra_ibfk_1` FOREIGN KEY (`gorra_id`) REFERENCES `gorras` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `colores_x_gorra_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `colores` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `gorras`
--
ALTER TABLE `gorras`
  ADD CONSTRAINT `gorras_ibfk_1` FOREIGN KEY (`color_id`) REFERENCES `colores` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `gorras_ibfk_2` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `gorras_ibfk_3` FOREIGN KEY (`material_id`) REFERENCES `materiales` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `gorras_x_compra`
--
ALTER TABLE `gorras_x_compra`
  ADD CONSTRAINT `gorras_x_compra_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `gorras_x_compra_ibfk_2` FOREIGN KEY (`id_gorra`) REFERENCES `gorras` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

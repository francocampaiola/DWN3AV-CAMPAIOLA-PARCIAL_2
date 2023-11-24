-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2023 a las 23:31:07
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id`, `nombre`, `codigo_hexadecimal`) VALUES
(1, 'Negro', '000000'),
(2, 'Blanco', 'FFFFFF'),
(3, 'Gris', '808080'),
(4, 'Marrón', '804000'),
(5, 'Rojo', 'FF0000'),
(6, 'Azul', '0000FF'),
(7, 'Verde', '008F39'),
(8, 'Rosa', 'FFC0CB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores_x_gorra`
--

CREATE TABLE `colores_x_gorra` (
  `id` int(10) UNSIGNED NOT NULL,
  `gorra_id` int(10) UNSIGNED NOT NULL,
  `color_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `colores_x_gorra`
--

INSERT INTO `colores_x_gorra` (`id`, `gorra_id`, `color_id`) VALUES
(1, 1, 1),
(2, 1, 3);

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
  `descripcion` text DEFAULT NULL,
  `stock` smallint(6) NOT NULL,
  `precio` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gorras`
--

INSERT INTO `gorras` (`id`, `marca_id`, `material_id`, `color_id`, `modelo`, `imagen`, `fecha_lanzamiento`, `descripcion`, `stock`, `precio`) VALUES
(1, 1, 1, 3, ' Originals', 'adidas_original.webp', '2023-10-01', 'Una gorra clásica de Adidas en color gris', 100, 29.99),
(2, 2, 2, 1, 'Air Jordan', 'nike_jordan.webp', '2023-09-15', 'Gorra Nike Air Jordan con estilo', 75, 39.99),
(5, 3, 1, 3, 'Essentials', 'puma_essentials.webp', '2023-09-20', 'Una gorra cómoda y elegante de Puma', 50, 24.99),
(6, 4, 2, 8, '9FORTY', 'newera_9forti.webp', '2023-09-25', 'Gorra New Era 9FORTY para los fanáticos de los deportes.', 60, 34.00),
(8, 5, 1, 6, 'Classic', 'reebok_classic.webp', '2023-10-05', 'Gorra Reebok clásica.', 80, 27.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `nombre_usuario` varchar(256) NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `rol` enum('superadmin','admin','usuario','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indices de la tabla `gorras`
--
ALTER TABLE `gorras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marca_id` (`marca_id`) USING BTREE,
  ADD KEY `material_id` (`material_id`),
  ADD KEY `color_id` (`color_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `gorras`
--
ALTER TABLE `gorras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Filtros para la tabla `gorras`
--
ALTER TABLE `gorras`
  ADD CONSTRAINT `gorras_ibfk_1` FOREIGN KEY (`color_id`) REFERENCES `colores` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `gorras_ibfk_2` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `gorras_ibfk_3` FOREIGN KEY (`material_id`) REFERENCES `materiales` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

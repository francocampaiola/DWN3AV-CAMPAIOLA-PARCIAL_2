/*
 Navicat Premium Data Transfer

 Source Server         : prog2_tienda_gorras
 Source Server Type    : MySQL
 Source Server Version : 100428
 Source Host           : localhost:3306
 Source Schema         : prog2_tienda_gorras

 Target Server Type    : MySQL
 Target Server Version : 100428
 File Encoding         : 65001

 Date: 19/11/2023 02:15:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for colores
-- ----------------------------
DROP TABLE IF EXISTS `colores`;
CREATE TABLE `colores`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_hexadecimal` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of colores
-- ----------------------------
INSERT INTO `colores` VALUES (1, 'Negro', '000000');
INSERT INTO `colores` VALUES (2, 'Blanco', 'FFFFFF');
INSERT INTO `colores` VALUES (3, 'Gris', '808080');
INSERT INTO `colores` VALUES (4, 'Marrón', '804000');
INSERT INTO `colores` VALUES (5, 'Rojo', 'FF0000');
INSERT INTO `colores` VALUES (6, 'Azul', '0000FF');
INSERT INTO `colores` VALUES (7, 'Verde', '008F39');
INSERT INTO `colores` VALUES (8, 'Rosa', 'FFC0CB');
-- ----------------------------
-- Table structure for gorras
-- ----------------------------
DROP TABLE IF EXISTS `gorras`;
CREATE TABLE `gorras`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `marca_id` int UNSIGNED NOT NULL,
  `material_id` int UNSIGNED NOT NULL,
  `color_id` int UNSIGNED NOT NULL,
  `modelo` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `imagen` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `stock` smallint NOT NULL,
  `precio` decimal(8, 2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `marca_id`(`marca_id` ASC) USING BTREE,
  INDEX `material_id`(`material_id` ASC) USING BTREE,
  INDEX `color_id`(`color_id` ASC) USING BTREE,
  CONSTRAINT `gorras_ibfk_1` FOREIGN KEY (`color_id`) REFERENCES `colores` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `gorras_ibfk_2` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `gorras_ibfk_3` FOREIGN KEY (`material_id`) REFERENCES `materiales` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;
-- ----------------------------
-- Records of gorras
-- ----------------------------
INSERT INTO `gorras` VALUES (1, 1, 1, 3, ' Originals', 'adidas_original.webp', '2023-10-01', 'Una gorra clásica de Adidas en color gris', 100, 29.99);
INSERT INTO `gorras` VALUES (2, 2, 2, 1, 'Air Jordan', 'nike_jordan.webp', '2023-09-15', 'Gorra Nike Air Jordan con estilo', 75, 39.99);
INSERT INTO `gorras` VALUES (5, 3, 1, 3, 'Essentials', 'puma_essentials.webp', '2023-09-20', 'Una gorra cómoda y elegante de Puma', 50, 24.99);

-- ----------------------------
-- Table structure for marcas
-- ----------------------------
DROP TABLE IF EXISTS `marcas`;
CREATE TABLE `marcas`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of marcas
-- ----------------------------
INSERT INTO `marcas` VALUES (1, 'Adidas');
INSERT INTO `marcas` VALUES (2, 'Nike');
INSERT INTO `marcas` VALUES (3, 'Puma');
INSERT INTO `marcas` VALUES (4, 'New Era');
INSERT INTO `marcas` VALUES (5, 'Reebok');
INSERT INTO `marcas` VALUES (6, 'Converse');
INSERT INTO `marcas` VALUES (7, 'Vans');
INSERT INTO `marcas` VALUES (8, 'Fila');
INSERT INTO `marcas` VALUES (9, 'Under Armour');
INSERT INTO `marcas` VALUES (10, 'DC Shoes');
INSERT INTO `marcas` VALUES (11, 'Hurley');
INSERT INTO `marcas` VALUES (12, 'Quiksilver');
INSERT INTO `marcas` VALUES (13, 'Volcom');
INSERT INTO `marcas` VALUES (14, 'Billabong');

-- ----------------------------
-- Table structure for materiales
-- ----------------------------
DROP TABLE IF EXISTS `materiales`;
CREATE TABLE `materiales`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of materiales
-- ----------------------------
INSERT INTO `materiales` VALUES (1, 'Algodón');
INSERT INTO `materiales` VALUES (2, 'Poliéster');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre_usuario` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre_completo` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rol` enum('superadmin','admin','usuario','') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------

-- ----------------------------
-- Table structure for colores_x_gorra
-- ----------------------------
DROP TABLE IF EXISTS `colores_x_gorra`;
CREATE TABLE `colores_x_gorra`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `gorra_id` int UNSIGNED NOT NULL,
  `color_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `gorra_id`(`gorra_id` ASC) USING BTREE,
  INDEX `color_id`(`color_id` ASC) USING BTREE,
  CONSTRAINT `colores_x_gorra_ibfk_1` FOREIGN KEY (`gorra_id`) REFERENCES `gorras` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `colores_x_gorra_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `colores` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of colores_x_gorra
-- ----------------------------
INSERT INTO `colores_x_gorra` VALUES (1, 1, 1);
INSERT INTO `colores_x_gorra` VALUES (2, 1, 3);

SET FOREIGN_KEY_CHECKS = 1;

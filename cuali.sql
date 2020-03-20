/*
 Navicat Premium Data Transfer

 Source Server         : LOCALHOST
 Source Server Type    : MySQL
 Source Server Version : 100113
 Source Host           : localhost:3306
 Source Schema         : cuali

 Target Server Type    : MySQL
 Target Server Version : 100113
 File Encoding         : 65001

 Date: 20/03/2020 16:48:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for casos
-- ----------------------------
DROP TABLE IF EXISTS `casos`;
CREATE TABLE `casos`  (
  `idCaso` int(10) NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Apellidos` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Telefono` int(11) NULL DEFAULT NULL,
  `Correo` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Id_Cuenta` int(10) NULL DEFAULT NULL,
  `Id_Fuente` int(10) NULL DEFAULT NULL,
  `Id_Tipo` int(10) NULL DEFAULT NULL,
  `Id_Categoria` int(10) NULL DEFAULT NULL,
  `Id_Asignado` int(10) NULL DEFAULT NULL,
  `Id_Ciudad` int(10) NULL DEFAULT NULL,
  `Monto` decimal(10, 2) NULL DEFAULT NULL,
  `Comentarios` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `id_usuario` int(10) NULL DEFAULT NULL,
  `estado` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`idCaso`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of casos
-- ----------------------------
INSERT INTO `casos` VALUES (16, 'Maryan Adan', 'Barrera', 82449100, 'endscom@gmail.com', 1, 3, 2, 3, 2, 3, 2500.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 00:00:00', '2019-06-06 11:38:31', 1, 1);
INSERT INTO `casos` VALUES (17, 'Maryan Adan', 'Barrera', 82449100, 'endscom@gmail.com', 1, 3, 2, 3, 2, 3, 2500.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 00:00:00', '2019-06-06 11:38:31', 2, 1);
INSERT INTO `casos` VALUES (18, 'Maryan Adan', 'Barrera', 82449100, 'endscom@gmail.com', 1, 3, 2, 3, 2, 3, 2500.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 00:00:00', '2019-06-06 11:38:31', 3, 1);
INSERT INTO `casos` VALUES (19, 'Maryan Adan', 'Barrera', 82449100, 'endscom@gmail.com', 1, 3, 2, 3, 2, 3, 2500.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 00:00:00', '2019-06-06 11:38:31', 4, 1);
INSERT INTO `casos` VALUES (20, 'Maryan Adan', 'Barrera', 82449100, 'endscom@gmail.com', 1, 3, 2, 3, 2, 3, 2500.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 00:00:00', '2019-06-06 11:38:31', 5, 1);
INSERT INTO `casos` VALUES (21, 'Maryan Adan', 'Barrera', 82449100, 'endscom@gmail.com', 1, 3, 2, 3, 2, 3, 2500.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 00:00:00', '2019-06-06 11:38:31', 6, 1);
INSERT INTO `casos` VALUES (22, 'Maryan Adan', 'Barrera', 82449100, 'endscom@gmail.com', 1, 3, 2, 3, 2, 3, 2500.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 00:00:00', '2019-06-06 11:38:31', 7, 1);
INSERT INTO `casos` VALUES (23, 'Maryan Adan', 'Barrera', 82449100, 'endscom@gmail.com', 1, 3, 2, 3, 2, 3, 2500.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 00:00:00', '2019-06-06 11:38:31', 1, 1);
INSERT INTO `casos` VALUES (24, 'Maryan Adan', 'Barrera', 82449100, 'endscom@gmail.com', 1, 3, 2, 3, 2, 3, 2500.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 00:00:00', '2019-06-06 11:38:31', 2, 1);
INSERT INTO `casos` VALUES (25, 'Maryan Adan', 'Barrera', 82449100, 'endscom@gmail.com', 1, 3, 2, 3, 2, 3, 2500.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 00:00:00', '2019-06-06 11:38:31', 3, 1);
INSERT INTO `casos` VALUES (26, 'Maryan Adan', 'Barrera', 82449100, 'endscom@gmail.com', 1, 3, 2, 3, 2, 3, 2500.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 00:00:00', '2019-06-06 11:38:31', 4, 1);
INSERT INTO `casos` VALUES (27, 'Maryan Adan', 'Barrera', 82449100, 'endscom@gmail.com', 1, 3, 2, 3, 2, 3, 2500.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 00:00:00', '2019-06-06 11:38:31', 5, 1);
INSERT INTO `casos` VALUES (28, 'Maryan Adan', 'Barrera', 82449100, 'endscom@gmail.com', 1, 3, 2, 3, 2, 3, 2500.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 00:00:00', '2019-06-06 11:38:31', 6, 1);
INSERT INTO `casos` VALUES (29, 'Maryan Adan', 'Barrera', 82449100, 'endscom@gmail.com', 1, 3, 2, 3, 2, 3, 2500.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 00:00:00', '2019-06-06 11:38:31', 7, 1);
INSERT INTO `casos` VALUES (30, 'Maryan Adan', 'Barrera', 82449100, 'endscom@gmail.com', 1, 3, 2, 3, 2, 3, 2500.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 00:00:00', '2019-06-06 11:38:31', 1, 1);
INSERT INTO `casos` VALUES (31, 'Maryan Adan', 'Barrera', 82449100, 'endscom@gmail.com', 1, 3, 2, 3, 2, 3, 2500.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 00:00:00', '2019-06-06 11:38:31', 2, 1);
INSERT INTO `casos` VALUES (32, 'Maryan Adan', 'Barrera', 82449100, 'endscom@gmail.com', 1, 3, 2, 3, 2, 3, 2500.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 00:00:00', '2019-06-06 11:38:31', 3, 1);
INSERT INTO `casos` VALUES (33, 'Maryan Adan', 'Barrera', 82449100, 'endscom@gmail.com', 1, 3, 2, 3, 2, 3, 2500.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 00:00:00', '2019-06-06 11:38:31', 4, 1);
INSERT INTO `casos` VALUES (34, 'Maryan Adan', 'Barrera', 82449100, 'endscom@gmail.com', 1, 3, 2, 3, 2, 3, 2500.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 00:00:00', '2019-06-06 11:38:31', 5, 1);
INSERT INTO `casos` VALUES (35, 'Maryan Adan', 'Barrera', 82449100, 'endscom@gmail.com', 1, 3, 2, 3, 2, 3, 2500.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 00:00:00', '2019-06-06 11:38:31', 6, 1);
INSERT INTO `casos` VALUES (36, 'Juan', 'martines', 82449100, 'endscom@gmail.com', 1, 2, 2, 23, 16, 4, 1200.00, 'aaaa', '2019-06-13 00:00:00', '2019-06-13 08:58:02', 1, 1);
INSERT INTO `casos` VALUES (37, 'Maryan', 'Espinoza', 82449100, 'endscom@gmail.com', 1, 1, 1, 23, 15, 2, 120.00, '1', '2019-06-13 00:00:00', '2019-06-13 10:43:56', 1, 1);
INSERT INTO `casos` VALUES (38, 'Maryan', 'Espinoza', 82449100, 'endscom@gmail.com', 1, 1, 1, 20, 15, 2, 0.00, 'F', '2019-06-13 00:00:00', '2019-06-13 10:46:49', 1, 1);
INSERT INTO `casos` VALUES (39, 'Maryan', 'Espinoza', 82449100, 'endscom@gmail.com', 1, 2, 1, 20, 14, 4, 123546.00, 'aa', '2019-06-13 00:00:00', '2019-06-13 10:54:25', 1, 1);
INSERT INTO `casos` VALUES (40, 'Maryan', 'Espinoza', 82449100, 'endscom@gmail.com', 1, 1, 1, 18, 11, 2, 12000.00, 'MARYAN COMENTARIOS', '2019-06-13 00:00:00', '2019-06-13 11:34:16', 1, 1);
INSERT INTO `casos` VALUES (41, 'Maryan', 'Espinoza', 82449100, 'endscom@gmail.com', 1, 1, 1, 18, 11, 2, 12000.00, 'MARYAN COMENTARIOS', '2019-06-13 00:00:00', '2019-06-13 11:35:08', 1, 1);
INSERT INTO `casos` VALUES (42, 'Maryan', 'Espinoza', 82449100, 'endscom@gmail.com', 1, 1, 1, 18, 11, 2, 12000.00, 'MARYAN COMENTARIOS', '2019-06-13 00:00:00', '2019-06-13 11:40:46', 1, 1);
INSERT INTO `casos` VALUES (43, 'Maryan', 'Espinoza', 82449100, 'endscom@gmail.com', 1, 1, 1, 18, 23, 2, 0.00, 'SSSSS', '2019-06-13 00:00:00', '2019-06-13 03:42:28', 1, 1);
INSERT INTO `casos` VALUES (44, 'Maryan', 'Espinoza', 82449100, 'endscom@gmail.com', 1, 1, 1, 18, 23, 2, 0.00, 'SSSSS', '2019-06-13 00:00:00', '2019-06-13 03:44:42', 1, 1);
INSERT INTO `casos` VALUES (45, 'Maryan', 'Espinoza', 82449100, 'endscom@gmail.com', 1, 1, 1, 18, 23, 2, 0.00, 'SSSSS', '2019-06-13 00:00:00', '2019-06-13 03:45:22', 1, 1);
INSERT INTO `casos` VALUES (46, 'Maryan', 'Espinoza', 82449100, 'endscom@gmail.com', 1, 1, 2, 54, 23, 4, 1200.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.\n\nMorbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.\n\nPraesent dapibus, neque id cursus fa', '2019-06-13 00:00:00', '2019-06-13 03:46:24', 1, 1);
INSERT INTO `casos` VALUES (47, 'Maryan', 'Espinoza', 82449100, 'endscom@gmail.com', 8, 1, 1, 102, 24, 1, 1.00, 'Comentario principal', '2019-08-26 00:00:00', '2019-08-26 12:01:47', 1, 1);

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias`  (
  `Id_Categorias` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Id_Cuenta` int(10) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `id_usuario` int(10) NULL DEFAULT NULL,
  `estado` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`Id_Categorias`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 104 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES (1, 'CATEGORIA INISSER 01', 1, '2019-05-21 14:11:12', '2019-06-10 11:38:54', 1, 0);
INSERT INTO `categorias` VALUES (2, 'CATEGORIA INISSER 02', 1, '2019-05-21 14:11:12', '2019-06-10 11:38:56', 1, 0);
INSERT INTO `categorias` VALUES (3, 'CATEGORIA INISSER DE LA CUENTA INISER', 1, '2019-05-21 14:11:12', '2019-06-10 11:38:57', 1, 0);
INSERT INTO `categorias` VALUES (4, 'CATEGORIA INISSER 04', 1, '2019-05-21 14:11:12', '2019-06-10 11:38:59', 1, 0);
INSERT INTO `categorias` VALUES (5, 'CATEGORIA INISSER 04', 1, '2019-05-21 14:11:12', '2019-06-10 11:39:01', 1, 0);
INSERT INTO `categorias` VALUES (6, 'CATEGORIA INISSER 06', 1, '2019-05-21 14:11:12', '2019-06-10 11:39:03', 1, 0);
INSERT INTO `categorias` VALUES (12, 'asdasdasd', 1, '2019-06-10 09:04:15', '2019-06-10 10:11:45', 1, 0);
INSERT INTO `categorias` VALUES (13, 'NUEVA CATEGORIA', 1, '2019-06-10 09:06:49', '2019-06-10 10:11:47', 1, 0);
INSERT INTO `categorias` VALUES (14, 'cate', 1, '2019-06-10 11:23:49', '2019-06-10 11:37:08', 1, 0);
INSERT INTO `categorias` VALUES (15, 'SEGURO VIDA VITAL 3', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (16, 'SEGURO VIDA VITAL 3', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (17, 'SEGURO DE VIDA INDIVIDUAL', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (18, 'SEGURO DE VIDA INDIVIDUAL', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (19, 'SEGURO DE VIDA COLECTIVO', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (20, 'SEGURO DE VIDA COLECTIVO', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (21, 'SEGURO VIDA DEUDORES', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (22, 'SEGURO FUNERARIO FAMILIAR', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (23, 'SEGURO VIDA DEUDORES', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (24, 'SEGURO FUNERARIO FAMILIAR', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (25, 'SEGURO DE VIDA GASTOS FUNERARIOS', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (26, 'SEGURO DE VIDA GASTOS FUNERARIOS', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (27, 'SEGURO ACCIDENTES PERSONALES FAMILIARES', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (28, 'SEGURO ACCIDENTES PERSONALES FAMILIARES', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (29, 'SEGURO DE ACCIDENTES COLECTIVOS', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (30, 'SEGURO DE ACCIDENTES PERSONALES', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (31, 'SEGURO DE ACCIDENTES COLECTIVOS', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (32, 'SEGURO DE ACCIDENTES PERSONALES', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (33, 'SEGURO UNIVERSITARIO', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (34, 'SEGURO ESCOLAR', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (35, 'SEGURO UNIVERSITARIO', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (36, 'SEGURO ESCOLAR', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (37, 'SEGURO VIAJERO', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (38, 'SEGURO VIAJEROS', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (39, 'SEGURO VIAJERO', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (40, 'SEGURO DE SALUD REGIONAL', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (41, 'SEGURO VIAJEROS', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (42, 'SEGURO DE SALUD INTERNACIONAL', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (43, 'SEGURO DE SALUD REGIONAL', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (44, 'SEGURO DE SALUD INTERNACIONAL', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (45, 'SEGURO DE TRANSPORTE', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (46, 'SEGURO DE TRANSPORTE', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (47, 'SEGURO TODO RIESGO DE CONSTRUCCIÓN', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (48, 'SEGURO TODO RIESGO DE CONSTRUCCIÓN', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (49, 'SEGURO DE EQUIPO DE CONTRATISTA', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (50, 'SEGURO TODO RIESGO DE MONTAJE', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (51, 'SEGURO DE EQUIPO DE CONTRATISTA', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (52, 'SEGURO DE EQUIPO ELECTRÓNICO', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (53, 'SEGURO DE RESPONSABILIDAD CIVIL', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (54, 'SEGURO TODO RIESGO DE MONTAJE', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (55, 'SEGURO DE FIDELIDAD COMPRENSIVA', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (56, 'SEGURO DE EQUIPO ELECTRÓNICO', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (57, 'SEGURO DE ROTURA DE CALDERA', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (58, 'SEGURO DE RESPONSABILIDAD CIVIL', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (59, 'SEGURO DE ROTURA DE MAQUINARIA', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (60, 'SEGURO DE FIDELIDAD COMPRENSIVA', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (61, 'SEGURO DE EMBARCACIÓN', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (62, 'SEGURO DE ROTURA DE CALDERA', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (63, 'SEGURO DE ROTURA DE MAQUINARIA', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (64, 'SEGURO DE ROTURA DE CRISTALES', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (65, 'SEGURO DE EMBARCACIÓN', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (66, 'SEGURO DE DINERO Y VALORES EN TRÁNSITO', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (67, 'SEGURO DE INCENDIO HOGAR', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (68, 'SEGURO DE ROTURA DE CRISTALES', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (69, 'SEGURO DE DINERO Y VALORES EN TRÁNSITO', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (70, 'SEGURO INCENDIO Y LÍNEAS ALIADAS', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (71, 'SEGURO DE INCENDIO HOGAR', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (72, 'SEGURO TODO RIESGO DE INCENDIO', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (73, 'SEGURO INCENDIO Y LÍNEAS ALIADAS', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (74, 'SEGURO TODO RIESGO DE INCENDIO', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (75, 'FIANZAS DE CONTRATISTAS Y PROVEEDORES', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (76, 'FIANZAS FISCALES', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (77, 'FIANZAS DE CONTRATISTAS Y PROVEEDORES', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (78, 'FIANZAS PROFESIONALES', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (79, 'SEGURO PLAN BÁSICO', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (80, 'FIANZAS FISCALES', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (81, 'SEGURO PLAN BÁSICO PLUS', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (82, 'FIANZAS PROFESIONALES', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (83, 'SEGURO PLAN BÁSICO', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (84, 'SEGURO DE AUTO PLAN PREMIERE', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (85, 'SEGURO DE AUTO PLAN ULTRA', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (86, 'SEGURO PLAN BÁSICO PLUS', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (87, 'SEGURO OBLIGATORIO', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (88, 'SEGURO DE AUTO PLAN PREMIERE', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (89, 'SEGURO DE AUTO PLAN ULTRA', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (90, 'SEGURO OBLIGATORIO ACCIDENTES DE PASAJEROS', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (91, 'SEGURO DE LICENCIAS', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (92, 'SEGURO OBLIGATORIO', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (93, 'SEGURO OBLIGATORIO ACCIDENTES DE PASAJEROS', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (94, 'MICROSEGURO', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (95, 'SEGURO DE LICENCIAS', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (96, 'MICROSEGURO', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (97, 'SEGURO AGRARIO', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (98, 'SEGURO AGRARIO', 1, '2019-06-10 11:39:45', '2019-06-10 11:39:45', 1, 1);
INSERT INTO `categorias` VALUES (99, 'SEGURO PECUARIO', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (100, 's', 1, '2019-06-10 11:39:45', '2019-06-10 11:43:13', 1, 0);
INSERT INTO `categorias` VALUES (101, 'Movil', 8, '2019-08-26 11:59:11', '2019-08-26 11:59:11', 1, 1);
INSERT INTO `categorias` VALUES (102, 'WEB', 8, '2019-08-26 11:59:15', '2019-08-26 11:59:15', 1, 1);
INSERT INTO `categorias` VALUES (103, 'Hibrida', 8, '2019-08-26 11:59:21', '2019-08-26 11:59:21', 1, 1);

-- ----------------------------
-- Table structure for ciudades
-- ----------------------------
DROP TABLE IF EXISTS `ciudades`;
CREATE TABLE `ciudades`  (
  `IdCiudad` int(10) NOT NULL AUTO_INCREMENT,
  `NombreCiudad` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`IdCiudad`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ciudades
-- ----------------------------
INSERT INTO `ciudades` VALUES (1, 'Boaco');
INSERT INTO `ciudades` VALUES (2, 'Carazo');
INSERT INTO `ciudades` VALUES (3, 'Chinandega');
INSERT INTO `ciudades` VALUES (4, 'Chontales');
INSERT INTO `ciudades` VALUES (5, 'Estelí');
INSERT INTO `ciudades` VALUES (6, 'Granada');
INSERT INTO `ciudades` VALUES (7, 'Jinotega');
INSERT INTO `ciudades` VALUES (8, 'León');
INSERT INTO `ciudades` VALUES (9, 'Madriz');
INSERT INTO `ciudades` VALUES (10, 'Managua');
INSERT INTO `ciudades` VALUES (11, 'Masaya');
INSERT INTO `ciudades` VALUES (12, 'Matagalpa');
INSERT INTO `ciudades` VALUES (13, 'Nueva Segovia');
INSERT INTO `ciudades` VALUES (14, 'Región Autónoma Atlántico Norte');
INSERT INTO `ciudades` VALUES (15, 'Región Autónoma Atlántico Sur');
INSERT INTO `ciudades` VALUES (16, 'Rio San Juan');
INSERT INTO `ciudades` VALUES (17, 'Rivas');

-- ----------------------------
-- Table structure for comentarios
-- ----------------------------
DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios`  (
  `IdComentario` int(10) NOT NULL AUTO_INCREMENT,
  `IdCaso` int(10) NULL DEFAULT NULL,
  `Comentario` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Created_at` timestamp(0) NULL DEFAULT NULL,
  `Id_Usuario` int(10) NULL DEFAULT NULL,
  `Name_Usuario` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`IdComentario`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of comentarios
-- ----------------------------
INSERT INTO `comentarios` VALUES (15, 16, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 11:38:00', 1, 'admin');
INSERT INTO `comentarios` VALUES (16, 16, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 11:38:00', 1, 'admin');
INSERT INTO `comentarios` VALUES (17, 16, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 11:45:00', 1, 'admin');

-- ----------------------------
-- Table structure for cuentas
-- ----------------------------
DROP TABLE IF EXISTS `cuentas`;
CREATE TABLE `cuentas`  (
  `Id_Cuenta` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Comentario` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `id_usuario` int(10) NULL DEFAULT NULL,
  `estado` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`Id_Cuenta`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cuentas
-- ----------------------------
INSERT INTO `cuentas` VALUES (1, 'INISER', 'Cuenta principal', '2019-05-21 14:09:28', '2019-06-07 10:27:00', 1, 1);
INSERT INTO `cuentas` VALUES (2, 'Cuenta No2', NULL, '2019-06-06 10:34:21', '2019-06-07 10:39:04', 1, 0);
INSERT INTO `cuentas` VALUES (3, 'Cuenta 03', 'Esto serra el comentario Cuenta 03', '2019-06-07 09:02:00', '2019-06-07 10:38:51', 1, 0);
INSERT INTO `cuentas` VALUES (4, 'Cuenta 04', 'Cuenta 04 Comentarios', '2019-06-07 10:22:00', '2019-06-07 10:36:35', 1, 0);
INSERT INTO `cuentas` VALUES (5, 'GMS', 'Comentarios GMS', '2019-06-10 11:44:38', '2019-06-10 11:44:38', 1, 1);
INSERT INTO `cuentas` VALUES (6, 'Publicidad Integral', 'Comentario de Publicidad Integral', '2019-06-10 11:45:14', '2019-06-10 11:45:14', 1, 1);
INSERT INTO `cuentas` VALUES (7, 'Come', 'ccc', '2019-06-10 11:57:59', '2019-06-10 02:48:12', 1, 0);
INSERT INTO `cuentas` VALUES (8, 'ENDSCOM', 'Cuenta de desarrollo', '2019-08-26 11:58:56', '2019-08-26 11:58:56', 1, 1);

-- ----------------------------
-- Table structure for fuentes
-- ----------------------------
DROP TABLE IF EXISTS `fuentes`;
CREATE TABLE `fuentes`  (
  `idFuentes` int(10) NOT NULL AUTO_INCREMENT,
  `fNombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `id_usuario` int(10) NULL DEFAULT NULL,
  `estado` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`idFuentes`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of fuentes
-- ----------------------------
INSERT INTO `fuentes` VALUES (1, 'Facebook', '2019-05-21 14:06:56', '2019-05-21 14:06:56', 1, 1);
INSERT INTO `fuentes` VALUES (2, 'Twitter', '2019-05-21 14:06:56', '2019-05-21 14:06:56', 1, 1);
INSERT INTO `fuentes` VALUES (3, 'Youtube', '2019-05-21 14:06:56', '2019-05-21 14:06:56', 1, 1);
INSERT INTO `fuentes` VALUES (4, 'fuente', '2019-06-12 10:15:08', '2019-06-12 10:57:31', 1, 0);
INSERT INTO `fuentes` VALUES (5, 'fuente nueva', '2019-06-12 10:59:28', '2019-06-12 10:59:34', 1, 0);

-- ----------------------------
-- Table structure for log_sesion
-- ----------------------------
DROP TABLE IF EXISTS `log_sesion`;
CREATE TABLE `log_sesion`  (
  `id_log` int(6) NOT NULL AUTO_INCREMENT,
  `idUser` int(6) NOT NULL,
  `fecha` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_log`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 145 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of log_sesion
-- ----------------------------
INSERT INTO `log_sesion` VALUES (75, 1, '2019-05-22 08:53:11');
INSERT INTO `log_sesion` VALUES (76, 1, '2019-05-22 15:34:07');
INSERT INTO `log_sesion` VALUES (77, 1, '2019-05-23 08:40:08');
INSERT INTO `log_sesion` VALUES (78, 1, '2019-05-24 09:34:01');
INSERT INTO `log_sesion` VALUES (79, 1, '2019-05-27 08:19:26');
INSERT INTO `log_sesion` VALUES (80, 1, '2019-05-27 13:53:35');
INSERT INTO `log_sesion` VALUES (81, 1, '2019-05-28 09:18:56');
INSERT INTO `log_sesion` VALUES (82, 1, '2019-05-28 15:01:28');
INSERT INTO `log_sesion` VALUES (83, 1, '2019-05-28 15:54:02');
INSERT INTO `log_sesion` VALUES (84, 1, '2019-05-28 16:00:59');
INSERT INTO `log_sesion` VALUES (85, 1, '2019-05-28 16:10:43');
INSERT INTO `log_sesion` VALUES (86, 1, '2019-05-29 08:06:45');
INSERT INTO `log_sesion` VALUES (87, 1, '2019-05-29 14:34:34');
INSERT INTO `log_sesion` VALUES (88, 1, '2019-05-29 14:47:30');
INSERT INTO `log_sesion` VALUES (89, 1, '2019-05-31 08:25:45');
INSERT INTO `log_sesion` VALUES (90, 1, '2019-05-31 14:35:39');
INSERT INTO `log_sesion` VALUES (91, 1, '2019-05-31 15:52:07');
INSERT INTO `log_sesion` VALUES (92, 1, '2019-06-03 07:51:02');
INSERT INTO `log_sesion` VALUES (93, 1, '2019-06-03 16:05:00');
INSERT INTO `log_sesion` VALUES (94, 1, '2019-06-04 08:33:02');
INSERT INTO `log_sesion` VALUES (95, 1, '2019-06-04 14:46:55');
INSERT INTO `log_sesion` VALUES (96, 1, '2019-06-06 08:49:50');
INSERT INTO `log_sesion` VALUES (97, 1, '2019-06-06 11:58:00');
INSERT INTO `log_sesion` VALUES (98, 1, '2019-06-06 12:10:46');
INSERT INTO `log_sesion` VALUES (99, 1, '2019-06-06 14:56:47');
INSERT INTO `log_sesion` VALUES (100, 1, '2019-06-07 07:40:03');
INSERT INTO `log_sesion` VALUES (101, 1, '2019-06-07 11:39:53');
INSERT INTO `log_sesion` VALUES (102, 1, '2019-06-10 07:45:22');
INSERT INTO `log_sesion` VALUES (103, 1, '2019-06-10 14:41:17');
INSERT INTO `log_sesion` VALUES (104, 1, '2019-06-10 14:51:43');
INSERT INTO `log_sesion` VALUES (105, 1, '2019-06-10 14:52:53');
INSERT INTO `log_sesion` VALUES (106, 1, '2019-06-10 16:18:41');
INSERT INTO `log_sesion` VALUES (107, 1, '2019-06-11 10:47:32');
INSERT INTO `log_sesion` VALUES (108, 1, '2019-06-12 08:47:57');
INSERT INTO `log_sesion` VALUES (109, 1, '2019-06-12 11:13:30');
INSERT INTO `log_sesion` VALUES (110, 1, '2019-06-12 14:48:17');
INSERT INTO `log_sesion` VALUES (111, 1, '2019-06-13 07:50:33');
INSERT INTO `log_sesion` VALUES (112, 7, '2019-06-13 08:13:16');
INSERT INTO `log_sesion` VALUES (113, 7, '2019-06-13 08:16:33');
INSERT INTO `log_sesion` VALUES (114, 1, '2019-06-13 08:19:01');
INSERT INTO `log_sesion` VALUES (115, 1, '2019-06-13 08:36:08');
INSERT INTO `log_sesion` VALUES (116, 7, '2019-06-13 08:36:59');
INSERT INTO `log_sesion` VALUES (117, 1, '2019-06-13 08:37:58');
INSERT INTO `log_sesion` VALUES (118, 7, '2019-06-13 08:38:16');
INSERT INTO `log_sesion` VALUES (119, 1, '2019-06-13 08:38:24');
INSERT INTO `log_sesion` VALUES (120, 1, '2019-06-13 08:38:44');
INSERT INTO `log_sesion` VALUES (121, 7, '2019-06-13 08:55:57');
INSERT INTO `log_sesion` VALUES (122, 7, '2019-06-13 08:56:12');
INSERT INTO `log_sesion` VALUES (123, 1, '2019-06-13 08:57:24');
INSERT INTO `log_sesion` VALUES (124, 1, '2019-06-13 10:26:16');
INSERT INTO `log_sesion` VALUES (125, 1, '2019-06-13 14:42:58');
INSERT INTO `log_sesion` VALUES (126, 1, '2019-06-13 15:49:40');
INSERT INTO `log_sesion` VALUES (127, 1, '2019-06-14 08:02:53');
INSERT INTO `log_sesion` VALUES (128, 1, '2019-06-14 14:44:34');
INSERT INTO `log_sesion` VALUES (129, 1, '2019-06-18 08:49:25');
INSERT INTO `log_sesion` VALUES (130, 1, '2019-06-20 07:52:06');
INSERT INTO `log_sesion` VALUES (131, 1, '2019-08-26 11:54:58');
INSERT INTO `log_sesion` VALUES (132, 1, '2019-08-26 12:01:20');
INSERT INTO `log_sesion` VALUES (133, 1, '2019-09-25 08:48:51');
INSERT INTO `log_sesion` VALUES (134, 1, '2019-10-16 16:12:44');
INSERT INTO `log_sesion` VALUES (135, 1, '2019-11-25 14:20:23');
INSERT INTO `log_sesion` VALUES (136, 1, '2020-02-05 09:04:49');
INSERT INTO `log_sesion` VALUES (137, 1, '2020-02-05 09:37:37');
INSERT INTO `log_sesion` VALUES (138, 1, '2020-02-10 08:48:34');
INSERT INTO `log_sesion` VALUES (139, 1, '2020-02-10 11:00:50');
INSERT INTO `log_sesion` VALUES (140, 1, '2020-02-10 11:35:57');
INSERT INTO `log_sesion` VALUES (141, 1, '2020-03-10 14:05:07');
INSERT INTO `log_sesion` VALUES (142, 1, '2020-03-10 14:51:21');
INSERT INTO `log_sesion` VALUES (143, 1, '2020-03-20 10:21:45');
INSERT INTO `log_sesion` VALUES (144, 1, '2020-03-20 14:28:50');

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `Usuario_id` int(10) NOT NULL,
  `modules_id` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `FechaCreacion` date NULL DEFAULT NULL,
  `usuarioCU` int(10) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, '1', '2019-06-12', 1);
INSERT INTO `permissions` VALUES (2, '1', '2019-06-13', 1);
INSERT INTO `permissions` VALUES (2, '5', '2019-06-13', 1);
INSERT INTO `permissions` VALUES (7, '1', '2019-06-13', 1);
INSERT INTO `permissions` VALUES (7, '5', '2019-06-13', 1);
INSERT INTO `permissions` VALUES (1, '5', '2019-06-13', 1);
INSERT INTO `permissions` VALUES (1, '6', '2019-06-13', 1);
INSERT INTO `permissions` VALUES (1, '8', '2019-08-26', 1);

-- ----------------------------
-- Table structure for remitidos
-- ----------------------------
DROP TABLE IF EXISTS `remitidos`;
CREATE TABLE `remitidos`  (
  `Id_Remitidos` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Cargo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Id_Cuenta` int(10) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `id_usuario` int(10) NULL DEFAULT NULL,
  `estado` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`Id_Remitidos`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of remitidos
-- ----------------------------
INSERT INTO `remitidos` VALUES (1, 'Maryan01', 'Endscom@gmail.com', 'Cargo 01', 1, '2019-05-21 14:13:34', '2019-06-10 11:43:21', 1, 0);
INSERT INTO `remitidos` VALUES (2, 'Maryan Adan Espinoza Barrera', 'Endscom@gmail.com', 'Cargo 02', 1, '2019-05-21 14:13:34', '2019-06-10 11:43:23', 1, 0);
INSERT INTO `remitidos` VALUES (3, 'Maryan03', 'Endscom@gmail.com', 'Cargo 03', 1, '2019-05-21 14:13:34', '2019-06-10 11:43:27', 1, 0);
INSERT INTO `remitidos` VALUES (4, 'Maryan04', 'Endscom@gmail.com', 'Cargo 04', 1, '2019-05-21 14:13:34', '2019-06-10 11:43:31', 1, 0);
INSERT INTO `remitidos` VALUES (5, 'Maryan05', 'Endscom@gmail.com', 'Cargo 05', 1, '2019-05-21 14:13:34', '2019-06-10 11:43:34', 1, 0);
INSERT INTO `remitidos` VALUES (6, 'Remitido06', 'endscom@gmail.comn', 'Cargo 06', 2, '2019-06-06 10:34:50', '2019-06-06 10:34:53', 1, 1);
INSERT INTO `remitidos` VALUES (10, 'maryan', 'endscom@gmail.com', 'Analista&Programador', 1, '2019-06-10 11:27:23', '2019-06-10 11:37:04', 1, 0);
INSERT INTO `remitidos` VALUES (11, 'Karen Urrutia ', 'Delegado Chinandega', 'kurrutia@iniser.com,ni ', 1, '2019-06-10 11:41:48', '2019-06-10 11:41:48', 1, 1);
INSERT INTO `remitidos` VALUES (12, 'Wendolin Irias', 'Delegado Estelí', 'wirias@iniser.com.ni', 1, '2019-06-10 11:41:48', '2019-06-10 11:41:48', 1, 1);
INSERT INTO `remitidos` VALUES (13, 'Cristhiam Vargas', 'Delegado León', 'cvargasc@iniser.com.ni', 1, '2019-06-10 11:41:48', '2019-06-10 11:41:48', 1, 1);
INSERT INTO `remitidos` VALUES (14, 'Julissa Aragón', 'Delegado Juigalpa', 'jaragon@iniser.com.ni', 1, '2019-06-10 11:41:48', '2019-06-10 11:41:48', 1, 1);
INSERT INTO `remitidos` VALUES (15, 'Irene Benavidez', 'Delegado Matagalpa', 'ibenavides@iniser.com.ni', 1, '2019-06-10 11:41:48', '2019-06-10 11:41:48', 1, 1);
INSERT INTO `remitidos` VALUES (16, 'María Gabriela Renner', 'Delegado Granada', 'mrenner@iniser.com.ni', 1, '2019-06-10 11:41:48', '2019-06-10 11:41:48', 1, 1);
INSERT INTO `remitidos` VALUES (17, 'Zelena García', 'Multicentro Las Américas', 'zgarcía@iniser.com.ni', 1, '2019-06-10 11:41:48', '2019-06-10 11:41:48', 1, 1);
INSERT INTO `remitidos` VALUES (18, 'Javier Martínez', 'Jefe de Agentes de Seguros', 'jmartinezi@iniser.com.ni ', 1, '2019-06-10 11:41:48', '2019-06-10 11:41:48', 1, 1);
INSERT INTO `remitidos` VALUES (19, 'Sergio Martinez', 'Supervisor de Reclamos de Sucursaleses', 'smartinez@iniser.com.ni', 1, '2019-06-10 11:41:48', '2019-06-10 11:41:48', 1, 1);
INSERT INTO `remitidos` VALUES (20, 'Silvio Rodriguez', 'Crédito', 'credito@iniser.com.ni', 1, '2019-06-10 11:41:48', '2019-06-10 11:41:48', 1, 1);
INSERT INTO `remitidos` VALUES (21, 'Waleska Núñez', 'Microseguro', 'wnunez@iniser.com.ni ', 1, '2019-06-10 11:41:48', '2019-06-10 11:41:48', 1, 1);
INSERT INTO `remitidos` VALUES (22, 'Rogelio Bermúdez ', 'Seguro Agropecuario', 'jbermudez@iniser.com.ni', 1, '2019-06-10 11:41:48', '2019-06-10 11:41:48', 1, 1);
INSERT INTO `remitidos` VALUES (23, 'Ing.Maryan', 'endscom@gmail.com', 'sistemas', 1, '2019-06-13 03:39:31', '2019-06-13 03:47:08', 1, 0);
INSERT INTO `remitidos` VALUES (24, 'Ing.Espinozza', 'endscom@gmail.com', 'Dueño', 8, '2019-08-26 12:00:23', '2019-08-26 12:00:23', 1, 1);

-- ----------------------------
-- Table structure for tipos
-- ----------------------------
DROP TABLE IF EXISTS `tipos`;
CREATE TABLE `tipos`  (
  `IdTipos` int(10) NOT NULL AUTO_INCREMENT,
  `tpNombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `id_usuario` int(10) NULL DEFAULT NULL,
  `estado` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`IdTipos`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tipos
-- ----------------------------
INSERT INTO `tipos` VALUES (1, 'Cotización', '2019-05-21 14:06:56', '2019-05-21 14:06:56', 1, 1);
INSERT INTO `tipos` VALUES (2, 'Reclamo', '2019-05-21 14:06:56', '2019-05-21 14:06:56', 1, 1);
INSERT INTO `tipos` VALUES (3, 'tipo', '2019-06-12 10:15:01', '2019-06-12 10:57:29', 1, 0);
INSERT INTO `tipos` VALUES (4, 'param', '2019-06-12 10:58:12', '2019-06-12 10:58:15', 1, 0);

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rol` bit(1) NULL DEFAULT NULL,
  `estado` bit(1) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `id_usuario` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`idUser`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 'admin', '123456', 'admin', b'0', b'1', '2019-05-23 11:22:12', '2019-05-23 11:22:12', 1);
INSERT INTO `usuarios` VALUES (2, 'dd', '123456', 'cualquiera', b'1', b'1', '2019-05-23 11:22:12', '2019-05-23 11:22:12', 1);
INSERT INTO `usuarios` VALUES (3, 'dd', '123456', 'cualquiera', b'1', b'0', '2019-05-23 11:22:12', '2019-06-12 03:31:05', 1);
INSERT INTO `usuarios` VALUES (5, 'dd', '123456', 'cualquiera 454545', b'1', b'0', '2019-05-23 11:22:12', '2019-06-12 03:31:02', 1);
INSERT INTO `usuarios` VALUES (6, 'dd', '123456', 'cualquiera 454545', b'1', b'0', '2019-05-23 11:22:12', '2019-06-12 03:31:00', 1);
INSERT INTO `usuarios` VALUES (7, 'marangelo', '123456', 'Maryan Espinoza', b'1', b'1', '2019-06-12 11:53:53', '2019-06-12 03:30:54', 1);

-- ----------------------------
-- View structure for vstcuentasusuarios
-- ----------------------------
DROP VIEW IF EXISTS `vstcuentasusuarios`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `vstcuentasusuarios` AS SELECT
	T0.idUser,
	T0.userName,
	T0.`password`,
	T0.nombre,
	T0.rol,
	estado,
	T0.created_at,
	T0.updated_at,
	T0.id_usuario, 
IFNULL((SELECT T1.Cuentas FROM vstpermisos T1 WHERE T0.idUser=T1.Usuario_id),0) AS Cuentas
FROM
	usuarios T0 ;

-- ----------------------------
-- View structure for vstpermisos
-- ----------------------------
DROP VIEW IF EXISTS `vstpermisos`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `vstpermisos` AS SELECT
	T0.Usuario_id,
	GROUP_CONCAT( T0.modules_id) AS Cuentas 
FROM
	permissions T0 
GROUP BY
	T0.Usuario_id ;

-- ----------------------------
-- View structure for vstsolicitudes
-- ----------------------------
DROP VIEW IF EXISTS `vstsolicitudes`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `vstsolicitudes` AS SELECT
	T0.idCaso,
	T0.Nombres,
	T0.Apellidos,
	T0.Telefono,
	T0.Correo,
	T0.Id_Cuenta as IdCuenta,
	(SELECT T1.Nombre FROM cuentas T1 WHERE T1.Id_Cuenta=T0.Id_Cuenta) AS Id_Cuenta,
	(SELECT T2.fNombre FROM fuentes T2 WHERE T2.idFuentes = T0.Id_Fuente) AS Id_Fuente,
	T0.Id_Tipo As IdTipo,
	(SELECT T3.tpNombre FROM tipos T3 WHERE T3.IdTipos = T0.Id_Tipo) AS Id_Tipo,
	T0.Id_Categoria AS IdCat,
	(SELECT T4.Nombre FROM categorias T4 WHERE T4.Id_Categorias = T0.Id_Categoria) AS Id_Categoria,	
	T0.Id_Asignado as IdAsig, 
	(SELECT T5.Nombre FROM remitidos T5 WHERE T5.Id_Remitidos = T0.Id_Asignado) AS Id_Asignado,	
	T0.Id_Ciudad as IdCiudad,
	(SELECT T6.NombreCiudad FROM ciudades T6 WHERE T6.IdCiudad = T0.Id_Ciudad) AS Id_Ciudad,	
	
	T0.Comentarios,
	T0.created_at,
	T0.updated_at,
	T0.id_usuario ,
	T0.estado
FROM
	casos T0 ;

SET FOREIGN_KEY_CHECKS = 1;

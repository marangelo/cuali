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

 Date: 07/06/2019 14:42:59
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
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of casos
-- ----------------------------
INSERT INTO `casos` VALUES (16, 'Maryan Adan', 'Barrera', 82449100, 'endscom@gmail.com', 1, 3, 2, 3, 2, 3, 2500.00, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\n\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '2019-06-06 00:00:00', '2019-06-06 11:38:31', 1, 1);

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
  PRIMARY KEY (`Id_Categorias`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES (1, 'CATEGORIA INISSER 01', 1, '2019-05-21 14:11:12', '2019-05-21 14:11:12', 1);
INSERT INTO `categorias` VALUES (2, 'CATEGORIA INISSER 02', 1, '2019-05-21 14:11:12', '2019-05-21 14:11:12', 1);
INSERT INTO `categorias` VALUES (3, 'CATEGORIA INISSER DE LA CUENTA INISER', 1, '2019-05-21 14:11:12', '2019-05-21 14:11:12', 1);
INSERT INTO `categorias` VALUES (4, 'CATEGORIA INISSER 04', 1, '2019-05-21 14:11:12', '2019-05-21 14:11:12', 1);
INSERT INTO `categorias` VALUES (5, 'CATEGORIA INISSER 04', 1, '2019-05-21 14:11:12', '2019-05-21 14:11:12', 1);
INSERT INTO `categorias` VALUES (6, 'CATEGORIA INISSER 06', 1, '2019-05-21 14:11:12', '2019-05-21 14:11:12', 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cuentas
-- ----------------------------
INSERT INTO `cuentas` VALUES (1, 'INISER', 'Cuenta principal', '2019-05-21 14:09:28', '2019-06-07 10:27:00', 1, 1);
INSERT INTO `cuentas` VALUES (2, 'Cuenta No2', NULL, '2019-06-06 10:34:21', '2019-06-07 10:39:04', 1, 0);
INSERT INTO `cuentas` VALUES (3, 'Cuenta 03', 'Esto serra el comentario Cuenta 03', '2019-06-07 09:02:00', '2019-06-07 10:38:51', 1, 0);
INSERT INTO `cuentas` VALUES (4, 'Cuenta 04', 'Cuenta 04 Comentarios', '2019-06-07 10:22:00', '2019-06-07 10:36:35', 1, 0);

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
  PRIMARY KEY (`idFuentes`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of fuentes
-- ----------------------------
INSERT INTO `fuentes` VALUES (1, 'Facebook', '2019-05-21 14:06:56', '2019-05-21 14:06:56', 1);
INSERT INTO `fuentes` VALUES (2, 'Twitter', '2019-05-21 14:06:56', '2019-05-21 14:06:56', 1);
INSERT INTO `fuentes` VALUES (3, 'Youtube', '2019-05-21 14:06:56', '2019-05-21 14:06:56', 1);

-- ----------------------------
-- Table structure for log_sesion
-- ----------------------------
DROP TABLE IF EXISTS `log_sesion`;
CREATE TABLE `log_sesion`  (
  `id_log` int(6) NOT NULL AUTO_INCREMENT,
  `idUser` int(6) NOT NULL,
  `fecha` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_log`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 102 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
  PRIMARY KEY (`Id_Remitidos`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of remitidos
-- ----------------------------
INSERT INTO `remitidos` VALUES (1, 'Maryan01', 'Endscom@gmail.com', 'Cargo 01', 1, '2019-05-21 14:13:34', '2019-05-21 14:13:39', 1);
INSERT INTO `remitidos` VALUES (2, 'Maryan Adan Espinoza Barrera', 'Endscom@gmail.com', 'Cargo 02', 1, '2019-05-21 14:13:34', '2019-05-21 14:13:39', 1);
INSERT INTO `remitidos` VALUES (3, 'Maryan03', 'Endscom@gmail.com', 'Cargo 03', 1, '2019-05-21 14:13:34', '2019-05-21 14:13:39', 1);
INSERT INTO `remitidos` VALUES (4, 'Maryan04', 'Endscom@gmail.com', 'Cargo 04', 1, '2019-05-21 14:13:34', '2019-05-21 14:13:39', 1);
INSERT INTO `remitidos` VALUES (5, 'Maryan05', 'Endscom@gmail.com', 'Cargo 05', 1, '2019-05-21 14:13:34', '2019-05-21 14:13:39', 1);
INSERT INTO `remitidos` VALUES (6, 'Remitido06', 'endscom@gmail.comn', 'Cargo 06', 2, '2019-06-06 10:34:50', '2019-06-06 10:34:53', 1);

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
  PRIMARY KEY (`IdTipos`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tipos
-- ----------------------------
INSERT INTO `tipos` VALUES (1, 'Cotización', '2019-05-21 14:06:56', '2019-05-21 14:06:56', 1);
INSERT INTO `tipos` VALUES (2, 'Reclamo', '2019-05-21 14:06:56', '2019-05-21 14:06:56', 1);

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
  `activo` bit(1) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `id_usuario` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`idUser`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 'admin', '123456', 'admin', b'0', b'1', '2019-05-23 11:22:12', '2019-05-23 11:22:12', 1);
INSERT INTO `usuarios` VALUES (2, 'dd', '123456', 'cualquiera', b'1', b'1', '2019-05-23 11:22:12', '2019-05-23 11:22:12', 1);
INSERT INTO `usuarios` VALUES (3, 'dd', '123456', 'cualquiera', b'1', b'1', '2019-05-23 11:22:12', '2019-05-23 11:22:12', 1);
INSERT INTO `usuarios` VALUES (5, 'dd', '123456', 'cualquiera 454545', b'1', b'1', '2019-05-23 11:22:12', '2019-05-23 11:22:12', 1);
INSERT INTO `usuarios` VALUES (6, 'dd', '123456', 'cualquiera 454545', b'1', b'1', '2019-05-23 11:22:12', '2019-05-23 11:22:12', 1);

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
	(SELECT T1.Nombre FROM cuentas T1 WHERE T1.Id_Cuenta=T0.Id_Cuenta) AS Id_Cuenta,
	(SELECT T2.fNombre FROM fuentes T2 WHERE T2.idFuentes = T0.Id_Fuente) AS Id_Fuente,
	(SELECT T3.tpNombre FROM tipos T3 WHERE T3.IdTipos = T0.Id_Tipo) AS Id_Tipo,
	(SELECT T4.Nombre FROM categorias T4 WHERE T4.Id_Categorias = T0.Id_Categoria) AS Id_Categoria,	
	(SELECT T5.Nombre FROM remitidos T5 WHERE T5.Id_Remitidos = T0.Id_Asignado) AS Id_Asignado,	
	T0.Comentarios,
	T0.created_at,
	T0.updated_at,
	T0.id_usuario ,
	T0.estado
FROM
	casos T0 ;

SET FOREIGN_KEY_CHECKS = 1;

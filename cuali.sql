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

 Date: 27/05/2019 16:10:27
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
  `Comentarios` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `id_usuario` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`idCaso`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of casos
-- ----------------------------
INSERT INTO `casos` VALUES (1, 'Maryan', 'Espinoza', 82449100, 'endscom@gmail.com', 1, 1, 1, 1, 1, 'dddd', '2019-05-27 00:00:00', '2019-05-27 00:00:00', 1);

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
INSERT INTO `categorias` VALUES (3, 'CATEGORIA INISSER 03', 1, '2019-05-21 14:11:12', '2019-05-21 14:11:12', 1);
INSERT INTO `categorias` VALUES (4, 'CATEGORIA INISSER 04', 1, '2019-05-21 14:11:12', '2019-05-21 14:11:12', 1);
INSERT INTO `categorias` VALUES (5, 'CATEGORIA INISSER 04', 1, '2019-05-21 14:11:12', '2019-05-21 14:11:12', 1);
INSERT INTO `categorias` VALUES (6, 'CATEGORIA INISSER 06', 1, '2019-05-21 14:11:12', '2019-05-21 14:11:12', 1);

-- ----------------------------
-- Table structure for cuentas
-- ----------------------------
DROP TABLE IF EXISTS `cuentas`;
CREATE TABLE `cuentas`  (
  `Id_Cuenta` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `id_usuario` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`Id_Cuenta`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cuentas
-- ----------------------------
INSERT INTO `cuentas` VALUES (1, 'INISSER', '2019-05-21 14:09:28', '2019-05-21 14:09:31', 1);
INSERT INTO `cuentas` VALUES (2, 'INISSER', '2019-05-21 14:09:28', '2019-05-21 14:09:31', 1);
INSERT INTO `cuentas` VALUES (3, 'INISSER', '2019-05-21 14:09:28', '2019-05-21 14:09:31', 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 81 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of log_sesion
-- ----------------------------
INSERT INTO `log_sesion` VALUES (75, 1, '2019-05-22 08:53:11');
INSERT INTO `log_sesion` VALUES (76, 1, '2019-05-22 15:34:07');
INSERT INTO `log_sesion` VALUES (77, 1, '2019-05-23 08:40:08');
INSERT INTO `log_sesion` VALUES (78, 1, '2019-05-24 09:34:01');
INSERT INTO `log_sesion` VALUES (79, 1, '2019-05-27 08:19:26');
INSERT INTO `log_sesion` VALUES (80, 1, '2019-05-27 13:53:35');

-- ----------------------------
-- Table structure for remitidos
-- ----------------------------
DROP TABLE IF EXISTS `remitidos`;
CREATE TABLE `remitidos`  (
  `Id_Remitidos` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Id_Cuenta` int(10) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `id_usuario` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`Id_Remitidos`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of remitidos
-- ----------------------------
INSERT INTO `remitidos` VALUES (1, 'Maryan01', 'Endscom@gmail.com', 1, '2019-05-21 14:13:34', '2019-05-21 14:13:39', 1);
INSERT INTO `remitidos` VALUES (2, 'Maryan02', 'Endscom@gmail.com', 1, '2019-05-21 14:13:34', '2019-05-21 14:13:39', 1);
INSERT INTO `remitidos` VALUES (3, 'Maryan03', 'Endscom@gmail.com', 1, '2019-05-21 14:13:34', '2019-05-21 14:13:39', 1);
INSERT INTO `remitidos` VALUES (4, 'Maryan04', 'Endscom@gmail.com', 1, '2019-05-21 14:13:34', '2019-05-21 14:13:39', 1);
INSERT INTO `remitidos` VALUES (5, 'Maryan05', 'Endscom@gmail.com', 1, '2019-05-21 14:13:34', '2019-05-21 14:13:39', 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tipos
-- ----------------------------
INSERT INTO `tipos` VALUES (1, 'Consulta', '2019-05-21 14:06:56', '2019-05-21 14:06:56', 1);
INSERT INTO `tipos` VALUES (2, 'Cotización', '2019-05-21 14:06:56', '2019-05-21 14:06:56', 1);
INSERT INTO `tipos` VALUES (3, 'Reclamo', '2019-05-21 14:06:56', '2019-05-21 14:06:56', 1);

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

SET FOREIGN_KEY_CHECKS = 1;

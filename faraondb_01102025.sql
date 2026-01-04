/*
Navicat MySQL Data Transfer

Source Server         : cnx
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : faraondb

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2025-10-02 00:06:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `anulaciones_ventas`
-- ----------------------------
DROP TABLE IF EXISTS `anulaciones_ventas`;
CREATE TABLE `anulaciones_ventas` (
  `anulacion_id` int(11) NOT NULL AUTO_INCREMENT,
  `venta_id` int(11) DEFAULT NULL,
  `fecha_anulacion` datetime NOT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `total_venta` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`anulacion_id`),
  KEY `venta_id` (`venta_id`),
  CONSTRAINT `anulaciones_ventas_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`venta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of anulaciones_ventas
-- ----------------------------

-- ----------------------------
-- Table structure for `categorias`
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `subcategoria_id` int(11) NOT NULL,
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES ('1', 'OFERTAS', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('2', 'AXE', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('3', 'BABYSEC', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('4', 'BANDEO', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('5', 'DOVE', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('6', 'ELITE', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('7', 'FAM', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('8', 'HUGGIES', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('9', 'JOHNSON', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('10', 'KOTEX', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('11', 'LADYSOFT', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('12', 'LIZ', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('13', 'LUX', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('14', 'NOSOTRAS', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('15', 'PEPSODENT', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('16', 'PLENITUD', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('17', 'PONDS', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('18', 'REXONA', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('19', 'SCOTT', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('20', 'SECOS', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('21', 'SEDAL', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('22', 'ST IVES', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('23', 'ALPINA', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('24', 'BBYL', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('25', 'CUREBAND', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('26', 'KY', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('27', 'CERO', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('28', 'OFF', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('29', 'VEET', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('30', 'ALGABO', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('31', 'LEXI', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('32', 'NOVA', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('33', 'NUMBER 1', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('34', 'ROYAL', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('35', 'SEPTONA', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('36', 'SUNLESS', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('37', 'TULIPAN', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('38', 'DAMI', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('39', 'NINET', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('40', 'AVAL', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('41', 'OMO', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('42', 'CLOSE UP', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('43', 'DICLOFENACO', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('44', 'CARIÑOSITOS', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('45', 'OLA', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('46', 'KIMBERLY', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('47', 'KIMBERLY', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('48', 'MEDICAMENTOS', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('49', 'NO FARMA ', '2025-03-23 10:20:39', '0');
INSERT INTO `categorias` VALUES ('52', 'MIXES V2', '2025-03-24 23:54:48', '0');
INSERT INTO `categorias` VALUES ('53', 'PORTATILES', '2025-07-08 22:43:36', '0');

-- ----------------------------
-- Table structure for `clientes`
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `zona` varchar(100) DEFAULT '',
  `direccion` text DEFAULT NULL,
  `nit` varchar(20) NOT NULL,
  `nombre_empresa` varchar(100) DEFAULT NULL,
  `latitud` decimal(9,6) DEFAULT NULL,
  `longitud` decimal(9,6) DEFAULT NULL,
  `usuario` text DEFAULT NULL,
  `tipo_empresa` text DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `categoria` varchar(1) NOT NULL DEFAULT 'C',
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES ('1', 'TAURUS', '70120569', 'SOPOCACHI', 'FINAL RG Nro 200', '3435766', 'ANTONY MORALES', null, null, null, 'BAZAR', '2025-10-02', '1', 'B');
INSERT INTO `clientes` VALUES ('3', 'PEDROINHO', '74273382', '', 'COCHABAMBA 1', '', 'PEDRO HARD ROCK SRL', null, null, null, 'PRIVADA', '2025-04-28', '1', 'C');
INSERT INTO `clientes` VALUES ('4', 'DATASYSTEM SA', '59170845623', '', 'EL ALTO SANTIAGO II', '', 'DATASYSTEM', null, null, null, 'PRIVADA', '2025-07-09', '1', 'C');
INSERT INTO `clientes` VALUES ('5', 'OSCAR GUZMAN', '70548964', '', 'EL ALTO BALLIVIAN #78', '', 'MAGNATE SRL', null, null, null, 'PRIVADA', '2025-10-02', '1', 'A');

-- ----------------------------
-- Table structure for `compras`
-- ----------------------------
DROP TABLE IF EXISTS `compras`;
CREATE TABLE `compras` (
  `compra_id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_compra` datetime NOT NULL,
  `proveedor_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` enum('activo','anulado') DEFAULT 'activo',
  PRIMARY KEY (`compra_id`),
  KEY `proveedor_id` (`proveedor_id`),
  CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`proveedor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of compras
-- ----------------------------

-- ----------------------------
-- Table structure for `contador_ventas`
-- ----------------------------
DROP TABLE IF EXISTS `contador_ventas`;
CREATE TABLE `contador_ventas` (
  `contador_id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `total_ventas` int(11) NOT NULL,
  `total_monto` decimal(10,2) NOT NULL,
  PRIMARY KEY (`contador_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of contador_ventas
-- ----------------------------

-- ----------------------------
-- Table structure for `detalle_actualiza_producto`
-- ----------------------------
DROP TABLE IF EXISTS `detalle_actualiza_producto`;
CREATE TABLE `detalle_actualiza_producto` (
  `detalle_actualiza_id` int(11) NOT NULL AUTO_INCREMENT,
  `actualiza_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_compra` decimal(10,2) NOT NULL DEFAULT 0.00,
  `precio_venta` decimal(10,2) NOT NULL DEFAULT 0.00,
  `precio_feria` decimal(10,2) NOT NULL DEFAULT 0.00,
  `documento` text DEFAULT NULL,
  `codigo_producto` varchar(50) NOT NULL,
  `fecha_actualiza` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `observa_actualiza` text DEFAULT NULL,
  `proveedor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`detalle_actualiza_id`),
  KEY `compra_id` (`actualiza_id`),
  KEY `producto_id` (`producto_id`),
  CONSTRAINT `detalle_actualiza_producto_ibfk_1` FOREIGN KEY (`actualiza_id`) REFERENCES `compras` (`compra_id`),
  CONSTRAINT `detalle_actualiza_producto_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of detalle_actualiza_producto
-- ----------------------------
INSERT INTO `detalle_actualiza_producto` VALUES ('1', null, null, '0', '50.00', '49.00', '47.00', 'gg', '11001', '2025-05-09 00:00:00', 'FFFF', '2');
INSERT INTO `detalle_actualiza_producto` VALUES ('2', null, null, '0', '28.00', '29.50', '29.00', 'fac 7010', 'p23423', '2025-05-09 00:00:00', 'NO CAMBIO EL PRECIO DE VENTA SIMBOLICAMENTE', '1');
INSERT INTO `detalle_actualiza_producto` VALUES ('3', null, null, '50', '45.90', '52.00', '50.00', 'not 6', 'P600BL', '2025-05-09 00:00:00', '', '3');
INSERT INTO `detalle_actualiza_producto` VALUES ('4', null, null, '13', '8000.00', '8500.00', '8200.00', 'factura 500', '202507001', '2025-07-11 00:00:00', '', '4');
INSERT INTO `detalle_actualiza_producto` VALUES ('5', null, null, '54', '2550.00', '2800.00', '2600.00', 'fac 69', '202507004', '2025-08-01 00:00:00', 'MODIFICACION DEL PRECIO DE COMPRA DOLAR', '4');
INSERT INTO `detalle_actualiza_producto` VALUES ('6', null, null, '16', '11000.00', '11200.00', '11100.00', '900', '20250711003', '2025-08-02 00:00:00', '', '3');

-- ----------------------------
-- Table structure for `detalle_compras`
-- ----------------------------
DROP TABLE IF EXISTS `detalle_compras`;
CREATE TABLE `detalle_compras` (
  `detalle_compra_id` int(11) NOT NULL AUTO_INCREMENT,
  `compra_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `documento` text DEFAULT NULL,
  PRIMARY KEY (`detalle_compra_id`),
  KEY `compra_id` (`compra_id`),
  KEY `producto_id` (`producto_id`),
  CONSTRAINT `detalle_compras_ibfk_1` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`compra_id`),
  CONSTRAINT `detalle_compras_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of detalle_compras
-- ----------------------------

-- ----------------------------
-- Table structure for `detalle_ofertas`
-- ----------------------------
DROP TABLE IF EXISTS `detalle_ofertas`;
CREATE TABLE `detalle_ofertas` (
  `detalle_oferta_id` int(11) NOT NULL AUTO_INCREMENT,
  `oferta_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `nro_oferta` varchar(8) NOT NULL,
  `codigo_producto` varchar(50) NOT NULL,
  `cod_productoID` int(11) NOT NULL,
  `total_producto` decimal(10,2) NOT NULL,
  PRIMARY KEY (`detalle_oferta_id`),
  KEY `oferta_id` (`oferta_id`),
  KEY `producto_id` (`producto_id`),
  CONSTRAINT `detalle_ofertas_ibfk_1` FOREIGN KEY (`oferta_id`) REFERENCES `ofertas` (`oferta_id`),
  CONSTRAINT `detalle_ofertas_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of detalle_ofertas
-- ----------------------------
INSERT INTO `detalle_ofertas` VALUES ('1', null, null, '5', '276.44', '00000005', '9342007109', '2', '0.00');
INSERT INTO `detalle_ofertas` VALUES ('2', null, null, '5', '79.92', '00000005', '9342006084', '1', '0.00');
INSERT INTO `detalle_ofertas` VALUES ('3', null, null, '10', '26.54', '00000006', '9342006504', '2', '0.00');
INSERT INTO `detalle_ofertas` VALUES ('4', null, null, '10', '10.25', '00000006', '9342018900', '1', '0.00');
INSERT INTO `detalle_ofertas` VALUES ('6', null, null, '10', '48.00', '00000007', '12001', '1', '0.00');
INSERT INTO `detalle_ofertas` VALUES ('7', null, null, '5', '55.29', '00000008', '9342007109', '2', '0.00');
INSERT INTO `detalle_ofertas` VALUES ('8', null, null, '5', '45.00', '00000008', '9342000060', '1', '0.00');
INSERT INTO `detalle_ofertas` VALUES ('9', null, null, '2', '2700.00', '00000009', '202507004', '2', '0.00');
INSERT INTO `detalle_ofertas` VALUES ('10', null, null, '2', '19440.00', '00000009', '202507003', '1', '0.00');
INSERT INTO `detalle_ofertas` VALUES ('11', null, null, '2', '19440.00', '00000010', '202507003', '3', '0.00');
INSERT INTO `detalle_ofertas` VALUES ('12', null, null, '2', '2700.00', '00000010', '202507004', '2', '0.00');
INSERT INTO `detalle_ofertas` VALUES ('13', null, null, '2', '12100.00', '00000010', '20250711003', '1', '0.00');
INSERT INTO `detalle_ofertas` VALUES ('14', null, null, '4', '8800.00', '00000011', '202507001', '2', '0.00');
INSERT INTO `detalle_ofertas` VALUES ('15', null, null, '4', '2700.00', '00000011', '202507004', '1', '0.00');
INSERT INTO `detalle_ofertas` VALUES ('16', null, null, '2', '12100.00', '00000012', '20250711003', '1', '0.00');
INSERT INTO `detalle_ofertas` VALUES ('17', null, null, '4', '2700.00', '00000013', '202507004', '2', '10800.00');
INSERT INTO `detalle_ofertas` VALUES ('18', null, null, '4', '12100.00', '00000013', '20250711003', '1', '48400.00');
INSERT INTO `detalle_ofertas` VALUES ('19', null, null, '4', '2700.00', '00000014', '202507004', '2', '10800.00');
INSERT INTO `detalle_ofertas` VALUES ('20', null, null, '4', '12100.00', '00000014', '20250711003', '1', '48400.00');
INSERT INTO `detalle_ofertas` VALUES ('21', null, null, '6', '19440.00', '00000015', '202507003', '2', '0.00');
INSERT INTO `detalle_ofertas` VALUES ('22', null, null, '8', '2700.00', '00000015', '202507004', '1', '21600.00');
INSERT INTO `detalle_ofertas` VALUES ('23', null, null, '10', '12100.00', '00000016', '20250711003', '2', '121000.00');
INSERT INTO `detalle_ofertas` VALUES ('24', null, null, '5', '2700.00', '00000016', '202507004', '1', '13500.00');

-- ----------------------------
-- Table structure for `detalle_ventas`
-- ----------------------------
DROP TABLE IF EXISTS `detalle_ventas`;
CREATE TABLE `detalle_ventas` (
  `detalle_venta_id` int(11) NOT NULL AUTO_INCREMENT,
  `venta_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `oferta_id` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento_porcentual` decimal(5,2) DEFAULT 0.00,
  `nro_boleta` varchar(8) NOT NULL,
  `codigo_producto` varchar(50) NOT NULL DEFAULT '',
  `codProducto` int(11) DEFAULT NULL,
  `total_producto` decimal(10,2) NOT NULL,
  PRIMARY KEY (`detalle_venta_id`),
  KEY `venta_id` (`venta_id`),
  KEY `producto_id` (`producto_id`),
  KEY `oferta_id` (`oferta_id`),
  CONSTRAINT `detalle_ventas_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`venta_id`),
  CONSTRAINT `detalle_ventas_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`),
  CONSTRAINT `detalle_ventas_ibfk_3` FOREIGN KEY (`oferta_id`) REFERENCES `ofertas` (`oferta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of detalle_ventas
-- ----------------------------
INSERT INTO `detalle_ventas` VALUES ('19', null, '17', null, '3', '76.00', '0.00', '00000001', '9342023280', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('20', null, '8', null, '3', '31.32', '0.00', '00000001', '9342011040', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('21', null, '23', null, '3', '201.00', '0.00', '00000001', 'TR001', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('22', null, '15', null, '1', '87.98', '0.00', '00000001', '9342006430', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('23', null, '4', null, '3', '184.00', '0.00', '00000001', '9342007109', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('24', null, '3', null, '1', '73.77', '0.00', '00000001', '9342006890', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('25', null, '6', null, '4', '134.00', '0.00', '00000002', '9342005241', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('26', null, '3', null, '5', '368.00', '0.00', '00000002', '9342006890', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('27', null, '10', null, '6', '63.00', '0.00', '00000003', '9342012120', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('28', null, '11', null, '1', '10.25', '0.00', '00000003', '9342018900', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('29', null, '1', null, '5', '225.00', '0.00', '00000003', '9342000060', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('30', null, '12', null, '1', '37.01', '0.00', '00000004', '9342023982', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('31', null, '6', null, '1', '33.60', '0.00', '00000004', '9342005241', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('32', null, '2', null, '1', '17.76', '0.00', '00000004', '9342006084', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('36', null, '13', null, '2', '4.30', '0.00', '00000008', '30227984', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('37', null, '12', null, '4', '148.04', '0.00', '00000008', '9342023982', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('38', null, '17', null, '5', '128.30', '0.00', '00000009', '9342023280', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('40', null, '5', null, '6', '157.00', '0.00', '00000009', '9342008960', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('41', null, '1', null, '9', '405.00', '0.00', '00000010', '9342000060', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('42', null, '2', null, '10', '177.60', '0.00', '00000011', '9342006084', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('47', null, '27', null, '2', '203.84', '0.00', '00000014', '10010', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('48', null, '1', null, '2', '45.00', '0.00', '00000014', '9342000060', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('49', null, '27', null, '3', '305.76', '0.00', '00000015', '10010', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('50', null, '1', null, '5', '225.00', '0.00', '00000016', '9342000060', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('51', null, '27', null, '5', '203.84', '0.00', '00000016', '10010', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('52', null, '27', null, '5', '509.60', '0.00', '00000017', '10010', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('54', null, '12', null, '6', '210.96', '0.00', '00000018', '9342023982', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('55', null, '2', null, '3', '47.95', '0.00', '00000018', '9342006084', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('56', null, '27', null, '10', '1019.20', '0.00', '00000019', '10010', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('57', null, '27', null, '10', '1019.20', '0.00', '00000020', '10010', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('58', null, '28', null, '10', '495.00', '0.00', '00000020', '11001', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('59', null, '1', null, '10', '450.00', '0.00', '00000021', '9342000060', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('60', null, '27', null, '10', '1019.20', '0.00', '00000021', '10010', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('61', null, '28', null, '5', '235.13', '0.00', '00000022', '11001', null, '0.00');
INSERT INTO `detalle_ventas` VALUES ('62', null, '1', null, '10', '450.00', '0.00', '00000023', '9342000060', '1', '0.00');
INSERT INTO `detalle_ventas` VALUES ('66', null, '30', null, '5', '170.50', '0.00', '00000025', '15001', '1', '0.00');
INSERT INTO `detalle_ventas` VALUES ('67', null, '30', null, '5', '139.50', '0.00', '00000026', '15001', '2', '0.00');
INSERT INTO `detalle_ventas` VALUES ('68', null, '1', null, '5', '180.00', '0.00', '00000026', '9342000060', '1', '0.00');
INSERT INTO `detalle_ventas` VALUES ('69', null, '24', null, '10', '472.50', '0.00', '00000027', 'P600BL', '4', '0.00');
INSERT INTO `detalle_ventas` VALUES ('70', null, '13', null, '10', '21.50', '0.00', '00000027', '30227984', '3', '0.00');
INSERT INTO `detalle_ventas` VALUES ('71', null, '10', null, '10', '106.50', '0.00', '00000027', '9342012120', '2', '0.00');
INSERT INTO `detalle_ventas` VALUES ('72', null, '1', null, '10', '450.00', '0.00', '00000027', '9342000060', '1', '0.00');
INSERT INTO `detalle_ventas` VALUES ('78', null, '10', null, '5', '0.00', '0.00', '00000030', '9342012120', '2', '42.60');
INSERT INTO `detalle_ventas` VALUES ('79', null, '2', null, '5', '0.00', '0.00', '00000030', '9342006084', '1', '88.80');
INSERT INTO `detalle_ventas` VALUES ('80', null, '27', null, '5', '0.00', '0.00', '00000031', '10010', '3', '484.12');
INSERT INTO `detalle_ventas` VALUES ('81', null, '17', null, '1', '0.00', '0.00', '00000031', '9342023280', '2', '23.09');
INSERT INTO `detalle_ventas` VALUES ('82', null, '1', null, '10', '0.00', '0.00', '00000031', '9342000060', '1', '360.00');
INSERT INTO `detalle_ventas` VALUES ('83', null, '1', null, '10', '36.00', '0.00', '00000032', '9342000060', '1', '360.00');
INSERT INTO `detalle_ventas` VALUES ('84', null, '28', null, '2', '99.00', '5.00', '00000033', '11001', '3', '47.03');
INSERT INTO `detalle_ventas` VALUES ('85', null, '2', null, '2', '35.52', '10.00', '00000033', '9342006084', '2', '15.98');
INSERT INTO `detalle_ventas` VALUES ('86', null, '1', null, '3', '135.00', '5.00', '00000033', '9342000060', '1', '85.50');
INSERT INTO `detalle_ventas` VALUES ('87', null, '30', null, '10', '306.90', '0.00', '00000034', '15001', '2', '0.00');
INSERT INTO `detalle_ventas` VALUES ('88', null, '1', null, '10', '405.00', '0.00', '00000034', '9342000060', '1', '0.00');
INSERT INTO `detalle_ventas` VALUES ('89', null, '29', null, '10', '13.44', '0.00', '00000035', '11500', '2', '134.40');
INSERT INTO `detalle_ventas` VALUES ('90', null, '28', null, '10', '49.50', '5.00', '00000035', '11001', '1', '495.00');
INSERT INTO `detalle_ventas` VALUES ('91', null, '2', null, '10', '7.10', '10.00', '00000036', '9342006084', '2', '63.90');
INSERT INTO `detalle_ventas` VALUES ('92', null, '1', null, '10', '45.00', '5.00', '00000036', '9342000060', '1', '427.50');
INSERT INTO `detalle_ventas` VALUES ('93', null, '2', null, '5', '14.21', '5.00', '00000037', '9342006084', '2', '67.50');
INSERT INTO `detalle_ventas` VALUES ('94', null, '1', null, '10', '36.00', '5.00', '00000037', '9342000060', '1', '342.00');
INSERT INTO `detalle_ventas` VALUES ('95', null, '28', null, '10', '49.50', '5.00', '00000038', '11001', '1', '470.25');
INSERT INTO `detalle_ventas` VALUES ('96', null, '1', null, '2', '47.50', '5.00', '00000039', '9342000060', '1', '95.00');
INSERT INTO `detalle_ventas` VALUES ('97', null, '2', null, '5', '17.76', '10.00', '00000040', '9342006084', '1', '79.92');
INSERT INTO `detalle_ventas` VALUES ('98', null, '32', null, '99', '20.71', '0.00', '00000041', '19051669', '1', '2050.29');
INSERT INTO `detalle_ventas` VALUES ('99', null, '10', null, '10', '10.65', '0.00', '00000042', '9342012120', '2', '106.50');
INSERT INTO `detalle_ventas` VALUES ('100', null, '2', null, '1', '17.76', '10.00', '00000042', '9342006084', '1', '15.98');
INSERT INTO `detalle_ventas` VALUES ('101', null, '28', null, '1', '49.50', '5.00', '00000043', '11001', '3', '47.03');
INSERT INTO `detalle_ventas` VALUES ('102', null, '25', null, '5', '103.50', '0.00', '00000043', 'PRO002', '2', '491.63');
INSERT INTO `detalle_ventas` VALUES ('103', null, '2', null, '5', '17.76', '10.00', '00000043', '9342006084', '1', '84.36');
INSERT INTO `detalle_ventas` VALUES ('104', null, null, null, '5', '26.20', '0.00', '00000044', '9342008960', '2', '131.00');
INSERT INTO `detalle_ventas` VALUES ('105', null, null, null, '5', '45.00', '0.00', '00000044', '9342000060', '1', '225.00');
INSERT INTO `detalle_ventas` VALUES ('106', null, null, null, '10', '45.00', '0.00', '00000045', '9342000060', '1', '450.00');
INSERT INTO `detalle_ventas` VALUES ('107', null, null, null, '10', '13.00', '0.00', '00000046', '11500', '1', '130.00');
INSERT INTO `detalle_ventas` VALUES ('108', null, null, null, '5', '8800.00', '0.00', '00000047', '202507001', '2', '44000.00');
INSERT INTO `detalle_ventas` VALUES ('110', null, null, null, '5', '8800.00', '0.00', '00000048', '202507001', '2', '44000.00');
INSERT INTO `detalle_ventas` VALUES ('111', null, null, null, '2', '49.50', '5.00', '00000048', '11001', '1', '94.05');
INSERT INTO `detalle_ventas` VALUES ('115', null, null, null, '5', '19440.00', '0.00', '00000052', '202507003', '2', '97200.00');
INSERT INTO `detalle_ventas` VALUES ('116', null, null, null, '2', '10500.00', '0.00', '00000052', '202507002', '1', '21000.00');
INSERT INTO `detalle_ventas` VALUES ('117', null, null, null, '5', '8800.00', '0.00', '00000053', '202507001', '1', '44000.00');
INSERT INTO `detalle_ventas` VALUES ('118', null, null, null, '2', '8800.00', '0.00', '00000054', '202507001', '2', '17600.00');
INSERT INTO `detalle_ventas` VALUES ('119', null, null, null, '2', '10500.00', '0.00', '00000054', '202507002', '1', '21000.00');
INSERT INTO `detalle_ventas` VALUES ('120', null, null, null, '2', '45.00', '0.00', '00000055', '9342000060', '2', '90.00');
INSERT INTO `detalle_ventas` VALUES ('121', null, null, null, '2', '19440.00', '0.00', '00000055', '202507003', '1', '38880.00');
INSERT INTO `detalle_ventas` VALUES ('122', null, null, null, '1', '45.00', '0.00', '00000056', '9342000060', '2', '45.00');
INSERT INTO `detalle_ventas` VALUES ('123', null, null, null, '1', '19440.00', '0.00', '00000056', '202507003', '1', '19440.00');
INSERT INTO `detalle_ventas` VALUES ('124', null, null, null, '10', '45.00', '0.00', '00000057', '9342000060', '1', '450.00');
INSERT INTO `detalle_ventas` VALUES ('125', null, null, null, '5', '101.92', '0.00', '00000058', '10010', '1', '509.60');
INSERT INTO `detalle_ventas` VALUES ('126', null, null, null, '2', '2700.00', '0.00', '00000059', '202507004', '2', '5400.00');
INSERT INTO `detalle_ventas` VALUES ('127', null, null, null, '2', '12100.00', '0.00', '00000059', '20250711003', '1', '24200.00');
INSERT INTO `detalle_ventas` VALUES ('128', null, null, null, '5', '12100.00', '0.00', '00000060', '20250711003', '2', '60500.00');
INSERT INTO `detalle_ventas` VALUES ('129', null, null, null, '5', '2700.00', '0.00', '00000060', '202507004', '1', '13500.00');
INSERT INTO `detalle_ventas` VALUES ('130', null, null, null, '2', '19440.00', '0.00', '00000061', '202507003', '2', '38880.00');
INSERT INTO `detalle_ventas` VALUES ('131', null, null, null, '2', '2700.00', '0.00', '00000061', '202507004', '1', '5400.00');
INSERT INTO `detalle_ventas` VALUES ('132', null, null, null, '5', '1148.40', '0.00', '00000062', '202570020', '1', '5742.00');

-- ----------------------------
-- Table structure for `detalle_ventas_copy`
-- ----------------------------
DROP TABLE IF EXISTS `detalle_ventas_copy`;
CREATE TABLE `detalle_ventas_copy` (
  `detalle_venta_id` int(11) NOT NULL AUTO_INCREMENT,
  `venta_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `oferta_id` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento_porcentual` decimal(5,2) DEFAULT 0.00,
  `nro_boleta` varchar(8) NOT NULL,
  `codigo_producto` varchar(50) NOT NULL DEFAULT '',
  `codProducto` int(11) DEFAULT NULL,
  `total_producto` decimal(10,2) NOT NULL,
  PRIMARY KEY (`detalle_venta_id`),
  KEY `venta_id` (`venta_id`),
  KEY `producto_id` (`producto_id`),
  KEY `oferta_id` (`oferta_id`),
  CONSTRAINT `detalle_ventas_copy_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`venta_id`),
  CONSTRAINT `detalle_ventas_copy_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`),
  CONSTRAINT `detalle_ventas_copy_ibfk_3` FOREIGN KEY (`oferta_id`) REFERENCES `ofertas` (`oferta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of detalle_ventas_copy
-- ----------------------------
INSERT INTO `detalle_ventas_copy` VALUES ('19', null, null, null, '3', '76.00', '0.00', '00000001', '9342023280', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('20', null, null, null, '3', '31.32', '0.00', '00000001', '9342011040', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('21', null, null, null, '3', '201.00', '0.00', '00000001', 'TR001', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('22', null, null, null, '1', '87.98', '0.00', '00000001', '9342006430', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('23', null, null, null, '3', '184.00', '0.00', '00000001', '9342007109', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('24', null, null, null, '1', '73.77', '0.00', '00000001', '9342006890', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('25', null, null, null, '4', '134.00', '0.00', '00000002', '9342005241', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('26', null, null, null, '5', '368.00', '0.00', '00000002', '9342006890', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('27', null, null, null, '6', '63.00', '0.00', '00000003', '9342012120', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('28', null, null, null, '1', '10.25', '0.00', '00000003', '9342018900', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('29', null, null, null, '5', '225.00', '0.00', '00000003', '9342000060', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('30', null, null, null, '1', '37.01', '0.00', '00000004', '9342023982', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('31', null, null, null, '1', '33.60', '0.00', '00000004', '9342005241', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('32', null, null, null, '1', '17.76', '0.00', '00000004', '9342006084', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('36', null, null, null, '2', '4.30', '0.00', '00000008', '30227984', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('37', null, null, null, '4', '148.04', '0.00', '00000008', '9342023982', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('38', null, null, null, '5', '128.30', '0.00', '00000009', '9342023280', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('40', null, null, null, '6', '157.00', '0.00', '00000009', '9342008960', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('41', null, null, null, '9', '405.00', '0.00', '00000010', '9342000060', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('42', null, null, null, '10', '177.60', '0.00', '00000011', '9342006084', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('47', null, null, null, '2', '203.84', '0.00', '00000014', '10010', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('48', null, null, null, '2', '45.00', '0.00', '00000014', '9342000060', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('49', null, null, null, '3', '305.76', '0.00', '00000015', '10010', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('50', null, null, null, '5', '225.00', '0.00', '00000016', '9342000060', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('51', null, null, null, '5', '203.84', '0.00', '00000016', '10010', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('52', null, null, null, '5', '509.60', '0.00', '00000017', '10010', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('54', null, null, null, '6', '210.96', '0.00', '00000018', '9342023982', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('55', null, null, null, '3', '47.95', '0.00', '00000018', '9342006084', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('56', null, null, null, '10', '1019.20', '0.00', '00000019', '10010', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('57', null, null, null, '10', '1019.20', '0.00', '00000020', '10010', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('58', null, null, null, '10', '495.00', '0.00', '00000020', '11001', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('59', null, null, null, '10', '450.00', '0.00', '00000021', '9342000060', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('60', null, null, null, '10', '1019.20', '0.00', '00000021', '10010', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('61', null, null, null, '5', '235.13', '0.00', '00000022', '11001', null, '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('62', null, null, null, '10', '450.00', '0.00', '00000023', '9342000060', '1', '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('66', null, null, null, '5', '170.50', '0.00', '00000025', '15001', '1', '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('67', null, null, null, '5', '139.50', '0.00', '00000026', '15001', '2', '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('68', null, null, null, '5', '180.00', '0.00', '00000026', '9342000060', '1', '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('69', null, null, null, '10', '472.50', '0.00', '00000027', 'P600BL', '4', '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('70', null, null, null, '10', '21.50', '0.00', '00000027', '30227984', '3', '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('71', null, null, null, '10', '106.50', '0.00', '00000027', '9342012120', '2', '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('72', null, null, null, '10', '450.00', '0.00', '00000027', '9342000060', '1', '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('78', null, null, null, '5', '0.00', '0.00', '00000030', '9342012120', '2', '42.60');
INSERT INTO `detalle_ventas_copy` VALUES ('79', null, null, null, '5', '0.00', '0.00', '00000030', '9342006084', '1', '88.80');
INSERT INTO `detalle_ventas_copy` VALUES ('80', null, null, null, '5', '0.00', '0.00', '00000031', '10010', '3', '484.12');
INSERT INTO `detalle_ventas_copy` VALUES ('81', null, null, null, '1', '0.00', '0.00', '00000031', '9342023280', '2', '23.09');
INSERT INTO `detalle_ventas_copy` VALUES ('82', null, null, null, '10', '0.00', '0.00', '00000031', '9342000060', '1', '360.00');
INSERT INTO `detalle_ventas_copy` VALUES ('83', null, null, null, '10', '36.00', '0.00', '00000032', '9342000060', '1', '360.00');
INSERT INTO `detalle_ventas_copy` VALUES ('84', null, null, null, '2', '99.00', '5.00', '00000033', '11001', '3', '47.03');
INSERT INTO `detalle_ventas_copy` VALUES ('85', null, null, null, '2', '35.52', '10.00', '00000033', '9342006084', '2', '15.98');
INSERT INTO `detalle_ventas_copy` VALUES ('86', null, null, null, '3', '135.00', '5.00', '00000033', '9342000060', '1', '85.50');
INSERT INTO `detalle_ventas_copy` VALUES ('87', null, null, null, '10', '306.90', '0.00', '00000034', '15001', '2', '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('88', null, null, null, '10', '405.00', '0.00', '00000034', '9342000060', '1', '0.00');
INSERT INTO `detalle_ventas_copy` VALUES ('89', null, null, null, '10', '13.44', '0.00', '00000035', '11500', '2', '134.40');
INSERT INTO `detalle_ventas_copy` VALUES ('90', null, null, null, '10', '49.50', '5.00', '00000035', '11001', '1', '495.00');
INSERT INTO `detalle_ventas_copy` VALUES ('91', null, null, null, '10', '7.10', '10.00', '00000036', '9342006084', '2', '63.90');
INSERT INTO `detalle_ventas_copy` VALUES ('92', null, null, null, '10', '45.00', '5.00', '00000036', '9342000060', '1', '427.50');
INSERT INTO `detalle_ventas_copy` VALUES ('93', null, null, null, '5', '14.21', '5.00', '00000037', '9342006084', '2', '67.50');
INSERT INTO `detalle_ventas_copy` VALUES ('94', null, null, null, '10', '36.00', '5.00', '00000037', '9342000060', '1', '342.00');
INSERT INTO `detalle_ventas_copy` VALUES ('95', null, null, null, '10', '49.50', '5.00', '00000038', '11001', '1', '470.25');
INSERT INTO `detalle_ventas_copy` VALUES ('96', null, null, null, '2', '47.50', '5.00', '00000039', '9342000060', '1', '95.00');
INSERT INTO `detalle_ventas_copy` VALUES ('97', null, null, null, '5', '17.76', '10.00', '00000040', '9342006084', '1', '79.92');
INSERT INTO `detalle_ventas_copy` VALUES ('98', null, null, null, '99', '20.71', '0.00', '00000041', '19051669', '1', '2050.29');
INSERT INTO `detalle_ventas_copy` VALUES ('99', null, null, null, '10', '10.65', '0.00', '00000042', '9342012120', '2', '106.50');
INSERT INTO `detalle_ventas_copy` VALUES ('100', null, null, null, '1', '17.76', '10.00', '00000042', '9342006084', '1', '15.98');
INSERT INTO `detalle_ventas_copy` VALUES ('101', null, null, null, '1', '49.50', '5.00', '00000043', '11001', '3', '47.03');
INSERT INTO `detalle_ventas_copy` VALUES ('102', null, null, null, '5', '103.50', '0.00', '00000043', 'PRO002', '2', '491.63');
INSERT INTO `detalle_ventas_copy` VALUES ('103', null, null, null, '5', '17.76', '10.00', '00000043', '9342006084', '1', '84.36');

-- ----------------------------
-- Table structure for `empresa`
-- ----------------------------
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nit` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `telefonos` text NOT NULL,
  `celular` bigint(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `direccion` text NOT NULL,
  `iva` decimal(10,2) NOT NULL,
  `serie_boleta` varchar(4) NOT NULL,
  `nro_correlativo_venta` varchar(8) NOT NULL,
  PRIMARY KEY (`id_empresa`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of empresa
-- ----------------------------
INSERT INTO `empresa` VALUES ('0', '376296023', 'DAVID ORLANDO MALLEA SILLERICO', 'FARAON S.R.L.', '79677055 - 70540123', '79677055', 'faraon@srl.com.\n          \n          \n          ', 'CALLE LUIS ESPINAL NO 188 Z/ ALTO VILLA VICTORIA ', '13.00', '', '00000062');

-- ----------------------------
-- Table structure for `master_ofertas`
-- ----------------------------
DROP TABLE IF EXISTS `master_ofertas`;
CREATE TABLE `master_ofertas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cant_ofertas` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `cant_ejecutada` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `gestion_oferta` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `nro_oferta_correlativo` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of master_ofertas
-- ----------------------------
INSERT INTO `master_ofertas` VALUES ('1', '5', '2', '1', '0', '1', '2025', '00000016');

-- ----------------------------
-- Table structure for `modulos`
-- ----------------------------
DROP TABLE IF EXISTS `modulos`;
CREATE TABLE `modulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modulo` varchar(45) DEFAULT NULL,
  `padre_id` int(11) DEFAULT NULL,
  `vista` varchar(45) DEFAULT NULL,
  `icon_menu` varchar(45) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of modulos
-- ----------------------------
INSERT INTO `modulos` VALUES ('1', 'Tablero Principal', '0', 'tablero.php', 'fas fa-tachometer-alt', '0', null, null);
INSERT INTO `modulos` VALUES ('2', 'Datos Operativos', '0', '', 'fas fa-project-diagram', '1', null, null);
INSERT INTO `modulos` VALUES ('3', 'Productos', '2', 'productos.php', 'far fa-circle', '2', null, null);
INSERT INTO `modulos` VALUES ('4', 'Carga Masiva', '2', 'carga_productos.php', 'far fa-circle', '3', null, null);
INSERT INTO `modulos` VALUES ('5', 'Categorias', '2', 'categorias.php', 'far fa-circle', '4', null, null);
INSERT INTO `modulos` VALUES ('6', 'Ferias', '2', 'ferias.php', 'far fa-circle', '5', null, null);
INSERT INTO `modulos` VALUES ('7', 'Ofertas', '0', null, 'fas fa-dolly', '6', null, null);
INSERT INTO `modulos` VALUES ('8', 'Generar Ofertas', '7', 'ofertas.php', 'far fa-circle', '7', null, null);
INSERT INTO `modulos` VALUES ('9', 'Administrar Ofertas', '7', 'administrar_ofertas.php', 'far fa-circle', '8', null, null);
INSERT INTO `modulos` VALUES ('10', 'Administrativos', '0', null, 'fas fa-laptop', '9', null, null);
INSERT INTO `modulos` VALUES ('11', 'Clientes', '10', 'clientes.php', 'far fa-circle', '10', null, null);
INSERT INTO `modulos` VALUES ('12', 'Proveedores', '10', 'proveedores.php', 'far fa-circle', '11', null, null);
INSERT INTO `modulos` VALUES ('13', 'Usuarios', '20', 'usuarios.php', 'far fa-circle', '21', null, null);
INSERT INTO `modulos` VALUES ('14', 'Ventas', '0', null, 'fas fa-cash-register', '13', null, null);
INSERT INTO `modulos` VALUES ('15', 'Generar Ventas', '14', 'ventas.php', 'far fa-circle', '14', null, null);
INSERT INTO `modulos` VALUES ('16', 'Administrar Ventas', '14', 'administrar_ventas.php', 'far fa-circle', '15', null, null);
INSERT INTO `modulos` VALUES ('17', 'Reporte de Ventas', '14', 'reportes_ventas.php', 'far fa-circle', '16', null, null);
INSERT INTO `modulos` VALUES ('18', 'Configuracion', '0', 'configuracion.php', 'fas fa-cogs', '17', null, null);
INSERT INTO `modulos` VALUES ('19', 'Inventarios', '0', 'inventarios.php', 'fas fa-chart-line', '18', null, null);
INSERT INTO `modulos` VALUES ('20', 'Seguridad', '0', null, 'fas fa-user-shield', '19', null, null);
INSERT INTO `modulos` VALUES ('22', 'Modulos y Perfiles', '20', 'modulos_perfiles.php', 'fas fa-tablet-alt', '20', null, null);
INSERT INTO `modulos` VALUES ('26', 'Inventario', '2', 'productos_inventario.php', 'far fa-circle', '21', null, null);

-- ----------------------------
-- Table structure for `modulos_13092025`
-- ----------------------------
DROP TABLE IF EXISTS `modulos_13092025`;
CREATE TABLE `modulos_13092025` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modulo` varchar(45) DEFAULT NULL,
  `padre_id` int(11) DEFAULT NULL,
  `vista` varchar(45) DEFAULT NULL,
  `icon_menu` varchar(45) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of modulos_13092025
-- ----------------------------
INSERT INTO `modulos_13092025` VALUES ('1', 'Tablero Principal', '0', 'tablero.php', 'fas fa-tachometer-alt', '0', null, null);
INSERT INTO `modulos_13092025` VALUES ('2', 'Datos Operativos', '0', '', 'fas fa-project-diagram', '1', null, null);
INSERT INTO `modulos_13092025` VALUES ('3', 'Productos', '2', 'productos.php', 'far fa-circle', '2', null, null);
INSERT INTO `modulos_13092025` VALUES ('4', 'Carga Masiva', '2', 'carga_productos.php', 'far fa-circle', '3', null, null);
INSERT INTO `modulos_13092025` VALUES ('5', 'Categorias', '2', 'categorias.php', 'far fa-circle', '4', null, null);
INSERT INTO `modulos_13092025` VALUES ('6', 'Ferias', '2', 'ferias.php', 'far fa-circle', '5', null, null);
INSERT INTO `modulos_13092025` VALUES ('7', 'Ofertas', '0', null, 'fas fa-dolly', '6', null, null);
INSERT INTO `modulos_13092025` VALUES ('8', 'Generar Ofertas', '7', 'ofertas.php', 'far fa-circle', '7', null, null);
INSERT INTO `modulos_13092025` VALUES ('9', 'Administrar Ofertas', '7', 'administrar_ofertas.php', 'far fa-circle', '8', null, null);
INSERT INTO `modulos_13092025` VALUES ('10', 'Administrativos', '0', null, 'fas fa-laptop', '9', null, null);
INSERT INTO `modulos_13092025` VALUES ('11', 'Clientes', '10', 'clientes.php', 'far fa-circle', '10', null, null);
INSERT INTO `modulos_13092025` VALUES ('12', 'Proveedores', '10', 'proveedores.php', 'far fa-circle', '11', null, null);
INSERT INTO `modulos_13092025` VALUES ('13', 'Usuarios', '20', 'usuarios.php', 'far fa-circle', '21', null, null);
INSERT INTO `modulos_13092025` VALUES ('14', 'Ventas', '0', null, 'fas fa-cash-register', '13', null, null);
INSERT INTO `modulos_13092025` VALUES ('15', 'Generar Ventas', '14', 'ventas.php', 'far fa-circle', '14', null, null);
INSERT INTO `modulos_13092025` VALUES ('16', 'Administrar Ventas', '14', 'administrar_ventas.php', 'far fa-circle', '15', null, null);
INSERT INTO `modulos_13092025` VALUES ('17', 'Reporte de Ventas', '14', 'reportes_ventas.php', 'far fa-circle', '16', null, null);
INSERT INTO `modulos_13092025` VALUES ('18', 'Configuracion', '0', 'configuracion.php', 'fas fa-cogs', '17', null, null);
INSERT INTO `modulos_13092025` VALUES ('19', 'Inventarios', '0', 'inventarios.php', 'fas fa-chart-line', '18', null, null);
INSERT INTO `modulos_13092025` VALUES ('20', 'Seguridad', '0', null, 'fas fa-user-shield', '19', null, null);
INSERT INTO `modulos_13092025` VALUES ('22', 'Modulos y Perfiles', '20', 'modulos_perfiles.php', 'fas fa-tablet-alt', '20', null, null);

-- ----------------------------
-- Table structure for `modulos_copy`
-- ----------------------------
DROP TABLE IF EXISTS `modulos_copy`;
CREATE TABLE `modulos_copy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modulo` varchar(45) DEFAULT NULL,
  `padre_id` int(11) DEFAULT NULL,
  `vista` varchar(45) DEFAULT NULL,
  `icon_menu` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of modulos_copy
-- ----------------------------
INSERT INTO `modulos_copy` VALUES ('1', 'Tablero Principal', null, 'tablero.php', 'fas fa-tachometer-alt');
INSERT INTO `modulos_copy` VALUES ('2', 'Ventas', null, '', 'fas fa-cash-register');
INSERT INTO `modulos_copy` VALUES ('3', 'Punto de Venta', '2', 'ventas.php', 'far fa-circle');
INSERT INTO `modulos_copy` VALUES ('4', 'Administrar Ventas', '2', 'administrar_ventas.php', 'far fa-circle');
INSERT INTO `modulos_copy` VALUES ('5', 'Datos Operativos', null, null, 'fas fa-project-diagram');
INSERT INTO `modulos_copy` VALUES ('6', 'Productos', '5', 'productos.php', 'far fa-circle');
INSERT INTO `modulos_copy` VALUES ('7', 'Carga Masiva', '5', 'carga_masiva_productos.php', 'far fa-circle');
INSERT INTO `modulos_copy` VALUES ('8', 'Categorías', '5', 'categorias.php', 'far fa-circle');
INSERT INTO `modulos_copy` VALUES ('9', 'Generar Compras', '24', 'compras.php', 'far fa-circle');
INSERT INTO `modulos_copy` VALUES ('10', 'Inventarios', null, 'inventarios.php', 'fas fa-chart-line');
INSERT INTO `modulos_copy` VALUES ('11', 'Configuración', null, 'configuracion.php', 'fas fa-cogs');
INSERT INTO `modulos_copy` VALUES ('12', 'Usuarios', '17', 'usuarios.php', 'far fa-circle');
INSERT INTO `modulos_copy` VALUES ('13', 'Modulos y Perfiles', null, 'modulos_perfiles.php', 'fas fa-tablet-alt');
INSERT INTO `modulos_copy` VALUES ('15', 'Reporte de Ventas', '2', 'reporte_ventas.php', 'far fa-circle');
INSERT INTO `modulos_copy` VALUES ('16', 'Ferias', '5', 'ferias.php', 'far fa-circle');
INSERT INTO `modulos_copy` VALUES ('17', 'Administrativos', null, null, 'fas fa-laptop');
INSERT INTO `modulos_copy` VALUES ('18', 'Clientes', '17', 'clientes.php', 'far fa-circle');
INSERT INTO `modulos_copy` VALUES ('19', 'Proveedores', '17', 'proveedores.php', 'far fa-circle');
INSERT INTO `modulos_copy` VALUES ('20', 'Ofertas', null, null, 'fas fa-dolly');
INSERT INTO `modulos_copy` VALUES ('21', 'Generar Ofertas', '20', 'ofertas.php', 'far fa-circle');
INSERT INTO `modulos_copy` VALUES ('22', 'Administrar Ofertas', '20', 'administrar_ofertas.php', 'far fa-circle');
INSERT INTO `modulos_copy` VALUES ('23', 'Administrar Compras', '24', 'administrar_compras.php', 'far fa-circle');
INSERT INTO `modulos_copy` VALUES ('24', 'Compras', null, null, ' fas fa-shopping-basket');

-- ----------------------------
-- Table structure for `notas_venta`
-- ----------------------------
DROP TABLE IF EXISTS `notas_venta`;
CREATE TABLE `notas_venta` (
  `nota_venta_id` int(11) NOT NULL AUTO_INCREMENT,
  `venta_id` int(11) DEFAULT NULL,
  `fecha_emision` datetime NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` enum('emitida','anulada') DEFAULT 'emitida',
  PRIMARY KEY (`nota_venta_id`),
  KEY `venta_id` (`venta_id`),
  CONSTRAINT `notas_venta_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`venta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of notas_venta
-- ----------------------------

-- ----------------------------
-- Table structure for `ofertas`
-- ----------------------------
DROP TABLE IF EXISTS `ofertas`;
CREATE TABLE `ofertas` (
  `oferta_id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 0,
  `codigo_oferta` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `cantidad_oferta` int(11) NOT NULL,
  `unidad_medida` varchar(10) NOT NULL,
  `precio_venta_oferta` decimal(10,2) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `nro_oferta` varchar(8) NOT NULL,
  `total_oferta` decimal(10,2) NOT NULL DEFAULT 1.00,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`oferta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ofertas
-- ----------------------------
INSERT INTO `ofertas` VALUES ('1', '2025-04-21', '2025-04-28', '0', 'OFERT1100', 'OFERTA MAYORES', '10', 'PAQ', '148.95', '16', '1', '00000001', '1438.49', '0000-00-00 00:00:00');
INSERT INTO `ofertas` VALUES ('2', '2025-04-28', '2025-05-04', '0', 'OF+2MAY', 'OFERTA MAS MEDICAMENTOS', '5', 'BOT', '114.15', '8', '2', '00000002', '570.75', '0000-00-00 00:00:00');
INSERT INTO `ofertas` VALUES ('3', '2025-04-28', '2025-04-30', '0', 'OFER2', 'OFERTA MAS MEDICAMENTOS', '5', 'BOT', '109.18', '17', '2', '00000003', '516.65', '0000-00-00 00:00:00');
INSERT INTO `ofertas` VALUES ('4', '2025-04-21', '2025-04-27', '0', 'OFER2', 'OFERTA-MAYORES', '5', 'BOT', '80.16', '17', '1', '00000004', '389.55', '0000-00-00 00:00:00');
INSERT INTO `ofertas` VALUES ('5', '2025-04-21', '2025-04-24', '0', 'OFER2', 'OFERTA MAS MEDICAMENTOS', '5', 'BOT', '71.27', '18', '2', '00000005', '356.36', '0000-00-00 00:00:00');
INSERT INTO `ofertas` VALUES ('6', '2025-05-01', '2025-05-10', '0', 'OFER2104', 'OFERTA PRUEBA', '10', 'BLS', '36.79', '13', '2', '00000006', '347.44', '0000-00-00 00:00:00');
INSERT INTO `ofertas` VALUES ('7', '2025-04-21', '2025-04-30', '0', 'OFEP01', 'OFERTA PRUEBA01', '10', 'PQT', '61.00', '49', '1', '00000007', '610.00', '2025-04-21 00:00:00');
INSERT INTO `ofertas` VALUES ('8', '2025-04-28', '2025-05-04', '0', 'OFER30', 'OFERTA-ES', '5', 'BOT', '100.29', '16', '1', '00000008', '478.94', '2025-04-26 00:00:00');
INSERT INTO `ofertas` VALUES ('9', '2025-07-21', '2025-07-26', '0', '2025OFE001', 'OFERTA-PORTATILES_RYSEN', '5', 'EQP', '22140.00', '53', '4', '00000009', '44280.00', '2025-07-20 00:00:00');
INSERT INTO `ofertas` VALUES ('10', '2025-07-21', '2025-07-23', '0', '2025OFE002', 'OFERTA PORTATILES TECHNO', '2', 'EQP', '34240.00', '53', '1', '00000010', '68480.00', '2025-07-20 00:00:00');
INSERT INTO `ofertas` VALUES ('11', '2025-08-03', '2025-08-10', '0', 'OFERJULY001', 'OFERTA JULIO', '4', 'EQP', '11500.00', '53', '4', '00000011', '46000.00', '2025-08-01 00:00:00');
INSERT INTO `ofertas` VALUES ('12', '2025-08-02', '2025-08-05', '0', 'OFR001', 'OFERTARYSEN', '2', 'EQP', '12100.00', '53', '1', '00000012', '24200.00', '2025-08-02 00:00:00');
INSERT INTO `ofertas` VALUES ('13', '2025-08-02', '2025-08-06', '0', 'OFR002', 'OFERTA RYSEN 002', '3', 'EQP', '14800.00', '53', '4', '00000013', '59200.00', '2025-08-02 00:00:00');
INSERT INTO `ofertas` VALUES ('14', '2025-08-03', '2025-08-08', '0', 'OFR003', 'OFERTA RYSEN 003', '2', 'EQP', '14800.00', '53', '1', '00000014', '59200.00', '2025-08-02 00:00:00');
INSERT INTO `ofertas` VALUES ('15', '2025-08-02', '2025-08-09', '0', 'OFR004', 'OFERTA RYSEN 004', '3', 'EQP', '22140.00', '53', '2', '00000015', '21600.00', '2025-08-02 00:00:00');
INSERT INTO `ofertas` VALUES ('16', '2025-08-03', '2025-08-10', '0', 'OFR005', 'OFERTA RYSEN 005', '2', '', '14800.00', '53', '2', '00000016', '134500.00', '2025-08-03 00:00:00');

-- ----------------------------
-- Table structure for `perfiles`
-- ----------------------------
DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of perfiles
-- ----------------------------
INSERT INTO `perfiles` VALUES ('1', 'Administrador', '1', null, null);
INSERT INTO `perfiles` VALUES ('2', 'Vendedor', '1', null, null);
INSERT INTO `perfiles` VALUES ('3', 'Supervisor', '1', null, null);
INSERT INTO `perfiles` VALUES ('4', 'Distribuidor', '1', null, null);

-- ----------------------------
-- Table structure for `perfil_modulo`
-- ----------------------------
DROP TABLE IF EXISTS `perfil_modulo`;
CREATE TABLE `perfil_modulo` (
  `id_perfil_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `id_perfil` int(11) DEFAULT NULL,
  `id_modulo` int(11) DEFAULT NULL,
  `vista_inicio` tinyint(4) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_perfil_modulo`),
  KEY `id_perfil` (`id_perfil`),
  KEY `id_modulo` (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of perfil_modulo
-- ----------------------------
INSERT INTO `perfil_modulo` VALUES ('4', '1', '22', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('50', '1', '1', '1', '1');
INSERT INTO `perfil_modulo` VALUES ('51', '1', '2', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('52', '1', '3', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('53', '1', '4', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('54', '1', '5', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('55', '1', '6', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('56', '1', '7', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('57', '1', '8', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('58', '1', '9', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('59', '1', '10', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('60', '1', '11', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('61', '1', '12', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('62', '1', '14', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('63', '1', '15', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('64', '1', '16', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('65', '1', '17', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('66', '1', '18', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('67', '1', '19', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('68', '1', '20', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('69', '1', '13', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('85', '2', '11', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('86', '2', '10', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('87', '2', '15', '1', '1');
INSERT INTO `perfil_modulo` VALUES ('88', '2', '14', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('89', '2', '16', '0', '1');
INSERT INTO `perfil_modulo` VALUES ('92', '1', '26', '0', '1');

-- ----------------------------
-- Table structure for `perfil_modulo_13092025`
-- ----------------------------
DROP TABLE IF EXISTS `perfil_modulo_13092025`;
CREATE TABLE `perfil_modulo_13092025` (
  `id_perfil_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `id_perfil` int(11) DEFAULT NULL,
  `id_modulo` int(11) DEFAULT NULL,
  `vista_inicio` tinyint(4) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_perfil_modulo`),
  KEY `id_perfil` (`id_perfil`),
  KEY `id_modulo` (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of perfil_modulo_13092025
-- ----------------------------
INSERT INTO `perfil_modulo_13092025` VALUES ('4', '1', '22', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('50', '1', '1', '1', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('51', '1', '2', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('52', '1', '3', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('53', '1', '4', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('54', '1', '5', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('55', '1', '6', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('56', '1', '7', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('57', '1', '8', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('58', '1', '9', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('59', '1', '10', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('60', '1', '11', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('61', '1', '12', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('62', '1', '14', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('63', '1', '15', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('64', '1', '16', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('65', '1', '17', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('66', '1', '18', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('67', '1', '19', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('68', '1', '20', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('69', '1', '13', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('85', '2', '11', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('86', '2', '10', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('87', '2', '15', '1', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('88', '2', '14', '0', '1');
INSERT INTO `perfil_modulo_13092025` VALUES ('89', '2', '16', '0', '1');

-- ----------------------------
-- Table structure for `perfil_modulo_copy`
-- ----------------------------
DROP TABLE IF EXISTS `perfil_modulo_copy`;
CREATE TABLE `perfil_modulo_copy` (
  `id_perfil_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `id_perfil` int(11) DEFAULT NULL,
  `id_modulo` int(11) DEFAULT NULL,
  `vista_inicio` tinyint(4) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_perfil_modulo`),
  KEY `id_perfil` (`id_perfil`),
  KEY `id_modulo` (`id_modulo`),
  CONSTRAINT `perfil_modulo_copy_ibfk_1` FOREIGN KEY (`id_modulo`) REFERENCES `modulos_copy` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `perfil_modulo_copy_ibfk_2` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of perfil_modulo_copy
-- ----------------------------
INSERT INTO `perfil_modulo_copy` VALUES ('13', '1', '13', null, '1');
INSERT INTO `perfil_modulo_copy` VALUES ('35', '3', '1', '1', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('36', '3', '10', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('47', '2', '3', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('48', '2', '2', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('49', '2', '4', '1', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('50', '2', '10', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('51', '2', '15', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('52', '2', '12', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('53', '2', '17', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('76', '1', '1', '1', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('77', '1', '2', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('78', '1', '3', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('79', '1', '4', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('80', '1', '5', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('81', '1', '6', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('82', '1', '7', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('83', '1', '8', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('84', '1', '9', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('85', '1', '10', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('86', '1', '11', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('87', '1', '12', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('89', '1', '15', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('90', '1', '16', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('91', '1', '17', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('92', '1', '18', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('93', '1', '19', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('94', '1', '20', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('95', '1', '21', '0', '1');
INSERT INTO `perfil_modulo_copy` VALUES ('96', '1', '22', '0', '1');

-- ----------------------------
-- Table structure for `productos`
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `producto_id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_producto` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `unidad_medida` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `precio_feria` decimal(10,2) NOT NULL,
  `precio_oferta` decimal(10,2) NOT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `subcategoria_id` int(11) NOT NULL,
  `fecha_alta` timestamp NULL DEFAULT current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1,
  `proveedor_id` int(11) NOT NULL,
  `documento` text DEFAULT NULL,
  PRIMARY KEY (`producto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES ('1', '9342000060', 'ABRIMED JARABE 120ML C/C', '120ML', '1612', '45.00', '36.00', '18.00', '23.89', '0.00', '49', '115', '2025-02-06 00:48:30', '1', '1', null);
INSERT INTO `productos` VALUES ('2', '9342006084', 'BEXADERM CR 20G', '20G', '1309', '17.76', '14.21', '7.10', '9.19', '10.00', '49', '113', '2025-02-06 00:48:30', '1', '1', null);
INSERT INTO `productos` VALUES ('3', '9342006890', 'BLOQ BAHIA FACES SPF90 60G SKIN CANCER C/C', '60G', '292', '73.77', '59.02', '29.51', '49.99', '13.00', '50', '116', '2025-02-06 00:48:30', '1', '1', null);
INSERT INTO `productos` VALUES ('4', '9342007109', 'BLOQ BAHIA SPORT GEL SPF50+ 60G', '60G', '456', '61.43', '49.14', '24.57', '43.88', '10.00', '50', '116', '2025-02-06 00:48:30', '1', '1', null);
INSERT INTO `productos` VALUES ('5', '9342008960', 'CETIRIZINA 10MG TAB C/100', '100MG', '430', '26.20', '20.96', '10.48', '13.04', '0.00', '49', '114', '2025-02-06 00:48:30', '1', '1', null);
INSERT INTO `productos` VALUES ('6', '9342005241', 'COOL GEL BAHIA ALOE VERA 290G', '290G', '393', '33.60', '26.88', '13.44', '22.71', '0.00', '50', '116', '2025-02-06 00:48:30', '1', '1', null);
INSERT INTO `productos` VALUES ('7', '9342006504', 'CREMA BLANQUEADORA FAZ 55G  (VENC, 30-11-25)', '55GR', '426', '33.18', '26.54', '13.27', '20.00', '20.00', '50', '122', '2025-02-06 00:48:30', '1', '1', null);
INSERT INTO `productos` VALUES ('8', '9342011040', 'CREMA CONCHA DE NACAR  18G POTE', '18G', '937', '10.44', '8.35', '4.18', '7.46', '0.00', '50', '122', '2025-02-06 00:48:30', '1', '1', null);
INSERT INTO `productos` VALUES ('9', '9342011060', 'CREMA CONCHA DE NACAR 55G C/C', '55G', '724', '30.70', '24.56', '12.28', '21.94', '15.00', '50', '122', '2025-02-06 00:48:30', '1', '1', null);
INSERT INTO `productos` VALUES ('10', '9342012120', 'DICLOFENACO 1% GEL 20G C/C', '20G', '429', '10.65', '8.52', '4.26', '7.35', '0.00', '49', '113', '2025-02-06 00:48:30', '1', '1', null);
INSERT INTO `productos` VALUES ('11', '9342018900', 'JABON DE GLICERINA FLORESTA LECHUGA 100G', '100G', '784', '10.25', '8.20', '4.10', '7.56', '0.00', '50', '121', '2025-02-06 00:48:30', '1', '2', null);
INSERT INTO `productos` VALUES ('12', '9342023982', 'MULTIFROST 60G', '60G', '289', '37.01', '29.61', '14.80', '20.67', '5.00', '49', '113', '2025-02-06 00:48:30', '1', '2', null);
INSERT INTO `productos` VALUES ('13', '30227984', 'SCOTT SERVILLETA DIA A DIA 24X50', '60G', '372', '2.15', '1.72', '0.86', '2.15', '0.00', '19', '26', '2025-02-06 00:48:31', '1', '1', null);
INSERT INTO `productos` VALUES ('14', '9342004525 -1', 'AZITROMICINA 500MG TAB REC X1 UND', '1 UND', '500', '3.67', '2.94', '1.47', '0.00', '0.00', '49', '114', '2025-02-06 00:48:31', '1', '1', null);
INSERT INTO `productos` VALUES ('15', '9342006430', 'BISMUALIV 87.33MG/5ML SUSPENS ORAL 150 ML ', 'FCO 150ML', '671', '87.98', '70.38', '35.19', '32.43', '30.00', '49', '127', '2025-02-06 00:48:31', '1', '2', null);
INSERT INTO `productos` VALUES ('16', '9342002480-1', 'OF: 2 AMLODIPINO 10 MG TAB C/100(VENC 30-11-24)', '10MG', '396', '0.01', '0.01', '0.00', '0.01', '100.00', '49', '114', '2025-02-06 00:48:31', '1', '1', null);
INSERT INTO `productos` VALUES ('17', '9342023280', 'METRONIDAZOL 500MG OVULO C/10', '500MG', '711', '25.66', '20.53', '10.26', '13.23', '10.00', '49', '126', '2025-02-06 00:48:31', '1', '1', null);
INSERT INTO `productos` VALUES ('18', '9342009640-1', 'CLARITROMICINA 500MG TAB REC /1 UND', '500MG', '1898', '5.51', '4.41', '2.20', '0.00', '20.00', '49', '114', '2025-02-06 00:48:31', '1', '1', null);
INSERT INTO `productos` VALUES ('19', '9342027343', 'PORTIL CREMA 20G ', '20G', '1930', '17.76', '14.21', '7.10', '12.25', '5.00', '49', '113', '2025-02-06 00:48:31', '1', '1', null);
INSERT INTO `productos` VALUES ('20', '9342027343-1', 'OF:1PORTIL CREMA 20G+1BEXADERM CR 20G', 'OFERTA', '460', '35.52', '28.42', '14.21', '0.00', '15.00', '49', '113', '2025-02-06 00:48:31', '1', '1', null);
INSERT INTO `productos` VALUES ('21', '12323', 'deso', '1', '100', '22.80', '18.24', '9.12', '12.00', '0.00', '2', '0', '2025-02-13 02:54:40', '1', '0', 'f5');
INSERT INTO `productos` VALUES ('22', 'p23423', 'ambientador de cocina', 'pzas', '200', '28.60', '22.88', '11.44', '26.00', '0.00', '2', '0', '2025-02-13 03:14:29', '1', '0', 'recibo 30');
INSERT INTO `productos` VALUES ('23', 'TR001', 'CREMMA CUTIS', 'BOT', '200', '67.20', '53.76', '26.88', '56.00', '0.00', '30', '67', '2025-02-18 01:18:24', '1', '1', 'RECIBO 90');
INSERT INTO `productos` VALUES ('24', 'P600BL', 'POMADA BL', 'BOT', '200', '47.25', '37.80', '18.90', '45.00', '0.00', '30', '68', '2025-02-18 01:22:10', '1', '1', 'NN');
INSERT INTO `productos` VALUES ('25', 'PRO002', 'PARA ADULTO MAYOR', 'BOL', '195', '103.50', '82.80', '41.40', '90.00', '0.00', '3', '112', '2025-02-18 01:26:49', '1', '1', 'D5');
INSERT INTO `productos` VALUES ('26', 'PRO03', 'DESHODORANTE DR5', 'SHT', '200', '12.00', '9.60', '4.80', '12.00', '0.00', '5', '50', '2025-02-18 01:30:43', '1', '1', 'FACT6');
INSERT INTO `productos` VALUES ('27', '10010', 'PAÑAL ADULTO MAYO HGTG', 'PQT', '96', '101.92', '0.00', '0.00', '98.00', '0.00', '8', '20', '2025-04-14 23:42:59', '1', '1', 'fac 450');
INSERT INTO `productos` VALUES ('28', '11001', 'HILO PARA ADULTO MAYOR', 'BTL', '168', '49.50', '0.00', '0.00', '45.00', '5.00', '9', '13', '2025-04-16 12:23:42', '1', '2', 'FAC 567');
INSERT INTO `productos` VALUES ('29', '11500', 'SPRAY 800 VERDE HD', 'BOT', '90', '13.44', '13.00', '12.50', '12.00', '0.00', '2', '3', '2025-04-17 00:00:02', '1', '1', 'nota vta 600');
INSERT INTO `productos` VALUES ('30', '15001', 'PASTA DENTAL HD ADULTO MAYOR', 'bot', '175', '34.10', '30.00', '31.00', '31.00', '10.00', '15', '61', '2025-04-17 02:31:53', '1', '1', 'not 5');
INSERT INTO `productos` VALUES ('31', '12001', 'SOBRE ACEPTICOS', 'PTL', '220', '49.50', '48.00', '49.00', '45.00', '0.00', '49', '114', '2025-04-20 23:49:54', '1', '2', 'nota 450');
INSERT INTO `productos` VALUES ('32', '19051669', 'DESHODORANTE FUTBOLPASION', 'BOT', '250', '20.71', '20.00', '19.19', '19.00', '0.00', '2', '3', '2025-05-02 12:30:47', '1', '3', 'Factura 19');
INSERT INTO `productos` VALUES ('33', '202507001', 'TOSHIBA I7 12VA GENERACION 2450', 'EQP', '134', '8800.00', '8500.00', '8200.00', '8000.00', '0.00', '53', '130', '2025-07-08 22:49:27', '1', '4', 'FACTURA 560');
INSERT INTO `productos` VALUES ('34', '202507002', 'HP I5 TECLADO EN ESPAÑOL 500-10 102 TECLAS', 'EQP', '200', '10500.00', '10300.00', '10100.00', '10000.00', '0.00', '53', '129', '2025-07-08 22:57:40', '1', '4', 'RECIBO 560');
INSERT INTO `productos` VALUES ('35', '202507003', 'TECNO-XIAOMI-I9-2DAGEN', 'EQP', '188', '19440.00', '19300.00', '18800.00', '18000.00', '0.00', '53', '127', '2025-07-08 23:35:49', '1', '4', 'factura789');
INSERT INTO `productos` VALUES ('36', '20250711003', 'RYSEN X9 16RAM 256SSD', 'EQP', '77', '12100.00', '11800.00', '11500.00', '11000.00', '0.00', '53', '127', '2025-07-11 22:58:05', '1', '4', 'nota 345');
INSERT INTO `productos` VALUES ('37', '202507004', 'RYSEN I9 SSD1TRAM32', 'EQP', '9', '2700.00', '2600.00', '2550.00', '2500.00', '0.00', '53', '127', '2025-07-20 00:05:33', '1', '4', 'nota500');
INSERT INTO `productos` VALUES ('38', '202570020', 'TABLET 256-1TERA', 'EQU', '95', '1148.40', '1000.00', '1100.00', '990.00', '0.00', '53', '130', '2025-09-29 01:14:26', '1', '4', 'FAC 610');
INSERT INTO `productos` VALUES ('39', '202570021', 'TABLET DELL', 'EQU', '100', '1680.00', '1000.00', '900.00', '1500.00', '2.00', '53', '128', '2025-09-29 03:00:44', '1', '4', 'NOTA 56');

-- ----------------------------
-- Table structure for `proveedores`
-- ----------------------------
DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE `proveedores` (
  `proveedor_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(100) NOT NULL,
  `razon_social` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `nit` varchar(20) NOT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp(),
  `estado` enum('activo','inactivo') DEFAULT 'activo',
  `direccion` text DEFAULT NULL,
  PRIMARY KEY (`proveedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of proveedores
-- ----------------------------
INSERT INTO `proveedores` VALUES ('1', 'VITAL', 'AAA', null, '', '2025-02-06 00:31:27', 'activo', null);
INSERT INTO `proveedores` VALUES ('2', 'LUXOR SA', 'FARFAN', '16', '963258741', '2025-02-06 00:31:36', 'activo', 'BALLIVIAN');
INSERT INTO `proveedores` VALUES ('3', 'SALVA LTDA', 'SALVATIERRA', '105', '10', '2025-04-29 02:01:04', 'activo', 'MIRAFLORES');
INSERT INTO `proveedores` VALUES ('4', 'CARM@N', 'CARM@N SRL', '22417442', '336022', '2025-07-08 22:46:38', 'activo', 'SOPOCACHI 100');

-- ----------------------------
-- Table structure for `subcategorias`
-- ----------------------------
DROP TABLE IF EXISTS `subcategorias`;
CREATE TABLE `subcategorias` (
  `subcategoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`subcategoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of subcategorias
-- ----------------------------
INSERT INTO `subcategorias` VALUES ('1', 'ACONDICIONADOR', '21');
INSERT INTO `subcategorias` VALUES ('2', 'ADULTO', '16');
INSERT INTO `subcategorias` VALUES ('3', 'AEROSOL', '2');
INSERT INTO `subcategorias` VALUES ('4', 'BANDEO', '4');
INSERT INTO `subcategorias` VALUES ('5', 'BAÑO LIQ', '8');
INSERT INTO `subcategorias` VALUES ('6', 'CLINICAL', '18');
INSERT INTO `subcategorias` VALUES ('7', 'COTONETE', '9');
INSERT INTO `subcategorias` VALUES ('8', 'CREMA', '8');
INSERT INTO `subcategorias` VALUES ('9', 'CREMA DE PEINAR', '21');
INSERT INTO `subcategorias` VALUES ('10', 'CURATIVOS', '9');
INSERT INTO `subcategorias` VALUES ('12', 'FEM', '10');
INSERT INTO `subcategorias` VALUES ('13', 'HILO DENTAL', '9');
INSERT INTO `subcategorias` VALUES ('14', 'JABON', '9');
INSERT INTO `subcategorias` VALUES ('15', 'JABON LIQ', '14');
INSERT INTO `subcategorias` VALUES ('16', 'KLEENEX', '7');
INSERT INTO `subcategorias` VALUES ('17', 'LISTERINE', '9');
INSERT INTO `subcategorias` VALUES ('18', 'LOCION', '17');
INSERT INTO `subcategorias` VALUES ('19', 'OB', '9');
INSERT INTO `subcategorias` VALUES ('20', 'PAÑAL', '8');
INSERT INTO `subcategorias` VALUES ('21', 'PAÑUELO', '6');
INSERT INTO `subcategorias` VALUES ('22', 'PH', '19');
INSERT INTO `subcategorias` VALUES ('24', 'ROLLONG', '5');
INSERT INTO `subcategorias` VALUES ('25', 'SACH SH', '21');
INSERT INTO `subcategorias` VALUES ('26', 'SERVILLETA', '19');
INSERT INTO `subcategorias` VALUES ('27', 'SHAMPOO', '8');
INSERT INTO `subcategorias` VALUES ('28', 'STICK', '2');
INSERT INTO `subcategorias` VALUES ('29', 'SUNDOWN ', '9');
INSERT INTO `subcategorias` VALUES ('30', 'TALCO', '18');
INSERT INTO `subcategorias` VALUES ('31', 'TAMPON', '10');
INSERT INTO `subcategorias` VALUES ('32', 'TOA COCINA', '19');
INSERT INTO `subcategorias` VALUES ('33', 'TOA FEM', '11');
INSERT INTO `subcategorias` VALUES ('34', 'TOA HUM', '8');
INSERT INTO `subcategorias` VALUES ('35', 'COMPOTA', '23');
INSERT INTO `subcategorias` VALUES ('36', 'COLONIA', '24');
INSERT INTO `subcategorias` VALUES ('37', 'ESTUCHE', '24');
INSERT INTO `subcategorias` VALUES ('38', 'JABON LIQ', '24');
INSERT INTO `subcategorias` VALUES ('39', 'EMULSIONADO', '24');
INSERT INTO `subcategorias` VALUES ('40', 'SHAMPOO', '24');
INSERT INTO `subcategorias` VALUES ('41', 'TALCO', '24');
INSERT INTO `subcategorias` VALUES ('42', 'PACK', '24');
INSERT INTO `subcategorias` VALUES ('44', 'CURA', '25');
INSERT INTO `subcategorias` VALUES ('45', 'LUBRICANTE', '26');
INSERT INTO `subcategorias` VALUES ('46', 'SPRAY', '28');
INSERT INTO `subcategorias` VALUES ('47', 'CREMA', '28');
INSERT INTO `subcategorias` VALUES ('48', 'TH', '45');
INSERT INTO `subcategorias` VALUES ('49', 'JABON', '5');
INSERT INTO `subcategorias` VALUES ('50', 'ROL', '5');
INSERT INTO `subcategorias` VALUES ('51', 'AER', '5');
INSERT INTO `subcategorias` VALUES ('52', 'STICK', '5');
INSERT INTO `subcategorias` VALUES ('53', 'CREMA', '5');
INSERT INTO `subcategorias` VALUES ('54', 'ANTIGRASA', '46');
INSERT INTO `subcategorias` VALUES ('56', 'ROLL', '18');
INSERT INTO `subcategorias` VALUES ('57', 'AER', '18');
INSERT INTO `subcategorias` VALUES ('58', 'TOA HUM', '47');
INSERT INTO `subcategorias` VALUES ('59', 'TOA HUM', '48');
INSERT INTO `subcategorias` VALUES ('60', 'MINIPEP', '15');
INSERT INTO `subcategorias` VALUES ('61', 'ANTICARIES', '15');
INSERT INTO `subcategorias` VALUES ('62', 'WHITENING', '15');
INSERT INTO `subcategorias` VALUES ('64', 'JAB LIQ', '41');
INSERT INTO `subcategorias` VALUES ('65', 'SANITIZANTE', '41');
INSERT INTO `subcategorias` VALUES ('66', 'MICROPOROSO', '25');
INSERT INTO `subcategorias` VALUES ('67', 'CREMA', '30');
INSERT INTO `subcategorias` VALUES ('68', 'BANDA', '30');
INSERT INTO `subcategorias` VALUES ('69', 'SH 340 ML', '21');
INSERT INTO `subcategorias` VALUES ('70', 'SH FCO 650ML', '21');
INSERT INTO `subcategorias` VALUES ('71', 'SH DUO X340', '21');
INSERT INTO `subcategorias` VALUES ('72', 'PVO 2KG', '42');
INSERT INTO `subcategorias` VALUES ('73', 'PVO 700GR', '42');
INSERT INTO `subcategorias` VALUES ('74', 'PROT DIARIO', '14');
INSERT INTO `subcategorias` VALUES ('75', 'TOA FEM', '14');
INSERT INTO `subcategorias` VALUES ('76', 'NOCTURNA', '14');
INSERT INTO `subcategorias` VALUES ('77', 'GEL INTIMO', '38');
INSERT INTO `subcategorias` VALUES ('78', 'PRESERVATIVO', '38');
INSERT INTO `subcategorias` VALUES ('80', 'FPS 50', '37');
INSERT INTO `subcategorias` VALUES ('81', 'FPS 30', '37');
INSERT INTO `subcategorias` VALUES ('82', 'FPS 60', '37');
INSERT INTO `subcategorias` VALUES ('83', 'BRONCEADOR', '37');
INSERT INTO `subcategorias` VALUES ('85', 'COTONETE POTE', '36');
INSERT INTO `subcategorias` VALUES ('86', 'COTONETE BOLSA', '36');
INSERT INTO `subcategorias` VALUES ('87', 'JABON', '35');
INSERT INTO `subcategorias` VALUES ('88', 'TOA HUM', '34');
INSERT INTO `subcategorias` VALUES ('89', 'JAB 100GR', '33');
INSERT INTO `subcategorias` VALUES ('90', 'JAB 75GR', '33');
INSERT INTO `subcategorias` VALUES ('91', 'JAB 150GR', '33');
INSERT INTO `subcategorias` VALUES ('92', 'JAB 70GR', '32');
INSERT INTO `subcategorias` VALUES ('93', 'JAB 120GR', '32');
INSERT INTO `subcategorias` VALUES ('95', 'TALCO', '31');
INSERT INTO `subcategorias` VALUES ('96', 'SHAMPOO', '31');
INSERT INTO `subcategorias` VALUES ('97', 'QUITAESMALTE', '31');
INSERT INTO `subcategorias` VALUES ('98', 'JAB LIQ', '31');
INSERT INTO `subcategorias` VALUES ('99', 'GEL FIJACION', '31');
INSERT INTO `subcategorias` VALUES ('100', 'DESODORANTE', '31');
INSERT INTO `subcategorias` VALUES ('101', 'CREMA', '31');
INSERT INTO `subcategorias` VALUES ('102', 'DESODORANTE', '31');
INSERT INTO `subcategorias` VALUES ('103', 'ACONDICIONADOR', '31');
INSERT INTO `subcategorias` VALUES ('104', 'ACEITE', '31');
INSERT INTO `subcategorias` VALUES ('105', 'JABON', '8');
INSERT INTO `subcategorias` VALUES ('106', 'TOA COCINA', '8');
INSERT INTO `subcategorias` VALUES ('107', 'JAB LIQ', '12');
INSERT INTO `subcategorias` VALUES ('108', 'EMULSION', '12');
INSERT INTO `subcategorias` VALUES ('109', 'PRACTIPAÑAL', '14');
INSERT INTO `subcategorias` VALUES ('110', 'TOA HUM', '10');
INSERT INTO `subcategorias` VALUES ('111', 'ENJUAGUE BUCAL', '31');
INSERT INTO `subcategorias` VALUES ('112', 'PAÑAL', '3');
INSERT INTO `subcategorias` VALUES ('113', 'CREMA', '49');
INSERT INTO `subcategorias` VALUES ('114', 'COMPRIMIDOS', '49');
INSERT INTO `subcategorias` VALUES ('116', 'BAHIA', '50');
INSERT INTO `subcategorias` VALUES ('121', 'FLORESTA', '50');
INSERT INTO `subcategorias` VALUES ('122', 'COSMETICA', '50');
INSERT INTO `subcategorias` VALUES ('123', 'SHAMPOO CAR', '44');
INSERT INTO `subcategorias` VALUES ('126', 'PORTATIL V1', '52');
INSERT INTO `subcategorias` VALUES ('127', 'XIAOMI', '53');
INSERT INTO `subcategorias` VALUES ('128', 'DELL', '53');
INSERT INTO `subcategorias` VALUES ('129', 'HP', '53');
INSERT INTO `subcategorias` VALUES ('130', 'TOSHIBA', '53');

-- ----------------------------
-- Table structure for `usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(100) DEFAULT NULL,
  `apellido_usuario` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `clave` text DEFAULT NULL,
  `id_perfil_usuario` int(11) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `telefono` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_perfil_usuario` (`id_perfil_usuario`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_perfil_usuario`) REFERENCES `perfiles` (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'Ruben', 'Rodriguez', 'faraon', '$2a$07$azybxcags23425sdg23sdeanQZqjaf6Birm2NvcYTNtJw24CsO5uq', '1', '1', '78775348', null, null);
INSERT INTO `usuarios` VALUES ('2', 'Paolo', 'Guerrero', 'pguerrero', '$2a$07$azybxcags23425sdg23sdeanQZqjaf6Birm2NvcYTNtJw24CsO5uq', '2', '1', '7208963', null, null);
INSERT INTO `usuarios` VALUES ('3', 'Freddy', 'Paco', 'paco', '$2a$07$azybxcags23425sdg23sdeOhavvj0pmtGSWuxPOPM2.ks6uf9H.s2', '3', '1', '70489563', 'a@a.com', '2025-04-03');
INSERT INTO `usuarios` VALUES ('4', 'ROBERTO MONCHIDUKY', 'Monchiduky', 'roro', '$2a$07$azybxcags23425sdg23sdeOhavvj0pmtGSWuxPOPM2.ks6uf9H.s2', '4', '1', '70489563', 'a@a.com', '2025-04-03');
INSERT INTO `usuarios` VALUES ('6', 'FERNANDO ROMERO', null, 'fer', '$2a$07$azybxcags23425sdg23sdexYj.4FWCHT23c0IAurz5iKpChVU2G/y', '2', '1', '70560000', null, '2025-04-13');
INSERT INTO `usuarios` VALUES ('7', 'SHELKA GUTIERREZ', null, 'shely', '$2a$07$azybxcags23425sdg23sdeanQZqjaf6Birm2NvcYTNtJw24CsO5uq', '2', '1', '78256987', null, '2025-07-09');

-- ----------------------------
-- Table structure for `usuarios_act`
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_act`;
CREATE TABLE `usuarios_act` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` enum('superusuario','administrador','vendedor','auxiliar') NOT NULL,
  `vendedor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `email` (`email`),
  KEY `vendedor_id` (`vendedor_id`),
  CONSTRAINT `usuarios_act_ibfk_1` FOREIGN KEY (`vendedor_id`) REFERENCES `vendedores` (`vendedor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of usuarios_act
-- ----------------------------

-- ----------------------------
-- Table structure for `vendedores`
-- ----------------------------
DROP TABLE IF EXISTS `vendedores`;
CREATE TABLE `vendedores` (
  `vendedor_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`vendedor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of vendedores
-- ----------------------------

-- ----------------------------
-- Table structure for `ventas`
-- ----------------------------
DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas` (
  `venta_id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_venta` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_entrega` date DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `codVendedor` int(11) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` enum('activo','anulado') DEFAULT 'activo',
  `nro_boleta` varchar(8) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `observa_venta` text DEFAULT NULL,
  `vendedorID` int(11) DEFAULT NULL,
  `tipoPago` int(11) DEFAULT NULL,
  `docuVenta` int(11) DEFAULT NULL,
  `usuarioID` int(11) DEFAULT NULL,
  `fecha_e` date DEFAULT NULL,
  PRIMARY KEY (`venta_id`),
  KEY `cliente_id` (`cliente_id`),
  KEY `vendedor_id` (`codVendedor`),
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`cliente_id`),
  CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`codVendedor`) REFERENCES `vendedores` (`vendedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ventas
-- ----------------------------
INSERT INTO `ventas` VALUES ('11', '2025-03-14 02:09:49', null, null, null, '654.07', 'activo', '00000001', 'Venta realizada con Nro Boleta: 00000001', null, null, null, null, null, '2025-03-14');
INSERT INTO `ventas` VALUES ('12', '2025-03-14 03:15:54', null, null, null, '502.00', 'activo', '00000002', 'Venta realizada con Nro Boleta: 00000002', null, null, null, null, null, '2025-03-14');
INSERT INTO `ventas` VALUES ('13', '2025-03-18 01:48:47', null, null, null, '298.25', 'activo', '00000003', 'Venta realizada con Nro Boleta: 00000003', null, null, null, null, null, '2025-03-18');
INSERT INTO `ventas` VALUES ('14', '2025-03-19 02:27:06', null, null, null, '88.37', 'activo', '00000004', 'Venta realizada con Nro Boleta: 00000004', null, null, null, null, null, '2025-03-19');
INSERT INTO `ventas` VALUES ('18', '2025-03-29 00:30:03', null, null, null, '152.34', 'activo', '00000008', 'Venta realizada con Nro Boleta: 00000008', null, null, null, null, null, '2025-03-29');
INSERT INTO `ventas` VALUES ('19', '2025-04-04 22:55:57', null, null, null, '330.30', 'activo', '00000009', 'Venta realizada con Nro Boleta: 00000009', null, null, null, null, null, '2025-04-04');
INSERT INTO `ventas` VALUES ('20', '2025-04-08 09:32:58', null, null, null, '405.00', 'activo', '00000010', 'Venta realizada con Nro Boleta: 00000010', null, null, null, null, null, '2025-04-08');
INSERT INTO `ventas` VALUES ('21', '2025-04-13 00:09:43', null, null, null, '177.60', 'activo', '00000011', 'Venta realizada con Nro Boleta: 00000011', null, null, null, null, null, '2025-04-13');
INSERT INTO `ventas` VALUES ('24', '2025-04-15 00:38:45', null, null, null, '248.84', 'activo', '00000014', 'Venta realizada con Nro Boleta: 00000014', null, null, null, null, null, '2025-04-15');
INSERT INTO `ventas` VALUES ('25', '2025-04-15 00:41:51', null, null, null, '305.76', 'activo', '00000015', 'Venta realizada con Nro Boleta: 00000015', null, null, null, null, null, '2025-04-15');
INSERT INTO `ventas` VALUES ('26', '2025-04-15 00:42:21', null, null, null, '428.84', 'activo', '00000016', 'Venta realizada con Nro Boleta: 00000016', null, null, null, null, null, '2025-04-15');
INSERT INTO `ventas` VALUES ('27', '2025-04-15 02:33:27', null, null, null, '599.60', 'activo', '00000017', 'Venta realizada con Nro Boleta: 00000017', null, null, null, null, null, '2025-04-15');
INSERT INTO `ventas` VALUES ('28', '2025-04-15 02:35:26', null, null, null, '258.91', 'activo', '00000018', 'Venta realizada con Nro Boleta: 00000018', null, null, null, null, null, '2025-04-15');
INSERT INTO `ventas` VALUES ('55', '2025-04-16 02:10:28', '2025-04-23', '1', null, '1019.20', 'activo', '00000019', 'Venta realizada con Nro Boleta: 00000019', 'TRANSFERENCIA LUNES 24', '6', null, null, null, '2025-04-16');
INSERT INTO `ventas` VALUES ('56', '2025-04-16 12:25:00', '2025-04-28', '1', null, '1514.20', 'activo', '00000020', 'Venta realizada con Nro Boleta: 00000020', 'PAGO EN EFECTIVO', '6', null, null, null, '2025-04-16');
INSERT INTO `ventas` VALUES ('57', '2025-04-16 12:29:32', '2025-04-29', '1', null, '1469.20', 'activo', '00000021', 'Venta realizada con Nro Boleta: 00000021', 'PAGO CON QR', '2', null, null, null, '2025-04-16');
INSERT INTO `ventas` VALUES ('58', '2025-04-16 12:36:45', '2025-04-21', '1', null, '235.13', 'activo', '00000022', 'Venta realizada con Nro Boleta: 00000022', 'PAGO RETRASADO', '6', null, null, null, '2025-04-16');
INSERT INTO `ventas` VALUES ('59', '2025-04-16 12:45:03', '2025-04-30', '1', null, '450.00', 'activo', '00000023', 'Venta realizada con Nro Boleta: 00000023', '', '2', null, null, null, '2025-04-16');
INSERT INTO `ventas` VALUES ('61', '2025-04-17 02:33:37', '2025-04-28', '3', null, '170.50', 'activo', '00000025', 'Venta realizada con Nro Boleta: 00000025', 'PRUEBA DE VENTA', '2', '2', '2', null, '2025-04-17');
INSERT INTO `ventas` VALUES ('62', '2025-04-25 01:04:10', '2025-04-25', '1', null, '319.50', 'activo', '00000026', 'Venta realizada con Nro Boleta: 00000026', '', '2', '2', '2', null, '2025-04-25');
INSERT INTO `ventas` VALUES ('63', '2025-04-30 11:36:58', '2025-05-11', '1', null, '1050.50', 'activo', '00000027', 'Venta realizada con Nro Boleta: 00000027', 'EL PAGO SE REALIZA CUANDO SE ENTREGA LA MERCADERIA', '2', '3', '2', null, '2025-04-30');
INSERT INTO `ventas` VALUES ('66', '2025-05-01 21:23:06', '2025-05-11', '3', null, '131.40', 'activo', '00000030', 'Venta realizada con Nro Boleta: 00000030', '', '2', '3', '1', '1', '2025-05-01');
INSERT INTO `ventas` VALUES ('67', '2025-05-01 21:28:29', '2025-05-11', '3', null, '867.21', 'activo', '00000031', 'Venta realizada con Nro Boleta: 00000031', '', '6', '2', '1', '2', '2025-05-01');
INSERT INTO `ventas` VALUES ('68', '2025-05-01 21:54:15', '2025-05-02', '1', null, '360.00', 'activo', '00000032', 'Venta realizada con Nro Boleta: 00000032', '', '2', '1', '1', '2', '2025-05-01');
INSERT INTO `ventas` VALUES ('69', '2025-05-01 22:04:40', '2025-05-03', '1', null, '269.52', 'activo', '00000033', 'Venta realizada con Nro Boleta: 00000033', '', '2', '1', '1', '2', '2025-05-01');
INSERT INTO `ventas` VALUES ('70', '2025-05-02 10:52:37', '2025-05-16', '1', null, '711.90', 'activo', '00000034', 'Venta realizada con Nro Boleta: 00000034', '', '6', '1', '1', '1', '2025-05-02');
INSERT INTO `ventas` VALUES ('71', '2025-05-02 11:16:34', '2025-05-29', '1', null, '629.40', 'activo', '00000035', 'Venta realizada con Nro Boleta: 00000035', '', '6', '1', '1', '1', '2025-05-02');
INSERT INTO `ventas` VALUES ('72', '2025-05-02 12:22:53', '2025-05-09', '1', null, '491.40', 'activo', '00000036', 'Venta realizada con Nro Boleta: 00000036', '', '2', '3', '1', '1', '2025-05-02');
INSERT INTO `ventas` VALUES ('73', '2025-05-02 22:17:37', '2025-05-04', '1', null, '409.50', 'activo', '00000037', 'Venta realizada con Nro Boleta: 00000037', '', '2', '1', '1', '1', '2025-05-02');
INSERT INTO `ventas` VALUES ('74', '2025-05-02 22:43:01', '2025-05-23', '1', null, '470.25', 'activo', '00000038', 'Venta realizada con Nro Boleta: 00000038', '', '2', '2', '2', '1', '2025-05-02');
INSERT INTO `ventas` VALUES ('75', '2025-05-02 22:55:22', '2025-05-03', '1', null, '450.00', 'activo', '00000039', 'Venta realizada con Nro Boleta: 00000039', '', '2', '1', '1', '1', '2025-05-02');
INSERT INTO `ventas` VALUES ('76', '2025-05-03 01:41:13', '2025-05-16', '1', null, '79.92', 'activo', '00000040', 'Venta realizada con Nro Boleta: 00000040', '', '2', '1', '1', '1', '2025-05-03');
INSERT INTO `ventas` VALUES ('77', '2025-05-04 19:21:01', '2025-05-11', '1', null, '2050.29', 'activo', '00000041', 'Venta realizada con Nro Boleta: 00000041', '', '2', '1', '1', '1', '2025-05-04');
INSERT INTO `ventas` VALUES ('78', '2025-05-26 10:21:02', '2025-05-31', '3', null, '122.48', 'activo', '00000042', 'Venta realizada con Nro Boleta: 00000042', '', '2', '1', '1', '1', '2025-05-26');
INSERT INTO `ventas` VALUES ('79', '2025-05-27 00:26:00', '2025-06-07', '3', null, '623.02', 'activo', '00000043', 'Venta realizada con Nro Boleta: 00000043', '', '2', '1', '1', '1', '2025-05-27');
INSERT INTO `ventas` VALUES ('80', '2025-05-27 14:09:02', '2025-05-31', '1', null, '356.00', 'activo', '00000044', 'Venta realizada con Nro Boleta: 00000044', '', '6', '1', '1', '1', '2025-05-27');
INSERT INTO `ventas` VALUES ('81', '2025-05-28 00:07:48', '2025-05-31', '1', null, '450.00', 'activo', '00000045', 'Venta realizada con Nro Boleta: 00000045', '', '2', '1', '1', '1', '2025-05-28');
INSERT INTO `ventas` VALUES ('83', '2025-06-01 14:33:36', '2025-06-03', '3', null, '130.00', 'activo', '00000046', 'Venta realizada con Nro Boleta: 00000046', '', '6', '1', '1', '1', '2025-06-01');
INSERT INTO `ventas` VALUES ('84', '2025-07-08 23:13:10', '2025-07-08', '4', null, '94500.00', 'activo', '00000047', 'Venta realizada con Nro Boleta: 00000047', '', '2', '1', '2', '1', '2025-07-08');
INSERT INTO `ventas` VALUES ('85', '2025-07-09 22:03:48', '2025-07-14', '4', null, '44094.05', 'activo', '00000048', 'Venta realizada con Nro Boleta: 00000048', '', '7', '1', '1', '1', '2025-07-09');
INSERT INTO `ventas` VALUES ('88', '2025-07-11 00:49:16', '2025-07-13', '4', null, '42000.00', 'activo', '00000051', 'Venta realizada con Nro Boleta: 00000051', '', '7', '1', '1', '1', '2025-07-11');
INSERT INTO `ventas` VALUES ('89', '2025-07-11 13:36:50', '2025-07-21', '4', null, '118200.00', 'activo', '00000052', 'Venta realizada con Nro Boleta: 00000052', '', '6', '1', '2', '1', '2025-07-11');
INSERT INTO `ventas` VALUES ('90', '2025-07-11 15:00:53', '2025-07-13', '4', null, '44000.00', 'activo', '00000053', 'Venta realizada con Nro Boleta: 00000053', '', '7', '1', '1', '1', '2025-07-11');
INSERT INTO `ventas` VALUES ('91', '2025-07-11 15:05:26', '2025-07-28', '1', null, '38600.00', 'activo', '00000054', 'Venta realizada con Nro Boleta: 00000054', '', '6', '1', '1', '1', '2025-07-11');
INSERT INTO `ventas` VALUES ('92', '2025-07-11 22:39:58', '2025-07-14', '1', null, '38970.00', 'activo', '00000055', 'Venta realizada con Nro Boleta: 00000055', '', '2', '1', '1', '1', '2025-07-11');
INSERT INTO `ventas` VALUES ('93', '2025-07-16 00:34:48', '2025-07-17', '1', null, '19485.00', 'activo', '00000056', 'Venta realizada con Nro Boleta: 00000056', '', '2', '1', '1', '1', '2025-07-16');
INSERT INTO `ventas` VALUES ('94', '2025-07-16 00:39:17', '2025-07-17', '1', null, '450.00', 'activo', '00000057', 'Venta realizada con Nro Boleta: 00000057', '', '7', '1', '1', '1', '2025-07-16');
INSERT INTO `ventas` VALUES ('95', '2025-07-16 01:21:45', '2025-07-23', '4', null, '509.60', 'activo', '00000058', 'Venta realizada con Nro Boleta: 00000058', '', '2', '1', '1', '1', '2025-07-16');
INSERT INTO `ventas` VALUES ('96', '2025-08-01 19:20:25', '2025-08-02', '1', null, '29600.00', 'activo', '00000059', 'Venta realizada con Nro Boleta: 00000059', '', '7', '1', '1', '1', '2025-08-01');
INSERT INTO `ventas` VALUES ('97', '2025-08-02 23:25:44', '2025-08-08', '4', null, '74000.00', 'activo', '00000060', 'Venta realizada con Nro Boleta: 00000060', '', '6', '1', '2', '1', '2025-08-02');
INSERT INTO `ventas` VALUES ('98', '2025-09-05 01:23:36', '2025-09-13', '4', null, '44280.00', 'activo', '00000061', 'Venta realizada con Nro Boleta: 00000061', '', '7', '1', '2', '1', '2025-09-05');
INSERT INTO `ventas` VALUES ('99', '2025-09-29 03:10:33', '2025-10-03', '3', null, '5742.00', 'activo', '00000062', 'Venta realizada con Nro Boleta: 00000062', '', '7', '1', '1', '1', '2025-09-29');

-- ----------------------------
-- Table structure for `ventas_copy`
-- ----------------------------
DROP TABLE IF EXISTS `ventas_copy`;
CREATE TABLE `ventas_copy` (
  `venta_id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_venta` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_entrega` date DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `codVendedor` int(11) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` enum('activo','anulado') DEFAULT 'activo',
  `nro_boleta` varchar(8) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `observa_venta` text DEFAULT NULL,
  `vendedorID` int(11) DEFAULT NULL,
  `tipoPago` int(11) DEFAULT NULL,
  `docuVenta` int(11) DEFAULT NULL,
  `usuarioID` int(11) DEFAULT NULL,
  PRIMARY KEY (`venta_id`),
  KEY `cliente_id` (`cliente_id`),
  KEY `vendedor_id` (`codVendedor`),
  CONSTRAINT `ventas_copy_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`cliente_id`),
  CONSTRAINT `ventas_copy_ibfk_2` FOREIGN KEY (`codVendedor`) REFERENCES `vendedores` (`vendedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ventas_copy
-- ----------------------------
INSERT INTO `ventas_copy` VALUES ('11', '2025-03-14 02:09:49', null, null, null, '654.07', 'activo', '00000001', 'Venta realizada con Nro Boleta: 00000001', null, null, null, null, null);
INSERT INTO `ventas_copy` VALUES ('12', '2025-03-14 03:15:54', null, null, null, '502.00', 'activo', '00000002', 'Venta realizada con Nro Boleta: 00000002', null, null, null, null, null);
INSERT INTO `ventas_copy` VALUES ('13', '2025-03-18 01:48:47', null, null, null, '298.25', 'activo', '00000003', 'Venta realizada con Nro Boleta: 00000003', null, null, null, null, null);
INSERT INTO `ventas_copy` VALUES ('14', '2025-03-19 02:27:06', null, null, null, '88.37', 'activo', '00000004', 'Venta realizada con Nro Boleta: 00000004', null, null, null, null, null);
INSERT INTO `ventas_copy` VALUES ('18', '2025-03-29 00:30:03', null, null, null, '152.34', 'activo', '00000008', 'Venta realizada con Nro Boleta: 00000008', null, null, null, null, null);
INSERT INTO `ventas_copy` VALUES ('19', '2025-04-04 22:55:57', null, null, null, '330.30', 'activo', '00000009', 'Venta realizada con Nro Boleta: 00000009', null, null, null, null, null);
INSERT INTO `ventas_copy` VALUES ('20', '2025-04-08 09:32:58', null, null, null, '405.00', 'activo', '00000010', 'Venta realizada con Nro Boleta: 00000010', null, null, null, null, null);
INSERT INTO `ventas_copy` VALUES ('21', '2025-04-13 00:09:43', null, null, null, '177.60', 'activo', '00000011', 'Venta realizada con Nro Boleta: 00000011', null, null, null, null, null);
INSERT INTO `ventas_copy` VALUES ('24', '2025-04-15 00:38:45', null, null, null, '248.84', 'activo', '00000014', 'Venta realizada con Nro Boleta: 00000014', null, null, null, null, null);
INSERT INTO `ventas_copy` VALUES ('25', '2025-04-15 00:41:51', null, null, null, '305.76', 'activo', '00000015', 'Venta realizada con Nro Boleta: 00000015', null, null, null, null, null);
INSERT INTO `ventas_copy` VALUES ('26', '2025-04-15 00:42:21', null, null, null, '428.84', 'activo', '00000016', 'Venta realizada con Nro Boleta: 00000016', null, null, null, null, null);
INSERT INTO `ventas_copy` VALUES ('27', '2025-04-15 02:33:27', null, null, null, '599.60', 'activo', '00000017', 'Venta realizada con Nro Boleta: 00000017', null, null, null, null, null);
INSERT INTO `ventas_copy` VALUES ('28', '2025-04-15 02:35:26', null, null, null, '258.91', 'activo', '00000018', 'Venta realizada con Nro Boleta: 00000018', null, null, null, null, null);
INSERT INTO `ventas_copy` VALUES ('55', '2025-04-16 02:10:28', '2025-04-23', '1', null, '1019.20', 'activo', '00000019', 'Venta realizada con Nro Boleta: 00000019', 'TRANSFERENCIA LUNES 24', '6', null, null, null);
INSERT INTO `ventas_copy` VALUES ('56', '2025-04-16 12:25:00', '2025-04-28', '1', null, '1514.20', 'activo', '00000020', 'Venta realizada con Nro Boleta: 00000020', 'PAGO EN EFECTIVO', '6', null, null, null);
INSERT INTO `ventas_copy` VALUES ('57', '2025-04-16 12:29:32', '2025-04-29', '1', null, '1469.20', 'activo', '00000021', 'Venta realizada con Nro Boleta: 00000021', 'PAGO CON QR', '2', null, null, null);
INSERT INTO `ventas_copy` VALUES ('58', '2025-04-16 12:36:45', '2025-04-21', '1', null, '235.13', 'activo', '00000022', 'Venta realizada con Nro Boleta: 00000022', 'PAGO RETRASADO', '6', null, null, null);
INSERT INTO `ventas_copy` VALUES ('59', '2025-04-16 12:45:03', '2025-04-30', '1', null, '450.00', 'activo', '00000023', 'Venta realizada con Nro Boleta: 00000023', '', '2', null, null, null);
INSERT INTO `ventas_copy` VALUES ('61', '2025-04-17 02:33:37', '2025-04-28', '3', null, '170.50', 'activo', '00000025', 'Venta realizada con Nro Boleta: 00000025', 'PRUEBA DE VENTA', '2', '2', '2', null);
INSERT INTO `ventas_copy` VALUES ('62', '2025-04-25 01:04:10', '2025-04-25', '1', null, '319.50', 'activo', '00000026', 'Venta realizada con Nro Boleta: 00000026', '', '2', '2', '2', null);
INSERT INTO `ventas_copy` VALUES ('63', '2025-04-30 11:36:58', '2025-05-11', '1', null, '1050.50', 'activo', '00000027', 'Venta realizada con Nro Boleta: 00000027', 'EL PAGO SE REALIZA CUANDO SE ENTREGA LA MERCADERIA', '2', '3', '2', null);
INSERT INTO `ventas_copy` VALUES ('66', '2025-05-01 21:23:06', '2025-05-11', '3', null, '131.40', 'activo', '00000030', 'Venta realizada con Nro Boleta: 00000030', '', '2', '3', '1', '1');
INSERT INTO `ventas_copy` VALUES ('67', '2025-05-01 21:28:29', '2025-05-11', '3', null, '867.21', 'activo', '00000031', 'Venta realizada con Nro Boleta: 00000031', '', '6', '2', '1', '2');
INSERT INTO `ventas_copy` VALUES ('68', '2025-05-01 21:54:15', '2025-05-02', '1', null, '360.00', 'activo', '00000032', 'Venta realizada con Nro Boleta: 00000032', '', '2', '1', '1', '2');
INSERT INTO `ventas_copy` VALUES ('69', '2025-05-01 22:04:40', '2025-05-03', '1', null, '269.52', 'activo', '00000033', 'Venta realizada con Nro Boleta: 00000033', '', '2', '1', '1', '2');
INSERT INTO `ventas_copy` VALUES ('70', '2025-05-02 10:52:37', '2025-05-16', '1', null, '711.90', 'activo', '00000034', 'Venta realizada con Nro Boleta: 00000034', '', '6', '1', '1', '1');
INSERT INTO `ventas_copy` VALUES ('71', '2025-05-02 11:16:34', '2025-05-29', '1', null, '629.40', 'activo', '00000035', 'Venta realizada con Nro Boleta: 00000035', '', '6', '1', '1', '1');
INSERT INTO `ventas_copy` VALUES ('72', '2025-05-02 12:22:53', '2025-05-09', '1', null, '491.40', 'activo', '00000036', 'Venta realizada con Nro Boleta: 00000036', '', '2', '3', '1', '1');
INSERT INTO `ventas_copy` VALUES ('73', '2025-05-02 22:17:37', '2025-05-04', '1', null, '409.50', 'activo', '00000037', 'Venta realizada con Nro Boleta: 00000037', '', '2', '1', '1', '1');
INSERT INTO `ventas_copy` VALUES ('74', '2025-05-02 22:43:01', '2025-05-23', '1', null, '470.25', 'activo', '00000038', 'Venta realizada con Nro Boleta: 00000038', '', '2', '2', '2', '1');
INSERT INTO `ventas_copy` VALUES ('75', '2025-05-02 22:55:22', '2025-05-03', '1', null, '450.00', 'activo', '00000039', 'Venta realizada con Nro Boleta: 00000039', '', '2', '1', '1', '1');
INSERT INTO `ventas_copy` VALUES ('76', '2025-05-03 01:41:13', '2025-05-16', '1', null, '79.92', 'activo', '00000040', 'Venta realizada con Nro Boleta: 00000040', '', '2', '1', '1', '1');
INSERT INTO `ventas_copy` VALUES ('77', '2025-05-04 19:21:01', '2025-05-11', '1', null, '2050.29', 'activo', '00000041', 'Venta realizada con Nro Boleta: 00000041', '', '2', '1', '1', '1');

-- ----------------------------
-- Procedure structure for `auxiliar_actualizadetalleventa`
-- ----------------------------
DROP PROCEDURE IF EXISTS `auxiliar_actualizadetalleventa`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `auxiliar_actualizadetalleventa`(IN `p_codigo_producto` VARCHAR(20), IN `p_cantidad` FLOAT, IN `p_id` INT)
    NO SQL
BEGIN

declare v_nro_boleta varchar(20);
declare v_total_venta float;

/*ACTUALIZAR EL STOCK DEL PRODUCTO QUE SE MODIFICO*/

/*ACTUALIZAR EL  CODGI, CANTIDAD Y TOAL DEL ITEM QUE SE MODIFICO*/

UPDATE detalle_ventas 
SET codigo_producto = p_codigo_producto, 
cantidad = p_cantidad, 
precio = (p_cantidad * (select precio_venta from productos where codigo_producto = p_codigo_producto)) 
WHERE detalle_venta_id = p_id;

set v_nro_boleta = (select nro_boleta from detalle_ventas where detalle_venta_id = p_id); 
set v_total_venta = (select sum(precio) from detalle_ventas where nro_boleta = v_nro_boleta);

UPDATE ventas 
SET total = v_total_venta
WHERE nro_boleta = v_nro_boleta;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `aux_ActualizaOfertaDetalle`
-- ----------------------------
DROP PROCEDURE IF EXISTS `aux_ActualizaOfertaDetalle`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `aux_ActualizaOfertaDetalle`(IN `p_codigo_producto` VARCHAR(20), IN `p_cantidad` FLOAT, IN `p_id` INT)
    NO SQL
BEGIN

declare v_nro_boleta varchar(20);
declare v_total_oferta float;

/*ACTUALIZAR EL STOCK DEL PRODUCTO QUE SE MODIFICO*/

/*ACTUALIZAR EL  CODGI, CANTIDAD Y TOAL DEL ITEM QUE SE MODIFICO*/

UPDATE detalle_ofertas 
SET codigo_producto = p_codigo_producto, 
cantidad = p_cantidad, 
precio = (p_cantidad * (select precio_venta from productos where codigo_producto = p_codigo_producto)) 
WHERE detalle_oferta_id = p_id;

set v_nro_boleta = (select nro_boleta from detalle_ofertas where detalle_oferta_id = p_id); 
set v_total_oferta = (select sum(precio) from detalle_ofertas where nro_oferta = v_nro_boleta);

UPDATE ofertas
SET total_oferta = v_total_oferta
WHERE nro_oferta = v_nro_boleta;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `bck_ActualizarDetalleVenta`
-- ----------------------------
DROP PROCEDURE IF EXISTS `bck_ActualizarDetalleVenta`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `bck_ActualizarDetalleVenta`(IN `p_codigo_producto` VARCHAR(20), IN `p_cantidad` FLOAT, IN `p_id` INT)
    NO SQL
BEGIN

declare v_nro_boleta varchar(20);
declare v_total_venta float;

/*ACTUALIZAR EL STOCK DEL PRODUCTO QUE SE MODIFICO*/

/*ACTUALIZAR EL  CODGI, CANTIDAD Y TOAL DEL ITEM QUE SE MODIFICO*/

UPDATE detalle_ventas 
SET codigo_producto = p_codigo_producto, 
cantidad = p_cantidad,
total_producto = (p_cantidad * (precio-(precio*descuento_porcentual/100)))
WHERE detalle_venta_id = p_id;

set v_nro_boleta = (select nro_boleta from detalle_ventas where detalle_venta_id = p_id); 
set v_total_venta = (select sum(total_producto) from detalle_ventas where nro_boleta = v_nro_boleta);

UPDATE ventas 
SET total = v_total_venta
WHERE nro_boleta = v_nro_boleta;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `pcr_ActualizarStockProducto`
-- ----------------------------
DROP PROCEDURE IF EXISTS `pcr_ActualizarStockProducto`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pcr_ActualizarStockProducto`(IN `p_codigo_producto` VARCHAR(20), IN `p_cantidad` FLOAT, IN `p_id` INT)
    MODIFIES SQL DATA
BEGIN

declare v_cantidad_anterior int;
declare v_stock_new int;
declare v_stock_actual int;

    SELECT cantidad
    INTO v_cantidad_anterior
    FROM detalle_ventas
    WHERE detalle_venta_id = p_id;

    SELECT stock
    INTO v_stock_actual
    FROM productos
    WHERE codigo_producto = p_codigo_producto;


/*ACTUALIZAR EL STOCK DEL PRODUCTO QUE SE MODIFICO*/

UPDATE productos
    SET stock = v_stock_actual - (p_cantidad - v_cantidad_anterior)
    WHERE codigo_producto = p_codigo_producto;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `prc_ActualizaDetalleOferta`
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_ActualizaDetalleOferta`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_ActualizaDetalleOferta`(IN `p_codigo_producto` VARCHAR(20), IN `p_cantidad` FLOAT, IN `p_id` INT)
    NO SQL
BEGIN

declare v_nro_boleta varchar(20);
declare v_nro_boleta_ofe varchar(20);
declare v_total_oferta float;

declare v_cantidad_anterior int;
declare v_cantidad_oferta int;
declare v_stock_new int;
declare v_stock_actual int;


/*ACTUALIZAR EL STOCK DEL PRODUCTO QUE SE MODIFICO*/

    SELECT cantidad
    INTO v_cantidad_anterior
    FROM detalle_ofertas
    WHERE detalle_oferta_id = p_id;

    SELECT stock
    INTO v_stock_actual
    FROM productos
    WHERE codigo_producto = p_codigo_producto;

set v_nro_boleta_ofe = (select nro_oferta from detalle_ofertas where detalle_oferta_id = p_id);

		SELECT cantidad_oferta
    INTO v_cantidad_oferta
    FROM ofertas
    WHERE nro_oferta = v_nro_boleta_ofe;

UPDATE productos
SET stock = v_stock_actual - (p_cantidad - v_cantidad_anterior)
WHERE codigo_producto = p_codigo_producto;

/*ACTUALIZAR EL  CODGI, CANTIDAD Y TOAL DEL ITEM QUE SE MODIFICO*/

UPDATE detalle_ofertas 
SET codigo_producto = p_codigo_producto, 
cantidad = p_cantidad, 
total_producto = (p_cantidad * (select precio_venta from productos where codigo_producto = p_codigo_producto)) 
WHERE detalle_oferta_id = p_id;

set v_nro_boleta = (select nro_oferta from detalle_ofertas where detalle_oferta_id = p_id); 
set v_total_oferta = (select sum(total_producto) from detalle_ofertas where nro_oferta = v_nro_boleta);

UPDATE ofertas
SET total_oferta = v_total_oferta
WHERE nro_oferta = v_nro_boleta;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `prc_ActualizarDetalleVenta`
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_ActualizarDetalleVenta`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_ActualizarDetalleVenta`(IN `p_codigo_producto` VARCHAR(20), IN `p_cantidad` FLOAT, IN `p_id` INT)
    NO SQL
BEGIN

declare v_nro_boleta varchar(20);
declare v_total_venta float;

declare v_cantidad_anterior int;
declare v_stock_new int;
declare v_stock_actual int;

/*ACTUALIZAR EL STOCK DEL PRODUCTO QUE SE MODIFICO*/

    SELECT cantidad
    INTO v_cantidad_anterior
    FROM detalle_ventas
    WHERE detalle_venta_id = p_id;

    SELECT stock
    INTO v_stock_actual
    FROM productos
    WHERE codigo_producto = p_codigo_producto;
		
UPDATE productos
SET stock = v_stock_actual - (p_cantidad - v_cantidad_anterior)
WHERE codigo_producto = p_codigo_producto;

/*ACTUALIZAR EL  CODGI, CANTIDAD Y TOAL DEL ITEM QUE SE MODIFICO*/

UPDATE detalle_ventas 
SET codigo_producto = p_codigo_producto, 
cantidad = p_cantidad,
total_producto = (p_cantidad * (precio-(precio*descuento_porcentual/100)))
WHERE detalle_venta_id = p_id;

set v_nro_boleta = (select nro_boleta from detalle_ventas where detalle_venta_id = p_id); 
set v_total_venta = (select sum(total_producto) from detalle_ventas where nro_boleta = v_nro_boleta);

UPDATE ventas 
SET total = v_total_venta
WHERE nro_boleta = v_nro_boleta;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `prc_ContarSubcategorias`
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_ContarSubcategorias`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_ContarSubcategorias`()
BEGIN
    SELECT c.categoria_id AS categoria_id, c.nombre AS nombre, COUNT(s.categoria_id) AS subcategoria, date(fecha) as fecha_creacion, '' as opciones
    FROM categorias c
    LEFT JOIN subcategorias s ON c.categoria_id = s.categoria_id
    GROUP BY c.categoria_id, c.nombre;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `prc_datosDashboard`
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_datosDashboard`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_datosDashboard`()
BEGIN
	SELECT Concat('Boleta Nro: ',dv.nro_boleta,' - Total Venta: Bs. ',Round(v.total,2)) as nro_boleta,
				dv.codigo_producto,
				c.nombre,
				p.nombre,dv.cantidad,                            
				concat('Bs. ',round(dv.precio,2)) as precio,
				v.fecha_venta
				FROM detalle_ventas dv 
				inner join productos p on dv.codigo_producto = p.codigo_producto
				inner join ventas v on cast(v.nro_boleta as integer) = cast(dv.nro_boleta as integer)
				inner join categorias c on c.categoria_id = p.categoria_id
	where DATE(v.fecha_venta) >= date('2025-01-01') and DATE(v.fecha_venta) <= date('2025-01-10')
	order by dv.nro_boleta asc;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `prc_EliminarDetalleOferta`
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_EliminarDetalleOferta`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_EliminarDetalleOferta`(IN `p_id` INT)
    NO SQL
BEGIN

declare v_nro_boleta varchar(20);
declare v_total_oferta float;

/*ACTUALIZAR EL STOCK DEL PRODUCTO QUE SE MODIFICO*/

/*ACTUALIZAR EL  CODGI, CANTIDAD Y TOAL DEL ITEM QUE SE MODIFICO*/

DELETE FROM detalle_ofertas 
WHERE detalle_oferta_id = p_id;

set v_nro_boleta = (select nro_oferta from detalle_ofertas where detalle_oferta_id = p_id); 
set v_total_oferta = (select sum(precio) from detalle_ofertas where nro_oferta = v_nro_boleta);

UPDATE ofertas 
SET total_oferta = v_total_oferta
WHERE nro_oferta = v_nro_boleta;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `prc_EliminarDetalleVenta`
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_EliminarDetalleVenta`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_EliminarDetalleVenta`(IN `p_id` INT)
    NO SQL
BEGIN

declare v_nro_boleta varchar(20);
declare v_total_venta float;

/*ACTUALIZAR EL STOCK DEL PRODUCTO QUE SE MODIFICO*/

/*ACTUALIZAR EL  CODGI, CANTIDAD Y TOAL DEL ITEM QUE SE MODIFICO*/

DELETE FROM detalle_ventas 
WHERE detalle_venta_id = p_id;

set v_nro_boleta = (select nro_boleta from detalle_ventas where detalle_venta_id = p_id); 
set v_total_venta = (select sum(precio) from detalle_ventas where nro_boleta = v_nro_boleta);

UPDATE ventas 
SET total = v_total_venta
WHERE nro_boleta = v_nro_boleta;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `prc_eliminar_venta`
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_eliminar_venta`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_eliminar_venta`(IN `p_nro_boleta` VARCHAR(8))
    NO SQL
BEGIN

DECLARE v_codigo VARCHAR(20);
DECLARE v_cantidad FLOAT;
DECLARE done INT DEFAULT FALSE;

DECLARE cursor_i CURSOR FOR 
SELECT codigo_producto,cantidad 
FROM detalle_ventas
where CAST(nro_boleta AS CHAR CHARACTER SET utf8)  = CAST(p_nro_boleta AS CHAR CHARACTER SET utf8) ;

DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

OPEN cursor_i;
read_loop: LOOP
FETCH cursor_i INTO v_codigo, v_cantidad;

	IF done THEN
	  LEAVE read_loop;
	END IF;
    
    UPDATE PRODUCTOS 
       SET stock = stock + v_cantidad
    WHERE CAST(codigo_producto AS CHAR CHARACTER SET utf8) = CAST(v_codigo AS CHAR CHARACTER SET utf8);

END LOOP;
CLOSE cursor_i;

 DELETE FROM detalle_ventas WHERE CAST(nro_boleta AS CHAR CHARACTER SET utf8) = CAST(p_nro_boleta AS CHAR CHARACTER SET utf8) ;
    DELETE FROM ventas WHERE CAST(nro_boleta AS CHAR CHARACTER SET utf8)  = CAST(p_nro_boleta AS CHAR CHARACTER SET utf8) ;

SELECT 'Se eliminó correctamente la venta';
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `prc_ListarProductos`
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_ListarProductos`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_ListarProductos`()
    NO SQL
BEGIN
SELECT '' as detalles,
				p.producto_id,
        p.codigo_producto,
        p.nombre,
        c.nombre as ncategoria,
        s.nombre as nsubcate,
        p.stock,
        round(p.precio_compra,2) as precio_compra,
        round(p.precio_venta,2) as precio_venta,
        p.descuento,
        pr.nombre_empresa,
        '' as opciones,
				p.precio_feria,
				p.precio_oferta,
        p.categoria_id,
				p.subcategoria_id,
				p.unidad_medida,
				p.documento,
				p.proveedor_id
FROM productos p 
left join categorias c on p.categoria_id = c.categoria_id
left join subcategorias s on p.subcategoria_id = s.subcategoria_id
left join proveedores pr on p.proveedor_id = pr.proveedor_id
ORDER BY date(fecha_alta) DESC;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `prc_ListarProductosInventario`
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_ListarProductosInventario`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_ListarProductosInventario`()
    NO SQL
BEGIN
SELECT '' as detalles,
				'' as acciones,
				p.producto_id,
        p.codigo_producto,
        upper(p.nombre),
        upper(c.nombre) as ncategoria,
        upper(s.nombre) as nsubcate,
        p.stock,
        round(p.precio_compra,2) as precio_compra,
        round(p.precio_venta,2) as precio_venta,
        p.descuento,
        pr.nombre_empresa,
				p.precio_feria,
				p.precio_oferta,
        p.categoria_id,
				p.subcategoria_id,
				p.unidad_medida,
				p.documento,
				p.proveedor_id
FROM productos p 
left join categorias c on p.categoria_id = c.categoria_id
left join subcategorias s on p.subcategoria_id = s.subcategoria_id
left join proveedores pr on p.proveedor_id = pr.proveedor_id
ORDER BY date(fecha_alta) DESC;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `prc_ListarVentas`
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_ListarVentas`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_ListarVentas`()
    NO SQL
BEGIN
SELECT '' as detalles, 
			'' as opciones,
			v.venta_id,
			v.nro_boleta,
			v.fecha_e,
			v.cliente_id,
			upper(c.nombre) as nom_cliente,
			vendedorID,
			upper(u.nombre_usuario) as nom_vendedor,
			format(v.total,2) as total,
			v.usuarioID,
			v.estado
FROM ventas v
INNER JOIN clientes c ON v.cliente_id = c.cliente_id
INNER JOIN usuarios u ON v.vendedorID = u.id_usuario 
ORDER BY v.nro_boleta DESC;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `prc_ObtenerDatosTablero`
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_ObtenerDatosTablero`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_ObtenerDatosTablero`()
BEGIN
declare totalProductos int;
declare totalVentas float;
declare totalOfertas int;
declare totalClientes int;

SET totalProductos = (SELECT count(*) FROM productos p);

SET totalVentas = (SELECT sum(v.total) FROM ventas v WHERE month(v.fecha_venta) = MONTH(CURRENT_DATE()));

SET totalOfertas = (SELECT count(*) FROM ofertas o);

SET totalClientes = (SELECT count(*) FROM clientes c);
                     
SELECT 	ifnull(totalProductos,0) AS totalProductos,
		ifnull(round(totalVentas,2),0) AS totalVentas,
        ifnull(totalOfertas,0) AS totalOfertas,
        ifnull(totalClientes,0) AS totalClientes;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `prc_ObtenerNroBoleta`
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_ObtenerNroBoleta`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_ObtenerNroBoleta`()
    NO SQL
select serie_boleta,
		IFNULL(LPAD(max(c.nro_correlativo_venta)+1,8,'0'),'00000001') nro_venta
from empresa c
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `prc_ObtenerNroOferta`
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_ObtenerNroOferta`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_ObtenerNroOferta`()
    NO SQL
select gestion_oferta,
		IFNULL(LPAD(max(m.nro_oferta_correlativo)+1,8,'0'),'00000001') nro_ofertas
from master_ofertas m
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `prc_ObtenerVentasMesActual`
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_ObtenerVentasMesActual`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_ObtenerVentasMesActual`()
    NO SQL
BEGIN
SELECT date(v.fecha_venta) as fecha_venta,
	sum(round(v.total,2)) as total_venta
from ventas v
where date(v.fecha_venta) >= date(last_day(now() - interval 1 month) + interval 1 day)
and date(v.fecha_venta) <= last_day(date(current_date))
group by date(v.fecha_venta);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `actualizar_stock_after_compra`;
DELIMITER ;;
CREATE TRIGGER `actualizar_stock_after_compra` AFTER INSERT ON `detalle_compras` FOR EACH ROW BEGIN
    UPDATE productos
    SET stock = stock + NEW.cantidad
    WHERE producto_id = NEW.producto_id;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `actualizar_stock_venta`;
DELIMITER ;;
CREATE TRIGGER `actualizar_stock_venta` AFTER UPDATE ON `detalle_ventas` FOR EACH ROW BEGIN
    DECLARE diferencia INT;
    
    -- Verificar si hubo cambio de producto o cantidad
    IF OLD.producto_id <> NEW.producto_id OR OLD.cantidad <> NEW.cantidad THEN
    
        -- Caso 1: Cambio de producto
        IF OLD.producto_id <> NEW.producto_id THEN
            -- Revertir stock anterior
            UPDATE productos 
            SET stock = stock + OLD.cantidad
            WHERE producto_id = OLD.producto_id;
            
            -- Actualizar nuevo stock
            UPDATE productos 
            SET stock = stock - NEW.cantidad
            WHERE producto_id = NEW.producto_id;
            
        -- Caso 2: Mismo producto, cantidad modificada
        ELSE
            SET diferencia = OLD.cantidad - NEW.cantidad;
            
            UPDATE productos
            SET stock = stock + diferencia
            WHERE producto_id = NEW.producto_id;
        END IF;
        
    END IF;
END
;;
DELIMITER ;

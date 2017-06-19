/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : gym

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-06-19 01:23:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for antagonics
-- ----------------------------
DROP TABLE IF EXISTS `antagonics`;
CREATE TABLE `antagonics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `muscle_id` int(11) NOT NULL,
  `antagonic_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `antagonics_muscle_id_foreign` (`muscle_id`),
  KEY `antagonics_antagonic_id_foreign` (`antagonic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of antagonics
-- ----------------------------

-- ----------------------------
-- Table structure for exercises
-- ----------------------------
DROP TABLE IF EXISTS `exercises`;
CREATE TABLE `exercises` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(10) unsigned DEFAULT NULL,
  `use_weight` tinyint(1) NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_phase_id` int(10) unsigned NOT NULL,
  `experience_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exercises_training_phase_id_foreign` (`training_phase_id`),
  KEY `exercises_experience_id_foreign` (`experience_id`)
) ENGINE=MyISAM AUTO_INCREMENT=138 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of exercises
-- ----------------------------
INSERT INTO `exercises` VALUES ('1', 'Trotar en el sitio', 'Correr', '0', '0', 'fotos_ejercicios/1.jpg', '1', '1', '2017-04-08 12:59:51', '2017-04-08 12:59:51', null);
INSERT INTO `exercises` VALUES ('2', 'Press de barra en maquina o con carga guiada', 'asd', '1', '1', 'fotos_ejercicios/2.jpg', '2', '1', '2017-04-08 13:03:30', '2017-04-08 13:03:30', null);
INSERT INTO `exercises` VALUES ('43', 'Press de banca plano', 'asd', '1', '1', 'fotos_ejercicios/43.jpg', '2', '1', '2017-04-22 23:11:27', '2017-04-22 23:11:27', null);
INSERT INTO `exercises` VALUES ('4', 'Jumping Jack', 'Salta', '0', '0', 'fotos_ejercicios/4.jpg', '1', '1', '2017-04-08 13:25:52', '2017-04-08 13:25:52', null);
INSERT INTO `exercises` VALUES ('5', 'Tocar puntas', 'Tocar puntas', '0', '0', 'fotos_ejercicios/5.jpg', '1', '1', '2017-04-08 13:30:25', '2017-04-08 13:30:25', null);
INSERT INTO `exercises` VALUES ('6', 'Codo a rodilla', 'Ponte de pie con las piernas separadas a la altura de los hombros y las manos detrás de la nuca. Levanta la rodilla derecha todo lo que puedas al mismo tiempo que bajas tu codo izquierdo sin separar la mano de la cabeza e intenta que se toquen el codo y la rodilla. Vuelve a la posición inicial y repite alternando brazos y piernas.', '1', '0', 'fotos_ejercicios/6.jpg', '1', '1', '2017-04-08 13:37:06', '2017-04-08 13:37:06', null);
INSERT INTO `exercises` VALUES ('7', 'Eliptica', 'Eliptica', '0', '0', 'fotos_ejercicios/7.jpg', '2', '1', '2017-04-08 14:02:51', '2017-04-08 14:02:51', null);
INSERT INTO `exercises` VALUES ('8', 'Correr en Faja', 'Correr', '0', '0', 'fotos_ejercicios/8.jpg', '2', '1', '2017-04-08 14:09:24', '2017-04-08 14:09:24', null);
INSERT INTO `exercises` VALUES ('9', 'Zancadas con salto', 'De pie, con las piernas juntas y los brazos pegados al cuerpo, después das un pequeño salto al mismo tiempo que das una zancada, pero sin moverte del sitio acompañando el movimiento con los brazos. Repite alternando piernas', '0', '0', 'fotos_ejercicios/9.jpg', '1', '1', null, null, null);
INSERT INTO `exercises` VALUES ('10', 'Espalda superior', 'Esda', '1', '0', 'fotos_ejercicios/10.jpg', '3', '1', '2017-04-16 12:40:12', '2017-04-16 12:40:12', null);
INSERT INTO `exercises` VALUES ('11', 'Espalda media', 'ada', '1', '0', 'fotos_ejercicios/11.jpg', '3', '1', '2017-04-16 12:44:15', '2017-04-16 12:44:15', null);
INSERT INTO `exercises` VALUES ('12', 'Pectorales', 'das', '1', '0', 'fotos_ejercicios/12.jpg', '3', '1', '2017-04-16 13:32:51', '2017-04-16 13:32:51', null);
INSERT INTO `exercises` VALUES ('13', 'Aperturas con mancuernas en banco plano', 'asd', '1', '1', 'fotos_ejercicios/13.jpg', '2', '1', '2017-04-22 22:06:55', '2017-04-22 22:06:55', null);
INSERT INTO `exercises` VALUES ('14', 'Curl biceps concentrado con apoyo en el muslo', 'asd', '1', '1', 'fotos_ejercicios/14.jpg', '2', '1', '2017-04-22 22:25:08', '2017-04-22 22:25:08', null);
INSERT INTO `exercises` VALUES ('15', 'Curl de biceps alternos con supinacion', 'asd', '1', '1', 'fotos_ejercicios/15.jpg', '2', '1', '2017-04-22 22:27:16', '2017-04-22 22:27:16', null);
INSERT INTO `exercises` VALUES ('16', 'Elevaciones del tronco en banco inclinado', 'asd', '1', '0', 'fotos_ejercicios/16.jpg', '2', '1', '2017-04-22 22:30:26', '2017-04-22 22:30:26', null);
INSERT INTO `exercises` VALUES ('17', 'Elevaciones frontales alternadas con mancuernas', 'asd', '1', '1', 'fotos_ejercicios/17.jpg', '2', '1', '2017-04-22 22:31:19', '2017-04-22 22:31:19', null);
INSERT INTO `exercises` VALUES ('18', 'Elevaciones laterales tronco inclinado hacia adelante - pajaro', 'asd', '1', '1', 'fotos_ejercicios/18.jpg', '2', '1', '2017-04-22 22:33:55', '2017-04-22 22:33:55', null);
INSERT INTO `exercises` VALUES ('19', 'Elevaciones laterales de los brazos con mancuernas', 'asd', '1', '1', 'fotos_ejercicios/19.jpg', '2', '1', '2017-04-22 22:34:46', '2017-04-22 22:34:46', null);
INSERT INTO `exercises` VALUES ('20', 'Elevaciones frontales con mancuerna', 'asd', '1', '1', 'fotos_ejercicios/20.jpg', '2', '1', '2017-04-22 22:35:37', '2017-04-22 22:35:37', null);
INSERT INTO `exercises` VALUES ('21', 'Encogimiento de hombros con barra', 'asd', '1', '1', 'fotos_ejercicios/21.jpg', '2', '1', '2017-04-22 22:40:42', '2017-04-22 22:40:42', null);
INSERT INTO `exercises` VALUES ('22', 'Encogimiento y rotacion de hombros con mancuernas', 'asd', '1', '1', 'fotos_ejercicios/22.jpg', '2', '1', '2017-04-22 22:41:32', '2017-04-22 22:41:32', null);
INSERT INTO `exercises` VALUES ('23', 'Extension alternada de los antebrazos con mancuerna tronco inclinado hacia adelante', 'asd', '1', '1', 'fotos_ejercicios/23.jpg', '2', '1', '2017-04-22 22:43:49', '2017-04-22 22:43:49', null);
INSERT INTO `exercises` VALUES ('24', 'Extension de los antebrazos sentado con una mancuerna cogida a dos manos', 'asd', '1', '1', 'fotos_ejercicios/24.jpg', '2', '1', '2017-04-22 22:44:37', '2017-04-22 22:44:37', null);
INSERT INTO `exercises` VALUES ('25', 'Extensiones verticales alternadas de los brazos con mancuerna', 'asd', '1', '1', 'fotos_ejercicios/25.jpg', '2', '1', '2017-04-22 22:45:38', '2017-04-22 22:45:38', null);
INSERT INTO `exercises` VALUES ('26', 'Flexion lateral del tronco con mancuerna', 'as', '1', '1', 'fotos_ejercicios/26.jpg', '2', '1', '2017-04-22 22:47:16', '2017-04-22 22:47:16', null);
INSERT INTO `exercises` VALUES ('27', 'Pajaro agachado', 'asd', '1', '1', 'fotos_ejercicios/27.jpg', '2', '1', '2017-04-22 22:48:06', '2017-04-22 22:48:06', null);
INSERT INTO `exercises` VALUES ('28', 'Peso muerto piernas semirrigidas', 'asd', '1', '1', 'fotos_ejercicios/28.jpg', '2', '1', '2017-04-22 22:48:51', '2017-04-22 22:48:51', null);
INSERT INTO `exercises` VALUES ('29', 'Polea trasnuca', 'ASD', '1', '1', 'fotos_ejercicios/29.jpg', '2', '1', '2017-04-22 22:49:40', '2017-04-22 22:49:40', null);
INSERT INTO `exercises` VALUES ('30', 'Press con mancuernas en banco inclinado', 'asd', '1', '1', 'fotos_ejercicios/30.jpg', '2', '1', '2017-04-22 22:52:01', '2017-04-22 22:52:01', null);
INSERT INTO `exercises` VALUES ('31', 'Press con mancuernas en banco plano', 'asd', '1', '1', 'fotos_ejercicios/31.jpg', '2', '1', '2017-04-22 22:53:52', '2017-04-22 22:53:52', null);
INSERT INTO `exercises` VALUES ('32', 'Press frances en banco plano', 'asd', '1', '1', 'fotos_ejercicios/32.jpg', '2', '1', '2017-04-22 22:54:45', '2017-04-22 22:54:45', null);
INSERT INTO `exercises` VALUES ('33', 'Press sentado con mancuernas', 'asd', '1', '1', 'fotos_ejercicios/33.jpg', '2', '1', '2017-04-22 22:55:16', '2017-04-22 22:55:16', null);
INSERT INTO `exercises` VALUES ('34', 'Pull over con mancuerna en banca cruzado', 'asd', '1', '1', 'fotos_ejercicios/34.jpg', '2', '1', '2017-04-22 22:57:18', '2017-04-22 22:57:18', null);
INSERT INTO `exercises` VALUES ('35', 'Pull over con polea alta brazos extendidos', 'asd', '1', '1', 'fotos_ejercicios/35.jpg', '2', '1', '2017-04-22 22:58:07', '2017-04-22 22:58:07', null);
INSERT INTO `exercises` VALUES ('36', 'Remo al cuello con manos juntas', 'asd', '1', '1', 'fotos_ejercicios/36.jpg', '2', '1', '2017-04-22 23:00:22', '2017-04-22 23:00:22', null);
INSERT INTO `exercises` VALUES ('37', 'Remo al cuello manos separadas', 'asd', '1', '1', 'fotos_ejercicios/37.jpg', '2', '1', '2017-04-22 23:01:01', '2017-04-22 23:01:01', null);
INSERT INTO `exercises` VALUES ('38', 'Remo horizontal con barra manos en pronacion', 'asd', '1', '1', 'fotos_ejercicios/38.jpg', '2', '1', '2017-04-22 23:01:36', '2017-04-22 23:01:36', null);
INSERT INTO `exercises` VALUES ('39', 'Remo en barra T con apoyo al pecho', 'asd', '1', '1', 'fotos_ejercicios/39.jpg', '2', '1', '2017-04-22 23:02:23', '2017-04-22 23:02:23', null);
INSERT INTO `exercises` VALUES ('40', 'Remo en polea baja agarre estrecho manos en semipronacion', 'asd', '1', '1', 'fotos_ejercicios/40.jpg', '2', '1', '2017-04-22 23:03:23', '2017-04-22 23:03:23', null);
INSERT INTO `exercises` VALUES ('41', 'Remo horizontal a una mano con mancuerna', 'asd', '1', '1', 'fotos_ejercicios/41.jpg', '2', '1', '2017-04-22 23:04:06', '2017-04-22 23:04:06', null);
INSERT INTO `exercises` VALUES ('42', 'Sentadillas frontales con barra', 'asd', '1', '1', 'fotos_ejercicios/42.jpg', '2', '1', '2017-04-22 23:05:09', '2017-04-22 23:05:09', null);
INSERT INTO `exercises` VALUES ('44', 'Cruces de pie con polea', 'asd', '1', '1', 'fotos_ejercicios/44.jpg', '2', '1', '2017-04-22 23:12:34', '2017-04-22 23:12:34', null);
INSERT INTO `exercises` VALUES ('45', 'Press de banca inclinado', 'asd', '1', '1', 'fotos_ejercicios/45.jpg', '2', '1', '2017-04-22 23:13:59', '2017-04-22 23:13:59', null);
INSERT INTO `exercises` VALUES ('46', 'Aperturas en contractor de pecho', 'asd', '1', '1', 'fotos_ejercicios/46.jpg', '2', '1', '2017-04-22 23:14:47', '2017-04-22 23:14:47', null);
INSERT INTO `exercises` VALUES ('47', 'Fondos en paralelo', 'asd', '1', '1', 'fotos_ejercicios/47.jpg', '2', '1', '2017-04-22 23:15:54', '2017-04-22 23:15:54', null);
INSERT INTO `exercises` VALUES ('48', 'Press de banco plano manos juntas', 'asd', '1', '1', 'fotos_ejercicios/48.jpg', '2', '1', '2017-04-22 23:17:40', '2017-04-22 23:17:40', null);
INSERT INTO `exercises` VALUES ('49', 'Flexiones de brazos en el suelo', 'asd', '1', '1', 'fotos_ejercicios/49.jpg', '2', '1', '2017-04-22 23:21:10', '2017-04-22 23:21:10', null);
INSERT INTO `exercises` VALUES ('50', 'Pull over con mancuerna en banca', 'asd', '1', '1', 'fotos_ejercicios/50.jpg', '2', '1', '2017-04-22 23:23:59', '2017-04-22 23:23:59', null);
INSERT INTO `exercises` VALUES ('51', 'Aperturas con mancuernas en banco inclinado', 'asd', '1', '1', 'fotos_ejercicios/51.jpg', '2', '1', '2017-04-22 23:27:21', '2017-04-22 23:27:21', null);
INSERT INTO `exercises` VALUES ('52', 'Press frontal con barra', 'asd', '1', '1', 'fotos_ejercicios/52.jpg', '2', '1', '2017-04-22 23:30:00', '2017-04-22 23:30:00', null);
INSERT INTO `exercises` VALUES ('53', 'Aperturas en contractor extendido', 'asd', '1', '1', 'fotos_ejercicios/53.jpg', '2', '1', '2017-04-23 00:07:20', '2017-04-23 00:07:20', null);
INSERT INTO `exercises` VALUES ('54', 'Press de banca declinado', 'asd', '1', '1', 'fotos_ejercicios/54.jpg', '2', '1', '2017-04-23 00:09:20', '2017-04-23 00:09:20', null);
INSERT INTO `exercises` VALUES ('55', 'Press de piernas inclinada', 'asd', '1', '1', 'fotos_ejercicios/55.jpg', '2', '1', '2017-04-23 00:11:28', '2017-04-23 00:11:28', null);
INSERT INTO `exercises` VALUES ('56', 'Press frontal con rotacion de la muñeca', 'asd', '1', '1', 'fotos_ejercicios/56.jpg', '2', '1', '2017-04-23 00:13:24', '2017-04-23 00:13:24', null);
INSERT INTO `exercises` VALUES ('57', 'Elevaciones de piernas en plancha inclinada con encogimientos abdominales y elevaciones de la pelvis', 'asd', '1', '0', 'fotos_ejercicios/57.jpg', '2', '1', '2017-04-23 00:15:01', '2017-04-23 00:15:01', null);
INSERT INTO `exercises` VALUES ('58', 'Elevacion de talones sentado en maquina', 'asd', '1', '1', 'fotos_ejercicios/58.jpg', '2', '1', '2017-04-23 00:16:06', '2017-04-23 00:16:06', null);
INSERT INTO `exercises` VALUES ('59', 'Extension del tronco en banco a noventa grados o hiperextensiones', 'ad', '1', '0', 'fotos_ejercicios/59.jpg', '2', '1', '2017-04-23 00:20:05', '2017-04-23 00:20:05', null);
INSERT INTO `exercises` VALUES ('60', 'Encogimiento de abdominales con los pies apoyados en un banco o crunch', 'asd', '1', '0', 'fotos_ejercicios/60.jpg', '2', '1', '2017-04-23 00:21:42', '2017-04-23 00:21:42', null);
INSERT INTO `exercises` VALUES ('61', 'Polea al pecho', 'asd', '1', '1', 'fotos_ejercicios/61.jpg', '2', '1', '2017-04-23 00:25:24', '2017-04-23 00:25:24', null);
INSERT INTO `exercises` VALUES ('62', 'Polea al pecho con agarre estrecho', 'asd', '1', '1', 'fotos_ejercicios/62.jpg', '2', '1', '2017-04-23 00:26:34', '2017-04-23 00:26:34', null);
INSERT INTO `exercises` VALUES ('63', 'Deltoides posterior en maquina especifica', 'asd', '1', '1', 'fotos_ejercicios/63.jpg', '2', '1', '2017-04-23 00:29:04', '2017-04-23 00:29:04', null);
INSERT INTO `exercises` VALUES ('64', 'Dominadas en barra fija con agarre estrecho en supinacion', 'asd', '1', '0', 'fotos_ejercicios/64.jpg', '2', '1', '2017-04-23 00:30:59', '2017-04-23 00:30:59', null);
INSERT INTO `exercises` VALUES ('65', 'Dominadas en barra fija con agarre amplio', 'asd', '1', '0', 'fotos_ejercicios/65.jpg', '2', '1', '2017-04-23 00:33:16', '2017-04-23 00:33:16', null);
INSERT INTO `exercises` VALUES ('66', 'Elevaciones laterales alternadas con polea baja', 'asd', '1', '1', 'fotos_ejercicios/66.jpg', '2', '1', '2017-04-23 00:37:40', '2017-04-23 00:37:40', null);
INSERT INTO `exercises` VALUES ('67', 'Trasnuca con barra', 'asd', '1', '1', 'fotos_ejercicios/67.jpg', '2', '1', '2017-04-23 00:39:09', '2017-04-23 00:39:09', null);
INSERT INTO `exercises` VALUES ('68', 'Elevaciones frontales alternadas con polea baja', 'asd', '1', '1', 'fotos_ejercicios/68.jpg', '2', '1', '2017-04-23 00:40:34', '2017-04-23 00:40:34', null);
INSERT INTO `exercises` VALUES ('69', 'Elevaciones frontales con barra', 'asd', '1', '1', 'fotos_ejercicios/69.jpg', '2', '1', '2017-04-23 00:43:42', '2017-04-23 00:43:42', null);
INSERT INTO `exercises` VALUES ('70', 'Elevaciones posteriores con polea baja tronco inclinado hacia adelante o  pajaro en polea', 'asd', '1', '1', 'fotos_ejercicios/70.jpg', '2', '1', '2017-04-23 00:44:59', '2017-04-23 00:44:59', null);
INSERT INTO `exercises` VALUES ('71', 'Encogimiento de hombros en maquina', 'asd', '1', '1', 'fotos_ejercicios/71.jpg', '2', '1', '2017-04-23 00:46:56', '2017-04-23 00:46:56', null);
INSERT INTO `exercises` VALUES ('72', 'Elevaciones laterales acostado de lado', 'asd', '1', '1', 'fotos_ejercicios/72.jpg', '2', '1', '2017-04-23 00:49:50', '2017-04-23 00:49:50', null);
INSERT INTO `exercises` VALUES ('73', 'Curl de biceps con barra', 'asd', '1', '1', 'fotos_ejercicios/73.jpg', '2', '1', '2017-04-23 01:08:57', '2017-04-23 01:08:57', null);
INSERT INTO `exercises` VALUES ('74', 'Curl de biceps alterno tipo martillo', 'asd', '1', '1', 'fotos_ejercicios/74.jpg', '2', '1', '2017-04-23 01:09:56', '2017-04-23 01:09:56', null);
INSERT INTO `exercises` VALUES ('75', 'Curl de biceps con polea', 'asd', '1', '1', 'fotos_ejercicios/75.jpg', '2', '1', '2017-04-23 01:10:31', '2017-04-23 01:10:31', null);
INSERT INTO `exercises` VALUES ('76', 'Curl de biceps en el banco Scott', 'asd', '1', '1', 'fotos_ejercicios/76.jpg', '2', '1', '2017-04-23 01:11:25', '2017-04-23 01:11:25', null);
INSERT INTO `exercises` VALUES ('77', 'Biceps brazos en cruz en polea alta', 'asd', '1', '1', 'fotos_ejercicios/77.jpg', '2', '1', '2017-04-23 01:13:21', '2017-04-23 01:13:21', null);
INSERT INTO `exercises` VALUES ('78', 'Curl de biceps con barra en predicador', 'asd', '1', '1', 'fotos_ejercicios/78.jpg', '2', '1', '2017-04-23 01:15:29', '2017-04-23 01:15:29', null);
INSERT INTO `exercises` VALUES ('79', 'Curl de biceps con barra agarre en pronacion', 'asd', '1', '1', 'fotos_ejercicios/79.jpg', '2', '1', '2017-04-23 01:17:10', '2017-04-23 01:17:10', null);
INSERT INTO `exercises` VALUES ('80', 'Extensiones de triceps en polea alta', 'asd', '1', '1', 'fotos_ejercicios/80.jpg', '2', '1', '2017-04-23 01:21:01', '2017-04-23 01:21:01', null);
INSERT INTO `exercises` VALUES ('81', 'Fondos entre dos bancos', 'asd', '1', '0', 'fotos_ejercicios/81.jpg', '2', '1', '2017-04-23 01:22:01', '2017-04-23 01:22:01', null);
INSERT INTO `exercises` VALUES ('82', 'Extensiones de triceps en polea alta agarre en supinacion', 'asd', '1', '1', 'fotos_ejercicios/82.jpg', '2', '1', '2017-04-23 01:23:22', '2017-04-23 01:23:22', null);
INSERT INTO `exercises` VALUES ('83', 'Extension alternada de los antebrazos en polea alta manos en supinacion', 'asd', '1', '1', 'fotos_ejercicios/83.jpg', '2', '1', '2017-04-23 01:24:35', '2017-04-23 01:24:35', null);
INSERT INTO `exercises` VALUES ('84', 'Extension alternada de los codos en polea alta manos en supinacion', 'asd', '1', '1', 'fotos_ejercicios/84.jpg', '2', '1', '2017-04-23 01:25:46', '2017-04-23 01:25:46', null);
INSERT INTO `exercises` VALUES ('85', 'Press frances en banco plano con mancuernas', 'asd', '1', '1', 'fotos_ejercicios/85.jpg', '2', '1', '2017-04-23 01:27:07', '2017-04-23 01:27:07', null);
INSERT INTO `exercises` VALUES ('86', 'Extension de los brazos sentado con barra', 'asd', '1', '1', 'fotos_ejercicios/86.jpg', '2', '1', '2017-04-23 01:30:26', '2017-04-23 01:30:26', null);
INSERT INTO `exercises` VALUES ('87', 'Elevaciones del tronco en el suelo', 'asd', '1', '1', 'fotos_ejercicios/87.jpg', '2', '1', '2017-04-23 01:33:24', '2017-04-23 01:33:24', null);
INSERT INTO `exercises` VALUES ('88', 'Encogimiento de abdominales o crunch', 'asd', '1', '0', 'fotos_ejercicios/88.jpg', '2', '1', '2017-04-23 01:34:44', '2017-04-23 01:34:44', null);
INSERT INTO `exercises` VALUES ('89', 'Rotacion del tronco con baston', 'asd', '1', '0', 'fotos_ejercicios/89.jpg', '2', '1', '2017-04-23 01:35:46', '2017-04-23 01:35:46', null);
INSERT INTO `exercises` VALUES ('90', 'Elevaciones del tronco en suspension en el banco', 'asd', '1', '0', 'fotos_ejercicios/90.jpg', '2', '1', '2017-04-23 01:37:09', '2017-04-23 01:37:09', null);
INSERT INTO `exercises` VALUES ('91', 'Encogimientos abdominales o crunch con polea alta', 'asd', '1', '0', 'fotos_ejercicios/91.jpg', '2', '1', '2017-04-23 01:38:08', '2017-04-23 01:38:08', null);
INSERT INTO `exercises` VALUES ('92', 'Elevaciones de rodillas en paralelas', 'asd', '1', '0', 'fotos_ejercicios/92.jpg', '2', '1', '2017-04-23 01:38:57', '2017-04-23 01:38:57', null);
INSERT INTO `exercises` VALUES ('93', 'Elevaciones de piernas suspendido en la barra fija', 'asd', '1', '0', 'fotos_ejercicios/93.jpg', '2', '1', '2017-04-23 01:39:56', '2017-04-23 01:39:56', null);
INSERT INTO `exercises` VALUES ('94', 'Flexion lateral del tronco en banco', 'asd', '1', '0', 'fotos_ejercicios/94.jpg', '2', '1', '2017-04-23 01:40:59', '2017-04-23 01:40:59', null);
INSERT INTO `exercises` VALUES ('95', 'Twist', 'asd', '1', '1', 'fotos_ejercicios/95.jpg', '2', '1', '2017-04-23 01:41:41', '2017-04-23 01:41:41', null);
INSERT INTO `exercises` VALUES ('96', 'Encogimientos abdominales o crunch en maquina', 'asd', '1', '1', 'fotos_ejercicios/96.jpg', '2', '1', '2017-04-23 01:45:07', '2017-04-23 01:45:07', null);
INSERT INTO `exercises` VALUES ('97', 'Encogimientos abdominales o crunch con soga', 'asd', '1', '1', 'fotos_ejercicios/97.jpg', '2', '1', '2017-04-23 01:47:22', '2017-04-23 01:47:22', null);
INSERT INTO `exercises` VALUES ('98', 'Sentadilla Hack', 'asd', '1', '1', 'fotos_ejercicios/98.jpg', '2', '1', '2017-04-23 01:49:17', '2017-04-23 01:49:17', null);
INSERT INTO `exercises` VALUES ('99', 'Extension de piernas en maquina', 'asd', '1', '1', 'fotos_ejercicios/99.jpg', '2', '1', '2017-04-23 01:50:12', '2017-04-23 01:50:12', null);
INSERT INTO `exercises` VALUES ('100', 'Sentadillas con barra libre', 'asd', '1', '1', 'fotos_ejercicios/100.jpg', '2', '1', '2017-04-23 01:51:49', '2017-04-23 01:51:49', null);
INSERT INTO `exercises` VALUES ('101', 'Sentadillas con barra libre piernas separadas', 'asd', '1', '1', 'fotos_ejercicios/101.jpg', '2', '1', '2017-04-23 01:53:22', '2017-04-23 01:53:22', null);
INSERT INTO `exercises` VALUES ('102', 'Zancadas', 'asd', '1', '1', 'fotos_ejercicios/102.jpg', '2', '1', '2017-04-23 01:54:26', '2017-04-23 01:54:26', null);
INSERT INTO `exercises` VALUES ('103', 'Elevacion de talones de pie en maquina', 'asd', '1', '1', 'fotos_ejercicios/103.jpg', '2', '1', '2017-04-23 01:55:33', '2017-04-23 01:55:33', null);
INSERT INTO `exercises` VALUES ('104', 'Flexion de rodillas con mancuernas', 'asd', '1', '1', 'fotos_ejercicios/104.jpg', '2', '1', '2017-04-23 01:56:50', '2017-04-23 01:56:50', null);
INSERT INTO `exercises` VALUES ('105', 'Curl de piernas acostado', 'asd', '1', '1', 'fotos_ejercicios/105.jpg', '2', '1', '2017-04-23 01:57:38', '2017-04-23 01:57:38', null);
INSERT INTO `exercises` VALUES ('106', 'Peso muerto con barra', 'asd', '1', '1', 'fotos_ejercicios/106.jpg', '2', '1', '2017-04-23 02:01:38', '2017-04-23 02:01:38', null);
INSERT INTO `exercises` VALUES ('107', 'Flexion del tronco al frente o buenos dias', 'asd', '1', '1', 'fotos_ejercicios/107.jpg', '2', '1', '2017-04-23 02:03:06', '2017-04-23 02:03:06', null);
INSERT INTO `exercises` VALUES ('108', 'Curl de femorales de pie', 'asd', '1', '1', 'fotos_ejercicios/108.jpg', '2', '1', '2017-04-23 02:04:09', '2017-04-23 02:04:09', null);
INSERT INTO `exercises` VALUES ('109', 'Elevacion de caderas', 'asd', '1', '0', 'fotos_ejercicios/109.jpg', '2', '1', '2017-04-23 02:05:57', '2017-04-23 02:05:57', null);
INSERT INTO `exercises` VALUES ('110', 'Flexora sentada', 'asd', '1', '1', 'fotos_ejercicios/110.jpg', '2', '1', '2017-04-23 02:07:20', '2017-04-23 02:07:20', null);
INSERT INTO `exercises` VALUES ('111', 'Extension de la cadera en maquina', 'asd', '1', '1', 'fotos_ejercicios/111.jpg', '2', '1', '2017-04-23 02:08:41', '2017-04-23 02:08:41', null);
INSERT INTO `exercises` VALUES ('112', 'Abduccion de la cadera de pie en polea baja', 'asd', '1', '1', 'fotos_ejercicios/112.jpg', '2', '1', '2017-04-23 02:10:16', '2017-04-23 02:10:16', null);
INSERT INTO `exercises` VALUES ('113', 'Aductores en maquina', 'asd', '1', '1', 'fotos_ejercicios/113.jpg', '2', '1', '2017-04-23 02:11:09', '2017-04-23 02:11:09', null);
INSERT INTO `exercises` VALUES ('114', 'Extension de la cadera en polea baja', 'asd', '1', '1', 'fotos_ejercicios/114.jpg', '2', '1', '2017-04-23 02:14:15', '2017-04-23 02:14:15', null);
INSERT INTO `exercises` VALUES ('115', 'Abductores sentado en maquina', 'asd', '1', '1', 'fotos_ejercicios/115.jpg', '2', '1', '2017-04-23 02:16:56', '2017-04-23 02:16:56', null);
INSERT INTO `exercises` VALUES ('116', 'Patadas de gluteos en maquina', 'asd', '1', '1', 'fotos_ejercicios/116.jpg', '2', '1', '2017-04-23 02:19:33', '2017-04-23 02:19:33', null);
INSERT INTO `exercises` VALUES ('117', 'Patadas de gluteos en el suelo', 'asd', '1', '0', 'fotos_ejercicios/117.jpg', '2', '1', '2017-04-23 02:20:19', '2017-04-23 02:20:19', null);
INSERT INTO `exercises` VALUES ('118', 'Elevacion de cadera con barra', 'asd', '1', '1', 'fotos_ejercicios/118.jpg', '2', '1', '2017-04-23 02:21:51', '2017-04-23 02:21:51', null);
INSERT INTO `exercises` VALUES ('119', 'Aduccion de la cadera de pie en polea baja', 'asd', '1', '1', 'fotos_ejercicios/119.jpg', '2', '1', '2017-04-23 02:25:36', '2017-04-23 02:25:36', null);
INSERT INTO `exercises` VALUES ('120', 'Gemelos en maquina peso sobre la pelvis', 'asd', '1', '1', 'fotos_ejercicios/120.jpg', '2', '1', '2017-04-23 02:27:30', '2017-04-23 02:27:30', null);
INSERT INTO `exercises` VALUES ('121', 'Pantorrila en maquina inclinado', 'asd', '1', '1', 'fotos_ejercicios/121.jpg', '2', '1', '2017-04-23 02:29:26', '2017-04-23 02:29:26', null);
INSERT INTO `exercises` VALUES ('122', 'Curl de antebrazos con barra agarre en supinacion', 'asd', '1', '1', 'fotos_ejercicios/122.jpg', '2', '1', '2017-04-23 02:31:08', '2017-04-23 02:31:08', null);
INSERT INTO `exercises` VALUES ('123', 'Curl de antebrazos con barra agarre en pronacion', 'asd', '1', '1', 'fotos_ejercicios/123.jpg', '2', '1', '2017-04-23 02:32:33', '2017-04-23 02:32:33', null);
INSERT INTO `exercises` VALUES ('124', 'Curl de antebrazos con mancuernas agarre en supinacion', 'asd', '1', '1', 'fotos_ejercicios/124.jpg', '2', '1', '2017-04-23 02:36:54', '2017-04-23 02:36:54', null);
INSERT INTO `exercises` VALUES ('125', 'Curl de antebrazos con mancuernas agarre en pronacion', 'asd', '1', '1', 'fotos_ejercicios/125.jpg', '2', '1', '2017-04-23 02:38:15', '2017-04-23 02:38:15', null);
INSERT INTO `exercises` VALUES ('126', 'Curl de antebrazos con barra de pie', 'asd', '1', '1', 'fotos_ejercicios/126.jpg', '2', '1', '2017-04-23 02:40:14', '2017-04-23 02:40:14', null);
INSERT INTO `exercises` VALUES ('127', 'Estiramiento antebrazo', 'asd', '1', '0', 'fotos_ejercicios/127.jpg', '3', '1', '2017-04-23 12:34:24', '2017-04-23 12:34:24', null);
INSERT INTO `exercises` VALUES ('128', 'Estiramiento cuadriceps', 'asd', '0', '0', 'fotos_ejercicios/128.jpg', '3', '1', '2017-04-23 12:35:55', '2017-04-23 12:35:55', null);
INSERT INTO `exercises` VALUES ('129', 'Estiramiento hombros', 'asd', '1', '0', 'fotos_ejercicios/129.jpg', '3', '1', '2017-04-23 12:36:57', '2017-04-23 12:36:57', null);
INSERT INTO `exercises` VALUES ('130', 'Estiramiento triceps', 'asd', '1', '0', 'fotos_ejercicios/130.jpg', '3', '1', '2017-04-23 12:38:02', '2017-04-23 12:38:02', null);
INSERT INTO `exercises` VALUES ('131', 'Estiramiento pantorrillas', 'asd', '1', '0', 'fotos_ejercicios/131.jpg', '3', '1', '2017-04-23 12:38:58', '2017-04-23 12:38:58', null);
INSERT INTO `exercises` VALUES ('132', 'Estiramiento femorales', 'asd', '1', '0', 'fotos_ejercicios/132.jpg', '3', '1', '2017-04-23 12:40:18', '2017-04-23 12:40:18', null);
INSERT INTO `exercises` VALUES ('133', 'Estiramiento de gluteos', 'asd', '0', '0', 'fotos_ejercicios/133.jpg', '3', '1', '2017-04-23 12:41:02', '2017-04-23 12:41:03', null);
INSERT INTO `exercises` VALUES ('134', 'Estiramiento abdominales', 'asd', '0', '0', 'fotos_ejercicios/134.jpg', '3', '1', '2017-04-23 12:41:50', '2017-04-23 12:41:50', null);
INSERT INTO `exercises` VALUES ('135', 'Estiramiento aductores', 'asd', '1', '0', 'fotos_ejercicios/135.jpg', '3', '1', '2017-04-23 12:42:42', '2017-04-23 12:42:42', null);
INSERT INTO `exercises` VALUES ('136', 'Estiramiento abductores', 'asd', '1', '0', 'fotos_ejercicios/136.jpg', '3', '1', '2017-04-23 12:44:18', '2017-04-23 12:44:18', null);
INSERT INTO `exercises` VALUES ('137', 'Estiramiento biceps', 'asd', '0', '0', 'fotos_ejercicios/137.jpg', '3', '1', '2017-04-23 12:47:12', '2017-04-23 12:47:12', null);

-- ----------------------------
-- Table structure for exercise_muscle
-- ----------------------------
DROP TABLE IF EXISTS `exercise_muscle`;
CREATE TABLE `exercise_muscle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `exercise_id` int(10) unsigned NOT NULL,
  `muscle_id` int(10) unsigned NOT NULL,
  `zone_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exercise_muscle_exercise_id_foreign` (`exercise_id`),
  KEY `exercise_muscle_muscle_id_foreign` (`muscle_id`),
  KEY `exercise_muscle_zone_id_foreign` (`zone_id`)
) ENGINE=MyISAM AUTO_INCREMENT=267 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of exercise_muscle
-- ----------------------------
INSERT INTO `exercise_muscle` VALUES ('1', '1', '1', null);
INSERT INTO `exercise_muscle` VALUES ('2', '1', '2', null);
INSERT INTO `exercise_muscle` VALUES ('3', '1', '3', null);
INSERT INTO `exercise_muscle` VALUES ('4', '1', '4', null);
INSERT INTO `exercise_muscle` VALUES ('5', '1', '5', null);
INSERT INTO `exercise_muscle` VALUES ('6', '1', '6', null);
INSERT INTO `exercise_muscle` VALUES ('7', '1', '7', null);
INSERT INTO `exercise_muscle` VALUES ('8', '1', '8', null);
INSERT INTO `exercise_muscle` VALUES ('9', '1', '9', null);
INSERT INTO `exercise_muscle` VALUES ('10', '1', '10', null);
INSERT INTO `exercise_muscle` VALUES ('11', '1', '11', null);
INSERT INTO `exercise_muscle` VALUES ('12', '1', '12', null);
INSERT INTO `exercise_muscle` VALUES ('13', '1', '13', null);
INSERT INTO `exercise_muscle` VALUES ('14', '2', '5', '2');
INSERT INTO `exercise_muscle` VALUES ('207', '127', '4', null);
INSERT INTO `exercise_muscle` VALUES ('16', '4', '1', null);
INSERT INTO `exercise_muscle` VALUES ('17', '4', '2', null);
INSERT INTO `exercise_muscle` VALUES ('18', '4', '3', null);
INSERT INTO `exercise_muscle` VALUES ('19', '4', '4', null);
INSERT INTO `exercise_muscle` VALUES ('20', '4', '5', null);
INSERT INTO `exercise_muscle` VALUES ('21', '4', '6', null);
INSERT INTO `exercise_muscle` VALUES ('22', '4', '7', null);
INSERT INTO `exercise_muscle` VALUES ('23', '4', '8', null);
INSERT INTO `exercise_muscle` VALUES ('24', '4', '9', null);
INSERT INTO `exercise_muscle` VALUES ('25', '4', '10', null);
INSERT INTO `exercise_muscle` VALUES ('26', '4', '11', null);
INSERT INTO `exercise_muscle` VALUES ('27', '4', '12', null);
INSERT INTO `exercise_muscle` VALUES ('28', '4', '13', null);
INSERT INTO `exercise_muscle` VALUES ('29', '5', '1', null);
INSERT INTO `exercise_muscle` VALUES ('30', '5', '2', null);
INSERT INTO `exercise_muscle` VALUES ('31', '5', '3', null);
INSERT INTO `exercise_muscle` VALUES ('32', '5', '4', null);
INSERT INTO `exercise_muscle` VALUES ('33', '5', '5', null);
INSERT INTO `exercise_muscle` VALUES ('34', '5', '6', null);
INSERT INTO `exercise_muscle` VALUES ('35', '5', '7', null);
INSERT INTO `exercise_muscle` VALUES ('36', '5', '8', null);
INSERT INTO `exercise_muscle` VALUES ('37', '5', '9', null);
INSERT INTO `exercise_muscle` VALUES ('38', '5', '10', null);
INSERT INTO `exercise_muscle` VALUES ('39', '5', '11', null);
INSERT INTO `exercise_muscle` VALUES ('40', '5', '12', null);
INSERT INTO `exercise_muscle` VALUES ('41', '5', '13', null);
INSERT INTO `exercise_muscle` VALUES ('42', '6', '1', null);
INSERT INTO `exercise_muscle` VALUES ('43', '6', '2', null);
INSERT INTO `exercise_muscle` VALUES ('44', '6', '3', null);
INSERT INTO `exercise_muscle` VALUES ('45', '6', '4', null);
INSERT INTO `exercise_muscle` VALUES ('46', '6', '5', null);
INSERT INTO `exercise_muscle` VALUES ('47', '6', '6', null);
INSERT INTO `exercise_muscle` VALUES ('48', '6', '7', null);
INSERT INTO `exercise_muscle` VALUES ('49', '6', '8', null);
INSERT INTO `exercise_muscle` VALUES ('50', '6', '9', null);
INSERT INTO `exercise_muscle` VALUES ('51', '6', '10', null);
INSERT INTO `exercise_muscle` VALUES ('52', '6', '11', null);
INSERT INTO `exercise_muscle` VALUES ('53', '6', '12', null);
INSERT INTO `exercise_muscle` VALUES ('54', '6', '13', null);
INSERT INTO `exercise_muscle` VALUES ('55', '7', '1', null);
INSERT INTO `exercise_muscle` VALUES ('56', '7', '2', null);
INSERT INTO `exercise_muscle` VALUES ('57', '7', '3', null);
INSERT INTO `exercise_muscle` VALUES ('58', '7', '4', null);
INSERT INTO `exercise_muscle` VALUES ('59', '7', '5', null);
INSERT INTO `exercise_muscle` VALUES ('60', '7', '6', null);
INSERT INTO `exercise_muscle` VALUES ('61', '7', '7', null);
INSERT INTO `exercise_muscle` VALUES ('62', '7', '8', null);
INSERT INTO `exercise_muscle` VALUES ('63', '7', '9', null);
INSERT INTO `exercise_muscle` VALUES ('64', '7', '10', null);
INSERT INTO `exercise_muscle` VALUES ('65', '7', '11', null);
INSERT INTO `exercise_muscle` VALUES ('66', '7', '12', null);
INSERT INTO `exercise_muscle` VALUES ('67', '7', '13', null);
INSERT INTO `exercise_muscle` VALUES ('68', '8', '1', null);
INSERT INTO `exercise_muscle` VALUES ('69', '8', '2', null);
INSERT INTO `exercise_muscle` VALUES ('70', '8', '3', null);
INSERT INTO `exercise_muscle` VALUES ('71', '8', '4', null);
INSERT INTO `exercise_muscle` VALUES ('72', '8', '5', null);
INSERT INTO `exercise_muscle` VALUES ('73', '8', '6', null);
INSERT INTO `exercise_muscle` VALUES ('74', '8', '7', null);
INSERT INTO `exercise_muscle` VALUES ('75', '8', '8', null);
INSERT INTO `exercise_muscle` VALUES ('76', '8', '9', null);
INSERT INTO `exercise_muscle` VALUES ('77', '8', '10', null);
INSERT INTO `exercise_muscle` VALUES ('78', '8', '11', null);
INSERT INTO `exercise_muscle` VALUES ('79', '8', '12', null);
INSERT INTO `exercise_muscle` VALUES ('80', '8', '13', null);
INSERT INTO `exercise_muscle` VALUES ('81', '10', '6', null);
INSERT INTO `exercise_muscle` VALUES ('82', '11', '6', null);
INSERT INTO `exercise_muscle` VALUES ('83', '12', '5', null);
INSERT INTO `exercise_muscle` VALUES ('84', '13', '5', '2');
INSERT INTO `exercise_muscle` VALUES ('85', '14', '2', null);
INSERT INTO `exercise_muscle` VALUES ('86', '15', '2', null);
INSERT INTO `exercise_muscle` VALUES ('87', '16', '7', null);
INSERT INTO `exercise_muscle` VALUES ('88', '17', '1', null);
INSERT INTO `exercise_muscle` VALUES ('89', '18', '1', null);
INSERT INTO `exercise_muscle` VALUES ('90', '19', '1', null);
INSERT INTO `exercise_muscle` VALUES ('91', '20', '1', null);
INSERT INTO `exercise_muscle` VALUES ('92', '21', '6', '6');
INSERT INTO `exercise_muscle` VALUES ('93', '22', '6', '6');
INSERT INTO `exercise_muscle` VALUES ('94', '23', '3', null);
INSERT INTO `exercise_muscle` VALUES ('95', '24', '3', null);
INSERT INTO `exercise_muscle` VALUES ('96', '25', '3', null);
INSERT INTO `exercise_muscle` VALUES ('97', '26', '7', null);
INSERT INTO `exercise_muscle` VALUES ('98', '27', '1', null);
INSERT INTO `exercise_muscle` VALUES ('99', '28', '8', null);
INSERT INTO `exercise_muscle` VALUES ('100', '29', '6', '4');
INSERT INTO `exercise_muscle` VALUES ('101', '30', '5', '1');
INSERT INTO `exercise_muscle` VALUES ('102', '31', '5', '2');
INSERT INTO `exercise_muscle` VALUES ('103', '32', '3', null);
INSERT INTO `exercise_muscle` VALUES ('104', '33', '1', null);
INSERT INTO `exercise_muscle` VALUES ('105', '34', '6', '4');
INSERT INTO `exercise_muscle` VALUES ('106', '35', '6', '4');
INSERT INTO `exercise_muscle` VALUES ('107', '36', '6', '6');
INSERT INTO `exercise_muscle` VALUES ('108', '37', '6', '6');
INSERT INTO `exercise_muscle` VALUES ('109', '38', '6', '4');
INSERT INTO `exercise_muscle` VALUES ('110', '39', '6', '4');
INSERT INTO `exercise_muscle` VALUES ('111', '40', '6', '4');
INSERT INTO `exercise_muscle` VALUES ('112', '41', '6', '4');
INSERT INTO `exercise_muscle` VALUES ('113', '42', '8', null);
INSERT INTO `exercise_muscle` VALUES ('114', '42', '9', null);
INSERT INTO `exercise_muscle` VALUES ('115', '43', '5', '2');
INSERT INTO `exercise_muscle` VALUES ('116', '44', '5', '2');
INSERT INTO `exercise_muscle` VALUES ('117', '45', '5', '1');
INSERT INTO `exercise_muscle` VALUES ('118', '46', '5', '2');
INSERT INTO `exercise_muscle` VALUES ('119', '47', '3', null);
INSERT INTO `exercise_muscle` VALUES ('120', '47', '5', '1');
INSERT INTO `exercise_muscle` VALUES ('121', '48', '5', '2');
INSERT INTO `exercise_muscle` VALUES ('122', '49', '3', null);
INSERT INTO `exercise_muscle` VALUES ('123', '49', '5', '2');
INSERT INTO `exercise_muscle` VALUES ('124', '50', '5', '2');
INSERT INTO `exercise_muscle` VALUES ('125', '51', '5', '1');
INSERT INTO `exercise_muscle` VALUES ('126', '52', '1', null);
INSERT INTO `exercise_muscle` VALUES ('127', '53', '5', '2');
INSERT INTO `exercise_muscle` VALUES ('128', '54', '5', '3');
INSERT INTO `exercise_muscle` VALUES ('129', '55', '9', null);
INSERT INTO `exercise_muscle` VALUES ('130', '56', '1', null);
INSERT INTO `exercise_muscle` VALUES ('131', '57', '7', null);
INSERT INTO `exercise_muscle` VALUES ('132', '58', '13', null);
INSERT INTO `exercise_muscle` VALUES ('133', '59', '8', null);
INSERT INTO `exercise_muscle` VALUES ('134', '60', '7', null);
INSERT INTO `exercise_muscle` VALUES ('135', '61', '6', '4');
INSERT INTO `exercise_muscle` VALUES ('136', '62', '6', '4');
INSERT INTO `exercise_muscle` VALUES ('137', '63', '1', null);
INSERT INTO `exercise_muscle` VALUES ('138', '63', '6', '6');
INSERT INTO `exercise_muscle` VALUES ('139', '64', '6', '4');
INSERT INTO `exercise_muscle` VALUES ('140', '65', '6', '4');
INSERT INTO `exercise_muscle` VALUES ('141', '66', '1', null);
INSERT INTO `exercise_muscle` VALUES ('142', '67', '1', null);
INSERT INTO `exercise_muscle` VALUES ('143', '68', '1', null);
INSERT INTO `exercise_muscle` VALUES ('144', '69', '1', null);
INSERT INTO `exercise_muscle` VALUES ('145', '70', '1', null);
INSERT INTO `exercise_muscle` VALUES ('146', '71', '1', null);
INSERT INTO `exercise_muscle` VALUES ('147', '72', '1', null);
INSERT INTO `exercise_muscle` VALUES ('148', '73', '2', null);
INSERT INTO `exercise_muscle` VALUES ('149', '74', '2', null);
INSERT INTO `exercise_muscle` VALUES ('150', '75', '2', null);
INSERT INTO `exercise_muscle` VALUES ('151', '76', '2', null);
INSERT INTO `exercise_muscle` VALUES ('152', '77', '2', null);
INSERT INTO `exercise_muscle` VALUES ('153', '78', '2', null);
INSERT INTO `exercise_muscle` VALUES ('154', '79', '2', null);
INSERT INTO `exercise_muscle` VALUES ('155', '80', '3', null);
INSERT INTO `exercise_muscle` VALUES ('156', '81', '3', null);
INSERT INTO `exercise_muscle` VALUES ('157', '82', '3', null);
INSERT INTO `exercise_muscle` VALUES ('158', '83', '3', null);
INSERT INTO `exercise_muscle` VALUES ('159', '84', '3', null);
INSERT INTO `exercise_muscle` VALUES ('160', '85', '3', null);
INSERT INTO `exercise_muscle` VALUES ('161', '86', '3', null);
INSERT INTO `exercise_muscle` VALUES ('162', '87', '7', null);
INSERT INTO `exercise_muscle` VALUES ('163', '88', '7', null);
INSERT INTO `exercise_muscle` VALUES ('164', '89', '7', null);
INSERT INTO `exercise_muscle` VALUES ('165', '90', '7', null);
INSERT INTO `exercise_muscle` VALUES ('166', '91', '7', null);
INSERT INTO `exercise_muscle` VALUES ('167', '92', '7', null);
INSERT INTO `exercise_muscle` VALUES ('168', '93', '7', null);
INSERT INTO `exercise_muscle` VALUES ('169', '94', '7', null);
INSERT INTO `exercise_muscle` VALUES ('170', '95', '7', null);
INSERT INTO `exercise_muscle` VALUES ('171', '96', '7', null);
INSERT INTO `exercise_muscle` VALUES ('172', '97', '7', null);
INSERT INTO `exercise_muscle` VALUES ('173', '98', '9', null);
INSERT INTO `exercise_muscle` VALUES ('174', '99', '9', null);
INSERT INTO `exercise_muscle` VALUES ('175', '100', '8', null);
INSERT INTO `exercise_muscle` VALUES ('176', '100', '9', null);
INSERT INTO `exercise_muscle` VALUES ('177', '101', '9', null);
INSERT INTO `exercise_muscle` VALUES ('178', '102', '9', null);
INSERT INTO `exercise_muscle` VALUES ('179', '103', '13', null);
INSERT INTO `exercise_muscle` VALUES ('180', '104', '8', null);
INSERT INTO `exercise_muscle` VALUES ('181', '104', '9', null);
INSERT INTO `exercise_muscle` VALUES ('182', '105', '12', null);
INSERT INTO `exercise_muscle` VALUES ('183', '106', '8', null);
INSERT INTO `exercise_muscle` VALUES ('184', '106', '9', null);
INSERT INTO `exercise_muscle` VALUES ('185', '107', '8', null);
INSERT INTO `exercise_muscle` VALUES ('186', '107', '12', null);
INSERT INTO `exercise_muscle` VALUES ('187', '108', '12', null);
INSERT INTO `exercise_muscle` VALUES ('188', '109', '8', null);
INSERT INTO `exercise_muscle` VALUES ('189', '109', '12', null);
INSERT INTO `exercise_muscle` VALUES ('190', '110', '12', null);
INSERT INTO `exercise_muscle` VALUES ('191', '111', '8', null);
INSERT INTO `exercise_muscle` VALUES ('192', '112', '10', null);
INSERT INTO `exercise_muscle` VALUES ('193', '113', '11', null);
INSERT INTO `exercise_muscle` VALUES ('194', '114', '8', null);
INSERT INTO `exercise_muscle` VALUES ('195', '115', '10', null);
INSERT INTO `exercise_muscle` VALUES ('196', '116', '8', null);
INSERT INTO `exercise_muscle` VALUES ('197', '117', '8', null);
INSERT INTO `exercise_muscle` VALUES ('198', '118', '8', null);
INSERT INTO `exercise_muscle` VALUES ('199', '119', '11', null);
INSERT INTO `exercise_muscle` VALUES ('200', '120', '13', null);
INSERT INTO `exercise_muscle` VALUES ('201', '121', '13', null);
INSERT INTO `exercise_muscle` VALUES ('202', '122', '4', null);
INSERT INTO `exercise_muscle` VALUES ('203', '123', '4', null);
INSERT INTO `exercise_muscle` VALUES ('204', '124', '4', null);
INSERT INTO `exercise_muscle` VALUES ('205', '125', '4', null);
INSERT INTO `exercise_muscle` VALUES ('206', '126', '4', null);
INSERT INTO `exercise_muscle` VALUES ('216', '128', '9', null);
INSERT INTO `exercise_muscle` VALUES ('266', '9', '9', null);
INSERT INTO `exercise_muscle` VALUES ('221', '129', '1', null);
INSERT INTO `exercise_muscle` VALUES ('222', '130', '3', null);
INSERT INTO `exercise_muscle` VALUES ('223', '131', '13', null);
INSERT INTO `exercise_muscle` VALUES ('224', '132', '12', null);
INSERT INTO `exercise_muscle` VALUES ('232', '133', '8', null);
INSERT INTO `exercise_muscle` VALUES ('244', '134', '7', null);
INSERT INTO `exercise_muscle` VALUES ('251', '135', '11', null);
INSERT INTO `exercise_muscle` VALUES ('252', '136', '10', null);
INSERT INTO `exercise_muscle` VALUES ('254', '137', '2', null);

-- ----------------------------
-- Table structure for experiences
-- ----------------------------
DROP TABLE IF EXISTS `experiences`;
CREATE TABLE `experiences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of experiences
-- ----------------------------
INSERT INTO `experiences` VALUES ('1', 'Principiante');
INSERT INTO `experiences` VALUES ('2', 'Intermedio');
INSERT INTO `experiences` VALUES ('3', 'Avanzado');

-- ----------------------------
-- Table structure for experience_goal
-- ----------------------------
DROP TABLE IF EXISTS `experience_goal`;
CREATE TABLE `experience_goal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `experience_id` int(10) unsigned NOT NULL,
  `goal_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `experience_goal_experience_id_foreign` (`experience_id`),
  KEY `experience_goal_goal_id_foreign` (`goal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of experience_goal
-- ----------------------------
INSERT INTO `experience_goal` VALUES ('1', '1', '1');
INSERT INTO `experience_goal` VALUES ('2', '2', '2');
INSERT INTO `experience_goal` VALUES ('3', '2', '3');
INSERT INTO `experience_goal` VALUES ('4', '3', '2');
INSERT INTO `experience_goal` VALUES ('5', '3', '3');

-- ----------------------------
-- Table structure for experience_period
-- ----------------------------
DROP TABLE IF EXISTS `experience_period`;
CREATE TABLE `experience_period` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `experience_id` int(10) unsigned NOT NULL,
  `period_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `experience_period_experience_id_foreign` (`experience_id`),
  KEY `experience_period_period_id_foreign` (`period_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of experience_period
-- ----------------------------
INSERT INTO `experience_period` VALUES ('1', '1', '1');
INSERT INTO `experience_period` VALUES ('2', '2', '2');
INSERT INTO `experience_period` VALUES ('3', '2', '3');
INSERT INTO `experience_period` VALUES ('4', '2', '4');
INSERT INTO `experience_period` VALUES ('5', '2', '5');
INSERT INTO `experience_period` VALUES ('6', '3', '2');
INSERT INTO `experience_period` VALUES ('7', '3', '3');
INSERT INTO `experience_period` VALUES ('8', '3', '4');
INSERT INTO `experience_period` VALUES ('9', '3', '5');

-- ----------------------------
-- Table structure for goals
-- ----------------------------
DROP TABLE IF EXISTS `goals`;
CREATE TABLE `goals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of goals
-- ----------------------------
INSERT INTO `goals` VALUES ('1', 'Aprendizaje');
INSERT INTO `goals` VALUES ('2', 'Acondicionamiento físico');
INSERT INTO `goals` VALUES ('3', 'Competición/Fitness');

-- ----------------------------
-- Table structure for locals
-- ----------------------------
DROP TABLE IF EXISTS `locals`;
CREATE TABLE `locals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of locals
-- ----------------------------
INSERT INTO `locals` VALUES ('1', 'Surco', 'Av. Universitaria 323', null, null, null);
INSERT INTO `locals` VALUES ('2', 'Miraflores', 'Av. Pardo 3323', null, null, null);
INSERT INTO `locals` VALUES ('3', 'San Borja', 'Av. Pardo 3323', null, null, null);
INSERT INTO `locals` VALUES ('4', 'Surquillo', 'Av. Pardo 3323', null, null, null);
INSERT INTO `locals` VALUES ('5', 'Surco Viejo', 'Av. Pardo 3323', null, null, null);
INSERT INTO `locals` VALUES ('6', 'Carl', 'Av. Pardo 3323', null, null, null);
INSERT INTO `locals` VALUES ('7', 'Gernomo', 'Av. Pardo 3323', null, null, null);
INSERT INTO `locals` VALUES ('8', 'Chorrillos', 'Av. Pardo 3323', null, null, null);
INSERT INTO `locals` VALUES ('9', 'SJM', 'Av. Pardo 3323', null, null, null);
INSERT INTO `locals` VALUES ('10', 'Higereta', 'Av. Pardo 3323', null, null, null);
INSERT INTO `locals` VALUES ('11', 'Flores', 'Av. Pardo 3323', null, null, null);
INSERT INTO `locals` VALUES ('12', 'Lima', 'Av. Pardo 3323', null, null, null);
INSERT INTO `locals` VALUES ('13', 'Trujillo', 'Av. Pardo 3323', null, null, null);
INSERT INTO `locals` VALUES ('14', 'San Agustin', 'Av. Pardo 3323', null, null, null);
INSERT INTO `locals` VALUES ('15', 'Ica', 'Av. Pardo 3323', null, null, null);
INSERT INTO `locals` VALUES ('16', 'Loreto', 'Av. Pardo 3323', null, null, null);
INSERT INTO `locals` VALUES ('17', 'Tumbes', 'Av. Pardo 3323', null, null, null);
INSERT INTO `locals` VALUES ('18', 'Piura', 'Av. Pardo 3323', null, null, null);
INSERT INTO `locals` VALUES ('19', 'Lambayeque', 'Av. Pardo 3323', null, null, null);
INSERT INTO `locals` VALUES ('20', 'Colmena', 'Av. Pardo 3323', null, null, null);
INSERT INTO `locals` VALUES ('21', 'VMT', 'Av. Pardo 3323', null, null, null);

-- ----------------------------
-- Table structure for measures
-- ----------------------------
DROP TABLE IF EXISTS `measures`;
CREATE TABLE `measures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unity` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of measures
-- ----------------------------
INSERT INTO `measures` VALUES ('1', 'Cuello', 'cuello', 'cm');
INSERT INTO `measures` VALUES ('2', 'Hombros', 'hombros', 'cm');
INSERT INTO `measures` VALUES ('3', 'Pecho', 'pecho', 'cm');
INSERT INTO `measures` VALUES ('4', 'Cintura', 'cintura', 'cm');
INSERT INTO `measures` VALUES ('5', 'Cadera', 'cadera', 'cm');
INSERT INTO `measures` VALUES ('6', 'Brazo', 'brazo', 'cm');
INSERT INTO `measures` VALUES ('7', 'Antebrazo', 'antebrazo', 'cm');
INSERT INTO `measures` VALUES ('8', 'Trasero', 'trasero', 'cm');
INSERT INTO `measures` VALUES ('9', 'Pierna', 'pierna', 'cm');
INSERT INTO `measures` VALUES ('10', 'Pantorrilla', 'pantorrilla', 'cm');
INSERT INTO `measures` VALUES ('11', 'Talla', 'talla', 'cm');
INSERT INTO `measures` VALUES ('12', 'Peso', 'peso', 'Kg');
INSERT INTO `measures` VALUES ('13', 'Porc. Grasa', 'porcentajeGrasa', '%');
INSERT INTO `measures` VALUES ('14', 'Grasa', 'grasa', 'Kg');
INSERT INTO `measures` VALUES ('15', 'Porc. Masa Magra', 'porcentajeMasaMagra', '%');
INSERT INTO `measures` VALUES ('16', 'Masa Magra', 'masaMagra', 'Kg');
INSERT INTO `measures` VALUES ('17', 'IMC', 'imc', '-');
INSERT INTO `measures` VALUES ('18', 'ICC', 'icc', '-');

-- ----------------------------
-- Table structure for microcycles
-- ----------------------------
DROP TABLE IF EXISTS `microcycles`;
CREATE TABLE `microcycles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goal_id` int(10) unsigned NOT NULL,
  `experience_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `microcycles_experience_id_foreign` (`experience_id`),
  KEY `microcycles_goal_id_foreign` (`goal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of microcycles
-- ----------------------------
INSERT INTO `microcycles` VALUES ('1', '2', '2');
INSERT INTO `microcycles` VALUES ('2', '1', '1');
INSERT INTO `microcycles` VALUES ('3', '3', '2');
INSERT INTO `microcycles` VALUES ('4', '2', '2');
INSERT INTO `microcycles` VALUES ('5', '2', '2');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('109', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('110', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('111', '2017_02_23_222238_create_locals_table', '1');
INSERT INTO `migrations` VALUES ('112', '2017_03_03_215350_create_roles_table', '1');
INSERT INTO `migrations` VALUES ('113', '2017_03_03_221228_create_people_table', '1');
INSERT INTO `migrations` VALUES ('114', '2017_03_03_223610_create_person_role_local_table', '1');
INSERT INTO `migrations` VALUES ('115', '2017_03_06_194344_create_exercises_table', '1');
INSERT INTO `migrations` VALUES ('116', '2017_03_06_203917_create_muscles_table', '1');
INSERT INTO `migrations` VALUES ('117', '2017_03_06_204307_create_exercise_muscle_table', '1');
INSERT INTO `migrations` VALUES ('118', '2017_03_12_220739_create_zones_table', '1');
INSERT INTO `migrations` VALUES ('119', '2017_03_20_095244_create_strength_types_table', '1');
INSERT INTO `migrations` VALUES ('120', '2017_03_20_095343_create_training_phases_table', '1');
INSERT INTO `migrations` VALUES ('121', '2017_03_20_095547_create_experiences_table', '1');
INSERT INTO `migrations` VALUES ('122', '2017_03_20_095630_create_periods_table', '1');
INSERT INTO `migrations` VALUES ('123', '2017_03_20_095649_create_goals_table', '1');
INSERT INTO `migrations` VALUES ('124', '2017_03_20_095717_create_measures_table', '1');
INSERT INTO `migrations` VALUES ('125', '2017_03_20_095751_create_programs_table', '1');
INSERT INTO `migrations` VALUES ('126', '2017_03_20_100402_create_physical_evaluations_table', '1');
INSERT INTO `migrations` VALUES ('127', '2017_03_20_100429_create_physical_evaluation_measure_table', '1');
INSERT INTO `migrations` VALUES ('128', '2017_03_20_100757_create_routines_table', '1');
INSERT INTO `migrations` VALUES ('129', '2017_03_20_101128_create_trainings_table', '1');
INSERT INTO `migrations` VALUES ('130', '2017_03_20_101149_create_training_details_table', '1');
INSERT INTO `migrations` VALUES ('131', '2017_03_20_101211_create_training_exercises_table', '1');
INSERT INTO `migrations` VALUES ('132', '2017_03_20_101512_create_series_table', '1');
INSERT INTO `migrations` VALUES ('133', '2017_03_25_235335_create_experience_period_table', '1');
INSERT INTO `migrations` VALUES ('134', '2017_04_04_223958_add_fk_to_muscles_table', '1');
INSERT INTO `migrations` VALUES ('135', '2017_04_05_005508_create_experience_goal_table', '1');
INSERT INTO `migrations` VALUES ('136', '2017_04_05_005718_create_microcycles_table', '1');
INSERT INTO `migrations` VALUES ('137', '2017_04_05_010120_create_unit_microcycles_table', '1');
INSERT INTO `migrations` VALUES ('138', '2017_04_05_010526_create_pyramids_table', '1');
INSERT INTO `migrations` VALUES ('139', '2017_04_05_011017_create_antagonics_table', '1');
INSERT INTO `migrations` VALUES ('140', '2017_04_16_175207_create_training_sessions_table', '1');
INSERT INTO `migrations` VALUES ('141', '2017_04_22_132928_create_training_session_serie_table', '1');
INSERT INTO `migrations` VALUES ('142', '2017_04_28_211020_create_training_session_exercise_table', '1');
INSERT INTO `migrations` VALUES ('143', '2017_04_30_145753_create_routine_exercise_table', '1');
INSERT INTO `migrations` VALUES ('144', '2017_05_04_000750_create_period_measure_table', '1');

-- ----------------------------
-- Table structure for muscles
-- ----------------------------
DROP TABLE IF EXISTS `muscles`;
CREATE TABLE `muscles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_part` int(10) unsigned DEFAULT NULL,
  `priority` int(10) unsigned DEFAULT NULL,
  `measure_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `muscles_measure_id_foreign` (`measure_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of muscles
-- ----------------------------
INSERT INTO `muscles` VALUES ('1', 'Hombros', '0', '2', '2');
INSERT INTO `muscles` VALUES ('2', 'Bíceps', '0', '3', '6');
INSERT INTO `muscles` VALUES ('3', 'Tríceps', '0', '3', '6');
INSERT INTO `muscles` VALUES ('4', 'Antebrazo', '0', '4', '7');
INSERT INTO `muscles` VALUES ('5', 'Pecho', '0', '1', '3');
INSERT INTO `muscles` VALUES ('6', 'Espalda', '0', '1', '3');
INSERT INTO `muscles` VALUES ('7', 'Abdominales', '0', '4', '4');
INSERT INTO `muscles` VALUES ('8', 'Glúteos', '1', '1', '8');
INSERT INTO `muscles` VALUES ('9', 'Cuádriceps', '1', '1', '9');
INSERT INTO `muscles` VALUES ('10', 'Abductores', '1', '3', '9');
INSERT INTO `muscles` VALUES ('11', 'Aductores', '1', '3', '9');
INSERT INTO `muscles` VALUES ('12', 'Femorales', '1', '2', '9');
INSERT INTO `muscles` VALUES ('13', 'Gemelos', '1', '4', '10');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for people
-- ----------------------------
DROP TABLE IF EXISTS `people`;
CREATE TABLE `people` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sex` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_doc` int(10) unsigned DEFAULT NULL,
  `num_doc` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `experience_id` int(10) unsigned DEFAULT NULL,
  `goal_id` int(10) unsigned DEFAULT NULL,
  `trainer_id` int(10) unsigned DEFAULT NULL,
  `expiration_date` timestamp NULL DEFAULT NULL,
  `freeze_days` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `people_user_id_foreign` (`user_id`),
  KEY `people_experience_id_foreign` (`experience_id`),
  KEY `people_goal_id_foreign` (`goal_id`),
  KEY `people_trainer_id_foreign` (`trainer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of people
-- ----------------------------
INSERT INTO `people` VALUES ('1', null, null, null, 'Admin', null, null, null, 'admin', null, null, 'fotos_perfil/default.jpg', '1', null, null, null, null, null, null, null, null);
INSERT INTO `people` VALUES ('2', 'H', '0', '32329087', 'Alex', 'Aranibar', 'Mendoza', 'Surco viejo 2332', 'piereyed@gmail.com', '1990-04-20', null, 'fotos_perfil/2.jpg', '2', null, null, null, null, null, null, null, null);
INSERT INTO `people` VALUES ('3', 'H', '0', '32329017', 'Carlos', 'Zagastegui', 'Rosales', 'Surco 2332', 'pier.rojas@pucp.pe', '1990-01-22', null, 'fotos_perfil/3.jpg', '3', null, null, null, null, null, null, null, null);
INSERT INTO `people` VALUES ('4', 'H', '0', '91234543', 'Sharvel', 'Irigoyen', 'Matos', 'Surco 2323232', 'elmaster@hotmail.com', '1991-06-22', null, 'fotos_perfil/4.jpg', '4', '1', '1', '2', '2017-08-20 00:00:00', '15', null, null, '2017-06-19 00:44:22');

-- ----------------------------
-- Table structure for periods
-- ----------------------------
DROP TABLE IF EXISTS `periods`;
CREATE TABLE `periods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specific_goal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rest_duration` int(10) unsigned NOT NULL,
  `number_series` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of periods
-- ----------------------------
INSERT INTO `periods` VALUES ('1', 'Iniciación', 'Aprender', '120', '4');
INSERT INTO `periods` VALUES ('2', 'Desarrollo de fuerza', 'Aumentar fuerza', '180', '4');
INSERT INTO `periods` VALUES ('3', 'Construcción de masa muscular', 'Aumentar masa muscular', '60', '4');
INSERT INTO `periods` VALUES ('4', 'Separación muscular', 'Quemar grasa', '60', '3');
INSERT INTO `periods` VALUES ('5', 'Pérdida de peso', 'Perder peso', '90', '3');

-- ----------------------------
-- Table structure for period_measure
-- ----------------------------
DROP TABLE IF EXISTS `period_measure`;
CREATE TABLE `period_measure` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `period_id` int(10) unsigned NOT NULL,
  `measure_id` int(10) unsigned NOT NULL,
  `success` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `period_measure_period_id_foreign` (`period_id`),
  KEY `period_measure_measure_id_foreign` (`measure_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of period_measure
-- ----------------------------
INSERT INTO `period_measure` VALUES ('1', '3', '2', '1');
INSERT INTO `period_measure` VALUES ('2', '3', '3', '1');
INSERT INTO `period_measure` VALUES ('3', '3', '6', '1');
INSERT INTO `period_measure` VALUES ('4', '3', '7', '1');
INSERT INTO `period_measure` VALUES ('5', '3', '8', '1');
INSERT INTO `period_measure` VALUES ('6', '3', '9', '1');
INSERT INTO `period_measure` VALUES ('7', '3', '10', '1');
INSERT INTO `period_measure` VALUES ('8', '4', '13', '0');
INSERT INTO `period_measure` VALUES ('9', '5', '12', '0');

-- ----------------------------
-- Table structure for person_role_local
-- ----------------------------
DROP TABLE IF EXISTS `person_role_local`;
CREATE TABLE `person_role_local` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `local_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `person_role_local_person_id_foreign` (`person_id`),
  KEY `person_role_local_role_id_foreign` (`role_id`),
  KEY `person_role_local_local_id_foreign` (`local_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of person_role_local
-- ----------------------------
INSERT INTO `person_role_local` VALUES ('1', '1', '1', '1', null, null);
INSERT INTO `person_role_local` VALUES ('2', '2', '2', '1', null, null);
INSERT INTO `person_role_local` VALUES ('3', '2', '3', '1', null, null);
INSERT INTO `person_role_local` VALUES ('4', '3', '3', '1', null, null);
INSERT INTO `person_role_local` VALUES ('5', '4', '4', '1', null, null);

-- ----------------------------
-- Table structure for physical_evaluations
-- ----------------------------
DROP TABLE IF EXISTS `physical_evaluations`;
CREATE TABLE `physical_evaluations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` int(10) unsigned NOT NULL,
  `routine_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `physical_evaluations_person_id_foreign` (`person_id`),
  KEY `physical_evaluations_routine_id_foreign` (`routine_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of physical_evaluations
-- ----------------------------
INSERT INTO `physical_evaluations` VALUES ('1', '4', null, '2017-06-19 00:44:22', '2017-06-19 00:44:22');

-- ----------------------------
-- Table structure for physical_evaluation_measure
-- ----------------------------
DROP TABLE IF EXISTS `physical_evaluation_measure`;
CREATE TABLE `physical_evaluation_measure` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `physical_evaluation_id` int(10) unsigned NOT NULL,
  `measure_id` int(10) unsigned NOT NULL,
  `value` double(8,2) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `physical_evaluation_measure_physical_evaluation_id_foreign` (`physical_evaluation_id`),
  KEY `physical_evaluation_measure_measure_id_foreign` (`measure_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of physical_evaluation_measure
-- ----------------------------
INSERT INTO `physical_evaluation_measure` VALUES ('1', '1', '1', '10.00', '2017-06-19 00:44:22', '2017-06-19 00:44:22');
INSERT INTO `physical_evaluation_measure` VALUES ('2', '1', '2', '30.00', '2017-06-19 00:44:22', '2017-06-19 00:44:22');
INSERT INTO `physical_evaluation_measure` VALUES ('3', '1', '3', '50.00', '2017-06-19 00:44:22', '2017-06-19 00:44:22');
INSERT INTO `physical_evaluation_measure` VALUES ('4', '1', '4', '51.00', '2017-06-19 00:44:22', '2017-06-19 00:44:22');
INSERT INTO `physical_evaluation_measure` VALUES ('5', '1', '5', '51.00', '2017-06-19 00:44:22', '2017-06-19 00:44:22');
INSERT INTO `physical_evaluation_measure` VALUES ('6', '1', '6', '15.00', '2017-06-19 00:44:22', '2017-06-19 00:44:22');
INSERT INTO `physical_evaluation_measure` VALUES ('7', '1', '7', '10.00', '2017-06-19 00:44:22', '2017-06-19 00:44:22');
INSERT INTO `physical_evaluation_measure` VALUES ('8', '1', '8', '50.00', '2017-06-19 00:44:22', '2017-06-19 00:44:22');
INSERT INTO `physical_evaluation_measure` VALUES ('9', '1', '9', '40.00', '2017-06-19 00:44:22', '2017-06-19 00:44:22');
INSERT INTO `physical_evaluation_measure` VALUES ('10', '1', '10', '30.00', '2017-06-19 00:44:22', '2017-06-19 00:44:22');
INSERT INTO `physical_evaluation_measure` VALUES ('11', '1', '11', '180.00', '2017-06-19 00:44:22', '2017-06-19 00:44:22');
INSERT INTO `physical_evaluation_measure` VALUES ('12', '1', '12', '80.00', '2017-06-19 00:44:22', '2017-06-19 00:44:22');
INSERT INTO `physical_evaluation_measure` VALUES ('13', '1', '13', '19.00', '2017-06-19 00:44:22', '2017-06-19 00:44:22');
INSERT INTO `physical_evaluation_measure` VALUES ('14', '1', '14', '15.20', '2017-06-19 00:44:22', '2017-06-19 00:44:22');
INSERT INTO `physical_evaluation_measure` VALUES ('15', '1', '15', '81.00', '2017-06-19 00:44:22', '2017-06-19 00:44:22');
INSERT INTO `physical_evaluation_measure` VALUES ('16', '1', '16', '64.80', '2017-06-19 00:44:22', '2017-06-19 00:44:22');
INSERT INTO `physical_evaluation_measure` VALUES ('17', '1', '17', '24.69', '2017-06-19 00:44:22', '2017-06-19 00:44:22');
INSERT INTO `physical_evaluation_measure` VALUES ('18', '1', '18', '1.00', '2017-06-19 00:44:22', '2017-06-19 00:44:22');

-- ----------------------------
-- Table structure for programs
-- ----------------------------
DROP TABLE IF EXISTS `programs`;
CREATE TABLE `programs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` int(10) unsigned NOT NULL,
  `person_id` int(10) unsigned NOT NULL,
  `finished` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `programs_person_id_foreign` (`person_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of programs
-- ----------------------------

-- ----------------------------
-- Table structure for pyramids
-- ----------------------------
DROP TABLE IF EXISTS `pyramids`;
CREATE TABLE `pyramids` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `percentage_rm` int(10) unsigned NOT NULL,
  `period_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pyramids_period_id_foreign` (`period_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of pyramids
-- ----------------------------
INSERT INTO `pyramids` VALUES ('1', '15', '2');
INSERT INTO `pyramids` VALUES ('2', '12', '2');
INSERT INTO `pyramids` VALUES ('3', '10', '2');
INSERT INTO `pyramids` VALUES ('4', '15', '1');
INSERT INTO `pyramids` VALUES ('5', '15', '1');
INSERT INTO `pyramids` VALUES ('6', '15', '1');
INSERT INTO `pyramids` VALUES ('7', '15', '1');
INSERT INTO `pyramids` VALUES ('8', '15', '3');
INSERT INTO `pyramids` VALUES ('9', '12', '3');
INSERT INTO `pyramids` VALUES ('10', '8', '3');
INSERT INTO `pyramids` VALUES ('11', '6', '3');
INSERT INTO `pyramids` VALUES ('12', '15', '4');
INSERT INTO `pyramids` VALUES ('13', '15', '4');
INSERT INTO `pyramids` VALUES ('14', '15', '4');
INSERT INTO `pyramids` VALUES ('15', '12', '5');
INSERT INTO `pyramids` VALUES ('16', '12', '5');
INSERT INTO `pyramids` VALUES ('17', '12', '5');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Super', null, null, null);
INSERT INTO `roles` VALUES ('2', 'Administrador', null, null, null);
INSERT INTO `roles` VALUES ('3', 'Entrenador', null, null, null);
INSERT INTO `roles` VALUES ('4', 'Cliente', null, null, null);

-- ----------------------------
-- Table structure for routines
-- ----------------------------
DROP TABLE IF EXISTS `routines`;
CREATE TABLE `routines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` int(10) unsigned NOT NULL,
  `program_id` int(10) unsigned NOT NULL,
  `period_id` int(10) unsigned NOT NULL,
  `goal_id` int(10) unsigned NOT NULL,
  `total_sessions` int(10) unsigned NOT NULL,
  `weeks` int(10) unsigned NOT NULL,
  `trainings_quantity` int(10) unsigned NOT NULL,
  `finished` tinyint(1) NOT NULL,
  `evaluated` tinyint(1) NOT NULL,
  `person_id` int(10) unsigned NOT NULL,
  `trainer_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `routines_program_id_foreign` (`program_id`),
  KEY `routines_period_id_foreign` (`period_id`),
  KEY `routines_goal_id_foreign` (`goal_id`),
  KEY `routines_person_id_foreign` (`person_id`),
  KEY `routines_trainer_id_foreign` (`trainer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of routines
-- ----------------------------

-- ----------------------------
-- Table structure for routine_exercise
-- ----------------------------
DROP TABLE IF EXISTS `routine_exercise`;
CREATE TABLE `routine_exercise` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rm_inicial` int(11) NOT NULL,
  `rm_final` int(11) DEFAULT NULL,
  `person_id` int(10) unsigned NOT NULL,
  `routine_id` int(10) unsigned NOT NULL,
  `exercise_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `routine_exercise_person_id_foreign` (`person_id`),
  KEY `routine_exercise_routine_id_foreign` (`routine_id`),
  KEY `routine_exercise_exercise_id_foreign` (`exercise_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of routine_exercise
-- ----------------------------

-- ----------------------------
-- Table structure for series
-- ----------------------------
DROP TABLE IF EXISTS `series`;
CREATE TABLE `series` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` int(10) unsigned NOT NULL,
  `repetitions` int(10) unsigned DEFAULT NULL,
  `weight` double(8,2) DEFAULT NULL,
  `lb_weight` double(8,2) DEFAULT NULL,
  `percentage_weight` double(8,2) DEFAULT NULL,
  `training_exercise_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `series_training_exercise_id_foreign` (`training_exercise_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of series
-- ----------------------------

-- ----------------------------
-- Table structure for strength_types
-- ----------------------------
DROP TABLE IF EXISTS `strength_types`;
CREATE TABLE `strength_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of strength_types
-- ----------------------------
INSERT INTO `strength_types` VALUES ('1', 'Fuerza Explosiva', 'Máxima aceleración posible');
INSERT INTO `strength_types` VALUES ('2', 'Fuerza Rápida', 'Rápida aceleración');
INSERT INTO `strength_types` VALUES ('3', 'Fuerza Constante', 'Mínima aceleración posible');

-- ----------------------------
-- Table structure for trainings
-- ----------------------------
DROP TABLE IF EXISTS `trainings`;
CREATE TABLE `trainings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `letter` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(10) unsigned DEFAULT NULL,
  `type_session` int(10) unsigned NOT NULL,
  `resting_time` int(10) unsigned NOT NULL,
  `routine_id` int(10) unsigned NOT NULL,
  `strength_type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `trainings_routine_id_foreign` (`routine_id`),
  KEY `trainings_strength_type_id_foreign` (`strength_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of trainings
-- ----------------------------

-- ----------------------------
-- Table structure for training_details
-- ----------------------------
DROP TABLE IF EXISTS `training_details`;
CREATE TABLE `training_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(10) unsigned NOT NULL,
  `training_id` int(10) unsigned NOT NULL,
  `training_phase_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `training_details_training_id_foreign` (`training_id`),
  KEY `training_details_training_phase_id_foreign` (`training_phase_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of training_details
-- ----------------------------

-- ----------------------------
-- Table structure for training_exercises
-- ----------------------------
DROP TABLE IF EXISTS `training_exercises`;
CREATE TABLE `training_exercises` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `time` int(10) unsigned DEFAULT NULL,
  `min_heart_rate` int(10) unsigned DEFAULT NULL,
  `max_heart_rate` int(10) unsigned DEFAULT NULL,
  `exercise_id` int(10) unsigned NOT NULL,
  `training_detail_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `training_exercises_exercise_id_foreign` (`exercise_id`),
  KEY `training_exercises_training_detail_id_foreign` (`training_detail_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of training_exercises
-- ----------------------------

-- ----------------------------
-- Table structure for training_phases
-- ----------------------------
DROP TABLE IF EXISTS `training_phases`;
CREATE TABLE `training_phases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_duration` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of training_phases
-- ----------------------------
INSERT INTO `training_phases` VALUES ('1', 'Calentamiento', '5');
INSERT INTO `training_phases` VALUES ('2', 'Principal', null);
INSERT INTO `training_phases` VALUES ('3', 'Estiramiento', '2');

-- ----------------------------
-- Table structure for training_sessions
-- ----------------------------
DROP TABLE IF EXISTS `training_sessions`;
CREATE TABLE `training_sessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` int(10) unsigned NOT NULL,
  `done` tinyint(1) NOT NULL,
  `work_objetive` int(10) unsigned NOT NULL,
  `work_done` int(10) unsigned NOT NULL,
  `efficiency` double(8,2) unsigned NOT NULL,
  `duration` int(10) unsigned NOT NULL,
  `training_id` int(10) unsigned NOT NULL,
  `routine_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `training_sessions_training_id_foreign` (`training_id`),
  KEY `training_sessions_routine_id_foreign` (`routine_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of training_sessions
-- ----------------------------

-- ----------------------------
-- Table structure for training_session_exercise
-- ----------------------------
DROP TABLE IF EXISTS `training_session_exercise`;
CREATE TABLE `training_session_exercise` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `work_objetive` int(10) unsigned NOT NULL,
  `work_done` int(10) unsigned NOT NULL,
  `efficiency` double(8,2) unsigned NOT NULL,
  `rm` int(10) unsigned NOT NULL,
  `exercise_id` int(10) unsigned NOT NULL,
  `training_session_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `training_session_exercise_exercise_id_foreign` (`exercise_id`),
  KEY `training_session_exercise_training_session_id_foreign` (`training_session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of training_session_exercise
-- ----------------------------

-- ----------------------------
-- Table structure for training_session_serie
-- ----------------------------
DROP TABLE IF EXISTS `training_session_serie`;
CREATE TABLE `training_session_serie` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weight` int(10) unsigned NOT NULL,
  `weight_lifted` int(10) unsigned NOT NULL,
  `repetitions` int(10) unsigned NOT NULL,
  `repetitions_done` int(10) unsigned NOT NULL,
  `work` int(10) unsigned NOT NULL,
  `work_done` int(10) unsigned NOT NULL,
  `efficiency` double(8,2) unsigned NOT NULL,
  `serie_id` int(10) unsigned NOT NULL,
  `training_session_id` int(10) unsigned NOT NULL,
  `training_exercise_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `training_session_serie_serie_id_foreign` (`serie_id`),
  KEY `training_session_serie_training_session_id_foreign` (`training_session_id`),
  KEY `training_session_serie_training_exercise_id_foreign` (`training_exercise_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of training_session_serie
-- ----------------------------

-- ----------------------------
-- Table structure for unit_microcycles
-- ----------------------------
DROP TABLE IF EXISTS `unit_microcycles`;
CREATE TABLE `unit_microcycles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `letter` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(10) unsigned DEFAULT NULL,
  `type_session` int(10) unsigned NOT NULL,
  `microcycle_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `unit_microcycles_microcycle_id_foreign` (`microcycle_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of unit_microcycles
-- ----------------------------
INSERT INTO `unit_microcycles` VALUES ('1', 'a', '0', '1', '1');
INSERT INTO `unit_microcycles` VALUES ('2', '-', '0', '0', '1');
INSERT INTO `unit_microcycles` VALUES ('3', 'a', '0', '1', '1');
INSERT INTO `unit_microcycles` VALUES ('4', '-', '0', '0', '1');
INSERT INTO `unit_microcycles` VALUES ('5', 'a', '0', '1', '1');
INSERT INTO `unit_microcycles` VALUES ('6', '-', '0', '0', '1');
INSERT INTO `unit_microcycles` VALUES ('7', '-', '0', '0', '1');
INSERT INTO `unit_microcycles` VALUES ('8', 'a', '0', '1', '2');
INSERT INTO `unit_microcycles` VALUES ('9', '-', '0', '0', '2');
INSERT INTO `unit_microcycles` VALUES ('10', 'b', '0', '1', '2');
INSERT INTO `unit_microcycles` VALUES ('11', '-', '0', '0', '2');
INSERT INTO `unit_microcycles` VALUES ('12', 'c', '0', '1', '2');
INSERT INTO `unit_microcycles` VALUES ('13', '-', '0', '0', '2');
INSERT INTO `unit_microcycles` VALUES ('14', '-', '0', '0', '2');
INSERT INTO `unit_microcycles` VALUES ('15', 'a', '0', '1', '3');
INSERT INTO `unit_microcycles` VALUES ('16', 'b', '0', '1', '3');
INSERT INTO `unit_microcycles` VALUES ('17', '-', '0', '0', '3');
INSERT INTO `unit_microcycles` VALUES ('18', 'c', '0', '1', '3');
INSERT INTO `unit_microcycles` VALUES ('19', 'd', '0', '1', '3');
INSERT INTO `unit_microcycles` VALUES ('20', '-', '0', '0', '3');
INSERT INTO `unit_microcycles` VALUES ('21', '-', '0', '0', '3');
INSERT INTO `unit_microcycles` VALUES ('22', 'a', '0', '1', '4');
INSERT INTO `unit_microcycles` VALUES ('23', 'b', '0', '1', '4');
INSERT INTO `unit_microcycles` VALUES ('24', '-', '0', '0', '4');
INSERT INTO `unit_microcycles` VALUES ('25', 'c', '0', '1', '4');
INSERT INTO `unit_microcycles` VALUES ('26', 'a', '0', '1', '4');
INSERT INTO `unit_microcycles` VALUES ('27', '-', '0', '0', '4');
INSERT INTO `unit_microcycles` VALUES ('28', '-', '0', '0', '4');
INSERT INTO `unit_microcycles` VALUES ('29', 'b', '0', '1', '4');
INSERT INTO `unit_microcycles` VALUES ('30', 'c', '0', '1', '4');
INSERT INTO `unit_microcycles` VALUES ('31', '-', '0', '0', '4');
INSERT INTO `unit_microcycles` VALUES ('32', 'a', '0', '1', '4');
INSERT INTO `unit_microcycles` VALUES ('33', 'b', '0', '1', '4');
INSERT INTO `unit_microcycles` VALUES ('34', '-', '0', '0', '4');
INSERT INTO `unit_microcycles` VALUES ('35', '-', '0', '0', '4');
INSERT INTO `unit_microcycles` VALUES ('36', 'c', '0', '1', '4');
INSERT INTO `unit_microcycles` VALUES ('37', 'a', '0', '1', '4');
INSERT INTO `unit_microcycles` VALUES ('38', '-', '0', '0', '4');
INSERT INTO `unit_microcycles` VALUES ('39', 'b', '0', '1', '4');
INSERT INTO `unit_microcycles` VALUES ('40', 'c', '0', '1', '4');
INSERT INTO `unit_microcycles` VALUES ('41', '-', '0', '0', '4');
INSERT INTO `unit_microcycles` VALUES ('42', '-', '0', '0', '4');
INSERT INTO `unit_microcycles` VALUES ('43', 'a', '0', '1', '5');
INSERT INTO `unit_microcycles` VALUES ('44', '-', '0', '0', '5');
INSERT INTO `unit_microcycles` VALUES ('45', 'b', '0', '1', '5');
INSERT INTO `unit_microcycles` VALUES ('46', '-', '0', '0', '5');
INSERT INTO `unit_microcycles` VALUES ('47', 'c', '0', '1', '5');
INSERT INTO `unit_microcycles` VALUES ('48', '-', '0', '0', '5');
INSERT INTO `unit_microcycles` VALUES ('49', '-', '0', '0', '5');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'admin', '$2y$10$FoOkDcDOFnpdXFhb/qxPJek71XtpTFgkEzghiliEEjUB5RsX2zxGW', null, null, null);
INSERT INTO `users` VALUES ('2', 'Alex Aranibar', 'piereyed@gmail.com', '$2y$10$ps2Rv6PngHAr1AMcOlkWje9RIzHHaFAypbIvSNg0rDJscvFFuvNha', null, null, null);
INSERT INTO `users` VALUES ('3', 'Carlos Zagastegui', 'pier.rojas@pucp.pe', '$2y$10$hTZ8zTbMDJ1Yj37ckdnTEecHKZNKceq6sFFqqr9gX4OSuGXJ89Dta', null, null, null);
INSERT INTO `users` VALUES ('4', 'Sharvel Irigoyen', 'elmaster_11@hotmail.com', '$2y$10$z6TpmpDtvvwck15bXp5N3eUez3zvDYNSEhnUyAx5elDsN5NeNgeIy', 'XNC5zc8EwOJHq5Fsa740whcWMNIsh1KaCvQV8pjLnqw9Ss8q3pb3Bt2U7v9V', null, null);

-- ----------------------------
-- Table structure for zones
-- ----------------------------
DROP TABLE IF EXISTS `zones`;
CREATE TABLE `zones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `muscle_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `zones_muscle_id_foreign` (`muscle_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of zones
-- ----------------------------
INSERT INTO `zones` VALUES ('1', 'Pecho alto', '5');
INSERT INTO `zones` VALUES ('2', 'Pecho medio', '5');
INSERT INTO `zones` VALUES ('3', 'Pecho bajo', '5');
INSERT INTO `zones` VALUES ('4', 'Dorsal', '6');
INSERT INTO `zones` VALUES ('5', 'Espalda baja', '6');
INSERT INTO `zones` VALUES ('6', 'Trapecios', '6');

/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100121
 Source Host           : localhost:3306
 Source Schema         : rsu_elibrary

 Target Server Type    : MySQL
 Target Server Version : 100121
 File Encoding         : 65001

 Date: 11/02/2021 09:00:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `akses` enum('admin','billing','simpeg','ppi','rme','loadbed','adminbed') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `photo` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`user_id`, `username`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 58 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengguna
-- ----------------------------
INSERT INTO `pengguna` VALUES (44, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'ava-f7177163c833dff4b38fc8d2872f1ec6.jpg');
INSERT INTO `pengguna` VALUES (54, 'prabawa', 'prabawa', '41434fce2b1f5bd679f69f04addabdc0', 'admin', '');
INSERT INTO `pengguna` VALUES (48, 'bed', 'bed', '001cbc059a402b3be7c99be558eaaf73', 'loadbed', '');
INSERT INTO `pengguna` VALUES (56, 'ira', 'ira', '3c67080a1a09b022fb9d94e57a75ddad', 'admin', '');
INSERT INTO `pengguna` VALUES (57, 'dana', 'dana', '21cb4e4be93c09542ffa73b2b5cb95ea', '', '');

-- ----------------------------
-- Table structure for perpus_dok
-- ----------------------------
DROP TABLE IF EXISTS `perpus_dok`;
CREATE TABLE `perpus_dok`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `file` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `judul` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `user` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `visible` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  `tgl` date NULL DEFAULT NULL,
  INDEX `Index 1`(`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perpus_dok
-- ----------------------------
INSERT INTO `perpus_dok` VALUES (7, '1', 'file_1567432734.pdf', 'asdf', 'asdfsdf', 'admin', '1', '2019-09-02');

-- ----------------------------
-- Table structure for perpus_dok_item
-- ----------------------------
DROP TABLE IF EXISTS `perpus_dok_item`;
CREATE TABLE `perpus_dok_item`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_lap` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perpus_dok_item
-- ----------------------------
INSERT INTO `perpus_dok_item` VALUES (1, 'Laporan A');
INSERT INTO `perpus_dok_item` VALUES (2, 'Laporan B');

-- ----------------------------
-- Table structure for perpus_mhs
-- ----------------------------
DROP TABLE IF EXISTS `perpus_mhs`;
CREATE TABLE `perpus_mhs`  (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `instansi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tahun` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `abstrak` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tanggal` date NULL DEFAULT NULL,
  `uploadby` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `file` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  INDEX `Index 1`(`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perpus_mhs
-- ----------------------------
INSERT INTO `perpus_mhs` VALUES (8, 'Gede Coba Coba', 'UGM (Universitas gajah Mada)', 'Judul', '2019', '', '2019-09-09', 'admin', 'file_1567998480.pdf');

-- ----------------------------
-- Table structure for perpus_reg
-- ----------------------------
DROP TABLE IF EXISTS `perpus_reg`;
CREATE TABLE `perpus_reg`  (
  `idbuku` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_buku` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nobuku` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jbuku` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jml` int(3) NULL DEFAULT NULL,
  `regtime` date NULL DEFAULT NULL,
  `pengarang` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ket` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `userid` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cover` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  INDEX `Index 1`(`idbuku`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perpus_reg
-- ----------------------------
INSERT INTO `perpus_reg` VALUES (8, '1', 'asdf', 'asdf', 5, '2019-09-01', 'adsf', 'asdf', 'admin', 'file_1567329504.png');

-- ----------------------------
-- Table structure for perpus_reg_item
-- ----------------------------
DROP TABLE IF EXISTS `perpus_reg_item`;
CREATE TABLE `perpus_reg_item`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_buku` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perpus_reg_item
-- ----------------------------
INSERT INTO `perpus_reg_item` VALUES (1, 'KESEHATAN');
INSERT INTO `perpus_reg_item` VALUES (2, 'KEPERAWATAN');

-- ----------------------------
-- Table structure for perpus_rules
-- ----------------------------
DROP TABLE IF EXISTS `perpus_rules`;
CREATE TABLE `perpus_rules`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `namadok` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `visible` int(11) NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `uploadby` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `judul` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  INDEX `Index 1`(`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 146 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perpus_rules
-- ----------------------------
INSERT INTO `perpus_rules` VALUES (144, '1', 'file_1567988313.pdf', 'asdf', 1, '2019-09-09', 'admin', 'asd');
INSERT INTO `perpus_rules` VALUES (145, '2', 'file_1568334405.pdf', 'asdf', 1, '2019-09-13', 'admin', 'asdf');

-- ----------------------------
-- Table structure for perpus_rules_item
-- ----------------------------
DROP TABLE IF EXISTS `perpus_rules_item`;
CREATE TABLE `perpus_rules_item`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_regulasi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perpus_rules_item
-- ----------------------------
INSERT INTO `perpus_rules_item` VALUES (1, 'KEPUTUSAN MENTERI KESEHATAN');
INSERT INTO `perpus_rules_item` VALUES (2, 'PERATURAN MENTERI KESEHATAN');
INSERT INTO `perpus_rules_item` VALUES (3, 'PERATURAN PEMERINTAH');
INSERT INTO `perpus_rules_item` VALUES (4, 'SURAT EDARAN');
INSERT INTO `perpus_rules_item` VALUES (9, 'test');
INSERT INTO `perpus_rules_item` VALUES (6, 'UNDANG-UNDANG');

SET FOREIGN_KEY_CHECKS = 1;

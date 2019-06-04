/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : jiaoyito

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-05-24 09:37:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for store_imgs
-- ----------------------------
DROP TABLE IF EXISTS `store_imgs`;
CREATE TABLE `store_imgs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `s_id` int(10) unsigned NOT NULL COMMENT '商品id',
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品图片地址',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `store_imgs_s_id_index` (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of store_imgs
-- ----------------------------

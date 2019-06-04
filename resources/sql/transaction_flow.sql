/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : jiaoyito

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-05-23 10:20:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for transaction_flow
-- ----------------------------
DROP TABLE IF EXISTS `transaction_flow`;
CREATE TABLE `transaction_flow` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` int(10) unsigned NOT NULL COMMENT '账户余额',
  `money` int(10) unsigned NOT NULL COMMENT '提现金额',
  `u_id` int(10) unsigned NOT NULL COMMENT '提现用户',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '状态 0 处理中 1成功 2失败',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of transaction_flow
-- ----------------------------

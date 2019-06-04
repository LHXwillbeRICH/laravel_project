/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : jiaoyito

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-05-23 10:20:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for pay_logs
-- ----------------------------
DROP TABLE IF EXISTS `pay_logs`;
CREATE TABLE `pay_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(10) unsigned NOT NULL COMMENT '支付用户',
  `status` tinyint(3) unsigned NOT NULL COMMENT '支付状态 1成功 2 失败',
  `msg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '错误描述',
  `pay_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '支付类型',
  `tory` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '同步日志还是异步日志 1异步 2同步',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of pay_logs
-- ----------------------------

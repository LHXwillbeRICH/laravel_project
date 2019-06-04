/*
Navicat MySQL Data Transfer

Source Server         : blog
Source Server Version : 50641
Source Host           : 39.106.111.218:3306
Source Database       : jiaoyito

Target Server Type    : MYSQL
Target Server Version : 50641
File Encoding         : 65001

Date: 2019-05-14 17:34:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `realname` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '真实姓名',
  `nickname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '微信昵称',
  `iphone` char(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '手机号',
  `union_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '微信unionID',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '用户状态 1正常 2删除',
  `sex` tinyint(1) unsigned NOT NULL COMMENT '性别',
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '微信头像',
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admins_iphone_index` (`iphone`) USING BTREE,
  KEY `admins_union_id_index` (`union_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户表';

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('3', '', '李昊翾', '', 'oIMQkw3iOLfiXxoPtregpYTKSNb0', '1', '1', 'http://thirdwx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKvcalq6tiaJVF5apOic79YoAf3DQmLYsqv0rfPLtS4wOXIoOA1tBrLUopDliaTQ5SKc71D31MzYF78A/132', '6lEAqEKHZTeaBzNpUBKtoOkP30IB99QvUzHlchQwSuppDRY3PjdybUVLmWe9', '2019-05-13 06:11:07', '2019-05-13 06:11:07');
INSERT INTO `users` VALUES ('9', '', '二进制', '', 'oIMQkw7QnKFmTxX4omL7evB990DU', '1', '0', 'http://thirdwx.qlogo.cn/mmopen/vi_32/GPUjaSkkMLRUC1d2G53hVmDXwvvFicwF9ZQVKE5qicSN7DYacibAT6BateyPaBN3SvP0zODr2oZnZic4FyTPLLjNfQ/132', 'akeEWFgzdaTqU5k6YsHfqpcGT9G3pq7kMzkkGA3ecPOHy06un2OHF6OwwixF', '2019-05-14 02:39:50', '2019-05-14 02:39:50');

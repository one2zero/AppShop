/*
 Navicat Premium Data Transfer

 Source Server         : mobapp
 Source Server Type    : MySQL
 Source Server Version : 50531
 Source Host           : 192.168.21.89
 Source Database       : test

 Target Server Type    : MySQL
 Target Server Version : 50531
 File Encoding         : utf-8

 Date: 11/16/2013 14:30:13 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `new_auto_ipa`
-- ----------------------------
DROP TABLE IF EXISTS `new_auto_ipa`;
CREATE TABLE `new_auto_ipa` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `app_power` int(50) DEFAULT NULL COMMENT 'app下载权限',
  `platform` varchar(50) DEFAULT NULL COMMENT '安装平台',
  `prj_name` varchar(100) DEFAULT NULL COMMENT '工程名',
  `prj_svn` varchar(255) DEFAULT NULL COMMENT '项目svn路径',
  `add_time` datetime DEFAULT NULL,
  `add_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `new_auto_ipa`
-- ----------------------------
BEGIN;
INSERT INTO `new_auto_ipa` VALUES ('1', '1', 'iphone', 'TM', 'http://tengna@192.168.16.81:58760/svn/MOBAPP/TM/IOS/trunk/TM_Internal', '2013-11-16 14:19:05', 'lichuangye'), ('6', '1', 'iphone', 'ScheduleBus', 'http://tengna@192.168.16.81:58760/svn/MOBAPP/TM/IOS/trunk/TM_Internal', '2013-11-15 13:56:58', 'sunjianwen');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

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

 Date: 11/16/2013 14:30:05 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `new_auto_build`
-- ----------------------------
DROP TABLE IF EXISTS `new_auto_build`;
CREATE TABLE `new_auto_build` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) DEFAULT '0' COMMENT '项目id，同new_config_prj表ID',
  `app_platform` int(20) DEFAULT '0',
  `app_name` varchar(100) CHARACTER SET utf8 DEFAULT '0' COMMENT '项目工程名',
  `build_type` int(50) DEFAULT '0' COMMENT '编译类型：1 编译单个工程；2 编译workspace',
  `app_svn` varchar(255) CHARACTER SET utf8 DEFAULT '0' COMMENT '项目svn路径',
  `app_system` varchar(50) CHARACTER SET utf8 DEFAULT '0' COMMENT '项目使用平台：IOS 、Android',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `new_auto_build`
-- ----------------------------
BEGIN;
INSERT INTO `new_auto_build` VALUES ('6', '1', '1', 'TM', '1', '0', '0');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

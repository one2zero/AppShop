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

 Date: 11/16/2013 14:30:19 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `new_config_prj`
-- ----------------------------
DROP TABLE IF EXISTS `new_config_prj`;
CREATE TABLE `new_config_prj` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `prj_num` int(10) NOT NULL COMMENT '项目编号',
  `prj_name` text NOT NULL COMMENT '项目名称：',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `new_config_prj`
-- ----------------------------
BEGIN;
INSERT INTO `new_config_prj` VALUES ('1', '1', 'XYZ'), ('2', '2', 'TYP'), ('3', '3', 'MICEN'), ('4', '4', 'TM'), ('6', '6', 'ScheduleBus'), ('8', '8', 'FastMatch'), ('9', '9', 'Suitcase'), ('10', '10', 'Magazine'), ('12', '11', 'MCRM');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

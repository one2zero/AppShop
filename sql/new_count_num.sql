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

 Date: 11/16/2013 14:30:25 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `new_count_num`
-- ----------------------------
DROP TABLE IF EXISTS `new_count_num`;
CREATE TABLE `new_count_num` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `index_num` bigint(255) DEFAULT '0',
  `login_num` bigint(255) DEFAULT '0',
  `manage_num` bigint(255) DEFAULT '0',
  `pri_num` bigint(255) DEFAULT '0',
  `prj_num` bigint(255) DEFAULT '0',
  `pub_num` bigint(255) DEFAULT '0',
  `auto_ios` bigint(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `new_count_num`
-- ----------------------------
BEGIN;
INSERT INTO `new_count_num` VALUES ('1', '709', '112', '261', '54', '191', '193', '57');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

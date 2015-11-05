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

 Date: 11/16/2013 14:30:32 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `new_user_info`
-- ----------------------------
DROP TABLE IF EXISTS `new_user_info`;
CREATE TABLE `new_user_info` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL COMMENT '用户名',
  `password` varchar(100) NOT NULL COMMENT '密码',
  `state` int(10) NOT NULL COMMENT '状态：0 不可用 ；1 可用',
  `role` int(10) NOT NULL COMMENT '用户角色：1 admin；2 开发；3 测试；4 需求；5产品',
  `power` int(10) NOT NULL COMMENT '权限：1 下载；2 添加，删除； 3 所有权限',
  `NumLoginFail` int(10) DEFAULT '0' COMMENT '登录失败次数',
  `LastLogin` datetime DEFAULT NULL COMMENT '最后登录时间',
  `add_time` datetime DEFAULT NULL,
  `add_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `new_user_info`
-- ----------------------------
BEGIN;
INSERT INTO `new_user_info` VALUES ('1', 'lichuangye', 'test1234', '1', '1', '3', '0', '0000-00-00 00:00:00', '2013-11-03 20:24:16', ''), ('4', 'tengna', 'tengxiaona', '1', '3', '2', '0', '0000-00-00 00:00:00', '2013-11-04 00:15:36', 'lichuangye'), ('5', 'liudongxiang', 'ldx123', '1', '2', '2', '0', '0000-00-00 00:00:00', '2013-11-05 11:16:21', 'lichuangye'), ('6', 'sunjianwen', 'sjw1234', '1', '2', '2', '0', '0000-00-00 00:00:00', '2013-11-05 16:33:04', 'lichuangye'), ('7', 'xiongjiangwei', 'xjwdev', '1', '2', '2', '0', '0000-00-00 00:00:00', '2013-11-05 16:34:06', 'lichuangye'), ('8', 'wuyu', 'wuyu', '1', '2', '2', '0', '2013-11-05 17:04:44', '2013-11-05 17:04:44', 'lichuangye'), ('9', 'shaoliying', 'xqsly', '1', '4', '2', '0', '0000-00-00 00:00:00', '2013-11-06 08:37:10', 'lichuangye'), ('10', 'lujingyu', '123123', '1', '2', '2', '0', '0000-00-00 00:00:00', '2013-11-06 15:49:51', 'lichuangye');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

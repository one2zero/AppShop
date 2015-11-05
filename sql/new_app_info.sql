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

 Date: 11/16/2013 14:29:59 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `new_app_info`
-- ----------------------------
DROP TABLE IF EXISTS `new_app_info`;
CREATE TABLE `new_app_info` (
  `id` bigint(100) NOT NULL AUTO_INCREMENT,
  `project` varchar(50) NOT NULL,
  `platform` varchar(50) NOT NULL,
  `version` varchar(50) DEFAULT NULL,
  `app_name` varchar(50) NOT NULL COMMENT '程序名称',
  `app_status` int(10) NOT NULL COMMENT 'app状态：0 新加入，1 显示，2 删除 ',
  `app_power` int(10) NOT NULL COMMENT '发布环境：1 公测；2 私有；3 预览',
  `add_time` datetime NOT NULL,
  `add_name` varchar(100) DEFAULT NULL COMMENT '添加人',
  `add_ip` varchar(100) DEFAULT NULL,
  `del_name` varchar(100) DEFAULT NULL,
  `del_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`project`),
  KEY `prj` (`project`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `new_app_info`
-- ----------------------------
BEGIN;
INSERT INTO `new_app_info` VALUES ('46', '6', 'android', '', 'Collect.apk', '1', '1', '2013-11-14 08:43:52', 'shaoliying', '192.168.21.154', '', '0000-00-00 00:00:00'), ('47', '6', 'android', '', 'ScheduledBus.apk', '1', '1', '2013-11-14 08:44:05', 'shaoliying', '192.168.21.154', '', '0000-00-00 00:00:00'), ('48', '6', 'iphone', '', 'CollectTerminal.ipa', '2', '1', '2013-11-14 08:44:39', 'shaoliying', '192.168.21.154', 'shaoliying', '2013-11-14 08:46:10'), ('49', '6', 'iphone', '', 'CollectTerminal.ipa', '2', '1', '2013-11-14 08:46:53', 'shaoliying', '192.168.21.154', 'shaoliying', '2013-11-14 09:37:15'), ('50', '6', 'iphone', '', 'CollectTerminal.ipa', '1', '1', '2013-11-14 09:37:37', 'shaoliying', '192.168.21.63', '', '0000-00-00 00:00:00'), ('51', '6', 'iphone', '', 'ScheduleBus.ipa', '2', '1', '2013-11-14 09:40:43', 'shaoliying', '192.168.21.63', 'shaoliying', '2013-11-14 09:46:57'), ('52', '6', 'iphone', '', 'ScheduleBus.ipa', '2', '1', '2013-11-14 09:47:29', 'shaoliying', '192.168.21.63', 'shaoliying', '2013-11-15 14:14:12'), ('53', '10', 'ipad', '', 'focusclub.ipa', '1', '0', '2013-11-14 09:47:52', 'liudongxiang', '192.168.21.21', '', '0000-00-00 00:00:00'), ('54', '6', 'iphone', '', '1ScheduleBus.ipa', '2', '1', '2013-11-14 09:49:05', 'shaoliying', '192.168.21.63', 'shaoliying', '2013-11-14 09:49:44'), ('55', '10', 'ipad', '', 'focusclub.ipa', '1', '0', '2013-11-14 09:49:08', 'liudongxiang', '192.168.21.21', '', '0000-00-00 00:00:00'), ('56', '3', 'iphone', '', 'MICEN.ipa', '1', '1', '2013-11-14 09:52:49', 'lujingyu', '192.168.21.31', '', '0000-00-00 00:00:00'), ('57', '10', 'ipad', '', 'BeautyInChina.ipa', '2', '1', '2013-11-14 13:27:22', 'liudongxiang', '192.168.21.21', 'liudongxiang', '2013-11-14 13:28:21'), ('58', '10', 'ipad', '', 'focusclub.ipa', '1', '0', '2013-11-14 13:28:09', 'liudongxiang', '192.168.21.21', '', '0000-00-00 00:00:00'), ('59', '10', 'ipad', '', 'focusclub.ipa', '2', '1', '2013-11-14 13:28:46', 'liudongxiang', '192.168.21.21', 'liudongxiang', '2013-11-15 10:05:39'), ('60', '4', 'iphone', '', 'TM.ipa', '2', '1', '2013-11-15 09:48:43', 'sunjianwen', '192.168.21.35', 'sunjianwen', '2013-11-15 10:13:55'), ('61', '10', 'ipad', '', 'focusclubHD.ipa', '1', '1', '2013-11-15 10:06:01', 'liudongxiang', '192.168.21.21', '', '0000-00-00 00:00:00'), ('62', '4', 'iphone', '', 'TM.ipa', '2', '1', '2013-11-15 10:16:02', 'sunjianwen', '192.168.21.35', 'sunjianwen', '2013-11-15 10:20:08'), ('63', '4', 'iphone', '', 'TM.ipa', '2', '1', '2013-11-15 10:25:09', 'sunjianwen', '192.168.21.35', 'sunjianwen', '2013-11-15 11:28:12'), ('64', '4', 'iphone', '', 'TM.ipa', '2', '2', '2013-11-15 11:44:39', 'sunjianwen', '192.168.21.35', 'sunjianwen', '2013-11-15 11:46:32'), ('65', '4', 'iphone', '', 'TM.ipa', '2', '1', '2013-11-15 11:46:47', 'sunjianwen', '192.168.21.35', 'sunjianwen', '2013-11-15 12:00:17'), ('66', '4', 'iphone', '', 'TM.ipa', '2', '1', '2013-11-15 12:32:42', 'sunjianwen', '192.168.21.35', 'sunjianwen', '2013-11-15 13:39:33'), ('67', '4', 'iphone', '', 'TM.ipa', '1', '1', '2013-11-15 13:43:54', 'sunjianwen', '192.168.31.48', '', '0000-00-00 00:00:00'), ('68', '6', 'iphone', '', 'ScheduleBus.ipa', '1', '1', '2013-11-15 14:14:31', 'sunjianwen', '192.168.31.48', '', '0000-00-00 00:00:00');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

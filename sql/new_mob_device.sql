/*
Navicat MySQL Data Transfer

Source Server         : bakmobapp
Source Server Version : 50534
Source Host           : 192.168.28.65:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50534
File Encoding         : 65001

Date: 2014-01-07 13:39:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `new_mob_device`
-- ----------------------------
DROP TABLE IF EXISTS `new_mob_device`;
CREATE TABLE `new_mob_device` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `dev_type` int(10) NOT NULL DEFAULT '0' COMMENT '设备类型：1 设备 2 配件',
  `dev_id` bigint(50) DEFAULT NULL COMMENT '设备编码',
  `dev_name` varchar(255) DEFAULT NULL,
  `dev_version` varchar(255) DEFAULT NULL COMMENT '设备系统版本',
  `pixel` varchar(255) DEFAULT NULL COMMENT '设备-分辨率',
  `stat` int(10) DEFAULT NULL COMMENT '设备状态：1 空闲 2 占用 3 禁用',
  `holder` varchar(100) DEFAULT NULL COMMENT '借用人',
  `job_id` int(15) DEFAULT NULL COMMENT '工号',
  `cn_name` varchar(100) DEFAULT NULL COMMENT '中文名称',
  `use_time` datetime DEFAULT NULL COMMENT '借用时间',
  `comments` varchar(255) DEFAULT NULL COMMENT '备注',
  `add_time` datetime DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of new_mob_device
-- ----------------------------
INSERT INTO `new_mob_device` VALUES ('4', '1', '20201203191670', 'ipad 2', 'IOS', '1024*768', '2', 'chengong', '6672', '陈功', '2013-11-29 16:01:57', '', null);
INSERT INTO `new_mob_device` VALUES ('5', '1', '20201301182086', 'ipod touch5', 'IOS6.1.3', '1136*640', '2', 'chengong', '6672', '陈功', '2013-12-17 10:21:34', '', null);
INSERT INTO `new_mob_device` VALUES ('6', '1', '6201210100010', '三星Note10.1', 'Android4.1.1', '1280*800', '2', 'chengong', '6672', '陈功', '2013-11-30 14:29:41', '不含卡', null);
INSERT INTO `new_mob_device` VALUES ('7', '1', '20201304162142', 'htc one s', 'Android4.0', '960*540', '2', 'chenkangpeng', '6351', '陈康鹏', '2013-11-30 14:29:56', '', null);
INSERT INTO `new_mob_device` VALUES ('8', '1', '6201210250411', '三星Note10.1', 'Android4.1.1', '1280*800', '2', 'chenkangpeng', '6351', '陈康鹏', '2013-11-30 14:30:38', '含 耳机', null);
INSERT INTO `new_mob_device` VALUES ('9', '1', '20201301182084', 'ipod touch5', 'IOS', '1136*640', '2', 'hankang', '7326', '韩康', '2013-11-30 14:31:02', '不含保护壳，全新数据线，一个pad充电头', null);
INSERT INTO `new_mob_device` VALUES ('10', '1', '20201204201798', '三星9100', 'Android2.3', '800*480', '2', 'heping', '6588', '何平', '2013-11-30 14:31:24', '含4G 卡，不含充电器', null);
INSERT INTO `new_mob_device` VALUES ('11', '1', '20201205171817', 'HTC G14', 'Android2.3', '960*540', '1', '', '0', '', '2013-12-23 09:16:37', '充电器（非原装）、数据线、机身', null);
INSERT INTO `new_mob_device` VALUES ('12', '1', '20201203191683', 'ipad 2', 'IOS', '1024*768', '2', 'jiwanquan', '7336', '吉万全', '2013-11-30 14:33:24', '设备，数据线，黑色保护皮套，不含充电器', null);
INSERT INTO `new_mob_device` VALUES ('13', '1', '20201301182081', 'iphone 5', 'IOS', '1136*640', '2', 'jinjianxin', '7218', '金建新', '2013-11-30 14:32:12', '不提供耳机', null);
INSERT INTO `new_mob_device` VALUES ('14', '1', '20201304162144', 'ipad 4', 'IOS7.0.4', '2048*1536', '2', 'lichuangye', '6719', '李创业', '2013-12-02 08:52:54', 'IPAD - 4G-16G，含手机卡 数据线、充电器', null);
INSERT INTO `new_mob_device` VALUES ('15', '1', '6201210100009', '三星Note10.1', 'Android4.1.1', '1280*800', '1', '', '0', '', '2013-11-30 14:34:17', '不含保护壳，含手机卡(卡在2013-11-19借给了周文丽)', null);
INSERT INTO `new_mob_device` VALUES ('16', '1', '20201304162141', '三星 galaxy note 2 N7100', 'Android4.1.2', '1280*720', '2', 'liuchao', '7148', '刘超', '2013-11-30 14:34:36', '', null);
INSERT INTO `new_mob_device` VALUES ('17', '1', '20201301182082', 'ipad mini', 'IOS', '1024*768', '2', 'lujingyu', '7254', '陆敬宇', '2013-11-30 14:40:14', '含保护壳', null);
INSERT INTO `new_mob_device` VALUES ('18', '1', '20201205171818', '三星i9250', 'Android4.0', '1280*720', '2', 'qinhai', '6227', '秦海', '2013-11-30 14:40:25', '配全新三星充电器', null);
INSERT INTO `new_mob_device` VALUES ('19', '1', '20201304162143', '小米 s1', 'Android4.0', '960*540', '2', 'huangshuo', '6920', '黄硕', '2013-12-23 09:17:51', '4G SD卡，机身、数据线、充电器', null);
INSERT INTO `new_mob_device` VALUES ('20', '1', '20201304162145', 'ipod touch5', 'IOS', '1136*640', '2', 'sunjianwen', '7140', '孙建文', '2013-11-30 14:40:56', '32G', null);
INSERT INTO `new_mob_device` VALUES ('21', '1', '20201203191662', 'ipad 2', 'IOS', '1024*768', '2', 'sunjianwen', '7140', '孙建文', '2013-11-30 14:41:07', '', null);
INSERT INTO `new_mob_device` VALUES ('22', '1', '20201304162147', 'iphone 4S', 'IOS7.0.4', '960*640', '2', 'liudongxiang', '6268', '刘东项', '2013-12-25 17:09:12', '提供机身、数据线', null);
INSERT INTO `new_mob_device` VALUES ('23', '1', '20201304162146', 'ipod touch5', 'IOS6.0.1', '1136*640', '2', 'yangxiaoyun', '7283', '杨小云', '2013-12-23 09:19:30', '32G，含保护壳', null);
INSERT INTO `new_mob_device` VALUES ('24', '1', '20201301182083', 'ipod touch5', 'IOS7.0.3', '1136*640', '2', 'tengna', '7315', '滕娜', '2013-12-17 10:20:09', '不含保护壳，已升级IOS7。', null);
INSERT INTO `new_mob_device` VALUES ('25', '1', '20201304162140', '魅族 mx2', 'Flyme 2.0(基于Android 4.1)', '1280*800', '2', 'tengna', '7315', '滕娜', '2013-11-30 14:42:10', '', null);
INSERT INTO `new_mob_device` VALUES ('26', '1', '20201304172148', '联想 P700i', 'Android4.0', '800*480', '2', 'liudongxiang', '6268', '刘东项', '2013-12-30 11:33:55', '含保护壳,4G SD卡 充电器 数据线，联通3G 卡', null);
INSERT INTO `new_mob_device` VALUES ('27', '1', '20201209201964', 'ipad 2', 'IOS', '1024*768', '2', 'wuchengliu', '7257', '吴成流', '2013-11-30 14:42:33', '', null);
INSERT INTO `new_mob_device` VALUES ('28', '1', '20201301182085', 'ipod touch5', 'IOS', '1136*640', '2', 'xieran', '7329', '谢然', '2013-11-30 14:42:54', '', null);
INSERT INTO `new_mob_device` VALUES ('29', '1', '6201210250444', '三星Note10.1', 'Android4.1.1', '1280*800', '2', 'xiongjiangwei', '7363', '熊江炜', '2013-11-30 14:43:12', '含卡，收到的设备没有耳机', null);
INSERT INTO `new_mob_device` VALUES ('30', '1', '20201204241799', '三星N7000', 'Android2.3', '1280*800', '2', 'xiongjiangwei', '7363', '熊江炜', '2013-11-30 14:43:25', '', null);
INSERT INTO `new_mob_device` VALUES ('31', '1', '20201301222088', 'ipad mini', 'IOS', '1024*768', '2', 'yangxiaoyun', '7283', '杨小云', '2013-11-30 14:43:36', '不含充电器（伍业峰未提交）', null);
INSERT INTO `new_mob_device` VALUES ('32', '1', '20201304162139', '三星I9300 GALAXY SIII ', 'Android4.1.2', '1280*720', '2', 'yangyanlong', '7263', '杨燕龙', '2013-11-30 14:43:46', '', null);
INSERT INTO `new_mob_device` VALUES ('33', '1', '20201205211823', 'Lumia800', 'Windows phone 7.5', '800*480', '2', 'zhuxiaolei', '6959', '朱小磊', '2013-11-30 14:43:58', '', null);
INSERT INTO `new_mob_device` VALUES ('34', '1', '20201304162138', 'HTC x920e', 'Android4.1', '1920*1080', '2', 'wuyu', '7253', '吴彧', '2013-11-30 14:42:43', '', null);
INSERT INTO `new_mob_device` VALUES ('35', '1', '20201203231786', 'HTC EV0 30D', 'Android2.3', '960*540', '1', '', '0', '', '2013-12-30 11:26:47', '', null);
INSERT INTO `new_mob_device` VALUES ('36', '1', '20201209201975', 'ipad 2', 'IOS7.0.4', '1024*768', '2', 'maxiaowei', '6200', '马晓伟', '2014-01-02 10:20:16', '机身，数据线', null);
INSERT INTO `new_mob_device` VALUES ('37', '1', '2013112913002319', 'ihpone 5S', 'IOS7.0.3', '1136*640', '2', 'tangjun', '6296', '唐军', '2013-11-30 14:41:40', '机身、数据线、充电器、耳机', null);
INSERT INTO `new_mob_device` VALUES ('38', '1', '20201205181820', '摩托罗拉me525+', 'Android2.3', '854*480', '1', '', '0', '', '0000-00-00 00:00:00', '', null);
INSERT INTO `new_mob_device` VALUES ('39', '1', '20201203271788', 'iphone 4', 'IOS', '960*640', '2', 'tengna', '7315', '滕娜', '2013-12-17 16:31:14', '机身、数据线', null);
INSERT INTO `new_mob_device` VALUES ('40', '1', '20201203191677', 'ipad 2', 'IOS7.0.4', '1024*768', '2', 'zhangwenxin', '0', '张文心', '2013-12-18 10:52:34', '', null);
INSERT INTO `new_mob_device` VALUES ('41', '1', '20201205211826', '中兴 U880', 'Android2.2', '800*480', '1', '', '0', '', '0000-00-00 00:00:00', '', null);
INSERT INTO `new_mob_device` VALUES ('42', '1', '20201203191659', 'ipad 2', 'IOS6.1.2', '1024*768', '1', '', '0', '', '2014-01-07 11:40:28', '', null);
INSERT INTO `new_mob_device` VALUES ('43', '1', '20201205181822', 'ipod touch4', 'IOS', '960*640', '1', '', '0', '', '0000-00-00 00:00:00', '', null);

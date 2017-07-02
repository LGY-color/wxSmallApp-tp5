/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : pdzg

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-06-30 17:36:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `pdzg_admin` 管理员表
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_admin`;
CREATE TABLE `pdzg_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) DEFAULT NULL COMMENT '用户名',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `create_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `update_time` bigint(20) DEFAULT NULL COMMENT '更新时间',
  `last_ip` varchar(30) DEFAULT NULL COMMENT '上次登录ip',
  `login_ip` varchar(30) DEFAULT NULL COMMENT '登录ip',
  `last_time` bigint(20) DEFAULT NULL COMMENT '上次登录时间',
  `login_time` bigint(20) DEFAULT NULL COMMENT '登录时间',
  `level` tinyint(4) DEFAULT NULL COMMENT '管理员等级 1为主管理 2为次级管理 3为客服',
  `status` tinyint(4) DEFAULT NULL COMMENT '1为使用中 0为停止使用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_admin
-- ----------------------------

-- ----------------------------
-- Table structure for `pdzg_banner`
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_banner`;
CREATE TABLE `pdzg_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_img_url_text` varchar(255) DEFAULT NULL COMMENT 'banner图片地址或者文本信息',
  `url_text` tinyint(4) DEFAULT NULL COMMENT '1为 url 2为text',
  `create_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `update_time` bigint(20) DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(4) DEFAULT NULL COMMENT '1为使用中 0为停止使用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_banner
-- ----------------------------
INSERT INTO `pdzg_banner` VALUES ('1', 'http://img02.tooopen.com/images/20150928/tooopen_sy_143912755726.jpg', '1', null, null, '1');
INSERT INTO `pdzg_banner` VALUES ('2', 'http://img06.tooopen.com/images/20160818/tooopen_sy_175866434296.jpg', '1', null, null, '1');
INSERT INTO `pdzg_banner` VALUES ('3', 'http://img06.tooopen.com/images/20160818/tooopen_sy_175833047715.jpg', '1', null, null, '1');
INSERT INTO `pdzg_banner` VALUES ('4', '3天推广价48元', '2', null, null, '1');
INSERT INTO `pdzg_banner` VALUES ('5', '10天成交价148元', '2', null, null, '1');
INSERT INTO `pdzg_banner` VALUES ('6', '30天会员价348元', '2', null, null, '1');

-- ----------------------------
-- Table structure for `pdzg_big_item`
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_big_item`;
CREATE TABLE `pdzg_big_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) DEFAULT NULL COMMENT '栏目名称',
  `item_type` tinyint(4) DEFAULT NULL COMMENT 'item的类型 1为大类 2为小类 3为自定义',
  `item_type_id` int(11) DEFAULT NULL COMMENT '所属父类id',
  `create_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `update_time` bigint(20) DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(4) DEFAULT NULL COMMENT '1为使用 0为停止',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_big_item
-- ----------------------------
INSERT INTO `pdzg_big_item` VALUES ('1', '小吃盘店', '1', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_big_item` VALUES ('2', '招工求职', '1', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_big_item` VALUES ('3', '店面承包', '1', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_big_item` VALUES ('4', '二手市场', '1', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_big_item` VALUES ('5', '店铺转让', '2', '1', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_big_item` VALUES ('6', '求转店铺', '2', '1', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_big_item` VALUES ('7', '招工信息', '2', '2', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_big_item` VALUES ('8', '求职信息', '2', '2', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_big_item` VALUES ('9', '对外承包', '2', '3', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_big_item` VALUES ('10', '需求承包', '2', '3', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_big_item` VALUES ('11', '餐具设备', '2', '4', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_big_item` VALUES ('12', '其他物品', '2', '4', '2147483647', '1498699351000', '1');



-- ----------------------------
-- Table structure for `pdzg_collection`
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_collection`;
CREATE TABLE `pdzg_collection` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `table_name` char(255) DEFAULT NULL COMMENT '表名',
  `list_id` bigint(20) DEFAULT NULL COMMENT '具体详情的id',
  `user_id` bigint(20) DEFAULT NULL COMMENT '用户表id',
  `create_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `update_time` bigint(20) DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(4) DEFAULT NULL COMMENT '1为使用 0为停止',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_collection
-- ----------------------------

-- ----------------------------
-- Table structure for `pdzg_comment`
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_comment`;
CREATE TABLE `pdzg_comment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `table_name` char(255) DEFAULT NULL COMMENT '表名',
  `list_id` bigint(20) DEFAULT NULL COMMENT '具体详情id',
  `user_id` bigint(20) DEFAULT NULL COMMENT '用户id',
  `content` text COMMENT '评论内容',
  `reply_user_id` bigint(20) DEFAULT NULL COMMENT '回复用户id',
  `create_time` bigint(20) DEFAULT NULL,
  `update_time` bigint(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '1为使用中 0为停止使用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `pdzg_info`店铺转让
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_info`;
CREATE TABLE `pdzg_info` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL COMMENT '用户id',
  `province` varchar(30) DEFAULT NULL COMMENT '省份',
  `valid_period` varchar(30) DEFAULT NULL COMMENT '有效期',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `monthly_rent` varchar(30) DEFAULT NULL COMMENT '月租金',
  `day_turnover` varchar(30) DEFAULT NULL COMMENT '日营业额',
  `transfer_fee` varchar(30) DEFAULT NULL COMMENT '转让费',
  `monthly_salary` varchar(30) DEFAULT NULL COMMENT '月薪',
  `sex` varchar(30) DEFAULT NULL COMMENT '性别',
  `work_experience` varchar(30) DEFAULT NULL COMMENT '工作经验',
  `work_skill` varchar(30) DEFAULT NULL COMMENT '工作技能',
  `work_hours` varchar(30) DEFAULT NULL COMMENT '工作时长',
  `age` varchar(30) DEFAULT NULL COMMENT '年龄',
  `health_status` varchar(30) DEFAULT NULL COMMENT '健康状况',
  `cash_pledge` varchar(30) DEFAULT NULL COMMENT '押金要求',
  `live_conditions` varchar(30) DEFAULT NULL COMMENT '居住条件',
  `takeaway_status` varchar(30) DEFAULT NULL COMMENT '外卖情况',
  `open_hours` varchar(30) DEFAULT NULL COMMENT '开门时间',
  `close_hours` varchar(30) DEFAULT NULL COMMENT '打烊时间',
  `new_old` varchar(30) DEFAULT NULL COMMENT '新旧程度',
  `content` text COMMENT '详情',
  `img_id` bigint(20) DEFAULT NULL COMMENT '多对多引入3表 表一图片id 表二图片urlid 表三关联',
  `contact_name` varchar(20) DEFAULT NULL COMMENT '联系人',
  `contact_phone` varchar(20) DEFAULT NULL COMMENT '联系人电话',
  `contact_qq` varchar(20) DEFAULT NULL COMMENT '联系人QQ',
  `location` varchar(255) DEFAULT NULL COMMENT '地址信息',
  `shop_area` varchar(255) DEFAULT NULL COMMENT '店铺面积',
  `water_electricity` varchar(30) DEFAULT NULL COMMENT '水电费',
  `to_serve` varchar(30) DEFAULT NULL COMMENT '送餐',
  `surroundings` varchar(30) DEFAULT NULL COMMENT '周边环境',
  `shop_facilities` varchar(30) DEFAULT NULL COMMENT '店铺设施',
  `hold_credentials` varchar(30) DEFAULT NULL COMMENT '所持证书',
  `shop_address` varchar(255) DEFAULT NULL COMMENT '店铺地址',
  `level_type` tinyint(4) DEFAULT NULL COMMENT '1为正常 2星级信息 3为置顶信息',
  `top_start_time` bigint(20) DEFAULT NULL COMMENT '置顶开始时间',
  `top_end_time` bigint(20) DEFAULT NULL COMMENT '置顶结束时间',
  `security_deposit` int(11) DEFAULT NULL COMMENT '保证金',
  `create_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `update_time` bigint(20) DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(4) DEFAULT NULL COMMENT '1为正常使用 0为已成交',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_info
-- ----------------------------

-- ----------------------------
-- Table structure for `pdzg_dwcb` 对外承包
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_dwcb`;
CREATE TABLE `pdzg_dwcb` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL COMMENT '用户id',
  `province` varchar(30) DEFAULT NULL COMMENT '省份',
  `valid_period` varchar(30) DEFAULT NULL COMMENT '有效期',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `monthly_rent` varchar(30) DEFAULT NULL COMMENT '月租金',
  `day_turnover` varchar(30) DEFAULT NULL COMMENT '日营业额',
  `content` text COMMENT '详情',
  `img_id` bigint(20) DEFAULT NULL COMMENT '多对多引入3表 表一图片id 表二图片urlid 表三关联',
  `contact_name` varchar(20) DEFAULT NULL COMMENT '联系人',
  `contact_phone` varchar(20) DEFAULT NULL COMMENT '联系人电话',
  `contact_qq` varchar(20) DEFAULT NULL COMMENT '联系人QQ',
  `location` varchar(255) DEFAULT NULL COMMENT '地址信息',
  `shop_area` varchar(255) DEFAULT NULL COMMENT '店铺面积',
  `water_electricity` varchar(30) DEFAULT NULL COMMENT '水电费',
  `to_serve` varchar(30) DEFAULT NULL COMMENT '送餐',
  `surroundings` varchar(30) DEFAULT NULL COMMENT '周边环境',
  `shop_facilities` varchar(30) DEFAULT NULL COMMENT '店铺设施',
  `hold_credentials` varchar(30) DEFAULT NULL COMMENT '所持证书',
  `shop_address` varchar(255) DEFAULT NULL COMMENT '店铺地址',
  `level_type` tinyint(4) DEFAULT NULL COMMENT '1为正常 2星级信息 3为置顶信息',
  `top_start_time` bigint(20) DEFAULT NULL COMMENT '置顶开始时间',
  `top_end_time` bigint(20) DEFAULT NULL COMMENT '置顶结束时间',
  `security_deposit` int(11) DEFAULT NULL COMMENT '保证金',
  `create_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `update_time` bigint(20) DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(4) DEFAULT NULL COMMENT '1为正常使用 0为已成交',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_dwcb
-- ----------------------------

-- ----------------------------
-- Table structure for `pdzg_item_relevance`
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_item_relevance`;
CREATE TABLE `pdzg_item_relevance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `big_item_id` int(11) DEFAULT NULL COMMENT '大分类id',
  `small_item_id` int(11) DEFAULT NULL COMMENT '小分类id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_item_relevance
-- ----------------------------
INSERT INTO `pdzg_item_relevance` VALUES ('1', '5', '1');
INSERT INTO `pdzg_item_relevance` VALUES ('2', '5', '2');
INSERT INTO `pdzg_item_relevance` VALUES ('3', '5', '3');
INSERT INTO `pdzg_item_relevance` VALUES ('4', '5', '4');
INSERT INTO `pdzg_item_relevance` VALUES ('5', '5', '7');
INSERT INTO `pdzg_item_relevance` VALUES ('6', '5', '5');
INSERT INTO `pdzg_item_relevance` VALUES ('7', '5', '6');
INSERT INTO `pdzg_item_relevance` VALUES ('8', '5', '24');
INSERT INTO `pdzg_item_relevance` VALUES ('9', '5', '23');
INSERT INTO `pdzg_item_relevance` VALUES ('10', '5', '8');
INSERT INTO `pdzg_item_relevance` VALUES ('11', '5', '9');
INSERT INTO `pdzg_item_relevance` VALUES ('12', '6', '1');
INSERT INTO `pdzg_item_relevance` VALUES ('13', '6', '2');
INSERT INTO `pdzg_item_relevance` VALUES ('14', '6', '3');
INSERT INTO `pdzg_item_relevance` VALUES ('15', '6', '4');
INSERT INTO `pdzg_item_relevance` VALUES ('16', '6', '7');
INSERT INTO `pdzg_item_relevance` VALUES ('17', '6', '5');
INSERT INTO `pdzg_item_relevance` VALUES ('18', '6', '6');
INSERT INTO `pdzg_item_relevance` VALUES ('19', '6', '24');
INSERT INTO `pdzg_item_relevance` VALUES ('20', '6', '23');
INSERT INTO `pdzg_item_relevance` VALUES ('21', '6', '8');
INSERT INTO `pdzg_item_relevance` VALUES ('22', '6', '9');
INSERT INTO `pdzg_item_relevance` VALUES ('23', '7', '1');
INSERT INTO `pdzg_item_relevance` VALUES ('24', '7', '2');
INSERT INTO `pdzg_item_relevance` VALUES ('25', '7', '10');
INSERT INTO `pdzg_item_relevance` VALUES ('26', '7', '11');
INSERT INTO `pdzg_item_relevance` VALUES ('27', '7', '12');
INSERT INTO `pdzg_item_relevance` VALUES ('28', '7', '13');
INSERT INTO `pdzg_item_relevance` VALUES ('29', '7', '14');
INSERT INTO `pdzg_item_relevance` VALUES ('30', '7', '15');
INSERT INTO `pdzg_item_relevance` VALUES ('31', '7', '16');
INSERT INTO `pdzg_item_relevance` VALUES ('32', '7', '17');
INSERT INTO `pdzg_item_relevance` VALUES ('33', '7', '18');
INSERT INTO `pdzg_item_relevance` VALUES ('34', '7', '19');
INSERT INTO `pdzg_item_relevance` VALUES ('35', '7', '20');
INSERT INTO `pdzg_item_relevance` VALUES ('36', '7', '21');
INSERT INTO `pdzg_item_relevance` VALUES ('37', '8', '1');
INSERT INTO `pdzg_item_relevance` VALUES ('38', '8', '2');
INSERT INTO `pdzg_item_relevance` VALUES ('39', '8', '10');
INSERT INTO `pdzg_item_relevance` VALUES ('40', '8', '11');
INSERT INTO `pdzg_item_relevance` VALUES ('41', '8', '12');
INSERT INTO `pdzg_item_relevance` VALUES ('42', '8', '13');
INSERT INTO `pdzg_item_relevance` VALUES ('43', '8', '14');
INSERT INTO `pdzg_item_relevance` VALUES ('44', '8', '15');
INSERT INTO `pdzg_item_relevance` VALUES ('45', '8', '16');
INSERT INTO `pdzg_item_relevance` VALUES ('46', '8', '17');
INSERT INTO `pdzg_item_relevance` VALUES ('47', '8', '18');
INSERT INTO `pdzg_item_relevance` VALUES ('48', '8', '19');
INSERT INTO `pdzg_item_relevance` VALUES ('49', '8', '20');
INSERT INTO `pdzg_item_relevance` VALUES ('50', '8', '21');
INSERT INTO `pdzg_item_relevance` VALUES ('51', '9', '1');
INSERT INTO `pdzg_item_relevance` VALUES ('52', '9', '2');
INSERT INTO `pdzg_item_relevance` VALUES ('53', '9', '8');
INSERT INTO `pdzg_item_relevance` VALUES ('54', '9', '4');
INSERT INTO `pdzg_item_relevance` VALUES ('55', '9', '3');
INSERT INTO `pdzg_item_relevance` VALUES ('56', '9', '24');
INSERT INTO `pdzg_item_relevance` VALUES ('57', '9', '23');
INSERT INTO `pdzg_item_relevance` VALUES ('58', '10', '1');
INSERT INTO `pdzg_item_relevance` VALUES ('59', '10', '2');
INSERT INTO `pdzg_item_relevance` VALUES ('60', '10', '8');
INSERT INTO `pdzg_item_relevance` VALUES ('61', '10', '4');
INSERT INTO `pdzg_item_relevance` VALUES ('62', '10', '3');
INSERT INTO `pdzg_item_relevance` VALUES ('63', '10', '24');
INSERT INTO `pdzg_item_relevance` VALUES ('64', '10', '23');
INSERT INTO `pdzg_item_relevance` VALUES ('65', '11', '1');
INSERT INTO `pdzg_item_relevance` VALUES ('66', '11', '2');
INSERT INTO `pdzg_item_relevance` VALUES ('67', '11', '22');
INSERT INTO `pdzg_item_relevance` VALUES ('68', '12', '1');
INSERT INTO `pdzg_item_relevance` VALUES ('69', '12', '2');
INSERT INTO `pdzg_item_relevance` VALUES ('70', '12', '22');

-- ----------------------------
-- Table structure for `pdzg_news`
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_news`;
CREATE TABLE `pdzg_news` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `reply_user_id` bigint(20) DEFAULT NULL COMMENT '回复用户id',
  `comment_id` bigint(20) DEFAULT NULL COMMENT '评论内容id',
  `create_time` bigint(20) DEFAULT NULL,
  `update_time` bigint(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '1为未读 2为已读 0为删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_news
-- ----------------------------

-- ----------------------------
-- Table structure for `pdzg_qtwp` 其他物品
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_qtwp`;
CREATE TABLE `pdzg_qtwp` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL COMMENT '用户id',
  `province` varchar(30) DEFAULT NULL COMMENT '省份',
  `valid_period` varchar(30) DEFAULT NULL COMMENT '有效期',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `new_old` varchar(30) DEFAULT NULL COMMENT '新旧程度',
  `content` text COMMENT '详情',
  `img_id` bigint(20) DEFAULT NULL COMMENT '多对多引入3表 表一图片id 表二图片urlid 表三关联',
  `contact_name` varchar(20) DEFAULT NULL COMMENT '联系人',
  `contact_phone` varchar(20) DEFAULT NULL COMMENT '联系人电话',
  `contact_qq` varchar(20) DEFAULT NULL COMMENT '联系人QQ',
  `location` varchar(255) DEFAULT NULL COMMENT '地址信息',
  `level_type` tinyint(4) DEFAULT NULL COMMENT '1为正常 2星级信息 3为置顶信息',
  `top_start_time` bigint(20) DEFAULT NULL COMMENT '置顶开始时间',
  `top_end_time` bigint(20) DEFAULT NULL COMMENT '置顶结束时间',
  `security_deposit` int(11) DEFAULT NULL COMMENT '保证金',
  `create_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `update_time` bigint(20) DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(4) DEFAULT NULL COMMENT '1为正常使用 0为已成交',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_qtwp
-- ----------------------------

-- ----------------------------
-- Table structure for `pdzg_qzdp`求转店铺
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_qzdp`;
CREATE TABLE `pdzg_qzdp` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL COMMENT '用户id',
  `province` varchar(30) DEFAULT NULL COMMENT '省份',
  `valid_period` varchar(30) DEFAULT NULL COMMENT '有效期',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `monthly_rent` varchar(30) DEFAULT NULL COMMENT '月租金',
  `day_turnover` varchar(30) DEFAULT NULL COMMENT '日营业额',
  `transfer_fee` varchar(30) DEFAULT NULL COMMENT '转让费',
  `content` text COMMENT '详情',
  `img_id` bigint(20) DEFAULT NULL COMMENT '多对多引入3表 表一图片id 表二图片urlid 表三关联',
  `contact_name` varchar(20) DEFAULT NULL COMMENT '联系人',
  `contact_phone` varchar(20) DEFAULT NULL COMMENT '联系人电话',
  `contact_qq` varchar(20) DEFAULT NULL COMMENT '联系人QQ',
  `location` varchar(255) DEFAULT NULL COMMENT '地址信息',
  `shop_area` varchar(255) DEFAULT NULL COMMENT '店铺面积',
  `water_electricity` varchar(30) DEFAULT NULL COMMENT '水电费',
  `to_serve` varchar(30) DEFAULT NULL COMMENT '送餐',
  `surroundings` varchar(30) DEFAULT NULL COMMENT '周边环境',
  `shop_facilities` varchar(30) DEFAULT NULL COMMENT '店铺设施',
  `hold_credentials` varchar(30) DEFAULT NULL COMMENT '所持证书',
  `shop_address` varchar(255) DEFAULT NULL COMMENT '店铺地址',
  `level_type` tinyint(4) DEFAULT NULL COMMENT '1为正常 2星级信息 3为置顶信息',
  `top_start_time` bigint(20) DEFAULT NULL COMMENT '置顶开始时间',
  `top_end_time` bigint(20) DEFAULT NULL COMMENT '置顶结束时间',
  `security_deposit` int(11) DEFAULT NULL COMMENT '保证金',
  `create_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `update_time` bigint(20) DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(4) DEFAULT NULL COMMENT '1为正常使用 0为已成交',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_qzdp
-- ----------------------------

-- ----------------------------
-- Table structure for `pdzg_qzxx`求职信息
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_qzxx`; 
CREATE TABLE `pdzg_qzxx` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL COMMENT '用户id',
  `province` varchar(30) DEFAULT NULL COMMENT '省份',
  `valid_period` varchar(30) DEFAULT NULL COMMENT '有效期',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `monthly_salary` varchar(30) DEFAULT NULL COMMENT '月薪',
  `sex` varchar(30) DEFAULT NULL COMMENT '性别',
  `work_experience` varchar(30) DEFAULT NULL COMMENT '工作经验',
  `work_skill` varchar(30) DEFAULT NULL COMMENT '工作技能',
  `work_hours` varchar(30) DEFAULT NULL COMMENT '工作时长',
  `age` varchar(30) DEFAULT NULL COMMENT '年龄',
  `health_status` varchar(30) DEFAULT NULL COMMENT '健康状况',
  `cash_pledge` varchar(30) DEFAULT NULL COMMENT '押金要求',
  `live_conditions` varchar(30) DEFAULT NULL COMMENT '居住条件',
  `takeaway_status` varchar(30) DEFAULT NULL COMMENT '外卖情况',
  `open_hours` varchar(30) DEFAULT NULL COMMENT '开门时间',
  `close_hours` varchar(30) DEFAULT NULL COMMENT '打烊时间',
  `content` text COMMENT '详情',
  `img_id` bigint(20) DEFAULT NULL COMMENT '多对多引入3表 表一图片id 表二图片urlid 表三关联',
  `contact_name` varchar(20) DEFAULT NULL COMMENT '联系人',
  `contact_phone` varchar(20) DEFAULT NULL COMMENT '联系人电话',
  `contact_qq` varchar(20) DEFAULT NULL COMMENT '联系人QQ',
  `contact_email` varchar(20) DEFAULT NULL COMMENT '联系人邮箱',
  `level_type` tinyint(4) DEFAULT NULL COMMENT '1为正常 2星级信息 3为置顶信息',
  `top_start_time` bigint(20) DEFAULT NULL COMMENT '置顶开始时间',
  `top_end_time` bigint(20) DEFAULT NULL COMMENT '置顶结束时间',
  `security_deposit` int(11) DEFAULT NULL COMMENT '保证金',
  `create_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `update_time` bigint(20) DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(4) DEFAULT NULL COMMENT '1为正常使用 0为已成交',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_qzxx
-- ----------------------------

-- ----------------------------
-- Table structure for `pdzg_small_item`
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_small_item`;
CREATE TABLE `pdzg_small_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) DEFAULT NULL COMMENT '栏目名称',
  `item_type` tinyint(4) DEFAULT NULL COMMENT 'item的类型 1为大类 2为小类 3为自定义',
  `item_type_id` int(11) DEFAULT NULL COMMENT '所属父类id',
  `create_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `update_time` bigint(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '1为使用 0为停止',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_small_item
-- ----------------------------
INSERT INTO `pdzg_small_item` VALUES ('1', '省份', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('2', '有效期', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('3', '月租金', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('4', '日营业额', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('5', '水电费', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('6', '送餐', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('7', '转让费', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('8', '店铺设施', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('9', '所持证书', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('10', '月薪', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('11', '性别', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('12', '工作经验', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('13', '工作技能', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('14', '工作时长', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('15', '年龄', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('16', '健康状况', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('17', '押金要求', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('18', '居住条件', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('19', '外卖情况', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('20', '开门时间', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('21', '打烊时间', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('22', '新旧程度', '3', '0', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('23', '周边环境', '3', '0', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('24', '装修', '3', '0', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('83', '长期有效', '4', '2', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('84', '一周', '4', '2', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('85', '一个月', '4', '2', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('86', '两个月', '4', '2', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('87', '一年', '4', '2', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('88', '2500元以下', '4', '3', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('89', '2500-5000元', '4', '3', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('90', '5000-7000元', '4', '3', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('91', '7000元-10000元', '4', '3', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('92', '10000元以上', '4', '3', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('93', '500元以下', '4', '4', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('94', '500-800元', '4', '4', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('95', '800-1000元', '4', '4', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('96', '1000-1500元', '4', '4', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('97', '1500-2000元', '4', '4', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('98', '2000-2500元', '4', '4', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('99', '2500-3000元', '4', '4', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('100', '3000-5000元', '4', '4', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('101', '5000元以上', '4', '4', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('102', '500元以下', '4', '5', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('103', '500-800元', '4', '5', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('104', '800-1000元', '4', '5', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('105', '1000-1500元', '4', '5', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('106', '1500元以上', '4', '5', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('107', '没有外卖', '4', '6', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('108', '偶尔', '4', '6', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('109', '有送餐', '4', '6', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('110', '面议', '4', '7', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('111', '一万以下', '4', '7', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('112', '1万-3万', '4', '7', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('113', '3万-6万', '4', '7', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('114', '6万-10万', '4', '7', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('115', '10万-15万', '4', '7', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('116', '15万以上', '4', '7', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('117', '水电', '4', '8', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('118', '燃气', '4', '8', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('119', '有线电视', '4', '8', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('120', '空调', '4', '8', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('121', '电话', '4', '8', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('122', '宽带WiFi', '4', '8', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('123', '消毒柜', '4', '8', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('124', '其他', '4', '8', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('125', '齐全', '4', '8', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('126', '营业执照', '4', '9', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('127', '卫生许可证', '4', '9', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('128', '面议', '4', '10', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('129', '1000以下', '4', '10', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('130', '1000-2000', '4', '10', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('131', '2000-3000', '4', '10', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('132', '3000-4000', '4', '10', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('133', '4000-5000', '4', '10', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('134', '5000-6000', '4', '10', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('135', '6000-8000', '4', '10', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('136', '8000以上', '4', '10', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('137', '男', '4', '11', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('138', '女', '4', '11', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('139', '性别不限', '4', '11', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('140', '新手', '4', '12', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('141', '一年', '4', '12', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('142', '两年', '4', '12', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('143', '三年', '4', '12', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('144', '三年以上', '4', '12', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('145', '沙县小吃', '4', '13', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('146', '套餐饭', '4', '13', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('147', '黄焖鸡', '4', '13', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('148', '炸酱面', '4', '13', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('149', '炒菜', '4', '13', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('150', '无所不会', '4', '13', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('151', '肯学肯干', '4', '13', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('152', '持有厨师证', '4', '13', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('153', '8小时以内', '4', '14', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('154', '8-10小时', '4', '14', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('155', '10-12小时', '4', '14', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('156', '12小时以上', '4', '14', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('157', '20岁以下', '4', '15', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('158', '20-30岁', '4', '15', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('159', '30-40岁', '4', '15', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('160', '40岁以上', '4', '15', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('161', '肯干就行', '4', '16', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('162', '身强体壮', '4', '16', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('163', '状态良好', '4', '16', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('164', '一般', '4', '16', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('165', '药不停', '4', '16', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('166', '残疾', '4', '16', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('167', '需求', '4', '17', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('168', '不需要', '4', '17', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('169', '单间', '4', '18', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('170', '集体', '4', '18', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('171', '阁楼', '4', '18', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('172', '其他', '4', '18', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('173', '有', '4', '19', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('174', '没有', '4', '19', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('175', '5:00之前', '4', '20', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('176', '5:00-6:00', '4', '20', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('177', '6:00-7:00', '4', '20', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('178', '7:00-8:00', '4', '20', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('179', '8:00-9:00', '4', '20', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('180', '9:00以后', '4', '20', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('181', '通宵营业', '4', '20', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('182', '看情况', '4', '20', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('183', '20:00之前', '4', '21', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('184', '20:00-21:00', '4', '21', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('185', '21:00-22:00', '4', '21', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('186', '22:00-23:00', '4', '21', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('187', '23:00-0:00', '4', '21', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('188', '0:00-1:00', '4', '21', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('189', '1:00以后', '4', '21', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('190', '不打烊', '4', '21', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('191', '看情况', '4', '21', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('192', '全新', '4', '22', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('193', '9成新', '4', '22', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('194', '7成新', '4', '22', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('195', '5成新', '4', '22', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('196', '工厂', '4', '23', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('197', '学校', '4', '23', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('198', '小区', '4', '23', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('199', '商场', '4', '23', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('200', '超市', '4', '23', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('201', '车站', '4', '23', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('202', '公园', '4', '23', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('203', '市场', '4', '23', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('204', '飞机场', '4', '23', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('205', '其他', '4', '23', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('206', '简单装修', '4', '24', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('207', '中等装修', '4', '24', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('208', '精装修', '4', '24', '1498699351000', '1498699351000', '1');

-- ----------------------------
-- Table structure for `pdzg_sort`
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_sort`;
CREATE TABLE `pdzg_sort` (
  `id` bigint(20) NOT NULL,
  `item_id` smallint(4) DEFAULT NULL COMMENT '所属大类别id',
  `valid_period` varchar(50) DEFAULT NULL COMMENT '有效期',
  `day_turnover` varchar(50) DEFAULT NULL COMMENT '日营业额',
  `transfer_fee` varchar(50) DEFAULT NULL COMMENT '转让费',
  `water_electricity` varchar(50) DEFAULT NULL COMMENT '水电费',
  `to_serve` varchar(50) DEFAULT NULL COMMENT '送餐',
  `shop_facilities` varchar(50) DEFAULT NULL COMMENT '店铺设施',
  `hold_credentials` varchar(50) DEFAULT NULL COMMENT '所持证书',
  `monthly_rent` varchar(50) DEFAULT NULL COMMENT '月租金',
  `new_old` varchar(50) DEFAULT NULL COMMENT '新旧程度',
  `surroundings` varchar(50) DEFAULT NULL COMMENT '周边环境',
  `monthly_salary` varchar(50) DEFAULT NULL COMMENT '月薪',
  `sex` varchar(50) DEFAULT NULL COMMENT '性别',
  `work_experience` varchar(50) DEFAULT NULL COMMENT '工作经验',
  `work_skill` varchar(50) DEFAULT NULL COMMENT '工作技能',
  `work_hours` varchar(50) DEFAULT NULL COMMENT '工作时长',
  `health_status` varchar(50) DEFAULT NULL COMMENT '健康状况',
  `cash_pledge` varchar(50) DEFAULT NULL COMMENT '押金要求',
  `live_conditions` varchar(50) DEFAULT NULL COMMENT '居住条件',
  `takeaway_status` varchar(50) DEFAULT NULL COMMENT '外卖情况',
  `open_hours` varchar(50) DEFAULT NULL COMMENT '开门时间',
  `close_hours` varchar(50) DEFAULT NULL COMMENT '打烊时间',
  `age` varchar(50) DEFAULT NULL COMMENT '年龄',
  `create_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `update_time` bigint(20) DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(4) DEFAULT NULL COMMENT '1为正常使用 0为已成交',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_sort
-- ----------------------------

-- ----------------------------
-- Table structure for `pdzg_user`
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_user`;
CREATE TABLE `pdzg_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `phone` bigint(20) DEFAULT NULL COMMENT '手机号码',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `gold_coin` int(11) DEFAULT NULL COMMENT '金币数',
  `real_name` varchar(30) DEFAULT NULL COMMENT '真实姓名',
  `id_card` varchar(30) DEFAULT NULL COMMENT '身份证号码',
  `last_ip` varchar(255) DEFAULT NULL COMMENT '最后访问IP',
  `qq` bigint(20) DEFAULT NULL COMMENT 'QQ号',
  `level` tinyint(4) DEFAULT NULL COMMENT '区分 普通会员 vip用户',
  `credit_num` int(11) DEFAULT NULL COMMENT '信用点',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1为使用 0为停止',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_user
-- ----------------------------

-- ----------------------------
-- Table structure for `pdzg_xqcb` 需求承包
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_xqcb`;
CREATE TABLE `pdzg_xqcb` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL COMMENT '用户id',
  `province` varchar(30) DEFAULT NULL COMMENT '省份',
  `valid_period` varchar(30) DEFAULT NULL COMMENT '有效期',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `monthly_rent` varchar(30) DEFAULT NULL COMMENT '月租金',
  `day_turnover` varchar(30) DEFAULT NULL COMMENT '日营业额',
  `content` text COMMENT '详情',
  `img_id` bigint(20) DEFAULT NULL COMMENT '多对多引入3表 表一图片id 表二图片urlid 表三关联',
  `contact_name` varchar(30) DEFAULT NULL COMMENT '联系人',
  `contact_phone` varchar(30) DEFAULT NULL COMMENT '联系人电话',
  `contact_qq` varchar(30) DEFAULT NULL COMMENT '联系人QQ',
  `location` varchar(30) DEFAULT NULL COMMENT '地址信息',
  `shop_area` varchar(30) DEFAULT NULL COMMENT '店铺面积',
  `water_electricity` varchar(30) DEFAULT NULL COMMENT '水电费',
  `to_serve` varchar(30) DEFAULT NULL COMMENT '送餐',
  `surroundings` varchar(30) DEFAULT NULL COMMENT '周边环境',
  `shop_facilities` varchar(30) DEFAULT NULL COMMENT '店铺设施',
  `hold_credentials` varchar(30) DEFAULT NULL COMMENT '所持证书',
  `shop_address` varchar(255) DEFAULT NULL COMMENT '店铺地址',
  `level_type` tinyint(4) DEFAULT NULL COMMENT '1为正常 2星级信息 3为置顶信息',
  `top_start_time` bigint(20) DEFAULT NULL COMMENT '置顶开始时间',
  `top_end_time` bigint(20) DEFAULT NULL COMMENT '置顶结束时间',
  `security_deposit` int(11) DEFAULT NULL COMMENT '保证金',
  `create_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `update_time` bigint(20) DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(4) DEFAULT NULL COMMENT '1为正常使用 0为已成交',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_xqcb
-- ----------------------------

-- ----------------------------
-- Table structure for `pdzg_zgxx` 招工信息
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_zgxx`;
CREATE TABLE `pdzg_zgxx` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL COMMENT '用户id',
  `province` varchar(30) DEFAULT NULL COMMENT '省份',
  `valid_period` varchar(30) DEFAULT NULL COMMENT '有效期',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `monthly_salary` varchar(30) DEFAULT NULL COMMENT '月薪',
  `sex` varchar(30) DEFAULT NULL COMMENT '性别',
  `work_experience` varchar(30) DEFAULT NULL COMMENT '工作经验',
  `work_skill` varchar(30) DEFAULT NULL COMMENT '工作技能',
  `work_hours` varchar(30) DEFAULT NULL COMMENT '工作时长',
  `age` varchar(30) DEFAULT NULL COMMENT '年龄',
  `health_status` varchar(30) DEFAULT NULL COMMENT '健康状况',
  `cash_pledge` varchar(30) DEFAULT NULL COMMENT '押金要求',
  `live_conditions` varchar(30) DEFAULT NULL COMMENT '居住条件',
  `takeaway_status` varchar(30) DEFAULT NULL COMMENT '外卖情况',
  `open_hours` varchar(30) DEFAULT NULL COMMENT '开门时间',
  `close_hours` varchar(30) DEFAULT NULL COMMENT '打烊时间',
  `content` text COMMENT '详情',
  `img_id` bigint(20) DEFAULT NULL COMMENT '多对多引入3表 表一图片id 表二图片urlid 表三关联',
  `contact_name` varchar(20) DEFAULT NULL COMMENT '联系人',
  `contact_phone` varchar(20) DEFAULT NULL COMMENT '联系人电话',
  `contact_qq` varchar(20) DEFAULT NULL COMMENT '联系人QQ',
  `contact_email` varchar(20) DEFAULT NULL COMMENT '联系人邮箱',
  `level_type` tinyint(4) DEFAULT NULL COMMENT '1为正常 2星级信息 3为置顶信息',
  `top_start_time` bigint(20) DEFAULT NULL COMMENT '置顶开始时间',
  `top_end_time` bigint(20) DEFAULT NULL COMMENT '置顶结束时间',
  `security_deposit` int(11) DEFAULT NULL COMMENT '保证金',
  `create_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `update_time` bigint(20) DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(4) DEFAULT NULL COMMENT '1为正常使用 0为已成交',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_zgxx
-- ----------------------------

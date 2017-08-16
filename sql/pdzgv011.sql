/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : pdzg

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-08-16 17:41:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `pdzg_admin`
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_admin`;
CREATE TABLE `pdzg_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) DEFAULT NULL COMMENT '用户名',
  `admin_token` varchar(20) DEFAULT NULL COMMENT '随意时间加随机数',
  `code_id` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `phone` varchar(255) DEFAULT NULL,
  `create_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `update_time` bigint(20) DEFAULT NULL COMMENT '更新时间',
  `last_ip` varchar(30) DEFAULT NULL COMMENT '上次登录ip',
  `login_ip` varchar(30) DEFAULT NULL COMMENT '登录ip',
  `last_time` bigint(20) DEFAULT NULL COMMENT '上次登录时间',
  `login_time` bigint(20) DEFAULT NULL COMMENT '登录时间',
  `level` int(4) DEFAULT NULL COMMENT '管理员等级',
  `status` tinyint(4) DEFAULT '1' COMMENT '1为使用中 0为停止使用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_admin
-- ----------------------------
INSERT INTO `pdzg_admin` VALUES ('1', 'xcpd0598777', null, null, 'e10adc3949ba59abbe56e057f20f883e', '0598777', null, null, '127.0.0.1', '127.0.0.1', '1501635914', '1501635914', '1024', '1');
INSERT INTO `pdzg_admin` VALUES ('2', 'q764448863', '15015697330001', null, 'e10adc3949ba59abbe56e057f20f883e', null, null, null, '127.0.0.1', '127.0.0.1', '1502001252', '1502176231', '2048', '1');
INSERT INTO `pdzg_admin` VALUES ('3', 'q123456', null, null, 'e10adc3949ba59abbe56e057f20f883e', '123456', '1501641228', '1501641228', '127.0.0.1', '127.0.0.1', '1502759653', '1502761380', '128', '1');
INSERT INTO `pdzg_admin` VALUES ('6', '大孩子', null, null, '', '12345678', '1501643615', '1501643615', null, '127.0.0.1', null, '1501643633', '512', '1');

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
  `info_id` bigint(20) DEFAULT NULL COMMENT '信息id',
  `user_id` bigint(20) DEFAULT NULL COMMENT '用户表id',
  `create_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `update_time` bigint(20) DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(4) DEFAULT NULL COMMENT '1为使用 0为停止',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_collection
-- ----------------------------
INSERT INTO `pdzg_collection` VALUES ('1', '6', '2', '123', '123', '1');
INSERT INTO `pdzg_collection` VALUES ('2', '7', '2', '456', '456', '1');
INSERT INTO `pdzg_collection` VALUES ('3', '7', '3', null, null, '1');

-- ----------------------------
-- Table structure for `pdzg_comment`
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_comment`;
CREATE TABLE `pdzg_comment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `info_id` bigint(20) DEFAULT NULL COMMENT '具体详情id',
  `user_id` bigint(20) DEFAULT NULL COMMENT '发布用户id',
  `content` text COMMENT '评论内容',
  `reply_user_id` bigint(20) DEFAULT NULL COMMENT '回复用户id',
  `create_time` bigint(20) DEFAULT NULL,
  `update_time` bigint(20) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL COMMENT '发布ip地址',
  `status` tinyint(4) DEFAULT '1' COMMENT '1为使用中 0为停止使用 2为审核中',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_comment
-- ----------------------------
INSERT INTO `pdzg_comment` VALUES ('1', '14', '2', '真的很好啊，大店真的很好啊，大店真的很好啊，大店真的很好啊，大店真的很好啊，大店', '3', '1499914483', '1499914483', '127.0.0.1', '2');
INSERT INTO `pdzg_comment` VALUES ('2', '7', '3', '不错不错', '2', '1499914483', '1499914483', '127.0.0.1', '1');
INSERT INTO `pdzg_comment` VALUES ('3', '6', '2', '非常好', null, '1499914483', '1499914483', '127.0.0.1', '2');
INSERT INTO `pdzg_comment` VALUES ('4', '14', '3', '不错不错', '3', '1499914483', '1499914483', '127.0.0.1', '1');
INSERT INTO `pdzg_comment` VALUES ('5', '14', '3', '超级棒', null, '1499914483', '1499914483', '127.0.0.1', '1');

-- ----------------------------
-- Table structure for `pdzg_img`
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_img`;
CREATE TABLE `pdzg_img` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `url_id` bigint(20) DEFAULT NULL COMMENT '图片urlid',
  `info_id` bigint(20) DEFAULT NULL COMMENT '信息id',
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_img
-- ----------------------------
INSERT INTO `pdzg_img` VALUES ('1', '10', '1', '0');
INSERT INTO `pdzg_img` VALUES ('2', '2', '1', '1');
INSERT INTO `pdzg_img` VALUES ('3', '3', '1', '1');

-- ----------------------------
-- Table structure for `pdzg_img_url`
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_img_url`;
CREATE TABLE `pdzg_img_url` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `info_id` bigint(20) DEFAULT NULL COMMENT '列表id',
  `url` varchar(255) DEFAULT NULL COMMENT '地址',
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_img_url
-- ----------------------------
INSERT INTO `pdzg_img_url` VALUES ('10', null, 'http://zaozhuang.dzwww.com/news/shjj/201706/W020170614420377064761.jpg', '1');
INSERT INTO `pdzg_img_url` VALUES ('2', null, 'http://img3.pxto.com.cn/201706/04/5933796560fa3.jpg', '1');
INSERT INTO `pdzg_img_url` VALUES ('3', '1', 'http://oub222afv.bkt.clouddn.com/img2017080716133644,http://oub222afv.bkt.clouddn.com/img2017080716133644', '1');
INSERT INTO `pdzg_img_url` VALUES ('16', '11', '', '1');
INSERT INTO `pdzg_img_url` VALUES ('17', '14', 'http://oub222afv.bkt.clouddn.com/img2017080810455797,http://oub222afv.bkt.clouddn.com/img2017080810460230,http://oub222afv.bkt.clouddn.com/img2017080810461770', '1');
INSERT INTO `pdzg_img_url` VALUES ('15', '16', 'http://oub222afv.bkt.clouddn.com/img2017080810455797,http://oub222afv.bkt.clouddn.com/img2017080810460230,http://oub222afv.bkt.clouddn.com/img2017080810461770', '1');
INSERT INTO `pdzg_img_url` VALUES ('19', '17', '', '1');
INSERT INTO `pdzg_img_url` VALUES ('20', '18', 'http://oub222afv.bkt.clouddn.com/img2017081509153936', '1');
INSERT INTO `pdzg_img_url` VALUES ('21', '24', 'http://oub222afv.bkt.clouddn.com/img2017081509413728', '1');
INSERT INTO `pdzg_img_url` VALUES ('22', '25', 'http://oub222afv.bkt.clouddn.com/img2017081509435987,http://oub222afv.bkt.clouddn.com/img2017081509442171', '1');

-- ----------------------------
-- Table structure for `pdzg_info`
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_info`;
CREATE TABLE `pdzg_info` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL DEFAULT '0' COMMENT '用户id',
  `big_item_id` int(11) DEFAULT NULL COMMENT '大类型id',
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
  `contact_wx` varchar(255) DEFAULT '' COMMENT '联系人微信',
  `location` varchar(255) DEFAULT NULL COMMENT '地址信息',
  `shop_area` varchar(255) DEFAULT NULL COMMENT '店铺面积',
  `decoration` varchar(255) DEFAULT '' COMMENT '装修',
  `water_electricity` varchar(30) DEFAULT NULL COMMENT '水电费',
  `to_serve` varchar(30) DEFAULT NULL COMMENT '送餐',
  `surroundings` varchar(30) DEFAULT NULL COMMENT '周边环境',
  `shop_facilities` varchar(30) DEFAULT NULL COMMENT '店铺设施',
  `hold_credentials` varchar(30) DEFAULT NULL COMMENT '所持证书',
  `shop_address` varchar(255) DEFAULT NULL COMMENT '店铺地址',
  `email` varchar(255) DEFAULT NULL,
  `click_num` int(11) DEFAULT NULL COMMENT '点击数量',
  `level_type_id` int(10) DEFAULT NULL COMMENT '状态等级id',
  `create_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `update_time` bigint(20) DEFAULT NULL COMMENT '更新时间',
  `ip` varchar(255) DEFAULT NULL COMMENT '发布ip',
  `status` tinyint(4) DEFAULT '1' COMMENT '1为正常使用 0为已成交',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_info
-- ----------------------------
INSERT INTO `pdzg_info` VALUES ('1', '3', '6', '贵州省', '一个月', '大店转让绝对给力测试', '5000-7000元', '3000-5000元', '15万以上', '2000-3000', '男', '三年', '沙县小吃', '8-10小时', '20-30岁', '身强体壮', '需要', '单间', '有', '6:00-7:00', '22:00-23:00', '全新', '大店求转绝对好店 不会令你失望', null, '乐先生', '18960501805', '764448863', 'q764448863', null, '100平', '', '500元以下', '有送餐', '工厂,学校,小区,商场', '水电,燃气,宽带WiFi', '营业执照,卫生许可证', '福建省三明市沙县', '764448863@qq.com', '11', '1', '1499238698', '1501208845', '127.0.0.1', '1');
INSERT INTO `pdzg_info` VALUES ('2', '2', '5', '福建省', '长期有效', '大店转让绝对给力002', '5000-7000元', '3000-5000元', '15万以上', '2000-3000', '男', '三年以上', '套餐饭', '8-10小时', '20-30岁', '身强体壮', '需要', '单间', '有', '6:00-7:00', '21:00-22:00', '全新', '大店求转绝对好店 不会令你失望', null, '乐先生', '18960501805', '764448863', 'q7644488633', null, '100平', '简单装修', '1500元以上', '有送餐', '工厂,学校', '水电,燃气,宽带WiFi', '营业执照,卫生许可证', '福建省三明市沙县', '764448863@qq.com', '11', '2', '1499238698', '1500104154', '128.0.0.1', '1');
INSERT INTO `pdzg_info` VALUES ('3', '2', '5', '福建省', '长期有效', '大店转让绝对给力003', '5000-7000元', '3000-5000元', '15万以上', '2000-3000', '男', '三年以上', '黄焖鸡', '8-10小时', '20-30岁', '身强体壮', '需要', '单间', '有', '6:00-7:00', '22:00-23:00', '全新', '大店求转绝对好店 不会令你失望', null, '乐先生', '18960501805', '764448863', 'q7644488633', null, '100平', '简单装修', '1500元以上', '有送餐', '工厂,学校', '水电,燃气,宽带WiFi', '营业执照,卫生许可证', '福建省三明市沙县', '764448863@qq.com', '111', '14', '1499238698', '1501038291', null, '1');
INSERT INTO `pdzg_info` VALUES ('4', '3', '5', '福建省', '一个月', '大店转让绝对给力004', '5000-7000元', '3000-5000元', '15万以上', '2000-3000', '男', '两年', '沙县小吃', '12小时以上', '20-30岁', '状态良好', '需要', '阁楼', '有', '5:00-5:00', '21:00-22:00', '全新', '大店求转绝对好店 不会令你失望', null, '乐先生', '18960501805', '764448863', 'q76444886333', null, '100平', '简单装修', '1500元以上', '有送餐', '工厂,学校', '水电,燃气,宽带WiFi', '营业执照,卫生许可证', '福建省三明市沙县', '764448863@qq.com', '11', '33', '1499238698', '1500104154', null, '1');
INSERT INTO `pdzg_info` VALUES ('5', '2', '5', '福建省', '长期有效', '大店转让绝对给力005', '5000-7000元', '3000-5000元', '15万以上', '5000-6000', '男', '三年以上', '沙县小吃', '8-10小时', '30-40岁', '状态良好', '不需要', '单间', '没有', '6:00-7:00', '22:00-23:00', '9成新', '大店求转绝对好店 不会令你失望', null, '乐先生', '18960501805', '764448863', 'q764448863333', null, '100平', '简单装修', '1500元以上', '有送餐', '工厂,学校', '水电,燃气,宽带WiFi', '营业执照,卫生许可证', '福建省三明市沙县', '764448863@qq.com', '11', '20', '1499238698', '1501210065', null, '1');
INSERT INTO `pdzg_info` VALUES ('6', '3', '5', '福建省', '长期有效', '大店转让绝对给力006', '5000-7000元', '3000-5000元', '15万以上', '4000-5000', '女', '三年以上', '沙县小吃', '10-12小时', '40岁以上', '状态良好', '不需要', '集体', '没有', '8:00-9:00', '22:00-23:00', '9成新', '大店求转绝对好店 不会令你失望', null, '乐先生', '18960501805', '764448863', 'q764448863333', null, '100平', '简单装修', '1500元以上', '有送餐', '工厂,学校', '水电,燃气,宽带WiFi', '营业执照,卫生许可证', '福建省三明市沙县', '764448863@qq.com', '1', '34', '1499238698', '1501209532', null, '1');
INSERT INTO `pdzg_info` VALUES ('7', '2', '5', '海南省', '长期有效', '大店转让绝对给力大店转让绝对给力007大店转让绝对给力007大店转让绝对给力007大店转让绝对给力007大店转让绝对给力007大店转让绝对给力007007', '5000-7000元', '3000-5000元', '15万以上', '2000-3000', '女', '三年以上', '肯学肯干', '8-10小时', '不限', '状态良好', '不需要', '单间', '没有', '6:00-7:00', '22:00-23:00', '9成新', '大店求转绝对好店 不会令你失望', null, '乐先生', '18960501805', '764448863', 'q76444886344', null, '100平', '简单装修', '1500元以上', '有送餐', '工厂,学校', '水电,燃气,宽带WiFi', '营业执照,卫生许可证', '福建省三明市沙县', '764448863@qq.com', '1', '35', '1499238698', '1500104154', null, '1');
INSERT INTO `pdzg_info` VALUES ('11', '0', '5', '上海市', '一个月', '测试001客户插入', '5000-7000元', '3000-5000元', '1万-3万', '1000以下', '女', '新手', '', '8-10小时', '', '身强体壮', '', '', '没有', '', '', '', '测试测试', null, '老王', '18960501805', '56465465', 'q764448863444', null, '564654', '', '', '偶尔', '', '有线电视,电话', '营业执照', '113', '54165456@qq.com', '1', null, null, '1501228719', null, '1');
INSERT INTO `pdzg_info` VALUES ('12', '0', '5', '上海市', '一个月', '测试001客户插入', '5000-7000元', '3000-5000元', '1万-3万', '1000以下', '女', '新手', '', '8-10小时', '', '身强体壮', '', '', '没有', '', '', '', '测试测试', null, '老王', '18960501805', '56465465', 'q764448863555', null, '564654', '', '', '偶尔', '工厂,学校', '有线电视,电话', '营业执照', '113', '54165456@qq.com', '1', null, null, '1501228728', null, '1');
INSERT INTO `pdzg_info` VALUES ('13', '0', '5', '香港特别行政区', '', '测试002', '', '500-800元', '', '', '', '两年', '', '', '', '', '', '', '', '', '', '', '64165', null, '问问', '18960501805', '156156', 'q764448863666', null, '', '', '800-1000元', '', '', '水电', '营业执照', '', '', '1', '36', null, '1501230282', null, '1');
INSERT INTO `pdzg_info` VALUES ('14', '2', '5', '宁夏回族自治区', '一周', '测试003测试003测试003测试003测试003测试003测试003测试003测试003', '7000元-10000元', '2500-3000元', '面议', '1000以下', '性别不限', '新手', '套餐饭', '8-10小时', '20-30岁', '身强体壮', '不需要', '集体', '没有', '5:00之前', '20:00之前', '9成新', '这是一个非常非常好的店铺', null, '老乐', '18960501805', '764448863', 'q764448863777', null, '76', '简单装修', '500-800元', '没有外卖', '工厂,学校,小区,商场', '消毒柜,其他', '营业执照,卫生许可证', '沙县小吃商城', '764448863', '456', '37', null, '1501460554', null, '1');
INSERT INTO `pdzg_info` VALUES ('15', '0', '5', '山东省', '', '测试004', '', '', '1万-3万', '', '', '', '套餐饭', '', '', '', '', '', '', '', '', '', '12312312', null, '12312', '123123', '12312', 'q764448863888', null, '', '简单装修', '500-800元', '没有外卖', '工厂,学校,超市,公园', '水电,燃气,有线电视,电话,宽带WiFi,消毒柜', '卫生许可证,营业执照', '', '1231231', '1', '38', null, '1501460568', null, '0');
INSERT INTO `pdzg_info` VALUES ('16', '0', '5', '天津市', '一个月', '测试006', '5000-7000元', '1000-1500元', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '11', null, '111', '111', '', '', null, '', '', '', '', '工厂,学校,小区,超市,公园', '', '', '', '', '1', '39', null, '1501978632', '127.0.0.1', '0');
INSERT INTO `pdzg_info` VALUES ('17', '0', '5', ' ', ' ', '测试承包001', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '111', null, '1', '1', '1', '1', null, '', '', '', '', '', '', '', '', '', '1', '44', null, '1502268154', '127.0.0.1', '1');
INSERT INTO `pdzg_info` VALUES ('18', '0', '5', '台湾省', '长期有效', '测试发布001', '', '', '', '1000以下', '', '', '炸酱面', '8-10小时', '', '', '', '', '', '', '', '', '123123123', null, '123', '123', '123', '123', null, '123', '', '500元以下', '', '小区,商场', '空调,电话,宽带WiFi', '卫生许可证', '123', '', null, null, null, '1502759705', '127.0.0.1', '1');
INSERT INTO `pdzg_info` VALUES ('19', '0', '5', '', '', '1231', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '123123', null, '123', '123', '123', '', null, '', '', '', '', '', '', '', '', null, null, null, null, '1502760681', '127.0.0.1', '1');
INSERT INTO `pdzg_info` VALUES ('20', '0', '9', '', '', '1231', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '123123', null, '123', '123', '123', '', null, '', '', '', '', '', '', '', '', null, null, null, null, '1502760927', '127.0.0.1', '1');
INSERT INTO `pdzg_info` VALUES ('21', '0', '9', '', '', '1231', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '123123', null, '123', '123', '123', '', null, '', '', '', '', '', '', '', '', null, null, null, null, '1502760937', '127.0.0.1', '1');
INSERT INTO `pdzg_info` VALUES ('22', '0', '5', '湖北省', '', '123123', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '123', null, '123', '123', '123', '123', null, '123', '', '', '', '', '', '', '', null, null, null, null, '1502760967', '127.0.0.1', '1');
INSERT INTO `pdzg_info` VALUES ('23', '0', '5', '湖北省', '', '123123', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '123', null, '123', '123', '123', '123', null, '123', '', '', '', '', '', '', '123', null, null, null, null, '1502761229', '127.0.0.1', '0');
INSERT INTO `pdzg_info` VALUES ('24', '0', '5', '', '', '123', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '123', null, '123', '123', '123', '123', null, '123', '', '', '', '', '', '', '123', null, null, null, null, '1502761305', '127.0.0.1', '0');
INSERT INTO `pdzg_info` VALUES ('25', '0', '5', '福建省', '长期有效', '测试发布001', '2500-5000元', '500-800元', '', '', '', '新手', '', '', '', '', '需要', '', '', '', '', '', '123123', null, '123', '123', '123', '123', null, '123', '', '500-800元', '', '工厂,学校', '齐全,水电,燃气', '营业执照,卫生许可证', '123', '', null, '45', null, '1502761443', '127.0.0.1', '1');

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
-- Table structure for `pdzg_level_type`
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_level_type`;
CREATE TABLE `pdzg_level_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_id` bigint(20) DEFAULT NULL COMMENT '发布id',
  `user_id` bigint(20) DEFAULT NULL,
  `red` tinyint(4) unsigned DEFAULT '0' COMMENT '套红',
  `top` tinyint(4) unsigned DEFAULT '0' COMMENT '置顶',
  `bold` tinyint(4) unsigned DEFAULT '0' COMMENT '加粗',
  `star` tinyint(4) unsigned DEFAULT '0' COMMENT '星级 ',
  `top_start_time` bigint(20) DEFAULT NULL COMMENT '置顶开始时间',
  `top_end_time` bigint(20) DEFAULT NULL COMMENT '置顶结束时间',
  `security_deposit` int(11) DEFAULT NULL COMMENT '保证金',
  `star_info` longtext COMMENT '星级信息',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_level_type
-- ----------------------------
INSERT INTO `pdzg_level_type` VALUES ('1', '1', '2', '0', '0', '0', '1', '1501114789', '1505434790', null, null);
INSERT INTO `pdzg_level_type` VALUES ('2', '2', '2', '1', '0', '1', '1', '1499238698', '1499238698', null, null);
INSERT INTO `pdzg_level_type` VALUES ('14', '3', '3', '1', '1', '0', '1', '1501038284', '1501902285', null, null);
INSERT INTO `pdzg_level_type` VALUES ('20', '5', '3', '1', '1', '1', '1', '1501127364', '1501559364', null, null);
INSERT INTO `pdzg_level_type` VALUES ('34', '6', '3', '0', '0', '0', '1', null, null, null, null);
INSERT INTO `pdzg_level_type` VALUES ('33', '4', '3', '1', '1', '1', '1', '1501144456', '1501576460', null, null);
INSERT INTO `pdzg_level_type` VALUES ('35', '7', '2', '0', '1', '0', '1', '1501211871', '1501471074', null, null);
INSERT INTO `pdzg_level_type` VALUES ('36', '13', '0', '0', '0', '0', '0', null, null, null, null);
INSERT INTO `pdzg_level_type` VALUES ('37', '14', '0', '0', '1', '1', '1', '1502177037', '1504769040', null, null);
INSERT INTO `pdzg_level_type` VALUES ('38', '15', '0', '1', '1', '0', '0', '1501581232', '1506765234', null, null);
INSERT INTO `pdzg_level_type` VALUES ('39', '16', '0', '0', '1', '0', '0', '1502162808', '1504754803', null, null);
INSERT INTO `pdzg_level_type` VALUES ('44', '17', '0', '0', '0', '0', '0', '0', '0', null, '腾讯科技讯 8月11日消息，周四美股低开低走，道指接连跌破22000点和21900点关口，标普500指数创5月份以来最大单日跌幅，科技股遭遇重创，拖累纳指大跌逾2%。\n美股科技板块方面，苹果跌3.22%，谷歌(微博)母公司Alphabet跌1.75%，亚马逊跌2.55%，微软跌1.46%，Facebook跌2.21%，奈飞跌3.78%，特斯拉跌2.31%。\n中概股同样也遭遇重挫，网易达跌幅9.78%、股价报284.25美元、下跌30.80美元，阿里巴巴跌3.5%，微博跌5.77%\n昨日，网易发布了截至6月30日的第二季度财报。净收入为133.76亿元人民币(约合19.73亿美元)，同比增长49.4%。净利润为29.72亿元人民币(约合4.38亿美元)，同比增长9.2%。\n由于净利润低于预期，网易股价在美国东部时间8月9日(北京时间8月10日)盘后交易中一度下滑3%。第二季度，基于非美国通用会计准则，网易每股美国存托股摊薄收益3.86美元，低于分析师预期的4.02美元。\n过去52周，网易股价最高为337.55美元，最低为195.37美元。\n网易第二季度主要业绩：\n--网易第二季度净营收为人民币134亿元(约合20亿美元)，较去年同期增长49.4%。\n--网易第二季度网络游戏净营收为人民币94亿元(约合14亿美元)，较去年同期增长46.5%。\n--网易第二季度广告服务净营收为人民币5.956亿元(约合8790万美元)，较去年同期增长12.1%。\n--网易第二季度邮箱、电商和其它服务净营收为人民币34亿元(约合4.942亿美元)，较去年同期增长68.9%。\n--网易第二季度毛利润为人民币67亿元(约合9.937亿美元)，较去年同期增长27.6%。\n--网易第二季度总运营支出为人民币33亿元(约合4.914亿美元)，较去年同期增长49.2%。\n--第二季度归属网易股东的净利润为人民币30亿元(约合4.384亿美元)，较去年同期增长9.2%。不按照美国通用会计准则，第二季度归属网易股东的净利润为人民币35亿元(约合5.122亿美元)，同比增长7.8%。\n--网易第二季度每股美国存托凭证摊薄收益为3.31美元;不按照美国通用会计准则，第二季度每股美国存托凭证摊薄收益为3.86美元。');
INSERT INTO `pdzg_level_type` VALUES ('45', '25', '0', '1', '1', '1', '1', '1502761478', '1505353481', null, '没有星级内容');

-- ----------------------------
-- Table structure for `pdzg_money`
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_money`;
CREATE TABLE `pdzg_money` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `money` int(11) DEFAULT NULL COMMENT '充值钱',
  `user_id` bigint(20) DEFAULT NULL COMMENT '用户id',
  `prepay_id` varchar(255) DEFAULT NULL,
  `create_time` bigint(20) DEFAULT NULL,
  `update_time` bigint(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_money
-- ----------------------------
INSERT INTO `pdzg_money` VALUES ('1', '99', '2', null, '1499912101', '1499912101', '1');
INSERT INTO `pdzg_money` VALUES ('2', '66', '2', null, '1499912101', '1499912101', '1');
INSERT INTO `pdzg_money` VALUES ('3', '100', '3', null, '1499912101', '1499912101', '1');
INSERT INTO `pdzg_money` VALUES ('4', '1000', '3', '', '1499912101', '1499912101', '1');
INSERT INTO `pdzg_money` VALUES ('5', '445', '3', null, '1499912101', '1499912101', '1');

-- ----------------------------
-- Table structure for `pdzg_news`
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_news`;
CREATE TABLE `pdzg_news` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `nickname` varchar(20) DEFAULT NULL COMMENT '发布人昵称',
  `reply_nickname` varchar(20) DEFAULT NULL COMMENT '回复者昵称',
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
-- Table structure for `pdzg_order`
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_order`;
CREATE TABLE `pdzg_order` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) DEFAULT NULL,
  `info_id` bigint(20) DEFAULT NULL,
  `level_type` int(255) DEFAULT NULL COMMENT '支付类型 1置顶 2套红 3加粗 4刷新 5解绑',
  `order_money` int(11) DEFAULT NULL COMMENT '对应金币',
  `who` varchar(255) DEFAULT NULL COMMENT '操作人',
  `ip` varchar(255) DEFAULT NULL COMMENT '产生操作的ip地址',
  `create_time` bigint(20) DEFAULT NULL,
  `update_time` bigint(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_order
-- ----------------------------
INSERT INTO `pdzg_order` VALUES ('1', '2', '3', '2', '6', null, null, '1501579528', '1501579528', '1');
INSERT INTO `pdzg_order` VALUES ('2', '3', '3', '3', '4', null, null, '1499850748', '1499850748', '1');
INSERT INTO `pdzg_order` VALUES ('3', '2', '3', '2', '6', null, null, '1499850748', '1499850748', '1');
INSERT INTO `pdzg_order` VALUES ('4', '2', '4', '1', '4', null, null, '1499909061', '1499909061', '1');
INSERT INTO `pdzg_order` VALUES ('5', '2', '5', '2', '4', null, null, '1499909061', '1499909061', '1');
INSERT INTO `pdzg_order` VALUES ('6', '2', '5', '3', '4', null, null, '1499909061', '1499909061', '1');
INSERT INTO `pdzg_order` VALUES ('7', '2', '5', '4', '3', null, null, '1499909061', '1499909061', '1');
INSERT INTO `pdzg_order` VALUES ('8', '3', '5', '5', '5', null, null, '1499909061', '1499909061', '1');
INSERT INTO `pdzg_order` VALUES ('9', '3', '6', '6', '3', null, null, '1499909061', '1499909061', '1');
INSERT INTO `pdzg_order` VALUES ('10', '3', '6', '5', '3', null, null, '1499909061', '1499909061', '1');
INSERT INTO `pdzg_order` VALUES ('11', '0', '14', '2', '6', '2', '127.0.0.1', '1502176989', '1502176989', '1');
INSERT INTO `pdzg_order` VALUES ('12', '0', '14', '3', '3', '2', '127.0.0.1', '1502176989', '1502176989', '1');
INSERT INTO `pdzg_order` VALUES ('13', '0', '14', '1', '0', '2', '127.0.0.1', '1502176989', '1502176989', '1');
INSERT INTO `pdzg_order` VALUES ('14', '0', '14', '2', '6', '2', '127.0.0.1', '1502177083', '1502177083', '1');
INSERT INTO `pdzg_order` VALUES ('15', '0', '14', '3', '3', '2', '127.0.0.1', '1502177083', '1502177083', '1');
INSERT INTO `pdzg_order` VALUES ('16', '0', '14', '1', '348', '2', '127.0.0.1', '1502177083', '1502177083', '1');
INSERT INTO `pdzg_order` VALUES ('17', '0', '17', '1', '0', '3', '127.0.0.1', '1502412236', '1502412236', '1');
INSERT INTO `pdzg_order` VALUES ('18', '0', '25', '2', '6', '3', '127.0.0.1', '1502761494', '1502761494', '1');
INSERT INTO `pdzg_order` VALUES ('19', '0', '25', '3', '3', '3', '127.0.0.1', '1502761494', '1502761494', '1');
INSERT INTO `pdzg_order` VALUES ('20', '0', '25', '1', '348', '3', '127.0.0.1', '1502761494', '1502761494', '1');

-- ----------------------------
-- Table structure for `pdzg_record`
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_record`;
CREATE TABLE `pdzg_record` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) DEFAULT NULL COMMENT '管理员id',
  `user_id` bigint(20) DEFAULT NULL,
  `money` int(255) DEFAULT NULL COMMENT '涉及金币',
  `explain` varchar(255) DEFAULT NULL COMMENT '加金币说明',
  `behavior` varchar(255) DEFAULT NULL COMMENT '操作行为',
  `create_time` bigint(20) DEFAULT NULL,
  `multiply` int(11) DEFAULT NULL COMMENT '倍率',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_record
-- ----------------------------
INSERT INTO `pdzg_record` VALUES ('1', '2', '0', '1', '测试001', null, '1501991516', '1');
INSERT INTO `pdzg_record` VALUES ('2', '2', '0', '100', '充值时倍率为：1。测试003', null, '1501991536', '1');
INSERT INTO `pdzg_record` VALUES ('3', '2', '0', '123', '测试测试', null, '1501991775', '1');
INSERT INTO `pdzg_record` VALUES ('4', '2', '0', '10', '测试006', null, '1501991890', '1');
INSERT INTO `pdzg_record` VALUES ('5', '2', '0', '150', '测试007', null, '1501991980', '1');
INSERT INTO `pdzg_record` VALUES ('6', '2', '3', '500', '测试07', null, '1501992058', '1');
INSERT INTO `pdzg_record` VALUES ('7', '3', '0', '10', '测试07', null, '1502004569', '1');
INSERT INTO `pdzg_record` VALUES ('8', '3', '0', '20', '测试07', null, '1502004584', '1');
INSERT INTO `pdzg_record` VALUES ('9', '3', '0', '20', '测试07', null, '1502004593', '1');
INSERT INTO `pdzg_record` VALUES ('10', '2', '0', '500', '测试加金币', null, '1502177568', '1');
INSERT INTO `pdzg_record` VALUES ('11', '2', '3', '10', '123', null, '1502179187', '1');
INSERT INTO `pdzg_record` VALUES ('12', '3', '0', '100', '加了100金币', null, '1502759785', '1');
INSERT INTO `pdzg_record` VALUES ('13', '3', '0', '10000', '加了10000金币测试', null, '1502761525', '1');

-- ----------------------------
-- Table structure for `pdzg_small_item`
-- ----------------------------
DROP TABLE IF EXISTS `pdzg_small_item`;
CREATE TABLE `pdzg_small_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) DEFAULT NULL COMMENT '栏目名称',
  `item_name_en` varchar(255) DEFAULT NULL COMMENT '英文对照',
  `item_type` tinyint(4) DEFAULT NULL COMMENT 'item的类型 1为大类 2为小类 3为自定义',
  `item_type_id` int(11) DEFAULT NULL COMMENT '所属父类id',
  `create_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `update_time` bigint(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '1为使用 0为停止',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=243 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_small_item
-- ----------------------------
INSERT INTO `pdzg_small_item` VALUES ('1', '省份', 'province', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('2', '有效期', 'valid_period', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('3', '月租金', 'monthly_rent', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('4', '日营业额', 'day_turnover', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('5', '水电费', 'water_electricity', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('6', '送餐', 'to_serve', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('7', '转让费', 'transfer_fee', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('8', '店铺设施', 'shop_facilities', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('9', '所持证书', 'hold_credentials', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('10', '月薪', 'monthly_salary', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('11', '性别', 'sex', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('12', '工作经验', 'work_experience', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('13', '工作技能', 'work_skill', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('14', '工作时长', 'work_hours', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('15', '年龄', 'age', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('16', '健康状况', 'health_status', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('17', '押金要求', 'cash_pledge', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('18', '居住条件', 'live_conditions', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('19', '外卖情况', 'takeaway_status', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('20', '开门时间', 'open_hours', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('21', '打烊时间', 'close_hours', '3', '0', '2147483647', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('22', '新旧程度', 'new_old', '3', '0', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('23', '周边环境', 'surroundings', '3', '0', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('24', '装修', 'decoration', '3', '0', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('83', '长期有效', null, '4', '2', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('84', '一周', null, '4', '2', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('85', '一个月', null, '4', '2', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('86', '两个月', null, '4', '2', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('87', '一年', null, '4', '2', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('88', '2500元以下', null, '4', '3', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('89', '2500-5000元', null, '4', '3', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('90', '5000-7000元', null, '4', '3', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('91', '7000元-10000元', null, '4', '3', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('92', '10000元以上', null, '4', '3', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('93', '500元以下', null, '4', '4', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('94', '500-800元', null, '4', '4', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('95', '800-1000元', null, '4', '4', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('96', '1000-1500元', null, '4', '4', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('97', '1500-2000元', null, '4', '4', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('98', '2000-2500元', null, '4', '4', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('99', '2500-3000元', null, '4', '4', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('100', '3000-5000元', null, '4', '4', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('101', '5000元以上', null, '4', '4', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('102', '500元以下', null, '4', '5', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('103', '500-800元', null, '4', '5', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('104', '800-1000元', null, '4', '5', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('105', '1000-1500元', null, '4', '5', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('106', '1500元以上', null, '4', '5', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('107', '没有外卖', null, '4', '6', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('108', '偶尔', null, '4', '6', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('109', '有送餐', null, '4', '6', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('110', '面议', null, '4', '7', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('111', '一万以下', null, '4', '7', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('112', '1万-3万', null, '4', '7', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('113', '3万-6万', null, '4', '7', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('114', '6万-10万', null, '4', '7', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('115', '10万-15万', null, '4', '7', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('116', '15万以上', null, '4', '7', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('117', '水电', null, '4', '8', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('118', '燃气', null, '4', '8', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('119', '有线电视', null, '4', '8', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('120', '空调', null, '4', '8', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('121', '电话', null, '4', '8', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('122', '宽带WiFi', null, '4', '8', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('123', '消毒柜', null, '4', '8', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('124', '其他', null, '4', '8', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('125', '齐全', null, '4', '8', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('126', '营业执照', null, '4', '9', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('127', '卫生许可证', null, '4', '9', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('128', '面议', null, '4', '10', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('129', '1000以下', null, '4', '10', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('130', '1000-2000', null, '4', '10', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('131', '2000-3000', null, '4', '10', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('132', '3000-4000', null, '4', '10', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('133', '4000-5000', null, '4', '10', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('134', '5000-6000', null, '4', '10', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('135', '6000-8000', null, '4', '10', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('136', '8000以上', null, '4', '10', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('137', '男', null, '4', '11', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('138', '女', null, '4', '11', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('139', '性别不限', null, '4', '11', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('140', '新手', null, '4', '12', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('141', '一年', null, '4', '12', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('142', '两年', null, '4', '12', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('143', '三年', null, '4', '12', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('144', '三年以上', null, '4', '12', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('145', '沙县小吃', null, '4', '13', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('146', '套餐饭', null, '4', '13', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('147', '黄焖鸡', null, '4', '13', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('148', '炸酱面', null, '4', '13', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('149', '炒菜', null, '4', '13', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('150', '无所不会', null, '4', '13', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('151', '肯学肯干', null, '4', '13', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('152', '持有厨师证', null, '4', '13', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('153', '8小时以内', null, '4', '14', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('154', '8-10小时', null, '4', '14', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('155', '10-12小时', null, '4', '14', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('156', '12小时以上', null, '4', '14', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('157', '20岁以下', null, '4', '15', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('158', '20-30岁', null, '4', '15', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('159', '30-40岁', null, '4', '15', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('160', '40岁以上', null, '4', '15', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('161', '肯干就行', null, '4', '16', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('162', '身强体壮', null, '4', '16', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('163', '状态良好', null, '4', '16', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('164', '一般', null, '4', '16', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('165', '药不停', null, '4', '16', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('166', '残疾', null, '4', '16', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('167', '需要', null, '4', '17', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('168', '不需要', null, '4', '17', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('169', '单间', null, '4', '18', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('170', '集体', null, '4', '18', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('171', '阁楼', null, '4', '18', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('172', '其他', null, '4', '18', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('173', '有', null, '4', '19', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('174', '没有', null, '4', '19', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('175', '5:00之前', null, '4', '20', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('176', '5:00-6:00', null, '4', '20', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('177', '6:00-7:00', null, '4', '20', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('178', '7:00-8:00', null, '4', '20', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('179', '8:00-9:00', null, '4', '20', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('180', '9:00以后', null, '4', '20', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('181', '通宵营业', null, '4', '20', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('182', '看情况', null, '4', '20', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('183', '20:00之前', null, '4', '21', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('184', '20:00-21:00', null, '4', '21', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('185', '21:00-22:00', null, '4', '21', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('186', '22:00-23:00', null, '4', '21', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('187', '23:00-0:00', null, '4', '21', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('188', '0:00-1:00', null, '4', '21', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('189', '1:00以后', null, '4', '21', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('190', '不打烊', null, '4', '21', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('191', '看情况', null, '4', '21', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('192', '全新', null, '4', '22', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('193', '9成新', null, '4', '22', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('194', '7成新', null, '4', '22', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('195', '5成新', null, '4', '22', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('196', '工厂', null, '4', '23', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('197', '学校', null, '4', '23', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('198', '小区', null, '4', '23', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('199', '商场', null, '4', '23', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('200', '超市', null, '4', '23', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('201', '车站', null, '4', '23', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('202', '公园', null, '4', '23', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('203', '市场', null, '4', '23', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('204', '飞机场', null, '4', '23', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('205', '其他', null, '4', '23', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('206', '简单装修', null, '4', '24', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('207', '中等装修', null, '4', '24', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('208', '精装修', null, '4', '24', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('209', '北京市', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('210', '天津市', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('211', '上海市', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('212', '重庆市', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('213', '河北省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('214', '山西省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('215', '辽宁省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('216', '吉林省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('217', '黑龙江省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('218', '江苏省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('219', '浙江省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('220', '安徽省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('221', '福建省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('222', '江西省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('223', '山东省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('224', '河南省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('225', '湖北省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('226', '湖南省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('227', '广东省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('228', '海南省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('229', '四川省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('230', '贵州省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('231', '云南省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('232', '陕西省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('233', '甘肃省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('234', '青海省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('235', '台湾省', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('236', '内蒙古自治区', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('237', '广西壮族自治区', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('238', '西藏自治区', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('239', '宁夏回族自治区', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('240', '新疆维吾尔族自治区', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('241', '香港特别行政区', null, '4', '1', '1498699351000', '1498699351000', '1');
INSERT INTO `pdzg_small_item` VALUES ('242', '澳门特别行政区', null, '4', '1', '1498699351000', '1498699351000', '1');

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
  `openid` varchar(255) DEFAULT NULL COMMENT '微信获取的openid',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `code_id` varchar(255) DEFAULT NULL COMMENT 'code_id',
  `nickname` varchar(255) DEFAULT NULL COMMENT '用户昵称',
  `phone` bigint(20) DEFAULT NULL COMMENT '手机号码',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `weixin` varchar(255) DEFAULT NULL COMMENT '微信号',
  `gold_coin` int(11) unsigned DEFAULT '0' COMMENT '金币数',
  `real_name` varchar(30) DEFAULT NULL COMMENT '真实姓名',
  `id_card` varchar(30) DEFAULT NULL COMMENT '身份证号码',
  `last_ip` varchar(255) DEFAULT NULL COMMENT '最后访问IP',
  `qq` bigint(20) DEFAULT NULL COMMENT 'QQ号',
  `level` smallint(6) DEFAULT NULL COMMENT '区分 普通会员 vip用户',
  `credit_num` int(11) DEFAULT NULL COMMENT '信用点',
  `create_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `update_time` bigint(20) DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1为使用 0为停止',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdzg_user
-- ----------------------------
INSERT INTO `pdzg_user` VALUES ('0', null, '系统', '', null, null, '0', '', 'q123', '19885', '', '12312', null, '1231231', '64', null, null, '1502761546', '1');
INSERT INTO `pdzg_user` VALUES ('2', null, 'lgy', '5885102', null, null, '18960501805', '764448863@qq.com', 'q1234', '4313', '乐广烨', '123456', null, '764448863', '32', '1000', null, '1501315240', '1');
INSERT INTO `pdzg_user` VALUES ('3', null, '大飞机', '5885102', null, null, '123456789', '123456', 'q1235', '510', '大乐乐', '456789', null, '764448863', '16', null, null, '1501581214', '1');
INSERT INTO `pdzg_user` VALUES ('5', 'oJvIb0fou4mj5St5ZSjW0TCcJBlk', '', '', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, '1');

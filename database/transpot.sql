/*
Navicat MySQL Data Transfer

Source Server         : dpm
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : transpot

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-12-16 15:59:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for car
-- ----------------------------
DROP TABLE IF EXISTS `car`;
CREATE TABLE `car` (
  `Car_id` varchar(10) NOT NULL,
  `Car_brand` varchar(30) DEFAULT NULL,
  `Car_color` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Car_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car
-- ----------------------------
INSERT INTO `car` VALUES ('sbm-5464', 'carry', 'เขียว');
INSERT INTO `car` VALUES ('กย-1551', 'nissan', 'ขาว');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `Cat_id` varchar(10) NOT NULL,
  `Cat_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('CA00000001', 'รถยนต์');
INSERT INTO `category` VALUES ('CA00000002', 'อาหาร');

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `Cus_id` varchar(10) NOT NULL,
  `Cus_name` varchar(30) DEFAULT NULL,
  `Cus_add` text,
  `Cus_tel` varchar(10) DEFAULT NULL,
  `Cus_company` text,
  `Cus_sex` int(1) DEFAULT NULL,
  `Cus_mail` text,
  PRIMARY KEY (`Cus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('CU00000001', 'ไวโอเลต วอเทียร์', '105/22 อ.เมือง ต.ในเมือง จ.ขอนแก่น 50000', '0812323234', 'ไทยรุ่งโรช จำกัด', '1', 'violet_wautier@gmail.com');

-- ----------------------------
-- Table structure for employee
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `Emp_id` char(10) NOT NULL,
  `Emp_card` varchar(13) DEFAULT NULL,
  `Emp_name` varchar(20) DEFAULT NULL,
  `Emp_sex` int(1) DEFAULT NULL,
  `Emp_tel` varchar(10) DEFAULT NULL,
  `Emp_pos` int(1) DEFAULT NULL,
  `Emp_user` varchar(20) DEFAULT NULL,
  `Emp_pass` varchar(10) DEFAULT NULL,
  `Car_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES ('EM00000001', '1219900450546', 'ภานุพงค์ สงคำศรี', '0', '0827416082', '0', 'admin', '1234', '');
INSERT INTO `employee` VALUES ('EM00000002', '1537310165822', 'กิติชัย ให้ชนะ', '1', '0875681415', '1', 'webmaster', '11111', '');
INSERT INTO `employee` VALUES ('EM00000003', '2312412412412', 'สมยศ ดวงดี', '0', '0834234142', '3', 'keaw', '1111', 'sbm-5464');

-- ----------------------------
-- Table structure for trailer
-- ----------------------------
DROP TABLE IF EXISTS `trailer`;
CREATE TABLE `trailer` (
  `Tar_id` varchar(10) NOT NULL,
  `Tar_roll` varchar(10) DEFAULT NULL,
  `Tar_look` varchar(30) DEFAULT NULL,
  `Tar_size` text,
  PRIMARY KEY (`Tar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trailer
-- ----------------------------
INSERT INTO `trailer` VALUES ('TA00000001', 'SAM-5897', 'ใหญ่', '500*500');

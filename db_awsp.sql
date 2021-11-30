/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : db_awsp

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-12-14 07:26:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for booking
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
`bookingID`  int(11) NOT NULL AUTO_INCREMENT ,
`customerID`  int(11) NOT NULL ,
`roomID`  int(11) NOT NULL ,
`voucherID`  int(11) NOT NULL ,
`checkin`  datetime NULL DEFAULT NULL ,
`checkout`  datetime NULL DEFAULT NULL ,
`child`  int(11) NULL DEFAULT NULL ,
`adult`  int(11) NULL DEFAULT NULL ,
`bookingdate`  datetime NULL DEFAULT NULL ,
`deposit`  decimal(20,2) NULL DEFAULT NULL ,
`status`  enum('BOOKING','CHECKIN','CHECKOUT') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'BOOKING' ,
PRIMARY KEY (`bookingID`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of booking
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
`customerID`  int(11) NOT NULL AUTO_INCREMENT ,
`roleID`  int(11) NOT NULL ,
`firstname`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`lastname`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`email`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`nik`  bigint(20) NULL DEFAULT NULL ,
`phone`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`username`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`password`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`customerID`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of customer
-- ----------------------------
BEGIN;
INSERT INTO `customer` VALUES ('1', '3', 'nopi', 'sari', 'nopi@gmail.com', '123456789', '08723458923', 'nopi', '202cb962ac59075b964b07152d234b70');
COMMIT;

-- ----------------------------
-- Table structure for detail_booking
-- ----------------------------
DROP TABLE IF EXISTS `detail_booking`;
CREATE TABLE `detail_booking` (
`detail_bookingID`  int(11) NOT NULL AUTO_INCREMENT ,
`bookingID`  int(11) NOT NULL ,
`facilitiesID`  int(11) NOT NULL ,
`facilities`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`price`  decimal(20,2) NULL DEFAULT NULL ,
`quantity`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`detail_bookingID`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of detail_booking
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for employee
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
`employeeID`  int(11) NOT NULL AUTO_INCREMENT ,
`roleID`  int(11) NOT NULL ,
`firstname`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`lastname`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`nip`  bigint(20) NULL DEFAULT NULL ,
`nik`  bigint(20) NULL DEFAULT NULL ,
`email`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`phone`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`dateofbirth`  date NULL DEFAULT NULL ,
`username`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`password`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`photo`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL ,
PRIMARY KEY (`employeeID`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of employee
-- ----------------------------
BEGIN;
INSERT INTO `employee` VALUES ('1', '1', 'babik', 'face', '1010101010', '22112212121212', 'babiq@gmail.com', '08123123123', '1995-11-17', 'babik', '202cb962ac59075b964b07152d234b70', 'assets/upload/employee/64772_avatar.jpg'), ('2', '2', 'bayu', 'indra', '2121212121212', '3322070711950001', 'bayu@gmail.com', '082225656833', '1995-07-11', 'indra', '202cb962ac59075b964b07152d234b70', 'assets/upload/employee/6800_marc.jpg');
COMMIT;

-- ----------------------------
-- Table structure for facilities
-- ----------------------------
DROP TABLE IF EXISTS `facilities`;
CREATE TABLE `facilities` (
`facilitiesID`  int(11) NOT NULL AUTO_INCREMENT ,
`facilities`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`price`  decimal(20,2) NULL DEFAULT NULL ,
PRIMARY KEY (`facilitiesID`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of facilities
-- ----------------------------
BEGIN;
INSERT INTO `facilities` VALUES ('1', 'Ekstra Bed', '150000.00');
COMMIT;

-- ----------------------------
-- Table structure for payment
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
`paymentID`  int(11) NOT NULL AUTO_INCREMENT ,
`bookingID`  int(11) NULL DEFAULT NULL ,
`paymentDate`  datetime NULL DEFAULT NULL ,
`tax`  int(11) NULL DEFAULT NULL ,
`total_payment`  decimal(20,2) NULL DEFAULT NULL ,
`status`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`paymentID`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of payment
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
`roleID`  int(11) NOT NULL AUTO_INCREMENT ,
`role`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`roleID`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=4

;

-- ----------------------------
-- Records of role
-- ----------------------------
BEGIN;
INSERT INTO `role` VALUES ('1', 'admin'), ('2', 'employee'), ('3', 'customer');
COMMIT;

-- ----------------------------
-- Table structure for room
-- ----------------------------
DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
`roomID`  int(11) NOT NULL AUTO_INCREMENT ,
`roomtypeID`  int(11) NULL DEFAULT NULL ,
`room_number`  int(11) NULL DEFAULT NULL ,
`floor`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`roomID`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of room
-- ----------------------------
BEGIN;
INSERT INTO `room` VALUES ('1', '1', '1', '1'), ('2', '1', '2', '1');
COMMIT;

-- ----------------------------
-- Table structure for room_type
-- ----------------------------
DROP TABLE IF EXISTS `room_type`;
CREATE TABLE `room_type` (
`roomtypeID`  int(11) NOT NULL AUTO_INCREMENT ,
`room_type`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`price`  decimal(20,2) NULL DEFAULT NULL ,
`capacity`  int(11) NULL DEFAULT NULL ,
`photo`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL ,
PRIMARY KEY (`roomtypeID`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of room_type
-- ----------------------------
BEGIN;
INSERT INTO `room_type` VALUES ('1', 'Suite', '700000.00', '2', 'assets/upload/roomtype/8051_card-3.jpg');
COMMIT;

-- ----------------------------
-- Table structure for voucher
-- ----------------------------
DROP TABLE IF EXISTS `voucher`;
CREATE TABLE `voucher` (
`voucherID`  int(11) NOT NULL AUTO_INCREMENT ,
`voucher_name`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`dicount`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`voucherID`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of voucher
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Auto increment value for booking
-- ----------------------------
ALTER TABLE `booking` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for customer
-- ----------------------------
ALTER TABLE `customer` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for detail_booking
-- ----------------------------
ALTER TABLE `detail_booking` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for employee
-- ----------------------------
ALTER TABLE `employee` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for facilities
-- ----------------------------
ALTER TABLE `facilities` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for payment
-- ----------------------------
ALTER TABLE `payment` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for role
-- ----------------------------
ALTER TABLE `role` AUTO_INCREMENT=4;

-- ----------------------------
-- Auto increment value for room
-- ----------------------------
ALTER TABLE `room` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for room_type
-- ----------------------------
ALTER TABLE `room_type` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for voucher
-- ----------------------------
ALTER TABLE `voucher` AUTO_INCREMENT=1;

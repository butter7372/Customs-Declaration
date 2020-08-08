/*
 Navicat Premium Data Transfer

 Source Server         : Customs_Declaration
 Source Server Type    : MySQL
 Source Server Version : 80012
 Source Host           : localhost:3306
 Source Schema         : customs_declaration

 Target Server Type    : MySQL
 Target Server Version : 80012
 File Encoding         : 65001

 Date: 13/08/2019 14:04:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for login
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login`  (
  `user` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `last_login` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`user`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES ('cong01', '7fa8282ad93047a4d6fe6111c93b308a', NULL);
INSERT INTO `login` VALUES ('ding01', 'bae5e3208a3c700e3db642b6631e95b9', '2019-08-12 04:30:23');
INSERT INTO `login` VALUES ('li20', 'fcea920f7412b5da7be0cf42b8c93759', '2019-08-12 04:30:04');
INSERT INTO `login` VALUES ('yu01', '2f0df77fb6614004be61acf755651d45', '2019-08-13 12:23:57');
INSERT INTO `login` VALUES ('zhang01', '79d886010186eb60e3611cd4a5d0bcae', '2019-08-09 05:19:18');

SET FOREIGN_KEY_CHECKS = 1;

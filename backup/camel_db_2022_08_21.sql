/*
 Navicat Premium Data Transfer

 Source Server         : Camel_Google_Cloud
 Source Server Type    : MySQL
 Source Server Version : 80026
 Source Host           : 34.124.237.32:3306
 Source Schema         : camel_db

 Target Server Type    : MySQL
 Target Server Version : 80026
 File Encoding         : 65001

 Date: 21/08/2022 17:17:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for approvers
-- ----------------------------
DROP TABLE IF EXISTS `approvers`;
CREATE TABLE `approvers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `single_type_id` bigint NOT NULL,
  `employee_id` bigint NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of approvers
-- ----------------------------
INSERT INTO `approvers` VALUES (1, 1, 17, NULL, NULL, NULL);
INSERT INTO `approvers` VALUES (2, 1, 103, NULL, NULL, NULL);
INSERT INTO `approvers` VALUES (11, 6, 103, NULL, NULL, NULL);
INSERT INTO `approvers` VALUES (12, 6, 1, NULL, NULL, NULL);
INSERT INTO `approvers` VALUES (13, 7, 14, NULL, NULL, NULL);
INSERT INTO `approvers` VALUES (14, 7, 17, NULL, NULL, NULL);
INSERT INTO `approvers` VALUES (15, 8, 17, NULL, NULL, NULL);
INSERT INTO `approvers` VALUES (16, 8, 103, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for attribute_employees
-- ----------------------------
DROP TABLE IF EXISTS `attribute_employees`;
CREATE TABLE `attribute_employees`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` bigint NOT NULL,
  `attribute_id` bigint NOT NULL,
  `data` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `raw_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of attribute_employees
-- ----------------------------
INSERT INTO `attribute_employees` VALUES (1, 114, 1, 'abc', '', 0, NULL, NULL, NULL);
INSERT INTO `attribute_employees` VALUES (2, 114, 2, '123456', '', 0, NULL, NULL, NULL);
INSERT INTO `attribute_employees` VALUES (3, 114, 1, 'FPT', '', 0, NULL, NULL, NULL);
INSERT INTO `attribute_employees` VALUES (9, 17, 1, 'null', '[\"FPT1111_xNBGIQVkPe7RZ07fWgWC_2022-06-30.jpg\",\"FPT1111_14jnyQrHZ1unByXdOyNU_2022-06-30.png\"]', 2, NULL, '2022-06-30 11:37:14', '2022-06-30 11:37:14');
INSERT INTO `attribute_employees` VALUES (22, 113, 1, 'null', '[\"FPT1112_fEOcrykm8wBBIUfpp0BC_2022-06-30.jpg\"]', 2, NULL, '2022-06-30 18:43:20', '2022-06-30 18:43:20');
INSERT INTO `attribute_employees` VALUES (23, 4, 1, 'null', '[\"CM000X_bGpuGefSBhfbiqe3IU1J_2022-06-30.jpg\"]', 2, NULL, '2022-06-30 20:41:48', '2022-06-30 20:41:48');
INSERT INTO `attribute_employees` VALUES (24, 17, 1, 'null', '[\"FPT1111_1to6MHefKfP7djg9zgKZ_2022-07-01.png\",\"FPT1111_njogrNuURmEyYOf95MLP_2022-07-01.png\"]', 2, NULL, '2022-07-01 17:34:10', '2022-07-01 17:34:10');
INSERT INTO `attribute_employees` VALUES (25, 113, 1, 'null', '[\"FPT1112_cYjKAPUtw5iZ36WzoKCk_2022-07-02.png\",\"FPT1112_I1EeSNnbeORpD5Pevy2T_2022-07-02.png\",\"FPT1112_wwAklkyDib9e4DrGLQyy_2022-07-02.png\"]', 1, NULL, '2022-07-02 11:04:55', '2022-07-02 11:04:55');
INSERT INTO `attribute_employees` VALUES (26, 104, 1, 'null', '[\"CM021_NTZHyPgbFIj4mdDY2BmT_2022-07-02.doc\"]', 0, NULL, '2022-07-02 16:40:06', '2022-07-02 16:40:06');
INSERT INTO `attribute_employees` VALUES (27, 1, 1, 'null', '[\"CM01_COq90S6Uj0oqLlWAH3G0_2022-07-02.png\"]', 2, NULL, '2022-07-02 17:26:09', '2022-07-02 17:26:09');
INSERT INTO `attribute_employees` VALUES (28, 17, 1, 'null', '[\"FPT1111_IWqLr1KDWXnHknRCeOQj_2022-08-04.png\"]', 2, NULL, '2022-08-04 21:52:27', '2022-08-04 21:52:27');
INSERT INTO `attribute_employees` VALUES (29, 17, 1, 'null', '[\"FPT1111_3FJjlxKqJeS81MA4yNoB_2022-08-04.png\"]', 2, NULL, '2022-08-04 21:57:00', '2022-08-04 21:57:00');
INSERT INTO `attribute_employees` VALUES (30, 17, 1, 'null', '[\"FPT1111_G2XfhnCdRM9WQgjI2cCx_2022-08-04.png\"]', 0, NULL, '2022-08-04 22:04:12', '2022-08-04 22:04:12');

-- ----------------------------
-- Table structure for attributes
-- ----------------------------
DROP TABLE IF EXISTS `attributes`;
CREATE TABLE `attributes`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_type` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of attributes
-- ----------------------------
INSERT INTO `attributes` VALUES (1, 'school', 'abc', 1, 1, NULL, NULL, NULL);
INSERT INTO `attributes` VALUES (2, 'cccd', 'acc', 1, 1, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for banners
-- ----------------------------
DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `links` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `from_at` date NOT NULL,
  `to_at` date NOT NULL,
  `type` tinyint NOT NULL DEFAULT 0,
  `admin_id` bigint NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of banners
-- ----------------------------
INSERT INTO `banners` VALUES (1, 'Banner camel', 'https://www.camelapp.gq/static/media/banner_01.112c494095efff28bcdf.png', '', '2022-06-22', '2022-08-27', 1, 1, NULL, '2022-06-23 23:36:30', '2022-08-09 09:15:51');
INSERT INTO `banners` VALUES (3, 'Banner camel', 'https://www.camelapp.gq/static/media/banner_04.04b2df2d3106996312dd.png', '', '2022-06-26', '2022-08-31', 1, 1, NULL, '2022-06-23 23:36:30', '2022-08-09 09:16:19');
INSERT INTO `banners` VALUES (51, 'Samsung Galaxy S22 Ultra 5G 256GB', 'images/6301ff725df266301ff725df28.png', '/kocoslink', '2022-08-20', '2022-08-22', 0, 1, NULL, '2022-08-21 16:48:38', '2022-08-21 16:48:38');
INSERT INTO `banners` VALUES (52, 'Samsung Galaxy S22 Ultra 5G 256GB', 'images/6302022f572096302022f5720d.png', '/kocoslink', '2022-08-21', '2022-08-21', 0, 1, NULL, '2022-08-21 17:00:17', '2022-08-21 17:00:17');
INSERT INTO `banners` VALUES (53, 'vvv1', 'images/6302052e006956302052e00698.png', '/kocoslink', '2022-08-21', '2022-08-21', 0, 1, NULL, '2022-08-21 17:07:08', '2022-08-21 17:13:04');

-- ----------------------------
-- Table structure for branches
-- ----------------------------
DROP TABLE IF EXISTS `branches`;
CREATE TABLE `branches`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hotline` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `radius` bigint NOT NULL DEFAULT 100,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `branches_branch_code_unique`(`branch_code` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 44 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of branches
-- ----------------------------
INSERT INTO `branches` VALUES (12, 'Công ty Đa Quốc Gia PI NETWORK', 'PI', 'PI', '0978592275', '20.994755', '105.805472', 500, NULL, '2022-07-06 15:26:45', NULL);
INSERT INTO `branches` VALUES (16, 'FPT', 'FP', 'FPT POLYTITECHNIC', '+84 329766455', '21.049304', '105.735818', 500, '2022-06-07 21:33:21', '2022-07-06 15:23:53', NULL);
INSERT INTO `branches` VALUES (17, 'GZONE', 'GZ', 'GZONE', '+84 329766455', '21.0313', '105.8516', 500, '2022-06-07 21:33:00', '2022-06-07 21:33:13', NULL);
INSERT INTO `branches` VALUES (36, 'TOPCV', 'CV', 'TOPCV', '+84 329766455', '21.0012507', '105.7938183', 500, NULL, NULL, NULL);
INSERT INTO `branches` VALUES (41, 'GOOGLE INC', 'GG', 'Mountain View, California, Hoa Kỳ', '+84 329766455', '1.4', '20', 500, '2022-07-02 17:43:54', '2022-07-02 17:43:54', NULL);
INSERT INTO `branches` VALUES (42, 'TCV1020', 'asdsd', 'ha noi', '1900 11', '20.994755', '105.7493806', 200, NULL, '2022-08-17 12:10:53', '2022-08-21 14:09:58');
INSERT INTO `branches` VALUES (43, 'Chi nhánh Cầu giấy', 'CMB42', 'Quản lý công ty\r\nQuản lý công ty của bạn', '0321455478', '20.994755', '105.7493806', 200, NULL, '2022-08-17 13:12:51', '2022-08-17 13:12:51');

-- ----------------------------
-- Table structure for companies
-- ----------------------------
DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotline` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fanpage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_quater` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of companies
-- ----------------------------
INSERT INTO `companies` VALUES (1, 'Camel', '1900.1286', 'camel@gmail.vn', '123453', 'Công ty vip nhất hành tinh', 'camel.vn', 'facebook.com/camel', 'Hà', '2022-07-06 15:32:13', '2022-08-19 20:18:12');

-- ----------------------------
-- Table structure for departments
-- ----------------------------
DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of departments
-- ----------------------------
INSERT INTO `departments` VALUES (1, 'Phòng kế toán', 'abc', '2022-08-21 14:13:43', NULL, NULL, 2);
INSERT INTO `departments` VALUES (2, 'Phòng kinh doanh', 'xyz', '2022-08-21 14:13:43', NULL, NULL, 3);
INSERT INTO `departments` VALUES (3, 'Phòng maketing', 'aaa', '2022-08-21 14:13:43', NULL, NULL, NULL);
INSERT INTO `departments` VALUES (4, 'Phòng hành nhân sự', 'bbb', '2022-08-21 14:13:43', NULL, NULL, NULL);
INSERT INTO `departments` VALUES (5, 'Phòng Tech', '', NULL, '2022-07-29 00:55:37', '2022-07-29 00:55:37', NULL);

-- ----------------------------
-- Table structure for employee_leave_permissions
-- ----------------------------
DROP TABLE IF EXISTS `employee_leave_permissions`;
CREATE TABLE `employee_leave_permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `employee_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of employee_leave_permissions
-- ----------------------------
INSERT INTO `employee_leave_permissions` VALUES (1, '2022-08-07', '2022-08-25', 17, '2022-08-07 04:10:09', '2022-08-07 04:10:09');
INSERT INTO `employee_leave_permissions` VALUES (2, '2022-08-07', '2022-08-19', 17, '2022-08-07 04:18:24', '2022-08-07 04:18:24');
INSERT INTO `employee_leave_permissions` VALUES (3, '2022-08-07', '2022-08-13', 17, '2022-08-07 09:49:34', '2022-08-07 09:49:34');
INSERT INTO `employee_leave_permissions` VALUES (4, '2022-08-11', '2022-08-11', 17, '2022-08-07 09:53:50', '2022-08-07 09:53:50');
INSERT INTO `employee_leave_permissions` VALUES (5, '2022-08-08', '2022-08-10', 17, '2022-08-08 08:48:55', '2022-08-08 08:48:55');
INSERT INTO `employee_leave_permissions` VALUES (6, '2022-08-09', '2022-08-10', 17, '2022-08-09 02:22:28', '2022-08-09 02:22:28');
INSERT INTO `employee_leave_permissions` VALUES (7, '2022-08-09', '2022-08-09', 17, '2022-08-09 02:25:23', '2022-08-09 02:25:23');
INSERT INTO `employee_leave_permissions` VALUES (8, '2022-08-09', '2022-08-24', 17, '2022-08-09 08:48:18', '2022-08-09 08:48:18');
INSERT INTO `employee_leave_permissions` VALUES (9, '2022-08-16', '2022-08-17', 17, '2022-08-09 08:49:48', '2022-08-09 08:49:48');
INSERT INTO `employee_leave_permissions` VALUES (10, '2022-08-09', '2022-08-09', 13, '2022-08-09 20:25:35', '2022-08-09 20:25:35');
INSERT INTO `employee_leave_permissions` VALUES (11, '2022-08-18', '2022-08-20', 17, '2022-08-09 20:31:33', '2022-08-09 20:31:33');
INSERT INTO `employee_leave_permissions` VALUES (12, '2022-08-09', '2022-08-11', 17, '2022-08-09 22:03:48', '2022-08-09 22:03:48');
INSERT INTO `employee_leave_permissions` VALUES (13, '2022-08-16', '2022-08-18', 17, '2022-08-09 22:27:25', '2022-08-09 22:27:25');
INSERT INTO `employee_leave_permissions` VALUES (14, '2022-08-13', '2022-08-13', 103, '2022-08-13 16:40:23', '2022-08-13 16:40:23');

-- ----------------------------
-- Table structure for employee_position_logs
-- ----------------------------
DROP TABLE IF EXISTS `employee_position_logs`;
CREATE TABLE `employee_position_logs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` bigint NOT NULL,
  `from_position_id` bigint NOT NULL,
  `to_position_id` bigint NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of employee_position_logs
-- ----------------------------

-- ----------------------------
-- Table structure for employee_positions
-- ----------------------------
DROP TABLE IF EXISTS `employee_positions`;
CREATE TABLE `employee_positions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` bigint NOT NULL,
  `position_id` bigint NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of employee_positions
-- ----------------------------
INSERT INTO `employee_positions` VALUES (1, 114, 1, NULL, NULL, NULL);
INSERT INTO `employee_positions` VALUES (2, 114, 2, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `employee_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` bigint NOT NULL DEFAULT 0,
  `hash_last_checkin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `personal_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gender` tinyint NOT NULL,
  `status` tinyint NOT NULL DEFAULT 1,
  `position_id` bigint NOT NULL,
  `branch_id` bigint NOT NULL,
  `is_checked` tinyint NOT NULL DEFAULT 1,
  `type_avatar` tinyint NOT NULL DEFAULT 1,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fcm_token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_confirm_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_confirm_token_expired_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `birth_day` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `employees_email_unique`(`email` ASC) USING BTREE,
  UNIQUE INDEX `employees_employee_code_unique`(`employee_code` ASC) USING BTREE,
  INDEX `employees_fullname_index`(`fullname` ASC) USING BTREE,
  INDEX `employees_position_id_index`(`position_id` ASC) USING BTREE,
  INDEX `employees_branch_id_index`(`branch_id` ASC) USING BTREE,
  INDEX `employees_hash_last_checkin_index`(`hash_last_checkin` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 130 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES (1, 'Định Võ', '$2y$10$DvBBiCmcGSxnMDnI9FGfnO/bnpQgBktBVtvBJxUc8IVe/G9iZm3wu', 'vodinh2000ht@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucrpJU92IDgDkrTT8aYebkbhLCmL_mFNsMfp5WqR5w=s96-c', '+84 329766459', 'CM01', 0, 'aa9a1f69ff3c7802ba29e39c31e04cf7', 'dinhvv@topcv.vn', 1, 2, 3, 12, 1, 0, NULL, 'AVBdN4g01CRN8f0QvKQzyiNuXoJ99RMpcrx66BM1XfLs6Q2qbWnyT9U34iRT', 'evVthm1nXvMi7-gLI0qOZT:APA91bEtrGi6NH4A-AfcfdhxK2Cy0RWJgOd_nEGzcINw0dKMexEkCxE2BYd4NYJ5rCi9rA1QBSgi5YywyKKtCv4Slxz4xqfgzhgKy8KfPyFB0f0s5YWYyMBKJh0PA4NFmJGzQxYXqQQr', NULL, '2022-08-21 20:07:11', '2022-08-21 16:32:09', NULL, '2022-05-05 13:24:29', NULL, NULL, '2000-08-21');
INSERT INTO `employees` VALUES (5, 'Vu Le Huy Hoang (FPL K16)', '$2y$10$h3/t3yrYrM5Fav5ucJeXKeqAGcqLTEfhT4W89KxOMOD31JgcQHTCG', 'hoangvlhph13091@fpt.edu.vn', 'https://lh3.googleusercontent.com/a-/AFdZucrtu7kCYwVhSmJGt-WTuQe0DO5J53Ti1qcclAA2=s96-c', NULL, 'CM000L', 0, NULL, 'vivianne33@example.org', 1, 2, 1, 12, 1, 0, NULL, '3hZEOX1gASQ0Cslo5QdvJMfvG2UQ3fxx97QD3lvA9oZ3hfL97gHAb357zkep', 'cm0EGRE43K7LKMHxtlttsf:APA91bG5U6lPpjq-p8jAv3DT1rtBj7ZOsXAeO_NoOM9hLIWVui5ietGfhgD9ciQg2XZbIeozMk8yxEEpzqmsW--qotzZ4hGtlQtp4WVaO84ByMNjgXrvuPV1DYQhlTmpnRaZCUYs8uc2', NULL, '2022-08-21 20:07:11', '2022-08-21 20:07:11', NULL, '2022-05-05 13:34:48', NULL, NULL, '2000-08-21');
INSERT INTO `employees` VALUES (13, 'Nguyen Van Dat PH 1 3 0 1 1', '$2y$10$xFBj4qZuBg4qoRcDSMgowuNL2bi7w9PJKyrHZ4d6SpUoI3Cwb64PW', 'datnvph13011@fpt.edu.vn', 'https://lh3.googleusercontent.com/a-/AFdZucoyqowYu8tfc40hyYlU-FG5VcOOIH8u8qFdjwOs=s96-c', '0978592275', 'CM000B', 0, NULL, 'datnvph13011@fpt.edu.vn', 1, 2, 1, 12, 1, 1, NULL, 'XCfrgxCUp6dcq8H1RPxD8BMiJCSHmkcvxy6Sjzmqp6iCt5Vg71kx1CoTboUh', 'er3EkfveE6wWk7ZvoBOlvJ:APA91bHqn71ZvxImSggf6mfFnJip8lG9bbMoGCje6m7KWy68g8qVCVWU9miX304NZVLiiZ0B5m8iw9XyaUwBIjH7ZlMhLJR2BFdYvMzUF9UkzblDbsC_f0qSTHySbWajLdYJXlM9H0Cp', NULL, '2022-08-21 20:07:11', '2022-08-21 20:07:11', NULL, '2022-07-06 08:25:14', 'cd0a48d9cc1696f6fc81d12668f0e5183ec94ca184955b83daf3b2c9dd7e667e', NULL, '2000-08-21');
INSERT INTO `employees` VALUES (14, 'Tùng', '$2y$10$h3/t3yrYrM5Fav5ucJeXKeqAGcqLTEfhT4W89KxOMOD31JgcQHTCG', 'tungthph07714@fpt.edu.vn', NULL, '+84 329766459', 'FPTPOLY123', 0, NULL, NULL, 1, 2, 1, 12, 1, 1, NULL, 'W2dUdkSHQqTg9qRnYkQCfocAHK4JXuIWjvxM9DvtXkEaEwkmi7We6NK8h1Nt', 'fHaK5BpwXB3B7hj8bwDWHD:APA91bENC5ux9MbbUOxNo1ftvN5iCYWuWYkcvC1_SxMmisp83yyCI5J3fKD5-O8SHeU53Ln2gK4UhfqwR2dgCaQK6z1LOY1cXtAibITK1gZBrAN7YesPY9yppehbiUm4xjQn5c-bWPwS', NULL, '2022-08-21 20:07:11', '2022-08-21 09:59:27', NULL, '2022-06-11 12:09:11', NULL, NULL, '2000-08-21');
INSERT INTO `employees` VALUES (17, 'Tiến Trần', '$2y$10$nInYTmuZzQWoGf0ky8PVOeDvjXAV.SeSkZgoJ1xui4negNq0F3eru', 'trantien@gzone.vn', 'avatars/ToqHvG1vXq9YHhiMtFwcmIDjJzC6CbJOWdmMxYiw.png', '+84329866459', 'FPT1111', 0, 'd379954d511e795b37fb26d93622d898', 'trantien@gzone.vn', 1, 2, 1, 12, 1, 1, NULL, '5xYQf8BlUevVyVWJPd8FgSuoEhk7utQSnQRaReKik0uwIkPaPYxMDydujJDk', 'e_NUPCtqd0P-IDApRLsmw-:APA91bFu0flS6bbr-evzQmcujxZZ1t46on1BgZ-_QvwHpTpH0UHihIwgieU1ApVHLIxhyfxDxfxDVSKEELnmbGhyiXxQfOr_UoGVl_49HGz0eWDnp3BKMj7yQPi4R3JIm1fAcMIMkpAz', NULL, '2022-08-21 20:07:11', '2022-08-21 13:06:07', NULL, '2022-06-11 17:40:53', NULL, NULL, '2000-08-21');
INSERT INTO `employees` VALUES (103, 'Trần Trọng Anh PH 1 3 0 2 5', '$2y$10$h3/t3yrYrM5Fav5ucJeXKeqAGcqLTEfhT4W89KxOMOD31JgcQHTCG', 'anhttph13025@fpt.edu.vn', 'https://lh3.googleusercontent.com/a-/AFdZucruY0lYzr6MqakV7M9hIghtfMBaULSN9cVE53PM=s96-c', '+84329766459', 'CM010P', 0, NULL, NULL, 1, 2, 1, 12, 1, 0, NULL, 'wtm7TNjJrasAI5OQpE3UCCl2losKn0Hn1c1prlOSC1RFUoaaAxipatQO8aRp', 'fwkGPfsNMTYyY6zY44p7jA:APA91bGvrjVBELnPHChArxEaCwcf893ePQsDEmtvXwjIe-v6UUrb2VtjCRFfweabH98_iwDx6vjrdF5H9y9ok7HA2yQzdeWGcUCG0q3gV_eGKuN4OokG4ymnFlmg8bRGjcaJLZiccKw2', NULL, '2022-08-21 20:07:11', '2022-08-21 20:07:11', NULL, '2022-06-11 17:40:53', NULL, NULL, '2000-08-21');
INSERT INTO `employees` VALUES (120, 'Võ Văn Định', '$2y$10$4hR.vBpFLjwTSvG2sPUh.ureS1V8c5E6TrxWb2JrzrgtJ562cW1te', 'vodinh1234@gmail.com', 'avatars/t0MUon2Xp3xaSa8MlyOkcERcZbefTkN9iDbSZdYm.png', '+84329766459', '12-vo-van-dinh', 0, NULL, NULL, 1, 2, 1, 12, 1, 1, NULL, NULL, NULL, NULL, '2022-08-21 20:07:11', '2022-08-21 20:07:11', NULL, '2022-07-06 15:37:53', NULL, NULL, '2000-08-21');
INSERT INTO `employees` VALUES (121, 'Dương123', '$2y$10$tsLqXS7Pkgv1c9Few4tE1.6c4pwJqKNk8YahtE3h6rMa8kQ1roo5W', 'duonghvph29740@fpt.edu.vn', 'avatars/AFMMbR3qSvRmRRAhzX3NWQoScJK88UePMqNZDU4a.jpg', '+84329766459', 'CF111', 0, NULL, 'duonghvph29740@fpt.edu.vn', 1, 2, 1, 12, 1, 1, NULL, 'kWtACACdVN7w2Xt67rYo9AH1TdNo90X8EdK2oSyfg5SXeUGfRAZoAqPBRdBu', 'ej7jesuex_huSERwU5CQWf:APA91bG2--DV_nWjN3LYo_Dk4wTG9R59qZvPC3DAVc4bQHRiVfgQaBNP3vnvVRyBIBEiwEA8Kygkv9I0Q6seAlbQcFej9I8X1IDg1Q9CM-LHJrFo21aEllA9QOAAqpd_YH19Lr8n35hc', NULL, '2022-08-21 20:07:11', '2022-08-21 20:07:11', NULL, '2022-07-06 15:37:53', NULL, NULL, '2000-08-21');
INSERT INTO `employees` VALUES (122, 'Mướp Yangho', '$2y$10$FRz26.s0IXyxhKHjSJA8BOe8dzkDkl4No7XekNcNXnbmGu5pxUty.', 'duonghv@fpt.com.vn', 'avatars/TrVAMvJOa3EIrzgBoiOOQ6KsvLyDQLoUczl8LYpE.png', '+84 329766459', '12-muop-yangho', 0, NULL, NULL, 1, 2, 1, 12, 1, 1, NULL, NULL, NULL, '2022-08-12 01:17:42', '2022-08-21 20:07:11', '2022-08-21 20:07:11', NULL, '2022-08-12 01:07:46', NULL, NULL, '2000-08-21');
INSERT INTO `employees` VALUES (123, 'Mướp dịu dàng', '$2y$10$l/TnNRWBCQ9f6v7WMZluMeOpN2hSuCdYhK.wzqeP6Em0ujvQBrwQO', 'vanduong1qqqq@gmail.com111', 'avatars/mC0mUO1RTkuACTuR9TL5zvlriiKNy4sGiZhD48JI.png', '+84 329766459', '12-muop-diu-dang', 0, NULL, NULL, 1, 2, 1, 12, 1, 1, NULL, NULL, NULL, '2022-08-12 01:17:23', '2022-08-21 20:07:11', '2022-08-21 20:07:11', NULL, '2022-08-12 01:10:42', NULL, NULL, '2000-08-21');
INSERT INTO `employees` VALUES (124, 'Dev vui tính', '$2y$10$oAThS.qspzkh6hDzla4Jru9rGF.grMKZMSCJe7vZZon2YOXHNVIoq', 'admi12312awdawdn@gmail.com', 'avatars/oVXhm13IPeKHD6c2uucIPpFD96tg2wIszJRzQatH.png', '+84 329766459', '12-dev-vui-tinh', 0, NULL, NULL, 1, 2, 1, 12, 1, 1, NULL, NULL, NULL, '2022-08-12 01:17:17', '2022-08-21 20:07:11', '2022-08-21 20:07:11', NULL, '2022-08-12 01:11:58', NULL, NULL, '2000-08-21');
INSERT INTO `employees` VALUES (125, 'Niu Ngọc Meo', '$2y$10$ekVwG6/Kt.srI7oe/0Kqke/EdXZcu3tQAQeWGUiYFD4nwjs0FqlYi', 'admindawydgw@gmail.com', 'avatars/vB1GG5RY8HneNNT3cqipoWc3ZKaEeb9BsfkQDwvF.png', '+84 329766459', '12-niu-ngoc-meo', 0, NULL, NULL, 1, 2, 1, 12, 1, 1, NULL, NULL, NULL, '2022-08-12 01:17:36', '2022-08-21 20:07:11', '2022-08-21 20:07:11', NULL, '2022-08-12 01:13:18', NULL, NULL, '2000-08-21');
INSERT INTO `employees` VALUES (126, 'DEV', '$2y$10$sYuKIN/zCxsHzVbeF8LpXuTIldZxMUE1UOuseCoOOc2Ujx8v7Jje2', 'vanduong1wdwdawd@gmail.com111', 'avatars/s6lvZLaTFkcUvykv1w4fFG32dSFpj4nPputC8Lv1.jpg', '+84 329766459', '12-dev', 0, NULL, NULL, 1, 2, 1, 12, 1, 1, NULL, NULL, NULL, '2022-08-20 20:18:05', '2022-08-21 20:07:11', '2022-08-21 20:07:11', NULL, '2022-08-13 23:17:07', NULL, NULL, '2000-08-21');
INSERT INTO `employees` VALUES (128, 'nguyen van dat', '$2y$10$aRLWly5e/Ie1w0fhMP/Jj.qiLdQDWn/7iN/Zcyu4j91s5BmMZC806', 'vandat@gmail.com', 'avatars/uiO4qyp19m52Nrn9pPfRj0SjCGHuikqKpSxoD7lZ.zip', '+84 978592725', '12-nguyen-van-dat', 0, NULL, NULL, 1, 1, 1, 12, 1, 1, NULL, NULL, NULL, NULL, '2022-08-21 20:07:11', '2022-08-21 20:07:11', NULL, '2022-08-20 20:07:11', NULL, NULL, '2000-08-21');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for holiday_schedules
-- ----------------------------
DROP TABLE IF EXISTS `holiday_schedules`;
CREATE TABLE `holiday_schedules`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of holiday_schedules
-- ----------------------------
INSERT INTO `holiday_schedules` VALUES (1, 'Samsung Galaxy S22 Ultra 5G 256GB', '2022-07-01', '2022-07-31', NULL, '2022-07-03 20:56:28', '2022-07-03 20:56:28');
INSERT INTO `holiday_schedules` VALUES (2, 'Ngày quốc tế phụ nữ', '2022-08-03', '2022-08-03', NULL, '2022-07-03 21:03:21', '2022-07-03 21:03:21');
INSERT INTO `holiday_schedules` VALUES (3, 'Ngày giải phóng miền nam', '2022-08-11', '2022-08-19', NULL, '2022-07-03 21:06:37', '2022-07-03 21:06:37');
INSERT INTO `holiday_schedules` VALUES (4, '@#@#@#', '2022-08-23', '2022-09-20', NULL, '2022-08-21 00:00:26', '2022-08-21 00:00:26');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2022_03_16_131623_alter_table_users_add_token_verify_email', 1);
INSERT INTO `migrations` VALUES (6, '2022_03_19_094426_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (7, '2022_04_01_060101_alter_table_users_add_column_status', 1);
INSERT INTO `migrations` VALUES (8, '2022_04_10_044952_alter_table_user_add_collumn_type_image', 1);
INSERT INTO `migrations` VALUES (9, '2022_06_06_233039_create_employees_table', 1);
INSERT INTO `migrations` VALUES (10, '2022_06_06_234609_create_timekeeps_table', 1);
INSERT INTO `migrations` VALUES (11, '2022_06_06_235229_create_timekeep_details_table', 1);
INSERT INTO `migrations` VALUES (12, '2022_06_07_000203_create_timekeep_logs_table', 1);
INSERT INTO `migrations` VALUES (13, '2022_06_07_000458_create_branches_table', 1);
INSERT INTO `migrations` VALUES (14, '2022_06_07_000521_create_networks_table', 1);
INSERT INTO `migrations` VALUES (15, '2022_06_07_093420_create_table_branch', 1);
INSERT INTO `migrations` VALUES (16, '2022_06_07_093909_create_confix_company', 1);
INSERT INTO `migrations` VALUES (17, '2022_06_08_213348_alter_table_timekeep_details_add_source_column', 1);
INSERT INTO `migrations` VALUES (18, '2022_06_08_213411_alter_table_timekeep_logs_add_source_column', 1);
INSERT INTO `migrations` VALUES (19, '2022_06_09_213936_alter_table_employees_add_address_column', 1);
INSERT INTO `migrations` VALUES (20, '2022_06_18_180547_create_attributes_table', 1);
INSERT INTO `migrations` VALUES (21, '2022_06_18_180721_create_employee_attributes_table', 1);
INSERT INTO `migrations` VALUES (22, '2022_06_18_181317_create_employee_positions_table', 1);
INSERT INTO `migrations` VALUES (23, '2022_06_18_181332_create_positions_table', 1);
INSERT INTO `migrations` VALUES (24, '2022_06_18_181351_create_departments_table', 1);
INSERT INTO `migrations` VALUES (25, '2022_06_18_181418_create_employee_position_logs_table', 1);
INSERT INTO `migrations` VALUES (26, '2022_06_18_221548_alter_employee_attributes_table_rename_table', 1);
INSERT INTO `migrations` VALUES (27, '2022_06_21_211209_create_work_schedules_table', 1);
INSERT INTO `migrations` VALUES (28, '2022_06_21_213106_create_work_shifts_table', 1);
INSERT INTO `migrations` VALUES (29, '2022_06_23_193341_alter_table_work_schedules_add_name_column', 1);
INSERT INTO `migrations` VALUES (30, '2022_06_23_232843_create_banner_table', 1);
INSERT INTO `migrations` VALUES (31, '2022_06_30_102717_add_status_column_attribute_employees_table', 1);
INSERT INTO `migrations` VALUES (32, '2022_06_30_225655_alter_department_table_add_parent_id_column', 1);
INSERT INTO `migrations` VALUES (33, '2022_07_01_180827_alter_timekeeps_table_add_type_and_worktime_column', 1);
INSERT INTO `migrations` VALUES (34, '2022_07_02_123713_alter_employee_table_add_fcm_token_column', 1);
INSERT INTO `migrations` VALUES (35, '2022_07_03_121729_create_holiday_schedules_table', 1);
INSERT INTO `migrations` VALUES (36, '2022_07_03_235609_alter_work_schedules_table_add_mutipale_actual_workdays_column', 1);
INSERT INTO `migrations` VALUES (37, '2022_07_07_230120_create_single_types_table', 1);
INSERT INTO `migrations` VALUES (38, '2022_07_07_231533_create_approvers_table', 1);
INSERT INTO `migrations` VALUES (39, '2022_07_07_232210_alter_employees_table_add_point_column', 1);
INSERT INTO `migrations` VALUES (40, '2022_07_08_234329_create_posts_table', 1);
INSERT INTO `migrations` VALUES (41, '2022_07_08_234414_create_post_categories_table', 1);
INSERT INTO `migrations` VALUES (42, '2022_07_10_164438_alter_positions_table_add_is_leader_column', 1);
INSERT INTO `migrations` VALUES (43, '2022_07_19_001053_create_request_detail_table', 1);
INSERT INTO `migrations` VALUES (44, '2022_07_19_001619_create_requests_table', 1);
INSERT INTO `migrations` VALUES (45, '2022_07_19_143220_alter_requests_single_types_table', 1);
INSERT INTO `migrations` VALUES (46, '2022_07_24_205507_create_request_approve_histories_table', 1);
INSERT INTO `migrations` VALUES (47, '2022_07_24_232037_alter_request_detail_table_add_image_column', 1);
INSERT INTO `migrations` VALUES (49, '2022_07_27_221317_alter_branches_table_add_name_column', 2);
INSERT INTO `migrations` VALUES (50, '2022_07_27_222627_alter_confix_company_table_rename_table', 3);
INSERT INTO `migrations` VALUES (53, '2022_07_29_011038_alter_work_schedule_rename_check_in_column', 4);
INSERT INTO `migrations` VALUES (54, '2022_07_29_220308_alter_request_table_drop_single_type_column', 5);
INSERT INTO `migrations` VALUES (55, '2022_07_29_235358_create_notifications_table', 6);
INSERT INTO `migrations` VALUES (56, '2022_08_02_211209_employee_leave_permissions', 7);
INSERT INTO `migrations` VALUES (57, '2022_08_16_011207_alter_posts_table_add_slug_column', 8);
INSERT INTO `migrations` VALUES (58, '2022_08_20_015359_alter_employee_table_add_hash_last_checkin_column', 9);
INSERT INTO `migrations` VALUES (59, '2022_08_21_124324_alter_post_table_change_data_type_column', 10);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\Employee', 1);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\Employee', 5);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\Employee', 13);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\Employee', 17);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\Employee', 103);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\Employee', 121);

-- ----------------------------
-- Table structure for networks
-- ----------------------------
DROP TABLE IF EXISTS `networks`;
CREATE TABLE `networks`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch_id` bigint NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `wifi_ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `networks_branch_id_index`(`branch_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of networks
-- ----------------------------
INSERT INTO `networks` VALUES (1, 16, 'Wifi 1', '113.185.41.159', 1, NULL, '2022-06-07 22:07:31', '2022-06-07 22:07:42');
INSERT INTO `networks` VALUES (2, 16, 'Wifi 2', '127.0.0.1', 1, NULL, '2022-06-07 22:07:37', '2022-06-07 22:07:46');
INSERT INTO `networks` VALUES (3, 16, 'Wifi 3', '27.67.28.155', 1, NULL, NULL, NULL);
INSERT INTO `networks` VALUES (4, 16, 'Wifi 4', '113.178.46.120', 1, NULL, NULL, NULL);
INSERT INTO `networks` VALUES (5, 16, 'Wifi 5', '14.160.24.59', 1, NULL, NULL, NULL);
INSERT INTO `networks` VALUES (6, 36, 'Wifi 6', '14.232.245.144', 1, NULL, NULL, NULL);
INSERT INTO `networks` VALUES (7, 16, 'Wifi 7', '222.252.28.187', 1, NULL, '2022-06-10 16:21:46', '2022-06-10 16:21:54');
INSERT INTO `networks` VALUES (8, 16, 'Wifi 8', '172.20.0.1', 1, NULL, '2022-06-10 17:22:13', '2022-06-10 17:22:25');
INSERT INTO `networks` VALUES (9, 16, 'Wifi 9', '14.248.94.184', 1, NULL, '2022-06-10 23:04:41', '2022-06-10 23:04:45');
INSERT INTO `networks` VALUES (10, 16, 'Wifi 10', '113.185.53.12', 1, NULL, '2022-06-10 23:18:36', '2022-06-26 09:10:22');
INSERT INTO `networks` VALUES (11, 16, 'Wifi 11', '113.185.43.183', 1, NULL, '2022-06-10 23:04:41', '2022-06-10 23:04:45');
INSERT INTO `networks` VALUES (12, 16, 'test', '113.185.43.1866', 1, NULL, '2022-06-24 01:24:40', '2022-06-24 01:24:40');
INSERT INTO `networks` VALUES (13, 16, 'test1', '118.70.190.141', 1, NULL, NULL, NULL);
INSERT INTO `networks` VALUES (14, 2, 'test2', '113.185.43.1899', 1, NULL, '2022-06-26 00:44:06', '2022-06-26 00:44:06');
INSERT INTO `networks` VALUES (15, 2, 'test3', '113.185.43.1893', 1, NULL, '2022-06-26 09:10:22', '2022-06-26 09:10:22');
INSERT INTO `networks` VALUES (16, 12, 'abc', '14.232.245.144', 1, NULL, '2022-06-28 15:12:39', '2022-06-28 15:12:39');
INSERT INTO `networks` VALUES (17, 12, 'abc', '14.232.245.144', 1, NULL, '2022-06-28 15:12:46', '2022-06-28 15:12:46');
INSERT INTO `networks` VALUES (18, 12, 'abc', '14.232.245.144', 1, NULL, '2022-06-28 15:12:48', '2022-06-28 15:12:48');
INSERT INTO `networks` VALUES (19, 12, 'abc', '14.232.245.144', 1, NULL, '2022-06-28 15:12:49', '2022-06-28 15:12:49');
INSERT INTO `networks` VALUES (34, 2, 'aaa', '14.232.245.144', 1, NULL, '2022-06-28 15:14:02', '2022-06-28 15:14:02');
INSERT INTO `networks` VALUES (35, 2, 'aaa', '14.232.245.144', 1, NULL, '2022-06-28 15:14:03', '2022-06-28 15:14:03');
INSERT INTO `networks` VALUES (36, 2, 'aaa', '14.232.245.144', 1, NULL, '2022-06-28 15:14:04', '2022-06-28 15:14:04');
INSERT INTO `networks` VALUES (54, 12, 'dfads', '113.185.43.1866', 1, NULL, '2022-07-02 00:40:42', '2022-07-02 00:40:42');
INSERT INTO `networks` VALUES (56, 16, 'Vũ Hoàng', '127.0.0.1', 0, NULL, '2022-07-02 01:00:50', '2022-07-02 01:00:50');
INSERT INTO `networks` VALUES (57, 17, 'Test', '118.70.48.14', 1, NULL, '2022-07-02 17:42:10', '2022-07-02 17:42:10');
INSERT INTO `networks` VALUES (58, 12, 'Wifi nhà trồng được', '222.252.28.187', 1, NULL, '2022-07-06 14:59:19', '2022-07-06 14:59:19');

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `employee_id` bigint NOT NULL,
  `domain` tinyint NOT NULL COMMENT 'Loại thông báo bên quản trị hay nhân viên',
  `type` tinyint NOT NULL COMMENT 'Loại thông báo cho cá nhân hay thông báo tổng',
  `watched` tinyint NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notifications
-- ----------------------------
INSERT INTO `notifications` VALUES (1, 'Bạn có đơn cần phê duyệt', 'Nhân viên Định Võ vừa tạo đơn Đơn sửa chấm công', 'application/request-detail/17', 17, 2, 2, 1, '2022-08-15 22:52:46', '2022-08-21 13:55:04');
INSERT INTO `notifications` VALUES (2, 'Bạn có đơn cần phê duyệt', 'Nhân viên Định Võ vừa tạo đơn Đơn sửa chấm công', 'application/request-detail/17', 103, 2, 2, 1, '2022-08-15 22:52:46', '2022-08-15 22:53:29');
INSERT INTO `notifications` VALUES (3, 'Đơn của bạn đã được phê duyệt', 'Đơn sửa chấm công của bạn đã được duyệt bởi Trần Trọng Anh PH 1 3 0 2 5', '/more/don-tu-cua-ban', 1, 1, 2, 1, '2022-08-16 01:24:10', '2022-08-16 10:18:34');
INSERT INTO `notifications` VALUES (4, 'Đơn của bạn đã được phê duyệt', 'Đơn sửa chấm công của bạn đã được duyệt bởi Trần Trọng Anh PH 1 3 0 2 5', '/more/don-tu-cua-ban', 17, 1, 2, 0, '2022-08-16 01:27:19', '2022-08-16 01:27:19');
INSERT INTO `notifications` VALUES (5, 'Bạn có đơn cần phê duyệt', 'Nhân viên Tiến Trần vừa tạo đơn Đơn sửa chấm công', 'application/request-detail/18', 17, 2, 2, 1, '2022-08-16 01:32:49', '2022-08-21 13:55:04');
INSERT INTO `notifications` VALUES (6, 'Bạn có đơn cần phê duyệt', 'Nhân viên Tiến Trần vừa tạo đơn Đơn sửa chấm công', 'application/request-detail/18', 103, 2, 2, 1, '2022-08-16 01:32:49', '2022-08-16 01:33:02');
INSERT INTO `notifications` VALUES (7, 'Đơn của bạn đã được phê duyệt', 'Đơn sửa chấm công của bạn đã được duyệt bởi Trần Trọng Anh PH 1 3 0 2 5', '/more/don-tu-cua-ban', 17, 1, 2, 1, '2022-08-16 01:33:53', '2022-08-18 00:00:32');
INSERT INTO `notifications` VALUES (8, 'Đơn của bạn đã được phê duyệt', 'Đơn nghỉ không lương của bạn đã được duyệt bởi Định Võ', '/more/don-tu-cua-ban', 17, 1, 2, 0, '2022-08-16 02:19:57', '2022-08-16 02:19:57');
INSERT INTO `notifications` VALUES (9, 'Đơn của bạn đã được phê duyệt', 'Đơn nghỉ không lương của bạn đã được duyệt bởi Định Võ', '/more/don-tu-cua-ban', 17, 1, 2, 0, '2022-08-16 11:08:28', '2022-08-16 11:08:28');
INSERT INTO `notifications` VALUES (10, 'Đơn của bạn đã được phê duyệt', 'Đơn làm thêm giờ của bạn đã được duyệt bởi Định Võ', '/more/don-tu-cua-ban', 17, 1, 2, 0, '2022-08-17 11:30:07', '2022-08-17 11:30:07');
INSERT INTO `notifications` VALUES (11, 'Đơn của bạn đã được phê duyệt', 'Đơn nghỉ không lương của bạn đã được duyệt bởi Định Võ', '/more/don-tu-cua-ban', 17, 1, 2, 0, '2022-08-17 11:30:16', '2022-08-17 11:30:16');
INSERT INTO `notifications` VALUES (12, 'Đơn của bạn đã được phê duyệt', 'Đơn nghỉ không lương của bạn đã được duyệt bởi Định Võ', '/more/don-tu-cua-ban', 17, 1, 2, 0, '2022-08-17 11:30:26', '2022-08-17 11:30:26');
INSERT INTO `notifications` VALUES (13, 'Đơn của bạn đã được phê duyệt', 'Đơn nghỉ không lương của bạn đã được duyệt bởi Định Võ', '/more/don-tu-cua-ban', 17, 1, 2, 1, '2022-08-17 11:30:34', '2022-08-21 12:44:05');
INSERT INTO `notifications` VALUES (14, 'Đơn của bạn đã được phê duyệt', 'Đơn nghỉ không lương của bạn đã được duyệt bởi Định Võ', '/more/don-tu-cua-ban', 17, 1, 2, 1, '2022-08-17 11:30:45', '2022-08-19 13:24:08');
INSERT INTO `notifications` VALUES (15, 'Bạn có đơn cần phê duyệt', 'Nhân viên Định Võ vừa tạo đơn Đơn nghỉ không lương', 'application/request-detail/19', 17, 2, 2, 1, '2022-08-17 23:55:07', '2022-08-21 13:55:04');
INSERT INTO `notifications` VALUES (16, 'Bạn có đơn cần phê duyệt', 'Nhân viên Định Võ vừa tạo đơn Đơn nghỉ không lương', 'application/request-detail/19', 103, 2, 2, 0, '2022-08-17 23:55:07', '2022-08-17 23:55:07');
INSERT INTO `notifications` VALUES (17, 'Bạn có đơn cần phê duyệt', 'Nhân viên Định Võ vừa tạo đơn Đơn nghỉ không lương', 'application/request-detail/19', 1, 2, 2, 1, '2022-08-17 23:55:07', '2022-08-19 13:34:36');
INSERT INTO `notifications` VALUES (18, 'Bạn có đơn cần phê duyệt', 'Nhân viên Định Võ vừa tạo đơn Đơn nghỉ không lương', 'application/request-detail/20', 17, 2, 2, 1, '2022-08-17 23:55:39', '2022-08-18 00:15:40');
INSERT INTO `notifications` VALUES (19, 'Bạn có đơn cần phê duyệt', 'Nhân viên Định Võ vừa tạo đơn Đơn nghỉ không lương', 'application/request-detail/20', 103, 2, 2, 0, '2022-08-17 23:55:39', '2022-08-17 23:55:39');
INSERT INTO `notifications` VALUES (20, 'Bạn có đơn cần phê duyệt', 'Nhân viên Định Võ vừa tạo đơn Đơn nghỉ không lương', 'application/request-detail/20', 1, 2, 2, 1, '2022-08-17 23:55:39', '2022-08-19 13:34:33');
INSERT INTO `notifications` VALUES (21, 'Đơn của bạn đã được phê duyệt', 'Đơn nghỉ không lương của bạn đã được duyệt bởi Định Võ', '/more/don-tu-cua-ban', 1, 1, 2, 0, '2022-08-18 16:23:51', '2022-08-18 16:23:51');
INSERT INTO `notifications` VALUES (22, 'Đơn của bạn đã được phê duyệt', 'Đơn nghỉ không lương của bạn đã được duyệt bởi Định Võ', '/more/don-tu-cua-ban', 1, 1, 2, 0, '2022-08-18 16:24:45', '2022-08-18 16:24:45');
INSERT INTO `notifications` VALUES (23, 'Bạn có đơn cần phê duyệt', 'Nhân viên Định Võ vừa tạo đơn Đơn sửa chấm công', 'application/request-detail/21', 17, 2, 2, 1, '2022-08-19 22:38:21', '2022-08-21 13:55:04');
INSERT INTO `notifications` VALUES (24, 'Bạn có đơn cần phê duyệt', 'Nhân viên Định Võ vừa tạo đơn Đơn sửa chấm công', 'application/request-detail/21', 103, 2, 2, 1, '2022-08-19 22:38:21', '2022-08-19 22:39:06');
INSERT INTO `notifications` VALUES (25, 'Đơn của bạn đã được phê duyệt', 'Đơn sửa chấm công của bạn đã được duyệt bởi Trần Trọng Anh PH 1 3 0 2 5', '/more/don-tu-cua-ban', 1, 1, 2, 0, '2022-08-19 22:41:23', '2022-08-19 22:41:23');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'dashboard', 'web', '2022-08-14 23:40:24', '2022-08-14 23:40:24');
INSERT INTO `permissions` VALUES (2, 'timesheet', 'web', '2022-08-14 23:40:24', '2022-08-14 23:40:24');
INSERT INTO `permissions` VALUES (3, 'request', 'web', '2022-08-14 23:40:24', '2022-08-14 23:40:24');
INSERT INTO `permissions` VALUES (4, 'news', 'web', '2022-08-14 23:40:24', '2022-08-14 23:40:24');
INSERT INTO `permissions` VALUES (5, 'setting_checkin', 'web', '2022-08-14 23:40:25', '2022-08-14 23:40:25');
INSERT INTO `permissions` VALUES (6, 'setting_calendar', 'web', '2022-08-14 23:40:25', '2022-08-14 23:40:25');
INSERT INTO `permissions` VALUES (7, 'setting_employee', 'web', '2022-08-14 23:40:25', '2022-08-14 23:40:25');
INSERT INTO `permissions` VALUES (8, 'setting_global', 'web', '2022-08-14 23:40:26', '2022-08-14 23:40:26');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for positions
-- ----------------------------
DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint NOT NULL,
  `is_leader` tinyint NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of positions
-- ----------------------------
INSERT INTO `positions` VALUES (1, 'BM', 5, 0, NULL, '2022-07-29 00:55:38', '2022-07-29 00:55:38');
INSERT INTO `positions` VALUES (2, 'Product Manger', 5, 0, NULL, '2022-07-29 00:55:38', '2022-07-29 00:55:38');
INSERT INTO `positions` VALUES (3, 'Tech Manager', 5, 1, NULL, '2022-07-29 00:55:39', '2022-07-29 00:55:39');

-- ----------------------------
-- Table structure for post_categories
-- ----------------------------
DROP TABLE IF EXISTS `post_categories`;
CREATE TABLE `post_categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_categories
-- ----------------------------
INSERT INTO `post_categories` VALUES (1, 'Tin nội bộ', 'Tin tức nội bộ công ty', NULL, '2022-08-12 13:01:39', '2022-08-12 13:01:40');
INSERT INTO `post_categories` VALUES (2, 'Điểm tuần tháng 8', 'Tin điểm tuần tháng 8', NULL, '2022-08-21 14:02:32', '2022-08-21 14:02:34');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint NOT NULL,
  `branch_id` bigint NULL DEFAULT NULL,
  `employee_id` bigint NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `posts_slug_index`(`slug` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (1, 'Nhà tuyển dụng tuyệt vời', 'nha-tuyen-dung', '<p>Hello, World!</p>', 'posts/yRU0Fc39QKnvoSgkqfTrRROiuI1gPvZLR36nyBdU.jpg', 1, 16, 1, NULL, '2022-08-12 13:02:03', '2022-08-16 01:08:10');
INSERT INTO `posts` VALUES (2, 'Tuyển dụng tháng 10', 'tuyen-dung-thang-10', '<div data-visualcompletion=\"ignore-dynamic\">\r\n<div class=\"ue3kfks5 pw54ja7n uo3d90p7 l82x9zwi a8c37x1j\">\r\n<div class=\"goun2846 mk2mc5f4 ccm00jje s44p3ltw rt8b4zig sk4xxmp2 n8ej3o3l agehan2d rq0escxv j83agx80 buofh1pr g5gj957u i1fnvgqd kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x hpfvmrgz jb3vyjys qt6c0cv9 l9j0dhe7 du4w35lb bp9cbjyn btwxx1t3 dflh9lhu scb9dxdr nnctdnn4\">\r\n<div class=\"goun2846 mk2mc5f4 ccm00jje s44p3ltw rt8b4zig sk4xxmp2 n8ej3o3l agehan2d rq0escxv j83agx80 buofh1pr g5gj957u i1fnvgqd kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x tgvbjcpo hpfvmrgz jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso du4w35lb bp9cbjyn ns4p8fja btwxx1t3 l9j0dhe7\">\r\n<div class=\"gs1a9yip goun2846 mk2mc5f4 ccm00jje s44p3ltw rt8b4zig sk4xxmp2 n8ej3o3l agehan2d rq0escxv j83agx80 cbu4d94t buofh1pr g5gj957u i1fnvgqd kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x tgvbjcpo hpfvmrgz rz4wbd8a a8nywdso l9j0dhe7 du4w35lb rj1gh0hx pybr56ya f10w8fjw\">\r\n<div class=\"\">\r\n<div class=\"j83agx80 cbu4d94t ew0dbk1b irj2b8pg\">\r\n<div class=\"qzhwtbm6 knvmm38d\">\r\n<div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql\">\r\n<div dir=\"auto\">Group thảo luận về Angular (Angular 2, Angular 4, 5, 6, 7, 8, 9, X++) v&agrave; c&aacute;c kỹ thuật lập tr&igrave;nh với Angular.</div>\r\n</div>\r\n<div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle\">\r\n<div dir=\"auto\">TIN TUYỂN DỤNG VUI L&Ograve;NG POST V&Agrave;O Đ&hellip;&nbsp;\r\n<div class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl gpro0wi8 oo9gr5id lrazzd5p\" tabindex=\"0\" role=\"button\">Xem th&ecirc;m</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div data-visualcompletion=\"ignore-dynamic\">\r\n<div class=\"ue3kfks5 pw54ja7n uo3d90p7 l82x9zwi a8c37x1j\">\r\n<div class=\"goun2846 mk2mc5f4 ccm00jje s44p3ltw rt8b4zig sk4xxmp2 n8ej3o3l agehan2d rq0escxv j83agx80 buofh1pr g5gj957u i1fnvgqd kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x hpfvmrgz jb3vyjys qt6c0cv9 l9j0dhe7 du4w35lb bp9cbjyn btwxx1t3 dflh9lhu scb9dxdr nnctdnn4\">\r\n<div class=\"j83agx80 cbu4d94t tvfksri0 aov4n071 bi6gxh9e l9j0dhe7 nqmvxvec\">&nbsp;</div>\r\n<div class=\"goun2846 mk2mc5f4 ccm00jje s44p3ltw rt8b4zig sk4xxmp2 n8ej3o3l agehan2d rq0escxv j83agx80 buofh1pr g5gj957u i1fnvgqd kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x tgvbjcpo hpfvmrgz jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso du4w35lb bp9cbjyn ns4p8fja btwxx1t3 l9j0dhe7\">\r\n<div class=\"gs1a9yip goun2846 mk2mc5f4 ccm00jje s44p3ltw rt8b4zig sk4xxmp2 n8ej3o3l agehan2d rq0escxv j83agx80 cbu4d94t buofh1pr g5gj957u i1fnvgqd kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x tgvbjcpo hpfvmrgz rz4wbd8a a8nywdso l9j0dhe7 du4w35lb rj1gh0hx pybr56ya f10w8fjw\">\r\n<div class=\"\">\r\n<div class=\"j83agx80 cbu4d94t ew0dbk1b irj2b8pg\">\r\n<div class=\"qzhwtbm6 knvmm38d\">\r\n<div class=\"hddg9phg\">C&ocirc;ng khai</div>\r\n</div>\r\n<div class=\"qzhwtbm6 knvmm38d\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql lr9zc1uh a8c37x1j fe6kdd0r mau55g9w c8b282yb keod5gw0 nxhoafnm aigsh9s9 d3f4x2em iv3no6db jq4qci2q a3bd9o3v b1v8xokw m9osqain hzawbc8m\" dir=\"auto\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql lr9zc1uh jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">Bất kỳ ai cũng c&oacute; thể nh&igrave;n thấy mọi người trong nh&oacute;m v&agrave; những g&igrave; họ đăng.</span></span></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div data-visualcompletion=\"ignore-dynamic\">\r\n<div class=\"ue3kfks5 pw54ja7n uo3d90p7 l82x9zwi a8c37x1j\">\r\n<div class=\"goun2846 mk2mc5f4 ccm00jje s44p3ltw rt8b4zig sk4xxmp2 n8ej3o3l agehan2d rq0escxv j83agx80 buofh1pr g5gj957u i1fnvgqd kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x hpfvmrgz jb3vyjys qt6c0cv9 l9j0dhe7 du4w35lb bp9cbjyn btwxx1t3 dflh9lhu scb9dxdr nnctdnn4\">\r\n<div class=\"j83agx80 cbu4d94t tvfksri0 aov4n071 bi6gxh9e l9j0dhe7 nqmvxvec\">&nbsp;</div>\r\n<div class=\"goun2846 mk2mc5f4 ccm00jje s44p3ltw rt8b4zig sk4xxmp2 n8ej3o3l agehan2d rq0escxv j83agx80 buofh1pr g5gj957u i1fnvgqd kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x tgvbjcpo hpfvmrgz jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso du4w35lb bp9cbjyn ns4p8fja btwxx1t3 l9j0dhe7\">\r\n<div class=\"gs1a9yip goun2846 mk2mc5f4 ccm00jje s44p3ltw rt8b4zig sk4xxmp2 n8ej3o3l agehan2d rq0escxv j83agx80 cbu4d94t buofh1pr g5gj957u i1fnvgqd kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x tgvbjcpo hpfvmrgz rz4wbd8a a8nywdso l9j0dhe7 du4w35lb rj1gh0hx pybr56ya f10w8fjw\">\r\n<div class=\"\">\r\n<div class=\"j83agx80 cbu4d94t ew0dbk1b irj2b8pg\">\r\n<div class=\"qzhwtbm6 knvmm38d\">\r\n<div class=\"hddg9phg\">Hiển thị</div>\r\n</div>\r\n<div class=\"qzhwtbm6 knvmm38d\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql lr9zc1uh a8c37x1j fe6kdd0r mau55g9w c8b282yb keod5gw0 nxhoafnm aigsh9s9 d3f4x2em iv3no6db jq4qci2q a3bd9o3v b1v8xokw m9osqain hzawbc8m\" dir=\"auto\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql lr9zc1uh jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">Ai cũng c&oacute; thể t&igrave;m nh&oacute;m n&agrave;y.</span></span></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div data-visualcompletion=\"ignore-dynamic\">\r\n<div class=\"ue3kfks5 pw54ja7n uo3d90p7 l82x9zwi a8c37x1j\">\r\n<div class=\"goun2846 mk2mc5f4 ccm00jje s44p3ltw rt8b4zig sk4xxmp2 n8ej3o3l agehan2d rq0escxv j83agx80 buofh1pr g5gj957u i1fnvgqd kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x hpfvmrgz jb3vyjys qt6c0cv9 l9j0dhe7 du4w35lb bp9cbjyn btwxx1t3 dflh9lhu scb9dxdr nnctdnn4\">\r\n<div class=\"j83agx80 cbu4d94t tvfksri0 aov4n071 bi6gxh9e l9j0dhe7 o8rfisnq\">&nbsp;</div>\r\n<div class=\"goun2846 mk2mc5f4 ccm00jje s44p3ltw rt8b4zig sk4xxmp2 n8ej3o3l agehan2d rq0escxv j83agx80 buofh1pr g5gj957u i1fnvgqd kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x tgvbjcpo hpfvmrgz jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso du4w35lb bp9cbjyn ns4p8fja btwxx1t3 l9j0dhe7\">\r\n<div class=\"gs1a9yip goun2846 mk2mc5f4 ccm00jje s44p3ltw rt8b4zig sk4xxmp2 n8ej3o3l agehan2d rq0escxv j83agx80 cbu4d94t buofh1pr g5gj957u i1fnvgqd kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x tgvbjcpo hpfvmrgz rz4wbd8a a8nywdso l9j0dhe7 du4w35lb rj1gh0hx pybr56ya f10w8fjw\">\r\n<div class=\"\">\r\n<div class=\"j83agx80 cbu4d94t ew0dbk1b irj2b8pg\">\r\n<div class=\"qzhwtbm6 knvmm38d\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql lr9zc1uh a8c37x1j fe6kdd0r mau55g9w c8b282yb keod5gw0 nxhoafnm aigsh9s9 d3f4x2em mdeji52x a5q79mjw g1cxx5fr ekzkrbhg oo9gr5id hzawbc8m\" dir=\"auto\"><strong>Việt Nam</strong></span></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'posts/yRU0Fc39QKnvoSgkqfTrRROiuI1gPvZLR36nyBdU.jpg', 1, 12, 17, NULL, '2022-08-13 14:26:55', '2022-08-13 14:26:55');
INSERT INTO `posts` VALUES (6, 'vodinh1', 'Android-ok', '<p>vodinh1</p>', 'posts/mDlp0bzbfXrH5QdD8AioYF7xI5hOgfH5mHZ5YniK.jpg', 2, NULL, 1, NULL, '2022-08-16 01:07:29', '2022-08-21 14:03:16');
INSERT INTO `posts` VALUES (8, 'vodinh2', 'vodinh2', '<p>vodinh2</p>', 'posts/QZhxkIDUwKfcoCya5KqzcTDdm3mEuHn5ablDkkLc.jpg', 1, 36, 1, NULL, '2022-08-21 14:04:18', '2022-08-21 14:04:18');

-- ----------------------------
-- Table structure for request_approve_histories
-- ----------------------------
DROP TABLE IF EXISTS `request_approve_histories`;
CREATE TABLE `request_approve_histories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` bigint NOT NULL,
  `request_id` bigint NOT NULL,
  `status` tinyint NOT NULL,
  `reason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of request_approve_histories
-- ----------------------------
INSERT INTO `request_approve_histories` VALUES (1, 103, 1, 1, NULL, NULL, '2022-08-09 22:03:48', '2022-08-09 22:03:48');
INSERT INTO `request_approve_histories` VALUES (2, 103, 6, 1, NULL, NULL, '2022-08-09 22:27:24', '2022-08-09 22:27:24');
INSERT INTO `request_approve_histories` VALUES (3, 1, 4, 1, NULL, NULL, '2022-08-10 22:59:04', '2022-08-10 22:59:04');
INSERT INTO `request_approve_histories` VALUES (4, 1, 2, 1, NULL, NULL, '2022-08-10 23:08:08', '2022-08-10 23:08:08');
INSERT INTO `request_approve_histories` VALUES (5, 17, 16, 1, NULL, NULL, '2022-08-13 16:40:23', '2022-08-13 16:40:23');
INSERT INTO `request_approve_histories` VALUES (6, 103, 17, 1, NULL, NULL, '2022-08-16 01:24:10', '2022-08-16 01:24:10');
INSERT INTO `request_approve_histories` VALUES (8, 103, 15, 1, NULL, NULL, '2022-08-16 01:27:16', '2022-08-16 01:27:16');
INSERT INTO `request_approve_histories` VALUES (9, 103, 18, 1, NULL, NULL, '2022-08-16 01:33:51', '2022-08-16 01:33:51');
INSERT INTO `request_approve_histories` VALUES (10, 1, 14, 2, 'Nghỉ quá lâu. Không có người thay thế', NULL, '2022-08-16 02:19:57', '2022-08-16 02:19:57');
INSERT INTO `request_approve_histories` VALUES (11, 1, 11, 2, 'Từ chối do đơn chờ quá lâu', NULL, '2022-08-16 11:08:28', '2022-08-16 11:08:28');
INSERT INTO `request_approve_histories` VALUES (12, 1, 13, 1, NULL, NULL, '2022-08-17 11:30:07', '2022-08-17 11:30:07');
INSERT INTO `request_approve_histories` VALUES (13, 1, 12, 1, NULL, NULL, '2022-08-17 11:30:16', '2022-08-17 11:30:16');
INSERT INTO `request_approve_histories` VALUES (14, 1, 10, 1, NULL, NULL, '2022-08-17 11:30:26', '2022-08-17 11:30:26');
INSERT INTO `request_approve_histories` VALUES (15, 1, 9, 1, NULL, NULL, '2022-08-17 11:30:34', '2022-08-17 11:30:34');
INSERT INTO `request_approve_histories` VALUES (16, 1, 7, 1, NULL, NULL, '2022-08-17 11:30:45', '2022-08-17 11:30:45');
INSERT INTO `request_approve_histories` VALUES (17, 1, 20, 2, 'Đơn này duyệt quá lâu yêu cầu hủy', NULL, '2022-08-18 16:23:51', '2022-08-18 16:23:51');
INSERT INTO `request_approve_histories` VALUES (18, 1, 19, 1, NULL, NULL, '2022-08-18 16:24:45', '2022-08-18 16:24:45');
INSERT INTO `request_approve_histories` VALUES (19, 103, 21, 2, 'Đơn không hợp lệ.', NULL, '2022-08-19 22:41:23', '2022-08-19 22:41:23');

-- ----------------------------
-- Table structure for request_detail
-- ----------------------------
DROP TABLE IF EXISTS `request_detail`;
CREATE TABLE `request_detail`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `quit_work_from_at` datetime NOT NULL,
  `quit_work_to_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of request_detail
-- ----------------------------
INSERT INTO `request_detail` VALUES (1, 'kkk', 'images/Hpwa9LwVXg8oBF3yfJubVmgQxbwvuF3SHURkILBv.jpg', '2022-08-09 00:00:00', '2022-08-11 23:59:59', NULL, '2022-08-09 21:59:03', '2022-08-09 21:59:03');
INSERT INTO `request_detail` VALUES (2, 'r', 'images/Hpwa9LwVXg8oBF3yfJubVmgQxbwvuF3SHURkILBv.jpg', '2022-08-09 06:00:00', '2022-08-09 13:00:00', NULL, '2022-08-09 22:01:01', '2022-08-09 22:01:01');
INSERT INTO `request_detail` VALUES (3, 'x', 'images/Hpwa9LwVXg8oBF3yfJubVmgQxbwvuF3SHURkILBv.jpg', '2022-08-09 00:00:00', '2022-08-18 23:59:59', NULL, '2022-08-09 22:01:14', '2022-08-09 22:01:14');
INSERT INTO `request_detail` VALUES (4, 'a', 'images/Hpwa9LwVXg8oBF3yfJubVmgQxbwvuF3SHURkILBv.jpg', '2022-08-02 00:02:00', '2022-08-02 00:11:00', NULL, '2022-08-09 22:25:13', '2022-08-09 22:25:13');
INSERT INTO `request_detail` VALUES (5, 'm', 'images/Hpwa9LwVXg8oBF3yfJubVmgQxbwvuF3SHURkILBv.jpg', '2022-08-09 00:00:00', '2022-08-25 23:59:59', NULL, '2022-08-09 22:25:39', '2022-08-09 22:25:39');
INSERT INTO `request_detail` VALUES (6, 'x', 'images/Hpwa9LwVXg8oBF3yfJubVmgQxbwvuF3SHURkILBv.jpg', '2022-08-16 00:00:00', '2022-08-18 23:59:59', NULL, '2022-08-09 22:26:15', '2022-08-09 22:26:15');
INSERT INTO `request_detail` VALUES (7, 'Mô tả: Sử dụng trong trường hợp nhân viên xin nghỉ không tính công. Mục đích của đơn này là để thông báo cho các bên liên quan về việc nghỉ của nhân viên, nhằm đảm bảo truyền đạt thông tin và tiến độ công việc', 'images/Hpwa9LwVXg8oBF3yfJubVmgQxbwvuF3SHURkILBv.jpg', '2022-08-11 00:00:00', '2022-08-13 23:59:59', NULL, '2022-08-11 19:32:41', '2022-08-11 19:32:41');
INSERT INTO `request_detail` VALUES (8, 'Mô tả: Sử dụng trong trường hợp nhân viên xin nghỉ không tính công. Mục đích của đơn này là để thông báo cho các bên liên quan về việc nghỉ của nhân viên, nhằm đảm bảo truyền đạt thông tin và tiến độ công việc', 'images/Hpwa9LwVXg8oBF3yfJubVmgQxbwvuF3SHURkILBv.jpg', '2022-08-09 08:00:00', '2022-08-09 16:00:00', NULL, '2022-08-11 19:35:13', '2022-08-11 19:35:13');
INSERT INTO `request_detail` VALUES (9, 'ok luoon', NULL, '2022-08-12 00:00:00', '2022-08-24 23:59:59', NULL, '2022-08-12 01:03:17', '2022-08-12 01:03:17');
INSERT INTO `request_detail` VALUES (10, 'ok luoon', NULL, '2022-08-12 00:00:00', '2022-08-24 23:59:59', NULL, '2022-08-12 01:03:24', '2022-08-12 01:03:24');
INSERT INTO `request_detail` VALUES (11, 'ok luoon', NULL, '2022-08-12 00:00:00', '2022-08-24 23:59:59', NULL, '2022-08-12 01:03:34', '2022-08-12 01:03:34');
INSERT INTO `request_detail` VALUES (12, 'ok luoon', NULL, '2022-08-12 00:00:00', '2022-08-24 23:59:59', NULL, '2022-08-12 01:08:00', '2022-08-12 01:08:00');
INSERT INTO `request_detail` VALUES (13, 'fdfdffdffd', NULL, '2022-08-12 02:00:00', '2022-08-12 06:00:00', NULL, '2022-08-12 01:09:16', '2022-08-12 01:09:16');
INSERT INTO `request_detail` VALUES (14, 'xxxxx', NULL, '2022-08-12 00:00:00', '2022-09-24 23:59:59', NULL, '2022-08-12 01:09:55', '2022-08-12 01:09:55');
INSERT INTO `request_detail` VALUES (15, 'Sửa chấm công ngày hôm đấy', 'images/gMUftjenCCVce3YFd0jF2WAN1foF5zXeC2hxXqCC.jpg', '2022-08-11 08:00:00', '2022-08-11 18:00:00', NULL, '2022-08-12 22:28:40', '2022-08-12 22:28:40');
INSERT INTO `request_detail` VALUES (16, 'aaa', 'images/j7oualHwPmpV24WosmSJAjL5JaLVc2VyHQD8l6uT.jpg', '2022-08-13 08:00:00', '2022-08-13 18:00:00', NULL, '2022-08-13 16:38:19', '2022-08-13 16:38:19');
INSERT INTO `request_detail` VALUES (17, 'Việc xây dựng, thực hiện và duy trì quy trình này nhằm đáp ứng nhu cầu trong quá trình ký trong Đại học Y Dược Thành phố Hồ Chí Minh', 'images/Rv7TFqvHaI9NoqTJxKGHICJKEoLKxhPJN7H4N5Pi.jpg', '2022-08-15 07:00:00', '2022-08-15 18:00:00', NULL, '2022-08-15 22:52:46', '2022-08-15 22:52:46');
INSERT INTO `request_detail` VALUES (18, 'x', NULL, '2022-08-11 01:00:00', '2022-08-11 07:00:00', NULL, '2022-08-16 01:32:49', '2022-08-16 01:32:49');
INSERT INTO `request_detail` VALUES (19, 'Sử dụng trong trường hợp nhân viên xin nghỉ không tính công. Mục đích của đơn này là để thông báo cho các bên liên quan về việc nghỉ của nhân viên, nhằm đảm bảo truyền đạt thông tin và tiến độ công việc', NULL, '2022-08-17 00:00:00', '2022-09-13 23:59:59', NULL, '2022-08-17 23:55:07', '2022-08-17 23:55:07');
INSERT INTO `request_detail` VALUES (20, 'Mô tả: Sử dụng trong trường hợp nhân viên xin nghỉ không tính công. Mục đích của đơn này là để thông báo cho các bên liên quan về việc nghỉ của nhân viên, nhằm đảm bảo truyền đạt thông tin và tiến độ công việc', NULL, '2022-08-19 00:00:00', '2022-08-21 23:59:59', NULL, '2022-08-17 23:55:39', '2022-08-17 23:55:39');
INSERT INTO `request_detail` VALUES (21, 'Việc xây dựng, thực hiện và duy trì quy trình này nhằm đáp ứng nhu cầu trong quá trình ký trong Đại học Y Dược Thành phố Hồ Chí Minh', 'images/Bywf26Dg4JKV0SeHWEZgdhWxXxHtVszhRlGTUhy9.jpg', '2022-08-15 06:00:00', '2022-08-15 18:00:00', NULL, '2022-08-19 22:38:21', '2022-08-19 22:38:21');

-- ----------------------------
-- Table structure for requests
-- ----------------------------
DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int UNSIGNED NOT NULL,
  `status` tinyint NOT NULL DEFAULT 1,
  `request_detail_id` int UNSIGNED NOT NULL,
  `single_type_id` int UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of requests
-- ----------------------------
INSERT INTO `requests` VALUES (1, 17, 3, 1, 8, NULL, '2022-08-09 21:59:03', '2022-08-09 22:03:48');
INSERT INTO `requests` VALUES (2, 17, 2, 2, 6, NULL, '2022-08-09 22:01:01', '2022-08-10 23:08:08');
INSERT INTO `requests` VALUES (3, 17, 1, 3, 8, NULL, '2022-08-09 22:01:14', '2022-08-09 22:01:14');
INSERT INTO `requests` VALUES (4, 17, 2, 4, 7, NULL, '2022-08-09 22:25:13', '2022-08-10 22:59:04');
INSERT INTO `requests` VALUES (5, 17, 1, 5, 8, NULL, '2022-08-09 22:25:39', '2022-08-09 22:25:39');
INSERT INTO `requests` VALUES (6, 17, 3, 6, 8, NULL, '2022-08-09 22:26:15', '2022-08-09 22:27:24');
INSERT INTO `requests` VALUES (7, 17, 2, 7, 1, NULL, '2022-08-11 19:32:41', '2022-08-17 11:30:45');
INSERT INTO `requests` VALUES (8, 17, 1, 8, 8, NULL, '2022-08-11 19:35:13', '2022-08-11 19:35:13');
INSERT INTO `requests` VALUES (9, 17, 2, 9, 1, NULL, '2022-08-12 01:03:17', '2022-08-17 11:30:34');
INSERT INTO `requests` VALUES (10, 17, 2, 10, 1, NULL, '2022-08-12 01:03:24', '2022-08-17 11:30:26');
INSERT INTO `requests` VALUES (11, 17, 4, 11, 1, NULL, '2022-08-12 01:03:34', '2022-08-16 11:08:28');
INSERT INTO `requests` VALUES (12, 17, 2, 12, 1, NULL, '2022-08-12 01:08:00', '2022-08-17 11:30:16');
INSERT INTO `requests` VALUES (13, 17, 2, 13, 7, NULL, '2022-08-12 01:09:16', '2022-08-17 11:30:07');
INSERT INTO `requests` VALUES (14, 17, 4, 14, 1, NULL, '2022-08-12 01:09:55', '2022-08-16 02:19:57');
INSERT INTO `requests` VALUES (15, 17, 3, 15, 8, NULL, '2022-08-12 22:28:40', '2022-08-16 01:27:16');
INSERT INTO `requests` VALUES (16, 103, 3, 16, 8, NULL, '2022-08-13 16:38:19', '2022-08-13 16:40:23');
INSERT INTO `requests` VALUES (17, 1, 3, 17, 8, NULL, '2022-08-15 22:52:46', '2022-08-16 01:24:09');
INSERT INTO `requests` VALUES (18, 17, 3, 18, 8, NULL, '2022-08-16 01:32:49', '2022-08-16 01:33:50');
INSERT INTO `requests` VALUES (19, 1, 2, 19, 1, NULL, '2022-08-17 23:55:07', '2022-08-18 16:24:45');
INSERT INTO `requests` VALUES (20, 1, 4, 20, 1, NULL, '2022-08-17 23:55:39', '2022-08-18 16:23:51');
INSERT INTO `requests` VALUES (21, 1, 4, 21, 8, NULL, '2022-08-19 22:38:21', '2022-08-19 22:41:23');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (1, 1);
INSERT INTO `role_has_permissions` VALUES (2, 1);
INSERT INTO `role_has_permissions` VALUES (3, 1);
INSERT INTO `role_has_permissions` VALUES (4, 1);
INSERT INTO `role_has_permissions` VALUES (5, 1);
INSERT INTO `role_has_permissions` VALUES (6, 1);
INSERT INTO `role_has_permissions` VALUES (7, 1);
INSERT INTO `role_has_permissions` VALUES (1, 2);
INSERT INTO `role_has_permissions` VALUES (3, 2);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'human_resource', 'web', '2022-08-14 23:40:26', '2022-08-14 23:40:26');
INSERT INTO `roles` VALUES (2, 'leader', 'web', '2022-08-14 23:40:27', '2022-08-14 23:40:27');
INSERT INTO `roles` VALUES (3, 'admin', 'web', '2022-08-14 23:40:28', '2022-08-14 23:40:28');
INSERT INTO `roles` VALUES (4, 'member', 'web', '2022-08-14 23:40:28', '2022-08-14 23:40:28');

-- ----------------------------
-- Table structure for single_types
-- ----------------------------
DROP TABLE IF EXISTS `single_types`;
CREATE TABLE `single_types`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `regulation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `required_leader` tinyint NOT NULL DEFAULT 0,
  `type` tinyint NOT NULL,
  `status` tinyint NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of single_types
-- ----------------------------
INSERT INTO `single_types` VALUES (1, 'Đơn nghỉ không lương', 'Sử dụng trong trường hợp nhân viên xin nghỉ không tính công. Mục đích của đơn này là để thông báo cho các bên liên quan về việc nghỉ của nhân viên, nhằm đảm bảo truyền đạt thông tin và tiến độ công việc', 'Sử dụng trong trường hợp nhân viên xin nghỉ không tính công. Mục đích của đơn này là để thông báo cho các bên liên quan về việc nghỉ của nhân viên, nhằm đảm bảo truyền đạt thông tin và tiến độ công việc.', 1, 1, 1, NULL, '2022-07-29 21:52:35', '2022-08-14 20:08:08');
INSERT INTO `single_types` VALUES (6, 'Đơn khôi phục công', 'Đơn xin các ngày hiếu hỉ có lương theo quy định của công ty, đơn được tạo trước 1 tuần theo ngày nghỉ', 'Duyệt đơn qua BM', 1, 2, 1, NULL, '2022-08-01 09:28:42', '2022-08-01 09:28:42');
INSERT INTO `single_types` VALUES (7, 'Đơn làm thêm giờ', 'Giao diện của mẫu này hiển thị giờ bắt đầu giờ kết thúc làm thêm giờ. Đơn này dùng cho các loại đơn làm thêm giờ, làm thêm giờ vào ngày lễ...', 'Giao diện của mẫu này hiển thị giờ bắt đầu giờ kết thúc làm thêm giờ. Đơn này dùng cho các loại đơn làm thêm giờ, làm thêm giờ vào ngày lễ...', 1, 3, 1, NULL, '2022-08-03 22:41:52', '2022-08-03 22:41:52');
INSERT INTO `single_types` VALUES (8, 'Đơn sửa chấm công', '- Việc xây dựng, thực hiện và duy trì quy trình này nhằm đáp ứng nhu cầu\r\ntrong quá trình ký trong Đại học Y Dược Thành phố Hồ Chí Minh .\r\n- Quy trình được áp dụng đối với các cá nhân, các đơn vị trực thuộc Đại học\r\nY Dược Thành phố Hồ Chí Minh\r\n- Các viên chức, người lao động khi thực hiện trình ký phải tuân theo trình', '- Việc xây dựng, thực hiện và duy trì quy trình này nhằm đáp ứng nhu cầu\r\ntrong quá trình ký trong Đại học Y Dược Thành phố Hồ Chí Minh .\r\n- Quy trình được áp dụng đối với các cá nhân, các đơn vị trực thuộc Đại học\r\nY Dược Thành phố Hồ Chí Minh\r\n- Các viên chức, người lao động khi thực hiện trình ký phải tuân theo trình', 0, 2, 1, NULL, '2022-08-09 12:58:53', '2022-08-09 12:58:53');

-- ----------------------------
-- Table structure for table_branch
-- ----------------------------
DROP TABLE IF EXISTS `table_branch`;
CREATE TABLE `table_branch`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_branch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotline` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `longtitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `radius` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of table_branch
-- ----------------------------

-- ----------------------------
-- Table structure for timekeep_details
-- ----------------------------
DROP TABLE IF EXISTS `timekeep_details`;
CREATE TABLE `timekeep_details`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `timekeep_id` bigint NOT NULL,
  `checkin_at` datetime NULL DEFAULT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type` tinyint NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `source` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `timekeep_details_timekeep_id_index`(`timekeep_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2448 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of timekeep_details
-- ----------------------------
INSERT INTO `timekeep_details` VALUES (1612, 812, '2022-07-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1613, 812, '2022-07-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1614, 813, '2022-07-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1615, 813, '2022-07-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1616, 814, '2022-07-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1617, 814, '2022-07-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1618, 815, '2022-07-06 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1619, 815, '2022-07-06 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1620, 816, '2022-07-07 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1621, 816, '2022-07-07 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1622, 817, '2022-07-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1623, 817, '2022-07-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1624, 818, '2022-07-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1625, 818, '2022-07-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1626, 819, '2022-07-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1627, 819, '2022-07-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1628, 820, '2022-07-13 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1629, 820, '2022-07-13 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1630, 821, '2022-07-14 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1631, 821, '2022-07-14 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1632, 822, '2022-07-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1633, 822, '2022-07-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1634, 823, '2022-07-18 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1635, 823, '2022-07-18 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1636, 824, '2022-07-19 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1637, 824, '2022-07-19 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1638, 825, '2022-07-20 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1639, 825, '2022-07-20 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1640, 826, '2022-07-21 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1641, 826, '2022-07-21 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1642, 827, '2022-07-22 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1643, 827, '2022-07-22 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1644, 828, '2022-07-25 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1645, 828, '2022-07-25 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1646, 829, '2022-07-26 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1647, 829, '2022-07-26 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1648, 830, '2022-07-27 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1649, 830, '2022-07-27 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1650, 831, '2022-07-28 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1651, 831, '2022-07-28 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1652, 832, '2022-07-29 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1653, 832, '2022-07-29 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1654, 833, '2022-07-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1655, 833, '2022-07-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1656, 834, '2022-07-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1657, 834, '2022-07-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1658, 835, '2022-07-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1659, 835, '2022-07-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1660, 836, '2022-07-06 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1661, 836, '2022-07-06 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1662, 837, '2022-07-07 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1663, 837, '2022-07-07 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1664, 838, '2022-07-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1665, 838, '2022-07-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1666, 839, '2022-07-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1667, 839, '2022-07-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1668, 840, '2022-07-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1669, 840, '2022-07-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1670, 841, '2022-07-13 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1671, 841, '2022-07-13 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1672, 842, '2022-07-14 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1673, 842, '2022-07-14 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1674, 843, '2022-07-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1675, 843, '2022-07-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1676, 844, '2022-07-18 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1677, 844, '2022-07-18 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1678, 845, '2022-07-19 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1679, 845, '2022-07-19 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1680, 846, '2022-07-20 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1681, 846, '2022-07-20 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1682, 847, '2022-07-21 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1683, 847, '2022-07-21 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1684, 848, '2022-07-22 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1685, 848, '2022-07-22 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1686, 849, '2022-07-25 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1687, 849, '2022-07-25 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1688, 850, '2022-07-26 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1689, 850, '2022-07-26 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1690, 851, '2022-07-27 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1691, 851, '2022-07-27 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1692, 852, '2022-07-28 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1693, 852, '2022-07-28 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1694, 853, '2022-07-29 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1695, 853, '2022-07-29 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1696, 854, '2022-07-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1697, 854, '2022-07-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1698, 855, '2022-07-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1699, 855, '2022-07-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1700, 856, '2022-07-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1701, 856, '2022-07-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1702, 857, '2022-07-06 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1703, 857, '2022-07-06 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1704, 858, '2022-07-07 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1705, 858, '2022-07-07 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1706, 859, '2022-07-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1707, 859, '2022-07-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1708, 860, '2022-07-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1709, 860, '2022-07-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1710, 861, '2022-07-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1711, 861, '2022-07-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1712, 862, '2022-07-13 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1713, 862, '2022-07-13 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1714, 863, '2022-07-14 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1715, 863, '2022-07-14 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1716, 864, '2022-07-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1717, 864, '2022-07-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1718, 865, '2022-07-18 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1719, 865, '2022-07-18 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1720, 866, '2022-07-19 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1721, 866, '2022-07-19 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1722, 867, '2022-07-20 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1723, 867, '2022-07-20 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1724, 868, '2022-07-21 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1725, 868, '2022-07-21 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1726, 869, '2022-07-22 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1727, 869, '2022-07-22 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1728, 870, '2022-07-25 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1729, 870, '2022-07-25 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1730, 871, '2022-07-26 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1731, 871, '2022-07-26 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1732, 872, '2022-07-27 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1733, 872, '2022-07-27 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1734, 873, '2022-07-28 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1735, 873, '2022-07-28 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1736, 874, '2022-07-29 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1737, 874, '2022-07-29 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1738, 875, '2022-07-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1739, 875, '2022-07-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1740, 876, '2022-07-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1741, 876, '2022-07-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1742, 877, '2022-07-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1743, 877, '2022-07-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1744, 878, '2022-07-06 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1745, 878, '2022-07-06 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1746, 879, '2022-07-07 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1747, 879, '2022-07-07 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1748, 880, '2022-07-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1749, 880, '2022-07-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1750, 881, '2022-07-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1751, 881, '2022-07-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1752, 882, '2022-07-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1753, 882, '2022-07-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1754, 883, '2022-07-13 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1755, 883, '2022-07-13 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1756, 884, '2022-07-14 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1757, 884, '2022-07-14 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1758, 885, '2022-07-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1759, 885, '2022-07-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1760, 886, '2022-07-18 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1761, 886, '2022-07-18 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1762, 887, '2022-07-19 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1763, 887, '2022-07-19 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1764, 888, '2022-07-20 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1765, 888, '2022-07-20 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1766, 889, '2022-07-21 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1767, 889, '2022-07-21 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1768, 890, '2022-07-22 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1769, 890, '2022-07-22 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1770, 891, '2022-07-25 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1771, 891, '2022-07-25 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1772, 892, '2022-07-26 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1773, 892, '2022-07-26 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1774, 893, '2022-07-27 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1775, 893, '2022-07-27 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1776, 894, '2022-07-28 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1777, 894, '2022-07-28 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1778, 895, '2022-07-29 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1779, 895, '2022-07-29 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1780, 896, '2022-07-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1781, 896, '2022-07-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1782, 897, '2022-07-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1783, 897, '2022-07-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1784, 898, '2022-07-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1785, 898, '2022-07-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1786, 899, '2022-07-06 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1787, 899, '2022-07-06 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1788, 900, '2022-07-07 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1789, 900, '2022-07-07 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1790, 901, '2022-07-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1791, 901, '2022-07-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1792, 902, '2022-07-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1793, 902, '2022-07-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1794, 903, '2022-07-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1795, 903, '2022-07-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1796, 904, '2022-07-13 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1797, 904, '2022-07-13 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1798, 905, '2022-07-14 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1799, 905, '2022-07-14 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1800, 906, '2022-07-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1801, 906, '2022-07-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1802, 907, '2022-07-18 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1803, 907, '2022-07-18 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1804, 908, '2022-07-19 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1805, 908, '2022-07-19 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1806, 909, '2022-07-20 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1807, 909, '2022-07-20 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1808, 910, '2022-07-21 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1809, 910, '2022-07-21 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1810, 911, '2022-07-22 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1811, 911, '2022-07-22 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1812, 912, '2022-07-25 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1813, 912, '2022-07-25 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1814, 913, '2022-07-26 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1815, 913, '2022-07-26 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1816, 914, '2022-07-27 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1817, 914, '2022-07-27 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1818, 915, '2022-07-28 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1819, 915, '2022-07-28 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1820, 916, '2022-07-29 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1821, 916, '2022-07-29 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1822, 917, '2022-07-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1823, 917, '2022-07-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1824, 918, '2022-07-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1825, 918, '2022-07-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1826, 919, '2022-07-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1827, 919, '2022-07-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1828, 920, '2022-07-06 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1829, 920, '2022-07-06 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1830, 921, '2022-07-07 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1831, 921, '2022-07-07 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1832, 922, '2022-07-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1833, 922, '2022-07-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1834, 923, '2022-07-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1835, 923, '2022-07-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1836, 924, '2022-07-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1837, 924, '2022-07-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1838, 925, '2022-07-13 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1839, 925, '2022-07-13 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1840, 926, '2022-07-14 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1841, 926, '2022-07-14 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1842, 927, '2022-07-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1843, 927, '2022-07-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1844, 928, '2022-07-18 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1845, 928, '2022-07-18 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1846, 929, '2022-07-19 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1847, 929, '2022-07-19 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1848, 930, '2022-07-20 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1849, 930, '2022-07-20 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1850, 931, '2022-07-21 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1851, 931, '2022-07-21 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1852, 932, '2022-07-22 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1853, 932, '2022-07-22 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1854, 933, '2022-07-25 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1855, 933, '2022-07-25 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1856, 934, '2022-07-26 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1857, 934, '2022-07-26 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1858, 935, '2022-07-27 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1859, 935, '2022-07-27 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1860, 936, '2022-07-28 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1861, 936, '2022-07-28 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1862, 937, '2022-07-29 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1863, 937, '2022-07-29 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1864, 938, '2022-07-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1865, 938, '2022-07-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1866, 939, '2022-07-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1867, 939, '2022-07-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1868, 940, '2022-07-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1869, 940, '2022-07-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1870, 941, '2022-07-06 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1871, 941, '2022-07-06 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1872, 942, '2022-07-07 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1873, 942, '2022-07-07 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1874, 943, '2022-07-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1875, 943, '2022-07-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1876, 944, '2022-07-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1877, 944, '2022-07-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1878, 945, '2022-07-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1879, 945, '2022-07-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1880, 946, '2022-07-13 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1881, 946, '2022-07-13 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1882, 947, '2022-07-14 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1883, 947, '2022-07-14 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1884, 948, '2022-07-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1885, 948, '2022-07-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1886, 949, '2022-07-18 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1887, 949, '2022-07-18 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1888, 950, '2022-07-19 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1889, 950, '2022-07-19 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1890, 951, '2022-07-20 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1891, 951, '2022-07-20 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1892, 952, '2022-07-21 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1893, 952, '2022-07-21 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1894, 953, '2022-07-22 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1895, 953, '2022-07-22 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1896, 954, '2022-07-25 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1897, 954, '2022-07-25 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1898, 955, '2022-07-26 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1899, 955, '2022-07-26 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1900, 956, '2022-07-27 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1901, 956, '2022-07-27 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1902, 957, '2022-07-28 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1903, 957, '2022-07-28 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1904, 958, '2022-07-29 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1905, 958, '2022-07-29 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1906, 959, '2022-07-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1907, 959, '2022-07-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1908, 960, '2022-07-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1909, 960, '2022-07-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1910, 961, '2022-07-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1911, 961, '2022-07-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1912, 962, '2022-07-06 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1913, 962, '2022-07-06 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1914, 963, '2022-07-07 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1915, 963, '2022-07-07 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1916, 964, '2022-07-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1917, 964, '2022-07-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1918, 965, '2022-07-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1919, 965, '2022-07-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1920, 966, '2022-07-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1921, 966, '2022-07-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1922, 967, '2022-07-13 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1923, 967, '2022-07-13 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1924, 968, '2022-07-14 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1925, 968, '2022-07-14 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1926, 969, '2022-07-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1927, 969, '2022-07-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1928, 970, '2022-07-18 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1929, 970, '2022-07-18 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1930, 971, '2022-07-19 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1931, 971, '2022-07-19 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1932, 972, '2022-07-20 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1933, 972, '2022-07-20 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1934, 973, '2022-07-21 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1935, 973, '2022-07-21 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1936, 974, '2022-07-22 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1937, 974, '2022-07-22 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1938, 975, '2022-07-25 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1939, 975, '2022-07-25 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1940, 976, '2022-07-26 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1941, 976, '2022-07-26 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1942, 977, '2022-07-27 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1943, 977, '2022-07-27 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1944, 978, '2022-07-28 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1945, 978, '2022-07-28 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1946, 979, '2022-07-29 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1947, 979, '2022-07-29 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1948, 980, '2022-07-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1949, 980, '2022-07-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1950, 981, '2022-07-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1951, 981, '2022-07-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1952, 982, '2022-07-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1953, 982, '2022-07-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1954, 983, '2022-07-06 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1955, 983, '2022-07-06 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1956, 984, '2022-07-07 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1957, 984, '2022-07-07 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1958, 985, '2022-07-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1959, 985, '2022-07-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1960, 986, '2022-07-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1961, 986, '2022-07-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1962, 987, '2022-07-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1963, 987, '2022-07-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1964, 988, '2022-07-13 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1965, 988, '2022-07-13 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1966, 989, '2022-07-14 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1967, 989, '2022-07-14 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1968, 990, '2022-07-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1969, 990, '2022-07-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1970, 991, '2022-07-18 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1971, 991, '2022-07-18 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1972, 992, '2022-07-19 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1973, 992, '2022-07-19 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1974, 993, '2022-07-20 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1975, 993, '2022-07-20 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1976, 994, '2022-07-21 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1977, 994, '2022-07-21 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1978, 995, '2022-07-22 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1979, 995, '2022-07-22 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1980, 996, '2022-07-25 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1981, 996, '2022-07-25 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1982, 997, '2022-07-26 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1983, 997, '2022-07-26 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1984, 998, '2022-07-27 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1985, 998, '2022-07-27 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1986, 999, '2022-07-28 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1987, 999, '2022-07-28 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1988, 1000, '2022-07-29 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (1989, 1000, '2022-07-29 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2217, 1116, '2022-08-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2218, 1116, '2022-08-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2219, 1117, '2022-08-02 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2220, 1117, '2022-08-02 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2221, 1118, '2022-08-03 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2222, 1118, '2022-08-03 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2223, 1119, '2022-08-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2224, 1119, '2022-08-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2225, 1120, '2022-08-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2226, 1120, '2022-08-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2227, 1121, '2022-08-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2228, 1121, '2022-08-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2229, 1122, '2022-08-09 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2230, 1122, '2022-08-09 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2231, 1123, '2022-08-10 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2232, 1123, '2022-08-10 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2233, 1124, '2022-08-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2234, 1124, '2022-08-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2235, 1125, '2022-08-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2236, 1125, '2022-08-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2237, 1126, '2022-08-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2238, 1126, '2022-08-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2239, 1127, '2022-08-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2240, 1127, '2022-08-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2241, 1128, '2022-08-02 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2242, 1128, '2022-08-02 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2243, 1129, '2022-08-03 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2244, 1129, '2022-08-03 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2245, 1130, '2022-08-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2246, 1130, '2022-08-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2247, 1131, '2022-08-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2248, 1131, '2022-08-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2249, 1132, '2022-08-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2250, 1132, '2022-08-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2251, 1133, '2022-08-09 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2252, 1133, '2022-08-09 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2253, 1134, '2022-08-10 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2254, 1134, '2022-08-10 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2255, 1135, '2022-08-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2256, 1135, '2022-08-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2257, 1136, '2022-08-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2258, 1136, '2022-08-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2259, 1137, '2022-08-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2260, 1137, '2022-08-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2261, 1138, '2022-08-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2262, 1138, '2022-08-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2263, 1139, '2022-08-02 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2264, 1139, '2022-08-02 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2265, 1140, '2022-08-03 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2266, 1140, '2022-08-03 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2267, 1141, '2022-08-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2268, 1141, '2022-08-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2269, 1142, '2022-08-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2270, 1142, '2022-08-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2271, 1143, '2022-08-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2272, 1143, '2022-08-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2273, 1144, '2022-08-09 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2274, 1144, '2022-08-09 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2275, 1145, '2022-08-10 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2276, 1145, '2022-08-10 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2277, 1146, '2022-08-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2278, 1146, '2022-08-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2279, 1147, '2022-08-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2280, 1147, '2022-08-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2281, 1148, '2022-08-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2282, 1148, '2022-08-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2283, 1149, '2022-08-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2284, 1149, '2022-08-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2285, 1150, '2022-08-02 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2286, 1150, '2022-08-02 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2287, 1151, '2022-08-03 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2288, 1151, '2022-08-03 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2289, 1152, '2022-08-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2290, 1152, '2022-08-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2291, 1153, '2022-08-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2292, 1153, '2022-08-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2293, 1154, '2022-08-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2294, 1154, '2022-08-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2295, 1155, '2022-08-09 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2296, 1155, '2022-08-09 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2297, 1156, '2022-08-10 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2298, 1156, '2022-08-10 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2299, 1157, '2022-08-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2300, 1157, '2022-08-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2301, 1158, '2022-08-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2302, 1158, '2022-08-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2303, 1159, '2022-08-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2304, 1159, '2022-08-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2305, 1160, '2022-08-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2306, 1160, '2022-08-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2307, 1161, '2022-08-02 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2308, 1161, '2022-08-02 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2309, 1162, '2022-08-03 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2310, 1162, '2022-08-03 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2311, 1163, '2022-08-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2312, 1163, '2022-08-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2313, 1164, '2022-08-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2314, 1164, '2022-08-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2315, 1165, '2022-08-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2316, 1165, '2022-08-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2317, 1166, '2022-08-09 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2318, 1166, '2022-08-09 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2319, 1167, '2022-08-10 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2320, 1167, '2022-08-10 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2321, 1168, '2022-08-11 01:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-16 01:33:52', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2322, 1168, '2022-08-11 07:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-16 01:33:53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2323, 1169, '2022-08-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2324, 1169, '2022-08-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2325, 1170, '2022-08-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2326, 1170, '2022-08-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2327, 1171, '2022-08-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2328, 1171, '2022-08-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2329, 1172, '2022-08-02 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2330, 1172, '2022-08-02 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2331, 1173, '2022-08-03 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2332, 1173, '2022-08-03 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2333, 1174, '2022-08-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2334, 1174, '2022-08-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2335, 1175, '2022-08-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2336, 1175, '2022-08-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2337, 1176, '2022-08-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2338, 1176, '2022-08-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2339, 1177, '2022-08-09 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2340, 1177, '2022-08-09 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2341, 1178, '2022-08-10 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2342, 1178, '2022-08-10 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2343, 1179, '2022-08-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2344, 1179, '2022-08-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2345, 1180, '2022-08-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2346, 1180, '2022-08-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2347, 1181, '2022-08-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2348, 1181, '2022-08-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2349, 1182, '2022-08-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2350, 1182, '2022-08-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2351, 1183, '2022-08-02 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2352, 1183, '2022-08-02 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2353, 1184, '2022-08-03 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2354, 1184, '2022-08-03 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2355, 1185, '2022-08-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2356, 1185, '2022-08-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2357, 1186, '2022-08-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2358, 1186, '2022-08-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2359, 1187, '2022-08-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2360, 1187, '2022-08-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2361, 1188, '2022-08-09 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2362, 1188, '2022-08-09 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2363, 1189, '2022-08-10 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2364, 1189, '2022-08-10 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2365, 1190, '2022-08-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2366, 1190, '2022-08-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2367, 1191, '2022-08-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2368, 1191, '2022-08-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2369, 1192, '2022-08-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2370, 1192, '2022-08-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2371, 1193, '2022-08-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2372, 1193, '2022-08-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2373, 1194, '2022-08-02 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2374, 1194, '2022-08-02 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2375, 1195, '2022-08-03 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2376, 1195, '2022-08-03 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2377, 1196, '2022-08-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2378, 1196, '2022-08-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2379, 1197, '2022-08-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2380, 1197, '2022-08-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2381, 1198, '2022-08-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2382, 1198, '2022-08-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2383, 1199, '2022-08-09 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2384, 1199, '2022-08-09 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2385, 1200, '2022-08-10 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2386, 1200, '2022-08-10 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2387, 1201, '2022-08-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2388, 1201, '2022-08-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2389, 1202, '2022-08-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2390, 1202, '2022-08-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2391, 1203, '2022-08-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2392, 1203, '2022-08-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2393, 1204, '2022-08-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2394, 1204, '2022-08-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2395, 1205, '2022-08-02 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2396, 1205, '2022-08-02 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2397, 1206, '2022-08-03 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2398, 1206, '2022-08-03 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2399, 1207, '2022-08-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2400, 1207, '2022-08-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2401, 1208, '2022-08-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2402, 1208, '2022-08-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2403, 1209, '2022-08-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2404, 1209, '2022-08-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2405, 1210, '2022-08-09 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2406, 1210, '2022-08-09 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2407, 1211, '2022-08-10 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2408, 1211, '2022-08-10 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2409, 1212, '2022-08-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2410, 1212, '2022-08-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2411, 1213, '2022-08-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:14', '2022-08-15 01:28:14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2412, 1213, '2022-08-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:14', '2022-08-15 01:28:14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2413, 1214, '2022-08-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:14', '2022-08-15 01:28:14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2414, 1214, '2022-08-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:14', '2022-08-15 01:28:14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2415, 1215, '2022-08-16 00:14:13', '127.0.0.1', '21.0277644', '105.8341598', 1, NULL, '2022-08-16 00:14:14', '2022-08-16 00:14:14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2416, 1215, '2022-08-16 02:49:26', '14.248.94.184', '21.0424021', '105.7493768', 1, NULL, '2022-08-16 02:49:26', '2022-08-16 02:49:26', 'Mozilla/5.0 (Linux; Android 10; Redmi K20 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Mobile Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2417, 1215, '2022-08-16 02:50:39', '14.248.94.184', '21.0424021', '105.7493768', 1, NULL, '2022-08-16 02:50:39', '2022-08-16 02:50:39', 'Mozilla/5.0 (Linux; Android 10; Redmi K20 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Mobile Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2418, 1215, '2022-08-16 02:51:02', '14.248.94.184', '21.0424021', '105.7493768', 1, NULL, '2022-08-16 02:51:02', '2022-08-16 02:51:02', 'Mozilla/5.0 (Linux; Android 10; Redmi K20 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Mobile Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2419, 1219, '2022-08-16 08:52:18', '14.232.245.144', '21.0012507', '105.7938183', 1, NULL, '2022-08-16 08:52:18', '2022-08-16 08:52:18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2420, 1220, '2022-08-16 10:09:01', '222.252.28.187', '21.0012507', '105.7938183', 1, NULL, '2022-08-16 10:09:01', '2022-08-16 10:09:01', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2421, 1220, '2022-08-16 10:09:40', '222.252.28.187', '20.9947112', '105.805296', 1, NULL, '2022-08-16 10:09:40', '2022-08-16 10:09:40', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2422, 1220, '2022-08-16 10:24:48', '222.252.28.187', '21.0012507', '105.7938183', 1, NULL, '2022-08-16 10:24:48', '2022-08-16 10:24:48', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2423, 1220, '2022-08-16 10:27:13', '222.252.28.187', '20.9947328', '105.80531', 1, NULL, '2022-08-16 10:27:13', '2022-08-16 10:27:13', 'Mozilla/5.0 (Linux; Android 11; SM-A217F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.58 Mobile Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2424, 1221, '2022-08-17 17:15:20', '113.185.47.83', '20.9944747', '105.8051981', 1, NULL, '2022-08-17 17:15:20', '2022-08-17 17:15:20', 'Mozilla/5.0 (Linux; Android 11; SM-A217F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.58 Mobile Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2425, 1222, '2022-08-17 20:57:40', '2001:ee0:4161:327d:b468:a3af:a6:fc68', '21.0505198', '105.7829344', 1, NULL, '2022-08-17 20:57:40', '2022-08-17 20:57:40', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2426, 1222, '2022-08-17 21:25:02', '2001:ee0:4161:327d:b468:a3af:a6:fc68', '21.0505198', '105.7829344', 1, NULL, '2022-08-17 21:25:02', '2022-08-17 21:25:02', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2427, 1223, '2022-08-18 00:15:06', '14.248.94.184', '21.0520642', '105.746865', 1, NULL, '2022-08-18 00:15:06', '2022-08-18 00:15:06', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2428, 1223, '2022-08-18 00:17:11', '14.248.94.184', '21.0520642', '105.746865', 1, NULL, '2022-08-18 00:17:11', '2022-08-18 00:17:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2429, 1223, '2022-08-18 17:24:13', '14.232.245.144', '21.0012507', '105.7938183', 1, NULL, '2022-08-18 17:24:13', '2022-08-18 17:24:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2430, 1224, '2022-08-19 17:31:07', '222.252.28.187', '20.9947192', '105.805304', 1, NULL, '2022-08-19 17:31:07', '2022-08-19 17:31:07', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2431, 1224, '2022-08-19 22:57:52', '14.248.94.184', '21.0424344', '105.7493801', 1, NULL, '2022-08-19 22:57:52', '2022-08-19 22:57:52', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2433, 1230, '2022-08-20 08:37:44', '127.0.0.1', '12.0215554', '12.0215554', 1, NULL, '2022-08-20 08:37:45', '2022-08-20 08:37:45', 'PostmanRuntime/7.29.2');
INSERT INTO `timekeep_details` VALUES (2435, 1230, '2022-08-20 08:49:14', '127.0.0.1', '12.0215554', '12.0215554', 1, NULL, '2022-08-20 08:49:15', '2022-08-20 08:49:15', 'PostmanRuntime/7.29.2');
INSERT INTO `timekeep_details` VALUES (2436, 1230, '2022-08-20 08:50:39', '127.0.0.1', '12.0215554', '12.0215554', 1, NULL, '2022-08-20 08:50:39', '2022-08-20 08:50:39', 'PostmanRuntime/7.29.2');
INSERT INTO `timekeep_details` VALUES (2437, 1230, '2022-08-20 08:51:00', '127.0.0.1', '12.0215554', '12.0215554', 1, NULL, '2022-08-20 08:51:01', '2022-08-20 08:51:01', 'PostmanRuntime/7.29.2');
INSERT INTO `timekeep_details` VALUES (2438, 1230, '2022-08-20 08:51:48', '127.0.0.1', '12.0215554', '12.0215554', 1, NULL, '2022-08-20 08:51:49', '2022-08-20 08:51:49', 'PostmanRuntime/7.29.2');
INSERT INTO `timekeep_details` VALUES (2439, 1230, '2022-08-20 08:53:04', '127.0.0.1', '12.0215554', '12.0215554', 1, NULL, '2022-08-20 08:53:04', '2022-08-20 08:53:04', 'PostmanRuntime/7.29.2');
INSERT INTO `timekeep_details` VALUES (2440, 1230, '2022-08-20 08:53:24', '127.0.0.1', '12.0215554', '12.0215554', 1, NULL, '2022-08-20 08:53:25', '2022-08-20 08:53:25', 'PostmanRuntime/7.29.2');
INSERT INTO `timekeep_details` VALUES (2442, 1230, '2022-08-20 09:00:17', '127.0.0.1', '12.0215554', '12.0215554', 1, NULL, '2022-08-20 09:00:18', '2022-08-20 09:00:18', 'PostmanRuntime/7.29.2');
INSERT INTO `timekeep_details` VALUES (2443, 1230, '2022-08-20 12:24:41', '127.0.0.1', '21.0424289', '105.7493839', 1, NULL, '2022-08-20 12:24:41', '2022-08-20 12:24:41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2444, 1378, '2022-08-20 12:30:51', '127.0.0.1', '21.0424382', '105.7493855', 1, NULL, '2022-08-20 12:30:52', '2022-08-20 12:30:52', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2445, 1379, '2022-08-20 12:33:35', '127.0.0.1', '21.0424268', '105.7493911', 1, NULL, '2022-08-20 12:33:36', '2022-08-20 12:33:36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2446, 1380, '2022-08-20 12:35:52', '127.0.0.1', '21.0424429', '105.7493832', 1, NULL, '2022-08-20 12:35:53', '2022-08-20 12:35:53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_details` VALUES (2447, 1380, '2022-08-20 13:06:33', '127.0.0.1', '21.0424429', '105.7493832', 1, NULL, '2022-08-20 13:06:34', '2022-08-20 13:06:34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');

-- ----------------------------
-- Table structure for timekeep_logs
-- ----------------------------
DROP TABLE IF EXISTS `timekeep_logs`;
CREATE TABLE `timekeep_logs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `timekeep_id` bigint NOT NULL,
  `checkin_at` datetime NULL DEFAULT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `source` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `timekeep_logs_timekeep_id_index`(`timekeep_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2467 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of timekeep_logs
-- ----------------------------
INSERT INTO `timekeep_logs` VALUES (1612, 812, '2022-07-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1613, 812, '2022-07-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1614, 813, '2022-07-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1615, 813, '2022-07-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1616, 814, '2022-07-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1617, 814, '2022-07-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1618, 815, '2022-07-06 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1619, 815, '2022-07-06 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1620, 816, '2022-07-07 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1621, 816, '2022-07-07 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1622, 817, '2022-07-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1623, 817, '2022-07-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1624, 818, '2022-07-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1625, 818, '2022-07-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1626, 819, '2022-07-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1627, 819, '2022-07-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1628, 820, '2022-07-13 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1629, 820, '2022-07-13 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1630, 821, '2022-07-14 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1631, 821, '2022-07-14 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1632, 822, '2022-07-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1633, 822, '2022-07-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1634, 823, '2022-07-18 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1635, 823, '2022-07-18 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1636, 824, '2022-07-19 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1637, 824, '2022-07-19 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1638, 825, '2022-07-20 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1639, 825, '2022-07-20 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1640, 826, '2022-07-21 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1641, 826, '2022-07-21 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1642, 827, '2022-07-22 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1643, 827, '2022-07-22 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1644, 828, '2022-07-25 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1645, 828, '2022-07-25 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1646, 829, '2022-07-26 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1647, 829, '2022-07-26 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1648, 830, '2022-07-27 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1649, 830, '2022-07-27 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1650, 831, '2022-07-28 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1651, 831, '2022-07-28 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1652, 832, '2022-07-29 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1653, 832, '2022-07-29 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1654, 833, '2022-07-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1655, 833, '2022-07-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1656, 834, '2022-07-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1657, 834, '2022-07-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1658, 835, '2022-07-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1659, 835, '2022-07-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1660, 836, '2022-07-06 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1661, 836, '2022-07-06 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1662, 837, '2022-07-07 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1663, 837, '2022-07-07 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1664, 838, '2022-07-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1665, 838, '2022-07-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1666, 839, '2022-07-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1667, 839, '2022-07-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1668, 840, '2022-07-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1669, 840, '2022-07-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1670, 841, '2022-07-13 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1671, 841, '2022-07-13 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1672, 842, '2022-07-14 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1673, 842, '2022-07-14 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1674, 843, '2022-07-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1675, 843, '2022-07-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1676, 844, '2022-07-18 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1677, 844, '2022-07-18 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1678, 845, '2022-07-19 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1679, 845, '2022-07-19 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1680, 846, '2022-07-20 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1681, 846, '2022-07-20 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1682, 847, '2022-07-21 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1683, 847, '2022-07-21 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1684, 848, '2022-07-22 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1685, 848, '2022-07-22 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1686, 849, '2022-07-25 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1687, 849, '2022-07-25 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1688, 850, '2022-07-26 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1689, 850, '2022-07-26 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1690, 851, '2022-07-27 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1691, 851, '2022-07-27 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1692, 852, '2022-07-28 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1693, 852, '2022-07-28 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1694, 853, '2022-07-29 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1695, 853, '2022-07-29 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1696, 854, '2022-07-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1697, 854, '2022-07-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1698, 855, '2022-07-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1699, 855, '2022-07-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1700, 856, '2022-07-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1701, 856, '2022-07-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1702, 857, '2022-07-06 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1703, 857, '2022-07-06 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1704, 858, '2022-07-07 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1705, 858, '2022-07-07 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1706, 859, '2022-07-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1707, 859, '2022-07-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1708, 860, '2022-07-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1709, 860, '2022-07-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1710, 861, '2022-07-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1711, 861, '2022-07-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1712, 862, '2022-07-13 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1713, 862, '2022-07-13 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1714, 863, '2022-07-14 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1715, 863, '2022-07-14 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1716, 864, '2022-07-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1717, 864, '2022-07-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1718, 865, '2022-07-18 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1719, 865, '2022-07-18 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1720, 866, '2022-07-19 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1721, 866, '2022-07-19 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1722, 867, '2022-07-20 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1723, 867, '2022-07-20 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1724, 868, '2022-07-21 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1725, 868, '2022-07-21 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1726, 869, '2022-07-22 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1727, 869, '2022-07-22 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1728, 870, '2022-07-25 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1729, 870, '2022-07-25 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1730, 871, '2022-07-26 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1731, 871, '2022-07-26 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1732, 872, '2022-07-27 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1733, 872, '2022-07-27 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1734, 873, '2022-07-28 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1735, 873, '2022-07-28 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1736, 874, '2022-07-29 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1737, 874, '2022-07-29 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1738, 875, '2022-07-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1739, 875, '2022-07-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1740, 876, '2022-07-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1741, 876, '2022-07-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1742, 877, '2022-07-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1743, 877, '2022-07-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1744, 878, '2022-07-06 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1745, 878, '2022-07-06 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1746, 879, '2022-07-07 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1747, 879, '2022-07-07 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1748, 880, '2022-07-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1749, 880, '2022-07-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1750, 881, '2022-07-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1751, 881, '2022-07-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1752, 882, '2022-07-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1753, 882, '2022-07-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1754, 883, '2022-07-13 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1755, 883, '2022-07-13 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1756, 884, '2022-07-14 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1757, 884, '2022-07-14 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1758, 885, '2022-07-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1759, 885, '2022-07-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1760, 886, '2022-07-18 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1761, 886, '2022-07-18 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1762, 887, '2022-07-19 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1763, 887, '2022-07-19 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1764, 888, '2022-07-20 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1765, 888, '2022-07-20 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1766, 889, '2022-07-21 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1767, 889, '2022-07-21 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1768, 890, '2022-07-22 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1769, 890, '2022-07-22 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1770, 891, '2022-07-25 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1771, 891, '2022-07-25 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1772, 892, '2022-07-26 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1773, 892, '2022-07-26 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1774, 893, '2022-07-27 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1775, 893, '2022-07-27 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1776, 894, '2022-07-28 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1777, 894, '2022-07-28 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1778, 895, '2022-07-29 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1779, 895, '2022-07-29 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1780, 896, '2022-07-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1781, 896, '2022-07-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1782, 897, '2022-07-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1783, 897, '2022-07-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1784, 898, '2022-07-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1785, 898, '2022-07-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1786, 899, '2022-07-06 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1787, 899, '2022-07-06 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1788, 900, '2022-07-07 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1789, 900, '2022-07-07 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1790, 901, '2022-07-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1791, 901, '2022-07-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1792, 902, '2022-07-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1793, 902, '2022-07-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1794, 903, '2022-07-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1795, 903, '2022-07-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1796, 904, '2022-07-13 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1797, 904, '2022-07-13 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1798, 905, '2022-07-14 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1799, 905, '2022-07-14 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1800, 906, '2022-07-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1801, 906, '2022-07-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1802, 907, '2022-07-18 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1803, 907, '2022-07-18 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1804, 908, '2022-07-19 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1805, 908, '2022-07-19 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1806, 909, '2022-07-20 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1807, 909, '2022-07-20 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1808, 910, '2022-07-21 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1809, 910, '2022-07-21 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1810, 911, '2022-07-22 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1811, 911, '2022-07-22 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1812, 912, '2022-07-25 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1813, 912, '2022-07-25 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1814, 913, '2022-07-26 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1815, 913, '2022-07-26 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1816, 914, '2022-07-27 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1817, 914, '2022-07-27 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1818, 915, '2022-07-28 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1819, 915, '2022-07-28 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1820, 916, '2022-07-29 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1821, 916, '2022-07-29 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1822, 917, '2022-07-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1823, 917, '2022-07-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1824, 918, '2022-07-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1825, 918, '2022-07-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1826, 919, '2022-07-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1827, 919, '2022-07-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1828, 920, '2022-07-06 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1829, 920, '2022-07-06 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1830, 921, '2022-07-07 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1831, 921, '2022-07-07 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1832, 922, '2022-07-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1833, 922, '2022-07-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1834, 923, '2022-07-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1835, 923, '2022-07-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1836, 924, '2022-07-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1837, 924, '2022-07-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1838, 925, '2022-07-13 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1839, 925, '2022-07-13 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1840, 926, '2022-07-14 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1841, 926, '2022-07-14 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1842, 927, '2022-07-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1843, 927, '2022-07-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1844, 928, '2022-07-18 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1845, 928, '2022-07-18 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1846, 929, '2022-07-19 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1847, 929, '2022-07-19 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1848, 930, '2022-07-20 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1849, 930, '2022-07-20 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1850, 931, '2022-07-21 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1851, 931, '2022-07-21 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1852, 932, '2022-07-22 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1853, 932, '2022-07-22 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1854, 933, '2022-07-25 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1855, 933, '2022-07-25 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1856, 934, '2022-07-26 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1857, 934, '2022-07-26 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1858, 935, '2022-07-27 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1859, 935, '2022-07-27 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1860, 936, '2022-07-28 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1861, 936, '2022-07-28 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1862, 937, '2022-07-29 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1863, 937, '2022-07-29 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1864, 938, '2022-07-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1865, 938, '2022-07-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1866, 939, '2022-07-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1867, 939, '2022-07-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1868, 940, '2022-07-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1869, 940, '2022-07-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1870, 941, '2022-07-06 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1871, 941, '2022-07-06 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1872, 942, '2022-07-07 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1873, 942, '2022-07-07 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1874, 943, '2022-07-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1875, 943, '2022-07-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1876, 944, '2022-07-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1877, 944, '2022-07-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1878, 945, '2022-07-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1879, 945, '2022-07-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1880, 946, '2022-07-13 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1881, 946, '2022-07-13 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1882, 947, '2022-07-14 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1883, 947, '2022-07-14 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1884, 948, '2022-07-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1885, 948, '2022-07-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1886, 949, '2022-07-18 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1887, 949, '2022-07-18 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1888, 950, '2022-07-19 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1889, 950, '2022-07-19 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1890, 951, '2022-07-20 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1891, 951, '2022-07-20 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1892, 952, '2022-07-21 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1893, 952, '2022-07-21 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1894, 953, '2022-07-22 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1895, 953, '2022-07-22 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1896, 954, '2022-07-25 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1897, 954, '2022-07-25 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1898, 955, '2022-07-26 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1899, 955, '2022-07-26 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1900, 956, '2022-07-27 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1901, 956, '2022-07-27 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1902, 957, '2022-07-28 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1903, 957, '2022-07-28 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1904, 958, '2022-07-29 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1905, 958, '2022-07-29 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1906, 959, '2022-07-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1907, 959, '2022-07-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1908, 960, '2022-07-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1909, 960, '2022-07-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1910, 961, '2022-07-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1911, 961, '2022-07-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1912, 962, '2022-07-06 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1913, 962, '2022-07-06 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1914, 963, '2022-07-07 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1915, 963, '2022-07-07 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1916, 964, '2022-07-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1917, 964, '2022-07-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1918, 965, '2022-07-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1919, 965, '2022-07-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1920, 966, '2022-07-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1921, 966, '2022-07-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1922, 967, '2022-07-13 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1923, 967, '2022-07-13 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1924, 968, '2022-07-14 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1925, 968, '2022-07-14 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1926, 969, '2022-07-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1927, 969, '2022-07-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1928, 970, '2022-07-18 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1929, 970, '2022-07-18 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1930, 971, '2022-07-19 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1931, 971, '2022-07-19 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1932, 972, '2022-07-20 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1933, 972, '2022-07-20 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1934, 973, '2022-07-21 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1935, 973, '2022-07-21 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1936, 974, '2022-07-22 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1937, 974, '2022-07-22 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1938, 975, '2022-07-25 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1939, 975, '2022-07-25 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1940, 976, '2022-07-26 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1941, 976, '2022-07-26 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1942, 977, '2022-07-27 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1943, 977, '2022-07-27 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1944, 978, '2022-07-28 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1945, 978, '2022-07-28 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1946, 979, '2022-07-29 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1947, 979, '2022-07-29 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1948, 980, '2022-07-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1949, 980, '2022-07-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1950, 981, '2022-07-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1951, 981, '2022-07-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1952, 982, '2022-07-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1953, 982, '2022-07-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1954, 983, '2022-07-06 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1955, 983, '2022-07-06 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1956, 984, '2022-07-07 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1957, 984, '2022-07-07 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1958, 985, '2022-07-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1959, 985, '2022-07-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1960, 986, '2022-07-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1961, 986, '2022-07-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1962, 987, '2022-07-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1963, 987, '2022-07-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1964, 988, '2022-07-13 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1965, 988, '2022-07-13 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1966, 989, '2022-07-14 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1967, 989, '2022-07-14 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1968, 990, '2022-07-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1969, 990, '2022-07-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1970, 991, '2022-07-18 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1971, 991, '2022-07-18 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1972, 992, '2022-07-19 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1973, 992, '2022-07-19 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1974, 993, '2022-07-20 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1975, 993, '2022-07-20 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1976, 994, '2022-07-21 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1977, 994, '2022-07-21 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1978, 995, '2022-07-22 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1979, 995, '2022-07-22 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1980, 996, '2022-07-25 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1981, 996, '2022-07-25 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1982, 997, '2022-07-26 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1983, 997, '2022-07-26 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1984, 998, '2022-07-27 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1985, 998, '2022-07-27 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1986, 999, '2022-07-28 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1987, 999, '2022-07-28 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1988, 1000, '2022-07-29 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (1989, 1000, '2022-07-29 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2219, 1116, '2022-08-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2220, 1116, '2022-08-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2221, 1117, '2022-08-02 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2222, 1117, '2022-08-02 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2223, 1118, '2022-08-03 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2224, 1118, '2022-08-03 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2225, 1119, '2022-08-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2226, 1119, '2022-08-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2227, 1120, '2022-08-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2228, 1120, '2022-08-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2229, 1121, '2022-08-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2230, 1121, '2022-08-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2231, 1122, '2022-08-09 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2232, 1122, '2022-08-09 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2233, 1123, '2022-08-10 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2234, 1123, '2022-08-10 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2235, 1124, '2022-08-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2236, 1124, '2022-08-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2237, 1125, '2022-08-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2238, 1125, '2022-08-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2239, 1126, '2022-08-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2240, 1126, '2022-08-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2241, 1127, '2022-08-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2242, 1127, '2022-08-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2243, 1128, '2022-08-02 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2244, 1128, '2022-08-02 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2245, 1129, '2022-08-03 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2246, 1129, '2022-08-03 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2247, 1130, '2022-08-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2248, 1130, '2022-08-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2249, 1131, '2022-08-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2250, 1131, '2022-08-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2251, 1132, '2022-08-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2252, 1132, '2022-08-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2253, 1133, '2022-08-09 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2254, 1133, '2022-08-09 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2255, 1134, '2022-08-10 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2256, 1134, '2022-08-10 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2257, 1135, '2022-08-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2258, 1135, '2022-08-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2259, 1136, '2022-08-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2260, 1136, '2022-08-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2261, 1137, '2022-08-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2262, 1137, '2022-08-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2263, 1138, '2022-08-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2264, 1138, '2022-08-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2265, 1139, '2022-08-02 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2266, 1139, '2022-08-02 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2267, 1140, '2022-08-03 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2268, 1140, '2022-08-03 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2269, 1141, '2022-08-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2270, 1141, '2022-08-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2271, 1142, '2022-08-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2272, 1142, '2022-08-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2273, 1143, '2022-08-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2274, 1143, '2022-08-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2275, 1144, '2022-08-09 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2276, 1144, '2022-08-09 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2277, 1145, '2022-08-10 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2278, 1145, '2022-08-10 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2279, 1146, '2022-08-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2280, 1146, '2022-08-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2281, 1147, '2022-08-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2282, 1147, '2022-08-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2283, 1148, '2022-08-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2284, 1148, '2022-08-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2285, 1149, '2022-08-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2286, 1149, '2022-08-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2287, 1150, '2022-08-02 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2288, 1150, '2022-08-02 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2289, 1151, '2022-08-03 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2290, 1151, '2022-08-03 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2291, 1152, '2022-08-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2292, 1152, '2022-08-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2293, 1153, '2022-08-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2294, 1153, '2022-08-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2295, 1154, '2022-08-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2296, 1154, '2022-08-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2297, 1155, '2022-08-09 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2298, 1155, '2022-08-09 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2299, 1156, '2022-08-10 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2300, 1156, '2022-08-10 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2301, 1157, '2022-08-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2302, 1157, '2022-08-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2303, 1158, '2022-08-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2304, 1158, '2022-08-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2305, 1159, '2022-08-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2306, 1159, '2022-08-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2307, 1160, '2022-08-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2308, 1160, '2022-08-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2309, 1161, '2022-08-02 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2310, 1161, '2022-08-02 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2311, 1162, '2022-08-03 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2312, 1162, '2022-08-03 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2313, 1163, '2022-08-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2314, 1163, '2022-08-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2315, 1164, '2022-08-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2316, 1164, '2022-08-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2317, 1165, '2022-08-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2318, 1165, '2022-08-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2319, 1166, '2022-08-09 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2320, 1166, '2022-08-09 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2321, 1167, '2022-08-10 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2322, 1167, '2022-08-10 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2323, 1168, '2022-08-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2324, 1168, '2022-08-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2325, 1169, '2022-08-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2326, 1169, '2022-08-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2327, 1170, '2022-08-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2328, 1170, '2022-08-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2329, 1171, '2022-08-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2330, 1171, '2022-08-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2331, 1172, '2022-08-02 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2332, 1172, '2022-08-02 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2333, 1173, '2022-08-03 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2334, 1173, '2022-08-03 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2335, 1174, '2022-08-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2336, 1174, '2022-08-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2337, 1175, '2022-08-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2338, 1175, '2022-08-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2339, 1176, '2022-08-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2340, 1176, '2022-08-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2341, 1177, '2022-08-09 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2342, 1177, '2022-08-09 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2343, 1178, '2022-08-10 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2344, 1178, '2022-08-10 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2345, 1179, '2022-08-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2346, 1179, '2022-08-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2347, 1180, '2022-08-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2348, 1180, '2022-08-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2349, 1181, '2022-08-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2350, 1181, '2022-08-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2351, 1182, '2022-08-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2352, 1182, '2022-08-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2353, 1183, '2022-08-02 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2354, 1183, '2022-08-02 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2355, 1184, '2022-08-03 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2356, 1184, '2022-08-03 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2357, 1185, '2022-08-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2358, 1185, '2022-08-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2359, 1186, '2022-08-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2360, 1186, '2022-08-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2361, 1187, '2022-08-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2362, 1187, '2022-08-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2363, 1188, '2022-08-09 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2364, 1188, '2022-08-09 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2365, 1189, '2022-08-10 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2366, 1189, '2022-08-10 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2367, 1190, '2022-08-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2368, 1190, '2022-08-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2369, 1191, '2022-08-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2370, 1191, '2022-08-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2371, 1192, '2022-08-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2372, 1192, '2022-08-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2373, 1193, '2022-08-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2374, 1193, '2022-08-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2375, 1194, '2022-08-02 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2376, 1194, '2022-08-02 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2377, 1195, '2022-08-03 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2378, 1195, '2022-08-03 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2379, 1196, '2022-08-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2380, 1196, '2022-08-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2381, 1197, '2022-08-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2382, 1197, '2022-08-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2383, 1198, '2022-08-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2384, 1198, '2022-08-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2385, 1199, '2022-08-09 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2386, 1199, '2022-08-09 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2387, 1200, '2022-08-10 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2388, 1200, '2022-08-10 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2389, 1201, '2022-08-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2390, 1201, '2022-08-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2391, 1202, '2022-08-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2392, 1202, '2022-08-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2393, 1203, '2022-08-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2394, 1203, '2022-08-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2395, 1204, '2022-08-01 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2396, 1204, '2022-08-01 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2397, 1205, '2022-08-02 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2398, 1205, '2022-08-02 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2399, 1206, '2022-08-03 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2400, 1206, '2022-08-03 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2401, 1207, '2022-08-04 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2402, 1207, '2022-08-04 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2403, 1208, '2022-08-05 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2404, 1208, '2022-08-05 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2405, 1209, '2022-08-08 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2406, 1209, '2022-08-08 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2407, 1210, '2022-08-09 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2408, 1210, '2022-08-09 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2409, 1211, '2022-08-10 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2410, 1211, '2022-08-10 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2411, 1212, '2022-08-11 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2412, 1212, '2022-08-11 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:14', '2022-08-15 01:28:14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2413, 1213, '2022-08-12 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:14', '2022-08-15 01:28:14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2414, 1213, '2022-08-12 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:14', '2022-08-15 01:28:14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2415, 1214, '2022-08-15 08:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:14', '2022-08-15 01:28:14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2416, 1214, '2022-08-15 18:00:00', '113.185.46.228', '21.0277644', '105.8341598', 1, NULL, '2022-08-15 01:28:14', '2022-08-15 01:28:14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2417, 1137, '2022-08-15 11:30:39', '2001:ee0:4161:327d:38ea:71f6:ef3b:12c8', '21.0504815', '105.7829197', 0, NULL, '2022-08-15 11:30:39', '2022-08-15 11:30:39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2418, 1148, '2022-08-15 15:20:57', '14.232.245.144', '21.0012507', '105.7938183', 0, NULL, '2022-08-15 15:20:57', '2022-08-15 15:20:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2419, 1148, '2022-08-15 17:54:15', '14.232.245.144', '21.0012507', '105.7938183', 0, NULL, '2022-08-15 17:54:15', '2022-08-15 17:54:15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2420, 1126, '2022-08-15 21:44:05', '14.248.94.184', '21.0424189', '105.749372', 0, NULL, '2022-08-15 21:44:05', '2022-08-15 21:44:05', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2421, 1126, '2022-08-15 21:55:34', '14.248.94.184', '21.0424189', '105.749372', 0, NULL, '2022-08-15 21:55:34', '2022-08-15 21:55:34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2422, 1126, '2022-08-15 22:07:59', '14.248.94.184', '21.0424189', '105.749372', 0, NULL, '2022-08-15 22:07:59', '2022-08-15 22:07:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2423, 1215, '2022-08-16 00:14:13', '127.0.0.1', '21.0277644', '105.8341598', 1, NULL, '2022-08-16 00:14:15', '2022-08-16 00:14:15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2424, 1215, '2022-08-16 02:49:26', '14.248.94.184', '21.0424021', '105.7493768', 1, NULL, '2022-08-16 02:49:26', '2022-08-16 02:49:26', 'Mozilla/5.0 (Linux; Android 10; Redmi K20 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Mobile Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2425, 1215, '2022-08-16 02:50:39', '14.248.94.184', '21.0424021', '105.7493768', 1, NULL, '2022-08-16 02:50:39', '2022-08-16 02:50:39', 'Mozilla/5.0 (Linux; Android 10; Redmi K20 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Mobile Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2426, 1215, '2022-08-16 02:51:02', '14.248.94.184', '21.0424021', '105.7493768', 1, NULL, '2022-08-16 02:51:02', '2022-08-16 02:51:02', 'Mozilla/5.0 (Linux; Android 10; Redmi K20 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Mobile Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2427, 1219, '2022-08-16 08:52:18', '14.232.245.144', '21.0012507', '105.7938183', 1, NULL, '2022-08-16 08:52:18', '2022-08-16 08:52:18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2428, 1220, '2022-08-16 10:09:01', '222.252.28.187', '21.0012507', '105.7938183', 1, NULL, '2022-08-16 10:09:01', '2022-08-16 10:09:01', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2429, 1220, '2022-08-16 10:09:40', '222.252.28.187', '20.9947112', '105.805296', 1, NULL, '2022-08-16 10:09:40', '2022-08-16 10:09:40', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2430, 1220, '2022-08-16 10:24:48', '222.252.28.187', '21.0012507', '105.7938183', 1, NULL, '2022-08-16 10:24:48', '2022-08-16 10:24:48', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2431, 1220, '2022-08-16 10:27:13', '222.252.28.187', '20.9947328', '105.80531', 1, NULL, '2022-08-16 10:27:13', '2022-08-16 10:27:13', 'Mozilla/5.0 (Linux; Android 11; SM-A217F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.58 Mobile Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2432, 1221, '2022-08-17 17:15:20', '113.185.47.83', '20.9944747', '105.8051981', 1, NULL, '2022-08-17 17:15:20', '2022-08-17 17:15:20', 'Mozilla/5.0 (Linux; Android 11; SM-A217F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.58 Mobile Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2433, 1222, '2022-08-17 20:57:40', '2001:ee0:4161:327d:b468:a3af:a6:fc68', '21.0505198', '105.7829344', 1, NULL, '2022-08-17 20:57:41', '2022-08-17 20:57:41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2434, 1222, '2022-08-17 21:25:02', '2001:ee0:4161:327d:b468:a3af:a6:fc68', '21.0505198', '105.7829344', 1, NULL, '2022-08-17 21:25:02', '2022-08-17 21:25:02', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2435, 1223, '2022-08-18 00:15:06', '14.248.94.184', '21.0520642', '105.746865', 1, NULL, '2022-08-18 00:15:06', '2022-08-18 00:15:06', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2436, 1223, '2022-08-18 00:16:18', '14.248.94.184', '21.0520642', '105.746865', 0, NULL, '2022-08-18 00:16:18', '2022-08-18 00:16:18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2437, 1223, '2022-08-18 00:16:57', '14.248.94.184', '21.0520642', '105.746865', 0, NULL, '2022-08-18 00:16:57', '2022-08-18 00:16:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2438, 1223, '2022-08-18 00:17:11', '14.248.94.184', '21.0520642', '105.746865', 1, NULL, '2022-08-18 00:17:12', '2022-08-18 00:17:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2439, 1223, '2022-08-18 17:24:13', '14.232.245.144', '21.0012507', '105.7938183', 1, NULL, '2022-08-18 17:24:13', '2022-08-18 17:24:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2440, 1224, '2022-08-19 17:31:07', '222.252.28.187', '20.9947192', '105.805304', 1, NULL, '2022-08-19 17:31:07', '2022-08-19 17:31:07', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2441, 1224, '2022-08-19 22:57:52', '14.248.94.184', '21.0424344', '105.7493801', 1, NULL, '2022-08-19 22:57:52', '2022-08-19 22:57:52', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2442, 1306, '2022-08-20 08:31:21', '14.232.245.144', '20.9976913', '105.7951525', 0, NULL, '2022-08-20 08:31:21', '2022-08-20 08:31:21', 'Mozilla/5.0 (Linux; Android 10; Redmi K20 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Mobile Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2443, 1230, '2022-08-20 08:33:21', '127.0.0.1', '12.0215554', '12.0215554', 0, NULL, '2022-08-20 08:33:22', '2022-08-20 08:33:22', 'PostmanRuntime/7.29.2');
INSERT INTO `timekeep_logs` VALUES (2445, 1230, '2022-08-20 08:35:42', '127.0.0.1', '12.0215554', '12.0215554', 0, NULL, '2022-08-20 08:35:48', '2022-08-20 08:35:48', 'PostmanRuntime/7.29.2');
INSERT INTO `timekeep_logs` VALUES (2446, 1230, '2022-08-20 08:37:44', '127.0.0.1', '12.0215554', '12.0215554', 1, NULL, '2022-08-20 08:37:45', '2022-08-20 08:37:45', 'PostmanRuntime/7.29.2');
INSERT INTO `timekeep_logs` VALUES (2448, 1230, '2022-08-20 08:49:14', '127.0.0.1', '12.0215554', '12.0215554', 1, NULL, '2022-08-20 08:49:16', '2022-08-20 08:49:16', 'PostmanRuntime/7.29.2');
INSERT INTO `timekeep_logs` VALUES (2449, 1230, '2022-08-20 08:50:39', '127.0.0.1', '12.0215554', '12.0215554', 1, NULL, '2022-08-20 08:50:40', '2022-08-20 08:50:40', 'PostmanRuntime/7.29.2');
INSERT INTO `timekeep_logs` VALUES (2450, 1230, '2022-08-20 08:51:00', '127.0.0.1', '12.0215554', '12.0215554', 1, NULL, '2022-08-20 08:51:02', '2022-08-20 08:51:02', 'PostmanRuntime/7.29.2');
INSERT INTO `timekeep_logs` VALUES (2451, 1230, '2022-08-20 08:51:48', '127.0.0.1', '12.0215554', '12.0215554', 1, NULL, '2022-08-20 08:51:49', '2022-08-20 08:51:49', 'PostmanRuntime/7.29.2');
INSERT INTO `timekeep_logs` VALUES (2452, 1230, '2022-08-20 08:53:04', '127.0.0.1', '12.0215554', '12.0215554', 1, NULL, '2022-08-20 08:53:05', '2022-08-20 08:53:05', 'PostmanRuntime/7.29.2');
INSERT INTO `timekeep_logs` VALUES (2453, 1230, '2022-08-20 08:53:24', '127.0.0.1', '12.0215554', '12.0215554', 1, NULL, '2022-08-20 08:53:25', '2022-08-20 08:53:25', 'PostmanRuntime/7.29.2');
INSERT INTO `timekeep_logs` VALUES (2455, 1230, '2022-08-20 09:00:17', '127.0.0.1', '12.0215554', '12.0215554', 1, NULL, '2022-08-20 09:00:19', '2022-08-20 09:00:19', 'PostmanRuntime/7.29.2');
INSERT INTO `timekeep_logs` VALUES (2456, 1326, '2022-08-20 11:42:28', '118.70.171.167', '20.9780671', '105.7938184', 0, NULL, '2022-08-20 11:42:28', '2022-08-20 11:42:28', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.134 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2457, 1230, '2022-08-20 12:24:41', '127.0.0.1', '21.0424289', '105.7493839', 1, NULL, '2022-08-20 12:24:42', '2022-08-20 12:24:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2458, 1378, '2022-08-20 12:30:51', '127.0.0.1', '21.0424382', '105.7493855', 1, NULL, '2022-08-20 12:30:52', '2022-08-20 12:30:52', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2459, 1379, '2022-08-20 12:33:35', '127.0.0.1', '21.0424268', '105.7493911', 1, NULL, '2022-08-20 12:33:36', '2022-08-20 12:33:36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2460, 1380, '2022-08-20 12:35:52', '127.0.0.1', '21.0424429', '105.7493832', 1, NULL, '2022-08-20 12:35:53', '2022-08-20 12:35:53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2461, 1326, '2022-08-20 12:47:58', '118.70.171.167', '20.9780671', '105.7938184', 0, NULL, '2022-08-20 12:47:58', '2022-08-20 12:47:58', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.134 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2462, 1380, '2022-08-20 13:06:33', '127.0.0.1', '21.0424429', '105.7493832', 1, NULL, '2022-08-20 13:06:34', '2022-08-20 13:06:34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2463, 1326, '2022-08-20 13:10:52', '118.70.171.167', '20.9780671', '105.7938184', 0, NULL, '2022-08-20 13:10:52', '2022-08-20 13:10:52', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.134 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2464, 1326, '2022-08-20 13:16:45', '118.70.171.167', '20.9780671', '105.7938184', 0, NULL, '2022-08-20 13:16:45', '2022-08-20 13:16:45', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.134 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2465, 1326, '2022-08-20 13:19:46', '118.70.171.167', '20.9780671', '105.7938184', 0, NULL, '2022-08-20 13:19:46', '2022-08-20 13:19:46', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.134 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2466, 1326, '2022-08-20 13:23:53', '118.70.171.167', '20.9780671', '105.7938184', 0, NULL, '2022-08-20 13:23:54', '2022-08-20 13:23:54', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.134 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2467, 1231, '2022-08-21 08:33:51', '127.0.0.1', '21.0424282', '105.7493883', 0, NULL, '2022-08-21 08:33:51', '2022-08-21 08:33:51', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');
INSERT INTO `timekeep_logs` VALUES (2468, 1289, '2022-08-21 10:00:18', '27.72.29.21', '20.9802854', '105.7703402', 0, NULL, '2022-08-21 10:00:18', '2022-08-21 10:00:18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');

-- ----------------------------
-- Table structure for timekeeps
-- ----------------------------
DROP TABLE IF EXISTS `timekeeps`;
CREATE TABLE `timekeeps`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` bigint NOT NULL,
  `date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` tinyint NOT NULL DEFAULT 1,
  `worktime` double(8, 1) NOT NULL DEFAULT 0.0,
  `minute_late` double(8, 1) NOT NULL DEFAULT 0.0,
  `minute_early` double(8, 1) NOT NULL DEFAULT 0.0,
  `overtime_hour` double(8, 1) NOT NULL DEFAULT 0.0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `timekeeps_employee_id_index`(`employee_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1381 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of timekeeps
-- ----------------------------
INSERT INTO `timekeeps` VALUES (812, 1, '2022-07-01', NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (813, 1, '2022-07-04', NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (814, 1, '2022-07-05', NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 1, 1.0, 0.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (815, 1, '2022-07-06', NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (816, 1, '2022-07-07', NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (817, 1, '2022-07-08', NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 1, 1.0, 11.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (818, 1, '2022-07-11', NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (819, 1, '2022-07-12', NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (820, 1, '2022-07-13', NULL, '2022-08-14 14:41:26', '2022-08-14 14:41:26', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (821, 1, '2022-07-14', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (822, 1, '2022-07-15', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (823, 1, '2022-07-18', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (824, 1, '2022-07-19', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 11.0, 0.0);
INSERT INTO `timekeeps` VALUES (825, 1, '2022-07-20', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (826, 1, '2022-07-21', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (827, 1, '2022-07-22', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 5.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (828, 1, '2022-07-25', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 5.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (829, 1, '2022-07-26', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (830, 1, '2022-07-27', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (831, 1, '2022-07-28', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (832, 1, '2022-07-29', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 5.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (833, 5, '2022-07-01', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (834, 5, '2022-07-04', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (835, 5, '2022-07-05', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (836, 5, '2022-07-06', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 5.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (837, 5, '2022-07-07', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (838, 5, '2022-07-08', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 5.0, 0.0);
INSERT INTO `timekeeps` VALUES (839, 5, '2022-07-11', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (840, 5, '2022-07-12', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 5.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (841, 5, '2022-07-13', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (842, 5, '2022-07-14', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (843, 5, '2022-07-15', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (844, 5, '2022-07-18', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 5.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (845, 5, '2022-07-19', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 5.0, 1.0);
INSERT INTO `timekeeps` VALUES (846, 5, '2022-07-20', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (847, 5, '2022-07-21', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (848, 5, '2022-07-22', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (849, 5, '2022-07-25', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (850, 5, '2022-07-26', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 11.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (851, 5, '2022-07-27', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (852, 5, '2022-07-28', NULL, '2022-08-14 14:41:27', '2022-08-14 14:41:27', 1, 1.0, 0.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (853, 5, '2022-07-29', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 5.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (854, 13, '2022-07-01', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (855, 13, '2022-07-04', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 5.0, 5.0);
INSERT INTO `timekeeps` VALUES (856, 13, '2022-07-05', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 11.0, 5.0, 5.0);
INSERT INTO `timekeeps` VALUES (857, 13, '2022-07-06', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (858, 13, '2022-07-07', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 11.0, 1.0);
INSERT INTO `timekeeps` VALUES (859, 13, '2022-07-08', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (860, 13, '2022-07-11', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (861, 13, '2022-07-12', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (862, 13, '2022-07-13', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (863, 13, '2022-07-14', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (864, 13, '2022-07-15', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 11.0, 4.0);
INSERT INTO `timekeeps` VALUES (865, 13, '2022-07-18', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 5.0, 0.0);
INSERT INTO `timekeeps` VALUES (866, 13, '2022-07-19', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 11.0, 11.0, 4.0);
INSERT INTO `timekeeps` VALUES (867, 13, '2022-07-20', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (868, 13, '2022-07-21', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (869, 13, '2022-07-22', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (870, 13, '2022-07-25', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (871, 13, '2022-07-26', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (872, 13, '2022-07-27', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (873, 13, '2022-07-28', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (874, 13, '2022-07-29', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (875, 14, '2022-07-01', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (876, 14, '2022-07-04', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (877, 14, '2022-07-05', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (878, 14, '2022-07-06', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (879, 14, '2022-07-07', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (880, 14, '2022-07-08', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (881, 14, '2022-07-11', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 5.0, 5.0);
INSERT INTO `timekeeps` VALUES (882, 14, '2022-07-12', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (883, 14, '2022-07-13', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 11.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (884, 14, '2022-07-14', NULL, '2022-08-14 14:41:28', '2022-08-14 14:41:28', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (885, 14, '2022-07-15', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (886, 14, '2022-07-18', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 5.0, 1.0);
INSERT INTO `timekeeps` VALUES (887, 14, '2022-07-19', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 11.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (888, 14, '2022-07-20', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 11.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (889, 14, '2022-07-21', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (890, 14, '2022-07-22', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (891, 14, '2022-07-25', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 5.0, 11.0, 1.0);
INSERT INTO `timekeeps` VALUES (892, 14, '2022-07-26', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (893, 14, '2022-07-27', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 5.0, 2.0);
INSERT INTO `timekeeps` VALUES (894, 14, '2022-07-28', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (895, 14, '2022-07-29', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 5.0, 3.0);
INSERT INTO `timekeeps` VALUES (896, 17, '2022-07-01', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (897, 17, '2022-07-04', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (898, 17, '2022-07-05', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 11.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (899, 17, '2022-07-06', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (900, 17, '2022-07-07', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (901, 17, '2022-07-08', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (902, 17, '2022-07-11', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 11.0, 0.0);
INSERT INTO `timekeeps` VALUES (903, 17, '2022-07-12', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (904, 17, '2022-07-13', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (905, 17, '2022-07-14', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 11.0, 4.0);
INSERT INTO `timekeeps` VALUES (906, 17, '2022-07-15', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (907, 17, '2022-07-18', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 11.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (908, 17, '2022-07-19', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (909, 17, '2022-07-20', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 11.0, 3.0);
INSERT INTO `timekeeps` VALUES (910, 17, '2022-07-21', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (911, 17, '2022-07-22', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (912, 17, '2022-07-25', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 5.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (913, 17, '2022-07-26', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 5.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (914, 17, '2022-07-27', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (915, 17, '2022-07-28', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (916, 17, '2022-07-29', NULL, '2022-08-14 14:41:29', '2022-08-14 14:41:29', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (917, 103, '2022-07-01', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 11.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (918, 103, '2022-07-04', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (919, 103, '2022-07-05', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (920, 103, '2022-07-06', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (921, 103, '2022-07-07', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (922, 103, '2022-07-08', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (923, 103, '2022-07-11', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (924, 103, '2022-07-12', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (925, 103, '2022-07-13', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (926, 103, '2022-07-14', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (927, 103, '2022-07-15', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (928, 103, '2022-07-18', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (929, 103, '2022-07-19', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (930, 103, '2022-07-20', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (931, 103, '2022-07-21', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 5.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (932, 103, '2022-07-22', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (933, 103, '2022-07-25', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (934, 103, '2022-07-26', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (935, 103, '2022-07-27', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (936, 103, '2022-07-28', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (937, 103, '2022-07-29', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (938, 120, '2022-07-01', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 11.0, 0.0);
INSERT INTO `timekeeps` VALUES (939, 120, '2022-07-04', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (940, 120, '2022-07-05', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (941, 120, '2022-07-06', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (942, 120, '2022-07-07', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (943, 120, '2022-07-08', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (944, 120, '2022-07-11', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (945, 120, '2022-07-12', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 5.0, 5.0);
INSERT INTO `timekeeps` VALUES (946, 120, '2022-07-13', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 5.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (947, 120, '2022-07-14', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (948, 120, '2022-07-15', NULL, '2022-08-14 14:41:30', '2022-08-14 14:41:30', 1, 1.0, 0.0, 11.0, 1.0);
INSERT INTO `timekeeps` VALUES (949, 120, '2022-07-18', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (950, 120, '2022-07-19', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (951, 120, '2022-07-20', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 11.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (952, 120, '2022-07-21', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 5.0, 1.0);
INSERT INTO `timekeeps` VALUES (953, 120, '2022-07-22', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (954, 120, '2022-07-25', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (955, 120, '2022-07-26', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (956, 120, '2022-07-27', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 11.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (957, 120, '2022-07-28', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (958, 120, '2022-07-29', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 5.0, 3.0);
INSERT INTO `timekeeps` VALUES (959, 121, '2022-07-01', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 11.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (960, 121, '2022-07-04', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (961, 121, '2022-07-05', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (962, 121, '2022-07-06', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (963, 121, '2022-07-07', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 11.0, 2.0);
INSERT INTO `timekeeps` VALUES (964, 121, '2022-07-08', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (965, 121, '2022-07-11', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (966, 121, '2022-07-12', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (967, 121, '2022-07-13', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 5.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (968, 121, '2022-07-14', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 5.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (969, 121, '2022-07-15', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (970, 121, '2022-07-18', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (971, 121, '2022-07-19', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (972, 121, '2022-07-20', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (973, 121, '2022-07-21', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (974, 121, '2022-07-22', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (975, 121, '2022-07-25', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (976, 121, '2022-07-26', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (977, 121, '2022-07-27', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 5.0, 4.0);
INSERT INTO `timekeeps` VALUES (978, 121, '2022-07-28', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 5.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (979, 121, '2022-07-29', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (980, 126, '2022-07-01', NULL, '2022-08-14 14:41:31', '2022-08-14 14:41:31', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (981, 126, '2022-07-04', NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (982, 126, '2022-07-05', NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 1, 1.0, 0.0, 5.0, 2.0);
INSERT INTO `timekeeps` VALUES (983, 126, '2022-07-06', NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (984, 126, '2022-07-07', NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 1, 1.0, 5.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (985, 126, '2022-07-08', NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (986, 126, '2022-07-11', NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (987, 126, '2022-07-12', NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 1, 1.0, 0.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (988, 126, '2022-07-13', NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (989, 126, '2022-07-14', NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 1, 1.0, 11.0, 5.0, 5.0);
INSERT INTO `timekeeps` VALUES (990, 126, '2022-07-15', NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (991, 126, '2022-07-18', NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (992, 126, '2022-07-19', NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 1, 1.0, 5.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (993, 126, '2022-07-20', NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (994, 126, '2022-07-21', NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (995, 126, '2022-07-22', NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (996, 126, '2022-07-25', NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (997, 126, '2022-07-26', NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 1, 1.0, 0.0, 11.0, 5.0);
INSERT INTO `timekeeps` VALUES (998, 126, '2022-07-27', NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 1, 1.0, 0.0, 11.0, 1.0);
INSERT INTO `timekeeps` VALUES (999, 126, '2022-07-28', NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (1000, 126, '2022-07-29', NULL, '2022-08-14 14:41:32', '2022-08-14 14:41:32', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (1116, 1, '2022-08-01', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (1117, 1, '2022-08-02', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 0.0, 6.0, 4.0);
INSERT INTO `timekeeps` VALUES (1118, 1, '2022-08-03', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 5.0, 5.0, 3.0);
INSERT INTO `timekeeps` VALUES (1119, 1, '2022-08-04', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (1120, 1, '2022-08-05', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 6.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (1121, 1, '2022-08-08', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (1122, 1, '2022-08-09', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 0.0, 11.0, 3.0);
INSERT INTO `timekeeps` VALUES (1123, 1, '2022-08-10', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1124, 1, '2022-08-11', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 5.0, 6.0, 2.0);
INSERT INTO `timekeeps` VALUES (1125, 1, '2022-08-12', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (1126, 1, '2022-08-15', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (1127, 5, '2022-08-01', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 5.0, 11.0, 3.0);
INSERT INTO `timekeeps` VALUES (1128, 5, '2022-08-02', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1129, 5, '2022-08-03', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (1130, 5, '2022-08-04', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 0.0, 6.0, 0.0);
INSERT INTO `timekeeps` VALUES (1131, 5, '2022-08-05', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (1132, 5, '2022-08-08', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1133, 5, '2022-08-09', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 0.0, 6.0, 0.0);
INSERT INTO `timekeeps` VALUES (1134, 5, '2022-08-10', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 6.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (1135, 5, '2022-08-11', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 11.0, 20.0, 4.0);
INSERT INTO `timekeeps` VALUES (1136, 5, '2022-08-12', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 0.0, 5.0, 4.0);
INSERT INTO `timekeeps` VALUES (1137, 5, '2022-08-15', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (1138, 13, '2022-08-01', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 5.0, 6.0, 0.0);
INSERT INTO `timekeeps` VALUES (1139, 13, '2022-08-02', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (1140, 13, '2022-08-03', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 20.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (1141, 13, '2022-08-04', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 0.0, 11.0, 1.0);
INSERT INTO `timekeeps` VALUES (1142, 13, '2022-08-05', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 0.0, 6.0, 4.0);
INSERT INTO `timekeeps` VALUES (1143, 13, '2022-08-08', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 0.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (1144, 13, '2022-08-09', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (1145, 13, '2022-08-10', NULL, '2022-08-15 01:28:11', '2022-08-15 01:28:11', 1, 1.0, 6.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1146, 13, '2022-08-11', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (1147, 13, '2022-08-12', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 20.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (1148, 13, '2022-08-15', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (1149, 14, '2022-08-01', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 20.0, 3.0);
INSERT INTO `timekeeps` VALUES (1150, 14, '2022-08-02', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 11.0, 6.0, 5.0);
INSERT INTO `timekeeps` VALUES (1151, 14, '2022-08-03', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 5.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (1152, 14, '2022-08-04', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 6.0, 6.0, 5.0);
INSERT INTO `timekeeps` VALUES (1153, 14, '2022-08-05', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 11.0, 5.0, 5.0);
INSERT INTO `timekeeps` VALUES (1154, 14, '2022-08-08', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 5.0, 2.0);
INSERT INTO `timekeeps` VALUES (1155, 14, '2022-08-09', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (1156, 14, '2022-08-10', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (1157, 14, '2022-08-11', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (1158, 14, '2022-08-12', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 6.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (1159, 14, '2022-08-15', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (1160, 17, '2022-08-01', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 5.0, 6.0, 2.0);
INSERT INTO `timekeeps` VALUES (1161, 17, '2022-08-02', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (1162, 17, '2022-08-03', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 11.0, 0.0);
INSERT INTO `timekeeps` VALUES (1163, 17, '2022-08-04', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 5.0, 4.0);
INSERT INTO `timekeeps` VALUES (1164, 17, '2022-08-05', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 11.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (1165, 17, '2022-08-08', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 20.0, 6.0, 0.0);
INSERT INTO `timekeeps` VALUES (1166, 17, '2022-08-09', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1167, 17, '2022-08-10', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 5.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (1168, 17, '2022-08-11', NULL, '2022-08-15 01:28:12', '2022-08-19 22:48:13', 7, 1.0, 535.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (1169, 17, '2022-08-12', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (1170, 17, '2022-08-15', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1171, 103, '2022-08-01', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 5.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (1172, 103, '2022-08-02', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1173, 103, '2022-08-03', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 5.0, 0.0);
INSERT INTO `timekeeps` VALUES (1174, 103, '2022-08-04', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1175, 103, '2022-08-05', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (1176, 103, '2022-08-08', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (1177, 103, '2022-08-09', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (1178, 103, '2022-08-10', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (1179, 103, '2022-08-11', NULL, '2022-08-15 01:28:12', '2022-08-15 01:28:12', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (1180, 103, '2022-08-12', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 20.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (1181, 103, '2022-08-15', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 0.0, 20.0, 1.0);
INSERT INTO `timekeeps` VALUES (1182, 120, '2022-08-01', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 20.0, 11.0, 0.0);
INSERT INTO `timekeeps` VALUES (1183, 120, '2022-08-02', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 6.0, 20.0, 3.0);
INSERT INTO `timekeeps` VALUES (1184, 120, '2022-08-03', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 11.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (1185, 120, '2022-08-04', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (1186, 120, '2022-08-05', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 11.0, 20.0, 1.0);
INSERT INTO `timekeeps` VALUES (1187, 120, '2022-08-08', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 5.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (1188, 120, '2022-08-09', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 6.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (1189, 120, '2022-08-10', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 0.0, 11.0, 0.0);
INSERT INTO `timekeeps` VALUES (1190, 120, '2022-08-11', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 6.0, 11.0, 4.0);
INSERT INTO `timekeeps` VALUES (1191, 120, '2022-08-12', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (1192, 120, '2022-08-15', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 0.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (1193, 121, '2022-08-01', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 11.0, 6.0, 1.0);
INSERT INTO `timekeeps` VALUES (1194, 121, '2022-08-02', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 0.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (1195, 121, '2022-08-03', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (1196, 121, '2022-08-04', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 20.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (1197, 121, '2022-08-05', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 0.0, 20.0, 3.0);
INSERT INTO `timekeeps` VALUES (1198, 121, '2022-08-08', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (1199, 121, '2022-08-09', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 0.0, 5.0, 1.0);
INSERT INTO `timekeeps` VALUES (1200, 121, '2022-08-10', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 5.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (1201, 121, '2022-08-11', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 0.0, 20.0, 1.0);
INSERT INTO `timekeeps` VALUES (1202, 121, '2022-08-12', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 6.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (1203, 121, '2022-08-15', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 0.0, 5.0, 3.0);
INSERT INTO `timekeeps` VALUES (1204, 126, '2022-08-01', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 0.0, 6.0, 5.0);
INSERT INTO `timekeeps` VALUES (1205, 126, '2022-08-02', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1206, 126, '2022-08-03', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1207, 126, '2022-08-04', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 5.0, 20.0, 2.0);
INSERT INTO `timekeeps` VALUES (1208, 126, '2022-08-05', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 20.0, 0.0, 1.0);
INSERT INTO `timekeeps` VALUES (1209, 126, '2022-08-08', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 5.0, 0.0, 4.0);
INSERT INTO `timekeeps` VALUES (1210, 126, '2022-08-09', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 0.0, 11.0, 3.0);
INSERT INTO `timekeeps` VALUES (1211, 126, '2022-08-10', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 0.0, 0.0, 2.0);
INSERT INTO `timekeeps` VALUES (1212, 126, '2022-08-11', NULL, '2022-08-15 01:28:13', '2022-08-15 01:28:13', 1, 1.0, 5.0, 0.0, 5.0);
INSERT INTO `timekeeps` VALUES (1213, 126, '2022-08-12', NULL, '2022-08-15 01:28:14', '2022-08-15 01:28:14', 1, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1214, 126, '2022-08-15', NULL, '2022-08-15 01:28:14', '2022-08-15 01:28:14', 1, 1.0, 0.0, 0.0, 3.0);
INSERT INTO `timekeeps` VALUES (1215, 17, '2022-08-16', NULL, '2022-08-16 00:14:14', '2022-08-16 02:51:02', 1, 1.0, 0.0, 783.0, 0.0);
INSERT INTO `timekeeps` VALUES (1216, 1, '2022-07-02', NULL, '2022-08-16 08:40:47', '2022-08-16 08:40:47', 7, 0.5, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1217, 1, '2022-07-17', NULL, '2022-08-16 08:40:47', '2022-08-16 08:40:47', 7, 0.5, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1218, 17, '2022-07-23', NULL, '2022-08-16 08:40:47', '2022-08-16 08:40:47', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1219, 13, '2022-08-16', NULL, '2022-08-16 08:52:18', '2022-08-19 22:48:13', 7, 1.0, 47.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1220, 1, '2022-08-16', NULL, '2022-08-16 10:09:01', '2022-08-19 22:48:12', 7, 1.0, 124.0, 327.0, 0.0);
INSERT INTO `timekeeps` VALUES (1221, 1, '2022-08-17', NULL, '2022-08-17 17:15:20', '2022-08-19 22:48:12', 7, 1.0, 550.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1222, 5, '2022-08-17', NULL, '2022-08-17 20:57:40', '2022-08-17 21:25:02', 1, 1.0, 772.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1223, 17, '2022-08-18', NULL, '2022-08-18 00:15:06', '2022-08-18 00:17:11', 1, 1.0, 0.0, 937.0, 0.0);
INSERT INTO `timekeeps` VALUES (1224, 1, '2022-08-19', NULL, '2022-08-19 17:31:07', '2022-08-19 22:57:52', 1, 0.0, 566.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1225, 1, '2022-08-06', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1226, 1, '2022-08-07', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1227, 1, '2022-08-13', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1228, 1, '2022-08-14', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1229, 1, '2022-08-18', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1231, 1, '2022-08-21', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1232, 1, '2022-08-22', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1233, 1, '2022-08-23', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1234, 1, '2022-08-24', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1235, 1, '2022-08-25', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1236, 1, '2022-08-26', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1237, 1, '2022-08-27', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1238, 1, '2022-08-28', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1239, 1, '2022-08-29', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1240, 1, '2022-08-30', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1241, 1, '2022-08-31', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1242, 5, '2022-08-06', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1243, 5, '2022-08-07', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1244, 5, '2022-08-13', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1245, 5, '2022-08-14', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1246, 5, '2022-08-16', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1247, 5, '2022-08-18', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1248, 5, '2022-08-19', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1249, 5, '2022-08-20', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1250, 5, '2022-08-21', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1251, 5, '2022-08-22', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1252, 5, '2022-08-23', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1253, 5, '2022-08-24', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1254, 5, '2022-08-25', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1255, 5, '2022-08-26', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1256, 5, '2022-08-27', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1257, 5, '2022-08-28', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1258, 5, '2022-08-29', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1259, 5, '2022-08-30', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1260, 5, '2022-08-31', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1261, 13, '2022-08-06', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1262, 13, '2022-08-07', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1263, 13, '2022-08-13', NULL, '2022-08-19 22:48:12', '2022-08-19 22:48:12', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1264, 13, '2022-08-14', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1265, 13, '2022-08-17', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1266, 13, '2022-08-18', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1267, 13, '2022-08-19', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1268, 13, '2022-08-20', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1269, 13, '2022-08-21', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1270, 13, '2022-08-22', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1271, 13, '2022-08-23', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1272, 13, '2022-08-24', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1273, 13, '2022-08-25', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1274, 13, '2022-08-26', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1275, 13, '2022-08-27', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1276, 13, '2022-08-28', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1277, 13, '2022-08-29', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1278, 13, '2022-08-30', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1279, 13, '2022-08-31', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1280, 14, '2022-08-06', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1281, 14, '2022-08-07', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1282, 14, '2022-08-13', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1283, 14, '2022-08-14', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1284, 14, '2022-08-16', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1285, 14, '2022-08-17', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1286, 14, '2022-08-18', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1287, 14, '2022-08-19', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1288, 14, '2022-08-20', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1289, 14, '2022-08-21', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1290, 14, '2022-08-22', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1291, 14, '2022-08-23', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1292, 14, '2022-08-24', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1293, 14, '2022-08-25', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1294, 14, '2022-08-26', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1295, 14, '2022-08-27', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1296, 14, '2022-08-28', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1297, 14, '2022-08-29', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1298, 14, '2022-08-30', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1299, 14, '2022-08-31', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1300, 17, '2022-08-06', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1301, 17, '2022-08-07', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1302, 17, '2022-08-13', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1303, 17, '2022-08-14', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1304, 17, '2022-08-17', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1305, 17, '2022-08-19', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1306, 17, '2022-08-20', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1307, 17, '2022-08-21', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1308, 17, '2022-08-22', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1309, 17, '2022-08-23', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1310, 17, '2022-08-24', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1311, 17, '2022-08-25', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1312, 17, '2022-08-26', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1313, 17, '2022-08-27', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1314, 17, '2022-08-28', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1315, 17, '2022-08-29', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1316, 17, '2022-08-30', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1317, 17, '2022-08-31', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1318, 103, '2022-08-06', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1319, 103, '2022-08-07', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1320, 103, '2022-08-13', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1321, 103, '2022-08-14', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1322, 103, '2022-08-16', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1323, 103, '2022-08-17', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1324, 103, '2022-08-18', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1325, 103, '2022-08-19', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1326, 103, '2022-08-20', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1327, 103, '2022-08-21', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1328, 103, '2022-08-22', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1329, 103, '2022-08-23', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1330, 103, '2022-08-24', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1331, 103, '2022-08-25', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1332, 103, '2022-08-26', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1333, 103, '2022-08-27', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1334, 103, '2022-08-28', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1335, 103, '2022-08-29', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1336, 103, '2022-08-30', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1337, 103, '2022-08-31', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1338, 120, '2022-08-06', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1339, 120, '2022-08-07', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1340, 120, '2022-08-13', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1341, 120, '2022-08-14', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1342, 120, '2022-08-16', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1343, 120, '2022-08-17', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1344, 120, '2022-08-18', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1345, 120, '2022-08-19', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1346, 120, '2022-08-20', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1347, 120, '2022-08-21', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1348, 120, '2022-08-22', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1349, 120, '2022-08-23', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1350, 120, '2022-08-24', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1351, 120, '2022-08-25', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1352, 120, '2022-08-26', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1353, 120, '2022-08-27', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1354, 120, '2022-08-28', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1355, 120, '2022-08-29', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1356, 120, '2022-08-30', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1357, 120, '2022-08-31', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1358, 121, '2022-08-06', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1359, 121, '2022-08-07', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1360, 121, '2022-08-13', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1361, 121, '2022-08-14', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1362, 121, '2022-08-16', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1363, 121, '2022-08-17', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1364, 121, '2022-08-18', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1365, 121, '2022-08-19', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1366, 121, '2022-08-20', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1367, 121, '2022-08-21', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1368, 121, '2022-08-22', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1369, 121, '2022-08-23', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1370, 121, '2022-08-24', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1371, 121, '2022-08-25', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1372, 121, '2022-08-26', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1373, 121, '2022-08-27', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1374, 121, '2022-08-28', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1375, 121, '2022-08-29', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1376, 121, '2022-08-30', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1377, 121, '2022-08-31', NULL, '2022-08-19 22:48:13', '2022-08-19 22:48:13', 7, 1.0, 0.0, 0.0, 0.0);
INSERT INTO `timekeeps` VALUES (1380, 1, '2022-08-20', NULL, '2022-08-20 12:35:52', '2022-08-20 13:06:34', 1, 0.0, 260.0, 278.0, 0.0);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_confirm_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_confirm_token_expired_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT 1,
  `type_avatar` tinyint NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------

-- ----------------------------
-- Table structure for work_schedules
-- ----------------------------
DROP TABLE IF EXISTS `work_schedules`;
CREATE TABLE `work_schedules`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject_type` tinyint NOT NULL DEFAULT 1,
  `department_id` bigint NULL DEFAULT NULL,
  `position_id` bigint NULL DEFAULT NULL,
  `employee_id` bigint NULL DEFAULT NULL,
  `allow_from` date NOT NULL,
  `allow_to` date NOT NULL,
  `days` json NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `work_from_at` time NOT NULL,
  `work_to_at` time NOT NULL,
  `actual_workday` int NOT NULL DEFAULT 1,
  `checkin_late` int NOT NULL DEFAULT 0,
  `checkout_late` int NOT NULL DEFAULT 0,
  `late_hour` int NOT NULL DEFAULT 0,
  `virtual_workday` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of work_schedules
-- ----------------------------
INSERT INTO `work_schedules` VALUES (1, 4, NULL, NULL, 1, '2022-05-01', '2022-05-31', '[1, 2, 3, 4, 5]', NULL, '2022-07-05 23:59:51', '2022-07-05 23:59:51', 'Lịch làm việc tháng 8', '08:00:00', '12:00:00', 1, 5, 5, 2, 1);
INSERT INTO `work_schedules` VALUES (2, 4, NULL, NULL, 3, '2022-05-01', '2022-05-31', '[1, 2, 3, 4, 5]', NULL, '2022-07-05 23:59:51', '2022-07-05 23:59:51', 'Lịch làm việc tháng 8', '08:00:00', '12:00:00', 1, 5, 5, 2, 1);
INSERT INTO `work_schedules` VALUES (3, 4, NULL, NULL, 5, '2022-01-01', '2022-01-31', '[1, 2, 3, 4, 5]', NULL, '2022-07-06 00:43:21', '2022-07-06 00:43:21', 'Lịch làm việc tháng 8', '04:05:00', '09:05:00', 1, 5, 5, 1, 1);
INSERT INTO `work_schedules` VALUES (4, 2, 1, NULL, NULL, '2022-01-01', '2022-01-31', '[1, 2, 3, 4, 5]', NULL, '2022-07-06 08:55:49', '2022-07-06 08:55:49', 'Thêm lịch viec', '05:00:00', '06:00:00', 1, 2, 0, 1, 1);
INSERT INTO `work_schedules` VALUES (5, 2, 5, NULL, NULL, '2022-07-01', '2022-08-31', '[1, 2, 3, 4, 5]', NULL, '2022-07-29 01:28:59', '2022-07-29 01:28:59', 'Lịch làm việc tháng 8', '08:00:00', '16:00:00', 1, 5, 5, 4, 1);
INSERT INTO `work_schedules` VALUES (6, 4, NULL, NULL, 1, '2022-08-01', '2023-08-31', '[1, 2, 3, 4, 5, 6]', NULL, '2022-08-20 08:35:17', '2022-08-20 08:35:17', 'Lịch làm việc tháng 8', '08:00:00', '18:00:00', 1, 15, 15, 5, 1);
INSERT INTO `work_schedules` VALUES (7, 1, NULL, NULL, NULL, '2022-08-01', '2022-09-30', '[2, 3, 4]', NULL, '2022-08-20 13:48:14', '2022-08-20 13:48:14', 'lịch test kiểm thử', '04:05:00', '09:10:00', 1, 0, 0, 3, 0);
INSERT INTO `work_schedules` VALUES (8, 1, NULL, NULL, NULL, '2022-12-01', '2023-11-30', '[1, 2, 3, 4, 5]', NULL, '2022-08-20 13:52:47', '2022-08-20 13:52:47', '@^#%!&@#%', '00:05:00', '00:10:00', 1, 0, 0, 0, 0);
INSERT INTO `work_schedules` VALUES (9, 1, NULL, NULL, NULL, '2022-11-01', '2022-12-31', '[1, 2, 3, 4, 5]', NULL, '2022-08-20 14:06:09', '2022-08-20 14:06:09', 'test @^#% lịch part 2', '00:06:00', '00:11:00', 1, 0, 0, 0, 0);

-- ----------------------------
-- Table structure for work_shifts
-- ----------------------------
DROP TABLE IF EXISTS `work_shifts`;
CREATE TABLE `work_shifts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `work_schedule_id` bigint NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_from` time NOT NULL,
  `work_to` time NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of work_shifts
-- ----------------------------
INSERT INTO `work_shifts` VALUES (1, 1, 'Ca 1', '08:59:00', '11:59:00', NULL, '2022-06-24 08:45:32', '2022-06-24 08:45:32');
INSERT INTO `work_shifts` VALUES (2, 1, 'Ca 2', '13:00:00', '17:59:00', NULL, '2022-06-24 08:45:32', '2022-06-24 08:45:32');
INSERT INTO `work_shifts` VALUES (3, 1, 'Ca 3', '18:00:00', '23:59:00', NULL, '2022-06-24 08:45:32', '2022-06-24 08:45:32');
INSERT INTO `work_shifts` VALUES (4, 2, 'Ca 1', '00:04:00', '09:17:00', NULL, '2022-06-24 11:42:27', '2022-06-24 11:42:27');
INSERT INTO `work_shifts` VALUES (5, 3, 'Ca 1', '01:00:00', '06:00:00', NULL, '2022-06-24 11:55:27', '2022-06-24 11:55:27');
INSERT INTO `work_shifts` VALUES (6, 4, 'Ca 1', '07:05:00', '13:08:00', NULL, '2022-06-24 12:29:08', '2022-06-24 12:29:08');
INSERT INTO `work_shifts` VALUES (7, 4, 'Ca 2', '15:00:00', '21:00:00', NULL, '2022-06-24 12:29:09', '2022-06-24 12:29:09');
INSERT INTO `work_shifts` VALUES (8, 4, 'Ca 3', '05:06:00', '05:06:00', NULL, '2022-06-24 12:29:09', '2022-06-24 12:29:09');
INSERT INTO `work_shifts` VALUES (9, 5, 'Ca 1', '01:00:00', '06:00:00', NULL, '2022-06-25 06:29:18', '2022-06-25 06:29:18');
INSERT INTO `work_shifts` VALUES (10, 6, 'Ca 1', '01:00:00', '07:00:00', NULL, '2022-06-25 06:30:14', '2022-06-25 06:30:14');
INSERT INTO `work_shifts` VALUES (11, 7, 'Ca 1', '00:00:00', '06:00:00', NULL, '2022-06-25 06:31:13', '2022-06-25 06:31:13');
INSERT INTO `work_shifts` VALUES (12, 8, 'Ca 1', '01:00:00', '06:00:00', NULL, '2022-06-25 06:37:37', '2022-06-25 06:37:37');
INSERT INTO `work_shifts` VALUES (13, 8, 'Ca 2', '14:21:00', '14:21:00', NULL, '2022-06-25 06:37:38', '2022-06-25 06:37:38');
INSERT INTO `work_shifts` VALUES (14, 8, 'Ca 3', '15:06:00', '21:06:00', NULL, '2022-06-25 06:37:38', '2022-06-25 06:37:38');
INSERT INTO `work_shifts` VALUES (15, 9, 'Ca 1', '01:00:00', '06:00:00', NULL, '2022-06-25 06:49:22', '2022-06-25 06:49:22');
INSERT INTO `work_shifts` VALUES (16, 9, 'Ca 2', '00:02:00', '05:02:00', NULL, '2022-06-25 06:49:22', '2022-06-25 06:49:22');
INSERT INTO `work_shifts` VALUES (17, 10, 'Ca 1', '00:04:00', '15:09:00', NULL, '2022-06-25 07:11:24', '2022-06-25 07:11:24');
INSERT INTO `work_shifts` VALUES (18, 10, 'Ca 2', '06:06:00', '12:06:00', NULL, '2022-06-25 07:11:24', '2022-06-25 07:11:24');
INSERT INTO `work_shifts` VALUES (19, 11, 'Ca sáng', '08:13:00', '15:18:00', NULL, '2022-06-25 07:21:33', '2022-06-25 07:21:33');
INSERT INTO `work_shifts` VALUES (20, 11, 'Ca Tối', '16:00:00', '20:00:00', NULL, '2022-06-25 07:21:33', '2022-06-25 07:21:33');
INSERT INTO `work_shifts` VALUES (21, 12, 'Ca hành chính', '08:00:00', '16:00:00', NULL, '2022-06-25 07:27:39', '2022-06-25 07:27:39');
INSERT INTO `work_shifts` VALUES (22, 13, 'dsdsdsd', '01:00:00', '01:00:00', NULL, '2022-06-25 10:46:59', '2022-06-25 10:46:59');
INSERT INTO `work_shifts` VALUES (23, 14, 'Ca sáng', '00:06:00', '08:16:00', NULL, '2022-06-26 01:11:47', '2022-06-26 01:11:47');
INSERT INTO `work_shifts` VALUES (24, 14, 'Ca hành chính', '13:00:00', '19:00:00', NULL, '2022-06-26 01:11:47', '2022-06-26 01:11:47');
INSERT INTO `work_shifts` VALUES (25, 15, 'Ca hành chính', '08:00:00', '16:30:00', NULL, '2022-06-26 01:17:35', '2022-06-26 01:17:35');
INSERT INTO `work_shifts` VALUES (26, 16, 'c1', '01:00:00', '23:18:00', NULL, '2022-06-26 09:54:46', '2022-06-26 09:54:46');
INSERT INTO `work_shifts` VALUES (27, 16, 'c3', '00:06:00', '00:12:00', NULL, '2022-06-26 09:54:46', '2022-06-26 09:54:46');
INSERT INTO `work_shifts` VALUES (28, 17, 'Ca 1', '00:04:00', '05:04:00', NULL, '2022-06-28 10:12:44', '2022-06-28 10:12:44');
INSERT INTO `work_shifts` VALUES (29, 17, 'Ca sáng', '05:06:00', '11:12:00', NULL, '2022-06-28 10:12:44', '2022-06-28 10:12:44');
INSERT INTO `work_shifts` VALUES (30, 18, 'Ca 1', '01:04:00', '07:08:00', NULL, '2022-07-01 20:25:26', '2022-07-01 20:25:26');
INSERT INTO `work_shifts` VALUES (31, 19, 'Ca 1', '01:03:00', '01:07:00', NULL, '2022-07-01 20:27:36', '2022-07-01 20:27:36');
INSERT INTO `work_shifts` VALUES (32, 20, 'Ca 1', '08:00:00', '17:00:00', NULL, '2022-07-02 17:14:39', '2022-07-02 17:14:39');
INSERT INTO `work_shifts` VALUES (33, 20, 'Ca 2', '17:59:00', '23:00:00', NULL, '2022-07-02 17:14:39', '2022-07-02 17:14:39');

SET FOREIGN_KEY_CHECKS = 1;

/*
 Navicat Premium Data Transfer

 Source Server         : DB_Local
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : 127.0.0.1:3306
 Source Schema         : camel_db

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 29/08/2022 01:21:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for approvers
-- ----------------------------
DROP TABLE IF EXISTS `approvers`;
CREATE TABLE `approvers`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `single_type_id` bigint(20) NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of approvers
-- ----------------------------
INSERT INTO `approvers` VALUES (1, 1, 5, NULL, '2022-08-29 01:00:51', '2022-08-29 01:00:53');
INSERT INTO `approvers` VALUES (2, 1, 103, NULL, '2022-08-29 01:01:15', '2022-08-29 01:01:17');
INSERT INTO `approvers` VALUES (3, 1, 13, NULL, '2022-08-29 01:01:39', '2022-08-29 01:01:41');
INSERT INTO `approvers` VALUES (4, 6, 5, NULL, '2022-08-29 01:00:51', '2022-08-29 01:00:53');
INSERT INTO `approvers` VALUES (5, 6, 103, NULL, '2022-08-29 01:01:15', '2022-08-29 01:01:17');
INSERT INTO `approvers` VALUES (6, 6, 13, NULL, '2022-08-29 01:01:39', '2022-08-29 01:01:41');
INSERT INTO `approvers` VALUES (7, 7, 5, NULL, '2022-08-29 01:00:51', '2022-08-29 01:00:53');
INSERT INTO `approvers` VALUES (8, 7, 103, NULL, '2022-08-29 01:01:15', '2022-08-29 01:01:17');
INSERT INTO `approvers` VALUES (9, 7, 13, NULL, '2022-08-29 01:01:39', '2022-08-29 01:01:41');
INSERT INTO `approvers` VALUES (10, 8, 5, NULL, '2022-08-29 01:00:51', '2022-08-29 01:00:53');
INSERT INTO `approvers` VALUES (11, 8, 103, NULL, '2022-08-29 01:01:15', '2022-08-29 01:01:17');
INSERT INTO `approvers` VALUES (12, 8, 13, NULL, '2022-08-29 01:01:39', '2022-08-29 01:01:41');

-- ----------------------------
-- Table structure for attribute_employees
-- ----------------------------
DROP TABLE IF EXISTS `attribute_employees`;
CREATE TABLE `attribute_employees`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) NOT NULL,
  `attribute_id` bigint(20) NOT NULL,
  `data` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `raw_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of attribute_employees
-- ----------------------------
INSERT INTO `attribute_employees` VALUES (31, 135, 1, 'Đại Học FPT', 'Đại Học FPT', 0, NULL, '2022-08-27 23:53:15', '2022-08-27 23:53:15');
INSERT INTO `attribute_employees` VALUES (32, 135, 2, '19033050471019', '19033050471019', 0, NULL, '2022-08-27 23:53:15', '2022-08-27 23:53:15');
INSERT INTO `attribute_employees` VALUES (33, 135, 3, 'Teckcombank - Chi nhánh Nam Từ Liêm', 'Teckcombank - Chi nhánh Nam Từ Liêm', 0, NULL, '2022-08-27 23:53:15', '2022-08-27 23:53:15');
INSERT INTO `attribute_employees` VALUES (34, 135, 4, '20325541', '20325541', 0, NULL, '2022-08-27 23:53:15', '2022-08-27 23:53:15');
INSERT INTO `attribute_employees` VALUES (35, 136, 1, 'Đại Học FPT', 'Đại Học FPT', 0, NULL, '2022-08-27 23:57:49', '2022-08-27 23:57:49');
INSERT INTO `attribute_employees` VALUES (36, 136, 2, '19033050471019', '19033050471019', 0, NULL, '2022-08-27 23:57:49', '2022-08-27 23:57:49');
INSERT INTO `attribute_employees` VALUES (37, 136, 3, 'Teckcombank - Chi nhánh Nam Từ Liêm', 'Teckcombank - Chi nhánh Nam Từ Liêm', 0, NULL, '2022-08-27 23:57:49', '2022-08-27 23:57:49');
INSERT INTO `attribute_employees` VALUES (38, 136, 4, '20325541', '20325541', 0, NULL, '2022-08-27 23:57:49', '2022-08-27 23:57:49');
INSERT INTO `attribute_employees` VALUES (39, 137, 1, 'Đại Học FPT', 'Đại Học FPT', 0, NULL, '2022-08-28 00:02:55', '2022-08-28 00:02:55');
INSERT INTO `attribute_employees` VALUES (40, 137, 2, '19033050471019', '19033050471019', 0, NULL, '2022-08-28 00:02:55', '2022-08-28 00:02:55');
INSERT INTO `attribute_employees` VALUES (41, 137, 3, 'Teckcombank - Chi nhánh Nam Từ Liêm', 'Teckcombank - Chi nhánh Nam Từ Liêm', 0, NULL, '2022-08-28 00:02:55', '2022-08-28 00:02:55');
INSERT INTO `attribute_employees` VALUES (42, 122, 1, 'Đại Học FPT', 'Đại Học FPT', 0, NULL, '2022-08-29 02:48:14', '2022-08-29 02:48:14');
INSERT INTO `attribute_employees` VALUES (43, 122, 2, '19033050471019', '19033050471019', 0, NULL, '2022-08-29 02:48:14', '2022-08-29 02:48:14');
INSERT INTO `attribute_employees` VALUES (44, 122, 3, 'Teckcombank - Chi nhánh Nam Từ Liêm', 'Teckcombank - Chi nhánh Nam Từ Liêm', 0, NULL, '2022-08-29 02:48:14', '2022-08-29 02:48:14');
INSERT INTO `attribute_employees` VALUES (45, 122, 4, '20325541', '20325541', 0, NULL, '2022-08-29 02:48:14', '2022-08-29 02:48:14');
INSERT INTO `attribute_employees` VALUES (46, 123, 1, 'Đại Học FPT', 'Đại Học FPT', 0, NULL, '2022-08-29 04:01:32', '2022-08-29 04:01:32');
INSERT INTO `attribute_employees` VALUES (47, 123, 2, '19033050471019', '19033050471019', 0, NULL, '2022-08-29 04:01:32', '2022-08-29 04:01:32');
INSERT INTO `attribute_employees` VALUES (48, 123, 3, 'Teckcombank - Chi nhánh Nam Từ Liêm', 'Teckcombank - Chi nhánh Nam Từ Liêm', 0, NULL, '2022-08-29 04:01:32', '2022-08-29 04:01:32');
INSERT INTO `attribute_employees` VALUES (49, 123, 4, '20325541', '20325541', 0, NULL, '2022-08-29 04:01:32', '2022-08-29 04:01:32');
INSERT INTO `attribute_employees` VALUES (50, 124, 1, 'đáadsawd', 'đáadsawd', 0, NULL, '2022-08-29 04:03:52', '2022-08-29 04:03:52');
INSERT INTO `attribute_employees` VALUES (51, 124, 2, 'ádaw', 'ádaw', 0, NULL, '2022-08-29 04:03:52', '2022-08-29 04:03:52');
INSERT INTO `attribute_employees` VALUES (52, 124, 3, 'ádawd', 'ádawd', 0, NULL, '2022-08-29 04:03:52', '2022-08-29 04:03:52');
INSERT INTO `attribute_employees` VALUES (53, 124, 4, 'dắd', 'dắd', 0, NULL, '2022-08-29 04:03:52', '2022-08-29 04:03:52');
INSERT INTO `attribute_employees` VALUES (54, 13, 1, 'null', 'null', 0, NULL, '2022-08-29 05:56:34', '2022-08-29 07:12:54');

-- ----------------------------
-- Table structure for attributes
-- ----------------------------
DROP TABLE IF EXISTS `attributes`;
CREATE TABLE `attributes`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_type` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of attributes
-- ----------------------------
INSERT INTO `attributes` VALUES (1, 'school', 'Học vấn', 1, 1, NULL, '2022-08-27 23:29:54', '2022-08-27 23:29:54');
INSERT INTO `attributes` VALUES (2, 'bank', 'Tài khoản ngân hàng', 1, 1, NULL, '2022-08-27 23:29:54', '2022-08-27 23:29:54');
INSERT INTO `attributes` VALUES (3, 'bank_branch', 'Chi nhánh', 1, 1, NULL, '2022-08-27 23:29:54', '2022-08-27 23:29:54');
INSERT INTO `attributes` VALUES (4, 'tax_code', 'Mã số thuế cá nhân', 1, 1, NULL, '2022-08-27 23:29:54', '2022-08-27 23:29:54');

-- ----------------------------
-- Table structure for banners
-- ----------------------------
DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `links` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `from_at` date NOT NULL,
  `to_at` date NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `admin_id` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 54 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of banners
-- ----------------------------
INSERT INTO `banners` VALUES (1, 'Banner camel', 'https://www.camelapp.gq/static/media/banner_01.112c494095efff28bcdf.png', '', '2022-06-22', '2022-08-27', 1, 1, NULL, '2022-06-24 06:36:30', '2022-08-09 16:15:51');
INSERT INTO `banners` VALUES (3, 'Banner camel', 'images/630b694de3339630b694de333b.png', '/abc', '2022-06-26', '2022-08-31', 0, 1, NULL, '2022-06-24 06:36:30', '2022-08-29 03:10:48');

-- ----------------------------
-- Table structure for branches
-- ----------------------------
DROP TABLE IF EXISTS `branches`;
CREATE TABLE `branches`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hotline` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `radius` bigint(20) NOT NULL DEFAULT 100,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `branches_branch_code_unique`(`branch_code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 45 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of branches
-- ----------------------------
INSERT INTO `branches` VALUES (12, 'Chi nhánh Fpoly', 'CMB12', 'KM số 8, đường Bắc Thăng Long, Nội Bài, Hà Nội', '180024442', '21.038327', '105.746909', 500, NULL, '2022-07-06 22:26:45', '2022-08-29 01:43:02');
INSERT INTO `branches` VALUES (36, 'Chi nhánh Tây Sơn', 'CMB36', 'Số 33, đường Tây Sơn, An Lạc, Hà Nội', '18001244', '21.038327', '105.746909', 500, NULL, NULL, '2022-08-29 01:41:31');
INSERT INTO `branches` VALUES (42, 'Chi nhánh Đống Đa', 'CMB42', 'Số 1 đường Trần Hưng Đạo, Đống Đa, Nam Từ Liêm', '180012452', '21.038327', '105.746909', 500, NULL, '2022-08-17 19:10:53', '2022-08-29 01:40:10');
INSERT INTO `branches` VALUES (43, 'Chi nhánh Cầu giấy', 'CMB43', 'Số 35 Trần Đăng Ninh, Cầu Giấy, Hà Nội', '0321455478', '21.038327', '105.746909', 500, NULL, '2022-08-17 20:12:51', '2022-08-29 01:39:09');

-- ----------------------------
-- Table structure for companies
-- ----------------------------
DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of companies
-- ----------------------------
INSERT INTO `companies` VALUES (1, 'Camel', '1900.1286', 'camel@gmail.vn', '8004575211', 'Giải pháp quản lý, lưu trữ dữ liệu chấm công thông minh', 'http://workcamel.tk/', 'facebook.com/camel', 'Số 2 Cao Đẳng FPT, Nam Từ Liêm, Hà Nội', '2022-07-06 22:32:13', '2022-08-29 01:36:36');

-- ----------------------------
-- Table structure for departments
-- ----------------------------
DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` bigint(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of departments
-- ----------------------------
INSERT INTO `departments` VALUES (5, 'Phòng Tech', '', '2022-08-28 22:24:21', '2022-07-29 07:55:37', '2022-08-28 22:24:21', NULL);
INSERT INTO `departments` VALUES (6, 'Phòng hành chính nhân sự', '', NULL, '2022-08-28 22:08:27', '2022-08-28 22:08:27', NULL);
INSERT INTO `departments` VALUES (7, 'Phòng kế toán', '', NULL, '2022-08-28 22:10:54', '2022-08-28 22:10:54', NULL);
INSERT INTO `departments` VALUES (8, 'Marketing', '', NULL, '2022-08-28 22:13:47', '2022-08-28 22:13:47', NULL);
INSERT INTO `departments` VALUES (9, 'Product Development', '', NULL, '2022-08-28 22:17:31', '2022-08-28 22:17:31', NULL);
INSERT INTO `departments` VALUES (10, 'Camel Project', '', NULL, '2022-08-28 22:22:09', '2022-08-28 22:22:09', 9);

-- ----------------------------
-- Table structure for employee_leave_permissions
-- ----------------------------
DROP TABLE IF EXISTS `employee_leave_permissions`;
CREATE TABLE `employee_leave_permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of employee_leave_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for employee_position_logs
-- ----------------------------
DROP TABLE IF EXISTS `employee_position_logs`;
CREATE TABLE `employee_position_logs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) NOT NULL,
  `from_position_id` bigint(20) NOT NULL,
  `to_position_id` bigint(20) NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of employee_position_logs
-- ----------------------------

-- ----------------------------
-- Table structure for employee_positions
-- ----------------------------
DROP TABLE IF EXISTS `employee_positions`;
CREATE TABLE `employee_positions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) NOT NULL,
  `position_id` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of employee_positions
-- ----------------------------

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `employee_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` bigint(20) NOT NULL DEFAULT 0,
  `hash_last_checkin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `personal_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gender` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `position_id` bigint(20) NOT NULL,
  `branch_id` bigint(20) NOT NULL,
  `is_checked` tinyint(4) NOT NULL DEFAULT 1,
  `type_avatar` tinyint(4) NOT NULL DEFAULT 1,
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
  UNIQUE INDEX `employees_email_unique`(`email`) USING BTREE,
  UNIQUE INDEX `employees_employee_code_unique`(`employee_code`) USING BTREE,
  INDEX `employees_fullname_index`(`fullname`) USING BTREE,
  INDEX `employees_position_id_index`(`position_id`) USING BTREE,
  INDEX `employees_branch_id_index`(`branch_id`) USING BTREE,
  INDEX `employees_hash_last_checkin_index`(`hash_last_checkin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 133 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES (1, 'Định Võ', '$2y$10$DvBBiCmcGSxnMDnI9FGfnO/bnpQgBktBVtvBJxUc8IVe/G9iZm3wu', 'vodinh2000ht@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucrpJU92IDgDkrTT8aYebkbhLCmL_mFNsMfp5WqR5w=s96-c', '+84 329766459', 'CM01', 0, 'aa9a1f69ff3c7802ba29e39c31e04cf7', 'dinhvv@topcv.vn', 1, 3, 15, 12, 1, 0, NULL, 'AVBdN4g01CRN8f0QvKQzyiNuXoJ99RMpcrx66BM1XfLs6Q2qbWnyT9U34iRT', 'evVthm1nXvMi7-gLI0qOZT:APA91bEtrGi6NH4A-AfcfdhxK2Cy0RWJgOd_nEGzcINw0dKMexEkCxE2BYd4NYJ5rCi9rA1QBSgi5YywyKKtCv4Slxz4xqfgzhgKy8KfPyFB0f0s5YWYyMBKJh0PA4NFmJGzQxYXqQQr', NULL, '2022-08-22 03:07:11', '2022-08-29 00:36:49', NULL, '2022-05-05 13:24:29', NULL, NULL, '2000-08-21');
INSERT INTO `employees` VALUES (5, 'Vu Le Huy Hoang (FPL K16)', '$2y$10$h3/t3yrYrM5Fav5ucJeXKeqAGcqLTEfhT4W89KxOMOD31JgcQHTCG', 'hoangvlhph13091@fpt.edu.vn', 'https://lh3.googleusercontent.com/a-/AFdZucrtu7kCYwVhSmJGt-WTuQe0DO5J53Ti1qcclAA2=s96-c', NULL, 'CM000L', 0, NULL, 'vivianne33@example.org', 1, 3, 18, 12, 1, 0, NULL, '3hZEOX1gASQ0Cslo5QdvJMfvG2UQ3fxx97QD3lvA9oZ3hfL97gHAb357zkep', 'cm0EGRE43K7LKMHxtlttsf:APA91bG5U6lPpjq-p8jAv3DT1rtBj7ZOsXAeO_NoOM9hLIWVui5ietGfhgD9ciQg2XZbIeozMk8yxEEpzqmsW--qotzZ4hGtlQtp4WVaO84ByMNjgXrvuPV1DYQhlTmpnRaZCUYs8uc2', NULL, '2022-08-22 03:07:11', '2022-08-29 02:58:46', NULL, '2022-05-05 13:34:48', NULL, NULL, '2000-08-21');
INSERT INTO `employees` VALUES (13, 'Nguyen Van Dat', '$2y$10$uu6EycK2VyihYEz3oD6ix.HNtEIrnHac2WCVFfGr5x9KnBeAqBwzq', 'datnvph13011@fpt.edu.vn', 'avatars/aJQc16JBp9IDsObZbCnUv10rlzHdPQ5wMLPu6a2y.jpg', '0978592275', 'CM000B', 0, NULL, 'datnvph13011@fpt.edu.vn', 1, 3, 18, 12, 1, 1, NULL, 'XCfrgxCUp6dcq8H1RPxD8BMiJCSHmkcvxy6Sjzmqp6iCt5Vg71kx1CoTboUh', 'er3EkfveE6wWk7ZvoBOlvJ:APA91bHqn71ZvxImSggf6mfFnJip8lG9bbMoGCje6m7KWy68g8qVCVWU9miX304NZVLiiZ0B5m8iw9XyaUwBIjH7ZlMhLJR2BFdYvMzUF9UkzblDbsC_f0qSTHySbWajLdYJXlM9H0Cp', NULL, '2022-08-22 03:07:11', '2022-08-29 07:15:00', 'Ha noi', '2022-07-06 08:25:14', 'cd0a48d9cc1696f6fc81d12668f0e5183ec94ca184955b83daf3b2c9dd7e667e', NULL, '1999-08-29');
INSERT INTO `employees` VALUES (14, 'Tùng', '$2y$10$L58eMoV6380Ee9ylfYlccu5twSyLoWKKEsvQAiJkgPbZJLwnvfIgu', 'tungthph07714@fpt.edu.vn', NULL, '+84 329766459', 'FPTPOLY123', 0, NULL, NULL, 1, 3, 18, 12, 1, 1, NULL, 'W2dUdkSHQqTg9qRnYkQCfocAHK4JXuIWjvxM9DvtXkEaEwkmi7We6NK8h1Nt', 'fHaK5BpwXB3B7hj8bwDWHD:APA91bENC5ux9MbbUOxNo1ftvN5iCYWuWYkcvC1_SxMmisp83yyCI5J3fKD5-O8SHeU53Ln2gK4UhfqwR2dgCaQK6z1LOY1cXtAibITK1gZBrAN7YesPY9yppehbiUm4xjQn5c-bWPwS', NULL, '2022-08-22 03:07:11', '2022-08-29 05:06:52', NULL, '2022-06-11 12:09:11', NULL, NULL, '2000-08-21');
INSERT INTO `employees` VALUES (17, 'Tiến Trần', '$2y$10$nInYTmuZzQWoGf0ky8PVOeDvjXAV.SeSkZgoJ1xui4negNq0F3eru', 'trantien@gzone.vn', 'avatars/qA7EiAn3miTbaQWqm3689nUA8ymvyj64vTdJqklv.jpg', '+84333165255', 'FPT1111', 0, 'd379954d511e795b37fb26d93622d898', 'trantien@gzone.vn', 1, 3, 18, 12, 1, 1, NULL, '5xYQf8BlUevVyVWJPd8FgSuoEhk7utQSnQRaReKik0uwIkPaPYxMDydujJDk', 'eFzS7KOFSImzcufsCjKMU0:APA91bFm2nTvugDkmxAVqxnxGYxxp0zGjJeKKn_dvOzSYYT8e-6Z2L_PY-zSMydYWyzHGCMcyYc264SzT3ZEQmBs9bkKlpgAkDl50HhmC1eRVu2ILX6h45QicpVjTzI4sRtBezgE6O-6', NULL, '2022-08-22 03:07:11', '2022-08-29 07:18:28', NULL, '2022-06-11 17:40:53', NULL, NULL, '1998-08-29');
INSERT INTO `employees` VALUES (103, 'Trần Trọng Anh PH 1 3 0 2 5', '$2y$10$h3/t3yrYrM5Fav5ucJeXKeqAGcqLTEfhT4W89KxOMOD31JgcQHTCG', 'anhttph13025@fpt.edu.vn', 'https://lh3.googleusercontent.com/a-/AFdZucruY0lYzr6MqakV7M9hIghtfMBaULSN9cVE53PM=s96-c', '+84329766459', 'CM010P', 0, NULL, NULL, 1, 2, 18, 12, 1, 0, NULL, 'RwMgrYbExajoM99dvwNCR1G2bmhsIFnijNVOi8gZYYeccHCx3Tlr1y81qSHr', 'fwkGPfsNMTYyY6zY44p7jA:APA91bGvrjVBELnPHChArxEaCwcf893ePQsDEmtvXwjIe-v6UUrb2VtjCRFfweabH98_iwDx6vjrdF5H9y9ok7HA2yQzdeWGcUCG0q3gV_eGKuN4OokG4ymnFlmg8bRGjcaJLZiccKw2', NULL, '2022-08-22 03:07:11', '2022-08-22 03:07:11', NULL, '2022-06-11 17:40:53', NULL, NULL, '2000-08-21');
INSERT INTO `employees` VALUES (120, 'Võ Văn Định', '$2y$10$4hR.vBpFLjwTSvG2sPUh.ureS1V8c5E6TrxWb2JrzrgtJ562cW1te', 'vodinh1234@gmail.com', 'avatars/t0MUon2Xp3xaSa8MlyOkcERcZbefTkN9iDbSZdYm.png', '+84329766459', '12-vo-van-dinh', 0, NULL, NULL, 1, 3, 18, 12, 1, 1, NULL, NULL, NULL, NULL, '2022-08-22 03:07:11', '2022-08-29 05:06:55', NULL, '2022-07-06 15:37:53', NULL, NULL, '2000-08-21');
INSERT INTO `employees` VALUES (121, 'Dương123', '$2y$10$tsLqXS7Pkgv1c9Few4tE1.6c4pwJqKNk8YahtE3h6rMa8kQ1roo5W', 'duonghvph29740@fpt.edu.vn', 'avatars/AFMMbR3qSvRmRRAhzX3NWQoScJK88UePMqNZDU4a.jpg', '+84329766459', 'CF111', 0, NULL, 'duonghvph29740@fpt.edu.vn', 1, 3, 18, 12, 1, 1, NULL, 'hSFFys9JOkokpC1i0PhFZQ1z0KhlLPYjRIrpdDxh7VSL5kILLoKyVSelCf9l', 'ej7jesuex_huSERwU5CQWf:APA91bG2--DV_nWjN3LYo_Dk4wTG9R59qZvPC3DAVc4bQHRiVfgQaBNP3vnvVRyBIBEiwEA8Kygkv9I0Q6seAlbQcFej9I8X1IDg1Q9CM-LHJrFo21aEllA9QOAAqpd_YH19Lr8n35hc', NULL, '2022-08-22 03:07:11', '2022-08-29 02:58:27', NULL, '2022-07-06 15:37:53', NULL, NULL, '2000-08-21');
INSERT INTO `employees` VALUES (124, 'Hoàng Văn Dương', 'kYX4zOt84gDY', 'duong112hvcm124@camel.vn', 'avatars/X9bI5pWJRd3iMzMZUJ9U42iFBmVvWlmDLCbTQ41N.png', '+84 329766459', 'CM124', 0, NULL, NULL, 1, 3, 14, 12, 1, 1, 'asdawdasdaw đắ d', NULL, NULL, NULL, '2022-08-29 04:03:52', '2022-08-29 05:45:04', 'Cầu Giấy', '2022-08-28 21:03:50', NULL, NULL, '2022-08-14');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for holiday_schedules
-- ----------------------------
DROP TABLE IF EXISTS `holiday_schedules`;
CREATE TABLE `holiday_schedules`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of holiday_schedules
-- ----------------------------
INSERT INTO `holiday_schedules` VALUES (1, 'Samsung Galaxy S22 Ultra 5G 256GB', '2022-07-01', '2022-07-31', NULL, '2022-07-04 03:56:28', '2022-07-04 03:56:28');
INSERT INTO `holiday_schedules` VALUES (2, 'Ngày quốc tế phụ nữ', '2022-08-03', '2022-08-03', NULL, '2022-07-04 04:03:21', '2022-07-04 04:03:21');
INSERT INTO `holiday_schedules` VALUES (3, 'Ngày giải phóng miền nam', '2022-08-11', '2022-08-19', NULL, '2022-07-04 04:06:37', '2022-07-04 04:06:37');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 60 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

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
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\Employee', 1);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\Employee', 5);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\Employee', 13);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\Employee', 17);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\Employee', 103);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\Employee', 103);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\Employee', 121);

-- ----------------------------
-- Table structure for networks
-- ----------------------------
DROP TABLE IF EXISTS `networks`;
CREATE TABLE `networks`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch_id` bigint(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `wifi_ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `networks_branch_id_index`(`branch_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of networks
-- ----------------------------
INSERT INTO `networks` VALUES (1, 12, 'Wifi Phòng Tech', '113.185.44.245', 1, NULL, '2022-08-29 01:51:32', '2022-08-29 01:51:32');
INSERT INTO `networks` VALUES (2, 12, 'Wifi Genaral', '113.185.44.245', 1, NULL, '2022-08-29 02:23:40', '2022-08-29 02:23:40');
INSERT INTO `networks` VALUES (4, 12, 'Wifi Cao Đẳng FPT', '113.185.44.245', 1, NULL, '2022-08-29 01:07:22', '2022-08-29 01:07:22');

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `employee_id` bigint(20) NOT NULL,
  `domain` tinyint(4) NOT NULL COMMENT 'Loại thông báo bên quản trị hay nhân viên',
  `type` tinyint(4) NOT NULL COMMENT 'Loại thông báo cho cá nhân hay thông báo tổng',
  `watched` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of notifications
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name`, `guard_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'dashboard', 'web', '2022-08-15 06:40:24', '2022-08-15 06:40:24');
INSERT INTO `permissions` VALUES (2, 'timesheet', 'web', '2022-08-15 06:40:24', '2022-08-15 06:40:24');
INSERT INTO `permissions` VALUES (3, 'request', 'web', '2022-08-15 06:40:24', '2022-08-15 06:40:24');
INSERT INTO `permissions` VALUES (4, 'news', 'web', '2022-08-15 06:40:24', '2022-08-15 06:40:24');
INSERT INTO `permissions` VALUES (5, 'setting_checkin', 'web', '2022-08-15 06:40:25', '2022-08-15 06:40:25');
INSERT INTO `permissions` VALUES (6, 'setting_calendar', 'web', '2022-08-15 06:40:25', '2022-08-15 06:40:25');
INSERT INTO `permissions` VALUES (7, 'setting_employee', 'web', '2022-08-15 06:40:25', '2022-08-15 06:40:25');
INSERT INTO `permissions` VALUES (8, 'setting_global', 'web', '2022-08-15 06:40:26', '2022-08-15 06:40:26');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for positions
-- ----------------------------
DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) NOT NULL,
  `is_leader` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of positions
-- ----------------------------
INSERT INTO `positions` VALUES (4, 'L&D Manager', 6, 1, NULL, '2022-08-28 22:08:27', '2022-08-28 22:08:27');
INSERT INTO `positions` VALUES (5, 'Training Executive', 6, 0, NULL, '2022-08-28 22:08:27', '2022-08-28 22:08:27');
INSERT INTO `positions` VALUES (6, 'Talent Acquisition Leader', 6, 0, NULL, '2022-08-28 22:08:27', '2022-08-28 22:08:27');
INSERT INTO `positions` VALUES (7, 'Talent Acquisition Executive', 6, 0, NULL, '2022-08-28 22:08:27', '2022-08-28 22:08:27');
INSERT INTO `positions` VALUES (8, 'Accountant Leader', 7, 1, NULL, '2022-08-28 22:10:54', '2022-08-28 22:10:54');
INSERT INTO `positions` VALUES (9, 'Accountant', 7, 0, NULL, '2022-08-28 22:10:54', '2022-08-28 22:10:54');
INSERT INTO `positions` VALUES (10, 'Content Leader', 8, 1, NULL, '2022-08-28 22:13:47', '2022-08-28 22:13:47');
INSERT INTO `positions` VALUES (11, 'Graphic Designer', 8, 0, NULL, '2022-08-28 22:13:47', '2022-08-28 22:13:47');
INSERT INTO `positions` VALUES (12, 'UI/UX Designer', 8, 0, NULL, '2022-08-28 22:13:47', '2022-08-28 22:13:47');
INSERT INTO `positions` VALUES (13, 'Video Editor', 8, 0, NULL, '2022-08-28 22:13:47', '2022-08-28 22:13:47');
INSERT INTO `positions` VALUES (14, 'Tech Leader', 9, 1, NULL, '2022-08-28 22:17:31', '2022-08-28 22:17:31');
INSERT INTO `positions` VALUES (15, 'BA Leader', 10, 1, NULL, '2022-08-28 22:22:09', '2022-08-28 22:22:09');
INSERT INTO `positions` VALUES (16, 'BA', 10, 0, NULL, '2022-08-28 22:22:09', '2022-08-28 22:22:09');
INSERT INTO `positions` VALUES (17, 'Tester', 10, 0, NULL, '2022-08-28 22:22:09', '2022-08-28 22:22:09');
INSERT INTO `positions` VALUES (18, 'Software Engineer', 10, 0, NULL, '2022-08-28 22:22:09', '2022-08-28 22:22:09');
INSERT INTO `positions` VALUES (19, 'AI', 10, 0, NULL, '2022-08-28 22:22:09', '2022-08-28 22:22:09');
INSERT INTO `positions` VALUES (20, 'Project Owner', 9, 0, NULL, '2022-08-28 22:22:57', '2022-08-28 22:22:57');

-- ----------------------------
-- Table structure for post_categories
-- ----------------------------
DROP TABLE IF EXISTS `post_categories`;
CREATE TABLE `post_categories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of post_categories
-- ----------------------------
INSERT INTO `post_categories` VALUES (1, 'Tin nội bộ', 'Tin tức nội bộ công ty', NULL, '2022-08-12 20:01:39', '2022-08-12 20:01:40');
INSERT INTO `post_categories` VALUES (2, 'Tin nhanh', 'Tin điểm tuần tháng 8', NULL, '2022-08-21 21:02:32', '2022-08-21 21:02:34');
INSERT INTO `post_categories` VALUES (3, 'Điểm tuần', 'Điểm tuần tháng 8', NULL, '2022-08-29 01:33:37', '2022-08-29 01:33:39');
INSERT INTO `post_categories` VALUES (4, 'Sức khỏe', 'Tin sức khỏe', NULL, '2022-08-29 01:14:37', '2022-08-29 01:14:39');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `branch_id` bigint(20) NULL DEFAULT NULL,
  `employee_id` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `posts_slug_index`(`slug`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of posts
-- ----------------------------

-- ----------------------------
-- Table structure for request_approve_histories
-- ----------------------------
DROP TABLE IF EXISTS `request_approve_histories`;
CREATE TABLE `request_approve_histories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) NOT NULL,
  `request_id` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `reason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of request_approve_histories
-- ----------------------------

-- ----------------------------
-- Table structure for request_detail
-- ----------------------------
DROP TABLE IF EXISTS `request_detail`;
CREATE TABLE `request_detail`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `quit_work_from_at` datetime NOT NULL,
  `quit_work_to_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of request_detail
-- ----------------------------

-- ----------------------------
-- Table structure for requests
-- ----------------------------
DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `request_detail_id` int(10) UNSIGNED NOT NULL,
  `single_type_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of requests
-- ----------------------------

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

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
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name`, `guard_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'human_resource', 'web', '2022-08-15 06:40:26', '2022-08-15 06:40:26');
INSERT INTO `roles` VALUES (2, 'leader', 'web', '2022-08-15 06:40:27', '2022-08-15 06:40:27');
INSERT INTO `roles` VALUES (3, 'admin', 'web', '2022-08-15 06:40:28', '2022-08-15 06:40:28');
INSERT INTO `roles` VALUES (4, 'member', 'web', '2022-08-15 06:40:28', '2022-08-15 06:40:28');

-- ----------------------------
-- Table structure for single_types
-- ----------------------------
DROP TABLE IF EXISTS `single_types`;
CREATE TABLE `single_types`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `regulation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `required_leader` tinyint(4) NOT NULL DEFAULT 0,
  `type` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of single_types
-- ----------------------------
INSERT INTO `single_types` VALUES (1, 'Đơn nghỉ không lương', 'Sử dụng trong trường hợp nhân viên xin nghỉ không tính công. Mục đích của đơn này là để thông báo cho các bên liên quan về việc nghỉ của nhân viên, nhằm đảm bảo truyền đạt thông tin và tiến độ công việc', 'Sử dụng trong trường hợp nhân viên xin nghỉ không tính công. Mục đích của đơn này là để thông báo cho các bên liên quan về việc nghỉ của nhân viên, nhằm đảm bảo truyền đạt thông tin và tiến độ công việc.', 1, 1, 1, NULL, '2022-07-30 04:52:35', '2022-08-15 03:08:08');
INSERT INTO `single_types` VALUES (6, 'Đơn khôi phục công', 'Đơn xin các ngày hiếu hỉ có lương theo quy định của công ty, đơn được tạo trước 1 tuần theo ngày nghỉ', 'Duyệt đơn qua BM', 1, 2, 1, NULL, '2022-08-01 16:28:42', '2022-08-01 16:28:42');
INSERT INTO `single_types` VALUES (7, 'Đơn làm thêm giờ', 'Giao diện của mẫu này hiển thị giờ bắt đầu giờ kết thúc làm thêm giờ. Đơn này dùng cho các loại đơn làm thêm giờ, làm thêm giờ vào ngày lễ...', 'Giao diện của mẫu này hiển thị giờ bắt đầu giờ kết thúc làm thêm giờ. Đơn này dùng cho các loại đơn làm thêm giờ, làm thêm giờ vào ngày lễ...', 1, 3, 1, NULL, '2022-08-04 05:41:52', '2022-08-04 05:41:52');
INSERT INTO `single_types` VALUES (8, 'Đơn sửa chấm công', '- Việc xây dựng, thực hiện và duy trì quy trình này nhằm đáp ứng nhu cầu\r\ntrong quá trình ký trong Đại học Y Dược Thành phố Hồ Chí Minh .\r\n- Quy trình được áp dụng đối với các cá nhân, các đơn vị trực thuộc Đại học\r\nY Dược Thành phố Hồ Chí Minh\r\n- Các viên chức, người lao động khi thực hiện trình ký phải tuân theo trình', '- Việc xây dựng, thực hiện và duy trì quy trình này nhằm đáp ứng nhu cầu\r\ntrong quá trình ký trong Đại học Y Dược Thành phố Hồ Chí Minh .\r\n- Quy trình được áp dụng đối với các cá nhân, các đơn vị trực thuộc Đại học\r\nY Dược Thành phố Hồ Chí Minh\r\n- Các viên chức, người lao động khi thực hiện trình ký phải tuân theo trình', 0, 2, 1, NULL, '2022-08-09 19:58:53', '2022-08-09 19:58:53');

-- ----------------------------
-- Table structure for table_branch
-- ----------------------------
DROP TABLE IF EXISTS `table_branch`;
CREATE TABLE `table_branch`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of table_branch
-- ----------------------------

-- ----------------------------
-- Table structure for timekeep_details
-- ----------------------------
DROP TABLE IF EXISTS `timekeep_details`;
CREATE TABLE `timekeep_details`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `timekeep_id` bigint(20) NOT NULL,
  `checkin_at` datetime NULL DEFAULT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `source` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `timekeep_details_timekeep_id_index`(`timekeep_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of timekeep_details
-- ----------------------------

-- ----------------------------
-- Table structure for timekeep_logs
-- ----------------------------
DROP TABLE IF EXISTS `timekeep_logs`;
CREATE TABLE `timekeep_logs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `timekeep_id` bigint(20) NOT NULL,
  `checkin_at` datetime NULL DEFAULT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `source` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `timekeep_logs_timekeep_id_index`(`timekeep_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of timekeep_logs
-- ----------------------------

-- ----------------------------
-- Table structure for timekeeps
-- ----------------------------
DROP TABLE IF EXISTS `timekeeps`;
CREATE TABLE `timekeeps`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1,
  `worktime` double(8, 1) NOT NULL DEFAULT 0.0,
  `minute_late` double(8, 1) NOT NULL DEFAULT 0.0,
  `minute_early` double(8, 1) NOT NULL DEFAULT 0.0,
  `overtime_hour` double(8, 1) NOT NULL DEFAULT 0.0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `timekeeps_employee_id_index`(`employee_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of timekeeps
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
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
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `type_avatar` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------

-- ----------------------------
-- Table structure for work_schedules
-- ----------------------------
DROP TABLE IF EXISTS `work_schedules`;
CREATE TABLE `work_schedules`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject_type` tinyint(4) NOT NULL DEFAULT 1,
  `department_id` bigint(20) NULL DEFAULT NULL,
  `position_id` bigint(20) NULL DEFAULT NULL,
  `employee_id` bigint(20) NULL DEFAULT NULL,
  `allow_from` date NOT NULL,
  `allow_to` date NOT NULL,
  `days` json NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `work_from_at` time NOT NULL,
  `work_to_at` time NOT NULL,
  `actual_workday` int(11) NOT NULL DEFAULT 1,
  `checkin_late` int(11) NOT NULL DEFAULT 0,
  `checkout_late` int(11) NOT NULL DEFAULT 0,
  `late_hour` int(11) NOT NULL DEFAULT 0,
  `virtual_workday` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of work_schedules
-- ----------------------------
INSERT INTO `work_schedules` VALUES (1, 4, NULL, NULL, 1, '2022-05-01', '2022-05-31', '[1, 2, 3, 4, 5]', NULL, '2022-07-06 06:59:51', '2022-07-06 06:59:51', 'Lịch làm việc tháng 8', '08:00:00', '12:00:00', 1, 5, 5, 2, 1);
INSERT INTO `work_schedules` VALUES (2, 4, NULL, NULL, 3, '2022-05-01', '2022-05-31', '[1, 2, 3, 4, 5]', NULL, '2022-07-06 06:59:51', '2022-07-06 06:59:51', 'Lịch làm việc tháng 8', '08:00:00', '12:00:00', 1, 5, 5, 2, 1);
INSERT INTO `work_schedules` VALUES (3, 4, NULL, NULL, 5, '2022-01-01', '2022-01-31', '[1, 2, 3, 4, 5]', NULL, '2022-07-06 07:43:21', '2022-07-06 07:43:21', 'Lịch làm việc tháng 8', '04:05:00', '09:05:00', 1, 5, 5, 1, 1);
INSERT INTO `work_schedules` VALUES (4, 2, 1, NULL, NULL, '2022-01-01', '2022-01-31', '[1, 2, 3, 4, 5]', NULL, '2022-07-06 15:55:49', '2022-07-06 15:55:49', 'Thêm lịch viec', '05:00:00', '06:00:00', 1, 2, 0, 1, 1);
INSERT INTO `work_schedules` VALUES (5, 2, 5, NULL, NULL, '2022-07-01', '2022-08-31', '[1, 2, 3, 4, 5]', NULL, '2022-07-29 08:28:59', '2022-07-29 08:28:59', 'Lịch làm việc tháng 8', '08:00:00', '16:00:00', 1, 5, 5, 4, 1);
INSERT INTO `work_schedules` VALUES (6, 4, NULL, NULL, 1, '2022-08-01', '2023-08-31', '[1, 2, 3, 4, 5, 6]', NULL, '2022-08-20 15:35:17', '2022-08-20 15:35:17', 'Lịch làm việc tháng 8', '08:00:00', '18:00:00', 1, 15, 15, 5, 1);
INSERT INTO `work_schedules` VALUES (7, 1, NULL, NULL, NULL, '2022-08-01', '2022-09-30', '[2, 3, 4]', NULL, '2022-08-20 20:48:14', '2022-08-20 20:48:14', 'lịch test kiểm thử', '04:05:00', '09:10:00', 1, 0, 0, 3, 0);
INSERT INTO `work_schedules` VALUES (8, 1, NULL, NULL, NULL, '2022-12-01', '2023-11-30', '[1, 2, 3, 4, 5]', NULL, '2022-08-20 20:52:47', '2022-08-20 20:52:47', '@^#%!&@#%', '00:05:00', '00:10:00', 1, 0, 0, 0, 0);
INSERT INTO `work_schedules` VALUES (9, 1, NULL, NULL, NULL, '2022-11-01', '2022-12-31', '[1, 2, 3, 4, 5]', NULL, '2022-08-20 21:06:09', '2022-08-20 21:06:09', 'test @^#% lịch part 2', '00:06:00', '00:11:00', 1, 0, 0, 0, 0);
INSERT INTO `work_schedules` VALUES (10, 4, NULL, NULL, 17, '2022-08-01', '2023-08-31', '[1, 2, 3, 4, 5, 6]', NULL, '2022-08-29 05:00:56', '2022-08-29 05:00:56', 'Lịch làm việc của Tiến', '08:00:00', '18:00:00', 1, 5, 5, 5, 1);

-- ----------------------------
-- Table structure for work_shifts
-- ----------------------------
DROP TABLE IF EXISTS `work_shifts`;
CREATE TABLE `work_shifts`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `work_schedule_id` bigint(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_from` time NOT NULL,
  `work_to` time NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of work_shifts
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;

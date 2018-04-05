/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100125
 Source Host           : localhost:3306
 Source Schema         : kholaptop

 Target Server Type    : MySQL
 Target Server Version : 100125
 File Encoding         : 65001

 Date: 06/04/2018 00:43:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ci_banners
-- ----------------------------
DROP TABLE IF EXISTS `ci_banners`;
CREATE TABLE `ci_banners`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `button_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `button_name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'home',
  `publish` tinyint(4) NOT NULL,
  `display_order` int(11) NOT NULL,
  `created_date` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `update_date` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ci_banners
-- ----------------------------
INSERT INTO `ci_banners` VALUES (2, '', 'Đặt hàng Online', '', 'Order Online', 'google.com', '/uploads/banners/f350222dca4b7a784f4adbde5df82479.jpg', '', 1, 0, '2018-03-23 00:09:03', '2018-03-21 23:27:29');
INSERT INTO `ci_banners` VALUES (3, 'CÔNG TRÌNH NHÀ KÍNH NÔNG NGHIỆP', 'Đặt hàng Online', 'AGRICULTURAL PROJECT', 'Order Online', '', '/uploads/banners/1e202c9943ba4b5f6dc9deea62c5355e.jpg', '', 1, 0, '2018-03-23 00:09:02', '2018-03-21 23:27:40');
INSERT INTO `ci_banners` VALUES (4, 'Slider 1', '', '', '', '', '/uploads/banners/f0f752e109ec56a2f4cde10efc72c92d.jpg', 'home', 1, 0, '2018-04-05 17:50:32', '2018-04-05 17:50:32');
INSERT INTO `ci_banners` VALUES (5, 'Slider 2', '', '', '', '', '/uploads/banners/20e5dd699cd6fdbf866c244bc2ec5541.jpg', 'home', 1, 0, '2018-04-05 17:50:43', '2018-04-05 17:50:43');

-- ----------------------------
-- Table structure for ci_billing_address
-- ----------------------------
DROP TABLE IF EXISTS `ci_billing_address`;
CREATE TABLE `ci_billing_address`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tax_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `country` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `cell_phone` int(11) NOT NULL,
  `identity_card` int(11) NOT NULL,
  `more_info` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime(0) NOT NULL,
  `update_date` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ci_categories
-- ----------------------------
DROP TABLE IF EXISTS `ci_categories`;
CREATE TABLE `ci_categories`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category_name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type_level` tinyint(4) NOT NULL,
  `thumb` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `display_order` int(11) NOT NULL,
  `language` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime(0) NOT NULL,
  `update_date` datetime(0) NOT NULL,
  `is_featured` int(10) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 52 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ci_categories
-- ----------------------------
INSERT INTO `ci_categories` VALUES (3, 0, 'Trang chủ', 'Home', '', '', '', '', '/', '', 'home', 1, '', 1, 'vn', 'menu', '2018-03-12 14:47:55', '2018-03-22 22:50:02', 0);
INSERT INTO `ci_categories` VALUES (4, 0, 'Giới thiệu', 'About us', '', '', '', '', 'sites/cms/gioi-thieu-11', '', 'about-us', 1, '', 2, 'vn', 'menu', '2018-03-12 14:47:57', '2018-03-22 23:36:56', 0);
INSERT INTO `ci_categories` VALUES (5, 0, 'Sản phẩm', 'Products', '', '', '', '', 'sites/category/san-pham', '', 'products', 1, '', 3, 'vn', 'menu', '2018-03-12 14:48:03', '2018-03-22 15:25:09', 0);
INSERT INTO `ci_categories` VALUES (6, 0, 'Catelogue', 'Catelogue', '', '', '', '', 'sites/cms/catelogue-11', '', 'catelogue', 1, '', 4, 'vn', 'menu', '2018-03-12 14:47:57', '2018-03-22 23:41:38', 0);
INSERT INTO `ci_categories` VALUES (7, 0, 'Chính sách khách hàng', 'Customer policy', '', '', '', '', 'sites/cms/chinh-sach-khach-hang-8', '', 'customer-policy', 1, '', 5, 'vn', 'menu', '2018-03-12 14:47:58', '2018-03-22 23:39:18', 0);
INSERT INTO `ci_categories` VALUES (8, 0, 'Tin tức', 'News', '', '', '', '', 'sites/news', 'tin-tuc', 'news', 1, '', 6, 'vn', 'menu', '2018-03-12 14:47:58', '2018-03-21 23:24:40', 0);
INSERT INTO `ci_categories` VALUES (9, 0, 'Tuyển dụng', 'Recruitment', '', '', '', '', 'sites/cms/tuyen-dung-9', '', 'recruitment', 1, '', 7, 'vn', 'menu', '2018-03-12 14:48:01', '2018-03-22 23:39:43', 0);
INSERT INTO `ci_categories` VALUES (10, 0, 'Liên hệ', 'Contact', '', '', '', '', 'sites/cms/lien-he-12', '', 'contact', 1, '', 8, 'vn', 'menu', '2018-03-12 14:47:59', '2018-03-22 23:41:49', 0);
INSERT INTO `ci_categories` VALUES (23, 4, 'Quan hệ hợp tác', 'Cooperation', '', '', '', '', 'sites/newDetail/quan-he-hop-tac-12', '', 'cooperation', 2, '', 0, 'vn', 'menu', '2018-03-12 14:47:59', '2018-03-23 00:00:21', 0);
INSERT INTO `ci_categories` VALUES (32, 5, 'Tấm lấy sáng Polycarbonate', 'Polycarbonate light polycarbonate', 'Tấm lấy sáng Polycarbonate', '', '', '', 'sites/category/tam-lop-lay-sang-polycarbonate', '', 'polycarbonate-light-polycarbonate', 2, '', 0, 'vn', 'menu', '2018-03-12 11:49:24', '2018-03-22 15:25:56', 0);
INSERT INTO `ci_categories` VALUES (33, 5, 'Mái che lấy sáng', 'Roof cover light', 'Mái che lấy sáng', '', '', '', 'sites/category/mai-che-canofix', '', 'roof-cover-light', 2, '', 0, 'vn', 'menu', '2018-03-12 11:49:37', '2018-03-22 15:25:30', 0);
INSERT INTO `ci_categories` VALUES (34, 5, 'Tôn nhựa lấy sáng Polycarbonate', 'Polycarbonate resin polycarbonate', 'Tôn nhựa lấy sáng Polycarbonate', '', '', '', '0', 'ton-nhua-lay-sang-polycarbonate', 'polycarbonate-resin-polycarbonate', 2, '', 0, 'vn', 'menu', '2018-03-12 11:49:57', '2018-03-21 23:24:03', 0);
INSERT INTO `ci_categories` VALUES (35, 5, 'Phụ kiện', 'Accessories', 'Phụ kiện', '', '', '', 'sites/category/phu-kien', '', 'accessories', 2, '', 0, 'vn', 'menu', '2018-03-12 11:50:09', '2018-03-22 15:25:36', 0);
INSERT INTO `ci_categories` VALUES (36, 5, 'Dịch vụ tư vấn & lắp đặt', 'Consultancy & installation services', 'Dịch vụ tư vấn & lắp đặt', '', '', '', 'sites/category/dich-vu-tu-van-lap-dat', '', 'consultancy-installation-services', 2, '', 0, 'vn', 'menu', '2018-03-12 11:50:19', '2018-03-22 15:25:16', 0);
INSERT INTO `ci_categories` VALUES (37, 5, 'Sản phẩm PC định hình', 'Polycarbonate forming sheet', 'Sản phẩm PC định hình', '', '', '', 'sites/category/san-pham-pc-dinh-hinh', '', 'polycarbonate-forming-sheet', 2, '', 0, 'vn', 'menu', '2018-03-12 11:50:27', '2018-03-22 15:25:44', 0);
INSERT INTO `ci_categories` VALUES (38, 32, 'Tấm lợp lấy sáng Polycarbonate đặc ruột 	', 'Corrugated polycarbonate roofing', 'Tấm lợp lấy sáng Polycarbonate đặc ruột 	', '', '', '', 'sites/category/tam-lop-lay-sang-polycarbonate', '', 'corrugated-polycarbonate-roofing', 3, '', 0, 'vn', 'menu', '2018-03-12 11:50:59', '2018-03-22 21:53:14', 0);
INSERT INTO `ci_categories` VALUES (39, 32, 'Tấm lấy sáng Polycarbonate rỗng 	', 'Polycarbonate light emitting plate', 'Tấm lấy sáng Polycarbonate rỗng 	', '', '', '', 'sites/category/tam-lop-lay-sang-polycarbonate', '', 'polycarbonate-light-emitting-plate', 3, '', 0, 'vn', 'menu', '2018-03-12 11:51:17', '2018-03-22 21:52:43', 0);
INSERT INTO `ci_categories` VALUES (45, 4, 'Giới thiêu', 'About us', '', '', '', '', 'sites/newDetail/gioi-thieu-13', '', 'about-us', 2, '', 0, '', 'menu', '2018-03-22 21:13:00', '2018-03-23 00:02:17', 0);
INSERT INTO `ci_categories` VALUES (46, 9, 'TUYỂN DỤNG THÁNG NHÂN VIÊN KẾ TOÁN-THUẾ', 'RECRUITING MONTHLY ACCOUNTING-TAX', '', '', '', '', 'sites/newDetail/tuyen-dung-thang-nhan-vien-ke-toan-thue-11', 'tuyEn-dUng-thAng-nhAn-viEn-kE-toAn-thuE', 'recruiting-monthly-accounting-tax', 2, '', 0, '', 'menu', '2018-03-22 21:49:36', '2018-03-22 21:49:36', 0);
INSERT INTO `ci_categories` VALUES (47, 0, 'Laptop', 'Laptop', 'Laptop', 'Laptop', 'Laptop', 'Laptop', '', 'laptop-46', 'laptop-46', 1, '', 0, '', 'category', '2018-03-31 09:18:34', '2018-03-31 09:18:34', 1);
INSERT INTO `ci_categories` VALUES (48, 47, 'Dell', 'Dell', 'Dell', 'Dell', 'Dell', 'Dell', '', 'dell-47', 'dell-47', 2, '', 0, '', 'category', '2018-03-31 09:18:47', '2018-03-31 09:18:47', 1);
INSERT INTO `ci_categories` VALUES (49, 47, 'Hp', 'Hp', 'Hp', 'Hp', 'Hp', 'Hp', '', 'hp-48', 'hp-48', 2, '', 0, '', 'category', '2018-03-31 09:19:08', '2018-03-31 09:19:08', 0);
INSERT INTO `ci_categories` VALUES (50, 0, 'Phụ Kiện', 'Accessories', 'Phụ Kiện', 'Accessories', 'Phụ Kiện', 'Phụ Kiện', '', 'phu-kien-49', 'accessories-49', 1, '', 0, '', 'category', '2018-04-02 19:07:54', '2018-04-02 19:07:54', 0);
INSERT INTO `ci_categories` VALUES (51, 48, 'Dell Inspiron', '', 'Dell Inspiron', '', '', '', '', 'dell-inspiron-50', '', 3, '', 0, '', 'category', '2018-04-04 18:34:24', '2018-04-04 18:34:24', 0);

-- ----------------------------
-- Table structure for ci_city
-- ----------------------------
DROP TABLE IF EXISTS `ci_city`;
CREATE TABLE `ci_city`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_date` int(11) NOT NULL,
  `update_date` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ci_contact
-- ----------------------------
DROP TABLE IF EXISTS `ci_contact`;
CREATE TABLE `ci_contact`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tax_code` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `cell_phone` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1: Đặt hàng, 2: Báo giá',
  `type_payment` tinyint(1) NOT NULL COMMENT '1: tiền mặt, 2: chuyển khoản',
  `shipping_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shipping_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shipping_phone` int(11) NOT NULL,
  `business_man` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ci_contact_info_product
-- ----------------------------
DROP TABLE IF EXISTS `ci_contact_info_product`;
CREATE TABLE `ci_contact_info_product`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `color` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thickness` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `width` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `length` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `contact_id` bigint(20) NOT NULL,
  `created_date` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ci_coupon
-- ----------------------------
DROP TABLE IF EXISTS `ci_coupon`;
CREATE TABLE `ci_coupon`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `valid_from` date NOT NULL,
  `valid_to` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ci_coupon_history
-- ----------------------------
DROP TABLE IF EXISTS `ci_coupon_history`;
CREATE TABLE `ci_coupon_history`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `coupon_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `order_amount` double NOT NULL,
  `discount_amount` double NOT NULL,
  `created_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ci_district
-- ----------------------------
DROP TABLE IF EXISTS `ci_district`;
CREATE TABLE `ci_district`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district_name` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  `update_date` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ci_email_templates
-- ----------------------------
DROP TABLE IF EXISTS `ci_email_templates`;
CREATE TABLE `ci_email_templates`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parameter_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ci_masterfile_product_option
-- ----------------------------
DROP TABLE IF EXISTS `ci_masterfile_product_option`;
CREATE TABLE `ci_masterfile_product_option`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_color` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ci_masterfile_product_option_value
-- ----------------------------
DROP TABLE IF EXISTS `ci_masterfile_product_option_value`;
CREATE TABLE `ci_masterfile_product_option_value`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_option_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ci_menus
-- ----------------------------
DROP TABLE IF EXISTS `ci_menus`;
CREATE TABLE `ci_menus`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `menu_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `show_in_menu` tinyint(1) NOT NULL,
  `display_order` int(11) NOT NULL,
  `icon` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `application_id` tinyint(1) NOT NULL,
  `created_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  `update_date` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ci_menus
-- ----------------------------
INSERT INTO `ci_menus` VALUES (1, 0, 'Menu', '', 1, 10, 'linea-icon linea-basic fa-fw', 1, '2018-03-20 23:27:23', '2018-03-20 23:27:23');
INSERT INTO `ci_menus` VALUES (8, 1, 'Backend Menu', 'admin/backmenus', 1, 2, 'linea-icon linea-basic fa-fw', 1, '2018-03-12 15:08:32', '2018-03-12 09:07:35');
INSERT INTO `ci_menus` VALUES (9, 11, 'Quản lý Slider', 'admin/banners', 1, 2, 'linea-icon linea-elaborate fa-fw', 1, '2018-03-12 16:51:31', '2018-03-12 10:51:31');
INSERT INTO `ci_menus` VALUES (10, 14, 'Danh mục sản phẩm', 'admin/category', 1, 3, 'fa fa-th-list', 1, '2018-03-20 23:33:25', '2018-03-20 23:33:25');
INSERT INTO `ci_menus` VALUES (11, 0, 'Quản lý trang chủ', '', 1, 3, 'fa fa-home', 1, '2018-03-20 23:32:08', '2018-03-20 23:32:08');
INSERT INTO `ci_menus` VALUES (12, 11, 'Đối tác', 'admin/partners', 1, 3, 'linea-icon linea-basic fa-fw', 1, '2018-03-12 15:08:29', '2018-03-06 15:43:26');
INSERT INTO `ci_menus` VALUES (13, 0, 'Chỉnh sửa website', 'admin/system', 1, 1, 'fa fa-cogs', 1, '2018-03-20 23:34:19', '2018-03-20 23:34:19');
INSERT INTO `ci_menus` VALUES (14, 0, 'Quản lý sản phầm', '', 1, 1, 'fa fa-th-list', 1, '2018-03-20 23:33:46', '2018-03-20 23:33:46');
INSERT INTO `ci_menus` VALUES (16, 14, 'Liên hệ', 'admin/contactOrder', 1, 10, 'linea-icon linea-basic fa-fw', 1, '2018-03-12 15:08:30', '2018-03-08 16:40:43');
INSERT INTO `ci_menus` VALUES (17, 11, 'Trang', 'admin/post', 1, 3, '', 1, '2018-03-15 22:47:08', '2018-03-15 22:47:08');
INSERT INTO `ci_menus` VALUES (18, 14, 'Sản phẩm', 'admin/product', 1, 1, '', 1, '2018-03-12 18:07:46', '2018-03-12 12:07:46');
INSERT INTO `ci_menus` VALUES (19, 11, 'Tin Tức', 'admin/newController', 1, 4, '', 1, '2018-03-15 22:47:40', '2018-03-15 22:47:40');
INSERT INTO `ci_menus` VALUES (20, 11, 'Dự Án', 'admin/project', 1, 5, '', 1, '2018-03-15 22:48:10', '2018-03-15 22:48:10');
INSERT INTO `ci_menus` VALUES (21, 11, 'Menu', 'admin/menu', 1, 1, '', 1, '2018-03-16 22:55:39', '2018-03-16 22:55:39');
INSERT INTO `ci_menus` VALUES (22, 0, 'Quản lý người dùng', 'admin/user', 1, 5, 'fa fa-users', 1, '2018-03-20 23:26:20', '2018-03-20 23:26:20');
INSERT INTO `ci_menus` VALUES (23, 0, 'Quản lý đơn đặt hàng', 'admin/order', 1, 4, 'fa fa-cart-arrow-down', 1, '2018-03-20 23:31:39', '2018-03-20 23:31:39');

-- ----------------------------
-- Table structure for ci_news
-- ----------------------------
DROP TABLE IF EXISTS `ci_news`;
CREATE TABLE `ci_news`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `short_content` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `short_content_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content_en` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `featured_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `views` int(255) NOT NULL,
  `created_date` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ci_news
-- ----------------------------
INSERT INTO `ci_news` VALUES (7, 'TĂNG TUỔI THỌ TẤM LẤY SÁNG POLYCARBONATE', 'UV COVERED ON PC SHEET', 'TĂNG TUỔI THỌ TẤM LẤY SÁNG POLYCARBONATE', 'Các sản phẩm tấm lợp lấy sáng sử dụng nguyên liệu polycarbonate bao gồm: Tấm đặc, tôn sóng, mái che giếng trời lấy sáng dạng kim tự tháp, dạng vòm,…thương hiệu NICELIGHT do Công ty TNHH TM- DV- SX Nhựa Nam Việt sản xuất là sa', 'Some Short Content', '<p><img alt=\"\" src=\"/ckfinder/userfiles/files/478b73254361423983adb2936e91084eae07d04b_.jpg\" style=\"height:600px; width:800px\" /><img alt=\"\" src=\"/ckfinder/userfiles/images/15-single-default.jpg\" /></p>\r\n\r\n<p>Các sản ph&acirc;̉m t&acirc;́m lợp l&acirc;́y sáng sử dụng nguy&ecirc;n li&ecirc;̣u polycarbonate bao g&ocirc;̀m: T&acirc;́m đặc, t&ocirc;n sóng, mái che gi&ecirc;́ng trời l&acirc;́y sáng dạng kim tự tháp, dạng vòm,&hellip;thương hi&ecirc;̣u NICELIGHT do C&ocirc;ng ty TNHH TM- DV- SX Nhựa Nam Vi&ecirc;̣t sản xu&acirc;́t là sản ph&acirc;̉m do doanh nghi&ecirc;̣p Vi&ecirc;̣t Nam sản xu&acirc;́t đang khẳng định ch&acirc;́t lượng và được người ti&ecirc;u dùng ưa chu&ocirc;ng.</p>\r\n\r\n<p>C&ocirc;ng ty Nhựa Nam Vi&ecirc;̣t ngoài vi&ecirc;̣c sử dụng ngu&ocirc;̀n nguy&ecirc;n li&ecirc;̣u nguy&ecirc;n sinh chính ph&acirc;̉m từ các nhà sản xu&acirc;́t n&ocirc;̉i ti&ecirc;́ng tr&ecirc;n th&ecirc;́ giới như BAYER ( nay là COVESTRO, CHLB Đức) m&atilde; hiệu Makrolon ET 3113 hoặc GE ( Mỹ) nay là SABIC m&atilde; hiệu 0703R m&agrave; trong c&aacute;c loại nguy&ecirc;n li&ecirc;̣u n&agrave;y đ&atilde; c&oacute; pha sẵn phụ gia ch&ocirc;́ng tia UV thì còn sử dụng c&ocirc;ng ngh&ecirc;̣ và thi&ecirc;́t bị đ&ocirc;̀ng đùn ( Coextrusion) hiện nay C&ocirc;ng ty đang sở hữu n&ecirc;n khi sản xu&acirc;́t c&oacute; thể phủ th&ecirc;m tr&ecirc;n b&ecirc;̀ mặt t&acirc;́m PC lợp nhựa PC có hàm lượng cao của ch&acirc;́t h&acirc;́p thụ tia UV cho phép bảo v&ecirc;̣ t&acirc;́m PC m&ocirc;̣t cách tri&ecirc;̣t đ&ecirc;̉ hơn trong vi&ecirc;̣c ch&ocirc;́ng lại tia UV ( Tia cực tím) là tác nh&acirc;n g&acirc;y hi&ecirc;̣n tượng lão hóa trong quá trình sử dụng t&acirc;́m lợp ngoài trời.</p>\r\n\r\n<p>V&ecirc;̀ nguy&ecirc;n lý đ&ocirc;̀ng đùn thì c&acirc;́u tạo d&acirc;y chuy&ecirc;̀n thi&ecirc;́t bị bao g&ocirc;̀m hai máy đùn&nbsp;<em>(h&igrave;nh ảnh thực tế b&ecirc;n tr&ecirc;n)</em>: Máy đùn chính tạo t&acirc;́m PC và m&ocirc;̣t máy đùn phụ tạo được lớp phủ PC có hàm lượng cao ch&acirc;́t h&acirc;́p thụ tia UV. Hai máy đùn này đ&acirc;̉y nguy&ecirc;n li&ecirc;̣u vào đ&acirc;̀u hình mà c&acirc;́u tạo đ&acirc;̀u hình ph&acirc;n b&ocirc;́ nguy&ecirc;n li&ecirc;̣u của máy đùn chính tạo t&acirc;́m và nguy&ecirc;n li&ecirc;̣u của máy đùn phụ tạo lớp phủ&nbsp; PC ch&ocirc;́ng UV l&ecirc;n tr&ecirc;n hai b&ecirc;̀ mặt: Mặt tr&ecirc;n hoặc mặt dưới của t&acirc;́m (A-B hoặc B-A ) hoặc cả mặt tr&ecirc;n và dưới của t&acirc;́m (A-B-A).</p>\r\n\r\n<p>Với lớp phủ PC ch&ocirc;́ng UV có b&ecirc;̀ dày 40- 50micron làm từ nguy&ecirc;n li&ecirc;̣u của BAYER mã hi&ecirc;̣u Makrolon&reg; ET UV510 m&agrave; hi&ecirc;n nay C&ocirc;ng ty Nhựa Nam Vi&ecirc;̣t đang sử dụng để sản xuất tấm polycarbonate theo c&ocirc;ng nghệ đồng đ&ugrave;n, khi sử dụng ngo&agrave;i trời với mặt phủ ch&ocirc;́ng UV ti&ecirc;́p xúc trực ti&ecirc;́p với ánh nắng gi&uacute;p gia tăng khả năng ch&ocirc;́ng lão hóa của sản ph&acirc;̉m, đạt tu&ocirc;̉i thọ tr&ecirc;n 10 năm.</p>\r\n', 'Some Content', '/uploads/news/8a704926d49138d39ed442352704ba8e.jpg', 'tin-tuc-3', 'vn', 7, '2018-03-15 22:56:18');
INSERT INTO `ci_news` VALUES (8, 'TỈ LỆ TRUYỀN SÁNG VÀ CẢN NHIỆT CỦA TÔN NHỰA POLYCARBONATE', 'ANTI HEAT AND LIGHT TRANSMISSION OF POLYCARBONATE CORRUGATED ROOF', 'TỈ LỆ TRUYỀN SÁNG VÀ CẢN NHIỆT CỦA TÔN NHỰA POLYCARBONATE', 'Tôn nhựa lấy sáng Polycarbonate Nicelight có khả năng truyền sáng và cản nhiệt rất tốt, cao hơn rất nhiều so với tôn nhựa Composite sợi thủy tinh. Ngoài ra tôn nhựa Poly còn có khả năng kháng hóa chất và kháng lửa cao, được sử dụng phổ biến trong các công', 'Some Short Content', '<p><img alt=\"\" src=\"/ckfinder/userfiles/images/14-single-default.jpg\" /></p>\r\n\r\n<p>Hiện nay&nbsp;<a href=\"http://namvietplastic.com/vn/33-ton-nhua-lay-sang-polycarbonate-nicelight.html\">t&ocirc;n nhựa lấy s&aacute;ng polycarbonate</a>&nbsp;thương hiệu Nicelight đang được sử dụng phổ biến trong c&aacute;c c&ocirc;ng tr&igrave;nh c&ocirc;ng nghiệp như nh&agrave; xưởng, nh&agrave; phơi nguy&ecirc;n vật liệu v&agrave; c&aacute;c c&ocirc;ng tr&igrave;nh d&acirc;n dụng nhờ những ưu điểm vượt trội so với c&aacute;c loại t&ocirc;n lấy s&aacute;ng l&agrave;m bằng c&aacute;c nguy&ecirc;n vật liệu truyền thống kh&aacute;c.</p>\r\n\r\n<p>&nbsp; &nbsp;- Khả năng kh&aacute;ng ch&aacute;y: Khả năng kh&aacute;ng ch&aacute;y ở mức UL 94V-2, l&agrave; chất tự tắt (Self - extinguishing) v&agrave; được sử dụng ở những nơi c&oacute; nguy cơ ch&aacute;y cao. Tấm polycarbonate c&ograve;n kh&ocirc;ng tỏa kh&iacute; độc v&agrave; kh&aacute;ng ch&aacute;y tốt hơn tấm composite ( Nhựa Polyester v&agrave; sợi thủy tinh) v&agrave; tấm acrylic.</p>\r\n\r\n<p>&nbsp; &nbsp;- Khả năng chống va đập cao: Khả năng chịu lực va đập gấp 100 lần so với k&iacute;nh v&agrave; 40 lần so với tấm acrylic khi tấm c&oacute; c&ugrave;ng độ d&agrave;y.</p>\r\n\r\n<p>&nbsp; &nbsp;- Khả năng kh&aacute;ng h&oacute;a chất: Hầu như chịu được nhiều loại h&oacute;a chất, kh&ocirc;ng bị t&aacute;c động của acid, rượu, glycol, dầu động, thực vật, nhưng n&oacute; kh&ocirc;ng chịu được benzene, ketone, acetone, phenol chlorinated, hydrocarbon nh&acirc;n thơm, dung m&ocirc;i, c&aacute;c chất tẩy ăn m&ograve;n,&hellip;</p>\r\n\r\n<p>Ngo&agrave;i những đặc t&iacute;nh tr&ecirc;n, t&ocirc;n nhựa lấy s&aacute;ng polycarbonate c&ograve;n đ&aacute;p ứng y&ecirc;u cầu sử dụng thực tế khắt khe về độ truyền s&aacute;ng v&agrave; khả năng cản nhiệt, đ&acirc;y l&agrave; những t&iacute;nh năng lu&ocirc;n được quan t&acirc;m nhiều nhất. Dưới đ&acirc;y l&agrave; bảng chi tiết về khả năng truyền s&aacute;ng v&agrave; cản nhiệt:</p>\r\n\r\n<table border=\"1px\">\r\n	<tbody>\r\n		<tr>\r\n			<th>M&agrave;u Sắc<br />\r\n			(Color)</th>\r\n			<th>Độ Truyền S&aacute;ng<br />\r\n			(Light Transmission)</th>\r\n			<th>Tỷ Nhiệt C&ograve;n Lại&nbsp;<br />\r\n			(Solar Transmission)</th>\r\n			<th>Hệ Số Che R&acirc;m&nbsp;<br />\r\n			(SC Ratio)</th>\r\n		</tr>\r\n		<tr>\r\n			<td>Trắng trong (Clear)</td>\r\n			<td>90%</td>\r\n			<td>86%</td>\r\n			<td>0.98</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trắng trong hoa văn (Clear Embossed)</td>\r\n			<td>80%</td>\r\n			<td>83%</td>\r\n			<td>0.85</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trắng mờ (Opal)</td>\r\n			<td>50%</td>\r\n			<td>46%</td>\r\n			<td>0.48</td>\r\n		</tr>\r\n		<tr>\r\n			<td>N&acirc;u Đồng (Bronze)</td>\r\n			<td>50%</td>\r\n			<td>54%</td>\r\n			<td>0.78</td>\r\n		</tr>\r\n		<tr>\r\n			<td>X&aacute;m (Grey)</td>\r\n			<td>50%</td>\r\n			<td>54%</td>\r\n			<td>0.66</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Xanh l&aacute; c&acirc;y (Green)</td>\r\n			<td>45%</td>\r\n			<td>49%=</td>\r\n			<td>0.54</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&Aacute;nh kim (Metallic)</td>\r\n			<td>35%</td>\r\n			<td>32%</td>\r\n			<td>0.48</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Light transmission:</em>&nbsp;Tỷ lệ truyền s&aacute;ng: Tỷ lệ &aacute;nh s&aacute;ng c&ograve;n lại khi truyền qua tấm nhựa.</p>\r\n\r\n<p><em>Solar transmission:</em>&nbsp;Tỷ lệ nhiệt c&ograve;n lại khi truyền qua tấm nhựa.</p>\r\n\r\n<p><em>Hệ số che r&acirc;m SC ( Shading coefficient):</em>&nbsp;Theo định nghĩa hệ số che r&acirc;m l&agrave; nhiệt lượng &aacute;nh s&aacute;ng mặt trời c&ograve;n lại sau khi truyền qua tấm.</p>\r\n\r\n<p>Hệ số che r&acirc;m SC c&agrave;ng thấp th&igrave; khả năng che phủ c&agrave;ng cao v&agrave; sự cản nhiệt c&agrave;ng cao ( SC tỷ lệ nghịch với khả năng cản nhiệt).</p>\r\n\r\n<p>Từ bảng kết quả đo tr&ecirc;n cho thấy:</p>\r\n\r\n<p>Tấm m&agrave;u trắng mờ c&oacute; độ truyền s&aacute;ng chỉ bằng gần 1/2 tấm trắng trong, n&oacute; c&oacute; hệ số r&acirc;m&nbsp;SC bằng 1/2 tấm trắng trong tức l&agrave; khả năng cản nhiệt hơn tấm trắng trong gấp đ&ocirc;i.</p>\r\n\r\n<p>Tấm m&agrave;u tr&agrave; c&oacute; độ truyền s&aacute;ng tương tự tấm trắng mờ, tức l&agrave; bằng 1/2 tấm trắng trong nhưng hệ số r&acirc;m SC lại cao hơn tấm trắng mờ (0.78 so với 0.48) n&ecirc;n khả năng cản nhiệt của tấm m&agrave;u&nbsp;tr&agrave; thấp hơn tấm trắng mờ ( M&agrave;u tr&agrave; chỉ bằng 60% trắng mờ).</p>\r\n\r\n<p>Mặc d&ugrave; c&ugrave;ng hệ số r&acirc;m SC nhưng m&agrave;u trắng mờ cho độ truyền s&aacute;ng tốt hơn m&agrave;u &aacute;nh kim. Ba m&agrave;u tr&agrave;, trắng mờ, x&aacute;m c&oacute; c&ugrave;ng độ truyền s&aacute;ng nhưng m&agrave;u trắng mờ c&oacute; SC thấp nhất, khả năng&nbsp;cản nhiệt cao nhất.</p>\r\n\r\n<p>Kết luận r&uacute;t ra l&agrave;: Khi quan t&acirc;m đến khả năng cản nhiệt của tấm t&ocirc;n lấy s&aacute;ng polycarbonate th&igrave; phải&nbsp;căn cứ v&agrave;o hệ số r&acirc;m SC, thứ tư cản nhiệt tăng dần như sau: Trắng trong, trắng trong c&oacute; hoa văn, tr&agrave;, x&aacute;m, &aacute;nh kim v&agrave; trắng mờ.</p>\r\n\r\n<p>Điều n&agrave;y cho thấy&nbsp;t&ocirc;n lấy s&aacute;ng polycarbonate với nhiều m&agrave;u sắc&nbsp;<a href=\"http://namvietplastic.com/vn/content/54-bang-mau-polycarbonate\">(Xem bảng m&agrave;u)</a>, ngo&agrave;i việc đ&aacute;p ứng y&ecirc;u cầu thẩm mỹ&nbsp;v&agrave; tạo sự h&agrave;i h&ograve;a cho c&ocirc;ng tr&igrave;nh, th&igrave; việc chọn lựa m&agrave;u sắc của t&ocirc;n lấy s&aacute;ng polycarbonate l&agrave; yếu tố quan trọng ảnh hưởng đến khả năng truyền s&aacute;ng v&agrave; cản nhiệt của m&aacute;i hoặc v&aacute;ch che c&ocirc;ng tr&igrave;nh.</p>\r\n\r\n<p><strong>Tags:&nbsp;</strong><a href=\"http://namvietplastic.com/vn/news/tag/t%C3%B4n+nh%E1%BB%B1a+l%E1%BA%A5y+s%C3%A1ng.html\">t&ocirc;n nhựa lấy s&aacute;ng</a>&nbsp;<a href=\"http://namvietplastic.com/vn/news/tag/kh%E1%BA%A3+n%C4%83ng+c%E1%BA%A3n+nhi%E1%BB%87t.html\">khả năng cản nhiệt</a>&nbsp;<a href=\"http://namvietplastic.com/vn/news/tag/kh%E1%BA%A3+n%C4%83ng+c%E1%BA%A3n+nhi%E1%BB%87t+c%E1%BB%A7a+t%C3%B4n+nh%E1%BB%B1a.html\">khả năng cản nhiệt của t&ocirc;n nhựa</a>&nbsp;<a href=\"http://namvietplastic.com/vn/news/tag/t%C3%B4n+nh%E1%BB%B1a+nam+vi%E1%BB%87t.html\">t&ocirc;n nhựa nam việt</a></p>\r\n', 'Some Content', '/uploads/news/5b9e08f5b7da3367c583cab3ff1837a9.jpg', 'tin-tuc-moi-2-7', 'vn', 12, '2018-03-15 22:59:29');
INSERT INTO `ci_news` VALUES (11, 'TƯNG BỪNG TRIỂN LÃM VIETBUILD 2016 LẦN 2 TẠI TPHCM (27/8-31/8/16)', 'VIETBUILD SHOWROOM 2016 HELD IN HO CHI MINH CITY', 'TƯNG BỪNG TRIỂN LÃM VIETBUILD 2016 LẦN 2 TẠI TPHCM (27/8-31/8/16)', 'Ngày 27/8/2016 tới, Triển lãm Quốc tế VietBuild TP.HCM 2016 lần thứ 2 với chủ đề “Bất động sản, kiến trúc và trang trí nội ngoại thất” sẽ chính thức khai mạc tại Trung tâm Hội chợ và Triển lãm Sài Gòn – SECC (799 Nguyễn Văn Linh, P.Tân Phú, Quận 7, TP.HCM', 'Some Short Content', '<p><img alt=\"\" src=\"/ckfinder/userfiles/images/13-single-default.jpg\" style=\"height:420px; width:840px\" /></p>\r\n\r\n<p>Ng&agrave;y 27/8/2016 tới, Triển l&atilde;m Quốc tế VIETBUILD TPHCM 2016 lần thứ 2 với chủ đề&nbsp;<strong>&ldquo;Bất động sản, kiến tr&uacute;c v&agrave; trang tr&iacute; nội ngoại thất&rdquo;</strong>&nbsp;sẽ ch&iacute;nh thức khai mạc tại Trung t&acirc;m Hội chợ v&agrave; Triển l&atilde;m S&agrave;i G&ograve;n &ndash; SECC (799 Nguyễn Văn Linh, P. T&acirc;n Ph&uacute;, Quận 7, TP.HCM). Buổi triển l&atilde;m sẽ diễn ra trong 5 ng&agrave;y từ ng&agrave;y 27/8 đến 31/8/2016.</p>\r\n\r\n<p>Triển l&atilde;m c&oacute; quy m&ocirc; 2.430 gian h&agrave;ng của 840 đơn vị. Trong đ&oacute; c&oacute; 346 doanh nghiệp trong nước, 98 doanh nghiệp li&ecirc;n doanh v&agrave; 403 doanh nghiệp v&agrave; c&aacute;c tập đo&agrave;n nước ngo&agrave;i đến từ 24 quốc gia v&agrave; v&ugrave;ng l&atilde;nh thổ với nhiều sản phẩm mới v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến như: H&agrave;n Quốc, Nhật Bản, Đức, Th&aacute;i Lan, Malaysia, H&agrave; Lan, Bỉ, Singapore, &Yacute;, Ấn Độ, &Uacute;c, Đ&agrave;i Loan, T&acirc;y Ban Nha, Indonesia, Hoa Kỳ, Anh, Thụy Sỹ, Thổ Nhĩ Kỳ, Nga, Hong Kong, Pakistan, Thụy Điển, Trung Quốc, Việt Nam.</p>\r\n\r\n<p>G&oacute;p mặt trong triển l&atilde;m VIETBUILD&nbsp;lần n&agrave;y,&nbsp;<strong>C&ocirc;ng ty TM DV SX Nhựa Nam Việt</strong>&nbsp;h&acirc;n hạnh giới thiệu cho qu&yacute; kh&aacute;ch c&aacute;c sản phẩm l&agrave;m từ nhựa polycarbonate - chất liệu nhựa si&ecirc;u bền, c&oacute; khả năng chịu lực tốt v&agrave; c&oacute; độ truyền s&aacute;ng tuyệt vời.</p>\r\n\r\n<p>B&ecirc;n cạnh những sản phẩm truyền thống chủ đạo của c&ocirc;ng ty như&nbsp;<strong>tấm nhựa lấy s&aacute;ng polycarbonate Nicelight</strong>&nbsp;d&ugrave;ng để che chắn, lợp m&aacute;i, s&acirc;n thượng, giếng trời, hồ bơi, nh&agrave; xe, nh&agrave; xưởng, bảng hiệu&hellip;c&ocirc;ng ty Nhựa Nam Việt c&ograve;n mang đến những sản phẩm mang t&iacute;nh trang tr&iacute; cao như&nbsp;<strong>bộ m&aacute;i che lấy s&aacute;ng Canofix</strong>,&nbsp;<strong>tấm t&ocirc;n lấy s&aacute;ng polycarbonate</strong>,<strong>&nbsp;m&aacute;i lấy s&aacute;ng polycarbonate định h&igrave;nh dạng kim tự th&aacute;p, m&aacute;i v&ograve;m</strong>,&nbsp;<strong>tấm nhựa PVC giả đ&aacute;</strong>.</p>\r\n\r\n<p>Đặc biệt đến với triển l&atilde;m đợt n&agrave;y, hầu hết c&aacute;c sản phẩm trưng b&agrave;y của Nhựa Nam Việt đều được c&ocirc;ng ty nghi&ecirc;n cứu v&agrave; đưa ra những mẫu m&atilde; mới, t&iacute;nh năng v&agrave; chất lượng được n&acirc;ng cao, đ&aacute;p ứng nhu cầu ng&agrave;y c&agrave;ng ph&aacute;t triển của ng&agrave;nh x&acirc;y dựng v&agrave; trang tr&iacute; nội ngoại thất.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tại triển l&atilde;m VIETBUILD, qu&yacute; kh&aacute;ch c&oacute; thể đến gian h&agrave;ng của c&ocirc;ng ty Nhựa Nam Việt nằm tại&nbsp;Khu A5, gian 2068-2069 để được tham quan v&agrave; được tư vấn trực tiếp về sản phẩm v&agrave; ứng dụng thực tế của sản phẩm.</p>\r\n\r\n<p>&nbsp;<img alt=\"Hoi cho Vietbuild Nhua Nam Viet\" src=\"http://namvietplastic.com/img/cms/DSC05295_5.JPG\" style=\"height:404px; width:269px\" /></p>\r\n\r\n<p>Ngo&agrave;i ra, Triển l&atilde;m Quốc tế VIETBUILD lần n&agrave;y sẽ c&oacute; nhiều hoạt động b&ecirc;n lề kh&aacute;c như: Hội thảo chuy&ecirc;n đề &ldquo;Sản phẩm mới &ndash; C&ocirc;ng nghệ ti&ecirc;n tiến của ng&agrave;nh Bất động sản &ndash; Kiến tr&uacute;c v&agrave; trang tr&iacute; nội ngoại thất trong Hội nhập &amp; Ph&aacute;t triển&rdquo;; Chương tr&igrave;nh Diễn đ&agrave;n doanh nghiệp; chương tr&igrave;nh giao lưu giữa c&aacute;c ban ng&agrave;nh, tổ chức Hiệp hội doanh nghiệp tại c&aacute;c tỉnh v&agrave; th&agrave;nh phố ph&iacute;a Nam, miền Đ&ocirc;ng v&agrave; miền T&acirc;y Nam bộ.</p>\r\n\r\n<p>Triển l&atilde;m VIETBUILD 2016 lần 2 nhận được sự phối hợp hỗ trợ của Tổng hội X&acirc;y dựng Việt Nam, Hiệp hội Bất động sản Việt Nam, Hội Vật liệu x&acirc;y dựng Việt Nam nhằm thể hiện những điểm nhấn r&otilde; n&eacute;t của ng&agrave;nh bất động sản- Kiến tr&uacute;c v&agrave; trang tr&iacute; nội ngoại thất Việt Nam trong giai đoạn hội nhập v&agrave; ph&aacute;t triển. Triển l&atilde;m n&agrave;y thực sự đ&atilde; trở th&agrave;nh một thương hiệu lớn, đồng h&agrave;nh c&ugrave;ng với sự ph&aacute;t triển của ng&agrave;nh X&acirc;y dựng Việt Nam, l&agrave; s&acirc;n chơi bổ &iacute;ch v&agrave; thiết thực, đem lại nhiều hiệu quả tốt đẹp cho c&aacute;c DN trong v&agrave; ngo&agrave;i nước về x&uacute;c tiến thương mại v&agrave; hợp t&aacute;c đầu tư x&acirc;y dựng.</p>\r\n', 'Some Content', '/uploads/news/9bdf5595f6089219a4ddb4d164c8ee21.jpg', 'tin-tuc-1', 'vn', 13, '2018-03-15 23:03:49');
INSERT INTO `ci_news` VALUES (12, 'TUYỂN DỤNG THÁNG NHÂN VIÊN KẾ TOÁN-THUẾ', 'RECRUITING MONTHLY ACCOUNTING-TAX', 'TUYỂN DỤNG THÁNG NHÂN VIÊN KẾ TOÁN-THUẾ', 'TUYỂN DỤNG THÁNG NHÂN VIÊN KẾ TOÁN-THUẾ', 'RECRUITING MONTHLY ACCOUNTING-TAX', '<p><br />\r\nTUYỂN NH&Acirc;N VI&Ecirc;N KẾ TO&Aacute;N THUẾ<br />\r\n&nbsp;</p>\r\n\r\n<p>Mức lương: Thỏa thuận</p>\r\n\r\n<p>Y&ecirc;u cầu bằng cấp: Cao đẳng</p>\r\n\r\n<p>Số lượng cần tuyển: 1</p>\r\n\r\n<p>Ng&agrave;nh nghề: Kế to&aacute;n-Kiểm to&aacute;n</p>\r\n\r\n<p>Địa điểm l&agrave;m việc: TP.HCM</p>\r\n\r\n<p>H&igrave;nh thức l&agrave;m việc: To&agrave;n thời gian cố định</p>\r\n\r\n<p>Thời gian thử việc: 1 th&aacute;ng</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>M&Ocirc; TẢ C&Ocirc;NG VIỆC</p>\r\n\r\n<p>- Thực hiện kiểm so&aacute;t, lưu trữ, bảo mật c&aacute;c chứng từ sổ s&aacute;ch của kế to&aacute;n.</p>\r\n\r\n<p>- Trực tiếp l&agrave;m việc cơ quan thuế khi c&oacute; ph&aacute;t sinh.</p>\r\n\r\n<p>- Kiểm tra đối chiếu h&oacute;a đơn GTGT với bảng k&ecirc; thuế đầu v&agrave;o, đầu ra.</p>\r\n\r\n<p>- Kiểm tra đối chiếu bảng k&ecirc; khai hồ sơ nh&acirc;̣p kh&acirc;̉u, xuất khẩu</p>\r\n\r\n<p>- Theo d&otilde;i b&aacute;o c&aacute;o t&igrave;nh h&igrave;nh nộp ng&acirc;n s&aacute;ch, tồn đọng ng&acirc;n s&aacute;ch, ho&agrave;n thuế của C&ocirc;ng ty</p>\r\n\r\n<p>- C&ugrave;ng phối hợp với kế to&aacute;n tổng hợp đối chiếu số liệu b&aacute;o c&aacute;o thuế của c&aacute;c cơ sở giữa b&aacute;o c&aacute;o với quyết to&aacute;n</p>\r\n\r\n<p>- Lập hồ sơ ho&agrave;n thuế khi c&oacute; ph&aacute;t sinh</p>\r\n\r\n<p>- Theo d&otilde;i, kiểm tra v&agrave; lập b&aacute;o c&aacute;o thuế GTGT, thuế TNDN định kỳ hoặc đột xuất</p>\r\n\r\n<p>- Thực hiện c&aacute;c c&ocirc;ng việc kh&aacute;c theo y&ecirc;u cầu của cấp tr&ecirc;n.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>QUYỀN LỢI ĐƯỢC HƯỞNG</p>\r\n\r\n<p>- M&ocirc;i trường l&agrave;m việc chuy&ecirc;n nghiệp, năng động, trẻ v&agrave; nhiệt huyết, c&oacute; t&iacute;nh thử th&aacute;ch cao</p>\r\n\r\n<p>- Chế độ l&agrave;m việc, lương, thưởng v&agrave; ưu đ&atilde;i tương xứng với năng lực</p>\r\n\r\n<p>- Được ghi nhận v&agrave; đ&aacute;nh gi&aacute; tr&ecirc;n hệ thống mục ti&ecirc;u r&otilde; r&agrave;ng, nhất qu&aacute;n</p>\r\n\r\n<p>- Được tham gia c&aacute;c kh&oacute;a đ&agrave;o tạo li&ecirc;n quan đến c&ocirc;ng việc</p>\r\n\r\n<p>- Được hưởng đầy đủ BHXH, BHYT, BHTN, phụ cấp, thưởng lễ, Tết theo luật Lao động v&agrave; luật BHXH</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Y&Ecirc;U CẦU KH&Aacute;C</p>\r\n\r\n<p>*Chuy&ecirc;n m&ocirc;n:</p>\r\n\r\n<p>- Tốt nghiệp Cao Đẳng, Đại học chuy&ecirc;n ng&agrave;nh t&agrave;i ch&iacute;nh, kế to&aacute;n, kiểm to&aacute;n</p>\r\n\r\n<p>- Ưu ti&ecirc;n c&oacute; kinh nghiệm ở vị tr&iacute; tương đương</p>\r\n\r\n<p>- Am hiểu c&aacute;c nghiệp vụ kế to&aacute;n thuế</p>\r\n\r\n<p>- Hiểu biết c&aacute;c quy định của ph&aacute;p luật c&oacute; li&ecirc;n quan</p>\r\n\r\n<p>*Kỹ năng:</p>\r\n\r\n<p>- C&oacute; khả năng l&agrave;m việc độc lập, l&agrave;m việc nh&oacute;m</p>\r\n\r\n<p>- Kỹ năng sử dụng th&agrave;nh thạo vi t&iacute;nh văn ph&ograve;ng (Word, Excel)</p>\r\n\r\n<p>* Phẩm chất: Trung thực, chăm chỉ, t&aacute;c phong nhanh nhẹn, ham học hỏi, c&oacute; &yacute; thức cầu tiến, chủ động trong c&ocirc;ng việc&hellip;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>HỒ SƠ BAO GỒM</p>\r\n\r\n<p>- 1 bản CV ghi r&otilde; qu&aacute; tr&igrave;nh học tập v&agrave; l&agrave;m việc của bản th&acirc;n, c&oacute; đ&iacute;nh k&egrave;m ảnh.</p>\r\n\r\n<p>- Văn bằng chứng chỉ li&ecirc;n quan</p>\r\n\r\n<p>Ứng vi&ecirc;n gửi hồ sơ qua email: namvietplastic.hr@gmail.com (ti&ecirc;u đề mail ghi r&otilde; Vị tr&iacute; ứng tuyển - Họ t&ecirc;n ứng vi&ecirc;n - Số điện thoại li&ecirc;n lạc)</p>\r\n\r\n<p>Hạn nộp hồ sơ: 30/11/2015</p>\r\n', '<p>RECEIVING TAX ACCOUNTING</p>\r\n\r\n<p><br />\r\nWage agreement</p>\r\n\r\n<p>Degree requirements: College</p>\r\n\r\n<p>Quantity: 1</p>\r\n\r\n<p>Category: Accounting-Auditing</p>\r\n\r\n<p>Working place: HCMC</p>\r\n\r\n<p>Working mode: Full time fixed</p>\r\n\r\n<p>Probationary period: 1 month</p>\r\n\r\n<p>JOB DESCRIPTION</p>\r\n\r\n<p>- To control, archive and keep secret accounting vouchers.</p>\r\n\r\n<p>- Directly work tax authorities when there arise.</p>\r\n\r\n<p>- Checking and reconciling VAT invoices with the list of input and output taxes.</p>\r\n\r\n<p>- Checking and reconciling lists of import / export dossiers</p>\r\n\r\n<p>- Monitoring the budget remittance, budget backlog, tax refund of the company</p>\r\n\r\n<p>- Coordinate with general accountants to compare the tax reporting data of the establishments between the reporting and settlement</p>\r\n\r\n<p>- Make a tax refund file when it arises</p>\r\n\r\n<p>- Monitoring, checking and making reports on VAT, CIT periodically or extraordinarily</p>\r\n\r\n<p>- Perform other tasks as required by the higher level.</p>\r\n\r\n<p>BENEFITS OF BENEFITS</p>\r\n\r\n<p>- Professional, dynamic, young and enthusiastic working environment</p>\r\n\r\n<p>- Work, salary, bonus and incentive schemes</p>\r\n\r\n<p>- Be recognized and evaluated on the target system clearly, consistently</p>\r\n\r\n<p>- Be involved in job-related training</p>\r\n\r\n<p>- To enjoy full social insurance, health insurance, unemployment insurance, allowance, bonuses and Tet holiday according to Labor Law and Social Insurance Law.</p>\r\n\r\n<p>OTHER REQUIREMENTS</p>\r\n\r\n<p>*Specialize:</p>\r\n\r\n<p>- College degree, university majoring in finance, accounting and auditing</p>\r\n\r\n<p>- Prior experience in the same position</p>\r\n\r\n<p>- Good knowledge of tax accounting</p>\r\n\r\n<p>- Understand the relevant laws</p>\r\n\r\n<p>*Skill:</p>\r\n\r\n<p>- Ability to work independently, teamwork</p>\r\n\r\n<p>- Computer literacy (Word, Excel)</p>\r\n\r\n<p>* Qualities: Honest, hard working, fast learner, eager to learn, have a sense of progress, active in the work ...</p>\r\n\r\n<p>RECORDS INCLUDE</p>\r\n\r\n<p>- 1 copy of the CV showing your study and work experience, with photo attached.</p>\r\n\r\n<p>- Diploma of related certificates</p>\r\n\r\n<p>Please send your CV via email: namvietplastic.hr@gmail.com (email address clearly stating your position - Full name - Phone number)</p>\r\n\r\n<p>Deadline for submission: 30/11/2015</p>\r\n', '', 'tuyen-dung-thang-nhan-vien-ke-toan-thue-11', 'vn', 6, '2018-03-22 21:50:49');

-- ----------------------------
-- Table structure for ci_order_details
-- ----------------------------
DROP TABLE IF EXISTS `ci_order_details`;
CREATE TABLE `ci_order_details`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_option_value_id` bigint(20) NOT NULL,
  `product_sub_option_value_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `more_info` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ci_order_details
-- ----------------------------
INSERT INTO `ci_order_details` VALUES (1, 1, 20, 0, 0, 1, 0, '', '2018-03-22 15:48:09');

-- ----------------------------
-- Table structure for ci_orders
-- ----------------------------
DROP TABLE IF EXISTS `ci_orders`;
CREATE TABLE `ci_orders`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `number_invoice` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `customer_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shipping_address` bigint(20) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `coupon_id` bigint(20) NOT NULL,
  `type_payment` tinyint(1) NOT NULL,
  `total_payment` double NOT NULL,
  `order_date` datetime(0) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` datetime(0) NOT NULL,
  `update_date` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ci_orders
-- ----------------------------
INSERT INTO `ci_orders` VALUES (1, 'P220320180001', 2, '', 'lucjfer0407@gmail.com', 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, '2018-03-22 15:48:09', '2018-03-22 15:48:09');

-- ----------------------------
-- Table structure for ci_pages
-- ----------------------------
DROP TABLE IF EXISTS `ci_pages`;
CREATE TABLE `ci_pages`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `short_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumint(9) NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ci_partner
-- ----------------------------
DROP TABLE IF EXISTS `ci_partner`;
CREATE TABLE `ci_partner`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  `update_date` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ci_partner
-- ----------------------------
INSERT INTO `ci_partner` VALUES (1, 'đối tác 3', 'mô tả', 'Client 3', '', '/uploads/partners/fff5bdef6b5662ea856b305ee3be3b21.png', '', 1, '2018-03-21 23:27:02', '2018-03-21 23:27:02');
INSERT INTO `ci_partner` VALUES (2, 'Client 1', '', '', '', '/uploads/partners/57298b3a9599c93aa27163668bb9609f.png', '', 1, '2018-03-12 17:44:53', '2018-03-12 11:37:27');
INSERT INTO `ci_partner` VALUES (3, 'client 2', '', '', '', '/uploads/partners/f850726b50782640f34b5856e08eb0b6.png', '', 1, '2018-03-12 17:39:35', '2018-03-12 11:39:35');
INSERT INTO `ci_partner` VALUES (4, 'Client 4', '', '', '', '/uploads/partners/4d4139ecfff209560bfcbe3a62efcf1f.png', '', 1, '2018-03-12 17:40:03', '2018-03-12 11:40:03');
INSERT INTO `ci_partner` VALUES (5, 'Client 5', '', '', '', '/uploads/partners/c99e91cbab3c4446d1ba67192ddc6089.png', '', 1, '2018-03-12 17:40:19', '2018-03-12 11:40:19');

-- ----------------------------
-- Table structure for ci_posts
-- ----------------------------
DROP TABLE IF EXISTS `ci_posts`;
CREATE TABLE `ci_posts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `short_content` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `short_content_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content_en` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `featured_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ci_posts
-- ----------------------------
INSERT INTO `ci_posts` VALUES (8, 'Giới Thiệu', 'About Us', 'Giới Thiệu', 'Giới Thiệu', 'About Us', '<p>C&ocirc;ng Ty TNHH TM DV SX Nhựa Nam Việt l&agrave; một trong những c&ocirc;ng ty h&agrave;ng đầu trong lĩnh vực nhựa.</p>', '<p>C&ocirc;ng Ty TNHH TM DV SX Nhựa Nam Việt l&agrave; một trong những c&ocirc;ng ty h&agrave;ng đầu trong lĩnh vực nhựa.</p>\n', '', 'gioi-thieu-11', 'vn', '2018-03-22 17:37:15');
INSERT INTO `ci_posts` VALUES (9, 'Chính Sách Khách Hàng', 'Customer Policy', 'Chính Sách Khách Hàng', 'Chính Sách Khách Hàng', 'Customer Policy', '<p>Ch&iacute;nh S&aacute;ch Kh&aacute;ch H&agrave;ng</p>', '<p>Customer Policy</p>\r\n', '', 'chinh-sach-khach-hang-8', 'vn', '2018-03-22 17:40:11');
INSERT INTO `ci_posts` VALUES (10, 'Tuyển Dụng', 'RECRUITMENT', 'Tuyển Dụng', 'Tuyển Dụng', 'RECRUITMENT', '<p>Tuyển Dụng</p>', '<p>RECRUITMENT</p>\r\n', '', 'tuyen-dung-9', 'vn', '2018-03-22 17:42:30');
INSERT INTO `ci_posts` VALUES (11, 'Quan hệ hợp tác', 'Cooperation', 'Quan hệ hợp tác', 'Quan hệ hợp tác', 'Cooperation', '<p>&nbsp;&nbsp;Đầu ti&ecirc;n,&nbsp;<a href=\"http://namvietplastic.com/\">C&ocirc;ng ty TNHH TM-DV-SX Nhựa Nam Việt</a>&nbsp;xin gửi lời cảm ơn ch&acirc;n th&agrave;nh tới tất cả qu&yacute; kh&aacute;ch h&agrave;ng đ&atilde; ủng hộ ch&uacute;ng t&ocirc;i trong thời gian qua.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;Bằng những nỗ lực để kh&ocirc;ng ngừng lớn mạnh v&agrave; ph&aacute;t triển, C&ocirc;ng ty Nhưa Nam Việt đ&atilde; đưa ra thị trường những sản phẩm tốt nhất, khẳng định thương hiệu Nicelight. C&aacute;c sản phẩm n&agrave;y được ch&uacute;ng t&ocirc;i sản xuất từ nhựa kỹ thuật cao, polycarbonate của Bayer (Đức) phục vụ cho ng&agrave;nh x&acirc;y dựng, ti&ecirc;u biểu như:</p>\r\n\r\n<ul>\r\n	<li>&nbsp; &nbsp; &nbsp;<a href=\"http://namvietplastic.com/vn/18-tam-lop-lay-sang-polycarbonate-dac\">Tấm lấy s&aacute;ng polycarbonate</a>&nbsp;đặc;</li>\r\n	<li>&nbsp; &nbsp; &nbsp;<a href=\"http://namvietplastic.com/vn/14-tam-ton-lay-sang\">Tấm t&ocirc;n lấy s&aacute;ng</a>&nbsp;polycarbonate dạng s&oacute;ng;</li>\r\n	<li>&nbsp; &nbsp; &nbsp;M&aacute;i che giếng&nbsp;trời lấy s&aacute;ng dạng kim tự th&aacute;p vu&ocirc;ng v&agrave; h&igrave;nh thang.</li>\r\n	<li>&nbsp; &nbsp; Ngo&agrave;i ra ch&uacute;ng t&ocirc;i c&ograve;n hợp t&aacute;c với C&ocirc;ng ty Korea Hot Fix ( H&agrave;n quốc) cung cấp Khung v&agrave;&nbsp;<a href=\"http://namvietplastic.com/vn/13-mai-che-lay-sang\">m&aacute;i che lấy s&aacute;ng</a>&nbsp;polycarbonate thương hiệu Canofix.</li>\r\n</ul>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;Hiện nay, để đ&aacute;p ứng nhu cầu ph&aacute;t triển mở rộng thị trường, C&ocirc;ng ty Nhựa Nam Việt rất h&acirc;n hạnh được hợp t&aacute;c với c&aacute;c tổ chức, doanh nghiệp v&agrave; c&aacute; nh&acirc;n quan t&acirc;m đến lĩnh vực kinh doanh sản phẩm n&ecirc;u tr&ecirc;n nhằm x&acirc;y dựng mạng lưới ph&acirc;n phối rộng khắp trong v&agrave; ngo&agrave;i nước tr&ecirc;n tinh thần&nbsp;<em><strong>&ldquo;Hợp t&aacute;c bền vững &ndash;&nbsp; Đ&ocirc;i b&ecirc;n c&ugrave;ng c&oacute; lợi&rdquo;.</strong></em></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;Với quan điểm n&agrave;y, C&ocirc;ng ty Nhựa Nam Việt lu&ocirc;n đảm bảo lợi &iacute;ch tối đa cho c&aacute;c đối t&aacute;c, kh&aacute;ch h&agrave;ng bằng những ch&iacute;nh s&aacute;ch ưu đ&atilde;i nhất, lu&ocirc;n cập nhận th&ocirc;ng tin v&agrave; gi&aacute; cả kịp thời, cung cấp t&agrave;i liệu kinh doanh chi tiết nhất. B&ecirc;n cạnh đ&oacute;, ch&uacute;ng t&ocirc;i cũng cam kết mang lại những sản phẩm chất lượng tốt nhất, đa dạng nhất đảm bảo sức cạnh tranh tr&ecirc;n thị trường.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;Rất h&acirc;n hạnh được hợp t&aacute;c c&ugrave;ng qu&yacute; kh&aacute;ch h&agrave;ng trong v&agrave; ngo&agrave;i nước.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;Mọi chi tiết vui l&ograve;ng li&ecirc;n hệ với ch&uacute;ng t&ocirc;i qua địa chỉ:</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;<strong>C&ocirc;ng ty TNHH TM-DV-SX Nhựa Nam Việt</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;362 Điện Bi&ecirc;n Phủ, phường 17, quận B&igrave;nh Thạnh, TPHCM</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;SĐT:&nbsp;(028) 35125108</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;Email:&nbsp;<a href=\"mailto:lienhe@namvietplastic.com\">lienhe@namvietplastic.com</a></p>', '<p>First of all, Nam Viet Plastic Trading Services Co., Ltd would like to send sincere thanks to all customers who have supported us in the past.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;With efforts to constantly grow and develop, Nam Viet Company has launched the best products, asserting the Nicelight brand. These products are manufactured from high technical plastic, polycarbonate Bayer (Germany) for the construction industry, such as:</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Polycarbonate clear polycarbonate;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Corrugated polycarbonate sheet;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The roof of the skylight illuminates the square pyramid and trapezoid.<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;We also cooperate with Korea Hot Fix (Korea) to supply Canofix polycarbonate light frame and roof.<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;At present, in order to meet the needs of expanding market, Nam Viet Plastic Company is very pleased to cooperate with organizations, enterprises and individuals who are interested in the above mentioned products. The network of distribution is widespread at home and abroad in the spirit of &quot;Sustainable cooperation - win-win&quot;.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;With this view, Nam Viet Plastic Company always ensures the maximum benefits for partners and customers by the most preferential policies, always update information and prices in time, provide business documents the most. In addition, we are committed to bring the best quality products, the most diverse to ensure competitiveness in the market.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Very pleased to cooperate with customers at home and abroad.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;For more information, please contact us at:</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nam Viet Plastic Products Trading &amp; Service Co., Ltd</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;362 Dien Bien Phu Street, Ward 17, Binh Thanh District, Ho Chi Minh City</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID: (028) 35125108</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: lienhe@namvietplastic.com</p>\r\n', '', 'quan-he-hop-tac-10', 'vn', '2018-03-22 21:15:16');
INSERT INTO `ci_posts` VALUES (12, 'Catelogue', 'Catelogue', 'Catelogue', 'Catelogue', 'Catelogue', '<p>Catelogue</p>', '<p>Catelogue</p>\r\n', '', 'catelogue-11', 'vn', '2018-03-22 23:40:16');
INSERT INTO `ci_posts` VALUES (13, 'Liên Hệ', 'Contact Us', 'Liên Hệ', 'Liên Hệ', 'Contact Us', '<p>Li&ecirc;n Hệ</p>', '<p>Contact Us</p>\r\n', '', 'lien-he-12', 'vn', '2018-03-22 23:40:39');

-- ----------------------------
-- Table structure for ci_producer
-- ----------------------------
DROP TABLE IF EXISTS `ci_producer`;
CREATE TABLE `ci_producer`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  `update_date` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ci_product_categories
-- ----------------------------
DROP TABLE IF EXISTS `ci_product_categories`;
CREATE TABLE `ci_product_categories`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 56 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ci_product_categories
-- ----------------------------
INSERT INTO `ci_product_categories` VALUES (19, 15, 25);
INSERT INTO `ci_product_categories` VALUES (21, 16, 25);
INSERT INTO `ci_product_categories` VALUES (22, 17, 25);
INSERT INTO `ci_product_categories` VALUES (23, 18, 25);
INSERT INTO `ci_product_categories` VALUES (25, 19, 25);
INSERT INTO `ci_product_categories` VALUES (27, 20, 25);
INSERT INTO `ci_product_categories` VALUES (29, 21, 26);
INSERT INTO `ci_product_categories` VALUES (31, 22, 27);
INSERT INTO `ci_product_categories` VALUES (32, 23, 27);
INSERT INTO `ci_product_categories` VALUES (33, 24, 29);
INSERT INTO `ci_product_categories` VALUES (35, 25, 28);
INSERT INTO `ci_product_categories` VALUES (36, 26, 30);
INSERT INTO `ci_product_categories` VALUES (38, 28, 27);
INSERT INTO `ci_product_categories` VALUES (39, 27, 27);
INSERT INTO `ci_product_categories` VALUES (41, 30, 25);
INSERT INTO `ci_product_categories` VALUES (44, 30, 48);
INSERT INTO `ci_product_categories` VALUES (49, 31, 48);
INSERT INTO `ci_product_categories` VALUES (51, 32, 49);
INSERT INTO `ci_product_categories` VALUES (55, 29, 51);

-- ----------------------------
-- Table structure for ci_product_images
-- ----------------------------
DROP TABLE IF EXISTS `ci_product_images`;
CREATE TABLE `ci_product_images`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 83 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ci_product_images
-- ----------------------------
INSERT INTO `ci_product_images` VALUES (79, 29, '/uploads/products/4bc784c1683eb66dbebe1d420476090c.jpg', '2018-03-31 09:30:42');
INSERT INTO `ci_product_images` VALUES (80, 30, '/uploads/products/5d56b012a655cf28e38ba1f3a1ddf247.jpg', '2018-03-31 10:04:16');
INSERT INTO `ci_product_images` VALUES (81, 31, '/uploads/products/2276f2e5983300bbfab8418da6878a96.jpg', '2018-03-31 11:29:42');
INSERT INTO `ci_product_images` VALUES (82, 32, '/uploads/products/e90f2908b4593308d8deace4215fb1d6.png', '2018-04-04 18:30:23');

-- ----------------------------
-- Table structure for ci_product_option
-- ----------------------------
DROP TABLE IF EXISTS `ci_product_option`;
CREATE TABLE `ci_product_option`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Color, Size',
  `created_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 207 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ci_product_option
-- ----------------------------
INSERT INTO `ci_product_option` VALUES (172, '30', 'Cpu', '2018-04-03 18:49:55');
INSERT INTO `ci_product_option` VALUES (173, '30', 'Ram', '2018-04-03 18:49:55');
INSERT INTO `ci_product_option` VALUES (174, '30', 'Hdd', '2018-04-03 18:49:56');
INSERT INTO `ci_product_option` VALUES (175, '30', 'Monitor', '2018-04-03 18:49:56');
INSERT INTO `ci_product_option` VALUES (176, '30', 'Color', '2018-04-03 18:49:56');
INSERT INTO `ci_product_option` VALUES (201, '29', 'Color', '2018-04-05 19:40:00');
INSERT INTO `ci_product_option` VALUES (202, '29', 'Cpu', '2018-04-05 19:40:01');
INSERT INTO `ci_product_option` VALUES (203, '29', 'Ram', '2018-04-05 19:40:01');
INSERT INTO `ci_product_option` VALUES (204, '29', 'Hdd', '2018-04-05 19:40:01');
INSERT INTO `ci_product_option` VALUES (205, '29', 'Monitor', '2018-04-05 19:40:01');
INSERT INTO `ci_product_option` VALUES (206, '29', 'Vga', '2018-04-05 19:40:01');

-- ----------------------------
-- Table structure for ci_product_option_value
-- ----------------------------
DROP TABLE IF EXISTS `ci_product_option_value`;
CREATE TABLE `ci_product_option_value`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_option_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 266 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ci_product_option_value
-- ----------------------------
INSERT INTO `ci_product_option_value` VALUES (223, 30, 172, 'i7-7500U 2.7Ghz', 0);
INSERT INTO `ci_product_option_value` VALUES (224, 30, 173, '8 GB', 0);
INSERT INTO `ci_product_option_value` VALUES (225, 30, 174, '1 TB', 0);
INSERT INTO `ci_product_option_value` VALUES (226, 30, 175, '15.6', 0);
INSERT INTO `ci_product_option_value` VALUES (227, 30, 176, '#c0c0c0', 0);
INSERT INTO `ci_product_option_value` VALUES (256, 29, 201, '#000000', 0);
INSERT INTO `ci_product_option_value` VALUES (257, 29, 201, '#caca00', 500000);
INSERT INTO `ci_product_option_value` VALUES (258, 29, 202, 'I3-6006U 2.0Ghz', 0);
INSERT INTO `ci_product_option_value` VALUES (259, 29, 202, 'I5-6666U 3.0Ghz', 2000000);
INSERT INTO `ci_product_option_value` VALUES (260, 29, 203, '4 GB', 0);
INSERT INTO `ci_product_option_value` VALUES (261, 29, 203, '8 GB', 600000);
INSERT INTO `ci_product_option_value` VALUES (262, 29, 204, '1 TB', 0);
INSERT INTO `ci_product_option_value` VALUES (263, 29, 204, '1 TB + SSD 120GB', 1000000);
INSERT INTO `ci_product_option_value` VALUES (264, 29, 205, '15.6 Inch', 0);
INSERT INTO `ci_product_option_value` VALUES (265, 29, 206, 'Intel HD 520', 0);

-- ----------------------------
-- Table structure for ci_product_price
-- ----------------------------
DROP TABLE IF EXISTS `ci_product_price`;
CREATE TABLE `ci_product_price`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `product_option_value_id` bigint(20) NOT NULL,
  `price` double NOT NULL,
  `created_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  `update_date` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ci_products
-- ----------------------------
DROP TABLE IF EXISTS `ci_products`;
CREATE TABLE `ci_products`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `sale_price` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content_en` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `is_feature` int(11) NOT NULL,
  `is_new` int(11) NOT NULL,
  `update_date` datetime(0) NOT NULL,
  `created_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ci_products
-- ----------------------------
INSERT INTO `ci_products` VALUES (29, 'P310320180001', 'Dell Inspiron 15', '', 10000000, '', '<p><strong>Bảo h&agrave;nh:&nbsp;</strong>12 Th&aacute;ng</p>\r\n\r\n<p><strong>Kho:&nbsp;</strong>Đặt h&agrave;ng</p>\r\n\r\n<p><strong>SKU:&nbsp;</strong>1151-002-1133403</p>', '', '<p>H&agrave;ng ph&acirc;n phối của Dell Việt Nam. Core i3-6006U 2.0Ghz 4096MB 1TB 15.6&quot; HD WLED webcam bluetooth&nbsp;Intel HD 520 VGA PC Dos.&nbsp;Weight 2.1 kg. Black Color. Made in China. Brand New 100%.&nbsp; Gi&aacute; đ&atilde; bao gồm VAT 10%</p>', '', 'Dell Inspiron 15', 'Dell Inspiron 15', 'dell-inspiron-15-32', 1, 1, 1, '0000-00-00 00:00:00', '2018-04-05 00:03:35');
INSERT INTO `ci_products` VALUES (30, 'P310320180030', 'DELL VOSTRO V5568C P62F0010', '', 10000000, '', '<p><strong>Bảo h&agrave;nh:&nbsp;</strong>12 Th&aacute;ng</p>\r\n\r\n<p><strong>Kho:&nbsp;</strong>C&ograve;n h&agrave;ng</p>\r\n\r\n<p><strong>SKU:&nbsp;</strong>1151-002-1087801</p>', '', '<p>H&agrave;ng ph&acirc;n phối của Dell Việt Nam. Core i7-7500U 2.7Ghz 8192MB 1TB DVDRW 15.6&quot; HD WLED webcam bluetooth&nbsp;NVIDIA GeForce 940MX 4GB VGA Windows 10.&nbsp;Weight 2.24 kg. Gray Color. Made in China. Brand New 100%.&nbsp; Gi&aacute; đ&atilde; gồm VAT 10%</p>', '', 'DELL VOSTRO V5568C P62F0010', 'DELL VOSTRO V5568C P62F0010', 'dell-vostro-v5568c-p62f0010-31', 1, 0, 1, '0000-00-00 00:00:00', '2018-04-03 23:49:56');
INSERT INTO `ci_products` VALUES (31, 'P310320180031', 'DELL INSPIRON 3467 C4I51107W', '', 10000000, '', '<p><strong>Bảo h&agrave;nh:&nbsp;</strong>12 Th&aacute;ng</p>\r\n\r\n<p><strong>Kho:&nbsp;</strong>C&ograve;n h&agrave;ng</p>\r\n\r\n<p><strong>SKU:&nbsp;</strong>1151-002-1125402</p>', '', '<p>H&agrave;ng ph&acirc;n phối của Dell Việt Nam Core i5-7200U 2.5Ghz&nbsp;4096MB 1TB DVDRW 14.0&quot; HD WLED webcam bluetooth&nbsp;Intel HD Graphics VGA Windows 10. Weight 2.3kg. Black Color. Made in China. Brand New 100%. Gi&aacute; đ&atilde; gồm VAT 10%</p>', '', 'DELL INSPIRON 3467 C4I51107W', 'DELL INSPIRON 3467 C4I51107W', 'dell-inspiron-3467-c4i51107w-31', 1, 1, 1, '0000-00-00 00:00:00', '2018-04-03 23:50:10');
INSERT INTO `ci_products` VALUES (32, 'P040420180032', 'HP Probook 430 g1', '', 6700000, '', '<p>HP Probook 430 g1</p>', '', '<p>HP Probook 430 g1</p>', '', 'HP Probook 430 g1', 'HP Probook 430 g1', 'hp-probook-430-g1-31', 1, 1, 1, '0000-00-00 00:00:00', '2018-04-04 23:30:23');

-- ----------------------------
-- Table structure for ci_projects
-- ----------------------------
DROP TABLE IF EXISTS `ci_projects`;
CREATE TABLE `ci_projects`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `short_content` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `short_content_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content_en` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `featured_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ci_projects
-- ----------------------------
INSERT INTO `ci_projects` VALUES (3, 'Mái Che Bệnh Viện Đa Khoa Đồng Nai', 'Dong Nai Hospital', 'Mái Che Bệnh Viện Đa Khoa Đồng Nai', 'Công trình sử dụng sản phẩm tấm lấy sáng định hình kim tự tháp để làm mái che. Sản phẩm được đúc nguyên khối hình chóp tứ giác đều, mang lại sự tinh tế và hiện đại.', 'Some Short Content', '<p><a href=\"http://namvietplastic.com/vn/content/22-cong-trinh-benh-vien-da-khoa-dong-nai\" onclick=\"return !\r\n                                                            window.open(this.href);\"><img alt=\"Mái che bệnh viện đa khoa Đồng Nai\" src=\"http://namvietplastic.com/modules/themeconfigurator/img/478b73254361423983adb2936e91084eae07d04b_\" /></a></p>\r\n\r\n<p>C&ocirc;ng tr&igrave;nh sử dụng sản phẩm tấm lấy s&aacute;ng định h&igrave;nh kim tự th&aacute;p để l&agrave;m m&aacute;i che. Sản phẩm được đ&uacute;c nguy&ecirc;n khối h&igrave;nh ch&oacute;p tứ gi&aacute;c đều, mang lại sự tinh tế v&agrave; hiện đại.</p>\r\n', '<p><a href=\"http://namvietplastic.com/vn/content/22-cong-trinh-benh-vien-da-khoa-dong-nai\" onclick=\"return !\r\n                                                            window.open(this.href);\"><img alt=\"Mái che bệnh viện đa khoa Đồng Nai\" src=\"http://namvietplastic.com/modules/themeconfigurator/img/478b73254361423983adb2936e91084eae07d04b_\" /></a></p>\r\n\r\n<p>Some Content</p>\r\n', '/uploads/projects/b3b39fa9b649e1835c3b6a27360fa800.jpg', 'mai-che-benh-vien-da-khoa-dong-nai-', 'sites/product/tm-ly-sng-polycarbonate-nice-light-', 'vn', '2018-03-22 23:52:36');
INSERT INTO `ci_projects` VALUES (4, 'Nhà máy đóng tàu Hyundai-Vinashin Khánh Hòa', 'Vinashin-Khanh Hoa', 'Nhà máy đóng tàu Hyundai-Vinashin Khánh Hòa', 'Công trình sử dụng Tôn nhựa lấy sáng Polycarbonate trong suốt để lấy sáng trên mái và vách, nhờ đó tiết kiệm đáng kể chi phí nặng lượng từ việc chiếu sáng.', 'Some Short Content', '<p><a href=\"http://namvietplastic.com/vn/content/56-ton-nhua-lay-sang-mai-ton-vach-polycarbonate\" onclick=\"return !\r\n                                                            window.open(this.href);\"><img alt=\"Nhà máy đóng tàu Hyundai-Vinashin Khánh Hòa\" src=\"http://namvietplastic.com/modules/themeconfigurator/img/17a8b16290cf0684e55a2299324df163c25f1314_\" /></a></p>\r\n\r\n<p>C&ocirc;ng tr&igrave;nh sử dụng T&ocirc;n nhựa lấy s&aacute;ng Polycarbonate trong suốt để lấy s&aacute;ng tr&ecirc;n m&aacute;i v&agrave; v&aacute;ch, nhờ đ&oacute; tiết kiệm đ&aacute;ng kể chi ph&iacute; nặng lượng từ việc chiếu s&aacute;ng.</p>\r\n', '<p>Some Content</p>\r\n', '/uploads/projects/42d1260a34cf938b4b84eafc79277c0a.jpg', 'nha-may-dong-tau-hyundai-vinashin-khanh-hoa-3', 'sites/product/tn-nha-ly-sng-polycarbonate-20', 'vn', '2018-03-23 00:11:53');

-- ----------------------------
-- Table structure for ci_settings
-- ----------------------------
DROP TABLE IF EXISTS `ci_settings`;
CREATE TABLE `ci_settings`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 537 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ci_settings
-- ----------------------------
INSERT INTO `ci_settings` VALUES (517, 'logoFE', '/uploads/system/5a66c966cba05e93a5d827ce2ba132a9.jpg', '2018-03-24 23:27:10');
INSERT INTO `ci_settings` VALUES (518, 'favicon', '/uploads/system/chair2.jpg', '2018-03-24 23:27:10');
INSERT INTO `ci_settings` VALUES (519, 'defaultPageTitle', 'CÔNG TY TNHH TM DV SX NHỰA NAM VIỆT', '2018-03-24 23:27:10');
INSERT INTO `ci_settings` VALUES (520, 'defaultPageTitle_en', 'NAM VIET PLASTIC PRODUCTION SERVICE TRADING CO., LTD.', '2018-03-24 23:27:10');
INSERT INTO `ci_settings` VALUES (521, 'introduce', '<p>C&ocirc;ng ty TNHH TM - DV - SX Nhựa Nam Việt l&agrave; nh&agrave; sản xuất v&agrave; ph&acirc;n phối c&aacute;c sản phẩm từ nhựa Polycarbonate như: T&ocirc;n nhựa lấy s&aacute;ng Polycarbonate - Tấm lợp lấy s&aacute;ng Polycarbonate - Tấm lợp định h&igrave;nh... ti&ecirc;u chuẩn quốc tế h&agrave;ng đầu Việt Nam. Được th&agrave;nh lập năm 2011 với tư c&aacute;ch ph&aacute;p nh&acirc;n l&agrave; C&ocirc;ng ty TNHH TM - DV - SX Nhựa Nam Việt, c&oacute; trụ sở l&agrave;m việc tại 362 Điện Bi&ecirc;n Phủ, phường 17, quận B&igrave;nh Thạnh, TP. Hồ Ch&iacute; Minh.</p>\r\n', '2018-03-24 23:27:10');
INSERT INTO `ci_settings` VALUES (522, 'introduce_en', '<p>Nam Viet Plastic Trading Service Co., Ltd is a manufacturer and distributor of Polycarbonate resins such as: polycarbonate polycarbonate resin - Polycarbonate roofing sheet - Polycarbonate roofing sheet - Corrugated roofing ... international standard in Vietnam. Established in 2011 as a legal entity is Nam Viet Plastic Trading - Service Co., Ltd, headquartered at 362 Dien Bien Phu Street, Ward 17, Binh Thanh District, Ho Chi Minh City. Ho Chi Minh.</p>\r\n', '2018-03-24 23:27:10');
INSERT INTO `ci_settings` VALUES (523, 'copyrightOnFooter', 'Copyright 2014 - 2018 www.namvietplastic.com', '2018-03-24 23:27:10');
INSERT INTO `ci_settings` VALUES (524, 'googleAnalytics', 'googleAnalytics', '2018-03-24 23:27:10');
INSERT INTO `ci_settings` VALUES (525, 'facebook', 'https://www.facebook.com/', '2018-03-24 23:27:10');
INSERT INTO `ci_settings` VALUES (526, 'googleplus', 'https://google.com/', '2018-03-24 23:27:10');
INSERT INTO `ci_settings` VALUES (527, 'twitter', '', '2018-03-24 23:27:10');
INSERT INTO `ci_settings` VALUES (528, 'youtube', 'https://youtube.com/', '2018-03-24 23:27:10');
INSERT INTO `ci_settings` VALUES (529, 'instagram', '', '2018-03-24 23:27:10');
INSERT INTO `ci_settings` VALUES (530, 'pinterest', '', '2018-03-24 23:27:10');
INSERT INTO `ci_settings` VALUES (531, 'linkedin', '', '2018-03-24 23:27:10');
INSERT INTO `ci_settings` VALUES (532, 'companyAddress', '362 Điện Biên Phủ, phường 17, quận Bình Thạnh, TPHCM', '2018-03-24 23:27:10');
INSERT INTO `ci_settings` VALUES (533, 'companyAddress_en', '362 Điện Biên Phủ, ward 17, Bình Thạnh District, HCM city', '2018-03-24 23:27:10');
INSERT INTO `ci_settings` VALUES (534, 'companyCellPhone', '0162706224', '2018-03-24 23:27:10');
INSERT INTO `ci_settings` VALUES (535, 'companyPhone', '08.0000000', '2018-03-24 23:27:10');
INSERT INTO `ci_settings` VALUES (536, 'companyEmail', 'lucjfer0407@gmail.com', '2018-03-24 23:27:10');

-- ----------------------------
-- Table structure for ci_users
-- ----------------------------
DROP TABLE IF EXISTS `ci_users`;
CREATE TABLE `ci_users`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `role_id` tinyint(1) NOT NULL,
  `application_id` tinyint(1) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `verify_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_first_login` tinyint(1) NOT NULL,
  `avarta` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `background` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  `update_date` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ci_users
-- ----------------------------
INSERT INTO `ci_users` VALUES (1, 1, 1, 'admin', 'lucjfer0407@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Lucjer', 'Devil', 'Lucjer Devil', '115', 'Nam', '0000-00-00', '', 0, '/uploads/admin/257fae197f0739d58db77577b679f25b.png', '/uploads/admin/landscape3.jpg', 1, '2018-03-12 15:04:03', '0000-00-00 00:00:00');
INSERT INTO `ci_users` VALUES (2, 0, 2, '', 'lucjfer0407@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ho', 'ten Ten', 'ten Ten ho', '', 'Nam', '2018-01-01', '', 0, '', '', 0, '2018-03-12 13:33:49', '2018-03-12 07:33:49');
INSERT INTO `ci_users` VALUES (3, 0, 2, '', 'lmhieu2104@gmail.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Hêu', 'Lê minh hiếu', 'Lê minh hiếu Hêu', '', 'Nam', '2008-07-05', '', 0, '', '', 1, '2018-03-25 00:03:33', '2018-03-25 00:03:33');

SET FOREIGN_KEY_CHECKS = 1;

-- phpMyAdmin SQL Dump
-- version 4.4.15
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2017 at 09:52 AM
-- Server version: 10.0.26-MariaDB
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vn3c_kidsandmom`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL,
  `title` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `template` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_type` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_hide` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `title`, `slug`, `parent`, `template`, `icon`, `description`, `image`, `post_type`, `is_hide`, `created_at`, `updated_at`) VALUES
(10, 'Quần áo - Giày dép - Phụ kiện', 'quan-ao-giay-dep-phu-kien', 0, 'default', NULL, NULL, '/assets/uploads/images/icon/icon5.PNG', 'product', NULL, NULL, '2017-10-23 04:47:51'),
(9, 'Đồ dùng - Máy móc - Nôi cũi', 'do-dung-may-moc-noi-cui', 0, 'default', NULL, NULL, '/assets/uploads/images/icon/icon4.PNG', 'product', NULL, NULL, '2017-10-23 04:47:40'),
(8, 'Bỉm tã - khăn giấy ướt', 'bim-ta-khan-giay-uot', 0, 'default', NULL, NULL, '/assets/uploads/images/icon/icon3.png', 'product', NULL, NULL, '2017-10-23 04:47:31'),
(7, 'Sữa - Thực phẩm ăn dặm', 'sua-thuc-pham-an-dam', 0, 'default', NULL, NULL, '/assets/uploads/images/icon/icon2.png', 'product', NULL, NULL, '2017-10-23 04:47:24'),
(6, 'Đồ sơ sinh - Bình sữa', 'do-so-sinh-binh-sua', 0, 'default', NULL, NULL, '/assets/uploads/images/icon/icon1.png', 'product', NULL, NULL, '2017-10-23 04:35:38'),
(11, 'Thế giới đồ chơi cho bé', 'the-gioi-do-choi-cho-be', 0, 'default', NULL, NULL, '/assets/uploads/images/icon/icon6.PNG', 'product', NULL, NULL, NULL),
(12, 'Gian hàng dành cho mẹ', 'gian-hang-danh-cho-me', 0, 'default', NULL, NULL, '/assets/uploads/images/icon/icon7.PNG', 'product', NULL, NULL, NULL),
(13, 'Đồ gia dụng - Điện gia dụng', 'do-gia-dung-dien-gia-dung', 0, 'default', NULL, NULL, '/assets/uploads/images/icon/icon8.png', 'product', NULL, NULL, '2017-10-23 04:48:00'),
(14, 'Hot Deal', 'hot-deal', 0, 'hot-deal', NULL, NULL, '/assets/uploads/images/icon/icon9.PNG', 'product', NULL, NULL, '2017-11-03 02:34:53'),
(15, 'Tin tức', 'tin-tuc', 0, 'default', NULL, NULL, '/kcfinder-master/upload/images/banner_new_1.png', 'post', NULL, NULL, '2017-11-10 01:18:51'),
(16, 'Blog', 'blog', 0, 'default', NULL, NULL, NULL, 'post', NULL, NULL, NULL),
(17, 'Tin khuyến mãi', 'tin-khuyen-mai', 0, 'default', NULL, NULL, NULL, 'post', NULL, NULL, NULL),
(18, 'Sản phẩm nổi bật', 'san-pham-noi-bat', 0, 'default', NULL, NULL, NULL, 'product', NULL, NULL, NULL),
(19, 'Sản phẩm', 'san-pham', 0, 'default', NULL, NULL, NULL, 'product', NULL, NULL, NULL),
(20, 'Câu hỏi thường gặp', 'cau-hoi-thuong-gap', 0, 'default', NULL, NULL, NULL, 'post', NULL, NULL, NULL),
(21, 'Thời trang bé trai', 'thoi-trang-be-trai', 0, 'default', NULL, NULL, '/assets/uploads/images/danh%20muc/thoi-trang-be-trai.png', 'product', NULL, NULL, NULL),
(22, 'Thời trang bé gái', 'thoi-trang-be-gai', 0, 'default', NULL, NULL, '/assets/uploads/images/danh%20muc/thoi-trang-be-gai.png', 'product', NULL, NULL, NULL),
(23, 'Bỉm và sữa', 'bim-va-sua', 0, 'default', NULL, NULL, '/assets/uploads/images/danh%20muc/bim-sua.PNG', 'product', NULL, NULL, NULL),
(24, 'Đồ dùng cho mẹ', 'do-dung-cho-me', 0, 'default', NULL, NULL, '/assets/uploads/images/danh%20muc/do-dung-cho-me.png', 'product', NULL, NULL, NULL),
(25, 'Danh mục cấp 2 - 1', 'danh-muc-cap-2---1', 7, 'default', NULL, NULL, NULL, 'product', NULL, NULL, NULL),
(26, 'Danh mục cấp 2 -2', 'danh-muc-cap-2--2', 7, 'default', NULL, NULL, NULL, 'product', NULL, NULL, NULL),
(27, 'Danh mục cấp 2 -3', 'danh-muc-cap-2--3', 7, 'default', NULL, NULL, NULL, 'product', NULL, NULL, NULL),
(28, 'Danh mục cấp 2-4', 'danh-muc-cap-2-4', 7, 'default', NULL, NULL, NULL, 'product', NULL, NULL, '2017-11-08 13:16:29'),
(29, 'Danh mục cấp 2-5', 'danh-muc-cap-2-5', 7, 'default', NULL, NULL, NULL, 'product', NULL, NULL, NULL),
(30, 'Danh mục cấp 3-1', 'danh-muc-cap-3-1', 25, 'default', NULL, NULL, NULL, 'product', NULL, NULL, NULL),
(31, 'Danh mục cấp 3-2', 'danh-muc-cap-3-2', 25, 'default', NULL, NULL, NULL, 'product', NULL, NULL, NULL),
(32, 'Mẹ và bé', 'me-va-be', 16, 'default', NULL, NULL, NULL, 'post', NULL, NULL, NULL),
(33, 'Hướng dẫn nuôi con', 'huong-dan-nuoi-con', 16, 'default', NULL, NULL, NULL, 'post', NULL, NULL, NULL),
(34, 'Gia đình văn hóa', 'gia-dinh-van-hoa', 16, 'default', NULL, NULL, NULL, 'post', NULL, NULL, NULL),
(35, 'Trẻ và học đường', 'tre-va-hoc-duong', 16, 'default', NULL, NULL, NULL, 'post', NULL, NULL, NULL),
(36, 'Hỏi đáp cho gia dình', 'hoi-dap-cho-gia-dinh', 16, 'default', NULL, NULL, NULL, 'post', NULL, NULL, NULL),
(37, 'Nuôi con hiệu quả', 'nuoi-con-hieu-qua', 16, 'default', NULL, NULL, NULL, 'post', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

CREATE TABLE IF NOT EXISTS `category_post` (
  `category_post_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=321 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_post`
--

INSERT INTO `category_post` (`category_post_id`, `category_id`, `post_id`, `updated_at`, `created_at`) VALUES
(47, 19, 20, NULL, NULL),
(164, 19, 21, NULL, NULL),
(269, 15, 22, NULL, NULL),
(279, 15, 23, NULL, NULL),
(14, 15, 24, NULL, NULL),
(15, 15, 25, NULL, NULL),
(57, 15, 26, NULL, NULL),
(46, 18, 20, NULL, NULL),
(148, 19, 27, NULL, NULL),
(154, 19, 28, NULL, NULL),
(157, 19, 29, NULL, NULL),
(156, 18, 29, NULL, NULL),
(155, 14, 29, NULL, NULL),
(153, 18, 28, NULL, NULL),
(152, 14, 28, NULL, NULL),
(147, 18, 27, NULL, NULL),
(146, 14, 27, NULL, NULL),
(163, 18, 21, NULL, NULL),
(162, 14, 21, NULL, NULL),
(161, 6, 21, NULL, NULL),
(45, 14, 20, NULL, NULL),
(44, 6, 20, NULL, NULL),
(52, 16, 30, NULL, NULL),
(53, 16, 32, NULL, NULL),
(54, 16, 33, NULL, NULL),
(151, 16, 34, NULL, NULL),
(56, 16, 31, NULL, NULL),
(58, 16, 26, NULL, NULL),
(59, 20, 35, NULL, NULL),
(60, 20, 36, NULL, NULL),
(61, 20, 37, NULL, NULL),
(62, 20, 38, NULL, NULL),
(63, 20, 39, NULL, NULL),
(64, 20, 40, NULL, NULL),
(65, 20, 41, NULL, NULL),
(66, 20, 42, NULL, NULL),
(91, 19, 61, NULL, NULL),
(92, 19, 63, NULL, NULL),
(93, 19, 64, NULL, NULL),
(158, 13, 70, NULL, NULL),
(159, 18, 70, NULL, NULL),
(160, 19, 70, NULL, NULL),
(297, 28, 71, NULL, NULL),
(296, 27, 71, NULL, NULL),
(295, 21, 71, NULL, NULL),
(294, 19, 71, NULL, NULL),
(293, 18, 71, NULL, NULL),
(302, 24, 72, NULL, NULL),
(301, 23, 72, NULL, NULL),
(300, 19, 72, NULL, NULL),
(299, 18, 72, NULL, NULL),
(298, 14, 72, NULL, NULL),
(307, 19, 73, NULL, NULL),
(306, 18, 73, NULL, NULL),
(305, 14, 73, NULL, NULL),
(304, 10, 73, NULL, NULL),
(303, 9, 73, NULL, NULL),
(313, 23, 78, NULL, NULL),
(312, 22, 78, NULL, NULL),
(311, 21, 78, NULL, NULL),
(310, 19, 78, NULL, NULL),
(309, 18, 78, NULL, NULL),
(308, 14, 78, NULL, NULL),
(320, 18, 79, NULL, NULL),
(319, 14, 79, NULL, NULL),
(318, 13, 79, NULL, NULL),
(317, 12, 79, NULL, NULL),
(316, 11, 79, NULL, NULL),
(315, 10, 79, NULL, NULL),
(314, 9, 79, NULL, NULL),
(271, 16, 83, NULL, NULL),
(292, 14, 71, NULL, NULL),
(291, 13, 71, NULL, NULL),
(290, 28, 71, NULL, NULL),
(289, 27, 71, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `content`, `user_id`, `post_id`, `customer_name`, `customer_email`, `customer_phone`, `rating`, `parent`, `created_at`, `updated_at`) VALUES
(18, 'Cái này phải sửa cả avatar này', 1, 73, NULL, NULL, NULL, NULL, 0, '2017-11-08', NULL),
(17, 'Sửa ngay cái bình luận này đi, thiếu nhiều chức năng rồi', 1, 71, NULL, NULL, NULL, NULL, 0, '2017-11-08', NULL),
(16, 'Bình luận mới sao ở dưới vậy ta', 1, 71, NULL, NULL, NULL, NULL, 0, '2017-11-08', NULL),
(15, 'Bình luận bị lỗi', 1, 71, NULL, NULL, NULL, NULL, 0, '2017-11-08', NULL),
(19, 'THêm cái bình luận xem sao', 1, 71, NULL, NULL, NULL, NULL, 0, '2017-11-10', NULL),
(20, 'Thử bình luận lại xem sao', 0, 71, NULL, NULL, NULL, NULL, 0, '2017-11-16', NULL),
(21, 'khikasdasd', 1, 83, NULL, NULL, NULL, NULL, 0, '2017-11-16', NULL),
(23, 'Aljc', 0, 32, NULL, NULL, NULL, NULL, 0, '2017-11-24', NULL),
(24, 'ddđ', 0, 72, NULL, NULL, NULL, NULL, 0, '2017-11-25', NULL),
(25, 'Sản phẩm rất là tốt', 0, 79, 'developer test', '1234567890', 'vn3c@info.com', 5, 0, '2017-11-30', NULL),
(26, 'Sản phẩm này rất là tốt.', 0, 79, 'hhhh', '89999', 'uuuu@gmai.com', 5, 0, '2017-11-30', '2017-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `phone`, `email`, `address`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Trần Nam', '1234561735', 'vn3ctran@gmail.com', 'Cổ đông sơn tây', 'test', '2017-12-05 15:58:07', '2017-12-05 15:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `group_mail`
--

CREATE TABLE IF NOT EXISTS `group_mail` (
  `group_mail_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_mail`
--

INSERT INTO `group_mail` (`group_mail_id`, `name`, `description`, `updated_at`) VALUES
(2, 'Bạn cấp 2', 'Trường Sơn Tây', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `infor_id` int(11) NOT NULL,
  `slug_type_input` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`infor_id`, `slug_type_input`, `content`, `updated_at`) VALUES
(1, 'logo', '/assets/uploads/images/thong%20tin%20trang/logo.PNG', NULL),
(2, 'so-dien-thoai', '097 456 1735', NULL),
(3, 'holine', '097.456.1735', NULL),
(4, 'khung-gio-lam-viec', '8:00 - 22:00', NULL),
(5, 'email', 'vn3c.jsc@gmail.com', NULL),
(6, 'dia-chi', 'Số 4, xóm Điếm, xã Hữu Hòa, Thanh Trì Hà Nội', NULL),
(7, 'website', 'kidmomshop.com', NULL),
(8, 'chung-chi', '/assets/uploads/images/thong%20tin%20trang/cefecris.PNG', NULL),
(9, 'dien-thoai-cuoi-trang', '093 455 3435 - 097 456 1735', NULL),
(10, 'hot-tags', 'Đồ sơ sinh Bỉm Merries Bỉm MoonyBỉm Goon Bình sữa cho béMáy tiệt trùng bình sữaMáy hâm sữa Ghế rung trẻ em Xe đẩy em béNôi cũi trẻ emMáy hút sữa MedelaTủ nhựaXe đẩy SeebabyQuần áo sơ sinhMáy hút sữa AventBột ăn dặm Aptamil Bình sữa ComotomoBình sữa MedelaBình sữa AventMáy xay BraunXe đẩy ZaracosXe đẩy ApricaXe đẩy CombiXe đẩy SeebabyXe tập điGhế ăn cho béGhế rung cho béNôi xách tay Địu trẻ emGiường cũi trẻ emGiường tầng cho bé Thảm chơi cho béSữa AptamilSữa MeijiSữa S26Sữa PhysiolacSữa MorinagaSữa Nan Sữa IcreoSữa CeliaSữa GuigozBánh ăn dặmváng sữaSữa non GoodhealthBột ăn dặm Hipp Bột yến mạchBột ăn dặm NestleBột ăn dặm GerberBột ăn dặm HeinzBột ăn dặm AptamilBột ăn dặm Celia', NULL),
(11, 'ten-cong-ty', 'KID AND MOM SHOP', NULL),
(12, 'banner-top', '/kcfinder-master/upload/images/banner_b922ede9.png', '2017-11-07 13:25:04'),
(13, 'hotline', '097 456 1735', '2017-10-23 10:22:23'),
(14, 'thanh-toan-online', '/assets/uploads/images/thong%20tin%20trang/thanh-toan-online.png', NULL),
(15, 'giao-hang-nhanh', '/assets/uploads/images/thong%20tin%20trang/giao%20hang%20nhanh.png', NULL),
(16, 'vi-tri-quang-cao-1', '/assets/uploads/images/thong%20tin%20trang/quangcao1.png', NULL),
(17, 'vi-tri-quang-cao-2', '/assets/uploads/images/thong%20tin%20trang/quangcao2.png', NULL),
(18, 'fanpage-facebook', '<div id="fb-root"></div>\r\n<script>(function(d, s, id) {\r\n  var js, fjs = d.getElementsByTagName(s)[0];\r\n  if (d.getElementById(id)) return;\r\n  js = d.createElement(s); js.id = id;\r\n  js.src = ''https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1701879653427820'';\r\n  fjs.parentNode.insertBefore(js, fjs);\r\n}(document, ''script'', ''facebook-jssdk''));</script>\r\n<div class="fb-page" data-href="https://www.facebook.com/ngocdiepdesign/" data-tabs="" data-height="300px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/ngocdiepdesign/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ngocdiepdesign/">Công ty cổ phần công nghệ VN3C VIỆT NAM</a></blockquote></div>', '2017-11-09 10:24:54'),
(19, 'link-fanpage', 'http://facebook.com', '2017-10-28 15:47:34'),
(20, 'thong-tin-cuoi-trang', 'Mua hàng và thanh toán\r\n- Mua hàng trực tiếp tại Địa chỉ của shop\r\n- Đặt hàng online qua mạng xã hội hoặc tại \r\nwebsite kidandmomshop.com.\r\n- Giao hàng toàn quốc và thu tiền tận nhà!', NULL),
(21, 'meta_title', 'Kids and Mom Shop', '2017-11-07 15:38:46'),
(22, 'meta_description', 'Mua hàng và thanh toán\r\n- Mua hàng trực tiếp tại Địa chỉ của shop\r\n- Đặt hàng online qua mạng xã hội hoặc tại \r\nwebsite kidandmomshop.com.\r\n- Giao hàng toàn quốc và thu tiền tận nhà!', NULL),
(23, 'meta_keyword', 'đồ dùng trẻ em, đồ chơi trẻ em, bỉm và sữa', '2017-11-07 15:38:46'),
(24, 'bang-gia-chi-tiet-van-chuyen-san-pham', 'Quanh hà nội', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `input`
--

CREATE TABLE IF NOT EXISTS `input` (
  `input_id` int(11) NOT NULL,
  `type_input_slug` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `post_id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=355 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `input`
--

INSERT INTO `input` (`input_id`, `type_input_slug`, `content`, `post_id`, `updated_at`) VALUES
(1, 'gia-tu', '0', 47, NULL),
(2, 'den-gia', '200000', 47, NULL),
(3, 'gia-tu', '200000', 48, NULL),
(4, 'den-gia', '500000', 48, NULL),
(5, 'gia-tu', '500000', 49, NULL),
(6, 'den-gia', '1000000', 49, NULL),
(7, 'gia-tu', '1000000', 50, NULL),
(8, 'den-gia', '50000000', 50, NULL),
(209, 'tags', 'mẹ và bé, đồ sơ sinh', 29, NULL),
(208, 'san-pham-mua-cung', 'siro-tri-ho-cam-sot-paburon-s-cho-be-tu-3-thang,mi-an-dam-mug-nissin-nhat-ban-vi-hai-san,lan-tri-muoi-dot-va-con-trung-can-muhi-50ml', 29, NULL),
(31, 'xuat-xu', NULL, 61, NULL),
(32, 'hang-san-xuat', NULL, 61, NULL),
(33, 'so-luong-trong-kho', NULL, 61, NULL),
(34, 'bang-gia-van-chuyen', NULL, 61, NULL),
(35, 'san-pham-mua-cung', NULL, 61, NULL),
(36, 'xuat-xu', NULL, 63, NULL),
(37, 'hang-san-xuat', NULL, 63, NULL),
(38, 'so-luong-trong-kho', NULL, 63, NULL),
(39, 'bang-gia-van-chuyen', NULL, 63, NULL),
(40, 'san-pham-mua-cung', NULL, 63, NULL),
(41, 'xuat-xu', NULL, 64, NULL),
(42, 'hang-san-xuat', NULL, 64, NULL),
(43, 'so-luong-trong-kho', NULL, 64, NULL),
(44, 'bang-gia-van-chuyen', NULL, 64, NULL),
(45, 'san-pham-mua-cung', NULL, 64, NULL),
(202, 'san-pham-mua-cung', NULL, 28, NULL),
(205, 'hang-san-xuat', 'viet-nam-xuat-khau', 29, NULL),
(206, 'so-luong-trong-kho', '15', 29, NULL),
(207, 'bang-gia-van-chuyen', '- Nội thành Hà Nội(Cách 522 Xã đàn <8km): 20K (Nhận hàng sau 2h)\r\n- Ngoại thành Hà Nội: 30K (Nhận hàng sau 1 ngày)\r\n- Tỉnh/Thành phố khác: 35K (Ship COD từ 2 đến 3 ngày)', 29, NULL),
(70, 'ho-va-ten', NULL, 65, NULL),
(71, 'dien-thoai', NULL, 65, NULL),
(72, 'email', NULL, 65, NULL),
(73, 'cau-hoi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae mi et ante vulputate hendrerit ut ut urna. Ut vel mauris blandit, pellentesque eros at, luctus elit. Integer quis mattis tortor, vel porttitor leo. Pellentesque quis ante sed felis mattis porttitor. Vivamus lorem diam, accumsan et velit quis, aliquet fringilla quam. Cras tincidunt ligula eu nibh vehicula tincidunt. Sed id ullamcorper tellus, a imperdiet massa. Nullam vel luctus leo. Nulla facilisi. Fusce vitae libero at tellus posuere tempus vel malesuada tellus. Etiam eleifend iaculis dui ac mattis?', 65, NULL),
(74, 'cau-tra-loi', '<p>Nullam fermentum felis ac efficitur varius. Cras lorem eros, condimentum in tincidunt ut, varius sed velit. Etiam ornare neque volutpat, faucibus ex in, vestibulum tortor. Sed sit amet ultricies turpis, eu commodo mauris. Aliquam lobortis</p>\r\n\r\n<p>Vestibulum auctor rhoncus viverra. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam id est id ligula accumsan placerat. Donec sed neque nulla. Quisque vel nulla tempus, imperdiet nibh in, auctor leo. Praesent at nisi nec mauris malesuada cursus sit amet sit amet tortor. Nam a egestas neque. Quisque faucibus, odio sed eleifend facilisis, dui arcu dapibus orci, nec sagittis lectus risus pellentesque nibh. Integer nisl eros, condimentum vel consequat et, auctor vitae nulla. Integer varius feugiat luctus. Phasellus eu lectus ac odio viverra sollicitudin. Nulla facilisi. Donec pretium enim ex, sed placerat arcu posuere ac. Etiam malesuada, mauris at aliquam elementum, orci erat venenatis tellus, non malesuada tortor justo in quam.</p>', 65, NULL),
(75, 'to', '[your-email]', 66, NULL),
(76, 'from', 'vn3ctran@gmail.com', 66, NULL),
(77, 'chu-de-(subject)', '[your-subject]', 66, NULL),
(95, 'chu-de-(subject)', 'Thông tin thay đổi tài khoản tại kidandmom', 67, NULL),
(94, 'from', 'vn3ctran@gmail.com', 67, NULL),
(93, 'to', '[your-email]', 67, NULL),
(204, 'xuat-xu', 'viet-nam', 29, NULL),
(203, 'tags', NULL, 28, NULL),
(201, 'bang-gia-van-chuyen', NULL, 28, NULL),
(200, 'so-luong-trong-kho', NULL, 28, NULL),
(177, 'san-pham-mua-cung', NULL, 27, NULL),
(176, 'bang-gia-van-chuyen', NULL, 27, NULL),
(175, 'so-luong-trong-kho', NULL, 27, NULL),
(174, 'hang-san-xuat', 'viet-nam-xuat-khau', 27, NULL),
(173, 'xuat-xu', 'dai-loan', 27, NULL),
(199, 'hang-san-xuat', 'viet-nam-xuat-khau', 28, NULL),
(198, 'xuat-xu', 'dai-loan', 28, NULL),
(178, 'gia-mua-cung-san-pham', NULL, 27, NULL),
(179, 'tags', NULL, 27, NULL),
(352, 'to', 'vn3ctran@gmail.com', 84, NULL),
(191, 'chu-de-(subject)', 'kidandmom đơn hàng mới', 69, NULL),
(189, 'to', 'vn3ctran@gmail.com', 69, NULL),
(190, 'from', 'vn3ctran@gmail.com', 69, NULL),
(351, 'chu-de-(subject)', 'Đặt hàng thành công tại kidandmom', 68, NULL),
(210, 'xuat-xu', 'dai-loan', 70, NULL),
(211, 'hang-san-xuat', 'viet-nam-xuat-khau', 70, NULL),
(212, 'so-luong-trong-kho', '53', 70, NULL),
(213, 'bang-gia-van-chuyen', NULL, 70, NULL),
(214, 'san-pham-mua-cung', NULL, 70, NULL),
(215, 'tags', NULL, 70, NULL),
(216, 'xuat-xu', 'dai-loan', 21, NULL),
(217, 'hang-san-xuat', 'viet-nam-xuat-khau', 21, NULL),
(218, 'so-luong-trong-kho', NULL, 21, NULL),
(219, 'bang-gia-van-chuyen', NULL, 21, NULL),
(220, 'san-pham-mua-cung', NULL, 21, NULL),
(221, 'tags', NULL, 21, NULL),
(336, 'so-luong-trong-kho', NULL, 72, NULL),
(335, 'hang-san-xuat', 'LAZADA', 72, NULL),
(334, 'xuat-xu', 'Đài loan', 72, NULL),
(339, 'so-luong-trong-kho', '12', 73, NULL),
(337, 'xuat-xu', 'Đài loan', 73, NULL),
(338, 'hang-san-xuat', 'LAZADA', 73, NULL),
(353, 'from', '3ae@info.com', 84, NULL),
(354, 'chu-de-(subject)', 'koma, Form liên hệ từ khách hàng.', 84, NULL),
(341, 'hang-san-xuat', 'LAZADA', 78, NULL),
(342, 'so-luong-trong-kho', '13', 78, NULL),
(340, 'xuat-xu', 'Đài loan', 78, NULL),
(333, 'so-luong-trong-kho', '24', 71, NULL),
(349, 'to', '[user-email]', 68, NULL),
(350, 'from', 'vn3ctran@gmail.com', 68, NULL),
(343, 'xuat-xu', 'Đài loan', 79, NULL),
(344, 'hang-san-xuat', 'LAZADA', 79, NULL),
(345, 'so-luong-trong-kho', '12', 79, NULL),
(332, 'hang-san-xuat', 'NoIAM', 71, NULL),
(331, 'xuat-xu', 'Nhật Bản', 71, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `title`, `slug`, `location`, `image`, `created_at`, `updated_at`) VALUES
(1, 'menu chính', 'menu-chinh', 'menu-chinh', NULL, NULL, '2017-11-06 07:44:34'),
(2, 'menu sản phẩm', 'menu-san-pham', 'menu-product', NULL, NULL, '2017-11-06 07:44:24'),
(3, 'menu cuối trang', 'menu-cuoi-trang', 'menu-footer', NULL, NULL, '2017-11-06 07:44:11'),
(4, 'Giới thiệu KIDANMOM', 'footer-1', 'footer-first', NULL, NULL, '2017-11-06 07:44:04'),
(5, 'Hướng dẫn mua hàng', 'footer-2', 'footer-third', NULL, NULL, '2017-11-06 07:43:58'),
(6, 'Chăm sóc khách hàng', 'footer-3', 'footer-third', NULL, NULL, '2017-11-06 07:43:52'),
(7, 'Gian hàng dành cho mẹ', 'side-noi-dung-2', 'side-left-menu', '/kcfinder-master/upload/images/banner2.jpg', NULL, '2017-11-09 09:55:57'),
(8, 'Sữa - Thực phẩm ăn dặm', 'side-noi-dung-1', 'side-left-menu', '/kcfinder-master/upload/images/banner1.jpg', NULL, '2017-11-09 09:52:56'),
(10, 'Blog', 'side-home-3', 'sider-bar-blog', NULL, NULL, '2017-11-07 08:25:50'),
(11, 'menu trong trang sản phẩm', 'menu-trong-trang-san-pham', 'menu-product', NULL, NULL, '2017-11-06 07:43:33'),
(12, 'Ảnh menu', 'anh-menu', 'anh-menu', NULL, NULL, '2017-11-06 07:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `menu_element`
--

CREATE TABLE IF NOT EXISTS `menu_element` (
  `menu_element_id` int(11) NOT NULL,
  `menu_slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_show` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_level` int(11) DEFAULT NULL,
  `menu_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=481 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_element`
--

INSERT INTO `menu_element` (`menu_element_id`, `menu_slug`, `url`, `title_show`, `menu_level`, `menu_image`, `updated_at`, `created_at`) VALUES
(289, 'menu-san-pham', 'gian-hang-danh-cho-me', 'Gian hàng dành cho mẹ', 1, '/assets/uploads/images/icon/icon7.PNG', NULL, NULL),
(287, 'menu-san-pham', 'quan-ao-giay-dep-phu-kien', 'Quần áo - Giày dép - Phụ kiện', 1, '/assets/uploads/images/icon/icon5.PNG', NULL, NULL),
(288, 'menu-san-pham', 'the-gioi-do-choi-cho-be', 'Thế giới đồ chơi cho bé', 1, '/assets/uploads/images/icon/icon6.PNG', NULL, NULL),
(286, 'menu-san-pham', 'do-dung-may-moc-noi-cui', 'Đồ dùng - Máy móc - Nôi cũi', 1, '/assets/uploads/images/icon/icon4.PNG', NULL, NULL),
(290, 'menu-san-pham', 'do-gia-dung-dien-gia-dung', 'Đồ gia dụng - Điện gia dụng', 1, '/assets/uploads/images/icon/icon8.png', NULL, NULL),
(285, 'menu-san-pham', 'bim-ta-khan-giay-uot', 'Bỉm tã - khăn giấy ướt', 1, '/assets/uploads/images/icon/icon3.png', NULL, NULL),
(284, 'menu-san-pham', 'sua-thuc-pham-an-dam', 'Sữa - Thực phẩm ăn dặm', 1, '/assets/uploads/images/icon/icon2.png', NULL, NULL),
(283, 'menu-san-pham', 'do-so-sinh-binh-sua', 'Đồ sơ sinh - Bình sữa', 1, '/assets/uploads/images/icon/icon1.png', NULL, NULL),
(281, 'menu-cuoi-trang', 'tin-tuc', 'Tin tức', 1, NULL, NULL, NULL),
(280, 'menu-cuoi-trang', 'hot-deal', 'Hot Deal', 1, '/assets/uploads/images/icon/icon9.PNG', NULL, NULL),
(279, 'menu-cuoi-trang', '/', 'Trang chủ', 1, NULL, NULL, NULL),
(27, 'gioi-thieu-kidanmom', 'gioi-thieu', 'Giới thiệu', 1, NULL, NULL, NULL),
(28, 'gioi-thieu-kidanmom', 'tin-khuyen-mai', 'Tin khuyến mãi', 1, NULL, NULL, NULL),
(29, 'gioi-thieu-kidanmom', 'trung-tam-ban-buon', 'Trung tâm bán buôn', 1, NULL, NULL, NULL),
(30, 'gioi-thieu-kidanmom', 'blog', 'Blog', 1, NULL, NULL, NULL),
(31, 'huong-dan-mua-hang', 'cam-ket-ban-hang', 'Cam kết bán hàng', 1, NULL, NULL, NULL),
(32, 'huong-dan-mua-hang', 'huong-dan-mua-hang', 'Hướng dẫn mua hàng', 1, NULL, NULL, NULL),
(33, 'huong-dan-mua-hang', 'phuong-thuc-thanh-toan', 'Phương thức thanh toán', 1, NULL, NULL, NULL),
(34, 'huong-dan-mua-hang', 'phuong-thuc-van-chuyen', 'Phương thức vận chuyển', 1, NULL, NULL, NULL),
(35, 'huong-dan-mua-hang', 'nhung-cau-hoi-thuong-gap', 'Những câu hỏi thường gặp', 1, NULL, NULL, NULL),
(36, 'huong-dan-mua-hang', 'chinh-sach-bao-mat', 'Chính sách bảo mật', 1, NULL, NULL, NULL),
(37, 'huong-dan-mua-hang', 'dieu-khoan-su-dung', 'Điều khoản sử dụng', 1, NULL, NULL, NULL),
(38, 'cham-soc-khach-hang', 'khach-hang-than-thiet', 'Khách hàng thân thiết', 1, NULL, NULL, NULL),
(39, 'cham-soc-khach-hang', 'chinh-sach-bao-hanh', 'Chính sách bảo hành', 1, NULL, NULL, NULL),
(40, 'cham-soc-khach-hang', 'phuong-thuc-thanh-toan', 'Phương thức thanh toán', 1, NULL, NULL, NULL),
(41, 'cham-soc-khach-hang', 'phuong-thuc-van-chuyen', 'Phương thức vận chuyển', 1, NULL, NULL, NULL),
(42, 'cham-soc-khach-hang', 'nhung-cau-hoi-thuong-gap', 'Những câu hỏi thường gặp', 1, NULL, NULL, NULL),
(43, 'cham-soc-khach-hang', 'chinh-sach-bao-hanh', 'Chính sách bảo hành', 1, NULL, NULL, NULL),
(44, 'cham-soc-khach-hang', 'dieu-khoan-su-dung', 'Điều khoản sử dụng', 1, NULL, NULL, NULL),
(45, 'gian-hang-danh-cho-me', 'do-so-sinh-binh-sua', 'Đồ sơ sinh - Bình sữa', 1, '/assets/uploads/images/icon/icon1.png', NULL, NULL),
(46, 'gian-hang-danh-cho-me', 'sua-thuc-pham-an-dam', 'Sữa - Thực phẩm ăn dặm', 1, '/assets/uploads/images/icon/icon2.png', NULL, NULL),
(47, 'gian-hang-danh-cho-me', 'bim-ta-khan-giay-uot', 'Bỉm tã - khăn giấy ướt', 1, '/assets/uploads/images/icon/icon3.png', NULL, NULL),
(48, 'gian-hang-danh-cho-me', 'do-dung-may-moc-noi-cui', 'Đồ dùng - Máy móc - Nôi cũi', 1, '/assets/uploads/images/icon/icon4.PNG', NULL, NULL),
(49, 'gian-hang-danh-cho-me', 'quan-ao-giay-dep-phu-kien', 'Quần áo - Giày dép - Phụ kiện', 1, '/assets/uploads/images/icon/icon5.PNG', NULL, NULL),
(50, 'gian-hang-danh-cho-me', 'the-gioi-do-choi-cho-be', 'Thế giới đồ chơi cho bé', 1, '/assets/uploads/images/icon/icon6.PNG', NULL, NULL),
(480, 'menu-chinh', '/lien-he', 'Liên hệ', 1, NULL, NULL, NULL),
(477, 'menu-chinh', '/hot-deal', 'Hot Deal', 1, '/assets/uploads/images/icon/icon9.PNG', NULL, NULL),
(475, 'menu-chinh', 'gian-hang-danh-cho-me', 'Gian hàng dành cho mẹ', 2, '/assets/uploads/images/icon/icon7.PNG', NULL, NULL),
(471, 'menu-chinh', 'bim-ta-khan-giay-uot', 'Bỉm tã - khăn giấy ướt', 2, '/assets/uploads/images/icon/icon3.png', NULL, NULL),
(472, 'menu-chinh', 'do-dung-may-moc-noi-cui', 'Đồ dùng - Máy móc - Nôi cũi', 2, '/assets/uploads/images/icon/icon4.PNG', NULL, NULL),
(473, 'menu-chinh', 'quan-ao-giay-dep-phu-kien', 'Quần áo - Giày dép - Phụ kiện', 2, '/assets/uploads/images/icon/icon5.PNG', NULL, NULL),
(474, 'menu-chinh', 'the-gioi-do-choi-cho-be', 'Thế giới đồ chơi cho bé', 2, '/assets/uploads/images/icon/icon6.PNG', NULL, NULL),
(468, 'menu-chinh', '/cua-hang/quan-ao-giay-dep-phu-kien', 'Quần áo - Giày dép - Phụ kiện', 3, '/assets/uploads/images/icon/icon5.PNG', NULL, NULL),
(405, 'side-noi-dung-1', '/cua-hang/the-gioi-do-choi-cho-be', 'Thế giới đồ chơi cho bé', 1, '/assets/uploads/images/icon/icon6.PNG', NULL, NULL),
(403, 'side-noi-dung-1', '/cua-hang/quan-ao-giay-dep-phu-kien', 'Quần áo - Giày dép - Phụ kiện', 1, '/assets/uploads/images/icon/icon5.PNG', NULL, NULL),
(404, 'side-noi-dung-1', '/cua-hang/the-gioi-do-choi-cho-be', 'Thế giới đồ chơi cho bé', 1, '/assets/uploads/images/icon/icon6.PNG', NULL, NULL),
(402, 'side-noi-dung-1', '/cua-hang/do-dung-may-moc-noi-cui', 'Đồ dùng - Máy móc - Nôi cũi', 1, '/assets/uploads/images/icon/icon4.PNG', NULL, NULL),
(400, 'side-noi-dung-1', '/cua-hang/sua-thuc-pham-an-dam', 'Sữa - Thực phẩm ăn dặm', 1, '/assets/uploads/images/icon/icon2.png', NULL, NULL),
(410, 'side-noi-dung-2', '/cua-hang/quan-ao-giay-dep-phu-kien', 'Quần áo - Giày dép - Phụ kiện', 1, '/assets/uploads/images/icon/icon5.PNG', NULL, NULL),
(411, 'side-noi-dung-2', '/cua-hang/the-gioi-do-choi-cho-be', 'Thế giới đồ chơi cho bé', 1, '/assets/uploads/images/icon/icon6.PNG', NULL, NULL),
(409, 'side-noi-dung-2', '/cua-hang/do-dung-may-moc-noi-cui', 'Đồ dùng - Máy móc - Nôi cũi', 1, '/assets/uploads/images/icon/icon4.PNG', NULL, NULL),
(407, 'side-noi-dung-2', '/cua-hang/sua-thuc-pham-an-dam', 'Sữa - Thực phẩm ăn dặm', 1, '/assets/uploads/images/icon/icon2.png', NULL, NULL),
(408, 'side-noi-dung-2', '/cua-hang/bim-ta-khan-giay-uot', 'Bỉm tã - khăn giấy ướt', 1, '/assets/uploads/images/icon/icon3.png', NULL, NULL),
(89, 'side-3', 'do-so-sinh-binh-sua', 'Đồ sơ sinh - Bình sữa', 1, '/assets/uploads/images/icon/icon1.png', NULL, NULL),
(90, 'side-3', 'sua-thuc-pham-an-dam', 'Sữa - Thực phẩm ăn dặm', 1, '/assets/uploads/images/icon/icon2.png', NULL, NULL),
(91, 'side-3', 'bim-ta-khan-giay-uot', 'Bỉm tã - khăn giấy ướt', 1, '/assets/uploads/images/icon/icon3.png', NULL, NULL),
(92, 'side-3', 'do-dung-may-moc-noi-cui', 'Đồ dùng - Máy móc - Nôi cũi', 1, '/assets/uploads/images/icon/icon4.PNG', NULL, NULL),
(93, 'side-3', 'quan-ao-giay-dep-phu-kien', 'Quần áo - Giày dép - Phụ kiện', 1, '/assets/uploads/images/icon/icon5.PNG', NULL, NULL),
(94, 'side-3', 'the-gioi-do-choi-cho-be', 'Thế giới đồ chơi cho bé', 1, '/assets/uploads/images/icon/icon6.PNG', NULL, NULL),
(412, 'side-noi-dung-2', '/cua-hang/the-gioi-do-choi-cho-be', 'Thế giới đồ chơi cho bé', 1, '/assets/uploads/images/icon/icon6.PNG', NULL, NULL),
(383, 'side-home-3', '/danh-muc/nuoi-con-hieu-qua', 'Nuôi con hiệu quả', 1, NULL, NULL, NULL),
(384, 'side-home-3', '/danh-muc/me-va-be', 'Mẹ và bé', 1, NULL, NULL, NULL),
(382, 'side-home-3', '/danh-muc/hoi-dap-cho-gia-dinh', 'Hỏi đáp cho gia dình', 1, NULL, NULL, NULL),
(381, 'side-home-3', '/danh-muc/tre-va-hoc-duong', 'Trẻ và học đường', 1, NULL, NULL, NULL),
(380, 'side-home-3', '/danh-muc/gia-dinh-van-hoa', 'Gia đình văn hóa', 1, NULL, NULL, NULL),
(379, 'side-home-3', '/danh-muc/huong-dan-nuoi-con', 'Hướng dẫn nuôi con', 1, NULL, NULL, NULL),
(265, 'footer-3', 'nhung-cau-hoi-thuong-gap', 'Những câu hỏi thường gặp', 1, NULL, NULL, NULL),
(264, 'footer-3', 'phuong-thuc-van-chuyen', 'Phương thức vận chuyển', 1, NULL, NULL, NULL),
(263, 'footer-3', 'phuong-thuc-thanh-toan', 'Phương thức thanh toán', 1, NULL, NULL, NULL),
(262, 'footer-3', 'chinh-sach-bao-hanh', 'Chính sách bảo hành', 1, NULL, NULL, NULL),
(261, 'footer-3', 'khach-hang-than-thiet', 'Khách hàng thân thiết', 1, NULL, NULL, NULL),
(273, 'footer-2', 'chinh-sach-bao-mat', 'Chính sách bảo mật', 1, NULL, NULL, NULL),
(272, 'footer-2', 'nhung-cau-hoi-thuong-gap', 'Những câu hỏi thường gặp', 1, NULL, NULL, NULL),
(271, 'footer-2', 'phuong-thuc-van-chuyen', 'Phương thức vận chuyển', 1, NULL, NULL, NULL),
(270, 'footer-2', 'phuong-thuc-thanh-toan', 'Phương thức thanh toán', 1, NULL, NULL, NULL),
(269, 'footer-2', 'huong-dan-mua-hang', 'Hướng dẫn mua hàng', 1, NULL, NULL, NULL),
(268, 'footer-2', 'cam-ket-ban-hang', 'Cam kết bán hàng', 1, NULL, NULL, NULL),
(277, 'footer-1', 'trung-tam-ban-buon', 'Trung tâm bán buôn', 1, NULL, NULL, NULL),
(276, 'footer-1', 'tin-khuyen-mai', 'Tin khuyến mãi', 1, NULL, NULL, NULL),
(275, 'footer-1', 'gioi-thieu', 'Giới thiệu', 1, NULL, NULL, NULL),
(119, 'menu-san-pham-trong-trang-san-pham', '/cua-hang/do-so-sinh-binh-sua', 'Đồ sơ sinh - Bình sữa', 1, '/assets/uploads/images/icon/icon1.png', NULL, NULL),
(120, 'menu-san-pham-trong-trang-san-pham', '/cua-hang/sua-thuc-pham-an-dam', 'Sữa - Thực phẩm ăn dặm', 1, '/assets/uploads/images/icon/icon2.png', NULL, NULL),
(121, 'menu-san-pham-trong-trang-san-pham', '/cua-hang/bim-ta-khan-giay-uot', 'Bỉm tã - khăn giấy ướt', 1, '/assets/uploads/images/icon/icon3.png', NULL, NULL),
(122, 'menu-san-pham-trong-trang-san-pham', '/cua-hang/do-dung-may-moc-noi-cui', 'Đồ dùng - Máy móc - Nôi cũi', 1, '/assets/uploads/images/icon/icon4.PNG', NULL, NULL),
(123, 'menu-san-pham-trong-trang-san-pham', '/cua-hang/quan-ao-giay-dep-phu-kien', 'Quần áo - Giày dép - Phụ kiện', 1, '/assets/uploads/images/icon/icon5.PNG', NULL, NULL),
(124, 'menu-san-pham-trong-trang-san-pham', '/cua-hang/the-gioi-do-choi-cho-be', 'Thế giới đồ chơi cho bé', 1, '/assets/uploads/images/icon/icon6.PNG', NULL, NULL),
(125, 'menu-san-pham-trong-trang-san-pham', '/cua-hang/gian-hang-danh-cho-me', 'Gian hàng dành cho mẹ', 1, '/assets/uploads/images/icon/icon7.PNG', NULL, NULL),
(126, 'menu-san-pham-trong-trang-san-pham', '/cua-hang/do-gia-dung-dien-gia-dung', 'Đồ gia dụng - Điện gia dụng', 1, '/assets/uploads/images/icon/icon8.png', NULL, NULL),
(127, 'menu-san-pham-trong-trang-san-pham', '/cua-hang/hot-deal', 'Hot Deal', 1, '/assets/uploads/images/icon/icon9.PNG', NULL, NULL),
(254, 'menu-trong-trang-san-pham', '/cua-hang/do-gia-dung-dien-gia-dung', 'Đồ gia dụng - Điện gia dụng', 1, '/assets/uploads/images/icon/icon8.png', NULL, NULL),
(252, 'menu-trong-trang-san-pham', '/cua-hang/the-gioi-do-choi-cho-be', 'Thế giới đồ chơi cho bé', 1, '/assets/uploads/images/icon/icon6.PNG', NULL, NULL),
(253, 'menu-trong-trang-san-pham', '/cua-hang/gian-hang-danh-cho-me', 'Gian hàng dành cho mẹ', 1, '/assets/uploads/images/icon/icon7.PNG', NULL, NULL),
(251, 'menu-trong-trang-san-pham', '/cua-hang/quan-ao-giay-dep-phu-kien', 'Quần áo - Giày dép - Phụ kiện', 1, '/assets/uploads/images/icon/icon5.PNG', NULL, NULL),
(250, 'menu-trong-trang-san-pham', '/cua-hang/do-dung-may-moc-noi-cui', 'Đồ dùng - Máy móc - Nôi cũi', 1, '/assets/uploads/images/icon/icon4.PNG', NULL, NULL),
(247, 'menu-trong-trang-san-pham', '/cua-hang/do-so-sinh-binh-sua', 'Đồ sơ sinh - Bình sữa', 1, '/assets/uploads/images/icon/icon1.png', NULL, NULL),
(248, 'menu-trong-trang-san-pham', '/cua-hang/sua-thuc-pham-an-dam', 'Sữa - Thực phẩm ăn dặm', 1, '/assets/uploads/images/icon/icon2.png', NULL, NULL),
(249, 'menu-trong-trang-san-pham', '/cua-hang/bim-ta-khan-giay-uot', 'Bỉm tã - khăn giấy ướt', 1, '/assets/uploads/images/icon/icon3.png', NULL, NULL),
(246, 'anh-menu', '/cua-hang/do-dung-cho-me', 'Đồ dùng cho mẹ', 1, '/assets/uploads/images/danh%20muc/do-dung-cho-me.png', NULL, NULL),
(245, 'anh-menu', '/cua-hang/bim-va-sua', 'Bỉm và sữa', 1, '/assets/uploads/images/danh%20muc/bim-sua.PNG', NULL, NULL),
(244, 'anh-menu', '/cua-hang/thoi-trang-be-gai', 'Thời trang bé gái', 1, '/assets/uploads/images/danh%20muc/thoi-trang-be-gai.png', NULL, NULL),
(243, 'anh-menu', '/cua-hang/thoi-trang-be-trai', 'Thời trang bé trai', 1, '/assets/uploads/images/danh%20muc/thoi-trang-be-trai.png', NULL, NULL),
(478, 'menu-chinh', '/danh-muc/tin-tuc', 'Tin tức', 1, NULL, NULL, NULL),
(476, 'menu-chinh', 'do-gia-dung-dien-gia-dung', 'Đồ gia dụng - Điện gia dụng', 2, '/assets/uploads/images/icon/icon8.png', NULL, NULL),
(401, 'side-noi-dung-1', '/cua-hang/bim-ta-khan-giay-uot', 'Bỉm tã - khăn giấy ướt', 1, '/assets/uploads/images/icon/icon3.png', NULL, NULL),
(266, 'footer-3', 'chinh-sach-bao-hanh', 'Chính sách bảo hành', 1, NULL, NULL, NULL),
(267, 'footer-3', 'dieu-khoan-su-dung', 'Điều khoản sử dụng', 1, NULL, NULL, NULL),
(274, 'footer-2', 'dieu-khoan-su-dung', 'Điều khoản sử dụng', 1, NULL, NULL, NULL),
(278, 'footer-1', 'blog', 'Blog', 1, NULL, NULL, NULL),
(282, 'menu-cuoi-trang', 'blog', 'Blog', 1, NULL, NULL, NULL),
(479, 'menu-chinh', '/danh-muc/blog', 'Blog', 1, NULL, NULL, NULL),
(469, 'menu-chinh', '/cua-hang/do-dung-may-moc-noi-cui', 'Đồ dùng - Máy móc - Nôi cũi', 3, '/assets/uploads/images/icon/icon4.PNG', NULL, NULL),
(470, 'menu-chinh', '/cua-hang/gian-hang-danh-cho-me', 'Gian hàng dành cho mẹ', 3, '/assets/uploads/images/icon/icon7.PNG', NULL, NULL),
(466, 'menu-chinh', 'sua-thuc-pham-an-dam', 'Sữa - Thực phẩm ăn dặm', 2, '/assets/uploads/images/icon/icon2.png', NULL, NULL),
(467, 'menu-chinh', 'trung-tam-ban-buon', 'Trung tâm bán buôn', 3, NULL, NULL, NULL),
(464, 'menu-chinh', '/cua-hang/san-pham', 'Danh mục sản phẩm', 1, '/assets/uploads/images/icon/iconMenu.png', NULL, NULL),
(406, 'side-noi-dung-2', '/cua-hang/do-so-sinh-binh-sua', 'Đồ sơ sinh - Bình sữa', 1, '/assets/uploads/images/icon/icon1.png', NULL, NULL),
(399, 'side-noi-dung-1', '/cua-hang/do-so-sinh-binh-sua', 'Đồ sơ sinh - Bình sữa', 1, '/assets/uploads/images/icon/icon1.png', NULL, NULL),
(465, 'menu-chinh', 'do-so-sinh-binh-sua', 'Đồ sơ sinh - Bình sữa', 2, '/assets/uploads/images/icon/icon1.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `notify_id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `URL` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL,
  `code_sale_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` int(11) DEFAULT NULL,
  `cost_ship` int(11) DEFAULT NULL,
  `cost_point` int(11) DEFAULT NULL,
  `cost_sale` int(11) DEFAULT NULL,
  `shipping_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0' COMMENT '0. khởi tao đơn hàng\n1. đặt hàng thành công\n2. đã nhận đơn hàng\n3. đang vận chuyển\n4. đã giao hàng ',
  `ip_customer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note_admin` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_mail_customer` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `method_payment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `code_sale_id`, `user_id`, `total_price`, `cost_ship`, `cost_point`, `cost_sale`, `shipping_address`, `shipping_city`, `shipping_name`, `shipping_email`, `shipping_phone`, `status`, `ip_customer`, `note_admin`, `is_mail_customer`, `created_at`, `updated_at`, `method_payment`) VALUES
(1, NULL, 1, 1165000, NULL, NULL, NULL, 'cổ đông, sơn tây, hà nội', NULL, 'Trần Hải Nam', 'vn3ctran@gmail.com', '0974561735', 4, NULL, '', NULL, NULL, '2017-11-07 15:39:39', NULL),
(2, NULL, 1, 365000, NULL, NULL, NULL, 'cổ đông, sơn tây, hà nội', NULL, 'Trần Hải Nam', 'vn3ctran@gmail.com', '0974561735', 1, NULL, '', NULL, NULL, '2017-11-05 14:15:18', 'Thanh toán qua tài khoản ngân hàng'),
(3, NULL, 1, 715000, 15000, 0, 0, 'cổ đông, sơn tây, hà nội', NULL, 'Trần Hải Nam', 'vn3ctran@gmail.com', '0974561735', 1, NULL, '', NULL, '2017-11-06 02:36:55', '2017-11-06 02:36:55', 'Thanh toán qua tài khoản ngân hàng'),
(4, NULL, 1, 365000, 15000, 0, 0, 'cổ đông, sơn tây, hà nội', NULL, 'Trần Hải Nam', 'vn3ctran@gmail.com', '0974561735', 1, NULL, '', NULL, '2017-11-06 02:38:00', '2017-11-06 02:38:00', 'Thanh toán qua tài khoản ngân hàng'),
(5, NULL, 1, 365000, 15000, 0, 0, 'cổ đông, sơn tây, hà nội', NULL, 'Trần Hải Nam', 'vn3ctran@gmail.com', '0974561735', 1, NULL, '', NULL, '2017-11-06 02:38:58', '2017-11-06 02:38:58', 'Thanh toán qua tài khoản ngân hàng'),
(6, NULL, 1, 365000, 15000, 0, 0, 'cổ đông, sơn tây, hà nội', NULL, 'Trần Hải Nam', 'vn3ctran@gmail.com', '0974561735', 1, NULL, '', NULL, '2017-11-06 02:41:18', '2017-11-06 02:41:18', 'Thanh toán qua tài khoản ngân hàng'),
(7, NULL, 1, 365000, 15000, 0, 0, 'cổ đông, sơn tây, hà nội', NULL, 'Trần Hải Nam', 'vn3ctran@gmail.com', '0974561735', 1, NULL, '', NULL, '2017-11-06 02:41:47', '2017-11-06 02:41:47', 'Thanh toán qua tài khoản ngân hàng'),
(8, NULL, 1, 365000, 15000, 0, 0, 'cổ đông, sơn tây, hà nội', NULL, 'Trần Hải Nam', 'vn3ctran@gmail.com', '0974561735', 1, NULL, 'Gửi khách hang thân thiết', 1, '2017-11-06 02:45:09', '2017-12-04 09:32:25', 'Thanh toán qua tài khoản ngân hàng'),
(9, NULL, 1, 765000, 15000, 0, 0, 'hà nội', NULL, 'Trần Quang Hải', 'miaki0512@gmail.com', '0934553435', 1, NULL, 'Ghi chus', NULL, '2017-11-08 10:39:06', '2017-12-03 15:15:13', 'Thanh toán qua tài khoản ngân hàng'),
(10, NULL, 1, 1365000, 15000, 0, 0, 'klklj', NULL, 'jhg', 'ghvjk@gmail.com', '09345535', 1, NULL, '', NULL, '2017-11-10 09:04:53', '2017-11-10 09:04:53', 'Thanh toán qua tài khoản ngân hàng'),
(11, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '', NULL, NULL, NULL, NULL),
(12, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '', NULL, NULL, NULL, NULL),
(13, NULL, 0, 365000, 15000, 0, 0, 'ha noi', NULL, 'hung', 'hungdv2014@gmail.com', '0944506289', 3, '118.70.13.9', 'mã đơn hàng ghn', 1, '2017-11-15 07:27:30', '2017-12-05 15:57:06', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_bank`
--

CREATE TABLE IF NOT EXISTS `order_bank` (
  `order_bank_id` int(11) NOT NULL,
  `name_bank` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number_bank` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manager_account` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_bank`
--

INSERT INTO `order_bank` (`order_bank_id`, `name_bank`, `number_bank`, `manager_account`, `branch`, `created_at`, `updated_at`) VALUES
(1, 'VIETCOMBANK', '1231298487912', 'TRAN QUANG HAI', 'Thanh Xuân', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_code_sale`
--

CREATE TABLE IF NOT EXISTS `order_code_sale` (
  `order_code_sale_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `method_sale` tinyint(4) DEFAULT NULL COMMENT '0: theo tiền, 1 theo %',
  `sale` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `many_use` int(11) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_code_sale`
--

INSERT INTO `order_code_sale` (`order_code_sale_id`, `code`, `method_sale`, `sale`, `many_use`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, '2010', 0, '100000', 100, NULL, NULL, NULL, NULL),
(2, '2017', 1, '10', 25, '1990-06-01 16:05:03', '2001-06-30 23:16:11', NULL, NULL),
(3, '23124', 1, '24', 100, '1982-06-04 21:42:11', '2009-02-13 04:47:01', NULL, NULL),
(4, '213213', 1, '21', 23, '2017-11-04 00:00:00', '2017-11-04 23:59:00', NULL, NULL),
(5, '21321421', 0, '3123', 10, '2017-11-18 05:00:00', '2017-12-23 12:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `item_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `currency` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `product_id`, `order_id`, `description`, `currency`, `quantity`, `created_at`, `updated_at`) VALUES
(48, 8, 1, NULL, NULL, 5, NULL, NULL),
(47, 7, 1, NULL, NULL, 3, NULL, NULL),
(46, 6, 1, NULL, NULL, 3, NULL, NULL),
(57, 8, 2, NULL, NULL, 1, NULL, NULL),
(56, 7, 2, NULL, NULL, 1, NULL, NULL),
(55, 6, 2, NULL, NULL, 1, NULL, NULL),
(66, 8, 3, NULL, NULL, 2, NULL, NULL),
(65, 7, 3, NULL, NULL, 2, NULL, NULL),
(64, 6, 3, NULL, NULL, 2, NULL, NULL),
(72, 6, 4, NULL, NULL, 1, NULL, NULL),
(71, 7, 4, NULL, NULL, 1, NULL, NULL),
(70, 8, 4, NULL, NULL, 1, NULL, NULL),
(78, 6, 5, NULL, NULL, 1, NULL, NULL),
(77, 7, 5, NULL, NULL, 1, NULL, NULL),
(76, 8, 5, NULL, NULL, 1, NULL, NULL),
(84, 6, 6, NULL, NULL, 1, NULL, NULL),
(83, 7, 6, NULL, NULL, 1, NULL, NULL),
(82, 8, 6, NULL, NULL, 1, NULL, NULL),
(85, 8, 7, NULL, NULL, 1, NULL, NULL),
(86, 7, 7, NULL, NULL, 1, NULL, NULL),
(87, 6, 7, NULL, NULL, 1, NULL, NULL),
(93, 6, 8, NULL, NULL, 1, NULL, NULL),
(92, 7, 8, NULL, NULL, 1, NULL, NULL),
(91, 8, 8, NULL, NULL, 1, NULL, NULL),
(105, 10, 9, 'Hiểu được điều đó SeeBaby đã ra đời và luôn đồng hành cùng các bố, các mẹ trong quá trình chăm sóc bé yêu. Các sản phẩm mà SeeBaby cung cấp là các dòng xe đẩy trẻ em.TutiCare cung cấp những dòng sản phẩm Seebaby chất lượng nhất tới khách hàng. Xe đẩy trẻ em siêu nhẹ Seebaby QQ3 mẫu mới nhất của hãng xe đẩy Hồng Kông Seebaby.', NULL, 1, NULL, NULL),
(112, 12, 10, 'Xe đẩy lưới Kinlee là sản phẩm được thiết kế độc quyền tại Pháp, sản phẩm thiết kế tinh tế, nhẹ nên dễ dàng có thể mang đi trong các chuyến đi xa. Nếu nhà bạn có trẻ nhỏ đừng bỏ lỡ sản phẩm này của chúng tôi nhé, hãy theo dõi những thông tin dưới đây nhé.', NULL, 3, NULL, NULL),
(109, 12, 11, 'Xe đẩy lưới Kinlee là sản phẩm được thiết kế độc quyền tại Pháp, sản phẩm thiết kế tinh tế, nhẹ nên dễ dàng có thể mang đi trong các chuyến đi xa. Nếu nhà bạn có trẻ nhỏ đừng bỏ lỡ sản phẩm này của chúng tôi nhé, hãy theo dõi những thông tin dưới đây nhé.', NULL, 1, NULL, NULL),
(113, 14, 12, '− Nôi em bé bọc vải, được thiết kế hoàn hảo cho cả lúc ngủ và lúc chơi, sử dụng thuận tiện trong nhà và đi du lịch.\r\n\r\n− Khung nôi có cấu tạo chắc chắn, an toàn tuyệt đối', NULL, 1, NULL, NULL),
(114, 12, 13, NULL, 'vnd', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_ship`
--

CREATE TABLE IF NOT EXISTS `order_ship` (
  `order_ship_id` int(11) NOT NULL,
  `method_ship` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_ship`
--

INSERT INTO `order_ship` (`order_ship_id`, `method_ship`, `cost`, `created_at`, `updated_at`) VALUES
(1, 'Trong nội thành Hà Nội', '15000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci,
  `template` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_hide` tinyint(4) DEFAULT NULL,
  `image` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_list` longtext COLLATE utf8_unicode_ci,
  `post_type` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visiable` tinyint(4) DEFAULT NULL COMMENT '0: ẩn, 1 hiện',
  `category_string` longtext COLLATE utf8_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8_unicode_ci,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `description`, `content`, `template`, `tags`, `slug`, `user_id`, `is_hide`, `image`, `product_list`, `post_type`, `visiable`, `category_string`, `meta_title`, `meta_description`, `meta_keyword`, `created_at`, `updated_at`) VALUES
(1, 'Giới thiệu nội dung', NULL, NULL, 'default', NULL, 'gioi-thieu-noi-dung', '1', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, '2017-11-12 07:12:12'),
(4, 'Cam kết bán hàng', NULL, NULL, 'default', NULL, 'cam-ket-ban-hang', '1', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Trung tâm bán buôn', NULL, NULL, 'default', NULL, 'trung-tam-ban-buon', '1', NULL, NULL, 'noi-ngu-du-lich-brevi---dolce-nanna-plus-mau-xanh-den-bre811-348', 'post', 0, NULL, NULL, NULL, NULL, NULL, '2017-12-03 14:37:18'),
(5, 'Hướng dẫn mua hàng', NULL, NULL, 'default', NULL, 'huong-dan-mua-hang', '1', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Phương thức thanh toán', NULL, NULL, 'default', NULL, 'phuong-thuc-thanh-toan', '1', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Phương thức vận chuyển', NULL, NULL, 'default', NULL, 'phuong-thuc-van-chuyen', '1', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Những câu hỏi thường gặp', NULL, NULL, 'default', NULL, 'nhung-cau-hoi-thuong-gap', '1', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Chính sách bảo mật', NULL, NULL, 'default', NULL, 'chinh-sach-bao-mat', '1', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Điều khoản sử dụng', NULL, NULL, 'default', NULL, 'dieu-khoan-su-dung', '1', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Khách hàng thân thiết', NULL, NULL, 'default', NULL, 'khach-hang-than-thiet', '1', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Chính sách bảo hành', NULL, NULL, 'default', NULL, 'chinh-sach-bao-hanh', '1', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Chính sách đổi trả hàng', NULL, NULL, 'default', NULL, 'chinh-sach-doi-tra-hang', '1', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Giải quyết khiếu nại', NULL, NULL, 'default', NULL, 'giai-quyet-khieu-nai', '1', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Mua sắm thông minh', NULL, NULL, 'default', NULL, 'mua-sam-thong-minh', '1', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Sử dung voucher', NULL, NULL, 'default', NULL, 'su-dung-voucher', '1', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Các dịch vụ tiện ích', NULL, NULL, 'default', NULL, 'cac-dich-vu-tien-ich', '1', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'Slide2', NULL, NULL, 'default', NULL, 'slide2', '1', NULL, '/kcfinder-master/upload/images/banner_6db291ac.png', NULL, 'slide', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'Slide1', NULL, NULL, 'default', NULL, 'slide1', '1', NULL, '/kcfinder-master/upload/images/banner_4110a199.png', NULL, 'slide', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Startup Việt gặp gỡ các nhà đầu tư lớn', 'Sau phần thi thuyết trình, Startup tham dự lễ vinh danh được gặp gỡ trực tiếp với các quỹ, tập đoàn đầu tư lớn để tìm kiếm cơ hội kinh doanh.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vestibulum pulvinar orci, non aliquet metus mollis aliquam. Nullam sollicitudin at augue at viverra. Aliquam erat volutpat. Vivamus ex velit, mattis eu molestie non, sodales id eros. Proin placerat sed nibh mollis euismod. Nulla vitae efficitur dolor, consequat hendrerit felis. Donec quis elit id felis ullamcorper dictum. Quisque sollicitudin ipsum non enim vehicula, vel mattis nulla facilisis. Morbi in convallis velit, ac lacinia massa. Aliquam sapien orci, tincidunt sed nibh at, molestie blandit orci. Vivamus molestie, lorem eu gravida volutpat, ipsum neque faucibus erat, eget scelerisque sem elit a sem. Aenean finibus pretium tellus, vitae pellentesque orci posuere et. Fusce augue nunc, rhoncus ut tortor in, mollis malesuada magna.</p>\r\n\r\n<p>Donec rhoncus nisi vitae velit tincidunt scelerisque. Praesent nec arcu dui. Mauris condimentum dui a lacinia imperdiet. Pellentesque faucibus, enim id facilisis bibendum, elit mauris tempus tortor, sit amet elementum tortor nunc eu sapien. Maecenas sagittis justo est, non malesuada lorem rutrum quis. Pellentesque lorem urna, vestibulum et ligula suscipit, suscipit hendrerit nunc. Nam vestibulum vestibulum lectus, quis viverra lectus iaculis non. Vestibulum elementum odio et ligula rutrum scelerisque. Ut ut tincidunt sapien. Donec dictum posuere risus, at viverra neque sollicitudin vel. Ut hendrerit varius risus. Suspendisse interdum dolor id tortor condimentum gravida. Etiam sed urna sagittis quam lobortis accumsan. Sed eget vestibulum ex.</p>\r\n\r\n<p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris ipsum velit, efficitur eu luctus ut, tincidunt a ex. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis maximus ultrices tempor. Sed vitae elementum sapien. Nam nec cursus ligula. Vestibulum non ante non tellus scelerisque consectetur eu vitae sem. Aenean ultrices libero nec dolor elementum porttitor. Pellentesque auctor suscipit nisi nec dapibus. Pellentesque dignissim magna eget placerat consectetur. Pellentesque sapien velit, luctus sit amet dui quis, tristique consectetur metus. Aenean leo felis, eleifend a augue sit amet, venenatis tincidunt tellus. Proin volutpat eleifend placerat. Nunc vel pretium elit. Sed rutrum est sit amet sapien feugiat, eu rhoncus augue mattis.</p>', 'default', 'me va be, do so sinh', 'startup-viet-gap-go-cac-nha-dau-tu-lon', '1', NULL, '/assets/uploads/images/news/namtc2-1508817159_500x300.jpg', 'noi-ngu-du-lich-brevi---dolce-nanna-plus-mau-xanh-den-bre811-348,ghe-an-mastela-bpa-free-07330-mau-be-(new),xe-day-du-lich-kinlee-b1-mau-do,xe-day-seebaby-qq3-sieu-nhe-xanh-la', 'post', 0, NULL, NULL, NULL, NULL, NULL, '2017-12-03 15:03:59'),
(23, 'Phó bí thư Đồng Nai: ''Chỉ có 4 cử tri đề nghị bãi nhiệm tôi''', 'Bà Phan Thị Mỹ Thanh xác nhận đã có đơn khiếu nại sau khi Uỷ ban Kiểm tra Trung ương kết luận về các vi phạm, khuyết điểm của bà.', NULL, 'default', NULL, 'pho-bi-thu-dong-nai:-''chi-co-4-cu-tri-de-nghi-bai-nhiem-toi''', '1', NULL, '/assets/uploads/images/news/IMG0203JPG-1508813732-4010-1508815450_140x84.jpg', 'noi-ngu-du-lich-brevi---dolce-nanna-plus-mau-xanh-den-bre811-348,ghe-an-mastela-bpa-free-07330-mau-be-(new)', 'post', 0, NULL, NULL, NULL, NULL, NULL, '2017-12-03 15:04:03'),
(24, 'Cán bộ Cục quản lý Dược bị ''truy'' việc cấp phép cho VN Pharma', 'Tòa yêu cầu các cán bộ Cục quản lý Dược (Bộ Y tế) phải có mặt để làm rõ "tắc trách" trong vụ VN Pharma, như kháng nghị nêu.', NULL, 'default', NULL, 'can-bo-cuc-quan-ly-duoc-bi-''truy''-viec-cap-phep-cho-vn-pharma', '1', NULL, '/assets/uploads/images/news/VNPharma-1-ok-5334-1508810983_140x84.jpg', NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Thêm gần 2.000 nhân viên Vinasun thôi việc', 'Vinasun chưa thoát khỏi đà lao dốc không phanh khi kết quả kinh doanh tăng trưởng âm hai chữ số và gần 2.000 nhân viên thôi việc trong quý III.', NULL, 'default', NULL, 'them-gan-2.000-nhan-vien-vinasun-thoi-viec', '1', NULL, '/assets/uploads/images/news/Vinasun-2000-nv-6069-1508810196_140x84.jpg', NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Bác sĩ nhận lời xin lỗi của Giám đốc Sở sau vụ ''nói xấu'' bộ trưởng', 'Bác sĩ Hoàng Công Truyện vui vẻ chấp nhận lời xin lỗi và mong rằng mọi việc kết thúc tại đây để ổn định công tác.', NULL, 'default', NULL, 'bac-si-nhan-loi-xin-loi-cua-giam-doc-so-sau-vu-''noi-xau''-bo-truong', '0', NULL, '/assets/uploads/images/news/xinloi-1476-1508817417-3700-1508817436_140x84.jpg', NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, '2017-10-24 12:33:05'),
(30, 'Người phụ nữ bị đột quỵ sau một đêm uống say', 'Sau một đêm quá chén, chị Thoa về khách sạn ngủ, đến sáng không tỉnh lại nên được người thân đưa đi cấp cứu.', NULL, 'default', NULL, 'nguoi-phu-nu-bi-dot-quy-sau-mot-dem-uong-say', '1', NULL, '/assets/uploads/images/blog/dotquy-1508815145_500x300.jpg', NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(31, '3 dấu hiệu nhận biết sớm đau đại tràng', 'Nếu bị đau bụng, rối loạn đại tiện thường xuyên, mệt mỏi... bạn cần điều trị ngay để không bị mạn tính và phòng ngừa biến chứng nguy hiểm.', NULL, 'default', NULL, '3-dau-hieu-nhan-biet-som-dau-dại-trang', '0', NULL, '/assets/uploads/images/blog/23-10-20179-914235424-1988-1508730675_140x84.jpeg', NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, '2017-10-24 12:32:01'),
(32, 'Cách đơn giản rửa mũi phòng bệnh hô hấp', 'Rửa mũi sau khi ở ngoài về giúp phòng viêm đường hô hấp (sổ mũi, viêm xoang), nếu rửa lúc cảm cúm sẽ khiến bệnh nhanh khỏi.', NULL, 'default', NULL, 'cach-don-gian-rua-mui-phong-benh-ho-hap', '1', NULL, '/assets/uploads/images/blog/SKSettop-1508814237_140x84.jpg', NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Vợ nhanh trí phát hiện chồng bị đột quỵ', 'Thấy chồng đột nhiên bị yếu chân, lơ ngơ, không nói được, chị Loan nghĩ ngay do đột quỵ nên nhanh chóng đưa anh vào bệnh viện.', NULL, 'default', NULL, 'vo-nhanh-tri-phat-hien-chong-bi-dot-quy', '1', NULL, '/assets/uploads/images/blog/dot-quy-2-2154-1508731337_140x84.jpg', NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Tiêu chí đánh giá bản lĩnh quý ông chốn phòng the', 'Cảm xúc và thời gian thăng hoa là 2 tiêu chí phụ nữ đánh giá bản lĩnh phái mạnh trong mỗi cuộc ái ân.', NULL, 'default', NULL, 'tieu-chi-danh-gia-ban-linh-quy-ong-chon-phong-the', '1', NULL, '/assets/uploads/images/blog/couple-8522-1508497004_140x84.jpg', NULL, 'post', 0, NULL, 'Tiêu chí đánh giá bản lĩnh quý ông chốn phòng the', 'Cảm xúc và thời gian thăng hoa là 2 tiêu chí phụ nữ đánh giá bản lĩnh phái mạnh trong mỗi cuộc ái ân.', 'tieu-chi-danh-gia-ban-linh-quy-ong-chon-phong-the', NULL, '2017-11-06 09:17:46'),
(35, 'Sữa Anh, Pháp, Mỹ, Đức, Úc, Nga', NULL, NULL, 'default', NULL, 'sua-anh,-phap,-my,-duc,-uc,-nga', '1', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Sữa Nhật nhập khẩu, nội địa', NULL, NULL, 'default', NULL, 'sua-nhat-nhap-khau,-noi-dia', '0', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, '2017-10-24 12:57:21'),
(37, 'Sữa non cho bé', NULL, NULL, 'default', NULL, 'sua-non-cho-be', '1', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Bột ăn dặm - Cháo ăn dặm', NULL, NULL, 'default', NULL, 'bot-an-dam---chao-an-dam', '1', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Bánh ăn dặm - Bánh tập nhai', NULL, NULL, 'default', NULL, 'banh-an-dam---banh-tap-nhai', '1', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Thực phẩm ăn dặm khác', NULL, NULL, 'default', NULL, 'thuc-pham-an-dam-khac', '1', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Sữa chua - Phô mai - Váng sữa', NULL, NULL, 'default', NULL, 'sua-chua---pho-mai---vang-sua', '0', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, '2017-10-24 12:58:10'),
(42, 'Sữa phân phối Việt nam', NULL, NULL, 'default', NULL, 'sua-phan-phoi-viet-nam', '0', NULL, NULL, NULL, 'post', 0, NULL, NULL, NULL, NULL, NULL, '2017-10-24 12:58:22'),
(47, 'Dưới 200.000', NULL, NULL, 'default', NULL, 'duoi-200.000', '1', NULL, NULL, NULL, 'khoang-gia', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(48, '200 .000 -> 500.000', NULL, NULL, 'default', NULL, '200-.000-->-500.000', '1', NULL, NULL, NULL, 'khoang-gia', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(49, '500.000 -> 1.000.000', NULL, NULL, 'default', NULL, '500.000-->-1.000.000', '1', NULL, NULL, NULL, 'khoang-gia', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'Trên 1.000.000', NULL, NULL, 'default', NULL, 'tren-1.000.000', '1', NULL, NULL, NULL, 'khoang-gia', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'ADIDAS', NULL, NULL, 'default', NULL, 'adidas', '1', NULL, NULL, NULL, 'thuong-hieu', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'KID', NULL, NULL, 'default', NULL, 'kid', '1', NULL, NULL, NULL, 'thuong-hieu', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'LINE', NULL, NULL, 'default', NULL, 'line', '1', NULL, NULL, NULL, 'thuong-hieu', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'NIKE', NULL, NULL, 'default', NULL, 'nike', '1', NULL, NULL, NULL, 'thuong-hieu', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'Việt Nam xuất khẩu', NULL, NULL, 'default', NULL, 'viet-nam-xuat-khau', '1', NULL, NULL, NULL, 'thuong-hieu', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'Hàn Quốc', NULL, NULL, 'default', NULL, 'han-quoc', '1', NULL, NULL, NULL, 'xuat-xu', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'Trung Quốc', NULL, NULL, 'default', NULL, 'trung-quoc', '1', NULL, NULL, NULL, 'xuat-xu', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'Việt Nam', NULL, NULL, 'default', NULL, 'viet-nam', '1', NULL, NULL, NULL, 'xuat-xu', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'Nhật Bản', NULL, NULL, 'default', NULL, 'nhat-ban', '1', NULL, NULL, NULL, 'xuat-xu', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'Đài loan', NULL, NULL, 'default', NULL, 'dai-loan', '1', NULL, NULL, NULL, 'xuat-xu', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'Xe đẩy Seebaby QQ3 siêu nhẹ xanh lám', 'Hiểu được điều đó SeeBaby đã ra đời và luôn đồng hành cùng các bố, các mẹ trong quá trình chăm sóc bé yêu. Các sản phẩm mà SeeBaby cung cấp là các dòng xe đẩy trẻ em.TutiCare cung cấp những dòng sản phẩm Seebaby chất lượng nhất tới khách hàng. Xe đẩy trẻ em siêu nhẹ Seebaby QQ3 mẫu mới nhất của hãng xe đẩy Hồng Kông Seebaby.', '<p>Để chăm s&oacute;c cho b&eacute; y&ecirc;u của bạn ngay từ khi mới ch&agrave;o đời l&agrave; điều rất quan trọng. Chăm s&oacute;c cho b&eacute; từ giấc ngủ &ecirc;m &aacute;i, nhẹ nh&agrave;ng, luyện cho b&eacute; c&aacute;c tư thế ngồi theo th&aacute;ng tuổi, đến việc đưa b&eacute; đi dạo chơi c&ocirc;ng vi&ecirc;n. Gi&uacute;p cho b&eacute; thoải m&aacute;i trong mọi tư thế theo thời gian th&aacute;ng tuổi, tiết kiệm thời gian v&agrave; giảm chi ph&iacute; cho bố mẹ...lu&ocirc;n được c&aacute;c bậc phụ huynh quan t&acirc;m.</p>\r\n\r\n<p><span style="font-size:10pt">Hiểu được điều đ&oacute;&nbsp;SeeBaby&nbsp;đ&atilde; ra đời v&agrave; lu&ocirc;n đồng h&agrave;nh c&ugrave;ng c&aacute;c bố, c&aacute;c mẹ trong qu&aacute; tr&igrave;nh chăm s&oacute;c b&eacute; y&ecirc;u. C&aacute;c sản phẩm m&agrave; SeeBaby cung cấp l&agrave; c&aacute;c d&ograve;ng&nbsp;xe đẩy trẻ em.TutiCare cung cấp những d&ograve;ng sản phẩm Seebaby chất lượng nhất tới kh&aacute;ch h&agrave;ng.&nbsp;Xe đẩy trẻ em&nbsp;si&ecirc;u nhẹ Seebaby QQ3 mẫu mới nhất của h&atilde;ng xe đẩy Hồng K&ocirc;ng Seebaby. Xe đẩy Seebaby l&agrave; sản phẩm tuyệt vời, mang đến niềm vui cho cả gia đ&igrave;nh.</span></p>\r\n\r\n<p><span style="font-size:10pt"><strong>Đặc điểm của Xe đẩy cho b&eacute;&nbsp;Seebaby QQ3 si&ecirc;u nhẹ&nbsp;</strong></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:10pt">Xe được cải tiến kh&aacute; nhiều so với Model trước l&agrave; Seebaby QQ2.</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style="font-size:10pt">Xe đẩy c&oacute; lớp lưới th&ocirc;ng tho&aacute;ng, c&oacute; đai thắt an to&agrave;n gi&uacute;p b&eacute; ngồi trong xe lu&ocirc;n được thoải m&aacute;i, bố mẹ lu&ocirc;n y&ecirc;n t&acirc;m về sự an to&agrave;n của b&eacute;</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style="font-size:10pt">Tựa lưng điều chỉnh được nhiều g&oacute;c độ ph&ugrave; hợp cho b&eacute; từ 0 - 36 th&aacute;ng tuổi.</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style="font-size:10pt">M&aacute;i che chụp s&acirc;u hơn v&agrave; chất liệu tốt</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style="font-size:10pt">Giỏ đựng đồ tiện lợi</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style="font-size:10pt">Tấm đỡ ch&acirc;n điều chỉnh được l&agrave;m tăng chiều d&agrave;i xe khi nằm v&agrave; đỡ ch&acirc;n b&eacute; kh&ocirc;ng bị mỏi.</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style="font-size:10pt">B&aacute;nh xe an to&agrave;n, linh hoạt</span></li>\r\n</ul>\r\n\r\n<p><span style="font-size:10pt"><strong>Một số lưu &yacute; khi sử dụng xe đẩy.</strong></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:10pt">Kh&ocirc;ng bao giờ để b&eacute; ngồi tr&ecirc;n xe khi kh&ocirc;ng c&oacute; sự gi&aacute;m s&aacute;t của người lớn.</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style="font-size:10pt">Khi em b&eacute; ngồi tr&ecirc;n xe phải sử dụng d&acirc;y đai an to&agrave;n đ&uacute;ng c&aacute;ch.</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style="font-size:10pt">Kh&ocirc;ng cho ph&eacute;p con của bạn đứng tr&ecirc;n xe đẩy.</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style="font-size:10pt">Kh&ocirc;ng sử dụng xe đẩy trẻ em tại khu vực nguy hiểm như tr&ecirc;n những con đường gập gềnh v&agrave; xung quanh bếp.</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style="font-size:10pt">Kh&ocirc;ng sử dụng hoặc để xe ở m&ocirc;i trường lạnh, ẩm ướt cao v&agrave; tr&aacute;nh xa lửa hoặc nguồn nhiệt mạnh.</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style="font-size:10pt">Kh&ocirc;ng đặt mọi thứ tr&ecirc;n tay cầm l&agrave; bởi v&igrave; c&oacute; thể ảnh hưởng đến sự ổn định của xe đẩy.</span></li>\r\n</ul>\r\n\r\n<p><span style="font-size:10pt"><strong>Th&ocirc;ng số kỹ thuật:</strong></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:10pt">C&acirc;n nặng của giỏ l&agrave; kh&ocirc;ng qu&aacute; 2kg.</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style="font-size:10pt">Trọng lượng xe: 4,7 kg</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style="font-size:10pt">K&iacute;ch thước khi mở ( D x R x C ): 78 x 45 x 94 cm</span></li>\r\n</ul>\r\n\r\n<p><span style="font-size:10pt"><img alt="" src="http://www.tuticare.com/media/lib/12634_xedayqq3seebabyxanhlatuticare1.jpg" style="border:none; display:block; margin-left:auto; margin-right:auto; max-width:100%; vertical-align:middle" /></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="" src="http://www.tuticare.com/media/product/12634_xe_day_qq3_seebaby_xanh_duong_tuticare_1.jpg" style="border:none; display:block; height:453px; margin-left:auto; margin-right:auto; max-width:100%; vertical-align:middle; width:453px" /></p>\r\n\r\n<p><img alt="" src="http://www.tuticare.com/media/product/12634_xe_day_qq3_seebaby_tim_tuticare_1.jpg" style="border:none; display:block; height:452px; margin-left:auto; margin-right:auto; max-width:100%; vertical-align:middle; width:452px" /></p>\r\n\r\n<p><img alt="" src="http://www.tuticare.com/media/lib/12634_xe-day-seebaby-qq3-mau-moi-7.jpg" style="border:none; display:block; height:402px; margin-left:auto; margin-right:auto; max-width:100%; vertical-align:middle; width:402px" /></p>\r\n\r\n<p><span style="font-size:10pt"><strong>Th&ocirc;ng tin Thương hiệu:</strong></span></p>\r\n\r\n<p><span style="font-size:10pt"><strong>SeeBaby</strong>&nbsp;l&agrave; thương hiệu xe đẩy hằng đầu tại Hồng K&ocirc;ng được c&aacute;c Mẹ Vi&ecirc;t Nam tin d&ugrave;ng. C&aacute;c sản phẩm m&agrave; SeeBaby cung cấp lu&ocirc;n tạo sự thoải m&aacute;i trong mọi tư thế, tiết kiệm thời gian v&agrave; giảm chi ph&iacute; cho bố mẹ...D&ograve;ng xe đẩy SeeBaby đa dạng c&oacute; thể d&ugrave;ng cho b&eacute; cả 4 m&ugrave;a đặc biệt trong m&ugrave;a đ&ocirc;ng, m&ugrave;a h&egrave;. Xe đẩy với 3 tư thế cho b&eacute;: Tư thế nằm, nằm ngửa, tư thế ngồi c&oacute; thể gi&uacute;p b&eacute; thay đổi tư thế th&iacute;ch ứng cho b&eacute; trong mỗi giai đoạn ph&aacute;t triển.</span><br />\r\n<span style="font-size:10pt">Để chăm s&oacute;c cho b&eacute; y&ecirc;u của bạn ngay từ khi mới ch&agrave;o đời cho đến khi b&eacute; được 2 , 3 tuổi&nbsp; l&agrave; điều rất quan trọng. Chăm s&oacute;c cho b&eacute; từ giấc ngủ &ecirc;m &aacute;i, nhẹ nh&agrave;ng, luyện cho b&eacute; c&aacute;c tư thế ngồi theo th&aacute;ng tuổi, đến việc đưa b&eacute; đi dạo chơi c&ocirc;ng vi&ecirc;n. Gi&uacute;p cho b&eacute; thoải m&aacute;i trong mọi tư thế theo thời gian th&aacute;ng tuổi, tiết kiệm thời gian v&agrave; giảm chi ph&iacute; cho bố mẹ...lu&ocirc;n được c&aacute;c bậc phụ huynh quan t&acirc;m.</span><br />\r\n<span style="font-size:10pt">Hiểu được điều đ&oacute; SeeBaby đ&atilde; ra đời v&agrave; lu&ocirc;n đồng h&agrave;nh c&ugrave;ng c&aacute;c bố, c&aacute;c mẹ trong qu&aacute; tr&igrave;nh chăm s&oacute;c b&eacute; y&ecirc;u. C&aacute;c sản phẩm m&agrave; SeeBaby cung cấp l&agrave; c&aacute;c d&ograve;ng xe đẩy trẻ em</span>.</p>\r\n\r\n<p>&nbsp;</p>', 'default', NULL, 'xe-day-seebaby-qq3-sieu-nhe-xanh-la', '0', NULL, '/kcfinder-master/upload/images/12634_xe_day_qq3_seebaby_xanh_la_tuticare_1.jpg', NULL, 'product', 0, 'Đồ gia dụng - Điện gia dụng,Hot Deal,Sản phẩm nổi bật,Sản phẩm,Thời trang bé trai,Danh mục cấp 2 -3,Danh mục cấp 2-4', NULL, '123', '42', NULL, '2017-12-04 07:08:07'),
(65, 'Bố mẹ ơi! con được sinh ra từ đâu', NULL, NULL, 'default', NULL, 'bo-me-oi!-con-duoc-sinh-ra-tu-dau', '1', NULL, NULL, NULL, 'cau-hoi-thuong-gap', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'Mail đặt câu hỏi', NULL, '<p>From: [your-name] &nbsp;([your-email])<br />\r\nSubject: [your-subject]</p>\r\n\r\n<p>Họ t&ecirc;n: [your-name]<br />\r\nEmail: [your-email]<br />\r\nĐiện thoại: [your-tel]<br />\r\nTi&ecirc;u đề: [your-subject]<br />\r\nNội dung: [your-message]<br />\r\nMessage Body:<br />\r\n[your-message]</p>', 'default', NULL, 'mail-dat-cau-hoi', '1', NULL, NULL, NULL, 'cau-hinh-email', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'mail thay đổi tài khoản', NULL, '<p>Hi&nbsp;&nbsp;[your-name],</p>\r\n\r\n<p>Bạn vừa thay đổi th&ocirc;ng tin t&agrave;i khoản tại kidandmom</p>\r\n\r\n<p>Họ t&ecirc;n: [your-name]</p>\r\n\r\n<p>Email: [your-email]</p>\r\n\r\n<p>Điện thoại: [your-phone]</p>\r\n\r\n<p>Giới t&iacute;nh: &nbsp;[your-age]</p>\r\n\r\n<p>Địa chỉ: [your-address]</p>\r\n\r\n<p>&nbsp;</p>', 'default', NULL, 'mail-thay-doi-tai-khoan', '0', NULL, NULL, NULL, 'cau-hinh-email', 0, NULL, NULL, NULL, NULL, NULL, '2017-10-30 08:44:08'),
(68, 'mail cho người đặt hàng', NULL, '<p>Xin ch&agrave;o&nbsp;[user-name],</p>\r\n\r\n<p>Cảm ơn bạn đ&atilde; đặt h&agrave;ng tại website của ch&uacute;ng t&ocirc;i. M&atilde; đơn h&agrave;ng của bạn l&agrave; [code-order].</p>\r\n\r\n<p>Th&ocirc;ng tin đơn h&agrave;ng của bạn gồm c&oacute;:&nbsp;</p>\r\n\r\n<p>[bang-thong-tin-don-hang]</p>\r\n\r\n<p>Địa chỉ nhận h&agrave;ng của bạn:</p>\r\n\r\n<p>T&ecirc;n người nh&acirc;n: [shipping-name].</p>\r\n\r\n<p>Địa chỉ: [shipping-address].</p>\r\n\r\n<p>Số điện thoại: [shipping-phone].</p>\r\n\r\n<p>Email: [shipping-email].</p>\r\n\r\n<p>[trang-thai-don-hang]</p>\r\n\r\n<p>[ghi-chu]</p>\r\n\r\n<p>Cảm ơn bạn.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 'default', NULL, 'mail-cho-nguoi-dat-hang', '0', NULL, NULL, NULL, 'cau-hinh-email', 0, NULL, NULL, NULL, NULL, NULL, '2017-12-04 09:29:53'),
(69, 'mail đặt hàng cho người quản trị', NULL, '<p>Đơn h&agrave;ng vừa được đặt th&agrave;nh c&ocirc;ng l&uacute;c [order-time].</p>\r\n\r\n<p>&nbsp;M&atilde; đơn h&agrave;ng của bạn l&agrave; [code-order].</p>\r\n\r\n<p>Th&ocirc;ng tin đơn h&agrave;ng của bạn gồm c&oacute;:&nbsp;</p>\r\n\r\n<p>[bang-thong-tin-don-hang]</p>\r\n\r\n<p>Địa chỉ nhận h&agrave;ng của bạn:</p>\r\n\r\n<p>T&ecirc;n người nh&acirc;n: [shipping-name].</p>\r\n\r\n<p>Địa chỉ: [shipping-address].</p>\r\n\r\n<p>Số điện thoại: [shipping-phone].</p>\r\n\r\n<p>Email: [shipping-email].</p>\r\n\r\n<p>Vui l&ograve;ng h&atilde;y x&aacute;c nhận đơn h&agrave;ng cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>&nbsp;</p>', 'default', NULL, 'mail-dat-hang-cho-nguoi-quan-tri', '0', NULL, NULL, NULL, 'cau-hinh-email', 0, NULL, NULL, NULL, NULL, NULL, '2017-11-06 02:14:15'),
(72, 'Ghế chơi cho bé Lucky Baby 2 trong 1', '− Ghế  Lucky Baby có thiết kế hiện đại, độc đáo.\r\n\r\n− Nệm ghế rất êm và mềm mại, dễ dàng vệ sinh, lau rửa.', '<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<p>&minus;&nbsp;<strong><a href="http://www.tuticare.com/ghe-an-cho-be-ghe-an-tre-em-ghe-an-bot-ghe-tap-an-91.html" style="text-decoration-line: none; color: rgb(119, 119, 119); cursor: pointer; transition: color 0.2s; max-width: 100%;" target="_blank">Ghế&nbsp;</a>&nbsp;</strong>Lucky Baby c&oacute; thiết kế hiện đại, độc đ&aacute;o.</p>\r\n\r\n<p>&minus; Nệm ghế rất &ecirc;m v&agrave; mềm mại, dễ d&agrave;ng vệ sinh, lau rửa.</p>\r\n\r\n<p>&minus; Khay ăn rộng r&atilde;i, tiện dụng.</p>\r\n\r\n<p>&minus; Ghế dễ d&agrave;ng gấp gọn v&agrave; chiếm rất &iacute;t kh&ocirc;ng gian.</p>\r\n\r\n<p>&minus; Khi b&eacute; đ&atilde; c&oacute; thể ngồi ăn c&ugrave;ng bạn tại b&agrave;n, Lucky Baby&nbsp;trở th&agrave;nh một chiếc ghế ăn v&ocirc; c&ugrave;ng thoải m&aacute;i cho b&eacute;.</p>\r\n\r\n<p>&minus; Đai an to&agrave;n gắn kh&oacute;a 5 trong 1.</p>\r\n\r\n<p>&minus; Độ tuổi sử dụng: từ 6 th&aacute;ng tuổi trở l&ecirc;n.</p>\r\n\r\n<p><img alt="" src="http://www.tuticare.com/media/product/20155_lucky_baby_gh____ch__i_2_trong_1.jpg" style="border:none; display:block; height:527px; margin-left:auto; margin-right:auto; max-width:100%; vertical-align:middle; width:527px" /></p>', 'default', NULL, 'ghe-choi-cho-be-lucky-baby-2-trong-1', '0', NULL, '/kcfinder-master/upload/images/20155_lucky_baby_gh____ch__i_2_trong_1.jpg', NULL, 'product', 0, 'Hot Deal,Sản phẩm nổi bật,Sản phẩm,Bỉm và sữa,Đồ dùng cho mẹ', 'Ghế chơi cho bé Lucky Baby 2 trong 1', 'Ghế chơi cho bé Lucky Baby 2 trong 1', 'Ghế chơi cho bé Lucky Baby 2 trong 1', NULL, '2017-12-04 07:08:14'),
(73, 'Xe đẩy du lịch Kinlee B1 màu đỏ', 'Xe đẩy lưới Kinlee là sản phẩm được thiết kế độc quyền tại Pháp, sản phẩm thiết kế tinh tế, nhẹ nên dễ dàng có thể mang đi trong các chuyến đi xa. Nếu nhà bạn có trẻ nhỏ đừng bỏ lỡ sản phẩm này của chúng tôi nhé, hãy theo dõi những thông tin dưới đây nhé.', '<p><strong>Xe đẩy lưới Kinlee</strong>&nbsp;l&agrave; sản phẩm được thiết kế độc quyền tại Ph&aacute;p, sản phẩm thiết kế tinh tế, nhẹ n&ecirc;n dễ d&agrave;ng c&oacute; thể mang đi trong c&aacute;c chuyến đi xa. Nếu nh&agrave; bạn c&oacute; trẻ nhỏ đừng bỏ lỡ sản phẩm n&agrave;y của ch&uacute;ng t&ocirc;i nh&eacute;, h&atilde;y theo d&otilde;i những th&ocirc;ng tin dưới đ&acirc;y nh&eacute;.</p>\r\n\r\n<p><strong>ĐẶC ĐIỂM SẢN PHẨM</strong></p>\r\n\r\n<p>- Trọng tải 3.4 kg, gia c&ocirc;ng từ nh&ocirc;m chịu lực cao n&ecirc;n chắc chắn cho b&eacute; chơi an to&agrave;n;</p>\r\n\r\n<p>-&nbsp;Vải l&oacute;t xe l&agrave;m từ chất liệu tho&aacute;ng kh&iacute; gi&uacute;p b&eacute; cảm thấy m&aacute;t mẻ, vui tươi hay những mẫu họa tiết được thiết kế độc quyền từ Ph&aacute;p;</p>\r\n\r\n<p>-&nbsp;Thiết kế xe bao gồm c&oacute;: đai an to&agrave;n 5 điểm, thanh chắn ngang được bọc nệm ph&iacute;a trước v&agrave; hệ thống 4 b&aacute;nh k&eacute;p xoay 360 độ kết hợp kho&aacute; phanh an to&agrave;n, c&oacute; thể gấp gọn khi kh&ocirc;ng d&ugrave;ng đến hoặc để gọn mang đi xa;</p>\r\n\r\n<p>- Một ưu điểm kh&aacute;c của d&ograve;ng xe đẩy lưới l&agrave; phần tựa lưng của b&eacute; được l&agrave;m bằng vải lưới tho&aacute;ng kh&iacute;, đặc biệt th&iacute;ch hợp với kh&iacute; hậu m&ugrave;a h&egrave; n&oacute;ng ẩm của Việt Nam. B&eacute; kh&ocirc;ng c&ograve;n cảm gi&aacute;c n&oacute;ng lung khi ngồi xe đẩy. Vải lưới gi&uacute;p việc vệ sinh xe rất thuận tiện;</p>\r\n\r\n<div>-&nbsp;Lần đầu ti&ecirc;n xuất hiện tại Việt Nam gi&uacute;p cho mẹ v&agrave; b&eacute; một trải nghiệm ho&agrave;n to&agrave;n mới về một chiếc xe đẩy chất lượng &ndash; thời trang v&agrave; gi&aacute; cả v&ocirc; c&ugrave;ng hợp l&iacute;.</div>\r\n\r\n<div><img alt="" src="http://www.tuticare.com/media/product/19844_xe_day_luoi_kinlee_cho_be_mau_do_tuticare_1.jpg" style="border:none; display:block; margin-left:auto; margin-right:auto; max-width:100%; vertical-align:middle" /></div>\r\n\r\n<p><strong>TH&Ocirc;NG SỐ SẢN PHẨM</strong></p>\r\n\r\n<p>- M&agrave;u sắc: V&agrave;ng- K&iacute;ch thước xe:&nbsp;40 x 86 x 88 cm (d&agrave;i x rộng x cao)</p>\r\n\r\n<p>- K&iacute;ch thước gập lại: 100 x 32cm (d&agrave;i x cao)</p>\r\n\r\n<p>- Sản xuất tại:&nbsp;Hong Kong</p>\r\n\r\n<p>- Độ tuổi:&nbsp;6 - 24 th&aacute;ng tuổi</p>\r\n\r\n<p>- Bảo h&agrave;nh:&nbsp;1 th&aacute;ng</p>\r\n\r\n<div>&nbsp;</div>', 'default', NULL, 'xe-day-du-lich-kinlee-b1-mau-do', '0', NULL, '/kcfinder-master/upload/images/19844_xe_day_luoi_kinlee_cho_be_mau_do_tuticare_1.jpg', NULL, 'product', 0, 'Đồ dùng - Máy móc - Nôi cũi,Quần áo - Giày dép - Phụ kiện,Hot Deal,Sản phẩm nổi bật,Sản phẩm', 'Xe đẩy du lịch Kinlee B1 màu đỏ', 'Xe đẩy du lịch Kinlee B1 màu đỏ', 'Xe đẩy du lịch Kinlee B1 màu đỏ', NULL, '2017-12-04 07:08:21'),
(76, 'Slide3', NULL, NULL, 'default', NULL, 'slide3', '1', NULL, '/kcfinder-master/upload/images/banner_a0ba2648.png', NULL, 'slide', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'Slide4', NULL, NULL, 'default', NULL, 'slide4', '1', NULL, '/kcfinder-master/upload/images/banner_a4380923.png', NULL, 'slide', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'Ghế ăn Mastela BPA Free 07330 màu be (new)', 'Ghế ăn Mastela là sản phẩm sáng tạo có thể giúp con bạn ngồi vào bàn và ăn với các thành viên gia đình một cách dễ dàng với sự điều chỉnh linh hoạt. Với thiết kế sử dụng cho mọi lứa tuổi cho bé từ khi mới bắt đầu tập ăn đến khi bé lớn vẫn có chỗ ngồi chắc chắn để chơi đùa.', '<div>\r\n<div>\r\n<p><span style="font-size:small">- Tập cho b&eacute; th&oacute;i quen nghi&ecirc;m t&uacute;c khi đến giờ ăn.</span></p>\r\n\r\n<p><span style="font-size:small">- Giữ cho b&eacute; ngồi y&ecirc;n một chỗ, tập trung ăn, kh&ocirc;ng b&ograve; lung tung gi&uacute;p mẹ tiết kiệm được nhiều thời gian.</span></p>\r\n\r\n<p><span style="font-size:small">- Kiểu d&aacute;ng xinh xắn, m&agrave;u sắc dễ thương.</span></p>\r\n\r\n<p><span style="font-size:small">- T&iacute;nh năng gấp si&ecirc;u nhỏ gọn để cất hoặc mang đi, c&oacute; thể xếp gọn mang theo đi du lịch.</span></p>\r\n\r\n<p><span style="font-size:small">- 2 nấc điều chỉnh độ cao,</span></p>\r\n\r\n<p><span style="font-size:small">- 3 nấc điều chỉnh khay ăn để ph&ugrave; hợp với từng lứa tuổi của b&eacute;.</span></p>\r\n\r\n<p><span style="font-size:small">- Khay đựng đồ ăn an to&agrave;n, c&oacute; thể th&aacute;o rời được.</span></p>\r\n\r\n<p><span style="font-size:small">- 2 d&acirc;y đai gi&uacute;p giữ b&eacute; an to&agrave;n v&agrave; chắc chắn.</span></p>\r\n\r\n<p><span style="font-size:small">- Sản phẩm ch&iacute;nh h&atilde;ng MASTELA.</span></p>\r\n\r\n<p><strong>TẠI SAO GHẾ ĂN CỦA MASTELA LẠI ĐƯỢC C&Aacute;C MẸ TIN D&Ugrave;NG ?</strong></p>\r\n\r\n<p>Hiện nay c&aacute;c mẹ c&oacute; xu hướng &aacute;p dụng phương ph&aacute;p ăn dặm chỉ huy, ăn dặm kiểu Nhật cho b&eacute; khi đến tuổi ăn dặm.&nbsp;C&aacute;c b&eacute; đều c&oacute; sở th&iacute;ch gặm nhấm bất cứ thứ g&igrave;, tay cầm chưa vững n&ecirc;n kh&ocirc;ng tr&aacute;nh được việc rơi v&atilde;i thức ăn.</p>\r\n\r\n<p>Do vậy, c&aacute;c mẹ cần phải lựa chọn ghế ăn đảm bảo an to&agrave;n về chất lượng nhất l&agrave; về th&agrave;nh phần phải đảm bảo&nbsp;<strong>KH&Ocirc;NG CHỨA BPA.</strong></p>\r\n\r\n<p>To&agrave;n bộ sản phẩm Mastela kh&ocirc;ng chỉ ch&uacute; trọng đến mẫu m&atilde;, chức năng, m&agrave; điều quan trọng nhất mastela hướng tới đ&oacute; l&agrave; độ an to&agrave;n sức khỏe cho b&eacute; y&ecirc;u.&nbsp;</p>\r\n\r\n<p>Ch&iacute;nh v&igrave; vậy, ghế ăn MASTELA được hơn 90% c&aacute;c mẹ VIỆT NAM lựa chọn.</p>\r\n\r\n<p><strong>MASTELA XIN CAM KẾT VỚI NGƯỜI TI&Ecirc;U D&Ugrave;NG:</strong></p>\r\n\r\n<p><strong>100% BPA FREE&nbsp;</strong></p>\r\n\r\n<p><strong>100% H&Agrave;NG CH&Iacute;NH H&Atilde;NG</strong></p>\r\n\r\n<p><strong>100% SẢN PHẨM ĐƯỢC L&Agrave;M TỪ HẠT NHỰA NGUY&Ecirc;N CHẤT 100% - KH&Ocirc;NG SỬ DỤNG NHỰA T&Aacute;I CHẾ.</strong></p>\r\n</div>\r\n</div>', 'default', NULL, 'ghe-an-mastela-bpa-free-07330-mau-be-(new)', '0', NULL, '/kcfinder-master/upload/images/11797_07330.jpg', NULL, 'product', 0, 'Hot Deal,Sản phẩm nổi bật,Sản phẩm,Thời trang bé trai,Thời trang bé gái,Bỉm và sữa', NULL, NULL, NULL, NULL, '2017-12-04 07:08:28'),
(79, 'Nôi ngủ du lịch BREVI - DOLCE NANNA PLUS màu xanh đen BRE811-348', '− Nôi em bé bọc vải, được thiết kế hoàn hảo cho cả lúc ngủ và lúc chơi, sử dụng thuận tiện trong nhà và đi du lịch.\r\n\r\n− Khung nôi có cấu tạo chắc chắn, an toàn tuyệt đối', '<div>\r\n<div>\r\n<p>&minus; N&ocirc;i em b&eacute; bọc vải, được thiết kế ho&agrave;n hảo cho cả l&uacute;c ngủ v&agrave; l&uacute;c chơi, sử dụng thuận tiện trong nh&agrave; v&agrave; đi du lịch.</p>\r\n\r\n<p>&minus; Khung n&ocirc;i c&oacute; cấu tạo chắc chắn, an to&agrave;n tuyệt đối</p>\r\n\r\n<p>cho b&eacute;, ch&acirc;n n&ocirc;i được thiết kế chống trượt ho&agrave;n hảo.</p>\r\n\r\n<p>&minus; Vải n&ocirc;i l&agrave; chất liệu cotton tho&aacute;ng kh&iacute;, 2 b&ecirc;n h&ocirc;ng n&ocirc;i l&agrave; 2 mặt lưới th&ocirc;ng gi&oacute; gi&uacute;p bạn quan s&aacute;t b&eacute; dễ d&agrave;ng.</p>\r\n\r\n<p>&minus; N&ocirc;i c&oacute; 2 tầng nệm thuận tiện cho mọi hoạt động của b&eacute;.</p>\r\n</div>\r\n</div>', 'default', NULL, 'noi-ngu-du-lich-brevi---dolce-nanna-plus-mau-xanh-den-bre811-348', '0', NULL, '/kcfinder-master/upload/images/noi-ngu-du-lich-brevi-dolce-nanna-plus-mau-xanh-den-bre811-348.gif', NULL, 'product', 0, 'Quần áo - Giày dép - Phụ kiện,Đồ dùng - Máy móc - Nôi cũi,Thế giới đồ chơi cho bé,Gian hàng dành cho mẹ,Đồ gia dụng - Điện gia dụng,Hot Deal,Sản phẩm nổi bật', 'Nôi ngủ du lịch BREVI - DOLCE NANNA PLUS màu xanh đen BRE811-348', 'Nôi ngủ du lịch BREVI - DOLCE NANNA PLUS màu xanh đen BRE811-348', 'Nôi ngủ du lịch BREVI - DOLCE NANNA PLUS màu xanh đen BRE811-348', NULL, '2017-12-04 07:08:33'),
(80, 'Kidandmom', NULL, NULL, 'default', NULL, 'kidandmom', '1', NULL, NULL, NULL, 'thuong-hieu', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'NoIAM', NULL, NULL, 'default', NULL, 'noiam', '1', NULL, NULL, NULL, 'thuong-hieu', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'LAZADA', NULL, NULL, 'default', NULL, 'lazada', '1', NULL, NULL, NULL, 'thuong-hieu', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'tess về bài viết blog', 'sdfsdf fdsdf sdsdf sdfsdfsd sdf sdf', '<p>tess tesssssstess tesssssstess tesssssstess tesssssstess tesssssstess tesssssstess tesssssstess tessssss</p>', 'default', NULL, 'tess-ve-bai-viet-blog', '1', NULL, '/kcfinder-master/upload/images/banner2.jpg', 'xe-day-seebaby-qq3-sieu-nhe-xanh-la', 'post', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'Mail liên hệ', NULL, '<p>Li&ecirc;n hệ được gửi cho website l&uacute;c&nbsp;[time].</p>\r\n\r\n<p>Th&ocirc;ng tin li&ecirc;n hệ&nbsp;gồm c&oacute;:&nbsp;</p>\r\n\r\n<p>Họ v&agrave; t&ecirc;n: [customer-name].</p>\r\n\r\n<p>Địa chỉ :&nbsp;[customer-address]</p>\r\n\r\n<p>Email: [customer-email].</p>\r\n\r\n<p>Số điện thoại: [customer-phone].</p>\r\n\r\n<p>N&ocirc;i dung: [customer-message].</p>\r\n\r\n<p>Vui l&ograve;ng h&atilde;y li&ecirc;n hệ&nbsp;cho kh&aacute;ch h&agrave;ng.</p>', 'default', NULL, 'mail-lien-he', '1', NULL, NULL, NULL, 'cau-hinh-email', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL,
  `code` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `price` int(254) DEFAULT NULL,
  `discount` int(254) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `discount_start` datetime DEFAULT NULL,
  `discount_end` datetime DEFAULT NULL,
  `image_list` longtext COLLATE utf8_unicode_ci,
  `properties` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buy_together` longtext COLLATE utf8_unicode_ci,
  `buy_after` longtext COLLATE utf8_unicode_ci
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `code`, `post_id`, `price`, `discount`, `updated_at`, `discount_start`, `discount_end`, `image_list`, `properties`, `buy_together`, `buy_after`) VALUES
(14, 'MT5423', 79, 450000, 350000, '2017-12-04 07:08:33', '2017-11-17 00:00:00', '2017-12-12 23:00:00', NULL, NULL, NULL, NULL),
(11, 'AZ765', 72, 200000, 100000, '2017-12-04 07:08:14', '2017-11-07 00:00:00', '2017-11-16 23:00:00', NULL, NULL, NULL, NULL),
(12, 'ORKB1RED', 73, 450000, 350000, '2017-12-04 07:08:21', '2017-11-07 13:00:00', '2017-11-15 13:00:00', '/kcfinder-master/upload/images/19844_xe_day_luoi_kinlee_cho_be_mau_do_tuticare_1.jpg', NULL, NULL, NULL),
(13, 'MT46', 78, 750000, 700000, '2017-12-04 07:08:28', '2017-11-07 00:00:00', '2017-11-28 23:00:00', NULL, NULL, NULL, NULL),
(10, 'Mt2434', 71, 750000, 650000, '2017-12-04 07:08:08', '2017-11-06 00:00:00', '2017-12-15 23:00:00', '/kcfinder-master/upload/images/12634_xe_day_qq3_seebaby_tim_tuticare_1.jpg,/kcfinder-master/upload/images/12634_xe_day_qq3_seebaby_xanh_duong_tuticare_1.jpg,/kcfinder-master/upload/images/12634_xe_day_qq3_seebaby_xanh_la_tuticare_1.jpg', NULL, 'ghe-an-mastela-bpa-free-07330-mau-be-(new),xe-day-du-lich-kinlee-b1-mau-do,xe-day-seebaby-qq3-sieu-nhe-xanh-la', 'xe-day-du-lich-kinlee-b1-mau-do,ghe-choi-cho-be-lucky-baby-2-trong-1,xe-day-seebaby-qq3-sieu-nhe-xanh-la');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(10) unsigned NOT NULL,
  `rating` int(11) NOT NULL,
  `ratingable_id` int(10) unsigned NOT NULL,
  `ratingable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(10) unsigned NOT NULL,
  `author_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `rating`, `ratingable_id`, `ratingable_type`, `author_id`, `author_type`, `created_at`, `updated_at`) VALUES
(1, 4, 73, 'App\\Entity\\Post', 1, 'App\\Entity\\User', '2017-11-14 00:15:14', '2017-11-14 00:15:14'),
(2, 5, 73, 'App\\Entity\\Post', 1, 'App\\Entity\\User', '2017-11-14 00:15:20', '2017-11-14 00:15:20'),
(3, 4, 71, 'App\\Entity\\Post', 1, 'App\\Entity\\User', '2017-11-14 01:05:53', '2017-11-14 01:05:53'),
(4, 5, 71, 'App\\Entity\\Post', 1, 'App\\Entity\\User', '2017-11-14 06:53:46', '2017-11-14 06:53:46'),
(5, 2, 71, 'App\\Entity\\Post', 1, 'App\\Entity\\User', '2017-11-14 06:53:47', '2017-11-14 06:53:47'),
(6, 5, 71, 'App\\Entity\\Post', 1, 'App\\Entity\\User', '2017-11-14 06:54:00', '2017-11-14 06:54:00'),
(7, 1, 71, 'App\\Entity\\Post', 1, 'App\\Entity\\User', '2017-11-14 06:54:05', '2017-11-14 06:54:05'),
(8, 5, 71, 'App\\Entity\\Post', 1, 'App\\Entity\\User', '2017-11-14 06:54:06', '2017-11-14 06:54:06'),
(9, 5, 71, 'App\\Entity\\Post', 1, 'App\\Entity\\User', '2017-11-16 05:04:03', '2017-11-16 05:04:03'),
(10, 4, 71, 'App\\Entity\\Post', 1, 'App\\Entity\\User', '2017-11-16 05:04:05', '2017-11-16 05:04:05'),
(11, 2, 71, 'App\\Entity\\Post', 1, 'App\\Entity\\User', '2017-11-16 05:04:06', '2017-11-16 05:04:06'),
(12, 1, 71, 'App\\Entity\\Post', 1, 'App\\Entity\\User', '2017-11-16 05:04:07', '2017-11-16 05:04:07'),
(13, 5, 71, 'App\\Entity\\Post', 1, 'App\\Entity\\User', '2017-11-16 05:04:07', '2017-11-16 05:04:07'),
(14, 5, 73, 'App\\Entity\\Post', 1, 'App\\Entity\\User', '2017-11-16 10:35:52', '2017-11-16 10:35:52'),
(15, 1, 71, 'App\\Entity\\Post', 1, 'App\\Entity\\User', '2017-11-23 06:06:49', '2017-11-23 06:06:49'),
(16, 3, 71, 'App\\Entity\\Post', 1, 'App\\Entity\\User', '2017-11-23 06:06:50', '2017-11-23 06:06:50'),
(17, 5, 72, 'App\\Entity\\Post', 1, 'App\\Entity\\User', '2017-11-25 02:20:03', '2017-11-25 02:20:03'),
(18, 5, 79, 'App\\Entity\\Post', 1, 'App\\Entity\\User', '2017-11-29 23:44:21', '2017-11-29 23:44:21'),
(19, 5, 79, 'App\\Entity\\Post', 1, 'App\\Entity\\User', '2017-11-30 09:41:03', '2017-11-30 09:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `setting_order`
--

CREATE TABLE IF NOT EXISTS `setting_order` (
  `setting_order_id` int(11) NOT NULL,
  `point_to_currency` int(11) DEFAULT NULL,
  `currency_give_point` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting_order`
--

INSERT INTO `setting_order` (`setting_order_id`, `point_to_currency`, `currency_give_point`, `created_at`, `updated_at`) VALUES
(1, 1000, 100000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcribe_email`
--

CREATE TABLE IF NOT EXISTS `subcribe_email` (
  `subcribe_email_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` int(8) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subcribe_email`
--

INSERT INTO `subcribe_email` (`subcribe_email_id`, `email`, `name`, `group_id`, `created_at`, `updated_at`) VALUES
(5, 'vn3ctran@gmail.com', NULL, 0, '2017-11-07 08:17:44', NULL),
(4, 'vn3ctran@gmail.com', NULL, 0, '2017-11-07 08:16:41', NULL),
(6, 'vn3ctran@gmail.com', NULL, 0, '2017-11-07 08:20:12', NULL),
(7, 'trannam.bachkhoa.k56@gmail.com', NULL, 0, '2017-11-07 08:20:36', NULL),
(8, 'miaki088@gmail.com', NULL, 0, '2017-11-07 08:20:59', NULL),
(9, 'miakinew@gmail.com', NULL, 0, '2017-11-07 08:21:18', NULL),
(10, 'miaki088@gmail.com', NULL, 0, '2017-11-07 08:21:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_post`
--

CREATE TABLE IF NOT EXISTS `sub_post` (
  `sub_post_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `type_sub_post_slug` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_post`
--

INSERT INTO `sub_post` (`sub_post_id`, `post_id`, `type_sub_post_slug`) VALUES
(27, 75, 'slide'),
(26, 74, 'slide'),
(7, 47, 'khoang-gia'),
(8, 48, 'khoang-gia'),
(9, 49, 'khoang-gia'),
(10, 50, 'khoang-gia'),
(11, 51, 'thuong-hieu'),
(12, 52, 'thuong-hieu'),
(13, 53, 'thuong-hieu'),
(14, 54, 'thuong-hieu'),
(15, 55, 'thuong-hieu'),
(16, 56, 'xuat-xu'),
(17, 57, 'xuat-xu'),
(18, 58, 'xuat-xu'),
(19, 59, 'xuat-xu'),
(20, 60, 'xuat-xu'),
(21, 65, 'cau-hoi-thuong-gap'),
(22, 66, 'cau-hinh-email'),
(23, 67, 'cau-hinh-email'),
(24, 68, 'cau-hinh-email'),
(25, 69, 'cau-hinh-email'),
(28, 76, 'slide'),
(29, 77, 'slide'),
(30, 80, 'thuong-hieu'),
(31, 81, 'thuong-hieu'),
(32, 82, 'thuong-hieu'),
(33, 84, 'cau-hinh-email');

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE IF NOT EXISTS `template` (
  `template_id` int(11) NOT NULL,
  `title` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_hide` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`template_id`, `title`, `slug`, `created_at`, `updated_at`, `is_hide`) VALUES
(1, 'Câu hỏi thường gặp', 'cau-hoi-thuong-gap', NULL, NULL, NULL),
(2, 'hot deal', 'hot-deal', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type_information`
--

CREATE TABLE IF NOT EXISTS `type_information` (
  `type_infor_id` int(11) NOT NULL,
  `title` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `type_input` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `placeholder` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_information`
--

INSERT INTO `type_information` (`type_infor_id`, `title`, `type_input`, `placeholder`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'logo', 'image', 'logo', NULL, NULL, 'logo'),
(2, 'Số điện thoại', 'one_line', 'Số điện thoại trên trang chủ', NULL, NULL, 'so-dien-thoai'),
(3, 'hotline', 'one_line', 'holine', NULL, '2017-10-23 10:11:48', 'hotline'),
(4, 'Khung giờ làm việc', 'one_line', 'khung giờ làm việc', NULL, NULL, 'khung-gio-lam-viec'),
(5, 'email', 'one_line', 'email', NULL, NULL, 'email'),
(6, 'Địa chỉ', 'one_line', 'Địa chỉ', NULL, NULL, 'dia-chi'),
(7, 'Website', 'one_line', 'website', NULL, NULL, 'website'),
(8, 'Chứng chỉ', 'image', 'Chứng chỉ', NULL, NULL, 'chung-chi'),
(9, 'Điện thoại cuối trang', 'one_line', 'Điện thoại cuối trang', NULL, NULL, 'dien-thoai-cuoi-trang'),
(10, 'Hot tags', 'multi_line', 'hot tags', NULL, NULL, 'hot-tags'),
(11, 'Tên công ty', 'one_line', NULL, NULL, NULL, 'ten-cong-ty'),
(12, 'banner top', 'image', NULL, NULL, NULL, 'banner-top'),
(13, 'Thanh toán online', 'image', NULL, NULL, NULL, 'thanh-toan-online'),
(14, 'Giao hàng nhanh', 'image', NULL, NULL, NULL, 'giao-hang-nhanh'),
(15, 'Vị trí quảng cáo 1', 'image', NULL, NULL, NULL, 'vi-tri-quang-cao-1'),
(16, 'Vị trí quảng cáo 2', 'image', NULL, NULL, NULL, 'vi-tri-quang-cao-2'),
(17, 'Fanpage facebook', 'multi_line', NULL, NULL, NULL, 'fanpage-facebook'),
(18, 'link fanpage', 'one_line', NULL, NULL, NULL, 'link-fanpage'),
(19, 'Thông tin cuối trang', 'multi_line', NULL, NULL, NULL, 'thong-tin-cuoi-trang'),
(20, 'meta_title', 'one_line', NULL, NULL, NULL, 'meta_title'),
(21, 'meta_description', 'multi_line', NULL, NULL, NULL, 'meta_description'),
(22, 'meta_keyword', 'one_line', NULL, NULL, NULL, 'meta_keyword'),
(23, 'Bảng giá chi tiết vận chuyển sản phẩm', 'multi_line', NULL, NULL, NULL, 'bang-gia-chi-tiet-van-chuyen-san-pham');

-- --------------------------------------------------------

--
-- Table structure for table `type_input`
--

CREATE TABLE IF NOT EXISTS `type_input` (
  `type_input_id` int(11) NOT NULL,
  `title` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `type_input` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `placeholder` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_used` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_input`
--

INSERT INTO `type_input` (`type_input_id`, `title`, `slug`, `type_input`, `placeholder`, `post_used`, `created_at`, `updated_at`) VALUES
(1, 'Giá từ', 'gia-tu', 'one_line', NULL, 'khoang-gia', NULL, NULL),
(2, 'Đến giá', 'den-gia', 'one_line', NULL, 'khoang-gia', NULL, NULL),
(3, 'Xuất xứ', 'xuat-xu', 'xuat-xu', NULL, 'product', NULL, '2017-11-02 04:36:59'),
(4, 'Hãng sản xuất', 'hang-san-xuat', 'thuong-hieu', NULL, 'product', NULL, '2017-11-02 04:36:37'),
(5, 'Trạng thái trong kho', 'so-luong-trong-kho', 'one_line', 'còn hàng hoặc hết hàng', 'product', NULL, '2017-11-12 07:11:42'),
(10, 'Họ và tên', 'ho-va-ten', 'one_line', NULL, 'cau-hoi-thuong-gap', NULL, NULL),
(11, 'Điện thoại', 'dien-thoai', 'one_line', NULL, 'cau-hoi-thuong-gap', NULL, '2017-10-28 09:12:25'),
(12, 'Email', 'email', 'one_line', NULL, 'cau-hoi-thuong-gap', NULL, '2017-10-28 09:12:35'),
(13, 'Câu hỏi', 'cau-hoi', 'multi_line', NULL, 'cau-hoi-thuong-gap', NULL, '2017-10-28 09:17:10'),
(14, 'Câu trả lời', 'cau-tra-loi', 'editor', NULL, 'cau-hoi-thuong-gap', NULL, '2017-10-28 09:06:32'),
(15, 'To', 'to', 'one_line', NULL, 'cau-hinh-email', NULL, NULL),
(16, 'From', 'from', 'one_line', NULL, 'cau-hinh-email', NULL, NULL),
(17, 'Chủ đề (Subject)', 'chu-de-(subject)', 'one_line', NULL, 'cau-hinh-email', NULL, NULL),
(19, 'Đường dẫn slide', 'duong-dan-slide', 'one_line', NULL, 'slide', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type_sub_post`
--

CREATE TABLE IF NOT EXISTS `type_sub_post` (
  `type_sub_post_id` int(11) NOT NULL,
  `title` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `template` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `input_default_used` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_sub_post`
--

INSERT INTO `type_sub_post` (`type_sub_post_id`, `title`, `slug`, `template`, `input_default_used`, `created_at`, `updated_at`) VALUES
(1, 'Slide', 'slide', 'default', 'image', NULL, NULL),
(5, 'Thương hiệu', 'thuong-hieu', 'default', '', NULL, NULL),
(6, 'Xuất xứ', 'xuat-xu', 'default', '', NULL, NULL),
(7, 'Khoảng giá', 'khoang-gia', 'default', '', NULL, NULL),
(8, 'Câu hỏi thường gặp', 'cau-hoi-thuong-gap', 'cau-hoi-thuong-gap', '', NULL, '2017-10-28 08:11:18'),
(9, 'Cấu hình email', 'cau-hinh-email', 'default', 'content', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(254) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Null',
  `phone` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(45) DEFAULT NULL,
  `name` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `age` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `point` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `phone`, `image`, `role`, `name`, `updated_at`, `created_at`, `age`, `address`, `point`) VALUES
(1, 'vn3ctran@gmail.com', '$2y$10$NnWmu0CwTsKP/5ZLaHAa/OUcpMbwWlKYtxoQZOA4D6lreY7uE9pra', '0PaxXoWX62a66QjtrCfsnGDlm4jpV29gdRlMhnV9jGhDe3Xu290JnT2cczb0', '12345678', 'upload/cam di nguoc chieu.png', 3, 'Quản trị viên', '2017-11-08 09:15:10', NULL, 'nam', 'Cổ đông sơn tây', 0),
(6, 'trannam.bachkhoa.k56@gmail.com', '$2y$10$C5V5M2Fj/fI2w4aaydaGJ.NbWaNpBqDvNeg6yuDvpNp/v4XmBKfdS', 'Null', '097 456 1735', NULL, 1, 'Trần hải nam', '2017-10-30 09:12:28', '2017-10-30 08:35:02', 'Nam', 'Cổ đông sơn tây, HN', 0),
(7, 'miaki088@gmail.com', '$2y$10$BFHb20ebpy5aQCNbC/PlReXT6RIr.5NbbMb97DGt2e3e4yci0BRZ6', 'Null', NULL, 'upload/1506954790690-9090-1506986120_500x300.jpg', 1, 'Nam Trần', '2017-11-01 09:38:16', '2017-11-01 09:37:36', NULL, NULL, 0),
(8, '1341396289322310@kidandmom.com', '$2y$10$Lh2DizbjWtbRJeIvQVJdD.b/yrBH1BT5pISV1o1U8YjSu8OMxv.U.', 'pTdafIevyFlhTCf0fUrq783jRcTRWmSAGohBTWyHrsD2M9wNKFKURTi8iGIe', NULL, NULL, 1, 'Trần Nam', NULL, NULL, NULL, NULL, 0),
(9, 'vn3ctran@gmail.com', '$2y$10$K7.IUohLvFy5rATbFtDr.eV9/AvGzISEKa9IfDjVi9fL/1gba2dda', 'EAw6mG51oI', NULL, NULL, 1, 'VN3C Trần', NULL, NULL, NULL, NULL, 0),
(10, 'hungdv2014@gmail.com', '$2y$10$Ti89TrL.J4.I/ZPQTabyaOfJQFiEJnjZWVz.oO7mW7lp0sUGmXKfi', 'Null', NULL, NULL, 1, 'hung hai', '2017-11-09 19:00:12', '2017-11-09 19:00:12', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`category_post_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `group_mail`
--
ALTER TABLE `group_mail`
  ADD PRIMARY KEY (`group_mail_id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`infor_id`);

--
-- Indexes for table `input`
--
ALTER TABLE `input`
  ADD PRIMARY KEY (`input_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `menu_element`
--
ALTER TABLE `menu_element`
  ADD PRIMARY KEY (`menu_element_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notify_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_bank`
--
ALTER TABLE `order_bank`
  ADD PRIMARY KEY (`order_bank_id`);

--
-- Indexes for table `order_code_sale`
--
ALTER TABLE `order_code_sale`
  ADD PRIMARY KEY (`order_code_sale_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `order_ship`
--
ALTER TABLE `order_ship`
  ADD PRIMARY KEY (`order_ship_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_order`
--
ALTER TABLE `setting_order`
  ADD PRIMARY KEY (`setting_order_id`);

--
-- Indexes for table `subcribe_email`
--
ALTER TABLE `subcribe_email`
  ADD PRIMARY KEY (`subcribe_email_id`);

--
-- Indexes for table `sub_post`
--
ALTER TABLE `sub_post`
  ADD PRIMARY KEY (`sub_post_id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`template_id`);

--
-- Indexes for table `type_information`
--
ALTER TABLE `type_information`
  ADD PRIMARY KEY (`type_infor_id`);

--
-- Indexes for table `type_input`
--
ALTER TABLE `type_input`
  ADD PRIMARY KEY (`type_input_id`);

--
-- Indexes for table `type_sub_post`
--
ALTER TABLE `type_sub_post`
  ADD PRIMARY KEY (`type_sub_post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `category_post`
--
ALTER TABLE `category_post`
  MODIFY `category_post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=321;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `group_mail`
--
ALTER TABLE `group_mail`
  MODIFY `group_mail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `infor_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `input`
--
ALTER TABLE `input`
  MODIFY `input_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=355;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `menu_element`
--
ALTER TABLE `menu_element`
  MODIFY `menu_element_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=481;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notify_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `order_bank`
--
ALTER TABLE `order_bank`
  MODIFY `order_bank_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order_code_sale`
--
ALTER TABLE `order_code_sale`
  MODIFY `order_code_sale_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `order_ship`
--
ALTER TABLE `order_ship`
  MODIFY `order_ship_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `setting_order`
--
ALTER TABLE `setting_order`
  MODIFY `setting_order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subcribe_email`
--
ALTER TABLE `subcribe_email`
  MODIFY `subcribe_email_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sub_post`
--
ALTER TABLE `sub_post`
  MODIFY `sub_post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `template_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `type_information`
--
ALTER TABLE `type_information`
  MODIFY `type_infor_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `type_input`
--
ALTER TABLE `type_input`
  MODIFY `type_input_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `type_sub_post`
--
ALTER TABLE `type_sub_post`
  MODIFY `type_sub_post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

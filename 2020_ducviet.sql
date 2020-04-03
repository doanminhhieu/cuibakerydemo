-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2020 at 11:08 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2020_ducviet`
--

-- --------------------------------------------------------

--
-- Table structure for table `lh_baiviet`
--

CREATE TABLE `lh_baiviet` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `tenbaiviet_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenbaiviet_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenbaiviet_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota_vi` text COLLATE utf8_unicode_ci,
  `mota_en` text COLLATE utf8_unicode_ci,
  `mota_cn` text COLLATE utf8_unicode_ci,
  `noidung_vi` text COLLATE utf8_unicode_ci,
  `noidung_en` text COLLATE utf8_unicode_ci,
  `noidung_cn` text COLLATE utf8_unicode_ci,
  `tags_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_parent_muti` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catasort` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon_hover` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dowload` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duongdantin` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'datafiles/setone',
  `ngaydang` int(11) NOT NULL DEFAULT '0',
  `capnhat` int(11) NOT NULL DEFAULT '0',
  `soluotxem` int(11) NOT NULL DEFAULT '1',
  `step` tinyint(3) NOT NULL DEFAULT '1',
  `giatien` bigint(11) NOT NULL DEFAULT '0',
  `giakm` bigint(11) NOT NULL DEFAULT '0',
  `seo_title_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opt_km` tinyint(1) NOT NULL DEFAULT '0',
  `opt` tinyint(1) NOT NULL DEFAULT '0',
  `opt1` tinyint(1) NOT NULL DEFAULT '0',
  `opt2` tinyint(1) NOT NULL DEFAULT '0',
  `top_video` tinyint(4) NOT NULL DEFAULT '0',
  `p1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p2` int(11) NOT NULL DEFAULT '0',
  `p3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_video` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_1` int(11) NOT NULL DEFAULT '0',
  `num_2` int(11) NOT NULL DEFAULT '0',
  `num_3` int(11) NOT NULL DEFAULT '0',
  `showhi` tinyint(1) NOT NULL DEFAULT '1',
  `tinh_nang` text COLLATE utf8_unicode_ci,
  `thuoc_tinh_1_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuoc_tinh_1_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuoc_tinh_2_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuoc_tinh_2_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuoc_tinh_3_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuoc_tinh_3_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia_tri_1_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia_tri_1_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia_tri_2_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia_tri_2_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia_tri_3_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia_tri_3_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thongso_vi` text COLLATE utf8_unicode_ci,
  `thongso_en` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Bang chua catalag News' ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `lh_baiviet`
--

INSERT INTO `lh_baiviet` (`id`, `id_user`, `id_parent`, `tenbaiviet_vi`, `tenbaiviet_en`, `tenbaiviet_cn`, `mota_vi`, `mota_en`, `mota_cn`, `noidung_vi`, `noidung_en`, `noidung_cn`, `tags_vi`, `tags_en`, `tags_cn`, `seo_name`, `id_parent_muti`, `catasort`, `icon`, `icon_hover`, `dowload`, `duongdantin`, `ngaydang`, `capnhat`, `soluotxem`, `step`, `giatien`, `giakm`, `seo_title_vi`, `seo_title_en`, `seo_title_cn`, `seo_keywords_vi`, `seo_keywords_en`, `seo_keywords_cn`, `seo_description_vi`, `seo_description_en`, `seo_description_cn`, `opt_km`, `opt`, `opt1`, `opt2`, `top_video`, `p1`, `p2`, `p3`, `link_video`, `num_1`, `num_2`, `num_3`, `showhi`, `tinh_nang`, `thuoc_tinh_1_vi`, `thuoc_tinh_1_en`, `thuoc_tinh_2_vi`, `thuoc_tinh_2_en`, `thuoc_tinh_3_vi`, `thuoc_tinh_3_en`, `gia_tri_1_vi`, `gia_tri_1_en`, `gia_tri_2_vi`, `gia_tri_2_en`, `gia_tri_3_vi`, `gia_tri_3_en`, `thongso_vi`, `thongso_en`) VALUES
(1, 1, 1, 'Quạt Công Nghiệp Deton', 'Industrial Fan Deton', '', '', '', '', '<h2>SẢN PHẨM ĐA DẠNG</h2>\r\n\r\n<p>Quạt c&ocirc;ng nghiệp DETON &ldquo;SI&Ecirc;U BỀN&rdquo; được biết đến l&agrave; thương hiệu nổi tiếng trong ng&agrave;nh quạt c&ocirc;ng nghiệp tại Việt Nam. Quạt Deton bao gồm c&aacute;c sản phẩm Quạt th&ocirc;ng gi&oacute; v&agrave; l&agrave;m m&aacute;t, quạt h&uacute;t kh&oacute;i, h&uacute;t m&ugrave;i, quạt lọc bụi bảo vệ m&ocirc;i trường, quạt điều h&ograve;a kh&ocirc;ng kh&iacute;, quạt tăng &aacute;p cầu thang, quạt sử dụng cho nh&agrave; m&aacute;y, c&aacute;c c&ocirc;ng tr&igrave;nh x&acirc;y dựng&hellip; Hiện tại Deton c&oacute; thể sản xuất 20 series với hơn 100 mẫu quạt th&ocirc;ng gi&oacute;, quạt c&ocirc;ng nghiệp v&agrave; quạt h&uacute;t, v&agrave; xuất xưởng hơn 1000 000 sản phẩm quạt mỗi năm.</p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<h2>C&Ocirc;NG NGHỆ TI&Ecirc;N TIẾN</h2>\r\n\r\n<p>Với trang bị thiết bị CAD-CAM mới nhất để thiết kế sản phẩm, m&aacute;y cắt lazer Nhật Bản, m&aacute;y khoan với c&aacute;c tốc độ kh&aacute;c nhau c&oacute; thể điều chỉnh bằng số, hệ thống c&acirc;n bằng động, m&aacute;y h&agrave;n tự động, m&aacute;y kiểm tra stato v&agrave; c&aacute;c thiết bị chuy&ecirc;n nghiệp kh&aacute;c. Ngo&agrave;i ra, Deton c&ograve;n thiết lập ph&ograve;ng th&iacute; nghiệm hiệu suất hoạt động tự động ph&ugrave; hợp với Ti&ecirc;u chuẩn AMCA210 . Tất cả những điều n&agrave;y gi&uacute;p Deton c&oacute; khả năng ph&aacute;t triển v&agrave; sản xuất nhiều loại sản phẩm kh&aacute;c nhau.</p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<h2>THƯƠNG HIỆU QUỐC TẾ</h2>\r\n\r\n<p>Sản phẩm quạt c&ocirc;ng nghiệp Deton đ&atilde; c&oacute; mặt 30 năm tr&ecirc;n thị trường v&agrave; nhận nhiều chứng nhận chất lượng tr&ecirc;n thế giới: chứng chỉ về kỹ thuật điện quốc tế CB, CE của EU, SASO của Ả Rập Saudi, chứng chỉ SAA của &Uacute;c, chứng nhận của Th&aacute;i Lan, chứng nhận PAI của Kuwait, giấy chứng nhận ROHS của EU. Hiện nay, h&atilde;ng Deton đ&atilde; thiết lập hơn 1.000 cửa h&agrave;ng b&aacute;n h&agrave;ng, với c&aacute;c sản phẩm xuất khẩu sang ch&acirc;u &Aacute;, ch&acirc;u &Acirc;u, ch&acirc;u Mỹ, ch&acirc;u Phi, &Uacute;c v&agrave; hơn 100 quốc gia v&agrave; khu vực.</p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<h2>CHẤT LƯỢNG ĐẠT CHUẨN</h2>\r\n\r\n<p>Tại Việt Nam, thương hiệu Quạt c&ocirc;ng nghiệp Deton đ&atilde; c&oacute; mặt v&agrave; ph&aacute;t triển 20 năm tr&ecirc;n thị trường quạt c&ocirc;ng nghiệp dưới sự ph&acirc;n phối độc quyền của C&ocirc;ng ty TNHH C&ocirc;ng nghiệp v&agrave; Thương mại Đức Việt. Sản phẩm quạt c&ocirc;ng nghiệp Deton c&oacute; chất lượng cao, mẫu m&atilde; đẹp, đa dạng, đa t&iacute;nh năng n&ecirc;n được kh&aacute;ch h&agrave;ng ưa chuộng tr&ecirc;n trị trường. Với những ưu điểm vượt trội, sản phẩm đ&atilde; được cấp chứng nhận về Ti&ecirc;u chuẩn chất lượng của Tổng cục Ti&ecirc;u chuẩn &ndash; Đo lường- Chất lượng thuộc Bộ khoa học v&agrave; C&ocirc;ng nghệ v&agrave; M&ocirc;i trường; Ti&ecirc;u chuẩn về chất lượng ISO 9001:2008 của tổ chức UKAS</p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<p>Với những t&iacute;nh năng vượt trội, đặc t&iacute;nh &ldquo;Si&ecirc;u bền&rdquo; c&ugrave;ng c&ocirc;ng nghệ ti&ecirc;n tiến, quạt c&ocirc;ng nghiệp Deton tự h&agrave;o l&agrave; thương hiệu uy t&iacute;n v&agrave; sự lựa chọn tốt nhất cho mọi kh&aacute;ch h&agrave;ng.</p>', '<h2>DIVERSITY PRODUCTS</h2>\r\n\r\n<p>DETON &quot;EXTREMELY&quot; industrial fan is known as a well-known brand in the industrial fan industry in Vietnam. Deton fan products include ventilation and cooling fans, exhaust fans, exhaust fans, environmental protection dust fans, air-conditioning fans, stair booster fans, factory-use fans, utilities construction ... Deton can currently produce 20 series with more than 100 models of exhaust fans, industrial fans and exhaust fans, and manufactures over 1,000 000 fan products each year.</p>\r\n\r\n<h2>ADVANCED TECHNOLOGY</h2>\r\n\r\n<p>Equipped with the latest CAD-CAM equipment to design products, Japanese laser cutting machines, drilling machines with different adjustable speed, dynamic balancing system, automatic welding machine, testing machine Check stator and other professional equipment. In addition, Deton sets up an automated performance laboratory in accordance with the AMCA210 Standard. All of this helps Deton develop and produce a wide range of products.</p>\r\n\r\n<h2>INTERNATIONAL BRANDS</h2>\r\n\r\n<p>The Deton industrial fan product has been available for 30 years in the market and received many quality certifications in the world: CB, CE international electrical engineering certificate, EU SASO, Saudi Arabia SAS, and SAA certification of Australia. , Thai certification, Kuwait PAI certification, EU ROHS certificate. Today, Deton has established more than 1,000 sales outlets, with products exported to Asia, Europe, the Americas, Africa, Australia and more than 100 countries and regions.</p>\r\n\r\n<h2>QUALITY REACH STANDARD</h2>\r\n\r\n<p>In Vietnam, the Deton industrial Fan brand has been present and developed for 20 years in the industrial fan market under the exclusive distribution of Duc Viet Industry and Trading Co., Ltd. Industrial Deton fan products are of high quality, nice design, variety, and features, so they are favored by customers in the market. With the outstanding advantages, the product has been certified to the Quality Standards of the General Department of Standards, Metrology and Quality under the Ministry of Science, Technology and Environment; UKAS ISO 9001: 2008 quality standard</p>\r\n\r\n<p>With outstanding features, &quot;Ultra-durable&quot; features and advanced technology, Deton industrial fans are proud to be the prestigious brand and the best choice for all customers.</p>', '', '', '', '', 'quat-cong-nghiep-deton', '', 1, NULL, NULL, NULL, 'datafiles', 1584945392, 0, 1, 1, 0, 0, 'Quạt Công Nghiệp Deton', 'Industrial Fan Deton', '', 'Quạt Công Nghiệp Deton', 'Industrial Fan Deton', '', 'Quạt Công Nghiệp Deton', 'Industrial Fan Deton', NULL, 0, 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(2, 1, 2, 'HÌNH THÀNH VÀ PHÁT TRIỂN', 'FORMATION AND DEVELOPMENT', '', '', '', '', '<p>C&ocirc;ng ty TNHH C&ocirc;ng nghiệp v&agrave; Thương mại Đức Việt chuy&ecirc;n hoạt động trong lĩnh vực Sản xuất, kinh doanh, thiết kế, ph&acirc;n phối v&agrave; lắp đặt c&aacute;c sản phẩm quạt c&ocirc;ng nghiệp thương hiệu Deton gồm: c&aacute;c loại quạt quạt th&ocirc;ng gi&oacute;, quạt s&agrave;n, quạt đảo trần, c&aacute;c loại quạt h&uacute;t bụi, cấp kh&iacute; sạch, quạt tăng &aacute;p cầu thang, điều ho&agrave; kh&ocirc;ng kh&iacute;&hellip;cho c&aacute;c nh&agrave; m&aacute;y, nh&agrave; xưởng, c&ocirc;ng tr&igrave;nh.</p>\r\n\r\n<p>Với hơn 17 năm hoạt động v&agrave; ph&aacute;t triển, C&ocirc;ng ty Đức Việt đ&atilde; khẳng định được vị thế của m&igrave;nh với vai tr&ograve; l&agrave; &ldquo;NH&Agrave; PH&Acirc;N PHỐI ĐỘC QUYỀN QUẠT DETON&rdquo; tr&ecirc;n thị trường quạt c&ocirc;ng nghiệp Việt Nam</p>', '<p>Duc Viet Industry and Trading Co., Ltd specializes in manufacturing, trading, designing, distributing and installing Deton industrial fan products including: exhaust fans, floor fans. , ceiling fans, exhaust fans, clean air supply, stair turbochargers, air conditioners, etc. for factories, factories and buildings.</p>\r\n\r\n<p>With more than 17 years of operation and development, Duc Viet Company has affirmed its position as the &quot;EXCLUSIVE DISTRIBUTOR DETON&quot; in the Vietnamese industrial fan market.</p>', '', '', '', '', 'hinh-thanh-va-phat-trien', '', 3, '1584945708_6.jpg', NULL, NULL, 'datafiles', 1584945708, 0, 1, 1, 0, 0, 'HÌNH THÀNH VÀ PHÁT TRIỂN', 'FORMATION AND DEVELOPMENT', '', 'HÌNH THÀNH VÀ PHÁT TRIỂN', 'FORMATION AND DEVELOPMENT', '', 'HÌNH THÀNH VÀ PHÁT TRIỂN', 'FORMATION AND DEVELOPMENT', NULL, 0, 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(3, 1, 2, 'BỀ DÀY KINH NGHIỆM', 'EXPERIENCE', '', '', '', '', '<p>Qua 17 năm hoạt động v&agrave; ph&aacute;t triển tr&ecirc;n thị trường quạt c&ocirc;ng nghiệp, C&ocirc;ng ty Đức Việt l&agrave; nh&agrave; tư vấn gi&agrave;u kinh nghiệm cho c&aacute;c c&ocirc;ng tr&igrave;nh nh&agrave; xưởng với đội ngũ nh&acirc;n vi&ecirc;n kỹ thuật giỏi, bộ phận tư vấn chuy&ecirc;n nghiệp,</p>\r\n\r\n<p>C&ocirc;ng ty ph&acirc;n phối cho tất cả c&aacute;c khu c&ocirc;ng nghiệp, nh&agrave; m&aacute;y v&agrave; c&aacute;c khu li&ecirc;n hợp chế xuất, sản xuất từ nhỏ đến lớn, c&aacute;c t&ograve;a nh&agrave; c&ocirc;ng tr&igrave;nh khắp cả nước.</p>\r\n\r\n<p>Đặc biệt, C&ocirc;ng ty Đức Việt đ&atilde; ph&aacute;t triển hệ thống ph&acirc;n phối quạt C&ocirc;ng nghiệp Deton tại tất cả 63 tỉnh th&agrave;nh với 160 đại l&yacute;, nhiều kh&aacute;ch h&agrave;ng doanh nghiệp v&agrave; kh&aacute;ch h&agrave;ng lẻ tr&ecirc;n cả nước</p>\r\n\r\n<ul>\r\n</ul>', '<p>After 17 years of operation and development in the market of industrial fans, Duc Viet Company is an experienced consultant for factory projects with good technical staff, professional consulting department,</p>\r\n\r\n<p>The company distributes to all industrial parks, factories and export processing complexes, producing from small to large, buildings throughout the country.</p>\r\n\r\n<p>Especially, Duc Viet Company has developed Deton Industrial fan distribution system in all 63 provinces and cities with 160 agents, many corporate and retail customers across the country.</p>', '', '', '', '', 'be-day-kinh-nghiem', '', 2, '1584945739_15.png', NULL, NULL, 'datafiles', 1584945739, 0, 1, 1, 0, 0, 'BỀ DÀY KINH NGHIỆM', 'EXPERIENCE', '', 'BỀ DÀY KINH NGHIỆM', 'EXPERIENCE', '', 'BỀ DÀY KINH NGHIỆM', 'EXPERIENCE', NULL, 0, 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(4, 1, 3, 'CHẤT LƯỢNG SIÊU BỀN', 'SUPER DURABLE QUALITY', '', '', '', '', '<p>C&ocirc;ng ty TNHH Đức Việt cam kết lu&ocirc;n mang đến cho kh&aacute;ch h&agrave;ng sự h&agrave;i l&ograve;ng bằng c&aacute;c sản phẩm quạt Deton &ldquo;SI&Ecirc;U BỀN&rdquo; với chất lượng tốt nhất v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến nhất</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n kh&ocirc;ng ngừng đầu tư m&aacute;y m&oacute;c thiết bị v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến để hướng tới sản phẩm ho&agrave;n thiện.</p>', '<p>Duc Viet Co., Ltd commits to always bring customers satisfaction with &quot;SUPER DURABLE&quot; Deton fans with the best quality and the most advanced technology.</p>\r\n\r\n<p>We are constantly investing in advanced equipment, machinery and technology towards the finished product.</p>', '', '', '', '', 'chat-luong-sieu-ben', '', 6, '1584945809_7.jpg', NULL, NULL, 'datafiles', 1584945809, 0, 1, 1, 0, 0, 'CHẤT LƯỢNG SIÊU BỀN', 'SUPER DURABLE QUALITY', '', 'CHẤT LƯỢNG SIÊU BỀN', 'SUPER DURABLE QUALITY', '', 'CHẤT LƯỢNG SIÊU BỀN', 'SUPER DURABLE QUALITY', NULL, 0, 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(5, 1, 3, 'ĐỘI NGŨ NHÂN VIÊN GIỎI', 'TEAM EMPLOYEES', '', '', '', '', '<p>Đội ngũ nh&acirc;n vi&ecirc;n tư vấn nhiệt t&igrave;nh, kinh nghiệm.</p>\r\n\r\n<p>Đội ngũ kỹ sư giỏi, c&ocirc;ng nh&acirc;n l&agrave;nh nghề, kh&ocirc;ng ngừng nỗ lực s&aacute;ng tạo để mang đến cho Qu&yacute; kh&aacute;ch h&agrave;ng c&aacute;c sản phẩm chất lượng ph&ugrave; hợp với từng nhu cầu sử dụng của mỗi Kh&aacute;ch hang</p>', '<p>Enthusiastic and experienced consultants.</p>\r\n\r\n<p>A team of good engineers, skilled workers, constantly trying to create to bring customers quality products suitable for each customer needs.</p>', '', '', '', '', 'doi-ngu-nhan-vien-gioi', '', 5, '1584945883_8.jpg', NULL, NULL, 'datafiles', 1584945883, 0, 1, 1, 0, 0, 'ĐỘI NGŨ NHÂN VIÊN GIỎI', 'TEAM EMPLOYEES', '', 'ĐỘI NGŨ NHÂN VIÊN GIỎI', 'TEAM EMPLOYEES', '', 'ĐỘI NGŨ NHÂN VIÊN GIỎI', 'TEAM EMPLOYEES', NULL, 0, 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(6, 1, 3, 'DỊCH VỤ CHUYÊN NGHIỆP', 'PROFESSIONAL SERVICE', '', '', '', '', '<p>C&aacute;c sản phẩm DETON ch&iacute;nh h&atilde;ng sẽ được C&ocirc;ng ty Đức Việt bảo h&agrave;nh bảo tr&igrave; tr&ecirc;n to&agrave;n quốc theo đ&uacute;ng y&ecirc;u cầu của kh&aacute;ch h&agrave;ng với thời hạn BẢO H&Agrave;NH d&agrave;i hạn 36 TH&Aacute;NG</p>\r\n\r\n<ul>\r\n	<li>Thời gian giao h&agrave;ng nhanh nhất,</li>\r\n	<li>H&otilde; trợ lắp r&aacute;p, lắp đặt mọi l&uacute;c mọi nơi..</li>\r\n	<li>C&aacute;c sản phẩm Deton ch&iacute;nh h&atilde;ng được d&aacute;n nh&atilde;n TEM CHỐNG H&Agrave;NG GỈA do bộ C&ocirc;ng an cấp.</li>\r\n	<li>C&aacute;c dịch vụ hậu b&aacute;n h&agrave;ng linh hoạt, tạo điều kiện tốt nhất cho Kh&aacute;ch h&agrave;ng.</li>\r\n</ul>', '<p>Genuine DETON products will be warranted and maintained nationwide by Duc Viet Company in accordance with customer requirements with a long-term warranty of 36 months.</p>\r\n\r\n<ul>\r\n	<li>Fastest delivery time,</li>\r\n	<li>Support assembly, installation anytime, anywhere ..</li>\r\n	<li>Genuine Deton products are labeled with a STANDARD STAMFF by the Ministry of Public Security.</li>\r\n	<li>Flexible after-sales services, creating the best conditions for customers.</li>\r\n</ul>', '', '', '', '', 'dich-vu-chuyen-nghiep', '', 4, '1584945930_16.jpg', NULL, NULL, 'datafiles', 1584945930, 0, 1, 1, 0, 0, 'DỊCH VỤ CHUYÊN NGHIỆP', 'PROFESSIONAL SERVICE', '', 'DỊCH VỤ CHUYÊN NGHIỆP', 'PROFESSIONAL SERVICE', '', 'DỊCH VỤ CHUYÊN NGHIỆP', 'PROFESSIONAL SERVICE', NULL, 0, 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(7, 1, 4, 'Khách hàng', 'Customer', '', '', '', '', '', '', '', '', '', '', 'khach-hang-17', '', 1, '1584945987_1.jpg', NULL, NULL, 'datafiles', 1584945987, 0, 1, 1, 0, 0, 'Khách hàng', 'Customer', '', 'Khách hàng', 'Customer', '', 'Khách hàng', 'Customer', NULL, 0, 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(8, 1, 4, 'Khách hàng', 'Customer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'khach-hang-17-cp-367771584946002', NULL, 2, '1584946033_9.jpg', NULL, NULL, 'datafiles', 1584945987, 0, 1, 1, 0, 0, 'Khách hàng', 'Customer', NULL, 'Khách hàng', 'Customer', NULL, 'Khách hàng', 'Customer', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 1, 4, 'Khách hàng', 'Customer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'khach-hang-17-cp-399681584946020', NULL, 3, '1584946033_8.jpg', NULL, NULL, 'datafiles', 1584945987, 0, 1, 1, 0, 0, 'Khách hàng', 'Customer', NULL, 'Khách hàng', 'Customer', NULL, 'Khách hàng', 'Customer', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 1, 4, 'Khách hàng', 'Customer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'khach-hang-17-cp-538451584946020', NULL, 4, '1584946033_7.jpg', NULL, NULL, 'datafiles', 1584945987, 0, 1, 1, 0, 0, 'Khách hàng', 'Customer', NULL, 'Khách hàng', 'Customer', NULL, 'Khách hàng', 'Customer', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 1, 4, 'Khách hàng', 'Customer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'khach-hang-17-cp-450591584946020', NULL, 5, '1584946033_6.jpg', NULL, NULL, 'datafiles', 1584945987, 0, 1, 1, 0, 0, 'Khách hàng', 'Customer', NULL, 'Khách hàng', 'Customer', NULL, 'Khách hàng', 'Customer', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 1, 4, 'Khách hàng', 'Customer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'khach-hang-17-cp-154651584946020', NULL, 6, '1584946033_5.jpg', NULL, NULL, 'datafiles', 1584945987, 0, 1, 1, 0, 0, 'Khách hàng', 'Customer', NULL, 'Khách hàng', 'Customer', NULL, 'Khách hàng', 'Customer', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 1, 4, 'Khách hàng', 'Customer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'khach-hang-17-cp-415101584946020', NULL, 7, '1584946033_4.jpg', NULL, NULL, 'datafiles', 1584945987, 0, 1, 1, 0, 0, 'Khách hàng', 'Customer', NULL, 'Khách hàng', 'Customer', NULL, 'Khách hàng', 'Customer', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 1, 4, 'Khách hàng', 'Customer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'khach-hang-17-cp-856811584946020', NULL, 8, '1584946033_3.jpg', NULL, NULL, 'datafiles', 1584945987, 0, 1, 1, 0, 0, 'Khách hàng', 'Customer', NULL, 'Khách hàng', 'Customer', NULL, 'Khách hàng', 'Customer', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 1, 0, 'Bảo Dưỡng', 'Maintenance', '', '', '', '', '<p>C&ocirc;ng ty TNHH C&ocirc;ng nghiệp v&agrave; Thương mại Đức Việt chuy&ecirc;n hoạt động trong lĩnh vực Sản xuất, kinh doanh, thiết kế, lắp đặt c&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi cấp kh&iacute; sạch, tạo &aacute;p điều h&ograve;a kh&ocirc;ng kh&iacute;&hellip; cho c&aacute;c nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng.<br />\r\nC&ocirc;ng ty đ&atilde; mở rộng, x&acirc;y dựng v&agrave; ph&aacute;t triển nh&agrave; m&aacute;y sản xuất, lắp r&aacute;p Quạt c&ocirc;ng nghiệp được vận h&agrave;nh theo Hệ thống quản l&yacute; chất lượng ISO 9001-2008 tại Khu c&ocirc;ng nghiệp Ho&agrave;ng Mai &ndash; H&agrave; Nội.</p>\r\n\r\n<h2>TIỀM NĂNG V&Agrave; THẾ MẠNH VƯỢT TRỘI</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt l&agrave; nh&agrave; sản xuất cung cấp v&agrave; ph&acirc;n phối độc quyền c&aacute;c sản phẩm mang thương hiệu DETON tr&ecirc;n l&atilde;nh thổ Việt Nam trong nhiều năm qua bao gồm: &ndash; C&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi, cấp kh&iacute; sạch, tạo &aacute;p điều ho&agrave; kh&ocirc;ng kh&iacute;&hellip; cho nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng, khu chế xuất,&hellip; tr&ecirc;n to&agrave;n quốc.<br />\r\nTrong nhiều năm qua, ch&uacute;ng t&ocirc;i li&ecirc;n tục d&agrave;nh được c&aacute;c giải thưởng lớn: Huy Chương V&agrave;ng cho Sản phẩm Quạt c&ocirc;ng nghiệp v&agrave; Cup V&agrave;ng ghi nhận l&agrave; doanh nghiệp xuất sắc ti&ecirc;u biểu tại Hội chợ thương mại quốc tế Việt Nam (Việt Nam EXPO 2011)..vv.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>DỊCH VỤ</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt đ&atilde; ph&aacute;t triển hệ thống ph&acirc;n phối tr&ecirc;n hầu hết c&aacute;c tỉnh th&agrave;nh, hệ thống bảo h&agrave;nh tr&ecirc;n to&agrave;n quốc cũng đang ho&agrave;n thiện nhằm đảm bảo mọi quyền lợi của kh&aacute;ch h&agrave;ng.<br />\r\nC&ocirc;ng ty Đức Việt cung cấp đầy đủ c&aacute;c giải ph&aacute;p kỹ thuật, tư vấn v&agrave; bảo h&agrave;nh cho mọi dự &aacute;n của doanh nghiệp. Ti&ecirc;u ch&iacute; h&agrave;ng đầu của c&ocirc;ng ty l&agrave; tập trung v&agrave;o việc cung cấp c&aacute;c gi&aacute; trị gia tăng, c&aacute;c giải ph&aacute;p về sản phẩm cho kh&aacute;ch h&agrave;ng trong lĩnh vực l&agrave;m m&aacute;t, th&ocirc;ng gi&oacute; v&agrave; điều &aacute;p.</p>\r\n\r\n<h2>MỤC TI&Ecirc;U</h2>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n hướng tới sự ho&agrave;n thiện, kh&ocirc;ng ngừng đầu tư m&aacute;y m&oacute;c thiết bị v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến, chăm s&oacute;c đ&agrave;o tạo đội ngũ chất x&aacute;m, c&ocirc;ng nh&acirc;n l&agrave;nh nghề v&agrave; to&agrave;n bộ lao động để C&ocirc;ng ty Đức Việt l&agrave; một tập thể vững mạnh vươn l&ecirc;n vững chắc, ho&agrave; nhập v&agrave;o sự ph&aacute;t triển chung của đất nước.</p>', '<p>Duc Viet Industry and Trading Co., Ltd specializes in manufacturing, trading, designing and installing all kinds of industrial fans, misting system, cooling, vacuuming clean air supply, pressurizing. air conditioning ... for factories, works, workshops.<br />\r\nThe company has expanded, built and developed a factory to manufacture and assemble industrial fans operated by ISO 9001-2008 Quality Management System in Hoang Mai Industrial Park - Hanoi.</p>\r\n\r\n<h2>POTENTIAL AND POWERFUL</h2>\r\n\r\n<p>Duc Viet Company is an exclusive manufacturer and distributor of DETON branded products in Vietnam for many years, including: - Industrial fans, misting, cooling and suction systems dust, clean air supply, creating air conditioners ... for factories, constructions, factories, export processing zones, ... nationwide.<br />\r\nFor many years, we have continuously won great awards: the Gold Medal for Industrial Fan Products and the Gold Cup as a typical outstanding enterprise at Vietnam International Trade Fair (Vietnam EXPO). 2011) .. etc.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>SERVICE</h2>\r\n\r\n<p>Duc Viet has developed a distribution system in most provinces, a nationwide warranty system is also completed to ensure all the interests of customers.<br />\r\nDuc Viet Company provides a full range of technical solutions, advice and warranty for all projects of the business. The company&#39;s primary focus is on providing value-added, product solutions to customers in the areas of cooling, ventilation and pressurization.</p>\r\n\r\n<h2>TARGET</h2>\r\n\r\n<p>We are always aiming to complete, constantly invest in advanced machinery and equipment, take care of and train the gray matter team, skilled workers and all employees to make Duc Viet Company a collective. strong and steady rise, integration into the common development of the country.</p>', '', '', '', '', 'bao-duong', '', 1, NULL, NULL, NULL, 'datafiles', 1584946414, 0, 2, 3, 0, 0, 'Bảo Dưỡng', 'Maintenance', '', 'Bảo Dưỡng', 'Maintenance', '', 'Bảo Dưỡng', 'Maintenance', NULL, 0, 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(16, 1, 0, 'Bảo Hành', 'Guarantee', '', '', '', '', '<p>C&ocirc;ng ty TNHH C&ocirc;ng nghiệp v&agrave; Thương mại Đức Việt chuy&ecirc;n hoạt động trong lĩnh vực Sản xuất, kinh doanh, thiết kế, lắp đặt c&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi cấp kh&iacute; sạch, tạo &aacute;p điều h&ograve;a kh&ocirc;ng kh&iacute;&hellip; cho c&aacute;c nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng.<br />\r\nC&ocirc;ng ty đ&atilde; mở rộng, x&acirc;y dựng v&agrave; ph&aacute;t triển nh&agrave; m&aacute;y sản xuất, lắp r&aacute;p Quạt c&ocirc;ng nghiệp được vận h&agrave;nh theo Hệ thống quản l&yacute; chất lượng ISO 9001-2008 tại Khu c&ocirc;ng nghiệp Ho&agrave;ng Mai &ndash; H&agrave; Nội.</p>\r\n\r\n<h2>TIỀM NĂNG V&Agrave; THẾ MẠNH VƯỢT TRỘI</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt l&agrave; nh&agrave; sản xuất cung cấp v&agrave; ph&acirc;n phối độc quyền c&aacute;c sản phẩm mang thương hiệu DETON tr&ecirc;n l&atilde;nh thổ Việt Nam trong nhiều năm qua bao gồm: &ndash; C&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi, cấp kh&iacute; sạch, tạo &aacute;p điều ho&agrave; kh&ocirc;ng kh&iacute;&hellip; cho nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng, khu chế xuất,&hellip; tr&ecirc;n to&agrave;n quốc.<br />\r\nTrong nhiều năm qua, ch&uacute;ng t&ocirc;i li&ecirc;n tục d&agrave;nh được c&aacute;c giải thưởng lớn: Huy Chương V&agrave;ng cho Sản phẩm Quạt c&ocirc;ng nghiệp v&agrave; Cup V&agrave;ng ghi nhận l&agrave; doanh nghiệp xuất sắc ti&ecirc;u biểu tại Hội chợ thương mại quốc tế Việt Nam (Việt Nam EXPO 2011)..vv.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>DỊCH VỤ</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt đ&atilde; ph&aacute;t triển hệ thống ph&acirc;n phối tr&ecirc;n hầu hết c&aacute;c tỉnh th&agrave;nh, hệ thống bảo h&agrave;nh tr&ecirc;n to&agrave;n quốc cũng đang ho&agrave;n thiện nhằm đảm bảo mọi quyền lợi của kh&aacute;ch h&agrave;ng.<br />\r\nC&ocirc;ng ty Đức Việt cung cấp đầy đủ c&aacute;c giải ph&aacute;p kỹ thuật, tư vấn v&agrave; bảo h&agrave;nh cho mọi dự &aacute;n của doanh nghiệp. Ti&ecirc;u ch&iacute; h&agrave;ng đầu của c&ocirc;ng ty l&agrave; tập trung v&agrave;o việc cung cấp c&aacute;c gi&aacute; trị gia tăng, c&aacute;c giải ph&aacute;p về sản phẩm cho kh&aacute;ch h&agrave;ng trong lĩnh vực l&agrave;m m&aacute;t, th&ocirc;ng gi&oacute; v&agrave; điều &aacute;p.</p>\r\n\r\n<h2>MỤC TI&Ecirc;U</h2>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n hướng tới sự ho&agrave;n thiện, kh&ocirc;ng ngừng đầu tư m&aacute;y m&oacute;c thiết bị v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến, chăm s&oacute;c đ&agrave;o tạo đội ngũ chất x&aacute;m, c&ocirc;ng nh&acirc;n l&agrave;nh nghề v&agrave; to&agrave;n bộ lao động để C&ocirc;ng ty Đức Việt l&agrave; một tập thể vững mạnh vươn l&ecirc;n vững chắc, ho&agrave; nhập v&agrave;o sự ph&aacute;t triển chung của đất nước.</p>', '<p>Duc Viet Industry and Trading Co., Ltd specializes in manufacturing, trading, designing and installing all kinds of industrial fans, misting system, cooling, vacuuming clean air supply, pressurizing. air conditioning ... for factories, works, workshops.<br />\r\nThe company has expanded, built and developed a factory to manufacture and assemble industrial fans operated by ISO 9001-2008 Quality Management System in Hoang Mai Industrial Park - Hanoi.</p>\r\n\r\n<h2>POTENTIAL AND POWERFUL</h2>\r\n\r\n<p>Duc Viet Company is an exclusive manufacturer and distributor of DETON branded products in Vietnam for many years, including: - Industrial fans, misting, cooling and suction systems dust, clean air supply, creating air conditioners ... for factories, constructions, factories, export processing zones, ... nationwide.<br />\r\nFor many years, we have continuously won great awards: the Gold Medal for Industrial Fan Products and the Gold Cup as a typical outstanding enterprise at Vietnam International Trade Fair (Vietnam EXPO). 2011) .. etc.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>SERVICE</h2>\r\n\r\n<p>Duc Viet has developed a distribution system in most provinces, a nationwide warranty system is also completed to ensure all the interests of customers.<br />\r\nDuc Viet Company provides a full range of technical solutions, advice and warranty for all projects of the business. The company&#39;s primary focus is on providing value-added, product solutions to customers in the areas of cooling, ventilation and pressurization.</p>\r\n\r\n<h2>TARGET</h2>\r\n\r\n<p>We are always aiming to complete, constantly invest in advanced machinery and equipment, take care of and train the gray matter team, skilled workers and all employees to make Duc Viet Company a collective. strong and steady rise, integration into the common development of the country.</p>', '', '', '', '', 'bao-hanh', '', 2, '', NULL, NULL, 'datafiles', 1584948435, 0, 2, 3, 0, 0, 'Bảo Hành', 'Guarantee', '', 'Bảo Hành', 'Guarantee', '', 'Bảo Hành', 'Guarantee', NULL, 0, 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(17, 1, 5, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', '', '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', '', '<p>C&ocirc;ng ty TNHH C&ocirc;ng nghiệp v&agrave; Thương mại Đức Việt chuy&ecirc;n hoạt động trong lĩnh vực Sản xuất, kinh doanh, thiết kế, lắp đặt c&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi cấp kh&iacute; sạch, tạo &aacute;p điều h&ograve;a kh&ocirc;ng kh&iacute;&hellip; cho c&aacute;c nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng.<br />\r\nC&ocirc;ng ty đ&atilde; mở rộng, x&acirc;y dựng v&agrave; ph&aacute;t triển nh&agrave; m&aacute;y sản xuất, lắp r&aacute;p Quạt c&ocirc;ng nghiệp được vận h&agrave;nh theo Hệ thống quản l&yacute; chất lượng ISO 9001-2008 tại Khu c&ocirc;ng nghiệp Ho&agrave;ng Mai &ndash; H&agrave; Nội.</p>\r\n\r\n<h2>TIỀM NĂNG V&Agrave; THẾ MẠNH VƯỢT TRỘI</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt l&agrave; nh&agrave; sản xuất cung cấp v&agrave; ph&acirc;n phối độc quyền c&aacute;c sản phẩm mang thương hiệu DETON tr&ecirc;n l&atilde;nh thổ Việt Nam trong nhiều năm qua bao gồm: &ndash; C&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi, cấp kh&iacute; sạch, tạo &aacute;p điều ho&agrave; kh&ocirc;ng kh&iacute;&hellip; cho nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng, khu chế xuất,&hellip; tr&ecirc;n to&agrave;n quốc.<br />\r\nTrong nhiều năm qua, ch&uacute;ng t&ocirc;i li&ecirc;n tục d&agrave;nh được c&aacute;c giải thưởng lớn: Huy Chương V&agrave;ng cho Sản phẩm Quạt c&ocirc;ng nghiệp v&agrave; Cup V&agrave;ng ghi nhận l&agrave; doanh nghiệp xuất sắc ti&ecirc;u biểu tại Hội chợ thương mại quốc tế Việt Nam (Việt Nam EXPO 2011)..vv.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>DỊCH VỤ</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt đ&atilde; ph&aacute;t triển hệ thống ph&acirc;n phối tr&ecirc;n hầu hết c&aacute;c tỉnh th&agrave;nh, hệ thống bảo h&agrave;nh tr&ecirc;n to&agrave;n quốc cũng đang ho&agrave;n thiện nhằm đảm bảo mọi quyền lợi của kh&aacute;ch h&agrave;ng.<br />\r\nC&ocirc;ng ty Đức Việt cung cấp đầy đủ c&aacute;c giải ph&aacute;p kỹ thuật, tư vấn v&agrave; bảo h&agrave;nh cho mọi dự &aacute;n của doanh nghiệp. Ti&ecirc;u ch&iacute; h&agrave;ng đầu của c&ocirc;ng ty l&agrave; tập trung v&agrave;o việc cung cấp c&aacute;c gi&aacute; trị gia tăng, c&aacute;c giải ph&aacute;p về sản phẩm cho kh&aacute;ch h&agrave;ng trong lĩnh vực l&agrave;m m&aacute;t, th&ocirc;ng gi&oacute; v&agrave; điều &aacute;p.</p>\r\n\r\n<h2>MỤC TI&Ecirc;U</h2>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n hướng tới sự ho&agrave;n thiện, kh&ocirc;ng ngừng đầu tư m&aacute;y m&oacute;c thiết bị v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến, chăm s&oacute;c đ&agrave;o tạo đội ngũ chất x&aacute;m, c&ocirc;ng nh&acirc;n l&agrave;nh nghề v&agrave; to&agrave;n bộ lao động để C&ocirc;ng ty Đức Việt l&agrave; một tập thể vững mạnh vươn l&ecirc;n vững chắc, ho&agrave; nhập v&agrave;o sự ph&aacute;t triển chung của đất nước.</p>', '<p>Duc Viet Industry and Trading Co., Ltd specializes in manufacturing, trading, designing and installing all kinds of industrial fans, misting system, cooling, vacuuming clean air supply, pressurizing. air conditioning ... for factories, works, workshops.<br />\r\nThe company has expanded, built and developed a factory to manufacture and assemble industrial fans operated by ISO 9001-2008 Quality Management System in Hoang Mai Industrial Park - Hanoi.</p>\r\n\r\n<h2>POTENTIAL AND POWERFUL</h2>\r\n\r\n<p>Duc Viet Company is an exclusive manufacturer and distributor of DETON branded products in Vietnam for many years, including: - Industrial fans, misting, cooling and suction systems dust, clean air supply, creating air conditioners ... for factories, constructions, factories, export processing zones, ... nationwide.<br />\r\nFor many years, we have continuously won great awards: the Gold Medal for Industrial Fan Products and the Gold Cup as a typical outstanding enterprise at Vietnam International Trade Fair (Vietnam EXPO). 2011) .. etc.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>SERVICE</h2>\r\n\r\n<p>Duc Viet has developed a distribution system in most provinces, a nationwide warranty system is also completed to ensure all the interests of customers.<br />\r\nDuc Viet Company provides a full range of technical solutions, advice and warranty for all projects of the business. The company&#39;s primary focus is on providing value-added, product solutions to customers in the areas of cooling, ventilation and pressurization.</p>\r\n\r\n<h2>TARGET</h2>\r\n\r\n<p>We are always aiming to complete, constantly invest in advanced machinery and equipment, take care of and train the gray matter team, skilled workers and all employees to make Duc Viet Company a collective. strong and steady rise, integration into the common development of the country.</p>', '', '', '', '', 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong', '', 1, '1584946557_10.jpg', NULL, NULL, 'datafiles', 1584946523, 0, 1, 4, 0, 0, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', '', 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', '', 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 0, 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(18, 1, 5, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', NULL, '<p>C&ocirc;ng ty TNHH C&ocirc;ng nghiệp v&agrave; Thương mại Đức Việt chuy&ecirc;n hoạt động trong lĩnh vực Sản xuất, kinh doanh, thiết kế, lắp đặt c&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi cấp kh&iacute; sạch, tạo &aacute;p điều h&ograve;a kh&ocirc;ng kh&iacute;&hellip; cho c&aacute;c nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng.<br />\r\nC&ocirc;ng ty đ&atilde; mở rộng, x&acirc;y dựng v&agrave; ph&aacute;t triển nh&agrave; m&aacute;y sản xuất, lắp r&aacute;p Quạt c&ocirc;ng nghiệp được vận h&agrave;nh theo Hệ thống quản l&yacute; chất lượng ISO 9001-2008 tại Khu c&ocirc;ng nghiệp Ho&agrave;ng Mai &ndash; H&agrave; Nội.</p>\r\n\r\n<h2>TIỀM NĂNG V&Agrave; THẾ MẠNH VƯỢT TRỘI</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt l&agrave; nh&agrave; sản xuất cung cấp v&agrave; ph&acirc;n phối độc quyền c&aacute;c sản phẩm mang thương hiệu DETON tr&ecirc;n l&atilde;nh thổ Việt Nam trong nhiều năm qua bao gồm: &ndash; C&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi, cấp kh&iacute; sạch, tạo &aacute;p điều ho&agrave; kh&ocirc;ng kh&iacute;&hellip; cho nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng, khu chế xuất,&hellip; tr&ecirc;n to&agrave;n quốc.<br />\r\nTrong nhiều năm qua, ch&uacute;ng t&ocirc;i li&ecirc;n tục d&agrave;nh được c&aacute;c giải thưởng lớn: Huy Chương V&agrave;ng cho Sản phẩm Quạt c&ocirc;ng nghiệp v&agrave; Cup V&agrave;ng ghi nhận l&agrave; doanh nghiệp xuất sắc ti&ecirc;u biểu tại Hội chợ thương mại quốc tế Việt Nam (Việt Nam EXPO 2011)..vv.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>DỊCH VỤ</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt đ&atilde; ph&aacute;t triển hệ thống ph&acirc;n phối tr&ecirc;n hầu hết c&aacute;c tỉnh th&agrave;nh, hệ thống bảo h&agrave;nh tr&ecirc;n to&agrave;n quốc cũng đang ho&agrave;n thiện nhằm đảm bảo mọi quyền lợi của kh&aacute;ch h&agrave;ng.<br />\r\nC&ocirc;ng ty Đức Việt cung cấp đầy đủ c&aacute;c giải ph&aacute;p kỹ thuật, tư vấn v&agrave; bảo h&agrave;nh cho mọi dự &aacute;n của doanh nghiệp. Ti&ecirc;u ch&iacute; h&agrave;ng đầu của c&ocirc;ng ty l&agrave; tập trung v&agrave;o việc cung cấp c&aacute;c gi&aacute; trị gia tăng, c&aacute;c giải ph&aacute;p về sản phẩm cho kh&aacute;ch h&agrave;ng trong lĩnh vực l&agrave;m m&aacute;t, th&ocirc;ng gi&oacute; v&agrave; điều &aacute;p.</p>\r\n\r\n<h2>MỤC TI&Ecirc;U</h2>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n hướng tới sự ho&agrave;n thiện, kh&ocirc;ng ngừng đầu tư m&aacute;y m&oacute;c thiết bị v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến, chăm s&oacute;c đ&agrave;o tạo đội ngũ chất x&aacute;m, c&ocirc;ng nh&acirc;n l&agrave;nh nghề v&agrave; to&agrave;n bộ lao động để C&ocirc;ng ty Đức Việt l&agrave; một tập thể vững mạnh vươn l&ecirc;n vững chắc, ho&agrave; nhập v&agrave;o sự ph&aacute;t triển chung của đất nước.</p>', '<p>Duc Viet Industry and Trading Co., Ltd specializes in manufacturing, trading, designing and installing all kinds of industrial fans, misting system, cooling, vacuuming clean air supply, pressurizing. air conditioning ... for factories, works, workshops.<br />\r\nThe company has expanded, built and developed a factory to manufacture and assemble industrial fans operated by ISO 9001-2008 Quality Management System in Hoang Mai Industrial Park - Hanoi.</p>\r\n\r\n<h2>POTENTIAL AND POWERFUL</h2>\r\n\r\n<p>Duc Viet Company is an exclusive manufacturer and distributor of DETON branded products in Vietnam for many years, including: - Industrial fans, misting, cooling and suction systems dust, clean air supply, creating air conditioners ... for factories, constructions, factories, export processing zones, ... nationwide.<br />\r\nFor many years, we have continuously won great awards: the Gold Medal for Industrial Fan Products and the Gold Cup as a typical outstanding enterprise at Vietnam International Trade Fair (Vietnam EXPO). 2011) .. etc.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>SERVICE</h2>\r\n\r\n<p>Duc Viet has developed a distribution system in most provinces, a nationwide warranty system is also completed to ensure all the interests of customers.<br />\r\nDuc Viet Company provides a full range of technical solutions, advice and warranty for all projects of the business. The company&#39;s primary focus is on providing value-added, product solutions to customers in the areas of cooling, ventilation and pressurization.</p>\r\n\r\n<h2>TARGET</h2>\r\n\r\n<p>We are always aiming to complete, constantly invest in advanced machinery and equipment, take care of and train the gray matter team, skilled workers and all employees to make Duc Viet Company a collective. strong and steady rise, integration into the common development of the country.</p>', NULL, NULL, NULL, NULL, 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-934251584946539', NULL, 2, '1584946547_12.jpg', NULL, NULL, 'datafiles', 1584946523, 0, 1, 4, 0, 0, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 1, 5, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', NULL, '<p>C&ocirc;ng ty TNHH C&ocirc;ng nghiệp v&agrave; Thương mại Đức Việt chuy&ecirc;n hoạt động trong lĩnh vực Sản xuất, kinh doanh, thiết kế, lắp đặt c&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi cấp kh&iacute; sạch, tạo &aacute;p điều h&ograve;a kh&ocirc;ng kh&iacute;&hellip; cho c&aacute;c nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng.<br />\r\nC&ocirc;ng ty đ&atilde; mở rộng, x&acirc;y dựng v&agrave; ph&aacute;t triển nh&agrave; m&aacute;y sản xuất, lắp r&aacute;p Quạt c&ocirc;ng nghiệp được vận h&agrave;nh theo Hệ thống quản l&yacute; chất lượng ISO 9001-2008 tại Khu c&ocirc;ng nghiệp Ho&agrave;ng Mai &ndash; H&agrave; Nội.</p>\r\n\r\n<h2>TIỀM NĂNG V&Agrave; THẾ MẠNH VƯỢT TRỘI</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt l&agrave; nh&agrave; sản xuất cung cấp v&agrave; ph&acirc;n phối độc quyền c&aacute;c sản phẩm mang thương hiệu DETON tr&ecirc;n l&atilde;nh thổ Việt Nam trong nhiều năm qua bao gồm: &ndash; C&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi, cấp kh&iacute; sạch, tạo &aacute;p điều ho&agrave; kh&ocirc;ng kh&iacute;&hellip; cho nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng, khu chế xuất,&hellip; tr&ecirc;n to&agrave;n quốc.<br />\r\nTrong nhiều năm qua, ch&uacute;ng t&ocirc;i li&ecirc;n tục d&agrave;nh được c&aacute;c giải thưởng lớn: Huy Chương V&agrave;ng cho Sản phẩm Quạt c&ocirc;ng nghiệp v&agrave; Cup V&agrave;ng ghi nhận l&agrave; doanh nghiệp xuất sắc ti&ecirc;u biểu tại Hội chợ thương mại quốc tế Việt Nam (Việt Nam EXPO 2011)..vv.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>DỊCH VỤ</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt đ&atilde; ph&aacute;t triển hệ thống ph&acirc;n phối tr&ecirc;n hầu hết c&aacute;c tỉnh th&agrave;nh, hệ thống bảo h&agrave;nh tr&ecirc;n to&agrave;n quốc cũng đang ho&agrave;n thiện nhằm đảm bảo mọi quyền lợi của kh&aacute;ch h&agrave;ng.<br />\r\nC&ocirc;ng ty Đức Việt cung cấp đầy đủ c&aacute;c giải ph&aacute;p kỹ thuật, tư vấn v&agrave; bảo h&agrave;nh cho mọi dự &aacute;n của doanh nghiệp. Ti&ecirc;u ch&iacute; h&agrave;ng đầu của c&ocirc;ng ty l&agrave; tập trung v&agrave;o việc cung cấp c&aacute;c gi&aacute; trị gia tăng, c&aacute;c giải ph&aacute;p về sản phẩm cho kh&aacute;ch h&agrave;ng trong lĩnh vực l&agrave;m m&aacute;t, th&ocirc;ng gi&oacute; v&agrave; điều &aacute;p.</p>\r\n\r\n<h2>MỤC TI&Ecirc;U</h2>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n hướng tới sự ho&agrave;n thiện, kh&ocirc;ng ngừng đầu tư m&aacute;y m&oacute;c thiết bị v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến, chăm s&oacute;c đ&agrave;o tạo đội ngũ chất x&aacute;m, c&ocirc;ng nh&acirc;n l&agrave;nh nghề v&agrave; to&agrave;n bộ lao động để C&ocirc;ng ty Đức Việt l&agrave; một tập thể vững mạnh vươn l&ecirc;n vững chắc, ho&agrave; nhập v&agrave;o sự ph&aacute;t triển chung của đất nước.</p>', '<p>Duc Viet Industry and Trading Co., Ltd specializes in manufacturing, trading, designing and installing all kinds of industrial fans, misting system, cooling, vacuuming clean air supply, pressurizing. air conditioning ... for factories, works, workshops.<br />\r\nThe company has expanded, built and developed a factory to manufacture and assemble industrial fans operated by ISO 9001-2008 Quality Management System in Hoang Mai Industrial Park - Hanoi.</p>\r\n\r\n<h2>POTENTIAL AND POWERFUL</h2>\r\n\r\n<p>Duc Viet Company is an exclusive manufacturer and distributor of DETON branded products in Vietnam for many years, including: - Industrial fans, misting, cooling and suction systems dust, clean air supply, creating air conditioners ... for factories, constructions, factories, export processing zones, ... nationwide.<br />\r\nFor many years, we have continuously won great awards: the Gold Medal for Industrial Fan Products and the Gold Cup as a typical outstanding enterprise at Vietnam International Trade Fair (Vietnam EXPO). 2011) .. etc.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>SERVICE</h2>\r\n\r\n<p>Duc Viet has developed a distribution system in most provinces, a nationwide warranty system is also completed to ensure all the interests of customers.<br />\r\nDuc Viet Company provides a full range of technical solutions, advice and warranty for all projects of the business. The company&#39;s primary focus is on providing value-added, product solutions to customers in the areas of cooling, ventilation and pressurization.</p>\r\n\r\n<h2>TARGET</h2>\r\n\r\n<p>We are always aiming to complete, constantly invest in advanced machinery and equipment, take care of and train the gray matter team, skilled workers and all employees to make Duc Viet Company a collective. strong and steady rise, integration into the common development of the country.</p>', NULL, NULL, NULL, NULL, 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-531281584946540', NULL, 3, '1584946547_11.jpg', NULL, NULL, 'datafiles', 1584946523, 0, 2, 4, 0, 0, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `lh_baiviet` (`id`, `id_user`, `id_parent`, `tenbaiviet_vi`, `tenbaiviet_en`, `tenbaiviet_cn`, `mota_vi`, `mota_en`, `mota_cn`, `noidung_vi`, `noidung_en`, `noidung_cn`, `tags_vi`, `tags_en`, `tags_cn`, `seo_name`, `id_parent_muti`, `catasort`, `icon`, `icon_hover`, `dowload`, `duongdantin`, `ngaydang`, `capnhat`, `soluotxem`, `step`, `giatien`, `giakm`, `seo_title_vi`, `seo_title_en`, `seo_title_cn`, `seo_keywords_vi`, `seo_keywords_en`, `seo_keywords_cn`, `seo_description_vi`, `seo_description_en`, `seo_description_cn`, `opt_km`, `opt`, `opt1`, `opt2`, `top_video`, `p1`, `p2`, `p3`, `link_video`, `num_1`, `num_2`, `num_3`, `showhi`, `tinh_nang`, `thuoc_tinh_1_vi`, `thuoc_tinh_1_en`, `thuoc_tinh_2_vi`, `thuoc_tinh_2_en`, `thuoc_tinh_3_vi`, `thuoc_tinh_3_en`, `gia_tri_1_vi`, `gia_tri_1_en`, `gia_tri_2_vi`, `gia_tri_2_en`, `gia_tri_3_vi`, `gia_tri_3_en`, `thongso_vi`, `thongso_en`) VALUES
(20, 1, 5, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', NULL, '<p>C&ocirc;ng ty TNHH C&ocirc;ng nghiệp v&agrave; Thương mại Đức Việt chuy&ecirc;n hoạt động trong lĩnh vực Sản xuất, kinh doanh, thiết kế, lắp đặt c&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi cấp kh&iacute; sạch, tạo &aacute;p điều h&ograve;a kh&ocirc;ng kh&iacute;&hellip; cho c&aacute;c nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng.<br />\r\nC&ocirc;ng ty đ&atilde; mở rộng, x&acirc;y dựng v&agrave; ph&aacute;t triển nh&agrave; m&aacute;y sản xuất, lắp r&aacute;p Quạt c&ocirc;ng nghiệp được vận h&agrave;nh theo Hệ thống quản l&yacute; chất lượng ISO 9001-2008 tại Khu c&ocirc;ng nghiệp Ho&agrave;ng Mai &ndash; H&agrave; Nội.</p>\r\n\r\n<h2>TIỀM NĂNG V&Agrave; THẾ MẠNH VƯỢT TRỘI</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt l&agrave; nh&agrave; sản xuất cung cấp v&agrave; ph&acirc;n phối độc quyền c&aacute;c sản phẩm mang thương hiệu DETON tr&ecirc;n l&atilde;nh thổ Việt Nam trong nhiều năm qua bao gồm: &ndash; C&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi, cấp kh&iacute; sạch, tạo &aacute;p điều ho&agrave; kh&ocirc;ng kh&iacute;&hellip; cho nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng, khu chế xuất,&hellip; tr&ecirc;n to&agrave;n quốc.<br />\r\nTrong nhiều năm qua, ch&uacute;ng t&ocirc;i li&ecirc;n tục d&agrave;nh được c&aacute;c giải thưởng lớn: Huy Chương V&agrave;ng cho Sản phẩm Quạt c&ocirc;ng nghiệp v&agrave; Cup V&agrave;ng ghi nhận l&agrave; doanh nghiệp xuất sắc ti&ecirc;u biểu tại Hội chợ thương mại quốc tế Việt Nam (Việt Nam EXPO 2011)..vv.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>DỊCH VỤ</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt đ&atilde; ph&aacute;t triển hệ thống ph&acirc;n phối tr&ecirc;n hầu hết c&aacute;c tỉnh th&agrave;nh, hệ thống bảo h&agrave;nh tr&ecirc;n to&agrave;n quốc cũng đang ho&agrave;n thiện nhằm đảm bảo mọi quyền lợi của kh&aacute;ch h&agrave;ng.<br />\r\nC&ocirc;ng ty Đức Việt cung cấp đầy đủ c&aacute;c giải ph&aacute;p kỹ thuật, tư vấn v&agrave; bảo h&agrave;nh cho mọi dự &aacute;n của doanh nghiệp. Ti&ecirc;u ch&iacute; h&agrave;ng đầu của c&ocirc;ng ty l&agrave; tập trung v&agrave;o việc cung cấp c&aacute;c gi&aacute; trị gia tăng, c&aacute;c giải ph&aacute;p về sản phẩm cho kh&aacute;ch h&agrave;ng trong lĩnh vực l&agrave;m m&aacute;t, th&ocirc;ng gi&oacute; v&agrave; điều &aacute;p.</p>\r\n\r\n<h2>MỤC TI&Ecirc;U</h2>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n hướng tới sự ho&agrave;n thiện, kh&ocirc;ng ngừng đầu tư m&aacute;y m&oacute;c thiết bị v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến, chăm s&oacute;c đ&agrave;o tạo đội ngũ chất x&aacute;m, c&ocirc;ng nh&acirc;n l&agrave;nh nghề v&agrave; to&agrave;n bộ lao động để C&ocirc;ng ty Đức Việt l&agrave; một tập thể vững mạnh vươn l&ecirc;n vững chắc, ho&agrave; nhập v&agrave;o sự ph&aacute;t triển chung của đất nước.</p>', '<p>Duc Viet Industry and Trading Co., Ltd specializes in manufacturing, trading, designing and installing all kinds of industrial fans, misting system, cooling, vacuuming clean air supply, pressurizing. air conditioning ... for factories, works, workshops.<br />\r\nThe company has expanded, built and developed a factory to manufacture and assemble industrial fans operated by ISO 9001-2008 Quality Management System in Hoang Mai Industrial Park - Hanoi.</p>\r\n\r\n<h2>POTENTIAL AND POWERFUL</h2>\r\n\r\n<p>Duc Viet Company is an exclusive manufacturer and distributor of DETON branded products in Vietnam for many years, including: - Industrial fans, misting, cooling and suction systems dust, clean air supply, creating air conditioners ... for factories, constructions, factories, export processing zones, ... nationwide.<br />\r\nFor many years, we have continuously won great awards: the Gold Medal for Industrial Fan Products and the Gold Cup as a typical outstanding enterprise at Vietnam International Trade Fair (Vietnam EXPO). 2011) .. etc.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>SERVICE</h2>\r\n\r\n<p>Duc Viet has developed a distribution system in most provinces, a nationwide warranty system is also completed to ensure all the interests of customers.<br />\r\nDuc Viet Company provides a full range of technical solutions, advice and warranty for all projects of the business. The company&#39;s primary focus is on providing value-added, product solutions to customers in the areas of cooling, ventilation and pressurization.</p>\r\n\r\n<h2>TARGET</h2>\r\n\r\n<p>We are always aiming to complete, constantly invest in advanced machinery and equipment, take care of and train the gray matter team, skilled workers and all employees to make Duc Viet Company a collective. strong and steady rise, integration into the common development of the country.</p>', NULL, NULL, NULL, NULL, 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-430871584946540', NULL, 4, '1584946547_10.jpg', NULL, NULL, 'datafiles', 1584946523, 0, 1, 4, 0, 0, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 1, 5, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', NULL, '<p>C&ocirc;ng ty TNHH C&ocirc;ng nghiệp v&agrave; Thương mại Đức Việt chuy&ecirc;n hoạt động trong lĩnh vực Sản xuất, kinh doanh, thiết kế, lắp đặt c&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi cấp kh&iacute; sạch, tạo &aacute;p điều h&ograve;a kh&ocirc;ng kh&iacute;&hellip; cho c&aacute;c nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng.<br />\r\nC&ocirc;ng ty đ&atilde; mở rộng, x&acirc;y dựng v&agrave; ph&aacute;t triển nh&agrave; m&aacute;y sản xuất, lắp r&aacute;p Quạt c&ocirc;ng nghiệp được vận h&agrave;nh theo Hệ thống quản l&yacute; chất lượng ISO 9001-2008 tại Khu c&ocirc;ng nghiệp Ho&agrave;ng Mai &ndash; H&agrave; Nội.</p>\r\n\r\n<h2>TIỀM NĂNG V&Agrave; THẾ MẠNH VƯỢT TRỘI</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt l&agrave; nh&agrave; sản xuất cung cấp v&agrave; ph&acirc;n phối độc quyền c&aacute;c sản phẩm mang thương hiệu DETON tr&ecirc;n l&atilde;nh thổ Việt Nam trong nhiều năm qua bao gồm: &ndash; C&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi, cấp kh&iacute; sạch, tạo &aacute;p điều ho&agrave; kh&ocirc;ng kh&iacute;&hellip; cho nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng, khu chế xuất,&hellip; tr&ecirc;n to&agrave;n quốc.<br />\r\nTrong nhiều năm qua, ch&uacute;ng t&ocirc;i li&ecirc;n tục d&agrave;nh được c&aacute;c giải thưởng lớn: Huy Chương V&agrave;ng cho Sản phẩm Quạt c&ocirc;ng nghiệp v&agrave; Cup V&agrave;ng ghi nhận l&agrave; doanh nghiệp xuất sắc ti&ecirc;u biểu tại Hội chợ thương mại quốc tế Việt Nam (Việt Nam EXPO 2011)..vv.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>DỊCH VỤ</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt đ&atilde; ph&aacute;t triển hệ thống ph&acirc;n phối tr&ecirc;n hầu hết c&aacute;c tỉnh th&agrave;nh, hệ thống bảo h&agrave;nh tr&ecirc;n to&agrave;n quốc cũng đang ho&agrave;n thiện nhằm đảm bảo mọi quyền lợi của kh&aacute;ch h&agrave;ng.<br />\r\nC&ocirc;ng ty Đức Việt cung cấp đầy đủ c&aacute;c giải ph&aacute;p kỹ thuật, tư vấn v&agrave; bảo h&agrave;nh cho mọi dự &aacute;n của doanh nghiệp. Ti&ecirc;u ch&iacute; h&agrave;ng đầu của c&ocirc;ng ty l&agrave; tập trung v&agrave;o việc cung cấp c&aacute;c gi&aacute; trị gia tăng, c&aacute;c giải ph&aacute;p về sản phẩm cho kh&aacute;ch h&agrave;ng trong lĩnh vực l&agrave;m m&aacute;t, th&ocirc;ng gi&oacute; v&agrave; điều &aacute;p.</p>\r\n\r\n<h2>MỤC TI&Ecirc;U</h2>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n hướng tới sự ho&agrave;n thiện, kh&ocirc;ng ngừng đầu tư m&aacute;y m&oacute;c thiết bị v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến, chăm s&oacute;c đ&agrave;o tạo đội ngũ chất x&aacute;m, c&ocirc;ng nh&acirc;n l&agrave;nh nghề v&agrave; to&agrave;n bộ lao động để C&ocirc;ng ty Đức Việt l&agrave; một tập thể vững mạnh vươn l&ecirc;n vững chắc, ho&agrave; nhập v&agrave;o sự ph&aacute;t triển chung của đất nước.</p>', '<p>Duc Viet Industry and Trading Co., Ltd specializes in manufacturing, trading, designing and installing all kinds of industrial fans, misting system, cooling, vacuuming clean air supply, pressurizing. air conditioning ... for factories, works, workshops.<br />\r\nThe company has expanded, built and developed a factory to manufacture and assemble industrial fans operated by ISO 9001-2008 Quality Management System in Hoang Mai Industrial Park - Hanoi.</p>\r\n\r\n<h2>POTENTIAL AND POWERFUL</h2>\r\n\r\n<p>Duc Viet Company is an exclusive manufacturer and distributor of DETON branded products in Vietnam for many years, including: - Industrial fans, misting, cooling and suction systems dust, clean air supply, creating air conditioners ... for factories, constructions, factories, export processing zones, ... nationwide.<br />\r\nFor many years, we have continuously won great awards: the Gold Medal for Industrial Fan Products and the Gold Cup as a typical outstanding enterprise at Vietnam International Trade Fair (Vietnam EXPO). 2011) .. etc.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>SERVICE</h2>\r\n\r\n<p>Duc Viet has developed a distribution system in most provinces, a nationwide warranty system is also completed to ensure all the interests of customers.<br />\r\nDuc Viet Company provides a full range of technical solutions, advice and warranty for all projects of the business. The company&#39;s primary focus is on providing value-added, product solutions to customers in the areas of cooling, ventilation and pressurization.</p>\r\n\r\n<h2>TARGET</h2>\r\n\r\n<p>We are always aiming to complete, constantly invest in advanced machinery and equipment, take care of and train the gray matter team, skilled workers and all employees to make Duc Viet Company a collective. strong and steady rise, integration into the common development of the country.</p>', NULL, NULL, NULL, NULL, 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-776921584946540', NULL, 5, '1584946547_9.jpg', NULL, NULL, 'datafiles', 1584946523, 0, 1, 4, 0, 0, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 1, 5, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', NULL, '<p>C&ocirc;ng ty TNHH C&ocirc;ng nghiệp v&agrave; Thương mại Đức Việt chuy&ecirc;n hoạt động trong lĩnh vực Sản xuất, kinh doanh, thiết kế, lắp đặt c&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi cấp kh&iacute; sạch, tạo &aacute;p điều h&ograve;a kh&ocirc;ng kh&iacute;&hellip; cho c&aacute;c nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng.<br />\r\nC&ocirc;ng ty đ&atilde; mở rộng, x&acirc;y dựng v&agrave; ph&aacute;t triển nh&agrave; m&aacute;y sản xuất, lắp r&aacute;p Quạt c&ocirc;ng nghiệp được vận h&agrave;nh theo Hệ thống quản l&yacute; chất lượng ISO 9001-2008 tại Khu c&ocirc;ng nghiệp Ho&agrave;ng Mai &ndash; H&agrave; Nội.</p>\r\n\r\n<h2>TIỀM NĂNG V&Agrave; THẾ MẠNH VƯỢT TRỘI</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt l&agrave; nh&agrave; sản xuất cung cấp v&agrave; ph&acirc;n phối độc quyền c&aacute;c sản phẩm mang thương hiệu DETON tr&ecirc;n l&atilde;nh thổ Việt Nam trong nhiều năm qua bao gồm: &ndash; C&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi, cấp kh&iacute; sạch, tạo &aacute;p điều ho&agrave; kh&ocirc;ng kh&iacute;&hellip; cho nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng, khu chế xuất,&hellip; tr&ecirc;n to&agrave;n quốc.<br />\r\nTrong nhiều năm qua, ch&uacute;ng t&ocirc;i li&ecirc;n tục d&agrave;nh được c&aacute;c giải thưởng lớn: Huy Chương V&agrave;ng cho Sản phẩm Quạt c&ocirc;ng nghiệp v&agrave; Cup V&agrave;ng ghi nhận l&agrave; doanh nghiệp xuất sắc ti&ecirc;u biểu tại Hội chợ thương mại quốc tế Việt Nam (Việt Nam EXPO 2011)..vv.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>DỊCH VỤ</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt đ&atilde; ph&aacute;t triển hệ thống ph&acirc;n phối tr&ecirc;n hầu hết c&aacute;c tỉnh th&agrave;nh, hệ thống bảo h&agrave;nh tr&ecirc;n to&agrave;n quốc cũng đang ho&agrave;n thiện nhằm đảm bảo mọi quyền lợi của kh&aacute;ch h&agrave;ng.<br />\r\nC&ocirc;ng ty Đức Việt cung cấp đầy đủ c&aacute;c giải ph&aacute;p kỹ thuật, tư vấn v&agrave; bảo h&agrave;nh cho mọi dự &aacute;n của doanh nghiệp. Ti&ecirc;u ch&iacute; h&agrave;ng đầu của c&ocirc;ng ty l&agrave; tập trung v&agrave;o việc cung cấp c&aacute;c gi&aacute; trị gia tăng, c&aacute;c giải ph&aacute;p về sản phẩm cho kh&aacute;ch h&agrave;ng trong lĩnh vực l&agrave;m m&aacute;t, th&ocirc;ng gi&oacute; v&agrave; điều &aacute;p.</p>\r\n\r\n<h2>MỤC TI&Ecirc;U</h2>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n hướng tới sự ho&agrave;n thiện, kh&ocirc;ng ngừng đầu tư m&aacute;y m&oacute;c thiết bị v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến, chăm s&oacute;c đ&agrave;o tạo đội ngũ chất x&aacute;m, c&ocirc;ng nh&acirc;n l&agrave;nh nghề v&agrave; to&agrave;n bộ lao động để C&ocirc;ng ty Đức Việt l&agrave; một tập thể vững mạnh vươn l&ecirc;n vững chắc, ho&agrave; nhập v&agrave;o sự ph&aacute;t triển chung của đất nước.</p>', '<p>Duc Viet Industry and Trading Co., Ltd specializes in manufacturing, trading, designing and installing all kinds of industrial fans, misting system, cooling, vacuuming clean air supply, pressurizing. air conditioning ... for factories, works, workshops.<br />\r\nThe company has expanded, built and developed a factory to manufacture and assemble industrial fans operated by ISO 9001-2008 Quality Management System in Hoang Mai Industrial Park - Hanoi.</p>\r\n\r\n<h2>POTENTIAL AND POWERFUL</h2>\r\n\r\n<p>Duc Viet Company is an exclusive manufacturer and distributor of DETON branded products in Vietnam for many years, including: - Industrial fans, misting, cooling and suction systems dust, clean air supply, creating air conditioners ... for factories, constructions, factories, export processing zones, ... nationwide.<br />\r\nFor many years, we have continuously won great awards: the Gold Medal for Industrial Fan Products and the Gold Cup as a typical outstanding enterprise at Vietnam International Trade Fair (Vietnam EXPO). 2011) .. etc.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>SERVICE</h2>\r\n\r\n<p>Duc Viet has developed a distribution system in most provinces, a nationwide warranty system is also completed to ensure all the interests of customers.<br />\r\nDuc Viet Company provides a full range of technical solutions, advice and warranty for all projects of the business. The company&#39;s primary focus is on providing value-added, product solutions to customers in the areas of cooling, ventilation and pressurization.</p>\r\n\r\n<h2>TARGET</h2>\r\n\r\n<p>We are always aiming to complete, constantly invest in advanced machinery and equipment, take care of and train the gray matter team, skilled workers and all employees to make Duc Viet Company a collective. strong and steady rise, integration into the common development of the country.</p>', NULL, NULL, NULL, NULL, 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-288021584946540', NULL, 6, '1584946547_8.jpg', NULL, NULL, 'datafiles', 1584946523, 0, 1, 4, 0, 0, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 1, 5, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', NULL, '<p>C&ocirc;ng ty TNHH C&ocirc;ng nghiệp v&agrave; Thương mại Đức Việt chuy&ecirc;n hoạt động trong lĩnh vực Sản xuất, kinh doanh, thiết kế, lắp đặt c&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi cấp kh&iacute; sạch, tạo &aacute;p điều h&ograve;a kh&ocirc;ng kh&iacute;&hellip; cho c&aacute;c nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng.<br />\r\nC&ocirc;ng ty đ&atilde; mở rộng, x&acirc;y dựng v&agrave; ph&aacute;t triển nh&agrave; m&aacute;y sản xuất, lắp r&aacute;p Quạt c&ocirc;ng nghiệp được vận h&agrave;nh theo Hệ thống quản l&yacute; chất lượng ISO 9001-2008 tại Khu c&ocirc;ng nghiệp Ho&agrave;ng Mai &ndash; H&agrave; Nội.</p>\r\n\r\n<h2>TIỀM NĂNG V&Agrave; THẾ MẠNH VƯỢT TRỘI</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt l&agrave; nh&agrave; sản xuất cung cấp v&agrave; ph&acirc;n phối độc quyền c&aacute;c sản phẩm mang thương hiệu DETON tr&ecirc;n l&atilde;nh thổ Việt Nam trong nhiều năm qua bao gồm: &ndash; C&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi, cấp kh&iacute; sạch, tạo &aacute;p điều ho&agrave; kh&ocirc;ng kh&iacute;&hellip; cho nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng, khu chế xuất,&hellip; tr&ecirc;n to&agrave;n quốc.<br />\r\nTrong nhiều năm qua, ch&uacute;ng t&ocirc;i li&ecirc;n tục d&agrave;nh được c&aacute;c giải thưởng lớn: Huy Chương V&agrave;ng cho Sản phẩm Quạt c&ocirc;ng nghiệp v&agrave; Cup V&agrave;ng ghi nhận l&agrave; doanh nghiệp xuất sắc ti&ecirc;u biểu tại Hội chợ thương mại quốc tế Việt Nam (Việt Nam EXPO 2011)..vv.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>DỊCH VỤ</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt đ&atilde; ph&aacute;t triển hệ thống ph&acirc;n phối tr&ecirc;n hầu hết c&aacute;c tỉnh th&agrave;nh, hệ thống bảo h&agrave;nh tr&ecirc;n to&agrave;n quốc cũng đang ho&agrave;n thiện nhằm đảm bảo mọi quyền lợi của kh&aacute;ch h&agrave;ng.<br />\r\nC&ocirc;ng ty Đức Việt cung cấp đầy đủ c&aacute;c giải ph&aacute;p kỹ thuật, tư vấn v&agrave; bảo h&agrave;nh cho mọi dự &aacute;n của doanh nghiệp. Ti&ecirc;u ch&iacute; h&agrave;ng đầu của c&ocirc;ng ty l&agrave; tập trung v&agrave;o việc cung cấp c&aacute;c gi&aacute; trị gia tăng, c&aacute;c giải ph&aacute;p về sản phẩm cho kh&aacute;ch h&agrave;ng trong lĩnh vực l&agrave;m m&aacute;t, th&ocirc;ng gi&oacute; v&agrave; điều &aacute;p.</p>\r\n\r\n<h2>MỤC TI&Ecirc;U</h2>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n hướng tới sự ho&agrave;n thiện, kh&ocirc;ng ngừng đầu tư m&aacute;y m&oacute;c thiết bị v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến, chăm s&oacute;c đ&agrave;o tạo đội ngũ chất x&aacute;m, c&ocirc;ng nh&acirc;n l&agrave;nh nghề v&agrave; to&agrave;n bộ lao động để C&ocirc;ng ty Đức Việt l&agrave; một tập thể vững mạnh vươn l&ecirc;n vững chắc, ho&agrave; nhập v&agrave;o sự ph&aacute;t triển chung của đất nước.</p>', '<p>Duc Viet Industry and Trading Co., Ltd specializes in manufacturing, trading, designing and installing all kinds of industrial fans, misting system, cooling, vacuuming clean air supply, pressurizing. air conditioning ... for factories, works, workshops.<br />\r\nThe company has expanded, built and developed a factory to manufacture and assemble industrial fans operated by ISO 9001-2008 Quality Management System in Hoang Mai Industrial Park - Hanoi.</p>\r\n\r\n<h2>POTENTIAL AND POWERFUL</h2>\r\n\r\n<p>Duc Viet Company is an exclusive manufacturer and distributor of DETON branded products in Vietnam for many years, including: - Industrial fans, misting, cooling and suction systems dust, clean air supply, creating air conditioners ... for factories, constructions, factories, export processing zones, ... nationwide.<br />\r\nFor many years, we have continuously won great awards: the Gold Medal for Industrial Fan Products and the Gold Cup as a typical outstanding enterprise at Vietnam International Trade Fair (Vietnam EXPO). 2011) .. etc.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>SERVICE</h2>\r\n\r\n<p>Duc Viet has developed a distribution system in most provinces, a nationwide warranty system is also completed to ensure all the interests of customers.<br />\r\nDuc Viet Company provides a full range of technical solutions, advice and warranty for all projects of the business. The company&#39;s primary focus is on providing value-added, product solutions to customers in the areas of cooling, ventilation and pressurization.</p>\r\n\r\n<h2>TARGET</h2>\r\n\r\n<p>We are always aiming to complete, constantly invest in advanced machinery and equipment, take care of and train the gray matter team, skilled workers and all employees to make Duc Viet Company a collective. strong and steady rise, integration into the common development of the country.</p>', NULL, NULL, NULL, NULL, 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-523731584946540', NULL, 7, '1584946547_7.jpg', NULL, NULL, 'datafiles', 1584946523, 0, 1, 4, 0, 0, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 1, 5, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', NULL, '<p>C&ocirc;ng ty TNHH C&ocirc;ng nghiệp v&agrave; Thương mại Đức Việt chuy&ecirc;n hoạt động trong lĩnh vực Sản xuất, kinh doanh, thiết kế, lắp đặt c&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi cấp kh&iacute; sạch, tạo &aacute;p điều h&ograve;a kh&ocirc;ng kh&iacute;&hellip; cho c&aacute;c nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng.<br />\r\nC&ocirc;ng ty đ&atilde; mở rộng, x&acirc;y dựng v&agrave; ph&aacute;t triển nh&agrave; m&aacute;y sản xuất, lắp r&aacute;p Quạt c&ocirc;ng nghiệp được vận h&agrave;nh theo Hệ thống quản l&yacute; chất lượng ISO 9001-2008 tại Khu c&ocirc;ng nghiệp Ho&agrave;ng Mai &ndash; H&agrave; Nội.</p>\r\n\r\n<h2>TIỀM NĂNG V&Agrave; THẾ MẠNH VƯỢT TRỘI</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt l&agrave; nh&agrave; sản xuất cung cấp v&agrave; ph&acirc;n phối độc quyền c&aacute;c sản phẩm mang thương hiệu DETON tr&ecirc;n l&atilde;nh thổ Việt Nam trong nhiều năm qua bao gồm: &ndash; C&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi, cấp kh&iacute; sạch, tạo &aacute;p điều ho&agrave; kh&ocirc;ng kh&iacute;&hellip; cho nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng, khu chế xuất,&hellip; tr&ecirc;n to&agrave;n quốc.<br />\r\nTrong nhiều năm qua, ch&uacute;ng t&ocirc;i li&ecirc;n tục d&agrave;nh được c&aacute;c giải thưởng lớn: Huy Chương V&agrave;ng cho Sản phẩm Quạt c&ocirc;ng nghiệp v&agrave; Cup V&agrave;ng ghi nhận l&agrave; doanh nghiệp xuất sắc ti&ecirc;u biểu tại Hội chợ thương mại quốc tế Việt Nam (Việt Nam EXPO 2011)..vv.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>DỊCH VỤ</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt đ&atilde; ph&aacute;t triển hệ thống ph&acirc;n phối tr&ecirc;n hầu hết c&aacute;c tỉnh th&agrave;nh, hệ thống bảo h&agrave;nh tr&ecirc;n to&agrave;n quốc cũng đang ho&agrave;n thiện nhằm đảm bảo mọi quyền lợi của kh&aacute;ch h&agrave;ng.<br />\r\nC&ocirc;ng ty Đức Việt cung cấp đầy đủ c&aacute;c giải ph&aacute;p kỹ thuật, tư vấn v&agrave; bảo h&agrave;nh cho mọi dự &aacute;n của doanh nghiệp. Ti&ecirc;u ch&iacute; h&agrave;ng đầu của c&ocirc;ng ty l&agrave; tập trung v&agrave;o việc cung cấp c&aacute;c gi&aacute; trị gia tăng, c&aacute;c giải ph&aacute;p về sản phẩm cho kh&aacute;ch h&agrave;ng trong lĩnh vực l&agrave;m m&aacute;t, th&ocirc;ng gi&oacute; v&agrave; điều &aacute;p.</p>\r\n\r\n<h2>MỤC TI&Ecirc;U</h2>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n hướng tới sự ho&agrave;n thiện, kh&ocirc;ng ngừng đầu tư m&aacute;y m&oacute;c thiết bị v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến, chăm s&oacute;c đ&agrave;o tạo đội ngũ chất x&aacute;m, c&ocirc;ng nh&acirc;n l&agrave;nh nghề v&agrave; to&agrave;n bộ lao động để C&ocirc;ng ty Đức Việt l&agrave; một tập thể vững mạnh vươn l&ecirc;n vững chắc, ho&agrave; nhập v&agrave;o sự ph&aacute;t triển chung của đất nước.</p>', '<p>Duc Viet Industry and Trading Co., Ltd specializes in manufacturing, trading, designing and installing all kinds of industrial fans, misting system, cooling, vacuuming clean air supply, pressurizing. air conditioning ... for factories, works, workshops.<br />\r\nThe company has expanded, built and developed a factory to manufacture and assemble industrial fans operated by ISO 9001-2008 Quality Management System in Hoang Mai Industrial Park - Hanoi.</p>\r\n\r\n<h2>POTENTIAL AND POWERFUL</h2>\r\n\r\n<p>Duc Viet Company is an exclusive manufacturer and distributor of DETON branded products in Vietnam for many years, including: - Industrial fans, misting, cooling and suction systems dust, clean air supply, creating air conditioners ... for factories, constructions, factories, export processing zones, ... nationwide.<br />\r\nFor many years, we have continuously won great awards: the Gold Medal for Industrial Fan Products and the Gold Cup as a typical outstanding enterprise at Vietnam International Trade Fair (Vietnam EXPO). 2011) .. etc.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>SERVICE</h2>\r\n\r\n<p>Duc Viet has developed a distribution system in most provinces, a nationwide warranty system is also completed to ensure all the interests of customers.<br />\r\nDuc Viet Company provides a full range of technical solutions, advice and warranty for all projects of the business. The company&#39;s primary focus is on providing value-added, product solutions to customers in the areas of cooling, ventilation and pressurization.</p>\r\n\r\n<h2>TARGET</h2>\r\n\r\n<p>We are always aiming to complete, constantly invest in advanced machinery and equipment, take care of and train the gray matter team, skilled workers and all employees to make Duc Viet Company a collective. strong and steady rise, integration into the common development of the country.</p>', NULL, NULL, NULL, NULL, 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-533131584946540', NULL, 8, '1584946547_6.jpg', NULL, NULL, 'datafiles', 1584946523, 0, 1, 4, 0, 0, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 1, 5, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', NULL, '<p>C&ocirc;ng ty TNHH C&ocirc;ng nghiệp v&agrave; Thương mại Đức Việt chuy&ecirc;n hoạt động trong lĩnh vực Sản xuất, kinh doanh, thiết kế, lắp đặt c&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi cấp kh&iacute; sạch, tạo &aacute;p điều h&ograve;a kh&ocirc;ng kh&iacute;&hellip; cho c&aacute;c nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng.<br />\r\nC&ocirc;ng ty đ&atilde; mở rộng, x&acirc;y dựng v&agrave; ph&aacute;t triển nh&agrave; m&aacute;y sản xuất, lắp r&aacute;p Quạt c&ocirc;ng nghiệp được vận h&agrave;nh theo Hệ thống quản l&yacute; chất lượng ISO 9001-2008 tại Khu c&ocirc;ng nghiệp Ho&agrave;ng Mai &ndash; H&agrave; Nội.</p>\r\n\r\n<h2>TIỀM NĂNG V&Agrave; THẾ MẠNH VƯỢT TRỘI</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt l&agrave; nh&agrave; sản xuất cung cấp v&agrave; ph&acirc;n phối độc quyền c&aacute;c sản phẩm mang thương hiệu DETON tr&ecirc;n l&atilde;nh thổ Việt Nam trong nhiều năm qua bao gồm: &ndash; C&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi, cấp kh&iacute; sạch, tạo &aacute;p điều ho&agrave; kh&ocirc;ng kh&iacute;&hellip; cho nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng, khu chế xuất,&hellip; tr&ecirc;n to&agrave;n quốc.<br />\r\nTrong nhiều năm qua, ch&uacute;ng t&ocirc;i li&ecirc;n tục d&agrave;nh được c&aacute;c giải thưởng lớn: Huy Chương V&agrave;ng cho Sản phẩm Quạt c&ocirc;ng nghiệp v&agrave; Cup V&agrave;ng ghi nhận l&agrave; doanh nghiệp xuất sắc ti&ecirc;u biểu tại Hội chợ thương mại quốc tế Việt Nam (Việt Nam EXPO 2011)..vv.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>DỊCH VỤ</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt đ&atilde; ph&aacute;t triển hệ thống ph&acirc;n phối tr&ecirc;n hầu hết c&aacute;c tỉnh th&agrave;nh, hệ thống bảo h&agrave;nh tr&ecirc;n to&agrave;n quốc cũng đang ho&agrave;n thiện nhằm đảm bảo mọi quyền lợi của kh&aacute;ch h&agrave;ng.<br />\r\nC&ocirc;ng ty Đức Việt cung cấp đầy đủ c&aacute;c giải ph&aacute;p kỹ thuật, tư vấn v&agrave; bảo h&agrave;nh cho mọi dự &aacute;n của doanh nghiệp. Ti&ecirc;u ch&iacute; h&agrave;ng đầu của c&ocirc;ng ty l&agrave; tập trung v&agrave;o việc cung cấp c&aacute;c gi&aacute; trị gia tăng, c&aacute;c giải ph&aacute;p về sản phẩm cho kh&aacute;ch h&agrave;ng trong lĩnh vực l&agrave;m m&aacute;t, th&ocirc;ng gi&oacute; v&agrave; điều &aacute;p.</p>\r\n\r\n<h2>MỤC TI&Ecirc;U</h2>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n hướng tới sự ho&agrave;n thiện, kh&ocirc;ng ngừng đầu tư m&aacute;y m&oacute;c thiết bị v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến, chăm s&oacute;c đ&agrave;o tạo đội ngũ chất x&aacute;m, c&ocirc;ng nh&acirc;n l&agrave;nh nghề v&agrave; to&agrave;n bộ lao động để C&ocirc;ng ty Đức Việt l&agrave; một tập thể vững mạnh vươn l&ecirc;n vững chắc, ho&agrave; nhập v&agrave;o sự ph&aacute;t triển chung của đất nước.</p>', '<p>Duc Viet Industry and Trading Co., Ltd specializes in manufacturing, trading, designing and installing all kinds of industrial fans, misting system, cooling, vacuuming clean air supply, pressurizing. air conditioning ... for factories, works, workshops.<br />\r\nThe company has expanded, built and developed a factory to manufacture and assemble industrial fans operated by ISO 9001-2008 Quality Management System in Hoang Mai Industrial Park - Hanoi.</p>\r\n\r\n<h2>POTENTIAL AND POWERFUL</h2>\r\n\r\n<p>Duc Viet Company is an exclusive manufacturer and distributor of DETON branded products in Vietnam for many years, including: - Industrial fans, misting, cooling and suction systems dust, clean air supply, creating air conditioners ... for factories, constructions, factories, export processing zones, ... nationwide.<br />\r\nFor many years, we have continuously won great awards: the Gold Medal for Industrial Fan Products and the Gold Cup as a typical outstanding enterprise at Vietnam International Trade Fair (Vietnam EXPO). 2011) .. etc.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>SERVICE</h2>\r\n\r\n<p>Duc Viet has developed a distribution system in most provinces, a nationwide warranty system is also completed to ensure all the interests of customers.<br />\r\nDuc Viet Company provides a full range of technical solutions, advice and warranty for all projects of the business. The company&#39;s primary focus is on providing value-added, product solutions to customers in the areas of cooling, ventilation and pressurization.</p>\r\n\r\n<h2>TARGET</h2>\r\n\r\n<p>We are always aiming to complete, constantly invest in advanced machinery and equipment, take care of and train the gray matter team, skilled workers and all employees to make Duc Viet Company a collective. strong and steady rise, integration into the common development of the country.</p>', NULL, NULL, NULL, NULL, 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-290071584946540', NULL, 9, '1584946547_5.jpg', NULL, NULL, 'datafiles', 1584946523, 0, 1, 4, 0, 0, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 1, 5, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', NULL, '<p>C&ocirc;ng ty TNHH C&ocirc;ng nghiệp v&agrave; Thương mại Đức Việt chuy&ecirc;n hoạt động trong lĩnh vực Sản xuất, kinh doanh, thiết kế, lắp đặt c&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi cấp kh&iacute; sạch, tạo &aacute;p điều h&ograve;a kh&ocirc;ng kh&iacute;&hellip; cho c&aacute;c nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng.<br />\r\nC&ocirc;ng ty đ&atilde; mở rộng, x&acirc;y dựng v&agrave; ph&aacute;t triển nh&agrave; m&aacute;y sản xuất, lắp r&aacute;p Quạt c&ocirc;ng nghiệp được vận h&agrave;nh theo Hệ thống quản l&yacute; chất lượng ISO 9001-2008 tại Khu c&ocirc;ng nghiệp Ho&agrave;ng Mai &ndash; H&agrave; Nội.</p>\r\n\r\n<h2>TIỀM NĂNG V&Agrave; THẾ MẠNH VƯỢT TRỘI</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt l&agrave; nh&agrave; sản xuất cung cấp v&agrave; ph&acirc;n phối độc quyền c&aacute;c sản phẩm mang thương hiệu DETON tr&ecirc;n l&atilde;nh thổ Việt Nam trong nhiều năm qua bao gồm: &ndash; C&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi, cấp kh&iacute; sạch, tạo &aacute;p điều ho&agrave; kh&ocirc;ng kh&iacute;&hellip; cho nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng, khu chế xuất,&hellip; tr&ecirc;n to&agrave;n quốc.<br />\r\nTrong nhiều năm qua, ch&uacute;ng t&ocirc;i li&ecirc;n tục d&agrave;nh được c&aacute;c giải thưởng lớn: Huy Chương V&agrave;ng cho Sản phẩm Quạt c&ocirc;ng nghiệp v&agrave; Cup V&agrave;ng ghi nhận l&agrave; doanh nghiệp xuất sắc ti&ecirc;u biểu tại Hội chợ thương mại quốc tế Việt Nam (Việt Nam EXPO 2011)..vv.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>DỊCH VỤ</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt đ&atilde; ph&aacute;t triển hệ thống ph&acirc;n phối tr&ecirc;n hầu hết c&aacute;c tỉnh th&agrave;nh, hệ thống bảo h&agrave;nh tr&ecirc;n to&agrave;n quốc cũng đang ho&agrave;n thiện nhằm đảm bảo mọi quyền lợi của kh&aacute;ch h&agrave;ng.<br />\r\nC&ocirc;ng ty Đức Việt cung cấp đầy đủ c&aacute;c giải ph&aacute;p kỹ thuật, tư vấn v&agrave; bảo h&agrave;nh cho mọi dự &aacute;n của doanh nghiệp. Ti&ecirc;u ch&iacute; h&agrave;ng đầu của c&ocirc;ng ty l&agrave; tập trung v&agrave;o việc cung cấp c&aacute;c gi&aacute; trị gia tăng, c&aacute;c giải ph&aacute;p về sản phẩm cho kh&aacute;ch h&agrave;ng trong lĩnh vực l&agrave;m m&aacute;t, th&ocirc;ng gi&oacute; v&agrave; điều &aacute;p.</p>\r\n\r\n<h2>MỤC TI&Ecirc;U</h2>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n hướng tới sự ho&agrave;n thiện, kh&ocirc;ng ngừng đầu tư m&aacute;y m&oacute;c thiết bị v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến, chăm s&oacute;c đ&agrave;o tạo đội ngũ chất x&aacute;m, c&ocirc;ng nh&acirc;n l&agrave;nh nghề v&agrave; to&agrave;n bộ lao động để C&ocirc;ng ty Đức Việt l&agrave; một tập thể vững mạnh vươn l&ecirc;n vững chắc, ho&agrave; nhập v&agrave;o sự ph&aacute;t triển chung của đất nước.</p>', '<p>Duc Viet Industry and Trading Co., Ltd specializes in manufacturing, trading, designing and installing all kinds of industrial fans, misting system, cooling, vacuuming clean air supply, pressurizing. air conditioning ... for factories, works, workshops.<br />\r\nThe company has expanded, built and developed a factory to manufacture and assemble industrial fans operated by ISO 9001-2008 Quality Management System in Hoang Mai Industrial Park - Hanoi.</p>\r\n\r\n<h2>POTENTIAL AND POWERFUL</h2>\r\n\r\n<p>Duc Viet Company is an exclusive manufacturer and distributor of DETON branded products in Vietnam for many years, including: - Industrial fans, misting, cooling and suction systems dust, clean air supply, creating air conditioners ... for factories, constructions, factories, export processing zones, ... nationwide.<br />\r\nFor many years, we have continuously won great awards: the Gold Medal for Industrial Fan Products and the Gold Cup as a typical outstanding enterprise at Vietnam International Trade Fair (Vietnam EXPO). 2011) .. etc.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>SERVICE</h2>\r\n\r\n<p>Duc Viet has developed a distribution system in most provinces, a nationwide warranty system is also completed to ensure all the interests of customers.<br />\r\nDuc Viet Company provides a full range of technical solutions, advice and warranty for all projects of the business. The company&#39;s primary focus is on providing value-added, product solutions to customers in the areas of cooling, ventilation and pressurization.</p>\r\n\r\n<h2>TARGET</h2>\r\n\r\n<p>We are always aiming to complete, constantly invest in advanced machinery and equipment, take care of and train the gray matter team, skilled workers and all employees to make Duc Viet Company a collective. strong and steady rise, integration into the common development of the country.</p>', NULL, NULL, NULL, NULL, 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-489041584946540', NULL, 10, '1584946547_4.jpg', NULL, NULL, 'datafiles', 1584946523, 0, 1, 4, 0, 0, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `lh_baiviet` (`id`, `id_user`, `id_parent`, `tenbaiviet_vi`, `tenbaiviet_en`, `tenbaiviet_cn`, `mota_vi`, `mota_en`, `mota_cn`, `noidung_vi`, `noidung_en`, `noidung_cn`, `tags_vi`, `tags_en`, `tags_cn`, `seo_name`, `id_parent_muti`, `catasort`, `icon`, `icon_hover`, `dowload`, `duongdantin`, `ngaydang`, `capnhat`, `soluotxem`, `step`, `giatien`, `giakm`, `seo_title_vi`, `seo_title_en`, `seo_title_cn`, `seo_keywords_vi`, `seo_keywords_en`, `seo_keywords_cn`, `seo_description_vi`, `seo_description_en`, `seo_description_cn`, `opt_km`, `opt`, `opt1`, `opt2`, `top_video`, `p1`, `p2`, `p3`, `link_video`, `num_1`, `num_2`, `num_3`, `showhi`, `tinh_nang`, `thuoc_tinh_1_vi`, `thuoc_tinh_1_en`, `thuoc_tinh_2_vi`, `thuoc_tinh_2_en`, `thuoc_tinh_3_vi`, `thuoc_tinh_3_en`, `gia_tri_1_vi`, `gia_tri_1_en`, `gia_tri_2_vi`, `gia_tri_2_en`, `gia_tri_3_vi`, `gia_tri_3_en`, `thongso_vi`, `thongso_en`) VALUES
(27, 1, 5, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', NULL, '<p>C&ocirc;ng ty TNHH C&ocirc;ng nghiệp v&agrave; Thương mại Đức Việt chuy&ecirc;n hoạt động trong lĩnh vực Sản xuất, kinh doanh, thiết kế, lắp đặt c&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi cấp kh&iacute; sạch, tạo &aacute;p điều h&ograve;a kh&ocirc;ng kh&iacute;&hellip; cho c&aacute;c nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng.<br />\r\nC&ocirc;ng ty đ&atilde; mở rộng, x&acirc;y dựng v&agrave; ph&aacute;t triển nh&agrave; m&aacute;y sản xuất, lắp r&aacute;p Quạt c&ocirc;ng nghiệp được vận h&agrave;nh theo Hệ thống quản l&yacute; chất lượng ISO 9001-2008 tại Khu c&ocirc;ng nghiệp Ho&agrave;ng Mai &ndash; H&agrave; Nội.</p>\r\n\r\n<h2>TIỀM NĂNG V&Agrave; THẾ MẠNH VƯỢT TRỘI</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt l&agrave; nh&agrave; sản xuất cung cấp v&agrave; ph&acirc;n phối độc quyền c&aacute;c sản phẩm mang thương hiệu DETON tr&ecirc;n l&atilde;nh thổ Việt Nam trong nhiều năm qua bao gồm: &ndash; C&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi, cấp kh&iacute; sạch, tạo &aacute;p điều ho&agrave; kh&ocirc;ng kh&iacute;&hellip; cho nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng, khu chế xuất,&hellip; tr&ecirc;n to&agrave;n quốc.<br />\r\nTrong nhiều năm qua, ch&uacute;ng t&ocirc;i li&ecirc;n tục d&agrave;nh được c&aacute;c giải thưởng lớn: Huy Chương V&agrave;ng cho Sản phẩm Quạt c&ocirc;ng nghiệp v&agrave; Cup V&agrave;ng ghi nhận l&agrave; doanh nghiệp xuất sắc ti&ecirc;u biểu tại Hội chợ thương mại quốc tế Việt Nam (Việt Nam EXPO 2011)..vv.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>DỊCH VỤ</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt đ&atilde; ph&aacute;t triển hệ thống ph&acirc;n phối tr&ecirc;n hầu hết c&aacute;c tỉnh th&agrave;nh, hệ thống bảo h&agrave;nh tr&ecirc;n to&agrave;n quốc cũng đang ho&agrave;n thiện nhằm đảm bảo mọi quyền lợi của kh&aacute;ch h&agrave;ng.<br />\r\nC&ocirc;ng ty Đức Việt cung cấp đầy đủ c&aacute;c giải ph&aacute;p kỹ thuật, tư vấn v&agrave; bảo h&agrave;nh cho mọi dự &aacute;n của doanh nghiệp. Ti&ecirc;u ch&iacute; h&agrave;ng đầu của c&ocirc;ng ty l&agrave; tập trung v&agrave;o việc cung cấp c&aacute;c gi&aacute; trị gia tăng, c&aacute;c giải ph&aacute;p về sản phẩm cho kh&aacute;ch h&agrave;ng trong lĩnh vực l&agrave;m m&aacute;t, th&ocirc;ng gi&oacute; v&agrave; điều &aacute;p.</p>\r\n\r\n<h2>MỤC TI&Ecirc;U</h2>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n hướng tới sự ho&agrave;n thiện, kh&ocirc;ng ngừng đầu tư m&aacute;y m&oacute;c thiết bị v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến, chăm s&oacute;c đ&agrave;o tạo đội ngũ chất x&aacute;m, c&ocirc;ng nh&acirc;n l&agrave;nh nghề v&agrave; to&agrave;n bộ lao động để C&ocirc;ng ty Đức Việt l&agrave; một tập thể vững mạnh vươn l&ecirc;n vững chắc, ho&agrave; nhập v&agrave;o sự ph&aacute;t triển chung của đất nước.</p>', '<p>Duc Viet Industry and Trading Co., Ltd specializes in manufacturing, trading, designing and installing all kinds of industrial fans, misting system, cooling, vacuuming clean air supply, pressurizing. air conditioning ... for factories, works, workshops.<br />\r\nThe company has expanded, built and developed a factory to manufacture and assemble industrial fans operated by ISO 9001-2008 Quality Management System in Hoang Mai Industrial Park - Hanoi.</p>\r\n\r\n<h2>POTENTIAL AND POWERFUL</h2>\r\n\r\n<p>Duc Viet Company is an exclusive manufacturer and distributor of DETON branded products in Vietnam for many years, including: - Industrial fans, misting, cooling and suction systems dust, clean air supply, creating air conditioners ... for factories, constructions, factories, export processing zones, ... nationwide.<br />\r\nFor many years, we have continuously won great awards: the Gold Medal for Industrial Fan Products and the Gold Cup as a typical outstanding enterprise at Vietnam International Trade Fair (Vietnam EXPO). 2011) .. etc.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>SERVICE</h2>\r\n\r\n<p>Duc Viet has developed a distribution system in most provinces, a nationwide warranty system is also completed to ensure all the interests of customers.<br />\r\nDuc Viet Company provides a full range of technical solutions, advice and warranty for all projects of the business. The company&#39;s primary focus is on providing value-added, product solutions to customers in the areas of cooling, ventilation and pressurization.</p>\r\n\r\n<h2>TARGET</h2>\r\n\r\n<p>We are always aiming to complete, constantly invest in advanced machinery and equipment, take care of and train the gray matter team, skilled workers and all employees to make Duc Viet Company a collective. strong and steady rise, integration into the common development of the country.</p>', NULL, NULL, NULL, NULL, 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-713681584946540', NULL, 11, '1584946547_3.jpg', NULL, NULL, 'datafiles', 1584946523, 0, 1, 4, 0, 0, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 1, 5, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', NULL, '<p>C&ocirc;ng ty TNHH C&ocirc;ng nghiệp v&agrave; Thương mại Đức Việt chuy&ecirc;n hoạt động trong lĩnh vực Sản xuất, kinh doanh, thiết kế, lắp đặt c&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi cấp kh&iacute; sạch, tạo &aacute;p điều h&ograve;a kh&ocirc;ng kh&iacute;&hellip; cho c&aacute;c nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng.<br />\r\nC&ocirc;ng ty đ&atilde; mở rộng, x&acirc;y dựng v&agrave; ph&aacute;t triển nh&agrave; m&aacute;y sản xuất, lắp r&aacute;p Quạt c&ocirc;ng nghiệp được vận h&agrave;nh theo Hệ thống quản l&yacute; chất lượng ISO 9001-2008 tại Khu c&ocirc;ng nghiệp Ho&agrave;ng Mai &ndash; H&agrave; Nội.</p>\r\n\r\n<h2>TIỀM NĂNG V&Agrave; THẾ MẠNH VƯỢT TRỘI</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt l&agrave; nh&agrave; sản xuất cung cấp v&agrave; ph&acirc;n phối độc quyền c&aacute;c sản phẩm mang thương hiệu DETON tr&ecirc;n l&atilde;nh thổ Việt Nam trong nhiều năm qua bao gồm: &ndash; C&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi, cấp kh&iacute; sạch, tạo &aacute;p điều ho&agrave; kh&ocirc;ng kh&iacute;&hellip; cho nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng, khu chế xuất,&hellip; tr&ecirc;n to&agrave;n quốc.<br />\r\nTrong nhiều năm qua, ch&uacute;ng t&ocirc;i li&ecirc;n tục d&agrave;nh được c&aacute;c giải thưởng lớn: Huy Chương V&agrave;ng cho Sản phẩm Quạt c&ocirc;ng nghiệp v&agrave; Cup V&agrave;ng ghi nhận l&agrave; doanh nghiệp xuất sắc ti&ecirc;u biểu tại Hội chợ thương mại quốc tế Việt Nam (Việt Nam EXPO 2011)..vv.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>DỊCH VỤ</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt đ&atilde; ph&aacute;t triển hệ thống ph&acirc;n phối tr&ecirc;n hầu hết c&aacute;c tỉnh th&agrave;nh, hệ thống bảo h&agrave;nh tr&ecirc;n to&agrave;n quốc cũng đang ho&agrave;n thiện nhằm đảm bảo mọi quyền lợi của kh&aacute;ch h&agrave;ng.<br />\r\nC&ocirc;ng ty Đức Việt cung cấp đầy đủ c&aacute;c giải ph&aacute;p kỹ thuật, tư vấn v&agrave; bảo h&agrave;nh cho mọi dự &aacute;n của doanh nghiệp. Ti&ecirc;u ch&iacute; h&agrave;ng đầu của c&ocirc;ng ty l&agrave; tập trung v&agrave;o việc cung cấp c&aacute;c gi&aacute; trị gia tăng, c&aacute;c giải ph&aacute;p về sản phẩm cho kh&aacute;ch h&agrave;ng trong lĩnh vực l&agrave;m m&aacute;t, th&ocirc;ng gi&oacute; v&agrave; điều &aacute;p.</p>\r\n\r\n<h2>MỤC TI&Ecirc;U</h2>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n hướng tới sự ho&agrave;n thiện, kh&ocirc;ng ngừng đầu tư m&aacute;y m&oacute;c thiết bị v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến, chăm s&oacute;c đ&agrave;o tạo đội ngũ chất x&aacute;m, c&ocirc;ng nh&acirc;n l&agrave;nh nghề v&agrave; to&agrave;n bộ lao động để C&ocirc;ng ty Đức Việt l&agrave; một tập thể vững mạnh vươn l&ecirc;n vững chắc, ho&agrave; nhập v&agrave;o sự ph&aacute;t triển chung của đất nước.</p>', '<p>Duc Viet Industry and Trading Co., Ltd specializes in manufacturing, trading, designing and installing all kinds of industrial fans, misting system, cooling, vacuuming clean air supply, pressurizing. air conditioning ... for factories, works, workshops.<br />\r\nThe company has expanded, built and developed a factory to manufacture and assemble industrial fans operated by ISO 9001-2008 Quality Management System in Hoang Mai Industrial Park - Hanoi.</p>\r\n\r\n<h2>POTENTIAL AND POWERFUL</h2>\r\n\r\n<p>Duc Viet Company is an exclusive manufacturer and distributor of DETON branded products in Vietnam for many years, including: - Industrial fans, misting, cooling and suction systems dust, clean air supply, creating air conditioners ... for factories, constructions, factories, export processing zones, ... nationwide.<br />\r\nFor many years, we have continuously won great awards: the Gold Medal for Industrial Fan Products and the Gold Cup as a typical outstanding enterprise at Vietnam International Trade Fair (Vietnam EXPO). 2011) .. etc.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>SERVICE</h2>\r\n\r\n<p>Duc Viet has developed a distribution system in most provinces, a nationwide warranty system is also completed to ensure all the interests of customers.<br />\r\nDuc Viet Company provides a full range of technical solutions, advice and warranty for all projects of the business. The company&#39;s primary focus is on providing value-added, product solutions to customers in the areas of cooling, ventilation and pressurization.</p>\r\n\r\n<h2>TARGET</h2>\r\n\r\n<p>We are always aiming to complete, constantly invest in advanced machinery and equipment, take care of and train the gray matter team, skilled workers and all employees to make Duc Viet Company a collective. strong and steady rise, integration into the common development of the country.</p>', NULL, NULL, NULL, NULL, 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-800801584946540', NULL, 12, '1584946547_2.jpg', NULL, NULL, 'datafiles', 1584946523, 0, 2, 4, 0, 0, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 1, 5, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', NULL, '<p>C&ocirc;ng ty TNHH C&ocirc;ng nghiệp v&agrave; Thương mại Đức Việt chuy&ecirc;n hoạt động trong lĩnh vực Sản xuất, kinh doanh, thiết kế, lắp đặt c&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi cấp kh&iacute; sạch, tạo &aacute;p điều h&ograve;a kh&ocirc;ng kh&iacute;&hellip; cho c&aacute;c nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng.<br />\r\nC&ocirc;ng ty đ&atilde; mở rộng, x&acirc;y dựng v&agrave; ph&aacute;t triển nh&agrave; m&aacute;y sản xuất, lắp r&aacute;p Quạt c&ocirc;ng nghiệp được vận h&agrave;nh theo Hệ thống quản l&yacute; chất lượng ISO 9001-2008 tại Khu c&ocirc;ng nghiệp Ho&agrave;ng Mai &ndash; H&agrave; Nội.</p>\r\n\r\n<h2>TIỀM NĂNG V&Agrave; THẾ MẠNH VƯỢT TRỘI</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt l&agrave; nh&agrave; sản xuất cung cấp v&agrave; ph&acirc;n phối độc quyền c&aacute;c sản phẩm mang thương hiệu DETON tr&ecirc;n l&atilde;nh thổ Việt Nam trong nhiều năm qua bao gồm: &ndash; C&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi, cấp kh&iacute; sạch, tạo &aacute;p điều ho&agrave; kh&ocirc;ng kh&iacute;&hellip; cho nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng, khu chế xuất,&hellip; tr&ecirc;n to&agrave;n quốc.<br />\r\nTrong nhiều năm qua, ch&uacute;ng t&ocirc;i li&ecirc;n tục d&agrave;nh được c&aacute;c giải thưởng lớn: Huy Chương V&agrave;ng cho Sản phẩm Quạt c&ocirc;ng nghiệp v&agrave; Cup V&agrave;ng ghi nhận l&agrave; doanh nghiệp xuất sắc ti&ecirc;u biểu tại Hội chợ thương mại quốc tế Việt Nam (Việt Nam EXPO 2011)..vv.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>DỊCH VỤ</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt đ&atilde; ph&aacute;t triển hệ thống ph&acirc;n phối tr&ecirc;n hầu hết c&aacute;c tỉnh th&agrave;nh, hệ thống bảo h&agrave;nh tr&ecirc;n to&agrave;n quốc cũng đang ho&agrave;n thiện nhằm đảm bảo mọi quyền lợi của kh&aacute;ch h&agrave;ng.<br />\r\nC&ocirc;ng ty Đức Việt cung cấp đầy đủ c&aacute;c giải ph&aacute;p kỹ thuật, tư vấn v&agrave; bảo h&agrave;nh cho mọi dự &aacute;n của doanh nghiệp. Ti&ecirc;u ch&iacute; h&agrave;ng đầu của c&ocirc;ng ty l&agrave; tập trung v&agrave;o việc cung cấp c&aacute;c gi&aacute; trị gia tăng, c&aacute;c giải ph&aacute;p về sản phẩm cho kh&aacute;ch h&agrave;ng trong lĩnh vực l&agrave;m m&aacute;t, th&ocirc;ng gi&oacute; v&agrave; điều &aacute;p.</p>\r\n\r\n<h2>MỤC TI&Ecirc;U</h2>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n hướng tới sự ho&agrave;n thiện, kh&ocirc;ng ngừng đầu tư m&aacute;y m&oacute;c thiết bị v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến, chăm s&oacute;c đ&agrave;o tạo đội ngũ chất x&aacute;m, c&ocirc;ng nh&acirc;n l&agrave;nh nghề v&agrave; to&agrave;n bộ lao động để C&ocirc;ng ty Đức Việt l&agrave; một tập thể vững mạnh vươn l&ecirc;n vững chắc, ho&agrave; nhập v&agrave;o sự ph&aacute;t triển chung của đất nước.</p>', '<p>Duc Viet Industry and Trading Co., Ltd specializes in manufacturing, trading, designing and installing all kinds of industrial fans, misting system, cooling, vacuuming clean air supply, pressurizing. air conditioning ... for factories, works, workshops.<br />\r\nThe company has expanded, built and developed a factory to manufacture and assemble industrial fans operated by ISO 9001-2008 Quality Management System in Hoang Mai Industrial Park - Hanoi.</p>\r\n\r\n<h2>POTENTIAL AND POWERFUL</h2>\r\n\r\n<p>Duc Viet Company is an exclusive manufacturer and distributor of DETON branded products in Vietnam for many years, including: - Industrial fans, misting, cooling and suction systems dust, clean air supply, creating air conditioners ... for factories, constructions, factories, export processing zones, ... nationwide.<br />\r\nFor many years, we have continuously won great awards: the Gold Medal for Industrial Fan Products and the Gold Cup as a typical outstanding enterprise at Vietnam International Trade Fair (Vietnam EXPO). 2011) .. etc.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>SERVICE</h2>\r\n\r\n<p>Duc Viet has developed a distribution system in most provinces, a nationwide warranty system is also completed to ensure all the interests of customers.<br />\r\nDuc Viet Company provides a full range of technical solutions, advice and warranty for all projects of the business. The company&#39;s primary focus is on providing value-added, product solutions to customers in the areas of cooling, ventilation and pressurization.</p>\r\n\r\n<h2>TARGET</h2>\r\n\r\n<p>We are always aiming to complete, constantly invest in advanced machinery and equipment, take care of and train the gray matter team, skilled workers and all employees to make Duc Viet Company a collective. strong and steady rise, integration into the common development of the country.</p>', NULL, NULL, NULL, NULL, 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-895061584946540', NULL, 13, '1584946547_1.jpg', NULL, NULL, 'datafiles', 1584946523, 0, 2, 4, 0, 0, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 1, 5, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', NULL, '<p>C&ocirc;ng ty TNHH C&ocirc;ng nghiệp v&agrave; Thương mại Đức Việt chuy&ecirc;n hoạt động trong lĩnh vực Sản xuất, kinh doanh, thiết kế, lắp đặt c&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi cấp kh&iacute; sạch, tạo &aacute;p điều h&ograve;a kh&ocirc;ng kh&iacute;&hellip; cho c&aacute;c nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng.<br />\r\nC&ocirc;ng ty đ&atilde; mở rộng, x&acirc;y dựng v&agrave; ph&aacute;t triển nh&agrave; m&aacute;y sản xuất, lắp r&aacute;p Quạt c&ocirc;ng nghiệp được vận h&agrave;nh theo Hệ thống quản l&yacute; chất lượng ISO 9001-2008 tại Khu c&ocirc;ng nghiệp Ho&agrave;ng Mai &ndash; H&agrave; Nội.</p>\r\n\r\n<h2>TIỀM NĂNG V&Agrave; THẾ MẠNH VƯỢT TRỘI</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt l&agrave; nh&agrave; sản xuất cung cấp v&agrave; ph&acirc;n phối độc quyền c&aacute;c sản phẩm mang thương hiệu DETON tr&ecirc;n l&atilde;nh thổ Việt Nam trong nhiều năm qua bao gồm: &ndash; C&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi, cấp kh&iacute; sạch, tạo &aacute;p điều ho&agrave; kh&ocirc;ng kh&iacute;&hellip; cho nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng, khu chế xuất,&hellip; tr&ecirc;n to&agrave;n quốc.<br />\r\nTrong nhiều năm qua, ch&uacute;ng t&ocirc;i li&ecirc;n tục d&agrave;nh được c&aacute;c giải thưởng lớn: Huy Chương V&agrave;ng cho Sản phẩm Quạt c&ocirc;ng nghiệp v&agrave; Cup V&agrave;ng ghi nhận l&agrave; doanh nghiệp xuất sắc ti&ecirc;u biểu tại Hội chợ thương mại quốc tế Việt Nam (Việt Nam EXPO 2011)..vv.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>DỊCH VỤ</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt đ&atilde; ph&aacute;t triển hệ thống ph&acirc;n phối tr&ecirc;n hầu hết c&aacute;c tỉnh th&agrave;nh, hệ thống bảo h&agrave;nh tr&ecirc;n to&agrave;n quốc cũng đang ho&agrave;n thiện nhằm đảm bảo mọi quyền lợi của kh&aacute;ch h&agrave;ng.<br />\r\nC&ocirc;ng ty Đức Việt cung cấp đầy đủ c&aacute;c giải ph&aacute;p kỹ thuật, tư vấn v&agrave; bảo h&agrave;nh cho mọi dự &aacute;n của doanh nghiệp. Ti&ecirc;u ch&iacute; h&agrave;ng đầu của c&ocirc;ng ty l&agrave; tập trung v&agrave;o việc cung cấp c&aacute;c gi&aacute; trị gia tăng, c&aacute;c giải ph&aacute;p về sản phẩm cho kh&aacute;ch h&agrave;ng trong lĩnh vực l&agrave;m m&aacute;t, th&ocirc;ng gi&oacute; v&agrave; điều &aacute;p.</p>\r\n\r\n<h2>MỤC TI&Ecirc;U</h2>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n hướng tới sự ho&agrave;n thiện, kh&ocirc;ng ngừng đầu tư m&aacute;y m&oacute;c thiết bị v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến, chăm s&oacute;c đ&agrave;o tạo đội ngũ chất x&aacute;m, c&ocirc;ng nh&acirc;n l&agrave;nh nghề v&agrave; to&agrave;n bộ lao động để C&ocirc;ng ty Đức Việt l&agrave; một tập thể vững mạnh vươn l&ecirc;n vững chắc, ho&agrave; nhập v&agrave;o sự ph&aacute;t triển chung của đất nước.</p>', '<p>Duc Viet Industry and Trading Co., Ltd specializes in manufacturing, trading, designing and installing all kinds of industrial fans, misting system, cooling, vacuuming clean air supply, pressurizing. air conditioning ... for factories, works, workshops.<br />\r\nThe company has expanded, built and developed a factory to manufacture and assemble industrial fans operated by ISO 9001-2008 Quality Management System in Hoang Mai Industrial Park - Hanoi.</p>\r\n\r\n<h2>POTENTIAL AND POWERFUL</h2>\r\n\r\n<p>Duc Viet Company is an exclusive manufacturer and distributor of DETON branded products in Vietnam for many years, including: - Industrial fans, misting, cooling and suction systems dust, clean air supply, creating air conditioners ... for factories, constructions, factories, export processing zones, ... nationwide.<br />\r\nFor many years, we have continuously won great awards: the Gold Medal for Industrial Fan Products and the Gold Cup as a typical outstanding enterprise at Vietnam International Trade Fair (Vietnam EXPO). 2011) .. etc.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>SERVICE</h2>\r\n\r\n<p>Duc Viet has developed a distribution system in most provinces, a nationwide warranty system is also completed to ensure all the interests of customers.<br />\r\nDuc Viet Company provides a full range of technical solutions, advice and warranty for all projects of the business. The company&#39;s primary focus is on providing value-added, product solutions to customers in the areas of cooling, ventilation and pressurization.</p>\r\n\r\n<h2>TARGET</h2>\r\n\r\n<p>We are always aiming to complete, constantly invest in advanced machinery and equipment, take care of and train the gray matter team, skilled workers and all employees to make Duc Viet Company a collective. strong and steady rise, integration into the common development of the country.</p>', NULL, NULL, NULL, NULL, 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-463701584946540', NULL, 14, '1584946551_8.jpg', NULL, NULL, 'datafiles', 1584946523, 0, 2, 4, 0, 0, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 1, 5, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', '<p>We work with the companies that have established a stainless reputation in what they do. They are leaders in various spheres of business, and we appreciate cooperating with them...</p>', NULL, '<p>C&ocirc;ng ty TNHH C&ocirc;ng nghiệp v&agrave; Thương mại Đức Việt chuy&ecirc;n hoạt động trong lĩnh vực Sản xuất, kinh doanh, thiết kế, lắp đặt c&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi cấp kh&iacute; sạch, tạo &aacute;p điều h&ograve;a kh&ocirc;ng kh&iacute;&hellip; cho c&aacute;c nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng.<br />\r\nC&ocirc;ng ty đ&atilde; mở rộng, x&acirc;y dựng v&agrave; ph&aacute;t triển nh&agrave; m&aacute;y sản xuất, lắp r&aacute;p Quạt c&ocirc;ng nghiệp được vận h&agrave;nh theo Hệ thống quản l&yacute; chất lượng ISO 9001-2008 tại Khu c&ocirc;ng nghiệp Ho&agrave;ng Mai &ndash; H&agrave; Nội.</p>\r\n\r\n<h2>TIỀM NĂNG V&Agrave; THẾ MẠNH VƯỢT TRỘI</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt l&agrave; nh&agrave; sản xuất cung cấp v&agrave; ph&acirc;n phối độc quyền c&aacute;c sản phẩm mang thương hiệu DETON tr&ecirc;n l&atilde;nh thổ Việt Nam trong nhiều năm qua bao gồm: &ndash; C&aacute;c loại quạt c&ocirc;ng nghiệp, hệ thống phun sương, l&agrave;m m&aacute;t, h&uacute;t bụi, cấp kh&iacute; sạch, tạo &aacute;p điều ho&agrave; kh&ocirc;ng kh&iacute;&hellip; cho nh&agrave; m&aacute;y, c&ocirc;ng tr&igrave;nh, nh&agrave; xưởng, khu chế xuất,&hellip; tr&ecirc;n to&agrave;n quốc.<br />\r\nTrong nhiều năm qua, ch&uacute;ng t&ocirc;i li&ecirc;n tục d&agrave;nh được c&aacute;c giải thưởng lớn: Huy Chương V&agrave;ng cho Sản phẩm Quạt c&ocirc;ng nghiệp v&agrave; Cup V&agrave;ng ghi nhận l&agrave; doanh nghiệp xuất sắc ti&ecirc;u biểu tại Hội chợ thương mại quốc tế Việt Nam (Việt Nam EXPO 2011)..vv.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>DỊCH VỤ</h2>\r\n\r\n<p>C&ocirc;ng ty Đức Việt đ&atilde; ph&aacute;t triển hệ thống ph&acirc;n phối tr&ecirc;n hầu hết c&aacute;c tỉnh th&agrave;nh, hệ thống bảo h&agrave;nh tr&ecirc;n to&agrave;n quốc cũng đang ho&agrave;n thiện nhằm đảm bảo mọi quyền lợi của kh&aacute;ch h&agrave;ng.<br />\r\nC&ocirc;ng ty Đức Việt cung cấp đầy đủ c&aacute;c giải ph&aacute;p kỹ thuật, tư vấn v&agrave; bảo h&agrave;nh cho mọi dự &aacute;n của doanh nghiệp. Ti&ecirc;u ch&iacute; h&agrave;ng đầu của c&ocirc;ng ty l&agrave; tập trung v&agrave;o việc cung cấp c&aacute;c gi&aacute; trị gia tăng, c&aacute;c giải ph&aacute;p về sản phẩm cho kh&aacute;ch h&agrave;ng trong lĩnh vực l&agrave;m m&aacute;t, th&ocirc;ng gi&oacute; v&agrave; điều &aacute;p.</p>\r\n\r\n<h2>MỤC TI&Ecirc;U</h2>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n hướng tới sự ho&agrave;n thiện, kh&ocirc;ng ngừng đầu tư m&aacute;y m&oacute;c thiết bị v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến, chăm s&oacute;c đ&agrave;o tạo đội ngũ chất x&aacute;m, c&ocirc;ng nh&acirc;n l&agrave;nh nghề v&agrave; to&agrave;n bộ lao động để C&ocirc;ng ty Đức Việt l&agrave; một tập thể vững mạnh vươn l&ecirc;n vững chắc, ho&agrave; nhập v&agrave;o sự ph&aacute;t triển chung của đất nước.</p>', '<p>Duc Viet Industry and Trading Co., Ltd specializes in manufacturing, trading, designing and installing all kinds of industrial fans, misting system, cooling, vacuuming clean air supply, pressurizing. air conditioning ... for factories, works, workshops.<br />\r\nThe company has expanded, built and developed a factory to manufacture and assemble industrial fans operated by ISO 9001-2008 Quality Management System in Hoang Mai Industrial Park - Hanoi.</p>\r\n\r\n<h2>POTENTIAL AND POWERFUL</h2>\r\n\r\n<p>Duc Viet Company is an exclusive manufacturer and distributor of DETON branded products in Vietnam for many years, including: - Industrial fans, misting, cooling and suction systems dust, clean air supply, creating air conditioners ... for factories, constructions, factories, export processing zones, ... nationwide.<br />\r\nFor many years, we have continuously won great awards: the Gold Medal for Industrial Fan Products and the Gold Cup as a typical outstanding enterprise at Vietnam International Trade Fair (Vietnam EXPO). 2011) .. etc.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"377\" src=\"/2020_ducviet/datafiles/images/5.jpg\" width=\"810\" /></p>\r\n\r\n<h2>SERVICE</h2>\r\n\r\n<p>Duc Viet has developed a distribution system in most provinces, a nationwide warranty system is also completed to ensure all the interests of customers.<br />\r\nDuc Viet Company provides a full range of technical solutions, advice and warranty for all projects of the business. The company&#39;s primary focus is on providing value-added, product solutions to customers in the areas of cooling, ventilation and pressurization.</p>\r\n\r\n<h2>TARGET</h2>\r\n\r\n<p>We are always aiming to complete, constantly invest in advanced machinery and equipment, take care of and train the gray matter team, skilled workers and all employees to make Duc Viet Company a collective. strong and steady rise, integration into the common development of the country.</p>', NULL, NULL, NULL, NULL, 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-317461584946540', NULL, 15, '1584946551_7.jpg', NULL, NULL, 'datafiles', 1584946523, 0, 2, 4, 0, 0, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 'Phương án giải quyết nắng nóng cho trang trại chăn nuôi, cây trồng', 'The plan to solve the hot sun for livestock farms and crops', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 1, 0, 'ĐỊA CHỈ', 'ADDRESS', '', '', '', '', '<p>P9H2 tập thể Nguyễn C&ocirc;ng Trứ, Hai B&agrave; Trưng, H&agrave; Nội, Việt Nam</p>', '<p>P9H2 collective Nguyen Cong Tru, Hai Ba Trung, Hanoi, Vietnam</p>', '', '', '', '', 'a648559e9c10c0ba5681e6b7bec52798', '', 3, '1584946624_font-awesome_4-7-0_home_205_0_ffffff_none.png', NULL, NULL, 'datafiles', 1584946624, 0, 1, 6, 0, 0, 'ĐỊA CHỈ', 'ADDRESS', '', 'ĐỊA CHỈ', 'ADDRESS', '', 'ĐỊA CHỈ', 'ADDRESS', NULL, 0, 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(33, 1, 0, 'ĐIỆN THOẠI', 'PHONE', '', '', '', '', '<p>Điện thoại: <a href=\"tel:024. 39783004\">024. 39783004</a> | Fax: 024. 38213179 &nbsp;</p>\r\n\r\n<p>Hotline: <a href=\"tel:0916 820 489\">0916 820 489</a> (24/7)</p>', '<p>Phone: <a href=\"tel:024. 39783004\">024. 39783004</a> | Fax: 024. 38213179 &nbsp;</p>\r\n\r\n<p>Hotline: <a href=\"tel:0916 820 489\">0916 820 489</a> (24/7)</p>', '', '', '', '', '2191b80e2777eb31d85d05319e4cc5bb', '', 2, '1584946690_font-awesome_4-7-0_phone-square_205_0_ffffff_none.png', NULL, NULL, 'datafiles', 1584946690, 0, 1, 6, 0, 0, 'ĐIỆN THOẠI', 'PHONE', '', 'ĐIỆN THOẠI', 'PHONE', '', 'ĐIỆN THOẠI', 'PHONE', NULL, 0, 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(34, 1, 0, 'EMAIL - WEBSITE', 'EMAIL - WEBSITE', '', '', '', '', '<p>Email: <a href=\"mailto:quatducviet@deton.com.vn \">quatducviet@deton.com.vn </a>&nbsp;</p>\r\n\r\n<p>Website: <a href=\"http://www.deton.com.vn\">www.deton.com.vn</a></p>', '<p>Email: <a href=\"mailto:quatducviet@deton.com.vn \">quatducviet@deton.com.vn </a>&nbsp;</p>\r\n\r\n<p>Website: <a href=\"http://www.deton.com.vn\">www.deton.com.vn</a></p>', '', '', '', '', '6a0f83aaa893e47d663e58b1f76c691c', '', 1, '1584946731_font-awesome_4-7-0_globe_256_0_ffffff_none.png', NULL, NULL, 'datafiles', 1584946731, 0, 1, 6, 0, 0, 'EMAIL - WEBSITE', 'EMAIL - WEBSITE', '', 'EMAIL - WEBSITE', 'EMAIL - WEBSITE', '', 'EMAIL - WEBSITE', 'EMAIL - WEBSITE', NULL, 0, 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(35, 1, 7, 'Môi trường làm việc năng động, sáng tạo', 'Dynamic and creative working environment', '', '', '', '', '', '', '', '', '', '', 'moi-truong-lam-viec-nang-dong-sang-tao', '', 4, '1585037660_fa-fa-thumbs-up.png', NULL, NULL, 'datafiles', 1584946870, 0, 1, 5, 0, 0, 'Môi trường làm việc năng động, sáng tạo', 'Dynamic and creative working environment', '', 'Môi trường làm việc năng động, sáng tạo', 'Dynamic and creative working environment', '', 'Môi trường làm việc năng động, sáng tạo', 'Dynamic and creative working environment', NULL, 0, 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(36, 1, 7, 'Được đào tạo chuyên môn và kỹ năng làm việc', 'Trained professional and work skills', '', '', '', '', '', '', '', '', '', '', 'duoc-dao-tao-chuyen-mon-va-ky-nang-lam-viec', '', 3, '1585037692_fa-fa-handshake.png', NULL, NULL, 'datafiles', 1584946887, 0, 1, 5, 0, 0, 'Được đào tạo chuyên môn và kỹ năng làm việc', 'Trained professional and work skills', '', 'Được đào tạo chuyên môn và kỹ năng làm việc', 'Trained professional and work skills', '', 'Được đào tạo chuyên môn và kỹ năng làm việc', 'Trained professional and work skills', NULL, 0, 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(37, 1, 7, 'Chính sách đãi ngộ hấp dẫn', 'Attractive remuneration policy', '', '', '', '', '', '', '', '', '', '', 'chinh-sach-dai-ngo-hap-dan', '', 2, '1585037708_fa-fa-users.png', NULL, NULL, 'datafiles', 1584946895, 0, 1, 5, 0, 0, 'Chính sách đãi ngộ hấp dẫn', 'Attractive remuneration policy', '', 'Chính sách đãi ngộ hấp dẫn', 'Attractive remuneration policy', '', 'Chính sách đãi ngộ hấp dẫn', 'Attractive remuneration policy', NULL, 0, 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(38, 1, 7, 'Văn hóa làm việc dựa trên sự hợp tác, chuyên nghiệp', 'Working culture based on cooperation and professionalism', '', '', '', '', '', '', '', '', '', '', 'van-hoa-lam-viec-dua-tren-su-hop-tac-chuyen-nghiep', '', 1, '1585037728_fa-fa-trophy.png', NULL, NULL, 'datafiles', 1584946909, 0, 1, 5, 0, 0, 'Văn hóa làm việc dựa trên sự hợp tác, chuyên nghiệp', 'Working culture based on cooperation and professionalism', '', 'Văn hóa làm việc dựa trên sự hợp tác, chuyên nghiệp', 'Working culture based on cooperation and professionalism', '', 'Văn hóa làm việc dựa trên sự hợp tác, chuyên nghiệp', 'Working culture based on cooperation and professionalism', NULL, 0, 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(42, 1, 8, 'Tuyển nhân viên kinh doanh', 'Recruiting sales staff', '', '', '', '', '<p>Tuyển nh&acirc;n vi&ecirc;n kinh doanh</p>', '<p>Recruiting sales staff</p>', '', '', '', '', 'tuyen-nhan-vien-kinh-doanh-cp-173481584947226', '', 8, '1585038202_fa-fa-users.png', NULL, NULL, 'datafiles', 1584951759, 0, 2, 5, 0, 0, 'Tuyển nhân viên kinh doanh', 'Recruiting sales staff', '', 'Tuyển nhân viên kinh doanh', 'Recruiting sales staff', '', 'Tuyển nhân viên kinh doanh', 'Recruiting sales staff', NULL, 0, 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(43, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', '', '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', '', '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', '', '', '', '', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang', '', 25, '1584953347_7.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 3, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', '', 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', '', 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, '', '', 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>');
INSERT INTO `lh_baiviet` (`id`, `id_user`, `id_parent`, `tenbaiviet_vi`, `tenbaiviet_en`, `tenbaiviet_cn`, `mota_vi`, `mota_en`, `mota_cn`, `noidung_vi`, `noidung_en`, `noidung_cn`, `tags_vi`, `tags_en`, `tags_cn`, `seo_name`, `id_parent_muti`, `catasort`, `icon`, `icon_hover`, `dowload`, `duongdantin`, `ngaydang`, `capnhat`, `soluotxem`, `step`, `giatien`, `giakm`, `seo_title_vi`, `seo_title_en`, `seo_title_cn`, `seo_keywords_vi`, `seo_keywords_en`, `seo_keywords_cn`, `seo_description_vi`, `seo_description_en`, `seo_description_cn`, `opt_km`, `opt`, `opt1`, `opt2`, `top_video`, `p1`, `p2`, `p3`, `link_video`, `num_1`, `num_2`, `num_3`, `showhi`, `tinh_nang`, `thuoc_tinh_1_vi`, `thuoc_tinh_1_en`, `thuoc_tinh_2_vi`, `thuoc_tinh_2_en`, `thuoc_tinh_3_vi`, `thuoc_tinh_3_en`, `gia_tri_1_vi`, `gia_tri_1_en`, `gia_tri_2_vi`, `gia_tri_2_en`, `gia_tri_3_vi`, `gia_tri_3_en`, `thongso_vi`, `thongso_en`) VALUES
(44, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-839801584953326', NULL, 1, '1584953333_1.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>'),
(45, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-686331584953326', NULL, 2, '1584953333_2.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>'),
(46, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-903781584953326', NULL, 3, '1584953333_3.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>'),
(47, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-734091584953326', NULL, 4, '1584953333_4.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>');
INSERT INTO `lh_baiviet` (`id`, `id_user`, `id_parent`, `tenbaiviet_vi`, `tenbaiviet_en`, `tenbaiviet_cn`, `mota_vi`, `mota_en`, `mota_cn`, `noidung_vi`, `noidung_en`, `noidung_cn`, `tags_vi`, `tags_en`, `tags_cn`, `seo_name`, `id_parent_muti`, `catasort`, `icon`, `icon_hover`, `dowload`, `duongdantin`, `ngaydang`, `capnhat`, `soluotxem`, `step`, `giatien`, `giakm`, `seo_title_vi`, `seo_title_en`, `seo_title_cn`, `seo_keywords_vi`, `seo_keywords_en`, `seo_keywords_cn`, `seo_description_vi`, `seo_description_en`, `seo_description_cn`, `opt_km`, `opt`, `opt1`, `opt2`, `top_video`, `p1`, `p2`, `p3`, `link_video`, `num_1`, `num_2`, `num_3`, `showhi`, `tinh_nang`, `thuoc_tinh_1_vi`, `thuoc_tinh_1_en`, `thuoc_tinh_2_vi`, `thuoc_tinh_2_en`, `thuoc_tinh_3_vi`, `thuoc_tinh_3_en`, `gia_tri_1_vi`, `gia_tri_1_en`, `gia_tri_2_vi`, `gia_tri_2_en`, `gia_tri_3_vi`, `gia_tri_3_en`, `thongso_vi`, `thongso_en`) VALUES
(48, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-520381584953326', NULL, 5, '1584953333_5.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>'),
(49, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-641761584953326', NULL, 24, '1584953333_6.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 2, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>'),
(50, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-177471584953326', NULL, 6, '1584953333_7.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>'),
(51, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-111571584953326', NULL, 7, '1584953333_8.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>');
INSERT INTO `lh_baiviet` (`id`, `id_user`, `id_parent`, `tenbaiviet_vi`, `tenbaiviet_en`, `tenbaiviet_cn`, `mota_vi`, `mota_en`, `mota_cn`, `noidung_vi`, `noidung_en`, `noidung_cn`, `tags_vi`, `tags_en`, `tags_cn`, `seo_name`, `id_parent_muti`, `catasort`, `icon`, `icon_hover`, `dowload`, `duongdantin`, `ngaydang`, `capnhat`, `soluotxem`, `step`, `giatien`, `giakm`, `seo_title_vi`, `seo_title_en`, `seo_title_cn`, `seo_keywords_vi`, `seo_keywords_en`, `seo_keywords_cn`, `seo_description_vi`, `seo_description_en`, `seo_description_cn`, `opt_km`, `opt`, `opt1`, `opt2`, `top_video`, `p1`, `p2`, `p3`, `link_video`, `num_1`, `num_2`, `num_3`, `showhi`, `tinh_nang`, `thuoc_tinh_1_vi`, `thuoc_tinh_1_en`, `thuoc_tinh_2_vi`, `thuoc_tinh_2_en`, `thuoc_tinh_3_vi`, `thuoc_tinh_3_en`, `gia_tri_1_vi`, `gia_tri_1_en`, `gia_tri_2_vi`, `gia_tri_2_en`, `gia_tri_3_vi`, `gia_tri_3_en`, `thongso_vi`, `thongso_en`) VALUES
(52, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-224771584953326', NULL, 8, '1584953333_9.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>'),
(53, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-807001584953326', NULL, 9, '1584953333_10.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>'),
(54, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-873381584953326', NULL, 10, '1584953333_11.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>'),
(55, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-477121584953326', NULL, 11, '1584953333_12.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>');
INSERT INTO `lh_baiviet` (`id`, `id_user`, `id_parent`, `tenbaiviet_vi`, `tenbaiviet_en`, `tenbaiviet_cn`, `mota_vi`, `mota_en`, `mota_cn`, `noidung_vi`, `noidung_en`, `noidung_cn`, `tags_vi`, `tags_en`, `tags_cn`, `seo_name`, `id_parent_muti`, `catasort`, `icon`, `icon_hover`, `dowload`, `duongdantin`, `ngaydang`, `capnhat`, `soluotxem`, `step`, `giatien`, `giakm`, `seo_title_vi`, `seo_title_en`, `seo_title_cn`, `seo_keywords_vi`, `seo_keywords_en`, `seo_keywords_cn`, `seo_description_vi`, `seo_description_en`, `seo_description_cn`, `opt_km`, `opt`, `opt1`, `opt2`, `top_video`, `p1`, `p2`, `p3`, `link_video`, `num_1`, `num_2`, `num_3`, `showhi`, `tinh_nang`, `thuoc_tinh_1_vi`, `thuoc_tinh_1_en`, `thuoc_tinh_2_vi`, `thuoc_tinh_2_en`, `thuoc_tinh_3_vi`, `thuoc_tinh_3_en`, `gia_tri_1_vi`, `gia_tri_1_en`, `gia_tri_2_vi`, `gia_tri_2_en`, `gia_tri_3_vi`, `gia_tri_3_en`, `thongso_vi`, `thongso_en`) VALUES
(56, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-838811584953326', NULL, 12, '1584953333_13.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>'),
(57, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-860481584953326', NULL, 13, '1584953333_14.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>'),
(58, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-998661584953326', NULL, 14, '1584953333_15.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>'),
(59, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-593251584953326', NULL, 15, '1584953333_16.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>');
INSERT INTO `lh_baiviet` (`id`, `id_user`, `id_parent`, `tenbaiviet_vi`, `tenbaiviet_en`, `tenbaiviet_cn`, `mota_vi`, `mota_en`, `mota_cn`, `noidung_vi`, `noidung_en`, `noidung_cn`, `tags_vi`, `tags_en`, `tags_cn`, `seo_name`, `id_parent_muti`, `catasort`, `icon`, `icon_hover`, `dowload`, `duongdantin`, `ngaydang`, `capnhat`, `soluotxem`, `step`, `giatien`, `giakm`, `seo_title_vi`, `seo_title_en`, `seo_title_cn`, `seo_keywords_vi`, `seo_keywords_en`, `seo_keywords_cn`, `seo_description_vi`, `seo_description_en`, `seo_description_cn`, `opt_km`, `opt`, `opt1`, `opt2`, `top_video`, `p1`, `p2`, `p3`, `link_video`, `num_1`, `num_2`, `num_3`, `showhi`, `tinh_nang`, `thuoc_tinh_1_vi`, `thuoc_tinh_1_en`, `thuoc_tinh_2_vi`, `thuoc_tinh_2_en`, `thuoc_tinh_3_vi`, `thuoc_tinh_3_en`, `gia_tri_1_vi`, `gia_tri_1_en`, `gia_tri_2_vi`, `gia_tri_2_en`, `gia_tri_3_vi`, `gia_tri_3_en`, `thongso_vi`, `thongso_en`) VALUES
(60, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-373721584953326', NULL, 16, '1584953333_17.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>'),
(61, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-202541584953326', NULL, 17, '1584953333_18.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>'),
(62, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-370051584953326', NULL, 18, '1584953333_19.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>'),
(63, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-773491584953326', NULL, 19, '1584953333_20.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>');
INSERT INTO `lh_baiviet` (`id`, `id_user`, `id_parent`, `tenbaiviet_vi`, `tenbaiviet_en`, `tenbaiviet_cn`, `mota_vi`, `mota_en`, `mota_cn`, `noidung_vi`, `noidung_en`, `noidung_cn`, `tags_vi`, `tags_en`, `tags_cn`, `seo_name`, `id_parent_muti`, `catasort`, `icon`, `icon_hover`, `dowload`, `duongdantin`, `ngaydang`, `capnhat`, `soluotxem`, `step`, `giatien`, `giakm`, `seo_title_vi`, `seo_title_en`, `seo_title_cn`, `seo_keywords_vi`, `seo_keywords_en`, `seo_keywords_cn`, `seo_description_vi`, `seo_description_en`, `seo_description_cn`, `opt_km`, `opt`, `opt1`, `opt2`, `top_video`, `p1`, `p2`, `p3`, `link_video`, `num_1`, `num_2`, `num_3`, `showhi`, `tinh_nang`, `thuoc_tinh_1_vi`, `thuoc_tinh_1_en`, `thuoc_tinh_2_vi`, `thuoc_tinh_2_en`, `thuoc_tinh_3_vi`, `thuoc_tinh_3_en`, `gia_tri_1_vi`, `gia_tri_1_en`, `gia_tri_2_vi`, `gia_tri_2_en`, `gia_tri_3_vi`, `gia_tri_3_en`, `thongso_vi`, `thongso_en`) VALUES
(64, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-185801584953326', NULL, 20, '1584953343_21.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>'),
(65, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-863561584953326', NULL, 21, '1584953343_22.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>'),
(66, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-152491584953326', NULL, 22, '1584953343_23.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 1, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>'),
(67, 1, 9, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, '<ul>\r\n	<li>Xuất xứ: Th&aacute;i Lan</li>\r\n	<li>H&atilde;ng sản xuất: deton</li>\r\n	<li>K&iacute;ch thước: 276 x 181 x 222mm</li>\r\n	<li>C&ocirc;ng suất: 60W</li>\r\n	<li>Bảo h&agrave;nh: 6 Th&aacute;ng</li>\r\n	<li>T&igrave;nh trạng: C&ograve;n h&agrave;ng</li>\r\n</ul>\r\n\r\n<p>Ứng dụng: Loại quạt n&agrave;y thường được sử dụng để lắp nối ống với hệ thống đường ống vận chuyển d&ograve;ng kh&iacute; với khoảng c&aacute;ch lớn hoặc d&ugrave;ng lắp h&uacute;t kh&oacute;i h&agrave;nh lang, tầng hầm, th&ocirc;ng gi&oacute; trục kỹ thuật, tăng &aacute;p cầu thang c&aacute;c t&ograve;a nh&agrave; chung cư.</p>', '<ul>\r\n	<li>Origin: Thailand</li>\r\n	<li>Manufacturer: deton</li>\r\n	<li>Dimensions: 276 x 181 x 222mm</li>\r\n	<li>Capacity: 60W</li>\r\n	<li>Warranty: 6 Months</li>\r\n	<li>Status: In stock</li>\r\n</ul>\r\n\r\n<p>Application: This type of fan is often used to connect the pipes to the pipeline system to transport gas at a great distance or to install smoke in corridors, basements, axial ventilation, stair pressures for buildings. apartment.</p>', NULL, '<p>Quạt c&ocirc;ng nghiệp AXP-5-NoD l&agrave; d&ograve;ng quạt hướng trục tăng &aacute;p cầu thang, thiết kế dạng ống c&oacute; kết cấu c&aacute;nh xi&ecirc;n.</p>\r\n\r\n<p>- C&ocirc;ng nghệ sản xuất hiện đại: Điều khiển tự động, tốc độc nhanh, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu, giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.<br />\r\n- Động cơ chất lượng tốt, tuổi thọ cao: Việt Hung (Việt Nam), Điện Cơ (Việt Nam), Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...<br />\r\n- Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Industrial fan AXP-5-NoD is a staircase axial turbocharger fan, tubular design with oblique wing structure.</p>\r\n\r\n<p>- Modern production technology: Automatic control, fast speed, high accuracy, saving materials, reducing costs, shortening order time.<br />\r\n- Engine of good quality, long life: Viet Hung (Vietnam), Dien Co (Vietnam), Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy ), ...<br />\r\n- Extremely low noise due to the generated air flow along the vane direction completely eliminates swirling areas to help the fan have a lower noise level than conventional axial fans.</p>', NULL, NULL, NULL, NULL, 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-277651584953326', NULL, 23, '1584953343_24.jpg', NULL, NULL, 'datafiles', 1584952831, 0, 2, 2, 300000, 400000, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 'Quạt sàn công nghiệp sơn đen FE (Không tuốc năng)', 'Industrial fan painted black FE (No turbine)', NULL, 0, 0, 0, 0, 0, 'AO133', 0, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Điện &aacute;p\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">C&ocirc;ng suất\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Tốc độ\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Lưu lượng\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">&Aacute;p suất\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Độ ồn\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Trọng Lượng\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th width=\"71\">Model</th>\r\n			<th width=\"71\">Voltage\r\n			<p>(v)</p>\r\n			</th>\r\n			<th width=\"71\">Wattage\r\n			<p>(Kw)</p>\r\n			</th>\r\n			<th width=\"71\">Speed\r\n			<p>(r/min)</p>\r\n			</th>\r\n			<th width=\"71\">Flow\r\n			<p>(m3/h)</p>\r\n			</th>\r\n			<th width=\"71\">Pressure\r\n			<p>(pa)</p>\r\n			</th>\r\n			<th width=\"71\">Noise level\r\n			<p>(db)</p>\r\n			</th>\r\n			<th width=\"71\">Weight\r\n			<p>(kg)</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS4-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.55</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">5300</td>\r\n			<td rowspan=\"2\" width=\"71\">166</td>\r\n			<td rowspan=\"2\" width=\"71\">72</td>\r\n			<td rowspan=\"2\" width=\"71\">18</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD4-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td rowspan=\"2\" width=\"71\">0.75</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">9300</td>\r\n			<td rowspan=\"2\" width=\"71\">196</td>\r\n			<td rowspan=\"2\" width=\"71\">74</td>\r\n			<td rowspan=\"2\" width=\"71\">22</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD5-4</td>\r\n			<td width=\"71\">220</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS5-6</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.37</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">7700</td>\r\n			<td width=\"71\">98</td>\r\n			<td width=\"71\">68</td>\r\n			<td width=\"71\">20</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td rowspan=\"2\" width=\"71\">2.2</td>\r\n			<td rowspan=\"2\" width=\"71\">1420</td>\r\n			<td rowspan=\"2\" width=\"71\">18700</td>\r\n			<td rowspan=\"2\" width=\"71\">294</td>\r\n			<td rowspan=\"2\" width=\"71\">75</td>\r\n			<td rowspan=\"2\" width=\"71\">51</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD6-4</td>\r\n			<td width=\"71\">380</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS6-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">1.1</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">13000</td>\r\n			<td width=\"71\">176</td>\r\n			<td width=\"71\">71</td>\r\n			<td width=\"71\">46</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-4</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">3</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">24500</td>\r\n			<td width=\"71\">315</td>\r\n			<td width=\"71\">78</td>\r\n			<td rowspan=\"2\" width=\"71\">61</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFD7-4</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">1420</td>\r\n			<td width=\"71\">22000</td>\r\n			<td width=\"71\">250</td>\r\n			<td width=\"71\">78</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGFS7-6</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">2.2</td>\r\n			<td width=\"71\">960</td>\r\n			<td width=\"71\">18000</td>\r\n			<td width=\"71\">150</td>\r\n			<td width=\"71\">75</td>\r\n			<td width=\"71\">56</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6S-4II</td>\r\n			<td width=\"71\">380</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"71\">JGF6D-4II</td>\r\n			<td width=\"71\">220</td>\r\n			<td width=\"71\">0.75</td>\r\n			<td width=\"71\">1450</td>\r\n			<td width=\"71\">12000</td>\r\n			<td width=\"71\">65</td>\r\n			<td width=\"71\">78</td>\r\n			<td width=\"71\">50</td>\r\n		</tr>\r\n	</tbody>\r\n</table>');

-- --------------------------------------------------------

--
-- Table structure for table `lh_baiviet_chitiet`
--

CREATE TABLE `lh_baiviet_chitiet` (
  `id` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `tenbaiviet_vi` varchar(255) DEFAULT NULL,
  `tenbaiviet_en` varchar(255) DEFAULT NULL,
  `noidung_vi` text,
  `noidung_en` text,
  `step` int(11) NOT NULL DEFAULT '0',
  `seo_name` varchar(255) DEFAULT NULL,
  `catasort` int(11) NOT NULL DEFAULT '0',
  `showhi` tinyint(1) NOT NULL DEFAULT '1',
  `duongdantin` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `seo_title_vi` varchar(255) DEFAULT NULL,
  `seo_title_en` varchar(255) DEFAULT NULL,
  `seo_keywords_vi` varchar(255) DEFAULT NULL,
  `seo_keywords_en` varchar(255) DEFAULT NULL,
  `seo_description_vi` varchar(255) DEFAULT NULL,
  `seo_description_en` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lh_baiviet_chitiet`
--

INSERT INTO `lh_baiviet_chitiet` (`id`, `id_parent`, `tenbaiviet_vi`, `tenbaiviet_en`, `noidung_vi`, `noidung_en`, `step`, `seo_name`, `catasort`, `showhi`, `duongdantin`, `icon`, `seo_title_vi`, `seo_title_en`, `seo_keywords_vi`, `seo_keywords_en`, `seo_description_vi`, `seo_description_en`) VALUES
(4, 134, 'Hệ Thống Đèn Pha, Xi Nhan Thiết Kế Cổ Điển', 'Headlight System, Xi Nhan Classic Design', '<p>Với chiếc đ&egrave;n pha to tr&ograve;n cổ điển được bao bọc bởi viền kim loại sang trọng, kết hợp với 2 xi nhan được thiết kế ở 2 b&ecirc;n tay l&aacute;i m&agrave;u v&agrave;ng gi&uacute;p thuận tiện di chuyển khi tham gia giao th&ocirc;ng.</p>', '<p>With a large round headlight classic surrounded by luxurious metal rim, combined with 2 turn signals designed on both sides of the yellow steering wheel to facilitate moving when participating in traffic.</p>', 0, 'he-thong-den-pha-xi-nhan-thiet-ke-co-dien', 1, 1, '', '', 'Hệ Thống Đèn Pha, Xi Nhan Thiết Kế Cổ Điển', 'Headlight System, Xi Nhan Classic Design', 'Hệ Thống Đèn Pha, Xi Nhan Thiết Kế Cổ Điển', 'Headlight System, Xi Nhan Classic Design', 'Hệ Thống Đèn Pha, Xi Nhan Thiết Kế Cổ Điển', 'Headlight System, Xi Nhan Classic Design'),
(5, 176, 'Hệ Thống Đèn Pha, Xi Nhan Thiết Kế Cổ Điển', 'Headlight System, Xi Nhan Classic Design', '<p>Với chiếc đ&egrave;n pha to tr&ograve;n cổ điển được bao bọc bởi viền kim loại sang trọng, kết hợp với 2 xi nhan được thiết kế ở 2 b&ecirc;n tay l&aacute;i m&agrave;u v&agrave;ng gi&uacute;p thuận tiện di chuyển khi tham gia giao th&ocirc;ng.</p>', '<p>With a large round headlight classic surrounded by luxurious metal rim, combined with 2 turn signals designed on both sides of the yellow steering wheel to facilitate moving when participating in traffic.</p>', 0, 'he-thong-den-pha-xi-nhan-thiet-ke-co-dien', 6, 1, 'datafiles/setone', '1577949717_14.jpg', 'Hệ Thống Đèn Pha, Xi Nhan Thiết Kế Cổ Điển', 'Headlight System, Xi Nhan Classic Design', 'Hệ Thống Đèn Pha, Xi Nhan Thiết Kế Cổ Điển', 'Headlight System, Xi Nhan Classic Design', 'Hệ Thống Đèn Pha, Xi Nhan Thiết Kế Cổ Điển', 'Headlight System, Xi Nhan Classic Design'),
(9, 176, 'Bánh Xe Lớn, Vận Hành Êm Ái', 'Big Wheel, Smooth Operation', '<p>Xe Cub Halim sử dụng b&aacute;nh xe lớn v&agrave;nh nan hoa, lốp c&oacute; săm, kết hợp ống lồng giảm chất thủy lực Gi&uacute;p xe vận h&agrave;nh &ecirc;m &aacute;i tr&ecirc;n mọi nẻo đường. V&agrave; c&oacute; thể dễ d&agrave;ng sửa chữa khi gặp sự cố như: c&aacute;n đinh, x&igrave; lốp&hellip;</p>', '<p>Cub Halim vehicles use big spokes wheels, tires with tubes, combined with hydraulic reduction telescopes to help the car operate smoothly on all roads. And can be easily repaired in case of incidents such as: rolling nails, flat tires ...</p>', 0, 'banh-xe-lon-van-hanh-em-ai', 2, 1, 'datafiles/setone', '1577950378_18.jpg', 'Bánh Xe Lớn, Vận Hành Êm Ái', 'Big Wheel, Smooth Operation', 'Bánh Xe Lớn, Vận Hành Êm Ái', 'Big Wheel, Smooth Operation', 'Bánh Xe Lớn, Vận Hành Êm Ái', 'Big Wheel, Smooth Operation'),
(6, 176, 'Mặt Đồng Hồ Điện Tử Xe Cub Halim', 'Electronic Clockwork Car Cub Halim', '<p>Nhằm hướng tới sự tối giản, th&acirc;n thiện với người d&ugrave;ng th&igrave; ở mặt động hồ xe cub halim c&oacute; thiết kế kh&aacute; đơn giản, với kiểu bo tr&ograve;n. V&agrave; tr&ecirc;n đ&acirc;y cũng hiển thị đầy đủ c&aacute;c th&ocirc;ng tin như: vận tốc, qu&atilde;ng đường, kim xăng, xi nhan, đ&egrave;n pha.</p>', '<p>In the direction of minimalism, user-friendliness, the surface of the halim tank is quite simple, with a rounded shape. And above it also displays full information such as speed, distance, petrol, turn signals, headlights.</p>', 0, 'mat-dong-ho-dien-tu-xe-cub-halim', 5, 1, 'datafiles/setone', '1577950361_15.jpg', 'Mặt Đồng Hồ Điện Tử Xe Cub Halim', 'Electronic Clockwork Car Cub Halim', 'Mặt Đồng Hồ Điện Tử Xe Cub Halim', 'Electronic Clockwork Car Cub Halim', 'Mặt Đồng Hồ Điện Tử Xe Cub Halim', 'Electronic Clockwork Car Cub Halim'),
(7, 176, 'Khung Xe Chắc Chắn, Vỏ Xe Chất Lượng', 'Sure Chassis, Quality Tires', '<p>Xe cub halim c&oacute; khung xe được thiết kế rất chắc chắn v&agrave; cứng c&aacute;p với vật liệu l&agrave;m bằng kim loại chống gỉ cao cấp hiện nay. Gi&uacute;p xe lu&ocirc;n bền bỉ l&acirc;u d&agrave;i trong thời gian sử dụng. Kết hợp với vỏ xe được l&agrave;m bằng nhựa ABS-PP si&ecirc;u bền, si&ecirc;u chịu lực.</p>', '<p>The halim cub car has a very strong and rigid chassis with materials made of high-quality metal rust today. Helps the car to last long in the use. Combined with the tire casing made of ABS-PP super durable, super bearing.</p>', 0, 'khung-xe-chac-chan-vo-xe-chat-luong', 4, 1, 'datafiles/setone', '1577950378_16.jpg', 'Khung Xe Chắc Chắn, Vỏ Xe Chất Lượng', 'Sure Chassis, Quality Tires', 'Khung Xe Chắc Chắn, Vỏ Xe Chất Lượng', 'Sure Chassis, Quality Tires', 'Khung Xe Chắc Chắn, Vỏ Xe Chất Lượng', 'Sure Chassis, Quality Tires'),
(8, 176, 'Cụm Đèn Hậu, Xi Nhan Cân Đối', 'Tail Light, Xi Nhan Balance', '<p>Đ&egrave;n hậu v&agrave; xi nhan sau được thiết kế với &aacute;nh s&aacute;ng đỏ, v&agrave;ng nổi bật. Gi&uacute;p cho người sau biết ch&iacute;nh x&aacute;c t&igrave;nh trạng di chuyển của xe m&igrave;nh. Đồng thời n&oacute; cũng được bảo vệ với bộ khung kim loại chắc chắn, hạn chế t&igrave;nh trạng va đập, bể vỡ đ&egrave;n khi sử dụng.</p>', '<p>The rear lights and turn signals are designed with striking red and yellow light. Help the following people know the exact status of their vehicles. At the same time, it is also protected with a sturdy metal frame, limiting the impact of damage, broken lights when in use.</p>', 0, 'cum-den-hau-xi-nhan-can-doi', 3, 1, 'datafiles/setone', '1577950378_17.jpg', 'Cụm Đèn Hậu, Xi Nhan Cân Đối', 'Tail Light, Xi Nhan Balance', 'Cụm Đèn Hậu, Xi Nhan Cân Đối', 'Tail Light, Xi Nhan Balance', 'Cụm Đèn Hậu, Xi Nhan Cân Đối', 'Tail Light, Xi Nhan Balance'),
(10, 176, 'Phuộc Sau Xe Cub Halim', 'Rear Suspension With Cub Halim', '<p>Nhằm gi&uacute;p xe vận h&agrave;nh ổn định, &ecirc;m &aacute;i v&agrave; c&oacute; thể tải trọng lớn th&igrave; phuộc sau của xe được l&agrave;m bằng l&ograve; xo trụ giảm chấn thủy lực. Gi&uacute;p xe kh&ocirc;ng bị sốc, rung lắc khi di chuyển.</p>', '<p>In order to help the car operate stably, smoothly and with a large load, the rear fork of the car is made of hydraulic shock absorber springs. Helps the car not to be shocked, shaken when moving.</p>', 0, 'phuoc-sau-xe-cub-halim', 1, 1, 'datafiles/setone', '1577950379_19.jpg', 'Phuộc Sau Xe Cub Halim', 'Rear Suspension With Cub Halim', 'Phuộc Sau Xe Cub Halim', 'Rear Suspension With Cub Halim', 'Phuộc Sau Xe Cub Halim', 'Rear Suspension With Cub Halim'),
(11, 43, 'LƯU LƯỢNG LỚN, ĐỘ ỒN THẤP', 'LARGE FLOW, LOW NOISE', '<p>Độ ồn cực thấp do d&ograve;ng kh&iacute; được tạo ra chạy dọc theo hướng c&aacute;nh loại bỏ ho&agrave;n to&agrave;n c&aacute;c v&ugrave;ng xo&aacute;y gi&uacute;p quạt c&oacute; độ ồn thấp hơn những d&ograve;ng quạt hướng trục th&ocirc;ng thường.</p>', '<p>Extremely low noise due to the airflow generated along the vane direction completely eliminates swirling areas, resulting in lower noise fans than conventional axial fans.</p>', 0, '312', 3, 1, 'datafiles', '1584953209_01.png', '312', 'LARGE FLOW, LOW NOISE', '312', 'LARGE FLOW, LOW NOISE', '312', 'LARGE FLOW, LOW NOISE'),
(12, 43, 'CÔNG NGHỆ SẢN XUẤT HIỆN ĐẠI', 'MODERN PRODUCTION TECHNOLOGY', '<p>Quạt được sản xuất bằng c&ocirc;ng nghệ CNC nhập khẩu từ Ch&acirc;u &Acirc;u được điều khiển tự động, độ ch&iacute;nh x&aacute;c cao, tiết kiệm nguy&ecirc;n vật liệu gi&uacute;p giảm gi&aacute; th&agrave;nh, r&uacute;t ngắn thời gian đặt h&agrave;ng.</p>', '<p>The fan is manufactured by CNC technology imported from Europe, which is controlled automatically, with high accuracy, saving raw materials, reducing costs and shortening order time.</p>', 0, 'cong-nghe-san-xuat-hien-dai', 2, 1, 'datafiles', '1584953237_02.png', 'CÔNG NGHỆ SẢN XUẤT HIỆN ĐẠI', 'MODERN PRODUCTION TECHNOLOGY', 'CÔNG NGHỆ SẢN XUẤT HIỆN ĐẠI', 'MODERN PRODUCTION TECHNOLOGY', 'CÔNG NGHỆ SẢN XUẤT HIỆN ĐẠI', 'MODERN PRODUCTION TECHNOLOGY'),
(13, 43, 'ĐỘNG CƠ CHẤT LƯỢNG CAO', 'HIGH QUALITY ENGINE', '<p>D&ograve;ng quạt AXP được Phương Linh lắp những động cơ của c&aacute;c h&agrave;ng nổi tiếng như Việt Hung, Điện Cơ, Teco (Đ&agrave;i Loan), ABB (Thụy điển), Simems (Đức), ATT (Singapore), Bonfi (&Yacute;),...</p>', '<p>AXP fans are installed by Phuong Linh with engines of famous products such as Viet Hung, Dien Co, Teco (Taiwan), ABB (Sweden), Simems (Germany), ATT (Singapore), Bonfi (Italy). ..</p>', 0, 'dong-co-chat-luong-cao', 1, 1, 'datafiles', '1584953289_03.png', 'ĐỘNG CƠ CHẤT LƯỢNG CAO', 'HIGH QUALITY ENGINE', 'ĐỘNG CƠ CHẤT LƯỢNG CAO', 'HIGH QUALITY ENGINE', 'ĐỘNG CƠ CHẤT LƯỢNG CAO', 'HIGH QUALITY ENGINE');

-- --------------------------------------------------------

--
-- Table structure for table `lh_baiviet_img`
--

CREATE TABLE `lh_baiviet_img` (
  `id` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenbaiviet_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenbaiviet_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `duongdantin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `the_loai` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lh_baiviet_img`
--

INSERT INTO `lh_baiviet_img` (`id`, `id_parent`, `icon`, `tenbaiviet_vi`, `tenbaiviet_en`, `sort`, `duongdantin`, `the_loai`) VALUES
(1, 67, '1584953383_2.jpg', NULL, NULL, 0, 'datafiles', 0),
(2, 67, '1584953383_3.jpg', NULL, NULL, 1, 'datafiles', 0),
(3, 67, '1584953384_7.jpg', NULL, NULL, 2, 'datafiles', 0),
(4, 67, '1584953384_1.jpg', NULL, NULL, 3, 'datafiles', 0),
(5, 67, '1584953384_4.jpg', NULL, NULL, 4, 'datafiles', 0),
(6, 67, '1584953384_5.jpg', NULL, NULL, 5, 'datafiles', 0),
(7, 67, '1584953384_6.jpg', NULL, NULL, 6, 'datafiles', 0),
(8, 67, '1584953384_8.jpg', NULL, NULL, 7, 'datafiles', 0),
(9, 67, '1584953384_9.jpg', NULL, NULL, 8, 'datafiles', 0),
(10, 49, '1585102487_1.jpg', NULL, NULL, 0, 'datafiles', 0),
(11, 49, '1585102487_9.jpg', NULL, NULL, 1, 'datafiles', 0),
(12, 49, '1585102488_4.jpg', NULL, NULL, 2, 'datafiles', 0),
(13, 49, '1585102488_2.jpg', NULL, NULL, 3, 'datafiles', 0),
(14, 49, '1585102488_5.jpg', NULL, NULL, 4, 'datafiles', 0),
(15, 49, '1585102488_6.jpg', NULL, NULL, 5, 'datafiles', 0),
(16, 49, '1585102488_3.jpg', NULL, NULL, 6, 'datafiles', 0),
(17, 49, '1585102488_7.jpg', NULL, NULL, 7, 'datafiles', 0),
(18, 49, '1585102488_8.jpg', NULL, NULL, 8, 'datafiles', 0),
(19, 43, '1585102835_2.jpg', NULL, NULL, 0, 'datafiles', 0),
(20, 43, '1585102836_3.jpg', NULL, NULL, 1, 'datafiles', 0),
(21, 43, '1585102836_7.jpg', NULL, NULL, 2, 'datafiles', 0),
(22, 43, '1585102836_11.jpg', NULL, NULL, 3, 'datafiles', 0),
(23, 43, '1585102836_13.jpg', NULL, NULL, 4, 'datafiles', 0),
(24, 43, '1585102836_14.jpg', NULL, NULL, 5, 'datafiles', 0),
(25, 43, '1585102836_1.jpg', NULL, NULL, 6, 'datafiles', 0),
(26, 43, '1585102836_4.jpg', NULL, NULL, 7, 'datafiles', 0),
(27, 43, '1585102836_5.jpg', NULL, NULL, 8, 'datafiles', 0),
(28, 43, '1585102836_6.jpg', NULL, NULL, 9, 'datafiles', 0),
(29, 43, '1585102836_8.jpg', NULL, NULL, 10, 'datafiles', 0),
(30, 43, '1585102836_9.jpg', NULL, NULL, 11, 'datafiles', 0),
(31, 43, '1585102836_10.jpg', NULL, NULL, 12, 'datafiles', 0),
(32, 43, '1585102836_12.jpg', NULL, NULL, 13, 'datafiles', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lh_baiviet_sao`
--

CREATE TABLE `lh_baiviet_sao` (
  `id` int(11) NOT NULL,
  `id_baiviet` int(11) NOT NULL DEFAULT '0',
  `sao_1` int(11) NOT NULL DEFAULT '0',
  `sao_2` int(11) NOT NULL DEFAULT '0',
  `sao_3` int(11) NOT NULL DEFAULT '0',
  `sao_4` int(11) NOT NULL DEFAULT '0',
  `sao_5` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lh_baiviet_sao`
--

INSERT INTO `lh_baiviet_sao` (`id`, `id_baiviet`, `sao_1`, `sao_2`, `sao_3`, `sao_4`, `sao_5`) VALUES
(1, 176, 1, 1, 1, 2, 5),
(2, 175, 0, 0, 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lh_baiviet_select_tinhnang`
--

CREATE TABLE `lh_baiviet_select_tinhnang` (
  `id` int(11) NOT NULL,
  `id_baiviet` int(11) NOT NULL DEFAULT '0',
  `id_tinhnang` int(11) NOT NULL DEFAULT '0',
  `id_val` varchar(255) DEFAULT NULL,
  `id_tinhnang_2` int(11) NOT NULL DEFAULT '0',
  `gia` int(11) NOT NULL DEFAULT '0',
  `mota_vi` varchar(255) DEFAULT NULL,
  `mota_en` varchar(255) DEFAULT NULL,
  `loaihienthi` tinyint(4) NOT NULL DEFAULT '0',
  `show` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lh_baiviet_thuoctinh`
--

CREATE TABLE `lh_baiviet_thuoctinh` (
  `id` bigint(20) NOT NULL,
  `id_sp` int(11) NOT NULL DEFAULT '0',
  `phien_ban` text,
  `gia` int(11) NOT NULL DEFAULT '0',
  `catasort` int(11) NOT NULL DEFAULT '0',
  `showhi` tinyint(1) NOT NULL DEFAULT '1',
  `key_update` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lh_baiviet_tinhnang`
--

CREATE TABLE `lh_baiviet_tinhnang` (
  `id` int(11) NOT NULL,
  `id_kietxuat` int(11) NOT NULL DEFAULT '0',
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `tenbaiviet_vi` varchar(255) DEFAULT NULL,
  `tenbaiviet_en` varchar(255) DEFAULT NULL,
  `tenbaiviet_cn` varchar(255) DEFAULT NULL,
  `tenbaiviet_jp` varchar(255) DEFAULT NULL,
  `catasort` int(11) NOT NULL DEFAULT '0',
  `loai_hienthi` tinyint(4) NOT NULL DEFAULT '0',
  `ma_mau` varchar(255) DEFAULT NULL,
  `showhi` tinyint(4) NOT NULL DEFAULT '1',
  `step` int(11) NOT NULL DEFAULT '0',
  `val_min` int(11) NOT NULL DEFAULT '0',
  `val_max` int(11) NOT NULL DEFAULT '0',
  `tieu_bieu` tinyint(4) NOT NULL DEFAULT '0',
  `noi_bat` tinyint(4) NOT NULL DEFAULT '0',
  `tim_kiem` tinyint(4) NOT NULL DEFAULT '0',
  `only_timkiem` tinyint(4) NOT NULL DEFAULT '0',
  `duongdantin` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `khong_xoa` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lh_banner`
--

CREATE TABLE `lh_banner` (
  `id` int(12) NOT NULL,
  `id_danhmuc` int(11) NOT NULL DEFAULT '0',
  `tenbaiviet_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenbaiviet_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenbaiviet_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota_cn` text COLLATE utf8_unicode_ci,
  `noidung_vi` text COLLATE utf8_unicode_ci,
  `noidung_en` text COLLATE utf8_unicode_ci,
  `noidung_cn` text COLLATE utf8_unicode_ci,
  `id_parent` int(11) DEFAULT NULL,
  `id_kietxuat` int(11) NOT NULL DEFAULT '0',
  `seo_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catasort` int(20) DEFAULT '0',
  `icon` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `check_video` tinyint(1) NOT NULL DEFAULT '0',
  `ngaydang` int(11) NOT NULL DEFAULT '0',
  `showhi` tinyint(2) NOT NULL DEFAULT '1',
  `duongdantin` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blank` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Bang chua catalag News' ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `lh_banner`
--

INSERT INTO `lh_banner` (`id`, `id_danhmuc`, `tenbaiviet_vi`, `tenbaiviet_en`, `tenbaiviet_cn`, `mota_vi`, `mota_en`, `mota_cn`, `noidung_vi`, `noidung_en`, `noidung_cn`, `id_parent`, `id_kietxuat`, `seo_name`, `catasort`, `icon`, `video`, `check_video`, `ngaydang`, `showhi`, `duongdantin`, `p1`, `blank`) VALUES
(1, 0, 'THÊM GIÁ TRỊ MỖI NGÀY', 'ADD VALUES EVERY DAY', '', '', '', '', '', '', '', 16, 0, '', 1, '1584938538_banner_3.jpg', NULL, 0, 1584938386, 1, 'datafiles', NULL, ''),
(2, 0, 'THÊM GIÁ TRỊ MỖI NGÀY', 'ADD VALUES EVERY DAY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 0, NULL, 2, '1584938538_banner_2.jpg', NULL, 0, 1584938386, 1, 'datafiles', NULL, NULL),
(3, 0, 'THÊM GIÁ TRỊ MỖI NGÀY', 'ADD VALUES EVERY DAY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 0, NULL, 3, '1584938538_banner_1.jpg', NULL, 0, 1584938386, 1, 'datafiles', NULL, NULL),
(4, 0, 'Uy Tín Hàng Đầu', 'Top Reputation', '', '', '', '', '', '', '', 25, 0, '', 1, '1585045009_12.png', NULL, 0, 1585045009, 1, 'datafiles', NULL, ''),
(5, 0, 'Giá Cả Cạnh Tranh', 'Competitive price', '', '', '', '', '', '', '', 25, 0, '', 2, '1585045037_11.png', NULL, 0, 1585045037, 1, 'datafiles', NULL, ''),
(6, 0, 'Sản phẩm đa dạng', 'Diverse products', '', '', '', '', '', '', '', 25, 0, '', 3, '1585045063_14.png', NULL, 0, 1585045063, 1, 'datafiles', NULL, ''),
(7, 0, 'Giao hàng nhanh chóng', 'Fast shipping', '', '', '', '', '', '', '', 25, 0, '', 4, '1585045086_13.png', NULL, 0, 1585045086, 1, 'datafiles', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `lh_banner_danhmuc`
--

CREATE TABLE `lh_banner_danhmuc` (
  `id` int(11) NOT NULL,
  `tenbaiviet_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenbaiviet_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catasort` int(11) NOT NULL DEFAULT '0',
  `showhi` tinyint(2) NOT NULL DEFAULT '1',
  `ngaydang` int(15) NOT NULL DEFAULT '0',
  `cao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_mota` tinyint(4) NOT NULL DEFAULT '0',
  `is_noidung` tinyint(4) NOT NULL DEFAULT '0',
  `is_lienket` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `lh_banner_danhmuc`
--

INSERT INTO `lh_banner_danhmuc` (`id`, `tenbaiviet_vi`, `tenbaiviet_en`, `catasort`, `showhi`, `ngaydang`, `cao`, `rong`, `is_mota`, `is_noidung`, `is_lienket`) VALUES
(16, 'Slider trang chủ', '', 13, 1, 1584938068, '1000', '1600', 0, 0, 0),
(26, 'Ảnh triệu xuân', '', 17, 0, 1584062819, '130', '130', 0, 0, 0),
(27, 'Slider thịnh hành', '', 18, 0, 1583722141, '350', '715', 0, 0, 1),
(25, 'Uu tin hàng đầu', '', 200, 1, 1585044942, '200', '200', 0, 0, 0),
(28, 'Our Experts', '', 19, 0, 1578794527, '200', '200', 0, 0, 0),
(29, 'Trust From Our Clients And Partners', '', 21, 0, 1578808172, '70', '130', 0, 0, 0),
(30, 'Ảnh nền chân trang', '', 22, 0, 1562053162, '800', '1600', 0, 0, 0),
(32, 'Slider video', '', 17, 0, 1583722123, '350', '715', 0, 0, 1),
(31, 'Welcome To The 4Es', '', 20, 0, 1578797552, '100', '100', 0, 0, 0),
(33, 'Ảnh nền triết lý kinh doanh', '', 24, 0, 1556338115, '1000', '1600', 0, 0, 0),
(34, 'Ảnh danh mục sản phẩm', '', 25, 0, 1577419053, '75', '1200', 0, 0, 0),
(36, 'Ảnh quảng cáo chi tiết sản phẩm', '', 26, 0, 1577957138, '100', '380', 0, 0, 0),
(37, 'Hình ảnh chi tiết sản phẩm bên phải', '', 27, 0, 1578020163, 'auto', '340', 0, 0, 0),
(38, 'Ảnh menu danh muc', '', 28, 0, 1572593344, '320', '450', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lh_binhluan`
--

CREATE TABLE `lh_binhluan` (
  `id` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL DEFAULT '0',
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `tenbaiviet_vi` varchar(255) DEFAULT NULL,
  `noidung_vi` text,
  `ngay_dang` int(11) NOT NULL DEFAULT '0',
  `luot_thich` int(11) NOT NULL DEFAULT '0',
  `ip_gui` varchar(255) DEFAULT NULL,
  `showhi` tinyint(1) NOT NULL DEFAULT '1',
  `is_nuti` tinyint(1) NOT NULL DEFAULT '0',
  `loai_binhluan` tinyint(4) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lh_binhluan`
--

INSERT INTO `lh_binhluan` (`id`, `id_sp`, `id_parent`, `tenbaiviet_vi`, `noidung_vi`, `ngay_dang`, `luot_thich`, `ip_gui`, `showhi`, `is_nuti`, `loai_binhluan`, `uid`) VALUES
(35, 176, 0, 'Kolani Design', 'Làm tốt lắm. Hãy luôn tạo. Bạn có một tài năng tuyệt vời!', 1578124291, 0, '::1', 1, 0, 0, 104),
(34, 176, 0, 'Kolani Design', 'Làm tốt lắm. Hãy luôn tạo. Bạn có một tài năng tuyệt vời!', 1578124241, 0, '::1', 1, 0, 0, 104),
(43, 176, 0, 'Nguyên Lâm', 'Đường bị ngập có ảnh hưởng đến moto không', 1578275285, 0, '::1', 1, 0, 1, 0),
(44, 176, 0, 'Nguyên Lâm', 'Đường bị ngập có ảnh hưởng đến moto không', 1578275350, 0, '::1', 1, 0, 1, 0),
(45, 176, 44, 'Admin', 'Đa số các loại xe điện đều chịu nước tốt bạn nhé, nhưng hãng khuyến cáo không nên đi vào chỗ ngập nước quá lâu. Còn đi trời mưa, rửa xe thoải mái bạn nhé.', 1578276123, 0, '::1', 1, 0, 1, 0),
(46, 176, 43, 'Admin', 'Đa số các loại xe điện đều chịu nước tốt bạn nhé, nhưng hãng khuyến cáo không nên đi vào chỗ ngập nước quá lâu. Còn đi trời mưa, rửa xe thoải mái bạn nhé.', 1578276759, 0, '::1', 1, 0, 1, 0),
(47, 176, 44, 'Admin', 'Đa số các loại xe điện đều chịu nước tốt bạn nhé, nhưng hãng khuyến cáo không nên đi vào chỗ ngập nước quá lâu. Còn đi trời mưa, rửa xe thoải mái bạn nhé.', 1578276868, 0, '::1', 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lh_clanguage`
--

CREATE TABLE `lh_clanguage` (
  `id` int(11) NOT NULL,
  `code_lang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nhom` int(11) NOT NULL DEFAULT '0',
  `showhi` tinyint(1) NOT NULL DEFAULT '1',
  `lang_jp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lh_clanguage`
--

INSERT INTO `lh_clanguage` (`id`, `code_lang`, `lang_vi`, `lang_en`, `lang_cn`, `nhom`, `showhi`, `lang_jp`) VALUES
(1, 'trang_chu', 'Trang chủ', 'Home', '', 0, 1, ''),
(58, 'lien_he', 'Liên hệ', 'Contact', '联系我们', 5, 1, 'お問い合わせ'),
(19, 'date', 'Ngày', 'Day', '天', 5, 1, '日'),
(20, 'thu_hai', 'Thứ hai', 'Monday', '第二', 5, 1, '二番目'),
(21, 'thu_ba', 'Thứ ba', 'Tuesday', '第三', 5, 1, '三番目'),
(22, 'thu_tu', 'Thứ tư', 'Wednesday', '第四', 5, 1, '四番目'),
(23, 'thu_nam', 'Thứ năm', 'Thursday', '星期四', 5, 1, '五番目'),
(24, 'thu_sau', 'Thứ sáu', 'Friday', '星期五', 5, 1, '金曜日'),
(25, 'thu_bay', 'Thứ bảy', 'Saturday', '第七', 5, 1, '土曜日'),
(26, 'chu_nhat', 'Chủ nhật', 'Sunday', '星期天', 5, 1, '日曜日'),
(28, 'thong_tin_bat_buoc', '(*) Thông tin bắt buộc', '(*) Required Information', '*）必填信息', 5, 1, '（*）必要な情報'),
(29, 'ho_va_ten', 'Họ & tên', 'Full name', '名字和姓氏', 5, 1, '名前と姓'),
(30, 'so_dien_thoai', 'Số điện thoại', 'Phone number', '电话号码', 5, 1, '電話番号'),
(31, 'email', 'Email', 'Email', '', 5, 1, ''),
(32, 'dia_chi', 'Địa chỉ', 'Address', '地址', 5, 1, '住所'),
(33, 'tieu_de', 'Tiêu đề', 'Title', '标题', 5, 1, 'タイトル'),
(34, 'noi_dung', 'Mô tả', 'Description', '', 5, 1, ''),
(35, 'ma_bao_ve', 'Mã bảo vệ', 'Security Code', '安全码', 5, 1, 'セキュリティコード'),
(36, 'gui', 'Gửi', 'Submit', '', 5, 1, ''),
(37, 'lam_lai', 'Làm lại', 'Rework, do it again', '翻拍', 5, 1, 'やり直し'),
(38, 'nhap_so_dien_thoai', 'Vui lòng nhập số điện thoại!', 'Please enter the phone number!', '请输入电话号码！', 5, 1, '電話番号を入力してください！'),
(39, 'nhap_ho_ten', 'Vui lòng nhập họ tên!', 'Please enter your full name!', '请输入名字！', 5, 1, '名前を入力してください！'),
(40, 'dia_chi_email_khong_hop_le', 'Địa chỉ Email không hợp lệ!', 'Email address is not valid!', '电子邮件地址无效！', 5, 1, '無効なメールアドレス！'),
(41, 'nhap_tieu_de', 'Vui lòng nhập tiêu đề!', 'Please enter a title!', '请输入标题！', 5, 1, 'タイトルを入力してください！'),
(412, 'vui_long_nhap_ma_bao_ve', 'Vui lòng nhập mã bảo vệ!', 'Please enter the security code!', '请输入安全码！', 5, 1, 'セキュリティコードを入力してください！'),
(43, 'yeu_cau_cua_ban_da_duoc_gui', 'Yêu cầu của bạn đã được gửi!', 'Your request has been sent!', '您的请求已发送！', 5, 1, 'あなたのリクエストは送信されました！'),
(44, 've_trang_chu', 'Quay về trang chủ', 'Return to the homepage', '', 5, 1, ''),
(62, 'gia', 'Giá', 'Price', '价格:', 3, 1, ''),
(67, 've_trang_truoc', 'về trang trước', 'Go to the previous page', '关于上一页', 5, 1, '前のページについて'),
(74, 'xem_chi_tiet', 'Xem chi tiết', 'More info', '', 5, 1, ''),
(78, 'dang_ky_nhan_ban_tin', 'NHẬN BẢN TIN KHUYẾN MÃI', 'RECEIVE THE PROMOTION NEWSLETTER', '', 4, 0, ''),
(79, 'test_dang_ky_nhan_ban_tin', 'Nhập e-mail nhận bản tin khuyến mại...', 'Enter email to receive promotional news ...', '', 4, 0, ''),
(80, 'nhap_email_cua_ban', 'Nhập địa chỉ email...', 'Enter your email address...', '输入邮箱地址......', 4, 0, 'メールアドレスを入力してください...'),
(81, 'dang_ky', 'Đăng ký', 'Registration', '', 1, 0, ''),
(82, 'them_dia_chi_email_thanh_cong', 'Thêm địa chỉ Email thành công!', 'Add Successful Email Address!', '添加成功电邮地址！', 4, 0, '成功したメールアドレスを追加してください！'),
(83, 'dia_chi_email_da_ton_tai', 'Địa chỉ Email đã tồn tại!', 'Email Address already exists!', 'メールアドレスは既に存在します！', 4, 0, '电子邮件地址已存在！'),
(85, 'nhap_dia_chi', 'Vui lòng nhập địa chỉ của bạn!', 'Please enter your address!', '请输入你的地址！', 5, 1, ''),
(86, 'nhap_noi_dung', 'Vui lòng nhập nội dung!', 'Please enter content!', '请输入内容！', 5, 1, '内容を入力してください！'),
(89, 'luot_xem', 'lượt xem', 'view', '', 3, 1, ''),
(146, 'dat_hang', 'Đặt hàng', 'Order', '', 2, 0, ''),
(118, 'email_da_duoc_dang_ky', 'Rất tiết! Email này đã được đăng ký!', 'Sorry! This email is already registered!', '天气很好！ 此电子邮件已经注册！', 4, 0, 'かなり天気！ このメールは既に登録されています！'),
(277, 'so_dien_thoai_khong_hop_le', 'Số điện thoại không hợp lệ!', 'Invalid phone number!', '无效的电话号码！', 5, 1, '電話番号が無効です！'),
(183, 'alert_dat_hang', 'Dữ liệu không hợp lệ!', 'Invalid data!', '无效的数据！', 2, 0, ''),
(180, 'so_luong', 'Số lượng', 'Amount', '数量', 2, 0, ''),
(544, 'nhap_tu_khoa_tim_kiem', 'Nhập từ khóa tìm kiếm...', 'Enter search keywords...', '', 5, 1, ''),
(187, 'cart_hinh', 'Hình ảnh', 'Image', '图片', 2, 0, ''),
(188, 'cart_ten_sp', 'Tên sản phẩm', 'Product\'s name', '', 2, 0, ''),
(189, 'cart_ma_sp', 'Mã sản phẩm', 'Product code', '', 2, 1, ''),
(191, 'cart_dongia', 'Đơn giá (VNĐ)', 'Unit Price VND)', '单价（VND）', 2, 0, ''),
(192, 'cart_thanhtien', 'Thành tiền (VNĐ)', 'Money (VND)', '金额（VND）', 2, 0, ''),
(193, 'cart_thaotac', 'Thao tác', 'Manipulation', '操作', 2, 0, ''),
(194, 'hien_chua_co_san_pham_nao_trong_gio_hang', 'Hiện chưa có sản phẩm nào trong giỏ hàng!', 'There are currently no products in the shopping cart!', '购物车中没有产品！', 2, 0, ''),
(195, 'tiep_tuc_mua_hang', 'Tiếp tục mua hàng', 'Continue buying', '继续购物', 2, 0, ''),
(196, 'gio_hang', 'Giỏ hàng', 'Cart', '购物车', 2, 0, ''),
(197, 'cart_xoa', 'Xóa', 'Erase', '抹去', 2, 0, ''),
(198, 'ban_that_su_muon_xoa', 'Bạn thật sự muốn xóa ?', 'Do you really want to delete?', '你真的想删除吗？', 2, 0, ''),
(199, 'cart_tong_tien', 'Tổng tiền', 'Total money', '总金额', 2, 0, ''),
(200, 'gui_don_hang', 'Gửi đơn hàng', 'Submit order', '提交订单', 2, 0, ''),
(201, 'title_dat_hang', 'Đặt hàng', 'Order', '顺序', 2, 0, ''),
(202, 'chinh_sua_don_hang', 'Chỉnh sửa đơn hàng', 'Edit orders', '编辑订单', 2, 0, ''),
(203, 'thong_tin_nguoi_mua_hang', 'THÔNG TIN NGƯỜI MUA HÀNG', 'BUYER INFORMATION', '买方信息', 2, 0, ''),
(204, 'cart_dia_chi', 'Địa chỉ giao hàng (*)', 'Delivery address (*)', '送货地址（*）', 2, 0, ''),
(205, 'phuong_thuc_thanh_toan', 'Phương thức thanh toán', 'Payment methods', '付款方式', 2, 0, ''),
(206, 'thanh_toan_tien_mat', 'Thanh toán khi nhận hàng', 'Payment on delivery', '现金付款（COD）', 2, 0, ''),
(207, 'thanh_toan_chuyen_khoan', 'Thanh toán qua chuyển khoản', 'Payment via bank transfer', '通过银行转帐付款', 2, 0, ''),
(208, 'cart_tieu_de', 'Tiêu đề', 'Title', '', 2, 0, ''),
(209, 'cart_nhap_dia_chi', 'Vui lòng nhập địa chỉ giao hàng!', 'Please enter the shipping address!', '', 2, 0, ''),
(210, 'thong_tin_dat_hang', 'THÔNG TIN ĐẶT HÀNG', 'ORDER INFORMATION', '订单信息', 2, 0, ''),
(211, 'don_hang_cua_ban_da_duoc_gui', 'Đơn hàng của bạn đã được gửi!', 'Your order has been sent!', '您的订单已发送！', 2, 0, ''),
(214, 'ma_dh', 'Mã đơn hàng', 'Code orders', '订购代码', 2, 0, ''),
(216, 'thong_tin_don_hang', 'Thông tin đơn hàng', 'Information line', '订单信息', 2, 0, ''),
(217, 'ngay_dat', 'Ngày đặt', 'Date set', '设定日期', 2, 0, ''),
(218, 'trang_thai', 'Trạng thái', 'Status', '状态', 2, 0, ''),
(220, 'don_hang_moi', 'Đơn hàng mới', 'New orders', '新订单', 2, 0, '新しい注文'),
(223, 'da_giao_hang', 'Đã giao hàng', 'Delivered', '', 2, 0, ''),
(224, 'huy_don_hang', 'Hủy đơn hàng', 'Cancel order', '', 2, 0, ''),
(227, 'dang_nhap', 'Đăng Nhập', 'Log in', '', 1, 0, ''),
(228, 'tai_khoan', 'Tài khoản', 'Account', '', 1, 0, ''),
(229, 'title_dang_nhap', 'Đăng Nhập', 'Login', '', 1, 0, ''),
(230, 'login_email', 'Email', 'Email', '', 1, 0, ''),
(231, 'login_pass', 'Mật khẩu', 'password', '', 1, 0, ''),
(232, 'chua_co_tai_khoan', 'Bạn chưa có tài khoản?', 'Do not have an account?', '', 1, 0, ''),
(233, 'quen_mat_khau', 'Quên mật khẩu', 'Forgot password', '', 1, 0, ''),
(234, 'login_nhap_mat_khau', 'Vui lòng nhập mật khẩu!', 'Please enter a password!', '', 1, 0, ''),
(235, 'email_pass_khong_khong_dung', 'Email hoặc mật khẩu không chính xác!', 'Email or password is incorrect!', '', 1, 0, ''),
(236, 'title_dang_ky', 'Đăng ký thành viên', 'sign up', '', 1, 0, ''),
(237, 'register_repass', 'Nhập lại mật khẩu', 'Enter the password', '', 1, 0, ''),
(240, 'dieu_khoan_dk_thanh_vien', 'Đồng ý với các điều khoản của chúng tôi?', 'Agree to our terms?', '', 1, 0, ''),
(241, 'da_co_tai_khoan', 'Bạn đã có tài khoản?', 'Do you already have an account?', '', 1, 0, ''),
(242, 'mat_khau_phai_8_ky_tu_tro_len', 'Mật khẩu phải 8 ký tự trở lên!', 'Password must be 8 characters or more!', '', 1, 0, ''),
(244, 'vui_long_nhap_lai_mat_khau', 'Vui lòng nhập lại mật khẩu!', 'Please re-enter the password!', '', 1, 0, ''),
(245, 'nhap_lai_mat_khau_khong_chinh_xac', 'Nhập lại mật khẩu không chính xác!', 'Re-enter the password incorrectly!', '', 1, 0, ''),
(246, 'dang_ky_tai_khoan_thanh_cong', 'Đăng ký tài khoản thành công!', 'Sign up for a successful account!', '', 1, 0, ''),
(248, 'text_quen_pass', 'Vui lòng nhập email mà bạn đã dùng đăng ký tài khoản để được hướng dẫn thay đổi mật khẩu!', 'Please enter the email you used to register your account for instructions on changing your password!', '', 1, 0, ''),
(249, 'alert_forget_pass_error', 'Rất tiếc. Email không tồn tại trong hệ thống!', 'Sorry. Email does not exist in the system!', '', 1, 0, ''),
(250, 'alert_forget_pass', 'Yêu cầu của bạn đã được gửi đến email', 'Your request has been sent to the email', '', 1, 0, ''),
(251, 'alert_forget_pass2', 'Vui lòng kiểm tra email để thiết lập mật khẩu mới!', 'Please check your email to set up a new password!', '', 1, 0, ''),
(252, 'guide_change_pass', 'Hướng dẫn thay đổi mật khẩu', 'Instructions for changing passwords', '', 1, 0, ''),
(253, 'thong_tin_tai_khoan', 'Thông Tin Tài Khoản', 'Account information', '', 1, 0, ''),
(258, 'luu_thay_doi', 'Lưu thay đổi', 'Save changes', '', 1, 0, ''),
(259, 'thay_doi_mat_khau', 'Thay đổi mật khẩu', 'Change the password', '', 1, 0, ''),
(260, 'cap_nhat_tai_khoan_thanh_cong', 'Cập nhật tài khoản thành công!', 'Update your account successfully!', '', 1, 0, ''),
(261, 'mat_khau_cu', 'Mật khẩu cũ', 'old password', '', 1, 0, ''),
(262, 'mat_khau_moi', 'Mật khẩu mới', 'A new password', '', 1, 0, ''),
(263, 'nhap_mat_khau_cu', 'Nhập mật khẩu cũ', 'Enter the old password', '', 1, 0, ''),
(264, 'nhap_mat_khau_moi', 'Nhập mật khẩu mới', 'Enter your new password', '', 1, 0, ''),
(265, 'nhap_lai_mat_khau_moi', 'Nhập lại mật khẩu mới', 'Enter a new password', '', 1, 0, ''),
(266, 'vui_long_nhap_mat_khau_cu', 'Vui lòng nhập mật khẩu cũ!', 'Please enter the old password!', '', 1, 0, ''),
(267, 'mat_khau_cu_khong_dung', 'Mật khẩu cũ không đúng!', 'Old password is not correct!', '', 1, 0, ''),
(268, 'doi_mat_khau_thanh_cong', 'Đổi mật khẩu thành công!', 'Change password successfully!', '', 1, 0, ''),
(644, 'lien_ket_khong_hop_le_hoac_da_su_dung', 'Liên kết không hợp lệ hoặc đã được sử dụng', 'Invalid or used link', '', 5, 1, ''),
(272, 'doi_mat_khau_moi', 'Đổi mật khẩu mới', 'Change new password', '', 1, 0, ''),
(553, 'san_pham_lien_quan', 'Sản phẩm tương tự', 'Similar product', '', 3, 1, ''),
(282, 'chon_mua', 'Chọn mua', 'Choose to buy', '', 2, 0, ''),
(283, 'mua_hang', 'Mua ngay', 'Buy now', '', 2, 0, ''),
(545, 'san_pham_noi_bac', 'Sản phẩm nổi bật', 'Featured products', '', 3, 1, ''),
(546, 'gia_lienhe', 'Liên hệ', 'Contact', '联系我们', 3, 1, 'お問い合わせ'),
(549, 'xem_tat_ca', 'Xem tất cả', 'See all', '查看全部', 5, 1, 'すべて見る'),
(416, 'nhap_dia_chi_email', 'Nhập địa chỉ email...', 'Enter your email address...', '输入电邮地址...', 5, 1, 'メールアドレスを入力してください...'),
(557, 'cart_qty', 'Số lượng', 'Amount', '数', 2, 0, ''),
(413, 'nhap_ma_bao_ve_chua_dung', 'Mã bảo vệ chưa đúng!', 'Security code is not correct!', '无效的保护码！', 5, 1, '保護コードが無効です！'),
(414, 'thongtin_lienhe', 'Thông tin liên hệ', 'Contact information', '联系信息', 5, 1, '連絡先情報'),
(558, 'cap_nhat_so_luong', 'Cập nhật số lượng', 'Update quantity', '更新号码', 2, 0, ''),
(559, 'xem_them', 'Xem thêm', 'View more', '', 5, 1, ''),
(398, 'loi_dang_ky', 'Lỗi đăng ký', 'Registration error', '', 1, 0, ''),
(407, 'ban_quyen_name', 'Copyright © 2020 Bản quyền thuộc về Công ty TNHH Công nghiệp và Thương mại Đức Việt', 'Copyright © 2020 by Duc Viet Industry and Trading Co., Ltd', '', 0, 1, ''),
(1125, 'san_pham', 'sản phẩm', 'products', '', 3, 1, ''),
(433, 'khong_tim_thay_du_lieu_nao', 'Không tìm thấy dữ liệu nào!', 'No data found!', '', 5, 1, ''),
(554, 'chon_mua', 'Chọn mua', 'Choose buy', '选择购买', 2, 0, ''),
(456, 'gui_di', 'Gửi đi', 'Send', '发送它', 5, 1, 'それを送る'),
(552, 'chi_tiet_san_pham', 'Đặc điểm nổi bật', 'Outstanding characteristics', '', 3, 1, ''),
(523, 'dvt', 'đ', 'đ', '', 3, 1, ''),
(574, 'bai_viet_lien_quan', 'Bài viết liên quan', 'Related posts', '', 5, 1, ''),
(677, 'gio_truoc', 'giờ trước', 'hours ago', '', 5, 1, ''),
(676, 'phut_truoc', 'phút trước', 'minute ago', '', 5, 1, ''),
(675, 'giay_truoc', 'giây trước', 'seconds ago', '', 5, 1, ''),
(674, 'vua_xong', 'Vừa xong', 'Just finished', '', 5, 1, ''),
(597, 'nhap_ma_bao_ve_chua_dung', 'Nhập mã bảo vệ chưa đúng!', 'Enter the security code is not correct!', '输入安全代码不正确！', 5, 1, 'セキュリティコードを間違って入力してください！'),
(607, 'ngay_dang', 'Ngày đăng', 'Date', '发布日期', 0, 1, '投稿日'),
(608, 'cap_nhat', 'Cập nhật', 'Update', '更新', 5, 1, '更新'),
(611, 'gia_ban', 'Giá', 'Price', '', 3, 1, ''),
(656, 'mo_ta_chi_tiet', 'Mô tả chi tiết', 'Detailed description', '详细说明', 5, 1, '詳細な説明'),
(619, 'chua_nhap_dia_chi_email', 'Chưa nhập địa chỉ email', 'Email address not entered', '没有输入电子邮件地址', 5, 1, 'メールアドレスを入力しなかった'),
(672, 'noi_dung_lien_he', 'Nội dung liên hệ', 'Contact content', '联系内容', 5, 1, '連絡先のコンテンツ'),
(627, 'hotline', 'Hotline', 'Hotline', '', 5, 1, ''),
(767, 'san_pham_khuyen_mai', 'Sản phẩm khuyến mãi', 'Promotion products', '', 2, 0, ''),
(768, 'them_vao_gio_hang', 'Thêm vào giỏ hàng', 'Add Cart', '', 2, 0, ''),
(640, 'loi_xac_thuc_thu_lai_sau', 'Lỗi xác thực, vui lòng tại lại trang và thử lại!', 'Authentication error, please stay on the page and try again!', '認証エラーです、ページに戻ってもう一度お試しください！', 5, 1, '验证错误，请返回页面再试一次！'),
(642, 'thong_tin_ca_nhan', 'Thông tin cá nhân', 'Personal information', '', 1, 0, ''),
(643, 'thoat', 'Thoát', 'Exit', '', 1, 0, ''),
(648, 'san_pham_moi', 'Sản Phẩm Mới', 'New product', '', 3, 1, ''),
(649, 'san_pham_ban_chay', 'Sản phẩm bán chạy', 'Best - selling product', '', 3, 1, ''),
(683, 'ban_da_co_tai_khoan', 'Bạn đã có tài khoản? Vui lòng đăng nhập để sử dụng các tính năng của website!', 'Do you already have an account? Please login to use the website features!', '', 1, 0, ''),
(684, 'lich_su_mua_hang', 'Lịch sử mua hàng', 'Purchase history', '', 2, 0, ''),
(685, 'doi_mat_khau', 'Đổi mật khẩu', 'Change Password', '', 1, 0, ''),
(704, 'thong_tin_nguoi_nhan_hang', 'Thông tin người nhận hàng', 'Consignee information', '', 2, 0, ''),
(705, 'gui_den_nguoi_nhan_khac', 'Gửi đến người nhận khác', 'Send to other recipients', '', 2, 0, ''),
(706, 'ma_khuyen_mai', 'Mã khuyến mãi', 'Promotion code', '', 2, 0, ''),
(707, 'phuong_thuc_van_chuyen', 'Phương thức vận chuyển', 'Shipping method', '', 2, 0, ''),
(709, 'ap_dung', 'Áp dụng', 'Apply', '', 2, 0, ''),
(1146, 'y_kien_khach_hang', 'Ý kiến khách hàng', 'Customer reviews', '', 0, 0, ''),
(1145, 'san_pham_cua_chung_toi', 'Sản phẩm chúng tôi', 'Our products', '', 0, 0, ''),
(715, 'chon', 'Chọn', 'To choose', '选择', 2, 0, '選択'),
(718, 'phi_van_chuyen', 'Phí vận chuyển', 'Transport fee', '', 5, 1, ''),
(720, 'so_lan_su_dung_ma_giam_gia_da_het', 'Số lần sử dụng mã khuyến mãi đã hết!', 'The number of times the promotional code has been exhausted!', '', 5, 1, ''),
(721, 'thoi_gian_ap_dung_ma_khuyen_mai_khong_hop_le', 'Thời gian áp dụng mã khuyến mãi không hợp lệ!', 'The time to apply promotion code is not valid!', '', 5, 1, ''),
(722, 'ma_giam_gia_khong_hop_le', 'Mã khuyến mãi không hợp lệ!', 'Invalid promotional code!', '', 5, 1, ''),
(723, 'khong_du_dieu_kien_ap_dung_khuyen_mai', 'Đơn hàng không đủ điều kiện áp dụng khuyến mãi!', 'Orders are not eligible for promotion!', '', 5, 1, ''),
(724, 'tam_tinh', 'Tạm tính', 'Provisional', '', 2, 0, ''),
(725, 'phi_van_chuyen_cod', 'Phí vận chuyển', 'Transport fee', '', 5, 1, ''),
(726, 'khuyen_mai', 'Khuyến mãi', 'Promotion', '', 2, 0, ''),
(727, 'thong_tin_thanh_toan', 'Thông tin thanh toán', 'Billing Information', '', 2, 0, ''),
(728, 'stt', 'STT', 'No.', '', 5, 1, ''),
(729, 'ngay_dat', 'Ngày đặt', 'Date set', '设定日期', 2, 0, '日付の設定'),
(730, 'don_hang_dang_giao', 'Đơn hàng đang được giao', 'The order is being delivered', '', 2, 0, ''),
(731, 'don_hang_da_hoan_thanh', 'Đơn hàng đã hoàn thành', 'Order completed', '', 2, 0, ''),
(732, 'don_hang_da_bi_huy', 'Đơn hàng đã bị hủy', 'Order canceled', '', 2, 0, ''),
(734, 'chi_tiet_don_hang', 'Chi tiết đơn hàng', 'Cart detail', '', 2, 0, ''),
(735, 'ma_dh_khong_ton_tai', 'Mã đơn hàng không tồn tại trong hệ thống.', 'Unexpected item code in system.', '', 2, 0, ''),
(736, 'nhap_ma_don_hang', 'Nhập mã đơn hàng', 'Enter the order code', '', 2, 0, ''),
(737, 'hoac_so_dien_thoai_va_mail_dat_hang', 'Hoặc số điện thoại và email đặt hàng', 'Or phone number and email order', '', 2, 0, ''),
(738, 'so_dien_thoai_dat_hang', 'Số điện thoại đặt hàng', 'Phone number ordered', '', 2, 0, ''),
(739, 'email_dat_hang', 'Email đặt hàng', 'Email order', '', 2, 0, ''),
(740, 'khong_tim_thay_don_hang_nao', 'Không tìm thấy đơn hàng nào !', 'No orders found!', '', 2, 0, ''),
(741, 'don_hang_chua_duoc_thanh_toan', 'Đơn hàng chưa được thanh toán', 'The order has not yet been paid', '', 2, 0, ''),
(742, 'don_hang_da_thanh_toan', 'Đơn hàng đã thanh toán', 'Order has been paid', '', 2, 0, ''),
(743, 'thanh_toan_paypal_khong_thanh_cong', 'Thanh toán Paypal không thành công!', 'Payment Paypal failed!', '', 2, 0, ''),
(744, 'thanh_toan_paypal_thanh_cong', 'Đơn hàng đã được thanh toán!', 'Order has been paid!', '', 2, 0, ''),
(745, 'dien_thoai', 'Điện thoại', 'Phone', '电话', 5, 1, '電話番号'),
(753, 'dang_ky_ngay', 'Đăng ký ngay', 'Sign up now', '', 1, 0, ''),
(801, 'lien_he_ngay', 'Liên hệ ngay', 'Contact now', '现在联系', 5, 1, ''),
(804, 'tat_ca_danh_muc', 'Tất cả danh mục', 'All of the files', '', 3, 1, ''),
(811, 'san_pham_goi_y', 'Sản phẩm gợi ý', 'Suggested products', '', 3, 1, ''),
(812, 'cam_on_danh_gia', 'Cảm ơn bạn đã đánh giá!', 'Thank you for rating!', '', 3, 1, ''),
(816, 'danh_gia_ve_san_pham', 'Đánh giá của bạn về sản phẩm này', 'Your rating of this product', '', 3, 1, ''),
(828, 'gui_yeu_cau', 'Gửi yêu cầu', 'Send require', '', 5, 1, ''),
(832, 'kiem_tra_don_hang', 'Kiểm tra đơn hàng', 'Check the order', '', 2, 0, ''),
(872, 'nhap_so_cmnd', 'Nhập số CMND', 'Enter the ID number', '', 1, 0, ''),
(873, 'so_cmnd', 'Số CMND', 'ID number', '', 1, 0, ''),
(886, 'thanh_tien', 'Thành tiền', 'into money', '', 2, 0, ''),
(887, 'thanh_toan', 'Thanh toán', 'Pay', '', 2, 0, ''),
(911, 'san_pham_noi_bat', 'Sản phẩm nổi bật', 'Featured Products', '', 3, 1, ''),
(1027, 'tin_tuc_su_kien', 'Tin tức & sự kiện', 'News & events', '', 0, 1, ''),
(1035, 'dang_online', 'Người online', 'People online', '', 0, 1, ''),
(1036, 'tong_view', 'Tổng lượt truy cập', 'Total visits', '', 0, 1, ''),
(1037, 'thong_ke_truy_cap', 'Thống kê truy cập', 'Statistical access', '', 0, 0, ''),
(1047, 'tim_kiem', 'Tìm kiếm', 'Search', '', 5, 1, ''),
(1058, 'form_lien_he', 'Form liên hệ', 'Contact The Mizuno Golf Center', '', 5, 1, ''),
(1081, 'danh_muc_san_pham', 'Danh mục sản phẩm', 'Product portfolio', '', 3, 1, ''),
(1115, 'slugan_1', 'Công ty TNHH Công nghiệp và thương mại Đức Việt', 'Duc Viet Industry and Trading Co. Ltd.', '', 0, 1, ''),
(1116, 'slugan_2', 'Always add value', 'Always add value', '', 0, 1, ''),
(1117, 'doi_tac_khach_hang', 'Khách hàng', 'Customer', '', 0, 0, ''),
(1282, 'tat_ca', 'Tất cả', 'All', '', 0, 1, ''),
(1118, 'ho_tro_247', '8h30h - 21h30 (các ngày trong tuần)', '8h30h - 21h30 (weekdays)', '', 0, 0, ''),
(1119, 'du_an_noi_bat', 'Dự án nổi bật', 'Outstanding project', '', 0, 0, ''),
(1121, 'fanpage', '', '', '', 0, 0, ''),
(1123, 'tin_tuc_noi_bat', 'Tin nỗi bật', 'Believe highlights', '', 0, 0, ''),
(1124, 'tin_doc_nhieu', 'Tin đọc nhiều', 'Read a lot', '', 0, 0, ''),
(1127, 'tin_tuc_su_kien_mo_ta', 'Tổng hợp tin tức & sự kiện mới nhất từ chúng tôi', 'Get the latest news & events from us', '', 0, 0, ''),
(1128, 'tin_nong', 'Tin tức nỗi bật', 'News highlights', '', 0, 0, ''),
(1129, 'danh_gia', 'Đánh giá', 'Evaluate', '', 0, 0, ''),
(1130, 'gia_tien', 'Giá tiền', 'Price', '', 2, 0, ''),
(1131, 'binh_luan_danh_gia', 'Bình luận đánh giá', 'Review comment', '', 0, 0, ''),
(1132, 'dang_binh_luan', 'Gửi đánh giá', 'Submit review', '', 6, 0, ''),
(1133, 'viet_danh_gia', 'Viết đánh giá', 'Write a review', '', 6, 0, ''),
(1134, 'viet_nhan_xet', '3. Viết nhận xét của bạn vào bên dưới', '3. Write your comment below', '', 6, 0, ''),
(1135, 'tieu_de_cua_nhan_xet', '2. Tiêu đề của nhận xét', '2. The title of the comment', '', 6, 0, ''),
(1136, 'danh_gia_sp_nay', '1. Đánh giá của bạn về sản phẩm này', '1. Your review of this product', '', 6, 0, ''),
(1137, 'gui_nhan_xet_cua_ban', 'GỬI NHẬN XÉT CỦA BẠN', 'SEND YOUR COMMENT', '', 6, 0, ''),
(1138, 'binh_luan_da_duoc_gui', 'Gửi nội dung bình luận thành công!', 'Send successful comment content!', '', 6, 0, ''),
(1139, 'sao_chep_qua_thong_tin_nhan_hang', 'Sao chép qua thông tin nhận hàng!', 'Copy via delivery information!', '', 0, 0, ''),
(1140, 'nhap_ma_giam_gia', 'Nhập mã giảm giá!', 'Enter discount code!', '', 0, 0, ''),
(1141, 'ghi_chu', 'Ghi chú', 'Notes', '', 0, 0, ''),
(1142, 'thoi_gian_nhan_hang', 'Thời gian nhận hàng', 'Time to receive goods', '', 0, 0, ''),
(1143, 'zalo', 'zalo', 'zalo', '', 0, 0, ''),
(1147, 'mang_xa_hoi', 'Kết nối với chúng tôi', 'Connect with us', '', 0, 0, ''),
(1148, 'lien_he_dat_hang', 'Liên hệ đặt hàng', 'Contact to order', '', 0, 0, ''),
(1149, 'video_clip', 'Video', 'Video', '', 0, 0, ''),
(1150, 'ban_chua_dong_y_thoa_thuan', 'Bạn chưa đồng ý điều khoản thỏa thuận của chúng tôi!', 'You have not agreed to the terms of our agreement!', '', 1, 0, ''),
(1151, 'yeu_thich', 'Yêu thích', 'Favorite', '', 0, 0, ''),
(1152, 'danh_sach_yeu_thich', 'Yêu thích', 'Favorite', '', 0, 0, ''),
(1177, 'fax', 'Fax', 'Fax', '', 0, 0, ''),
(1185, 'ho_tro_truc_tuyen', 'Hỗ trợ trực tuyến', 'Online support', '', 0, 0, ''),
(1189, 'mua_ngay', 'Thêm vào giỏ hàng', 'Add to cart', '', 0, 0, ''),
(1190, 'giao_hang_toan_quoc', 'Giao hàng tận nơi trên toàn quốc', 'Delivery nationwide', '', 0, 0, ''),
(1203, 'binh_luan_san_pham', 'Bình luận sản phẩm', 'Product comments', '', 0, 0, ''),
(1202, 'thuong_hieu', 'Thương hiệu', 'Trademark', '', 0, 0, ''),
(1211, 'thong_tin_lien_he', 'Thông tin liên hệ', 'Contact Info', '', 5, 1, ''),
(1223, 'ban_chay_nhat', 'BÁN CHẠY NHẤT', 'BESTSELLER', '', 3, 0, ''),
(1224, 'san_pham_da_xem', 'Sản phẩm đã xem', 'viewed products', '', 3, 0, ''),
(1226, 'xem_nhieu_nhat', 'Xem nhiều nhất', 'Most view', '', 3, 1, ''),
(1227, 'ban_chay', 'Bán chạy', 'Selling', '', 3, 1, ''),
(1228, 'gia_thap_den_cao', 'Giá thấp đến cao', 'Price low to high', '', 3, 0, ''),
(1229, 'gia_cao_den_thap', 'Giá cao đến thấp', 'Price high to low', '', 3, 0, ''),
(1231, 'khach_hang_danh_gia', 'khách hàng đánh giá', 'customer reviews', '', 6, 0, ''),
(1232, 'cau_hoi_duoc_tra_loi', 'câu hỏi được trả lời', 'questions are answered', '', 6, 0, ''),
(1295, 'mua_tiep_san_pham_khac', 'Mua tiếp sản phẩm khác', 'Buy another product', '', 2, 0, ''),
(1236, 'danh_gia_nhan_xet', 'Đánh giá & Nhận xét', 'Reviews & Comments', '', 6, 0, ''),
(1239, 'gia_cu', 'Giá cũ', 'Old price', '', 3, 1, ''),
(1240, 'gia_ban', 'Giá bán', 'Price', '', 3, 1, ''),
(1241, 'gia_khuyen_mai', 'Giá khuyến mại', 'Promotional price', '', 3, 1, ''),
(1242, 'dat_mua_ngay', 'Đặt mua ngay', 'Order now', '', 3, 1, ''),
(1250, 'khach_hang_nhan_xet', 'Khách hàng nhận xét', 'Customer comment', '', 6, 0, ''),
(1251, 'gui_cau_hoi_cua_ban', 'Gửi câu hỏi của bạn', 'Submit your question', '', 6, 0, ''),
(1252, 'gui_cau_hoi', 'Gửi câu hỏi', 'Submit a question', '', 6, 0, ''),
(1258, 'xem_ban_do', '[ Xem bản đồ ]', '[ View the map ]', '', 0, 0, ''),
(1259, 'chon_tinh_tp', 'Chọn tỉnh / thành phố', 'Select province / city', '', 6, 0, ''),
(1260, 'chon_quan_huyen', 'Chọn quận huyện', 'Select a district', '', 6, 0, ''),
(1261, 'danh_gia_trung_binh', 'Đánh giá trung bình', 'Average rating', '', 6, 0, ''),
(1262, 'trung_binh_diem_danh_gia', '[diem] trung bình dựa trên [luot] bài đánh giá', '[diem] average based on [luot] reviews', '', 6, 0, ''),
(1263, 'sao', 'Sao', 'Start', '', 6, 0, ''),
(1264, 'doc_them_binh_luan', 'Đọc thêm bình luận', 'Read more comments', '', 6, 0, ''),
(1265, 'viet_binh_luan_cua_ban', 'Viết bình luận của bạn (Vui lòng gõ tiếng Việt có dấu)', 'Write your comment (Please type accented Vietnamese)', '', 6, 0, ''),
(1267, 'nhap_ma_khuyen_mai', 'Nhập mã khuyến mãi', 'Enter the promotion code', '', 5, 1, ''),
(1268, 'chon_tinh_thanh', 'Chọn Tỉnh / Thành', 'Select Province / City', '', 5, 1, ''),
(1269, 'ma_giam_gia_hop_le', 'Kích hoạt mã giảm giá thành công!', 'Activate discount code successfully!', '', 5, 1, ''),
(1283, 'registration', 'Đăng ký', 'Registration', '', 0, 0, ''),
(1294, 'cho_vao_gio', 'Cho vào giỏ', 'Add to basket', '', 2, 0, ''),
(1304, 'hotline_247', '(24/7)', '(24/7)', '', 0, 1, ''),
(1305, 'uu_diem', 'Ưu điểm', 'Advantages', '', 0, 1, ''),
(1306, 'thong_so_ky_thuat', 'Thông số kỹ thuật', 'Technical data', '', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `lh_counter`
--

CREATE TABLE `lh_counter` (
  `id` bigint(20) NOT NULL,
  `coonter` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `lh_counter`
--

INSERT INTO `lh_counter` (`id`, `coonter`) VALUES
(1, 7338);

-- --------------------------------------------------------

--
-- Table structure for table `lh_count_date`
--

CREATE TABLE `lh_count_date` (
  `id` int(11) NOT NULL,
  `day` int(2) NOT NULL DEFAULT '0',
  `month` int(2) NOT NULL DEFAULT '0',
  `year` int(4) NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lh_count_date`
--

INSERT INTO `lh_count_date` (`id`, `day`, `month`, `year`, `count`) VALUES
(1, 23, 3, 2020, 11),
(2, 24, 3, 2020, 33),
(3, 25, 3, 2020, 18);

-- --------------------------------------------------------

--
-- Table structure for table `lh_danhmuc`
--

CREATE TABLE `lh_danhmuc` (
  `id` int(11) NOT NULL,
  `tenbaiviet_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenbaiviet_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenbaiviet_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenbaiviet_jp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p1_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p1_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p1_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p1_jp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lien_ket` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon_hover` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota_en` text COLLATE utf8_unicode_ci,
  `mota_vi` text COLLATE utf8_unicode_ci,
  `mota_cn` text COLLATE utf8_unicode_ci,
  `mota_jp` text COLLATE utf8_unicode_ci,
  `noidung_en` text COLLATE utf8_unicode_ci,
  `noidung_vi` text COLLATE utf8_unicode_ci,
  `noidung_cn` text COLLATE utf8_unicode_ci,
  `noidung_jp` text COLLATE utf8_unicode_ci,
  `duongdantin` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `step` int(11) DEFAULT NULL,
  `id_step` int(11) NOT NULL DEFAULT '0',
  `ngaydang` int(15) NOT NULL DEFAULT '0',
  `seo_title_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title_jp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description_jp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords_jp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opt` tinyint(1) NOT NULL DEFAULT '0',
  `mt_1_jp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catasort` int(11) DEFAULT NULL,
  `showhi` tinyint(2) NOT NULL DEFAULT '1',
  `num_1` int(11) NOT NULL DEFAULT '0',
  `num_2` int(11) NOT NULL DEFAULT '0',
  `nhom_sp` tinyint(1) NOT NULL DEFAULT '0',
  `p_khuyenmai` tinyint(1) NOT NULL DEFAULT '0',
  `p_banchay` tinyint(1) NOT NULL DEFAULT '0',
  `p_noibat` tinyint(1) NOT NULL DEFAULT '0',
  `p_spmoi` tinyint(1) NOT NULL DEFAULT '0',
  `p_hethang` tinyint(1) NOT NULL DEFAULT '0',
  `id_parent_muti` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Bang chua catalag News' ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `lh_danhmuc`
--

INSERT INTO `lh_danhmuc` (`id`, `tenbaiviet_vi`, `tenbaiviet_en`, `tenbaiviet_cn`, `tenbaiviet_jp`, `p1_vi`, `p1_en`, `p1_cn`, `p1_jp`, `seo_name`, `lien_ket`, `id_parent`, `icon`, `icon_hover`, `mota_en`, `mota_vi`, `mota_cn`, `mota_jp`, `noidung_en`, `noidung_vi`, `noidung_cn`, `noidung_jp`, `duongdantin`, `step`, `id_step`, `ngaydang`, `seo_title_vi`, `seo_title_en`, `seo_title_cn`, `seo_title_jp`, `seo_description_vi`, `seo_description_en`, `seo_description_cn`, `seo_description_jp`, `seo_keywords_vi`, `seo_keywords_en`, `seo_keywords_cn`, `seo_keywords_jp`, `opt`, `mt_1_jp`, `catasort`, `showhi`, `num_1`, `num_2`, `nhom_sp`, `p_khuyenmai`, `p_banchay`, `p_noibat`, `p_spmoi`, `p_hethang`, `id_parent_muti`) VALUES
(1, 'Quạt Công Nghiệp Deton', 'Industrial Fan Deton', NULL, NULL, '', '', '', NULL, 'quat-cong-nghiep-deton-8', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'datafiles', 1, 1, 1584945383, 'Quạt Công Nghiệp Deton', 'Industrial Fan Deton', '', NULL, 'Quạt Công Nghiệp Deton', 'Industrial Fan Deton', '', NULL, 'Quạt Công Nghiệp Deton', 'Industrial Fan Deton', '', NULL, 0, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(2, 'Công Ty Đức Việt', 'Duc Viet Company', NULL, NULL, '', '', '', NULL, 'cong-ty-duc-viet', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'datafiles', 1, 1, 1584945410, 'Công Ty Đức Việt', 'Duc Viet Company', '', NULL, 'Công Ty Đức Việt', 'Duc Viet Company', '', NULL, 'Công Ty Đức Việt', 'Duc Viet Company', '', NULL, 0, NULL, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(3, 'Mục Tiêu', 'Target', NULL, NULL, '', '', '', NULL, 'muc-tieu', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'datafiles', 1, 1, 1584945424, 'Mục Tiêu', 'Target', '', NULL, 'Mục Tiêu', 'Target', '', NULL, 'Mục Tiêu', 'Target', '', NULL, 0, NULL, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(4, 'Khách Hàng', 'Customer', NULL, NULL, '', '', '', NULL, 'khach-hang', NULL, 0, NULL, NULL, '<p>With 17 years of consulting and distributing Deton products nationwide, we have received the trust and support of more than 160 agents at all levels, many large and small businesses in the domestic as well as industrial processing zones. export and many retail customers in 63 provinces.</p>', '<p>Với 17 năm tư vấn v&agrave; ph&acirc;n phối sản phẩm Deton tr&ecirc;n to&agrave;n quốc, ch&uacute;ng t&ocirc;i đ&atilde; nhận được sự tin tưởng, ủng hộ của hơn 160 đại l&yacute; c&aacute;c cấp, nhiều doanh nghiệp lớn nhỏ tại khu vực nội địa cũng như khu c&ocirc;ng nghiệp chế xuất v&agrave; nhiều kh&aacute;ch h&agrave;ng lẻ tr&ecirc;n 63 tỉnh th&agrave;nh.</p>', NULL, NULL, '<h2>What do they think about us?</h2>\r\n\r\n<ul>\r\n	<li>Canon Vietnam &ldquo;Good fan quality, durable fan, cool breeze. Fast, prompt delivery time. Especially the warranty is very good &rdquo;</li>\r\n	<li>Yamaha &quot;Consulting enthusiastic, professional. Good quality fan, nice design &rdquo;</li>\r\n	<li>Tuyen Quang Iron and Steel &quot;Goods are more beautiful than expected. The fan runs smoothly, durable. Timely warranty. Will support the company in the long run &rdquo;</li>\r\n	<li>Asia Electrical Engineering Corporation &quot;The sales people are very enthusiastic, always trying our best to support us. Thank you to the company for providing quality fan products for our project &rdquo;.</li>\r\n	<li>Hoa Phat Copper Pipe Company: &ldquo;Bought a lot of the company&#39;s fans. Diverse products, beautiful, good blowing smoke. Will continue to order Deton products &rdquo;</li>\r\n</ul>', '<h2>Họ nghĩ g&igrave; về ch&uacute;ng t&ocirc;i?</h2>\r\n\r\n<ul>\r\n	<li>Canon Việt Nam &ldquo;Chất lượng quạt tốt, quạt chạy bền, gi&oacute; m&aacute;t. Thời gian giao h&agrave;ng nhanh ch&oacute;ng, kịp thời. Đặc biệt l&agrave; chế độ bảo h&agrave;nh rất tốt&rdquo;</li>\r\n	<li>Yamaha &ldquo;Bộ phận tư vấn nhiệt t&igrave;nh, chuy&ecirc;n nghiệp. Quạt chất lượng tốt, mẫu m&atilde; đẹp&rdquo;</li>\r\n	<li>Gang th&eacute;p Tuy&ecirc;n Quang &ldquo;H&agrave;ng đẹp hơn mong đợi. Quạt chạy &ecirc;m, bền. Bảo h&agrave;nh kịp thời. Sẽ ủng hộ c&ocirc;ng ty l&acirc;u d&agrave;i&rdquo;</li>\r\n	<li>Tập đo&agrave;n Cơ điện &Aacute; Ch&acirc;u &ldquo;C&aacute;c bạn b&aacute;n h&agrave;ng rất nhiệt t&igrave;nh, lu&ocirc;n cố gắng hỗ trợ ch&uacute;ng t&ocirc;i hết mức. Cảm ơn qu&yacute; c&ocirc;ng ty đ&atilde; cung cấp c&aacute;c sản phẩm quạt chất lượng cho c&ocirc;ng tr&igrave;nh của ch&uacute;ng t&ocirc;i&rdquo;.</li>\r\n	<li>C&ocirc;ng ty Ống đồng Ho&agrave; Ph&aacute;t: &ldquo;Đ&atilde; mua rất nhiều quạt của c&ocirc;ng ty. Sản phẩm đa dạng, đẹp, h&uacute;t thổi tốt. Sẽ tiếp tục đặt h&agrave;ngsản phẩm Deton&rdquo;</li>\r\n</ul>', NULL, NULL, 'datafiles', 1, 1, 1584945536, 'Khách Hàng', 'Customer', '', NULL, 'Khách Hàng', 'Customer', '', NULL, 'Khách Hàng', 'Customer', '', NULL, 0, NULL, 4, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(5, 'Tin Tức Chuyên Nghành', 'Specialized News', NULL, NULL, '', '', '', NULL, 'tin-tuc-chuyen-nghanh', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'datafiles', 4, 3, 1584946452, 'Tin Tức Chuyên Nghành', 'Specialized News', '', NULL, 'Tin Tức Chuyên Nghành', 'Specialized News', '', NULL, 'Tin Tức Chuyên Nghành', 'Specialized News', '', NULL, 0, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(6, 'Tin Tức Nội Bộ', 'Internal News', NULL, NULL, '', '', '', NULL, 'tin-tuc-noi-bo', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'datafiles', 4, 3, 1584946461, 'Tin Tức Nội Bộ', 'Internal News', '', NULL, 'Tin Tức Nội Bộ', 'Internal News', '', NULL, 'Tin Tức Nội Bộ', 'Internal News', '', NULL, 0, NULL, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(7, 'Vì Sao Chọn Đức Việt', 'Why Choose Duc Viet', NULL, NULL, '', '', '', NULL, 'vi-sao-chon-duc-viet', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'datafiles', 5, 4, 1584946787, 'Vì Sao Chọn Đức Việt', 'Why Choose Duc Viet', '', NULL, 'Vì Sao Chọn Đức Việt', 'Why Choose Duc Viet', '', NULL, 'Vì Sao Chọn Đức Việt', 'Why Choose Duc Viet', '', NULL, 0, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(8, 'Cơ Hội Việc Làm', 'Employment Opportunities', NULL, NULL, '', '', '', NULL, 'co-hoi-viec-lam', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'datafiles', 5, 4, 1584946799, 'Cơ Hội Việc Làm', 'Employment Opportunities', '', NULL, 'Cơ Hội Việc Làm', 'Employment Opportunities', '', NULL, 'Cơ Hội Việc Làm', 'Employment Opportunities', '', NULL, 0, NULL, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(9, 'Quạt sàn công nghiệp', 'Industrial floor fans', NULL, NULL, '', '', '', NULL, 'quat-san-cong-nghiep', NULL, 0, '1584951792_1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'datafiles', 2, 2, 1584950519, 'Quạt sàn công nghiệp', 'Industrial floor fans', '', NULL, 'Quạt sàn công nghiệp', 'Industrial floor fans', '', NULL, 'Quạt sàn công nghiệp', 'Industrial floor fans', '', NULL, 0, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(10, 'Quạt cây Công nghiệp', 'Industrial Fan', NULL, NULL, '', '', '', NULL, 'quat-cay-cong-nghiep', NULL, 0, '1584951792_2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'datafiles', 2, 2, 1584950528, 'Quạt cây Công nghiệp', 'Industrial Fan', '', NULL, 'Quạt cây Công nghiệp', 'Industrial Fan', '', NULL, 'Quạt cây Công nghiệp', 'Industrial Fan', '', NULL, 0, NULL, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(11, 'Quạt treo tường Công nghiệp', 'Industrial wall fan', NULL, NULL, '', '', '', NULL, 'quat-treo-tuong-cong-nghiep', NULL, 0, '1584951792_3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'datafiles', 2, 2, 1584950540, 'Quạt treo tường Công nghiệp', 'Industrial wall fan', '', NULL, 'Quạt treo tường Công nghiệp', 'Industrial wall fan', '', NULL, 'Quạt treo tường Công nghiệp', 'Industrial wall fan', '', NULL, 0, NULL, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(12, 'Quạt hướng trục', 'Axial fans', NULL, NULL, '', '', '', NULL, 'quat-huong-truc', NULL, 0, '1584951792_4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'datafiles', 2, 2, 1584950588, 'Quạt hướng trục', 'Axial fans', '', NULL, 'Quạt hướng trục', 'Axial fans', '', NULL, 'Quạt hướng trục', 'Axial fans', '', NULL, 0, NULL, 4, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(13, 'Quạt chống cháy nổ', 'Explosion-proof fan', NULL, NULL, '', '', '', NULL, 'quat-chong-chay-no', NULL, 0, '1584951792_5.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'datafiles', 2, 2, 1584950595, 'Quạt chống cháy nổ', 'Explosion-proof fan', '', NULL, 'Quạt chống cháy nổ', 'Explosion-proof fan', '', NULL, 'Quạt chống cháy nổ', 'Explosion-proof fan', '', NULL, 0, NULL, 5, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(14, 'Quạt ly tâm', 'Centrifugal fan', NULL, NULL, '', '', '', NULL, 'quat-ly-tam', NULL, 0, '1584951792_6.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'datafiles', 2, 2, 1584950603, 'Quạt ly tâm', 'Centrifugal fan', '', NULL, 'Quạt ly tâm', 'Centrifugal fan', '', NULL, 'Quạt ly tâm', 'Centrifugal fan', '', NULL, 0, NULL, 6, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(15, 'Quạt thông gió', 'Ventilators', NULL, NULL, '', '', '', NULL, 'quat-thong-gio', NULL, 0, '1584951792_7.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'datafiles', 2, 2, 1584950611, 'Quạt thông gió', 'Ventilators', '', NULL, 'Quạt thông gió', 'Ventilators', '', NULL, 'Quạt thông gió', 'Ventilators', '', NULL, 0, NULL, 7, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(16, 'Quạt phun sương', 'Misting fan', NULL, NULL, '', '', '', NULL, 'quat-phun-suong', NULL, 0, '1584951792_8.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'datafiles', 2, 2, 1584950619, 'Quạt phun sương', 'Misting fan', '', NULL, 'Quạt phun sương', 'Misting fan', '', NULL, 'Quạt phun sương', 'Misting fan', '', NULL, 0, NULL, 8, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(17, 'Quạt tăng áp cầu thang', 'Stair turbocharger fan', NULL, NULL, '', '', '', NULL, 'quat-tang-ap-cau-thang', NULL, 0, '1584951792_9.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'datafiles', 2, 2, 1584951569, 'Quạt tăng áp cầu thang', 'Stair turbocharger fan', '', NULL, 'Quạt tăng áp cầu thang', 'Stair turbocharger fan', '', NULL, 'Quạt tăng áp cầu thang', 'Stair turbocharger fan', '', NULL, 0, NULL, 9, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(18, 'Quạt công trình nhà xưởng', 'Fan factory buildings', NULL, NULL, '', '', '', NULL, 'quat-cong-trinh-nha-xuong', NULL, 0, '1584951792_10.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'datafiles', 2, 2, 1584951583, 'Quạt công trình nhà xưởng', 'Fan factory buildings', '', NULL, 'Quạt công trình nhà xưởng', 'Fan factory buildings', '', NULL, 'Quạt công trình nhà xưởng', 'Fan factory buildings', '', NULL, 0, NULL, 10, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(19, 'Quạt hút bếp công nghiệp', 'Industrial kitchen exhaust fan', NULL, NULL, '', '', '', NULL, 'quat-hut-bep-cong-nghiep', NULL, 0, '1584951793_11.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'datafiles', 2, 2, 1584951592, 'Quạt hút bếp công nghiệp', 'Industrial kitchen exhaust fan', '', NULL, 'Quạt hút bếp công nghiệp', 'Industrial kitchen exhaust fan', '', NULL, 'Quạt hút bếp công nghiệp', 'Industrial kitchen exhaust fan', '', NULL, 0, NULL, 11, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(20, 'Quạt điều hoà không khí', 'Air conditioning fan', NULL, NULL, '', '', '', NULL, 'quat-dieu-hoa-khong-khi', NULL, 0, '1584951793_12.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'datafiles', 2, 2, 1584951601, 'Quạt điều hoà không khí', 'Air conditioning fan', '', NULL, 'Quạt điều hoà không khí', 'Air conditioning fan', '', NULL, 'Quạt điều hoà không khí', 'Air conditioning fan', '', NULL, 0, NULL, 12, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(21, 'Quạt công nghiêp nhiệt độ cao', 'High-temperature industrial fan', NULL, NULL, '', '', '', NULL, 'quat-cong-nghiep-nhiet-do-cao', NULL, 0, '1584951793_13.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'datafiles', 2, 2, 1584951609, 'Quạt công nghiêp nhiệt độ cao', 'High-temperature industrial fan', '', NULL, 'Quạt công nghiêp nhiệt độ cao', 'High-temperature industrial fan', '', NULL, 'Quạt công nghiêp nhiệt độ cao', 'High-temperature industrial fan', '', NULL, 0, NULL, 13, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(22, 'Linh kiện', 'accessories', NULL, NULL, '', '', '', NULL, 'linh-kien', NULL, 0, '1584951793_14.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'datafiles', 2, 2, 1584951615, 'Linh kiện', 'accessories', '', NULL, 'Linh kiện', 'accessories', '', NULL, 'Linh kiện', 'accessories', '', NULL, 0, NULL, 14, 1, 0, 0, 0, 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `lh_du_lieu_sn`
--

CREATE TABLE `lh_du_lieu_sn` (
  `id` int(11) NOT NULL,
  `tenbaiviet_vi` varchar(255) DEFAULT NULL,
  `tenbaiviet_en` varchar(255) DEFAULT NULL,
  `mota_vi` varchar(255) DEFAULT NULL,
  `mota_en` varchar(255) DEFAULT NULL,
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `seo_name` varchar(255) DEFAULT NULL,
  `val_1` varchar(255) DEFAULT NULL,
  `val_2` varchar(255) DEFAULT NULL,
  `blank` varchar(255) DEFAULT NULL,
  `catasort` int(11) NOT NULL DEFAULT '0',
  `opt` tinyint(1) NOT NULL DEFAULT '0',
  `spchon` text,
  `showhi` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lh_email_config`
--

CREATE TABLE `lh_email_config` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `showhi` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lh_email_config`
--

INSERT INTO `lh_email_config` (`id`, `email`, `type`, `showhi`) VALUES
(6, 'linhhuynh@pavietnam.vn', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lh_email_follow`
--

CREATE TABLE `lh_email_follow` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `v_name` varchar(255) DEFAULT NULL,
  `v_phone` varchar(255) DEFAULT NULL,
  `ddate` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(255) DEFAULT NULL,
  `showhi` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lh_file_import_data`
--

CREATE TABLE `lh_file_import_data` (
  `id` int(11) NOT NULL,
  `ten_vi` varchar(255) DEFAULT NULL,
  `duongdantin` varchar(255) DEFAULT NULL,
  `file_excel` varchar(255) DEFAULT NULL,
  `ngay_dang` int(11) NOT NULL DEFAULT '0',
  `so_lan_import` int(11) NOT NULL DEFAULT '0',
  `noidung_vi` text,
  `import_cuoi` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lh_form_lienhe`
--

CREATE TABLE `lh_form_lienhe` (
  `id` int(11) NOT NULL,
  `tenbaiviet_vi` varchar(255) DEFAULT NULL,
  `ip_gui` varchar(255) DEFAULT NULL,
  `ngay_dang` int(11) NOT NULL DEFAULT '0',
  `noi_dung_vn` longtext,
  `showhi` tinyint(1) NOT NULL DEFAULT '1',
  `loai` int(11) NOT NULL DEFAULT '0',
  `nd_json` longtext,
  `file_1` varchar(255) DEFAULT NULL,
  `file_2` varchar(255) DEFAULT NULL,
  `id_bv` int(11) NOT NULL DEFAULT '0',
  `is_nuti` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lh_form_lienhe`
--

INSERT INTO `lh_form_lienhe` (`id`, `tenbaiviet_vi`, `ip_gui`, `ngay_dang`, `noi_dung_vn`, `showhi`, `loai`, `nd_json`, `file_1`, `file_2`, `id_bv`, `is_nuti`) VALUES
(1, 'Th&ocirc;ng tin li&ecirc;n hệ', '::1', 1585023484, '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>\n<table border=\'1\' cellspacing=\'0\' cellpadding=\'4\'\n       style=\'width:100%; border-collapse: collapse; font-family:Tahoma; font-size:11px;\' bordercolor=\'#cccccc\' class=\"table table-hover table-danhsach\">\n    <tr>\n        <td colspan=\"7\" style=\"text-align: left\">\n            <div style=\"display: table; width: 100%; float: left; text-align: left;\">\n                <img src=\"http://localhost/2020_ducviet/datafiles/1584936741_logo.png\" alt=\"\" style=\"float: left;height: 80px\"> \n                <span style=\"font-size: 15px; padding-left: 20px; display: table-cell; vertical-align: middle; width: 100%; font-weight: 600; color: #333;\">CÔNG TY TNHH CÔNG NGHIỆP VÀ THƯƠNG MẠI ĐỨC VIỆT</span>\n            </div>\n        </td>\n    </tr> \n    <tr> <td colspan=\"7\" style=\"text-align: left; color: #333; background: #cccccc; font-size: 13px;text-transform: uppercase;\"><b>Th&ocirc;ng tin li&ecirc;n hệ</b></td> </tr><tr><td colspan=\"3\" style=\"width:160px; font-size: 13px\">Họ &amp; t&ecirc;n</td><td colspan=\"4\" width=\"400\"><span style=\"display:block; padding-left:5px; font-size: 13px\">1</span></td></tr><tr><td colspan=\"3\" style=\"width:160px; font-size: 13px\"></td><td colspan=\"4\" width=\"400\"><span style=\"display:block; padding-left:5px; font-size: 13px\">1</span></td></tr><tr><td colspan=\"3\" style=\"width:160px; font-size: 13px\">Email</td><td colspan=\"4\" width=\"400\"><span style=\"display:block; padding-left:5px; font-size: 13px\">32@jj.mv</span></td></tr><tr><td colspan=\"3\" style=\"width:160px; font-size: 13px\">Địa chỉ</td><td colspan=\"4\" width=\"400\"><span style=\"display:block; padding-left:5px; font-size: 13px\">1</span></td></tr><tr><td colspan=\"3\" style=\"width:160px; font-size: 13px\">Ti&ecirc;u đề</td><td colspan=\"4\" width=\"400\"><span style=\"display:block; padding-left:5px; font-size: 13px\">1</span></td></tr><tr><td colspan=\"3\" style=\"width:160px; font-size: 13px\">Nội dung li&ecirc;n hệ</td><td colspan=\"4\" width=\"400\"><span style=\"display:block; padding-left:5px; font-size: 13px\">2312</span></td></tr>\n    <tr>\n        <td colspan=\"7\" style=\" background-color: #cccccc; color: #333; padding: 10px !important; font-size: 13px;  padding-bottom: 5px !important;\"><p><b>CÔNG TY TNHH CÔNG NGHIỆP VÀ THƯƠNG MẠI ĐỨC VIỆT</b></p><p>Số điện thoại: 024. 39783004</p><p>Email: quatducviet@deton.com.vn</p><p>Địa chỉ: P9H2 tập thể Nguyễn Công Trứ, Hai Bà Trưng, Hà Nội, Việt Nam</p>\n        </td>\n    </tr>\n</table>', 0, 0, 'a:7:{i:0;a:2:{s:1:\"k\";s:5:\"title\";s:1:\"v\";s:28:\"VGjDtG5nIHRpbiBsacOqbiBo4buH\";}i:1;a:2:{s:1:\"k\";s:16:\"SOG7jSAmIHTDqm4=\";s:1:\"v\";s:1:\"1\";}i:2;a:2:{s:1:\"k\";s:26:\"UG7kSDEkWnhu4duIHRobG6oWk=\";s:1:\"v\";s:1:\"1\";}i:3;a:2:{s:1:\"k\";s:8:\"RW1haWw=\";s:1:\"v\";s:8:\"32@jj.mv\";}i:4;a:2:{s:1:\"k\";s:16:\"xJDhu4thIGNo4buJ\";s:1:\"v\";s:1:\"1\";}i:5;a:2:{s:1:\"k\";s:16:\"VGnDqnUgxJHhu4E=\";s:1:\"v\";s:1:\"1\";}i:6;a:2:{s:1:\"k\";s:28:\"TuG7mWkgZHVuZyBsacOqbiBo4buH\";s:1:\"v\";s:4:\"2312\";}}', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lh_lienket`
--

CREATE TABLE `lh_lienket` (
  `id` int(11) NOT NULL,
  `tenbaiviet_vi` varchar(255) DEFAULT NULL,
  `lien_ket` varchar(255) DEFAULT NULL,
  `thuc_hien` int(11) NOT NULL DEFAULT '0',
  `lan_cuoi` int(11) NOT NULL DEFAULT '0',
  `showhi` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lh_lien_ket_nhanh`
--

CREATE TABLE `lh_lien_ket_nhanh` (
  `id` int(11) NOT NULL,
  `tenbaiviet_vi` varchar(255) DEFAULT NULL,
  `tenbaiviet_en` varchar(255) DEFAULT NULL,
  `gia_min` int(11) NOT NULL DEFAULT '0',
  `gia_max` int(11) NOT NULL DEFAULT '0',
  `catasort` int(11) NOT NULL DEFAULT '0',
  `showhi` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lh_magiamgia`
--

CREATE TABLE `lh_magiamgia` (
  `id` int(11) NOT NULL,
  `tenbaiviet_vi` varchar(255) DEFAULT NULL,
  `so_lan_su_dung` int(11) NOT NULL DEFAULT '0',
  `khong_gioi_han` tinyint(1) NOT NULL DEFAULT '0',
  `loai_km` tinyint(1) NOT NULL DEFAULT '0',
  `gia_tri_giam` int(11) NOT NULL DEFAULT '0',
  `ap_dung_cho` int(11) NOT NULL DEFAULT '0',
  `gia_tri_ap_dung` int(11) NOT NULL DEFAULT '0',
  `ap_dung_khuyen_mail_tren_don_hang` tinyint(1) NOT NULL DEFAULT '0',
  `bat_dau` int(11) NOT NULL DEFAULT '0',
  `ket_thuc` int(11) NOT NULL DEFAULT '0',
  `ngay_tao` int(11) NOT NULL DEFAULT '0',
  `catasort` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lh_magiamgia_chitiet`
--

CREATE TABLE `lh_magiamgia_chitiet` (
  `id` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `ma_giam_gia` varchar(255) DEFAULT NULL,
  `so_lan_su_dung` int(11) NOT NULL DEFAULT '0',
  `tong_su_dung` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lh_mangxahoi`
--

CREATE TABLE `lh_mangxahoi` (
  `id` int(11) NOT NULL,
  `tenbaiviet_vi` varchar(255) DEFAULT NULL,
  `tenbaiviet_en` varchar(255) DEFAULT NULL,
  `tenbaiviet_cn` varchar(255) DEFAULT NULL,
  `seo_name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `duongdantin` varchar(255) DEFAULT NULL,
  `fontawesome` varchar(255) DEFAULT NULL,
  `catasort` int(11) NOT NULL DEFAULT '1',
  `showhi` tinyint(4) NOT NULL DEFAULT '1',
  `background` varchar(255) DEFAULT NULL,
  `is_top` tinyint(4) NOT NULL DEFAULT '0',
  `is_foot` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lh_mangxahoi`
--

INSERT INTO `lh_mangxahoi` (`id`, `tenbaiviet_vi`, `tenbaiviet_en`, `tenbaiviet_cn`, `seo_name`, `icon`, `duongdantin`, `fontawesome`, `catasort`, `showhi`, `background`, `is_top`, `is_foot`) VALUES
(1, 'Chát với chúng tôi', 'Chat with us', NULL, '', '1585023700_fa-fa-comments.png', 'datafiles', '', 4, 1, '#F15A4B', 0, 0),
(2, 'HOTLINE: 0933 083 183', 'HOTLINE: 0933 083 183', NULL, 'tel:0933 083 183', '1585023985_fa-fa-phone-volume.png', 'datafiles', '', 3, 1, '#ff3b00', 0, 0),
(3, 'Tư vấn Zalo', 'Consulting Zalo', NULL, '', '1585024074_zalo.png', 'datafiles', '', 2, 1, '#00a4d5', 0, 0),
(4, 'Facebook', 'Facebook', NULL, 'https://www.facebook.com/pages/category/Product-Service/Macvn-Macbook-PhE1BBA5-KiE1BB87n-313297889546849/', '1585024178_fab-fa-facebook-f.png', 'datafiles', '', 1, 1, '#3A559F', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lh_members`
--

CREATE TABLE `lh_members` (
  `id` int(7) NOT NULL,
  `tentruycap` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matkhau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keypass` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hoten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodienthoai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gioitinh` tinyint(1) NOT NULL DEFAULT '0',
  `ngaysinh` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cmnd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idsp_view` text COLLATE utf8_unicode_ci,
  `active` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phanquyen` int(11) NOT NULL DEFAULT '0',
  `showhi` tinyint(1) NOT NULL DEFAULT '1',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_facebook` int(11) NOT NULL DEFAULT '0',
  `id_google` int(11) NOT NULL DEFAULT '0',
  `google_icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_login` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_login_last` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_login_time` int(11) NOT NULL DEFAULT '0',
  `ip_login_last_time` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lh_members`
--

INSERT INTO `lh_members` (`id`, `tentruycap`, `matkhau`, `keypass`, `hoten`, `email`, `diachi`, `sodienthoai`, `gioitinh`, `ngaysinh`, `cmnd`, `idsp_view`, `active`, `phanquyen`, `showhi`, `icon`, `id_facebook`, `id_google`, `google_icon`, `ip_login`, `ip_login_last`, `ip_login_time`, `ip_login_last_time`) VALUES
(1, 'ducviet', '2D88E76B78C14190A885E72F1F0C0865D97547E04E2EE7B4CFF9E2C9D965C4BCF0DCDF0D', 'OJMDF', 'ducviet', 'linhhuynh@pavietnam.vn', '', '', 0, '', NULL, '', '', 1, 1, '0', 0, 0, NULL, '::1', '::1', 1585120807, 1585120807);

-- --------------------------------------------------------

--
-- Table structure for table `lh_members_log`
--

CREATE TABLE `lh_members_log` (
  `id` int(20) NOT NULL,
  `log` varchar(255) DEFAULT NULL,
  `time_log` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_mb` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lh_members_nhom`
--

CREATE TABLE `lh_members_nhom` (
  `id` int(11) NOT NULL,
  `tenbaiviet_vi` varchar(255) DEFAULT NULL,
  `phan_tram` float NOT NULL DEFAULT '0',
  `catasort` int(11) NOT NULL DEFAULT '0',
  `showhi` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lh_members_nhom`
--

INSERT INTO `lh_members_nhom` (`id`, `tenbaiviet_vi`, `phan_tram`, `catasort`, `showhi`) VALUES
(1, 'Xanh', 10, 1, 1),
(2, 'Bạc', 20, 2, 1),
(3, 'Vip', 30, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lh_menu`
--

CREATE TABLE `lh_menu` (
  `id` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `tenbaiviet_vi` varchar(255) DEFAULT NULL,
  `tenbaiviet_en` varchar(255) DEFAULT NULL,
  `tenbaiviet_cn` varchar(255) DEFAULT NULL,
  `tenbaiviet_jp` varchar(255) DEFAULT NULL,
  `seo_name` varchar(255) DEFAULT NULL,
  `step` int(11) NOT NULL DEFAULT '0',
  `danhmuc` int(11) NOT NULL DEFAULT '0',
  `kieu_hien_thi` tinyint(4) NOT NULL DEFAULT '0',
  `kieu_chon` tinyint(1) NOT NULL DEFAULT '0',
  `cua_so_moi` tinyint(4) NOT NULL DEFAULT '0',
  `catasort` int(11) NOT NULL DEFAULT '1',
  `showhi` tinyint(1) NOT NULL DEFAULT '1',
  `icon` varchar(255) DEFAULT NULL,
  `icon_hover` varchar(255) DEFAULT NULL,
  `duongdantin` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lh_menu`
--

INSERT INTO `lh_menu` (`id`, `id_parent`, `tenbaiviet_vi`, `tenbaiviet_en`, `tenbaiviet_cn`, `tenbaiviet_jp`, `seo_name`, `step`, `danhmuc`, `kieu_hien_thi`, `kieu_chon`, `cua_so_moi`, `catasort`, `showhi`, `icon`, `icon_hover`, `duongdantin`) VALUES
(1, 0, '2020_ducviet', '2020_ducviet', '', '', '', 0, 0, 0, 0, 0, 1, 1, NULL, NULL, 'datafiles'),
(2, 1, 'Trang chủ', 'Home', '', '', '', 0, 0, 0, 0, 0, 2, 1, NULL, NULL, 'datafiles'),
(3, 1, 'Giới thiệu', 'Introduce', '', '', '', 1, 0, 0, 1, 0, 3, 1, NULL, NULL, 'datafiles'),
(4, 1, 'Sản phẩm', 'Product', '', '', '', 2, 0, 1, 1, 0, 4, 1, NULL, NULL, 'datafiles'),
(5, 1, 'Dịch vụ', 'Service', '', '', '', 3, 0, 2, 1, 0, 5, 1, NULL, NULL, 'datafiles'),
(6, 1, 'Tin tức & sự kiện', 'News & events', '', '', '', 4, 0, 1, 1, 0, 6, 1, NULL, NULL, 'datafiles'),
(7, 1, 'Tuyển dụng', 'Recruitment', '', '', '', 5, 0, 1, 1, 0, 7, 1, NULL, NULL, 'datafiles'),
(8, 1, 'Liên hệ', 'Contact', '', '', '', 6, 0, 0, 1, 0, 8, 1, NULL, NULL, 'datafiles');

-- --------------------------------------------------------

--
-- Table structure for table `lh_module_nhomtaikhoan`
--

CREATE TABLE `lh_module_nhomtaikhoan` (
  `id` int(11) NOT NULL,
  `ten_vi` varchar(255) DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  `showhi` tinyint(1) NOT NULL DEFAULT '1',
  `phan_quyen` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lh_module_nhomtaikhoan`
--

INSERT INTO `lh_module_nhomtaikhoan` (`id`, `ten_vi`, `sort`, `showhi`, `phan_quyen`) VALUES
(7, 'Quản trị', 1, 0, '{\"tn_29\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":1},\"thiet-lap-website\":{\"xem\":1,\"them\":0,\"sua\":1,\"xoa\":0,\"menu\":1},\"tn_36\":{\"xem\":1,\"them\":0,\"sua\":1,\"xoa\":0,\"menu\":1},\"thiet-lap-menu\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"tn_41\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"nhom-quan-tri\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"tn_47\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"tn_30\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"khoa-website\":{\"xem\":1,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":1},\"tn_37\":{\"xem\":1,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":1},\"danh-sach-thanh-vien-quan-tri\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"tn_48\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"main-module\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":1},\"tn_31\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":1},\"quan-ly-ngon-ngu\":{\"xem\":1,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":1},\"tn_38\":{\"xem\":1,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":1},\"danh-sach-mail-nhan-tin\":{\"xem\":1,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":1},\"tn_39\":{\"xem\":1,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":1},\"danh-sach-hinh-anh\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"tn_33\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"danh-sach-mang-xa-hoi\":{\"xem\":1,\"them\":1,\"sua\":0,\"xoa\":1,\"menu\":1},\"tn_64\":{\"xem\":1,\"them\":1,\"sua\":0,\"xoa\":1,\"menu\":1},\"danh-sach-don-hang\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"tn_73\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"tn_34\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"danh-sach-thanh-vien\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"tn_49\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"danh-sach-mail-he-thong\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"tn_13\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"thiet-lap-tim-kiem-gia\":{\"xem\":1,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":1},\"tn_65\":{\"xem\":1,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":1},\"nhung-thong-tin-khac\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"tn_42\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"thong-tin-ca-nhan\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"tn_50\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"tn_84\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"tn_91\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"phuong-thuc-thanh-toan\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"tn_99\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"khach-hang-lien-he\":{\"xem\":1,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":1},\"tn_40\":{\"xem\":1,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":1},\"6\":{\"xem\":1,\"them\":1,\"sua\":1,\"xoa\":1,\"menu\":1},\"1\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"2\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"3\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"4\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0},\"5\":{\"xem\":0,\"them\":0,\"sua\":0,\"xoa\":0,\"menu\":0}}');

-- --------------------------------------------------------

--
-- Table structure for table `lh_module_page`
--

CREATE TABLE `lh_module_page` (
  `id` int(11) NOT NULL,
  `ten_vi` varchar(255) DEFAULT NULL,
  `page` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `showhi` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lh_module_page`
--

INSERT INTO `lh_module_page` (`id`, `ten_vi`, `page`, `sort`, `showhi`) VALUES
(1, 'Giới thiệu', 1, 1, 1),
(2, 'Sản phẩm', 2, 2, 1),
(3, 'Tin tức', 3, 3, 1),
(4, 'Dịch vụ', 4, 4, 1),
(5, 'Liên hệ', 5, 5, 1),
(6, 'Thư viện ảnh', 6, 6, 0),
(7, 'Dowload File', 7, 7, 0),
(8, 'Video', 8, 8, 0),
(33, 'Đại lý', 33, 33, 0),
(32, 'Clubfitting', 32, 32, 1),
(12, 'Địa điểm', 12, 12, 0),
(13, 'Đối tác', 13, 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lh_module_setting`
--

CREATE TABLE `lh_module_setting` (
  `id` int(11) NOT NULL,
  `ten_vi` varchar(255) DEFAULT NULL,
  `ten_key` varchar(255) DEFAULT NULL,
  `is_check` tinyint(4) NOT NULL DEFAULT '1',
  `sort` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lh_module_setting`
--

INSERT INTO `lh_module_setting` (`id`, `ten_vi`, `ten_key`, `is_check`, `sort`) VALUES
(6, 'Danh mục tiêu biểu', '', 1, 0),
(10, 'Sản phẩm khuyến mãi', 'san-pham-khuyen-mai', 0, 8),
(11, 'Hình ảnh hover', '', 1, 9),
(12, 'Mã sản phẩm', 'ma-san-pham', 1, 10),
(18, 'Ngôn ngữ Tiến Anh', 'ngon-ngu-tieng-anh', 1, 16),
(46, 'Dowload file', '', 1, 0),
(22, 'Mô tả main module', 'main-menu-mo-ta', 0, 20),
(23, 'Main menu - Ảnh slider', 'main-menu-anh-slider', 0, 21),
(52, 'Bài viết không mô tả', '1,3,5', 1, 0),
(53, 'Bài viết không nội dung', '', 1, 0),
(28, 'Thêm ngôn ngữ thứ 3', 'them-ngon-ngu-thu-3', 0, 16),
(29, 'Liên hệ nhóm con', 'lien-he-nhom-con', 1, 26),
(36, 'Danh sách hình ảnh nội dung', 'danh-sach-hinh-anh-noidung', 1, 33),
(37, 'Danh sách hình ảnh video', 'danh-sach-hinh-anh-video', 0, 34),
(38, 'Hiển thị danh mục', '1,2,4,5', 1, 0),
(39, 'Hiển thị tính năng', '', 1, 0),
(42, 'Liên kết bài viết khác', 'lien-ket-bai-viet-khac', 0, 38),
(43, 'Ảnh slider', '2', 1, 0),
(45, 'Thêm ngôn ngữ thứ 4', 'them-ngon-ngu-thu-4', 0, 40),
(47, 'Danh mục mô tả', '1', 1, 0),
(48, 'Danh mục nội dung', '1', 1, 0),
(49, 'Bài viết Opt', '', 1, 0),
(50, 'Bài viết Opt1', '', 1, 0),
(51, 'Bài viết Opt2', '', 1, 0),
(54, 'Ảnh menu', '0', 1, 41),
(55, 'Ẩn nhóm bài viết', '', 1, 100),
(57, 'Video', '', 1, 99),
(58, 'Danh sách hình ảnh mô tả', 'danh-sach-hinh-anh-mota', 0, 28),
(59, 'Ảnh đại diện', '1,2,4,6,5', 1, 29),
(60, 'Ảnh đại diện danh mục', '2', 1, 30),
(61, 'Ảnh hover danh mục', '2', 1, 31),
(62, 'Tên option', '{\"1\":{\"op0\":\"Đọc nhiều\",\"op1\":\"Trang chủ\",\"op2\":\"Nổi bật\"},\"3\":{\"op0\":\"Đọc nhiều\",\"op1\":\"Trang chủ\",\"op2\":\"Nổi bật\"},\"4\":{\"op0\":\"Đọc nhiều\",\"op1\":\"Trang chủ\",\"op2\":\"Nổi bật\"}}', 1, 32),
(63, 'Quản lý bài viết', '2', 1, 33);

-- --------------------------------------------------------

--
-- Table structure for table `lh_module_tinhnang`
--

CREATE TABLE `lh_module_tinhnang` (
  `id` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `ten_vi` varchar(255) DEFAULT NULL,
  `m_action` varchar(255) DEFAULT NULL,
  `m_xem` tinyint(4) NOT NULL DEFAULT '0',
  `m_them` tinyint(4) NOT NULL DEFAULT '0',
  `m_sua` tinyint(4) NOT NULL DEFAULT '0',
  `m_xoa` tinyint(4) NOT NULL DEFAULT '0',
  `m_other` tinyint(4) NOT NULL DEFAULT '0',
  `m_dev` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(255) DEFAULT NULL,
  `lien_ket` varchar(255) DEFAULT NULL,
  `showhi` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lh_module_tinhnang`
--

INSERT INTO `lh_module_tinhnang` (`id`, `id_parent`, `ten_vi`, `m_action`, `m_xem`, `m_them`, `m_sua`, `m_xoa`, `m_other`, `m_dev`, `sort`, `icon`, `lien_ket`, `showhi`) VALUES
(73, 0, 'Quản lý Đơn hàng', 'danh-sach-don-hang', 1, 0, 1, 1, 0, 0, 10, 'fa fa-shopping-cart', '', 0),
(13, 0, 'Email hệ thống', 'danh-sach-mail-he-thong', 1, 1, 1, 1, 0, 0, 17, 'fa fa-envelope', '', 1),
(68, 66, 'Danh sách file', 'danh-sach-import-du-lieu', 0, 0, 0, 0, 1, 0, 40, '', '?module=quan-ly-import-du-lieu&action=danh-sach-import-du-lieu', 1),
(64, 29, 'Danh sách mạng xã hội', 'danh-sach-mang-xa-hoi', 1, 1, 1, 1, 0, 0, 6, '', '?module=quan-ly-website&action=danh-sach-mang-xa-hoi', 1),
(65, 29, 'Thiết lập tìm kiếm giá', 'thiet-lap-tim-kiem-gia', 1, 1, 1, 1, 0, 0, 37, '', '?module=quan-ly-website&action=thiet-lap-tim-kiem-gia', 0),
(66, 0, 'Quản lý import dữ liệu', 'danh-sach-import-du-lieu', 1, 1, 1, 1, 0, 0, 8, 'fa fa-download', '', 0),
(67, 66, 'Thêm file', 'danh-sach-import-du-lieu', 0, 0, 0, 0, 1, 0, 39, '', '?module=quan-ly-import-du-lieu&action=danh-sach-import-du-lieu&them-moi=true', 1),
(29, 0, 'Quản lý website', '', 0, 0, 0, 0, 0, 0, 1, 'fa fa-tachometer', '', 1),
(30, 0, 'Main Menu', '', 0, 0, 0, 0, 0, 0, 2, 'fa fa-sliders', '', 1),
(31, 0, 'Main Module', 'main-module', 0, 0, 0, 0, 0, 0, 3, 'fa fa-bars', '', 1),
(33, 0, 'Quản lý hình ảnh', 'danh-sach-hinh-anh', 1, 1, 1, 1, 0, 0, 5, 'fa fa-image', '', 1),
(34, 0, 'Tài khoản quản trị', 'nhom-quan-tri', 0, 0, 0, 0, 0, 0, 16, 'fa fa-user-circle-o', '', 1),
(36, 29, 'Thiết lập website', 'thiet-lap-website', 1, 0, 1, 0, 0, 0, 1, '', '?module=quan-ly-website&action=thiet-lap-website', 1),
(37, 29, 'Khóa website', 'khoa-website', 1, 0, 1, 0, 0, 0, 2, '', '?module=quan-ly-website&action=khoa-website', 1),
(38, 29, 'Quản lý ngôn ngữ', 'quan-ly-ngon-ngu', 1, 0, 1, 0, 0, 0, 3, '', '?module=quan-ly-website&action=quan-ly-ngon-ngu', 1),
(39, 29, 'Danh sách email nhận tin', 'danh-sach-mail-nhan-tin', 1, 0, 0, 1, 0, 0, 4, '', '?module=quan-ly-website&action=danh-sach-mail-nhan-tin', 0),
(40, 29, 'Khách hàng liên hệ', 'khach-hang-lien-he', 1, 0, 0, 1, 0, 0, 72, '', '?module=quan-ly-website&action=khach-hang-lien-he', 1),
(41, 30, 'Thiết lập menu', 'thiet-lap-menu', 1, 1, 1, 1, 0, 0, 1, '', '?module=main-menu&action=thiet-lap-menu', 1),
(42, 30, 'Nội dung khác', 'nhung-thong-tin-khac', 1, 0, 1, 0, 0, 0, 40, '', '?module=main-menu&action=nhung-thong-tin-khac', 1),
(44, 73, 'Phí vận chuyển', 'thanh-toan-phuong-thuc-van-chuyen', 1, 1, 1, 1, 0, 0, 2, '', '?module=quan-ly-thanh-toan&action=thanh-toan-phuong-thuc-van-chuyen', 0),
(45, 73, 'Thông tin thanh toán', 'thanh-toan-phuong-thuc-thanh-toan', 1, 1, 1, 1, 0, 0, 100, '', '?module=quan-ly-thanh-toan&action=thanh-toan-phuong-thuc-thanh-toan', 1),
(46, 73, 'Mã giảm giá', 'danh-sach-ma-giam-gia', 1, 1, 1, 1, 0, 0, 4, '', '?module=quan-ly-thanh-toan&action=danh-sach-ma-giam-gia', 0),
(47, 34, 'Nhóm quản trị', 'nhom-quan-tri', 1, 1, 1, 1, 0, 0, 1, '', '', 0),
(48, 34, 'Tài khoản quản trị', 'danh-sach-thanh-vien-quan-tri', 1, 1, 1, 1, 0, 0, 2, '', '', 1),
(49, 0, 'Danh sách thành viên', 'danh-sach-thanh-vien', 1, 1, 1, 1, 0, 0, 16, 'fa fa-users', '', 0),
(50, 34, 'Thông tin cá nhân', 'thong-tin-ca-nhan', 1, 0, 1, 0, 0, 0, 48, '', '?module=quan-ly-thanh-vien&action=thong-tin-ca-nhan', 1),
(51, 33, 'Thêm hình ảnh', 'danh-sach-hinh-anh', 0, 0, 0, 0, 1, 0, 49, '', '?module=quan-ly-hinh-anh&action=danh-sach-hinh-anh&them-moi=true', 1),
(52, 33, 'Danh sách hình ảnh', 'danh-sach-hinh-anh', 0, 0, 0, 0, 1, 0, 50, '', '?module=quan-ly-hinh-anh&action=danh-sach-hinh-anh', 1),
(53, 33, 'Thêm loại hình ảnh', 'danh-sach-loai-hinh-anh', 0, 0, 0, 0, 1, 1, 51, '', '?module=quan-ly-hinh-anh&action=danh-sach-loai-hinh-anh&them-moi=true', 1),
(54, 33, 'Danh sách loại hình ảnh', 'danh-sach-loai-hinh-anh', 0, 0, 0, 0, 1, 1, 52, '', '?module=quan-ly-hinh-anh&action=danh-sach-loai-hinh-anh', 1),
(55, 47, 'Thêm nhóm quản trị', 'nhom-quan-tri', 0, 0, 0, 0, 1, 0, 53, '', '?module=quan-ly-thanh-vien&action=nhom-quan-tri&them-moi=true', 1),
(56, 47, 'Danh sách nhóm quản trị', 'nhom-quan-tri', 0, 0, 0, 0, 1, 0, 54, '', '?module=quan-ly-thanh-vien&action=nhom-quan-tri', 1),
(57, 48, 'Thêm tài khoản', 'danh-sach-thanh-vien-quan-tri', 0, 0, 0, 0, 1, 0, 55, '', '?module=quan-ly-thanh-vien&action=danh-sach-thanh-vien-quan-tri&them-moi=true', 1),
(58, 48, 'Danh sách tài khoản', 'danh-sach-thanh-vien-quan-tri', 0, 0, 0, 0, 1, 0, 56, '', '?module=quan-ly-thanh-vien&action=danh-sach-thanh-vien-quan-tri', 1),
(59, 49, 'Thêm thành viên', 'danh-sach-thanh-vien', 0, 0, 0, 0, 1, 0, 57, '', '?module=quan-ly-thanh-vien&action=danh-sach-thanh-vien&them-moi=true', 1),
(60, 49, 'Danh sách thành viên', 'danh-sach-thanh-vien', 0, 0, 0, 0, 1, 0, 58, '', '?module=quan-ly-thanh-vien&action=danh-sach-thanh-vien', 1),
(61, 13, 'Thêm email', 'danh-sach-mail-he-thong', 0, 0, 0, 0, 1, 0, 59, '', '?module=quan-ly-mail-he-thong&action=danh-sach-mail-he-thong&them-moi=true', 1),
(62, 13, 'Danh sách email', 'danh-sach-mail-he-thong', 0, 0, 0, 0, 1, 0, 60, '', '?module=quan-ly-mail-he-thong&action=danh-sach-mail-he-thong', 1),
(74, 73, 'Danh sách đơn hàng', 'danh-sach-don-hang', 0, 0, 0, 0, 1, 0, 46, '', '?module=quan-ly-don-hang&action=danh-sach-don-hang', 1),
(75, 0, 'Quản lý Hỗ trợ online', 'danh-sach-ho-tro', 1, 1, 1, 1, 0, 0, 11, 'fa fa-phone', '', 0),
(76, 75, 'Thêm mới', 'danh-sach-ho-tro', 0, 0, 0, 0, 1, 0, 48, '', '?module=quan-ly-ho-tro&action=danh-sach-ho-tro&them-moi=true', 1),
(77, 75, 'Danh sách hỗ trợ', 'danh-sach-ho-tro', 0, 0, 0, 0, 1, 0, 49, '', '?module=quan-ly-ho-tro&action=danh-sach-ho-tro', 1),
(103, 29, 'Hiển thị trang chủ', 'du-lieu-sn', 1, 1, 1, 1, 0, 0, 73, '', '?module=du-lieu-sn&action=du-lieu-sn', 0),
(79, 29, 'Quản lý bình luận', 'quan-ly-binh-luan', 1, 0, 1, 1, 0, 0, 51, '', '?module=module-he-thong&action=quan-ly-binh-luan', 0),
(90, 0, 'Quản lý địa điểm', 'quan-ly-dia-diem', 1, 1, 1, 1, 0, 0, 62, '', '', 0),
(91, 90, 'Danh sách địa điểm', 'danh-sach-dia-diem', 1, 0, 1, 0, 0, 0, 2, '', '?module=quan-ly-dia-diem&action=danh-sach-dia-diem', 1),
(92, 34, 'Nhóm thành viên', 'nhom-thanh-vien', 1, 1, 1, 1, 0, 0, 47, '', '?module=quan-ly-tai-khoan&action=nhom-thanh-vien', 0),
(93, 92, 'Thêm nhóm thành viên', 'nhom-thanh-vien', 0, 0, 0, 0, 1, 0, 65, '', '?module=quan-ly-tai-khoan&action=nhom-thanh-vien&them-moi=true', 1),
(94, 92, 'Danh sách nhóm thành viên', 'nhom-thanh-vien', 0, 0, 0, 0, 1, 0, 66, '', '?module=quan-ly-tai-khoan&action=nhom-thanh-vien', 1),
(98, 49, 'Tin nhắn', 'tin-nhan', 1, 1, 1, 1, 0, 0, 70, '', '?module=danh-sach-thanh-vien&action=tin-nhan', 0),
(99, 73, 'Phương thức thanh toán', 'phuong-thuc-thanh-toan', 1, 1, 1, 1, 0, 0, 70, '', '?module=quan-ly-don-hang&action=phuong-thuc-thanh-toan', 1),
(100, 29, 'Quản lý link 301', 'quan-ly-link', 1, 1, 1, 1, 0, 0, 71, '', '?module=quan-ly-link&action=quan-ly-link', 0),
(101, 30, 'Liên kết menu', 'lien-ket-sn', 1, 1, 1, 1, 0, 0, 2, '', '?module=lien-ket-sn&action=lien-ket-sn', 0),
(102, 90, 'Thêm địa điểm', 'danh-sach-dia-diem', 1, 1, 1, 1, 0, 0, 1, '', '?module=danh-sach-dia-diem&action=danh-sach-dia-diem&them-moi=true', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lh_online`
--

CREATE TABLE `lh_online` (
  `uip` varchar(150) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `sidd` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `timer` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `uid` int(12) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `lh_online`
--

INSERT INTO `lh_online` (`uip`, `sidd`, `timer`, `uid`) VALUES
('::1', 'ff0b5a2178c83bad9e2a51076357940c', '1585130871', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lh_order`
--

CREATE TABLE `lh_order` (
  `id` int(11) NOT NULL,
  `madh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `iduser` int(11) NOT NULL DEFAULT '0',
  `ngaydat` int(11) NOT NULL DEFAULT '0',
  `tam_tinh` int(11) NOT NULL DEFAULT '0',
  `gia_km` int(11) NOT NULL DEFAULT '0',
  `ma_giam_gia` varchar(255) DEFAULT NULL,
  `phi_ship` int(11) NOT NULL DEFAULT '0',
  `thanh_tien` int(11) NOT NULL DEFAULT '0',
  `thanh_toan` tinyint(4) NOT NULL DEFAULT '0',
  `thongtin_thanhtoan` longtext,
  `id_sp` text,
  `gia_tien` text,
  `trangthai` tinyint(2) NOT NULL DEFAULT '1',
  `cus_del` tinyint(4) NOT NULL DEFAULT '0',
  `phieu_xuat_kho` int(11) NOT NULL DEFAULT '0',
  `ma_paypal` varchar(255) DEFAULT NULL,
  `hoten` varchar(255) DEFAULT NULL,
  `sodienthoai` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `ghichu` varchar(255) DEFAULT NULL,
  `don_vi` text,
  `idsp` text,
  `soluong` text,
  `dongia` text,
  `thanhtoan` int(11) NOT NULL DEFAULT '0',
  `thanh_pho` int(11) NOT NULL DEFAULT '0',
  `quan_huyen` int(11) NOT NULL DEFAULT '0',
  `is_key` text,
  `is_nuti` tinyint(4) NOT NULL DEFAULT '0',
  `is_nhan` tinyint(1) NOT NULL DEFAULT '0',
  `hoten_nhan` varchar(255) DEFAULT NULL,
  `sodienthoai_nhan` varchar(255) DEFAULT NULL,
  `email_nhan` varchar(255) DEFAULT NULL,
  `diachi_nhan` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lh_phuongthucthanhtoan`
--

CREATE TABLE `lh_phuongthucthanhtoan` (
  `id` int(11) NOT NULL,
  `tenbaiviet_vi` varchar(255) DEFAULT NULL,
  `tenbaiviet_en` varchar(255) DEFAULT NULL,
  `noidung_vi` text,
  `noidung_en` text,
  `icon` varchar(255) DEFAULT NULL,
  `duongdantin` varchar(255) DEFAULT NULL,
  `catasort` int(11) NOT NULL DEFAULT '1',
  `showhi` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lh_phuongthucthanhtoan`
--

INSERT INTO `lh_phuongthucthanhtoan` (`id`, `tenbaiviet_vi`, `tenbaiviet_en`, `noidung_vi`, `noidung_en`, `icon`, `duongdantin`, `catasort`, `showhi`) VALUES
(4, 'Thanh toán bằng tiền mặt', 'Payment in cash', '<p>Thanh to&aacute;n bằng tiền mặt (COD)</p>', '<p>Cash payment (COD)</p>', NULL, 'datafiles/setone', 1, 1),
(5, 'Thanh toán qua chuyển khoản', 'Payment via bank transfer', '<p>ND&nbsp;Thanh to&aacute;n qua chuyển khoản</p>', '<p>ND Payment via bank transfer</p>', NULL, 'datafiles/setone', 2, 1),
(6, 'Thanh toán tại cửa hàng', 'Payment at the store', '<p>Thanh to&aacute;n tại cửa h&agrave;ng</p>', '<h3>Payment at the store</h3>', NULL, 'datafiles/setone', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lh_seo`
--

CREATE TABLE `lh_seo` (
  `id` int(11) NOT NULL,
  `seo_title_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title_cn` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `seo_description_cn` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `seo_keywords_cn` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `duongdantin` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `favico` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `robots` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `tenbaiviet_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenbaiviet_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tenbaiviet_cn` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sodienthoai_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `diachi_cn` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hotline_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `em_ip` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `em_taikhoan` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `em_pass` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `js_google_anilatic` text CHARACTER SET utf8,
  `khoa_website` text CHARACTER SET utf8,
  `is_khoasite` tinyint(4) NOT NULL DEFAULT '0',
  `is_https` tinyint(1) NOT NULL DEFAULT '0',
  `fb_app` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `fb_id` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `is_comment` tinyint(4) NOT NULL DEFAULT '0',
  `is_lang` tinyint(4) NOT NULL DEFAULT '0',
  `is_saochep` tinyint(1) NOT NULL DEFAULT '0',
  `is_tiengviet` tinyint(1) NOT NULL DEFAULT '1',
  `menu_hinhanh` tinyint(4) NOT NULL DEFAULT '0',
  `menu_hinhanh_size` varchar(50) DEFAULT NULL,
  `menu_hinhanh_hv` tinyint(4) NOT NULL DEFAULT '0',
  `menu_danhmuc` tinyint(4) NOT NULL DEFAULT '0',
  `menu_kieuhienthi` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lh_seo`
--

INSERT INTO `lh_seo` (`id`, `seo_title_vi`, `seo_description_vi`, `seo_keywords_vi`, `seo_title_en`, `seo_description_en`, `seo_keywords_en`, `seo_title_cn`, `seo_description_cn`, `seo_keywords_cn`, `duongdantin`, `icon`, `favico`, `robots`, `tenbaiviet_vi`, `tenbaiviet_en`, `tenbaiviet_cn`, `sodienthoai_vi`, `diachi_vi`, `diachi_en`, `diachi_cn`, `hotline_vi`, `email_vi`, `em_ip`, `em_taikhoan`, `em_pass`, `js_google_anilatic`, `khoa_website`, `is_khoasite`, `is_https`, `fb_app`, `fb_id`, `is_comment`, `is_lang`, `is_saochep`, `is_tiengviet`, `menu_hinhanh`, `menu_hinhanh_size`, `menu_hinhanh_hv`, `menu_danhmuc`, `menu_kieuhienthi`) VALUES
(1, 'CÔNG TY TNHH CÔNG NGHIỆP VÀ THƯƠNG MẠI ĐỨC VIỆT', 'CÔNG TY TNHH CÔNG NGHIỆP VÀ THƯƠNG MẠI ĐỨC VIỆT', 'CÔNG TY TNHH CÔNG NGHIỆP VÀ THƯƠNG MẠI ĐỨC VIỆT', 'DUC VIET INDUSTRIAL AND TRADING CO., LTD', 'DUC VIET INDUSTRIAL AND TRADING CO., LTD', 'DUC VIET INDUSTRIAL AND TRADING CO., LTD', '', '', '', 'datafiles', '1584936741_logo.png', '1584936741_favicon.ico', 'User-agent: *\r\nDisallow: /myadmin/', 'CÔNG TY TNHH CÔNG NGHIỆP VÀ THƯƠNG MẠI ĐỨC VIỆT', 'DUC VIET INDUSTRIAL AND TRADING CO., LTD', '', '024. 39783004', 'P9H2 tập thể Nguyễn Công Trứ, Hai Bà Trưng, Hà Nội, Việt Nam', 'P9H2 collective Nguyen Cong Tru, Hai Ba Trung, Hanoi, Vietnam', '', '0916 820 489', 'quatducviet@deton.com.vn', '112.213.89.161', 'no-reply@webdemo4.pavietnam.vn', 'qqhtV&lFs#RZ', '', '<p>Website is updating ...</p>', 0, 0, '', '', 1, 1, 0, 1, 0, '(100px x 100px)', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lh_seo_name`
--

CREATE TABLE `lh_seo_name` (
  `id` int(11) NOT NULL,
  `tenbaiviet_vi` varchar(255) DEFAULT NULL,
  `noidung_vi` text,
  `icon` varchar(255) DEFAULT NULL,
  `duongdantin` varchar(255) DEFAULT 'datafiles/setone',
  `seo_name` text,
  `tenbaiviet_en` varchar(255) DEFAULT NULL,
  `noidung_en` text,
  `tenbaiviet_cn` text,
  `noidung_cn` text,
  `p1_cn` text,
  `opt` tinyint(1) NOT NULL DEFAULT '0',
  `p1_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `p1_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `tenbaiviet_jp` varchar(255) DEFAULT NULL,
  `noidung_jp` text,
  `p1_jp` text,
  `showhi` tinyint(1) NOT NULL DEFAULT '1',
  `is_mota` tinyint(4) NOT NULL DEFAULT '0',
  `is_hinhanh` tinyint(4) NOT NULL DEFAULT '0',
  `is_lienket` tinyint(4) NOT NULL DEFAULT '0',
  `is_hinhanh_size` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lh_seo_name`
--

INSERT INTO `lh_seo_name` (`id`, `tenbaiviet_vi`, `noidung_vi`, `icon`, `duongdantin`, `seo_name`, `tenbaiviet_en`, `noidung_en`, `tenbaiviet_cn`, `noidung_cn`, `p1_cn`, `opt`, `p1_vi`, `p1_en`, `tenbaiviet_jp`, `noidung_jp`, `p1_jp`, `showhi`, `is_mota`, `is_hinhanh`, `is_lienket`, `is_hinhanh_size`) VALUES
(1, 'Lỗi 404 - Không Tìm Thấy Trang!', '<p>Ch&uacute;ng t&ocirc;i kh&ocirc;ng thể t&igrave;m thấy trang qu&yacute; kh&aacute;ch y&ecirc;u cầu hoặc trang y&ecirc;u cầu hiện tại kh&ocirc;ng c&oacute; sẵn. Nếu lỗi n&agrave;y xảy ra với mức độ thường xuy&ecirc;n, xin qu&yacute; kh&aacute;ch vui l&ograve;ng th&ocirc;ng b&aacute;o cho ch&uacute;ng t&ocirc;i biết về sự cố qu&yacute; kh&aacute;ch gặp.</p>\r\n\r\n<p><strong>[tencongty]&nbsp;</strong>h&acirc;n hạnh được phục vụ qu&yacute; kh&aacute;ch!</p>', '1519956201_404-Slider-Anzeige.png', 'datafiles/setone', '', '404 error page Not Found!', '<p>We could not find the page you requested or the requested page is not currently available. If this error occurs on a regular basis, please inform us about the problem you are having.</p>\r\n\r\n<p><strong>[tencongty]&nbsp;&nbsp;</strong>is pleased to serve you!</p>', '', '', '', 1, '', '', '', '', '', 1, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lh_ship_khuvuc`
--

CREATE TABLE `lh_ship_khuvuc` (
  `id` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `tenbaiviet_vi` varchar(255) DEFAULT NULL,
  `tenbaiviet_en` varchar(255) DEFAULT NULL,
  `tenbaiviet_cn` varchar(255) DEFAULT NULL,
  `tenbaiviet_jp` varchar(255) DEFAULT NULL,
  `id_shipchung` int(11) NOT NULL DEFAULT '0',
  `id_giaohangnhanh` int(11) NOT NULL DEFAULT '0',
  `catasort` int(11) NOT NULL DEFAULT '0',
  `showhi` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lh_ship_khuvuc`
--

INSERT INTO `lh_ship_khuvuc` (`id`, `id_parent`, `tenbaiviet_vi`, `tenbaiviet_en`, `tenbaiviet_cn`, `tenbaiviet_jp`, `id_shipchung`, `id_giaohangnhanh`, `catasort`, `showhi`) VALUES
(1, 0, 'Hà Nội', 'Hà Nội', 'Hà Nội', 'Hà Nội', 18, 201, 1, 1),
(2, 0, 'TP.Hồ Chí Minh', 'TP.Hồ Chí Minh', 'TP.Hồ Chí Minh', 'TP.Hồ Chí Minh', 52, 202, 3, 1),
(3, 0, 'An Giang', 'An Giang', 'An Giang', 'An Giang', 56, 217, 4, 1),
(4, 0, 'Bà Rịa - Vũng Tàu', 'Bà Rịa - Vũng Tàu', 'Bà Rịa - Vũng Tàu', 'Bà Rịa - Vũng Tàu', 54, 206, 5, 1),
(5, 0, 'Bắc Giang', 'Bắc Giang', 'Bắc Giang', 'Bắc Giang', 19, 248, 6, 1),
(6, 0, 'Bắc Kạn', 'Bắc Kạn', 'Bắc Kạn', 'Bắc Kạn', 6, 245, 7, 1),
(7, 0, 'Bạc Liêu', 'Bạc Liêu', 'Bạc Liêu', 'Bạc Liêu', 65, 253, 8, 1),
(8, 0, 'Bắc Ninh', 'Bắc Ninh', 'Bắc Ninh', 'Bắc Ninh', 2, 249, 9, 1),
(9, 0, 'Bến Tre', 'Bến Tre', 'Bến Tre', 'Bến Tre', 60, 213, 10, 1),
(10, 0, 'Bình Dương', 'Bình Dương', 'Bình Dương', 'Bình Dương', 49, 205, 11, 1),
(11, 0, 'Bình Định', 'Bình Định', 'Bình Định', 'Bình Định', 39, 262, 12, 1),
(12, 0, 'Bình Phước', 'Bình Phước', 'Bình Phước', 'Bình Phước', 45, 239, 13, 1),
(13, 0, 'Bình Thuận', 'Bình Thuận', 'Bình Thuận', 'Bình Thuận', 51, 258, 14, 1),
(14, 0, 'Cà Mau', 'Cà Mau', 'Cà Mau', 'Cà Mau', 68, 252, 15, 1),
(15, 0, 'Cần Thơ', 'Cần Thơ', 'Cần Thơ', 'Cần Thơ', 59, 220, 16, 1),
(16, 0, 'Cao Bằng', 'Cao Bằng', 'Cao Bằng', 'Cao Bằng', 1, 246, 17, 1),
(17, 0, 'Đà Nẵng', 'Đà Nẵng', 'Đà Nẵng', 'Đà Nẵng', 35, 203, 18, 1),
(18, 0, 'Đắk Lắk', 'Đắk Lắk', 'Đắk Lắk', 'Đắk Lắk', 42, 210, 19, 1),
(19, 0, 'Đắk Nông', 'Đắk Nông', 'Đắk Nông', 'Đắk Nông', 44, 241, 20, 1),
(20, 0, 'Điện Biên', 'Điện Biên', 'Điện Biên', 'Điện Biên', 10, 265, 21, 1),
(21, 0, 'Đồng Nai', 'Đồng Nai', 'Đồng Nai', 'Đồng Nai', 50, 204, 22, 1),
(22, 0, 'Đồng Tháp', 'Đồng Tháp', 'Đồng Tháp', 'Đồng Tháp', 57, 216, 23, 1),
(23, 0, 'Gia Lai', 'Gia Lai', 'Gia Lai', 'Gia Lai', 40, 207, 24, 1),
(24, 0, 'Hà Giang', 'Hà Giang', 'Hà Giang', 'Hà Giang', 3, 227, 25, 1),
(25, 0, 'Hà Nam', 'Hà Nam', 'Hà Nam', 'Hà Nam', 25, 232, 26, 1),
(26, 0, 'Hà Tĩnh', 'Hà Tĩnh', 'Hà Tĩnh', 'Hà Tĩnh', 31, 236, 27, 1),
(27, 0, 'Hải Dương', 'Hải Dương', 'Hải Dương', 'Hải Dương', 22, 225, 28, 1),
(28, 0, 'Hải Phòng', 'Hải Phòng', 'Hải Phòng', 'Hải Phòng', 24, 224, 29, 1),
(29, 0, 'Hậu Giang', 'Hậu Giang', 'Hậu Giang', 'Hậu Giang', 63, 250, 30, 1),
(30, 0, 'Hòa Bình', 'Hòa Bình', 'Hòa Bình', 'Hòa Bình', 23, 267, 31, 1),
(31, 0, 'Hưng Yên', 'Hưng Yên', 'Hưng Yên', 'Hưng Yên', 8, 268, 32, 1),
(32, 0, 'Khánh Hòa', 'Khánh Hòa', 'Khánh Hòa', 'Khánh Hòa', 43, 208, 33, 1),
(33, 0, 'Kiên Giang', 'Kiên Giang', 'Kiên Giang', 'Kiên Giang', 62, 219, 34, 1),
(34, 0, 'Kon Tum', 'Kon Tum', 'Kon Tum', 'Kon Tum', 38, 259, 35, 1),
(35, 0, 'Lai Châu', 'Lai Châu', 'Lai Châu', 'Lai Châu', 4, 264, 36, 1),
(36, 0, 'Lâm Đồng', 'Lâm Đồng', 'Lâm Đồng', 'Lâm Đồng', 46, 209, 37, 1),
(37, 0, 'Lạng Sơn', 'Lạng Sơn', 'Lạng Sơn', 'Lạng Sơn', 14, 247, 38, 1),
(38, 0, 'Lào Cai', 'Lào Cai', 'Lào Cai', 'Lào Cai', 5, 269, 39, 1),
(39, 0, 'Long An', 'Long An', 'Long An', 'Long An', 53, 211, 40, 1),
(40, 0, 'Nam Định', 'Nam Định', 'Nam Định', 'Nam Định', 28, 231, 41, 1),
(41, 0, 'Nghệ An', 'Nghệ An', 'Nghệ An', 'Nghệ An', 30, 235, 42, 1),
(42, 0, 'Ninh Bình', 'Ninh Bình', 'Ninh Bình', 'Ninh Bình', 27, 233, 43, 1),
(43, 0, 'Ninh Thuận', 'Ninh Thuận', 'Ninh Thuận', 'Ninh Thuận', 47, 261, 44, 1),
(44, 0, 'Phú Thọ', 'Phú Thọ', 'Phú Thọ', 'Phú Thọ', 17, 229, 45, 1),
(45, 0, 'Phú Yên', 'Phú Yên', 'Phú Yên', 'Phú Yên', 9, 260, 46, 1),
(46, 0, 'Quảng Bình', 'Quảng Bình', 'Quảng Bình', 'Quảng Bình', 32, 237, 47, 1),
(47, 0, 'Quảng Nam', 'Quảng Nam', 'Quảng Nam', 'Quảng Nam', 36, 243, 48, 1),
(48, 0, 'Quảng Ngãi', 'Quảng Ngãi', 'Quảng Ngãi', 'Quảng Ngãi', 37, 242, 49, 1),
(49, 0, 'Quảng Ninh', 'Quảng Ninh', 'Quảng Ninh', 'Quảng Ninh', 20, 230, 50, 1),
(50, 0, 'Quảng Trị', 'Quảng Trị', 'Quảng Trị', 'Quảng Trị', 33, 238, 51, 1),
(51, 0, 'Sóc Trăng', 'Sóc Trăng', 'Sóc Trăng', 'Sóc Trăng', 13, 218, 52, 1),
(52, 0, 'Sơn La', 'Sơn La', 'Sơn La', 'Sơn La', 16, 266, 53, 1),
(53, 0, 'Tây Ninh', 'Tây Ninh', 'Tây Ninh', 'Tây Ninh', 48, 240, 54, 1),
(54, 0, 'Thái Bình', 'Thái Bình', 'Thái Bình', 'Thái Bình', 26, 226, 55, 1),
(55, 0, 'Thái Nguyên', 'Thái Nguyên', 'Thái Nguyên', 'Thái Nguyên', 12, 244, 56, 1),
(56, 0, 'Thanh Hóa', 'Thanh Hóa', 'Thanh Hóa', 'Thanh Hóa', 29, 234, 57, 1),
(57, 0, 'Thừa Thiên Huế', 'Thừa Thiên Huế', 'Thừa Thiên Huế', 'Thừa Thiên Huế', 34, 223, 58, 1),
(58, 0, 'Tiền Giang', 'Tiền Giang', 'Tiền Giang', 'Tiền Giang', 58, 212, 59, 1),
(59, 0, 'Trà Vinh', 'Trà Vinh', 'Trà Vinh', 'Trà Vinh', 64, 214, 60, 1),
(60, 0, 'Tuyên Quang', 'Tuyên Quang', 'Tuyên Quang', 'Tuyên Quang', 7, 228, 61, 1),
(61, 0, 'Vĩnh Long', 'Vĩnh Long', 'Vĩnh Long', 'Vĩnh Long', 61, 215, 62, 1),
(62, 0, 'Vĩnh Phúc', 'Vĩnh Phúc', 'Vĩnh Phúc', 'Vĩnh Phúc', 15, 221, 63, 1),
(63, 0, 'Yên Bái', 'Yên Bái', 'Yên Bái', 'Yên Bái', 11, 263, 64, 1),
(64, 1, 'Thị Xã Sơn Tây', 'Thị Xã Sơn Tây', 'Thị Xã Sơn Tây', 'Thị Xã Sơn Tây', 183, 1711, 2, 1),
(65, 1, 'Quận Thanh Xuân', 'Quận Thanh Xuân', 'Quận Thanh Xuân', 'Quận Thanh Xuân', 190, 1493, 3, 1),
(66, 1, 'Quận Tây Hồ', 'Quận Tây Hồ', 'Quận Tây Hồ', 'Quận Tây Hồ', 174, 1492, 4, 1),
(67, 1, 'Quận Nam Từ Liêm', 'Quận Nam Từ Liêm', 'Quận Nam Từ Liêm', 'Quận Nam Từ Liêm', 165, 3440, 5, 1),
(68, 1, 'Quận Long Biên', 'Quận Long Biên', 'Quận Long Biên', 'Quận Long Biên', 186, 1491, 6, 1),
(69, 1, 'Quận Hoàng Mai', 'Quận Hoàng Mai', 'Quận Hoàng Mai', 'Quận Hoàng Mai', 167, 1490, 7, 1),
(70, 1, 'Quận Hoàn Kiếm', 'Quận Hoàn Kiếm', 'Quận Hoàn Kiếm', 'Quận Hoàn Kiếm', 163, 1489, 8, 1),
(71, 1, 'Quận Hai Bà Trưng', 'Quận Hai Bà Trưng', 'Quận Hai Bà Trưng', 'Quận Hai Bà Trưng', 173, 1488, 9, 1),
(72, 1, 'Quận Hà Đông', 'Quận Hà Đông', 'Quận Hà Đông', 'Quận Hà Đông', 170, 1542, 10, 1),
(73, 1, 'Quận Đống Đa', 'Quận Đống Đa', 'Quận Đống Đa', 'Quận Đống Đa', 191, 1486, 11, 1),
(74, 1, 'Quận Cầu Giấy', 'Quận Cầu Giấy', 'Quận Cầu Giấy', 'Quận Cầu Giấy', 178, 1485, 12, 1),
(75, 1, 'Quận Bắc Từ Liêm', 'Quận Bắc Từ Liêm', 'Quận Bắc Từ Liêm', 'Quận Bắc Từ Liêm', 717, 1482, 13, 1),
(76, 1, 'Quận Ba Đình', 'Quận Ba Đình', 'Quận Ba Đình', 'Quận Ba Đình', 189, 1484, 14, 1),
(77, 1, 'Huyện Ứng Hòa', 'Huyện Ứng Hòa', 'Huyện Ứng Hòa', 'Huyện Ứng Hòa', 177, 1810, 15, 1),
(78, 1, 'Huyện Thường Tín', 'Huyện Thường Tín', 'Huyện Thường Tín', 'Huyện Thường Tín', 181, 3303, 16, 1),
(79, 1, 'Huyện Thanh Trì', 'Huyện Thanh Trì', 'Huyện Thanh Trì', 'Huyện Thanh Trì', 176, 1710, 17, 1),
(80, 1, 'Huyện Thanh Oai', 'Huyện Thanh Oai', 'Huyện Thanh Oai', 'Huyện Thanh Oai', 180, 1809, 18, 1),
(81, 1, 'Huyện Thạch Thất', 'Huyện Thạch Thất', 'Huyện Thạch Thất', 'Huyện Thạch Thất', 168, 1808, 19, 1),
(82, 1, 'Huyện Sóc Sơn', 'Huyện Sóc Sơn', 'Huyện Sóc Sơn', 'Huyện Sóc Sơn', 171, 1583, 20, 1),
(83, 1, 'Huyện Quốc Oai', 'Huyện Quốc Oai', 'Huyện Quốc Oai', 'Huyện Quốc Oai', 187, 2004, 21, 1),
(84, 1, 'Huyện Phúc Thọ', 'Huyện Phúc Thọ', 'Huyện Phúc Thọ', 'Huyện Phúc Thọ', 179, 1807, 22, 1),
(85, 1, 'Huyện Phú Xuyên', 'Huyện Phú Xuyên', 'Huyện Phú Xuyên', 'Huyện Phú Xuyên', 184, 3255, 23, 1),
(86, 1, 'Huyện Mỹ Đức', 'Huyện Mỹ Đức', 'Huyện Mỹ Đức', 'Huyện Mỹ Đức', 182, 1806, 24, 1),
(87, 1, 'Huyện Mê Linh', 'Huyện Mê Linh', 'Huyện Mê Linh', 'Huyện Mê Linh', 175, 1581, 25, 1),
(88, 1, 'Huyện Hoài Đức', 'Huyện Hoài Đức', 'Huyện Hoài Đức', 'Huyện Hoài Đức', 166, 1805, 26, 1),
(89, 1, 'Huyện Gia Lâm', 'Huyện Gia Lâm', 'Huyện Gia Lâm', 'Huyện Gia Lâm', 172, 1703, 27, 1),
(90, 1, 'Huyện Đông Anh', 'Huyện Đông Anh', 'Huyện Đông Anh', 'Huyện Đông Anh', 188, 1582, 28, 1),
(91, 1, 'Huyện Đan Phượng', 'Huyện Đan Phượng', 'Huyện Đan Phượng', 'Huyện Đan Phượng', 185, 1804, 29, 1),
(92, 1, 'Huyện Chương Mỹ', 'Huyện Chương Mỹ', 'Huyện Chương Mỹ', 'Huyện Chương Mỹ', 169, 1915, 30, 1),
(93, 1, 'Huyện Ba Vì', 'Huyện Ba Vì', 'Huyện Ba Vì', 'Huyện Ba Vì', 164, 1803, 31, 1),
(94, 2, 'Quận Thủ Đức', 'Thu-Duc District', 'Thu Duc区', 'Thu Duc地区', 568, 1463, 2, 1),
(95, 2, 'Quận Tân Phú', 'Tan Phu District', 'Tan Phu区', 'タンフー県', 552, 1456, 3, 1),
(96, 2, 'Quận Tân Bình', 'Tan Binh district', 'Tan Binh区', 'タンビン地区', 551, 1455, 4, 1),
(97, 2, 'Quận Phú Nhuận', 'Phu Nhuan district', 'Phu Nhuan区', 'Phu Nhuan地区', 570, 1457, 5, 1),
(98, 2, 'Quận Gò Vấp', 'Go vap district', '去Vap区', 'Go Vap地区', 561, 1461, 6, 1),
(99, 2, 'Quận Bình Thạnh', 'Binh thanh district', 'Binh Thanh区', 'ビンタン地区', 569, 1462, 7, 1),
(100, 2, 'Quận Bình Tân', 'Binh Tan District', '平坦区', 'ビンタン地区', 564, 1458, 8, 1),
(101, 2, 'Quận 9', 'District 9', '9区', '第9地区', 558, 1451, 9, 1),
(102, 2, 'Quận 8', 'District 8', '8区', '第8地区', 565, 1450, 10, 1),
(103, 2, 'Quận 7', 'District 7', '7区', '第7地区', 556, 1449, 11, 1),
(104, 2, 'Quận 6', 'District 6', '6区', '第6地区', 548, 1448, 12, 1),
(105, 2, 'Quận 5', 'District 5', '5区', '第5地区', 549, 1447, 13, 1),
(106, 2, 'Quận 4', 'District 4', '4区', '第4地区', 566, 1446, 14, 1),
(107, 2, 'Quận 3', 'District 3', '3区', '第3地区', 550, 1444, 15, 1),
(108, 2, 'Quận 2', 'District 2', '2区', '第2地区', 571, 1443, 16, 1),
(109, 2, 'Quận 12', 'District 12', '12区', '第12地区', 557, 1454, 17, 1),
(110, 2, 'Quận 11', 'District 11', '11区', '第11地区', 562, 1453, 18, 1),
(111, 2, 'Quận 10', 'District 10', '10区', '第10地区', 555, 1452, 19, 1),
(112, 2, 'Quận 1', 'District 1', '1区', '第1地区', 560, 1442, 20, 1),
(113, 2, 'Huyện Nhà Bè', 'Nha Be province', 'Nha Be区', 'ニャベ地区', 554, 1534, 21, 1),
(114, 2, 'Huyện Hóc Môn', 'Hoc Mon province', 'Hoc Mon区', 'Hoc Mon地区', 563, 1459, 22, 1),
(115, 2, 'Huyện Củ Chi', 'Cu Chi province', '铜池区', 'Cu Chi地区', 553, 1460, 23, 1),
(116, 2, 'Huyện Cần Giờ', 'Can Gio province', '可吉奥区', '缶ジオ地区', 559, 2090, 24, 1),
(117, 2, 'Huyện Bình Chánh', 'Binh Chanh province', 'Binh Chanh区', 'ビンチャン地区', 567, 1533, 25, 1),
(118, 3, 'Thị Xã Tân Châu', 'Thị Xã Tân Châu', 'Thị Xã Tân Châu', 'Thị Xã Tân Châu', 601, 1755, 2, 1),
(119, 3, 'Thị Xã Châu Đốc', 'Thị Xã Châu Đốc', 'Thị Xã Châu Đốc', 'Thị Xã Châu Đốc', 594, 1753, 3, 1),
(120, 3, 'Thành Phố Long Xuyên', 'Thành Phố Long Xuyên', 'Thành Phố Long Xuyên', 'Thành Phố Long Xuyên', 597, 1566, 4, 1),
(121, 3, 'Huyện Tri Tôn', 'Huyện Tri Tôn', 'Huyện Tri Tôn', 'Huyện Tri Tôn', 604, 1751, 5, 1),
(122, 3, 'Huyện Tịnh Biên', 'Huyện Tịnh Biên', 'Huyện Tịnh Biên', 'Huyện Tịnh Biên', 602, 1752, 6, 1),
(123, 3, 'Huyện Thoại Sơn', 'Huyện Thoại Sơn', 'Huyện Thoại Sơn', 'Huyện Thoại Sơn', 596, 1750, 7, 1),
(124, 3, 'Huyện Phú Tân', 'Huyện Phú Tân', 'Huyện Phú Tân', 'Huyện Phú Tân', 595, 1756, 8, 1),
(125, 3, 'Huyện Chợ Mới', 'Huyện Chợ Mới', 'Huyện Chợ Mới', 'Huyện Chợ Mới', 599, 1757, 9, 1),
(126, 3, 'Huyện Châu Thành', 'Huyện Châu Thành', 'Huyện Châu Thành', 'Huyện Châu Thành', 603, 1718, 10, 1),
(127, 3, 'Huyện Châu Phú', 'Huyện Châu Phú', 'Huyện Châu Phú', 'Huyện Châu Phú', 600, 1758, 11, 1),
(128, 3, 'Huyện An Phú', 'Huyện An Phú', 'Huyện An Phú', 'Huyện An Phú', 598, 1754, 12, 1),
(129, 4, 'Thành Phố Vũng Tàu', 'Thành Phố Vũng Tàu', 'Thành Phố Vũng Tàu', 'Thành Phố Vũng Tàu', 592, 1544, 2, 1),
(130, 4, 'Thành Phố Bà Rịa', 'Thành Phố Bà Rịa', 'Thành Phố Bà Rịa', 'Thành Phố Bà Rịa', 586, 1667, 3, 1),
(131, 4, 'Huyện Xuyên Mộc', 'Huyện Xuyên Mộc', 'Huyện Xuyên Mộc', 'Huyện Xuyên Mộc', 588, 1699, 4, 1),
(132, 4, 'Huyện Tân Thành', 'Huyện Tân Thành', 'Huyện Tân Thành', 'Huyện Tân Thành', 587, 1701, 5, 1),
(134, 4, 'Huyện Long điền', 'Huyện Long điền', 'Huyện Long điền', 'Huyện Long điền', 590, 1689, 7, 1),
(135, 4, 'Huyện Đất Đỏ', 'Huyện Đất Đỏ', 'Huyện Đất Đỏ', 'Huyện Đất Đỏ', 593, 1690, 8, 1),
(136, 4, 'Huyện Côn đảo', 'Huyện Côn đảo', 'Huyện Côn đảo', 'Huyện Côn đảo', 589, 2111, 9, 1),
(137, 4, 'Huyện Châu đức', 'Huyện Châu đức', 'Huyện Châu đức', 'Huyện Châu đức', 591, 1709, 10, 1),
(138, 5, 'Thành Phố Bắc Giang', 'Thành Phố Bắc Giang', 'Thành Phố Bắc Giang', 'Thành Phố Bắc Giang', 192, 1643, 2, 1),
(139, 5, 'Huyện Yên Thế', 'Huyện Yên Thế', 'Huyện Yên Thế', 'Huyện Yên Thế', 196, 1765, 3, 1),
(140, 5, 'Huyện Yên Dũng', 'Huyện Yên Dũng', 'Huyện Yên Dũng', 'Huyện Yên Dũng', 197, 1764, 4, 1),
(141, 5, 'Huyện Việt Yên', 'Huyện Việt Yên', 'Huyện Việt Yên', 'Huyện Việt Yên', 194, 1763, 5, 1),
(142, 5, 'Huyện Tân Yên', 'Huyện Tân Yên', 'Huyện Tân Yên', 'Huyện Tân Yên', 201, 1762, 6, 1),
(143, 5, 'Huyện Sơn Động', 'Huyện Sơn Động', 'Huyện Sơn Động', 'Huyện Sơn Động', 195, 1761, 7, 1),
(144, 5, 'Huyện Lục Ngạn', 'Huyện Lục Ngạn', 'Huyện Lục Ngạn', 'Huyện Lục Ngạn', 198, 1966, 8, 1),
(145, 5, 'Huyện Lục Nam', 'Huyện Lục Nam', 'Huyện Lục Nam', 'Huyện Lục Nam', 199, 1965, 9, 1),
(146, 5, 'Huyện Lạng Giang', 'Huyện Lạng Giang', 'Huyện Lạng Giang', 'Huyện Lạng Giang', 200, 1760, 10, 1),
(147, 5, 'Huyện Hiệp Hòa', 'Huyện Hiệp Hòa', 'Huyện Hiệp Hòa', 'Huyện Hiệp Hòa', 193, 1759, 11, 1),
(148, 6, 'Thành Phố Bắc Kạn', 'Thành Phố Bắc Kạn', 'Thành Phố Bắc Kạn', 'Thành Phố Bắc Kạn', 52, 1640, 2, 1),
(149, 6, 'Huyện Pắc Nặm', 'Huyện Pắc Nặm', 'Huyện Pắc Nặm', 'Huyện Pắc Nặm', 53, 3249, 3, 1),
(150, 6, 'Huyện Ngân Sơn', 'Huyện Ngân Sơn', 'Huyện Ngân Sơn', 'Huyện Ngân Sơn', 51, 3242, 4, 1),
(151, 6, 'Huyện Na Rì', 'Huyện Na Rì', 'Huyện Na Rì', 'Huyện Na Rì', 54, 3232, 5, 1),
(152, 6, 'Huyện Chợ Mới', 'Huyện Chợ Mới', 'Huyện Chợ Mới', 'Huyện Chợ Mới', 49, 1914, 6, 1),
(153, 6, 'Huyện Chợ đồn', 'Huyện Chợ đồn', 'Huyện Chợ đồn', 'Huyện Chợ đồn', 50, 1913, 7, 1),
(154, 6, 'Huyện Bạch Thông', 'Huyện Bạch Thông', 'Huyện Bạch Thông', 'Huyện Bạch Thông', 55, 1889, 8, 1),
(155, 6, 'Huyện Ba Bể', 'Huyện Ba Bể', 'Huyện Ba Bể', 'Huyện Ba Bể', 56, 1887, 9, 1),
(156, 7, 'Thành Phố Bạc Liêu', 'Thành Phố Bạc Liêu', 'Thành Phố Bạc Liêu', 'Thành Phố Bạc Liêu', 688, 1655, 2, 1),
(157, 7, 'Huyện Vĩnh Lợi', 'Huyện Vĩnh Lợi', 'Huyện Vĩnh Lợi', 'Huyện Vĩnh Lợi', 690, 2050, 3, 1),
(158, 7, 'Huyện Phước Long', 'Huyện Phước Long', 'Huyện Phước Long', 'Huyện Phước Long', 685, 1998, 4, 1),
(159, 7, 'Huyện Hồng Dân', 'Huyện Hồng Dân', 'Huyện Hồng Dân', 'Huyện Hồng Dân', 691, 1946, 5, 1),
(160, 7, 'Huyện Hòa Bình', 'Huyện Hòa Bình', 'Huyện Hòa Bình', 'Huyện Hòa Bình', 686, 1723, 6, 1),
(161, 7, 'Huyện Giá Rai', 'Huyện Giá Rai', 'Huyện Giá Rai', 'Huyện Giá Rai', 689, 1935, 7, 1),
(162, 7, 'Huyện Đông Hải', 'Huyện Đông Hải', 'Huyện Đông Hải', 'Huyện Đông Hải', 687, 1926, 8, 1),
(163, 8, 'Thành Phố Bắc Ninh', 'Thành Phố Bắc Ninh', 'Thành Phố Bắc Ninh', 'Thành Phố Bắc Ninh', 15, 1644, 2, 1),
(164, 8, 'Huyện Yên Phong', 'Huyện Yên Phong', 'Huyện Yên Phong', 'Huyện Yên Phong', 19, 1768, 3, 1),
(165, 8, 'Huyện Từ Sơn', 'Huyện Từ Sơn', 'Huyện Từ Sơn', 'Huyện Từ Sơn', 21, 1730, 4, 1),
(166, 8, 'Huyện Tiên Du', 'Huyện Tiên Du', 'Huyện Tiên Du', 'Huyện Tiên Du', 20, 1729, 5, 1),
(167, 8, 'Huyện Thuận Thành', 'Huyện Thuận Thành', 'Huyện Thuận Thành', 'Huyện Thuận Thành', 17, 1767, 6, 1),
(168, 8, 'Huyện Quế Võ', 'Huyện Quế Võ', 'Huyện Quế Võ', 'Huyện Quế Võ', 18, 1728, 7, 1),
(169, 8, 'Huyện Lương Tài', 'Huyện Lương Tài', 'Huyện Lương Tài', 'Huyện Lương Tài', 14, 1969, 8, 1),
(170, 8, 'Huyện Gia Bình', 'Huyện Gia Bình', 'Huyện Gia Bình', 'Huyện Gia Bình', 16, 1766, 9, 1),
(171, 9, 'Thành Phố Bến Tre', 'Thành Phố Bến Tre', 'Thành Phố Bến Tre', 'Thành Phố Bến Tre', 644, 1558, 2, 1),
(172, 9, 'Huyện Thạnh Phú', 'Huyện Thạnh Phú', 'Huyện Thạnh Phú', 'Huyện Thạnh Phú', 645, 2028, 3, 1),
(173, 9, 'Huyện Mỏ Cày Nam', 'Huyện Mỏ Cày Nam', 'Huyện Mỏ Cày Nam', 'Huyện Mỏ Cày Nam', 642, 1975, 4, 1),
(174, 9, 'Huyện Mỏ Cày Bắc', 'Huyện Mỏ Cày Bắc', 'Huyện Mỏ Cày Bắc', 'Huyện Mỏ Cày Bắc', 643, 1974, 5, 1),
(175, 9, 'Huyện Giồng Trôm', 'Huyện Giồng Trôm', 'Huyện Giồng Trôm', 'Huyện Giồng Trôm', 646, 1937, 6, 1),
(176, 9, 'Huyện Chợ Lách', 'Huyện Chợ Lách', 'Huyện Chợ Lách', 'Huyện Chợ Lách', 640, 3158, 7, 1),
(177, 9, 'Huyện Châu Thành', 'Huyện Châu Thành', 'Huyện Châu Thành', 'Huyện Châu Thành', 639, 1742, 8, 1),
(178, 9, 'Huyện Bình Đại', 'Huyện Bình Đại', 'Huyện Bình Đại', 'Huyện Bình Đại', 641, 1895, 9, 1),
(179, 9, 'Huyện Ba Tri', 'Huyện Ba Tri', 'Huyện Ba Tri', 'Huyện Ba Tri', 638, 1888, 10, 1),
(180, 10, 'Thành Phố Thủ Dầu Một', 'Thành Phố Thủ Dầu Một', 'Thành Phố Thủ Dầu Một', 'Thành Phố Thủ Dầu Một', 524, 1538, 2, 1),
(181, 10, 'Huyện Thuận An', 'Huyện Thuận An', 'Huyện Thuận An', 'Huyện Thuận An', 525, 1541, 3, 1),
(182, 10, 'Huyện Tân Uyên', 'Huyện Tân Uyên', 'Huyện Tân Uyên', 'Huyện Tân Uyên', 520, 1695, 4, 1),
(183, 10, 'Huyện Phú Giáo', 'Huyện Phú Giáo', 'Huyện Phú Giáo', 'Huyện Phú Giáo', 526, 1992, 5, 1),
(184, 10, 'Huyện Dĩ An', 'Huyện Dĩ An', 'Huyện Dĩ An', 'Huyện Dĩ An', 521, 1540, 6, 1),
(185, 10, 'Huyện Dầu Tiếng', 'Huyện Dầu Tiếng', 'Huyện Dầu Tiếng', 'Huyện Dầu Tiếng', 523, 1746, 7, 1),
(186, 10, 'Huyện Bến Cát', 'Huyện Bến Cát', 'Huyện Bến Cát', 'Huyện Bến Cát', 522, 1696, 8, 1),
(187, 10, 'Huyện Bàu Bàng', 'Huyện Bàu Bàng', 'Huyện Bàu Bàng', 'Huyện Bàu Bàng', 708, 3132, 9, 1),
(188, 10, 'Huyện Bắc Tân Uyên', 'Huyện Bắc Tân Uyên', 'Huyện Bắc Tân Uyên', 'Huyện Bắc Tân Uyên', 710, 3135, 10, 1),
(189, 11, 'Thành Phố Quy Nhơn', 'Thành Phố Quy Nhơn', 'Thành Phố Quy Nhơn', 'Thành Phố Quy Nhơn', 430, 1662, 2, 1),
(190, 11, 'Huyện Vĩnh Thạnh', 'Huyện Vĩnh Thạnh', 'Huyện Vĩnh Thạnh', 'Huyện Vĩnh Thạnh', 429, 2258, 3, 1),
(191, 11, 'Huyện Vân Canh', 'Huyện Vân Canh', 'Huyện Vân Canh', 'Huyện Vân Canh', 424, 3312, 4, 1),
(192, 11, 'Huyện Tuy Phước', 'Huyện Tuy Phước', 'Huyện Tuy Phước', 'Huyện Tuy Phước', 431, 2023, 5, 1),
(193, 11, 'Huyên Tây Sơn', 'Huyên Tây Sơn', 'Huyên Tây Sơn', 'Huyên Tây Sơn', 422, 3279, 6, 1),
(194, 11, 'Huyện Phù Mỹ', 'Huyện Phù Mỹ', 'Huyện Phù Mỹ', 'Huyện Phù Mỹ', 432, 3254, 7, 1),
(195, 11, 'Huyện Phù Cát', 'Huyện Phù Cát', 'Huyện Phù Cát', 'Huyện Phù Cát', 427, 1770, 8, 1),
(196, 11, 'Huyện Hoài Nhơn', 'Huyện Hoài Nhơn', 'Huyện Hoài Nhơn', 'Huyện Hoài Nhơn', 426, 1771, 9, 1),
(197, 11, 'Huyện Hoài ân', 'Huyện Hoài ân', 'Huyện Hoài ân', 'Huyện Hoài ân', 423, 2140, 10, 1),
(198, 11, 'Huyện An Nhơn', 'Huyện An Nhơn', 'Huyện An Nhơn', 'Huyện An Nhơn', 703, 1769, 11, 1),
(199, 11, 'Huyện An Lão', 'Huyện An Lão', 'Huyện An Lão', 'Huyện An Lão', 425, 1886, 12, 1),
(200, 12, 'Thị Xã Phước Long', 'Thị Xã Phước Long', 'Thị Xã Phước Long', 'Thị Xã Phước Long', 484, 1775, 2, 1),
(201, 12, 'Thị Xã Đồng Xoài', 'Thị Xã Đồng Xoài', 'Thị Xã Đồng Xoài', 'Thị Xã Đồng Xoài', 485, 1625, 3, 1),
(202, 12, 'Thị Xã Bình Long', 'Thị Xã Bình Long', 'Thị Xã Bình Long', 'Thị Xã Bình Long', 489, 1774, 4, 1),
(203, 12, 'Huyện Phú Riềng', 'Huyện Phú Riềng', 'Huyện Phú Riềng', 'Huyện Phú Riềng', 722, 3444, 5, 1),
(204, 12, 'Huyện Lộc Ninh', 'Huyện Lộc Ninh', 'Huyện Lộc Ninh', 'Huyện Lộc Ninh', 483, 1964, 6, 1),
(205, 12, 'Huyện Hớn Quản', 'Huyện Hớn Quản', 'Huyện Hớn Quản', 'Huyện Hớn Quản', 488, 1773, 7, 1),
(206, 12, 'Huyện Đồng Phú', 'Huyện Đồng Phú', 'Huyện Đồng Phú', 'Huyện Đồng Phú', 486, 1722, 8, 1),
(207, 12, 'Huyện Chơn Thành', 'Huyện Chơn Thành', 'Huyện Chơn Thành', 'Huyện Chơn Thành', 490, 1772, 9, 1),
(208, 12, 'Huyện Bù Gia Mập', 'Huyện Bù Gia Mập', 'Huyện Bù Gia Mập', 'Huyện Bù Gia Mập', 487, 3141, 10, 1),
(209, 12, 'Huyện Bù đốp', 'Huyện Bù đốp', 'Huyện Bù đốp', 'Huyện Bù đốp', 482, 3140, 11, 1),
(210, 12, 'Huyện Bù đăng', 'Huyện Bù đăng', 'Huyện Bù đăng', 'Huyện Bù đăng', 491, 1899, 12, 1),
(211, 13, 'Thị Xã La Gi', 'Thị Xã La Gi', 'Thị Xã La Gi', 'Thị Xã La Gi', 543, 1778, 2, 1),
(212, 13, 'Thành Phố Phan Thiết', 'Thành Phố Phan Thiết', 'Thành Phố Phan Thiết', 'Thành Phố Phan Thiết', 546, 1666, 3, 1),
(213, 13, 'Huyện Tuy Phong', 'Huyện Tuy Phong', 'Huyện Tuy Phong', 'Huyện Tuy Phong', 540, 1781, 4, 1),
(214, 13, 'Huyện Tánh Linh', 'Huyện Tánh Linh', 'Huyện Tánh Linh', 'Huyện Tánh Linh', 541, 2012, 5, 1),
(215, 13, 'Huyện Hàm Thuận Nam', 'Huyện Hàm Thuận Nam', 'Huyện Hàm Thuận Nam', 'Huyện Hàm Thuận Nam', 547, 1776, 6, 1),
(216, 13, 'Huyện Hàm Thuận Bắc', 'Huyện Hàm Thuận Bắc', 'Huyện Hàm Thuận Bắc', 'Huyện Hàm Thuận Bắc', 538, 1777, 7, 1),
(217, 13, 'Huyện Hàm Tân', 'Huyện Hàm Tân', 'Huyện Hàm Tân', 'Huyện Hàm Tân', 545, 3196, 8, 1),
(218, 13, 'Huyện Đức Linh', 'Huyện Đức Linh', 'Huyện Đức Linh', 'Huyện Đức Linh', 542, 1779, 9, 1),
(219, 13, 'Huyện Đảo Phú Quý', 'Huyện Đảo Phú Quý', 'Huyện Đảo Phú Quý', 'Huyện Đảo Phú Quý', 539, 2116, 10, 1),
(220, 13, 'Huyện Bắc Bình', 'Huyện Bắc Bình', 'Huyện Bắc Bình', 'Huyện Bắc Bình', 544, 1780, 11, 1),
(221, 14, 'Thành Phố Cà Mau', 'Thành Phố Cà Mau', 'Thành Phố Cà Mau', 'Thành Phố Cà Mau', 698, 1654, 2, 1),
(222, 14, 'Huyện U Minh', 'Huyện U Minh', 'Huyện U Minh', 'Huyện U Minh', 699, 2042, 3, 1),
(223, 14, 'Huyện Trần Văn Thời', 'Huyện Trần Văn Thời', 'Huyện Trần Văn Thời', 'Huyện Trần Văn Thời', 700, 2038, 4, 1),
(224, 14, 'Huyện Thới Bình', 'Huyện Thới Bình', 'Huyện Thới Bình', 'Huyện Thới Bình', 696, 1782, 5, 1),
(225, 14, 'Huyện Phú Tân', 'Huyện Phú Tân', 'Huyện Phú Tân', 'Huyện Phú Tân', 697, 1883, 6, 1),
(226, 14, 'Huyện Ngọc Hiển', 'Huyện Ngọc Hiển', 'Huyện Ngọc Hiển', 'Huyện Ngọc Hiển', 695, 2186, 7, 1),
(227, 14, 'Huyện Năm Căn', 'Huyện Năm Căn', 'Huyện Năm Căn', 'Huyện Năm Căn', 693, 1783, 8, 1),
(228, 14, 'Huyện Đầm Dơi', 'Huyện Đầm Dơi', 'Huyện Đầm Dơi', 'Huyện Đầm Dơi', 694, 1922, 9, 1),
(229, 14, 'Huyện Cái Nước', 'Huyện Cái Nước', 'Huyện Cái Nước', 'Huyện Cái Nước', 692, 1901, 10, 1),
(231, 15, 'Quận Thốt Nốt', 'Quận Thốt Nốt', 'Quận Thốt Nốt', 'Quận Thốt Nốt', 629, 1576, 3, 1),
(232, 15, 'Quận Ô Môn', 'Quận Ô Môn', 'Quận Ô Môn', 'Quận Ô Môn', 626, 1575, 4, 1),
(233, 15, 'Quận Ninh Kiều', 'Quận Ninh Kiều', 'Quận Ninh Kiều', 'Quận Ninh Kiều', 628, 1572, 5, 1),
(234, 15, 'Quận Cái Răng', 'Quận Cái Răng', 'Quận Cái Răng', 'Quận Cái Răng', 636, 1574, 6, 1),
(235, 15, 'Quận Bình Thủy', 'Quận Bình Thủy', 'Quận Bình Thủy', 'Quận Bình Thủy', 630, 1573, 7, 1),
(236, 15, 'Huyện Vĩnh Thạnh', 'Huyện Vĩnh Thạnh', 'Huyện Vĩnh Thạnh', 'Huyện Vĩnh Thạnh', 632, 3317, 8, 1),
(237, 15, 'Huyện Thới Lai', 'Huyện Thới Lai', 'Huyện Thới Lai', 'Huyện Thới Lai', 627, 3300, 9, 1),
(239, 15, 'Huyện Phong điền', 'Huyện Phong điền', 'Huyện Phong điền', 'Huyện Phong điền', 634, 3250, 11, 1),
(240, 15, 'Huyện Cờ Đỏ', 'Huyện Cờ Đỏ', 'Huyện Cờ Đỏ', 'Huyện Cờ Đỏ', 637, 3150, 12, 1),
(242, 16, 'Thành Phố Cao Bằng', 'Thành Phố Cao Bằng', 'Thành Phố Cao Bằng', 'Thành Phố Cao Bằng', 12, 1641, 2, 1),
(243, 16, 'Huyện Trùng Khánh', 'Huyện Trùng Khánh', 'Huyện Trùng Khánh', 'Huyện Trùng Khánh', 7, 2041, 3, 1),
(244, 16, 'Huyện Trà Lĩnh', 'Huyện Trà Lĩnh', 'Huyện Trà Lĩnh', 'Huyện Trà Lĩnh', 2, 3305, 4, 1),
(245, 16, 'Huyện Thông Nông', 'Huyện Thông Nông', 'Huyện Thông Nông', 'Huyện Thông Nông', 10, 3299, 5, 1),
(246, 16, 'Huyện Thạch An', 'Huyện Thạch An', 'Huyện Thạch An', 'Huyện Thạch An', 1, 3289, 6, 1),
(247, 16, 'Huyện Quảng Uyên', 'Huyện Quảng Uyên', 'Huyện Quảng Uyên', 'Huyện Quảng Uyên', 9, 3259, 7, 1),
(248, 16, 'Huyện Phục Hòa', 'Huyện Phục Hòa', 'Huyện Phục Hòa', 'Huyện Phục Hòa', 6, 1997, 8, 1),
(249, 16, 'Huyện Nguyên Bình', 'Huyện Nguyên Bình', 'Huyện Nguyên Bình', 'Huyện Nguyên Bình', 4, 3246, 9, 1),
(250, 16, 'Huyện Hòa An', 'Huyện Hòa An', 'Huyện Hòa An', 'Huyện Hòa An', 8, 1943, 10, 1),
(251, 16, 'Huyện Hà Quảng', 'Huyện Hà Quảng', 'Huyện Hà Quảng', 'Huyện Hà Quảng', 13, 1939, 11, 1),
(252, 16, 'Huyện Hạ Lang', 'Huyện Hạ Lang', 'Huyện Hạ Lang', 'Huyện Hạ Lang', 3, 3194, 12, 1),
(253, 16, 'Huyện Bảo Lâm', 'Huyện Bảo Lâm', 'Huyện Bảo Lâm', 'Huyện Bảo Lâm', 11, 1890, 13, 1),
(254, 16, 'Huyện Bảo Lạc', 'Huyện Bảo Lạc', 'Huyện Bảo Lạc', 'Huyện Bảo Lạc', 5, 3130, 14, 1),
(255, 17, 'Quận Thanh Khê', 'Quận Thanh Khê', 'Quận Thanh Khê', 'Quận Thanh Khê', 374, 1527, 2, 1),
(256, 17, 'Quận Sơn Trà', 'Quận Sơn Trà', 'Quận Sơn Trà', 'Quận Sơn Trà', 377, 1528, 3, 1),
(257, 17, 'Quận Ngũ Hành Sơn', 'Quận Ngũ Hành Sơn', 'Quận Ngũ Hành Sơn', 'Quận Ngũ Hành Sơn', 375, 1529, 4, 1),
(258, 17, 'Quận Liên Chiểu', 'Quận Liên Chiểu', 'Quận Liên Chiểu', 'Quận Liên Chiểu', 379, 1530, 5, 1),
(259, 17, 'Quận Hải Châu', 'Quận Hải Châu', 'Quận Hải Châu', 'Quận Hải Châu', 376, 1526, 6, 1),
(260, 17, 'Quận Cẩm Lệ', 'Quận Cẩm Lệ', 'Quận Cẩm Lệ', 'Quận Cẩm Lệ', 373, 1531, 7, 1),
(261, 17, 'Huyện Hoàng Sa', 'Huyện Hoàng Sa', 'Huyện Hoàng Sa', 'Huyện Hoàng Sa', 380, 2112, 8, 1),
(262, 17, 'Huyện Hòa Vang', 'Huyện Hòa Vang', 'Huyện Hòa Vang', 'Huyện Hòa Vang', 378, 1687, 9, 1),
(267, 18, 'Thị Xã Buôn Hồ', 'Thị Xã Buôn Hồ', 'Thị Xã Buôn Hồ', 'Thị Xã Buôn Hồ', 452, 1788, 2, 1),
(268, 18, 'Thành Phố Buôn Ma Thuột', 'Thành Phố Buôn Ma Thuột', 'Thành Phố Buôn Ma Thuột', 'Thành Phố Buôn Ma Thuột', 455, 1552, 3, 1),
(269, 18, 'Huyện M\'Đrắk', 'Huyện M\'Đrắk', 'Huyện M\'Đrắk', 'Huyện M\'Đrắk', 463, 3418, 4, 1),
(270, 18, 'Huyện Lắk', 'Huyện Lắk', 'Huyện Lắk', 'Huyện Lắk', 458, 3217, 5, 1),
(271, 18, 'Huyện Krông Pắk', 'Huyện Krông Pắk', 'Huyện Krông Pắk', 'Huyện Krông Pắk', 457, 1954, 6, 1),
(272, 18, 'Huyện Krông Năng', 'Huyện Krông Năng', 'Huyện Krông Năng', 'Huyện Krông Năng', 451, 1787, 7, 1),
(273, 18, 'Huyện Krông Búk', 'Huyện Krông Búk', 'Huyện Krông Búk', 'Huyện Krông Búk', 450, 2150, 8, 1),
(274, 18, 'Huyện Krông Bông', 'Huyện Krông Bông', 'Huyện Krông Bông', 'Huyện Krông Bông', 462, 1789, 9, 1),
(275, 18, 'Huyện Krông A Na', 'Huyện Krông A Na', 'Huyện Krông A Na', 'Huyện Krông A Na', 456, 1884, 10, 1),
(276, 18, 'Huyện Ea Súp', 'Huyện Ea Súp', 'Huyện Ea Súp', 'Huyện Ea Súp', 461, 2131, 11, 1),
(277, 18, 'Huyện Ea Kar', 'Huyện Ea Kar', 'Huyện Ea Kar', 'Huyện Ea Kar', 454, 1931, 12, 1),
(278, 18, 'Huyện Ea H\'leo', 'Huyện Ea H\'leo', 'Huyện Ea H\'leo', 'Huyện Ea H\'leo', 464, 1786, 13, 1),
(279, 18, 'Huyện Cư M\'gar', 'Huyện Cư M\'gar', 'Huyện Cư M\'gar', 'Huyện Cư M\'gar', 459, 1785, 14, 1),
(280, 18, 'Huyện Cư Kuin', 'Huyện Cư Kuin', 'Huyện Cư Kuin', 'Huyện Cư Kuin', 453, 3153, 15, 1),
(281, 18, 'Huyện Buôn đôn', 'Huyện Buôn đôn', 'Huyện Buôn đôn', 'Huyện Buôn đôn', 460, 1784, 16, 1),
(282, 19, 'Thị Xã Gia Nghĩa', 'Thị Xã Gia Nghĩa', 'Thị Xã Gia Nghĩa', 'Thị Xã Gia Nghĩa', 477, 1627, 2, 1),
(283, 19, 'Huyện Tuy đức', 'Huyện Tuy đức', 'Huyện Tuy đức', 'Huyện Tuy đức', 475, 2227, 3, 1),
(284, 19, 'Huyện Krông Nô', 'Huyện Krông Nô', 'Huyện Krông Nô', 'Huyện Krông Nô', 479, 2151, 4, 1),
(285, 19, 'Huyện Đắk Song', 'Huyện Đắk Song', 'Huyện Đắk Song', 'Huyện Đắk Song', 480, 2120, 5, 1),
(286, 19, 'Huyện Đăk R\'lấp', 'Huyện Đăk R\'lấp', 'Huyện Đăk R\'lấp', 'Huyện Đăk R\'lấp', 476, 1790, 6, 1),
(287, 19, 'Huyện Đắk Mil', 'Huyện Đắk Mil', 'Huyện Đắk Mil', 'Huyện Đắk Mil', 481, 1792, 7, 1),
(288, 19, 'Huyện Đắk Glong', 'Huyện Đắk Glong', 'Huyện Đắk Glong', 'Huyện Đắk Glong', 474, 1791, 8, 1),
(289, 19, 'Huyện Cư Jút', 'Huyện Cư Jút', 'Huyện Cư Jút', 'Huyện Cư Jút', 478, 3152, 9, 1),
(290, 20, 'Thị Xã Mường Lay', 'Thị Xã Mường Lay', 'Thị Xã Mường Lay', 'Thị Xã Mường Lay', 85, 2060, 2, 1),
(291, 20, 'Thành Phố Điện Biên Phủ', 'Thành Phố Điện Biên Phủ', 'Thành Phố Điện Biên Phủ', 'Thành Phố Điện Biên Phủ', 82, 1676, 3, 1),
(292, 20, 'Huyện Tuần Giáo', 'Huyện Tuần Giáo', 'Huyện Tuần Giáo', 'Huyện Tuần Giáo', 90, 2022, 4, 1),
(293, 20, 'Huyện Tủa Chùa', 'Huyện Tủa Chùa', 'Huyện Tủa Chùa', 'Huyện Tủa Chùa', 86, 2021, 5, 1),
(294, 20, 'Huyện Nậm Pồ', 'Huyện Nậm Pồ', 'Huyện Nậm Pồ', 'Huyện Nậm Pồ', 704, 2179, 6, 1),
(295, 20, 'Huyện Mường Nhé', 'Huyện Mường Nhé', 'Huyện Mường Nhé', 'Huyện Mường Nhé', 87, 1979, 7, 1),
(296, 20, 'Huyện Mường Chà', 'Huyện Mường Chà', 'Huyện Mường Chà', 'Huyện Mường Chà', 88, 1978, 8, 1),
(297, 20, 'Huyện Mường Áng', 'Huyện Mường Áng', 'Huyện Mường Áng', 'Huyện Mường Áng', 89, 2170, 9, 1),
(298, 20, 'Huyện Điện Biên Đông', 'Huyện Điện Biên Đông', 'Huyện Điện Biên Đông', 'Huyện Điện Biên Đông', 84, 2123, 10, 1),
(299, 20, 'Huyện Điện Biên', 'Huyện Điện Biên', 'Huyện Điện Biên', 'Huyện Điện Biên', 83, 1676, 11, 1),
(300, 21, 'Thị Xã Long Khánh', 'Thị Xã Long Khánh', 'Thị Xã Long Khánh', 'Thị Xã Long Khánh', 528, 1692, 2, 1),
(301, 21, 'Thành Phố Biên Hòa', 'Thành Phố Biên Hòa', 'Thành Phố Biên Hòa', 'Thành Phố Biên Hòa', 533, 1536, 3, 1),
(302, 21, 'Huyện Xuân Lộc', 'Huyện Xuân Lộc', 'Huyện Xuân Lộc', 'Huyện Xuân Lộc', 535, 1704, 4, 1),
(303, 21, 'Huyện Vĩnh Cửu', 'Huyện Vĩnh Cửu', 'Huyện Vĩnh Cửu', 'Huyện Vĩnh Cửu', 531, 2049, 5, 1),
(304, 21, 'Huyện Trảng Bom', 'Huyện Trảng Bom', 'Huyện Trảng Bom', 'Huyện Trảng Bom', 527, 1691, 6, 1),
(305, 21, 'Huyện Thống Nhất', 'Huyện Thống Nhất', 'Huyện Thống Nhất', 'Huyện Thống Nhất', 530, 1705, 7, 1),
(306, 21, 'Huyện Tân Phú', 'Huyện Tân Phú', 'Huyện Tân Phú', 'Huyện Tân Phú', 529, 1693, 8, 1),
(307, 21, 'Huyện Nhơn Trạch', 'Huyện Nhơn Trạch', 'Huyện Nhơn Trạch', 'Huyện Nhơn Trạch', 532, 1708, 9, 1),
(308, 21, 'Huyện Long Thành', 'Huyện Long Thành', 'Huyện Long Thành', 'Huyện Long Thành', 537, 1694, 10, 1),
(309, 21, 'Huyện Định Quán', 'Huyện Định Quán', 'Huyện Định Quán', 'Huyện Định Quán', 536, 1700, 11, 1),
(310, 21, 'Huyện Cẩm Mỹ', 'Huyện Cẩm Mỹ', 'Huyện Cẩm Mỹ', 'Huyện Cẩm Mỹ', 534, 1702, 12, 1),
(311, 22, 'Thị Xã Sa Đéc', 'Thị Xã Sa Đéc', 'Thị Xã Sa Đéc', 'Thị Xã Sa Đéc', 615, 1668, 2, 1),
(312, 22, 'Thành Phố Cao Lãnh', 'Thành Phố Cao Lãnh', 'Thành Phố Cao Lãnh', 'Thành Phố Cao Lãnh', 609, 1564, 3, 1),
(313, 22, 'Huyện Tháp Mười', 'Huyện Tháp Mười', 'Huyện Tháp Mười', 'Huyện Tháp Mười', 610, 2030, 4, 1),
(314, 22, 'Huyện Thanh Bình', 'Huyện Thanh Bình', 'Huyện Thanh Bình', 'Huyện Thanh Bình', 606, 2026, 5, 1),
(315, 22, 'Huyện Tân Hồng', 'Huyện Tân Hồng', 'Huyện Tân Hồng', 'Huyện Tân Hồng', 605, 2013, 6, 1),
(316, 22, 'Huyện Tam Nông', 'Huyện Tam Nông', 'Huyện Tam Nông', 'Huyện Tam Nông', 608, 2011, 7, 1),
(317, 22, 'Huyện Lấp Vò', 'Huyện Lấp Vò', 'Huyện Lấp Vò', 'Huyện Lấp Vò', 607, 1961, 8, 1),
(318, 22, 'Huyện Lai Vung', 'Huyện Lai Vung', 'Huyện Lai Vung', 'Huyện Lai Vung', 611, 1725, 9, 1),
(319, 22, 'Huyện Hồng Ngự', 'Huyện Hồng Ngự', 'Huyện Hồng Ngự', 'Huyện Hồng Ngự', 613, 3200, 10, 1),
(321, 22, 'Huyện Cao Lãnh', 'Huyện Cao Lãnh', 'Huyện Cao Lãnh', 'Huyện Cao Lãnh', 614, 1724, 12, 1),
(322, 23, 'Thị Xã Ayun Pa', 'Thị Xã Ayun Pa', 'Thị Xã Ayun Pa', 'Thị Xã Ayun Pa', 449, 1798, 2, 1),
(323, 23, 'Thị Xã An Khê', 'Thị Xã An Khê', 'Thị Xã An Khê', 'Thị Xã An Khê', 448, 1800, 3, 1),
(324, 23, 'Thành Phố Pleiku', 'Thành Phố Pleiku', 'Thành Phố Pleiku', 'Thành Phố Pleiku', 436, 1546, 4, 1),
(325, 23, 'Huyện Phú Thiện', 'Huyện Phú Thiện', 'Huyện Phú Thiện', 'Huyện Phú Thiện', 435, 1797, 5, 1),
(326, 23, 'Huyện Mang Yang', 'Huyện Mang Yang', 'Huyện Mang Yang', 'Huyện Mang Yang', 444, 2165, 6, 1),
(327, 23, 'Huyện Krông Pa', 'Huyện Krông Pa', 'Huyện Krông Pa', 'Huyện Krông Pa', 434, 2152, 7, 1),
(328, 23, 'Huyện Kông Chro', 'Huyện Kông Chro', 'Huyện Kông Chro', 'Huyện Kông Chro', 443, 2149, 8, 1),
(329, 23, 'Huyện Kbang', 'Huyện Kbang', 'Huyện Kbang', 'Huyện Kbang', 442, 2144, 9, 1),
(330, 23, 'Huyện Ia Pa', 'Huyện Ia Pa', 'Huyện Ia Pa', 'Huyện Ia Pa', 446, 1799, 10, 1),
(331, 23, 'Huyện Ia Grai', 'Huyện Ia Grai', 'Huyện Ia Grai', 'Huyện Ia Grai', 439, 1793, 11, 1),
(332, 23, 'Huyện Đức Cơ', 'Huyện Đức Cơ', 'Huyện Đức Cơ', 'Huyện Đức Cơ', 440, 1794, 12, 1),
(333, 23, 'Huyện Đăk Pơ', 'Huyện Đăk Pơ', 'Huyện Đăk Pơ', 'Huyện Đăk Pơ', 438, 2119, 13, 1),
(334, 23, 'Huyện Đăk Đoa', 'Huyện Đăk Đoa', 'Huyện Đăk Đoa', 'Huyện Đăk Đoa', 437, 2118, 14, 1),
(335, 23, 'Huyện Chư Sê', 'Huyện Chư Sê', 'Huyện Chư Sê', 'Huyện Chư Sê', 441, 1796, 15, 1),
(336, 23, 'Huyện Chư Pưh', 'Huyện Chư Pưh', 'Huyện Chư Pưh', 'Huyện Chư Pưh', 447, 2101, 16, 1),
(337, 23, 'Huyện Chư Prông', 'Huyện Chư Prông', 'Huyện Chư Prông', 'Huyện Chư Prông', 433, 1795, 17, 1),
(338, 23, 'Huyện Chư Păh', 'Huyện Chư Păh', 'Huyện Chư Păh', 'Huyện Chư Păh', 445, 1801, 18, 1),
(339, 24, 'Thành Phố Hà Giang', 'Thành Phố Hà Giang', 'Thành Phố Hà Giang', 'Thành Phố Hà Giang', 30, 1600, 2, 1),
(340, 24, 'Huyện Yên Minh', 'Huyện Yên Minh', 'Huyện Yên Minh', 'Huyện Yên Minh', 32, 2053, 3, 1),
(341, 24, 'Huyện Xín Mần', 'Huyện Xín Mần', 'Huyện Xín Mần', 'Huyện Xín Mần', 28, 2052, 4, 1),
(342, 24, 'Huyện Vị Xuyên', 'Huyện Vị Xuyên', 'Huyện Vị Xuyên', 'Huyện Vị Xuyên', 26, 2256, 5, 1),
(343, 24, 'Huyện Quang Bình', 'Huyện Quang Bình', 'Huyện Quang Bình', 'Huyện Quang Bình', 24, 2001, 6, 1),
(344, 24, 'Huyện Quản Bạ', 'Huyện Quản Bạ', 'Huyện Quản Bạ', 'Huyện Quản Bạ', 25, 1999, 7, 1),
(345, 24, 'Huyện Mèo Vạc', 'Huyện Mèo Vạc', 'Huyện Mèo Vạc', 'Huyện Mèo Vạc', 23, 1973, 8, 1),
(346, 24, 'Huyện Hoàng Su Phì', 'Huyện Hoàng Su Phì', 'Huyện Hoàng Su Phì', 'Huyện Hoàng Su Phì', 22, 1945, 9, 1),
(347, 24, 'Huyện Đồng Văn', 'Huyện Đồng Văn', 'Huyện Đồng Văn', 'Huyện Đồng Văn', 31, 1928, 10, 1),
(348, 24, 'Huyện Bắc Quang', 'Huyện Bắc Quang', 'Huyện Bắc Quang', 'Huyện Bắc Quang', 29, 1893, 11, 1),
(349, 24, 'Huyện Bắc Mê', 'Huyện Bắc Mê', 'Huyện Bắc Mê', 'Huyện Bắc Mê', 27, 2075, 12, 1),
(350, 25, 'Thành Phố Phủ Lý', 'Thành Phố Phủ Lý', 'Thành Phố Phủ Lý', 'Thành Phố Phủ Lý', 258, 1614, 2, 1),
(351, 25, 'Huyện Thanh Liêm', 'Huyện Thanh Liêm', 'Huyện Thanh Liêm', 'Huyện Thanh Liêm', 259, 2027, 3, 1),
(352, 25, 'Huyện Lý Nhân', 'Huyện Lý Nhân', 'Huyện Lý Nhân', 'Huyện Lý Nhân', 256, 1970, 4, 1),
(353, 25, 'Huyện Kim Bảng', 'Huyện Kim Bảng', 'Huyện Kim Bảng', 'Huyện Kim Bảng', 255, 1952, 5, 1),
(354, 25, 'Huyện Duy Tiên', 'Huyện Duy Tiên', 'Huyện Duy Tiên', 'Huyện Duy Tiên', 254, 1802, 6, 1),
(355, 25, 'Huyện Bình Lục', 'Huyện Bình Lục', 'Huyện Bình Lục', 'Huyện Bình Lục', 257, 1897, 7, 1),
(356, 26, 'Thị Xã Hồng Lĩnh', 'Thị Xã Hồng Lĩnh', 'Thị Xã Hồng Lĩnh', 'Thị Xã Hồng Lĩnh', 339, 1814, 2, 1),
(357, 26, 'Thành Phố Hà Tĩnh', 'Thành Phố Hà Tĩnh', 'Thành Phố Hà Tĩnh', 'Thành Phố Hà Tĩnh', 345, 1618, 3, 1),
(358, 26, 'Huyện Vũ Quang', 'Huyện Vũ Quang', 'Huyện Vũ Quang', 'Huyện Vũ Quang', 335, 3320, 4, 1),
(359, 26, 'Huyện Thạch Hà', 'Huyện Thạch Hà', 'Huyện Thạch Hà', 'Huyện Thạch Hà', 346, 2024, 5, 1),
(360, 26, 'Huyện Nghi Xuân', 'Huyện Nghi Xuân', 'Huyện Nghi Xuân', 'Huyện Nghi Xuân', 340, 1813, 6, 1),
(361, 26, 'Huyện Lộc Hà', 'Huyện Lộc Hà', 'Huyện Lộc Hà', 'Huyện Lộc Hà', 338, 3220, 7, 1),
(362, 26, 'Huyện Kỳ Anh', 'Huyện Kỳ Anh', 'Huyện Kỳ Anh', 'Huyện Kỳ Anh', 344, 1811, 8, 1),
(363, 26, 'Huyện Hương Sơn', 'Huyện Hương Sơn', 'Huyện Hương Sơn', 'Huyện Hương Sơn', 341, 3201, 9, 1),
(364, 26, 'Huyện Hương Khê', 'Huyện Hương Khê', 'Huyện Hương Khê', 'Huyện Hương Khê', 342, 1812, 10, 1),
(365, 26, 'Huyện Đức Thọ', 'Huyện Đức Thọ', 'Huyện Đức Thọ', 'Huyện Đức Thọ', 336, 3188, 11, 1),
(366, 26, 'Huyện Can Lộc', 'Huyện Can Lộc', 'Huyện Can Lộc', 'Huyện Can Lộc', 337, 3143, 12, 1),
(367, 26, 'Huyện Cẩm Xuyên', 'Huyện Cẩm Xuyên', 'Huyện Cẩm Xuyên', 'Huyện Cẩm Xuyên', 343, 1815, 13, 1),
(368, 27, 'Thị Xã Chí Linh', 'Thị Xã Chí Linh', 'Thị Xã Chí Linh', 'Thị Xã Chí Linh', 225, 2056, 2, 1),
(369, 27, 'Thành Phố Hải Dương', 'Thành Phố Hải Dương', 'Thành Phố Hải Dương', 'Thành Phố Hải Dương', 216, 1598, 3, 1),
(370, 27, 'Huyện Tứ Kỳ', 'Huyện Tứ Kỳ', 'Huyện Tứ Kỳ', 'Huyện Tứ Kỳ', 218, 3287, 4, 1),
(371, 27, 'Huyện Thanh Miện', 'Huyện Thanh Miện', 'Huyện Thanh Miện', 'Huyện Thanh Miện', 222, 3294, 5, 1),
(372, 27, 'Huyện Thanh Hà', 'Huyện Thanh Hà', 'Huyện Thanh Hà', 'Huyện Thanh Hà', 219, 3292, 6, 1),
(373, 27, 'Huyện Ninh Giang', 'Huyện Ninh Giang', 'Huyện Ninh Giang', 'Huyện Ninh Giang', 217, 3238, 7, 1),
(374, 27, 'Huyện Nam Sách', 'Huyện Nam Sách', 'Huyện Nam Sách', 'Huyện Nam Sách', 223, 1727, 8, 1),
(375, 27, 'Huyện Kinh Môn', 'Huyện Kinh Môn', 'Huyện Kinh Môn', 'Huyện Kinh Môn', 224, 1818, 9, 1),
(376, 27, 'Huyện Kim Thành', 'Huyện Kim Thành', 'Huyện Kim Thành', 'Huyện Kim Thành', 221, 1953, 10, 1),
(377, 27, 'Huyện Gia Lộc', 'Huyện Gia Lộc', 'Huyện Gia Lộc', 'Huyện Gia Lộc', 227, 1934, 11, 1),
(378, 27, 'Huyện Cẩm Giàng', 'Huyện Cẩm Giàng', 'Huyện Cẩm Giàng', 'Huyện Cẩm Giàng', 220, 1817, 12, 1),
(379, 27, 'Huyện Bình Giang', 'Huyện Bình Giang', 'Huyện Bình Giang', 'Huyện Bình Giang', 226, 1816, 13, 1),
(380, 28, 'Quận Ngô Quyền', 'Quận Ngô Quyền', 'Quận Ngô Quyền', 'Quận Ngô Quyền', 252, 1587, 2, 1),
(381, 28, 'Quận Lê Chân', 'Quận Lê Chân', 'Quận Lê Chân', 'Quận Lê Chân', 241, 1588, 3, 1),
(382, 28, 'Quận Kiến An', 'Quận Kiến An', 'Quận Kiến An', 'Quận Kiến An', 249, 1590, 4, 1),
(383, 28, 'Quận Hồng Bàng', 'Quận Hồng Bàng', 'Quận Hồng Bàng', 'Quận Hồng Bàng', 239, 1589, 5, 1),
(384, 28, 'Quận Hải An', 'Quận Hải An', 'Quận Hải An', 'Quận Hải An', 245, 1591, 6, 1),
(385, 28, 'Quận Đồ Sơn', 'Quận Đồ Sơn', 'Quận Đồ Sơn', 'Quận Đồ Sơn', 240, 1707, 7, 1),
(386, 28, 'Quận Dương Kinh', 'Quận Dương Kinh', 'Quận Dương Kinh', 'Quận Dương Kinh', 246, 1706, 8, 1),
(387, 28, 'Huyện Vĩnh Bảo', 'Huyện Vĩnh Bảo', 'Huyện Vĩnh Bảo', 'Huyện Vĩnh Bảo', 248, 1822, 9, 1),
(388, 28, 'Huyện Tiên Lãng', 'Huyện Tiên Lãng', 'Huyện Tiên Lãng', 'Huyện Tiên Lãng', 253, 1821, 10, 1),
(389, 28, 'Huyện Thủy Nguyên', 'Huyện Thủy Nguyên', 'Huyện Thủy Nguyên', 'Huyện Thủy Nguyên', 251, 1726, 11, 1),
(390, 28, 'Huyện Kiến Thụy', 'Huyện Kiến Thụy', 'Huyện Kiến Thụy', 'Huyện Kiến Thụy', 244, 3203, 12, 1),
(391, 28, 'Huyện Đảo Cát Hải', 'Huyện Đảo Cát Hải', 'Huyện Đảo Cát Hải', 'Huyện Đảo Cát Hải', 250, 2108, 13, 1),
(392, 28, 'Huyện Đảo Bạch Long Vĩ', 'Huyện Đảo Bạch Long Vĩ', 'Huyện Đảo Bạch Long Vĩ', 'Huyện Đảo Bạch Long Vĩ', 243, 2107, 14, 1),
(393, 28, 'Huyện An Lão', 'Huyện An Lão', 'Huyện An Lão', 'Huyện An Lão', 247, 1820, 15, 1),
(394, 28, 'Huyện An Dương', 'Huyện An Dương', 'Huyện An Dương', 'Huyện An Dương', 242, 1819, 16, 1),
(395, 29, 'Thị Xã Ngã Bảy', 'Thị Xã Ngã Bảy', 'Thị Xã Ngã Bảy', 'Thị Xã Ngã Bảy', 675, 1823, 2, 1),
(396, 29, 'Thành Phố Vị Thanh', 'Thành Phố Vị Thanh', 'Thành Phố Vị Thanh', 'Thành Phố Vị Thanh', 670, 1653, 3, 1),
(397, 29, 'Huyện Vị Thủy', 'Huyện Vị Thủy', 'Huyện Vị Thủy', 'Huyện Vị Thủy', 674, 2048, 4, 1),
(398, 29, 'Huyện Phụng Hiệp', 'Huyện Phụng Hiệp', 'Huyện Phụng Hiệp', 'Huyện Phụng Hiệp', 676, 1824, 5, 1),
(399, 29, 'Huyện Long Mỹ', 'Huyện Long Mỹ', 'Huyện Long Mỹ', 'Huyện Long Mỹ', 672, 3445, 6, 1),
(400, 29, 'Huyện Châu Thành A', 'Huyện Châu Thành A', 'Huyện Châu Thành A', 'Huyện Châu Thành A', 671, 1912, 7, 1),
(401, 29, 'Huyện Châu Thành', 'Huyện Châu Thành', 'Huyện Châu Thành', 'Huyện Châu Thành', 673, 2096, 8, 1),
(402, 30, 'Thành Phố Hòa Bình', 'Thành Phố Hòa Bình', 'Thành Phố Hòa Bình', 'Thành Phố Hòa Bình', 237, 1678, 2, 1),
(403, 30, 'Huyện Yên Thủy', 'Huyện Yên Thủy', 'Huyện Yên Thủy', 'Huyện Yên Thủy', 236, 2270, 3, 1),
(404, 30, 'Huyện Tân Lạc', 'Huyện Tân Lạc', 'Huyện Tân Lạc', 'Huyện Tân Lạc', 232, 2014, 4, 1),
(405, 30, 'Huyện Mai Châu', 'Huyện Mai Châu', 'Huyện Mai Châu', 'Huyện Mai Châu', 235, 2163, 5, 1),
(406, 30, 'Huyện Lương Sơn', 'Huyện Lương Sơn', 'Huyện Lương Sơn', 'Huyện Lương Sơn', 234, 1968, 6, 1),
(407, 30, 'Huyện Lạc Thủy', 'Huyện Lạc Thủy', 'Huyện Lạc Thủy', 'Huyện Lạc Thủy', 230, 2157, 7, 1),
(408, 30, 'Huyện Lạc Sơn', 'Huyện Lạc Sơn', 'Huyện Lạc Sơn', 'Huyện Lạc Sơn', 233, 2156, 8, 1),
(409, 30, 'Huyện Kỳ Sơn', 'Huyện Kỳ Sơn', 'Huyện Kỳ Sơn', 'Huyện Kỳ Sơn', 228, 1955, 9, 1),
(410, 30, 'Huyện Kim Bôi', 'Huyện Kim Bôi', 'Huyện Kim Bôi', 'Huyện Kim Bôi', 231, 2146, 10, 1),
(411, 30, 'Huyện Đà Bắc', 'Huyện Đà Bắc', 'Huyện Đà Bắc', 'Huyện Đà Bắc', 229, 1916, 11, 1),
(412, 30, 'Huyện Cao Phong', 'Huyện Cao Phong', 'Huyện Cao Phong', 'Huyện Cao Phong', 238, 2087, 12, 1),
(413, 31, 'Thành Phố Hưng Yên', 'Thành Phố Hưng Yên', 'Thành Phố Hưng Yên', 'Thành Phố Hưng Yên', 68, 1680, 2, 1),
(414, 31, 'Huyện Yên Mỹ', 'Huyện Yên Mỹ', 'Huyện Yên Mỹ', 'Huyện Yên Mỹ', 66, 1828, 3, 1),
(415, 31, 'Huyện Văn Lâm', 'Huyện Văn Lâm', 'Huyện Văn Lâm', 'Huyện Văn Lâm', 64, 2046, 4, 1),
(416, 31, 'Huyện Văn Giang', 'Huyện Văn Giang', 'Huyện Văn Giang', 'Huyện Văn Giang', 69, 2045, 5, 1),
(417, 31, 'Huyện Tiên Lữ', 'Huyện Tiên Lữ', 'Huyện Tiên Lữ', 'Huyện Tiên Lữ', 72, 2018, 6, 1),
(418, 31, 'Huyện Phù Cừ', 'Huyện Phù Cừ', 'Huyện Phù Cừ', 'Huyện Phù Cừ', 63, 2194, 7, 1),
(419, 31, 'Huyện Mỹ Hào', 'Huyện Mỹ Hào', 'Huyện Mỹ Hào', 'Huyện Mỹ Hào', 70, 1827, 8, 1),
(420, 31, 'Huyện Kim Động', 'Huyện Kim Động', 'Huyện Kim Động', 'Huyện Kim Động', 71, 0, 9, 1),
(421, 31, 'Huyện Khoái Châu', 'Huyện Khoái Châu', 'Huyện Khoái Châu', 'Huyện Khoái Châu', 65, 1826, 10, 1),
(422, 31, 'Huyện Ân Thi', 'Huyện Ân Thi', 'Huyện Ân Thi', 'Huyện Ân Thi', 67, 1825, 11, 1),
(423, 32, 'Thành Phố Nha Trang', 'Thành Phố Nha Trang', 'Thành Phố Nha Trang', 'Thành Phố Nha Trang', 465, 1548, 2, 1),
(424, 32, 'Thành Phố Cam Ranh', 'Thành Phố Cam Ranh', 'Thành Phố Cam Ranh', 'Thành Phố Cam Ranh', 468, 1664, 3, 1),
(425, 32, 'Huyện Vạn Ninh', 'Huyện Vạn Ninh', 'Huyện Vạn Ninh', 'Huyện Vạn Ninh', 471, 1829, 4, 1),
(426, 32, 'Huyện Ninh Hòa', 'Huyện Ninh Hòa', 'Huyện Ninh Hòa', 'Huyện Ninh Hòa', 466, 2061, 5, 1),
(427, 32, 'Huyện Khánh Vĩnh', 'Huyện Khánh Vĩnh', 'Huyện Khánh Vĩnh', 'Huyện Khánh Vĩnh', 470, 3213, 6, 1),
(428, 32, 'Huyện Khánh Sơn', 'Huyện Khánh Sơn', 'Huyện Khánh Sơn', 'Huyện Khánh Sơn', 467, 3212, 7, 1),
(429, 32, 'Huyện Đảo Trường Sa', 'Huyện Đảo Trường Sa', 'Huyện Đảo Trường Sa', 'Huyện Đảo Trường Sa', 473, 2117, 8, 1),
(430, 32, 'Huyện Diên Khánh', 'Huyện Diên Khánh', 'Huyện Diên Khánh', 'Huyện Diên Khánh', 469, 1739, 9, 1),
(431, 32, 'Huyện Cam Lâm', 'Huyện Cam Lâm', 'Huyện Cam Lâm', 'Huyện Cam Lâm', 472, 1902, 10, 1),
(432, 33, 'Thị Xã Hà Tiên', 'Thị Xã Hà Tiên', 'Thị Xã Hà Tiên', 'Thị Xã Hà Tiên', 665, 2058, 2, 1),
(433, 33, 'Thành Phố Rạch Giá', 'Thành Phố Rạch Giá', 'Thành Phố Rạch Giá', 'Thành Phố Rạch Giá', 666, 1570, 3, 1),
(434, 33, 'Huyện Vĩnh Thuận', 'Huyện Vĩnh Thuận', 'Huyện Vĩnh Thuận', 'Huyện Vĩnh Thuận', 664, 2260, 4, 1),
(435, 33, 'Huyện U Minh Thượng', 'Huyện U Minh Thượng', 'Huyện U Minh Thượng', 'Huyện U Minh Thượng', 658, 2251, 5, 1),
(436, 33, 'Huyện Tân Hiệp', 'Huyện Tân Hiệp', 'Huyện Tân Hiệp', 'Huyện Tân Hiệp', 667, 1831, 6, 1),
(437, 33, 'Huyện Kiên Lương', 'Huyện Kiên Lương', 'Huyện Kiên Lương', 'Huyện Kiên Lương', 660, 1950, 7, 1),
(438, 33, 'Huyện Kiên Hải', 'Huyện Kiên Hải', 'Huyện Kiên Hải', 'Huyện Kiên Hải', 668, 2113, 8, 1),
(439, 33, 'Huyện Hòn Đất', 'Huyện Hòn Đất', 'Huyện Hòn Đất', 'Huyện Hòn Đất', 662, 1830, 9, 1),
(440, 33, 'Huyện Gò Quao', 'Huyện Gò Quao', 'Huyện Gò Quao', 'Huyện Gò Quao', 655, 2132, 10, 1),
(441, 33, 'Huyện Giồng Riềng', 'Huyện Giồng Riềng', 'Huyện Giồng Riềng', 'Huyện Giồng Riềng', 657, 1832, 11, 1),
(442, 33, 'Huyên Giang Thành', 'Huyên Giang Thành', 'Huyên Giang Thành', 'Huyên Giang Thành', 663, 2134, 12, 1),
(443, 33, 'Huyện Đảo Phú Quốc', 'Huyện Đảo Phú Quốc', 'Huyện Đảo Phú Quốc', 'Huyện Đảo Phú Quốc', 669, 2115, 13, 1),
(444, 33, 'Huyện Châu Thành', 'Huyện Châu Thành', 'Huyện Châu Thành', 'Huyện Châu Thành', 661, 1719, 14, 1),
(445, 33, 'Huyện An Minh', 'Huyện An Minh', 'Huyện An Minh', 'Huyện An Minh', 659, 3125, 15, 1),
(446, 33, 'Huyện An Biên', 'Huyện An Biên', 'Huyện An Biên', 'Huyện An Biên', 656, 1833, 16, 1),
(447, 34, 'Thành Phố Kon Tum', 'Thành Phố Kon Tum', 'Thành Phố Kon Tum', 'Thành Phố Kon Tum', 418, 1660, 2, 1),
(448, 34, 'Huyện Tu Mơ Rông', 'Huyện Tu Mơ Rông', 'Huyện Tu Mơ Rông', 'Huyện Tu Mơ Rông', 416, 2225, 3, 1),
(449, 34, 'Huyện Sa Thầy', 'Huyện Sa Thầy', 'Huyện Sa Thầy', 'Huyện Sa Thầy', 415, 2205, 4, 1),
(450, 34, 'Huyện Ngọc Hồi', 'Huyện Ngọc Hồi', 'Huyện Ngọc Hồi', 'Huyện Ngọc Hồi', 420, 2187, 5, 1),
(451, 34, 'Huyện Kon Rẫy', 'Huyện Kon Rẫy', 'Huyện Kon Rẫy', 'Huyện Kon Rẫy', 421, 2148, 6, 1),
(452, 34, 'Huyện Kon Plông', 'Huyện Kon Plông', 'Huyện Kon Plông', 'Huyện Kon Plông', 417, 1834, 7, 1),
(453, 34, 'Huyện Ia H\'Drai', 'Huyện Ia H\'Drai', 'Huyện Ia H\'Drai', 'Huyện Ia H\'Drai', 723, 3446, 8, 1),
(454, 34, 'Huyện Đắk Tô', 'Huyện Đắk Tô', 'Huyện Đắk Tô', 'Huyện Đắk Tô', 419, 2121, 9, 1),
(455, 34, 'Huyện Đắk Hà', 'Huyện Đắk Hà', 'Huyện Đắk Hà', 'Huyện Đắk Hà', 413, 1835, 10, 1),
(456, 34, 'Huyện Đắk Glei', 'Huyện Đắk Glei', 'Huyện Đắk Glei', 'Huyện Đắk Glei', 414, 1921, 11, 1),
(457, 35, 'Thành phố Lai Châu', 'Thành phố Lai Châu', 'Thành phố Lai Châu', 'Thành phố Lai Châu', 38, 1675, 2, 1),
(458, 35, 'Huyện Than Uyên', 'Huyện Than Uyên', 'Huyện Than Uyên', 'Huyện Than Uyên', 36, 2025, 3, 1),
(459, 35, 'Huyện Tân Uyên', 'Huyện Tân Uyên', 'Huyện Tân Uyên', 'Huyện Tân Uyên', 713, 2017, 4, 1),
(460, 35, 'Huyện Tam Đường', 'Huyện Tam Đường', 'Huyện Tam Đường', 'Huyện Tam Đường', 33, 2010, 5, 1),
(461, 35, 'Huyện Sìn Hồ', 'Huyện Sìn Hồ', 'Huyện Sìn Hồ', 'Huyện Sìn Hồ', 35, 2006, 6, 1),
(462, 35, 'Huyện Phong Thổ', 'Huyện Phong Thổ', 'Huyện Phong Thổ', 'Huyện Phong Thổ', 34, 1989, 7, 1),
(463, 35, 'Huyện Nậm Nhùn', 'Huyện Nậm Nhùn', 'Huyện Nậm Nhùn', 'Huyện Nậm Nhùn', 705, 1984, 8, 1),
(464, 35, 'Huyện Mường Tè', 'Huyện Mường Tè', 'Huyện Mường Tè', 'Huyện Mường Tè', 37, 1980, 9, 1),
(465, 36, 'Thị Xã Bảo Lộc', 'Thị Xã Bảo Lộc', 'Thị Xã Bảo Lộc', 'Thị Xã Bảo Lộc', 503, 1838, 2, 1),
(466, 36, 'Thành Phố Đà Lạt', 'Thành Phố Đà Lạt', 'Thành Phố Đà Lạt', 'Thành Phố Đà Lạt', 499, 1550, 3, 1),
(467, 36, 'Huyện Lâm Hà', 'Huyện Lâm Hà', 'Huyện Lâm Hà', 'Huyện Lâm Hà', 498, 1958, 4, 1),
(468, 36, 'Huyện Lạc Dương', 'Huyện Lạc Dương', 'Huyện Lạc Dương', 'Huyện Lạc Dương', 493, 1956, 5, 1),
(469, 36, 'Huyện Đức Trọng', 'Huyện Đức Trọng', 'Huyện Đức Trọng', 'Huyện Đức Trọng', 492, 1837, 6, 1),
(470, 36, 'Huyện Đơn Dương', 'Huyện Đơn Dương', 'Huyện Đơn Dương', 'Huyện Đơn Dương', 501, 1836, 7, 1),
(471, 36, 'Huyện Đam Rông', 'Huyện Đam Rông', 'Huyện Đam Rông', 'Huyện Đam Rông', 502, 1919, 8, 1),
(472, 36, 'Huyện Đạ Tẻh', 'Huyện Đạ Tẻh', 'Huyện Đạ Tẻh', 'Huyện Đạ Tẻh', 500, 2106, 9, 1),
(473, 36, 'Huyện Đạ Huoai', 'Huyện Đạ Huoai', 'Huyện Đạ Huoai', 'Huyện Đạ Huoai', 497, 2104, 10, 1),
(474, 36, 'Huyện Di Linh', 'Huyện Di Linh', 'Huyện Di Linh', 'Huyện Di Linh', 496, 3160, 11, 1),
(475, 36, 'Huyện Cát Tiên', 'Huyện Cát Tiên', 'Huyện Cát Tiên', 'Huyện Cát Tiên', 495, 3146, 12, 1),
(476, 36, 'Huyện Bảo Lâm', 'Huyện Bảo Lâm', 'Huyện Bảo Lâm', 'Huyện Bảo Lâm', 494, 1839, 13, 1),
(477, 37, 'Thành Phố Lạng Sơn', 'Thành Phố Lạng Sơn', 'Thành Phố Lạng Sơn', 'Thành Phố Lạng Sơn', 122, 1642, 2, 1),
(478, 37, 'Huyện Văn Quan', 'Huyện Văn Quan', 'Huyện Văn Quan', 'Huyện Văn Quan', 119, 3311, 3, 1),
(479, 37, 'Huyện Văn Lãng', 'Huyện Văn Lãng', 'Huyện Văn Lãng', 'Huyện Văn Lãng', 124, 3310, 4, 1),
(480, 37, 'Huyện Tràng Định', 'Huyện Tràng Định', 'Huyện Tràng Định', 'Huyện Tràng Định', 126, 2036, 5, 1),
(481, 37, 'Huyện Lộc Bình', 'Huyện Lộc Bình', 'Huyện Lộc Bình', 'Huyện Lộc Bình', 127, 1963, 6, 1),
(482, 37, 'Huyện Hữu Lũng', 'Huyện Hữu Lũng', 'Huyện Hữu Lũng', 'Huyện Hữu Lũng', 120, 1948, 7, 1),
(483, 37, 'Huyện Đình Lập', 'Huyện Đình Lập', 'Huyện Đình Lập', 'Huyện Đình Lập', 129, 3182, 8, 1),
(484, 37, 'Huyện Chi Lăng', 'Huyện Chi Lăng', 'Huyện Chi Lăng', 'Huyện Chi Lăng', 121, 3156, 9, 1),
(485, 37, 'Huyện Cao Lộc', 'Huyện Cao Lộc', 'Huyện Cao Lộc', 'Huyện Cao Lộc', 128, 1904, 10, 1),
(486, 37, 'Huyện Bình Gia', 'Huyện Bình Gia', 'Huyện Bình Gia', 'Huyện Bình Gia', 125, 3138, 11, 1),
(487, 37, 'Huyện Bắc Sơn', 'Huyện Bắc Sơn', 'Huyện Bắc Sơn', 'Huyện Bắc Sơn', 123, 3134, 12, 1),
(488, 38, 'Thành Phố Lào Cai', 'Thành Phố Lào Cai', 'Thành Phố Lào Cai', 'Thành Phố Lào Cai', 40, 1682, 2, 1),
(489, 38, 'Huyện Văn Bàn', 'Huyện Văn Bàn', 'Huyện Văn Bàn', 'Huyện Văn Bàn', 45, 2043, 3, 1),
(490, 38, 'Huyện Si Ma Cai', 'Huyện Si Ma Cai', 'Huyện Si Ma Cai', 'Huyện Si Ma Cai', 47, 2264, 4, 1),
(491, 38, 'Huyện Sa Pa', 'Huyện Sa Pa', 'Huyện Sa Pa', 'Huyện Sa Pa', 41, 2005, 5, 1),
(492, 38, 'Huyện Mường Khương', 'Huyện Mường Khương', 'Huyện Mường Khương', 'Huyện Mường Khương', 42, 2171, 6, 1),
(493, 38, 'Huyện Bát Xát', 'Huyện Bát Xát', 'Huyện Bát Xát', 'Huyện Bát Xát', 43, 1744, 7, 1),
(494, 38, 'Huyện Bảo Yên', 'Huyện Bảo Yên', 'Huyện Bảo Yên', 'Huyện Bảo Yên', 48, 1891, 8, 1),
(495, 38, 'Huyện Bảo Thắng', 'Huyện Bảo Thắng', 'Huyện Bảo Thắng', 'Huyện Bảo Thắng', 44, 2073, 9, 1),
(496, 38, 'Huyện Bắc Hà', 'Huyện Bắc Hà', 'Huyện Bắc Hà', 'Huyện Bắc Hà', 46, 1892, 10, 1),
(497, 39, 'Thị Xã Kiến Tường', 'Thị Xã Kiến Tường', 'Thị Xã Kiến Tường', 'Thị Xã Kiến Tường', 706, 3329, 2, 1),
(498, 39, 'Thành Phố Tân An', 'Thành Phố Tân An', 'Thành Phố Tân An', 'Thành Phố Tân An', 576, 1554, 3, 1),
(499, 39, 'Huyện Vĩnh Hưng', 'Huyện Vĩnh Hưng', 'Huyện Vĩnh Hưng', 'Huyện Vĩnh Hưng', 585, 3315, 4, 1),
(500, 39, 'Huyện Thủ Thừa', 'Huyện Thủ Thừa', 'Huyện Thủ Thừa', 'Huyện Thủ Thừa', 577, 2031, 5, 1),
(501, 39, 'Huyện Thạnh Hóa', 'Huyện Thạnh Hóa', 'Huyện Thạnh Hóa', 'Huyện Thạnh Hóa', 582, 3293, 6, 1),
(502, 39, 'Huyện Tân Trụ', 'Huyện Tân Trụ', 'Huyện Tân Trụ', 'Huyện Tân Trụ', 572, 2016, 7, 1),
(503, 39, 'Huyện Tân Thạnh', 'Huyện Tân Thạnh', 'Huyện Tân Thạnh', 'Huyện Tân Thạnh', 581, 3276, 8, 1),
(504, 39, 'Huyện Tân Hưng', 'Huyện Tân Hưng', 'Huyện Tân Hưng', 'Huyện Tân Hưng', 578, 3273, 9, 1),
(505, 39, 'Huyện Mộc Hóa', 'Huyện Mộc Hóa', 'Huyện Mộc Hóa', 'Huyện Mộc Hóa', 583, 3227, 10, 1),
(506, 39, 'Huyện Đức Huệ', 'Huyện Đức Huệ', 'Huyện Đức Huệ', 'Huyện Đức Huệ', 573, 2129, 11, 1),
(507, 39, 'Huyện Đức Hòa', 'Huyện Đức Hòa', 'Huyện Đức Hòa', 'Huyện Đức Hòa', 584, 1929, 12, 1),
(508, 39, 'Huyện Châu Thành', 'Huyện Châu Thành', 'Huyện Châu Thành', 'Huyện Châu Thành', 579, 1909, 13, 1),
(509, 39, 'Huyện Cần Guộc', 'Huyện Cần Guộc', 'Huyện Cần Guộc', 'Huyện Cần Guộc', 574, 1907, 14, 1),
(510, 39, 'Huyện Cần đước', 'Huyện Cần đước', 'Huyện Cần đước', 'Huyện Cần đước', 575, 1906, 15, 1),
(511, 39, 'Huyện Bến Lức', 'Huyện Bến Lức', 'Huyện Bến Lức', 'Huyện Bến Lức', 580, 1894, 16, 1),
(512, 40, 'Thành Phố Nam định', 'Thành Phố Nam định', 'Thành Phố Nam định', 'Thành Phố Nam định', 285, 1613, 2, 1),
(513, 40, 'Huyện Ý Yên', 'Huyện Ý Yên', 'Huyện Ý Yên', 'Huyện Ý Yên', 278, 1841, 3, 1),
(514, 40, 'Huyện Xuân Trường', 'Huyện Xuân Trường', 'Huyện Xuân Trường', 'Huyện Xuân Trường', 282, 3323, 4, 1),
(515, 40, 'Huyện Vụ Bản', 'Huyện Vụ Bản', 'Huyện Vụ Bản', 'Huyện Vụ Bản', 287, 3319, 5, 1),
(516, 40, 'Huyện Trực Ninh', 'Huyện Trực Ninh', 'Huyện Trực Ninh', 'Huyện Trực Ninh', 280, 3308, 6, 1),
(517, 40, 'Huyện Nghĩa Hưng', 'Huyện Nghĩa Hưng', 'Huyện Nghĩa Hưng', 'Huyện Nghĩa Hưng', 284, 3243, 7, 1),
(518, 40, 'Huyện Nam Trực', 'Huyện Nam Trực', 'Huyện Nam Trực', 'Huyện Nam Trực', 279, 1983, 8, 1),
(519, 40, 'Huyện Mỹ Lộc', 'Huyện Mỹ Lộc', 'Huyện Mỹ Lộc', 'Huyện Mỹ Lộc', 281, 1981, 9, 1),
(520, 40, 'Huyện Hải Hậu', 'Huyện Hải Hậu', 'Huyện Hải Hậu', 'Huyện Hải Hậu', 286, 1840, 10, 1),
(521, 40, 'Huyện Giao Thủy', 'Huyện Giao Thủy', 'Huyện Giao Thủy', 'Huyện Giao Thủy', 283, 3193, 11, 1),
(522, 41, 'Thị Xã Thái Hòa', 'Thị Xã Thái Hòa', 'Thị Xã Thái Hòa', 'Thị Xã Thái Hòa', 322, 1850, 2, 1),
(523, 41, 'Thị xã Hoàng Mai', 'Thị xã Hoàng Mai', 'Thị xã Hoàng Mai', 'Thị xã Hoàng Mai', 720, 1849, 3, 1),
(524, 41, 'Thị Xã Cửa Lò', 'Thị Xã Cửa Lò', 'Thị Xã Cửa Lò', 'Thị Xã Cửa Lò', 324, 1842, 4, 1),
(525, 41, 'Thành Phố Vinh', 'Thành Phố Vinh', 'Thành Phố Vinh', 'Thành Phố Vinh', 331, 1617, 5, 1),
(526, 41, 'Huyện Yên Thành', 'Huyện Yên Thành', 'Huyện Yên Thành', 'Huyện Yên Thành', 334, 1846, 6, 1),
(527, 41, 'Huyện Tương Dương', 'Huyện Tương Dương', 'Huyện Tương Dương', 'Huyện Tương Dương', 325, 3288, 7, 1),
(528, 41, 'Huyện Thanh Chương', 'Huyện Thanh Chương', 'Huyện Thanh Chương', 'Huyện Thanh Chương', 316, 3291, 8, 1),
(529, 41, 'Huyện Tân Kỳ', 'Huyện Tân Kỳ', 'Huyện Tân Kỳ', 'Huyện Tân Kỳ', 328, 1845, 9, 1),
(530, 41, 'Huyện Quỳnh Lưu', 'Huyện Quỳnh Lưu', 'Huyện Quỳnh Lưu', 'Huyện Quỳnh Lưu', 317, 1848, 10, 1),
(531, 41, 'Huyện Quỳ Hợp', 'Huyện Quỳ Hợp', 'Huyện Quỳ Hợp', 'Huyện Quỳ Hợp', 318, 1852, 11, 1);
INSERT INTO `lh_ship_khuvuc` (`id`, `id_parent`, `tenbaiviet_vi`, `tenbaiviet_en`, `tenbaiviet_cn`, `tenbaiviet_jp`, `id_shipchung`, `id_giaohangnhanh`, `catasort`, `showhi`) VALUES
(532, 41, 'Huyện Quỳ Châu', 'Huyện Quỳ Châu', 'Huyện Quỳ Châu', 'Huyện Quỳ Châu', 323, 3261, 12, 1),
(533, 41, 'Huyện Quế Phong', 'Huyện Quế Phong', 'Huyện Quế Phong', 'Huyện Quế Phong', 326, 3260, 13, 1),
(534, 41, 'Huyện Nghĩa Đàn', 'Huyện Nghĩa Đàn', 'Huyện Nghĩa Đàn', 'Huyện Nghĩa Đàn', 321, 1851, 14, 1),
(535, 41, 'Huyện Nghi Lộc', 'Huyện Nghi Lộc', 'Huyện Nghi Lộc', 'Huyện Nghi Lộc', 333, 1854, 15, 1),
(536, 41, 'Huyện Nam Đàn', 'Huyện Nam Đàn', 'Huyện Nam Đàn', 'Huyện Nam Đàn', 327, 3233, 16, 1),
(537, 41, 'Huyện Kỳ Sơn', 'Huyện Kỳ Sơn', 'Huyện Kỳ Sơn', 'Huyện Kỳ Sơn', 330, 3211, 17, 1),
(538, 41, 'Huyện Hưng Nguyên', 'Huyện Hưng Nguyên', 'Huyện Hưng Nguyên', 'Huyện Hưng Nguyên', 320, 1947, 18, 1),
(539, 41, 'Huyện Đô Lương', 'Huyện Đô Lương', 'Huyện Đô Lương', 'Huyện Đô Lương', 332, 1843, 19, 1),
(540, 41, 'Huyện Diễn Châu', 'Huyện Diễn Châu', 'Huyện Diễn Châu', 'Huyện Diễn Châu', 329, 1847, 20, 1),
(541, 41, 'Huyện Con Cuông', 'Huyện Con Cuông', 'Huyện Con Cuông', 'Huyện Con Cuông', 319, 1853, 21, 1),
(542, 41, 'Huyện Anh Sơn', 'Huyện Anh Sơn', 'Huyện Anh Sơn', 'Huyện Anh Sơn', 315, 1844, 22, 1),
(543, 42, 'Thị Xã Tam điệp', 'Thị Xã Tam điệp', 'Thị Xã Tam điệp', 'Thị Xã Tam điệp', 270, 1713, 2, 1),
(544, 42, 'Thành Phố Ninh Bình', 'Thành Phố Ninh Bình', 'Thành Phố Ninh Bình', 'Thành Phố Ninh Bình', 269, 1615, 3, 1),
(545, 42, 'Huyện Yên Mô', 'Huyện Yên Mô', 'Huyện Yên Mô', 'Huyện Yên Mô', 275, 3327, 4, 1),
(546, 42, 'Huyện Yên Khánh', 'Huyện Yên Khánh', 'Huyện Yên Khánh', 'Huyện Yên Khánh', 277, 1714, 5, 1),
(547, 42, 'Huyện Nho Quan', 'Huyện Nho Quan', 'Huyện Nho Quan', 'Huyện Nho Quan', 272, 3247, 6, 1),
(548, 42, 'Huyện Kim Sơn', 'Huyện Kim Sơn', 'Huyện Kim Sơn', 'Huyện Kim Sơn', 271, 3205, 7, 1),
(549, 42, 'Huyện Hoa Lư', 'Huyện Hoa Lư', 'Huyện Hoa Lư', 'Huyện Hoa Lư', 274, 1944, 8, 1),
(550, 42, 'Huyện Gia Viễn', 'Huyện Gia Viễn', 'Huyện Gia Viễn', 'Huyện Gia Viễn', 273, 3191, 9, 1),
(551, 43, 'Thành phố Phan Rang - Tháp Chàm', 'Thành phố Phan Rang - Tháp Chàm', 'Thành phố Phan Rang - Tháp Chàm', 'Thành phố Phan Rang - Tháp Chàm', 510, 1665, 2, 1),
(552, 43, 'Huyện Thuận Nam', 'Huyện Thuận Nam', 'Huyện Thuận Nam', 'Huyện Thuận Nam', 507, 3302, 3, 1),
(553, 43, 'Huyện Thuận Bắc', 'Huyện Thuận Bắc', 'Huyện Thuận Bắc', 'Huyện Thuận Bắc', 509, 3301, 4, 1),
(554, 43, 'Huyện Ninh Sơn', 'Huyện Ninh Sơn', 'Huyện Ninh Sơn', 'Huyện Ninh Sơn', 506, 1855, 5, 1),
(555, 43, 'Huyện Ninh Phước', 'Huyện Ninh Phước', 'Huyện Ninh Phước', 'Huyện Ninh Phước', 505, 1986, 6, 1),
(556, 43, 'Huyện Ninh Hải', 'Huyện Ninh Hải', 'Huyện Ninh Hải', 'Huyện Ninh Hải', 508, 1985, 7, 1),
(557, 43, 'Huyện Bác Ái', 'Huyện Bác Ái', 'Huyện Bác Ái', 'Huyện Bác Ái', 504, 3129, 8, 1),
(558, 44, 'Thi Xã Phú Thọ', 'Thi Xã Phú Thọ', 'Thi Xã Phú Thọ', 'Thi Xã Phú Thọ', 150, 2064, 2, 1),
(559, 44, 'Thành Phố Việt Trì', 'Thành Phố Việt Trì', 'Thành Phố Việt Trì', 'Thành Phố Việt Trì', 152, 1602, 3, 1),
(560, 44, 'Huyện Yên Lập', 'Huyện Yên Lập', 'Huyện Yên Lập', 'Huyện Yên Lập', 158, 2268, 4, 1),
(561, 44, 'Huyện Thanh Thủy', 'Huyện Thanh Thủy', 'Huyện Thanh Thủy', 'Huyện Thanh Thủy', 154, 2237, 5, 1),
(562, 44, 'Huyện Thanh Sơn', 'Huyện Thanh Sơn', 'Huyện Thanh Sơn', 'Huyện Thanh Sơn', 156, 2029, 6, 1),
(563, 44, 'Huyện Thanh Ba', 'Huyện Thanh Ba', 'Huyện Thanh Ba', 'Huyện Thanh Ba', 151, 3290, 7, 1),
(564, 44, 'Huyện Tân Sơn', 'Huyện Tân Sơn', 'Huyện Tân Sơn', 'Huyện Tân Sơn', 157, 2015, 8, 1),
(565, 44, 'Huyện Tam Nông', 'Huyện Tam Nông', 'Huyện Tam Nông', 'Huyện Tam Nông', 160, 3272, 9, 1),
(566, 44, 'Huyện Phù Ninh', 'Huyện Phù Ninh', 'Huyện Phù Ninh', 'Huyện Phù Ninh', 155, 1994, 10, 1),
(567, 44, 'Huyện Lâm Thao', 'Huyện Lâm Thao', 'Huyện Lâm Thao', 'Huyện Lâm Thao', 161, 1959, 11, 1),
(568, 44, 'Huyện Hạ Hòa', 'Huyện Hạ Hòa', 'Huyện Hạ Hòa', 'Huyện Hạ Hòa', 162, 1938, 12, 1),
(569, 44, 'Huyện Đoan Hùng', 'Huyện Đoan Hùng', 'Huyện Đoan Hùng', 'Huyện Đoan Hùng', 153, 1925, 13, 1),
(570, 44, 'Huyện Cẩm Khê', 'Huyện Cẩm Khê', 'Huyện Cẩm Khê', 'Huyện Cẩm Khê', 159, 1905, 14, 1),
(571, 45, 'Thị Xã Sông Cầu', 'Thị Xã Sông Cầu', 'Thị Xã Sông Cầu', 'Thị Xã Sông Cầu', 74, 1856, 2, 1),
(572, 45, 'Thành Phố Tuy Hòa', 'Thành Phố Tuy Hòa', 'Thành Phố Tuy Hòa', 'Thành Phố Tuy Hòa', 79, 1663, 3, 1),
(573, 45, 'Huyện Tuy An', 'Huyện Tuy An', 'Huyện Tuy An', 'Huyện Tuy An', 75, 3284, 4, 1),
(574, 45, 'Huyện Tây Hòa', 'Huyện Tây Hòa', 'Huyện Tây Hòa', 'Huyện Tây Hòa', 77, 3278, 5, 1),
(575, 45, 'Huyện Sông Hinh', 'Huyện Sông Hinh', 'Huyện Sông Hinh', 'Huyện Sông Hinh', 76, 2206, 6, 1),
(576, 45, 'Huyện Sơn Hòa', 'Huyện Sơn Hòa', 'Huyện Sơn Hòa', 'Huyện Sơn Hòa', 80, 2211, 7, 1),
(577, 45, 'Huyện Phú Hòa', 'Huyện Phú Hòa', 'Huyện Phú Hòa', 'Huyện Phú Hòa', 73, 1993, 8, 1),
(578, 45, 'Huyện Đồng Xuân', 'Huyện Đồng Xuân', 'Huyện Đồng Xuân', 'Huyện Đồng Xuân', 81, 3186, 9, 1),
(579, 45, 'Huyện Đông Hòa', 'Huyện Đông Hòa', 'Huyện Đông Hòa', 'Huyện Đông Hòa', 78, 3184, 10, 1),
(580, 46, 'Thị xã Ba Đồn', 'Thị xã Ba Đồn', 'Thị xã Ba Đồn', 'Thị xã Ba Đồn', 719, 1859, 2, 1),
(581, 46, 'Thành Phố Đồng Hới', 'Thành Phố Đồng Hới', 'Thành Phố Đồng Hới', 'Thành Phố Đồng Hới', 349, 1619, 3, 1),
(582, 46, 'Huyện Tuyên Hóa', 'Huyện Tuyên Hóa', 'Huyện Tuyên Hóa', 'Huyện Tuyên Hóa', 348, 3286, 4, 1),
(583, 46, 'Huyện Quảng Trạch', 'Huyện Quảng Trạch', 'Huyện Quảng Trạch', 'Huyện Quảng Trạch', 351, 3258, 5, 1),
(584, 46, 'Huyện Quảng Ninh', 'Huyện Quảng Ninh', 'Huyện Quảng Ninh', 'Huyện Quảng Ninh', 353, 2002, 6, 1),
(585, 46, 'Huyện Minh Hóa', 'Huyện Minh Hóa', 'Huyện Minh Hóa', 'Huyện Minh Hóa', 352, 3224, 7, 1),
(586, 46, 'Huyện Lệ Thủy', 'Huyện Lệ Thủy', 'Huyện Lệ Thủy', 'Huyện Lệ Thủy', 347, 1857, 8, 1),
(587, 46, 'Huyện Bố Trạch', 'Huyện Bố Trạch', 'Huyện Bố Trạch', 'Huyện Bố Trạch', 350, 1858, 9, 1),
(588, 47, 'Thành Phố Tam Kỳ', 'Thành Phố Tam Kỳ', 'Thành Phố Tam Kỳ', 'Thành Phố Tam Kỳ', 386, 1631, 2, 1),
(589, 47, 'Thành Phố Hội An', 'Thành Phố Hội An', 'Thành Phố Hội An', 'Thành Phố Hội An', 391, 1632, 3, 1),
(590, 47, 'Huyện Tiên Phước', 'Huyện Tiên Phước', 'Huyện Tiên Phước', 'Huyện Tiên Phước', 392, 2224, 4, 1),
(591, 47, 'Huyện Thăng Bình', 'Huyện Thăng Bình', 'Huyện Thăng Bình', 'Huyện Thăng Bình', 385, 2239, 5, 1),
(592, 47, 'Huyện Tây Giang', 'Huyện Tây Giang', 'Huyện Tây Giang', 'Huyện Tây Giang', 390, 2219, 6, 1),
(593, 47, 'Huyện Quế Sơn', 'Huyện Quế Sơn', 'Huyện Quế Sơn', 'Huyện Quế Sơn', 396, 2003, 7, 1),
(594, 47, 'Huyện Phước Sơn', 'Huyện Phước Sơn', 'Huyện Phước Sơn', 'Huyện Phước Sơn', 382, 2198, 8, 1),
(595, 47, 'Huyện Phú Ninh', 'Huyện Phú Ninh', 'Huyện Phú Ninh', 'Huyện Phú Ninh', 381, 1995, 9, 1),
(596, 47, 'Huyện Núi Thành', 'Huyện Núi Thành', 'Huyện Núi Thành', 'Huyện Núi Thành', 398, 1987, 10, 1),
(597, 47, 'Huyện Nông Sơn', 'Huyện Nông Sơn', 'Huyện Nông Sơn', 'Huyện Nông Sơn', 397, 2182, 11, 1),
(598, 47, 'Huyện Nam Trà My', 'Huyện Nam Trà My', 'Huyện Nam Trà My', 'Huyện Nam Trà My', 387, 2178, 12, 1),
(599, 47, 'Huyện Nam Giang', 'Huyện Nam Giang', 'Huyện Nam Giang', 'Huyện Nam Giang', 384, 2177, 13, 1),
(600, 47, 'Huyện Hiệp Đức', 'Huyện Hiệp Đức', 'Huyện Hiệp Đức', 'Huyện Hiệp Đức', 393, 2139, 14, 1),
(601, 47, 'Huyện Đông Giang', 'Huyện Đông Giang', 'Huyện Đông Giang', 'Huyện Đông Giang', 388, 2125, 15, 1),
(602, 47, 'Huyện Điện Bàn', 'Huyện Điện Bàn', 'Huyện Điện Bàn', 'Huyện Điện Bàn', 394, 1736, 16, 1),
(603, 47, 'Huyện Đại Lộc', 'Huyện Đại Lộc', 'Huyện Đại Lộc', 'Huyện Đại Lộc', 383, 1917, 17, 1),
(604, 47, 'Huyện Duy Xuyên', 'Huyện Duy Xuyên', 'Huyện Duy Xuyên', 'Huyện Duy Xuyên', 395, 1735, 18, 1),
(605, 47, 'Huyện Bắc Trà My', 'Huyện Bắc Trà My', 'Huyện Bắc Trà My', 'Huyện Bắc Trà My', 389, 2078, 19, 1),
(606, 48, 'Thành Phố Quảng Ngãi', 'Thành Phố Quảng Ngãi', 'Thành Phố Quảng Ngãi', 'Thành Phố Quảng Ngãi', 404, 1630, 2, 1),
(607, 48, 'Huyện Tư Nghĩa', 'Huyện Tư Nghĩa', 'Huyện Tư Nghĩa', 'Huyện Tư Nghĩa', 400, 1738, 3, 1),
(608, 48, 'Huyện Trà Bồng', 'Huyện Trà Bồng', 'Huyện Trà Bồng', 'Huyện Trà Bồng', 407, 3304, 4, 1),
(609, 48, 'Huyện Tây Trà', 'Huyện Tây Trà', 'Huyện Tây Trà', 'Huyện Tây Trà', 408, 2222, 5, 1),
(610, 48, 'Huyện Sơn Tịnh', 'Huyện Sơn Tịnh', 'Huyện Sơn Tịnh', 'Huyện Sơn Tịnh', 412, 1737, 6, 1),
(611, 48, 'Huyện Sơn Tây', 'Huyện Sơn Tây', 'Huyện Sơn Tây', 'Huyện Sơn Tây', 406, 3270, 7, 1),
(612, 48, 'Huyện Sơn Hà', 'Huyện Sơn Hà', 'Huyện Sơn Hà', 'Huyện Sơn Hà', 410, 2210, 8, 1),
(613, 48, 'Huyện Nghĩa Hành', 'Huyện Nghĩa Hành', 'Huyện Nghĩa Hành', 'Huyện Nghĩa Hành', 399, 1988, 9, 1),
(614, 48, 'Huyện Mộ đức', 'Huyện Mộ đức', 'Huyện Mộ đức', 'Huyện Mộ đức', 405, 3226, 10, 1),
(615, 48, 'Huyện Minh Long', 'Huyện Minh Long', 'Huyện Minh Long', 'Huyện Minh Long', 402, 2167, 11, 1),
(616, 48, 'Huyện Lý Sơn', 'Huyện Lý Sơn', 'Huyện Lý Sơn', 'Huyện Lý Sơn', 409, 2114, 12, 1),
(617, 48, 'Huyện đức Phổ', 'Huyện đức Phổ', 'Huyện đức Phổ', 'Huyện đức Phổ', 411, 1930, 13, 1),
(618, 48, 'Huyện Bình Sơn', 'Huyện Bình Sơn', 'Huyện Bình Sơn', 'Huyện Bình Sơn', 403, 1898, 14, 1),
(619, 48, 'Huyện Ba Tơ', 'Huyện Ba Tơ', 'Huyện Ba Tơ', 'Huyện Ba Tơ', 401, 3127, 15, 1),
(620, 49, 'Thị Xã Quảng Yên', 'Thị Xã Quảng Yên', 'Thị Xã Quảng Yên', 'Thị Xã Quảng Yên', 204, 2066, 2, 1),
(621, 49, 'Thành phố Uông Bí', 'Thành phố Uông Bí', 'Thành phố Uông Bí', 'Thành phố Uông Bí', 203, 1686, 3, 1),
(622, 49, 'Thành Phố Móng Cái', 'Thành Phố Móng Cái', 'Thành Phố Móng Cái', 'Thành Phố Móng Cái', 213, 1603, 4, 1),
(623, 49, 'Thành Phố Hạ Long', 'Thành Phố Hạ Long', 'Thành Phố Hạ Long', 'Thành Phố Hạ Long', 215, 1604, 5, 1),
(624, 49, 'Thành phố Cẩm Phả', 'Thành phố Cẩm Phả', 'Thành phố Cẩm Phả', 'Thành phố Cẩm Phả', 211, 1683, 6, 1),
(625, 49, 'Huyện Vân Đồn', 'Huyện Vân Đồn', 'Huyện Vân Đồn', 'Huyện Vân Đồn', 210, 1920, 7, 1),
(626, 49, 'Huyện Tiên Yên', 'Huyện Tiên Yên', 'Huyện Tiên Yên', 'Huyện Tiên Yên', 202, 2019, 8, 1),
(627, 49, 'Huyện Hoành Bồ', 'Huyện Hoành Bồ', 'Huyện Hoành Bồ', 'Huyện Hoành Bồ', 209, 3199, 9, 1),
(628, 49, 'Huyện Hải Hà', 'Huyện Hải Hà', 'Huyện Hải Hà', 'Huyện Hải Hà', 214, 1940, 10, 1),
(629, 49, 'Huyện Đông Triều', 'Huyện Đông Triều', 'Huyện Đông Triều', 'Huyện Đông Triều', 205, 3185, 11, 1),
(630, 49, 'Huyện Đầm Hà', 'Huyện Đầm Hà', 'Huyện Đầm Hà', 'Huyện Đầm Hà', 208, 3180, 12, 1),
(631, 49, 'Huyện Cô Tô', 'Huyện Cô Tô', 'Huyện Cô Tô', 'Huyện Cô Tô', 212, 2109, 13, 1),
(632, 49, 'Huyện Bình Liêu', 'Huyện Bình Liêu', 'Huyện Bình Liêu', 'Huyện Bình Liêu', 207, 1896, 14, 1),
(633, 49, 'Huyện Ba Chẽ', 'Huyện Ba Chẽ', 'Huyện Ba Chẽ', 'Huyện Ba Chẽ', 206, 3126, 15, 1),
(634, 50, 'Thị Xã Quảng Trị', 'Thị Xã Quảng Trị', 'Thị Xã Quảng Trị', 'Thị Xã Quảng Trị', 358, 1621, 2, 1),
(635, 50, 'Thành Phố Đông Hà', 'Thành Phố Đông Hà', 'Thành Phố Đông Hà', 'Thành Phố Đông Hà', 355, 1620, 3, 1),
(636, 50, 'Huyện Vĩnh Linh', 'Huyện Vĩnh Linh', 'Huyện Vĩnh Linh', 'Huyện Vĩnh Linh', 363, 1861, 4, 1),
(637, 50, 'Huyện Triệu Phong', 'Huyện Triệu Phong', 'Huyện Triệu Phong', 'Huyện Triệu Phong', 354, 2040, 5, 1),
(638, 50, 'Huyện Hướng Hóa', 'Huyện Hướng Hóa', 'Huyện Hướng Hóa', 'Huyện Hướng Hóa', 357, 1860, 6, 1),
(639, 50, 'Huyện Hải Lăng', 'Huyện Hải Lăng', 'Huyện Hải Lăng', 'Huyện Hải Lăng', 362, 2137, 7, 1),
(640, 50, 'Huyện Gio Linh', 'Huyện Gio Linh', 'Huyện Gio Linh', 'Huyện Gio Linh', 356, 1936, 8, 1),
(641, 50, 'Huyện Đảo Cồn Cỏ', 'Huyện Đảo Cồn Cỏ', 'Huyện Đảo Cồn Cỏ', 'Huyện Đảo Cồn Cỏ', 360, 2110, 9, 1),
(642, 50, 'Huyện Đa Krông', 'Huyện Đa Krông', 'Huyện Đa Krông', 'Huyện Đa Krông', 361, 2105, 10, 1),
(643, 50, 'Huyện Cam Lộ', 'Huyện Cam Lộ', 'Huyện Cam Lộ', 'Huyện Cam Lộ', 359, 1903, 11, 1),
(644, 51, 'Thị Xã Vĩnh Châu', 'Thị Xã Vĩnh Châu', 'Thị Xã Vĩnh Châu', 'Thị Xã Vĩnh Châu', 110, 2272, 2, 1),
(645, 51, 'Thị trấn Trần Đề', 'Thị trấn Trần Đề', 'Thị trấn Trần Đề', 'Thị trấn Trần Đề', 707, 2037, 3, 1),
(646, 51, 'Thành Phố Sóc Trăng', 'Thành Phố Sóc Trăng', 'Thành Phố Sóc Trăng', 'Thành Phố Sóc Trăng', 116, 1568, 4, 1),
(647, 51, 'Huyện Thạnh Trị', 'Huyện Thạnh Trị', 'Huyện Thạnh Trị', 'Huyện Thạnh Trị', 111, 2238, 5, 1),
(648, 51, 'Huyện Ngã Năm', 'Huyện Ngã Năm', 'Huyện Ngã Năm', 'Huyện Ngã Năm', 113, 2062, 6, 1),
(649, 51, 'Huyện Mỹ Xuyên', 'Huyện Mỹ Xuyên', 'Huyện Mỹ Xuyên', 'Huyện Mỹ Xuyên', 117, 1743, 7, 1),
(650, 51, 'Huyện Mỹ Tú', 'Huyện Mỹ Tú', 'Huyện Mỹ Tú', 'Huyện Mỹ Tú', 118, 2173, 8, 1),
(651, 51, 'Huyện Long Phú', 'Huyện Long Phú', 'Huyện Long Phú', 'Huyện Long Phú', 109, 2161, 9, 1),
(652, 51, 'Huyện Kế Sách', 'Huyện Kế Sách', 'Huyện Kế Sách', 'Huyện Kế Sách', 114, 1949, 10, 1),
(653, 51, 'Huyện Cù Lao Dung', 'Huyện Cù Lao Dung', 'Huyện Cù Lao Dung', 'Huyện Cù Lao Dung', 115, 2093, 11, 1),
(654, 51, 'Huyện Châu Thành', 'Huyện Châu Thành', 'Huyện Châu Thành', 'Huyện Châu Thành', 112, 1910, 12, 1),
(655, 52, 'Thành phố Sơn La', 'Thành phố Sơn La', 'Thành phố Sơn La', 'Thành phố Sơn La', 142, 1677, 2, 1),
(656, 52, 'Huyện Yên Châu', 'Huyện Yên Châu', 'Huyện Yên Châu', 'Huyện Yên Châu', 149, 2267, 3, 1),
(657, 52, 'Huyện Vân Hồ', 'Huyện Vân Hồ', 'Huyện Vân Hồ', 'Huyện Vân Hồ', 714, 2255, 4, 1),
(658, 52, 'Huyện Thuận Châu', 'Huyện Thuận Châu', 'Huyện Thuận Châu', 'Huyện Thuận Châu', 146, 2032, 5, 1),
(659, 52, 'Huyện Sốp Cộp', 'Huyện Sốp Cộp', 'Huyện Sốp Cộp', 'Huyện Sốp Cộp', 145, 3266, 6, 1),
(660, 52, 'Huyện Sông Mã', 'Huyện Sông Mã', 'Huyện Sông Mã', 'Huyện Sông Mã', 141, 2007, 7, 1),
(661, 52, 'Huyện Quỳnh Nhai', 'Huyện Quỳnh Nhai', 'Huyện Quỳnh Nhai', 'Huyện Quỳnh Nhai', 139, 2204, 8, 1),
(662, 52, 'Huyện Phù Yên', 'Huyện Phù Yên', 'Huyện Phù Yên', 'Huyện Phù Yên', 144, 1996, 9, 1),
(663, 52, 'Huyện Mường La', 'Huyện Mường La', 'Huyện Mường La', 'Huyện Mường La', 140, 3230, 10, 1),
(664, 52, 'Huyện Mộc Châu', 'Huyện Mộc Châu', 'Huyện Mộc Châu', 'Huyện Mộc Châu', 148, 1976, 11, 1),
(665, 52, 'Huyện Mai Sơn', 'Huyện Mai Sơn', 'Huyện Mai Sơn', 'Huyện Mai Sơn', 143, 1971, 12, 1),
(666, 52, 'Huyện Bắc Yên', 'Huyện Bắc Yên', 'Huyện Bắc Yên', 'Huyện Bắc Yên', 147, 2079, 13, 1),
(667, 53, 'Thành Phố Tây Ninh', 'Thành Phố Tây Ninh', 'Thành Phố Tây Ninh', 'Thành Phố Tây Ninh', 514, 1626, 2, 1),
(668, 53, 'Huyện Trảng Bàng', 'Huyện Trảng Bàng', 'Huyện Trảng Bàng', 'Huyện Trảng Bàng', 518, 2035, 3, 1),
(669, 53, 'Huyện Tân Châu', 'Huyện Tân Châu', 'Huyện Tân Châu', 'Huyện Tân Châu', 511, 1863, 4, 1),
(670, 53, 'Huyện Tân Biên', 'Huyện Tân Biên', 'Huyện Tân Biên', 'Huyện Tân Biên', 516, 1862, 5, 1),
(671, 53, 'Huyện Hòa Thành', 'Huyện Hòa Thành', 'Huyện Hòa Thành', 'Huyện Hòa Thành', 515, 1721, 6, 1),
(672, 53, 'Huyện Gò Dầu', 'Huyện Gò Dầu', 'Huyện Gò Dầu', 'Huyện Gò Dầu', 517, 1866, 7, 1),
(673, 53, 'Huyện Dương Minh Châu', 'Huyện Dương Minh Châu', 'Huyện Dương Minh Châu', 'Huyện Dương Minh Châu', 519, 1864, 8, 1),
(674, 53, 'Huyện Châu Thành', 'Huyện Châu Thành', 'Huyện Châu Thành', 'Huyện Châu Thành', 512, 1720, 9, 1),
(675, 53, 'Huyện Bến Cầu', 'Huyện Bến Cầu', 'Huyện Bến Cầu', 'Huyện Bến Cầu', 513, 1865, 10, 1),
(676, 54, 'Thành Phố Thái Bình', 'Thành Phố Thái Bình', 'Thành Phố Thái Bình', 'Thành Phố Thái Bình', 265, 1599, 2, 1),
(677, 54, 'Huyện Vũ Thư', 'Huyện Vũ Thư', 'Huyện Vũ Thư', 'Huyện Vũ Thư', 261, 1716, 3, 1),
(678, 54, 'Huyện Tiền Hải', 'Huyện Tiền Hải', 'Huyện Tiền Hải', 'Huyện Tiền Hải', 267, 3281, 4, 1),
(679, 54, 'Huyện Thái Thụy', 'Huyện Thái Thụy', 'Huyện Thái Thụy', 'Huyện Thái Thụy', 260, 1869, 5, 1),
(680, 54, 'Huyện Quỳnh Phụ', 'Huyện Quỳnh Phụ', 'Huyện Quỳnh Phụ', 'Huyện Quỳnh Phụ', 262, 1868, 6, 1),
(681, 54, 'Huyện Quỳnh Côi', 'Huyện Quỳnh Côi', 'Huyện Quỳnh Côi', 'Huyện Quỳnh Côi', 264, 0, 7, 1),
(682, 54, 'Huyện Kiến Xương', 'Huyện Kiến Xương', 'Huyện Kiến Xương', 'Huyện Kiến Xương', 268, 1951, 8, 1),
(683, 54, 'Huyện Hưng Hà', 'Huyện Hưng Hà', 'Huyện Hưng Hà', 'Huyện Hưng Hà', 263, 1867, 9, 1),
(684, 54, 'Huyện Đông Hưng', 'Huyện Đông Hưng', 'Huyện Đông Hưng', 'Huyện Đông Hưng', 266, 1715, 10, 1),
(685, 55, 'Thị Xã Sông Công', 'Thị Xã Sông Công', 'Thị Xã Sông Công', 'Thị Xã Sông Công', 108, 1684, 2, 1),
(686, 55, 'Thành Phố Thái Nguyên', 'Thành Phố Thái Nguyên', 'Thành Phố Thái Nguyên', 'Thành Phố Thái Nguyên', 103, 1639, 3, 1),
(687, 55, 'Huyện Võ Nhai', 'Huyện Võ Nhai', 'Huyện Võ Nhai', 'Huyện Võ Nhai', 102, 2051, 4, 1),
(688, 55, 'Huyện Phú Lương', 'Huyện Phú Lương', 'Huyện Phú Lương', 'Huyện Phú Lương', 101, 2195, 5, 1),
(689, 55, 'Huyện Phú Bình', 'Huyện Phú Bình', 'Huyện Phú Bình', 'Huyện Phú Bình', 104, 1991, 6, 1),
(690, 55, 'Huyện Phổ Yên', 'Huyện Phổ Yên', 'Huyện Phổ Yên', 'Huyện Phổ Yên', 100, 1990, 7, 1),
(691, 55, 'Huyện Đồng Hỷ', 'Huyện Đồng Hỷ', 'Huyện Đồng Hỷ', 'Huyện Đồng Hỷ', 105, 1731, 8, 1),
(692, 55, 'Huyện Định Hóa', 'Huyện Định Hóa', 'Huyện Định Hóa', 'Huyện Định Hóa', 107, 1924, 9, 1),
(693, 55, 'Huyện Đại Từ', 'Huyện Đại Từ', 'Huyện Đại Từ', 'Huyện Đại Từ', 106, 1918, 10, 1),
(694, 56, 'Thị Xã Sầm Sơn', 'Thị Xã Sầm Sơn', 'Thị Xã Sầm Sơn', 'Thị Xã Sầm Sơn', 293, 1712, 2, 1),
(695, 56, 'Thị Xã Bỉm Sơn', 'Thị Xã Bỉm Sơn', 'Thị Xã Bỉm Sơn', 'Thị Xã Bỉm Sơn', 309, 1876, 3, 1),
(696, 56, 'Thành Phố Thanh Hóa', 'Thành Phố Thanh Hóa', 'Thành Phố Thanh Hóa', 'Thành Phố Thanh Hóa', 299, 1616, 4, 1),
(697, 56, 'Huyện Yên định', 'Huyện Yên định', 'Huyện Yên định', 'Huyện Yên định', 304, 1875, 5, 1),
(698, 56, 'Huyện Vĩnh Lộc', 'Huyện Vĩnh Lộc', 'Huyện Vĩnh Lộc', 'Huyện Vĩnh Lộc', 297, 1881, 6, 1),
(699, 56, 'Huyện Triệu Sơn', 'Huyện Triệu Sơn', 'Huyện Triệu Sơn', 'Huyện Triệu Sơn', 300, 2249, 7, 1),
(700, 56, 'Huyện Tĩnh Gia', 'Huyện Tĩnh Gia', 'Huyện Tĩnh Gia', 'Huyện Tĩnh Gia', 302, 1870, 8, 1),
(701, 56, 'Huyện Thường Xuân', 'Huyện Thường Xuân', 'Huyện Thường Xuân', 'Huyện Thường Xuân', 303, 1872, 9, 1),
(702, 56, 'Huyện Thọ Xuân', 'Huyện Thọ Xuân', 'Huyện Thọ Xuân', 'Huyện Thọ Xuân', 291, 1873, 10, 1),
(703, 56, 'Huyện Thiệu Hóa', 'Huyện Thiệu Hóa', 'Huyện Thiệu Hóa', 'Huyện Thiệu Hóa', 311, 3298, 11, 1),
(704, 56, 'Huyện Thạch Thành', 'Huyện Thạch Thành', 'Huyện Thạch Thành', 'Huyện Thạch Thành', 292, 1880, 12, 1),
(705, 56, 'Huyện Quảng Xương', 'Huyện Quảng Xương', 'Huyện Quảng Xương', 'Huyện Quảng Xương', 294, 1747, 13, 1),
(706, 56, 'Huyện Quan Sơn', 'Huyện Quan Sơn', 'Huyện Quan Sơn', 'Huyện Quan Sơn', 290, 2000, 14, 1),
(707, 56, 'Huyện Quan Hóa', 'Huyện Quan Hóa', 'Huyện Quan Hóa', 'Huyện Quan Hóa', 314, 1879, 15, 1),
(708, 56, 'Huyện Nông Cống', 'Huyện Nông Cống', 'Huyện Nông Cống', 'Huyện Nông Cống', 301, 2181, 16, 1),
(709, 56, 'Huyện Như Xuân', 'Huyện Như Xuân', 'Huyện Như Xuân', 'Huyện Như Xuân', 305, 1871, 17, 1),
(710, 56, 'Huyện Như Thanh', 'Huyện Như Thanh', 'Huyện Như Thanh', 'Huyện Như Thanh', 308, 2190, 18, 1),
(711, 56, 'Huyện Ngọc Lặc', 'Huyện Ngọc Lặc', 'Huyện Ngọc Lặc', 'Huyện Ngọc Lặc', 288, 1874, 19, 1),
(712, 56, 'Huyện Nga Sơn', 'Huyện Nga Sơn', 'Huyện Nga Sơn', 'Huyện Nga Sơn', 295, 3241, 20, 1),
(713, 56, 'Huyện Mường Lát', 'Huyện Mường Lát', 'Huyện Mường Lát', 'Huyện Mường Lát', 312, 1878, 21, 1),
(714, 56, 'Huyện Lang Chánh', 'Huyện Lang Chánh', 'Huyện Lang Chánh', 'Huyện Lang Chánh', 298, 3216, 22, 1),
(715, 56, 'Huyện Hoằng Hóa', 'Huyện Hoằng Hóa', 'Huyện Hoằng Hóa', 'Huyện Hoằng Hóa', 289, 1748, 23, 1),
(716, 56, 'Huyện Hậu Lộc', 'Huyện Hậu Lộc', 'Huyện Hậu Lộc', 'Huyện Hậu Lộc', 307, 1942, 24, 1),
(717, 56, 'Huyện Hà Trung', 'Huyện Hà Trung', 'Huyện Hà Trung', 'Huyện Hà Trung', 310, 1877, 25, 1),
(718, 56, 'Huyện Đông Sơn', 'Huyện Đông Sơn', 'Huyện Đông Sơn', 'Huyện Đông Sơn', 296, 1927, 26, 1),
(719, 56, 'Huyện Cẩm Thủy', 'Huyện Cẩm Thủy', 'Huyện Cẩm Thủy', 'Huyện Cẩm Thủy', 313, 3147, 27, 1),
(720, 56, 'Huyện Bá Thước', 'Huyện Bá Thước', 'Huyện Bá Thước', 'Huyện Bá Thước', 306, 2070, 28, 1),
(721, 57, 'Thị Xã Hương Thủy', 'Thị Xã Hương Thủy', 'Thị Xã Hương Thủy', 'Thị Xã Hương Thủy', 367, 1698, 2, 1),
(722, 57, 'Thành Phố Huế', 'Thành Phố Huế', 'Thành Phố Huế', 'Thành Phố Huế', 371, 1585, 3, 1),
(723, 57, 'Huyện Quảng Điền', 'Huyện Quảng Điền', 'Huyện Quảng Điền', 'Huyện Quảng Điền', 370, 3257, 4, 1),
(724, 57, 'Huyện Phú Vang', 'Huyện Phú Vang', 'Huyện Phú Vang', 'Huyện Phú Vang', 365, 1749, 5, 1),
(725, 57, 'Huyện Phú Lộc', 'Huyện Phú Lộc', 'Huyện Phú Lộc', 'Huyện Phú Lộc', 366, 1882, 6, 1),
(726, 57, 'Huyện Phong Điền', 'Huyện Phong Điền', 'Huyện Phong Điền', 'Huyện Phong Điền', 369, 2193, 7, 1),
(727, 57, 'Huyện Nam đông', 'Huyện Nam đông', 'Huyện Nam đông', 'Huyện Nam đông', 372, 3234, 8, 1),
(728, 57, 'Huyện Hương Trà', 'Huyện Hương Trà', 'Huyện Hương Trà', 'Huyện Hương Trà', 364, 1697, 9, 1),
(729, 57, 'Huyện A Lưới', 'Huyện A Lưới', 'Huyện A Lưới', 'Huyện A Lưới', 368, 1885, 10, 1),
(730, 58, 'Thị Xã Gò Công', 'Thị Xã Gò Công', 'Thị Xã Gò Công', 'Thị Xã Gò Công', 616, 2057, 2, 1),
(731, 58, 'Thị xã Cai Lậy', 'Thị xã Cai Lậy', 'Thị xã Cai Lậy', 'Thị xã Cai Lậy', 620, 2055, 3, 1),
(732, 58, 'Thành Phố Mỹ Tho', 'Thành Phố Mỹ Tho', 'Thành Phố Mỹ Tho', 'Thành Phố Mỹ Tho', 619, 1556, 4, 1),
(733, 58, 'Huyện Tân Phước', 'Huyện Tân Phước', 'Huyện Tân Phước', 'Huyện Tân Phước', 625, 3275, 5, 1),
(734, 58, 'Huyện Tân Phú Đông', 'Huyện Tân Phú Đông', 'Huyện Tân Phú Đông', 'Huyện Tân Phú Đông', 617, 2216, 6, 1),
(735, 58, 'Huyện Gò Công Tây', 'Huyện Gò Công Tây', 'Huyện Gò Công Tây', 'Huyện Gò Công Tây', 621, 1933, 7, 1),
(736, 58, 'Huyện Gò Công Đông', 'Huyện Gò Công Đông', 'Huyện Gò Công Đông', 'Huyện Gò Công Đông', 623, 1932, 8, 1),
(737, 58, 'Huyện Chợ Gạo', 'Huyện Chợ Gạo', 'Huyện Chợ Gạo', 'Huyện Chợ Gạo', 618, 1741, 9, 1),
(738, 58, 'Huyện Châu Thành', 'Huyện Châu Thành', 'Huyện Châu Thành', 'Huyện Châu Thành', 624, 1740, 10, 1),
(739, 58, 'Huyện Cái Bè', 'Huyện Cái Bè', 'Huyện Cái Bè', 'Huyện Cái Bè', 622, 1900, 11, 1),
(740, 59, 'Thành Phố Trà Vinh', 'Thành Phố Trà Vinh', 'Thành Phố Trà Vinh', 'Thành Phố Trà Vinh', 683, 1560, 2, 1),
(741, 59, 'Huyện Trà Cú', 'Huyện Trà Cú', 'Huyện Trà Cú', 'Huyện Trà Cú', 677, 2033, 3, 1),
(742, 59, 'Huyện Tiểu Cần', 'Huyện Tiểu Cần', 'Huyện Tiểu Cần', 'Huyện Tiểu Cần', 684, 2020, 4, 1),
(743, 59, 'Huyện Duyên Hải', 'Huyện Duyên Hải', 'Huyện Duyên Hải', 'Huyện Duyên Hải', 678, 2103, 5, 1),
(744, 59, 'Huyện Châu Thành', 'Huyện Châu Thành', 'Huyện Châu Thành', 'Huyện Châu Thành', 681, 1911, 6, 1),
(745, 59, 'Huyện Cầu Ngang', 'Huyện Cầu Ngang', 'Huyện Cầu Ngang', 'Huyện Cầu Ngang', 682, 1908, 7, 1),
(746, 59, 'Huyện Cầu Kè', 'Huyện Cầu Kè', 'Huyện Cầu Kè', 'Huyện Cầu Kè', 679, 2091, 8, 1),
(747, 59, 'Huyện Càng Long', 'Huyện Càng Long', 'Huyện Càng Long', 'Huyện Càng Long', 680, 2086, 9, 1),
(748, 60, 'Thành phố Tuyên Quang', 'Thành phố Tuyên Quang', 'Thành phố Tuyên Quang', 'Thành phố Tuyên Quang', 57, 1601, 2, 1),
(749, 60, 'Huyện Yên Sơn', 'Huyện Yên Sơn', 'Huyện Yên Sơn', 'Huyện Yên Sơn', 58, 1745, 3, 1),
(750, 60, 'Huyện Sơn Dương', 'Huyện Sơn Dương', 'Huyện Sơn Dương', 'Huyện Sơn Dương', 60, 3267, 4, 1),
(751, 60, 'Huyện Nà Hang', 'Huyện Nà Hang', 'Huyện Nà Hang', 'Huyện Nà Hang', 62, 1982, 5, 1),
(752, 60, 'Huyện Lâm Bình', 'Huyện Lâm Bình', 'Huyện Lâm Bình', 'Huyện Lâm Bình', 702, 1957, 6, 1),
(753, 60, 'Huyện Hàm Yên', 'Huyện Hàm Yên', 'Huyện Hàm Yên', 'Huyện Hàm Yên', 59, 1941, 7, 1),
(754, 60, 'Huyện Chiêm Hóa', 'Huyện Chiêm Hóa', 'Huyện Chiêm Hóa', 'Huyện Chiêm Hóa', 61, 3157, 8, 1),
(755, 61, 'Thành Phố Vĩnh Long', 'Thành Phố Vĩnh Long', 'Thành Phố Vĩnh Long', 'Thành Phố Vĩnh Long', 648, 1562, 2, 1),
(756, 61, 'Huyện Vũng Liêm', 'Huyện Vũng Liêm', 'Huyện Vũng Liêm', 'Huyện Vũng Liêm', 653, 2263, 3, 1),
(757, 61, 'Huyện Trà Ôn', 'Huyện Trà Ôn', 'Huyện Trà Ôn', 'Huyện Trà Ôn', 647, 2034, 4, 1),
(758, 61, 'Huyện Tam Bình', 'Huyện Tam Bình', 'Huyện Tam Bình', 'Huyện Tam Bình', 650, 2008, 5, 1),
(759, 61, 'Huyện Mang Thít', 'Huyện Mang Thít', 'Huyện Mang Thít', 'Huyện Mang Thít', 654, 2164, 6, 1),
(760, 61, 'Huyện Long Hồ', 'Huyện Long Hồ', 'Huyện Long Hồ', 'Huyện Long Hồ', 651, 1962, 7, 1),
(761, 61, 'Huyện Bình Tân', 'Huyện Bình Tân', 'Huyện Bình Tân', 'Huyện Bình Tân', 652, 2081, 8, 1),
(762, 61, 'Huyện Bình Minh', 'Huyện Bình Minh', 'Huyện Bình Minh', 'Huyện Bình Minh', 649, 2054, 9, 1),
(763, 62, 'Thị Xã Phúc Yên', 'Thị Xã Phúc Yên', 'Thị Xã Phúc Yên', 'Thị Xã Phúc Yên', 130, 2065, 2, 1),
(764, 62, 'Thành Phố Vĩnh Yên', 'Thành Phố Vĩnh Yên', 'Thành Phố Vĩnh Yên', 'Thành Phố Vĩnh Yên', 132, 1578, 3, 1),
(765, 62, 'Huyên Yên Lạc', 'Huyên Yên Lạc', 'Huyên Yên Lạc', 'Huyên Yên Lạc', 133, 1734, 4, 1),
(766, 62, 'Huyện Vĩnh Tường', 'Huyện Vĩnh Tường', 'Huyện Vĩnh Tường', 'Huyện Vĩnh Tường', 131, 1733, 5, 1),
(767, 62, 'Huỵên Tam Đảo', 'Huỵên Tam Đảo', 'Huỵên Tam Đảo', 'Huỵên Tam Đảo', 135, 3271, 6, 1),
(768, 62, 'Huyện Tam Dương', 'Huyện Tam Dương', 'Huyện Tam Dương', 'Huyện Tam Dương', 136, 2009, 7, 1),
(769, 62, 'Huyện Sông Lô', 'Huyện Sông Lô', 'Huyện Sông Lô', 'Huyện Sông Lô', 138, 3265, 8, 1),
(770, 62, 'Huyện Lập Thạch', 'Huyện Lập Thạch', 'Huyện Lập Thạch', 'Huyện Lập Thạch', 134, 1960, 9, 1),
(771, 62, 'Huyện Bình Xuyên', 'Huyện Bình Xuyên', 'Huyện Bình Xuyên', 'Huyện Bình Xuyên', 137, 1732, 10, 1),
(772, 63, 'Thị Xã Nghĩa Lộ', 'Thị Xã Nghĩa Lộ', 'Thị Xã Nghĩa Lộ', 'Thị Xã Nghĩa Lộ', 97, 2063, 2, 1),
(773, 63, 'Thành Phố Yên Bái', 'Thành Phố Yên Bái', 'Thành Phố Yên Bái', 'Thành Phố Yên Bái', 98, 1674, 3, 1),
(774, 63, 'Huyện Yên Bình', 'Huyện Yên Bình', 'Huyện Yên Bình', 'Huyện Yên Bình', 94, 2266, 4, 1),
(775, 63, 'Huyện Văn Yên', 'Huyện Văn Yên', 'Huyện Văn Yên', 'Huyện Văn Yên', 92, 2047, 5, 1),
(776, 63, 'Huyện Văn Chấn', 'Huyện Văn Chấn', 'Huyện Văn Chấn', 'Huyện Văn Chấn', 91, 2044, 6, 1),
(777, 63, 'Huyện Trấn Yên', 'Huyện Trấn Yên', 'Huyện Trấn Yên', 'Huyện Trấn Yên', 93, 2039, 7, 1),
(778, 63, 'Huyện Trạm Tấu', 'Huyện Trạm Tấu', 'Huyện Trạm Tấu', 'Huyện Trạm Tấu', 95, 2248, 8, 1),
(779, 63, 'Huyện Mù Căng Chải', 'Huyện Mù Căng Chải', 'Huyện Mù Căng Chải', 'Huyện Mù Căng Chải', 99, 1977, 9, 1),
(780, 63, 'Huyện Lục Yên', 'Huyện Lục Yên', 'Huyện Lục Yên', 'Huyện Lục Yên', 96, 1967, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lh_ship_thanhtoan_setup`
--

CREATE TABLE `lh_ship_thanhtoan_setup` (
  `id` int(11) NOT NULL,
  `check_tai_cong_ty` tinyint(1) NOT NULL DEFAULT '1',
  `check_khi_nhan_hang` tinyint(1) NOT NULL DEFAULT '1',
  `check_chuyen_khoan` tinyint(1) NOT NULL DEFAULT '1',
  `check_ngan_luong` tinyint(1) NOT NULL DEFAULT '1',
  `check_bao_kim` tinyint(1) NOT NULL DEFAULT '1',
  `noidung_chuyenkhoan` text,
  `url_nganluong` varchar(255) DEFAULT NULL,
  `email_nganluong` varchar(255) DEFAULT NULL,
  `maketnoi_nganluong` varchar(255) DEFAULT NULL,
  `matkhau_nganluong` varchar(255) DEFAULT NULL,
  `url_baokim` varchar(255) DEFAULT NULL,
  `email_baokim` varchar(255) DEFAULT NULL,
  `matkhau_baokim` varchar(255) DEFAULT NULL,
  `ma_website_baokim` varchar(255) DEFAULT NULL,
  `api_user_baokim` varchar(255) DEFAULT NULL,
  `api_pass_baokim` varchar(255) DEFAULT NULL,
  `private_key_baokim` text,
  `email_paypal` varchar(255) DEFAULT NULL,
  `url_paypal` varchar(255) DEFAULT NULL,
  `ti_le_paypal` float NOT NULL DEFAULT '0',
  `check_paypal` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lh_ship_thanhtoan_setup`
--

INSERT INTO `lh_ship_thanhtoan_setup` (`id`, `check_tai_cong_ty`, `check_khi_nhan_hang`, `check_chuyen_khoan`, `check_ngan_luong`, `check_bao_kim`, `noidung_chuyenkhoan`, `url_nganluong`, `email_nganluong`, `maketnoi_nganluong`, `matkhau_nganluong`, `url_baokim`, `email_baokim`, `matkhau_baokim`, `ma_website_baokim`, `api_user_baokim`, `api_pass_baokim`, `private_key_baokim`, `email_paypal`, `url_paypal`, `ti_le_paypal`, `check_paypal`) VALUES
(1, 1, 1, 1, 1, 1, '<p>Thông tin chuyển khoản</p>', 'https://sandbox.nganluong.vn:8088/nl30/micro_checkout_api.php?wsdl', 'hieutrinh@pavietnam.vn', '46234', '2f0fb87695890bde0cbccb285aba4ab0', 'https://sandbox.baokim.vn', 'dev.baokim@bk.vn', 'ae543c080ad91c23', '647', 'merchant', '1234', '-----BEGIN PRIVATE KEY-----\r\nMIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQDZZBAIQz1UZtVm\r\np0Jwv0SnoIkGYdHUs7vzdfXYBs1wvznuLp/SfC/MHzHVQw7urN8qv+ZDxzTMgu2Q\r\n3FhMOQ+LIoqYNnklm+5EFsE8hz01sZzg+uRBbyNEdcTa39I4X88OFr13KoJC6sBE\r\n397+5HG1HPjip8a83v8G4/IPcna5/3ydVbJ9ZeMSUXP6ZyKAKay4M22/Wli7PLrm\r\n1XNR9JgIuQLma74yCGkaXtCJQswjyYAmwDPpz4ZknSGuBYUmwaHMgrDOQsOXFW7/\r\n7M2KbjenwggAW98f0f97AR2DEq9Eb5r8vzyHURnHGD3/noZxl993lM2foPI3SKBO\r\n1KpSeXRzAgMBAAECggEANMINBgRTgQVH6xbSkAxLPCdAufTJeMZ56bcKB/h2qVMv\r\nWvejv/B1pSM489nHaPM5YeWam35f+PYZc5uWLkF23TxvyEsIEbGLHKktEmR73WkS\r\neqNI+/xd4cJ3GOtS2G2gEXpBVwdQ/657JPvz4YZNdjfmyxMOr02rNN/jIg6Uc8Tz\r\nvbpGdtP49nhqcOUpbKEyUxdDo6TgLVgmLAKkGJVW40kwvU9hTTo6GXledLNtL2kD\r\nl6gpVWAiT6xlTsD5m74YzsxCSjkh60NdYeUDYwMbv0WWH3kJq6qD063ac3i/i8H+\r\nB5nGf4KbKg1bBjPLNymUj7RRnKjHr301i2u8LUQYuQKBgQD15YCoa5uHd6DHUXEK\r\nkejU34Axznr3Gs6LqcisE7t0oQ9hB4s16U9f4DBHDOvnkLb0zkadwdEmwo/D/Tdf\r\n5c/JEk8q/aO9Wk8uV4Bswnx1OV9uKMzMOZbv/So1DQg1aW1MgvRnj3SiKpDUkNwr\r\nen4NT9tbH21SmVIO9Da5KpiFRwKBgQDiUrg1hp8EDaeZFTG9DvcwyTTrpD/YT9Wr\r\ns/NtEnPMjy0NXWcEXwGzx90P+qjJ+J29Hk89QHON6S7o0X2lUIer3uXokc86ce76\r\n5UIbR6u7R1T6TUNfwqwwNfIbgtFN4+7ybodPNZ5DWslKLqMr5wpwIOr7/U5ih7BH\r\nJK0cSriddQKBgGXzNZiepOlRrBN3rMqZHFPGJrx/w3PYZXJ6fnz54WrFrD6qhglg\r\nJky2As4yiUyFL5XoQFcAGNtdJ4Y24lKcUb4oHTLR3qWPX+zy0ohFSpy/oNVnjSHP\r\nbskpyeoc8R5UC8EBOpwFWnIx+8JmHSLZspGKXoQ1T3pDn0Yb8uRqyLnZAoGBAKdk\r\nNwqfvwzobIU0v8ztPLbAmnuOyAndQlP0jJ6nfy5U1yWDZ6Y7/q5RrJcc9aosT76I\r\npGLRQKY9SYy5JQ0YOsBL5A/XiEXZ7r9ywSocIFAruhZG/wXcni4qOB9Q6i2J4Dk+\r\ntqVHKv72LtrHE7hs8bNtJV+rQkZtxVtZLRA308PhAoGBALVEaYMRm97V+Tnsej6q\r\nfuT/6oKHPqZpur2rNfEKVn5Aq2kmFrvyUhvXi0IAWQ/XS3XJ7faQnprrWT6pYiSy\r\n2YQuaghlNG1SATVd5eUadq2pA8DuSzqWFa0Ac1IAyliBO2uLPL7LzuEKmmuQk0vI\r\nTU2Q8idAb77K7mvVguA3LDhN\r\n-----END PRIVATE KEY-----', 'trunghieu220994-buyer-2@gmail.com', 'https://www.sandbox.paypal.com/cgi-bin/webscr', 22000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lh_ship_vanchuyen_khac`
--

CREATE TABLE `lh_ship_vanchuyen_khac` (
  `id` int(11) NOT NULL,
  `id_kv` int(11) NOT NULL DEFAULT '0',
  `tenbaiviet_vi` varchar(255) DEFAULT NULL,
  `tenbaiviet_en` varchar(255) DEFAULT NULL,
  `toi_thieu` int(11) NOT NULL DEFAULT '0',
  `toi_da` int(11) NOT NULL DEFAULT '0',
  `loai` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 //gia tri 1 //kg',
  `phi_van_chuyen` int(11) NOT NULL DEFAULT '0',
  `gia_dieu_chinh` longtext,
  `du_kien` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lh_ship_vanchuyen_khac`
--

INSERT INTO `lh_ship_vanchuyen_khac` (`id`, `id_kv`, `tenbaiviet_vi`, `tenbaiviet_en`, `toi_thieu`, `toi_da`, `loai`, `phi_van_chuyen`, `gia_dieu_chinh`, `du_kien`) VALUES
(13, 2, 'Giao hàng tận nơi', 'Giao hàng tận nơi', 0, 0, 0, 40000, '{\"94\":\"0\",\"95\":\"0\",\"96\":\"0\",\"97\":\"0\",\"98\":\"0\",\"99\":\"0\",\"100\":\"0\",\"101\":\"0\",\"102\":\"0\",\"103\":\"0\",\"104\":\"0\",\"105\":\"0\",\"106\":\"0\",\"107\":\"0\",\"108\":\"0\",\"109\":\"0\",\"110\":\"0\",\"111\":\"0\",\"112\":\"0\",\"113\":\"0\",\"114\":\"0\",\"115\":\"0\",\"116\":\"0\",\"117\":\"0\"}', ''),
(11, 0, 'Giao hàng tận nơi', 'Giao hàng tận nơi', 0, 0, 0, 40000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lh_ship_vanchuyen_setup`
--

CREATE TABLE `lh_ship_vanchuyen_setup` (
  `id` int(11) NOT NULL,
  `loai_ship` tinyint(1) NOT NULL DEFAULT '1',
  `url_shipchung` varchar(255) DEFAULT NULL,
  `api_shipchung` varchar(255) DEFAULT NULL,
  `url_giaohangnhanh` varchar(255) DEFAULT NULL,
  `api_giaohangnhanh` varchar(255) DEFAULT NULL,
  `kho_tinhthanh` int(11) NOT NULL DEFAULT '0',
  `kho_quanhuyen` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lh_ship_vanchuyen_setup`
--

INSERT INTO `lh_ship_vanchuyen_setup` (`id`, `loai_ship`, `url_shipchung`, `api_shipchung`, `url_giaohangnhanh`, `api_giaohangnhanh`, `kho_tinhthanh`, `kho_quanhuyen`) VALUES
(1, 2, 'http://services.shipchung.vn/api/rest/courier/calculate', 'db985f6c7e02110182d27ea85f3f6894', 'https://console.ghn.vn/api/v1/apiv3/FindAvailableServices', '5b2a0ccf94c06b036d1f8eba', 2, 94);

-- --------------------------------------------------------

--
-- Table structure for table `lh_slug`
--

CREATE TABLE `lh_slug` (
  `id` int(11) NOT NULL,
  `bang` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `id_bang` int(11) NOT NULL DEFAULT '0',
  `step` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lh_slug`
--

INSERT INTO `lh_slug` (`id`, `bang`, `slug`, `id_bang`, `step`) VALUES
(1, 'step', 'gioi-thieu', 1, 1),
(2, 'step', 'san-pham', 2, 2),
(3, 'step', 'dich-vu', 3, 3),
(4, 'step', 'tin-tuc-su-kien', 4, 4),
(5, 'step', 'tuyen-dung', 5, 5),
(6, 'step', 'lien-he', 6, 6),
(7, 'baiviet', 'quat-cong-nghiep-deton', 1, 1),
(8, 'danhmuc', 'quat-cong-nghiep-deton-8', 1, 1),
(9, 'danhmuc', 'cong-ty-duc-viet', 2, 1),
(10, 'danhmuc', 'muc-tieu', 3, 1),
(11, 'danhmuc', 'khach-hang', 4, 1),
(12, 'baiviet', 'hinh-thanh-va-phat-trien', 2, 1),
(13, 'baiviet', 'be-day-kinh-nghiem', 3, 1),
(14, 'baiviet', 'chat-luong-sieu-ben', 4, 1),
(15, 'baiviet', 'doi-ngu-nhan-vien-gioi', 5, 1),
(16, 'baiviet', 'dich-vu-chuyen-nghiep', 6, 1),
(17, 'baiviet', 'khach-hang-17', 7, 1),
(18, 'baiviet', 'khach-hang-17-cp-367771584946002', 8, 1),
(19, 'baiviet', 'khach-hang-17-cp-399681584946020', 9, 1),
(20, 'baiviet', 'khach-hang-17-cp-538451584946020', 10, 1),
(21, 'baiviet', 'khach-hang-17-cp-450591584946020', 11, 1),
(22, 'baiviet', 'khach-hang-17-cp-154651584946020', 12, 1),
(23, 'baiviet', 'khach-hang-17-cp-415101584946020', 13, 1),
(24, 'baiviet', 'khach-hang-17-cp-856811584946020', 14, 1),
(25, 'baiviet', 'bao-duong', 15, 3),
(26, 'baiviet', 'bao-hanh', 16, 3),
(27, 'danhmuc', 'tin-tuc-chuyen-nghanh', 5, 4),
(28, 'danhmuc', 'tin-tuc-noi-bo', 6, 4),
(29, 'baiviet', 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong', 17, 4),
(30, 'baiviet', 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-934251584946539', 18, 4),
(31, 'baiviet', 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-531281584946540', 19, 4),
(32, 'baiviet', 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-430871584946540', 20, 4),
(33, 'baiviet', 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-776921584946540', 21, 4),
(34, 'baiviet', 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-288021584946540', 22, 4),
(35, 'baiviet', 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-523731584946540', 23, 4),
(36, 'baiviet', 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-533131584946540', 24, 4),
(37, 'baiviet', 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-290071584946540', 25, 4),
(38, 'baiviet', 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-489041584946540', 26, 4),
(39, 'baiviet', 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-713681584946540', 27, 4),
(40, 'baiviet', 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-800801584946540', 28, 4),
(41, 'baiviet', 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-895061584946540', 29, 4),
(42, 'baiviet', 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-463701584946540', 30, 4),
(43, 'baiviet', 'phuong-an-giai-quyet-nang-nong-cho-trang-trai-chan-nuoi-cay-trong-cp-317461584946540', 31, 4),
(44, 'baiviet', 'a648559e9c10c0ba5681e6b7bec52798', 32, 6),
(45, 'baiviet', '2191b80e2777eb31d85d05319e4cc5bb', 33, 6),
(46, 'baiviet', '6a0f83aaa893e47d663e58b1f76c691c', 34, 6),
(47, 'danhmuc', 'vi-sao-chon-duc-viet', 7, 5),
(48, 'danhmuc', 'co-hoi-viec-lam', 8, 5),
(49, 'baiviet', 'moi-truong-lam-viec-nang-dong-sang-tao', 35, 5),
(50, 'baiviet', 'duoc-dao-tao-chuyen-mon-va-ky-nang-lam-viec', 36, 5),
(51, 'baiviet', 'chinh-sach-dai-ngo-hap-dan', 37, 5),
(52, 'baiviet', 'van-hoa-lam-viec-dua-tren-su-hop-tac-chuyen-nghiep', 38, 5),
(56, 'baiviet', 'tuyen-nhan-vien-kinh-doanh-cp-173481584947226', 42, 5),
(57, 'danhmuc', 'quat-san-cong-nghiep', 9, 2),
(58, 'danhmuc', 'quat-cay-cong-nghiep', 10, 2),
(59, 'danhmuc', 'quat-treo-tuong-cong-nghiep', 11, 2),
(60, 'danhmuc', 'quat-huong-truc', 12, 2),
(61, 'danhmuc', 'quat-chong-chay-no', 13, 2),
(62, 'danhmuc', 'quat-ly-tam', 14, 2),
(63, 'danhmuc', 'quat-thong-gio', 15, 2),
(64, 'danhmuc', 'quat-phun-suong', 16, 2),
(65, 'danhmuc', 'quat-tang-ap-cau-thang', 17, 2),
(66, 'danhmuc', 'quat-cong-trinh-nha-xuong', 18, 2),
(67, 'danhmuc', 'quat-hut-bep-cong-nghiep', 19, 2),
(68, 'danhmuc', 'quat-dieu-hoa-khong-khi', 20, 2),
(69, 'danhmuc', 'quat-cong-nghiep-nhiet-do-cao', 21, 2),
(70, 'danhmuc', 'linh-kien', 22, 2),
(71, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang', 43, 2),
(72, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-839801584953326', 44, 2),
(73, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-686331584953326', 45, 2),
(74, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-903781584953326', 46, 2),
(75, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-734091584953326', 47, 2),
(76, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-520381584953326', 48, 2),
(77, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-641761584953326', 49, 2),
(78, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-177471584953326', 50, 2),
(79, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-111571584953326', 51, 2),
(80, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-224771584953326', 52, 2),
(81, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-807001584953326', 53, 2),
(82, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-873381584953326', 54, 2),
(83, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-477121584953326', 55, 2),
(84, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-838811584953326', 56, 2),
(85, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-860481584953326', 57, 2),
(86, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-998661584953326', 58, 2),
(87, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-593251584953326', 59, 2),
(88, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-373721584953326', 60, 2),
(89, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-202541584953326', 61, 2),
(90, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-370051584953326', 62, 2),
(91, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-773491584953326', 63, 2),
(92, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-185801584953326', 64, 2),
(93, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-863561584953326', 65, 2),
(94, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-152491584953326', 66, 2),
(95, 'baiviet', 'quat-san-cong-nghiep-son-den-fe-khong-tuoc-nang-cp-277651584953326', 67, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lh_sponline`
--

CREATE TABLE `lh_sponline` (
  `id` int(11) NOT NULL,
  `tenbaiviet_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenbaiviet_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` tinyint(2) DEFAULT NULL,
  `mota_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_user` int(11) DEFAULT '0',
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opt` int(11) NOT NULL DEFAULT '0',
  `ngaydang` int(11) DEFAULT NULL,
  `catasort` int(11) NOT NULL DEFAULT '0',
  `showhi` tinyint(1) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duongdantin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lh_step`
--

CREATE TABLE `lh_step` (
  `id` int(11) NOT NULL,
  `tenbaiviet_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenbaiviet_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenbaiviet_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p1_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p1_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p1_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p2_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p2_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p2_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p3_vi` text COLLATE utf8_unicode_ci,
  `p3_en` text COLLATE utf8_unicode_ci,
  `p3_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidung_vi` text COLLATE utf8_unicode_ci,
  `noidung_en` text COLLATE utf8_unicode_ci,
  `noidung_cn` text COLLATE utf8_unicode_ci,
  `seo_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catasort` int(11) DEFAULT '0',
  `step` tinyint(4) NOT NULL DEFAULT '0',
  `ngaydang` int(11) NOT NULL DEFAULT '0',
  `duongdantin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_view` int(11) NOT NULL DEFAULT '0',
  `opt` tinyint(1) NOT NULL DEFAULT '0',
  `opt1` tinyint(1) NOT NULL DEFAULT '0',
  `showhi` tinyint(1) NOT NULL DEFAULT '1',
  `size_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size_img_dm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `map_google` text COLLATE utf8_unicode_ci,
  `tenbaiviet_jp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p1_jp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p2_jp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p3_jp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidung_jp` text COLLATE utf8_unicode_ci,
  `seo_title_jp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description_jp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords_jp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lh_step`
--

INSERT INTO `lh_step` (`id`, `tenbaiviet_vi`, `tenbaiviet_en`, `tenbaiviet_cn`, `p1_vi`, `p1_en`, `p1_cn`, `p2_vi`, `p2_en`, `p2_cn`, `p3_vi`, `p3_en`, `p3_cn`, `noidung_vi`, `noidung_en`, `noidung_cn`, `seo_name`, `catasort`, `step`, `ngaydang`, `duongdantin`, `icon`, `seo_title_vi`, `seo_title_en`, `seo_title_cn`, `seo_description_vi`, `seo_description_en`, `seo_description_cn`, `seo_keywords_vi`, `seo_keywords_en`, `seo_keywords_cn`, `num_view`, `opt`, `opt1`, `showhi`, `size_img`, `size_img_dm`, `map_google`, `tenbaiviet_jp`, `p1_jp`, `p2_jp`, `p3_jp`, `noidung_jp`, `seo_title_jp`, `seo_description_jp`, `seo_keywords_jp`) VALUES
(1, 'Giới thiệu', 'Introduce', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gioi-thieu', 1, 32, 1585018921, 'datafiles', '1584934733_1.jpg', 'Giới thiệu', 'Introduce', '', 'Giới thiệu', 'Introduce', '', 'Giới thiệu', 'Introduce', '', 0, 0, 0, 1, '300x300', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', ''),
(2, 'Sản phẩm', 'Product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'san-pham', 2, 2, 1584935021, 'datafiles', '1584935021_2.jpg', 'Sản phẩm', 'Product', '', 'Sản phẩm', 'Product', '', 'Sản phẩm', 'Product', '', 20, 0, 0, 1, '300x300', '300x300', NULL, NULL, NULL, NULL, NULL, NULL, '', '', ''),
(3, 'Dịch vụ', 'Service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dich-vu', 3, 1, 1584935053, 'datafiles', '1584935053_3.jpg', 'Dịch vụ', 'Service', '', 'Dịch vụ', 'Service', '', 'Dịch vụ', 'Service', '', 0, 0, 0, 1, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', ''),
(4, 'Tin tức & sự kiện', 'News & events', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tin-tuc-su-kien', 4, 3, 1584935087, 'datafiles', '1584935077_5.jpg', 'Tin tức & sự kiện', 'News & events', '', 'Tin tức & sự kiện', 'News & events', '', 'Tin tức & sự kiện', 'News & events', '', 12, 0, 0, 1, '380x250', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', ''),
(5, 'Tuyển dụng', 'Recruitment', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tuyen-dung', 5, 4, 1584935483, 'datafiles', '1584935539_6.jpg', 'Tuyển dụng', 'Recruitment', '', 'Tuyển dụng', 'Recruitment', '', 'Tuyển dụng', 'Recruitment', '', 0, 0, 0, 1, '300x300', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', ''),
(6, 'Liên hệ', 'Contact', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lien-he', 6, 5, 1584935529, 'datafiles', '1584935529_4.jpg', 'Liên hệ', 'Contact', '', 'Liên hệ', 'Contact', '', 'Liên hệ', 'Contact', '', 0, 0, 0, 1, '', '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.5095052053193!2d105.85084191548337!3d21.012289993714933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abf4ae36b7473A0xc74fda4dd06fb266!2zS2h1IHThuq1wIHRo4buDIE5ndXnhu4VuIEPDtG5nIFRy4bup!5e0!3m2!1sen!2s!4v1582530815679!5m2!1sen!2s', NULL, NULL, NULL, NULL, NULL, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `lh_thuoctinhchung`
--

CREATE TABLE `lh_thuoctinhchung` (
  `id` int(11) NOT NULL,
  `tenbaiviet_vi` varchar(255) DEFAULT NULL,
  `tenbaiviet_en` varchar(255) DEFAULT NULL,
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `seo_name` varchar(255) DEFAULT NULL,
  `blank` varchar(255) DEFAULT NULL,
  `catasort` int(11) NOT NULL DEFAULT '0',
  `duongdantin` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `showhi` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lh_thuoctinhchung`
--

INSERT INTO `lh_thuoctinhchung` (`id`, `tenbaiviet_vi`, `tenbaiviet_en`, `id_parent`, `seo_name`, `blank`, `catasort`, `duongdantin`, `icon`, `showhi`) VALUES
(60, 'About', 'About', 0, '/about-us/', '', 1, 'datafiles/setone', NULL, 1),
(61, 'Carrer', 'Carrer', 0, '/carrer/', '', 2, 'datafiles/setone', NULL, 1),
(62, 'Contact', 'Contact', 0, '/contact/', '', 3, 'datafiles/setone', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lh_yeuthich`
--

CREATE TABLE `lh_yeuthich` (
  `id` int(11) NOT NULL,
  `id_baiviet` int(11) NOT NULL DEFAULT '0',
  `id_member` int(11) NOT NULL DEFAULT '0',
  `showhi` tinyint(1) NOT NULL DEFAULT '1',
  `the_loai` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lh_yeuthich`
--

INSERT INTO `lh_yeuthich` (`id`, `id_baiviet`, `id_member`, `showhi`, `the_loai`) VALUES
(20, 44, 107, 1, 1),
(19, 45, 107, 1, 1),
(18, 46, 107, 1, 1),
(17, 47, 107, 1, 1),
(16, 189, 107, 0, 1),
(15, 49, 107, 1, 1),
(14, 48, 107, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lh_baiviet`
--
ALTER TABLE `lh_baiviet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_baiviet_chitiet`
--
ALTER TABLE `lh_baiviet_chitiet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_baiviet_img`
--
ALTER TABLE `lh_baiviet_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_baiviet_sao`
--
ALTER TABLE `lh_baiviet_sao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_baiviet_select_tinhnang`
--
ALTER TABLE `lh_baiviet_select_tinhnang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_baiviet_thuoctinh`
--
ALTER TABLE `lh_baiviet_thuoctinh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_baiviet_tinhnang`
--
ALTER TABLE `lh_baiviet_tinhnang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_banner`
--
ALTER TABLE `lh_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_banner_danhmuc`
--
ALTER TABLE `lh_banner_danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_binhluan`
--
ALTER TABLE `lh_binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_clanguage`
--
ALTER TABLE `lh_clanguage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_counter`
--
ALTER TABLE `lh_counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_count_date`
--
ALTER TABLE `lh_count_date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_danhmuc`
--
ALTER TABLE `lh_danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_du_lieu_sn`
--
ALTER TABLE `lh_du_lieu_sn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_email_config`
--
ALTER TABLE `lh_email_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_email_follow`
--
ALTER TABLE `lh_email_follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_file_import_data`
--
ALTER TABLE `lh_file_import_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_form_lienhe`
--
ALTER TABLE `lh_form_lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_lienket`
--
ALTER TABLE `lh_lienket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_lien_ket_nhanh`
--
ALTER TABLE `lh_lien_ket_nhanh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_magiamgia`
--
ALTER TABLE `lh_magiamgia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_magiamgia_chitiet`
--
ALTER TABLE `lh_magiamgia_chitiet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_mangxahoi`
--
ALTER TABLE `lh_mangxahoi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_members`
--
ALTER TABLE `lh_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tentruycap` (`tentruycap`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `active_subdomain` (`tentruycap`),
  ADD KEY `active_onedomain` (`tentruycap`);

--
-- Indexes for table `lh_members_log`
--
ALTER TABLE `lh_members_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_members_nhom`
--
ALTER TABLE `lh_members_nhom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_menu`
--
ALTER TABLE `lh_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_module_nhomtaikhoan`
--
ALTER TABLE `lh_module_nhomtaikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_module_page`
--
ALTER TABLE `lh_module_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_module_setting`
--
ALTER TABLE `lh_module_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_module_tinhnang`
--
ALTER TABLE `lh_module_tinhnang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_order`
--
ALTER TABLE `lh_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_phuongthucthanhtoan`
--
ALTER TABLE `lh_phuongthucthanhtoan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_seo`
--
ALTER TABLE `lh_seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_seo_name`
--
ALTER TABLE `lh_seo_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_ship_khuvuc`
--
ALTER TABLE `lh_ship_khuvuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_ship_thanhtoan_setup`
--
ALTER TABLE `lh_ship_thanhtoan_setup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_ship_vanchuyen_khac`
--
ALTER TABLE `lh_ship_vanchuyen_khac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_ship_vanchuyen_setup`
--
ALTER TABLE `lh_ship_vanchuyen_setup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_slug`
--
ALTER TABLE `lh_slug`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `lh_sponline`
--
ALTER TABLE `lh_sponline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_step`
--
ALTER TABLE `lh_step`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_thuoctinhchung`
--
ALTER TABLE `lh_thuoctinhchung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lh_yeuthich`
--
ALTER TABLE `lh_yeuthich`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lh_baiviet`
--
ALTER TABLE `lh_baiviet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `lh_baiviet_chitiet`
--
ALTER TABLE `lh_baiviet_chitiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lh_baiviet_img`
--
ALTER TABLE `lh_baiviet_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `lh_baiviet_sao`
--
ALTER TABLE `lh_baiviet_sao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lh_baiviet_select_tinhnang`
--
ALTER TABLE `lh_baiviet_select_tinhnang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lh_baiviet_thuoctinh`
--
ALTER TABLE `lh_baiviet_thuoctinh`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `lh_baiviet_tinhnang`
--
ALTER TABLE `lh_baiviet_tinhnang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lh_banner`
--
ALTER TABLE `lh_banner`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lh_banner_danhmuc`
--
ALTER TABLE `lh_banner_danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `lh_binhluan`
--
ALTER TABLE `lh_binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `lh_clanguage`
--
ALTER TABLE `lh_clanguage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1307;

--
-- AUTO_INCREMENT for table `lh_counter`
--
ALTER TABLE `lh_counter`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lh_count_date`
--
ALTER TABLE `lh_count_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lh_danhmuc`
--
ALTER TABLE `lh_danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `lh_du_lieu_sn`
--
ALTER TABLE `lh_du_lieu_sn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `lh_email_config`
--
ALTER TABLE `lh_email_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lh_email_follow`
--
ALTER TABLE `lh_email_follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lh_file_import_data`
--
ALTER TABLE `lh_file_import_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lh_form_lienhe`
--
ALTER TABLE `lh_form_lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lh_lienket`
--
ALTER TABLE `lh_lienket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lh_lien_ket_nhanh`
--
ALTER TABLE `lh_lien_ket_nhanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lh_magiamgia`
--
ALTER TABLE `lh_magiamgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lh_magiamgia_chitiet`
--
ALTER TABLE `lh_magiamgia_chitiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lh_mangxahoi`
--
ALTER TABLE `lh_mangxahoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lh_members`
--
ALTER TABLE `lh_members`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `lh_members_log`
--
ALTER TABLE `lh_members_log`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lh_members_nhom`
--
ALTER TABLE `lh_members_nhom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lh_menu`
--
ALTER TABLE `lh_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lh_module_nhomtaikhoan`
--
ALTER TABLE `lh_module_nhomtaikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lh_module_page`
--
ALTER TABLE `lh_module_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `lh_module_setting`
--
ALTER TABLE `lh_module_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `lh_module_tinhnang`
--
ALTER TABLE `lh_module_tinhnang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `lh_order`
--
ALTER TABLE `lh_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `lh_phuongthucthanhtoan`
--
ALTER TABLE `lh_phuongthucthanhtoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lh_seo`
--
ALTER TABLE `lh_seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lh_seo_name`
--
ALTER TABLE `lh_seo_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `lh_ship_khuvuc`
--
ALTER TABLE `lh_ship_khuvuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=784;

--
-- AUTO_INCREMENT for table `lh_ship_thanhtoan_setup`
--
ALTER TABLE `lh_ship_thanhtoan_setup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lh_ship_vanchuyen_khac`
--
ALTER TABLE `lh_ship_vanchuyen_khac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lh_ship_vanchuyen_setup`
--
ALTER TABLE `lh_ship_vanchuyen_setup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lh_slug`
--
ALTER TABLE `lh_slug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `lh_sponline`
--
ALTER TABLE `lh_sponline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `lh_step`
--
ALTER TABLE `lh_step`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lh_thuoctinhchung`
--
ALTER TABLE `lh_thuoctinhchung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `lh_yeuthich`
--
ALTER TABLE `lh_yeuthich`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

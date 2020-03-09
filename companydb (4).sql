-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 14, 2020 lúc 03:16 AM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `companydb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `accountName` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `location` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `avatar` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `StatusID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `levelsID` int(11) DEFAULT NULL,
  `page` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`ID`, `accountName`, `pass`, `name`, `age`, `location`, `phone`, `avatar`, `StatusID`, `levelsID`, `page`, `updated_at`, `created_at`) VALUES
(36, 'lebinh23091999', '$2y$10$N.MFPLU9Pi.2EbXUjw1oj.UgyZTw3ADle/D7lvpV6b6R5edCtoms6', 'Lê Thanh Bình', 23, 'Tien Giang', 835400193, 'avatar.jpg', 'active', 7, NULL, '2020-02-13 06:53:52', '2020-02-13 06:53:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statusID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`ID`, `name`, `statusID`, `updated_at`, `created_at`) VALUES
(1, 'Xi măng', 'active', '2020-02-04 03:46:52', NULL),
(2, 'Gạch Xây', 'active', '2020-02-03 15:00:49', NULL),
(3, 'Đá xây dựng', 'active', '2020-02-03 14:39:57', NULL),
(4, 'Cát xây', 'active', '2020-02-04 03:58:10', NULL),
(5, 'Gạch trang trí', 'active', '2020-02-04 03:58:15', NULL),
(6, 'Nước sơn', 'active', '2020-02-04 03:59:08', NULL),
(7, 'Báo Giá', 'active', '2020-02-11 08:32:47', NULL),
(8, 'Cát đá', 'delete', '2020-02-03 15:27:41', NULL),
(9, 'Giới thiệu', 'delete', '2020-02-03 15:28:35', NULL),
(10, 'ss', 'delete', '2020-02-03 16:04:00', '2020-02-03 16:03:51'),
(11, 'Gạch lát nền', 'delete', '2020-02-03 16:07:00', '2020-02-03 16:06:54'),
(17, 'haha', 'delete', '2020-02-04 03:54:46', '2020-02-04 03:47:14'),
(18, 'tin tuc', 'delete', '2020-02-04 03:47:32', '2020-02-04 03:47:25'),
(19, 'tin tuc', 'delete', '2020-02-04 03:47:48', '2020-02-04 03:47:43'),
(20, 'kakaka', 'delete', '2020-02-04 03:54:41', '2020-02-04 03:50:47'),
(21, 'ppp', 'delete', '2020-02-04 03:54:30', '2020-02-04 03:53:57'),
(22, 'Tranh Sơn', 'delete', '2020-02-04 03:57:25', '2020-02-04 03:56:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cmt`
--

CREATE TABLE `cmt` (
  `ID` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `avatar` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `timeCmt` datetime DEFAULT NULL,
  `star` int(11) DEFAULT NULL,
  `StatusID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cmt`
--

INSERT INTO `cmt` (`ID`, `productID`, `avatar`, `name`, `email`, `gender`, `content`, `timeCmt`, `star`, `StatusID`) VALUES
(1, 5, NULL, 'Lê Thanh Bình', '', NULL, 'Còn nước sơn loại này ko shop', '2019-11-19 02:06:08', 4, 'active'),
(2, 5, NULL, 'Lê  Văn Thuận', NULL, NULL, 'liên hệ 09092333 tư vấn dùm mình nhé', '2019-11-26 00:01:05', 2, 'active'),
(3, 5, NULL, 'Lê văn A', NULL, NULL, 'Sơn này có bán ở Tiền Giang ko', '2019-11-12 03:17:17', 5, 'active'),
(4, 5, NULL, 'Trần thị thập', NULL, NULL, 'Còn hàng ko ship 10 thùng ', '2019-11-05 03:09:04', 1, 'active');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numberphone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `StatusID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`ID`, `email`, `numberphone`, `password`, `StatusID`, `updated_at`, `created_at`) VALUES
(13, 'lebinh070020@gmail.co', '', '$2y$10$CgSw.Fyc8PSS86n9.faD3OwcnAX.LmOsV7bDDW/U6d5vYAoKaC2p.', 'active', '2020-02-11 06:59:58', '2020-01-03 05:01:02'),
(24, 'lebinh070020@gmail.com', NULL, '$2y$10$d.VtN/77JgEb1GOhj9LfouXXeu2Q2odjaa023GXs8QgpSGle6XX9C', 'active', '2020-02-13 16:22:20', '2020-02-12 16:05:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `district`
--

CREATE TABLE `district` (
  `ID` int(11) NOT NULL,
  `provinceID` int(11) DEFAULT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `district`
--

INSERT INTO `district` (`ID`, `provinceID`, `name`) VALUES
(1, 1, 'Bình Chánh'),
(2, 1, 'Bình Tân'),
(3, 1, 'Bình Thạnh'),
(4, 1, 'Cần Giờ'),
(5, 1, 'Củ Chi'),
(6, 1, 'Gò Vấp'),
(7, 1, 'Hooc Môn'),
(8, 1, 'Nhà Bè'),
(9, 1, 'Phú Nhuận'),
(10, 1, 'Quận 1'),
(11, 1, 'Quận 2'),
(12, 1, 'Quận 3'),
(13, 1, 'Quận 4'),
(14, 1, 'Quận 5'),
(15, 1, 'Quận 6'),
(16, 1, 'Quận 7'),
(17, 1, 'Quận 8'),
(18, 1, 'Quận 9'),
(19, 1, 'Quận 10'),
(20, 1, 'Quận 11'),
(21, 1, 'Quận 12'),
(22, 1, 'Tân Bình'),
(23, 1, 'Tân Phú'),
(24, 1, 'Thủ Đức'),
(25, 2, 'Ba Đình'),
(26, 2, 'Ba Vì'),
(27, 2, 'Bắc Từ Liêm'),
(28, 2, 'Cầu Giấy'),
(29, 2, 'Chương Mỹ'),
(30, 2, 'Đan Phượng'),
(31, 2, 'Đông Anh'),
(32, 2, 'Đống Đa'),
(33, 2, 'Gia Lâm'),
(34, 2, 'Hà Đông'),
(35, 2, 'Hai Bà Trưng'),
(36, 2, 'Hoài Đức'),
(37, 2, 'Hoàn Kiếm'),
(38, 2, 'Hoàn Mai'),
(39, 2, 'Long Biên'),
(40, 2, 'Mê Linh'),
(41, 2, 'Mỹ Đức'),
(42, 2, 'Nam Từ Liêm'),
(43, 2, 'Phú Xuyên'),
(44, 2, 'Phúc Thọ'),
(45, 2, 'Quốc Oai'),
(46, 2, 'Phú Xuân');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `introduce`
--

CREATE TABLE `introduce` (
  `ID` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `introduce`
--

INSERT INTO `introduce` (`ID`, `content`) VALUES
(1, '<h3>sgsgrgr</h3>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `levels`
--

CREATE TABLE `levels` (
  `ID` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `StatusID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `levels`
--

INSERT INTO `levels` (`ID`, `name`, `page`, `StatusID`) VALUES
(0, 'Nhóm sản phẩm', 'san-pham-dang-kinh-doanh,san-pham-goi-y', 'active'),
(1, 'Quản trị bài viết', 'gioi-thieu,bao-gia-san-pham', 'active'),
(2, 'Quản trị đơn hàng', NULL, 'active'),
(3, 'Kế toán thống kê', 'top-san-pham', 'active'),
(4, 'Quản trị nhân sự', 'thanh-vien,tai-khoan-nhan-vien', 'active'),
(5, 'Chăm sóc khách hàng', 'duyet-phan-hoi', 'active'),
(6, 'Nhóm quản trị danh mục', 'quan-tri-danh-muc', 'active'),
(7, 'Tổng điều hành', NULL, 'active');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `ID` int(11) NOT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `statusID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`ID`, `categoryID`, `name`, `page`, `statusID`) VALUES
(2, 1, 'Xi măng', 'xi-mang', 'active'),
(3, 3, 'Đá xây dựng', 'da-xay-dung', 'active'),
(4, 4, 'Cát xây', 'gach-xay', 'active'),
(5, 5, 'gạch trang trí', 'gach-men', 'active'),
(6, 6, 'Nước sơn', 'nuoc-son', 'active'),
(7, 7, 'Báo giá', 'dich-vu', 'active'),
(8, 8, 'Tin tức', 'tin-tuc', 'pause');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_06_26_000000_create_shopping_cart_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notification`
--

CREATE TABLE `notification` (
  `ID` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notification`
--

INSERT INTO `notification` (`ID`, `content`, `updated_at`) VALUES
(1, '<p>B&Aacute;O GI&Aacute; Đ&Aacute; X&Acirc;Y DỰNG</p>\r\n\r\n<p>Sau đ&acirc;y c&ocirc;ng ty CỬU LONG CMC&nbsp;xin&nbsp;gửi tới qu&yacute; kh&aacute;ch bảng b&aacute;o gi&aacute; c&aacute;c loại đ&aacute;&nbsp;x&acirc;y dựng trong năm 2019 mong qu&yacute; kh&aacute;ch tham khảo:</p>\r\n\r\n<p><img alt=\"\" src=\"public/img/bao-gia-cat-xay-dung.jpg\" style=\"height:229px; width:738px\" /></p>\r\n\r\n<p>Gi&aacute; vật liệu x&acirc;y dựng c&oacute; thể thay đổi theo ng&agrave;y hoặc địa điểm của c&ocirc;ng tr&igrave;nh nếu muốn biết gi&aacute; ch&iacute;nh x&aacute;c nhất qu&yacute; kh&aacute;ch vui l&ograve;ng li&ecirc;n hệ:<strong>0968 168 555 - Mr.Huy or 0989 688 609 - Mr.Sửu</strong></p>\r\n\r\n<p>&ndash;&nbsp;Ch&uacute;ng t&ocirc;i cung cấp đầy đủ c&aacute;c loại c&aacute;t x&acirc;y dựng tr&ecirc;n địa b&agrave;n c&aacute;c quận th&agrave;nh phố Hồ Ch&iacute; Minh quận 1, quận 2, quận 3, quận 4, quận 5, quận 6, quận 7, quận 8, quận 9, quận 10, quận 11, quận 12, quận B&igrave;nh Thạnh, quận Thủ Đức, quận Ph&uacute; Nhuận, quận T&acirc;n Ph&uacute;, Quận T&acirc;n B&igrave;nh, Quận B&igrave;nh T&acirc;n, H&oacute;c M&ocirc;n&hellip;v&agrave; c&aacute;c tỉnh l&acirc;n cận nhằm đ&aacute;p ứng một c&aacute;ch tốt nhất mọi nhu cầu của kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<hr />\r\n<p>CH&Uacute;NG T&Ocirc;I CAM KẾT :&nbsp;</p>\r\n\r\n<p>&ndash; Giao h&agrave;ng tới c&ocirc;ng tr&igrave;nh khi kh&aacute;ch h&agrave;ng nhận đủ số lượng,quy c&aacute;ch,chủng loại mới thu tiền để đảm bảo cho &nbsp;kh&aacute;ch h&agrave;ng kiểm so&aacute;t h&agrave;ng h&oacute;a cũng như quy c&aacute;ch.<br />\r\n&ndash; Nhận đặt h&agrave;ng qua điện thoại , email v&agrave; &nbsp;giao h&agrave;ng tận nơi miễn ph&iacute; trong TPHCM.<br />\r\n&ndash; Đặt h&agrave;ng trong v&ograve;ng 1h sẽ vận chuyển h&agrave;ng tới nơi c&ocirc;ng tr&igrave;nh.</p>\r\n\r\n<p>&nbsp;</p>', '2020-02-13 07:35:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ord`
--

CREATE TABLE `ord` (
  `ID` int(11) NOT NULL,
  `customerID` int(11) DEFAULT NULL,
  `transport` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numberphone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `StatusID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `form` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordTime` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ord`
--

INSERT INTO `ord` (`ID`, `customerID`, `transport`, `total`, `name`, `numberphone`, `email`, `address`, `note`, `StatusID`, `form`, `ordTime`, `updated_at`, `created_at`) VALUES
(299, 13, 7600, 76000, 'thanh binh', '0835400193', 'lebinh070020@gmail.com', '5,Thị Trấn Tân Túc,Bình Chánh,Hồ Chí Minh', 'x', 'delete', 'card', NULL, '2020-02-11 06:56:55', '2020-02-11 06:15:31'),
(300, 13, 255200, 2552000, 'thanh binh', '0835400193', 'lebinh070020@gmail.com', '5,Thị Trấn Tân Túc,Bình Chánh,Hồ Chí Minh', 'dd', 'approve', 'card', NULL, '2020-02-11 06:55:39', '2020-02-11 06:16:14'),
(301, 13, 7428000, 74280000, 'Lê Thanh Bình', '0835400193', 'lebinh070020@gmail.com', 'Quốc lộ 1 A Ngã Tư An Sương,Thị Trấn Tân Túc,Bình Chánh,Hồ Chí Minh', 'giao hàng gấp trong tuần này', 'delete', 'card', NULL, '2020-02-12 16:36:41', '2020-02-11 07:04:41'),
(302, 24, 287600, 2876000, 'thanh binh', '0835400193', 'lebinh070020@gmail.com', '5,Thị Trấn Tân Túc,Bình Chánh,Hồ Chí Minh', 'ko', 'delete', 'COD', NULL, '2020-02-12 16:36:43', '2020-02-12 16:08:16'),
(303, 24, 171000, 1710000, 'thanh binh', '0835400193', 'lebinh070020@gmail.com', 'vdvdvdvd,Xã Minh Xuân,Bình Chánh,Hồ Chí Minh', 'ko', 'pending', 'card', NULL, '2020-02-13 14:26:00', '2020-02-13 14:26:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orddetails`
--

CREATE TABLE `orddetails` (
  `ID` int(11) NOT NULL,
  `ordID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `amountProduct` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orddetails`
--

INSERT INTO `orddetails` (`ID`, `ordID`, `productID`, `price`, `amountProduct`, `created_at`, `updated_at`) VALUES
(222, 299, 3, 76000, 1, '2020-02-11 06:15:32', '2020-02-11 06:15:32'),
(223, 300, 4, 2476000, 1, '2020-02-11 06:16:15', '2020-02-11 06:16:15'),
(224, 300, 5, 76000, 1, '2020-02-11 06:16:15', '2020-02-11 06:16:15'),
(225, 301, 4, 2476000, 30, '2020-02-11 07:04:41', '2020-02-11 07:04:41'),
(226, 302, 85, 100000, 4, '2020-02-12 16:08:16', '2020-02-12 16:08:16'),
(227, 302, 4, 2476000, 1, '2020-02-12 16:08:16', '2020-02-12 16:08:16'),
(228, 303, 5, 720000, 1, '2020-02-13 14:26:01', '2020-02-13 14:26:01'),
(229, 303, 6, 560000, 1, '2020-02-13 14:26:01', '2020-02-13 14:26:01'),
(230, 303, 24, 320000, 1, '2020-02-13 14:26:01', '2020-02-13 14:26:01'),
(231, 303, 87, 110000, 1, '2020-02-13 14:26:01', '2020-02-13 14:26:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `producer`
--

CREATE TABLE `producer` (
  `ID` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statusID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `producer`
--

INSERT INTO `producer` (`ID`, `name`, `statusID`, `created_at`, `updated_at`) VALUES
(1, 'Holcim', 'active', NULL, '2020-02-03 06:40:50'),
(2, 'Vicem Hà Tiên', 'active', NULL, '2020-02-03 05:42:01'),
(3, 'FiCO Tây Ninh', 'active', NULL, '2020-02-03 05:43:15'),
(4, 'DULUX', 'active', NULL, '2020-02-13 06:57:17'),
(5, 'Jotun', 'active', NULL, '2020-02-03 05:43:23'),
(6, 'Mykolor (Việt -Pháp)', 'active', NULL, '2020-02-03 07:06:32'),
(7, 'Kova', 'active', NULL, NULL),
(8, 'Nippon', 'active', NULL, NULL),
(9, 'Đồng Tâm', 'active', NULL, '2020-02-03 05:01:20'),
(10, 'CMC(Phú Thọ)', 'active', NULL, '2020-02-03 05:03:02'),
(11, 'Viglacera', 'active', NULL, '2020-02-03 07:17:06'),
(12, 'Tasa', 'active', NULL, '2020-02-11 08:33:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `producerID` int(11) DEFAULT NULL,
  `amountProduct` int(11) DEFAULT 0,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT 0,
  `newPrice` int(11) DEFAULT NULL,
  `avatar` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SEO` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `StatusID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `producttype` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ID`, `categoryID`, `producerID`, `amountProduct`, `name`, `price`, `newPrice`, `avatar`, `color`, `size`, `SEO`, `StatusID`, `producttype`, `updated_at`, `created_at`) VALUES
(3, 1, 2, 120, 'Xi măng hoxim bao đỏ', 120000, 0, 'power-s.png', NULL, '50kg', 'xi-mang-hoxim-bao-do', 'active', 1, '2020-02-13 14:17:46', NULL),
(4, 6, 4, 100, 'Sơn chống thấm tường cao câp', 2476000, 0, 'dulux03.png', NULL, 'Thùng 20 Lít', 'son-chong-tham-tuong-cao-cap', 'active', 0, '2020-02-13 09:27:25', NULL),
(5, 6, 5, 20, 'SƠN JOTUN MAJESTIC NỘI THẤT', 720000, 0, 'jotun02.jpg', '5300', 'Lon 5 lít', 'son-jotun-majestic-nọi-thát', 'active', 0, '2020-02-13 12:41:05', NULL),
(6, 6, 4, 50, 'SƠN DULUX INSPIRE NGOẠI THẤT', 560000, 0, 'dulux02.png', '0537R', 'Thùng 18 lít', 'son-dulux-insprire-ngoai-that', 'active', 0, '2020-01-30 15:42:08', NULL),
(7, 6, 4, 120, 'Sơn dulux chống thấm trời', 2476000, 0, 'dulux03.png', NULL, '50kg', 'son-dulux-chong-tham-troi', 'active', 0, '2020-02-13 09:28:44', NULL),
(8, 6, 4, 40, 'DULUX PROFESSIONAL NỘI THẤT', 1140000, 0, 'dulux04.jpg', '8100R', 'Thùng 23 lít', 'dulux-professional-noi-that', 'active', 0, '2020-02-13 09:51:38', NULL),
(9, 1, 3, 100, 'Xi măng Xtra 2019', 76000, 0, 'lavilla.png', NULL, 'bao 50kg', 'xi-mang-xtra-2019', 'active', 1, '2020-02-13 12:38:28', NULL),
(10, 1, 5, 200, 'Xi măng insee chóng rong', 76000, 0, '29c52762b8705f2e066.jpg', NULL, 'bao 50kg', 'xi-mang-insee-chong-rong', 'active', 1, '2020-02-13 07:03:30', NULL),
(11, 1, 3, 100, 'XI MĂNG ĐA DỤNG INSEEFICO', 76000, 0, 'lavilla.png', NULL, 'bao 50kg', 'xi-mang-da-dung-inseefico', 'active', 1, '2020-02-13 08:33:55', NULL),
(12, 6, 5, 20, 'SƠN JOTUN MAJESTIC NỘI THẤT', 720000, 0, 'jotun03.jpg', '5300', 'Lon 5 lít', 'son-jotun-majestic-noi-that', 'active', 3, '2020-02-13 09:31:09', NULL),
(13, 6, 5, 200, 'SƠN JOTUN JOTAPLAST NỘI THẤT', 1200000, 0, 'jotun04.jpg', '2190', 'Thùng 23 lít', 'son-jotun-jotaplast-noi-that', 'active', 0, '2020-02-13 10:04:47', NULL),
(14, 6, 7, 30, 'SƠN GIẢ ĐÁ KOVA CAO CẤP', 540000, 0, 'kova01.png', 'Trắng bóng', 'Thùng 5kg', 'son-gia-da-kova-cao-cap', 'active', 0, NULL, NULL),
(15, 6, 7, 60, 'SƠN KOVA NGOẠI THẤT HYDROPRO', 0, 0, 'kova02.png', 'Trắng xanh (1603)', 'Thùng 23 lít', 'son-kova-ngoai-that-hydroproof ', 'active', 0, '2020-01-29 09:15:55', NULL),
(16, 6, 7, 30, 'KEO BÓNG NƯỚC KOVA', 150000, 0, 'kova03.png', NULL, 'Lon 1 lít', 'keo-bong-nuoc-kova', 'active', 0, NULL, NULL),
(17, 6, 7, 100, 'SƠN KOVA NỘI THẤT BÓNG K-871', 1200000, 0, 'kova04.png', '4312', 'Lon 5 lít', 'son-kova-noi-that-bong-k-871', 'active', 0, NULL, NULL),
(18, 6, 7, 20, 'CHỐNG THẤM KOVA CT-11A', 1350000, 0, 'kova05.png', '3290', 'Thùng 25 lít', 'chong-tham-kova-ct-11a', 'active', 0, '2020-01-29 07:29:58', NULL),
(19, 6, 8, 120, 'SƠN NIPPON NGOẠI  SUPER MATEX', 950000, 0, 'nippon01.png', '2890', 'Lon 5 lít', 'son-nippon-ngoai-that-super-matex', 'active', 3, '2020-02-13 07:08:44', NULL),
(20, 6, 8, 20, 'SƠN NIPPON NỘI THẤT MATEX', 1490000, 0, 'nippon01.png', '2189', 'Thùng 23 lít', 'son-nippon-no??i-tha??t-matex', 'active', 3, '2020-02-13 07:08:44', NULL),
(21, 6, 8, 300, 'SƠN NIPPON NỘI THẤT VATEX', 590000, 0, 'nippon03.png', '3478', 'Lon 5 lít', 'son-nippon-noi-that-vatex', 'active', 3, '2020-02-13 07:08:44', NULL),
(22, 6, 8, 30, 'SƠN NIPPON NỘI  CHÙI RƯẢ', 1790000, 0, 'nippon04.jpg', '1890', 'Lon 5 lít', 'Son-nippon-noi-that-chui-rua', 'active', 3, '2020-02-13 07:08:44', NULL),
(23, 5, 11, 100, 'F3630', 220000, 0, 'f3630.jpg', NULL, '110mn X 110mn', 'f3630', 'active', 0, '2020-01-28 15:09:35', NULL),
(24, 5, 11, 300, 'F3620', 320000, 0, 'f3620.jpg', NULL, '130mm X 130mm', '3620', 'active', 0, '2020-01-29 07:39:48', NULL),
(25, 5, 11, 300, 'KT3694', 0, 0, 'kt3694.jpg\r\n', NULL, '', 'kt-3694', 'active', 2, '2020-02-03 07:18:15', NULL),
(26, 5, 11, 200, 'Gạch ốp tường UB3604A', 450000, 0, 'ub3604a.jpg', NULL, '150mm x 150mm', 'ub-3604a', 'active', 2, '2020-02-06 04:28:15', NULL),
(27, 5, 11, 40, 'Gạch Ốp Tường UB3602', 290000, 0, 'ub3602.jpg', NULL, '110mm x 110mm', 'ub-3602', 'active', 2, '2020-02-06 04:28:15', NULL),
(28, 5, 9, 200, 'Gạch Đồng Tâm 8080DB032-NANO', 590000, 0, 'gach-dong-tam-8080-8080db032-nano.jpg', NULL, '80mm x 80mm', 'gach-dong-tam-8080DB032-nan', 'stop', 0, '2020-01-29 14:26:11', NULL),
(29, 2, 9, 270000, 'Đồng Tâm 8080CARARAS002-FP-H+', 190000, 0, 'gach-dong-tam-8080napoleon009-h.jpg', '', '80mm x 80mm', 'dong-tam-8080cararas002-fp-h+', 'active', 2, '2020-02-06 04:28:15', NULL),
(30, 5, 9, 200, 'Đồng Tâm 6060WOOD001', 280000, 0, 'gach-lat-nen-dong-tam-6060wood001.jpg', NULL, '60mm x 60mm', 'dong-tam-6060wood001', 'active', 2, '2020-02-06 04:28:15', NULL),
(78, 3, 10, 3, 'Sản phẩm ọ', 44, NULL, 'logo-5002.png', '@22', 'bao 50kg', 'san-pham-o', 'stop', 0, '2020-01-28 15:09:48', '2020-01-28 15:06:26'),
(79, 3, 10, 3, 'Sản phẩm ọ', 44, NULL, 'logo-5002.png', '@22', 'bao 50kg', 'san-pham-o', 'stop', 0, '2020-01-28 15:10:00', '2020-01-28 15:06:52'),
(80, 3, 3, 5, '@@@@@', 33, NULL, 'logo-5002.png', 'color', 'Lon 5 lít', '@@@@@', 'stop', 0, '2020-01-28 15:23:02', '2020-01-28 15:18:11'),
(81, 4, 9, 9, 'Cam ggege wfw', 3, NULL, 'product05.png', '6381R', 'Lon 5 lít', 'cam-ggege-wfw', 'stop', 0, '2020-02-05 15:49:49', '2020-01-28 15:21:20'),
(82, 1, 3, 34, 'clml', 23, NULL, 'favicon.ico', NULL, NULL, 'clml', 'stop', 0, '2020-01-30 02:19:45', '2020-01-30 02:19:22'),
(83, 6, 7, 23, 'ugsghsghsgyh', 11111, NULL, 'images (5).jpg', '6381R', 'Lon 5 lít', 'ugsghsghsgyh', 'stop', 0, '2020-02-04 15:32:52', '2020-02-04 15:32:37'),
(84, 3, 1, 100, 'Đá bi', 220000, NULL, 'da0x4-1.png', 'Xanh đen', 'Khối', 'da-bi', 'active', 0, '2020-02-06 05:32:58', '2020-02-06 05:32:58'),
(85, 3, 2, 100, 'Đá 0x4', 100000, NULL, 'da4x6.png', NULL, 'khối', 'da-0x4', 'active', 0, '2020-02-06 05:34:23', '2020-02-06 05:34:23'),
(86, 3, 2, 100, 'Đá 0x2', 250000, NULL, 'dalytam-600x535.jpg', NULL, 'Khối', 'da-0x2', 'active', 0, '2020-02-06 05:35:31', '2020-02-06 05:35:31'),
(87, 4, 1, 10, 'Cát mịn nhân tạo', 110000, NULL, 'bang-bao-gia-cat-xay-to-600x250.jpg', 'vàn', 'Khối', 'cat-min-nhan-tao', 'active', 0, '2020-02-10 06:54:05', '2020-02-06 06:06:08'),
(88, 3, 12, 23, 'Đá', 123, NULL, 'product09.png', NULL, 'Khối', 'da', 'stop', 0, '2020-02-13 14:51:29', '2020-02-13 14:50:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `province`
--

CREATE TABLE `province` (
  `ID` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `province`
--

INSERT INTO `province` (`ID`, `name`) VALUES
(1, 'Hồ Chí Minh'),
(2, 'Hà Nội'),
(3, 'Bình Dương'),
(4, 'Đa Nắng'),
(5, 'Hải Phòng'),
(6, 'Long An'),
(7, 'Bà Rịa Vũng Tàu'),
(8, 'An Giang'),
(9, 'Bắc Giang'),
(10, 'Bắc Kan'),
(11, 'Bạc Liêu'),
(12, 'Bắc Ninh'),
(13, 'Bến Tre'),
(14, 'Bình Định');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `ID` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `guide` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `slider` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `review`
--

INSERT INTO `review` (`ID`, `productID`, `title`, `description`, `guide`, `slider`, `updated_at`, `created_at`) VALUES
(19, 3, '<p>jobrngrygrygrhgyrhgryghryghry</p>', '<p>drgrgrgr</p>', '<p>grgrgrgrg</p>', NULL, '2020-02-13 14:17:46', '2020-01-28 15:06:27'),
(20, 79, '<p>&nbsp;</p>\n\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>', '<p>&nbsp;</p>\n\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>', '<p>&nbsp;</p>\n\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>', NULL, '2020-01-28 15:06:53', '2020-01-28 15:06:53'),
(21, 80, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>', NULL, '2020-01-28 15:19:47', '2020-01-28 15:18:12'),
(22, 81, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>', NULL, '2020-02-05 15:48:52', '2020-01-28 15:21:21'),
(23, 82, NULL, NULL, NULL, NULL, '2020-01-30 02:19:22', '2020-01-30 02:19:22'),
(24, 83, '<p>kkkkk</p>', '<p>ooo</p>', '<p>ooouuuu</p>', NULL, '2020-02-04 15:32:37', '2020-02-04 15:32:37'),
(25, 84, NULL, NULL, NULL, NULL, '2020-02-06 05:32:59', '2020-02-06 05:32:59'),
(26, 85, NULL, NULL, NULL, NULL, '2020-02-06 05:34:23', '2020-02-06 05:34:23'),
(27, 86, NULL, NULL, NULL, NULL, '2020-02-06 05:35:31', '2020-02-06 05:35:31'),
(28, 87, NULL, '<p>Th&agrave;nh phần phổ biến nhất của c&aacute;t tại c&aacute;c m&ocirc;i trường đất liền trong lục địa v&agrave; c&aacute;c m&ocirc;i trường kh&ocirc;ng phải duy&ecirc;n hải khu vực nhiệt đới l&agrave; silica (đi&ocirc;x&iacute;t silic hay SiO2), thường ở dạng thạch anh, l&agrave; chất với độ trơ về mặt h&oacute;a học cũng như do c&oacute; độ cứng đ&aacute;ng kể, n&ecirc;n c&oacute; khả năng chống phong h&oacute;a kh&aacute; tốt. Tuy nhi&ecirc;n, th&agrave;nh phần hợp th&agrave;nh của c&aacute;t c&oacute; sự biến động lớn, phụ thuộc v&agrave;o c&aacute;c nguồn đ&aacute; v&agrave; c&aacute;c điều kiện kh&aacute;c tại khu vực. C&aacute;c loại c&aacute;t trắng t&igrave;m thấy ở c&aacute;c v&ugrave;ng duy&ecirc;n hải nhiệt đới v&agrave; cận nhiệt đới l&agrave; đ&aacute; v&ocirc;i bị x&oacute;i m&ograve;n v&agrave; c&oacute; thể chứa c&aacute;c mảnh vụn từ san h&ocirc; hay mai (vỏ) của động vật c&ugrave;ng c&aacute;c vật liệu hữu cơ hay c&oacute; nguồn gốc hữu cơ kh&aacute;c.[1] C&aacute;c đụn c&aacute;t thạch cao ở Di t&iacute;ch quốc gia White Sands tại bang New Mexico (Hoa Kỳ) nổi tiếng v&igrave; m&agrave;u trắng ch&oacute;i của n&oacute;. Acco (arkose) l&agrave; c&aacute;t hay sa thạch với h&agrave;m lượng fenspat đ&aacute;ng kể, c&oacute; nguồn gốc từ qu&aacute; tr&igrave;nh phong h&oacute;a v&agrave; x&oacute;i m&ograve;n của đ&aacute; granit (thường l&agrave; cận kề). Một v&agrave;i loại c&aacute;t c&ograve;n chứa manh&ecirc;tit, chlorit, glauconit hay thạch cao. C&aacute;t gi&agrave;u manh&ecirc;tit c&oacute; m&agrave;u từ sẫm tới đen, giống như c&aacute;t c&oacute; nguồn gốc từ đ&aacute; bazan n&uacute;i lửa v&agrave; opxidian (obsidian). C&aacute;t chứa chlorit-glauconit th&ocirc;ng thường c&oacute; m&agrave;u xanh lục (c&ograve;n được gọi l&agrave; c&aacute;t lục), như c&aacute;t c&oacute; nguồn gốc từ bazan (dung nham) với h&agrave;m lượng olivin lớn. Nhiều loại c&aacute;t, đặc biệt c&aacute;t ở Nam &Acirc;u, chứa c&aacute;c tạp chất sắt trong c&aacute;c tinh thể thạch anh của c&aacute;t, tạo ra c&aacute;t c&oacute; m&agrave;u v&agrave;ng sẫm. C&aacute;t trầm lắng tại một số khu vực chứa ngọc hồng lựu v&agrave; một số kho&aacute;ng vật c&oacute; sức kh&aacute;ng phong h&oacute;a tốt, bao gồm một lượng nhỏ c&aacute;c loại đ&aacute; qu&yacute;. C&aacute;t được gi&oacute; v&agrave; nước vận chuyển đi v&agrave; trầm lắng th&agrave;nh c&aacute;c dạng b&atilde;i biển, b&atilde;i s&ocirc;ng, cồn c&aacute;t, đụn c&aacute;t, b&atilde;i c&aacute;t ngầm v.v. FacebookTwitterPinterestTumblrRedditLinkedInShare<br />\n<br />\nRead more at: https://namthanhvinh.vn/tim-hieu-ve-cat-cac-thanh-phan-cua-cat-xay-dung/?gclid=EAIaIQobChMIlvnZ8LLG5wIVVqWWCh1OogfREAAYASAAEgISuvD_BwE</p>', NULL, NULL, '2020-02-10 06:54:05', '2020-02-06 06:06:08'),
(29, 4, NULL, NULL, NULL, NULL, '2020-02-13 09:27:26', '2020-02-13 09:19:55'),
(30, 7, NULL, NULL, NULL, NULL, '2020-02-13 09:28:45', '2020-02-13 09:28:45'),
(31, 5, NULL, NULL, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>s</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>', NULL, '2020-02-13 12:41:05', '2020-02-13 09:29:57'),
(32, 12, '<p>dvege</p>', '<p>dgee</p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>s</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>', NULL, '2020-02-13 09:31:09', '2020-02-13 09:30:50'),
(33, 8, NULL, NULL, NULL, NULL, '2020-02-13 09:51:38', '2020-02-13 09:48:55'),
(34, 9, NULL, NULL, NULL, NULL, '2020-02-13 12:38:28', '2020-02-13 09:50:38'),
(35, 13, NULL, NULL, NULL, NULL, '2020-02-13 10:04:48', '2020-02-13 10:04:04'),
(36, 88, NULL, NULL, NULL, NULL, '2020-02-13 14:51:00', '2020-02-13 14:51:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `ID` int(11) NOT NULL,
  `img` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `StatusID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`ID`, `img`, `StatusID`, `created_at`, `updated_at`) VALUES
(1, 'slide-1.png', 'active', NULL, '2020-02-05 05:05:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `town`
--

CREATE TABLE `town` (
  `ID` int(11) NOT NULL,
  `districtID` int(11) DEFAULT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `town`
--

INSERT INTO `town` (`ID`, `districtID`, `name`) VALUES
(1, 1, 'Thị Trấn Tân Túc'),
(2, 1, 'Xã An Phú Tây'),
(3, 1, 'Xã Bình Chánh'),
(4, 1, 'Xã Bình Hưng'),
(5, 1, 'Xã Bình Lợi'),
(6, 1, 'Xã Đa Phước'),
(7, 1, 'Xã Hưng Long'),
(8, 1, 'Xã Minh Xuân'),
(9, 1, 'Xã Phạm Văn Hai'),
(10, 1, 'Xã  Phong Phú'),
(11, 1, ' Xã Quy Đức'),
(12, 1, 'Xã Tân Kiên'),
(13, 1, 'Xã Vĩnh Lộc A'),
(14, 1, 'Xã Vinh Lộc B');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `website`
--

CREATE TABLE `website` (
  `StatusID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `website`
--

INSERT INTO `website` (`StatusID`) VALUES
(1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `levelsID` (`levelsID`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `cmt`
--
ALTER TABLE `cmt`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `productID` (`productID`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `provinceID` (`provinceID`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `introduce`
--
ALTER TABLE `introduce`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `ord`
--
ALTER TABLE `ord`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `customerID` (`customerID`);

--
-- Chỉ mục cho bảng `orddetails`
--
ALTER TABLE `orddetails`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ordID` (`ordID`),
  ADD KEY `productID` (`productID`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `producerID` (`producerID`);

--
-- Chỉ mục cho bảng `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `productID` (`productID`);

--
-- Chỉ mục cho bảng `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`,`instance`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `districtID` (`districtID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `cmt`
--
ALTER TABLE `cmt`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `district`
--
ALTER TABLE `district`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `introduce`
--
ALTER TABLE `introduce`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `notification`
--
ALTER TABLE `notification`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `ord`
--
ALTER TABLE `ord`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT cho bảng `orddetails`
--
ALTER TABLE `orddetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT cho bảng `producer`
--
ALTER TABLE `producer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT cho bảng `province`
--
ALTER TABLE `province`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `review`
--
ALTER TABLE `review`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `town`
--
ALTER TABLE `town`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`levelsID`) REFERENCES `levels` (`ID`);

--
-- Các ràng buộc cho bảng `cmt`
--
ALTER TABLE `cmt`
  ADD CONSTRAINT `cmt_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`ID`);

--
-- Các ràng buộc cho bảng `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`provinceID`) REFERENCES `province` (`ID`);

--
-- Các ràng buộc cho bảng `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`ID`);

--
-- Các ràng buộc cho bảng `ord`
--
ALTER TABLE `ord`
  ADD CONSTRAINT `ord_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`ID`);

--
-- Các ràng buộc cho bảng `orddetails`
--
ALTER TABLE `orddetails`
  ADD CONSTRAINT `orddetails_ibfk_1` FOREIGN KEY (`ordID`) REFERENCES `ord` (`ID`),
  ADD CONSTRAINT `orddetails_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`ID`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`ID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`producerID`) REFERENCES `producer` (`ID`);

--
-- Các ràng buộc cho bảng `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`ID`);

--
-- Các ràng buộc cho bảng `town`
--
ALTER TABLE `town`
  ADD CONSTRAINT `town_ibfk_1` FOREIGN KEY (`districtID`) REFERENCES `district` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

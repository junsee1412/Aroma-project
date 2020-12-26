-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 26, 2020 lúc 01:40 PM
-- Phiên bản máy phục vụ: 10.4.16-MariaDB
-- Phiên bản PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `Aroma`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `aromaorder`
--

CREATE TABLE `aromaorder` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `ngay` int(11) NOT NULL,
  `stt` tinyint(1) NOT NULL DEFAULT 0,
  `totalprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `aromaorder`
--

INSERT INTO `aromaorder` (`id`, `iduser`, `ngay`, `stt`, `totalprice`) VALUES
(2, 1, 1607954296, 2, 1090),
(3, 1, 1607957394, 2, 8460),
(4, 1, 1607957490, 2, 420),
(5, 3, 1608020375, 2, 470),
(6, 3, 1608127653, 2, 470);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `aromaorderdetail`
--

CREATE TABLE `aromaorderdetail` (
  `id` int(11) NOT NULL,
  `idorder` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `aromaorderdetail`
--

INSERT INTO `aromaorderdetail` (`id`, `idorder`, `idproduct`, `amount`, `price`) VALUES
(6, 2, 33, 1, 420),
(7, 2, 34, 1, 670),
(8, 3, 33, 1, 420),
(9, 3, 34, 12, 8040),
(10, 4, 33, 1, 420),
(11, 5, 32, 1, 470),
(12, 6, 32, 1, 470);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Bend Goods'),
(2, 'Bendo'),
(4, 'Carl Hansen & Son'),
(5, 'Ciseal'),
(6, 'Closed Mondays'),
(7, 'Fire Road'),
(8, 'Form + Refine'),
(9, 'Graf Lantz'),
(10, 'Heymat'),
(11, 'Hollis + morris'),
(12, 'House Raccoon'),
(13, 'Hue Minimal'),
(14, 'KOMOLAB'),
(15, 'Lawa Design'),
(16, 'MadebyPen'),
(17, 'MENU'),
(18, 'Minna Goods'),
(19, 'Ohio Workshop'),
(20, 'Portego'),
(21, 'Pretti.Cool'),
(22, 'Puik Design'),
(23, 'ROIJE'),
(25, 'Sibast Furniture'),
(26, 'Slash Objects'),
(27, 'Studio Variously'),
(28, 'TAMEN'),
(29, 'TIIPOI'),
(30, 'Willow & Stump Design Co.'),
(31, 'Yvonne Mouser');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Chairss'),
(3, 'Rugs + Flooring'),
(5, 'Storage + Organization'),
(6, 'Table'),
(15, 'Mirror');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `content` varchar(300) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `timea` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idcmt` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `idproduct`, `content`, `timea`, `iduser`, `idcmt`) VALUES
(1, 32, 'yo', 1604220600, 2, 0),
(2, 50, 'mlem', 1604220915, 2, 0),
(3, 50, 'hahah', 1604220927, 2, 0),
(4, 51, 'hahaha', 1604220946, 2, 0),
(5, 32, 'mlem', 1604222960, 2, 0),
(6, 32, 'hahah', 1604222984, 1, 0),
(7, 206, 'mlem', 1604303775, 1, 0),
(8, 206, 'hahaha', 1604303783, 1, 0),
(9, 32, '1243324', 1604634512, 3, 0),
(10, 161, 'hhh', 1604642701, 3, 0),
(11, 32, 'shop', 1604899903, 3, 0),
(12, 33, 'kkkk', 1605599245, 3, 0),
(13, 33, 'hahaha', 1605599251, 3, 0),
(15, 50, 'mlem', 1607944054, 3, 3),
(16, 33, 'hmmm', 1607945021, 3, 13),
(17, 33, 'haha', 1607945103, 3, 13),
(18, 33, 'run', 1607945116, 3, 13),
(19, 33, 'reply láº¡i :v', 1607945200, 3, 12),
(20, 33, 'haha', 1607945226, 3, 12),
(21, 32, 'haha', 1607945292, 3, 11),
(22, 36, 'LOLO', 1607945623, 1, 0),
(23, 36, 'rep', 1607945639, 3, 22),
(24, 206, 'haha', 1608015980, 3, 8),
(25, 36, 'haha', 1608128175, 3, 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `idcategory` int(11) NOT NULL,
  `idbrand` int(11) NOT NULL,
  `img` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `price` int(11) NOT NULL,
  `remain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `idcategory`, `idbrand`, `img`, `detail`, `price`, `remain`) VALUES
(32, 'Single Bucket Stool', 5, 1, '/code/midex/asset/img/yvonne-mouser-single-bucket-stool-design.webp', 'a th a haha aaa', 470, 100),
(33, 'Step Bucket Stool', 1, 1, '/code/midex/asset/img/yvonne-mouser-step-bucket-stool.jpg', '', 420, 100),
(34, 'Long Bucket Stool', 1, 31, '/code/midex/asset/img/yvonne-mouser-bench-bucket-bench.jpg', '', 670, 100),
(35, 'Yosegi Japanese-Style Multi-Functional Inlaid Stools', 1, 28, '/code/midex/asset/img/tamen-furniture-yosegi-japanese-style-multi-functional-inlaid-stools.jpg', '', 2500, 100),
(36, 'Dost Steel Footstool', 1, 22, '/code/midex/asset/img/puik-design-furniture-light-grey-dost-steel-footstool.jpg', '', 278, 100),
(37, 'Dost Wood Footstool', 1, 22, '/code/midex/asset/img/puik-design-furniture-light-gray-dost-wood-footstool.jpg', '', 367, 100),
(38, 'The Parkdale Stool', 1, 11, '/code/midex/asset/img/hollis-morris-furniture-the-parkdale-stool.jpg', '', 925, 100),
(39, 'Wallace Chair', 1, 11, '/code/midex/asset/img/hollis-morris-furniture-wallace-chair.jpg', '', 550, 100),
(40, 'Parkdale Dining Chair', 1, 11, '/code/midex/asset/img/hollis-morris-furniture-parkdale-dining-chair.jpg', '', 895, 100),
(41, 'Oldtown Stool', 1, 11, '/code/midex/asset/img/hollis-morris-furniture-oldtown-stool.jpg', '', 1800, 100),
(42, 'The Parkdale Bench', 1, 11, '/code/midex/asset/img/hollis-morris-furniture-the-parkdale-bench.jpg', '', 1250, 100),
(43, 'The Parkdale Console', 1, 11, '/code/midex/asset/img/hollis-morris-furniture-the-parkdale-console.jpg', '', 1900, 100),
(44, 'The Corktown Stool', 1, 11, '/code/midex/asset/img/hollis-morris-furniture-the-corktown-stool.jpg', '', 550, 100),
(45, 'The Squaretown Stool', 1, 11, '/code/midex/asset/img/hollis-morris-furniture-the-squaretown-stool.jpg', '', 1700, 100),
(46, 'Black-stained Oak Motif Armchair', 1, 8, '/code/midex/asset/img/form-refine-furniture-motif-armchair-black-stained-oak.jpg', '', 800, 100),
(47, 'Oak Motif Armchair', 1, 8, '/code/midex/asset/img/form-refine-furniture-motif-armchair-oak.jpg', '', 800, 100),
(48, 'White Oak Motif Armchair', 1, 8, '/code/midex/asset/img/form-refine-furniture-motif-armchair-white-oak.jpg', '', 800, 100),
(49, 'Origin Lounge Chair', 1, 8, '/code/midex/asset/img/form-refine-furniture-origin-lounge-chair.jpg', '', 3300, 100),
(50, 'CH24 Wishbone Soft Black Chair', 1, 4, '/code/midex/asset/img/carl-hansen-son-furniture-ch24-wishbone-soft-black-chair.jpg', '', 625, 100),
(51, 'CH24 Wishbone Soft Gray Chair', 1, 4, '/code/midex/asset/img/carl-hansen-son-furniture-ch24-wishbone-soft-gray-chair.jpg', '', 625, 100),
(52, 'CH24 Wishbone Soft Green Chair', 1, 4, '/code/midex/asset/img/carl-hansen-son-furniture-ch24-wishbone-soft-green-chair.jpg', '', 625, 100),
(53, 'CH24 Wishbone Soft Red Chair', 1, 4, '/code/midex/asset/img/carl-hansen-son-furniture-ch24-wishbone-soft-red-chair.jpg', '', 625, 100),
(54, 'CH24 Wishbone Soft White Chair', 1, 4, '/code/midex/asset/img/carl-hansen-son-furniture-ch24-wishbone-soft-white-chair.jpg', '', 625, 100),
(55, 'Sweet Stool', 1, 1, '/code/midex/asset/img/bend-goods-furniture-aqua-sweet-stool.jpg', '', 570, 100),
(56, 'Rachel Dining Chair', 1, 1, '/code/midex/asset/img/bend-goods-furniture-black-rachel-dining-chair.jpg', '', 290, 100),
(57, 'Stacking Counter Lucy Stool', 1, 1, '/code/midex/asset/img/bend-goods-furniture-black-stacking-counter-lucy-stool.jpg', '', 490, 100),
(58, 'Stacking Lucy Bar Stool', 1, 1, '/code/midex/asset/img/bend-goods-furniture-black-stacking-lucy-bar-stool.jpg', '', 510, 100),
(59, 'Stick Bar Stool', 1, 1, '/code/midex/asset/img/bend-goods-furniture-black-stick-bar-stool.jpg', '', 410, 100),
(60, 'Wood + Wire Chair', 1, 1, '/code/midex/asset/img/bend-goods-furniture-black-wood-wire-chair.jpg', '', 380, 100),
(61, 'Lucy Bar Stool', 1, 1, '/code/midex/asset/img/bend-goods-furniture-white-lucy-bar-stool.jpg', '', 490, 100),
(62, 'Jaali Rug', 3, 27, '/code/midex/asset/img/studio-variously-rugs-flooring-jaali-rug.webp', '', 649, 100),
(63, 'Kala Rug', 3, 27, '/code/midex/asset/img/studio-variously-rugs-flooring-kala-rug.webp', '', 449, 100),
(64, 'Jamakhan Line Rug', 3, 29, '/code/midex/asset/img/tiipoi-rugs-flooring-jamakhan-line-rug.webp', '', 245, 100),
(65, 'Jamakhan Stripe Rug', 3, 29, '/code/midex/asset/img/tiipoi-rugs-flooring-grey-jamakhan-stripe-rug.webp', '', 170, 100),
(66, 'Gelosie Rug', 3, 20, '/code/midex/asset/img/portego-rugs-flooring-gelosie-rug.webp', '', 6750, 100),
(67, 'Oci Rug Set', 3, 20, '/code/midex/asset/img/portego-rugs-flooring-oci-rug-set.webp', '', 3065, 100),
(68, 'Sottoportico Rug', 3, 20, '/code/midex/asset/img/portego-rugs-flooring-sottoportico-rug.webp', '', 4075, 100),
(69, 'Oci Center Rug', 3, 20, '/code/midex/asset/img/portego-rugs-flooring-150x280-green-brick-oci-center-rug.webp', '', 1285, 100),
(70, 'Oci Left Rug', 3, 20, '/code/midex/asset/img/portego-rugs-flooring-oci-left-rug.webp', '', 1285, 100),
(71, 'Oci Right Rug', 3, 20, '/code/midex/asset/img/portego-rugs-flooring-70x130-orange-pink-oci-right-rug.webp', '', 1285, 100),
(72, 'Royal Capsule Floor Mat', 3, 26, '/code/midex/asset/img/slash-objects-rugs-flooring-royal-capsule-floor-mat.webp', '', 74, 100),
(73, 'Sand Capsule Floor Mat', 3, 26, '/code/midex/asset/img/slash-objects-rugs-flooring-18-x30-sand-capsule-floor-mat.webp', '', 74, 100),
(74, 'Speckled Black Capsule Floor Mat', 3, 26, '/code/midex/asset/img/slash-objects-rugs-flooring-18-x30-speckled-black-capsule-floor-mat.webp', '', 74, 100),
(75, 'Gris Capsule Floor Mat', 3, 26, '/code/midex/asset/img/slash-objects-floor-mats-capsule-floor-mat-in-gris.webp', '', 74, 100),
(76, 'Gris Half Capsule Floor Mat', 3, 26, '/code/midex/asset/img/slash-objects-rugs-flooring-gris-half-capsule-floor-mat.webp', '', 259, 100),
(77, 'Royal Half Capsule Floor Mat', 3, 26, '/code/midex/asset/img/slash-objects-rugs-flooring-royal-half-capsule-floor-mat.webp', '', 259, 100),
(78, 'Sand Half Capsule Floor Mat', 3, 26, '/code/midex/asset/img/slash-objects-rugs-flooring-sand-half-capsule-floor-mat.webp', '', 259, 100),
(79, 'Speckled Black Half Capsule Floor Mat', 3, 26, '/code/midex/asset/img/slash-objects-rugs-flooring-speckled-black-half-capsule-floor-mat.webp', '', 259, 100),
(80, 'Gris Half Circle Mat', 3, 20, '/code/midex/asset/img/slash-objects-rugs-flooring-gris-half-circle-mat.webp', '', 90, 100),
(81, 'Royal Half Circle Mat', 3, 20, '/code/midex/asset/img/slash-objects-rugs-flooring-royal-half-circle-mat-in-royal.webp', '', 90, 100),
(82, 'Sand Half Circle Mat', 3, 20, '/code/midex/asset/img/slash-objects-rugs-flooring-sand-half-circle-mat.webp', '', 90, 100),
(83, 'Speckled Black Half Circle Mat', 3, 20, '/code/midex/asset/img/slash-objects-rugs-flooring-speckled-black-half-circle-mat.webp', '', 90, 100),
(84, 'Gris Rectangle Floor Mat', 3, 20, '/code/midex/asset/img/slash-objects-rugs-flooring-18-x30-gris-rectangle-floor-mat.webp', '', 74, 100),
(85, 'Royal Rectangle Floor Mat', 3, 20, '/code/midex/asset/img/slash-objects-rugs-flooring-18-x30-royal-rectangle-floor-mat.webp', '', 74, 100),
(86, 'Sand Rectangle Floor Mat', 3, 20, '/code/midex/asset/img/slash-objects-rugs-flooring-18-x30-sand-rectangle-floor-mat.webp', '', 74, 100),
(87, 'Speckled Black Rectangle Floor Mat', 3, 20, '/code/midex/asset/img/slash-objects-rugs-flooring-18-x30-speckled-black-rectangle-floor-mat.webp', '', 74, 100),
(88, 'Dis Ocean Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-dis-ocean-mat.webp', '', 150, 100),
(89, 'Dis Moss Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-dis-moss-mat.webp', '', 150, 100),
(90, 'Dis Rust Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-dis-rust-mat.webp', '', 150, 100),
(91, 'Foliage Green Dawn Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-foliage-green-dawn-mat.webp', '', 150, 100),
(92, 'Foliage Silver Night Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-foliage-mat-silver-dusk.webp', '', 150, 100),
(93, 'Foliage Blue Dusk Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-foliage-blue-dusk-mat.webp', '', 150, 100),
(94, 'Hagl Blush Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-60cm-x-85cm-hagl-blush-mat.webp', '', 150, 100),
(95, 'Hagl Silver Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-45cm-x-100cm-hagl-silver-mat.webp', '', 150, 100),
(96, 'Hagl Black Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-60cm-x-85cm-hagl-black-mat.webp', '', 150, 100),
(97, 'Eine Nightfall Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-85cm-x-115cm-eine-nightfall-mat.webp', '', 150, 100),
(98, 'Eine Dawn Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-60cm-x-85cm-eine-dawn-mat.webp', '', 150, 100),
(99, 'Eine Noon Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-60cm-x-85-cm-eine-noon-mat.webp', '', 150, 100),
(100, 'Loype Cloudy Grey Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-60cm-x-85cm-loype-cloudy-grey-mat.webp', '', 150, 100),
(101, 'Loype Stormy Blue Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-60cm-x-85cm-loype-stormy-blue-mat.webp', '', 150, 100),
(102, 'Loype Sunny Yellow Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-60cm-x-85cm-loype-sunny-yellow-mat.webp', '', 150, 100),
(103, 'Loype Breezy Beige Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-loype-breezy-beige-mat.webp', '', 150, 100),
(104, 'Blane Spring Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-60cm-x-85cm-blane-spring-mat.webp', '', 150, 100),
(105, 'Blane Summer Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-60cm-x-85cm-blane-summer-mat.webp', '', 150, 100),
(106, 'Blane Winter Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-60cm-x-85cm-blane-winter-mat.webp', '', 150, 100),
(107, 'Blane Fall Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-60cm-x-85cm-blane-fall-mat.webp', '', 150, 100),
(108, 'Stein Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-60cm-x-90cm-stein-mat.webp', '', 185, 100),
(109, 'Sjo Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-60cm-x-90cm-sjo-mat.webp', '', 185, 100),
(110, 'Stra Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-60cm-x-90cm-stra-mat.webp', '', 185, 100),
(111, 'Sand Mat', 3, 10, '/code/midex/asset/img/heymat-rugs-flooring-87cm-x-130cm-sand-mat.webp', '', 185, 100),
(112, 'Dusk Stacks Rug', 3, 18, '/code/midex/asset/img/minna-goods-rugs-flooring-6x9-dusk-stacks-rug.webp', '', 1480, 100),
(113, 'Oat Stacks Rug', 3, 18, '/code/midex/asset/img/minna-goods-rug-2x3-oat-stacks-rug.webp', '', 280, 100),
(114, 'Spring Stacks Rug', 3, 18, '/code/midex/asset/img/minna-goods-rugs-flooring-4x6-spring-stacks-rug.webp', '', 880, 100),
(115, 'Rust Moon Pile Rug', 3, 18, '/code/midex/asset/img/minna-goods-rug-3x5-rust-moon-pile-rug.webp', '', 780, 100),
(116, 'Grey Moon Rug', 3, 18, '/code/midex/asset/img/minna-goods-rug-3-x-5-grey-moon-rug.webp', '', 550, 100),
(117, 'Grey Moon Pile Rug', 3, 18, '/code/midex/asset/img/minna-goods-rug-2x3-grey-moon-pile-rug.webp', '', 380, 100),
(118, 'Oat Lines Pile Rug', 3, 18, '/code/midex/asset/img/minna-goods-rug-5x7-oat-lines-pile-rug.webp', '', 1780, 100),
(119, 'Dusk Lines Rug', 3, 18, '/code/midex/asset/img/minna-goods-rugs-flooring-3x5-dusk-lines-rug.webp', '', 480, 100),
(120, 'Dusk Lines Pile Rug', 3, 18, '/code/midex/asset/img/minna-goods-rugs-flooring-3x5-dusk-lines-pile-rug.webp', '', 780, 100),
(121, 'Oat Lines Rug', 3, 18, '/code/midex/asset/img/minna-goods-rugs-flooring-2x3-oat-lines-rug.webp', '', 280, 100),
(122, 'Spring Lines Rug', 3, 18, '/code/midex/asset/img/minna-goods-rug-6x9-spring-lines-rug.webp', '', 1480, 100),
(123, 'Oat Frames Rug', 3, 18, '/code/midex/asset/img/minna-goods-rug-5x7-oat-frames-rug.webp', '', 1280, 100),
(124, 'Spring Frames Rug', 3, 18, '/code/midex/asset/img/minna-goods-rugs-flooring-2x3-spring-frames-rug.webp', '', 280, 100),
(125, 'Dusk Frames Rug', 3, 18, '/code/midex/asset/img/minna-goods-rugs-flooring-3x5-dusk-frames-rug.webp', '', 480, 100),
(126, 'Rust Cubitos Rug', 3, 18, '/code/midex/asset/img/minna-goods-rugs-flooring-6-x-9-rust-cubitos-rug.webp', '', 2200, 100),
(127, 'Bright Dream Rug', 3, 18, '/code/midex/asset/img/minna-goods-rugs-flooring-2-x-3-bright-dream-rug.webp', '', 300, 100),
(128, 'Grey Dream Rug', 3, 18, '/code/midex/asset/img/minna-goods-rug-6-x-9-grey-dream-rug.webp', '', 1500, 100),
(129, 'Indigo Cubitos Rug', 3, 18, '/code/midex/asset/img/minna-goods-rugs-flooring-8-x-10-indigo-cubitos-rug.webp', '', 2950, 100),
(130, 'Shapes Handwoven Mat', 3, 18, '/code/midex/asset/img/minna-goods-rugs-flooring-shapes-handwoven-mat.webp', '', 180, 100),
(131, 'Split Mat', 3, 18, '/code/midex/asset/img/minna-goods-rugs-flooring-21-x33-split-mat.webp', '', 180, 100),
(132, 'Midnight Steps Mat', 3, 18, '/code/midex/asset/img/minna-goods-rugs-flooring-midnight-steps-mat.webp', '', 180, 100),
(133, 'Beige Steps Mat', 3, 18, '/code/midex/asset/img/minna-goods-rugs-flooring-beige-steps-mat.webp', '', 180, 100),
(134, '8 Mini Wire Basket', 5, 1, '/code/midex/asset/img/bend-goods-storage-organization-copper-8-mini-wire-basket.webp', '', 140, 100),
(135, '18 Wire Basket', 5, 1, '/code/midex/asset/img/bend-goods-storage-organization-18-wire-basket.webp', '', 290, 100),
(136, '22 Wire Basket', 5, 1, '/code/midex/asset/img/bend-goods-storage-organization-copper-22-wire-basket.webp', '', 290, 100),
(137, 'TRASH Waste Paper Basket', 5, 2, '/code/midex/asset/img/bendo-storage-organization-trash-waste-paper-basket.webp', '', 55, 100),
(138, 'MAG Magazine Rack', 5, 2, '/code/midex/asset/img/bendo-storage-organization-black-mag-magazine-rack.webp', '', 77, 100),
(139, 'CRATE Storage Bin', 5, 2, '/code/midex/asset/img/bendo-storage-organization-black-crate-storage-bin.webp', '', 99, 100),
(140, 'CRATE MINI Storage Bin', 5, 2, '/code/midex/asset/img/bendo-storage-organization-copper-crate-mini-storage-bin.webp', '', 55, 100),
(141, 'Mission Firewood Holder', 5, 5, '/code/midex/asset/img/ciseal-storage-organization-mission-firewood-holder.webp', '', 300, 100),
(142, 'Aspen Magazine Rack', 5, 5, '/code/midex/asset/img/ciseal-storage-organization-aspen-magazine-rack.jpg', '', 290, 100),
(143, 'Plane 3 Wall Hook', 5, 7, '/code/midex/asset/img/fire-road-storage-organization-white-white-oak-plane-3-wall-hook.jpg', '', 65, 100),
(144, 'Plane 5 Wall Hook', 5, 7, '/code/midex/asset/img/fire-road-storage-organization-black-white-oak-plane-5-wall-hook.jpg', '', 95, 100),
(145, 'Plane Set of 3 Single Wall Hooks', 5, 7, '/code/midex/asset/img/fire-road-storage-organization-plane-set-of-3-single-wall-hooks.jpg', 'haha aa', 80, 100),
(146, 'Plane Single Wall Hook', 5, 7, '/code/midex/asset/img/fire-road-storage-organization-white-white-oak-plane-single-wall-hook.jpg', '', 28, 100),
(147, 'Multi-Color Wide Bin', 5, 6, '/code/midex/asset/img/closed-mondays-storage-organization-multi-color-wide-bin.webp', '', 124, 100),
(148, 'Leaky Bucket', 5, 6, '/code/midex/asset/img/closed-mondays-storage-organization-leaky-bucket.webp', '', 209, 100),
(149, 'Bako Bin Large Charcoal', 5, 9, '/code/midex/asset/img/graf-lantz-storage-organization-charcoal-bako-bin-large-charcoal.webp', '', 110, 100),
(150, 'Bako Bin Large Granite', 5, 9, '/code/midex/asset/img/graf-lantz-storage-organization-granite-bako-bin-large-granite.jpg', '', 110, 100),
(151, 'The Fiddlehead Umbrella Stand', 5, 11, '/code/midex/asset/img/hollis-morris-furniture-the-fiddlehead-umbrella-stand.webp', '', 450, 100),
(152, 'The Bellwoods Clothes Stand', 5, 11, '/code/midex/asset/img/hollis-morris-furniture-the-bellwoods-clothes-stand.webp', '', 450, 100),
(153, 'Dosa Storage Box', 5, 12, '/code/midex/asset/img/house-raccoon-storage-organization-dosa-storage-box.webp', '', 500, 100),
(154, 'FOV Black Wall Hooks', 5, 13, '/code/midex/asset/img/hue-minimal-storage-organization-fov-black-wall-hooks.webp', '', 88, 100),
(155, 'FOV Pink Wall Hooks', 5, 13, '/code/midex/asset/img/hue-minimal-storage-organization-fov-pink-wall-hooks.webp', '', 88, 100),
(156, 'Shuffle Wall Hooks', 5, 13, '/code/midex/asset/img/hue-minimal-storage-organization-shuffle-wall-hooks.webp', '', 80, 100),
(157, 'FOV Assorted Wall Hooks', 5, 13, '/code/midex/asset/img/hue-minimal-storage-organization-fov-assorted-wall-hooks.webp', '', 88, 100),
(158, 'Wooden Wall Rack', 5, 14, '/code/midex/asset/img/komolab-storage-organization-walnut-wooden-wall-rack.webp', '', 110, 100),
(159, 'Wood + Felt Valet Tray', 5, 14, '/code/midex/asset/img/komolab-storage-organization-walnut-wood-felt-valet-tray.webp', '', 85, 100),
(160, 'Wood + Felt Valet Tray', 5, 14, '/code/midex/asset/img/komolab-storage-organization-white-oak-entryway-wall-rack.webp', '', 210, 100),
(161, 'Linea', 5, 16, '/code/midex/asset/img/madebypen-storage-organization-linea.webp', '', 155, 100),
(162, 'Twist 2-in-1 Shelf + Magnetic Board', 5, 15, '/code/midex/asset/img/lawa-design-storage-organization-twist-2-in-1-shelf-magnetic-board.webp', '', 345, 100),
(163, 'Cube Container', 5, 19, '/code/midex/asset/img/ohio-workshop-storage-organization-cube-container.webp', '', 30, 100),
(164, 'Cement Vase', 5, 19, '/code/midex/asset/img/ohio-workshop-storage-organization-cement-vase.jpg', '', 25, 100),
(165, 'Large Blocks Basket', 5, 18, '/code/midex/asset/img/minna-goods-storage-organization-large-blocks-basket.webp', '', 260, 100),
(166, 'Medium Blocks Basket', 5, 18, '/code/midex/asset/img/minna-goods-storage-organization-medium-blocks-basket.webp', '', 160, 100),
(167, 'Oro Bianco Long Marble Tray', 5, 20, '/code/midex/asset/img/portego-storage-organization-oro-bianco-long-marble-tray.webp', '', 310, 100),
(168, 'Oro Bianco Round Marble Tray', 5, 20, '/code/midex/asset/img/portego-storage-organization-oro-bianco-round-marble-tray.webp', '', 190, 100),
(169, 'Bronzino Set of 2 Wall Hooks', 5, 20, '/code/midex/asset/img/portego-storage-organization-bronzino-set-of-2-wall-hooks.webp', '', 450, 100),
(170, 'Bronzino Set of 3 Wall Hooks', 5, 20, '/code/midex/asset/img/portego-storage-organization-bronzino-set-of-3-wall-hooks.webp', '', 152, 100),
(171, 'Miniportrait Oval Jewelry Box', 5, 20, '/code/midex/asset/img/portego-storage-organization-miniportrait-oval-jewelry-box.webp', '', 255, 100),
(172, 'Miniportrait Round Jewelry Box', 5, 20, '/code/midex/asset/img/portego-storage-organization-miniportrait-round-jewelry-box.webp', '', 185, 100),
(173, 'Rubber and Brass Bin', 5, 26, '/code/midex/asset/img/slash-objects-storage-organization-pure-black-rubber-and-brass-bin.webp', '', 155, 100),
(174, 'Small Rubber and Brass Basket', 5, 26, '/code/midex/asset/img/slash-objects-storage-organization-small-rubber-and-brass-basket.webp', '', 38, 100),
(175, 'Large Rubber and Brass Basket', 5, 26, '/code/midex/asset/img/slash-objects-storage-organization-large-rubber-and-brass-basket.webp', '', 89, 100),
(176, 'Medium Rubber and Brass Basket', 5, 26, '/code/midex/asset/img/slash-objects-storage-organization-medium-rubber-and-brass-basket.webp', '', 64, 100),
(177, 'Rubber and Brass Basket Set in Gris', 5, 26, '/code/midex/asset/img/slash-objects-storage-organization-rubber-and-brass-basket-set-in-gris.webp', '', 38, 100),
(178, 'Rubber and Brass Basket Set in Pure Black', 5, 26, '/code/midex/asset/img/slash-objects-storage-organization-rubber-and-brass-basket-set-in-pure-black.jpg', '', 218, 100),
(179, 'Rubber and Brass Baskets in Royal', 5, 26, '/code/midex/asset/img/slash-objects-storage-organization-set-rubber-and-brass-baskets-in-royal.jpg', '', 175, 100),
(180, 'Rubber and Brass Baskets in Sand', 5, 26, '/code/midex/asset/img/slash-objects-storage-organization-set-rubber-and-brass-baskets-in-sand.jpg', '', 175, 100),
(181, 'Rubber and Brass Baskets in Speckled Black', 5, 26, '/code/midex/asset/img/slash-objects-storage-organization-set-rubber-and-brass-baskets-in-speckled-black.jpg', '', 175, 100),
(182, 'Black Jewelry Holders', 5, 21, '/code/midex/asset/img/pretti-cool-storage-organization-black-jewelry-holders.webp', '', 20, 100),
(183, 'Paper Pet', 5, 23, '/code/midex/asset/img/roije-storage-organization-brown-paper-pet.webp', '', 190, 100),
(184, 'Traverse Tray', 5, 30, '/code/midex/asset/img/willow-stump-design-co-storage-organization-traverse-tray.jpg', '', 64, 100),
(185, 'Cafe Bar Table', 6, 1, '/code/midex/asset/img/bend-goods-furniture-black-cafe-bar-table.jpg', '', 470, 100),
(186, 'Cafe Dining Table', 6, 1, '/code/midex/asset/img/bend-goods-furniture-black-round-cafe-dining-table.jpg', '', 440, 100),
(187, 'Eclipse Table', 6, 1, '/code/midex/asset/img/bend-goods-furniture-black-eclipse-table.webp', '', 300, 100),
(188, 'Terrazzo Table', 6, 1, '/code/midex/asset/img/bend-goods-furniture-black-terrazzo-table.jpg', '', 600, 100),
(189, 'Drum Table', 6, 1, '/code/midex/asset/img/bend-goods-furniture-white-drum-table.jpg', '', 450, 100),
(190, 'Cono Table', 6, 1, '/code/midex/asset/img/bend-goods-furniture-black-cono-table.webp', '', 300, 100),
(191, 'Cafe Bar Table', 6, 1, '/code/midex/asset/img/bend-goods-furniture-black-cafe-bar-table.jpg', '', 470, 100),
(192, 'White Oak Strap Sofa Table', 6, 8, '/code/midex/asset/img/form-refine-furniture-white-oak-strap-sofa-table.webp', '', 1600, 100),
(193, 'Oak Strap Sofa Table', 6, 8, '/code/midex/asset/img/form-refine-furniture-oak-strap-sofa-table.webp', '', 1600, 100),
(194, 'Damsbo Dining Table Extension Plates - Set of 2', 6, 8, '/code/midex/asset/img/form-refine-furniture-damsbo-dining-table-extension-plates-set-of-2.webp', '', 755, 100),
(195, 'Oak Damsbo Master Dining Table', 6, 8, '/code/midex/asset/img/form-refine-furniture-oak-damsbo-master-dining-table.webp', '', 4000, 100),
(196, 'Oak Linear 125x68 Tabletop', 6, 8, '/code/midex/asset/img/form-refine-furniture-oak-linear-125x68-tabletop.webp', '', 675, 100),
(197, 'White Oak Linear 125x68 Tabletop', 6, 8, '/code/midex/asset/img/form-refine-furniture-white-oak-linear-125x68-tabletop.webp', '', 675, 100),
(198, 'Oak Linear 165x88 Tabletop', 6, 8, '/code/midex/asset/img/form-refine-furniture-oak-linear-165x88-tabletop.webp', '', 975, 100),
(199, 'White Oak Linear 165x88 Tabletop', 6, 8, '/code/midex/asset/img/form-refine-furniture-white-oak-linear-165x88-tabletop.webp', '', 975, 100),
(200, 'Oak Linear 205x88 Tabletop', 6, 8, '/code/midex/asset/img/form-refine-furniture-oak-linear-205x88-tabletop.webp', '', 1225, 100),
(201, 'White Oak Linear 205x88 Tabletop', 6, 8, '/code/midex/asset/img/form-refine-furniture-white-oak-linear-205x88-tabletop.jpg', '', 1225, 100),
(202, 'Ash Stilk Side Table', 6, 8, '/code/midex/asset/img/form-refine-furniture-stilk-side-table-ash.jpg', '', 600, 100),
(203, 'Oak Stilk Side Table', 6, 8, '/code/midex/asset/img/form-refine-furniture-stilk-side-table-oak.jpg', '', 600, 100),
(204, 'White Oak Stilk Side Table', 6, 8, '/code/midex/asset/img/form-refine-furniture-stilk-side-table-white-oak.jpg', '', 600, 100),
(205, 'Alden Table', 6, 5, '/code/midex/asset/img/ciseal-tables-alden-table.webp', '', 650, 100),
(206, 'The Crescenttown Side Table', 6, 11, '/code/midex/asset/img/hollis-morris-furniture-the-crescenttown-side-table.jpg', '', 750, 100),
(207, 'The Fort York Coffee Table', 6, 11, '/code/midex/asset/img/hollis-morris-furniture-the-fort-york-coffee-table.jpg', '', 850, 100),
(208, 'The Pier Dining Table', 6, 11, '/code/midex/asset/img/hollis-morris-furniture-the-pier-dining-table.jpg', '', 4900, 100),
(209, 'The Basin Table', 6, 11, '/code/midex/asset/img/hollis-morris-furniture-the-basin-table.jpg', '', 1350, 100),
(210, 'The Bedford Side Table', 6, 11, '/code/midex/asset/img/hollis-morris-furniture-the-bedford-side-table.jpg', '', 1100, 100),
(211, 'The Crescenttown Coffee Table', 6, 11, '/code/midex/asset/img/hollis-morris-furniture-the-crescenttown-coffee-table.jpg', '', 1350, 100),
(212, 'The Brockton Table', 6, 11, '/code/midex/asset/img/hollis-morris-furniture-the-brockton-table.jpg', '', 3700, 100),
(213, 'The Large Fairbanks Sideboard', 6, 11, '/code/midex/asset/img/hollis-morris-furniture-the-large-fairbanks-sideboard.jpg', '', 4800, 100),
(214, 'The Small Fairbanks Sideboard', 6, 11, '/code/midex/asset/img/hollis-morris-furniture-the-small-fairbanks-sideboard.jpg', '', 4500, 100),
(215, 'The Isthmus Dining Table', 6, 11, '/code/midex/asset/img/hollis-morris-furniture-the-isthmus-dining-table.webp', '', 5800, 100),
(216, 'The York Coffee Table', 6, 11, '/code/midex/asset/img/hollis-morris-furniture-the-york-coffee-table.webp', '', 880, 100),
(217, 'Polygon Black Side Table', 6, 13, '/code/midex/asset/img/hue-minimal-tables-polygon-black-side-table.webp', '', 385, 100),
(218, 'Polygon Bordeaux Side Table', 6, 13, '/code/midex/asset/img/hue-minimal-uncategorized-polygon-bordeaux-side-table.webp', '', 385, 100),
(219, 'Turning Side Table', 6, 17, '/code/midex/asset/img/menu-tables-turning-side-table.webp', '', 650, 100),
(220, 'Xlibris Wall Desk', 3, 1, '/code/midex/asset/img/sibast-furniture-furniture-smoked-oak-xlibris-wall-desk.webp', '', 1250, 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userlist`
--

CREATE TABLE `userlist` (
  `id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `username` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `class` tinyint(1) NOT NULL,
  `img` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `userlist`
--

INSERT INTO `userlist` (`id`, `email`, `username`, `password`, `class`, `img`, `status`) VALUES
(1, 'dat@email.com', 'dat', '202cb962ac59075b964b07152d234b70', 0, '/code/midex/img/product/review-1.png', 0),
(2, 'jun@ca.co', 'jun', '202cb962ac59075b964b07152d234b70', 0, '/code/midex/img/product/review-2.png', 0),
(3, 'ad@ad.com', 'admin', '202cb962ac59075b964b07152d234b70', 1, '/code/midex/img/product/review-3.png', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `aromaorder`
--
ALTER TABLE `aromaorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aromaorder_ibfk_1` (`iduser`);

--
-- Chỉ mục cho bảng `aromaorderdetail`
--
ALTER TABLE `aromaorderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aromaorderdetail_ibfk_1` (`idorder`),
  ADD KEY `aromaorderdetail_ibfk_2` (`idproduct`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_ibfk_1` (`idproduct`),
  ADD KEY `comment_ibfk_2` (`iduser`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ibfk_1` (`idbrand`),
  ADD KEY `product_ibfk_2` (`idcategory`);

--
-- Chỉ mục cho bảng `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `aromaorder`
--
ALTER TABLE `aromaorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `aromaorderdetail`
--
ALTER TABLE `aromaorderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT cho bảng `userlist`
--
ALTER TABLE `userlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `aromaorder`
--
ALTER TABLE `aromaorder`
  ADD CONSTRAINT `aromaorder_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `userlist` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `aromaorderdetail`
--
ALTER TABLE `aromaorderdetail`
  ADD CONSTRAINT `aromaorderdetail_ibfk_1` FOREIGN KEY (`idorder`) REFERENCES `aromaorder` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `aromaorderdetail_ibfk_2` FOREIGN KEY (`idproduct`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idproduct`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `userlist` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

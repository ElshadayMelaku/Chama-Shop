-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 03:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chamadatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int(255) NOT NULL,
  `UserID` int(255) NOT NULL,
  `ProductID` int(255) NOT NULL,
  `Quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`) VALUES
(1, 'Mens'),
(2, 'Womens'),
(3, 'Kids');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `ImageID` int(11) NOT NULL,
  `ImageType` varchar(50) NOT NULL,
  `ImagePath` varchar(255) NOT NULL,
  `ProductID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ImageID`, `ImageType`, `ImagePath`, `ProductID`) VALUES
(1, 'avif', 'img/mens/Lite_Racer_Adapt_4.0_Slip-On_Shoes_Beige_IG3561_01_standard.avif', 1),
(2, 'avif', 'img/mens/Lite_Racer_Adapt_4.0_Slip-On_Shoes_White_GX4776_01_standard.avif', 2),
(3, 'avif', 'img/mens/Lite_Racer_Adapt_5.0_Shoes_Black_GX6784_01_standard.avif', 3),
(4, 'avif', 'img/mens/Runfalcon_3_Running_Shoes_White_IE0739_01_standard.avif', 4),
(5, 'avif', 'img/mens/Lite_Racer_Adapt_6.0_Shoes_Black_IF7359_01_standard.avif', 5),
(6, 'avif', 'img/mens/Lite_Racer_Adapt_6.0_Shoes_Grey_IF7360_01_standard.avif', 6),
(7, 'avif', 'img/mens/Lite_Racer_Adapt_6.0_Shoes_Purple_IG3550_01_standard.avif', 7),
(8, 'avif', 'img/mens/Racer_TR21_Shoes_Black_GZ8184_01_standard.avif', 8),
(9, 'avif', 'img/mens/Racer_TR23_Shoes_Blue_ID3052_01_standard.avif', 9),
(10, 'avif', 'img/mens/Racer_TR23_Shoes_Black_IF3289_01_standard.avif', 0),
(11, 'avif', 'img/mens/Racer_TR23_Shoes_Blue_ID3052_01_standard.avif', 11),
(12, 'avif', 'img/mens/Racer_TR23_Shoes_Blue_IG7325_01_standard.avif', 12),
(13, 'avif', 'img/mens/Racer_TR23_Shoes_Green_ID5858_01_standard.avif', 13),
(14, 'avif', 'img/mens/Racer_TR23_Shoes_Green_ID7835_01_standard.avif', 14),
(15, 'avif', 'img/mens/Racer_TR23_Shoes_Grey_ID3058_01_standard.avif', 15),
(16, 'avif', 'img/mens/Racer_TR23_Shoes_White_ID2718_01_standard.avif', 16),
(17, 'avif', 'img/mens/Runfalcon_3_Cloudfoam_Low_Running_Shoes_Black_HQ3790_01_standard.avif', 17),
(18, 'avif', 'img/mens/Runfalcon_3_Cloudfoam_Low_Running_Shoes_White_HQ3789_01_standard.avif', 18),
(19, 'avif', 'img/mens/Runfalcon_3_Running_Shoes_Black_IE0742_01_standard.avif', 19),
(20, 'avif', 'img/mens/Runfalcon_3_Running_Shoes_Brown_IE0738_01_standard.avif', 20),
(21, 'avif', 'img/mens/Runfalcon_3_Running_Shoes_White_IE0739_01_standard.avif', 21),
(22, 'avif', 'img/mens/Swift_Run_1.0_Shoes_Black_IF0569_01_standard.avif', 22),
(23, 'avif', 'img/mens/Swift_Run_1_Shoes_Beige_IF3986_01_standard.avif', 23),
(24, 'webp', 'img/women/air-max-1-87-womens-shoes-0vW0ds.webp', 24),
(25, 'webp', 'img/women/air-max-90-mens-shoes-Bd2qnn.webp', 25),
(26, 'webp', 'img/women/air-max-270-mens-shoes-KkLcGR.webp', 26),
(27, 'webp', 'img/women/air-max-270-womens-shoes-Pgb94t.webp', 27),
(29, 'webp', 'img/women/air-vapormax-2023-flyknit-mens-shoes-vSm5p2.webp', 29),
(30, 'jpg', 'img/women/air-vapormax-2023-flyknit-womens-shoes-gZhc8N.jpg', 30),
(31, 'webp', 'img/women/air-vapormax-plus-mens-shoes-nC0dzF.webp', 31),
(32, 'webp', 'img/women/air-vapormax-plus-womens-shoes-xbt7zf.webp', 32),
(33, 'webp', 'img/women/dunk-low-big-kids-shoes-bWkNlg.webp', 33),
(34, 'webp', 'img/women/dunk-low-big-kids-shoes-l6Jxh2.webp', 34),
(35, 'webp', 'img/women/dunk-low-next-nature-se-womens-shoes-8Dk7Jr.webp', 35),
(36, 'webp', 'img/women/dunk-low-retro-mens-shoes-5FQWGR.webp', 36),
(38, 'webp', 'img/women/dunk-low-retro-se-mens-shoes-54Zggv.webp', 38),
(39, 'webp', 'img/women/dunk-low-retro-se-mens-shoes-88bBhk.webp', 39),
(40, 'webp', 'img/women/dunk-low-retro-se-mens-shoes-qTZ3Jk.webp', 40),
(41, 'webp', 'img/women/dunk-low-twist-womens-shoes-TsSP0p.webp', 41),
(42, 'webp', 'img/women/dunk-low-womens-shoes-7f82DH.webp', 42),
(43, 'webp', 'img/women/dunk-low-retro-mens-shoes-5FQWGR.webp', 43),
(44, 'avif', 'img/kids/adidas_Originals_x_Disney_Mickey_Superstar_Shoes_Kids_Black_IF1269_01_standard.avif', 44),
(45, 'avif', 'img/kids/Adifom_Q_Shoes_Black_HQ1649_01_standard.avif', 45),
(46, 'avif', 'img/kids/Adifom_Supernova_Shoes_Black_IF6588_01_standard.avif', 46),
(47, 'avif', 'img/kids/Campus_00s_Shoes_Purple_GZ2555_01_standard.avif', 47),
(48, 'avif', 'img/kids/Campus_00s_Shoes_Red_IG1230_01_standard.avif', 48),
(49, 'avif', 'img/kids/Forum_Low_Shoes_White_ID6861_01_standard.avif', 49),
(50, 'avif', 'img/kids/Gazelle_Shoes_Kids_Red_IG1699_01_standard.avif', 50),
(51, 'avif', 'img/kids/NMD_R1_Refined_Shoes_Black_H02333_01_standard.avif', 51),
(52, 'avif', 'img/kids/NMD_R1_Refined_Shoes_White_H02334_01_standard.avif', 52),
(53, 'avif', 'img/kids/NMD_R1_Shoes_Black_H03994_01_standard.avif', 53),
(54, 'avif', 'img/kids/OZMILLEN_Shoes_Kids_Black_IF6589_01_standard.avif', 54),
(56, 'avif', 'img/kids/OZWEEGO_Shoes_Kids_Beige_IG7418_01_standard.avif', 56),
(57, 'avif', 'img/kids/OZWEEGO_Shoes_Kids_Brown_IE2782_01_standard.avif', 57),
(58, 'avif', 'img/kids/Samba_OG_Shoes_Kids_Black_IE3676_01_standard.avif', 58),
(59, 'avif', 'img/kids/Samba_OG_Shoes_Kids_White_IE1330_01_standard.avif', 59),
(60, 'avif', 'img/kids/Stan_Smith_CS_Shoes_Green_IE7586_01_standard.avif', 60),
(61, 'avif', 'img/kids/Stan_Smith_Shoes_Kids_White_IE8172_01_standard.avif', 61),
(62, 'avif', 'img/kids/Superstar_Shoes_Black_EF5398_01_standard.avif', 62),
(63, 'avif', 'img/kids/Superstar_Shoes_Kids_Pink_IE0863_01_standard.avif', 63);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `UserID` int(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderDetailID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`OrderDetailID`, `OrderID`, `ProductID`, `Quantity`, `Price`) VALUES
(1, 1, 22, 1, 12000),
(2, 1, 23, 1, 12000),
(3, 1, 19, 1, 10000),
(4, 2, 23, 2, 12000),
(5, 2, 20, 1, 10000),
(6, 2, 17, 1, 10000),
(7, 2, 16, 5, 16000),
(8, 2, 21, 3, 10000),
(9, 3, 21, 2, 10000),
(10, 3, 22, 3, 12000),
(11, 3, 60, 1, 21000),
(12, 9, 41, 1, 22000),
(13, 9, 61, 1, 21000),
(14, 9, 46, 1, 17000),
(15, 10, 20, 1, 10000),
(16, 10, 22, 1, 12000),
(17, 10, 17, 1, 10000),
(18, 10, 14, 1, 16000),
(22, 11, 21, 1, 10000),
(23, 11, 20, 1, 10000),
(24, 11, 16, 1, 16000),
(25, 11, 14, 1, 16000),
(26, 12, 14, 1, 16000),
(27, 12, 22, 1, 12000),
(28, 12, 17, 1, 10000),
(29, 12, 15, 1, 16000),
(30, 12, 62, 2, 17000),
(31, 12, 23, 1, 12000),
(32, 13, 21, 1, 10000),
(33, 13, 15, 1, 16000),
(34, 14, 22, 1, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(255) NOT NULL,
  `UserID` int(255) NOT NULL,
  `OrderDate` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `UserID`, `OrderDate`) VALUES
(1, 22, '2024-06-09 12:55:15.771399'),
(2, 22, '2024-06-09 13:28:05.956326'),
(3, 22, '2024-06-09 16:16:36.288285'),
(4, 22, '2024-06-09 16:20:22.300747'),
(5, 22, '2024-06-09 16:21:13.030894'),
(6, 22, '2024-06-09 16:21:36.508454'),
(7, 22, '2024-06-09 16:22:01.274420'),
(8, 22, '2024-06-09 16:23:13.066469'),
(9, 22, '2024-06-09 16:25:49.944469'),
(10, 22, '2024-06-10 20:09:36.379026'),
(11, 22, '2024-06-10 20:21:34.563214'),
(12, 22, '2024-06-11 06:26:37.789683'),
(13, 22, '2024-06-11 16:17:22.693137'),
(14, 24, '2024-06-20 13:06:28.098100');

-- --------------------------------------------------------

--
-- Table structure for table `productlist`
--

CREATE TABLE `productlist` (
  `ProductID` int(255) NOT NULL,
  `ProductName` text NOT NULL,
  `ProductPrice` int(255) NOT NULL,
  `productDetails` text NOT NULL,
  `ProductSize` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`ProductSize`)),
  `ImageID` int(255) NOT NULL,
  `CategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productlist`
--

INSERT INTO `productlist` (`ProductID`, `ProductName`, `ProductPrice`, `productDetails`, `ProductSize`, `ImageID`, `CategoryID`) VALUES
(1, 'Lite_Racer_Adapt_4.0', 11000, 'Subtle pops of color and striking elastic webbed laces step up the style of these adidas trainers. They pair well with classic t-shirts, and the dappled effect will also look good with your favorite wool sweater. A lightweight upper is set on a pillowy Cloudfoam midsole. This product features at least 20% recycled materials. By reusing materials that have already been created, we help to reduce waste and our reliance on finite resources and reduce the footprint of the products we make. ', '[41,42,43,44]', 1, 1),
(2, 'Lite_Racer_Adapt_4.0', 11000, 'Subtle pops of color and striking elastic webbed laces step up the style of these adidas trainers. They pair well with classic t-shirts, and the dappled effect will also look good with your favorite wool sweater. A lightweight upper is set on a pillowy Cloudfoam midsole. This product features at least 20% recycled materials. By reusing materials that have already been created, we help to reduce waste and our reliance on finite resources and reduce the footprint of the products we make. ', '[41,42,43,44]', 2, 1),
(3, 'Lite_Racer_Adapt_5.0', 12000, 'Subtle pops of color and striking elastic webbed laces step up the style of these adidas trainers. They pair well with classic t-shirts, and the dappled effect will also look good with your favorite wool sweater. A lightweight upper is set on a pillowy Cloudfoam midsole. This product features at least 20% recycled materials. By reusing materials that have already been created, we help to reduce waste and our reliance on finite resources and reduce the footprint of the products we make. ', '[41,42,43,44]', 3, 1),
(4, 'Runfalcon_3', 14000, 'Subtle pops of color and striking elastic webbed laces step up the style of these adidas trainers. They pair well with classic t-shirts, and the dappled effect will also look good with your favorite wool sweater. A lightweight upper is set on a pillowy Cloudfoam midsole. This product features at least 20% recycled materials. By reusing materials that have already been created, we help to reduce waste and our reliance on finite resources and reduce the footprint of the products we make. ', '[41,42,43,44]', 4, 1),
(5, 'Lite_Racer_Adapt_6.0', 12000, 'Subtle pops of color and striking elastic webbed laces step up the style of these adidas trainers. They pair well with classic t-shirts, and the dappled effect will also look good with your favorite wool sweater. A lightweight upper is set on a pillowy Cloudfoam midsole. This product features at least 20% recycled materials. By reusing materials that have already been created, we help to reduce waste and our reliance on finite resources and reduce the footprint of the products we make. ', '[41,42,43,44]', 5, 1),
(6, 'Lite_Racer_Adapt_6.0', 12000, 'Subtle pops of color and striking elastic webbed laces step up the style of these adidas trainers. They pair well with classic t-shirts, and the dappled effect will also look good with your favorite wool sweater. A lightweight upper is set on a pillowy Cloudfoam midsole. This product features at least 20% recycled materials. By reusing materials that have already been created, we help to reduce waste and our reliance on finite resources and reduce the footprint of the products we make. ', '[41,42,43,44]', 6, 1),
(7, 'Lite_Racer_Adapt_6.0', 12000, 'Subtle pops of color and striking elastic webbed laces step up the style of these adidas trainers. They pair well with classic t-shirts, and the dappled effect will also look good with your favorite wool sweater. A lightweight upper is set on a pillowy Cloudfoam midsole. This product features at least 20% recycled materials. By reusing materials that have already been created, we help to reduce waste and our reliance on finite resources and reduce the footprint of the products we make. ', '[41,42,43,44]', 7, 1),
(8, 'Racer_TR21', 13000, 'Diversify your training and get a leg up on the competition. Box jumps, bear crawls, burpees? Take it all in stride and push towards excellence in these adidas running shoes. Their 360º Torsion System supports explosive movement any direction. Springy Bounce cushioning ensures comfort through even the most gruelling sessions.', '[41,42,43,44]', 8, 1),
(9, 'Racer_TR21', 13000, 'Diversify your training and get a leg up on the competition. Box jumps, bear crawls, burpees? Take it all in stride and push towards excellence in these adidas running shoes. Their 360º Torsion System supports explosive movement any direction. Springy Bounce cushioning ensures comfort through even the most gruelling sessions.', '[41,42,43,44]', 9, 1),
(10, 'Racer_TR23', 16000, 'Diversify your training and get a leg up on the competition. Box jumps, bear crawls, burpees? Take it all in stride and push towards excellence in these adidas running shoes. Their 360º Torsion System supports explosive movement any direction. Springy Bounce cushioning ensures comfort through even the most gruelling sessions.', '[41,42,43,44]', 10, 1),
(11, 'Racer_TR23', 16000, 'Diversify your training and get a leg up on the competition. Box jumps, bear crawls, burpees? Take it all in stride and push towards excellence in these adidas running shoes. Their 360º Torsion System supports explosive movement any direction. Springy Bounce cushioning ensures comfort through even the most gruelling sessions.', '[41,42,43,44]', 11, 1),
(12, 'Racer_TR23', 16000, 'Diversify your training and get a leg up on the competition. Box jumps, bear crawls, burpees? Take it all in stride and push towards excellence in these adidas running shoes. Their 360º Torsion System supports explosive movement any direction. Springy Bounce cushioning ensures comfort through even the most gruelling sessions.', '[41,42,43,44]', 12, 1),
(13, 'Racer_TR23', 16000, 'Diversify your training and get a leg up on the competition. Box jumps, bear crawls, burpees? Take it all in stride and push towards excellence in these adidas running shoes. Their 360º Torsion System supports explosive movement any direction. Springy Bounce cushioning ensures comfort through even the most gruelling sessions.', '[41,42,43,44]', 13, 1),
(14, 'Racer_TR23', 16000, 'Diversify your training and get a leg up on the competition. Box jumps, bear crawls, burpees? Take it all in stride and push towards excellence in these adidas running shoes. Their 360º Torsion System supports explosive movement any direction. Springy Bounce cushioning ensures comfort through even the most gruelling sessions.', '[41,42,43,44]', 14, 1),
(15, 'Racer_TR23', 16000, 'Diversify your training and get a leg up on the competition. Box jumps, bear crawls, burpees? Take it all in stride and push towards excellence in these adidas running shoes. Their 360º Torsion System supports explosive movement any direction. Springy Bounce cushioning ensures comfort through even the most gruelling sessions.', '[41,42,43,44]', 15, 1),
(16, 'Racer_TR23', 16000, 'Diversify your training and get a leg up on the competition. Box jumps, bear crawls, burpees? Take it all in stride and push towards excellence in these adidas running shoes. Their 360º Torsion System supports explosive movement any direction. Springy Bounce cushioning ensures comfort through even the most gruelling sessions.', '[41,42,43,44]', 16, 1),
(17, 'Runfalcon_3', 10000, 'Cushioned running shoes made in part with recycled materials. Lace up for a run through the park or a walk to the coffee shop in these versatile adidas running shoes. They feel good from the minute you step in, thanks to the cushy Cloudfoam midsole. The textile upper feels comfy and breathable, and the rubber outsole gives you plenty of grip for a confident stride. Made with a series of recycled materials, this upper features at least 50% recycled content. This product represents just one of our solutions to help end plastic waste', '[41,42,43,44]', 17, 1),
(18, 'Runfalcon_3', 10000, 'Cushioned running shoes made in part with recycled materials. Lace up for a run through the park or a walk to the coffee shop in these versatile adidas running shoes. They feel good from the minute you step in, thanks to the cushy Cloudfoam midsole. The textile upper feels comfy and breathable, and the rubber outsole gives you plenty of grip for a confident stride. Made with a series of recycled materials, this upper features at least 50% recycled content. This product represents just one of our solutions to help end plastic waste', '[41,42,43,44]', 18, 1),
(19, 'Runfalcon_3', 10000, 'Cushioned running shoes made in part with recycled materials. Lace up for a run through the park or a walk to the coffee shop in these versatile adidas running shoes. They feel good from the minute you step in, thanks to the cushy Cloudfoam midsole. The textile upper feels comfy and breathable, and the rubber outsole gives you plenty of grip for a confident stride. Made with a series of recycled materials, this upper features at least 50% recycled content. This product represents just one of our solutions to help end plastic waste', '[41,42,43,44]', 19, 1),
(20, 'Runfalcon_3', 10000, 'Cushioned running shoes made in part with recycled materials. Lace up for a run through the park or a walk to the coffee shop in these versatile adidas running shoes. They feel good from the minute you step in, thanks to the cushy Cloudfoam midsole. The textile upper feels comfy and breathable, and the rubber outsole gives you plenty of grip for a confident stride. Made with a series of recycled materials, this upper features at least 50% recycled content. This product represents just one of our solutions to help end plastic waste', '[41,42,43,44]', 20, 1),
(21, 'Runfalcon_3', 10000, 'Cushioned running shoes made in part with recycled materials. Lace up for a run through the park or a walk to the coffee shop in these versatile adidas running shoes. They feel good from the minute you step in, thanks to the cushy Cloudfoam midsole. The textile upper feels comfy and breathable, and the rubber outsole gives you plenty of grip for a confident stride. Made with a series of recycled materials, this upper features at least 50% recycled content. This product represents just one of our solutions to help end plastic waste', '[41,42,43,44]', 21, 1),
(22, 'Swift_Run_1.0', 12000, 'Comfortable Go-TO Sneakers For Life\'s Daily Moves. Step to your own beat with these adidas shoes. looks and all-day comfort. The EVA midsole makes every step feel like you\'re walking on clouds. A sleek silhouette pairs well with any outfit.', '[41,42,43,44]', 22, 1),
(23, 'Swift_Run_1.0', 12000, 'Comfortable Go-TO Sneakers For Life\'s Daily Moves. Step to your own beat with these adidas shoes. looks and all-day comfort. The EVA midsole makes every step feel like you\'re walking on clouds. A sleek silhouette pairs well with any outfit.', '[41,42,43,44]', 23, 1),
(24, 'Air-Max-1-87', 11000, 'Celebrate Air Max Day with the innovation that changed the sneaker game. Walking on clouds above the noise, the Air Max 1 blends timeless design with cushioned comfort. Sporting a fast-paced look, wavy mudguard and Nike Air, this classic icon hit the scene in ‘87 and continues to be the soul of the franchise today. This celebratory edition features a Swoosh logo and sneaker charm to make your every move shine.', '[36,37,38,39]', 24, 2),
(25, 'Air-Max-90', 15000, 'Celebrate Air Max Day with the innovation that changed the sneaker game. Walking on clouds above the noise, the Air Max 1 blends timeless design with cushioned comfort. Sporting a fast-paced look, wavy mudguard and Nike Air, this classic icon hit the scene in ‘87 and continues to be the soul of the franchise today. This celebratory edition features a Swoosh logo and sneaker charm to make your every move shine.', '[36,37,38,39]', 25, 2),
(26, 'Air-Max-270', 19000, 'Celebrate Air Max Day with the innovation that changed the sneaker game. Walking on clouds above the noise, the Air Max 1 blends timeless design with cushioned comfort. Sporting a fast-paced look, wavy mudguard and Nike Air, this classic icon hit the scene in ‘87 and continues to be the soul of the franchise today. This celebratory edition features a Swoosh logo and sneaker charm to make your every move shine.', '[36,37,38,39]', 26, 2),
(27, 'Air-Max-270', 17000, 'Celebrate Air Max Day with the innovation that changed the sneaker game. Walking on clouds above the noise, the Air Max 1 blends timeless design with cushioned comfort. Sporting a fast-paced look, wavy mudguard and Nike Air, this classic icon hit the scene in ‘87 and continues to be the soul of the franchise today. This celebratory edition features a Swoosh logo and sneaker charm to make your every move shine.', '[36,37,38,39]', 27, 2),
(29, 'Air-Vapormax', 18000, 'Have you ever walked on Air? Step into the Air VaporMax 2023 to see how it\'s done. The innovative tech is revealed through the perforated sockliner (pull it out to see more). The stretchy Flyknit upper is made with at least 20% recycled content by weight.', '[36,37,38,39]', 29, 2),
(30, 'Air-Vapormax', 18000, 'Have you ever walked on Air? Step into the Air VaporMax 2023 to see how it\'s done. The innovative tech is revealed through the perforated sockliner (pull it out to see more). The stretchy Flyknit upper is made with at least 20% recycled content by weight.', '[36,37,38,39]', 30, 2),
(31, 'Air-Vapormax', 18000, 'Have you ever walked on Air? Step into the Air VaporMax 2023 to see how it\'s done. The innovative tech is revealed through the perforated sockliner (pull it out to see more). The stretchy Flyknit upper is made with at least 20% recycled content by weight.', '[36,37,38,39]', 31, 2),
(32, 'Air-Vapormax', 18000, 'Have you ever walked on Air? Step into the Air VaporMax 2023 to see how it\'s done. The innovative tech is revealed through the perforated sockliner (pull it out to see more). The stretchy Flyknit upper is made with at least 20% recycled content by weight.', '[36,37,38,39]', 32, 2),
(33, 'Dunk-Low', 20000, 'The \'80s basketball icon returns with classic details and throwback hoops flair. Channeling vintage style back onto the streets, its crisp leather upper and padded, low-cut collar let you take your game anywhere—in comfort.', '[36,37,38,39]', 33, 2),
(34, 'Dunk-Low', 21000, 'The \'80s basketball icon returns with classic details and throwback hoops flair. Channeling vintage style back onto the streets, its crisp leather upper and padded, low-cut collar let you take your game anywhere—in comfort.', '[36,37,38,39]', 34, 2),
(35, 'Dunk-Low', 21000, 'The \'80s basketball icon returns with classic details and throwback hoops flair. Channeling vintage style back onto the streets, its crisp leather upper and padded, low-cut collar let you take your game anywhere—in comfort.', '[36,37,38,39]', 35, 2),
(36, 'Dunk-Low', 21000, 'The \'80s basketball icon returns with classic details and throwback hoops flair. Channeling vintage style back onto the streets, its crisp leather upper and padded, low-cut collar let you take your game anywhere—in comfort.', '[36,37,38,39]', 36, 2),
(38, 'Dunk-Low-Retro', 23000, 'The \'80s basketball icon returns with classic details and throwback hoops flair. Channeling vintage style back onto the streets, its crisp leather upper and padded, low-cut collar let you take your game anywhere—in comfort.', '[36,37,38,39]', 38, 2),
(39, 'Dunk-Low-Retro', 22000, 'The \'80s basketball icon returns with classic details and throwback hoops flair. Channeling vintage style back onto the streets, its crisp leather upper and padded, low-cut collar let you take your game anywhere—in comfort.', '[36,37,38,39]', 39, 2),
(40, 'Dunk-Low-Retro', 20000, 'The \'80s basketball icon returns with classic details and throwback hoops flair. Channeling vintage style back onto the streets, its crisp leather upper and padded, low-cut collar let you take your game anywhere—in comfort.', '[36,37,38,39]', 40, 2),
(41, 'Dunk-Low-Twist', 22000, 'The \'80s basketball icon returns with classic details and throwback hoops flair. Channeling vintage style back onto the streets, its crisp leather upper and padded, low-cut collar let you take your game anywhere—in comfort.', '[36,37,38,39]', 41, 2),
(42, 'Dunk-Low', 21000, 'The \'80s basketball icon returns with classic details and throwback hoops flair. Channeling vintage style back onto the streets, its crisp leather upper and padded, low-cut collar let you take your game anywhere—in comfort.', '[36,37,38,39]', 42, 2),
(43, 'Dunk-Low', 23000, 'The \'80s basketball icon returns with classic details and throwback hoops flair. Channeling vintage style back onto the streets, its crisp leather upper and padded, low-cut collar let you take your game anywhere—in comfort.', '[36,37,38,39]', 43, 2),
(44, 'Adidas_Originals', 12000, 'The Adidas Originals x Disney Mickey Superstar Shoes for kids feature a playful collaboration between Adidas and Disney, bringing Mickey Mouse\'s iconic charm to the classic Superstar silhouette. These black shoes combine durable leather with Mickey-themed graphics, making them a fun and stylish choice for young fans. The signature shell toe, comfortable cushioning, and sturdy rubber outsole ensure lasting comfort and support for everyday wear.', '[31,32,33,34]', 44, 3),
(45, 'Adifom_Q', 13000, 'The Adifom Q shoes blend futuristic design with unparalleled comfort, featuring a sleek and innovative silhouette that stands out. These shoes are crafted with advanced materials for lightweight support and flexibility, offering a snug fit that\'s perfect for active lifestyles. The bold aesthetic, combined with responsive cushioning and a durable outsole, makes the Adifom Q an ideal choice for those seeking both style and performance in their footwear.', '[31,32,33,34]', 45, 3),
(46, 'Adifom_Supernova', 17000, 'The Adifom Q shoes blend futuristic design with unparalleled comfort, featuring a sleek and innovative silhouette that stands out. These shoes are crafted with advanced materials for lightweight support and flexibility, offering a snug fit that\'s perfect for active lifestyles. The bold aesthetic, combined with responsive cushioning and a durable outsole, makes the Adifom Q an ideal choice for those seeking both style and performance in their footwear.', '[31,32,33,34]', 46, 3),
(47, 'Campus_00s', 14000, 'The Campus 00s shoes bring a retro vibe with a modern twist, inspired by classic designs from the early 2000s. These sneakers feature premium suede uppers, durable rubber outsoles, and signature 3-Stripes branding for a timeless look. Comfortable and versatile, the Campus 00s are perfect for everyday wear, blending nostalgic style with contemporary comfort and durability.', '[31,32,33,34]', 47, 3),
(48, 'Campus_00s', 14000, 'The Campus 00s shoes bring a retro vibe with a modern twist, inspired by classic designs from the early 2000s. These sneakers feature premium suede uppers, durable rubber outsoles, and signature 3-Stripes branding for a timeless look. Comfortable and versatile, the Campus 00s are perfect for everyday wear, blending nostalgic style with contemporary comfort and durability.', '[31,32,33,34]', 48, 3),
(49, 'Forum_low', 12000, 'The Campus 00s shoes bring a retro vibe with a modern twist, inspired by classic designs from the early 2000s. These sneakers feature premium suede uppers, durable rubber outsoles, and signature 3-Stripes branding for a timeless look. Comfortable and versatile, the Campus 00s are perfect for everyday wear, blending nostalgic style with contemporary comfort and durability.', '[31,32,33,34]', 49, 3),
(50, 'Gazelle', 15400, 'A low-profile classic. The Gazelle shoe started life as a soccer shoe and grew into an iconic streetwear staple. This pair honors the favorite version of 1991, with the same materials, colors and slightly wider proportions. A nubuck upper gives these shoes a smooth touch and soft feel.', '[31,32,33,34]', 50, 3),
(51, 'NMD_R1', 12500, 'A low-profile classic. The Gazelle shoe started life as a soccer shoe and grew into an iconic streetwear staple. This pair honors the favorite version of 1991, with the same materials, colors and slightly wider proportions. A nubuck upper gives these shoes a smooth touch and soft feel.', '[31,32,33,34]', 51, 3),
(52, 'NMD_R1', 12500, 'A low-profile classic. The Gazelle shoe started life as a soccer shoe and grew into an iconic streetwear staple. This pair honors the favorite version of 1991, with the same materials, colors and slightly wider proportions. A nubuck upper gives these shoes a smooth touch and soft feel.', '[31,32,33,34]', 52, 3),
(53, 'NMD_R1', 12500, 'A low-profile classic. The Gazelle shoe started life as a soccer shoe and grew into an iconic streetwear staple. This pair honors the favorite version of 1991, with the same materials, colors and slightly wider proportions. A nubuck upper gives these shoes a smooth touch and soft feel.', '[31,32,33,34]', 53, 3),
(54, 'OZMILLEN', 19000, 'The OZMILLEN sneakers blend futuristic design with advanced comfort technology, creating a standout pair perfect for modern lifestyles. Featuring a sleek, aerodynamic silhouette, these shoes are crafted with breathable mesh uppers and responsive cushioning for maximum comfort and support. The bold, innovative style of the OZMILLEN makes them a versatile choice, whether you\'re hitting the gym or the streets, ensuring you stay ahead in both fashion and performance.', '[31,32,33,34]', 54, 3),
(56, 'OZWEEGO', 18000, 'The OZMILLEN sneakers blend futuristic design with advanced comfort technology, creating a standout pair perfect for modern lifestyles. Featuring a sleek, aerodynamic silhouette, these shoes are crafted with breathable mesh uppers and responsive cushioning for maximum comfort and support. The bold, innovative style of the OZMILLEN makes them a versatile choice, whether you\'re hitting the gym or the streets, ensuring you stay ahead in both fashion and performance.', '[31,32,33,34]', 56, 3),
(57, 'OZWEEGO', 18000, 'The OZMILLEN sneakers blend futuristic design with advanced comfort technology, creating a standout pair perfect for modern lifestyles. Featuring a sleek, aerodynamic silhouette, these shoes are crafted with breathable mesh uppers and responsive cushioning for maximum comfort and support. The bold, innovative style of the OZMILLEN makes them a versatile choice, whether you\'re hitting the gym or the streets, ensuring you stay ahead in both fashion and performance.', '[31,32,33,34]', 57, 3),
(58, 'Samba_OG', 20000, 'The Samba OG sneakers are an iconic staple in the world of athletic footwear, known for their timeless design and versatile appeal. Originally created for indoor soccer, these shoes feature a durable leather upper, a suede toe cap, and the signature gum rubber outsole that provides excellent traction and grip. The classic three-stripe detail and low-profile silhouette make the Samba OG a stylish choice for everyday wear, seamlessly blending heritage sports style with modern streetwear trends.', '[31,32,33,34]', 58, 3),
(59, 'Samba_OG', 20000, 'The Samba OG sneakers are an iconic staple in the world of athletic footwear, known for their timeless design and versatile appeal. Originally created for indoor soccer, these shoes feature a durable leather upper, a suede toe cap, and the signature gum rubber outsole that provides excellent traction and grip. The classic three-stripe detail and low-profile silhouette make the Samba OG a stylish choice for everyday wear, seamlessly blending heritage sports style with modern streetwear trends.', '[31,32,33,34]', 59, 3),
(60, 'Stan_Smith', 21000, 'The Stan Smith sneakers are a classic and enduring icon in the world of casual footwear. Named after the tennis legend, these shoes are renowned for their minimalist design and clean aesthetic. The all-white leather upper, perforated three stripes, and green heel tab create a sleek and timeless look that has remained popular for decades. Comfortable and versatile, the Stan Smith sneakers are perfect for everyday wear, easily pairing with a variety of outfits for a effortlessly chic style.', '[31,32,33,34]', 60, 3),
(61, 'Stan_Smith', 21000, 'The Stan Smith sneakers are a classic and enduring icon in the world of casual footwear. Named after the tennis legend, these shoes are renowned for their minimalist design and clean aesthetic. The all-white leather upper, perforated three stripes, and green heel tab create a sleek and timeless look that has remained popular for decades. Comfortable and versatile, the Stan Smith sneakers are perfect for everyday wear, easily pairing with a variety of outfits for a effortlessly chic style.', '[31,32,33,34]', 61, 3),
(62, 'Superstar', 17000, 'The Superstar sneakers by Adidas are a true classic in both sports and streetwear fashion. Originally launched in the 1970s as a basketball shoe, the Superstar quickly gained popularity for its distinctive shell toe design and durable leather construction. Over the years, it has become an iconic staple, known for its versatility and timeless style. With its signature three stripes and comfortable fit, the Superstar remains a favorite choice for sneaker enthusiasts and casual wearers alike, effortlessly blending retro charm with modern appeal.', '[31,32,33,34]', 62, 3),
(63, 'Superstar', 17000, 'The Superstar sneakers by Adidas are a true classic in both sports and streetwear fashion. Originally launched in the 1970s as a basketball shoe, the Superstar quickly gained popularity for its distinctive shell toe design and durable leather construction. Over the years, it has become an iconic staple, known for its versatility and timeless style. With its signature three stripes and comfortable fit, the Superstar remains a favorite choice for sneaker enthusiasts and casual wearers alike, effortlessly blending retro charm with modern appeal.', '[31,32,33,34]', 63, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Password`, `Email`, `FirstName`, `LastName`, `Phone`, `isAdmin`) VALUES
(22, 'kunuz2', '$2y$10$E828Mk45aulqaCzn6pUeyupdF0Tgzd8xP4Wm9pvdad/TdkayD9.8O', 'kunuz2@gmail.com', 'Kunuz', 'Mohammed', '0965041846', 0),
(23, 'admin', '$2y$10$EMEOzQ9DAClaGGM1j49rzOfMqll5IEC7l8Z2vtDEqScscOWZXKHE6', 'admin@gmail.com', 'admin', 'admin', '0911223344', 1),
(24, 'kunuz', '$2y$10$63z8tz4G.//CWJdoqnl1pe4NsKQakb63pyp./IoirEqG4yxC.rXlS', 'kunuz@gmail.com', 'kunuz', 'mohammed', '0965041846', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ImageID`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderDetailID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `productlist`
--
ALTER TABLE `productlist`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `UserID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `OrderDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 07, 2020 at 10:32 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wasthra`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` int(6) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login_id` int(6) NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  KEY `login_id` (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `first_name`, `last_name`, `gender`, `contact_no`, `email`, `login_id`, `is_deleted`) VALUES
(1, 'Kalinduuuuu', 'Nawanjana', 'male', '0778545965', 'kalindu@gmail.com', 6, 'yes'),
(2, 'Vishal', 'Abeyrathna', 'male', '0784567892', 'vishal@gmail.com', 10, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

DROP TABLE IF EXISTS `cart_item`;
CREATE TABLE IF NOT EXISTS `cart_item` (
  `product_id` varchar(20) NOT NULL,
  `cart_id` int(6) NOT NULL,
  `item_id` int(6) NOT NULL AUTO_INCREMENT,
  `item_qty` int(6) NOT NULL,
  `item_color` varchar(10) NOT NULL,
  `item_size` varchar(10) NOT NULL,
  PRIMARY KEY (`product_id`,`item_id`),
  UNIQUE KEY `item_id` (`item_id`),
  KEY `cart_item_ibfk_1` (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`product_id`, `cart_id`, `item_id`, `item_qty`, `item_color`, `item_size`) VALUES
('PRD001', 1, 1, 2, '#063E73', 'M'),
('PRD002', 1, 3, 4, '#25221F', 'L'),
('PRD019', 1, 4, 1, '#033A83', 'S'),
('PRD025', 1, 2, 1, '#020F5A', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `is_deleted`) VALUES
('CAT001', 'Gents', 'no'),
('CAT002', 'Couple', 'no'),
('CAT003', 'Ladies', 'no'),
('CAT004', 'Testisdasfng', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

DROP TABLE IF EXISTS `checkout`;
CREATE TABLE IF NOT EXISTS `checkout` (
  `address_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `cart_id` int(6) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  PRIMARY KEY (`address_id`,`user_id`,`cart_id`,`order_id`),
  KEY `checkout_ibfk_1` (`cart_id`),
  KEY `checkout_ibfk_2` (`user_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `user_id` int(6) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login_id` int(6) NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  KEY `login_id` (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `first_name`, `last_name`, `gender`, `contact_no`, `email`, `login_id`, `is_deleted`) VALUES
(1, 'Kalinduuuuu', 'Nawanjana', 'male', '0778545965', 'kalindu@gmail.com', 6, 'yes'),
(2, 'sdfsfsdfs', 'dsfdgds', 'male', '5465454546', 'dfdosg@gmail.com', 9, 'no'),
(3, 'dasfafd', 'sdfsfsd', 'male', '8468486487', 'dasun@gmail.com', 11, 'no'),
(4, 'asdafa', 'dfadfss', 'male', '4654654546', 'admasdsafsin@gmail.com', 12, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

DROP TABLE IF EXISTS `delivery`;
CREATE TABLE IF NOT EXISTS `delivery` (
  `order_id` varchar(20) NOT NULL,
  `delivery_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `actual_delivery_date` date NOT NULL,
  `expected_delivery_date` date NOT NULL,
  `delivery_status` enum('deliveryAssigned','shipped','delivered','pending') NOT NULL,
  PRIMARY KEY (`order_id`,`delivery_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address`
--

DROP TABLE IF EXISTS `delivery_address`;
CREATE TABLE IF NOT EXISTS `delivery_address` (
  `user_id` int(6) NOT NULL,
  `address_id` int(6) NOT NULL,
  `postal_code` int(5) NOT NULL,
  `address_line_1` varchar(55) NOT NULL,
  `address_line_2` varchar(55) NOT NULL,
  `address_line_3` varchar(55) NOT NULL,
  `city` varchar(20) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  PRIMARY KEY (`user_id`,`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_staff`
--

DROP TABLE IF EXISTS `delivery_staff`;
CREATE TABLE IF NOT EXISTS `delivery_staff` (
  `user_id` int(6) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login_id` int(6) NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  KEY `login_id` (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_staff`
--

INSERT INTO `delivery_staff` (`user_id`, `first_name`, `last_name`, `gender`, `contact_no`, `email`, `login_id`, `is_deleted`) VALUES
(1, 'Ashika', 'Sri', 'male', '7784575896', 'ashka@gmail.com', 7, 'yes'),
(2, 'Darshana', 'Premathilaka', 'male', '0771234567', 'delivery@gmail.com', 8, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `product_id` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `reorder_qty` int(11) DEFAULT NULL,
  `reorder_level` int(11) DEFAULT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`product_id`, `qty`, `reorder_qty`, `reorder_level`, `is_deleted`) VALUES
('PRD001', 25, 5, 2, 'no'),
('PRD002', 100, 5, 2, 'no'),
('PRD003', 100, 5, 2, 'no'),
('PRD004', 100, 5, 2, 'no'),
('PRD005', 100, 5, 2, 'no'),
('PRD007', 100, 5, 2, 'no'),
('PRD009', 100, 7, 2, 'no'),
('PRD010', 100, 5, 2, 'no'),
('PRD017', 100, 5, 2, 'no'),
('PRD019', 100, 5, 2, 'no'),
('PRD023', 50, 5, 2, 'no'),
('PRD025', 100, 5, 2, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `user_status` enum('new','verified','blocked','retired') NOT NULL,
  `user_type` enum('delivery_staff','customer','admin','owner') NOT NULL,
  `login_id` int(6) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`login_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `user_status`, `user_type`, `login_id`) VALUES
('admin@gmail.com', '$2y$10$2wOODn9sxM.8HcjeOZ2w5eSOVG2uYM8nrjKrNRlOvhTEiksbUz9ZC', 'new', 'admin', 1),
('admin@gsdfg.com', '$2y$10$cXVXqCqb/6Ih9FkXT93VMetfuHfi.dDIKpWXJKCk/o/CmPv2ZZqhm', 'new', 'customer', 2),
('kavindu@gmail.com', '$2y$10$WHU6qmyCCRkvhbId8srvfuzGGDj2rJz0H3n88b9ZQH8/alMRjEjS6', 'new', 'customer', 3),
('kumara@gmail.com', '$2y$10$9U6Wemvl279EmBqEJmAjIuM0Sx3IM73QnK03B9hvFNHAkv9okaHW.', 'new', 'customer', 4),
('ashitha@gmail.com', '$2y$10$YgojJtbNE2GnWAYiJ9KdeuBQtSwTeKDAJ0xrVuXLiugAuzvW6yHNO', 'new', 'customer', 5),
('kalindu@gmail.com', '$2y$10$dQvHzW7xIn2XL.S9TNnRJO4CN0.YeutSznM6xh.ge5oUsR0ZMgEqy', 'verified', 'customer', 6),
('ashka@gmail.com', '$2y$10$7JitZdp1WE4x5HzH03sUFOxJCX7.T4.2m.MeQ2oAKRdZWyxGFL6HO', 'new', 'owner', 7),
('delivery@gmail.com', '$2y$10$nVmw5GQhkufKfyzKEqxEaek3mne1Wi9UiLDMMTN/0Q31fYpnrUDeW', 'new', 'delivery_staff', 8),
('dfdosg@gmail.com', '$2y$10$pKOOIqg4nXXlV30GMzWqC.H2p4COlOYl16f7tfXGnTV8Ms8yMTymi', 'new', 'customer', 9),
('vishal@gmail.com', '$2y$10$eUpq0I6hBewRdRG62K5ejOSe/KbUgOzt/.K2ooQU0kdBG.F4jvUhG', 'verified', 'admin', 10),
('dasun@gmail.com', '$2y$10$peq.PLMkJ1rwOhtWSOCFb.0ckiCVCvb/ozTrv7Mh2KZShMVJl0/iK', 'new', 'customer', 11),
('admasdsafsin@gmail.com', '$2y$10$8Gb3.bNN3GEqBAl57BFr/OFVmSHLON1w.cnNx/kjLaGhGCOqzJJgm', 'new', 'customer', 12);

-- --------------------------------------------------------

--
-- Table structure for table `manage_orders`
--

DROP TABLE IF EXISTS `manage_orders`;
CREATE TABLE IF NOT EXISTS `manage_orders` (
  `user_id` int(6) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`,`order_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manage_product`
--

DROP TABLE IF EXISTS `manage_product`;
CREATE TABLE IF NOT EXISTS `manage_product` (
  `product_id` varchar(20) NOT NULL,
  `user_id` int(6) NOT NULL,
  PRIMARY KEY (`product_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `order_status` enum('new','processing','shipping','delivered','requestedToCancel','cancelled','requestedToReturn','returned') NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
CREATE TABLE IF NOT EXISTS `order_item` (
  `product_id` varchar(20) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `item_size` varchar(20) NOT NULL,
  `item_color` varchar(10) NOT NULL,
  `item_qty` int(10) NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`product_id`),
  KEY `order_item_ibfk_2` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

DROP TABLE IF EXISTS `owner`;
CREATE TABLE IF NOT EXISTS `owner` (
  `user_id` int(6) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `email` varchar(111) NOT NULL,
  `login_id` int(6) NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  KEY `login_id` (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`user_id`, `first_name`, `last_name`, `gender`, `contact_no`, `email`, `login_id`, `is_deleted`) VALUES
(1, 'Kalinduuuuu', 'Nawanjana', 'male', '0778545965', 'kalindu@gmail.com', 6, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `order_id` varchar(20) NOT NULL,
  `payment_method` enum('cash','online payment') NOT NULL,
  `payment_status` enum('successfull','failed','pending') NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `price_category`
--

DROP TABLE IF EXISTS `price_category`;
CREATE TABLE IF NOT EXISTS `price_category` (
  `price_category_id` varchar(20) NOT NULL,
  `user_id` int(6) NOT NULL,
  `price_category_name` varchar(55) NOT NULL,
  `add_market_price` decimal(7,2) NOT NULL,
  `production_cost` decimal(7,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `product_price` decimal(7,2) NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`price_category_id`),
  KEY `price_category_ibfk_1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `price_category`
--

INSERT INTO `price_category` (`price_category_id`, `user_id`, `price_category_name`, `add_market_price`, `production_cost`, `discount`, `product_price`, `is_deleted`) VALUES
('PRC001', 970401792, 'Cotton Curve Neck', '500.00', '420.00', 5, '880.00', 'no'),
('PRC002', 970401792, 'Couple Curve Neck', '800.00', '800.00', 5, '1520.00', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` varchar(20) NOT NULL,
  `product_name` varchar(55) NOT NULL,
  `product_description` text NOT NULL,
  `is_featured` enum('yes','no') NOT NULL,
  `is_new` enum('yes','no') NOT NULL,
  `price_category_id` varchar(20) DEFAULT NULL,
  `category_id` varchar(20) DEFAULT NULL,
  `is_published` enum('yes','no') NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`product_id`),
  KEY `product_ibfk_1` (`price_category_id`),
  KEY `product_ibfk_2` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `is_featured`, `is_new`, `price_category_id`, `category_id`, `is_published`, `is_deleted`) VALUES
('PRD001', 'Moving Units Soulcal', 'asdssdadfd', 'yes', 'no', 'PRC001', 'CAT001', 'yes', 'no'),
('PRD002', 'Square Lines', 'Imported High Quality', 'yes', 'no', 'PRC001', 'CAT001', 'yes', 'no'),
('PRD003', 'Polize 883', 'Imported High Quality', 'yes', 'no', 'PRC001', 'CAT001', 'yes', 'no'),
('PRD004', 'Nightmare MM', 'High Quality Product', 'yes', 'no', 'PRC001', 'CAT001', 'yes', 'no'),
('PRD005', 'XOF FOX', 'High durable products', 'no', 'yes', 'PRC001', 'CAT001', 'yes', 'no'),
('PRD007', 'Karma Recycle', 'Imported High Quality', 'no', 'yes', 'PRC001', 'CAT001', 'yes', 'no'),
('PRD009', 'Metro D - Mix', 'High Quality Product', 'no', 'yes', 'PRC001', 'CAT001', 'yes', 'no'),
('PRD010', 'Debate This', 'High durable products', 'no', 'yes', 'PRC001', 'CAT001', 'yes', 'no'),
('PRD017', 'KP PK', 'High Quality Product', 'no', 'yes', 'PRC001', 'CAT001', 'yes', 'no'),
('PRD019', 'Down Town 74', 'Imported High Quality', 'no', 'yes', 'PRC001', 'CAT001', 'yes', 'no'),
('PRD023', 'A One Beat Couple', 'Couple T-Shirts', 'no', 'yes', 'PRC002', 'CAT002', 'yes', 'no'),
('PRD025', 'The Eye Couple', 'Imported High Quality', 'no', 'yes', 'PRC002', 'CAT002', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

DROP TABLE IF EXISTS `product_colors`;
CREATE TABLE IF NOT EXISTS `product_colors` (
  `product_id` varchar(20) NOT NULL,
  `colors` varchar(20) NOT NULL,
  PRIMARY KEY (`product_id`,`colors`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`product_id`, `colors`) VALUES
('PRD001', '#063E73'),
('PRD001', '#E10833'),
('PRD002', '#020F5A'),
('PRD002', '#25221F'),
('PRD002', '#DEE2FF'),
('PRD003', '#040910'),
('PRD003', '#084701'),
('PRD003', '#8D90A2'),
('PRD004', '#F743BE'),
('PRD004', '#FFDB2E'),
('PRD005', ' #F0F06F'),
('PRD005', '#040910'),
('PRD007', '#040910'),
('PRD007', '#6DABFF'),
('PRD009', '#0DDBFF'),
('PRD009', '#90033A'),
('PRD010', '#1B5554'),
('PRD010', '#380654'),
('PRD017', '#033A83'),
('PRD019', '#033A83'),
('PRD023', '#38E3FE'),
('PRD025', '#38E3FE');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `product_id` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`,`image`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`product_id`, `image`) VALUES
('PRD001', 'public/images/products/product_img_1.jpg'),
('PRD001', 'public/images/products/product_img_13.jpg'),
('PRD001', 'public/images/products/product_img_8.jpg'),
('PRD002', 'public/images/products/product_img_2.jpg'),
('PRD003', 'public/images/products/product_img_4.jpg'),
('PRD004', 'public/images/products/product_img_5.jpg'),
('PRD005', 'public/images/products/product_img_6.jpg'),
('PRD007', 'public/images/products/product_img_7.jpg'),
('PRD009', 'public/images/products/product_img_9.jpg'),
('PRD010', 'public/images/products/product_img_10.jpg'),
('PRD017', 'public/images/products/product_img_17.jpg'),
('PRD019', 'public/images/products/product_img_19.jpg'),
('PRD023', 'public/images/products/product_img_23.jpg'),
('PRD025', 'public/images/products/product_img_25.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

DROP TABLE IF EXISTS `product_size`;
CREATE TABLE IF NOT EXISTS `product_size` (
  `product_id` varchar(20) NOT NULL,
  `sizes` varchar(20) NOT NULL,
  PRIMARY KEY (`product_id`,`sizes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`product_id`, `sizes`) VALUES
('PRD001', 'L'),
('PRD001', 'M'),
('PRD001', 'S'),
('PRD002', 'L'),
('PRD002', 'M'),
('PRD002', 'S'),
('PRD003', 'L'),
('PRD003', 'M'),
('PRD003', 'S'),
('PRD003', 'XL'),
('PRD004', 'L'),
('PRD004', 'M'),
('PRD004', 'S'),
('PRD005', 'M'),
('PRD005', 'S'),
('PRD005', 'XS'),
('PRD007', 'L'),
('PRD007', 'M'),
('PRD007', 'S'),
('PRD009', 'L'),
('PRD009', 'M'),
('PRD009', 'S'),
('PRD010', 'L'),
('PRD010', 'S'),
('PRD017', 'M'),
('PRD017', 'S'),
('PRD019', 'S'),
('PRD019', 'XS'),
('PRD023', 'M'),
('PRD023', 'S'),
('PRD025', 'M'),
('PRD025', 'S'),
('PRD025', 'XS');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

DROP TABLE IF EXISTS `returns`;
CREATE TABLE IF NOT EXISTS `returns` (
  `order_id` varchar(20) NOT NULL,
  `user_id` int(6) NOT NULL,
  `return_id` varchar(20) NOT NULL,
  `actual_return_date` date NOT NULL,
  `expected_return_date` date NOT NULL,
  `return_status` enum('returnPending','returned') NOT NULL,
  PRIMARY KEY (`order_id`,`return_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `product_id` varchar(20) NOT NULL,
  `user_id` int(6) NOT NULL,
  `rate` int(5) NOT NULL,
  `review_text` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`product_id`,`user_id`),
  KEY `review_ibfk_2` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `search_browse`
--

DROP TABLE IF EXISTS `search_browse`;
CREATE TABLE IF NOT EXISTS `search_browse` (
  `user_id` int(6) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`user_id`,`product_id`),
  KEY `search_browse_ibfk_2` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

DROP TABLE IF EXISTS `shopping_cart`;
CREATE TABLE IF NOT EXISTS `shopping_cart` (
  `cart_id` int(6) NOT NULL AUTO_INCREMENT,
  `user_id` int(6) NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `shopping_cart_ibfk_1` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`cart_id`, `user_id`) VALUES
(1, 1),
(2, 3),
(3, 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `cart_item_ibfk_3` FOREIGN KEY (`cart_id`) REFERENCES `shopping_cart` (`cart_id`);

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `delivery_address` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `checkout_ibfk_4` FOREIGN KEY (`cart_id`) REFERENCES `shopping_cart` (`cart_id`),
  ADD CONSTRAINT `checkout_ibfk_5` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `delivery_staff` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD CONSTRAINT `delivery_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`);

--
-- Constraints for table `delivery_staff`
--
ALTER TABLE `delivery_staff`
  ADD CONSTRAINT `delivery_staff_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manage_orders`
--
ALTER TABLE `manage_orders`
  ADD CONSTRAINT `manage_orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `admin` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `manage_orders_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `manage_product`
--
ALTER TABLE `manage_product`
  ADD CONSTRAINT `manage_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manage_product_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `admin` (`user_id`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `owner_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `admin` (`user_id`),
  ADD CONSTRAINT `owner_ibfk_2` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`price_category_id`) REFERENCES `price_category` (`price_category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `returns`
--
ALTER TABLE `returns`
  ADD CONSTRAINT `returns_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `delivery_staff` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `returns_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `search_browse`
--
ALTER TABLE `search_browse`
  ADD CONSTRAINT `search_browse_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `search_browse_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

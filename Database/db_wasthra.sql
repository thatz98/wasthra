-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 05:33 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.3.24

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

CREATE TABLE `admin` (
  `user_id` int(6) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login_id` int(6) NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `first_name`, `last_name`, `gender`, `contact_no`, `email`, `login_id`, `is_deleted`) VALUES
(3, 'Thathsarana', 'Weerakoon', 'male', '0778749785', 'admin123@gmail.com', 16, 'no'),
(9, 'Andrew', 'Perera', 'male', '0784578569', 'andrewts@gmail.com', 41, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `product_id` varchar(20) NOT NULL,
  `cart_id` int(6) NOT NULL,
  `item_id` int(6) NOT NULL,
  `item_qty` int(6) NOT NULL,
  `item_color` varchar(10) NOT NULL,
  `item_size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`product_id`, `cart_id`, `item_id`, `item_qty`, `item_color`, `item_size`) VALUES
('PRD001', 9, 63, 2, '#0d0624', 'M'),
('PRD002', 22, 27, 1, '#0d0624', 'L'),
('PRD002', 9, 58, 2, '#0d0624', 'S'),
('PRD002', 9, 59, 1, '#0d0624', 'S'),
('PRD003', 9, 62, 1, '#084701', 'M'),
('PRD007', 22, 28, 1, '#6DABFF', 'L'),
('PRD019', 9, 60, 2, '#033A83', 'M'),
('PRD023', 9, 61, 1, '#12b12c', 'S-G,M-W');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `is_deleted`) VALUES
('CAT001', 'Gents', 'no'),
('CAT002', 'Couple', 'no'),
('CAT003', 'Ladies', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `address_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `cart_id` int(6) NOT NULL,
  `order_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`address_id`, `user_id`, `cart_id`, `order_id`) VALUES
(8, 26, 9, 'ORD2021031613501526'),
(8, 26, 9, 'ORD2021031710042826'),
(8, 26, 9, 'ORD2021031921360426'),
(8, 26, 9, 'ORD2021032022164326'),
(8, 26, 9, 'ORD2021032117002426'),
(8, 26, 9, 'ORD2021032117012526');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` int(6) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login_id` int(6) NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `first_name`, `last_name`, `gender`, `contact_no`, `email`, `login_id`, `is_deleted`) VALUES
(26, 'Damish', 'Nisal', 'male', '0777189752', 'damish97ts@gmail.com', 33, 'no'),
(27, 'Shehan', 'Sandeepa', 'male', '0710523967', 'shehants@gmail.com', 34, 'no'),
(28, 'Prabath', 'Darshana', 'male', '0766785426', 'prabathts@gmail.com', 35, 'no'),
(30, 'Amaya', 'Kiniwita', 'female', '0777552465', 'kinivitats@gmail.com', 37, 'no'),
(31, 'Dinuka', 'Gamlath', 'male', '0767271484', 'dinuka1998ts@gmail.com', 38, 'no'),
(33, 'Navini', 'Manthila', 'female', '0777963159', 'navini1996ts@gmail.com', 36, 'no'),
(34, 'Amasha', 'Gamage', 'female', '0777477332', 'amasha98ts@gmail.com', 42, 'no'),
(35, 'Himesh', 'Anjula', 'male', '0771458795', 'himehsants@gmail.com', 43, 'no'),
(36, 'Dinuka', 'Sandaruwan', 'male', '0762547856', 'dinukagamlathts@gmail.com', 44, 'no'),
(37, 'Imashi', 'Dissanayaka', 'female', '0714785469', 'imashits@gmail.com', 45, 'no'),
(38, 'Ravindu', 'Thiwanka', 'male', '0774125478', 'ravinduthits@gmail.com', 46, 'no'),
(39, 'Sithija', 'Lawan', 'male', '0714587854', 'lavansits@gmail.com', 47, 'no'),
(40, 'Iranga', 'Pramuditha', 'male', '0715891232', 'irangapriyam@gmail.com', 53, 'no'),
(41, 'Kavindu', 'Samaraweera', 'male', '0777778142', 'kksamaraweera1997@gmail.com', 54, 'no'),
(47, 'Thathsarana', 'Weerakoon', 'male', '0778749785', 'ffutry123@gmail.com', 60, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `order_id` varchar(20) NOT NULL,
  `delivery_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `actual_delivery_date` date NOT NULL,
  `expected_delivery_date` date NOT NULL,
  `delivery_status` enum('deliveryAssigned','shipped','delivered','pending') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address`
--

CREATE TABLE `delivery_address` (
  `user_id` int(6) NOT NULL,
  `address_id` int(6) NOT NULL,
  `postal_code` int(5) DEFAULT NULL,
  `address_line_1` varchar(55) NOT NULL,
  `address_line_2` varchar(55) NOT NULL,
  `address_line_3` varchar(55) NOT NULL,
  `city` varchar(20) NOT NULL,
  `longitude` float DEFAULT NULL,
  `latitude` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_address`
--

INSERT INTO `delivery_address` (`user_id`, `address_id`, `postal_code`, `address_line_1`, `address_line_2`, `address_line_3`, `city`, `longitude`, `latitude`) VALUES
(26, 8, 50001, '120/3', 'Uduwana', 'Digana', 'Colombo', NULL, NULL),
(26, 9, 5000, '120/3', 'Uduwana', 'Digana', 'Badulla', NULL, NULL),
(26, 17, 5000, '120/3', 'Uduwana', 'Digana', 'Matale', 80.0085, 6.8948),
(30, 7, 5500, '120/3', 'Uduwana', 'Digana', 'Badulla', NULL, NULL),
(40, 12, 70100, '109/F', 'Rathmalavinna', 'Balangoda', 'Ratnapura', NULL, NULL),
(40, 14, 70100, '109/F', 'Rathmalavinna', 'Balangoda', 'Ratnapura', NULL, NULL),
(41, 2, 10230, '126/5', 'Arawwala', 'Pannipitiya', 'Colombo', NULL, NULL),
(41, 3, 10230, '126/5', 'Arawwala', 'Pannipitiya', 'Colombo', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_charges`
--

CREATE TABLE `delivery_charges` (
  `city` varchar(101) NOT NULL,
  `delivery_fee` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_charges`
--

INSERT INTO `delivery_charges` (`city`, `delivery_fee`) VALUES
('Ampara', '150.00'),
('Anuradhapura', '150.00'),
('Badulla', '150.00'),
('Batticloa', '150.00'),
('Colombo', '150.00'),
('Galle', '150.00'),
('Gampaha', '150.00'),
('Hambanthota', '150.00'),
('Horana', '0.00'),
('Jaffna', '150.00'),
('Kalutara', '150.00'),
('Kandy', '150.00'),
('Kegalle', '150.00'),
('Kilinochchi', '150.00'),
('Kurunegala', '150.00'),
('Mannar', '150.00'),
('Matale', '150.00'),
('Monaragala', '150.00'),
('Mullativu', '150.00'),
('Nuwara Eliya', '150.00'),
('Polonnaruwa', '150.00'),
('Puttalam', '150.00'),
('Ratnapura', '150.00'),
('Trincomalee', '150.00'),
('Vauniya', '150.00');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_staff`
--

CREATE TABLE `delivery_staff` (
  `user_id` int(6) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login_id` int(6) NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_staff`
--

INSERT INTO `delivery_staff` (`user_id`, `first_name`, `last_name`, `gender`, `contact_no`, `email`, `login_id`, `is_deleted`) VALUES
(5, 'Harrington', 'Rex', 'male', '0774478544', 'harryrexts@gmail.com', 39, 'no'),
(6, 'Kavishan', 'Jayarathna', 'male', '0724587854', 'kavishants@gmail.com', 40, 'no'),
(7, 'Lasitha', 'Kumara', 'male', '0774587854', 'lasithats@gmail.com', 52, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `color` varchar(7) NOT NULL,
  `size` varchar(4) NOT NULL,
  `qty` int(11) NOT NULL,
  `reorder_qty` int(11) DEFAULT NULL,
  `reorder_level` int(11) DEFAULT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `product_id`, `color`, `size`, `qty`, `reorder_qty`, `reorder_level`, `is_deleted`) VALUES
(14, 'PRD001', '#0d0624', 'XXL', 10, NULL, NULL, 'no'),
(15, 'PRD001', '#E10833', 'L', 25, NULL, NULL, 'no'),
(16, 'PRD002', '#0d0624', 'S', 50, NULL, NULL, 'no'),
(17, 'PRD002', '#DEE2FF', 'L', 25, NULL, NULL, 'no'),
(18, 'PRD003', '#084701', 'M', 35, NULL, NULL, 'no'),
(21, 'PRD004', '#F743BE', 'L', 80, NULL, NULL, 'no'),
(23, 'PRD005', '#0d0624', 'S', 30, NULL, NULL, 'no'),
(24, 'PRD005', '#DEE2FF', 'L', 25, NULL, NULL, 'no'),
(25, 'PRD007', '#0d0624', 'M', 60, NULL, NULL, 'no'),
(26, 'PRD007', '#6DABFF', 'S', 10, NULL, NULL, 'no'),
(27, 'PRD009', '#0d0624', 'L', 20, NULL, NULL, 'no'),
(28, 'PRD009', '#34724e', 'S', 20, NULL, NULL, 'no'),
(29, 'PRD010', '#bd2e2e', 'XXL', 15, NULL, NULL, 'no'),
(30, 'PRD010', '#c9a60b', 'M', 25, NULL, NULL, 'no'),
(31, 'PRD017', '#961d55', 'XS', 35, NULL, NULL, 'no'),
(33, 'PRD003', '#0d0624', 'S', 25, NULL, NULL, 'no'),
(34, 'PRD003', '#8D90A2', 'XL', 20, NULL, NULL, 'no'),
(36, 'PRD004', '#FFDB2E', 'XL', 30, NULL, NULL, 'no'),
(37, 'PRD019', '#033A83', 'M', 100, NULL, NULL, 'no'),
(38, 'PRD001', '#0d0624', 'M', 12, NULL, NULL, 'no'),
(40, 'PRD023', '#12b12c', 'S-G', 5, NULL, NULL, 'no'),
(41, 'PRD023', '#2abcab', 'XS-W', 5, NULL, NULL, 'no'),
(42, 'PRD023', '#12b12c', 'M-W', 12, NULL, NULL, 'no'),
(43, 'PRD005', '#fff', 'XS', 5, NULL, NULL, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `user_status` enum('new','verified','blocked','retired') NOT NULL,
  `user_type` enum('delivery_staff','customer','admin','owner') NOT NULL,
  `login_id` int(6) NOT NULL,
  `token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `user_status`, `user_type`, `login_id`, `token`) VALUES
('admin123@gmail.com', '$2y$10$KsTacCGLBrrrAtaSflOL.uGJAIpciYZwN79JYF/X0u97Y76nkm3hq', 'verified', 'admin', 16, NULL),
('irangapriyam97@gmail.com', '$2y$10$w2/bRqRfKJpAzXcWMX1XS.61AZpQcVSBetAhcDCfOfySD0FGMVLVq', 'verified', 'owner', 32, NULL),
('damish97ts@gmail.com', '$2y$10$kBskRtrqrjof0dDDomolK.8nZxx.SRh//ub3fwGupkXMf2/7JnQiG', 'verified', 'customer', 33, 'lObH1LGEVdK1LUnGv6y0aA0UP4hWynLlKdPKkr5gsK0lJLHRi0bULLrP6gI2yD18aCagyIZOuA92AzKvb3iqahDjqpel9u0oy'),
('shehants@gmail.com', '$2y$10$Pb7E7IKXe/kPP8oKZyft8u1uh0t70c2aGvYIbHa2e8d.dVh8b2f2W', 'verified', 'customer', 34, 'OdoYyG9T16cusN3SpujYmmBrApH0JX5jEOgcq9rxQEwQFmWzYKMaUvFUrszFmPEByPYzFUGtmDzehABmEtCPmdKSy0vDHH4Yw'),
('prabathts@gmail.com', '$2y$10$H9s55XP8A/6ybYguK9KZn./EahFL4EueETjB46OvgtAKTSIYeBuMK', 'verified', 'customer', 35, 'IyuMakPqhj9X71Ztuu9tcaHbPSJbxLRIg2LL4nn0jRK1XpAjOhNOXkocP0PyjZtuhtdA1M86A9bsk1hMYPEdwx8OyyRbgII1C'),
('navini1996ts@gmail.com', '$2y$10$MFXa2D4bshk.cjm7JLgSL.fll02pk0g4c1KD4cRgTR2.GCjrHAQeS', 'verified', 'customer', 36, 'iv41FFHoacz6JUz7Y0MfqAF96d0tQVuBbo5dhkm7vQyJkMF2WBal8CssZh7G7opKQnsH4nAVWvD92tr0mlsHcc07IZ9LXmv7Y'),
('kinivitats@gmail.com', '$2y$10$td32R4PnoWPygW2/z13s3.2LsRoXg6faMZjsCVherThEB5m5/IHge', 'verified', 'customer', 37, '5UbnCUubDtNTW43z0HQWRBIr3vuvljvkZIColgSI8YAsvHNb5JI0ZMjJKu2BMG75BJxdjPkhFDRoIjndD3aw2eBrmyhBVzyIV'),
('dinuka1998ts@gmail.com', '$2y$10$gp6j0FvxvGqdZfLTknvu6e8TNTz.O6od1FXDAYEZDUOG/l9MIHh0u', 'verified', 'customer', 38, 'QEQWd4LOgM4orBFCMnyMKB1T27BSWbLrQOk4oeQyGQ1F0ddFUL9bjgtjnxnEHmUDCw4dqzVJzxErWo11vhEHtibD5z972pwNw'),
('harryrexts@gmail.com', '$2y$10$ROKMHEsvTY2QaQJk6BusvOfBlzBs3cJ1pvIbbI5RjoDWDZ1BgzRfu', 'verified', 'delivery_staff', 39, NULL),
('kavishants@gmail.com', '$2y$10$Nrnzt1ZsOPS.lF0xRkV3j.oQuwwHbMqaYmfqeItqE8WCZpU1xGl5e', 'verified', 'delivery_staff', 40, NULL),
('andrewts@gmail.com', '$2y$10$lAcRUk81oYZesrN393AKKe72L.wi6oK/s7xIS5S/QdBNskghIEga.', 'new', 'admin', 41, NULL),
('amasha98ts@gmail.com', '$2y$10$09G/bve0h9TgSEqsfB/ssuNQYLFhIpuBo16S1mlSJ1LBGNMG8nOKm', 'verified', 'customer', 42, 'mdBI5dhfSKLXrqboApystxIgi1HaarZJROPvsD8rQfym95ADkHKZQdzD6QrJCRAaGVieknOltypMznBSynjAjcwDgEdjrk7fS'),
('himehsants@gmail.com', '$2y$10$2PZZeNCaZP0hPAByLJQqu.AvXvJqgIn.nIXaAT99EFPApZ2.5lItK', 'verified', 'customer', 43, 'zf8QGKdlFh88CUTeUulFjSSH1pBra6IVKbd73O3zeTXeFoLxmuCpKD4v4khlxzHlXSJejKyKm1emZmSwpK2FWqgb6tIMB0ix4'),
('dinukagamlathts@gmail.com', '$2y$10$6aZrEUxv.FQHjIMK5.r6JO5JPTjDkuhVCHTbqmHxzfrGKKVPTBpB2', 'new', 'customer', 44, 'sSyIj4fIpspzf90qeM0oPhT1ABLhQsbN7athtlj5sBbuYDQqZrsYhiExvnK8O82nGYs2YsKNstVJpniKfib9u20E4HDh2zr9g'),
('imashits@gmail.com', '$2y$10$NMQaIcHMY/Y6Iz/fMQQuWu.6oa6v7D9PtOoPNzakD8SW41D6xslo2', 'new', 'customer', 45, 'Urjxveqw74poMK1bXjI73NBv6izJTaCG8Y8LCKaO1YsJLpffGH2HiqxuKbldl2gAWZ6j6SsrNFvM9aS42vYsYuaHpHEbpLgkG'),
('ravinduthits@gmail.com', '$2y$10$lhfMUSYjEhIHF/uUAZr/3e.bRehOGQg.DpWF3X1y2R1i.VvDxO/ku', 'new', 'customer', 46, 'm7SqQXnA3OB46M8DGKLTwSf1nBzk12ijsdqf1m2JvKZvkBz7w2oDuwNDib9NrUmcFuZ3nzmJ7KhrlN9zMMsSBMHfU5uYFrKQv'),
('lavansits@gmail.com', '$2y$10$WnB3b.S9l/syS9fRpm2xseVPdeqm9QhvoIN9sLz0fulZNvKqGAvq6', 'new', 'customer', 47, 'GmJZGJY8I6BJ50zKuqi88aktGJPxPKTfkxmHcb21QPhkexSQg2BE17U1rRBOM4leujaVUoXTF5iQoPzO1YQIAbGZiLCkkk562'),
('nuwan.sm2@gmail.com', '$2y$10$5YNoFPhmsa4WZxWuFgvJz.4W89zsNwccw.SgVXRQNFeUCI2TxCqfm', 'verified', 'owner', 51, NULL),
('lasithats@gmail.com', '$2y$10$2BEQ.jcB.PhF9Acd8v4tmORuMplDgQ5eZzyT/sRghwS.5f4eyxzPm', 'verified', 'delivery_staff', 52, NULL),
('irangapriyam@gmail.com', '$2y$10$FLfiMkbVYsQKBDPDfL86AeF3CJkGmgHKa9aQ51zMxGojrYwdS7jaS', 'verified', 'customer', 53, NULL),
('kksamaraweera1997@gmail.com', '$2y$10$P16Aj0anNVjQqYkqmqMcf.SXUKPLVW/bol.nCCA1yLKEcm3Ireziu', 'verified', 'customer', 54, 'Uwsj6fvZwRC2kzKqKWJbauDYxWKJDW1OBvItYSkpxy3cn49VOn7zl3WdyR9XWqhZKRKj1DdovXSOWkui5XCvKUgtc8howDIsc'),
('ffutry123@gmail.com', '$2y$10$9ODCZxNYY0NyOkf9wRYgEOjvi2sstZB69KSEl.wgWRQCmW0IYuSuK', 'verified', 'customer', 60, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manage_orders`
--

CREATE TABLE `manage_orders` (
  `user_id` int(6) NOT NULL,
  `order_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manage_product`
--

CREATE TABLE `manage_product` (
  `product_id` varchar(20) NOT NULL,
  `user_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `order_status` enum('New','Processing','Out for Delivery','In Transit','Delivered','Delivery Failed','Completed','Cancelled','Returned','Requested to Return','Requested to Cancel') NOT NULL,
  `delivery_comment` varchar(255) DEFAULT NULL,
  `tracking_id` int(6) NOT NULL,
  `cancel_comment` varchar(255) DEFAULT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `date`, `time`, `order_status`, `delivery_comment`, `tracking_id`, `cancel_comment`, `is_deleted`) VALUES
('ORD2021031613501526', '2021-03-16', '13:50:15', 'New', '    fgdghn                            ', 0, NULL, 'no'),
('ORD2021031710042826', '2021-03-17', '10:04:28', 'Out for Delivery', '      asa                          ', 0, NULL, 'no'),
('ORD2021031921360426', '2021-03-19', '21:36:04', 'New', '      fewrfw                          ', 0, NULL, 'no'),
('ORD2021032022164326', '2021-03-20', '22:16:43', 'New', '          ert                      ', 0, NULL, 'no'),
('ORD2021032117002426', '2021-03-21', '17:00:24', 'New', '   fgdrt                             ', 0, NULL, 'no'),
('ORD2021032117012526', '2021-03-21', '17:01:25', 'New', '        fyfgj                        ', 0, NULL, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `product_id` varchar(20) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `item_size` varchar(20) NOT NULL,
  `item_color` varchar(10) NOT NULL,
  `item_qty` int(10) NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`product_id`, `order_id`, `item_size`, `item_color`, `item_qty`, `is_deleted`) VALUES
('PRD001', 'ORD2021031613501526', 'M', '#0d0624', 1, 'no'),
('PRD001', 'ORD2021032117002426', 'L', '#E10833', 2, 'no'),
('PRD002', 'ORD2021031710042826', 'S', '#0d0624', 1, 'no'),
('PRD002', 'ORD2021031921360426', 'S', '#0d0624', 2, 'no'),
('PRD003', 'ORD2021031613501526', 'M', '#084701', 2, 'no'),
('PRD003', 'ORD2021031921360426', 'S', '#0d0624', 4, 'no'),
('PRD003', 'ORD2021032117012526', 'S', '#0d0624', 1, 'no'),
('PRD005', 'ORD2021031710042826', 'L', '#DEE2FF', 2, 'no'),
('PRD017', 'ORD2021031921360426', 'XS', '#961d55', 2, 'no'),
('PRD023', 'ORD2021031921360426', 'S-G,M-W', '#12b12c', 3, 'no'),
('PRD023', 'ORD2021032022164326', 'S-G,M-W', '#12b12c', 2, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `order_tracking`
--

CREATE TABLE `order_tracking` (
  `order_id` varchar(20) NOT NULL,
  `ordered` datetime DEFAULT NULL,
  `processed` datetime DEFAULT NULL,
  `outForDelivery` datetime DEFAULT NULL,
  `inTransit` datetime DEFAULT NULL,
  `delivered` datetime DEFAULT NULL,
  `tracking_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_tracking`
--

INSERT INTO `order_tracking` (`order_id`, `ordered`, `processed`, `outForDelivery`, `inTransit`, `delivered`, `tracking_id`) VALUES
('ORD2021031710042826', '0000-00-00 00:00:00', '2021-03-17 12:18:43', '2021-03-17 12:18:39', '2021-03-17 12:18:39', '2021-03-17 12:13:06', 1),
('ORD2021031921360426', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2),
('ORD2021032022164326', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 3),
('ORD2021032117002426', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 4),
('ORD2021032117012526', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `user_id` int(6) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `email` varchar(111) NOT NULL,
  `login_id` int(6) NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`user_id`, `first_name`, `last_name`, `gender`, `contact_no`, `email`, `login_id`, `is_deleted`) VALUES
(3, 'Iranga', 'Mudalige', 'male', '0711234567', 'irangapriyam97@gmail.com', 32, 'no'),
(7, 'Nuwan', 'Samararathne', 'male', '0773738877', 'nuwan.sm2@gmail.com', 51, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `reset_id` int(6) NOT NULL,
  `username` varchar(110) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`reset_id`, `username`, `token`) VALUES
(1, 'kalindu@gmail.com', 'zZ6lu7Wm2NGJnQrEa8PjIGBTjbmlNDL0wNKiKdOSUBoPfX8LpYiEf32d4yBfLRhQOaQPkzdranLU0iZ3gnaKpMex75HJud3om'),
(3, 'kksamaraweera1997@gmail.com', 'bepXpSwzSbSJVSfKCibQGhdu9yrEGmDhjcMY0p90uf5XOKtGTebVsQujM1EqJOcWLdjMS5K21BxDHFscR2bWaOZoWANy6HKKX'),
(4, 'ffutry123@gmail.com', 'Ny0HmWDmPzIkpfR0Mzy0YvtnHgtnltefj8NHk21O8puSSckqShxIiRXz1pL03842Qnau3L9JX21krMSO3i6dfXpvsbPphpVNl');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `order_id` varchar(20) NOT NULL,
  `payment_method` enum('cashOnDelivery','online payment') NOT NULL,
  `payment_status` enum('successfull','failed','pending') NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`order_id`, `payment_method`, `payment_status`, `is_deleted`) VALUES
('ORD2021031613501526', 'cashOnDelivery', 'pending', 'no'),
('ORD2021031710042826', 'cashOnDelivery', 'pending', 'no'),
('ORD2021031921360426', 'cashOnDelivery', 'pending', 'no'),
('ORD2021032022164326', 'online payment', 'pending', 'no'),
('ORD2021032117002426', 'cashOnDelivery', 'pending', 'no'),
('ORD2021032117012526', 'cashOnDelivery', 'pending', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `price_category`
--

CREATE TABLE `price_category` (
  `price_category_id` varchar(20) NOT NULL,
  `user_id` int(6) NOT NULL,
  `price_category_name` varchar(55) NOT NULL,
  `add_market_price` decimal(7,2) NOT NULL,
  `production_cost` decimal(7,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `product_price` decimal(7,2) NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `price_category`
--

INSERT INTO `price_category` (`price_category_id`, `user_id`, `price_category_name`, `add_market_price`, `production_cost`, `discount`, `product_price`, `is_deleted`) VALUES
('PRC001', 970401792, 'Cotton Curve Neck', '500.00', '420.00', 5, '880.00', 'no'),
('PRC002', 970401792, 'Couple Curve Neck', '800.00', '800.00', 5, '1520.00', 'no'),
('PRC232', 3, 'hfghfd', '234.00', '123.00', 0, '357.00', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(20) NOT NULL,
  `product_name` varchar(55) NOT NULL,
  `product_description` text NOT NULL,
  `is_featured` enum('yes','no') NOT NULL,
  `is_new` enum('yes','no') NOT NULL,
  `price_category_id` varchar(20) DEFAULT NULL,
  `category_id` varchar(20) DEFAULT NULL,
  `is_published` enum('yes','no') NOT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  `meta_product_name` text NOT NULL,
  `meta_product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `is_featured`, `is_new`, `price_category_id`, `category_id`, `is_published`, `is_deleted`, `meta_product_name`, `meta_product_desc`) VALUES
('PRD001', 'Moving Units Soulcal', 'cotton t-shirt with curve neck, High quality casual wear hi. ', 'yes', 'no', 'PRC001', 'CAT001', 'yes', 'no', 'MFNKNTSSLKL', 'KTNTXRTW0KRFNKHFKLTKSLWRH'),
('PRD002', 'Square Lines', 'Collarless cotton high quality t-shirts for men ', 'yes', 'no', 'PRC001', 'CAT001', 'yes', 'no', 'SKRLNS', 'KLRLSKTNHFKLTTXRTSFRMN'),
('PRD003', 'Polize 883', 'Men\'s poly cotton t-shirt Polize 883, Simple design.', 'yes', 'yes', 'PRC001', 'CAT001', 'yes', 'no', 'PLS', 'MNSPLKTNTXRTPLSSMPLTSN'),
('PRD004', 'Nightmare MM', 'Men\'s tri blend t-shirt with simple neck ', 'yes', 'no', 'PRC001', 'CAT001', 'yes', 'no', 'NFTMRM', 'MNSTRBLNTTXRTW0SMPLNK'),
('PRD005', 'XOF FOX', 'Vintage casual wear suitable for 18-26 age range , high durable product', 'yes', 'yes', 'PRC001', 'CAT001', 'yes', 'no', 'SFFKS', 'FNTJKSLWRSTBLFRJRNJHFTRBLPRTKT'),
('PRD007', 'Karma Recycle', 'Karma recycle Gifts retro vintage T-shirt', 'no', 'yes', 'PRC001', 'CAT001', 'yes', 'no', 'KRMRSKL', 'KRMRSKLJFTSRTRFNTJTXRT'),
('PRD009', 'Metro D - Mix', 'Men\'s Tipped Polo T-shirt with a design , High quality ', 'no', 'yes', 'PRC001', 'CAT001', 'yes', 'no', 'MTRTMKS', 'MNSTPTPLTXRTW0TSNHFKLT'),
('PRD010', 'Debate This', 'Limited stock casual wear with an awesome discount, Cotton material suits for 16-30 age group.', 'no', 'yes', 'PRC001', 'CAT001', 'yes', 'no', 'TBT0S', 'LMTTSTKKSLWRW0NWSMTSKNTKTNMTRLSTSFRJKRP'),
('PRD017', 'KP PK', 'High Quality Product and designed for heat absorb as well.', 'no', 'yes', 'PRC001', 'CAT001', 'yes', 'no', 'KPPK', 'HFKLTPRTKTNTTSNTFRHTBSRBSWL'),
('PRD019', 'Down Town 74', 'Blue color branded T-shirt for Men matching with trousers like denims and light color jeans.', 'no', 'yes', 'PRC001', 'CAT001', 'yes', 'no', 'TNTN', 'BLKLRBRNTTTXRTFRMNMXNKW0TRSRSLKTNMSNTLFTKLRJNS'),
('PRD023', 'A One Beat Couple', 'Cotton couple T-Shirts with curve neck and simple design, Perfect gift for your partner for a discounted price.', 'yes', 'yes', 'PRC002', 'CAT002', 'yes', 'no', 'ANBTKPL', 'KTNKPLTXRTSW0KRFNKNTSMPLTSNPRFKTJFTFRYRPRTNRFRTSKNTTPRS'),
('PRD024', 'The Eye Couple', 'Limited edition for couples, Hurry up grab your T-shirt.', 'yes', 'yes', 'PRC002', 'CAT002', 'yes', 'no', '', ''),
('PRD123', 'sdf fdrfs dfs', 'ewrgfwe', 'yes', 'yes', 'PRC002', 'CAT001', 'yes', 'no', 'STFFTRFSTFS', 'ERKFW');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `product_id` varchar(20) NOT NULL,
  `colors` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`product_id`, `colors`) VALUES
('PRD001', '#0d0624'),
('PRD001', '#E10833'),
('PRD002', '#0d0624'),
('PRD002', '#DEE2FF	'),
('PRD003', ' #0d0624'),
('PRD003', ' #8D90A2'),
('PRD003', '#084701'),
('PRD004', ' #FFDB2E'),
('PRD004', '#8D90A2'),
('PRD004', '#F743BE'),
('PRD004', '#FFDB2E'),
('PRD005', '#0d0624'),
('PRD005', '#DEE2FF'),
('PRD005', '#fff'),
('PRD007', '#0d0624'),
('PRD007', '#6DABFF'),
('PRD009', '#0d0624'),
('PRD009', '#34724e'),
('PRD010', '#bd2e2e'),
('PRD010', '#c9a60b'),
('PRD017', '#961d55'),
('PRD019', ' #033A83'),
('PRD019', '#033A83	'),
('PRD023', '#12b12c'),
('PRD023', '#12cb23'),
('PRD023', '#2abcab'),
('PRD023', '#38E3FE'),
('PRD024', '#38E3FE'),
('PRD123', '#123456');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `product_id` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`product_id`, `image`) VALUES
('PRD001', 'public/images/products/product_img_1.jpg'),
('PRD001', 'public/images/products/product_img_13.jpg'),
('PRD001', 'public/images/products/product_img_8.jpg'),
('PRD002', 'public/images/products/product_img_2.jpg'),
('PRD002', 'public/images/products/product_img_3.jpg'),
('PRD002', 'public/images/products/product_img_50.jpg'),
('PRD003', 'public/images/products/product_img_4.jpg'),
('PRD003', 'public/images/products/product_img_43.jpg'),
('PRD004', 'public/images/products/product_img_48.jpg'),
('PRD004', 'public/images/products/product_img_5.jpg'),
('PRD005', 'public/images/products/product_img_53.jpg'),
('PRD005', 'public/images/products/product_img_6.jpg'),
('PRD007', 'public/images/products/product_img_18.jpg'),
('PRD007', 'public/images/products/product_img_7.jpg'),
('PRD009', 'public/images/products/product_img_9.jpg'),
('PRD010', 'public/images/products/product_img_10.jpg'),
('PRD017', 'public/images/products/product_img_17.jpg'),
('PRD019', 'public/images/products/product_img_19.jpg'),
('PRD023', 'public/images/products/product_img_24.jpg'),
('PRD024', 'public/images/products/product_img_25.jpg'),
('PRD123', 'public/images/products/image_2021-01-15_204251.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `product_id` varchar(20) NOT NULL,
  `sizes` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`product_id`, `sizes`) VALUES
('PRD001', 'L'),
('PRD001', 'S'),
('PRD001', 'XXL'),
('PRD002', 'L'),
('PRD002', 'M'),
('PRD002', 'S'),
('PRD003', 'L'),
('PRD003', 'M'),
('PRD003', 'S'),
('PRD003', 'XL'),
('PRD003', 'XS'),
('PRD004', 'L'),
('PRD004', 'M'),
('PRD004', 'S'),
('PRD004', 'XL'),
('PRD005', 'L'),
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
('PRD010', 'M'),
('PRD010', 'S'),
('PRD010', 'XXL'),
('PRD017', 'M'),
('PRD017', 'S'),
('PRD017', 'XS'),
('PRD019', 'M'),
('PRD019', 'S'),
('PRD019', 'XS'),
('PRD023', 'L-G'),
('PRD023', 'L-W'),
('PRD023', 'M-G'),
('PRD023', 'M-W'),
('PRD023', 'S-G'),
('PRD023', 'S-W'),
('PRD023', 'XS-W'),
('PRD024', 'L-G'),
('PRD024', 'M-G'),
('PRD024', 'M-W'),
('PRD024', 'S-G'),
('PRD024', 'S-W'),
('PRD024', 'XS-W'),
('PRD123', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `order_id` varchar(20) NOT NULL,
  `user_id` int(6) DEFAULT NULL,
  `return_id` int(6) NOT NULL,
  `actual_return_date` date DEFAULT NULL,
  `expected_return_date` date NOT NULL,
  `return_comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `product_id` varchar(20) NOT NULL,
  `user_id` int(6) NOT NULL,
  `rate` int(5) NOT NULL,
  `review_text` text NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  `review_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`product_id`, `user_id`, `rate`, `review_text`, `date`, `time`, `is_deleted`, `review_id`) VALUES
('PRD001', 41, 5, 'I really enjoy shopping with Wasthra!!!', '2020-11-23', '07:08:29', 'no', 51),
('PRD002', 26, 4, 'Good quality and good price.', '2020-11-23', '06:46:03', 'no', 44),
('PRD002', 31, 4, 'Excellent variety of shirts available.', '2020-11-23', '06:55:18', 'no', 49),
('PRD003', 31, 4, 'Excellent variety of shirts available.', '2020-11-23', '06:54:59', 'no', 48),
('PRD003', 41, 5, 'I really enjoy shopping with Wasthra!!!', '2020-11-23', '07:08:16', 'no', 50),
('PRD004', 26, 5, 'Excellent prices and quality.. love this site!!!', '2020-11-23', '06:45:27', 'no', 43),
('PRD004', 27, 5, 'I especially love the texture and quality. I will definitely recommend.', '2020-11-23', '06:48:47', 'no', 45),
('PRD004', 28, 4, 'Great selection, great prices and \r\nhappy I found this shop.', '2020-11-23', '06:50:52', 'no', 46),
('PRD007', 41, 4, 'Your items are mostly unique', '2020-11-23', '07:09:21', 'no', 52),
('PRD024', 30, 5, 'Quality products & this website is very easy to navigate!!! ', '2020-11-23', '06:53:35', 'no', 47),
('PRD024', 41, 4, 'These clothes are absolutely gorgeous!', '2020-11-23', '07:10:35', 'no', 53);

-- --------------------------------------------------------

--
-- Table structure for table `review_image`
--

CREATE TABLE `review_image` (
  `review_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `search_browse`
--

CREATE TABLE `search_browse` (
  `user_id` int(6) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `cart_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`cart_id`, `user_id`) VALUES
(9, 26),
(10, 27),
(11, 28),
(13, 30),
(14, 31),
(15, 34),
(16, 35),
(17, 36),
(18, 37),
(19, 38),
(20, 39),
(21, 40),
(22, 41),
(28, 47);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `date`, `time`) VALUES
(1, 'wdqdwefdqw', '2021-03-13', '11:06:13'),
(2, '127.0.0.1', '2021-03-13', '11:06:31'),
(3, '127.0.0.1', '2021-03-13', '11:06:37'),
(4, '127.0.0.1', '2021-03-13', '11:07:53'),
(5, '127.0.0.1', '2021-03-13', '11:55:52'),
(6, '127.0.0.1', '2021-03-13', '11:56:05'),
(7, '127.0.0.1', '2021-03-13', '11:56:06'),
(8, '127.0.0.1', '2021-03-13', '11:56:27'),
(9, '127.0.0.1', '2021-03-13', '11:56:55'),
(10, '127.0.0.1', '2021-03-13', '11:57:46'),
(11, '127.0.0.1', '2021-03-13', '11:57:47'),
(12, '127.0.0.1', '2021-03-13', '11:57:48'),
(13, '127.0.0.1', '2021-03-14', '12:22:06'),
(14, '127.0.0.1', '2021-03-14', '12:22:41'),
(15, '127.0.0.1', '2021-03-14', '12:22:43'),
(16, '127.0.0.1', '2021-03-14', '12:22:45'),
(17, '127.0.0.1', '2021-03-14', '12:22:49'),
(18, '127.0.0.1', '2021-03-14', '12:25:21'),
(19, '127.0.0.1', '2021-03-14', '12:26:14'),
(20, '127.0.0.1', '2021-03-14', '12:26:49'),
(21, '127.0.0.1', '2021-03-14', '12:26:55'),
(22, '127.0.0.1', '2021-03-14', '12:28:08'),
(23, '127.0.0.1', '2021-03-14', '12:28:33'),
(24, '127.0.0.1', '2021-03-14', '12:29:40'),
(25, '127.0.0.1', '2021-03-14', '12:31:05'),
(26, '127.0.0.1', '2021-03-14', '12:31:23'),
(27, '127.0.0.1', '2021-03-14', '12:31:50'),
(28, '127.0.0.1', '2021-03-14', '12:43:20'),
(29, '127.0.0.1', '2021-03-14', '12:45:04'),
(30, '127.0.0.1', '2021-03-14', '12:48:40'),
(31, '127.0.0.1', '2021-03-14', '12:49:34'),
(32, '127.0.0.1', '2021-03-14', '12:57:30'),
(33, '127.0.0.1', '2021-03-14', '12:57:30'),
(34, '127.0.0.1', '2021-03-14', '12:57:36'),
(35, '127.0.0.1', '2021-03-14', '12:57:39'),
(36, '127.0.0.1', '2021-03-14', '12:57:46'),
(37, '127.0.0.1', '2021-03-14', '12:58:00'),
(38, '127.0.0.1', '2021-03-14', '12:58:02'),
(39, '127.0.0.1', '2021-03-14', '12:58:04'),
(40, '127.0.0.1', '2021-03-14', '13:01:22'),
(41, '127.0.0.1', '2021-03-14', '13:01:29'),
(42, '127.0.0.1', '2021-03-14', '13:01:34'),
(43, '127.0.0.1', '2021-03-14', '13:01:40'),
(44, '127.0.0.1', '2021-03-14', '13:02:16'),
(45, '127.0.0.1', '2021-03-14', '13:02:20'),
(46, '127.0.0.1', '2021-03-14', '13:14:06'),
(47, '127.0.0.1', '2021-03-15', '11:05:52'),
(48, '127.0.0.1', '2021-03-15', '11:11:20'),
(49, '127.0.0.1', '2021-03-15', '11:11:21'),
(50, '127.0.0.1', '2021-03-15', '11:11:22'),
(51, '127.0.0.1', '2021-03-15', '11:13:01'),
(52, '127.0.0.1', '2021-03-15', '11:13:02'),
(53, '127.0.0.1', '2021-03-15', '11:13:41'),
(54, '127.0.0.1', '2021-03-15', '11:14:48'),
(55, '127.0.0.1', '2021-03-15', '11:15:08'),
(56, '127.0.0.1', '2021-03-15', '11:15:24'),
(57, '127.0.0.1', '2021-03-15', '11:16:22'),
(58, '127.0.0.1', '2021-03-15', '11:17:07'),
(59, '127.0.0.1', '2021-03-15', '11:17:11'),
(60, '127.0.0.1', '2021-03-15', '11:17:38'),
(61, '127.0.0.1', '2021-03-15', '11:19:20'),
(62, '127.0.0.1', '2021-03-15', '11:19:48'),
(63, '127.0.0.1', '2021-03-15', '11:19:49'),
(64, '127.0.0.1', '2021-03-15', '11:19:51'),
(65, '127.0.0.1', '2021-03-15', '11:20:22'),
(66, '127.0.0.1', '2021-03-15', '11:20:58'),
(67, '127.0.0.1', '2021-03-15', '11:22:27'),
(68, '127.0.0.1', '2021-03-15', '11:23:34'),
(69, '127.0.0.1', '2021-03-15', '11:35:39'),
(70, '127.0.0.1', '2021-03-15', '11:35:48'),
(71, '127.0.0.1', '2021-03-15', '12:25:43'),
(72, '127.0.0.1', '2021-03-15', '12:26:15'),
(73, '127.0.0.1', '2021-03-15', '12:27:05'),
(74, '127.0.0.1', '2021-03-15', '12:27:15'),
(75, '127.0.0.1', '2021-03-15', '12:27:41'),
(76, '127.0.0.1', '2021-03-15', '12:36:53'),
(77, '127.0.0.1', '2021-03-15', '12:37:17'),
(78, '127.0.0.1', '2021-03-15', '12:37:35'),
(79, '127.0.0.1', '2021-03-15', '12:38:01'),
(80, '127.0.0.1', '2021-03-15', '12:38:08'),
(81, '127.0.0.1', '2021-03-15', '12:38:34'),
(82, '127.0.0.1', '2021-03-15', '12:38:35'),
(83, '127.0.0.1', '2021-03-15', '12:38:36'),
(84, '127.0.0.1', '2021-03-15', '12:38:56'),
(85, '127.0.0.1', '2021-03-15', '12:40:03'),
(86, '127.0.0.1', '2021-03-15', '12:42:54'),
(87, '127.0.0.1', '2021-03-15', '12:43:16'),
(88, '127.0.0.1', '2021-03-15', '12:48:31'),
(89, '127.0.0.1', '2021-03-15', '12:48:41'),
(90, '127.0.0.1', '2021-03-15', '12:48:55'),
(91, '127.0.0.1', '2021-03-15', '12:49:51'),
(92, '127.0.0.1', '2021-03-15', '16:01:15'),
(93, '127.0.0.1', '2021-03-15', '16:01:28'),
(94, '127.0.0.1', '2021-03-15', '16:01:30'),
(95, '127.0.0.1', '2021-03-15', '16:01:31'),
(96, '127.0.0.1', '2021-03-15', '16:01:42'),
(97, '127.0.0.1', '2021-03-15', '16:01:48'),
(98, '127.0.0.1', '2021-03-15', '16:08:42'),
(99, '127.0.0.1', '2021-03-15', '16:09:51'),
(100, '127.0.0.1', '2021-03-15', '16:10:21'),
(101, '127.0.0.1', '2021-03-15', '16:10:54'),
(102, '127.0.0.1', '2021-03-15', '16:11:09'),
(103, '127.0.0.1', '2021-03-15', '16:11:40'),
(104, '127.0.0.1', '2021-03-15', '16:11:42'),
(105, '127.0.0.1', '2021-03-15', '16:12:20'),
(106, '127.0.0.1', '2021-03-15', '16:12:21'),
(107, '127.0.0.1', '2021-03-15', '16:12:27'),
(108, '127.0.0.1', '2021-03-15', '16:15:07'),
(109, '127.0.0.1', '2021-03-15', '16:15:08'),
(110, '127.0.0.1', '2021-03-15', '16:15:09'),
(111, '127.0.0.1', '2021-03-15', '16:15:10'),
(112, '127.0.0.1', '2021-03-15', '16:15:11'),
(113, '127.0.0.1', '2021-03-15', '16:15:43'),
(114, '127.0.0.1', '2021-03-15', '16:15:45'),
(115, '127.0.0.1', '2021-03-15', '16:15:46'),
(116, '127.0.0.1', '2021-03-15', '16:15:49'),
(117, '127.0.0.1', '2021-03-15', '16:21:18'),
(118, '127.0.0.1', '2021-03-15', '16:27:21'),
(119, '127.0.0.1', '2021-03-15', '16:28:11'),
(120, '127.0.0.1', '2021-03-15', '16:30:51'),
(121, '127.0.0.1', '2021-03-15', '16:31:11'),
(122, '127.0.0.1', '2021-03-15', '16:31:34'),
(123, '127.0.0.1', '2021-03-15', '16:31:34'),
(124, '127.0.0.1', '2021-03-15', '16:33:08'),
(125, '127.0.0.1', '2021-03-15', '16:33:47'),
(126, '127.0.0.1', '2021-03-15', '16:33:48'),
(127, '127.0.0.1', '2021-03-15', '17:05:40'),
(128, '127.0.0.1', '2021-03-15', '17:06:39'),
(129, '127.0.0.1', '2021-03-15', '17:07:16'),
(130, '127.0.0.1', '2021-03-15', '17:08:53'),
(131, '127.0.0.1', '2021-03-15', '17:10:46'),
(132, '127.0.0.1', '2021-03-15', '17:11:26'),
(133, '127.0.0.1', '2021-03-15', '17:11:43'),
(134, '127.0.0.1', '2021-03-15', '17:12:13'),
(135, '127.0.0.1', '2021-03-15', '18:20:54'),
(136, '127.0.0.1', '2021-03-15', '18:21:53'),
(137, '127.0.0.1', '2021-03-15', '18:22:45'),
(138, '127.0.0.1', '2021-03-15', '18:23:07'),
(139, '127.0.0.1', '2021-03-15', '18:23:08'),
(140, '127.0.0.1', '2021-03-15', '18:23:11'),
(141, '127.0.0.1', '2021-03-15', '18:24:00'),
(142, '127.0.0.1', '2021-03-15', '18:24:03'),
(143, '127.0.0.1', '2021-03-15', '18:24:33'),
(144, '127.0.0.1', '2021-03-15', '18:25:21'),
(145, '127.0.0.1', '2021-03-15', '18:30:20'),
(146, '127.0.0.1', '2021-03-15', '18:30:32'),
(147, '127.0.0.1', '2021-03-15', '18:32:57'),
(148, '127.0.0.1', '2021-03-15', '18:33:57'),
(149, '127.0.0.1', '2021-03-15', '18:34:17'),
(150, '127.0.0.1', '2021-03-15', '18:36:28'),
(151, '127.0.0.1', '2021-03-15', '18:39:11'),
(152, '127.0.0.1', '2021-03-15', '18:39:29'),
(153, '127.0.0.1', '2021-03-15', '18:39:55'),
(154, '127.0.0.1', '2021-03-15', '18:39:59'),
(155, '127.0.0.1', '2021-03-15', '19:07:26'),
(156, '127.0.0.1', '2021-03-15', '19:14:05'),
(157, '127.0.0.1', '2021-03-15', '19:14:05'),
(158, '127.0.0.1', '2021-03-15', '19:14:08'),
(159, '127.0.0.1', '2021-03-15', '19:14:09'),
(160, '127.0.0.1', '2021-03-15', '19:14:11'),
(161, '127.0.0.1', '2021-03-15', '19:14:15'),
(162, '127.0.0.1', '2021-03-15', '19:33:45'),
(163, '127.0.0.1', '2021-03-15', '19:34:30'),
(164, '127.0.0.1', '2021-03-15', '19:35:47'),
(165, '127.0.0.1', '2021-03-15', '19:36:10'),
(166, '127.0.0.1', '2021-03-15', '19:36:26'),
(167, '127.0.0.1', '2021-03-15', '19:36:31'),
(168, '127.0.0.1', '2021-03-15', '19:36:56'),
(169, '127.0.0.1', '2021-03-15', '19:38:12'),
(170, '127.0.0.1', '2021-03-15', '19:38:17'),
(171, '127.0.0.1', '2021-03-15', '19:38:18'),
(172, '127.0.0.1', '2021-03-15', '19:38:24'),
(173, '127.0.0.1', '2021-03-15', '19:38:26'),
(174, '127.0.0.1', '2021-03-15', '19:38:28'),
(175, '127.0.0.1', '2021-03-15', '19:38:29'),
(176, '127.0.0.1', '2021-03-15', '19:41:31'),
(177, '127.0.0.1', '2021-03-15', '19:44:21'),
(178, '127.0.0.1', '2021-03-15', '19:45:02'),
(179, '127.0.0.1', '2021-03-15', '20:00:32'),
(180, '127.0.0.1', '2021-03-15', '20:13:35'),
(181, '127.0.0.1', '2021-03-15', '20:13:38'),
(182, '127.0.0.1', '2021-03-15', '22:12:58'),
(183, '127.0.0.1', '2021-03-15', '22:13:07'),
(184, '127.0.0.1', '2021-03-15', '22:13:11'),
(185, '127.0.0.1', '2021-03-15', '22:13:14'),
(186, '127.0.0.1', '2021-03-15', '22:13:18'),
(187, '127.0.0.1', '2021-03-15', '22:13:39'),
(188, '127.0.0.1', '2021-03-15', '22:14:27'),
(189, '127.0.0.1', '2021-03-15', '22:19:23'),
(190, '127.0.0.1', '2021-03-15', '22:19:25'),
(191, '127.0.0.1', '2021-03-15', '22:19:32'),
(192, '127.0.0.1', '2021-03-15', '22:20:28'),
(193, '127.0.0.1', '2021-03-15', '22:20:29'),
(194, '127.0.0.1', '2021-03-15', '22:20:32'),
(195, '127.0.0.1', '2021-03-15', '22:21:59'),
(196, '127.0.0.1', '2021-03-15', '22:22:01'),
(197, '127.0.0.1', '2021-03-15', '22:22:03'),
(198, '127.0.0.1', '2021-03-16', '08:07:19'),
(199, '127.0.0.1', '2021-03-16', '08:07:22'),
(200, '127.0.0.1', '2021-03-16', '08:07:24'),
(201, '127.0.0.1', '2021-03-16', '08:07:27'),
(202, '127.0.0.1', '2021-03-16', '08:07:31'),
(203, '127.0.0.1', '2021-03-16', '08:07:33'),
(204, '127.0.0.1', '2021-03-16', '09:22:46'),
(205, '127.0.0.1', '2021-03-16', '09:22:47'),
(206, '127.0.0.1', '2021-03-16', '09:22:48'),
(207, '127.0.0.1', '2021-03-16', '09:23:07'),
(208, '127.0.0.1', '2021-03-16', '09:23:10'),
(209, '127.0.0.1', '2021-03-16', '09:23:15'),
(210, '127.0.0.1', '2021-03-16', '09:23:17'),
(211, '127.0.0.1', '2021-03-16', '09:23:22'),
(212, '127.0.0.1', '2021-03-16', '09:26:41'),
(213, '127.0.0.1', '2021-03-16', '09:26:46'),
(214, '127.0.0.1', '2021-03-16', '09:26:49'),
(215, '127.0.0.1', '2021-03-16', '09:26:57'),
(216, '127.0.0.1', '2021-03-16', '09:28:49'),
(217, '127.0.0.1', '2021-03-16', '09:28:54'),
(218, '127.0.0.1', '2021-03-16', '09:28:58'),
(219, '127.0.0.1', '2021-03-16', '09:29:01'),
(220, '127.0.0.1', '2021-03-16', '09:29:05'),
(221, '127.0.0.1', '2021-03-16', '09:29:11'),
(222, '127.0.0.1', '2021-03-16', '09:29:13'),
(223, '127.0.0.1', '2021-03-16', '09:29:15'),
(224, '127.0.0.1', '2021-03-16', '09:36:16'),
(225, '127.0.0.1', '2021-03-16', '09:36:18'),
(226, '127.0.0.1', '2021-03-16', '09:36:21'),
(227, '127.0.0.1', '2021-03-16', '09:36:24'),
(228, '127.0.0.1', '2021-03-16', '10:28:31'),
(229, '127.0.0.1', '2021-03-16', '10:28:33'),
(230, '127.0.0.1', '2021-03-16', '10:28:36'),
(231, '127.0.0.1', '2021-03-16', '10:28:37'),
(232, '127.0.0.1', '2021-03-16', '10:28:39'),
(233, '127.0.0.1', '2021-03-16', '10:28:45'),
(234, '127.0.0.1', '2021-03-16', '10:29:36'),
(235, '127.0.0.1', '2021-03-16', '10:29:38'),
(236, '127.0.0.1', '2021-03-16', '10:29:43'),
(237, '127.0.0.1', '2021-03-16', '10:29:52'),
(238, '127.0.0.1', '2021-03-16', '10:29:57'),
(239, '127.0.0.1', '2021-03-16', '10:30:03'),
(240, '127.0.0.1', '2021-03-16', '11:03:17'),
(241, '127.0.0.1', '2021-03-16', '11:03:26'),
(242, '127.0.0.1', '2021-03-16', '11:03:29'),
(243, '127.0.0.1', '2021-03-16', '11:03:32'),
(244, '127.0.0.1', '2021-03-16', '11:04:21'),
(245, '127.0.0.1', '2021-03-16', '11:04:51'),
(246, '127.0.0.1', '2021-03-16', '11:04:54'),
(247, '127.0.0.1', '2021-03-16', '11:04:59'),
(248, '127.0.0.1', '2021-03-16', '11:05:04'),
(249, '127.0.0.1', '2021-03-16', '11:08:32'),
(250, '127.0.0.1', '2021-03-16', '11:09:06'),
(251, '127.0.0.1', '2021-03-16', '11:16:46'),
(252, '127.0.0.1', '2021-03-16', '11:16:49'),
(253, '127.0.0.1', '2021-03-16', '11:16:52'),
(254, '127.0.0.1', '2021-03-16', '11:16:54'),
(255, '127.0.0.1', '2021-03-16', '11:16:56'),
(256, '127.0.0.1', '2021-03-16', '11:21:15'),
(257, '127.0.0.1', '2021-03-16', '11:21:28'),
(258, '127.0.0.1', '2021-03-16', '11:21:36'),
(259, '127.0.0.1', '2021-03-16', '11:21:41'),
(260, '127.0.0.1', '2021-03-16', '11:21:48'),
(261, '127.0.0.1', '2021-03-16', '11:27:50'),
(262, '127.0.0.1', '2021-03-16', '11:27:59'),
(263, '127.0.0.1', '2021-03-16', '11:28:53'),
(264, '127.0.0.1', '2021-03-16', '11:29:51'),
(265, '127.0.0.1', '2021-03-16', '11:29:52'),
(266, '127.0.0.1', '2021-03-16', '11:30:13'),
(267, '127.0.0.1', '2021-03-16', '11:30:22'),
(268, '127.0.0.1', '2021-03-16', '11:31:11'),
(269, '127.0.0.1', '2021-03-16', '11:40:51'),
(270, '127.0.0.1', '2021-03-16', '11:41:19'),
(271, '127.0.0.1', '2021-03-16', '11:41:21'),
(272, '127.0.0.1', '2021-03-16', '11:41:29'),
(273, '127.0.0.1', '2021-03-16', '11:41:32'),
(274, '127.0.0.1', '2021-03-16', '11:42:54'),
(275, '127.0.0.1', '2021-03-16', '11:42:58'),
(276, '127.0.0.1', '2021-03-16', '11:43:05'),
(277, '127.0.0.1', '2021-03-16', '11:43:09'),
(278, '127.0.0.1', '2021-03-16', '11:43:12'),
(279, '127.0.0.1', '2021-03-16', '11:44:20'),
(280, '127.0.0.1', '2021-03-16', '11:45:03'),
(281, '127.0.0.1', '2021-03-16', '11:50:21'),
(282, '127.0.0.1', '2021-03-16', '11:50:46'),
(283, '127.0.0.1', '2021-03-16', '12:01:30'),
(284, '127.0.0.1', '2021-03-16', '12:01:40'),
(285, '127.0.0.1', '2021-03-16', '12:02:05'),
(286, '127.0.0.1', '2021-03-16', '12:02:08'),
(287, '127.0.0.1', '2021-03-16', '12:02:14'),
(288, '127.0.0.1', '2021-03-16', '12:03:27'),
(289, '127.0.0.1', '2021-03-16', '12:04:18'),
(290, '127.0.0.1', '2021-03-16', '12:04:25'),
(291, '127.0.0.1', '2021-03-16', '12:05:59'),
(292, '127.0.0.1', '2021-03-16', '13:25:54'),
(293, '127.0.0.1', '2021-03-16', '13:25:57'),
(294, '127.0.0.1', '2021-03-16', '13:25:58'),
(295, '127.0.0.1', '2021-03-16', '13:26:03'),
(296, '127.0.0.1', '2021-03-16', '13:37:57'),
(297, '127.0.0.1', '2021-03-16', '13:38:03'),
(298, '127.0.0.1', '2021-03-16', '13:38:09'),
(299, '127.0.0.1', '2021-03-16', '13:41:52'),
(300, '127.0.0.1', '2021-03-16', '13:41:55'),
(301, '127.0.0.1', '2021-03-16', '13:41:57'),
(302, '127.0.0.1', '2021-03-16', '13:41:59'),
(303, '127.0.0.1', '2021-03-16', '13:42:01'),
(304, '127.0.0.1', '2021-03-16', '13:42:53'),
(305, '127.0.0.1', '2021-03-16', '13:42:55'),
(306, '127.0.0.1', '2021-03-16', '13:43:01'),
(307, '127.0.0.1', '2021-03-16', '13:43:06'),
(308, '127.0.0.1', '2021-03-16', '13:49:13'),
(309, '127.0.0.1', '2021-03-16', '13:49:19'),
(310, '127.0.0.1', '2021-03-16', '13:49:19'),
(311, '127.0.0.1', '2021-03-16', '13:49:23'),
(312, '127.0.0.1', '2021-03-16', '13:49:27'),
(313, '127.0.0.1', '2021-03-16', '13:49:27'),
(314, '127.0.0.1', '2021-03-16', '13:49:31'),
(315, '127.0.0.1', '2021-03-16', '13:49:33'),
(316, '127.0.0.1', '2021-03-16', '13:49:33'),
(317, '127.0.0.1', '2021-03-16', '13:49:35'),
(318, '127.0.0.1', '2021-03-16', '13:49:35'),
(319, '127.0.0.1', '2021-03-16', '13:49:42'),
(320, '127.0.0.1', '2021-03-16', '13:49:43'),
(321, '127.0.0.1', '2021-03-16', '13:49:45'),
(322, '127.0.0.1', '2021-03-16', '13:49:50'),
(323, '127.0.0.1', '2021-03-16', '13:49:52'),
(324, '127.0.0.1', '2021-03-16', '13:49:53'),
(325, '127.0.0.1', '2021-03-16', '13:49:54'),
(326, '127.0.0.1', '2021-03-16', '13:49:55'),
(327, '127.0.0.1', '2021-03-16', '13:49:57'),
(328, '127.0.0.1', '2021-03-16', '13:49:57'),
(329, '127.0.0.1', '2021-03-16', '13:50:04'),
(330, '127.0.0.1', '2021-03-16', '13:50:04'),
(331, '127.0.0.1', '2021-03-16', '13:50:04'),
(332, '127.0.0.1', '2021-03-16', '13:50:15'),
(333, '127.0.0.1', '2021-03-16', '13:50:15'),
(334, '127.0.0.1', '2021-03-16', '13:50:15'),
(335, '127.0.0.1', '2021-03-16', '13:50:15'),
(336, '127.0.0.1', '2021-03-16', '13:50:22'),
(337, '127.0.0.1', '2021-03-16', '13:50:22'),
(338, '127.0.0.1', '2021-03-16', '13:50:24'),
(339, '127.0.0.1', '2021-03-16', '13:50:25'),
(340, '127.0.0.1', '2021-03-16', '13:50:26'),
(341, '127.0.0.1', '2021-03-16', '13:50:34'),
(342, '127.0.0.1', '2021-03-16', '13:50:34'),
(343, '127.0.0.1', '2021-03-16', '13:50:34'),
(344, '127.0.0.1', '2021-03-16', '13:50:35'),
(345, '127.0.0.1', '2021-03-16', '13:50:35'),
(346, '127.0.0.1', '2021-03-16', '13:50:35'),
(347, '127.0.0.1', '2021-03-16', '13:50:40'),
(348, '127.0.0.1', '2021-03-16', '13:50:40'),
(349, '127.0.0.1', '2021-03-16', '13:50:42'),
(350, '127.0.0.1', '2021-03-16', '13:50:45'),
(351, '127.0.0.1', '2021-03-16', '13:50:47'),
(352, '127.0.0.1', '2021-03-16', '13:50:55'),
(353, '127.0.0.1', '2021-03-16', '13:50:55'),
(354, '127.0.0.1', '2021-03-16', '13:50:59'),
(355, '127.0.0.1', '2021-03-16', '13:51:03'),
(356, '127.0.0.1', '2021-03-16', '13:52:33'),
(357, '127.0.0.1', '2021-03-16', '19:32:50'),
(358, '127.0.0.1', '2021-03-16', '19:32:52'),
(359, '127.0.0.1', '2021-03-16', '19:32:54'),
(360, '127.0.0.1', '2021-03-16', '19:32:56'),
(361, '127.0.0.1', '2021-03-16', '19:33:00'),
(362, '127.0.0.1', '2021-03-16', '19:33:00'),
(363, '127.0.0.1', '2021-03-16', '19:33:00'),
(364, '127.0.0.1', '2021-03-16', '19:33:02'),
(365, '127.0.0.1', '2021-03-16', '19:33:02'),
(366, '127.0.0.1', '2021-03-16', '19:33:02'),
(367, '127.0.0.1', '2021-03-16', '19:33:13'),
(368, '127.0.0.1', '2021-03-16', '19:33:13'),
(369, '127.0.0.1', '2021-03-16', '19:33:17'),
(370, '127.0.0.1', '2021-03-16', '19:33:17'),
(371, '127.0.0.1', '2021-03-16', '19:33:17'),
(372, '127.0.0.1', '2021-03-16', '19:33:28'),
(373, '127.0.0.1', '2021-03-16', '19:33:44'),
(374, '127.0.0.1', '2021-03-16', '19:33:46'),
(375, '127.0.0.1', '2021-03-16', '19:34:32'),
(376, '127.0.0.1', '2021-03-16', '19:34:32'),
(377, '127.0.0.1', '2021-03-16', '19:34:32'),
(378, '127.0.0.1', '2021-03-16', '19:34:37'),
(379, '127.0.0.1', '2021-03-16', '19:34:37'),
(380, '127.0.0.1', '2021-03-16', '19:34:37'),
(381, '127.0.0.1', '2021-03-16', '19:34:37'),
(382, '127.0.0.1', '2021-03-16', '19:36:27'),
(383, '127.0.0.1', '2021-03-16', '19:36:34'),
(384, '127.0.0.1', '2021-03-16', '19:36:39'),
(385, '127.0.0.1', '2021-03-16', '19:36:39'),
(386, '127.0.0.1', '2021-03-16', '19:36:39'),
(387, '127.0.0.1', '2021-03-16', '19:36:50'),
(388, '127.0.0.1', '2021-03-16', '19:36:52'),
(389, '127.0.0.1', '2021-03-16', '19:36:52'),
(390, '127.0.0.1', '2021-03-16', '19:36:52'),
(391, '127.0.0.1', '2021-03-16', '19:38:15'),
(392, '127.0.0.1', '2021-03-16', '19:38:15'),
(393, '127.0.0.1', '2021-03-16', '19:38:15'),
(394, '127.0.0.1', '2021-03-16', '19:40:35'),
(395, '127.0.0.1', '2021-03-16', '19:40:35'),
(396, '127.0.0.1', '2021-03-16', '19:40:35'),
(397, '127.0.0.1', '2021-03-16', '19:40:43'),
(398, '127.0.0.1', '2021-03-16', '19:40:47'),
(399, '127.0.0.1', '2021-03-16', '19:40:47'),
(400, '127.0.0.1', '2021-03-16', '19:40:47'),
(401, '127.0.0.1', '2021-03-16', '19:42:39'),
(402, '127.0.0.1', '2021-03-16', '19:42:42'),
(403, '127.0.0.1', '2021-03-16', '19:42:42'),
(404, '127.0.0.1', '2021-03-16', '19:42:42'),
(405, '127.0.0.1', '2021-03-16', '19:43:11'),
(406, '127.0.0.1', '2021-03-16', '19:44:04'),
(407, '127.0.0.1', '2021-03-16', '19:44:06'),
(408, '127.0.0.1', '2021-03-16', '19:44:06'),
(409, '127.0.0.1', '2021-03-16', '19:44:06'),
(410, '127.0.0.1', '2021-03-16', '19:44:09'),
(411, '127.0.0.1', '2021-03-16', '19:44:11'),
(412, '127.0.0.1', '2021-03-16', '19:44:11'),
(413, '127.0.0.1', '2021-03-16', '19:44:11'),
(414, '127.0.0.1', '2021-03-16', '19:44:12'),
(415, '127.0.0.1', '2021-03-16', '19:44:24'),
(416, '127.0.0.1', '2021-03-16', '19:44:25'),
(417, '127.0.0.1', '2021-03-16', '19:44:25'),
(418, '127.0.0.1', '2021-03-16', '19:44:25'),
(419, '127.0.0.1', '2021-03-16', '19:44:28'),
(420, '127.0.0.1', '2021-03-16', '19:44:28'),
(421, '127.0.0.1', '2021-03-16', '19:44:28'),
(422, '127.0.0.1', '2021-03-16', '19:47:17'),
(423, '127.0.0.1', '2021-03-16', '19:47:17'),
(424, '127.0.0.1', '2021-03-16', '19:47:17'),
(425, '127.0.0.1', '2021-03-16', '19:48:14'),
(426, '127.0.0.1', '2021-03-16', '19:48:14'),
(427, '127.0.0.1', '2021-03-16', '19:48:14'),
(428, '127.0.0.1', '2021-03-16', '19:48:18'),
(429, '127.0.0.1', '2021-03-16', '19:48:18'),
(430, '127.0.0.1', '2021-03-16', '19:48:18'),
(431, '127.0.0.1', '2021-03-16', '19:48:25'),
(432, '127.0.0.1', '2021-03-16', '19:48:32'),
(433, '127.0.0.1', '2021-03-16', '19:48:41'),
(434, '127.0.0.1', '2021-03-16', '19:48:45'),
(435, '127.0.0.1', '2021-03-16', '19:48:48'),
(436, '127.0.0.1', '2021-03-16', '19:49:03'),
(437, '127.0.0.1', '2021-03-16', '19:49:04'),
(438, '127.0.0.1', '2021-03-16', '19:49:07'),
(439, '127.0.0.1', '2021-03-16', '19:49:17'),
(440, '127.0.0.1', '2021-03-16', '19:49:18'),
(441, '127.0.0.1', '2021-03-16', '19:49:19'),
(442, '127.0.0.1', '2021-03-16', '19:49:29'),
(443, '127.0.0.1', '2021-03-16', '19:49:32'),
(444, '127.0.0.1', '2021-03-16', '19:49:36'),
(445, '127.0.0.1', '2021-03-16', '19:49:41'),
(446, '127.0.0.1', '2021-03-16', '19:49:43'),
(447, '127.0.0.1', '2021-03-16', '19:49:44'),
(448, '127.0.0.1', '2021-03-16', '19:49:45'),
(449, '127.0.0.1', '2021-03-16', '19:49:50'),
(450, '127.0.0.1', '2021-03-16', '19:49:50'),
(451, '127.0.0.1', '2021-03-16', '19:49:51'),
(452, '127.0.0.1', '2021-03-16', '19:49:54'),
(453, '127.0.0.1', '2021-03-16', '19:49:54'),
(454, '127.0.0.1', '2021-03-16', '19:50:06'),
(455, '127.0.0.1', '2021-03-16', '19:50:14'),
(456, '127.0.0.1', '2021-03-16', '19:50:14'),
(457, '127.0.0.1', '2021-03-16', '19:50:44'),
(458, '127.0.0.1', '2021-03-16', '19:51:03'),
(459, '127.0.0.1', '2021-03-16', '19:51:05'),
(460, '127.0.0.1', '2021-03-16', '19:51:14'),
(461, '127.0.0.1', '2021-03-16', '19:51:17'),
(462, '127.0.0.1', '2021-03-16', '19:51:17'),
(463, '127.0.0.1', '2021-03-16', '19:51:19'),
(464, '127.0.0.1', '2021-03-16', '19:52:19'),
(465, '127.0.0.1', '2021-03-16', '19:52:44'),
(466, '127.0.0.1', '2021-03-16', '19:52:45'),
(467, '127.0.0.1', '2021-03-16', '19:52:47'),
(468, '127.0.0.1', '2021-03-16', '19:53:21'),
(469, '127.0.0.1', '2021-03-16', '19:53:29'),
(470, '127.0.0.1', '2021-03-16', '19:53:36'),
(471, '127.0.0.1', '2021-03-16', '20:12:56'),
(472, '127.0.0.1', '2021-03-16', '20:12:58'),
(473, '127.0.0.1', '2021-03-16', '20:13:01'),
(474, '127.0.0.1', '2021-03-17', '08:02:57'),
(475, '127.0.0.1', '2021-03-17', '08:09:14'),
(476, '127.0.0.1', '2021-03-17', '08:09:15'),
(477, '127.0.0.1', '2021-03-17', '08:09:19'),
(478, '127.0.0.1', '2021-03-17', '08:09:32'),
(479, '127.0.0.1', '2021-03-17', '08:10:45'),
(480, '127.0.0.1', '2021-03-17', '08:10:48'),
(481, '127.0.0.1', '2021-03-17', '08:14:16'),
(482, '127.0.0.1', '2021-03-17', '08:15:08'),
(483, '127.0.0.1', '2021-03-17', '09:04:53'),
(484, '127.0.0.1', '2021-03-17', '09:06:13'),
(485, '127.0.0.1', '2021-03-17', '09:07:27'),
(486, '127.0.0.1', '2021-03-17', '09:07:29'),
(487, '127.0.0.1', '2021-03-17', '09:08:18'),
(488, '127.0.0.1', '2021-03-17', '09:08:22'),
(489, '127.0.0.1', '2021-03-17', '09:08:24'),
(490, '127.0.0.1', '2021-03-17', '09:08:26'),
(491, '127.0.0.1', '2021-03-17', '09:08:28'),
(492, '127.0.0.1', '2021-03-17', '09:08:41'),
(493, '127.0.0.1', '2021-03-17', '09:10:36'),
(494, '127.0.0.1', '2021-03-17', '09:17:15'),
(495, '127.0.0.1', '2021-03-17', '09:17:35'),
(496, '127.0.0.1', '2021-03-17', '09:19:50'),
(497, '127.0.0.1', '2021-03-17', '09:20:44'),
(498, '127.0.0.1', '2021-03-17', '09:21:03'),
(499, '127.0.0.1', '2021-03-17', '09:21:57'),
(500, '127.0.0.1', '2021-03-17', '09:22:17'),
(501, '127.0.0.1', '2021-03-17', '09:22:19'),
(502, '127.0.0.1', '2021-03-17', '09:22:19'),
(503, '127.0.0.1', '2021-03-17', '09:22:19'),
(504, '127.0.0.1', '2021-03-17', '09:22:19'),
(505, '127.0.0.1', '2021-03-17', '09:22:25'),
(506, '127.0.0.1', '2021-03-17', '09:22:25'),
(507, '127.0.0.1', '2021-03-17', '09:22:27'),
(508, '127.0.0.1', '2021-03-17', '09:22:27'),
(509, '127.0.0.1', '2021-03-17', '09:22:30'),
(510, '127.0.0.1', '2021-03-17', '09:22:30'),
(511, '127.0.0.1', '2021-03-17', '09:22:35'),
(512, '127.0.0.1', '2021-03-17', '09:22:35'),
(513, '127.0.0.1', '2021-03-17', '09:22:35'),
(514, '127.0.0.1', '2021-03-17', '09:22:39'),
(515, '127.0.0.1', '2021-03-17', '09:22:39'),
(516, '127.0.0.1', '2021-03-17', '09:22:51'),
(517, '127.0.0.1', '2021-03-17', '09:22:53'),
(518, '127.0.0.1', '2021-03-17', '09:22:55'),
(519, '127.0.0.1', '2021-03-17', '09:22:56'),
(520, '127.0.0.1', '2021-03-17', '09:23:00'),
(521, '127.0.0.1', '2021-03-17', '09:23:05'),
(522, '127.0.0.1', '2021-03-17', '09:23:07'),
(523, '127.0.0.1', '2021-03-17', '09:26:49'),
(524, '127.0.0.1', '2021-03-17', '09:26:59'),
(525, '127.0.0.1', '2021-03-17', '09:29:00'),
(526, '127.0.0.1', '2021-03-17', '09:29:54'),
(527, '127.0.0.1', '2021-03-17', '09:29:57'),
(528, '127.0.0.1', '2021-03-17', '09:30:26'),
(529, '127.0.0.1', '2021-03-17', '09:30:29'),
(530, '127.0.0.1', '2021-03-17', '09:30:31'),
(531, '127.0.0.1', '2021-03-17', '09:30:32'),
(532, '127.0.0.1', '2021-03-17', '09:30:35'),
(533, '127.0.0.1', '2021-03-17', '09:30:39'),
(534, '127.0.0.1', '2021-03-17', '09:30:41'),
(535, '127.0.0.1', '2021-03-17', '09:30:42'),
(536, '127.0.0.1', '2021-03-17', '09:30:43'),
(537, '127.0.0.1', '2021-03-17', '09:30:44'),
(538, '127.0.0.1', '2021-03-17', '09:30:45'),
(539, '127.0.0.1', '2021-03-17', '09:30:53'),
(540, '127.0.0.1', '2021-03-17', '09:30:59'),
(541, '127.0.0.1', '2021-03-17', '09:35:14'),
(542, '127.0.0.1', '2021-03-17', '09:35:55'),
(543, '127.0.0.1', '2021-03-17', '09:36:18'),
(544, '127.0.0.1', '2021-03-17', '09:36:24'),
(545, '127.0.0.1', '2021-03-17', '09:36:26'),
(546, '127.0.0.1', '2021-03-17', '09:36:30'),
(547, '127.0.0.1', '2021-03-17', '09:41:59'),
(548, '127.0.0.1', '2021-03-17', '09:42:26'),
(549, '127.0.0.1', '2021-03-17', '09:42:48'),
(550, '127.0.0.1', '2021-03-17', '09:42:51'),
(551, '127.0.0.1', '2021-03-17', '09:42:57'),
(552, '127.0.0.1', '2021-03-17', '09:44:17'),
(553, '127.0.0.1', '2021-03-17', '09:47:36'),
(554, '127.0.0.1', '2021-03-17', '09:47:51'),
(555, '127.0.0.1', '2021-03-17', '09:48:12'),
(556, '127.0.0.1', '2021-03-17', '09:48:12'),
(557, '127.0.0.1', '2021-03-17', '09:48:12'),
(558, '127.0.0.1', '2021-03-17', '10:04:06'),
(559, '127.0.0.1', '2021-03-17', '10:04:07'),
(560, '127.0.0.1', '2021-03-17', '10:04:07'),
(561, '127.0.0.1', '2021-03-17', '10:04:09'),
(562, '127.0.0.1', '2021-03-17', '10:04:10'),
(563, '127.0.0.1', '2021-03-17', '10:04:10'),
(564, '127.0.0.1', '2021-03-17', '10:04:11'),
(565, '127.0.0.1', '2021-03-17', '10:04:12'),
(566, '127.0.0.1', '2021-03-17', '10:04:14'),
(567, '127.0.0.1', '2021-03-17', '10:04:14'),
(568, '127.0.0.1', '2021-03-17', '10:04:14'),
(569, '127.0.0.1', '2021-03-17', '10:04:14'),
(570, '127.0.0.1', '2021-03-17', '10:04:20'),
(571, '127.0.0.1', '2021-03-17', '10:04:20'),
(572, '127.0.0.1', '2021-03-17', '10:04:20'),
(573, '127.0.0.1', '2021-03-17', '10:04:28'),
(574, '127.0.0.1', '2021-03-17', '10:04:28'),
(575, '127.0.0.1', '2021-03-17', '10:04:28'),
(576, '127.0.0.1', '2021-03-17', '10:04:28'),
(577, '127.0.0.1', '2021-03-17', '10:08:52'),
(578, '127.0.0.1', '2021-03-17', '10:08:52'),
(579, '127.0.0.1', '2021-03-17', '10:08:54'),
(580, '127.0.0.1', '2021-03-17', '10:08:56'),
(581, '127.0.0.1', '2021-03-17', '10:08:56'),
(582, '127.0.0.1', '2021-03-17', '10:09:01'),
(583, '127.0.0.1', '2021-03-17', '10:09:01'),
(584, '127.0.0.1', '2021-03-17', '10:09:04'),
(585, '127.0.0.1', '2021-03-17', '10:09:10'),
(586, '127.0.0.1', '2021-03-17', '10:09:13'),
(587, '127.0.0.1', '2021-03-17', '10:09:13'),
(588, '127.0.0.1', '2021-03-17', '10:09:13'),
(589, '127.0.0.1', '2021-03-17', '10:09:15'),
(590, '127.0.0.1', '2021-03-17', '10:09:15'),
(591, '127.0.0.1', '2021-03-17', '10:09:15'),
(592, '127.0.0.1', '2021-03-17', '11:04:31'),
(593, '127.0.0.1', '2021-03-17', '11:04:32'),
(594, '127.0.0.1', '2021-03-17', '11:04:32'),
(595, '127.0.0.1', '2021-03-17', '11:04:35'),
(596, '127.0.0.1', '2021-03-17', '11:04:36'),
(597, '127.0.0.1', '2021-03-17', '11:04:38'),
(598, '127.0.0.1', '2021-03-17', '11:04:41'),
(599, '127.0.0.1', '2021-03-17', '11:04:41'),
(600, '127.0.0.1', '2021-03-17', '11:04:44'),
(601, '127.0.0.1', '2021-03-17', '11:04:44'),
(602, '127.0.0.1', '2021-03-17', '11:04:44'),
(603, '127.0.0.1', '2021-03-17', '11:04:46'),
(604, '127.0.0.1', '2021-03-17', '11:04:46'),
(605, '127.0.0.1', '2021-03-17', '11:04:46'),
(606, '127.0.0.1', '2021-03-17', '11:05:47'),
(607, '127.0.0.1', '2021-03-17', '11:05:47'),
(608, '127.0.0.1', '2021-03-17', '11:05:47'),
(609, '127.0.0.1', '2021-03-17', '11:05:52'),
(610, '127.0.0.1', '2021-03-17', '11:05:53'),
(611, '127.0.0.1', '2021-03-17', '11:05:53'),
(612, '127.0.0.1', '2021-03-17', '11:05:57'),
(613, '127.0.0.1', '2021-03-17', '11:05:58'),
(614, '127.0.0.1', '2021-03-17', '11:05:58'),
(615, '127.0.0.1', '2021-03-17', '11:10:29'),
(616, '127.0.0.1', '2021-03-17', '11:10:30'),
(617, '127.0.0.1', '2021-03-17', '11:10:30'),
(618, '127.0.0.1', '2021-03-17', '11:10:35'),
(619, '127.0.0.1', '2021-03-17', '11:11:28'),
(620, '127.0.0.1', '2021-03-17', '11:11:56'),
(621, '127.0.0.1', '2021-03-17', '11:11:56'),
(622, '127.0.0.1', '2021-03-17', '11:11:56'),
(623, '127.0.0.1', '2021-03-17', '11:12:01'),
(624, '127.0.0.1', '2021-03-17', '11:12:14'),
(625, '127.0.0.1', '2021-03-17', '11:12:14'),
(626, '127.0.0.1', '2021-03-17', '11:12:14'),
(627, '127.0.0.1', '2021-03-17', '11:12:16'),
(628, '127.0.0.1', '2021-03-17', '11:12:16'),
(629, '127.0.0.1', '2021-03-17', '11:12:16'),
(630, '127.0.0.1', '2021-03-17', '11:17:20'),
(631, '127.0.0.1', '2021-03-17', '11:17:42'),
(632, '127.0.0.1', '2021-03-17', '11:17:43'),
(633, '127.0.0.1', '2021-03-17', '11:17:52'),
(634, '127.0.0.1', '2021-03-17', '11:17:52'),
(635, '127.0.0.1', '2021-03-17', '11:17:52'),
(636, '127.0.0.1', '2021-03-17', '11:18:20'),
(637, '127.0.0.1', '2021-03-17', '11:18:20'),
(638, '127.0.0.1', '2021-03-17', '11:18:20'),
(639, '127.0.0.1', '2021-03-17', '11:18:38'),
(640, '127.0.0.1', '2021-03-17', '11:18:38'),
(641, '127.0.0.1', '2021-03-17', '11:18:38'),
(642, '127.0.0.1', '2021-03-17', '11:18:41'),
(643, '127.0.0.1', '2021-03-17', '11:18:41'),
(644, '127.0.0.1', '2021-03-17', '11:18:41'),
(645, '127.0.0.1', '2021-03-17', '11:20:14'),
(646, '127.0.0.1', '2021-03-17', '11:20:14'),
(647, '127.0.0.1', '2021-03-17', '11:20:14'),
(648, '127.0.0.1', '2021-03-17', '11:20:18'),
(649, '127.0.0.1', '2021-03-17', '11:20:18'),
(650, '127.0.0.1', '2021-03-17', '11:20:18'),
(651, '127.0.0.1', '2021-03-17', '11:20:27'),
(652, '127.0.0.1', '2021-03-17', '11:20:29'),
(653, '127.0.0.1', '2021-03-17', '11:20:30'),
(654, '127.0.0.1', '2021-03-17', '11:20:30'),
(655, '127.0.0.1', '2021-03-17', '11:20:30'),
(656, '127.0.0.1', '2021-03-17', '11:20:40'),
(657, '127.0.0.1', '2021-03-17', '11:20:41'),
(658, '127.0.0.1', '2021-03-17', '11:20:42'),
(659, '127.0.0.1', '2021-03-17', '11:20:46'),
(660, '127.0.0.1', '2021-03-17', '11:20:46'),
(661, '127.0.0.1', '2021-03-17', '11:20:48'),
(662, '127.0.0.1', '2021-03-17', '11:20:48'),
(663, '127.0.0.1', '2021-03-17', '11:20:48'),
(664, '127.0.0.1', '2021-03-17', '11:20:51'),
(665, '127.0.0.1', '2021-03-17', '11:20:52'),
(666, '127.0.0.1', '2021-03-17', '11:20:52'),
(667, '127.0.0.1', '2021-03-17', '11:20:54'),
(668, '127.0.0.1', '2021-03-17', '11:20:54'),
(669, '127.0.0.1', '2021-03-17', '11:20:54'),
(670, '127.0.0.1', '2021-03-17', '11:21:49'),
(671, '127.0.0.1', '2021-03-17', '11:24:29'),
(672, '127.0.0.1', '2021-03-17', '11:24:29'),
(673, '127.0.0.1', '2021-03-17', '11:24:29'),
(674, '127.0.0.1', '2021-03-17', '11:27:19'),
(675, '127.0.0.1', '2021-03-17', '11:27:19'),
(676, '127.0.0.1', '2021-03-17', '11:27:19'),
(677, '127.0.0.1', '2021-03-17', '11:27:49'),
(678, '127.0.0.1', '2021-03-17', '11:27:49'),
(679, '127.0.0.1', '2021-03-17', '11:27:49'),
(680, '127.0.0.1', '2021-03-17', '11:28:26'),
(681, '127.0.0.1', '2021-03-17', '11:28:26'),
(682, '127.0.0.1', '2021-03-17', '11:28:26'),
(683, '127.0.0.1', '2021-03-17', '11:31:17'),
(684, '127.0.0.1', '2021-03-17', '11:31:26'),
(685, '127.0.0.1', '2021-03-17', '11:32:23'),
(686, '127.0.0.1', '2021-03-17', '11:32:27'),
(687, '127.0.0.1', '2021-03-17', '11:32:27'),
(688, '127.0.0.1', '2021-03-17', '11:32:27'),
(689, '127.0.0.1', '2021-03-17', '11:32:30'),
(690, '127.0.0.1', '2021-03-17', '11:32:30'),
(691, '127.0.0.1', '2021-03-17', '11:32:31'),
(692, '127.0.0.1', '2021-03-17', '11:32:31'),
(693, '127.0.0.1', '2021-03-17', '11:32:37'),
(694, '127.0.0.1', '2021-03-17', '11:32:37'),
(695, '127.0.0.1', '2021-03-17', '11:33:16'),
(696, '127.0.0.1', '2021-03-17', '11:33:16'),
(697, '127.0.0.1', '2021-03-17', '11:33:16'),
(698, '127.0.0.1', '2021-03-17', '11:34:12'),
(699, '127.0.0.1', '2021-03-17', '11:34:12'),
(700, '127.0.0.1', '2021-03-17', '11:34:12'),
(701, '127.0.0.1', '2021-03-17', '11:39:02'),
(702, '127.0.0.1', '2021-03-17', '11:39:02'),
(703, '127.0.0.1', '2021-03-17', '11:39:02'),
(704, '127.0.0.1', '2021-03-17', '11:39:10'),
(705, '127.0.0.1', '2021-03-17', '11:39:10'),
(706, '127.0.0.1', '2021-03-17', '11:39:10'),
(707, '127.0.0.1', '2021-03-17', '11:39:13'),
(708, '127.0.0.1', '2021-03-17', '11:39:13'),
(709, '127.0.0.1', '2021-03-17', '11:39:13'),
(710, '127.0.0.1', '2021-03-17', '11:39:13'),
(711, '127.0.0.1', '2021-03-17', '11:39:22'),
(712, '127.0.0.1', '2021-03-17', '11:39:22'),
(713, '127.0.0.1', '2021-03-17', '11:39:22'),
(714, '127.0.0.1', '2021-03-17', '11:39:22'),
(715, '127.0.0.1', '2021-03-17', '11:39:23'),
(716, '127.0.0.1', '2021-03-17', '11:39:29'),
(717, '127.0.0.1', '2021-03-17', '11:39:30'),
(718, '127.0.0.1', '2021-03-17', '11:39:30'),
(719, '127.0.0.1', '2021-03-17', '11:39:31'),
(720, '127.0.0.1', '2021-03-17', '11:39:31'),
(721, '127.0.0.1', '2021-03-17', '11:39:31'),
(722, '127.0.0.1', '2021-03-17', '11:42:07'),
(723, '127.0.0.1', '2021-03-17', '11:42:08'),
(724, '127.0.0.1', '2021-03-17', '11:42:08'),
(725, '127.0.0.1', '2021-03-17', '11:42:15'),
(726, '127.0.0.1', '2021-03-17', '11:42:15'),
(727, '127.0.0.1', '2021-03-17', '11:42:15'),
(728, '127.0.0.1', '2021-03-17', '11:42:15'),
(729, '127.0.0.1', '2021-03-17', '11:42:15'),
(730, '127.0.0.1', '2021-03-17', '11:42:22'),
(731, '127.0.0.1', '2021-03-17', '11:42:22'),
(732, '127.0.0.1', '2021-03-17', '11:42:22'),
(733, '127.0.0.1', '2021-03-17', '11:42:23'),
(734, '127.0.0.1', '2021-03-17', '11:42:24'),
(735, '127.0.0.1', '2021-03-17', '11:42:24'),
(736, '127.0.0.1', '2021-03-17', '11:42:27'),
(737, '127.0.0.1', '2021-03-17', '11:42:28'),
(738, '127.0.0.1', '2021-03-17', '11:42:28'),
(739, '127.0.0.1', '2021-03-17', '11:44:44'),
(740, '127.0.0.1', '2021-03-17', '11:44:44'),
(741, '127.0.0.1', '2021-03-17', '11:44:44'),
(742, '127.0.0.1', '2021-03-17', '11:45:04'),
(743, '127.0.0.1', '2021-03-17', '11:45:04'),
(744, '127.0.0.1', '2021-03-17', '11:45:04'),
(745, '127.0.0.1', '2021-03-17', '11:45:04'),
(746, '127.0.0.1', '2021-03-17', '11:45:04'),
(747, '127.0.0.1', '2021-03-17', '11:45:26'),
(748, '127.0.0.1', '2021-03-17', '11:45:26'),
(749, '127.0.0.1', '2021-03-17', '11:45:26'),
(750, '127.0.0.1', '2021-03-17', '11:45:26'),
(751, '127.0.0.1', '2021-03-17', '11:45:26'),
(752, '127.0.0.1', '2021-03-17', '11:46:11'),
(753, '127.0.0.1', '2021-03-17', '11:46:11'),
(754, '127.0.0.1', '2021-03-17', '11:46:11'),
(755, '127.0.0.1', '2021-03-17', '11:46:14'),
(756, '127.0.0.1', '2021-03-17', '11:46:14'),
(757, '127.0.0.1', '2021-03-17', '11:46:15'),
(758, '127.0.0.1', '2021-03-17', '11:47:27'),
(759, '127.0.0.1', '2021-03-17', '11:47:28'),
(760, '127.0.0.1', '2021-03-17', '11:47:28'),
(761, '127.0.0.1', '2021-03-17', '11:47:28'),
(762, '127.0.0.1', '2021-03-17', '11:47:38'),
(763, '127.0.0.1', '2021-03-17', '11:47:38'),
(764, '127.0.0.1', '2021-03-17', '11:47:38'),
(765, '127.0.0.1', '2021-03-17', '11:47:38'),
(766, '127.0.0.1', '2021-03-17', '11:47:38'),
(767, '127.0.0.1', '2021-03-17', '11:48:01'),
(768, '127.0.0.1', '2021-03-17', '11:48:01'),
(769, '127.0.0.1', '2021-03-17', '11:48:01'),
(770, '127.0.0.1', '2021-03-17', '11:48:03'),
(771, '127.0.0.1', '2021-03-17', '11:48:06'),
(772, '127.0.0.1', '2021-03-17', '11:48:06'),
(773, '127.0.0.1', '2021-03-17', '11:48:06'),
(774, '127.0.0.1', '2021-03-17', '11:48:06'),
(775, '127.0.0.1', '2021-03-17', '11:48:11'),
(776, '127.0.0.1', '2021-03-17', '11:48:11'),
(777, '127.0.0.1', '2021-03-17', '11:48:13'),
(778, '127.0.0.1', '2021-03-17', '11:48:15'),
(779, '127.0.0.1', '2021-03-17', '11:48:15'),
(780, '127.0.0.1', '2021-03-17', '11:48:19'),
(781, '127.0.0.1', '2021-03-17', '11:48:19'),
(782, '127.0.0.1', '2021-03-17', '11:48:19'),
(783, '127.0.0.1', '2021-03-17', '11:48:22'),
(784, '127.0.0.1', '2021-03-17', '11:48:22'),
(785, '127.0.0.1', '2021-03-17', '11:48:22'),
(786, '127.0.0.1', '2021-03-17', '11:48:24'),
(787, '127.0.0.1', '2021-03-17', '11:48:24'),
(788, '127.0.0.1', '2021-03-17', '11:48:24'),
(789, '127.0.0.1', '2021-03-17', '11:48:34'),
(790, '127.0.0.1', '2021-03-17', '11:48:34'),
(791, '127.0.0.1', '2021-03-17', '11:48:34'),
(792, '127.0.0.1', '2021-03-17', '12:04:56'),
(793, '127.0.0.1', '2021-03-17', '12:04:57'),
(794, '127.0.0.1', '2021-03-17', '12:04:57'),
(795, '127.0.0.1', '2021-03-17', '12:04:59'),
(796, '127.0.0.1', '2021-03-17', '12:04:59'),
(797, '127.0.0.1', '2021-03-17', '12:04:59'),
(798, '127.0.0.1', '2021-03-17', '12:05:01'),
(799, '127.0.0.1', '2021-03-17', '12:05:01'),
(800, '127.0.0.1', '2021-03-17', '12:05:01'),
(801, '127.0.0.1', '2021-03-17', '12:05:03'),
(802, '127.0.0.1', '2021-03-17', '12:05:04'),
(803, '127.0.0.1', '2021-03-17', '12:05:04'),
(804, '127.0.0.1', '2021-03-17', '12:06:07'),
(805, '127.0.0.1', '2021-03-17', '12:06:08'),
(806, '127.0.0.1', '2021-03-17', '12:06:08'),
(807, '127.0.0.1', '2021-03-17', '12:07:13'),
(808, '127.0.0.1', '2021-03-17', '12:07:13'),
(809, '127.0.0.1', '2021-03-17', '12:07:13'),
(810, '127.0.0.1', '2021-03-17', '12:07:54'),
(811, '127.0.0.1', '2021-03-17', '12:07:54'),
(812, '127.0.0.1', '2021-03-17', '12:07:54'),
(813, '127.0.0.1', '2021-03-17', '12:08:39'),
(814, '127.0.0.1', '2021-03-17', '12:08:39'),
(815, '127.0.0.1', '2021-03-17', '12:08:39'),
(816, '127.0.0.1', '2021-03-17', '12:11:11'),
(817, '127.0.0.1', '2021-03-17', '12:11:11'),
(818, '127.0.0.1', '2021-03-17', '12:11:11'),
(819, '127.0.0.1', '2021-03-17', '12:11:11'),
(820, '127.0.0.1', '2021-03-17', '12:11:17'),
(821, '127.0.0.1', '2021-03-17', '12:11:17'),
(822, '127.0.0.1', '2021-03-17', '12:11:17'),
(823, '127.0.0.1', '2021-03-17', '12:11:17'),
(824, '127.0.0.1', '2021-03-17', '12:11:17'),
(825, '127.0.0.1', '2021-03-17', '12:11:48'),
(826, '127.0.0.1', '2021-03-17', '12:11:48'),
(827, '127.0.0.1', '2021-03-17', '12:11:48'),
(828, '127.0.0.1', '2021-03-17', '12:11:48'),
(829, '127.0.0.1', '2021-03-17', '12:11:49'),
(830, '127.0.0.1', '2021-03-17', '12:13:00'),
(831, '127.0.0.1', '2021-03-17', '12:13:00'),
(832, '127.0.0.1', '2021-03-17', '12:13:00'),
(833, '127.0.0.1', '2021-03-17', '12:13:00'),
(834, '127.0.0.1', '2021-03-17', '12:13:06'),
(835, '127.0.0.1', '2021-03-17', '12:13:15'),
(836, '127.0.0.1', '2021-03-17', '12:13:15'),
(837, '127.0.0.1', '2021-03-17', '12:13:15'),
(838, '127.0.0.1', '2021-03-17', '12:14:16'),
(839, '127.0.0.1', '2021-03-17', '12:14:16'),
(840, '127.0.0.1', '2021-03-17', '12:14:16'),
(841, '127.0.0.1', '2021-03-17', '12:14:16'),
(842, '127.0.0.1', '2021-03-17', '12:14:19'),
(843, '127.0.0.1', '2021-03-17', '12:14:24'),
(844, '127.0.0.1', '2021-03-17', '12:14:24'),
(845, '127.0.0.1', '2021-03-17', '12:14:24'),
(846, '127.0.0.1', '2021-03-17', '12:16:33'),
(847, '127.0.0.1', '2021-03-17', '12:16:33'),
(848, '127.0.0.1', '2021-03-17', '12:16:33'),
(849, '127.0.0.1', '2021-03-17', '12:16:33'),
(850, '127.0.0.1', '2021-03-17', '12:16:36'),
(851, '127.0.0.1', '2021-03-17', '12:16:38'),
(852, '127.0.0.1', '2021-03-17', '12:16:38'),
(853, '127.0.0.1', '2021-03-17', '12:16:38'),
(854, '127.0.0.1', '2021-03-17', '12:16:38'),
(855, '127.0.0.1', '2021-03-17', '12:16:50'),
(856, '127.0.0.1', '2021-03-17', '12:17:34'),
(857, '127.0.0.1', '2021-03-17', '12:17:34'),
(858, '127.0.0.1', '2021-03-17', '12:17:34'),
(859, '127.0.0.1', '2021-03-17', '12:17:34'),
(860, '127.0.0.1', '2021-03-17', '12:17:36'),
(861, '127.0.0.1', '2021-03-17', '12:17:38'),
(862, '127.0.0.1', '2021-03-17', '12:17:38'),
(863, '127.0.0.1', '2021-03-17', '12:17:38'),
(864, '127.0.0.1', '2021-03-17', '12:17:38'),
(865, '127.0.0.1', '2021-03-17', '12:17:42'),
(866, '127.0.0.1', '2021-03-17', '12:17:44'),
(867, '127.0.0.1', '2021-03-17', '12:17:44'),
(868, '127.0.0.1', '2021-03-17', '12:17:44'),
(869, '127.0.0.1', '2021-03-17', '12:17:44'),
(870, '127.0.0.1', '2021-03-17', '12:17:47'),
(871, '127.0.0.1', '2021-03-17', '12:18:30'),
(872, '127.0.0.1', '2021-03-17', '12:18:30'),
(873, '127.0.0.1', '2021-03-17', '12:18:30'),
(874, '127.0.0.1', '2021-03-17', '12:18:30'),
(875, '127.0.0.1', '2021-03-17', '12:18:34'),
(876, '127.0.0.1', '2021-03-17', '12:18:36'),
(877, '127.0.0.1', '2021-03-17', '12:18:36'),
(878, '127.0.0.1', '2021-03-17', '12:18:36'),
(879, '127.0.0.1', '2021-03-17', '12:18:36'),
(880, '127.0.0.1', '2021-03-17', '12:18:39'),
(881, '127.0.0.1', '2021-03-17', '12:18:40'),
(882, '127.0.0.1', '2021-03-17', '12:18:40'),
(883, '127.0.0.1', '2021-03-17', '12:18:40'),
(884, '127.0.0.1', '2021-03-17', '12:18:40'),
(885, '127.0.0.1', '2021-03-17', '12:18:43'),
(886, '127.0.0.1', '2021-03-17', '12:18:59'),
(887, '127.0.0.1', '2021-03-17', '12:18:59'),
(888, '127.0.0.1', '2021-03-17', '12:18:59'),
(889, '127.0.0.1', '2021-03-17', '12:25:40'),
(890, '127.0.0.1', '2021-03-17', '12:25:40'),
(891, '127.0.0.1', '2021-03-17', '12:25:40'),
(892, '127.0.0.1', '2021-03-17', '12:25:43'),
(893, '127.0.0.1', '2021-03-17', '12:25:43'),
(894, '127.0.0.1', '2021-03-17', '12:25:43'),
(895, '127.0.0.1', '2021-03-17', '12:25:47'),
(896, '127.0.0.1', '2021-03-17', '12:25:47'),
(897, '127.0.0.1', '2021-03-17', '12:25:47'),
(898, '127.0.0.1', '2021-03-17', '12:25:50'),
(899, '127.0.0.1', '2021-03-17', '12:25:50'),
(900, '127.0.0.1', '2021-03-17', '12:25:50'),
(901, '127.0.0.1', '2021-03-17', '13:44:48'),
(902, '127.0.0.1', '2021-03-17', '13:44:48'),
(903, '127.0.0.1', '2021-03-17', '13:45:00'),
(904, '127.0.0.1', '2021-03-17', '13:46:01'),
(905, '127.0.0.1', '2021-03-17', '13:46:15'),
(906, '127.0.0.1', '2021-03-17', '13:46:18'),
(907, '127.0.0.1', '2021-03-17', '13:46:19'),
(908, '127.0.0.1', '2021-03-17', '13:46:46'),
(909, '127.0.0.1', '2021-03-17', '13:55:15'),
(910, '127.0.0.1', '2021-03-17', '13:55:21'),
(911, '127.0.0.1', '2021-03-17', '13:55:21'),
(912, '127.0.0.1', '2021-03-17', '13:55:21'),
(913, '127.0.0.1', '2021-03-17', '13:55:33'),
(914, '127.0.0.1', '2021-03-17', '13:55:37'),
(915, '127.0.0.1', '2021-03-17', '13:55:37'),
(916, '127.0.0.1', '2021-03-17', '13:55:37'),
(917, '127.0.0.1', '2021-03-17', '13:55:39'),
(918, '127.0.0.1', '2021-03-17', '13:55:43'),
(919, '127.0.0.1', '2021-03-17', '13:55:43'),
(920, '127.0.0.1', '2021-03-17', '13:55:43'),
(921, '127.0.0.1', '2021-03-17', '13:55:49'),
(922, '127.0.0.1', '2021-03-17', '13:56:06'),
(923, '127.0.0.1', '2021-03-17', '13:56:06'),
(924, '127.0.0.1', '2021-03-17', '13:56:06'),
(925, '127.0.0.1', '2021-03-17', '14:02:48'),
(926, '127.0.0.1', '2021-03-17', '14:02:54'),
(927, '127.0.0.1', '2021-03-17', '14:02:54'),
(928, '127.0.0.1', '2021-03-17', '14:02:54'),
(929, '127.0.0.1', '2021-03-17', '14:03:31'),
(930, '127.0.0.1', '2021-03-17', '14:03:32'),
(931, '127.0.0.1', '2021-03-17', '14:03:32'),
(932, '127.0.0.1', '2021-03-17', '14:03:50'),
(933, '127.0.0.1', '2021-03-17', '14:03:50'),
(934, '127.0.0.1', '2021-03-17', '14:03:50'),
(935, '127.0.0.1', '2021-03-17', '14:03:50'),
(936, '127.0.0.1', '2021-03-17', '14:04:13'),
(937, '127.0.0.1', '2021-03-17', '14:04:13'),
(938, '127.0.0.1', '2021-03-17', '14:04:13'),
(939, '127.0.0.1', '2021-03-17', '14:04:13'),
(940, '127.0.0.1', '2021-03-17', '14:04:23'),
(941, '127.0.0.1', '2021-03-17', '14:04:23'),
(942, '127.0.0.1', '2021-03-17', '14:04:29'),
(943, '127.0.0.1', '2021-03-17', '14:04:31'),
(944, '127.0.0.1', '2021-03-17', '14:04:31'),
(945, '127.0.0.1', '2021-03-17', '14:04:40'),
(946, '127.0.0.1', '2021-03-17', '14:04:41'),
(947, '127.0.0.1', '2021-03-17', '14:47:16'),
(948, '127.0.0.1', '2021-03-17', '14:47:21'),
(949, '127.0.0.1', '2021-03-17', '14:47:21'),
(950, '127.0.0.1', '2021-03-17', '14:47:28'),
(951, '127.0.0.1', '2021-03-17', '14:47:29'),
(952, '127.0.0.1', '2021-03-17', '14:47:29'),
(953, '127.0.0.1', '2021-03-17', '14:48:09'),
(954, '127.0.0.1', '2021-03-17', '14:48:10'),
(955, '127.0.0.1', '2021-03-17', '14:48:10'),
(956, '127.0.0.1', '2021-03-17', '14:48:13'),
(957, '127.0.0.1', '2021-03-17', '14:48:14'),
(958, '127.0.0.1', '2021-03-17', '14:48:15'),
(959, '127.0.0.1', '2021-03-17', '15:07:31'),
(960, '127.0.0.1', '2021-03-17', '15:07:32'),
(961, '127.0.0.1', '2021-03-17', '15:07:32'),
(962, '127.0.0.1', '2021-03-17', '15:07:34'),
(963, '127.0.0.1', '2021-03-17', '15:07:36'),
(964, '127.0.0.1', '2021-03-17', '15:07:38'),
(965, '127.0.0.1', '2021-03-17', '15:07:38'),
(966, '127.0.0.1', '2021-03-17', '15:07:38'),
(967, '127.0.0.1', '2021-03-17', '15:07:42'),
(968, '127.0.0.1', '2021-03-17', '15:07:43'),
(969, '127.0.0.1', '2021-03-17', '15:09:01'),
(970, '127.0.0.1', '2021-03-17', '15:09:01'),
(971, '127.0.0.1', '2021-03-17', '15:09:01'),
(972, '127.0.0.1', '2021-03-17', '15:09:03'),
(973, '127.0.0.1', '2021-03-17', '15:11:10'),
(974, '127.0.0.1', '2021-03-17', '15:11:10'),
(975, '127.0.0.1', '2021-03-17', '15:11:10'),
(976, '127.0.0.1', '2021-03-17', '15:11:12'),
(977, '127.0.0.1', '2021-03-17', '15:11:12'),
(978, '127.0.0.1', '2021-03-17', '15:11:23'),
(979, '127.0.0.1', '2021-03-17', '15:11:23'),
(980, '127.0.0.1', '2021-03-17', '15:11:23'),
(981, '127.0.0.1', '2021-03-17', '15:11:26'),
(982, '127.0.0.1', '2021-03-17', '15:11:26'),
(983, '127.0.0.1', '2021-03-17', '15:11:28'),
(984, '127.0.0.1', '2021-03-17', '15:11:28'),
(985, '127.0.0.1', '2021-03-17', '15:11:31'),
(986, '127.0.0.1', '2021-03-17', '15:11:31'),
(987, '127.0.0.1', '2021-03-17', '15:11:32'),
(988, '127.0.0.1', '2021-03-17', '15:11:32'),
(989, '127.0.0.1', '2021-03-17', '15:14:07'),
(990, '127.0.0.1', '2021-03-17', '15:14:07'),
(991, '127.0.0.1', '2021-03-17', '15:14:07'),
(992, '127.0.0.1', '2021-03-17', '15:14:11'),
(993, '127.0.0.1', '2021-03-17', '15:14:11'),
(994, '127.0.0.1', '2021-03-17', '15:14:13'),
(995, '127.0.0.1', '2021-03-17', '15:14:13'),
(996, '127.0.0.1', '2021-03-17', '15:14:56'),
(997, '127.0.0.1', '2021-03-17', '15:14:56'),
(998, '127.0.0.1', '2021-03-17', '15:14:57'),
(999, '127.0.0.1', '2021-03-17', '15:14:57'),
(1000, '127.0.0.1', '2021-03-17', '15:14:58'),
(1001, '127.0.0.1', '2021-03-17', '15:14:58'),
(1002, '127.0.0.1', '2021-03-17', '15:14:59'),
(1003, '127.0.0.1', '2021-03-17', '15:14:59'),
(1004, '127.0.0.1', '2021-03-17', '15:15:02'),
(1005, '127.0.0.1', '2021-03-17', '15:15:02'),
(1006, '127.0.0.1', '2021-03-17', '15:15:04'),
(1007, '127.0.0.1', '2021-03-17', '15:15:04'),
(1008, '127.0.0.1', '2021-03-17', '15:15:12'),
(1009, '127.0.0.1', '2021-03-17', '15:15:12'),
(1010, '127.0.0.1', '2021-03-17', '15:15:16'),
(1011, '127.0.0.1', '2021-03-17', '15:15:16'),
(1012, '127.0.0.1', '2021-03-17', '15:20:30'),
(1013, '127.0.0.1', '2021-03-17', '15:20:30'),
(1014, '127.0.0.1', '2021-03-17', '15:20:30'),
(1015, '127.0.0.1', '2021-03-17', '15:20:33'),
(1016, '127.0.0.1', '2021-03-17', '15:20:33'),
(1017, '127.0.0.1', '2021-03-17', '15:20:43'),
(1018, '127.0.0.1', '2021-03-17', '15:20:43'),
(1019, '127.0.0.1', '2021-03-17', '15:20:53'),
(1020, '127.0.0.1', '2021-03-17', '15:20:53'),
(1021, '127.0.0.1', '2021-03-17', '15:20:53'),
(1022, '127.0.0.1', '2021-03-17', '15:20:57'),
(1023, '127.0.0.1', '2021-03-17', '15:20:57'),
(1024, '127.0.0.1', '2021-03-17', '15:20:58'),
(1025, '127.0.0.1', '2021-03-17', '15:20:58'),
(1026, '127.0.0.1', '2021-03-17', '15:21:20'),
(1027, '127.0.0.1', '2021-03-17', '15:21:20'),
(1028, '127.0.0.1', '2021-03-17', '15:21:20'),
(1029, '127.0.0.1', '2021-03-17', '15:21:22'),
(1030, '127.0.0.1', '2021-03-17', '15:21:22'),
(1031, '127.0.0.1', '2021-03-17', '15:21:28'),
(1032, '127.0.0.1', '2021-03-17', '15:21:28'),
(1033, '127.0.0.1', '2021-03-17', '15:22:47'),
(1034, '127.0.0.1', '2021-03-17', '15:22:47'),
(1035, '127.0.0.1', '2021-03-17', '15:22:47'),
(1036, '127.0.0.1', '2021-03-17', '15:22:49'),
(1037, '127.0.0.1', '2021-03-17', '15:22:49'),
(1038, '127.0.0.1', '2021-03-17', '15:22:54'),
(1039, '127.0.0.1', '2021-03-17', '15:22:54'),
(1040, '127.0.0.1', '2021-03-17', '15:22:55'),
(1041, '127.0.0.1', '2021-03-17', '15:22:55'),
(1042, '127.0.0.1', '2021-03-17', '15:24:33'),
(1043, '127.0.0.1', '2021-03-17', '15:24:33'),
(1044, '127.0.0.1', '2021-03-17', '15:24:33'),
(1045, '127.0.0.1', '2021-03-17', '15:24:35'),
(1046, '127.0.0.1', '2021-03-17', '15:24:35'),
(1047, '127.0.0.1', '2021-03-17', '15:24:41'),
(1048, '127.0.0.1', '2021-03-17', '15:24:41'),
(1049, '127.0.0.1', '2021-03-17', '15:28:55'),
(1050, '127.0.0.1', '2021-03-17', '15:28:55'),
(1051, '127.0.0.1', '2021-03-17', '15:28:55'),
(1052, '127.0.0.1', '2021-03-17', '15:28:57'),
(1053, '127.0.0.1', '2021-03-17', '15:28:57'),
(1054, '127.0.0.1', '2021-03-17', '15:28:59'),
(1055, '127.0.0.1', '2021-03-17', '15:28:59'),
(1056, '127.0.0.1', '2021-03-17', '15:29:01'),
(1057, '127.0.0.1', '2021-03-17', '15:29:01'),
(1058, '127.0.0.1', '2021-03-17', '15:29:03'),
(1059, '127.0.0.1', '2021-03-17', '15:29:03'),
(1060, '127.0.0.1', '2021-03-17', '15:29:05'),
(1061, '127.0.0.1', '2021-03-17', '15:29:05'),
(1062, '127.0.0.1', '2021-03-17', '15:30:07'),
(1063, '127.0.0.1', '2021-03-17', '15:30:07'),
(1064, '127.0.0.1', '2021-03-17', '15:30:07'),
(1065, '127.0.0.1', '2021-03-17', '15:30:09'),
(1066, '127.0.0.1', '2021-03-17', '15:30:09'),
(1067, '127.0.0.1', '2021-03-17', '15:30:10'),
(1068, '127.0.0.1', '2021-03-17', '15:30:10'),
(1069, '127.0.0.1', '2021-03-17', '15:30:12'),
(1070, '127.0.0.1', '2021-03-17', '15:30:12'),
(1071, '127.0.0.1', '2021-03-17', '15:30:13'),
(1072, '127.0.0.1', '2021-03-17', '15:30:13'),
(1073, '127.0.0.1', '2021-03-17', '15:31:18'),
(1074, '127.0.0.1', '2021-03-17', '15:31:18'),
(1075, '127.0.0.1', '2021-03-17', '15:31:18'),
(1076, '127.0.0.1', '2021-03-17', '15:31:20'),
(1077, '127.0.0.1', '2021-03-17', '15:31:20'),
(1078, '127.0.0.1', '2021-03-17', '15:31:22'),
(1079, '127.0.0.1', '2021-03-17', '15:31:22'),
(1080, '127.0.0.1', '2021-03-17', '15:31:27'),
(1081, '127.0.0.1', '2021-03-17', '15:31:27'),
(1082, '127.0.0.1', '2021-03-17', '15:31:28'),
(1083, '127.0.0.1', '2021-03-17', '15:31:28'),
(1084, '127.0.0.1', '2021-03-17', '15:31:29'),
(1085, '127.0.0.1', '2021-03-17', '15:31:29'),
(1086, '127.0.0.1', '2021-03-17', '15:31:31'),
(1087, '127.0.0.1', '2021-03-17', '15:31:31'),
(1088, '127.0.0.1', '2021-03-17', '15:32:13'),
(1089, '127.0.0.1', '2021-03-17', '15:32:13'),
(1090, '127.0.0.1', '2021-03-17', '15:32:13'),
(1091, '127.0.0.1', '2021-03-17', '15:32:16'),
(1092, '127.0.0.1', '2021-03-17', '15:32:16'),
(1093, '127.0.0.1', '2021-03-17', '15:32:17'),
(1094, '127.0.0.1', '2021-03-17', '15:32:17'),
(1095, '127.0.0.1', '2021-03-17', '15:32:39'),
(1096, '127.0.0.1', '2021-03-17', '15:32:40'),
(1097, '127.0.0.1', '2021-03-17', '15:32:40'),
(1098, '127.0.0.1', '2021-03-17', '15:32:41'),
(1099, '127.0.0.1', '2021-03-17', '15:32:41'),
(1100, '127.0.0.1', '2021-03-17', '15:32:41'),
(1101, '127.0.0.1', '2021-03-17', '15:32:44'),
(1102, '127.0.0.1', '2021-03-17', '15:32:44'),
(1103, '127.0.0.1', '2021-03-17', '15:32:44'),
(1104, '127.0.0.1', '2021-03-17', '15:32:44'),
(1105, '127.0.0.1', '2021-03-17', '15:32:45'),
(1106, '127.0.0.1', '2021-03-17', '15:32:45'),
(1107, '127.0.0.1', '2021-03-17', '15:32:47'),
(1108, '127.0.0.1', '2021-03-17', '15:32:47'),
(1109, '127.0.0.1', '2021-03-17', '15:45:38'),
(1110, '127.0.0.1', '2021-03-17', '15:45:39'),
(1111, '127.0.0.1', '2021-03-17', '15:45:39'),
(1112, '127.0.0.1', '2021-03-17', '15:45:41'),
(1113, '127.0.0.1', '2021-03-17', '15:45:41'),
(1114, '127.0.0.1', '2021-03-17', '15:45:45'),
(1115, '127.0.0.1', '2021-03-17', '15:45:45'),
(1116, '127.0.0.1', '2021-03-17', '15:45:49'),
(1117, '127.0.0.1', '2021-03-17', '15:45:49'),
(1118, '127.0.0.1', '2021-03-17', '15:45:52'),
(1119, '127.0.0.1', '2021-03-17', '15:45:53'),
(1120, '127.0.0.1', '2021-03-17', '15:45:53'),
(1121, '127.0.0.1', '2021-03-17', '15:45:55'),
(1122, '127.0.0.1', '2021-03-17', '15:45:55'),
(1123, '127.0.0.1', '2021-03-17', '15:45:55'),
(1124, '127.0.0.1', '2021-03-17', '15:45:58'),
(1125, '127.0.0.1', '2021-03-17', '15:45:58'),
(1126, '127.0.0.1', '2021-03-17', '15:49:56'),
(1127, '127.0.0.1', '2021-03-17', '15:49:56'),
(1128, '127.0.0.1', '2021-03-17', '15:49:56'),
(1129, '127.0.0.1', '2021-03-17', '15:49:59'),
(1130, '127.0.0.1', '2021-03-17', '15:49:59'),
(1131, '127.0.0.1', '2021-03-17', '15:50:15'),
(1132, '127.0.0.1', '2021-03-17', '15:50:19'),
(1133, '127.0.0.1', '2021-03-17', '15:50:39'),
(1134, '127.0.0.1', '2021-03-17', '15:50:39');
INSERT INTO `visitors` (`id`, `ip`, `date`, `time`) VALUES
(1135, '127.0.0.1', '2021-03-17', '15:50:42'),
(1136, '127.0.0.1', '2021-03-17', '15:50:48'),
(1137, '127.0.0.1', '2021-03-17', '15:50:55'),
(1138, '127.0.0.1', '2021-03-17', '15:51:02'),
(1139, '127.0.0.1', '2021-03-17', '15:51:02'),
(1140, '127.0.0.1', '2021-03-17', '15:51:02'),
(1141, '127.0.0.1', '2021-03-17', '15:51:08'),
(1142, '127.0.0.1', '2021-03-17', '15:51:08'),
(1143, '127.0.0.1', '2021-03-17', '15:51:08'),
(1144, '127.0.0.1', '2021-03-17', '15:51:11'),
(1145, '127.0.0.1', '2021-03-17', '15:51:16'),
(1146, '127.0.0.1', '2021-03-17', '15:51:16'),
(1147, '127.0.0.1', '2021-03-17', '15:51:16'),
(1148, '127.0.0.1', '2021-03-17', '15:51:55'),
(1149, '127.0.0.1', '2021-03-17', '15:51:55'),
(1150, '127.0.0.1', '2021-03-17', '15:51:55'),
(1151, '127.0.0.1', '2021-03-17', '15:51:55'),
(1152, '127.0.0.1', '2021-03-17', '15:52:00'),
(1153, '127.0.0.1', '2021-03-17', '15:52:00'),
(1154, '127.0.0.1', '2021-03-17', '15:52:01'),
(1155, '127.0.0.1', '2021-03-17', '15:52:04'),
(1156, '127.0.0.1', '2021-03-17', '15:52:05'),
(1157, '127.0.0.1', '2021-03-17', '15:52:21'),
(1158, '127.0.0.1', '2021-03-17', '15:52:21'),
(1159, '127.0.0.1', '2021-03-17', '15:52:21'),
(1160, '127.0.0.1', '2021-03-17', '15:52:25'),
(1161, '127.0.0.1', '2021-03-17', '15:52:25'),
(1162, '127.0.0.1', '2021-03-17', '15:52:31'),
(1163, '127.0.0.1', '2021-03-17', '15:52:31'),
(1164, '127.0.0.1', '2021-03-17', '15:52:33'),
(1165, '127.0.0.1', '2021-03-17', '15:52:33'),
(1166, '127.0.0.1', '2021-03-17', '15:54:24'),
(1167, '127.0.0.1', '2021-03-17', '15:54:24'),
(1168, '127.0.0.1', '2021-03-17', '15:54:24'),
(1169, '127.0.0.1', '2021-03-17', '15:54:26'),
(1170, '127.0.0.1', '2021-03-17', '15:54:26'),
(1171, '127.0.0.1', '2021-03-17', '15:55:39'),
(1172, '127.0.0.1', '2021-03-17', '15:55:39'),
(1173, '127.0.0.1', '2021-03-17', '15:55:39'),
(1174, '127.0.0.1', '2021-03-17', '15:55:41'),
(1175, '127.0.0.1', '2021-03-17', '15:55:41'),
(1176, '127.0.0.1', '2021-03-17', '15:58:37'),
(1177, '127.0.0.1', '2021-03-17', '15:58:37'),
(1178, '127.0.0.1', '2021-03-17', '15:58:37'),
(1179, '127.0.0.1', '2021-03-17', '15:58:38'),
(1180, '127.0.0.1', '2021-03-17', '15:58:38'),
(1181, '127.0.0.1', '2021-03-17', '15:58:40'),
(1182, '127.0.0.1', '2021-03-17', '15:58:53'),
(1183, '127.0.0.1', '2021-03-17', '15:58:53'),
(1184, '127.0.0.1', '2021-03-17', '15:58:56'),
(1185, '127.0.0.1', '2021-03-17', '15:58:56'),
(1186, '127.0.0.1', '2021-03-17', '15:58:58'),
(1187, '127.0.0.1', '2021-03-17', '15:59:47'),
(1188, '127.0.0.1', '2021-03-17', '15:59:47'),
(1189, '127.0.0.1', '2021-03-17', '15:59:47'),
(1190, '127.0.0.1', '2021-03-17', '15:59:49'),
(1191, '127.0.0.1', '2021-03-17', '15:59:49'),
(1192, '127.0.0.1', '2021-03-17', '15:59:51'),
(1193, '127.0.0.1', '2021-03-17', '15:59:59'),
(1194, '127.0.0.1', '2021-03-17', '15:59:59'),
(1195, '127.0.0.1', '2021-03-17', '16:00:01'),
(1196, '127.0.0.1', '2021-03-17', '16:00:01'),
(1197, '127.0.0.1', '2021-03-17', '16:00:03'),
(1198, '127.0.0.1', '2021-03-17', '16:01:12'),
(1199, '127.0.0.1', '2021-03-17', '16:01:12'),
(1200, '127.0.0.1', '2021-03-17', '16:01:12'),
(1201, '127.0.0.1', '2021-03-17', '16:01:15'),
(1202, '127.0.0.1', '2021-03-17', '16:01:15'),
(1203, '127.0.0.1', '2021-03-17', '16:01:19'),
(1204, '127.0.0.1', '2021-03-17', '16:02:54'),
(1205, '127.0.0.1', '2021-03-17', '16:02:54'),
(1206, '127.0.0.1', '2021-03-17', '16:02:55'),
(1207, '127.0.0.1', '2021-03-17', '16:02:55'),
(1208, '127.0.0.1', '2021-03-17', '16:02:57'),
(1209, '127.0.0.1', '2021-03-17', '16:03:26'),
(1210, '127.0.0.1', '2021-03-17', '16:03:26'),
(1211, '127.0.0.1', '2021-03-17', '16:03:26'),
(1212, '127.0.0.1', '2021-03-17', '16:03:28'),
(1213, '127.0.0.1', '2021-03-17', '16:03:28'),
(1214, '127.0.0.1', '2021-03-17', '16:03:32'),
(1215, '127.0.0.1', '2021-03-17', '16:04:39'),
(1216, '127.0.0.1', '2021-03-17', '16:04:39'),
(1217, '127.0.0.1', '2021-03-17', '16:04:39'),
(1218, '127.0.0.1', '2021-03-17', '16:04:41'),
(1219, '127.0.0.1', '2021-03-17', '16:04:41'),
(1220, '127.0.0.1', '2021-03-17', '16:04:42'),
(1221, '127.0.0.1', '2021-03-17', '16:07:06'),
(1222, '127.0.0.1', '2021-03-17', '16:07:06'),
(1223, '127.0.0.1', '2021-03-17', '16:07:06'),
(1224, '127.0.0.1', '2021-03-17', '16:07:10'),
(1225, '127.0.0.1', '2021-03-17', '16:07:10'),
(1226, '127.0.0.1', '2021-03-17', '16:07:13'),
(1227, '127.0.0.1', '2021-03-17', '16:09:30'),
(1228, '127.0.0.1', '2021-03-17', '16:09:30'),
(1229, '127.0.0.1', '2021-03-17', '16:09:30'),
(1230, '127.0.0.1', '2021-03-17', '16:09:35'),
(1231, '127.0.0.1', '2021-03-17', '16:09:36'),
(1232, '127.0.0.1', '2021-03-17', '16:09:37'),
(1233, '127.0.0.1', '2021-03-17', '16:09:42'),
(1234, '127.0.0.1', '2021-03-17', '16:09:42'),
(1235, '127.0.0.1', '2021-03-17', '16:09:50'),
(1236, '127.0.0.1', '2021-03-17', '16:09:56'),
(1237, '127.0.0.1', '2021-03-17', '16:10:00'),
(1238, '127.0.0.1', '2021-03-17', '16:10:14'),
(1239, '127.0.0.1', '2021-03-17', '16:12:03'),
(1240, '127.0.0.1', '2021-03-17', '16:12:07'),
(1241, '127.0.0.1', '2021-03-17', '16:12:14'),
(1242, '127.0.0.1', '2021-03-17', '16:12:20'),
(1243, '127.0.0.1', '2021-03-17', '16:12:20'),
(1244, '127.0.0.1', '2021-03-17', '16:12:20'),
(1245, '127.0.0.1', '2021-03-17', '16:13:47'),
(1246, '127.0.0.1', '2021-03-17', '16:13:47'),
(1247, '127.0.0.1', '2021-03-17', '16:13:47'),
(1248, '127.0.0.1', '2021-03-17', '16:14:09'),
(1249, '127.0.0.1', '2021-03-17', '16:14:11'),
(1250, '127.0.0.1', '2021-03-17', '16:14:13'),
(1251, '127.0.0.1', '2021-03-17', '16:14:13'),
(1252, '127.0.0.1', '2021-03-17', '16:14:15'),
(1253, '127.0.0.1', '2021-03-17', '16:14:18'),
(1254, '127.0.0.1', '2021-03-17', '16:14:24'),
(1255, '127.0.0.1', '2021-03-17', '16:14:24'),
(1256, '127.0.0.1', '2021-03-17', '16:14:24'),
(1257, '127.0.0.1', '2021-03-17', '16:14:33'),
(1258, '127.0.0.1', '2021-03-17', '16:14:36'),
(1259, '127.0.0.1', '2021-03-17', '16:14:40'),
(1260, '127.0.0.1', '2021-03-17', '16:14:47'),
(1261, '127.0.0.1', '2021-03-17', '16:14:47'),
(1262, '127.0.0.1', '2021-03-17', '16:14:47'),
(1263, '127.0.0.1', '2021-03-17', '16:14:50'),
(1264, '127.0.0.1', '2021-03-17', '16:14:53'),
(1265, '127.0.0.1', '2021-03-17', '16:14:56'),
(1266, '127.0.0.1', '2021-03-17', '16:14:56'),
(1267, '127.0.0.1', '2021-03-17', '16:14:56'),
(1268, '127.0.0.1', '2021-03-17', '16:15:00'),
(1269, '127.0.0.1', '2021-03-17', '16:15:00'),
(1270, '127.0.0.1', '2021-03-17', '16:15:01'),
(1271, '127.0.0.1', '2021-03-17', '16:15:01'),
(1272, '127.0.0.1', '2021-03-17', '16:15:03'),
(1273, '127.0.0.1', '2021-03-17', '16:15:03'),
(1274, '127.0.0.1', '2021-03-17', '16:15:05'),
(1275, '127.0.0.1', '2021-03-17', '16:15:06'),
(1276, '127.0.0.1', '2021-03-17', '16:15:06'),
(1277, '127.0.0.1', '2021-03-17', '16:15:08'),
(1278, '127.0.0.1', '2021-03-17', '16:15:08'),
(1279, '127.0.0.1', '2021-03-17', '16:15:16'),
(1280, '127.0.0.1', '2021-03-17', '16:15:16'),
(1281, '127.0.0.1', '2021-03-17', '16:15:16'),
(1282, '127.0.0.1', '2021-03-17', '16:17:41'),
(1283, '127.0.0.1', '2021-03-17', '16:17:41'),
(1284, '127.0.0.1', '2021-03-17', '16:17:41'),
(1285, '127.0.0.1', '2021-03-17', '16:17:45'),
(1286, '127.0.0.1', '2021-03-17', '16:17:47'),
(1287, '127.0.0.1', '2021-03-17', '16:17:48'),
(1288, '127.0.0.1', '2021-03-17', '16:17:49'),
(1289, '127.0.0.1', '2021-03-17', '16:17:51'),
(1290, '127.0.0.1', '2021-03-17', '16:17:52'),
(1291, '127.0.0.1', '2021-03-17', '16:17:52'),
(1292, '127.0.0.1', '2021-03-17', '16:17:52'),
(1293, '127.0.0.1', '2021-03-17', '16:17:55'),
(1294, '127.0.0.1', '2021-03-17', '16:17:59'),
(1295, '127.0.0.1', '2021-03-17', '16:18:01'),
(1296, '127.0.0.1', '2021-03-17', '16:18:02'),
(1297, '127.0.0.1', '2021-03-17', '16:18:04'),
(1298, '127.0.0.1', '2021-03-17', '16:18:04'),
(1299, '127.0.0.1', '2021-03-17', '16:18:09'),
(1300, '127.0.0.1', '2021-03-17', '16:18:11'),
(1301, '127.0.0.1', '2021-03-17', '16:18:12'),
(1302, '127.0.0.1', '2021-03-17', '16:18:13'),
(1303, '127.0.0.1', '2021-03-17', '16:18:14'),
(1304, '127.0.0.1', '2021-03-17', '16:19:11'),
(1305, '127.0.0.1', '2021-03-17', '16:19:16'),
(1306, '127.0.0.1', '2021-03-17', '16:19:18'),
(1307, '127.0.0.1', '2021-03-17', '16:19:21'),
(1308, '127.0.0.1', '2021-03-17', '16:19:23'),
(1309, '127.0.0.1', '2021-03-17', '16:19:25'),
(1310, '127.0.0.1', '2021-03-17', '16:19:27'),
(1311, '127.0.0.1', '2021-03-17', '16:19:30'),
(1312, '127.0.0.1', '2021-03-17', '16:19:33'),
(1313, '127.0.0.1', '2021-03-17', '16:19:33'),
(1314, '127.0.0.1', '2021-03-17', '16:19:33'),
(1315, '127.0.0.1', '2021-03-17', '16:19:36'),
(1316, '127.0.0.1', '2021-03-17', '16:19:36'),
(1317, '127.0.0.1', '2021-03-17', '16:19:37'),
(1318, '127.0.0.1', '2021-03-17', '16:19:39'),
(1319, '127.0.0.1', '2021-03-17', '16:21:16'),
(1320, '127.0.0.1', '2021-03-17', '16:21:18'),
(1321, '127.0.0.1', '2021-03-17', '16:21:28'),
(1322, '127.0.0.1', '2021-03-17', '16:21:31'),
(1323, '127.0.0.1', '2021-03-17', '16:23:47'),
(1324, '127.0.0.1', '2021-03-17', '16:23:49'),
(1325, '127.0.0.1', '2021-03-17', '16:23:59'),
(1326, '127.0.0.1', '2021-03-17', '16:24:01'),
(1327, '127.0.0.1', '2021-03-17', '16:25:18'),
(1328, '127.0.0.1', '2021-03-17', '16:25:23'),
(1329, '127.0.0.1', '2021-03-17', '16:25:23'),
(1330, '127.0.0.1', '2021-03-17', '16:25:23'),
(1331, '127.0.0.1', '2021-03-17', '16:25:26'),
(1332, '127.0.0.1', '2021-03-17', '16:25:26'),
(1333, '127.0.0.1', '2021-03-17', '16:25:28'),
(1334, '127.0.0.1', '2021-03-17', '16:25:29'),
(1335, '127.0.0.1', '2021-03-17', '16:25:31'),
(1336, '127.0.0.1', '2021-03-17', '16:25:31'),
(1337, '127.0.0.1', '2021-03-17', '16:25:32'),
(1338, '127.0.0.1', '2021-03-17', '16:25:34'),
(1339, '127.0.0.1', '2021-03-17', '16:25:34'),
(1340, '127.0.0.1', '2021-03-17', '16:25:34'),
(1341, '127.0.0.1', '2021-03-17', '16:25:35'),
(1342, '127.0.0.1', '2021-03-17', '16:25:36'),
(1343, '127.0.0.1', '2021-03-17', '16:25:45'),
(1344, '127.0.0.1', '2021-03-17', '16:25:45'),
(1345, '127.0.0.1', '2021-03-17', '16:25:46'),
(1346, '127.0.0.1', '2021-03-17', '16:25:46'),
(1347, '127.0.0.1', '2021-03-17', '16:25:48'),
(1348, '127.0.0.1', '2021-03-17', '17:23:15'),
(1349, '127.0.0.1', '2021-03-17', '17:23:15'),
(1350, '127.0.0.1', '2021-03-17', '17:23:15'),
(1351, '127.0.0.1', '2021-03-17', '17:23:23'),
(1352, '127.0.0.1', '2021-03-17', '17:23:23'),
(1353, '127.0.0.1', '2021-03-17', '17:23:25'),
(1354, '127.0.0.1', '2021-03-17', '17:23:27'),
(1355, '127.0.0.1', '2021-03-17', '17:25:50'),
(1356, '127.0.0.1', '2021-03-17', '17:25:51'),
(1357, '127.0.0.1', '2021-03-17', '17:25:51'),
(1358, '127.0.0.1', '2021-03-17', '17:25:54'),
(1359, '127.0.0.1', '2021-03-17', '17:25:54'),
(1360, '127.0.0.1', '2021-03-17', '17:25:56'),
(1361, '127.0.0.1', '2021-03-17', '17:25:58'),
(1362, '127.0.0.1', '2021-03-17', '17:26:06'),
(1363, '127.0.0.1', '2021-03-17', '17:26:06'),
(1364, '127.0.0.1', '2021-03-17', '17:26:06'),
(1365, '127.0.0.1', '2021-03-17', '17:26:09'),
(1366, '127.0.0.1', '2021-03-17', '17:26:09'),
(1367, '127.0.0.1', '2021-03-17', '17:26:11'),
(1368, '127.0.0.1', '2021-03-17', '17:26:14'),
(1369, '127.0.0.1', '2021-03-17', '17:27:02'),
(1370, '127.0.0.1', '2021-03-17', '17:27:02'),
(1371, '127.0.0.1', '2021-03-17', '17:27:02'),
(1372, '127.0.0.1', '2021-03-17', '17:27:05'),
(1373, '127.0.0.1', '2021-03-17', '17:27:05'),
(1374, '127.0.0.1', '2021-03-17', '17:27:09'),
(1375, '127.0.0.1', '2021-03-17', '17:27:14'),
(1376, '127.0.0.1', '2021-03-17', '17:27:14'),
(1377, '127.0.0.1', '2021-03-17', '17:27:46'),
(1378, '127.0.0.1', '2021-03-17', '17:27:49'),
(1379, '127.0.0.1', '2021-03-17', '17:27:52'),
(1380, '127.0.0.1', '2021-03-17', '17:27:53'),
(1381, '127.0.0.1', '2021-03-17', '17:27:59'),
(1382, '127.0.0.1', '2021-03-17', '17:27:59'),
(1383, '127.0.0.1', '2021-03-17', '17:27:59'),
(1384, '127.0.0.1', '2021-03-17', '17:28:02'),
(1385, '127.0.0.1', '2021-03-17', '17:28:02'),
(1386, '127.0.0.1', '2021-03-17', '17:28:02'),
(1387, '127.0.0.1', '2021-03-17', '17:28:05'),
(1388, '127.0.0.1', '2021-03-17', '17:30:43'),
(1389, '127.0.0.1', '2021-03-17', '17:30:44'),
(1390, '127.0.0.1', '2021-03-17', '17:30:44'),
(1391, '127.0.0.1', '2021-03-17', '17:30:46'),
(1392, '127.0.0.1', '2021-03-17', '17:30:46'),
(1393, '127.0.0.1', '2021-03-17', '17:30:50'),
(1394, '127.0.0.1', '2021-03-17', '18:21:45'),
(1395, '127.0.0.1', '2021-03-17', '18:21:45'),
(1396, '127.0.0.1', '2021-03-17', '18:21:48'),
(1397, '127.0.0.1', '2021-03-17', '18:21:52'),
(1398, '127.0.0.1', '2021-03-17', '18:21:52'),
(1399, '127.0.0.1', '2021-03-17', '18:21:58'),
(1400, '127.0.0.1', '2021-03-17', '18:21:58'),
(1401, '127.0.0.1', '2021-03-17', '18:22:01'),
(1402, '127.0.0.1', '2021-03-17', '18:22:06'),
(1403, '127.0.0.1', '2021-03-17', '18:22:38'),
(1404, '127.0.0.1', '2021-03-17', '18:25:12'),
(1405, '127.0.0.1', '2021-03-17', '18:30:18'),
(1406, '127.0.0.1', '2021-03-17', '18:30:42'),
(1407, '127.0.0.1', '2021-03-17', '18:31:24'),
(1408, '127.0.0.1', '2021-03-17', '18:31:54'),
(1409, '127.0.0.1', '2021-03-17', '18:34:20'),
(1410, '127.0.0.1', '2021-03-17', '18:36:40'),
(1411, '127.0.0.1', '2021-03-17', '18:40:11'),
(1412, '127.0.0.1', '2021-03-17', '18:40:51'),
(1413, '127.0.0.1', '2021-03-17', '18:43:23'),
(1414, '127.0.0.1', '2021-03-17', '18:44:47'),
(1415, '127.0.0.1', '2021-03-17', '18:45:54'),
(1416, '127.0.0.1', '2021-03-17', '18:46:17'),
(1417, '127.0.0.1', '2021-03-17', '18:47:03'),
(1418, '127.0.0.1', '2021-03-17', '18:47:29'),
(1419, '127.0.0.1', '2021-03-17', '18:51:50'),
(1420, '127.0.0.1', '2021-03-17', '18:53:49'),
(1421, '127.0.0.1', '2021-03-17', '18:54:04'),
(1422, '127.0.0.1', '2021-03-17', '18:54:25'),
(1423, '127.0.0.1', '2021-03-17', '18:56:22'),
(1424, '127.0.0.1', '2021-03-17', '18:58:42'),
(1425, '127.0.0.1', '2021-03-17', '18:59:25'),
(1426, '127.0.0.1', '2021-03-17', '19:02:10'),
(1427, '127.0.0.1', '2021-03-17', '19:03:24'),
(1428, '127.0.0.1', '2021-03-17', '19:04:15'),
(1429, '127.0.0.1', '2021-03-17', '19:05:14'),
(1430, '127.0.0.1', '2021-03-17', '19:05:43'),
(1431, '127.0.0.1', '2021-03-17', '19:20:11'),
(1432, '127.0.0.1', '2021-03-17', '19:20:13'),
(1433, '127.0.0.1', '2021-03-17', '19:20:14'),
(1434, '127.0.0.1', '2021-03-17', '19:20:15'),
(1435, '127.0.0.1', '2021-03-17', '19:21:54'),
(1436, '127.0.0.1', '2021-03-17', '19:21:57'),
(1437, '127.0.0.1', '2021-03-17', '19:23:31'),
(1438, '127.0.0.1', '2021-03-17', '19:23:36'),
(1439, '127.0.0.1', '2021-03-17', '19:23:38'),
(1440, '127.0.0.1', '2021-03-17', '19:24:42'),
(1441, '127.0.0.1', '2021-03-17', '19:24:45'),
(1442, '127.0.0.1', '2021-03-17', '19:24:47'),
(1443, '127.0.0.1', '2021-03-17', '19:27:52'),
(1444, '127.0.0.1', '2021-03-17', '19:28:37'),
(1445, '127.0.0.1', '2021-03-17', '19:28:42'),
(1446, '127.0.0.1', '2021-03-17', '19:28:47'),
(1447, '127.0.0.1', '2021-03-17', '19:30:56'),
(1448, '127.0.0.1', '2021-03-17', '19:31:02'),
(1449, '127.0.0.1', '2021-03-17', '19:31:59'),
(1450, '127.0.0.1', '2021-03-17', '19:32:01'),
(1451, '127.0.0.1', '2021-03-17', '19:32:04'),
(1452, '127.0.0.1', '2021-03-17', '19:32:08'),
(1453, '127.0.0.1', '2021-03-18', '08:07:52'),
(1454, '127.0.0.1', '2021-03-18', '08:08:13'),
(1455, '127.0.0.1', '2021-03-18', '08:08:21'),
(1456, '127.0.0.1', '2021-03-18', '08:13:20'),
(1457, '127.0.0.1', '2021-03-18', '08:13:26'),
(1458, '127.0.0.1', '2021-03-18', '08:13:31'),
(1459, '127.0.0.1', '2021-03-18', '08:13:38'),
(1460, '127.0.0.1', '2021-03-18', '08:35:35'),
(1461, '127.0.0.1', '2021-03-18', '08:40:42'),
(1462, '127.0.0.1', '2021-03-18', '08:41:38'),
(1463, '127.0.0.1', '2021-03-18', '08:41:51'),
(1464, '127.0.0.1', '2021-03-18', '08:42:00'),
(1465, '127.0.0.1', '2021-03-18', '08:42:10'),
(1466, '127.0.0.1', '2021-03-18', '08:42:13'),
(1467, '127.0.0.1', '2021-03-18', '08:42:15'),
(1468, '127.0.0.1', '2021-03-18', '08:42:20'),
(1469, '127.0.0.1', '2021-03-18', '08:42:22'),
(1470, '127.0.0.1', '2021-03-18', '08:42:25'),
(1471, '127.0.0.1', '2021-03-18', '08:42:27'),
(1472, '127.0.0.1', '2021-03-18', '08:44:11'),
(1473, '127.0.0.1', '2021-03-18', '08:44:39'),
(1474, '127.0.0.1', '2021-03-18', '10:21:56'),
(1475, '127.0.0.1', '2021-03-18', '10:22:34'),
(1476, '127.0.0.1', '2021-03-18', '10:22:38'),
(1477, '127.0.0.1', '2021-03-18', '10:22:42'),
(1478, '127.0.0.1', '2021-03-18', '10:30:23'),
(1479, '127.0.0.1', '2021-03-18', '10:30:36'),
(1480, '127.0.0.1', '2021-03-18', '10:31:31'),
(1481, '127.0.0.1', '2021-03-18', '10:31:35'),
(1482, '127.0.0.1', '2021-03-18', '10:32:38'),
(1483, '127.0.0.1', '2021-03-18', '10:33:46'),
(1484, '127.0.0.1', '2021-03-18', '10:34:18'),
(1485, '127.0.0.1', '2021-03-18', '10:34:21'),
(1486, '127.0.0.1', '2021-03-18', '10:38:04'),
(1487, '127.0.0.1', '2021-03-18', '10:38:13'),
(1488, '127.0.0.1', '2021-03-18', '10:38:14'),
(1489, '127.0.0.1', '2021-03-18', '10:39:11'),
(1490, '127.0.0.1', '2021-03-18', '10:39:22'),
(1491, '127.0.0.1', '2021-03-18', '10:39:52'),
(1492, '127.0.0.1', '2021-03-18', '10:43:04'),
(1493, '127.0.0.1', '2021-03-18', '10:45:05'),
(1494, '127.0.0.1', '2021-03-18', '10:45:23'),
(1495, '127.0.0.1', '2021-03-18', '10:45:27'),
(1496, '127.0.0.1', '2021-03-18', '10:45:29'),
(1497, '127.0.0.1', '2021-03-18', '10:45:40'),
(1498, '127.0.0.1', '2021-03-18', '10:45:42'),
(1499, '127.0.0.1', '2021-03-18', '10:56:42'),
(1500, '127.0.0.1', '2021-03-18', '10:57:09'),
(1501, '127.0.0.1', '2021-03-18', '10:57:24'),
(1502, '127.0.0.1', '2021-03-18', '10:58:16'),
(1503, '127.0.0.1', '2021-03-18', '10:58:20'),
(1504, '127.0.0.1', '2021-03-18', '10:58:21'),
(1505, '127.0.0.1', '2021-03-18', '10:58:23'),
(1506, '127.0.0.1', '2021-03-18', '10:58:26'),
(1507, '127.0.0.1', '2021-03-18', '10:58:27'),
(1508, '127.0.0.1', '2021-03-18', '10:58:46'),
(1509, '127.0.0.1', '2021-03-18', '11:00:52'),
(1510, '127.0.0.1', '2021-03-18', '11:31:58'),
(1511, '127.0.0.1', '2021-03-18', '11:32:04'),
(1512, '127.0.0.1', '2021-03-18', '11:32:15'),
(1513, '127.0.0.1', '2021-03-18', '11:32:54'),
(1514, '127.0.0.1', '2021-03-18', '11:32:59'),
(1515, '127.0.0.1', '2021-03-18', '11:35:07'),
(1516, '127.0.0.1', '2021-03-18', '12:12:14'),
(1517, '127.0.0.1', '2021-03-18', '12:13:52'),
(1518, '127.0.0.1', '2021-03-18', '12:13:57'),
(1519, '127.0.0.1', '2021-03-18', '12:14:08'),
(1520, '127.0.0.1', '2021-03-18', '12:15:20'),
(1521, '127.0.0.1', '2021-03-18', '12:16:48'),
(1522, '127.0.0.1', '2021-03-18', '12:21:18'),
(1523, '127.0.0.1', '2021-03-18', '12:22:12'),
(1524, '127.0.0.1', '2021-03-18', '12:22:31'),
(1525, '127.0.0.1', '2021-03-18', '12:23:42'),
(1526, '127.0.0.1', '2021-03-18', '12:23:56'),
(1527, '127.0.0.1', '2021-03-18', '12:23:59'),
(1528, '127.0.0.1', '2021-03-18', '12:25:01'),
(1529, '127.0.0.1', '2021-03-18', '12:25:12'),
(1530, '127.0.0.1', '2021-03-18', '12:25:28'),
(1531, '127.0.0.1', '2021-03-18', '12:26:01'),
(1532, '127.0.0.1', '2021-03-18', '12:26:48'),
(1533, '127.0.0.1', '2021-03-18', '12:26:51'),
(1534, '127.0.0.1', '2021-03-18', '12:27:47'),
(1535, '127.0.0.1', '2021-03-18', '12:27:55'),
(1536, '127.0.0.1', '2021-03-18', '12:27:57'),
(1537, '127.0.0.1', '2021-03-18', '13:58:01'),
(1538, '127.0.0.1', '2021-03-18', '13:58:05'),
(1539, '127.0.0.1', '2021-03-18', '13:58:06'),
(1540, '127.0.0.1', '2021-03-18', '13:58:07'),
(1541, '127.0.0.1', '2021-03-18', '13:58:08'),
(1542, '127.0.0.1', '2021-03-18', '13:58:11'),
(1543, '127.0.0.1', '2021-03-18', '13:58:11'),
(1544, '127.0.0.1', '2021-03-18', '13:58:18'),
(1545, '127.0.0.1', '2021-03-18', '13:58:22'),
(1546, '127.0.0.1', '2021-03-18', '13:58:23'),
(1547, '127.0.0.1', '2021-03-18', '13:58:39'),
(1548, '127.0.0.1', '2021-03-18', '13:58:43'),
(1549, '127.0.0.1', '2021-03-18', '13:59:01'),
(1550, '127.0.0.1', '2021-03-18', '13:59:08'),
(1551, '127.0.0.1', '2021-03-18', '13:59:11'),
(1552, '127.0.0.1', '2021-03-18', '13:59:13'),
(1553, '127.0.0.1', '2021-03-18', '14:01:22'),
(1554, '127.0.0.1', '2021-03-18', '14:01:23'),
(1555, '127.0.0.1', '2021-03-18', '14:01:29'),
(1556, '127.0.0.1', '2021-03-18', '14:01:30'),
(1557, '127.0.0.1', '2021-03-18', '14:01:32'),
(1558, '127.0.0.1', '2021-03-18', '14:01:33'),
(1559, '127.0.0.1', '2021-03-18', '14:01:34'),
(1560, '127.0.0.1', '2021-03-18', '14:01:36'),
(1561, '127.0.0.1', '2021-03-18', '14:02:24'),
(1562, '127.0.0.1', '2021-03-18', '14:02:27'),
(1563, '127.0.0.1', '2021-03-18', '14:02:28'),
(1564, '127.0.0.1', '2021-03-18', '14:02:30'),
(1565, '127.0.0.1', '2021-03-18', '14:02:32'),
(1566, '127.0.0.1', '2021-03-18', '14:02:34'),
(1567, '127.0.0.1', '2021-03-18', '14:04:16'),
(1568, '127.0.0.1', '2021-03-18', '14:05:42'),
(1569, '127.0.0.1', '2021-03-18', '14:05:57'),
(1570, '127.0.0.1', '2021-03-18', '14:06:05'),
(1571, '127.0.0.1', '2021-03-18', '14:06:06'),
(1572, '127.0.0.1', '2021-03-18', '14:06:08'),
(1573, '127.0.0.1', '2021-03-18', '14:06:09'),
(1574, '127.0.0.1', '2021-03-18', '14:06:10'),
(1575, '127.0.0.1', '2021-03-18', '14:06:11'),
(1576, '127.0.0.1', '2021-03-18', '14:07:40'),
(1577, '127.0.0.1', '2021-03-18', '14:07:45'),
(1578, '127.0.0.1', '2021-03-18', '14:09:00'),
(1579, '127.0.0.1', '2021-03-18', '14:09:38'),
(1580, '127.0.0.1', '2021-03-18', '14:09:41'),
(1581, '127.0.0.1', '2021-03-18', '14:09:44'),
(1582, '127.0.0.1', '2021-03-18', '14:09:49'),
(1583, '127.0.0.1', '2021-03-18', '14:10:42'),
(1584, '127.0.0.1', '2021-03-18', '14:11:35'),
(1585, '127.0.0.1', '2021-03-18', '14:11:38'),
(1586, '127.0.0.1', '2021-03-18', '14:12:30'),
(1587, '127.0.0.1', '2021-03-18', '14:12:33'),
(1588, '127.0.0.1', '2021-03-18', '14:12:37'),
(1589, '127.0.0.1', '2021-03-18', '14:12:40'),
(1590, '127.0.0.1', '2021-03-18', '14:12:41'),
(1591, '127.0.0.1', '2021-03-18', '14:13:54'),
(1592, '127.0.0.1', '2021-03-18', '14:14:38'),
(1593, '127.0.0.1', '2021-03-18', '14:14:39'),
(1594, '127.0.0.1', '2021-03-18', '14:14:52'),
(1595, '127.0.0.1', '2021-03-18', '14:15:29'),
(1596, '127.0.0.1', '2021-03-18', '14:15:30'),
(1597, '127.0.0.1', '2021-03-18', '14:15:33'),
(1598, '127.0.0.1', '2021-03-18', '14:15:35'),
(1599, '127.0.0.1', '2021-03-18', '14:15:54'),
(1600, '127.0.0.1', '2021-03-18', '14:16:12'),
(1601, '127.0.0.1', '2021-03-18', '14:16:32'),
(1602, '127.0.0.1', '2021-03-18', '14:16:33'),
(1603, '127.0.0.1', '2021-03-18', '14:16:34'),
(1604, '127.0.0.1', '2021-03-18', '14:16:35'),
(1605, '127.0.0.1', '2021-03-18', '14:17:00'),
(1606, '127.0.0.1', '2021-03-18', '14:18:19'),
(1607, '127.0.0.1', '2021-03-18', '14:18:20'),
(1608, '127.0.0.1', '2021-03-18', '14:18:20'),
(1609, '127.0.0.1', '2021-03-19', '14:13:44'),
(1610, '127.0.0.1', '2021-03-19', '14:13:51'),
(1611, '127.0.0.1', '2021-03-19', '14:13:53'),
(1612, '127.0.0.1', '2021-03-19', '14:13:54'),
(1613, '127.0.0.1', '2021-03-19', '14:22:47'),
(1614, '127.0.0.1', '2021-03-19', '14:22:54'),
(1615, '127.0.0.1', '2021-03-19', '14:23:53'),
(1616, '127.0.0.1', '2021-03-19', '14:24:43'),
(1617, '127.0.0.1', '2021-03-19', '14:25:26'),
(1618, '127.0.0.1', '2021-03-19', '14:25:44'),
(1619, '127.0.0.1', '2021-03-19', '14:25:56'),
(1620, '127.0.0.1', '2021-03-19', '14:26:30'),
(1621, '127.0.0.1', '2021-03-19', '14:27:56'),
(1622, '127.0.0.1', '2021-03-19', '14:28:06'),
(1623, '127.0.0.1', '2021-03-19', '14:28:09'),
(1624, '127.0.0.1', '2021-03-19', '18:16:24'),
(1625, '127.0.0.1', '2021-03-19', '18:16:30'),
(1626, '127.0.0.1', '2021-03-19', '18:16:35'),
(1627, '127.0.0.1', '2021-03-19', '18:16:37'),
(1628, '127.0.0.1', '2021-03-19', '18:16:45'),
(1629, '127.0.0.1', '2021-03-19', '18:16:45'),
(1630, '127.0.0.1', '2021-03-19', '18:18:10'),
(1631, '127.0.0.1', '2021-03-19', '18:18:18'),
(1632, '127.0.0.1', '2021-03-19', '18:18:20'),
(1633, '127.0.0.1', '2021-03-19', '18:18:23'),
(1634, '127.0.0.1', '2021-03-19', '18:18:25'),
(1635, '127.0.0.1', '2021-03-19', '18:18:30'),
(1636, '127.0.0.1', '2021-03-19', '18:18:33'),
(1637, '127.0.0.1', '2021-03-19', '18:18:33'),
(1638, '127.0.0.1', '2021-03-19', '18:18:36'),
(1639, '127.0.0.1', '2021-03-19', '18:18:36'),
(1640, '127.0.0.1', '2021-03-19', '18:18:39'),
(1641, '127.0.0.1', '2021-03-19', '18:18:41'),
(1642, '127.0.0.1', '2021-03-19', '18:18:42'),
(1643, '127.0.0.1', '2021-03-19', '18:18:44'),
(1644, '127.0.0.1', '2021-03-19', '18:20:14'),
(1645, '127.0.0.1', '2021-03-19', '18:20:16'),
(1646, '127.0.0.1', '2021-03-19', '18:20:33'),
(1647, '127.0.0.1', '2021-03-19', '18:20:34'),
(1648, '127.0.0.1', '2021-03-19', '18:21:07'),
(1649, '127.0.0.1', '2021-03-19', '18:21:09'),
(1650, '127.0.0.1', '2021-03-19', '18:21:26'),
(1651, '127.0.0.1', '2021-03-19', '18:22:26'),
(1652, '127.0.0.1', '2021-03-19', '18:22:28'),
(1653, '127.0.0.1', '2021-03-19', '18:22:31'),
(1654, '127.0.0.1', '2021-03-19', '18:22:32'),
(1655, '127.0.0.1', '2021-03-19', '18:22:42'),
(1656, '127.0.0.1', '2021-03-19', '18:22:50'),
(1657, '127.0.0.1', '2021-03-19', '18:22:53'),
(1658, '127.0.0.1', '2021-03-19', '18:24:06'),
(1659, '127.0.0.1', '2021-03-19', '18:24:11'),
(1660, '127.0.0.1', '2021-03-19', '18:24:25'),
(1661, '127.0.0.1', '2021-03-19', '18:24:27'),
(1662, '127.0.0.1', '2021-03-19', '18:24:28'),
(1663, '127.0.0.1', '2021-03-19', '18:25:07'),
(1664, '127.0.0.1', '2021-03-19', '18:25:33'),
(1665, '127.0.0.1', '2021-03-19', '18:26:09'),
(1666, '127.0.0.1', '2021-03-19', '18:28:56'),
(1667, '127.0.0.1', '2021-03-19', '18:29:00'),
(1668, '127.0.0.1', '2021-03-19', '18:34:39'),
(1669, '127.0.0.1', '2021-03-19', '18:34:46'),
(1670, '127.0.0.1', '2021-03-19', '18:35:01'),
(1671, '127.0.0.1', '2021-03-19', '18:35:01'),
(1672, '127.0.0.1', '2021-03-19', '18:35:01'),
(1673, '127.0.0.1', '2021-03-19', '18:35:01'),
(1674, '127.0.0.1', '2021-03-19', '18:35:03'),
(1675, '127.0.0.1', '2021-03-19', '18:35:03'),
(1676, '127.0.0.1', '2021-03-19', '18:35:03'),
(1677, '127.0.0.1', '2021-03-19', '18:35:03'),
(1678, '127.0.0.1', '2021-03-19', '18:35:10'),
(1679, '127.0.0.1', '2021-03-19', '18:35:13'),
(1680, '127.0.0.1', '2021-03-19', '18:35:13'),
(1681, '127.0.0.1', '2021-03-19', '18:35:13'),
(1682, '127.0.0.1', '2021-03-19', '18:35:13'),
(1683, '127.0.0.1', '2021-03-19', '18:35:15'),
(1684, '127.0.0.1', '2021-03-19', '18:35:55'),
(1685, '127.0.0.1', '2021-03-19', '18:35:58'),
(1686, '127.0.0.1', '2021-03-19', '18:36:01'),
(1687, '127.0.0.1', '2021-03-19', '18:37:28'),
(1688, '127.0.0.1', '2021-03-19', '18:37:33'),
(1689, '127.0.0.1', '2021-03-19', '18:38:24'),
(1690, '127.0.0.1', '2021-03-19', '18:40:12'),
(1691, '127.0.0.1', '2021-03-19', '18:40:17'),
(1692, '127.0.0.1', '2021-03-19', '18:41:50'),
(1693, '127.0.0.1', '2021-03-19', '18:41:50'),
(1694, '127.0.0.1', '2021-03-19', '18:41:50'),
(1695, '127.0.0.1', '2021-03-19', '18:41:50'),
(1696, '127.0.0.1', '2021-03-19', '18:41:52'),
(1697, '127.0.0.1', '2021-03-19', '18:43:57'),
(1698, '127.0.0.1', '2021-03-19', '18:44:38'),
(1699, '127.0.0.1', '2021-03-19', '18:44:44'),
(1700, '127.0.0.1', '2021-03-19', '18:45:21'),
(1701, '127.0.0.1', '2021-03-19', '18:45:30'),
(1702, '127.0.0.1', '2021-03-19', '18:50:25'),
(1703, '127.0.0.1', '2021-03-19', '18:50:55'),
(1704, '127.0.0.1', '2021-03-19', '18:51:06'),
(1705, '127.0.0.1', '2021-03-19', '18:51:12'),
(1706, '127.0.0.1', '2021-03-19', '18:52:19'),
(1707, '127.0.0.1', '2021-03-19', '18:52:28'),
(1708, '127.0.0.1', '2021-03-19', '18:53:54'),
(1709, '127.0.0.1', '2021-03-19', '18:53:58'),
(1710, '127.0.0.1', '2021-03-19', '18:54:06'),
(1711, '127.0.0.1', '2021-03-19', '18:56:42'),
(1712, '127.0.0.1', '2021-03-19', '18:56:48'),
(1713, '127.0.0.1', '2021-03-19', '18:59:44'),
(1714, '127.0.0.1', '2021-03-19', '19:00:47'),
(1715, '127.0.0.1', '2021-03-19', '19:00:50'),
(1716, '127.0.0.1', '2021-03-19', '19:00:55'),
(1717, '127.0.0.1', '2021-03-19', '19:02:37'),
(1718, '127.0.0.1', '2021-03-19', '19:02:41'),
(1719, '127.0.0.1', '2021-03-19', '19:02:41'),
(1720, '127.0.0.1', '2021-03-19', '19:02:41'),
(1721, '127.0.0.1', '2021-03-19', '19:02:41'),
(1722, '127.0.0.1', '2021-03-19', '19:02:44'),
(1723, '127.0.0.1', '2021-03-19', '19:02:50'),
(1724, '127.0.0.1', '2021-03-19', '19:03:58'),
(1725, '127.0.0.1', '2021-03-19', '19:04:12'),
(1726, '127.0.0.1', '2021-03-19', '19:09:17'),
(1727, '127.0.0.1', '2021-03-19', '19:09:22'),
(1728, '127.0.0.1', '2021-03-19', '19:09:26'),
(1729, '127.0.0.1', '2021-03-19', '19:09:29'),
(1730, '127.0.0.1', '2021-03-19', '19:09:33'),
(1731, '127.0.0.1', '2021-03-19', '19:09:36'),
(1732, '127.0.0.1', '2021-03-19', '19:09:41'),
(1733, '127.0.0.1', '2021-03-19', '19:10:44'),
(1734, '127.0.0.1', '2021-03-19', '19:10:47'),
(1735, '127.0.0.1', '2021-03-19', '19:12:55'),
(1736, '127.0.0.1', '2021-03-19', '19:13:03'),
(1737, '127.0.0.1', '2021-03-19', '19:13:08'),
(1738, '127.0.0.1', '2021-03-19', '19:13:10'),
(1739, '127.0.0.1', '2021-03-19', '19:13:16'),
(1740, '127.0.0.1', '2021-03-19', '19:14:34'),
(1741, '127.0.0.1', '2021-03-19', '19:17:40'),
(1742, '127.0.0.1', '2021-03-19', '19:17:43'),
(1743, '127.0.0.1', '2021-03-19', '19:45:00'),
(1744, '127.0.0.1', '2021-03-19', '19:45:15'),
(1745, '127.0.0.1', '2021-03-19', '19:45:19'),
(1746, '127.0.0.1', '2021-03-19', '19:45:25'),
(1747, '127.0.0.1', '2021-03-19', '19:45:29'),
(1748, '127.0.0.1', '2021-03-19', '19:46:06'),
(1749, '127.0.0.1', '2021-03-19', '19:46:16'),
(1750, '127.0.0.1', '2021-03-19', '19:46:32'),
(1751, '127.0.0.1', '2021-03-19', '19:47:42'),
(1752, '127.0.0.1', '2021-03-19', '19:47:48'),
(1753, '127.0.0.1', '2021-03-19', '19:47:52'),
(1754, '127.0.0.1', '2021-03-19', '19:48:04'),
(1755, '127.0.0.1', '2021-03-19', '19:48:06'),
(1756, '127.0.0.1', '2021-03-19', '19:48:56'),
(1757, '127.0.0.1', '2021-03-19', '19:48:59'),
(1758, '127.0.0.1', '2021-03-19', '19:49:01'),
(1759, '127.0.0.1', '2021-03-19', '19:49:22'),
(1760, '127.0.0.1', '2021-03-19', '19:51:23'),
(1761, '127.0.0.1', '2021-03-19', '19:52:16'),
(1762, '127.0.0.1', '2021-03-19', '19:52:50'),
(1763, '127.0.0.1', '2021-03-19', '19:53:24'),
(1764, '127.0.0.1', '2021-03-19', '19:54:14'),
(1765, '127.0.0.1', '2021-03-19', '19:54:21'),
(1766, '127.0.0.1', '2021-03-19', '19:54:49'),
(1767, '127.0.0.1', '2021-03-19', '19:55:48'),
(1768, '127.0.0.1', '2021-03-19', '19:55:50'),
(1769, '127.0.0.1', '2021-03-19', '19:55:56'),
(1770, '127.0.0.1', '2021-03-19', '19:56:26'),
(1771, '127.0.0.1', '2021-03-19', '19:56:27'),
(1772, '127.0.0.1', '2021-03-19', '19:56:29'),
(1773, '127.0.0.1', '2021-03-19', '19:58:09'),
(1774, '127.0.0.1', '2021-03-19', '19:58:11'),
(1775, '127.0.0.1', '2021-03-19', '20:00:11'),
(1776, '127.0.0.1', '2021-03-19', '20:00:11'),
(1777, '127.0.0.1', '2021-03-19', '20:00:11'),
(1778, '127.0.0.1', '2021-03-19', '20:00:11'),
(1779, '127.0.0.1', '2021-03-19', '20:00:54'),
(1780, '127.0.0.1', '2021-03-19', '20:02:02'),
(1781, '127.0.0.1', '2021-03-19', '20:03:06'),
(1782, '127.0.0.1', '2021-03-19', '20:03:51'),
(1783, '127.0.0.1', '2021-03-19', '20:03:55'),
(1784, '127.0.0.1', '2021-03-19', '20:06:55'),
(1785, '127.0.0.1', '2021-03-19', '20:10:43'),
(1786, '127.0.0.1', '2021-03-19', '20:13:53'),
(1787, '127.0.0.1', '2021-03-19', '20:13:59'),
(1788, '127.0.0.1', '2021-03-19', '20:13:59'),
(1789, '127.0.0.1', '2021-03-19', '20:14:02'),
(1790, '127.0.0.1', '2021-03-19', '20:14:10'),
(1791, '127.0.0.1', '2021-03-19', '20:14:10'),
(1792, '127.0.0.1', '2021-03-19', '20:14:12'),
(1793, '127.0.0.1', '2021-03-19', '20:14:17'),
(1794, '127.0.0.1', '2021-03-19', '20:14:17'),
(1795, '127.0.0.1', '2021-03-19', '20:14:22'),
(1796, '127.0.0.1', '2021-03-19', '20:14:34'),
(1797, '127.0.0.1', '2021-03-19', '20:17:48'),
(1798, '127.0.0.1', '2021-03-19', '20:19:24'),
(1799, '127.0.0.1', '2021-03-19', '20:19:46'),
(1800, '127.0.0.1', '2021-03-19', '20:20:04'),
(1801, '127.0.0.1', '2021-03-19', '20:20:24'),
(1802, '127.0.0.1', '2021-03-19', '20:23:21'),
(1803, '127.0.0.1', '2021-03-19', '20:24:29'),
(1804, '127.0.0.1', '2021-03-19', '20:26:06'),
(1805, '127.0.0.1', '2021-03-19', '20:27:15'),
(1806, '127.0.0.1', '2021-03-19', '20:27:17'),
(1807, '127.0.0.1', '2021-03-19', '20:27:19'),
(1808, '127.0.0.1', '2021-03-19', '20:27:19'),
(1809, '127.0.0.1', '2021-03-19', '20:27:19'),
(1810, '127.0.0.1', '2021-03-19', '20:35:35'),
(1811, '127.0.0.1', '2021-03-19', '20:35:41'),
(1812, '127.0.0.1', '2021-03-19', '20:35:52'),
(1813, '127.0.0.1', '2021-03-19', '20:35:56'),
(1814, '127.0.0.1', '2021-03-19', '20:35:57'),
(1815, '127.0.0.1', '2021-03-19', '20:35:59'),
(1816, '127.0.0.1', '2021-03-19', '20:36:00'),
(1817, '127.0.0.1', '2021-03-19', '20:36:24'),
(1818, '127.0.0.1', '2021-03-19', '20:36:34'),
(1819, '127.0.0.1', '2021-03-19', '20:38:55'),
(1820, '127.0.0.1', '2021-03-19', '20:41:12'),
(1821, '127.0.0.1', '2021-03-19', '20:41:16'),
(1822, '127.0.0.1', '2021-03-19', '20:41:43'),
(1823, '127.0.0.1', '2021-03-19', '20:41:46'),
(1824, '127.0.0.1', '2021-03-19', '20:41:47'),
(1825, '127.0.0.1', '2021-03-19', '20:41:56'),
(1826, '127.0.0.1', '2021-03-19', '20:41:57'),
(1827, '127.0.0.1', '2021-03-19', '20:41:58'),
(1828, '127.0.0.1', '2021-03-19', '20:41:59'),
(1829, '127.0.0.1', '2021-03-19', '20:42:04'),
(1830, '127.0.0.1', '2021-03-19', '20:42:08'),
(1831, '127.0.0.1', '2021-03-19', '21:35:05'),
(1832, '127.0.0.1', '2021-03-19', '21:35:38'),
(1833, '127.0.0.1', '2021-03-19', '21:35:38'),
(1834, '127.0.0.1', '2021-03-19', '21:35:42'),
(1835, '127.0.0.1', '2021-03-19', '21:35:45'),
(1836, '127.0.0.1', '2021-03-19', '21:35:46'),
(1837, '127.0.0.1', '2021-03-19', '21:35:48'),
(1838, '127.0.0.1', '2021-03-19', '21:35:48'),
(1839, '127.0.0.1', '2021-03-19', '21:35:55'),
(1840, '127.0.0.1', '2021-03-19', '21:36:04'),
(1841, '127.0.0.1', '2021-03-19', '21:36:04'),
(1842, '127.0.0.1', '2021-03-19', '21:36:12'),
(1843, '127.0.0.1', '2021-03-19', '21:36:12'),
(1844, '127.0.0.1', '2021-03-19', '21:36:14'),
(1845, '127.0.0.1', '2021-03-19', '21:36:17'),
(1846, '127.0.0.1', '2021-03-19', '21:36:18'),
(1847, '127.0.0.1', '2021-03-19', '21:36:49'),
(1848, '127.0.0.1', '2021-03-19', '21:37:05'),
(1849, '127.0.0.1', '2021-03-19', '21:37:17'),
(1850, '127.0.0.1', '2021-03-19', '21:37:30'),
(1851, '127.0.0.1', '2021-03-19', '21:37:49'),
(1852, '127.0.0.1', '2021-03-19', '21:38:48'),
(1853, '127.0.0.1', '2021-03-19', '21:42:24'),
(1854, '127.0.0.1', '2021-03-19', '21:43:10'),
(1855, '127.0.0.1', '2021-03-19', '21:44:23'),
(1856, '127.0.0.1', '2021-03-19', '21:44:28'),
(1857, '127.0.0.1', '2021-03-19', '21:44:31'),
(1858, '127.0.0.1', '2021-03-19', '21:44:35'),
(1859, '127.0.0.1', '2021-03-19', '21:44:36'),
(1860, '127.0.0.1', '2021-03-19', '21:45:50'),
(1861, '127.0.0.1', '2021-03-19', '21:48:22'),
(1862, '127.0.0.1', '2021-03-19', '21:48:31'),
(1863, '127.0.0.1', '2021-03-19', '21:48:37'),
(1864, '127.0.0.1', '2021-03-19', '21:48:47'),
(1865, '127.0.0.1', '2021-03-19', '21:48:54'),
(1866, '127.0.0.1', '2021-03-19', '21:49:04'),
(1867, '127.0.0.1', '2021-03-19', '21:49:29'),
(1868, '127.0.0.1', '2021-03-19', '21:49:40'),
(1869, '127.0.0.1', '2021-03-19', '21:49:40'),
(1870, '127.0.0.1', '2021-03-19', '21:49:53'),
(1871, '127.0.0.1', '2021-03-19', '21:49:55'),
(1872, '127.0.0.1', '2021-03-19', '21:50:06'),
(1873, '127.0.0.1', '2021-03-19', '21:50:31'),
(1874, '127.0.0.1', '2021-03-19', '21:51:10'),
(1875, '127.0.0.1', '2021-03-19', '21:51:56'),
(1876, '127.0.0.1', '2021-03-19', '21:55:27'),
(1877, '127.0.0.1', '2021-03-19', '21:57:09'),
(1878, '127.0.0.1', '2021-03-19', '21:57:15'),
(1879, '127.0.0.1', '2021-03-19', '21:57:43'),
(1880, '127.0.0.1', '2021-03-19', '21:58:12'),
(1881, '127.0.0.1', '2021-03-19', '21:58:17'),
(1882, '127.0.0.1', '2021-03-19', '21:59:42'),
(1883, '127.0.0.1', '2021-03-19', '21:59:48'),
(1884, '127.0.0.1', '2021-03-19', '22:00:31'),
(1885, '127.0.0.1', '2021-03-19', '22:02:56'),
(1886, '127.0.0.1', '2021-03-19', '22:03:15'),
(1887, '127.0.0.1', '2021-03-19', '22:03:15'),
(1888, '127.0.0.1', '2021-03-19', '22:03:15'),
(1889, '127.0.0.1', '2021-03-19', '22:03:16'),
(1890, '127.0.0.1', '2021-03-19', '22:03:17'),
(1891, '127.0.0.1', '2021-03-19', '22:03:17'),
(1892, '127.0.0.1', '2021-03-19', '22:03:18'),
(1893, '127.0.0.1', '2021-03-19', '22:03:22'),
(1894, '127.0.0.1', '2021-03-19', '22:03:26'),
(1895, '127.0.0.1', '2021-03-19', '22:03:27'),
(1896, '127.0.0.1', '2021-03-19', '22:03:28'),
(1897, '127.0.0.1', '2021-03-19', '22:03:29'),
(1898, '127.0.0.1', '2021-03-19', '22:03:29'),
(1899, '127.0.0.1', '2021-03-19', '22:03:30'),
(1900, '127.0.0.1', '2021-03-19', '22:03:30'),
(1901, '127.0.0.1', '2021-03-19', '22:03:31'),
(1902, '127.0.0.1', '2021-03-19', '22:03:32'),
(1903, '127.0.0.1', '2021-03-19', '22:03:41'),
(1904, '127.0.0.1', '2021-03-19', '22:03:41'),
(1905, '127.0.0.1', '2021-03-19', '22:03:41'),
(1906, '127.0.0.1', '2021-03-19', '22:03:42'),
(1907, '127.0.0.1', '2021-03-19', '22:03:42'),
(1908, '127.0.0.1', '2021-03-19', '22:06:17'),
(1909, '127.0.0.1', '2021-03-19', '22:07:32'),
(1910, '127.0.0.1', '2021-03-19', '22:08:48'),
(1911, '127.0.0.1', '2021-03-19', '22:09:13'),
(1912, '127.0.0.1', '2021-03-19', '22:11:19'),
(1913, '127.0.0.1', '2021-03-19', '22:11:22'),
(1914, '127.0.0.1', '2021-03-19', '22:11:36'),
(1915, '127.0.0.1', '2021-03-19', '22:11:53'),
(1916, '127.0.0.1', '2021-03-19', '22:12:34'),
(1917, '127.0.0.1', '2021-03-19', '22:13:45'),
(1918, '127.0.0.1', '2021-03-19', '22:14:30'),
(1919, '127.0.0.1', '2021-03-19', '22:14:53'),
(1920, '127.0.0.1', '2021-03-19', '22:15:02'),
(1921, '127.0.0.1', '2021-03-19', '22:15:06'),
(1922, '127.0.0.1', '2021-03-19', '22:15:08'),
(1923, '127.0.0.1', '2021-03-19', '22:15:31'),
(1924, '127.0.0.1', '2021-03-19', '22:16:03'),
(1925, '127.0.0.1', '2021-03-20', '16:01:42'),
(1926, '127.0.0.1', '2021-03-20', '16:01:45'),
(1927, '127.0.0.1', '2021-03-20', '16:01:48'),
(1928, '127.0.0.1', '2021-03-20', '16:01:50'),
(1929, '127.0.0.1', '2021-03-20', '16:01:56'),
(1930, '127.0.0.1', '2021-03-20', '16:02:17'),
(1931, '127.0.0.1', '2021-03-20', '16:02:19'),
(1932, '127.0.0.1', '2021-03-20', '16:02:44'),
(1933, '127.0.0.1', '2021-03-20', '16:02:47'),
(1934, '127.0.0.1', '2021-03-20', '16:07:10'),
(1935, '127.0.0.1', '2021-03-20', '16:07:10'),
(1936, '127.0.0.1', '2021-03-20', '16:07:13'),
(1937, '127.0.0.1', '2021-03-20', '16:07:22'),
(1938, '127.0.0.1', '2021-03-20', '16:07:22'),
(1939, '127.0.0.1', '2021-03-20', '16:07:40'),
(1940, '127.0.0.1', '2021-03-20', '16:07:44'),
(1941, '127.0.0.1', '2021-03-20', '16:07:45'),
(1942, '127.0.0.1', '2021-03-20', '16:07:59'),
(1943, '127.0.0.1', '2021-03-20', '16:08:02'),
(1944, '127.0.0.1', '2021-03-20', '16:08:04'),
(1945, '127.0.0.1', '2021-03-20', '16:08:13'),
(1946, '127.0.0.1', '2021-03-20', '16:08:17'),
(1947, '127.0.0.1', '2021-03-20', '16:08:19'),
(1948, '127.0.0.1', '2021-03-20', '16:08:29'),
(1949, '127.0.0.1', '2021-03-20', '16:08:32'),
(1950, '127.0.0.1', '2021-03-20', '16:08:34'),
(1951, '127.0.0.1', '2021-03-20', '18:04:46'),
(1952, '127.0.0.1', '2021-03-20', '18:17:12'),
(1953, '127.0.0.1', '2021-03-20', '18:18:07'),
(1954, '127.0.0.1', '2021-03-20', '18:18:38'),
(1955, '127.0.0.1', '2021-03-20', '18:19:04'),
(1956, '127.0.0.1', '2021-03-20', '19:26:20'),
(1957, '127.0.0.1', '2021-03-20', '19:26:35'),
(1958, '127.0.0.1', '2021-03-20', '19:40:51'),
(1959, '127.0.0.1', '2021-03-20', '19:40:54'),
(1960, '127.0.0.1', '2021-03-20', '19:41:03'),
(1961, '127.0.0.1', '2021-03-20', '19:45:04'),
(1962, '127.0.0.1', '2021-03-20', '19:46:01'),
(1963, '127.0.0.1', '2021-03-20', '19:46:05'),
(1964, '127.0.0.1', '2021-03-20', '19:46:05'),
(1965, '127.0.0.1', '2021-03-20', '19:46:07'),
(1966, '127.0.0.1', '2021-03-20', '19:46:07'),
(1967, '127.0.0.1', '2021-03-20', '19:46:13'),
(1968, '127.0.0.1', '2021-03-20', '19:46:13'),
(1969, '127.0.0.1', '2021-03-20', '19:46:23'),
(1970, '127.0.0.1', '2021-03-20', '19:46:28'),
(1971, '127.0.0.1', '2021-03-20', '19:46:28'),
(1972, '127.0.0.1', '2021-03-20', '19:46:34'),
(1973, '127.0.0.1', '2021-03-20', '19:46:34'),
(1974, '127.0.0.1', '2021-03-20', '19:46:38'),
(1975, '127.0.0.1', '2021-03-20', '19:46:41'),
(1976, '127.0.0.1', '2021-03-20', '19:46:44'),
(1977, '127.0.0.1', '2021-03-20', '19:46:44'),
(1978, '127.0.0.1', '2021-03-20', '19:46:47'),
(1979, '127.0.0.1', '2021-03-20', '19:46:47'),
(1980, '127.0.0.1', '2021-03-20', '20:55:14'),
(1981, '127.0.0.1', '2021-03-20', '20:55:20'),
(1982, '127.0.0.1', '2021-03-20', '20:55:23'),
(1983, '127.0.0.1', '2021-03-20', '20:55:23'),
(1984, '127.0.0.1', '2021-03-20', '20:55:34'),
(1985, '127.0.0.1', '2021-03-20', '20:55:34'),
(1986, '127.0.0.1', '2021-03-20', '20:55:36'),
(1987, '127.0.0.1', '2021-03-20', '20:55:36'),
(1988, '127.0.0.1', '2021-03-20', '20:55:45'),
(1989, '127.0.0.1', '2021-03-20', '20:55:47'),
(1990, '127.0.0.1', '2021-03-20', '20:55:47'),
(1991, '127.0.0.1', '2021-03-20', '20:57:07'),
(1992, '127.0.0.1', '2021-03-20', '20:57:12'),
(1993, '127.0.0.1', '2021-03-20', '20:57:23'),
(1994, '127.0.0.1', '2021-03-20', '20:57:25'),
(1995, '127.0.0.1', '2021-03-20', '20:57:27'),
(1996, '127.0.0.1', '2021-03-20', '20:57:35'),
(1997, '127.0.0.1', '2021-03-20', '20:57:40'),
(1998, '127.0.0.1', '2021-03-20', '20:57:42'),
(1999, '127.0.0.1', '2021-03-20', '20:57:46'),
(2000, '127.0.0.1', '2021-03-20', '21:04:58'),
(2001, '127.0.0.1', '2021-03-20', '21:05:05'),
(2002, '127.0.0.1', '2021-03-20', '21:05:08'),
(2003, '127.0.0.1', '2021-03-20', '21:05:10'),
(2004, '127.0.0.1', '2021-03-20', '21:05:10'),
(2005, '127.0.0.1', '2021-03-20', '21:05:11'),
(2006, '127.0.0.1', '2021-03-20', '21:05:14'),
(2007, '127.0.0.1', '2021-03-20', '21:05:14'),
(2008, '127.0.0.1', '2021-03-20', '21:05:24'),
(2009, '127.0.0.1', '2021-03-20', '21:05:28'),
(2010, '127.0.0.1', '2021-03-20', '21:05:33'),
(2011, '127.0.0.1', '2021-03-20', '21:05:37'),
(2012, '127.0.0.1', '2021-03-20', '21:05:40'),
(2013, '127.0.0.1', '2021-03-20', '21:05:41'),
(2014, '127.0.0.1', '2021-03-20', '21:05:41'),
(2015, '127.0.0.1', '2021-03-20', '21:05:42'),
(2016, '127.0.0.1', '2021-03-20', '21:05:42'),
(2017, '127.0.0.1', '2021-03-20', '21:05:43'),
(2018, '127.0.0.1', '2021-03-20', '21:05:43'),
(2019, '127.0.0.1', '2021-03-20', '21:05:45'),
(2020, '127.0.0.1', '2021-03-20', '21:05:46'),
(2021, '127.0.0.1', '2021-03-20', '21:05:46'),
(2022, '127.0.0.1', '2021-03-20', '21:35:01'),
(2023, '127.0.0.1', '2021-03-20', '21:35:03'),
(2024, '127.0.0.1', '2021-03-20', '21:35:06'),
(2025, '127.0.0.1', '2021-03-20', '21:35:06'),
(2026, '127.0.0.1', '2021-03-20', '21:35:07'),
(2027, '127.0.0.1', '2021-03-20', '21:35:07'),
(2028, '127.0.0.1', '2021-03-20', '21:35:41'),
(2029, '127.0.0.1', '2021-03-20', '21:35:54'),
(2030, '127.0.0.1', '2021-03-20', '21:35:55'),
(2031, '127.0.0.1', '2021-03-20', '21:36:12'),
(2032, '127.0.0.1', '2021-03-20', '21:36:13'),
(2033, '127.0.0.1', '2021-03-20', '21:36:15'),
(2034, '127.0.0.1', '2021-03-20', '21:36:16'),
(2035, '127.0.0.1', '2021-03-20', '21:38:27'),
(2036, '127.0.0.1', '2021-03-20', '21:38:55'),
(2037, '127.0.0.1', '2021-03-20', '21:39:07'),
(2038, '127.0.0.1', '2021-03-20', '21:39:37'),
(2039, '127.0.0.1', '2021-03-20', '21:46:15'),
(2040, '127.0.0.1', '2021-03-20', '21:46:18'),
(2041, '127.0.0.1', '2021-03-20', '21:46:20'),
(2042, '127.0.0.1', '2021-03-20', '22:16:21'),
(2043, '127.0.0.1', '2021-03-20', '22:16:28'),
(2044, '127.0.0.1', '2021-03-20', '22:16:30'),
(2045, '127.0.0.1', '2021-03-20', '22:16:43'),
(2046, '127.0.0.1', '2021-03-20', '22:32:08'),
(2047, '127.0.0.1', '2021-03-20', '22:32:12'),
(2048, '127.0.0.1', '2021-03-20', '22:32:12'),
(2049, '127.0.0.1', '2021-03-20', '22:32:24'),
(2050, '127.0.0.1', '2021-03-20', '22:32:28'),
(2051, '127.0.0.1', '2021-03-20', '22:32:29'),
(2052, '127.0.0.1', '2021-03-20', '22:32:37'),
(2053, '127.0.0.1', '2021-03-20', '22:36:58'),
(2054, '127.0.0.1', '2021-03-20', '22:36:58'),
(2055, '127.0.0.1', '2021-03-21', '07:27:36'),
(2056, '127.0.0.1', '2021-03-21', '07:28:26'),
(2057, '127.0.0.1', '2021-03-21', '07:28:33'),
(2058, '127.0.0.1', '2021-03-21', '07:28:43'),
(2059, '127.0.0.1', '2021-03-21', '07:28:48'),
(2060, '127.0.0.1', '2021-03-21', '11:07:57'),
(2061, '127.0.0.1', '2021-03-21', '11:08:04'),
(2062, '127.0.0.1', '2021-03-21', '11:08:07'),
(2063, '::1', '2021-03-21', '12:34:24'),
(2064, '127.0.0.1', '2021-03-21', '12:34:24'),
(2065, '127.0.0.1', '2021-03-21', '12:35:27'),
(2066, '127.0.0.1', '2021-03-21', '12:35:33'),
(2067, '127.0.0.1', '2021-03-21', '12:35:38'),
(2068, '127.0.0.1', '2021-03-21', '12:35:45'),
(2069, '127.0.0.1', '2021-03-21', '12:35:45'),
(2070, '127.0.0.1', '2021-03-21', '16:59:39'),
(2071, '127.0.0.1', '2021-03-21', '16:59:44'),
(2072, '127.0.0.1', '2021-03-21', '16:59:48'),
(2073, '127.0.0.1', '2021-03-21', '16:59:52'),
(2074, '127.0.0.1', '2021-03-21', '16:59:57'),
(2075, '127.0.0.1', '2021-03-21', '16:59:58'),
(2076, '127.0.0.1', '2021-03-21', '16:59:59'),
(2077, '127.0.0.1', '2021-03-21', '17:00:05'),
(2078, '127.0.0.1', '2021-03-21', '17:00:05'),
(2079, '127.0.0.1', '2021-03-21', '17:00:09'),
(2080, '127.0.0.1', '2021-03-21', '17:00:10'),
(2081, '127.0.0.1', '2021-03-21', '17:00:12'),
(2082, '127.0.0.1', '2021-03-21', '17:00:12'),
(2083, '127.0.0.1', '2021-03-21', '17:00:24'),
(2084, '127.0.0.1', '2021-03-21', '17:00:24'),
(2085, '127.0.0.1', '2021-03-21', '17:00:31'),
(2086, '127.0.0.1', '2021-03-21', '17:00:35'),
(2087, '127.0.0.1', '2021-03-21', '17:00:54'),
(2088, '127.0.0.1', '2021-03-21', '17:00:59'),
(2089, '127.0.0.1', '2021-03-21', '17:01:01'),
(2090, '127.0.0.1', '2021-03-21', '17:01:02'),
(2091, '127.0.0.1', '2021-03-21', '17:01:04'),
(2092, '127.0.0.1', '2021-03-21', '17:01:04'),
(2093, '127.0.0.1', '2021-03-21', '17:01:11'),
(2094, '127.0.0.1', '2021-03-21', '17:01:15'),
(2095, '127.0.0.1', '2021-03-21', '17:01:16'),
(2096, '127.0.0.1', '2021-03-21', '17:01:17'),
(2097, '127.0.0.1', '2021-03-21', '17:01:17'),
(2098, '127.0.0.1', '2021-03-21', '17:01:25'),
(2099, '127.0.0.1', '2021-03-21', '17:01:25'),
(2100, '127.0.0.1', '2021-03-21', '17:02:57'),
(2101, '127.0.0.1', '2021-03-21', '17:02:59'),
(2102, '127.0.0.1', '2021-03-21', '17:19:20'),
(2103, '127.0.0.1', '2021-03-21', '17:19:45'),
(2104, '127.0.0.1', '2021-03-21', '17:25:24'),
(2105, '127.0.0.1', '2021-03-21', '17:40:23'),
(2106, '127.0.0.1', '2021-03-21', '17:44:08'),
(2107, '127.0.0.1', '2021-03-21', '17:47:25'),
(2108, '127.0.0.1', '2021-03-21', '17:55:15'),
(2109, '127.0.0.1', '2021-03-21', '18:35:21'),
(2110, '127.0.0.1', '2021-03-21', '18:36:23'),
(2111, '127.0.0.1', '2021-03-21', '18:42:41'),
(2112, '127.0.0.1', '2021-03-21', '18:43:08'),
(2113, '127.0.0.1', '2021-03-21', '18:43:32'),
(2114, '127.0.0.1', '2021-03-21', '18:44:55'),
(2115, '127.0.0.1', '2021-03-21', '18:45:39'),
(2116, '127.0.0.1', '2021-03-21', '18:46:34'),
(2117, '127.0.0.1', '2021-03-21', '19:34:25'),
(2118, '127.0.0.1', '2021-03-21', '19:34:51'),
(2119, '127.0.0.1', '2021-03-21', '19:34:55'),
(2120, '127.0.0.1', '2021-03-21', '19:35:31'),
(2121, '127.0.0.1', '2021-03-21', '19:36:30'),
(2122, '127.0.0.1', '2021-03-21', '19:36:41'),
(2123, '127.0.0.1', '2021-03-21', '19:36:47'),
(2124, '127.0.0.1', '2021-03-21', '19:36:56'),
(2125, '127.0.0.1', '2021-03-21', '19:37:11'),
(2126, '127.0.0.1', '2021-03-21', '19:37:12'),
(2127, '127.0.0.1', '2021-03-21', '19:37:13'),
(2128, '127.0.0.1', '2021-03-21', '19:37:14'),
(2129, '127.0.0.1', '2021-03-21', '19:37:19'),
(2130, '127.0.0.1', '2021-03-21', '19:37:22'),
(2131, '127.0.0.1', '2021-03-21', '19:37:24'),
(2132, '127.0.0.1', '2021-03-21', '19:37:25'),
(2133, '127.0.0.1', '2021-03-21', '19:37:27'),
(2134, '127.0.0.1', '2021-03-21', '19:37:27'),
(2135, '127.0.0.1', '2021-03-21', '19:43:03'),
(2136, '127.0.0.1', '2021-03-21', '19:43:07'),
(2137, '127.0.0.1', '2021-03-21', '19:43:10'),
(2138, '127.0.0.1', '2021-03-21', '19:43:12'),
(2139, '127.0.0.1', '2021-03-21', '19:43:12'),
(2140, '127.0.0.1', '2021-03-21', '19:43:13'),
(2141, '127.0.0.1', '2021-03-21', '19:43:15'),
(2142, '127.0.0.1', '2021-03-21', '19:43:15'),
(2143, '127.0.0.1', '2021-03-21', '19:43:58'),
(2144, '127.0.0.1', '2021-03-21', '19:44:27'),
(2145, '127.0.0.1', '2021-03-21', '21:10:16'),
(2146, '127.0.0.1', '2021-03-21', '21:10:16'),
(2147, '127.0.0.1', '2021-03-21', '21:10:19'),
(2148, '127.0.0.1', '2021-03-21', '21:10:26'),
(2149, '127.0.0.1', '2021-03-21', '21:10:34'),
(2150, '127.0.0.1', '2021-03-21', '21:14:07'),
(2151, '127.0.0.1', '2021-03-21', '21:14:23'),
(2152, '127.0.0.1', '2021-03-21', '21:15:04'),
(2153, '127.0.0.1', '2021-03-21', '21:18:01'),
(2154, '127.0.0.1', '2021-03-21', '21:27:17'),
(2155, '127.0.0.1', '2021-03-21', '21:33:42'),
(2156, '127.0.0.1', '2021-03-21', '21:36:37'),
(2157, '127.0.0.1', '2021-03-21', '21:37:05'),
(2158, '127.0.0.1', '2021-03-21', '21:37:51'),
(2159, '127.0.0.1', '2021-03-21', '21:38:21'),
(2160, '127.0.0.1', '2021-03-21', '21:38:56'),
(2161, '127.0.0.1', '2021-03-21', '22:15:05'),
(2162, '127.0.0.1', '2021-03-21', '22:16:40'),
(2163, '127.0.0.1', '2021-03-21', '22:16:44'),
(2164, '127.0.0.1', '2021-03-21', '22:16:49'),
(2165, '127.0.0.1', '2021-03-21', '22:16:54'),
(2166, '127.0.0.1', '2021-03-21', '22:17:01'),
(2167, '127.0.0.1', '2021-03-21', '22:17:06'),
(2168, '127.0.0.1', '2021-03-21', '22:17:09'),
(2169, '127.0.0.1', '2021-03-21', '22:19:40'),
(2170, '127.0.0.1', '2021-03-21', '22:19:54'),
(2171, '127.0.0.1', '2021-03-21', '22:20:18'),
(2172, '127.0.0.1', '2021-03-21', '22:21:10'),
(2173, '127.0.0.1', '2021-03-21', '22:21:28'),
(2174, '127.0.0.1', '2021-03-21', '22:21:39'),
(2175, '127.0.0.1', '2021-03-21', '22:22:31'),
(2176, '127.0.0.1', '2021-03-21', '22:22:39'),
(2177, '127.0.0.1', '2021-03-21', '22:22:42'),
(2178, '127.0.0.1', '2021-03-21', '22:22:46'),
(2179, '127.0.0.1', '2021-03-21', '22:22:53'),
(2180, '127.0.0.1', '2021-03-21', '22:23:05'),
(2181, '127.0.0.1', '2021-03-21', '22:23:15'),
(2182, '127.0.0.1', '2021-03-21', '22:23:30'),
(2183, '127.0.0.1', '2021-03-21', '22:23:30'),
(2184, '127.0.0.1', '2021-03-21', '22:23:35'),
(2185, '127.0.0.1', '2021-03-21', '22:23:39'),
(2186, '127.0.0.1', '2021-03-21', '22:23:39'),
(2187, '127.0.0.1', '2021-03-21', '22:23:42'),
(2188, '127.0.0.1', '2021-03-21', '22:23:47'),
(2189, '127.0.0.1', '2021-03-21', '22:23:47'),
(2190, '127.0.0.1', '2021-03-21', '22:23:50'),
(2191, '127.0.0.1', '2021-03-21', '22:23:54'),
(2192, '127.0.0.1', '2021-03-21', '22:30:44'),
(2193, '127.0.0.1', '2021-03-21', '22:30:47'),
(2194, '127.0.0.1', '2021-03-21', '22:30:47'),
(2195, '127.0.0.1', '2021-03-21', '22:32:57'),
(2196, '127.0.0.1', '2021-03-21', '22:32:59'),
(2197, '127.0.0.1', '2021-03-21', '22:32:59'),
(2198, '127.0.0.1', '2021-03-21', '22:33:04'),
(2199, '127.0.0.1', '2021-03-21', '22:33:09'),
(2200, '127.0.0.1', '2021-03-21', '22:33:10'),
(2201, '127.0.0.1', '2021-03-21', '22:33:37'),
(2202, '127.0.0.1', '2021-03-21', '22:33:39'),
(2203, '127.0.0.1', '2021-03-21', '22:33:40'),
(2204, '127.0.0.1', '2021-03-21', '22:33:42'),
(2205, '127.0.0.1', '2021-03-21', '22:33:42'),
(2206, '127.0.0.1', '2021-03-21', '22:34:25'),
(2207, '127.0.0.1', '2021-03-21', '22:34:26'),
(2208, '127.0.0.1', '2021-03-21', '22:37:15'),
(2209, '127.0.0.1', '2021-03-21', '22:37:19'),
(2210, '127.0.0.1', '2021-03-21', '22:40:30'),
(2211, '127.0.0.1', '2021-03-21', '22:40:34'),
(2212, '127.0.0.1', '2021-03-21', '22:40:39'),
(2213, '127.0.0.1', '2021-03-21', '22:40:55'),
(2214, '127.0.0.1', '2021-03-21', '22:41:13'),
(2215, '127.0.0.1', '2021-03-21', '22:41:16'),
(2216, '127.0.0.1', '2021-03-21', '22:41:20'),
(2217, '127.0.0.1', '2021-03-21', '22:42:25'),
(2218, '127.0.0.1', '2021-03-21', '22:43:50'),
(2219, '127.0.0.1', '2021-03-21', '22:43:54'),
(2220, '127.0.0.1', '2021-03-21', '22:44:12'),
(2221, '127.0.0.1', '2021-03-21', '22:44:15'),
(2222, '127.0.0.1', '2021-03-21', '22:44:27'),
(2223, '127.0.0.1', '2021-03-21', '22:44:38'),
(2224, '127.0.0.1', '2021-03-21', '22:45:34'),
(2225, '127.0.0.1', '2021-03-21', '22:45:34'),
(2226, '127.0.0.1', '2021-03-21', '22:54:03'),
(2227, '127.0.0.1', '2021-03-21', '22:54:37'),
(2228, '127.0.0.1', '2021-03-21', '22:55:09'),
(2229, '127.0.0.1', '2021-03-21', '22:55:24'),
(2230, '127.0.0.1', '2021-03-21', '22:55:49'),
(2231, '127.0.0.1', '2021-03-21', '22:57:09'),
(2232, '127.0.0.1', '2021-03-21', '23:00:06'),
(2233, '127.0.0.1', '2021-03-21', '23:00:15'),
(2234, '127.0.0.1', '2021-03-21', '23:03:24'),
(2235, '127.0.0.1', '2021-03-21', '23:05:36'),
(2236, '127.0.0.1', '2021-03-21', '23:05:40'),
(2237, '127.0.0.1', '2021-03-21', '23:06:23'),
(2238, '127.0.0.1', '2021-03-21', '23:06:35'),
(2239, '127.0.0.1', '2021-03-21', '23:09:56'),
(2240, '127.0.0.1', '2021-03-21', '23:10:25'),
(2241, '127.0.0.1', '2021-03-21', '23:14:13'),
(2242, '127.0.0.1', '2021-03-21', '23:14:21'),
(2243, '127.0.0.1', '2021-03-21', '23:14:25');
INSERT INTO `visitors` (`id`, `ip`, `date`, `time`) VALUES
(2244, '127.0.0.1', '2021-03-21', '23:14:25'),
(2245, '127.0.0.1', '2021-03-21', '23:14:27'),
(2246, '127.0.0.1', '2021-03-21', '23:14:43'),
(2247, '127.0.0.1', '2021-03-21', '23:14:51'),
(2248, '127.0.0.1', '2021-03-21', '23:14:58'),
(2249, '127.0.0.1', '2021-03-21', '23:15:10'),
(2250, '127.0.0.1', '2021-03-21', '23:15:30'),
(2251, '127.0.0.1', '2021-03-21', '23:15:30'),
(2252, '127.0.0.1', '2021-03-21', '23:16:13'),
(2253, '127.0.0.1', '2021-03-21', '23:16:16'),
(2254, '127.0.0.1', '2021-03-21', '23:16:29'),
(2255, '127.0.0.1', '2021-03-21', '23:16:33'),
(2256, '127.0.0.1', '2021-03-21', '23:18:32'),
(2257, '127.0.0.1', '2021-03-21', '23:20:44'),
(2258, '127.0.0.1', '2021-03-21', '23:20:53'),
(2259, '127.0.0.1', '2021-03-21', '23:20:57'),
(2260, '127.0.0.1', '2021-03-21', '23:21:00'),
(2261, '127.0.0.1', '2021-03-21', '23:21:03'),
(2262, '127.0.0.1', '2021-03-21', '23:21:11'),
(2263, '127.0.0.1', '2021-03-21', '23:21:15'),
(2264, '127.0.0.1', '2021-03-21', '23:21:18'),
(2265, '127.0.0.1', '2021-03-21', '23:21:21'),
(2266, '127.0.0.1', '2021-03-21', '23:21:24'),
(2267, '127.0.0.1', '2021-03-21', '23:21:29'),
(2268, '127.0.0.1', '2021-03-21', '23:21:39'),
(2269, '127.0.0.1', '2021-03-21', '23:21:49'),
(2270, '127.0.0.1', '2021-03-21', '23:21:50'),
(2271, '127.0.0.1', '2021-03-21', '23:21:52'),
(2272, '127.0.0.1', '2021-03-21', '23:21:58'),
(2273, '127.0.0.1', '2021-03-21', '23:21:58'),
(2274, '127.0.0.1', '2021-03-21', '23:22:02'),
(2275, '127.0.0.1', '2021-03-21', '23:22:05'),
(2276, '127.0.0.1', '2021-03-21', '23:22:08'),
(2277, '127.0.0.1', '2021-03-21', '23:22:09'),
(2278, '127.0.0.1', '2021-03-21', '23:22:11'),
(2279, '127.0.0.1', '2021-03-21', '23:22:11'),
(2280, '127.0.0.1', '2021-03-21', '23:22:17'),
(2281, '127.0.0.1', '2021-03-21', '23:22:17'),
(2282, '127.0.0.1', '2021-03-21', '23:22:27'),
(2283, '127.0.0.1', '2021-03-21', '23:22:40'),
(2284, '127.0.0.1', '2021-03-21', '23:22:50'),
(2285, '127.0.0.1', '2021-03-21', '23:22:50'),
(2286, '127.0.0.1', '2021-03-21', '23:29:10'),
(2287, '127.0.0.1', '2021-03-21', '23:29:12'),
(2288, '127.0.0.1', '2021-03-21', '23:29:18'),
(2289, '127.0.0.1', '2021-03-21', '23:29:46'),
(2290, '127.0.0.1', '2021-03-21', '23:29:47'),
(2291, '127.0.0.1', '2021-03-21', '23:29:52'),
(2292, '127.0.0.1', '2021-03-21', '23:29:52'),
(2293, '127.0.0.1', '2021-03-21', '23:32:26'),
(2294, '127.0.0.1', '2021-03-21', '23:32:30'),
(2295, '127.0.0.1', '2021-03-21', '23:32:31'),
(2296, '127.0.0.1', '2021-03-21', '23:54:19'),
(2297, '127.0.0.1', '2021-03-21', '23:54:19'),
(2298, '127.0.0.1', '2021-03-21', '23:54:22'),
(2299, '127.0.0.1', '2021-03-21', '23:54:34'),
(2300, '127.0.0.1', '2021-03-22', '00:01:43'),
(2301, '127.0.0.1', '2021-03-22', '00:03:43'),
(2302, '127.0.0.1', '2021-03-22', '00:04:20'),
(2303, '127.0.0.1', '2021-03-22', '00:04:20'),
(2304, '127.0.0.1', '2021-03-22', '00:04:24'),
(2305, '127.0.0.1', '2021-03-22', '00:05:20'),
(2306, '127.0.0.1', '2021-03-22', '00:05:25'),
(2307, '127.0.0.1', '2021-03-22', '00:06:22'),
(2308, '127.0.0.1', '2021-03-22', '00:08:39'),
(2309, '127.0.0.1', '2021-03-22', '00:09:44'),
(2310, '127.0.0.1', '2021-03-22', '00:14:18'),
(2311, '127.0.0.1', '2021-03-22', '00:15:06'),
(2312, '127.0.0.1', '2021-03-22', '00:16:00'),
(2313, '127.0.0.1', '2021-03-22', '00:16:20'),
(2314, '127.0.0.1', '2021-03-22', '00:17:09'),
(2315, '127.0.0.1', '2021-03-22', '00:17:12'),
(2316, '127.0.0.1', '2021-03-22', '00:17:48'),
(2317, '127.0.0.1', '2021-03-22', '00:17:48'),
(2318, '127.0.0.1', '2021-03-22', '00:17:52'),
(2319, '127.0.0.1', '2021-03-22', '00:19:30'),
(2320, '127.0.0.1', '2021-03-22', '00:19:32'),
(2321, '127.0.0.1', '2021-03-22', '00:20:18'),
(2322, '127.0.0.1', '2021-03-22', '00:20:22'),
(2323, '127.0.0.1', '2021-03-22', '00:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `product_id` varchar(20) NOT NULL,
  `user_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`product_id`, `user_id`) VALUES
('PRD002', 26),
('PRD003', 26),
('PRD004', 26),
('PRD004', 40),
('PRD005', 26),
('PRD010', 26);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`product_id`,`item_id`),
  ADD UNIQUE KEY `item_id` (`item_id`),
  ADD KEY `cart_item_ibfk_1` (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`address_id`,`user_id`,`cart_id`,`order_id`),
  ADD KEY `checkout_ibfk_1` (`cart_id`),
  ADD KEY `checkout_ibfk_2` (`user_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`order_id`,`delivery_id`),
  ADD UNIQUE KEY `delivery_id` (`delivery_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD PRIMARY KEY (`user_id`,`address_id`),
  ADD UNIQUE KEY `address_id` (`address_id`);

--
-- Indexes for table `delivery_charges`
--
ALTER TABLE `delivery_charges`
  ADD PRIMARY KEY (`city`);

--
-- Indexes for table `delivery_staff`
--
ALTER TABLE `delivery_staff`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `manage_orders`
--
ALTER TABLE `manage_orders`
  ADD PRIMARY KEY (`user_id`,`order_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `manage_product`
--
ALTER TABLE `manage_product`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `order_item_ibfk_2` (`order_id`);

--
-- Indexes for table `order_tracking`
--
ALTER TABLE `order_tracking`
  ADD PRIMARY KEY (`tracking_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`reset_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `price_category`
--
ALTER TABLE `price_category`
  ADD PRIMARY KEY (`price_category_id`),
  ADD KEY `price_category_ibfk_1` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_ibfk_1` (`price_category_id`),
  ADD KEY `product_ibfk_2` (`category_id`);
ALTER TABLE `product` ADD FULLTEXT KEY `search` (`product_name`,`product_description`);
ALTER TABLE `product` ADD FULLTEXT KEY `meta_search` (`meta_product_name`,`meta_product_desc`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`product_id`,`colors`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`product_id`,`image`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`product_id`,`sizes`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`return_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD UNIQUE KEY `review_id` (`review_id`),
  ADD KEY `review_ibfk_2` (`user_id`);

--
-- Indexes for table `review_image`
--
ALTER TABLE `review_image`
  ADD PRIMARY KEY (`review_id`,`image`);

--
-- Indexes for table `search_browse`
--
ALTER TABLE `search_browse`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `search_browse_ibfk_2` (`product_id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `shopping_cart_ibfk_1` (`user_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `item_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `delivery_address`
--
ALTER TABLE `delivery_address`
  MODIFY `address_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `delivery_staff`
--
ALTER TABLE `delivery_staff`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `order_tracking`
--
ALTER TABLE `order_tracking`
  MODIFY `tracking_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `reset_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `return_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2324;

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
  ADD CONSTRAINT `checkout_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkout_ibfk_4` FOREIGN KEY (`cart_id`) REFERENCES `shopping_cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkout_ibfk_5` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkout_ibfk_6` FOREIGN KEY (`address_id`) REFERENCES `delivery_address` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_tracking`
--
ALTER TABLE `order_tracking`
  ADD CONSTRAINT `order_tracking_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `owner`
--
ALTER TABLE `owner`
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
  ADD CONSTRAINT `returns_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `returns_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `delivery_staff` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review_image`
--
ALTER TABLE `review_image`
  ADD CONSTRAINT `review_image_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `review` (`review_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

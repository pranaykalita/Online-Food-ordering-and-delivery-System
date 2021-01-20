-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2021 at 04:43 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coderscafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

CREATE TABLE `admin_tb` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`admin_id`, `admin_name`, `admin_pass`, `admin_email`, `admin_image`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'default.png'),
(2, 'Priyanshu', 'priyanshu@123', 'priyanshu@gmail.com', 'adminopt.png');


-- --------------------------------------------------------

--
-- Table structure for table `menu_category`
--

CREATE TABLE `menu_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `cat_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_category`
--

INSERT INTO `menu_category` (`cat_id`, `cat_name`, `cat_image`, `cat_status`) VALUES
(2, 'Beverage', 'beve.jpg', 1),
(3, 'Starters', 'starters.png', 1),
(4, 'Deserts', 'desserts.jpg', 1),
(5, 'Main Course', 'maincourse.jpg', 1),
(6, 'Veg', 'salad.jpg', 0),
(7, 'Specials', 'special.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_quantity` int(11) NOT NULL,
  `menu_category` varchar(255) NOT NULL,
  `menu_image` varchar(255) NOT NULL,
  `menu_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`menu_id`, `menu_name`, `menu_price`, `menu_quantity`, `menu_category`, `menu_image`, `menu_status`) VALUES
(1, 'Mocktail', 120, 100, 'Beverage', 'mocktail.jpg', 1),
(2, 'Achari Paneer', 250, 100, 'Starters', 'achari.jpg', 1),
(3, 'Duck Curry', 350, 100, 'Main Course', 'duck.jpg', 1),
(4, 'Mohito', 100, 50, 'Beverage', 'mohito.gif', 1),
(5, 'Ice Cream', 150, 100, 'Deserts', 'icecream.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_all`
--

CREATE TABLE `orders_all` (
  `ord_id` int(11) NOT NULL,
  `ord_items` varchar(1000) NOT NULL,
  `ord_totlprice` int(11) NOT NULL,
  `ord_uname` varchar(255) NOT NULL,
  `ord_user` varchar(255) NOT NULL,
  `ord_phone` varchar(15) NOT NULL,
  `ord_email` varchar(255) NOT NULL,
  `ord_addrs` varchar(255) NOT NULL,
  `ord_lmark` varchar(255) NOT NULL,
  `ord_date` date NOT NULL,
  `ord_time` time NOT NULL,
  `ord_status` tinyint(1) NOT NULL DEFAULT 0,
  `del_per` varchar(255) NOT NULL,
  `del_phone` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_all`
--

INSERT INTO `orders_all` (`ord_id`, `ord_items`, `ord_totlprice`, `ord_uname`, `ord_user`, `ord_phone`, `ord_email`, `ord_addrs`, `ord_lmark`, `ord_date`, `ord_time`, `ord_status`, `del_per`, `del_phone`) VALUES
(1, 'a:3:{i:0;a:4:{s:8:\"Item_img\";s:12:\"mocktail.jpg\";s:9:\"Item_name\";s:8:\"Mocktail\";s:10:\"Item_price\";s:3:\"120\";s:8:\"quantity\";s:1:\"2\";}i:1;a:4:{s:8:\"Item_img\";s:10:\"achari.jpg\";s:9:\"Item_name\";s:13:\"Achari Paneer\";s:10:\"Item_price\";s:3:\"250\";s:8:\"quantity\";i:1;}i:2;a:4:{s:8:\"Item_img\";s:8:\"duck.jpg\";s:9:\"Item_name\";s:10:\"Duck Curry\";s:10:\"Item_price\";s:3:\"350\";s:8:\"quantity\";s:1:\"2\";}}', 1190, 'pranay kalita', 'pranaykalita', '+918638820939', 'pranaykalita2@gmail.com', 'jorhat,tarjan , house no 23', 'tarajan', '2021-01-19', '08:11:00', 3, 'delivery person 1', '+911234567890'),
(2, 'a:2:{i:0;a:4:{s:8:\"Item_img\";s:10:\"achari.jpg\";s:9:\"Item_name\";s:13:\"Achari Paneer\";s:10:\"Item_price\";s:3:\"250\";s:8:\"quantity\";i:1;}i:1;a:4:{s:8:\"Item_img\";s:10:\"mohito.gif\";s:9:\"Item_name\";s:6:\"Mohito\";s:10:\"Item_price\";s:3:\"100\";s:8:\"quantity\";i:1;}}', 350, 'pranay ', 'pranaykalita', '+918638820939', 'pranaykalita2@gmail.com', 'house no 56 tarajan', 'jorhat', '2021-01-19', '08:15:00', 3, 'delivery person 1', '+911234567890'),
(3, 'a:2:{i:0;a:4:{s:8:\"Item_img\";s:10:\"mohito.gif\";s:9:\"Item_name\";s:6:\"Mohito\";s:10:\"Item_price\";s:3:\"100\";s:8:\"quantity\";i:1;}i:1;a:4:{s:8:\"Item_img\";s:12:\"mocktail.jpg\";s:9:\"Item_name\";s:8:\"Mocktail\";s:10:\"Item_price\";s:3:\"120\";s:8:\"quantity\";i:1;}}', 220, 'pranay ', 'pranaykalita', '+911234567890', 'pranaykalita2@gmail.com', 'jorhat', 'jorhat', '2021-01-19', '09:11:00', 3, 'delivery person 1', '+911234567890');

-- --------------------------------------------------------

--
-- Table structure for table `staff_tb`
--

CREATE TABLE `staff_tb` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `staff_email` varchar(255) NOT NULL,
  `staff_number` varchar(13) NOT NULL,
  `staff_address` varchar(200) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `del_status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_tb`
--

INSERT INTO `staff_tb` (`staff_id`, `staff_name`, `staff_email`, `staff_number`, `staff_address`, `occupation`, `del_status`) VALUES
(1, 'delivery person 1', 'deliver@del.com', '+911234567890', 'jorhat', 'Delivery', 0),
(2, 'delivery2', 'example@delivery2', '+914567890563', 'jorhat', 'Delivery', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `uid` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `umail` varchar(255) NOT NULL,
  `uphone` varchar(255) NOT NULL,
  `uadd` varchar(255) NOT NULL,
  `upass` varchar(255) NOT NULL,
  `uterms` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`uid`, `uname`, `Fname`, `Lname`, `umail`, `uphone`, `uadd`, `upass`, `uterms`) VALUES
(1, 'pranaykalita', 'pranay', 'kalita', 'pranaykalita2@gmail.com', '+918638820939', 'tarjan puja mandir', 'pranay123', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `msg_id` int(11) NOT NULL,
  `msg_name` varchar(255) NOT NULL,
  `msg_email` varchar(255) NOT NULL,
  `msg_body` varchar(255) NOT NULL,
  `msg_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `menu_category`
--
ALTER TABLE `menu_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `orders_all`
--
ALTER TABLE `orders_all`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `staff_tb`
--
ALTER TABLE `staff_tb`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tb`
--
ALTER TABLE `admin_tb`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_category`
--
ALTER TABLE `menu_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders_all`
--
ALTER TABLE `orders_all`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff_tb`
--
ALTER TABLE `staff_tb`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

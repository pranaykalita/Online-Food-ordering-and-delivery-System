-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 10:07 PM
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
(3, 'Admin', 'admin', 'admin@admin.com', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `allorders_tb`
--

CREATE TABLE `allorders_tb` (
  `ord_id` int(11) NOT NULL,
  `invid` varchar(255) NOT NULL,
  `ord_items` varchar(1000) NOT NULL,
  `ord_totlprice` int(11) NOT NULL,
  `ord_acid` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `delivery_tb`
--

CREATE TABLE `delivery_tb` (
  `id` int(11) NOT NULL,
  `del_name` varchar(255) NOT NULL,
  `del_phone` varchar(255) NOT NULL,
  `del_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_tb`
--

INSERT INTO `delivery_tb` (`id`, `del_name`, `del_phone`, `del_status`) VALUES
(3, 'Jhon Doe', '+91885469750', 0),
(4, 'Rick Bross', '+91456897500', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_tb`
--

CREATE TABLE `feedback_tb` (
  `msg_id` int(11) NOT NULL,
  `msg_name` varchar(255) NOT NULL,
  `msg_email` varchar(255) NOT NULL,
  `msg_body` varchar(255) NOT NULL,
  `msg_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menucategory_tb`
--

CREATE TABLE `menucategory_tb` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `cat_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menucategory_tb`
--

INSERT INTO `menucategory_tb` (`cat_id`, `cat_name`, `cat_image`, `cat_status`) VALUES
(2, 'Beverage', 'beve.jpg', 1),
(3, 'Starters', 'starters.png', 1),
(4, 'Deserts', 'desserts.jpg', 1),
(5, 'Main Course', 'maincourse.jpg', 1),
(6, 'Veg', 'salad.jpg', 0),
(7, 'Specials', 'special.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menuitems_tb`
--

CREATE TABLE `menuitems_tb` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_quantity` int(11) NOT NULL,
  `menu_category` varchar(255) NOT NULL,
  `menu_image` varchar(255) NOT NULL,
  `menu_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menuitems_tb`
--

INSERT INTO `menuitems_tb` (`menu_id`, `menu_name`, `menu_price`, `menu_quantity`, `menu_category`, `menu_image`, `menu_status`) VALUES
(1, 'Mocktail', 120, 100, 'Beverage', 'mocktail.jpg', 1),
(2, 'Achari Paneer', 250, 100, 'Starters', 'achari.jpg', 1),
(3, 'Duck Curry', 350, 100, 'Main Course', 'duck.jpg', 1),
(4, 'Mohito', 100, 50, 'Beverage', 'mohito.gif', 1),
(5, 'Ice Cream', 150, 100, 'Deserts', 'icecream.jpg', 1);

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
  `occupation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_tb`
--

CREATE TABLE `users_tb` (
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
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `allorders_tb`
--
ALTER TABLE `allorders_tb`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `delivery_tb`
--
ALTER TABLE `delivery_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `menucategory_tb`
--
ALTER TABLE `menucategory_tb`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `menuitems_tb`
--
ALTER TABLE `menuitems_tb`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `staff_tb`
--
ALTER TABLE `staff_tb`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tb`
--
ALTER TABLE `admin_tb`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `allorders_tb`
--
ALTER TABLE `allorders_tb`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `delivery_tb`
--
ALTER TABLE `delivery_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menucategory_tb`
--
ALTER TABLE `menucategory_tb`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menuitems_tb`
--
ALTER TABLE `menuitems_tb`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff_tb`
--
ALTER TABLE `staff_tb`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

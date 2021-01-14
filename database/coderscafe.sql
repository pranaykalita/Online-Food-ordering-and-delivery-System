-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 02:13 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

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
  `admin_status` int(11) NOT NULL,
  `admin_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `del_id` int(11) NOT NULL,
  `del_uname` varchar(255) NOT NULL,
  `del_add` varchar(255) NOT NULL,
  `del_phn` int(11) NOT NULL,
  `del_count` int(11) NOT NULL,
  `del_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Beverage', 'beve.jpg', 0),
(2, 'Starters', 'starters.png', 0),
(3, 'MainCourse', 'maincourse.jpg', 0),
(4, 'Salads', 'salad.jpg', 1),
(5, 'Desserts', 'desserts.jpg', 0),
(6, 'Specials', 'special.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_category` varchar(255) NOT NULL,
  `menu_image` varchar(255) NOT NULL,
  `menu_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`menu_id`, `menu_name`, `menu_price`, `menu_category`, `menu_image`, `menu_status`) VALUES
(1, 'Duck Curry', 350, 'Specials', 'duck.jpg', 1),
(2, 'bbq special', 450, 'Salads', 'bbq.jpg', 1);

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
  `ord_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_all`
--

INSERT INTO `orders_all` (`ord_id`, `ord_items`, `ord_totlprice`, `ord_uname`, `ord_user`, `ord_phone`, `ord_email`, `ord_addrs`, `ord_lmark`, `ord_date`, `ord_time`, `ord_status`) VALUES
(15, 'a:2:{i:0;a:4:{s:8:\"Item_img\";s:8:\"duck.jpg\";s:9:\"Item_name\";s:10:\"Duck Curry\";s:10:\"Item_price\";s:3:\"350\";s:8:\"quantity\";s:1:\"2\";}i:1;a:4:{s:8:\"Item_img\";s:7:\"bbq.jpg\";s:9:\"Item_name\";s:11:\"bbq special\";s:10:\"Item_price\";s:3:\"450\";s:8:\"quantity\";i:1;}}', 1150, 'pranay kalita', 'nova@99', '2147483647', '', '', '', '0000-00-00', '00:20:21', 0),
(16, 'a:2:{i:0;a:4:{s:8:\"Item_img\";s:8:\"duck.jpg\";s:9:\"Item_name\";s:10:\"Duck Curry\";s:10:\"Item_price\";s:3:\"350\";s:8:\"quantity\";i:1;}i:1;a:4:{s:8:\"Item_img\";s:7:\"bbq.jpg\";s:9:\"Item_name\";s:11:\"bbq special\";s:10:\"Item_price\";s:3:\"450\";s:8:\"quantity\";i:1;}}', 800, 'asdas', 'nova@99', '2133333333', '', 'asd', 'asd', '2021-01-14', '03:23:00', 0),
(17, 'a:2:{i:0;a:4:{s:8:\"Item_img\";s:8:\"duck.jpg\";s:9:\"Item_name\";s:10:\"Duck Curry\";s:10:\"Item_price\";s:3:\"350\";s:8:\"quantity\";i:1;}i:1;a:4:{s:8:\"Item_img\";s:7:\"bbq.jpg\";s:9:\"Item_name\";s:11:\"bbq special\";s:10:\"Item_price\";s:3:\"450\";s:8:\"quantity\";i:1;}}', 800, 'pranay', 'nova@99', '1994556887', 'pranaykalita2@gmail.com', 'dfsdfsdfsdf', 'sdfeewesa', '2021-01-14', '03:31:00', 0),
(18, 'a:1:{i:0;a:4:{s:8:\"Item_img\";s:8:\"duck.jpg\";s:9:\"Item_name\";s:10:\"Duck Curry\";s:10:\"Item_price\";s:3:\"350\";s:8:\"quantity\";i:1;}}', 350, 'last test name', 'nova@99', '1234567890', 'pranaykalita2@gmail.com', 'last add', 'last land', '2021-01-14', '03:37:00', 0),
(19, 'a:1:{i:0;a:4:{s:8:\"Item_img\";s:8:\"duck.jpg\";s:9:\"Item_name\";s:10:\"Duck Curry\";s:10:\"Item_price\";s:3:\"350\";s:8:\"quantity\";i:1;}}', 350, 'sad', 'nova@99', '1111111111', 'pranaykalita2@gmail.com', '21sd', 'asd', '2021-01-14', '03:38:00', 0),
(20, 'a:1:{i:0;a:4:{s:8:\"Item_img\";s:8:\"duck.jpg\";s:9:\"Item_name\";s:10:\"Duck Curry\";s:10:\"Item_price\";s:3:\"350\";s:8:\"quantity\";i:1;}}', 350, 'final', 'nova@99', '1222222222', 'pranaykalita2@gmail.com', 'wdcasc ', 'last', '2021-01-14', '03:39:00', 0),
(21, 'a:1:{i:0;a:4:{s:8:\"Item_img\";s:8:\"duck.jpg\";s:9:\"Item_name\";s:10:\"Duck Curry\";s:10:\"Item_price\";s:3:\"350\";s:8:\"quantity\";i:1;}}', 350, 'last test name', 'nova@99', '1234567890', 'pranaykalita2@gmail.com', 'last add', 'last land', '2021-01-14', '03:37:00', 0),
(22, 'a:1:{i:0;a:4:{s:8:\"Item_img\";s:8:\"duck.jpg\";s:9:\"Item_name\";s:10:\"Duck Curry\";s:10:\"Item_price\";s:3:\"350\";s:8:\"quantity\";i:1;}}', 350, 'last test name', 'nova@99', '1234567890', 'pranaykalita2@gmail.com', 'last add', 'last land', '2021-01-14', '03:37:00', 0),
(23, 'a:1:{i:0;a:4:{s:8:\"Item_img\";s:8:\"duck.jpg\";s:9:\"Item_name\";s:10:\"Duck Curry\";s:10:\"Item_price\";s:3:\"350\";s:8:\"quantity\";i:1;}}', 350, 'last test name', 'nova@99', '1234567890', 'pranaykalita2@gmail.com', 'last add', 'last land', '2021-01-14', '03:37:00', 0),
(24, 'a:1:{i:0;a:4:{s:8:\"Item_img\";s:8:\"duck.jpg\";s:9:\"Item_name\";s:10:\"Duck Curry\";s:10:\"Item_price\";s:3:\"350\";s:8:\"quantity\";i:1;}}', 350, 'last test name', 'nova@99', '1234567890', 'pranaykalita2@gmail.com', 'last add', 'last land', '2021-01-14', '03:37:00', 0),
(25, 'a:1:{i:0;a:4:{s:8:\"Item_img\";s:8:\"duck.jpg\";s:9:\"Item_name\";s:10:\"Duck Curry\";s:10:\"Item_price\";s:3:\"350\";s:8:\"quantity\";i:1;}}', 350, 'last test name', 'nova@99', '1234567890', 'pranaykalita2@gmail.com', 'last add', 'last land', '2021-01-14', '03:37:00', 0),
(26, 'a:1:{i:0;a:4:{s:8:\"Item_img\";s:8:\"duck.jpg\";s:9:\"Item_name\";s:10:\"Duck Curry\";s:10:\"Item_price\";s:3:\"350\";s:8:\"quantity\";i:1;}}', 350, 'last test name', 'nova@99', '1234567890', 'pranaykalita2@gmail.com', 'last add', 'last land', '2021-01-14', '03:37:00', 0);

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
(1, 'nova@99', 'pranay', 'kalita', 'pranaykalita2@gmail.com', '9957310391', 'jorhat tarajan puja mandir', 'nova@nova', '1'),
(2, 'pranay@kalita', 'pranay', 'kalita', 'admin@admin.com', '7638033416', 'tarajan', 'admin', '1'),
(5, 'pranay@12', 'pranay', 'kaltia', 'pranaykaltia4@gmail.com', '+911234567890', 'jorhat', 'novacore', 'on'),
(6, 'pranaykalita', 'pranay', 'kalita', 'pranaykaltia@admin.com', '+911234567890', 'jorhat tarajan', 'praanay123', 'on');

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
-- Dumping data for table `user_messages`
--

INSERT INTO `user_messages` (`msg_id`, `msg_name`, `msg_email`, `msg_body`, `msg_status`) VALUES
(1, 'pranay kalita', 'pranaykalita2@gmail.com', 'msg works', 1),
(2, 'pranay kalita', 'pranaykalita2@gmail.com', 'msg works', 1),
(3, 'pranay ', 'kalita@af.vdfhg', 'fksj', 1),
(4, 'pranay ', 'kalita@af.vdfhg', 'fksj', 1),
(5, 'jfhah', 'jfh@jafh.cin', 'ghsidgh', 1),
(6, 'asdsd', 'asdas@ad.com', 'afjflkajf', 1),
(7, 'asdsd', 'asdas@ad.com', 'afjflkajf', 1),
(8, 'dfgs', 'sdfg@fsdf.com', 'afhdkjahf', 1),
(9, 'sdfsdf', 'dsfs@asdas.com', 'djkfhf', 1),
(10, 'sdfsdf', 'dsfs@asdas.com', 'djkfhf', 1),
(11, 'sdfsdf', 'dsfs@asdas.com', 'djkfhf', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`del_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `del_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_category`
--
ALTER TABLE `menu_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders_all`
--
ALTER TABLE `orders_all`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

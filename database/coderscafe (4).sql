-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 11:14 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

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

--
-- Dumping data for table `allorders_tb`
--

INSERT INTO `allorders_tb` (`ord_id`, `invid`, `ord_items`, `ord_totlprice`, `ord_acid`, `ord_user`, `ord_phone`, `ord_email`, `ord_addrs`, `ord_lmark`, `ord_date`, `ord_time`, `ord_status`, `del_per`, `del_phone`) VALUES
(23, 'CCAFE-00000001', 'a:7:{i:0;a:4:{s:8:\"Item_img\";s:12:\"mocktail.jpg\";s:9:\"Item_name\";s:8:\"Mocktail\";s:10:\"Item_price\";s:3:\"120\";s:8:\"quantity\";i:1;}i:1;a:4:{s:8:\"Item_img\";s:12:\"lemonade.jpg\";s:9:\"Item_name\";s:13:\"Arnold palmar\";s:10:\"Item_price\";s:3:\"120\";s:8:\"quantity\";i:1;}i:2;a:4:{s:8:\"Item_img\";s:21:\"Oreo-Milkshake-10.jpg\";s:9:\"Item_name\";s:15:\"Oreo Milk shake\";s:10:\"Item_price\";s:3:\"120\";s:8:\"quantity\";i:1;}i:3;a:4:{s:8:\"Item_img\";s:8:\"ccbc.jpg\";s:9:\"Item_name\";s:4:\"CCBC\";s:10:\"Item_price\";s:3:\"200\";s:8:\"quantity\";i:1;}i:4;a:4:{s:8:\"Item_img\";s:17:\"Butter-Naan-1.jpg\";s:9:\"Item_name\";s:10:\"Butter nun\";s:10:\"Item_price\";s:2:\"50\";s:8:\"quantity\";i:1;}i:5;a:4:{s:8:\"Item_img\";s:16:\"buttermasala.jpg\";s:9:\"Item_name\";s:21:\"Chicken Butter Masala\";s:10:\"Item_price\";s:3:\"450\";s:8:\"quantity\";i:1;}i:6;a:4:{s:8:\"Item_img\";s:10:\"ceaser.jpg\";s:9:\"Item_name\";s:12:\"Ceaser Salad\";s:10:\"Item_price\";s:3:\"200\";s:8:\"quantity\";i:1;}}', 1260, 3, 'Priyanshu Dutta', '+918011271197', 'priyanshudutta775@gmail.com', 'WEST BONGAL PUKHURI JAYANAGAR,\r\nJORHAT 14 BLOCK', 'namghar', '2021-03-03', '12:25:00', 3, 'Jhon Doe', '+91885469750'),
(24, 'CCAFE-00000003', 'a:6:{i:0;a:4:{s:8:\"Item_img\";s:21:\"Oreo-Milkshake-10.jpg\";s:9:\"Item_name\";s:15:\"Oreo Milk shake\";s:10:\"Item_price\";s:3:\"120\";s:8:\"quantity\";s:1:\"5\";}i:1;a:4:{s:8:\"Item_img\";s:37:\"mocktails-grapefruit-basil-mimosa.jpg\";s:9:\"Item_name\";s:10:\"Atomic Cat\";s:10:\"Item_price\";s:3:\"120\";s:8:\"quantity\";s:1:\"5\";}i:2;a:4:{s:8:\"Item_img\";s:8:\"ccbc.jpg\";s:9:\"Item_name\";s:4:\"CCBC\";s:10:\"Item_price\";s:3:\"200\";s:8:\"quantity\";s:1:\"3\";}i:3;a:4:{s:8:\"Item_img\";s:13:\"alokulcha.jpg\";s:9:\"Item_name\";s:10:\"alu kulcha\";s:10:\"Item_price\";s:3:\"250\";s:8:\"quantity\";s:1:\"5\";}i:4;a:4:{s:8:\"Item_img\";s:12:\"caramel.jpeg\";s:9:\"Item_name\";s:16:\"Caramel custard \";s:10:\"Item_price\";s:3:\"200\";s:8:\"quantity\";s:1:\"5\";}i:5;a:4:{s:8:\"Item_img\";s:12:\"hongkong.jpg\";s:9:\"Item_name\";s:11:\"Veg Noodles\";s:10:\"Item_price\";s:2:\"80\";s:8:\"quantity\";s:1:\"4\";}}', 4370, 4, 'Rachna Harlalka', '3546473788', 'rachna@gmail.com', 'royal road', 'namghar', '2021-03-03', '03:09:00', 3, 'Biju', '8011271195'),
(25, 'CCAFE-0000002', 'a:3:{i:0;a:4:{s:8:\"Item_img\";s:21:\"Oreo-Milkshake-10.jpg\";s:9:\"Item_name\";s:15:\"Oreo Milk shake\";s:10:\"Item_price\";s:3:\"120\";s:8:\"quantity\";i:1;}i:1;a:4:{s:8:\"Item_img\";s:10:\"achari.jpg\";s:9:\"Item_name\";s:13:\"Achari Paneer\";s:10:\"Item_price\";s:3:\"250\";s:8:\"quantity\";i:1;}i:2;a:4:{s:8:\"Item_img\";s:13:\"Chicken65.jpg\";s:9:\"Item_name\";s:10:\"Chicken 65\";s:10:\"Item_price\";s:3:\"200\";s:8:\"quantity\";i:1;}}', 570, 3, 'Priyanshu Dutta', '+918011271197', 'priyanshudutta775@gmail.com', 'WEST BONGAL PUKHURI JAYANAGAR,\r\nJORHAT 14 BLOCK', 'namghar', '2021-03-03', '03:12:00', 2, 'Raju', '7765467213'),
(26, '', 'a:1:{i:0;a:4:{s:8:\"Item_img\";s:8:\"ccbc.jpg\";s:9:\"Item_name\";s:4:\"CCBC\";s:10:\"Item_price\";s:3:\"200\";s:8:\"quantity\";i:1;}}', 200, 4, 'Rachna Harlalka', '+918011271197', 'rachna@gmail.com', 'WEST BONGAL PUKHURI JAYANAGAR,\r\nJORHAT 14 BLOCK', 'namghar', '2021-03-03', '03:14:00', 4, '', ''),
(27, '', 'a:1:{i:0;a:4:{s:8:\"Item_img\";s:13:\"alokulcha.jpg\";s:9:\"Item_name\";s:10:\"alu kulcha\";s:10:\"Item_price\";s:3:\"250\";s:8:\"quantity\";i:1;}}', 250, 4, 'Rachna Harlalka', '+918011271197', 'rachna@gmail.com', 'WEST BONGAL PUKHURI JAYANAGAR,\r\nJORHAT 14 BLOCK', 'namghar', '2021-03-03', '03:20:00', 0, '', ''),
(28, '', 'a:1:{i:0;a:4:{s:8:\"Item_img\";s:12:\"mocktail.jpg\";s:9:\"Item_name\";s:8:\"Mocktail\";s:10:\"Item_price\";s:3:\"120\";s:8:\"quantity\";i:1;}}', 120, 4, 'Rachna Harlalka', '+918011271197', 'rachna@gmail.com', 'WEST BONGAL PUKHURI JAYANAGAR,\r\nJORHAT 14 BLOCK', 'namghar', '2021-03-03', '03:21:00', 1, '', ''),
(29, 'CCAFE-0000002', 'a:2:{i:0;a:4:{s:8:\"Item_img\";s:12:\"caramel.jpeg\";s:9:\"Item_name\";s:16:\"Caramel custard \";s:10:\"Item_price\";s:3:\"200\";s:8:\"quantity\";i:1;}i:1;a:4:{s:8:\"Item_img\";s:15:\"gulab_jamun.jpg\";s:9:\"Item_name\";s:12:\"Gulab Jamoon\";s:10:\"Item_price\";s:2:\"60\";s:8:\"quantity\";i:1;}}', 260, 4, 'Rachna Harlalka', '8011271197', 'rachna@gmail.com', 'WEST BONGAL PUKHURI JAYANAGAR\r\nNa Ali Road,Na Ali Road', '', '2021-03-03', '03:22:00', 3, 'Jhon Doe', '+91885469750');

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
(4, 'Rick Bross', '+91456897500', 0),
(5, 'Raju', '7765467213', 1),
(6, 'Biju', '8011271195', 0);

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

--
-- Dumping data for table `feedback_tb`
--

INSERT INTO `feedback_tb` (`msg_id`, `msg_name`, `msg_email`, `msg_body`, `msg_status`) VALUES
(1, 'Priyanshu Pal Dutta', 'priyanshudutta775@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 1);

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
(6, 'Veg', 'salad.jpg', 1),
(7, 'Specials', 'special.jpg', 1);

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
(5, 'Ice Cream', 150, 100, 'Deserts', 'icecream.jpg', 1),
(7, 'Arnold palmar', 120, 100, 'Beverage', 'lemonade.jpg', 1),
(8, 'Lassi', 100, 100, 'Beverage', 'lassi.jpg', 1),
(9, 'Oreo Milk shake', 120, 100, 'Beverage', 'Oreo-Milkshake-10.jpg', 1),
(10, 'Tea', 50, 100, 'Beverage', 'tea.jpg', 1),
(11, 'Virgin Mary', 150, 100, 'Beverage', 'Atomic-cat.jpg', 1),
(12, 'Atomic Cat', 120, 20, 'Beverage', 'mocktails-grapefruit-basil-mimosa.jpg', 1),
(13, 'CCBC', 200, 100, 'Starters', 'ccbc.jpg', 1),
(14, 'Chicken 65', 200, 100, 'Starters', 'Chicken65.jpg', 1),
(15, 'Chicken Kabab', 250, 100, 'Starters', 'starters.png', 1),
(16, 'Brownie', 150, 100, 'Deserts', 'brownie.jpg', 1),
(17, 'Caramel custard ', 200, 100, 'Deserts', 'caramel.jpeg', 1),
(18, 'Gulab Jamoon', 60, 20, 'Deserts', 'gulab_jamun.jpg', 1),
(19, 'alu kulcha', 250, 100, 'Main Course', 'alokulcha.jpg', 1),
(20, 'Assamese Thali', 150, 100, 'Main Course', 'assamesethali.jpg', 1),
(21, 'Chicken Butter Masala', 450, 200, 'Main Course', 'buttermasala.jpg', 1),
(22, 'Butter nun', 50, 100, 'Main Course', 'Butter-Naan-1.jpg', 1),
(23, 'Chicken Biriyani', 250, 100, 'Main Course', 'Chicken_Biryani.jpg', 1),
(24, 'Chicken Manchurian', 250, 100, 'Main Course', 'manchurian.jpg', 1),
(25, 'Tandoori Chicken', 450, 100, 'Main Course', 'Tandoori.jpg', 1),
(26, 'Pork with bamboo Shoot', 450, 20, 'Specials', 'porkwid.jpg', 1),
(27, 'Local Murg With Banana Flower', 350, 20, 'Specials', 'Koldil-Murgi.jpg', 1),
(28, 'FIsh Wrapped with banana leaves', 250, 100, 'Specials', 'Food-of-Guwahati.jpg', 1),
(29, 'Pork Stick', 100, 20, 'Specials', 'pork-stick-singpho.jpg', 1),
(30, 'Ceaser Salad', 200, 20, 'Veg', 'ceaser.jpg', 1),
(31, 'Veg Noodles', 80, 20, 'Veg', 'hongkong.jpg', 1),
(32, 'Veg roll', 80, 20, 'Veg', 'roll.jpg', 1),
(33, 'peas pulao', 80, 100, 'Veg', 'peas.jpg', 1);

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

--
-- Dumping data for table `staff_tb`
--

INSERT INTO `staff_tb` (`staff_id`, `staff_name`, `staff_email`, `staff_number`, `staff_address`, `occupation`) VALUES
(3, 'Priyanshu Pal Dutta', 'priyanshudutta775@gmail.com', '+918011271197', 'WEST BONGAL PUKHURI JAYANAGAR,\r\nJORHAT 14 BLOCK', 'Manager'),
(4, 'Pranay Kalita', 'pkalita2@gmail.com', '8011571197', 'Tarazan', 'Manager'),
(5, 'Mukunda ', 'muku@gmail.com', '7654367654', 'Malow ali', 'Cook'),
(6, 'Hemanga ', 'hbora@gmail.com', '2345654432', 'disoi nagar', 'Cook');

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
-- Dumping data for table `users_tb`
--

INSERT INTO `users_tb` (`uid`, `uname`, `Fname`, `Lname`, `umail`, `uphone`, `uadd`, `upass`, `uterms`) VALUES
(3, 'ppd_85', 'Priyanshu', 'Dutta', 'priyanshudutta775@gmail.com', '8011271197', 'WEST BONGAL PUKHURI JAYANAGAR\r\nNa Ali Road,Na Ali Road', '123456789', 'on'),
(4, 'rachna', 'Rachna', 'Harlalka', 'rachna@gmail.com', '995766525', 'Royal road', '123456789', 'on');

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
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `delivery_tb`
--
ALTER TABLE `delivery_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menucategory_tb`
--
ALTER TABLE `menucategory_tb`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menuitems_tb`
--
ALTER TABLE `menuitems_tb`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `staff_tb`
--
ALTER TABLE `staff_tb`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

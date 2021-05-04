-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 11:23 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gofix`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `names` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `types` varchar(20) NOT NULL,
  `origin` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `names`, `image`, `price`, `user_id`, `shop_id`, `types`, `origin`, `qty`, `total`, `status`) VALUES
(93, 11, 'testing products4444', 'http://gofix.rw/Administrator/uploads/9951_passportPic.png', 22000, 12, 1, 'electronics', 'web', 1, 22000, 1),
(94, 2, 'testElectronics 1011', 'http://gofix.rw/Administrator/uploads/1516_passportPic.jpg', 34000, 12, 16, 'electronics', 'web', 1, 34000, 1),
(95, 1, 'testElectronics 1010', 'http://gofix.rw/Administrator/uploads/288_passportPic.jpg', 34000, 12, 16, 'electronics', 'web', 1, 34000, 1),
(96, 12, 'bahizi item', 'http://gofix.rw/Administrator/uploads/4454_passportPic.jpg', 2000, 12, 14, 'spares', 'web', 2, 4000, 1),
(97, 10, 'Gucci bag', 'http://gofix.rw/Administrator/uploads/5710_passportPic.jpg', 34000, 12, 2, 'other', 'web', 1, 34000, 1),
(98, 3, 'Gearbox Rava', 'http://gofix.rw/Administrator/uploads/1338_passportPic.jpg', 34000, 12, 14, 'spares', 'web', 1, 34000, 1),
(100, 11, 'testing products4444', 'http://gofix.rw/Administrator/uploads/9951_passportPic.png', 22000, 12, 1, 'electronics', 'web', 1, 22000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `car_booking`
--

CREATE TABLE `car_booking` (
  `booking_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_booking`
--

INSERT INTO `car_booking` (`booking_id`, `car_id`, `user_id`, `phone`, `created_at`) VALUES
(1, 1, 21, '0785304693', '2020-09-30 11:38:47'),
(2, 7, 21, '0785304693', '2020-09-30 11:45:55'),
(3, 7, 21, '0785304693', '2020-09-30 11:46:59'),
(4, 1, 21, '0785304693', '2020-09-30 11:47:45'),
(5, 1, 21, '0785304693', '2020-09-30 11:49:34'),
(6, 1, 21, '0785304693', '2020-09-30 11:52:06'),
(7, 1, 21, '0785304693', '2020-09-30 11:53:27'),
(8, 7, 21, '0785304693', '2020-09-30 11:55:38'),
(9, 1, 21, '0785304693', '2020-09-30 11:57:12'),
(10, 1, 21, '0785304693', '2020-09-30 11:59:15'),
(11, 1, 21, '0785304693', '2020-09-30 12:05:03'),
(12, 1, 21, '0785304693', '2020-09-30 12:08:36'),
(13, 1, 21, '0785304693', '2020-09-30 12:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `dashlogin`
--

CREATE TABLE `dashlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` varchar(20) NOT NULL,
  `names` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dashlogin`
--

INSERT INTO `dashlogin` (`id`, `username`, `password`, `roles`, `names`, `created`) VALUES
(1, 'InnoNiyo', '12345Niyo', 'Admin', 'Innocent niyomugabo', '2020-12-13 12:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `electronics_request_tbl`
--

CREATE TABLE `electronics_request_tbl` (
  `request_id` int(11) NOT NULL,
  `spare_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `qty` int(11) NOT NULL,
  `totale` int(11) NOT NULL,
  `origin` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electronics_request_tbl`
--

INSERT INTO `electronics_request_tbl` (`request_id`, `spare_id`, `shop_id`, `user_id`, `created_at`, `status`, `qty`, `totale`, `origin`) VALUES
(96, 11, 1, 12, '2020-12-15 15:51:52', 0, 1, 22000, 'web');

-- --------------------------------------------------------

--
-- Table structure for table `homedashboard`
--

CREATE TABLE `homedashboard` (
  `id` int(11) NOT NULL,
  `slider1` varchar(255) NOT NULL,
  `slider2` varchar(255) NOT NULL,
  `slider3` varchar(255) NOT NULL,
  `text1up` varchar(255) NOT NULL,
  `text1down` varchar(255) NOT NULL,
  `text2up` varchar(255) NOT NULL,
  `text2down` varchar(255) NOT NULL,
  `text3up` varchar(255) NOT NULL,
  `text3down` varchar(255) NOT NULL,
  `banner1` varchar(255) NOT NULL,
  `banner21top` varchar(255) NOT NULL,
  `banner21middle` varchar(255) NOT NULL,
  `banner21lower` varchar(255) NOT NULL,
  `banner21image` varchar(255) NOT NULL,
  `banner22top` varchar(255) NOT NULL,
  `banner22middle` varchar(255) NOT NULL,
  `banner22lower` varchar(255) NOT NULL,
  `banner22image` varchar(255) NOT NULL,
  `electronics` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homedashboard`
--

INSERT INTO `homedashboard` (`id`, `slider1`, `slider2`, `slider3`, `text1up`, `text1down`, `text2up`, `text2down`, `text3up`, `text3down`, `banner1`, `banner21top`, `banner21middle`, `banner21lower`, `banner21image`, `banner22top`, `banner22middle`, `banner22lower`, `banner22image`, `electronics`) VALUES
(1, 'images/b1.jpg', 'images/b2.jpg', 'images/b3.jpg', 'Get flat 10% Cashback', 'NEW STANDARD', 'Get flat 10% Cashback', 'THE BIG SALE', 'advanced Wireless earbuds', 'BEST HEADPHONE', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `other_request_tbl`
--

CREATE TABLE `other_request_tbl` (
  `request_id` int(11) NOT NULL,
  `spare_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `qty` int(11) NOT NULL,
  `totale` int(11) NOT NULL,
  `origin` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spare_request_tbl`
--

CREATE TABLE `spare_request_tbl` (
  `request_id` int(11) NOT NULL,
  `spare_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `qty` int(11) NOT NULL DEFAULT 1,
  `totale` int(11) NOT NULL,
  `origin` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_login`
--

CREATE TABLE `tbl_admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `roles` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `shopid` int(11) DEFAULT NULL,
  `origin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin_login`
--

INSERT INTO `tbl_admin_login` (`id`, `username`, `password`, `user_id`, `roles`, `status`, `created`, `shopid`, `origin`) VALUES
(1, 'GofixAdmin', 'Jules', 26, 'Admin', 1, '2020-10-02 06:28:23', NULL, ''),
(4, 'GofixRental221', 'GofixRental', 21, 'rental', 1, '2020-10-02 07:47:06', NULL, ''),
(10, 'GofixShop1330', 'GofixShop', 30, 'electronics', 1, '2020-10-09 08:02:45', 13, ''),
(14, 'GofixGarage126', 'GofixGarage', 26, 'garage', 1, '2020-10-13 05:51:44', 1, ''),
(15, 'GofixShop1221', 'GofixShop', 21, 'spare', 1, '2020-10-13 06:29:47', 12, ''),
(16, 'GofixShop1311 web', 'GofixShop', 11, 'spare', 1, '2020-11-04 14:25:05', 13, 'web'),
(18, 'GofixRental411 ', 'GofixRental', 11, 'rental', 1, '2020-11-05 13:43:35', NULL, ''),
(19, 'GofixRental511 ', 'GofixRental', 11, 'rental', 1, '2020-11-05 13:44:22', NULL, ''),
(20, 'GofixRental411 ', 'GofixRental', 11, 'rental', 1, '2020-11-05 13:44:50', NULL, ''),
(21, 'GofixShopO111 web', 'GofixShop', 11, 'electronics', 1, '2020-11-09 08:39:50', 1, 'web'),
(23, 'GofixShop1611 web', 'GofixShop', 11, 'electronics', 1, '2020-11-09 08:47:12', 16, 'web'),
(27, 'GofixShopO211 web', 'GofixShop', 11, 'other', 1, '2020-11-09 13:26:55', 2, 'web'),
(28, 'GofixShopO312 web', 'GofixShop', 12, 'other', 1, '2020-11-16 16:44:05', 3, 'web'),
(29, 'GofixShop1411 web', 'GofixShop', 11, 'spare', 1, '2020-12-15 14:57:36', 14, 'web');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(45) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`, `province_id`) VALUES
(1, 'Huye', 1),
(2, 'Gisagara', 1),
(3, 'Nyanza', 1),
(4, 'Kayonza', 2),
(5, 'Rwamagana', 2),
(6, 'Karongi', 3),
(7, 'Rusizi', 3),
(8, 'Kirehe', 2),
(9, 'Rutsiro', 3),
(10, 'Gasabo', 5),
(11, 'Kicukiro', 5),
(12, 'Nyarugenge', 5),
(13, 'Kamonyi', 1),
(14, 'Muhanga', 1),
(15, 'Nyamagabe', 1),
(16, 'Ngororero', 3),
(17, 'Nyaruguru', 1),
(18, 'Ruhango', 1),
(19, 'Nyabihu', 3),
(20, 'Rubavu', 3),
(21, 'Nyamasheke', 3),
(22, 'Bugesera', 2),
(23, 'Gatsibo', 2),
(24, 'Ngoma', 2),
(25, 'Nyagatare', 2),
(26, 'Burera', 4),
(27, 'Gakenke', 4),
(28, 'Gicumbi', 4),
(29, 'Musanze', 4),
(30, 'Rulindo', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_drivers`
--

CREATE TABLE `tbl_drivers` (
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(255) DEFAULT NULL,
  `NID` varchar(18) DEFAULT NULL,
  `license_number` varchar(18) DEFAULT NULL,
  `categories` varchar(12) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_drivers`
--

INSERT INTO `tbl_drivers` (`driver_id`, `driver_name`, `NID`, `license_number`, `categories`, `image`, `address`, `phone`, `created`) VALUES
(14, 'jules Mugisha maurice', '12345678', '45651232', 'a,b,c', 'http://gofix.rw/android/uploads/4353_passportPic.jpg', 'nfjadnfd', '', '2020-09-21 15:02:15'),
(15, 'jules', '532f', '5623221', 'A,D', 'http://gofix.rw/android/uploads/8596_passportPic.jpg', 'fhshfjs', '', '2020-09-21 15:33:39'),
(16, 'jules', 'ndsfnfgn', 'nfsdnnfs', 'ABCD', 'http://gofix.rw/android/uploads/2917_passportPic.jpg', 'ndfnn', '', '2020-09-21 15:38:12'),
(17, 'jules', 'ndsfnfgn', 'nfsdnnfs', 'ABCD', 'http://gofix.rw/android/uploads/4608_passportPic.jpg', 'ndfnn', '2565', '2020-09-21 15:40:00'),
(18, 'kalisa', '171856231', '124567p', 'A,B,E', 'http://gofix.rw/android/uploads/3176_passportPic.jpg', 'emmanuel', '0785630124', '2020-09-22 09:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_electronics`
--

CREATE TABLE `tbl_electronics` (
  `spareid` int(11) NOT NULL,
  `sparename` varchar(255) NOT NULL,
  `spareprice` int(11) NOT NULL,
  `sparedescription` varchar(255) NOT NULL,
  `shopid` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `types` varchar(20) NOT NULL DEFAULT 'electronics',
  `origin` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_electronics`
--

INSERT INTO `tbl_electronics` (`spareid`, `sparename`, `spareprice`, `sparedescription`, `shopid`, `image`, `phone`, `address`, `created_at`, `types`, `origin`) VALUES
(13, 'testing products', 22000, 'hallo kigali ', 13, 'http://gofix.rw/Administrator/uploads/1528_passportPic.jpg', '012599665', 'kicukiro', '2020-10-29 17:32:01', 'electronics', ''),
(16, 'testElectronics 1010', 34000, 'Ni igicuruzwa kiza', 16, 'http://gofix.rw/Administrator/uploads/9782_passportPic.jpg', '232231', 'kk 2st rwan', '2020-11-09 09:12:48', 'electronics', 'web'),
(19, 'testElectronics 1011', 34000, 'iyi ni test ya kabiri', 16, 'http://gofix.rw/Administrator/uploads/1516_passportPic.jpg', '232231', 'kk 2st rwan', '2020-11-09 09:17:00', 'electronics', 'web'),
(22, 'Gucci bag', 3200, 'Gucci bag', 2, 'http://gofix.rw/Administrator/uploads/7391_passportPic.jpg', '', '', '2020-11-09 13:53:17', 'electronics', 'web'),
(23, 'hallo electronics', 3200, 'just testing', 1, 'http://gofix.rw/Administrator/uploads/6928_passportPic.jpg', '', '', '2020-11-10 14:09:48', 'electronics', ''),
(24, 'testing products4444', 22000, 'rruuwetu', 1, 'http://gofix.rw/Administrator/uploads/9951_passportPic.png', '', '', '2020-11-16 16:13:24', 'electronics', 'web');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_eloshop`
--

CREATE TABLE `tbl_eloshop` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_tin` varchar(15) NOT NULL,
  `shop_owner` varchar(255) NOT NULL,
  `shop_phone` varchar(15) NOT NULL,
  `shop_adress` varchar(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `origin` varchar(10) NOT NULL DEFAULT 'App'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_eloshop`
--

INSERT INTO `tbl_eloshop` (`shop_id`, `shop_name`, `shop_tin`, `shop_owner`, `shop_phone`, `shop_adress`, `user_id`, `status`, `created_at`, `origin`) VALUES
(13, 'tubaguyaguye', '123456789', 'Murokore egide', '012599665', 'kicukiro', '30', 1, '2020-10-13 05:23:12', 'App'),
(14, 'Rwanda electronics', '', 'Mugisha Jules  ', '232231', 'akfda', '11 ', 1, '2020-11-04 14:29:05', 'web'),
(15, 'Rwanda spare parts', '', 'Mugisha Jules  ', '232231', 'akfda', '11 ', 0, '2020-11-04 13:40:32', 'web'),
(16, 'Jules Electronics', '', 'Mugisha Jules  ', '232231', 'kk 2st rwan', '11 ', 1, '2020-11-09 08:47:12', 'web');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_garage`
--

CREATE TABLE `tbl_garage` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `district_name` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_garage`
--

INSERT INTO `tbl_garage` (`id`, `name`, `owner_name`, `phone`, `district_name`, `description`, `created`, `user_id`, `status`) VALUES
(1, 'GEMECA', 'Kalisa Jules', '0785604693', 'Kicukiro', 'We do mechanical sunspension We do mechanical sunspension We do mechanical sunspension We do mechanical sunspension We do mechanical sunspension We do mechanical sunspension We do mechanical sunspension We do mechanical sunspension We do mechanical sunspe', '2020-10-13 05:51:44', 26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mechanician`
--

CREATE TABLE `tbl_mechanician` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `district_name` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mechanician`
--

INSERT INTO `tbl_mechanician` (`id`, `name`, `phone`, `district_name`, `description`, `created`) VALUES
(1, 'Kadage emmanuel', '078560563', 'Kicukiro', 'Sinzi ibyo nkora', '2020-09-17 14:52:15'),
(2, 'Kadage emmanuel', '078560563', 'Kicukiro', 'Sinzi ibyo nkora', '2020-09-17 14:52:15'),
(3, 'Kadage emmanuel', '078560563', 'Kicukiro', 'Sinzi ibyo nkora', '2020-09-17 14:52:15'),
(4, 'Kadage emmanuel', '078560563', 'Kicukiro', 'Sinzi ibyo nkora', '2020-09-17 14:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_other_shops`
--

CREATE TABLE `tbl_other_shops` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_tin` varchar(15) NOT NULL,
  `shop_owner` varchar(255) NOT NULL,
  `shop_phone` varchar(15) NOT NULL,
  `shop_adress` varchar(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `origin` varchar(10) NOT NULL DEFAULT 'App'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_other_shops`
--

INSERT INTO `tbl_other_shops` (`shop_id`, `shop_name`, `shop_tin`, `shop_owner`, `shop_phone`, `shop_adress`, `user_id`, `status`, `created_at`, `origin`) VALUES
(1, 'muteremuko', '', 'Mugisha Jules  ', '045786325', 'kk 2st rwan', '11 ', 1, '2020-11-05 13:51:55', 'web'),
(2, 'Jules Clothes', '', 'Mugisha Jules  ', '0785603214', 'Kigali ku m', '11 ', 1, '2020-11-09 13:26:56', 'web'),
(3, 'ets', '', 'karekezi ', '098765432', 'kigali', '12 ', 1, '2020-11-16 16:44:05', 'web');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_province`
--

CREATE TABLE `tbl_province` (
  `pro_id` int(11) NOT NULL,
  `name` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_province`
--

INSERT INTO `tbl_province` (`pro_id`, `name`) VALUES
(1, 'Southern'),
(2, 'Eastern'),
(3, 'Western'),
(4, 'Northern'),
(5, 'Kigali city');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rentals`
--

CREATE TABLE `tbl_rentals` (
  `rent_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `daily` int(11) NOT NULL,
  `monthly` int(11) NOT NULL,
  `engine` varchar(15) NOT NULL,
  `tank` varchar(15) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rentals`
--

INSERT INTO `tbl_rentals` (`rent_id`, `title`, `daily`, `monthly`, `engine`, `tank`, `img1`, `img2`, `img3`, `user_id`, `phone`, `address`, `created`) VALUES
(1, 'santa fe 2010 ', 30000, 700000, 'Automatic', 'Fuel', 'http://www.gofix.rw/android/images/santa1.jpg', 'http://www.gofix.rw/android/images/santa2.jpg', 'http://www.gofix.rw/android/images/santa3.jpg', 10, '0785304693', 'KK 2 strt kigali Rwanda', '2020-11-25 12:19:58'),
(2, 'santa fe 2010 ', 30000, 700000, 'Automatic', 'Fuel', 'http://www.gofix.rw/android/images/car1.jpg', 'http://www.gofix.rw/android/images/car1.jpg', 'http://www.gofix.rw/android/images/car1.jpg', 10, '0', '0', '2020-11-25 12:19:58'),
(3, 'santa fe 2010 ', 30000, 700000, 'Automatic', 'Fuel', 'http://www.gofix.rw/android/images/car1.jpg', 'http://www.gofix.rw/android/images/car1.jpg', 'http://www.gofix.rw/android/images/car1.jpg', 10, '0', '0', '2020-11-25 12:19:58'),
(4, 'santa fe 2010 ', 30000, 700000, 'Automatic', 'Fuel', 'http://www.gofix.rw/android/images/santa1.jpg', 'http://www.gofix.rw/android/images/santa2.jpg', 'http://www.gofix.rw/android/images/santa3.jpg', 10, '0785304693', 'KK 2 strt kigali Rwanda', '2020-11-25 12:19:58'),
(5, 'santa fe 2010 ', 30000, 700000, 'Automatic', 'Fuel', 'http://www.gofix.rw/android/images/car1.jpg', 'http://www.gofix.rw/android/images/car1.jpg', 'http://www.gofix.rw/android/images/car1.jpg', 10, '0', '0', '2020-11-25 12:19:58'),
(6, 'santa fe 2010 ', 30000, 700000, 'Automatic', 'Fuel', 'http://www.gofix.rw/android/images/car1.jpg', 'http://www.gofix.rw/android/images/car1.jpg', 'http://www.gofix.rw/android/images/car1.jpg', 10, '0', '0', '2020-11-25 12:19:58'),
(7, 'santa fe 2010 ', 30000, 700000, 'Automatic', 'Fuel', 'http://www.gofix.rw/android/images/santa1.jpg', 'http://www.gofix.rw/android/images/santa2.jpg', 'http://www.gofix.rw/android/images/santa3.jpg', 10, '0785304693', 'KK 2 strt kigali Rwanda', '2020-11-25 12:19:58'),
(8, 'santa fe 2010 ', 30000, 700000, 'Automatic', 'Fuel', 'http://www.gofix.rw/android/images/santa1.jpg', 'http://www.gofix.rw/android/images/santa2.jpg', 'http://www.gofix.rw/android/images/santa3.jpg', 10, '0785304693', 'KK 2 strt kigali Rwanda', '2020-11-25 12:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rental_co`
--

CREATE TABLE `tbl_rental_co` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_owner` varchar(255) NOT NULL,
  `shop_phone` varchar(15) NOT NULL,
  `shop_adress` varchar(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `origin` varchar(10) NOT NULL DEFAULT 'App'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rental_co`
--

INSERT INTO `tbl_rental_co` (`shop_id`, `shop_name`, `shop_owner`, `shop_phone`, `shop_adress`, `user_id`, `status`, `created_at`, `origin`) VALUES
(1, 'tomtransfers', 'mugisha aimable', '0785236459', 'kk 2st kiga', '21', 1, '2020-10-02 07:17:39', 'App'),
(2, 'kiki kinu', 'mugisha bosuko', '0789645213495', 'kigali Rwan', '21', 1, '2020-10-02 07:47:06', 'App'),
(3, 'imland', 'jules', '0785304693', 'kk 2st', '21', 1, '2020-10-02 07:17:46', 'App'),
(4, 'duhahe', 'Mugisha Jules  ', '232231', 'akfda', '11 ', 1, '2020-11-05 13:44:50', 'App'),
(5, 'duhahe', 'Mugisha Jules  ', '232231', 'akfda', '11 ', 0, '2020-11-05 13:47:59', 'web');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requests`
--

CREATE TABLE `tbl_requests` (
  `req_id` int(11) NOT NULL,
  `utility` varchar(20) NOT NULL,
  `agent` varchar(20) NOT NULL,
  `province` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_service` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `status_def` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_requests`
--

INSERT INTO `tbl_requests` (`req_id`, `utility`, `agent`, `province`, `district`, `agent_id`, `user_id`, `date_service`, `contact`, `created`, `status`, `status_def`) VALUES
(1, 'Repair', 'Garage', 'Kigali city', 'Kicukiro', 1, 21, '9/25/2020', '0785304693', '2020-10-13 06:28:18', 0, 'Served'),
(2, 'Repair', 'Garage', 'Kigali city', 'Kicukiro', 1, 21, '9/30/2020', '0785304693', '2020-10-13 06:28:28', 1, 'Served'),
(3, 'Repair', 'private mechanician', 'Kigali city', 'Kicukiro', 4, 21, '9/29/2020', '0785304693', '2020-09-25 12:47:24', 0, ''),
(4, 'Repair', 'private mechanician', 'Kigali city', 'Kicukiro', 4, 21, '11/20/2020', '0785304693', '2020-11-19 18:38:38', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `role_name`) VALUES
(1, 'Car owner'),
(2, 'Private mec'),
(3, 'Garage'),
(4, 'Spare part '),
(5, 'Car rental'),
(6, 'Assurance');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shops`
--

CREATE TABLE `tbl_shops` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_tin` varchar(15) NOT NULL,
  `shop_owner` varchar(255) NOT NULL,
  `shop_phone` varchar(15) NOT NULL,
  `shop_adress` varchar(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `origin` varchar(10) NOT NULL DEFAULT 'App'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shops`
--

INSERT INTO `tbl_shops` (`shop_id`, `shop_name`, `shop_tin`, `shop_owner`, `shop_phone`, `shop_adress`, `user_id`, `status`, `created_at`, `origin`) VALUES
(1, 'ivivg', '', '', '', '', '0', 1, '2020-10-02 07:56:21', 'App'),
(2, 'ufuf', 'jcufuf', '', '', '', '0', 1, '2020-10-02 07:32:05', 'App'),
(3, 'gujchf', 'xhchhc', 'ucjjf', '', '', '0', 0, '2020-09-01 11:21:37', 'App'),
(4, 'biivugg', 'uvy yvv', 'vjbuuvv', '6606082828', 'guy', '0', 0, '2020-09-01 11:22:21', 'App'),
(5, 'jcucu', 'cjjcuc', 'chh. h', '838338', 'cuxzt', '0', 1, '2020-10-07 13:58:48', 'App'),
(6, 'biuguf', 'xhhxgxy', 'gjcjvj', '6086645465', 'xhhcy', 'ubckwqsd_ubckwqsd', 1, '2020-10-07 07:27:52', 'App'),
(7, 'cjjcuc', 'gzgxgx', 'gxgxhx', '68685668', 'hxycyc', '', 1, '2020-10-02 07:30:45', 'App'),
(8, 'kvkvi', 'cjjcuc', 'cnjccju', '68686583', 'cjcjcjc', '', 1, '2020-10-02 07:09:55', 'App'),
(9, 'ifif', 'jcuff', 'n vkv', '686866', 'cjfu', '', 1, '2020-10-02 07:10:24', 'App'),
(10, 'cujff', 'fuucyc', 'bxhcyc', '68683556', 'cfyydrur', 'mugisha@gmail.com', 1, '2020-10-02 07:10:14', 'App'),
(11, 'fjfufu', 'j kvkv', 'vjjvch', '098988668', ' hchc h', '21', 1, '2020-10-02 06:51:03', 'App'),
(12, 'keza shop', '1029447', 'kirezi', '0785632960', 'kk 2st kabo', '21', 1, '2020-10-13 06:29:47', 'App'),
(13, 'Rwanda spare parts', '', 'Mugisha Jules  ', '232231', 'akfda', '11 ', 1, '2020-11-04 14:25:05', 'web'),
(14, 'Jules Spares', '123456789', 'Mugisha Jules  ', '2322318653', 'kk 2st rwan', '11 ', 1, '2020-12-15 14:57:36', 'web');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spares`
--

CREATE TABLE `tbl_spares` (
  `spareid` int(11) NOT NULL,
  `sparename` varchar(255) NOT NULL,
  `spareprice` int(11) NOT NULL,
  `sparedescription` varchar(255) NOT NULL,
  `shopid` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `types` varchar(20) NOT NULL DEFAULT 'spares',
  `origin` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_spares`
--

INSERT INTO `tbl_spares` (`spareid`, `sparename`, `spareprice`, `sparedescription`, `shopid`, `image`, `phone`, `address`, `created_at`, `types`, `origin`) VALUES
(11, 'bahizi item', 2000, 'rsgfg', 14, 'http://gofix.rw/Administrator/uploads/4454_passportPic.jpg', '2322318653', 'kk 2st rwan', '2020-12-15 11:04:10', 'spares', 'web');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `origin` varchar(10) NOT NULL DEFAULT 'App'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `Firstname`, `Lastname`, `email`, `phone`, `password`, `user_type`, `created_at`, `origin`) VALUES
(26, 'Ntwari', 'Jean Bosco', 'jntwari@andrew.cmu.edu', '0788569632', '123', '', '2020-09-07 18:10:29', 'App'),
(27, 'ndhd', 'bsbdbd', 'ntwarijb@gmail.com', '849768', '123', 'Ukodesha Imodoka', '2020-09-07 18:12:01', 'App'),
(21, 'jules', 'mugisha', 'mugisha@gmail.com', '0785304693', '123', '', '2020-09-01 10:40:33', 'App'),
(28, 'Fiacre', 'Iradukunda', 'fiacre12@gmail.com', '0785636363', '123', 'Car owner', '2020-09-14 12:14:37', 'App'),
(29, 'Tresor ', 'Testing', 'tresor1@gmail.com', '0789232034', '12345', 'Car owner', '2020-09-22 08:51:28', 'App'),
(30, 'Murokore', 'Egide', 'murokore@egide.com', '07856321245', '123', '123', '2020-10-09 07:55:15', 'App'),
(31, 'Claudel', 'NIYONZIMA', 'claudeln90@outlook.com', '0788674647', 'masase##90', 'Car owner', '2020-11-12 09:23:54', 'App');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `user_role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`user_role_id`, `user_id`, `role_id`, `status`) VALUES
(16, 10, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(900) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `origin` varchar(10) NOT NULL DEFAULT 'web'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `email`, `password`, `mobile`, `address1`, `created`, `origin`) VALUES
(11, 'Mugisha Jules ', 'mai@gmail.com', 'Julesle2020', '0785604563', 'kigali city', '2020-11-04 10:30:22', 'web'),
(12, 'karekezi', 'ka@gmail.com', '123JULES@', '0876532213', 'KIGALI', '2020-11-16 16:22:04', 'web');

-- --------------------------------------------------------

--
-- Table structure for table `web_products`
--

CREATE TABLE `web_products` (
  `spareid` int(11) NOT NULL,
  `sparename` varchar(255) NOT NULL,
  `spareprice` int(11) NOT NULL,
  `sparedescription` varchar(255) NOT NULL,
  `shopid` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `types` varchar(20) NOT NULL DEFAULT 'electronics',
  `origin` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_products`
--

INSERT INTO `web_products` (`spareid`, `sparename`, `spareprice`, `sparedescription`, `shopid`, `image`, `phone`, `address`, `created_at`, `types`, `origin`) VALUES
(1, 'testElectronics 1010', 34000, 'Igicuruzwa kiza', 16, 'http://gofix.rw/Administrator/uploads/288_passportPic.jpg', '232231', 'kk 2st rwan', '2020-11-09 09:14:21', 'electronics', 'web'),
(2, 'testElectronics 1011', 34000, 'iyi ni test ya kabiri', 16, 'http://gofix.rw/Administrator/uploads/1516_passportPic.jpg', '232231', 'kk 2st rwan', '2020-11-09 09:17:00', 'electronics', 'web'),
(3, 'Gearbox Rava', 34000, 'ni gearbox ya Rava 2012', 14, 'http://gofix.rw/Administrator/uploads/1338_passportPic.jpg', '2322318653', 'kk 2st rwan', '2020-11-09 12:55:06', 'spares', 'web'),
(9, 'Gucci bag', 34000, 'dthnhghdjgd', 0, 'http://gofix.rw/Administrator/uploads/9112_passportPic.jpg', '', '', '2020-11-09 14:10:14', 'other', 'web'),
(10, 'Gucci bag', 34000, 'dthnhghdjgd', 2, 'http://gofix.rw/Administrator/uploads/5710_passportPic.jpg', '0785603214', 'Kigali ku m', '2020-11-09 14:11:33', 'other', 'web'),
(11, 'testing products4444', 22000, 'rruuwetu', 1, 'http://gofix.rw/Administrator/uploads/9951_passportPic.png', '', '', '2020-11-16 16:13:24', 'electronics', 'web'),
(12, 'bahizi item', 2000, 'rsgfg', 14, 'http://gofix.rw/Administrator/uploads/4454_passportPic.jpg', '2322318653', 'kk 2st rwan', '2020-12-15 11:04:10', 'spares', 'web');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_booking`
--
ALTER TABLE `car_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `dashlogin`
--
ALTER TABLE `dashlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electronics_request_tbl`
--
ALTER TABLE `electronics_request_tbl`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `homedashboard`
--
ALTER TABLE `homedashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_request_tbl`
--
ALTER TABLE `other_request_tbl`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `spare_request_tbl`
--
ALTER TABLE `spare_request_tbl`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`),
  ADD KEY `fk_tbl_district_tbl_province1_idx` (`province_id`);

--
-- Indexes for table `tbl_drivers`
--
ALTER TABLE `tbl_drivers`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `tbl_electronics`
--
ALTER TABLE `tbl_electronics`
  ADD PRIMARY KEY (`spareid`);

--
-- Indexes for table `tbl_eloshop`
--
ALTER TABLE `tbl_eloshop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `tbl_garage`
--
ALTER TABLE `tbl_garage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mechanician`
--
ALTER TABLE `tbl_mechanician`
  ADD UNIQUE KEY `mec_id` (`id`);

--
-- Indexes for table `tbl_other_shops`
--
ALTER TABLE `tbl_other_shops`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `tbl_province`
--
ALTER TABLE `tbl_province`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tbl_rentals`
--
ALTER TABLE `tbl_rentals`
  ADD PRIMARY KEY (`rent_id`);

--
-- Indexes for table `tbl_rental_co`
--
ALTER TABLE `tbl_rental_co`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_shops`
--
ALTER TABLE `tbl_shops`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `tbl_spares`
--
ALTER TABLE `tbl_spares`
  ADD PRIMARY KEY (`spareid`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`user_role_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `web_products`
--
ALTER TABLE `web_products`
  ADD PRIMARY KEY (`spareid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `car_booking`
--
ALTER TABLE `car_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dashlogin`
--
ALTER TABLE `dashlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `electronics_request_tbl`
--
ALTER TABLE `electronics_request_tbl`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `homedashboard`
--
ALTER TABLE `homedashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `other_request_tbl`
--
ALTER TABLE `other_request_tbl`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `spare_request_tbl`
--
ALTER TABLE `spare_request_tbl`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_drivers`
--
ALTER TABLE `tbl_drivers`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_electronics`
--
ALTER TABLE `tbl_electronics`
  MODIFY `spareid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_eloshop`
--
ALTER TABLE `tbl_eloshop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_garage`
--
ALTER TABLE `tbl_garage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_mechanician`
--
ALTER TABLE `tbl_mechanician`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_other_shops`
--
ALTER TABLE `tbl_other_shops`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_province`
--
ALTER TABLE `tbl_province`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_rentals`
--
ALTER TABLE `tbl_rentals`
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_rental_co`
--
ALTER TABLE `tbl_rental_co`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_shops`
--
ALTER TABLE `tbl_shops`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_spares`
--
ALTER TABLE `tbl_spares`
  MODIFY `spareid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `web_products`
--
ALTER TABLE `web_products`
  MODIFY `spareid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

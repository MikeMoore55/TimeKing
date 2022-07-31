-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 31, 2022 at 09:37 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timekings_db`
--
CREATE DATABASE IF NOT EXISTS `timekings_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `timekings_db`;

-- --------------------------------------------------------

--
-- Table structure for table `cart_info`
--

CREATE TABLE IF NOT EXISTS `cart_info` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_user` varchar(100) NOT NULL,
  `cart_products` varchar(2000) NOT NULL,
  `cart_total` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE IF NOT EXISTS `product_info` (
  `watch_id` int(100) NOT NULL AUTO_INCREMENT,
  `watch_name` varchar(300) NOT NULL,
  `watch_desc` varchar(1000) NOT NULL,
  `watch_price` int(100) NOT NULL,
  `watch_rating` int(10) NOT NULL,
  `watch_qty` int(100) NOT NULL,
  `watch_pic` varchar(200) NOT NULL,
  `watch_available` varchar(100) NOT NULL,
  PRIMARY KEY (`watch_id`),
  UNIQUE KEY `watch_pic` (`watch_pic`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`watch_id`, `watch_name`, `watch_desc`, `watch_price`, `watch_rating`, `watch_qty`, `watch_pic`, `watch_available`) VALUES
(1, 'Rolex Submariner Blue Dial', 'This is a Rolex Submariner Blue Dial. It has a 40mm Yellow Gold case, Blue dial on a Yellow Gold Bracelet. The watch is powered by Automatic movement.', 689900, 10, 1, 'rolex-submariner-blue-dial.webp', 'true'),
(2, 'Rolex Datejust 41', 'This is a Rolex Datejust 41. It has a 41mm Stainless Steel Case, Blue Baton Dial on a Stainless Steel (Jubilee) Bracelet. The watch is powered by Automatic movement. ', 169900, 7, 9, 'rolex-datejust-41.webp', 'true'),
(3, 'TAG HEUER PROFESSIONAL GOLF', 'This is a Tag Heuer Professional Golf. It has a 37 mm Stainless Steel & Titanium case, Black dial on a Black Rubber Strap. This watch is powered by Quartz movement.', 13900, 5, 4, 'tag-heur-pro-golf.webp', 'false'),
(4, 'EBEL 911 TEKTON', 'This is a Pre-Owned Ebel 911 Tekton. It has a 49mm Titanium case, Black dial on a Black Rubber Strap. This watch is powered by Automatic movement. ', 240000, 6, 12, 'ebel-911.webp', 'true'),
(5, 'PANERAI SUBMERSIBLE CHRONO GUILLAUME NERY EDITION', 'This is a Panerai Submersible Chrono Guillaume Nery Edition, limited edition. It has a 47mm Titanium case, Grey dial on a Blue Rubber Strap. The watch is powered by Automatic movement. ', 229000, 9, 3, 'panerai.webp', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_surname` varchar(255) NOT NULL,
  `user_displayname` varchar(20) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_password` (`user_password`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `user_name`, `user_surname`, `user_displayname`, `user_email`, `user_password`) VALUES
(1, 'Michael', 'Moore', 'MrM17', 'michaelwillemmoore@gmail.com', 'BigM17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

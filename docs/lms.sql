-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2014 at 04:57 AM
-- Server version: 5.6.11-log
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appusers`
--

CREATE TABLE IF NOT EXISTS `appusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `address` varchar(60) DEFAULT NULL,
  `registration_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `mobile_no_UNIQUE` (`mobile_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `appusers`
--

INSERT INTO `appusers` (`id`, `username`, `password`, `email`, `mobile_no`, `address`, `registration_date`) VALUES
(2, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'ktiwari601@gmail.com', '9900473433', 'A-331, Reva Boys Hostel', '2014-02-27'),
(3, 'Kritya Mishra', 'd41d8cd98f00b204e9800998ecf8427e', '', '9411145222', '', '2014-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(20) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `reg_date` date NOT NULL,
  `sex` int(2) NOT NULL,
  `age_range` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `fullname`, `contact_no`, `reg_date`, `sex`, `age_range`) VALUES
(1, 'Kritya Mishra', '95234643664', '2014-03-02', 1, 1),
(2, 'Ravi Teja', '93453462346', '2014-03-02', 0, 2),
(3, 'Sahil Chatta', '9494949494', '2014-03-02', 0, 1),
(4, 'Shikher Manhas', '9495949595', '2014-03-02', 0, 1),
(5, 'Karan Nath', '9150492906', '2014-03-02', 0, 1),
(6, 'Arnab Barua', '9122490865', '2014-03-02', 1, 1),
(7, 'Umang Chamaria', '9900564534', '2014-03-03', 0, 1),
(8, 'Sayantan Banerjee', '9900876543', '2014-03-03', 0, 1),
(9, 'ABC', '9900674512', '2014-03-03', 0, 1),
(10, 'Prankur Dixit', '99000463412', '2014-03-04', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clothes`
--

CREATE TABLE IF NOT EXISTS `clothes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `laundry_rate` double NOT NULL,
  `dryclean_rate` double NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `clothes`
--

INSERT INTO `clothes` (`id`, `category_id`, `name`, `laundry_rate`, `dryclean_rate`) VALUES
(1, 1, 'Dhoti', 15, 25),
(2, 1, 'Glove', 5, 10),
(3, 1, 'Jacket', 30, 60),
(4, 1, 'Jeans', 15, 30),
(5, 1, 'Shirt', 15, 30),
(6, 1, 'T-Shirt', 10, 20),
(7, 1, 'Jersey', 10, 25),
(8, 1, 'Pullover', 25, 50),
(9, 1, 'Cardigan', 25, 50),
(10, 1, 'Blazer', 100, 200),
(11, 1, 'Kurta', 30, 70),
(12, 1, 'Sherwani', 80, 180),
(13, 1, 'Pajamas', 15, 30),
(14, 1, 'Trousers', 25, 40),
(15, 1, 'Jumpsuit', 30, 50),
(16, 1, 'Suit', 70, 130),
(17, 1, 'Men''s Shorts', 10, 20),
(18, 1, 'Tanks', 10, 15),
(19, 1, 'Short Sleeve Shirt', 15, 25),
(20, 1, 'Sweatshirt', 30, 50),
(21, 1, 'Night Gown', 30, 50),
(22, 1, 'Sweater', 35, 55),
(23, 1, 'Bathrobe', 40, 60),
(24, 2, 'Saree', 50, 80),
(25, 2, 'Skirt', 25, 40),
(26, 2, 'Dress', 60, 100),
(27, 2, 'Salwaar', 30, 50),
(28, 2, 'Kurti', 40, 60),
(29, 2, 'Tunics', 30, 50),
(30, 2, 'Top', 30, 50),
(31, 2, 'Leggings', 35, 60),
(32, 2, 'Maternity Wear', 40, 70),
(33, 2, 'Suit Sets', 35, 55),
(34, 2, 'Stole and Scarves', 20, 30),
(35, 2, 'Shrugs', 30, 50),
(36, 3, 'Bedsheets', 40, 70),
(37, 3, 'Curtains', 100, 170),
(38, 3, 'Towel', 30, 60),
(39, 3, 'Cushion Covers', 40, 80),
(40, 3, 'Carpets', 270, 400),
(41, 3, 'Rugs', 100, 170),
(42, 3, 'Sofa Covers', 140, 250),
(43, 3, 'Quilts', 250, 400);

-- --------------------------------------------------------

--
-- Table structure for table `job_order`
--

CREATE TABLE IF NOT EXISTS `job_order` (
  `id` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `submission_date` date NOT NULL,
  `expected_delivery_date` date NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `amount` double NOT NULL,
  `delivery_status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `userId_idx` (`user_id`),
  KEY `client_id` (`client_id`),
  KEY `client_id_2` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_order`
--

INSERT INTO `job_order` (`id`, `user_id`, `client_id`, `submission_date`, `expected_delivery_date`, `total_quantity`, `amount`, `delivery_status`) VALUES
('53132243bd853', 2, 2, '2014-02-20', '2014-02-22', 1, 15, 2),
('53132243bd854', 2, 1, '2014-02-13', '2014-02-15', 1, 15, 1),
('53132243bd855', 2, 2, '2014-03-02', '2014-03-04', 5, 210, 1),
('531328579f9bb', 2, 1, '2014-03-02', '2014-03-04', 7, 550, 0),
('531338891f367', 2, 1, '2014-03-02', '2014-03-04', 5, 340, 0),
('53134edb7af8a', 2, 1, '2014-03-02', '2014-03-04', 7, 300, 0),
('53135e0b4bbbf', 2, 3, '2014-03-02', '2014-03-04', 9, 125, 0),
('53135e3219ae8', 2, 4, '2014-03-02', '2014-03-04', 10, 1000, 1),
('53135e5929b11', 2, 5, '2014-03-02', '2014-03-04', 7, 280, 0),
('53135e7b257f4', 2, 6, '2014-03-02', '2014-03-04', 4, 300, 0),
('53135e91c430e', 2, 6, '2014-03-02', '2014-03-04', 3, 140, 0),
('53136b83836fc', 2, 5, '2014-03-02', '2014-03-04', 6, 110, 2),
('5314654558c2f', 2, 7, '2014-03-03', '2014-03-05', 11, 570, 0),
('531466e63af5f', 2, 2, '2014-03-03', '2014-03-05', 6, 85, 1),
('5314a3b94cf1c', 2, 8, '2014-03-03', '2014-03-05', 6, 400, 0),
('5314a4bf12ed9', 2, 8, '2014-03-03', '2014-03-05', 6, 400, 0),
('5314b9d08c606', 2, 9, '2014-03-03', '2014-03-05', 5, 430, 0),
('5314b9f0d3031', 2, 9, '2014-03-03', '2014-03-05', 5, 430, 1),
('5314be47a864a', 2, 1, '2014-03-03', '2014-03-05', 3, 215, 2),
('5315ef635a7ca', 2, 10, '2014-03-04', '2014-03-06', 3, 75, 2),
('5315efd028161', 2, 10, '2014-03-04', '2014-03-06', 6, 400, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `job_order_id` varchar(20) NOT NULL,
  `cloth_name` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double NOT NULL,
  `order_type` int(11) NOT NULL,
  KEY `job_order_id_idx` (`job_order_id`),
  KEY `cloth_name` (`cloth_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`job_order_id`, `cloth_name`, `quantity`, `amount`, `order_type`) VALUES
('53132243bd855', 'Dhoti', 2, 30, 0),
('53132243bd855', 'Jacket', 1, 60, 1),
('53132243bd855', 'Kurti', 2, 120, 1),
('531328579f9bb', 'Dhoti', 2, 30, 0),
('531328579f9bb', 'Salwaar', 4, 120, 0),
('531328579f9bb', 'Carpets', 1, 400, 1),
('531338891f367', 'Saree', 1, 80, 1),
('531338891f367', 'Dress', 2, 200, 1),
('531338891f367', 'Salwaar', 1, 30, 0),
('531338891f367', 'Top', 1, 30, 0),
('53134edb7af8a', 'Glove', 2, 10, 0),
('53134edb7af8a', 'Jeans', 2, 30, 0),
('53134edb7af8a', 'Dress', 1, 60, 0),
('53134edb7af8a', 'Curtains', 2, 200, 0),
('53135e0b4bbbf', 'Shirt', 1, 15, 0),
('53135e0b4bbbf', 'T-Shirt', 4, 40, 0),
('53135e0b4bbbf', 'Jersey', 2, 20, 0),
('53135e0b4bbbf', 'Trousers', 2, 50, 0),
('53135e3219ae8', 'Blazer', 10, 1000, 0),
('53135e5929b11', 'Skirt', 1, 40, 1),
('53135e5929b11', 'Dress', 2, 120, 0),
('53135e5929b11', 'Top', 4, 120, 0),
('53135e7b257f4', 'Bedsheets', 1, 70, 1),
('53135e7b257f4', 'Curtains', 2, 200, 0),
('53135e7b257f4', 'Towel', 1, 30, 0),
('53135e91c430e', 'Kurti', 2, 80, 0),
('53135e91c430e', 'Leggings', 1, 60, 1),
('53136b83836fc', 'Glove', 4, 20, 0),
('53136b83836fc', 'Jeans', 1, 30, 1),
('53136b83836fc', 'Dress', 1, 60, 0),
('5314654558c2f', 'Dhoti', 4, 60, 0),
('5314654558c2f', 'Jacket', 1, 60, 1),
('5314654558c2f', 'Kurti', 3, 120, 0),
('5314654558c2f', 'Bedsheets', 2, 80, 0),
('5314654558c2f', 'Quilts', 1, 250, 0),
('531466e63af5f', 'Shirt', 5, 75, 0),
('531466e63af5f', 'T-Shirt', 1, 10, 0),
('5314a3b94cf1c', 'T-Shirt', 3, 30, 0),
('5314a3b94cf1c', 'Salwaar', 1, 30, 0),
('5314a3b94cf1c', 'Curtains', 2, 340, 1),
('5314a4bf12ed9', 'T-Shirt', 3, 30, 0),
('5314a4bf12ed9', 'Salwaar', 1, 30, 0),
('5314a4bf12ed9', 'Curtains', 2, 340, 1),
('5314b9d08c606', 'Jacket', 2, 60, 0),
('5314b9d08c606', 'Top', 1, 30, 0),
('5314b9d08c606', 'Curtains', 2, 340, 1),
('5314b9f0d3031', 'Jacket', 2, 60, 0),
('5314b9f0d3031', 'Top', 1, 30, 0),
('5314b9f0d3031', 'Curtains', 2, 340, 1),
('5314be47a864a', 'Jeans', 1, 15, 0),
('5314be47a864a', 'Dress', 2, 200, 1),
('5315ef635a7ca', 'Pullover', 2, 50, 0),
('5315efd028161', 'Jeans', 4, 60, 0),
('5315efd028161', 'Curtains', 2, 340, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_order`
--
ALTER TABLE `job_order`
  ADD CONSTRAINT `job_order_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `appusers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`job_order_id`) REFERENCES `job_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`cloth_name`) REFERENCES `clothes` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

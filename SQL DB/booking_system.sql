-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 01, 2023 at 03:08 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `chef_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time_slot` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `chef_id`, `customer_id`, `date`, `time_slot`, `status`) VALUES
(1, 1, 2, '2023-04-29', '9:00-11:00', 'Pending'),
(2, 3, 2, '2023-04-29', '11:00-13:00', 'Pending'),
(3, 4, 2, '2023-05-04', '11:00-13:00', 'Pending'),
(4, 1, 2, '2023-05-03', '14:00-16:00', 'Approved'),
(5, 1, 2, '2023-05-17', '11:00-13:00', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstName`, `lastName`, `email`, `user_type`, `password`) VALUES
(1, 'Amey', 'Gaonkar', 'amey@chef.com', 'chef', '12345678'),
(2, 'Rohan', 'Dessai', 'rohan@cust.in', 'customer', 'qwertyui'),
(3, 'Sanjeet', 'Kumar', 'sanjeet@chef.com', 'chef', 'asdfghjk'),
(4, 'Josly', '', 'josly@chef.com', 'chef', 'zxcvbnm,');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

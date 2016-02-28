-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2015 at 09:27 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `green`
--
CREATE DATABASE IF NOT EXISTS `green` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `green`;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `sno` int(200) NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`sno`, `uname`, `date`) VALUES
(1, 'alekhya', '2015-07-16'),
(2, 'harika', '2015-07-16'),
(3, 'ashok babu', '2015-07-16'),
(4, 'sahithi', '2015-07-16'),
(5, 'cellus', '2015-07-16'),
(13, 'sahithi', '2015-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `sno` int(200) NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `account` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `lastDate` date NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `uname`, `pwd`, `email`, `account`, `phone`, `address`, `lastDate`) VALUES
(1, 'alekhya', 'alekhya', 'alekhya@gmail.com', '12131A1249', '9573719019', 'karuparthi Alekhya,door_no:12-65,pedana', '2015-07-16'),
(2, 'harika', 'harika', 'harika@gmail.com', '12131A1224', '9160899349', 'dasari navya harika,d/o. vimala kumari,Guntur', '2015-07-16'),
(3, 'ashok babu', 'ashok', 'ashok@gmail.com', '12131A1207', '9989383789', 'ashok babu,door_no:12-68,Guntur', '2015-07-16'),
(4, 'sahithi', 'sahithi', 'sahi@gmail.com', '12131A1216', '9988776655', 'sahithi,door.no:13-64,vijayawada.', '2015-07-16'),
(5, 'cellus', 'cellus', 'cellus@gmail.com', '12131A1254', '9876543210', 'monica cellus kondru,mangalagiri,guntur.', '2015-07-16'),
(14, 'sahithi', 'sahithi', 'sahi.2512@gmail.com', '12131A1216', '7382697736', 'Araja Venkata Chalapathi Rao (Horlicks Chalapathi) , Pedakallepalli, Mopidevi Mandal, Krishna Dist', '2015-07-16'),
(15, 'sahithi bulusu', 'sahithi', 'sahi.2512@gmail.com', '12131A1216', '7382697736', 'Araja Venkata Chalapathi Rao (Horlicks Chalapathi) , Pedakallepalli, Mopidevi Mandal, Krishna Dist', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

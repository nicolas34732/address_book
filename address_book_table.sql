-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 14, 2015 at 10:46 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `address_book_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_book_table`
--

CREATE TABLE IF NOT EXISTS `address_book_table` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Required.',
  `company` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL COMMENT 'Required.',
  `email` varchar(255) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `address_book_table`
--

INSERT INTO `address_book_table` (`id`, `name`, `company`, `address`, `phone`, `email`, `notes`) VALUES
(1, 'Name Aaa Aaa', 'Company Aaaa', '111 Aaaa Street AA1 1AA', '11111111', 'name1a@company1a.com', 'Notes for Name Aaa Aaa.'),
(2, 'Name Bbb Bbb', 'Company Bbbb', '222 Bbbb Street BB2 2BB', '22222222', 'name2b@company2b.com', ''),
(3, 'Name Ccc Ccc', 'Company Cccc', '333 Cccc Street CC3 3CC', '33333333', 'name3c@company3c.com', ''),
(4, 'Name Ddd Ddd', 'Company Dddd', '', '44444444', '', ''),
(5, 'Name Eee Eee', '', '', '55555555', '', ''),
(6, 'test', '', '', '31231312', 'sadsadsa@aasa.com', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

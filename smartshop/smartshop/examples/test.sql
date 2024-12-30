-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2014 at 08:12 PM
-- Server version: 5.1.58
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `fruits`
--

CREATE TABLE IF NOT EXISTS `fruits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `fruits`
--

INSERT INTO `fruits` (`id`, `name`) VALUES(1, 'πορτοκάλι');
INSERT INTO `fruits` (`id`, `name`) VALUES(2, 'μανταρίνι');
INSERT INTO `fruits` (`id`, `name`) VALUES(3, 'μπανάνα');
INSERT INTO `fruits` (`id`, `name`) VALUES(4, 'ανανάς');
INSERT INTO `fruits` (`id`, `name`) VALUES(5, 'βερύκοκο');
INSERT INTO `fruits` (`id`, `name`) VALUES(6, 'αχλάδι');
INSERT INTO `fruits` (`id`, `name`) VALUES(7, 'μήλο');
INSERT INTO `fruits` (`id`, `name`) VALUES(8, 'ροδάκινο');
INSERT INTO `fruits` (`id`, `name`) VALUES(9, 'δαμάσκηνο');
INSERT INTO `fruits` (`id`, `name`) VALUES(10, 'σύκο');
INSERT INTO `fruits` (`id`, `name`) VALUES(11, 'κυδώνι');
INSERT INTO `fruits` (`id`, `name`) VALUES(12, 'κεράσι');
INSERT INTO `fruits` (`id`, `name`) VALUES(13, 'γερμάς');
INSERT INTO `fruits` (`id`, `name`) VALUES(14, 'νεκταρίνι');
INSERT INTO `fruits` (`id`, `name`) VALUES(15, 'βανίλια');
INSERT INTO `fruits` (`id`, `name`) VALUES(16, 'μύρτιλα');
INSERT INTO `fruits` (`id`, `name`) VALUES(17, 'κράνα');
INSERT INTO `fruits` (`id`, `name`) VALUES(18, 'ρόδι');
INSERT INTO `fruits` (`id`, `name`) VALUES(19, 'λωτός');
INSERT INTO `fruits` (`id`, `name`) VALUES(20, 'αρώνια');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fname`, `lname`) VALUES(1, 'Nikitas', 'Karanikolas');
INSERT INTO `members` (`id`, `fname`, `lname`) VALUES(3, 'Veni', 'Tsaprali');
INSERT INTO `members` (`id`, `fname`, `lname`) VALUES(5, 'Iordanis', 'Iordanakis');
INSERT INTO `members` (`id`, `fname`, `lname`) VALUES(6, 'Lakis', 'Lalakis');
INSERT INTO `members` (`id`, `fname`, `lname`) VALUES(7, 'George', 'Georgiou');
INSERT INTO `members` (`id`, `fname`, `lname`) VALUES(9, 'Βένη', 'Τσαπραλή');
INSERT INTO `members` (`id`, `fname`, `lname`) VALUES(10, 'Panagiotis', 'Panagiotou');
INSERT INTO `members` (`id`, `fname`, `lname`) VALUES(11, 'Γεώργιος', 'Γεωργίου');
INSERT INTO `members` (`id`, `fname`, `lname`) VALUES(12, 'Ευθυμία', 'Ευθυμίου');

-- --------------------------------------------------------

--
-- Table structure for table `name`
--

CREATE TABLE IF NOT EXISTS `name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `name`
--

INSERT INTO `name` (`id`, `name`) VALUES(1, 'Nikitas');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2014 at 09:17 PM
-- Server version: 5.5.32-31.0-log
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `weekendc_cigars`
--

-- --------------------------------------------------------

--
-- Table structure for table `cigars`
--

CREATE TABLE IF NOT EXISTS `cigars` (
  `cID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `size` varchar(20) NOT NULL,
  `strength` tinyint(4) NOT NULL,
  `wrapper` varchar(20) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` longtext NOT NULL,
  `makerID` mediumint(9) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cigars`
--

INSERT INTO `cigars` (`cID`, `name`, `size`, `strength`, `wrapper`, `price`, `description`, `makerID`, `timestamp`) VALUES
(1, 'AB Mundial', 'Perfecto', 4, 'Honduras', '16', 'This smooth, spicy cigars has a nice even draw with hints of earth and leather.', 1, '0000-00-00 00:00:00'),
(2, 'Tempus', 'Torpedo', 4, 'Maduro', '11', 'This full flavored cigar is a great taste with a oily wrapper that burns well to the final puff.', 1, '2013-11-06 15:37:13'),
(5, 'RP 50th', 'Toro', 3, 'Maduro', '17', 'Best Cigar EVAR', 3, '0000-00-00 00:00:00'),
(6, '', '', 0, '', '0', '', 0, '0000-00-00 00:00:00'),
(7, 'Name', 'Size', 0, 'Wrapper', '0', 'Desc', 0, '0000-00-00 00:00:00'),
(8, 'Tarantino', '', 0, '', '0', '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `iID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `desc` blob NOT NULL,
  PRIMARY KEY (`iID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `makers`
--

CREATE TABLE IF NOT EXISTS `makers` (
  `mID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `location` varchar(70) NOT NULL,
  `year` year(4) NOT NULL,
  `factories` smallint(6) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`mID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `makers`
--

INSERT INTO `makers` (`mID`, `name`, `location`, `year`, `factories`, `timestamp`) VALUES
(1, 'Alec Bradley', ' Fort Lauderdale, FL', 1996, 1, '2013-11-06 15:13:09'),
(3, 'Rocky Patel', 'Naples, FL', 1995, 1, '2013-11-13 15:32:14'),
(4, 'Tarantino', 'Scranton', 1993, 12, '2013-12-07 19:07:42'),
(5, 'fdfsd', 'sadfads', 0000, 0, '2013-12-09 23:53:08'),
(6, '', '', 0000, 0, '2013-12-11 19:59:48'),
(7, '', '', 0000, 0, '2013-12-11 20:12:57'),
(8, '', '', 0000, 0, '2013-12-11 20:12:58'),
(9, '', '', 0000, 0, '2013-12-11 20:12:59'),
(10, '', '', 0000, 0, '2013-12-11 20:13:00'),
(11, '', '', 0000, 0, '2013-12-11 20:13:01'),
(12, '', '', 0000, 0, '2014-01-08 01:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE IF NOT EXISTS `shops` (
  `sID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `location` varchar(70) NOT NULL,
  `year` year(4) NOT NULL,
  `website` varchar(40) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sold_by`
--

CREATE TABLE IF NOT EXISTS `sold_by` (
  `sellID` int(11) NOT NULL AUTO_INCREMENT,
  `shopID` mediumint(9) NOT NULL,
  `cigarID` mediumint(9) NOT NULL,
  PRIMARY KEY (`sellID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

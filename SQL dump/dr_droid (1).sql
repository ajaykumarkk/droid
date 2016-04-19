-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2016 at 02:35 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dr_droid`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `Book_id` int(11) NOT NULL AUTO_INCREMENT,
  `Doc_id` varchar(10) DEFAULT NULL,
  `Usr_id` varchar(10) DEFAULT NULL,
  `Slot` int(11) DEFAULT NULL,
  `Approved` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`Book_id`),
  KEY `Usr_id` (`Usr_id`),
  KEY `Doc_id` (`Doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doclogin`
--

CREATE TABLE IF NOT EXISTS `doclogin` (
  `Doc_id` varchar(10) NOT NULL,
  `UserName` varchar(30) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doclogin`
--

INSERT INTO `doclogin` (`Doc_id`, `UserName`, `Password`) VALUES
('a', 'kk', '123');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `Doc_id` varchar(10) NOT NULL,
  `FirstName` varchar(15) DEFAULT NULL,
  `LastName` varchar(15) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `City` varchar(20) DEFAULT NULL,
  `Place` varchar(20) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Sex` varchar(1) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `MobileNo` varchar(10) DEFAULT NULL,
  `smc` varchar(10) DEFAULT NULL,
  `UniversityName` varchar(50) DEFAULT NULL,
  `Qualification` varchar(50) DEFAULT NULL,
  `QualificationYear` varchar(4) DEFAULT NULL,
  `Specialization` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Latitude` float DEFAULT NULL,
  `Longitude` float DEFAULT NULL,
  PRIMARY KEY (`Doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`Doc_id`, `FirstName`, `LastName`, `DOB`, `City`, `Place`, `Rating`, `Sex`, `email`, `MobileNo`, `smc`, `UniversityName`, `Qualification`, `QualificationYear`, `Specialization`, `Date`, `Latitude`, `Longitude`) VALUES
('123456', 'ajay', 'kk', '1980-04-13', 'bangalore', 'jayanagar', 5, 'm', 'ajaykk@gmail.com', '9482110438', 'karnataka', 'pes', 'MD', '2005', 'cardio', '2016-04-12', NULL, NULL),
('a', 'a', 'a', '2016-04-19', 'a', 'a', 4, 'm', 'a', '7', 'aa', 'a', 'a', '2011', 'a', '2016-04-06', NULL, NULL),
('d', 'AJAY KUMAR', 'K', '1996-03-25', 'TIRUPATI', 'tpt', NULL, 'm', 'ajaykumarkk77@gmail.com', '0948211043', 'Andhra Pra', 'd', 'a', '2011', 'dad', '2016-04-06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE IF NOT EXISTS `prescription` (
  `P_id` int(11) NOT NULL AUTO_INCREMENT,
  `Usr_id` varchar(10) DEFAULT NULL,
  `Doc_id` varchar(10) DEFAULT NULL,
  `Diagnosis` varchar(50) DEFAULT NULL,
  `Medicines` varchar(100) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Note` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`P_id`),
  KEY `Usr_id` (`Usr_id`),
  KEY `Doc_id` (`Doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`P_id`, `Usr_id`, `Doc_id`, `Diagnosis`, `Medicines`, `Date`, `Note`) VALUES
(1, '101', 'a', 'dd', 'dd', '2016-04-06', NULL),
(12, '101', 'a', 'd', 'a', '2016-04-14', 'assd'),
(13, '101', 'a', '555', 'dfg', '2016-04-26', ''),
(14, '101', 'a', '555', 'a', '2016-03-30', ''),
(15, '101', 'a', '555', 'a', '2016-03-30', ''),
(16, '101', 'a', '555', '123', '2016-04-12', '');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `user_rating` int(11) DEFAULT NULL,
  `Doc_id` varchar(10) DEFAULT NULL,
  `Usr_id` varchar(10) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Review` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Number`),
  KEY `Doc_id` (`Doc_id`),
  KEY `Usr_id` (`Usr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Usr_id` varchar(10) NOT NULL DEFAULT '',
  `Name` varchar(15) DEFAULT NULL,
  `Place` varchar(30) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Sex` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`Usr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Usr_id`, `Name`, `Place`, `City`, `DOB`, `Age`, `Sex`) VALUES
('101', 'asd', 'jayanagar', 'banglore', '1996-04-06', 20, 'm');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`Usr_id`) REFERENCES `user` (`Usr_id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`Doc_id`) REFERENCES `doctor` (`Doc_id`);

--
-- Constraints for table `doclogin`
--
ALTER TABLE `doclogin`
  ADD CONSTRAINT `doclogin_ibfk_1` FOREIGN KEY (`Doc_id`) REFERENCES `doctor` (`Doc_id`);

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`Usr_id`) REFERENCES `user` (`Usr_id`),
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`Doc_id`) REFERENCES `doctor` (`Doc_id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`Doc_id`) REFERENCES `doctor` (`Doc_id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`Usr_id`) REFERENCES `user` (`Usr_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

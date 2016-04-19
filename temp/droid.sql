-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2016 at 02:47 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `droid`
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
('123456', 'ajay', 'kk', '1980-04-13', 'bangalore', 'jayanagar', 5, 'm', 'ajaykk@gmail.com', '9482110438', 'karnataka', 'pes', 'MD', '2005', 'cardio', '2016-04-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE IF NOT EXISTS `prescription` (
  `P_id` int(11) NOT NULL AUTO_INCREMENT,
  `Usr_id` varchar(10) DEFAULT NULL,
  `Doc_id` varchar(10) DEFAULT NULL,
  `Diagnosis` varchar(50) DEFAULT NULL,
  `Medicines` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Note` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`P_id`),
  KEY `Usr_id` (`Usr_id`),
  KEY `Doc_id` (`Doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `User_name` varchar(15) DEFAULT NULL,
  `Place` varchar(30) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Sex` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`Usr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

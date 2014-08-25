-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2014 at 09:14 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE IF NOT EXISTS `buyer` (
  `idBUYER` int(11) NOT NULL AUTO_INCREMENT,
  `NO_ID` varchar(45) DEFAULT NULL,
  `BUY_NAME` varchar(45) DEFAULT NULL,
  `ADDRESS_BY_ID` varchar(45) DEFAULT NULL,
  `ADDRESS` varchar(45) DEFAULT NULL,
  `PHONE_NUM` varchar(45) DEFAULT NULL,
  `HP_NUM` varchar(45) DEFAULT NULL,
  `FAX_NUM` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idBUYER`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE IF NOT EXISTS `floor` (
  `FLOOR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FLOOR_NUMBER` varchar(45) DEFAULT NULL,
  `TOWER_ID` int(11) NOT NULL,
  `FLOOR_TYPE_ID` int(11) NOT NULL,
  PRIMARY KEY (`FLOOR_ID`),
  KEY `fk_FLOOR_TOWER1_idx` (`TOWER_ID`),
  KEY `fk_FLOOR_FLOOR_TYPE1_idx` (`FLOOR_TYPE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

-- --------------------------------------------------------

--
-- Table structure for table `floor_type`
--

CREATE TABLE IF NOT EXISTS `floor_type` (
  `FT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FLOOR_TYPE` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`FT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_hist`
--

CREATE TABLE IF NOT EXISTS `login_hist` (
  `LH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DATE` datetime DEFAULT NULL,
  `USER_USER_ID` int(11) NOT NULL,
  PRIMARY KEY (`LH_ID`),
  KEY `fk_LOGIN_HIST_USER1_idx` (`USER_USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `ORDER_ID` int(11) NOT NULL,
  `PRICE` double DEFAULT NULL,
  `DISCOUNT` double DEFAULT NULL,
  `DEAL_PRICE` double DEFAULT NULL,
  `PT_ID` int(11) NOT NULL,
  `BOOKING_FEE` double DEFAULT NULL,
  `BF_PT_ID` int(11) NOT NULL,
  `BF_DATE` date DEFAULT NULL,
  `REMAINING_BF` double DEFAULT NULL,
  `RM_DATE` date DEFAULT NULL,
  `ADVANCE_PAYMENT_1` double DEFAULT NULL,
  `AP1_DATE` date DEFAULT NULL,
  `ADVANCE_PAYMENT` double DEFAULT NULL,
  `PT_PERCENT` double DEFAULT NULL,
  `INSTALLMENT_1` varchar(45) DEFAULT NULL,
  `INSTALLMENT_2` varchar(45) DEFAULT NULL,
  `INSTALLMENT_PRICE` double DEFAULT NULL,
  `RM_PAYMENT_DATE` date DEFAULT NULL,
  `RM_INSTALLMENT_DATE_BEGIN` date DEFAULT NULL,
  `RM_INSTALLMENT_DATE_ENG` date DEFAULT NULL,
  `DATE_ORDER` date DEFAULT NULL,
  `M_USER_ID` int(11) NOT NULL,
  `MM_USER_ID` int(11) DEFAULT NULL,
  `ORDER_STATUS` varchar(45) DEFAULT NULL,
  `APPROVED_DATE` date DEFAULT NULL,
  `BUYER_idBUYER` int(11) NOT NULL,
  `ROOM_ROOM_ID` int(11) NOT NULL,
  PRIMARY KEY (`ORDER_ID`),
  KEY `fk_ORDER_PAYMENT_TYPE1_idx` (`PT_ID`),
  KEY `fk_ORDER_PAYMENT_TYPE2_idx` (`BF_PT_ID`),
  KEY `fk_ORDER_USER1_idx` (`M_USER_ID`),
  KEY `fk_ORDER_USER2_idx` (`MM_USER_ID`),
  KEY `fk_ORDER_BUYER1_idx` (`BUYER_idBUYER`),
  KEY `fk_ORDER_ROOM1_idx` (`ROOM_ROOM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE IF NOT EXISTS `payment_type` (
  `PT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PT_NAME` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`PT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `ROOM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ROOM_NUMBER` varchar(45) DEFAULT NULL,
  `ROOM_AREA_GROSS` varchar(45) DEFAULT NULL,
  `ROOM_AREA_NETT` varchar(45) DEFAULT NULL,
  `FLOOR_ID` int(11) NOT NULL,
  `WING_ID` int(11) DEFAULT NULL,
  `STATUS` varchar(45) DEFAULT NULL,
  `RT_ID` int(11) NOT NULL,
  `OWNER_idBUYER` int(11) DEFAULT NULL,
  PRIMARY KEY (`ROOM_ID`),
  KEY `fk_ROOM_FLOOR1_idx` (`FLOOR_ID`),
  KEY `fk_ROOM_WING1_idx` (`WING_ID`),
  KEY `fk_ROOM_ROOM_TYPE1_idx` (`RT_ID`),
  KEY `fk_ROOM_BUYER1_idx` (`OWNER_idBUYER`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE IF NOT EXISTS `room_type` (
  `RT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RT_NAME` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`RT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `tower`
--

CREATE TABLE IF NOT EXISTS `tower` (
  `TOWER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TOWER_NAME` varchar(45) DEFAULT NULL,
  `TOWER_TYPE_TT_ID` int(11) NOT NULL,
  PRIMARY KEY (`TOWER_ID`),
  KEY `fk_TOWER_TOWER_TYPE1_idx` (`TOWER_TYPE_TT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `tower_type`
--

CREATE TABLE IF NOT EXISTS `tower_type` (
  `TT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TT_TYPE` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`TT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `user2`
--

CREATE TABLE IF NOT EXISTS `user2` (
  `USER_ID` int(11) NOT NULL,
  `USER_NAME` varchar(45) DEFAULT NULL,
  `EMAIL_ADDRESS` varchar(45) DEFAULT NULL,
  `UT_ID` int(11) NOT NULL,
  `PASSWORD` varchar(64) DEFAULT NULL,
  `NAME` varchar(45) DEFAULT NULL,
  `LAST_LOGIN` datetime DEFAULT NULL,
  PRIMARY KEY (`USER_ID`),
  KEY `fk_USER_USER_TYPE_idx` (`UT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `UT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `UT_NAME` varchar(45) DEFAULT NULL,
  `UT_STATUS` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`UT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `wing`
--

CREATE TABLE IF NOT EXISTS `wing` (
  `WING_ID` int(11) NOT NULL AUTO_INCREMENT,
  `WING_NAME` varchar(45) DEFAULT NULL,
  `WING_TYPE` varchar(45) DEFAULT NULL,
  `TOWER_ID` int(11) NOT NULL,
  PRIMARY KEY (`WING_ID`),
  KEY `fk_WING_TOWER1_idx` (`TOWER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `floor`
--
ALTER TABLE `floor`
  ADD CONSTRAINT `fk_FLOOR_FLOOR_TYPE1` FOREIGN KEY (`FLOOR_TYPE_ID`) REFERENCES `floor_type` (`FT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_FLOOR_TOWER1` FOREIGN KEY (`TOWER_ID`) REFERENCES `tower` (`TOWER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `login_hist`
--
ALTER TABLE `login_hist`
  ADD CONSTRAINT `fk_LOGIN_HIST_USER1` FOREIGN KEY (`USER_USER_ID`) REFERENCES `user2` (`USER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_ORDER_BUYER1` FOREIGN KEY (`BUYER_idBUYER`) REFERENCES `buyer` (`idBUYER`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ORDER_PAYMENT_TYPE1` FOREIGN KEY (`PT_ID`) REFERENCES `payment_type` (`PT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ORDER_PAYMENT_TYPE2` FOREIGN KEY (`BF_PT_ID`) REFERENCES `payment_type` (`PT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ORDER_ROOM1` FOREIGN KEY (`ROOM_ROOM_ID`) REFERENCES `room` (`ROOM_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ORDER_USER1` FOREIGN KEY (`M_USER_ID`) REFERENCES `user2` (`USER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ORDER_USER2` FOREIGN KEY (`MM_USER_ID`) REFERENCES `user2` (`USER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_ROOM_BUYER1` FOREIGN KEY (`OWNER_idBUYER`) REFERENCES `buyer` (`idBUYER`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ROOM_FLOOR1` FOREIGN KEY (`FLOOR_ID`) REFERENCES `floor` (`FLOOR_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ROOM_ROOM_TYPE1` FOREIGN KEY (`RT_ID`) REFERENCES `room_type` (`RT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ROOM_WING1` FOREIGN KEY (`WING_ID`) REFERENCES `wing` (`WING_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tower`
--
ALTER TABLE `tower`
  ADD CONSTRAINT `fk_TOWER_TOWER_TYPE1` FOREIGN KEY (`TOWER_TYPE_TT_ID`) REFERENCES `tower_type` (`TT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user2`
--
ALTER TABLE `user2`
  ADD CONSTRAINT `fk_USER_USER_TYPE` FOREIGN KEY (`UT_ID`) REFERENCES `user_type` (`UT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `wing`
--
ALTER TABLE `wing`
  ADD CONSTRAINT `fk_WING_TOWER1` FOREIGN KEY (`TOWER_ID`) REFERENCES `tower` (`TOWER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

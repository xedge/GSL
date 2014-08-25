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

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`idBUYER`, `NO_ID`, `BUY_NAME`, `ADDRESS_BY_ID`, `ADDRESS`, `PHONE_NUM`, `HP_NUM`, `FAX_NUM`) VALUES
(1, '3512888955546', 'Ahmad Budi', 'Surabaya', 'Surabaya', '', '081553333333', '');

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`FLOOR_ID`, `FLOOR_NUMBER`, `TOWER_ID`, `FLOOR_TYPE_ID`) VALUES
(1, '3', 1, 1),
(2, '5', 1, 1),
(3, '6', 1, 1),
(4, '7', 1, 1),
(5, '8', 1, 1),
(6, '9', 1, 1),
(7, '10', 1, 1),
(8, '11', 1, 1),
(9, '12', 1, 1),
(10, '15', 1, 1),
(11, '16', 1, 1),
(12, '17', 1, 1),
(13, '18', 1, 1),
(14, '19', 1, 2),
(15, '20', 1, 2),
(16, '21', 1, 2),
(17, '23', 1, 2),
(18, '25', 1, 2),
(19, '26', 1, 2),
(20, '27', 1, 2),
(21, '28', 1, 2),
(22, '29', 1, 2),
(23, '30', 1, 2),
(24, '32', 1, 2),
(25, '33', 1, 2),
(26, '35', 1, 2),
(27, '36', 1, 2),
(28, '37', 1, 2),
(29, '38', 1, 2),
(30, '39', 1, 2),
(31, 'PH. 1', 1, 2),
(32, 'PH. 2', 1, 2);

--
-- Dumping data for table `floor_type`
--

INSERT INTO `floor_type` (`FT_ID`, `FLOOR_TYPE`) VALUES
(1, 'LOW ZONE'),
(2, 'HIGH ZONE');

--
-- Dumping data for table `login_hist`
--

INSERT INTO `login_hist` (`LH_ID`, `DATE`, `USER_USER_ID`) VALUES
(1, '2014-08-20 09:56:12', 0),
(2, '2014-08-20 10:04:37', 0),
(3, '2014-08-21 05:10:39', 0),
(4, '2014-08-21 07:43:57', 40001),
(5, '2014-08-21 07:52:09', 0),
(6, '2014-08-21 09:20:28', 0),
(7, '2014-08-21 09:49:46', 40001),
(8, '2014-08-21 09:51:48', 40001),
(9, '2014-08-21 11:04:18', 40001),
(10, '2014-08-21 11:06:08', 40001),
(11, '2014-08-21 11:15:04', 40001),
(12, '2014-08-21 11:15:16', 0),
(13, '2014-08-22 05:25:19', 40001),
(14, '2014-08-25 05:26:31', 40001),
(15, '2014-08-25 05:56:56', 40001),
(16, '2014-08-25 06:00:48', 0),
(17, '2014-08-25 06:25:31', 40001),
(18, '2014-08-25 06:27:36', 40001),
(19, '2014-08-25 08:11:05', 0);

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`ORDER_ID`, `PRICE`, `DISCOUNT`, `DEAL_PRICE`, `PT_ID`, `BOOKING_FEE`, `BF_PT_ID`, `BF_DATE`, `REMAINING_BF`, `RM_DATE`, `ADVANCE_PAYMENT_1`, `AP1_DATE`, `ADVANCE_PAYMENT`, `PT_PERCENT`, `INSTALLMENT_1`, `INSTALLMENT_2`, `INSTALLMENT_PRICE`, `RM_PAYMENT_DATE`, `RM_INSTALLMENT_DATE_BEGIN`, `RM_INSTALLMENT_DATE_ENG`, `DATE_ORDER`, `M_USER_ID`, `MM_USER_ID`, `ORDER_STATUS`, `APPROVED_DATE`, `BUYER_idBUYER`, `ROOM_ROOM_ID`) VALUES
(1233434, 100000000, 1000000, NULL, 4, 20000000, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-08-25', 40001, NULL, NULL, NULL, 1, 2);

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`PT_ID`, `PT_NAME`) VALUES
(1, 'Tunai'),
(2, 'Tunai Bertahap'),
(3, 'Angsuran'),
(4, 'KPA');

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`ROOM_ID`, `ROOM_NUMBER`, `ROOM_AREA_GROSS`, `ROOM_AREA_NETT`, `FLOOR_ID`, `WING_ID`, `STATUS`, `RT_ID`, `OWNER_idBUYER`) VALUES
(2, '0301', '49.28', NULL, 1, 1, 'Availabel', 3, NULL);

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`RT_ID`, `RT_NAME`) VALUES
(1, '1BRS'),
(2, '2BRS'),
(3, '1BR SUITE'),
(4, '1BR DELUXE'),
(5, '2BR DELUXE'),
(6, '2BR SUITE'),
(7, '3BR SUITE');

--
-- Dumping data for table `tower`
--

INSERT INTO `tower` (`TOWER_ID`, `TOWER_NAME`, `TOWER_TYPE_TT_ID`) VALUES
(1, 'VENETIAN', 1);

--
-- Dumping data for table `tower_type`
--

INSERT INTO `tower_type` (`TT_ID`, `TT_TYPE`) VALUES
(1, 'APARTMENT');

--
-- Dumping data for table `user2`
--

INSERT INTO `user2` (`USER_ID`, `USER_NAME`, `EMAIL_ADDRESS`, `UT_ID`, `PASSWORD`, `NAME`, `LAST_LOGIN`) VALUES
(0, 'Root', NULL, 0, 'root', 'root', '2014-08-25 08:11:05'),
(10001, 'SPV2', 'x_edge@outlook.com', 1, '$2a$13$x3mpgRGzDogluX/Wymi24eRBbr.4u6pJXmCofjvHF/iZVEUAAyt52', 'Bambang', NULL),
(10002, 'spp', 'sukodadi@ol.com', 1, '$2a$13$5Z.rLBvDPgPFofI4Zh4DL.slYy5Wj1RDm.CE2a6EXYTcI9iZbntYm', 'suko', NULL),
(20001, 'MM1', 'yanuar.valentino@gmail.com', 2, '$2a$13$WQcGp2oYWRZg8Ouvt1VBEORjPHcv2uJjO76KqOkj59L.qnblIxGQa', 'Yanuar', NULL),
(30001, 'Admin1', 'iqbalpermana09@gmail.com', 3, '$2a$13$n.a4EKQRrBgWo/BwX1Nq.OaF1i4/4BzzU/2ed/yOgJBgCG9oWeQFq', 'Iqbal', NULL),
(40001, 'marketing1', 'yun@kk.com', 4, '$2a$13$vQ7bNlvQhnx2q6ZKJTcInew65byHPrNXVMYe2k4AB5w.FEWuLvMdq', 'Yuyun', '2014-08-25 06:27:36');

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`UT_ID`, `UT_NAME`, `UT_STATUS`) VALUES
(0, 'Super Admin', NULL),
(1, 'Supervisor', NULL),
(2, 'Marketing Manager', NULL),
(3, 'Admin', NULL),
(4, 'Marketing', NULL);

--
-- Dumping data for table `wing`
--

INSERT INTO `wing` (`WING_ID`, `WING_NAME`, `WING_TYPE`, `TOWER_ID`) VALUES
(1, 'WING A - NORTH', NULL, 1),
(2, 'WING B - NORTH', NULL, 1),
(3, 'WING B - SOUTH', NULL, 1),
(4, 'WING A SOUTH', NULL, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 05:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EID` int(5) NOT NULL,
  `Name` text NOT NULL,
  `Phone` bigint(10) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Centre_id` int(5) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EID`, `Name`, `Phone`, `Gender`, `Centre_id`, `password`) VALUES
(90000, 'SURESH', 9998887771, 'M', 10000, 'suresh'),
(90001, 'RAMESH', 9998887772, 'M', 10000, 'ramesh'),
(90002, 'GIRISH', 9876987698, 'M', 10000, 'girish'),
(90004, 'rty', 9876987698, 'M', 10000, 'uio');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Member_id` bigint(12) NOT NULL,
  `Name` text NOT NULL,
  `Gender` char(1) NOT NULL,
  `DOB` date NOT NULL,
  `Phoneno` int(10) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Centre_id` int(5) DEFAULT NULL,
  `Userid` bigint(10) DEFAULT NULL,
  `VID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `Slots` datetime NOT NULL,
  `Member_id` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slots`
--



-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Userid` bigint(10) NOT NULL,
  `Username` text NOT NULL,
  `no_of_members` int(1) NOT NULL DEFAULT 0,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--


-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `VID` int(5) NOT NULL,
  `Name` text NOT NULL,
  `Duration` int(4) NOT NULL,
  `Manufacturer` varchar(25) NOT NULL,
  `Doses` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`VID`, `Name`, `Duration`, `Manufacturer`, `Doses`) VALUES
(1, 'COVISHIELD', 84, 'Serum Institute of India', '2'),
(2, 'COVAXIN', 28, 'Bharath Biotech', '2'),
(3, 'SPUTNIK', 21, 'Gamaleya Research Institu', '2'),
(4, 'SPUTNIK 2', 28, 'Gamaleya Research Institu', '2'),
(10, 'hjgmnjhg', 56, 'hjmnjhj', '1');

--
-- Triggers `vaccine`
--
DELIMITER $$
CREATE TRIGGER `ABC` BEFORE INSERT ON `vaccine` FOR EACH ROW IF NEW.DOSES<1 THEN SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Cannot add Doses less than 1';
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_centre`
--

CREATE TABLE `vaccine_centre` (
  `Centre_id` int(5) NOT NULL,
  `CName` text NOT NULL,
  `Address` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine_centre`
--

INSERT INTO `vaccine_centre` (`Centre_id`, `CName`, `Address`) VALUES
(10000, 'Wenlock', 'Mangalore'),
(10001, 'KMC Hospital', 'Attavar'),
(10009, 'hgh', 'hghgfdjh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EID`),
  ADD KEY `Centre_id` (`Centre_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Member_id`),
  ADD KEY `VID` (`VID`),
  ADD KEY `Centre_id` (`Centre_id`),
  ADD KEY `Userid` (`Userid`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`Slots`,`Member_id`),
  ADD KEY `Member_id` (`Member_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Userid`) USING BTREE;

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`VID`);

--
-- Indexes for table `vaccine_centre`
--
ALTER TABLE `vaccine_centre`
  ADD PRIMARY KEY (`Centre_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90005;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Centre_id`) REFERENCES `vaccine_centre` (`Centre_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`VID`) REFERENCES `vaccine` (`VID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `member_ibfk_3` FOREIGN KEY (`Centre_id`) REFERENCES `vaccine_centre` (`Centre_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `member_ibfk_4` FOREIGN KEY (`Userid`) REFERENCES `user` (`Userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `slots`
--
ALTER TABLE `slots`
  ADD CONSTRAINT `slots_ibfk_1` FOREIGN KEY (`Member_id`) REFERENCES `member` (`Member_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

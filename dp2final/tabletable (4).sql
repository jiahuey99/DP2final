-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2019 at 05:44 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabletable`
--

-- --------------------------------------------------------

--
-- Table structure for table `memberdb`
--

CREATE TABLE `memberdb` (
  `memberpoint` int(6) NOT NULL DEFAULT '0',
  `idmember` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `memberdb`
--

INSERT INTO `memberdb` (`memberpoint`, `idmember`) VALUES
(12, '5gg'),
(0, 'jiahui'),
(0, 'jiahuiii'),
(2, 'test'),
(19160, 'testt');

-- --------------------------------------------------------

--
-- Table structure for table `menuitems`
--

CREATE TABLE `menuitems` (
  `ITEMNO` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `category` varchar(20) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menuitems`
--

INSERT INTO `menuitems` (`ITEMNO`, `name`, `price`, `discount`, `category`, `img`) VALUES
(1, 'Tea', '2.30', '0.00', 'Beverage', 'tea.jpg'),
(2, 'Coffee', '2.00', '0.00', 'Beverage', 'coffee.png'),
(3, 'Noodles', '6.00', '0.00', 'Food', 'noodle.jpg'),
(4, 'Rice', '6.00', '0.00', 'Food', 'rice.jpg'),
(5, 'Toast', '4.00', '0.00', 'Food', 'toast.jpg\r\n'),
(6, 'Egg', '1.00', '0.00', 'Food', 'egg2.jpg'),
(7, 'Cake', '2.30', '0.00', 'Food', 'cake.jpg\r\n'),
(8, 'Milo', '2.20', '10.00', 'Beverage', 'milo.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `orderdb`
--

CREATE TABLE `orderdb` (
  `orderid` int(5) NOT NULL,
  `itemno` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `idtable` int(4) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `discount` int(2) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdb`
--

INSERT INTO `orderdb` (`orderid`, `itemno`, `qty`, `idtable`, `subtotal`, `discount`, `comment`) VALUES
(1, 3, 3, 20, '0.00', 0, ''),
(2, 3, 3, 0, '0.00', 0, ''),
(3, 3, 3, 0, '0.00', 0, ''),
(3, 4, 3, 0, '0.00', 0, ''),
(4, 3, 4, 0, '0.00', 0, 'nbbnb'),
(4, 4, 2, 0, '0.00', 0, 'nnnnn'),
(4, 5, 2, 0, '0.00', 0, ''),
(5, 3, 3, 0, '0.00', 0, ''),
(5, 8, 3, 0, '0.00', 0, ''),
(6, 3, 2, 0, '0.00', 0, ''),
(7, 3, 4, 0, '0.00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservationid` int(2) NOT NULL,
  `idtable` int(4) UNSIGNED DEFAULT NULL,
  `name` varchar(80) NOT NULL,
  `time` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservationid`, `idtable`, `name`, `time`, `date`) VALUES
(33, 43, 'test', '4:00', '2019-11-13'),
(34, 20, 'hahaha', '', '2019-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `table`
--

CREATE TABLE `table` (
  `idtable` int(4) UNSIGNED NOT NULL,
  `reservename` char(30) DEFAULT NULL,
  `reservetime` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tabledb`
--

CREATE TABLE `tabledb` (
  `idtable` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tabledb`
--

INSERT INTO `tabledb` (`idtable`) VALUES
(0),
(1),
(2),
(3),
(4),
(20),
(21),
(43),
(60),
(211);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `timeid` int(2) NOT NULL,
  `timedescr` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`timeid`, `timedescr`) VALUES
(1, '11:00 AM'),
(2, '12:00 PM'),
(3, '1:00 PM'),
(4, '2:00 PM'),
(5, '3:00 PM'),
(6, '4:00 PM'),
(7, '5:00 PM'),
(8, '6:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `orderid` int(5) NOT NULL,
  `food` varchar(200) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`orderid`, `food`, `amount`, `date`) VALUES
(5, ',Noodles5 30,Rice2 12,Toast6 24,Egg2 2,Cake2 4.6', '72.60', '2019-11-15 12:25:27'),
(7, ',Noodles2 12', '12.00', '2019-11-16 13:11:30'),
(8, ',Milo5 9.9', '9.90', '2019-10-16 12:35:06'),
(8, ',Noodles4 24', '24.00', '2019-11-16 13:11:33'),
(8, ',Noodles3 18,Milo5 9.9', '27.90', '2019-12-17 15:59:38'),
(9, ',Noodles4 24', '24.00', '2019-09-16 13:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `userpass`
--

CREATE TABLE `userpass` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `type` enum('Admin','User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userpass`
--

INSERT INTO `userpass` (`id`, `user`, `pass`, `type`) VALUES
(1, 'abcd', '1234', 'User'),
(2, 'abcd1234', '12345678', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `memberdb`
--
ALTER TABLE `memberdb`
  ADD PRIMARY KEY (`idmember`);

--
-- Indexes for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`ITEMNO`);

--
-- Indexes for table `orderdb`
--
ALTER TABLE `orderdb`
  ADD PRIMARY KEY (`orderid`,`itemno`),
  ADD KEY `itemno` (`itemno`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservationid`),
  ADD KEY `idtable` (`idtable`);

--
-- Indexes for table `table`
--
ALTER TABLE `table`
  ADD PRIMARY KEY (`idtable`);

--
-- Indexes for table `tabledb`
--
ALTER TABLE `tabledb`
  ADD PRIMARY KEY (`idtable`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`timeid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`orderid`,`date`);

--
-- Indexes for table `userpass`
--
ALTER TABLE `userpass`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `ITEMNO` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservationid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `timeid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userpass`
--
ALTER TABLE `userpass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdb`
--
ALTER TABLE `orderdb`
  ADD CONSTRAINT `orderdb_ibfk_1` FOREIGN KEY (`itemno`) REFERENCES `menuitems` (`ITEMNO`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idtable`) REFERENCES `tabledb` (`idtable`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

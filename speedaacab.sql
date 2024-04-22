-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2021 at 02:43 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `speedaacab`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `username` varchar(123) NOT NULL,
  `password` varchar(124) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `bdate` date NOT NULL,
  `pickuplocation` varchar(123) NOT NULL,
  `droplocation` varchar(123) NOT NULL,
  `bstatus` varchar(123) NOT NULL DEFAULT 'NotYet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `uid`, `vid`, `bdate`, `pickuplocation`, `droplocation`, `bstatus`) VALUES
(1, 2, 6, '2021-09-12', 'jyothi mangaluru', 'bhatkal', 'PaymentDone'),
(5, 5, 7, '2021-09-04', 'airport', 'kankanady', 'Confirmed'),
(6, 7, 13, '2021-09-17', 'jyothi mangaluru', 'kankanady', 'PaymentDone'),
(7, 8, 7, '2021-09-23', 'airport', 'kankanady', 'PaymentDone'),
(8, 16, 7, '2021-09-10', 'airport', 'kankanady', 'PaymentDone'),
(9, 19, 11, '2021-09-23', 'airport', 'manikanta', 'PaymentDone'),
(10, 20, 13, '2021-09-17', 'airport', 'manikanta', 'PaymentDone'),
(11, 21, 7, '2021-10-02', 'airport', 'bhatkal', 'PaymentDone'),
(12, 22, 8, '2021-09-24', 'airport', 'bhatkal', 'PaymentDone'),
(13, 25, 11, '2021-09-24', 'airport', 'bhatkal', 'PaymentDone'),
(14, 26, 8, '2021-09-24', 'airport', 'kankanady', 'PaymentDone'),
(15, 27, 7, '2021-07-23', 'airport', 'kumta', 'PaymentDone'),
(16, 28, 14, '2021-09-22', 'airport', 'manikanta', 'PaymentDone'),
(17, 9, 7, '2021-07-20', '', 'kudremuk', 'PaymentDone'),
(18, 19, 18, '2021-09-25', 'airport', 'smnkjv', 'Confirmed'),
(19, 40, 8, '2023-03-30', 'airport', 'manikanta', 'PaymentDone'),
(20, 42, 8, '2021-10-22', 'airport', 'kudroli', 'PaymentDone'),
(21, 51, 13, '2021-10-02', 'airport', 'kudremuk', 'PaymentDone'),
(22, 53, 29, '2021-10-30', 'airport', 'bhatkal', 'Confirmed'),
(23, 53, 30, '2021-10-30', 'airport', 'manikanta', 'PaymentDone'),
(24, 54, 11, '2021-10-22', 'airport', 'kankanady', 'Confirmed'),
(25, 60, 14, '2021-10-20', 'airport', 'kudremuk', 'PaymentDone');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `did` int(11) NOT NULL,
  `dname` varchar(123) NOT NULL,
  `dcontact` bigint(20) NOT NULL,
  `demail` varchar(123) NOT NULL,
  `daddress` varchar(123) NOT NULL,
  `password` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`did`, `dname`, `dcontact`, `demail`, `daddress`, `password`) VALUES
(1, 'Ganesh', 8527419670, 'ganesh@gmail.com', 'kodialbail', 'ganeshp'),
(2, 'Dinesh', 8527419630, 'dinesh@gmail.com', 'kodialbail', 'dinesh'),
(3, 'Dayal', 8527419639, 'dayal@gmail.com', 'kodialbail', 'dayal'),
(6, 'ravana', 4563728632, 'ravana@gmail.com', 'gurupura', 'ravana'),
(7, 'popy', 4665388938, 'popy@gmail.com', 'kudla', 'popy'),
(8, 'nishan', 3452617831, 'nishan@gmail.com', 'jodhpur', 'nishan'),
(9, 'aman', 5649888900, 'aman@gmail.com', 'bc road', 'aman'),
(12, 'teju', 8979009890, 'teju@email.com', 'jodhpur', 'teju'),
(13, 'popcorn', 8979009890, 'popcorn@gmail.com', 'gurupura', 'popcorn'),
(14, 'ravana', 8979009890, 'ganesh@gmail.com', 'kumata', 'ravana'),
(15, 'karthik', 8979009890, 'karthik@gmail.com', 'kumatauk', 'karthik'),
(16, 'inam', 8788087097, 'inam@gmail.com', 'kudla', 'inam');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `about` varchar(124) NOT NULL,
  `message` varchar(124) NOT NULL,
  `fdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `uid`, `about`, `message`, `fdate`) VALUES
(1, 2, 'booking', 'please make it fast', '2021-08-31'),
(2, 7, 'regarding car', 'grftvi', '2021-09-16'),
(3, 8, 'hgyhuo', 'jhgigoiu', '2021-09-17'),
(4, 21, 'good ', 'he was good at sdrhs', '2021-09-18'),
(5, 22, 'srgsg', 'dgdrhh', '2021-09-19'),
(6, 27, 'wonderful experience', 'driver ghfghgjhjh', '2021-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `amount` float NOT NULL,
  `method` varchar(123) NOT NULL,
  `pstatus` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pid`, `bid`, `uid`, `amount`, `method`, `pstatus`) VALUES
(1, 1, 2, 850, 'cash', 'Paid'),
(2, 6, 7, 3422, 'card', 'Paid'),
(3, 7, 8, 650, 'card', 'Paid'),
(4, 8, 16, 650, 'card', 'Paid'),
(5, 9, 19, 50000, 'cash', 'Paid'),
(6, 10, 20, 3422, 'cash', 'Paid'),
(7, 11, 21, 650, 'card', 'Paid'),
(8, 12, 22, 1000, 'card', 'Paid'),
(9, 13, 25, 50000, 'card', 'Paid'),
(10, 14, 26, 1000, 'card', 'Paid'),
(11, 15, 27, 650, 'card', 'Paid'),
(12, 16, 28, 5000, 'cash', 'Paid'),
(13, 17, 9, 650, 'card', 'Paid'),
(14, 19, 40, 1000, 'card', 'Paid'),
(15, 20, 42, 1000, 'cash', 'Paid'),
(16, 21, 51, 3422, 'cash', 'Paid'),
(17, 23, 53, 6000, 'card', 'Paid'),
(18, 25, 60, 5000, 'card', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `addr` varchar(111) NOT NULL,
  `contno` bigint(20) NOT NULL,
  `emailid` varchar(123) NOT NULL,
  `password` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `addr`, `contno`, `emailid`, `password`) VALUES
(3, 'nishan', 'pandavpura', 7489234092, 'nishan@gmail.com', 'nishan'),
(4, 'viky', 'jodpur', 4563781891, 'viky@gmail.com', 'viky'),
(5, 'gone', 'konchadi', 2998012121, 'gone@gmail.com', 'gone'),
(6, 'robbert', 'barke', 3434332121, 'robbert@gmail.com', 'robbert'),
(7, 'navya ', 'mangaluru', 9663535392, 'navya@gmail.com', 'navya'),
(25, 'nayana', 'kerala', 3875973984, 'nayana@gmail.com', 'nayana'),
(26, 'reshmi ', 'barke', 8734678693, 'reshmi@gmail.com', 'reshmiiii'),
(27, 'sandeep', 'abcd', 5688990987, 'sandeep@gmail.com', 'sandeep'),
(28, 'shamir', 'manglore', 8527419637, 'shamir@gmail.com', 'shamir'),
(29, 'maya', 'bhatkal', 9632587410, 'maya@gmail.com', 'maya'),
(30, 'raju', 'mmmbtle', 4444444444, 'raju@gmail.com', 'raju'),
(50, 'sandeep', 'mangaluru', 7767889999, 'san@gmail.com', '123'),
(51, 'nagu', 'barke', 8752030923, 'nagu@gmail.com', 'nagu'),
(52, 'sa', 'karshit', 2566666666, 'sa@gmail.com', '45'),
(53, 'deepa', 'karshit', 4536475676, 'deepa@gmail.com', 'deepa'),
(54, 'hem', 'mgroad', 4566666666, 'hem@gmail.com', '12'),
(56, 'meghana', 'kudroli', 2365555555, 'nagu@gmail.com', '45'),
(57, 'surekha', 'kudroli', 2222222222, 'nagu@gmail.com', '123'),
(58, 'gowda', 'karshit', 3453645756, 'gowda@gmail.com', '123'),
(59, 'arun', 'pandavpura', 3322234334, 'arun@gmail.com', 'arun'),
(60, 'suman', 'mangaluru', 2897947820, 'suman@gmail.com', 'suman');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `vname` varchar(123) NOT NULL,
  `vno` varchar(50) NOT NULL,
  `type` varchar(123) NOT NULL,
  `vimage` varchar(140) NOT NULL,
  `vamount` bigint(20) NOT NULL,
  `vstatus` varchar(123) NOT NULL DEFAULT 'Notyet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vid`, `did`, `vname`, `vno`, `type`, `vimage`, `vamount`, `vstatus`) VALUES
(7, 1, 'Uberrr', 'KA23489250', 'NonAC', '../uploads/bg-banner.jpg', 3000, 'Assigned'),
(11, 6, 'bmw', 'KA23489256', 'ac', '../uploads/gallery-4.jpg', 5000, 'Assigned'),
(13, 7, 'mercidis', 'KA23489251', 'non ac', '../uploads/car-rent-4.png', 3422, 'Assigned'),
(14, 8, 'jaguar', 'KA23489252', 'ac', '../uploads/gallery-6.jpg', 5000, 'Assigned'),
(27, 9, 'nano', 'KA23489256', 'ac', '../uploads/carousel-1.jpg', 5000, 'Assigned'),
(30, 15, 'city', 'KA34875835', 'ac', '../uploads/car-rent-5.png', 6000, 'Assigned'),
(31, 16, 'honda', 'KL80979099', 'ac', '../uploads/car-rent-6.png', 7000, 'Assigned');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

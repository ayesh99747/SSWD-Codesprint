-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 09:02 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `w1742066`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_rating`
--

CREATE TABLE `customer_rating` (
  `ratingId` int(4) NOT NULL,
  `prodId` int(4) NOT NULL,
  `userId` int(4) NOT NULL,
  `ratingDate` datetime NOT NULL,
  `ratingShort` varchar(40) NOT NULL,
  `ratingLong` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_rating`
--

INSERT INTO `customer_rating` (`ratingId`, `prodId`, `userId`, `ratingDate`, `ratingShort`, `ratingLong`) VALUES
(1, 2, 1, '2020-04-08 00:00:00', 'amazing product', 'dfdfdfdfdfdfdsfdsffdfdfdfdsfdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_rating`
--
ALTER TABLE `customer_rating`
  ADD PRIMARY KEY (`ratingId`),
  ADD KEY `fk_prodId` (`prodId`),
  ADD KEY `fk` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_rating`
--
ALTER TABLE `customer_rating`
  MODIFY `ratingId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_rating`
--
ALTER TABLE `customer_rating`
  ADD CONSTRAINT `fk` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `fk_prodId` FOREIGN KEY (`prodId`) REFERENCES `product` (`prodId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

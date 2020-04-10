-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 09:18 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codesprint`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msgID` int(10) NOT NULL,
  `userId` int(4) NOT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `state` varchar(10) NOT NULL,
  `submitTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderNo` int(4) NOT NULL,
  `userId` int(4) NOT NULL,
  `orderDateTime` datetime NOT NULL,
  `orderTotal` decimal(8,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `testId` int(4) NOT NULL,
  `testName` varchar(30) NOT NULL,
  `testPicNameSmall` varchar(100) NOT NULL,
  `testPicNameLarge` varchar(100) NOT NULL,
  `testDescripShort` varchar(1000) DEFAULT NULL,
  `testDescripLong` varchar(3000) DEFAULT NULL,
  `testPrice` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`testId`, `testName`, `testPicNameSmall`, `testPicNameLarge`, `testDescripShort`, `testDescripLong`, `testPrice`) VALUES
(1, 'Spelling Test', 'spelling.jpg', 'spelling.jpg', 'Do these spelling tests and really improve your spelling. These can also help your reading by listening and reading along.', 'Correct spelling says a lot about a person. And it says a lot about you as a jobseeker as well, especially when you are not spelling correctly.', '250.00'),
(2, 'Antonym Test', 'antonym.jpg', 'antonym.jpg', 'Do these spelling tests and really improve your spelling. These can also help your reading by listening and reading along.', 'Antonym tests are standardized psychometric assessment tests that provide the employing organization with information about a candidate\\\'s knowledge of the English language.', '170.00'),
(3, 'Synoynm Test', 'synonym.jpg', 'synonym.jpg', 'Do these spelling tests and really improve your spelling. These can also help your reading by listening and reading along.', 'Synonym tests are standardized psychometric assessment tests that provide the employing organization with information about a candidate\\\'s knowledge of the English language.', '150.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(4) NOT NULL,
  `userType` varchar(1) NOT NULL,
  `userFName` varchar(50) NOT NULL,
  `userSName` varchar(50) NOT NULL,
  `userAddress` varchar(50) NOT NULL,
  `userPostCode` varchar(50) NOT NULL,
  `userTelNo` varchar(50) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userType`, `userFName`, `userSName`, `userAddress`, `userPostCode`, `userTelNo`, `userEmail`, `userPassword`) VALUES
(1, 'C', 'Jessica', 'Bale', 'Colombo, Sri Lanka', '06500', '0112345678', 'jess@gmail.com', 'qwe'),
(2, 'C', 'Jane', 'Doe', 'Colombo, Sri Lanka', '01500', '1234567891', 'jane@gmail.com', 'asd'),
(3, 'C', 'Max', 'Loe', 'Colombo, Sri Lanka', '01400', '1234567891', 'maxie@gmail.com', 'rfv'),
(4, 'C', 'Alex', 'Bass', 'Colombo, Sri Lanka', '01400', '1234567891', 'bass@gmail.com', '9876'),
(5, 'A', 'Anita', 'Basil', 'Colombo, Sri Lanka', '01500', '9876543210', 'anita@gmail.com', 'wer');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `testId` int(4) NOT NULL,
  `userId` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`testId`, `userId`) VALUES
(1, 2),
(2, 2),
(3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msgID`),
  ADD KEY `message_userid_fk` (`userId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderNo`),
  ADD KEY `userid_orders_fk` (`userId`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`testId`),
  ADD UNIQUE KEY `prodname_product_unique` (`testName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`testId`,`userId`),
  ADD KEY `wishlist_userid_fk` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msgID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderNo` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `testId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `message_userid_fk` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `userid_orders_fk` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_testid_fk` FOREIGN KEY (`testId`) REFERENCES `tests` (`testId`),
  ADD CONSTRAINT `wishlist_userid_fk` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

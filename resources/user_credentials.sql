-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 03:24 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_credentials`
--

-- --------------------------------------------------------

--
-- Table structure for table `chargingreservations`
--

CREATE TABLE `chargingreservations` (
  `reservationID` int(100) NOT NULL,
  `stationID` int(7) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chargingstations`
--

CREATE TABLE `chargingstations` (
  `stationID` int(7) NOT NULL,
  `stationName` varchar(255) DEFAULT NULL,
  `stationAddress` varchar(255) DEFAULT NULL,
  `stationCity` varchar(50) DEFAULT NULL,
  `stationState` varchar(50) DEFAULT NULL,
  `stationZipcode` int(5) NOT NULL,
  `evConnectorTypes` varchar(100) DEFAULT NULL,
  `evNetwork` varchar(100) DEFAULT NULL,
  `chargePricing` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stationreviews`
--

CREATE TABLE `stationreviews` (
  `reviewID` int(100) NOT NULL,
  `userID` int(11) NOT NULL,
  `stationID` int(7) NOT NULL,
  `stationName` varchar(255) DEFAULT NULL,
  `rating` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userfavorites`
--

CREATE TABLE `userfavorites` (
  `userID` int(11) NOT NULL,
  `stationID` int(7) NOT NULL,
  `stationName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userreservations`
--

CREATE TABLE `userreservations` (
  `userID` int(11) DEFAULT NULL,
  `reservationID` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(90) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(40) DEFAULT NULL,
  `zipcode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `username`, `password`, `email`, `firstname`, `lastname`, `zipcode`) VALUES
(13, 'tommyboy', '$2y$10$0nazKCHYz7oYSsFuoWQBcOB7tRgjMkrzJJeAo3mm4RDRRlw7eO22S', 'tommyboy@aol.com', 'Tommy', 'Boy', 10001),
(14, 'tomboy2', '$2y$10$r6NsWQHT1AArzPoX7SPOBOStxAu4/0UK49HKO7h7NgI2STj9NyFxC', 'tommy@gmail.com', 'tom', 'boyrecords', 10001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chargingreservations`
--
ALTER TABLE `chargingreservations`
  ADD PRIMARY KEY (`reservationID`),
  ADD KEY `stationID` (`stationID`);

--
-- Indexes for table `chargingstations`
--
ALTER TABLE `chargingstations`
  ADD PRIMARY KEY (`stationID`);

--
-- Indexes for table `stationreviews`
--
ALTER TABLE `stationreviews`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `stationID` (`stationID`);

--
-- Indexes for table `userfavorites`
--
ALTER TABLE `userfavorites`
  ADD KEY `userID` (`userID`),
  ADD KEY `stationID` (`stationID`);

--
-- Indexes for table `userreservations`
--
ALTER TABLE `userreservations`
  ADD KEY `userID` (`userID`),
  ADD KEY `reservationID` (`reservationID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chargingreservations`
--
ALTER TABLE `chargingreservations`
  MODIFY `reservationID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stationreviews`
--
ALTER TABLE `stationreviews`
  MODIFY `reviewID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chargingreservations`
--
ALTER TABLE `chargingreservations`
  ADD CONSTRAINT `chargingreservations_ibfk_1` FOREIGN KEY (`stationID`) REFERENCES `chargingstations` (`stationID`);

--
-- Constraints for table `stationreviews`
--
ALTER TABLE `stationreviews`
  ADD CONSTRAINT `stationreviews_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`usersId`),
  ADD CONSTRAINT `stationreviews_ibfk_2` FOREIGN KEY (`stationID`) REFERENCES `chargingstations` (`stationID`);

--
-- Constraints for table `userfavorites`
--
ALTER TABLE `userfavorites`
  ADD CONSTRAINT `userfavorites_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`usersId`),
  ADD CONSTRAINT `userfavorites_ibfk_2` FOREIGN KEY (`stationID`) REFERENCES `chargingstations` (`stationID`);

--
-- Constraints for table `userreservations`
--
ALTER TABLE `userreservations`
  ADD CONSTRAINT `userreservations_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`usersId`),
  ADD CONSTRAINT `userreservations_ibfk_2` FOREIGN KEY (`reservationID`) REFERENCES `chargingreservations` (`reservationID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

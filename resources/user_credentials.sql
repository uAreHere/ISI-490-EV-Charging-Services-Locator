-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2023 at 06:44 AM
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

--
-- Dumping data for table `chargingreservations`
--

INSERT INTO `chargingreservations` (`reservationID`, `stationID`, `date`, `time`) VALUES
(1, 181933, '2023-05-24', '23:00:00'),
(2, 115053, '2023-05-25', '03:30:00'),
(10, 115053, '2023-05-29', '17:00:00');

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
  `chargePricing` varchar(100) DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chargingstations`
--

INSERT INTO `chargingstations` (`stationID`, `stationName`, `stationAddress`, `stationCity`, `stationState`, `stationZipcode`, `evConnectorTypes`, `evNetwork`, `chargePricing`, `latitude`, `longitude`) VALUES
(112864, 'L\\\'Ermitage Beverly Hills - Tesla Destination', '9291 Burton Way', 'Beverly Hills', 'CA', 90210, 'J1772TESLA', 'Tesla Destination', 'Free', 34.0724, -118.395),
(114996, 'Rapidpark 99 Park Ave - Tesla Destination', '105 E 39th', 'New York', 'NY', 10016, 'J1772TESLA', 'Tesla Destination', 'Free', 40.75, -73.9785),
(115053, 'GGMC Parking Seven Eleven (Located at 217 E 44th St) - Tesla Destination', '217 E 44th St', 'New York', 'NY', 10017, 'J1772TESLA', 'Tesla Destination', 'Free', 40.7519, -73.9729),
(115152, 'MPG 530 West 30th - Tesla Destination', '530 W 30th', 'New York', 'NY', 10001, 'J1772TESLA', 'Tesla Destination', 'Free', 40.7528, -74.0026),
(160217, 'BEVERLY HILLS 450 N CRESCENT1', '450 N Crescent Dr', 'Beverly Hills', 'CA', 90210, 'J1772', 'ChargePoint Network', '', 34.073, -118.401),
(169010, 'Park Kwik-300 Ashland - Tesla Destination', '300 Ashland Pl', 'Brooklyn', 'NY', 11217, 'TESLA', 'Tesla Destination', 'Free', 40.6861, -73.9782),
(177605, 'BEVERLY HILLS CIVIC CENTER 2', '450 N Rexford Dr', 'Beverly Hills', 'CA', 90210, 'J1772', 'ChargePoint Network', '', 34.0735, -118.399),
(181662, 'HAMPTON INN STATION 2', '1120 South Ave', 'Staten Island', 'NY', 10314, 'J1772', 'ChargePoint Network', '', 40.6127, -74.1789),
(181933, 'NYC FLEET DPR_ICAHN_2_L3', '10 Central Rd', 'New York', 'NY', 10035, 'CHADEMOJ1772COMBO', 'ChargePoint Network', '', 40.7924, -73.9246),
(182213, 'CIRCLE BMW FLEET 2', '500 NJ-36', 'Eatontown', 'NJ', 7724, 'J1772', 'ChargePoint Network', '', 40.2905, -74.0418),
(225576, '30-10 35th Street', '30-10 35th Street', 'Queens', 'NY', 11103, 'J1772', 'FLO', '', 40.7652, -73.9184),
(227592, 'THE RAIL STATION 3', '107 Oakland St', 'Red Bank', 'NJ', 7701, 'J1772', 'ChargePoint Network', '', 40.3476, -74.0745),
(237751, 'STARBUCKS STORE ATLANTIC HIGHL', '999 NJ-36', 'Atlantic Highlands', 'NJ', 7716, 'J1772', 'ChargePoint Network', '', 40.4102, -74.0406),
(260936, 'Brookdale College - 765 Newman Springs Rd', '765 Newman Springs Rd', 'Lincroft', 'NJ', 7738, 'J1772', 'FLO', '', 40.3264, -74.1306);

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

--
-- Dumping data for table `stationreviews`
--

INSERT INTO `stationreviews` (`reviewID`, `userID`, `stationID`, `stationName`, `rating`) VALUES
(1, 13, 112864, 'L\\\'Ermitage Beverly Hills - Tesla Destination', 4),
(2, 13, 114996, 'Rapidpark 99 Park Ave - Tesla Destination', 3),
(3, 13, 112864, 'L\\\'Ermitage Beverly Hills - Tesla Destination', 2),
(4, 13, 115152, 'MPG', 4),
(5, 13, 115053, 'GGMC', 5);

-- --------------------------------------------------------

--
-- Table structure for table `userfavorites`
--

CREATE TABLE `userfavorites` (
  `userID` int(11) NOT NULL,
  `stationID` int(7) NOT NULL,
  `stationName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userfavorites`
--

INSERT INTO `userfavorites` (`userID`, `stationID`, `stationName`) VALUES
(13, 115152, 'MPG 530 West 30th - Tesla Destination'),
(13, 115053, 'GGMC Parking Seven Eleven (Located at 217 E 44th St) - Tesla Destination'),
(13, 181933, 'NYC FLEET DPR_ICAHN_2_L3'),
(13, 181662, 'HAMPTON INN STATION 2'),
(13, 160217, 'BEVERLY HILLS 450 N CRESCENT1'),
(13, 49907, 'Nissan City of Red Bank'),
(13, 52006, 'George Wall Ford Lincoln'),
(13, 237751, 'STARBUCKS STORE ATLANTIC HIGHL'),
(13, 260936, 'Brookdale College - 765 Newman Springs Rd'),
(13, 182213, 'CIRCLE BMW FLEET 2'),
(13, 115152, 'MPG 530 West 30th - Tesla Destination'),
(13, 115152, 'MPG 530 West 30th - Tesla Destination');

-- --------------------------------------------------------

--
-- Table structure for table `userreservations`
--

CREATE TABLE `userreservations` (
  `userID` int(11) DEFAULT NULL,
  `reservationID` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userreservations`
--

INSERT INTO `userreservations` (`userID`, `reservationID`) VALUES
(13, NULL),
(13, NULL),
(13, 10);

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
  MODIFY `reservationID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stationreviews`
--
ALTER TABLE `stationreviews`
  MODIFY `reviewID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `userfavorites_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`usersId`);

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

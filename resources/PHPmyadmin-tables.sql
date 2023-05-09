CREATE TABLE `stationreviews` (
 `reviewID` int(3) NOT NULL,
 `userID` int(11) DEFAULT NULL,
 `stationID` int(100) DEFAULT NULL,
 `stationName` varchar(255) DEFAULT NULL,
 `rating` int(5) DEFAULT NULL,
 PRIMARY KEY (`reviewID`),
 KEY `userID` (`userID`),
 CONSTRAINT `stationreviews_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`usersId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `userfavorites` (
 `favoritesId` int(3) NOT NULL AUTO_INCREMENT,
 `userID` int(11) NOT NULL,
 `stationID` int(100) DEFAULT NULL,
 `stationName` varchar(255) DEFAULT NULL,
 PRIMARY KEY (`favoritesId`),
 KEY `userID` (`userID`),
 CONSTRAINT `userfavorites_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`usersId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `users` (
 `usersId` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(30) NOT NULL,
 `password` varchar(255) NOT NULL,
 `email` varchar(90) NOT NULL,
 `firstname` varchar(30) NOT NULL,
 `lastname` varchar(40) DEFAULT NULL,
 `zipcode` int(5) NOT NULL,
 PRIMARY KEY (`usersId`),
 UNIQUE KEY `username` (`username`),
 UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
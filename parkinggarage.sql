

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE DATABASE parkinggarage;

USE parkinggarage;


CREATE TABLE `accounts` (
  `isAdmin` int(11) NOT NULL DEFAULT '0',
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Username` char(20) NOT NULL,
  `Password` char(20) NOT NULL,
  `Balance` float NOT NULL DEFAULT '0',
  `Reservation` datetime DEFAULT NULL,
  `LicensePlate` char(7) NOT NULL,
  `startTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `endTime` datetime DEFAULT NULL,
  `paymentneeded` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `accounts` (`isAdmin`, `id`, `Username`, `Password`, `Balance`, `Reservation`, `LicensePlate`, `startTime`, `endTime`, `paymentneeded`) VALUES
(1, 0, 'admin', 'password', 0, NULL, '', '0000-00-00 00:00:00', NULL, 0),
(0, 1, 'username', 'password', 100, '2016-04-29 14:02:00', '1234567', '2016-04-29 09:00:00', '2016-04-29 11:00:00', 10),
(0, 2, 'richUser', 'password', 9999900, '0000-00-00 00:00:00', '2345678', '2016-04-29 00:00:00', '2016-04-29 13:01:00', 0);


CREATE TABLE `parkingspaces` (
  `SpotNumber` int(11) NOT NULL,
  `Status` enum('VACANT','OCCUPIED','RESERVED','') DEFAULT 'VACANT',
  `Username` char(20) DEFAULT NULL,
  `LicensePlate` int(11) NOT NULL,
  `StartTime` datetime DEFAULT NULL,
  `Price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `parkingspaces` (`SpotNumber`, `Status`, `Username`, `LicensePlate`, `StartTime`, `Price`) VALUES
(100, 'VACANT', NULL, 0, NULL, '3'),
(101, 'VACANT', NULL, 0, NULL, '3'),
(102, 'VACANT', NULL, 0, NULL, NULL),
(103, 'VACANT', NULL, 0, NULL, NULL),
(104, 'VACANT', NULL, 0, NULL, NULL),
(105, 'VACANT', NULL, 0, NULL, NULL),
(106, 'VACANT', NULL, 0, NULL, NULL),
(107, 'VACANT', NULL, 0, NULL, NULL),
(108, 'VACANT', NULL, 0, NULL, NULL),
(109, 'VACANT', NULL, 0, NULL, NULL);


CREATE TABLE `reservations` (
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `spotNumber` int(11) NOT NULL DEFAULT '0',
  `username` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `invoice`(
  `InvoiceID` int(10) NOT NULL AUTO_INCREMENT,
 `LicensePlateID` char(7) NOT NULL,
 `Balance` float NOT NULL DEFAULT '0',


)

CREATE TABLE `vehicle`(
    `LicensePlateID` char(7) NOT NULL,
    `Color` char(15),
    `type` enum('Sedan', 'Coupe', 'Truck','MiniVan','SUV','Other') DEFAULT 'Other',

)


CREATE TABLE `unavtab` (
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `SpotNum` int(11) NOT NULL,
  `username` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



ALTER TABLE `vehicle`
 ADD CONSTRAINT `FKvehicle_owner` FOREIGN KEY (`LicensePlateID`) REFERENCES `accounts` (`LicensePlate`);

ALTER TABLE `invoice`
 ADD CONSTRAINT `Fkinvoice_owner` FOREIGN KEY (`LicensePlateID`) REFERENCES `accounts` (`LicensePlate`);

ALTER TABLE `accounts`
  ADD PRIMARY KEY (`LicensePlate`);

ALTER TABLE `parkingspaces`
  ADD PRIMARY KEY (`SpotNumber`);

ALTER TABLE `reservations`
  ADD PRIMARY KEY (`spotNumber`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

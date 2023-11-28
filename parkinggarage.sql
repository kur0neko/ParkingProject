/* CMPE138_TEAM#1_SOURCES */
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE parkinggarage;

USE parkinggarage;


CREATE TABLE `accounts` (
  `isAdmin` int(11) NOT NULL DEFAULT '0',
  `id` int(10) NOT NULL,
  `Username` char(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Balance` float NOT NULL DEFAULT '0',
  `Reservation` datetime DEFAULT NULL,
  `LicensePlate` char(7) NOT NULL,
  `startTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `endTime` datetime DEFAULT NULL,
  `paymentneeded` float NOT NULL DEFAULT '0',
   PRIMARY KEY(LicensePlate)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `accounts` (`isAdmin`, `id`, `Username`, `Password`, `Balance`, `Reservation`, `LicensePlate`, `startTime`, `endTime`, `paymentneeded`) VALUES
(1, 0, 'admin', 'password', 0, NULL, '1234g67', '0000-00-00 00:00:00', '', 0),
(0, 1, 'username', 'password', 100, '0000-00-00 00:00:00', '1234567', '2016-04-29 09:00:00', '2016-04-29 11:00:00', 10),
(0, 2, 'username2', 'password', 9999900, '0000-00-00 00:00:00', '', '2016-04-29 00:00:00', '2016-04-29 13:01:00', 0),
(1, 0, 'admin2', 'password', 0, NULL, '24rkot', '0000-00-00 00:00:00', '', 0);


CREATE TABLE `parkingspaces` (
  `SpotNumber` int(11) NOT NULL,
  `Status` enum('VACANT','OCCUPIED','RESERVED','') DEFAULT 'VACANT',
  `Username` char(20) DEFAULT NULL,
  `LicensePlate` int(11) NOT NULL,
  `StartTime` datetime DEFAULT NULL,
  `Price` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (SpotNumber)
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
  `username` text NOT NULL,
   PRIMARY KEY (spotNumber)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `invoice`(
 `InvoiceID` int(10) NOT NULL ,
 `LicensePlateID` char(7) NOT NULL,
 `ParkingID` int(11) NOT NULL,
 PRIMARY KEY (InvoiceID)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `vehicle` (
	`vehicleID` int,
    `LicensePlateID` char(7) NOT NULL,
    `Color` VARCHAR(10),  
    `Type` ENUM('Sedan', 'Coupe', 'Truck', 'MiniVan', 'SUV', 'Other') DEFAULT 'Other',
    primary key (vehicleID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

 ALTER TABLE `invoice`
 ADD CONSTRAINT `FkParkingLocation` FOREIGN KEY (`ParkingID`) REFERENCES `parkingspaces` (`SpotNumber`);


-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2025 at 04:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azphbsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `event request`
--

CREATE TABLE `event request` (
  `Name` varchar(50) NOT NULL,
  `Email Address` varchar(60) NOT NULL,
  `Telephone Number` bigint(20) NOT NULL,
  `Residency Status` varchar(50) NOT NULL,
  `Event Name` varchar(120) NOT NULL,
  `Venue` varchar(50) NOT NULL,
  `Event Date` date NOT NULL,
  `Event Time` time NOT NULL,
  `Equipment Needed` varchar(11) NOT NULL,
  `Amount` text NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event request`
--

INSERT INTO `event request` (`Name`, `Email Address`, `Telephone Number`, `Residency Status`, `Event Name`, `Venue`, `Event Date`, `Event Time`, `Equipment Needed`, `Amount`, `Description`) VALUES
('Sukanayna Hoo', 'myclassesonlinesh@gmail.com', 8761234567, 'Resident', 'PCC Workshop', 'Conference Room', '2025-12-17', '18:00:00', 'HDMI', '1', NULL),
('Beatrice Matthias', 'beatriz128@gmail.com', 8761234567, 'Resident', 'Soup Sale', 'Cafe', '2025-12-18', '18:00:00', 'Tables, Cha', '2 tables and 3 chairs', NULL),
('Jason Boothe', 'json@gmail.com', 8761678976, 'Commuter', 'Block Buster Movie Night', 'Cafe', '2025-12-12', '14:00:00', 'Tables, Cha', '5 tables and 20 chairs', NULL),
('Brad Cooper', 'brad230@gmail.com', 8769998876, 'Other', 'Breast Cancer Awareness Pep Talk', 'Cafe', '2025-10-12', '17:00:00', 'Tables, Mic', '20 chairs, 2 Mics, 2 Speakers', NULL),
('James Leslie', 'jamesleslie@yahoo.com', 8769987546, 'External Organization', 'JADE Debate Meeting', 'Shark Lounge', '2025-12-19', '18:00:00', 'None', 'None', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory items`
--

CREATE TABLE `inventory items` (
  `Equipment Type` varchar(50) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory items`
--

INSERT INTO `inventory items` (`Equipment Type`, `Amount`, `Description`) VALUES
('Chair', 50, 'Foldable Chairs'),
('Table', 20, 'Foldable Table'),
('Mic', 3, 'Handheld Mic'),
('Mic Stand', 2, NULL),
('HDMI', 1, NULL),
('Projector', 1, NULL),
('Drum', 1, 'Congo Drum'),
('Drums', 3, 'Band Drum Set'),
('Projector Screen', 1, 'Foldable');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event request`
--
ALTER TABLE `event request`
  ADD KEY `event_username_idx` (`Residency Status`,`Name`),
  ADD KEY `event_name_idx` (`Event Name`,`Email Address`,`Event Date`,`Equipment Needed`),
  ADD KEY `event_venue_idx` (`Venue`);

--
-- Indexes for table `inventory items`
--
ALTER TABLE `inventory items`
  ADD KEY `inventory_equipment_idx` (`Equipment Type`,`Amount`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

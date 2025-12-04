-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2025 at 12:35 AM
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
-- Table structure for table `eventschedule`
--

CREATE TABLE `eventschedule` (
  `EID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email Address` text NOT NULL,
  `Telephone Number` bigint(20) NOT NULL,
  `Residency Status` varchar(20) NOT NULL,
  `Event Name` varchar(20) NOT NULL,
  `Event Date` date NOT NULL,
  `Equipment Needed` text NOT NULL,
  `Amount` text NOT NULL,
  `Description` text DEFAULT NULL,
  `Feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventschedule`
--

INSERT INTO `eventschedule` (`EID`, `Name`, `Email Address`, `Telephone Number`, `Residency Status`, `Event Name`, `Event Date`, `Equipment Needed`, `Amount`, `Description`, `Feedback`) VALUES
(1, 'Jason Boothe', 'json@gmail.com', 8765551234, 'Commuter', 'PHP Bookings', '2025-12-13', 'Chairs', '2 Chairs', NULL, NULL),
(2, 'Jimmy Brown', 'jB2n@gmail.com', 8765786903, 'Resident', 'Cluster Lighting', '2025-12-20', 'Tbales, Chairs', '2, Tables, 2 Chairs', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventschedule`
--
ALTER TABLE `eventschedule`
  ADD PRIMARY KEY (`EID`),
  ADD KEY `event_username_idx` (`Name`,`Event Name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

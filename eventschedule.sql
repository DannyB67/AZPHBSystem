-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2025 at 07:01 AM
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

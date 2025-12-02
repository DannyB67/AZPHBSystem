-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2025 at 11:30 PM
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
-- Database: `azph b system`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment inventory`
--

CREATE TABLE `equipment inventory` (
  `Item Name` varchar(120) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment inventory`
--

INSERT INTO `equipment inventory` (`Item Name`, `Amount`, `Description`) VALUES
('Chair', 50, 'Foldable Chairs'),
('Speaker', 4, 'Large Industrial Speakers'),
('Tables', 20, 'Foldable Tables'),
('Mic', 3, 'Handheld Microphones'),
('Mic Stand', 2, ''),
('Drum', 1, 'Congo Drum'),
('Drum', 3, 'Marching Drum set'),
('Drum Set', 1, ''),
('Projector', 1, 'Portable Projector'),
('HDMI', 1, 'HDMI Chord for Projectors and Other Devices');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Name` varchar(50) NOT NULL COMMENT 'Name of applicant',
  `Email Address` varchar(120) NOT NULL COMMENT 'Email of applicant',
  `Telephone Number` bigint(20) NOT NULL COMMENT 'Contact information',
  `Status` varchar(120) NOT NULL COMMENT 'Residency status',
  `Event Name` varchar(120) NOT NULL COMMENT 'Name of the event',
  `Description` text DEFAULT NULL COMMENT 'Event Description',
  `Date` date NOT NULL COMMENT 'Requested Date for event',
  `Venue` text NOT NULL COMMENT 'Requested venue for event',
  `Equipment` text NOT NULL COMMENT 'Requested type and number of equipment'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`Name`, `Email Address`, `Telephone Number`, `Status`, `Event Name`, `Description`, `Date`, `Venue`, `Equipment`) VALUES
('Jason Boothe', 'jasonb123@gmail.com', 8765532412, 'Resident', 'Block Buster Night', 'Block buster Night is a movies night to be held by the Deputy Committee in light of breast cancer awareness fundraising. ', '2025-10-09', 'Cafe', 'Chairs (40)'),
('Donald Mamby', 'dMamby123@gmail.com', 8765344212, 'Resident', 'Fitness Fridays', '', '2025-12-12', 'Cafe', 'Tables(2), Chairs(20)'),
('Sukanayna Hoo', 'myclassesonlinesh@gmail.com', 8761234567, 'Resident', 'PCC Workshop', ' Workshop to build graphic design skills ', '2025-12-12', 'Conference room', 'HDMI(1)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment inventory`
--
ALTER TABLE `equipment inventory`
  ADD KEY `inventory_equipmentname_idx` (`Item Name`,`Amount`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD KEY `events_name_idx` (`Name`),
  ADD KEY `events_email_idx` (`Email Address`),
  ADD KEY `Events_eventname&date_idx` (`Event Name`,`Date`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

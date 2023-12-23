-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 07:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracknback`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `Description` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admintab`
--

CREATE TABLE `admintab` (
  `Name` varchar(100) NOT NULL,
  `Mobile` varchar(100) NOT NULL,
  `ID` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintab`
--

INSERT INTO `admintab` (`Name`, `Mobile`, `ID`, `Email`, `Password`, `Position`) VALUES
('abaro senti tirin', '145698', '011203012', 'tislam203012@bscse.uiu.ac.bd', '1234', 'Main Admin'),
('Mohammad Darain Khan', '01712950127', '65796f2cf1d81', 'mkhan203010@bscse.uiu.ac.bd', '2234', 'Aditional Admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `NewCategory` varchar(100) NOT NULL,
  `CategoryID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`NewCategory`, `CategoryID`) VALUES
('Money', '657b165f81e7f'),
('Notepad', '657b1668ba052'),
('Bottle', '657b16701bfae'),
('Pen', '657b167a7a126'),
('Pen & Pencil', '657b1680de1d2');

-- --------------------------------------------------------

--
-- Table structure for table `lostposts`
--

CREATE TABLE `lostposts` (
  `ItemCategory` varchar(50) NOT NULL,
  `ItemID` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `OwnerName` varchar(100) NOT NULL,
  `OwnerID` varchar(100) NOT NULL,
  `OwnerMobile` varchar(20) NOT NULL,
  `OwnerEmail` varchar(100) NOT NULL,
  `itemImage` varchar(255) NOT NULL,
  `itemStatus` varchar(10) DEFAULT NULL,
  `approveStatus` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lostposts`
--

INSERT INTO `lostposts` (`ItemCategory`, `ItemID`, `Description`, `OwnerName`, `OwnerID`, `OwnerMobile`, `OwnerEmail`, `itemImage`, `itemStatus`, `approveStatus`) VALUES
('Mobile', '6571a0ca714c5', 'abaro mubail haraisa', 'bejaj munshi', '123456', '23232121', 'bejaj@gmail.com', 'download.jpg', 'FOUND!', 'Declined'),
('Others', '6571a6765ecb1', 'bathrum e asilam aisha dekhi khata haraise khatay prem potro asilo ', 'tirinna', '011203012', '', 'hobeKisu@gmail.com', '102913392_3625180477498584_4684888390466991496_n.jpg', 'FOUND!', 'Approved'),
('Others', '6571a95665683', 'amar memory haraia gese chokhee erokom kalar dekhe', 'bejaj munshi', '123456', '23232121', 'bejaj@gmail.com', 'bg.webp', 'FOUND!', 'Approved'),
('Money', '657b1d966cd91', 'mathaa noshto taha haraisa', 'bejaj munshi', '353363', '', 'bejaj@gmail.com', 'teka.jpg', NULL, 'Approved'),
('Bottle', '657b24137adce', 'amar panir bottle paina', 'Fahim', '45566', '', 'test5@gmail.com', 'download.jpeg', NULL, 'Approved'),
('Notepad', '657b3e9d76a52', 'chor e amar box nia gese ', 'Fahim', '1212', '1212121', 'wow@gmail.com', 'phn.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `NotificationDesc` text NOT NULL,
  `OwnerID` varchar(100) NOT NULL,
  `FounderID` varchar(100) NOT NULL,
  `itemID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`NotificationDesc`, `OwnerID`, `FounderID`, `itemID`) VALUES
('Found the item by tirinna . Mobile: ', '123456', '011203012', '6571a0ca714c5'),
('Found the item by bejaj munshi . Mobile: 23232121', '011203012', '123456', '6571a6765ecb1'),
('Found the item by sssss . Mobile: ', '123456', '3333', '6571a95665683'),
('Found the item by sssss . Mobile: 43433434', '123456', '3333', '6571a95665683');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Name` varchar(100) NOT NULL,
  `ID` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Mobile` varchar(15) NOT NULL,
  `ProfilePhoto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Name`, `ID`, `Email`, `Password`, `Mobile`, `ProfilePhoto`) VALUES
('Mohammad Darain Khan Fahim', '011203010', 'test@gmail.com', '$2y$10$WjNFtJIGn78iKB9nuVeePe9ECOeD1XHgh4FqdxBAPc8MdvJ7PUl5K', '12123231', ''),
('tirinna', '011203012', 'hobeKisu@gmail.com', '$2y$10$OBw.h9NRSLu97uXATWYf0.s7deooQwZSveVwtPNRn3vV2x/Pc7AiC', '78787878', ''),
('Fahim', '1212', 'wow@gmail.com', '$2y$10$8eAk3ld8jJXq8jzWK14KMu4T3BAQvR1f.YRLPE3D0Q0Q4zsmIZ7Fu', '1212121', 'teka.jpg'),
('bejaj munshi', '353363', 'bejaj@gmail.com', '$2y$10$FyklLhpm3/Q4BlmTOOzJSuHXR23awqVP7RWNisAgCR.2CupNw1lM.', '', ''),
('Darain', '45566', 'test5@gmail.com', '$2y$10$wIuY6IDY0NmNcK8wiJ9e2.hbEdtQN0SNqRkNLsg6Q8Uv8FZg9zx66', '12134221', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintab`
--
ALTER TABLE `admintab`
  ADD PRIMARY KEY (`ID`,`Email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `lostposts`
--
ALTER TABLE `lostposts`
  ADD PRIMARY KEY (`ItemID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

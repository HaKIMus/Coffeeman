-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 16, 2017 at 01:30 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeeman`
--

-- --------------------------------------------------------

--
-- Table structure for table `workout`
--

CREATE TABLE `workout` (
  `id` int(11) NOT NULL,
  `sportsmanId` int(11) NOT NULL,
  `workoutPropertyId` int(11) DEFAULT NULL,
  `workoutTypeId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `workout`
--

INSERT INTO `workout` (`id`, `sportsmanId`, `workoutPropertyId`, `workoutTypeId`) VALUES
(2, 1, 3, 1),
(3, 1, 4, 1),
(4, 1, 5, 2),
(5, 1, 6, 2),
(6, 1, 7, 2),
(7, 1, 8, 3),
(8, 1, 9, 3),
(9, 1, 10, 3),
(10, 1, 11, 2),
(11, 1, 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `workoutProperty`
--

CREATE TABLE `workoutProperty` (
  `id` int(11) NOT NULL,
  `workoutBurnedCalories` int(11) NOT NULL,
  `workoutStartDate` datetime NOT NULL,
  `workoutStopDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `workoutProperty`
--

INSERT INTO `workoutProperty` (`id`, `workoutBurnedCalories`, `workoutStartDate`, `workoutStopDate`) VALUES
(3, 60, '2017-06-14 06:02:39', '2017-06-14 06:02:39'),
(4, 100, '2017-06-15 05:52:22', '2017-06-15 05:52:22'),
(5, 160, '2017-06-16 11:26:25', '2017-06-16 12:10:44'),
(6, 140, '2017-06-16 09:18:12', '2017-06-16 09:18:12'),
(7, 120, '2017-06-16 09:19:17', '2017-06-16 09:19:17'),
(8, 230, '2017-04-16 09:00:42', '2017-06-16 09:49:07'),
(9, 230, '2017-04-16 09:00:42', '2017-06-16 09:50:37'),
(10, 230, '2017-04-16 09:00:42', '2017-06-16 09:51:27'),
(11, 240, '2017-04-16 08:00:42', '2017-04-16 09:04:32'),
(12, 210, '2017-04-16 10:00:42', '2017-04-16 11:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `workoutType`
--

CREATE TABLE `workoutType` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `workoutType`
--

INSERT INTO `workoutType` (`id`, `name`) VALUES
(1, 'HIIT'),
(2, 'CARDIO'),
(3, 'ABS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `workout`
--
ALTER TABLE `workout`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_649FFB7211CB947` (`workoutPropertyId`),
  ADD KEY `IDX_649FFB724FABCE2E` (`workoutTypeId`);

--
-- Indexes for table `workoutProperty`
--
ALTER TABLE `workoutProperty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workoutType`
--
ALTER TABLE `workoutType`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `workout`
--
ALTER TABLE `workout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `workoutProperty`
--
ALTER TABLE `workoutProperty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `workoutType`
--
ALTER TABLE `workoutType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `workout`
--
ALTER TABLE `workout`
  ADD CONSTRAINT `FK_649FFB7211CB947` FOREIGN KEY (`workoutPropertyId`) REFERENCES `workoutProperty` (`id`),
  ADD CONSTRAINT `FK_649FFB724FABCE2E` FOREIGN KEY (`workoutTypeId`) REFERENCES `workoutType` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

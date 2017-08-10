-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 10, 2017 at 08:32 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:uuid)',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
('d6e66f53-843b-4dab-bb64-6faa91e5928e', 'Test', '123', 'test@email.test');

-- --------------------------------------------------------

--
-- Table structure for table `workout`
--

CREATE TABLE `workout` (
  `id` int(11) NOT NULL,
  `sportsmanId` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:uuid)',
  `workoutInformation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `workout`
--

INSERT INTO `workout` (`id`, `sportsmanId`, `workoutInformation`) VALUES
(3, 'd6e66f53-843b-4dab-bb64-6faa91e5928e', 3),
(4, 'd6e66f53-843b-4dab-bb64-6faa91e5928e', 4),
(5, 'd6e66f53-843b-4dab-bb64-6faa91e5928e', 5),
(6, 'd6e66f53-843b-4dab-bb64-6faa91e5928e', 6),
(7, 'd6e66f53-843b-4dab-bb64-6faa91e5928e', 7);

-- --------------------------------------------------------

--
-- Table structure for table `workoutInformation`
--

CREATE TABLE `workoutInformation` (
  `id` int(11) NOT NULL,
  `workoutBurnedCalories` int(11) NOT NULL,
  `workoutTime` int(11) DEFAULT NULL,
  `workoutType` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `workoutInformation`
--

INSERT INTO `workoutInformation` (`id`, `workoutBurnedCalories`, `workoutTime`, `workoutType`) VALUES
(3, 200, 2, 2),
(4, 200, 3, 2),
(5, 602, 4, 1),
(6, 234, 5, 1),
(7, 434, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `workoutTime`
--

CREATE TABLE `workoutTime` (
  `id` int(11) NOT NULL,
  `workoutStartDate` datetime NOT NULL,
  `workoutStopDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `workoutTime`
--

INSERT INTO `workoutTime` (`id`, `workoutStartDate`, `workoutStopDate`) VALUES
(2, '2017-08-10 19:53:50', '2017-08-10 19:53:50'),
(3, '2017-08-10 19:54:31', '2017-08-10 19:54:31'),
(4, '2017-08-10 20:28:14', '2017-08-10 20:28:14'),
(5, '2017-08-10 20:28:38', '2017-08-10 20:28:38'),
(6, '2017-08-10 20:28:44', '2017-08-10 20:28:44');

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Indexes for table `workout`
--
ALTER TABLE `workout`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_649FFB72A08A28A6` (`workoutInformation`);

--
-- Indexes for table `workoutInformation`
--
ALTER TABLE `workoutInformation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_A08A28A6B07F0C9` (`workoutTime`),
  ADD KEY `IDX_A08A28A6E84D3FA5` (`workoutType`);

--
-- Indexes for table `workoutTime`
--
ALTER TABLE `workoutTime`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `workoutInformation`
--
ALTER TABLE `workoutInformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `workoutTime`
--
ALTER TABLE `workoutTime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  ADD CONSTRAINT `FK_649FFB72A08A28A6` FOREIGN KEY (`workoutInformation`) REFERENCES `workoutInformation` (`id`);

--
-- Constraints for table `workoutInformation`
--
ALTER TABLE `workoutInformation`
  ADD CONSTRAINT `FK_A08A28A6B07F0C9` FOREIGN KEY (`workoutTime`) REFERENCES `workoutTime` (`id`),
  ADD CONSTRAINT `FK_A08A28A6E84D3FA5` FOREIGN KEY (`workoutType`) REFERENCES `workoutType` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

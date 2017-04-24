-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 23 Kwi 2017, 20:07
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `coffeeman`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `workout`
--

CREATE TABLE `workout` (
  `id` int(11) NOT NULL,
  `workoutPropertyId` int(11) DEFAULT NULL,
  `workoutTypeId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `workout`
--

INSERT INTO `workout` (`id`, `workoutPropertyId`, `workoutTypeId`) VALUES
  (1, 1, 1),
  (4, 3, 1),
  (5, 7, 5),
  (6, 9, 7),
  (7, 10, 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `workoutProperty`
--

CREATE TABLE `workoutProperty` (
  `id` int(11) NOT NULL,
  `workoutBurnedCalories` int(11) NOT NULL,
  `workoutStartDate` datetime NOT NULL,
  `workoutStopDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `workoutProperty`
--

INSERT INTO `workoutProperty` (`id`, `workoutBurnedCalories`, `workoutStartDate`, `workoutStopDate`) VALUES
  (1, 720, '2017-04-15 10:35:21', '2017-04-15 11:45:49'),
  (3, 200, '2017-04-22 18:43:11', '2017-04-22 18:43:11'),
  (7, 201, '2017-04-22 18:58:51', '2017-04-22 18:58:51'),
  (9, 201, '2017-04-22 18:59:49', '2017-04-22 18:59:49'),
  (10, 200, '2017-04-22 19:02:56', '2017-04-22 19:02:56');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `workoutType`
--

CREATE TABLE `workoutType` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `workoutType`
--

INSERT INTO `workoutType` (`id`, `name`) VALUES
  (1, 'HIIT'),
  (5, 'HIIT'),
  (7, 'HIIT'),
  (8, 'HIIT');

--
-- Indeksy dla zrzutów tabel
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
-- AUTO_INCREMENT dla tabeli `workout`
--
ALTER TABLE `workout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT dla tabeli `workoutProperty`
--
ALTER TABLE `workoutProperty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT dla tabeli `workoutType`
--
ALTER TABLE `workoutType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `workout`
--
ALTER TABLE `workout`
  ADD CONSTRAINT `FK_649FFB7211CB947` FOREIGN KEY (`workoutPropertyId`) REFERENCES `workoutProperty` (`id`),
  ADD CONSTRAINT `FK_649FFB724FABCE2E` FOREIGN KEY (`workoutTypeId`) REFERENCES `workoutType` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
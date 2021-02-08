-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Värd: localhost:3306
-- Tid vid skapande: 08 feb 2021 kl 13:55
-- Serverversion: 5.7.32
-- PHP-version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `employee-management`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `avdelning`
--

CREATE TABLE `avdelning` (
  `id` int(11) NOT NULL,
  `avdelning` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `avdelning`
--

INSERT INTO `avdelning` (`id`, `avdelning`) VALUES
(1, 'Utveckling'),
(2, 'Ekonomi');

-- --------------------------------------------------------

--
-- Tabellstruktur `befattning`
--

CREATE TABLE `befattning` (
  `id` int(11) NOT NULL,
  `befattning` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `befattning`
--

INSERT INTO `befattning` (`id`, `befattning`) VALUES
(1, 'Programmerare'),
(2, 'Sekreterare'),
(3, 'DBA');

-- --------------------------------------------------------

--
-- Tabellstruktur `kunskap`
--

CREATE TABLE `kunskap` (
  `person` int(11) NOT NULL,
  `kunskap` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `kunskap`
--

INSERT INTO `kunskap` (`person`, `kunskap`) VALUES
(2, 'MS SQL Server'),
(2, 'MySQL'),
(3, 'C++'),
(3, 'Java'),
(4, 'MS Office');

-- --------------------------------------------------------

--
-- Tabellstruktur `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `namn` varchar(50) NOT NULL,
  `befattning` int(11) NOT NULL,
  `avdelning` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `person`
--

INSERT INTO `person` (`id`, `namn`, `befattning`, `avdelning`) VALUES
(2, 'Bengt Svensson', 3, 1),
(3, 'Erik Persson', 1, 1),
(4, 'Camilla Blom', 2, 2),
(5, 'Nina Larsson', 1, 1);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `avdelning`
--
ALTER TABLE `avdelning`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `befattning`
--
ALTER TABLE `befattning`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `kunskap`
--
ALTER TABLE `kunskap`
  ADD PRIMARY KEY (`person`,`kunskap`);

--
-- Index för tabell `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`),
  ADD KEY `avdelning` (`avdelning`),
  ADD KEY `befattning` (`befattning`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `avdelning`
--
ALTER TABLE `avdelning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT för tabell `befattning`
--
ALTER TABLE `befattning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `kunskap`
--
ALTER TABLE `kunskap`
  ADD CONSTRAINT `kunskap` FOREIGN KEY (`person`) REFERENCES `person` (`id`) ON DELETE CASCADE;

--
-- Restriktioner för tabell `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `avdelning` FOREIGN KEY (`avdelning`) REFERENCES `avdelning` (`id`),
  ADD CONSTRAINT `befattning` FOREIGN KEY (`befattning`) REFERENCES `befattning` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

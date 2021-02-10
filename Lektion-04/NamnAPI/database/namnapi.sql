-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Värd: localhost:3306
-- Tid vid skapande: 10 feb 2021 kl 10:47
-- Serverversion: 5.7.32
-- PHP-version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `namnapi`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `firstNamesFemale`
--

CREATE TABLE `firstNamesFemale` (
  `firstNamesFemale` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `firstNamesFemale`
--

INSERT INTO `firstNamesFemale` (`firstNamesFemale`) VALUES
('Agneta'),
('Alexandra'),
('Alice'),
('Amanda '),
('Anette'),
('Anita'),
('Ann'),
('Ann-Christin'),
('Ann-Marie'),
('Anna'),
('Anneli'),
('Annika'),
('Astrid'),
('Barbro'),
('Berit'),
('Birgit'),
('Birgitta'),
('Britt'),
('Britt-Marie'),
('Britta'),
('Camilla'),
('Carina'),
('Caroline'),
('Cecilia'),
('Charlotte'),
('Ebba'),
('Elin'),
('Elisabeth'),
('Ellen'),
('Elsa'),
('Emelie'),
('Emma'),
('Erika'),
('Eva'),
('Felicia'),
('Frida'),
('Gerd'),
('Gun'),
('Gunilla'),
('Gunnel'),
('Hanna'),
('Helen'),
('Helena'),
('Ida '),
('Inga'),
('Ingegerd'),
('Ingela'),
('Inger'),
('Ingrid'),
('Irene'),
('Isabelle '),
('Jenny'),
('Jessica'),
('Johanna'),
('Josefin'),
('Julia'),
('Karin'),
('Katarina'),
('Kerstin'),
('Klara'),
('Kristina'),
('Lena'),
('Lina'),
('Linda'),
('Linnéa'),
('Lisa'),
('Lisbeth'),
('Louise'),
('Madeleine'),
('Maj'),
('Maj-Britt'),
('Maja'),
('Malin'),
('Margareta'),
('Maria'),
('Marianne'),
('Marie'),
('Matilda'),
('Moa'),
('Mona'),
('Monica'),
('Nathalie'),
('Pernilla'),
('Pia'),
('Rebecka'),
('Rut'),
('Sandra'),
('Sara'),
('Siv'),
('Sofia'),
('Sofie'),
('Solveig'),
('Sonja'),
('Susanne'),
('Therese'),
('Ulla'),
('Ulrika'),
('Viktoria'),
('Yvonne'),
('Åsa');

-- --------------------------------------------------------

--
-- Tabellstruktur `firstNamesMale`
--

CREATE TABLE `firstNamesMale` (
  `firstNamesMale` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `firstNamesMale`
--

INSERT INTO `firstNamesMale` (`firstNamesMale`) VALUES
('Adam'),
('Albin'),
('Alexander'),
('Alf'),
('Anders'),
('Andreas'),
('Anton'),
('Arne'),
('Axel'),
('Bengt'),
('Bernt'),
('Bertil'),
('Björn'),
('Bo'),
('Christer'),
('Christian'),
('Christoffer'),
('Claes'),
('Dan'),
('Daniel'),
('David'),
('Dennis'),
('Elias'),
('Emil'),
('Erik'),
('Filip'),
('Fredrik'),
('Gunnar'),
('Gustav'),
('Göran'),
('Hans'),
('Henrik'),
('Hugo '),
('Håkan'),
('Isak'),
('Jakob'),
('Jan'),
('Jens'),
('Jesper'),
('Jimmy'),
('Joakim'),
('Joel'),
('Johan'),
('John'),
('Johnny'),
('Jonas'),
('Jonathan'),
('Jörgen'),
('Karl'),
('Kenneth'),
('Kent'),
('Kjell'),
('Kurt'),
('Lars'),
('Leif'),
('Lennart'),
('Linus'),
('Lucas'),
('Ludvig'),
('Magnus'),
('Marcus'),
('Martin'),
('Mats'),
('Mattias'),
('Max'),
('Mikael'),
('Mohammed'),
('Niklas'),
('Nils '),
('Oliver'),
('Olof'),
('Oskar'),
('Ove'),
('Patrik'),
('Per'),
('Peter'),
('Pontus'),
('Rasmus'),
('Rickard'),
('Robert'),
('Robin'),
('Roger'),
('Roland'),
('Rolf'),
('Rune'),
('Sebastian'),
('Simon'),
('Stefan'),
('Sten'),
('Stig'),
('Sven'),
('Thomas'),
('Tobias'),
('Tommy'),
('Tony'),
('Torbjörn'),
('Ulf'),
('Viktor'),
('William'),
('Åke');

-- --------------------------------------------------------

--
-- Tabellstruktur `lastNames`
--

CREATE TABLE `lastNames` (
  `lastNames` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `lastNames`
--

INSERT INTO `lastNames` (`lastNames`) VALUES
('Abrahamsson'),
('Andersson'),
('Andreasson'),
('Arvidsson'),
('Axelsson'),
('Bengtsson'),
('Berg'),
('Berggren'),
('Berglund'),
('Bergman'),
('Bergqvist'),
('Bergström'),
('Björk'),
('Björklund'),
('Blom'),
('Blomqvist'),
('Claesson'),
('Dahlberg'),
('Danielsson'),
('Ek'),
('Eklund'),
('Ekström'),
('Eliasson'),
('Engström'),
('Eriksson'),
('Falk'),
('Forsberg'),
('Fransson'),
('Fredriksson'),
('Gunnarsson'),
('Gustafsson'),
('Göransson'),
('Hansen'),
('Hansson'),
('Hedlund'),
('Hellström'),
('Henriksson'),
('Hermansson'),
('Holm'),
('Holmberg'),
('Holmgren'),
('Holmqvist'),
('Håkansson'),
('Isaksson'),
('Ivarsson'),
('Jakobsson'),
('Jansson'),
('Johansson'),
('Jonasson'),
('Jonsson'),
('Jönsson'),
('Karlsson'),
('Larsson'),
('Lind'),
('Lindberg'),
('Lindgren'),
('Lindqvist'),
('Lindström'),
('Lund'),
('Lundberg'),
('Lundgren'),
('Lundin'),
('Lundqvist'),
('Lundström'),
('Löfgren'),
('Magnusson'),
('Martinsson'),
('Mattsson'),
('Månsson'),
('Mårtensson'),
('Nilsson'),
('Norberg'),
('Nordin'),
('Nordström'),
('Nyberg'),
('Nyström'),
('Olofsson'),
('Olsson'),
('Persson'),
('Pettersson'),
('Pålsson'),
('Samuelsson'),
('Sandberg'),
('Sandström'),
('Sjöberg'),
('Sjögren'),
('Ström'),
('Strömberg'),
('Sundberg'),
('Sundqvist'),
('Sundström'),
('Svensson'),
('Söderberg'),
('Viklund'),
('Vikström'),
('Wallin'),
('Åberg'),
('Åkesson'),
('Åström'),
('Öberg');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `firstNamesFemale`
--
ALTER TABLE `firstNamesFemale`
  ADD PRIMARY KEY (`firstNamesFemale`);

--
-- Index för tabell `firstNamesMale`
--
ALTER TABLE `firstNamesMale`
  ADD PRIMARY KEY (`firstNamesMale`);

--
-- Index för tabell `lastNames`
--
ALTER TABLE `lastNames`
  ADD PRIMARY KEY (`lastNames`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

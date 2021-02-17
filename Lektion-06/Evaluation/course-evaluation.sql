-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Värd: localhost:3306
-- Tid vid skapande: 16 feb 2021 kl 16:44
-- Serverversion: 5.7.32
-- PHP-version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `course-evaluation`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `answers`
--

CREATE TABLE `answers` (
  `survey_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `answers`
--

INSERT INTO `answers` (`survey_id`, `question_id`, `answer`) VALUES
(15, 1, 'BÖRJA 1'),
(15, 2, 'SLUTA 1'),
(15, 3, 'FORTSÄTTA 1'),
(16, 1, 'BÖRJA 2'),
(16, 2, 'SLUTA 2'),
(16, 3, 'FORTSÄTTA 2'),
(17, 1, 'BÖRJA 1'),
(17, 2, 'SLUTA 2'),
(17, 3, 'FORTSÄTTA 2'),
(18, 1, 'BÖRJA 2'),
(18, 2, ''),
(18, 3, ''),
(19, 1, 'BÖRJA 1'),
(19, 2, 'SLUTA 1'),
(19, 3, 'FORTSÄTTA 1'),
(20, 1, 'BÖRJA 1'),
(20, 2, 'SLUTA 1'),
(20, 3, 'FORTSÄTTA 1'),
(21, 1, 'BÖRJA med för att göra denna kurs mer givande'),
(21, 2, 'SLUTA med som du inte anser är bra eller relevant för kursen'),
(21, 3, 'FORTSÄTTA göra som vi redan gör idag'),
(22, 1, 'Jag vill börja'),
(22, 2, 'Jag vill sluta'),
(22, 3, 'Jag vill fortsätta'),
(23, 1, 'BÖRJA jQuery'),
(23, 2, 'SLUTA CSS'),
(23, 3, 'FORTSÄTTA JavaScript'),
(24, 1, 'BÖRJA jQuery'),
(24, 2, 'SLUTA CSS'),
(24, 3, 'FORTSÄTTA JavaScript'),
(25, 1, 'BÖRJA jQuery'),
(25, 2, 'SLUTA CSS'),
(25, 3, 'FORTSÄTTA JavaScript'),
(26, 1, 'BÖRJA Anonymt'),
(26, 2, 'SLUTA Anonymt'),
(26, 3, 'FORTSÄTTA Anonymt'),
(27, 1, 'BÖRJA Anonymt '),
(27, 2, 'SLUTA Anonymt '),
(27, 3, 'FORTSÄTTA Anonymt '),
(28, 1, 'BÖRJA Anonymt '),
(28, 2, 'SLUTA Anonymt '),
(28, 3, 'FORTSÄTTA Anonymt '),
(29, 1, 'BÖRJA 1'),
(29, 2, 'SLUTA 1'),
(29, 3, 'FORTSÄTTA 1'),
(30, 1, 'BÖRJA 2'),
(30, 2, 'SLUTA 2'),
(30, 3, 'FORTSÄTTA 2'),
(31, 1, 'BÖRJA 3'),
(31, 2, 'SLUTA 3'),
(31, 3, 'FORTSÄTTA 3');

-- --------------------------------------------------------

--
-- Tabellstruktur `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `courses`
--

INSERT INTO `courses` (`course_id`, `name`) VALUES
(1, 'Frontend'),
(2, 'Backend'),
(3, 'Databasteknik'),
(4, 'Java');

-- --------------------------------------------------------

--
-- Tabellstruktur `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `questions`
--

INSERT INTO `questions` (`question_id`, `question`) VALUES
(1, 'Finns det något du vill att vi ska BÖRJA med för att göra denna kurs mer givande?'),
(2, 'Finns det något du vill att vi ska SLUTA med som du inte anser är bra eller relevant för kursen?'),
(3, 'Vad vill du att vi ska FORTSÄTTA göra som vi redan gör idag?');

-- --------------------------------------------------------

--
-- Tabellstruktur `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `students`
--

INSERT INTO `students` (`student_id`, `name`) VALUES
(16, 'Mahmud Al Hakim'),
(17, 'Mahmud Al Hakim'),
(18, 'Mahmud Al Hakim'),
(19, 'Mahmud Al Hakim'),
(20, ''),
(21, 'Anonym'),
(22, 'Anonym'),
(23, 'Yasmin'),
(24, 'Anonym'),
(25, 'Anonym'),
(26, 'Anonym'),
(27, 'Mahmud');

-- --------------------------------------------------------

--
-- Tabellstruktur `surveys`
--

CREATE TABLE `surveys` (
  `survey_id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `student` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `surveys`
--

INSERT INTO `surveys` (`survey_id`, `course`, `student`) VALUES
(15, 1, 16),
(16, 1, 17),
(17, 2, 18),
(18, 2, 19),
(19, 1, 20),
(20, 3, 21),
(21, 2, 22),
(22, 3, 23),
(23, 1, 24),
(24, 1, 25),
(25, 1, 26),
(26, 1, NULL),
(27, 2, NULL),
(28, 2, NULL),
(29, 4, NULL),
(30, 4, 27),
(31, 4, NULL);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`survey_id`,`question_id`),
  ADD KEY `question` (`question_id`);

--
-- Index för tabell `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Index för tabell `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Index för tabell `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Index för tabell `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`survey_id`),
  ADD KEY `course` (`course`),
  ADD KEY `student` (`student`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT för tabell `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT för tabell `surveys`
--
ALTER TABLE `surveys`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `question` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`),
  ADD CONSTRAINT `survey` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`survey_id`);

--
-- Restriktioner för tabell `surveys`
--
ALTER TABLE `surveys`
  ADD CONSTRAINT `course` FOREIGN KEY (`course`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `student` FOREIGN KEY (`student`) REFERENCES `students` (`student_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

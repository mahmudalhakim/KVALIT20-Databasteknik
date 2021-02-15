-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Värd: localhost:3306
-- Tid vid skapande: 15 feb 2021 kl 10:56
-- Serverversion: 5.7.32
-- PHP-version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `moviedb`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `email`) VALUES
(1, 'Mahmud Al Hakim', 'mahmud@alhakim.com'),
(2, 'Yasmin Al Hakim', 'yasmin@alhakim.com');

-- --------------------------------------------------------

--
-- Tabellstruktur `films`
--

CREATE TABLE `films` (
  `film_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_swedish_ci DEFAULT 'no-poster.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `films`
--

INSERT INTO `films` (`film_id`, `title`, `price`, `image`) VALUES
(1, 'Braveheart', 20, 'Braveheart.jpg'),
(2, 'Matrix', 40, 'Matrix.jpg'),
(3, 'Fight Club', 15, 'Fight-Club.jpg'),
(4, 'Patrioten', 15, 'The-Patriot.jpg'),
(5, 'GoldenEye', 30, 'GoldenEye.jpg'),
(6, 'Blair Witch Project', 25, 'Blair-Witch-Project.jpg'),
(7, 'Dum dummare', 30, 'no-poster.png'),
(8, 'Dödslängtan', 30, 'no-poster.png');

-- --------------------------------------------------------

--
-- Tabellstruktur `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `film_ID` int(11) NOT NULL,
  `order_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `film_ID`, `order_date`) VALUES
(1, 2, 3, '2021-02-15 10:58:15'),
(2, 2, 7, '2021-02-15 11:00:39');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Index för tabell `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`film_id`);

--
-- Index för tabell `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `film_ID` (`film_ID`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT för tabell `films`
--
ALTER TABLE `films`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT för tabell `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`film_ID`) REFERENCES `films` (`film_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

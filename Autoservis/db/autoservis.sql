-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2018 at 02:01 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autoservis`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresa`
--

CREATE TABLE `adresa` (
  `adresa_id` int(11) NOT NULL,
  `ulice` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `cislo_popisne` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `mesto` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `psc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `adresa`
--

INSERT INTO `adresa` (`adresa_id`, `ulice`, `cislo_popisne`, `mesto`, `psc`) VALUES
(1, 'main', 'main', 'main', 0),
(2, 'Lutyňská', '1945', 'Rychvald', 73532),
(3, 'Školní', '457', 'Ostrava', 70245);

-- --------------------------------------------------------

--
-- Table structure for table `auto`
--

CREATE TABLE `auto` (
  `auto_id` int(11) NOT NULL,
  `spz` varchar(8) COLLATE utf8_czech_ci NOT NULL,
  `znacka` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `model` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `rok_vyroby` varchar(4) COLLATE utf8_czech_ci NOT NULL,
  `motor` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `provozovatel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `auto`
--

INSERT INTO `auto` (`auto_id`, `spz`, `znacka`, `model`, `rok_vyroby`, `motor`, `provozovatel_id`) VALUES
(1, 'nové', 'nové', 'nové', 'nové', 'nové', 1),
(2, '8T91821', 'Subaru', 'WRX STI', '2019', '2.5 liter EJ20', 2),
(3, '5T67894', 'Mazda', 'mx-5', '1997', '2.0 liter', 3);

-- --------------------------------------------------------

--
-- Table structure for table `provozovatel`
--

CREATE TABLE `provozovatel` (
  `provozovatel_id` int(11) NOT NULL,
  `firma` varchar(50) COLLATE utf8_czech_ci DEFAULT 'jednotlivec',
  `jmeno` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `prijmeni` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `adresa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `provozovatel`
--

INSERT INTO `provozovatel` (`provozovatel_id`, `firma`, `jmeno`, `prijmeni`, `telefon`, `email`, `password`, `adresa_id`) VALUES
(1, 'main', 'main', 'main', 'main', 'admin', 'RyosukeFC', 1),
(2, 'jednotlivec', 'Martin', 'Šmídl', '725813446', 'm.smidl.st@spseiostrava.cz', 'RyosukeFC', 2),
(3, 'jednotlivec', 'Jirka', 'Gazdík', '758964213', 'marek.sindelar@gmail.com', 'RyosukeFC', 3);

-- --------------------------------------------------------

--
-- Table structure for table `servisak`
--

CREATE TABLE `servisak` (
  `servisak_id` int(11) NOT NULL,
  `jmeno` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `prijmeni` varchar(45) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `servisak`
--

INSERT INTO `servisak` (`servisak_id`, `jmeno`, `prijmeni`) VALUES
(1, 'Pepa', 'Vepřek'),
(2, 'Franta', 'Popleta');

-- --------------------------------------------------------

--
-- Table structure for table `servisni_objednavka`
--

CREATE TABLE `servisni_objednavka` (
  `servisni_objednavka_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `stav` varchar(10) COLLATE utf8_czech_ci NOT NULL DEFAULT 'přijata',
  `provozovatel_id` int(11) NOT NULL,
  `auto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servisni_objednavka_radky`
--

CREATE TABLE `servisni_objednavka_radky` (
  `servisni_objednavka_radky_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `cena` int(11) NOT NULL,
  `popis` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `typ_zasahu_id` int(11) NOT NULL,
  `servisak_id` int(11) NOT NULL,
  `servisni_objednavka_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Table structure for table `typ_zasahu`
--

CREATE TABLE `typ_zasahu` (
  `typ_zasahu_id` int(11) NOT NULL,
  `nazev` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `typ_zasahu`
--

INSERT INTO `typ_zasahu` (`typ_zasahu_id`, `nazev`, `cena`) VALUES
(1, 'jiné', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresa`
--
ALTER TABLE `adresa`
  ADD PRIMARY KEY (`adresa_id`);

--
-- Indexes for table `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`auto_id`),
  ADD KEY `fk_Auto_Provozovatel1_idx` (`provozovatel_id`);

--
-- Indexes for table `provozovatel`
--
ALTER TABLE `provozovatel`
  ADD PRIMARY KEY (`provozovatel_id`),
  ADD KEY `fk_Provozovatel_Adresa_idx` (`adresa_id`);

--
-- Indexes for table `servisak`
--
ALTER TABLE `servisak`
  ADD PRIMARY KEY (`servisak_id`);

--
-- Indexes for table `servisni_objednavka`
--
ALTER TABLE `servisni_objednavka`
  ADD PRIMARY KEY (`servisni_objednavka_id`),
  ADD KEY `fk_Servisni_Objednavka_Provozovatel1_idx` (`provozovatel_id`),
  ADD KEY `fk_Servisni_Objednavka_Auto1_idx` (`auto_id`);

--
-- Indexes for table `servisni_objednavka_radky`
--
ALTER TABLE `servisni_objednavka_radky`
  ADD PRIMARY KEY (`servisni_objednavka_radky_id`),
  ADD KEY `fk_Servisni_Objednavka_Radky_Typ_Zasahu1_idx` (`typ_zasahu_id`),
  ADD KEY `fk_Servisni_Objednavka_Radky_Servisak1_idx` (`servisak_id`),
  ADD KEY `fk_Servisni_Objednavka_Radky_Servisni_Objednavka1_idx` (`servisni_objednavka_id`);

--
-- Indexes for table `typ_zasahu`
--
ALTER TABLE `typ_zasahu`
  ADD PRIMARY KEY (`typ_zasahu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adresa`
--
ALTER TABLE `adresa`
  MODIFY `adresa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auto`
--
ALTER TABLE `auto`
  MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `provozovatel`
--
ALTER TABLE `provozovatel`
  MODIFY `provozovatel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `servisak`
--
ALTER TABLE `servisak`
  MODIFY `servisak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `servisni_objednavka`
--
ALTER TABLE `servisni_objednavka`
  MODIFY `servisni_objednavka_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servisni_objednavka_radky`
--
ALTER TABLE `servisni_objednavka_radky`
  MODIFY `servisni_objednavka_radky_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `typ_zasahu`
--
ALTER TABLE `typ_zasahu`
  MODIFY `typ_zasahu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `fk_Auto_Provozovatel1` FOREIGN KEY (`provozovatel_id`) REFERENCES `provozovatel` (`provozovatel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `provozovatel`
--
ALTER TABLE `provozovatel`
  ADD CONSTRAINT `fk_Provozovatel_Adresa` FOREIGN KEY (`adresa_id`) REFERENCES `adresa` (`adresa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `servisni_objednavka`
--
ALTER TABLE `servisni_objednavka`
  ADD CONSTRAINT `fk_Servisni_Objednavka_Auto1` FOREIGN KEY (`auto_id`) REFERENCES `auto` (`auto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Servisni_Objednavka_Provozovatel1` FOREIGN KEY (`provozovatel_id`) REFERENCES `provozovatel` (`provozovatel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `servisni_objednavka_radky`
--
ALTER TABLE `servisni_objednavka_radky`
  ADD CONSTRAINT `fk_Servisni_Objednavka_Radky_Servisak1` FOREIGN KEY (`servisak_id`) REFERENCES `servisak` (`servisak_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Servisni_Objednavka_Radky_Servisni_Objednavka1` FOREIGN KEY (`servisni_objednavka_id`) REFERENCES `servisni_objednavka` (`servisni_objednavka_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Servisni_Objednavka_Radky_Typ_Zasahu1` FOREIGN KEY (`typ_zasahu_id`) REFERENCES `typ_zasahu` (`typ_zasahu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

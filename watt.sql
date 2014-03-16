-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vygenerováno: Ned 16. bře 2014, 14:40
-- Verze serveru: 5.5.35-0ubuntu0.13.10.2
-- Verze PHP: 5.5.3-1ubuntu2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `watt`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `Emploees`
--

CREATE TABLE IF NOT EXISTS `Emploees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificator of the emploee',
  `name` varchar(65) COLLATE utf8_czech_ci NOT NULL COMMENT 'Name of the emploee',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `id_2` (`id`),
  KEY `id_3` (`id`),
  KEY `id_4` (`id`),
  KEY `id_5` (`id`),
  KEY `id_6` (`id`),
  KEY `id_7` (`id`),
  KEY `id_8` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Table of the emploees' AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `Emploees`
--

INSERT INTO `Emploees` (`id`, `name`) VALUES
(1, 'Andrei'),
(2, 'Kolja');

-- --------------------------------------------------------

--
-- Struktura tabulky `WorkRecord`
--

CREATE TABLE IF NOT EXISTS `WorkRecord` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificator of the work record',
  `employee` int(10) unsigned NOT NULL COMMENT 'Identificator of the emploee assigned to this record',
  `workPlace` text COLLATE utf8_czech_ci NOT NULL COMMENT 'Address of the work place',
  `workType` text COLLATE utf8_czech_ci NOT NULL COMMENT 'What was done',
  `date` date NOT NULL COMMENT 'Date for this record',
  `startTime` time NOT NULL COMMENT 'Time when work started',
  `stopTime` time NOT NULL COMMENT 'Time when work ended',
  `advance` int(10) unsigned NOT NULL COMMENT 'Money paid to the emploee before withdraw',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

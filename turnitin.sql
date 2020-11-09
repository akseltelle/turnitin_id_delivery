-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12. Okt, 2020 11:07 AM
-- Tjener-versjon: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `turnitin`
--
CREATE DATABASE IF NOT EXISTS `turnitin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `turnitin`;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `turnitin`
--

CREATE TABLE `turnitin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `turnitin` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `turnitin`
--

INSERT INTO `turnitin` (`id`, `name`, `turnitin`, `active`) VALUES
(1, 'test', '00000', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `turnitin`
--
ALTER TABLE `turnitin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `turnitin`
--
ALTER TABLE `turnitin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

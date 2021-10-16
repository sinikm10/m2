-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2021 at 02:04 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bolnica`
--

-- --------------------------------------------------------

--
-- Table structure for table `pacijenti`
--

CREATE TABLE `pacijenti` (
  `id_pacijenta` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `jmbg` bigint(20) NOT NULL,
  `datum_rodjenja` varchar(255) NOT NULL,
  `id_vrste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pacijenti`
--

INSERT INTO `pacijenti` (`id_pacijenta`, `ime`, `prezime`, `jmbg`, `datum_rodjenja`, `id_vrste`) VALUES
(1, 'Marko', 'Sinik', 1112998710193, '11.12.1998', 1),
(3, 'Ivan', 'Ivanovic', 1122333444555, '1.11.1993', 1),
(4, 'petar', 'perovic', 1212333444533, '11.11.1991', 1),
(5, 'Nikola', 'Nikolic', 2147483647, '11.1.1984', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vrste`
--

CREATE TABLE `vrste` (
  `id_vrste` int(11) NOT NULL,
  `naziv_vrste` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vrste`
--

INSERT INTO `vrste` (`id_vrste`, `naziv_vrste`) VALUES
(1, 'Pedijatrija'),
(2, 'Hirurgija'),
(3, 'Kardiologija'),
(4, 'Interna'),
(5, 'Pulmologija\r\n'),
(6, 'Ortopedija');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pacijenti`
--
ALTER TABLE `pacijenti`
  ADD PRIMARY KEY (`id_pacijenta`),
  ADD KEY `id_vrste` (`id_vrste`);

--
-- Indexes for table `vrste`
--
ALTER TABLE `vrste`
  ADD PRIMARY KEY (`id_vrste`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pacijenti`
--
ALTER TABLE `pacijenti`
  MODIFY `id_pacijenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

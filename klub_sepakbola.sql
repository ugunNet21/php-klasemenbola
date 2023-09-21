-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 07:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klub_sepakbola`
--

-- --------------------------------------------------------

--
-- Table structure for table `klub`
--

CREATE TABLE `klub` (
  `NamaKlub` varchar(255) NOT NULL,
  `KotaKlub` varchar(255) DEFAULT NULL,
  `Point` int(11) DEFAULT NULL,
  `Ma` int(11) DEFAULT 0,
  `Me` int(11) DEFAULT 0,
  `S` int(11) DEFAULT 0,
  `K` int(11) DEFAULT 0,
  `GM` int(11) DEFAULT 0,
  `GK` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klub`
--

INSERT INTO `klub` (`NamaKlub`, `KotaKlub`, `Point`, `Ma`, `Me`, `S`, `K`, `GM`, `GK`) VALUES
('Arema', 'Malang', 0, 0, 0, 0, 0, 0, 0),
('persib', 'Bandung', 0, 0, 0, 0, 0, 0, 0),
('Persija', 'Jakarta', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pertandingan`
--

CREATE TABLE `pertandingan` (
  `IDPertandingan` int(11) NOT NULL,
  `Klub1` varchar(255) DEFAULT NULL,
  `Klub2` varchar(255) DEFAULT NULL,
  `Score1` int(11) DEFAULT NULL,
  `Score2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pertandingan`
--

INSERT INTO `pertandingan` (`IDPertandingan`, `Klub1`, `Klub2`, `Score1`, `Score2`) VALUES
(3, 'Persib', 'persib', 2, 3),
(4, 'Persib', 'Arema', 4, 3),
(5, 'Persija', 'Arema', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klub`
--
ALTER TABLE `klub`
  ADD PRIMARY KEY (`NamaKlub`);

--
-- Indexes for table `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD PRIMARY KEY (`IDPertandingan`),
  ADD KEY `Klub1` (`Klub1`),
  ADD KEY `Klub2` (`Klub2`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pertandingan`
--
ALTER TABLE `pertandingan`
  MODIFY `IDPertandingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD CONSTRAINT `pertandingan_ibfk_1` FOREIGN KEY (`Klub1`) REFERENCES `klub` (`NamaKlub`),
  ADD CONSTRAINT `pertandingan_ibfk_2` FOREIGN KEY (`Klub2`) REFERENCES `klub` (`NamaKlub`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

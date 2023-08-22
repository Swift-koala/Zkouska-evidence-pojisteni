-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 08:00 PM
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
-- Database: `db_evidence`
--

-- --------------------------------------------------------

--
-- Table structure for table `pojištěnci`
--

CREATE TABLE `pojištěnci` (
  `Telefon` varchar(12) NOT NULL,
  `Jméno` text NOT NULL,
  `Příjmení` text NOT NULL,
  `Věk` int(11) NOT NULL,
  `pojistenec_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `pojištěnci`
--

INSERT INTO `pojištěnci` (`Telefon`, `Jméno`, `Příjmení`, `Věk`, `pojistenec_id`) VALUES
('603 288 399', 'Lenka', 'Nováková', 25, 9),
('604 336 994', 'Jana', 'Nováková', 31, 10),
('603 336 963', 'Andrea', 'Buchtová', 49, 11),
('603 633 125', 'Tomáš', 'Kučera', 66, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pojištěnci`
--
ALTER TABLE `pojištěnci`
  ADD PRIMARY KEY (`pojistenec_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pojištěnci`
--
ALTER TABLE `pojištěnci`
  MODIFY `pojistenec_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

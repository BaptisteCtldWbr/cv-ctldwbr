-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-catelandwambre.alwaysdata.net
-- Generation Time: Nov 18, 2024 at 11:22 PM
-- Server version: 10.6.18-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catelandwambre_cv-portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `langue`
--

CREATE TABLE `langue` (
  `id` int(3) NOT NULL,
  `emoji` varchar(32) NOT NULL COMMENT 'Emoji drapeau HTML ',
  `langue` varchar(32) NOT NULL,
  `niveau` varchar(32) NOT NULL,
  `valide` int(11) NOT NULL COMMENT '0 = faux / 1 = vrai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `langue`
--

INSERT INTO `langue` (`id`, `emoji`, `langue`, `niveau`, `valide`) VALUES
(1, '&#x1F1EB;&#x1F1F7;', 'Français', 'Langue maternelle', 1),
(2, '&#x1F1EC;&#x1F1E7;', 'Anglais', 'Niveau correct', 1),
(3, '&#x1F1EA;&#x1F1F8;', 'Espagnol', 'Niveau débutant', 1),
(4, '&#x1F1E9;&#x1F1EA;', 'Allemand', 'Niveau débutant', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `langue`
--
ALTER TABLE `langue`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

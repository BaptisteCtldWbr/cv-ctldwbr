-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-catelandwambre.alwaysdata.net
-- Generation Time: Nov 18, 2024 at 11:21 PM
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
-- Table structure for table `interet`
--

CREATE TABLE `interet` (
  `id` int(11) NOT NULL,
  `texte` varchar(32) NOT NULL,
  `emoji` varchar(16) NOT NULL COMMENT 'Emoji HTML',
  `valide` int(11) NOT NULL COMMENT '0 = faux / 1 = vrai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interet`
--

INSERT INTO `interet` (`id`, `texte`, `emoji`, `valide`) VALUES
(1, 'Drone (Stabilisé et FPV)', '&#x1F6F8;', 1),
(2, 'Audiovisuel / Court-métrages', '&#x1F3AC;', 1),
(3, 'Montage', '&#x2328;&#xFE0F;', 1),
(4, 'Photographie', '&#x1F4F7;', 1),
(5, 'Voyage', '&#x1F9ED;', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `interet`
--
ALTER TABLE `interet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `interet`
--
ALTER TABLE `interet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

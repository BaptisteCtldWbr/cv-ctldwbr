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
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `lien` varchar(64) NOT NULL,
  `texte` varchar(64) NOT NULL,
  `id-bootstrap` text NOT NULL,
  `valide` int(1) NOT NULL COMMENT '0 = faux / 1 = vrai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `lien`, `texte`, `id-bootstrap`, `valide`) VALUES
(7, 'mailto:baptiste.catelandwambre@gmail.com', 'baptiste.​​​catelandwambre​@gmail.com', 'envelope-fill', 1),
(8, 'https://www.linkedin.com/in/baptiste-ctldwbr/', '/baptiste-ctldwbr', 'linkedin', 1),
(9, 'https://github.com/BaptisteCtldWbr', '/BaptisteCtldWbr', 'github', 1),
(10, 'https://www.youtube.com/@baptistedrone', '@baptistedrone', 'youtube', 1),
(11, 'https://www.instagram.com/baptiste.drone/', '@baptiste.drone', 'instagram', 1),
(12, '', 'Paris 13<sup>e</sup>', 'geo-alt-fill', 1),
(13, 'https://www.behance.net/baptistectldwbr', '/baptistectldwbr', 'behance', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

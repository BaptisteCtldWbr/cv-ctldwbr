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
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `date-debut` date NOT NULL COMMENT 'pour le tri',
  `icone` varchar(32) NOT NULL COMMENT 'nom du fichier .png',
  `alt-icone` varchar(64) NOT NULL,
  `titre` varchar(64) NOT NULL,
  `titre-detail` varchar(64) NOT NULL,
  `periode` varchar(64) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `competences` varchar(1024) NOT NULL,
  `valide` int(11) NOT NULL COMMENT '0 = faux / 1 = vrai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `date-debut`, `icone`, `alt-icone`, `titre`, `titre-detail`, `periode`, `description`, `competences`, `valide`) VALUES
(1, '2021-09-01', 'llg.png', 'Logo Louis le Gra', 'Baccalauréat STI2D', 'Lycée Louis le Grand', 'Septembre 2021 - Juin 2022', 'Baccalauréat Sciences et Technologie de l’Ingénierie et du Développement Durable, option Système Informatiques et Numériques au Lycée Louis le Grand – Mention très bien', '', 1),
(2, '2023-09-01', 'cyiut.png', 'Logo CYU', 'BUT Métiers du Multimédia et de l&#039;Internet', 'IUT de Cergy Pontoise', 'Septembre 2023 à Juin 2026', '', '', 1),
(9, '2021-03-07', 'taf.png', 'Petits boulots', 'Travail en indépendant', 'Test', 'A partir de septembre 2021', 'Prout', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

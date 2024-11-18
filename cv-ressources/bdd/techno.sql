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
-- Table structure for table `techno`
--

CREATE TABLE `techno` (
  `id` int(11) NOT NULL,
  `icone` varchar(32) NOT NULL COMMENT 'nom du fichier de l''icône',
  `alt-icone` varchar(64) NOT NULL,
  `valide` int(11) NOT NULL COMMENT '0=faux/1=vrai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `techno`
--

INSERT INTO `techno` (`id`, `icone`, `alt-icone`, `valide`) VALUES
(1, 'html.png', 'HTML', 1),
(2, 'css.png', 'CSS', 1),
(3, 'js.png', 'Javascript', 1),
(4, 'php.png', 'PHP', 1),
(5, 'github.png', 'Github', 1),
(6, 'wp.png', 'WordPress', 0),
(7, 'davinci.png', 'Davinci Resolve', 1),
(8, 'figma.png', 'Figma', 1),
(9, 'drive.png', 'Google Drive et sa suite', 1),
(10, 'id.png', 'Adobe Indesign', 0),
(11, 'ai.png', 'Adobe Illustrator', 0),
(12, 'ps.png', 'Adobe Photoshop', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `techno`
--
ALTER TABLE `techno`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `techno`
--
ALTER TABLE `techno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

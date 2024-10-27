-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-catelandwambre.alwaysdata.net
-- Generation Time: Oct 27, 2024 at 10:46 PM
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
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `url` varchar(64) NOT NULL COMMENT 'titre court avec espaces remplacés par des tirets',
  `nom-complet` varchar(128) NOT NULL,
  `nom-court` varchar(32) NOT NULL,
  `miniature` varchar(128) NOT NULL COMMENT 'chemin d''accès (png)',
  `alt-miniature` varchar(128) NOT NULL COMMENT 'Description de l''image',
  `contexte` varchar(128) NOT NULL,
  `periode` varchar(64) NOT NULL,
  `tags` varchar(128) NOT NULL COMMENT 'termes séparés par des virgules, voir lesquels dans fonctions-donnees.php ',
  `description` varchar(255) NOT NULL,
  `contenu` varchar(128) NOT NULL COMMENT 'chemin d''accès (html)',
  `statut` varchar(4) NOT NULL COMMENT '/ visi = ok, visible\r\n/ term = terminé\r\n/ cons = en construction\r\n/ cach = caché\r\n/ cans = caché en constuction',
  `date` date NOT NULL COMMENT 'uniquement pour le tri des projets',
  `lien1-nom` varchar(32) NOT NULL,
  `lien1-lien` varchar(128) NOT NULL,
  `lien2-nom` varchar(32) NOT NULL,
  `lien2-lien` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `url`, `nom-complet`, `nom-court`, `miniature`, `alt-miniature`, `contexte`, `periode`, `tags`, `description`, `contenu`, `statut`, `date`, `lien1-nom`, `lien1-lien`, `lien2-nom`, `lien2-lien`) VALUES
(1, 'cv-et-portfolio-web', 'Mon CV et portfolio sur le Web', 'CV et Portfolio Web', 'cv-portfolio.png', 'Un bout de code du CV / portfolio', 'univ', 'Octobre 2024', 'HTML,CSS,PHP,SQL,GitHub', 'Afin de présenter mon profil et mes atouts, j\'ai conçu et développé ce site web. Vous pouvez retrouver dessus mon CV : mes expériences et mon contact, avec mon portfolio : les projets que j\'ai réalisé récemment.', 'cv-portfolio.html', 'visi', '2024-10-01', 'Site', 'https://catelandwambre.alwaysdata.net/', 'Code', 'https://github.com/BaptisteCtldWbr/cv-ctldwbr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

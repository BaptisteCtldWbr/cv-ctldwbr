-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-catelandwambre.alwaysdata.net
-- Generation Time: Nov 18, 2024 at 08:48 PM
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
CREATE DATABASE IF NOT EXISTS `catelandwambre_cv-portfolio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `catelandwambre_cv-portfolio`;

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

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `date-heure` date NOT NULL,
  `nom` varchar(64) NOT NULL,
  `mail` varchar(64) NOT NULL,
  `message` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `description` varchar(512) NOT NULL,
  `contenu` varchar(128) NOT NULL COMMENT 'chemin d''accès (html)',
  `statut` varchar(4) NOT NULL COMMENT '/ visi = ok, visible\r\n/ term = terminé\r\n/ cons = en construction\r\n/ cach = caché\r\n/ cans = caché en constuction',
  `date` date NOT NULL COMMENT 'uniquement pour le tri des projets',
  `suggestions` varchar(16) NOT NULL,
  `lien1-nom` varchar(32) NOT NULL,
  `lien1-lien` varchar(128) NOT NULL,
  `lien2-nom` varchar(32) NOT NULL,
  `lien2-lien` varchar(128) NOT NULL,
  `couleur` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `url`, `nom-complet`, `nom-court`, `miniature`, `alt-miniature`, `contexte`, `periode`, `tags`, `description`, `contenu`, `statut`, `date`, `suggestions`, `lien1-nom`, `lien1-lien`, `lien2-nom`, `lien2-lien`, `couleur`) VALUES
(1, 'cv-et-portfolio-web', 'Mon CV et portfolio sur le Web', 'CV et Portfolio Web', 'cv-portfolio.png', 'Un bout de code du CV / portfolio', '', 'Octobre 2024', 'HTML,CSS,PHP,SQL,JS,GitHub', 'Afin de présenter mon profil et mes atouts, j\'ai conçu et développé ce site web. Vous pouvez retrouver dessus mon CV : mes expériences et mon contact, avec mon portfolio : les projets que j\'ai réalisés récemment.', 'cv-portfolio.html', 'visi', '2024-11-01', '6,13', 'Site', 'https://catelandwambre.alwaysdata.net/', 'Code', 'https://github.com/BaptisteCtldWbr/cv-ctldwbr', ''),
(4, 'les-talents-de-l-iut', 'Communication pour le festival des Talents de l\'IUT', 'Les talents de l\'IUT', 'sae102-202.png', 'Les talents de l\'IUT : le logo et une pastille', 'univ', 'De novembre 2023 à avril 2024', 'Marketing,Communication,Gestion de projet,Tournage,Davinci,InDesign,Illustrator', 'Nous avons été chargés de proposer une stratégie de marketing pour un festival mettant en valeur les talents de notre IUT, puis nous avons mis en place ces actions !', 'sae102-202.php', 'term', '2024-04-01', '', '', '', '', '', ''),
(6, 'site-presentation-but-mmi', 'Site de présentation du BUT Métiers du Multimédia et de l\'Internet', 'Présentation de la formation', 'sae105-203.png', 'Le hero de ce site', 'univ', 'Entre novembre 2023 et mai 2024', 'HTML,CSS,PHP,SQL,GitHub', 'En équipe, nous avons développé un site de présentation de notre formation, avec formulaire de contact et quelques fonctionnalités PHP, puis nous avons rajouté une base de données pour les messages, articles et auteurs.', 'sae105-203.html', 'term', '2024-06-14', '1,13', 'Site', 'https://asaf-font.alwaysdata.net/sae203/code', 'Code', 'https://github.com/BaptisteCtldWbr/SAE203', ''),
(7, 'andina-rumicruz', 'Andina Rumicruz : le témoignage d\'un mois en Équateur', 'Andina Rumicruz', 'andina-rumicruz.png', 'Miniature de la vidéo Youtube', 'scout', 'De janvier 2024 à janvier 2025', 'Tournage,Drone,Davinci,International,Gestion de projet,Budget', 'Avec mon équipe scoute, nous avons monté un projet de solidarité internationale en Équateur. Nous avons aidés l\'association Ahuana, et aujourd\'hui nous témoignons de cette expérience.', 'andina-rumicruz.html', 'cons', '2025-01-18', '9,8', 'Version courte', 'https://youtu.be/tdazj-o8EO8', '', '', '007254'),
(8, 'cinematiques-drone', 'Réalisations de cinématiques au drone', 'Réalisations au drone', 'cinematique-drone.png', '.', 'drone', 'Depuis janvier 2023', 'Drone,Tournage,Davinci', 'Depuis novembre 2021, je filme au drone quelques destinations, je monte ces plans puis en sort une cinématique. En voilà quelques unes.', 'cinematiques-drone.html', 'visi', '2024-10-08', '7,9', 'Instagram', 'https://www.instagram.com/baptiste.drone/', 'YouTube', 'https://www.youtube.com/@baptistedrone', ''),
(9, 'photos', '\"J\'y suis allé avec mon appareil photo\"', 'Photos', 'photos.jpg', 'Une photo de la BNF', 'photo', 'Dès que j\'en ai l\'occasion', 'Photo,Lightroom', 'Que ce soit pour les Paralympiques, vacances, voyages ou juste comme ça, j\'aime prendre des photos, et si le résultat me convient : les retoucher.', 'photos.php', 'visi', '2024-09-01', '8', '', '', '', '', ''),
(12, 'sae301-acaf-font', 'Concevoir une expérience utilisateur : Agence immobilière', 'Une agence immobilière', 'en-cours.png', '.', 'univ', 'D\'octobre à novembre 2024', 'Figma', 'En équipe, nous avons été chargés de concevoir le site web d\'une agence immobilière à Sarcelles, en se basant sur une analyse de l\'existant, pour proposer une expérience utilisateur optimale.', 'sae301.html', 'cans', '2024-10-01', '', '', '', '', '', ''),
(13, 'sae303-cinema-et-ED', 'Datavisualisation : application web en JS et broderie !', 'Datavisualisation', 'en-cours.png', '.', 'univ', 'D\'octobre à décembre 2024', 'HTML,CSS,JS,JSON,GitHub', 'Dans le cadre d\'un projet universitaire, en équipe, nous avons développé un web pour visualiser la présence des cinémas sur le territoires franciliens. En parallèle, individuellement, nous avons fait un petit livret en broderie, toujours avec comme thème la datavisualisation.', 'sae303-cinema-et-ED.html', 'cans', '2024-10-02', '1,6', '', '', '', '', '');

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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interet`
--
ALTER TABLE `interet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `techno`
--
ALTER TABLE `techno`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `interet`
--
ALTER TABLE `interet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `langue`
--
ALTER TABLE `langue`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `techno`
--
ALTER TABLE `techno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

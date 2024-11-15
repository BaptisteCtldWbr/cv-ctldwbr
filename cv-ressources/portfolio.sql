-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-catelandwambre.alwaysdata.net
-- Generation Time: Nov 16, 2024 at 12:35 AM
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
  `description` varchar(512) NOT NULL,
  `contenu` varchar(128) NOT NULL COMMENT 'chemin d''accès (html)',
  `statut` varchar(4) NOT NULL COMMENT '/ visi = ok, visible\r\n/ term = terminé\r\n/ cons = en construction\r\n/ cach = caché\r\n/ cans = caché en constuction',
  `date` date NOT NULL COMMENT 'uniquement pour le tri des projets',
  `suggestions` varchar(16) NOT NULL,
  `lien1-nom` varchar(32) NOT NULL,
  `lien1-lien` varchar(128) NOT NULL,
  `lien2-nom` varchar(32) NOT NULL,
  `lien2-lien` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `url`, `nom-complet`, `nom-court`, `miniature`, `alt-miniature`, `contexte`, `periode`, `tags`, `description`, `contenu`, `statut`, `date`, `suggestions`, `lien1-nom`, `lien1-lien`, `lien2-nom`, `lien2-lien`) VALUES
(1, 'cv-et-portfolio-web', 'Mon CV et portfolio sur le Web', 'CV et Portfolio Web', 'cv-portfolio.png', 'Un bout de code du CV / portfolio', '', 'Octobre 2024', 'HTML,CSS,PHP,SQL,JS,GitHub', 'Afin de présenter mon profil et mes atouts, j\'ai conçu et développé ce site web. Vous pouvez retrouver dessus mon CV : mes expériences et mon contact, avec mon portfolio : les projets que j\'ai réalisé récemment.', 'cv-portfolio.html', 'visi', '2024-11-01', '6,13', 'Site', 'https://catelandwambre.alwaysdata.net/', 'Code', 'https://github.com/BaptisteCtldWbr/cv-ctldwbr'),
(4, 'les-talents-de-l-iut', 'Communication pour le festival des Talents de l\'IUT', 'Les talents de l\'IUT', 'sae102-202.png', 'Les talents de l\'IUT : le logo et une pastille', 'univ', 'De novembre 2023 à avril 2024', 'Marketing,Communication,Gestion de projet,Tournage,Davinci,InDesign,Illustrator', 'Nous avons été chargés de proposer une stratégie de marketing pour un festival mettant en valeur les talents de notre IUT, puis nous avons mis en place ces actions !', 'sae102-202.php', 'term', '2024-04-01', '', '', '', '', ''),
(6, 'site-presentation-but-mmi', 'Site de présentation du BUT Métiers du Multimédia et de l\'Internet', 'Présentation de la formation', 'sae105-203.png', 'Le hero de ce site', 'univ', 'Entre novembre 2023 et mai 2024', 'HTML,CSS,PHP,SQL,GitHub', 'En équipe, nous avons développé un site de présentation de notre formation, avec formulaire de contact et quelques fonctionnalités PHP, puis nous avons rajouté une base de données pour les messages, articles et auteurs.', 'sae105-203.html', 'term', '2024-06-14', '1,13', 'Site', 'https://asaf-font.alwaysdata.net/sae203/code', 'Code', 'https://github.com/BaptisteCtldWbr/SAE203'),
(7, 'andina-rumicruz', 'Andina Rumicruz : le témoignage d\'un mois en Équateur', 'Andina Rumicruz', 'andina-rumicruz.png', 'Miniature de la vidéo Youtube', 'scout', 'De janvier 2024 à janvier 2025', 'Tournage,Drone,Davinci,International,Gestion de projet,Budget', 'Avec mon équipe scoute, nous avons monté un projet de solidarité internationale en Équateur. Nous avons aidés l\'association Ahuana, et aujourd\'hui nous témoignons de cette expérience.', 'andina-rumicruz.html', 'cons', '2025-01-18', '9,8', 'Version courte', 'https://youtu.be/tdazj-o8EO8', '', ''),
(8, 'cinematiques-drone', 'Réalisations de \"cinématiques\" au drone', 'Réalisations au drone', 'cinematique-drone.png', '.', 'drone', 'Depuis janvier 2023', 'Drone,Tournage,Davinci', 'Depuis novembre 2021, je filme au drone quelques destinations, je monte ces plans puis en sort une cinématique. En voilà quelques unes.', 'cinematiques-drone.html', 'visi', '2024-10-08', '7,9', 'Instagram', 'https://www.instagram.com/baptiste.drone/', 'YouTube', 'https://www.youtube.com/@baptistedrone'),
(9, 'photos', '\"J\'y suis allé avec mon appareil photo\"', 'Photos', 'photos.jpg', 'Une photo de la BNF', 'photo', 'Dès que j\'en ai l\'occasion', 'Photo,Lightroom', 'Que ce soit pour les Paralympiques, vacances, voyages ou juste comme ça, j\'aime prendre des photos, et si le résultat me convient : les retoucher.', 'photos.php', 'cons', '2024-09-01', '8', '', '', '', ''),
(12, 'sae301-acaf-font', 'Concevoir une expérience utilisateur : Agence immobilière', 'Une agence immobilière', 'en-cours.png', '.', 'univ', 'D\'octobre à novembre 2024', 'Figma', 'En équipe, nous avons été chargés de concevoir le site web d\'une agence immobilière à Sarcelles, en se basant sur une analyse de l\'existant, pour proposer une expérience utilisateur optimale.', 'sae301.html', 'cans', '2024-10-01', '', '', '', '', ''),
(13, 'sae303-cinema-et-ED', 'Datavisualisation : application web en JS et broderie !', 'Datavisualisation', 'en-cours.png', '.', 'univ', 'D\'octobre à décembre 2024', 'HTML,CSS,JS,JSON,GitHub', 'Dans le cadre d\'un projet universitaire, en équipe, nous avons développé un web pour visualiser la présence des cinémas sur le territoires franciliens. En parallèle, individuellement, nous avons fait un petit livret en broderie, toujours avec comme thème la datavisualisation.', 'sae303-cinema-et-ED.html', 'cans', '2024-10-02', '1,6', '', '', '', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-catelandwambre.alwaysdata.net
-- Generation Time: Nov 30, 2024 at 01:46 PM
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
-- Table structure for table `posts-lk`
--

CREATE TABLE `posts-lk` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `auteur` varchar(256) NOT NULL,
  `texte` varchar(1024) NOT NULL,
  `img` varchar(128) NOT NULL,
  `alt-img` varchar(128) NOT NULL,
  `lien-lk` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts-lk`
--

INSERT INTO `posts-lk` (`id`, `date`, `auteur`, `texte`, `img`, `alt-img`, `lien-lk`) VALUES
(1, '2024-06-18', 'Baptiste CTLD WBR', '👋&#x1F44B; Bonjour à tous, vous allez bien ?<br>Je suis étudiant en multimédia et plus particulièrement en développement web. L\'année prochaine à la mi-avril, je ferai un stage de 10 semaines minimum, et si tout va encore mieux, avec vous !<br>Dans le cadre de la recherche de ce stage, j\'ai commencé à réfléchir à faire un CV et à valoriser différentes expériences et projets. En voilà un échantillon :', 'postS2.jpg', 'image du post linkedin', 'https://www.linkedin.com/posts/baptiste-ctldwbr_insertionprofessionelle-developpeurweb-stage-activity-7205833616898076672-dHWr'),
(2, '2024-03-14', 'Jeanne Meyer', 'Le festival, c\'est demain 🥳 \r\nEt dans le cadre d\'un projet pédagogique, les étudiants ont travaillé avec Vincent Gruyer à la réalisation de capsules vidéos pour promouvoir cet événement. \r\nDécouvrez-en une ci-dessous ! \r\nFélicitations à \r\nWilem Akli Amîn Benamaouche Falou Badiane Baptiste Cateland--Wambre pour leur travail.', 'bloques.png', 'capture d\'écran de la pastille de communication', 'https://www.linkedin.com/posts/jeanne-meyer-792277a2_iut-de-cergy-pontoise-on-instagram-tic-activity-7173980761375571969-RE7G'),
(3, '2024-01-30', 'Baptiste CTLD WBR', 'À la rencontre de Maxime Petit, développeur Full Stack !\r\n\r\nPour parfaire mon cheminement professionnel, j’ai contacté un professionnel du secteur : Maxime Petit, développeur Fullstack chez Weezevent et étudiant en M1 Tech. Je lui ai posé quelques questions, particulièrement sur les compétences à avoir, la compétitivité du milieu, les technologies utilisées et l’IA. Voilà ce que j’en retiens :', 'devwebfullstack.jpg', 'Un bout de code PHP', 'https://www.linkedin.com/posts/baptiste-ctldwbr_insertionprofessionnelle-developpeurweb-activity-7157104688943783936-cyw7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts-lk`
--
ALTER TABLE `posts-lk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts-lk`
--
ALTER TABLE `posts-lk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

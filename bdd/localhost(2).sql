-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 16 Juin 2019 à 10:18
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `monsite2`
--
CREATE DATABASE IF NOT EXISTS `monsite2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `monsite2`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `mdp`) VALUES
(1, 'Nono', '$2y$10$nXPO.d0kbJnx1T4PWy4Ble0vx3l68.9/aHUvc25HaG/VFyOGuRnkS');

-- --------------------------------------------------------

--
-- Structure de la table `animation`
--

CREATE TABLE `animation` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `pitch` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `lien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `animation`
--

INSERT INTO `animation` (`id`, `titre`, `pitch`, `type`, `lien`) VALUES
(1, 'La valise', 'Une mère et son fils prennent le train quand soudain le fils disparait.', 'Stop-motion Horreur', 'https://www.youtube.com/watch?v=mbNlMjAKNPo');

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `pourcentage` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `competence`
--

INSERT INTO `competence` (`id`, `titre`, `color`, `pourcentage`) VALUES
(1, 'Illustrator', '#DE6B26', 70),
(2, 'Photoshop', '3399ff', 60),
(3, 'Web', '#9b0abe', 55),
(4, 'Animation', '#0a43be', 68),
(5, 'Indesign', 'f07fdb', 65);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `email`, `message`) VALUES
(1, 'test', 'test', 'test@hotmail.com', 'test'),
(3, 'test', 'test', 'test@hotmail.com', 'test2');

-- --------------------------------------------------------

--
-- Structure de la table `oeuvres`
--

CREATE TABLE `oeuvres` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `oeuvres`
--

INSERT INTO `oeuvres` (`id`, `image`, `titre`, `categorie`, `description`) VALUES
(7, '28183serpent.jpg', 'serpent-grenouille', 'Photoshop', 'Morphing d\'un corps de serpent avec la tête et d\'une grenouille.'),
(8, '4612chagourou.jpg', 'chatgourou', 'Photoshop', 'Morphing d\'un chat avec la tête d\'un bébé kangourou'),
(9, '5101batman-ok.jpg', 'Batman', 'Illustrator', 'Simplification de Batman.'),
(10, '25122low-poly-sheldon.jpg', 'Sheldon ', 'Illustrator', 'low poly de sheldon Cooper de the big bang theory.'),
(11, '21683Lightbox-Signage-Mockup.jpg', 'marque', 'Illustrator', 'Création d\'un mock up d\'affiche de magasin pour une marque de savon.'),
(12, '19056photo-sculpture-maxime.jpg', 'photo sculpture', 'Photography', 'montage photo '),
(13, '26470maquette-toto.jpg', 'maquette site toto', 'Web', 'maquette du site pour Thierry Coppée.'),
(14, '23436maquette-epse.jpg', 'Maquette epse', 'Web', 'Maquette du site epse pour les portes ouvertes'),
(15, '23380maquette-batman.jpg', 'maquette Batman', 'Web', 'Site web sur le Batman'),
(16, '11005planche-toto.jpg', 'Pages Toto', 'Indesign', 'Pages d\'un magazine, l\'article est sur Thierry Coppée et donc sur Toto.'),
(17, '5106planche-street-art.jpg', 'Street-Art', 'Indesign', 'Pages d\'un article sur le Street-Art dans la ville de Mons.'),
(18, '27203transhu.jpg', 'Le transhumanism', 'Indesign', 'Pages d\'un article sur le transhumanism avec photo réaliser par mes soins. '),
(19, '22720pub-sche.jpg', 'Pub', 'Indesign', 'Publicité de Scheipler');

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `animation`
--
ALTER TABLE `animation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `oeuvres`
--
ALTER TABLE `oeuvres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `animation`
--
ALTER TABLE `animation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `oeuvres`
--
ALTER TABLE `oeuvres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

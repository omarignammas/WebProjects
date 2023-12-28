-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 28 déc. 2023 à 11:48
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ensak_events`
--

-- --------------------------------------------------------

--
-- Structure de la table `demande_organisations`
--

CREATE TABLE `demande_organisations` (
  `email` varchar(500) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nom_org` varchar(100) NOT NULL,
  `Type` varchar(500) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `nom_resp` varchar(100) NOT NULL,
  `prenom_resp` varchar(100) NOT NULL,
  `CIN_resp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande_organisations`
--

INSERT INTO `demande_organisations` (`email`, `pass`, `nom_org`, `Type`, `description`, `nom_resp`, `prenom_resp`, `CIN_resp`) VALUES
('abdalhamid-hachimi-alloui@uit.ac.ma', '6578f2b655df3', 'crere', 'roubotiquef', 'ffff', 'omar', '0', 'ay35678'),
('hamzaigna@uit.ac.ma', '6578f2b655df3', 'mecatronique', 'club technique ', 'formation et workshops ', 'ignammas', '0', 'ay23445'),
('5254mohamed@gmail.com', '6578f2b655df3', 'hhh', 'jkj', 'kjj', 'omar', '0', 'ay566'),
('mohamed@gmail.com', '6578f2b655df3', 'hhh', 'jkj', 'kjj', 'omar', '0', 'ay566'),
('mohamed@gmail.com', '6578f2b655df3', 'hhh', 'jkj', 'kjj', 'omar', '0', 'ay566'),
('zekri@uit.ac.ma', '6578f2b655df3', 'mecatronique', 'club technique', 'club technique conception et formationnel', 'najat', '0', 'ay90384'),
('5254mohamed@gmail.com', '6578f2b655df3', 'cris', 'club technique ', 'conference', 'staili', 'mohamed', 'ay5546'),
('', '6578f2b655df3', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `depose_evenement`
--

CREATE TABLE `depose_evenement` (
  `id_depot` int(11) NOT NULL,
  `nom_org` varchar(500) NOT NULL,
  `email_org` varchar(1500) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `transport` varchar(1000) NOT NULL,
  `sponsoring` varchar(1000) NOT NULL,
  `ouvert` varchar(1000) NOT NULL,
  `payant` varchar(1000) NOT NULL,
  `stand` varchar(1000) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `lieu` varchar(1000) NOT NULL,
  `type` varchar(2000) NOT NULL,
  `nbr_place` int(220) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `depose_evenement`
--

INSERT INTO `depose_evenement` (`id_depot`, `nom_org`, `email_org`, `photo`, `transport`, `sponsoring`, `ouvert`, `payant`, `stand`, `description`, `lieu`, `type`, `nbr_place`, `date`) VALUES
(2, 'AFAAQ', '', 'AFAAQ.jpg', 'pas besoin', 'pas de sponsor', 'non', '80dh par place', 'non, pas de besoin', 'hhfiifhf', 'Amphi rouge Ensak', 'conference cheikh', 120, '2023-12-30'),
(3, 'AFAAQ club', '', 'AFAAQ club.png', 'pas besoin', 'pas de sponsor', 'non', '80dh par place', 'non, pas de besoin', 'tyyriifnhjnfjnv', 'Amphi rouge Ensak', 'conference mamoun', 120, '2023-12-04'),
(4, 'AFAAQ club', '', 'AFAAQ club.png', 'pas besoin', 'pas de sponsor', 'non', '80dh par place', 'non, pas de besoin', 'tyyriifnhjnfjnv', 'Amphi rouge Ensak', 'conference mamoun', 120, '2023-12-04'),
(5, 'mecatronique', '', 'mecatronique.png', 'pas besoin', 'pas de sponsor', 'non', '80dh par place', 'non, pas de besoin', 'hhjjkjj', 'Amphi rouge Ensak', 'conference mamoun', 120, '2023-12-16'),
(6, 'mecatronique', '', 'mecatronique.png', 'pas besoin', 'pas de sponsor', 'non', '80dh par place', 'non, pas de besoin', 'hi bro ', 'Amphi rouge Ensak', 'conference mamoun', 120, '2023-11-28');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_event` int(150) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `date` date NOT NULL,
  `local` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `organisations`
--

CREATE TABLE `organisations` (
  `email` varchar(500) NOT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `nom_org` varchar(100) NOT NULL,
  `Type` varchar(500) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `nom_resp` varchar(100) NOT NULL,
  `prenom_resp` varchar(100) NOT NULL,
  `CIN_resp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `organisations`
--

INSERT INTO `organisations` (`email`, `pass`, `nom_org`, `Type`, `description`, `nom_resp`, `prenom_resp`, `CIN_resp`) VALUES
('hakim.rahhou@uit.ac.ma', '6576267694732', 'AFAAQ', 'Club humanitaire associative', 'on organise des conférences des formation et des compagnes pour changer et faire un impact dans ce monde dure un jour inchallah.', 'hakim', '0', 'ay11647'),
('ilyass.lirmaqui@uit.ac.ma', '', 'cris', 'club technique1', 'hi nice to meet tyou ', 'lirmaqui', 'ilyass', 'ay5546'),
('omar.ignammas@uit.ac.ma', '6576189f9f879', 'AFAAQ', 'Club humanitaire associative', 'on organise des conférences des formation et des compagnes pour changer et faire un impact dans ce monde dure un jour inchallah.', 'igna', '0', 'ay11396');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `depose_evenement`
--
ALTER TABLE `depose_evenement`
  ADD PRIMARY KEY (`id_depot`);

--
-- Index pour la table `organisations`
--
ALTER TABLE `organisations`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `depose_evenement`
--
ALTER TABLE `depose_evenement`
  MODIFY `id_depot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

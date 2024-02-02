-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 02 fév. 2024 à 17:42
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
-- Base de données : `messagerie`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `IdMessage` int(11) NOT NULL,
  `IdExpediteur` int(11) DEFAULT NULL,
  `IdDestinataire` int(11) DEFAULT NULL,
  `Sujet` varchar(100) DEFAULT NULL,
  `Contenu` text DEFAULT NULL,
  `DateHeureEnvoi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`IdMessage`, `IdExpediteur`, `IdDestinataire`, `Sujet`, `Contenu`, `DateHeureEnvoi`) VALUES
(1, 1, 2, 'Bienvenue', 'Bonjour Fatima, bienvenue dans notre application de messagerie !', NULL),
(2, 2, 1, 'Re: Bienvenue', 'Merci Youssef, heureuse d\'être ici !', NULL),
(3, 3, 4, 'Réunion demain', 'Salut Loubna, n\'oublie pas notre réunion demain à 10h.', NULL),
(11, 7, 2, '14', '14', NULL),
(12, 3, 1, 'Réunion', 'Bonjour cher collègue, \r\nje vous propose de décaler notre réunion au Mardi à 15h, une réunion urgente est prévue aujourd\'hui avec le service informatique\r\nMerci pour votre collaboration', NULL),
(13, 1, 3, 'réunion', 'c\'est noté , nous pouvons la décaler au mardi.\r\nBonne journée', NULL),
(14, 2, 3, 'lancement des beta-test', 'Bonjour cher collègue , nous lanceront la phase du beta-test le 20 Janvier à 9h.\r\nMerci d\'informer votre équipe', NULL),
(15, 3, 7, 'questionnaire', 'nous avons soumis le questionnaire pour les étudiants', NULL),
(31, 1, 1, 'demande de candidature dd', 'votre demande est acceptee', '2029-01-24 11:40:08');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `IdUtilisateur` int(11) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `MotDePasse` varchar(255) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`IdUtilisateur`, `Nom`, `Prenom`, `Email`, `MotDePasse`, `Photo`) VALUES
(1, 'azzouaoui', 'Youssef', 'yousseggf.azzouaoui@gmail.com', 'azerty', 'yousseggf.azzouaoui@gmail.com.jpg'),
(2, 'Lebkiri', 'Fatima', 'fatima.lebkiri@gmail.com', 'azerty', '2.png'),
(3, 'Nider', 'Adam', 'nider.adam@gmail.com', 'azerty', '3.png'),
(4, 'Ait Ali', 'Loubna', 'loubna.aitali@gmail.com', 'azerty', '4.png'),
(7, 'Nouri', 'Fatiha66', 'oumaira@gmail.com', 'azerty', 'oumaira@gmail.com.jpg'),
(14, 'omar', 'ignammas', 'omar.ignammas@uit.ac.ma', 'azerty', 'omar.ignammas77@uit.ac.ma.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`IdMessage`),
  ADD KEY `IdExpediteur` (`IdExpediteur`),
  ADD KEY `IdDestinataire` (`IdDestinataire`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`IdUtilisateur`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `IdMessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `IdUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`IdExpediteur`) REFERENCES `utilisateurs` (`IdUtilisateur`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`IdDestinataire`) REFERENCES `utilisateurs` (`IdUtilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 31 jan. 2024 à 12:57
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
-- Base de données : `cv`
--

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

CREATE TABLE `experience` (
  `id_experience` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `periode_experience` varchar(255) NOT NULL,
  `libelle_experience` varchar(255) NOT NULL,
  `description_experience` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `experience`
--

INSERT INTO `experience` (`id_experience`, `id_user`, `periode_experience`, `libelle_experience`, `description_experience`) VALUES
(1, 1, 'Juillet 2018', 'Stage Année Préparatoire', 'Réalisation d\'une application de gestion de stock pour la société INJK'),
(2, 1, 'Juillet 2020', 'Stage d\'intiation', 'Refonte du site web de l\'entreprise Info MAX, Rabat'),
(4, 1, 'juin 2024', 'stage PFE', 'youcan '),
(6, 1, 'juin 2024', 'stage PFE', 'INTELCIA'),
(9, 1, '2020-2021', 'stage PFA', 'Orange'),
(10, 34, 'juin 2024', 'stage PFE', 'youcan ');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id_formation` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `periode_formation` varchar(255) NOT NULL,
  `libelle_formation` varchar(255) NOT NULL,
  `description_formation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `id_user`, `periode_formation`, `libelle_formation`, `description_formation`) VALUES
(1, 1, '2016-2017', 'Baccalauréat', 'Option Sciences Mathématiques , Lycée Moulay Ali Cherif, Kénitra'),
(2, 1, '2017-2019', 'Année Prépartaoires', 'Ecole Nationale des Sciences Appliquée Kénitra, Mention Bien'),
(3, 1, '2019-2020', 'Première année Cycle Ingénieur', 'Filière Génie Industriel '),
(4, 1, '2020-2021', 'Baccalauréat', '1ere lycée militaire royale'),
(5, 34, '2020-2025', 'militaire', 'ARM meknes');

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

CREATE TABLE `langue` (
  `id_langue` int(11) NOT NULL,
  `libelle_langue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`id_langue`, `libelle_langue`) VALUES
(1, 'Arabe'),
(2, 'Français'),
(3, 'Anglais'),
(4, 'Allemand'),
(5, 'Chinois'),
(6, 'Espagnol');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `passe` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `id_ville` varchar(3) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `login`, `passe`, `nom`, `prenom`, `date_naissance`, `id_ville`, `photo`) VALUES
(1, 'jadili', 'azerty', 'Jadili', 'Ouidad', '2000-10-07', '004', '1.png'),
(34, 'afaaq', 'NXLFE2011@', 'omar', 'ignammas', '2024-01-13', '049', 'inconnu.jpg'),
(35, 'STAILI', 'Btm@0wVIrw%p8l7vjXCLEmdE', 'omar', 'ignammas', '2024-01-18', '034', 'inconnu.jpg'),
(36, 'OMAR', '12345678', 'omar', 'ignammas', '2024-02-03', '049', 'inconnu.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user_langue`
--

CREATE TABLE `user_langue` (
  `id_langue` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `niveau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `user_langue`
--

INSERT INTO `user_langue` (`id_langue`, `id_user`, `niveau`) VALUES
(1, 1, 'C2'),
(1, 34, 'A1'),
(2, 1, 'C2'),
(2, 34, 'A1'),
(3, 1, 'B1'),
(3, 34, 'B1'),
(4, 1, 'B1'),
(5, 1, 'C2'),
(6, 1, 'A1');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `id_ville` varchar(3) NOT NULL,
  `lib_ville` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id_ville`, `lib_ville`) VALUES
('001', 'RABAT'),
('002', 'SALE BOUKNADEL'),
('003', 'SKHIRATE-TEMARA'),
('004', 'CASABLANCA ANFA'),
('005', 'AL FIDA DERB SULTAN'),
('006', 'sidi bennour'),
('007', 'AIN SEBAA HAY MOHAMMEDI'),
('008', 'AIN CHOCK HAY HASSANI'),
('009', 'SIDI BERNOUSSI ZENATA'),
('010', 'BEN MSICK MEDIOUNA'),
('011', 'MOHAMMADIA'),
('012', 'FES-EL-JADID-DAR DBIBAGH'),
('013', 'FES-MEDINA'),
('014', 'ZOUAGHA - MOULAY-YACOUB'),
('015', 'SEFROU'),
('016', 'MARRAKECH-MENARA'),
('017', 'MARRAKECH-MEDINA'),
('018', 'SIDI YOUSSEF BEN ALI'),
('019', 'CHICHAOUA'),
('020', 'AL HAOUZ'),
('021', 'MEKNES-EL-MENZEH'),
('022', 'MEKNES-AL-ISMAILIA'),
('023', 'EL-HAJEB'),
('024', 'OUJDA-ANGAD'),
('025', 'BERKANE'),
('026', 'JERADA'),
('027', 'AGADIR IDA-TANANE'),
('028', 'INZEGANE-AIT-MELLOUL'),
('029', 'CHTOUKA-AIT-BAHA'),
('030', 'LARACHE'),
('031', 'CHEFCHAOUEN'),
('032', 'TETOUAN'),
('033', 'LAAYOUNE'),
('034', 'BOUJDOUR'),
('035', 'AL HOCEIMA'),
('036', 'ASSA-ZAG'),
('037', 'AZILAL'),
('038', 'BENI MELLAL'),
('039', 'BENSLIMANE'),
('040', 'BOULEMANE'),
('041', 'EL JADIDA'),
('042', 'KELAAT  ESSRAGHNA'),
('043', 'ERRACHIDIA'),
('044', 'ESSAOUIRA'),
('045', 'ES-SEMARA'),
('046', 'FIGUIG'),
('047', 'GUELMIM'),
('048', 'IFRANE'),
('049', 'KENITRA'),
('050', 'KHEMISSET'),
('051', 'KHENIFRA'),
('052', 'KHOURIBGA'),
('053', 'NADOR'),
('054', 'OUARZAZATE'),
('055', 'OUED ED DAHAB'),
('056', 'SAFI'),
('057', 'SETTAT'),
('058', 'SIDI KACEM'),
('059', 'TANGER'),
('060', 'TAN-TAN'),
('061', 'TAOUNATE'),
('062', 'TAROUDANNT'),
('063', 'TATA'),
('064', 'TAZA'),
('065', 'TIZNIT'),
('066', 'ZAGORA'),
('067', 'TAOURIRT'),
('068', 'MOULAY RCHID SIDI OTMANE'),
('069', 'FAHS BNI MAKADA'),
('071', 'SALA ALJADIDA'),
('072', 'MECHOUAR(CASA)'),
('073', 'ETRANGER'),
('074', 'MAROC'),
('076', 'MAROC MILITAIRE'),
('077', 'SIDI SLIMANE'),
('078', 'SIDI YAHYA'),
('079', 'OUEZZANE'),
('080', 'NOUASSER'),
('081', 'EL MADIEQ'),
('082', 'Fquih Ben Salah'),
('083', 'Sidi Slimane'),
('084', 'Ouezzane'),
('085', 'Guercif'),
('086', 'Driouch'),
('087', 'Tarfaya'),
('088', 'Midelt'),
('089', 'Sidi Ifni'),
('090', 'Tinghir'),
('091', 'Hay Hassani'),
('092', 'youssoufia'),
('093', 'Berrechid');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id_experience`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_formation`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`id_langue`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `ville` (`id_ville`);

--
-- Index pour la table `user_langue`
--
ALTER TABLE `user_langue`
  ADD PRIMARY KEY (`id_langue`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id_ville`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `experience`
--
ALTER TABLE `experience`
  MODIFY `id_experience` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `langue`
--
ALTER TABLE `langue`
  MODIFY `id_langue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `formation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`id_ville`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user_langue`
--
ALTER TABLE `user_langue`
  ADD CONSTRAINT `user_langue_ibfk_1` FOREIGN KEY (`id_langue`) REFERENCES `langue` (`id_langue`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_langue_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 31 juil. 2023 à 23:46
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `agence_immobiliere`
--

-- --------------------------------------------------------

--
-- Structure de la table `biens`
--

CREATE TABLE `biens` (
  `id_biens` int(100) NOT NULL,
  `nom_bien` varchar(100) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `cycle` enum('mois','semaine','jours') NOT NULL,
  `region` varchar(30) NOT NULL,
  `departement` varchar(30) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `description` text DEFAULT NULL,
  `date_pub` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `photos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `biens`
--

INSERT INTO `biens` (`id_biens`, `nom_bien`, `prix`, `cycle`, `region`, `departement`, `adresse`, `description`, `date_pub`, `email`, `type`, `photos`) VALUES
(2208379, 'appartement a ngore', 120000, 'mois', 'dakar', 'dakar', 'ngore virage', 'appartement avec 3 chambre (meuble) avec salle de bain + salon (meuble) + cuisine ', '2023-07-31', 'admin@gmail.com', 'Appartement', 'img/commercial/admin@gmail.com.N0ID=2208379.png , img/commercial/admin@gmail.com.N1ID=2208379.png , img/commercial/admin@gmail.com.N2ID=2208379.png , img/commercial/admin@gmail.com.N3ID=2208379.png , img/commercial/admin@gmail.com.N4ID=2208379.png , img/commercial/admin@gmail.com.N5ID=2208379.png , img/commercial/admin@gmail.com.N6ID=2208379.png , img/commercial/admin@gmail.com.N7ID=2208379.png , img/commercial/admin@gmail.com.N8ID=2208379.png , img/commercial/admin@gmail.com.N9ID=2208379.png'),
(2208597, 'villa a yoff', 130000, 'mois', 'dakar', 'dakar', 'yoff ,rond point ngore en face briche doree', 'villa avec 4 chambre (salle de bain) meuble et salon + cuisine \r\n+ cours de jeux et piscine \r\n', '2023-07-31', 'admin@gmail.com', 'villa', 'img/commercial/admin@gmail.com.N0ID=2208597.png , img/commercial/admin@gmail.com.N1ID=2208597.png , img/commercial/admin@gmail.com.N2ID=2208597.png , img/commercial/admin@gmail.com.N3ID=2208597.png , img/commercial/admin@gmail.com.N4ID=2208597.png , img/commercial/admin@gmail.com.N5ID=2208597.png , img/commercial/admin@gmail.com.N6ID=2208597.png , img/commercial/admin@gmail.com.N7ID=2208597.png , img/commercial/admin@gmail.com.N8ID=2208597.png , img/commercial/admin@gmail.com.N9ID=2208597.png'),
(1690587176, 'appartement a leona', 120000, 'mois', 'kaolack', 'kaolack', 'leona rue mame khalifa niass', 'appartement avec 3 chambre (meuble) avec salle de bain + salon (meuble) + cuisine ', '2023-07-31', 'admin@gmail.com', 'Appartement', 'img/commercial/admin@gmail.com.N0ID=2208379.png , img/commercial/admin@gmail.com.N1ID=2208379.png , img/commercial/admin@gmail.com.N2ID=2208379.png , img/commercial/admin@gmail.com.N3ID=2208379.png , img/commercial/admin@gmail.com.N4ID=2208379.png , img/commercial/admin@gmail.com.N5ID=2208379.png , img/commercial/admin@gmail.com.N6ID=2208379.png , img/commercial/admin@gmail.com.N7ID=2208379.png , img/commercial/admin@gmail.com.N8ID=2208379.png , img/commercial/admin@gmail.com.N9ID=2208379.png'),
(1690587177, 'villa a medina baye', 130000, 'mois', 'kaolack', 'kaolack', 'medina ,rond point cheikh ahmadou bamba', 'villa avec 4 chambre (salle de bain) meuble et salon + cuisine \r\n+ cours de jeux et piscine \r\n', '2023-07-31', 'admin@gmail.com', 'villa', 'img/commercial/admin@gmail.com.N0ID=2208597.png , img/commercial/admin@gmail.com.N1ID=2208597.png , img/commercial/admin@gmail.com.N2ID=2208597.png , img/commercial/admin@gmail.com.N3ID=2208597.png , img/commercial/admin@gmail.com.N4ID=2208597.png , img/commercial/admin@gmail.com.N5ID=2208597.png , img/commercial/admin@gmail.com.N6ID=2208597.png , img/commercial/admin@gmail.com.N7ID=2208597.png , img/commercial/admin@gmail.com.N8ID=2208597.png , img/commercial/admin@gmail.com.N9ID=2208597.png'),
(1690587178, 'appartement a ngore', 120000, 'mois', 'dakar', 'dakar', 'ngore virage', 'appartement avec 3 chambre (meuble) avec salle de bain + salon (meuble) + cuisine ', '2023-07-31', 'admin@gmail.com', 'Appartement', 'img/commercial/admin@gmail.com.N0ID=2208379.png , img/commercial/admin@gmail.com.N1ID=2208379.png , img/commercial/admin@gmail.com.N2ID=2208379.png , img/commercial/admin@gmail.com.N3ID=2208379.png , img/commercial/admin@gmail.com.N4ID=2208379.png , img/commercial/admin@gmail.com.N5ID=2208379.png , img/commercial/admin@gmail.com.N6ID=2208379.png , img/commercial/admin@gmail.com.N7ID=2208379.png , img/commercial/admin@gmail.com.N8ID=2208379.png , img/commercial/admin@gmail.com.N9ID=2208379.png'),
(1690587179, 'villa a yoff', 130000, 'mois', 'dakar', 'dakar', 'yoff ,rond point ngore en face briche doree', 'villa avec 4 chambre (salle de bain) meuble et salon + cuisine \r\n+ cours de jeux et piscine \r\n', '2023-07-31', 'admin@gmail.com', 'villa', 'img/commercial/admin@gmail.com.N0ID=2208597.png , img/commercial/admin@gmail.com.N1ID=2208597.png , img/commercial/admin@gmail.com.N2ID=2208597.png , img/commercial/admin@gmail.com.N3ID=2208597.png , img/commercial/admin@gmail.com.N4ID=2208597.png , img/commercial/admin@gmail.com.N5ID=2208597.png , img/commercial/admin@gmail.com.N6ID=2208597.png , img/commercial/admin@gmail.com.N7ID=2208597.png , img/commercial/admin@gmail.com.N8ID=2208597.png , img/commercial/admin@gmail.com.N9ID=2208597.png'),
(1690587180, 'appartement a leona', 120000, 'mois', 'kaolack', 'kaolack', 'leona rue mame khalifa niass', 'appartement avec 3 chambre (meuble) avec salle de bain + salon (meuble) + cuisine ', '2023-07-31', 'admin@gmail.com', 'Appartement', 'img/commercial/admin@gmail.com.N0ID=2208379.png , img/commercial/admin@gmail.com.N1ID=2208379.png , img/commercial/admin@gmail.com.N2ID=2208379.png , img/commercial/admin@gmail.com.N3ID=2208379.png , img/commercial/admin@gmail.com.N4ID=2208379.png , img/commercial/admin@gmail.com.N5ID=2208379.png , img/commercial/admin@gmail.com.N6ID=2208379.png , img/commercial/admin@gmail.com.N7ID=2208379.png , img/commercial/admin@gmail.com.N8ID=2208379.png , img/commercial/admin@gmail.com.N9ID=2208379.png'),
(1690587181, 'villa a medina baye', 130000, 'mois', 'kaolack', 'kaolack', 'medina ,rond point cheikh ahmadou bamba', 'villa avec 4 chambre (salle de bain) meuble et salon + cuisine \r\n+ cours de jeux et piscine \r\n', '2023-07-31', 'admin@gmail.com', 'villa', 'img/commercial/admin@gmail.com.N0ID=2208597.png , img/commercial/admin@gmail.com.N1ID=2208597.png , img/commercial/admin@gmail.com.N2ID=2208597.png , img/commercial/admin@gmail.com.N3ID=2208597.png , img/commercial/admin@gmail.com.N4ID=2208597.png , img/commercial/admin@gmail.com.N5ID=2208597.png , img/commercial/admin@gmail.com.N6ID=2208597.png , img/commercial/admin@gmail.com.N7ID=2208597.png , img/commercial/admin@gmail.com.N8ID=2208597.png , img/commercial/admin@gmail.com.N9ID=2208597.png');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id_biens` int(11) NOT NULL,
  `email_client` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `id_reservation` int(11) NOT NULL,
  `id_biens` int(11) NOT NULL,
  `email_client` varchar(100) NOT NULL,
  `debut_du_contrat` date DEFAULT NULL,
  `fin_de_contrat` date DEFAULT NULL,
  `etat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`id_reservation`, `id_biens`, `email_client`, `debut_du_contrat`, `fin_de_contrat`, `etat`) VALUES
(44, 2208379, 'dia@gmail.com', '2023-07-31', '2023-07-31', 'louer');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id_reservation` int(11) NOT NULL,
  `id_biens` int(11) NOT NULL,
  `email_client` varchar(50) NOT NULL,
  `etat` enum('attente','louer','fin contrat','rejeté','accepté') NOT NULL DEFAULT 'attente',
  `date_de_reservation` date NOT NULL DEFAULT current_timestamp(),
  `debut_de_contrat` date DEFAULT NULL,
  `fin_contrat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id_reservation`, `id_biens`, `email_client`, `etat`, `date_de_reservation`, `debut_de_contrat`, `fin_contrat`) VALUES
(44, 2208379, 'dia@gmail.com', 'fin contrat', '2023-07-31', '2023-07-31', '2023-07-22'),
(45, 2208597, 'dia@gmail.com', 'accepté', '2023-07-31', '2023-07-31', '2023-07-27'),
(46, 1690587176, 'dia@gmail.com', 'attente', '2023-07-31', '2023-07-09', '2023-08-05');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `Prenom` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `date de naissance` date NOT NULL,
  `lieu de naissance` varchar(30) NOT NULL,
  `numero` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` text NOT NULL,
  `etat` enum('act','desact') NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `profil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Prenom`, `nom`, `date de naissance`, `lieu de naissance`, `numero`, `email`, `status`, `etat`, `mot_de_passe`, `profil`) VALUES
('admin2', 'admin2', '1986-07-10', 'dakar', 778887788, 'admin2@gmail.com', 'commerciaux', 'act', 'default', 'img/profil/admin2@gmail.com.png'),
('admin1', 'admin1', '2002-03-14', 'kaolack', 775674678, 'admin@gmail.com', 'commerciaux', 'act', 'default', 'img/profil/admin@gmail.com.png'),
('dia', 'khadim', '2000-06-08', 'kolda', 778758934, 'dia@gmail.com', 'client', 'act', 'coolmdp', 'img/profil/dia@gmail.com.png'),
('ndiaye', 'ahmadou bamba', '1998-03-18', 'mbacke', 766667654, 'ndiaye@gmail.com', 'client', 'act', 'mbacke', 'img/profil/ndiaye@gmail.com.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `biens`
--
ALTER TABLE `biens`
  ADD PRIMARY KEY (`id_biens`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_biens` (`id_biens`),
  ADD KEY `email_client` (`email_client`),
  ADD KEY `id_biens_2` (`id_biens`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `biens`
--
ALTER TABLE `biens`
  MODIFY `id_biens` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1690587182;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

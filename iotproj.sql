-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 25 oct. 2021 à 18:47
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `iotproj`
--

-- --------------------------------------------------------

--
-- Structure de la table `data`
--

CREATE TABLE `data` (
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `idcapteur` varchar(56) NOT NULL,
  `temperature` float NOT NULL,
  `humidity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `data`
--

INSERT INTO `data` (`date`, `idcapteur`, `temperature`, `humidity`) VALUES
('2021-10-20 14:23:12', 'hello', 12.5, 16.3),
('2021-10-20 14:40:26', 'hello', 12, 11),
('2021-10-25 16:26:13', 'hello', 15.12, 22),
('2021-10-25 16:26:19', 'hello', 15.12, 22),
('2021-10-25 16:26:41', 'hello', 20.22, 14.02),
('2021-10-25 16:26:44', 'hello', 20.22, 14.02),
('2021-10-25 16:27:15', 'hello', 17.26, 12),
('2021-10-25 16:27:17', 'hello', 17.26, 12);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`date`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

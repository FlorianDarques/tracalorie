-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 25 nov. 2022 à 09:41
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tracalorie`
--

-- --------------------------------------------------------

--
-- Structure de la table `calorie`
--

CREATE TABLE `calorie` (
  `ID` int(11) NOT NULL,
  `emailuser` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `calorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `calorie`
--

INSERT INTO `calorie` (`ID`, `emailuser`, `date`, `calorie`) VALUES
(2, 'test@test.fr', '2022-11-23', 1648),
(3, 'test@test.fr', '2022-11-17', 1500),
(4, 'test@test.fr', '2022-11-18', 1240),
(5, 'test@test.fr', '2022-11-22', 2),
(6, 'root@root.fr', '2022-11-24', 937),
(7, 'root@root.fr', '2022-11-18', 1100),
(16, 'root@root.fr', '2022-11-19', 1200),
(19, 'root@root.fr', '2022-11-25', 100);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `calorie`
--
ALTER TABLE `calorie`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `calorie`
--
ALTER TABLE `calorie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

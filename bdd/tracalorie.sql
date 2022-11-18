-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 18 nov. 2022 à 07:42
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
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `ID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pswd` varchar(255) NOT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `gender` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`ID`, `email`, `username`, `pswd`, `height`, `weight`, `gender`) VALUES
(2, 'test@test.fr', 'test', '$2y$12$JZWPwANClwxm2iRACT72e.HX/80uUqvGSZFLqVX62sfVByQ5k3CNK', 180, 105, 1),
(3, 'test1@test.fr', 'test', '$2y$12$yIUE/T0RBaf1hOiSmG/wFuhkpaEcmlEeje5Gj8E4EeO6Gtx8pTC/2', 85, 180, 1),
(4, 'test2@test.fr', 'test', '$2y$12$k3DdOA3Ukf9ehcdxZKHvXufj18JXxyKh9U8d2nrqWjwFgzYKUlaxi', 85, 180, 2),
(5, 'test3@test.fr', 'test', '$2y$12$k5BwglkNENIu4AvmfJw5u.7rb6QUre8a413ZCTgkJg74GdGEkMQei', 85, 180, 1),
(6, 'test4@test.fr', 'test', '$2y$12$tfUKuqXq.23SQHeFz2.CVeKyz8xUzPmCp7PWUMUkERxXA8xqiBF1y', 85, 180, 1),
(9, 'root@root.fr', 'root', '$2y$12$bH1qFq6TpuwzIicPKQ1wJOGcAgkkd7X9aEywH6cl.rEHXQZFFLaEm', 85, 180, 2),
(10, 'root1@root.fr', 'root', '$2y$12$hwlEwY8ZuM6j.FICch0PoO8T7/mRnJm31Ol4koOyUjn7BUCNhiGLW', 85, 180, 2),
(29, 'florian@darques.fr', 'user', '$2y$12$D1Qpo35pb/EZHvO0h7gXJu02.8uRcsDRNKuPWI0HwxveQ73TYjQwa', 172, 120, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

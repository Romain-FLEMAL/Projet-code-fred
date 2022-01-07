-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 07 jan. 2022 à 14:20
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `registration`
--

-- --------------------------------------------------------

--
-- Structure de la table `assos_client_site`
--

DROP TABLE IF EXISTS `assos_client_site`;
CREATE TABLE IF NOT EXISTS `assos_client_site` (
  `id_client` int(10) NOT NULL,
  `id_site` int(10) NOT NULL,
  KEY `Id_client` (`id_client`,`id_site`),
  KEY `id_site` (`id_site`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `assos_client_site`
--

INSERT INTO `assos_client_site` (`id_client`, `id_site`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(10) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `contact` int(10) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `Nom`, `contact`) VALUES
(1, 'RORO', 611794646),
(2, 'toto', 711794645);

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

DROP TABLE IF EXISTS `site`;
CREATE TABLE IF NOT EXISTS `site` (
  `id_site` int(10) NOT NULL AUTO_INCREMENT,
  `Ville` varchar(20) NOT NULL,
  `adr` int(10) NOT NULL,
  PRIMARY KEY (`id_site`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `site`
--

INSERT INTO `site` (`id_site`, `Ville`, `adr`) VALUES
(1, 'Amiens', 13),
(2, 'lala', 14),
(3, 'nice', 17),
(4, 'orlean', 19);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `type`, `password`) VALUES
(5, 'root', 'admin', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2'),
(7, 'romain', 'user', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `assos_client_site`
--
ALTER TABLE `assos_client_site`
  ADD CONSTRAINT `assos_client_site_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `assos_client_site_ibfk_2` FOREIGN KEY (`id_site`) REFERENCES `site` (`id_site`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

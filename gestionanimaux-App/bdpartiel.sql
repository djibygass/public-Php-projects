-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 01 mai 2020 à 22:46
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdpartiel`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `password` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `password`) VALUES
(1, '$2y$10$Rmpf9OcXo5ft0/EcS1m/7.qntVdNuFMhGtKqHWuLaoSA49VH1O2I2');

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

DROP TABLE IF EXISTS `animal`;
CREATE TABLE IF NOT EXISTS `animal` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `nom` char(30) DEFAULT NULL,
  `photo` char(255) DEFAULT 'aucune.gif',
  `id_generique` mediumint(9) DEFAULT NULL,
  `id_proprietaire` mediumint(9) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_generique` (`id_generique`),
  KEY `id_proprietaire` (`id_proprietaire`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `animal`
--

INSERT INTO `animal` (`id`, `nom`, `photo`, `id_generique`, `id_proprietaire`) VALUES
(1, 'Touffue', 'touffue.jpg', 3, 1),
(2, 'Fend la Bise', 'fend.jpg', 1, 2),
(3, 'Toupie', 'toupie.jpg', 3, 4),
(4, 'Waf', 'waf.jpg', 2, 3),
(5, 'Fidele', 'fidele.jpg', 2, 1),
(6, 'dex', 'dex.jpg', 2, 2),
(7, 'zlatan', 'zlatan.jpg', 2, 4),
(8, 'django', 'django.jpg', 3, 3),
(9, 'toutou', 'toutou.jpg', 3, 1),
(10, 'java', 'java.jpg', 1, 4),
(11, 'Brad', 'brad.jpg', 2, 1),
(18, 'zafir', 'zafir.jpg', 1, 2),
(19, 'sirce', 'sirce.jpg', 3, 3),
(20, 'gazelle', 'gazelle.jpg', 2, 5),
(21, 'curly', 'curly.jpg', 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `generique`
--

DROP TABLE IF EXISTS `generique`;
CREATE TABLE IF NOT EXISTS `generique` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `nom_generique` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `generique`
--

INSERT INTO `generique` (`id`, `nom_generique`) VALUES
(1, 'Cheval'),
(2, 'chien'),
(3, 'chat'),
(4, 'oiseau'),
(5, 'serpent'),
(6, 'reptile'),
(7, 'poisson'),
(8, 'rongeur'),
(9, 'chèvre'),
(10, 'mouton');

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

DROP TABLE IF EXISTS `proprietaire`;
CREATE TABLE IF NOT EXISTS `proprietaire` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `titre` varchar(4) DEFAULT NULL,
  `nom_proprietaire` char(30) NOT NULL,
  `prenom` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `proprietaire`
--

INSERT INTO `proprietaire` (`id`, `titre`, `nom_proprietaire`, `prenom`) VALUES
(1, 'Mlle', 'BROWN', 'Delphine'),
(2, 'Mme', 'DARK', 'Mireille'),
(3, 'M.', 'YELLOW', 'Lipton'),
(4, 'M.', 'YELLOW', 'Submarine'),
(5, 'M.', 'GASSAMA', 'Djibril'),
(6, 'Mlle', 'GASSAMA', 'Astou');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`id_generique`) REFERENCES `generique` (`id`),
  ADD CONSTRAINT `animal_ibfk_2` FOREIGN KEY (`id_proprietaire`) REFERENCES `proprietaire` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

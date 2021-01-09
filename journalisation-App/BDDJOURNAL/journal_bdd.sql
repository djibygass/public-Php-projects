-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 30 avr. 2020 à 17:07
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
-- Base de données :  `journal_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `connection`
--

DROP TABLE IF EXISTS `connection`;
CREATE TABLE IF NOT EXISTS `connection` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `connection_start` datetime NOT NULL,
  `connection_end` datetime DEFAULT '0000-00-00 00:00:00',
  `id_login` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_login` (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connection`
--

INSERT INTO `connection` (`id`, `connection_start`, `connection_end`, `id_login`) VALUES
(18, '2020-04-29 13:35:50', '2020-04-29 13:37:53', 1),
(19, '2020-04-29 13:46:31', '2020-04-29 13:46:36', 1),
(20, '2020-04-29 15:53:04', '2020-04-29 15:53:18', 13),
(21, '2020-04-29 15:53:43', '2020-04-29 15:53:44', 5),
(22, '2020-04-29 15:53:52', '2020-04-29 15:53:53', 5),
(23, '2020-04-29 15:54:06', '2020-04-29 15:54:07', 1),
(24, '2020-04-29 15:55:32', '2020-04-29 15:55:33', 5),
(25, '2020-04-29 15:56:16', '2020-04-29 15:56:17', 1),
(26, '2020-04-29 15:56:44', '2020-04-29 15:56:46', 10),
(27, '2020-04-29 15:56:51', '2020-04-29 15:56:52', 10),
(28, '2020-04-29 15:57:21', '2020-04-29 15:57:22', 11),
(29, '2020-04-29 15:57:29', '2020-04-29 15:57:30', 9),
(30, '2020-04-29 15:58:02', '2020-04-29 15:58:04', 7),
(31, '2020-04-29 15:58:11', '2020-04-29 15:58:12', 7),
(32, '2020-04-29 15:58:21', '2020-04-29 15:58:22', 8),
(33, '2020-04-29 15:58:29', '2020-04-29 15:58:30', 11),
(34, '2020-04-29 15:58:40', '2020-04-29 15:58:41', 1),
(35, '2020-04-30 17:32:37', '2020-04-30 17:32:43', 1),
(36, '2020-04-30 18:23:23', '0000-00-00 00:00:00', 1),
(37, '2020-04-30 18:24:08', '0000-00-00 00:00:00', 9),
(38, '2020-04-30 18:25:05', '0000-00-00 00:00:00', 12),
(40, '2020-04-30 18:32:43', '0000-00-00 00:00:00', 1),
(41, '2020-04-30 18:39:40', '2020-04-30 18:39:59', 1),
(42, '2020-04-30 18:45:22', '2020-04-30 18:45:43', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `level`) VALUES
(1, 'djiby', 'azerty1', 1),
(3, 'admin', 'admin', 2),
(5, 'gsa', '123', 1),
(6, 'jayson', '123', 1),
(7, 'jbiji', '123', 1),
(8, 'strg', '123', 1),
(9, 'louf', '123', 1),
(10, 'sara', '123', 1),
(11, 'boyzn', '123', 1),
(12, 'travis', '123', 1),
(13, 'scott', '123', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `connection`
--
ALTER TABLE `connection`
  ADD CONSTRAINT `connection_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

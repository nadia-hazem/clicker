-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 05 mars 2023 à 08:16
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `clicker`
--

-- --------------------------------------------------------

--
-- Structure de la table `scores`
--

DROP TABLE IF EXISTS `scores`;
CREATE TABLE IF NOT EXISTS `scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `money` int(11) NOT NULL DEFAULT '0',
  `clickLevel` int(11) NOT NULL DEFAULT '1',
  `clickUpCost` int(11) NOT NULL DEFAULT '10',
  `autoLevel` int(11) NOT NULL DEFAULT '0',
  `autoUpCost` int(11) NOT NULL DEFAULT '50',
  `multiplierLevel` int(11) NOT NULL DEFAULT '1',
  `multUpCost` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

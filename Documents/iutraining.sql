-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  ven. 12 juin 2020 à 20:57
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `iutraining`
--

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `id_module` int(11) NOT NULL AUTO_INCREMENT,
  `nom_module` varchar(50) NOT NULL,
  PRIMARY KEY (`id_module`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id_module`, `nom_module`) VALUES
(1, 'C'),
(2, 'C++'),
(3, 'Java'),
(4, 'HTML/CSS'),
(5, 'Anglais'),
(6, 'Réseaux'),
(7, 'Mathematiques');

-- --------------------------------------------------------

--
-- Structure de la table `module_evalue`
--

DROP TABLE IF EXISTS `module_evalue`;
CREATE TABLE IF NOT EXISTS `module_evalue` (
  `id_module` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `module_evalue`
--

INSERT INTO `module_evalue` (`id_module`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(500) NOT NULL,
  `nombre_reponse` int(11) NOT NULL,
  `affichage_correction` tinyint(1) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  PRIMARY KEY (`id_question`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id_question`, `intitule`, `nombre_reponse`, `affichage_correction`, `id_prof`, `id_module`) VALUES
(8, 'Quand a été créé l&#39;HTML ?', 3, 0, 5, 4),
(7, 'Que signifie CSS ?', 2, 0, 4, 4),
(5, 'How do we say \"pain\" in english ?', 2, 1, 4, 5),
(6, 'Que vaut 4 + 4', 4, 0, 4, 7),
(9, 'Quand a été créé le Java ?', 4, 1, 5, 3),
(10, 'Quand a été créé le C ?', 3, 0, 5, 1),
(11, 'Quand a été créé le C++ ?', 3, 0, 5, 2),
(12, 'Quand Euler publia-t&#39;il la &#34;formule d&#39;Euler&#34; ?', 4, 1, 5, 7),
(13, 'De quand date la première connexion informatique à longue distance ?', 4, 1, 5, 6),
(14, 'De quand date le CSS ?', 3, 0, 5, 4),
(15, 'Que vaut √8 ?', 4, 0, 5, 7),
(16, 'Que vaut 1 + 1 + 1 ?', 3, 0, 4, 7),
(17, 'Que vaut 2 + 3 ?', 3, 0, 4, 7),
(18, 'Que vaut 5 - 3 ?', 3, 1, 4, 7),
(19, 'Que vaut 12 - 4 ?', 3, 0, 4, 7),
(20, 'Que vaut 4 - 8 + 31 ?', 2, 0, 4, 7);

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire`
--

DROP TABLE IF EXISTS `questionnaire`;
CREATE TABLE IF NOT EXISTS `questionnaire` (
  `id_questionnaire` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(50) NOT NULL,
  PRIMARY KEY (`id_questionnaire`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `questionnaire`
--

INSERT INTO `questionnaire` (`id_questionnaire`, `module`) VALUES
(1, 'Tous');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `id_reponse` int(11) NOT NULL AUTO_INCREMENT,
  `texte_reponse` varchar(500) NOT NULL,
  `juste` tinyint(1) NOT NULL,
  `id_question` int(11) NOT NULL,
  PRIMARY KEY (`id_reponse`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id_reponse`, `texte_reponse`, `juste`, `id_question`) VALUES
(18, 'Bread', 1, 5),
(17, 'Pain', 0, 5),
(26, '16', 0, 6),
(25, '8', 1, 6),
(24, '4', 0, 6),
(23, '2', 0, 6),
(27, 'Cascading Style Sheets', 1, 7),
(28, 'Cascading Sheets Style', 0, 7),
(29, '1992', 1, 8),
(30, '1995', 0, 8),
(31, '2002', 0, 8),
(32, '1994', 0, 9),
(33, '1996', 1, 9),
(34, '1998', 0, 9),
(35, '1999', 0, 9),
(36, '1969', 0, 10),
(37, '1972', 1, 10),
(38, '1981', 0, 10),
(39, '1979', 0, 11),
(40, '1983', 1, 11),
(41, '1986', 0, 11),
(42, '1714', 0, 12),
(43, '1723', 0, 12),
(44, '1748', 1, 12),
(45, '1784', 0, 12),
(46, '1962', 0, 13),
(47, '1965', 1, 13),
(48, '1966', 0, 13),
(49, '1968', 0, 13),
(50, '1992', 0, 14),
(51, '1993', 0, 14),
(52, '1996', 1, 14),
(53, '4', 0, 15),
(54, '2√2', 1, 15),
(55, '√4*√2', 1, 15),
(56, '2', 0, 15),
(57, '111', 0, 16),
(58, '3', 1, 16),
(59, '2 + 1', 1, 16),
(60, '5', 1, 17),
(61, '3 + 2', 1, 17),
(62, '0', 0, 17),
(63, '2', 0, 19),
(64, '8', 1, 19),
(65, '5', 0, 19),
(66, '27', 1, 20),
(67, '35', 0, 20),
(82, '2', 1, 18),
(81, '53', 0, 18),
(80, '8', 0, 18);

-- --------------------------------------------------------

--
-- Structure de la table `tentative_etudiant`
--

DROP TABLE IF EXISTS `tentative_etudiant`;
CREATE TABLE IF NOT EXISTS `tentative_etudiant` (
  `id_tentative` int(11) NOT NULL AUTO_INCREMENT,
  `date_soumission` date NOT NULL,
  `id_question` int(11) NOT NULL,
  `correcte` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_tentative`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mail` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `mot_de_passe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `statut` varchar(50) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `prenom`, `nom`, `mail`, `date_naissance`, `mot_de_passe`, `statut`) VALUES
(2, 'Florian', 'Landry', 'florian.landry71@gmail.com', '2000-09-25', '$2y$10$ouRp80yT3l4nT5nPpPK1KOE7MpjsOE5ArAymNrZ.6USk1FLN0SXDe', 'etudiant'),
(3, 'Paul', 'Personne', 'paul.personne@gmail.com', '1975-07-06', '$2y$10$7lPym8zOd/JwKTN/oIWTHeHF9yXmybrbgm1pG6gNz4w1drci38Wku', 'admin'),
(4, 'Marcel', 'Dubois', 'marcel.dubois@gmail.com', '1982-02-02', '$2y$10$vJWeHFMglyFOlTvmy0G8zeqTFERmEhb1M9VGjZMVyVprYzuobZm6C', 'prof'),
(5, 'Jean-Pierre', 'Foucault', 'jp.foucault@gmail.com', '1947-11-23', '$2y$10$rK5cJr6ks4A1Rnfw7dgFg.WBNXeCemRzQDnrVanxf47jpemsXFZ3W', 'prof');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

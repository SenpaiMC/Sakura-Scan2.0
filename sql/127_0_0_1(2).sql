-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 13 mai 2025 à 18:01
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
--
-- Base de données : `sakura_scan`
--
CREATE DATABASE IF NOT EXISTS `sakura_scan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `sakura_scan`;
-- Structure de la table `chapitres`
--

DROP TABLE IF EXISTS `chapitres`;
CREATE TABLE IF NOT EXISTS `chapitres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `livre_id` int NOT NULL,
  `numero` int NOT NULL,
  `chemin` varchar(255) NOT NULL,
  `chap_sortie` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `manga_id` (`livre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `chapitres`
--

INSERT INTO `chapitres` (`id`, `livre_id`, `numero`, `chemin`, `chap_sortie`) VALUES
(1, 4, 1, 'db-livre\\livres\\manhwa\\The_Beginning_After_the_End\\Chapitre 1', '2025-05-13 15:02:06'),
(2, 4, 2, 'livres\\manhwa\\The_Beginning_After_the_End\\Chapitre 2', '2025-05-11 18:38:41'),
(3, 4, 3, 'db-livre\\livres\\manhwa\\The_Beginning_After_the_End\\Chapitre 3', '2025-05-13 15:02:06'),
(4, 4, 4, 'db-livre\\livres\\manhwa\\The_Beginning_After_the_End\\Chapitre 4', '2025-05-13 15:02:06'),
(5, 4, 5, 'db-livre\\livres\\manhwa\\The_Beginning_After_the_End\\Chapitre 5', '2025-05-13 15:02:06'),
(6, 4, 6, 'db-livre\\livres\\manhwa\\The_Beginning_After_the_End\\Chapitre 6', '2025-05-13 15:02:06'),
(7, 4, 7, 'db-livre\\livres\\manhwa\\The_Beginning_After_the_End\\Chapitre 7', '2025-05-13 15:02:06'),
(8, 4, 8, 'db-livre\\livres\\manhwa\\The_Beginning_After_the_End\\Chapitre 8', '2025-05-13 15:02:06'),
(9, 4, 9, 'db-livre\\livres\\manhwa\\The_Beginning_After_the_End\\Chapitre 9', '2025-05-13 15:02:06'),
(10, 4, 10, 'db-livre\\livres\\manhwa\\The_Beginning_After_the_End\\Chapitre 10', '2025-05-13 15:02:06');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `auteurs` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `situation` varchar(255) NOT NULL,
  `sortie` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `livre_sortie` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `auteurs`, `type`, `genre`, `description`, `image`, `situation`, `sortie`, `livre_sortie`) VALUES
(1, 'Solo leveling', 'Chugong', 'manhwa', 'Action', 'Ce qui ne vous tue pas vous rend plus fort ! Mais ce dicton ne s\'applique pas au chasseur le plus faible de toute l’humanité, Jinwoo Sung. Après avoir été mortellement blessé lorsqu’il est tombé par hasard sur un double donjon caché, Jinwoo est miraculeus', 'db-livre/livres/manhwa/Solo_leveling/solo leveling.jpg', 'Terminé', '2025-05-11 18:00:37', 'Indéterminé'),
(2, 'Mission: Yozakura Family', 'Gondaira Hitsuji', 'manga', 'Action', 'Taiyô Asano est un lycéen à la timidité maladive. La seule personne avec qui il arrive à parler normalement est son amie d\'enfance Mutsumi Yozakura. Mais cette dernière est la fille d\'une famille d\'espions qui oeuvre depuis plusieurs générations, et son g', 'db-livre/livres/manga/Mission__Yozakura_Family/Mission Yozakura Family.jpg', 'Terminé', '2025-05-11 18:07:22', 'Indéterminé'),
(3, 'omniscient reader\'s viewpoint', 'Sing Shong', 'manhwa', 'Fantastique', 'Moi seul connais la fin de ce monde.\r\nAu moment où Kim Dok Ja eut cette pensée, le monde a été détruit et le monde de son webnovel préféré est apparu. Que fait-il pour survivre ? C\'est un monde frappé par la catastrophe et le danger. La nouvelle vie d\'un ', 'db-livre/livres/manhwa/omniscient_reader_s_viewpoint/Omniscient Reader\'s Viewpoint.jpg', 'En cours', '2025-05-11 18:15:19', 'Lundi'),
(4, 'The Beginning After the End', 'TurtleMe', 'manhwa', 'Aventure', 'Le roi Grey a une force, une richesse et un prestige inégalés. Cependant, la solitude persiste étroitement derrière ceux qui ont un grand pouvoir. Sous l\'extérieur glamour d\'un roi puissant se cache la coquille de l\'homme, sans but ni volonté.\r\n\r\nRéincarn', 'db-livre/livres/manhwa/The_Beginning_After_the_End/tbat.jpg', 'En cours', '2025-05-11 18:26:09', 'Vendredi');
--
-- Base de données : `users`
--
CREATE DATABASE IF NOT EXISTS `users` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `users`;

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

DROP TABLE IF EXISTS `administrateurs`;
CREATE TABLE IF NOT EXISTS `administrateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`id`, `nom`, `mot_de_passe`) VALUES
(2, 'Jucien', '789456123'),
(3, 'Mat', '$2y$10$AnP0QRp47AAH1Qgsb9Q50eltFzjEmt/dUtFjzC8BtHOrQXKFDcpre');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `photo_profil` varchar(255) DEFAULT NULL,
  `date_inscription` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `mot_de_passe`, `photo_profil`, `date_inscription`) VALUES
(6, 'Mat', '$2y$10$.aJLNt8LzFW8RlUG30CJQ.5OD5nf77eTI3nTLtgdk1OrTQBSW1.Dq', 'users/Bachirameguru.jpg', '2025-05-13 17:30:44');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

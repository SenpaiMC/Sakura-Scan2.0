-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 18 mai 2025 à 19:49
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sakura_scan`
--

-- --------------------------------------------------------

--
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
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(10, 4, 10, 'db-livre\\livres\\manhwa\\The_Beginning_After_the_End\\Chapitre 10', '2025-05-13 15:02:06'),
(11, 3, 0, 'db-livre\\livres\\manhwa\\omniscient_reader_s_viewpoint\\Chapter 0', '2025-05-18 18:25:46'),
(12, 3, 1, 'db-livre\\livres\\manhwa\\omniscient_reader_s_viewpoint\\Chapter 1', '2025-05-18 18:27:00'),
(13, 3, 2, 'db-livre\\livres\\manhwa\\omniscient_reader_s_viewpoint\\Chapter 2', '2025-05-18 18:28:53'),
(14, 3, 3, 'db-livre\\livres\\manhwa\\omniscient_reader_s_viewpoint\\Chapter 3', '2025-05-18 18:29:45'),
(15, 3, 4, 'db-livre\\livres\\manhwa\\omniscient_reader_s_viewpoint\\Chapter 4', '2025-05-18 18:30:00'),
(16, 3, 5, 'db-livre\\livres\\manhwa\\omniscient_reader_s_viewpoint\\Chapter 5', '2025-05-18 18:30:08'),
(17, 3, 6, 'db-livre\\livres\\manhwa\\omniscient_reader_s_viewpoint\\Chapter 6', '2025-05-18 18:30:47'),
(18, 3, 7, 'db-livre\\livres\\manhwa\\omniscient_reader_s_viewpoint\\Chapter 7', '2025-05-18 18:30:56'),
(19, 3, 8, 'db-livre\\livres\\manhwa\\omniscient_reader_s_viewpoint\\Chapter 8', '2025-05-18 18:31:14'),
(20, 3, 9, 'db-livre\\livres\\manhwa\\omniscient_reader_s_viewpoint\\Chapter 9', '2025-05-18 18:31:26'),
(21, 3, 10, 'db-livre\\livres\\manhwa\\omniscient_reader_s_viewpoint\\Chapter 10', '2025-05-18 18:31:39'),
(22, 1, 0, 'db-livre\\livres\\manhwa\\Solo_leveling\\Chapitre 0 - Prologue', '2025-05-18 18:38:31'),
(23, 1, 1, 'db-livre\\livres\\manhwa\\Solo_leveling\\Chapitre 1', '2025-05-18 18:39:26'),
(24, 1, 2, 'db-livre\\livres\\manhwa\\Solo_leveling\\Chapitre 2', '2025-05-18 18:40:09'),
(25, 1, 3, 'db-livre\\livres\\manhwa\\Solo_leveling\\Chapitre 3', '2025-05-18 18:40:50'),
(26, 1, 4, 'db-livre\\livres\\manhwa\\Solo_leveling\\Chapitre 4', '2025-05-18 18:41:02'),
(27, 1, 5, 'db-livre\\livres\\manhwa\\Solo_leveling\\Chapitre 5', '2025-05-18 18:41:23'),
(28, 1, 6, 'db-livre\\livres\\manhwa\\Solo_leveling\\Chapitre 6', '2025-05-18 18:41:35'),
(29, 1, 7, 'db-livre\\livres\\manhwa\\Solo_leveling\\Chapitre 7', '2025-05-18 18:41:49'),
(30, 1, 8, 'db-livre\\livres\\manhwa\\Solo_leveling\\Chapitre 8', '2025-05-18 18:42:00'),
(31, 1, 9, 'db-livre\\livres\\manhwa\\Solo_leveling\\Chapitre 9', '2025-05-18 18:42:14'),
(32, 1, 10, 'db-livre\\livres\\manhwa\\Solo_leveling\\Chapitre 10', '2025-05-18 18:42:29'),
(33, 2, 1, 'db-livre\\livres\\manga\\Mission__Yozakura_Family\\Mission 1', '2025-05-18 19:02:10'),
(34, 2, 2, 'db-livre\\livres\\manga\\Mission__Yozakura_Family\\Mission 2', '2025-05-18 19:11:31'),
(35, 2, 3, 'db-livre\\livres\\manga\\Mission__Yozakura_Family\\Mission 3', '2025-05-18 19:11:40'),
(36, 2, 4, 'db-livre\\livres\\manga\\Mission__Yozakura_Family\\Mission 4', '2025-05-18 19:16:04'),
(37, 2, 5, 'db-livre\\livres\\manga\\Mission__Yozakura_Family\\Mission 5', '2025-05-18 19:16:18'),
(38, 2, 6, 'db-livre\\livres\\manga\\Mission__Yozakura_Family\\Mission 6', '2025-05-18 19:16:27'),
(39, 2, 7, 'db-livre\\livres\\manga\\Mission__Yozakura_Family\\Mission 7', '2025-05-18 19:16:36'),
(40, 2, 8, 'db-livre\\livres\\manga\\Mission__Yozakura_Family\\Mission 8', '2025-05-18 19:16:46'),
(41, 2, 9, 'db-livre\\livres\\manga\\Mission__Yozakura_Family\\Mission 9', '2025-05-18 19:17:04'),
(42, 2, 10, 'db-livre\\livres\\manga\\Mission__Yozakura_Family\\Mission 10', '2025-05-18 19:17:21');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

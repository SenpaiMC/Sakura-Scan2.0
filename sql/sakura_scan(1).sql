-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 11 mai 2025 à 16:49
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `chapitres`
--

INSERT INTO `chapitres` (`id`, `livre_id`, `numero`, `chemin`, `chap_sortie`) VALUES
(1, 1, 1, 'mangas\\mission__yozakura_family\\chapitre 1\\', '2025-05-07 21:24:57'),
(2, 1, 2, 'mangas/mission__yozakura_family/Chapter 1_ L’Anneau des cerisiers/', '2025-05-07 21:24:57'),
(3, 1, 3, 'mangas\\mission__yozakura_family\\chapitre 1', '2025-05-07 21:24:57'),
(4, 1, 4, 'mangas\\mission__yozakura_family\\chapitre 1', '2025-05-07 21:24:57'),
(5, 1, 5, 'mangas\\mission__yozakura_family\\Chapter 1_ L’Anneau des cerisiers', '2025-05-07 21:24:57'),
(6, 1, 6, 'mangas\\mission__yozakura_family\\Chapter 1_ L’Anneau des cerisiers', '2025-05-07 21:25:33'),
(7, 9, 1, 'livres\\manhwa\\Solo_Max-Level_Newbie\\Ch.1', '2025-05-09 17:33:43'),
(8, 9, 2, 'livres\\manhwa\\Solo_Max-Level_Newbie\\Ch.2', '2025-05-09 17:34:27');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `auteurs`, `type`, `genre`, `description`, `image`, `situation`, `sortie`, `livre_sortie`) VALUES
(1, 'mission: yozakura family', '', 'manga', 'Action', 'Afin de protéger Mutsumi et de découvrir la véritable raison de la mort de ses parents, Taiyo Asano va devoir devenir membre de la famille Yozakura, une famille d\'espions de haut vol ! Plus facile à dire qu\'à faire avec les membres de cette famille légère', 'images/001.jpg', '', '2025-05-07 21:31:40', 'dimanche'),
(3, 'call', '', '', 'Action', 'qfqfeer', 'livres/manga/callava.png', '', '2025-05-07 21:31:40', 'samedi'),
(4, 'call', '', '', 'Action', 'qfqfeer', 'livres/manga/call/ava.png', '', '2025-05-07 21:31:40', 'vendredi'),
(5, 'ss', '', '', 'Aventure', 'sqferz', 'livres/manga/ss/sl.jpeg', '', '2025-05-07 21:31:40', 'jeudi'),
(6, 'ss', '', 'Aventure', 'manga', 'sqferz', 'livres/manga/ss/sl.jpeg', '', '2025-05-07 21:31:40', 'mardi'),
(7, 'ss', '', 'manga', 'Aventure', 'sqferz', 'livres/manga/ss/sl.jpeg', '', '2025-05-07 21:31:40', 'Indéterminé'),
(8, 'ffffffff', 'rerez', 'manhua', 'Fantastique', 'sdfsdfre', 'livres/manhua/ffffffff/taiyo.jpg', 'Terminé', '2025-05-07 21:52:05', 'Mercredi'),
(9, 'Solo Max-Level Newbie', 'swingbat', 'manhwa', 'Action', 'Jin-Hyuk, un joueur sur Nutube, était la seule personne à avoir vu la fin du jeu [La Tour aux épreuves]. Toutefois, quand la popularité du jeu fit une chute libre, il devint plus difficile pour lui de vivre en tant que Nutuber. Puisqu’il avait déjà vu la ', 'livres/manhwa/Solo_Max-Level_Newbie/solo-max-level-newb-193x278.jpg', 'En cours', '2025-05-09 17:32:18', 'Lundi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

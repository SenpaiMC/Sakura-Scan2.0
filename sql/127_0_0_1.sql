-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 06 mai 2025 à 20:57
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
-- Base de données : `mon_site`
--
CREATE DATABASE IF NOT EXISTS `mon_site` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `mon_site`;

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
-- Structure de la table `series`
--

DROP TABLE IF EXISTS `series`;
CREATE TABLE IF NOT EXISTS `series` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `genre1` varchar(255) DEFAULT NULL,
  `genre2` varchar(255) DEFAULT NULL,
  `genre3` varchar(255) DEFAULT NULL,
  `synopsie` text,
  `cover` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `series`
--

INSERT INTO `series` (`id`, `name`, `type`, `genre1`, `genre2`, `genre3`, `synopsie`, `cover`) VALUES
(3, 'solo', 'webtoon', 'action , fantasy , syst?me', NULL, NULL, 'histoire ....', 'series/webtoon/solo/coversl.jpeg'),
(11, 'solo leveling', 'Webtoon', 'Action', NULL, NULL, 'Il y a dix ans, des portails apparaissaient en ouvrant des passages vers des donjons et du monde parall?le, et parmi des gens normaux, certains ont ?veill? leurs pouvoirs et sont devenus des chasseurs. Sung Jin Woo, un chasseur faible, a beaucoup de mal ? survivre. Un jour, il se retrouve dans un double donjon et en ?chappant la mort ? la justesse, il obtient un ?trange pouvoir et devient le chasseur le plus fort.', 'series/Webtoon/solo leveling/coversl.jpeg'),
(9, 'solo n', 'Webtoon', 'Aventure', NULL, NULL, 'histoire ....', 'series/Webtoon/solo n/coversl.jpeg'),
(10, 'yozakura', 'Manga', 'Action', NULL, NULL, 'histoire ....', 'series/Manga/yozakura/coversl.jpeg'),
(12, 'MM', 'Manga', 'Aventure', 'Aventure', 'Comédie', 'SQDF', 'series/Manga/MM/cover003.jpg'),
(13, 's', 'Manga', 'Syst?me', 'Syst?me', 'Système', 's', 'series/Manga/s/cover003.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `mot_de_passe`, `photo_profil`, `date_inscription`) VALUES
(1, 'Mat', '$2y$10$GKc3gz5QZ8e.JILJp4559e5l//v44PCY4Hson3DjmjFiU19k/NAOW', 'uploads/statue.jpg', '2025-04-25 13:50:39'),
(2, 'pafe', '$2y$10$lT8jgwKUlZEE03JhpbAs1.xiyn0XCkks6dWX6tQ2CsdGOyuX81gwS', 'uploads/sl.jpeg', '2025-04-28 17:03:50'),
(3, 'pafe', '$2y$10$zYKwWnrxEMAG.hiGbBRmYuyh.TAhpsqMivK5OEuOgyYLvLjyxXUMm', 'uploads/sl.jpeg', '2025-04-28 17:06:23'),
(4, 'dada', '$2y$10$wvRo3nW7KUvxrJI6V4p7Z.Yhba4EzpstFH/Q3CI1RLtGhVG5ICF4K', 'uploads/001.jpg', '2025-05-02 19:46:08'),
(5, 'dada1', '$2y$10$sroAw8UXEUGp3tJvR4wBReM6lLk8/4qE/OkRe5MRwkex.pFe17n06', 'users/001.jpg', '2025-05-04 21:01:34');
--
-- Base de données : `sakura_scan`
--
CREATE DATABASE IF NOT EXISTS `sakura_scan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `sakura_scan`;

-- --------------------------------------------------------

--
-- Structure de la table `chapitres`
--

DROP TABLE IF EXISTS `chapitres`;
CREATE TABLE IF NOT EXISTS `chapitres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `manga_id` int NOT NULL,
  `numero` int NOT NULL,
  `chemin` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `manga_id` (`manga_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `chapitres`
--

INSERT INTO `chapitres` (`id`, `manga_id`, `numero`, `chemin`) VALUES
(1, 1, 1, 'mangas\\mission__yozakura_family\\chapitre 1\\'),
(2, 1, 2, 'mangas/mission__yozakura_family/Chapter 1_ L’Anneau des cerisiers/'),
(3, 1, 3, 'mangas\\mission__yozakura_family\\chapitre 1'),
(4, 1, 4, 'mangas\\mission__yozakura_family\\chapitre 1');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `type`, `genre`, `description`, `image`) VALUES
(1, 'mission: yozakura family', '', 'Action', 'Afin de protéger Mutsumi et de découvrir la véritable raison de la mort de ses parents, Taiyo Asano va devoir devenir membre de la famille Yozakura, une famille d\'espions de haut vol ! Plus facile à dire qu\'à faire avec les membres de cette famille légère', 'images/001.jpg'),
(3, 'call', '', 'Action', 'qfqfeer', 'livres/manga/callava.png'),
(4, 'call', '', 'Action', 'qfqfeer', 'livres/manga/call/ava.png'),
(5, 'ss', '', 'Aventure', 'sqferz', 'livres/manga/ss/sl.jpeg'),
(6, 'ss', 'Aventure', 'manga', 'sqferz', 'livres/manga/ss/sl.jpeg'),
(7, 'ss', 'manga', 'Aventure', 'sqferz', 'livres/manga/ss/sl.jpeg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

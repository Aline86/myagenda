-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 11 avr. 2020 à 13:16
-- Version du serveur :  10.4.10-MariaDB
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
-- Base de données :  `my_agenda`
--

-- --------------------------------------------------------

--
-- Structure de la table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE IF NOT EXISTS `agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `titre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `heure` varchar(50) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_agenda`),
  KEY `fk_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `id_user`, `titre`, `description`, `date`, `heure`, `image`) VALUES
(40, 8, 'FÃªte de la biÃ¨re', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit', '2020-10-22', '14h15', './images/beer-820011_640.jpg'),
(41, 8, 'Atelier vin Charentais', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit', '2020-04-28', '18h45', './images/wine-1761613_1920.jpg'),
(42, 8, 'Concert Ã  l\'envers du bocal', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit', '2020-04-14', '14h', './images/musician-1658887_1280.jpg'),
(44, 8, 'Concert au Zinc', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit', '2020-04-29', '20h00', './images/live-music-2219036_1280.jpg'),
(45, 13, 'Concert au relax', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit', '2020-04-08', '20h30', './images/jazz-1658886_1280.jpg'),
(46, 13, 'Repas guitare au cafÃ© des arts', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit', '2020-04-23', '19h30', './images/guitar-756326_1280.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `agenda_comment`
--

DROP TABLE IF EXISTS `agenda_comment`;
CREATE TABLE IF NOT EXISTS `agenda_comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_agenda` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `fk_id_agenda` (`id_agenda`),
  KEY `fk_id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agenda_comment`
--

INSERT INTO `agenda_comment` (`id_comment`, `id_agenda`, `id_user`, `commentaire`, `date`, `heure`) VALUES
(23, 40, 8, 'Est-ce qu\'il y aurait des personnes intÃ©ressÃ©es par un covoit ?', '2020-04-11', '03:48:31'),
(24, 42, 8, 'Vous avez vu, ils ont un nouveau chanteur. Il est bien ?', '2020-04-11', '03:50:47'),
(25, 42, 8, 'Je sais pas, on m\' a dit qu\'il chante un peu faux.', '2020-04-11', '03:51:09'),
(26, 42, 8, 'En tous cas j\'aimerais trop lui parler.', '2020-04-11', '03:51:37'),
(27, 41, 8, 'J\'aime pas le vin Charentais.', '2020-04-11', '03:52:03'),
(28, 41, 8, 'Ne viens pas dans ce cas, intervention inutile.', '2020-04-11', '03:52:22'),
(30, 44, 8, 'Waouh ils font venir Led Zeppelin ! Vous Ãªtes trop gÃ©niaux le Zinc.', '2020-04-11', '03:00:53');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `login`, `password`, `pseudo`) VALUES
(6, 'Laeti6', '$2y$10$X0p.JOrxU.t7NUY3oO6G/.KxQdj75QtOwEqIWIWbLmdIIqYpq3YrW', 'Laeti6'),
(7, 'Laeti9', '$2y$10$5Dy2UC5yz4YhP28eJs2Ene.mCmlFAWRmXOFL5ozenlAE25MKDk2J.', 'Laeti9'),
(8, 'Laura1', '$2y$10$ckU68irOaLwtVYRpauiqZu3XDXEqOn5pNbTpW2kKOWavc.5zE9kWm', 'Laura1'),
(9, 'Jeannot', '$2y$10$XII.5p3IRELMk8ZYEB/9leRbtkyWtkCN1edkCMRsyLsIY4//YM9E2', 'Jean'),
(10, 'Lauralee', '$2y$10$d/m2bdtFLJeO8L9oJLzbxuP.URe1z17WU.IVNCNkL9v/qWyQFlPG2', 'Laura1'),
(11, 'Lara', '$2y$10$AKoYv9wtM9rOtKWcBR79kO7EXKYqmGXJdznYTKD5OeLtcHjAIygg.', 'Lara'),
(12, 'Flofli', '$2y$10$UldqRyYVHMG04qRtioZC6Of5IKt121TH.UIji32u8LY4E.4O3NdIa', 'Florent'),
(13, 'Laura2', '$2y$10$2ME6vbMT1iwzgdNx3SbdwevMSruNG2rtKyckryuR6g3JpC9PVbAI6', 'Laura2');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `agenda_comment`
--
ALTER TABLE `agenda_comment`
  ADD CONSTRAINT `fk_id_agenda` FOREIGN KEY (`id_agenda`) REFERENCES `agenda` (`id_agenda`),
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

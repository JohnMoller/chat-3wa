-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 22 Juin 2016 à 13:33
-- Version du serveur: 5.5.49-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `tchat`
--

-- --------------------------------------------------------

--
-- Structure de la table `channel`
--

CREATE TABLE IF NOT EXISTS `channel` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `description` varchar(511) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `channel`
--

INSERT INTO `channel` (`id`, `title`, `description`, `date`, `id_user`) VALUES
(1, 'test', 'categorie de test', '2016-06-21 13:27:35', 1);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `contenu` varchar(2047) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) unsigned NOT NULL,
  `id_channel` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `category` (`id_channel`),
  KEY `id_category` (`id_channel`),
  KEY `id_channel` (`id_channel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=179 ;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `contenu`, `date`, `id_user`, `id_channel`) VALUES
(6, 'test', '2016-06-10 09:24:56', 1, 1),
(8, 'Ã§a fonctionne', '2016-06-10 09:27:08', 1, 1),
(9, 'coucou :)', '2016-06-10 09:30:28', 2, 1),
(10, 'c''est trop de la boulette', '2016-06-10 09:38:03', 1, 1),
(11, 'dazdazdza', '2016-06-10 09:38:26', 1, 1),
(12, 'eryery', '2016-06-10 10:02:27', 2, 1),
(13, 'adzadazdza', '2016-06-10 10:02:43', 2, 1),
(14, 'ehelhnkrejh', '2016-06-10 10:05:29', 2, 1),
(15, 'aaaaaaaaaaa', '2016-06-10 12:12:06', 2, 1),
(130, 'ggtgt', '2016-06-10 12:24:24', 2, 1),
(131, 'toto', '2016-06-10 12:29:00', 2, 1),
(132, 'hjgfh', '2016-06-10 12:31:51', 2, 1),
(133, 'dddbf', '2016-06-10 12:31:53', 2, 1),
(134, 'dfggfn', '2016-06-10 12:31:56', 2, 1),
(135, 'zdxczdc', '2016-06-10 12:44:26', 2, 1),
(136, 'dezc', '2016-06-10 12:44:27', 2, 1),
(137, 'ezd', '2016-06-10 12:44:27', 2, 1),
(138, 'ze', '2016-06-10 12:44:27', 2, 1),
(139, 'cezd', '2016-06-10 12:44:28', 2, 1),
(140, 'ez', '2016-06-10 12:44:28', 2, 1),
(141, 'toto', '2016-06-10 12:48:18', 2, 1),
(142, 'yiy', '2016-06-10 12:49:50', 2, 1),
(143, 'ergerg', '2016-06-10 13:01:44', 2, 1),
(144, 'coucou', '2016-06-10 13:01:54', 2, 1),
(145, 'gfhghf', '2016-06-10 13:05:14', 2, 1),
(146, ' gxfgx', '2016-06-10 13:32:39', 2, 1),
(147, 'tets', '2016-06-13 07:04:51', 1, 1),
(148, 'test', '2016-06-13 07:04:55', 1, 1),
(149, 'yo', '2016-06-13 07:06:54', 1, 1),
(150, 'tetsttt', '2016-06-16 14:19:21', 1, 1),
(151, 'yooyoyioy', '2016-06-16 14:31:19', 1, 1),
(152, 'yooyoyioy', '2016-06-16 14:31:21', 1, 1),
(153, 'yooyoyioy', '2016-06-16 14:31:22', 1, 1),
(154, 'yooyoyioy', '2016-06-16 14:31:22', 1, 1),
(155, 'yooyoyioy', '2016-06-16 14:31:22', 1, 1),
(156, 'test', '2016-06-16 14:31:26', 1, 1),
(157, 'filipe', '2016-06-16 14:31:43', 1, 1),
(158, 'new message', '2016-06-16 14:35:56', 1, 1),
(159, 'sssss', '2016-06-16 14:36:11', 1, 1),
(160, 'hyhy', '2016-06-16 14:37:35', 1, 1),
(161, 'ddd', '2016-06-16 14:37:51', 1, 1),
(162, 'yyyy', '2016-06-16 14:38:30', 1, 1),
(163, 'message de dhbdef ib er fez', '2016-06-16 14:39:22', 1, 1),
(164, 'toto', '2016-06-21 12:40:00', 2, 1),
(165, 'test', '2016-06-21 13:01:20', 1, 1),
(166, 'toto', '2016-06-21 13:01:39', 2, 1),
(170, 'zzzeeee', '2016-06-22 07:30:11', 1, 1),
(171, 'tutyutyutyutyu', '2016-06-22 07:41:00', 1, 1),
(172, 'tyughjghjhgjghj,bbn,', '2016-06-22 07:41:03', 1, 1),
(173, 'tutyty', '2016-06-22 07:41:09', 1, 1),
(174, 'aaaaaa', '2016-06-22 07:41:15', 1, 1),
(175, 'qqqq', '2016-06-22 07:42:53', 1, 1),
(176, '5847857482', '2016-06-22 07:50:03', 1, 1),
(177, 'testtt', '2016-06-22 08:01:13', 1, 1),
(178, 'yyyyyy', '2016-06-22 08:21:37', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(15) NOT NULL,
  `mail` varchar(63) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_connexion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`,`password`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `mail`, `password`, `last_connexion`) VALUES
(1, 'filipe', 'filipe@filipe.com', '$2y$08$XOUblxGl0dp.LIGsl5sQDuDq/RddwrM1.aW/u2A23nCZy3Qiw1wnS', '2016-06-22 09:27:08'),
(2, 'John', 'john@john.com', '$2y$08$5Q6VTeTaYfSd2nbXMCzJPeI3htH/uboRPtdq144ZSyn4baE8A/DQq', '2016-06-21 14:31:45');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `channel`
--
ALTER TABLE `channel`
  ADD CONSTRAINT `channel_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_channel`) REFERENCES `channel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

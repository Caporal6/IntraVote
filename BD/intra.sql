-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 28 Septembre 2023 à 20:44
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `intra`
--

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `lieux` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `heure` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `departement` varchar(150) NOT NULL,
  `vote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`id`, `nom`, `lieux`, `date`, `heure`, `description`, `departement`, `vote`) VALUES
(1, 'werwe', '234', '2023-09-04', '234', '234', 'DEC-Bac en marketing', 15),
(6, 'YESSSIRRRR', '95', '2023-09-05', '234', 'wer', 'wer', 0),
(11, 'rty', 'rty', '2023-09-05', '18:32', 'rtyrty', 'Techniques de design dinterieur', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `password`) VALUES
(4, 'xavier', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785'),
(5, 'yo', '5898fc860300e228dcd54c0b1045b5fa0dcda502');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `vote_etudiant` int(11) NOT NULL,
  `vote_employeur` int(11) NOT NULL,
  `bon` int(11) NOT NULL,
  `moyen` int(11) NOT NULL,
  `mauvais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vote`
--

INSERT INTO `vote` (`id`, `vote_etudiant`, `vote_employeur`, `bon`, `moyen`, `mauvais`) VALUES
(1, 15, 42, 52, 114, 73);

-- --------------------------------------------------------

--
-- Structure de la table `vote_employeur`
--

CREATE TABLE `vote_employeur` (
  `id` int(11) NOT NULL,
  `Nombre` int(250) NOT NULL DEFAULT '0',
  `Bon` int(250) NOT NULL DEFAULT '0',
  `Moyen` int(250) NOT NULL DEFAULT '0',
  `Mauvais` int(250) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vote_employeur`
--

INSERT INTO `vote_employeur` (`id`, `Nombre`, `Bon`, `Moyen`, `Mauvais`) VALUES
(1, 31, 11, 12, 10);

-- --------------------------------------------------------

--
-- Structure de la table `vote_etudiant`
--

CREATE TABLE `vote_etudiant` (
  `id` int(11) NOT NULL,
  `Nombre` int(250) NOT NULL,
  `Bon` int(250) NOT NULL,
  `Moyen` int(250) NOT NULL,
  `Mauvais` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vote_etudiant`
--

INSERT INTO `vote_etudiant` (`id`, `Nombre`, `Bon`, `Moyen`, `Mauvais`) VALUES
(1, 59, 30, 28, 29);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`nom`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vote_employeur`
--
ALTER TABLE `vote_employeur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vote_etudiant`
--
ALTER TABLE `vote_etudiant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `vote_employeur`
--
ALTER TABLE `vote_employeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `vote_etudiant`
--
ALTER TABLE `vote_etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 06 Octobre 2016 à 09:51
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pinto`
--

-- --------------------------------------------------------

--
-- Structure de la table `bars`
--

CREATE TABLE `bars` (
  `id_bar` int(10) UNSIGNED NOT NULL,
  `photos_id_photo` int(11) UNSIGNED DEFAULT NULL,
  `styles_bars_id_style_bar` int(11) UNSIGNED DEFAULT NULL,
  `villes_id_ville` int(11) UNSIGNED DEFAULT NULL,
  `nom_bar` varchar(255) DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `rue` varchar(255) DEFAULT NULL,
  `description` text,
  `telephone` varchar(20) DEFAULT NULL,
  `mot_patron` text,
  `site_web` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bars`
--

INSERT INTO `bars` (`id_bar`, `photos_id_photo`, `styles_bars_id_style_bar`, `villes_id_ville`, `nom_bar`, `longitude`, `latitude`, `numero`, `rue`, `description`, `telephone`, `mot_patron`, `site_web`) VALUES
(1, NULL, 4, 1, 'Le Virgil', 6.44668, 48.1754, '4', 'Rue des Pompes', 'Superbe terrasse en rue piétonne et soirées bien animées comme on les aime !\r\n\r\nTrès bien situé dans le centre-ville d’Épinal, le bar-brasserie, Le Virgile vous reçoit dans un cadre lumineux, tendance et confortable.\r\n\r\nIl dispose d’une belle et grande terrasse donnant sur une rue piétonnière agréable.\r\n\r\nParfait pour un déjeuner du midi, il propose une carte de brasserie classique et sans mauvaise surprises.\r\n\r\nIdéal pour vos apéritifs prolongés, et vos Before, il organise de nombreuses soirées bien festives, avec des Mix DJ et des retransmissions TV de vos matchs préférés.\r\n\r\nUn espace fumeur fermé. ', '0329823946', '', NULL),
(2, NULL, 4, 1, 'Au Bureau Epinal', 6.45094, 48.1748, '1', 'Place Edmond Henry', 'Burgers, cuisine bistro et spécialités locales dans une chaîne de brasseries-pubs au décor anglo-saxon rétro', '0329301300', NULL, 'http://www.aubureau-epinal.com/'),
(3, NULL, 2, 1, 'Le Sulky', 6.44628, 48.1748, '4', 'Rue des Petites Boucheries', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `bar_biere`
--

CREATE TABLE `bar_biere` (
  `bars_id_bar` int(10) UNSIGNED NOT NULL,
  `bieres_id_biere` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `bar_favori`
--

CREATE TABLE `bar_favori` (
  `bars_id_bar` int(10) UNSIGNED NOT NULL,
  `utilisateurs_id_utilisateur` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `bieres`
--

CREATE TABLE `bieres` (
  `id_biere` int(10) UNSIGNED NOT NULL,
  `type_biere_id_type_biere` int(11) UNSIGNED DEFAULT NULL,
  `pays_id_pays` int(11) UNSIGNED DEFAULT NULL,
  `photos_id_photo` int(11) UNSIGNED DEFAULT NULL,
  `nom_biere` varchar(255) DEFAULT NULL,
  `degree_biere` float DEFAULT NULL,
  `prix_normal` float DEFAULT NULL,
  `prix_happy` float DEFAULT NULL,
  `description` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `biere_favori`
--

CREATE TABLE `biere_favori` (
  `bieres_id_biere` int(10) UNSIGNED NOT NULL,
  `utilisateurs_id_utilisateur` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `galerie_bar`
--

CREATE TABLE `galerie_bar` (
  `bars_id_bar` int(10) UNSIGNED NOT NULL,
  `photos_id_photo` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `horaires`
--

CREATE TABLE `horaires` (
  `id_horaire` int(11) UNSIGNED NOT NULL,
  `bars_id_bar` int(10) UNSIGNED DEFAULT NULL,
  `numero_jour` int(1) UNSIGNED DEFAULT NULL,
  `heure_debut` time DEFAULT NULL,
  `heure_fin` time DEFAULT NULL,
  `is_happy_hour` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id_pays` int(11) UNSIGNED NOT NULL,
  `nom_pays` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `id_photo` int(11) UNSIGNED NOT NULL,
  `fichier` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) UNSIGNED NOT NULL,
  `nom_role` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `styles_bars`
--

CREATE TABLE `styles_bars` (
  `id_style_bar` int(11) UNSIGNED NOT NULL,
  `nom_style_bar` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `styles_bars`
--

INSERT INTO `styles_bars` (`id_style_bar`, `nom_style_bar`) VALUES
(1, 'Lounge'),
(2, 'Bar de Quartier'),
(3, 'Pub'),
(4, 'Brasserie');

-- --------------------------------------------------------

--
-- Structure de la table `type_biere`
--

CREATE TABLE `type_biere` (
  `id_type_biere` int(11) UNSIGNED NOT NULL,
  `nom_type_biere` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(10) UNSIGNED NOT NULL,
  `roles_id_role` int(11) UNSIGNED DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password_2` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `id_ville` int(11) UNSIGNED NOT NULL,
  `code_postal` varchar(10) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `villes`
--

INSERT INTO `villes` (`id_ville`, `code_postal`, `ville`) VALUES
(1, '88000', 'Épinal');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `bars`
--
ALTER TABLE `bars`
  ADD PRIMARY KEY (`id_bar`),
  ADD KEY `bars_FKIndex1` (`villes_id_ville`),
  ADD KEY `bars_FKIndex2` (`styles_bars_id_style_bar`),
  ADD KEY `bars_FKIndex3` (`photos_id_photo`);

--
-- Index pour la table `bar_biere`
--
ALTER TABLE `bar_biere`
  ADD PRIMARY KEY (`bars_id_bar`,`bieres_id_biere`),
  ADD KEY `bars_has_bieres_FKIndex1` (`bars_id_bar`),
  ADD KEY `bars_has_bieres_FKIndex2` (`bieres_id_biere`);

--
-- Index pour la table `bar_favori`
--
ALTER TABLE `bar_favori`
  ADD PRIMARY KEY (`bars_id_bar`,`utilisateurs_id_utilisateur`),
  ADD KEY `bars_has_utilisateurs_FKIndex1` (`bars_id_bar`),
  ADD KEY `bars_has_utilisateurs_FKIndex2` (`utilisateurs_id_utilisateur`);

--
-- Index pour la table `bieres`
--
ALTER TABLE `bieres`
  ADD PRIMARY KEY (`id_biere`),
  ADD KEY `bieres_FKIndex1` (`photos_id_photo`),
  ADD KEY `bieres_FKIndex2` (`pays_id_pays`),
  ADD KEY `bieres_FKIndex3` (`type_biere_id_type_biere`);

--
-- Index pour la table `biere_favori`
--
ALTER TABLE `biere_favori`
  ADD PRIMARY KEY (`bieres_id_biere`,`utilisateurs_id_utilisateur`),
  ADD KEY `bieres_has_utilisateurs_FKIndex1` (`bieres_id_biere`),
  ADD KEY `bieres_has_utilisateurs_FKIndex2` (`utilisateurs_id_utilisateur`);

--
-- Index pour la table `galerie_bar`
--
ALTER TABLE `galerie_bar`
  ADD PRIMARY KEY (`bars_id_bar`,`photos_id_photo`),
  ADD KEY `bars_has_photos_FKIndex1` (`bars_id_bar`),
  ADD KEY `bars_has_photos_FKIndex2` (`photos_id_photo`);

--
-- Index pour la table `horaires`
--
ALTER TABLE `horaires`
  ADD PRIMARY KEY (`id_horaire`),
  ADD KEY `horaires_FKIndex1` (`bars_id_bar`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id_pays`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id_photo`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `styles_bars`
--
ALTER TABLE `styles_bars`
  ADD PRIMARY KEY (`id_style_bar`);

--
-- Index pour la table `type_biere`
--
ALTER TABLE `type_biere`
  ADD PRIMARY KEY (`id_type_biere`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD KEY `utilisateurs_FKIndex1` (`roles_id_role`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id_ville`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `bars`
--
ALTER TABLE `bars`
  MODIFY `id_bar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `bieres`
--
ALTER TABLE `bieres`
  MODIFY `id_biere` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `horaires`
--
ALTER TABLE `horaires`
  MODIFY `id_horaire` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id_pays` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `id_photo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `styles_bars`
--
ALTER TABLE `styles_bars`
  MODIFY `id_style_bar` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `type_biere`
--
ALTER TABLE `type_biere`
  MODIFY `id_type_biere` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `id_ville` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

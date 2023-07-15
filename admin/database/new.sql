-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 21 jan. 2022 à 15:08
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `new`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_cours` int(10) NOT NULL,
  `matiere` varchar(50) NOT NULL,
  `ID_de_departement` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `matiere`, `ID_de_departement`) VALUES
(1, 'ARABE', 1),
(2, 'anglais', 1),
(3, 'math', 2),
(4, 'PC', 2);

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE `departements` (
  `id` int(50) NOT NULL,
  `nom_dep` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `departements`
--

INSERT INTO `departements` (`id`, `nom_dep`) VALUES
(1, 'département de cuture'),
(2, 'département de SCIENCE');

-- --------------------------------------------------------

--
-- Structure de la table `prof`
--

CREATE TABLE `prof` (
  `id_prof` int(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `cin` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `te` int(50) NOT NULL,
  `emai` varchar(50) NOT NULL,
  `date_recrutement` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `prof`
--

INSERT INTO `prof` (`id_prof`, `nom`, `prenom`, `cin`, `adresse`, `te`, `emai`, `date_recrutement`) VALUES
(1, 'DOULFIKAR', 'RACHAD', 'W438', 'LOTISSEMENT KAMAL ', 623473975, 'rachad@gmai.com', '2001-10-30'),
(2, 'DOULFIKAR', 'omar', '26000', 'LOTISSEMENT KAMAL ', 623473975, 'rachad@gmai.com', '2001-10-30');

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE `student` (
  `id` int(50) NOT NULL,
  `nom_stu` varchar(50) NOT NULL,
  `prenom_stu` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`id`, `nom_stu`, `prenom_stu`, `adresse`) VALUES
(1, 'DOULFIKAR', 'RACHAD', 'LOTISSEMENT KAMAL '),
(2, 'DOULFIKAR', 'RACHAD', 'LOTISSEMENT KAMAL II '),
(3, 'DOULFIKAR', 'RACHAD', 'LOTISSEMENT KAMAL II '),
(4, 'DOULFIKAR', 'RACHAD', 'LOTISSEMENT KAMAL II'),
(5, 'DOULFIKAR', 'RACHAD', 'LOTISSEMENT KAMAL II '),
(6, 'DOULFIKAR', 'RACHAD', 'LOTISSEMENT KAMAL II ');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`) VALUES
(1, 'rachad', 'rachad'),
(2, 'anwar', 'anwar'),
(3, 'ahmed', 'ahmed');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`);

--
-- Index pour la table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prof`
--
ALTER TABLE `prof`
  ADD PRIMARY KEY (`id_prof`);

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cours` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `departements`
--
ALTER TABLE `departements`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `prof`
--
ALTER TABLE `prof`
  MODIFY `id_prof` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

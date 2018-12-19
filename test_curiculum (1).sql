-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 19 déc. 2018 à 07:58
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test_curiculum`
--

-- --------------------------------------------------------

--
-- Structure de la table `activities`
--

DROP TABLE IF EXISTS `activities`;
CREATE TABLE IF NOT EXISTS `activities` (
  `id_act` int(11) NOT NULL AUTO_INCREMENT,
  `title_act` varchar(45) DEFAULT NULL,
  `desc_act` varchar(45) DEFAULT NULL,
  `users_id_users` int(11) NOT NULL,
  PRIMARY KEY (`id_act`,`users_id_users`),
  KEY `fk_activities_users_idx` (`users_id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `activities`
--

INSERT INTO `activities` (`id_act`, `title_act`, `desc_act`, `users_id_users`) VALUES
(2, 'Piano', 'Autodidacte', 10),
(4, 'Jeux vidéo', 'Passion', 10);

-- --------------------------------------------------------

--
-- Structure de la table `exp_pro`
--

DROP TABLE IF EXISTS `exp_pro`;
CREATE TABLE IF NOT EXISTS `exp_pro` (
  `id_exp` int(11) NOT NULL AUTO_INCREMENT,
  `start_date_exp` date DEFAULT NULL,
  `end_date_exp` date DEFAULT NULL,
  `firm_name_exp` varchar(45) DEFAULT NULL,
  `location_exp` varchar(45) DEFAULT NULL,
  `job_exp` varchar(45) DEFAULT NULL,
  `mission_exp` longtext,
  `type_contract_exp` varchar(45) DEFAULT NULL,
  `users_id_users` int(11) NOT NULL,
  PRIMARY KEY (`id_exp`,`users_id_users`),
  KEY `fk_exp_pro_users1_idx` (`users_id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `exp_pro`
--

INSERT INTO `exp_pro` (`id_exp`, `start_date_exp`, `end_date_exp`, `firm_name_exp`, `location_exp`, `job_exp`, `mission_exp`, `type_contract_exp`, `users_id_users`) VALUES
(4, '2019-08-09', '2022-06-15', 'Versusmind', 'Nancy', 'Developpeur Web', '-Php\r\n-MySQL\r\n-Javascript', 'CDI', 10),
(5, '2018-12-04', '2018-12-22', 'Epi de France', 'Luneville', 'Caissier', '- Caisse\n- Préparation des pains', '', 10);

-- --------------------------------------------------------

--
-- Structure de la table `realisations`
--

DROP TABLE IF EXISTS `realisations`;
CREATE TABLE IF NOT EXISTS `realisations` (
  `id_rea` int(11) NOT NULL AUTO_INCREMENT,
  `title_rea` varchar(45) DEFAULT NULL,
  `desc_rea` varchar(45) DEFAULT NULL,
  `start_date_rea` date DEFAULT NULL,
  `end_date_rea` date DEFAULT NULL,
  `users_id_users` int(11) NOT NULL,
  PRIMARY KEY (`id_rea`,`users_id_users`),
  KEY `fk_realisations_users1_idx` (`users_id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `id_skill` int(11) NOT NULL AUTO_INCREMENT,
  `title_skill` varchar(45) DEFAULT NULL,
  `desc_skill` varchar(45) DEFAULT NULL,
  `users_id_users` int(11) NOT NULL,
  PRIMARY KEY (`id_skill`,`users_id_users`),
  KEY `fk_skills_users1_idx` (`users_id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `skills`
--

INSERT INTO `skills` (`id_skill`, `title_skill`, `desc_skill`, `users_id_users`) VALUES
(4, 'Anglais', 'Courant', 10),
(5, 'Javascript', 'Agile', 10),
(6, 'HTML5', 'Maitrise', 10),
(7, 'CSS3', 'Maitrise', 10),
(9, 'Langue des signes', 'Débutant', 10);

-- --------------------------------------------------------

--
-- Structure de la table `trainings`
--

DROP TABLE IF EXISTS `trainings`;
CREATE TABLE IF NOT EXISTS `trainings` (
  `id_train` int(11) NOT NULL AUTO_INCREMENT,
  `start_date_train` date DEFAULT NULL,
  `end_date_train` date DEFAULT NULL,
  `school_train` varchar(45) DEFAULT NULL,
  `location_train` varchar(45) DEFAULT NULL,
  `title_train` varchar(45) DEFAULT NULL,
  `dipl_name_train` varchar(45) DEFAULT NULL,
  `dipl_validate_train` tinyint(1) DEFAULT NULL,
  `users_id_users` int(11) NOT NULL,
  PRIMARY KEY (`id_train`,`users_id_users`),
  KEY `fk_trainings_users1_idx` (`users_id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `trainings`
--

INSERT INTO `trainings` (`id_train`, `start_date_train`, `end_date_train`, `school_train`, `location_train`, `title_train`, `dipl_name_train`, `dipl_validate_train`, `users_id_users`) VALUES
(64, '2015-09-09', '2017-02-09', 'Faculté de lettre', 'Nancy', 'Science du Langage et Didactique des Langue', 'Master science du Langage', 0, 10),
(78, '2018-12-05', '2019-12-15', 'Alaji', 'Nancy', 'Developpeur web', 'Developpeur web & web mobile', 1, 10),
(88, '2018-12-13', '2018-12-20', 'qsd', 'qsd', 'dfqsdq', 'qsd', 1, 22);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(45) DEFAULT NULL,
  `lastname_user` varchar(45) DEFAULT NULL,
  `keypass_user` varchar(255) DEFAULT NULL,
  `address_user` varchar(45) DEFAULT NULL,
  `phone_user` varchar(10) DEFAULT NULL,
  `mail_user` varchar(45) DEFAULT NULL,
  `date_birth_user` date DEFAULT NULL,
  `obj_career_user` longtext,
  `cv_title_user` varchar(45) DEFAULT NULL,
  `handicap_user` varchar(45) DEFAULT NULL,
  `co_re_user` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `name_user`, `lastname_user`, `keypass_user`, `address_user`, `phone_user`, `mail_user`, `date_birth_user`, `obj_career_user`, `cv_title_user`, `handicap_user`, `co_re_user`) VALUES
(10, 'Othman', 'Bensaoula', '$2y$10$Inp2krt2BpRiGL2hL7l/auhHqpHaODAn5LTBPEH7Uxvyo4XDgkEQ2', '2 Rue du Général Jean Baptiste Kleber', '0624107496', 'test@test.fr', '1990-02-24', '  A la recherche de nouveaux challenges', 'Développeur Web', '', 1),
(22, 'qsd', 'qsd', '$2y$10$C3hYKpLhnfn.xG71..ze8e5e1a2rEyqG5Ai0aCtFqmiJF6nNf8kTa', 'qsd', 'qsd', 'nouveau@nouveau.fr', '2018-12-20', 'qsd', 'qsd', 'qsd', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `fk_activities_users` FOREIGN KEY (`users_id_users`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `exp_pro`
--
ALTER TABLE `exp_pro`
  ADD CONSTRAINT `fk_exp_pro_users1` FOREIGN KEY (`users_id_users`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `realisations`
--
ALTER TABLE `realisations`
  ADD CONSTRAINT `fk_realisations_users1` FOREIGN KEY (`users_id_users`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `fk_skills_users1` FOREIGN KEY (`users_id_users`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `fk_trainings_users1` FOREIGN KEY (`users_id_users`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

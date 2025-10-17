-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 17 oct. 2025 à 08:47
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `memory`
--

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

CREATE TABLE `score` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `difficulty` enum('easy','medium','hard') NOT NULL,
  `user_score` int(10) UNSIGNED DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `score`
--

INSERT INTO `score` (`id`, `user_id`, `game_id`, `difficulty`, `user_score`, `created_at`) VALUES
(1, 1, 1, 'hard', 1500, '2025-01-13'),
(2, 2, 1, 'hard', 1650, '2025-07-13'),
(3, 3, 1, 'easy', 680, '2025-10-13'),
(4, 4, 1, 'medium', 1150, '2025-10-13'),
(5, 5, 1, 'hard', 1550, '2024-10-13'),
(6, 1, 1, 'easy', 483, '2025-01-12'),
(7, 2, 1, 'medium', 2590, '2025-01-25'),
(8, 3, 1, 'hard', 4320, '2025-02-05'),
(9, 4, 1, 'medium', 1500, '2025-02-19'),
(10, 5, 1, 'easy', 900, '2025-03-03'),
(11, 1, 1, 'hard', 4890, '2025-03-20'),
(12, 2, 1, 'medium', 2210, '2025-04-08'),
(13, 3, 1, 'easy', 600, '2025-04-18'),
(14, 4, 1, 'hard', 3750, '2025-05-01'),
(15, 5, 1, 'medium', 2480, '2025-05-22'),
(16, 1, 1, 'easy', 1320, '2025-06-04'),
(17, 2, 1, 'hard', 4100, '2025-06-29'),
(18, 3, 1, 'medium', 2780, '2025-07-09'),
(19, 4, 1, 'easy', 770, '2025-07-21'),
(20, 5, 1, 'hard', 4910, '2025-08-02'),
(21, 1, 1, 'medium', 2600, '2025-08-16'),
(22, 2, 1, 'easy', 330, '2025-09-05'),
(23, 3, 1, 'hard', 4990, '2025-09-14'),
(24, 4, 1, 'medium', 1820, '2025-10-01'),
(25, 5, 1, 'easy', 1200, '2025-10-23'),
(28, 3, 1, 'easy', 890, '2025-12-01'),
(29, 4, 2, 'hard', 4520, '2025-12-15'),
(30, 5, 2, 'medium', 2300, '2025-12-28'),
(31, 1, 1, 'hard', 4230, '2025-01-14'),
(32, 2, 1, 'hard', 3725, '2025-01-25'),
(33, 3, 1, 'hard', 4510, '2025-02-05'),
(34, 4, 1, 'hard', 4985, '2025-02-19'),
(35, 5, 1, 'hard', 3820, '2025-02-26'),
(36, 1, 1, 'hard', 4720, '2025-03-02'),
(37, 2, 1, 'hard', 3310, '2025-03-10'),
(38, 3, 1, 'hard', 4675, '2025-03-21'),
(39, 4, 1, 'hard', 2880, '2025-04-03'),
(40, 5, 1, 'hard', 3625, '2025-04-15'),
(41, 1, 1, 'hard', 4890, '2025-04-29'),
(42, 2, 1, 'hard', 3510, '2025-05-07'),
(43, 3, 1, 'hard', 4020, '2025-05-17'),
(44, 4, 1, 'hard', 4990, '2025-05-23'),
(45, 5, 1, 'hard', 3785, '2025-06-01'),
(46, 1, 1, 'hard', 4120, '2025-06-12'),
(47, 2, 1, 'hard', 2815, '2025-06-18'),
(48, 3, 1, 'hard', 4560, '2025-07-04'),
(49, 4, 1, 'hard', 5000, '2025-07-10'),
(50, 5, 1, 'hard', 3920, '2025-07-25'),
(51, 1, 1, 'hard', 4630, '2025-08-02'),
(52, 2, 1, 'hard', 3245, '2025-08-13'),
(53, 3, 1, 'hard', 4140, '2025-08-21'),
(54, 4, 1, 'hard', 4875, '2025-09-01'),
(55, 5, 1, 'hard', 3530, '2025-09-12'),
(56, 1, 1, 'hard', 4955, '2025-09-25'),
(57, 2, 1, 'hard', 3760, '2025-10-05'),
(58, 3, 1, 'hard', 4285, '2025-10-15'),
(59, 4, 1, 'hard', 4910, '2025-10-27'),
(63, 3, 1, 'hard', 3670, '2025-12-02'),
(64, 4, 1, 'hard', 4995, '2025-12-10'),
(65, 5, 1, 'hard', 4180, '2025-12-17'),
(66, 1, 1, 'hard', 4460, '2025-12-23'),
(67, 2, 1, 'hard', 3280, '2025-12-28'),
(68, 3, 1, 'hard', 4805, '2025-12-30'),
(69, 4, 1, 'hard', 3925, '2025-12-31'),
(70, 5, 1, 'hard', 4555, '2025-12-31');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `score_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

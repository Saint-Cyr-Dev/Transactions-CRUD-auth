-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 13 nov. 2023 à 01:49
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bank`
--

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `label`, `amount`, `created_at`, `updated_at`) VALUES
(18, NULL, 'payment', 250, '2023-11-13 01:20:08', '2023-11-13 01:20:08'),
(19, NULL, 'payment', 250, '2023-11-13 01:23:31', '2023-11-13 01:23:31'),
(20, 963741582, 'payment', 600, '2023-11-13 01:24:51', '2023-11-13 01:24:51'),
(21, 963741582, 'deposit', 1000, '2023-11-13 01:25:12', '2023-11-13 01:25:12'),
(22, 2147483647, 'payment', 147, '2023-11-13 01:25:48', '2023-11-13 01:25:48'),
(23, 963748745, 'payment', 987456, '2023-11-13 01:27:27', '2023-11-13 01:27:27'),
(25, 963741582, 'payment', 500, '2023-11-13 01:30:33', '2023-11-13 01:30:33'),
(26, 963748745, 'deposit', 500, '2023-11-13 01:33:42', '2023-11-13 01:33:42'),
(27, 963748745, 'deposit', 500, '2023-11-13 01:33:47', '2023-11-13 01:33:47'),
(28, 98745631, 'payment', 1000, '2023-11-13 01:36:25', '2023-11-13 01:36:25');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Bally', 'bjunior7802@gmail.com', '$2y$10$USmW1c5T1gjOO1e3/pmN/esRpVR1lEGOHy/YgP02ivKGY6Sdz7132', '2023-11-10 15:14:37', '2023-11-10 15:14:37');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

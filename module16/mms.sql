-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2025 at 07:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mms`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(255) NOT NULL,
  `users_id` int(255) NOT NULL,
  `movie_id` int(255) NOT NULL,
  `nr_tickets` int(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `users_id`, `movie_id`, `nr_tickets`, `date`, `time`) VALUES
(0, 1, 3, 2, '2025-01-15', '18:30:00'),
(0, 2, 1, 4, '2025-01-16', '20:00:00'),
(0, 3, 5, 1, '2025-01-15', '21:00:00'),
(0, 4, 2, 3, '2025-01-17', '19:00:00'),
(0, 5, 4, 2, '2025-01-18', '16:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(255) NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  `movie_desc` varchar(255) NOT NULL,
  `movie_quality` varchar(255) NOT NULL,
  `movie_rating` int(255) NOT NULL,
  `movie_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `movie_name`, `movie_desc`, `movie_quality`, `movie_rating`, `movie_image`) VALUES
(0, 'Inception', 'A thief who steals corporate secrets through dream-sharing technology is given the inverse task of planting an idea.', 'HD', 9, 'inception.jpg'),
(0, 'The Matrix', 'A computer hacker learns about the true nature of reality and his role in the war against its controllers.', 'HD', 9, 'matrix.jpg'),
(0, 'The Godfather', 'The aging patriarch of an organized crime dynasty transfers control to his reluctant son.', 'SD', 9, 'godfather.jpg'),
(0, 'Avengers: Endgame', 'The Avengers assemble to undo the damage caused by Thanos and restore the universe.', '4K', 8, 'endgame.jpg'),
(0, 'The Dark Knight', 'Batman battles the Joker, a criminal mastermind who seeks to create chaos in Gotham City.', 'HD', 9, 'dark_knight.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `confirm_password` text NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `confirm_password`, `id_admin`) VALUES
(0, 'John Doe', 'johndoe', 'johndoe@example.com', 'password123', 'password123', 0),
(0, 'Jane Smith', 'janesmith', 'janesmith@example.com', 'password456', 'password456', 0),
(0, 'Admin User', 'admin', 'admin@example.com', 'adminpass', 'adminpass', 1),
(0, 'Alice Brown', 'alicebrown', 'alice.brown@example.com', 'alicepwd', 'alicepwd', 0),
(0, 'Bob White', 'bobwhite', 'bob.white@example.com', 'bobpass', 'bobpass', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

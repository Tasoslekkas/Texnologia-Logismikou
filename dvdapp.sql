-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 22 Σεπ 2022 στις 20:32:09
-- Έκδοση διακομιστή: 10.4.19-MariaDB
-- Έκδοση PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `dvdapp`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `dec_dvd`
--

CREATE TABLE `dec_dvd` (
  `u_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `dec_date` date NOT NULL,
  `dec_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `dec_orders`
--

CREATE TABLE `dec_orders` (
  `or_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `dec_orders`
--

INSERT INTO `dec_orders` (`or_id`, `u_id`, `d_id`) VALUES
(7586, 3, 1),
(7586, 3, 2),
(8163, 3, 2),
(8163, 3, 1),
(8163, 3, 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `dvd`
--

CREATE TABLE `dvd` (
  `d_id` int(11) NOT NULL,
  `d_title` varchar(255) NOT NULL,
  `d_actors` varchar(255) NOT NULL,
  `d_director` varchar(255) NOT NULL,
  `d_lang` varchar(255) NOT NULL,
  `d_subs` varchar(255) NOT NULL,
  `d_duration` int(11) NOT NULL,
  `d_genre` enum('comedy','drama','action','erotic','thriller') NOT NULL,
  `d_price` int(11) NOT NULL,
  `d_date` date NOT NULL,
  `d_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `dvd`
--

INSERT INTO `dvd` (`d_id`, `d_title`, `d_actors`, `d_director`, `d_lang`, `d_subs`, `d_duration`, `d_genre`, `d_price`, `d_date`, `d_stock`) VALUES
(1, 'Batman', 'aaaaa,ggggg,hhhhhhh', 'rrrr', 'aaaaaa,eeeeeee', 'aaaaa,eeeeee', 170, 'action', 5, '2022-09-16', 34),
(2, 'the big mike', 'aaaaaaa,rrrrrrrrrr,ttttttttt', 'wwww', 'hhhhhhh,jjjjj', 'ddd,', 120, 'erotic', 7, '2022-09-06', 67);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `orders`
--

CREATE TABLE `orders` (
  `or_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `or_price` int(11) NOT NULL,
  `or_address` varchar(255) NOT NULL,
  `or_num` int(11) NOT NULL,
  `or_tk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `orders`
--

INSERT INTO `orders` (`or_id`, `u_id`, `or_price`, `or_address`, `or_num`, `or_tk`) VALUES
(7586, 3, 12, 'gggg', 333, 4255),
(8163, 3, 19, 'ssss', 3333333, 2147483647);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_approved` int(11) NOT NULL,
  `u_role` enum('client','employer','admin') NOT NULL,
  `u_username` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_surname` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`u_id`, `u_approved`, `u_role`, `u_username`, `u_password`, `u_name`, `u_surname`, `u_email`) VALUES
(2, 1, 'admin', 'alex1', '5c1c335c524b17ee7cf62aa800ce03d3', 'alex', 'neli', 'hasvhvdad'),
(3, 1, 'client', 'tasos1', '00c16428f2d0d4d3843eae373b348cee', 'tasos', 'lekkas', 'aaaaa'),
(4, 1, 'employer', 'kyriakos1', 'eeddcaba8b25abc12aa3ae6f33a538f2', 'kyriakos', 'tzanakis', 'gggggg');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `dec_dvd`
--
ALTER TABLE `dec_dvd`
  ADD PRIMARY KEY (`dec_id`);

--
-- Ευρετήρια για πίνακα `dvd`
--
ALTER TABLE `dvd`
  ADD PRIMARY KEY (`d_id`);

--
-- Ευρετήρια για πίνακα `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`or_id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `dec_dvd`
--
ALTER TABLE `dec_dvd`
  MODIFY `dec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT για πίνακα `dvd`
--
ALTER TABLE `dvd`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

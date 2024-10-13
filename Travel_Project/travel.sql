-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2024 at 05:48 PM
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
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `num_passenger` int(11) NOT NULL,
  `u_status` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `special_req` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `user_id`, `trip_id`, `booking_date`, `num_passenger`, `u_status`, `payment_status`, `special_req`) VALUES
(26, 9, 31, '2024-06-22 15:44:35', 2, 0, 0, 'I would like to arrange my trip with amenities suitable for children, including family-friendly accommodations, safe transportation, and kid-friendly tours.'),
(27, 8, 32, '2024-06-22 15:46:30', 4, 0, 0, 'As someone attending an important conference, I require accommodations and amenities conducive to business needs, including reliable internet access, a quiet environment for work, and convenient transportation options.');

-- --------------------------------------------------------

--
-- Table structure for table `continent`
--

CREATE TABLE `continent` (
  `cont_id` int(11) NOT NULL,
  `cont_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `continent`
--

INSERT INTO `continent` (`cont_id`, `cont_name`) VALUES
(1, 'Asia'),
(2, 'America'),
(3, 'Europe'),
(4, 'Africa');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `place_id` int(11) NOT NULL,
  `cont_id` int(11) NOT NULL,
  `place_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`place_id`, `cont_id`, `place_name`) VALUES
(1, 1, 'Jordan'),
(2, 1, 'Japan'),
(3, 1, 'China'),
(4, 1, 'Turkey'),
(5, 1, 'Dubai'),
(6, 2, 'New York'),
(7, 2, 'Chicago'),
(8, 2, 'San Francisco'),
(9, 2, 'Los Angeles'),
(10, 3, 'Paris - France'),
(11, 3, 'Italy'),
(12, 3, 'Germany'),
(13, 3, 'Vienna - Austria'),
(14, 4, 'Egypt'),
(15, 4, 'Tunisia'),
(16, 4, 'Morocco'),
(17, 4, 'Kenya'),
(18, 3, 'London'),
(19, 3, 'Switzerland'),
(20, 4, 'Kenya Safari');

-- --------------------------------------------------------

--
-- Table structure for table `travel_review`
--

CREATE TABLE `travel_review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comments` varchar(3000) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel_review`
--

INSERT INTO `travel_review` (`review_id`, `user_id`, `comments`, `rating`) VALUES
(18, 4, 'The experience was amazing with comfort and joy. Every moment  was a treasure,I couldn\'t be more grateful. Thank you for making it so memorable!', 5),
(20, 8, 'reflecting on how comforting the experience was, filled with joy, leaving me with happy memories to hold dear. I am deeply thankful to you!', 4),
(21, 9, 'I enjoyed the experience , that was so comfortable i\'m so happy with  it , can\'t wait to try it again ,Thank you so much!', 5);

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `trip_id` int(11) NOT NULL,
  `trip_img` varchar(255) NOT NULL,
  `destination` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `departure_date` datetime NOT NULL,
  `return_date` datetime NOT NULL,
  `price` float NOT NULL,
  `available_seats` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`trip_id`, `trip_img`, `destination`, `place_id`, `departure_date`, `return_date`, `price`, `available_seats`, `created_at`, `updated_at`) VALUES
(31, '1719023446_2af9f0cb4ee980b6c917.jpg', 1, 2, '2024-06-25 06:33:00', '2024-06-29 05:31:00', 679.45, 38, '2024-06-22 15:44:35', '2024-06-22 15:44:35'),
(32, '1719023521_5b8a3b5932b04cf2e37d.jpg', 3, 10, '2024-06-27 01:00:00', '2024-06-30 03:30:00', 400, 31, '2024-06-22 15:46:30', '2024-06-22 15:46:30'),
(33, '1719023604_ed2c02b9bce15f53c916.jpg', 4, 17, '2024-07-01 00:15:00', '2024-07-06 06:30:00', 250, 45, '2024-06-22 02:33:24', '2024-06-22 02:33:24'),
(34, '1719023691_bfbd3f345d66c45d1175.jpg', 2, 6, '2024-07-09 08:33:00', '2024-07-13 09:25:00', 589, 37, '2024-06-22 02:34:51', '2024-06-22 02:34:51'),
(35, '1719023747_ef31e3a006735c2f6587.jpg', 1, 1, '2024-06-23 17:35:00', '2024-06-27 15:45:00', 50, 50, '2024-06-22 02:35:47', '2024-06-22 02:35:47'),
(36, '1719023830_720e7daeb98fa9d6a160.jpg', 3, 18, '2024-06-26 21:17:00', '2024-06-30 11:00:00', 456, 26, '2024-06-22 02:37:10', '2024-06-22 02:37:10'),
(37, '1719024115_639fe32c1c69bc09c8ee.jpg', 1, 4, '2024-07-10 17:40:00', '2024-07-16 00:00:00', 280, 30, '2024-06-22 02:41:55', '2024-06-22 02:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(4, 'Haithem', 'Qudisat', 'haithem@gmail.com', '$2y$10$wABt/MKw1zzNpJ0kGGtDN.8HVSYGhALsEV8UoqXGkor/m5jRcI0..', 0, '2024-06-04 21:22:04', '2024-06-04 21:22:04'),
(5, 'Bayan ', 'Qudisat', 'bayan@gmail.com', '$2y$10$D0GGf8vmYwW16hqeJALSleC1JPatbDmtMY58t3zeFVM1ZOcQUYy5a', 1, '2024-06-07 16:34:19', '2024-06-07 16:34:19'),
(6, 'test', 'test', 'test@gmail.com', '$2y$10$9BS1IokOEFYVLlE8Ea9A2O.RXYOUEmKzxCydvGJPc6TNsdkQJ2M9q', 0, '2024-06-07 16:44:09', '2024-06-07 16:44:09'),
(7, 'Abd', 'Qudisat', 'abd@gmail.com', '$2y$10$IC6nIN4YHQCmNndAwQZoEOl9xhzSOhLvUVsqupW0S.HZXiNQTLe7S', 0, '2024-06-20 20:06:29', '2024-06-20 20:06:29'),
(8, 'Rudaina', 'Alomari', 'rudaina@gmail.com', '$2y$10$d6aqioblt0L.sRZyyDBw6O4mk6FxhzBe.Fu5RutKhiNUk/FPplJwa', 0, '2024-06-22 14:04:37', '2024-06-22 14:04:37'),
(9, 'Bayan ', 'Qudisat', 'bayanhitham12@gmail.com', '$2y$10$B9g1vUfQzEOb5csksHdW..avQE6x/kp4Mn83.lV4P/XPhK4Zz7nW2', 0, '2024-06-22 14:07:17', '2024-06-22 14:07:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `user` (`user_id`),
  ADD KEY `trip` (`trip_id`);

--
-- Indexes for table `continent`
--
ALTER TABLE `continent`
  ADD PRIMARY KEY (`cont_id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`place_id`),
  ADD KEY `place` (`cont_id`);

--
-- Indexes for table `travel_review`
--
ALTER TABLE `travel_review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_review` (`user_id`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`trip_id`),
  ADD KEY `destination` (`destination`),
  ADD KEY `places` (`place_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `continent`
--
ALTER TABLE `continent`
  MODIFY `cont_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `travel_review`
--
ALTER TABLE `travel_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `trip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `trip` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`trip_id`);

--
-- Constraints for table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place` FOREIGN KEY (`cont_id`) REFERENCES `continent` (`cont_id`);

--
-- Constraints for table `travel_review`
--
ALTER TABLE `travel_review`
  ADD CONSTRAINT `user_review` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `places` FOREIGN KEY (`place_id`) REFERENCES `place` (`place_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2023 at 07:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flowershop`
--
CREATE DATABASE IF NOT EXISTS `flowershop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `flowershop`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Trandafiri', 'Trandafiri', '2023-05-25 16:13:43', '2023-05-25 16:59:31'),
(2, 'Lalele', 'Lalele', '2023-05-25 16:13:43', '2023-05-25 16:59:20'),
(3, 'Crini', 'Crini', '2023-05-25 16:13:43', '2023-05-25 16:59:36'),
(4, 'Orhidee', 'Orhidee', '2023-05-25 16:13:43', '2023-05-25 16:59:41'),
(5, 'Zambile', 'Zambile', '2023-05-25 16:13:43', '2023-05-25 16:59:47'),
(6, 'Margarete', 'Margarete', '2023-05-25 16:13:43', '2023-05-25 16:59:53'),
(7, 'Garoafe', 'Garoafe', '2023-05-25 16:13:43', '2023-05-25 16:59:58'),
(8, 'Bujori', 'Bujori', '2023-05-25 16:13:43', '2023-05-25 17:00:02'),
(9, 'Ghelozii', 'Ghelozii', '2023-05-25 16:13:43', '2023-05-25 17:00:07'),
(10, 'Flori mixte', 'Flori mixte', '2023-05-25 16:13:43', '2023-05-25 17:00:12'),
(11, 'Iriși', 'Iriși', '2023-07-03 12:01:16', '2023-07-03 12:01:16'),
(12, 'Crizanteme', 'Crizanteme', '2023-07-03 12:03:15', '2023-07-03 12:03:15'),
(13, 'Frezii', 'Frezii', '2023-07-03 12:04:17', '2023-07-03 12:04:17'),
(14, 'Alstroemeria', 'Alstroemeria', '2023-07-03 12:05:47', '2023-07-03 12:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `address`, `phone`, `email`, `username`, `password`) VALUES
(1, 'Ion', 'Pop', 'str. Fantanele, nr.2, Bistrita, jud. Bistrita - Nasaud', '0743445566', 'pop.ion@gmail.com', 'pop.ion', '$2y$10$n7osWuZ9qN5w1WS2J.a54uADFCX9U41bNBoQSzK5VuN2DaGu78JY.'),
(2, 'Vasile', 'Serețan ', 'Bistrița, aleea ghiocelului, nr. 2, bloc 2, scara D, etaj 2, ap 12', '0755643234', 'seretanvasile@gmail.com', 'seretan.vasile', '$2y$10$uBpki5wP4704xUfIxT9gNuaOf4ZZVgH.vWJMdWiwyc/JiJ60bN2ZO');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color`) VALUES
(1, 'Rosu'),
(2, 'Galben'),
(3, 'Portocaliu'),
(4, 'Albastru'),
(5, 'Alb'),
(6, 'Colorate'),
(7, 'Roz'),
(8, 'Mov');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` decimal(10,2) NOT NULL,
  `status` enum('placed','processing','shipped','delivered') NOT NULL DEFAULT 'placed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `total`, `status`) VALUES
(1, 1, '2023-06-29 17:42:19', 150.00, 'processing'),
(2, 1, '2023-07-03 15:01:54', 150.00, 'placed'),
(4, 1, '2023-07-03 15:25:18', 150.00, 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 2, 9, 29.99),
(2, 2, 2, 5, 29.99),
(4, 4, 1, 5, 29.99);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` int(50) NOT NULL,
  `stock` int(6) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `color` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `category`, `stock`, `new`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Buchet trandafiri roșii', 'Buchet elegant de trandafiri roșii proaspeti 55', 'http://localhost/images/buchet-din-trandafiri-rosii-.jpg', 320.00, 1, 10, 1, 1, '2023-05-13 13:31:42', '2023-07-03 16:03:53'),
(2, 'Buchet iriși', 'Buchet delicat de iriși mov, albi și galbeni', 'http://localhost/images/amz-buchet-irisi.webp', 99.99, 10, 5, 0, 2, '2023-05-13 13:31:42', '2023-07-03 16:10:35'),
(3, 'Buchet lalele colorate', 'Buchet primăvăratic de lalele colorate', 'http://localhost/images/Buchet_Lalele_colorate_Primavara_.jpg', 79.99, 2, 3, 0, 3, '2023-05-13 13:31:42', '2023-07-03 19:41:18'),
(4, 'Buchet trandafiri albi', 'Buchet elegant de trandafiri albi proaspeți', 'http://localhost/images/Buchet-cu-trandafiri-albi.webp', 139.99, 1, 8, 0, 2, '2023-05-13 13:32:29', '2023-07-03 19:41:50'),
(5, 'Buchet crizanteme', 'Buchet vesel de crizanteme ', 'http://localhost/images/crizanteme-albe.jpg', 128.00, 10, 12, 1, 2, '2023-05-13 13:32:29', '2023-07-03 19:37:22'),
(6, 'Buchet orhidee', 'Buchet impresionant de orhidee roz', 'http://localhost/images/BUCHET-ORHIDEE.webp', 189.99, 4, 6, 0, 1, '2023-05-13 13:32:29', '2023-07-03 19:44:20'),
(7, 'Buchet margarete', 'Buchet rustic de margarete albe și galbene', 'http://localhost/images/margarete.-500x500.jpg', 69.99, 6, 9, 1, 2, '2023-05-13 13:32:29', '2023-07-03 19:46:48'),
(8, 'Buchet frezii', 'Buchet romantic de frezii roz', 'http://localhost/images/3_f58a85f6-4d5f-4921-80d4-b90df264e2e6.jpg', 99.99, 10, 4, 0, 2, '2023-05-13 13:32:29', '2023-07-03 19:42:46'),
(9, 'Buchet garoafe', 'Buchet tradițional de garoafe roșii', 'http://localhost/images/buchet-de-garoafe-cu-gypsophila.jpg', 49.99, 7, 15, 1, 1, '2023-05-13 13:32:29', '2023-07-03 19:45:13'),
(10, 'Buchet bujori', 'Buchet luxuriant de bujori roz și albi', 'http://localhost/images/amz-buchet-31bujori-roz.jpg', 249.99, 8, 2, 0, 1, '2023-05-13 13:32:29', '2023-07-03 19:43:07'),
(11, 'Buchet alstroemeria', 'Buchet sofisticat de alstroemeria galbenă și roz', 'http://localhost/images/buchet-cu-alstroemeria.jpg', 129.99, 14, 7, 0, 2, '2023-05-13 13:32:29', '2023-07-04 12:07:34'),
(12, 'Buchet  lalele galbene', 'Buchet lalele galbene', 'http://localhost/images/lalelegalbene.jpeg', 79.99, 2, 3, 0, 2, '2023-05-13 13:32:29', '2023-07-03 19:44:01'),
(13, 'Buchet mixt', 'Buchet impresionant de flori mixte', 'http://localhost/images/bucet-de-flori-friendship-1-500x375.jpg', 199.99, 10, 5, 1, 3, '2023-05-13 13:32:29', '2023-07-03 19:43:44'),
(14, 'Trandafiri roșii', 'Buchet frumos de trandafiri roșii', 'http://localhost/images/buchet-trandafiri-rosii.jpg', 250.00, 1, 20, 1, 1, '2023-06-29 17:05:16', '2023-07-03 19:35:01'),
(15, 'Buchet Zambile', 'Buchet Zambile superbe', 'http://localhost/images/1677159778buchet_zambile_primavara_parfumata_premium.jpg', 200.00, 10, 10, 1, 4, '2023-07-03 19:47:50', '2023-07-03 19:55:45'),
(16, 'Mix trandafiri, narcise și zambile', 'Mix trandafiri, narcise și zambile', 'http://localhost/images/BUCHET-CU-NARCISE-TRANDAFIRI-SI-ZAMBILE.jpg', 400.00, 10, 10, 1, 3, '2023-07-02 19:52:49', '2023-07-02 19:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Site', 'admin@example.com', 'admin', '$2y$10$5FyXbXJKCYJHEDhU0L4LLOVi.K30GpeZk8VJJxMTX9BlW/IBd2qq6', '2023-05-13 13:29:07', '2023-05-13 13:29:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_ibfk_1` (`color`),
  ADD KEY `category_ibfk_1` (`category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `color_ibfk_1` FOREIGN KEY (`color`) REFERENCES `color` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2025 at 05:52 PM
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
-- Database: `zoolove`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Hrană uscată pisici', 'Hrană uscată pentru pisici', '2025-06-29 12:32:45', '2025-06-29 13:09:27'),
(2, 'Hrană uscată câini', 'Hrană uscată pentru câini', '2025-06-29 12:32:45', '2025-06-29 13:09:42'),
(3, 'Hrană umedă pisici', 'Hrană umedă pentru pisici', '2025-06-29 12:33:57', '2025-06-29 13:09:53'),
(4, 'Hrană umedă câini', 'Hrană umedă pentru câini', '2025-06-29 12:33:57', '2025-06-29 13:10:06'),
(5, 'Snackuri pisici', 'Snackuri pentru pisici', '2025-06-29 12:37:51', '2025-06-29 12:37:51'),
(6, 'Snackuri câini', 'Snackuri pentru câini', '2025-06-29 12:37:51', '2025-06-29 12:37:51'),
(7, 'Nisip pisici', 'Nisip pentru pisici', '2025-06-29 12:39:34', '2025-06-29 12:39:34'),
(8, 'Jucării pisici', 'Jucării pentru pisici', '2025-06-29 12:39:34', '2025-06-29 12:39:34'),
(9, 'Jucării câini', 'Jucării pentru câini', '2025-06-29 12:39:58', '2025-06-29 12:39:58');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `address`, `phone`, `email`, `username`, `password`) VALUES
(1, 'Ruxandra', 'Manea-Sion', 'str. Aleea Plaieșului, nr. 8. sc. A, ap. 11, Bistrița', '0744505579', 'ruxandrasion@gmail.com', 'ruxandrasion', '$2y$10$P/dBsmxFEM7.qRFJDmZImOl9keSeQ/VOAO19q5W/eIW57yiL5EKQa');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` decimal(10,2) NOT NULL,
  `status` enum('placed','processing','shipped','delivered') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `stock` tinyint(6) NOT NULL,
  `new` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `category`, `stock`, `new`, `created_at`, `updated_at`) VALUES
(1, 'PURINA PRO PLAN Sterilised Adult Renal Plus Somon', 'PURINA PRO PLAN Sterilised Adult Renal Plus Somon conține mai puține grăsimi și, în același timp, multe proteine, ceea ce poate reduce aportul caloric și favoriza menținerea masei musculare. Conținutul de minerale este adaptat la nevoile speciale ale pisicilor sterilizate și castrate pentru a susține funcția naturală a tractului urinar. Ingredientul principal din PURINA PRO PLAN Sterilised Adult Renal Plus este somonul delicios, care contribuie, de asemenea, cu acizi grași omega valoroși pentru piele și blană.', 'http://localhost/images/hrana_uscata_pisici1.jpg', 146.90, 1, 10, 1, '2025-06-29 12:45:20', '2025-06-29 12:47:48'),
(2, 'Purina ONE Sterilcat cu pui', 'Purina ONE Sterilcat cu pui este o hrană uscată gustoasă, care a fost adaptată special la nevoile pisicilor sterilizate și castrate. Datorită compoziției sale echilibrate, aceasta sprijină controlul greutății și menținerea greutății ideale a pisicii.\r\n\r\nPurina ONE Sterilcat include pui drept prim ingredient care servește drept sursă de proteine de înaltă calitate și contribuie, de asemenea, la un gust delicios al hranei. Rețeta conține toți nutrienții și substanțele vitale, care sunt necesare pentru dieta zilnică a pisicii tale. Bine de știut: hrana completă de la Purina ONE este disponibilă într-un amabalaj reciclabil cu sigiliu de prospețime.', 'http://localhost/images/hrana_uscata_pisici2.WEBP', 135.90, 1, 5, 1, '2025-06-29 12:50:59', '2025-06-29 12:51:22'),
(3, 'Purizon Sterilised Adult Miel cu pui - fără cereal', 'Purizon este o hrană uscată de înaltă calitate pentru pisici, care se bazează pe nevoile pisicii carnivore. Datorită proporției ridicate de ingrediente de origine animală de 70 %, Purizon este deosebit de bogată în proteine. Dinții, maxilarul și tractul digestiv scurt al pisicilor sunt orientate în mod optim pentru a procesa proteinele din carne și pește. Pe lângă vitamine și minerale, proteinele conțin și aminoacizi esențiali pentru pisici. Toate rețetele Purizon nu conțin cereale. În schimb, Purizon conține 30 % fructe și legume valoroase ca sursă naturală de vitamine și fibre. Printre acestea se numără fructe gustoase, cum ar fi mere, afine sau rodie și legume delicioase, cum ar fi dovleac, spanac sau morcovi. Această interacțiune specială asigură o acceptabilitate excelentă și o tolerabilitate optimă. \r\n\r\nPurizon Sterilised Miel cu pui este o hrană completă de înaltă calitate pentru pisici adulte de toate rasele.', 'http://localhost/images/hrana_uscata_pisici3.JPG', 274.90, 1, 3, 1, '2025-06-29 13:02:38', '2025-06-29 13:03:19'),
(4, 'Carnilove Adult Cats Sterilised Miel și mistreț', 'Sistemul digestiv al pisicii este conceput, în mod natural, pentru o hrană cu conținut ridicat de proteine animale. De aceea, Carnilove Adult Cats Sterilised Miel & mistreț include 35% mistreț și 24% miel. Ambele tipuri de carne oferă componente proteine dietetice, ușor digerabile, care sprijină menținerea unei condiții fizice optime la pisicile sterilizate. Datorită conținutului moderat de minerale, hrana ajută funcția renală și sănătatea tractului urinar. Nu conține cereale și cartofi, astfel că hrana premium este deosebit de bine tolerată și se poate folosi și în caz de alergii și intoleranțe.  ', 'http://localhost/images/hrana_uscata_pisici5.WEBP', 201.00, 1, 15, 1, '2025-06-29 13:06:16', '2025-06-29 13:06:16'),
(5, 'Royal Canin Maxi Puppy', 'Royal Canin Maxi Puppy a fost special dezvoltată pentru a satisface nevoile nutriționale ale cățeilor de rase mari. Această rețetă este potrivită pentru cățeii de rase mari cu vârsta de la 2 la 15 luni, care tind spre o greutate la maturitate de 26-44 kg. Această hrană include nutrienți precum vitaminele C și E, care sprijină sistemul imunitar natural, în perioada în care acesta este încă în dezvoltare. Acizii grași Omega-3 (ex. DHA) favorizează dezvoltarea optimă a creierului cățeilor. ', 'http://localhost/images/hrana_uscata_caini1.jpg', 362.90, 2, 5, 1, '2025-06-29 13:08:45', '2025-06-29 13:08:45'),
(6, 'Carnilove Adult Miel și mistreț', 'Câinii iubesc carnea! La fel ca strămoșii lor sălbatici, lupii, sistemul digestiv al câinelui este conceput pentru o dietă cu un conținut ridicat de proteine animale, în combinație cu fructe de pădure, legume și ierburi. Carnilove Adult Miel & mistreț conține 30% mistreț și 25% miel crescut în aer liber. Rețeta echilibrată cu mere, mazăre, morcovi și multe vitamine și extracte din plante furnizează câinilor toți nutrienții de care au nevoie pentru o viață activă. Fără cereale, cartofi, porumb, soia și  orez, hrana premium este deosebit de bine tolerată și poate fi folosită și în caz de intoleranțe sau alergii. ', 'http://localhost/images/hrana_uscata_caini2.JPG', 256.90, 2, 5, 1, '2025-06-29 13:12:36', '2025-06-29 13:12:36'),
(7, 'Carnilove Adult 100 g pentru pisici', 'Hrana umedă Carnilove Adult premium este o masă delicioasă pentru pisici, cu un gust irezistibil și o rețetă specifică. Conține carne albă de pui sau curcan, însoțită de alte ingrediente de origine animală, precum rață, ren, miel, fazan sau somon, în funcție de rețetă. Această hrană umedă gustoasă conține, de asemenea, organe comestibile precum inima sau ficatul, bogate în minerale esențiale.', 'http://localhost/images/hrana_umeda_pisici1.jpg', 10.90, 3, 25, 1, '2025-06-29 13:15:28', '2025-06-29 13:15:28'),
(8, 'Pachet economic Purizon Organic 12 x 85 g', 'Purizon Organic hrană umedă pentru pisici convinge prin următoarele avantaje:\r\n \r\nConținut ridicat de proteine: 75 % ingrediente de origine animală\r\nCarne și pește de calitate bio cu măruntaie bio valoroase\r\nNaturală: Fructe și legume cultivate ecologic\r\nRețetă fără cereale: adecvată inclusiv pentru pisicile mai sensibile\r\nCertificată bio: pentru o rețetă deosebit de naturală', 'http://localhost/images/hrana_umeda_pisici2.JPG', 74.90, 3, 50, 1, '2025-06-29 13:17:56', '2025-06-29 13:17:56'),
(9, 'Trixie PREMIO Ducky Hearts', 'Pisicile noastre mănâncă cu plăcere la fel de mult ca și noi, oamenii! Trixie PREMIO Ducky Hearts sunt gustări delicioase în formă de inimă, cu care îi poți oferi felinei tale un moment de răsfăț deosebit de iubitor!\r\n\r\nGustările pentru pisici nu conțin gluten, ceea ce susține o digestibilitate bună. Acestea conțin mult piept de rață și somon de apă dulce delicios, ceea ce asigură o consistență deosebit de suculentă și cărnoasă.  Trixie PREMIO Ducky Hearts nu conțin adaos de zahăr și rămân proaspete mult timp în punga resigilabilă.', 'http://localhost/images/recompense_pisici1.JPG', 5.90, 5, 23, 1, '2025-06-29 13:20:20', '2025-06-29 13:20:20'),
(10, 'Pedigree Biscrok în 3 arome delicioase', 'Pedigree Biscrok sunt biscuiți crocanți în formă de os, potriviți ca recompense de dresaj sau ca gustări de răsfăț între mesele principale. Există trei sortimente delicioase și vă puteți recompensa câinele cu cea care îi place mai mult - fie pui delicat, vită aromată sau miel apetisant. Datorită ingredientelor valoroase, snackurile nu sunt doar delicioase, ci și sprijină sănătatea și vitalitatea câinelui. Include acizi grași Omega-3 care întăresc sănătatea pielii și oferă o blană mătăsoasă și frumoasă. Alte vitamine și minerale importante sprijină sistemul imunitar și deci influențează pozitiv bunăstarea generală. Hrana nu include arome sau coloranți artificiali. Cu acest snack vă puteți răsfăța zilnic companionul fără probleme.\r\n', 'http://localhost/images/recompense_caini1.JPG', 15.90, 6, 10, 1, '2025-06-29 13:23:03', '2025-06-29 13:23:03'),
(11, 'Rocco Rolls Rulouri de ros', 'Rsăfățați-vă patrupedul cu un snack deosebit! Rulourile Rocco sunt combinația perfectă de fraged și corcant; acestea stimulează mușchii masticatori și întăresc gingia și dinții – pentru o ronțăială gustoasă.\r\n\r\nRulourile din piele de vită uscată sunt învelite în file din piept de pui sau rață sau în pește. Datorită mărimii de cca. 12 cm și diametrului de 0,7 cm, aceste snackuri sunt potrivite și pentru câinii  mici și mijlocii.\r\n\r\nPreparate la cuptor și fără aditivi artificiali, snackurile Rocco Rolls sunt ideale și pentru câinii cu sensibilități alimentare sau alergii, oferite drept recompensă sau gustare între mese. Surprindeți-vă câinle cu aceste rulouri de ros delicioase de la Rocco!', 'http://localhost/images/recompense_caini2.JPG', 14.90, 6, 12, 1, '2025-06-29 13:24:30', '2025-06-29 13:24:30');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Site', 'admin@example.com', 'admin', 'parolazoolove', '2025-06-23 18:44:41', '2025-06-29 12:28:27');

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

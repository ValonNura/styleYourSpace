-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2025 at 10:27 PM
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
-- Database: `projekti`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(3, 'klea', 'kleaa@hotmail.com', 'Obsessed with the furniture! Keep up the good work!!', '2025-01-28 15:00:05'),
(29, 'Denis', 'denis@gmail.com', 'Great work!!!', '2025-01-29 21:22:35'),
(33, 'lili', 'lili@gmail.com', 'Love everything about this website! Great work!', '2025-01-30 01:15:38'),
(35, 'annie', 'annie@gmail.com', 'Absolutely love this website!!', '2025-01-30 14:58:14'),
(37, 'gresa', 'gresaberisha@gmail.com', 'A big thank you for everything you do and the help you offer!', '2025-01-30 20:41:21'),
(38, 'lea', 'lea@gmail.com', 'Great quality of products!!', '2025-01-31 01:02:44'),
(39, 'Vanesa', 'Vanesa@gmail.com', 'Hi\r\n', '2025-01-31 13:28:39'),
(41, 'kayla', 'kayla@gmail.com', 'hi', '2025-01-31 16:45:36'),
(42, 'Anna', 'anna@gmail.com', 'Hi\r\n', '2025-01-31 22:02:37'),
(43, 'Bob', 'Bob@gmail.com', 'Hellooo!!!\r\n', '2025-01-31 22:06:18'),
(45, 'lena', 'lena@gmail.com', 'hey', '2025-02-01 02:38:31'),
(46, 'pajtim', 'pajtim@gmail.com', 'hi', '2025-02-01 02:58:07'),
(49, 'Kaonaa', 'kaona@gmail.com', 'Hi', '2025-02-01 14:27:46'),
(50, 'binaa', 'binaa@gmail.com', 'Hi', '2025-02-01 14:33:55'),
(51, 'tana', 'tana@gmail.com', 'Hey', '2025-02-01 22:07:39'),
(52, 'nita', 'nita25@gmail.com', 'U guys are awesome!!!', '2025-02-02 00:56:37'),
(53, 'nikki', 'nikki@gmail.com', 'hi', '2025-02-02 01:41:54'),
(54, 'yapa', 'yapa@gmail.com', 'HI', '2025-02-02 05:27:45'),
(55, 'kanina', 'kanina@gmail.com', 'hi', '2025-02-02 11:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` enum('unread','read') DEFAULT 'unread',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `message`, `status`, `created_at`) VALUES
(1, 1, 'New subscriber: Katarina@gmail.com', 'unread', '2025-01-31 22:01:25'),
(2, 1, 'New contact message from Bob (Bob@gmail.com)', 'unread', '2025-01-31 22:06:18'),
(3, 1, 'New subscriber: luana@gmail.com', 'unread', '2025-02-01 01:03:22'),
(4, 1, 'New subscriber: flutura1@gmail.com', 'unread', '2025-02-01 01:08:16'),
(5, 1, 'New subscriber: aurela9@gmail.com', 'unread', '2025-02-01 01:14:57'),
(6, 1, 'New subscriber: martina1@gmail.com', 'unread', '2025-02-01 01:15:42'),
(7, 1, 'New subscriber: martinaazeka@gmail.com', 'unread', '2025-02-01 01:17:08'),
(8, 1, 'New subscriber: gresasaliu@gmail.com', 'unread', '2025-02-01 01:20:10'),
(9, 1, 'New subscriber: armend@gmail.com', 'unread', '2025-02-01 01:20:41'),
(10, 1, 'New subscriber: anna1@gmail.com', 'unread', '2025-02-01 01:38:39'),
(11, 1, 'New subscriber: Lona@gmail.com', 'unread', '2025-02-01 01:39:18'),
(12, 1, 'New subscriber: luana1@gmail.com', 'unread', '2025-02-01 01:42:06'),
(13, 1, 'New subscriber: valon@gmail.com', 'unread', '2025-02-01 01:43:32'),
(14, 1, 'New subscriber: blerimgashi@gmail.com', 'unread', '2025-02-01 01:43:56'),
(15, 1, 'New subscriber: Bleona@gmail.com', 'unread', '2025-02-01 01:44:35'),
(16, 1, 'New subscriber: urtina@gmail.com', 'unread', '2025-02-01 01:45:15'),
(17, 1, 'New contact message from Morena (morena@gmail.com)', 'unread', '2025-02-01 01:50:36'),
(18, 1, 'New subscriber: lena@gmail.com', 'unread', '2025-02-01 02:38:12'),
(19, 1, 'New contact message from lena (lena@gmail.com)', 'unread', '2025-02-01 02:38:31'),
(20, 1, 'New subscriber: pajtim@gmail.com', 'unread', '2025-02-01 02:57:50'),
(21, 1, 'New contact message from pajtim (pajtim@gmail.com)', 'unread', '2025-02-01 02:58:07'),
(22, 1, 'New contact message from aa (aa@gmail.com)', 'unread', '2025-02-01 13:25:12'),
(23, 1, 'New subscriber: aaaaa@gmail.com', 'unread', '2025-02-01 13:34:34'),
(24, 1, 'New subscriber: bbbb@gmail.com', 'unread', '2025-02-01 13:37:25'),
(26, 1, 'New subscriber: kaona@gmail.com', 'unread', '2025-02-01 14:27:32'),
(27, 1, 'New contact message from Kaonaa (kaona@gmail.com)', 'unread', '2025-02-01 14:27:46'),
(28, 1, 'New contact message from binaa (binaa@gmail.com)', 'unread', '2025-02-01 14:33:55'),
(29, 1, 'New subscriber: binaa@gmail.com', 'unread', '2025-02-01 14:34:04'),
(30, 1, 'New subscriber: tana@gmail.com', 'unread', '2025-02-01 22:07:22'),
(31, 1, 'New contact message from tana (tana@gmail.com)', 'unread', '2025-02-01 22:07:39'),
(32, 1, 'New subscriber: lina@gmail.com', 'unread', '2025-02-02 00:17:47'),
(33, 1, 'New contact message from nita (nita25@gmail.com)', 'unread', '2025-02-02 00:56:37'),
(34, 1, 'New contact message from nikki (nikki@gmail.com)', 'unread', '2025-02-02 01:41:54'),
(35, 1, 'New subscriber: yapa@gmail.com', 'unread', '2025-02-02 05:27:27'),
(36, 1, 'New contact message from yapa (yapa@gmail.com)', 'unread', '2025-02-02 05:27:45'),
(37, 1, 'New subscriber: kristina@gmail.com', 'unread', '2025-02-02 11:51:52'),
(38, 1, 'New contact message from kanina (kanina@gmail.com)', 'unread', '2025-02-02 11:52:13'),
(39, 1, 'New subscriber: koko@gmail.com', 'unread', '2025-02-02 15:53:28'),
(40, 1, 'New subscriber: leo@gmail.com', 'unread', '2025-02-02 16:32:09'),
(41, 1, 'New subscriber: klara@gmail.com', 'unread', '2025-02-02 21:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `shipping_method` varchar(50) NOT NULL,
  `price_per_unit` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `product_name`, `product_image`, `quantity`, `zip_code`, `shipping_method`, `price_per_unit`, `total_price`, `customer_name`, `email`, `telephone`, `address`, `city`, `payment_method`, `order_date`, `comments`) VALUES
(1, 1, 'Black Table Lamp', 'uploads/black_lamp.png', 4, '10000', 'Shipped', 345.00, 345.00, 'anna smith', 'anna@gmail.com', '0444550111', 'prizren', 'prizren', 'PayPal', '2025-02-02 05:43:24', 'hi\r\n'),
(3, 2, 'Mushroom Table Lamp', 'uploads/mushroom_lamp.png', 1, '50000', 'Processing', 98.00, 98.00, 'Klea Berisha', 'klea.berisha@gmail.com', '045 678 908', 'Mitrovice Rruga 1', 'Mitrovice', 'PayPal', '2025-02-02 16:09:37', 'Great quality'),
(4, 4, 'Gold Chandelier', 'uploads/gold_chandelier.png', 1, '20000', 'Free Shipping', 456.00, 456.00, 'Luana Kryeziu', 'luanakryeziu@gmail.com', '044 345 678', 'prizren', 'prizren', 'PayPal', '2025-02-02 17:46:42', 'Obsessed with your work!!!'),
(5, 11, 'Siro Bed', 'uploads/siro_bed.png', 2, '10000', 'Free Shipping', 3400.00, 6800.00, 'Bled Limani', 'bledlimani@gmail.com', '045 667 887', 'Prishtine- Rruga B', 'Prishtine', 'PayPal', '2025-02-02 18:17:22', 'Awesome quality!'),
(6, 11, 'Siro Bed', 'uploads/siro_bed.png', 1, '10000', 'Canceled', 3400.00, 3400.00, 'Yll Dema', 'ylldema@gmail.com', '0149 566 232', 'Prizren - Ortakoll', 'Prizren', 'PayPal', '2025-02-02 18:19:08', ''),
(7, 9, 'Panora Bed', 'uploads/panora_bed.png', 1, '10000', 'Free Shipping', 5078.00, 5078.00, 'Yll Dema', 'ylldema@gmail.com', '0149 566 232', 'Prizren - Ortakoll', 'Prizren', 'PayPal', '2025-02-02 18:19:08', ''),
(8, 11, 'Siro Bed', 'uploads/siro_bed.png', 1, '20000', 'Free Shipping', 3400.00, 3400.00, 'Ariana Doli', 'arianadoli@gmail.com', '044 543 213', 'Prizren - Arbane', 'Prizren', 'PayPal', '2025-02-02 18:37:34', ''),
(9, 9, 'Panora Bed', 'uploads/panora_bed.png', 1, '20000', 'Free Shipping', 5078.00, 5078.00, 'Ariana Doli', 'arianadoli@gmail.com', '044 543 213', 'Prizren - Arbane', 'Prizren', 'PayPal', '2025-02-02 18:37:34', ''),
(10, 19, 'Oak Dresser', 'uploads/oak_dresser.png', 1, '20000', 'Free Shipping', 5432.00, 5432.00, 'Ariana Doli', 'arianadoli@gmail.com', '044 543 213', 'Prizren - Arbane', 'Prizren', 'PayPal', '2025-02-02 18:37:34', ''),
(11, 1, 'Modern Sofa', 'sofa.jpg', 2, '10000', 'Shipped', 500.00, 1000.00, 'Alice Smith', 'alice@example.com', '+123456789', '123 Main St', 'New York', 'Credit Card', '2025-01-15 09:30:00', 'Deliver ASAP'),
(12, 4, 'Luxury Bed', 'bed.jpg', 1, '10005', 'Shipped', 1200.00, 1200.00, 'David Johnson', 'david@example.com', '+1987654321', '321 Maple St', 'Boston', 'Debit Card', '2025-01-10 10:00:00', 'Deliver between 2PM-4PM'),
(13, 5, 'Coffee Table', 'coffee_table.jpg', 3, '10006', 'Shipped', 200.00, 600.00, 'Eva Brown', 'eva@example.com', '+123456987', '456 Pine St', 'San Francisco', 'Credit Card', '2025-01-18 14:20:00', 'Leave at front door'),
(14, 6, 'Bookshelf', 'bookshelf.jpg', 2, '10007', 'Shipped', 300.00, 600.00, 'Frank Wilson', 'frank@example.com', '+1123581321', '789 Birch St', 'Seattle', 'PayPal', '2025-01-25 08:45:00', 'Deliver ASAP'),
(15, 7, 'Dining Set', 'dining_set.jpg', 1, '10008', 'Shipped', 1500.00, 1500.00, 'Grace Lee', 'grace@example.com', '+9988776655', '987 Walnut St', 'Austin', 'Credit Card', '2025-01-30 13:00:00', 'Deliver between 10AM-12PM'),
(16, 11, 'Siro Bed', 'uploads/siro_bed.png', 1, '20000', 'Free Shipping', 3400.00, 3400.00, 'lana kastrati', 'lanakastrati@gmail.com', '045 555 555', 'Prizren - Arbane', 'Prizren', 'PayPal', '2025-02-02 20:06:19', 'I love them'),
(17, 9, 'Panora Bed', 'uploads/panora_bed.png', 1, '20000', 'Free Shipping', 5078.00, 5078.00, 'lana kastrati', 'lanakastrati@gmail.com', '045 555 555', 'Prizren - Arbane', 'Prizren', 'PayPal', '2025-02-02 20:06:19', 'I love them'),
(18, 19, 'Oak Dresser', 'uploads/oak_dresser.png', 1, '20000', 'Free Shipping', 5432.00, 5432.00, 'lana kastrati', 'lanakastrati@gmail.com', '045 555 555', 'Prizren - Arbane', 'Prizren', 'PayPal', '2025-02-02 20:06:19', 'I love them'),
(19, 21, 'Ford Dresser', 'uploads/ford_dresser.png', 1, '20000', 'Free Shipping', 1768.00, 1768.00, 'lana kastrati', 'lanakastrati@gmail.com', '045 555 555', 'Prizren - Arbane', 'Prizren', 'PayPal', '2025-02-02 20:06:19', 'I love them'),
(20, 11, 'Siro Bed', 'uploads/siro_bed.png', 1, '10000', 'Free Shipping', 3400.00, 3400.00, 'lana kastrati', 'lanakastrati@gmail.com', '044 444 444', 'Prizren - Arbane', 'Prizren', 'PayPal', '2025-02-02 21:22:24', ''),
(21, 9, 'Panora Bed', 'uploads/panora_bed.png', 1, '10000', 'Free Shipping', 5078.00, 5078.00, 'lana kastrati', 'lanakastrati@gmail.com', '044 444 444', 'Prizren - Arbane', 'Prizren', 'PayPal', '2025-02-02 21:22:24', ''),
(22, 19, 'Oak Dresser', 'uploads/oak_dresser.png', 1, '10000', 'Free Shipping', 5432.00, 5432.00, 'lana kastrati', 'lanakastrati@gmail.com', '044 444 444', 'Prizren - Arbane', 'Prizren', 'PayPal', '2025-02-02 21:22:24', ''),
(23, 21, 'Ford Dresser', 'uploads/ford_dresser.png', 1, '10000', 'Free Shipping', 1768.00, 1768.00, 'lana kastrati', 'lanakastrati@gmail.com', '044 444 444', 'Prizren - Arbane', 'Prizren', 'PayPal', '2025-02-02 21:22:24', ''),
(24, 3, 'Marble Table Lamp', 'uploads/marble_tablelamp.png', 1, '10000', 'Free Shipping', 466.00, 466.00, 'lana kastrati', 'lanakastrati@gmail.com', '044 444 444', 'Prizren - Arbane', 'Prizren', 'PayPal', '2025-02-02 21:22:24', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `dimensions` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `old_price` decimal(10,2) DEFAULT NULL,
  `image_default` varchar(255) NOT NULL,
  `image_hover` varchar(255) NOT NULL,
  `is_best_seller` tinyint(1) DEFAULT 0,
  `rating` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `dimensions`, `price`, `old_price`, `image_default`, `image_hover`, `is_best_seller`, `rating`) VALUES
(1, 'Black Table Lamp', 'lighting', '15\" H x 8\" W x 8\" D', 345.00, 499.00, 'uploads/black_lamp.png', 'uploads/black_lamp_hover.png', 1, 5),
(2, 'Mushroom Table Lamp', 'lighting', '12\" H x 7\" W x 7\" D', 98.00, 150.00, 'uploads/mushroom_lamp.png', 'uploads/mushroom_lamp_hover.png', 0, 3),
(3, 'Marble Table Lamp', 'lighting', '16\" H x 9\" W x 9\" D', 466.00, 600.00, 'uploads/marble_tablelamp.png', 'uploads/marble_tablelamp_hover.png', 1, 5),
(4, 'Gold Chandelier', 'lighting', '18\" H x 14\" W x 14\" D', 456.00, 700.00, 'uploads/gold_chandelier.png', 'uploads/gold_chandelier_hover.png', 1, 4),
(5, 'Black Chandelier', 'lighting', '20\" H x 12\" W x 12\" D', 199.00, 350.00, 'uploads/black_chandelier.png', 'uploads/black_chandelier_hover.png', 0, 3),
(6, 'Palm Floor Lamp', 'lighting', '72\" H x 12\" W x 12\" D', 377.00, 450.00, 'uploads/palm_floorlamp.png', 'uploads/palm_floorlamp_hover.png', 0, 4),
(7, 'Wooden Bed', 'beds', '75\" L x 60\" W x 48\" H', 3700.00, 4500.00, 'uploads/wooden_bed.png', 'uploads/wooden_bed_hover.png', 0, 3),
(8, 'Royal Blue Bed', 'beds', '78\" L x 62\" W x 50\" H', 2400.00, 3000.00, 'uploads/royalblue_bed.png', 'uploads/royalblue_bed_hover.png', 0, 3),
(9, 'Panora Bed', 'beds', '80\" L x 64\" W x 52\" H', 5078.00, 6000.00, 'uploads/panora_bed.png', 'uploads/panora_bed_hover.png', 0, 5),
(10, 'Upholstered Bed', 'beds', '82\" L x 60\" W x 51\" H', 4800.00, 5500.00, 'uploads/upholstered_bed.png', 'uploads/upholstered_bed_hover.png', 0, 4),
(11, 'Siro Bed', 'beds', '76\" L x 61\" W x 49\" H', 3400.00, 4000.00, 'uploads/siro_bed.png', 'uploads/siro_bed_hover.png', 0, 3),
(12, 'Wingback Bed', 'beds', '85\" L x 68\" W x 55\" H', 17659.00, 20000.00, 'uploads/wingback_bed.png', 'uploads/wingback_bed_hover.png', 1, 5),
(13, 'Grey Sofa', 'sofas', '84\" L x 35\" W x 30\" H', 1980.00, 2500.00, 'uploads/grey_sofa.png', 'uploads/grey_sofa_hover.png', 0, 4),
(14, 'Mylene Sofa', 'sofas', '80\" L x 36\" W x 32\" H', 2400.00, 2800.00, 'uploads/mylene_sofa.png', 'uploads/mylene_sofa_hover.png', 1, 4),
(15, 'Leonne Sofa', 'sofas', '90\" L x 38\" W x 34\" H', 3200.00, 3800.00, 'uploads/leonne_sofa.png', 'uploads/leonne_sofa_hover.png', 1, 5),
(16, 'Leather Sofa', 'sofas', '88\" L x 40\" W x 36\" H', 3780.00, 4500.00, 'uploads/leather_sofa.png', 'uploads/leather_sofa_hover.png', 1, 5),
(17, 'Cloud Sofa', 'sofas', '92\" L x 40\" W x 35\" H', 4290.00, 5000.00, 'uploads/cloud_sofa.png', 'uploads/cloud_sofa_hover.png', 0, 4),
(18, 'Pinth Sofa', 'sofas', '95\" L x 42\" W x 37\" H', 5900.00, 7000.00, 'uploads/pinth_sofa.png', 'uploads/pinth_sofa_hover.png', 1, 5),
(19, 'Oak Dresser', 'dressers', '50\" L x 18\" W x 30\" H', 5432.00, 6000.00, 'uploads/oak_dresser.png', 'uploads/oak_dresser_hover.png', 0, 3),
(20, 'Shagreen Dresser', 'dressers', '52\" L x 20\" W x 32\" H', 3567.00, 4000.00, 'uploads/shagreen_dresser.png', 'uploads/shagreen_dresser_hover.png', 1, 4),
(21, 'Ford Dresser', 'dressers', '48\" L x 19\" W x 28\" H', 1768.00, 2000.00, 'uploads/ford_dresser.png', 'uploads/ford_dresser_hover.png', 0, 3),
(22, 'Oberlin Dresser', 'dressers', '40\" L x 18\" W x 29\" H', 239.00, 350.00, 'uploads/oberlin_dresser.png', 'uploads/oberlin_dresser_hover.png', 1, 4),
(23, 'White Dresser', 'dressers', '45\" L x 18\" W x 30\" H', 356.00, 500.00, 'uploads/white_dresser.png', 'uploads/white_dresser_hover.png', 0, 3),
(24, 'Wooden Dresser', 'dressers', '47\" L x 19\" W x 31\" H', 422.00, 550.00, 'uploads/wooden_dresser.png', 'uploads/wooden_dresser_hover.png', 0, 4),
(25, 'Avot Chair', 'chairs', '20\" L x 20\" W x 35\" H', 760.00, 900.00, 'uploads/avot_chair.png', 'uploads/avot_chair_hover.png', 0, 3),
(26, 'Camel Chair', 'chairs', '22\" L x 21\" W x 33\" H', 322.00, 400.00, 'uploads/camel_chair.png', 'uploads/camel_chair_hover.png', 1, 4),
(27, 'Lupo Chair', 'chairs', '21\" L x 21\" W x 34\" H', 244.00, 300.00, 'uploads/lupo_chair.png', 'uploads/lupo_chair_hover.png', 0, 3),
(28, 'Fluffy Chair', 'chairs', '24\" L x 22\" W x 36\" H', 1000.00, 1200.00, 'uploads/fluffy_chair.png', 'uploads/fluffy_chair_hover.png', 0, 4),
(29, 'Velvet Chair', 'chairs', '23\" L x 22\" W x 34\" H', 344.00, 400.00, 'uploads/velvet_chair.png', 'uploads/velvet_chair_hover.png', 0, 3),
(30, 'Brown Chair', 'chairs', '22\" L x 21\" W x 33\" H', 278.00, 350.00, 'uploads/brown_chair.png', 'uploads/brown_chair_hover.png', 0, 3),
(31, 'Round Mirror', 'decor', '30\" D x 1\" W', 199.00, 250.00, 'uploads/round_mirror.png', 'uploads/round_mirror_hover.png', 1, 4),
(32, 'Meduza Decor', 'decor', '12\" H x 8\" W x 8\" D', 69.00, 100.00, 'uploads/meduzadecor.png', 'uploads/meduzadecor_hover.png', 0, 3),
(33, 'Metal Vase', 'decor', '10\" H x 6\" W x 6\" D', 134.00, 180.00, 'uploads/metalvase.png', 'uploads/metalvase_hover.png', 1, 4),
(34, 'Candel Holder', 'decor', '8\" H x 6\" W x 6\" D', 2334.00, 2500.00, 'uploads/candelholder.png', 'uploads/candelholder_hover.png', 0, 4),
(35, 'Wall Decor', 'decor', '36\" L x 2\" W x 24\" H', 2400.00, 2800.00, 'uploads/wall_decor.png', 'uploads/wall_decor_hover.png', 1, 5),
(36, 'Porcelain Vase', 'decor', '12\" H x 7\" W x 7\" D', 400.00, 450.00, 'uploads/porcelain_vase.png', 'uploads/porcelain_vase_hover.png', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `stock` int(11) DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `description`, `stock`) VALUES
(1, 1, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 15\" H x 8\" W x 8\" D.\nWeight capacity: 600 lbs.', 10),
(2, 2, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 12\" H x 7\" W x 7\" D.\nWeight capacity: 600 lbs.', 10),
(3, 3, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 16\" H x 9\" W x 9\" D.\nWeight capacity: 600 lbs.', 10),
(4, 4, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 18\" H x 14\" W x 14\" D.\nWeight capacity: 600 lbs.', 10),
(5, 5, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 20\" H x 12\" W x 12\" D.\nWeight capacity: 600 lbs.', 10),
(6, 6, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 72\" H x 12\" W x 12\" D.\nWeight capacity: 600 lbs.', 10),
(7, 7, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 75\" L x 60\" W x 48\" H.\nWeight capacity: 600 lbs.', 10),
(8, 8, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 78\" L x 62\" W x 50\" H.\nWeight capacity: 600 lbs.', 10),
(9, 9, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 80\" L x 64\" W x 52\" H.\nWeight capacity: 600 lbs.', 10),
(10, 10, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 82\" L x 60\" W x 51\" H.\nWeight capacity: 600 lbs.', 10),
(11, 11, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 76\" L x 61\" W x 49\" H.\nWeight capacity: 600 lbs.', 10),
(12, 12, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 85\" L x 68\" W x 55\" H.\nWeight capacity: 600 lbs.', 10),
(13, 13, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 84\" L x 35\" W x 30\" H.\nWeight capacity: 600 lbs.', 10),
(14, 14, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 80\" L x 36\" W x 32\" H.\nWeight capacity: 600 lbs.', 10),
(15, 15, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 90\" L x 38\" W x 34\" H.\nWeight capacity: 600 lbs.', 10),
(16, 16, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 88\" L x 40\" W x 36\" H.\nWeight capacity: 600 lbs.', 10),
(17, 17, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 92\" L x 40\" W x 35\" H.\nWeight capacity: 600 lbs.', 10),
(18, 18, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 95\" L x 42\" W x 37\" H.\nWeight capacity: 600 lbs.', 10),
(19, 19, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 50\" L x 18\" W x 30\" H.\nWeight capacity: 600 lbs.', 10),
(20, 20, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 52\" L x 20\" W x 32\" H.\nWeight capacity: 600 lbs.', 10),
(21, 21, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 48\" L x 19\" W x 28\" H.\nWeight capacity: 600 lbs.', 10),
(22, 22, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 40\" L x 18\" W x 29\" H.\nWeight capacity: 600 lbs.', 10),
(23, 23, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 45\" L x 18\" W x 30\" H.\nWeight capacity: 600 lbs.', 10),
(24, 24, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 47\" L x 19\" W x 31\" H.\nWeight capacity: 600 lbs.', 10),
(25, 25, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 20\" L x 20\" W x 35\" H.\nWeight capacity: 600 lbs.', 10),
(26, 26, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 22\" L x 21\" W x 33\" H.\nWeight capacity: 600 lbs.', 10),
(27, 27, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 21\" L x 21\" W x 34\" H.\nWeight capacity: 600 lbs.', 10),
(28, 28, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 24\" L x 22\" W x 36\" H.\nWeight capacity: 600 lbs.', 10),
(29, 29, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 23\" L x 22\" W x 34\" H.\nWeight capacity: 600 lbs.', 10),
(30, 30, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 22\" L x 21\" W x 33\" H.\nWeight capacity: 600 lbs.', 10),
(31, 31, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 30\" D x 1\" W.\nWeight capacity: 600 lbs.', 10),
(32, 32, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 12\" H x 8\" W x 8\" D.\nWeight capacity: 600 lbs.', 10),
(33, 33, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 10\" H x 6\" W x 6\" D.\nWeight capacity: 600 lbs.', 10),
(34, 34, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 8\" H x 6\" W x 6\" D.\nWeight capacity: 600 lbs.', 10),
(35, 35, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 36\" L x 2\" W x 24\" H.\nWeight capacity: 600 lbs.', 10),
(36, 36, 'Hand-twisted solid steel frame.\nModern yet timeless design.\nDimensions: 12\" H x 7\" W x 7\" D.\nWeight capacity: 600 lbs.', 10);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subscribed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `subscribed_at`) VALUES
(1, 'anna@gmail.com', '2025-01-28 00:25:51'),
(2, 'sara@gmail.com', '2025-01-28 00:26:40'),
(16, 'xyz@gmail.com', '2025-01-28 02:57:26'),
(17, 'anitaaaa@gmail.com', '2025-01-28 14:45:16'),
(18, 'driniii@gmail.com', '2025-01-28 14:46:38'),
(19, 'drinniii@gmail.com', '2025-01-28 15:04:49'),
(20, 'lala@gmail.com', '2025-01-28 17:15:02'),
(21, 'kanita@gmail.com', '2025-01-28 17:58:22'),
(22, 'susan.baker@gmail.com', '2025-01-28 18:00:04'),
(23, 'hannahsmithr@gmail.com', '2025-01-28 18:02:50'),
(24, 'andixx@gmail.com', '2025-01-28 19:38:13'),
(25, 'bobi@gmail.com', '2025-01-28 22:14:58'),
(26, 'leah@gmail.com', '2025-01-28 22:15:49'),
(27, 'rina@gmail.com', '2025-01-29 16:01:01'),
(28, 'blendaa@gmail.com', '2025-01-29 21:06:18'),
(29, 'denis@gmail.com', '2025-01-29 21:21:59'),
(30, 'tina@gmail.com', '2025-01-29 22:17:05'),
(31, 'admin@example.com', '2025-01-29 23:23:24'),
(36, 'moana@gmail.com', '2025-01-29 23:43:42'),
(37, 'annie@gmail.com', '2025-01-30 14:57:39'),
(38, 'vlera@gmail.com', '2025-01-30 19:41:40'),
(41, 'rina123@gmail.com', '2025-01-30 20:39:55'),
(42, 'almir1@gmail.com', '2025-01-30 20:40:25'),
(43, 'lea@gmail.com', '2025-01-31 01:00:27'),
(44, 'saraa@gmail.com', '2025-01-31 14:02:29'),
(45, 'klea10@gmail.com', '2025-01-31 14:03:56'),
(47, 'nola@gmail.com', '2025-01-31 21:53:46'),
(48, 'fjolla1@hotmail.com', '2025-01-31 21:54:57'),
(49, 'bianca@gmail.com', '2025-01-31 21:58:35'),
(50, 'Katarina@gmail.com', '2025-01-31 22:01:25'),
(51, 'luana@gmail.com', '2025-02-01 01:03:22'),
(53, 'flutura1@gmail.com', '2025-02-01 01:08:16'),
(54, 'aurela9@gmail.com', '2025-02-01 01:14:57'),
(55, 'martina1@gmail.com', '2025-02-01 01:15:42'),
(56, 'martinaazeka@gmail.com', '2025-02-01 01:17:08'),
(57, 'gresasaliu@gmail.com', '2025-02-01 01:20:10'),
(58, 'armend@gmail.com', '2025-02-01 01:20:41'),
(59, 'anna1@gmail.com', '2025-02-01 01:38:39'),
(60, 'Lona@gmail.com', '2025-02-01 01:39:18'),
(61, 'luana1@gmail.com', '2025-02-01 01:42:06'),
(62, 'valon@gmail.com', '2025-02-01 01:43:32'),
(63, 'blerimgashi@gmail.com', '2025-02-01 01:43:56'),
(64, 'Bleona@gmail.com', '2025-02-01 01:44:35'),
(65, 'urtina@gmail.com', '2025-02-01 01:45:15'),
(66, 'lena@gmail.com', '2025-02-01 02:38:12'),
(67, 'pajtim@gmail.com', '2025-02-01 02:57:50'),
(68, 'aaaaa@gmail.com', '2025-02-01 13:34:34'),
(69, 'bbbb@gmail.com', '2025-02-01 13:37:25'),
(70, 'kaona@gmail.com', '2025-02-01 14:27:32'),
(71, 'binaa@gmail.com', '2025-02-01 14:34:04'),
(72, 'tana@gmail.com', '2025-02-01 22:07:22'),
(73, 'lina@gmail.com', '2025-02-02 00:17:47'),
(74, 'yapa@gmail.com', '2025-02-02 05:27:27'),
(75, 'kristina@gmail.com', '2025-02-02 11:51:52'),
(76, 'koko@gmail.com', '2025-02-02 15:53:28'),
(77, 'leo@gmail.com', '2025-02-02 16:32:09'),
(78, 'klara@gmail.com', '2025-02-02 21:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `status` enum('active','inactive') DEFAULT 'active',
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`, `registration_date`) VALUES
(1, 'Admin User', 'admin@example.com', '$2y$10$6GFd.NfsHTlCw/NmztDbAedHaDIbwm3MlgKlk/yywVkXI263yUkyG', 'admin', 'active', '2025-01-31 18:40:34'),
(2, 'Regular User', 'user@example.com', 'userpass', 'user', 'active', '2025-01-31 18:40:34'),
(4, 'sara', 'sara@gmail.com', '$2y$10$a034GkYQ.Tcc/iHYQcZszecWKl8oZPTXovuw06GiDTz6CmssXlwOm', 'user', 'active', '2025-01-27 23:00:00'),
(22, 'pamela', 'pamela123@gmail.com', '$2y$10$KrfUCLB30UOynZCkjyx54eQA6LK4Cx2xOkcZEfN/XohGZSc9xxf22', 'admin', 'active', '2025-01-29 23:00:00'),
(24, 'kanina', 'kanina12@gmail.com', '$2y$10$nBXF6hvJw80ODmJeWoJYDOklM4G7AWx3RpCi5lZXP9CgTQCyhlSXS', 'user', 'active', '2025-01-31 18:40:34'),
(25, 'klara', 'klara10@gmail.com', '$2y$10$xkz57NuHTl12HTbuENz3l.3l7IJ61SQAcFc7catncAlkhmjAO4B06', 'user', 'inactive', '2025-01-29 23:00:00'),
(28, 'blenda', 'blenda@gmail.com', '$2y$10$41xTTu1kcDwNQ50.LxPOIe3s4OJNa9W2ApBoi4Nwlr1VvQs19RRvi', 'user', 'inactive', '2025-01-08 23:00:00'),
(29, 'denis', 'denis@gmail.com', '$2y$10$FmeqW0dXPCK25.JS8qK2WufSgniZQ1YQyKrEpo504bDuugOXZVIqO', 'user', 'active', '2025-01-29 23:00:00'),
(31, 'lana', 'lana123@gmail.com', '$2y$10$aM/Yu32cF4XAutS7W78fN.eTXmo1FP8ukIWj7pAAY7Yzq01HO9xru', 'user', 'active', '2025-01-31 18:40:34'),
(32, 'annie', 'annie@gmail.com', '$2y$10$gldRUX953teb5Lqa6F3v9.uhrv7KyE.r5FL9yhiAW9HcEug.I3sCy', 'user', 'inactive', '2025-01-31 23:13:15'),
(36, 'Kloe', 'Kloe@gmail.com', '$2y$10$kRAZrvlPSSHLC3Q/RZWoOuN2iZzMl4gNM5FNhGR8gTm42hTlQAyBS', 'user', 'active', '2025-01-07 23:00:00'),
(38, 'kris', 'kris@gmail.com', '$2y$10$omTCbN.h7hcShzl3Pq5bXOthK2nXgSWGimXsDd6WJql/bN6D6FjNG', 'user', 'active', '2025-02-01 00:12:26'),
(43, 'klementina', 'klementina@gmail.com', '$2y$10$5SK7YZUYGQXVFxxiMI7ubuIyOo.HhQKeWlQpDO0lr5UqUhtN9Ulte', 'user', 'active', '2025-02-01 01:04:54'),
(47, 'khloe', 'khloe@gmail.com', '$2y$10$zWMtT1RwpV89gpUfLoufL.RZjPIllz7IFat7vBJx5Ui5zzcGLz1/2', 'user', 'inactive', '0000-00-00 00:00:00'),
(48, 'Leah', 'leah@gmail.com', '$2y$10$n/Sk8z1eLBQuq2H2js4eHuhOxOQzmrZGW6GAv/b6J1BEBjxRWCcL6', 'user', 'active', '2025-01-30 23:00:00'),
(49, 'Ola', 'Ola@gmail.com', '$2y$10$ZvRxJ29eFv4Qos9sUwzRr.q.VlFvjHkWsq4KOSkvWyoZe3fviyDw6', 'user', 'active', '2025-02-01 02:08:32'),
(50, 'Era', 'Era@gmail.com', '$2y$10$zeQ5HbYtNQT1lXc4LWPv3.uWfcppxdKNq14.3Ypj5eH8wC3MHmk26', 'user', 'active', '2025-02-01 02:08:50'),
(52, 'pajtim', 'pajtim@gmail.com', '$2y$10$Z1G3JfADMiPD4DHVfq3xr.9Ml/lub7uHh.xtBFVBm1JAK97169tbm', 'user', 'active', '2025-02-01 02:57:37'),
(59, 'diella', 'diella@gmail.com', '$2y$10$s8nx4w9Yb0u1Xc.7V544MuZLAH2bAKjR3jVemtViFFonBkmY1MT0m', 'user', 'active', '2025-02-01 14:22:07'),
(62, 'lona', 'lona@gmail.com', '$2y$10$A.oky.OueO/7OEwPGILf1.wFew9Op665dU4f3umSH.jPZqv6iOCkW', 'user', 'active', '2025-02-02 02:15:52'),
(63, 'lola', 'lola@gmail.com', '$2y$10$M5Hlx/Xx0zBrouhZyctvoOl4e57of4Hz.Y52.CcInQCfegX.L5Ko2', 'user', 'active', '2025-02-02 02:24:03'),
(64, 'klea', 'klea@gmail.com', '$2y$10$uUGHx/VyTR03woMGsuedF.RWLExkKSZbtvCINcAuH28lwBHUIngCy', 'user', 'active', '2025-02-02 02:25:40'),
(67, 'diana123', 'diana@gmail.com', '$2y$10$UgA8imMXYExr6M.7BoNrC.fEZuFL470J2RjiKzrG90w0/RWf4z2nu', 'user', 'active', '0000-00-00 00:00:00'),
(68, 'leon', 'leon@gmail.com', '$2y$10$9Zu/RVmHvqKsVeHzShuJfOV8O0CJaVDWnbxNv0NPq.QU/2vbxG6WG', 'user', 'inactive', '0000-00-00 00:00:00'),
(70, 'lela', 'lela@gmail.com', '$2y$10$qnzhioG7DlL8LdIamDA.pej5rFAtTHJ1zPw87IHArVk/ieRCNZaXm', 'user', 'active', '2025-02-02 18:58:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

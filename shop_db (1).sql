-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 12:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending',
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`, `quantity`) VALUES
(40, 31, 'user02', '9876543210', 'user02@gmail.com', 'cash on delivery', 'house no. 123 main street ukuwela matale', 'Chef Samosa Pastry - 250.00 g', 1900, '28-Aug-2023', 'completed', 2),
(41, 33, 'user02', '0123456789', 'user02@gmail.com', 'cash on delivery', 'house no. 123 kings street ukuwela matale', 'Banana - 1.00 kg', 660, '29-Aug-2023', 'completed', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `details`, `price`, `image`, `quantity`, `available`) VALUES
(214, 'Carrot - 500.00 g', 'vegetables', 'Carrots are the perfect snack — crunchy, full of nutrients, low in calories, and sweet. They’re associated with heart and eye health, improved digestion, and even weight loss. This root vegetable comes in several colors, sizes, and shapes, all of which are great additions to a healthy diet. [Source: www.healthline.com] Disclaimer: Please note that the image is used for presentation purposes only. Actual product may slightly defer. Our team at Cargills Online takes every step to ensure to maintai', 235, 'carrot.png', 7, 7),
(215, 'Red Apple - 700.00 g', 'fruits', 'Bright red coloured crunchy, juicy and sweet apples. Red Apples are a natural source of fibre and are fat free. They contains wide variety of anti-oxidants. *Images for illustration purpose only, Product recieved may vary.', 1780, 'apple.png', 15, 15),
(216, 'CIC Skinless Chicken Leg - 1.30 kg', 'meat', 'Frozen skinless chicken legs. Disclaimer: Please note that our team at Cargills Online have take all necessary measures to deliver this product frozen to the customer. *Images for illustration purposes only. Product received may vary.', 3029, 'chicken leg pieces.png', 15, 10),
(217, 'Tess Mackerel - 425.00 g', 'sea food', 'Tess Mackerel - 425.00 g', 690, 'Tess Mackerel - 425.00 g.jpg', 23, 20),
(218, 'Baby Cheramy Baby Oil - 100.00 ml', 'Baby Products', 'Baby Cheramy baby oil moisturizes, nourishes and protects the skin. *Images for illustration purposes only. Product received may vary.', 250, 'Baby Cheramy Baby Oil - 100.00 ml.jfif', 20, 28),
(219, 'Elephant House Necto - 1.50 l', 'Beverages', 'The most fun drink in Elephant House’s ‘sweets range’, Necto has been a favourite among kids and adults alike for generations. Its super-duper taste is based on a secret recipe that adds a dash of excitement and a spoonful of fun and mischief. Its very unique colour leaves your tongue pink for hours and makes sure that the fun with Necto never stops, even after your final sip. Brings out the kid in you.', 350, 'Elephant House Necto - 1.50 l.jpg', 22, 17),
(220, 'DIVA FRESH ROSE & LIME - 700.00 GR', 'House hold', 'Food storage bags can be used to store Fruits, Vegetables, Meat and Fish. Eliminates odours and keeps flavour locked in. Just pop the food in and toss into the refrigerator for storing.', 335, 'Diva Washing Powder, Rose and Lime - 700.00 g.jpg', 14, 10),
(221, 'Fortune Vegetable Oil - 1.00 l', 'Cooking Essentials', 'Fortune vegetable oil 1L. ', 1250, 'Fortune Vegetable Oil - 1.00 l.jpg', 22, 21),
(222, 'Tiara Chocolate Swiss Roll - 200.00 g', 'Bakery', 'Soft sponge cake roll with chocolate frosting. *Images for illustration purposes only. Product received may vary.', 420, 'Tiara Chocolate Swiss Roll - 200.00 g.jpg', 13, 11),
(223, 'Chef Samosa Pastry - 250.00 g', 'Frozen Food', 'A traditional dough-based thin samosa pastry, made of wheat and easy to use. You can wrap the sheets around any filling of your choice and create food magic at home. Great for tea time snacks and party snacks like samosas and appetizers. *Images for illustration purposes only. Product received may vary.', 950, 'Chef Samosa Pastry - 250.00 g.jpg', 23, 22),
(224, 'Banana - 1.00 kg', 'fruits', 'Bananas are a popular fruit that happens to provide numerous health benefits. Among other things, they may boost digestive and heart health due to their fiber and antioxidant content. They may even aid weight loss, as they&#39;re relatively low-calorie and nutrient-dense. Ripe bananas are a great way to satisfy your sweet tooth. What’s more, both yellow and green bananas can keep you healthy and feeling full. ', 330, 'banana.png', 33, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `image`) VALUES
(31, 'user01', 'user01@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 'pic-4.png'),
(32, 'admin', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'pic-1.png'),
(33, 'user02', 'user02@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 'pic-5.png');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

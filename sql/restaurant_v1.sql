-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2019 at 04:22 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` smallint(5) NOT NULL,
  `user_phone_numer` varchar(50) NOT NULL,
  `street_address` varchar(100) NOT NULL,
  `apartment_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` smallint(5) NOT NULL,
  `quantity` smallint(5) NOT NULL,
  `total` smallint(5) NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `cart_item_id` smallint(5) NOT NULL,
  `cart_id` smallint(5) NOT NULL,
  `item_id` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`name`) VALUES
('Beverages'),
('Breakfast'),
('Daily Dishes'),
('Fresh Juices'),
('Salads'),
('Sandwiches'),
('Seafood'),
('Soup');

-- --------------------------------------------------------

--
-- Table structure for table `category_item`
--

CREATE TABLE `category_item` (
  `restaurant_id` smallint(5) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `item_id` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_item`
--

INSERT INTO `category_item` (`restaurant_id`, `category_name`, `item_id`) VALUES
(1, 'Soup', 5),
(3, 'Salads', 1),
(3, 'Salads', 2),
(3, 'Sandwiches', 3),
(3, 'Sandwiches', 4);

-- --------------------------------------------------------

--
-- Table structure for table `cuisines`
--

CREATE TABLE `cuisines` (
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cuisines`
--

INSERT INTO `cuisines` (`name`) VALUES
('Arabic'),
('Burgers'),
('Indian'),
('Italian'),
('Lebanese'),
('Pizzas'),
('Turkish');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` smallint(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `size` varchar(100) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `price`, `size`, `ingredients`, `picture`) VALUES
(1, 'Tabbouleh Salad', 15.75, 'small', 'null', 'tabouleh.jpg'),
(2, 'Tabbouleh Salad', 52, 'large', 'null', 'tabouleh.jpg'),
(3, 'Shish Tawook', 36.75, 'person', 'French Fries, Garlic, Hummus and Pickles', 'null'),
(4, 'Shish Tawook', 52.5, '0.5 kg', 'French Fries, Garlic, Hummus and Pickles', 'null'),
(5, 'shourba_b3adas', 20, 'small', '3adas', 'test.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_code` int(12) NOT NULL,
  `user_address` smallint(5) NOT NULL,
  `total_price` float NOT NULL,
  `order_date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `cart_item` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` smallint(5) NOT NULL,
  `restaurant_name` varchar(255) NOT NULL,
  `avg_delivery_time` varchar(50) NOT NULL,
  `delivery_fee` tinyint(2) NOT NULL,
  `location` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` tinyint(2) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `opening_closing_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `restaurant_name`, `avg_delivery_time`, `delivery_fee`, `location`, `image`, `rating`, `phone_number`, `opening_closing_time`) VALUES
(1, 'Al Hallab', '60 mins', 5, 'Sheikh Rashid Rd', 'hallab.jpg', 4, '0501234567', '11:00AM - 11:30PM'),
(2, 'Labenah & Zaatar', '38 mins', 6, 'Muwaileh', 'labneh&zaatar.jpg', 4, '050 9876554', '7:30AM - 1:30AM'),
(3, 'Qasr Al Dayaa', '34 mins', 6, 'Shop 3, Reemack\'s Building - University City Rd - Sharjah', 'qasr.jpg', 4, '06 555 4445', '11:00AM - 11:00PM');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_category`
--

CREATE TABLE `restaurant_category` (
  `restaurant_id` smallint(5) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant_category`
--

INSERT INTO `restaurant_category` (`restaurant_id`, `category_name`) VALUES
(3, 'Sandwiches'),
(3, 'Salads');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_cuisines`
--

CREATE TABLE `restaurant_cuisines` (
  `restaurant_id` smallint(5) NOT NULL,
  `cuisines_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant_cuisines`
--

INSERT INTO `restaurant_cuisines` (`restaurant_id`, `cuisines_name`) VALUES
(1, 'Arabic'),
(1, 'Lebanese'),
(2, 'Arabic'),
(2, 'Lebanese');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `phone_number` varchar(50) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group_id` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`phone_number`, `first_name`, `last_name`, `email`, `password`, `group_id`) VALUES
('050 701 602 5', 'Houzayfa ', 'El Rifai', 'houzayfar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
('0507016025', 'houzayfa', 'rifai', 'p-p-h@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_phone_numer` (`user_phone_numer`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD UNIQUE KEY `cart_id` (`cart_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `category_item`
--
ALTER TABLE `category_item`
  ADD UNIQUE KEY `restaurant_id` (`restaurant_id`,`category_name`,`item_id`),
  ADD KEY `category_name` (`category_name`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `cuisines`
--
ALTER TABLE `cuisines`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_code`),
  ADD KEY `cart_item` (`cart_item`),
  ADD KEY `user_address` (`user_address`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_category`
--
ALTER TABLE `restaurant_category`
  ADD KEY `category_name` (`category_name`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `restaurant_cuisines`
--
ALTER TABLE `restaurant_cuisines`
  ADD UNIQUE KEY `restaurant_id` (`restaurant_id`,`cuisines_name`),
  ADD UNIQUE KEY `restaurant_id_2` (`restaurant_id`,`cuisines_name`),
  ADD KEY `cuisines_name` (`cuisines_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `phone_numer` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cart_item_id` smallint(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_phone_numer`) REFERENCES `users` (`phone_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_item_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_item`
--
ALTER TABLE `category_item`
  ADD CONSTRAINT `category_item_ibfk_1` FOREIGN KEY (`category_name`) REFERENCES `category` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_item_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_item_ibfk_3` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cart_item`) REFERENCES `cart_item` (`cart_item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_address`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_category`
--
ALTER TABLE `restaurant_category`
  ADD CONSTRAINT `restaurant_category_ibfk_1` FOREIGN KEY (`category_name`) REFERENCES `category` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restaurant_category_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_cuisines`
--
ALTER TABLE `restaurant_cuisines`
  ADD CONSTRAINT `restaurant_cuisines_ibfk_1` FOREIGN KEY (`cuisines_name`) REFERENCES `cuisines` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restaurant_cuisines_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

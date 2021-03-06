-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 10:59 PM
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

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `user_phone_numer`, `street_address`, `apartment_number`) VALUES
(17, '0507246145', 'sheikh zayed', 'k5'),
(18, '0507246145', 'fdsf', 'k5'),
(19, '0507246145', 'f', 'g'),
(20, '0507246145', 'sheikh zayed', 'k5'),
(21, '0507246145', 'sheikh zayed', 'fdsfsd');

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

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `quantity`, `total`, `user_email`) VALUES
(1, 0, 0, 'finaltest@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `cart_item_id` smallint(5) NOT NULL,
  `cart_id` smallint(5) NOT NULL,
  `item_id` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`cart_item_id`, `cart_id`, `item_id`) VALUES
(35, 1, 1),
(36, 1, 5);

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
(1, 'Tabbouleh Salad', 15.75, 'small', 'Parsley, tomato, onion, and Bulgur ', 'https://imgur.com/a/Gx9ja2j'),
(2, 'Tabbouleh Salad', 52, 'large', 'Parsley, tomato, onion, and Bulgur', 'https://imgur.com/a/Gx9ja2j'),
(3, 'Shish Tawook', 36.75, 'person', 'French Fries, Garlic, Hummus and Pickles', 'https://imgur.com/a/tQkmKjb'),
(4, 'Shish Tawook', 52.5, '0.5 kg', 'French Fries, Garlic, Hummus and Pickles', 'https://imgur.com/a/tQkmKjb'),
(5, 'Lentil Soup ', 20.2, 'small', 'lentil', 'https://imgur.com/a/6KstclF'),
(6, 'Hummus', 12.5, 'Small', 'Chickpeas, Olive Oil', 'https://imgur.com/a/nk0jhOe'),
(7, 'Hummus', 24, 'Large ', 'Chickpeas, Olive Oil', 'https://imgur.com/a/nk0jhOe'),
(8, 'Cheese Manakish ', 15.75, 'Medium ', 'Cheese, dough', 'https://imgur.com/a/hvS1P9I'),
(9, 'Za\'atar Manakish', 17.75, 'Medium ', 'Za\'atar', 'Mzaatar.jpg'),
(10, 'Falafel ', 9.5, 'Small ', 'Fried Chickpeas ', 'falafel.jpg'),
(11, 'Falafel ', 14.5, 'Large ', 'Fried Chickpeas ', 'falafel.jpg'),
(12, 'Chicken Biryani ', 17.5, 'Small', 'Chicken, Rice, Yogurt ', 'chickenbiryani.jpg'),
(13, 'Chicken Biryani ', 22.75, 'Large', 'Chicken, Rice, Yogurt ', 'chickenbiryani.jpg'),
(14, 'Steak', 49.5, 'Medium ', 'Beef, Vegetables, Fries ', 'steak.jpg'),
(15, 'Chicken Pasta', 35.7, 'Medium ', 'Fettuccine, chicken, vegetables and white sauce', 'cpasta.jpg'),
(16, 'Chicken Tacos', 30.2, 'Medium', 'Chicken, Vegetables, tortilla, sauce, and beans ', 'ctacos.jpg'),
(17, 'Fish Tacos', 35.2, 'Medium ', 'Fish, Vegetables, tortilla, sauce, and beans ', 'ftacos.jpg'),
(18, 'Chicken Burger', 12.5, 'Medium ', 'Bread, Chicken, Lettuce, Cheese, Pickles and Mayonnaise ', 'https://imgur.com/a/PHlrcH9'),
(19, 'Beef Burger ', 12.5, 'Medium ', 'Bread, Beef, Lettuce, Cheese, Pickles and Mayonnaise ', 'bburger.jpg'),
(20, 'Shawarma Chicken ', 19.2, 'Medium ', 'Bread, chicken, garlic, pickles ', 'cshawarma.jpg'),
(21, 'Shawarma Meat', 19.2, 'Medium', 'Bread, meat, garlic, pickles ', 'mshawarma.jpg'),
(22, 'Fried Chicken', 17.2, 'Medium', 'Chicken, Fries', 'friedchicken.jpg'),
(23, 'Fish and Chips', 20.3, 'Medium', 'Fish, Fries', 'fishandchips.jpg'),
(24, 'Fried Shrimp ', 25.2, 'Medium ', 'Shrimp, fries ', 'shrimp.jpg'),
(25, 'Greek Salad ', 15.3, 'Large ', 'Lettuce, Tomato, Cheese, Cucumber, olives, onion  ', 'greeksalad.jpg'),
(26, 'Kibbeh ', 7.5, 'Medium ', 'Meat, Bulgur, Onion ', 'kibbeh.jpg'),
(27, 'Mozzarella Sticks ', 10.5, 'Small', 'Mozzarella Cheese', 'mozzarella.jpg'),
(25441, 'Chicken Pizza', 20.2, 'Medium ', 'chicken, cheese, olives, tomatoes ', 'cpizza.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `user_email` varchar(255) NOT NULL,
  `order_id` int(12) NOT NULL,
  `user_address` smallint(5) NOT NULL,
  `total_price` float NOT NULL,
  `order_date` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`user_email`, `order_id`, `user_address`, `total_price`, `order_date`, `status`) VALUES
('finaltest@gmail.com', 1, 21, 35.95, '2019-12-03', 'not confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(12) NOT NULL,
  `item_id` smallint(5) NOT NULL,
  `quantity` smallint(5) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `item_id`, `quantity`, `status`) VALUES
(1, 1, 1, 'not_delivered'),
(1, 5, 1, 'not_delivered');

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
(1, 'Al Hallab', '60 mins', 5, 'Dubai', 'https://imgur.com/a/dG3QF7k', 4, '0501234567', '11:00AM - 11:30PM'),
(2, 'Labenah & Zaatar', '38 mins', 6, 'Sharjah ', 'https://imgur.com/a/eciVFRO', 4, '050 9876554', '7:30AM - 1:30AM'),
(3, 'Qasr Al Dayaa', '34 mins', 6, 'Sharjah', 'https://imgur.com/a/1yYSifs', 4, '06 555 4445', '11:00AM - 11:00PM'),
(4, 'Zaatar w Zeit', '40 mins', 5, 'Dubai ', 'https://imgur.com/a/IlgdHR9', 4, '600 522231', '8AM - 12AM '),
(5, 'Applebee\'s', '45 mins', 6, 'Abu Dhabi', 'https://i.imgur.com/SgzhIpX.jpg', 3, '06 556 1661', '11AM - 12AM'),
(6, 'Friday\'s ', '35 mins', 6, 'Sharjah', 'fridays.jpg', 4, ' 06 552 1104', '1PM - 12AM'),
(7, 'Panda Express', '35 mins', 5, 'Abu Dhabi', 'pandaexpress.jpg', 4, '04 288 1744', '1PM - 11:30PM'),
(8, 'McDonald\'s', '25 mins', 6, 'Ajman', 'mcdonalds.jpg', 4, '600 588885', '6AM - 12AM'),
(9, 'Pizza Hut', '35 mins', 8, 'Abu Dhabi', 'pizzahut.jpg', 3, '600 569999', '11AM-12AM'),
(10, 'Zahr El Laymoun', '30 mins', 6, 'Sharjah', 'zahrellaymoun.jpg', 2, '06 552 1144', '8AM - 11PM'),
(11, 'Pizzaro ', '40 mins', 10, 'Ajman', 'pizzaro.jpg', 4, '050 1092849', '10AM - 10PM'),
(12, 'Burger King', '25 mins', 5, 'Ras Al Khaima', 'burgerking.jpg', 2, '06 2098733', '8AM - 12AM'),
(13, 'Sumo Sushi & Bento', '35 mins', 6, 'Sharjah', 'sumosushiandbento.jpg', 4, '06 9584037', '12PM - 12AM'),
(14, 'The Cheesecake Factory', '45 mins', 6, 'Dubai', 'thecheesecakefactory.jpg', 4, '06 2940351', '8AM - 2AM'),
(15, 'Vanellis', '30 mins', 6, 'Sharjah', 'vanellis.jpg', 2, '06 3492863', '10AM-12AM'),
(16, 'Chili\'s', '45', 8, 'Fujairah', 'chilis.jpg', 4, '050 9823793', '11AM - 11PM'),
(17, 'Bait Al Mandi', '30 mins', 7, 'Ajman', 'baitalmandi.jpg', 4, '06 5532874', '10AM - 2AM'),
(18, 'Gazebo ', '20 mins', 6, 'Dubai', 'gazebo.jpg', 3, '06 8712984', '12PM - 12AM'),
(19, 'Turkish Village ', '35 mins', 5, 'Abu Dhabi ', 'turkishvillage.jpg', 4, '06 9875673', '7AM - 2AM'),
(20, 'Zaroob ', '25 mins', 5, 'Sharjah', 'zaroob.jpg', 3, '06 9127635', '7AM - 12AM'),
(21, 'Charley\'s Philly Steaks ', '30 mins', 6, 'Dubai ', 'charleys.jpg', 4, '050 5746838', '12PM - 10PM'),
(22, 'Abu Jbara ', '40 mins', 6, 'Dubai', 'abujbara.png', 4, '06 9846374', '7AM - 12AM'),
(23, 'Wendy\'s', '35 mins', 6, 'Fujairah ', 'wendys.jpg', 4, '06 2948561', '10AM - 2AM'),
(24, 'Al Fanar Restaurant ', '30 mins', 6, 'Sharjah ', 'alfanar.jpg', 4, '06 9847695', '10AM - 12AM');

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
('0507246145', 'final', 'test', 'finaltest@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0),
('0507016025', 'Houzayfa ', 'El Rifai', 'houzayfar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1);

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
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `user_email` (`user_email`,`user_address`,`order_id`),
  ADD KEY `user_address` (`user_address`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD UNIQUE KEY `order_id` (`order_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

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
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cart_item_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25442;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  ADD CONSTRAINT `cart_item_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_item_ibfk_3` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_address`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

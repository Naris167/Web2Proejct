-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 11:01 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobless_burger`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `item_id` int(11) NOT NULL,
  `item_type` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_rating` decimal(2,1) NOT NULL,
  `item_register` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`item_id`, `item_type`, `item_name`, `item_price`, `item_image`, `item_rating`, `item_register`) VALUES
(1, 'Breakfast', 'Bacon, Egg & Cheese Biscuit', 119, './assetsPHP/menu/[BREAKFAST] Bacon, Egg & Cheese Biscuit.png', 5, '2024-09-28 11:08:57'),
(2, 'Breakfast', 'Bacon, Egg & Cheese Griddles', 129, './assetsPHP/menu/[BREAKFAST] Bacon, Egg & Cheese Griddles.png', 5, '2024-09-28 11:08:57'),
(3, 'Breakfast', 'Chicken Biscuit', 69, './assetsPHP/menu/[BREAKFAST] Chicken Biscuit.png', 4.5, '2024-09-28 11:08:57'),
(4, 'Breakfast', 'Egg Muffin', 129, './assetsPHP/menu/[BREAKFAST] Egg Muffin.png', 4.5, '2024-09-28 11:08:57'),
(5, 'Breakfast', 'Fruit and Maple Oatmeal', 89, './assetsPHP/menu/[BREAKFAST] Fruit and Maple Oatmeal.png', 5, '2024-09-28 11:08:57'),
(6, 'Breakfast', 'Sausage Biscuit with Egg', 109, './assetsPHP/menu/[BREAKFAST] Sausage Biscuit with Egg.png', 4.5, '2024-09-28 11:08:57'),
(7, 'Breakfast', 'Sausage Griddles', 109, './assetsPHP/menu/[BREAKFAST] Sausage Griddles.png', 4, '2024-09-28 11:08:57'),
(8, 'Breakfast', 'Sausage Muffin with Egg', 119, './assetsPHP/menu/[BREAKFAST] Sausage Muffin with Egg.png', 4, '2024-09-28 11:08:57'),
(9, 'Burger', 'Cheeseburger', 49, './assetsPHP/menu/[BURGER] Cheeseburger.png', 3.5, '2024-09-28 11:08:57'),
(10, 'Burger', 'Crispy Chicken Burger', 59, './assetsPHP/menu/[BURGER] Crispy Chicken Burger.png', 5, '2024-09-28 11:08:57'),
(11, 'Burger', 'Deluxe Spicy Crispy Chicken Sandwich', 89, './assetsPHP/menu/[BURGER] Deluxe Spicy Crispy Chicken Sandwich.png', 4.5, '2024-09-28 11:08:57'),
(12, 'Burger', 'Double Cheeseburger', 79, './assetsPHP/menu/[BURGER] Double Cheeseburger.png', 4, '2024-09-28 11:08:57'),
(13, 'Burger', 'Double Quarter Pounder with Cheese', 189, './assetsPHP/menu/[BURGER] Double Quarter Pounder with Cheese.png', 4, '2024-09-28 11:08:57'),
(14, 'Burger', 'Filet-O-Fish', 149, './assetsPHP/menu/[BURGER] Filet-O-Fish.png', 4.5, '2024-09-28 11:08:57'),
(15, 'Burger', 'Quarter Pounder with Cheese', 139, './assetsPHP/menu/[BURGER] Quarter Pounder with Cheese.png', 5, '2024-09-28 11:08:57'),
(16, 'Burger', 'Real Beef Burger', 149, './assetsPHP/menu/[BURGER] Real Beef Burger.png', 5, '2024-09-28 11:08:57'),
(17, 'Burger', 'Spicy Chicken Burger', 59, './assetsPHP/menu/[BURGER] Spicy Chicken Burger.png', 4, '2024-09-28 11:08:57'),
(18, 'Dessert', 'Chocolate Chip Cookie', 29, './assetsPHP/menu/[DESSERT] Chocolate Chip Cookie.png', 3.5, '2024-09-28 11:08:57'),
(19, 'Dessert', 'Chocolate Ice cream', 19, './assetsPHP/menu/[DESSERT] Chocolate Ice cream.png', 4, '2024-09-28 11:08:57'),
(20, 'Dessert', 'Strawberry & Cream Pie', 39, './assetsPHP/menu/[DESSERT] Strawberry & Cream Pie.png', 4.5, '2024-09-28 11:08:57'),
(21, 'Dessert', 'Strawberry Ice cream', 19, './assetsPHP/menu/[DESSERT] Strawberry Ice cream.png', 4, '2024-09-28 11:08:57'),
(22, 'Drinks', 'Coffee', 29, './assetsPHP/menu/[DRINKS] Coffee.png', 3.5, '2024-09-28 11:08:57'),
(23, 'Drinks', 'Jobless Ice Tea', 19, './assetsPHP/menu/[DRINKS] Jobless Ice Tea.png', 5, '2024-09-28 11:08:57'),
(24, 'Drinks', 'Orange Juice', 25, './assetsPHP/menu/[DRINKS] Orange Juice.png', 4.5, '2024-09-28 11:08:57'),
(25, 'Drinks', 'Soft Drinks', 25, './assetsPHP/menu/[DRINKS] Soft Drinks.png', 4, '2024-09-28 11:08:57'),
(26, 'Salad', 'Caesar Salad with Crispy Chicken', 169, './assetsPHP/menu/[SALAD] Caesar Salad with Crispy Chicken.png', 5, '2024-09-28 11:08:57'),
(27, 'Salad', 'Caesar Salad with Grilled Chicken', 169, './assetsPHP/menu/[SALAD] Caesar Salad with Grilled Chicken.png', 4.5, '2024-09-28 11:08:57'),
(28, 'Salad', 'Side Salad', 79, './assetsPHP/menu/[SALAD] Side Salad.png', 4, '2024-09-28 11:08:57'),
(29, 'Side-dish', 'Chicken Nuggets', 189, './assetsPHP/menu/[SIDE-DISH] Chicken Nuggets.png', 4.5, '2024-09-28 11:08:57'),
(30, 'Side-dish', 'Fries', 49, './assetsPHP/menu/[SIDE-DISH] Fries.png', 4, '2024-09-28 11:08:57'),
(31, 'Side-dish', 'Hash Browns', 49, './assetsPHP/menu/[SIDE-DISH] Hash Browns.png', 4, '2024-09-28 11:08:57'),
(32, 'Side-dish', 'Mozzarella Sticks', 69, './assetsPHP/menu/[SIDE-DISH] Mozzarella Sticks.png', 5, '2024-09-28 11:08:57'),
(33, 'Side-dish', 'Onion Rings', 49, './assetsPHP/menu/[SIDE-DISH] Onion Rings.png', 4.5, '2024-09-28 11:08:57'),
(34, 'Side-dish', 'Spicy Nuggets', 189, './assetsPHP/menu/[SIDE-DISH] Spicy Nuggets.png', 5, '2024-09-28 11:08:57');



-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `register_date`) VALUES
(1, 'Akarawin', 'Somboon', '2024-09-30 16:08:57'),
(2, 'Kamolwit', 'Thangsupanich', '2024-09-30 16:08:57'),
(3, 'Naris', 'Pornjirawittayakul', '2024-09-30 16:08:57'),
(4, 'Rujiphas', 'Pakornmaneekul', '2024-09-30 16:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

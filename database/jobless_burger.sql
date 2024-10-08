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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `register_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password_hash`,`first_name`, `last_name`) VALUES
('2111240001@students.stamford.edu', '$2y$10$d/WGN6XmgwBuQWZOX1ZLHOsG52aQ.Tq.0R5Dje/qogkVBbfEJEfZe', 'Akarawin', 'Somboon'),
('2106150005@students.stamford.edu', '$2y$10$JLZbevcNMJ1D/XeJcnw1seaC3K9o/s2X645uZwhY5967NGY6b.kCy', 'Kamolwit', 'Thangsupanich'),
('2106010007@students.stamford.edu', '$2y$10$BdnBTuOxO75AyJDT6wJ4xunFstG3U53vtj17wIkQbIiDsNSKHJlGS', 'Naris', 'Pornjirawittayakul'),
('2207110046@students.stamford.edu', '$2y$10$bJsmw8C182ymNAs2o461sOeC1qt2vW.tuGqpvw7WhYckplUKs83G2', 'Rujiphas', 'Pakornmaneekul');
-- Win@2111240001
-- Jade@2106150005
-- Naris@2106010007
-- Saint@2207110046
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
  `item_register` datetime DEFAULT NULL,
  `is_top_sale` boolean DEFAULT FALSE,
  `is_new` boolean DEFAULT FALSE,
  `item_description` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`item_id`, `item_type`, `item_name`, `item_price`, `item_image`, `item_rating`, `item_register`, `is_top_sale`, `is_new`, `item_description`) VALUES
(1, 'Breakfast', 'Bacon, Egg & Cheese Biscuit', 119, './assetsPHP/menu/[BREAKFAST] Bacon, Egg & Cheese Biscuit.png', 5, '2024-09-28 11:08:57', FALSE, FALSE, "Introducing our Bacon, Egg & Cheese Biscuit - the perfect way to fuel your morning with deliciously balanced ingredients. Enjoy a crispy, golden biscuit, freshly baked to perfection, paired with savory strips of bacon, a fluffy, protein-rich egg, and a slice of melted cheese. This wholesome breakfast is packed with protein and satisfying flavors to keep you energized and full throughout the day. Whether you're on the go or taking a moment to savor every bite, our Bacon, Egg & Cheese Biscuit is a delicious, feel-good choice for a healthy start to your day."),
(2, 'Breakfast', 'Bacon, Egg & Cheese Griddles', 129, './assetsPHP/menu/[BREAKFAST] Bacon, Egg & Cheese Griddles.png', 5, '2024-09-28 11:08:57', TRUE, FALSE, "Our Bacon, Egg & Cheese Biscuit is a mouthwatering, wholesome breakfast crafted to satisfy your cravings while keeping it balanced. A fluffy, freshly baked biscuit holds together crispy bacon, a perfectly cooked, protein-packed egg, and melted cheese for a savory, comforting flavor. It's the ideal way to start your day with a filling, energizing meal that feels indulgent yet nourishing. Enjoy the perfect blend of flavors in every bite, making this a clean, satisfying choice to fuel your morning right!"),
(3, 'Breakfast', 'Chicken Biscuit', 69, './assetsPHP/menu/[BREAKFAST] Chicken Biscuit.png', 4.5, '2024-09-28 11:08:57', FALSE, TRUE, "Our Chicken Biscuit is a deliciously satisfying start to your day, combining a tender, juicy, all-white meat chicken filet with a freshly baked, golden biscuit. The perfect balance of crispy and soft textures, this hearty breakfast is high in protein and full of flavor, yet feels light and wholesome. It's the ultimate comfort food with a clean and simple twist, giving you the energy you need to tackle your day while keeping you full and nourished. A savory choice that feels as good as it tastes!"),
(4, 'Breakfast', 'Egg Muffin', 129, './assetsPHP/menu/[BREAKFAST] Egg Muffin.png', 4.5, '2024-09-28 11:08:57', FALSE, FALSE, "Our Egg Muffin is a simple yet delicious breakfast designed to give you a clean, healthy start to your day. Featuring a perfectly cooked, fluffy egg layered on a soft, whole-grain English muffin, this satisfying meal is light but packed with protein to keep you energized and full. With its warm, wholesome flavors and clean ingredients, the Egg Muffin is the perfect choice for a balanced, feel-good breakfast that fuels your morning without weighing you down."),
(5, 'Breakfast', 'Fruit and Maple Oatmeal', 89, './assetsPHP/menu/[BREAKFAST] Fruit and Maple Oatmeal.png', 5, '2024-09-28 11:08:57', FALSE, TRUE, "Our Fruit and Maple Oatmeal is a nourishing, heart-healthy breakfast that combines the natural goodness of whole-grain oats with a delightful mix of fresh apples, raisins, and dried cranberries. Lightly sweetened with a touch of pure maple syrup, it offers the perfect balance of fiber and sweetness to keep you feeling full and energized. This wholesome bowl is rich in nutrients and bursting with natural flavors, making it a clean, delicious choice for a refreshing, feel-good start to your day. Indulge in the warmth and comfort of oatmeal while staying true to your healthy lifestyle!"),
(6, 'Breakfast', 'Sausage Biscuit with Egg', 109, './assetsPHP/menu/[BREAKFAST] Sausage Biscuit with Egg.png', 4.5, '2024-09-28 11:08:57', FALSE, FALSE, "Our Sausage Biscuit with Egg is a hearty, protein-packed breakfast that's both satisfying and nourishing. A soft, freshly baked biscuit wraps around a savory sausage patty and a fluffy, perfectly cooked egg, delivering a balanced combination of flavors and textures. It's the ideal choice for a filling, feel-good breakfast that provides the energy you need to start your day strong. With simple, wholesome ingredients, this meal keeps you fueled without feeling heavy—perfect for those who want a delicious, clean start to their morning!"),
(7, 'Breakfast', 'Sausage Griddles', 109, './assetsPHP/menu/[BREAKFAST] Sausage Griddles.png', 4, '2024-09-28 11:08:57', FALSE, FALSE, "Our Sausage Griddles bring together the perfect blend of sweet and savory for a deliciously balanced breakfast. Featuring a savory sausage patty nestled between two soft, warm griddle cakes with a hint of maple syrup, this meal offers a satisfying mix of flavors in every bite. High in protein and full of comforting goodness, it's a hearty option that keeps you energized and satisfied throughout the morning. The sweet maple taste and savory sausage make it feel indulgent, yet it's a clean and simple choice for those craving a flavorful, wholesome start to the day."),
(8, 'Breakfast', 'Sausage Muffin with Egg', 119, './assetsPHP/menu/[BREAKFAST] Sausage Muffin with Egg.png', 4, '2024-09-28 11:08:57', FALSE, TRUE, "Our Sausage Muffin with Egg is a protein-packed breakfast sandwich designed to fuel your day with wholesome ingredients. A savory sausage patty and a fluffy, perfectly cooked egg are layered on a warm, toasted English muffin, offering a satisfying blend of textures and flavors. It's a clean and balanced meal that provides the energy you need to power through your morning, while keeping you full and focused. The perfect combination of hearty and light, this breakfast option is as delicious as it is nourishing!"),
(9, 'Burger', 'Cheeseburger', 49, './assetsPHP/menu/[BURGER] Cheeseburger.png', 3.5, '2024-09-28 11:08:57', FALSE, FALSE, "Our Cheeseburger is a classic, feel-good meal made with simple, quality ingredients. Featuring a juicy, perfectly seasoned beef patty topped with a slice of melted cheese, it's nestled in a soft, freshly toasted bun. The combination of savory flavors and satisfying textures makes this cheeseburger a delicious, hearty choice, while still feeling clean and balanced. Whether you're looking for a quick lunch or a fulfilling dinner, our Cheeseburger delivers the right mix of flavor and nourishment to keep you feeling satisfied and energized!"),
(10, 'Burger', 'Crispy Chicken Burger', 59, './assetsPHP/menu/[BURGER] Crispy Chicken Burger.png', 5, '2024-09-28 11:08:57', FALSE, TRUE, "Our Crispy Chicken Burger is a deliciously balanced meal that combines a perfectly crispy, tender chicken filet with a soft, toasted bun. Each bite delivers a satisfying crunch, with the juicy, all-white meat chicken providing a lean source of protein. Paired with fresh lettuce and a light spread of your favorite sauce, this burger feels both indulgent and clean, giving you a wholesome, flavorful option that leaves you feeling full and energized. It's the perfect choice for anyone looking for a tasty, crispy, and nourishing meal!"),
(11, 'Burger', 'Deluxe Spicy Crispy Chicken Sandwich', 89, './assetsPHP/menu/[BURGER] Deluxe Spicy Crispy Chicken Sandwich.png', 4.5, '2024-09-28 11:08:57', TRUE, FALSE, "Our Deluxe Spicy Crispy Chicken Sandwich takes your favorite spicy chicken to the next level with a perfect blend of heat, freshness, and flavor. A crispy, tender, all-white meat chicken filet, seasoned with a bold kick of spice, is layered with fresh lettuce, ripe tomatoes, and creamy mayo, all nestled in a soft, toasted bun. Each bite delivers a satisfying crunch with a burst of flavor, providing a well-balanced, protein-packed meal that feels indulgent yet clean. It's the ultimate choice for those who crave a spicy, flavorful, and nourishing sandwich that keeps you full and energized!"),
(12, 'Burger', 'Double Cheeseburger', 79, './assetsPHP/menu/[BURGER] Double Cheeseburger.png', 4, '2024-09-28 11:08:57', FALSE, TRUE, "Our Double Cheeseburger is a satisfying, flavor-packed meal for those who crave more. With two juicy, perfectly seasoned beef patties, each topped with melted cheese, this burger offers a delicious balance of savory goodness and indulgence. Nestled in a soft, freshly toasted bun, it's a hearty choice that's rich in protein and flavor, but still feels clean and fulfilling. Whether you're extra hungry or just in the mood for something more, the Double Cheeseburger is designed to keep you full and energized, making it the perfect go-to for a wholesome, delicious meal."),
(13, 'Burger', 'Double Quarter Pounder with Cheese', 189, './assetsPHP/menu/[BURGER] Double Quarter Pounder with Cheese.png', 4, '2024-09-28 11:08:57', TRUE, TRUE, "Our Double Quarter Pounder with Cheese is a hearty, protein-packed meal crafted for those with a big appetite. Featuring two juicy, quarter-pound 100% beef patties, each topped with melted cheese, this burger is a satisfying blend of rich, savory flavors. Served on a warm, toasted bun and layered with fresh onions, pickles, ketchup, and mustard, it's a bold, flavorful experience that fuels your day. Despite its indulgent taste, this burger offers a clean and balanced meal with the perfect combination of protein and flavor to keep you energized and satisfied."),
(14, 'Burger', 'Filet-O-Fish', 149, './assetsPHP/menu/[BURGER] Filet-O-Fish.png', 4.5, '2024-09-28 11:08:57', FALSE, FALSE, "Our Filet-O-Fish is a light and flavorful option that's perfect for seafood lovers. Featuring a tender, wild-caught fish filet, lightly breaded and topped with creamy tartar sauce and a slice of melted cheese, it's served on a soft, steamed bun for a deliciously satisfying bite. This balanced sandwich is rich in protein while offering a clean, wholesome flavor, making it a feel-good choice for lunch or dinner. Whether you're looking for something lighter or simply love the fresh taste of fish, the Filet-O-Fish is a refreshing, nourishing option that leaves you feeling full and energized!"),
(15, 'Burger', 'Quarter Pounder with Cheese', 139, './assetsPHP/menu/[BURGER] Quarter Pounder with Cheese.png', 5, '2024-09-28 11:08:57', TRUE, FALSE, "Our Quarter Pounder with Cheese is a classic, satisfying choice that balances bold flavor with wholesome ingredients. Featuring a juicy, quarter-pound 100% beef patty, perfectly seasoned and topped with a slice of melted cheese, this burger delivers savory goodness in every bite. Served on a soft, toasted bun with crisp onions, tangy pickles, ketchup, and mustard, it's a delicious, protein-packed meal that keeps you energized and satisfied. Whether for lunch or dinner, the Quarter Pounder with Cheese is a flavorful yet clean option to fuel your day."),
(16, 'Burger', 'Real Beef Burger', 149, './assetsPHP/menu/[BURGER] Real Beef Burger.png', 5, '2024-09-28 11:08:57', TRUE, FALSE, "Our Real Beef Burger is a simple yet delicious classic, made with 100% real beef for an authentic, clean taste. The juicy, perfectly seasoned beef patty is grilled to perfection and served on a soft, toasted bun, allowing the natural flavors to shine through. Topped with fresh lettuce, tomatoes, onions, and your choice of sauce, this burger offers a wholesome and satisfying experience. It's a no-frills, high-protein meal that feels light yet filling, perfect for those who crave a pure, flavorful burger made from real, quality ingredients."),
(17, 'Burger', 'Spicy Chicken Burger', 59, './assetsPHP/menu/[BURGER] Spicy Chicken Burger.png', 4, '2024-09-28 11:08:57', FALSE, TRUE, "Our Spicy Chicken Burger is the perfect blend of heat and flavor, crafted for those who love a little kick in their meal. Featuring a tender, crispy chicken filet seasoned with just the right amount of spice, this burger is layered on a soft, toasted bun for a satisfying crunch in every bite. The bold flavors are balanced with fresh lettuce and a touch of sauce, offering a clean and energizing meal that's high in protein. For a spicy twist on a classic favorite, this burger delivers a deliciously fiery yet wholesome option to keep you full and fueled!"),
(18, 'Dessert', 'Chocolate Chip Cookie', 29, './assetsPHP/menu/[DESSERT] Chocolate Chip Cookie.png', 3.5, '2024-09-28 11:08:57', FALSE, TRUE, "Our Chocolate Chip Cookie is a sweet, indulgent treat made with simple, high-quality ingredients. Each cookie is baked to golden perfection, featuring a soft, chewy texture and loaded with rich, melty chocolate chips. Whether you're enjoying it as a quick snack or pairing it with your meal, this cookie provides the perfect balance of sweetness and comfort. It's a delightful, feel-good dessert that satisfies your sweet tooth without feeling too heavy—a timeless classic you can enjoy any time of day!"),
(19, 'Dessert', 'Chocolate Ice cream', 19, './assetsPHP/menu/[DESSERT] Chocolate Ice cream.png', 4, '2024-09-28 11:08:57', FALSE, FALSE, "Our Chocolate Ice Cream is a creamy, indulgent treat that delivers rich, velvety chocolate flavor in every spoonful. Made with high-quality ingredients, this smooth and refreshing ice cream offers the perfect balance of sweetness and chocolatey goodness. Whether enjoyed on its own, paired with a dessert, or topped with your favorite add-ons, it's a feel-good indulgence that satisfies your cravings without feeling overly heavy. Treat yourself to the classic taste of pure chocolate delight in every bite!"),
(20, 'Dessert', 'Strawberry & Cream Pie', 39, './assetsPHP/menu/[DESSERT] Strawberry & Cream Pie.png', 4.5, '2024-09-28 11:08:57', FALSE, TRUE, "Our Strawberry & Cream Pie is a delightful blend of sweet, fruity goodness and creamy indulgence, wrapped in a golden, flaky crust. Inside, you'll find a luscious filling of real strawberries paired with smooth, rich cream, creating the perfect balance of tart and sweet flavors. Baked to perfection, this warm, comforting dessert is a light yet satisfying treat that feels both indulgent and wholesome. Whether you're enjoying it on the go or as a dessert after a meal, the Strawberry & Cream Pie is a delicious, feel-good way to satisfy your sweet tooth!"),
(21, 'Dessert', 'Strawberry Ice cream', 19, './assetsPHP/menu/[DESSERT] Strawberry Ice cream.png', 4, '2024-09-28 11:08:57', FALSE, FALSE, "Our Strawberry Ice Cream is a refreshing and creamy treat that brings the sweet, natural flavor of ripe strawberries to every bite. Made with real strawberries, this velvety ice cream offers the perfect balance of fruity sweetness and smooth texture, creating a light yet indulgent dessert experience. Whether enjoyed on its own or paired with your favorite toppings, it's a wholesome and delicious way to satisfy your cravings for something sweet, cool, and refreshing. Treat yourself to the fresh taste of summer with every spoonful!"),
(22, 'Drinks', 'Coffee', 29, './assetsPHP/menu/[DRINKS] Coffee.png', 3.5, '2024-09-28 11:08:57', FALSE, FALSE, "Our Coffee is a rich and smooth brew, crafted from high-quality beans to deliver the perfect balance of bold flavor and smooth texture. Whether you enjoy it black or with cream and sugar, each cup offers a refreshing, energizing boost to kickstart your day or keep you going strong. With its robust taste and clean finish, our coffee is the ideal companion for any meal or a quick pick-me-up when you need it. It's the perfect way to enjoy a simple yet satisfying drink that feels both comforting and invigorating!"),
(23, 'Drinks', 'Jobless Ice Tea', 19, './assetsPHP/menu/[DRINKS] Jobless Ice Tea.png', 5, '2024-09-28 11:08:57', TRUE, FALSE, "Our Iced Tea is a refreshing, naturally brewed beverage, perfect for quenching your thirst and revitalizing your day. Served ice-cold, it offers a crisp, clean taste with just the right balance of flavor, making it a light and refreshing choice. Whether you prefer it unsweetened or with a hint of sweetness, our iced tea is the ideal drink for staying cool and refreshed without any heaviness. It's the perfect companion for any meal or a stand-alone sip when you need a refreshing break!"),
(24, 'Drinks', 'Orange Juice', 25, './assetsPHP/menu/[DRINKS] Orange Juice.png', 4.5, '2024-09-28 11:08:57', FALSE, TRUE, "Our Orange Juice is a refreshing and vibrant beverage made from 100% real, freshly squeezed oranges. Packed with natural sweetness and loaded with vitamin C, this juice delivers a clean, energizing boost to start your day or complement any meal. Each sip offers the pure, tangy flavor of ripe oranges, providing a refreshing and wholesome drink that feels light yet nourishing. It's the perfect way to enjoy a burst of sunshine in a glass, keeping you hydrated and revitalized!"),
(25, 'Drinks', 'Soft Drinks', 25, './assetsPHP/menu/[DRINKS] Soft Drinks.png', 4, '2024-09-28 11:08:57', FALSE, FALSE, "Our Soft Drinks offer a bubbly and refreshing way to quench your thirst, available in a variety of classic flavors to suit any taste. Whether you prefer the crisp and clean taste of cola, the citrusy zing of lemon-lime, or the sweetness of other fizzy favorites, each sip delivers a satisfying, effervescent experience. Perfectly chilled and full of flavor, our soft drinks make a great pairing for any meal or a quick, refreshing break whenever you need it. Enjoy the simple pleasure of a cool, fizzy beverage that's always refreshing!"),
(26, 'Salad', 'Caesar Salad with Crispy Chicken', 169, './assetsPHP/menu/[SALAD] Caesar Salad with Crispy Chicken.png', 5, '2024-09-28 11:08:57', TRUE, FALSE, "Our Caesar Salad with Crispy Chicken is a deliciously balanced mix of fresh and savory ingredients, perfect for a light yet satisfying meal. Crisp romaine lettuce is tossed with creamy Caesar dressing, crunchy croutons, and a sprinkle of Parmesan cheese, providing a refreshing base. Topped with perfectly seasoned, crispy chicken strips, this salad offers a satisfying crunch and protein boost, making it both nourishing and flavorful. It's the ideal choice for those seeking a wholesome, energizing meal that feels indulgent without being heavy—a fresh take on a classic favorite!"),
(27, 'Salad', 'Caesar Salad with Grilled Chicken', 169, './assetsPHP/menu/[SALAD] Caesar Salad with Grilled Chicken.png', 4.5, '2024-09-28 11:08:57', FALSE, TRUE, "Our Caesar Salad with Grilled Chicken is a wholesome, protein-packed option that combines fresh ingredients with bold, savory flavors. Crisp romaine lettuce is tossed in a creamy Caesar dressing, with crunchy croutons and a sprinkle of Parmesan cheese for that classic Caesar taste. Topped with tender, perfectly grilled chicken, this salad offers a lean, flavorful protein boost while remaining light and refreshing. It's a clean, satisfying meal that provides the perfect balance of taste and nutrition, ideal for those seeking a delicious, energizing option that leaves you feeling full and nourished!"),
(28, 'Salad', 'Side Salad', 79, './assetsPHP/menu/[SALAD] Side Salad.png', 4, '2024-09-28 11:08:57', FALSE, FALSE, "Our Side Salad is a light and refreshing mix of crisp, fresh greens, topped with juicy tomatoes, crunchy cucumbers, and a sprinkle of shredded carrots. It's the perfect complement to any meal, offering a clean and wholesome option that's both simple and satisfying. Whether you enjoy it with your favorite dressing or on its own, this salad is packed with vibrant flavors and nutrients, providing a refreshing, feel-good addition to your meal without being too heavy. Perfect for when you want a light and healthy boost!"),
(29, 'Snacks', 'Chicken Nuggets', 189, './assetsPHP/menu/[SNACKS] Chicken Nuggets.png', 4.5, '2024-09-28 11:08:57', TRUE, FALSE, "Our Chicken Nuggets are a bite-sized, crispy delight, perfect for a quick, satisfying meal or snack. Made with tender, all-white meat chicken, each nugget is lightly breaded and cooked to golden perfection, offering a deliciously crispy outside and juicy inside. Packed with protein and full of flavor, they're a clean and convenient option for when you need something filling without the fuss. Enjoy them on their own or paired with your favorite dipping sauce for a fun, wholesome, and flavorful treat that's perfect any time of day!"),
(30, 'Snacks', 'Fries', 49, './assetsPHP/menu/[SNACKS] Fries.png', 4, '2024-09-28 11:08:57', FALSE, FALSE, "Our Fries are golden, crispy perfection—lightly salted and freshly cooked to deliver a satisfying crunch in every bite. Soft and fluffy on the inside, these fries are the perfect balance of texture and flavor, making them an ideal side to any meal or a tasty snack on their own. Whether you enjoy them with ketchup, your favorite dipping sauce, or just as they are, our fries are a delicious, feel-good treat that leaves you feeling satisfied and energized!"),
(31, 'Snacks', 'Hash Browns', 49, './assetsPHP/menu/[SNACKS] Hash Browns.png', 4, '2024-09-28 11:08:57', FALSE, FALSE, "Our Hash Browns are crispy, golden, and perfectly seasoned to provide a satisfying start to your day. Made from shredded potatoes, they are cooked to a delightful crunch on the outside while remaining soft and tender inside. Whether enjoyed as a breakfast side or a quick snack, these hash browns offer the perfect blend of texture and flavor. Light yet filling, they're a clean, simple choice that adds a tasty, energizing boost to your meal!"),
(32, 'Snacks', 'Mozzarella Sticks', 69, './assetsPHP/menu/[SNACKS] Mozzarella Sticks.png', 5, '2024-09-28 11:08:57', TRUE, FALSE, "Our Mozzarella Sticks are a cheesy, crispy delight perfect for snack time or as a flavorful side. Each stick features gooey, melted mozzarella cheese coated in a crunchy, golden breading, creating the ideal balance of textures. Served hot and ready to dip into your favorite marinara or sauce, these mozzarella sticks are a satisfying treat that feels indulgent yet light. Whether enjoyed on their own or alongside a meal, they're a delicious and fun way to satisfy your cravings for something savory and cheesy!"),
(33, 'Snacks', 'Onion Rings', 49, './assetsPHP/menu/[SNACKS] Onion Rings.png', 4.5, '2024-09-28 11:08:57', FALSE, TRUE, "Our Onion Rings are a crispy, flavorful treat that's perfect as a side or snack. Each ring features thick-cut onions, lightly battered and fried to golden perfection, offering a satisfying crunch with a tender, sweet onion center. With their irresistible texture and savory flavor, they make a delicious addition to any meal or a stand-alone snack. Enjoy them on their own or paired with your favorite dipping sauce for a satisfying and flavorful experience that hits the spot every time!"),
(34, 'Snacks', 'Spicy Nuggets', 189, './assetsPHP/menu/[SNACKS] Spicy Nuggets.png', 5, '2024-09-28 11:08:57', FALSE, TRUE, "Our Spicy Nuggets are a bold twist on a classic favorite, perfect for those who crave a little heat. Made with tender, all-white meat chicken, each nugget is seasoned with a blend of spices and lightly breaded for a crispy, fiery kick in every bite. The balance of spice and crunch makes them both satisfying and exciting, whether you enjoy them on their own or with your favorite dipping sauce. Packed with flavor and protein, these spicy nuggets are a fun, energizing option that brings the heat without overwhelming your palate!");

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_amount` int(11) NOT NULL,
  `item_variant` varchar(100) NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`),
  FOREIGN KEY (`item_id`) REFERENCES `menu`(`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------


--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
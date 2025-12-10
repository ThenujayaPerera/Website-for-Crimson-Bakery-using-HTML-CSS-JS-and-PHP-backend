-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2025 at 04:21 PM
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
-- Database: `crimson_bakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `PASSWORD`, `name`, `address`, `role`) VALUES
(1027, 'nisal@email.com', '827ccb0eea8a706c4c34a16891f84e7b', 'nimal', '234 molog', 'Manager'),
(1028, 'sadun@email.com', '827ccb0eea8a706c4c34a16891f84e7b', 'sadun', '210/A malabe', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`, `quantity`, `added_at`) VALUES
(3, 1, 3, 1, '2025-10-06 14:09:37'),
(4, 1, 17, 1, '2025-10-06 14:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `shop_items`
--

CREATE TABLE `shop_items` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stock` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shop_items`
--

INSERT INTO `shop_items` (`id`, `category`, `item_name`, `price`, `image_path`, `description`, `stock`) VALUES
(1, 'Pastries', 'Burger', 450.00, 'pastrieashop6.png', 'Our classic burger is made from 100% fresh beef patty, cooked to perfection and served with crisp lettuce, ripe tomatoes, sliced onions, and a special house-made sauce. The bun is freshly baked daily, lightly toasted for the perfect crunch. Ingredients include beef, flour, yeast, butter, lettuce, tomato, onion, cheese, pickles, ketchup, mustard, and a blend of secret spices. Each burger is crafted to ensure balanced flavors and a delightful texture. Perfect for lunch or dinner, it combines savory and fresh elements, making it a favorite among pastry and snack lovers. Enjoy the warmth of freshly cooked patty with soft, golden buns and melt-in-your-mouth cheese that elevates the classic burger experience. This item is ideal for those who love traditional fast food made with premium ingredients. Every bite delivers a perfect balance of softness, juiciness, and tangy flavor, leaving a satisfying and memorable taste in the mouth.', 50),
(2, 'Pastries', 'Hotdog', 300.00, 'hotdogdshop.png', 'Our signature hotdog features a plump, juicy sausage encased in a soft, freshly baked bun. Topped with tangy mustard, sweet ketchup, crunchy onions, and fresh pickles, this hotdog delivers a burst of flavor in every bite. Ingredients include pork sausage, wheat flour, yeast, butter, onions, pickles, mustard, ketchup, and spices. Each element is carefully selected to complement the others, ensuring a harmonious blend of textures and tastes. Ideal as a quick snack or a light meal, the hotdog is prepared fresh daily, with buns baked on-site and sausages sourced from trusted local suppliers. The combination of soft bread and perfectly seasoned sausage makes this an irresistible choice for any casual dining occasion. Perfect for children and adults, it provides a savory, comforting experience.', 60),
(3, 'Pastries', 'Chicken-Pie', 500.00, 'pastriiesshop6.png', 'Our Chicken Pie is a delightful pastry filled with tender, juicy chicken chunks cooked in a rich, creamy sauce. The crust is buttery, flaky, and golden brown, baked to perfection. Ingredients include chicken breast, puff pastry (flour, butter, salt, water), onions, garlic, cream, butter, flour for thickening, carrots, peas, salt, pepper, and aromatic herbs. Each pie is handcrafted to ensure consistency in flavor and texture. The creamy chicken filling is seasoned with a mixture of spices and herbs, providing a comforting taste reminiscent of homemade cuisine. Perfect as a hearty snack or part of a meal, our chicken pie offers a blend of savory flavors encased in a delicate, melt-in-your-mouth crust. Ideal for both children and adults, it delivers a rich and satisfying experience with every bite. Enjoy with a side of fresh salad for a balanced meal.', 40),
(4, 'Pastries', 'Submarine', 600.00, 'pastriesshop1.png', 'Our Submarine sandwich features layers of freshly sliced meats, crisp lettuce, juicy tomatoes, and a variety of cheeses, all stacked in a soft, freshly baked baguette. Ingredients include wheat flour, yeast, butter, ham, turkey, roast beef, cheddar cheese, mozzarella, lettuce, tomato, pickles, mayonnaise, mustard, and spices. Each submarine is crafted to balance the flavors of meats, cheeses, and vegetables, making it a fulfilling and tasty meal. Ideal for lunch or dinner, it can be enjoyed as a wholesome, protein-rich option for those seeking a hearty sandwich experience. The bread is baked fresh daily, providing a perfect base that holds all ingredients without becoming soggy. Our submarine is perfect for gatherings, picnics, or a satisfying solo meal, offering a combination of textures and flavors that delight the palate.', 30),
(5, 'Pastries', 'Chicken-Rolls', 550.00, 'pastriesshop5.png', 'Our Chicken Rolls are savory pastries filled with tender chicken, sautéed onions, bell peppers, and a mix of spices, all wrapped in a flaky, golden-brown pastry. Ingredients include chicken, puff pastry (flour, butter, salt, water), onions, bell peppers, garlic, tomato paste, olive oil, salt, pepper, and a blend of herbs and spices. Each roll is baked fresh daily to ensure crispiness and rich flavor. Perfect as a snack or appetizer, these chicken rolls combine tender meat with aromatic spices, delivering a flavorful experience in every bite. Ideal for parties, lunchboxes, or a quick bite, providing a balanced combination of protein and delicious pastry crust. The aromatic filling and crisp pastry make these rolls an irresistible choice for anyone who enjoys freshly baked savory items.', 45),
(6, 'Pastries', 'Chees Bun', 250.00, 'pastriessshop.png', 'Our Cheese Bun is a soft, golden-brown bun stuffed with a generous amount of melted cheese that oozes with every bite. Ingredients include wheat flour, yeast, butter, milk, cheese, eggs, salt, and a hint of sugar. Each bun is baked fresh daily to achieve a soft, fluffy interior with a slightly crispy exterior. The cheese filling is creamy and rich, perfectly complementing the delicate bun. Ideal as a breakfast item, snack, or accompaniment to tea or coffee, our cheese bun satisfies both kids and adults with its comforting taste and texture. The buns are handmade with care, ensuring consistent quality and flavor in every batch. They offer a perfect balance of soft bread and cheesy goodness, making them a favorite among pastry lovers.', 70),
(7, 'Cakes', 'Chocolate Cake', 2000.00, 'cakeshop (1).png', 'Our Chocolate Cake is a moist and rich dessert crafted with premium cocoa, fresh eggs, sugar, butter, and flour. Ingredients include cocoa powder, flour, eggs, sugar, butter, baking powder, milk, and a hint of vanilla extract. Each layer is carefully baked to retain fluffiness and layered with smooth chocolate ganache. Ideal for birthdays, celebrations, or as a decadent treat, this cake delivers intense chocolate flavor with a tender crumb. The ganache adds a creamy, luxurious texture, perfectly complementing the sponge layers. Finished with chocolate shavings and a glossy topping, it provides both visual appeal and indulgent taste. Every bite melts in the mouth, satisfying chocolate lovers of all ages. The cake is suitable for parties and family gatherings, providing a premium dessert experience made from high-quality ingredients.', 20),
(8, 'Cakes', 'Pinapple Cake', 2200.00, 'cakeshop (2).png', 'Our Pineapple Cake combines soft, moist sponge with a sweet, tangy pineapple filling, baked to perfection. Ingredients include wheat flour, eggs, sugar, butter, pineapple chunks, pineapple juice, baking powder, and cream. Each layer is carefully prepared to ensure even sweetness and fluffy texture. The pineapple topping adds a burst of tropical flavor, balancing the rich sponge layers. Ideal for birthdays, festive events, or afternoon treats, this cake delivers a refreshing fruity taste that melts in your mouth. Garnished with thin slices of pineapple and a light glaze, it is visually appealing and delicious. Perfect for pineapple lovers, it is made from fresh, high-quality fruits and premium ingredients. Every slice offers a combination of sweet, tangy, and creamy flavors.', 15),
(9, 'Cakes', 'Orange Cake', 2400.00, 'cakeshop (3).png', 'Our Orange Cake is a zesty and moist dessert made with fresh orange juice, zest, eggs, sugar, flour, butter, and a hint of vanilla. Ingredients include fresh oranges, wheat flour, sugar, butter, eggs, baking powder, and cream. The sponge is light and airy, layered with orange cream frosting that enhances citrus flavor. Ideal for festive events, birthdays, or as an afternoon treat, it delivers a refreshing fruity taste in every bite. The cake is garnished with candied orange slices and powdered sugar for visual appeal. Perfect for citrus lovers, it combines sweet, tangy, and creamy elements. Each slice is carefully baked to maintain perfect texture and flavor balance. The cake is suitable for all occasions and promises a delightful sensory experience.', 18),
(10, 'Cakes', 'Strawberry Cake', 2600.00, 'cakeshop (4).png', 'Our Strawberry Cake is a layered dessert made with fresh strawberries, soft sponge, and creamy strawberry frosting. Ingredients include wheat flour, eggs, sugar, butter, fresh strawberries, cream, baking powder, and vanilla extract. Each layer is baked to perfection and assembled with a generous amount of fresh strawberry puree and whipped cream. Ideal for birthdays, celebrations, or afternoon tea, it delivers a sweet and fruity taste with a smooth texture. Garnished with fresh strawberries and a light glaze, the cake is visually appealing. Perfect for strawberry lovers, it combines freshness, sweetness, and creaminess. Each slice provides a delightful taste, ideal for sharing with family and friends during special occasions.', 12),
(11, 'Cakes', 'Cherry Cake', 2500.00, 'cakeshop (5).png', 'Our Cherry Cake is a decadent dessert with layers of soft sponge and cherry compote, topped with cherry glaze. Ingredients include wheat flour, eggs, sugar, butter, cherries, cream, and baking powder. Each layer is carefully baked and filled with a rich cherry mixture. Ideal for celebrations, it provides a balance of sweetness and tartness with a tender crumb. Finished with whole cherries and light glaze, it is both visually appealing and delicious. Perfect for cherry lovers and dessert enthusiasts, it offers a luxurious treat for birthdays and special occasions, made with premium ingredients.', 10),
(12, 'Cakes', 'Mango Cake', 2500.00, 'cakeshop (6).png', 'Our Mango Cake is a tropical delight featuring soft sponge layered with fresh mango puree and whipped cream. Ingredients include wheat flour, eggs, sugar, butter, fresh mango, cream, and baking powder. Each layer is carefully baked and combined with smooth mango filling. Ideal for summer celebrations or festive events, it delivers a refreshing fruity taste. Garnished with mango slices, it provides a visually stunning and flavorful dessert. Perfect for mango lovers, it balances sweetness, freshness, and creaminess. Each slice offers a tropical, indulgent experience for all occasions.', 14),
(13, 'Coffee', 'Espresso', 450.00, 'coffeshop (1).png', 'Our Espresso is a rich, full-bodied coffee made from finely ground premium coffee beans, freshly brewed under high pressure. Ingredients include Arabica coffee beans and water. It delivers a strong, bold flavor with a creamy crema on top, perfect for coffee enthusiasts who appreciate intense aroma and taste. Ideal for morning energy boost or afternoon refreshment. Served in a small cup, it provides a concentrated coffee experience that highlights the nuances of freshly roasted beans. Our espresso is perfect on its own or as a base for various coffee beverages like latte, cappuccino, or mocha. Each cup ensures consistency in taste and aroma, crafted to satisfy discerning coffee lovers.', 100),
(14, 'Coffee', 'Americano', 400.00, 'coffeshop (2).png', 'Our Americano is a smooth and flavorful coffee beverage made by diluting rich espresso with hot water. Ingredients include freshly brewed espresso and filtered water. The resulting drink has a mild yet aromatic flavor, maintaining the espresso’s depth without overwhelming bitterness. Ideal for those who enjoy a lighter coffee experience, it can be enjoyed black or with milk and sugar. Perfect for breakfast, office breaks, or casual afternoons, it provides a balanced coffee taste. Each cup is brewed fresh, ensuring high-quality aroma and flavor consistency. The Americano is a classic choice for coffee lovers seeking a refined, straightforward coffee experience.', 90),
(15, 'Coffee', 'Latte (Caffè Latte)', 500.00, 'coffeshop (3).png', 'Our Latte is a creamy coffee beverage made with freshly brewed espresso and steamed milk. Ingredients include Arabica coffee beans, milk, and a small amount of sugar if desired. It features a delicate balance of espresso’s boldness and milk’s creaminess, often topped with a thin layer of froth. Ideal for breakfast, afternoon breaks, or relaxing moments, it provides a smooth and comforting coffee experience. Can be served plain or with flavorings like vanilla or caramel. Each latte is freshly prepared to ensure consistency in taste and temperature. Perfect for coffee enthusiasts who enjoy creamy and aromatic beverages.', 80),
(16, 'Coffee', 'Cappuccino', 600.00, 'coffeshop (4).png', 'Our Cappuccino is a classic Italian coffee beverage combining equal parts of espresso, steamed milk, and milk foam. Ingredients include espresso made from Arabica coffee beans and fresh milk. The frothy top adds a silky texture, while the espresso provides a rich, aromatic base. Ideal for breakfast or afternoon indulgence, it delivers a well-balanced coffee experience with each sip. Can be garnished with cocoa powder or cinnamon for extra flavor. Perfect for coffee lovers seeking traditional taste and creamy consistency. Each cup is freshly prepared to maintain high quality and flavor.', 75),
(17, 'Coffee', 'Mocha (Caffè Mocha)', 700.00, 'coffeshop (5).png', 'Our Mocha is a luxurious coffee beverage blending rich espresso, steamed milk, and premium chocolate syrup. Ingredients include espresso, milk, sugar, and high-quality cocoa or chocolate. Topped with whipped cream and chocolate shavings, it provides a perfect combination of coffee bitterness and chocolate sweetness. Ideal for dessert coffee lovers or special treats, it delivers indulgence in every sip. Suitable for breakfast or evening delight, it combines warmth, aroma, and chocolate flavor. Each cup is freshly prepared to ensure consistency in taste, temperature, and texture.', 60),
(18, 'Coffee', 'Flat White', 800.00, 'coffeshop (6).png', 'Our Flat White is a smooth and velvety coffee made with espresso and micro-foamed milk. Ingredients include freshly brewed espresso and steamed milk with fine microfoam. It delivers a balanced coffee taste with creamy texture, highlighting the espresso’s flavor without overpowering bitterness. Ideal for coffee enthusiasts seeking a sophisticated and smooth beverage. Served in small cups, it maintains warmth and aroma. Perfect for breakfast, brunch, or afternoon coffee breaks, providing a consistent, high-quality experience.', 50),
(19, 'Bread', 'Sourdough Bread', 450.00, 'breadshop (1).png', 'Our Sourdough Bread is a traditional, naturally leavened bread with a crispy crust and chewy interior. Ingredients include wheat flour, water, salt, and natural sourdough starter. Baked slowly to develop complex flavor and texture, it provides a tangy taste and hearty structure. Ideal for sandwiches, toasts, or as a side with soups and salads. Each loaf is handcrafted to ensure consistency, flavor, and freshness. Perfect for bread lovers who enjoy artisanal baked goods.', 40),
(20, 'Bread', 'Sandwich', 500.00, 'breadshop.png', 'Our freshly made Sandwich combines soft bread slices with layers of protein, vegetables, and sauces. Ingredients include wheat bread, cheese, lettuce, tomatoes, cucumber, mayonnaise, mustard, and choice of meats like chicken or ham. Each sandwich is carefully assembled to maintain freshness and balance of flavors. Ideal for lunch, quick meals, or snacks. Perfect for a healthy and convenient meal option.', 35),
(21, 'Bread', 'Baguette', 600.00, 'breadshop (3).png', 'Our Baguette is a classic French bread with a golden, crispy crust and soft, airy interior. Ingredients include wheat flour, yeast, salt, and water. Perfect for sandwiches or to accompany soups and cheese platters. Each baguette is baked fresh daily for optimal texture and flavor.', 25),
(22, 'Bread', 'Ciabatta', 700.00, 'breadshop (2).png', 'Our Ciabatta Bread is an Italian white bread with a crispy crust and soft interior. Ingredients include wheat flour, yeast, salt, water, and olive oil. Ideal for sandwiches or as a side. Freshly baked to ensure flavor and texture.', 30),
(23, 'Bread', 'Garlic Bread', 800.00, 'breadshop (4).png', 'Our Garlic Bread is a warm, fragrant bread baked with garlic butter and herbs. Ingredients include wheat bread, butter, garlic, parsley, salt, and olive oil. Perfect as a side dish or appetizer. Served hot for maximum aroma and flavor.', 20),
(24, 'Bread', 'Whole Wheat Loaf', 900.00, 'breadshop (5).png', 'Our Whole Wheat Loaf is a nutritious, hearty bread made from 100% whole wheat flour. Ingredients include whole wheat flour, yeast, water, salt, and sugar. Ideal for healthy sandwiches or breakfast toasts. Each loaf is baked fresh, providing rich fiber and flavor.', 15),
(25, 'Others', 'Mojito', 450.00, 'others.png', 'Our Mojito is a refreshing beverage made with fresh mint leaves, lime juice, sugar, soda water, and ice. Ingredients include fresh mint, lime, sugar, soda water, and optional rum. Served chilled, it provides a cool and invigorating drink, perfect for hot days or casual gatherings. Ideal for parties or relaxation, offering a balanced combination of sweetness, acidity, and mint aroma.', 50),
(26, 'Others', 'Nescafe', 300.00, 'others1.png', 'Our Nescafe is a classic instant coffee beverage made with premium Nescafe coffee granules. Ingredients include instant coffee granules, hot water, and optional sugar or milk. Quick and convenient, it provides a rich coffee flavor and aroma. Ideal for mornings or afternoon breaks, it delivers a smooth, energizing coffee experience. Perfect for busy individuals seeking quality coffee without long preparation time. Served hot, it is both comforting and invigorating, maintaining consistency in taste and aroma.', 100),
(27, 'Others', 'Lava Cake', 500.00, 'others2.png', 'Our Lava Cake is a decadent dessert with a molten chocolate center. Ingredients include chocolate, butter, sugar, eggs, flour, and cocoa powder. Baked just enough to allow the center to remain soft and flowing, it delivers rich, indulgent flavor. Ideal for dessert lovers, it can be paired with ice cream or whipped cream. Each cake is baked fresh, ensuring a warm, gooey center with a slightly crisp exterior. Perfect for celebrations or indulgent treats. The combination of textures and intense chocolate flavor makes it irresistible.', 25),
(28, 'Others', 'Macaron', 600.00, 'others3.png', 'Our Macarons are delicate French pastries made with almond flour, sugar, egg whites, and food coloring. Ingredients include almond flour, powdered sugar, egg whites, granulated sugar, buttercream or ganache filling. Each macaron is baked to perfection, with a crisp shell and chewy interior, filled with smooth, flavored cream. Ideal for gifting, tea time, or celebrations. Perfect for dessert lovers seeking colorful and flavorful treats. Made with precision and high-quality ingredients, they deliver elegance and taste in every bite.', 40),
(29, 'Others', 'Muffin', 550.00, 'others5.png', 'Our Muffins are soft, moist baked treats made with flour, sugar, eggs, butter, and flavorings like chocolate chips, blueberries, or nuts. Ingredients include wheat flour, sugar, eggs, butter, baking powder, milk, and desired flavorings. Each muffin is baked fresh to ensure a tender crumb and moist texture. Ideal for breakfast, snacks, or dessert. Perfect for kids and adults alike, offering a sweet and satisfying taste with every bite.', 60),
(30, 'Others', 'Donut', 250.00, 'others6.png', 'Our Donuts are sweet, fried pastries coated with sugar, glaze, or chocolate. Ingredients include flour, sugar, yeast, eggs, butter, milk, and oil for frying. Each donut is carefully fried to golden perfection and topped with desired coatings or fillings. Ideal for breakfast, snacks, or dessert. Perfect for sweet lovers, offering a soft interior and slightly crispy exterior. Each bite provides a delightful sweet treat, loved by all ages.', 70);

-- --------------------------------------------------------

--
-- Table structure for table `shop_items_backup`
--

CREATE TABLE `shop_items_backup` (
  `id` varchar(10) NOT NULL,
  `category` varchar(50) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stock` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shop_items_backup`
--

INSERT INTO `shop_items_backup` (`id`, `category`, `item_name`, `price`, `image_path`, `description`, `stock`) VALUES
('CF101', 'Pastries', 'Burger', 450.00, 'pastrieashop6.png', 'Our classic burger is made from 100% fresh beef patty, cooked to perfection and served with crisp lettuce, ripe tomatoes, sliced onions, and a special house-made sauce. The bun is freshly baked daily, lightly toasted for the perfect crunch. Ingredients include beef, flour, yeast, butter, lettuce, tomato, onion, cheese, pickles, ketchup, mustard, and a blend of secret spices. Each burger is crafted to ensure balanced flavors and a delightful texture. Perfect for lunch or dinner, it combines savory and fresh elements, making it a favorite among pastry and snack lovers. Enjoy the warmth of freshly cooked patty with soft, golden buns and melt-in-your-mouth cheese that elevates the classic burger experience. This item is ideal for those who love traditional fast food made with premium ingredients. Every bite delivers a perfect balance of softness, juiciness, and tangy flavor, leaving a satisfying and memorable taste in the mouth.', 50),
('CF102', 'Pastries', 'Hotdog', 300.00, 'hotdogdshop.png', 'Our signature hotdog features a plump, juicy sausage encased in a soft, freshly baked bun. Topped with tangy mustard, sweet ketchup, crunchy onions, and fresh pickles, this hotdog delivers a burst of flavor in every bite. Ingredients include pork sausage, wheat flour, yeast, butter, onions, pickles, mustard, ketchup, and spices. Each element is carefully selected to complement the others, ensuring a harmonious blend of textures and tastes. Ideal as a quick snack or a light meal, the hotdog is prepared fresh daily, with buns baked on-site and sausages sourced from trusted local suppliers. The combination of soft bread and perfectly seasoned sausage makes this an irresistible choice for any casual dining occasion. Perfect for children and adults, it provides a savory, comforting experience.', 60),
('CF103', 'Pastries', 'Chicken-Pie', 500.00, 'pastriiesshop6.png', 'Our Chicken Pie is a delightful pastry filled with tender, juicy chicken chunks cooked in a rich, creamy sauce. The crust is buttery, flaky, and golden brown, baked to perfection. Ingredients include chicken breast, puff pastry (flour, butter, salt, water), onions, garlic, cream, butter, flour for thickening, carrots, peas, salt, pepper, and aromatic herbs. Each pie is handcrafted to ensure consistency in flavor and texture. The creamy chicken filling is seasoned with a mixture of spices and herbs, providing a comforting taste reminiscent of homemade cuisine. Perfect as a hearty snack or part of a meal, our chicken pie offers a blend of savory flavors encased in a delicate, melt-in-your-mouth crust. Ideal for both children and adults, it delivers a rich and satisfying experience with every bite. Enjoy with a side of fresh salad for a balanced meal.', 40),
('CF104', 'Pastries', 'Submarine', 600.00, 'pastriesshop1.png', 'Our Submarine sandwich features layers of freshly sliced meats, crisp lettuce, juicy tomatoes, and a variety of cheeses, all stacked in a soft, freshly baked baguette. Ingredients include wheat flour, yeast, butter, ham, turkey, roast beef, cheddar cheese, mozzarella, lettuce, tomato, pickles, mayonnaise, mustard, and spices. Each submarine is crafted to balance the flavors of meats, cheeses, and vegetables, making it a fulfilling and tasty meal. Ideal for lunch or dinner, it can be enjoyed as a wholesome, protein-rich option for those seeking a hearty sandwich experience. The bread is baked fresh daily, providing a perfect base that holds all ingredients without becoming soggy. Our submarine is perfect for gatherings, picnics, or a satisfying solo meal, offering a combination of textures and flavors that delight the palate.', 30),
('CF105', 'Pastries', 'Chicken-Rolls', 550.00, 'pastriesshop5.png', 'Our Chicken Rolls are savory pastries filled with tender chicken, sautéed onions, bell peppers, and a mix of spices, all wrapped in a flaky, golden-brown pastry. Ingredients include chicken, puff pastry (flour, butter, salt, water), onions, bell peppers, garlic, tomato paste, olive oil, salt, pepper, and a blend of herbs and spices. Each roll is baked fresh daily to ensure crispiness and rich flavor. Perfect as a snack or appetizer, these chicken rolls combine tender meat with aromatic spices, delivering a flavorful experience in every bite. Ideal for parties, lunchboxes, or a quick bite, providing a balanced combination of protein and delicious pastry crust. The aromatic filling and crisp pastry make these rolls an irresistible choice for anyone who enjoys freshly baked savory items.', 45),
('CF106', 'Pastries', 'Chees Bun', 250.00, 'pastriessshop.png', 'Our Cheese Bun is a soft, golden-brown bun stuffed with a generous amount of melted cheese that oozes with every bite. Ingredients include wheat flour, yeast, butter, milk, cheese, eggs, salt, and a hint of sugar. Each bun is baked fresh daily to achieve a soft, fluffy interior with a slightly crispy exterior. The cheese filling is creamy and rich, perfectly complementing the delicate bun. Ideal as a breakfast item, snack, or accompaniment to tea or coffee, our cheese bun satisfies both kids and adults with its comforting taste and texture. The buns are handmade with care, ensuring consistent quality and flavor in every batch. They offer a perfect balance of soft bread and cheesy goodness, making them a favorite among pastry lovers.', 70),
('CF107', 'Cakes', 'Chocolate Cake', 2000.00, 'cakeshop (1).png', 'Our Chocolate Cake is a moist and rich dessert crafted with premium cocoa, fresh eggs, sugar, butter, and flour. Ingredients include cocoa powder, flour, eggs, sugar, butter, baking powder, milk, and a hint of vanilla extract. Each layer is carefully baked to retain fluffiness and layered with smooth chocolate ganache. Ideal for birthdays, celebrations, or as a decadent treat, this cake delivers intense chocolate flavor with a tender crumb. The ganache adds a creamy, luxurious texture, perfectly complementing the sponge layers. Finished with chocolate shavings and a glossy topping, it provides both visual appeal and indulgent taste. Every bite melts in the mouth, satisfying chocolate lovers of all ages. The cake is suitable for parties and family gatherings, providing a premium dessert experience made from high-quality ingredients.', 20),
('CF108', 'Cakes', 'Pinapple Cake', 2200.00, 'cakeshop (2).png', 'Our Pineapple Cake combines soft, moist sponge with a sweet, tangy pineapple filling, baked to perfection. Ingredients include wheat flour, eggs, sugar, butter, pineapple chunks, pineapple juice, baking powder, and cream. Each layer is carefully prepared to ensure even sweetness and fluffy texture. The pineapple topping adds a burst of tropical flavor, balancing the rich sponge layers. Ideal for birthdays, festive events, or afternoon treats, this cake delivers a refreshing fruity taste that melts in your mouth. Garnished with thin slices of pineapple and a light glaze, it is visually appealing and delicious. Perfect for pineapple lovers, it is made from fresh, high-quality fruits and premium ingredients. Every slice offers a combination of sweet, tangy, and creamy flavors.', 15),
('CF109', 'Cakes', 'Orange Cake', 2400.00, 'cakeshop (3).png', 'Our Orange Cake is a zesty and moist dessert made with fresh orange juice, zest, eggs, sugar, flour, butter, and a hint of vanilla. Ingredients include fresh oranges, wheat flour, sugar, butter, eggs, baking powder, and cream. The sponge is light and airy, layered with orange cream frosting that enhances citrus flavor. Ideal for festive events, birthdays, or as an afternoon treat, it delivers a refreshing fruity taste in every bite. The cake is garnished with candied orange slices and powdered sugar for visual appeal. Perfect for citrus lovers, it combines sweet, tangy, and creamy elements. Each slice is carefully baked to maintain perfect texture and flavor balance. The cake is suitable for all occasions and promises a delightful sensory experience.', 18),
('CF110', 'Cakes', 'Strawberry Cake', 2600.00, 'cakeshop (4).png', 'Our Strawberry Cake is a layered dessert made with fresh strawberries, soft sponge, and creamy strawberry frosting. Ingredients include wheat flour, eggs, sugar, butter, fresh strawberries, cream, baking powder, and vanilla extract. Each layer is baked to perfection and assembled with a generous amount of fresh strawberry puree and whipped cream. Ideal for birthdays, celebrations, or afternoon tea, it delivers a sweet and fruity taste with a smooth texture. Garnished with fresh strawberries and a light glaze, the cake is visually appealing. Perfect for strawberry lovers, it combines freshness, sweetness, and creaminess. Each slice provides a delightful taste, ideal for sharing with family and friends during special occasions.', 12),
('CF111', 'Cakes', 'Cherry Cake', 2500.00, 'cakeshop (5).png', 'Our Cherry Cake is a decadent dessert with layers of soft sponge and cherry compote, topped with cherry glaze. Ingredients include wheat flour, eggs, sugar, butter, cherries, cream, and baking powder. Each layer is carefully baked and filled with a rich cherry mixture. Ideal for celebrations, it provides a balance of sweetness and tartness with a tender crumb. Finished with whole cherries and light glaze, it is both visually appealing and delicious. Perfect for cherry lovers and dessert enthusiasts, it offers a luxurious treat for birthdays and special occasions, made with premium ingredients.', 10),
('CF112', 'Cakes', 'Mango Cake', 2500.00, 'cakeshop (6).png', 'Our Mango Cake is a tropical delight featuring soft sponge layered with fresh mango puree and whipped cream. Ingredients include wheat flour, eggs, sugar, butter, fresh mango, cream, and baking powder. Each layer is carefully baked and combined with smooth mango filling. Ideal for summer celebrations or festive events, it delivers a refreshing fruity taste. Garnished with mango slices, it provides a visually stunning and flavorful dessert. Perfect for mango lovers, it balances sweetness, freshness, and creaminess. Each slice offers a tropical, indulgent experience for all occasions.', 14),
('CF113', 'Coffee', 'Espresso', 450.00, 'coffeshop (1).png', 'Our Espresso is a rich, full-bodied coffee made from finely ground premium coffee beans, freshly brewed under high pressure. Ingredients include Arabica coffee beans and water. It delivers a strong, bold flavor with a creamy crema on top, perfect for coffee enthusiasts who appreciate intense aroma and taste. Ideal for morning energy boost or afternoon refreshment. Served in a small cup, it provides a concentrated coffee experience that highlights the nuances of freshly roasted beans. Our espresso is perfect on its own or as a base for various coffee beverages like latte, cappuccino, or mocha. Each cup ensures consistency in taste and aroma, crafted to satisfy discerning coffee lovers.', 100),
('CF114', 'Coffee', 'Americano', 400.00, 'coffeshop (2).png', 'Our Americano is a smooth and flavorful coffee beverage made by diluting rich espresso with hot water. Ingredients include freshly brewed espresso and filtered water. The resulting drink has a mild yet aromatic flavor, maintaining the espresso’s depth without overwhelming bitterness. Ideal for those who enjoy a lighter coffee experience, it can be enjoyed black or with milk and sugar. Perfect for breakfast, office breaks, or casual afternoons, it provides a balanced coffee taste. Each cup is brewed fresh, ensuring high-quality aroma and flavor consistency. The Americano is a classic choice for coffee lovers seeking a refined, straightforward coffee experience.', 90),
('CF115', 'Coffee', 'Latte (Caffè Latte)', 500.00, 'coffeshop (3).png', 'Our Latte is a creamy coffee beverage made with freshly brewed espresso and steamed milk. Ingredients include Arabica coffee beans, milk, and a small amount of sugar if desired. It features a delicate balance of espresso’s boldness and milk’s creaminess, often topped with a thin layer of froth. Ideal for breakfast, afternoon breaks, or relaxing moments, it provides a smooth and comforting coffee experience. Can be served plain or with flavorings like vanilla or caramel. Each latte is freshly prepared to ensure consistency in taste and temperature. Perfect for coffee enthusiasts who enjoy creamy and aromatic beverages.', 80),
('CF116', 'Coffee', 'Cappuccino', 600.00, 'coffeshop (4).png', 'Our Cappuccino is a classic Italian coffee beverage combining equal parts of espresso, steamed milk, and milk foam. Ingredients include espresso made from Arabica coffee beans and fresh milk. The frothy top adds a silky texture, while the espresso provides a rich, aromatic base. Ideal for breakfast or afternoon indulgence, it delivers a well-balanced coffee experience with each sip. Can be garnished with cocoa powder or cinnamon for extra flavor. Perfect for coffee lovers seeking traditional taste and creamy consistency. Each cup is freshly prepared to maintain high quality and flavor.', 75),
('CF117', 'Coffee', 'Mocha (Caffè Mocha)', 700.00, 'coffeshop (5).png', 'Our Mocha is a luxurious coffee beverage blending rich espresso, steamed milk, and premium chocolate syrup. Ingredients include espresso, milk, sugar, and high-quality cocoa or chocolate. Topped with whipped cream and chocolate shavings, it provides a perfect combination of coffee bitterness and chocolate sweetness. Ideal for dessert coffee lovers or special treats, it delivers indulgence in every sip. Suitable for breakfast or evening delight, it combines warmth, aroma, and chocolate flavor. Each cup is freshly prepared to ensure consistency in taste, temperature, and texture.', 60),
('CF118', 'Coffee', 'Flat White', 800.00, 'coffeshop (6).png', 'Our Flat White is a smooth and velvety coffee made with espresso and micro-foamed milk. Ingredients include freshly brewed espresso and steamed milk with fine microfoam. It delivers a balanced coffee taste with creamy texture, highlighting the espresso’s flavor without overpowering bitterness. Ideal for coffee enthusiasts seeking a sophisticated and smooth beverage. Served in small cups, it maintains warmth and aroma. Perfect for breakfast, brunch, or afternoon coffee breaks, providing a consistent, high-quality experience.', 50),
('CF119', 'Bread', 'Sourdough Bread', 450.00, 'breadshop (1).png', 'Our Sourdough Bread is a traditional, naturally leavened bread with a crispy crust and chewy interior. Ingredients include wheat flour, water, salt, and natural sourdough starter. Baked slowly to develop complex flavor and texture, it provides a tangy taste and hearty structure. Ideal for sandwiches, toasts, or as a side with soups and salads. Each loaf is handcrafted to ensure consistency, flavor, and freshness. Perfect for bread lovers who enjoy artisanal baked goods.', 40),
('CF120', 'Bread', 'Sandwich', 500.00, 'breadshop.png', 'Our freshly made Sandwich combines soft bread slices with layers of protein, vegetables, and sauces. Ingredients include wheat bread, cheese, lettuce, tomatoes, cucumber, mayonnaise, mustard, and choice of meats like chicken or ham. Each sandwich is carefully assembled to maintain freshness and balance of flavors. Ideal for lunch, quick meals, or snacks. Perfect for a healthy and convenient meal option.', 35),
('CF121', 'Bread', 'Baguette', 600.00, 'breadshop (3).png', 'Our Baguette is a classic French bread with a golden, crispy crust and soft, airy interior. Ingredients include wheat flour, yeast, salt, and water. Perfect for sandwiches or to accompany soups and cheese platters. Each baguette is baked fresh daily for optimal texture and flavor.', 25),
('CF122', 'Bread', 'Ciabatta', 700.00, 'breadshop (2).png', 'Our Ciabatta Bread is an Italian white bread with a crispy crust and soft interior. Ingredients include wheat flour, yeast, salt, water, and olive oil. Ideal for sandwiches or as a side. Freshly baked to ensure flavor and texture.', 30),
('CF123', 'Bread', 'Garlic Bread', 800.00, 'breadshop (4).png', 'Our Garlic Bread is a warm, fragrant bread baked with garlic butter and herbs. Ingredients include wheat bread, butter, garlic, parsley, salt, and olive oil. Perfect as a side dish or appetizer. Served hot for maximum aroma and flavor.', 20),
('CF124', 'Bread', 'Whole Wheat Loaf', 900.00, 'breadshop (5).png', 'Our Whole Wheat Loaf is a nutritious, hearty bread made from 100% whole wheat flour. Ingredients include whole wheat flour, yeast, water, salt, and sugar. Ideal for healthy sandwiches or breakfast toasts. Each loaf is baked fresh, providing rich fiber and flavor.', 15),
('CF125', 'Others', 'Mojito', 450.00, 'others.png', 'Our Mojito is a refreshing beverage made with fresh mint leaves, lime juice, sugar, soda water, and ice. Ingredients include fresh mint, lime, sugar, soda water, and optional rum. Served chilled, it provides a cool and invigorating drink, perfect for hot days or casual gatherings. Ideal for parties or relaxation, offering a balanced combination of sweetness, acidity, and mint aroma.', 50),
('CF126', 'Others', 'Nescafe', 300.00, 'others1.png', 'Our Nescafe is a classic instant coffee beverage made with premium Nescafe coffee granules. Ingredients include instant coffee granules, hot water, and optional sugar or milk. Quick and convenient, it provides a rich coffee flavor and aroma. Ideal for mornings or afternoon breaks, it delivers a smooth, energizing coffee experience. Perfect for busy individuals seeking quality coffee without long preparation time. Served hot, it is both comforting and invigorating, maintaining consistency in taste and aroma.', 100),
('CF127', 'Others', 'Lava Cake', 500.00, 'others2.png', 'Our Lava Cake is a decadent dessert with a molten chocolate center. Ingredients include chocolate, butter, sugar, eggs, flour, and cocoa powder. Baked just enough to allow the center to remain soft and flowing, it delivers rich, indulgent flavor. Ideal for dessert lovers, it can be paired with ice cream or whipped cream. Each cake is baked fresh, ensuring a warm, gooey center with a slightly crisp exterior. Perfect for celebrations or indulgent treats. The combination of textures and intense chocolate flavor makes it irresistible.', 25),
('CF128', 'Others', 'Macaron', 600.00, 'others3.png', 'Our Macarons are delicate French pastries made with almond flour, sugar, egg whites, and food coloring. Ingredients include almond flour, powdered sugar, egg whites, granulated sugar, buttercream or ganache filling. Each macaron is baked to perfection, with a crisp shell and chewy interior, filled with smooth, flavored cream. Ideal for gifting, tea time, or celebrations. Perfect for dessert lovers seeking colorful and flavorful treats. Made with precision and high-quality ingredients, they deliver elegance and taste in every bite.', 40),
('CF129', 'Others', 'Muffin', 550.00, 'others5.png', 'Our Muffins are soft, moist baked treats made with flour, sugar, eggs, butter, and flavorings like chocolate chips, blueberries, or nuts. Ingredients include wheat flour, sugar, eggs, butter, baking powder, milk, and desired flavorings. Each muffin is baked fresh to ensure a tender crumb and moist texture. Ideal for breakfast, snacks, or dessert. Perfect for kids and adults alike, offering a sweet and satisfying taste with every bite.', 60),
('CF130', 'Others', 'Donut', 250.00, 'others6.png', 'Our Donuts are sweet, fried pastries coated with sugar, glaze, or chocolate. Ingredients include flour, sugar, yeast, eggs, butter, milk, and oil for frying. Each donut is carefully fried to golden perfection and topped with desired coatings or fillings. Ideal for breakfast, snacks, or dessert. Perfect for sweet lovers, offering a soft interior and slightly crispy exterior. Each bite provides a delightful sweet treat, loved by all ages.', 70);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `phone`, `email`, `password`, `address`, `created_at`) VALUES
(1, 'kamal', 'Perera', '0773866749', 'sadun@email.com', '12345', '', '2025-10-06 11:52:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_user_cart` (`user_id`);

--
-- Indexes for table `shop_items`
--
ALTER TABLE `shop_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1029;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shop_items`
--
ALTER TABLE `shop_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_user_cart` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

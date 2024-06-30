-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 10:54 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-nursery system`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(30) NOT NULL,
  `pincode` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `area_name`, `pincode`) VALUES
(8, 'paldi', 380001),
(11, 'Amraiwadi', 380026),
(12, 'Sola bhagvat', 380061),
(13, 'vastrapur', 380032),
(14, 'area1', 380052);

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE IF NOT EXISTS `billing` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL,
  `invoice_number` int(10) NOT NULL,
  `billing_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=188 ;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `order_id`, `invoice_number`, `billing_date`) VALUES
(185, 122, 1392157583, '2022-02-11'),
(186, 123, 1319650290, '2022-03-06'),
(187, 124, 1170631159, '2022-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_stock` int(10) NOT NULL,
  `product_quantity` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `product_stock`, `product_quantity`) VALUES
(4, 14, 57, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `category_desc` varchar(100) NOT NULL,
  `parent_id` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_name` (`category_name`),
  KEY `parent_id` (`parent_id`),
  KEY `parent_id_2` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_desc`, `parent_id`) VALUES
(89, 'Herbal Plants', 'Plants which can be used as medicine', 0),
(91, 'Air Purifier Plants ', 'Plant Which Purifies the air ', 0),
(92, 'indoor plants', 'plants for indoor !!', 0),
(93, 'Cactus and Succulents Plants', 'Cactus and Succulents Plants for decors !!', 0),
(94, 'Occasions', 'plant which you can give someone on any occasion !', 0),
(95, 'Birthday ', 'plant which can be gifted in birthdays !', 94),
(96, 'Anniversary', 'plant which can be gifted in Anniversaries !', 94),
(97, 'Planters', 'Different kind of planters ', 0),
(98, 'Ceramic Planters', 'Planter/Pot/Vase Which are made of ceramic ', 97),
(99, 'Metal Planters', 'Planters of Metal ', 97),
(100, 'Assesories', 'Assesories for plant ', 0),
(101, 'seeds and fertilizers ', 'seeds and fertilizers for plant growth ', 100),
(102, 'Gardening Tools', 'Tools which required to manage plant !', 100);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `billing_id` int(10) NOT NULL,
  `tracking_number` varchar(10) NOT NULL,
  `date_shipped` date NOT NULL,
  `delivery_status` tinyint(1) NOT NULL,
  `delivery_details` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tracking_number` (`tracking_number`),
  KEY `billing_id` (`billing_id`),
  KEY `billing_id_2` (`billing_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `billing_id`, `tracking_number`, `date_shipped`, `delivery_status`, `delivery_details`) VALUES
(11, 186, '1325344252', '2022-03-17', 0, 'Shipped From the shop');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(6) NOT NULL,
  `order_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `product_id`, `quantity`, `order_date`) VALUES
(122, 5, 68, 1, '2022-02-11'),
(123, 5, 59, 3, '2022-03-06'),
(124, 17, 60, 2, '2022-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  `product_desc` varchar(500) NOT NULL,
  `product_img1` varchar(70) NOT NULL,
  `product_img2` varchar(70) NOT NULL,
  `product_price` int(6) NOT NULL,
  `product_stock` int(4) NOT NULL,
  `category_id` int(10) NOT NULL,
  `sub_category_id` int(10) NOT NULL,
  `featured_id` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `category_name` (`category_id`),
  KEY `sub_category_name` (`sub_category_id`),
  KEY `category_id` (`category_id`,`sub_category_id`),
  KEY `category_id_2` (`category_id`,`sub_category_id`),
  KEY `category_id_3` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_desc`, `product_img1`, `product_img2`, `product_price`, `product_stock`, `category_id`, `sub_category_id`, `featured_id`) VALUES
(57, 'Aloe Vera', 'Aloe vera can be used to relieve heartburn, keep fruits and vegetables fresh, and much more. Aloe vera has been used to treat sunburns, fight dental plaque and lower blood sugar levels, but you may wonder whether the plant is safe forâ€¦ Aloe vera ha', 'aloe vera p1.jpg', 'aloe vera p2.jpg', 1000, 5, 89, 89, 1),
(58, 'Ajwain', 'What are the uses of ajwain plant? Active enzymes in ajwain improve the flow of stomach acids, which can help to relieve indigestion, bloating, and gas. The plant can also help to treat peptic ulcers as well as sores in the esophagus, stomach, and in', 'ajwain1.jpg', 'ajwain2.jpg', 500, 0, 89, 89, 1),
(59, 'Classy Money Plant ', 'Plant Name- Money Plant Plant Type- Air Purifying Foliage Plant Placement- Indoors & Outdoors Plant Height- Upto 6 inches Jute Wrapped Plastic Pot- 3 x 3 inches Decorated with Raffia , Take care TIps :- Keep plants in medium light locations, out of direct sunlight. Natural light is best, but some plants can also thrive in office fluorescent light.', 'cute2.jpg', 'cat4.jpg', 1000, 37, 91, 91, 0),
(60, 'Beautiful Peace Lily Plant', 'Plant Name- Peace Lily Plant Plant Type- Air Purifying Plant Plant Placement- Indoors Plant Height- Upto 6 inches One Plant in 6 to 8-inch- diameter containers can clean the air in roughly 100 square feet of floor space. Plastic Pot', 'lilly1.jpg', 'lilly2.jpg', 200, 0, 91, 91, 0),
(61, 'Jade Plant 4" Glass Terrarium', 'Plant Name- Jade Plant Plant Type- Foliage & Air Purifying Plant Plant Placement- Indoors Plant Height- Upto 7 inches Square Glass Vase- 4 x 4 inches One Plant in 6 to 8 inch diameter containers can clean the air in roughly 100 square feet of floor space. Handcrafted goodness with 100% natural layering of preserved green moss, potting mix soil, and river side gravel. Watering guideline: 40-50 ml using a water dropper. Water once in 8-10 days depending on whether the soil is moist or dry.', 'jade-plant1.jpg', 'jade-plant2.jpg', 700, 4, 92, 92, 0),
(62, 'Cute Ficus Compacta Plant In Brass Pot', 'Plant Name- Ficus Compacta Plant Plant Type- Foliage/Airpurifying Plant Placement- Indoors & Outdoors Plant Height- Upto 5 inches Brass Metal Orchid Pot Pot Dimensions- 3 x 3 inches', 'cute1.jpg', 'cute2.jpg', 350, 4, 92, 92, 0),
(63, 'Jade Plant In Sea House Planter', '"Plant Name- Jade Plant Plant Type- Succulent "Plant Placement- Indoors & Outdoors "Plant Height- Upto 6 inches "One Resin Planter Pot Colour- Blue & White "Pot Dimensions- 4 x 5 inches', 'jade1.jpg', 'jade2.jpg', 500, 5, 93, 93, 1),
(64, 'Happy Birthday Jade Plant Terrarium', 'Plant Name- Jade Plant Plant Type- Foliage Plant Placement- Indoors & Outdoors Plant Height- Upto 6 inches Round Glass Terrarium- 6 inches One Happy Birthday Tag', 'happy-birthday-jade-plant-terrarium1.jpg', 'happy-birthday-jade-plant-terrarium3.jpg', 700, 5, 94, 95, 1),
(65, 'Lucky Bamboo & Ficus Compacta Happy Birthday Greet', 'One Lucky Bamboo Plant- Upto 5 inches Plant Type- Bamboo One Ficus Compacta Plant- Upto 4 inches Plant Placement- Indoors & Outdoors Square Glass Vase- 3 x 3 inches Square Glass Vase- 3 x 3 inches Two Happy Birthday Peel Off Stickers', 'lucky-bamboo-and-ficus-compacta-happy-birthday-greetings-set1.jpg', 'lucky-bamboo-and-ficus-compacta-happy-birthday-greetings-set2.jpg', 1222, 4, 94, 95, 1),
(66, 'Two Layer Bamboo Plant Anniversary Greetings', 'Plant Name- Two Layer Lucky Bamboo Plant Plant Type- Lucky Bamboo Plant Height- Upto 5 inches Plant Placement- Indoors Square Glass Vase- 3 x 3 inches Happy Anniversary Peel Off Sticker', 'two-layer-bamboo-plant-anniversary-greetings1.jpg', 'two-layer-bamboo-plant-anniversary-greetings2.jpg', 399, 6, 94, 96, 1),
(67, 'Ficus Compacta Plant In King Queen Pot', '2 Ficus Compacta Plants- Upto 4 Inches Plant Type- Foliage/Airpurifying Plant Placement- Indoor/Outdoor One Resin King Pot- 3 Inches One Resin Queen Pot- 3 Inches', 'ficus-compacta-plant-in-king-queen-pot-hand-delivery1.jpg', 'ficus-compacta-plant-in-king-queen-pot-hand-delivery2.jpg', 1599, 2, 94, 96, 1),
(68, 'Two Layer Bamboo Plant With Smiley Vase', 'Plant Name- Two Layer Lucky Bamboo Plant Placement- Indoors Plant Height- Upto 5 inches Smiley Cup Ceramic Pot- 4 x 3.5 inches', 'two-layer-bamboo-plant-with-smiley-vase1.jpg', 'two-layer-bamboo-plant-with-smiley-vase2.jpg', 1999, 6, 97, 98, 1),
(69, 'Two Layer Bamboo Plant in Copper Orchid Metal Pot', 'Plant Name- Two Layer Bamboo Plant Type- Lucky Bamboo Plant Placement- Indoors Plant Height- Upto 8 inches Copper Orchid Metal Pot- 3 x 3 x 2.5 inches', 'two-layer-bamboo-plant-in-copper-orchid-metal-pot1.jpg', 'two-layer-bamboo-plant-in-copper-orchid-metal-pot_4.jpg', 700, 3, 97, 99, 0),
(70, 'Gardenia Cow Manure - 5 Kg', 'Gardenia Cow Manure is an excellent fertilizer highly rich with organic matter and helps to improve aeration and break up compact soils. It is developed from composted cow dung of the Indian Desi cow and is incredibly rich with beneficial bacteria that convert soil nutrients into readily available forms for the tender plant.', 'cow-manure1.jpg', 'cow-manure1.jpg', 500, 4, 100, 101, 1),
(71, 'Double Prong Weeder', 'The Double Prong Weeder is an upgrade to the Single Prong and is used for weeding, small root removal, loosening the soil efficiently and digging holes to sow seeds. It comes with a wooden handle for a powerful and firm grip and is perfectly sized for flower beds and small vegetable gardens.', 'double_prong_weeder_a_image1.jpg', 'double_prong_weeder_a_image1.jpg', 150, 2, 100, 102, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `rating` enum('1','2','3','4','5') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `product_id`, `rating`) VALUES
(3, 14, 58, '3'),
(4, 11, 66, '3');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE IF NOT EXISTS `user_registration` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `confirm_password` varchar(20) NOT NULL,
  `phone_number` bigint(12) NOT NULL,
  `area` varchar(20) NOT NULL,
  `address` varchar(150) NOT NULL,
  `pincode` int(6) NOT NULL,
  `user_gender` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_id` (`email_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `user_name`, `email_id`, `password`, `confirm_password`, `phone_number`, `area`, `address`, `pincode`, `user_gender`) VALUES
(1, 'admin', 'admin1@gmail.com', '12345678', '12345678', 8545655, 'ddad', 'adda', 380026, 'male'),
(5, 'Elex', 'user@gmail.com', 'Abcd12345@', 'Abcd12345@', 8485962053, 'Sola bhagvat', 'dhxbxbbxfafasfafafafasasf\r\n', 380061, 'male'),
(10, 'user1001', 'user100@gmail.com', 'Abcd1234@', 'Abcd1234@', 8485962020, 'paldi', 'sfsfdfsfsfs', 380001, 'Male'),
(11, 'dhrumil', 'dhrumil@gmail.com', 'Abcd12345@', 'Abcd12345@', 8485962020, 'Amraiwadi', 'sector 4', 380026, 'Male'),
(13, 'dev', 'dev@gmail.com', 'Abcd1234@', 'Abcd1234@', 8485962020, 'paldi', '1/5 heaven banglows', 380001, 'Male'),
(14, 'mark', 'mark@gmail.com', 'Abcd1234@@', 'Abcd1234@@', 8485962053, 'paldi', '1/5 sector 1', 380001, 'Male'),
(15, 'mack', 'mack@gmail.com', 'Abcd1234@', 'Abcd1234@', 8665778890, 'paldi', 'dfhdfnc', 380001, 'Male'),
(16, 'elex', 'elex@gmail.com', 'Abcd1234@@', 'Abcd1234@@', 8665778890, 'paldi', 'sector 2/3', 380001, 'Male'),
(17, 'anil', 'anil@gmail.com', 'Abcd1234@', 'Abcd1234@', 8686868686, 'area1', 'sdsbdhxbzdbxv', 380052, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `verification_master`
--

CREATE TABLE IF NOT EXISTS `verification_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(30) NOT NULL,
  `varification_code` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `verification_master`
--

INSERT INTO `verification_master` (`id`, `email_id`, `varification_code`) VALUES
(80, 'dhrumil@gmail.com', '3767'),
(81, 'Lucky@gmail.com', '1705'),
(82, 'user1@gmail.com', '2075'),
(83, 'user1@gmail.com', '8163');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_registration` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`billing_id`) REFERENCES `billing` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`sub_category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user_registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

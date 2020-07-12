-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2020 at 04:19 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee_bar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`, `contact`, `email`, `created`, `update_on`) VALUES
(1, 'admin-coffee', '123', 'admin', '0705867067', 'admin@admin.com', '2020-02-20 22:30:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment` varchar(50) DEFAULT 'Cash',
  `date_made` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`id`, `customer_name`, `contact_number`, `address`, `email`, `total`, `status`, `payment`, `date_made`) VALUES
(2, 'Agaba Aron', '0706547364', 'Kakoba', 'aaronagaba230@gmail.com', '42000', 'served', NULL, '2020-03-05 01:57:29'),
(6, 'Doreen Ankunda', '0750938548', 'MustMbarara', 'ankundadoryn22@gmail.com', '50000', 'served', NULL, '2020-03-06 16:27:09'),
(7, 'Doreen Ankunda', '0750938548', 'MustMbarara', 'ankundadoryn22@gmail.com', '1246000', 'served', NULL, '2020-03-06 16:47:23'),
(8, 'Doreen Ankunda', '0750938548', 'MustMbarara', 'ankundadoryn22@gmail.com', '400000', 'served', NULL, '2020-03-23 14:41:07'),
(10, 'Doreen Ankunda', '0750938548', 'MustMbarara', 'ankundadoryn22@gmail.com', '743000', 'served', NULL, '2020-03-23 19:51:08'),
(12, 'Agaba Aron', '0706547364', 'Kakoba', 'aaronagaba230@gmail.com', '168000', 'served', NULL, '2020-03-24 12:35:16'),
(14, 'Agaba Aron', '0706547364', 'Kakoba', 'aaronagaba230@gmail.com', '100000', 'served', NULL, '2020-04-04 00:41:25'),
(15, 'Agaba Aron', '0706547364', 'Kakoba', 'aaronagaba230@gmail.com', '125000', 'canceled', NULL, '2020-04-08 23:39:49'),
(16, 'Agaba Aron', '0706547364', 'Kakoba', 'aaronagaba230@gmail.com', '61800', 'accepted', 'Cash', '2020-04-09 00:36:47'),
(17, 'Ivan Amanya', '0789254775', 'Muyenga Kampala', 'amanyaivan36@gmail.com', '175000', 'served', 'Cash', '2020-05-08 16:13:07'),
(18, 'ivan mata', '0789566542', 'Mbarara', 'mata@mail.com', '75000', 'pending', 'Cash', '2020-05-12 20:28:58'),
(19, 'Ivan Amanya', '10789254775', 'Muyenga Kampala', 'amanyaivan36@gmail.com', '86600', 'pending', 'Cash', '2020-05-13 01:35:06'),
(20, 'Ivan Amanya', '0789254775', 'Muyenga Kampala', 'amanyaivan36@gmail.com', '14600', 'accepted', 'Cash', '2020-06-15 12:19:33'),
(21, 'Doreen Ankunda', '0750938548', 'MustMbarara', 'ankundadoryn22@gmail.com', '25000', 'served', 'Cash', '2020-06-15 12:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `customer_name`, `subject`, `email`, `message`) VALUES
(1, 'Adam Abdulrahman', 'Late Delivery', 'abdulflezy13@yahoo.com', 'Please ensure that your delivery guys deliver the meals at the required time because they are often late.'),
(2, 'Zainab Adamu', 'Late Delivery', 'Zee@yahoo.com', 'I need an email of the GM if possible');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_category` varchar(255) NOT NULL,
  `food_sub_category` varchar(150) DEFAULT NULL,
  `food_price` int(11) NOT NULL,
  `food_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `food_name`, `food_category`, `food_sub_category`, `food_price`, `food_description`) VALUES
(9, 'Pounded Yam', 'dinner', 'foods', 8000, 'This is one of our best meal and it is prepared deliciously for you'),
(10, 'Eba and Vegetable', 'dinner', NULL, 600, 'This is a very nice combination'),
(12, 'Rolex', 'dinner', NULL, 5000, 'Rolex with eggs'),
(13, 'Spiced Coffee', 'breakfast', NULL, 5000, 'Breakfast coffee at affordable price'),
(14, 'Beef Buffet ', 'lunch', NULL, 25000, 'All food with Beef source'),
(17, 'Dates', 'breakfast', 'foods', 10000, 'Sweet and healthy for your day'),
(19, 'Garlic Pork', 'dinner', 'foods', 25000, 'Fried with garlic ,great taste'),
(20, 'Goat muchomo', 'lunch', 'foods', 4000, 'meat on stick spiced with lemon,onions,tomatoes...enjoy the taste'),
(21, 'Spanish Omellet', 'dinner', 'foods', 5000, 'Two eggs tomatoes, onions and green paper'),
(22, 'Whole Fish', 'lunch', 'foods', 25000, 'whole fish with soy and citrus'),
(23, 'whole chicken', 'dinner', 'foods', 20000, 'whole chicken prepared in ugandan traditional style'),
(24, 'cocktail', 'dinner', 'drinks', 7000, 'strawberry flavor'),
(25, 'English Tea', 'breakfast', 'drinks', 5000, 'full-bodied, robust, rich and blended to go well with milk and sugar in a style '),
(26, 'Mango Smoothie', 'special', 'drinks', 8000, 'This mango smoothie is made with frozen mango, yogurt, banana and juice, all blended together into an ultra creamy drink'),
(27, 'pinapple smoothie', 'special', 'drinks', 8000, 'made of frozen pineapple, banana, pineapple juice, and Greek yogurt '),
(28, 'Watermelon Juice', 'special', 'juice', 6000, 'Refreshing and cool watermelon juice with a splash of lime is the perfect .'),
(29, 'Paw Paw Juice', 'special', 'juice', 6000, 'Pawpaw juice from the ripe papaya fruit is sweet'),
(30, 'Avocado Juice', 'special', 'juice', 6000, 'Avocado, Lime, And Honey Juice, Cucumber And Avocado'),
(31, 'Fish Fingers', 'dinner', 'foods', 27000, 'combine the all-purpose flour with garlic powder, salt and pepper and white fish'),
(32, 'Chaii Latte', 'breakfast', 'drinks', 5000, 'Typically made with a tea concentrate and steamed milk.'),
(33, 'Grilled Chicken', 'dinner', 'foods', 15000, 'Made with chicken, hung curd and spices like paprika, cumin, garlic, onion, coriander, salt, and pepper,lemon juice, olive oil'),
(34, 'Meaty Man Pizza', 'dinner', 'foods', 25000, 'Meat Calzone Recipe, Cheesy Pizza Recipe');

-- --------------------------------------------------------

--
-- Table structure for table `globals`
--

CREATE TABLE `globals` (
  `global_id` int(11) NOT NULL,
  `global_amt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `globals`
--

INSERT INTO `globals` (`global_id`, `global_amt`) VALUES
(1, '6');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `food` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `customer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `order_id`, `food`, `qty`, `date`, `customer`) VALUES
(4, '2', 'Spiced Coffee', '2', '2020-03-04 22:57:29', NULL),
(5, '2', 'Avocado Juice', '2', '2020-03-04 22:57:29', NULL),
(6, '2', 'Spanish Omellet', '4', '2020-03-04 22:57:29', NULL),
(14, '6', 'whole chicken', '1', '2020-03-06 13:27:09', NULL),
(15, '6', 'Dates', '3', '2020-03-06 13:27:09', NULL),
(16, '7', 'Beef Buffet', '13', '2020-03-06 13:47:23', NULL),
(17, '7', 'Whole Fish', '11', '2020-03-06 13:47:23', NULL),
(18, '7', 'Fish Fingers', '12', '2020-03-06 13:47:23', NULL),
(19, '7', 'Meaty Man Pizza', '14', '2020-03-06 13:47:23', NULL),
(20, '8', 'Garlic Pork', '7', '2020-03-23 11:41:07', NULL),
(21, '8', 'Beef Buffet', '3', '2020-03-23 11:41:07', NULL),
(22, '8', 'Hawaii Pizza', '6', '2020-03-23 11:41:07', NULL),
(23, '9', 'English Tea', '28', '2020-03-23 11:45:22', NULL),
(24, '9', 'Avocado Juice', '23', '2020-03-23 11:45:22', NULL),
(25, '10', 'whole chicken', '5', '2020-03-23 16:51:08', 'Doreen Ankunda'),
(26, '10', 'Fish Fingers', '5', '2020-03-23 16:51:08', 'Doreen Ankunda'),
(27, '10', 'Meaty Man Pizza', '5', '2020-03-23 16:51:08', 'Doreen Ankunda'),
(28, '10', 'Dates', '4', '2020-03-23 16:51:08', 'Doreen Ankunda'),
(29, '11', 'whole chicken', '3', '2020-03-24 09:23:37', 'Agaba Aron'),
(30, '11', 'Chaii Latte', '4', '2020-03-24 09:23:37', 'Agaba Aron'),
(31, '11', 'Hawaii Pizza', '4', '2020-03-24 09:23:37', 'Agaba Aron'),
(32, '12', 'pinapple smoothie', '5', '2020-03-24 09:35:16', 'Agaba Aron'),
(33, '12', 'Watermelon Juice', '5', '2020-03-24 09:35:16', 'Agaba Aron'),
(34, '12', 'Eba and Vegetable', '5', '2020-03-24 09:35:16', 'Agaba Aron'),
(37, '12', 'Spiced Coffee', '4', '2020-03-24 10:41:25', 'Agaba Aron'),
(38, '12', 'Beef Buffet', '3', '2020-03-24 10:41:25', 'Agaba Aron'),
(39, '13', 'whole chicken', '5', '2020-03-24 10:45:03', 'Agaba Aron'),
(40, '13', 'Rolex', '4', '2020-03-24 10:45:03', 'Agaba Aron'),
(41, '13', 'Beef Buffet', '4', '2020-04-03 21:40:36', 'Agaba Aron'),
(42, '14', 'Beef Buffet', '4', '2020-04-03 21:41:25', 'Agaba Aron'),
(43, '15', 'Dates', '3', '2020-04-08 20:39:50', 'Agaba Aron'),
(44, '15', 'Chaii Latte', '4', '2020-04-08 20:39:50', 'Agaba Aron'),
(45, '15', 'Garlic Pork', '3', '2020-04-08 20:39:50', 'Agaba Aron'),
(46, '16', 'Eba and Vegetable', '3', '2020-04-08 21:36:47', 'Agaba Aron'),
(47, '16', 'whole chicken', '3', '2020-04-08 21:36:47', 'Agaba Aron'),
(48, '10', 'Fish Fingers', '4', '2020-04-20 11:43:43', 'Doreen Ankunda'),
(49, '10', 'whole chicken', '6', '2020-04-20 11:43:43', 'Doreen Ankunda'),
(50, '10', 'Garlic Pork', '5', '2020-04-20 11:43:43', 'Doreen Ankunda'),
(51, '17', 'Garlic Pork', '4', '2020-05-08 13:13:08', 'Ivan Amanya'),
(52, '17', 'Beef Buffet', '3', '2020-05-08 13:13:08', 'Ivan Amanya'),
(53, '18', 'Beef Buffet', '3', '2020-05-12 17:28:58', 'ivan mata'),
(54, '19', 'Pounded Yam', '1', '2020-05-12 22:35:06', 'Ivan Amanya'),
(55, '19', 'Eba and Vegetable', '1', '2020-05-12 22:35:06', 'Ivan Amanya'),
(56, '19', 'Rolex', '2', '2020-05-12 23:11:06', 'Ivan Amanya'),
(57, '19', 'Rolex', '3', '2020-05-12 23:17:48', 'Ivan Amanya'),
(58, '19', 'Avocado Juice', '3', '2020-05-12 23:17:48', 'Ivan Amanya'),
(59, '19', 'Spanish Omellet', '1', '2020-05-12 23:21:56', 'Ivan Amanya'),
(60, '19', 'Dates', '3', '2020-05-12 23:35:30', 'Ivan Amanya'),
(61, '20', 'Pounded Yam', '1', '2020-06-15 09:19:35', 'Ivan Amanya'),
(62, '20', 'Eba and Vegetable', '1', '2020-06-15 09:19:35', 'Ivan Amanya'),
(63, '20', 'Avocado Juice', '1', '2020-06-15 09:19:35', 'Ivan Amanya'),
(64, '21', 'Crisps', '1', '2020-06-15 09:25:04', 'Doreen Ankunda');

-- --------------------------------------------------------

--
-- Table structure for table `live_records`
--

CREATE TABLE `live_records` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `live_records`
--

INSERT INTO `live_records` (`id`, `name`, `skills`, `address`, `designation`, `age`) VALUES
(2, 'Susan', 'Software Development', 'Muyenga, Kampala', 'Head Teacher', 28);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reserve_id` int(11) NOT NULL,
  `no_of_guest` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `date_res` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `suggestions` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reserve_id`, `no_of_guest`, `email`, `phone`, `date_res`, `time`, `suggestions`) VALUES
(3, '10', 'adb@g.c', '09077665544', '2017-11-08', '00:11', 'Suggestions');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomers`
--

CREATE TABLE `tblcustomers` (
  `ID` int(10) NOT NULL,
  `Name` varchar(120) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` varchar(13) DEFAULT NULL,
  `Gender` enum('Female','Male','Non') DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `Details` mediumtext,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `invoice` varchar(11) NOT NULL DEFAULT 'no',
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcustomers`
--

INSERT INTO `tblcustomers` (`ID`, `Name`, `Email`, `MobileNumber`, `Gender`, `username`, `password`, `Details`, `order_id`, `invoice`, `CreationDate`, `UpdationDate`) VALUES
(2, 'Ivan Amanya', 'amanyaivan36@gmail.com', '0789254775', 'Male', 'Ivan36', 'df0a71b2edd39538f36ca7a5b8c864b6', 'Kiswahili, Mbarara', 20, 'no', '2020-03-04 22:39:33', '2020-06-15 09:19:34'),
(3, 'Agaba Aron', 'aaronagaba230@gmail.com', '0706547364', 'Male', 'Aaron', '827ccb0eea8a706c4c34a16891f84e7b', 'Kakoba', 16, 'no', '2020-03-04 22:55:57', '2020-04-08 21:36:47'),
(4, 'Doreen Ankunda', 'ankundadoryn22@gmail.com', '0750938548', 'Female', 'Doreen', '827ccb0eea8a706c4c34a16891f84e7b', 'Must,Mbarara', 21, 'no', '2020-03-06 13:25:37', '2020-06-15 09:25:04'),
(5, 'Sankara', 'sankara@gmail.com', '078986965', 'Male', NULL, NULL, 'Mbarara', 0, 'no', '2020-03-06 13:56:08', '2020-03-06 14:11:25'),
(8, 'Amos', 'amoaashaba@gmail.com', '0789254775', 'Male', NULL, NULL, 'MUST', 0, 'no', '2020-03-06 14:40:19', NULL),
(9, 'Manzi Benja', 'manzi@gmail.com', '0789255472', 'Male', NULL, NULL, 'from Mbarara', 0, 'no', '2020-04-28 13:36:59', NULL),
(10, 'Ronald', 'ron@gmail.com', '0789254405', 'Male', NULL, NULL, 'iuewlkjlkdhjfkjfkd', 0, 'no', '2020-05-08 13:29:44', '2020-05-12 14:55:03'),
(11, 'ivan mata', 'mata@mail.com', '0789566542', 'Non', NULL, NULL, 'Mbarara', 18, 'no', '2020-05-12 17:28:58', NULL),
(12, 'Ivan Amanya', 'amanyaivan36@gmail.com', '10789254775', 'Non', NULL, NULL, 'Muyenga Kampala', 19, 'no', '2020-05-12 22:35:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoice`
--

CREATE TABLE `tblinvoice` (
  `id` int(11) NOT NULL,
  `Userid` int(11) DEFAULT NULL,
  `ServiceId` int(11) DEFAULT '0',
  `BillingId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT '1',
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinvoice`
--

INSERT INTO `tblinvoice` (`id`, `Userid`, `ServiceId`, `BillingId`, `quantity`, `PostingDate`) VALUES
(1, 1, 0, 917499331, NULL, '2020-02-04 22:50:32'),
(2, 4, 0, 164987120, NULL, '2020-03-04 23:16:36'),
(3, 5, 0, 895223240, NULL, '2020-03-06 12:57:15'),
(4, 6, 0, 680930820, NULL, '2020-03-06 13:38:10'),
(5, 7, 0, 989014683, NULL, '2020-03-06 13:49:31'),
(8, 5, 33, 286078338, 0, '2020-03-06 14:22:34'),
(9, 5, 33, 629400513, 0, '2020-03-06 14:50:48'),
(10, 5, 32, 629400513, 0, '2020-03-06 14:50:48'),
(12, 2, 0, 877127021, NULL, '2020-03-23 10:06:33'),
(13, 8, 0, 351227234, NULL, '2020-03-23 11:44:28'),
(14, 12, 0, 442505219, NULL, '2020-03-24 10:44:19'),
(15, 8, 35, 880646928, 0, '2020-04-03 21:04:45'),
(16, 8, 34, 880646928, 0, '2020-04-03 21:04:45'),
(17, 8, 33, 880646928, 0, '2020-04-03 21:04:45'),
(18, 8, 32, 880646928, 0, '2020-04-03 21:04:45'),
(19, 10, 0, 293603607, NULL, '2020-04-20 11:49:34'),
(20, 8, 35, 235756498, 0, '2020-04-28 12:31:43'),
(21, 8, 34, 235756498, 0, '2020-04-28 12:31:43'),
(22, 8, 33, 235756498, 0, '2020-04-28 12:31:43'),
(23, 8, 35, 353002358, 0, '2020-04-28 13:35:01'),
(24, 8, 32, 353002358, 0, '2020-04-28 13:35:02'),
(25, 8, 29, 353002358, 0, '2020-04-28 13:35:02'),
(26, 9, 12, 623109903, 0, '2020-04-28 13:38:08'),
(27, 9, 35, 151622335, 0, '2020-04-28 13:46:31'),
(28, 9, 34, 151622335, 0, '2020-04-28 13:46:31'),
(29, 9, 33, 151622335, 0, '2020-04-28 13:46:31'),
(30, 9, 32, 151622335, 0, '2020-04-28 13:46:31'),
(31, 9, 31, 151622335, 0, '2020-04-28 13:46:31'),
(32, 9, 30, 151622335, 0, '2020-04-28 13:46:31'),
(33, 9, 29, 151622335, 0, '2020-04-28 13:46:31'),
(34, 9, 28, 151622335, 0, '2020-04-28 13:46:31'),
(35, 9, 27, 151622335, 0, '2020-04-28 13:46:31'),
(36, 9, 26, 151622335, 0, '2020-04-28 13:46:31'),
(37, 17, 0, 605076948, NULL, '2020-05-08 13:26:24'),
(38, 10, 34, 459551710, 0, '2020-05-08 13:30:59'),
(39, 10, 33, 459551710, 0, '2020-05-08 13:30:59'),
(40, 10, 30, 330370294, 0, '2020-05-08 13:31:48'),
(41, 10, 34, 695874201, 2, '2020-05-12 15:46:55'),
(42, 10, 33, 695874201, 3, '2020-05-12 15:46:55'),
(43, 9, 34, 233201890, 0, '2020-05-12 16:10:17'),
(44, 9, 33, 233201890, 0, '2020-05-12 16:10:17'),
(45, 9, 32, 233201890, 0, '2020-05-12 16:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sample`
--

CREATE TABLE `tbl_sample` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sample`
--

INSERT INTO `tbl_sample` (`id`, `first_name`, `last_name`, `status`) VALUES
(2, 'Amos', 'Agaba', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `globals`
--
ALTER TABLE `globals`
  ADD PRIMARY KEY (`global_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `live_records`
--
ALTER TABLE `live_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reserve_id`);

--
-- Indexes for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `globals`
--
ALTER TABLE `globals`
  MODIFY `global_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `live_records`
--
ALTER TABLE `live_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

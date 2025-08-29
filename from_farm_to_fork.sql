-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2025 at 01:09 PM
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
-- Database: `from farm to fork`
--

-- --------------------------------------------------------

--
-- Table structure for table `agentpricedata`
--

CREATE TABLE `agentpricedata` (
  `price_id` int(11) NOT NULL,
  `record_date` date DEFAULT NULL,
  `product` varchar(20) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agentpricedata`
--

INSERT INTO `agentpricedata` (`price_id`, `record_date`, `product`, `agent_id`, `price`) VALUES
(1, '2025-01-01', 'Beef', 1, 640.00),
(2, '2025-01-01', 'Beef', 2, 660.00),
(3, '2025-01-01', 'Beef', 3, 700.00),
(4, '2025-01-01', 'Beef', 4, 630.00),
(5, '2025-01-01', 'Beef', 5, 650.00),
(6, '2025-01-01', 'Beef', 6, 690.00),
(7, '2025-02-01', 'Beef', 1, 650.00),
(8, '2025-02-01', 'Beef', 2, 670.00),
(9, '2025-02-01', 'Beef', 3, 710.00),
(10, '2025-03-01', 'Beef', 7, 650.00),
(11, '2025-03-01', 'Beef', 8, 670.00),
(12, '2025-03-01', 'Beef', 9, 715.00);

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `agent_id` int(11) NOT NULL,
  `agent_name` varchar(100) DEFAULT NULL,
  `agent_type` varchar(50) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`agent_id`, `agent_name`, `agent_type`, `region`, `contact_no`) VALUES
(1, 'Rahman Traders', 'Wholesaler', 'Dhaka', '01710000001'),
(2, 'Kamal Enterprise', 'Supplier', 'Dhaka', '01710000002'),
(3, 'Mina Meat House', 'Retailer', 'Dhaka', '01710000003'),
(4, 'Chattogram Meat Supply', 'Wholesaler', 'Chattogram', '01820000001'),
(5, 'Sultan Distributors', 'Supplier', 'Chattogram', '01820000002'),
(6, 'City Meat Shop', 'Retailer', 'Chattogram', '01820000003'),
(7, 'Rajshahi Agro Ltd', 'Wholesaler', 'Rajshahi', '01930000001'),
(8, 'Pabna Suppliers', 'Supplier', 'Rajshahi', '01930000002'),
(9, 'Fresh Meat Corner', 'Retailer', 'Rajshahi', '01930000003'),
(10, 'Khulna Traders', 'Wholesaler', 'Khulna', '01640000001'),
(11, 'Sylhet Meat Supply', 'Supplier', 'Sylhet', '01640000002'),
(12, 'Mymensingh Retail Point', 'Retailer', 'Mymensingh', '01640000003');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(50) DEFAULT NULL,
  `QuantityKg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`ProductID`, `ProductName`, `QuantityKg`) VALUES
(1, 'Beef', 200),
(2, 'Chicken', 150),
(3, 'Mutton', 120),
(4, 'Fish', 300),
(5, 'Pork', 180),
(6, 'Duck', 90),
(7, 'Turkey', 75),
(8, 'Goat Meat', 140),
(9, 'Lamb', 110),
(10, 'Pigeon', 60),
(11, 'Buffalo Meat', 220),
(12, 'Quail', 45),
(13, 'Camel Meat', 55),
(14, 'Rabbit', 80),
(15, 'Shrimp', 130);

-- --------------------------------------------------------

--
-- Table structure for table `livestockdata`
--

CREATE TABLE `livestockdata` (
  `record_id` int(11) NOT NULL,
  `record_date` date DEFAULT NULL,
  `division` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `livestock_count` int(11) DEFAULT NULL,
  `slaughter_rate` decimal(5,2) DEFAULT NULL,
  `meat_yield_kg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `livestockdata`
--

INSERT INTO `livestockdata` (`record_id`, `record_date`, `division`, `district`, `livestock_count`, `slaughter_rate`, `meat_yield_kg`) VALUES
(1, '2025-01-01', 'Dhaka', 'Dhaka District', 5000, 5.00, 2400),
(2, '2025-01-01', 'Chattogram', 'Comilla', 4000, 5.00, 2000),
(3, '2025-02-01', 'Dhaka', 'Dhaka District', 5200, 6.00, 2500),
(4, '2025-03-01', 'Dhaka', 'Gazipur', 3000, 4.00, 1100),
(5, '2025-03-01', 'Rajshahi', 'Rajshahi District', 3500, 6.00, 1800);

-- --------------------------------------------------------

--
-- Table structure for table `meatproductdata`
--

CREATE TABLE `meatproductdata` (
  `ProductID` int(11) NOT NULL,
  `Type` varchar(30) DEFAULT NULL,
  `Breed` varchar(50) DEFAULT NULL,
  `AvgWeightKg` decimal(6,2) DEFAULT NULL,
  `FeedConversionRatio` decimal(4,2) DEFAULT NULL,
  `RearingPeriodDays` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meatproductdata`
--

INSERT INTO `meatproductdata` (`ProductID`, `Type`, `Breed`, `AvgWeightKg`, `FeedConversionRatio`, `RearingPeriodDays`) VALUES
(1, 'Beef', 'Brahman', 500.00, 7.00, 730),
(2, 'Beef', 'Red Chittagong', 450.00, 6.80, 720),
(3, 'Beef', 'Sahiwal', 480.00, 6.90, 700),
(4, 'Beef', 'Holstein Friesian', 520.00, 7.20, 750),
(5, 'Chicken', 'Broiler', 2.50, 1.60, 45),
(6, 'Chicken', 'Layer', 2.00, 1.80, 50),
(7, 'Chicken', 'Deshi', 1.80, 2.20, 120),
(8, 'Chicken', 'Cobb 500', 2.70, 1.50, 42),
(9, 'Mutton', 'Black Bengal', 25.00, 5.00, 365),
(10, 'Mutton', 'Jamunapari', 30.00, 4.80, 400),
(11, 'Mutton', 'Boer', 35.00, 4.50, 380),
(12, 'Mutton', 'Sirohi', 28.00, 4.90, 370),
(13, 'Fish', 'Rohu', 1.20, 1.40, 180),
(14, 'Fish', 'Catla', 2.00, 1.30, 200),
(15, 'Fish', 'Tilapia', 1.50, 1.20, 150);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` varchar(10) NOT NULL,
  `Customer` varchar(100) DEFAULT NULL,
  `OrderedBy` varchar(50) DEFAULT NULL,
  `Product` varchar(50) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `Customer`, `OrderedBy`, `Product`, `Quantity`, `Price`, `Status`) VALUES
('O-001', 'Shop A', 'Agent', 'Beef', 20, 15000.00, 'Pending'),
('O-002', 'Shop B', 'Retailer', 'Chicken', 15, 7500.00, 'Shipped'),
('O-003', 'Shop C', 'Agent', 'Mutton', 10, 12000.00, 'Pending'),
('O-004', 'Shop D', 'Retailer', 'Fish', 30, 9000.00, 'Delivered'),
('O-005', 'Shop E', 'Agent', 'Beef', 25, 18750.00, 'Pending'),
('O-006', 'Shop F', 'Retailer', 'Chicken', 40, 20000.00, 'Shipped'),
('O-007', 'Shop G', 'Agent', 'Mutton', 12, 14400.00, 'Delivered'),
('O-008', 'Shop H', 'Retailer', 'Fish', 18, 5400.00, 'Pending'),
('O-009', 'Shop I', 'Agent', 'Beef', 35, 26250.00, 'Shipped'),
('O-010', 'Shop J', 'Retailer', 'Chicken', 22, 11000.00, 'Delivered'),
('O-011', 'Shop K', 'Agent', 'Mutton', 8, 9600.00, 'Pending'),
('O-012', 'Shop L', 'Retailer', 'Fish', 28, 8400.00, 'Shipped'),
('O-013', 'Shop M', 'Agent', 'Beef', 15, 11250.00, 'Delivered'),
('O-014', 'Shop N', 'Retailer', 'Chicken', 12, 6000.00, 'Pending'),
('O-015', 'Shop O', 'Agent', 'Mutton', 20, 24000.00, 'Shipped');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`) VALUES
(1, 'Fresh Beef', 10.00, 50),
(2, 'Organic Chicken', 6.00, 80),
(3, 'Tender Mutton', 12.00, 40),
(4, 'Bacon', 8.00, 60),
(5, 'Chicken Sausages', 5.00, 100),
(6, 'Beef Steak', 15.00, 30),
(7, 'Chicken Nuggets', 7.00, 120),
(8, 'Burger Patty', 4.00, 150),
(9, 'Goat Meat', 13.50, 35),
(10, 'Duck Meat', 9.00, 45),
(11, 'Fish Fillet', 11.00, 70),
(12, 'Pork Ribs', 14.00, 25),
(13, 'Turkey Breast', 16.00, 20),
(14, 'Lamb Chops', 18.50, 15),
(15, 'Salmon', 20.00, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agentpricedata`
--
ALTER TABLE `agentpricedata`
  ADD PRIMARY KEY (`price_id`),
  ADD KEY `agent_id` (`agent_id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `livestockdata`
--
ALTER TABLE `livestockdata`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `meatproductdata`
--
ALTER TABLE `meatproductdata`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agentpricedata`
--
ALTER TABLE `agentpricedata`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `livestockdata`
--
ALTER TABLE `livestockdata`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `meatproductdata`
--
ALTER TABLE `meatproductdata`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agentpricedata`
--
ALTER TABLE `agentpricedata`
  ADD CONSTRAINT `agentpricedata_ibfk_1` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`agent_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

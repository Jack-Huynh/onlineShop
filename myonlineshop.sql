-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2022 at 06:58 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myonlineshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Status` int(11) NOT NULL,
  `secCode` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Email`, `Password`, `Status`, `secCode`) VALUES
(21, 'quyquy@yopmail.com', 'q123123123', 1, ''),
(43, 'quyquydddd@yopmail.com', 'dddd123', 0, '524158'),
(44, 'quyquyss@yopmail.com', 'sss1234', 0, '893374'),
(45, 'a@gmail.com', 'asdf123', 0, '595557'),
(46, 'nhansu23@gmail.com', '12345qwe', 0, '385961'),
(47, 'hoangphuchuynh2003@gmail.com', 'P132003', 0, '873171');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `ParentID` int(11) NOT NULL,
  `CategoryName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `ParentID`, `CategoryName`, `Description`) VALUES
(1, 12, 'Athletic', 'Running, turf, basketball, training, etc'),
(2, 3, 'Boots', 'Laced, Snow, Cowboy, Army, etc'),
(3, 1, 'Everyday footwear', 'sandals, flipflop, socks, sneakers,etc');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` text COLLATE utf8_unicode_ci NOT NULL,
  `ContactName` text COLLATE utf8_unicode_ci NOT NULL,
  `Address` text COLLATE utf8_unicode_ci NOT NULL,
  `Addresses` text COLLATE utf8_unicode_ci NOT NULL,
  `City` text COLLATE utf8_unicode_ci NOT NULL,
  `PostalCode` text COLLATE utf8_unicode_ci NOT NULL,
  `Country` text COLLATE utf8_unicode_ci NOT NULL,
  `Phone` int(12) NOT NULL,
  `Username` text COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `CustomerName`, `ContactName`, `Address`, `Addresses`, `City`, `PostalCode`, `Country`, `Phone`, `Username`, `Password`, `Email`, `Status`) VALUES
(69, 'we', 'we', 'we', '[{\"AddressName\":\"Default\",\"Addresses\":\"we\",\"Phone\":\"2222222\",\"isDefault\":true}]', 'we', 'we', 'we', 2222222, 'we', 'we123456', '', 0),
(77, 'b', 'b', 'b', '[{\"AddressName\":\"Default\",\"Addresses\":\"b\",\"Phone\":\"4\",\"isDefault\":true}]', 'b', 'b', 'b', 4, 'bbb', '1234567We', '', 0),
(83, 'Jack', 'J', '12222', '[{\"AddressName\":\"Default\",\"Addresses\":\"a\",\"Phone\":\"12\",\"isDefault\":false},{\"AddressName\":\"office\",\"Addresses\":\"12222\",\"Phone\":\"1111111\",\"isDefault\":true}]', 'Halifax', '1', 'C', 1111111, 'Jack', '12345jack', '', 0),
(84, 'Hamlet', 'Lin', 'zzz', '[{\"AddressName\":\"Default\",\"Addresses\":\"a\",\"Phone\":\"123\",\"isDefault\":false},{\"AddressName\":\"office\",\"Addresses\":\"zzz\",\"Phone\":\"12321\",\"isDefault\":true}]', 'Halifax', 'A9A 9A9', 'Canada', 12321, 'Hamlet Lin', 'hamlet123', '', 0),
(85, 'Jack', 'Jackie', 'qwertyuiop', '[{\"AddressName\":\"Default\",\"Addresses\":\"qwerty\",\"Phone\":\"1234321\",\"isDefault\":true}]', 'Halifax', 'A9A 9A9', 'Canada', 1234321000, 'Jack', '123456j', '', 0),
(86, 'Michael', 'Mike', 'asd', '[{\"AddressName\":\"Default\",\"Addresses\":\"asd\",\"Phone\":\"\",\"isDefault\":true}]', 'Halifax', 'A9A 9A9', 'Canada', 0, 'Michael', 'm1234567', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderDetailID` int(10) NOT NULL,
  `OrderID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `Quantity` int(100) NOT NULL,
  `Sum` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`OrderDetailID`, `OrderID`, `ProductID`, `Quantity`, `Sum`) VALUES
(39, 45, 16, 1, 1),
(40, 46, 10, 3, 66),
(41, 47, 15, 2, 642),
(42, 48, 22, 2, 300),
(43, 49, 15, 2, 642),
(44, 50, 15, 2, 642),
(45, 50, 17, 1, 300),
(46, 51, 15, 2, 642),
(47, 51, 17, 1, 300),
(48, 51, 18, 3, 60),
(49, 52, 17, 1, 300),
(50, 52, 18, 1, 20),
(51, 52, 20, 2, 180);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(50) NOT NULL,
  `CustomerID` int(50) NOT NULL,
  `CustomerName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Address` text COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `OrderDate` date NOT NULL,
  `Total` float NOT NULL,
  `secCode` int(10) NOT NULL,
  `Status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `CustomerName`, `Address`, `Phone`, `OrderDate`, `Total`, `secCode`, `Status`) VALUES
(45, 83, 'Jack', 'a', '12', '0000-00-00', 1, 188111, 2),
(46, 83, 'Jack', 'sssss', '999', '0000-00-00', 66, 651398, 1),
(47, 83, 'Jack', 'sssss', '987654321', '0000-00-00', 642, 529434, 1),
(48, 83, 'Jack', '12222', '1111111', '0000-00-00', 300, 285879, 0),
(49, 84, 'Hamlettt', 'zzzccc', '12321444', '0000-00-00', 642, 613304, 1),
(50, 84, 'Hamletlll', 'zzzqqq', '12321111', '0000-00-00', 942, 239631, 0),
(51, 84, 'Hamlet', 'zzz', '12321', '0000-00-00', 1002, 275763, 0),
(52, 83, 'Jackie', '12222111', '11111112', '0000-00-00', 500, 768083, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `orderStatusID` int(11) NOT NULL,
  `statusName` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`orderStatusID`, `statusName`, `Description`) VALUES
(0, 'New', ''),
(1, 'Shipping', ''),
(2, 'Cancelled', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SupplierID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Image` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `SupplierID`, `CategoryID`, `Price`, `Image`) VALUES
(10, 'not adidas', 1, 1, 22, '0.jpg'),
(13, 'not Oxford', 2, 2, 123, '3.jpg'),
(14, 'not puma', 1, 3, 3, '1.jpg'),
(15, 'not timberland', 4, 2, 321, '8.jpg'),
(16, 'not crocs', 5, 3, 1, '7.jpg'),
(17, 'not fila', 6, 1, 300, '0.jpg'),
(18, 'not asics', 7, 1, 20, '5.jpg'),
(19, 'not the North face', 8, 3, 5, '9.jpg'),
(20, 'not Discover', 1212, 2, 90, '10.jpg'),
(21, 'not mlb', 321, 3, 15, '11.jpg'),
(22, 'not New Balance', 911, 1, 150, '6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderDetailID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`orderStatusID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `OrderDetailID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

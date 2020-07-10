-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2020 at 03:03 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `image`, `price`, `quantity`) VALUES
(3, 'RED BELLIES', 'images/nike/b2.jpg', 233, 12),
(5, 'BANK SNEAKERS', 'images/nike/b3.jpg', 5000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_brand` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `description`, `quantity`, `product_brand`) VALUES
(1, 'RUNNING SHOES', 'images/nike/b4.jpg', 3000, 'The Nike Blazer Mid \'77 Vintage harnesses the old-school look of Nike Basketball with a vintage midsole finish, making it look like you\'ve been saving them for years.\r\n\r\nColour Shown: White/Black', 4, 'nike'),
(3, 'RED BELLIES', 'images/nike/b2.jpg', 233, '', 5, ''),
(5, 'BANK SNEAKERS', 'images/nike/b3.jpg', 5000, 'Bring the past into the future with the Nike Air Max 2090. Inspired by the iconic Air Max 90, the 2090 features Nike Air cushioning underfoot that adds unparalleled comfort, while transparent mesh on the upper is blended with timeless OG features for an edgy, modernised look.\r\n\r\nColour Shown: Black/Metallic Silver/White', 1, 'nike'),
(6, 'SUKUN CASUALS', 'images/adidas/s1.jpg', 2500, 'The radiance lives on in the Nike Air Force 1 \'07 Premium, the legendary design that puts a fresh football spin on what you know best: stitched overlays, bold colours and the perfect amount of flash to make you shine. Celebrating the home and away kits of your favorite teams, the soft leather on the upper features a rub-away material that reveals a secondary color through normal wear. The new tongue graphic combines with other fun, discoverable details to add energy to the classic, street approved design.\r\n\r\nColour Shown: Vast Grey/Mega Blue/Sail/Challenge Red', 1, 'adidas'),
(9, 'Nike Air VaporMax Flyknit 3', 'images/adidas/s2.jpg', 5000, 'The radiance lives on in the Nike Air Force 1 \'07 Premium, the legendary design that puts a fresh football spin on what you know best: stitched overlays, bold colours and the perfect amount of flash to make you shine. Celebrating the home and away kits of your favorite teams, the soft leather on the upper features a rub-away material that reveals a secondary color through normal wear. The new tongue graphic combines with other fun, discoverable details to add energy to the classic, street approved design.', 5, 'adidas'),
(10, 'Nike Air Force 1 \'07 Premium', 'images/adidas/s3.jpg', 5000, 'Nike Air Force 1 \'07 Premium', 2, 'adidas'),
(11, 'Nike Court Vintage Premium', 'images/adidas/s4.jpg', 2000, 'The Nike Court Vintage Premium embodies \'80s tennis at its best—laid-back and stylish. The smooth leather upper is combined with micro-branding for a relaxed look and feel, while the cushioned sockliner provides smooth comfort with every step.\r\n\r\nColour Shown: White/Total Orange/Black', 5, 'adidas'),
(12, 'Nike Air Max 2090 BETRUE', 'images/adidas/s5.jpg', 3000, 'March into the future in your Nike Air Max 2090 BETRUE, a bold new look inspired by the iconic Air Max 90. Celebrating the LGBTQIA+ community, the airy upper features translucent fabric to reveal a vibrant array of Pride colours beneath. Its asymmetrical design, decorative stitching and see-through TPU heel clip add an edgy, modernised look while super-soft Nike Air cushions your journey.\r\n\r\nColour Shown: Multi-Colour/Black/Digital Pink', 5, 'adidas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `name` (`name`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

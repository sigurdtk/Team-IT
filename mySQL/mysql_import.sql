
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
   `category` varchar(60) NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`product_code`)
) AUTO_INCREMENT=1 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `category`, `price`) VALUES
(1, 'PD1001', 'Android Phone FX1', 'Denne telefonen har en 2 GHZ dual-core prosessor, perfekt til all bruk. ', 'android-phone.jpg', 'telefon', '200.50'),
(2, 'PD1002', 'Television DXT', 'Konge TV', 'lcd-tv.jpg', 'TV', '500.85'),
(3, 'PD1003', 'External Hard Disk',  'Flott HDD','external-hard-disk.jpg', 'HDD', '100.00'),
(4, 'PD1004', 'Wrist Watch GE2', 'Bra klokke', 'wrist-watch.jpg', 'Klokke', '400.30');
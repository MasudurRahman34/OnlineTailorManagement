-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2018 at 06:33 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tailorshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `catid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`catid`, `name`) VALUES
(1, 'polyester/cotton '),
(2, 'TR Twill Fabric'),
(3, 'Yarn Dyed Flannel'),
(4, ' Rayon Lycra'),
(5, 'Pinpoint Oxford'),
(6, 'Chambray'),
(7, 'Dobby'),
(8, 'End-on-End'),
(9, 'Melange'),
(10, 'Oxford Cloth'),
(11, 'Poplin'),
(12, 'Herringbone'),
(13, 'Seersucke');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_email`, `phone`, `customer_name`, `city`, `postal_code`, `address`) VALUES
(1, 'Mohammadshuvo205@gmail.com', '01704470171', 'Mohammad Shuvo', 'Dhaka', '1207', 'Houe no. 201, Road no 27, Mohammadpur, shekertek Dhaka'),
(2, 'shihav@gmail.com', '01826381263', 'Md Shihav', 'khustia', '1509', 'Houe no. 60, Road no 56, mirdanga, Khustia'),
(3, 'Murad@yahoo.com', '01934697233', 'Mohammad murad', 'Khulna', '1904', 'House. 128, Road no 67, Iqbal Road, Khulna'),
(38, 'Jahangir2@gmail.com', '01740621231', 'mohammad Jahangir', 'jessore', '1254', 'jessore, sagardari, h 2/13'),
(39, 'shaoun@gmail.com', '10873498537', 'Md shaoun', 'kheshobpur', '9844', 'kheshobpur, 2/3 house no 45'),
(40, 'rahman@gmail.com', '01825501775', 'rahman ', 'dhaka', '1208 ', 'mohammoud pur 12/ 1 c '),
(41, 'sakialhassan@gmail.com', '098653', 'sakib al hassan ', 'dhak ', '1208 ', '1/c baridhara , dhaka '),
(42, 'manikmia@gmail.com', '1207460', 'manik mia ', 'khulan ', '2309', 'khulna shader . main road '),
(44, 'subo@gmail.com', '2309864', 'subo islam ', 'dhaka ', '1208', 'cr colony, shubas das. dhaka 201 /1st floor.    '),
(45, 'khan@gmail.com', '2309864', 'hossian khan ', 'dhaka ', '1208', 'cr colony, shubas das. dhaka 201 /1st floor.    '),
(46, 'aliea@gmail.com', '99922276', 'aliea bhat', 'india ', '3409', 'kalkuta. bbosh lane .21/1 '),
(47, 'mulon@gmail.com', '6780543', 'hasham khan ', 'shylet ', '1345', 'balue math, goverment mc collage. 21/4  '),
(48, 'Amir@gmail.com', '017509880006', 'Mohammad Amir', 'khulna', '3874', '2/3 bari/ house, khuna'),
(49, 'tusar@gmail.com', '0175098834546', 'Mohammad tusar', 'dhanmondi', '3874', '2/4 bari/ house, dhanmondi, dhaka'),
(50, 'najmul@gmail.com', '01750988546', 'Mohammad najmul', 'Mirpur', '3874', '2/4 bari/ house, Mirpur, dhaka'),
(51, 'shamim@gmail.com', '017504368732', 'shamim khan', 'shylet', '4774', 'jinda bazar, road, 5, h 3/4');

-- --------------------------------------------------------

--
-- Table structure for table `fabric_order`
--

CREATE TABLE `fabric_order` (
  `foid` varchar(255) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `order_date` date NOT NULL,
  `hire_status` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `cash` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fabric_order`
--

INSERT INTO `fabric_order` (`foid`, `customer_email`, `product_id`, `size`, `total_price`, `order_date`, `hire_status`, `status`, `cash`) VALUES
('foid020C56599F', 'sajib@gamil.com', 'pro3658855', 'Standard', 1250.25, '2018-04-19', 'no', 1, 'Cash On Delivary'),
('foid0DC8F15B6D', 'ra@gamil.com', 'pro3658855', 'Standard', 1250.25, '2018-04-19', 'no', 1, 'Cash On Delivary'),
('foid2AF30520A3', 'mulon@gmail.com', 'pro365865', 'Standard', 1050.75, '2018-04-26', 'no', 1, 'Cash On Delivary'),
('foid2E2A97FE21', 'manikmia@gmail.com', 'proBF4B22', 'Cash On Delivary', 1099, '2018-04-26', 'no', 1, 'Cash On Delivary'),
('foid3747D39651', 'sdfgsdf@gmail.com', 'pro2', 'Cash On Delivary', 1050.75, '2018-04-19', 'no', 0, 'Cash On Delivary'),
('foid516A1CB54F', 'Ripon1@gmail.com', 'pro1', 'Cash On Delivary', 990, '2018-04-18', 'no', 0, 'Cash On Delivary'),
('foid5F522BA920', 'manikmia@gmail.com', 'proBF4B22', 'Cash On Delivary', 1099, '2018-04-26', 'no', 1, 'Cash On Delivary'),
('foidB554A8F2D5', 'tusar@gmail.com', 'pro3658855', 'Cash On Delivary', 1250.25, '2018-04-26', 'no', 0, 'Cash On Delivary'),
('foidD18ADFCA46', 'subo@gmail.com', 'pro44516D', 'Standard', 999, '2018-04-26', 'no', 0, 'Cash On Delivary'),
('foidE6350E42DA', 'rahman@gmail.com', 'pro80EF07', 'Standard', 899, '2018-04-26', 'no', 1, 'Cash On Delivary'),
('foidF056889FDE', 'Amir@gmail.com', 'pro3658855', 'Standard', 1250.25, '2018-04-26', 'no', 0, 'Cash On Delivary');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(50) NOT NULL,
  `product_typeid` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) CHARACTER SET cp1250 COLLATE cp1250_bin NOT NULL,
  `ddate` date NOT NULL,
  `Season` varchar(50) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_typeid`, `title`, `price`, `body`, `image`, `author`, `tags`, `ddate`, `Season`, `weight`) VALUES
('pro0CA4E6', 'pbo10', 'Broadcloth  referred to as poplin', 999, '<p><a title=\"Broadcloth Fabric\" href=\"http://propercloth.com/reference/broadcloth-fabric/\">Broadcloth</a>&mdash;often referred to as&nbsp;poplin&ndash;is a tightly woven fabric with a very simple over-under weave and very little&nbsp;sheen, which makes it nice and professional. Broadcloths are great for guys looking for as little texture as possible in their fabrics. They are generally a thinner, lighter fabric. Particularly,&nbsp;<a title=\"White Broadcloth Fabrics\" href=\"http://propercloth.com/fabrics/white/broadcloth\">white broadcloth fabrics</a>&nbsp;can be slightly transparent. Broadcloths generally wear the smoothest out of all weaves thanks to their lack of texture, but can also be the most prone to wrinkling.</p>', 'upload/2d39e6a0e1.png', 'admin ', 'light blue ', '2018-03-09', 'summer ', 102),
('pro345898', 'pb02', 'white thin material', 990, '<p>Twill fabrics are easily recognizable because they will show diagonal weave or texture. The diagonal effect can range from very fine, subtle twills to much larger Imperial or Cavalry twills. Twills will almost always have a bit of shine, though the degree can depend on the weave, color, and cotton used. Twill is an extremely tight weave,  that can come in extremely high thread counts, some of which might be mistaken for silk. Because of the diagonal texture twill is a bit softer than broadcloth and will drape more easily. Twill won’t give you the same “crisp” look that freshly pressed broadcloth can, but it’s relatively easy to iron and resistant to wrinkles..<p\\>', 'upload/whitethin.jpg', 'Masud', 'white thin material', '2018-03-09', 'spring/ sutmn', 130),
('pro365865', 'pb03', 'blue thing material', 1050.75, '<p>Twill fabrics are easily recognizable because they will show diagonal weave or texture. The diagonal effect can range from very fine, subtle twills to much larger Imperial or Cavalry twills. Twills will almost always have a bit of shine, though the degree can depend on the weave, color, and cotton used. Twill is an extremely tight weave,  that can come in extremely high thread counts, some of which might be mistaken for silk. Because of the diagonal texture twill is a bit softer than broadcloth and will drape more easily. Twill won’t give you the same “crisp” look that freshly pressed broadcloth can, but it’s relatively easy to iron and resistant to wrinkles..<p\\>', 'upload/blue.jpg', 'Masud', 'blue thing material', '2018-03-09', 'summer/rain', 113),
('pro3658855', 'pb02', 'light blue and green check', 1250.25, '<p>Twill fabrics are easily recognizable because they will show diagonal weave or texture. The diagonal effect can range from very fine, subtle twills to much larger Imperial or Cavalry twills. Twills will almost always have a bit of shine, though the degree can depend on the weave, color, and cotton used. Twill is an extremely tight weave,  that can come in extremely high thread counts, some of which might be mistaken for silk. Because of the diagonal texture twill is a bit softer than broadcloth and will drape more easily. Twill won’t give you the same “crisp” look that freshly pressed broadcloth can, but it’s relatively easy to iron and resistant to wrinkles..<p\\>', 'upload/checkblue.jpg', 'admin', 'light blue', '2018-03-09', 'spring/autumn', 141),
('pro44516D', 'pb014', 'denim as the fabric of our jeans', 999, '<p>We all know denim as the fabric of our jeans. &nbsp;But construction wise, denim is a twill fabric. A sturdy, possibly coarser twill often dyed with indigo. &nbsp;For the most part though, when it comes to denim shirting, you&rsquo;re mostly going to find much softer, lighter versions of the fabric than what your jeans are made of. &nbsp;Denim shirting can come in many forms but generally have a&nbsp;different color on the inside than the outside.</p>', 'upload/bad88a7747.png', 'mishuk ', 'white bule ', '2018-03-09', 'winter ', 102),
('pro80EF07', 'pb12', ' Pinpoint oxford ', 899, '<p>Pinpoint&nbsp;(also referred to as&nbsp;pinpoint oxford) has the same weave as oxford cloth, although it uses a finer yarn and tighter weave. It is more formal than oxford cloth, but less formal than broadcloth or twill. Think of them as great everyday work shirts, but not necessarily the first recommendation&nbsp;for special events. Pinpoint fabrics are generally not transparent and are slightly heavier and thicker than broadcloths. Because of their heavier construction, pinpoints are fairly durable fabrics. Opt&nbsp;for a twill or broadcloth if you&rsquo;re looking for a formal shirt.</p>', 'upload/aeea87be7b.png', 'admin ', 'pink white ', '2018-03-09', 'summer ', 99),
('proBF4B22', 'pb11', 'Twill fabrics', 1099, '<p>Twill fabrics are&nbsp;easily recognizable because they will show diagonal weave or texture. The diagonal effect can range from very fine, subtle twills to much larger Imperial or Cavalry twills. Twills will almost always have a bit of shine, though the degree can depend on the weave, color, and cotton used.&nbsp;Twill&nbsp;is an extremely tight weave, &nbsp;that can come in extremely high thread counts, some of which might be mistaken for silk. Because of the diagonal texture twill is a bit softer than broadcloth and will drape more easily. Twill won&rsquo;t give you the same &ldquo;crisp&rdquo; look that freshly pressed broadcloth can, but it&rsquo;s relatively easy to iron and resistant to wrinkles.</p>', 'upload/53fd2c5314.png', 'admin ', 'white ', '2018-03-09', 'summer', 80);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_typeid` varchar(50) NOT NULL,
  `cid` int(11) NOT NULL,
  `product_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_typeid`, `cid`, `product_type`) VALUES
('pb014', 7, 'Denim'),
('pb02', 1, 'Flannel'),
('pb03', 2, '100% cotton'),
('pb05', 2, 'TW TWill Fabric'),
('pb06', 3, 'yarn dyed flannel'),
('pb11', 3, 'Twill'),
('pb12', 5, 'Pinpoint Oxford'),
('pb13', 6, 'Chambray'),
('pbo10', 2, 'Broadcloth');

-- --------------------------------------------------------

--
-- Table structure for table `shirt_design`
--

CREATE TABLE `shirt_design` (
  `design_id` varchar(255) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `pocket` varchar(50) NOT NULL,
  `sleeve` varchar(50) NOT NULL,
  `front` varchar(50) NOT NULL,
  `back_pleats` varchar(50) NOT NULL,
  `bottom` varchar(50) NOT NULL,
  `collar` varchar(50) NOT NULL,
  `cuffs` varchar(50) NOT NULL,
  `other` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `ddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shirt_design`
--

INSERT INTO `shirt_design` (`design_id`, `customer_email`, `product_id`, `pocket`, `sleeve`, `front`, `back_pleats`, `bottom`, `collar`, `cuffs`, `other`, `status`, `ddate`) VALUES
('1', 'Jahid@gmail.com', 'pro2', 'Classic pocket', '27', 'French Placket', 'Plain Pleats', 'Tri-Tab Bottom', 'Italian Collar', 'Round Cuffs', 'shoulder Epaucattes, ,Front Se', 1, '2018-03-25'),
('3', 'Rapon@gmail.com', 'pro2', 'No Pocket ', '64', 'French Placket', 'Plain Pleats', 'Tri-Tab Bottom', 'Italian Collar', 'Round Cuffs', 'shoulder Epaucattes, ,Front Se', 1, '0000-00-00'),
('des3B70BF', 'shamim@gmail.com', 'pro345898', 'No Pocket ', '27', 'French Placket', 'Plain Pleats', 'Tri-Tab Bottom', 'Italian Collar', 'Round Cuffs', 'none,design only', 1, '2018-04-26'),
('des449E4A', 'khan@gmail.com', 'pro44516D', 'Round With Glass', '23', 'Hidden Placket', 'Box pleats', 'Straight Vents Bottoms', 'Italian Collar', 'Round Cuffs', 'only design, ,none', 0, '0000-00-00'),
('des4D3DF1', 'najmul@gmail.com', 'pro3658855', 'No Pocket ', '18', 'French Placket', 'Plain Pleats', 'Straight Vents Bottoms', 'Italian Collar', 'Round Cuffs', 'only design, ,none', 0, '0000-00-00'),
('des688339', 'shaoun@gmail.com', 'pro345898', 'No Pocket ', '29', 'French Placket', 'Plain Pleats', 'Tri-Tab Bottom', 'Italian Collar', 'Round Cuffs', 'none,design only', 1, '2018-04-26'),
('des76D2BF', 'mukul@gmail.com', 'pro345898', 'No Pocket ', '64', 'French Placket', 'Plain Pleats', 'Tri-Tab Bottom', 'Italian Collar', 'Round Cuffs', 'none,design only', 1, '0000-00-00'),
('des789256', 'sakialhassan@gmail.com', 'pro0CA4E6', 'Diamond Flap', '23', 'box Placket', 'Side Pleats', 'Tri-Tab Bottom', 'Cut Away', 'French Ancgle Cuffs', 'only design, ,none', 0, '0000-00-00'),
('des8DB0AE', 'aliea@gmail.com', 'proBF4B22', 'No Pocket ', '23', 'box Placket', 'Box pleats', 'Tri-Tab Bottom', 'French Collar', 'Round Cuffs', 'only design, ,none', 0, '0000-00-00'),
('des8E5F04', 'Jahangir2@gmail.com', 'pro345898', 'No Pocket ', '24', 'French Placket', 'Plain Pleats', 'Tri-Tab Bottom', 'Italian Collar', 'Round Cuffs', 'none,design only', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `shirt_measurment`
--

CREATE TABLE `shirt_measurment` (
  `measurment_id` int(11) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `neck` int(11) NOT NULL,
  `chest` int(11) NOT NULL,
  `waist` int(11) NOT NULL,
  `hip` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `sleeve` int(11) NOT NULL,
  `fitness` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shirt_measurment`
--

INSERT INTO `shirt_measurment` (`measurment_id`, `customer_email`, `neck`, `chest`, `waist`, `hip`, `length`, `sleeve`, `fitness`) VALUES
(14, 'mukul@gmail.com', 12, 34, 35, 36, 13, 64, 'body fit'),
(15, 'Jahangir2@gmail.com', 12, 14, 13, 25, 28, 24, 'body fit'),
(16, 'shaoun@gmail.com', 12, 24, 25, 26, 27, 29, 'body fit'),
(17, 'sakialhassan@gmail.com', 14, 34, 27, 38, 37, 23, 'body fit'),
(18, 'khan@gmail.com', 22, 36, 24, 36, 24, 23, 'body fit'),
(19, 'aliea@gmail.com', 12, 23, 43, 34, 23, 23, 'body fit'),
(20, 'najmul@gmail.com', 23, 34, 35, 56, 19, 18, 'body fit'),
(21, 'shamim@gmail.com', 23, 34, 24, 75, 20, 27, 'body fit');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70'),
(2, 'shuvo', '202cb962ac59075b964b07152d234b70'),
(3, 'minhaj', '202cb962ac59075b964b07152d234b70'),
(4, 'rokon', '202cb962ac59075b964b07152d234b70'),
(5, 'bably', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `fabric_order`
--
ALTER TABLE `fabric_order`
  ADD PRIMARY KEY (`foid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_1` (`product_typeid`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_typeid`),
  ADD KEY `fk_3` (`cid`);

--
-- Indexes for table `shirt_design`
--
ALTER TABLE `shirt_design`
  ADD PRIMARY KEY (`design_id`),
  ADD KEY `fk_7` (`customer_email`);

--
-- Indexes for table `shirt_measurment`
--
ALTER TABLE `shirt_measurment`
  ADD PRIMARY KEY (`measurment_id`),
  ADD KEY `fk_6` (`customer_email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `shirt_measurment`
--
ALTER TABLE `shirt_measurment`
  MODIFY `measurment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`product_typeid`) REFERENCES `product_type` (`product_typeid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_type`
--
ALTER TABLE `product_type`
  ADD CONSTRAINT `fk_3` FOREIGN KEY (`cid`) REFERENCES `catagory` (`catid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

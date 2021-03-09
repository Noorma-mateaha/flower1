-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2021 at 02:52 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flower`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_lastname` varchar(50) NOT NULL,
  `customer_sex` varchar(20) NOT NULL,
  `customer_tel` varchar(10) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `customer_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_lastname`, `customer_sex`, `customer_tel`, `customer_address`, `customer_username`, `customer_password`) VALUES
(1, 'นูรมา', 'มะแตหะ', 'หญิง', '0936736916', '181 ตำบลรูสะมีแล อำเภอเมืองปัตตานี จังหวัดปัตตานี 94000', 'numa', '1234'),
(2, 'ฮายาตี', 'อีปง', 'หญิง', '0862983101', 'ยะรัง ปัตตานี', '', ''),
(3, 'ฮายาตี', 'อีปง', 'หญิง', '0862983101', 'ยะรัง ปัตตานี', 'hayatee', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(10) NOT NULL,
  `manufacture_id` int(10) NOT NULL,
  `delivery_date` date NOT NULL,
  `status_delivery` varchar(20) NOT NULL DEFAULT 'ยังไม่จัดส่ง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `manufacture_id`, `delivery_date`, `status_delivery`) VALUES
(1, 1, '2021-02-22', 'จัดส่งแล้ว'),
(2, 2, '0000-00-00', 'ยังไม่จัดส่ง'),
(3, 3, '2021-02-23', 'จัดส่งแล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(10) NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `employee_lastname` varchar(50) NOT NULL,
  `employee_sex` varchar(20) NOT NULL,
  `employee_address` varchar(100) NOT NULL,
  `employee_tel` varchar(10) NOT NULL,
  `employee_username` varchar(50) NOT NULL,
  `employee_password` varchar(50) NOT NULL,
  `employee_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `employee_lastname`, `employee_sex`, `employee_address`, `employee_tel`, `employee_username`, `employee_password`, `employee_level`) VALUES
(1, ' นูรมา ', 'มะแตหะ', '-', 'รูสะมีเเล อำเภอเมือง จังหวัดปัตตานี 94000', '0957845620', 'numa', '1234', 'E'),
(2, 'ฮายาตี', 'อีปง', 'หญิง', '24 ต.ยะรัง อ.ยะรัง จ.ปัตตานี', '0947583854', 'hayatee', '1234', 'E'),
(3, 'มาเรียม', 'บันสุรี', 'หญิง', '50/1 ต.แม่หวาด อ.ธารโต จ.ยะลา', '0853764532', 'mariam', '1234', 'E'),
(4, 'อะรีน่า', 'หลีหนุด', 'หญิง', '103/4 ม.3 จ.ปัตตานี', '0975486533', 'areena', '1234', 'E');

-- --------------------------------------------------------

--
-- Table structure for table `genre_product`
--

CREATE TABLE `genre_product` (
  `genre_product_id` int(10) NOT NULL,
  `genre_product_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre_product`
--

INSERT INTO `genre_product` (`genre_product_id`, `genre_product_name`) VALUES
(6, 'กระเช้า'),
(7, 'กระถาง'),
(8, 'กรอบรูป'),
(9, 'เข็มกลัดติดเสื้อ'),
(10, 'ช่อดอกไม้');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` int(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `name`, `lastname`, `sex`, `tel`, `address`, `username`, `password`, `level`) VALUES
(1, 'สีตีอาอีเสาห์', 'บาเฮง', 'หญิง', '0936736916', 'รูสะมีแล อำเภอเมืองปัตตานี จังหวัดปัตตานี ', 'ืีchoh', 1234, 'M'),
(2, 'ฮายาตี', 'อีปง', 'หญิง', '0854387623', 'จ.ปัตตานี', 'hayatee', 1234, 'M'),
(3, 'ไวดา', 'เลาะดีสม', 'หญิง', '0947583854', 'จ.ยะลา', 'waida', 1234, 'M'),
(4, 'ซูนัย', 'ดาเล็ง', 'หญิง', '0947837583', 'จ.ปัตตานี', 'nai', 1234, 'M'),
(5, 'numa', 'ma', 'หญิง', '0936736916', 'รูสะมีแล อำเภอเมืองปัตตานี จังหวัดปัตตานี ', 'numa', 1234, 'M'),
(6, 'อินซาน', 'กูโน', 'หญิง', '0987456321', '103/4 ม.3 จ.ปัตตานี', 'insan', 1234, 'M'),
(7, 'ฮายาตี', 'อีปง', 'หญิง', '0947583854', '24 ต.ยะรัง อ.ยะรัง จ.ปัตตานี', 'hayatee', 1234, 'E'),
(8, 'มาเรียม', 'บันสุรี', 'หญิง', '0853764532', '50/1 ต.แม่หวาด อ.ธารโต จ.ยะลา', 'mariam', 1234, 'E'),
(9, 'อะรีน่า', 'หลีหนุด', 'หญิง', '0975486533', '103/4 ม.3 จ.ปัตตานี', 'areena', 1234, 'E'),
(10, 'Aesoh', 'Saae', 'หญิง', '0936736916', 'จ.ปัตตานี', 'Aesoh', 1234, 'A'),
(13, 'ฮูนัยยะห์', 'เวาะเยะ', 'หญิง', '0936736916', 'จ.ปัตตานี', 'hunai', 1234, 'M'),
(20, 'นูรมา', 'มะแตหะ', 'หญิง', '0854387623', 'รูสะมีแล อำเภอเมืองปัตตานี จังหวัดปัตตานี ', '6020610053', 12345, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `manufacture`
--

CREATE TABLE `manufacture` (
  `manufacture_id` int(10) NOT NULL,
  `order_details_id` int(10) NOT NULL,
  `employee_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `status_m` varchar(20) NOT NULL DEFAULT 'ผลิตเสร็จแล้ว'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacture`
--

INSERT INTO `manufacture` (`manufacture_id`, `order_details_id`, `employee_id`, `date`, `status_m`) VALUES
(1, 1, 0, '2021-02-21', 'ผลิตเสร็จแล้ว'),
(2, 2, 2, '2021-02-22', 'ผลิตเสร็จแล้ว'),
(3, 3, 2, '2021-02-23', 'ผลิตเสร็จแล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `manufacture_details`
--

CREATE TABLE `manufacture_details` (
  `manufacture_details` int(10) NOT NULL,
  `manufacture_id` int(10) NOT NULL,
  `material_id` int(10) NOT NULL,
  `amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacture_details`
--

INSERT INTO `manufacture_details` (`manufacture_details`, `manufacture_id`, `material_id`, `amount`) VALUES
(1, 1, 15, 5),
(2, 2, 9, 1),
(3, 3, 5, 1),
(4, 3, 9, 1),
(5, 3, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `material_id` int(10) NOT NULL,
  `material_name` varchar(50) NOT NULL,
  `Import_amount` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`material_id`, `material_name`, `Import_amount`) VALUES
(3, 'ผ้าใยบัว-สีแดง  ', 35),
(4, 'ผ้าใยบัว-สีเหลือง ', 45),
(5, 'ผ้าใยบัว-สีเขียว ', 29),
(6, 'ท่อพีวีซีขนาดเส้นผ่าศูนย์กลาง   2 ซม. ', 20),
(8, 'กรรไกรเล็กปลายแหลม ', 80),
(9, 'ฟลอร่าเทป ', 88),
(10, 'ก้านสำเร็จรูปยาว 12 นิ้ว', 48),
(11, 'เกสร', 91),
(12, 'ด้ายเบอร์ 60', 32),
(15, 'ลวดธรรมดา', 44);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_product_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_product_details` varchar(100) NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_product_status` varchar(20) NOT NULL,
  `date_completion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `order_product_id` int(10) NOT NULL,
  `order_amount` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `sum_price` int(10) NOT NULL,
  `deposit` int(10) NOT NULL,
  `date_order` varchar(50) NOT NULL,
  `status_sd` varchar(50) NOT NULL DEFAULT 'ยังไม่ผลิต'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `product_id`, `order_product_id`, `order_amount`, `price`, `sum_price`, `deposit`, `date_order`, `status_sd`) VALUES
(1, 7, 1, 1, 200, 200, 60, '', 'ผลิตเสร็จแล้ว'),
(2, 9, 2, 1, 250, 250, 75, '', 'ผลิตเสร็จแล้ว'),
(3, 7, 3, 1, 200, 200, 60, '', 'ผลิตเสร็จแล้ว'),
(4, 8, 4, 3, 200, 600, 60, '', 'ยังไม่ผลิต'),
(5, 9, 5, 1, 250, 250, 75, '', 'ยังไม่ผลิต');

-- --------------------------------------------------------

--
-- Table structure for table `order_details_material`
--

CREATE TABLE `order_details_material` (
  `odm_id` int(10) NOT NULL,
  `material_id` int(10) NOT NULL,
  `order_material_id` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `price` int(20) NOT NULL,
  `sum_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details_material`
--

INSERT INTO `order_details_material` (`odm_id`, `material_id`, `order_material_id`, `amount`, `price`, `sum_price`) VALUES
(1, 0, 1, 50, 5, 250),
(2, 11, 2, 10, 5, 50),
(3, 5, 2, 10, 20, 200),
(4, 4, 2, 10, 20, 200);

-- --------------------------------------------------------

--
-- Table structure for table `order_material`
--

CREATE TABLE `order_material` (
  `order_material_id` int(10) NOT NULL,
  `order_material_date` varchar(15) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `employee_id` int(10) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'รอการอนุมัติ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_material`
--

INSERT INTO `order_material` (`order_material_id`, `order_material_date`, `supplier_id`, `employee_id`, `status`) VALUES
(1, '2021-02-21', 3, 3, 'อนุมัติ'),
(2, '2021-02-21', 2, 2, 'อนุมัติ');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_product_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_order` date DEFAULT current_timestamp(),
  `o_status` varchar(50) NOT NULL DEFAULT 'ยังไม่ชำระ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_product_id`, `user_id`, `date_order`, `o_status`) VALUES
(1, 20, '2021-02-21', 'ชำระแล้ว'),
(2, 13, '2021-02-22', 'ชำระแล้ว'),
(3, 6, '2021-02-23', 'ชำระแล้ว'),
(4, 6, '2021-02-23', 'ชำระแล้ว'),
(5, 6, '2021-02-23', 'กำลังตรวจสอบ');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(10) NOT NULL,
  `order_product_id` int(10) NOT NULL,
  `payment_date` date NOT NULL,
  `pay` int(10) NOT NULL,
  `status_pay` varchar(20) NOT NULL DEFAULT 'กำลังตรวจสอบ',
  `pay_image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `order_product_id`, `payment_date`, `pay`, `status_pay`, `pay_image`) VALUES
(1, 1, '2021-02-21', 150, 'ชำระแล้ว', 'img_1613899212.jpg'),
(2, 2, '2021-02-22', 250, 'ชำระแล้ว', 'img_1613998461.jpg'),
(3, 3, '2021-02-23', 200, 'ชำระแล้ว', 'img_1614048923.jpg'),
(4, 5, '0000-00-00', 100, 'ชำระแล้ว', 'img_1614062866.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `genre_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `image`, `genre_product_id`) VALUES
(5, 'กุหลาบ', '150', 'img_1603849816.jpg', 6),
(6, 'กล้วยไม้', '150', 'img_1603850071.jpg', 6),
(7, 'กุหลาบ', '200', 'img_1603850173.jpg', 7),
(8, 'กล้วยไม้', '200', 'img_1603850331.jpg', 7),
(9, 'กุหลาบ', '250', 'img_1603850785.jpg', 8),
(10, 'กล้วยไม้', '250', 'img_1603850811.jpg', 8),
(11, 'ลีลาวดี', '150', 'img_1603850957.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `payment_date` date NOT NULL,
  `money` double NOT NULL,
  `amount_work` int(10) NOT NULL,
  `amount_money` double NOT NULL,
  `status` enum('ยังไม่จ่าย','จ่ายแล้ว') NOT NULL DEFAULT 'ยังไม่จ่าย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `user_id`, `payment_date`, `money`, `amount_work`, `amount_money`, `status`) VALUES
(1, 0, '2021-02-14', 300, 20, 6000, 'จ่ายแล้ว'),
(3, 0, '2021-02-14', 300, 20, 6000, 'จ่ายแล้ว'),
(4, 0, '2021-02-14', 300, 20, 6000, 'จ่ายแล้ว'),
(5, 0, '2021-02-14', 300, 20, 6000, 'จ่ายแล้ว'),
(7, 7, '2021-02-14', 300, 20, 6000, 'จ่ายแล้ว'),
(8, 7, '2021-02-14', 180, 15, 2700, 'จ่ายแล้ว'),
(9, 8, '2021-02-22', 300, 20, 6000, 'ยังไม่จ่าย');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(10) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_tel` varchar(10) NOT NULL,
  `supplier_facebook` varchar(50) NOT NULL,
  `supplier_line` varchar(50) NOT NULL,
  `supplier_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_tel`, `supplier_facebook`, `supplier_line`, `supplier_address`) VALUES
(1, 'ซูนัย กิปช็อป', '0810920799', 'sunairoh daleng', 'sunai_ismal', '164/1 สายบุรี ปัตตานี '),
(2, 'Alawana Shop', '0812347284', 'Alawana Shop', 'Alawana', '22 ยะรัง ปัตตานี 94160'),
(3, 'ศิริลา เครื่องเขียน', '0927594759', 'ศิริลา เครื่องเขียน', 'sirila.22', '50 มายอ ปัตตานี 94140');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `genre_product`
--
ALTER TABLE `genre_product`
  ADD PRIMARY KEY (`genre_product_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `manufacture`
--
ALTER TABLE `manufacture`
  ADD PRIMARY KEY (`manufacture_id`);

--
-- Indexes for table `manufacture_details`
--
ALTER TABLE `manufacture_details`
  ADD PRIMARY KEY (`manufacture_details`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_product_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `order_details_material`
--
ALTER TABLE `order_details_material`
  ADD PRIMARY KEY (`odm_id`);

--
-- Indexes for table `order_material`
--
ALTER TABLE `order_material`
  ADD PRIMARY KEY (`order_material_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_product_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `genre_product`
--
ALTER TABLE `genre_product`
  MODIFY `genre_product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `manufacture`
--
ALTER TABLE `manufacture`
  MODIFY `manufacture_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manufacture_details`
--
ALTER TABLE `manufacture_details`
  MODIFY `manufacture_details` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `material_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_product_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_details_material`
--
ALTER TABLE `order_details_material`
  MODIFY `odm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_material`
--
ALTER TABLE `order_material`
  MODIFY `order_material_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `order_product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

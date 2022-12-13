-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 13, 2022 lúc 07:58 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mvc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_ID` int(11) NOT NULL,
  `admin_Name` varchar(255) NOT NULL,
  `admin_Email` varchar(150) NOT NULL,
  `admin_User` varchar(255) NOT NULL,
  `admin_Pass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_ID`, `admin_Name`, `admin_Email`, `admin_User`, `admin_Pass`, `level`) VALUES
(1, 'tukychau', 'tukychau@gmail.com', 'tukychau', 'b5c90deab00fde53fd78b07f203a0304', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_ID` int(11) NOT NULL,
  `brand_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_ID`, `brand_Name`) VALUES
(3, 'Iphone'),
(4, 'Samsung'),
(5, 'Oppo'),
(6, 'Xiaomi'),
(7, 'Nokia'),
(8, 'LG'),
(9, 'Redmi'),
(10, 'Sony');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `ses_ID` varchar(255) NOT NULL,
  `product_Name` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_ID`, `product_ID`, `ses_ID`, `product_Name`, `price`, `quantity`, `image`) VALUES
(16, 17, 'vo9lbb77b3bi55ms0f3u06cv1n', 'Iphone 5 (cũ/qua tay)', '600.000 VND', 2, '7b35071f94.png'),
(17, 36, 'vo9lbb77b3bi55ms0f3u06cv1n', 'Airpod Pro', '600.000 VND', 1, 'ab90ebe39f.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_ID` int(11) NOT NULL,
  `cat_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`cat_ID`, `cat_Name`) VALUES
(17, 'Điện thoại cao cấp'),
(18, 'Điện thoại tầm trung'),
(19, 'Điện thoại giá rẻ'),
(20, 'Dây sạc'),
(21, 'Củ sạc'),
(22, 'Dán màn hình/Cường lực'),
(23, 'Ốp Lưng'),
(24, 'Sạc dự phòng'),
(25, 'Tai nghe');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ctm`
--

CREATE TABLE `tbl_ctm` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_ID` int(11) NOT NULL,
  `product_Name` varchar(255) NOT NULL,
  `cat_ID` int(11) NOT NULL,
  `brand_ID` int(11) NOT NULL,
  `product_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pd_status` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_ID`, `product_Name`, `cat_ID`, `brand_ID`, `product_desc`, `pd_status`, `price`, `image`) VALUES
(16, 'Samsung Galaxy Z Flip 4', 17, 4, 'Samsung gập dòng Z thế hệ thứ 4', 1, '21.562.000 VND', 'd757eecdb9.jpg'),
(17, 'Iphone 5 (cũ/qua tay)', 19, 3, 'Iphone 5 đã qua tay', 0, '600.000 VND', '7b35071f94.png'),
(18, 'Iphone 14', 17, 3, 'Iphone dòng mới thế hệ 14', 1, '48.566.000 VND', '419df37f1e.jpg'),
(20, 'LG V50 ThinQ 5G Xám tro', 18, 8, 'Điện thoại tầm trung giá rẻ', 1, '2.290.000 VND', 'f8dedea934.jpg'),
(36, 'Airpod Pro', 25, 3, 'Tai Nghe', 0, '600.000 VND', 'ab90ebe39f.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_ID`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_ID`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_ID`);

--
-- Chỉ mục cho bảng `tbl_ctm`
--
ALTER TABLE `tbl_ctm`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `tbl_ctm`
--
ALTER TABLE `tbl_ctm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

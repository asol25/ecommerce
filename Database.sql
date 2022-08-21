-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 05, 2022 lúc 11:31 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangcthd`
--

CREATE TABLE `bangcthd` (
  `STT` int(11) NOT NULL,
  `SoHD` int(11) NOT NULL,
  `MaSP` varchar(255) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaSP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangkh`
--

CREATE TABLE `bangkh` (
  `MaKH` int(11) NOT NULL,
  `TenKH` varchar(100) NOT NULL,
  `DiaChi` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `DienThoai` int(11) NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `SoHD` int(11) NOT NULL,
  `MaKH` varchar(255) NOT NULL,
  `NgayMua` date NOT NULL,
  `ThanhTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`MaLoai`, `TenLoai`) VALUES
(1, 'Quần Ren '),
(2, 'Quần Jeans x'),
(3, 'Quần Kaki'),
(12, 'Áo Ba Lỗ'),
(13, 'Siêu Nhân'),
(14, 'Chương Đẹp Trai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `TenSP` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `GiaCu` int(11) NOT NULL,
  `GiaMoi` int(11) NOT NULL,
  `HinhDaiDien` varchar(255) NOT NULL,
  `LoaiSP` int(11) NOT NULL,
  `MoTa` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `MaSP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`TenSP`, `GiaCu`, `GiaMoi`, `HinhDaiDien`, `LoaiSP`, `MoTa`, `MaSP`) VALUES
('Quần Jeans', 200000, 179000, 'https://mcdn.nhanh.vn/store/2071/ps/20220210/bj019_bj020_bj056_51869181113_oa.jpg', 2, 'Quần jeans nam hàng hiệu, quần jeans cao cấp.', 1),
('Quần Kaki	', 199999, 150000, 'https://bizweb.dktcdn.net/100/350/935/files/nhung-dieu-chang-can-biet-ve-quan-kaki-nam-3-1.png?v=1612637272109', 3, 'Quần jeans nam hàng hiệu, quần jeans cao cấp.', 2),
('Quần', 150000, 150000, 'https://didongviet.vn/dchannel/wp-content/uploads/2022/01/cute-didongviet.jpg', 1, 'Siêu Nhân Gao', 309);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bangcthd`
--
ALTER TABLE `bangcthd`
  ADD PRIMARY KEY (`STT`),
  ADD KEY `fk_sohd` (`SoHD`),
  ADD KEY `fk_masp` (`MaSP`);

--
-- Chỉ mục cho bảng `bangkh`
--
ALTER TABLE `bangkh`
  ADD PRIMARY KEY (`MaKH`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`SoHD`),
  ADD KEY `fk_makh` (`MaKH`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `FK_LoaiSP` (`LoaiSP`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bangcthd`
--
ALTER TABLE `bangcthd`
  MODIFY `STT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `bangkh`
--
ALTER TABLE `bangkh`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `SoHD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 0;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bangcthd`
--
ALTER TABLE `bangcthd`
  ADD CONSTRAINT `bangcthd_ibfk_1` FOREIGN KEY (`SoHD`) REFERENCES `hoadon` (`SoHD`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`LoaiSP`) REFERENCES `loaisp` (`MaLoai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

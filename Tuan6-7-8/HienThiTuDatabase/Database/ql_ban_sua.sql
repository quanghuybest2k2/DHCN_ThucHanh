-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 26, 2022 lúc 02:28 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_ban_sua`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_sua`
--

CREATE TABLE `hang_sua` (
  `MaHS` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenHS` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DienThoai` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hang_sua`
--

INSERT INTO `hang_sua` (`MaHS`, `TenHS`, `DiaChi`, `DienThoai`, `Email`) VALUES
('NTF', 'Nutifood', 'Khu công nghiệp Sóng Thần Bình Dương', '7895632', 'nutifood@ntf.com'),
('VNM', 'Vinamilk', '123 Nguyễn Du - Quận 1 - TP.HCM', '8794561', 'vinamilk@vnm.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `MaKH` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenKH` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GioiTinh` int(11) NOT NULL,
  `DiaChi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DienThoai` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`MaKH`, `TenKH`, `GioiTinh`, `DiaChi`, `DienThoai`) VALUES
('kh001', 'Khuất Thùy Dương', 1, 'A21 Nguyễn Oanh quận Gò Vấp', '9874125'),
('kh002', 'Đỗ Lâm Thiên', 0, '357 Lê Hồng Phong Q.10', '8351056'),
('kh003', 'Phạm thị Nhung', 1, '56 Đinh Tiên Hoàng quận 1', '9746698');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_tin_sua`
--

CREATE TABLE `thong_tin_sua` (
  `ID` int(11) NOT NULL,
  `TenSua` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HangSua` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LoaiSua` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TrongLuong` int(11) DEFAULT NULL,
  `DonGia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thong_tin_sua`
--

INSERT INTO `thong_tin_sua` (`ID`, `TenSua`, `HangSua`, `LoaiSua`, `TrongLuong`, `DonGia`) VALUES
(1, 'Sữa chua Plus', 'VNM', 'Sữa chua', 180, 3600),
(2, 'Cô gái hà lan', 'NTF', 'Sữa tươi', 100, 3000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hang_sua`
--
ALTER TABLE `hang_sua`
  ADD PRIMARY KEY (`MaHS`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Chỉ mục cho bảng `thong_tin_sua`
--
ALTER TABLE `thong_tin_sua`
  ADD PRIMARY KEY (`ID`,`HangSua`),
  ADD KEY `HangSua` (`HangSua`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `thong_tin_sua`
--
ALTER TABLE `thong_tin_sua`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `thong_tin_sua`
--
ALTER TABLE `thong_tin_sua`
  ADD CONSTRAINT `thong_tin_sua_ibfk_1` FOREIGN KEY (`HangSua`) REFERENCES `hang_sua` (`MaHS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

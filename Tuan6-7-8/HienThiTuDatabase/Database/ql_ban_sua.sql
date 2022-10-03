-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 29, 2022 lúc 02:57 PM
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
  `MaHS` varchar(10) NOT NULL,
  `TenHS` varchar(100) NOT NULL,
  `DiaChi` varchar(200) NOT NULL,
  `DienThoai` varchar(11) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hang_sua`
--

INSERT INTO `hang_sua` (`MaHS`, `TenHS`, `DiaChi`, `DienThoai`, `Email`) VALUES
('DS', 'Daisy', 'Khu công nghiệp Sống Thần Bình Dương', '5789321', 'daisy@ds.com'),
('NTF', 'Nutifood', 'Khu công nghiệp Sóng Thần Bình Dương', '7895632', 'nutifood@ntf.com'),
('VNM', 'Vinamilk', '123 Nguyễn Du - Quận 1 - TP.HCM', '8794561', 'vinamilk@vnm.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `MaKH` varchar(10) NOT NULL,
  `TenKH` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `GioiTinh` int(11) NOT NULL,
  `DiaChi` varchar(200) NOT NULL,
  `DienThoai` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`MaKH`, `TenKH`, `UserName`, `Password`, `GioiTinh`, `DiaChi`, `DienThoai`) VALUES
('kh001', 'Khuất Thùy Dương', 'duong123', '123456', 1, 'A21 Nguyễn Oanh quận Gò Vấp', '9874125'),
('kh002', 'Đỗ Lâm Thiên', 'lam123', '123456', 0, '357 Lê Hồng Phong Q.10', '8351056'),
('kh003', 'Phạm thị Nhung', 'thien123', '123456', 1, '56 Đinh Tiên Hoàng quận 1', '9746698');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_sua`
--

CREATE TABLE `loai_sua` (
  `MaLoaiSua` varchar(10) NOT NULL,
  `TenLoaiSua` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loai_sua`
--

INSERT INTO `loai_sua` (`MaLoaiSua`, `TenLoaiSua`) VALUES
('SC', 'Sữa chua'),
('SKD', 'Sữa không đường'),
('ST', 'Sữa tươi'),
('STT', 'Sữa tiệt trùng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_tin_sua`
--

CREATE TABLE `thong_tin_sua` (
  `MaSua` varchar(10) NOT NULL,
  `TenSua` varchar(100) NOT NULL,
  `HangSua` varchar(10) NOT NULL,
  `LoaiSua` varchar(50) NOT NULL,
  `TrongLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `TPDD` varchar(255) NOT NULL,
  `LoiIch` varchar(255) NOT NULL,
  `HinhAnh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thong_tin_sua`
--

INSERT INTO `thong_tin_sua` (`MaSua`, `TenSua`, `HangSua`, `LoaiSua`, `TrongLuong`, `DonGia`, `TPDD`, `LoiIch`, `HinhAnh`) VALUES
('DS001', 'Sữa cô gái Hà Lan', 'NTF', 'ST', 170, 4500, 'Canxi, kẽm, đường, calo', 'Giúp mắt sáng, dáng cao', 'halan.png'),
('DS002', 'Sữa Tuơi Plus', 'VNM', 'ST', 185, 5000, 'Canxi, kẽm, đường, bột ngọt', 'Tăng miễn dịch, mắt sáng', 'suatuoi.png'),
('NTF001', 'Sữa ông thọ', 'NTF', 'SC', 200, 6600, 'Sữa đặc, sữa nguyên chất', 'Kích thích tiêu hóa', 'ongtho.png'),
('NTF002', 'Sữa phụ nữ', 'DS', 'STT', 190, 5000, 'Không tạp chất, tự nhiên', 'Tăng sức đề kháng, miễn phí', 'phunu.png'),
('VMN002', 'Sữa voi rừng', 'DS', 'SKD', 150, 3400, 'Tự nhiên, canxi', 'Tăng cân nặng', 'suavoi.png'),
('VNM001', 'Sữa chua Plus', 'VNM', 'ST', 180, 3600, 'Kẽm, đường ngọt, sữa tươi', 'Tăng miễn dịch, tiêu hóa tốt', 'suachua.png');

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
  ADD PRIMARY KEY (`MaKH`, `UserName`)

--
-- Chỉ mục cho bảng `loai_sua`
--
ALTER TABLE `loai_sua`
  ADD PRIMARY KEY (`MaLoaiSua`);

--
-- Chỉ mục cho bảng `thong_tin_sua`
--
ALTER TABLE `thong_tin_sua`
  ADD PRIMARY KEY (`MaSua`,`HangSua`,`LoaiSua`),
  ADD KEY `HangSua` (`HangSua`),
  ADD KEY `LoaiSua` (`LoaiSua`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `thong_tin_sua`
--
ALTER TABLE `thong_tin_sua`
  ADD CONSTRAINT `thong_tin_sua_ibfk_1` FOREIGN KEY (`HangSua`) REFERENCES `hang_sua` (`MaHS`),
  ADD CONSTRAINT `thong_tin_sua_ibfk_2` FOREIGN KEY (`LoaiSua`) REFERENCES `loai_sua` (`MaLoaiSua`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

create database IF NOT EXISTS train_ticket;

USE train_ticket;
DROP TABLE IF EXISTS `Ga`;
CREATE TABLE Ga (
  `MaGa` VARCHAR(20),
  `TenGa` NVARCHAR(100),
  PRIMARY KEY (`MaGa`)
);
DROP TABLE IF EXISTS `TuyenDuong`;

CREATE TABLE TuyenDuong(
  `MaTuyenDuong` VARCHAR(20) PRIMARY KEY,
  `XuatPhat` VARCHAR(20),
  `DiemDen` VARCHAR(20),
  `ThoiGianChay` TIME,
  FOREIGN KEY (`XuatPhat`) REFERENCES `Ga`(`MaGa`),
  FOREIGN KEY (`DiemDen`) REFERENCES `Ga`(`MaGa`)
);
DROP TABLE IF EXISTS `Tau`;

CREATE TABLE Tau(
  `MaTau` VARCHAR(20) PRIMARY KEY,
  `GaHienTai` VARCHAR(20),
  `TrangThai` TINYINT,
  FOREIGN KEY (`GaHienTai`) REFERENCES `Ga`(`MaGa`)
);
DROP TABLE IF EXISTS `ChuyenTau`;

CREATE TABLE ChuyenTau(
  `MaChuyenTau` VARCHAR(20) PRIMARY KEY,
  `MaTuyenDuong` VARCHAR(20),
  `MaTau` VARCHAR(20),
  `ThoiGianXuatPhat` DATETIME,
  `TrangThai` TINYINT,
  FOREIGN KEY (`MaTuyenDuong`) REFERENCES `TuyenDuong`(`MaTuyenDuong`),
  FOREIGN KEY (`MaTau`) REFERENCES `Tau`(`MaTau`)
);
DROP TABLE IF EXISTS `LoaiToa`;

CREATE TABLE LoaiToa(
  `MaLoaiToa` VARCHAR(20) PRIMARY KEY,
  `TenLoaiToa` NVARCHAR(100),
  `SoChoNgoi` SMALLINT,
  `Gia` DECIMAL(18, 2),
  `MoTa` TEXT
);
DROP TABLE IF EXISTS `Toa`;

CREATE TABLE Toa(
  `MaToa` VARCHAR(20) PRIMARY KEY,
  `MaTau` VARCHAR(20),
  `MaLoaiToa` VARCHAR(20),
  `ThuTuToa` SMALLINT,
  FOREIGN KEY (`MaTau`) REFERENCES `Tau`(`MaTau`),
  FOREIGN KEY (`MaLoaiToa`) REFERENCES `LoaiToa`(`MaLoaiToa`)
);
DROP TABLE IF EXISTS `ChoNgoi`;

CREATE TABLE ChoNgoi(
  `MaChoNgoi` VARCHAR(20) PRIMARY KEY,
  `MaToa` VARCHAR(20),
  `TrangThai` TINYINT, -- 0 la trong, 1 la duoc dat
  FOREIGN KEY (`MaToa`) REFERENCES `Toa`(`MaToa`)
);
DROP TABLE IF EXISTS `KhachHang`;

CREATE TABLE KhachHang(
  `ID_KhachHang` INT PRIMARY KEY AUTO_INCREMENT,
  `HoTen` VARCHAR(100),
  `CCCD` VARCHAR(20),
  `SDT` VARCHAR(20),
  `Email` VARCHAR(100),
  `NgaySinh` DATETIME
);
DROP TABLE IF EXISTS `ThongTinDatCho`;

CREATE TABLE ThongTinDatCho(
  `MaDatCho` VARCHAR(20) PRIMARY KEY,
  `ID_KhachHang` INT,
  `NgayDatCho` DATETIME,
  `TrangThai` BOOLEAN,
  `MaChoNgoi` VARCHAR(20),
  FOREIGN KEY (`ID_KhachHang`) REFERENCES `KhachHang`(`ID_KhachHang`),
  FOREIGN KEY (`MaChoNgoi`) REFERENCES `ChoNgoi`(`MaChoNgoi`)
);
DROP TABLE IF EXISTS `Ve`;

CREATE TABLE Ve(
  `MaVe` VARCHAR(20) PRIMARY KEY,
  `MaChuyenTau` VARCHAR(20),
  `MaChoNgoi` VARCHAR(20),
  FOREIGN KEY (`MaChuyenTau`) REFERENCES `ChuyenTau`(`MaChuyenTau`),
  FOREIGN KEY (`MaChoNgoi`) REFERENCES `ChoNgoi`(`MaChoNgoi`)
);
DROP TABLE IF EXISTS `ThanhToan`;

CREATE TABLE ThanhToan(
  `MaDatCho` VARCHAR(20),
  `NgayThanhToan` DATETIME,
  `TongTien` DECIMAL(18, 2),
  `LoaiThanhToan` VARCHAR(20),
  FOREIGN KEY (`MaDatCho`) REFERENCES `ThongTinDatCho`(`MaDatCho`)
);
DROP TABLE IF EXISTS `Users`;

CREATE TABLE Users(
  `ID_User` INT PRIMARY KEY AUTO_INCREMENT,
  `Email` VARCHAR(30),
  `Password` VARCHAR(100),
  `ChucVu` TINYINT
);

INSERT INTO `Users`(`Email`, `Password`, `ChucVu`) VALUES('tandat@gmail.com', '123', 1);
INSERT INTO `LoaiToa`(`MaLoaiToa`, `TenLoaiToa`, `SoChoNgoi`, `Gia`, `MoTa`) VALUES ('LT001','Ngồi mềm điều hòa', 64 ,100000,'Toa ngồi có đệm mềm với điều hòa dễ chịu.');
INSERT INTO `LoaiToa`(`MaLoaiToa`, `TenLoaiToa`, `SoChoNgoi`, `Gia`, `MoTa`) VALUES ('LT002','Giường Nằm 6', 42 ,150000,'Toa giường nằm, mỗi toa có 6 giường với điều hòa dễ chịu.');
INSERT INTO `LoaiToa`(`MaLoaiToa`, `TenLoaiToa`, `SoChoNgoi`, `Gia`, `MoTa`) VALUES ('LT003','Giường Nằm 4', 42 ,200000,'Toa giường nằm, mỗi toa có 4 giường với điều hòa dễ chịu.');
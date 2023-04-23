create database IF NOT EXISTS train_ticket;

USE train_ticket;
DROP TABLE IF EXISTS `Ga`;
CREATE TABLE Ga (
  `MaGa` VARCHAR(20),
  `TenGa` NVARCHAR(100),
  PRIMARY KEY (`MaGa`)
);
DROP TABLE IF EXISTS `Tuyen`;

CREATE TABLE Tuyen(
  `MaTuyen` VARCHAR(20) PRIMARY KEY,
  `XuatPhat` VARCHAR(20),
  `DiemDen` VARCHAR(20),
  FOREIGN KEY (`XuatPhat`) REFERENCES `Ga`(`MaGa`),
  FOREIGN KEY (`DiemDen`) REFERENCES `Ga`(`MaGa`)
);
DROP TABLE IF EXISTS `Tau`;

CREATE TABLE Tau(
  `MaTau` VARCHAR(20) PRIMARY KEY,
  `GaHienTai` VARCHAR(20),
  `TrangThai` VARCHAR(20),
  FOREIGN KEY (`GaHienTai`) REFERENCES `Ga`(`MaGa`)
);
DROP TABLE IF EXISTS `Chuyen`;

CREATE TABLE Chuyen(
  `MaChuyen` VARCHAR(20) PRIMARY KEY,
  `MaTuyen` VARCHAR(20),
  `MaTau` VARCHAR(20),
  `ThoiGianXuatPhat` DATETIME,
  `ThoiGianDenNoi` DATETIME,
  `TrangThai` VARCHAR(20),
  FOREIGN KEY (`MaTuyen`) REFERENCES `Tuyen`(`MaTuyen`),
  FOREIGN KEY (`MaTau`) REFERENCES `Tau`(`MaTau`)
);
DROP TABLE IF EXISTS `LoaiToa`;

CREATE TABLE LoaiToa(
  `MaLoaiToa` VARCHAR(20) PRIMARY KEY,
  `TenLoaiToa` NVARCHAR(100),
  `Gia` DECIMAL(18, 2)
);
DROP TABLE IF EXISTS `Toa`;

CREATE TABLE Toa(
  `MaToa` VARCHAR(20) PRIMARY KEY,
  `SoChoNgoi` SMALLINT,
  `MaTau` VARCHAR(20),
  `MaLoaiToa` VARCHAR(20),
  FOREIGN KEY (`MaTau`) REFERENCES `Tau`(`MaTau`),
  FOREIGN KEY (`MaLoaiToa`) REFERENCES `LoaiToa`(`MaLoaiToa`)
);
DROP TABLE IF EXISTS `ChoNgoi`;

CREATE TABLE ChoNgoi(
  `MaChoNgoi` VARCHAR(20) PRIMARY KEY,
  `MaToa` VARCHAR(20),
  `GhiChu` NVARCHAR(100),
  FOREIGN KEY (`MaToa`) REFERENCES `Toa`(`MaToa`)
);
DROP TABLE IF EXISTS `KhachHang`;

CREATE TABLE KhachHang(
  `ID_KhachHang` INT PRIMARY KEY AUTO_INCREMENT,
  `CCCD`VARCHAR(20),
  `SDT` VARCHAR(20),
  `Email` VARCHAR(100),
  `Tuoi` SMALLINT
);
DROP TABLE IF EXISTS `DatCho`;

CREATE TABLE DatCho(
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
  `MaDatCho` VARCHAR(20),
  `MaChuyen` VARCHAR(20),
  `MaChoNgoi` VARCHAR(20),
  FOREIGN KEY (`MaDatCho`) REFERENCES `DatCho`(`MaDatCho`),
  FOREIGN KEY (`MaChuyen`) REFERENCES `Chuyen`(`MaChuyen`),
  FOREIGN KEY (`MaChoNgoi`) REFERENCES `ChoNgoi`(`MaChoNgoi`)
);
DROP TABLE IF EXISTS `ThanhToan`;

CREATE TABLE ThanhToan(
  `MaThanhToan` VARCHAR(20) PRIMARY KEY,
  `MaDatCho` VARCHAR(20),
  `NgayThanhToan` DATETIME,
  `TongTien` DECIMAL(18, 2),
  `LoaiThanhToan` VARCHAR(20),
  `TrangThai` BOOLEAN,
  FOREIGN KEY (`MaDatCho`) REFERENCES `DatCho`(`MaDatCho`)
);
DROP TABLE IF EXISTS `XacNhanDatCho`;

CREATE TABLE XacNhanDatCho(
  `ID_XacNhan` INT PRIMARY KEY AUTO_INCREMENT,
  `MaDatCho` VARCHAR(20),
  `NgayXacNhan` DATETIME,
  `TrangThaiXacNhan` BOOLEAN,
  FOREIGN KEY (`MaDatCho`) REFERENCES `DatCho`(`MaDatCho`)
);

DROP TABLE IF EXISTS `User`;
CREATE TABLE User(
  `ID_User` INT PRIMARY KEY AUTO_INCREMENT,
  `Email` VARCHAR(30),
  `MatKhau` VARCHAR(100),
  `ChucVu` NVARCHAR(50)
);

INSERT INTO `User`(`Email`, `MatKhau`, `ChucVu`) VALUES('tandat@gmail.com', '123', 'Quản lý')
create database IF NOT EXISTS train_ticket;

USE train_ticket;
DROP TABLE IF EXISTS `Ga`;

CREATE TABLE Ga (
  `MaGa` VARCHAR(20) PRIMARY KEY,
  `TenGa` NVARCHAR(100)
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
DROP TABLE IF EXISTS `NguoiDatCho`;

CREATE TABLE NguoiDatCho(
  `ID_NguoiDatCho` INT PRIMARY KEY AUTO_INCREMENT,
  `HoTen` NVARCHAR(100),
  `CCCD` VARCHAR(20),
  `SDT` VARCHAR(20),
  `Email` VARCHAR(100)
);
DROP TABLE IF EXISTS `KhachHang`;

CREATE TABLE KhachHang(
  `ID_KhachHang` INT PRIMARY KEY AUTO_INCREMENT,
  `HoTen` NVARCHAR(100),
  `CCCD` VARCHAR(20),
  `SDT` VARCHAR(20),
  `Email` VARCHAR(100),
  `NgaySinh` DATETIME,
  `MaChoNgoi` VARCHAR(20),
  `ID_NguoiDatCho` INT,
  FOREIGN KEY (`MaChoNgoi`) REFERENCES `ChoNgoi`(`MaChoNgoi`),
  FOREIGN KEY (`ID_NguoiDatCho`) REFERENCES `NguoiDatCho`(`ID_NguoiDatCho`)
);
DROP TABLE IF EXISTS `ThongTinDatCho`;

CREATE TABLE ThongTinDatCho(
  `MaDatCho` VARCHAR(20) PRIMARY KEY,
  `ID_NguoiDatCho` INT,
  `NgayDatCho` DATETIME,
  `TrangThai` BOOLEAN,
  FOREIGN KEY (`ID_NguoiDatCho`) REFERENCES `NguoiDatCho`(`ID_NguoiDatCho`)
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

INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G001', 'Thành phố Hà Nội');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G002', 'Tỉnh Hà Giang');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G003', 'Tỉnh Cao Bằng');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G004', 'Tỉnh Bắc Kạn');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G005', 'Tỉnh Tuyên Quang');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G006', 'Tỉnh Lào Cai');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G007', 'Tỉnh Điện Biên');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G008', 'Tỉnh Lai Châu');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G009', 'Tỉnh Sơn La');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G010', 'Tỉnh Yên Bái');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G011', 'Tỉnh Hoà Bình');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G012', 'Tỉnh Thái Nguyên');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G013', 'Tỉnh Lạng Sơn');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G014', 'Tỉnh Quảng Ninh');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G015', 'Tỉnh Bắc Giang');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G016', 'Tỉnh Phú Thọ');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G017', 'Tỉnh Vĩnh Phúc');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G018', 'Tỉnh Bắc Ninh');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G019', 'Tỉnh Hải Dương');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G020', 'Thành phố Hải Phòng');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G021', 'Tỉnh Hưng Yên');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G022', 'Tỉnh Thái Bình');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G023', 'Tỉnh Hà Nam');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G024', 'Tỉnh Nam Định');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G025', 'Tỉnh Ninh Bình');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G026', 'Tỉnh Thanh Hóa');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G027', 'Tỉnh Nghệ An');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G028', 'Tỉnh Hà Tĩnh');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G029', 'Tỉnh Quảng Bình');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G030', 'Tỉnh Quảng Trị');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G031', 'Tỉnh Thừa Thiên Huế');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G032', 'Thành phố Đà Nẵng');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G033', 'Tỉnh Quảng Nam');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G034', 'Tỉnh Quảng Ngãi');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G035', 'Tỉnh Bình Định');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G036', 'Tỉnh Phú Yên');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G037', 'Tỉnh Khánh Hòa');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G038', 'Tỉnh Ninh Thuận');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G039', 'Tỉnh Bình Thuận');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G040', 'Tỉnh Kon Tum');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G041', 'Tỉnh Gia Lai');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G042', 'Tỉnh Đắk Lắk');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G043', 'Tỉnh Đắk Nông');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G044', 'Tỉnh Lâm Đồng');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G045', 'Tỉnh Bình Phước');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G046', 'Tỉnh Tây Ninh');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G047', 'Tỉnh Bình Dương');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G048', 'Tỉnh Đồng Nai');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G049', 'Tỉnh Bà Rịa - Vũng Tàu');
INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G050', 'Thành phố Hồ Chí Minh');

INSERT INTO `TuyenDuong`(`MaTuyenDuong`, `XuatPhat`, `DiemDen`, `ThoiGianChay`) VALUES ('TN001','G001','G050','40:00:00');
INSERT INTO `TuyenDuong`(`MaTuyenDuong`, `XuatPhat`, `DiemDen`, `ThoiGianChay`) VALUES ('TN002','G050','G031','19:00:00');
INSERT INTO `TuyenDuong`(`MaTuyenDuong`, `XuatPhat`, `DiemDen`, `ThoiGianChay`) VALUES ('TN003','G001','G039','18:00:00');

INSERT INTO `Tau`(`MaTau`, `GaHienTai`, `TrangThai`) VALUES ('TU001','G050',0);
INSERT INTO `Tau`(`MaTau`, `GaHienTai`, `TrangThai`) VALUES ('TU002','G001',0);





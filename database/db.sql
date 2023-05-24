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
  `MaChuyenTau` VARCHAR(20),
  `ID_NguoiDatCho` INT,
  FOREIGN KEY (`MaChoNgoi`) REFERENCES `ChoNgoi`(`MaChoNgoi`),
  FOREIGN KEY (`MaChuyenTau`) REFERENCES `ChuyenTau`(`MaChuyenTau`),
  FOREIGN KEY (`ID_NguoiDatCho`) REFERENCES `NguoiDatCho`(`ID_NguoiDatCho`)
);
DROP TABLE IF EXISTS `ThongTinDatCho`;

CREATE TABLE ThongTinDatCho(
  `MaDatCho` VARCHAR(20) PRIMARY KEY,
  `ID_NguoiDatCho` INT,
  `NgayDatCho` DATETIME,
  `TongTien` DECIMAL(18, 2),
  `TrangThai` TINYINT, -- 0 là đang chờ thanh toán, 1 là đã thanh toán, 2 là đã bị hủy do quá hạn
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
INSERT INTO `Users`(`Email`, `Password`, `ChucVu`) VALUES('user@gmail.com', '123', 0);
INSERT INTO `LoaiToa`(`MaLoaiToa`, `TenLoaiToa`, `SoChoNgoi`, `Gia`, `MoTa`) VALUES ('LT001','Ngồi mềm điều hòa', 64 ,100000,'Toa ngồi có đệm mềm với điều hòa dễ chịu.');
INSERT INTO `LoaiToa`(`MaLoaiToa`, `TenLoaiToa`, `SoChoNgoi`, `Gia`, `MoTa`) VALUES ('LT002','Giường Nằm 6', 48 ,150000,'Toa giường nằm, mỗi toa có 6 giường với điều hòa dễ chịu.');
INSERT INTO `LoaiToa`(`MaLoaiToa`, `TenLoaiToa`, `SoChoNgoi`, `Gia`, `MoTa`) VALUES ('LT003','Giường Nằm 4', 32 ,200000,'Toa giường nằm, mỗi toa có 4 giường với điều hòa dễ chịu.');

INSERT INTO `Ga`(`MaGa`, `TenGa`) VALUES ('G000','Tàu hiện đang chạy');
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

INSERT INTO `Tau`(`MaTau`, `GaHienTai`, `TrangThai`) VALUES ('TU001','G050',1);
INSERT INTO `Tau`(`MaTau`, `GaHienTai`, `TrangThai`) VALUES ('TU002','G001',1);

INSERT INTO `Toa` (`MaToa`, `MaTau`, `MaLoaiToa`, `ThuTuToa`) VALUES
('T001', 'TU001', 'LT001', 1),
('T002', 'TU001', 'LT002', 2),
('T003', 'TU001', 'LT003', 3),
('T004', 'TU002', 'LT001', 1),
('T005', 'TU002', 'LT002', 2),
('T006', 'TU002', 'LT003', 3);

INSERT INTO `ChoNgoi` (`MaChoNgoi`, `MaToa`) VALUES
('T001001', 'T001'),
('T001002', 'T001'),
('T001003', 'T001'),
('T001004', 'T001'),
('T001005', 'T001'),
('T001006', 'T001'),
('T001007', 'T001'),
('T001008', 'T001'),
('T001009', 'T001'),
('T001010', 'T001'),
('T001011', 'T001'),
('T001012', 'T001'),
('T001013', 'T001'),
('T001014', 'T001'),
('T001015', 'T001'),
('T001016', 'T001'),
('T001017', 'T001'),
('T001018', 'T001'),
('T001019', 'T001'),
('T001020', 'T001'),
('T001021', 'T001'),
('T001022', 'T001'),
('T001023', 'T001'),
('T001024', 'T001'),
('T001025', 'T001'),
('T001026', 'T001'),
('T001027', 'T001'),
('T001028', 'T001'),
('T001029', 'T001'),
('T001030', 'T001'),
('T001031', 'T001'),
('T001032', 'T001'),
('T001033', 'T001'),
('T001034', 'T001'),
('T001035', 'T001'),
('T001036', 'T001'),
('T001037', 'T001'),
('T001038', 'T001'),
('T001039', 'T001'),
('T001040', 'T001'),
('T001041', 'T001'),
('T001042', 'T001'),
('T001043', 'T001'),
('T001044', 'T001'),
('T001045', 'T001'),
('T001046', 'T001'),
('T001047', 'T001'),
('T001048', 'T001'),
('T001049', 'T001'),
('T001050', 'T001'),
('T001051', 'T001'),
('T001052', 'T001'),
('T001053', 'T001'),
('T001054', 'T001'),
('T001055', 'T001'),
('T001056', 'T001'),
('T001057', 'T001'),
('T001058', 'T001'),
('T001059', 'T001'),
('T001060', 'T001'),
('T001061', 'T001'),
('T001062', 'T001'),
('T001063', 'T001'),
('T001064', 'T001'),
('T002001', 'T002'),
('T002002', 'T002'),
('T002003', 'T002'),
('T002004', 'T002'),
('T002005', 'T002'),
('T002006', 'T002'),
('T002007', 'T002'),
('T002008', 'T002'),
('T002009', 'T002'),
('T002010', 'T002'),
('T002011', 'T002'),
('T002012', 'T002'),
('T002013', 'T002'),
('T002014', 'T002'),
('T002015', 'T002'),
('T002016', 'T002'),
('T002017', 'T002'),
('T002018', 'T002'),
('T002019', 'T002'),
('T002020', 'T002'),
('T002021', 'T002'),
('T002022', 'T002'),
('T002023', 'T002'),
('T002024', 'T002'),
('T002025', 'T002'),
('T002026', 'T002'),
('T002027', 'T002'),
('T002028', 'T002'),
('T002029', 'T002'),
('T002030', 'T002'),
('T002031', 'T002'),
('T002032', 'T002'),
('T002033', 'T002'),
('T002034', 'T002'),
('T002035', 'T002'),
('T002036', 'T002'),
('T002037', 'T002'),
('T002038', 'T002'),
('T002039', 'T002'),
('T002040', 'T002'),
('T002041', 'T002'),
('T002042', 'T002'),
('T002043', 'T002'),
('T002044', 'T002'),
('T002045', 'T002'),
('T002046', 'T002'),
('T002047', 'T002'),
('T002048', 'T002'),
('T003001', 'T003'),
('T003002', 'T003'),
('T003003', 'T003'),
('T003004', 'T003'),
('T003005', 'T003'),
('T003006', 'T003'),
('T003007', 'T003'),
('T003008', 'T003'),
('T003009', 'T003'),
('T003010', 'T003'),
('T003011', 'T003'),
('T003012', 'T003'),
('T003013', 'T003'),
('T003014', 'T003'),
('T003015', 'T003'),
('T003016', 'T003'),
('T003017', 'T003'),
('T003018', 'T003'),
('T003019', 'T003'),
('T003020', 'T003'),
('T003021', 'T003'),
('T003022', 'T003'),
('T003023', 'T003'),
('T003024', 'T003'),
('T003025', 'T003'),
('T003026', 'T003'),
('T003027', 'T003'),
('T003028', 'T003'),
('T003029', 'T003'),
('T003030', 'T003'),
('T003031', 'T003'),
('T003032', 'T003'),
('T004001', 'T004'),
('T004002', 'T004'),
('T004003', 'T004'),
('T004004', 'T004'),
('T004005', 'T004'),
('T004006', 'T004'),
('T004007', 'T004'),
('T004008', 'T004'),
('T004009', 'T004'),
('T004010', 'T004'),
('T004011', 'T004'),
('T004012', 'T004'),
('T004013', 'T004'),
('T004014', 'T004'),
('T004015', 'T004'),
('T004016', 'T004'),
('T004017', 'T004'),
('T004018', 'T004'),
('T004019', 'T004'),
('T004020', 'T004'),
('T004021', 'T004'),
('T004022', 'T004'),
('T004023', 'T004'),
('T004024', 'T004'),
('T004025', 'T004'),
('T004026', 'T004'),
('T004027', 'T004'),
('T004028', 'T004'),
('T004029', 'T004'),
('T004030', 'T004'),
('T004031', 'T004'),
('T004032', 'T004'),
('T004033', 'T004'),
('T004034', 'T004'),
('T004035', 'T004'),
('T004036', 'T004'),
('T004037', 'T004'),
('T004038', 'T004'),
('T004039', 'T004'),
('T004040', 'T004'),
('T004041', 'T004'),
('T004042', 'T004'),
('T004043', 'T004'),
('T004044', 'T004'),
('T004045', 'T004'),
('T004046', 'T004'),
('T004047', 'T004'),
('T004048', 'T004'),
('T004049', 'T004'),
('T004050', 'T004'),
('T004051', 'T004'),
('T004052', 'T004'),
('T004053', 'T004'),
('T004054', 'T004'),
('T004055', 'T004'),
('T004056', 'T004'),
('T004057', 'T004'),
('T004058', 'T004'),
('T004059', 'T004'),
('T004060', 'T004'),
('T004061', 'T004'),
('T004062', 'T004'),
('T004063', 'T004'),
('T004064', 'T004'),
('T005001', 'T005'),
('T005002', 'T005'),
('T005003', 'T005'),
('T005004', 'T005'),
('T005005', 'T005'),
('T005006', 'T005'),
('T005007', 'T005'),
('T005008', 'T005'),
('T005009', 'T005'),
('T005010', 'T005'),
('T005011', 'T005'),
('T005012', 'T005'),
('T005013', 'T005'),
('T005014', 'T005'),
('T005015', 'T005'),
('T005016', 'T005'),
('T005017', 'T005'),
('T005018', 'T005'),
('T005019', 'T005'),
('T005020', 'T005'),
('T005021', 'T005'),
('T005022', 'T005'),
('T005023', 'T005'),
('T005024', 'T005'),
('T005025', 'T005'),
('T005026', 'T005'),
('T005027', 'T005'),
('T005028', 'T005'),
('T005029', 'T005'),
('T005030', 'T005'),
('T005031', 'T005'),
('T005032', 'T005'),
('T005033', 'T005'),
('T005034', 'T005'),
('T005035', 'T005'),
('T005036', 'T005'),
('T005037', 'T005'),
('T005038', 'T005'),
('T005039', 'T005'),
('T005040', 'T005'),
('T005041', 'T005'),
('T005042', 'T005'),
('T005043', 'T005'),
('T005044', 'T005'),
('T005045', 'T005'),
('T005046', 'T005'),
('T005047', 'T005'),
('T005048', 'T005'),
('T006001', 'T006'),
('T006002', 'T006'),
('T006003', 'T006'),
('T006004', 'T006'),
('T006005', 'T006'),
('T006006', 'T006'),
('T006007', 'T006'),
('T006008', 'T006'),
('T006009', 'T006'),
('T006010', 'T006'),
('T006011', 'T006'),
('T006012', 'T006'),
('T006013', 'T006'),
('T006014', 'T006'),
('T006015', 'T006'),
('T006016', 'T006'),
('T006017', 'T006'),
('T006018', 'T006'),
('T006019', 'T006'),
('T006020', 'T006'),
('T006021', 'T006'),
('T006022', 'T006'),
('T006023', 'T006'),
('T006024', 'T006'),
('T006025', 'T006'),
('T006026', 'T006'),
('T006027', 'T006'),
('T006028', 'T006'),
('T006029', 'T006'),
('T006030', 'T006'),
('T006031', 'T006'),
('T006032', 'T006');

INSERT INTO `ChuyenTau` (`MaChuyenTau`, `MaTuyenDuong`, `MaTau`, `ThoiGianXuatPhat`, `TrangThai`) VALUES
('CT001', 'TN002', 'TU001', '2023-05-31 15:36:00', 0),
('CT002', 'TN001', 'TU002', '2023-05-31 15:37:00', 0);

INSERT INTO `NguoiDatCho`(`HoTen`, `CCCD`, `SDT`, `Email`) VALUES ('Lê Văn Tèo','012398678911','0707888555','teo@gmail.com');

INSERT INTO `KhachHang`(`HoTen`, `CCCD`, `SDT`, `Email`, `NgaySinh`, `MaChoNgoi`, `MaChuyenTau`, `ID_NguoiDatCho`) VALUES ('Lê Văn Tú','012398678922','0707999888','tu@gmail.com','2002-02-02','T001001','CT001',1);
INSERT INTO `KhachHang`(`HoTen`, `CCCD`, `SDT`, `Email`, `NgaySinh`, `MaChoNgoi`, `MaChuyenTau`, `ID_NguoiDatCho`) VALUES ('Lê Văn Tùng','012398678933','0707111666','tung@gmail.com','2002-02-02','T001002','CT001',1);

INSERT INTO `ThongTinDatCho`(`MaDatCho`, `ID_NguoiDatCho`, `NgayDatCho`, `TongTien`, `TrangThai`) VALUES ('DC001',1,'2023-05-24',600000, 1);

INSERT INTO `ThanhToan`(`MaDatCho`, `NgayThanhToan`, `LoaiThanhToan`) VALUES ('DC001','2023-05-24','MoMo');

INSERT INTO `Ve`(`MaVe`, `MaChuyenTau`, `MaChoNgoi`) VALUES ('V001','CT001','T001001');
INSERT INTO `Ve`(`MaVe`, `MaChuyenTau`, `MaChoNgoi`) VALUES ('V002','CT001','T001002');






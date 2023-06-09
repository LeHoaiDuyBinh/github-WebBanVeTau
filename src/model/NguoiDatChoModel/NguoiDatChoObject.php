<?php
    class NguoiDatChoObject{
        private $ID_NguoiDatCho;
        private $HoTenNguoiDatCho;
        private $CCCD;
        private $SDT;
        private $Email;
        private $MaDatCho;
        private $NgayDatCho;
        private $NgayThanhToan;
        private $TongTien;
        private $LoaiThanhToan;
        private $TrangThai;
        private $TrangThaitxt;
        private $dsKH;

        public function __construct($row)
        {
            $this->ID_NguoiDatCho = $row['ID_NguoiDatCho'];
            $this->HoTenNguoiDatCho = $row['HoTen'];
            $this->CCCD = $row['CCCD'];
            $this->SDT = $row['SDT'];
            $this->Email = $row['Email'];
            $this->MaDatCho = $row['MaDatCho'];
            $this->NgayDatCho = $row['NgayDatCho'];
            $this->NgayThanhToan = $row['NgayThanhToan'];
            $this->TongTien = $row['TongTien'];
            $this->LoaiThanhToan = $row['LoaiThanhToan'];
            $this->TrangThai = $row['TrangThai'];
        }

        public function getID_NguoiDatCho()
        {
                return $this->ID_NguoiDatCho;
        }

        public function setID_NguoiDatCho($ID_NguoiDatCho)
        {
                $this->ID_NguoiDatCho = $ID_NguoiDatCho;

        }

        public function getHoTenNguoiDatCho()
        {
                return $this->HoTenNguoiDatCho;
        }

        public function setHoTenNguoiDatCho($HoTenNguoiDatCho)
        {
                $this->HoTenNguoiDatCho = $HoTenNguoiDatCho;

        }

        public function getCCCD()
        {
                return $this->CCCD;
        }

        public function setCCCD($CCCD)
        {
                $this->CCCD = $CCCD;
        }

        public function getSDT()
        {
                return $this->SDT;
        }
        public function setSDT($SDT)
        {
                $this->SDT = $SDT;

        }

        public function getEmail()
        {
                return $this->Email;
        }

        public function setEmail($Email)
        {
                $this->Email = $Email;

        }

        public function getMaDatCho()
        {
                return $this->MaDatCho;
        }

        public function setMaDatCho($MaDatCho)
        {
                $this->MaDatCho = $MaDatCho;

        }

        
        public function getNgayDatCho()
        {
                return $this->NgayDatCho;
        }

        public function setNgayDatCho($NgayDatCho)
        {
                $this->NgayDatCho = $NgayDatCho;

        }

        public function getTongTien()
        {
                return $this->TongTien;
        }

        public function setTongTien($TongTien)
        {
                $this->TongTien = $TongTien;

        }

        public function getNgayThanhToan()
        {
                return $this->NgayThanhToan;
        }

        public function setNgayThanhToan($NgayThanhToan)
        {
                $this->NgayThanhToan = $NgayThanhToan;
        }

        public function getLoaiThanhToan()
        {
                return $this->LoaiThanhToan;
        }

        public function setLoaiThanhToan($LoaiThanhToan)
        {
                $this->LoaiThanhToan = $LoaiThanhToan;
        }

        public function getTrangThai()
        {
                return $this->TrangThai;
        }
        public function setTrangThai($TrangThai)
        {
                $this->TrangThai = $TrangThai;

        }

        public function getTrangThaitxt()
        {
                return $this->TrangThaitxt;
        }

        public function setTrangThaitxt($TrangThaitxt)
        {
                $this->TrangThaitxt = $TrangThaitxt;

        }

        public function setDsKH($dsKH)
        {
                $this->dsKH = $dsKH;

        }

        public function getDsKH()
        {
                return $this->dsKH;
        }
    }
?>
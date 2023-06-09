<?php
    class KhachHangObject{
        private $ID_KH;
        private $HoTen_KH;
        private $CCCD_KH;
        private $SDT_KH;
        private $Email_KH;
        private $NgaySinh;
        private $MaChoNgoi;
        private $TienVe;
        private $MaVe;
        private $MaChuyenTau;
        private $ID_NguoiDatCho;
        private $TenNguoiDatCho;
        private $TG_XuatPhat;
        private $GaDi;
        private $GaDen;
        private $MaTau;
        private $MaToa;
        private $TenLoaiToa;
        private $ThanhToan;

        public function __construct($row)
        {
            $this->ID_KH = $row['ID_KhachHang'];
            $this->HoTen_KH = $row['HoTen'];
            $this->CCCD_KH = $row['CCCD'];
            $this->SDT_KH = $row['SDT'];
            $this->Email_KH = $row['Email'];
            $this->NgaySinh = $row['NgaySinh'];
            $this->MaChoNgoi = $row['MaChoNgoi'];
            $this->TienVe = $row['TienVe'];
            $this->MaVe = $row['MaVe'];
            $this->MaChuyenTau = $row['MaChuyenTau'];
            $this->ID_NguoiDatCho = $row['ID_NguoiDatCho'];
            $this->TenNguoiDatCho = $row['HoTenNguoiDatCho'];
        }

        public function getID_KH()
        {
                return $this->ID_KH;
        }

        public function setID_KH($ID_KH)
        {
                $this->ID_KH = $ID_KH;

        }

        public function getHoTen_KH()
        {
                return $this->HoTen_KH;
        }

        public function setHoTen_KH($HoTen_KH)
        {
                $this->HoTen_KH = $HoTen_KH;

        }

        
        public function getCCCD_KH()
        {
                return $this->CCCD_KH;
        }

        public function setCCCD_KH($CCCD_KH)
        {
                $this->CCCD_KH = $CCCD_KH;
        }

        public function getSDT_KH()
        {
                return $this->SDT_KH;
        }

        public function setSDT_KH($SDT_KH)
        {
                $this->SDT_KH = $SDT_KH;

        }

        public function getEmail_KH()
        {
                return $this->Email_KH;
        }

        public function setEmail_KH($Email_KH)
        {
                $this->Email_KH = $Email_KH;

        }

        public function getNgaySinh()
        {
                return $this->NgaySinh;
        }

        public function setNgaySinh($NgaySinh)
        {
                $this->NgaySinh = $NgaySinh;

        }

        public function getMaChoNgoi()
        {
                return $this->MaChoNgoi;
        }

        public function setMaChoNgoi($MaChoNgoi)
        {
                $this->MaChoNgoi = $MaChoNgoi;

        }

        public function getMaChuyenTau()
        {
                return $this->MaChuyenTau;
        }

        public function setMaChuyenTau($MaChuyenTau)
        {
                $this->MaChuyenTau = $MaChuyenTau;

        }

        public function getID_NguoiDatCho()
        {
                return $this->ID_NguoiDatCho;
        }
        public function setID_NguoiDatCho($ID_NguoiDatCho)
        {
                $this->ID_NguoiDatCho = $ID_NguoiDatCho;

        }
        public function getTienVe()
        {
                return $this->TienVe;
        }
        public function setTienVe($TienVe)
        {
                $this->TienVe = $TienVe;

        }

        public function getMaVe()
        {
                return $this->MaVe;
        }

        public function setMaVe($MaVe)
        {
                $this->MaVe = $MaVe;

        }

        public function getTenNguoiDatCho()
        {
                return $this->TenNguoiDatCho;
        }

        public function setTenNguoiDatCho($TenNguoiDatCho)
        {
                $this->TenNguoiDatCho = $TenNguoiDatCho;

        }

        public function getTG_XuatPhat()
        {
                return $this->TG_XuatPhat;
        }

        public function setTG_XuatPhat($TG_XuatPhat)
        {
                $this->TG_XuatPhat = $TG_XuatPhat;

        }

        

        public function getGaDi()
        {
                return $this->GaDi;
        }
        public function setGaDi($GaDi)
        {
                $this->GaDi = $GaDi;

        }

        
        public function getGaDen()
        {
                return $this->GaDen;
        }

        public function setGaDen($GaDen)
        {
                $this->GaDen = $GaDen;

        }

        public function getMaTau()
        {
                return $this->MaTau;
        }

        public function setMaTau($MaTau)
        {
                $this->MaTau = $MaTau;

        }

        public function getMaToa()
        {
                return $this->MaToa;
        }
        public function setMaToa($MaToa)
        {
                $this->MaToa = $MaToa;

        }


        public function getTenLoaiToa()
        {
                return $this->TenLoaiToa;
        }

        public function setTenLoaiToa($TenLoaiToa)
        {
                $this->TenLoaiToa = $TenLoaiToa;

        }


        public function getThanhToan()
        {
                return $this->ThanhToan;
        }


        public function setThanhToan($ThanhToan)
        {
                $this->ThanhToan = $ThanhToan;
        }
    }
?>
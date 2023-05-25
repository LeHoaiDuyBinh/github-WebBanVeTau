<?php
    class KhachHangObject{
        private $ID_KH;
        private $HoTen_KH;
        private $CCCD_KH;
        private $SDT_KH;
        private $Email_KH;
        private $NgaySinh;
        private $MaChoNgoi;
        private $MaChuyenTau;
        private $ID_NguoiDatCho;

        public function __construct($row)
        {
            $this->ID_KH = $row['ID_KH'];
            $this->HoTen_KH = $row['HoTen_KH'];
            $this->CCCD_KH = $row['CCCD_KH'];
            $this->SDT_KH = $row['SDT_KH'];
            $this->Email_KH = $row['Email_KH'];
            $this->NgaySinh = $row['NgaySinh'];
            $this->MaChoNgoi = $row['MaChoNgoi'];
            $this->MaChuyenTau = $row['MaChuyenTau'];
            $this->ID_NguoiDatCho = $row['ID_NguoiDatCho'];
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
    }
?>
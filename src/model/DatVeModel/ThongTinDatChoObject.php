<?php
    class ThongTinDatChoObject{

        private $MaDatCho;
        private $CCCD;
        private $HoTen;
        private $LoaiCho;
        private $MaChoNgoi;
        private $MaTau;
        private $MaToa;
        private $ThoiGianXuatPhat;
        private $TenGaXuatPhat;
        private $TenGaDiemDen;
        Private $TienVe;

        public function __construct($row,$MaDatCho)
        {        
            $this->MaDatCho=$MaDatCho;
            $this->CCCD=$row['CCCD'];
            $this->HoTen = $row['HoTen'];
            $this->LoaiCho=$row['LoaiCho'];
            $this->MaChoNgoi=$row['MaChoNgoi'];
            $this->MaTau=$row['MaTau'];
            $this->MaToa=$row['MaToa'];
            $this->ThoiGianXuatPhat=$row['ThoiGianXuatPhat'];
            $this->TenGaXuatPhat=$row['TenGaXuatPhat'];
            $this->TenGaDiemDen=$row['TenGaDiemDen'];
            $this->TienVe=$row['TienVe'];

        }
        public function setTienVe($TienVe)
        {
                return $this->TienVe = $TienVe;
        }
        public function getTienVe()
        {
                return $this->TienVe;
        }
        public function setLoaiCho($LoaiCho)
        {
                return $this->LoaiCho = $LoaiCho;
        }
        public function getLoaiCho()
        {
                return $this->LoaiCho;
        }
        public function setMaDatCho($MaDatCho)
        {
                return $this->MaDatCho = $MaDatCho;
        }
        public function getMaDatCho()
        {
                return $this->MaDatCho;
        }
        public function setCCCD($CCCD)
        {
                return $this->CCCD = $CCCD;
        }
        public function getCCCD()
        {
                return $this->CCCD;
        }
        public function setTenGaXuatPhat($TenGaXuatPhat)
        {
                return $this->TenGaXuatPhat = $TenGaXuatPhat;
        }
        public function getTenGaXuatPhat()
        {
                return $this->TenGaXuatPhat;
        }
        public function setTenGaDiemDen($TenGaDiemDen)
        {
                return $this->TenGaDiemDen = $TenGaDiemDen;
        }
        public function getTenGaDiemDen()
        {
                return $this->TenGaDiemDen;
        }
        public function setHoTen($HoTen)
        {
                return $this->HoTen = $HoTen;
        }
        public function getHoTen()
        {
                return $this->HoTen;
        }
        public function setMaTau($MaTau)
        {
                return $this->MaTau = $MaTau;
        }
        public function getMaTau()
        {
                return $this->MaTau;
        }
        public function setMaToa($MaToa)
        {
                return $this->MaToa = $MaToa;
        }
        public function getMaToa()
        {
                return $this->MaToa;
        }
        public function setThoiGianXuatPhat($ThoiGianXuatPhat)
        {
                return $this->ThoiGianXuatPhat = $ThoiGianXuatPhat;
        }
        public function getThoiGianXuatPhat()
        {
                return $this->ThoiGianXuatPhat;
        }
       
        public function setMaChoNgoi($MaChoNgoi)
        {
                return $this->MaChoNgoi = $MaChoNgoi;
        }
        public function getMaChoNgoi()
        {
                return $this->MaChoNgoi;
        }
    }
?>
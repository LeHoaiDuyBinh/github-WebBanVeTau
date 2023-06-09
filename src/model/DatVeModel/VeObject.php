<?php
    class VeObject{
        private $MaVe;
        private $MaChuyenTau;
        private $MaChoNgoi;
        private $HoTen;
        private $MaTau;
        private $MaToa;
        private $ThoiGianXuatPhat;
        private $TenGaXuatPhat;
        private $TenGaDiemDen;

        public function __construct($row)
        {        
        
            $this->MaVe=$row['MaVe'];
            $this->MaChuyenTau = $row['MaChuyenTau'];
            $this->MaChoNgoi=$row['MaChoNgoi'];
            $this->HoTen=$row['HoTen'];
            $this->MaTau=$row['MaTau'];
            $this->MaToa=$row['MaToa'];
            $this->ThoiGianXuatPhat=$row['ThoiGianXuatPhat'];
            $this->TenGaXuatPhat=$row['TenGaXuatPhat'];
            $this->TenGaDiemDen=$row['TenGaDiemDen'];


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
        public function setMaVe($MaVe)
        {
                return $this->MaVe = $MaVe;
        }
        public function getMaVe()
        {
                return $this->MaVe;
        }
        public function setMaChuyenTau($MaChuyenTau)
        {
                return $this->MaChuyenTau = $MaChuyenTau;
        }
        public function getMaChuyenTau()
        {
                return $this->MaChuyenTau;
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
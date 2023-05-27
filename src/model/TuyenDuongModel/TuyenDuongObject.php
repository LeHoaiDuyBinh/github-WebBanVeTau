<?php
    class TuyenDuongObject{
        private $MaTuyenDuong;
        private $XuatPhat;
        private $DiemDen;
        private $TenGaXuatPhat;
        private $TenGaDiemDen;
        private $ThoiGianChay;
        
        public function __construct($row)
        {
            $this->MaTuyenDuong = $row['MaTuyenDuong'];
            $this->XuatPhat = $row['XuatPhat'];
            $this->DiemDen = $row['DiemDen'];
            $this->TenGaXuatPhat = $row['TenGaXuatPhat'];
            $this->TenGaDiemDen = $row['TenGaDiemDen'];
            $this->ThoiGianChay = $row['ThoiGianChay'];
        }

        public function getDiemDen()
        {
                return $this->DiemDen;
        }

        public function setDiemDen($DiemDen)
        {
                $this->DiemDen = $DiemDen;
        }

        public function getXuatPhat()
        {
                return $this->XuatPhat;
        }

        public function setXuatPhat($XuatPhat)
        {
                $this->XuatPhat = $XuatPhat;
        }

        public function getMaTuyenDuong()
        {
                return $this->MaTuyenDuong;
        }

        public function setMaTuyenDuong($MaTuyenDuong)
        {
                $this->MaTuyenDuong = $MaTuyenDuong;
        }

        public function getTenGaXuatPhat()
        {
                return $this->TenGaXuatPhat;
        }

        public function setTenGaXuatPhat($TenGaXuatPhat)
        {
                $this->TenGaXuatPhat = $TenGaXuatPhat;
        }

        public function getTenGaDiemDen()
        {
                return $this->TenGaDiemDen;
        }

        public function setTenGaDiemDen($TenGaDiemDen)
        {
                $this->TenGaDiemDen = $TenGaDiemDen;
        }

        public function getThoiGianChay()
        {
                return $this->ThoiGianChay;
        }

        public function setThoiGianChay($ThoiGianChay)
        {
                $this->ThoiGianChay = $ThoiGianChay;
        }
    }
?>
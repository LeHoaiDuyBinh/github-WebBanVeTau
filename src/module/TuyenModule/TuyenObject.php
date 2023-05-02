<?php
    class TuyenObject{
        private $MaTuyen;
        private $XuatPhat;
        private $DiemDen;
        private $TenGaXuatPhat;
        private $TenGaDiemDen;
        
        public function __construct($row)
        {
            $this->MaTuyen = $row['MaTuyen'];
            $this->XuatPhat = $row['XuatPhat'];
            $this->DiemDen = $row['DiemDen'];
            $this->TenGaXuatPhat = $row['TenGaXuatPhat'];
            $this->TenGaDiemDen = $row['TenGaDiemDen'];
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

        public function getMaTuyen()
        {
                return $this->MaTuyen;
        }

        public function setMaTuyen($MaTuyen)
        {
                $this->MaTuyen = $MaTuyen;
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
    }
?>
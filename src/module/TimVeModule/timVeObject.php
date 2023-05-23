<?php
    class TimVeObject{
        private $MaTau;
        private $TenGaDiemDen;
        private $TenGaXuatPhat;
        private $TrangThai;
        private $ThoiGianXuatPhat;
        private $ThoiGianChay; 
        private $Toa;
        public function __construct($row,$toa)
        {
                $this->Toa=$toa;
            $this->MaTau = $row['MaTau'];
            $this->TenGaXuatPhat = $row['TenGaXuatPhat'];
            $this->TenGaDiemDen = $row['TenGaDiemDen'];
            $this->ThoiGianXuatPhat = $row['ThoiGianXuatPhat'];
            $this->ThoiGianChay = $row['ThoiGianChay'];
            $this->TrangThai = $row['TrangThai'];
        }
        public function getToa()
        {
                return $this->Toa;
        }
        public function getTenGaDiemDen()
        {
                return $this->TenGaDiemDen;
        }

        public function setTenGaDiemDen($TenGaDiemDen)
        {
                $this->TenGaDiemDen = $TenGaDiemDen;
        }
        public function getTenGaXuatPhat()
        {
                return $this->TenGaXuatPhat;
        }

        public function setTenGaXuatPhat($TenGaXuatPhat)
        {
                $this->TenGaXuatPhat = $TenGaXuatPhat;
        }
        public function getMaTau()
        {
                return $this->MaTau;
        }

        public function setMaTau($MaTau)
        {
                $this->MaTau = $MaTau;
        }

        public function getThoiGianXuatPhat()
        {
                return $this->ThoiGianXuatPhat;
        }

        public function setThoiGianXuatPhat($ThoiGianXuatPhat)
        {
                $this->ThoiGianXuatPhat = $ThoiGianXuatPhat;
        }

        public function getThoiGianChay()
        {
                return $this->ThoiGianChay;
        }

        public function setThoiGianChay($ThoiGianChay)
        {
                $this->ThoiGianChay = $ThoiGianChay;
        }
        public function getTrangThai()
        {
                return $this->TrangThai;
        }

        public function setTrangThai($TrangThai)
        {
                $this->TrangThai = $TrangThai;
        }
    }
?>
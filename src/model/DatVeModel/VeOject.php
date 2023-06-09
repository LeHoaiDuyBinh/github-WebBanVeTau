<?php
    class VeObject{
        private $tenNguoiNgoi;
        private $MaTau;
        private $ThoiGianXuatPhat;
        private $TenGaXuatPhat;
        private $TenGaDen;
        private $dsGhe;
        public function __construct($row,$dsGhe)
        {
                $this->dsGhe = $dsGhe;
        
            $this->MaChuyenTau = $row['MaChuyenTau'];
            $this->MaTau=$row['MaTau'];
            $this->ThoiGianXuatPhat=$row['ThoiGianXuatPhat'];
            $this->TenGaXuatPhat=$row['TenGaXuatPhat'];
            $this->TenGaDen=$row['TenGaDen'];
        }
        public function setdsGhe($dsGhe)
        {
                return $this->dsGhe = $dsGhe;
        }
        public function getdsGhe()
        {
                return $this->dsGhe;
        }
        public function setMaChuyenTau($MaChuyenTau)
        {
                return $this->MaChuyenTau = $MaChuyenTau;
        }
        public function getMaChuyenTau()
        {
                return $this->MaChuyenTau;
        }
        public function setThoiGianXuatPhat($ThoiGianXuatPhat)
        {
                return $this->ThoiGianXuatPhat = $ThoiGianXuatPhat;
        }
        public function getThoiGianXuatPhat()
        {
                return $this->ThoiGianXuatPhat;
        }
        public function setMaTau($MaTau)
        {
                return $this->MaTau = $MaTau;
        }
        public function getMaTau()
        {
                return $this->MaTau;
        }
        public function setTenGaXuatPhat($TenGaXuatPhat)
        {
                return $this->TenGaXuatPhat = $TenGaXuatPhat;
        }
        public function getTenGaXuatPhat()
        {
                return $this->TenGaXuatPhat;
        }
        public function setTenGaDen($TenGaDen)
        {
                return $this->TenGaDen = $TenGaDen;
        }
        public function getTenGaDen()
        {
                return $this->TenGaDen;
        }
    }
?>
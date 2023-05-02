<?php
    class TauObject {
        private $MaTau;
        private $GaHienTai;
        private $TrangThai;
        private $TenGa;

        public function __construct($row)
        {
            $this->MaTau = $row['MaTau'];
            $this->GaHienTai = $row['GaHienTai'];
            $this->TrangThai = $row['TrangThai'];
            $this->TenGa = $row['TenGa'];
        }
        
        public function getMaTau()
        {
                return $this->MaTau;
        }

        public function setMaTau($MaTau)
        {
                $this->MaTau = $MaTau;
        }

        public function getGaHienTai()
        {
                return $this->GaHienTai;
        }

        public function setGaHienTai($GaHienTai)
        {
                $this->GaHienTai = $GaHienTai;
        }

        public function getTrangThai()
        {
                return $this->TrangThai;
        }

        public function setTrangThai($TrangThai)
        {
                $this->TrangThai = $TrangThai;
        }

        public function getTenGa()
        {
                return $this->TenGa;
        }
    }
?>
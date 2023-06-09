<?php
    class LoaiToaObject {
        private $MaLoaiToa;
        private $TenLoaiToa;
        private $Gia;
        private $MoTa;
        private $SoChoNgoi;

        public function __construct($row)
        {
            $this->MaLoaiToa = $row['MaLoaiToa'];
            $this->TenLoaiToa = $row['TenLoaiToa'];
            $this->Gia = $row['Gia'];
            $this->MoTa = $row['MoTa'];
            $this->SoChoNgoi = $row['SoChoNgoi'];
        }

        public function getMaLoaiToa()
        {
                return $this->MaLoaiToa;
        }

        public function setMaLoaiToa($MaLoaiToa)
        {
                $this->MaLoaiToa = $MaLoaiToa;
        }

        public function getTenLoaiToa()
        {
                return $this->TenLoaiToa;
        }

        public function setTenLoaiToa($TenLoaiToa)
        {
                $this->TenLoaiToa = $TenLoaiToa;
        }

        public function getGia()
        {
                return $this->Gia;
        }
        
        public function setGia($Gia)
        {
                $this->Gia = $Gia;
        }

        public function getMoTa()
        {
                return $this->MoTa;
        }

        public function setMoTa($MoTa)
        {
                $this->MoTa = $MoTa;
        }

        public function getSoChoNgoi()
        {
                return $this->SoChoNgoi;
        }

        public function setSoChoNgoi($SoChoNgoi)
        {
                $this->SoChoNgoi = $SoChoNgoi;
        }
    }
?>
<?php
    class ChoNgoiObject {
        private $MaChoNgoi;
        private $MaToa;
        private $TrangThai;
        private $MaTau;
        private $ThoiGianKhoiHanh;

        public function __construct($row,$MaTau,$ThoiGianKhoiHanh)
        {
                $this->MaTau = $MaTau;
                $this->ThoiGianKhoiHanh = $ThoiGianKhoiHanh;
            $this->MaChoNgoi = $row['MaChoNgoi'];
            $this->MaToa = $row['MaToa'];
            $this->TrangThai = $row['TrangThai'];
        }

        public function getMaToa()
        {
                return $this->MaToa;
        }

        public function setMaToa($MaToa)
        {
                $this->MaToa = $MaToa;
        }

        public function getMaChoNgoi()
        {
                return $this->MaChoNgoi;
        }

        public function setMaChoNgoi($MaChoNgoi)
        {
                $this->MaChoNgoi = $MaChoNgoi;
        }

        public function getTrangThai()
        {
                return $this->TrangThai;
        }

        public function setTrangThai($TrangThai)
        {
                $this->TrangThai = $TrangThai;
        }
        public function getMaTau()
        {
                return $this->MaTau;
        }

        public function setMaTau($MaTau)
        {
                $this->MaTau = $MaTau;
        }
        public function getThoiGianKhoiHanh()
        {
                return $this->ThoiGianKhoiHanh;
        }

        public function setThoiGianKhoiHanh($ThoiGianKhoiHanh)
        {
                $this->ThoiGianKhoiHanh = $ThoiGianKhoiHanh;
        }
    }
?>
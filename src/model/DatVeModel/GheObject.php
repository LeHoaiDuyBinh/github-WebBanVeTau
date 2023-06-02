<?php
    class GheObject {
        private $MaChoNgoi;
        private $MaToa;
        private $TenLoaiToa;
        private $ThuTuToa;
        private $Gia;
        public function __construct($row)
        {
            $this->MaChoNgoi = $row['MaChoNgoi'];
            $this->MaToa = $row['MaToa'];
            $this->TenLoaiToa = $row['TenLoaiToa'];            
            $this->ThuTuToa = $row['ThuTuToa'];
            $this->Gia = $row['Gia'];


        }
        public function getGia()
        {
                return $this->Gia;
        }

        public function setGia($Gia)
        {
                $this->Gia = $Gia;
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

        public function getTenLoaiToa()
        {
                return $this->TenLoaiToa;
        }

        public function setTenLoaiToa($TenLoaiToa)
        {
                $this->TenLoaiToa = $TenLoaiToa;
        }
        public function getThuTuToa()
        {
                return $this->ThuTuToa;
        }

        public function setThuTuToa($ThuTuToa)
        {
                $this->ThuTuToa = $ThuTuToa;
        }
    }
?>
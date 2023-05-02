<?php
    class ToaObject {
        private $MaToa;
        private $SoChoNgoi;
        private $MaTau;
        private $MaLoaiToa;
        private $LoaiToa;

        public function __construct($row)
        {
            $this->MaToa = $row['MaToa'];
            $this->SoChoNgoi = $row['SoChoNgoi'];
            $this->MaTau = $row['MaTau'];
            $this->MaLoaiToa = $row['MaLoaiToa'];
            $this->LoaiToa = $row['LoaiToa'];
        }

        public function getMaToa()
        {
                return $this->MaToa;
        }

        public function setMaToa($MaToa)
        {
                $this->MaToa = $MaToa;
        }

        public function getSoChoNgoi()
        {
                return $this->SoChoNgoi;
        }

        public function setSoChoNgoi($SoChoNgoi)
        {
                $this->SoChoNgoi = $SoChoNgoi;
        }

        public function getMaTau()
        {
                return $this->MaTau;
        }

        public function setMaTau($MaTau)
        {
                $this->MaTau = $MaTau;
        }

        public function getMaLoaiToa()
        {
                return $this->MaLoaiToa;
        }

        public function setMaLoaiToa($MaLoaiToa)
        {
                $this->MaLoaiToa = $MaLoaiToa;
        }

        public function getLoaiToa()
        {
                return $this->LoaiToa;
        }
    }
?>
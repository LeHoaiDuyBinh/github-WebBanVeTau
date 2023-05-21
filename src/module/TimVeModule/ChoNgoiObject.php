<?php
    class ChoNgoiObject {
        private $MaChoNgoi;
        private $MaToa;
        private $TrangThai;

        public function __construct($row)
        {
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

        public function setMaTau($TrangThai)
        {
                $this->TrangThai = $TrangThai;
        }
    }
?>
<?php
    class MaObject {
        private $MaChoNgoi;
        private $TrangThai;

        public function __construct($row)
        {
            $this->MaChoNgoi = $row['MaChoNgoi'];
            $this->TrangThai = $row['TrangThai'];
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
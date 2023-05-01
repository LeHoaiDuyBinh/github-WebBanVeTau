<?php
    class TuyenObject{
        private $MaTuyen;
        private $XuatPhat;
        private $DiemDen;
        
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
    }
?>
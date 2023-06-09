<?php
    class NguoiDatVeObject{
        private $ID_NguoiDatCho;
        private $HoTen;
        private $CCCD;
        private $SDT;
        private $Email;

        public function __construct($row)
        {       
            $this->ID_NguoiDatCho = $row['ID_NguoiDatCho'];

            $this->HoTen = $row['HoTen'];
            $this->CCCD=$row['CCCD'];
            $this->SDT=$row['SDT'];
            $this->Email=$row['Email'];
        }
        public function setID_NguoiDatCho($ID_NguoiDatCho)
        {
                return $this->ID_NguoiDatCho = $ID_NguoiDatCho;
        }
        public function getID_NguoiDatCho()
        {
                return $this->ID_NguoiDatCho;
        }
        public function setHoTen($HoTen)
        {
                return $this->HoTen = $HoTen;
        }
        public function getHoTen()
        {
                return $this->HoTen;
        }
        public function setCCCD($CCCD)
        {
                return $this->CCCD = $CCCD;
        }
        public function getCCCD()
        {
                return $this->CCCD;
        }
        public function setSDT($SDT)
        {
                return $this->SDT = $SDT;
        }
        public function getSDT()
        {
                return $this->SDT;
        }
        public function setEmail($Email)
        {
                return $this->Email = $Email;
        }
        public function getEmail()
        {
                return $this->Email;
        }
    }
?>
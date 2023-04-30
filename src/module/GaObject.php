<?php 
    class GaObject{
        private $MaGa;
        private $TenGa;

        public function __construct($row)
        {
            $this->MaGa = $row['MaGa'];
            $this->TenGa = $row['TenGa'];
        }

        public function setMaGa($MaGa){
            $this->MaGa = $MaGa;
        }
        public function setTenGa($TenGa){
            $this->TenGa = $TenGa;
        }

        public function getMaGa(){
            return $this->MaGa;
        }
        public function getTenGa(){
            return $this->TenGa;
        }
    }

?>
<?php 
    class UserObject{
        private $Email;
        private $Password;
        private $ChucVu;

        public function __construct($row)
        {
            $this->Email = $row['Email'];
            $this->Password = $row['Password'];
            $this->ChucVu = $row['ChucVu'];
        }

        public function setEmail($Email){
            $this->Email = $Email;
        }

        public function setPassword($Password){
            $this->Password = $Password;
        }

        public function setChucVu($ChucVu){
            $this->ChucVu = $ChucVu;
        }

        public function getEmail(){
            return $this->Email;
        }
        public function getPassword(){
            return $this->Password;
        }
        public function getChucVu(){
            return $this->ChucVu;
        }
    };
?>
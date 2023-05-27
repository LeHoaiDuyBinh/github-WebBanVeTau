<?php 
    class UserObject{
        private $ID;
        private $Email;
        private $Password;
        private $ChucVu;
        private $ChucVutxt;

        public function __construct($row)
        {
            $this->ID = $row['ID_User'];
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

        public function getID()
        {
                return $this->ID;
        }

        public function setID($ID)
        {
                $this->ID = $ID;

        }

        public function getChucVutxt()
        {
                return $this->ChucVutxt;
        }
        public function setChucVutxt($ChucVutxt)
        {
                $this->ChucVutxt = $ChucVutxt;

        }
    };
?>
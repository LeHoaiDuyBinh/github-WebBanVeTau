<?php
    class Database{
        private $hostname = "localhost";
        private $username = "root";
        private $password = "45299417d86f231f6a58434488edb763";
        private $db_name = "train_ticket";

        private $conn = NULL;

        public function __construct()
        {
            
        }

        public function getConn(){
            return $this->conn;
        }
        // kết nối
        public function connect(){
            $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->db_name);
            if(!$this->conn){
                die("Could not connect to mysql".mysqli_error($this->conn));
                exit();
            }
        }
    }

?>
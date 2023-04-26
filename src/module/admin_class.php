<?php
    Class Admin{
        private $db;

        public function __construct()
        {
            require 'db_connect.php';
            $this->db = new Database();
            $this->db->connect();
        }

        function login(){
            extract($_POST);		
            $qry = $this->db->getConn()->execute_query("SELECT * FROM Users where Email = ? and MatKhau = ?", [$Email], [$password]);
            if($qry->num_rows > 0){
                foreach ($qry->fetch_array() as $key => $value) {
                    if($key == 'ID_User')
                        $_SESSION['login_'.$key] = $value;
                }
                    return $_SESSION['login_'.$key];
            }else{
                return -1;
            }
        }
}

?>
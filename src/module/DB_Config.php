<?php
    
    // class Database{
    //     private $hostname = "localhost";
    //     private $username = "root";
    //     private $password = "45299417d86f231f6a58434488edb763";
    //     private $db_name = "train_ticket";

    //     private $conn = NULL;

    //     public function __construct()
    //     {
            
    //     }

    //     public function getConn(){
    //         return $this->conn;
    //     }
    //     // kết nối
    //     public function connect(){
    //         $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->db_name);
    //         if(!$this->conn){
    //             die("Could not connect to mysql".mysqli_error($this->conn));
    //             exit();
    //         }
           
    //     }
    // }
    //error_reporting(E_ALL);
    ini_set('display_errors', 'Off');
    $connectionString = "mysql:host=" . getenv('MYSQL_HOSTNAME') . ";dbname=" . getenv('MYSQL_DATABASE');
    $conn = new \PDO($connectionString, getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
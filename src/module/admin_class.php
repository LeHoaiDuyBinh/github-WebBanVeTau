<?php
    Class Admin{
        //private $db;

        // public function __construct()
        // {
        //     require 'db_connect.php';
        //     $this->db = new Database();
        //     $this->db->connect();
        // }

        function login(){
           
            // extract($_POST);		
            // $qry = $this->db->getConn()->execute_query("SELECT * FROM Users where Email = ? and MatKhau = ?", [$Email], [$password]);
            // if($qry->num_rows > 0){
            //     foreach ($qry->fetch_array() as $key => $value) {
            //         if($key == 'ID_User')
            //             $_SESSION['login_'.$key] = $value;
            //     }
            //         return $_SESSION['login_'.$key];
            // }else{
            //     return -1;
            // }
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                try {
                    include "db.php";
                    $sql = "select * from User where Email=? and Password=?";
                    $sth = $conn->prepare($sql);
                    $sth->execute(array($_POST['Email'], $_POST['password']));
                    $sth->setFetchMode(PDO::FETCH_ASSOC);
                    if ($sth->rowCount() > 0) {
                        $row = $sth->fetch(); {
                            $_SESSION['login_'.$key] = $row['ID_User'];
                        }
                        return "Successful";
                    } else {
                        return $_POST['password']."Wrong Email or password";
                    }
                } catch (PDOException $e) {
                    return  $sql . "<br>" . $e->getMessage();
                }
            };
        }
}
    
?>
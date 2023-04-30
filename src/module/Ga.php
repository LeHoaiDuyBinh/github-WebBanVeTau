<?php 
include "db.php";
    class Ga{
        function load(){
            try {
                $db = new DB();
                $sql = "select * from Ga";
                $sth = $db->select($sql);
                if ($sth->rowCount() > 0) {
                    $row = $sth->fetch(); {
                        $_SESSION['login_id'] = $row['ID_User'];
                    }
                    return "Successful";
                } else {
                    return "Wrong Email or password";
                }
            } catch (PDOException $e) {
                return  $sql . "<br>" . $e->getMessage();
            }
        }
    }
?>
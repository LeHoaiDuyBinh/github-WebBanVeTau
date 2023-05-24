<?php
include_once "./module/db.php";
    Class User{
        function checkAccount($Email, $password){
                try {
                    $db = new DB();
                    $sql = "select * from Users where Email=? and Password=?";
                    $params = array($Email,$password);
                    $sth = $db->select($sql, $params);
                    if ($sth->rowCount() > 0) {
                        $row = $sth->fetch(); {
                            $_SESSION['login_id'] = $row['ID_User'];
                            if($row['ChucVu'] == 0)
                                $_SESSION['ChucVu'] = 'SuperAdmin';
                            else
                                $_SESSION['ChucVu'] = 'Admin';
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
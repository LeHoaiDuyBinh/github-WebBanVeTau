<?php
include_once "./module/db.php";
include_once "UserObject.php";
    Class User{
        private $table = "Users";
        function checkAccount($Email, $password){
                try {
                    $db = new DB();
                    $sql = "select * from Users where Email=? and Password=?";
                    $params = array($Email,$password);
                    $sth = $db->select($sql, $params);
                    if ($sth->rowCount() > 0) {
                        $row = $sth->fetch(); {
                            $_SESSION['login_id'] = $row['ID_User'];
                            if($row['ChucVu'] == 1)
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
        function load(){
            try {
                $db = new DB();
                $sql = "select * from Users";
                $sth = $db->select($sql);
                $arr = [];
                while($row = $sth->fetch()) {
                    $obj = new UserObject($row);
                    if($obj->getChucVu() == 1)
                        $obj->SetChucVutxt("SuperAdmin");
                    else
                        $obj->SetChucVutxt("Admin");
                    $arr[] = $obj;
                }
                    return $arr;
            } catch (PDOException $e) {
                return  $sql . "<br>" . $e->getMessage();
            }
        }
        function create($Email, $Password, $ChucVu){
            try {
                $db = new DB();
                $sql = "insert into $this->table (Email, Password, ChucVu) values(?, ?, ?)";
                $params = array($Email, $Password, $ChucVu);
                $db->execute($sql, $params);

                return "done";
            } catch (PDOException $e) {
                return  $sql . "<br>" . $e->getMessage();
            }
        }

        function edit($Email, $Password, $ChucVu, $ID){
            try {
                $db = new DB();
                $sql = "update $this->table set Email = ?, Password = ?, ChucVu = ?  where ID_User = ?";
                $params = array($Email, $Password, $ChucVu, $ID);
                $db->execute($sql, $params);

                return "done";
            } catch (PDOException $e) {
                return  $sql . "<br>" . $e->getMessage();
            }
        }

        function remove($ID_User){
            try {
                $db = new DB();
                $sql = "delete from $this->table where ID_User = ?";
                $params = array($ID_User);
                $db->execute($sql, $params);

                return "done";
            } catch (PDOException $e) {
                return  $sql . "<br>" . $e->getMessage();
            }
        }
    }
    
?>
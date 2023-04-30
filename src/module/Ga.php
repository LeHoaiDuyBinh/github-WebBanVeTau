<?php 
include "db.php";
include "GaObject.php";
    class Ga{
        function load(){
            try {
                $db = new DB();
                $sql = "select * from Ga";
                $sth = $db->select($sql);
                $arr = [];
                while($row = $sth->fetch()) {
                    $obj = new GaObject($row);
                    $arr[] = $obj;
                }
                    return $arr;
                }
            catch (PDOException $e) {
                return  $sql . "<br>" . $e->getMessage();
            }
        }

        function create($MaGa, $TenGa){
            try {
                $db = new DB();
                $sql = "insert into Ga (MaGa, TenGa) values(?, ?)";
                $params = array($MaGa,$TenGa);
                $db->execute($sql, $params);
                return "done";
                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return "Trùng mã ga";
            }
        }

        function edit($MaGa, $TenGa){
            try {
                $db = new DB();
                $sql = "update Ga set TenGa = ? where MaGa = ?";
                $params = array($TenGa, $MaGa);
                $db->execute($sql, $params);
                return "done";
                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return "Lỗi";
            }
        }
        function remove($MaGa){
            try {
                $db = new DB();
                $sql = "delete from Ga where MaGa = ?";
                $params = array($MaGa);
                $db->execute($sql, $params);
                return "done";
                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return "Lỗi";
            }
        }
    }
?>
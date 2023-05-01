<?php 
include_once "db.php";
include "GaObject.php";
    class Ga{
        private $table = "Ga";
        function load(){
            try {
                $db = new DB();
                $sql = "select * from $this->table";
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
                $sql = "insert into $this->table (MaGa, TenGa) values(?, ?)";
                $params = array($MaGa, $TenGa);
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
                $sql = "update $this->table set TenGa = ? where MaGa = ?";
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
                $sql = "delete from $this->table where MaGa = ?";
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
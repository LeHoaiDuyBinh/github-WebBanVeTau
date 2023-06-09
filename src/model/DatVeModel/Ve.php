<?php 
include_once "./model/db.php";
include_once "VeObject.php";
    class Ve{
        function insert($MaChuyenTau,$MaChoNgoi){
            try {
                $db = new DB();
                $sql="select * from Ve";
                $sth = $db->select($sql);
                $MaVe=sprintf("V%03d",$sth->rowCount()+1);

                $sql="insert into Ve(MaVe, MaChuyenTau, MaChoNgoi) values (?, ?, ?)";
                $db->execute($sql,array($MaVe,$MaChuyenTau,$MaChoNgoi));
                }
            catch (PDOException $e) {
                return  $sql . "<br>" . $e->getMessage();
            }
        }
        
    }
?>
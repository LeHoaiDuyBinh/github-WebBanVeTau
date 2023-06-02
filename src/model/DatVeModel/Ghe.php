<?php
    include_once "./model/db.php";
    include "GheObject.php";
    
        class Ghe{
            function load($dsMaGhe){
                try {
                    $placeholders = rtrim(str_repeat('?,', count($dsMaGhe)), ',');

                    $db = new DB();                    
                    $sql = "select MaChoNgoi,Toa.MaToa,ThuTuToa,TenLoaiToa,Gia from ChoNgoi,Toa,LoaiToa where ChoNgoi.MaToa=Toa.Matoa and Toa.MaLoaiToa=LoaiToa.MaLoaiToa and ChoNgoi.MaChoNgoi IN ($placeholders)";
                    $sth = $db->select($sql,$dsMaGhe);
                    
                    $arr = [];

                    while($row = $sth->fetch()) {
                        $obj = new GheObject($row);
                        $arr[] = $obj;
                    }

                    return $arr;
                }
                catch (PDOException $e) {

                    return  $sql . "<br>" . $e->getMessage();
                }
            }           

          
        }
?>
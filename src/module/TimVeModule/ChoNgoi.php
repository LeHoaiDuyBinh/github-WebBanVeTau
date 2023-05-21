<?php
    include_once "./module/db.php";
    include "ChoNgoiObject.php";
        class ChoNgoi{
            function load($maToa){
                try {
                    $db = new DB();
                    $sql = "select * from ChoNgoi where maToa=?";
                    $sth = $db->select($sql,array($maToa));
                    $arr = [];

                    while($row = $sth->fetch()) {
                        $obj = new ChoNgoiObject($row);
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
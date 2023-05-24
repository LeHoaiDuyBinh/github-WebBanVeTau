<?php
    include_once "./module/db.php";
    include "ChoNgoiObject.php";
    include "Ma.php";

    
        class ChoNgoi{
            function load($maToa,$maChuyenTau,$maTau,$ThoiGianXuatPhat){
                try {
                    $db = new DB();                    
                    // truy xuất tất cả chỗ ngồi của toa
                    $choDaDat=(new Ma)->load($maChuyenTau);
                    $sql = "select *,2 as 'TrangThai' from ChoNgoi where maToa=?";
                    $sth = $db->select($sql,array($maToa));
                    $arr = [];

                    while($row = $sth->fetch()) {
                        $obj = new ChoNgoiObject($row,$maTau,$ThoiGianXuatPhat);
                        $arr[] = $obj;
                    }

                    
                    for($i=0;$i<count($arr);$i++){
                        foreach($choDaDat as $eachChoDuocDat){
                            if($arr[$i]->getMaChoNgoi()==$eachChoDuocDat->getMaChoNgoi()){
                                $arr[$i]->SetTrangThai($eachChoDuocDat->getTrangThai());
                             
                            }
                        }
                    }

                    return $arr;
                }
                catch (PDOException $e) {
                    return  $sql . "<br>" . $e->getMessage();
                }
            }           

          
        }
?>
<?php
    include_once "./module/db.php";
    include "ToaObject.php";
        class Toa{
            private $table = "Toa";
            function load(){
                try {
                    $db = new DB();
                    $sql = "select TMP.*, LT.TenLoaiToa from 
                    (select T.* from Tau as TU, $this->table as T where TU.MaTau = T.MaTau) as TMP, LoaiToa as LT 
                    where TMP.MaLoaiToa = LT.MaLoaiToa 
                    order by TMP.ThuTuToa DESC";
                    $sth = $db->select($sql);
                    $arr = [];
                    while($row = $sth->fetch()) {
                        $obj = new ToaObject($row);
                        $arr[] = $obj;
                    }
                    $map = [];
                    foreach ($arr as $item) {
                        $ma_tau = $item->getMaTau();
                        // Kiểm tra xem key có tồn tại trong mảng kết hợp chưa
                        if (!isset($map[$ma_tau])) {
                            $map[$ma_tau] = [];
                        }

                        // Thêm toa vào danh sách toa thuộc tàu đó
                        $map[$ma_tau][] = $item;
                    }

                        return $map;
                    }
                catch (PDOException $e) {
                    return  $sql . "<br>" . $e->getMessage();
                }
            }

            function getSTT($MaTau){
                try {
                    $db = new DB();
                    $sql = "select COUNT(*) as Tong from $this->table as T where T.MaTau = ?";
                    $params = array($MaTau);
                    $sth = $db->select($sql, $params);
                    $Tong = 0;
                    while($row = $sth->fetch()) {
                        $Tong = $row['Tong'];
                    }
                        return $Tong + 1;
                    }
                catch (PDOException $e) {
                    return  $sql . "<br>" . $e->getMessage();
                }
            }
    
            function create($MaToa, $MaTau , $MaLoaiToa){
                try {
                    $db = new DB();
                    $stt = $this->getSTT($MaTau);
                    $sql = "insert into $this->table (MaToa, MaTau, MaLoaiToa, ThuTuToa) values(?, ?, ?, ?)";
                    $params = array($MaToa, $MaTau, $MaLoaiToa, $stt);
                    $db->execute($sql, $params);
                    return "done";
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Trùng mã toa";
                }
            }
    
            function edit($MaToa, $MaTau){
                try {
                    $db = new DB();
                    $sql = "update $this->table set MaTau = ? where MaToa = ?";
                    $params = array($MaTau, $MaToa);
                    $db->execute($sql, $params);
                    return "done";
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Lỗi";
                }
            }
            function remove($MaToa, $ThuTuToa, $MaTau){
                try {
                    $db = new DB();
                    $sql = "delete from $this->table where MaToa = ?";
                    $params = array($MaToa);
                    $res = $db->execute($sql, $params);
                    $sql = "update $this->table set ThuTuToa = ThuTuToa - 1 where ThuTuToa > ? and MaTau = ?";
                    $params = array($ThuTuToa, $MaTau);
                    $db->execute($sql, $params);
                    return "done";
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Có ngoại lệ khi xóa!";
                }
            }
        }
?>
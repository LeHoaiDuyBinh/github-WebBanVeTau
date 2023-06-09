<?php
    include_once "./model/db.php";
    include_once "ToaObject.php";
    include_once "ChoNgoi.php";
        class Toa{
            private $table = "Toa";
            function load($maTau,$maChuyenTau,$ThoiGianXuatPhat){
                try {
                    $db = new DB();
                    $sql = "select Toa.*,LoaiToa.TenLoaiToa from Toa,LoaiToa 
                    where MaTau=? and Toa.MaLoaiToa= LoaiToa.MaLoaiToa 
                    order by Toa.ThuTuToa DESC;";
                    $sth = $db->select($sql,array($maTau));
                    $arr = [];

                    while($row = $sth->fetch()) {
                        $ChoNgoi= (new ChoNgoi)->load($row['MaToa'],$maChuyenTau,$maTau,$ThoiGianXuatPhat);
                        $obj = new ToaObject($row,$ChoNgoi);
                        $arr[] = $obj;
                    }

                    return $arr;
                    
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

            function addChoNgoi($MaToa, $max){
                try{
                    $db = new DB();
                    for ($i = 1; $i <= $max; $i++) {
                        $MaChoNgoi = sprintf('%s%03d', $MaToa, $i);
                        $sqlChoNgoi = "insert into ChoNgoi (MaChoNgoi, MaToa, TrangThai) values (?, ?, ?)";
                        $paramsChoNgoi = array($MaChoNgoi, $MaToa, 0);
                        $db->execute($sqlChoNgoi, $paramsChoNgoi);
                    }
                }
                catch (PDOException $e) {
                    // Xử lý ngoại lệ tại chỗ
                    return "Lỗi khi thêm Chỗ ngồi: " . $e->getMessage();
                }
            }
    
            function create($MaToa, $MaTau , $MaLoaiToa){
                try {
                    $db = new DB();
                    $stt = $this->getSTT($MaTau);
                    $sql = "insert into $this->table (MaToa, MaTau, MaLoaiToa, ThuTuToa) values(?, ?, ?, ?)";
                    $params = array($MaToa, $MaTau, $MaLoaiToa, $stt);
                    $db->execute($sql, $params);
                    if ($MaLoaiToa == 'LT002' || $MaLoaiToa == 'LT003') {
                        $error = $this->addChoNgoi($MaToa, 42, $db);
                    }
                    elseif ($MaLoaiToa == 'LT001') {
                        $error = $this->addChoNgoi($MaToa, 64, $db);
                    }
                    if($error == NULL)
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

            function removeChoNgoi($MaToa){
                try{
                    $db = new DB();
                    $sqlChoNgoi = "delete from ChoNgoi where ChoNgoi.MaToa = ?";
                    $paramsChoNgoi = array($MaToa);
                    $db->execute($sqlChoNgoi, $paramsChoNgoi);
                }
                catch (PDOException $e) {
                    // Xử lý ngoại lệ tại chỗ
                    return "Lỗi khi xóa Chỗ ngồi: " . $e->getMessage();
                }
            }

            function remove($MaToa, $ThuTuToa, $MaTau){
                try {
                    $this->removeChoNgoi($MaToa);
                    $db = new DB();
                    $sql = "delete from $this->table where MaToa = ?";
                    $params = array($MaToa);
                    $res = $db->execute($sql, $params);
                    $sql = "update $this->table set ThuTuToa = ThuTuToa - 1 where ThuTuToa > ? and MaTau = ?";
                    $params = array($ThuTuToa, $MaTau);
                    $db->execute($sql, $params);
                    $this->removeChoNgoi($MaToa);
                    return "done";
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Có ngoại lệ khi xóa!";
                }
            }
        }
?>
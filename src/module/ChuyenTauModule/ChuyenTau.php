<?php 
include_once "./module/db.php";
include "ChuyenTauObject.php";
    class ChuyenTau{
        private $table = "ChuyenTau";
        function load(){
            try {
                $db = new DB();
                $sql = "select CT.*, TD_TMP.TenGaDiemDen, TD_TMP.TenGaXuatPhat, TD_TMP.ThoiGianChay, TD_TMP.XuatPhat, TD_TMP.DiemDen 
                from ChuyenTau as CT, 
                (
                    select tmp1.*, G2.TenGa as TenGaDiemDen 
                    from 
                    (
                        select TD.*, G.TenGa as TenGaXuatPhat 
                        from Ga as G, TuyenDuong as TD 
                        where G.MaGa = TD.XuatPhat
                    ) as tmp1, Ga as G2 
                    where tmp1.DiemDen = G2.MaGa
                ) as TD_TMP where CT.MaTuyenDuong = TD_TMP.MaTuyenDuong";
                $sth = $db->select($sql);
                $arr = [];
                while($row = $sth->fetch()) {
                    $obj = new ChuyenTauObject($row);

                    // tạo các đối tượng thời gian
                    $thoiGianXuatPhatTmp = new DateTime($obj->getThoiGianXuatPhat());
                    $obj->setThoiGianXuatPhat($thoiGianXuatPhatTmp->format('d-m-Y H:i:s'));
                    $thoiGianChayTmp = explode(':', $obj->getThoiGianChay());
                    $thoiGianChayInterval = new DateInterval(
                        'PT' . $thoiGianChayTmp[0] . 'H' . $thoiGianChayTmp[1] . 'M' . $thoiGianChayTmp[2] . 'S'
                    );

                    // cộng thời gian
                    $thoiGianXuatPhatTmp->add($thoiGianChayInterval);
                    $thoiGianDenNoi = $thoiGianXuatPhatTmp->format('d-m-Y H:i:s');
                    $obj->setThoiGianDenNoi($thoiGianDenNoi);

                    // set Trang thai
                    if($obj->getTrangThai() == 0)
                        $obj->setTrangThaitxt("Sẵn sàng hoạt động");
                    else if($obj->getTrangThai() == 1)
                        $obj->setTrangThaitxt("Đang gặp sự cố");
                    $arr[] = $obj;
                }

                    return $arr;
                }
            catch (PDOException $e) {
                return  $sql . "<br>" . $e->getMessage();
            }
        }

        function create($maChuyenTau, $maTuyenDuong, $maTau, $thoiGianXuatPhat, $trangThai){
            try {
                $db = new DB();
                $thoiGianXuatPhat = date('Y-m-d H:i:s', strtotime($thoiGianXuatPhat));
                $sql = "insert into $this->table (MaChuyenTau, MaTuyenDuong , MaTau, thoiGianXuatPhat, TrangThai) values(?, ?, ?, ?, ?)";
                $params = array($maChuyenTau, $maTuyenDuong, $maTau, $thoiGianXuatPhat, $trangThai);
                $db->execute($sql, $params);
                return "done";
                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return "Trùng mã chuyến tàu";
            }
        }

        function edit($maChuyenTau, $maTuyenDuong, $maTau, $thoiGianXuatPhat, $trangThai){
            try {
                $db = new DB();
                $sql = "update $this->table set MaTuyenDuong = ?, MaTau = ?, thoiGianXuatPhat = ?, TrangThai = ? where MaChuyenTau = ?";
                $params = array($maTuyenDuong, $maTau, $thoiGianXuatPhat, $trangThai, $maChuyenTau);
                $db->execute($sql, $params);
                return "done";
                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return "Lỗi";
            }
        }
        function remove($maChuyenTau){
            try {
                $db = new DB();
                $sql = "delete from $this->table where MaChuyenTau = ?";
                $params = array($maChuyenTau);
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
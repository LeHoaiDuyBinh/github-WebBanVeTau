<?php
class NguoiDatVeObject
{
    private $ID_KhachHang;
    private $HoTen;
    private $CCCD;
    private $NgaySinh;
    private $MaChoNgoi;
    private $TienVe;
    private $MaChuyenTau;
    private $ID_NguoiDatCho;

    public function __construct($row)
    {
        $this->ID_KhachHang = $row['ID_KhachHang'];
        $this->HoTen = $row['HoTen'];
        $this->CCCD = $row['CCCD'];
        $this->NgaySinh = $row['NgaySinh'];
        $this->MaChoNgoi = $row['MaChoNgoi'];
        $this->TienVe = $row['TienVe'];
        $this->MaChuyenTau = $row['MaChuyenTau'];
        $this->ID_NguoiDatCho = $row['ID_NguoiDatCho'];

    }
    public function setID_KhachHang($ID_KhachHang)
    {
        return $this->ID_KhachHang = $ID_KhachHang;
    }
    public function getID_KhachHang()
    {
        return $this->ID_KhachHang;
    }
    public function setHoTen($HoTen)
    {
        return $this->HoTen = $HoTen;
    }
    public function getHoTen()
    {
        return $this->HoTen;
    }
    public function setCCCD($CCCD)
    {
        return $this->CCCD = $CCCD;
    }
    public function getCCCD()
    {
        return $this->CCCD;
    }
    public function setNgaySinh($NgaySinh)
    {
        return $this->NgaySinh = $NgaySinh;
    }
    public function getNgaySinh()
    {
        return $this->NgaySinh;
    }
    public function setMaChoNgoi($MaChoNgoi)
    {
        return $this->MaChoNgoi = $MaChoNgoi;
    }
    public function getMaChoNgoi()
    {
        return $this->MaChoNgoi;
    }
    public function setTienVe($TienVe)
    {
        return $this->TienVe = $TienVe;
    }
    public function getTienVe()
    {
        return $this->TienVe;
    }
    public function setMaChuyenTau($MaChuyenTau)
    {
        return $this->MaChuyenTau = $MaChuyenTau;
    }
    public function getMaChuyenTau()
    {
        return $this->MaChuyenTau;
    }
    public function setID_NguoiDatCho($ID_NguoiDatCho)
    {
        return $this->ID_NguoiDatCho = $ID_NguoiDatCho;
    }
    public function getID_NguoiDatCho()
    {
        return $this->ID_NguoiDatCho;
    }
}
?>
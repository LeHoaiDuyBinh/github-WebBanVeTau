<?php
    class ChuyenTauObject{
        private $MaChuyenTau;
        private $MaTuyenDuong;
        private $TenGaXuatPhat;
        private $TenGaDiemDen;
        private $XuatPhat;
        private $DiemDen;
        private $MaTau;
        private $ThoiGianXuatPhat;
        private $ThoiGianChay;
        private $ThoiGianDenNoi;
        private $TrangThai;
        private $TrangThaitxt;
        private $TrangThaiTau;
        private $GaHienTai;
        public function __construct($row)
        {
            $this->MaChuyenTau = $row['MaChuyenTau'];
            $this->MaTuyenDuong = $row['MaTuyenDuong'];
            $this->MaTau = $row['MaTau'];
            $this->TenGaXuatPhat = $row['TenGaXuatPhat'];
            $this->TenGaDiemDen = $row['TenGaDiemDen'];
            $this->XuatPhat = $row['XuatPhat'];
            $this->DiemDen = $row['DiemDen'];
            $this->ThoiGianXuatPhat = $row['ThoiGianXuatPhat'];
            $this->ThoiGianChay = $row['ThoiGianChay'];
            $this->TrangThai = $row['TrangThai'];
            $this->TrangThaiTau = $row['TrangThaiTau'];
            $this->GaHienTai = $row['GaHienTai'];
        }

        public function getMaChuyenTau()
        {
                return $this->MaChuyenTau;
        }
        public function setMaChuyenTau($MaChuyenTau)
        {
                $this->MaChuyenTau = $MaChuyenTau;
        }

        public function getMaTuyenDuong()
        {
                return $this->MaTuyenDuong;
        }

        public function setMaTuyenDuong($MaTuyenDuong)
        {
                $this->MaTuyenDuong = $MaTuyenDuong;
        }

        public function getTenGaDiemDen()
        {
                return $this->TenGaDiemDen;
        }

        public function setTenGaDiemDen($TenGaDiemDen)
        {
                $this->TenGaDiemDen = $TenGaDiemDen;
        }
        public function getTenGaXuatPhat()
        {
                return $this->TenGaXuatPhat;
        }

        public function setTenGaXuatPhat($TenGaXuatPhat)
        {
                $this->TenGaXuatPhat = $TenGaXuatPhat;
        }
        public function getMaTau()
        {
                return $this->MaTau;
        }

        public function setMaTau($MaTau)
        {
                $this->MaTau = $MaTau;
        }

        public function getThoiGianXuatPhat()
        {
                return $this->ThoiGianXuatPhat;
        }

        public function setThoiGianXuatPhat($ThoiGianXuatPhat)
        {
                $this->ThoiGianXuatPhat = $ThoiGianXuatPhat;
        }

        public function getThoiGianChay()
        {
                return $this->ThoiGianChay;
        }

        public function setThoiGianChay($ThoiGianChay)
        {
                $this->ThoiGianChay = $ThoiGianChay;
        }
        public function getTrangThai()
        {
                return $this->TrangThai;
        }

        public function setTrangThai($TrangThai)
        {
                $this->TrangThai = $TrangThai;
        }
        public function getThoiGianDenNoi()
        {
                return $this->ThoiGianDenNoi;
        }
        public function setThoiGianDenNoi($ThoiGianDenNoi)
        {
                $this->ThoiGianDenNoi = $ThoiGianDenNoi;
        }

        public function getXuatPhat()
        {
                return $this->XuatPhat;
        }

        public function setXuatPhat($XuatPhat)
        {
                $this->XuatPhat = $XuatPhat;;
        }

        public function getDiemDen()
        {
                return $this->DiemDen;
        }

        public function setDiemDen($DiemDen)
        {
                $this->DiemDen = $DiemDen;

        }

        public function getTrangThaitxt()
        {
                return $this->TrangThaitxt;
        }

        public function setTrangThaitxt($TrangThaitxt)
        {
                $this->TrangThaitxt = $TrangThaitxt;

        }

        public function getTrangThaiTau()
        {
                return $this->TrangThaiTau;
        }

        public function setTrangThaiTau($TrangThaiTau)
        {
                $this->TrangThaiTau = $TrangThaiTau;
        }

        public function getGaHienTai()
        {
                return $this->GaHienTai;
        }
        public function setGaHienTai($GaHienTai)
        {
                $this->GaHienTai = $GaHienTai;
        }
    }
?>
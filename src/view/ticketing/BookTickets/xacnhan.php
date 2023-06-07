<link rel="stylesheet" href="/view/css/xacnhan.css">
<div class="xacnhan">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1>Xác nhận thông tin đặt mua vé tàu</h1>
                <div class="form-container">
                    <h2>Thông tin người mua vé</h2>
                    <form>
                        <div class="form-row">
                            <label for="name">Họ và tên:</label>
                            <span><?php echo $thongTinNguoiDat->fullname; ?></span>
                        </div>

                        <div class="form-row">
                            <label for="id">Số CMND/CCCD/Hộ chiếu:</label>
                            <span><?php echo $thongTinNguoiDat->idnumber; ?></span>
                        </div>

                        <div class="form-row">
                            <label for="phone">Số điện thoại:</label>
                            <span><?php echo $thongTinNguoiDat->phone; ?></span>
                        </div>

                        <div class="form-row">
                            <label for="email">Email:</label>
                            <span><?php echo $thongTinNguoiDat->email; ?></span>
                        </div>

                        <div class="form-row">
                            <label for="thanhToan">Phương thức thanh toán:</label>
                            <span>
                                <?php
                                if ($thongTinNguoiDat->thanhToan === "QR") {
                                    echo "Quét mã QR";
                                } elseif ($thongTinNguoiDat->thanhToan === "traSau") {
                                    echo "Thanh toán trả sau";
                                }
                                ?>
                            </span>
                        </div>

                        <h2>Thông tin vé mua</h2>
                        <table>
                            <tr>
                                <th style="width: 10%; text-align: center;">STT</th>
                                <th style="width: 20%;" class="ng-binding">Thông tin vé mua</th>
                                <th style="width: 16%; text-align: right;" class="ng-binding">Giá (VNĐ)</th>
                                <th style="width: 15%; text-align: right;" class="ng-binding">Thanh toán (VNĐ)</th>
                            </tr>
                            <?php $count = 0;
                            foreach ($Ve as $index => $item) { ?>
                                <tr>
                                    <?php if (isset($item->thongTinDi) && !empty($item->thongTinDi)) { ?>
                                        <td style="text-align: center;"><?php echo $count += 1; ?></td>
                                        <td>
                                            Họ và tên: <?php echo $item->tenNguoiNgoi; ?><br>
                                            Số giấy tờ: <?php echo $item->cccdNguoiNgoi; ?><br>
                                            Đối tượng: <?php
                                                        $doiTuongGiam = $item->doiTuongGiam;
                                                        if ($doiTuongGiam === "treEm") {
                                                            echo "Trẻ em";
                                                        } elseif ($doiTuongGiam === "nguoiLon") {
                                                            echo "Người lớn";
                                                        } elseif ($doiTuongGiam === "nguoiCaoTuoi") {
                                                            echo "Người cao tuổi";
                                                        } ?><br>
                                            Hành trình: <?php echo $item->thongTinDi->gaXuatPhat; ?> - <?php echo $item->thongTinDi->gaDen; ?>
                                            <?php echo date("d/m/Y H:i", strtotime($item->thongTinDi->thoiGian)); ?>
                                            Toa <?php echo $item->thongTinDi->thuTuToa; ?>
                                            Chỗ ngồi <?php echo substr($item->thongTinDi->maChoNgoi, -3); ?>
                                            <?php echo $item->thongTinDi->tenLoaiToa; ?><br>

                                        </td>
                                        <td style="text-align: right;"><?php echo number_format($item->giaVeChieuDi); ?></td>
                                        <td style="text-align: right;"><?php echo number_format($item->thanhTienChieuDi); ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <?php if (isset($item->thongTinVe) && !empty($item->thongTinVe)) { ?>
                                        <td style="text-align: center;"><?php echo $count += 1; ?></td>
                                        <td>
                                            Họ và tên: <?php echo $item->tenNguoiNgoi; ?><br>
                                            Số giấy tờ: <?php echo $item->cccdNguoiNgoi; ?><br>
                                            Đối tượng: <?php
                                                        $doiTuongGiam = $item->doiTuongGiam;
                                                        if ($doiTuongGiam === "treEm") {
                                                            echo "Trẻ em";
                                                        } elseif ($doiTuongGiam === "nguoiLon") {
                                                            echo "Người lớn";
                                                        } elseif ($doiTuongGiam === "nguoiCaoTuoi") {
                                                            echo "Người cao tuổi";
                                                        } ?><br>
                                            Hành trình: <?php echo $item->thongTinVe->gaXuatPhat; ?> - <?php echo $item->thongTinVe->gaDen; ?>
                                            <?php echo date("d/m/Y H:i", strtotime($item->thongTinVe->thoiGian)); ?>
                                            Toa <?php echo $item->thongTinVe->thuTuToa; ?>
                                            Chỗ ngồi <?php echo substr($item->thongTinVe->maChoNgoi, -3); ?>
                                            <?php echo $item->thongTinVe->tenLoaiToa; ?><br>

                                        </td>
                                        <td style="text-align: right;"><?php echo number_format($item->giaVeChieuVe); ?></td>
                                        <td style="text-align: right;"><?php echo number_format($item->thanhTienChieuVe); ?></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3">
                                    <div style="float: right;">
                                        <span class="pull-right"><strong class="ng-binding">Tổng tiền</strong></span>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <strong class="ng-binding tongTien" id="tongTien"><?php echo number_format($thongTinNguoiDat->tongTien); ?></strong>
                                </td>
                            </tr>
                        </table>

                        <div class="button-preNext" style="margin-top: 20px; margin-bottom: 20px;">
                            <button class="back-button" onclick="quayLai()">Quay lại</button>
                            <button class="next-button" onclick="dongY()">Đồng ý mua vé</button>
                        </div>
                </div>

            </div>
        </div>
    </div>
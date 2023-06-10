<link rel="stylesheet" href="/view/css/xacnhan.css">
<div class="xacnhan">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1>Xác nhận thông tin đặt mua vé tàu</h1>
                <div class="form-container">
                    <h2 class="fs-title">Thông tin người mua vé</h2>
                    <?php //var_dump($Ve);
                    //var_dump($thongTinNguoiDat) ?>
                    <form>
                        <div class="form-row">
                            <label for="name">Họ và tên:</label>
                            <span><?php echo $thongTinNguoiDat->HoTen; ?></span>
                        </div>

                        <div class="form-row">
                            <label for="id">Số CMND/CCCD/Hộ chiếu:</label>
                            <span><?php echo $thongTinNguoiDat->CCCD; ?></span>
                        </div>

                        <div class="form-row">
                            <label for="phone">Số điện thoại:</label>
                            <span><?php echo $thongTinNguoiDat->SDT; ?></span>
                        </div>

                        <div class="form-row">
                            <label for="email">Email:</label>
                            <span><?php echo $thongTinNguoiDat->Email; ?></span>
                        </div>

                        <div class="form-row thanhToan" data-thanh-toan="<?php echo $thongTinNguoiDat->thanhToan ?>">
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
                        <h2 class="fs-title">Thông tin vé mua</h2>
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
                                    <td style="text-align: center;"><?php echo $count += 1; ?></td>
                                    <td>
                                        Họ và tên: <?php echo $item->HoTen; ?><br>
                                        <?php if (isset($item->CCCD) && !empty($item->CCCD)) { ?>
                                            Số giấy tờ: <?php echo $item->CCCD; ?><br>
                                        <?php
                                        } ?>
                                        Ngày sinh: <?php echo date("d/m/Y", strtotime($item->NgaySinh)); ?><br>
                                        Đối tượng: <?php
                                                    $doiTuongGiam = $item->doiTuongGiam;
                                                    if ($doiTuongGiam === "treEm") {
                                                        echo "Trẻ em";
                                                    } elseif ($doiTuongGiam === "nguoiLon") {
                                                        echo "Người lớn";
                                                    } elseif ($doiTuongGiam === "nguoiCaoTuoi") {
                                                        echo "Người cao tuổi";
                                                    } ?><br>
                                        Hành trình: <?php echo $item->gaXuatPhat; ?> - <?php echo $item->gaDen; ?>
                                        <?php echo date("d/m/Y H:i", strtotime($item->thoiGian)); ?>
                                        Toa <?php echo $item->thuTuToa; ?>
                                        Chỗ ngồi <?php echo substr($item->MaChoNgoi, -2); ?>
                                        <?php echo $item->tenLoaiToa; ?><br>
                                    </td>
                                    <td style="text-align: right;"><?php echo number_format($item->giaVe); ?></td>
                                    <td style="text-align: right;"><?php echo number_format($item->TienVe); ?></td>
                                <?php } ?>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <div style="float: right;">
                                            <span class="pull-right"><strong class="ng-binding">Tổng tiền</strong></span>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <strong class="ng-binding tongTien" id="tongTien"><?php echo number_format($thongTinNguoiDat->TienVe); ?></strong>
                                    </td>
                                </tr>
                        </table>

                        <div class="button-preNext" style="margin-top: 20px; margin-bottom: 20px;">
                            <button class="back-button" onclick="quayLai()" type="button">Quay lại</button>
                            <button class="next-button" onclick="dongY(event)" type="submit">Đồng ý mua vé</button>
                        </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--Script-->
<script src="/view/javascript/xacnhan.js"></script>
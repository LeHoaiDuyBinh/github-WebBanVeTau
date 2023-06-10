<link rel="stylesheet" href="/view/css/hienthongtin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Thanh toán bằng mã qr -->
<? if ($phuongThucThanhToan == "QR") { ?>
    <div class="body-page">
        <h1 class="title"><strong>DANH SÁCH GIAO DỊCH ĐÃ THANH TOÁN</strong></h1>
        <div class="row-1">
            <div class="colume1">
                <? foreach ($arr as $each) : ?>
                    <div class="box">
                        <div class="ticket">
                            <span class="airline">PTIT Train</span>
                            <span class="airline airlineslip">PTIT Train</span>
                            <span class="boarding"><? echo $each->getMaVe() ?></span>
                            <div class="content">
                                <span class="jfk"><? echo $each->getTenGaXuatPhat() ?></span>
                                <span class="plane">
                                    <i class="fa fa-train" aria-hidden="true" style="font-size:35px; margin-top:17px; margin-left: 35px;"></i>
                                </span>
                                <span class="sfo"><? echo $each->getTenGaDiemDen() ?></span>
                                <span class="jfk jfkslip"><? echo $each->getTenGaXuatPhat() ?></span>
                                <span class="plane planeslip">
                                    <i class="fa fa-train" aria-hidden="true" style="font-size:30px; margin-top:10px; margin-left: 15px;"></i>
                                </span>
                                <span class="sfo sfoslip"><? echo $each->getTenGaDiemDen() ?></span>
                                <div class="sub-content">
                                    <span class="watermark">PTIT Train</span>
                                    <span class="name">HO VA TEN<br>
                                        <span><? echo $each->getHoTen() ?></span>
                                    </span>
                                    <span class="flight">MA TAU<br>
                                        <span><? echo $each->getMaTau() ?></span>
                                    </span>
                                    <span class="gate">MA TOA<br>
                                        <span><? echo $each->getMaToa() ?></span>
                                    </span>
                                    <span class="seat">MA CHO<br>
                                        <span><? echo $each->getMaChoNgoi() ?></span>
                                    </span>
                                    <span class="boardingtime">THOI GIAN KHOI HANH<br>
                                        <span><? echo $each->getThoiGianXuatPhat() ?></span>
                                    </span>
                                    <span class="flight flightslip">MA TOA<br>
                                        <span><? echo $each->getMaToa() ?></span>
                                    </span>
                                    <span class="seat seatslip">MA CHO<br>
                                        <span><? echo $each->getMaChoNgoi() ?></span>
                                    </span>
                                    <span class="name nameslip">HO VA TEN<br>
                                        <span><? echo $each->getHoTen() ?></span>
                                    </span>
                                </div>
                            </div>
                            <div class="barcode"></div>
                            <div class="barcode slip"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="colume2">
                <h1 class="title"><strong>Một số lưu ý</strong></h1>
                <div class="panel-body">
                    <p>1. Chuẩn bị trước thông tin cần thiết: Trước khi đến quầy, hãy đảm bảo bạn đã chuẩn bị các thông tin cần thiết như tên
                        hành khách, ngày đi, ga đi và ga đến, loại vé, và các yêu cầu đặc biệt khác. Điều này sẽ giúp quá trình mua vé diễn ra
                        nhanh chóng và thuận lợi hơn.</p>
                    <p>2. Đến sớm và sắp xếp thứ tự: Đến quầy vé tàu hỏa sớm để có đủ thời gian để xếp hàng và chờ lượt. Hãy chắc chắn rằng bạn
                        đã xếp hàng đúng thứ tự và tuân thủ hướng dẫn từ nhân viên bán vé.</p>
                    <p>3. Giữ các giấy tờ và thông tin cần thiết: Khi đến quầy, hãy giữ các giấy tờ và thông tin cần thiết như giấy tờ tùy thân
                        (CMND, hộ chiếu), thông tin đặt vé (mã đặt chỗ, mã vé), và bất kỳ tài liệu hỗ trợ nào để nhân viên bán vé có thể kiểm tra
                        và hoàn tất giao dịch một cách chính xác..</p>
                    <p>4. Kiểm tra vé và thông tin: Sau khi nhận vé từ nhân viên bán vé, hãy kiểm tra kỹ thông tin trên vé như ngày giờ đi, ga đi
                        và ga đến, tên hành khách và loại vé. Nếu có bất kỳ sai sót nào, hãy thông báo ngay cho nhân viên để sửa chữa.</p>
                    <p>5. Giữ vé cẩn thận: Vé là tài sản quan trọng và cần được giữ cẩn thận cho đến khi bạn sử dụng nó. Hãy đặt vé ở một nơi an
                        toàn và tránh gấp, rách hay mất vé.</p>
                    <i>Trân trọng cảm ơn!</i>
                </div>
            </div>
        </div>
    </div>
<? } ?>

<!-- Chưa thanh toán -->
<div class="body-page" style="align-items: stretch !important">
    <h1 class="title"><strong>GIAO DỊCH ĐANG CHỜ THANH TOÁN</strong></h1>
    <h5 style="padding: 15px">Mã đặt chỗ: <? echo $arr[0]->getMaDatCho() ?></h5>
    <div class="col-md-12 table-responsive list-ticket-deskhop" ng-show="bookingInfo.BookingInfos.length > 0">
        <h5 class="et-register-block ng-binding" style="margin-left:0px">Thông tin vé chờ thanh toán</h5>
        <table class="table table-bordered">
            <thead class="et-table-header">
                <tr>
                    <th style="width: 15%; text-align: center">Họ tên</th>
                    <th style="width: 15%; text-align: center" class="ng-binding">Số CMND/ Hộ chiếu</th>
                    <th style="width: 15%; text-align: center" class="ng-binding">Loại chỗ</th>
                    <th style="width: 27%; text-align: center" class="ng-binding">Thông tin vé</th>
                    <th style="width: 15%; text-align: center" class="ng-binding">Trạng thái</th>
                    <th style="width: 13%; text-align: center" class="ng-binding">Thành tiền (VNĐ)</th>
                </tr>
            </thead>
            <tbody ng-repeat="group in bookingGroup" class="ng-scope">
                <? $tong = 0; foreach ($arr as $each) : ?>
                    <tr ng-repeat="book in group" class="ng-scope">
                        <td class="et-table-cell ng-binding"><?echo $each->getHoTen()?></td>
                        <td class="et-table-cell ng-binding"><?echo $each->getCCCD()?></td>
                        <td class="et-table-cell et-text-md ng-binding"><?echo $each->getLoaiCho()?></td>
                        <td class="et-table-cell et-text-md">
                            <div class="ng-binding"><?echo $each->getTenGaXuatPhat() . " - " . $each->getTenGaDiemDen()?></div>
                            <div class="ng-binding">Mã tàu: <?echo $each->getMaTau()?></div>
                            <div class="ng-binding">Thời gian khởi hành: <?echo $each->getThoiGianXuatPhat()?></div>
                            <div class="ng-binding">Mã Toa: <?echo $each->getMaToa()?> - Mã chỗ: <?echo $each->getMaChoNgoi()?></div>
                        </td>
                        <td class="et-table-cell et-text-md ng-binding">Chờ thanh toán trả sau.</td>
                        <td class="et-table-cell text-right ng-binding"><?echo number_format($each->getTienVe()); $tong += $each->getTienVe()?></td>
                    </tr>
                <? endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="info">
                    <td colspan="5"><span class="pull-right"><strong class="ng-binding">Tổng tiền</strong></span></td>
                    <td class="text-right"><strong class="ng-binding"><?echo number_format($tong)?></strong></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="colume2" style="align-items: flex-start">
        <p>Vé của quý khách đã được tạm khóa. Quý khách vui lòng thanh toán trước 24 giờ kể từ lúc đặt vé thành công. Sau 24 giờ vé sẽ bị hủy,
            quý khách có nhu cầu đặt vé vui lòng quay về trang chủ để chọn và đặt vé.</p>
        <i>Trân trọng cảm ơn!</i>
    </div>
</div>
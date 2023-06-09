
    <div class="thongtin top">
        <div class="footer-corporate-inset">
            <div class="container container2">
                <div>
                   
                        <div class="booking-table">
                                <h1 id="bookingInfo">THÔNG TIN ĐẶT CHỖ</h1>
                                    <form id="bookingForm" action="/?page=thongtindatcho&action=tracuuthongtin" method="POST">
                                            <label for="bookingCode">Mã đặt chỗ:</label>
                                            <input type="text" id="bookingCode" name="maDatCho" required><br>
                                            <button type="submit" class="button-tra-cuu" id="bookingButton">TRA CỨU</button>
                                            <div class="quen-ma-dat-cho" id="forgotBookingCode">Quên mã đặt chỗ?</div>
                                    </form>
                                        <p class="processing-transactions">Các giao dịch đang được xử lý: <span class="smaller-text"></span></p>
                                            <p id="bookingCodeResult"></p>
                                            <p id="emailResult"></p>
                                            <p id="phoneNumberResult"></p>
                                            <p id="cccdResult"></p>
                                        <table id="booking-info-table">
                                            <!-- Đây là bảng sẽ hiển thị thông tin đặt chỗ sau khi tra cứu -->
                                            <table id="booking-info-table">
                                                <thead class="et-table-header">
                                                    <tr>
                                                      <th style="width: 10%;" class="ng-binding">Họ tên</th>
                                                      <th style="width: 12%;" class="ng-binding">Số CCCD/CMND</th>
                                                      <th style="width: 9%;" class="ng-binding">Loại chỗ</th>
                                                      <th style="width: 7%;" class="ng-binding">Mã tàu</th>
                                                      <th style="width: 7%;" class="ng-binding">Mã toa</th>
                                                      <th style="width: 10%;" class="ng-binding">Mã chổ ngồi</th>
                                                      <th style="width: 25%;" class="ng-binding">Tuyến</th>
                                                      <th style="width: 15%;" class="ng-binding">Thời gian</th>
                                                      <th style="width: 15%;" class="ng-binding">Phương thức thanh toán</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                  <?php if (isset($arr)): ?>
                                                    <?php foreach($arr as $each): ?>
                                                    <tr>
                                                        <td>
                                                        <?php echo $each->getHoTen_KH(); ?>
                                                        </td>

                                                        <td>
                                                        <?php echo $each->getCCCD_KH(); ?>
                                                        </td>

                                                        <td>
                                                        <?php echo $each->getTenLoaiToa(); ?>
                                                        </td>

                                                        <td>
                                                        <?php echo $each->getMaTau(); ?>
                                                        </td>

                                                        <td>
                                                        <?php echo $each->getMaToa(); ?>
                                                        </td>
                                                        <td>
                                                        <?php echo $each->getMaChoNgoi(); ?>
                                                        </td>
                                                        <td>
                                                        <?php echo $each->getGaDi() . ' - ' . $each->getGaDen(); ?>
                                                        </td>
                                                        <td>
                                                        <?php echo $each->getTG_XuatPhat(); ?>
                                                        </td>
                                                        <td>
                                                        <?php echo $each->getThanhToan(); ?>
                                                        </td>
                                                    </tr>
                                                 <?php endforeach; ?>
                                                 <?php endif; ?>
                                                  </tbody>
                                            </table>
                                        </table>   
                            </div>
                        <div style="background-color: rgba(255, 255, 255, 0.9);"></div>      
                    </div>
            </div>

<!-- Animation Header -->
<script>
  const link = document.querySelector('.nav-link.thongtin');
  link.style.borderBottom = '3px solid transparent';
  link.style.transition = 'border-color 0.3s ease-in-out';
  link.style.borderColor = '#01b3a7';

</script>            




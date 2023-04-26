
    <div class="thongtin top">
        <div class="footer-corporate-inset">
            <div class="container container2">
                <div>
                   
                        <div class="booking-table">
                                <h1 id="bookingInfo">THÔNG TIN ĐẶT CHỖ</h1>
                                    <form id="bookingForm" action = "#">
                                            <label for="bookingCode">Mã đặt chỗ:</label>
                                            <input type="text" id="bookingCode" name="bookingCode" required><br>
                                            <label for="email">Email:</label>
                                            <input type="email" id="email" name="email" required><br>
                                            <label for="phoneNumber">Số điện thoại:</label>
                                            <input type="tel" id="phoneNumber" name="phoneNumber" required><br>
                                            <label for="cccd">Số CCCD/CMND:</label>
                                            <input type="text" id="cccd" name="cccd" required><br>
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
                                                      <th style="width: 5%;">STT</th>
                                                      <th style="width: 10%;" class="ng-binding">Họ tên</th>
                                                      <th style="width: 15%;" class="ng-binding">Mã đặt chỗ</th>
                                                      <th style="width: 10%;" class="ng-binding">Email</th>
                                                      <th style="width: 15%;" class="ng-binding">Số CCCD/CMND</th>
                                                      <th style="width: 15%;" class="ng-binding">Số điện thoại</th>
                                                      <th style="width: 15%;" class="ng-binding">Phương thức thanh toán</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <!-- add db -->
                                                  </tbody>
                                            </table>
                                        </table>   
                            </div>
                        <div style="background-color: rgba(255, 255, 255, 0.9);"></div>      
                    </div>
                <div id="bookingInfo">
                <div class="payment-method-container">
                            <button type="button" id="changePaymentMethod">Thay đổi phương thức thanh toán</button>
                            <select id="paymentMethod" name="paymentMethod">
                                <option value="Visa" selected>Visa</option>
                                <option value="MasterCard">MasterCard</option>
                                <option value="PayPal">PayPal</option>
                                <option value="cash">Tiền mặt</option>
                            </select>
                            <button id="confirmPaymentBtn" class="button-confirm-payment">XÁC NHẬN THANH TOÁN</button>
                </div>
                </div>
            </div>

<!-- Animation Header -->
<script>
const link = document.querySelector('.nav-link.thongtin');
  link.style.borderBottom = '3px solid transparent';
  link.style.transition = 'border-color 0.3s ease-in-out';
  link.style.borderColor = '#01b3a7';
</script>            




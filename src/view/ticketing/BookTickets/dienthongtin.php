<link rel="stylesheet" href="/view/css/dienthongtin.css">

<div class="dienthongtin">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <!-- Đây là bảng sẽ hiển thị thông tin đặt chỗ sau khi chọn mua vé -->
        <table class="table table-bordered">
          <thead class="et-table-header">
            <tr>
              <th style="width: 25%;" class="ng-binding center-align">Họ tên</th>
              <th style="width: 25%;" class="ng-binding center-align">Thông tin chỗ</th>
              <th style="width: 15%;" class="ng-binding center-align">Giá vé</th>
              <th style="width: 15%;" class="ng-binding center-align">Khuyến mãi</th>
              <th style="width: 15%;" class="ng-binding center-align">Thành tiền (VNĐ)</th>
            </tr>
          </thead>
          <!-- add DB từ trang tìm vé-->
          <tbody>
            <tr>
              <!--Họ tên-->
              <form></form>
              <td>
                <div class="input-row">
                  <label for="tenNguoiNgoi">Họ và tên</label>
                  <input type="text" id="tenNguoiNgoi" name="tenNguoiNgoi"><br>
                </div>
                <label for="doiTuong">Đối tượng</label>
                <select name="doiTuongGiam" id="doiTuongGiam" onchange="handleDoiTuongGiamChange()">
                  <option value="nguoiLon">Người lớn</option>
                  <option value="treEm">Trẻ em</option>
                  <option value="nguoiCaoTuoi">Người cao tuổi</option>
                </select>

                <!-- hiện lịch để chọn ngày sinh nếu là trẻ em hoặc người cao tuổi-->
                <div id="ngayThangContainer" style="display: none;">
                  <label for="ngayThang">Ngày tháng</label>
                  <input type="date" name="ngayThang" id="ngayThang" onchange="updateTotal()">
                </div>
                <!-- Nếu là người lớn hoặc người cao tuổi thì hiện ô nhập CCCD -->
                <div id="CCCDContainer" style="display: block;">
                  <label for="cccdNguoiNgoi" style="margin-top: 10px;">Số CCCD/Hộ chiếu</label>
                  <input type="text" id="cccdNguoiNgoi" name="cccdNguoiNgoi">
                </div>
              </td>
              <!-- thông tin vé -->
              <td>
                <!-- chiều đi-->
                <div class="data-ticket chieuDi">
                  <div class="ng-binding">SE8 Thanh Hoá-Biên Hòa</div>
                  <div class="ng-binding">12/05/2023 01:16</div>
                  <div class="ng-binding">NML56 toa 2 chỗ 35</div>
                </div>
                <br><br>
                <!-- chiều về-->
                <div class="data-ticket chieuVe">
                  <div class="ng-binding">SE8 Biên Hòa-Thanh Hoá</div>
                  <div class="ng-binding">13/05/2023 07:32</div>
                  <div class="ng-binding">NML toa 1 chỗ 60</div>
                </div>
              </td>
              <!-- giá vé add từ DB-->
              <td>
                <div class="data-ticket giaVeChieuDi" style="line-height: 6;">
                  <div class="ng-binding">1,200,000</div>
                </div>

                <div class="data-ticket giaVeChieuVe" style="line-height: 6;">
                  <div class="ng-binding">1,204,000</div>
                </div>
              </td>

              <!--Khuyến mãi-->
              <td id="khuyenMaiCell">Không có khuyến mãi vé này</td>
              <!--Thành tiền-->
              <td class="text-right thanhTien" style="line-height: 6;">
                <div class="data-ticket giaVeChieuDi" style="line-height: 6;">
                  <div class="ng-binding">1,200,000</div>
                </div>

                <div class="data-ticket giaVeChieuVe" style="line-height: 6;">
                  <div class="ng-binding">1,204,000</div>
                </div>
              </td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4">
                <div style="float: left;">
                  <div class="input-group input-group-sm">
                    <input type="text" placeholder="Nhập mã giảm giá tại đây" ,="" id="coupon" class="form-control input-sm ng-pristine ng-valid">
                    <span class="input-group-btn">
                      <button class="apply-button" onclick="apDungVoucher()">Áp dụng</button>
                    </span>
                  </div>
                  <p style="margin-top: 10px;" id="couponMessage"></p>
                </div>
                <div style="float: right;">
                  <span class="pull-right"><strong class="ng-binding">Tổng tiền</strong></span>
                </div>
              </td>
              <!--giá trị tổng tiền-->
              <td class="text-right">
                <strong class="ng-binding tongTien">2,404,000</strong>
              </td>
            </tr>
          </tfoot>

        </table>

        <p class="fs-title">Thông tin người đặt vé</p>
        <p>Quý khách vui lòng điền đầy đủ và chính xác các thông tin về người mua vé dưới đây. Các thông tin
          này sẽ được sử dụng để xác minh người mua vé và lấy vé tại ga trước khi lên tàu theo quy định.</p>

        <form>

          <label for="fullname">Họ và tên*</label>
          <input type="text" id="fullname" name="fullname"><br>

          <label for="idnumber">Số CMND/CCCD/Hộ chiếu*</label>
          <input type="text" id="idnumber" name="idnumber"><br>


          <label for="phone">Số điện thoại*</label>
          <input type="text" id="phone" name="phone"><br>


          <label for="email">Email*</label>
          <input type="email" id="email" name="email"><br>


          <p class="fs-title" ,="" style="margin-top: 10px;">Phương thức thanh toán</p>
          <table style="border-collapse: collapse; padding: 5px;">
            <tbody>
              <tr>
                <td style="width: 15%;">
                  <input type="radio" name="thanhToan" value="visa" id="visa">
                </td>
                <td style="width: 15%;">
                  <label for="visa" class="custom-radio">Visa</label>
                </td>
                <td style="width: 15%;">
                  <input type="radio" name="thanhToan" value="masterCard" id="masterCard">
                </td>
                <td style="width: 15%;">
                  <label for="masterCard" class="custom-radio">MasterCard</label>
                </td>
                <td style="width: 15%;">
                  <input type="radio" name="thanhToan" value="payPal" id="payPal">
                </td>
                <td style="width: 15%;">
                  <label for="payPal" class="custom-radio">PayPal</label>
                </td>
                <td style="width: 15%;">
                  <input type="radio" name="thanhToan" value="traSau" id="traSau" checked>
                </td>
                <td style="width: 15%;">
                  <label for="traSau" class="custom-radio">Thanh toán trả sau</label>
                </td>
              </tr>
            </tbody>
          </table>
        </form>
        <div class="button-preNext" style="margin-top: 20px; margin-bottom: 20px;">
          <button class="back-button" onclick="quayLai()">Quay lại</button>
          <button class="next-button" onclick="tiepTheo()">Tiếp theo</button>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- Animation Header -->
<script>
  const link = document.querySelector('.nav-link.dienthongtin');
  link.style.borderBottom = '3px solid transparent';
  link.style.transition = 'border-color 0.3s ease-in-out';
  link.style.borderColor = '#01b3a7';
</script>
<!--Script-->
<script src="/view/javascript/dienthongtin.js"></script>
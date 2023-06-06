<link rel="stylesheet" href="/view/css/dienthongtin.css">

<div class="dienthongtin">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <!-- Đây là bảng sẽ hiển thị thông tin đặt chỗ sau khi chọn mua vé -->
        <table class="table table-bordered table-responsive" id="Table">
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
          <?php 
          var_dump($arrDi);
          var_dump($arrVe)?>
          <!-- DB chiều đi-->
          <?php foreach ($arrDi as $each) : ?>
            <div class="chieuDi" name="maChuyenTau" data-ma-chuyen-tau="<?php echo $each->getMaChuyenTau(); ?>"></div>
            <div class="chieuDi" name="gaXuatPhat" data-ga-xuat-phat="<?php echo $each->getTenGaXuatPhat(); ?>"></div>
            <div class="chieuDi" name="gaDen" data-ga-den="<?php echo $each->getTenGaDen(); ?>"></div>
            <div class="chieuDi" name="thoiGian" data-thoi-gian="<?php echo $each->getThoiGianXuatPhat(); ?>"></div>
            <?php $dsGheDi = []; // Mảng chứa dữ liệu được chuyển đổi
            $tongDi = 0;
            foreach ($each->getdsGhe() as $ghe) {
              $gheDiData = [
                "MaChoNgoi" => $ghe->getMaChoNgoi(),
                "MaToa" => $ghe->getMaToa(),
                "TenLoaiToa" => $ghe->getTenLoaiToa(),
                "ThuTuToa" => $ghe->getThuTuToa(),
                "Gia" => $ghe->getGia()
              ];
              $dsGheDi[] = $gheDiData;
              $tongDi += $ghe->getGia();
            }
            // Mã hóa mảng $dsGhe thành JSON
            $jsonDataDi = htmlspecialchars(json_encode($dsGheDi, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
            ?>
            <div class="dsGheDi" data-ds-ghe-di="<?php echo $jsonDataDi; ?>"></div>
          <?php endforeach; ?>
          <!-- DB chiều về -->
          <?php if (isset($arrVe) && !empty($arrVe)) : ?>
            <?php foreach ($arrVe as $each) : ?>
              <div class="chieuVe" name="maChuyenTau" data-ma-chuyen-tau="<?php echo $each->getMaChuyenTau(); ?>"></div>
              <div class="chieuVe" name="gaXuatPhat" data-ga-xuat-phat="<?php echo $each->getTenGaXuatPhat(); ?>"></div>
              <div class="chieuVe" name="gaDen" data-ga-den="<?php echo $each->getTenGaDen(); ?>"></div>
              <div class="chieuVe" name="thoiGian" data-thoi-gian="<?php echo $each->getThoiGianXuatPhat(); ?>"></div>
              <?php $dsGheVe = []; // Mảng chứa dữ liệu được chuyển đổi
              $tongVe = 0;
              foreach ($each->getdsGhe() as $ghe) {
                $gheVeData = [
                  "MaChoNgoi" => $ghe->getMaChoNgoi(),
                  "MaToa" => $ghe->getMaToa(),
                  "TenLoaiToa" => $ghe->getTenLoaiToa(),
                  "ThuTuToa" => $ghe->getThuTuToa(),
                  "Gia" => $ghe->getGia()
                ];
                $dsGheVe[] = $gheVeData;
                $tongVe += $ghe->getGia();
              }
              // Mã hóa mảng $dsGhe thành JSON
              $jsonDataVe = htmlspecialchars(json_encode($dsGheVe, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
              ?>
              <div class="dsGheVe" data-ds-ghe-ve="<?php echo $jsonDataVe; ?>"></div>
            <?php endforeach; ?>
          <?php endif; ?>

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
                <strong class="ng-binding tongTien" id="tongTien"><?php echo number_format($tongDi + $tongVe, 0, '.', ','); ?></strong>
              </td>

            </tr>
          </tfoot>

        </table>

        <p class="fs-title">Thông tin người đặt vé</p>
        <p>Quý khách vui lòng điền đầy đủ và chính xác các thông tin về người mua vé dưới đây. Các thông tin
          này sẽ được sử dụng để xác minh người mua vé và lấy vé tại ga trước khi lên tàu theo quy định.</p>

        <form id="formInfor" method="POST" action="/?page=xacnhan">

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
                <td style="width: 10%;">
                  <input type="radio" name="thanhToan" value="QR" id="QR">
                </td>
                <td style="width: 35%;">
                  <label for="QR" class="custom-radio">Quét mã QR</label>
                </td>
              </tr>
              <tr>
                <td style="width: 10%;">
                  <input type="radio" name="thanhToan" value="traSau" id="traSau" checked>
                </td>
                <td style="width: 35%;">
                  <label for="traSau" class="custom-radio">Thanh toán trả sau</label>
                </td>
              </tr>
            </tbody>

          </table>
          <div class="button-preNext" style="margin-top: 20px; margin-bottom: 20px;">
            <button class="back-button" onclick="quayLai()" type="button">Quay lại</button>
            <button class="next-button" onclick="tiepTheo(event)" type="submit">Tiếp theo</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<!--Script-->
<script src="/view/javascript/dienthongtin.js"></script>
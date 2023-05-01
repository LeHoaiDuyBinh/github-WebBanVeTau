
  <!-- form trả vé -->
  <div class="container-fluid top">
    <div class="row justify-content-center">
      <div class="col-12">
        <h1 class="text" style="margin-top: 10px;"> Trả vé trực tuyến </h1>
        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
          <form id="msform" action="">
            <!-- thanh tiến trình -->
            <ul id="progressbar">
              <li class="active" id="account"><strong> Chọn vé trả </strong></li>
              <li id="personal"><strong> Danh sách vé trả </strong></li>
              <li id="payment"><strong> Trả vé </strong></li>
              <li id="confirm"><strong> Hoàn tất </strong></li>
            </ul>
            <br>

            <!-- Thông tin cần để tìm vé -->
            <fieldset>
              <div class="form-card">
                <div class="row">
                  <div class="col-7">
                      <p style="margin-left: 19%;" class="fs-title">Điền đầy đủ và chính xác thông tin dưới đây<p>
                  </div>
                </div>
                <div class="input-row">
                  <label class="fieldlabels"> Mã đặt chỗ * </label>
                  <input type="text" name="code" placeholder="Code" id="code" required />
                  <small>Mã đặt chỗ không được để trống</small> </br>
                </div>
                <div class="input-row">
                  <label class="fieldlabels"> Email * </label>
                  <input type="email" name="email" placeholder="Email" id="email" required />
                  <small>Email không được để trống</small> </br>
                </div>
                <div class="input-row">
                  <label class="fieldlabels"> Số điện thoại * </label>
                  <input type="text" name="phn" placeholder="Your phone" id="phone" required />
                  <small>Số điện thoại không được để trống</small> </br>
                </div>
                <div class="input-row">
                  <a class="btn" id="btn-register">Tra cứu</a>
                </div>
                <!-- thông báo không tìm thấy dữ liệu -->
                <div class="row text-center ng-hide" id="no-data" style="display:none;">
                  <h2 class="fs-title" style="text-align: center; color: red;">Không tìm thấy dữ liệu nào</h2>
                </div>
                <!-- tìm thấy dữ liệu -->
                <div id="have-data" style="display:none;">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="fs-title top"> Các giao dịch thành công </h2>
                    </div>
                  </div>
                  <div class="col-md-12 table-responsive list-ticket-desktop">
                    <div ng-show="successGroup.length > 0" class="ng-hide">
                      <table class="table table-bordered">
                        <thead class="et-table-header">
                          <tr>
                            <th style="width: 2%;">#</th>
                            <th style="width: 15%;" class="ng-binding">Họ tên</th>
                            <th style="width: 15%;" class="ng-binding">Thông tin vé</th>
                            <th style="width: 10%;" class="ng-binding">Thành tiền (VNĐ)</th>
                            <th style="width: 15%;" class="ng-binding">Loại trả vé</th>
                            <th style="width: 8%;" class="ng-binding">Lệ phí trả vé</th>
                            <th style="width: 10%;" class="ng-binding">Tiền trả lại</th>
                            <th style="width: 15%;" class="ng-binding">Thông tin vé trả</th>
                            <th style="width: 10%;" class="ng-binding">Chọn vé trả</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- add từ database -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-7">
                      <h2 class="fs-title"> Thông tin người đặt vé </h2>
                    </div>
                  </div>
                  <!-- các thông tin này add từ database -->
                  <label class="fieldlabels"> Họ và tên </label>
                  <input type="text" name="code" id="name" />
                  <label class="fieldlabels"> Số CMND/CCCD/Hộ chiếu </label>
                  <input type="text" name="cmnd" id="cmnd" />
                  <label class="fieldlabels"> Email </label>
                  <input type="email" name="email" id="email" />
                  <label class="fieldlabels"> Số điện thoại </label>
                  <input type="text" name="phn" id="phone" />
                </div>
              </div>
              <input name="next" class="next action-button" value="Next" id="bt-have-data" style="display:none;"
                value="Next" />
            </fieldset>

            <!-- Danh sách vé cần trả -->
            <fieldset>
              <div class="form-card">
                <div class="row">
                  <div class="col-7">
                    <h2 class="fs-title"> Danh sách các vé đã chọn </h2>
                  </div>
                </div>
                <div style="font-size: smaller;">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">CV bán</th>
                        <th class="text-center">Tàu</th>
                        <th class="text-center">Vé</th>
                        <th class="text-center">Hành khách</th>
                        <th>Ga đi</th>
                        <th>Ga đến</th>
                        <th>Tiền vé</th>
                        <th>Phí trả</th>
                        <th>Tiền trả</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- add từ database -->
                    </tbody>
                  </table>
                </div>
                <div class="row form-group"
                  style="background-color: #efefef; border-radius: 3px; padding: 10px; margin-left: 0px; margin-right: 0px;">
                  <!-- tính toán sau khi có database -->
                  <div class="col-xs-4 col-sm-4 text-left">
                    <p class="ng-binding"><span style="color: gray;">Tổng vé:</span> 0</p>
                    <p class="ng-binding"><span style="color: gray;">Tổng lệ phí:</span> 0 VNĐ</p>
                  </div>
                  <div class="col-xs-4 col-sm-4 text-left">
                    <p class="ng-binding"><span style="color: gray;">Tổng tiền vé:</span> 0 VNĐ</p>
                    <p class="ng-binding"><span style="color: gray;">Tổng tiền trả:</span> 0 VNĐ</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-7">
                    <h2 class="fs-title"> Phương thức nhận mã xác thực trả vé </h2>
                    <!-- email add từ database -->
                    <p class="ng-binding">Email: </p>
                  </div>
                </div>
              </div>
              <input type="button" name="next" class="next action-button" value="Next" />
              <input type="button" name="pre" class="pre action-button-pre" value="Pre" />
            </fieldset>

            <!-- Tiến hành trả vé -->
            <fieldset>
              <div class="form-card">
                <div class="row">
                  <div class="col-7">
                    <h2 class="fs-title"> Điền mã xác nhận </h2>
                  </div>
                  <p style="padding: 15px;"> Quý khách vui lòng kiểm tra hòm thư tại địa chỉ email đã dùng mua vé để
                    nhận mã xác nhận.
                    Chúng tôi sẽ dùng mã xác nhận này để đảm bảo rằng chính quý khách là người mua vé và có quyền trả
                    các vé đã mua.</p>
                </div>
                <div class="row form-group">
                  <div class="col-xs-3 col-sm-2 text-left">
                    <label>Mã xác nhận (6 số)</label>
                  </div>
                  <div class="col-xs-2 col-sm-3">
                    <input type="text" class="form-control" id="confirm-code" required>
                    <span id="error-message" style="color: red; display: none;" class="error-message"></span>
                  </div>
                  <div style="margin-left: 20px;">
                    <button class="btn" id="conf">Xác nhận</button>
                    <!-- <button class="btn btn-default btn-sm" ng-disabled="countdownResend != 0 " ng-click="resendRequestTraVe()" disabled="disabled">
                        <span ng-show="countdownResend < 0" class="ng-binding ng-hide">Đã gửi lại mã</span>
                        <span ng-show="countdownResend >= 0" class="ng-binding">Gửi lại mã</span>
                        <span ng-show="countdownResend > 0" class="ng-binding">(1s)</span>
                      </button> -->
                  </div>
                </div>
              </div>
              <input type="button" name="next" class="next action-button" value="Submit" style="display: none;"
                id="submit" />
              <input type="button" name="pre" class="pre action-button-pre" value="Pre" />
            </fieldset>

            <!-- Hoàn tất -->
            <fieldset>
              <div class="form-card">
                <h2 class="purple-text text-center"><strong> Trả vé thành công </strong></h2>
                <h2 class="fs-title"> Thông tin các vé trả </h2>
                <div style="font-size: smaller;">
                  <table class="table table-bordered  table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">CV bán</th>
                        <th class="text-center">Tàu</th>
                        <th class="text-center">Vé</th>
                        <th class="text-center">Hành khách</th>
                        <th>Ga đi</th>
                        <th>Ga đến</th>
                        <th>Tiền vé</th>
                        <th>Phí trả</th>
                        <th>Tiền trả</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- add từ database -->
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="6" style="text-align: center"><span>Tổng</span></td>
                        <td class="text-right"><span style="font-weight:bold;" class="ng-binding"></span></td>
                        <td class="text-right"><span style="font-weight:bold;" class="ng-binding"></span></td>
                        <td class="text-right"><span style="font-weight:bold;" class="ng-binding"></span></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <div>
                  <p class="alert alert-warning">Số tiền hoàn lại đã được tạo lệnh chuyển đến cổng thanh
                    toán. Vui lòng đợi trong khoảng thời gian quy định của các ngân hàng thực hiện đối soát và hoàn về
                    tài khoản cho quý khách</p>
                </div>
                <br><br>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      <div class="col-12">
        <h1 class="text" style="margin-top: 10px;"> Quy định đổi, trả vé </h1>
        <div class="panel-body">
          <p>1. Thời gian, mức phí đổi trả vé:</p>
          <p>- Đổi vé: Vé cá nhân đổi trước giờ tàu chạy 24 giờ trở lên, lệ phí là 20.000 đồng/vé, dưới 24 giờ không đổi
            vé; không áp dụng đổi vé đối với vé tập thể.</p>
          <p>- Trả vé:</p>
          <p>&nbsp; &nbsp; + Vé cá nhân: Trả vé trước giờ tàu chạy từ 24 giờ trở lên lệ phí là 10% giá vé, từ 4 giờ đến
            dưới 24 giờ lệ phí là 20% giá vé, dưới 4 giờ không trả vé.</p>
          <p>&nbsp; &nbsp; + Vé tập thể: Trả vé trước giờ tàu chạy từ 72 giờ trở lên lệ phí là 10% giá vé ,từ 24 giờ đến
            dưới 72 giờ lệ phí là 20% giá vé, dưới 24 giờ không trả vé.</p>
          <p>2. Hình thức trả vé.</p>
          <p>- Khi hành khách mua vé và thanh toán online qua website bán vé của ngành Đường sắt, app bán vé hoặc các
            ứng dụng mua vé tàu hỏa của các đối tác thứ ba thì có thể trả vé online qua các website bán vé của ngành
            đường sắt hoặc đến trực tiếp nhà ga.</p>
          <p>- Khi hành khách mua vé bằng các hình thức khác, muốn đổi vé, trả vé hành khách đến trực tiếp nhà ga kèm
            theo giấy tờ tùy thân bản chính của người đi tàu hoặc người mua vé cho nhân viên đường sắt. Đồng thời, thông
            tin trên thẻ đi tàu phải trùng khớp với giấy tờ tùy thân của hành khách.</p>
          <i>Trân trọng cảm ơn!</i>
        </div>
      </div>
    </div>
  </div>

<!-- Animation Header -->
<script>
const link = document.querySelector('.nav-link.trave');
  link.style.borderBottom = '3px solid transparent';
  link.style.transition = 'border-color 0.3s ease-in-out';
  link.style.borderColor = '#01b3a7';
</script>

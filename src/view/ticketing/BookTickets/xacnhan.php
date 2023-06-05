<link rel="stylesheet" href="/view/css/xacnhan.css">
<div class="xacnhan">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12"> <!--chỗ này là class có css sẵn nên lấy xài luôn -->
                <h1>Xác nhận thông tin đặt mua vé tàu</h1>
                <div class="form-container">
                    <h2>Thông tin người mua vé</h2>
                    <?php var_dump($combinedData);
                    ?>
                    <form>
                        <div class="form-row">
                            <label for="name">Họ và tên:</label>
                            <span><?php echo $_POST['fullname']; ?></span>
                        </div>

                        <div class="form-row">
                            <label for="id">Số CMND/CCCD/Hộ chiếu:</label>
                            <span><?php echo $_POST['idnumber']; ?></span>
                        </div>

                        <div class="form-row">
                            <label for="phone">Số điện thoại:</label>
                            <span><?php echo $_POST['phone']; ?></span>
                        </div>

                        <div class="form-row">
                            <label for="email">Email:</label>
                            <span><?php echo $_POST['email']; ?></span>
                        </div>

                        <!-- <div class="form-row">
                            <label for="company">Tên Công ty/Đơn vị:</label>
                            <span><?php echo $_POST['company']; ?></span>
                        </div>

                        <div class="form-row">
                            <label for="tax">Mã số thuế:</label>
                            <span><?php echo $_POST['tax']; ?></span>
                        </div>

                        <div class="form-row">
                            <label for="address">Địa chỉ:</label>
                            <span><?php echo $_POST['address']; ?></span>
                        </div>
                        <div class="form-row">
                            <label for="pay">Phương thức thanh toán:</label>
                            <span><?php echo $_POST['pay']; ?></span>
                        </div> -->
                </div>

                <h2>Thông tin vé mua</h2>
                <table>
                    <tr>
                        <th style="width: 10%;">STT</th>
                        <th style="width: 20%;" class="ng-binding">Thông tin vé mua</th>
                        <th style="width: 16%;" class="ng-binding">GIÁ(VNĐ)</th>
                        <th style="width: 15%;" class="ng-binding">Thanh toán(VNĐ)</th>
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
<!-- Animation Header -->
<script>
    const link = document.querySelector('.nav-link.xacnhan');
    link.style.borderBottom = '3px solid transparent';
    link.style.transition = 'border-color 0.3s ease-in-out';
    link.style.borderColor = '#01b3a7';
</script>
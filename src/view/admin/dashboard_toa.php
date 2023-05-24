<main style="width: 71%;">
    <header style="width: 100%;">
      <div class="text">
        <h2>Danh sách các toa</h2> 
        
    <table id="myTable">
      <button style="background-color:var(--accent-clr); color: var(--text);; width: 150px; height: 40px; margin-bottom: 20px;" id="addBtn">Thêm toa</button>
      <button style="background-color:var(--accent-clr); color: var(--text);; width: 150px; height: 40px; margin-bottom: 20px; margin-left: 30px;" id="EditBtn">Sửa toa</button>
      <button style="background-color:var(--accent-clr); color: var(--text);; width: 150px; height: 40px; margin-bottom: 20px; margin-left: 30px;" id="RemoveBtn">Xóa toa</button>
      <form>
        <select style="height: 40px; width: 250px; margin-left: 30px;" id="GaTau" name="GaTau">
        <option value="" disabled selected>Chọn ga muốn hiển thị</option>
          <option value="HaNoi">Thành phố Hà Nội</option>
          <option value="HaGiang">Tỉnh Hà Giang</option>
          <option value="CaoBang">Tỉnh Cao Bằng</option>
          <option value="BacKan">Tỉnh Bắc Kạn</option>
          <option value="TuyenQuang">Tỉnh Tuyên Quang</option>
          <option value="LaoCai">Tỉnh Lào Cai</option>
          <option value="DienBien">Tỉnh Điện Biên</option>
          <option value="LaiChau">Tỉnh Lai Châu</option>
          <option value="SonLa">Tỉnh Sơn La</option>
          <option value="YenBai">Tỉnh Yên Bái</option>
          <option value="HoaBinh">Tỉnh Hoà Bình</option>
          <option value="ThaiNguyen">Tỉnh Thái Nguyên</option>
          <option value="LangSon">Tỉnh Lạng Sơn</option>
          <option value="QuangNinh">Tỉnh Quảng Ninh</option>
          <option value="BacGiang">Tỉnh Bắc Giang</option>
          <option value="PhuTho">Tỉnh Phú Thọ</option>
          <option value="VinhPhuc">Tỉnh Vĩnh Phúc</option>
          <option value="BacNinh">Tỉnh Bắc Ninh</option>
          <option value="HaiDuong">Tỉnh Hải Dương</option>
          <option value="HaiPhong">Thành phố Hải Phòng</option>
          <option value="HungYen">Tỉnh Hưng Yên</option>
          <option value="ThaiBinh">Tỉnh Thái Bình</option>
          <option value="HaNam">Tỉnh Hà Nam</option>
          <option value="NamDinh">Tỉnh Nam Định</option>
          <option value="NinhBinh">Tỉnh Ninh Bình</option>
          <option value="ThanhHoa">Tỉnh Thanh Hóa</option>
          <option value="NgheAn">Tỉnh Nghệ An</option>
          <option value="HaTinh">Tỉnh Hà Tĩnh</option>
          <option value="QuangBinh">Tỉnh Quảng Bình</option>
          <option value="QuangTri">Tỉnh Quảng Trị</option>
          <option value="ThuaThienHue">Tỉnh Thừa Thiên Huế</option>
          <option value="DaNang">Thành phố Đà Nẵng</option>
          <option value="QuangNam">Tỉnh Quảng Nam</option>
          <option value="QuangNgai">Tỉnh Quảng Ngãi</option>
          <option value="BinhDinh">Tỉnh Bình Định</option>
          <option value="PhuYen">Tỉnh Phú Yên</option>
          <option value="KhanhHoa">Tỉnh Khánh Hòa</option>
          <option value="NinhThuan">Tỉnh Ninh Thuận</option>
          <option value="BinhThuan">Tỉnh Bình Thuận</option>
          <option value="KonTum">Tỉnh Kon Tum</option>
          <option value="GiaLai">Tỉnh Gia Lai</option>
          <option value="DakLak">Tỉnh Đắk Lắk</option>
          <option value="DakNong">Tỉnh Đắk Nông</option>
          <option value="LamDong">Tỉnh Lâm Đồng</option>
          <option value="BinhPhuoc">Tỉnh Bình Phước</option>
          <option value="TayNinh">Tỉnh Tây Ninh</option>
          <option value="BinhDuong">Tỉnh Bình Dương</option>
          <option value="DongNai">Tỉnh Đồng Nai</option>
          <option value="VungTau">Tỉnh Bà Rịa - Vũng Tàu</option>
          <option value="HoChiMinh">Thành phố Hồ Chí Minh</option>
         </select>
      </form>
      <thead>   
        <div id="train-container" class="train-group" style="margin-bottom: 25px;">
          <!-- Tàu số 1 -->
          <?php foreach($arrTau as $each): ?>
          <div class="col-xs-4 col-sm-3 et-col-md-2 et-train-block ng-scope" data-code="<?php echo $each->getMaTau(); ?>">
            <div class="et-train-head">
                <div class="row center-block" style="margin-left: 29%;  width: 40%; margin-bottom: 3px">
                <div class="et-train-lamp text-center ng-binding" style="color: rgb(85, 85, 85);"><?php echo $each->getMaTau(); ?></div>
            </div>
            <div class="et-train-head-info">
                <div class="row et-no-margin">
                    <span class="pull-left et-bold ng-binding"></span> 
                    <span style="margin-left: -52%;" class="pull-right ng-binding"></span></div>
                    <div class="row et-no-margin">
                        <span class="pull-left et-bold ng-binding"></span> 
                        <span class="pull-right"></span> 
                        <span style="margin-left: -152%;" class="pull-right ng-binding"></span>
                    </div><div class="row et-no-margin">
                        <div class="et-col-50">
                            <div class="et-text-sm ng-binding"></div>
                            <div class="et-text-large et-bold pull-left ng-binding" style="margin-left: 5px"></div>
                        </div><div class="et-col-50 text-center">
                            <div class="et-text-sm ng-binding"></div>
                            <div class="et-text-large et-bold pull-right ng-binding" style="margin-right: 5px"></div>
                        </div>
                    </div>
                </div>
                <div class="row et-no-margin">
                    <div class="et-col-50">
                        <span class="et-train-lamp-bellow-left"></span>
                    </div>
                    <div class="et-col-50">
                        <span class="et-train-lamp-bellow-right"></span>
                    </div>
                </div>
            </div>
            <div class="et-train-base"></div>
            <div class="et-train-base-2"></div>
            <div class="et-train-base-3"></div>
            <div class="et-train-base-4"></div>
            <div class="et-train-base-5"></div>
          </div>
          <?php endforeach; ?>
        </div>

        <!-- Toa của tàu -->
        <div class="row">
          <!-- Danh sách toa tàu SE8 -->
          <?php foreach($arrTau as $tau): ?>
          <div class="et-coach-block col-md-12 et-no-margin" data-code="<?php echo $tau->getMaTau(); ?>" id="train-<?php echo $tau->getMaTau(); ?>">
            <!-- Toa 8 -->
            <?php foreach($arrToa[$tau->getMaTau()] as $toa): ?>
            <div class="et-car-block ng-scope toa" data-toa="<?php echo $toa->getThuTuToa(); ?>" data-codeTrain ="<?php echo $toa->getMaToa(); ?>" tooltip="<?php echo $toa->getMaLoaiToa(); ?>" value="<?php echo $toa->getTenLoaiToa(); ?>">
              <div class="et-car-icon et-car-icon-avaiable">
                <img src="view/image/trainCar2.png"></div>
              <div class="text-center text-info et-car-label ng-binding"><?php echo $toa->getThuTuToa(); ?></div>
            </div>
            <?php endforeach;  ?>
            <!-- Đầu tàu -->
            <div class="et-car-block">
              <div class="et-car-icon"><img src="view/image/train2.png"></div>
              <div class="text-center text-info et-car-label ng-binding"><?php echo $tau->getMaTau(); ?></div>
            </div>
          </div>
          <?php endforeach;  ?>
      </thead>

      <!-- Hiển thị chỗ ngồi trong toa  -->
  <div class="seatTrain">
   <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <h4 class="ng-binding"></h4>
   </div>
   
   <!-- Khoang giường nằm 6 điều hòa-->
   <div id="khoang1" class="et-col-90 khoang">
      <div class="et-full-width et-car-loading ng-hide">
        <div class="row text-capitalize text-center">
        </div>
        <div class="row text-center">
        </div>
      </div>
    <div class="row et-car-floor">
      <div class="et-col-1-18 et-car-floor-full-height" style="--bs-gutter-x: -0.5rem;">
         <div class="et-bed-way et-full-width"></div>
         <div class="et-bed-way et-full-width text-center small ng-binding">Tầng 3</div>
         <div class="et-bed-way et-full-width text-center small ng-binding">Tầng 2</div>
         <div class="et-bed-way et-full-width text-center small ng-binding">Tầng 1</div>
      </div>
      <div class="et-col-8-9">
         <div class="et-bed-way et-full-width et-text-sm">
            <div class="et-col-1-8 text-center ng-binding">Khoang 1</div>
            <div class="et-col-1-8 text-center ng-binding">Khoang 2</div>
            <div class="et-col-1-8 text-center ng-binding">Khoang 3</div>
            <div class="et-col-1-8 text-center ng-binding">Khoang 4</div>
            <div class="et-col-1-8 text-center ng-binding">Khoang 5</div>
            <div class="et-col-1-8 text-center ng-binding">Khoang 6</div>
            <div class="et-col-1-8 text-center ng-binding">Khoang 7</div>
            <div class="et-col-1-8 text-center ng-binding">Khoang 8</div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"seat="seatMap[4]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data  data-khoang="1">5</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[5]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data   data-khoang="1">6</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[10]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data  data-khoang="1">11</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[11]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">12</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[16]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 826,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">17</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[17]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 826,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">18</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[22]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">23</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[23]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">24</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[28]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 826,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">29</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[29]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 826,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">30</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[34]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 826,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">35</span>
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[35]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 826,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">36</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[40]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 826,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">41</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[41]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 826,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">42</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[46]">
            <div class="et-bed-left ng-hide">
               <div class="et-bed-outer">
                  <div class="et-bed text-center">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">47</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[47]">
            <div class="et-bed-right ng-hide">
               <div class="et-bed-outer">
                  <div class="et-bed text-center">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">48</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[2]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">3</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[3]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">4</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[8]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">9</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[9]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">10</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[14]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">15</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[15]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 939,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">16</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[20]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">21</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[21]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">22</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[26]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 939,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">27</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[27]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 939,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">28</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[32]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">33</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[33]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 939,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">34</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[38]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 939,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">39</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[39]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 939,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">40</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[44]">
            <div class="et-bed-left ng-hide">
               <div class="et-bed-outer">
                  <div class="et-bed text-center">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">45</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[45]">
            <div class="et-bed-right ng-hide">
               <div class="et-bed-outer">
                  <div class="et-bed text-center">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">46</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[0]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">1</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[1]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">2</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[6]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">7</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[7]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">8</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[12]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">13</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[13]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">14</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[18]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">19</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[19]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">20</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[24]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">25</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[25]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">26</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[30]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">31</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[31]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">32</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[36]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 1,022,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">37</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[37]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 1,022,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">38</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[42]">
            <div class="et-bed-left ng-hide">
               <div class="et-bed-outer">
                  <div class="et-bed text-center">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">43</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[43]">
            <div class="et-bed-right ng-hide">
               <div class="et-bed-outer">
                  <div class="et-bed text-center">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                        <span class="ng-binding" data-khoang="1">44</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="et-col-1-18 et-car-floor-full-height"></div>
   </div></div>

   <!-- Khoang mềm điều hòa -->
   <div id="khoang2" class="et-col-90 khoang">

      <div class="et-full-width et-car-loading ng-hide">
      <div class="row text-capitalize text-center"></div>
      </div>
      <div class="row et-car-floor">
      <div class="et-car-door"></div>
      <div class="et-car-nm-64-half-block">
         <div class="et-full-width">
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[0]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">1</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[7]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">8</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[8]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">9</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[15]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">16</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[16]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">17</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[23]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">24</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[24]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">25</span></div>
                        <div class="popover top fade ng-animate in-add" ng-class="{ in: isOpen(), fade: animation() }" popover-popup="" title="Chỗ trống" content="Chỗ trống" placement="top" animation="tt_animation" is-open="tt_isOpen" style="top: 228.8px; left: 258.5px; display: block; transition-property: none;">
                           <div class="arrow"></div>
                           <div class="popover-inner">
                              <h3 class="popover-title ng-binding" ng-bind="title" ng-show="title">Chỗ trống</h3>
                              <div class="popover-content ng-binding" ng-bind-html="content">Chỗ trống</div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[31]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">32</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[1]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">2</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[6]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">7</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[9]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">10</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[14]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">15</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[17]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">18</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[22]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">23</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[25]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">26</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[30]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">31</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-way et-full-width"></div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[2]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">3</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[5]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">6</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[10]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">11</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[13]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">14</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[18]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">19</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[21]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">22</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[26]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">27</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[29]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">30</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[3]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">4</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[4]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">5</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[11]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">12</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[12]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">13</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[19]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">20</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[20]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">21</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[27]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">28</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[28]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 581,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">29</span></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="et-car-seperator">
         <div></div>
         <div></div>
      </div>
      <div class="et-car-nm-64-half-block">
         <div class="et-full-width">
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[32]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">33</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[39]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">40</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[40]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">41</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[47]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">48</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[48]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">49</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[55]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">56</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[56]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">57</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[63]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">64</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[33]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">34</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[38]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">39</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[41]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">42</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[46]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">47</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[49]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">50</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[54]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">55</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[57]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">58</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[62]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">63</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-way et-full-width"></div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[34]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 581,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">35</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[37]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">38</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[42]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">43</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[45]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">46</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[50]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">51</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[53]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">54</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[58]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">59</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[61]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">62</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[35]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Chỗ trống" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">36</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[36]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">37</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[43]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">44</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[44]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">45</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[51]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">52</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[52]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">53</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[59]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">60</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[60]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding" data-khoang="2">61</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="et-car-door"></div>
      </div>


   </div>

   <!-- Khoang giường nằm 4 điều hòa -->
   <div id="khoang3" class="et-col-90 khoang">
      <div class="et-full-width et-car-loading ng-hide">
         <div class="row text-capitalize text-center"></div>
         <div class="row text-center"></div>
      </div>
      <div class="row et-car-floor">
      <div class="et-col-1-18 et-car-floor-full-height" style="--bs-gutter-x: -0.5rem;">
         <div class="et-bed-way et-full-width"></div>
         <div class="et-bed-way et-full-width"></div>
         <div class="et-bed-way et-full-width text-center small ng-binding">Tầng 2</div>
         <div class="et-bed-way et-full-width text-center small ng-binding">Tầng 1</div>
      </div>
      <div class="et-col-8-9">
         <div class="et-bed-way et-full-width"></div>
         <div class="et-bed-way et-full-width et-text-sm">
            <div class="et-col-1-8 text-center ng-binding">Khoang 1</div>
            <div class="et-col-1-8 text-center ng-binding">Khoang 2</div>
            <div class="et-col-1-8 text-center ng-binding">Khoang 3</div>
            <div class="et-col-1-8 text-center ng-binding">Khoang 4</div>
            <div class="et-col-1-8 text-center ng-binding">Khoang 5</div>
            <div class="et-col-1-8 text-center ng-binding">Khoang 6</div>
            <div class="et-col-1-8 text-center ng-binding">Khoang 7</div>
            <div class="et-col-1-8 text-center ng-binding">Khoang 8</div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[2]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">3</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[3]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">4</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[6]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">7</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[7]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">8</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[10]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">11</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[11]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">12</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[14]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 997,000 VNĐ" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">15</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[15]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 997,000 VNĐ" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">16</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[18]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">19</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[19]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 962,000 VNĐ" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">20</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[22]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">23</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[23]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 962,000 VNĐ" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">24</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[26]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 962,000 VNĐ" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">27</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[27]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Giá: 962,000 VNĐ" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">28</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[30]">
            <div class="et-bed-left ng-hide">
               <div class="et-bed-outer">
                  <div class="et-bed text-center">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">31</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[31]">
            <div class="et-bed-right ng-hide">
               <div class="et-bed-outer">
                  <div class="et-bed text-center">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">32</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[0]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">1</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[1]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">2</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[4]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">5</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[5]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">6</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[8]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">9</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[9]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">10</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[12]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">13</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[13]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">14</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[16]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">17</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[17]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">18</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[20]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">21</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[21]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">22</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[24]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">25</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[25]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-avaiable">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">26</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[28]">
            <div class="et-bed-left ng-hide">
               <div class="et-bed-outer">
                  <div class="et-bed text-center">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">29</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[29]">
            <div class="et-bed-right ng-hide">
               <div class="et-bed-outer">
                  <div class="et-bed text-center">
                     <div data-popover="Chỗ trống" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">30</span></div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="et-col-1-18 et-car-floor-full-height"></div>
   </div>
</div>
</div>
</div>
    </table>
    <div id="myModal" class="modal" style="display: none;">
    <div class="modal-content">
    <form id="ToaForm">
      <label for="MaToa">Mã toa:</label>
      <input type="text" id="MaToa" name="MaToa" required>
      <label for="MaLoaiToa">Loại toa:</label>
      <select name="MaLoaiToa" id="MaLoaiToa" required>
         <option value=""></option>
         <?php foreach($arrLoaiToa as $each): ?>
         <option value="<?php echo $each->getMaLoaiToa(); ?>">
            <?php echo $each->getTenLoaiToa(); ?>
         </option>
         <?php endforeach; ?>
      </select>
      <label for="MaTau">Mã Tàu:</label>
      <select name="MaTau" id="MaTau" required>
         <option value=""></option>
         <?php foreach($arrTau as $each): ?>
         <option value="<?php echo $each->getMaTau(); ?>">
            <?php echo $each->getMaTau(); ?>
         </option>
         <?php endforeach; ?>
      </select>
      <button style="background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;font-size: 16px; margin-right: 10px;" type="submit" id="submitBtn">Thêm</button>
      <button style="color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;font-size: 16px;" class= "btnCancel" type="button" id="cancelBtn">Hủy</button>
    </form>
    </div>
    </div>
      </div>
      <div>
        <button style="position: absolute; top: 21px; right: 60px;" id="theme_switch">
          <i class='bx bx-sun'></i>
        </button>
      </div>
      <div>
        <button class="log" id="theme_switch">
          <i style="margin-left: 8px; position: absolute; margin-left: 8px;top: 24px;right: 23px;" class='bx bx-power-off'></i>
        </button>
      </div>
    </header>
    
    
  </main>
  
  
</div>
<script>
  // Thêm dữ liệu, thêm toa mới
  var action = '';
  const addBtn = document.getElementById('addBtn');
  const modal = document.getElementById('myModal');
  const submitBtn = document.getElementById('submitBtn');
  const cancelBtn = document.getElementById('cancelBtn');
  const tableBody = document.querySelector('#myTable tbody');
  const tbs = document.querySelectorAll('.et-train-block');
  const cbs = document.querySelectorAll('.et-coach-block');

  const MaToa = modal.querySelector('#MaToa');
  const MaLoaiToa = modal.querySelector('#MaLoaiToa');
  const optionMaLoaiToa= MaLoaiToa.querySelectorAll('option');
  const MaTau = modal.querySelector('#MaTau');
  const optionMaTau= MaTau.querySelectorAll('option');

  function showLoadingSwal() {
  return Swal.fire({
    title: 'Loading...',
    text: 'Vui lòng chờ trong giây lát!',
    timer: 2000,
    showConfirmButton: false,
    imageUrl: '/view/image/gif/loading.gif',
    onBeforeOpen: function() {
      Swal.showLoading();
    },
    allowOutsideClick: false // Không cho phép đóng khi click ra ngoài
  });
}

  function clearAll(){
   $('#ToaForm').find('.alert-danger').remove();
    $('#myModal').hide();
    $('#ToaForm input[type=text]').val('');
    $('#ToaForm select').val([]);
    $('#ToaForm select').removeAttr('disabled').removeClass('disabled');
    $('#ToaForm input[type=text]').removeAttr('readonly').removeClass('readonly');
}
  
  addBtn.addEventListener('click', function() {
    modal.style.display = "block";
    action = 'create';
    $('#ToaForm #submitBtn').text('Thêm');
  });

  tbs.forEach(tb => {
      tb.addEventListener('click', () => {
        const train = tb.dataset.code;
        document.getElementById('MaTau').value = train;
        document.getElementById('MaTau').readOnly = true;
      });
    });

// thêm toa

$('#ToaForm').submit(function(e){
		e.preventDefault();
      var form = $(this);
      var alert = form.find('.alert');
      var sw = showLoadingSwal();
		$.ajax({
			url:'/?type=admin&page=toa&action=' + action,
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
			},
			success:function(resp){
         actiontext = action == 'create' ? 'thêm' : 'sửa';
				if(resp.trim() == "done"){
          Swal.fire(
              'Completed!',
              'Bạn đã ' + actiontext + ' toa thành công!',
              'success'
            )
          setTimeout(function() {
              location.reload();
          }, 1000); 
          $('#myModal').hide();
          clearAll();
				}else{
               sw.close();
               if (alert.length === 0) 
					   $('#ToaForm').prepend('<div style="width: 100%; text-align: center;  font-style:italic; font-size: 16px;" class="alert alert-danger">'+ resp + '</div>');
				}
    }
		})
	});
//============================================================================================================

//Sửa toa
const editBtn = document.getElementById('EditBtn');
const modal2 = document.getElementById('myModal');
var elements = document.querySelector('.et-car-block');

var bindingElements = document.getElementsByClassName("ng-binding");

// Khoang 1
var khoang1Seats = 0;
for (var i = 0; i < bindingElements.length; i++) {
  var element = bindingElements[i];
  if (element.getAttribute("data-khoang") === "1") {
    khoang1Seats++;
  }
}

// Khoang 2
var khoang2Seats = 0;
for (var i = 0; i < bindingElements.length; i++) {
  var element = bindingElements[i];
  if (element.getAttribute("data-khoang") === "2") {
    khoang2Seats++;
  }
}

// Khoang 3
var khoang3Seats = 0;
for (var i = 0; i < bindingElements.length; i++) {
  var element = bindingElements[i];
  if (element.getAttribute("data-khoang") === "3") {
    khoang3Seats++;
  }
}

editBtn.addEventListener('click', function() {
   // Bắt sự kiện buộc phải click toa mới được sửa
  const selectedToa = document.querySelector('.selected-toa');
  if (!selectedToa) {
    console.error('Vui lòng chọn toa trước khi sửa');
    return;
  }
  action = 'edit';
  $('#ToaForm #submitBtn').text('Lưu');
  const MaToa_old = selectedToa.getAttribute('data-codeTrain');
  const MaLoaiToa_old = selectedToa.getAttribute('tooltip');
  const MaTau_old = selectedToa.parentNode.getAttribute('id').replace('train-', '');

  // Đặt giá trị cho các trường input trong modal
  // Dữ liệu này phải khóa lại vì nó là dạng tĩnh sau này myModel có thể xóa luôn thằng số chỗ ngồi
  //vì số chỗ ngồi sẽ phụ thuộc dữ liệu tooltip chỉ cần lấy thg tooltip so sánh tên loại toa
  //là khoang nào thì sẽ có được tổng số chỗ ngồi của khoang đó ^^
  MaToa.value = MaToa_old;
  MaToa.readOnly = true;
   for (let i = 0; i < optionMaTau.length; i++) {
      if (optionMaTau[i].value === MaTau_old) {
        optionMaTau[i].selected = true;
        break;
      }
   }
   for (let i = 0; i < optionMaLoaiToa.length; i++) {
      if (optionMaLoaiToa[i].value === MaLoaiToa_old) {
        optionMaLoaiToa[i].selected = true;
        break;
      }
   }
  MaLoaiToa.disabled = true;
  modal2.style.display = 'block';
});

// Xử lý sự kiện click vào toa
const toaElements2 = document.querySelectorAll('.toa');
toaElements2.forEach((toaElement2) => {
  toaElement2.addEventListener('click', function() {
    const selectedToa = document.querySelector('.selected-toa');
    if (selectedToa) {
      selectedToa.classList.remove('selected-toa');
    }

    toaElement2.classList.add('selected-toa');
  });
});

// Xử lý sự kiện click nút "Hủy"
$('#cancelBtn').click(function() {
   clearAll();
});

//============================================================================================================

// Xóa toa
document.getElementById('RemoveBtn').addEventListener('click', function() {
  // Lấy thông tin toa đã được chọn
  const selectedToa = document.querySelector('.selected-toa');
  if (!selectedToa) {
    console.error('Vui lòng chọn toa trước khi xóa!');
    return;
  }

  // Số chỗ ngồi này như thống nhất là gán cứng 3 khoang, nên không cần đụng tới nó vì chỉ cần dữ liệu của thằng tooltip thì khi so sánh sẽ lấy ra được
  //số chỗ ngồi r nhé ^^
  var MaToa = selectedToa.getAttribute('data-codeTrain');
  const ThuTuToa = selectedToa.getAttribute('data-toa');
  var MaTau = selectedToa.parentNode.getAttribute('id').replace('train-', '');
  Swal.fire({
      title: 'Bạn có chắc là muốn xóa toa này không?',
      text: "Bạn sẽ không thể hoàn tác sau khi hoàn tất!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Vẫn xóa',
      cancelButtonText: 'Hủy'
  }).then((result) => {
    if (result.isConfirmed) {
      var sw = showLoadingSwal();
      $.ajax({
        url: 'index.php/?type=admin&page=toa&action=delete',
        type: 'POST',
        data: { 
         MaToa: MaToa,
         ThuTuToa: ThuTuToa ,
         MaTau: MaTau
      },
        success: function(response) {
          if (response.trim() == "done") {
            Swal.fire(
              'Completed!',
              'Bạn đã xóa toa thành công!',
              'success'
            )
            // sau 2 giây sẽ tải lại trang
            setTimeout(function() {
                location.reload();
            }, 1000); 

                // xóa giao diện
               // Lấy số thứ tự của toa đã chọn
               const selectedToaIndex = parseInt(selectedToa.getAttribute('data-toa'));

               // Xóa toa khỏi DOM
               selectedToa.parentNode.removeChild(selectedToa);

               // Cập nhật số thứ tự cho các toa còn lại
               const toaElements = document.querySelectorAll('.toa');
               toaElements.forEach((toaElement) => {
               const toaIndex = parseInt(toaElement.getAttribute('data-toa'));
               if (toaIndex > selectedToaIndex) {
                  toaElement.setAttribute('data-toa', toaIndex - 1);
                  toaElement.querySelector('.et-car-label').textContent = toaIndex - 1;
               }
               });

               // Ẩn title h4
               var container = document.querySelector('.col-xs-12.col-sm-12.col-md-12.text-center');
               container.style.display = 'none';

               // Ẩn các khoang
               const khoangs = document.querySelectorAll('.khoang');
               khoangs.forEach((khoang) => {
               khoang.style.display = 'none';
               });
          } else {
            sw.close();
            // Nếu có lỗi thì hiển thị thông báo lỗi
            Swal.fire(
              'Oops...',
              'Đã có lỗi xảy ra!',
              'error'
            )
          }
        },
      });
    }
  })
});

//============================================================================================================

// Xử lý sự kiện click vào tàu hover lên + ẩn đi chỗ ngồi và title toa khi bấm vào tàu khác
const trains = document.querySelectorAll('.et-train-block');

trains.forEach(train => {

   //Ẩn đi chỗ ngồi + tàu khác + title toa
   train.addEventListener('click', () => {
   var khoangs = document.querySelectorAll('.khoang');
   khoangs.forEach(function(khoang) {
      khoang.style.display = 'none';
   });
   var container = document.querySelector('.col-xs-12.col-sm-12.col-md-12.text-center');
   container.style.display = 'none';
   trains.forEach(train => {
      train.querySelector('.et-train-head').classList.remove('et-train-head-selected');
    });
    train.querySelector('.et-train-head').classList.add('et-train-head-selected');
  });
});

//============================================================================================================

//Hiển thị các toa tàu khi click vào tàu
const trainBlocks = document.querySelectorAll('.et-train-block');


trainBlocks.forEach(trainBlock => {
  trainBlock.addEventListener('click', () => {
    const trainCode = trainBlock.dataset.code;
    const coachBlocks = document.querySelectorAll('.et-coach-block');
    coachBlocks.forEach(coachBlock => {
      if (coachBlock.dataset.code === trainCode) {
        coachBlock.style.display = 'block';
      } else {
        coachBlock.style.display = 'none';
      }
    });
  });
});

//============================================================================================================

// Xử lý sự kiện hover khi click vào toa và hiển thị số toa + thông tin toa + danh sách chỗ ngồi
var selectedToaElement = null;
var toaElements = document.querySelectorAll('.toa');
var khoangs = document.querySelectorAll('.khoang');

khoangs.forEach(function(khoang) {
    khoang.style.display = 'none';
});

for (var i = 0; i < toaElements.length; i++) {
  var toaElement = toaElements[i];
  toaElement.addEventListener('click', function() {
   var icon = this.querySelector('.et-car-icon');
   icon.classList.add('et-car-icon-selected');
   icon.classList.remove('et-car-icon-avaiable');
   if (selectedToaElement !== null && selectedToaElement !== this) {
      var selectedIcon = selectedToaElement.querySelector('.et-car-icon');
      selectedIcon.classList.add('et-car-icon-avaiable');
      selectedIcon.classList.remove('et-car-icon-selected');
   }
   selectedToaElement = this;
   var toaNumber = this.getAttribute('data-toa');
   var toaTitle  = this.getAttribute('value');
   var toaCode = this.getAttribute('tooltip');
   var toaInfo = "Toa số " + toaNumber + ": " + toaTitle;
   if(toaCode.includes('LT002')){
      document.getElementById('khoang1').style.display = 'block';
      document.getElementById('khoang2').style.display = 'none';
      document.getElementById('khoang3').style.display = 'none';
   }else if(toaCode.includes('LT001')){
      document.getElementById('khoang1').style.display = 'none';
      document.getElementById('khoang2').style.display = 'block';
      document.getElementById('khoang3').style.display = 'none';
   }else{
      document.getElementById('khoang1').style.display = 'none';
      document.getElementById('khoang2').style.display = 'none';
      document.getElementById('khoang3').style.display = 'block';
   }

  var message = document.createElement('h4');
  message.textContent = toaInfo;
  message.classList.add('ng-binding');

  var container = document.querySelector('.col-xs-12.col-sm-12.col-md-12.text-center');
  container.style.display = 'block';
  container.innerHTML = '';
  container.appendChild(message);
});
}

//============================================================================================================

// Active
const link = document.querySelector(".sidenav_link.toa");
link.classList.add('active');
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/view/javascript/dashboard.js"></script>
<script src="/view/javascript/PaginationDashboard.js"></script>
</body>
</html>
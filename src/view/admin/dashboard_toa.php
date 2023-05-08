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
          <option value="LongAn">Tỉnh Long An</option>
          <option value="TienGiang">Tỉnh Tiền Giang</option>
          <option value="BenTre">Tỉnh Bến Tre</option>
          <option value="TraVinh">Tỉnh Trà Vinh</option>
          <option value="VinhLong">Tỉnh Vĩnh Long</option>
          <option value="DongThap">Tỉnh Đồng Tháp</option>
          <option value="AnGiang">Tỉnh An Giang</option>
          <option value="KienGiang">Tỉnh Kiên Giang</option>
          <option value="CanTho">Thành phố Cần Thơ</option>
          <option value="HauGiang">Tỉnh Hậu Giang</option>
          <option value="SocTrang">Tỉnh Sóc Trăng</option>
         </select>
      </form>
      <thead>   
        <div id="train-container" class="train-group" style="margin-bottom: 25px;">
          <!-- Tàu số 1 -->
          <div class="col-xs-4 col-sm-3 et-col-md-2 et-train-block ng-scope" data-code="SE8">
            <div class="et-train-head">
                <div class="row center-block" style="margin-left: 29%;  width: 40%; margin-bottom: 3px">
                <div class="et-train-lamp text-center ng-binding" style="color: rgb(85, 85, 85);">SE8</div>
            </div>
            <div class="et-train-head-info">
                <div class="row et-no-margin">
                    <span class="pull-left et-bold ng-binding">TG đi: </span> 
                    <span style="margin-left: -52%;" class="pull-right ng-binding">25/05 06:45</span></div>
                    <div class="row et-no-margin">
                        <span class="pull-left et-bold ng-binding">TG đến: </span> 
                        <span class="pull-right"></span> 
                        <span style="margin-left: -152%;" class="pull-right ng-binding">26/05 00:28</span>
                    </div><div class="row et-no-margin">
                        <div class="et-col-50">
                            <div class="et-text-sm ng-binding">SL chỗ đặt</div>
                            <div class="et-text-large et-bold pull-left ng-binding" style="margin-left: 5px">11</div>
                        </div><div class="et-col-50 text-center">
                            <div class="et-text-sm ng-binding">SL chỗ trống</div>
                            <div class="et-text-large et-bold pull-right ng-binding" style="margin-right: 5px">218</div>
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
          <!-- Tàu số 2 -->
          <div class="col-xs-4 col-sm-3 et-col-md-2 et-train-block ng-scope" data-code="SE22">
            <div class="et-train-head">
                <div class="row center-block" style="margin-left: 29%;  width: 40%; margin-bottom: 3px">
                <div class="et-train-lamp text-center ng-binding" style="color: rgb(85, 85, 85);">SE22</div>
            </div>
            <div class="et-train-head-info">
                <div class="row et-no-margin">
                    <span class="pull-left et-bold ng-binding">TG đi: </span> 
                    <span style="margin-left: -52%;" class="pull-right ng-binding">25/05 11:00</span></div>
                    <div class="row et-no-margin">
                        <span class="pull-left et-bold ng-binding">TG đến: </span> 
                        <span class="pull-right"></span> 
                        <span style="margin-left: -152%;" class="pull-right ng-binding">26/05 06:23</span>
                    </div><div class="row et-no-margin">
                        <div class="et-col-50">
                            <div class="et-text-sm ng-binding">SL chỗ đặt</div>
                            <div class="et-text-large et-bold pull-left ng-binding" style="margin-left: 5px">28</div>
                        </div><div class="et-col-50 text-center">
                            <div class="et-text-sm ng-binding">SL chỗ trống</div>
                            <div class="et-text-large et-bold pull-right ng-binding" style="margin-right: 5px">129</div>
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
          
          <!-- Test thêm vài tàu  -->
          <div class="col-xs-4 col-sm-3 et-col-md-2 et-train-block ng-scope" data-code="SE8">
            <div class="et-train-head">
                <div class="row center-block" style="margin-left: 29%;  width: 40%; margin-bottom: 3px">
                <div class="et-train-lamp text-center ng-binding" style="color: rgb(85, 85, 85);">SE8</div>
            </div>
            <div class="et-train-head-info">
                <div class="row et-no-margin">
                    <span class="pull-left et-bold ng-binding">TG đi: </span> 
                    <span style="margin-left: -52%;" class="pull-right ng-binding">25/05 06:45</span></div>
                    <div class="row et-no-margin">
                        <span class="pull-left et-bold ng-binding">TG đến: </span> 
                        <span class="pull-right"></span> 
                        <span style="margin-left: -152%;" class="pull-right ng-binding">26/05 00:28</span>
                    </div><div class="row et-no-margin">
                        <div class="et-col-50">
                            <div class="et-text-sm ng-binding">SL chỗ đặt</div>
                            <div class="et-text-large et-bold pull-left ng-binding" style="margin-left: 5px">11</div>
                        </div><div class="et-col-50 text-center">
                            <div class="et-text-sm ng-binding">SL chỗ trống</div>
                            <div class="et-text-large et-bold pull-right ng-binding" style="margin-right: 5px">218</div>
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
          <div class="col-xs-4 col-sm-3 et-col-md-2 et-train-block ng-scope" data-code="SE8">
            <div class="et-train-head">
                <div class="row center-block" style="margin-left: 29%;  width: 40%; margin-bottom: 3px">
                <div class="et-train-lamp text-center ng-binding" style="color: rgb(85, 85, 85);">SE8</div>
            </div>
            <div class="et-train-head-info">
                <div class="row et-no-margin">
                    <span class="pull-left et-bold ng-binding">TG đi: </span> 
                    <span style="margin-left: -52%;" class="pull-right ng-binding">25/05 06:45</span></div>
                    <div class="row et-no-margin">
                        <span class="pull-left et-bold ng-binding">TG đến: </span> 
                        <span class="pull-right"></span> 
                        <span style="margin-left: -152%;" class="pull-right ng-binding">26/05 00:28</span>
                    </div><div class="row et-no-margin">
                        <div class="et-col-50">
                            <div class="et-text-sm ng-binding">SL chỗ đặt</div>
                            <div class="et-text-large et-bold pull-left ng-binding" style="margin-left: 5px">11</div>
                        </div><div class="et-col-50 text-center">
                            <div class="et-text-sm ng-binding">SL chỗ trống</div>
                            <div class="et-text-large et-bold pull-right ng-binding" style="margin-right: 5px">218</div>
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
          <div class="col-xs-4 col-sm-3 et-col-md-2 et-train-block ng-scope" data-code="SE8">
            <div class="et-train-head">
                <div class="row center-block" style="margin-left: 29%;  width: 40%; margin-bottom: 3px">
                <div class="et-train-lamp text-center ng-binding" style="color: rgb(85, 85, 85);">SE8</div>
            </div>
            <div class="et-train-head-info">
                <div class="row et-no-margin">
                    <span class="pull-left et-bold ng-binding">TG đi: </span> 
                    <span style="margin-left: -52%;" class="pull-right ng-binding">25/05 06:45</span></div>
                    <div class="row et-no-margin">
                        <span class="pull-left et-bold ng-binding">TG đến: </span> 
                        <span class="pull-right"></span> 
                        <span style="margin-left: -152%;" class="pull-right ng-binding">26/05 00:28</span>
                    </div><div class="row et-no-margin">
                        <div class="et-col-50">
                            <div class="et-text-sm ng-binding">SL chỗ đặt</div>
                            <div class="et-text-large et-bold pull-left ng-binding" style="margin-left: 5px">11</div>
                        </div><div class="et-col-50 text-center">
                            <div class="et-text-sm ng-binding">SL chỗ trống</div>
                            <div class="et-text-large et-bold pull-right ng-binding" style="margin-right: 5px">218</div>
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
          <div class="col-xs-4 col-sm-3 et-col-md-2 et-train-block ng-scope" data-code="SE8">
            <div class="et-train-head">
                <div class="row center-block" style="margin-left: 29%;  width: 40%; margin-bottom: 3px">
                <div class="et-train-lamp text-center ng-binding" style="color: rgb(85, 85, 85);">SE8</div>
            </div>
            <div class="et-train-head-info">
                <div class="row et-no-margin">
                    <span class="pull-left et-bold ng-binding">TG đi: </span> 
                    <span style="margin-left: -52%;" class="pull-right ng-binding">25/05 06:45</span></div>
                    <div class="row et-no-margin">
                        <span class="pull-left et-bold ng-binding">TG đến: </span> 
                        <span class="pull-right"></span> 
                        <span style="margin-left: -152%;" class="pull-right ng-binding">26/05 00:28</span>
                    </div><div class="row et-no-margin">
                        <div class="et-col-50">
                            <div class="et-text-sm ng-binding">SL chỗ đặt</div>
                            <div class="et-text-large et-bold pull-left ng-binding" style="margin-left: 5px">11</div>
                        </div><div class="et-col-50 text-center">
                            <div class="et-text-sm ng-binding">SL chỗ trống</div>
                            <div class="et-text-large et-bold pull-right ng-binding" style="margin-right: 5px">218</div>
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
          <div class="col-xs-4 col-sm-3 et-col-md-2 et-train-block ng-scope" data-code="SE8">
            <div class="et-train-head">
                <div class="row center-block" style="margin-left: 29%;  width: 40%; margin-bottom: 3px">
                <div class="et-train-lamp text-center ng-binding" style="color: rgb(85, 85, 85);">SE8</div>
            </div>
            <div class="et-train-head-info">
                <div class="row et-no-margin">
                    <span class="pull-left et-bold ng-binding">TG đi: </span> 
                    <span style="margin-left: -52%;" class="pull-right ng-binding">25/05 06:45</span></div>
                    <div class="row et-no-margin">
                        <span class="pull-left et-bold ng-binding">TG đến: </span> 
                        <span class="pull-right"></span> 
                        <span style="margin-left: -152%;" class="pull-right ng-binding">26/05 00:28</span>
                    </div><div class="row et-no-margin">
                        <div class="et-col-50">
                            <div class="et-text-sm ng-binding">SL chỗ đặt</div>
                            <div class="et-text-large et-bold pull-left ng-binding" style="margin-left: 5px">11</div>
                        </div><div class="et-col-50 text-center">
                            <div class="et-text-sm ng-binding">SL chỗ trống</div>
                            <div class="et-text-large et-bold pull-right ng-binding" style="margin-right: 5px">218</div>
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
          <div class="col-xs-4 col-sm-3 et-col-md-2 et-train-block ng-scope" data-code="SE8">
            <div class="et-train-head">
                <div class="row center-block" style="margin-left: 29%;  width: 40%; margin-bottom: 3px">
                <div class="et-train-lamp text-center ng-binding" style="color: rgb(85, 85, 85);">SE8</div>
            </div>
            <div class="et-train-head-info">
                <div class="row et-no-margin">
                    <span class="pull-left et-bold ng-binding">TG đi: </span> 
                    <span style="margin-left: -52%;" class="pull-right ng-binding">25/05 06:45</span></div>
                    <div class="row et-no-margin">
                        <span class="pull-left et-bold ng-binding">TG đến: </span> 
                        <span class="pull-right"></span> 
                        <span style="margin-left: -152%;" class="pull-right ng-binding">26/05 00:28</span>
                    </div><div class="row et-no-margin">
                        <div class="et-col-50">
                            <div class="et-text-sm ng-binding">SL chỗ đặt</div>
                            <div class="et-text-large et-bold pull-left ng-binding" style="margin-left: 5px">11</div>
                        </div><div class="et-col-50 text-center">
                            <div class="et-text-sm ng-binding">SL chỗ trống</div>
                            <div class="et-text-large et-bold pull-right ng-binding" style="margin-right: 5px">218</div>
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
          <div class="col-xs-4 col-sm-3 et-col-md-2 et-train-block ng-scope" data-code="SE8">
            <div class="et-train-head">
                <div class="row center-block" style="margin-left: 29%;  width: 40%; margin-bottom: 3px">
                <div class="et-train-lamp text-center ng-binding" style="color: rgb(85, 85, 85);">SE8</div>
            </div>
            <div class="et-train-head-info">
                <div class="row et-no-margin">
                    <span class="pull-left et-bold ng-binding">TG đi: </span> 
                    <span style="margin-left: -52%;" class="pull-right ng-binding">25/05 06:45</span></div>
                    <div class="row et-no-margin">
                        <span class="pull-left et-bold ng-binding">TG đến: </span> 
                        <span class="pull-right"></span> 
                        <span style="margin-left: -152%;" class="pull-right ng-binding">26/05 00:28</span>
                    </div><div class="row et-no-margin">
                        <div class="et-col-50">
                            <div class="et-text-sm ng-binding">SL chỗ đặt</div>
                            <div class="et-text-large et-bold pull-left ng-binding" style="margin-left: 5px">11</div>
                        </div><div class="et-col-50 text-center">
                            <div class="et-text-sm ng-binding">SL chỗ trống</div>
                            <div class="et-text-large et-bold pull-right ng-binding" style="margin-right: 5px">218</div>
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
          <div class="col-xs-4 col-sm-3 et-col-md-2 et-train-block ng-scope" data-code="SE8">
            <div class="et-train-head">
                <div class="row center-block" style="margin-left: 29%;  width: 40%; margin-bottom: 3px">
                <div class="et-train-lamp text-center ng-binding" style="color: rgb(85, 85, 85);">SE8</div>
            </div>
            <div class="et-train-head-info">
                <div class="row et-no-margin">
                    <span class="pull-left et-bold ng-binding">TG đi: </span> 
                    <span style="margin-left: -52%;" class="pull-right ng-binding">25/05 06:45</span></div>
                    <div class="row et-no-margin">
                        <span class="pull-left et-bold ng-binding">TG đến: </span> 
                        <span class="pull-right"></span> 
                        <span style="margin-left: -152%;" class="pull-right ng-binding">26/05 00:28</span>
                    </div><div class="row et-no-margin">
                        <div class="et-col-50">
                            <div class="et-text-sm ng-binding">SL chỗ đặt</div>
                            <div class="et-text-large et-bold pull-left ng-binding" style="margin-left: 5px">11</div>
                        </div><div class="et-col-50 text-center">
                            <div class="et-text-sm ng-binding">SL chỗ trống</div>
                            <div class="et-text-large et-bold pull-right ng-binding" style="margin-right: 5px">218</div>
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
        </div>

        <!-- Toa của tàu -->
        <div class="row">
          <!-- Danh sách toa tàu SE8 -->
          <div class="et-coach-block col-md-12 et-no-margin" data-code="SE8" id="train-SE8">
            <!-- Toa 8 -->
            <div class="et-car-block ng-scope toa" data-toa="8" tooltip="Giường nằm khoang 6 điều hòa">
              <div class="et-car-icon et-car-icon-avaiable">
                <img src="view/image/trainCar2.png"></div>
              <div class="text-center text-info et-car-label ng-binding">8</div>
            </div>
            <!-- Toa 7 -->
            <div class="et-car-block ng-scope toa" data-toa="7" tooltip="Giường nằm khoang 6 điều hòa">
              <div class="et-car-icon et-car-icon-avaiable">
                <img src="view/image/trainCar2.png"></div>
              <div class="text-center text-info et-car-label ng-binding">7</div>
            </div>
            <!-- Toa 6 -->
            <div class="et-car-block ng-scope toa" data-toa="6" tooltip="Giường nằm khoang 6 điều hòa">
              <div class="et-car-icon et-car-icon-avaiable">
                <img src="view/image/trainCar2.png"></div>
              <div class="text-center text-info et-car-label ng-binding">6</div>
            </div>
            <!-- Toa 5 -->  
            <div class="et-car-block ng-scope toa" data-toa="5" tooltip="Giường nằm khoang 6 điều hòa">
              <div class="et-car-icon et-car-icon-avaiable">
                <img src="view/image/trainCar2.png"></div>
              <div class="text-center text-info et-car-label ng-binding">5</div>
            </div>
            <!-- Toa 4 -->
            <div class="et-car-block ng-scope toa" data-toa="4" tooltip="Giường nằm khoang 6 điều hòa">
              <div class="et-car-icon et-car-icon-avaiable">
                <img src="view/image/trainCar2.png"></div>
              <div class="text-center text-info et-car-label ng-binding">4</div>
            </div>
            <!-- Toa 3 -->
            <div class="et-car-block ng-scope toa" data-toa="3" tooltip="Giường nằm khoang 6 điều hòa">
              <div class="et-car-icon et-car-icon-avaiable">
                <img src="view/image/trainCar2.png"></div>
              <div class="text-center text-info et-car-label ng-binding">3</div>
            </div>
            <!-- Toa 2 -->
            <div class="et-car-block ng-scope toa" data-toa="2" tooltip="Ngồi mềm điều hòa">
              <div class="et-car-icon et-car-icon-avaiable">
                <img src="view/image/trainCar2.png"></div>
              <div class="text-center text-info et-car-label ng-binding">2</div>
            </div>
            <!-- Toa 1 -->
            <div class="et-car-block ng-scope toa" data-toa="1" tooltip="Ngồi mềm điều hòa">
              <div class="et-car-icon et-car-icon-avaiable">
                <img src="view/image/trainCar2.png"></div>
              <div class="text-center text-info et-car-label ng-binding">1</div>
            </div>
            <!-- Đầu tàu -->
            <div class="et-car-block">
              <div class="et-car-icon"><img src="view/image/train2.png"></div>
              <div class="text-center text-info et-car-label ng-binding">SE8</div>
            </div>
          </div>

          <!-- Danh sách toa SE22 -->
          <div class="et-coach-block col-md-12 et-no-margin" data-code="SE22" id="train-SE22">
            <!-- Toa 6 -->
            <div class="et-car-block ng-scope toa" data-toa="6" tooltip="Giường nằm khoang 6 điều hòa">
            <div class="et-car-icon et-car-icon-avaiable">
               <img src="view/image/trainCar2.png"></div>
            <div class="text-center text-info et-car-label ng-binding">6</div>
            </div>
            <!-- Toa 5 -->
            <div class="et-car-block ng-scope toa" data-toa="5" tooltip="Giường nằm khoang 6 điều hòa">
            <div class="et-car-icon et-car-icon-avaiable">
               <img src="view/image/trainCar2.png"></div>
            <div class="text-center text-info et-car-label ng-binding">5</div>
            </div>
            <!-- Toa 4 -->
            <div class="et-car-block ng-scope toa" data-toa="4" tooltip="Giường nằm khoang 6 điều hòa">
            <div class="et-car-icon et-car-icon-avaiable">
               <img src="view/image/trainCar2.png"></div>
            <div class="text-center text-info et-car-label ng-binding">4</div>
            </div>
            <!-- Toa 3 -->
            <div class="et-car-block ng-scope toa" data-toa="3" tooltip="Giường nằm khoang 6 điều hòa">
            <div class="et-car-icon et-car-icon-avaiable">
               <img src="view/image/trainCar2.png"></div>
            <div class="text-center text-info et-car-label ng-binding">3</div>
            </div>
            <!-- Toa 2 -->
            <div class="et-car-block ng-scope toa" data-toa="2" tooltip="Ngồi mềm điều hòa">
            <div class="et-car-icon et-car-icon-avaiable">
               <img src="view/image/trainCar2.png"></div>
            <div class="text-center text-info et-car-label ng-binding">2</div>
            </div>
            <!-- Toa 1 -->
            <div class="et-car-block ng-scope toa" data-toa="1" tooltip="Ngồi mềm điều hòa">
            <div class="et-car-icon et-car-icon-avaiable">
               <img src="view/image/trainCar2.png"></div>
            <div class="text-center text-info et-car-label ng-binding">1</div>
            </div>
            <!-- Đầu tàu -->
            <div class="et-car-block">
              <div class="et-car-icon"><img src="view/image/train2.png"></div>
              <div class="text-center text-info et-car-label ng-binding">SE22</div>
            </div>
          </div>
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
      <div class="et-col-1-18 et-car-floor-full-height">
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
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">5</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[5]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">6</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[10]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">11</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[11]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">12</span> 
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
                        <span class="ng-binding">17</span> 
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
                        <span class="ng-binding">18</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[22]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">23</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[23]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">24</span> 
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
                        <span class="ng-binding">29</span> 
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
                        <span class="ng-binding">30</span> 
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
                        <span class="ng-binding">35</span>
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
                        <span class="ng-binding">36</span> 
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
                        <span class="ng-binding">41</span> 
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
                        <span class="ng-binding">42</span> 
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
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">47</span> 
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
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">48</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[2]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">3</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[3]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">4</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[8]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">9</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[9]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">10</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[14]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">15</span> 
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
                        <span class="ng-binding">16</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[20]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">21</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[21]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">22</span> 
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
                        <span class="ng-binding">27</span> 
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
                        <span class="ng-binding">28</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[32]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">33</span> 
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
                        <span class="ng-binding">34</span> 
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
                        <span class="ng-binding">39</span> 
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
                        <span class="ng-binding">40</span> 
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
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">45</span> 
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
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">46</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[0]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">1</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[1]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">2</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[6]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">7</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[7]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">8</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[12]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">13</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[13]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">14</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[18]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">19</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[19]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">20</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[24]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">25</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[25]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">26</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[30]">
            <div class="et-bed-left">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">31</span> 
                     </div>
                  </div>
                  <div class="et-bed-illu"></div>
               </div>
            </div>
         </div>
         <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope"  seat="seatMap[31]">
            <div class="et-bed-right">
               <div class="et-bed-outer">
                  <div class="et-bed text-center et-sit-bought">
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">32</span> 
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
                        <span class="ng-binding">37</span> 
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
                        <span class="ng-binding">38</span> 
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
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">43</span> 
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
                     <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                        <span class="ng-binding">44</span> 
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
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">1</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[7]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">8</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[8]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">9</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[15]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">16</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[16]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">17</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[23]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">24</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[24]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">25</span></div>
                        <div class="popover top fade ng-animate in-add" ng-class="{ in: isOpen(), fade: animation() }" popover-popup="" title="Chỗ đã bán" content="Chỗ đã bán" placement="top" animation="tt_animation" is-open="tt_isOpen" style="top: 228.8px; left: 258.5px; display: block; transition-property: none;">
                           <div class="arrow"></div>
                           <div class="popover-inner">
                              <h3 class="popover-title ng-binding" ng-bind="title" ng-show="title">Chỗ đã bán</h3>
                              <div class="popover-content ng-binding" ng-bind-html="content">Chỗ đã bán</div>
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
                     <div class="et-sit-sur text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">32</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[1]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">2</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[6]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">7</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[9]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">10</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[14]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">15</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[17]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">18</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[22]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">23</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[25]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">26</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[30]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">31</span></div>
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
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">3</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[5]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">6</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[10]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">11</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[13]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">14</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[18]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">19</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[21]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">22</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[26]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">27</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[29]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">30</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[3]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">4</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[4]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">5</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[11]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">12</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[12]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">13</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[19]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">20</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[20]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">21</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[27]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">28</span></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[28]">
               <div class="et-car-seat-left et-seat-h-35">
                  <div class="et-col-16 et-sit-side"></div>
                  <div class="et-col-84 et-sit-sur-outer">
                     <div class="et-sit-sur text-center et-sit-avaiable">
                        <div data-popover="Giá: 581,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">29</span></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="et-car-seperator" ng-class="{'et-hidden': !seatMap[0].Status}">
         <div></div>
         <div></div>
      </div>
      <div class="et-car-nm-64-half-block">
         <div class="et-full-width">
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[32]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">33</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[39]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">40</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[40]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">41</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[47]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">48</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[48]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">49</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[55]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">56</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[56]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">57</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[63]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">64</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[33]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">34</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[38]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">39</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[41]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">42</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[46]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">47</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[49]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">50</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[54]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">55</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[57]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">58</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[62]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">63</span></div>
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
                        <div data-popover="Giá: 581,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">35</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[37]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">38</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[42]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">43</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[45]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">46</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[50]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">51</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[53]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">54</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[58]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">59</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[61]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">62</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[35]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-bought">
                        <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">36</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[36]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">37</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[43]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">44</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[44]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">45</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[51]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">52</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[52]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">53</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[59]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">60</span></div>
                     </div>
                  </div>
                  <div class="et-col-16 et-sit-side"></div>
               </div>
            </div>
            <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[60]">
               <div class="et-car-seat-right et-seat-h-35">
                  <div class="et-col-84 et-sit-sur-outer-invert">
                     <div class="et-sit-sur-invert text-center et-sit-avaiable">
                        <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">61</span></div>
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
</div>
      </div>
    </table>
    <div id="myModal" class="modal" style="display: none;">
    <div class="modal-content">
    <form>
      <label for="code">Mã toa:</label>
      <input type="text" id="code" name="code" required>
      <label for="seat">Số chỗ ngồi:</label>
      <input type="text" id="seat" name="seat" required>
      <label for="carriage">Loại toa:</label>
      <input type="text" id="carriage" name="carriage" required>
      <label for="train">Mã Tàu:</label>
      <input type="text" id="train" name="train" required>
      <button style="background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;font-size: 16px; margin-right: 10px;" type="button" id="submitBtn">Thêm</button>
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
  const addBtn = document.getElementById('addBtn');
  const modal = document.getElementById('myModal');
  const submitBtn = document.getElementById('submitBtn');
  const cancelBtn = document.getElementById('cancelBtn');
  const tableBody = document.querySelector('#myTable tbody');
  const tbs = document.querySelectorAll('.et-train-block');
  const cbs = document.querySelectorAll('.et-coach-block');
  
  addBtn.addEventListener('click', function() {
    modal.style.display = "block";
  });

  tbs.forEach(tb => {
      tb.addEventListener('click', () => {
        const train = tb.dataset.code;
        document.getElementById('train').value = train;
        document.getElementById('train').readOnly = true;
      });
    });
  
  submitBtn.addEventListener('click', function() {
    const code     = document.getElementById('code').value;
    const seat     = document.getElementById('seat').value;
    const carriage = document.getElementById('carriage').value;

    if (code.trim() && seat.trim() && carriage.trim()) {
        cbs.forEach(cb => {
          if(cb.dataset.code == document.getElementById('train').value){
            const trainSE8 = document.querySelector('#train-' + cb.dataset.code);
            const newCoach = document.createElement('div');
            newCoach.classList.add('et-car-block', 'ng-scope');
            newCoach.innerHTML = `
              <div class="et-car-icon et-car-icon-avaiable">
              <img src="view/image/trainCar2.png">
              </div>
              <div class="text-center text-info et-car-label ng-binding">9</div>`;
            trainSE8.insertBefore(newCoach, trainSE8.firstChild);
            const coachCount = trainSE8.querySelectorAll('.et-car-block').length - 1;
            const coachLabel = trainSE8.querySelector('.et-car-label');
            coachLabel.textContent = `${coachCount}`;
          }
      });
      modal.style.display = "none";
    }
  });

  cancelBtn.addEventListener('click', function() {
    modal.style.display = "none";
  });

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
   var toaTitle  = this.getAttribute('tooltip');
   var toaInfo = "Toa số " + toaNumber + ": " + toaTitle;
   if(toaTitle.includes('Giường nằm khoang 6 điều hòa')){
      document.getElementById('khoang1').style.display = 'block';
      document.getElementById('khoang2').style.display = 'none';
   }else{
      document.getElementById('khoang1').style.display = 'none';
      document.getElementById('khoang2').style.display = 'block';
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

  // Active
const link = document.querySelector(".sidenav_link.toa");
link.classList.add('active');
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/view/javascript/dashboard.js"></script>
<script src="/view/javascript/PaginationDashboard.js"></script>
</body>
</html>

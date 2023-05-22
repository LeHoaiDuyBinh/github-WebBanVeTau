<link rel="stylesheet" href="/view/css/train.css">
<link rel="stylesheet" href="/view/css/ketquatimve.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="body-page row">
    <!-- Chọn vé -->
    <div class="colume1">
        <!-- Vé chiều đi -->       
        <div class="text">
            <h1 style="text-transform: uppercase; color: #01b3a7; text-align: center; margin-top: 10 !important; padding: 10 !important">Chiều đi</h1>
            <table id="myTable">
                <thead>
                    <div id="train-container" class="train-group" style="margin-bottom: 25px;">
                        <!-- In ra tau -->
                        <?$sum=0?>
                        <?php foreach ($arrChuyen as $each): ?>
                        <div class="col-xs-4 col-sm-3 et-col-md-2 et-train-block train-oneway ng-scope" data-code=<? echo $each->getMaTau().$sum;$sum+=1;?>>
                            <div class="et-train-head">
                                <div class="row center-block" style="margin-left: 29%;  width: 40%; margin-bottom: 3px">
                                    <div class="et-train-lamp text-center ng-binding" style="color: rgb(85, 85, 85);"><?php echo $each->getMaTau()?></div>
                                </div>
                                <div class="et-train-head-info">
                                    <div class="row et-no-margin">
                                        <span class="pull-left et-bold ng-binding">TG đi: </span>
                                        <span style="margin-left: 20%;" class="pull-right ng-binding"><?php echo $each->getThoiGianXuatPhat()?></span>
                                    </div>
                                    <div class="row et-no-margin">
                                        <span class="pull-left et-bold ng-binding">TG chạy: </span>
                                        <span class="pull-right"></span>
                                        <span style="margin-left: 20%;" class="pull-right ng-binding"><?php echo $each->getThoiGianChay()?></span>
                                    </div>
                                    <div class="row et-no-margin">
                                        <div class="et-col-50">
                                            <div class="et-text-sm ng-binding">SL chỗ đặt</div>
                                            <div class="et-text-large et-bold pull-left ng-binding" style="margin-left: 5px">11</div>
                                        </div>
                                        <div class="et-col-50 text-center">
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
                        <?php endforeach; ?>
                        
                    </div>

                    <!-- Toa của tàu -->

                    <div class="row" style="flex-wrap: wrap !important">  
                    <?$sum=0?>
                        <?php foreach ($arrChuyen as $each): ?>
                        
                        <!-- Danh sách toa tàu -->
                        <div class="et-coach-block coach-oneway col-md-12 et-no-margin" data-code=<? echo $each->getMaTau().$sum;$sum+=1;?> id=<?php echo "train-".$each->getMaTau();?>>

                        <!-- In ra toa -->
                            <?php foreach ($each->getToa() as $eachToa): ?>    
                              
                                                  
                            <div class="et-car-block ng-scope toa oneway" data-toa=<? echo $eachToa->getThuTuToa();?> tooltip="<? echo $eachToa->getTenLoaiToa();?>" value="<?php echo $eachToa->getTenLoaiToa(); ?>"> 
                                <div class="et-car-icon et-car-icon-avaiable">
                                    <img src="view/image/trainCar2.png">
                                </div>
                                <div class="text-center text-info et-car-label ng-binding"><? echo $eachToa->getThuTuToa();?> </div>
                            </div>
                            <?php endforeach; ?>

                            <!-- Đầu tàu -->
                            <div class="et-car-block">
                                <div class="et-car-icon"><img src="view/image/train2.png"></div>
                                <div class="text-center text-info et-car-label ng-binding"><? echo $each->getMaTau();?></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>                  
                </thead>
                <? foreach ($arrChuyen as $each): ?>
                <!-- Hiển thị chỗ ngồi trong toa  -->
                <div class="seatTrain-oneway">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center oneway">
                        <h4 class="oneway"></h4>
                    </div>
                    
                    <? foreach ($each->getToa() as $eachToa): ?>
                    
                    <!-- Khoang giường nằm 6 điều hòa-->
                    <? if($eachToa->getMaLoaiToa() == "LT002") include 'view/ticketing/BookTickets/LT002.php' ?>                   
                    
                    <!-- Khoang mềm điều hòa -->
                    <? if($eachToa->getMaLoaiToa() == "LT001") include 'view/ticketing/BookTickets/LT001.php' ?>    
                    
                    <!-- Khoang giường nằm 4 điều hòa -->
                    <? if($eachToa->getMaLoaiToa() == "LT003") include 'view/ticketing/BookTickets/LT003.php' ?>    
                    <?php endforeach; ?>
                </div>
                <?php endforeach; ?>

            </table>
        </div>

        <!-- Vé chiều về (nếu có) -->
        <div class="text" style="margin-top: 30px;">
            <h1 style="text-transform: uppercase; color: #01b3a7; text-align: center; margin-top: 10 !important; padding: 10 !important">Chiều về</h1>
            <table id="myTable">
                <thead>
                    <div id="train-container" class="train-group" style="margin-bottom: 25px;">
                        <!-- Tàu số 1 -->
                        <div class="col-xs-4 col-sm-3 et-col-md-2 et-train-block train-return ng-scope" data-code="SE23">
                            <div class="et-train-head">
                                <div class="row center-block" style="margin-left: 29%;  width: 40%; margin-bottom: 3px">
                                    <div class="et-train-lamp text-center ng-binding" style="color: rgb(85, 85, 85);">SE23</div>
                                </div>
                                <div class="et-train-head-info">
                                    <div class="row et-no-margin">
                                        <span class="pull-left et-bold ng-binding">TG đi: </span>
                                        <span style="margin-left: 20%;" class="pull-right ng-binding">25/05 06:45</span>
                                    </div>
                                    <div class="row et-no-margin">
                                        <span class="pull-left et-bold ng-binding">TG đến: </span>
                                        <span class="pull-right"></span>
                                        <span style="margin-left: 20%;" class="pull-right ng-binding">26/05 00:28</span>
                                    </div>
                                    <div class="row et-no-margin">
                                        <div class="et-col-50">
                                            <div class="et-text-sm ng-binding">SL chỗ đặt</div>
                                            <div class="et-text-large et-bold pull-left ng-binding" style="margin-left: 5px">11</div>
                                        </div>
                                        <div class="et-col-50 text-center">
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
                        <div class="col-xs-4 col-sm-3 et-col-md-2 et-train-block train-return ng-scope" data-code="SE07">
                            <div class="et-train-head">
                                <div class="row center-block" style="margin-left: 29%;  width: 40%; margin-bottom: 3px">
                                    <div class="et-train-lamp text-center ng-binding" style="color: rgb(85, 85, 85);">SE07</div>
                                </div>
                                <div class="et-train-head-info">
                                    <div class="row et-no-margin">
                                        <span class="pull-left et-bold ng-binding">TG đi: </span>
                                        <span style="margin-left: 20%;" class="pull-right ng-binding">25/05 06:45</span>
                                    </div>
                                    <div class="row et-no-margin">
                                        <span class="pull-left et-bold ng-binding">TG đến: </span>
                                        <span class="pull-right"></span>
                                        <span style="margin-left: 20%;" class="pull-right ng-binding">26/05 00:28</span>
                                    </div>
                                    <div class="row et-no-margin">
                                        <div class="et-col-50">
                                            <div class="et-text-sm ng-binding">SL chỗ đặt</div>
                                            <div class="et-text-large et-bold pull-left ng-binding" style="margin-left: 5px">11</div>
                                        </div>
                                        <div class="et-col-50 text-center">
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
                        <div class="et-coach-block coach-return col-md-12 et-no-margin" data-code="SE23" id="train-SE23">
                            <!-- Toa 3 -->
                            <div class="et-car-block ng-scope toa round" data-toa="3" tooltip="Giường nằm khoang 6 điều hòa">
                                <div class="et-car-icon et-car-icon-avaiable">
                                    <img src="view/image/trainCar2.png">
                                </div>
                                <div class="text-center text-info et-car-label ng-binding">3</div>
                            </div>
                            <!-- Toa 2 -->
                            <div class="et-car-block ng-scope toa round" data-toa="2" tooltip="Giường nằm khoang 4 điều hòa">
                                <div class="et-car-icon et-car-icon-avaiable">
                                    <img src="view/image/trainCar2.png">
                                </div>
                                <div class="text-center text-info et-car-label ng-binding">2</div>
                            </div>
                            <!-- Toa 1 -->
                            <div class="et-car-block ng-scope toa round" data-toa="1" tooltip="Ngồi mềm điều hòa">
                                <div class="et-car-icon et-car-icon-avaiable">
                                    <img src="view/image/trainCar2.png">
                                </div>
                                <div class="text-center text-info et-car-label ng-binding">1</div>
                            </div>
                            <!-- Đầu tàu -->
                            <div class="et-car-block">
                                <div class="et-car-icon"><img src="view/image/train2.png"></div>
                                <div class="text-center text-info et-car-label ng-binding">SE23</div>
                            </div>
                        </div>

                        <!-- Danh sách toa SE22 -->
                        <div class="et-coach-block coach-return col-md-12 et-no-margin" data-code="SE07" id="train-SE07">
                            <!-- Toa 3 -->
                            <div class="et-car-block ng-scope toa round" data-toa="3" tooltip="Giường nằm khoang 6 điều hòa">
                                <div class="et-car-icon et-car-icon-avaiable">
                                    <img src="view/image/trainCar2.png">
                                </div>
                                <div class="text-center text-info et-car-label ng-binding">3</div>
                            </div>
                            <!-- Toa 2 -->
                            <div class="et-car-block ng-scope toa round" data-toa="2" tooltip="Giường nằm khoang 4 điều hòa">
                                <div class="et-car-icon et-car-icon-avaiable">
                                    <img src="view/image/trainCar2.png">
                                </div>
                                <div class="text-center text-info et-car-label ng-binding">2</div>
                            </div>
                            <!-- Toa 1 -->
                            <div class="et-car-block ng-scope toa round" data-toa="1" tooltip="Ngồi mềm điều hòa">
                                <div class="et-car-icon et-car-icon-avaiable">
                                    <img src="view/image/trainCar2.png">
                                </div>
                                <div class="text-center text-info et-car-label ng-binding">1</div>
                            </div>
                            <!-- Đầu tàu -->
                            <div class="et-car-block">
                                <div class="et-car-icon"><img src="view/image/train2.png"></div>
                                <div class="text-center text-info et-car-label ng-binding">SE07</div>
                            </div>
                        </div>
                </thead>

                <!-- Hiển thị chỗ ngồi trong toa  -->
                <div class="seatTrain-round">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center round">
                        <h4 class="round"></h4>
                    </div>

                    <!-- Khoang giường nằm 6 điều hòa-->
                    <div id="khoang1" class="et-col-90 khoang round" style="margin-bottom: 30px;">
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
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[4]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">5</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[5]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">6</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[10]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">11</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[11]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">12</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[16]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 826,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">17</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[17]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 826,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">18</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[22]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">23</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[23]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">24</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[28]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 826,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">29</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[29]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 826,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">30</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[34]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 826,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">35</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[35]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 826,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">36</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[40]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 826,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">41</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[41]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 826,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">42</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[46]">
                                    <div class="et-bed-left ng-hide">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">47</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[47]">
                                    <div class="et-bed-right ng-hide">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">48</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[2]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">3</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[3]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">4</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[8]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">9</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[9]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">10</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[14]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">15</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[15]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 939,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">16</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[20]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">21</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[21]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">22</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[26]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 939,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">27</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[27]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 939,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">28</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[32]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">33</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[33]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 939,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">34</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[38]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 939,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">39</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[39]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 939,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">40</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[44]">
                                    <div class="et-bed-left ng-hide">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">45</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[45]">
                                    <div class="et-bed-right ng-hide">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">46</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[0]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">1</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[1]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">2</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[6]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">7</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[7]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">8</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[12]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">13</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[13]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">14</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[18]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">19</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[19]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">20</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[24]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">25</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[25]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">26</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[30]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">31</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[31]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">32</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[36]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 1,022,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">37</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[37]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 1,022,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">38</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[42]">
                                    <div class="et-bed-left ng-hide">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope">
                                                    <span class="ng-binding">43</span>
                                                </div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[43]">
                                    <div class="et-bed-right ng-hide">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat">
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
                        </div>
                    </div>

                    <!-- Khoang mềm điều hòa -->
                    <div id="khoang2" class="et-col-90 khoang round" style="margin-bottom: 30px;">
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
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">1</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[7]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-bought">
                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">8</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[8]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-bought">
                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">9</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[15]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-bought">
                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">16</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[16]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">17</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[23]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-bought">
                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">24</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[24]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-bought">
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
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-bought">
                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">32</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[1]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">2</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[6]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-bought">
                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">7</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[9]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-bought">
                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">10</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[14]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-bought">
                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">15</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[17]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">18</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[22]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">23</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[25]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">26</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[30]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-bought">
                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">31</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-way et-full-width"></div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[2]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">3</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[5]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">6</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[10]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-bought">
                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">11</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[13]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">14</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[18]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-bought">
                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">19</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[21]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-bought">
                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">22</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[26]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-bought">
                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">27</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[29]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-bought">
                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">30</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[3]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">4</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[4]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">5</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[11]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-bought">
                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">12</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[12]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">13</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[19]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-bought">
                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">20</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[20]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-bought">
                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">21</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[27]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-bought">
                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">28</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[28]">
                                        <div class="et-car-seat-left et-seat-h-35">
                                            <div class="et-col-16 et-sit-side"></div>
                                            <div class="et-col-84 et-sit-sur-outer et-sit-check">
                                                <div class="et-sit-sur text-center seat et-sit-avaiable">
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
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-bought">
                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">33</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[39]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">40</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[40]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">41</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[47]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">48</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[48]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">49</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[55]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">56</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[56]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">57</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[63]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">64</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[33]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-bought">
                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">34</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[38]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">39</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[41]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">42</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[46]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">47</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[49]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">50</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[54]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">55</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[57]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">58</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[62]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">63</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-way et-full-width"></div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[34]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 581,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">35</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[37]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">38</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[42]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">43</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[45]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">46</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[50]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">51</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[53]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">54</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[58]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">59</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[61]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">62</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[35]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-bought">
                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán" class="et-sit-no ng-scope"><span class="ng-binding">36</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[36]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">37</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[43]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">44</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[44]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">45</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[51]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">52</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[52]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">53</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[59]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
                                                    <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding">60</span></div>
                                                </div>
                                            </div>
                                            <div class="et-col-16 et-sit-side"></div>
                                        </div>
                                    </div>
                                    <div class="et-car-nm-64-sit ng-isolate-scope" seat="seatMap[60]">
                                        <div class="et-car-seat-right et-seat-h-35">
                                            <div class="et-col-84 et-sit-sur-outer-invert et-sit-check">
                                                <div class="et-sit-sur-invert text-center seat et-sit-avaiable">
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

                    <!-- Khoang giường nằm 4 điều hòa -->
                    <div id="khoang3" class="et-col-90 khoang round" style="margin-bottom: 30px;">
                        <div class="et-full-width et-car-loading ng-hide">
                            <div class="row text-capitalize text-center"></div>
                            <div class="row text-center"></div>
                        </div>
                        <div class="row et-car-floor">
                            <div class="et-col-1-18 et-car-floor-full-height">
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
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">3</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[3]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">4</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[6]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">7</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[7]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">8</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[10]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">11</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[11]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">12</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[14]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 997,000 VNĐ" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">15</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[15]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 997,000 VNĐ" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">16</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[18]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">19</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[19]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 962,000 VNĐ" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">20</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[22]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">23</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[23]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 962,000 VNĐ" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">24</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[26]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 962,000 VNĐ" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">27</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[27]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-avaiable">
                                                <div data-popover="Giá: 962,000 VNĐ" data-popover-title="Chỗ trống"><span class="ng-binding" data-khoang="3">28</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[30]">
                                    <div class="et-bed-left ng-hide">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">31</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[31]">
                                    <div class="et-bed-right ng-hide">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">32</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[0]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">1</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[1]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">2</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[4]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">5</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[5]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">6</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[8]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">9</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[9]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">10</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[12]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">13</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[13]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">14</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[16]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">17</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[17]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">18</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[20]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">21</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[21]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">22</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[24]">
                                    <div class="et-bed-left">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">25</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[25]">
                                    <div class="et-bed-right">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat et-sit-bought">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">26</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[28]">
                                    <div class="et-bed-left ng-hide">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">29</span></div>
                                            </div>
                                            <div class="et-bed-illu"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope" seat="seatMap[29]">
                                    <div class="et-bed-right ng-hide">
                                        <div class="et-bed-outer et-sit-check">
                                            <div class="et-bed text-center seat">
                                                <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán"><span class="ng-binding" data-khoang="3">30</span></div>
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
            </table>
        </div>

        <!-- Chú thích biểu tượng -->
        <div class="et-col-md-12 table-bordered list-ticket-deskhop" style="margin-top: 20px; padding: 5px">
            <!-- chú thích toa -->
            <div class="et-col-md-12">
                <!-- Toa còn vé -->
                <div class="et-col-md-4 et-no-padding">
                    <div class="et-col-md-12">
                        <div class="et-col-md-12" style="padding:0px">
                            <div class="et-col-md-12" style="padding:6px 0px 0px 0px">
                                <div class="et-car-block" style="height:36px">
                                    <div class="et-car-icon et-car-icon-avaiable"><img src="view/image/trainCar2.png"></div>
                                </div><span style="padding-left:6px" class="ng-binding">Toa còn vé</span>
                            </div>
                        </div>
                        <div class="et-col-md-12 text-center et-no-padding ng-binding" style="margin-top: -20px;display:none">Toa còn vé</div>
                    </div>
                </div>

                <!-- Toa đang chọn -->
                <div class="et-col-md-4 et-no-padding">
                    <div class="et-col-md-12">
                        <div class="et-col-md-12" style="padding:0px">
                            <div class="et-col-md-12" style="padding:6px 0px 0px 0px;">
                                <div class="et-car-block" style="height:36px">
                                    <div class="et-car-icon et-car-icon-selected"><img src="view/image/trainCar2.png"></div>
                                </div>
                                <span style="padding-left:6px" class="ng-binding">Toa đang chọn</span>
                            </div>
                        </div>
                        <div class="et-col-md-12 et-no-padding text-center ng-binding" style="margin-top: -20px; display:none">Toa đang chọn</div>
                    </div>
                </div>
                <!-- Toa hết vé -->
                <div class="et-col-md-4 et-no-padding">
                    <div class="et-col-md-12">
                        <div class="et-col-md-12" style="padding:0px">
                            <div class="et-col-md-12" style="padding:6px 0px 0px 0px;">
                                <div class="et-car-block" style="height:36px">
                                    <div class="et-car-icon et-car-icon-sold-out"><img src="view/image/trainCar2.png"></div>
                                </div><span style="padding-left:6px" class="ng-binding">Toa hết vé</span>
                            </div>
                        </div>
                        <div class="et-col-md-12 text-center et-no-padding ng-binding" style="margin-top: -20px; display:none">Toa hết vé</div>
                    </div>
                </div>
            </div>

            <div class="et-col-md-12 table-bordered"></div>

            <!-- chú thích chỗ ngồi -->
            <div class="et-col-md-12 et-legend" style="padding:0px">
                <!-- Chỗ còn trống -->
                <div class="et-col-md-4" style="padding: 0px">
                    <div class="et-col-md-4" style="padding: 0px">
                        <div class="row">
                            <div class="et-car-nm-64-sit et-col-md-6" style="padding-right:0px">
                                <div class="et-col-16 et-sit-side"></div>
                                <div class="et-col-64 et-sit-sur-outer">
                                    <div class="et-sit-sur text-center"></div>
                                </div>
                            </div>
                            <div class="et-bed-left et-col-md-3 et-no-padding" style="width:30%">
                                <div class="et-bed-outer et-sit-check">
                                    <div class="et-bed text-center seat"></div>
                                    <div class="et-bed-illu"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="et-col-md-8" style="padding: 0px">
                        <div class="et-legend-label ng-binding" style="margin-left:6px"> Chỗ trống</div>
                    </div>
                </div>

                <!-- Chỗ đang chọn -->
                <div class="et-col-md-4" style="padding: 0px">
                    <div class="et-col-md-4" style="padding: 0px">
                        <div class="row">
                            <div class="et-car-nm-64-sit et-col-md-6" style="padding-right:0px">
                                <div class="et-col-16 et-sit-side"></div>
                                <div class="et-col-64 et-sit-sur-outer">
                                    <div class="et-sit-sur text-center sit-selected"></div>
                                </div>
                            </div>
                            <div class="et-bed-left et-col-md-3 et-no-padding" style="width:30%">
                                <div class="et-bed-outer et-sit-check">
                                    <div class="et-bed text-center seat sit-selected"></div>
                                    <div class="et-bed-illu"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="et-col-md-8" style="padding: 0px">
                        <div class="et-legend-label ng-binding" style="margin-left:6px"> Chỗ đang chọn</div>
                    </div>
                </div>

                <!-- Chỗ đã bán / không bán -->
                <div class="et-col-md-4" style="padding: 0px">
                    <div class="et-col-md-4" style="padding: 0px">
                        <div class="row">
                            <div class="et-car-nm-64-sit et-col-md-6" style="padding-right:0px">
                                <div class="et-col-16 et-sit-side"></div>
                                <div class="et-col-64 et-sit-sur-outer">
                                    <div class="et-sit-sur text-center et-sit-blocked"></div>
                                </div>
                            </div>
                            <div class="et-bed-left et-col-md-3 et-no-padding" style="width:30%">
                                <div class="et-bed-outer et-sit-check">
                                    <div class="et-bed text-center seat et-sit-blocked"></div>
                                    <div class="et-bed-illu"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="et-col-md-8" style="padding: 0px">
                        <div class="et-legend-label ng-binding" style="margin-left:6px"> Chỗ đã bán, không bán</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Thông tin vé và giỏ hàng -->
    <div class="colume2">
        <!-- Giỏ hàng -->
        <div et-ticket-pocket="" class="ng-isolate-scope">
            <div class="col-md-12 et-widget" id="ticketPocket" style="padding-bottom: 8px">
                <div class="row et-widget-header ">
                    <!-- <i class="fa fa-shopping-cart" style="font-size:20px"></i> -->
                    <span><strong class="ng-binding"> GIỎ VÉ</strong></span>
                </div>
                <div class="row" style="flex-wrap: wrap !important;">
                    <!-- Trường hợp chưa chọn vé -->
                    <div class="col-md-12 text-center nohave" style="display: block">
                        <h5 sstyle="margin-top: 4px;" class="ng-binding">Chưa có vé</h5>
                    </div>

                    <!-- Trường hợp khách hàng đã add vé -->
                    <!-- Chiều đi -->
                    <div class="col-md-12 text-center chieuDi" style="display: none; padding: 5px !important">
                        <h6 class="ng-binding" style="font-size: 20px; padding-top: 10px"> <strong> Chiều đi </strong></h6>
                        <div class="col-md-12 et-ticket-info ng-scope" ng-repeat="ve in searchData.ves.chieuDi">
                            <!-- bắt sự kiện và add thông tin-->
                            <div class="data-ticket chieuDi">
                                <div class="ng-binding">SE8 Thanh Hoá-Biên Hòa</div>
                                <div class="ng-binding">12/05/2023 01:16</div>
                                <div class="ng-binding">NML56 toa 2 chỗ 35</div>
                            </div>
                        </div>
                    </div>

                    <!-- Chiều về (nếu có) -->
                    <div class="col-md-12 text-center chieuVe" style="display: none; padding: 5px !important">
                        <h6 class="ng-binding" style="font-size: 20px; padding-top: 10px"> <strong> Chiều về </strong></h6>
                        <div class="col-md-12 et-ticket-info ng-scope chieuVe" ng-repeat="ve in searchData.ves.chieuVe">
                            <div class="data-ticket chieuVe">
                                <div class="ng-binding">SE8 Biên Hòa-Thanh Hoá</div>
                                <div class="ng-binding">13/05/2023 07:32</div>
                                <div class="ng-binding">NML toa 1 chỗ 60</div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Mua vé</button>
            </div>
        </div>

        <!-- Thông tin hành trình -->
        <et-search-pane calculatetrainlist="calculateTrainList" calculatecanshit="calculateCanShift" class="ng-isolate-scope">
            <div class="col-md-12 et-widget" style="margin-bottom: 5px">
                <div class="row et-widget-header"><span><strong class="ng-binding">THÔNG TIN HÀNH TRÌNH</strong></span></div>
                <form>
                    <div class="form-group">
                        <label>Ga đi</label>
                        <select id="ga-di" class="form-control">
                            <option>Thành phố Hà Nội</option>
                            <option>Tỉnh Hà Giang</option>
                            <option>Tỉnh Cao Bằng</option>
                            <option>Tỉnh Bắc Kạn</option>
                            <option>Tỉnh Tuyên Quang</option>
                            <option>Tỉnh Lào Cai</option>
                            <option>Tỉnh Điện Biên</option>
                            <option>Tỉnh Lai Châu</option>
                            <option>Tỉnh Sơn La</option>
                            <option>Tỉnh Yên Bái</option>
                            <option>Tỉnh Hoà Bình</option>
                            <option>Tỉnh Thái Nguyên</option>
                            <option>Tỉnh Lạng Sơn</option>
                            <option>Tỉnh Quảng Ninh</option>
                            <option>Tỉnh Bắc Giang</option>
                            <option>Tỉnh Phú Thọ</option>
                            <option>Tỉnh Vĩnh Phúc</option>
                            <option>Tỉnh Bắc Ninh</option>
                            <option>Tỉnh Hải Dương</option>
                            <option>Thành phố Hải Phòng</option>
                            <option>Tỉnh Hưng Yên</option>
                            <option>Tỉnh Thái Bình</option>
                            <option>Tỉnh Hà Nam</option>
                            <option>Tỉnh Nam Định</option>
                            <option>Tỉnh Ninh Bình</option>
                            <option>Tỉnh Thanh Hóa</option>
                            <option>Tỉnh Nghệ An</option>
                            <option>Tỉnh Hà Tĩnh</option>
                            <option>Tỉnh Quảng Bình</option>
                            <option>Tỉnh Quảng Trị</option>
                            <option>Tỉnh Thừa Thiên Huế</option>
                            <option>Thành phố Đà Nẵng</option>
                            <option>Tỉnh Quảng Nam</option>
                            <option>Tỉnh Quảng Ngãi</option>
                            <option>Tỉnh Bình Định</option>
                            <option>Tỉnh Phú Yên</option>
                            <option>Tỉnh Khánh Hòa</option>
                            <option>Tỉnh Ninh Thuận</option>
                            <option>Tỉnh Bình Thuận</option>
                            <option>Tỉnh Kon Tum</option>
                            <option>Tỉnh Gia Lai</option>
                            <option>Tỉnh Đắk Lắk</option>
                            <option>Tỉnh Đắk Nông</option>
                            <option>Tỉnh Lâm Đồng</option>
                            <option>Tỉnh Bình Phước</option>
                            <option>Tỉnh Tây Ninh</option>
                            <option>Tỉnh Bình Dương</option>
                            <option>Tỉnh Đồng Nai</option>
                            <option>Tỉnh Bà Rịa - Vũng Tàu</option>
                            <option>Thành phố Hồ Chí Minh</option>
                            <option>Tỉnh Long An</option>
                            <option>Tỉnh Tiền Giang</option>
                            <option>Tỉnh Bến Tre</option>
                            <option>Tỉnh Trà Vinh</option>
                            <option>Tỉnh Vĩnh Long</option>
                            <option>Tỉnh Đồng Tháp</option>
                            <option>Tỉnh An Giang</option>
                            <option>Tỉnh Kiên Giang</option>
                            <option>Thành phố Cần Thơ</option>
                            <option>Tỉnh Hậu Giang</option>
                            <option>Tỉnh Sóc Trăng</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ga đến</label>
                        <select id="ga-den" class="form-control">
                            <option>Tỉnh Thái Nguyên</option>
                            <option>Tỉnh Lạng Sơn</option>
                            <option>Tỉnh Quảng Ninh</option>
                            <option>Tỉnh Bắc Giang</option>
                            <option>Tỉnh Phú Thọ</option>
                            <option>Tỉnh Vĩnh Phúc</option>
                            <option>Tỉnh Bắc Ninh</option>
                            <option>Tỉnh Hải Dương</option>
                            <option>Thành phố Hải Phòng</option>
                            <option>Tỉnh Hưng Yên</option>
                            <option>Tỉnh Thái Bình</option>
                            <option>Tỉnh Hà Nam</option>
                            <option>Tỉnh Nam Định</option>
                            <option>Tỉnh Ninh Bình</option>
                            <option>Tỉnh Thanh Hóa</option>
                            <option>Tỉnh Nghệ An</option>
                            <option>Tỉnh Tuyên Quang</option>
                            <option>Thành phố Hà Nội</option>
                            <option>Tỉnh Hà Giang</option>
                            <option>Tỉnh Cao Bằng</option>
                            <option>Tỉnh Bắc Kạn</option>
                            <option>Tỉnh Lào Cai</option>
                            <option>Tỉnh Điện Biên</option>
                            <option>Tỉnh Lai Châu</option>
                            <option>Tỉnh Sơn La</option>
                            <option>Tỉnh Yên Bái</option>
                            <option>Tỉnh Hoà Bình</option>
                            <option>Tỉnh Hà Tĩnh</option>
                            <option>Tỉnh Quảng Bình</option>
                            <option>Tỉnh Quảng Trị</option>
                            <option>Tỉnh Thừa Thiên Huế</option>
                            <option>Thành phố Đà Nẵng</option>
                            <option>Tỉnh Quảng Nam</option>
                            <option>Tỉnh Quảng Ngãi</option>
                            <option>Tỉnh Bình Định</option>
                            <option>Tỉnh Phú Yên</option>
                            <option>Tỉnh Khánh Hòa</option>
                            <option>Tỉnh Ninh Thuận</option>
                            <option>Tỉnh Bình Thuận</option>
                            <option>Tỉnh Kon Tum</option>
                            <option>Tỉnh Gia Lai</option>
                            <option>Tỉnh Đắk Lắk</option>
                            <option>Tỉnh Đắk Nông</option>
                            <option>Tỉnh Lâm Đồng</option>
                            <option>Tỉnh Bình Phước</option>
                            <option>Tỉnh Tây Ninh</option>
                            <option>Tỉnh Bình Dương</option>
                            <option>Tỉnh Đồng Nai</option>
                            <option>Tỉnh Bà Rịa - Vũng Tàu</option>
                            <option>Thành phố Hồ Chí Minh</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thời gian đi</label>
                        <input id="departure-date" type="date" class="form-control" placeholder="dd/mm/yyyy">
                    </div>
                    <div class="form-group">
                        <label>Thời gian quay về</label>
                        <input id="return-date" type="date" class="form-control" placeholder="dd/mm/yyyy">
                    </div>
                    <div class="form-group ">
                        <label>Loại vé</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="ticket-type" value="one-way" checked> Một chiều </input>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="ticket-type" value="round-trip"> Khứ hồi </input>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tìm vé</button>
                </form>
            </div>
        </et-search-pane>
    </div>
</div>

<script src="/view/javascript/ketquatimve.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/view/javascript/dashboard.js"></script>
<script src="/view/javascript/PaginationDashboard.js"></script>
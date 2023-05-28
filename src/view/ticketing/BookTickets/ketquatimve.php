<link rel="stylesheet" href="/view/css/train.css">
<link rel="stylesheet" href="/view/css/ketquatimve.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="body-page row row-body">
    <!-- Chọn vé -->
    <div class="colume1">
        <!-- Vé chiều đi -->
        <div class="text">
            <h1 class="title" style="text-transform: uppercase; color: #01b3a7; text-align: center; margin-top: 10 !important; padding: 10 !important"><strong>Chiều đi</strong></h1>
            <table id="myTable">
                <thead>
                    <div id="train-container" class="train-group" style="margin-bottom: 25px;">
                        <!-- In ra tau -->
                        <?php foreach ($arrChuyen as $each) : ?>
                            <div class="col-xs-4 col-sm-3 et-col-md-2 et-train-block train-oneway ng-scope" data-codetrain="<? echo $each->getMaTau(); ?>">
                                <div class="et-train-head">
                                    <div class="row center-block" style="margin-left: 29%;  width: 40%; margin-bottom: 3px">
                                        <div class="et-train-lamp text-center ng-binding" style="color: rgb(85, 85, 85);"><?php echo $each->getMaTau() ?></div>
                                    </div>
                                    <div class="et-train-head-info">
                                        <div class="row et-no-margin">
                                            <span class="pull-left et-bold ng-binding"></span>
                                            <span style="" class="pull-right ng-binding"><?php echo $each->getThoiGianXuatPhat() ?></span>
                                        </div>
                                        <div class="row et-no-margin">
                                            <span class="pull-left et-bold ng-binding">TG chạy: </span>
                                            <span class="pull-right"></span>
                                            <span style="margin-left: 20%;" class="pull-right ng-binding"><?php echo $each->getThoiGianChay() ?></span>
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
                        <? $sum = 0 ?>
                        <?php foreach ($arrChuyen as $each) : ?>
                            <!-- Danh sách toa tàu -->
                            <div class="et-coach-block coach coach-oneway col-md-12 et-no-margin" data-codetrain="<? echo $each->getMaTau() ?>" id="<?php echo "train-" . $each->getMaTau(); ?>">
                                <!-- In ra toa -->
                                <?php foreach ($each->getToa() as $eachToa) : ?>
                                    <div class="et-car-block ng-scope toa oneway" number-toa="<? echo $eachToa->getThuTuToa() ?>" tooltip="<? echo $eachToa->getTenLoaiToa(); ?>" data-code="<? echo $eachToa->getMaToa() ?>" data-codetrain="<? echo $each->getMaTau() ?>">
                                        <div class="et-car-icon et-car-icon-avaiable">
                                            <img src="view/image/trainCar2.png">
                                        </div>
                                        <div class="text-center text-info et-car-label ng-binding"><? echo $eachToa->getThuTuToa(); ?> </div>
                                    </div>
                                <?php endforeach; ?>
                                <!-- Đầu tàu -->
                                <div class="et-car-block">
                                    <div class="et-car-icon"><img src="view/image/train2.png"></div>
                                    <div class="text-center text-info et-car-label ng-binding"><? echo $each->getMaTau(); ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </thead>

                <? foreach ($arrChuyen as $each) : ?>
                    <!-- Hiển thị chỗ ngồi trong toa  -->
                    <div class="seatTrain-oneway" data-codetrain="<? echo $each->getMaTau() ?>">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center oneway">
                        </div>
                        <? foreach ($each->getToa() as $eachToa) :
                            // Khoang mềm điều hòa
                            if ($eachToa->getMaLoaiToa() == "LT001") { ?>
                                <div id="khoang2" class="et-col-90 khoang oneway" style="margin-bottom: 30px;" data-code="<? echo $eachToa->getMaToa() ?>">
                                    <div class="et-full-width et-car-loading ng-hide">
                                        <div class="row text-capitalize text-center"></div>
                                    </div>
                                    <div class="row et-car-floor">
                                        <div class="et-car-door"></div>
                                        <div class="et-car-nm-64-half-block">
                                            <div class="et-full-width">
                                                <? $conTrong = "et-sit-avaiable";
                                                $daBan = "et-sit-bought";
                                                $sum = 0 ?>
                                                <? foreach ($eachToa->getChoNgoi() as $eachChoNgoi) : ?>
                                                    <div class="et-car-nm-64-sit ng-isolate-scope">
                                                        <div class="et-car-seat-left et-seat-h-35">
                                                            <div class="et-col-16 et-sit-side"></div>
                                                            <div class="et-col-84 et-sit-sur-outer et-sit-check oneway" data-seat="<? echo $eachChoNgoi->getMaChoNgoi() ?>" number-seat="<? echo $sum += 1 ?>" data-toa="<? echo $eachToa->getMaToa() ?>" number-toa="<? echo $eachToa->getThuTuToa() ?>" data-diemDen="<? echo $DiemDen ?>" data-xuatPhat="<? echo $xuatPhat ?>" data-tau="<? echo $eachChoNgoi->getMaTau() ?>" data-time="<? echo $eachChoNgoi->getThoiGianKhoiHanh() ?>">
                                                                <div class="et-sit-sur text-center seat <? if ($eachChoNgoi->getTrangThai() == 2) echo $conTrong;
                                                                                                        else echo $daBan ?>">
                                                                    <div class="et-sit-no ng-scope"><span><? echo $sum ?></span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?
                                                    if ($sum + 1 == 17 || $sum + 1 == 49) echo "<div class=\"et-car-way et-full-width\"></div>";
                                                    elseif ($sum + 1 == 33) echo "</div></div><div class=\"et-car-seperator\" ng-class=\"{'et-hidden': !seatMap[0].Status}\"><div></div><div></div></div><div class=\"et-car-nm-64-half-block\"><div class=\"et-full-width\">"
                                                    ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <div class="et-car-door"></div>
                                    </div>
                                </div>
                            <? }
                            // Khoang giường nằm 6 điều hòa
                            elseif ($eachToa->getMaLoaiToa() == "LT002") { ?>
                                <div id="khoang1" class="et-col-90 khoang oneway" style="margin-bottom: 30px;" data-code="<? echo $eachToa->getMaToa(); ?>">
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
                                            <? $conTrong = "et-sit-avaiable";
                                            $daBan = "et-sit-bought";
                                            $sum = 0 ?>
                                            <? foreach ($eachToa->getChoNgoi() as $eachChoNgoi) : ?>
                                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope">
                                                    <div class="<? if ($sum % 2 == 0) echo "et-bed-left";
                                                                else echo "et-bed-right" ?>">
                                                        <div class="et-bed-outer et-sit-check oneway" data-seat="<? echo $eachChoNgoi->getMaChoNgoi() ?>" number-seat="<? echo $sum += 1 ?>" data-toa="<? echo $eachToa->getMaToa() ?>" number-toa="<? echo $eachToa->getThuTuToa() ?>" data-diemDen="<? echo $DiemDen ?>" data-xuatPhat="<? echo $xuatPhat ?>" data-tau="<? echo $eachChoNgoi->getMaTau() ?>" data-time="<? echo $eachChoNgoi->getThoiGianKhoiHanh() ?>">
                                                            <div class="et-bed text-center seat <? if ($eachChoNgoi->getTrangThai() == 2) echo $conTrong;
                                                                                                else echo $daBan ?>">
                                                                <div class="et-sit-no ng-scope">
                                                                    <span><? echo $sum ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="et-bed-illu"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="et-col-1-18 et-car-floor-full-height"></div>
                                    </div>
                                </div>
                            <? }
                            // Khoang giường nằm 4 điều hòa
                            elseif ($eachToa->getMaLoaiToa() == "LT003") { ?>
                                <div id="khoang3" class="et-col-90 khoang oneway" style="margin-bottom: 30px;" data-code="<? echo $eachToa->getMaToa(); ?>">
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
                                            <? $conTrong = "et-sit-avaiable";
                                            $daBan = "et-sit-bought";
                                            $sum = 0 ?>
                                            <? foreach ($eachToa->getChoNgoi() as $eachChoNgoi) : ?>
                                                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope">
                                                    <div class="<? if ($sum % 2 == 0) echo "et-bed-left";
                                                                else echo "et-bed-right" ?>">
                                                        <div class="et-bed-outer et-sit-check oneway" data-seat="<? echo $eachChoNgoi->getMaChoNgoi() ?>" number-seat="<? echo $sum += 1 ?>" data-toa="<? echo $eachToa->getMaToa() ?>" number-toa="<? echo $eachToa->getThuTuToa() ?>" data-diemDen="<? echo $DiemDen ?>" data-xuatPhat="<? echo $xuatPhat ?>" data-tau="<? echo $eachChoNgoi->getMaTau() ?>" data-time="<? echo $eachChoNgoi->getThoiGianKhoiHanh() ?>">
                                                            <div class="et-bed text-center seat <? if ($eachChoNgoi->getTrangThai() == 2) echo $conTrong;
                                                                                                else echo $daBan ?>">
                                                                <div><span><? echo $sum ?></span></div>
                                                            </div>
                                                            <div class="et-bed-illu"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="et-col-1-18 et-car-floor-full-height"></div>
                                    </div>

                                </div>
                        <? }
                        endforeach; ?>
                    </div>
                <?php endforeach; ?>

            </table>
        </div>

        <!-- Vé chiều về (nếu có) -->
        <?php if ($ticket_type == "round-trip" && $arrVe[0] != NULL) { ?>
            <div class="text">
                <h1 class="title" style="text-transform: uppercase; color: #01b3a7; text-align: center; margin-top: 10 !important; padding: 10 !important"><strong>chiều về</strong></h1>
                <table id="myTable">
                    <thead>
                        <div id="train-container" class="train-group" style="margin-bottom: 25px;">
                            <!-- In ra tau -->
                            <?php foreach ($arrVe as $each) : ?>
                                <div class="col-xs-4 col-sm-3 et-col-md-2 et-train-block train-return ng-scope" data-codetrain="<? echo $each->getMaTau() ?>">
                                    <div class="et-train-head">
                                        <div class="row center-block" style="margin-left: 29%;  width: 40%; margin-bottom: 3px">
                                            <div class="et-train-lamp text-center ng-binding" style="color: rgb(85, 85, 85);"><?php echo $each->getMaTau() ?></div>
                                        </div>
                                        <div class="et-train-head-info">
                                            <div class="row et-no-margin">
                                                <span class="pull-left et-bold ng-binding">TG đi: </span>
                                                <span style="margin-left: 20%;" class="pull-right ng-binding"><?php echo $each->getThoiGianXuatPhat() ?></span>
                                            </div>
                                            <div class="row et-no-margin">
                                                <span class="pull-left et-bold ng-binding">TG chạy: </span>
                                                <span class="pull-right"></span>
                                                <span style="margin-left: 20%;" class="pull-right ng-binding"><?php echo $each->getThoiGianChay() ?></span>
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
                            <? $sum = 0 ?>
                            <?php foreach ($arrVe as $each) : ?>
                                <!-- Danh sách toa tàu -->
                                <div class="et-coach-block coach coach-return col-md-12 et-no-margin" data-codetrain=<? echo $each->getMaTau() ?> id=<?php echo "train-" . $each->getMaTau(); ?>>
                                    <!-- In ra toa -->
                                    <?php foreach ($each->getToa() as $eachToa) : ?>
                                        <div class="et-car-block ng-scope toa return" number-toa=<? echo $eachToa->getThuTuToa() ?> tooltip="<? echo $eachToa->getTenLoaiToa() ?>" data-code="<? echo $eachToa->getMaToa() ?>" data-codetrain="<? echo $each->getMaTau() ?>">
                                            <div class="et-car-icon et-car-icon-avaiable">
                                                <img src="view/image/trainCar2.png">
                                            </div>
                                            <div class="text-center text-info et-car-label ng-binding"><? echo $eachToa->getThuTuToa() ?> </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <!-- Đầu tàu -->
                                    <div class="et-car-block">
                                        <div class="et-car-icon"><img src="view/image/train2.png"></div>
                                        <div class="text-center text-info et-car-label ng-binding"><? echo $each->getMaTau() ?></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </thead>

                    <? foreach ($arrVe as $each) : ?>
                        <!-- Hiển thị chỗ ngồi trong toa  -->
                        <div class="seatTrain-return" data-codetrain="<? echo $each->getMaTau() ?>">
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center return">
                                <h4 class="return"></h4>
                            </div>
                            <? foreach ($each->getToa() as $eachToa) :
                                // Khoang mềm điều hòa
                                if ($eachToa->getMaLoaiToa() == "LT001") { ?>
                                    <div id="khoang2" class="et-col-90 khoang return" style="margin-bottom: 30px;" data-code="<? echo $eachToa->getMaToa() ?>">
                                        <div class="et-full-width et-car-loading ng-hide">
                                            <div class="row text-capitalize text-center"></div>
                                        </div>
                                        <div class="row et-car-floor">
                                            <div class="et-car-door"></div>
                                            <div class="et-car-nm-64-half-block">
                                                <div class="et-full-width">
                                                    <? $conTrong = "et-sit-avaiable";
                                                    $daBan = "et-sit-bought";
                                                    $sum = 0 ?>
                                                    <? foreach ($eachToa->getChoNgoi() as $eachChoNgoi) : ?>
                                                        <div class="et-car-nm-64-sit ng-isolate-scope">
                                                            <div class="et-car-seat-left et-seat-h-35">
                                                                <div class="et-col-16 et-sit-side"></div>
                                                                <div class="et-col-84 et-sit-sur-outer et-sit-check return" data-seat="<? echo $eachChoNgoi->getMaChoNgoi() ?>" number-seat="<? echo $sum += 1 ?>" data-toa="<? echo $eachToa->getMaToa() ?>" number-toa="<? echo $eachToa->getThuTuToa() ?>" data-diemDen="<? echo $DiemDen ?>" data-xuatPhat="<? echo $xuatPhat ?>" data-tau="<? echo $eachChoNgoi->getMaTau() ?>" data-time="<? echo $eachChoNgoi->getThoiGianKhoiHanh() ?>">
                                                                    <div class="et-sit-sur text-center seat <? if ($eachChoNgoi->getTrangThai() == 2) echo $conTrong;
                                                                                                            else echo $daBan ?>">
                                                                        <div class="et-sit-no ng-scope"><span><? echo $sum ?></span></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?
                                                        if ($sum + 1 == 17 || $sum + 1 == 49) echo "<div class=\"et-car-way et-full-width\"></div>";
                                                        elseif ($sum + 1 == 33) echo "</div></div><div class=\"et-car-seperator\" ng-class=\"{'et-hidden': !seatMap[0].Status}\"><div></div><div></div></div><div class=\"et-car-nm-64-half-block\"><div class=\"et-full-width\">"
                                                        ?>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                            <div class="et-car-door"></div>
                                        </div>
                                    </div>
                                <? }
                                // Khoang giường nằm 6 điều hòa
                                elseif ($eachToa->getMaLoaiToa() == "LT002") { ?>
                                    <div id="khoang1" class="et-col-90 khoang return" style="margin-bottom: 30px;" data-code="<? echo $eachToa->getMaToa() ?>">
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
                                                <? $conTrong = "et-sit-avaiable";
                                                $daBan = "et-sit-bought";
                                                $sum = 0 ?>
                                                <? foreach ($eachToa->getChoNgoi() as $eachChoNgoi) : ?>
                                                    <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope">
                                                        <div class="<? if ($sum % 2 == 0) echo "et-bed-left";
                                                                    else echo "et-bed-right" ?>">
                                                            <div class="et-bed-outer et-sit-check return" data-seat="<? echo $eachChoNgoi->getMaChoNgoi() ?>" number-seat="<? echo $sum += 1 ?>" data-toa="<? echo $eachToa->getMaToa() ?>" number-toa="<? echo $eachToa->getThuTuToa() ?>" data-diemDen="<? echo $DiemDen ?>" data-xuatPhat="<? echo $xuatPhat ?>" data-tau="<? echo $eachChoNgoi->getMaTau() ?>" data-time="<? echo $eachChoNgoi->getThoiGianKhoiHanh() ?>">
                                                                <div class="et-bed text-center seat <? if ($eachChoNgoi->getTrangThai() == 2) echo $conTrong;
                                                                                                    else echo $daBan ?>">
                                                                    <div class="et-sit-no ng-scope">
                                                                        <span><? echo $sum ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="et-bed-illu"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <div class="et-col-1-18 et-car-floor-full-height"></div>
                                        </div>
                                    </div>
                                <? }
                                // Khoang giường nằm 4 điều hòa
                                elseif ($eachToa->getMaLoaiToa() == "LT003") { ?>
                                    <div id="khoang3" class="et-col-90 khoang return" style="margin-bottom: 30px;" data-code="<? echo $eachToa->getMaToa() ?>">
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
                                                <? $conTrong = "et-sit-avaiable";
                                                $daBan = "et-sit-bought";
                                                $sum = 0 ?>
                                                <? foreach ($eachToa->getChoNgoi() as $eachChoNgoi) : ?>
                                                    <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope">
                                                        <div class="<? if ($sum % 2 == 0) echo "et-bed-left";
                                                                    else echo "et-bed-right" ?>">
                                                            <div class="et-bed-outer et-sit-check return" data-seat="<? echo $eachChoNgoi->getMaChoNgoi() ?>" number-seat="<? echo $sum += 1 ?>" data-toa="<? echo $eachToa->getMaToa() ?>" number-toa="<? echo $eachToa->getThuTuToa() ?>" data-diemDen="<? echo $DiemDen ?>" data-xuatPhat="<? echo $xuatPhat ?>" data-tau="<? echo $eachChoNgoi->getMaTau() ?>" data-time="<? echo $eachChoNgoi->getThoiGianKhoiHanh() ?>">
                                                                <div class="et-bed text-center seat <? if ($eachChoNgoi->getTrangThai() == 2) echo $conTrong;
                                                                                                    else echo $daBan ?>">
                                                                    <div data-popover="Chỗ đã bán" data-popover-title="Chỗ đã bán">
                                                                        <span><? echo $sum ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="et-bed-illu"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <div class="et-col-1-18 et-car-floor-full-height"></div>
                                        </div>
                                    </div>
                            <? }
                            endforeach; ?>
                        </div>
                    <?php endforeach; ?>

                </table>
            </div>
        <?php } ?>

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
        <form class="ticket-pocket" method="post" action="/?page=dienthongtin" ticketType="<? echo $ticket_type ?>">
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
                        <h6 class="ng-binding" style="font-size: 20px"> <strong> Chiều đi </strong></h6>
                        <table class="col-md-12 et-ticket-info ng-scope data-ticket" id="table-oneway" style="border-bottom:1px solid #ccc;">
                            <!-- bắt sự kiện và add thông tin-->
                            <tbody class="tbody">
                                <tr>
                                    <td>
                                        <input type="hidden" name="maChuyenDi" value="<?echo $arrChuyen[0]->getMaChuyenTau()?>">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php if ($ticket_type == "round-trip" && $arrVe[0] != NULL) { ?>
                        <!-- Chiều về (nếu có) -->
                        <div class="col-md-12 text-center chieuVe" style="display: none; padding: 5px !important">
                            <h6 class="ng-binding" style="font-size: 20px; padding-top: 10px"> <strong> Chiều về </strong></h6>
                            <table class="col-md-12 et-ticket-info ng-scope data-ticket" id="table-return" style="border-bottom:1px solid #ccc;">
                                <!-- bắt sự kiện và add thông tin-->
                                <tbody class="tbody">
                                <tr>
                                    <td>
                                        <input type="hidden" name="maChuyenVe" value="<?echo $arrVe[0]->getMaChuyenTau()?>">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Mua vé</button>
            </div>
        </form>

        <!-- Thông tin hành trình -->
        <et-search-pane calculatetrainlist="calculateTrainList" calculatecanshit="calculateCanShift" class="infor-form">
            <div class="col-md-12 et-widget" style="margin-bottom: 5px">
                <div class="row et-widget-header"><span><strong class="ng-binding">THÔNG TIN HÀNH TRÌNH</strong></span></div>
                <form method="post" action="/route.php?&page=ketquatimve">
                    <div class="form-group">
                        <label>Ga đi</label>
                        <select id="ga-di" class="form-control" name="XuatPhat">
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
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ga đến</label>
                        <select id="ga-den" class="form-control" name="DiemDen">
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
                        <label>Thời gian đi</label>
                        <input id="departure-date" type="date" class="form-control" placeholder="dd/mm/yyyy" name="ThoiGianXuatPhat">
                    </div>
                    <div class="form-group">
                        <label>Thời gian quay về</label>
                        <input id="return-date" type="date" class="form-control" placeholder="dd/mm/yyyy" name="ThoiDiemQuayVe">
                    </div>
                    <div class="form-group ">
                        <label>Loại vé</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="ticket_type" value="one-way" checked>
                            <label class="form-check-label right">Một chiều</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="ticket_type" value="round-trip">
                            <label class="form-check-label">Khứ hồi</label>
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
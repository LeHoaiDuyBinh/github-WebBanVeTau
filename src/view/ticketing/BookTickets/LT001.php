<!-- ngoi mem dieu hoa -->
<div id="khoang2" class="et-col-90 khoang oneway" style="margin-bottom: 30px;">
    <div class="et-full-width et-car-loading ng-hide">
        <div class="row text-capitalize text-center"></div>
    </div>
    <div class="row et-car-floor">
        <div class="et-car-door"></div>
        <div class="et-car-nm-64-half-block">

            <div class="et-full-width">
                <? $conTrong = "et-sit-avaiable"; $daBan = "et-sit-bought"; $sum = 0?>
                <? //var_dump($eachToa)?>
                <? foreach ($eachToa->getChoNgoi() as $eachChoNgoi):?>
                        
                <div class="et-car-nm-64-sit ng-isolate-scope">
                    <div class="et-car-seat-left et-seat-h-35">
                        <div class="et-col-16 et-sit-side"></div>
                        <div class="et-col-84 et-sit-sur-outer et-sit-check">
                            <div class="et-sit-sur text-center seat <? if ($eachChoNgoi->getTrangThai()==0) echo $conTrong; else echo $daBan ?>">
                                <div data-popover="Giá: 561,000 VNĐ" data-popover-title="Chỗ trống" class="et-sit-no ng-scope"><span class="ng-binding"><? echo $sum += 1?></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <? 
                if ($sum + 1 == 17 || $sum + 1 == 49) echo "<div class=\"et-car-way et-full-width\"></div>";
                elseif ($sum + 1 == 33) echo "</div></div><div class=\"et-car-seperator\" ng-class=\"{'et-hidden': !seatMap[0].Status}\"><div></div><div></div></div><div class=\"et-car-nm-64-half-block\"><div class=\"et-full-width\">"
                ?>
                <? endforeach; ?>
            </div>
        </div>
        <div class="et-car-door"></div>
    </div>
</div>

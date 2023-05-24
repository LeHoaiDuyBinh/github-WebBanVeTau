<!-- ngoi mem dieu hoa -->
<!-- chieu di -->
<div id="khoang2" class="et-col-90 khoang oneway" style="margin-bottom: 30px;" data-code="<?echo $eachToa->getMaToa();?>">
    <div class="et-full-width et-car-loading ng-hide">
        <div class="row text-capitalize text-center"></div>
    </div>
    <div class="row et-car-floor">
        <div class="et-car-door"></div>
        <div class="et-car-nm-64-half-block">

            <div class="et-full-width">
                <? $conTrong = "et-sit-avaiable"; $daBan = "et-sit-bought"; $sum = 0?>
                <? foreach ($eachToa->getChoNgoi() as $eachChoNgoi):?>
                        <div class="et-car-nm-64-sit ng-isolate-scope">
                            <div class="et-car-seat-left et-seat-h-35">
                                <div class="et-col-16 et-sit-side"></div>
                                <div class="et-col-84 et-sit-sur-outer et-sit-check oneway" data-seat="<?echo $eachChoNgoi->getMaChoNgoi()?>" 
                                number-seat="<? echo $sum += 1?>" data-toa="<?echo $eachToa->getMaToa();?>" number-toa="<?echo $eachToa->getThuTuToa();?>">
                                    <div class="et-sit-sur text-center seat <? if ($eachChoNgoi->getTrangThai()==0) echo $conTrong; else echo $daBan ?>">
                                        <div class="et-sit-no ng-scope"><span><? echo $sum?></span></div>
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

<!-- chieu ve -->
<div id="khoang2" class="et-col-90 khoang return" style="margin-bottom: 30px;" data-code="<?echo $eachToa->getMaToa();?>">
    <div class="et-full-width et-car-loading ng-hide">
        <div class="row text-capitalize text-center"></div>
    </div>
    <div class="row et-car-floor">
        <div class="et-car-door"></div>
        <div class="et-car-nm-64-half-block">

            <div class="et-full-width">
                <? $conTrong = "et-sit-avaiable"; $daBan = "et-sit-bought"; $sum = 0?>
                <? foreach ($eachToa->getChoNgoi() as $eachChoNgoi):?>
                        <div class="et-car-nm-64-sit ng-isolate-scope" data-seat="<?echo $eachChoNgoi->getMaChoNgoi()?>" number-seat="<? echo $sum += 1?>">
                            <div class="et-car-seat-left et-seat-h-35">
                                <div class="et-col-16 et-sit-side"></div>
                                <div class="et-col-84 et-sit-sur-outer et-sit-check return"  data-seat="<?echo $eachChoNgoi->getMaChoNgoi()?>" 
                                number-seat="<? echo $sum += 1?>" data-toa="<?echo $eachToa->getMaToa();?>" number-toa="<?echo $eachToa->getThuTuToa();?>">
                                    <div class="et-sit-sur text-center seat <? if ($eachChoNgoi->getTrangThai()==0) echo $conTrong; else echo $daBan ?>">
                                        <div class="et-sit-no ng-scope"><span><? echo $sum?></span></div>
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
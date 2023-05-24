<!-- khoang 6 dieu hoa -->
<!-- chieu di -->
<div id="khoang1" class="et-col-90 khoang oneway" style="margin-bottom: 30px;" data-code="<?echo $eachToa->getMaToa();?>">
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
            <? $conTrong = "et-sit-avaiable"; $daBan = "et-sit-bought"; $sum = 0?>
            <? foreach ($eachToa->getChoNgoi() as $eachChoNgoi):?>
                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope">
                    <div class="<? if($sum % 2 == 0) echo "et-bed-left"; else echo "et-bed-right"?>">
                        <div class="et-bed-outer et-sit-check oneway" data-seat="<?echo $eachChoNgoi->getMaChoNgoi()?>" 
                                number-seat="<? echo $sum += 1?>" data-toa="<?echo $eachToa->getMaToa();?>" number-toa="<?echo $eachToa->getThuTuToa();?>">
                            <div class="et-bed text-center seat <? if ($eachChoNgoi->getTrangThai()==0) echo $conTrong; else echo $daBan ?>">
                                <div class="et-sit-no ng-scope">
                                    <span><? echo $sum?></span>
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

<!-- chieu ve -->
<div id="khoang1" class="et-col-90 khoang return" style="margin-bottom: 30px;" data-code="<?echo $eachToa->getMaToa();?>">
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
            <? $conTrong = "et-sit-avaiable"; $daBan = "et-sit-bought"; $sum = 0?>
            <? foreach ($eachToa->getChoNgoi() as $eachChoNgoi):?>
                <div class="et-col-1-16 et-seat-h-35 ng-isolate-scope">
                    <div class="<? if($sum % 2 == 0) echo "et-bed-left"; else echo "et-bed-right"?>">
                        <div class="et-bed-outer et-sit-check return" data-seat="<?echo $eachChoNgoi->getMaChoNgoi()?>" 
                                number-seat="<? echo $sum += 1?>" data-toa="<?echo $eachToa->getMaToa();?>" number-toa="<?echo $eachToa->getThuTuToa();?>">
                            <div class="et-bed text-center seat <? if ($eachChoNgoi->getTrangThai()==0) echo $conTrong; else echo $daBan ?>">
                                <div class="et-sit-no ng-scope">
                                    <span ><? echo $sum?></span>
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
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
$this->addExternalJS("/bitrix/templates/sp07restail/js/filter.js");
?>
<!-- 
                            <div class="widget widget-filters">
                            <div class="widget-filters__item filter__size">
                                <div class="filter__top">Размер</div>
                                <ul class="filter__list">
                                    <li><a href="#">120 см (2)</a></li>
                                    <li class="filter__active"><a href="#">130 см (3)</a></li>
                                    <li><a href="#">140 см (2)</a></li>
                                    <li><a href="#">150 см (5)</a></li>
                                    <li><a href="#">160 см (5)</a></li>
                                </ul>
                                <ul class="filter__list filter__list2 list-hidden">
                                    <li><a href="#">120 см (2)</a></li>
                                    <li><a href="#">130 см (3)</a></li>
                                    <li><a href="#">140 см (2)</a></li>
                                    <li><a href="#">150 см (5)</a></li>
                                    <li><a href="#">160 см (5)</a></li>
                                </ul>
                                <div class="link-show-more collapsed">
                                    <a href="#" data-target=".filter__list2">
                                        Показать еще
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="widget-filters__item filter__age">
                                <div class="filter__top">Возраст</div>
                                <ul class="filter__list">
                                    <li><a href="#">Детские (13)</a></li>
                                    <li><a href="#">Взрослые (7)</a></li>
                                </ul>
                            </div>
                            <div class="widget-filters__item filter__discont">
                                <a class="btn filter__active" href="#">Товары со скидкой (7)</a>
                            </div>
                        </div>
                         -->
<div class="widget widget-filters">
		<form name="<?=$arResult["FILTER_NAME"]."_form"?>" action="<?=$arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
			<?foreach($arResult["HIDDEN"] as $arItem):?>
				<input type="hidden" name="<?=$arItem["CONTROL_NAME"]?>" id="<?=$arItem["CONTROL_ID"]?>" value="<?=$arItem["HTML_VALUE"]?>" />
			<?endforeach;?>
			<?foreach($arResult["ITEMS"] as $arItem):?>

				<?if(empty($arItem["VALUES"])) continue;?>
				<div class="filter-col">
					<?if($arItem["PRICE"]):?>
						<div class="widget-filters__item filter__size">Стоимость:</div>
						<div class="price-filter">
							<input type="text" name="<?=$arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>" id="<?=$arItem["VALUES"]["MIN"]["CONTROL_ID"]?>" value="<?=$arItem["VALUES"]["MIN"]["HTML_VALUE"]?>" size="5" placeholder="От">
							<input type="text" name="<?=$arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>" id="<?=$arItem["VALUES"]["MAX"]["CONTROL_ID"]?>" value="<?=$arItem["VALUES"]["MAX"]["HTML_VALUE"]?>" size="5" placeholder="До">
							<span class="rub">Руб.</span>
						</div>
					<?endif;?>
				</div>
			<?endforeach;?>
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?if(empty($arItem["VALUES"])) continue;?>
				<div class="filter-col">
					<?if(!$arItem["PRICE"]):?>
						<div class="widget-filters__item">
						<div class="filter__top"><?=$arItem["NAME"]?>:</div>
						<ul class="filter__list">
						<!-- <div class="select-size-product filter">
							<div> -->
								<? $i=0; ?>
								<?foreach($arItem["VALUES"] as $arValue):?>
									<li<?if($arValue["CHECKED"]) echo ' class="filter__active"';?>>
									<?if (isset($arValue['FILE']) && isset($arValue['FILE']['SRC'])):?>
										<img width="50px" src="<?=$arValue['FILE']['SRC']?>" alt="<?=$arValue["VALUE"]?>" title="<?=$arValue["VALUE"]?>">
									<?endif;?>
									<label id="<?=$arValue["CONTROL_NAME"]?>"><?=$arValue["VALUE"]?>
									<input type="checkbox" style="display: none;" name="<?=$arValue["CONTROL_NAME"]?>" value="Y"<?if($arValue["CHECKED"]) echo " checked";?>></label>
									</li>
									<? if (++$i==5):?>
										</ul><ul class="filter__list filter__list2 list-hidden"?>
									<?endif;?>
								<?endforeach;?>
						<!-- 	</div>
						</div> -->
						</ul>
						<? if ($i>5):?>
							<div class="link-show-more collapsed">
                                <a href="#" data-target=".filter__list2">
                                    Показать еще
                                    <i class="fa fa-angle-down"></i>
                                </a>
                            </div>
						<?endif;?>
						</div>
					<?endif;?>
				</div>
			<?endforeach;?>
			<div class="buttons-filter">
				<input type="hidden" class="save" name="set_filter" value="Показать">
				<!-- <input type="submit" class="reset" name="del_filter" value="Сбросить"> -->
			</div>
		</form>
</div>
<div class="link-propose">
    <a class="btn" href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal_callback">Нет нужного товара?</a>
</div>
<!--<div class="widget widget-discont">
    <a href=""><img src="/bitrix/templates/sp07restail/demo/discont.png" alt=""></a>
</div>
<div class="widget widget-delivary">
    <div class="widget-delivary__inner">
        <b>Доставим бесплатно</b> в указанное место, при покупке на сумму <br> от 5000 р.
    </div>
</div>-->
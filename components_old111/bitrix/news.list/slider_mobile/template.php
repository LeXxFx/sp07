<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div id="owl-demo" class="owl-carousel owl-theme show-mobile slider-main-mobile">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<div class="col-slide-hidden item">
		<div class="col-slide-hidden-img">
			<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>">
		</div>
		<div class="col-slide-hidden-text">
			<?if($arItem["PROPERTIES"]["SALE"]["VALUE"]):?><span class="skidka-sl"><?=$arItem["PROPERTIES"]["SALE"]["VALUE"]?></span><?endif;?>
			<?if($arItem["PROPERTIES"]["NAME"]["VALUE"]):?><span class="name-sl"><?=$arItem["PROPERTIES"]["NAME"]["~VALUE"]?><span><?=$arItem["PROPERTIES"]["TEXT"]["VALUE"]?></span></span><?endif;?>
			<?if($arItem["PROPERTIES"]["LINK"]["VALUE"]):?><a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>">Подробнее</a><?endif;?>
		</div>
	</div>
	<?endforeach;?>
</div>
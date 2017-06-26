<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="owl-carousel">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<div class="col-slide">
		<?if($arItem["PROPERTIES"]["LINK"]["VALUE"]):?><a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>"><?endif;?>
		<div class="slide-ins">
			<div class="info-slide">
				<?if($arItem["PROPERTIES"]["SALE"]["VALUE"]):?><span class="proc-slide"><?=$arItem["PROPERTIES"]["SALE"]["VALUE"]?></span><?endif;?>
				<?if($arItem["PROPERTIES"]["NAME"]["VALUE"]):?><div class="title"><?=$arItem["PROPERTIES"]["NAME"]["~VALUE"]["TEXT"]?></div><?endif;?>
				<?if($arItem["PROPERTIES"]["TEXT"]["VALUE"]):?><div class="desc"><?=$arItem["PROPERTIES"]["TEXT"]["~VALUE"]["TEXT"]?></div><?endif;?>
			</div>
		</div>		
		<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" class="img-center">		
		<?if($arItem["PROPERTIES"]["LINK"]["VALUE"]):?></a><?endif;?>
	</div>
	<?endforeach;?>
</div>
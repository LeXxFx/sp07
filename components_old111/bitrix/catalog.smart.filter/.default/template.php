<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="filter-catalog">
	<p class="title-filter"><span>Фильтр</span></p>
	<div class="main-filter<?if($_GET["set_filter"] == "Показать") echo " active";?>">
		<form name="<?=$arResult["FILTER_NAME"]."_form"?>" action="<?=$arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
			<?foreach($arResult["HIDDEN"] as $arItem):?>
				<input type="hidden" name="<?=$arItem["CONTROL_NAME"]?>" id="<?=$arItem["CONTROL_ID"]?>" value="<?=$arItem["HTML_VALUE"]?>" />
			<?endforeach;?>
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?if(empty($arItem["VALUES"])) continue;?>
				<div class="filter-col">
					<?if($arItem["PRICE"]):?>
						<p class="title">Стоимость:</p>
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
						<p class="title"><?=$arItem["NAME"]?>:</p>
						<div class="select-size-product filter">
							<div>
								<?foreach($arItem["VALUES"] as $arValue):?>
								<span id="<?=$arValue["CONTROL_NAME"]?>"<?if($arValue["CHECKED"]) echo ' class="active"';?>><?=$arValue["VALUE"]?></span>
								<input type="checkbox" name="<?=$arValue["CONTROL_NAME"]?>" value="Y"<?if($arValue["CHECKED"]) echo " checked";?>>
								<?endforeach;?>
							</div>
						</div>
					<?endif;?>
				</div>
			<?endforeach;?>
			<div class="buttons-filter">
				<input type="submit" class="save" name="set_filter" value="Показать">
				<input type="submit" class="reset" name="del_filter" value="Сбросить">
			</div>
		</form>
	</div>
</div>
<pre><?//print_r($arResult);?></pre>
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?foreach($arResult["ITEMS"] as $arItem):?>
<?
//echo "<pre>";
//print_r($arItem);
//echo "</pre>";
?>
<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
?>
<div class="product-day" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
	<p class="title"><span>товар дня</span></p>
	<?
		if($arItem['DETAIL_PICTURE'])
			$main_image = CFile::ResizeImageGet($arItem['DETAIL_PICTURE'], array('width' => 181, 'height' => 181), BX_RESIZE_IMAGE_EXACT);
		else
			$main_image["src"] = "/bitrix/templates/sport07/images/no_photo.png";
	?>
	<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$main_image["src"]?>" alt="<?=$arItem["NAME"]?>" class="img-product-day"></a>
	<span class="title-counter">До конца акции осталось:</span>
	<div id="countbox" class="counter-main"></div>
	<div class="full-clock">
		<span>Часы</span>
		<span>Минут</span>
		<span>Секунды</span>
	</div>
	<div class="bottom-product-day">
		<?$APPLICATION->IncludeComponent(
					"bitrix:iblock.vote",
					"stars",
					array(
						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
						"ELEMENT_ID" => $arItem['ID'],
						"ELEMENT_CODE" => "",
						"MAX_VOTE" => "5",
						"VOTE_NAMES" => array("1", "2", "3", "4", "5"),
						"SET_STATUS_404" => "N",
						"DISPLAY_AS_RATING" => $arParams['VOTE_DISPLAY_AS_RATING'],
						"CACHE_TYPE" => $arParams['CACHE_TYPE'],
						"CACHE_TIME" => $arParams['CACHE_TIME']
					),
					$component,
					array("HIDE_ICONS" => "Y")
				);?>
		<p class="title-product-day"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></p>
		<div class="price-block" id="price-<?=$arItem["ID"]?>">
			<?if($arItem["OFFERS"][0]["PRICES"]):?>
			<?foreach($arItem["OFFERS"][0]["PRICES"] as $arPrice):?>
				<?if($arPrice["DISCOUNT_DIFF"]):?>
					<span class="price"><?=$arPrice["PRINT_DISCOUNT_VALUE"];?></span>
					<span class="old-price"><?=$arPrice["PRINT_VALUE"];?></span>
				<?else:?>
					<span class="price"><?=$arPrice["PRINT_VALUE"];?></span>
				<?endif;?>
			<?endforeach;?>
			<?else:?>
				<?if($arItem["PRICES"]):?>
					<span class="price"><?=$arItem["PRICES"]["Для сайта (САЙТ цена)"]["PRINT_DISCOUNT_VALUE"];?></span>
					<span class="old-price"><?=$arItem["PRICES"]["Для сайта (САЙТ цена)"]["PRINT_VALUE"];?></span>
				<?else:?>
					<span class="price"><?=$arItem["PRICES"]["Для сайта (САЙТ цена)"]["PRINT_VALUE"];?></span>
				<?endif;?>
			<?endif;?>
		</div>
		<div class="amount">
			<span class="minus"></span>
			<span class="num-amount" data-amount="1"><b>1</b><b> Шт.</b></span>
			<span class="plus"></span>
		</div>
		<a href="#" class="buy-product-day addtobasket" data-amount="1" data-price-id="<?=$arItem["OFFERS"][0]["CATALOG_PRICE_ID_2"]?>">Успей купить</a>
	</div>
</div>
<?$date = date_parse($arItem["PROPERTIES"]["DATE_TO_OFFER"]["VALUE"]);?>
<script type="text/javascript">
	dateFuture = new Date(<?=$date["year"]?>, <?=$date["month"]?>, <?=$date["day"]?>, <?=$date["hour"]?>, <?=$date["minute"]?>, <?=$date["second"]?>);
	function CountBox() {
		dateNow = new Date;
		amount = dateFuture.getTime() - dateNow.getTime();
		delete dateNow;
		if (amount < 0) {
			out = "<div class='countbox-space'></div>" + "<div class='countbox-num'><div id='countbox-hours1'><span></span>0</div><div id='countbox-hours2'><span></span>0</div><div id='countbox-hours-text'></div></div>" + "<div class='countbox-space'></div>" + "<div class='countbox-num'><div id='countbox-mins1'><span></span>0</div><div id='countbox-mins2'><span></span>0</div><div id='countbox-mins-text'></div></div>" + "<div class='countbox-space'></div>" + "<div class='countbox-num'><div id='countbox-secs1'><span></span>0</div><div id='countbox-secs2'><span></span>0</div><div id='countbox-secs-text'></div></div>";
			document.getElementById("countbox").innerHTML = out
		} else {
			days = 0;
			days1 = 0;
			days2 = 0;
			hours = 0;
			hours1 = 0;
			hours2 = 0;
			mins = 0;
			mins1 = 0;
			mins2 = 0;
			secs = 0;
			secs1 = 0;
			secs2 = 0;
			out = "";
			amount = Math.floor(amount / 1e3);
			days = Math.floor(amount / 86400);
			days1 = (days >= 10) ? days.toString().charAt(0) : '0';
			days2 = (days >= 10) ? days.toString().charAt(1) : days.toString().charAt(0);
			amount = amount % 86400;
			hours = Math.floor(amount / 3600);
			hours1 = (hours >= 10) ? hours.toString().charAt(0) : '0';
			hours2 = (hours >= 10) ? hours.toString().charAt(1) : hours.toString().charAt(0);
			amount = amount % 3600;
			mins = Math.floor(amount / 60);
			mins1 = (mins >= 10) ? mins.toString().charAt(0) : '0';
			mins2 = (mins >= 10) ? mins.toString().charAt(1) : mins.toString().charAt(0);
			amount = amount % 60;
			secs = Math.floor(amount);
			secs1 = (secs >= 10) ? secs.toString().charAt(0) : '0';
			secs2 = (secs >= 10) ? secs.toString().charAt(1) : secs.toString().charAt(0);
			out = "<div class='countbox-num'><div id='countbox-hours1'><span></span>" + hours1 + "</div><div id='countbox-hours2'><span></span>" + hours2 + "</div><div id='countbox-hours-text'></div></div>" + "<div class='countbox-space'></div>" + "<div class='countbox-num'><div id='countbox-mins1'><span></span>" + mins1 + "</div><div id='countbox-mins2'><span></span>" + mins2 + "</div><div id='countbox-mins-text'></div></div>" + "<div class='countbox-space'></div>" + "<div class='countbox-num'><div id='countbox-secs1'><span></span>" + secs1 + "</div><div id='countbox-secs2'><span></span>" + secs2 + "</div><div id='countbox-secs-text'></div></div>";
			document.getElementById("countbox").innerHTML = out;
			setTimeout("CountBox()", 1e3)
		}
	}
	window.onload = function () {
		CountBox();
	}
</script>
<?endforeach;?>
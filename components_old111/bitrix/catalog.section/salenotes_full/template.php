<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(false);
?>
<script type="text/javascript">
    rrApiOnReady.push(function() {
  try { rrApi.categoryView(
<?=$arResult["ID"]?>
); } catch(e) {}
 })
</script>
	<div class="products">
		<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="col-product" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="col-product-ins">
				<?if($arItem["PROPERTIES"]["M_NEW"]["VALUE"]):?><span class="marker-new"></span><?endif;?>
				<?if($arItem["PROPERTIES"]["M_SALE"]["VALUE"]):?><span class="marker-action"></span><?endif;?>
				<?if($arItem["PROPERTIES"]["M_PERCENT"]["VALUE"]):?><span class="marker-sale"></span><?endif;?>
				<?if($arItem["PROPERTIES"]["M_HIT"]["VALUE"]):?><span class="marker-hit"></span><?endif;?>
				<?
					$offer_image_id = null;
					foreach($arItem['OFFERS'] as $arOffer) {
						foreach($arItem['SKU_PROPS'] as $arProp) {
							if($arOffer["DISPLAY_PROPERTIES"][$arProp["CODE"]]["VALUE"] == current($arProp['VALUES'])["XML_ID"]) {
								$offer_image_id = $arOffer["DETAIL_PICTURE"];
								break;
							}
						}
					}
					if($offer_image_id)
						$main_image = CFile::ResizeImageGet($offer_image_id, array('width' => 192, 'height' => 191), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
					elseif($arItem['DETAIL_PICTURE'])
						$main_image = CFile::ResizeImageGet($arItem['DETAIL_PICTURE'], array('width' => 192, 'height' => 191), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
					else
						$main_image["src"] = "/bitrix/templates/sport07/images/no_photo.png";
				?>
				<div class="img-product"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$main_image["src"]?>" alt="<?=$arItem["NAME"]?>" class="section-item-image"></a></div>
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
				<h2><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></h2>
				<div class="price-block" id="price-<?=$arItem["ID"]?>">
					<?foreach($arItem["OFFERS"][0]["PRICES"] as $arPrice):?>
						<?if($arPrice["DISCOUNT_DIFF"]):?>
							<span class="price"><?=$arPrice["PRINT_DISCOUNT_VALUE"];?></span>
							<span class="old-price"><?=$arPrice["PRINT_VALUE"];?></span>
						<?else:?>
							<span class="price"><?=$arPrice["PRINT_VALUE"];?></span>
						<?endif;?>
					<?endforeach;?>
				</div>
				<div class="buy-block">
					<div class="amount">
						<span class="minus"></span>
						<span class="num-amount" data-amount="1"><b>1</b><b> Шт.</b></span>
						<span class="plus"></span>
					</div>
					<span class="buy-product addtobasket js_buy_btn" data-amount="1" data-id="<?=$arItem["ID"]?>" data-price-id="<?=$arItem["OFFERS"][0]["CATALOG_PRICE_ID_2"]?>" onmousedown="try { rrApi.addToBasket(<?=$arItem['ID']?>) } catch(e) {}">Купить</span>
				</div>
				<div class="cover-buy">
					<span class="del-buy"></span>
					<p><?=$arItem["NAME"]?> в корзине в кол. <span>1</span> шт</p>
					<span class="buy-more">Купить еще</span>
				</div>
				<div class="size-mini-card sku_props">
					<?foreach($arItem['SKU_PROPS'] as $arProp):?>
						<div class="sku_prop" data-element-id="<?=$arItem["ID"]?>" data-prop-id="<?=$arProp["ID"]?>" data-prop-code="<?=$arProp["CODE"]?>">
							<div class="sku_prop_name"><?=$arProp["NAME"]?>:</div>
							<div class="sku_prop_values">
								<?$i = 0;?>
								<?foreach($arProp['VALUES'] as $arOneValue):?>
									<?$i++;?>
									<div class="sku_prop_value<?if($i == 1) echo " active";?>" data-value-id="<?=$arOneValue["XML_ID"]?>" data-value="<?=$arOneValue["NAME"]?>"><?if($arOneValue["PICT"]):?><img src="<?=$arOneValue["PICT"]["SRC"]?>" alt="<?=$arOneValue["NAME"]?>"><?else:?><span><?=$arOneValue["NAME"]?></span><?endif;?></div>
								<?endforeach;?>
							</div>
						</div>
					<?endforeach;?>
				</div>
			</div>
		</div>
		<?endforeach;?>
	</div>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"] == "Y") echo $arResult["NAV_STRING"];?>
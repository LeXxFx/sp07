<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<table>
	<thead>
		<tr>
			<td>Товар</td>
			<td>Цена</td>
			<td>Кол.</td>
			<td>Сумма</td>
		</tr>
	</thead>
	<tbody>
		<?foreach($arResult["BASKET_ITEMS"] as $arItem):?>
			<?$mxResult = CCatalogSku::GetProductInfo($arItem["PRODUCT_ID"]);?>
			<?
				$arSelect = Array("DETAIL_PICTURE");
				$arFilter = Array("ID" => intval($mxResult["ID"]));
				$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
				while($ob = $res->GetNextElement()) {
					$arFields = $ob->GetFields();
				}
			?>
			<tr>
				<td>
					<div class="table-tovar">
						<?if($arFields['DETAIL_PICTURE']):?>
							<?$file = CFile::ResizeImageGet($arFields['DETAIL_PICTURE'], array('width' => 84, 'height' => 84), BX_RESIZE_IMAGE_EXACT);?>
							<img src="<?=$file["src"]?>" class="img-table-tovar" alt="<?=$arItem["NAME"]?>">
						<?endif;?>
						<div class="table-tovar-text">
							<?$APPLICATION->IncludeComponent(
								"bitrix:iblock.vote",
								"stars",
								array(
									"IBLOCK_ID" => "9",
									"ELEMENT_ID" => intval($mxResult["ID"]),
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
							<h4><?=$arItem["NAME"]?></h4>
							<?foreach($arItem["PROPS"] as $arProp):?>
								<p class="size-table"><?=$arProp["NAME"]?>: <span><?=$arProp["VALUE"]?></span></p>
							<?endforeach;?>
						</div>
					</div>
				</td>
				<td class="price-t"><?=$arItem["PRICE_FORMATED"]?></td>
				<td class="kol-t"><?=$arItem["QUANTITY"]?> шт.</td>
				<td class="price-t"><?=$arItem["SUM"]?></td>
			</tr>
		<?endforeach;?>
	</tbody>
</table>
<div class="bottom-order-table">
	<div class="bottom-order-right">
		<?
			if(doubleval($arResult["DISCOUNT_PRICE"]) > 0) {
				?><p>Скидка<?if (strLen($arResult["DISCOUNT_PERCENT_FORMATED"])>0):?> (<?=$arResult["DISCOUNT_PERCENT_FORMATED"];?>)<?endif;?>: <?=$arResult["DISCOUNT_PRICE_FORMATED"]?></p><?
			}
			if(doubleval($arResult["DELIVERY_PRICE"]) > 0) {
				?><p>Доставка: <?=$arResult["DELIVERY_PRICE_FORMATED"]?></p><?
			}
			if(strlen($arResult["PAYED_FROM_ACCOUNT_FORMATED"]) > 0) {
				?><p>Итого: <?=$arResult["ORDER_TOTAL_PRICE_FORMATED"]?></p><p>Оплачено: <?=$arResult["PAYED_FROM_ACCOUNT_FORMATED"]?></p><p>Осталось оплатить: <?=$arResult["ORDER_TOTAL_LEFT_TO_PAY_FORMATED"]?></p><?
			} else {
				?><p>Итого: <?=$arResult["ORDER_TOTAL_PRICE_FORMATED"]?></p><?
			}
		?>
	</div>
</div>
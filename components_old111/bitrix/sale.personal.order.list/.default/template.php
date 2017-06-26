<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<ul class="ac accordion">
	<?foreach($arResult["ORDERS"] as $arOrder):?>
	<?
		$res = CSaleOrderPropsValue::GetList(array(), array("ORDER_ID" => intval($arOrder["ORDER"]["ID"]), "CODE" => "ADDRESS"), false, false, array());
		$arVals = $res->Fetch();
	?>
	<li>
		<h3>
			<span class="num-order">№<?=$arOrder["ORDER"]["ACCOUNT_NUMBER"]?></span>
			<span class="date-order"><?=$arOrder["ORDER"]["DATE_INSERT_FORMATED"];?></span>
			<?if($arOrder["ORDER"]["STATUS_ID"] == "N"):?><span class="status-order vputi">Не оплачен</span><?endif;?>
			<?if($arOrder["ORDER"]["STATUS_ID"] == "P"):?><span class="status-order vputi">В пути</span><?endif;?>
			<?if($arOrder["ORDER"]["STATUS_ID"] == "F"):?><span class="status-order dostavlen">Доставлен</span><?endif;?>
			<?if($arOrder["ORDER"]["STATUS_ID"] == "PSEUDO_CANCELLED"):?><span class="status-order otmena">Отменен</span><?endif;?>
			<span class="sklad-order">
				<span>Склад:</span>
				<?//=$arVals["VALUE"];?>
			</span>
		</h3>
		<div class="panel">
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
					<?foreach($arOrder["BASKET_ITEMS"] as $arItem):?>
					<tr>
						<td>
							<div class="table-tovar">
								<?
CModule::IncludeModule('iblock');
									$arSelect = Array("ID", "DETAIL_PICTURE", "PROPERTY_CML2_LINK");
									$arFilter = Array("IBLOCK_ID" => 10, "ID" => $arItem["PRODUCT_ID"]);
									$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
									while($ob = $res->GetNextElement()) {
										$arFields = $ob->GetFields();
/*echo "<pre>";
print_r($arItem);
										echo "</pre>";*/
									}    
									       
									if(empty($arFields['DETAIL_PICTURE'])&& empty($arFields['PREVIEW_PICTURE'])):
										$arSelect = Array("ID", "DETAIL_PICTURE", "PREVIEW_PICTURE");
										$arFilter = Array("IBLOCK_ID" => 9, "ID" => $arFields['PROPERTY_CML2_LINK_VALUE']);
										$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
										while($MainProductField = $res->Fetch()) {
											$arMainProduct[] = $MainProductField;     
										}
									    $picture_cart = !empty($arMainProduct['0']['DETAIL_PICTURE'])?$arMainProduct['0']['DETAIL_PICTURE']:$arMainProduct['0']['PREVIEW_PICTURE'];
									    unset($arMainProduct);
									else:
									    $picture_cart = empty($arFields['DETAIL_PICTURE'])?$arFields['DETAIL_PICTURE']:$arFields['PREVIEW_PICTURE'];
									endif;
									  
									$file = CFile::ResizeImageGet($picture_cart, array('width' => 84, 'height' => 84), BX_RESIZE_IMAGE_EXACT);
								 
								?>
								<img src="<?=$file["src"]?>" class="img-table-tovar" alt="<?=$arItem["NAME"]?>">
								<div class="table-tovar-text">
									<?$APPLICATION->IncludeComponent(
										"bitrix:iblock.vote",
										"stars",
										array(
											"IBLOCK_ID" => "9",
											"ELEMENT_ID" => $arItem['PRODUCT_ID'],
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
										<span class="size-basket"><?=$arProp["NAME"]?>: <span><?=$arProp["VALUE"]?></span></span>
									<?endforeach;?>
								</div>
								<div class="show-mobile other-pr">
									<div class="col-other-pr">
										<span>Цена</span>
										<p><?=CurrencyFormat($arItem["PRICE"], "RUB");?></p>
									</div>
									<div class="col-other-pr">
										<span>Кол.</span>
										<p><?=$arItem["QUANTITY"]?> шт.</p>
									</div>
									<div class="col-other-pr">
										<span>Сумма</span>
										<p><?=CurrencyFormat(floatval($arItem["PRICE"]) * intval($arItem["QUANTITY"]), "RUB");?></p>
									</div>
								</div>
							</div>
						</td>
						<td class="price-t">
							<?=CurrencyFormat($arItem["PRICE"], "RUB");?>
						</td>
						<td class="kol-t">
							<?=$arItem["QUANTITY"]?> шт.
						</td>
						<td class="price-t">
							<?=CurrencyFormat(floatval($arItem["PRICE"]) * intval($arItem["QUANTITY"]), "RUB");?>
						</td>
					</tr>
					<?endforeach;?>
				</tbody>
			</table>
			<div class="bottom-order-table">
				<div class="bottom-order-left">
					<p><span>Адрес:</span> <?=$arVals["VALUE"];?></p>
					<p><span>Способ оплаты:</span> <?=$arOrder["PAYMENT"][0]["PAY_SYSTEM_NAME"]?></p>
					<p><span>Комментарий к заказу:</span> <?if($arOrder["ORDER"]["COMMENTS"]):?><?=$arOrder["ORDER"]["COMMENTS"]?><?else:?>-<?endif;?></p>
				</div>
				<div class="bottom-order-right">
					<p>Итого: <?=$arOrder["ORDER"]["FORMATED_PRICE"]?></p>
				</div>
			</div>
		</div>
	</li>
	<?endforeach;?>
</ul>
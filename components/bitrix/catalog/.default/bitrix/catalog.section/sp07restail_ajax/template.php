<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>


<?
if (!empty($arResult['ITEMS']))
{?>
<?
	$templateLibrary = array('popup');
	$currencyList = '';
	if (!empty($arResult['CURRENCIES']))
	{
		$templateLibrary[] = 'currency';
		$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
	}
	$templateData = array(
		'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css',
		'TEMPLATE_CLASS' => 'bx_'.$arParams['TEMPLATE_THEME'],
		'TEMPLATE_LIBRARY' => $templateLibrary,
		'CURRENCIES' => $currencyList
	);
	unset($currencyList, $templateLibrary);

	$skuTemplate = array();
	if (!empty($arResult['SKU_PROPS']))
	{
		foreach ($arResult['SKU_PROPS'] as $arProp)
		{
			$propId = $arProp['ID'];
			$skuTemplate[$propId] = array(
				'SCROLL' => array(
					'START' => '',
					'FINISH' => '',
				),
				'FULL' => array(
					'START' => '',
					'FINISH' => '',
				),
				'ITEMS' => array()
			);

			$templateRow = '';
			if ('TEXT' == $arProp['SHOW_MODE'])
			{
				$skuTemplate[$propId]['SCROLL']['START'] = '<div class="prop prop-size sku_prop clearfix" data-element-id="#ELEMENT_ID#" data-prop-id="'.$arProp['ID'].'" data-prop-code="'.$arProp["CODE"].'"><div class="name">'.htmlspecialcharsex($arProp['NAME']).': </div><div class="values">';
				$skuTemplate[$propId]['SCROLL']['FINISH'] = '</div></div>';

				$skuTemplate[$propId]['FULL']['START'] = '<div class="prop prop-size sku_prop clearfix" data-element-id="#ELEMENT_ID#" data-prop-id="'.$arProp['ID'].'" data-prop-code="'.$arProp["CODE"].'"><div class="name">'.htmlspecialcharsex($arProp['NAME']).': </div><div class="values">';
				$skuTemplate[$propId]['FULL']['FINISH'] = '</div></div>';				

				// $skuTemplate[$propId]['FULL']['START'] = '<div class="bx_item_detail_size" id="#ITEM#_prop_'.$propId.'_cont">'.
				// 	'<span class="bx_item_section_name_gray">'.htmlspecialcharsbx($arProp['NAME']).'</span>'.
				// 	'<div class="bx_size_scroller_container"><div class="bx_size"><ul id="#ITEM#_prop_'.$propId.'_list" style="width: #WIDTH#;">';;
				// $skuTemplate[$propId]['FULL']['FINISH'] = '</ul></div>'.
				// 	'<div class="bx_slide_left" id="#ITEM#_prop_'.$propId.'_left" data-treevalue="'.$propId.'" style="display: none;"></div>'.
				// 	'<div class="bx_slide_right" id="#ITEM#_prop_'.$propId.'_right" data-treevalue="'.$propId.'" style="display: none;"></div>'.
				// 	'</div></div>';
				foreach ($arProp['VALUES'] as $arOneValue)
				{

                    $curOffer = '';
                    foreach($arResult["ITEMS"] as $its){
                        foreach($its["OFFERS"] as $offer)
                        {
                            if($offer["PROPERTIES"][$arProp["CODE"]]["VALUE"] == $arOneValue['XML_ID']){
                                $curOffer = $offer;
                            }
                        }

                    }


					$arOneValue['NAME'] = htmlspecialcharsbx($arOneValue['NAME']);
					//$skuTemplate[$propId]['ITEMS'][$value['ID']] = '<li data-treevalue="'.$propId.'_'.$value['ID'].'" data-onevalue="'.$value['ID'].'" style="width: #WIDTH#;" title="'.$value['NAME'].'"><i></i><span class="cnt">'.$value['NAME'].'</span></li>';
					$skuTemplate[$propId]['ITEMS'][$arOneValue['ID']] = '<div class="value sku_prop_value" data-price-id="'.$curOffer["CATALOG_PRICE_ID_2"].'" data-prop-maxcount="#MAX_QUANTITY#" data-value="'.$arOneValue["NAME"].'" data-value-id="'.$arOneValue['XML_ID'].'" data-treevalue="'.$arProp['ID'].'_'.$arOneValue['ID'].'" data-onevalue="'.$arOneValue['ID'].'"><span>'.$arOneValue['NAME'].'</span></div>';

				}
				unset($value);
			}
			elseif ('PICT' == $arProp['SHOW_MODE'])
			{
				$skuTemplate[$propId]['SCROLL']['START'] = '<div class="prop prop-color sku_prop clearfix" data-element-id="#ELEMENT_ID#" data-prop-id="'.$arProp['ID'].'" data-prop-code="'.$arProp["CODE"].'"><div class="name">'.htmlspecialcharsex($arProp['NAME']).': </div><div class="values">';
				$skuTemplate[$propId]['SCROLL']['FINISH'] = '</div></div>';
				$skuTemplate[$propId]['FULL']['START'] = '<div class="prop prop-color sku_prop clearfix" data-element-id="#ELEMENT_ID#" data-prop-id="'.$arProp['ID'].'" data-prop-code="'.$arProp["CODE"].'"><div class="name">'.htmlspecialcharsex($arProp['NAME']).': </div><div class="values">';
				$skuTemplate[$propId]['FULL']['FINISH'] = '</div></div>';				

				foreach ($arProp['VALUES'] as $arOneValue)
				{
                    $curOffer = '';
                    foreach($arResult["ITEMS"] as $its){
                        foreach($its["OFFERS"] as $offer)
                        {
                            if($offer["PROPERTIES"][$arProp["CODE"]]["VALUE"] == $arOneValue['XML_ID']){
                                $curOffer = $offer;
                            }
                        }

                    }


					$arOneValue['NAME'] = htmlspecialcharsbx($arOneValue['NAME']);
					$skuTemplate[$propId]['ITEMS'][$arOneValue['ID']] = '<div class="value sku_prop_value" data-price-id="'.$curOffer["CATALOG_PRICE_ID_2"].'" data-prop-maxcount="#MAX_QUANTITY#" data-value="'.$arOneValue["NAME"].'" data-value-id="'.$arOneValue['XML_ID'].'" data-treevalue="'.$arOneValue['ID'].'" data-onevalue="'.$arOneValue['ID'].'" style="height: 40px;"><img width="40px" src="'.$arOneValue['PICT']['SRC'].'" alt="'.$arOneValue["NAME"].'" title="'.$arOneValue["NAME"].'" /></div>';
				}
				unset($value);
			}
		}
		unset($templateRow, $arProp);
	}

	if ($arParams["DISPLAY_TOP_PAGER"])
	{
		?><? echo $arResult["NAV_STRING"]; ?><?
	}

	$strElementEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT");
	$strElementDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE");
	$arElementDeleteParams = array("CONFIRM" => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

?>
<div class="bx_catalog_list_home col<? echo $arParams['LINE_ELEMENT_COUNT']; ?> <? echo $templateData['TEMPLATE_CLASS']; ?>">
<div class="product-grid clearfix">
	<?
foreach ($arResult['ITEMS'] as $key => $arItem)
{

	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
	$strMainID = $this->GetEditAreaId($arItem['ID']);

	$arItemIDs = array(
		'ID' => $strMainID,
		'PICT' => $strMainID.'_pict',
		'SECOND_PICT' => $strMainID.'_secondpict',
		'STICKER_ID' => $strMainID.'_sticker',
		'SECOND_STICKER_ID' => $strMainID.'_secondsticker',
		'QUANTITY' => $strMainID.'_quantity',
		'QUANTITY_DOWN' => $strMainID.'_quant_down',
		'QUANTITY_UP' => $strMainID.'_quant_up',
		'QUANTITY_MEASURE' => $strMainID.'_quant_measure',
		'BUY_LINK' => $strMainID.'_buy_link',
		'BASKET_ACTIONS' => $strMainID.'_basket_actions',
		'NOT_AVAILABLE_MESS' => $strMainID.'_not_avail',
		'SUBSCRIBE_LINK' => $strMainID.'_subscribe',
		'COMPARE_LINK' => $strMainID.'_compare_link',

		'PRICE' => $strMainID.'_price',
		'DSC_PERC' => $strMainID.'_dsc_perc',
		'SECOND_DSC_PERC' => $strMainID.'_second_dsc_perc',
		'PROP_DIV' => $strMainID.'_sku_tree',
		'PROP' => $strMainID.'_prop_',
		'DISPLAY_PROP_DIV' => $strMainID.'_sku_prop',
		'BASKET_PROP_DIV' => $strMainID.'_basket_prop',
	);

	$strObName = 'ob'.preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);

	$productTitle = (
		isset($arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])&& $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'] != ''
		? $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
		: $arItem['NAME']
	);
	$imgTitle = (
		isset($arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']) && $arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE'] != ''
		? $arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']
		: $arItem['NAME']
	);

	$minPrice = false;
	if (isset($arItem['MIN_PRICE']) || isset($arItem['RATIO_PRICE']))
		$minPrice = (isset($arItem['RATIO_PRICE']) ? $arItem['RATIO_PRICE'] : $arItem['MIN_PRICE']);

	?>
	<?
	$valueDate = $arItem["PROPERTIES"]["DATE_TO_OFFER"]["VALUE"];
	$date = date("Y-m-d", strtotime($valueDate));
	$str = $arItem["PROPERTIES"]["DATE_TO_OFFER"]["VALUE"];
	$result = substr(strstr($str, ' '), 1, strlen($str));
	$time = mb_strimwidth($result, 0, 5);
	//echo $arItem["PROPERTIES"]["M_NEW"]["VALUE"];
	//echo $arItem["PROPERTIES"]["M_SALE"]["VALUE"];
	//echo $arItem["PROPERTIES"]["M_HIT"]["VALUE"];
	?><?//echo "<pre>";print_r($arItem);echo "</pre>";?>
	<div class="product-grid__item product__item" id="<? echo $strMainID; ?>">
            <div class="item__wrap item_<?=$arItem['ID']?>" id="product_container" data-block-type="catalog" data-id="<?=$arItem['ID']?>" data-tree='<?= json_encode($arItem['JS_OFFERS'])?>'>
								<?if($arItem["PROPERTIES"]["M_HIT"]["VALUE"] == 'Y'):?>
								<div class="item__stick item__stick-hit">
                                    <span class="num"><i class="fa fa-thumbs-o-up"></i></span>
                                    Хит продаж!
                                </div>
								<?endif;?>
								<?if($arItem["MIN_PRICE"]["DISCOUNT_DIFF_PERCENT"] >= 1):?>
									<div class="item__stick item__stick-sale">
                                    <span class="num"><?=$arItem["MIN_PRICE"]["DISCOUNT_DIFF_PERCENT"]?>%</span>
                                    Sale
									</div>
								<?endif;?>
								<?if($arItem["PROPERTIES"]["PRODUCT_OF_THE_DAY"]["VALUE"] == "Y"):?>
                                <div class="item__stick item__stick-profit">
                                    <span class="num"><i class="fa fa-star-o"></i></span>
                                    Выгода <b>2017</b><?//if (isset($arItem['OFFERS']) || !empty($arItem['OFFERS'])) echo ' o';?>
                                </div>
                                <div class="item__timer">
                                    <i class="fa fa-clock-o"></i>
                                    <div class="soon"
                                         data-due="<?=$date?>T<?=$time?>"
                                         data-layout="line"
                                         data-format="h,m,s"
                                         data-labels-days=":"
                                         data-labels-hours=":"
                                         data-labels-minutes=":"
                                         data-labels-seconds=" ">
                                    </div>
                                </div>
								<?endif;?>
                                <a href="<?=$arItem['DETAIL_PAGE_URL']?>">
                                    <div class="item__image item__image_grid" class="MagicZoomPlus" >
                                        <img src="<? echo $arItem['PREVIEW_PICTURE']['SRC']; ?>" alt=""/>
                                    </div>
                                    <div class="item__name">
                                        <? echo $productTitle; ?>
                                    </div>
                                </a>
                                <div class="item__price">
                                <!-- $arItem['PROPERTIES']['MINIMUM_PRICE_2']['VALUE'] -->
									<?if($arItem["MIN_PRICE"]["DISCOUNT_DIFF_PERCENT"] >= 1):?>
									<span class="old"><?=$arItem['MIN_PRICE']['VALUE'];?></span>
									<?endif;?>
                                    <span class="new"><? echo round($arItem['MIN_PRICE']['DISCOUNT_VALUE'],0); ?></span>
                                    <span class="currency">руб.</span>
                                </div>
                                <div class="item__rate">
                                    <?$APPLICATION->IncludeComponent(
													"bitrix:iblock.vote",
													"stars_center",
													array(
														"IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
														"IBLOCK_ID" => $arParams['IBLOCK_ID'],
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
										);
										unset($useVoteRating);
										?>
                                </div>
                                <div class="item__input-counter amount">
                                    <button type="button" class="btn btn-minus btn-number" data-type="minus" data-field="quant[<?=$arItem['ID']?>]">
                                        -
                                    </button>
                                    <div class="input-group-text">
                                        <input type="text" name="quant[<?=$arItem['ID']?>]" class="form-control input-number input-area count" value="1" min="1" max="<?=($arItem['JS_OFFERS'][0]['MAX_QUANTITY'] ? $arItem['JS_OFFERS'][0]['MAX_QUANTITY'] : $arItem['CATALOG_QUANTITY'])?>" data-step="1" data-unit="">
                                    </div>
                                    <button type="button" class="btn btn-plus btn-number" data-type="plus" data-field="quant[<?=$arItem['ID']?>]">
                                        +
                                    </button>
                                </div>
                                <div class="item__buttons <? echo $arItemIDs['BASKET_ACTIONS']; ?>">
                                    <button class="btn btn-quick-buy bx_big bx_bt_button buy_one_click_popup" data-id="<?=$arItem['ID']?>" data-price-id="<?=$arItem['OFFERS2']['ID']?>" title="Купить в один клик">
                                        <i class="icon icon-hand"></i>
                                    </button>

                                    <button class="btn btn-add-to-cart addtobasket" data-field="quant[<?=$arItem['ID']?>]" data-amount="1" data-id="<?=$arItem["ID"]?>" data-price-id="<?=$arItem['OFFERS']['0']['CATALOG_PRICE_ID_2'];?>" title="Положить в корзину">
                                        <i class="icon icon-cart-white"></i>
                                    </button>
                                </div>

                                <div class="item__product-options sku_props">
                                	<?//print_r($skuTemplate);
	                                	$PropIndex = 0;
						                foreach ($skuTemplate as $propId => $propTemplate)
										{
											if (!isset($arItem['SKU_TREE_VALUES'][$propId]))
												continue;
											$valueCount = count($arItem['SKU_TREE_VALUES'][$propId]);
											if ($valueCount > 5)
											{
												$fullWidth = 'auto';
												$itemWidth = 'auto';
												$rowTemplate = $propTemplate['SCROLL'];
											}
											else
											{
												$fullWidth = 'auto';
												$itemWidth = 'auto';
												$rowTemplate = $propTemplate['FULL'];
											}
											unset($valueCount);
											echo '<div>', str_replace(array('#ITEM#_prop_', '#WIDTH#', '#ELEMENT_ID#'), array($arItemIDs['PROP'], 'auto', $arItem['ID']), $rowTemplate['START']);
											foreach ($propTemplate['ITEMS'] as $value => $valueItem)
											{
												if (!isset($arItem['SKU_TREE_VALUES'][$propId][$value]))
													continue;
												// echo str_replace(array('#ITEM#_prop_', '#WIDTH#', '#ELEMENT_ID#'), array($arItemIDs['PROP'], 'auto', $arItem['ID']), $valueItem);
												echo str_replace(array('#ITEM#_prop_', '#WIDTH#', '#ELEMENT_ID#', '#MAX_QUANTITY#'), array($arItemIDs['PROP'], 'auto', $arItem['ID'],trim($arItem['OFFERS'][$PropIndex]['CATALOG_QUANTITY'])), $valueItem);
												$PropIndex++;
//                                                                                        debug($valueItem);
											}
											unset($value, $valueItem);
											echo str_replace('#ITEM#_prop_', $arItemIDs['PROP'], $rowTemplate['FINISH']), '</div>';
										}
										unset($propId, $propTemplate);
										foreach ($arResult['SKU_PROPS'] as $arOneProp)
										{
											if (!isset($arItem['OFFERS_PROP'][$arOneProp['CODE']]))
												continue;
											$arSkuProps[] = array(
												'ID' => $arOneProp['ID'],
												'SHOW_MODE' => $arOneProp['SHOW_MODE'],
												'VALUES_COUNT' => $arOneProp['VALUES_COUNT']
											);
										}
										foreach ($arItem['JS_OFFERS'] as &$arOneJs)
										{
											if (0 < $arOneJs['PRICE']['DISCOUNT_DIFF_PERCENT'])
											{
												$arOneJs['PRICE']['DISCOUNT_DIFF_PERCENT'] = '-'.$arOneJs['PRICE']['DISCOUNT_DIFF_PERCENT'].'%';
												$arOneJs['BASIS_PRICE']['DISCOUNT_DIFF_PERCENT'] = '-'.$arOneJs['BASIS_PRICE']['DISCOUNT_DIFF_PERCENT'].'%';
											}
										}
										unset($arOneJs);
										?>
									</div>
	</div>
	</div>


<?}?>
<?}?>
<div style="clear: both;"></div>
</div>
</div>
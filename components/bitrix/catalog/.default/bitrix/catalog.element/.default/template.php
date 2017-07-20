<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
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

$strMainID = $this->GetEditAreaId($arResult['ID']);
$arItemIDs = array(
	'ID' => $strMainID,
	'PICT' => $strMainID.'_pict',
	'DISCOUNT_PICT_ID' => $strMainID.'_dsc_pict',
	'STICKER_ID' => $strMainID.'_sticker',
	'BIG_SLIDER_ID' => $strMainID.'_big_slider',
	'BIG_IMG_CONT_ID' => $strMainID.'_bigimg_cont',
	'SLIDER_CONT_ID' => $strMainID.'_slider_cont',
	'SLIDER_LIST' => $strMainID.'_slider_list',
	'SLIDER_LEFT' => $strMainID.'_slider_left',
	'SLIDER_RIGHT' => $strMainID.'_slider_right',
	'OLD_PRICE' => $strMainID.'_old_price',
	'PRICE' => $strMainID.'_price',
	'DISCOUNT_PRICE' => $strMainID.'_price_discount',
	'SLIDER_CONT_OF_ID' => $strMainID.'_slider_cont_',
	'SLIDER_LIST_OF_ID' => $strMainID.'_slider_list_',
	'SLIDER_LEFT_OF_ID' => $strMainID.'_slider_left_',
	'SLIDER_RIGHT_OF_ID' => $strMainID.'_slider_right_',
	'QUANTITY' => $strMainID.'_quantity',
	'QUANTITY_DOWN' => $strMainID.'_quant_down',
	'QUANTITY_UP' => $strMainID.'_quant_up',
	'QUANTITY_MEASURE' => $strMainID.'_quant_measure',
	'QUANTITY_LIMIT' => $strMainID.'_quant_limit',
	'BASIS_PRICE' => $strMainID.'_basis_price',
	'BUY_LINK' => $strMainID.'_buy_link',
	'ADD_BASKET_LINK' => $strMainID.'_add_basket_link',
	'BASKET_ACTIONS' => $strMainID.'_basket_actions',
	'NOT_AVAILABLE_MESS' => $strMainID.'_not_avail',
	'COMPARE_LINK' => $strMainID.'_compare_link',
	'PROP' => $strMainID.'_prop_',
	'PROP_DIV' => $strMainID.'_skudiv',
	'DISPLAY_PROP_DIV' => $strMainID.'_sku_prop',
	'OFFER_GROUP' => $strMainID.'_set_group_',
	'BASKET_PROP_DIV' => $strMainID.'_basket_prop',
	'SUBSCRIBE_LINK' => $strMainID.'_subscribe',
);
$strObName = 'ob'.preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);
$templateData['JS_OBJ'] = $strObName;

$strTitle = (
	isset($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]) && $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"] != ''
	? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]
	: $arResult['NAME']
);
$strAlt = (
	isset($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]) && $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"] != ''
	? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]
	: $arResult['NAME']
);

reset($arResult['MORE_PHOTO']);
$arFirstPhoto = current($arResult['MORE_PHOTO']);

// $arOffs=array();
// foreach ($arResult['OFFERS'] as $arsku){
//     foreach( $arsku['DISPLAY_PROPERTIES'] as $key => $val){
//         $arOff['ID']=$val['ID'];
//         $arOff['VALUE']=$val['DISPLAY_VALUE'];
//         $arOffs[$key]['ITEMS'][]=$arOff;
//         $arOffs[$key]['NAME']=$val['NAME'];
//     }
// }

// $this->addExternalJS("/bitrix/templates/sp07restail/js/basket.js");
$this->addExternalJS("/bitrix/templates/sp07restail/assets/plugins/magiczoomplus/magiczoomplus.js");
$this->addExternalJS("/bitrix/templates/sp07restail/js/other.js");
?>
            <div class="inner product-item">
                <div id="content" role="main">
                    <div class="product-single clearfix  item_<?=$arResult['ID']?>" id="product_container" data-id="<?=$arResult['ID']?>" data-tree='<?= json_encode($arResult['JS_OFFERS'])?>'>
                        <div class="product-single__body">
                            <div class="product-list__item product__item">
                                <div class="item__wrap">
                                    <div id="product-gallery" class="item__image">
                                        <div class="imgs-list">
                                                <? 
                                                foreach ($arResult['MORE_PHOTO'] as &$arOnePhoto)
                                                {?>

                                            <div class="item">
                                                <a href="<? echo $arOnePhoto['SRC']; ?>" data-preview="<? echo $arOnePhoto['SRC']; ?>" data-source="image">
                                                    <img src="<? echo $arOnePhoto['SRC']; ?>" alt=""/>
                                                </a>
                                            </div>
                                         
                                                <?
                                                }
                                                unset($arOnePhoto);
                                                ?>
                                        </div>
                                        <div class="image__preview">
                                            <?/*if (!empty($arResult['PREVIEW_PICTURE'])):?>
                                                <a href="<? echo $arResult['PREVIEW_PICTURE']['SRC']; ?>" class="MagicZoomPlus" rel="preload-selectors-small:false;preload-selectors-big:false;initialize-on:mouseover;smoothing-speed:70;fps:40;selectors-effect:false;show-title:false;loading-msg:Загрузка...;background-opacity:10;zoom-width:420;zoom-height:420;zoom-distance:5;hint-text:;selectors-class:current;buttons:hide;caption-source:span;">
                                                    <img src="<? echo $arResult['PREVIEW_PICTURE']['SRC']; ?>" alt=""/>
                                                </a>
                                            <?else:?>
                                                <a href="<? echo $arResult['DETAIL_PICTURE']['SRC']; ?>"  class="MagicZoomPlus" rel="preload-selectors-small:false;preload-selectors-big:false;initialize-on:mouseover;smoothing-speed:70;fps:40;selectors-effect:false;show-title:false;loading-msg:Загрузка...;background-opacity:10;zoom-width:420;zoom-height:420;zoom-distance:5;hint-text:;selectors-class:current;buttons:hide;caption-source:span;">
                                                    <img src="<? echo $arResult['DETAIL_PICTURE']['SRC']; ?>" alt=""/>
                                                </a>
                                            <?endif;*/?>
                                            <?if(count($arResult['OFFERS'])>0):?>
                                                <a id="gallery" href="<? echo $arResult['MORE_PHOTO'][0]['SRC']; ?>" class="MagicZoomPlus" rel="preload-selectors-small:false;preload-selectors-big:false;initialize-on:mouseover;smoothing-speed:70;fps:40;selectors-effect:false;show-title:false;loading-msg:Загрузка...;background-opacity:10;zoom-width:420;zoom-height:420;zoom-distance:5;hint-text:;selectors-class:current;buttons:hide;caption-source:span;">
                                                    <img src="<? echo $arResult['MORE_PHOTO'][0]['SRC']; ?>" alt=""/>
                                                </a>
<!--                                                <a id="gallery" href="<? echo $arResult['OFFERS'][0]['DETAIL_PICTURE']['SRC']; ?>" class="MagicZoomPlus" rel="preload-selectors-small:false;preload-selectors-big:false;initialize-on:mouseover;smoothing-speed:70;fps:40;selectors-effect:false;show-title:false;loading-msg:Загрузка...;background-opacity:10;zoom-width:420;zoom-height:420;zoom-distance:5;hint-text:;selectors-class:current;buttons:hide;caption-source:span;">
                                                    <img src="<? echo $arResult['OFFERS'][0]['DETAIL_PICTURE']['SRC']; ?>" alt=""/>
                                                </a>-->
                                            <?else:?>
                                                <a id="gallery" href="<? echo $arResult['DETAIL_PICTURE']['SRC']; ?>" class="MagicZoomPlus" rel="preload-selectors-small:false;preload-selectors-big:false;initialize-on:mouseover;smoothing-speed:70;fps:40;selectors-effect:false;show-title:false;loading-msg:Загрузка...;background-opacity:10;zoom-width:420;zoom-height:420;zoom-distance:5;hint-text:;selectors-class:current;buttons:hide;caption-source:span;">
                                                    <img src="<? echo $arResult['DETAIL_PICTURE']['SRC']; ?>" alt=""/>
                                                </a>
                                            <?endif;?>
                                        </div>
<? // print_r($arResult['MORE_PHOTO']);?>
                                        <div class="item__stick item__stick-profit">
                                            <span class="num"><i class="fa fa-star-o"></i></span>
                                            Выгода <b>2017</b>
                                        </div>
                                        <div class="item__timer">
                                            <i class="fa fa-clock-o"></i>
                                            <div class="soon" data-due="2017-04-13T22:05" data-layout="line" data-format="h,m,s" data-labels-days=":" data-labels-hours=":" data-labels-minutes=":" data-labels-seconds=" " data-initialized="true" data-scale="m">
                                            <span class="soon-group " data-value="1000"><span class="soon-group-inner"><span class="soon-group soon-group-sub" data-value="0"><span class="soon-group-inner"><span class="soon-repeater soon-value "><span class="soon-text ">0</span></span><span class="soon-text soon-label">:</span></span></span><span class="soon-group soon-group-sub" data-value="0"><span class="soon-group-inner"><span class="soon-repeater soon-value "><span class="soon-text ">0</span><span class="soon-text ">0</span></span><span class="soon-text soon-label">:</span></span></span><span class="soon-group soon-group-sub" data-value="0"><span class="soon-group-inner"><span class="soon-repeater soon-value "><span class="soon-text ">0</span><span class="soon-text ">0</span></span><span class="soon-text soon-label"> </span></span></span></span></span></div>
                                        </div>
                                    </div>
                                    <div class="item__info">
                                        <div class="item__name">
                                            <?=$arResult["NAME"];?>
                                        </div>
                                        <div class="item__rate">
                                            <?$APPLICATION->IncludeComponent(
                                                            "bitrix:iblock.vote",
                                                            "stars",
                                                            array(
                                                                "IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
                                                                "IBLOCK_ID" => $arParams['IBLOCK_ID'],
                                                                "ELEMENT_ID" => $arResult['ID'],
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
                                        <? //                                                print_r($arResult);
if (isset($arResult['OFFERS']) && !empty($arResult['OFFERS']) && !empty($arResult['OFFERS_PROP']))
{
    $arSkuProps = array();
?>
<div class="item__product-options sku_props" id="<? echo $arItemIDs['PROP_DIV']; ?>">
<?
    foreach ($arResult['SKU_PROPS'] as &$arProp)
    {
        if (!isset($arResult['OFFERS_PROP'][$arProp['CODE']]))
            continue;
        $arSkuProps[] = array(
            'ID' => $arProp['ID'],
            'SHOW_MODE' => $arProp['SHOW_MODE'],
            'VALUES_COUNT' => $arProp['VALUES_COUNT']
        );
        unset($arProp['VALUES'][0]);
        if ('TEXT' == $arProp['SHOW_MODE'])
        {?>
            <div class="prop prop-size sku_prop clearfix" data-element-id="<?=$arResult['ID']?>" data-prop-id="<? echo $arProp['ID']?>" data-prop-code="<?=$arProp["CODE"]?>">
                <div class="name"><? echo htmlspecialcharsex($arProp['NAME']); ?>: </div>
                <div class="values">
                <? $index=0; ?>
                    <?foreach ($arProp['VALUES'] as $arOneValue){
                        $arOneValue['NAME'] = htmlspecialcharsbx($arOneValue['NAME']);?>
										<?$curOffer = '';
										foreach($arResult["OFFERS"] as $offer){
											if($offer["PROPERTIES"][$arProp["CODE"]]["VALUE"] == $arOneValue['XML_ID']){
												$curOffer = $offer;
											}
										}?>
                        <div class="value sku_prop_value" data-prop-maxcount="<?=$arResult['JS_OFFERS'][$index]['MAX_QUANTITY']?>" data-value="<?=$arOneValue["NAME"]?>" data-value-id="<? echo $arOneValue['XML_ID']; ?>" data-treevalue="<? echo $arProp['ID'].'_'.$arOneValue['ID']; ?>" data-onevalue="<? echo $arOneValue['ID']; ?>">
                            <span id="<?=$curOffer["ID"]?>"><? echo $arOneValue['NAME']; ?></span>
                        </div>
                        <?$index++;?>
                    <?}?>
                </div>
            </div>
        <?}
        elseif ('PICT' == $arProp['SHOW_MODE'])
        {?>
        <div class="prop prop-color sku_prop clearfix" data-element-id="<?=$arResult['ID']?>" data-prop-id="<? echo $arProp['ID']?>" data-prop-code="<?=$arProp["CODE"]?>">
            <div class="name"><? echo htmlspecialcharsex($arProp['NAME']); ?>: </div>
            <div class="values">
                    <? $index=0; ?>
                <?foreach ($arProp['VALUES'] as $arOneValue){
                    $arOneValue['NAME'] = htmlspecialcharsbx($arOneValue['NAME']);?>
					<?$curOffer = '';
						foreach($arResult["OFFERS"] as $offer){
						if($offer["PROPERTIES"][$arProp["CODE"]]["VALUE"] == $arOneValue['XML_ID']){
						$curOffer = $offer;
							}
					}?>
                    <div class="value sku_prop_value" data-prop-maxcount="<?=$arResult['JS_OFFERS'][$index]['MAX_QUANTITY']?>" data-value="<?=$arOneValue["NAME"]?>" data-value-id="<? echo $arOneValue['XML_ID']; ?>" data-treevalue="<? echo $arProp['ID'].'_'.$arOneValue['ID']; ?>" data-onevalue="<? echo $arOneValue['ID']; ?>">
                        <span id="<?=$curOffer["ID"]?>">
						<img src="<? echo $arOneValue['PICT']['SRC']; ?>" alt="<? echo $arOneValue['NAME']; ?>" title="<? echo $arOneValue['NAME']; ?>" />
						</span>
					</div>
                    <?$index++;?>
                <?}?>
            </div>
        </div>
<!-- 
    <div class="<? echo $strClass; ?>" id="<? echo $arItemIDs['PROP'].$arProp['ID']; ?>_cont">
        <span class="bx_item_section_name_gray"></span>
        <div class="bx_scu_scroller_container">
            <div class="bx_scu">
                <ul id="<? echo $arItemIDs['PROP'].$arProp['ID']; ?>_list" style="width: <? echo $strWidth; ?>;margin-left:0%;">
                    <?
                    foreach ($arProp['VALUES'] as $arOneValue)
                    {
                        $arOneValue['NAME'] = htmlspecialcharsbx($arOneValue['NAME']);
                        ?>
                        <li data-treevalue="<? echo $arProp['ID'].'_'.$arOneValue['ID'] ?>" data-onevalue="<? echo $arOneValue['ID']; ?>" style="width: <? echo $strOneWidth; ?>; padding-top: <? echo $strOneWidth; ?>; display: none;" >
                            <i title="<? echo $arOneValue['NAME']; ?>"></i>
                            <span class="cnt"><span class="cnt_item" style="background-image:url('');" title="<? echo $arOneValue['NAME']; ?>"></span></span>
                        </li>
                        <?
                    }
                    ?>
                </ul>
            </div>
            <div class="bx_slide_left" style="<? echo $strSlideStyle; ?>" id="<? echo $arItemIDs['PROP'].$arProp['ID']; ?>_left" data-treevalue="<? echo $arProp['ID']; ?>"></div>
            <div class="bx_slide_right" style="<? echo $strSlideStyle; ?>" id="<? echo $arItemIDs['PROP'].$arProp['ID']; ?>_right" data-treevalue="<? echo $arProp['ID']; ?>"></div>
        </div>
    </div> -->
<?
        }
    }
    unset($arProp);
?>
</div>
<?
}
?>
                                        <div class="item__product-options">
                                           

                                            
                                     <!--        <div class="prop prop-color clearfix">
                                                <div class="name">Цвет: </div>
                                                <div class="values">
                                                    <div class="value">
                                                        <img src="/bitrix/templates/sp07restail/assets/images/color_white.png" alt="">
                                                    </div>
                                                    <div class="value active">
                                                        <img src="/bitrix/templates/sp07restail/assets/images/color_grey.png" alt="">
                                                    </div>
                                                    <div class="value">
                                                        <img src="/bitrix/templates/sp07restail/assets/images/color_darkgrey.png" alt="">
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="item__panel">
                                        <div class="item__price">

                                            <span class="new"><?=round($arResult['MIN_PRICE']['DISCOUNT_VALUE']); ?></span>
                                            <span class="currency">руб.</span>
                                        </div>
                                        <div class="item__input-counter amount">
                                            <button type="button" class="btn btn-minus btn-number" data-type="minus" data-field="quant[<?=$arResult['ID']?>]">
                                                -
                                            </button>
                                            <div class="input-group-text">
                                                <input type="text" name="quant[<?=$arResult['ID']?>]" class="form-control input-number input-area count" value="1" min="1" max="<?=(($arResult['JS_OFFERS'][0]['MAX_QUANTITY'])?$arResult['JS_OFFERS'][0]['MAX_QUANTITY']:$arResult['CATALOG_QUANTITY'])?>" data-step="1" data-unit="">
                                            </div>
                                            <button type="button" class="btn btn-plus btn-number" data-type="plus" data-field="quant[<?=$arResult['ID']?>]">
                                                +
                                            </button>
                                        </div>
                                        <div class="item__buttons">
                                            <button class="btn btn-quick-buy bx_big bx_bt_button buy_one_click_popup" data-id="<?=$arResult['ID']?>" data-price-id="<?=$arResult['OFFERS']['0']['ID'];?>" title="Купить в один клик">
                                                <i class="icon icon-hand"></i>
                                            </button>
                                            <button class="btn btn-add-to-cart addtobasket" data-amount="1" data-id="<?=$arResult["ID"]?>" data-price-id="<?=$arResult['OFFERS'][0]['CATALOG_PRICE_ID_2'];?>" title="Положить в корзину">
                                                <i class="icon icon-cart-white"></i>
                                            </button>
                                        </div>
                                        <div class="item__delivary">
                                            <b>Доставка:</b> 19 февраля
                                        </div>
                                    </div><div style="position: relative; width: 250px; height: 221px; display: none; vertical-align: baseline; float: none;"></div>
                                </div>
                            </div>
                            <div class="product-info-tabs">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#description" data-toggle="tab">Описание</a></li>
                                    <li><a href="#characteristics" data-toggle="tab">Характеристики</a></li>
                                    <!--<li><a href="#help" data-toggle="tab">Помощь в выборе</a></li>
                                    <li><a href="#related" data-toggle="tab">С этим товаром покупают</a></li>-->
                                </ul>
                                <div class="tab-content">
                                    <div id="description" class="tab-pane active">
                                        <div class="post">
                                            <?=$arResult['PREVIEW_TEXT'];?>
                                        </div>
                                    </div>
                                    <div id="characteristics" class="tab-pane">
                                        <?=$arResult['DETAIL_TEXT'];?>
                                    </div>
                                    <div id="help" class="tab-pane">
                                        Помощь в выборе
                                    </div>
                                    <div id="related" class="tab-pane">
                                        С этим товаром покупают
                                    </div>
                                </div>
                            </div>
                            <?
                            if ('Y' == $arParams['USE_COMMENTS'])
                            {
                            ?>

                            <?
                            }
                            ?>
                            <!--<div class="user-activity">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_reviews" data-toggle="tab">Отзывы о товаре <span>(5)</span></a></li>
                                    <li><a href="#tab_quest" data-toggle="tab">Вопросы <span>(0)</span></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab_reviews" class="tab-pane active">
                                        <div class="product-reviews">
                                            <div class="reviews-list">
                                                <article>
                                                    <div class="top">
                                                        <span class="name">Светлана Махмудова</span> <span class="date">(3 недели назад)</span>
                                                        <div class="rate">
                                                            <span class="stars star-4"></span>
                                                        </div>
                                                    </div>
                                                    <p>Мяч классный! Качество супер.Очень удобный, легкий.  Взяла 65 см  очень нравится.  Я очень довольна. Доставка на 5+. Спасибо Bodyform за скидку.</p>
                                                </article>
                                                <article>
                                                    <div class="top">
                                                        <span class="name">Ирина</span> <span class="date">(месяц назад)</span>
                                                        <div class="rate">
                                                            <span class="stars star-5"></span>
                                                        </div>
                                                    </div>
                                                    <p>Впечатление с непривычки: легкий, скрипит по ковролину, паркету и плитке. Надеюсь, что через время станет удобнее и привычнее.</p>
                                                </article>
                                            </div>
                                            <div class="panel-pager clearfix">
                                                <div class="col-sm-6 col-pagination">
                                                    <div class="pagination">
                                                        <a href="#" class="active">1</a>
                                                        <a href="#">2</a>
                                                        <a href="#">3</a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-button">
                                                    <button class="btn btn-add-review" data-dismiss="modal" data-toggle="modal" data-target="#modal_add_review">оставить свой</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_quest" class="tab-pane">

                                    </div>
                                </div>
                            </div>-->
                        </div>
                        <div class="product-single__price">
                            <div class="item__panel">
                                <div class="item__panel__inner">
                                    <div class="item__price">
                                        <span class="new"><?=round($arResult['MIN_PRICE']['DISCOUNT_VALUE']); ?></span>
                                        <span class="currency">руб.</span>
                                    </div>
                                    <div class="item__input-counter amount">
                                        <button type="button" class="btn btn-minus btn-number" data-type="minus" data-field="quant[<?=$arResult['ID']?>]">
                                            -
                                        </button>
                                        <div class="input-group-text">
                                            <input type="text" name="quant[<?=$arResult['ID']?>]" class="form-control input-number input-area count" value="1" min="1" max="<?=(($arResult['JS_OFFERS'][0]['MAX_QUANTITY'])?$arResult['JS_OFFERS'][0]['MAX_QUANTITY']:$arResult['CATALOG_QUANTITY'])?>" data-step="1" data-unit="">
                                        </div>
                                        <button type="button" class="btn btn-plus btn-number" data-type="plus" data-field="quant[<?=$arResult['ID']?>]">
                                            +
                                        </button>
                                    </div>
                                    <div class="item__buttons">
                                        <button class="btn btn-quick-buy bx_big bx_bt_button buy_one_click_popup" data-id="<?=$arResult['ID']?>" data-price-id="<?=$arResult['OFFERS']['0']['ID'];?>"  title="Купить в один клик">
                                            <i class="icon icon-hand"></i>
                                        </button>
                                        <button class="btn btn-add-to-cart addtobasket" data-amount="1" data-id="<?=$arResult["ID"]?>" data-price-id="<?=$arResult['OFFERS'][0]['CATALOG_PRICE_ID_2'];?>" title="Положить в корзину">
                                            <i class="icon icon-cart-white"></i>
                                        </button>
                                    </div>
                                    <div class="item__delivary">
                                        <b>Доставка:</b> 19 февраля
                                    </div>
                                </div>
                                <div class="panel__advants">
                                    <div class="advants__item advants__item--orange"><span><i class="icon icon-rubl"></i></span>
                                        <p><a href="#">Нашли дешеле? Позвоните!</a></p></div>
                                    <!--<div class="advants__item advants__item--red"><span>5%</span>
                                        <p>До скидки 5% осталось купить на 4000 р.</p></div>
                                    <div class="advants__item advants__item--green"><span><i class="icon icon-car"></i></span>
                                        <p>До бесплатной доставки осталось купить на 5000 р.</p></div>-->
                                </div>
                            </div>
                        </div>
                    </div>
					<?
					$arFilter = Array('IBLOCK_ID'=> 9,'ID'=>$arResult["IBLOCK_SECTION_ID"], 'GLOBAL_ACTIVE'=>'Y');
							$db_list = CIBlockSection::GetList(Array("timestamp_x"=>"DESC"), $arFilter, false, Array("UF_BUY_TOO"));
								if($uf_value = $db_list->GetNext()):
								$recomend=$uf_value["UF_BUY_TOO"];
								endif;
					if(!empty($recomend)):
					?>
                    <div id="complect" class="product-complect">
                        <div class="heading">С этим товаром покупают</div>
                        <div class="catalog">
                            <div class="catalog__list clearfix">
							<?
							//echo "<pre>";
							//print_r($arResult);
							//echo "</pre>";
							//$arFilter = Array('IBLOCK_ID'=> 9,'ID'=>$arResult["IBLOCK_SECTION_ID"], 'GLOBAL_ACTIVE'=>'Y');
							//$db_list = CIBlockSection::GetList(Array("timestamp_x"=>"DESC"), $arFilter, false, Array("UF_BUY_TOO"));
							//	if($uf_value = $db_list->GetNext()):
							//	$recomend=$uf_value["UF_BUY_TOO"];
							//	endif;
									//echo "<pre>";
									//print_r($recomend);
									//echo "</pre>";
							$arFilter = Array("IBLOCK_ID"=>9);
							$arSelectID = Array("ID"=>$recomend);
							$db_list = CIBlockSection::GetList( $arFilter, $arSelectID, true);
								while($arSection = $db_list->GetNext())
								{?>							
								<div class="catalog__item">
                                    <a href="<?=$arSection["SECTION_PAGE_URL"]?>">
									<?$arSection["PICTURE"] = CFile::GetFileArray($arSection["PICTURE"])?>
                                        <div class="photo" style="background: url(<?=$arSection["PICTURE"]["SRC"]?>) no-repeat center 0 / cover">
                                            <span>Открыть категорию</span>
                                        </div>
                                        <div class="name">
                                            <div class="title"><?=$arSection["NAME"]?></div>
                                            <div class="desc">Мячи, шейкеры, эспандеры, коврики, гантели, утяжелители, обручи и многое другое для занятий фитнесом.</div>
                                        </div>
                                        <div class="stick stick-sale">
                                            <span class="num">10%</span>
                                            Sale
                                        </div>
                                    </a>
                                </div><?}?>
                            </div>
                        </div>
                    </div><?endif;?>
                </div>
            </div>

<script type="text/javascript">
var <? echo $strObName; ?> = new JCCatalogElement(<? echo CUtil::PhpToJSObject($arJSParams, false, true); ?>);
BX.message({
	ECONOMY_INFO_MESSAGE: '<? echo GetMessageJS('CT_BCE_CATALOG_ECONOMY_INFO'); ?>',
	BASIS_PRICE_MESSAGE: '<? echo GetMessageJS('CT_BCE_CATALOG_MESS_BASIS_PRICE') ?>',
	TITLE_ERROR: '<? echo GetMessageJS('CT_BCE_CATALOG_TITLE_ERROR') ?>',
	TITLE_BASKET_PROPS: '<? echo GetMessageJS('CT_BCE_CATALOG_TITLE_BASKET_PROPS') ?>',
	BASKET_UNKNOWN_ERROR: '<? echo GetMessageJS('CT_BCE_CATALOG_BASKET_UNKNOWN_ERROR') ?>',
	BTN_SEND_PROPS: '<? echo GetMessageJS('CT_BCE_CATALOG_BTN_SEND_PROPS'); ?>',
	BTN_MESSAGE_BASKET_REDIRECT: '<? echo GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_BASKET_REDIRECT') ?>',
	BTN_MESSAGE_CLOSE: '<? echo GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE'); ?>',
	BTN_MESSAGE_CLOSE_POPUP: '<? echo GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE_POPUP'); ?>',
	TITLE_SUCCESSFUL: '<? echo GetMessageJS('CT_BCE_CATALOG_ADD_TO_BASKET_OK'); ?>',
	COMPARE_MESSAGE_OK: '<? echo GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_OK') ?>',
	COMPARE_UNKNOWN_ERROR: '<? echo GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_UNKNOWN_ERROR') ?>',
	COMPARE_TITLE: '<? echo GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_TITLE') ?>',
	BTN_MESSAGE_COMPARE_REDIRECT: '<? echo GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT') ?>',
	PRODUCT_GIFT_LABEL: '<? echo GetMessageJS('CT_BCE_CATALOG_PRODUCT_GIFT_LABEL') ?>',
	SITE_ID: '<? echo SITE_ID; ?>'
});
</script>
<?//debug($arResult['JS_OFFERS'])?>
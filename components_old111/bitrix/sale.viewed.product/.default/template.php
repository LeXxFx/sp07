<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->createFrame()->begin('Загрузка');
?>
<?if(empty($arResult)) return false;?>
<?
	global $arFilter;
	$arFilter = array();
	$arFilter["ID"] = array();
	foreach($arResult as $arItem) {
		$arFilter["ID"][] = $arItem["PRODUCT_ID"];
	}
if($USER->IsAdmin()) {  //вивід тільки для адміна
    
    foreach ($arResult as $key => $arItem) {
    	
    
    if($arParams["VIEWED_NAME"]=="Y"){

  $viv=array( );
  array_push($viv,$arItem['NAME']);
  
  $viv1=implode(", ", $viv);
  echo $viv1;
  //print_r($arItem['NAME']).(", ");

	}
    }

}
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"block", 
	array(
		"IBLOCK_TYPE" => "1c_catalog",
		"IBLOCK_ID" => "9",
		"PRICE_CODE" => array(
			0 => "Для сайта (САЙТ цена)",
		),
		"OFFERS_PROPERTY_CODE" => array(
			0 => "DLINA",
			1 => "RAZMER",
			2 => "RAZMER_3",
			3 => "TSVET",
			4 => "TSVET_1",
			5 => "TSVET_2",
			6 => "",
		),
		"SET_TITLE" => "N",
		"PAGE_ELEMENT_COUNT" => "4",
		"SHOW_ALL_WO_SECTION" => "Y",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"FILTER_NAME" => "arFilterRecomend",
		"SECTION_TITLE" => "Рекомендуемые товары",
		"SECTION_TITLE_LINK" => "/store/?recommend=Y",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"COMPONENT_TEMPLATE" => "block",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"INCLUDE_SUBSECTIONS" => "Y",
		"HIDE_NOT_AVAILABLE" => "N",
		"LINE_ELEMENT_COUNT" => "3",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER2" => "desc",
		"OFFERS_LIMIT" => "5",
		"BACKGROUND_IMAGE" => "-",
		"TEMPLATE_THEME" => "blue",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => "-",
		"OFFER_ADD_PICT_PROP" => "-",
		"OFFER_TREE_PROPS" => array(
			0 => "DLINA",
			1 => "RAZMER",
			2 => "NAGRUZKA",
			3 => "ROST",
			4 => "TSVET",
			5 => "TSVET_1",
			6 => "TSVET_2",
		),
		"PRODUCT_SUBSCRIPTION" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SEF_MODE" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "undefined",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"SET_BROWSER_TITLE" => "Y",
		"BROWSER_TITLE" => "-",
		"SET_META_KEYWORDS" => "Y",
		"META_KEYWORDS" => "-",
		"SET_META_DESCRIPTION" => "Y",
		"META_DESCRIPTION" => "-",
		"SET_LAST_MODIFIED" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_FILTER" => "N",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"USE_PRODUCT_QUANTITY" => "N",
		"PRODUCT_QUANTITY_VARIABLE" => "undefined",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"OFFERS_CART_PROPERTIES" => array(
		),
		"ADD_TO_BASKET_ACTION" => "ADD",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N"
	),
	$component
);?>
<?/*$APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	"block",
	array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"PRICE_CODE" => $arParams["PRICE_CODE"],
		"OFFERS_PROPERTY_CODE" => $arParams["OFFERS_PROPERTY_CODE"],
		"SET_TITLE" => "N",
		"PAGE_ELEMENT_COUNT" => $arParams["VIEWED_COUNT"],
		"SHOW_ALL_WO_SECTION" => "Y",
		'PRODUCT_DISPLAY_MODE' => "Y",
		"FILTER_NAME" => "arFilter",
		"SECTION_TITLE" => "Просмотренные товары",
		"DISPLAY_BOTTOM_PAGER" => "N"
	),
	$component
);*/?>
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
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	"forBasket",
	array(
		"IBLOCK_TYPE" => "1c_catalog",
		"IBLOCK_ID" => "9",
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
);?>
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
$APPLICATION->SetTitle("Поиск");?>
<?
$arElements = $APPLICATION->IncludeComponent(
	"bitrix:search.page",
	".default",
	Array(
		"RESTART" => $arParams["RESTART"],
		"NO_WORD_LOGIC" => $arParams["NO_WORD_LOGIC"],
		"USE_LANGUAGE_GUESS" => $arParams["USE_LANGUAGE_GUESS"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"arrFILTER" => array("iblock_".$arParams["IBLOCK_TYPE"]),
		"arrFILTER_iblock_".$arParams["IBLOCK_TYPE"] => array($arParams["IBLOCK_ID"]),
		"USE_TITLE_RANK" => "N",
		"DEFAULT_SORT" => "rank",
		"FILTER_NAME" => "",
		"SHOW_WHERE" => "N",
		"arrWHERE" => array(),
		"SHOW_WHEN" => "N",
		"PAGE_RESULT_COUNT" => 50,
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "N",
	),
	$component,
	array('HIDE_ICONS' => 'Y')
);
if (!empty($arElements) && is_array($arElements))
{
	?>
	
	<?	
	function add_params_to_url($params) {
		$new_request = $_REQUEST;
		foreach($params as $key => $value) {
			$new_request[$key] = $value;
		}
		return "?" . http_build_query($new_request);
	}
	
	function generate_url($neworder, $curorder, $cursort) {
		if($curorder == $neworder)
			if($cursort == "asc")
				$newsort = "desc";
			else
				$newsort = "asc";
		else
			$newsort = "desc";
		
		return add_params_to_url(array("order" => $neworder, "sort" => $newsort));
	}
	
	if($_REQUEST["order"] == "rating" || $_REQUEST["order"] == "new")
		$order = $_REQUEST["order"];
	else
		$order = "price";
	
	if($_REQUEST["sort"] == "asc")
		$sort = $_REQUEST["sort"];
	else
		$sort = "desc";
	
	if($_REQUEST["num"] == "35" || $_REQUEST["num"] == "95" || $_REQUEST["num"] == "all")
		$num = $_REQUEST["num"];
	else
		$num = "25";
	
	if($order == "price")
		$arParams["ELEMENT_SORT_FIELD"] = "catalog_PRICE_2";
	if($order == "rating")
		$arParams["ELEMENT_SORT_FIELD"] = "property_rating";
	if($order == "new")
		$arParams["ELEMENT_SORT_FIELD"] = "property_M_NEW";
	
	$arParams["ELEMENT_SORT_ORDER"] = $sort;
	
	if($num == "all")
		$arParams["PAGE_ELEMENT_COUNT"] = "1000";
	else
		$arParams["PAGE_ELEMENT_COUNT"] = $num;
?>
	<?
	global $searchFilter;
	$searchFilter = array(
		"=ID" => $arElements,
	);
	$APPLICATION->IncludeComponent(
		"bitrix:catalog.section",
		"sp07restail",
		array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
			"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
			"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
			"PRICE_CODE" => $arParams["PRICE_CODE"],
			"OFFERS_PROPERTY_CODE" => $arParams["OFFERS_PROPERTY_CODE"],
			"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
			"SET_TITLE" => "N",
			"SHOW_ALL_WO_SECTION" => "Y",
			'PRODUCT_DISPLAY_MODE' => "Y",
			"FILTER_NAME" => "searchFilter",
			"PAGER_TEMPLATE" => "sp07restail",
			"SECTION_TITLE" => "Результаты поиска для \"" . $_GET["q"] . "\""
		),
		$component
	);
}
else
{
	echo GetMessage("CT_BCSE_NOT_FOUND");
}
?>